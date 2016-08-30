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
        if (!$this->session->userdata('user_type') or $this->session->userdata('user_type') != 1) {
            redirect('admin');
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('User_model');
        $this->load->model('tank_auth/users', 'users');
        $this->lang->load('tank_auth');
    }

    function index() {
        $crud = new grocery_CRUD();
        $crud->set_table('users')
                ->set_subject('Users')
                ->unset_columns('password','new_password_key','new_password_requested','new_email','new_email_key')
                ->order_by('id', 'desc')
                ->callback_column('banned', function($this) {
                    if ($this == 1) {
                        return 'Banned';
                    } else {
                        return 'Not Banned';
                    }
                });
                
          
                if($_SESSION["user_id"] != 39){
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
        $hasher = new PasswordHash(
                $this->config->item('phpass_hash_strength', 'tank_auth'), $this->config->item('phpass_hash_portable', 'tank_auth')
        );
        $user['password'] = $hasher->HashPassword($password);
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

}
