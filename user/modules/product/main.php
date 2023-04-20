 <?php
 include("../../inc/header.php");
 include("../../db/DBConnect.php");
$cat_id = $_GET['cat_id'];
$list_book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from book where cat_id = '$cat_id'"));
var_dump($list_book);
 ?>

<?php
 include("../../inc/footer.php");

 ?>