<?php

    session_start();
    
    $server = 'localhost';
    $database = 'web_pembelian';
    $user = 'root';
    $password = 'admin';
    
    $constatus = mysql_connect($server, $user, $password) or die(mysql_error());
    if($constatus) {
        mysql_select_db($database) or die(mysql_error());
    } else {
        echo 'Koneksi ke database gagal';
    }
    
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    
    $query = "SELECT * FROM user where user_id='$username' and password='$passwd' and status=1";
    $hasil = mysql_query($query);
    
    $cek = mysql_num_rows($hasil);
    
    if($cek) {
        $_SESSION['user'] = $username;
        
        header('Location: home.php');
    } else {
        $_SESSION['rc'] = 'gagal';
        header('Location: index.php');
    }

?>