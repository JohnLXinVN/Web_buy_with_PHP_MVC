<?php
require_once ("../../dao/pdo.php");
require_once ("../../dao/tin_tuc.php");
require ("../../global.php");
extract($_REQUEST);
// $listt = tin_tuc_select_all();
if (exist_param("list_tin_tuc")) {
    $ds_dm = danh_muc_tin_tuc_sellect_all();
    $listt = tin_tuc_select_all();
} else if (exist_param("id_danh_muc")) {
    $ds_dm = danh_muc_tin_tuc_sellect_all();
    $id_danh_muc = $_POST['danh_muc'];
    $listt = tin_tuc_select_all();
} else {
    $ds_dm = danh_muc_tin_tuc_sellect_all();
    $listt = tin_tuc_select_all();
}
$VIEW_NAME = "tin_tuc/list_tin_tuc_ui.php";
require ("../layout.php");
?>
