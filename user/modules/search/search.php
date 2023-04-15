<?php
        if (isset($_POST['btn'])) {
          $search = $_POST['search_data'];
        } 
    $query = "SELECT * from book where book_name like '%".$search."%'";
   $result = mysqli_query($conn, $query);
   while ($item= mysqli_fetch_assoc($result)):
?>
   <div class="search-result-container ">
    <div id="myTabContent" class="tab-content category-list">
      <div class="tab-pane active " id="grid-container">
        <div class="category-product">
          <div class="row">
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
                        <h3 class="name"><a href="?mod=product&act=detail&book_id="><?php echo $item['book_name']; ?>></a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>
                        <div class="product-price"> <span class="price"> $<?php echo $item['book_price']; ?></span> <span class="price-before-discount">$ 800</span> </div>
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
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.category-product --> 
        
      </div>

    </div>
        
 <?php endwhile;
                  ?>
