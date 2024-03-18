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

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Thêm mới tin tức</h1>

    <!-- Form thêm mới tin tức -->
    <form class="bg-white shadow-md rounded-md px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Tiêu đề:</label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="title" type="text" placeholder="Nhập tiêu đề">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Nội dung:</label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="content" rows="4" placeholder="Nhập nội dung"></textarea>
        </div>
        <div class="flex items-center justify-end">
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button">
                Thêm tin tức
            </button>
        </div>
    </form>
    <!-- Kết thúc form thêm mới tin tức -->
</div>