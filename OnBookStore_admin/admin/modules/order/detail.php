<?php
session_start();
include("../../inc/header.php");
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");




$order_id = $_GET['order_id'];
$customer_infor = db_fetch_row("SELECT customer.fullname, customer.email, customer.address, customer.phone 
FROM customer, ordermaster 
WHERE ordermaster.cus_id = customer.id 
AND ordermaster.order_id = '{$order_id}'");
$orderDetail_infor = db_fetch_array("SELECT book.book_id, book.book_name, 
orderdetail.quantity as qty, orderdetail.book_price
FROM ordermaster, orderdetail, book 
WHERE orderdetail.book_id = book.book_id 
AND ordermaster.order_id = orderdetail.order_id 
AND ordermaster.order_id = '{$order_id}'");

$orderMaster_infor = db_fetch_row("SELECT ordermaster.order_date, ordermaster.order_id, ordermaster.shipping_name, ordermaster.shipping_address, ordermaster.shipping_phone, 
ordermaster.order_note, ordermaster.order_status, ordermaster.payment_method
FROM ordermaster WHERE ordermaster.order_id = '{$order_id}'");
$total = 0;

?>
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Order</li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order #
                            <?= $order_id ?> Placed at
                            <?= $orderMaster_infor['order_date'] ?>
                        </h5>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Book ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($orderDetail_infor) == 0) {
                                    echo "Record not found";
                                } else {
                                    foreach ($orderDetail_infor as $item) {
                                        $total += $item['book_price'] * $item['qty'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $item['book_id'] ?>
                                            </td>
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
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Total</td>
                                    <td>
                                        <?= $total ?> $
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">

                                    </td>
                                    <td>Shipping Fee</td>
                                    <td>0 $</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Overal Total</td>
                                    <td>
                                        <?= $total ?> $
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <td>
                                    <h5 class="card-title">Customer Detail
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="card-title">Shipping Detail
                                    </h5>
                                </td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="bi bi-mailbox2"></i></i>
                                        <?= $customer_infor['email'] ?>
                                    </td>

                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-person-fill"></i>
                                        <?= $customer_infor['fullname'] ?>
                                    </td>
                                    <td><i class="bi bi-person-fill"></i>
                                        <?= $orderMaster_infor['shipping_name'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-telephone-fill"></i>
                                        <?= $customer_infor['phone'] ?>
                                    </td>
                                    <td><i class="bi bi-telephone-fill"></i>
                                        <?= $orderMaster_infor['shipping_phone'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-pin-map-fill"></i>
                                        <?= $customer_infor['address'] ?>
                                    </td>
                                    <td><i class="bi bi-pin-map-fill"></i>
                                        <?= $orderMaster_infor['shipping_address'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Method
                        </h5>                        
                            <h6>
                                <?= $orderMaster_infor['payment_method'] ?>
                            </h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Note
                        </h5>
                        <h6>
                            <?= $orderMaster_infor['order_note'] ?>
                        </h6>
                    </div>
                </div>
                <div class="card">
                    <form method="POST" action="update.php">
                        <div class="card-body">
                            <h5 class="card-title">Order Status
                            </h5>
                            <span class="badge bg-success">
                                <?= $orderMaster_infor['order_status'] ?>
                            </span>                           
                            <div class="col-md-4">
                                <label for="inputState" class="form-label"></label>
                                <select id="inputState" class="form-select" name="orderStatus">
                                    <option selected="Pending">Pending</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Refund">Refund</option>
                                </select>
                                <input type="hidden" value="<?= $order_id ?>" name="order_id">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="btnUpdate"
                                    onclick="return confirm('Are you sure to update order # <?= $order_id ?>?')">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include("../../inc/footer.php");
?>