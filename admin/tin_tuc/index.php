<?php
// require_once ("../../dao/tin_tuc.php");
require_once ("../../dao/loai_hang.php");
require_once ("../../dao/binh_luan.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);

if (exist_param("add_tin_uc")) {
    // $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "tin_tuc/add_tin_tuc.php";

} else if (exist_param("list_tin_tuc")) {
    // $ds_loai_hang = loai_selectall();
    // $ds_tin_tuc = tin_tuc_select_all();

    $VIEW_NAME = "tin_tuc/tin_tuc.php";

} else if (exist_param("btn_add_tin_tuc")) {
    $ds_loai_hang = loai_selectall();

    $ten_hh = $_POST["ten_hh"];
    $don_gia = $_POST["don_gia"];
    $mo_ta = $_POST["mo_ta"];
    $giam_gia = $_POST["giam_gia"];
    $ngay_nhap = $_POST["ngay_nhap"];
    $luot_xem = $_POST["luot_xem"];
    $dac_biet = $_POST["dac_biet"];
    $ma_loai = $_POST["ma_loai"];
    $hinh = save_file("hinh", $UPLOAD_URL);

    tin_tuc_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai);
    $ds_tin_tuc = tin_tuc_select_all();

    $VIEW_NAME = "tin_tuc/tin_tuc.php";


} elseif (exist_param("edit_tin_tuc")) {
    // $ds_loai_hang = loai_selectall();

    // $edit_id = $_GET["ma_hh"];
    // $data_edit = tin_tuc_select_by_id($edit_id);


    $VIEW_NAME = "tin_tuc/edit_tin_tuc.php";
} elseif (exist_param("btn_edit_tin_tuc")) {
    $ds_loai_hang = loai_selectall();

    $ma_hh = $_POST["ma_hh"];
    $ten_hh = $_POST["ten_hh"];
    $don_gia = $_POST["don_gia"];
    $mo_ta = $_POST["mo_ta"];
    $giam_gia = $_POST["giam_gia"];
    $ngay_nhap = $_POST["ngay_nhap"];
    $luot_xem = $_POST["luot_xem"];
    $dac_biet = $_POST["dac_biet"];
    $ma_loai = $_POST["ma_loai"];

    $hinh = save_file("hinh", $UPLOAD_URL);

    if (!$hinh) {
        $hinh = $_POST["hinh_no_load"];
    }

    // tin_tuc_update($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai, $ma_hh);
    // $ds_tin_tuc = tin_tuc_select_all();

    $VIEW_NAME = "tin_tuc/tin_tuc.php";
} elseif (exist_param("btn_delete")) {
    // $delete_id = $_GET["ma_hh"];
    // tin_tuc_delete($delete_id);
    // binh_luan_delete_by_ma_hh($delete_id);
    // $ds_tin_tuc = tin_tuc_select_all();
    // $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "tin_tuc/tin_tuc.php";
} else {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "tin_tuc/add_tin_tuc.php";

}

require ("../layout.php");

?>