<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row !ml-0 !mr-0">

            <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
                <?php
                // đăng nhập 
                $userLogin = null;
                if (isset($_COOKIE['user'])) {
                    $userCookie = $_COOKIE['user'];
                    $userLogin = unserialize($userCookie);
                }


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
                            <img src="/upload/<?php echo $hang_hoa['hinh'] ?>" alt="">
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
                                            <i class="fa fa-heart <?= $is_favorite ?>"></i>
                                            <span class="tooltipp">add to wishlist</span>
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
                            <button class="add-to-cart-btn">
                                <i class="fa fa-shopping-cart"></i> add to cart
                            </button>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>