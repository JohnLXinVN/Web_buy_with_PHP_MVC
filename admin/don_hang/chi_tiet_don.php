<button type="button"
    class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><a
        href="index.php">Quay lại</a></button>

<main class="  pb-24 pt-8 sm:px-6 sm:pt-16 ">
    <div class="space-y-2 sm:flex sm:items-baseline sm:justify-between sm:space-y-0 sm:px-0">
        <div class="flex sm:items-baseline sm:space-x-4">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Order
                <?php echo $infor_dh["ma_dh"] ?>
            </h1>

        </div>
        <p class="text-sm text-gray-600">Order placed <time datetime="2021-03-22" class="font-medium text-gray-900">
                <?php echo $infor_dh["ngay_dat"] ?>
            </time></p>
        <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:hidden">
            View invoice
            <span aria-hidden="true"> &rarr;</span>
        </a>
    </div>

    <div class="mt-6 lg:col-span-5 lg:mt-0">
        <dl class="grid grid-cols-3 gap-x-6 text-sm">
            <div>
                <dt class="font-medium text-gray-900">Địa chỉ giao hàng</dt>
                <dd class="mt-3 text-gray-500">
                    <span class="block">
                        <?php echo $infor_dh["first_name"] . " " . $infor_dh["last_name"] ?>
                    </span>
                    <span class="block">
                        <?php echo $infor_dh["dia_chi"] ?>
                    </span>
                </dd>
            </div>
            <div>
                <dt class="font-medium text-gray-900">Thông tin liên lạc</dt>
                <dd class="mt-3 space-y-3 text-gray-500">
                    <p>
                        <?php echo $infor_dh["email"] ?>
                    </p>
                    <p>
                        <?php echo $infor_dh["phone"] ?>
                    </p>
                </dd>
            </div>
            <?php
            if ($infor_dh["ma_trang_thai"] != 4) {

                ?>
                <div>
                    <select class="ma_trang_thai" name="ma_trang_thai" id="ma_trang_thai"
                        value="<?php echo $infor_dh["ma_trang_thai"] ?>">
                        <?php foreach ($list_trang_thai as $key => $value1) {

                            ?>
                            <option value="<?php echo $value1["id"] ?>" <?php echo $value1["id"] == $infor_dh["ma_trang_thai"] ? "selected" : "" ?>>
                                <?php echo $value1["ten_trang_thai"] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            <?php } ?>

        </dl>
        <div>
            <dt class="font-medium text-gray-900">Notes</dt>
            <dd class="mt-3 text-gray-500">
                <span class="block">
                    <?php echo $infor_dh["first_name"] . " " . $infor_dh["last_name"] ?>
                </span>

            </dd>
        </div>
        <div>
            <p class="font-semibold text-lg text-black py-6">Tổng: <span class="text-indigo-600">
                    VND
                    <?php echo number_format(round(floatval($infor_dh["tong_tien_dh"]), 2), 2) ?>
                </span></p>
        </div>
    </div>

    <!-- Products -->
    <section aria-labelledby="products-heading" class="mt-6">
        <h2 id="products-heading" class="sr-only">Products purchased</h2>

        <div class="space-y-8">

            <?php

            foreach ($list_sp_in_dh as $sp) {

                ?>
                <div class="flex flex-col lg:flex-row items-center py-6 border-b border-gray-200 gap-6 w-full">
                    <div class="img-box max-lg:w-full">
                        <img src="/upload/<?php echo $sp["hinh"] ?>" alt="Premium Watch image"
                            class="aspect-square w-full lg:max-w-[140px]">
                    </div>
                    <div class="flex flex-row items-center w-full ">
                        <div class="grid grid-cols-1 lg:grid-cols-2 w-full">
                            <div class="flex items-center">
                                <div class="">
                                    <h2 class="font-semibold text-xl leading-8 text-black mb-3">
                                        <?php echo $sp["ten_hh"] ?>
                                    </h2>
                                    <p class="font-normal text-lg leading-8 text-gray-500 mb-3 ">
                                        By: Dust Studios</p>
                                    <div class="flex items-center ">
                                        <p
                                            class="font-medium text-base leading-7 text-black pr-4 mr-4 border-r border-gray-200">
                                            Biến thể: <span class="text-gray-500">
                                                <?php echo $sp["ten_loai"] ?>
                                            </span></p>
                                        <p class="font-medium text-base leading-7 text-black ">Số lượng: <span
                                                class="text-gray-500">
                                                <?php echo $sp["so_luong"] ?>
                                            </span></p>
                                    </div>
                                </div>

                            </div>
                            <div class="grid grid-cols-5">
                                <div class="col-span-5 lg:col-span-1 flex items-center max-lg:mt-3">
                                    <div class="flex gap-3 lg:block">
                                        <p class="font-medium text-sm leading-7 text-black">Tổng giá</p>
                                        <p class="lg:mt-4 font-medium text-sm leading-7 text-indigo-600">VND
                                            <?php echo number_format(round(floatval($sp["don_gia"]), 2), 2) ?>
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>

            <?php } ?>


            <!-- More products... -->
        </div>
    </section>
</main>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete");
    }

    const trangThaiSelects = document.querySelectorAll('select[name="ma_trang_thai"]');
    const listMaDonHang = document.querySelectorAll('.ma_dh_list');



    trangThaiSelects.forEach((select, index) => {
        select.addEventListener('change', function () {
            const selectedValue = select.value; // Lấy giá trị của option đã chọn
            const ma_dh = <?php echo json_encode($ma_dh); ?>;

            console.log("selectedValue: ", selectedValue);
            console.log("ma_dh: ", ma_dh);
            const xhr = new XMLHttpRequest();

            // Xác định phương thức và URL yêu cầu
            xhr.open('POST', '/admin/don_hang/index.php?update_tt', true);

            // Thiết lập tiêu đề yêu cầu
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Xử lý sự kiện khi yêu cầu hoàn thành
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Xử lý kết quả trả về từ yêu cầu AJAX
                    console.log("connect oki");
                    const response = xhr.responseText;
                    // Tiếp tục xử lý kết quả theo logic của bạn
                } else {
                    // Xử lý khi có lỗi xảy ra trong yêu cầu AJAX
                }
            };

            // Chuẩn bị dữ liệu để gửi đi
            const data = 'ma_trang_thai=' + encodeURIComponent(selectedValue) + '&ma_dh=' + encodeURIComponent(ma_dh);

            // Gửi yêu cầu AJAX

            xhr.send(data);
            setTimeout(() => {
                location.reload();

            }, 200)
        });
    });

</script>