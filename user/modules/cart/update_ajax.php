<?php
session_start();
ob_start();
//tinh toan
$book_id = $_POST['book_id'];
$qty = $_POST['qty'];

$_SESSION['cart']['buy'][$book_id]['qty'] = $qty;
    //cap nhat tong tien
    $sub_total = $qty * $_SESSION['cart']['buy'][$book_id]['book_price'];  
    $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
    function update_info_cart(){
        if(isset($_SESSION['cart'])){
            $num_order =0;
            $total =0;
            
            foreach($_SESSION['cart']['buy'] as $item){
                $num_order +=$item['qty'];
                $total +=$item['sub_total'];
            }
            $_SESSION['cart']['infor'] = array(
                'num_order' => $num_order,
                'total' => $total
            );
        }
    }
    update_info_cart();

    //gia tri tra ve
    $result = array(
        'sub_total' => number_format($sub_total),
        'total' =>  number_format($_SESSION['cart']['infor']['total'])                     
    );

    echo json_encode($result);  

?>
