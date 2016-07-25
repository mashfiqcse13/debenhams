<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Department
 *
 * @author sonjoy
 */
class Supply_fit_name extends ci_controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }
        if(!$this->session->userdata('user_type') or $this->session->userdata('user_type')!=1){
            redirect('admin');
        }
        $this->load->library('grocery_CRUD');
    }
    
    function index() {
        $crud = new grocery_CRUD();
        $crud->set_table('supply_fit_name')
                ->set_subject('Supply Fit Name')
                                ->order_by('id_supply_fit_name','desc');

        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Supply Fit Name';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'supply_fit_name', $data);
    }
}
