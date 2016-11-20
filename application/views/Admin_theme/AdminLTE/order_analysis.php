<?php 

if(!$this->session->userdata('user_type') or $this->session->userdata('user_type')!=1){
            redirect('admin');
}
include_once 'header.php'; ?>

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

                <?php if(!empty($analysis)){ ?>
                <div class="row">
                    <div class="col-md-12">
                    <div class="box box-title">
                        <h2 class="text-center page-header">Total Order Analysis</h2>
                        <h4 class="text-center text-blue">Fit Sample Result Unfinished Order :  <?=$order_analysis['unfinished_order'];?></h4>
                        <h4 class="text-center text-blue">Fit Sample Result Finished Order :  <?=$order_analysis['total_finish_order'];?></h4><hr>
                        <table class="table table-bordered text-blue table-responsive table-striped" style="margin-left: 50px;max-width:600px;">
                            <tr>
                                <td>First Fit Sample Pass</td>
                                <td><?=$order_analysis['count_pass'][1];?></td>
                                <td>First Fit Sample Fail</td>
                                <td><?=$order_analysis['count_fail'][1];?></td>
                            </tr>
                            <tr>
                                <td>Second Fit Sample Pass</td>
                                <td><?=$order_analysis['count_pass'][2];?></td>
                                <td>Second Fit Sample Fail</td>
                                <td><?=$order_analysis['count_fail'][2];?></td>
                            </tr>
                            <tr>
                                <td>Third Fit Sample Pass</td>
                                <td><?=$order_analysis['count_pass'][3];?></td>
                                <td>Third Fit Sample Fail</td>
                                <td><?=$order_analysis['count_fail'][3];?></td>
                            </tr>
                            <tr>
                                <td>Fourth Fit Sample Pass</td>
                                <td><?=$order_analysis['count_pass'][4];?></td>
                                <td>Fourth Fit Sample Fail</td>
                                <td><?=$order_analysis['count_fail'][4];?></td>
                            </tr>
                            
                            <tr>
                                <td>Fifth Fit Sample Pass</td>
                                <td><?=$order_analysis['count_pass'][5];?></td>
                                <td>Fifth Fit Sample Fail</td>
                                <td><?=$order_analysis['count_fail'][5];?></td>
                            </tr>
                            
                        </table>
                    

                        <hr>
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
//google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable(<?=$analysis;?>);

      var options = {
        title: 'Here Highest Percentage Refers Highest Performance and Rank of Supplier',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Complete Order',
          minValue: 0
        },
        vAxis: {
          title: 'Fit Type By Pass/Fail'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    
      
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $analysis ; ?>);

        var options = {
          title: ' Total Order Analysis ( Analysis by pass/fail ) '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
