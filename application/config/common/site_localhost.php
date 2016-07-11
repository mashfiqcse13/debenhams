<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$root=$_SERVER['HTTP_HOST'];
$config['SITE'] = array(
    "name" => "DEBENHAMS BANGLADESH",
    'website' => $root,
    'logo' => 'jamuna logo.gif');
$config['SITETITLE'] = 'DEBENHAMS BANGLADESH';

$config['main_sidebar_title'] = "DEBENHAMS <br> BANGLADESH <br> MGMT";

$config['DEVELOPER'] = array(
    "name" => "Friends IT",
    'website' => "http://friendsitltd.com/");



$config['ASSET_FOLDER'] = "asset/";
$config['ADMIN_THEME'] = 'Admin_theme/AdminLTE/'; //Theme location on view folder
$config['THEME_ASSET'] = $config['ASSET_FOLDER'] . $config['ADMIN_THEME'];
$config['LOGIN_THEME'] = 'Login_theme/daily_ui_day1_sign_in/'; //Theme location on view folder


