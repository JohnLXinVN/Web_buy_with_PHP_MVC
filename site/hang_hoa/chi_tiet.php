<?php
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require_once("../../dao/pdo.php");
require("../../global.php");
$ds_loai_hang = loai_selectall();
$ds_hang_hoa_top_10 = hang_hoa_select_top10();

if (exist_param("ma_hh")) {
    // $ma_hh = $_GET["ma_hh"];

    // $item_hh = hang_hoa_select_by_id($ma_hh);
    // $ds_hang_hoa_tuong_tu = hang_hoa_select_by_loai($item_hh["ma_loai"]);
    // hang_hoa_tang_so_luot_xem($ma_hh);
    // $loai_hang = get_one_item($item_hh["ma_loai"]);
    $VIEW_NAME = "chi_tiet_ui.php";
}


require("../layout.php");


?>