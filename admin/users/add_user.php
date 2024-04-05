<script>
    $().ready(function () {
        $("#add_loai_hang").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {
                "user_name": {
                    required: true,
                },
                "mat_khau": {
                    required: true,
                    minlength: 3,
                    maxlength: 16,
                },
                "email": {
                    required: true,
                    email: true
                },
                "ho_ten": {
                    required: true,
                    pattern: /^[A-Za-z\s]+$/,
                    minlength: 3,
                    maxlength: 30
                }


            },
            messages: {
                "user_name": {
                    required: "Bắt buộc nhập",
                },
                "mat_khau": {
                    required: "Bắt buộc nhập",
                    minlength: "Nhập ít nhất 3 ký tự",
                    maxlength: "Nhập ít hơn 16 ký tự"
                },
                "email": {
                    required: "Bắt buộc nhập",
                    email: "Bắt buộc là email"
                },
                "ho_ten": {
                    required: "Bắt buộc nhập",
                    pattern: "Chỉ chứa chữ cái và khoảng trắng",
                    minlength: "Nhập ít nhất 3 ký tự",
                    maxlength: "Nhập ít hơn 30 ký tự"
                }

            }
        });
    });

</script>



<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">User</h1>
        <p class="mt-2 text-sm text-gray-700">Thêm người dùng mới</p>
    </div>

</div>
<form class="mt-4 sm:mt-4 sm:flex-none" method="POST" enctype="multipart/form-data" action="index.php">


    <div class="mt-10 border-t border-gray-200 pt-10">

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">User
                    name</label>
                <div class="mt-1">
                    <input type="text" id="user_name" name="user_name" autocomplete="given-name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Mật
                    khẩu</label>
                <div class="mt-1">
                    <input type="password" id="mat_khau" name="mat_khau" autocomplete="family-name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                </div>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Họ
                    tên</label>
                <div class="mt-1">
                    <input type="text" name="ho_ten" id="ho_ten"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Chọn tệp hình:</label>

                <input id="image" name="image" type="file" class="">

            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">

                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <div class="mt-1">
                    <select id="vai_tro" name="vai_tro" autocomplete="country-name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
            </div>



            <div>
                <label class="block text-sm font-medium text-gray-700">Kích
                    hoạt</label>
                <div class="mt-1">
                    <select id="kich_hoat" name="kich_hoat" autocomplete="country-name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus-visible:outline-none border-2 px-1 py-2 sm:text-sm">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Khóa</option>
                    </select>
                </div>
            </div>


        </div>
        <button type="submit" name="btn_add_users"
            class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Thêm</button>
        <a href="?list_users"
            class="mt-4 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Danh sách</a>
</form>