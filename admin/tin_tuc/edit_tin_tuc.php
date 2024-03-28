<script>
    $().ready(function() {
        $.validator.addMethod("beforeCurrentDate", function(value, element) {
            var inputDate = new Date(value);
            var currentDate = new Date();
            return inputDate < currentDate;
        }, "Vui lòng nhập ngày trước thời gian hiện tại.");

        $("#addTT").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {
                "tieu_de": {
                    required: true,
                },
                "mo_ta": {
                    required: true,
                },
                "hinh": {
                    required: true,
                },
                "noi_dung": {
                    required: true,
                },
                "tac_gia": {
                    required: true,
                },
                "ngay_xuat_ban": {
                    required: true,
                    beforeCurrentDate: true,
                },


            },
            messages: {
                "tieu_de": {
                    required: "Bắt buộc nhập",
                },
                "mo_ta": {
                    required: "Bắt buộc nhập",
                },
                "hinh": {
                    required: "Bắt buộc nhập",
                },
                "noi_dung": {
                    required: "Bắt buộc nhập",
                },
                "tac_gia": {
                    required: "Bắt buộc nhập",
                },
                "ngay_xuat_ban": {
                    required: "Bắt buộc nhập",
                },
            }
        });
    });
</script>


<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Tin Tức</h1>
        <p class="mt-2 text-sm text-gray-700">Sửa Tin Tức</p>
    </div>

</div>
<form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="addTT" enctype="multipart/form-data" action="index.php">


    <div class="mt-10 border-t border-gray-200 pt-10">

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Tiêu Đề</label>
                <input type="hidden" name="id_tin_tuc" value="<?= $tt['id_tin_tuc'] ?>">
                <div class="mt-1">
                    <input type="text" id="tieu_de" name="tieu_de" value="<?= $tt['tieu_de'] ?>" autocomplete="given-name" class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>
            <div class="">
                <label class="block text-sm font-medium text-gray-700">Mô Tả</label>
                <div class="mt-1">
                    <input type="text" name="mo_ta" id="mo_ta" value="<?= $tt['mo_ta'] ?>" class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Nội Dung</label>
                <div class="mt-1">
                    <textarea type="text" rows="4" name="noi_dung" id="noi_dung" value="<?= $tt['noi_dung'] ?>" class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm"></textarea>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Hình:</label>
                <input id="hinh" name="hinh" type="file" class="" value="<?= $tt["hinh"] ?>">
                <input id="hinh_no_load" name="hinh_no_load" type="text" hidden value="<?php echo $tt["hinh"] ?>">
                <img src="/upload/<?php echo $tt["hinh"] ?>" alt="" class="w-[40px] h-[40px] mt-4">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Ngày Xuất Bản</label>
                <div class="mt-1">
                    <input type="date" id="ngay_xuat_ban" name="ngay_xuat_ban" value="<?= $tt['ngay_xuat_ban'] ?>" autocomplete="given-name" class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tác Giả</label>
                <div class="mt-1">
                    <input type="text" id="tac_gia" name="tac_gia" value="<?= $tt['tac_gia'] ?>" autocomplete="family-name" class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Danh Mục</label>
                <div class="mt-1">
                    <select id="id_danh_muc" name="id_danh_muc" autocomplete="country-name" class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                        <?php
                        foreach ($ds_dm as $dm) {
                            $id_dm = $tt['id_danh_muc'];
                            $selected = "";
                            if ($dm['id'] === $id_dm) {
                                $selected = "selected";
                            }
                        ?>
                            <option value="<?= $dm['id'] ?>" <?= $selected ?>>
                                <?= $dm['ten_danh_muc'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>
        <button type="submit" name="btn_edit_tin_tuc" class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Sửa</button>
        <a href="?list_tin_tuc" class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Danh sách</a>
</form>