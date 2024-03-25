<?php
require_once ("../../../dao/bien_the.php");
require_once ("../../../dao/hang_hoa.php");
require_once ("../../../dao/pdo.php");
require ("../../../global.php");
// extract($_REQUEST);
$error_message = "";

if (exist_param("add_bien_the")) {
    $ma_hh = $_GET["ma_hh"];

    $ds_loai_bt = bien_the_selectall($ma_hh);
    $VIEW_NAME = "hang_hoa/bien_the/add_loai_bt.php";

} else if (exist_param("list_loai_bt")) {
    $ma_hh = $_GET["ma_hh"];
    $hang_hoa = hang_hoa_select_by_id($ma_hh);

    $ds_loai_bt = bien_the_selectall($ma_hh);

    $VIEW_NAME = "hang_hoa/bien_the/loai_bt.php";

} else if (exist_param("btn_add_loai_bt")) {
    $ma_hh = $_GET["ma_hh"];

    $ten_loai = $_POST["ten_loai"];
    $gia = $_POST["don_gia"];
    if ($ten_loai) {



        them_bien_the($ten_loai, $gia, $ma_hh);
        $ds_loai_bt = bien_the_selectall($ma_hh);
        $ma_hh = $_GET["ma_hh"];
        $hang_hoa = hang_hoa_select_by_id($ma_hh);
        $VIEW_NAME = "hang_hoa/bien_the/loai_bt.php";


    }



} elseif (exist_param("edit_loai_bt")) {
    $edit_id = $_GET["ma_bien_the"];
    $data_edit = get_one_item($edit_id);


    $VIEW_NAME = "hang_hoa/bien_the/edit_loai_bt.php";
} elseif (exist_param("btn_edit_loai_bt")) {
    $ma_hh = $_GET["ma_hh"];
    $ma_bien_the = $_GET["ma_bien_the"];

    $ten_loai = $_POST["ten_loai"];
    $gia = $_POST["don_gia"];

    if ($ten_loai) {

        edit_bien_the($ten_loai, $gia, $ma_hh, $ma_bien_the);

        $ds_loai_bt = bien_the_selectall($ma_hh);
        $ma_hh = $_GET["ma_hh"];
        $hang_hoa = hang_hoa_select_by_id($ma_hh);
        $VIEW_NAME = "hang_hoa/bien_the/loai_bt.php";

    }
    ;
    $ma_hh = $_GET["ma_hh"];

    $ds_loai_bt = bien_the_selectall($ma_hh);
    $ma_hh = $_GET["ma_hh"];
    $hang_hoa = hang_hoa_select_by_id($ma_hh);
    $VIEW_NAME = "hang_hoa/bien_the/loai_bt.php";
} elseif (exist_param("btn_delete")) {
    $delete_id = $_GET["ma_bien_the"];
    $ma_hh = $_GET["ma_hh"];
    xoa_bien_the($delete_id);
    $ds_loai_bt = bien_the_selectall($ma_hh);
    $ma_hh = $_GET["ma_hh"];
    $hang_hoa = hang_hoa_select_by_id($ma_hh);
    $VIEW_NAME = "hang_hoa/bien_the/loai_bt.php";
} else {
    $ma_hh = $_GET["ma_hh"];
    $hang_hoa = hang_hoa_select_by_id($ma_hh);
    $ds_loai_bt = bien_the_selectall($ma_hh);
    $VIEW_NAME = "bien_the/add_loai_bt.php";

}

require ("../../layout.php");

?>