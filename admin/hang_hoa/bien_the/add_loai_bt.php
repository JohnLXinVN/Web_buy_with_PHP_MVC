<!-- <script>
    $().ready(function () {
        $("#add_loai_hang").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {
                "ten_loai": {
                    required: true,
                }


            },
            messages: {
                "ten_loai": {
                    required: "Bắt buộc nhập tên hàng hóa",
                },

            }
        });
    });

</script> -->

<?php
$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $currentURL;
$url_ds_bt = str_replace("add_bien_the", "list_loai_bt", $currentURL);
$url_action_add_bt = str_replace("add_bien_the", "btn_add_loai_bt", $currentURL);

?>

<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Loại hàng</h1>
        <p class="mt-2 text-sm text-gray-700">Thêm loại hàng</p>
    </div>

</div>
<form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="add_loai_hang" action="<?php echo $url_action_add_bt ?>">
    <input type="hidden" name="ma_hh" id="ma_hh" value="<?php echo $ds_loai_bt[0]["ma_hh"] ?>">
    <span>Thêm mới</span>
    <div class="flex flex-col">
        <div class="flex flex-col">
            <div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Loại biến thể</label>
                    <div class="mt-1">
                        <input type="text" id="ten_loai" name="ten_loai" autocomplete="family-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Đơn giá(VND)</label>
                    <div class="mt-1">
                        <input type="text" id="don_gia" name="don_gia" autocomplete="family-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                    </div>
                </div>
            </div>
            <div class="flex flex-row mt-4">
                <button type="submit"
                    class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Thêm mới</button>
                <a href="<?php echo $url_ds_bt ?>"
                    class="min-w-[100px] ml-2 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Danh sách</a>
            </div>
        </div>
        <span class="text-red-500">
            <?php echo $error_message ? $error_message : "" ?>
        </span>
    </div>


</form>