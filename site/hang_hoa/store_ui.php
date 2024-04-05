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
						<?php
						foreach ($ds_loai_hang as $loai) { ?>
							<a href="store.php?ma_loai=<?= $loai['ma_loai'] ?>" class="sub-item">
								<?= $loai['ten_loai'] ?>
							</a>
							<?php
						}
						?>
					</div>
				</div>
			</div>

			<!-- /Side Bar -->

			<!-- STORE -->
			<div id="store" class="col-md-8 ">

				<div class="grid grid-cols-3 gap-x-8 gap-y-[80px]">

					<?php
					// đăng nhập 
					$userLogin = null;
					if (isset($_COOKIE['user'])) {
						$userCookie = $_COOKIE['user'];
						$userLogin = unserialize($userCookie);
					}

					foreach ($hang_hoa_new as $hang_hoa) {

						$ds_bt = get_bt_by_ma_hh($hang_hoa["ma_hh"]);

						$thanh_tien = $ds_bt[0]['gia'] - ($ds_bt[0]['gia'] * $hang_hoa['giam_gia']);
						$phan_tram = $hang_hoa['giam_gia'] * 100;

						$is_favorite = $check > 0 ? "fa-hearted" : '';
						?>
						<div class="product col-span-1 ">
							<p class="tien hidden">
								<?php echo $thanh_tien ?>
							</p>
							<p class="bien_the hidden">
								<?php echo $ds_bt[0]["id"] ?>
							</p>
							<div class="product-img">
								<img src="/upload/<?php echo $hang_hoa['hinh'] ?>" alt="">
								<div class="product-label">
									<?php if ($hang_hoa['giam_gia'] > 0)
										echo '<span class="sale">' . $phan_tram . '%</span>'
											?>
										<span class="new">NEW</span>
									</div>
								</div>
								<div class="product-body">
									<!-- <p class="product-category">
									<?= $hang_hoa['ten_loai'] ?>
								</p> -->
								<h3 class="product-name"><a
										href="/site/hang_hoa/chi_tiet.php?ma_hh=<?php echo $hang_hoa["ma_hh"] ?>">
										<?= $hang_hoa['ten_hh'] ?>
									</a></h3>
								<h3 class="product-name text-yellow-500 text-xl">
									<?= $ds_bt[0]['ten_loai'] ?>
								</h3>
								<h4 class="product-price">
									<?= number_format(round(floatval($thanh_tien), 2), 2) ?>VND<del
										class="product-old-price">
										<?= number_format(round(floatval($ds_bt[0]['gia']), 2), 2) ?>VND
									</del>
								</h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<form action="../favourite/favourite_product.php?add_favourite" method="POST">
									<input type="hidden" name="ma_hh" value="<?= $hang_hoa['ma_hh'] ?>">
									<input type="hidden" name="ma_kh" value="12">
									<div class="product-btns">
										<?php
										if (isset($userLogin)) { ?>
											<button class="add-to-wishlist">
												<i class="fa fa-heart <?= $is_favorite ?>"></i>
												<span class="tooltipp">Thêm vào danh sách yêu thích</span>
											</button>
											<?php
										} else { ?>
											<p>Đăng Nhập Để Thêm Sản Phẩm Vào yêu Thích</p>
											<?php
										}
										?>
										<button class="quick-view" data-tenhh="<?= $hang_hoa['ten_hh'] ?>"
											data-mota="<?= $hang_hoa['mo_ta'] ?>" data-anh="<?= $hang_hoa['hinh'] ?>">
											<i class="fa fa-eye"></i>
											<span class="tooltipp">quick view</span>
										</button>
										<script>
											$(document).ready(function () {
												// Xử lý sự kiện nhấp vào nút Quickview
												$('.quick-view').click(function (e) {
													e.preventDefault();
													// Lấy thông tin sản phẩm từ thuộc tính data
													var tenHH = $(this).data('tenhh');
													var moTa = $(this).data('mota');
													var hinhAnh = $(this).data("anh");

													// Gọi hàm showQuickViewModal với thông tin sản phẩm
													showQuickViewModal(tenHH, moTa, hinhAnh);
												});

												// Hiển thị modal Quickview với thông tin sản phẩm
												function showQuickViewModal(tenHH, moTa, hinhAnh) {
													// Điền thông tin sản phẩm vào modal Quickview
													$('#quick-view-title').text(tenHH);
													$('#quick-view-description').text(moTa);
													$('#quick-view-image').attr('src', "/upload/" + hinhAnh);

													// Hiển thị modal Quickview
													$('#quick-view-modal').modal('show');
												}
											});
										</script>
									</div>
								</form>
							</div>
							<div class="add-to-cart">
								<?php
								if ($userLogin) {

									?>
									<button class="add-to-cart-btn"
										onclick="addToCart(<?php echo $thanh_tien ?>, <?php echo $ds_bt[0]['id'] ?>)"><i
											class="fa fa-shopping-cart"></i> add to
										cart</button>

								<?php } else { ?>
									<a href="/site/tai_khoan/index.php?login"
										class="block border-2 border-red-500 pointer rounded-3xl py-2 px-4 w-fit mt-2">
										Đăng nhập để
										thêm
										vào
										giỏ
										hàng
									</a>
								<?php } ?>
								<script>


									const addToCart = (selectedVariantPrice, selectedVariantId) => {

										console.log(selectedVariantPrice);
										const xhr = new XMLHttpRequest();

										xhr.open('POST', '/site/hang_hoa/chi_tiet.php?addToCart', true);

										// Thiết lập tiêu đề yêu cầu
										xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

										// Xử lý sự kiện khi yêu cầu hoàn thành
										xhr.onload = function () {
											if (xhr.status === 200) {
												// Xử lý kết quả trả về từ yêu cầu IJAX
												console.log("connect oki")
												const response = xhr.responseText;
												// Tiếp tục xử lý kết quả theo logic của bạn
											} else {
												// Xử lý khi có lỗi xảy ra trong yêu cầu IJAX
											}
										};

										// Chuẩn bị dữ liệu để gửi đi

										const data = 'VariantId=' + encodeURIComponent(selectedVariantId) +
											'&variantPrice=' + encodeURIComponent(selectedVariantPrice) +
											'&quantity=1';

										// Gửi yêu cầu IJAX
										xhr.send(data);

										Toastify({
											text: "Thêm vào giỏ hàng thành công",
											duration: 2000,
											close: true,
											gravity: "top", // `top` or `bottom`
											position: "right", // `left`, `center` or `right`
											stopOnFocus: true, // Prevents dismissing of toast on hover
											style: {
												background: "linear-gradient(to right, #00b09b, #96c93d)",
											},
										}).showToast();

									}
								</script>
							</div>

							<div id="quick-view-modal" class="modal">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="quick-view-title"></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-6">
													<img id="quick-view-image" src="" alt="Product Image">
												</div>
												<div class="col-md-6">
													<p id="quick-view-description"></p>
													<!-- Thêm các thông tin khác của sản phẩm vào modal -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>


				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing 20-100 products</span>
					<ul class="store-pagination">
						<?php
						// echo $hien_thi_so_trang;
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>