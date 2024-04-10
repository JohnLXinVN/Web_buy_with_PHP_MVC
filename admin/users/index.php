<?php
require_once ("../../dao/users.php");
require_once ("../../dao/pdo.php");
require ("../../global.php");
// extract($_REQUEST);

if (exist_param("add_users")) {
    $errors = [];
    $VIEW_NAME = "users/add_user.php";

} else if (exist_param("list_users")) {

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $soluongsp = 5;

    $ds_users = get_users_select_all($page, $soluongsp);
    $tong_sp = users_all();
    $hien_thi_so_trang = hien_thi_so_trang_ds_users($tong_sp, $soluongsp);

    $VIEW_NAME = "users/users.php";

} else if (exist_param("btn_add_users")) {
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $ho_ten = $_POST["ho_ten"];
    $hinh = save_file("image", $UPLOAD_URL);
    $mat_khau = $_POST["mat_khau"];
    $vai_tro = intval($_POST["vai_tro"]);
    $kich_hoat = intval($_POST["kich_hoat"]);

    users_insert($user_name, $mat_khau, $ho_ten, $email, $vai_tro, $kich_hoat, $hinh);

    header("Location: /admin/users/index.php?list_users");


} elseif (exist_param("edit_user")) {
    $edit_id = $_GET["ma_kh"];
    $data_edit = users_select_by_id($edit_id);
    $VIEW_NAME = "users/edit_user.php";
} elseif (exist_param("btn_edit_user")) {
    $ma_kh = $_POST["ma_kh"];
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $ho_ten = $_POST["ho_ten"];
    $hinh = save_file("image", $UPLOAD_URL);
    $mat_khau = $_POST["mat_khau"];
    $vai_tro = intval($_POST["vai_tro"]);
    $kich_hoat = intval($_POST["kich_hoat"]);
    if (!$hinh) {
        $hinh = $_POST["hinh_no_load"];
    }

    users_update($ma_kh, $user_name, $mat_khau, $ho_ten, $email, $vai_tro, $kich_hoat, $hinh);

    header("Location: /admin/users/index.php?list_users");

} elseif (exist_param("btn_delete")) {
    $delete_id = $_GET["ma_kh"];

    delete_gh_by_user($delete_id);
    delete_dh_by_user($delete_id);
    delete_bl_by_user($delete_id);
    delete_yt_by_user($delete_id);
    users_delete($delete_id);
    header("Location: /admin/users/index.php?list_users");

} else {
    $errors = [];
    $VIEW_NAME = "users/add_user.php";

}

require ("../layout.php");

?>