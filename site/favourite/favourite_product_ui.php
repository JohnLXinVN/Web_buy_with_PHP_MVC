<div class="container pb-12 mb-20">
    <h1 class="mt-5 text-center">Danh sách sản phẩm yêu thích</h1>

    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                    <div class="products-slick" data-nav="#slick-nav-1">
                        <!-- product SẢN PHẨM MỚI -->
                        <?php
                        foreach ($ds_yt as $hang_hoa) {
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
                                    <div class="product-btns">
                                            <button class="add-to-wishlist" onclick="window.location.href='../favourite/favourite_product.php?remove_favourite&id=<?=$hang_hoa['id']?>'">
                                                <i class="fa fa-heart <?=$is_favorite?>"></i>
                                                <span class="tooltipp">remove to wishlist</span>
                                        <button class="quick-view">
                                            <i class="fa fa-eye"></i>
                                            <span class="tooltipp">quick view</span>
                                        </button>

                                    </div>
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
</div>