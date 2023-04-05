<?php
if (!isset($_GET['book_id'])):
   redirect("?mod=cart&act=show");
endif;
$user_id = (int) $_SESSION['auth']['id'];
$book_id = $_GET['book_id'];
if($book_id=="all"){
    $query = "DELETE FROM `cart`";
$rs = mysqli_query($conn, $query);
   $rs = mysqli_query($conn, $query);
   if (!$rs):
       error_clear_last();
       echo 'nothing to delete';
   endif;
   redirect("?mod=cart&act=show");
}


//close connection
// mysqli_close($conn);
