<style>
    .product-name p {

        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;


    }
</style>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row !ml-0 mr-0">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/content/images/products03.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Mỹ Phẩm<br>Hàn Quốc</h3>

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
                                // đăng nhập 
                                $userLogin = null;
                                if (isset($_COOKIE['user'])) {
                                    $userCookie = $_COOKIE['user'];
                                    $userLogin = unserialize($userCookie);
                                }
                                // var_dump($ds_hang_hoa);
                                // die;
                                foreach ($ds_hang_hoa as $hang_hoa) {
                                    $ds_bt = get_bt_by_ma_hh($hang_hoa["ma_hh"]);

                                    $thanh_tien = $ds_bt[0]['gia'] - ($ds_bt[0]['gia'] * $hang_hoa['giam_gia']);
                                    $phan_tram = $hang_hoa['giam_gia'] * 100;

                                    $is_favorite = $check > 0 ? "fa-hearted" : '';
                                ?>

                                    <div class="product">
                                        <p class="tien hidden">
                                            <?php echo $thanh_tien ?>
                                        </p>
                                        <p class="bien_the hidden">
                                            <?php echo $ds_bt[0]["id"] ?>
                                        </p>
                                        <div class="product-img">
                                            <div class="w-full h-[200px]">
                                                <img src="/upload/<?php echo $hang_hoa['hinh'] ?>" class="object-cover"
                                                    alt="">
                                            </div>
                                            <div class="product-label">
                                                <?php if ($hang_hoa['giam_gia'] > 0)
                                                    echo '<span class="sale">' . $phan_tram . '%</span>' ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">
                                                <?= $hang_hoa['ten_loai'] ?>
                                            </p>
                                            <h3 class="product-name"><a
                                                    href="/site/hang_hoa/chi_tiet.php?ma_hh=<?php echo $hang_hoa["ma_hh"] ?>">
                                                    <?= $hang_hoa['ten_hh'] ?>
                                                </a></h3>
                                            <h3 class="product-name text-yellow-500 text-xl">
                                                <?= $ds_bt[0]['ten_loai'] ?>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= number_format(round(floatval($thanh_tien), 2), 2) ?>VND<del class="product-old-price">
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
                                                            <i class="fa fa-heart"></i>
                                                            <span class="tooltipp">Thêm vào danh sách yêu thích</span>
                                                        </button>
                                                    <?php
                                                    } else { ?>
                                                        <p>Đăng Nhập Để Thêm Sản Phẩm Vào yêu Thích</p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <button class="quick-view" data-tenhh="<?= $hang_hoa['ten_hh'] ?>" data-mota="<?= $hang_hoa['mo_ta'] ?>" data-anh="<?= $hang_hoa['hinh'] ?>">
                                                        <i class="fa fa-eye"></i>
                                                        <span class="tooltipp">quick view</span>
                                                    </button>
                                                    <script>
                                                        $(document).ready(function() {
                                                            // Xử lý sự kiện nhấp vào nút Quickview
                                                            $('.quick-view').click(function(e) {
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
                                            <!-- <button class="add-to-cart-btn">
                                                <i class="fa fa-shopping-cart"></i> add to cart
                                            </button> -->
                                            <?php
                                            if ($userLogin) {

                                            ?>
                                                <button class="add-to-cart-btn" onclick="addToCart(<?php echo $thanh_tien ?>, <?php echo $ds_bt[0]['id'] ?>)"><i class="fa fa-shopping-cart"></i> add to
                                                    cart</button>

                                            <?php } else { ?>
                                                <a href="/site/tai_khoan/index.php?login" class="block border-2 border-red-500 pointer rounded-3xl py-2 px-4 w-fit mt-2">
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
                                                    xhr.onload = function() {
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
                                            // Xác định phương thức và URL yêu cầu





                                            </script>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
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
                    <a class="primary-btn cta-btn" href="/site/hang_hoa/store.php?san_pham">Shop now</a>
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
                                    $ds_bt = get_bt_by_ma_hh($hang_hoa["ma_hh"]);
                                    $thanh_tien = $ds_bt[0]['gia'] - ($ds_bt[0]['gia'] * $hang_hoa['giam_gia']);
                                    $phan_tram = $hang_hoa['giam_gia'] * 100;
                                ?>
                                    <div class="product">
                                        <p class="tien hidden">
                                            <?php echo $thanh_tien ?>
                                        </p>
                                        <p class="bien_the hidden">
                                            <?php echo $ds_bt[0]["id"] ?>
                                        </p>
                                        <div class="product-img">
                                            <div class="w-full h-[200px]">
                                                <img src="/upload/<?php echo $hang_hoa['hinh'] ?>" class="object-cover"
                                                    alt="">
                                            </div>
                                            <div class="product-label">
                                                <?php if ($hang_hoa['giam_gia'] > 0)
                                                    echo '<span class="sale">' . $phan_tram . '%</span>' ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">
                                                <?= $hang_hoa['ten_loai'] ?>
                                            </p>
                                            <h3 class="product-name"><a
                                                    href="/site/hang_hoa/chi_tiet.php?ma_hh=<?php echo $hang_hoa["ma_hh"] ?>">
                                                    <?= $hang_hoa['ten_hh'] ?>
                                                </a></h3>
                                            <h3 class="product-name text-yellow-500 text-xl">
                                                <?= $ds_bt[0]['ten_loai'] ?>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= number_format(round(floatval($thanh_tien), 2), 2) ?>VND<del class="product-old-price">
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
                                                            <i class="fa fa-heart"></i>
                                                            <span class="tooltipp">Thêm vào danh sách yêu thích</span>
                                                        </button>
                                                    <?php
                                                    } else { ?>
                                                        <p>Đăng Nhập Để Thêm Sản Phẩm Vào yêu Thích</p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <button class="quick-view" data-tenhh="<?= $hang_hoa['ten_hh'] ?>" data-mota="<?= $hang_hoa['mo_ta'] ?>" data-anh="<?= $hang_hoa['hinh'] ?>">
                                                        <i class="fa fa-eye"></i>
                                                        <span class="tooltipp">quick view</span>
                                                    </button>
                                                    <script>
                                                        $(document).ready(function() {
                                                            // Xử lý sự kiện nhấp vào nút Quickview
                                                            $('.quick-view').click(function(e) {
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
                                                <button class="add-to-cart-btn" onclick="addToCart(<?php echo $thanh_tien ?>, <?php echo $ds_bt[0]['id'] ?>)"><i class="fa fa-shopping-cart"></i> add to
                                                    cart</button>

                                            <?php } else { ?>
                                                <a href="/site/tai_khoan/index.php?login" class="block border-2 border-red-500 pointer rounded-3xl py-2 px-4 w-fit mt-2">
                                                    Đăng nhập để
                                                    thêm
                                                    vào
                                                    giỏ
                                                    hàng
                                                </a>
                                            <?php } ?>
                                            <!-- <script>
                                                const addToCart = (selectedVariantPrice, selectedVariantId) => {

                                                    console.log(selectedVariantPrice);
                                                    const xhr = new XMLHttpRequest();

                                                    xhr.open('POST', '/site/hang_hoa/chi_tiet.php?addToCart', true);

                                                    // Thiết lập tiêu đề yêu cầu
                                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                                    // Xử lý sự kiện khi yêu cầu hoàn thành
                                                    xhr.onload = function() {
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
                        // Xác định phương thức và URL yêu cầu





                                            </script>

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



<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- /NEWSLETTER -->