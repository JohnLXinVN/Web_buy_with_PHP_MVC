<?php
require_once("../../dao/hang_hoa.php");
// require_once("../../dao/hang_hoa_2.php");
require_once("../../dao/loai_hang.php");
require_once("../../dao/pdo.php");
require("../../global.php");
$ds_loai_hang = loai_selectall();
$ds_hang_hoa_top_10 = hang_hoa_select_top10();
$hang_hoa_new = loadall_hang_hoa_home();

if (exist_param("my_pham")) {
    $VIEW_NAME = "hang_hoa/store_ui.php";
    // $ma_loai = $_GET["ma_loai"];
    // $items = hang_hoa_select_by_loai($ma_loai);

} elseif (exist_param("my_pham_han")) {
    $VIEW_NAME = "hang_hoa/my_pham_han.php";
    // $kyw = $_GET["kyw"];
    // $items = hang_hoa_select_keyword($kyw);
}elseif (exist_param("my_pham_nhat")) {
    $VIEW_NAME = "hang_hoa/my_pham_nhat.php";
    // $kyw = $_GET["kyw"];
    // $items = hang_hoa_select_keyword($kyw);
}else {
    $VIEW_NAME = "store_ui.php";
    // $items = hang_hoa_select_all();
}

// $ds_loai_hang = loai_selectall();

require("../layout.php");


?>