<?php
require_once ("../../dao/thong_ke.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);


$ds_loai_hang_thong_ke = thong_ke_hang_hoa_by_chi_tiet();
$VIEW_NAME = "thong_ke/thong_ke.php";


require ("../layout.php");

?>