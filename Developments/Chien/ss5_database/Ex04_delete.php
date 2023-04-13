
<!--have to run this page from Ex01_read.php-->
//<?php
////1. start session
////2. check session
////3.connect to database
//include_once './DBConnect.php';
////4. get Item code from read
//if (!isset($_GET['code'])):
//    header("location:Ex01_read.php");
//endif;
//
//$code = $_GET['code'];
////5. excecute query (for data old reading by Item code)
//$query = "delete from Item where Code = '{$code}' ";
//$rs = mysqli_query($conn, $query);
//    $rs = mysqli_query($conn, $query);
//    if (!$rs):
//        error_clear_last();
//        echo 'nothing to delete';
//    endif;
//    header("location:Ex01_read.php");
//
////8. excecute query (for update)
//
////9.close connection
//mysqli_close($conn);
//?>


<!DOCTYPE html>
<!--have to run this page from Ex01_read.php-->
<?php
//1. start session
//2. check session
//3.connect to database
include_once '../Item.php';
$itemObj = new Item();
//4. get Item code from read
if (isset($_GET['code'])):
    $code = $_GET['code'];
    $field = $itemObj->deleteData($code);
    
endif;
?>

