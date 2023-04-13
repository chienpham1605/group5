<?php
<<<<<<< Updated upstream

?>
<!DOCTYPE html>
<html lang="en">
=======
if (isset($_POST['btn'])) {
  $search = $_POST['search'];
} else {
  $search = false;
}
?>
>>>>>>> Stashed changes

<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="MediaCenter, Template, eCommerce">
  <meta name="robots" content="all">
  <title></title>
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="public/assets/js/custom.js"></script>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">

  <!-- Customizable CSS -->
  <link rel="stylesheet" href="public/assets/css/main.css">
  <link rel="stylesheet" href="public/assets/css/blue.css">
  <link rel="stylesheet" href="public/assets/css/owl.carousel.css">
  <link rel="stylesheet" href="public/assets/css/owl.transitions.css">
  <link rel="stylesheet" href="public/assets/css/animate.min.css">
  <link rel="stylesheet" href="public/assets/css/rateit.css">
  <link rel="stylesheet" href="public/assets/css/bootstrap-select.min.css">

  <!-- Icons/Glyphs -->
  <link rel="stylesheet" href="public/assets/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800"
    rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
    rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
  <header class="header-style-1">
    <div class="top-bar animate-dropdown">
    </div>
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <div class="logo"> <a href="?mod=home&act=main"> <img src="public/assets/images/logo.png" alt="logo"> </a>
            </div>
          </div>
          <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">
            <div class="search-area">
              <form method="post">
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Search
                        <b class="caret"></b></a>
                    </li>
                  </ul>
                  <input class="search-field" name="search" placeholder="Enter keyword..." />
                  <button class="search-button" name="btn"> </button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row">
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                <div class="items-cart-inner">
                  <div class="basket">
                    <div class="basket-item-count"><span class="count">
                        <?php
                        if (isset($_SESSION['cart'])) {
                          echo count($_SESSION['cart']);
                        } else
                          echo "0"
                            ?>
                        </span></div>
                      <div class="total-price-basket"> </div>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <?php
                        if (!isset($_SESSION['cart'])) {
                          echo "No item";
                        } else {
                          foreach ($_SESSION['cart'] as $item) {
                            ?>
                    <li>
                      <div class="cart-item product-summary">
                        <div class="row">
                          <div class="col-xs-4">
                            <div class="image"> <a href="detail.html"><img src="assets/images/products/p4.jpg" alt=""></a>
                            </div>
                          </div>
                          <div class="col-xs-7">
                            <h3 class="name"><a href="index8a95.html?page-detail">
                                <?= $item['book_name'] ?>
                              </a></h3>
                            <div class="price">$
                              <?= $item['book_price'] ?>
                            </div>
                            X <span id="qty-book-id-<?= $item['book_id'] ?>"><?= $item['qty'] ?></span>
                          </div>
                        </div>
                      </div>         
                    </li>

                    <?php
                          }
                        }
                        ?>
                <li>
                  <div class="clearfix"></div>
                  <hr>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Total :$</span><span id="total">
                        <?php
                        $total = 0;
                        if (!isset($_SESSION['cart'])) {
                          echo "0";
                        } else {
                          foreach ($_SESSION['cart'] as $item) {
                            $total += $item['subtotal'];
                          }
                          echo $total;
                        }
                        ?>
                      </span> </div>
                    <div class="clearfix"></div>
                    <a href="?mod=cart&act=show" class="btn btn-upper btn-primary btn-block m-t-20">View Cart</a>
                  </div>
                  <!-- /.cart-total-->
                </li>

              </ul>
              <!-- /.dropdown-menu-->
            </div>

            <div class="dropdown dropdown-cart" style="padding: 12px"> <a href="?mod=home&act=main" class="lnk-cart"
                data-toggle="dropdown">
                <div class="items-cart-inner">
                  <h4><i class="fa fa-user" style='font-size:24px'></i><a href="?mod=login&act=main"
                      style="color:white">Account</a></h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>
  <!-- ============================================== HEADER : END ============================================== -->