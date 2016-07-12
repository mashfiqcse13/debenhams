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
<div class="box-body">
                    <?php
                    $attributes = array(
                        'clase' => 'form-inline',
                        'method' => 'post');
                    echo form_open('', $attributes)
                            //echo form_open(base_url() . "index.php/bank/management_report", $attributes)
                    ?>
                    <div class="row">

                        <div class="col-md-5">
                            <div class="form-group col-md-4 text-left">
                                <label>Select Technician:</label>                        
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <?php echo $technician_dropdown; ?>

                                    </select>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>

                    <div class="col-md-7">
                    <div class="form-group col-md-4 text-left">

                        <label>Date Range:</label>
                    </div>
                    <div class="form-group col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="date_range" value="<?= isset($date_range) ? $date_range : ''; ?>" class="form-control pull-right" id="reservation"  title="This is not a date"/>
                            <br>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <div class="form-group col-md-3">
                    <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <?= anchor(current_url() . '/', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                    </div></div></div>
                    <?= form_close(); ?>
                    <?php ?>
                </div>
              </div>

            </div>
        </div>

        <div id="piechart" style="width: 100%; height: 500px;"></div>

       
      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $analysis ; ?>);

        var options = {
          title: 'Tecnician Performance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
