<?php
session_start();
include("../../inc/header.php");
include_once("../../db/DBConnect.php");

$query = "SELECT * from book, categories, publisher  where 
book.cat_id = categories.cat_id and 
book.publisher_id = publisher.publisher_id";
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
    <h5 class="card-title"><a href="create.php">Add book</h5>
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
                    <th scope="col">Edit</th>


                </tr>
            </thead>
            <tbody>
                <?php
                while ($item = mysqli_fetch_assoc($rs)) {
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
                        <td>
                            <button href="edit.php?boook_id=<?= $item['book_id'] ?>">Edit</button>
                            <button href="delete.php?book_id=<?= $field['book_id'] ?>"
                       onclick="return confirm('Are you sure to delete this info ?')">Delete</button>
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