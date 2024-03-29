<?php
require_once ("pdo.php");


function add_don_hang($ma_kh, $ma_trang_thai, $tong_tien_dh, $dia_chi, $thanh_toan, $first_name, $last_name, $email, $phone, $notes, $ngayHienTai)
{
    $sql = "INSERT INTO don_hang (ma_kh, ma_trang_thai, tong_tien_dh, dia_chi, thanh_toan, first_name, last_name, email, phone, notes, ngay_dat) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    return pdo_execute($sql, (int) $ma_kh, (int) $ma_trang_thai, (float) $tong_tien_dh, $dia_chi, $thanh_toan, $first_name, $last_name, $email, $phone, $notes, $ngayHienTai);
}

function add_chi_tiet_dh($ma_dh, $so_luong, $don_gia, $ma_bt)
{
    $sql = "INSERT INTO chi_tiet_don_hang (ma_dh, so_luong, don_gia, ma_bt) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_dh, $so_luong, $don_gia, $ma_bt);
}

function update_sl_when_order($ma_bt, $sl)
{
    $sql = "UPDATE variant set tong_so_luong = $sl WHERE id = $ma_bt";
    pdo_execute($sql);
}

?>