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
        $this->load->library('grocery_CRUD');
        $this->load->model('Supply_style_no_model');
    }

    function index() {
        $crud = new grocery_CRUD();

        if ($this->session->userdata('user_type') == 1) {
            $con = ' 1=1 ';
            $con1 = ' 1=1';
        } elseif ($this->session->userdata('user_type') == 2) {
            $id_technician = $this->session->userdata('user_id');
            $con = "allocated_to=$id_technician";
            $con1 = "user_id=$id_technician";
        }

        $crud->set_table('supply_style_no')
                ->set_subject('Sample Style No')
                ->callback_column('allocated_to', array($this, 'user_name'))
                ->where($con)
                ->order_by('id_supply_style_no', 'desc');

        $crud->callback_add_field('allocated_to', function() {
            return $this->session->userdata('username') . '<input  name="allocated_to" type="hidden" value="' . $this->session->userdata('user_id') . '">';
        });
        $crud->set_lang_string('insert_success_message', 'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the list page.
   <script type="text/javascript">
    window.location = "' . site_url('supply_info/index/add') . '";
   </script>
   <div style="display:none">
   '
        );
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Sample Style No';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'supply_style_no/supply_style_no', $data);
    }



    function user_name($value, $row) {
        return $this->Supply_style_no_model->get_all($value, 'users', 'id');
    }

}
