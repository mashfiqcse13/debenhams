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
        }else{
            $data['get_all_qc_info'] = $this->QC_model->get_all_qc_info();
        }
        $this->session->set_userdata('pdf_qc_dashboard',$data['get_all_qc_info']);
        $data['all_style_no'] = $this->QC_model->select_all_style_no();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'QC Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'qc_dashboard/qc_dashboard', $data);
    }

    function add_new() {
        $data['all_style_no'] = $this->QC_model->select_all_style_no();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Add New QC';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'qc_dashboard/add_qc', $data);
    }

    function reduce($id) {
        $data['get_all_qc_info'] = $this->QC_model->get_all_qc_info_by_qc_id($id);
        $data['all_style_no'] = $this->QC_model->select_all_style_no();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Add New QC';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'qc_dashboard/update_qc', $data);
    }

    function save() {
        $data['id_supply_style_no'] = $this->input->post('id_supply_style_no');
        $data['file_receive_date'] = date('Y-m-d', strtotime($this->input->post('file_receive_date')));
        $data['pp_meeting_date'] = date('Y-m-d', strtotime($this->input->post('pp_meeting_date')));
        $data['inline_date'] = date('Y-m-d', strtotime($this->input->post('inline_date')));
        $data['final_inspection_date'] = date('Y-m-d', strtotime($this->input->post('final_inspection_date')));
        $this->QC_model->save_info('qc_info', $data);
        redirect('qc_dashboard');
    }

    function update() {
        $id = $this->input->post('id_qc_info');
        $data['id_supply_style_no'] = $this->input->post('id_supply_style_no');
        $data['file_receive_date'] = date('Y-m-d', strtotime($this->input->post('file_receive_date')));
        $data['pp_meeting_date'] = date('Y-m-d', strtotime($this->input->post('pp_meeting_date')));
        $data['inline_date'] = date('Y-m-d', strtotime($this->input->post('inline_date')));
        $data['final_inspection_date'] = date('Y-m-d', strtotime($this->input->post('final_inspection_date')));
        $this->QC_model->update_info('qc_info', $data, $id);
        redirect('qc_dashboard');
    }
    
    function delete($id){
        $this->QC_model->delete($id);
        redirect('qc_dashboard');
    }

}
