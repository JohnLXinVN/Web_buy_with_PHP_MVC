<style>
    .example_text {

        white-space: nowrap;
        /* Ngăn văn bản xuống dòng */
        overflow: hidden;
        /* Ẩn phần văn bản vượt qua khung */
        text-overflow: ellipsis;
        /* Hiển thị dấu ba chấm */

    }
</style>
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Hàng Hóa</h1>
        <p class="mt-2 text-sm text-gray-700">Quản lý hàng hóa</p>
    </div>

    <form class="mt-4 sm:mt-4 sm:flex-none" action="loai_hang.php" method="POST">
        <div class="flex">
            <a href="index.php?add_loai_hang" type="button"
                class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Thêm mới</a>
        </div>
    </form>
</div>
<div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 text-left pl-2 border-b">Tiêu đề</th>
                            <th class="py-2 text-left pl-2 border-b">Ngày đăng</th>
                            <th class="py-2 text-left pl-2 border-b">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mỗi tin tức -->
                        <tr>
                            <td class="py-2 px-4 border-b">Tiêu đề tin tức</td>
                            <td class="py-2 px-4 border-b">2024-03-15</td>
                            <td class="py-2 px-4 border-b">
                                <!-- Nút sửa -->
                                <button
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mr-2">Sửa</button>
                                <!-- Nút xóa -->
                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Xóa</button>
                            </td>
                        </tr>
                        <!-- Kết thúc mỗi tin tức -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>