<!-- ============================================== HEADER ============================================== -->
<?php
//1. start session
//2. check session
//3.include class Item
include_once './Item.php';
$itemObj = new Item();
?>
<html>
<?php
include './header.php';
?>
<!-- ============================================== HEADER : END ============================================== -->

<body class="container">
  <?php
  include './sidebar.php';
  ?>
  <div class="body-content outer-top-bd">
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
                <li><a href="#">2</a></li>
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
              <?php
              $data = $itemObj->readData();
              foreach ($data as $field):
                ?>
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="detail.html">
                                <img src="assets/images/products/p1.jpg" alt="">
                                <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image">
                              </a>
                            </div>
                            <!-- /.image -->

                            <div class="tag new"><span>new</span></div>
                          </div>
                          <!-- /.product-image -->

                          <div class="product-info text-left">
                            <h3 class="name"><a href="">
                                <?= $field[1] ?>
                              </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            <div class="product-price"> <span class="price"> <?= $field[3]?></span> <span
                                class="price-before-discount">$ 800</span> </div>
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
                  <!-- /.info-boxes -->
                  <!-- ============================================== INFO BOXES : END ============================================== -->
                </div>
              </div>
              <?php
              endforeach;
              ?>
          </div>
        </div>

      </div>
    </div>
  </div>
  <?php
  include './footer.php';
  ?>
</body>


<!-- ============================================================= FOOTER ============================================================= -->