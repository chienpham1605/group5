<?php
session_start();
include_once("../../db/DBConnect.php");
if (isset($_POST['btnLogin'])):

    $user = $_POST['txtName'];
    $pass = $_POST['txtPassword'];
 
    $rs = mysqli_query($conn,"SELECT * FROM `customer` WHERE `fullname` LIKE '{$user}' AND `pwd` LIKE '{$pass}'");
    $row = mysqli_fetch_row($rs);
    $count = mysqli_num_rows($rs);   
    if ($count > 0):
        $_SESSION['auth'] =  $row;
        header("Location: ../home/main.php");     
    endif; 
endif;


