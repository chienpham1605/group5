<?php
function add_cart($id){
    // global $list_product;
    $item = get_product_by_id($id);
    $qty=1;
if(isset($_SESSION['cart'])&&array_key_exists($id, $_SESSION['cart']['buy'])){
    $qty = $_SESSION['cart']['buy'][$id]['qty']+1;
}
$_SESSION['cart']['buy'][$id]= array(
    'book_id'=> $item['book_id'],
    'url_detail'=> $item['url_detail'], //url detail
    'book_name' => $item['book_name'],
    'book_price' => $item['book_price'],
    // 'product_thumb' => $item['product_thumb'],
    // 'code' => $item['code'],
    'qty' =>$qty,
    'sub_total' => $item['book_price']*$qty     
);

update_info_cart();
}
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

function get_list_buy_cart(){
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart']['buy'] as $item){
            $item['url_delete_cart'] = "?mod=cart&act=delete&id={$item['book_id']}";
            $_SESSION['cart']['buy'][$item['book_id']]= $item;
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}

function get_num_order_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['infor']['num_order'];
    }
    
}
function get_total_order_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['infor']['total'];
    }
    
}
function delete_cart($id){
    if(isset($_SESSION['cart'])){
        //xoa san pham trong gio hang
        if(!empty($id)){
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        }
        else{
            unset($_SESSION['cart']);
        }
       

    }
}
function delete_cart_all(){
    if(isset($_SESSION['cart'])){       
            unset($_SESSION['cart']);
        }        
}

function update_cart($qty){
    foreach($qty as $id => $new_qty){
        $_SESSION['cart']['buy'][$id]['qty']= $new_qty;
        
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty*$_SESSION['cart']['buy'][$id]['book_price'];
    }
    update_info_cart();
}


//

function getCartItem(){
    global $conn;
    $user_id = $_SESSION['auth']['id'];
    
    $query = "SELECT `book`.`book_id`, `book`.`book_name`, `book`.`book_price`, `cart`.`qty` FROM `cart`, `book` WHERE `cart`.`book_id`=`book`.`book_id` AND `cart`.`user_id`={$user_id}";
    $list_cart = mysqli_query($conn, $query);  
    // $list_cart = mysqli_fetch_assoc(mysqli_query($conn, $query));  
    return $list_cart;
}