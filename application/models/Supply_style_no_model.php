<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supply_style_no_model
 *
 * @author MD. Mashfiq
 */
class Supply_style_no_model extends CI_Model {

    function get_technicians_as_array($con) {
        $technicians = $this->db->query("SELECT * FROM `users` join `user_type` on users.id = user_type.user_id WHERE type = 2 AND $con")->result();
        $data = array();
        foreach ($technicians as $technician) {
            $data[$technician->id] = $technician->username;
        }
        return $data;
    }

    function get_all($value,$tbl_name,$id) {
        $data='';
        $get_info = $this->db->query('select * from `' . $tbl_name . '` where `' . $id . '` = ' . $value)->result();
        foreach ($get_info as $supply) {
            $data = $supply->username;
        }
        return $data;
    }

}
