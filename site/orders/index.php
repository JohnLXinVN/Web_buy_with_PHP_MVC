<?php

require_once ("../../dao/pdo.php");
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/gio_hang.php");
require_once ("../../dao/bien_the.php");
require_once ("../../dao/order.php");
require_once ("../../dao/checkout.php");
require ("../../global.php");


$userCookie = $_COOKIE['user'];

$userLogin = unserialize($userCookie);
if (!$userLogin) {
    header("Location: /site/tai_khoan?login");
}


$ds_order = get_order_by_ma_kh($userLogin["ma_kh"]);
if (exist_param("deteteItemDH")) {
    $ma_dh = $_GET["ma_dh"];
    delete_order_by_id($ma_dh);

    $ds_order = get_order_by_ma_kh($userLogin["ma_kh"]);
}
$VIEW_NAME = "list_order.php";


require ("../layout.php");

?>