<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author sonjoy
 */
class User_model extends CI_Model {

    //put your code here
    function save($tbl_name, $user) {
        $this->db->insert($tbl_name, $user);
        return $this->db->insert_id();
    }

    function update_info($tbl_name, $condition ,$data, $id){
        $this->db->where($condition,$id);
        $this->db->update($tbl_name,$data);
        $this->db->select($condition);
        $this->db->from($tbl_name);
        $this->db->where($condition,$id);
        $query = $this->db->get();
        return $query->row();
        
    }
    
    function get_all_users_info_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_type','users.id = user_type.user_id','left');
        $this->db->where('users.id',$user_id);
        return $query = $this->db->get()->result();
    }
    
   
    

}
