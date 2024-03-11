<?php

require_once("../../dao/pdo.php");
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require("../../global.php");
if (exist_param("cart_check")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "cart_check.php";


} else {
    $VIEW_NAME = "checkout_bill.php";

}

require("../layout.php");

?>