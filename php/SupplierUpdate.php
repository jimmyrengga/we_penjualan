<?php

    include('./CSupplier.php');
    
    $supplier_id = $_POST['supplier_id'];
    $nama = $_POST['nama'];
	$alamat = $_POST['alamat'];

    $csupplier = new CSupplier();
    $csupplier->setSupplier_id($supplier_id);
    $csupplier->setNama($nama);
	$csupplier->setAlamat($alamat);
    
    $hasil = $csupplier->updateDate();
    
    session_start();
    
    if($hasil) {
        $_SESSION["rc"] = "sukses";
    } else {
        $_SESSION["rc"] = "gagal";
    }

    header('Location: supplierlist.php');
    
?>