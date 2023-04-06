<?php

//1. database information
$server = "localhost"; //3306 (default) - 3308
$account = "root";
$password = "";
$database = "StrongHold";

//2. database connection string
$conn = mysqli_connect($server, $account, $password, $database);
//3. test

//if ($conn == null):
//    die("Connection fails!");
//else:
//    echo"Congratulation!!!";    
//endif;
