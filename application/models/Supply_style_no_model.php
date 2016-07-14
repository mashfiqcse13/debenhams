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

    function get_technicians_as_array() {
        $technicians = $this->db->query("SELECT * FROM `users` join `user_type` on users.id = user_type.user_id WHERE type = 2")->result();
        $data = array();
        foreach ($technicians as $technician) {
            $data[$technician->id] = $technician->username;
        }
        return $data;
    }
}