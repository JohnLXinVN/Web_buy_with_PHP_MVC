<script>
    $().ready(function () {
        $("#edit_bt").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {
                "ten_loai": {
                    required: true,
                },
                "don_gia": {
                    required: true,
                    number: true,
                    min: 0.01
                },
                "tong_so_luong": {
                    required: true,
                    digits: true,
                    min: 1
                }


            },
            messages: {
                "ten_loai": {
                    required: "Bắt buộc nhập tên hàng hóa",
                },
                "don_gia": {
                    required: "Vui lòng nhập đơn giá",
                    number: "Vui lòng nhập một số hợp lệ",
                    min: "Đơn giá phải lớn hơn 0"
                },
                "tong_so_luong": {
                    required: "Vui lòng nhập tổng số lượng",
                    digits: "Vui lòng nhập số nguyên hợp lệ",
                    min: "Tổng số lượng phải lớn hơn 0"
                }

            }
        });
    });

</script>


<?php
$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $currentURL;
$url_ds_bt = str_replace("add_bien_the", "list_loai_bt", $currentURL);
$url_action_add_bt = str_replace("edit_loai_bt", "btn_edit_loai_bt", $currentURL);

?>
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Loại hàng</h1>
        <p class="mt-2 text-sm text-gray-700">Sửa loại hàng</p>
    </div>

</div>
<form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="edit_bt" action="<?php echo $url_action_add_bt ?>">
    <input type="hidden" name="ma_hh" id="ma_hh" value="<?php echo $ds_loai_bt[0]["ma_hh"] ?>">
    <span>Thêm mới</span>
    <div class="flex flex-col">
        <div class="flex flex-col">
            <div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Loại biến thể</label>
                    <div class="mt-1">
                        <input type="text" id="ten_loai" value="<?php echo $data_edit["ten_loai"] ?>" name="ten_loai"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Đơn giá(VND)</label>
                    <div class="mt-1">
                        <input type="text" id="don_gia" name="don_gia" value="<?php echo $data_edit["gia"] ?>"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tổng số lượng</label>
                    <div class="mt-1">
                        <input type="text" id="tong_so_luong" name="tong_so_luong"
                            value="<?php echo $data_edit["tong_so_luong"] ?>" autocomplete="family-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>
            </div>
            <div class="flex flex-row mt-4">
                <button type="submit"
                    class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Sửa</button>
                <a href="index.php?list_loai_bt"
                    class="min-w-[100px] ml-2 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Danh sách</a>
            </div>
        </div>
        <span class="text-red-500">
            <?php echo $error_message ? $error_message : "" ?>
        </span>
</form>