<?php include_once 'header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title ?>
            <small><?= $Title ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="min-height: 600px;">
        <div class="box">
            <?php
            if ($this->uri->segment(3) == 'add') {
                $attributes = array(
                    'class' => 'form-horizontal',
                    'method' => 'get',
                    'name' => 'form',
                    'method' => 'post');
                echo form_open('users_list/save_info', $attributes)
                ?>
                <div class="box-header">
                    <h2>Users Info</h2>
                </div>
                <div class="box-body">
                    <div class="form-group ">
                        <label class="col-md-3">User Name:</label>
                        <div class="col-md-9">
                            <input type="text" name="username" class="form-control" />
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="col-md-3">Password:</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" />
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="col-md-3">Email:</label>
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control" />
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="col-md-3">Activation:</label>
                        <div class="col-md-9">
                            <select name="activated" id="" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="col-md-3">Banned:</label>
                        <div class="col-md-9">
                            <select name="banned" id="" class="form-control">
                                <option value="0">Not Banned</option>
                                <option value="1">Banned</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="col-md-3">Banned Reason:</label>
                        <div class="col-md-9">
                            <input type="text" name="banned_reason" class="form-control" />
                        </div>
                    </div> 
                    <div class="form-group ">
                        <label class="col-md-3">User type:</label>
                        <div class="col-md-9">
                            <select name="type" id="" class="form-control">
                                <option value="1">Super Admin</option>
                                <option value="2">Technician</option>
                                <option value="3">QC</option>
                            </select>
                        </div>
                    </div> 
                    <input type="submit" class="btn btn-success pull-right" value="Save" />
                </div>
                <?= form_close(); ?>
                <!-- Your Page Content Here -->
                <div class="box-body">
                    <?php
                } else if ($this->uri->segment(3) == 'edit') {
                    $attributes = array(
                        'class' => 'form-horizontal',
                        'method' => 'get',
                        'name' => 'form',
                        'method' => 'post');
                    echo form_open('users_list/update_info', $attributes)
                    ?>
                    <div class="box-header">
                        <h2>Users Info</h2>
                    </div>
                    <?php
                    foreach ($all_users as $user) {
                        ?>
                        <div class="box-body">
                            <div class="form-group ">
                                <label class="col-md-3">User Name:</label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>"/>
                                    <input type="hidden" name="id" value="<?php echo $user->id;?>" />
                                    <input type="hidden" name="id_user_type" value="<?php echo $user->id_user_type;?>" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3">Email:</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>" />
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label class="col-md-3">Activation:</label>
                                <div class="col-md-9">
                                    <select name="activated" id="" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label class="col-md-3">Banned:</label>
                                <div class="col-md-9">
                                    <select name="banned" id="banned" class="form-control">
                                        <option value="0">Not Banned</option>
                                        <option value="1">Banned</option>
                                    </select>
                                </div>
                            </div> 
                            <div id="ban_reason" >
                                <div class="form-group">
                                    <label class="col-md-3">Banned Reason:</label>
                                    <div class="col-md-9">
                                        <input type="text" name="banned_reason" class="form-control" value="<?php echo $user->ban_reason; ?>"/>
                                    </div>
                                </div> 
                            </div> 
                            <div class="form-group ">
                                <label class="col-md-3">User type:</label>
                                <div class="col-md-9">
                                    <select name="type" id="" class="form-control">
                                        <option value="1">Super Admin</option>
                                        <option value="2">Technician</option>
                                        <option value="3">QC</option>
                                    </select>
                                </div>
                            </div> 
                            <input type="submit" class="btn btn-success pull-right" value="Update" />
                        </div>
                        <?php
                    }
                    ?>
                    <?= form_close(); ?>
                    <!-- Your Page Content Here -->
                    <div class="box-body">
                        <?php
                    } else {
                        echo $glosary->output;
                    }
                    ?>
                </div>
            </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
<script type="text/javascript">
    $('#ban_reason').hide();
    $('#banned').change(function () {
        var select = $("#banned option:selected").val();
        if (select == 1) {
            $('#ban_reason').show();
        }if (select == 0) {
            $('#ban_reason').hide();
        }
    });
</script>
<?php if ($this->uri->segment(3) == 'edit') { ?>
    <script>
        document.forms['form'].elements['activated'].value = "<?php echo $user->activated; ?>";
        document.forms['form'].elements['banned'].value = "<?php echo $user->banned; ?>";
        document.forms['form'].elements['type'].value = "<?php echo $user->type; ?>";
    </script>
<?php } ?>
