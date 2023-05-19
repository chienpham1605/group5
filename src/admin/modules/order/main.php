<?php
session_start();
include("../../inc/header.php");
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");

$query="SELECT SUM(quantity*book_price) as total, ordermaster.order_id, customer.name, 
ordermaster.order_id, STR_TO_DATE(ordermaster.order_date, 'Y-m-d H:i:s') as order_date, ordermaster.order_status 
FROM orderdetail, ordermaster, customer 
WHERE orderdetail.order_id = ordermaster.order_id AND ordermaster.cus_id = customer.id
GROUP BY orderdetail.order_id ORDER BY STR_TO_DATE(ordermaster.order_date, 'Y-m-d H:i:s') DESC";
// show_array($order_list);
//Date filter
if(isset($_POST['btnFilter'])){
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];
  // $date_to = strtotime($_POST['date_to']);

if(!empty($date_from)&&!empty($date_to)){
  $query = "SELECT SUM(quantity*book_price) as total, ordermaster.order_id, customer.name, 
  ordermaster.order_id, STR_TO_DATE(ordermaster.order_date, 'Y-m-d H:i:s') as order_date, ordermaster.order_status 
  FROM orderdetail, ordermaster, customer 
  WHERE orderdetail.order_id = ordermaster.order_id AND ordermaster.cus_id = customer.id
  AND STR_TO_DATE(ordermaster.order_date, 'Y/m/d H:i:s') >= '$date_from'
  AND STR_TO_DATE(ordermaster.order_date, 'Y-m-d H:i:s') <= '$date_to'  
  GROUP BY orderdetail.order_id ORDER BY STR_TO_DATE(ordermaster.order_date, 'Y-m-d H:i:s') DESC";
}

}
$order_list = db_fetch_array($query);


?>
<main id="main" class="main">

  <div class="pagetitle">
    <!-- <h1>Sale Report</h1> -->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Order</li>
        <!-- <li class="breadcrumb-item active">Sale</li> -->
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <form method="POST" action="#">
          <div class="card-body">
            <h5 class="card-title">Filter</h5>
            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">From</label>
              <div class="col-sm-3">
                <input type="date" name="date_from" class="form-control" value="<?= (isset($_POST['date_from']))?$_POST['date_from']:''?>">
              </div>
              <label for="inputDate" class="col-sm-2 col-form-label">To</label>
              <div class="col-sm-3">
                <input type="date" name="date_to" class="form-control" value="<?= (isset($_POST['date_to']))?$_POST['date_to']:''?>">
              </div>
              <div class="col-sm-2"><button class="btn btn-primary" name="btnFilter">Filter</button></div>
            </div>
          </div>
          </form>
        </div>

        <div class="card-body">

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Order Status</th>
                <th scope="col">Total</th>
                <th scope="col">Order Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (count($order_list) == 0) {
                echo "Record not found";
              } else {
                foreach ($order_list as $item) {
                  ?>
                  <tr>
                    <th scope="row"><span>#<?= $item['order_id'] ?></span></th>
                    <td>
                      <?= $item['name'] ?>
                    </td>
                    <td><span class="text-primary"><?= $item['order_status'] ?></span></td>
                    <td>
                      <?= $item['total'] ?>
                    </td>
                    <td><span>
                        <?= $item['order_date'] ?>
                      </span></td>
                    <td><a href="detail.php?order_id=<?= $item['order_id']?>">Edit</a></td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
    </div>
  </section>

</main><!-- End #main -->
<?php
include("../../inc/footer.php");
?>