<?php include_once __DIR__ . '/../header.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$Title;?>
        <small>Insert Various Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Insert Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box">

                    <?php
                    if ($this->uri->segment(3) == 'add') {
                        $attributes = array(
                            'class' => 'form-horizontal',
                            'method' => 'get',
                            'name' => 'form',
                            'method' => 'post');
                        echo form_open('supply_info/save_info', $attributes)
                        ?>
                        <div class="box-header">
                            <h2>Insert Info</h2>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3">Style No:</label>
                                        <div class="col-md-9">
                                            <select name="id_supply_style_no" id="" class="form-control select2">
                                                <option value="0">Select Style No</option>
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
                                        <label class="col-md-3">Session:</label>
                                        <div class="col-md-9">
                                            <select name="id_supply_session" id="" class="form-control select2">
                                                <option value="0">Select Session No</option>
                                                <?php
                                                foreach ($all_session as $session) {
                                                    ?>
                                                    <option value="<?php echo $session->id_supply_session; ?>"><?php echo $session->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Department:</label>
                                        <div class="col-md-9">
                                            <select name="id_department" id="" class="form-control select2">
                                                <option value="0">Select Department No</option>
                                                <?php
                                                foreach ($all_department as $department) {
                                                    ?>
                                                    <option value="<?php echo $department->id_department; ?>"><?php echo $department->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Style Description:</label>
                                        <div class="col-md-9">
                                            <textarea name="style_description" class="form-control" id="" rows="5"></textarea>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Supplier:</label>
                                        <div class="col-md-9">
                                            <select name="id_supplyer" id="" class="form-control select2">
                                                <option value="0">Select Supplier</option>
                                                <?php
                                                foreach ($all_supplyer as $supplyer) {
                                                    ?>
                                                    <option value="<?php echo $supplyer->id_supplyer; ?>"><?php echo $supplyer->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Production Step Name:</label>
                                        <div class="col-md-9">
                                            <select name="id_supply_fit_name" id="fit_name" class="form-control select2">
                                                <option value="0">Select Fit Name</option>
                                                <?php
                                                foreach ($all_fit_name as $fit) {
                                                    ?>
                                                    <option value="<?php echo $fit->id_supply_fit_name; ?>"><?php echo $fit->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group " id="send">
                                        <label class="col-md-3" >Send:</label>
                                        <div class="col-md-9">
                                            <input type="" class="form-control datepicker" name="supply_fit_register_date_send" placeholder="Add Date"/>
                                        </div>
                                    </div>
                                    <div class="form-group " id="receive">
                                        <label class="col-md-3" >Receive:</label>
                                        <div class="col-md-9">
                                            <input type="" class="form-control datepicker" name="supply_fit_register_date_receive" placeholder="Add Date"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3">Sample Result:</label>
                                        <div class="col-md-9">
                                            <select name="sample_result" id="" class="form-control select2">
                                                <option value="0">Select Sample Result</option>
                                                <option value="1">Pass</option>
                                                <option value="2">Fail</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Approved By:</label>
                                        <div class="col-md-9">
                                            <select name="approved_by" id="" class="form-control select2">
                                                <option value="0">Select Approved By</option>
                                                <option value="1">United Kingdom</option>
                                                <option value="2">Bangladesh</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Lab Test Report:</label>
                                        <div class="col-md-9">
                                            <select name="lab_test_report" id="" class="form-control select2">
                                                <option value="0">Select Lab Test Report</option>
                                                <option value="1">Pass</option>
                                                <option value="2">Fail</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Patter Block:</label>
                                        <div class="col-md-9">
                                            <select name="pattern_block" id="" class="form-control select2">
                                                <option value="0">Select Pattern Block</option>
                                                <option value="1">United Kingdom</option>
                                                <option value="2">Bangladesh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Remark:</label>
                                        <div class="col-md-9">
                                            <textarea name="remark" class="form-control "id="" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit"  value="Save" class="btn btn-primary pull-right"/>
                        </div>

                        <?= form_close(); ?>
                        <?php
                    } else if ($this->uri->segment(3) == 'edit') {
                        $attributes = array(
                            'class' => 'form-horizontal',
                            'method' => 'get',
                            'name' => 'form',
                            'method' => 'post');
                        echo form_open('supply_info/update_info', $attributes)
                        ?>
                        <div class="box-header">
                            <h2>Insert Info</h2>
                        </div>
                        <div class="box-body">
                            <?php
                            foreach ($all_supply_info as $value) {
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="col-md-3">Style No:</label>
                                            <div class="col-md-9">
                                                <p><?php echo $value->style_no; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Session:</label>
                                            <div class="col-md-9">
                                                <select name="id_supply_session" id="" class="form-control select">
                                                    <option value="0">Select Session No</option>
                                                    <?php
                                                    foreach ($all_session as $session) {
                                                        ?>
                                                        <option value="<?php echo $session->id_supply_session; ?>"><?php echo $session->name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    <input type="hidden" name="id_supply_info" value="<?php echo $value->id_supply_info; ?>" id="id_supply_info"/>
                                                    <input type="hidden" name="id_fit" value="<?php // echo $value->id_supply_fit_register;          ?>" id="id_fit"/>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Department:</label>
                                            <div class="col-md-9">
                                                <select name="id_department" id="" class="form-control select">
                                                    <option value="0">Select Department No</option>
                                                    <?php
                                                    foreach ($all_department as $department) {
                                                        ?>
                                                        <option value="<?php echo $department->id_department; ?>"><?php echo $department->name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Style Description:</label>
                                            <div class="col-md-9">
                                                <textarea name="style_description" class="form-control" id="" rows="5"><?php echo $value->style_description; ?></textarea>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Supplier:</label>
                                            <div class="col-md-9">
                                                <select name="id_supplyer" id="" class="form-control select">
                                                    <option value="0">Select Supplier</option>
                                                    <?php
                                                    foreach ($all_supplyer as $supplyer) {
                                                        ?>
                                                        <option value="<?php echo $supplyer->id_supplyer; ?>"><?php echo $supplyer->name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <?php
                                        foreach ($all_supply_fit_register as $register) {
                                            ?>
                                            <div class="form-group ">
                                                <label class="col-md-3">Fit Name:</label>
                                                <div class="col-md-9">
                                                    <select name="id_supply_fit_name" id="fit_name" class="form-control select" required>
                                                        <option value="0">Select Fit Name</option>
                                                        <?php
                                                        foreach ($all_fit_name as $fit) {
                                                            ?>
                                                            <option value="<?php echo $fit->id_supply_fit_name; ?>"><?php echo $fit->name; ?></option>
                                                            <?php
                                                        }
                                                        ?>

                                                    </select>
                                                    <input type="hidden"  name="id_supply_fit_register" value="<?php echo $register->id_supply_fit_register; ?>"/>
                                                </div>
                                            </div>

                                            <div class="form-group " id="send">
                                                <label class="col-md-3" >Send:</label>
                                                <div class="col-md-9">
                                                    <input type="" class="form-control datepicker" name="supply_fit_register_date_send" value="<?php // echo $register->supply_fit_register_date_send;          ?>" placeholder="Add Date"/>

                                                </div>
                                            </div>
                                            <div class="form-group " id="receive">
                                                <label class="col-md-3" >Receive:</label>
                                                <div class="col-md-9">
                                                    <input type="" class="form-control datepicker" name="supply_fit_register_date_receive" value="<?php // echo $register->supply_fit_register_date_receive;          ?>" placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="form-group ">
                                            <label class="col-md-3">Sample Result:</label>
                                            <div class="col-md-9">
                                                <select name="sample_result" id="" class="form-control select">
                                                    <option value="0">Select Sample Result</option>
                                                    <option value="1">Pass</option>
                                                    <option value="2">Fail</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Approved By:</label>
                                            <div class="col-md-9">
                                                <select name="approved_by" id="" class="form-control select">
                                                    <option value="0">Select Approved By</option>
                                                    <option value="1">United Kingdom</option>
                                                    <option value="2">Bangladesh</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Lab Test Report:</label>
                                            <div class="col-md-9">
                                                <select name="lab_test_report" id="" class="form-control select">
                                                    <option value="0">Select Lab Test Report</option>
                                                    <option value="1">Pass</option>
                                                    <option value="2">Fail</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Patter Block:</label>
                                            <div class="col-md-9">
                                                <select name="pattern_block" id="" class="form-control select">
                                                    <option value="0">Select Pattern Block</option>
                                                    <option value="1">United Kingdom</option>
                                                    <option value="2">Bangladesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Remark:</label>
                                            <div class="col-md-9">
                                                <textarea name="remark" class="form-control "id="" rows="5"><?php echo $value->remark; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit"  value="Update" class="btn btn-success pull-right" style="margin-right: 10px"/>
                                    <?php
                                }
                                ?>
                            </div>

                            <?= form_close(); ?>
                            <?php
                        } else {
                            echo $glosary->output;
                        }
                        ?>

                    </div>

                </div>
            </div>




 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<script type="text/javascript">
    $('.datepicker').datepicker();
    $('#send').hide();
    $('#receive').hide();
    $(".select2").select2();
    $('#fit_name').change(function () {
        var select = $("#fit_name option:selected").val();
//        alert(select);
        if (select == 0) {
            $('#send').hide();
            $('#receive').hide();
        }
        if (select != 0) {
            $.post("<?php echo base_url(); ?>index.php/supply_info/fit_info", {"id_supply_fit_name": select});
            var id = select;
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/supply_info/fit_info',
                data: {'id_supply_fit_name': id},
                dataType: 'text',
                type: 'POST',
                success: function (data) {
//                    alert(data);
                    var obj = $.parseJSON(data);
                    $.each(obj.supply_fit, function (i, fit) {
                        var fit_id = fit['id_supply_fit_name'];
                        var fit_name = fit['name'];
                        $('#send').show();
                        $('#send label').html(function () {
                            return fit_name + " send date:";
                        });
                        $('#receive').show();
                        $('#receive label').html(function () {
                            return fit_name + " receive date:";
                        });

                    });
                }
            });
        }
    });
</script>

<?php if ($this->uri->segment(3) == 'edit') { ?>
    <script>

        document.forms['form'].elements['id_supply_session'].value = "<?php echo $value->id_supply_session; ?>";
        document.forms['form'].elements['id_department'].value = "<?php echo $value->id_department; ?>";
        document.forms['form'].elements['id_supplyer'].value = "<?php echo $value->id_supplyer; ?>";
        document.forms['form'].elements['sample_result'].value = "<?php echo $value->sample_result; ?>";
        document.forms['form'].elements['approved_by'].value = "<?php echo $value->approved_by; ?>";
        document.forms['form'].elements['lab_test_report'].value = "<?php echo $value->lab_test_report; ?>";
        document.forms['form'].elements['pattern_block'].value = "<?php echo $value->pattern_block; ?>";
        document.forms['form'].elements['id_supply_fit_name'].value = "<?php echo $register->id_supply_fit_name; ?>";



        var select = $("#fit_name option:selected").val();
        var id_supply = $("#id_supply_info").val();
        if (select == 0) {
            $('#send').hide();
            $('#receive').hide();
        }
        if (select != 0) {
            $.post("<?php echo base_url(); ?>index.php/supply_info/register_info", {"id_supply_info": id_supply});

            var id = select;
            $("#id_fit").val(select);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/supply_info/register_info',
                data: {'id_supply_fit_name': id, "id_supply_info": id_supply},
                dataType: 'text',
                type: 'POST',
                success: function (data) {
                    //                                        alert(data);
                    var obj = $.parseJSON(data);

                    $.each(obj.supply_fit, function (i, fit) {
                        var date_send = new Date(fit['supply_fit_register_date_send']);
                        var date_send_change = formatDate(date_send);
                        
                        var date_receive = new Date(fit['supply_fit_register_date_receive']);
                        var date_receive_change = formatDate(date_receive);
                        function formatDate(value)
                        {
                            return value.getDate()+ "/" + (value.getMonth()+1)+ "/" + value.getFullYear();
                        }
                        var fit_name = fit['name'];
                        $('#send').show();
                        $('#send label').html(function () {
                            var fit_name = fit['name'];
                            return fit_name + " send date:";
                        });
                        $('#send input').val(date_send_change);
                        $('#receive').show();
                        $('#receive label').html(function () {
                            return fit_name + " receive date:";
                        });
                        $('#receive input').val(date_receive_change);
                    });
                }
            });
        }
        $('#fit_name').change(function () {
            var select = $("#fit_name option:selected").val();
            if (select != 0) {
                $.post("<?php echo base_url(); ?>index.php/supply_info/register_info", {"id_supply_info": id_supply});
                var id = select;
                $("#id_fit").val(select);
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/supply_info/register_info',
                    data: {'id_supply_fit_name': id, "id_supply_info": id_supply},
                    dataType: 'text',
                    type: 'POST',
                    success: function (data) {
    //                        alert(data);

                        var obj = $.parseJSON(data);
    //                        alert(obj.supply_fit);
                        if (jQuery.isEmptyObject(obj.supply_fit)) {
                            $('#send input').val('');
                            $('#receive input').val('');
                        } else {
                            $.each(obj.supply_fit, function (i, fit) {

                                var date_send = fit['supply_fit_register_date_send'];
                                var date_receive = fit['supply_fit_register_date_receive'];
                                var fit_name = fit['name'];
                                $('#send').show();
                                $('#send label').html(function () {
                                    var fit_name = fit['name'];
                                    return fit_name + " send date:";
                                });
                                $('#send input').val(date_send);
                                $('#receive').show();
                                $('#receive label').html(function () {
                                    return fit_name + " receive date:";
                                });
                                $('#receive input').val(date_receive);

                            });
                        }
                    }
                });
            }
        });
    </script>
<?php } ?>
<?php if ($this->uri->segment(3) == 'edit' or $this->uri->segment(3) == 'add' ) { ?>
    <script>
        $('.treeview-menu').css('display','block');

    </script>
<?php } ?>