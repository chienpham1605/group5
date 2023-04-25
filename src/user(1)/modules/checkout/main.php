<?php
session_start();
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
include("../../inc/header.php");
// $_SESSION['auth']['id'] =3;
if(!isset($_SESSION['auth']['id'])){
    header("Location: ../login/main.php");
}

$user_id = (int)$_SESSION['user_login']['id'];
$checkoutList = $_SESSION['cart'];
$total = 0;
foreach ($checkoutList as $item) {
    $total += $item['book_price'] * $item['qty'];
}
?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="?mod=hom&act=main">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <form method="POST" action="send.php">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="panel-group checkout-steps">
                            <!-- checkout-step-03  -->
                            <div class="panel panel-default checkout-step-03">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a>
                                            <span>1</span>Shipping Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div>
                                            <ul class="nav nav-checkout-progress list-unstyled">
                                                <li>
                                                    <label class="info-title control-label">Fullname
                                                        <span>*</span></label>
                                                    <input type="text" name="fullname" value=""
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="">
                                                </li>
                                                <li>
                                                    <label
                                                        class="info-title control-label">Address<span>*</span></label>
                                                    <input type="text" name="address" value=""
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="">
                                                </li>
                                                <li>
                                                    <label class="info-title control-label">Phone
                                                        number<span>*</span></label>
                                                    <input type="text" name="phone" value=""
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="">
                                                </li>
                                                <li>
                                                    <label class="info-title control-label">Note<span></span></label>
                                                    <input type="text" name="note" value=""
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="">
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
                                        <a>
                                            <span>2</span>Shipping Method
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse show">
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
                                        <a>
                                            <span>3</span>Payment Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <ul class="nav nav-checkout-progress list-unstyled">
                                                <li>
                                                    <input type="radio" id="COD" name="payment_method" checked="checked"
                                                        value="COD">
                                                    <label for="COD">Cash On Delivery</label><br>
                                                </li>
                                                <li>
                                                    <input type="radio" id="banking" name="payment_method"
                                                        value="Bank Transfer">
                                                    <label for="banking">Bank Transfer</label><br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- checkout-step-05  -->
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="panel-group checkout-steps">
                            <!-- checkout-step-06  -->
                            <div class="panel panel-default checkout-step-06">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a>
                                            <span>4</span>CHECK ORDER AGAIN
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse show">

                                    <div class="panel-body">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td><strong>Bookname</strong></td>
                                                        <td><strong>Price</strong></td>
                                                        <td><strong>Quantity</strong></td>
                                                        <td><strong>Subtotal</strong></td>
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
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><strong>Total: </strong></td>
                                                        <td><strong>
                                                                <?= $total ?>$
                                                            </strong>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><strong>Shipping Fee: </strong></td>
                                                        <td><strong>0 $</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><strong>Overal Total: </strong></td>
                                                        <td><strong>
                                                                <?= $total ?> $
                                                            </strong>

                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-06  -->
                            <div class="cart-checkout-btn pull-right">
                                <button type="submit" class="btn btn-primary checkout-btn" name = "checkoutBtn">CHECKOUT</button>
                                <!-- <span class="">Checkout with multiples address!</span> -->
                            </div>

                        </div><!-- /.checkout-steps -->
                    </div>

                    <!-- checkout-progress-sidebar -->
                </div>
            </div><!-- /.row -->
        </form>
    </div><!-- /.checkout-box -->

   
</div><!-- /.container -->

<?php
include("../../inc/footer.php");
?>