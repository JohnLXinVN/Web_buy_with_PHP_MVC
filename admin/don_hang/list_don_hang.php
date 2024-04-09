<div>
    <button type="button"
        class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><a
            href="index.php">Tất cả</a></button>
    <button type="button"
        class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><a
            href="index.php?filter&ma_tt=1">Chờ xác nhận</a></button>
    <button type="button"
        class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><a
            href="index.php?filter&ma_tt=2">Đóng gói</a></button>
    <button type="button"
        class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><a
            href="index.php?filter&ma_tt=3">Vận chuyển</a></button>
    <button type="button"
        class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><a
            href="index.php?filter&ma_tt=4">Hoàn thành</a></button>

</div>


<div class="container">
    <?php
    if (count($ds_order) == 0) {
        echo "<div class='h-[500px]'><h1>Không có đơn hàng nào</h1></div>";
    }

    ?>
    <?php
    foreach ($ds_order as $value) {

        ?>
        <div class="main-box mt-4 border border-gray-200 rounded-xl pt-6 max-w-xl max-lg:mx-auto lg:max-w-full">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between px-6 pb-6 border-b border-gray-200">
                <div class="data">
                    <p class="font-semibold text-base leading-7 text-black">Order Id: <span
                            class="text-indigo-600 font-medium ma_dh_list">
                            <?php echo $value["ma_dh"] ?>
                        </span></p>
                    <p class="font-semibold text-base leading-7 text-black mt-4">Order Payment : <span
                            class="text-gray-400 font-medium">
                            <?php echo $value["ngay_dat"] ?>
                        </span></p>
                    <div class="col-span-5 lg:col-span-2 flex items-center max-lg:mt-3 ">
                        <div class="flex gap-3 lg:block">
                            <p class="font-medium text-sm leading-7 text-black">Status
                            </p>
                            <p
                                class="font-medium text-sm leading-6 <?php echo $value["ma_trang_thai"] == 4 ? "bg-red-400 text-white" : "bg-emerald-50 text-emerald-600" ?> whitespace-nowrap py-0.5 px-3 rounded-full lg:mt-3  ">
                                <?php echo $value["ten_trang_thai"] ?>
                            </p>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <button type="button"
                            class="rounded-full bg-indigo-600 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a
                                href="index.php?chi_tiet&ma_dh=<?php echo $value["ma_dh"] ?>">Xem chi tiết</a></button>
                    </div>
                    <?php
                    if ($value["status"] == 0) {


                        ?>
                        <div class="px-2 py-2 bg-red-600 text-white rounded-lg">
                            <?php echo $value["status"] == 0 ? "Khách hàng đã hủy" : "" ?>
                        </div>
                    <?php } ?>
                    <?php
                    if ($value["ma_trang_thai"] != 4) {

                        ?>
                        <select class="ma_trang_thai" name="ma_trang_thai" id="ma_trang_thai"
                            value="<?php echo $value["ma_trang_thai"] ?>">
                            <?php foreach ($list_trang_thai as $key => $value1) {

                                ?>
                                <option value="<?php echo $value1["id"] ?>" <?php echo $value1["id"] == $value["ma_trang_thai"] ? "selected" : "" ?>>
                                    <?php echo $value1["ten_trang_thai"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>

            </div>
            <!-- <div class="w-full px-3 min-[400px]:px-6">
                <?php
                $list_sp_in_dh = get_product_by_ma_dh($value["ma_dh"]);
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


            </div> -->
            <div class="w-full border-t border-gray-200 px-6 flex flex-col lg:flex-row items-center justify-between ">
                <div class="flex flex-col sm:flex-row items-center max-lg:border-b border-gray-200">
                    <!-- <a href="index.php?deteteItemDH&ma_dh=<?php echo $value["ma_dh"] ?>" onclick='return confirmDelete()'
                        class="flex outline-0 py-6 sm:pr-6  sm:border-r border-gray-200 whitespace-nowrap gap-2 items-center justify-center font-semibold group text-lg text-black bg-white transition-all duration-500 hover:text-indigo-600">
                        <svg class="stroke-black transition-all duration-500 group-hover:stroke-indigo-600"
                            xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M5.5 5.5L16.5 16.5M16.5 5.5L5.5 16.5" stroke="" stroke-width="1.6"
                                stroke-linecap="round" />
                        </svg>
                        Delete Order
                    </a> -->
                    <p class="font-medium text-lg text-gray-900 pl-6 py-3 max-lg:text-center">
                        <?php echo $value["thanh_toan"] ?>
                    </p>
                </div>
                <p class="font-semibold text-lg text-black py-6">Tổng: <span class="text-indigo-600">
                        VND
                        <?php echo number_format(round(floatval($value["tong_tien_dh"]), 2), 2) ?>
                    </span></p>
            </div>

        </div>

    <?php } ?>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete");
    }

    const trangThaiSelects = document.querySelectorAll('select[name="ma_trang_thai"]');
    const listMaDonHang = document.querySelectorAll('.ma_dh_list');

    console.log("trangThaiSelects: ", trangThaiSelects);
    console.log("listMaDonHang: ", listMaDonHang);

    trangThaiSelects.forEach((select, index) => {
        select.addEventListener('change', function () {
            const selectedValue = select.value; // Lấy giá trị của option đã chọn
            const ma_dh = listMaDonHang[index].innerText;

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