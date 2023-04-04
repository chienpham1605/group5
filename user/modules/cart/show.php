<?php
// show_array($_SESSION['auth']);
$list_cart = getCartItem();


?>
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>All(3 Products)</th>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_cart as $item):                               
                                ?>
                                <tr>       
                                    <td> <input type="checkbox"></td>                             
                                    <td class="cart_product_img">
                                   
                                        <a href="#"><img src="public/img/bg-img/cart1.jpg" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>
                                            <a href="?mod=product&act=detail&book_id=<?=$item['book_id']?>"><?= $item['book_name'] ?></a>
                                        </h5>
                                    </td>
                                    <td class="price">
                                        <span>
                                            <?= $item['book_price'] ?>
                                        </span>
                                    </td>
                                    <!-- <td><input type="hidden" id="book_id" value="<?= $item['book_id']?>"></td> -->
                                    <td class="qty">                                 
                                        <input class="num_order" type="number" min="1" max="200" data-price="<?php echo $item['book_price']?>" data-id="<?php echo $item['book_id']?>" value="<?php echo $item['qty'] ?>" name="qty[<?php echo $item['book_id'] ?>]">                                                                              
                                       
                                    </td>
                                    <td class="subtotal">
                                        <span id="sub-total-<?php echo $item['book_id']?>">
                                        <?= $item['book_price']*$item['qty']?>
                                        </span>
                                    </td>
                                    <td><i class="fa fa-trash remove" data-id="<?php echo $item['book_id']?>" onclick="return confirm('Are you sure to delete this item ?')"></i></td>
                                </tr>
                                <?php
                            endforeach
                            ?>
                            <!-- <tr>
                                <td class="cart_product_img">
                                    <a href="#"><img src="public/img/bg-img/cart1.jpg" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5>White Modern Chair</h5>
                                </td>
                                <td class="price">
                                    <span>$130</span>
                                </td>
                                <td class="qty">
                                    <div class="qty-btn d-flex">
                                        <p>Qty</p>
                                        <div class="quantity">
                                            <span class="qty-minus"
                                                onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                    class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300"
                                                name="quantity" value="1">
                                            <span class="qty-plus"
                                                onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                    class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="subtotal">
                                    <span>$130</span>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>Total:</span> <span>$</span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span>$
                                
                            </span></li>
                    </ul>
                    <div class="cart-btn mt-100">
                        <a href="cart.html" class="btn amado-btn w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->