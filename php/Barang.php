<?php

    include('./CBarang.php');
    
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    $cbarang = new CBarang();
    $cbarang->setKode($kode);
    $cbarang->setNama($nama);
    
    $hasil = $cbarang->insertData();
    
    session_start();
    
    if($hasil) {
        $_SESSION["rc"] = "sukses";
    } else {
        $_SESSION["rc"] = "gagal";
    }

    header('Location: baranglist.php');
    
?>
