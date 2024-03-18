<?php
// require_once ("../../dao/voucher.php");
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/binh_luan.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);
$error_message = "";

if (exist_param("add_voucher")) {
    // $ds_voucher = loai_selectall();
    $VIEW_NAME = "voucher/add_voucher.php";

} else if (exist_param("list_voucher")) {

    // $ds_voucher = loai_selectall();

    $VIEW_NAME = "voucher/voucher.php";

} else if (exist_param("btn_add_voucher")) {
    $ten_loai = $_POST["ten_loai"];
    if ($ten_loai) {



        them_voucher($ten_loai);
        $ds_voucher = loai_selectall();

        $VIEW_NAME = "voucher/voucher.php";


    }



} elseif (exist_param("edit_voucher")) {
    // $edit_id = $_GET["ma_loai"];
    // $data_edit = get_one_item($edit_id);


    $VIEW_NAME = "voucher/edit_voucher.php";
} elseif (exist_param("btn_edit_voucher")) {
    $ten_loai = $_POST["ten_loai"];
    $ma_loai = $_POST["ma_loai"];
    if ($ten_loai) {

        edit_voucher($ten_loai, $ma_loai);

        $ds_voucher = loai_selectall();

        $VIEW_NAME = "voucher/voucher.php";

    }
    ;
    $ds_voucher = loai_selectall();

    $VIEW_NAME = "voucher/voucher.php";
} elseif (exist_param("btn_delete")) {
    // $delete_id = $_GET["ma_loai"];
    // $hang_hoa_delete = hang_hoa_select_by_loai_all($delete_id);
    // binh_luan_delete_by_ma_hh($hang_hoa_delete);
    // hang_hoa_delete_by_loai($delete_id);
    // xoa_voucher($delete_id);
    // $ds_voucher = loai_selectall();

    $VIEW_NAME = "voucher/voucher.php";
} else {
    // $ds_voucher = loai_selectall();
    $VIEW_NAME = "voucher/add_voucher.php";

}

require ("../layout.php");

?>