<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Supply_info_table
 *
 * @author rokibul
 */
class Supply_info_table extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }
        if(!$this->session->userdata('user_type') or $this->session->userdata('user_type')!=1 or $this->session_userdata('user_type')!=2){
            redirect('admin');
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('Supply_info_model');
    }
    

    function index() {
        $crud = new grocery_CRUD();
        
        
        
                
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Insert Info';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'supply_info/supply_info_table', $data);
    }
    
    public function _callback_webpage_url($value, $row)
        {
            return "<a href='".site_url('admin/sub_webpages/'.$row->id)."'>$value</a>";
        }
    
}