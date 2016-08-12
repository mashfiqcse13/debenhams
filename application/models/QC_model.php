<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of qc_model
 *
 * @author sonjoy
 */
class QC_model extends CI_Model {

    //put your code here
    function select_all_style_no() {
        $this->db->select('*');
        $this->db->from('supply_style_no');
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_qc_info() {
        $this->db->select('*');
        $this->db->from('qc_info');
        $this->db->join('supply_style_no','qc_info.id_supply_style_no = supply_style_no.id_supply_style_no','left');
        $this->db->join('supply_info','qc_info.id_supply_style_no = supply_info.id_supply_style_no','left');
        $this->db->order_by('id_qc_info','desc');
        $query = $this->db->get();
        return $query->result();
    }
    function get_all_qc_info_by_style_id($style_id) {
        $this->db->select('*');
        $this->db->from('qc_info');
        $this->db->join('supply_style_no','qc_info.id_supply_style_no = supply_style_no.id_supply_style_no','left');
        $this->db->join('supply_info','qc_info.id_supply_style_no = supply_info.id_supply_style_no','left');
        $this->db->order_by('id_qc_info','desc');
        $this->db->where('qc_info.id_supply_style_no',$style_id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_all_qc_info_by_date($from, $to) {
//        print_r($from);exit();
        $date_from = date('Y-m-d H:i:s', strtotime($from));
        $date_to = date('Y-m-d H:i:s', strtotime($to));
        $this->db->select('*');
        $this->db->from('qc_info');
        $this->db->join('supply_style_no','qc_info.id_supply_style_no = supply_style_no.id_supply_style_no','left');
        $this->db->join('supply_info','qc_info.id_supply_style_no = supply_info.id_supply_style_no','left');
        $this->db->order_by('id_qc_info','desc');
        $date_range = "DATE(qc_info.date_created) BETWEEN '$date_from' AND '$date_to'";
        $this->db->where($date_range);
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_qc_info_by_qc_id($id) {
        $this->db->select('*');
        $this->db->from('qc_info');
        $this->db->where('id_qc_info', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function save_info($tbl_name, $data) {
        $this->db->insert($tbl_name, $data);
    }
    
    function update_info($tbl_name,$data ,$id){
        $this->db->where('id_qc_info',$id);
        $this->db->update($tbl_name, $data);
    }
    
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('mytable');
    }
    
    

}
