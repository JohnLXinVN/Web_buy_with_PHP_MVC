<?php
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/bien_the.php");
require_once ("../../dao/loai_hang.php");
require_once ("../../dao/favourite.php");
require_once ("../../dao/gio_hang.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
$ds_loai_hang = loai_selectall();
$ds_hang_hoa_top_10 = hang_hoa_select_top10();
$userLogin = null;
if (isset($_COOKIE['user'])) {
    $userCookie = $_COOKIE['user'];
    $userLogin = unserialize($userCookie);

}

if (exist_param("ma_hh")) {
    $ma_hh = $_GET["ma_hh"];
    if ($userLogin["ma_kh"]) {
        $check = kiem_tra_hh_yt($userLogin["ma_kh"]);
    } else {
        $check = [];
    }

    $list_variant = get_variant_by_hh($ma_hh);
    $item_hh = hang_hoa_select_by_id($ma_hh);
    $item_loai = hang_hoa_select_ma_loai_4($item_hh["ma_loai"]);
    hang_hoa_tang_so_luot_xem($ma_hh);
    $VIEW_NAME = "chi_tiet_ui.php";
} else if (exist_param("addToCart")) {


    $VariantId = $_POST["VariantId"];
    $variantPrice = $_POST["variantPrice"];
    $quantity = $_POST["quantity"];
    $ma_kh = $userLogin["ma_kh"];
    $tong_gia = $quantity * $variantPrice;
    $check_exist = check_hh_by_ma_hh($VariantId);
    if (count($check_exist) == 0 || !$check_exist) {
        cart_insert($VariantId, $ma_kh, $tong_gia, $quantity);
    } else {
        $tong_gia = $tong_gia + $check_exist[0]["tong_gia"];
        $quantity = $quantity + $check_exist[0]["so_luong"];
        update_sl_price($quantity, $tong_gia, $VariantId, $ma_kh);
    }


    $VIEW_NAME = "chi_tiet_ui.php";
}


require ("../layout.php");


?>