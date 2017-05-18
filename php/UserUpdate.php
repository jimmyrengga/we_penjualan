<?php

    include('./CUser.php');
    
    $user = $_POST['user'];
    $nama_lengkap = $_POST['nama'];
    $status = $_POST['status'];
    $password = $_POST['password'];

    $cuser = new CUser();
    $cuser->setUserid($user);
    $cuser->setPassword($password);
    $cuser->setStatus($status);
    $cuser->setNamalengkap($nama_lengkap);
    
    $hasil = $cuser->updateData();
    
    session_start();
    
    if($hasil) {
        $_SESSION["rc"] = "sukses";
    } else {
        $_SESSION["rc"] = "gagal";
    }

    header('Location: userlist.php');
    
?>