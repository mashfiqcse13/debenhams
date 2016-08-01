<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author sonjoy
 */
class Search extends CI_Controller {

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
        $this->load->model('Search_model');
        $this->load->library('session');
    }

    function index() {
        if($this->session->userdata('user_type')==1){
            
            $con1=' 1=1';
        }elseif($this->session->userdata('user_type')==2){
            $id_technician=$this->session->userdata('user_id');
            
            
            $con1="allocated_to=$id_technician";
        }
        
        
        $id_supply_style_no = $this->input->get('id_supply_style_no');
        $technician = $this->input->get('id_technican');
        $id_supplyer = $this->input->get('id_supplyer');
        $id_season = $this->input->get('id_supply_session');
        $date_from = date('Y-m-d H:i:s', strtotime($this->input->get('date_from')));
//        $date_from =  $this->input->get('date_from');
        $id_department = $this->input->get('id_department');
        $sample_result = $this->input->get('sample_result');
        $date_to = date('Y-m-d H:i:s', strtotime($this->input->get('date_to') . ' +1 day'));
//        echo '<pre>';print_r($id_season);exit();
//        $date_to = $this->input->get('date_to');
        $data['max_supply_info'] = $this->Search_model->get_max_supply_info();
        $data['max_supply_fit_register'] = $this->Search_model->get_max_supply_fit_regiter();
//         $date_from != "1970-01-01"
        if(!empty($id_supply_style_no) || !empty($id_supplyer) || !empty($id_season) || !empty($id_department) || !empty($sample_result) || !empty($technician) || $date_from != "1970-01-01 06:00:00"){
             $data['all_informations'] = $this->Search_model->get_supply_info($id_supply_style_no,$id_supplyer,$id_season,$id_department,$sample_result,$technician,$date_from, $date_to);
        } else {
            $data['all_informations'] = $this->Search_model->get_supply_info_with_fit_register();
        }
//        echo '<pre>';print_r($data);exit();
        $this->session->set_userdata('excel_session_data', $data['all_informations']);
        $this->session->set_userdata('pdf_session_data', $data['all_informations']);

        
        
        $data['all_style_no'] = $this->Search_model->select_all_by_technician_id($con1);
        
 
       
        $data['all_seasons'] = $this->Search_model->select_all('supply_session');
        $data['all_department'] = $this->Search_model->select_all('department');
        $data['all_technician'] = $this->Search_model->select_technician_by_type();
        $data['all_supplyer'] = $this->Search_model->select_all('supplyer');

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Search Info';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'search', $data);
    }

    function fit_info() {
        $id = $this->input->post('id_supply_info');
        $data['fit_info'] = $this->Search_model->fit_info($id);
//        echo '<pre>';print_r($data['fit_info']);exit();
        echo json_encode($data);
    }

    function search_delete($id) {
        $this->Search_model->search_delete($id);
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Deleted!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('search');
    }

}
