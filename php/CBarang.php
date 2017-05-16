<?php

    require_once('./Connection.php');
    
    class CBarang {
        private $c, $kode, $nama, $insert;
        
        public function CBarang() {
            
        }
        
        public function getKode() {
            return $this->kode;
        }

        public function getNama() {
            return $this->nama;
        }
        public function setKode($kode) {
            $this->kode = $kode;
        }

        public function setNama($nama) {
            $this->nama = $nama;
        }

        public function getData() {
            $sql = "SELECT * FROM barang";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }
        
        public function insertData() {
            $insert = false;
            
            $sql = "INSERT INTO barang (kode, nama) VALUES "
                    . "('".$this->getKode()."','".$this->getNama()."')";
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
            $sql = "SELECT * FROM barang where kode='".$this->getKode()."';";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }
        
        public function updateDate() {
            $updated = false;
            
            $sql = "UPDATE barang set kode = '".$this->getKode()."', nama = '".$this->getNama()."' where kode = '".$this->getKode()."'";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            if($query) {
                $updated = true;
            }
            $c->closeConnection();
            
            return $updated;
        }

    }

?>