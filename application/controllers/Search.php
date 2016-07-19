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
class Search extends CI_Controller{
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
    }
    function index() {
        $id_supply_style_no = $this->input->post('id_supply_style_no');
        $id_supplyer = $this->input->post('id_supplyer');
        $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
        $id_department = $this->input->post('id_department');
        $sample_result = $this->input->post('sample_result');
        $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
        if(!empty($id_supply_style_no)){
            $data['all_informations']= $this->Search_model->select_all_info_by_style_no($id_supply_style_no);
        }if(!empty($id_supplyer)){
            $data['all_informations']= $this->Search_model->select_all_info_by_supplyer($id_supplyer);
        }if(!empty($id_department)){
            $data['all_informations']= $this->Search_model->select_all_info_by_department($id_department);
        }if(!empty($sample_result)){
            $data['all_informations']= $this->Search_model->select_all_info_by_sample($sample_result);
        }if(!empty($sample_result)){
            $data['all_informations']= $this->Search_model->select_all_info_by_date($date_from,$date_to);
        }else{
           $data['all_informations']= $this->Search_model->get_supply_info_with_fit_register(); 
           $data['max_supply_info']= $this->Search_model->get_max_supply_info(); 
        }
        
        
        
//        echo '<pre>';print_r($data);exit();
        $data['all_style_no'] = $this->Search_model->select_all_by_technician_id();
        $data['all_department'] = $this->Search_model->select_all('department');
        $data['all_technician'] = $this->Search_model->select_all('users');
        $data['all_supplyer'] = $this->Search_model->select_all('supplyer');
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Insert Info';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'search', $data);
    }
    
    function fit_info(){
        $id = $this->input->post('id_supply_info');
        $data['fit_info'] = $this->Search_model->fit_info($id);
//        echo '<pre>';print_r($data['fit_info']);exit();
        echo json_encode($data);
    }
}
