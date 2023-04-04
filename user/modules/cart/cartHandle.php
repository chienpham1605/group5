<?php

session_start();
ob_start();
$conn = mysqli_connect('localhost', 'root', '', 'onbookstore_db');
// $book_id = (int) $_POST['book_id'];
// $qty = (int) $_POST['qty'];

if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];

        $user_id = (int) $_SESSION['auth']['id'];
        switch ($scope) {
            case "add":
                $book_id = $_POST['book_id'];
                $qty = $_POST['qty'];

                $check_existing_cart = "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `book_id` = $book_id";
                $check_existing_cart_run = mysqli_query($conn, $check_existing_cart);

                if (mysqli_num_rows($check_existing_cart_run) > 0) {
                    echo "existing";

                } else {
                    $insert_query = "INSERT INTO `cart` (`id`, `user_id`, `book_id`, `qty`) VALUES (NULL, '$user_id', '$book_id', '$qty');";
                    $insert_query_run = mysqli_query($conn, $insert_query);
                    if ($insert_query_run) {
                        //gia tri tra ve
                        $result = array(
                            'sub_total' => 1,
                            'total' =>10
                        );

                        echo json_encode($result);
                        // echo 201;
                    } else {
                        echo 500;
                    }
                }
                break;
            case "update":
                $book_id = $_POST['book_id'];
                $qty = $_POST['qty'];
                $book_price=$_POST['book_price'];

                $user_id = (int) $_SESSION['auth']['id'];

                $check_existing_cart = "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `book_id` = $book_id";
                $check_existing_cart_run = mysqli_query($conn, $check_existing_cart);

                if (mysqli_num_rows($check_existing_cart_run) > 0) {
                    $update_query = "UPDATE `cart` SET  `qty` = $qty WHERE `book_id` = $book_id AND `user_id` = $user_id";
                    $update_query_run = mysqli_query($conn, $update_query);
                    if ($update_query_run) {
                                  //gia tri tra ve
                                  $result = array(
                                    'sub_total' => $qty*$book_price
                                );
        
                                echo json_encode($result);
                                // echo 201;
                    } else {
                        echo 500;
                    }
                } else {
                    echo "Something went wrong";
                }
                break;
            case "delete":
                $book_id = $_POST['book_id'];

                $user_id = (int) $_SESSION['auth']['id'];

                $check_existing_cart = "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `book_id` = $book_id";
                $check_existing_cart_run = mysqli_query($conn, $check_existing_cart);

                if (mysqli_num_rows($check_existing_cart_run) > 0) {
                    $delete_query = "DELETE FROM `cart` WHERE `book_id` = $book_id AND `user_id` = $user_id";
                    $delete_query_run = mysqli_query($conn, $delete_query);
                    if ($delete_query_run) {
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