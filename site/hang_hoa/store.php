<?php
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require_once("../../dao/pdo.php");
require("../../global.php");
$ds_loai_hang = loai_selectall();
$ds_hang_hoa_top_10 = hang_hoa_select_top10();

if (exist_param("ma_loai")) {
    // $ma_loai = $_GET["ma_loai"];
    // $items = hang_hoa_select_by_loai($ma_loai);

} elseif (exist_param("kyw")) {
    // $kyw = $_GET["kyw"];
    // $items = hang_hoa_select_keyword($kyw);
} else {
    // $items = hang_hoa_select_all();
}

// $ds_loai_hang = loai_selectall();
$VIEW_NAME = "store_ui.php";

require("../layout.php");


?>