<?php

    include('./CPembelian.php');
    
    $head = $_POST["head"];
    $detail = $_POST["detail"];

    $cpembelian = new CPembelian();
    $cpembelian->setSupplierid($head['supplier']);
    $cpembelian->setNopembelian($head['nopembelian']);
    $cpembelian->setTglpembelian($head['tglpembelian']);
    $cpembelian->setJumlahharga(0);
    
    $hasil = $cpembelian->insertData();
    
    session_start();
    
    if($hasil) {
        $_SESSION["rc"] = "sukses";
    } else {
        $_SESSION["rc"] = "gagal";
    }

    header('Location: pembelianform.php');
    
?>
