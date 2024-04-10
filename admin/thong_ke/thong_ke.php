<form action="index.php?includeDate" method="POST" class="grid grid-cols-1 items-end gap-x-6 gap-y-8 sm:grid-cols-12">
    <div class="sm:col-span-5">
        <div class="relative">
            <label for="name"
                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">Date
                from</label>
            <input type="date" name="dateFrom" id="dateFrom" value="<?php echo $dateFrom ?>"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>
    <div class="sm:col-span-5">
        <div class="relative">
            <label for="name"
                class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">Date
                To</label>
            <input type="date" name="dateTo" id="dateTo" value
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="sm:col-span-2">
        <button on:click=""
            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i
                class="fa-solid fa-magnifying-glass"></i>Lọc</button>
    </div>
</form>

<div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="flex w-full justify-center">

            <?php require "chart.php" ?>

        </div>

        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-300">


                    <thead class="bg-gray-50">


                        <tr>


                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Loại hàng</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Số lượng</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Doanh thu</th>





                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php
                        foreach ($ds_loai_hang_thong_ke as $key => $value) {

                            echo "<tr>";
                            echo "<td class='whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>" . $value["ten_loai"] . "</td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . $value["so_luong"] . "</td>";
                            echo "<td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>" . number_format(round(floatval($value["doanh_thu"]), 2), 2) . "</td>";

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

<script>
    // Lấy ngày hôm nay
    var today = new Date();

    // Định dạng ngày tháng
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    // Gán giá trị mặc định cho trường ngày
    var dateToField = document.getElementById("dateTo");
    dateToField.value = yyyy + '-' + mm + '-' + dd;
</script>