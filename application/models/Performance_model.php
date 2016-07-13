<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Performance_model  extends CI_Model  {
    
    function get_technician_dropdown() {
        $technicians = $this->db->get('technician')->result();

        $data = array();
        $data[''] = 'Select Technician';
        foreach ($technicians as $technician) {
            $data[$technician->user_id] = $technician->technician_name;
        }
        return form_dropdown('user_id', $data, NULL, ' class="form-control select2" required');
    }
    
        function get_user_name($user_id){
        $query = $this->db->get_where('technician',array('user_id' => $user_id));
        foreach($query->result() as $row){
            return $row->technician_name;
        }
    }
    
    function order_by_techncian($id,$date){
        
        $this->load->model('common_model');
        
        $date_range=$this->common_model->dateformatter($date);
        $con1="sample_result = 1 AND approved_by = 1 AND id_technician = $id AND DATE(date_created) BETWEEN $date_range";
        $con2="sample_result = 2 AND approved_by = 1 AND id_technician = $id AND DATE(date_created) BETWEEN $date_range";
        $con3="sample_result = 1 AND approved_by = 2 AND id_technician = $id AND DATE(date_created) BETWEEN $date_range";
        $con4="sample_result = 2 AND approved_by = 2 AND id_technician = $id AND DATE(date_created) BETWEEN $date_range";
        
        
        $count1=$this->row_count($con1);
        $count2=$this->row_count($con2);
        $count3=$this->row_count($con3);
        $count4=$this->row_count($con4);
        

        
       $data="[['Sample Result','Percentage'],
               ['Pass By UK',$count1],
               ['Fail By UK',$count2],
               ['Pass By BD',$count3],
               ['Fail By BD',$count4]
               ]";
       
       
    return $data;
    }
    
    function total_order_count($id,$date){
        $this->load->model('common_model');        
        $date_range=$this->common_model->dateformatter($date);
        $con="id_technician = $id AND DATE(date_created) BETWEEN $date_range";
        $total=$this->row_count($con);
        return $total;
    }
    
    function row_count($condition){
        
        $query=$this->db->query("SELECT COUNT(sample_result) as count_result FROM supply_info WHERE $condition");
//                $this->db->select('Count(sample_result) as count_result')
//                ->where($condition)->get('supply_info');
//        $lst=$this->db->last_query();
//        print_r($lst);
        foreach ($query->result() as $row)
        {
                return $row->count_result;
        }
    }
}
