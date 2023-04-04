<?php
 $book_id = $_POST['book_id'];

 $user_id = (int) $_SESSION['auth']['id'];

 $check_existing_cart = "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `book_id` = $book_id";
 $check_existing_cart_run = mysqli_query($conn, $check_existing_cart);

 if (mysqli_num_rows($check_existing_cart_run) > 0) {
     $delete_query = "DELETE FROM `cart` WHERE `book_id` = $book_id AND `user_id` = $user_id";
     $delete_query_run = mysqli_query($conn, $delete_query);
     if ($delete_query_run) {
        redirect("?mod=cart&act=show");                   
     } else {
         echo 500;
     }
 } else {
     echo "Something went wrong";
 }
