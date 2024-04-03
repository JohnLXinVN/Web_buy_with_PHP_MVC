<style>
    .example_text {

        white-space: nowrap;
        /* Ngăn văn bản xuống dòng */
        overflow: hidden;
        /* Ẩn phần văn bản vượt qua khung */
        text-overflow: ellipsis;
        /* Hiển thị dấu ba chấm */

    }

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

.store-pagination li + li {
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

.store-filter{
    margin-top: 30px;
}
</style>
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Danh Mục Tin Tức</h1>
        <p class="mt-2 text-sm text-gray-700">Quản lý Danh Mục Tin Tức</p>
    </div>

    <form class="mt-4 sm:mt-4 sm:flex-none" action="loai_hang.php" method="POST">
        <div class="flex">
            <a href="index.php?add_danh_muc" type="button" class="min-w-[100px]  rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Id Danh Mục</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Tên Danh Mục</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">

                                <span class="">Action</s pan>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php
                        foreach ($ds_dm as $dm) {
                        ?>
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $dm["id"] ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $dm["ten_danh_muc"] ?></td>

                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="?id=<?= $dm["id"] ?>&edit_danh_muc" type="button" class="mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        <i class="fa-solid fa-pencil"></i>
                                        Sửa
                                    </a>
                                    <a href="?btn_delete&id=<?= $dm["id"] ?>" type="button" onclick="return confirmDelete()" class="ml-2 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php
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
					<span class="store-qty">Showing 20-100 products</span>
					<ul class="store-pagination">

						<?php
						echo $hien_thi_so_trang;
						?>


					</ul>
				</div>