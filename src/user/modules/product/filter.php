<?php
include("../../inc/header.php");
include("../../db/DBConnect.php");
include("../../db/database.php");
 $author=$_POST['author'];
 $cat_id =1;
 $publisher_id = $_POST['publisher_id']; 

 $list_book = db_fetch_array("SELECT book.*, discount.discount_per as discount_per FROM book, discount
 WHERE book.discount_id= discount.discount_id AND book.book_author = '{$author}' AND book.publisher_id = $publisher_id
 AND book.cat_id =$cat_id GROUP BY book.book_id");

var_dump($publisher_id) ;
var_dump($list_book) ;

// echo $publisher_id;