<style>
    .store-pagination {
        float: right;
    }

    .store-pagination li {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        background-color: #fff;
        border: 1px solid #e4e7ed;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .store-pagination li+li {
        margin-left: 5px;
    }

    .store-pagination li:hover {
        background-color: #e4e7ed;
        color: #d10024;
    }

    .store-pagination li.active {
        background-color: #d10024;
        border-color: #d10024;
        color: #fff;
        font-weight: 500;
        cursor: default;
    }

    .store-pagination li a {
        display: block;
    }

    .store-qty {
        margin-right: 30px;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 12px;
    }

    .store-filter {
        margin-top: 30px;
    }
</style>

<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Loại hàng</h1>
        <p class="mt-2 text-sm text-gray-700">Quản lý loại hàng</p>
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
                                Mã loại hàng</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Tên loại Hàng</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">

                                <span class="sr-only">Edit</s pan>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php
                        foreach ($ds_loai_hang as $key => $value) {
                            # code...
                            echo "<tr>";
                            echo "<td";
                            echo " class='whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>";
                            echo $value["ma_loai"] . "</td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>";
                            echo $value["ten_loai"] . "</td>";
                            echo "<td class='relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6'>";
                            echo "<a href='?ma_loai=" . $value["ma_loai"] . "&edit_loai_hang' type='button' class='mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>";
                            echo "<i class='fa-solid fa-pencil'></i>";
                            echo "Sửa";
                            echo "</a>";
                            echo "<a href='?btn_delete&ma_loai=" . $value["ma_loai"] . "' type='button' onclick='return confirmDelete()' class=' ml-2 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>";
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

<div class="store-filter clearfix">
    <ul class="store-pagination">

        <?php
        echo $hien_thi_so_trang;
        ?>


    </ul>
</div>