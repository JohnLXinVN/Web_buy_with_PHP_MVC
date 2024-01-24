<?php
require_once("../../dao/loai_hang.php");
require_once("../../dao/pdo.php");
require("../../global.php");
// extract($_REQUEST);

if (exist_param("add_loai_hang")) {
    $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "loai_hang/add_loai_hang.php";

} else if (exist_param("list_loai_hang")) {

    $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "loai_hang/loai_hang.php";

} else if (exist_param("btn_add_loai_hang")) {
    $ten_loai = $_POST["ten_loai"];
    if ($ten_loai) {
        them_loai_hang($ten_loai);

    }
    $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "loai_hang/loai_hang.php";


} elseif (exist_param("edit_loai_hang")) {
    $edit_id = $_GET["ma_loai"];
    $data_edit = get_one_item($edit_id);


    $VIEW_NAME = "loai_hang/edit_loai_hang.php";
} elseif (exist_param("btn_edit_loai_hang")) {
    $ten_loai = $_POST["ten_loai"];
    $ma_loai = $_POST["ma_loai"];
    if ($ten_loai) {
        edit_loai_hang($ten_loai, $ma_loai);
    }
    ;
    $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "loai_hang/loai_hang.php";
} elseif (exist_param("btn_delete")) {
    $delete_id = $_GET["ma_loai"];
    xoa_loai_hang($delete_id);
    $ds_loai_hang = loai_selectall();

    $VIEW_NAME = "loai_hang/loai_hang.php";
} else {
    $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "loai_hang/add_loai_hang.php";

}

require("../layout.php");

?>