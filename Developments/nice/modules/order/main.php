<?php
$order_list = db_fetch_array("SELECT SUM(quantity*book_price) as total, ordermaster.order_id, customer.fullname, ordermaster.order_id, ordermaster.order_date, ordermaster.order_status  FROM orderdetail, ordermaster, customer WHERE orderdetail.order_id = ordermaster.order_id AND ordermaster.cus_id = customer.id GROUP BY orderdetail.order_id;");
// show_array($order_list);
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
        <div class="card-body">
        <h5 class="card-title">Filter</h5>
        <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">From</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control">
                  </div>
                  <label for="inputDate" class="col-sm-2 col-form-label">To</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control">
                  </div>
                </div>
        </div>  
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
                                                    <th scope="row"><a href="?mod=order&act=detail&order_id=<?= $item['order_id']?>">#<?=$item['order_id']?></a></th>
                                                    <td><?= $item['fullname']?></td>
                                                    <td><a href="?mod=order&act=detail&order_id=<?= $item['order_id']?>" class="text-primary"><?= $item['order_status']?></a></td>
                                                    <td><?= $item['total']?></td>
                                                    <td><span><?= $item['order_date']?></span></td>   
                                                    <td href="#"><a>Edit</a></td>                                                 
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