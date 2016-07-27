<?php include_once __DIR__ . '/../header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title; ?>
            <small>Qc Info</small>
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
            <div class="box-body">
                <?php
                $attributes = array(
                    'class' => 'form-horizontal',
                    'method' => 'get',
                    'name' => 'form',
                    'method' => 'post');
                echo form_open('qc_dashboard/save', $attributes)
                ?>
                <div class="form-group ">
                    <label class="col-md-3">Style No:</label>
                    <div class="col-md-9">
                        <select name="id_supply_style_no" id="" class="form-control select2">
                            <option value="blank">Select Style No</option>
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
                <div class="form-group ">
                    <label class="col-md-3">File Receive Date:</label>
                    <div class="col-md-9">
                        <input type="" name="file_receive_date"  placeholder="Add Date" class="form-control datepicker" value=""/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">PP Meeting Date:</label>
                    <div class="col-md-9">
                        <input type="" name="pp_meeting_date"  placeholder="Add Date" class="form-control datepicker" value="" />
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">In line Date:</label>
                    <div class="col-md-9">
                        <input type="" name="inline_date"  placeholder="Add Date" class="form-control datepicker" value=""/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Final Inspection Date:</label>
                    <div class="col-md-9">
                        <input type="" name="final_inspection_date"   placeholder="Add Date" class="form-control datepicker" value="" />
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Orders Comment:</label>
                    <div class="col-md-9">
                        <textarea name="orders_comment" rows="8" class="form-control" ></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Wash Approval Date:</label>
                    <div class="col-md-9">
                        <input type="" name="wash_approval_date"   placeholder="Add Date" class="form-control datepicker" value="" />
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Wash Comment:</label>
                    <div class="col-md-9">
                        <textarea name="wash_comment" rows="8"  class="form-control" ></textarea>
                    </div>
                </div>
                <button type="submit" name="btn_submit" value="true" id="save" class="btn btn-success pull-right">Save</button>
                <?= form_close(); ?>
            </div>
        </div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<script type="text/javascript">
    $('.datepicker').datepicker({
        autoclose: true
    });
    $('#save').click(function () {
        if (document.getElementsByName('id_supply_style_no')[0].value == 'blank') {
            alert('Please Select Style no !');
            return false;
        }
    });
</script>