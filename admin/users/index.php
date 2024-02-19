<?php
require_once("../../dao/users.php");
require_once("../../dao/pdo.php");
require("../../global.php");
// extract($_REQUEST);

if (exist_param("add_users")) {
    $errors = [];
    $VIEW_NAME = "users/add_user.php";

} else if (exist_param("list_users")) {

    $ds_users = users_select_all();

    $VIEW_NAME = "users/users.php";

} else if (exist_param("btn_add_users")) {
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $ho_ten = $_POST["ho_ten"];
    $hinh = save_file("image", $UPLOAD_URL);
    $mat_khau = $_POST["mat_khau"];
    $vai_tro = intval($_POST["vai_tro"]);
    $kich_hoat = intval($_POST["kich_hoat"]);
    $errors = [];

    if ($user_name == "") {
        $errors["user_name"] = "Trường bắt buộc nhập";
    }
    if ($email == "") {
        $errors["email"] = "Trường bắt buộc nhập";
    }
    if ($ho_ten == "") {
        $errors["ho_ten"] = "Trường bắt buộc nhập";
    }
    if ($hinh == "") {
        $errors["hinh"] = "Trường bắt buộc nhập";
    }
    if ($mat_khau == "") {
        $errors["mat_khau"] = "Trường bắt buộc nhập";
    }
    if (count($errors) > 0) {
        $VIEW_NAME = "users/add_user.php";
    } else {
        users_insert($user_name, $mat_khau, $ho_ten, $email, $vai_tro, $kich_hoat, $hinh);

        $ds_users = users_select_all();

        $VIEW_NAME = "users/users.php";

    }




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

    users_update($ma_kh, $user_name, $mat_khau, $ho_ten, $email, $vai_tro, $kich_hoat, $hinh);

    $ds_users = users_select_all();

    $VIEW_NAME = "users/users.php";
} elseif (exist_param("btn_delete")) {
    $delete_id = $_GET["ma_kh"];
    users_delete($delete_id);
    $ds_users = users_select_all();
    $VIEW_NAME = "users/users.php";
} else {
    $errors = [];
    $VIEW_NAME = "users/add_user.php";

}

require("../layout.php");

?>