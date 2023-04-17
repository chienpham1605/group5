<?php
require './lib/users.php';
?>
<html>
    <head>
        <title>He thong dieu huong co ban</title>
<!--        <link href="./public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/style.css" rel="stylesheet" type="text/css"/>-->

<!--                 Bootstrap Core CSS -->
                <link rel="stylesheet" href="./public/css/bootstrap.min.css">
<!--                 Customizable CSS -->
                <link rel="stylesheet" href="./public/css/main.css">
                <link rel="stylesheet" href="./public/css/blue.css">
                <link rel="stylesheet" href="./public/css/owl.carousel.css">
                <link rel="stylesheet" href="./public/css/owl.transitions.css">
                <link rel="stylesheet" href="./public/css/animate.min.css">
                <link rel="stylesheet" href="./public/css/rateit.css">
                <link rel="stylesheet" href="./public/css/bootstrap-select.min.css">
        
<!--                 Icons/Glyphs -->
                <link rel="stylesheet" href="./public/css/font-awesome.css">
        
<!--                 Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
                <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

                <header class="header-style-1"> 

                    <!-- ============================================== TOP MENU ============================================== -->
                    <div class="top-bar animate-dropdown">
                        <div class="container">
                            <div class="header-top-inner">
                                <div class="cnt-account">
                                    <ul class="list-unstyled">
                                        <li class="myaccount"><a href="#"><span>My Account</span></a></li>
                                        <li class="wishlist"><a href="#"><span>Wishlist</span></a></li>
                                        <li class="header_cart hidden-xs"><a href="#"><span>My Cart</span></a></li>
                                        <li class="check"><a href="#"><span>Checkout</span></a></span></li>
                                        <li class="login"><a href="show-info.php"  ><span><?php if (is_login()) echo info_user()['name']; ?></span></a></li>
                                        <li class="login"><a href="?page=logout"  ><span><?php  if (is_login()); ?></span>Logout</a></li>'
                                    </ul>
                                </div>
                                <!-- /.cnt-account -->

                                <div class="cnt-block">
                                    <ul class="list-unstyled list-inline">
                                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">USD</a></li>
                                                <li><a href="#">INR</a></li>
                                                <li><a href="#">GBP</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">French</a></li>
                                                <li><a href="#">German</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!-- /.list-unstyled --> 
                                </div>
                                <!-- /.cnt-cart -->
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.header-top-inner --> 
                        </div>
                        <!-- /.container --> 
                    </div>
                    <!-- /.header-top --> 
                    <!-- ============================================== TOP MENU : END ============================================== -->
                    <div class="main-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
                                    <!-- ============================================================= LOGO ============================================================= -->
                                    <div class="logo"> <a href="home.html"> <img src="public/images/logobook.png" alt="logo"></a> </div>
                                    <!-- /.logo --> 
                                    <!-- ============================================================= LOGO : END ============================================================= --> </div>
                                <!-- /.logo-holder -->

                                <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder"> 
                                    <!-- /.contact-row --> 
                                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                                    <div class="search-area">
                                        <form>
                                            <div class="control-group">
                                                <ul class="categories-filter animate-dropdown">
                                                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                                                        <ul class="dropdown-menu" role="menu" >
                                                            <li class="menu-header">Computer</li>
                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input class="search-field" placeholder="Search here..." />
                                                <a class="search-button" href="#" ></a> </div>
                                        </form>
                                    </div>
                                    <!-- /.search-area --> 
                                    <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
                                <!-- /.top-search-holder -->

                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row"> 
                                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                            <div class="items-cart-inner">
                                                <div class="basket">
                                                    <div class="basket-item-count"><span class="count">2</span></div>
                                                    <div class="total-price-basket"> <span class="lbl">Shopping Cart</span> <span class="value">$4580</span> </span> </div>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="cart-item product-summary">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="image"> <a href="detail.html"><img src="public/images/products/p4.jpg" alt=""></a> </div>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                                            <div class="price">$600.00</div>
                                                        </div>
                                                        <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                                                    </div>
                                                </div>
                                                <!-- /.cart-item -->
                                                <div class="clearfix"></div>
                                                <hr>
                                                <div class="clearfix cart-total">
                                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$600.00</span> </div>
                                                    <div class="clearfix"></div>
                                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                                                <!-- /.cart-total--> 

                                            </li>
                                        </ul>
                                        <!-- /.dropdown-menu--> 
                                    </div>
                                    <!-- /.dropdown-cart --> 

                                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
                                <!-- /.top-cart-row --> 
                            </div>
                            <!-- /.row --> 

                        </div>
                        <!-- /.container --> 

                    </div>
                    <!-- /.main-header -->      
                </header>