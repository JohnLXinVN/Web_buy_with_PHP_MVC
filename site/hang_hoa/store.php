<?php
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/loai_hang.php");
require_once ("../../dao/bien_the.php");
require_once ("../../dao/pdo.php");
require_once ("../../dao/favourite.php");

require ("../../global.php");
$ds_loai_hang = loai_selectall();
$ds_hang_hoa_top_10 = hang_hoa_select_top10();
$hang_hoa_new = loadall_hang_hoa_store_all();
// $hien_thi_so_trang = hien_thi_so_trang($tong_sp,$soluongsp);
$userCookie = $_COOKIE['user'];
$userLogin = unserialize($userCookie);
if (exist_param("my_pham")) {
    $check = kiem_tra_hh_yt($userLogin["ma_kh"]);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $soluongsp = 9;
    $hang_hoa_new = loadall_hang_hoa_store($page, $soluongsp);
    $tong_sp = get_dssp();
    $hien_thi_so_trang = hien_thi_so_trang($tong_sp, $soluongsp);
    // $hien_thi_left = hien_thi_left($page);
    // $hien_thi_right = hien_thi_right($tong_sp,$soluongsp);
    $VIEW_NAME = "hang_hoa/store_ui.php";
    // $ma_loai = $_GET["ma_loai"];
    // $items = hang_hoa_select_by_loai($ma_loai);

} else {
    $VIEW_NAME = "store_ui.php";
    // $items = hang_hoa_select_all();
}


// $ds_loai_hang = loai_selectall();

require ("../layout.php");


?>