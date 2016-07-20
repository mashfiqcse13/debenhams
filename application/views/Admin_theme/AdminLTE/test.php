
                                <?php

                                if (isset($all_informations)) {
                                    for ($i = 1; $i <= $max_supply_info->id_supply_info; $i++) {
                                        if (!empty($all_informations[$i][0]->id_supply_info)) {
                                             $fit['id_supply_info'][]=$all_informations[$i][0]->id_supply_info;
                                                $fit['id_supplyer'][]=$all_informations[$i][0]->id_supplyer; 
                                              $fit['supplyer_name'][]=$all_informations[$i][0]->supplyer_name;
                                                if (!empty($all_informations[$i][1][$i])) {                                                   
                                            $fit['fit_name'][]=$all_informations[$i][1][$i]['id_supply_fit_name'];                                  
                                                    
                                                }if (empty($all_informations[$i][1][$i])) {
                                                   
                                                }
                                               
                                                    if ($all_informations[$i][0]->sample_result == 1) {
                                                        $fit['result'][]=1;
                                                        
                                                    } else {
                                                        $fit['result'][]=2;
                                                        
                                                    }
                                                    
                                                
                                                
                                            
                                         
                                        }
                                    }
                                }

$fit_result=array();
 $c=count($fit['id_supply_info']);
for($i=1;$i <= $supplyer_count; $i++) { 
    
    $fit_total=0;
    for($j=0;$j<$c;$j++){
      
      
     
        if($fit['id_supplyer'][$j]==$i && $fit['result'][$j]==1){ 
                
                $fitr=$fit['fit_name'][$j];
                
                if($fit['fit_name'][$j]==1){
                    $fitr=$fitr*4;
                }elseif($fit['fit_name'][$j]==2){
                    $fitr=$fitr*3;
                }elseif($fit['fit_name'][$j]==3){
                    $fitr=$fitr*2;
                }elseif($fit['fit_name'][$j]==4){
                    $fitr=$fitr*1;
                }              
                $fit_total+=$fitr; 
        }
        
    }
    $name=$supplyername[$i];
    $fit_result[$name]=$fit_total;
}
echo '<pre>';
print_r($fit_result);

?>
