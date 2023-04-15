<?php
$current_day = date("d/m/Y");
$previous_day = date("d/m/Y",strtotime("-1 days"));
$report_current = db_fetch_row("SELECT COUNT(ordermaster.order_id) AS sale, 
SUM(orderdetail.book_price*orderdetail.quantity) AS revenue, 
COUNT(distinct ordermaster.cus_id) as customer 
FROM ordermaster, orderdetail WHERE ordermaster.order_id = orderdetail.order_id AND ordermaster.order_date = '$current_day'");
$report_previous =db_fetch_row("SELECT COUNT(ordermaster.order_id) AS sale, 
SUM(orderdetail.book_price*orderdetail.quantity) AS revenue, 
COUNT(distinct ordermaster.cus_id) as customer 
FROM ordermaster, orderdetail WHERE ordermaster.order_id = orderdetail.order_id AND ordermaster.order_date = '$previous_day'");


$order_list = db_fetch_array("SELECT SUM(quantity*book_price) as total, ordermaster.order_id, customer.fullname, ordermaster.order_id, ordermaster.order_date, ordermaster.order_status  FROM orderdetail, ordermaster, customer WHERE orderdetail.order_id = ordermaster.order_id AND ordermaster.cus_id = customer.id GROUP BY orderdetail.order_id;");


$top_selling_list = db_fetch_array("SELECT book.book_id, book.book_name, book.book_price as current_price,
SUM(orderdetail.quantity) as sold, SUM(orderdetail.book_price*orderdetail.quantity) as revenue 
FROM book, orderdetail WHERE book.book_id = orderdetail.book_id GROUP BY book.book_id ORDER BY `sold` DESC LIMIT 10");



//chart month
$this_month = date("m");
$this_year = date("Y");
$revenue_report_month = db_fetch_array("SELECT SUM(order_total) AS revenue, COUNT(order_total) AS order_count, revenue_total.order_date 
FROM ((SELECT SUM(orderdetail.quantity*orderdetail.book_price) as order_total, ordermaster.order_date FROM ordermaster, orderdetail WHERE ordermaster.order_id = orderdetail.order_id GROUP BY ordermaster.order_id) as revenue_total) 
WHERE revenue_total.order_date LIKE '__/$this_month/$this_year' GROUP BY revenue_total.order_date
");

$customer_report_month = db_fetch_array("SELECT COUNT(ordermaster.cus_id) AS customer_count, ordermaster.order_date 
FROM `ordermaster` WHERE ordermaster.order_date LIKE '__/$this_month/$this_year' 
GROUP BY ordermaster.order_date");
foreach($customer_report_month as $field){   
    $customer_count[] = $field['customer_count'];
}
foreach($revenue_report_month as $field){
    $order_date[] = $field['order_date'];
    $revenue[] = $field['revenue'];
    $order_count[] = $field['order_count'];
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">                         
                            <select id="sale" class="form-control">
                                <option selected value="today">Today</option>
                                <option value="this_month">This Month</option>
                                <option value="this_year">This Year</option>
                            </select>                            
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Sales</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_sale"><?= $report_current['sale']?></h6>
                                        <span class="text-success small pt-1 fw-bold" id="percent_sale">
                                            <?= $report_previous['sale']==0?100: round(($report_current['sale']/$report_previous['sale']-1)*100,2); ?>
                                        </span>
                                        <span class="text-success small pt-1 fw-bold" >%</span> 
                                        <span class="text-muted small pt-2 ps-1" id="status_sale">
                                            <?= ($report_previous['sale']<$report_current['sale'])?"increase":"decrease"?>
                                        </span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <select id="revenue" class="form-control">
                                    <option value="today" selected>Today</option>
                                    <option value="this_month">This Month</option>
                                    <option value="this_year">This Year</option>
                                </select> 
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_revenue"><?= $report_current['revenue']?></h6>
                                        <span class="text-success small pt-1 fw-bold" id="percent_revenue">
                                        <?= $report_previous['revenue']==0?100: round(($report_current['revenue']/$report_previous['revenue']-1)*100,2); ?>
                                        </span> 
                                        <span class="text-success small pt-1 fw-bold">%</span> 
                                        <span class="text-muted small pt-2 ps-1" id="status_revenue">
                                        <?= ($report_previous['revenue']<$report_current['revenue'])?"increase":"decrease"?>
                                        </span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <select id="customer" class="form-control">
                                    <option value="today" selected>Today</option>
                                    <option value="this_month">This Month</option>
                                    <option value="this_year">This Year</option>
                                </select> 
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Customers</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_customer"><?= $report_current['customer']?></h6>
                                        <span class="text-success small pt-1 fw-bold" id="percent_customer">
                                        <?= $report_previous['customer']==0?100: round(($report_current['customer']/$report_previous['customer']-1)*100,2); ?>
                                        </span> 
                                        <span class="text-success small pt-1 fw-bold">%</span> 
                                        <span class="text-muted small pt-2 ps-1" id="status_customer">
                                        <?= ($report_previous['customer']<$report_current['customer'])?"increase":"decrease"?>
                                        </span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Reports <span>/This Month</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChartMonth"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChartMonth"), {
                                            series: [{
                                                name: 'Sales',
                                                data: <?php echo json_encode($order_count)?>,
                                            }, {
                                                name: 'Revenue',
                                                data: <?php echo json_encode($revenue)?>,
                                            }, {
                                                name: 'Customers',
                                                data: <?php echo json_encode($customer_count)?>,
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'string',
                                                categories: <?php echo json_encode($order_date)?>
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title"><a href="?mod=order&act=main">Sales</a> <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($order_list) == 0) {
                                            echo "Record not found";
                                        } else {
                                            foreach ($order_list as $item) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><a href="?mod=order&act=detail&order_id=<?= $item['order_id']?>">#<?=$item['order_id']?></a></th>
                                                    <td><?= $item['fullname']?></td>
                                                    <td><a href="#" class="text-primary"><?= $item['order_date']?></a></td>
                                                    <td><?= $item['total']?></td>
                                                    <td><span class="badge bg-success"><?= $item['order_status']?></span></td>
                                                    <td><a href="?mod=order&act=detail&order_id=<?= $item['order_id']?>" class="badge bg-info">Edit</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top 10 Selling <span>| Today</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Book ID</th>
                                            <th scope="col">Book Name</th>
                                            <th scope="col">Current Price</th>
                                            <th scope="col">Sold</th>
                                            <th scope="col">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($top_selling_list) == 0) {
                                            echo "Record not found";
                                        } else {
                                            foreach ($top_selling_list as $item) {
                                                ?>
                                                   <tr>
                                            <td><?= $item['book_id']?></td>
                                            <td><a href="#" class="text-primary fw-bold"><?= $item['book_name']?></a></td>
                                            <td>$<?= $item['current_price']?></td>
                                            <td class="fw-bold"><?= $item['sold']?></td>
                                            <td>$<?= $item['revenue']?></td>
                                        </tr>   
                                                <?php
                                            }
                                        }
                                        ?>                                                           
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->