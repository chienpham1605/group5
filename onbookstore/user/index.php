<?php
session_start();
ob_start();
//thu vien ham
require('db/config.php');
require('db/database.php');
require("lib/template.php");
require("lib/url.php");
require('lib/number.php');
require('lib/data.php');

require('lib/pages.php');
require('lib/authentication.php');

require('lib/mail/sendmail.php');

//du lieu
// require('data/pages.php');
// require('data/product.php');

db_connect($db);

$mod = !empty($_GET['mod'])?$_GET['mod']:'home';
$act = !empty($_GET['act'])?$_GET['act']:'main';
// echo $mod;
// die();
$path="modules/{$mod}/{$act}.php";

require './inc/header.php';

if (file_exists($path)) {
    require "{$path}";
} else {
    require "./pages/404.php";
}

require './inc/footer.php';
?>

