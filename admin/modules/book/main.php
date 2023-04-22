<?php
session_start();
include("../../inc/header.php");
include_once("../../db/DBConnect.php");

$query = "SELECT * from book";
$rs = mysqli_query($conn, $query);

?>
<main id="main" class="main">

    <div class="pagetitle">
        <!-- <h1>Sale Report</h1> -->
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../home/main.php">Home</a></li>
                <li class="breadcrumb-item">Book</li>
                <li class="breadcrumb-item">Order</li>

                <!-- <li class="breadcrumb-item active">Sale</li> -->
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card-body">

        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">Book ID</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Book Price</th>
                    <th scope="col">Book Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($item = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td>
                                <?= $item['book_id'] ?>
                            </td>
                            <td>
                                <?= $item['book_name'] ?>
                            </td>
                            <td>
                                <?= $item['book_author'] ?>
                            </td>
                            <td>
                                <?= $item['book_price'] ?>
                            </td>
                            <td>
                                <?= $item['book_des'] ?>
                            </td>

                        </tr>
                        <?php
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