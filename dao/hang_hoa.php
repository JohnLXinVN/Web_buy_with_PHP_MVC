<?php

require_once("pdo.php");

function hang_hoa_select_all()
{

    $sql = "SELECT * FROM hang_hoa";
    return qdo_query($sql);
}

function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai)
{
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ngay_nhap, mo_ta, dac_biet,luot_xem,ma_loai) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai);

}

function hang_hoa_delete($ma_hh)
{

    $sql = "DELETE FROM hang_hoa WHERE ma_hh = $ma_hh";
    pdo_execute($sql);
}

function loadall_hang_hoa_home(){
    $sql = "SELECT * FROM hang_hoa where 1 ORDER BY ma_hh DESC LIMIT 0,9";
    return qdo_query($sql);
}


function hang_hoa_delete_by_loai($ma_loai)
{

    $sql = "DELETE FROM hang_hoa WHERE ma_loai= $ma_loai";
    pdo_execute($sql);
}

function hang_hoa_update($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai, $ma_hh)
{
    $sql = "UPDATE hang_hoa SET ten_hh = ?, don_gia = ?, giam_gia =?, hinh =?, ngay_nhap =?, mo_ta =?, dac_biet =?,luot_xem =?,ma_loai = ? WHERE ma_hh = ?";

    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, intval($dac_biet), $luot_xem, $ma_loai, $ma_hh);
}

function hang_hoa_select_by_id($id)
{
    $sql = "SELECT * From hang_hoa WHERE ma_hh = $id";
    return qdo_query_one($sql);
}

function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa ORDER BY luot_xem DESC LIMIT 10";
    return qdo_query($sql);
}

function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa where dac_biet = 1";
    return qdo_query($sql);
}

function hang_hoa_select_by_loai_all($loai_hang)
{
    $sql = "SELECT ma_hh FROM hang_hoa where ma_loai = $loai_hang";
    return qdo_query($sql);
}

function hang_hoa_select_by_loai($loai_hang)
{
    $sql = "SELECT * FROM hang_hoa where ma_loai = $loai_hang limit 6";
    return qdo_query($sql);
}

function hang_hoa_select_keyword($key_word)
{
    $sql = "SELECT * FROM hang_hoa WHERE ten_hh LIKE '%$key_word%'";
    return qdo_query($sql);
}

function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET luot_xem = luot_xem + 1 WHERE ma_hh = $ma_hh";
    return qdo_query($sql);

}

?>