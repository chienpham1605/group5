<?php

?>
<html>
    <head>
        <title>He thong dieu huong co ban</title>
        <link href="./public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="./public/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <div id ="wrapper">
            <div id ="header">
                <a id="logo">onBookStore</a>
                <div id ="user-login">
                   
                    <p>     Hello <strong><?php if(is_login())   echo info_user('fullname'); ?></strong><a href="?page=logout">Logout</a></p>
                </div>
                <ul id ="main-menu">
                    <li><a href="?page=home">Trang chủ</a></li>
                    <li><a href="?page=about">Giới thiệu</a></li>
                    <li><a href="?page=news">Tin tức</a></li>
                    <li><a href="?page=product">Sản phẩm</a></li>
                    <li><a href="?page=contact">Liên hệ</a></li>
<!--                    <li><a href="?page=login">Đăng nhập</a></li>-->
                    
                    <!--neu muon tao them 1 menu chi can them 1 cai va them 1 cai o pages là xong-->
                </ul>
            </div>
      
<!--end header-->