<?php

session_start();
ob_start();
$conn = mysqli_connect('localhost', 'root', '', 'onbookstore_db');
// $book_id = (int) $_POST['book_id'];
// $qty = (int) $_POST['qty'];

if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {


        $user_id = (int) $_SESSION['auth']['id'];
        switch ($scope) {            
            case "update":
                $book_id = $_POST['book_id'];
                $qty = $_POST['qty'];

                $user_id = (int) $_SESSION['auth']['id'];

                $check_existing_cart = "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `book_id` = $book_id";
                $check_existing_cart_run = mysqli_query($conn, $check_existing_cart);

                if (mysqli_num_rows($check_existing_cart_run) > 0) {
                    $update_query = "UPDATE `cart` SET  `qty` = $qty WHERE `book_id` = $book_id AND `user_id` = $user_id";
                    $update_query_run = mysqli_query($conn, $update_query);
                    if ($update_query_run) {
                        echo 200;
                    } else {
                        echo 500;
                    }
                } else {
                    echo "Something went wrong";
                }
                break;
            default:
                echo 500;
        }
    }
} else {
    echo 401;
}
?>