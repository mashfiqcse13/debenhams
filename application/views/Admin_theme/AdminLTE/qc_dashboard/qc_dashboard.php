<?php include_once __DIR__ . '/../header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title ?>
            <small>All QC Information</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <?php
                $attributes = array(
                    'class' => 'form-horizontal',
                    'method' => 'get',
                    'name' => 'form',
                    'method' => 'get');
                echo form_open('qc_dashboard', $attributes)
                ?>
                <div class="row col-md-offset-2">
                    <div class="col-md-8 ">
                        <div class="form-group ">
                            <label class="col-md-3">Style No:</label>
                            <div class="col-md-9">
                                <select name="id_supply_style_no" id="" class="form-control select2">
                                    <option value="">Select Style No</option>
                                    <?php
                                    foreach ($all_style_no as $style_no) {
                                        ?>
                                        <option value="<?php echo $style_no->id_supply_style_no; ?>"><?php echo $style_no->style_no; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <?= anchor(current_url() . '', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                    </div>
                </div>

                <?= form_close(); ?>
                <?php
                $attributes = array(
                    'class' => 'form-horizontal',
                    'name' => 'form',
                    'method' => 'get');
                echo form_open('qc_dashboard', $attributes)
                ?>
                <div class="row col-md-offset-2">
                    <div class="col-md-8 ">
                        <div class="form-group ">
                            <label class="col-md-3">Search with Date Range:</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="date_range" value="<?= isset($date_range) ? $date_range : ''; ?>" class="form-control pull-right" id="reservation"  title="This is not a date"/>
                                </div><!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <?= anchor(current_url() . '', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                    </div>
                </div>

                <?= form_close(); ?>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $success = $this->session->userdata('message');
                        if (isset($success)) {
                            echo $success;
                        }
                        $this->session->unset_userdata('message');
                        ?>
                        <a href="<?php echo site_url('qc_dashboard/add_new'); ?>" class="btn btn-success" style="margin: 10px 0 ;"/><i class="fa fa-plus"></i> Add New</a>
<!--                        <a href="<?php echo site_url('pdf/qc_dashboard'); ?>" class="btn btn-bitbucket pull-right" style="margin: 10px 0 ;"/><i class="fa fa-file-pdf-o"></i> Download pdf</a> -->
                        <a class="btn btn-primary pull-right" style="margin: 10px 0 ;margin-right:10px;" href="<?= site_url('Excel/qc_dashboard_excel'); ?>"><i class="fa fa-table"></i> Download as Excel </a>
                        <a class="btn btn-primary pull-right" style="margin: 10px 0 ;margin-right:10px;" href="<?= site_url('Excel/qc_dashboard_csv'); ?>"><i class="fa fa-table"></i> Download as CSV </a>

                        <table class="table table-bordered table-striped table-condensed search_table" id="example1">
                            <thead>
                                <tr>
                                    <th class="nowrap">Style No</th>
                                    <th style="display:none;"></th>
                                    <th class="nowrap">File Hand Over Date</th>
                                    <th class="nowrap">File Receive Date</th>
                                    <th>P.P Meeting Date</th>
                                    <th>Wash Approval Date</th>
                                    <th style="min-width: 250px;">Wash Comment</th>
                                    <th>In-Line Date</th>
                                    <th>Final Inspection Date</th>
                                    <th style="min-width: 250px;">Orders Comment</th>                                    
                                    <th>Data Entry Date of QC</th>
                                    <th>Last Modified Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($get_all_qc_info as $all_informations) {
                                    ?>
                                    <tr>
                                        <td class="nowrap"><?php echo $all_informations->style_no; ?></td>
                                        <td style="display:none;"><?php echo $all_informations->id_qc_info; ?></td>
                                        <td class="nowrap"><?php echo (date('d/m/Y', strtotime($all_informations->file_hand_over_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->file_hand_over_date)) == '01/01/1970') ? '' : date('d/m/Y', strtotime($all_informations->file_hand_over_date)); ?></td>
                                            <td class="nowrap"><?php echo (date('d/m/Y', strtotime($all_informations->file_receive_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->file_receive_date)) == '01/01/1970') ? '' : date('d/m/Y', strtotime($all_informations->file_receive_date)); ?></td>
                                         <td><?php echo (date('d/m/Y', strtotime($all_informations->pp_meeting_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->pp_meeting_date)) == '01/01/1970') ? '' : date('d/m/Y', strtotime($all_informations->pp_meeting_date)); ?></td>
                                        <td><?php echo (date('d/m/Y', strtotime($all_informations->wash_approval_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->wash_approval_date)) == '01/01/1970')? '' :date('d/m/Y', strtotime($all_informations->wash_approval_date)); ?></td>
                                        <td class="justy"><?php echo $all_informations->wash_comment; ?></td>
                                        <td><?php echo (date('d/m/Y', strtotime($all_informations->inline_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->inline_date)) == '01/01/1970')? '' :date('d/m/Y', strtotime($all_informations->inline_date)); ?></td>
                                        <td><?php echo (date('d/m/Y', strtotime($all_informations->final_inspection_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->final_inspection_date)) == '01/01/1970') ? '' : date('d/m/Y', strtotime($all_informations->final_inspection_date)); ?></td>
                                        <td class="justy"><?php echo $all_informations->orders_comment; ?></td>
                                        <td><?php echo $all_informations->date; ?></td>
                                        <td><?php if($all_informations->last_modified_qc=='0000-00-00 00:00:00' || $all_informations->last_modified_qc=='11/30/-0001'){echo '';}else{echo $all_informations->last_modified_qc;} ?></td>
                                        <td><a href="<?= site_url('qc_dashboard/reduce/' . $all_informations->id_qc_info); ?>" type="button" class="btn btn-success" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?= site_url('qc_dashboard/delete/' . $all_informations->id_qc_info); ?>" onclick="return check();"type="button" class="btn btn-danger" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<style>
    .search_table th {
        min-width: 142px;
        font-size: 13px;
        background: #DFF0D8;
        color: #000;
        text-align: center;
    }
    table{text-align: center;}
    .justy{
        text-align: justify;
    }
</style>
<script type="text/javascript">
    $('#example1').DataTable({
        "scrollX": true,
        bFilter: false,
        "order": [[1, "desc"]]
    });
    setTimeout(function () {
        $('#message').fadeOut();
    }, 1000);


    function check() {
        var chk = confirm('Are You Sure To Delete?');
        if (chk) {
            return true;
        } else {
            return false;
        }
    }

    $("table tr td").each(function () {
        var curTable = $(this).html();
        if (curTable == "01/01/1970" || curTable =='30/11/-0001') {
            $(this).html(' ')
        }
    });
</script>