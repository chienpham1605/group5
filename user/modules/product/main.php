<?php
$query = "SELECT * FROM `categories`";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);
$list_cat = mysqli_fetch_assoc($rs);
// show_array($list_cat);
// die();

if (!isset($_GET['cat_id'])):
  redirect("?mod=home&act=main");
endif;
$cat_id = $_GET['cat_id'];
//5. excecute query (for data old reading by Item code)
$query = "SELECT * FROM `categories` WHERE cat_id = '{$cat_id}' ";
$rs = mysqli_query($conn, $query);
$cat_detail = mysqli_fetch_assoc($rs);
// show_array($cat_detail);

//select book by cat_id
// $list_book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `book` WHERE cat_id = '{$cat_id}' "));
// $list_book = db_fetch_array("SELECT * FROM `book` WHERE cat_id = '{$cat_id}' ");
// show_array($list_book);

?>
<?php
 if (isset($_GET['btn'])) {
          $search = $_GET['search_data'];
        } 
        $query = "select * from book where book_name like '%".$search."%' ";
        $rs = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($rs);
        ?>
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="?mod=home&act=main">Home</a></li>
        <li class='active'><?= $cat_detail['cat_name'] ?></li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-xs-12 col-sm-12 col-md-3 sidebar'> 
<<<<<<< Updated upstream
=======
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
             
              <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paw" aria-hidden="true"></i>Shoes</a> -->

              <!-- /.menu-item -->
              
              <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-clock-o"></i>Watches</a> -->
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-diamond"></i>Jewellery</a> -->
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Shoes </a></li>
                          <li><a href="#">Jackets</a></li>
                          <li><a href="#">Sunglasses</a></li>
                          <li><a href="#">Sport Wear</a></li>
                          <li><a href="#">Blazers</a></li>
                          <li><a href="#">Shirts</a></li>
                          <li><a href="#">Shorts</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Handbags</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Swimwear </a></li>
                          <li><a href="#">Tops</a></li>
                          <li><a href="#">Flats</a></li>
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">Winter Wear</a></li>
                          <li><a href="#">Night Suits</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Toys &amp; Games</a></li>
                          <li><a href="#">Jeans</a></li>
                          <li><a href="#">Shirts</a></li>
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">School Bags</a></li>
                          <li><a href="#">Lunch Box</a></li>
                          <li><a href="#">Footwear</a></li>
                          <li><a href="#">Wipes</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Sandals </a></li>
                          <li><a href="#">Shorts</a></li>
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Night Dress</a></li>
                          <li><a href="#">Swim Wear</a></li>
                          <li><a href="#">Toys</a></li>
                        </ul>
                      </div>
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>Health and Beauty</a> -->
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-lg-4">
                        <ul>
                          <li><a href="#">Gaming</a></li>
                          <li><a href="#">Laptop Skins</a></li>
                          <li><a href="#">Apple</a></li>
                          <li><a href="#">Dell</a></li>
                          <li><a href="#">Lenovo</a></li>
                          <li><a href="#">Microsoft</a></li>
                          <li><a href="#">Asus</a></li>
                          <li><a href="#">Adapters</a></li>
                          <li><a href="#">Batteries</a></li>
                          <li><a href="#">Cooling Pads</a></li>
                        </ul>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-lg-4">
                        <ul>
                          <li><a href="#">Routers &amp; Modems</a></li>
                          <li><a href="#">CPUs, Processors</a></li>
                          <li><a href="#">PC Gaming Store</a></li>
                          <li><a href="#">Graphics Cards</a></li>
                          <li><a href="#">Components</a></li>
                          <li><a href="#">Webcam</a></li>
                          <li><a href="#">Memory (RAM)</a></li>
                          <li><a href="#">Motherboards</a></li>
                          <li><a href="#">Keyboards</a></li>
                          <li><a href="#">Headphones</a></li>
                        </ul>
                      </div>
                      <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="public/assets/images/banners/banner-side.png" /></a> </div>
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <!-- <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>  -->
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              <?php
              if ($count == 0):
                echo "Record not found";
              else:
                while ($field = mysqli_fetch_assoc($rs)):
                  ?>
                                <li >
                                    <a href="?mod=product&act=main&cat_id=<?= $field['cat_id'] ?>">
                                    <i class="icon fa fa-envira"></i><?= $field['cat_name'] ?>
                                  </a> 
                                    <!-- /.dropdown-menu --> </li>
                              <?php
                endwhile;
              endif
              ?>
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> 
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->
>>>>>>> Stashed changes
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget">
              <h3 class="section-title">Shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Rating</h4>
              </div>
              <div class="sidebar-widget-body">
<<<<<<< Updated upstream
              <ul class="list">
                  <li><input type="checkbox"> <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                  <li><input type="checkbox"> <i class="fa fa-star-o"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></i></li>
                  <li><input type="checkbox"> <i class="fa fa-star-o"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></i></li>
                  <li><input type="checkbox"> <i class="fa fa-star-o"><i class="fa fa-star-o"></i></i></li>
                  <li><input type="checkbox"> <i class="fa fa-star-o"></i></li>                  
                </ul>
=======
                <!-- /.accordion --> 
>>>>>>> Stashed changes
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder --> 
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            <!-- ============================================== MANUFACTURES============================================== -->
            <div class="sidebar-widget">
<<<<<<< Updated upstream
              <div class="widget-header">
                <h4 class="widget-title">Publisher</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#"><input type="checkbox"> HarperCollins</a></li>
                  <li><a href="#"><input type="checkbox"> Bloomsbury</a></li>
                  <li><a href="#"><input type="checkbox"> Macmillan Publishers</a></li>
                  <li><a href="#"><input type="checkbox"> Ten Speed Press</a></li>
                  <li><a href="#"><input type="checkbox"> Penguin Random House</a></li>
                  <li><a href="#"><input type="checkbox"> TarcherPerigee</a></li>
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
=======
>>>>>>> Stashed changes
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== MANUFACTURES: END ============================================== --> 
            <!-- ============================================== COLOR============================================== -->
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Author</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#"><input type="checkbox"> Adams Media</a></li>
                  <li><a href="#"><input type="checkbox"> Bryan Burrough</a></li>
                  <li><a href="#"><input type="checkbox"> Camilla Arnold</a></li>
                  <li><a href="#"><input type="checkbox"> Eric Barker</a></li>
                  <li><a href="#"><input type="checkbox"> John Helyar</a></li>
                  <li><a href="#"><input type="checkbox"> Napoleon Hill</a></li>
                </ul>
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>       
       
            <!-- /.sidebar-widget --> 
          <!-- /.Testimonials -->
            <div class="sidebar-widget  outer-top-vs ">
              <h3>You also maybe like</h3>
              <div id="advertisement" class="advertisement">
                <div class="item">
                  <div class="avatar"><img src="public/assets/images/testimonials/member1.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore.<em>"</em></div>
                  <div class="clients_author">English Grammar in Use Book<span>Raymond Murphy</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="avatar"><img src="public/assets/images/testimonials/member3.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore.<em>"</em></div>
                  <div class="clients_author">Atomic Habits <span>Random House Business</span> </div>
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="avatar"><img src="public/assets/images/testimonials/member2.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore.<em>"</em></div>
                  <div class="clients_author">Thinking, Fast and Slow <span>Daniel Kahneman</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item --> 
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            
            <!-- ============================================== Testimonials: END ============================================== -->           

            
           
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class="col-xs-12 col-sm-12 col-md-9 rht-col"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="public/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                <div class="buy-btn"><a href="#" class="lnk btn btn-primary">Show Now</a></div>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
        </div>
        
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
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
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
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
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
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
              <!-- /.pagination-container --> </div>
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
                      while ($row = mysqli_fetch_assoc($rs)):
                  ?>
                    
                 <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="item">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image"> 
                              <a href="">
                                 <img src="public/assets/images/products/p1.jpg" alt=""> 
                                  <img src="public/assets/images/products/p1_hover.jpg" alt="" class="hover-image">
                              </a> 
                           </div>
                              <!-- /.image -->
                          
                              <div class="tag new"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->
                        
                            <div class="product-info text-left">
                              <h3 class="name"><a href="?mod=product&act=detail&book_id=<?php echo $row['book_id']?>"><?php echo $row['book_name']?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price"> <span class="price"> $<?php echo $row['book_price']?> </span> <span class="price-before-discount">$ 800</span> </div>
                              <!-- /.product-price --> 
                          
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                    endwhile;
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
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15"><a href="#" class="image"> <img data-echo="public/assets/images/brands/brand1.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand2.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand3.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand4.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand5.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand6.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand2.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand4.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand1.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="public/assets/images/brands/brand5.png" src="public/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item--> 
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container --> 
  
</div>
<!-- /.body-content --> 