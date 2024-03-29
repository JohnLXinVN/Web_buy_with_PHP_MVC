<?php
require_once("pdo.php");

function thong_ke_hang_hoa()
{
    $sql = "SELECT lh.ma_loai, lh.ten_loai, COUNT(*) so_luong,MIN(hh.don_gia) gia_min, MAX(hh.don_gia) gia_max, AVG(hh.don_gia) gia_tb FROM loai_hang lh JOIN hang_hoa hh ON lh.ma_loai = hh.ma_loai GROUP BY lh.ten_loai, lh.ma_loai";
    return qdo_query($sql);
}

function thong_ke_binh_luan()
{
    $sql = "SELECT hh.ma_hh, hh.ten_hh, COUNT(*) so_luong,MIN(b.ngay_bl) cu_nhat, MAX(b.ngay_bl) moi_nhat FROM binh_luan b JOIN hang_hoa hh ON hh.ma_hh = b.ma_hh GROUP BY hh.ma_hh, hh.ten_hh HAVING so_luong >0";
    return qdo_query($sql);
}

?>