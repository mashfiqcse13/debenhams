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
            $data['analysis']=$this->performance_model->supplier_performance_by_pass_fail($user_id,$date_range);
            $data['unpased']=$this->performance_model->unpased_order_count($user_id,$date_range,'id_supplyer');
            $data['supplier_performance_by_fittype']=$this->performance_model->supplier_performance_by_fittype($user_id,$date_range);
        }
        $data['Title'] = 'Suppliers Performance';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'performance_supplier', $data);
    } 
    
    public function ranking_supplier3() {
            
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        
        $data['order_analysis']=$this->performance_model->order_analysis();

        
        
        $data['analysis']=$data['order_analysis']['rating'];
//        echo '<pre>';
//
//        print_r($data['order_analysis']);
        
        

        $data['Title'] = 'Total Order Analysis';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'ranking_supplier', $data);
    } 
    
    public function ranking_supplier() {
        
        
        $count=array();
        $this->load->model('Search_model');
        $total_supplyer=$this->db->query("select supplyer.name as name, supplyer.id_supplyer  FROM supply_info LEFT JOIN supplyer ON 
supply_info.id_supplyer=supplyer.id_supplyer
GROUP BY supply_info.id_supplyer");
        
        $data['all']=$this->Search_model->get_supply_info_with_fit_register();
        
        $data['max_supply_info']= $this->Search_model->get_max_supply_info();
        //print_r($data['max_supply_info']);
        
        $data['all_informations']= $this->Search_model->get_supply_info_with_fit_register(); 
        
        foreach($total_supplyer->result() as $row){
            $data['supplyer']['name'][]=$row->name;
            $data['supplyer']['id'][]=$row->id_supplyer;
            
        }

//        
        $data['supplyer_count'] = count($data['supplyer']['name']);
        
//        echo '<pre>';
//        print_r($data['supplyer']);
        
        
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');

        $data['Title'] = 'Suppliers Ranking';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'ranking_supplier', $data);
    } 
    
        public function order_analysis() {
            
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        
        $data['order_analysis']=$this->performance_model->order_analysis();

        
        
        $data['analysis']=$data['order_analysis']['rating'];
//        echo '<pre>';
//
//        print_r($data['order_analysis']);
        
        

        $data['Title'] = 'Total Order Analysis';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'order_analysis', $data);
    } 
    

}
 