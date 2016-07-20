<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Role extends CI_Model {
    
    
    function check_role($user_id) {
        $this->load->library('session');
        $query=$this->db->select('*')
                    ->from('user_type')        
                    ->where('user_id',$user_id)
                    ->get();
        foreach($query->result() as $row){
            $user_type=$row->type;
            $this->session->set_userdata('user_type',$user_type);
        }
        
        return true;
    }
    
    function check_access(){
        if($this->session->userdata('user_type')){
            
            return true;
            
        }else{
            $this->check_role($_SESSION['user_id']);
            return $this->session->userdata('user_type');  
        }
    }
    
    
    
}