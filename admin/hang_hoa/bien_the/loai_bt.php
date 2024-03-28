<?php
$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_add_bt = str_replace("list_loai_bt", "add_bien_the", $currentURL);

$vi_tri = strpos($currentURL, "&");
$url_check;
if ($vi_tri !== false) {
    $url_check = substr($currentURL, 0, $vi_tri + 1);
}


?>
<div class="sm:flex sm:items-center justify-between">
    <div>
        <a href="/admin/hang_hoa/index.php?list_hang_hoa" type="button"
            class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Danh sách hàng hóa</a>
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Loại biến thể</h1>
            <p class="mt-2 text-sm text-gray-700">
                <?php echo $ds_loai_bt[0]["ten_hh"] ?>
            </p>
        </div>
    </div>

    <form class="mt-4 sm:mt-4 sm:flex-none" action="loai_hang.php" method="POST">
        <div class="flex">
            <a href="<?php echo $url_add_bt ?>" type="button"
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
                                Mã loại</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Tên loại biến thể</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Giá</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">

                                <span class="sr-only">Edit</s pan>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php
                        foreach ($ds_loai_bt as $key => $value) {
                            # code...
                            echo "<tr>";
                            echo "<td";
                            echo " class='whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>";
                            echo $value["id"] . "</td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>";
                            echo $value["ten_loai"] . "</td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>";
                            echo $value["gia"] . "</td>";
                            echo "<td class='relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6'>";
                            echo "<a href='" . $url_check . "ma_bien_the=" . $value["id"] . "&edit_loai_bt' type='button' class='mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>";
                            echo "<i class='fa-solid fa-pencil'></i>";
                            echo "Sửa";
                            echo "</a>";
                            echo "<a href='" . $url_check . "btn_delete&ma_bien_the=" . $value["id"] . "' type='button' onclick='return confirmDelete()' class=' ml-2 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>";
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