<?php
require_once ("../../dao/pdo.php");
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/loai_hang.php");
require_once ("../../dao/bien_the.php");
// require_once ("../../dao/gio_hang.php");
require_once ("../../dao/tin_tuc.php");
require_once ("../../dao/favourite.php");
require ("../../global.php");
// extract($_REQUEST);

$userLogin = null;
if (isset($_COOKIE['user'])) {
    $userCookie = $_COOKIE['user'];

    $userLogin = unserialize($userCookie);
}

$ds_hang_hoa_top_10 = hang_hoa_select_top10();

$listt = tin_tuc_select_all();

$ds_loai_hang = loai_selectall();

$ds_hang_hoa = hang_hoa_select_all();



$ds_hang_hoa_moi_nhat = hang_hoa_select_newest();

$favourite = hang_hoa_yt_select_all();

// $ds_sp_cart_header = get_all_item_in_cart($userLogin["ma_kh"]);

// print_r($ds_sp_cart_header);



if (exist_param("gioi_thieu")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/gioi_thieu.php";

} elseif (exist_param("lien_he")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/lien_he.php";

} elseif (exist_param("gop_y")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/gop_y.php";

} elseif (exist_param("nhan_dien")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/nhan_dien.php";

} else {

    $ds_hang_hoa_top_10 = hang_hoa_select_top10();
    $ds_hang_hoa = hang_hoa_select_all();

    $VIEW_NAME = "trang_chu/home.php";
}

require ("../layout.php");

?>