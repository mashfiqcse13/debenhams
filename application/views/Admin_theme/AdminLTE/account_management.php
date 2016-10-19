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
                    'method' => 'get',
                    'name' => 'form',
                    'method' => 'post');
                echo form_open('users_list/update_account_management', $attributes)
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
                                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                                <input type="hidden" name="id_user_type" value="<?php echo $user->id_user_type; ?>" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-md-3">Password:</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control"/>
                            </div>
                        </div> 
                        <div class="form-group ">
                            <label class="col-md-3">Email:</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>" />
                            </div>
                        </div> 
                        
                        <input type="submit" class="btn btn-success pull-right" value="Update" />
                        
                        
                    </div>
                    <?php
                }
                ?>
                <?= form_close(); ?>
                <!-- Your Page Content Here -->
                
        </div>

    </section>
    <!-- /.content -->
</div>
<?php include_once 'footer.php'; ?>
<style type="text/css">
    .forget{
        margin-right: 10px;
    }
    .forget:hover{
        border-bottom: 1px solid red;
        color: red;
    }
</style>