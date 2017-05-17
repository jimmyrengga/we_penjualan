<?php

    require_once('./Connection.php');
    
    class CPembelian {
        private $c, $nopembelian, $tglpembelian, $supplierid, $jumlahharga, $insert;
        
        public function CPembelian() {
            
        }
        
        function getNopembelian() {
            return $this->nopembelian;
        }

        function getTglpembelian() {
            return $this->tglpembelian;
        }

        function getSupplierid() {
            return $this->supplierid;
        }

        function getJumlahharga() {
            return $this->jumlahharga;
        }

        function setNopembelian($nopembelian) {
            $this->nopembelian = $nopembelian;
        }

        function setTglpembelian($tglpembelian) {
            $this->tglpembelian = $tglpembelian;
        }

        function setSupplierid($supplierid) {
            $this->supplierid = $supplierid;
        }

        function setJumlahharga($jumlahharga) {
            $this->jumlahharga = $jumlahharga;
        }

        public function getData() {
            $sql = "SELECT * FROM trx_pembelian";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }
        
        public function insertData() {
            $insert = false;
            
            $sql = "INSERT INTO trx_pembelian (no_pembelian, tgl_pembelian, supplier_id, jumlah_harga) VALUES "
                    . "('".$this->getNopembelian()."','".$this->getTglpembelian()."','".$this->getSupplierid()."','".$this->getJumlahharga()."')";
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
            $sql = "SELECT * FROM trx_pembelian where no_pembelian='".$this->getNopembelian()."'";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }

    }

?>