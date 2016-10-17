<?php
$new_password = array(
    'name' => 'new_password',
    'id' => 'new_password',
    'class' => 'form-control',
    'placeholder' => 'New Password',
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
);
$confirm_new_password = array(
    'name' => 'confirm_new_password',
    'id' => 'confirm_new_password',
    'class' => 'form-control',
    'placeholder' => 'Confirm New Password',
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
);
$attributes = array('class' => 'form-horizontal');
$submit_attr = 'class="login-submit"';
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?= $login_theme_asset_url ?>css/animate.css">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="<?= $login_theme_asset_url ?>css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="top">
                <h1 id="title" class="hidden" style="text-align: center"><span id="logo"><?= $SITE['name'] ?><span></span></span></h1>
            </div>
            <div class="login-box animated fadeInUp">
                <div class="box-header">
                    <h2>Reset Password</h2>
                </div>
                <?php echo form_open($this->uri->uri_string(), $attributes); ?>
                <?php echo form_password($new_password); ?> <br />
                <span style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']]) ? $errors[$new_password['name']] : ''; ?></span><br />
                <?php echo form_password($confirm_new_password); ?><br />
                <span style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']]) ? $errors[$confirm_new_password['name']] : ''; ?></span><br />
                <?php echo form_submit('submit', 'Reset', $submit_attr); ?> <br />
                <?php echo form_close(); ?>
            </div>

            <section class="about">
                <p class="about-links">
                    <?= anchor($SITE['website'], "Main Site", 'target="_blank"') ?>
                    <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('#', 'Register'); ?>       
                </p>
                <p class="about-author">
                    &copy; <?= date("Y") ?> <?= anchor($SITE['website'], $SITE['name'], 'target="_blank"') ?>
                    Developed by <?= anchor($DEVELOPER['website'], $DEVELOPER['name'], 'target="_blank"') ?>  
                </p>
            </section>
        </div>
    </body>

    <script>
        $(document).ready(function () {
            $('#logo').addClass('animated fadeInDown');
            $("input:text:visible:first").focus();
        });
        $('#username').focus(function () {
            $('label[for="username"]').addClass('selected');
        });
        $('#username').blur(function () {
            $('label[for="username"]').removeClass('selected');
        });
        $('#password').focus(function () {
            $('label[for="password"]').addClass('selected');
        });
        $('#password').blur(function () {
            $('label[for="password"]').removeClass('selected');
        });
    </script>

</html>