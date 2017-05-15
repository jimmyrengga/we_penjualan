<?php

    include_once('./CPembelian.php');
    include_once('./CPembelianDetail.php');
    
    $head = $_POST["head"];
    $detail = $_POST["detail"];

    $time = strtotime($head['tglpembelian']);
    
    $cpembelian = new CPembelian();
    $cpembelian->setSupplierid($head['supplier']);
    $cpembelian->setNopembelian($head['nopembelian']);
    if ($time != false){
        $new_date = date('Y-m-d', $time);
        $cpembelian->setTglpembelian($new_date);
    }

    $cpembelian->setJumlahharga(0);
    
    $hasil = $cpembelian->insertData();
    
    for ($i = 0; $i < sizeof($detail['kdbarang']); $i++) {
        
        echo "<pre>";
        print_r($detail);
        echo "</pre>";
        
        $cpembelianDetail = new CPembelianDetail();
        $cpembelianDetail->setNopembelian($head['nopembelian']);
        $cpembelianDetail->setKodebarang($detail['kdbarang'][$i]);
        $cpembelianDetail->setQty($detail['qty'][$i]);
        $cpembelianDetail->setHargasatuan($detail['hrgsatuan'][$i]);
        $cpembelianDetail->setTotalharga($detail['total'][$i]);
        
        $cpembelianDetail->insertData();
    }
    
    session_start();
    
    if($hasil) {
        $_SESSION["rc"] = "sukses";
    } else {
        $_SESSION["rc"] = "gagal";
    }

    header('Location: pembelianform.php');
    
?>
