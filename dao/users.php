<?php

require_once ("pdo.php");

function get_users_select_all($page, $soluongsp)
{

    $start = ($page - 1) * $soluongsp;
    $sql = "SELECT * FROM users";
    $sql .= " LIMIT " . $start . "," . $soluongsp;
    return qdo_query($sql);
}

function delete_gh_by_user($ma_kh)
{
    $sql = "DELETE FROM gio_hang WHERE ma_kh = $ma_kh";
    pdo_execute($sql);
}

function delete_dh_by_user($ma_kh)
{

    $sqlGetBt = "SELECT * FROM don_hang WHERE ma_kh = $ma_kh";
    $ds_bt = qdo_query($sqlGetBt);
    foreach ($ds_bt as $key => $value) {
        $sql = "DELETE FROM chi_tiet_don_hang WHERE ma_dh = ?";
        pdo_execute($sql, $value["ma_dh"]);
    }

    $sql1 = "DELETE FROM don_hang WHERE ma_kh = $ma_kh";
    pdo_execute($sql1);
}

function delete_yt_by_user($ma_kh)
{
    $sql = "DELETE FROM yeu_thich WHERE ma_kh = $ma_kh";
    pdo_execute($sql);
}

function delete_bl_by_user($ma_kh)
{
    $sql = "DELETE FROM binh_luan WHERE ma_kh = $ma_kh";
    pdo_execute($sql);
}

function users_all()
{

    $sql = "SELECT * FROM users";
    return qdo_query($sql);
}

function hien_thi_so_trang_ds_users($tong_sp, $soluongsp)
{
    $tongsp = count($tong_sp);
    $so_trang = ceil($tongsp / $soluongsp);
    $html_so_trang = "";
    for ($i = 1; $i <= $so_trang; $i++) {
        $html_so_trang .= '<li><a href="index.php?list_users&page=' . $i . '">' . $i . '</a></li>';
    }
    return $html_so_trang;
}

function users_insert($user_name, $mat_khau, $ho_ten, $email, $vai_tro, $kich_hoat, $hinh)
{
    $sql = "INSERT INTO users(user_name,mat_khau,ho_ten,email,vai_tro,kich_hoat,hinh) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $user_name, $mat_khau, $ho_ten, $email, intval($vai_tro), intval($kich_hoat), $hinh);

}

function users_edit_login($user_name, $ho_ten, $email, $hinh, $ma_kh)
{
    $sql = "UPDATE users SET user_name = ?, ho_ten = ?, email = ?, hinh = ? WHERE ma_kh = ?";

    pdo_execute($sql, $user_name, $ho_ten, $email, $hinh, $ma_kh);

}

function users_edit_login_not_img($user_name, $ho_ten, $email, $ma_kh)
{
    $sql = "UPDATE users SET user_name = ?, ho_ten = ?, email = ? WHERE ma_kh = ?";

    pdo_execute($sql, $user_name, $ho_ten, $email, $ma_kh);

}

function users_delete($ma_kh)
{

    $sql = "DELETE FROM users WHERE ma_kh = $ma_kh";
    pdo_execute($sql);
}


function users_update($ma_kh, $user_name, $mat_khau, $ho_ten, $email, $vai_tro, $kich_hoat, $hinh)
{
    $sql = "UPDATE users SET user_name = ?, mat_khau = ?, ho_ten = ?, email = ?, vai_tro = ?, kich_hoat = ?, hinh = ? WHERE ma_kh = ?";

    pdo_execute($sql, $user_name, $mat_khau, $ho_ten, $email, intval($vai_tro), intval($kich_hoat), $hinh, $ma_kh);
}

function users_select_by_id($edit_id)
{
    $sql = "SELECT * From users WHERE ma_kh = $edit_id";
    return qdo_query_one($sql);
}

function check_user_login_user_name($user_name)
{
    $sql = "SELECT * FROM users WHERE user_name = ?";
    return qdo_query_one($sql, $user_name);


}

function check_user_change_pass($user_name, $email)
{
    $sql = "SELECT * FROM users WHERE user_name = ? AND email = ?";
    return qdo_query_one($sql, $user_name, $email);
}

function update_password($user_name, $email, $password)
{
    $sql = "UPDATE users SET mat_khau = ? WHERE user_name =? AND email =?";
    return pdo_execute($sql, $password, $user_name, $email);
}

function edit_pass($ma_kh, $new_mat_khau)
{
    $sql = "UPDATE users SET mat_khau = ? WHERE ma_kh =?";
    return pdo_execute($sql, $new_mat_khau, $ma_kh);
}
?>