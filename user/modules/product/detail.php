<?php
$book_id = (int) $_GET['book_id'];
// echo $book_id;
//lay san pham theo id
// $item = db_fetch_row("SELECT * FROM `book` WHERE book_id = '{$id}'");
// $item = get_product_by_id($id);
// $info_cat = db_fetch_row("SELECT * FROM `categories` WHERE cat_id = '{$item['cat_id']}'");
// $img = db_fetch_array("SELECT * FROM `book_image` WHERE book_image_id = '{$id}'");

// show_array($info_cat);
// die();
// show_array($list_item);
// $item = get_product_by_id($id);
// foreach($item as $field){
//     $field['url_add_cart'] = "?mod=cart&act=add&id={$id}";
//     $field['url'] = "?mod=product&act=detail&id={$id}";
// }
$item = get_product_by_id($book_id);
// show_array($item);

?>
<!-- Product Details Area Start -->
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                        <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">white modern chair</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <!-- <li class="active" data-target="#product_details_slider" data-slide-to="0"
                                style="background-image: url(img/product-img/pro-big-1.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="1"
                                style="background-image: url(img/product-img/pro-big-2.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="2"
                                style="background-image: url(img/product-img/pro-big-3.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="3"
                                style="background-image: url(img/product-img/pro-big-4.jpg);">
                            </li> -->
                        </ol>
                        <!-- <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-1.jpg" alt="First slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-2.jpg" alt="Second slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price">$
                            <?= $item['book_price'] ?>
                        </p>
                        <a href="product-details.html">
                            <h6>
                                <?= $item['book_name'] ?>
                            </h6>
                        </a>
                        <!-- Ratings & Review -->
                        <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="review">
                                <a href="#">Write A Review</a>
                            </div>
                        </div>
                        <!-- Avaiable -->
                        <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                    </div>

                    <div class="short_overview my-5">
                        <p>
                            <?= $item['book_des'] ?>
                        </p>
                    </div>

                    <!-- Add to Cart Form -->
                    <form class="cart clearfix" method="POST" action="?mod=cart&act=add">
                        <div class="cart-btn d-flex mb-50">
                            <div class="quantity">
                                <div class="input-group mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control input-qty text-center" name="quantity" disabled value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="addToCart" value="<?= $item['book_id'] ?>"
                            class="btn amado-btn addToCartBtn">Add To Cart</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->