<?php
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require_once("../../dao/pdo.php");
require_once("../../dao/bien_the.php");
require_once("../../dao/favourite.php");
require("../../global.php");

$userLogin = null;
if (isset($_COOKIE['user'])) {
    $userCookie = $_COOKIE['user'];
    $userLogin = unserialize($userCookie);
}

if (exist_param("yeu_thich")) {
    if ($userLogin !== null && isset($userLogin['ma_kh'])) {
        $ma_kh = $userLogin['ma_kh'];
    } else {
        $ma_kh = null; // Hoặc giá trị mặc định khác nếu cần thiết
    }

    $check = kiem_tra_hh_yt($ma_kh);
    $ds_yt = hang_hoa_yt_select_ma_kh($ma_kh);
    $VIEW_NAME = "../favourite/favourite_product_ui.php";
} else if (exist_param("add_favourite")) {
    $ma_hh = $_POST['ma_hh'];
    $ma_kh = $userLogin['ma_kh'];

    hang_hoa_yt_insert($ma_hh, $ma_kh);

    $check = kiem_tra_hh_yt($ma_kh);
    $ds_yt = hang_hoa_yt_select_ma_kh($ma_kh);

    $VIEW_NAME = "../favourite/favourite_product_ui.php";
} else if (exist_param("remove_favourite")) {
    $id = $_GET['id'];

    remove_hang_hoa_yt($id);

    

    if ($userLogin !== null && isset($userLogin['ma_kh'])) {
        $ma_kh = $userLogin['ma_kh'];
    } else {
        $ma_kh = null; // Hoặc giá trị mặc định khác nếu cần thiết
    }

    $check = kiem_tra_hh_yt($ma_kh);
    $ds_yt = hang_hoa_yt_select_ma_kh($ma_kh);

    $VIEW_NAME = "../favourite/favourite_product_ui.php";
} else {
    $ma_kh = ($userLogin != null) ? $userLogin['ma_kh'] : null;

    if ($ma_kh != null) {
        $check = kiem_tra_hh_yt($ma_kh);
        $ds_yt = hang_hoa_yt_select_ma_kh($ma_kh);
    } else {
        // Không có người dùng đăng nhập
        $check = false;
        $ds_yt = array();
        header("../trang_chu/index.php");
        exit();
    }

    $VIEW_NAME = "../favourite/favourite_product_ui.php";
}

require("../layout.php");








