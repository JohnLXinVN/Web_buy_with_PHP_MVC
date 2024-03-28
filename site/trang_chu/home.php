<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/content/images/products03.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Mỹ Phẩm<br>Hàn Quốc</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/content/images/products04.webp" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Mỹ Phẩm<br>Nhật Bản</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/content/images/products05.jfif" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Mỹ Phẩm<br>Pháp</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản Phẩm Mới</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Phấn</a></li>
                            <li><a data-toggle="tab" href="#tab1">Son Môi</a></li>
                            <li><a data-toggle="tab" href="#tab1">Dưỡng Da</a></li>
                            <li><a data-toggle="tab" href="#tab1">Kem Nền</a></li>
                            <li><a data-toggle="tab" href="#tab2">Sữa Rửa Mặt</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product SẢN PHẨM MỚI -->
                                <?php
                                foreach ($ds_hang_hoa as $hang_hoa) {
                                    $thanh_tien = $hang_hoa['don_gia'] - ($hang_hoa['don_gia'] * $hang_hoa['giam_gia']);
                                    $phan_tram = $hang_hoa['giam_gia'] * 100;

                                    $is_favorite = $check ? "fa-hearted" : '';
                                ?>
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/upload/<?php echo $hang_hoa['hinh'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($hang_hoa['giam_gia'] > 0) echo '<span class="sale">' . $phan_tram . '%</span>' ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $hang_hoa['ten_loai'] ?></p>
                                            <h3 class="product-name"><a href="#"><?= $hang_hoa['ten_hh'] ?></a></h3>
                                            <h4 class="product-price"><?= $thanh_tien ?>VND<del class="product-old-price"><?= $hang_hoa['don_gia'] ?>VND</del></h4>
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
                                                    <button type="submit" class="add-to-wishlist">
                                                        <i class="fa fa-heart <?= $is_favorite ?>"></i>
                                                        <span class="tooltipp">add to wishlist</span>
                                                    </button>
                                                    <button class="quick-view">
                                                        <i class="fa fa-eye"></i>
                                                        <span class="tooltipp">quick view</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn">
                                                <i class="fa fa-shopping-cart"></i> add to cart
                                            </button>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div id="days">
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div id="hours">
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div id="minutes">
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div id="seconds">
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top Bán Chạy</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Phấn</a></li>
                            <li><a data-toggle="tab" href="#tab2">Son Môi</a></li>
                            <li><a data-toggle="tab" href="#tab2">Dưỡng Da</a></li>
                            <li><a data-toggle="tab" href="#tab2">Kem Nền</a></li>
                            <li><a data-toggle="tab" href="#tab2">Sữa Rửa Mặt</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick   Sản Phẩm Bán chạy -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product SẢN PHẨM Bán Chạy Nhất Theo Lượt Xem -->
                                <?php
                                foreach ($ds_hang_hoa_top_10 as $hang_hoa) {
                                    $thanh_tien = $hang_hoa['don_gia'] - ($hang_hoa['don_gia'] * $hang_hoa['giam_gia']);
                                    $phan_tram = $hang_hoa['giam_gia'] * 100;
                                ?>
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/upload/<?php echo $hang_hoa['hinh'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($hang_hoa['giam_gia'] > 0) echo '<span class="sale">' . $phan_tram . '%</span>' ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $hang_hoa['ten_loai'] ?></p>
                                            <h3 class="product-name"><a href="#"><?= $hang_hoa['ten_hh'] ?></a></h3>
                                            <h4 class="product-price"><?= $thanh_tien ?>VND<del class="product-old-price"><?= $hang_hoa['don_gia'] ?>VND</del>
                                            </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <form action="../favourite/favourite_product.php?add_favourite" method="POST">
                                                    <input type="hidden" name="ma_hh" value="<?= $hang_hoa['ma_hh'] ?>">
                                                    <input type="hidden" name="ma_kh" value="12">
                                                    <div class="product-btns">
                                                        <button type="submit" class="add-to-wishlist">
                                                            <i class="fa fa-heart <?= $is_favorite ?>"></i>
                                                            <span class="tooltipp">add to wishlist</span>
                                                        </button>
                                                        <button class="quick-view">
                                                            <i class="fa fa-eye"></i>
                                                            <span class="tooltipp">quick view</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
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
                    <p>Đăng Ký Để <strong>NHẬN THÔNG TIN</strong></p>
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