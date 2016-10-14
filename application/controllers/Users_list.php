<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Department
 *
 * @author sonjoy
 */
class Users_list extends ci_controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }

        $this->load->library('grocery_CRUD');
        $this->load->model('User_model');
        $this->load->model('tank_auth/users', 'users');
        $this->lang->load('tank_auth');
    }

    function index() {
        if (!$this->session->userdata('user_type') or $this->session->userdata('user_type') != 1) {
            redirect('admin');
        }
        $crud = new grocery_CRUD();
        $crud->set_table('users')
                ->set_subject('Users')
                ->unset_columns('password', 'new_password_key', 'new_password_requested', 'new_email', 'new_email_key')
                ->order_by('id', 'desc')
                ->callback_column('banned', function($this) {
                    if ($this == 1) {
                        return 'Banned';
                    } else {
                        return 'Not Banned';
                    }
                });


        if ($_SESSION["user_id"] != 39) {
            $crud->where("id != 39");
        }

        $output = $crud->render();
        $data['glosary'] = $output;
        $user_id = $this->uri->segment('4');
        $data['all_users'] = $this->User_model->get_all_users_info_by_user_id($user_id);
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Users';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'users', $data);
    }

    function save_info() {
        if (!$this->session->userdata('user_type') or $this->session->userdata('user_type') != 1) {
            redirect('admin');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $user['username'] = $this->input->post('username');
        if (!empty($this->input->post('email'))) {
            $user['email'] = $this->input->post('email');
        }
        $password = $this->input->post('password');
        $hasher = new PasswordHash(
                $this->config->item('phpass_hash_strength', 'tank_auth'), $this->config->item('phpass_hash_portable', 'tank_auth')
        );
        $user['password'] = $hasher->HashPassword($password);
        $user['activated'] = $this->input->post('activated');
        $user['banned'] = $this->input->post('banned');
        $banned = $this->input->post('banned_reason');
        if (!empty($banned)) {
            $user['ban_reason'] = $banned;
        }
        $user['created'] = date('Y-m-d H:i:s');
        $user_id = $this->User_model->save('users', $user);
        $data['user_id'] = $user_id;
        $data['type'] = $this->input->post('type');
        $this->User_model->save('user_type', $data);
        redirect('users_list');
    }

    function update_info() {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $user['username'] = $this->input->post('username');
        if (!empty($this->input->post('email'))) {
            $user['email'] = $this->input->post('email');
        }
        $password = $this->input->post('password');
        if (!empty($password)) {
            $hasher = new PasswordHash(
                    $this->config->item('phpass_hash_strength', 'tank_auth'), $this->config->item('phpass_hash_portable', 'tank_auth')
            );
            $user['password'] = $hasher->HashPassword($password);
        }
        $user['activated'] = $this->input->post('activated');
        $user['banned'] = $this->input->post('banned');
        $user['ban_reason'] = $this->input->post('banned_reason');
        $user['modified'] = date('Y-m-d H:i:s');
        $user_id = $this->User_model->update_info('users', 'id', $user, $id);
        $id_user_type = $this->input->post('id_user_type');
        $data['user_id'] = $user_id->id;
        $data['type'] = $this->input->post('type');
        $this->User_model->update_info('user_type', 'id_user_type', $data, $id_user_type);
        redirect('users_list');
    }

    function account_managment() {
//        print_r($_SESSION["user_id"]);exit();
        $user_id = $_SESSION["user_id"];
        $data['all_users'] = $this->User_model->get_all_users_info_by_user_id($user_id);
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Users';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'account_management', $data);
    }

    /**
     * Generate reset code (to change password) and send it to user
     *
     * @return void
     */
    function forgot_password() {
//        if ($this->tank_auth->is_logged_in()) {         // logged in
//            redirect('');
//        } elseif ($this->tank_auth->is_logged_in(FALSE)) {      // logged in, not activated
//            redirect('/auth/send_again/');
//        } else {
        $btn = $this->input->post('btn');
        if (isset($btn)) {
//            $this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');


            $data['errors'] = array();

            if ($this->form_validation->run()) {        // validation ok
                
                if (!is_null($data = $this->tank_auth->forgot_password(
                                $this->form_validation->set_value('email')))) {

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');
//                    print_r($data);exit();
                    // Send email with password activation link
                    $this->_send_email('forgot_password', $data['email'], $data);

//                    $this->_show_message($this->lang->line('auth_message_new_password_sent'));
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
            redirect('admin');
        }
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Forget Password';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'forgot_password_form', $data);
//        $this->load->view('forgot_password_form', $data);
    }
    
//    public function forgot_password() {
//    $this->load->library('form_validation');
//    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
//
//    if ($this->form_validation->run() == FALSE) {
//      $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
//        $data['Title'] = 'Forget Password';
//        $data['base_url'] = base_url();
//        $this->load->view($this->config->item('ADMIN_THEME') . 'forgot_password_form', $data);
//    } else {
//      $email = $this->input->post('email');
//
//      $this->db->where('email', $email);
//      $this->db->from('users');
//      $num_res = $this->db->count_all_results();
//      
//      if ($num_res == 1) {
//        // Make a small string (code) to assign to the user // to indicate they've requested a change of // password
//        $code = mt_rand('5000', '200000');
//        $data = array(
//          'new_password_requested' => $code,
//        );
//
//        $this->db->where('email', $email);
//        if ($this->db->update('users', $data)) {
//          // Update okay, send email
//            $from_email = $this->config->item('webmaster_email', 'tank_auth');
//          $url = site_url('users_list/new_password').$code;
//          $body = "\nPlease click the following link to reset your password:\n\n".$url."\n\n";
//          if (mail($email, 'Password reset', $body, 'From: '.$from_email)) {
//            $data['submit_success'] = true;
////            $this->load->view('signin/signin', $data);
//                        redirect('admin');
//          }
//        } else {
//          // Some sort of error happened, redirect user // back to form
//          redirect('users_list/forgot_password');
//        }
//      } else {
//        // Some sort of error happened, redirect user back // to form
//        redirect('users_list/forgot_password');
//      }
//    }
//  }
  
//  public function new_password() {
//    $this->load->library('form_validation');
//    $this->form_validation->set_rules('code', 'Code', 'required|min_length[4]|max_length[7]');
//    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
//    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|max_length[15]');
//    $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[15]|matches[password1]');
//    
//    // Get Code from URL or POST and clean up
//    if ($this->input->post()) {
//      $data['code'] = xss_clean($this->input->post('code'));
//    } else {
//      $data['code'] = xss_clean($this->uri->segment(3));
//    }
//
//    if ($this->form_validation->run() == FALSE) {
//      $this->load->view('signin/new_password', $data);
//    } else {
//      // Does code from input match the code against the // email
//      $this->load->model('Signin_model');
//      $email = xss_clean($this->input->post('email'));
//      if (!$this->Signin_model->does_code_match($data['code'], $email)) {
//        // Code doesn't match
//        redirect ('signin/forgot_password');
//      } else {// Code does match
//        $this->load->model('Register_model');
//        $hash = $this->encrypt->sha1($this->input->post('password1'));
//
//        $data = array(
//          'user_hash' => $hash
//        );
//
//        if ($this->Register_model->update_user($data, $email)) {
//          redirect ('signin');
//        }
//      }
//    }
//  }
    
    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$data) {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_' . $type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/' . $type . '-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/' . $type . '-txt', $data, TRUE));
        $this->email->send();
    }
    
    
    /**
     * Replace user password (forgotten) with a new one (set by user).
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    function reset_password() {
        $this->load->helper('security');
        $user_id = $this->uri->segment(3);
        $new_pass_key = $this->uri->segment(4);

//        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

        $data['errors'] = array();

        if ($this->form_validation->run()) {        // validation ok
            if (!is_null($data = $this->tank_auth->reset_password(
                            $user_id, $new_pass_key, $this->form_validation->set_value('new_password')))) { // success
                $data['site_name'] = $this->config->item('website_name', 'tank_auth');
                print_r($data);exit();
                // Send email with new password
                $this->_send_email('reset_password', $data['email'], $data);
                redirect('admin');
//                $this->_show_message($this->lang->line('auth_message_new_password_activated') . ' ' . anchor('/auth/login/', 'Login'));
            } else {              // fail
//                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        } else {
            // Try to activate user by password key (if not activated yet)
            if ($this->config->item('email_activation', 'tank_auth')) {
                $this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
            }

            if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
//                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        }
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Forget Password';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'reset_password_form', $data);
//        $this->load->view('reset_password_form', $data);
    }

}
