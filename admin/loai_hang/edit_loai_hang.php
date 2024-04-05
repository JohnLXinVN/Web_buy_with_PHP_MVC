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
        <h1 class="text-base font-semibold leading-6 text-gray-900">Loại hàng</h1>
        <p class="mt-2 text-sm text-gray-700">Sửa loại hàng</p>
    </div>

</div>
<form class="mt-4 sm:mt-4 sm:flex-none" method="POST" id="edit_loai_hang" action="index.php">
    <input type="text" class="hidden" name="ma_loai" id="ma_loai" value="<?php echo $data_edit["ma_loai"] ?>" <span>Sửa
    loại hàng</span>
    <div class="flex flex-col">
        <div class="flex">
            <input type="text" name="ten_loai" id="ten_loai" value="<?php echo $data_edit["ten_loai"] ?>"
                class="block w-full rounded-md border-0  mr-3 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm pl-2 " />
            <button type="submit" name="btn_edit_loai_hang"
                class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Sửa</button>
            <a href="index.php"
                class="min-w-[100px] ml-2 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Danh sách</a>
        </div>
        <span class="text-red-500">
            <?php echo $error_message ? $error_message : "" ?>
        </span>
    </div>
</form>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>