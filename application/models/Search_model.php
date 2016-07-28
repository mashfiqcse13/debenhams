<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search_model
 *
 * @author sonjoy
 */
class Search_model extends CI_Model {

    private $supply_fit_register_detail = array();

    //put your code here

    function getregister($id_supply_info) {
        $this->db->select('supply_fit_register.id_supply_fit_name,supply_fit_register_date_send as date_send,supply_fit_register_date_receive as date_receive,name as supply_fit_name');
        $this->db->from('supply_fit_register');
        $this->db->join('supply_fit_name', 'supply_fit_register.id_supply_fit_name = supply_fit_name.id_supply_fit_name', 'left');
        $this->db->where('supply_fit_register.id_supply_info', $id_supply_info);
        $this->db->order_by('id_supply_info', 'ASC');
        return $fit_register = $this->db->get()->result();
//        foreach ($fit_register as $fit) {
//            $this->supply_fit_register_detail[$fit->id_supply_info] = array('id_supply_fit_name' => $fit->id_supply_fit_name, 'date_send' => $fit->supply_fit_register_date_send, 'date_receive' => $fit->supply_fit_register_date_receive);
//            
//        }
//         $this->supply_fit_register_detail;
    }

    function build_fit_register_detail() {
        $this->db->select('*');
        $this->db->from('supply_fit_register');
        return $query = $this->db->get()->result();
    }

    function get_fit_register_detail_by($id_supply_info = null) {
        if (empty($id_supply_info)) {
            $this->build_fit_register_detail();
        } else {
            return $fit_register = $this->getregister($id_supply_info);
//            for($i = 0; $i<= count($fit_register); $i++){
//            $this->supply_fit_register_detail[$i] = $fit_register;
//            }
//           return $this->supply_fit_register_detail;
        }
    }

    function get_supply_info_with_fit_register() {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name,supply_info.date_created as date');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session=supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department = department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer = supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician = users.id', 'left');
        $this->db->join('qc_info', 'supply_info.id_supply_style_no = qc_info.id_supply_style_no', 'left');
        $this->db->order_by('supply_info.id_supply_style_no', 'desc');
        $technician = $this->session->userdata('user_type');
        if ($technician == 2) {
            $this->db->where('supply_info.id_technician', $_SESSION['user_id']);
        }
        $informtions = $this->db->get()->result();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }if (!empty($register)) {
            return $register;
        }
    }

    function get_max_supply_info() {
        $this->db->select_max('id_supply_info');
        return $query = $this->db->get('supply_info')->row();
    }

    function get_max_supply_fit_regiter() {
        $this->db->select_max('id_supply_fit_register');
        return $query = $this->db->get('supply_fit_register')->row();
    }

    function select_all($tbl_name) {
        $this->db->select('*');
        $this->db->from($tbl_name);
        $query = $this->db->get();
        return $query->result();
    }
    function select_technician_by_type() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_type','users.id = user_type.user_id','left');
        $this->db->where('user_type.type',2);
        $query = $this->db->get();
        return $query->result();
    }

    function select_all_by_technician_id() {
        $this->db->select('*');
        $this->db->from('supply_style_no');
        $query = $this->db->get();
        return $query->result();
    }

    function search_delete($id) {
        $this->db->delete('supply_info',array('id_supply_info'=> $id));
        $this->db->delete('supply_fit_register',array('id_supply_info'=> $id));
    }

    function get_supply_info($id_supply_style_no, $id_supplyer, $id_department, $sample_result, $technician, $date_from, $date_to) {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name,supply_info.date_created as date');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session = supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department =department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer =supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician =users.id', 'left');
        $this->db->join('qc_info', 'supply_info.id_supply_style_no = qc_info.id_supply_style_no', 'left');
        $this->db->order_by('supply_info.id_supply_style_no', 'desc');
        $this->db->like('supply_info.id_supply_style_no', $id_supply_style_no);
        $this->db->like('supply_info.id_supplyer', $id_supplyer);
        $this->db->like('supply_info.id_department', $id_department);
        $this->db->like('supply_info.sample_result', $sample_result);
        $this->db->like('supply_info.id_technician', $technician);
        if ($date_from != "1970-01-01") {
            $this->db->where('supply_info.date_created >=',DATE($date_from));
            $this->db->where('supply_info.date_created <=', DATE($date_to));
        }
        $technician = $this->session->userdata('user_type');
        if ($technician == 2) {
            $this->db->where('supply_info.id_technician', $_SESSION['user_id']);
        }
        $informtions = $this->db->get()->result();
        $register = array();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }
        return $register;
    }


    function fit_info($id) {
        $this->db->select('*');
        $this->db->from('supply_fit_register');
        $this->db->join('supply_fit_name', 'supply_fit_register.id_supply_fit_name =supply_fit_name.id_supply_fit_name', 'left');
        $this->db->where('supply_fit_register.id_supply_info', $id);
        return $query = $this->db->get()->result();
    }

}
