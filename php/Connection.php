<?php

class Connection {

    var $koneksi;

    public function closeConnection() {
        mysql_close($this->koneksi);
    }

    public function openConnection() {
        $server = 'localhost';
        $database = 'web_pembelian';
        $user = 'root';
        $password = 'admin';

        $this->koneksi = mysql_connect($server, $user, $password) or die(mysql_error());
        if ($this->koneksi) {
            mysql_select_db($database) or die(mysql_error());
        } else {
            echo 'Koneksi ke database gagal';
        }
    }
}

?>
