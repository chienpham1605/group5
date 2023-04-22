<?php
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");


$book_id = $_GET['book_id'];
#4. Execute 
$query = "delete from book where book_id = '{$book_id}'";
$rs = mysqli_query($conn, $query);
if (!$rs):
    error_clear_last();
    echo 'can not be updated';
endif;
header("location:../home/main.php");
#5. Close the connection
mysqli_close($conn);

?>