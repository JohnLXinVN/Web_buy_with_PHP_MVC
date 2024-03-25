<?php
require_once("../../dao/pdo.php");
require_once("../../dao/tin_tuc.php");
require_once("../../global.php");
extract($_REQUEST);
$listt = tin_tuc_select_4();
if (exist_param("id_tin_tuc")) {
    $id_tin_tuc = $_GET['id_tin_tuc'];
    $tt = tin_tuc_id($id_tin_tuc);
} else {
    $listt= tin_tuc_select_all();
}
$VIEW_NAME = "tin_tuc/tin_tuc_ui.php";
require("../layout.php");
?>
