<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Chi tiết tin tức</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Tin Tức</li>
					<li class="active">Chi Tiết Tin Tức</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row pl-10 pr-10">
			<div class="chi-tiet-tin-tuc">
				<div class="i1">
					<img src="/upload/<?= $tt['hinh'] ?>" alt="">
					<div class="content">
						<h1><?= $tt['tieu_de'] ?></h1>
						<p><?= $tt['mo_ta'] ?></p>
						<p><?= $tt['noi_dung'] ?></p>
					</div>
					<h1 class="box-title">Tin Tức Khác</h1>
					<div class="tin-tuc2">
						<?php
						$currentId = $tt['id_tin_tuc'];
						foreach ($listt as $tintuc) {
							if ($tintuc['id_tin_tuc'] !== $currentId) {
						?>
								<div class="o1">
									<a href="../tin_tuc/tin_tuc.php?id_tin_tuc=<?= $tintuc['id_tin_tuc'] ?>">
										<img src="/upload/<?= $tintuc['hinh'] ?>" alt="">
									</a>
									<h3><?= $tintuc['tieu_de'] ?></h3>
									<p><?= $tintuc['mo_ta'] ?></p>
									<a class="primary-btn cta-btn" href="../tin_tuc/tin_tuc.php?id_tin_tuc=<?= $tintuc['id_tin_tuc'] ?>">Xem thêm</a>
								</div>
							<?php
							}
							?>
						<?php
						}
						?>
					</div>
				</div>

				<div class="i2">

					<div class="i3">
						<img src="/content/images/products04.webp" alt="">

						<h4>Sản phẩm bán chạy nhất tháng 1 có gì mà khiến mọi người quan tâm đến vậy ?</h4>
						<h4>Sản phẩm nội địa Nhật Bản có giá như thế nào ?</h4>
						<h4>Bộ sản phẩm nội địa Hàn Quốc có thành phần tự nhiên</h4>
						<h4>Sản phẩm mỹ phẩm của ca sĩ Taylor Swift</h4>
						<h4>Sản Phẩm bán chạy nhất tháng 5</h4>
					</div>

					<div class="i3">
						<img src="/content/images/products04.webp" alt="">

						<h4>Sản phẩm bán chạy nhất tháng 1 có gì mà khiến mọi người quan tâm đến vậy ?</h4>
						<h4>Sản phẩm nội địa Nhật Bản có giá như thế nào ?</h4>
						<h4>Bộ sản phẩm nội địa Hàn Quốc có thành phần tự nhiên</h4>
						<h4>Sản phẩm mỹ phẩm của ca sĩ Taylor Swift</h4>
						<h4>Sản Phẩm bán chạy nhất tháng 5</h4>
					</div>

				</div>


			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->