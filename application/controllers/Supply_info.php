<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supply_info
 *
 * @author sonjoy
 */
class Supply_info extends CI_Controller {

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
        $this->load->model('Supply_info_model');
    }

    function index() {
        $crud = new grocery_CRUD();

        if ($this->session->userdata('user_type') == 1) {
            $con = ' 1=1 ';
            $con1 = ' 1=1';
        } elseif ($this->session->userdata('user_type') == 2) {
            $id_technician = $this->session->userdata('user_id');
            $con = "id_technician=$id_technician";
            $con1 = "allocated_to=$id_technician";
        }


        $crud->set_table('supply_info')
                ->set_subject('Sample Info')
                ->display_as('id_supply_style_no', 'Style No')
                ->display_as('id_supply_session', 'Session')
                ->display_as('id_department', 'Department')
                ->display_as('id_supplyer', 'Supplier')
                ->display_as('id_technician', 'Technician')
                ->display_as('sample_result', 'Fit Sample Result')
                ->display_as('approved_by', 'Fit Sample Approved By')
                ->set_relation('id_supply_style_no', 'supply_style_no', 'style_no')
                ->where($con)
                ->callback_column('id_supply_session', array($this, 'supply_session'))
                ->callback_column('id_department', array($this, 'department'))
                ->callback_column('id_supplyer', array($this, 'supplyer'))
                ->callback_column('id_technician', array($this, 'technician'))
                ->callback_column('sample_result', function($this) {
                    if ($this == 1) {
                        return 'Pass';
                    } if ($this == 2) {
                        return 'Fail';
                    }
                })
                ->callback_column('approved_by', function($this) {
                    if ($this == 1) {
                        return 'United Kingdom';
                    } if ($this == 2) {
                        return 'Bangladesh';
                    }
                })
                ->callback_column('lab_test_report', function($this) {
                    if ($this == 1) {
                        return 'Pass';
                    } if ($this == 2) {
                        return 'Fail';
                    }
                })
                ->callback_column('pattern_block', function($this) {
                    if ($this == 1) {
                        return 'United Kingdom';
                    } if ($this == 2) {
                        return 'Bangladesh';
                    }
                })
                ->callback_after_delete(array($this, 'fit_register_delete'))
                ->order_by('id_supply_info', 'desc');

        $output = $crud->render();
        $data['glosary'] = $output;

        $data['last_style_entry'] = $this->Supply_info_model->last_style_entry();
        $data['all_style_no'] = $this->Supply_info_model->select_all_by_technician_id($con1);
        $data['all_session'] = $this->Supply_info_model->select_all('supply_session');
        $data['all_department'] = $this->Supply_info_model->select_all('department');
        $data['all_supplyer'] = $this->Supply_info_model->select_all('supplyer');
//        print_r($data['all_supplyer']);exit();
        $data['all_fit_name'] = $this->Supply_info_model->select_all('supply_fit_name');
        $supply_id = $this->uri->segment(4);
        $data['all_supply_info'] = $this->Supply_info_model->supply_info_by_supply_id($supply_id);
//        echo '<pre>';print_r($data['last_style_entry']);exit();
        $data['all_supply_fit_register'] = $this->Supply_info_model->supply_register_by_supply_id($supply_id);
//         echo '<pre>';print_r($data['all_supply_fit_register']);exit();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        if ($this->uri->segment(3) == 'edit') {
            $data['Title'] = 'Update Info';
        } else {
            $data['Title'] = 'Insert Info';
        }
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'supply_info/supply_info', $data);
    }

    function supply_session($value, $row) {
        return $this->Supply_info_model->get_all($value, 'supply_session', 'id_supply_session');
    }

    function department($value, $row) {
        return $this->Supply_info_model->get_all($value, 'department', 'id_department');
    }

    function supplyer($value, $row) {
        return $this->Supply_info_model->get_all($value, 'supplyer', 'id_supplyer');
    }

    function technician($value, $row) {
        return $this->Supply_info_model->get_all_technician($value, 'users', 'id');
    }

    function fit_register_delete($id) {
        return $this->db->delete('supply_fit_register', array('id_supply_info' => $id));
    }

    function fit_info() {
        $id = $this->input->post('id_supply_fit_name');
        $data['supply_fit'] = $this->Supply_info_model->select_fit_name_by_fit_id($id);
//        echo '<pre>';print_r($data['supply_fit']);exit();
        echo json_encode($data);
    }

    function register_info() {
        $id = $this->input->post('id_supply_fit_name');
        $supply_info = $this->input->post('id_supply_info');
        $data['supply_fit'] = $this->Supply_info_model->select_supply_register_by_fit_id($id, $supply_info);
//        echo '<pre>';print_r($data['supply_fit']);exit();
        echo json_encode($data);
    }

    function save_info() {
//        echo '<pre>'; print_r($_FILES['file_upload']['error']);exit();
        $data['id_supply_style_no'] = $this->input->post('id_supply_style_no');
        $data['id_supply_session'] = $this->input->post('id_supply_session');
        $data['id_department'] = $this->input->post('id_department');
        $data['style_description'] = $this->input->post('style_description');
        $data['id_supplyer'] = $this->input->post('id_supplyer');
        $data['sample_result'] = $this->input->post('sample_result');
        $data['approved_by'] = $this->input->post('approved_by');
        $data['id_technician'] = $this->session->userdata('user_id');
        $data['lab_test_report'] = $this->input->post('lab_test_report');
        $data['pattern_block'] = $this->input->post('pattern_block');
        $data['date_created'] = date('Y-m-d H:i:s');
        $data['remark'] = $this->input->post('remark');
        if ($_FILES['file_upload']['error'][0] == '0') {
            $data['file_upload'] = implode(",", $this->do_upload($_FILES));
        }
        $data['file_hand_over_date'] = date('Y-m-d H:i:s', strtotime($this->input->post('file_hand_over_date')));
        $supply_info_id = $this->Supply_info_model->save_info('supply_info', $data);

        $fit['id_supply_info'] = $supply_info_id;
        $fit['id_supply_fit_name'] = $this->input->post('id_supply_fit_name');
        $sample_approved = $this->input->post('sample_approved');
//        print_r($sample_approved);exit();
        if (!empty($sample_approved)) {
            $fit['sample_approved'] = $sample_approved;
        }
        $fit['supply_fit_register_date_send'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_send')));
        $fit['supply_fit_register_date_receive'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_receive')));
        $fit['fit_comment'] = $this->input->post('fit_comment');
//        echo '<pre>'; print_r($fit);exit();
        $this->Supply_info_model->save_info('supply_fit_register', $fit);
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Saved!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('search');
    }

    function update_info() {
        $id = $this->input->post('id_supply_info');
//         echo '<pre>'; print_r($_FILES);exit();
        $data['id_supply_session'] = $this->input->post('id_supply_session');
        $data['id_department'] = $this->input->post('id_department');
        $data['style_description'] = $this->input->post('style_description');
        $data['id_supplyer'] = $this->input->post('id_supplyer');
        $data['sample_result'] = $this->input->post('sample_result');
        $data['approved_by'] = $this->input->post('approved_by');
        $data['id_technician'] = $this->session->userdata('user_id');
        $data['lab_test_report'] = $this->input->post('lab_test_report');
        $data['pattern_block'] = $this->input->post('pattern_block');
        $data['last_modified'] = date('Y-m-d H:i:s');
        $data['remark'] = $this->input->post('remark');
        if ($_FILES['file_upload']['error'][0] == '0') {
            $data['file_upload'] = $this->input->post('prev_upload').','. implode(",", $this->do_upload($_FILES));
        }
//        echo '<pre>'; print_r($data['file_upload']);exit();
        $data['file_hand_over_date'] = date('Y-m-d H:i:s', strtotime($this->input->post('file_hand_over_date')));
        $supply_info_id = $this->Supply_info_model->update_info('supply_info', 'id_supply_info', $data, $id);
//        echo '<pre>'; print_r($supply_info_id);exit();
        $id_fit = $this->input->post('id_supply_fit_register');
        if (!empty($this->input->post('id_fit'))) {
            $fit['id_supply_info'] = $supply_info_id->id_supply_info;
            $fit['id_supply_fit_name'] = $this->input->post('id_fit');
            $sample_approved = $this->input->post('sample_approved');
            if (!empty($sample_approved)) {
                $fit['sample_approved'] = $sample_approved;
            }
            $fit['supply_fit_register_date_send'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_send')));
            $fit['supply_fit_register_date_receive'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_receive')));
            $fit['fit_comment'] = $this->input->post('fit_comment');
            //        echo '<pre>'; print_r($fit);exit();
            $id_supply_fit_register = $this->Supply_info_model->check_fit($fit['id_supply_info'], $fit['id_supply_fit_name']);
            //        die("<pre>" . var_dump($id_supply_fit_register));
            if ($id_supply_fit_register != FALSE) {
                $this->Supply_info_model->update_info('supply_fit_register', 'id_supply_fit_register', $fit, $id_supply_fit_register);
            } else {
                $this->Supply_info_model->save_info('supply_fit_register', $fit);
            }
        }
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Updated!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('search');
    }

    function save_style() {
//        print_r($_POST);exit();
        $data['style_no'] = $this->input->post('style_no');
//        $data['allocated_to'] = $this->input->post('allocated_to');        
        $data['allocated_to'] = $this->session->userdata('user_id');
        $id = $this->Supply_info_model->save_info('supply_style_no', $data);
        echo json_encode($id);
//        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Style No is Successfully Inserted!</p></div>';
//        $this->session->set_userdata($sdata);
//        redirect('supply_info');
    }

    function last_style_info() {
        $data = $this->Supply_info_model->last_style_entry();
        print_r($data);
        exit();
        return $data;
    }

    function search_style() {
        $something = '';
        $style_no = $this->input->post('style_no');
        $result = $this->Supply_info_model->get_supply_style_no($style_no);
//        print_r($result);exit();
//        = $this->db->get('supply_style_no')->where('style_no',$style_no)->result();
        if ($result) {
            echo json_encode($result);
        } else if (empty($result)) {
            echo json_encode($something);
        }
    }
    
    function check_department(){
        $something = '';
        $id = $this->input->post('id_department');
        $result = $this->db->get_where('supply_info', array('id_department' => $id))->row();
         if ($result) {
            echo json_encode($result);
        } else if (empty($result)) {
             return false;
        }
    }
    function check_supplier(){
        $id = $this->input->post('id_supplier');
        $result = $this->db->get_where('supply_info', array('id_supplyer' => $id))->row();
         if ($result) {
            echo json_encode($result);
        } else if (empty($result)) {
            return false;
        }
    }
    function check_session(){
        $id = $this->input->post('id_session');
        $result = $this->db->get_where('supply_info', array('id_supply_session' => $id))->row();
         if ($result) {
            echo json_encode($result);
        } else if (empty($result)) {
            return false;
        }
    }

    /////////////////upload files///////////////////
    function do_upload($file) {
        $this->load->library('upload');
//    echo '<pre>'; print_r($file);exit();
        $files = $file;
        $cpt = count($_FILES['file_upload']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file_upload']['name'] = $files['file_upload']['name'][$i];
            $_FILES['file_upload']['type'] = $files['file_upload']['type'][$i];
            $_FILES['file_upload']['tmp_name'] = $files['file_upload']['tmp_name'][$i];
            $_FILES['file_upload']['error'] = $files['file_upload']['error'][$i];
            $_FILES['file_upload']['size'] = $files['file_upload']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
//        $this->upload->do_upload();
//        
            if (!$this->upload->do_upload('file_upload')) {
                $error = $this->upload->display_errors();
                // echo '<pre>';
                // print_r($error);
            } else {
                $fdata['upload_path'] = $this->upload->data();
                $file_link[] = $fdata['upload_path']['file_name'];
            }
        }
        return $file_link;
    }

    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = './file_upload/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

}
