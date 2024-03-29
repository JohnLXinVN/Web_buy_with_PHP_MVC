<?php
require_once ("pdo.php");


function get_all_item_in_cart($ma_kh)
{
    $sql = "SELECT *, gio_hang.so_luong as sl_hh_cart FROM gio_hang inner join variant on gio_hang.ma_bt = variant.id inner join hang_hoa on variant.ma_hh = hang_hoa.ma_hh where gio_hang.ma_kh = $ma_kh";
    return qdo_query($sql);
}

function get_all_item_in_cart_by_id($ma_kh, $id)
{
    $sql = "SELECT *, gio_hang.so_luong as sl_hh_cart FROM gio_hang inner join variant on gio_hang.ma_bt = variant.id inner join hang_hoa on variant.ma_hh = hang_hoa.ma_hh where gio_hang.ma_kh = $ma_kh and gio_hang.ma_bt = $id";
    return qdo_query($sql);
}

function cart_insert($ma_bt, $ma_kh, $tong_gia, $so_luong)
{
    $sql = "INSERT INTO gio_hang(ma_bt,ma_kh,tong_gia,so_luong) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_bt, $ma_kh, $tong_gia, $so_luong);
}

function check_hh_by_ma_hh($ma_bt)
{
    $sql = "SELECT * FROM gio_hang where ma_bt = $ma_bt ";
    return qdo_query($sql);
}

function update_sl_price($so_luong, $price, $ma_bt, $ma_kh)
{
    $sql = "UPDATE gio_hang SET so_luong = $so_luong, tong_gia = $price WHERE $ma_bt = $ma_bt AND $ma_kh = $ma_kh";
    pdo_execute($sql);
}

function edit_item_in_cart_by_bt($so_luong, $price, $ma_bt)
{
    $sql = "UPDATE gio_hang SET so_luong = $so_luong, tong_gia = $price WHERE ma_bt = $ma_bt";
    pdo_execute($sql);

}

function delete_item_by_ma_bt($ma_bt)
{
    $sql = "DELETE FROM gio_hang WHERE ma_bt = $ma_bt";
    pdo_execute($sql);

}
?>