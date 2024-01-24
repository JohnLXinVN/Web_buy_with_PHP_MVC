<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
// Mã PHP để tạo dữ liệu cho biểu đồ
$labels = [];
$data = [];
$backgroundColor = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)'
];

foreach ($ds_loai_hang_thong_ke as $value) {
    array_push($labels, $value["ten_loai"]);
    array_push($data, $value["so_luong"]);
}
?>

<!-- Mã HTML và JavaScript -->
<!-- <canvas id="myChart"></canvas> -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: <?php echo json_encode($labels); ?>,
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            }
        });
    });
</script>

<div class="w-[400px] h-[400px] ">
    <h1 class="pl-[5.5rem]">Biểu đồ thống kê</h1>
    <canvas id="myChart" class="w-[400px] h-[400px]"></canvas>
</div>