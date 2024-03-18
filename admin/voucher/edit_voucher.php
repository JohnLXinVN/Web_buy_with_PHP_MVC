<script>
    $().ready(function () {
        $("#edit_loai_hang").validate({
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

</script>
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Voucher</h1>
        <p class="mt-2 text-sm text-gray-700">Thêm voucher</p>
    </div>

</div>
<form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="add_loai_hang" action="index.php">
    <span>Thêm mới</span>
    <div class="flex flex-col">
        <div class="flex">
            <div class="">
                <label class="block text-sm font-medium text-gray-700">Tên voucher</label>
                <div class="mt-1">
                    <input type="text" name="giam_gia" id="giam_gia"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>
            <div class="ml-2">
                <label class="block text-sm font-medium text-gray-700">Mã voucher</label>
                <div class="mt-1">
                    <input type="text" name="giam_gia" id="giam_gia"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>
            <div class="ml-2">
                <label class="block text-sm font-medium text-gray-700">Giảm giá</label>
                <div class="mt-1">
                    <input type="text" name="giam_gia" id="giam_gia"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                </div>
            </div>

        </div>
        <div class="flex mt-3">
            <button name="btn_add_loai_hang"
                class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Thêm mới</button>
            <a href="?list_loai_hang"
                class="block w-fit ml-2 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Danh sách</a>
        </div>
        <span class="text-red-500">
            <?php echo $error_message ? $error_message : "" ?>
        </span>
    </div>


</form>