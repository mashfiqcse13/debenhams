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
            $attributes = array(
                'class' => 'form-horizontal',
                'name' => 'form',
                'method' => 'post');
            echo form_open('users_list/reset_password', $attributes)
            ?>
            <div class="box-header">
                <h2>Reset Password</h2>
            </div>
            <div class="box-body">
                <?php
                $new_password = array(
                    'name' => 'new_password',
                    'id' => 'new_password',
                    'class' => 'form-control',                    
                    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
                    'size' => 30,
                );
                $confirm_new_password = array(
                    'name' => 'confirm_new_password',
                    'id' => 'confirm_new_password',
                    'class' => 'form-control', 
                    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
                    'size' => 30,
                );
                ?>
                <?php // echo form_open($this->uri->uri_string()); ?>
                <div class="form-group ">
                    <?php echo form_label('New Password', $new_password['id'],array('class' =>'col-md-3')); ?>
                    <div class="col-md-9">
                        <?php echo form_password($new_password); ?>
                        <span style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']]) ? $errors[$new_password['name']] : ''; ?></span>
                    </div>
                </div> 
                <div class="form-group ">
                    <?php echo form_label('Confirm New Password', $confirm_new_password['id'],array('class' =>'col-md-3')); ?>
                    <div class="col-md-9">
                        <?php echo form_password($confirm_new_password); ?>
                        <span style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']]) ? $errors[$confirm_new_password['name']] : ''; ?></span>
                    </div>
                </div> 

                <?php echo form_submit('change', 'Change Password',array('class' =>'btn btn-success pull-right')); ?>
                <?php echo form_close(); ?>
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<?php include_once 'footer.php'; ?>