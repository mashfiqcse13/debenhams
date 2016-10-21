<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supply_info_model
 *
 * @author sonjoy
 */
class Supply_info_model extends ci_model {

    //put your code here
    function save_info($tbl_name, $data) {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }

    function update_info($tbl_name, $condition, $data, $id) {
        $this->db->where($condition, $id);
        $this->db->update($tbl_name, $data);
        $this->db->select($condition);
        $this->db->from($tbl_name);
        $this->db->where($condition, $id);
        $query = $this->db->get();
        return $query->row();
    }

    function select_all($tbl_name) {
        $this->db->select('*');
        $this->db->from($tbl_name);
        $query = $this->db->get();
        return $query->result();
    }

    function select_all_user_id($user_id) {
        $this->db->select('id_technician');
        $this->db->from('technician');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    function select_all_by_technician_id($con = '') {
        $sql = array();
        $this->db->select('*');
        $this->db->from('supply_style_no');
        $this->db->where($con);
        $query = $this->db->get()->result();
        for ($i = 0; $i < count($query); $i++) {
            $id = $query[$i]->id_supply_style_no;
            $data = $this->supply_info($id);
            if (empty($data)) {
                $this->db->select('*');
                $this->db->from('supply_style_no');
                $this->db->where($con);
                $this->db->where('id_supply_style_no', $id);
                $sql[] = $this->db->get()->row();
            }
        }
        return $sql;
    }

//    function select_all_unused_supplier(){
//        $sql = array();
//        $this->db->select('*');
//        $this->db->from('supplyer');
//        $results = $this->db->get()->result();
//        foreach ($results as $result){
//            $id = $result->id_supplyer;
//            $data = $this->supplier_exist_in_supply_info($id);
//            if (empty($data)) {
//                $this->db->select('*');
//                $this->db->from('supplyer');
//                $this->db->where('id_supplyer', $id);
//                $sql[] = $this->db->get()->row();
//            }
//        }
//        return $sql;
//    }
//    function select_all_unused_department(){
//        $sql = array();
//        $this->db->select('*');
//        $this->db->from('department');
//        $results = $this->db->get()->result();
//        foreach ($results as $result){
//            $id = $result->id_department;
//            $data = $this->supplier_exist_in_supply_info($id);
//            if (empty($data)) {
//                $this->db->select('*');
//                $this->db->from('department');
//                $this->db->where('id_department', $id);
//                $sql[] = $this->db->get()->row();
//            }
//        }
//        return $sql;
//    }



    function supply_info($id) {
        $this->db->select('*');
        $this->db->from('supply_info');
        $this->db->where('id_supply_style_no', $id);
        $query = $this->db->get()->row();
        return $query;
    }

//    function supplier_exist_in_supply_info($id){
//        $this->db->select('*');
//        $this->db->from('supply_info');
//        $this->db->where('id_supplyer', $id);
//        return $this->db->get()->row();        
//    }
//    function department_exist_in_supply_info($id){
//        $this->db->select('*');
//        $this->db->from('supply_info');
//        $this->db->where('id_department', $id);
//        return $this->db->get()->row();        
//    }
//    ajax search
    function select_fit_name_by_fit_id($id) {
        $this->db->select('*');
        $this->db->from('supply_fit_name');
        $this->db->where('id_supply_fit_name', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function supply_info_by_supply_id($supply_id) {
        $this->db->select('*');
        $this->db->from('supply_info');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
//        $this->db->join('supply_fit_register','supply_info.id_supply_info = supply_fit_register.id_supply_info','left');
//        $this->db->join('supply_fit_name','supply_fit_register.id_supply_fit_name = supply_fit_name.id_supply_fit_name','left');
        $this->db->where('supply_info.id_supply_info', $supply_id);
        return $result = $this->db->get()->row();
        $this->db->select('*');
        $this->db->from('supply_fit_register');
        $this->db->where('id_supply_info', $result->id_supply_info);
        return $add[] = array($result, $this->db->get()->result());
    }

    function supply_register_by_supply_id($supply_id) {
        $this->db->select('*');
        $this->db->from('supply_fit_register');
        $this->db->where('id_supply_info', $supply_id);
        $this->db->select_max('id_supply_fit_name');
//        $this->db->select_max('id_supply_fit_register');
        $query = $this->db->get();
        return $query->result();
    }

    function select_supply_register_by_fit_id($id, $supply_info) {
        $this->db->select('*');
        $this->db->from('supply_fit_register');
        $this->db->join('supply_fit_name', 'supply_fit_register.id_supply_fit_name = supply_fit_name.id_supply_fit_name', 'left');
        $this->db->where('supply_fit_register.id_supply_fit_name', $id);
        $this->db->where('supply_fit_register.id_supply_info', $supply_info);
        $query = $this->db->get();
        return $query->result();
    }

    function check_fit($id_supply_info, $fit_id) {
        $this->db->select('*');
        $this->db->from('supply_fit_register');
        $this->db->where('id_supply_info', $id_supply_info);
        $this->db->where('id_supply_fit_name', $fit_id);
        $result = $this->db->get()->result();
        If (empty($result)) {
            return false;
        } else {
            return $result[0]->id_supply_fit_register;
        }
    }

    function get_all($value, $tbl_name, $id) {
        $data = '';
        $get_info = $this->db->query('select * from `' . $tbl_name . '` where `' . $id . '` = ' . $value)->result();
        foreach ($get_info as $supply) {
            $data = $supply->name;
        }
        return $data;
    }

    function get_all_technician($value, $tbl_name, $id) {
        $data = '';
        $get_info = $this->db->query('select * from `' . $tbl_name . '` where `' . $id . '` = ' . $value)->result();
        foreach ($get_info as $supply) {
            $data = $supply->username;
        }
        return $data;
    }

    function get_supply_style_no($style_no) {
        $this->db->select('*');
        $this->db->from('supply_style_no');
        $this->db->where('style_no', $style_no);
        return $this->db->get()->result();
    }

/////////////some testing model/////////////////////
    function last_style_entry() {
        return $this->db->select('*')
                        ->from('supply_style_no')
                        ->order_by('id_supply_style_no', 'desc')
                        ->get()->row();
    }

    function delete_upload($id, $delete_image) {
//        die($delete_image);
        $this->db->select('file_upload');
        $this->db->from('supply_info');
        $this->db->where('id_supply_info', $id);
        $all_image = $this->db->get()->row();
//        print_r($all_image);exit();
        $explodeArr = explode(",", $all_image->file_upload);
//        $length = strlen($value);
//        die($length);

        $updatedColumn = "";
        $newUpdatedData = "";
        foreach ($explodeArr as $key => $value) {
            if ($value == $delete_image) {
                unlink('file_upload/' . $delete_image);
            } elseif ($value != $delete_image) {
                $updatedColumn[] = $value; // store data that you dont need to delete
            }
        }
        if (is_array($updatedColumn)) {
            $newUpdatedData = implode(",", $updatedColumn);
        }
        $this->db->set('file_upload', $newUpdatedData);
        $this->db->where('id_supply_info', $id);
        $this->db->update('supply_info');
        return true;
    }

}
