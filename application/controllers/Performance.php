<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Performance extends CI_Controller {

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
        $this->load->model('performance_model');
        $this->load->model('common_model');
        
    }

    public function index() {
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'starter', $data);
//		$this->load->view('welcome_message');
    }
    
    public function technician() {
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');

        $data['technician_dropdown']=$this->performance_model->get_technician_dropdown();
        
        $date_range =$this->input->post('date_range');
        
        $user_id = $this->input->post('user_id');
        $btn_submit=$this->input->post('btn_submit');
        if(isset($btn_submit)){  
            $data['user_name']=$this->performance_model->get_technician_name($user_id);
            $data['total_order']=$this->performance_model->total_order_count($user_id,$date_range,'id_technician');
            $data['analysis']=$this->performance_model->order_by_techncian($user_id,$date_range);
             $data['unpased']=$this->performance_model->unpased_order_count($user_id,$date_range,'id_technician');
        }
        
        $data['Title'] = 'Technician Performance';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'performance_technician', $data);
    } 
    
    
    public function supplier() {
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');

        $data['suppliers_dropdown']=$this->performance_model->get_supplier_dropdown();
        
        $date_range =$this->input->post('date_range');
        
        $user_id = $this->input->post('id_supplyer');
        $btn_submit=$this->input->post('btn_submit');
        if(isset($btn_submit)){  
            $data['user_name']=$this->performance_model->get_supplier_name($user_id);
            $data['total_order']=$this->performance_model->total_order_count($user_id,$date_range,'id_supplyer');
            $data['analysis']=$this->performance_model->order_by_supplier($user_id,$date_range);
            $data['unpased']=$this->performance_model->unpased_order_count($user_id,$date_range,'id_supplyer');
        }
        $data['Title'] = 'Suppliers Performance';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'performance_supplier', $data);
    } 
    

}
