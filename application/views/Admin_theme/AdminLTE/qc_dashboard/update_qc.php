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
                    'name' => 'form',
                    'method' => 'post');
                echo form_open('qc_dashboard/update', $attributes);
                foreach ($get_all_qc_info as $info){
                ?>
                <div class="form-group ">
                    <label class="col-md-3">Style No:</label>
                    <div class="col-md-9">
                            <p name><?php echo $info->style_no; ?></p>
                            <input type="hidden" name="id_qc_info" value="<?php echo $info->id_qc_info;?>" />
                            <input type="hidden" name="id_supply_style_no" value="<?php echo $info->id_supply_style_no;?>" />
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">File Receive Date:</label>
                    <div class="col-md-9">
                        <input type="" name="file_receive_date"  placeholder="Add Date" class="form-control datepicker" 
                               value="<?php if(date('m/d/Y',strtotime($info->file_receive_date))=='11/30/-0001'){echo '';}else{echo date('m/d/Y',strtotime($info->file_receive_date));}?>"/>
                        <input type="hidden" name="id_qc_info" value="<?php echo $info->id_qc_info;?>"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">PP Meeting Date:</label>
                    <div class="col-md-9">
                        <input type="" name="pp_meeting_date"  placeholder="Add Date" class="form-control datepicker"  
                               value="<?php if(date('m/d/Y',strtotime( $info->pp_meeting_date))=='11/30/-0001'){echo '';}else{echo date('m/d/Y',strtotime( $info->pp_meeting_date));}?>"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">In line Date:</label>
                    <div class="col-md-9">
                        <input type="" name="inline_date"  placeholder="Add Date" class="form-control datepicker"  
                               value="<?php if(date('m/d/Y',strtotime($info->inline_date))=='11/30/-0001'){echo '';}else{echo date('m/d/Y',strtotime($info->inline_date));}?>"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Final Inspection Date:</label>
                    <div class="col-md-9">
                        <input type="" name="final_inspection_date"   placeholder="Add Date" class="form-control datepicker"  
                               value="<?php if(date('m/d/Y',strtotime($info->final_inspection_date))=='11/30/-0001'){echo '';}else{echo date('m/d/Y',strtotime($info->final_inspection_date));}?>"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Orders Comment:</label>
                    <div class="col-md-9">
                        <textarea name="orders_comment" rows="8" class="form-control" ><?php echo $info->orders_comment; ?></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Wash Approval Date:</label>
                    <div class="col-md-9">
                        <input type="" name="wash_approval_date"   placeholder="Add Date" class="form-control datepicker" value="<?php if(date('m/d/Y',strtotime($info->wash_approval_date))=='11/30/-0001'){echo '';}else{echo date('m/d/Y',strtotime($info->wash_approval_date));}?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-md-3">Wash Comment:</label>
                    <div class="col-md-9">
                        <textarea name="wash_comment" rows="8"  class="form-control" ><?php echo $info->wash_comment; ?></textarea>
                    </div>
                </div>
                <button type="submit" name="btn_submit" value="true" id="save" class="btn btn-success pull-right" style="padding: 10px 30px; font-weight: bold;">Update</button>
                <?php
                }?>
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
    
    $("input").each(function () {
        var curTable = $(this).val();
        if (curTable == "01/01/1970" || curTable == "11/30/-0001") {
            $(this).val('   ')
        }
    });
    
    $('#save').click(function () {
        if (document.getElementsByName('id_supply_style_no')[0].value == 'blank') {
            alert('Please Select Style no !');
            return false;
        }
    });
     
</script>
