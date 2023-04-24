<?php
session_start();
include_once("../../db/DBConnect.php");
include_once("../../inc/header.php");

if (isset($_POST['btnSearch'])) {
  $search = $_POST['search_data'];
  $query = "select * from book where book_name like '%" . $search . "%' or book_author like '%" . $search . "%'";
} else {
  $query = "select * from book";
}
$rs = mysqli_query($conn, $query);

?>
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>      
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  <?php
                  while ($row = mysqli_fetch_assoc($rs)) {
                    ?>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                      <div class="item">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image">
                                <a href="">
                                  <img src="<?= $row['book_image'] ?>" alt="">

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
                                  <li class="lnk wishlist"> <a class="add-to-cart"
                                      href="../product/main.php?book_id=<?php echo $row['book_id'] ?>" title="Wishlist"> <i
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
                  ;
                  ?>
                </div>

              </div>


            </div>

          </div>


        </div>


      </div>

    </div>

  </div>

</div>


<?php
include("../../inc/footer.php");
?>