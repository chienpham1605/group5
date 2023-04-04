<?php
// session_start();
$fullname = $_POST['fullname'];
$mailTo = $_POST['email'];
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
$orderDate = date('d') . '/' . date('m') . '/' . date('Y');
foreach ($checkoutList as $item):


    //4.2 get value from cart
    $ICode = $item['book_id'];
    $Qty = $item['qty'];

    //4.3 excute query
    // $query = "insert into orderdetail(order_id, book_id, quantity) values('{$no}', '{$ICode}', '{$Qty}')";
    $query = "INSERT INTO `orderdetail` (`order_id`, `book_id`, `quantity`) VALUES ('{$no}', '{$ICode}', '{$Qty}')";
    mysqli_query($conn, $query);
endforeach;

$mailSubject = "Order Received - OnBookStore - Order #<?= $no?>";
$mailBody = "
<div style='background-color:#ffffff'>
    <div class='adM'>
    </div>
    <div style='background-color:#0094ff'>
        <div class='adM'>
        </div>
        <div style='margin:0px auto;width:600px'>
            <div class='adM'>
            </div>
            <table style='width:100%' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                    <tr>
                        <td style='width:134px'><a style='text-decoration:none;color:inherit'
                                href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/1/_V7SVLDSlJDWnKkJRkwU7A/aHR0cHM6Ly90aWtpLnZu'
                                rel='noopener' target='_blank'
                                data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/1/_V7SVLDSlJDWnKkJRkwU7A/aHR0cHM6Ly90aWtpLnZu&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw3AIrJeQj-It0LKrDwKhR1j'><img
                                    style='border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px'
                                    src='https://ci4.googleusercontent.com/proxy/sZ0KrdanR3WE7oloF2eGlzZSDJSvtBepZC0sAavEiCFC62XT1yLUz8Cftfar-tOCwJkDnmsU5IByB7u84rHAAR0nTpbBXyVCCom2-35pNDWkxCtnv7rQaeCLRxVFD_dV_Hcc=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/4b/9b/a7/c1464df0cbec8967bfc7a737a7f0bdcf.png'
                                    alt='Tìm kiếm &amp; Tiết kiệm' width='134' height='auto' class='CToWUd'
                                    data-bit='iit'></a></td>
                        <td style='width:146px'><a style='text-decoration:none;color:inherit'
                                href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/2/GbMtdYM48z_aTRP2TFwxaw/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3ZpL2FydGljbGVzLzkwMDAwNTYxNTAyMy1UaWtpLW4lQzMlQjNpLUtIJUMzJTk0TkctdiVFMSVCQiU5QmktaCVDMyVBMG5nLWdpJUUxJUJBJUEz'
                                rel='noopener' target='_blank'
                                data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/2/GbMtdYM48z_aTRP2TFwxaw/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3ZpL2FydGljbGVzLzkwMDAwNTYxNTAyMy1UaWtpLW4lQzMlQjNpLUtIJUMzJTk0TkctdiVFMSVCQiU5QmktaCVDMyVBMG5nLWdpJUUxJUJBJUEz&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw03QsGSppATpY6UDDopex0u'><img
                                    style='border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px'
                                    src='https://ci3.googleusercontent.com/proxy/Ki3rg5HwSarMFb3b8eD4BGYJI-jhMubhEnPKvQ4mQN9UyDbsXokQykFbLhA_irwGYEPeUaUsiBHS6ZkS2JKl6ND2Ri-SQ28SvoS8Oi73tweI0I2jvUbiphqQEDxghdzFAAp8=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/95/e7/57/9ab8c586503264b9b2c0cc2ef291eb87.png'
                                    alt='Cam kết chính hãng' width='146' height='auto' class='CToWUd'
                                    data-bit='iit'></a></td>
                        <td style='width:178px'><a style='text-decoration:none;color:inherit'
                                href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/3/AAIhpikwv0Jp5UmoyQmIiw/aHR0cHM6Ly90aWtpLnZuL2hvaS12aWVuLXRpa2lub3c'
                                rel='noopener' target='_blank'
                                data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/3/AAIhpikwv0Jp5UmoyQmIiw/aHR0cHM6Ly90aWtpLnZuL2hvaS12aWVuLXRpa2lub3c&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw2_4Mbezt8D5dbe9dnmkiBa'><img
                                    style='border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px'
                                    src='https://ci3.googleusercontent.com/proxy/mu77oYaVCatKq93oj-3_4tRIHhj5r380Tyx5UeVwHgsBIr2zMw2nIJHJZky0yVsOgaI4FCVljjNVesSblgUEq-uba2x_UdGa_dy1H8ULci_hAp_8bQKtEdwYErK_I-nfRvpU=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/70/ef/b6/fdd7f1c558aebfe43d6f57a1366ff774.png'
                                    alt='TikiNOW giao nhanh 2h' width='178' height='auto' class='CToWUd'
                                    data-bit='iit'></a></td>
                        <td style='width:142px'><a style='text-decoration:none;color:inherit'
                                href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/4/3K1BGB8xFw1dKrXcHWZ-tA/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3ZpL2FydGljbGVzLzkwMDAwMzI5MzI2Nj91dG1fc291cmNlPWNkcCZ1dG1fbWVkaXVtPWVtYWls'
                                rel='noopener' target='_blank'
                                data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/4/3K1BGB8xFw1dKrXcHWZ-tA/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3ZpL2FydGljbGVzLzkwMDAwMzI5MzI2Nj91dG1fc291cmNlPWNkcCZ1dG1fbWVkaXVtPWVtYWls&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw26_0PImuSK6acqPZa8uDLb'><img
                                    style='border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px'
                                    src='https://ci6.googleusercontent.com/proxy/2lnogA0se9LD1HSNz_t6d68OYmt36Is6tgeGCy9H6d1eL5hSFOQAZw9JGCtaP1tZX5rZqOdLTgQ9qndYSMM5CA0coClQX_c6c1SuYLc3pt_eS5ZoKURJC0iDdt3mvGHqTwGr=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/b5/52/9c/3c86dd486ad5702b6658f2ce801c6bcf.png'
                                    alt='Đổi trả dễ dàng' width='142' height='auto' class='CToWUd' data-bit='iit'></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style='background-color:#ffffff;color:#000000'>
        <div style='margin:0px auto;width:600px'>
            <div style='padding:30px 20px'>
                <table align='center' bgcolor='#dcf0f8' border='0' cellpadding='0' cellspacing='0'
                    style='margin:0;padding:0;background-color:#ffffff;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px'
                    width='100%'>
                    <tbody>
                        <tr>
                            <td>
                                <h1 style='font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0'>Cảm ơn
                                    quý khách
                                    ".$fullname."đã đặt hàng tại OnBookStore,
                                </h1>

                                <p
                                    style='margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal'>
                                    OnBookStore rất vui thông báo đơn hàng #
                                    ".$no ." của quý khách đã được tiếp nhận và đang trong quá trình xử lý. OnBookStore
                                    sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.
                                </p>

                                <h3
                                    style='font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd'>
                                    Thông tin đơn hàng #
                                    ".$no ." <span
                                        style='font-size:12px;color:#777;text-transform:none;font-weight:normal'>(
                                        ". $orderDate.")
                                    </span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <thead>
                                        <tr>
                                            <th align='left'
                                                style='padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold'
                                                width='50%'>Thông tin thanh toán</th>
                                            <th align='left'
                                                style='padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold'
                                                width='50%'> Địa chỉ giao hàng </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style='padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal'
                                                valign='top'><span style='text-transform:capitalize'>".$fullname."</span><br>
                                                <a href='mailto:".$mailTo."' target='_blank'>". $mailTo ."</a><br>
                                                ". $phone ."
                                            </td>
                                            <td style='padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal'
                                                valign='top'><span style='text-transform:capitalize'>". $fullname."</span><br>
                                                <a href='mailto:". $mailTo ."' target='_blank'>". $mailTo ."</a><br>
                                                ".$address."<br>
                                                Tel:
                                                ". $phone ."
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan='2'
                                                style='padding:7px 9px 0px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444'
                                                valign='top'>
                                                <p
                                                    style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal'>
                                                    <strong>Phương thức thanh toán: </strong> Thanh toán tiền mặt khi
                                                    nhận hàng<br>
                                                    <strong>Thời gian giao hàng dự kiến:</strong> Dự kiến giao hàng Thứ
                                                    năm, 30/03 <br>
                                                    <strong>Phí vận chuyển: </strong> 0đ<br>
                                                    <strong>Sử dụng bọc sách cao cấp Bookcare: </strong> Không <br>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p
                                    style='margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal'>
                                    <i>Lưu ý: Đối với đơn hàng đã được thanh toán trước, nhân viên giao nhận có thể yêu
                                        cầu người nhận hàng cung cấp CMND / giấy phép lái xe để chụp ảnh hoặc ghi lại
                                        thông tin.</i></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2
                                    style='text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:#02acea'>
                                    CHI TIẾT ĐƠN HÀNG</h2>

                                <table border='0' cellpadding='0' cellspacing='0' style='background:#f5f5f5'
                                    width='100%'>
                                    <thead>
                                        <tr>
                                            <th align='left' bgcolor='#02acea'
                                                style='padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px'>
                                                Sản phẩm</th>
                                            <th align='left' bgcolor='#02acea'
                                                style='padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px'>
                                                Đơn giá</th>
                                            <th align='left' bgcolor='#02acea'
                                                style='padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px'>
                                                Số lượng</th>
                                            <th align='left' bgcolor='#02acea'
                                                style='padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px'>
                                                Giảm giá</th>
                                            <th align='right' bgcolor='#02acea'
                                                style='padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px'>
                                                Tổng tạm</th>
                                        </tr>
                                    </thead>
                                    <tbody bgcolor='#eee'
                                        style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px'>
                                        "."<?php
                                        foreach (".$checkoutList ." as ". $item."){
                                            ?>
                                        <tr>
                                            <td align='left' style='padding:3px 9px' valign='top'><span>".$item['book_name']."</span><br>
                                            </td>
                                            <td align='left' style='padding:3px 9px' valign='top'><span>".$item['book_price']."</span>
                                            </td>
                                            <td align='left' style='padding:3px 9px' valign='top'>".$item['qty']."</td>
                                            <td align='left' style='padding:3px 9px' valign='top'><span>0đ</span></td>
                                            <td align='right' style='padding:3px 9px' valign='top'><span>".$item['sub_total']."</span>
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                    <tfoot
                                        style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px'>
                                        <tr>
                                            <td align='right' colspan='4' style='padding:5px 9px'>Tạm tính</td>
                                            <td align='right' style='padding:5px 9px'><span>".$item['sub_total']."</span></td>
                                        </tr>
                                        <tr>
                                            <td align='right' colspan='4' style='padding:5px 9px'>Phí vận chuyển</td>
                                            <td align='right' style='padding:5px 9px'><span>0đ</span></td>
                                        </tr>

                                        <tr bgcolor='#eee'>
                                            <td align='right' colspan='4' style='padding:7px 9px'><strong><big>Tổng giá
                                                        trị đơn hàng</big> </strong></td>
                                            <td align='right' style='padding:7px 9px'><strong><big><span>".$cat_infor['total']."</span>
                                                    </big> </strong></td>
                                        </tr>
                                        <!-- <tr bgcolor='#eee'>
                                            <td align='right' colspan='4' style='padding:7px 9px'><strong><big>Thưởng
                                                        Astra</big> </strong></td>
                                            <td align='right' style='padding:7px 9px'><strong><big><span>7.98</span>
                                                    </big> </strong></td>
                                        </tr> -->

                                    </tfoot>
                                </table>

                                <div style='margin:auto'><a
                                        href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/5/SkZZ6hcqSE88DJSa-0UsCg/aHR0cHM6Ly90aWtpLnZuL3NhbGVzL29yZGVyL3ZpZXcvNDQwOTQ0Mjk2'
                                        style='display:inline-block;text-decoration:none;background-color:#00b7f1!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:35%;margin-top:5px'
                                        target='_blank'
                                        data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/5/SkZZ6hcqSE88DJSa-0UsCg/aHR0cHM6Ly90aWtpLnZuL3NhbGVzL29yZGVyL3ZpZXcvNDQwOTQ0Mjk2&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw2C3HfPl-RSYbz0A2uKCfSJ'>Chi
                                        tiết đơn hàng tại OnBookStore</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                                <a href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/6/KAeNQ3awLQjijZ7xL_MnAw/aHR0cHM6Ly90aWtpLnZuL3NlcC9ob21l'
                                    target='_blank'
                                    data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/6/KAeNQ3awLQjijZ7xL_MnAw/aHR0cHM6Ly90aWtpLnZuL3NlcC9ob21l&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw3n2qUQoBBe3lONNkA7XyXG'>
                                    <img src='https://ci3.googleusercontent.com/proxy/hzh2_D8PnxbNuz83P2hqu7idL2qy94GqnqYXp-UQ5xdYKBQGrnUeN5AydFuxmzUSieep9ZdwYRsfbt6zuNF1thYiOgnqMceKMfO7i1EpfFAgpfDdRQqefoOXJCePZ4ryZpUX=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/5e/82/5c/882d4c145fcc70bd1881b84e8684f8cf.png'
                                        alt='banner' width='100%' class='CToWUd' data-bit='iit'>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                                <p
                                    style='margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal'>
                                    Trường hợp quý khách có những băn khoăn về đơn hàng, có thể xem thêm mục <a
                                        href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/7/4jP8dXeWZtGIV6_70PzJVw/aHR0cDovL2hvdHJvLnRpa2kudm4vaGMvdmkvP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCtlbWFpbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV90ZXJtPWxvZ28mdXRtX2NhbXBhaWduPW5ldytvcmRlcg'
                                        title='Các câu hỏi thường gặp' target='_blank'
                                        data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/7/4jP8dXeWZtGIV6_70PzJVw/aHR0cDovL2hvdHJvLnRpa2kudm4vaGMvdmkvP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCtlbWFpbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV90ZXJtPWxvZ28mdXRtX2NhbXBhaWduPW5ldytvcmRlcg&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw1pEJ8p_vZqRAWhWxjfKUbl'>
                                        <strong>các câu hỏi thường gặp</strong>.</a></p>

                                <p
                                    style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px #14ade5 dashed;padding:5px;list-style-type:none'>
                                    Từ ngày 14/2/2015, Tiki sẽ không gởi tin nhắn SMS khi đơn hàng của bạn được xác nhận
                                    thành công. Chúng tôi chỉ liên hệ trong trường hợp đơn hàng có thể bị trễ hoặc không
                                    liên hệ giao hàng được.</p>

                                <p
                                    style='margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal'>
                                    Mọi thắc mắc và góp ý, quý khách vui lòng liên hệ với Tiki Care qua <a
                                        href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/8/5EJiuZbe-CHSIuFM87gzSg/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3Zp'
                                        target='_blank'
                                        data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/8/5EJiuZbe-CHSIuFM87gzSg/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3Zp&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw1bwP93yXd_YDTuL9leMs_r'>https://hotro.tiki.vn/hc/vi</a>.
                                    Đội ngũ Tiki Care luôn sẵn sàng hỗ trợ bạn.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                                <p>Một lần nữa Tiki cảm ơn quý khách.</p>

                                <p><strong><a
                                            href='https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/9/qlF1IqamFP-yw4jVaFQNoA/aHR0cDovL3Rpa2kudm4_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsK2VtYWlsJnV0bV9tZWRpdW09ZW1haWwmdXRtX3Rlcm09bG9nbyZ1dG1fY2FtcGFpZ249bmV3K29yZGVy'
                                            style='color:#00a3dd;text-decoration:none;font-size:14px' target='_blank'
                                            data-saferedirecturl='https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA-3_tSEAAAAKFZgAAALCPkoAAAAA3NwAAAAAABPsQgBkIW6kH3dPVtfRRNOG9jVJiQrRDAAPBhU/9/qlF1IqamFP-yw4jVaFQNoA/aHR0cDovL3Rpa2kudm4_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsK2VtYWlsJnV0bV9tZWRpdW09ZW1haWwmdXRtX3Rlcm09bG9nbyZ1dG1fY2FtcGFpZ249bmV3K29yZGVy&amp;source=gmail&amp;ust=1680424043205000&amp;usg=AOvVaw0uVUQ4wTWg1wl56ohnrcB5'>Tiki</a>
                                    </strong></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>";
if (isset($_SESSION['cart']['buy']) && isset($_SESSION['cart']['infor']) && isset($_POST['order-now'])) {
    sendmail($mailTo, $mailSubject, $mailBody);
}

?>



<!-- test area -->


<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Home</a>
                    </li>
                    <li>
                        <a href="" title="">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="wp-inner clearfix">
        <h1 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; text-align: center"></br>THANK
            YOU FOR YOUR ORDER
            <hr>
        </h1>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Delivery Information</h1>
            </div>
            <div class="section-detail">

                <div class="form-row clearfix">
                    <div class="form-col fl-left">
                        <label for="fullname">Full Name</label>
                        <p>
                            <?php echo $fullname ?>
                        </p>
                    </div>
                    <div class="form-col fl-right">
                        <label for="email">Email</label>
                        <p>
                            <?php echo $mailTo ?>
                        </p>
                    </div>
                </div>
                <div class="form-row clearfix">
                    <div class="form-col fl-left">
                        <label for="address">Address</label>
                        <p>
                            <?php echo $address ?>
                        </p>
                    </div>
                    <div class="form-col fl-right">
                        <label for="phone">Phone</label>
                        <p>
                            <?php echo $phone ?>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="notes">Note</label>
                        <p>
                            <?php echo $note ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">ORDER SUMMARY</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Order No </td>
                            <td>
                                <?= $no ?>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Order Date </td>
                            <td>
                                <?php echo date("d") . "/" . date("m") . "/" . date("Y") ?>
                            </td>
                        </tr>
                        <!-- <tr class="cart-item">
                            <td class="product-name">Son môi nữ cá tính<strong class="product-quantity">x 1</strong>
                            </td>
                            <td class="product-total">350.000đ</td>
                        </tr>
                        <tr class="cart-item">
                            <td class="product-name">Đồ tẩy trang nhập khẩu Mỹ<strong class="product-quantity">x
                                    2</strong></td>
                            <td class="product-total">500.000đ</td> -->
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>TOTAL</td>
                            <td><strong class="total-price">
                                    <?= number_format($cat_infor['total']) ?> USD
                                </strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <div class="section-head">
                        <h1 class="section-title">Payment Method</h1>
                    </div>
                    <p>
                        <?php echo $payment_method ?>
                    </p>
                    <!-- <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment-method" value="direct-payment">
                            <label for="direct-payment">Cash on Delivery (COD)</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-bank" name="payment-method" value="payment-bank">
                            <label for="payment-bank">Bank Transfer</label>
                        </li>
                    </ul> -->
                </div>
                <div class="place-order-wp clearfix">
                    <a href="?mod=home&act=main">Back to hompage</a> <br />
                    <a href="?mod=home&act=main">View order detail</a>
                    <!-- se chuyen huong ve trang user/quan ly don hang -->

                </div>
            </div>
        </div>
    </div>

</div>

<?php
// 5. clear all products in cart
unset($_SESSION['cart']);
// redirect("?mod=home&act=main");
?>