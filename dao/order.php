<?php
require_once ("pdo.php");


function get_all_order()
{
    $sql = "SELECT * FROM don_hang inner join trang_thai_don_hang on don_hang.ma_trang_thai = trang_thai_don_hang.id  order by ma_dh desc";
    return qdo_query($sql);
}

function get_all_order_filter($ma_tt)
{
    $sql = "SELECT * FROM don_hang inner join trang_thai_don_hang on don_hang.ma_trang_thai = trang_thai_don_hang.id where don_hang.ma_trang_thai = $ma_tt order by ma_dh desc";
    return qdo_query($sql);
}

function get_order_by_ma_kh($ma_kh)
{
    $sql = "SELECT * FROM don_hang inner join trang_thai_don_hang on don_hang.ma_trang_thai = trang_thai_don_hang.id WHERE ma_kh = $ma_kh and don_hang.status = 1 ORDER BY don_hang.ma_dh DESC";
    return qdo_query($sql);
}

function get_product_by_ma_dh($ma_dh)
{
    $sql = "SELECT * FROM chi_tiet_don_hang inner join variant on chi_tiet_don_hang.ma_bt = variant.id inner join hang_hoa on hang_hoa.ma_hh = variant.ma_hh WHERE chi_tiet_don_hang.ma_dh = $ma_dh";
    return qdo_query($sql);

}

function delete_order_by_id($ma_order)
{
    $sql = "UPDATE don_hang SET status = 0 where ma_dh = $ma_order";
    pdo_execute($sql);
}

function get_order_by_ma_dh($ma_order)
{
    $sql = "SELECT * FROM don_hang WHERE ma_dh = $ma_order";
    return qdo_query_one($sql);
}

function list_trang_thai_don()
{
    $sql = "SELECT * FROM trang_thai_don_hang";
    return qdo_query($sql);

}

function update_tt($tt, $ma_dh)
{
    $sql = "UPDATE don_hang SET ma_trang_thai = $tt WHERE ma_dh = $ma_dh";
    pdo_execute($sql);

}

?>