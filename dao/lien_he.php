<?php
    function lien_he_insert ($ma_kh , $ho_ten , $email ,  $message) {
        $sql = "INSERT INTO lien_he(ma_kh,ho_ten,email,message) VALUES ('$ma_kh','$ho_ten','$email','$message')";
        pdo_execute($sql);
    }