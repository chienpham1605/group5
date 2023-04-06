<?php
if (isset($_SESSION['auth'])) {

	$user_id = $_SESSION['auth']['id'] = 3;

	$query = "SELECT `book`.`book_id`, `book`.`book_name`, `book`.`book_price`, `cart`.`qty` FROM `cart`, `book` WHERE `cart`.`book_id`=`book`.`book_id` AND `cart`.`user_id`={$user_id}";
	$list_cart = mysqli_query($conn, $query);
	$total = 0;
	// while ($item = mysqli_fetch_assoc($list_cart)) {
	//   $total += $item['book_price'] * $item['qty'];
	// }
}


?>



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
	<form action="?mod=cart&act=checkout" method="POST">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="cart-description item">Image</th>
									<th class="cart-product-name item">Product Name</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-sub-total item">Price</th>
									<th class="cart-total last-item">Subtotal</th>
									<th class="cart-romove item">Remove</th>
								</tr>
							</thead><!-- /thead -->

							<tbody>
								<?php
								if (mysqli_num_rows($list_cart) == 0):
									echo "No item in cart";
								else:
									while ($item = mysqli_fetch_assoc($list_cart)):
										$total += $item['book_price'] * $item['qty'];
										?>
										<tr>
											<td class="cart-image">
												<a class="entry-thumbnail" href="detail.html">
													<img src="assets/images/products/p1.jpg" alt="">
												</a>
											</td>
											<td class="cart-product-name-info">
												<h4 class='cart-product-description'><a href="detail.html">
														<?= $item['book_name'] ?>
													</a></h4>
												<div class="row">
													<div class="col-sm-12">
														<div class="rating rateit-small"></div>
													</div>
													<div class="col-sm-12">
														<div class="reviews">
															(06 Reviews)
														</div>
													</div>
												</div><!-- /.row -->
												<div class="cart-product-info">
													<span class="product-color">COLOR:<span>Blue</span></span>
												</div>
											</td>

											<td class="cart-product-quantity">
												<div class="quant-input">
													<!-- <div class="arrows">
														<div class="arrow plus gradient"><span class="ir"><i
																	class="icon fa fa-sort-asc"></i></span></div>
														<div class="arrow minus gradient"><span class="ir"><i
																	class="icon fa fa-sort-desc"></i></span></div>
													</div> -->
													<input class="input-qty" type="number" min="1" max="200"
														data-price="<?php echo $item['book_price'] ?>"
														data-id="<?php echo $item['book_id'] ?>"
														value="<?php echo $item['qty'] ?>"
														name="qty[<?php echo $item['book_id'] ?>]">

												</div>
											</td>
											<td class="cart-product-sub-total"><span class="cart-sub-total-price">$
													<?= $item['book_price'] ?>
												</span></td>
											<td class="cart-product-grand-total"><span class="cart-grand-total-price"
													id="sub-total-<?= $item['book_id'] ?>"><?= $item['qty'] * $item['book_price'] ?></span>
											</td>
											<td class="remove-item"
												onclick="return confirm('Are you sure to delete this item ?')"><a
													href="?mod=cart&act=delete&book_id=<?= $item['book_id'] ?>" title="cancel"
													class="icon"><i class="fa fa-trash-o"></i></a></td>
										</tr>

										<?php
									endwhile;
								endif
								?>
							</tbody><!-- /tbody -->

							<tfoot>
								<tr>
									<td colspan="7">
										<div class="shopping-cart-btn">
											<span class="">
												<a href="?mod=home&act=main"
													class="btn btn-upper btn-primary outer-left-xs">Continue
													Shopping</a>
												<a href="?mod=cart&act=delete_all&book_id=all"
													onclick="return confirm('Are you sure to delete all items ?')"
													class="btn btn-upper btn-primary pull-right outer-right-xs">Delete
													all
													shopping cart</a>
											</span>
										</div><!-- /.shopping-cart-btn -->
									</td>
								</tr>
							</tfoot>
						</table><!-- /table -->
					</div>
				</div><!-- /.shopping-cart-table -->
				<div class="col-md-4 col-sm-12 estimate-ship-tax">
					<table class="table">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Shipping Information</span>
									<p>Enter your destination to get shipping and tax.</p>
								</th>
							</tr>
						</thead><!-- /thead -->
						<tbody>
							<tr>
								<td>
									<div class="form-group">
										<label class="info-title control-label">Fullname <span>*</span></label>
										<input type="text" name="fullname" class="form-control unicase-form-control text-input"
											placeholder="">
									</div>
									<div class="form-group">
										<label class="info-title control-label">Email <span>*</span></label>
										<input type="text" name="email" class="form-control unicase-form-control text-input"
											placeholder="">
									</div>
									<div class="form-group">
										<label class="info-title control-label">Address <span>*</span></label>
										<input type="text" name="address" class="form-control unicase-form-control text-input"
											placeholder="">
									</div>
									<div class="form-group">
										<label class="info-title control-label">Phone <span>*</span></label>
										<input type="text" name="phone" class="form-control unicase-form-control text-input"
											placeholder="">
									</div>
									<div class="form-group">
										<label class="info-title control-label">
											<input type="checkbox"> <span>Ship to a different address</span>
									</label>
										
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.estimate-ship-tax -->

				<div class="col-md-4 col-sm-12 estimate-ship-tax">
					<table class="table">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Note</span>
									<p>Leave a comment about your order.</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="form-group">
										<input type="text" name="note" class="form-control unicase-form-control text-input"
											placeholder="Your Note..">
									</div>
									<div class="clearfix pull-right">
										<!-- <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button> -->
									</div>
								</td>

							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label class="info-title control-label">Payment Method <span>*</span></label>
										<select name="payment_method" class="form-control unicase-form-control selectpicker">
											<option>--Select options--</option>
											<option value="COD">COD</option>
											<option value="Bank Transfer">Bank Transfer</option>
										</select>
									</div>
								</td>
							</tr>
						</tbody><!-- /tbody -->
					</table><!-- /table -->
				</div><!-- /.estimate-ship-tax -->

				<div class="col-md-4 col-sm-12 cart-shopping-total">
					<table class="table">
						<thead>
							<tr>
								<th>
									<!-- <div class="cart-sub-total">
										Subtotal<span class="inner-left-md">$<?= $total ?></span>
									</div>						 -->
									<div class="cart-grand-total">
										Total<span class="inner-left-md" id="overall_total">$
											<?= $total ?>
										</span>
									</div>
								</th>
							</tr>
						</thead><!-- /thead -->
						<tbody>
							<tr>
								<td>
									<div class="cart-checkout-btn pull-right">
										<button type="submit" class="btn btn-primary checkout-btn">PROCCED TO
											CHECKOUT</button>
										<!-- <span class="">Checkout with multiples address!</span> -->
									</div>
								</td>
							</tr>
						</tbody><!-- /tbody -->
					</table><!-- /table -->
				</div><!-- /.cart-shopping-total -->
			</div><!-- /.shopping-cart -->
			</form>
		</div> <!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<div id="brands-carousel" class="logo-slider wow fadeInUp">

			<div class="logo-slider-inner">
				<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
					<div class="item m-t-15">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item m-t-10">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#" class="image">
							<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
						</a>
					</div><!--/.item-->
				</div><!-- /.owl-carousel #logo-slider -->
			</div><!-- /.logo-slider-inner -->

		</div><!-- /.logo-slider -->
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->

<!-- ============================================== INFO BOXES ============================================== -->
<div class="row our-features-box">
	<div class="container">
		<ul>
			<li>
				<div class="feature-box">
					<div class="icon-truck"></div>
					<div class="content-blocks">We ship worldwide</div>
				</div>
			</li>
			<li>
				<div class="feature-box">
					<div class="icon-support"></div>
					<div class="content-blocks">call
						+1 800 789 0000</div>
				</div>
			</li>
			<li>
				<div class="feature-box">
					<div class="icon-money"></div>
					<div class="content-blocks">Money Back Guarantee</div>
				</div>
			</li>
			<li>
				<div class="feature-box">
					<div class="icon-return"></div>
					<div class="content">7 days return</div>
				</div>
			</li>

		</ul>
	</div>
</div>
<!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->