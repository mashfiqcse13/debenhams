<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Performance_model extends CI_Model  {
    
    
    
    
    function get_technician_dropdown() {
        $technicians = $this->db->query('SELECT id,type,username FROM `users` LEFT JOIN user_type ON users.id=user_type.user_id WHERE type=2')->result();

        $data = array();
        $data[''] = 'Select Technician';
        foreach ($technicians as $technician) {
            $data[$technician->id] = $technician->username;
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
        
        $fit_pass_query=$this->db->query("SELECT max(id_supply_fit_name) as max_value 
                FROM `supply_fit_register` left join supply_info on 
                supply_fit_register.id_supply_info=supply_info.id_supply_info 
                WHERE sample_result=1 and id_supply_fit_name BETWEEN 1 and 5 
                group by id_supply_style_no")->result();
        
        foreach($fit_pass_query as $row){
                $fit_pass[]=$row->max_value;
        }
        
        $fit_pass_result=  array_count_values($fit_pass);
            
        
            $count_pass=array();
            
            for($i=1;$i<=5;$i++){
                if(isset($fit_pass_result[$i])){
                    $count_pass[$i]=$fit_pass_result[$i];
                }else{
                    $count_pass[$i]=0;
                }
            }
            
            
        $fit_fail_query=$this->db->query("SELECT max(id_supply_fit_name) as max_value  
                        FROM `supply_fit_register` left join supply_info on 
                        supply_fit_register.id_supply_info=supply_info.id_supply_info 
                        WHERE sample_result=2 and id_supply_fit_name BETWEEN 1 and 5 
                        group by id_supply_style_no")->result();
            
        foreach($fit_fail_query as $row){
                $fit_fail[]=$row->max_value;
            }
            $fit_fail_result=  array_count_values($fit_fail);
        
            $count_fail=array();
            for($j=1;$j<=5;$j++){
                if(isset($fit_fail_result[$j])){
                    $count_fail[$j]=$fit_fail_result[$j];
                }else{
                    $count_fail[$j]=0;
                }
            }
            
            
            $fit1_pass=$count_pass[1];
            $fit2_pass=$count_pass[2];
            $fit3_pass=$count_pass[3];
            $fit4_pass=$count_pass[4];
            $fit5_pass=$count_pass[5];
                    
            $fit1_fail=$count_fail[1];
            $fit2_fail=$count_fail[2];
            $fit3_fail=$count_fail[3];
            $fit4_fail=$count_fail[4];
            $fit5_fail=$count_fail[5];
        
        $data['count_pass']=$count_pass;
        $data['count_fail']=$count_fail;
            
        $data['rating']="[['Analysis by pass  fail','Rating'],
               ['First Fit Sample Pass',$fit1_pass],
               ['Second Fit Sample Pass',$fit2_pass],
               ['Third Fit Sample Pass',$fit3_pass],
               ['Forth Fit Sample Pass',$fit4_pass],
               ['Fifth Fit Sample Pass',$fit5_pass],
               ['First Fit Sample Fail',$fit1_fail],
               ['Second Fit Sample Fail',$fit2_fail],
               ['Third Fit Sample Fail',$fit3_fail],
               ['Forth Fit Sample Fail',$fit4_fail],
               ['Fifth Fit Sample Fail',$fit5_fail],
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

        
        $result=$this->db->query("SELECT max(id_supply_fit_name) as max_value
                    FROM `supply_fit_register` 
                    left join supply_info on 
                    supply_fit_register.id_supply_info=supply_info.id_supply_info 
                    WHERE 
                    id_supplyer=$id $date_range and 
                    sample_result=1 and 
                    id_supply_fit_name BETWEEN 1 and 
                    5 group by id_supply_style_no")->result();
            
            foreach($result as $row){
                $fit[]=$row->max_value;
            }
            $fit_result=  array_count_values($fit);
            
        
            $count;
            
            for($i=1;$i<=5;$i++){
                if(isset($fit_result[$i])){
                    $count[$i]=$fit_result[$i];
                }else{
                    $count[$i]=0;
                }
            }
            
            $count1=$count[1];
            $count2=$count[2];
            $count3=$count[3];
            $count4=$count[4];
            $count5=$count[5];
        

        
        $data="[['Fit Type','Percentage'],
               ['First Fit Sample',$count1],
               ['Second Fit Sample',$count2],
               ['Third Fit Sample',$count3],
               ['Forth Fit Sample',$count4],
               ['Fifth Fit Sample',$count5]
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
        
        $con="sample_result is null or sample_result = '' AND $name = $id  $date_range";
        $total=$this->row_count($con);
        return $total;
    }
    
    
    function supplier_ranking(){
        
    }
} 