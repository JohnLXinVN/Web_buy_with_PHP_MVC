<?php
require_once("../../dao/pdo.php");
require_once("../../dao/tin_tuc.php");
require("../../global.php");
extract($_REQUEST);
$listt = tin_tuc_select_all();
if (exist_param("list_tin_tuc")) {
    $listt = tin_tuc_select_all();
}
$VIEW_NAME = "tin_tuc/list_tin_tuc_ui.php";
require("../layout.php");
?>