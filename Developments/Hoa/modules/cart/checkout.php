<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$note = $_POST['note'];
$payment_method = $_POST['payment_method'];
// $checkoutList = $_SESSION['cart']['buy'];
$user_id = (int) $_SESSION['auth']['id'];
$checkoutList = db_fetch_array("SELECT `book`.`book_name`,`book`.`book_price`,`book`.`book_id`, `cart`.`qty` FROM `cart`, `book` WHERE `cart`.`user_id` = $user_id AND `cart`.`book_id`=`book`.`book_id`;");
// $cat_infor = $_SESSION['cart']['infor'];

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
// $ccode = 1; //customer ID se truy van tu bang customer
//3.2 excute query
$query = "insert into OrderMaster values('{$no}','{$date}', '{$user_id}' )";
mysqli_query($conn, $query);

// $checkoutList = $_SESSION['cart']['buy'];
show_array($checkoutList);
$total =0;
foreach ($checkoutList as $item):
$total = $item['book_price']*$item['qty'];

    //4.2 get value from cart
    $ICode = $item['book_id'];
    $Qty = $item['qty'];

    //4.3 excute query
    // $query = "insert into orderdetail(order_id, book_id, quantity) values('{$no}', '{$ICode}', '{$Qty}')";
    $query = "INSERT INTO `orderdetail` (`order_id`, `book_id`, `quantity`) VALUES ('{$no}', '{$ICode}', '{$Qty}')";
    mysqli_query($conn, $query);
endforeach;

mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = {$user_id}");

$mailBody = "<body style='margin: 0 !important; padding: 0 !important; background-color: #eeeeee;' bgcolor='#eeeeee'>


<div
    style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
    For what reason would it be advisable for me to think about business content? That might be little bit risky to
    have crew member like them.
</div>

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
        <td align='center' style='background-color: #eeeeee;' bgcolor='#eeeeee'>

            <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
                <tr>
                    <td align='center' valign='top' style='font-size:0; padding: 35px;' bgcolor='#2c60bf'>

                        <div
                            style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;'>
                            <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'
                                style='max-width:300px;'>
                                <tr>
                                    <td align='left' valign='top'
                                        style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;'
                                        class='mobile-center'>
                                        <h1 style='font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;'>
                                            OnBookStore</h1>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;'
                            class='mobile-hide'>
                            <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'
                                style='max-width:300px;'>
                                <tr>
                                    <td align='right' valign='top'
                                        style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'>
                                        <table cellspacing='0' cellpadding='0' border='0' align='right'>
                                            <tr>
                                                <td
                                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;'>
                                                    <p
                                                        style='font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;'>
                                                        <a href='#' target='_blank'
                                                            style='color: #ffffff; text-decoration: none;'>Shop
                                                            &nbsp;</a></p>
                                                </td>
                                                <td
                                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;'>
                                                    <a href='#' target='_blank'
                                                        style='color: #ffffff; text-decoration: none;'><img
                                                            src='https://img.icons8.com/color/48/000000/small-business.png'
                                                            width='27' height='23'
                                                            style='display: block; border: 0px;' /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td align='center' style='padding: 35px 35px 20px 35px; background-color: #ffffff;'
                        bgcolor='#ffffff'>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'
                            style='max-width:600px;'>
                            <tr>
                                <td align='center'
                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'>
                                    <img src='https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png'
                                        width='125' height='120' style='display: block; border: 0px;' /><br>
                                    <h2
                                        style='font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;'>
                                        Thank You For Your Order!
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td align='center'
                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'>
                                    <h3
                                        style='font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;'>
                                        ORDER #$no
                                    </h3>
                                    <h4>$date</h4>
                                </td>
                            </tr>
                            <tr>
                                <td align='left'
                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;'>
                                    <p
                                        style='font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;'>
                                        Hi $fullname, Thank you for your recent order. We are pleased to confirm that we have
                                        received your order and it is currently being processed.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' style='padding-top: 20px;'>
                                    <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                        <tr>
                                            <td width='75%' align='left' bgcolor='#eeeeee'
                                                style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;'>
                                                Order Detail
                                            </td>
                                            <td width='25%' align='left' bgcolor='#eeeeee'
                                                style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;'>

                                            </td>
                                        </tr>"; 
                                    foreach ($checkoutList as $item) {                                       
                                     $mailBody .= "<tr>
                                            <td width='75%' align='left'
                                                style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;'>
                                                <p>" . $item['book_name'] . "</p>
                                                <p>Price: " . $item['book_price'] . "</p>
                                                <p>Quantity: " . $item['qty'] . "</p>
                                            </td>
                                            <td width='25%' align='left'
                                                style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;'>
                                                $" . $item['qty'] * $item['book_price'] . "
                                            </td>
                                        </tr>";
                                    }





                    $mailBody .= " </table>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' style='padding-top: 20px;'>
                                    <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                        <tr>
                                            <td width='75%' align='left'
                                                style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'>
                                                TOTAL
                                            </td>
                                            <td width='25%' align='left'
                                                style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'>
                                                $$total
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td align='center' height='100%' valign='top' width='100%'
                        style='padding: 0 35px 35px 35px; background-color: #ffffff;' bgcolor='#ffffff'>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'
                            style='max-width:660px;'>
                            <tr>
                                <td align='center' valign='top' style='font-size:0;'>
                                    <div
                                        style='display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;'>

                                        <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'
                                            style='max-width:300px;'>
                                            <tr>
                                                <td align='left' valign='top'
                                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>
                                                    <p style='font-weight: 800;'>Shipping Information</p>
                                                    <p>$fullname<br>$phone<br>$address
                                                        </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div
                                        style='display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;'>
                                        <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'
                                            style='max-width:300px;'>
                                            <tr>
                                                <td align='left' valign='top'
                                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>
                                                    <p style='font-weight: 800;'>Estimated Delivery Date</p>
                                                    <p>3-5 business days</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align='left' valign='top'
                                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>
                                                    <p style='font-weight: 800;'>Payment Information</p>
                                                    <p><?= $payment_method?></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align='center' style=' padding: 35px; background-color: #5c99e5;' bgcolor='#1b9ba3'>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'
                            style='max-width:600px;'>
                            <tr>
                                <td align='center'
                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'>
                                    <h2
                                        style='font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;'>
                                        Get 30% off your next order.
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td align='center' style='padding: 25px 0 15px 0;'>
                                    <table border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            <td align='center' style='border-radius: 5px;' bgcolor='#66b3b7'>
                                                <a href='#' target='_blank'
                                                    style='font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #2c60bf; padding: 15px 30px; border: 1px solid #2c60bf; display: block;'>Shop
                                                    Again</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align='center' style='padding: 35px; background-color: #ffffff;' bgcolor='#ffffff'>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'
                            style='max-width:600px;'>
                            <tr>
                                <td align='center'>
                                    <img src='public/assets/images/logo-footer.jpg' width='37' height='37'
                                        style='display: block; border: 0px;' />
                                </td>
                            </tr>
                            <tr>
                                <td align='center'
                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;'>
                                    <p
                                        style='font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;'>
                                        275 Nguyen Van Dau, Binh Thanh District<br>
                                        Ho Chi Minh City
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align='left'
                                    style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;'>
                                    <p
                                        style='font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;'>
                                        If you didn't create an account using this email address, please ignore this
                                        email or <a href='#' target='_blank'
                                            style='color: #777777;'>unsusbscribe</a>.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>";






$mailSubject = "[Order Confirm] # $no - OnBookStore";
sendmail($email, $mailSubject, $mailBody);