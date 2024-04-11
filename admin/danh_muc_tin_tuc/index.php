<?php
require_once ("../../dao/tin_tuc.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);

if (exist_param("add_danh_muc")) {
    $ds_dm = danh_muc_tin_tuc_sellect_all();

    $VIEW_NAME = "danh_muc_tin_tuc/add_danh_muc.php";
} else if (exist_param("list_danh_muc")) {

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $soluongsp = 5;

    $ds_dm = get_danh_muc_tin_tuc_sellect_all($page, $soluongsp);
    $tong_sp = danh_muc_tin_tuc_sellect_all();
    $hien_thi_so_trang = hien_thi_so_trang_ds_dm_tin_tuc($tong_sp, $soluongsp);

    $VIEW_NAME = "danh_muc_tin_tuc/danh_muc.php";
} else if (exist_param("btn_add_danh_muc")) {
    $ten_danh_muc = $_POST['ten_danh_muc'];
    danh_muc_tin_tuc_insert($ten_danh_muc);


    $ds_dm = danh_muc_tin_tuc_sellect_all();
    $VIEW_NAME = "danh_muc_tin_tuc/danh_muc.php";
} else if (exist_param("edit_danh_muc")) {

    $id = $_GET['id'];
    $danh_muc_id = danh_muc_tin_tuc_sellect_id($id);


    $VIEW_NAME = "danh_muc_tin_tuc/edit_danh_muc.php";
} else if (exist_param("btn_edit_danh_muc")) {
    $id = $_POST['id'];
    $ten_danh_muc = $_POST['ten_danh_muc'];


    $ds_dm = danh_muc_tin_tuc_sellect_all();
    $VIEW_NAME = "danh_muc_tin_tuc/danh_muc.php";
} else if (exist_param("btn_delete")) {
    $id = $_GET['id'];
    change_tin_tuc_by_loai($id);
    danh_muc_tin_tuc_delete($id);
    header("Location: /admin/danh_muc_tin_tuc/index.php?list_danh_muc");
    // $ds_dm = danh_muc_tin_tuc_sellect_all();
    // $VIEW_NAME = "danh_muc_tin_tuc/danh_muc.php";
} else {
    $ds_dm = danh_muc_tin_tuc_sellect_all();

    $VIEW_NAME = "danh_muc_tin_tuc/add_danh_muc.php";
}

require ("../layout.php");
