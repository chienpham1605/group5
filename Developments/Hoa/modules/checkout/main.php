<?php
$fullname = $_POST['fullname'];
// $email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$note = $_POST['note'];
$payment_method = $_POST['payment_method'];

$user_id = (int) $_SESSION['auth']['id'];
$checkoutList = db_fetch_array("SELECT `book`.`book_name`,`book`.`book_price`,`book`.`book_id`, `cart`.`qty` FROM `cart`, `book` WHERE `cart`.`user_id` = $user_id AND `cart`.`book_id`=`book`.`book_id`;");
$total =0;
foreach ($checkoutList as $item){
    $total += $item['book_price']*$item['qty'];}
?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 rht-col">
                    <div class="panel-group checkout-steps" id="accordion">  
                        <!-- checkout-step-03  -->
                        <div class="panel panel-default checkout-step-03">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                        href="#collapseThree">
                                        <span>1</span>Shipping Information
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div>
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            <li>
                                                <p>Fullname:
                                                    <?= $fullname ?>
                                                </p>
                                            </li>
                                            <li>
                                                <p>Address:
                                                    <?= $address ?>
                                                </p>
                                            </li>
                                            <li>
                                                <p>Phone:
                                                    <?= $phone ?>
                                                </p>
                                            </li>
                                            </li>
                                            <li>
                                                <p>Note:
                                                    <?= $note ?>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-step-03  -->

                        <!-- checkout-step-04  -->
                        <div class="panel panel-default checkout-step-04">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                        href="#collapseFour">
                                        <span>2</span>Shipping Method
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                Standard Shipping
                                </div>
                            </div>
                        </div>
                        <!-- checkout-step-04  -->

                        <!-- checkout-step-05  -->
                        <div class="panel panel-default checkout-step-05">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                        href="#collapseFive">
                                        <span>3</span>Payment Information
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    if ($_POST['payment_method'] == "COD") {
                                        echo "<p>Payment Method: Cash On Delivery</p>";
                                    } else {
                                        echo "<p>Payment Method: Bank Transfer</p><br>
                                        <div>
                                        <ul class='nav nav-checkout-progress list-unstyled'>
                                            <li>
                                                <p>Bank Name: TECHCOMBANK</p>
                                            </li>
                                            <li>
                                                <p>Account Name: Pham Quoc Chien</p>
                                            </li>
                                            <li>
                                                <p>Account Number: 0123456688</p>
                                            </li>                                          
                                        </ul>
                                    </div>";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <!-- checkout-step-05  -->

                        <!-- checkout-step-06  -->
                        <div class="panel panel-default checkout-step-06">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                        href="#collapseSix">
                                        <span>5</span>Order Review
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">

                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td>Bookname</td>
                                                <td>Price</td>
                                                <td>Quantity</td>
                                                <td>Subtotal</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($checkoutList) == 0) {
                                                echo "No item";
                                            } else {
                                                foreach ($checkoutList as $item) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $item['book_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $item['book_price'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $item['qty'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $item['book_price'] * $item['qty'] ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-step-06  -->

                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 sidebar">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">ORDER SUMMARY</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li>
                                            <p>Total: <?= $total?> $</p>
                                        </li>
                                        <li>
                                            <p>Shipping Fee: 0 $</p>
                                        </li>
                                        <li>
                                            <p>Overal Total: <?= $total?> $</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cart-checkout-btn pull-right">
                            <button type="submit" class="btn btn-primary checkout-btn"><a href="?mod=checkout&act=send">ORDER NOW</a></button>
                        </div>

                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">

            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item m-t-10">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div><!--/.item-->
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->

        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<!-- ============================================================= FOOTER ============================================================= -->

<!-- ============================================== INFO BOXES ============================================== -->
<div class="row our-features-box">
    <div class="container">
        <ul>
            <li>
                <div class="feature-box">
                    <div class="icon-truck"></div>
                    <div class="content-blocks">We ship worldwide</div>
                </div>
            </li>
            <li>
                <div class="feature-box">
                    <div class="icon-support"></div>
                    <div class="content-blocks">call
                        +1 800 789 0000</div>
                </div>
            </li>
            <li>
                <div class="feature-box">
                    <div class="icon-money"></div>
                    <div class="content-blocks">Money Back Guarantee</div>
                </div>
            </li>
            <li>
                <div class="feature-box">
                    <div class="icon-return"></div>
                    <div class="content">7 days return</div>
                </div>
            </li>

        </ul>
    </div>
</div>
<!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->