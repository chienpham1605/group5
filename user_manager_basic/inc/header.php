<?php ?>
<html>
    <head>
        <title>He thong dieu huong co ban</title>
        <link href="./public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/style.css" rel="stylesheet" type="text/css"/>

<!--         Bootstrap Core CSS 
        <link rel="stylesheet" href="./public/css/bootstrap.min.css">
         Customizable CSS 
        <link rel="stylesheet" href="./public/css/main.css">
        <link rel="stylesheet" href="./public/css/blue.css">
        <link rel="stylesheet" href="./public/css/owl.carousel.css">
        <link rel="stylesheet" href="./public/css/owl.transitions.css">
        <link rel="stylesheet" href="./public/css/animate.min.css">
        <link rel="stylesheet" href="./public/css/rateit.css">
        <link rel="stylesheet" href="./public/css/bootstrap-select.min.css">

         Icons/Glyphs 
        <link rel="stylesheet" href="./public/css/font-awesome.css">

         Fonts 
        <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>-->
    </head>

    <body>
        <div id ="wrapper">
            <div id ="header">
                <a id="logo">onBookStore</a>
                <div id ="user-login">

                    <p>     Hello <strong><?php if (is_login()) echo info_user(); ?></strong><a href="?page=logout">Logout</a></p>
                </div>
                                <ul id ="main-menu">
                                    <li><a href="?page=home">Trang chủ</a></li>
                                    <li><a href="?page=about">Giới thiệu</a></li>
                                    <li><a href="?page=news">Tin tức</a></li>
                                    <li><a href="?page=product">Sản phẩm</a></li>
                                    <li><a href="?page=contact">Liên hệ</a></li>
                                    <li><a href="?page=login">Đăng nhập</a></li>
                                    
<!--           neu muon tao them 1 menu chi can them 1 cai va them 1 cai o pages là xong-->
                                </ul>

<!--                <div class="top-bar animate-dropdown">
                    <div class="container">
                        <div class="header-top-inner">
                            <div class="cnt-account">
                                <ul class="list-unstyled">
                                    <li class="myaccount"><a href="#"><span>My Account</span></a></li>
                                    <li class="wishlist"><a href="#"><span>Wishlist</span></a></li>
                                    <li class="header_cart hidden-xs"><a href="#"><span>My Cart</span></a></li>
                                    <li class="check"><a href="#"><span>Checkout</span></a></span></li>
                                    <li class="login"><a href="#"><span>Login</span></a></li>
                                </ul>
                            </div>
                             /.cnt-account 
                        </div>

                        end header

                         JavaScripts placed at the end of the document so the pages load faster  
                        <script src="public/js/jquery-1.11.1.min.js"></script> 
                        <script src="public/js/bootstrap.min.js"></script> 
                        <script src="public/js/bootstrap-hover-dropdown.min.js"></script> 
                        <script src="public/js/owl.carousel.min.js"></script> 
                        <script src="public/js/echo.min.js"></script> 
                        <script src="public/js/jquery.easing-1.3.min.js"></script> 
                        <script src="public/js/bootstrap-slider.min.js"></script> 
                        <script src="public/js/jquery.rateit.min.js"></script> 
                        <script type="text/javascript" src="public/js/lightbox.min.js"></script> 
                        <script src="public/js/bootstrap-select.min.js"></script> 
                        <script src="public/js/wow.min.js"></script> 
                        <script src="public/js/scripts.js"></script>-->