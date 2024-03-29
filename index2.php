<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    $Products=[
        [
            "id"=>"SP01",
            "name" => "Chocopie",
            "list"=>"CP001" ,
            "price" => 45000,
            "cost" => 30000
        ],
        [
            "id"=>"SP02",
            "name" => "Bánh quy Oreo",
            "list"=>"CP001" ,
            "price" => 20000,
            "cost" => 15000
        ],
        [
            "id"=>"SP03",
            "name" => "Bánh bông lan",
            "list"=>"CP001" ,
            "price" => 55000,
            "cost" => 35000
        ],
        [
            "id"=>"SP04",
            "name" => "Bánh su kem",
            "list"=>"CS003" ,
            "price" => 25000,
            "cost" => 15000
        ]
    ];

    $timKiemDanhMucList = isset($_GET['listDanhMuc']) ? $_GET['listDanhMuc'] : '';
    $filteredProducts = array_filter($Products, function ($product) use ($timKiemDanhMucList) {
        return strcasecmp($product['list'], $timKiemDanhMucList) === 0;
    });
    ?>

    <h2>Danh sách các sản phẩm</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục sản phẩm</th>
                <th>Giá bán sản phẩm</th>
                <th>Giá nhập sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Products as $product) { ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['list']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['cost']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Tìm kiếm sản phẩm theo danh mục</h2>
    <form method="GET" action="">
        <label for="listDanhMuc">Danh mục sản phẩm:</label>
        <input type="text" id="listDanhMuc" name="listDanhMuc">
        <input type="submit" value="Tìm kiếm">
    </form>

    <?php if (!empty($filteredProducts)) { ?>
        <h2>Danh sách kết quả tìm kiếm sản phẩm theo danh mục: <?php echo $timKiemDanhMucList; ?></h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Giá bán sản phẩm</th>
                    <th>Giá nhập sản phẩm</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($filteredProducts as $product) { ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['list']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['cost']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "Không tìm thấy sản phẩm trong danh mục: $timKiemDanhMucList";
    } ?>
</body>
</html>