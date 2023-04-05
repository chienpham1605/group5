<?php
session_start();
ob_start();
$conn = mysqli_connect('localhost', 'root', '', 'onbookstore_db');
if (isset($_SESSION['auth'])) {
    $user_id = (int) $_SESSION['auth']['id'];
    $book_id = $_POST['book_id'];
    $book_price = $_POST['book_price'];
    $qty = $_POST['qty'];

    $check_existing_cart = "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `book_id` = $book_id";
    $check_existing_cart_run = mysqli_query($conn, $check_existing_cart);

    if (mysqli_num_rows($check_existing_cart_run) > 0) {
        echo "existing";
    } else {
        $insert_query = "INSERT INTO `cart` (`id`, `user_id`, `book_id`, `qty`) VALUES (NULL, '$user_id', '$book_id', '$qty');";
        $insert_query_run = mysqli_query($conn, $insert_query);
        if ($insert_query_run) {
            $result = array(
                'response' => 201,
                'qty'=> $qty,
                'book_id'=> $book_id,
                'sub_total' => $qty * $book_price,
                // 'total' => $total
            );

            echo json_encode($result);
            // echo 201;
        } else {
            echo 501;
        }
    }
} else {
    echo 401;
}
?>