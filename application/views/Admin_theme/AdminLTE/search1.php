<?php include_once 'header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DEBENHAMS BANGLADESH 
            <small>Quality Assurance Department </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Search option</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <h1>Search your information</h1>
                <hr />
            </div>
            <div class="box-body">
                <?php
                $attributes = array(
                    'class' => 'form-horizontal',
                    'method' => 'get',
                    'name' => 'form',
                    'method' => 'post');
                echo form_open('search', $attributes)
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="col-md-3">Style No:</label>
                            <div class="col-md-9">
                                <select name="id_supply_style_no" id="" class="form-control">
                                    <option value="">Null</option>
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
                            <label class="col-md-3">Supplier:</label>
                            <div class="col-md-9">
                                <select name="id_supplyer" id="" class="form-control">
                                    <option value="">Null</option>
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
                            <label class="col-md-3">Technician Name:</label>
                            <div class="col-md-9">
                                <select name="id_supplyer" id="" class="form-control">
                                    <option value="">Null</option>
                                    <?php
                                    foreach ($all_technician as $technician) {
                                        ?>
                                        <option value="<?php echo $technician->id; ?>"><?php echo $technician->username; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group " id="send">
                            <label class="col-md-3" >Date From:</label>
                            <div class="col-md-9">
                                <input type="" class="form-control datepicker" name="date_from" id="datepicker" placeholder="Add Date"/>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="col-md-3">Department:</label>
                            <div class="col-md-9">
                                <select name="id_department" id="" class="form-control">
                                    <option value="">Null</option>
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
                            <label class="col-md-3">Sample Result:</label>
                            <div class="col-md-9">
                                <select name="sample_result" id="" class="form-control">
                                    <option value="">Null</option>
                                    <option value="1">Pass</option>
                                    <option value="2">Fail</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group " id="send">
                            <label class="col-md-3" >Date To:</label>
                            <div class="col-md-9">
                                <input type="" class="form-control datepicker" name="date_to" id="datepicker" placeholder="Add Date"/>
                            </div>
                        </div>

                    </div>

                </div>
                <input type="submit"  value="Search Information" class="btn btn-success" style="margin: 10px 0 ;"/>
                <?= form_close(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th>Style No</th>
                                    <th>Session</th>
                                    <th>Department:</th>
                                    <th>Style Description</th>
                                    <th>Supplier Name:</th>
                                    <th>Fit Send Date:</th>
                                    <th>Fit Receive Date:</th>
                                    <th>Dev Send Date</th>
                                    <th>Dev Receive Date</th>
                                    <th>PP Send Date</th>
                                    <th>PP Receive Date</th>
                                    <th>Wearer Send Date</th>
                                    <th>Wearer Receive Date</th>
                                    <th>Gold sl Send Date</th>
                                    <th>Gold sl Receive Date</th>
                                    <th>Sample pass /fail</th>
                                    <th>Tested by</th>
                                    <th>Technician</th>
                                    <th>Data Entry Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_informations as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->style_no; ?></td>
                                        <td><?php echo $value->supply_name; ?></td>
                                        <td><?php echo $value->department_name; ?></td>
                                        <td><?php echo $value->style_description; ?></td>
                                        <td><?php echo $value->supplyer_name; ?></td>
                                        <td id="fit_send"></td>
                                        <td id="fit_receive"></td>
                                        <td id="dev_send"></td>
                                        <td id="dev_receive"></td>
                                        <td id="pp_send"></td>
                                        <td id="pp_receive"></td>
                                        <td id="Wearer_send"></td>
                                        <td id="Wearer_receive"></td>
                                        <td id="Goldsl_send"></td>
                                        <td id="Goldsl_receive"></td>
                                        <td style="display:none;"><input type="hidden" id="id_supply_info" value="<?php echo $value->id_supply_info; ?>"/></td>
                                        <td><?php
                                            if ($value->sample_result == 1) {
                                                echo 'Pass';
                                            } else {
                                                echo 'Fail';
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($value->approved_by == 1) {
                                                echo 'United Kingdom';
                                            } else {
                                                echo 'Bangladesh';
                                            }
                                            ?></td>
                                        <td><?php echo $value->username; ?></td>
                                        <td><?php echo $value->date_created; ?></td>
                                        <td><a href="<?= site_url('supply_info/index/edit/' . $value->id_supply_info); ?>" type="button" class="btn btn-success" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </a>
                                            <button type="button" class="btn btn-danger" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
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

<?php include_once 'footer.php'; ?>
<script type="text/javascript">
    $('.datepicker').datepicker({
        autoclose: true
    });
//    $('#example1').DataTable();

    var id_supply_info = $('#id_supply_info').val();
//    alert(id_supply_info);
    $.ajax({
    url: '<?php echo base_url(); ?>index.php/search/fit_info',
            data: {'id_supply_info': id_supply_info},
            dataType: 'text',
            type: 'POST',
            success: function (data) {
//                                    alert(data);

            var obj = $.parseJSON(data);
                    //                        alert(obj.supply_fit);
                    $.each(obj.fit_info, function (i, fit) {
                        var id_fit_name = fit['id_supply_fit_name'];
                        var send_date = fit['supply_fit_register_date_send'];
                        var receive_date = fit['supply_fit_register_date_receive'];
                        if(id_fit_name <= 5){
                            $('#fit_send').html(send_date);
                            $('#fit_receive').html(receive_date);
                        }if(id_fit_name == 6){
                            $('#dev_send').html(send_date);
                            $('#dev_receive').html(receive_date);
                        }if(id_fit_name == 7){
                            $('#pp_send').html(send_date);
                            $('#pp_receive').html(receive_date);
                        }if(id_fit_name == 8){
                            $('#weaver_send').html(send_date);
                            $('#weaver_receive').html(receive_date);
                        }if(id_fit_name == 9){
                            $('#Goldsl_send').html(send_date);
                            $('#Goldsl_receive').html(receive_date);
                        }
                    });
                }
            });
</script>