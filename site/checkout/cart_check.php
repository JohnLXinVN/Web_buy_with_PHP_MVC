<style>
    .mo_ta {

        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;

    }
</style>




<div class="container mx-auto mt-10">
    <div class="sm:flex shadow-md my-10">
        <div class="  w-full  sm:w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                <h2 class="font-semibold text-2xl">
                    <?php echo count($ds_cart) ?> Items
                </h2>
            </div>
            <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">

                <?php
                foreach ($ds_cart as $key => $value) {



                    ?>
                    <li class="flex py-6 sm:py-10">
                        <div class="md:flex h-full items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                            <div class="md:w-4/12 2xl:w-1/4 w-full">
                                <img src="/upload/<?php echo $value['hinh'] ?>" alt="Black Leather Purse"
                                    class=" w-full h-full object-center object-cover" />
                            </div>
                            <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                                <p class="text-xs leading-3 text-gray-800 md:pt-0 pt-4">RF293</p>
                                <div class="flex items-center justify-between w-full mt-2">
                                    <p class="text-base font-black leading-none text-gray-800">
                                        <?php echo $value["ten_hh"] ?>
                                    </p>

                                </div>

                                <div>
                                    <div class="flex flex-row items-center gap-3">
                                        <p>VND</p>
                                        <h3 class="product-price-detail text-3xl text-red-500">
                                            <?php
                                            $gia_giam = (float) $value["gia"] - (float) $value["gia"] * (float) $value["giam_gia"];
                                            echo number_format(round(floatval($gia_giam), 2), 2);
                                            ?>
                                        </h3>
                                        <del class="product-old-price-detail text-xl">
                                            <?php echo number_format(round(floatval($value["gia"]), 2), 2) ?>
                                        </del>
                                    </div>
                                </div>
                                <p class="text-xs leading-3 text-gray-600 py-4">
                                    <?php echo $value["ten_loai"] ?>
                                </p>
                                <p class="w-96 text-xs leading-3 text-gray-600 mo_ta">
                                    <?php echo $value["mo_ta"] ?>
                                </p>
                                <div class="flex items-center justify-between pt-5">
                                    <div class="flex itemms-center">
                                        <a href="/site/checkout/index.php?delete_item_in_cart&ma_bt=<?php echo $value["ma_bt"] ?>"
                                            class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove</a>
                                    </div>

                                </div>
                            </div>
                            <div class="flex h-full flex-col items-center justify-between ">
                                <div class="mt-4 flex items-center">
                                    <span class="mr-2 text-gray-600">Quantity:</span>
                                    <div class="flex items-center">
                                        <button class="bg-gray-200 rounded-l-lg px-2 decrease-btn">-</button>
                                        <input type="number" value="<?php echo $value["sl_hh_cart"] ?>"
                                            class="w-[40px] focus-visible:outline-none quantity-input" min="1" step="1">
                                        <button class="bg-gray-200 rounded-r-lg px-2 increase-btn">+</button>
                                    </div>
                                </div>
                                <div class="mb-8 flex flex-row items-center">
                                    <p class="text-2xl font-black leading-none text-gray-800 item-price">
                                        <?php echo number_format(round(floatval($value["tong_gia"]), 2), 2) ?>
                                    </p>
                                    <p>VND</p>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>


            <a href="/" class="flex font-semibold text-indigo-600 text-lg mt-10">
                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Continue Shopping
            </a>
        </div>
        <div id="summary" class=" w-full   sm:w-1/4   md:w-1/2     px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Total</span>
                <div>
                    <span class="font-semibold text-sm tong_gia_2">
                        <?php echo number_format(round(floatval($tong_gia), 2), 2) ? number_format(round(floatval($tong_gia), 2), 2) : 0 ?>
                    </span>
                    VND
                </div>
            </div>

            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Số lượng</span>
                <span class="font-semibold text-sm sl_sp_in_cart">
                    <?php echo $sl_sp_in_cart ? $sl_sp_in_cart : 0 ?>
                </span>
            </div>

            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Total cost</span>
                    <div>
                        <span class="tong_gia">
                            <?php echo number_format(round(floatval($tong_gia), 2), 2) ? number_format(round(floatval($tong_gia), 2), 2) : 0 ?>
                        </span>
                        vnd
                    </div>
                </div>
                <a href="index.php" <?php echo count($ds_cart) == 0 ? "onclick='return false;'" : "" ?>
                    class="bg-[#ff00d9] block text-center font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Lấy danh sách các phần tử DOM cần thiết
    const decreaseBtns = document.querySelectorAll('.decrease-btn');
    const increaseBtns = document.querySelectorAll('.increase-btn');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const itemPrices = document.querySelectorAll('.item-price');
    const Tong_gia = document.querySelectorAll('.tong_gia');
    const Tong_gia_2 = document.querySelectorAll('.tong_gia_2');
    const Tong_sp = document.querySelectorAll('.sl_sp_in_cart');

    const list_sp = <?php echo json_encode($ds_cart); ?>;

    console.log(Tong_gia)

    // Lặp qua từng phần tử và gắn sự kiện
    decreaseBtns.forEach((decreaseBtn, index) => {
        decreaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInputs[index].value);
            if (currentValue > 1) {
                quantityInputs[index].value = currentValue - 1;
                const gia_sp = list_sp[index].tong_gia / list_sp[index].sl_hh_cart;
                console.log("list_sp", list_sp)

                updateItemPrice(index, gia_sp, list_sp[index]);
            }
        });
    });

    increaseBtns.forEach((increaseBtn, index) => {
        increaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInputs[index].value);
            quantityInputs[index].value = currentValue + 1;
            const gia_sp = list_sp[index].tong_gia / list_sp[index].sl_hh_cart;
            updateItemPrice(index, gia_sp, list_sp[index]);
        });
    });

    quantityInputs.forEach((quantityInput, index) => {
        quantityInput.addEventListener('change', () => {
            const gia_sp = list_sp[index].tong_gia / list_sp[index].sl_hh_cart;

            updateItemPrice(index, gia_sp, list_sp[index]);
        });
    });
    console.log("Tong_gia: ", Tong_gia);
    console.log("itemPrices: ", itemPrices)
    function updateItemPrice(index, gia_sp, sp) {
        let quantity = parseInt(quantityInputs[index].value);
        console.log(quantity);
        console.log(gia_sp);
        let totalPrice = quantity * gia_sp;
        itemPrices[index].textContent = totalPrice.toFixed(2); // Định dạng giá tiền với 2 chữ số sau dấu thập phân

        const xhr = new XMLHttpRequest();

        // Xác định phương thức và URL yêu cầu
        xhr.open('POST', '/site/checkout/index.php?update_data_item_cart', true);

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
        const data = 'VariantId=' + encodeURIComponent(sp.ma_bt) +
            '&totalPrice=' + encodeURIComponent(totalPrice) +
            '&quantity=' + encodeURIComponent(quantity);

        // Gửi yêu cầu IJAX
        xhr.send(data);
        console.log("data: ", data);
        let totalPriceAll = 0;
        let totalQuantityAll = 0;


        quantityInputs.forEach((item, index) => {
            totalQuantityAll += parseInt(quantityInputs[index].value);
        })
        itemPrices.forEach((item, index) => {
            totalPriceAll += parseFloat(itemPrices[index].innerText);
        })
        console.log("totalPriceAll: ", totalPriceAll)
        console.log("totalQuantityAll: ", totalQuantityAll)
        Tong_gia[0].textContent = totalPriceAll;
        Tong_gia_2[0].textContent = totalPriceAll;
        Tong_sp[0].textContent = totalQuantityAll;
    }
</script>