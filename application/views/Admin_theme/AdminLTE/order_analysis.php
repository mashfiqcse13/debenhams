<?php 
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
                        

                         
                        <table class="table table-bordered text-blue" style="margin-left: 50px;max-width:600px;">
                            <tr>
                                <th>Total Finished Order</th>
                                <th><?=$order_analysis['total_finish_order'];?></th>
                                <th>Unfinished Order</th>
                                <th><?=$order_analysis['unfinished_order'];?></th>
                            </tr>
                            <tr>
                                <td>First Fit Sample Pass</td>
                                <td><?=$order_analysis['fit'][0];?></td>
                                <td>First Fit Sample Fail</td>
                                <td><?=$order_analysis['fit'][4];?></td>
                            </tr>
                            <tr>
                                <td>Second Fit Sample Pass</td>
                                <td><?=$order_analysis['fit'][1];?></td>
                                <td>Second Fit Sample Fail</td>
                                <td><?=$order_analysis['fit'][5];?></td>
                            </tr>
                            <tr>
                                <td>Third Fit Sample Pass</td>
                                <td><?=$order_analysis['fit'][2];?></td>
                                <td>Third Fit Sample Fail</td>
                                <td><?=$order_analysis['fit'][6];?></td>
                            </tr>
                            <tr>
                                <td>Forth Fit Sample Pass</td>
                                <td><?=$order_analysis['fit'][3];?></td>
                                <td>Forth Fit Sample Fail</td>
                                <td><?=$order_analysis['fit'][7];?></td>
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
          title: 'Fit Type By Pass Fail'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    
      
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $analysis ; ?>);

        var options = {
          title: ' Total Order Analysis ( Analysis by pass fail ) '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
