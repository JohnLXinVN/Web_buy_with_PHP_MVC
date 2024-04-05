<?php
require_once ("pdo.php");

// function thong_ke_hang_hoa_by_chi_tiet()
// {
//     $sql = "SELECT lh.ma_loai, lh.ten_loai, COUNT(*) so_luong,MIN(hh.don_gia) gia_min, MAX(hh.don_gia) gia_max, AVG(hh.don_gia) gia_tb FROM loai_hang lh JOIN hang_hoa hh ON lh.ma_loai = hh.ma_loai GROUP BY lh.ten_loai, lh.ma_loai";
//     return qdo_query($sql);
// }

function thong_ke_hang_hoa_by_chi_tiet()
{
    $sql = "SELECT loai_hang.ten_loai, loai_hang.ma_loai, sum(chi_tiet_don_hang.so_luong) AS so_luong, SUM(chi_tiet_don_hang.don_gia) AS doanh_thu
    FROM chi_tiet_don_hang
    INNER JOIN don_hang ON chi_tiet_don_hang.ma_dh = don_hang.ma_dh
    INNER JOIN variant ON chi_tiet_don_hang.ma_bt = variant.id
    INNER JOIN hang_hoa ON variant.ma_hh = hang_hoa.ma_hh
    INNER JOIN loai_hang ON hang_hoa.ma_loai = loai_hang.ma_loai
    WHERE don_hang.ma_trang_thai = 4 AND don_hang.status = 1
    GROUP BY loai_hang.ma_loai;
    ";
    return qdo_query($sql);
}

function get_thong_ke_binh_luan($page, $soluongsp)
{
    $start = ($page - 1) * $soluongsp;
    $sql = "SELECT hh.ma_hh, hh.ten_hh, COUNT(*) so_luong,MIN(b.ngay_bl) cu_nhat, MAX(b.ngay_bl) moi_nhat FROM binh_luan b JOIN hang_hoa hh ON hh.ma_hh = b.ma_hh GROUP BY hh.ma_hh, hh.ten_hh HAVING so_luong >0";
    $sql .= " LIMIT " . $start . "," . $soluongsp;
    return qdo_query($sql);
}


function thong_ke_binh_luan()
{
    $sql = "SELECT hh.ma_hh, hh.ten_hh, COUNT(*) so_luong,MIN(b.ngay_bl) cu_nhat, MAX(b.ngay_bl) moi_nhat FROM binh_luan b JOIN hang_hoa hh ON hh.ma_hh = b.ma_hh GROUP BY hh.ma_hh, hh.ten_hh HAVING so_luong >0";
    return qdo_query($sql);
}

function hien_thi_so_trang_ds_bl($tong_sp, $soluongsp)
{
    $tongsp = count($tong_sp);
    $so_trang = ceil($tongsp / $soluongsp);
    $html_so_trang = "";
    for ($i = 1; $i <= $so_trang; $i++) {
        $html_so_trang .= '<li><a href="index.php&page=' . $i . '">' . $i . '</a></li>';
    }
    return $html_so_trang;
}

?>