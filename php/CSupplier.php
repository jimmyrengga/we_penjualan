<?php

    require('./Connection.php');
    
    class CSupplier {
        private $c, $supplier_id, $nama, $alamat, $insert;
        
        public function CSupplier() {
            
        }
        
        public function getSupplier_id() {
            return $this->supplier_id;
        }

        public function getNama() {
            return $this->nama;
        }

        public function getAlamat() {
            return $this->alamat;
        }

        public function setSupplier_id($supplier_id) {
            $this->supplier_id = $supplier_id;
        }

        public function setNama($nama) {
            $this->nama = $nama;
        }

        public function setAlamat($alamat) {
            $this->alamat = $alamat;
        }

        public function getData() {
            $sql = "SELECT * FROM supplier";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }
        
        public function insertData() {
            $insert = false;
            
            $sql = "INSERT INTO supplier (supplier_id, nama, alamat) VALUES "
                    . "('".$this->getSupplier_id()."','".$this->getNama()."','".$this->getAlamat()."')";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            if($query) {
                $insert = true;
            }
            $c->closeConnection();
            
            return $insert;
        }

    }

?>