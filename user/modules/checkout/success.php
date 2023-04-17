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
<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Success</h2>
        <img src="http://osmhotels.com//assets/check-true.jpg">
        <h3>Dear, Faisal khan</h3>
        <p style="font-size:20px;color:#5C5C5C;">Thank you for verifying your Mobile No.We have sent you an email "faisalkhan.chat@gmail.com" with your details
Please go to your above email now and login.</p>
        <a href="" class="btn btn-success">     Back to homepage      </a>
    <br><br>
        </div>
        
	</div>
</div>
