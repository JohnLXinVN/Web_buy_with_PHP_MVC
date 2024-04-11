<?php
require_once ("pdo.php");


function tin_tuc_select_all()
{
    $sql = "SELECT tt.*, dm.ten_danh_muc FROM tin_tuc AS tt INNER JOIN danh_muc_tin_tuc AS dm ON dm.id= tt.id_danh_muc";
    if (isset($_POST['danh_muc']) && $_POST['danh_muc'] != "all") {
        $danh_muc = $_POST['danh_muc'];
        $sql .= " WHERE dm.id = $danh_muc";
    }
    return qdo_query($sql);
}

function tin_tuc_select_4()
{
    $sql = "SELECT * FROM tin_tuc ORDER BY id_tin_tuc DESC LIMIT 4";
    return qdo_query($sql);
}

function tin_tuc_id($id_tin_tuc)
{
    $sql = "SELECT * FROM tin_tuc WHERE id_tin_tuc = $id_tin_tuc";
    return qdo_query_one($sql);
}

function tin_tuc_insert($tieu_de, $mo_ta, $noi_dung, $hinh, $tac_gia, $ngay_xuat_ban, $id_danh_muc)
{
    $sql = "INSERT INTO tin_tuc(tieu_de , mo_ta , noi_dung , hinh , tac_gia , ngay_xuat_ban , id_danh_muc) VALUES ('$tieu_de' , '$mo_ta' , '$noi_dung' , '$hinh' , '$tac_gia' , '$ngay_xuat_ban' , '$id_danh_muc')";
    pdo_execute($sql);
}

function tin_tuc_delete($id_tin_tuc)
{
    $sql = "DELETE FROM tin_tuc where id_tin_tuc = '$id_tin_tuc'";
    pdo_execute($sql);
}

function change_tin_tuc_by_loai($id_loai)
{
    $sql = "UPDATE tin_tuc set id_danh_muc = 6 WHERE id_danh_muc = $id_loai";
    pdo_execute($sql);
}

function tin_tuc_edit($tieu_de, $mo_ta, $noi_dung, $hinh, $tac_gia, $ngay_xuat_ban, $id_danh_muc, $id_tin_tuc)
{
    $sql = "UPDATE tin_tuc SET tieu_de = '$tieu_de' , mo_ta = '$mo_ta' , noi_dung = '$noi_dung' , hinh = '$hinh' , tac_gia = '$tac_gia' , ngay_xuat_ban = '$ngay_xuat_ban' , id_danh_muc = '$id_danh_muc' WHERE id_tin_tuc = $id_tin_tuc";
    pdo_execute($sql);
}

function tin_tuc_load_danh_muc($id_danh_muc = 0)
{
    $sql = "SELECT tt.*, dm.ten_danh_muc FROM tin_tuc AS tt INNER JOIN danh_muc_tin_tuc AS dm ON dm.id= tt.id_danh_muc";
    // Lọc Theo Danh Mục Sản Phẩm
    if ($id_danh_muc > 0) {
        $sql .= " WHERE 1 and tt.id_danh_muc = $id_danh_muc";
    }
    $listt = qdo_query($sql);
    return $listt;
}


function get_tin_tuc_select_all($page, $soluongsp)
{
    $start = ($page - 1) * $soluongsp;
    $sql = "SELECT tt.*, dm.ten_danh_muc FROM tin_tuc AS tt INNER JOIN danh_muc_tin_tuc AS dm ON dm.id= tt.id_danh_muc";
    $sql .= " LIMIT " . $start . "," . $soluongsp;
    return qdo_query($sql);
}

function hien_thi_so_trang_ds_tin_tuc($tong_sp, $soluongsp) {
    $tongsp = count($tong_sp);
    $so_trang = ceil($tongsp / $soluongsp);
    $html_so_trang = "";
    for ($i = 1; $i <= $so_trang; $i++) {
        $html_so_trang .= '<li><a href="index.php?tin_tuc&page=' . $i . '">' . $i . '</a></li>';
    }
    return $html_so_trang;
}
//  Danh Mục Tin Tức

function get_danh_muc_tin_tuc_sellect_all($page, $soluongsp)
{
    $start = ($page - 1) * $soluongsp;
    $sql = "SELECT * FROM danh_muc_tin_tuc";
    $sql .= " LIMIT " . $start . "," . $soluongsp;
    return qdo_query($sql);
}

function danh_muc_tin_tuc_sellect_all()
{
    $sql = "SELECT * FROM danh_muc_tin_tuc";
    return qdo_query($sql);
}

function hien_thi_so_trang_ds_dm_tin_tuc($tong_sp, $soluongsp)
{
    $tongsp = count($tong_sp);
    $so_trang = ceil($tongsp / $soluongsp);
    $html_so_trang = "";
    for ($i = 1; $i <= $so_trang; $i++) {
        $html_so_trang .= '<li><a href="index.php?list_danh_muc&page=' . $i . '">' . $i . '</a></li>';
    }
    return $html_so_trang;
}

function danh_muc_tin_tuc_sellect_id($id)
{
    $sql = "SELECT * FROM danh_muc_tin_tuc WHERE id = '$id'";
    return qdo_query_one($sql);
}

function danh_muc_tin_tuc_insert($ten_danh_muc)
{
    $sql = "INSERT INTO danh_muc_tin_tuc(ten_danh_muc) VALUES ('$ten_danh_muc')";
    pdo_execute($sql);
}

function danh_muc_tin_tuc_delete($id)
{
    $sql = "DELETE FROM danh_muc_tin_tuc WHERE id = '$id'";
    pdo_execute($sql);
}

function danh_muc_tin_tuc_edit($ten_danh_muc, $id)
{
    $sql = "UPDATE danh_muc_tin_tuc SET ten_danh_muc = '$ten_danh_muc' , id = '$id' ";
    pdo_execute($sql);
}