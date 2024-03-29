<?php

require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/bien_the.php");
require_once ("../../dao/favourite.php");

require ("../../global.php");


if (exist_param("searchkey")) {
    $key = $_POST["key"];
    $ds_hang_hoa = hang_hoa_select_all_by_key($key);
    $ma_kh = 12;
    $check = kiem_tra_hh_yt($ma_kh);

}
$VIEW_NAME = "list_search.php";


require ("../layout.php");
?>