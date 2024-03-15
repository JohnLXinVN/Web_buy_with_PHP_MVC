<?php
require_once("../../dao/pdo.php");
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require("../../global.php");
// extract($_REQUEST);
$ds_hang_hoa_top_10 = hang_hoa_select_top10();

$ds_loai_hang = loai_selectall();



if (exist_param("tin_tuc")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "tin_tuc/tin_tuc.php";

} elseif (exist_param("lien_he")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/lien_he.php";

} elseif (exist_param("gop_y")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/gop_y.php";

} elseif (exist_param("nhan_dien")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/nhan_dien.php";

} else {
    $VIEW_NAME = "tin_tuc/list_tin_tuc.php";

}

require("../layout.php");

?>