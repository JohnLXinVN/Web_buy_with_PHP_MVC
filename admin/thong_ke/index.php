<?php
require_once ("../../dao/thong_ke.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);



if (exist_param("includeDate")) {
    $dateFrom = $_POST["dateFrom"];
    $dateTo = $_POST["dateTo"];

    if ($dateFrom && $dateTo) {
        $ds_loai_hang_thong_ke = thong_ke_hang_hoa_by_chi_tiet_date_from_to($dateFrom, $dateTo);
    } else if ($dateFrom && !$dateTo) {
        $ds_loai_hang_thong_ke = thong_ke_hang_hoa_by_chi_tiet_date_from($dateFrom);
    } else if ($dateTo && !$dateFrom) {
        $ds_loai_hang_thong_ke = thong_ke_hang_hoa_by_chi_tiet_date_to($dateTo);

    }
    $VIEW_NAME = "thong_ke/thong_ke.php";

} else {

    $ds_loai_hang_thong_ke = thong_ke_hang_hoa_by_chi_tiet();
    $VIEW_NAME = "thong_ke/thong_ke.php";

}

require ("../layout.php");

?>