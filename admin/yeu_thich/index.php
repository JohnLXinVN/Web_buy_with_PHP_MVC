<?php
require_once ("../../dao/favourite.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);

if (exist_param("yeu_thich")) {
    $ds_yt = hang_hoa_yt_select_all();

    $VIEW_NAME = "yeu_thich/yeu_thich.php";
} else if (exist_param("btn_delete")) {
    $id = $_GET['id'];
    remove_hang_hoa_yt($id);
    $ds_yt = hang_hoa_yt_select_all();

    $VIEW_NAME = "yeu_thich/yeu_thich.php";
} else {
    $ds_yt = hang_hoa_yt_select_all();

    $VIEW_NAME = "yeu_thich/yeu_thich.php";
}

require ("../layout.php");
