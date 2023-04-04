<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$note = $_POST['note'];
$payment_method = $_POST['payment-method'];
$checkoutList = $_SESSION['cart']['buy'];
$cat_infor = $_SESSION['cart']['infor'];

// show_array($_SESSION['cart']['buy']);
//3. save new ordermaster
//3.1 make orderno
$dd = date("d");
$hh = date("h");
$mm = date("i");
$ss = date("s");
$yy = date("y");
$time = $dd . $hh . $mm . $ss;

$no = $time . "/" . date("y");
$date = date("d/m/Y");
$ccode = 1; //customer ID se truy van tu bang customer
//3.2 excute query
$query = "insert into OrderMaster values('{$no}','{$date}', '{$ccode}' )";
mysqli_query($conn, $query);

$checkoutList = $_SESSION['cart']['buy'];
show_array($checkoutList);

foreach ($checkoutList as $item):


    //4.2 get value from cart
    $ICode = $item['book_id'];
    $Qty = $item['qty'];

    //4.3 excute query
    // $query = "insert into orderdetail(order_id, book_id, quantity) values('{$no}', '{$ICode}', '{$Qty}')";
    $query = "INSERT INTO `orderdetail` (`order_id`, `book_id`, `quantity`) VALUES ('{$no}', '{$ICode}', '{$Qty}')";
    mysqli_query($conn, $query);
endforeach;