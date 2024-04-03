<?php

require_once ("../../dao/pdo.php");
require_once ("../../dao/hang_hoa.php");
require_once ("../../dao/gio_hang.php");
require_once ("../../dao/bien_the.php");
require_once ("../../dao/order.php");
// require_once ("../../dao/loai_hang.php");
require_once ("../../dao/checkout.php");
require ("../../global.php");


$userCookie = $_COOKIE['user'];

$userLogin = unserialize($userCookie);
if (!$userLogin) {
    header("Location: /site/tai_khoan?login");
}
if (exist_param("cart_check")) {
    // $ds_loai_hang = loai_selectall();
    if ($userLogin["ma_kh"]) {

        $ds_cart = get_all_item_in_cart($userLogin["ma_kh"]);

        $sl_sp_in_cart = 0;
        $tong_gia = 0;
        foreach ($ds_cart as $sp) {
            $sl_sp_in_cart += (int) $sp["sl_hh_cart"];
            $tong_gia += (float) $sp["tong_gia"];
        }
    }

    $VIEW_NAME = "cart_check.php";


} else if (exist_param("update_data_item_cart")) {
    $VariantId = $_POST["VariantId"];
    $quantity = $_POST["quantity"];
    $totalPrice = $_POST["totalPrice"];

    edit_item_in_cart_by_bt($quantity, $totalPrice, $VariantId);

    echo $totalPrice;
    echo $quantity;
    echo $VariantId;

} else if (exist_param("page_successfull")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "page_successfull.php";


} else if (exist_param("delete_item_in_cart")) {
    $ma_bt = $_GET["ma_bt"];
    delete_item_by_ma_bt($ma_bt);
    if ($userLogin["ma_kh"]) {

        $ds_cart = get_all_item_in_cart($userLogin["ma_kh"]);
        $sl_sp_in_cart = 0;
        $tong_gia = 0;
        foreach ($ds_cart as $sp) {
            $sl_sp_in_cart += (int) $sp["sl_hh_cart"];
            $tong_gia += (float) $sp["tong_gia"];
        }
    }

    $VIEW_NAME = "cart_check.php";

} else if (exist_param("btn_order")) {
    $payment = $_POST["payment"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];
    $notes = $_POST["notes"];
    $tong_gia = $_POST["tong_gia"];

    $ma_trang_thai = $_POST["ma_trang_thai"];
    $ma_kh = $_POST["ma_kh"];

    $ds_item_cart_by_id = $_POST["ds_cart_by_id"];

    $ngayHienTai = date("Y-m-d");

    $idDH = add_don_hang($ma_kh, $ma_trang_thai, $tong_gia, $address, $payment, $first_name, $last_name, $email, $tel, $notes, $ngayHienTai);


    $ds_item_cart = array();
    $array = array();

    // print_r($ds_item_cart_by_id);

    // echo "123123123123";

    foreach ($ds_item_cart_by_id as $key => $value) {


        // echo "12333333";
        $ds_item_cart[] = get_all_item_in_cart_by_id($ma_kh, $value);

    }
    // echo "<pre>";
    // echo "122222222222222222222222222222222222222222222222222";
    // print_r($ds_item_cart);
    // echo "</pre>";
    foreach ($ds_item_cart as $key => $value) {

        foreach ($ds_item_cart[$key] as $item) {


            add_chi_tiet_dh($idDH, $item["sl_hh_cart"], $item["tong_gia"], $item["ma_bt"]);
            $bt = get_one_item_bt($item["ma_bt"]);
            $sl_con_lai = (int) $bt["tong_so_luong"] - (int) $item["sl_hh_cart"];
            update_sl_when_order($item["ma_bt"], $sl_con_lai);
            delete_item_by_ma_bt($item["ma_bt"]);
        }
    }
    $ds_order = get_order_by_ma_kh($userLogin["ma_kh"]);
    $VIEW_NAME = "page_successfull.php";

} else if (exist_param("deteteItemDH")) {
    $ma_dh = $_GET["ma_dh"];
    delete_order_by_id($ma_dh);

    $ds_order = get_order_by_ma_kh($userLogin["ma_kh"]);

    $VIEW_NAME = "page_successfull.php";

} else {

    if (!$userLogin) {
        header("Location: /site/tai_khoan?login");
    }

    $ds_cart = get_all_item_in_cart($userLogin["ma_kh"]);
    $sl_sp_in_cart = 0;
    $tong_gia = 0;
    foreach ($ds_cart as $sp) {
        $sl_sp_in_cart += (int) $sp["sl_hh_cart"];
        $tong_gia += (float) $sp["tong_gia"];
    }
    $VIEW_NAME = "checkout_bill.php";

}

require ("../layout.php");

?>