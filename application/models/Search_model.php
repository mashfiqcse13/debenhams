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
        $this->db->select('*');
        $this->db->from('supply_fit_register');
        $this->db->join('supply_fit_name', 'supply_fit_register.id_supply_fit_name = supply_fit_name.id_supply_fit_name', 'left');
        $this->db->where('id_supply_info', $id_supply_info);
        $this->db->order_by('id_supply_info', 'ASC');
//        $this->db->select_max('supply_fit_register.id_supply_fit_name');
        $fit_register = $this->db->get()->result();
        foreach ($fit_register as $fit) {
            $this->supply_fit_register_detail[$fit->id_supply_info] = array('id_supply_fit_name' => $fit->id_supply_fit_name, 'supply_fit_name' => $fit->name, 'date_send' => $fit->supply_fit_register_date_send, 'date_receive' => $fit->supply_fit_register_date_receive);
            ;
        }
        return $this->supply_fit_register_detail;
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
            $this->getregister($id_supply_info);
            return $this->supply_fit_register_detail;
        }
    }

    function get_supply_info_with_fit_register() {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session=supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department = department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer = supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician = users.id', 'left');
        $informtions = $this->db->get()->result();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }
        return $register;
    }

    function get_max_supply_info() {
        $this->db->select_max('id_supply_info');
        return $query = $this->db->get('supply_info')->row();
    }

    function select_all($tbl_name) {
        $this->db->select('*');
        $this->db->from($tbl_name);
        $query = $this->db->get();
        return $query->result();
    }

    function select_all_by_technician_id() {
        $this->db->select('*');
        $this->db->from('supply_style_no');
        $query = $this->db->get();
        return $query->result();
//        }
    }

    function search_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('mytable');
    }

    function get_supply_info_with_fit_register_by_style_no($id_supply_style_no) {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session = supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department =department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer =supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician =users.id', 'left');
        $this->db->where('supply_info.id_supply_style_no', $id_supply_style_no);
        $informtions = $this->db->get()->result();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }
        return $register;
    }

    function get_supply_info_with_fit_register_by_supplyer($id_supplyer) {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session = supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department =department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer =supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician =users.id', 'left');
        $this->db->where('supply_info.id_supplyer', $id_supplyer);
        $informtions = $this->db->get()->result();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }
        return $register;
    }

    function get_supply_info_with_fit_register_by_department($id_department) {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session = supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department =department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer =supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician =users.id', 'left');
        $this->db->where('supply_info.id_department', $id_department);
        $informtions = $this->db->get()->result();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }
        return $register;
    }

    function get_supply_info_with_fit_register_by_sample($sample_result) {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session = supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department =department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer =supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician =users.id', 'left');
        $this->db->where('supply_info.sample_result', $sample_result);
        $informtions = $this->db->get()->result();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }
        return $register;
    }

    function get_supply_info_with_fit_register_by_technician($technican) {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session = supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department =department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer =supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician =users.id', 'left');
        $this->db->where('supply_info.id_technician', $sample_result);
        $informtions = $this->db->get()->result();
        foreach ($informtions as $info) {
            $register[$info->id_supply_info] = array($info, $this->get_fit_register_detail_by($info->id_supply_info));
        }
        return $register;
    }

    function get_supply_info_with_fit_register_by_date($date_from, $date_to) {
        $this->db->select('*,supply_session.name as supply_name,department.name as department_name,supplyer.name as supplyer_name');
        $this->db->from('supply_info');
        $this->db->join('supply_session', 'supply_info.id_supply_session = supply_session.id_supply_session', 'left');
        $this->db->join('supply_style_no', 'supply_info.id_supply_style_no = supply_style_no.id_supply_style_no', 'left');
        $this->db->join('department', 'supply_info.id_department =department.id_department', 'left');
        $this->db->join('supplyer', 'supply_info.id_supplyer =supplyer.id_supplyer', 'left');
        $this->db->join('users', 'supply_info.id_technician =users.id', 'left');
        $this->db->where('supply_info.date_created >=', $date_from);
        $this->db->where('supply_info.date_created <=', $date_to);
        $informtions = $this->db->get()->result();

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
