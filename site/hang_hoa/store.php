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
// $hien_thi_so_trang = hien_thi_so_trang_ds_sp_main($tong_sp, $soluongsp);
$userLogin = null;
if (isset($_COOKIE['user'])) {
    $userCookie = $_COOKIE['user'];
    $userLogin = unserialize($userCookie);
}

if (exist_param("san_pham")) {
    if ($userLogin !== null && isset($userLogin['ma_kh'])) {
        $ma_kh = $userLogin['ma_kh'];
    } else {
        $ma_kh = null; // Hoặc giá trị mặc định khác nếu cần thiết
    }
    $check = kiem_tra_hh_yt($ma_kh);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $soluongsp = 9;

    $ds_hang_hoa = get_dssp_all($page, $soluongsp);
    $tong_sp= hang_hoa_select_all();
    $hien_thi_so_trang = hien_thi_so_trang_ds_sp_main($tong_sp, $soluongsp);

    // $tong_sp = get_dssp();
    // $hien_thi_so_trang = hien_thi_so_trang($tong_sp, $soluongsp);
    $VIEW_NAME = "hang_hoa/store_ui.php";

} else if (exist_param("ma_loai")) {
    if ($userLogin !== null && isset($userLogin['ma_kh'])) {
        $ma_kh = $userLogin['ma_kh'];
    } else {
        $ma_kh = null; // Hoặc giá trị mặc định khác nếu cần thiết
    }

    $check = kiem_tra_hh_yt($ma_kh);

    $ma_loai = $_GET['ma_loai'];

    // if (!isset($_GET['page'])) {
    //     $page = 1;
    // } else {
    //     $page = $_GET['page'];
    // }

    // $soluongsp = 4;
    // $ds_hang_hoa = get_hang_hoa_select_by_loai($ma_loai,$page, $soluongsp);
    // $tong_sp = hang_hoa_select_by_ma_loai_all();
    // $hien_thi_so_trang_ma_loai = hien_thi_so_trang_ma_loai($tong_sp, $soluongsp);

    $hang_hoa_new = hang_hoa_select_by_loai($ma_loai);
    $VIEW_NAME = "hang_hoa/store_ui.php";
} else {

    if ($userLogin !== null && isset($userLogin['ma_kh'])) {
        $ma_kh = $userLogin['ma_kh'];
    } else {
        $ma_kh = null; // Hoặc giá trị mặc định khác nếu cần thiết
    }

    $check = kiem_tra_hh_yt($ma_kh);
    $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "store_ui.php";
}


// $ds_loai_hang = loai_selectall();

require ("../layout.php");
