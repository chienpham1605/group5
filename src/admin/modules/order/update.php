<?php
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
  $order_id = (int)$_POST['order_id'];
  
  if (isset($_POST['btnUpdate'])):
  
    $last_modify_at = date("Y-m-d H:i:s");

    $orderStatus = $_POST['orderStatus'];
    $query = "UPDATE `ordermaster` SET `order_status` = '{$orderStatus}', `last_modify_at` = '{$last_modify_at}'  WHERE `ordermaster`.`order_id` = '{$order_id}'";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
        error_clear_last();
        echo 'nothing to update';
    endif;
    header("Location:detail.php?order_id=$order_id");

    //8. excecute query (for update)
endif;
?>