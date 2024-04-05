<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="demoValidation.js" type="text/javascript"></script>
<script>
    $().ready(function () {
        $("#add_user").validate({
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
                    maxlength: 16
                },

                "re_mat_khau": {
                    equalTo: "#mat_khau",
                    minlength: 3,
                    maxlength: 16
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
                "re_mat_khau": {
                    equalTo: "Nhập lại không trùng",
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


<form action="index.php?submit_signup" id="add_user" class="px-2 py-4" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="user_name" class=" block mb-2 text-sm font-medium text-white">Tên người dùng:</label>
        <input type="text" name="user_name" id="user_name" placeholder="User name"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block mb-2 text-sm font-medium text-white">Email:</label>
        <input type="email" name="email" placeholder="Email"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="ho_ten" class="block mb-2 text-sm font-medium text-white">Họ và tên:</label>
        <input type="text" name="ho_ten" id="ho_ten" placeholder="Họ tên"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="image" class="block mb-2 text-sm font-medium text-white">Hình ảnh:</label>
        <input type="file" name="image" id="image"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-white block w-full p-2 rounded-md">
    </div>

    <div class="mb-4">
        <label for="mat_khau" class="block mb-2 text-sm font-medium text-white">Mật khẩu:</label>
        <input type="password" name="mat_khau" id="mat_khau" placeholder="Mật khẩu"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 rounded-md">
    </div>
    <div class="mb-4">
        <label for="mat_khau" class="block mb-2 text-sm font-medium text-white">Nhập Lại Mật khẩu:</label>
        <input type="password" name="re_mat_khau" id="re_mat_khau" placeholder="Mật khẩu"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 rounded-md">
    </div>
    <input type="hidden" name="vai_tro" id="vai_tro" value="0">
    <input type="hidden" name="kich_hoat" id="kich_hoat" value="1">
    <div class="mt-6 flex items-center justify-between">
        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Đăng ký</button>
        <a href="index.php?login" class=" text-blue-500">Đã có tài khoản</a>

    </div>
</form>