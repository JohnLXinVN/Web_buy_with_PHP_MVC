<?php


require_once ("pdo.php");

function bien_the_selectall($ma_hh)
{
    $sql = "SELECT * FROM variant INNER JOIN hang_hoa ON hang_hoa.ma_hh = variant.ma_hh WHERE variant.ma_hh = ?";
    return qdo_query($sql, $ma_hh);
}

function them_bien_the($tenloai, $don_gia, $ma_hh, $tong_so_luong)
{
    $sql = "INSERT INTO variant(ten_loai, gia, ma_hh, tong_so_luong) VALUES (?,?, ?, ?)";
    pdo_execute($sql, $tenloai, $don_gia, $ma_hh, $tong_so_luong);

}

function xoa_bien_the($ma_bien_the)
{
    $sql = "DELETE FROM variant WHERE id = $ma_bien_the";
    pdo_execute($sql);
}


function edit_bien_the($tenloai, $gia, $ma_hh, $ma_bien_the, $tong_so_luong)
{
    $sql = "UPDATE variant SET ten_loai = ?, gia=?, ma_hh = ?,tong_so_luong = ? WHERE id = ?";

    pdo_execute($sql, $tenloai, $gia, $ma_hh, $ma_bien_the, $tong_so_luong);
}

function get_one_item($edit_id)
{
    $sql = "SELECT * From variant WHERE id = $edit_id";
    return qdo_query_one($sql);
}

function get_one_item_bt($edit_id)
{
    $sql = "SELECT * From variant WHERE id = $edit_id";
    return qdo_query_one($sql);
}

function get_bt_by_ma_hh($ma_hh)
{
    $sql = "SELECT * FROM variant WHERE ma_hh = $ma_hh";
    return qdo_query($sql);
}

?>