<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QC_dashboard
 *
 * @author sonjoy
 */
class Qc_dashboard extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('QC_model');
        $this->load->library('session');
    }

    function index() {
        $style_id = $this->input->get('id_supply_style_no');
        if (!empty($style_id)) {
            $data['get_all_qc_info'] = $this->QC_model->get_all_qc_info_by_style_id($style_id);
        } else {
            $data['get_all_qc_info'] = $this->QC_model->get_all_qc_info();
        }
        $data['date_range'] = $this->input->get('date_range');
        $date = explode('-', $data['date_range']);
        if ($data['date_range'] != '') {
            $data['get_all_qc_info'] = $this->QC_model->get_all_qc_info_by_date($date[0], $date[1]);
        }


        $this->session->set_userdata('pdf_qc_dashboard', $data['get_all_qc_info']);
        $data['all_style_no'] = $this->QC_model->select_all_style_no();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'QC Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'qc_dashboard/qc_dashboard', $data);
    }

    function add_new() {
        $data['all_style_no'] = $this->QC_model->add_new_select_all_style_no();
//        echo '<pre>';print_r($data);exit();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Add New QC';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'qc_dashboard/add_qc', $data);
    }

    function reduce($id) {
        $data['get_all_qc_info'] = $this->QC_model->get_all_qc_info_by_qc_id($id);
//        echo '<pre>';print_r($data);exit();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Update QC';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'qc_dashboard/update_qc', $data);
    }

    function save() {
        $data['id_supply_style_no'] = $this->input->post('id_supply_style_no');
        if (empty($this->input->post('file_receive_date'))) {
            $data['file_receive_date'] = '0000-00-00 00:00:00';
        } else {
            $data['file_receive_date'] = date('Y-m-d', strtotime($this->input->post('file_receive_date')));
        }if (empty($this->input->post('pp_meeting_date'))) {
            $data['pp_meeting_date'] = '0000-00-00 00:00:00';
        } else {
        $data['pp_meeting_date'] = date('Y-m-d', strtotime($this->input->post('pp_meeting_date')));
        }if (empty($this->input->post('inline_date'))) {
            $data['inline_date'] = '0000-00-00 00:00:00';
        } else {
        $data['inline_date'] = date('Y-m-d', strtotime($this->input->post('inline_date')));
        }if (empty($this->input->post('final_inspection_date'))) {
            $data['final_inspection_date'] = '0000-00-00 00:00:00';
        } else {
        $data['final_inspection_date'] = date('Y-m-d', strtotime($this->input->post('final_inspection_date')));
        }if (empty($this->input->post('wash_approval_date'))) {
            $data['wash_approval_date'] = '0000-00-00 00:00:00';
        } else {
        $data['wash_approval_date'] = date('Y-m-d', strtotime($this->input->post('wash_approval_date')));
        }
        $data['orders_comment'] = $this->input->post('orders_comment');
        $data['wash_comment'] = $this->input->post('wash_comment');
        $data['date_created'] = date('Y-m-d H:i:s');
        $this->QC_model->save_info('qc_info', $data);
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Saved!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('qc_dashboard');
    }

    function update() {
        $id = $this->input->post('id_qc_info');
        $data['id_supply_style_no'] = $this->input->post('id_supply_style_no');
         if (empty($this->input->post('file_receive_date'))) {
            $data['file_receive_date'] = '0000-00-00 00:00:00';
        } else {
            $data['file_receive_date'] = date('Y-m-d', strtotime($this->input->post('file_receive_date')));
        }if (empty($this->input->post('pp_meeting_date'))) {
            $data['pp_meeting_date'] = '0000-00-00 00:00:00';
        } else {
        $data['pp_meeting_date'] = date('Y-m-d', strtotime($this->input->post('pp_meeting_date')));
        }if (empty($this->input->post('inline_date'))) {
            $data['inline_date'] = '0000-00-00 00:00:00';
        } else {
        $data['inline_date'] = date('Y-m-d', strtotime($this->input->post('inline_date')));
        }if (empty($this->input->post('final_inspection_date'))) {
            $data['final_inspection_date'] = '0000-00-00 00:00:00';
        } else {
        $data['final_inspection_date'] = date('Y-m-d', strtotime($this->input->post('final_inspection_date')));
        }if (empty($this->input->post('wash_approval_date'))) {
            $data['wash_approval_date'] = '0000-00-00 00:00:00';
        } else {
        $data['wash_approval_date'] = date('Y-m-d', strtotime($this->input->post('wash_approval_date')));
        }
        $data['orders_comment'] = $this->input->post('orders_comment');
        $data['wash_comment'] = $this->input->post('wash_comment');
        $data['last_modified_qc'] = date('Y-m-d H:i:s');
        $this->QC_model->update_info('qc_info', $data, $id);
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Updated!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('qc_dashboard');
    }

    function delete($id) {
        $this->QC_model->delete($id);
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Deleted!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('qc_dashboard');
    }

}
