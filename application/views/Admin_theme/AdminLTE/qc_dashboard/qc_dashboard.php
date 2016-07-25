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
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo site_url('qc_dashboard/add_new'); ?>" class="btn btn-success" style="margin: 10px 0 ;"/><i class="fa fa-plus"></i> Add New</a>
                        <a href="<?php echo site_url('pdf/qc_dashboard'); ?>" class="btn btn-bitbucket pull-right" style="margin: 10px 0 ;"/><i class="fa fa-file-pdf-o"></i> Download pdf</a>
                        <table class="table table-bordered table-striped table-condensed search_table" id="example1">
                            <thead>
                                <tr>
                                    <th class="nowrap">Style No</th>
                                    <th class="nowrap">File Receive Date</th>
                                    <th>P.P Meeting Date:</th>
                                    <th>In-Line Date</th>
                                    <th>Final Inspection Date:</th>
                                    <th>Actions</th>
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
        min-width: 132px;
        font-size: 13px;
        background: #DFF0D8;
        color: #000;
        text-align: center;
    }
</style>
<script type="text/javascript">
    $('#example1').DataTable({
        "scrollX": true,
        bFilter: false,
    });
    function check() {
        var chk = confirm('Are You Sure To Delete?');
        if (chk) {
            return true;
        }else{
            return false;
        }
    }
</script>