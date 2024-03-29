<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!--Side Bar -->

			<div class="side-bar col-md-3">
					<div class="menu">

						<div class="item">
							<a href="store.php?my_pham">Tất Cả Sản Phẩm</a>
						</div>

						<div class="item">
							<a href="#" class="sub-btn">Mỹ Phẩm Hàn<i class="fas fa-angle-right dropdown"></i></a>
							<div class="sub-menu">
								<a href="store.php?my_pham_han" class="sub-item">Mỹ Phẩm Hàn</a>
								<a href="#" class="sub-item">Son</a>
								<a href="#" class="sub-item">Phấn</a>
								<a href="#" class="sub-item">Kem Nền</a>
							</div>
						</div>
						<div class="item">
							<a href="#" class="sub-btn">Mỹ Phẩm Nhật<i class="fas fa-angle-right dropdown"></i></a>
							<div class="sub-menu">
								<a href="store.php?my_pham_nhat" class="sub-item">Mỹ Phẩm Nhật</a>
								<a href="#" class="sub-item">Son</a>
								<a href="#" class="sub-item">Phấn</a>
								<a href="#" class="sub-item">Kem Nền</a>
							</div>
						</div>
					</div>
				</div>

			<!-- /Side Bar -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<!-- <div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sort By:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label>

						<label>
							Show:
							<select class="input-select">
								<option value="0">20</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div> -->
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">

					<?php

						foreach ($hang_hoa_nhat as $hang_hoa) {
							extract($hang_hoa);
							$img=$UPLOAD_URL.$hinh;
							$thanh_tien = $don_gia - ($don_gia*$giam_gia);
							$phan_tram = $giam_gia*100;

					?>
							<div class="col-md-4 col-xs-6">
										<div class="product">
											<div class="product-img">
												<img src="<?php echo $img ?>" alt="">
												<div class="product-label">
													<span class="sale">- <?php echo $phan_tram ?>%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php 
												if($ma_loai == 46){
													echo 'Mỹ Phẩm Hàn';
												}elseif($ma_loai == 55){
													echo 'Mỹ Phẩm Nhật';
												}
												 ?></p>
												<h3 class="product-name"><a href="#"><?php echo $ten_hh ?></a></h3>
												<h4 class="product-price">$<?php echo $thanh_tien ?><del class="product-old-price">$<?php echo $don_gia ?></del></h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
							</div>
					<?php
						}

					?>

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product01.png" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product02.png" alt="">
								<div class="product-label">
									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- <div class="clearfix visible-sm visible-xs"></div> -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product03.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- <div class="clearfix visible-lg visible-md"></div> -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product04.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- <div class="clearfix visible-sm visible-xs"></div> -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product05.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product06.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div> -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product07.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product08.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->

					<!-- <div class="clearfix visible-sm visible-xs"></div> -->

					<!-- product -->
					<!-- <div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="/content/images/product09.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div> -->
					<!-- /product -->
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing 20-100 products</span>
					<ul class="store-pagination">

						<?php
							echo $hien_thi_so_trang_nhat;
						 ?>
						

					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter">
					<p>Sign Up for the <strong>NEWSLETTER</strong></p>
					<form>
						<input class="input" type="email" placeholder="Enter Your Email">
						<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
					</form>
					<ul class="newsletter-follow">
						<li>
							<a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEWSLETTER -->