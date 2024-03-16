<?php

require_once("../../dao/pdo.php");
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require("../../global.php");
if (exist_param("lien_he")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "list_lien_he.php";
} elseif (exist_param("contact_admin")) {
    $VIEW_NAME = "contact_admin.php";
}

require("../layout.php");

?>