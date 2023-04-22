<?php
session_start();
include("../../inc/header.php");
include_once("../../db/DBConnect.php");

$query = "SELECT * from book, categories, publisher, book_image where 
book.cat_id = categories.cat_id and 
book.publisher_id = publisher.publisher_id and
book.book_id = book_image.book_image_id";
$rs = mysqli_query($conn, $query);

?>
<main id="main" class="main">

    <div class="pagetitle">

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../home/main.php">Home</a></li>
                <li class="breadcrumb-item">Book</li>
            </ol>
        </nav>
    </div>

    <form class="card-body" method="post">

        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">Book ID</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Book Price</th>
                    <th scope="col">Book Description</th>
                    <th scope="col">Book Pages</th>
                    <th scope="col">Book Publisher</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>


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
                        <td>
                            <?= $item['page'] ?>
                        </td>
                        <td>
                            <?= $item['publisher_name'] ?>
                        </td>
                        <td>
                            <?= $item['cat_name'] ?>
                        </td>
                        <td rowspan="2" width="20%" >
                            <img src=<?= $item['img_url']?> width = "150" >
                        </td>
                        <td>
                            <?= $item['cat_name'] ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

            </form>
        </section>

</main><!-- End #main -->
<?php
include("../../inc/footer.php");
?>