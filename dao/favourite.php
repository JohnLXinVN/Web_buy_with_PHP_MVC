<?php

function hang_hoa_yt_insert($ma_hh, $ma_kh)
{
    $sql = "INSERT INTO yeu_thich(ma_hh,ma_kh) VALUES ('$ma_hh' , '$ma_kh')";
    pdo_execute($sql);
}

function remove_hang_hoa_yt($id)
{
    $sql = "DELETE FROM yeu_thich WHERE id = '$id'";
    pdo_execute($sql);
}

function hang_hoa_yt_select_all()
{
    $sql = "SELECT hh.* , lh.* , u.* , yt.id FROM hang_hoa as hh 
        inner join loai_hang as lh on lh.ma_loai = hh.ma_loai
        inner join yeu_thich as yt on yt.ma_hh = hh.ma_hh
        inner join users as u on u.ma_kh = yt.ma_kh";
    return qdo_query($sql);
}

function hang_hoa_yt_select_ma_kh($ma_kh)
{
    $sql = "SELECT hh.* , lh.* , u.ma_kh , yt.id FROM hang_hoa as hh 
        inner join loai_hang as lh on lh.ma_loai = hh.ma_loai
        inner join yeu_thich as yt on yt.ma_hh = hh.ma_hh
        inner join users as u on u.ma_kh = yt.ma_kh where yt.ma_kh = '$ma_kh'";
    return qdo_query($sql);
}

function ma_loai_yt()
{
    $sql = "SELECT ma_hh FROM yeu_thich";
    return qdo_query($sql);
}

function kiem_tra_hh_yt($ma_kh)
{
    $sql = "SELECT COUNT(*) as count FROM yeu_thich WHERE  ma_kh = '$ma_kh'";
    return qdo_query($sql);
}
