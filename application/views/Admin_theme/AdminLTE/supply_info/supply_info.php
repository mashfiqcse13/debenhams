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
                            <?php
                            $attributes = array(
                                'class' => 'form-horizontal',
                                'name' => 'form',
                                'method' => 'post');
                            echo form_open_multipart('supply_info/save_info', $attributes)
                            ?>
                            <div class="row">

                                <div class="col-md-6">
                                    <!--insert style//////////////////-->
                                    
                                    <div class="form-group ">
                                        <label class="col-md-3">Create Style No:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="no" placeholder="Write Style No" name="style_no"/>
                                            <span id="span" style="color: red; font-weight: bold"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Submit" id="style_submit" class="btn btn-success"/>
                                        </div>

                                    </div>
                                    <!--/////////////////////-->
                                    <div class="form-group " id="style_load">
                                        <label class="col-md-3">Style No:</label>
                                        <div class="col-md-9" id="sel">
                                            <select name="id_supply_style_no" id="select_style" class="form-control select2">
                                                <option value="0">Select Style Name</option>
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
                                            <select name="id_supply_session" id="session" class="form-control select2">
                                                <option value="0">Select Season Name</option>
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
                                            <select name="id_department" id="department" class="form-control select2">
                                                <option value="0">Select Department No</option>
                                                <?php
                                                foreach ($all_department as $department) {
                                                    ?>
                                                    <option value="<?php echo $department->id_department; ?>"><?php echo $department->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <span id="dep_error" style="color: red; font-weight: bold"></span>
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
                                            <select name="id_supplyer" id="supplier" class="form-control select2">
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
                                    <div class="form-group " id="fit_comment">
                                        <label class="col-md-3" >Fit Comment:</label>
                                        <div class="col-md-9">
                                            <textarea name="fit_comment" id="" class="form-control" rows="5"></textarea>
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
                                        <label class="col-md-3">Fit Sample Pass/Fail By:</label>
                                        <div class="col-md-9">
                                            <select name="approved_by" id="" class="form-control select2">
                                                <option value="0">Select Fit Sample  Pass/Fail By</option>
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
                                    <div class="form-group ">
                                        <label class="col-md-3">File Upload:</label>
                                        <div class="col-md-9">
                                            <input type="file" multiple name="file_upload[]" size="20" /><span style="color: #52A652;">*Select multiple file in one time</span>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" id="save"  value="Save" class="btn btn-primary pull-right btn-lg" style="padding: 10px 30px; font-weight: bold;"/>
                        </div>

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
        setTimeout(function () {
            $('#message').fadeOut();
        }, 1000);
        $("#span").hide();

//        style key up
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
        var style = <?php echo $last_style_entry->id_supply_style_no; ?>;
        $('#select_style').val(style);
//        }
//    new style save
        $("#style_submit").click(function (event) {
            event.preventDefault();
            var style_no = $("input#no").val();
            var allocated = <?php echo $this->session->userdata('user_id'); ?>;
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/supply_info/save_style",
                dataType: 'json',
                data: {style_no: style_no, allocated_to: allocated},
                success: function (res) {
                    if (res)
                    {
                        alert('Style is inserted');
                        window.location.reload(true);
                        $('#select_style').val(res);
                        $('#select_style').val(res);
                    }
                }
            });
        });

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
        $('#fit_comment').hide();
        $('#fit_name').change(function () {
            var select = $("#fit_name option:selected").val();
            //        alert(select);

            if (select == 0) {
                $('#send').hide();
                $('#receive').hide();
            }
            if (select == 6 || select == 7 || select == 8 || select == 9) {
                $('#approved_by').show();
                $('#fit_comment').hide();
            } else {
                $('#approved_by').hide();
            }
            if (select != 0) {
//                $.post("<?php echo base_url(); ?>index.php/supply_info/fit_info", {"id_supply_fit_name": select});
                var id = select;
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/supply_info/fit_info',
                    data: {'id_supply_fit_name': id, "id_supply_fit_name": select},
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
                            if (select == 1 || select == 2 || select == 3 || select == 4 || select == 5) {
                                $('#fit_comment').show();
                                $('#fit_comment label').html(function () {
                                    var fit_name = fit['name'];
                                    return fit_name + " Comment:";
                                });
                            }
                        });
                    }
                });
            }
        });

    </script>
    
</div>