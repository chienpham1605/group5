<?php
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
include("../../inc/header.php");

if (!isset($_GET['cat_id'])):
  header("Location:../home/main.php");
endif;


?>
<h1>Main Product page</h1>
<?php
include("../../inc/footer.php");
?>