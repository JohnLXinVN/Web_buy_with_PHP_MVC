<?php
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

?>