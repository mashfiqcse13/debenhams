<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Excel extends CI_Controller {
 
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
        $id_supply_style_no = $this->input->post('id_supply_style_no');
        $technician = $this->input->post('id_technician');
        $id_supplyer = $this->input->post('id_supplyer');
        $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
        $id_department = $this->input->post('id_department');
        $sample_result = $this->input->post('sample_result');
        $date_to = date('Y-m-d', strtotime($this->input->post('date_to'). ' +1 day'));
        $data['max_supply_info']= $this->Search_model->get_max_supply_info(); 
        $data['max_supply_fit_register']= $this->Search_model->get_max_supply_fit_regiter(); 
        
        $data['all_informations']= $this->session->userdata('excel_session_data');           
     
//        echo '<pre>';print_r($data);exit();
        $data['all_style_no'] = $this->Search_model->select_all_by_technician_id();
        $data['all_department'] = $this->Search_model->select_all('department');
        $data['all_technician'] = $this->Search_model->select_all('users');
        $data['all_supplyer'] = $this->Search_model->select_all('supplyer');
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Insert Info';
        $data['base_url'] = base_url();
        $this->load->view('excel', $data);
    }
    
    function qc_dashboard(){
        $this->load->model('QC_model');
        $style_id = $this->input->get('id_supply_style_no');
       
        
        $data['get_all_qc_info'] = $this->session->userdata('pdf_qc_dashboard');
        $data['all_style_no'] = $this->QC_model->select_all_style_no();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'QC Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'qc_dashboard/qc_dashboard_excel', $data);
    }
   

         
}
 