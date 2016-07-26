<?php ?>
<html>
    <head>
        <style type="text/css">
            .box-header{
                text-align: center;
            }
            .pull-right{
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="box-header">
            <h3><?= $this->config->item('SITE')['name'] ?></h3>
            <p > <?= $Title ?> Report</p>
            <div style="margin-bottom: 60px;">
                <p class="pull-left" style="margin-left:5px">Report Generated by: <?php echo $_SESSION['username'] ?></p>
            </div>
            <div style="color: #777777;">
                <!--<p class="pull-left" style="margin-left:5px"> <strong>Month : </strong> <?php echo date('F', now()); ?></p>-->
                <div class="pull-right">Report Date: <?php echo date('Y-m-d H:i:s', now()); ?></div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-condensed search_table" id="example1" border="1">
            <thead>
                <tr>
                    <th class="nowrap">Style No</th>
                    <th class="nowrap">File Receive Date</th>
                    <th>P.P Meeting Date:</th>
                    <th>In-Line Date</th>
                    <th>Final Inspection Date:</th>
                    <th>Created Date:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($get_all_qc_info as $all_informations) {
                    ?>
                    <tr>
                        <td class="nowrap"><?php echo $all_informations->style_no; ?></td>
                        <td class="nowrap"><?php echo date('d/m/Y', strtotime($all_informations->file_receive_date)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($all_informations->pp_meeting_date)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($all_informations->inline_date)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($all_informations->final_inspection_date)); ?></td>
                         <td><?php echo $all_informations->date_created; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>