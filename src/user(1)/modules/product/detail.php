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
$query = "SELECT * FROM feedback, book, customer where feedback.book_id=book.book_id AND feedback.customer_id = customer.id and book.book_id = '{$book_id}'";
$rs_feedback = mysqli_query($conn, $query);

// var_dump($img);
$ratingErr = "";
$content = $rating = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["txtcontent"])) {
    $content = "";
  } else {
    $content = test_input($_POST["txtcontent"]);
  }

  if (empty($_POST["txtstar"])) {
    $ratingErr = "Date is required";
  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['btnAdd'])):
  if (empty($ratingErr)):
    // echo '<h2 style="color:blue">Welcome '. $sName . ' to my service</h2>';
    $query = "insert into feedback (content, rating) values('{$content}, '{$rating}')";
    $rs = mysqli_query($conn, $query);
    if (!$rs):
      echo 'can not found';
    endif;
    header("location:Ex01_read.php");
  endif;
endif;
?>
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="../home/main.php">Home</a></li>
        <li><a href="#">
            <?= $detail['cat_name'] ?>
          </a></li>
        <li class='active'>
          <?= $detail['book_name'] ?>
        </li>
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

            <!-- ============================================== HOT DEALS: END ============================================== -->



            <!-- ============================================== Testimonials============================================== -->

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
                      <img class="img-responsive" src="<?= $book_detail['book_image'] ?>"
                        data-echo="<?= $book_detail['book_image'] ?>" />
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
                    <h1 class="name">
                      <?= $detail['book_name'] ?>
                    </h1>

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
                      <p>Author:
                        <?= $detail['book_author'] ?>
                      </p>
                      <p>Publisher:
                        <?= $book_detail['publisher_name'] ?>
                      </p>
                      <p>publication Year:
                        <?= $detail['YearBook'] ?>
                      </p>
                      <p>Page:
                        <?= $detail['page'] ?>
                      </p>
                    </div>

                    <div class="price-container info-container m-t-30">
                      <div class="row">


                        <div class="col-sm-6 col-xs-6">
                          <div class="price-box">
                            <span class="price">$
                              <?= $detail['book_price'] * $book_detail['discount_per'] ?>
                            </span>
                            <span class="price-strike">$
                              <?= $detail['book_price'] ?>
                            </span>
                          </div>
                        </div>

                        <div class="col-sm-6 col-xs-6">
                          <div class="favorite-button m-t-5">
                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist"
                              href="#">
                              <i class="fa fa-heart"></i>
                            </a>
                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                              title="Add to Compare" href="#">
                              <i class="fa fa-signal"></i>
                            </a>
                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail"
                              href="#">
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
                                <div class="arrow plus gradient"><span class="ir"><i
                                      class="icon fa fa-sort-asc"></i></span></div>
                                <div class="arrow minus gradient"><span class="ir"><i
                                      class="icon fa fa-sort-desc"></i></span></div>
                              </div>
                              <input type="number" name="qty" class="input-qty" value="1">
                            </div>
                          </div>
                        </div>


                        <input type="hidden" name="book_id" value="<?= $detail['book_id'] ?>">

                        <input type="hidden" name="book_price" value="<?= $detail['book_price'] ?>">



                        <div class="add-btn" data-id="<?= $detail['book_id'] ?>"
                          data-price="<?= $detail['book_price'] ?>">
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
                      <p class="text">
                        <?= $book_detail['book_des'] ?>
                      </p>
                    </div>
                  </div><!-- /.tab-pane -->

                  <div id="review" class="tab-pane">
                    <div class="product-tab">
                      <div class="product-add-review">
                        <h4>Customer review</h4>
                        <h4 class="title">Write your own review</h4>
                        <div class="review-table">
                          <div class="table-responsive">
                            <table class="table">
                              <div class="rate" name="txtstar">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                                <span class="error">
                                </span>
                              </div>
                          </div>
                        </div>
                        </table><!-- /.table .table-bordered -->
                      </div><!-- /.table-responsive -->
                    </div><!-- /.review-table -->

                    <div class="review-form">
                      <div class="form-container">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputReview">Content <span class="astk">*</span></label>
                              <textarea class="form-control txt txt-review" name="txtcontent" id="exampleInputReview"
                                rows="4" placeholder=""></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="action text-right" name="btnAdd">
                          <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                        </div>

                        </form><!-- /.cnt-form -->
                      </div><!-- /.form-container -->
                    </div><!-- /.review-form -->

                  </div><!-- /.product-add-review -->

                  <div id="tags" class="tab-pane">
                    <div class="product-tag">

                      <h4 class="title">Reviews</h4>
                      <form class="form-inline form-cnt">
                        <div class="form-container">

                          <?php
                          if ($count == 0):
                            echo 'record not found';
                          else:
                            while ($feedback = mysqli_fetch_array($rs_feedback)):
                              ?>
                              <div class="cus_feedback">
                                <h5>
                                  <?= $feedback['name'] ?>
                                </h5>

                                <h6>
                                  <?= $feedback['rating'] ?> star
                                </h6>
                                <h6>
                                  <?= $feedback['content'] ?>
                                </h6>
                              </div>
                              <?php
                            endwhile;
                          endif;
                          ?>
                        </div><!-- /.form-container -->
                      </form><!-- /.form-cnt -->

                      <form class="form-inline form-cnt">
                        <div class="form-group">
                          <label>&nbsp;</label>
                          <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for
                            phrases.</span>
                        </div>
                      </form><!-- /.form-cnt -->

                    </div><!-- /.product-tab -->
                  </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.product-tabs -->
          <!-- ============================================== UPSELL PRODUCTS ============================================== -->


          <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
      </div><!-- /.body-content -->



      <?php
      include("../../inc/footer.php");
      ?>