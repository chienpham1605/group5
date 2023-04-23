<?php
session_start();
include("../../inc/header.php");
include("../../db/DBConnect.php");
include("../../db/database.php");

if (!isset($_GET['cat_id'])):
  header("location:../home/main.php");
endif;

$cat_id = $_GET['cat_id'];
echo $cat_id;
$query = "SELECT book.*, discount.discount_per as discount_per  FROM book, discount
WHERE book.discount_id= discount.discount_id 
AND book.cat_id =$cat_id GROUP BY book.book_id";
$list_book = db_fetch_array("SELECT book.*, discount.discount_per as discount_per  FROM book, discount
WHERE book.discount_id= discount.discount_id 
AND book.cat_id =$cat_id GROUP BY book.book_id
");
$list_author = db_fetch_array("SELECT DISTINCT book.book_author from book
WHERE book.cat_id = {$cat_id}");
$list_publisher = db_fetch_array("SELECT DISTINCT publisher.publisher_name, publisher.publisher_id  from book, publisher 
WHERE book.publisher_id = publisher.publisher_id AND book.cat_id = {$cat_id}");

//filter
if(isset($_POST['btnFilter'])){
 
if(!isset($author)){
  $author = $_POST['author'];
  $publisher_id = TRUE;
  $query = "SELECT book.*, discount.discount_per as discount_per FROM book, discount
  WHERE book.discount_id= discount.discount_id AND book.book_author = '{$author}' AND book.publisher_id = $publisher_id
  AND book.cat_id =$cat_id GROUP BY book.book_id";
}

if(!isset($publisher_id)){
  $author = TRUE;
  $publisher_id = $_POST['publisher_id']; 
  $query = "SELECT book.*, discount.discount_per as discount_per FROM book, discount
  WHERE book.discount_id= discount.discount_id AND book.book_author = '{$author}' AND book.publisher_id = $publisher_id
  AND book.cat_id =$cat_id GROUP BY book.book_id";
}

if(!isset($author)&&!isset($publisher_id)){
  $author = $_POST['author'];
  $publisher_id = $_POST['publisher_id']; 
  $query = "SELECT book.*, discount.discount_per as discount_per FROM book, discount
  WHERE book.discount_id= discount.discount_id AND book.book_author = '{$author}' AND book.publisher_id = $publisher_id
  AND book.cat_id =$cat_id GROUP BY book.book_id";
}
}

$list_book = db_fetch_array($query);

?>

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
        <div class="sidebar-module-container">
          <div class="sidebar-filter">
            <form method="POST" action="">
            <div class="sidebar-widget">
              <h3 class="section-title">Shop by</h3>
              <div class="sidebar-widget-body">
                <!-- /.accordion -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Publisher</h4>
              </div>
              <div class="sidebar-widget-body">
                <div>
                  <?php
                  if (count($list_publisher) == 0) {
                    echo "no data";
                  } else {
                    foreach ($list_publisher as $field) {
                      ?>
                      <input type= "hidden" name="publisher_id" value="<?= $field['publisher_id'] ?>">
                      <input type="radio" name="publisher" value="<?= $field['publisher_name'] ?>">
                      <?= $field['publisher_name'] ?><br>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Author</h4>
              </div>
            <div class="sidebar-widget-body">
                <div>
                  <?php
                  if (count($list_author) == 0) {
                    echo "no data";
                  } else {
                    foreach ($list_author as $field) {
                      ?>
                      <input type="radio" name="author" value="<?= $field['book_author'] ?>"> <?= $field['book_author'] ?><br>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>        
              
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span
                      class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="">
                </div>
              </div>             
            </div>
           
            <div class="sidebar-widget">             
              <div class="sidebar-widget">
                <div class="sidebar-widget-body m-t-10">

                  <input type="submit" name="btnFilter" class="lnk btn btn-primary" value="Shop Now">
                </div>
              </div>
              <!-- /.sidebar-widget -->
            </div>
          </form>

          </div>

        </div>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-9 rht-col">

        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                        class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-bars"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span
                          class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-6 no-padding hidden-sm hidden-md">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span
                          class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 col-xs-6 col-lg-4 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  <?php
                  if(count($list_book)==0){
                    echo "no data";
                  } else{
                    foreach ($list_book as $row) {                            
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                      <div class="item">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image">
                                <a href="">
                                  <img src="<?php echo $row['book_image'] ?>" alt="">
                                  <img src="<?php echo $row['book_image'] ?>" alt="" class="hover-image">
                                </a>
                              </div>
                              <!-- /.image -->

                              <div class="tag new"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                              <h3 class="name"><a href="../product/detail.php?book_id=<?php echo $row['book_id'] ?>"><?php echo $row['book_name'] ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price"> <span class="price"> $
                                  <?php echo $row['book_price'] ?>
                                </span> <span class="price-before-discount">$ 800</span> </div>
                              <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                        class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
                                        class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                        class="fa fa-signal"></i> </a> </li>
                                </ul>
                              </div>
                              <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                          </div>
                          <!-- /.product -->

                        </div>
                        <!-- /.products -->
                      </div>
                    </div>
                    <!-- /.item -->
                    <?php
                    }
                  }
                  ?>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->

            </div>

          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container bottom-row">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container -->
            </div>
            <!-- /.text-right -->
          </div>
          <!-- /.filters-container -->
        </div>
        <!-- /.search-result-container -->
      </div>
      <!-- /.col -->
    </div>
  </div>
</div>
<?php
include("../../inc/footer.php");
?>
?>