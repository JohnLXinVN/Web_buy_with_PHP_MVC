<style>
    p {

        display: -webkit-box;
        -webkit-line-clamp: 1;
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
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 min-w-[150px]">
                                Tên hàng hóa</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">

                                Giảm giá</th>

                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Mô tả</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Desc</th>

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
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Số Lượng</th>


                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">

                                <span class="">Action</s pan>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php
                        foreach ($ds_hang_hoa as $hang_hoa) { ?>
                            <!-- print_r($hang_hoa); -->

                            <tr>
                                <td class=' py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>
                                    <p>
                                        <?php echo $hang_hoa["ten_hh"]; ?>
                                    </p>
                                </td>
                                <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>
                                    <?php echo $hang_hoa["giam_gia"]; ?>
                                </td>
                                <td class=' px-3 py-4 text-sm text-gray-500 w-[250px]'>
                                    <p class=''>
                                        <?php echo $hang_hoa["mo_ta"]; ?>
                                    </p>
                                </td>
                                <td class=' px-3 py-4 text-sm text-gray-500 w-[250px]'>
                                    <p class=''>
                                        <?php echo $hang_hoa["desc"]; ?>
                                    </p>
                                </td>
                                <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>
                                    <?php echo $hang_hoa["ngay_nhap"]; ?>
                                </td>
                                <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>
                                    <?php echo $hang_hoa["luot_xem"]; ?>
                                </td>
                                <td>
                                    <?php echo $hang_hoa["ten_loai"]; ?>
                                </td>
                                <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>
                                    <?php echo ($hang_hoa["dac_biet"] == 1 ? "Đặc biệt" : "Không đặc biệt"); ?>
                                </td>
                                <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'><img class='w-[50px] h-[50px]'
                                        src='../../upload/<?php echo $hang_hoa["hinh"]; ?>' /></td>

                                <td
                                    class='relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6'>
                                    <a href="/admin/hang_hoa/bien_the/index.php?ma_hh=<?php echo $hang_hoa["ma_hh"] ?>&add_bien_the"
                                        type='button'
                                        class='mr-3 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                                        <i class='fa-solid fa-pencil'></i>
                                        Thêm biến thể
                                    </a>
                                    <a href='?ma_hh=<?php echo $hang_hoa["ma_hh"]; ?>&edit_hang_hoa' type='button'
                                        class='mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                                        <i class='fa-solid fa-pencil'></i>
                                        Sửa
                                    </a>
                                    <a href='?btn_delete&ma_hh=<?php echo $hang_hoa["ma_hh"]; ?>' type='button'
                                        onclick='return confirmDelete()'
                                        class=' ml-2 mb-1 inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                                        <i class='fa-solid fa-trash-can'></i>
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