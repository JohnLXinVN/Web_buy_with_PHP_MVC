<?php
require_once("../../dao/pdo.php");
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require_once("../../dao/tin_tuc.php");
require("../../global.php");
// extract($_REQUEST);
$ds_hang_hoa_top_10 = hang_hoa_select_top10();

$listt = tin_tuc_select_all();

$ds_loai_hang = loai_selectall();

$ds_hang_hoa = hang_hoa_select_all();

$ds_hang_hoa_moi_nhat = hang_hoa_select_newest();


if (exist_param("gioi_thieu")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/gioi_thieu.php";

} elseif (exist_param("lien_he")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/lien_he.php";

} elseif (exist_param("gop_y")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/gop_y.php";

} elseif (exist_param("nhan_dien")) {
    // $ds_loai_hang = loai_selectall();
    $VIEW_NAME = "trang_chu/nhan_dien.php";

}else {
    $VIEW_NAME = "trang_chu/home.php";

}

require("../layout.php");

?>