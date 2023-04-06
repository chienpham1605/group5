<?php
session_start();
ob_start();
$conn = mysqli_connect('localhost', 'root', '', 'onbookstore_db');
if (isset($_SESSION['auth'])) {
    if (!isset($_POST['book_id'])):
        redirect("?mod=cart&act=show");
    endif;
    $book_id = $_POST['book_id'];
    $qty = $_POST['qty'];
    $book_price = $_POST['book_price'];

    $user_id = (int) $_SESSION['auth']['id'];

    $check_existing_cart = "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `book_id` = $book_id";
    $check_existing_cart_run = mysqli_query($conn, $check_existing_cart);

    if (mysqli_num_rows($check_existing_cart_run) > 0) {
        $update_query = "UPDATE `cart` SET  `qty` = $qty WHERE `book_id` = $book_id AND `user_id` = $user_id";
        $update_query_run = mysqli_query($conn, $update_query);        
       

        // $total_cart = array();
       
        // while ($row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `cart` WHERE `user_id` = $user_id"))) {
        //     $total_cart[] = $row;
        // }       
        // foreach($total_cart as $item  ){
        //     $total +=$item['book_price']*$item['qty'];
        // }

        if ($update_query_run) {
            //gia tri tra ve
            $result = array(
                'qty' => $qty,
                'book_id' => $book_id,
                'sub_total' => $qty * $book_price,
                // 'total' => $total
            );
            echo json_encode($result);
            // echo 201;
        } else {
            echo 500;
        }
    }
} else {
    echo 401;
}