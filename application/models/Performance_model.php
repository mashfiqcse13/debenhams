<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Performance_model extends CI_Model  {
    
    
    
    
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
        $this->load->model('Search_model');
        $total_supplyer=$this->db->get('supplyer');
        $this->load->library('session');
        $data=array();
        $data['all']=$this->Search_model->get_supply_info_with_fit_register();
        $count=array();
        foreach($total_supplyer->result() as $row){
            //$total_style=count($data['all']);
            $data['all_informations']= $this->Search_model->get_supply_info_with_fit_register_by_supplyer($row->id_supplyer);
//            for($i=1; $i >= $total_style; $i++){
//                
//                if($supplyer->id_supplyer == $data['all'][$i][0]->id_supplyer && $data['all'][$i][0]->sample_result == 1){
//                    $this->fit['id_supply_fit_name'] = $data['all'][$i][1][1]->id_supply_fit_name;
//                    $$this->fit['supply_fit_name'] = $data['all'][$i][1][1]->supply_fit_name;
//                    
//                    if($row->id_supply_fit_name==1){
//                        $$this->fit['count_result'] =$$this->fit['id_supply_fit_name']*4;
//                    }elseif($row->id_supply_fit_name==2){
//                        $$this->fit['count_result'] =$$this->fit['id_supply_fit_name']*3;
//                    }elseif($row->id_supply_fit_name==3){
//                        $$this->fit['count_result'] =$$this->fit['id_supply_fit_name']*2;
//                    }elseif($row->id_supply_fit_name==4){
//                       $$this->fit['count_result'] =$$this->fit['id_supply_fit_name']*1;
//                    }      
//                    
//                }
//            }
        //}
//        $val=$data;
//        $v=$data['all'][1][0]->id_supply_info;
        return $data;
    }
    }

//    function ranking_supplyer1(){
//        $this->load->model('Search_model');
//        $total_supplyer=$this->db->get('supplyer');
//        
//        $all_informations=$this->Search_model->get_supply_info_with_fit_register();
//        
//        $total_order=array();
//        $fit_result=array();
//        $rating=array();
//        
//        foreach($total_supplyer->result() as $row){
//            $con1=" id_supplyer = $row->id_supplyer AND sample_result=1 or sample_result=2 ";
//            $total_order[]=$this->row_count($con1);
//            
//            $con2=" id_supplyer = $row->id_supplyer AND sample_result is null or sample_result = '' ";
//            $unfinished_order[]=$this->row_count($con2);
//            
//
//        
//  
//        return $data;
//    }
//    
    function order_analysis(){
        
        $data['total_finish_order']=$this->row_count(' sample_result=1 or sample_result=2 ');
        $data['unfinished_order']=$unfinished_order=$this->row_count(' sample_result is null or sample_result = "" ');
        
        $fit=array();
        $fit[]=$fit1_pass=$this->row_count_fit(' id_supply_fit_name=1 AND sample_result=1 ');
        $fit[]=$fit2_pass=$this->row_count_fit(' id_supply_fit_name=2 AND sample_result=1 ');
        $fit[]=$fit3_pass=$this->row_count_fit(' id_supply_fit_name=3 AND sample_result=1 ');
        $fit[]=$fit4_pass=$this->row_count_fit(' id_supply_fit_name=4 AND sample_result=1 ');
        $fit[]=$fit1_fail=$this->row_count_fit(' id_supply_fit_name=1 AND sample_result=2 ');
        $fit[]=$fit2_fail=$this->row_count_fit(' id_supply_fit_name=2 AND sample_result=2 ');
        $fit[]=$fit3_fail=$this->row_count_fit(' id_supply_fit_name=3 AND sample_result=2 ');
        $fit[]=$fit4_fail=$this->row_count_fit(' id_supply_fit_name=4 AND sample_result=2 ');
        
        $data['fit']=$fit;
                
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=1 AND sample_result=1 ');
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=2 AND sample_result=1 ');
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=3 AND sample_result=1 ');
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=4 AND sample_result=1 ');
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=1 AND sample_result=2 ');
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=2 AND sample_result=2 ');
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=3 AND sample_result=2 ');
//        $fit[]=$this->row_count_fit(' id_supply_fit_name=4 AND sample_result=2 ');
//        
//        $data['fit']=$fit;

        $data['rating']="[['Analysis by pass  fail','Rating'],
               ['First Fit Sample Pass',$fit1_pass],
               ['Second Fit Sample Pass',$fit2_pass],
               ['Third Fit Sample Pass',$fit3_pass],
               ['Forth Fit Sample Pass',$fit4_pass],
               ['First Fit Sample Fail',$fit1_fail],
               ['Second Fit Sample Fail',$fit2_fail],
               ['Third Fit Sample Fail',$fit3_fail],
               ['Forth Fit Sample Fail',$fit4_fail],
               ['Unfinished Sample Result',$unfinished_order]
               ]";
//        
//        
//        
//        $data['total_order']=$total_order;
//        $data['fit_result']=$fit_result;
//        $data['rating']=$graph;
//        $data['name']=$name;
        
        
          
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
    
    function row_count($condition){
        
        $query=$this->db->query("SELECT COUNT(*) as count_result FROM supply_info WHERE $condition");
//        $lst=$this->db->last_query();
//        print_r($lst);
        foreach ($query->result() as $row)
        {
                return $row->count_result;
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
}