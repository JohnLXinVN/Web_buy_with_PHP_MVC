<?php
require_once ("../../dao/tin_tuc.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);

if (exist_param("add_tin_tuc")) {
    $ds_dm = danh_muc_tin_tuc_sellect_all();
    $ds_tin_tuc = tin_tuc_select_all();

    $VIEW_NAME = "tin_tuc/add_tin_tuc.php";
} elseif (exist_param("list_tin_tuc")) {

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $soluongsp = 5;

    $ds_tin_tuc = tin_tuc_select_all($page, $soluongsp);
    $tong_sp=get_tin_tuc_select_all();
    $hien_thi_so_trang = hien_thi_so_trang_ds_tin_tuc($tong_sp, $soluongsp);

    $VIEW_NAME = "tin_tuc/tin_tuc.php";
} elseif (exist_param("btn_add_tin_tuc")) {
    $tieu_de = $_POST['tieu_de'];
    $tac_gia = $_POST['tac_gia'];
    $mo_ta = $_POST['mo_ta'];
    $noi_dung = $_POST['noi_dung'];
    $hinh = save_file("hinh", $UPLOAD_URL);
    $ngay_xuat_ban = $_POST['ngay_xuat_ban'];
    $id_danh_muc = $_POST['id_danh_muc'];

    tin_tuc_insert($tieu_de, $mo_ta, $noi_dung, $hinh, $tac_gia, $ngay_xuat_ban, $id_danh_muc);

    $ds_tin_tuc = tin_tuc_select_all();
    $VIEW_NAME = "tin_tuc/tin_tuc.php";
} elseif (exist_param("edit_tin_tuc")) {
    $ds_tin_tuc = tin_tuc_select_all();

    $id_tin_tuc = $_GET['id_tin_tuc'];
    $tt = tin_tuc_id($id_tin_tuc);

    $ds_dm = danh_muc_tin_tuc_sellect_all();

    $VIEW_NAME = "tin_tuc/edit_tin_tuc.php";
} elseif (exist_param("btn_edit_tin_tuc")) {

    $id_tin_tuc = $_POST['id_tin_tuc'];
    $tieu_de = $_POST['tieu_de'];
    $tac_gia = $_POST['tac_gia'];
    $mo_ta = $_POST['mo_ta'];
    $noi_dung = $_POST['noi_dung'];
    $hinh = save_file("hinh", $UPLOAD_URL);
    $ngay_xuat_ban = $_POST['ngay_xuat_ban'];
    $id_danh_muc = $_POST['id_danh_muc'];

    if (!$hinh) {
        $hinh = $_POST["hinh_no_load"];
    }

    $tt = tin_tuc_id($id_tin_tuc);

    tin_tuc_edit($tieu_de, $mo_ta, $noi_dung, $hinh, $tac_gia, $ngay_xuat_ban, $id_danh_muc, $id_tin_tuc);

    $ds_tin_tuc = tin_tuc_select_all();
    $VIEW_NAME = "tin_tuc/tin_tuc.php";
} elseif (exist_param("btn_delete")) {
    $id_tin_tuc = $_GET['id_tin_tuc'];

    tin_tuc_delete($id_tin_tuc);

    $ds_tin_tuc = tin_tuc_select_all();
    $VIEW_NAME = "tin_tuc/tin_tuc.php";
} else {
    $ds_dm = get_danh_muc_tin_tuc_sellect_all();
    $ds_tin_tuc = tin_tuc_select_all();

    $VIEW_NAME = "tin_tuc/add_tin_tuc.php";
}

require ("../layout.php");
