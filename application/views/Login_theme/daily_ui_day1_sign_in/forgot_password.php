<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$form_attribute = array('class' => 'login','method' =>'post');
$submit_attr = array('class' => 'login-submit','name' =>'btn','value'=>'submit');

$login = array(
    'name' => 'email',
    'id' => 'email',
    'class' => 'login-input',
    'placeholder' => "Email",
    'value' => set_value('login'),
    'maxlength' => 80,
    'size' => 30,
    'autofocus' => '',
    'type' => 'email'
);
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
                    <h2>Forgotten account</h2>
                </div>
                <p>An email will be sent to your provided <br /> address if you are registered.</p>
<?php
echo form_open('login/forgot_password', $form_attribute);
echo form_input($login);
?><br />
                <?php echo form_submit('btn', 'SEND',$submit_attr); ?> <br />
                <p class="login-help"><?php echo anchor('login', 'Login'); ?></p>
                    <?php echo form_close(); ?>
            </div>

            <section class="about">                
                <p class="about-author">
                    &copy; <?= date("Y") ?> <?=$SITE['name']?>
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