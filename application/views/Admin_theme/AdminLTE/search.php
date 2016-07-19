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
                                <select name="id_technican" id="" class="form-control">
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
                                    foreach ($all_department as $iepartment) {
                                        ?>
                                        <option value="<?php echo $iepartment->id_department; ?>"><?php echo $iepartment->name; ?></option>
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
                        <a class="btn btn-primary pull-right" href="<?= site_url('Excel'); ?>"><i class="fa fa-table"></i> Download as Excel </a>
            
                        <table class="table table-bordered table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th>Style No</th>
                                    <th>Session</th>
                                    <th>Department:</th>
                                    <th>Style Description</th>
                                    <th>Supplier Name:</th>
                                    <th>Type of Fit:</th>
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
//                                echo print_r($max_supply_info->id_supply_info);
                                if (isset($all_informations)) {
                                    for ($i = 1; $i <= $max_supply_info->id_supply_info; $i++) {
                                        if (!empty($all_informations[$i][0]->id_supply_info)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $all_informations[$i][0]->style_no; ?></td>
                                                <td><?php echo $all_informations[$i][0]->supply_name; ?></td>
                                                <td><?php echo $all_informations[$i][0]->department_name; ?></td>
                                                <td><?php echo $all_informations[$i][0]->style_description; ?></td>
                                                <td><?php echo $all_informations[$i][0]->supplyer_name; ?></td>
                                                <?php
                                                if (!empty($all_informations[$i][1][$i])) {
                                                    ?>
                                                    <td><?php echo $all_informations[$i][1][$i]['supply_fit_name']; ?></td>
                                                    <?php
                                                    if ($all_informations[$i][1][$i]['id_supply_fit_name'] <= 5) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 6) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 7) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 8) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 9) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }
                                                }if (empty($all_informations[$i][1][$i])) {
                                                    ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <?php
                                                }
                                                ?>   
                                                <td><?php
                                                    if ($all_informations[$i][0]->sample_result == 1) {
                                                        echo 'Pass';
                                                    } else {
                                                        echo 'Fail';
                                                    }
                                                    ?></td>
                                                <td><?php
                                                    if ($all_informations[$i][0]->approved_by == 1) {
                                                        echo 'United Kingdom';
                                                    } else {
                                                        echo 'Bangladesh';
                                                    }
                                                    ?></td>
                                                <td><?php echo $all_informations[$i][0]->username; ?></td>
                                                <td><?php echo $all_informations[$i][0]->date_created; ?></td>
                                                <td><a href="<?= site_url('supply_info/index/edit/' . $all_informations[$i][0]->id_supply_info); ?>" type="button" class="btn btn-success" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="<?= site_url('search/search_delete/' . $all_informations[$i][0]->id_supply_info); ?>" onclick="return check();"type="button" class="btn btn-danger" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
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
    $('#example1').DataTable({
        "scrollX": true,
        bFilter: false,
    });

    function check() {
        var chk = confirm('Are You Sure To Delete?');
        if (chk) {
            return true;
        }
    }


</script>