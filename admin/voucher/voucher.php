<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Voucher</h1>
        <p class="mt-2 text-sm text-gray-700">Quản lý voucher</p>
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
                            <th class="py-2 px-4 border-b">Tên voucher</th>
                            <th class="py-2 px-4 border-b">Mã voucher</th>
                            <th class="py-2 px-4 border-b">Giảm giá</th>
                            <th class="py-2 px-4 border-b">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mỗi voucher -->
                        <tr>
                            <td class="py-2 px-4 border-b">Voucher 1</td>
                            <td class="py-2 px-4 border-b">ABC123</td>
                            <td class="py-2 px-4 border-b">10%</td>
                            <td class="py-2 px-4 border-b">
                                <!-- Nút sửa -->
                                <button
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mr-2">Sửa</button>
                                <!-- Nút xóa -->
                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Xóa</button>
                            </td>
                        </tr>
                        <!-- Kết thúc mỗi voucher -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>