<?php

require_once ("pdo.php");
// Bảo Sửa inner join bảng loại hàng
function hang_hoa_select_all()
{
    $sql = "SELECT hh.* , lh.* FROM hang_hoa as hh 
        inner join loai_hang as lh on lh.ma_loai = hh.ma_loai";
    return qdo_query($sql);
}

function hang_hoa_select_all_by_key($key_word)
{
    $sql = "SELECT hh.* , lh.* FROM hang_hoa as hh 
        inner join loai_hang as lh on lh.ma_loai = hh.ma_loai WHERE hh.ten_hh LIKE '%$key_word%' OR hh.mo_ta LIKE '%$key_word%'";
    return qdo_query($sql);
}


// sản phẩm mới nhất
function hang_hoa_select_newest()
{
    $sql = "SELECT hh.* , lh.ten_loai FROM hang_hoa as hh inner join loai_hang as lh on lh.ma_loai = hh.ma_loai ORDER BY hh.ngay_nhap DESC";
    return qdo_query($sql);
}

function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai, $desc)
{
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ngay_nhap, mo_ta, dac_biet,luot_xem,ma_loai,desc) VALUES (?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai, $desc);
}

function hang_hoa_delete($ma_hh)
{
    $sql = "DELETE FROM hang_hoa WHERE ma_hh = $ma_hh";
    pdo_execute($sql);
}
//hiển thị sản phẩm và phân trang
function loadall_hang_hoa_store($page, $soluongsp)
{

    // if(($page="") || ($page=0)){
    //     $page=1;
    // }
    $start = ($page - 1) * $soluongsp;

    $sql = "SELECT * FROM hang_hoa where 1";
    $sql .= " ORDER BY ma_hh DESC";
    $sql .= " LIMIT " . $start . "," . $soluongsp;
    return qdo_query($sql);
}

function loadall_hang_hoa_store_all()
{

    // if(($page="") || ($page=0)){
    //     $page=1;
    // }
    // $start = ($page-1)*$soluongsp;

    $sql = "SELECT * FROM hang_hoa WHERE 1";
    $sql .= " ORDER BY ma_hh DESC";
    $sql .= " LIMIT 0,9";
    return qdo_query($sql);
}


function loadall_hang_hoa_han($page, $soluongsp)
{

    // if(($page="") || ($page=0)){
    //     $page=1;
    // }
    $start = ($page - 1) * $soluongsp;

    $sql = "SELECT * FROM hang_hoa WHERE";
    $sql .= " ma_loai=46";
    $sql .= " LIMIT " . $start . "," . $soluongsp;
    return qdo_query($sql);
}

function loadall_hang_hoa_nhat($page, $soluongsp)
{

    // if(($page="") || ($page=0)){
    //     $page=1;
    // }
    $start = ($page - 1) * $soluongsp;

    $sql = "SELECT * FROM hang_hoa WHERE";
    $sql .= " ma_loai=55";
    $sql .= " LIMIT " . $start . "," . $soluongsp;
    return qdo_query($sql);
}

function get_dssp_han()
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=46";
    return qdo_query($sql);
}

function get_dssp_nhat()
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=55";
    return qdo_query($sql);
}


function get_dssp()
{
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC";
    return qdo_query($sql);
}

function hien_thi_so_trang($tong_sp, $soluongsp)
{
    $tongsp = count($tong_sp);
    $so_trang = ceil($tongsp / $soluongsp);
    $html_so_trang = "";
    for ($i = 1; $i <= $so_trang; $i++) {
        $html_so_trang .= '<li><a href="store.php?my_pham&page=' . $i . '">' . $i . '</a></li>';
    }
    return $html_so_trang;
}

function hien_thi_so_trang_han($soluongsp)
{
    $tongsphan = count(get_dssp_han());
    $so_trang_han = ceil($tongsphan / $soluongsp);
    $html_so_trang_han = "";
    for ($i = 1; $i <= $so_trang_han; $i++) {
        $html_so_trang_han .= '<li><a href="store.php?my_pham_han&page=' . $i . '">' . $i . '</a></li>';
    }
    return $html_so_trang_han;
}

function hien_thi_so_trang_nhat($soluongsp)
{
    $tongspnhat = count(get_dssp_nhat());
    $so_trang_nhat = ceil($tongspnhat / $soluongsp);
    $html_so_trang_nhat = "";
    for ($i = 1; $i <= $so_trang_nhat; $i++) {
        $html_so_trang_nhat .= '<li><a href="store.php?my_pham_nhat&page=' . $i . '">' . $i . '</a></li>';
    }
    return $html_so_trang_nhat;
}

function hang_hoa_delete_by_loai($ma_loai)
{
    $sql = "DELETE FROM hang_hoa WHERE ma_loai= $ma_loai";
    pdo_execute($sql);
}

function hang_hoa_update($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $luot_xem, $ma_loai, $ma_hh, $desc)
{
    $sql = "UPDATE hang_hoa SET ten_hh = ?, don_gia = ?, giam_gia =?, hinh =?, ngay_nhap =?, mo_ta =?, dac_biet =?,luot_xem =?,ma_loai = ?, desc = ? WHERE ma_hh = ?";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, intval($dac_biet), $luot_xem, $ma_loai, $ma_hh, $desc);
}

function hang_hoa_select_by_id($id)
{
    $sql = "SELECT hh.* , lh.ten_loai FROM hang_hoa as hh inner join loai_hang as lh on lh.ma_loai= hh.ma_loai WHERE hh.ma_hh = $id";
    return qdo_query_one($sql);
}

function hang_hoa_select_top10()
{
    $sql = "SELECT hh.* , lh.ten_loai FROM hang_hoa as hh inner join loai_hang as lh on lh.ma_loai = hh.ma_loai ORDER BY hh.luot_xem DESC LIMIT 10";
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
    $sql = "SELECT * FROM hang_hoa WHERE ten_hh LIKE '%$key_word%' OR mo_ta LIKE '%$key_word%'";
    return qdo_query($sql);
}

function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET luot_xem = luot_xem + 1 WHERE ma_hh = $ma_hh";
    return qdo_query($sql);
}

function get_variant_by_hh($ma_hh)
{
    $sql = "SELECT * FROM variant WHERE ma_hh = $ma_hh";
    return qdo_query($sql);

}

?>