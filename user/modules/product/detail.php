<?php
session_start();
include_once("../../db/DBConnect.php");
include_once("../../db/database.php");
include("../../inc/header.php");

if (!isset($_GET['book_id'])):
    header("../../home/main.php");
endif;
$book_id = $_GET['book_id'];
$book_detail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `book`, publisher, discount  WHERE book_id = '{$book_id}' and book.publisher_id = publisher.publisher_id and book.discount_id = discount.discount_id"));
$detail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM categories, book WHERE categories.cat_id=book.cat_id AND book.book_id = '{$book_id}' "));
$img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM book_image, book WHERE book_image.book_image_id=book.book_id AND book.book_id = '{$book_id}' "));

// $feedback = mysqli_fetch_assoc(mysqli_query("SELECT * FROM feedback where feedback.book_id=book.book_id AND book.book_id = '{$book_id}' "));
// var_dump($img);
?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="../home/main.php">Home</a></li>
                <li><a href="#"><?= $detail['cat_name'] ?></a></li>
                <li class='active'><?= $detail['book_name'] ?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
                <div class="sidebar-module-container">
                <div class="home-banner outer-top-n outer-bottom-xs">
<img src="../../public/assets/images/banners/LHS-banner.jpg" alt="Image">
</div>		
  
    
    
        <!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> 
                  <a href="#">
                  <img src="../../public/assets/images/hot-deals/p13.jpg" alt=""> 
                  <img src="../../public/assets/images/hot-deals/p13_hover.jpg" alt="" class="hover-image">
                  </a>
                  </div>
                  <div class="sale-offer-tag"><span>49%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> $600.00 </span> <span class="price-before-discount">$800.00</span> </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> 
                   <a href="#">
                  <img src="../../public/assets/images/hot-deals/p14.jpg" alt=""> 
                  <img src="../../public/assets/images/hot-deals/p14_hover.jpg" alt="" class="hover-image">
                  </a>
                   </div>
                  <div class="sale-offer-tag"><span>35%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">Days</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> $600.00 </span> <span class="price-before-discount">$800.00</span> </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image">
                   <a href="#">
                  <img src="../../public/assets/images/hot-deals/p15.jpg" alt=""> 
                  <img src="../../public/assets/images/hot-deals/p15_hover.jpg" alt="" class="hover-image">
                  </a>
                   </div>
                  <div class="sale-offer-tag"><span>35%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">Days</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> $600.00 </span> <span class="price-before-discount">$800.00</span> </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget --> 
        </div>
<!-- ============================================== HOT DEALS: END ============================================== -->					



<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  outer-top-vs ">
    <div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="../../public/assets/images/testimonials/member1.png" alt="Image"></div>
        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
        <div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
             <div class="avatar"><img src="../../public/assets/images/testimonials/member3.png" alt="Image"></div>
        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
        <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="../../public/assets/images/testimonials/member2.png" alt="Image"></div>
        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
        <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>
    
<!-- ============================================== Testimonials: END ============================================== -->

                </div>
            </div><!-- /.sidebar -->
            <div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
            <div class="detail-block">
                <div class="row">
                
                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product" method="post">
            <div class="single-product-gallery-item" id="slide1">
                    <img class="img-responsive"  src="<?= $img['img_url'] ?>" data-echo="<?= $img['img_url'] ?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href=" <?= $img['img_url'] ?> ">
                    <img class="img-responsive" alt="" src="<?= $img['img_url'] ?>" data-echo="<?= $img['img_url'] ?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="../../public/assets/images/products/p3.jpg">
                    <img class="img-responsive" alt="" src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p3.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide4">
                <a data-lightbox="image-1" data-title="Gallery" href="../../public/assets/images/products/p4.jpg">
                    <img class="img-responsive" alt="" src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p4.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide5">
                <a data-lightbox="image-1" data-title="Gallery" href="../../public/assets/images/products/p5.jpg">
                    <img class="img-responsive" alt="" src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p5.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide6">
                <a data-lightbox="image-1" data-title="Gallery" href="../../public/assets/images/products/p6.jpg">
                    <img class="img-responsive" alt="" src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p6.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide7">
                <a data-lightbox="image-1" data-title="Gallery" href="../../public/assets/images/products/p7.jpg">
                    <img class="img-responsive" alt="" src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p7.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide8">
                <a data-lightbox="image-1" data-title="Gallery" href="../../public/assets/images/products/p8.jpg">
                    <img class="img-responsive" alt="" src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p8.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide9">
                <a data-lightbox="image-1" data-title="Gallery" href="../../public/assets/images/products/p9.jpg">
                    <img class="img-responsive" alt="" src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p9.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">


            
      </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
                    <div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>					
                        <form action="../cart/add.php" method="POST">
                            <div class="product-info">
                                <h1 class="name"><?= $detail['book_name'] ?></h1>
                            
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="pull-left">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div><!-- /.row -->		
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="pull-left">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>	
                                        </div>
                                        <div class="pull-left">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>	
                                        </div>
                                        </div>
                                    </div><!-- /.row -->	
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    <p>Author: <?= $detail['book_author'] ?> </p>
                                    <p>Publisher: <?= $book_detail['publisher_name'] ?> </p>
                                    <p>publication Year: <?= $detail['YearBook'] ?> </p>
                                    <p>Page: <?= $detail['page'] ?></p>
                                </div>

                                <div class="price-container info-container m-t-30">
                                    <div class="row">
                                    

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="price-box">
                                                <span class="price">$<?= $detail['book_price'] * $book_detail['discount_per'] ?></span>
                                                <span class="price-strike">$<?= $detail['book_price'] ?></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="favorite-button m-t-5">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                   <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="quantity-container info-container">
                                    <div class="row">
                                    
                                        <div class="qty">
                                            <span class="label">Qty :</span>
                                        </div>
                                    
                                        <div class="qty-count">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                      <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                      <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="number" name="qty" class="input-qty" value="1">
                                              </div>
                                            </div>
                                        </div>


                                        <input type="hidden" name="book_id" value="<?= $detail['book_id'] ?>">
                                    
                                        <input type="hidden" name="book_price" value="<?= $detail['book_price'] ?>">
                                    
                                

                                        <div class="add-btn" data-id="<?= $detail['book_id'] ?>" data-price="<?= $detail['book_price']* $book_detail['discount_per'] ?>">
                                            <input type="submit" name="btnAdd" class="btn btn-primary" value="add"></input>
                                        </div>
                                        <?php

                                        ?>
                                                                        </div><!-- /.row -->
                                </div><!-- /.quantity-container -->						
                            </div><!-- /.product-info -->
                            </form>
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                    </div>
                
                    <div class="product-tabs inner-bottom-xs">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-12 col-md-9 col-lg-9">

                                <div class="tab-content">
                                
                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text"><?= $book_detail['book_des'] ?></p>
                                        </div>	
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                                                                
                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                                                                            </div>
                                            
                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->
                                        

                                        
                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">	
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                            </thead>	
                                                            <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Quality</td>
                                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Price</td>
                                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Value</td>
                                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->
                                            
                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form class="cnt-form">
                                                        
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->
                                                        
                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->										
                                        
                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">
                                        
                                            <h4 class="title">Product Tags</h4>
                                            <form class="form-inline form-cnt">
                                                <div class="form-container">
                                    
                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">
                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->
                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product">
<div class="row">
<div class="col-lg-3">
          <h3 class="section-title">Relative Products</h3>
         <div class="ad-imgs">
         <img class="img-responsive" src="../../public/assets/images/banners/home-banner1.jpg" alt="">
          <img class="img-responsive" src="../../public/assets/images/banners/home-banner2.jpg" alt="">
         </div>
          </div>
          <div class="col-lg-9">
    <div class="owl-carousel homepage-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
            
        <div class="item item-carousel">
            <div class="products">
                
    <div class="product">		
        <div class="product-image">
            <div class="image">
                <a href="detail.html"><img  src="../../public/assets/images/products/p1.jpg" alt=""></a>
            </div><!-- /.image -->			

                        <div class="tag sale"><span>sale</span></div>            		   
        </div><!-- /.product-image -->
            
        
        <div class="product-info text-left">
            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

            <div class="product-price">	
                <span class="price">
                    $650.99				</span>
                                             <span class="price-before-discount">$ 800</span>
                                    
            </div><!-- /.product-price -->
            
        </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>													
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    
                        </li>
                       
                        <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                 <i class="icon fa fa-heart"></i>
                            </a>
                        </li>

                        <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
            </div><!-- /.product -->
      
            </div><!-- /.products -->
        </div><!-- /.item -->
    
        <div class="item item-carousel">
            <div class="products">
                
    <div class="product">		
        <div class="product-image">
            <div class="image">
                <a href="detail.html"><img  src="../../public/assets/images/products/p2.jpg" alt=""></a>
            </div><!-- /.image -->			

                        <div class="tag sale"><span>sale</span></div>            		   
        </div><!-- /.product-image -->
            
        
        <div class="product-info text-left">
            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

            <div class="product-price">	
                <span class="price">
                    $650.99				</span>
                                             <span class="price-before-discount">$ 800</span>
                                    
            </div><!-- /.product-price -->
            
        </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>													
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    
                        </li>
                       
                        <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                 <i class="icon fa fa-heart"></i>
                            </a>
                        </li>

                        <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
            </div><!-- /.product -->
      
            </div><!-- /.products -->
        </div><!-- /.item -->
    
        <div class="item item-carousel">
            <div class="products">
                
    <div class="product">		
        <div class="product-image">
            <div class="image">
                <a href="detail.html"><img  src="../../public/assets/images/products/p3.jpg" alt=""></a>
            </div><!-- /.image -->			

                                    <div class="tag hot"><span>hot</span></div>		   
        </div><!-- /.product-image -->
            
        
        <div class="product-info text-left">
            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

            <div class="product-price">	
                <span class="price">
                    $650.99				</span>
                                             <span class="price-before-discount">$ 800</span>
                                    
            </div><!-- /.product-price -->
            
        </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>													
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    
                        </li>
                       
                        <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                 <i class="icon fa fa-heart"></i>
                            </a>
                        </li>

                        <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
            </div><!-- /.product -->
      
            </div><!-- /.products -->
        </div><!-- /.item -->
    
        <div class="item item-carousel">
            <div class="products">
                
    <div class="product">		
        <div class="product-image">
            <div class="image">
                <a href="detail.html"><img  src="../../public/assets/images/products/p4.jpg" alt=""></a>
            </div><!-- /.image -->			

            <div class="tag new"><span>new</span></div>                        		   
        </div><!-- /.product-image -->
            
        
        <div class="product-info text-left">
            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

            <div class="product-price">	
                <span class="price">
                    $650.99				</span>
                                             <span class="price-before-discount">$ 800</span>
                                    
            </div><!-- /.product-price -->
            
        </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>													
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    
                        </li>
                       
                        <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                 <i class="icon fa fa-heart"></i>
                            </a>
                        </li>

                        <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
            </div><!-- /.product -->
      
            </div><!-- /.products -->
        </div><!-- /.item -->
    
        <div class="item item-carousel">
            <div class="products">
                
    <div class="product">		
        <div class="product-image">
            <div class="image">
                <a href="detail.html"><img  src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p5.jpg" alt=""></a>
            </div><!-- /.image -->			

                                    <div class="tag hot"><span>hot</span></div>		   
        </div><!-- /.product-image -->
            
        
        <div class="product-info text-left">
            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

            <div class="product-price">	
                <span class="price">
                    $650.99				</span>
                                             <span class="price-before-discount">$ 800</span>
                                    
            </div><!-- /.product-price -->
            
        </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>													
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    
                        </li>
                       
                        <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                 <i class="icon fa fa-heart"></i>
                            </a>
                        </li>

                        <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
            </div><!-- /.product -->
      
            </div><!-- /.products -->
        </div><!-- /.item -->
    
        <div class="item item-carousel">
            <div class="products">
                
    <div class="product">		
        <div class="product-image">
            <div class="image">
                <a href="detail.html"><img  src="../../public/assets/images/blank.gif" data-echo="../../public/assets/images/products/p6.jpg" alt=""></a>
            </div><!-- /.image -->			

            <div class="tag new"><span>new</span></div>                        		   
        </div><!-- /.product-image -->
            
        
        <div class="product-info text-left">
            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

            <div class="product-price">	
                <span class="price">
                    $650.99				</span>
                                             <span class="price-before-discount">$ 800</span>
                                    
            </div><!-- /.product-price -->
            
        </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>													
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    
                        </li>
                       
                        <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                 <i class="icon fa fa-heart"></i>
                            </a>
                        </li>

                        <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
            </div><!-- /.product -->
      
            </div><!-- /.products -->
        </div><!-- /.item -->
            </div><!-- /.home-owl-carousel -->
            </div>
            </div>
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
            
            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider">

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->



<?php
include("../../inc/footer.php");
?>