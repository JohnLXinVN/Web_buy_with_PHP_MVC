<?php
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/loai_hang.php");
require_once ("../../dao/order.php");
require_once ("../../dao/binh_luan.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);

$ds_order = get_all_order();
if (exist_param("deteteItemDH")) {
    $ma_dh = $_GET["ma_dh"];
    delete_order_by_id($ma_dh);
    $ds_order = get_all_order();
    $list_trang_thai = list_trang_thai_don();
    $VIEW_NAME = "don_hang/list_don_hang.php";

} else if (exist_param("update_tt")) {
    $ma_trang_thai = $_POST["ma_trang_thai"];
    $ma_dh = $_POST["ma_dh"];
    update_tt($ma_trang_thai, $ma_dh);

} else if (exist_param("filter")) {
    $ma_tt = $_GET["ma_tt"];
    $list_trang_thai = list_trang_thai_don();
    if ($ma_tt == 0) {
        $ds_order = get_all_order();

    } else {
        $ds_order = get_all_order_filter($ma_tt);

    }
    $VIEW_NAME = "don_hang/list_don_hang.php";

} else if (exist_param("chi_tiet")) {
    $ma_dh = $_GET["ma_dh"];
    $list_trang_thai = list_trang_thai_don();

    $list_sp_in_dh = get_product_by_ma_dh($ma_dh);
    $infor_dh = get_order_by_ma_dh($ma_dh);

    $VIEW_NAME = "don_hang/chi_tiet_don.php";


} else {
    $ds_order = get_all_order();
    $list_trang_thai = list_trang_thai_don();
    $VIEW_NAME = "don_hang/list_don_hang.php";

}

require ("../layout.php");

?>