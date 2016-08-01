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
        $data['all_style_no'] = $this->Supply_info_model->select_all_by_technician_id($con1);
        $data['all_session'] = $this->Supply_info_model->select_all('supply_session');
        $data['all_department'] = $this->Supply_info_model->select_all('department');
        $data['all_supplyer'] = $this->Supply_info_model->select_all('supplyer');
        $data['all_fit_name'] = $this->Supply_info_model->select_all('supply_fit_name');
        $supply_id = $this->uri->segment(4);
        $data['all_supply_info'] = $this->Supply_info_model->supply_info_by_supply_id($supply_id);
//        echo '<pre>';print_r($data['all_supply_info']);exit();
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
        $supply_info_id = $this->Supply_info_model->save_info('supply_info', $data);

        $fit['id_supply_info'] = $supply_info_id;
        $fit['id_supply_fit_name'] = $this->input->post('id_supply_fit_name');
        $fit['supply_fit_register_date_send'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_send')));
        $fit['supply_fit_register_date_receive'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_receive')));
//        echo '<pre>'; print_r($fit);exit();
        $this->Supply_info_model->save_info('supply_fit_register', $fit);
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Saved!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('search');
    }

    function update_info() {
        $id = $this->input->post('id_supply_info');
//         echo '<pre>'; print_r($_POST);exit();
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
        $supply_info_id = $this->Supply_info_model->update_info('supply_info', 'id_supply_info', $data, $id);
//        echo '<pre>'; print_r($supply_info_id);exit();
        $id_fit = $this->input->post('id_supply_fit_register');
        $fit['id_supply_info'] = $supply_info_id->id_supply_info;
        $fit['id_supply_fit_name'] = $this->input->post('id_fit');
        $fit['supply_fit_register_date_send'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_send')));
        $fit['supply_fit_register_date_receive'] = date('Y-m-d H:i:s', strtotime($this->input->post('supply_fit_register_date_receive')));
//        echo '<pre>'; print_r($fit);exit();
        $id_supply_fit_register = $this->Supply_info_model->check_fit($fit['id_supply_info'], $fit['id_supply_fit_name']);
//        die("<pre>" . var_dump($id_supply_fit_register));
        if ($id_supply_fit_register != FALSE) {
            $this->Supply_info_model->update_info('supply_fit_register', 'id_supply_fit_register', $fit, $id_supply_fit_register);
        } else {
            $this->Supply_info_model->save_info('supply_fit_register', $fit);
        }
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Updated!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('search');
    }

}
