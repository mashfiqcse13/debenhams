<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supply_style_no
 *
 * @author sonjoy
 */
class Supply_style_no extends CI_Controller {

    //put your code here
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
        $this->load->model('Supply_style_no_model');
    }

    function index() {
        $crud = new grocery_CRUD();
        $crud->set_table('supply_style_no')
                ->set_subject('Supply Style No')
                ->callback_column('allocated_to',array($this,'user_name'))
                ->field_type('allocated_to', 'dropdown', $this->Supply_style_no_model->get_technicians_as_array());
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Style No';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'supply_style_no/supply_style_no', $data);
    }
    
    function user_name($value,$row){
        return $this->Supply_style_no_model->get_all($value,'users','id');
    }

}
