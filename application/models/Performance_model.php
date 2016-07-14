<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Performance_model  extends CI_Model  {
    
    function get_technician_dropdown() {
        $technicians = $this->db->query('SELECT DISTINCT `id_technician` ,username FROM `supply_info` 
                LEFT JOIN users on supply_info.id_technician=users.id')->result();

        $data = array();
        $data[''] = 'Select Technician';
        foreach ($technicians as $technician) {
            $data[$technician->id_technician] = $technician->username;
        }
        return form_dropdown('user_id', $data, NULL, ' class="form-control select2" required');
    }
    
   function get_supplier_dropdown() {
        $suppliers = $this->db->get('supplyer')->result();

        $data = array();
        $data[''] = 'Select Supplier';
        foreach ($suppliers as $supplier) {
            $data[$supplier->id_supplyer] = $supplier->name;
        }
        return form_dropdown('id_supplyer', $data, NULL, ' class="form-control select2" required');
    }
    
    function get_technician_name($user_id){
        $query = $this->db->get_where('users',array('id' => $user_id));
        foreach($query->result() as $row){
            return $row->username;
        }
    }
    
    function get_supplier_name($user_id){
        $query = $this->db->get_where('supplyer',array('id_supplyer' => $user_id));
        foreach($query->result() as $row){
            return $row->name;
        }
    }
    
    function ranking_supplyer(){
        $total_supplyer=$this->db->get('supplyer');
        
        $total_order=array();
        $fit_result=array();
        $rating=array();
        
        foreach($total_supplyer->result() as $row){
            $total_order[]=$this->supplyer_row_count($row->id_supplyer);
            
            $fit=$this->db->query("SELECT 
                                    id_supply_fit_name,
                                    count(id_supply_fit_name) as count                                    
                                    FROM `supply_info` left JOIN supply_fit_register ON
                                    supply_info.id_supply_info=supply_fit_register.id_supply_info 
                                    WHERE 
                                    id_supplyer = $row->id_supplyer and 
                                    sample_result = 1 
                                    group by (id_supply_fit_name) ");
            
            $fit_total=0;
            foreach($fit->result() as $row){
                $fit=$row->count;
                
                if($row->id_supply_fit_name==1){
                    $fit=$fit*4;
                }elseif($row->id_supply_fit_name==2){
                    $fit=$fit*3;
                }elseif($row->id_supply_fit_name==3){
                    $fit=$fit*2;
                }elseif($row->id_supply_fit_name==4){
                    $fit=$fit*1;
                }              
                $fit_total+=$fit;
                
            }
            $fit_result[]=$fit_total;
            

            
            
        }
        // $rating[]=($fit_result[$i]*100)/$total_order[$i];
               // $max = count($data['ranking_supplyer']['total_order']);
        
        $i=0;
        $graph="[['Supplier Name' , 'Ratting'],";
        foreach($total_order as $row){
            if($total_order[$i]== 0){
                $i++;
                continue;
                
            }else{
                $rating=($fit_result[$i]*100)/$total_order[$i];
            }
            $name[$i]=$this->get_supplier_name($i+1);
            $graph.="['$name[$i]]',$rating],";
            $i++;
        }
        $graph.="]";
        
        
        
        $data['total_order']=$total_order;
        $data['fit_result']=$fit_result;
        $data['rating']=$graph;
        $data['name']=$name;
        
        
          
        return $data;
    }
    

    
    function supplyer_row_count($id){
        
        $query=$this->db->query("SELECT COUNT(*) as count FROM supply_info WHERE id_supplyer=$id");
        foreach($query->result() as $row){
            return $row->count;
        }
    }
    
    function order_by_techncian($id,$date){
        
        $this->load->model('common_model');
        
        if(empty($date) || $date==''){
            $date_range='';
        }
        if(!empty($date)){
            $date=$this->common_model->dateformatter($date);
            $date_range="AND DATE(date_created) BETWEEN $date";
        }
        $con1="sample_result = 1 AND approved_by = 1 AND id_technician = $id  $date_range";
        $con2="sample_result = 2 AND approved_by = 1 AND id_technician = $id  $date_range";
        $con3="sample_result = 1 AND approved_by = 2 AND id_technician = $id  $date_range";
        $con4="sample_result = 2 AND approved_by = 2 AND id_technician = $id  $date_range";
        
        
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
    
    function supplier_performance_by_pass_fail($id,$date){
        
        $this->load->model('common_model');        
        if(empty($date) || $date==''){
            $date_range='';
        }
        if(!empty($date)){
            $date=$this->common_model->dateformatter($date);
            $date_range="AND DATE(date_created) BETWEEN $date";
        }
        
        $con1="sample_result = 1 AND approved_by = 1 AND id_supplyer = $id  $date_range";
        $con2="sample_result = 2 AND approved_by = 1 AND id_supplyer = $id  $date_range";
        $con3="sample_result = 1 AND approved_by = 2 AND id_supplyer = $id  $date_range";
        $con4="sample_result = 2 AND approved_by = 2 AND id_supplyer = $id  $date_range";
        
        
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
    
    function supplier_performance_by_fittype($id,$date){
        
        $this->load->model('common_model');        
        
        
        if(empty($date) || $date==''){
            $date_range='';
        }
        if(!empty($date)){
            $date=$this->common_model->dateformatter($date);
            $date_range="AND DATE(date_created) BETWEEN $date";
        }
        
        $con1="id_supply_fit_name = 1 AND id_supplyer = $id  $date_range";
        $con2="id_supply_fit_name = 2 AND id_supplyer = $id  $date_range";
        $con3="id_supply_fit_name = 3 AND id_supplyer = $id  $date_range";
        $con4="id_supply_fit_name = 4 AND id_supplyer = $id  $date_range";
        
        $count1=$this->row_count_fit($con1);
        $count2=$this->row_count_fit($con2);
        $count3=$this->row_count_fit($con3);
        $count4=$this->row_count_fit($con4);
        
        $data="[['Fit Type','Percentage'],
               ['First Fit Sample',$count1],
               ['Second Fit Sample',$count2],
               ['Third Fit Sample',$count3],
               ['Forth Fit Sample',$count4]
               ]";
        
        
        return $data; 
        
    }
    
    function row_count_fit($condition){
        
        $query=$this->db->query("SELECT COUNT(*) as count_result FROM supply_info LEFT JOIN supply_fit_register on
                                supply_info.id_supply_style_no=supply_fit_register.id_supply_info 
                                WHERE $condition");
        foreach ($query->result() as $row)
        {
                return $row->count_result;
        }
    }
    
    function total_order_count($id,$date,$name){
        $this->load->model('common_model'); 
        if(empty($date) || $date==''){
            $date_range='';
        }
        if(!empty($date)){
            $date=$this->common_model->dateformatter($date);
            $date_range="AND DATE(date_created) BETWEEN $date";
        }
        
        $con="$name = $id $date_range";
        $total=$this->row_count($con);
        return $total;
    }
    
    function unpased_order_count($id,$date,$name){
        $this->load->model('common_model');
        if(empty($date) || $date==''){
            $date_range='';
        }
        if(!empty($date)){
            $date=$this->common_model->dateformatter($date);
            $date_range="AND DATE(date_created) BETWEEN $date";
        }
        
        $con="sample_result != 1 AND sample_result !=2 AND $name = $id  $date_range";
        $total=$this->row_count($con);
        return $total;
    }

 
    function row_count($condition){
        
        $query=$this->db->query("SELECT COUNT(sample_result) as count_result FROM supply_info WHERE $condition");
//        $lst=$this->db->last_query();
//        print_r($lst);
        foreach ($query->result() as $row)
        {
                return $row->count_result;
        }
    }
}
