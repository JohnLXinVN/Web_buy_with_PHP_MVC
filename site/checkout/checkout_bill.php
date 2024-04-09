<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="demoValidation.js" type="text/javascript"></script>
<script>
    $().ready(function () {
        $("#checkout").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {
                "first_name": {
                    required: true,
                    minlength: 1
                },
                "last_name": {
                    required: true,
                    minlength: 1
                },
                "email": {
                    required: true,
                    email: true
                },
                "address": {
                    required: true,
                    minlength: 2,
                    maxlength: 200,
                },
                "tel": {
                    required: true,
                    pattern: /^(\\+?84|0)(3[2-9]|5[2689]|7[06789]|8[1-689]|9[0-46-8])[0-9]{7}$/
                },
                "payment": {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                "first_name": {
                    required: "Trường bắt buộc",
                    minlength: "Tối thiểu 1 ký tự"
                },
                "last_name": {
                    required: "Trường bắt buộc",
                    minlength: "Tối thiểu 1 ký tự"
                },
                "email": {
                    required: "Trường bắt buộc",
                    email: "Phải là email hợp lệ"
                },
                "address": {
                    required: "Trường bắt buộc",
                    minlength: "Tối thiểu 2 ký tự",
                    maxlength: "Tối đa 200 ký tự"
                },
                "tel": {
                    required: "Trường bắt buộc",
                    pattern: "Số điện thoại Việt Nam không hợp lệ"
                },
                "payment": {
                    required: "Trường bắt buộc",
                    minlength: "Tối thiểu 1 ký tự"
                }
            }
        });
    });
</script>





<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li class="active">Checkout</li>
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
        <form id="checkout" action="index.php?btn_order" method="POST">
            <input type="hidden" name="ma_trang_thai" id="ma_trang_thai" value="1">
            <input type="hidden" name="ma_kh" id="ma_kh" value="<?php echo $userLogin["ma_kh"] ?>">
            <div class="row">

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Địa chỉ đặt hàng</h3>
                        </div>
                        <div class="mb-4">
                            <label for="first_name" class="block mb-2 text-black font-medium text-black">First
                                name:</label>
                            <input type="text" name="first_name" id="first_name" placeholder="First name"
                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6 "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block mb-2 text-black font-medium text-black">Last
                                name:</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Last name"
                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6 "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-black font-medium text-black">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6 "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block mb-2 text-black font-medium text-black">Địa chỉ</label>
                            <input type="text" name="address" id="address" placeholder="Địa chỉ"
                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6 "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="tel" class="block mb-2 text-black font-medium text-black">Số điện thoại:</label>
                            <input type="tel" name="tel" id="tel" placeholder="Số điện thoại"
                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6 "
                                required>
                        </div>

                    </div>
                    <!-- /Billing Details -->



                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea class="input" name="notes" id="notes" clas placeholder="Order Notes"></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Đơn hàng của bạn</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>Sản phẩm</strong></div>
                            <div><strong>Tổng</strong></div>
                        </div>
                        <div class="order-products">
                            <?php
                            foreach ($ds_cart as $item) {

                                ?>
                                <input type="hidden" name="ds_cart_by_id[]" value="<?php echo $item["id"] ?>">
                                <div class="order-col">
                                    <div>
                                        <?php echo $item["sl_hh_cart"] ?>x
                                        <?php echo $item["ten_hh"] ?>
                                    </div>
                                    <div>VND
                                        <?php echo number_format(round(floatval($item["tong_gia"]), 2), 2) ?>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                        <div class="order-col">
                            <div>Vận chuyển</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>Tổng</strong></div>
                            <div><strong class="order-total">VND
                                    <?php echo number_format(round(floatval($tong_gia), 2), 2) ?>
                                </strong></div>
                            <input type="hidden" name="tong_gia" id="tong_gia" value="<?php echo $tong_gia ?>">
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1" value="Ship COD" checked>
                            <label for="payment-1">
                                <span></span>Ship COD

                            </label>

                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2" value="Thanh toán thẻ">
                            <label for="payment-2">
                                <span></span>Thanh toán thẻ

                            </label>

                        </div>

                    </div>

                    <button type="submit" name="" class="primary-btn order-submit">Place order</button>
                </div>
                <!-- /Order Details -->
            </div>
        </form>

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