<?php

class DB {
    public $conn;
    public function __construct(){
        $host = 'Localhost';
        $user = 'root';
        $pw = '';
        $db  = 'arsip';
        $this->conn = mysqli_connect($host, $user, $pw, $db);
    }
}

?>