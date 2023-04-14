<?php

#1. Start session
#2. Check session
#3. Connectto database
include_once './DBConnect.php';

#4. Get Item Code from Read
if (!isset($_GET['code'])):
    header("location:Ex01_Read.php");
endif;
$ID = $_GET['code'];

#5. Excecute query
$query = "delete from discount where discount_id = '{$ID}'";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
        
        echo 'Nothing to Update!';
    endif;
    header("location:Ex01_Read.php");
#6. Close Connection
mysqli_close($conn);
