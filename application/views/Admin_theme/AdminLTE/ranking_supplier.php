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

                <?php if(!empty($analysis)){ ?>
                <div class="row">
                    <div class="col-md-12">
                    <div class="box box-title">
                        <h2 class="text-center page-header">Supplier Rankng</h2>
                        <?php
                            $i=0;
                            foreach($ranking_supplyer['name'] as $row){ 
                        ?>
                        <p class="text-blue" style="padding-left: 50px;">Name of Supplier : <?=$ranking_supplyer['name'][$i];?> ( Total Order: <?=$ranking_supplyer['total_order'][$i];?> ) </p>
                        <?php 
                            $i++;
                            }
                        ?>
                        <hr>
                        <div id="chart_div"></div>
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
google.charts.setOnLoadCallback(drawMultSeries);

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
          title: 'Supplier Name'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    
      
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $analysis ; ?>);

        var options = {
          title: ' Pie Chart for Supplier Ranking '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>