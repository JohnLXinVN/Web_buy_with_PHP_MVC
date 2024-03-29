<?php

require_once ("pdo.php");

function loai_selectall()
{
    $sql = "SELECT * FROM loai_hang";
    return qdo_query($sql);
}

function them_loai_hang($tenloai)
{
    $sql = "INSERT INTO loai_hang(ten_loai) VALUES (?)";
    pdo_execute($sql, $tenloai);

}

function xoa_loai_hang($ma_loai)
{
    $sql1 = "DELETE FROM hang_hoa WHERE ma_loai = $ma_loai";
    $sql = "DELETE FROM loai_hang WHERE ma_loai = $ma_loai";
    pdo_execute($sql1);
    pdo_execute($sql);
}


function edit_loai_hang($ten_loai, $ma_loai)
{
    $sql = "UPDATE loai_hang SET ten_loai = ? WHERE ma_loai = ?";

    pdo_execute($sql, $ten_loai, $ma_loai);
}

function get_one_item_loai_hang($edit_id)
{
    $sql = "SELECT * From loai_hang WHERE ma_loai = $edit_id";
    return qdo_query_one($sql);
}

function get_one_item_by_name($name_loai_hang)
{
    $sql = "SELECT COUNT(*) FROM loai_hang WHERE ten_loai = ?";
    return qdo_query_one($sql, $name_loai_hang);
}
?>