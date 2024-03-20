<?php

require_once("../../dao/pdo.php");
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require("../../global.php");
if (exist_param("favourite_product")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "favourite_product.php";
}

require("../layout.php");

?>