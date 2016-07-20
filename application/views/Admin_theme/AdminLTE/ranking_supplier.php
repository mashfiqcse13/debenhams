
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
    $order_count=0;
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
                $order_count++;
        }
        
    }
    $name=$supplyername[$i];
    $fit_result[$i]['rank']=$fit_total;
    $fit_result[$i]['order_count']=$order_count;
    $fit_result[$i]['name']=$name;
    
    
}
 $fit_result_count = count($fit_result);
        

        $graph="[['Supplier Name' , 'Ratting'],";
        for($i=1;$i<=$fit_result_count;$i++){
            $rating=($fit_result[$i]['rank']*100)/$fit_result[$i]['order_count'];
            $name=$fit_result[$i]['name'];
            $graph.="['$name',$rating],";
        }
        $graph.="]";

//echo '<pre>';
//print_r($fit_result);

?>

<?php include_once 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $Title; ?>
        <small> <?= $Title; ?></small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Performance Analysis</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

              </div>

            </div>
        </div>

                <?php if(!empty($graph)){ ?>
                <div class="row">
                    <div class="col-md-12">
                    <div class="box box-title">
                        <div class="row">
                            <h2 class="text-center page-header">Supplier Rankng</h2>
                            <div class="col-md-8">
                                <div id="chart_div"></div>
                                <hr>
                                <div id="piechart" style="width: 100%; height: 500px;"></div>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered" style="margin-left: -15px">
                                    <tr>
                                        <th>Name Of Supplier</th>
                                        <th>Toatal Order</th>
                                        
                                    </tr>
                                <?php
                            $i=0;
                            
                            for($i=1;$i<=$fit_result_count;$i++){
                        ?>
                            <tr>
                                <td> <?=$fit_result[$i]['name'];?></td><td><?=$fit_result[$i]['order_count'];?></td> 
                            </tr>
                           <?php 
                            
                            }
                            
                        ?>
                            </table>
                            </div>
                        </div>
                        
                        <div id="chart_div"></div>
                        
                        <div id="piechart" style="width: 100%; height: 500px;"></div>
                    </div> 
                    </div>
                </div>

                <?php } ?>
        


       
      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable(<?=$graph;?>);

      var options = {
        title: 'Here Highest Percentage Refers Highest Performance and Rank of Supplier',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Complete Order',
          minValue: 0
        },
        vAxis: {
          title: 'Supplier Name'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    
      
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $graph ; ?>);

        var options = {
          title: ' Pie Chart for Supplier Ranking '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
