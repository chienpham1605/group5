<?php
session_start();
ob_start();
//data
require './data/users.php';
//function

require './lib/data.php';
require './lib/url.php';
require './lib/users.php';
require './lib/template.php';

//var_dump(is_login());
//die();
//$page = $_GET['page'];


$page = !empty($_GET['page']) ? $_GET['page'] : 'home'; // 13.4 12:00
$path = "pages/{$page}.php"; //13.4 9:30s
//
//
//#check login
if (!is_login() && $page != 'index')
header ('Location:login.php');



//echo $path;
if (file_exists($path)) {
    require $path;
} else {
    require './inc/404.php';
}
?>
<?php ?>


//<?php
//
////$page = $_GET['page'];
//$page = !empty($_GET['page']) ? $_GET['page'] : 'home'; // 13.4 12:00
//
//$path = "pages/{$page}.php"; //13.4 9:30s
//
////echo $path;
//if (file_exists($path)) {
//    require $path;
//} else {
//    require './inc/404.php';
//}
//
?>

