<?php

    require_once('./Connection.php');
    
    class CPembelianDetail {
        private $c, $nopembelian, $kodebarang, $qty, $hargasatuan, $totalharga, $insert;
        
        public function CPembelianDetail() {
            
        }

        function getNopembelian() {
            return $this->nopembelian;
        }

        function getKodebarang() {
            return $this->kodebarang;
        }

        function getQty() {
            return $this->qty;
        }

        function getHargasatuan() {
            return $this->hargasatuan;
        }

        function getTotalharga() {
            return $this->totalharga;
        }

        function setNopembelian($nopembelian) {
            $this->nopembelian = $nopembelian;
        }

        function setKodebarang($kodebarang) {
            $this->kodebarang = $kodebarang;
        }

        function setQty($qty) {
            $this->qty = $qty;
        }

        function setHargasatuan($hargasatuan) {
            $this->hargasatuan = $hargasatuan;
        }

        function setTotalharga($totalharga) {
            $this->totalharga = $totalharga;
        }

        public function getData() {
            $sql = "SELECT * FROM trx_pembelian_detail";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }
        
        public function insertData() {
            $insert = false;
            
            $sql = "INSERT INTO trx_pembelian_detail (no_pembelian, kode_barang, qty, harga_satuan, total_harga) VALUES "
                    . "('".$this->getNopembelian()."','".$this->getKodebarang()."','".$this->getQty()."','".$this->getHargasatuan()."','".$this->getTotalharga()."')";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            if($query) {
                $insert = true;
            }
            $c->closeConnection();
            
            return $insert;
        }
        
        public function getSearch() {
            $sql = "SELECT * FROM trx_pembelian_detail where no_pembelian='".$this->getNopembelian()."'";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }

    }

?>