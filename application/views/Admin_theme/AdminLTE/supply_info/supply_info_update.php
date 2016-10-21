<div id="info">
    <?php include_once __DIR__ . '/../header.php'; ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $Title; ?>
                <small>Update Various Information</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Update Info</li>
            </ol>
        </section>

        <!-- Main content -->

        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box">
                        <?php
                        $attributes = array(
                            'class' => 'form-horizontal',
                            'method' => 'get',
                            'name' => 'form',
                            'method' => 'post');
                        echo form_open_multipart('supply_info/update_info', $attributes)
                        ?>
                        <div class="box-header">
                            <h2>Update Info</h2>
                        </div>
                        <div class="box-body">
                            <?php
//                                print_r($all_supply_info);exit();
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3">Style No:</label>
                                        <div class="col-md-9">
                                            <p><?php echo $all_supply_info->style_no; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Season:</label>
                                        <div class="col-md-9">
                                            <select name="id_supply_session" id="session" class="form-control select">
                                                <option value="0">Select Season Name</option>
                                                <?php
                                                foreach ($all_session as $session) {
                                                    ?>
                                                    <option value="<?php echo $session->id_supply_session; ?>"><?php echo $session->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                                <input type="hidden" name="id_supply_info" value="<?php echo $all_supply_info->id_supply_info; ?>" id="id_supply_info"/>
                                                <input type="hidden" name="id_fit" value="<?php // echo $value->id_supply_fit_register;                   ?>" id="id_fit"/>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Department:</label>
                                        <div class="col-md-9">
                                            <select name="id_department" id="department" class="form-control select">
                                                <option value="0">Select Department Name</option>
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
                                            <textarea name="style_description" class="form-control" id="" rows="5"><?php echo $all_supply_info->style_description; ?></textarea>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Supplier:</label>
                                        <div class="col-md-9">
                                            <select name="id_supplyer" id="supplier" class="form-control">
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
                                                <select name="id_supply_fit_name" id="fit_name" class="form-control" required>
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
                                        <!--first fit-->
                                        <div id="first_fit">
                                            <div class="form-group "  id="send">
                                                <label class="col-md-3" >First Fit Comment Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="first_supply_fit_register_date_send"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="receive">
                                                <label class="col-md-3" >First Fit Comment Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="first_supply_fit_register_date_receive"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="fit_comment">
                                                <label class="col-md-3" >First Fit Comment:</label>
                                                <div class="col-md-9">
                                                    <textarea name="first_fit_comment" id="comment" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Second fit-->
                                        <div id="second_fit">
                                            <div class="form-group "  id="send">
                                                <label class="col-md-3" >Second Fit Comment Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="second_supply_fit_register_date_send"   placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="receive">
                                                <label class="col-md-3" >Second Fit Comment Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="second_supply_fit_register_date_receive""  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="fit_comment">
                                                <label class="col-md-3" >Second Fit Comment:</label>
                                                <div class="col-md-9">
                                                    <textarea name="second_fit_comment" id="comment" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--third fit///////////////////////////////////-->
                                        <div id="third_fit">
                                            <div class="form-group "  id="send">
                                                <label class="col-md-3" >Third Fit Comment Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="third_supply_fit_register_date_send"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group "  id="receive">
                                                <label class="col-md-3" >Third Fit Comment Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="third_supply_fit_register_date_receive"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="fit_comment">
                                                <label class="col-md-3" >Third Fit Comment:</label>
                                                <div class="col-md-9">
                                                    <textarea name="third_fit_comment" id="comment" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!--fourth fit-->
                                        <div id="fourth_fit">
                                            <div class="form-group "  id="send">
                                                <label class="col-md-3" >Fourth Fit Comment Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="fourth_supply_fit_register_date_send" placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group "  id="receive" >
                                                <label class="col-md-3" >Fourth Fit Comment Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="fourth_supply_fit_register_date_receive" placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="fit_comment">
                                                <label class="col-md-3" >Fourth Fit Comment:</label>
                                                <div class="col-md-9">
                                                    <textarea name="fourth_fit_comment" id="comment" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Fifth fit-->
                                        <div id="fifth_fit">
                                            <div class="form-group " id="send">
                                                <label class="col-md-3" >Fifth Fit Comment Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="fifth_supply_fit_register_date_send"   placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="receive">
                                                <label class="col-md-3" >Fifth Fit Comment Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="fifth_supply_fit_register_date_receive"   placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="fit_comment">
                                                <label class="col-md-3" >Fifth Fit Comment:</label>
                                                <div class="col-md-9">
                                                    <textarea name="fifth_fit_comment" id="comment" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Development fit-->
                                        <div id="dev_fit">
                                            <div class="form-group " id="send">
                                                <label class="col-md-3" >Development Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="dev_supply_fit_register_date_send"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group "  id="receive">
                                                <label class="col-md-3" >Development Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="dev_supply_fit_register_date_receive"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="approved_by">
                                                <label class="col-md-3" >Development Pass/Fail BY:</label>
                                                <div class="col-md-9">
                                                    <select name="dev_sample_approved" id="sample_approved" class="form-control">
                                                        <option value="0">Select Sample Step Pass/Fail By</option>
                                                        <option value="1">Pass By United Kingdom</option>
                                                        <option value="2">Pass By Bangladesh</option>
                                                        <option value="3">Fail By United Kingdom</option>
                                                        <option value="4">Fail By Bangladesh</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--PP////////////////////////-->
                                        <div id="pp_fit">
                                            <div class="form-group "  id="send">
                                                <label class="col-md-3" >PP Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="pp_supply_fit_register_date_send"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="receive">
                                                <label class="col-md-3" >PP Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="pp_supply_fit_register_date_receive"   placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="approved_by">
                                                <label class="col-md-3" >PP Pass/Fail BY:</label>
                                                <div class="col-md-9">
                                                    <select name="pp_sample_approved" id="sample_approved" class="form-control">
                                                        <option value="0">Select Sample Step Pass/Fail By</option>
                                                        <option value="1">Pass By United Kingdom</option>
                                                        <option value="2">Pass By Bangladesh</option>
                                                        <option value="3">Fail By United Kingdom</option>
                                                        <option value="4">Fail By Bangladesh</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Wearer////////////////////////-->
                                        <div id="wearer_fit">
                                            <div class="form-group "  id="send">
                                                <label class="col-md-3" >Wearer Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" id="sendcheck" name="wearer_supply_fit_register_date_send"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="receive" >
                                                <label class="col-md-3" >Wearer Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="wearer_supply_fit_register_date_receive"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="approved_by">
                                                <label class="col-md-3" >Wearer Pass/Fail BY:</label>
                                                <div class="col-md-9">
                                                    <select name="wearer_sample_approved" id="sample_approved" class="form-control">
                                                        <option value="0">Select Sample Step Pass/Fail By</option>
                                                        <option value="1">Pass By United Kingdom</option>
                                                        <option value="2">Pass By Bangladesh</option>
                                                        <option value="3">Fail By United Kingdom</option>
                                                        <option value="4">Fail By Bangladesh</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 	Gold SI////////////////////////-->
                                        <div id="gold_fit">
                                            <div class="form-group " id="send" >
                                                <label class="col-md-3" >Gold SI Send Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker"  name="gold_supply_fit_register_date_send"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="receive">
                                                <label class="col-md-3" >Gold SI Receive Date:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control datepicker" name="gold_supply_fit_register_date_receive"  placeholder="Add Date"/>
                                                </div>
                                            </div>
                                            <div class="form-group " id="approved_by">
                                                <label class="col-md-3" >Gold SI Pass/Fail BY:</label>
                                                <div class="col-md-9">
                                                    <select name="gold_sample_approved" id="sample_approved" class="form-control">
                                                        <option value="0">Select Sample Step Pass/Fail By</option>
                                                        <option value="1">Pass By United Kingdom</option>
                                                        <option value="2">Pass By Bangladesh</option>
                                                        <option value="3">Fail By United Kingdom</option>
                                                        <option value="4">Fail By Bangladesh</option>
                                                    </select>
                                                </div>
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
                                            <input type="" class="form-control datepicker" name="file_hand_over_date" value="<?php
                                            if (Date('m/d/Y', strtotime($all_supply_info->file_hand_over_date)) == '01/01/1970') {
                                                echo '';
                                            } else {
                                                echo Date('m/d/Y', strtotime($all_supply_info->file_hand_over_date));
                                            };
                                            ?>" placeholder="Add Date"/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3">Remark:</label>
                                        <div class="col-md-9">
                                            <textarea name="remark" class="form-control "id="" rows="5"><?php echo $all_supply_info->remark; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group file">
                                        <label class="col-md-3">File Upload:</label>
                                        <div class="col-md-9">
                                            <input type="file" multiple name="file_upload[]" size="20" /><span style="color: #52A652;">*Select multiple file in one time</span><br />
                                            <?php
                                            $files = explode(',', $all_supply_info->file_upload);
                                            $i = 1;
                                            foreach ($files as $file) {
                                                if (($file)) {
                                                    ?>
                                            <span style="text-align:center;"><?= $file ?><i class = "fa fa-times delete"></i></span>  <br /> 
                                                    <!--<input type="text" id="prev" value="<?php echo $file; ?>"/>-->
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <!--<input type="text" name="prev_upload" value="<?php echo $all_supply_info->file_upload; ?>"/>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit"  value="Update" id="save" class="btn btn-success pull-right" style="margin-right: 10px; padding: 10px 30px; font-weight: bold;"/>

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
    <style type="text/css">
        .delete{
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
        setTimeout(function () {
            $('#message').fadeOut();
        }, 1000);
        $("#span").hide();
        $('.datepicker').datepicker();
        $(".select2").select2();
        //    $('#approved_by').hide();

        $('#save').click(function () {
            if (document.getElementsByName('id_supplyer')[0].value == 'blank') {
                alert('Please Select Supplier !');
                return false;
            }
        });
        document.forms['form'].elements['id_supply_session'].value = "<?php echo $all_supply_info->id_supply_session; ?>";
        document.forms['form'].elements['id_department'].value = "<?php echo $all_supply_info->id_department; ?>";
        document.forms['form'].elements['id_supplyer'].value = "<?php echo $all_supply_info->id_supplyer; ?>";
        document.forms['form'].elements['sample_result'].value = "<?php echo $all_supply_info->sample_result; ?>";
        document.forms['form'].elements['approved_by'].value = "<?php echo $all_supply_info->approved_by; ?>";
        document.forms['form'].elements['lab_test_report'].value = "<?php echo $all_supply_info->lab_test_report; ?>";
        document.forms['form'].elements['pattern_block'].value = "<?php echo $all_supply_info->pattern_block; ?>";
        //        document.forms['form'].elements['id_supply_fit_name'].value = "<?php // echo $register->id_supply_fit_name;                                                          ?>";

        $("input").each(function () {
            var curTable = $(this).val();
            if (curTable == "1970-01-01 06:00:00") {
                $(this).val(' ')
            }
        });
//        var sendCheck = $('#sendcheck').val();
//        var receiveCheck = $('#receive').val();
//        if (sendCheck == "1/1/1970" || receiveCheck == "1/1/1970") {
////            $('#send').val(' ');
////            $('#receive').val(' ');
//        }

        var select = $("#fit_name option:selected").val();
        //        alert(select);
        var id_supply = $("#id_supply_info").val();
        if (select == 0) {
            $('#first_fit').hide();
            $('#second_fit').hide();
            $('#third_fit').hide();
            $('#fourth_fit').hide();
            $('#fifth_fit').hide();
            $('#dev_fit').hide();
            $('#pp_fit').hide();
            $('#wearer_fit').hide();
            $('#gold_fit').hide();
        }

        $('#fit_name').change(function () {
            document.forms['form'].elements['sample_approved'].value = 0;
            var select = this.value;
            if (select == 1) {
                $('#first_fit').show();
                $('#second_fit').hide();
                $('#third_fit').hide();
                $('#fourth_fit').hide();
                $('#fifth_fit').hide();
                $('#dev_fit').hide();
                $('#pp_fit').hide();
                $('#wearer_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 2) {
                $('#second_fit').show();
                $('#first_fit').hide();
                $('#third_fit').hide();
                $('#fourth_fit').hide();
                $('#fifth_fit').hide();
                $('#dev_fit').hide();
                $('#pp_fit').hide();
                $('#wearer_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 3) {
                $('#third_fit').show();
                $('#first_fit').hide();
                $('#second_fit').hide();
                $('#fourth_fit').hide();
                $('#fifth_fit').hide();
                $('#dev_fit').hide();
                $('#pp_fit').hide();
                $('#wearer_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 4) {
                $('#fourth_fit').show();
                $('#first_fit').hide();
                $('#second_fit').hide();
                $('#third_fit').hide();
                $('#fifth_fit').hide();
                $('#dev_fit').hide();
                $('#pp_fit').hide();
                $('#wearer_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 5) {
                $('#fifth_fit').show();
                $('#first_fit').hide();
                $('#third_fit').hide();
                $('#second_fit').hide();
                $('#fourth_fit').hide();
                $('#dev_fit').hide();
                $('#pp_fit').hide();
                $('#wearer_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 6) {
                $('#dev_fit').show();
                $('#first_fit').hide();
                $('#third_fit').hide();
                $('#fourth_fit').hide();
                $('#fifth_fit').hide();
                $('#second_fit').hide();
                $('#pp_fit').hide();
                $('#wearer_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 7) {
                $('#pp_fit').show();
                $('#first_fit').hide();
                $('#third_fit').hide();
                $('#fourth_fit').hide();
                $('#fifth_fit').hide();
                $('#dev_fit').hide();
                $('#second_fit').hide();
                $('#wearer_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 8) {
                $('#wearer_fit').show();
                $('#first_fit').hide();
                $('#third_fit').hide();
                $('#fourth_fit').hide();
                $('#fifth_fit').hide();
                $('#dev_fit').hide();
                $('#pp_fit').hide();
                $('#second_fit').hide();
                $('#gold_fit').hide();
            } else if (select == 9) {
                $('#gold_fit').show();
                $('#first_fit').hide();
                $('#third_fit').hide();
                $('#fourth_fit').hide();
                $('#fifth_fit').hide();
                $('#dev_fit').hide();
                $('#pp_fit').hide();
                $('#wearer_fit').hide();
                $('#second_fit').hide();
            }
//            alert(select);
            if (select != 0) {
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
//                                                alert(obj.supply_fit);
                        if (obj.supply_fit == "") {
                            $('#fit_comment #comment').html('');
                            $('#approved_by #sample_approved').val(0);
                        }
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

                                if (select == fit['id_supply_fit_name']) {
//                                    alert(fit['fit_comment'])
                                    if (fit['fit_comment'] == "[]") {
                                        $('#fit_comment #comment').html('');
                                    } else {
                                        $('#fit_comment #comment').html(fit['fit_comment']);
                                    }
                                    $('#approved_by #sample_approved').val(fit['sample_approved']);

                                    if (date_send_change == '1/1/1970') {
                                        $('#send input').val('');
                                    } else {
                                        $('#send input').datepicker('setDate', date_send_change);
                                    }
                                    if (date_receive_change == '1/1/1970') {
                                        $('#receive input').val('');
                                    } else {
                                        $('#receive input').datepicker('setDate', date_receive_change);
                                    }
                                }

                            });
                        }
                    }
                });
            }
        });
        //           Delect upload file
//        $('.id_upload').click(function (event) {
//            event.preventDefault();
//            var id_upload = $('.id_upload input').val();
//            var id_supply_info = <?php echo $all_supply_info->id_supply_info; ?>;
//            $.ajax({
//                url: '<?php echo base_url(); ?>index.php/supply_info/delete_upload',
//                data: {'file_name': id_upload, 'id_supply_info': id_supply_info},
//                dataType: 'text',
//                type: 'POST',
//            });
//            alert(id_upload);
//        });

//        $('span').click(function (event) {
//            event.preventDefault();
//            var test = $(this).text;
//            alert(test);
//            $('input[name = "file_name[]"]').each(function () {
////            $('input[name = "file_name[]"]').indexOf("Apple")
//                var id_upload = $(this).find();
//                alert(id_upload);
//                var id_supply_info = <?php echo $all_supply_info->id_supply_info; ?>;
//                $.ajax({
//                    url: '<?php echo base_url(); ?>index.php/supply_info/delete_upload',
//                    data: {'file_name': id_upload, 'id_supply_info': id_supply_info},
//                    dataType: 'text',
//                    type: 'POST',
//                });
//            });
//        });

        $('span').click(function () {
            var name = $(this).text();
//            alert(name);
            var id_supply_info = <?php echo $all_supply_info->id_supply_info; ?>;
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/supply_info/delete_upload',
                data: {'file_name': name, 'id_supply_info': id_supply_info},
                dataType: 'text',
                type: 'POST',
            });
            $(this).remove();
        });
    </script>
</div>