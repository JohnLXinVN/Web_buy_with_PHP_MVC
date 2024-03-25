<style>
    p {

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;

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

                <table class="min-w-full divide-y divide-gray-300">


                    <thead class="bg-gray-50">


                        <tr>


                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Tên hàng hóa</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Giá</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">

                                Giảm giá</th>

                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Mô tả</th>

                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Ngày nhập</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Lượt xem</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Loại hàng</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Đặc biệt</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Hình</th>


                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">

                                <span class="">Action</s pan>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php
                        foreach ($ds_hang_hoa as $key => $value) {

                            echo "<tr>";
                            echo "<td class=' py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'><p>" . $value["ten_hh"] . "</p></td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $value["giam_gia"] . "</td>";
                            echo "<td class=' px-3 py-4 text-sm text-gray-500 w-[250px]'><p class='example_text'>" . $value["mo_ta"] . "</p></td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $value["ngay_nhap"] . "</td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $value["luot_xem"] . "</td>";
                            foreach ($ds_loai_hang as $key => $value1) {
                                if ($value1["ma_loai"] == $value["ma_loai"]) {
                                    echo "<td>" . $value1["ten_loai"] . "</td>";
                                }
                            }
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . ($value["dac_biet"] == 1 ? "Đặc biệt" : "Không đặc biệt") . "</td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'><img class='w-[50px] h-[50px]' src='../../upload/" . $value["hinh"] . "' /></td>";

                            echo "<td class='relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6'>";
                            echo "<a href='/admin/hang_hoa/bien_the/index.php?ma_hh=" . $value["ma_hh"] . "&add_bien_the' type='button' class='mr-3 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>";
                            echo "<i class='fa-solid fa-pencil'></i>";
                            echo "Thêm biến thể";
                            echo "</a>";
                            echo "<a href='?ma_hh=" . $value["ma_hh"] . "&edit_hang_hoa' type='button' class='mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>";
                            echo "<i class='fa-solid fa-pencil'></i>";
                            echo "Sửa";
                            echo "</a>";
                            echo "<a href='?btn_delete&ma_hh=" . $value["ma_hh"] . "' type='button' onclick='return confirmDelete()' class=' ml-2 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>";
                            echo "<i class='fa-solid fa-trash-can'></i>";
                            echo "Xóa";
                            echo "</a>";
                            echo "</td>";
                            echo "</tr>";
                        }

                        ?>


                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>