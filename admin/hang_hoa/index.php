<?php
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/loai_hang.php");
require_once ("../../dao/binh_luan.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);

if (exist_param("add_loai_hang")) {
    $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "hang_hoa/add_hang_hoa.php";

} else if (exist_param("list_hang_hoa")) {
    $ds_loai_hang = loai_selectall();
    $ds_hang_hoa = hang_hoa_select_all();

    $VIEW_NAME = "hang_hoa/hang_hoa.php";

} else if (exist_param("btn_add_hang_hoa")) {
    $ds_loai_hang = loai_selectall();

    $ten_hh = $_POST["ten_hh"];
    $don_gia = $_POST["don_gia"];
    $mo_ta = $_POST["mo_ta"];
    $desc = $_POST["desc"];
    $giam_gia = $_POST["giam_gia"];
    $ngay_nhap = $_POST["ngay_nhap"];
    $luot_xem = $_POST["luot_xem"];
    $dac_biet = $_POST["dac_biet"];
    $ma_loai = $_POST["ma_loai"];
    $hinh = save_file("hinh", $UPLOAD_URL);

    hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai, $desc);
    $ds_hang_hoa = hang_hoa_select_all();

    $VIEW_NAME = "hang_hoa/hang_hoa.php";


} elseif (exist_param("edit_hang_hoa")) {
    $ds_loai_hang = loai_selectall();

    $edit_id = $_GET["ma_hh"];
    $data_edit = hang_hoa_select_by_id($edit_id);


    $VIEW_NAME = "hang_hoa/edit_hang_hoa.php";
} elseif (exist_param("btn_edit_hang_hoa")) {
    $ds_loai_hang = loai_selectall();

    $ma_hh = $_POST["ma_hh"];
    $ten_hh = $_POST["ten_hh"];
    $don_gia = $_POST["don_gia"];
    $mo_ta = $_POST["mo_ta"];
    $desc = $_POST["desc"];

    $giam_gia = $_POST["giam_gia"];
    $ngay_nhap = $_POST["ngay_nhap"];
    $luot_xem = $_POST["luot_xem"];
    $dac_biet = $_POST["dac_biet"];
    $ma_loai = $_POST["ma_loai"];

    $hinh = save_file("hinh", $UPLOAD_URL);

    if (!$hinh) {
        $hinh = $_POST["hinh_no_load"];
    }

    hang_hoa_update($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai, $ma_hh, $desc);
    $ds_hang_hoa = hang_hoa_select_all();

    $VIEW_NAME = "hang_hoa/hang_hoa.php";
} elseif (exist_param("btn_delete")) {
    $delete_id = $_GET["ma_hh"];
    hang_hoa_delete($delete_id);
    binh_luan_delete_by_ma_hh($delete_id);
    $ds_hang_hoa = hang_hoa_select_all();
    $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "hang_hoa/hang_hoa.php";
} else {
    $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "hang_hoa/add_hang_hoa.php";

}

require ("../layout.php");

?>