<div id="info">
<?php include_once __DIR__ . '/../header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title; ?>
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
                    if ($this->uri->segment(3) == 'edit') {
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
                                            <label class="col-md-3">Season:</label>
                                            <div class="col-md-9">
                                                <select name="id_supply_session" id="" class="form-control select">
                                                    <option value="0">Select Season No</option>
                                                    <?php
                                                    foreach ($all_session as $session) {
                                                        ?>
                                                        <option value="<?php echo $session->id_supply_session; ?>"><?php echo $session->name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    <input type="hidden" name="id_supply_info" value="<?php echo $value->id_supply_info; ?>" id="id_supply_info"/>
                                                    <input type="hidden" name="id_fit" value="<?php // echo $value->id_supply_fit_register;                                                 ?>" id="id_fit"/>
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
                                                    <option value="blank">Select Supplier</option>
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
                                                <label class="col-md-3">Sample Step Name:</label>
                                                <div class="col-md-9">
                                                    <select name="id_supply_fit_name" id="fit_name" class="form-control select" required>
                                                        <option value="0">Select Sample Step Name</option>
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
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="supply_fit_register_date_send"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="receive">
                                                <label class="col-md-3" >Receive:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="supply_fit_register_date_receive"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="approved_by">
                                                <label class="col-md-3" >Fit Sample Approved BY:</label>
                                                <div class="col-md-9">
                                                    <select name="sample_approved" id="" class="form-control select">
                                                        <option value="0">Select Sample Step Pass/Fail By</option>
                                                        <option value="1">Pass By United Kingdom</option>
                                                        <option value="2">Pass By Bangladesh</option>
                                                        <option value="3">Fail By United Kingdom</option>
                                                        <option value="4">Fail By Bangladesh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="col-md-6"> 
                                        <div class="form-group ">
                                            <label class="col-md-3">Fit Sample Result:</label>
                                            <div class="col-md-9">
                                                <select name="sample_result" id="" class="form-control select">
                                                    <option value="0">Select Fit Sample Result</option>
                                                    <option value="1">Pass</option>
                                                    <option value="2">Fail</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Fit Sample Approved By:</label>
                                            <div class="col-md-9">
                                                <select name="approved_by" id="" class="form-control select">
                                                    <option value="0">Select Fit Sample  Approved By</option>
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
                                            <label class="col-md-3">Pattern Block:</label>
                                            <div class="col-md-9">
                                                <select name="pattern_block" id="" class="form-control select">
                                                    <option value="0">Select Pattern Block</option>
                                                    <option value="1">United Kingdom</option>
                                                    <option value="2">Bangladesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3" >File Hand Over Date:</label>
                                            <div class="col-md-9">
                                                <input type="" class="form-control datepicker" name="file_hand_over_date" value="<?php if(date('m/d/Y',strtotime($value->file_hand_over_date))=='01/01/1970'){echo '';}else{echo date('m/d/Y',strtotime($value->file_hand_over_date));}; ?>" placeholder="Add Date"/>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3">Remark:</label>
                                            <div class="col-md-9">
                                                <textarea name="remark" class="form-control "id="" rows="5"><?php echo $value->remark; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit"  value="Update" id="save" class="btn btn-success pull-right" style="margin-right: 10px"/>
                                <?php
                            }
                            ?>
                        </div>

                        <?= form_close(); ?>
                        <?php
                    } else {
                        ?>
                        <div class = "box-header">
                            <h2>Insert Info</h2><?php
                            $success = $this->session->userdata('message');
                            if (isset($success)) {
                                echo $success;
                            }
                            $this->session->unset_userdata('message');
                            ?>
                        </div>
                        <div class="box-body" id="insert_info">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $attributes = array(
                                        'class' => 'form-horizontal',
                                        'name' => 'form',
                                        'method' => 'post');
                                    echo form_open('supply_info/save_style', $attributes);
                                    ?>
                                    <div class="form-group ">
                                        <label class="col-md-3">Create Style No:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="no" placeholder="Write Style No" name="style_no"/>
                                            <span id="span" style="color: red; font-weight: bold"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Submit"  class="btn btn-success"/>
                                        </div>

                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                            <?php
                            $attributes = array(
                                'class' => 'form-horizontal',
                                'name' => 'form',
                                'method' => 'post');
                            echo form_open('supply_info/save_info', $attributes)
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3">Style No:</label>
                                        <div class="col-md-9" id="sel">
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
                                        <label class="col-md-3">Season:</label>
                                        <div class="col-md-9">
                                            <select name="id_supply_session" id="" class="form-control select2">
                                                <option value="0">Select Season No</option>
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
                                                <option value="blank">Select Supplier</option>
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
                                        <label class="col-md-3">Sample Step Name:</label>
                                        <div class="col-md-9">
                                            <select name="id_supply_fit_name" id="fit_name" class="form-control select2">
                                                <option value="0">Select Sample Step Name</option>
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
                                    <div class="form-group " id="approved_by">
                                        <label class="col-md-3" >Fit Sample Approved BY:</label>
                                        <div class="col-md-9">
                                            <select name="sample_approved" id="" class="form-control select">
                                                <option value="0">Select Sample Step Pass/Fail By</option>
                                                <option value="1">Pass By United Kingdom</option>
                                                <option value="2">Pass By Bangladesh</option>
                                                <option value="3">Fail By United Kingdom</option>
                                                <option value="4">Fail By Bangladesh</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3">Fit Sample Result:</label>
                                        <div class="col-md-9">
                                            <select name="sample_result" id="" class="form-control select2">
                                                <option value="0">Select Fit Sample Result</option>
                                                <option value="1">Pass</option>
                                                <option value="2">Fail</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Fit Sample Approved By:</label>
                                        <div class="col-md-9">
                                            <select name="approved_by" id="" class="form-control select2">
                                                <option value="0">Select Fit Sample  Approved By</option>
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
                                        <label class="col-md-3">Pattern Block:</label>
                                        <div class="col-md-9">
                                            <select name="pattern_block" id="" class="form-control select2">
                                                <option value="0">Select Pattern Block</option>
                                                <option value="1">United Kingdom</option>
                                                <option value="2">Bangladesh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3" >File Hand Over Date:</label>
                                        <div class="col-md-9">
                                            <input type="" class="form-control datepicker" name="file_hand_over_date" placeholder="Add Date"/>
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
                            <input type="submit" id="save"  value="Save" class="btn btn-primary pull-right btn-lg" style="padding: 10px 30px; font-weight: bold;"/>
                        </div>

                        <?= form_close(); ?>
                        <?php
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
    setTimeout(function () {
        $('#message').fadeOut();
    }, 1000);
    $("#span").hide();
//    alert(window.location.href);
    $("input#no").keyup(function () {
        var style_no = $("input#no").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/supply_info/search_style",
            dataType: 'json',
            cache: false,
            data: {style_no: style_no},
            success: function (data)
            {
                if (data) {
                    $("#span").html('Style no is already exist!!').show();
                    $("#style").click(function (event) {
                        event.preventDefault()
                        alert('You have to choose unique number');
                    });

                } else {
                    $("#span").html('Style no is already exist!!').hide();
                }
            }
        });

    });
//    $("div#sel option[value=" + 60 + "]").attr('selected', 'selected'); 
//    $("#style").click(function (event) {
//        event.preventDefault();
//        var style_no = $("input#no").val();
//        var allocated = <?php echo $this->session->userdata('user_id'); ?>;
//        jQuery.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>" + "index.php/supply_info/save_style",
//            dataType: 'json',
//            data: {style_no: style_no, allocated_to: allocated},
//            success: function (res) {
//                if (res)
//                {
//                    $("div#sel option[value=" + res + "]").attr('selected', 'selected');
//                    $('#info').load(window.location.href+'#info');
//                    alert('Style is inserted');
////                    window.location.reload();
//// Show Entered Values;
//                    
//                    $("div#sel option[value=" + res + "]").attr('selected', 'selected');                    
//                }
//            }
//        });
////        return false;
//    });

    $('#save').click(function () {
        if (document.getElementsByName('id_supplyer')[0].value == 'blank') {
            alert('Please Select Supplier !');
            return false;
        }
    });
    $('.datepicker').datepicker();
    $('#send').hide();
    $('#receive').hide();
    $(".select2").select2();
    $('#approved_by').hide();
    $('#fit_name').change(function () {
        var select = $("#fit_name option:selected").val();
        //        alert(select);

        if (select == 0) {
            $('#send').hide();
            $('#receive').hide();
        }
        if (select == 6 || select == 7 || select == 8 || select == 9) {
            $('#approved_by').show();
        } else {
            $('#approved_by').hide();
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
                            return fit_name + " Send Date:";
                        });
                        $('#receive').show();
                        $('#receive label').html(function () {
                            return fit_name + " Receive Date:";
                        });

                        $('#approved_by label').html(function () {
                            var fit_name = fit['name'];
                            return fit_name + " Pass/Fail By:";
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


        //        document.forms['form'].elements['id_supply_fit_name'].value = "<?php // echo $register->id_supply_fit_name;                                ?>";

        $("input").each(function () {
            var curTable = $(this).val();
            if (curTable == "1970-01-01 06:00:00") {
                $(this).val(' ')
            }
        });
        var sendCheck = $('#sendcheck').val();
        //        alert(sendCheck);
        var receiveCheck = $('#receive').val();
        $('#approved_by').hide();

        if (sendCheck == "1/1/1970" || receiveCheck == "1/1/1970") {
            $('#send').val(' ');
            $('#receive').val(' ');
        }

        var select = $("#fit_name option:selected").val();
        //        alert(select);
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
                    //                                                            alert(data);
                    var obj = $.parseJSON(data);

                    $.each(obj.supply_fit, function (i, fit) {
                        var date_send = new Date(fit['supply_fit_register_date_send']);
                        var date_send_change = formatDate(date_send);
                        //                        alert(date_send_change);
                        var date_receive = new Date(fit['supply_fit_register_date_receive']);
                        var date_receive_change = formatDate(date_receive);
                        //                        $('#register').val(fit['id_supply_fit_register']);
                        function formatDate(value)
                        {
                            return (value.getMonth() + 1) + "/" + value.getDate() + "/" + value.getFullYear();
                        }
                        var fit_name = fit['name'];
                        //                        $('#send').show();
                        $('#send label').html(function () {
                            var fit_name = fit['name'];
                            return fit_name + " Send Date:";
                        });
                        if (date_send_change == '1/1/1970') {
                            $('#send input').val('');
                        } else {
                            $('#send input').datepicker('setDate', date_send_change);
                        }
                        //                        $('#receive').show();
                        $('#receive label').html(function () {
                            return fit_name + " Receive Date:";
                        });
                        if (date_receive_change == '1/1/1970') {
                            $('#receive input').val('');
                        } else {
                            $('#receive input').datepicker('setDate', date_receive_change);
                        }
                    });
                }
            });
        }
        $('#fit_name').change(function () {
            document.forms['form'].elements['sample_approved'].value = 0;
            var select = $("#fit_name option:selected").val();
            if (select == 6 || select == 7 || select == 8 || select == 9) {
                $('#approved_by').show();
            } else {
                $('#approved_by').hide();
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
                        //                                                alert(data);

                        var obj = $.parseJSON(data);
                        //                        alert(obj.supply_fit);
                        if (jQuery.isEmptyObject(obj.supply_fit)) {
                            $('#send input').val('');
                            $('#receive input').val('');
                        } else {
                            $.each(obj.supply_fit, function (i, fit) {
                                var date_send = new Date(fit['supply_fit_register_date_send']);
                                var date_send_change = formatDate(date_send);
                                //                            alert(date_send_change);
                                var date_receive = new Date(fit['supply_fit_register_date_receive']);
                                var date_receive_change = formatDate(date_receive);
                                function formatDate(value)
                                {
                                    return (value.getMonth() + 1) + "/" + value.getDate() + "/" + value.getFullYear();
                                }
                                var fit_name = fit['name'];
                                $('#send').show();
                                $('#send label').html(function () {
                                    var fit_name = fit['name'];
                                    return fit_name + " Send date:";
                                });
                                $('#approved_by label').html(function () {
                                    var fit_name = fit['name'];
                                    return fit_name + " Pass/Fail By:";
                                });
                                if (date_send_change == '1/1/1970') {
                                    $('#send input').val('');
                                } else {
                                    $('#send input').datepicker('setDate', date_send_change);
                                }
                                $('#receive').show();
                                $('#receive label').html(function () {
                                    return fit_name + " Receive date:";
                                });
                                //                                alert(fit['id_supply_fit_name']);
                                //                                alert(select);
                                if (select == fit['id_supply_fit_name']) {
                                    document.forms['form'].elements['sample_approved'].value = fit['sample_approved'];
                                }


                                //                                alert(date_)
                                if (date_receive_change == '1/1/1970') {
                                    $('#receive input').val('');
                                } else {
                                    $('#receive input').datepicker('setDate', date_receive_change);
                                }

                            });
                        }
                    }
                });
            }
        });
    </script>
<?php } ?>
<?php ?>
<script>
    $('.treeview-menu').css('display', 'block');
//    $(function () {

//    var info = new array( email,password );

//    })

</script>
<?php ?>
</div>