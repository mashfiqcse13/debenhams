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
                echo form_open('users_list/forgot_password', $attributes)
                ?>
                <div class="box-header">
                    <h2>Forget Password</h2>
                     <p>An email has been sent to the address provided.</p>
                </div>
                    <div class="box-body">
                        <div class="form-group ">
                            <label class="col-md-3">Email:</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" required="" />
                                <span>*Please Type Your Email Address</span>
                            </div>
                        </div> 
                        
                        <input type="submit" class="btn btn-success pull-right" name="btn" value="Send" />
                    </div>
                
        </div>

    </section>
    <!-- /.content -->
</div>
<?php include_once 'footer.php'; ?>