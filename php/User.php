<?php

    include('./CUser.php');
    
    $userid = $_POST['userid'];
    $pwd = $_POST['pwd'];
    $status = $_POST['status'];
    $namalengkap = $_POST['namalengkap'];

    $cuser = new CUser();
    $cuser->setNamalengkap($namalengkap);
    $cuser->setPassword($pwd);
    $cuser->setStatus($status);
    $cuser->setUserid($userid);
    
    $hasil = $cuser->insertData();
    
    session_start();
    
    if($hasil) {
        $_SESSION["rc"] = "sukses";
    } else {
        $_SESSION["rc"] = "gagal";
    }

    header('Location: userlist.php');
    
?>
