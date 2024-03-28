<?php
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require_once("../../dao/pdo.php");
require_once("../../dao/favourite.php");
require("../../global.php");
if (exist_param("yeu_thich")) {
    $ds_yt = hang_hoa_yt_select_all();

    $ma_kh = 12;

    $check = kiem_tra_hh_yt($ma_kh);

    $VIEW_NAME = "../favourite/favourite_product_ui.php";
} else if (exist_param("add_favourite")) {
    $ma_hh = $_POST['ma_hh'];
    $ma_kh = $_POST['ma_kh'];

    hang_hoa_yt_insert($ma_hh, $ma_kh);

    $ma_kh = 12;
    $check = kiem_tra_hh_yt($ma_kh);
    $ds_yt = hang_hoa_yt_select_all();  

    $VIEW_NAME = "../favourite/favourite_product_ui.php";
} else if (exist_param("remove_favourite")) {
    $id = $_GET['id'];

    remove_hang_hoa_yt($id);

    $ma_kh = 12;

    $check = kiem_tra_hh_yt($ma_kh);

    $ds_yt = hang_hoa_yt_select_all();
    $VIEW_NAME = "../favourite/favourite_product_ui.php";
} else {

    $ma_kh = 12;

    $check = kiem_tra_hh_yt($ma_kh);

    $ds_yt = hang_hoa_yt_select_all();
    $VIEW_NAME = "../favourite/favourite_product_ui.php";
}
require("../layout.php");
