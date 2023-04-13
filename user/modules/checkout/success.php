<?php

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
}
?>
<div class="container-fluid">
    <div class="container text-center">
        <h1>Thank you.</h1>
        <p class="lead w-lg-50 mx-auto">Your order has been placed successfully.</p>
        <p class="w-lg-50 mx-auto">Your order number is </p>
        <span><?= $order_id?></span>
        <p>We will immediatelly process your and it will be delivered in 3 - 5 business days.</p>
    </div>
    
    
</div>