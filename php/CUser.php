<?php

    require_once('./Connection.php');
    
    class CUser {
        private $c, $userid, $password, $namalengkap, $status, $insert;
        
        public function CUser() {
            
        }
        
        public function getUserid() {
            return $this->userid;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getNamalengkap() {
            return $this->namalengkap;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setUserid($userid) {
            $this->userid = $userid;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setNamalengkap($namalengkap) {
            $this->namalengkap = $namalengkap;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getData() {
            $sql = "SELECT * FROM user";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }
        
        public function insertData() {
            $insert = false;
            
            $sql = "INSERT INTO user (user_id, password, status, nama_lengkap) VALUES "
                    . "('".$this->getUserid()."','".$this->getPassword()."','".$this->getStatus()."','".$this->getNamalengkap()."')";
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
            $sql = "SELECT * FROM user where user_id='".$this->getUserid()."';";
            $c = new Connection();
            $c->openConnection();
            $query = mysql_query($sql) or die(mysql_error());
            
            $c->closeConnection();
            
            return $query;
        }
        
        public function updateData() {
            $updated = false;
            
            $sql = "UPDATE user set password = '".$this->getPassword()."', status = '".$this->getStatus()."', nama_lengkap = '".$this->getNamalengkap()."' where user_id = '".$this->getUserid()."'";
			
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