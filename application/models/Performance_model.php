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
            $data[$technician->id_technician] = $technician->technician_name;
        }
        return form_dropdown('id_technician', $data, NULL, ' class="form-control select2" required');
    }
    
    function order_by_techncian($id){
        
        $con1=array('sample_result' => 1, 'approved_by' => 1, 'id_technician' => $id);    
        $con2=array('sample_result' => 2, 'approved_by' => 1, 'id_technician' => $id); 
        $con3=array('sample_result' => 1, 'approved_by' => 2, 'id_technician' => $id); 
        $con4=array('sample_result' => 2, 'approved_by' => 2, 'id_technician' => $id); 
        
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
    
    function row_count($condition){
        $query=$this->db->select('Count(sample_result) as count_result')
                ->where($condition)->get('supply_info');
        
        foreach ($query->result() as $row)
        {
                return $row->count_result;
        }
    }
}
