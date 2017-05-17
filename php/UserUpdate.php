<?php

    include('./CUser.php');
    
    $user = $_POST['user'];
    $nama_lengkap = $_POST['nama'];
	$status = $_POST['status'];
	$password = $_POST['password'];

    $cuser = new CUser();
    $cuser->getUserid($user);
    $cuser->getPassword($password);
	$cuser->getStatus($status);
	$cuser->getNamalengkap($nama_lengkap);
    
    $hasil = $cuser->updateDate();
    
    session_start();
    
    if($hasil) {
        $_SESSION["rc"] = "sukses";
    } else {
        $_SESSION["rc"] = "gagal";
    }

    header('Location: userlist.php');
    
?>