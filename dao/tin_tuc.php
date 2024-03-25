<?php
require_once("pdo.php");
function tin_tuc_select_all()
{
    $sql = "SELECT tt.*, dm.ten_danh_muc FROM tin_tuc AS tt INNER JOIN danh_muc_tin_tuc AS dm ON dm.id= tt.id_danh_muc";
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

function tin_tuc_insert ($tieu_de , $mo_ta , $noi_dung , $hinh , $tac_gia , $ngay_xuat_ban , $id_danh_muc) {
    $sql = "INSERT INTO tin_tuc(tieu_de , mo_ta , noi_dung , hinh , tac_gia , ngay_xuat_ban , id_danh_muc) VALUES ('$tieu_de' , '$mo_ta' , '$noi_dung' , '$hinh' , '$tac_gia' , '$ngay_xuat_ban' , '$id_danh_muc')";
    pdo_execute($sql);
}

function tin_tuc_delete ($id_tin_tuc) {
    $sql = "DELETE FROM tin_tuc where id_tin_tuc = '$id_tin_tuc'";
    pdo_execute($sql);
}

function tin_tuc_edit ($tieu_de , $mo_ta , $noi_dung , $hinh , $tac_gia , $ngay_xuat_ban , $id_danh_muc , $id_tin_tuc)  {
    $sql = "UPDATE tin_tuc SET tieu_de = '$tieu_de' , mo_ta = '$mo_ta' , noi_dung = '$noi_dung' , hinh = '$hinh' , tac_gia = '$tac_gia' , ngay_xuat_ban = '$ngay_xuat_ban' , id_danh_muc = '$id_danh_muc' WHERE id_tin_tuc = $id_tin_tuc"; 
    pdo_execute($sql);
}


//  Danh Mục Tin Tức

function danh_muc_tin_tuc_sellect_all()
{
    $sql = "SELECT * FROM danh_muc_tin_tuc";
    return qdo_query($sql);
}

?>