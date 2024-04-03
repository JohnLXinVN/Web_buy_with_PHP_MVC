<style>
    .product-price-detail {
        display: inline-block;
        font-size: 24px;
        margin-top: 10px;
        margin-bottom: 15px;
        color: #d10024;
    }

    .product-old-price-detail {
        font-size: 70%;
        font-weight: 400;
        color: #8d99ae;
    }
</style>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->



<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Headphones</a></li>
                    <li class="active">Product name goes here</li>
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
        <div class="row mb-5">
            <!-- Product main img -->
            <div class="col-md-5 relative">
                <img class="w-full h-full" src="/upload/<?php echo $item_hh["hinh"] ?>" alt="">
                <div
                    class="product-label w-[60px] h-[60px] flex items-center justify-center rounded-full bg-red-500 absolute right-0 top-[-10px]">
                    <span class="sale text-white">-
                        <?php echo $item_hh["giam_gia"] * 100 ?>%
                    </span>
                </div>
            </div>

            <div class="col-md-7">
                <div class="product-details">
                    <h2 class="product-name">
                        <?php echo $item_hh["ten_hh"] ?>
                    </h2>

                    <div>
                        <div class="flex flex-row items-center gap-3">
                            <p>$</p>
                            <h3 class="product-price-detail">
                            </h3>
                            <del class="product-old-price-detail"></del>
                        </div>
                    </div>
                    <p>
                        <?php echo $item_hh["mo_ta"] ?>
                    </p>

                    <div class="product-options">
                        <label>
                            Biến thể
                            <select class="input-select-variant">
                                <?php
                                foreach ($list_variant as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value["id"] ?>">
                                        <?php echo $value["ten_loai"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </label>

                    </div>
                    <h2 class="flex flex-row mb-2 items-center">
                        Số lượng:
                        <p class="so_luong_view"></p>
                    </h2>
                    <div class="add-to-cart !bg-white">
                        <div class="qty-label">
                            Tổng
                            <div class="input-number">
                                <input type="number" min="1" value="1" step="1">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <?php
                        if ($userLogin) {

                            ?>
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>

                        <?php } else { ?>
                            <a href="/site/tai_khoan/index.php?login"
                                class="block border-2 border-red-500 pointer rounded-3xl py-2 px-4 w-fit mt-2"> Đăng nhập để
                                thêm
                                vào
                                giỏ
                                hàng
                            </a>
                        <?php } ?>
                    </div>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">

                            </a></li>
                    </ul>

                    <!-- <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul> -->

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <?php echo $item_hh["desc"] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->


                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
        <div>
            <h1>Bình luận</h1>
            <?php
            require ("./binh_luan.php");
            ?>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="/content/images/product01.png" alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                    wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                                    compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                    view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart !bg-white">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->



        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

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

<script>

    const list_variant = <?php echo json_encode($list_variant); ?>;
    const item_hh = <?php echo json_encode($item_hh); ?>;

    const variantSelect = document.querySelector('.input-select-variant');
    const priceElement = document.querySelector('.product-price-detail');
    const oldPriceElement = document.querySelector('.product-old-price-detail');
    const addToCartButton = document.querySelector('.add-to-cart-btn');
    const quantityInput = document.querySelector('.input-number input');
    const so_luong_view = document.querySelector('.so_luong_view');



    updatePrice();

    function updatePrice() {
        // Thực hiện cập nhật số tiền tương ứng với biến thể đã chọn
        var selectedVariant = list_variant[0];
        so_luong_view.textContent = list_variant[0].tong_so_luong
        // Cập nhật giá tiền hiển thị

        // Kiểm tra và cập nhật giá tiền đã trừ giảm giá (nếu có)
        if (item_hh.giam_gia > 0) {
            oldPriceElement.textContent = parseFloat(selectedVariant.gia).toFixed(2);
            priceElement.textContent = (parseFloat(selectedVariant.gia) - parseFloat(selectedVariant.gia) * parseFloat(item_hh.giam_gia)).toFixed(2);
            oldPriceElement.style.display = 'inline';
        } else {
            priceElement.textContent = parseFloat(selectedVariant.gia).toFixed(2);
            oldPriceElement.style.display = 'none';
        }

    }


    // Lắng nghe sự kiện khi người dùng thay đổi biến thể
    variantSelect.addEventListener('change', function () {
        // Lấy thông tin về biến thể đã chọn
        var selectedVariantIndex = variantSelect.selectedIndex;
        var selectedVariant = list_variant[selectedVariantIndex];
        // Cập nhật giá tiền hiển thị
        so_luong_view.textContent = list_variant[selectedVariantIndex].tong_so_luong

        // Kiểm tra và cập nhật giá tiền đã trừ giảm giá (nếu có)
        if (item_hh.giam_gia > 0) {
            oldPriceElement.textContent = parseFloat(selectedVariant.gia).toFixed(2);
            priceElement.textContent = (parseFloat(selectedVariant.gia) - parseFloat(selectedVariant.gia) * parseFloat(item_hh.giam_gia)).toFixed(2);
            oldPriceElement.style.display = 'inline';
        } else {
            priceElement.textContent = parseFloat(selectedVariant.gia).toFixed(2);

            oldPriceElement.style.display = 'none';
        }

        // Lưu thông tin biến thể vào thuộc tính data của nút "Thêm vào giỏ hàng"
        addToCartButton.setAttribute('data-hh-id', selectedVariant.ma_hh);
        addToCartButton.setAttribute('data-variant-id', selectedVariant.id);
        addToCartButton.setAttribute('data-variant-price', item_hh.giam_gia ? parseFloat(selectedVariant.gia).toFixed(2) : (parseFloat(selectedVariant.gia) - parseFloat(selectedVariant.gia) * parseFloat(item_hh.giam_gia)).toFixed(2));

    });

    // Xử lý sự kiện khi người dùng nhấp vào nút "Thêm vào giỏ hàng"
    addToCartButton.addEventListener('click', function () {
        const variantPriceFirst = !item_hh.giam_gia ? parseFloat(list_variant[0].gia).toFixed(2) : (parseFloat(list_variant[0].gia) - parseFloat(list_variant[0].gia) * parseFloat(item_hh.giam_gia)).toFixed(2)
        const selectedVariantId = this.getAttribute('data-variant-id') ? this.getAttribute('data-variant-id') : list_variant[0].id;
        const selectedVariantPrice = this.getAttribute('data-variant-price') ? this.getAttribute('data-variant-price') : variantPriceFirst;
        const quantity = quantityInput.value;



        const xhr = new XMLHttpRequest();

        // Xác định phương thức và URL yêu cầu
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
            '&quantity=' + encodeURIComponent(quantity);

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

        // Tiếp tục xử lý yêu cầu theo logic của bạn, ví dụ: thêm vào giỏ hàng, lưu vào cơ sở dữ liệu, vv.
    });
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>