<script>
    $().ready(function () {
        $.validator.addMethod("beforeCurrentDate", function (value, element) {
            var inputDate = new Date(value);
            var currentDate = new Date();
            return inputDate < currentDate;
        }, "Vui lòng nhập ngày trước thời gian hiện tại.");

        $("#editHH").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {
                "ten_hh": {
                    required: true,
                },
                "don_gia": {
                    required: true,
                    pattern: /^[1-9][0-9]*$/,
                },
                "mo_ta": {
                    required: true,
                },
                "giam_gia": {
                    required: true,
                    pattern: /^(0(\.\d+)?|1(\.0+)?)$/,
                },
                "hinh": {
                    required: true,
                },
                "ngay_nhap": {
                    required: true,
                    beforeCurrentDate: true,
                },


            },
            messages: {
                "ten_hh": {
                    required: "Bắt buộc nhập",
                },
                "don_gia": {
                    required: "Bắt buộc nhập",
                    pattern: "Vui lòng chỉ nhập số dương",
                },
                "mo_ta": {
                    required: "Bắt buộc nhập",
                },
                "giam_gia": {
                    required: "Bắt buộc nhập",
                    pattern: "Vui lòng chỉ nhập số 0-1",

                },
                "hinh": {
                    required: "Bắt buộc nhập",
                },
                "ngay_nhap": {
                    required: "Bắt buộc nhập",
                },
            }
        });
    });

</script>

<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Hàng hóa</h1>
        <p class="mt-2 text-sm text-gray-700">Sửa hàng hóa</p>
    </div>

</div>
<form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="editHH" enctype="multipart/form-data" action="index.php">

    <input type="hidden" id="ma_hh" name="ma_hh" value="<?php echo $data_edit["ma_hh"] ?>">
    <div class="mt-10 border-t border-gray-200 pt-10">

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Tên hàng hóa</label>
                <div class="mt-1">
                    <input type="text" id="ten_hh" name="ten_hh" autocomplete="given-name"
                        value="<?php echo $data_edit["ten_hh"] ?>"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Đơn giá</label>
                <div class="mt-1">
                    <input type="text" id="don_gia" name="don_gia" autocomplete="family-name"
                        value="<?php echo $data_edit["don_gia"] ?>"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Mô tả</label>
                <div class="mt-1">
                    <textarea type="text" rows="4" name="mo_ta" id="mo_ta"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm"><?php echo $data_edit["mo_ta"]; ?></textarea>
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Mô tả chi tiết</label>
                <div class="mt-1">
                    <textarea type="text" rows="4" name="desc" id="desc"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm"><?php echo $data_edit["desc"]; ?></textarea>
                </div>
            </div>
            <div class="">
                <label class="block text-sm font-medium text-gray-700">Giảm giá</label>
                <div class="mt-1">
                    <input type="text" name="giam_gia" id="giam_gia" value="<?php echo $data_edit["giam_gia"] ?>"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Hình:</label>

                <input id="hinh" name="hinh" type="file" class="" value="<?php echo $data_edit["hinh"] ?>">
                <input id="hinh_no_load" name="hinh_no_load" type="text" hidden class=""
                    value="<?php echo $data_edit["hinh"] ?>">
                <img src="/upload/<?php echo $data_edit["hinh"] ?>" alt="" class="w-[40px] h-[40px] mt-4">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Ngày Nhập</label>
                <div class="mt-1">
                    <input type="date" id="ngay_nhap" name="ngay_nhap" autocomplete="given-name"
                        value="<?php echo $data_edit["ngay_nhap"] ?>"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Lượt Xem</label>
                <div class="mt-1">
                    <input type="text" id="luot_xem" name="luot_xem" readonly
                        value="<?php echo $data_edit["luot_xem"] ?>" autocomplete="family-name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>



            <div>
                <label class="block text-sm font-medium text-gray-700">Đặc biệt</label>
                <div class="mt-1">
                    <select id="dac_biet" name="dac_biet" autocomplete="country-name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                        <option <?php echo $data_edit["dac_biet"] == 1 ? "selected" : "" ?> value="1">Đặc biệt</option>
                        <option <?php echo $data_edit["dac_biet"] == 0 ? "selected" : "" ?> value="0">Không đặc biệt
                        </option>
                    </select>
                </div>
            </div>



            <div>
                <label class="block text-sm font-medium text-gray-700">Mã loại</label>
                <div class="mt-1">
                    <select id="ma_loai" name="ma_loai" autocomplete="country-name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                        <?php
                        foreach ($ds_loai_hang as $key => $value) {
                            $selected = ($data_edit["ma_loai"] == $value['ma_loai']) ? 'selected' : '';
                            echo "<option $selected value='" . $value["ma_loai"] . "'>" . $value["ten_loai"] . "</option>";

                        }
                        ?>
                    </select>
                </div>
            </div>


        </div>
        <button type="submit" name="btn_edit_hang_hoa"
            class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Sửa</button>
        <a href="?list_hang_hoa"
            class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Danh sách</a>
</form>