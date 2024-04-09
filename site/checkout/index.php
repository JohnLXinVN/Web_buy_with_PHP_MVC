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
    $ds_order = get_order_by_ma_kh($userLogin["ma_kh"]);

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




    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

    if ($payment == "Thanh toán thẻ") {
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $tong_gia;
        $orderId = time() . "";
        $redirectUrl = "http://xxshop.test/site/checkout/index.php?page_successfull";
        $ipnUrl = "http://xxshop.test/site/checkout/index.php?page_successfull";
        $extraData = "";


        // $partnerCode = $partnerCode;
        // $accessKey = $accessKey;
        $serectkey = $secretKey;
        // $orderId = $_POST["orderId"]; // Mã đơn hàng
        // $orderInfo = $_POST["orderInfo"];
        // $amount = $_POST["amount"];
        // $ipnUrl = $_POST["ipnUrl"];
        // $redirectUrl = $_POST["redirectUrl"];
        // $extraData = $_POST["extraData"];

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there
        // print_r($jsonResult);
        if ($jsonResult["resultCode"] == 0) {

            $idDH = add_don_hang($ma_kh, $ma_trang_thai, $tong_gia, $address, $payment, $first_name, $last_name, $email, $tel, $notes, $ngayHienTai);
            $ds_item_cart = array();
            $array = array();
            foreach ($ds_item_cart_by_id as $key => $value) {
                $ds_item_cart[] = get_all_item_in_cart_by_id($ma_kh, $value);

            }
            foreach ($ds_item_cart as $key => $value) {

                foreach ($ds_item_cart[$key] as $item) {


                    add_chi_tiet_dh($idDH, $item["sl_hh_cart"], $item["tong_gia"], $item["ma_bt"]);
                    $bt = get_one_item_bt($item["ma_bt"]);
                    $sl_con_lai = (int) $bt["tong_so_luong"] - (int) $item["sl_hh_cart"];
                    update_sl_when_order($item["ma_bt"], $sl_con_lai);
                    delete_item_by_ma_bt($item["ma_bt"]);
                }
            }
        }
        print_r($jsonResult);
        header('Location: ' . $jsonResult['payUrl']);
    } else {

        $idDH = add_don_hang($ma_kh, $ma_trang_thai, $tong_gia, $address, $payment, $first_name, $last_name, $email, $tel, $notes, $ngayHienTai);
        $ds_item_cart = array();
        $array = array();
        foreach ($ds_item_cart_by_id as $key => $value) {
            $ds_item_cart[] = get_all_item_in_cart_by_id($ma_kh, $value);

        }
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
    }




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