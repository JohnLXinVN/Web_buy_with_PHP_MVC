<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="demoValidation.js" type="text/javascript"></script>
<script>
    $().ready(function () {
        $("#login_user").validate({
            onfocusout: true,
            onkeyup: true,
            onclick: true,
            rules: {

                "email": {
                    required: true,
                    email: true
                }, "ho_ten": {
                    required: true,
                    minlength: 3,
                }


            },
            messages: {
                "email": {
                    required: "Trường bắt buộc",
                    email: "Phải là email hợp lệ"
                },
                "ho_ten": {
                    required: "Trường bắt buộc",

                    minlength: "Tối thiểu 3 ký tự",
                }


            }
        });
    });
</script>

<form action="index.php?edit_user_login" id="login_user" method="post" enctype="multipart/form-data">
    <div class="w-full flex justify-center">
        <img src="../../upload/<?php echo $userLogin['hinh'] ?>" alt="" class="w-[50px] h-[50px]">
    </div>

    <input type="text" name="ma_kh" id="ma_kh" hidden value="<?php echo $userLogin['ma_kh'] ?>">
    <div class="mb-4">
        <label for="user_name" class=" block mb-2 text-sm font-medium text-white">Tên người dùng:</label>
        <input type="text" name="user_name" id="user_name" placeholder="User name"
            class="border-gray-300 focus:ring-indigo-500 disabled focus:border-indigo-500 block w-full p-2 rounded-md"
            value="<?php echo $userLogin['user_name'] ?>">
    </div>
    <div class="mb-4">
        <label for="email" class="block mb-2 text-sm font-medium text-white">Email:</label>
        <input type="email" name="email" placeholder="Email" value="<?php echo $userLogin['email'] ?>"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 rounded-md" required>
    </div>


    <div class="mb-4">
        <label for="ho_ten" class="block mb-2 text-sm font-medium text-white">Họ và tên:</label>
        <input type="text" name="ho_ten" id="ho_ten" placeholder="Họ tên" value="<?php echo $userLogin['ho_ten'] ?>"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="image" class="block mb-2 text-sm font-medium text-white">Hình ảnh:</label>
        <input type="file" name="hinh" id="hinh" value="<?php echo $userLogin['hinh'] ?>"
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-white block w-full p-2 rounded-md">
    </div>



    <div class="text-center">
        <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 h-[40px]  rounded hover:bg-blue-600 focus:outline-none">Cập
            nhật</button>
        <a href="/"
            class="bg-green-400 text-white px-4 py-2 h-[40px] inline-flex rounded hover:bg-yellow-300 focus:outline-none">Trang
            chủ</a>
    </div>

</form>