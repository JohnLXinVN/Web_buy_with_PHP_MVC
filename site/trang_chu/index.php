<?php
require_once("../../dao/pdo.php");
require_once("../../dao/hang_hoa.php");
require_once("../../dao/loai_hang.php");
require("../../global.php");
// extract($_REQUEST);
$ds_hang_hoa_top_10 = hang_hoa_select_top10();

$ds_loai_hang = loai_selectall();

$userCookie = $_COOKIE['user'];

// Chuyển đổi chuỗi đã serialize thành mảng
$userLogin = unserialize($userCookie);
if (!$userLogin ) {
    header("Location: /site/tai_khoan?login");
}

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

} else {
    $VIEW_NAME = "trang_chu/home.php";

}

require("../layout.php");

?>