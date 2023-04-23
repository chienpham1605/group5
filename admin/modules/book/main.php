<?php
include("../../inc/header.php");
include_once("../../db/DBConnect.php");

$query = "SELECT * from book, categories, publisher  where 
book.cat_id = categories.cat_id and 
book.publisher_id = publisher.publisher_id";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);
var_dump($count);
?>


<?php
include("../../inc/footer.php");
?>