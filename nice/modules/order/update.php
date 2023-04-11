<?php
  $order_id = $_POST['order_id'];
  
  if (isset($_POST['btnUpdate'])):
  

    $orderStatus = $_POST['orderStatus'];
    $query = "UPDATE `ordermaster` SET `order_status` = '{$orderStatus}' WHERE `ordermaster`.`order_id` = '{$order_id}'";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
        error_clear_last();
        echo 'nothing to update';
    endif;
    redirect("?mod=order&act=main");

    //8. excecute query (for update)
endif;
?>