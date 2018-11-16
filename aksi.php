<?php

include 'config.php';

class AKSI extends DB {
    public function tampilarsip($table){
        $sql  = "SELECT * FROM ".$table." inner join category on arsip.id_jenis = category.Id_Dok";
        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($x = mysqli_fetch_array($query)) {
            $data[] = $x;
        }
        return $data;
    }


    public function tampil($table){
        $sql  = "SELECT * FROM ".$table;
        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($x = mysqli_fetch_array($query)) {
            $data[] = $x;
        }
        return $data;
    }

    public function cariArsip($dari, $sampai){
        $sql = "SELECT * FROM arsip inner join category on arsip.id_jenis = category.Id_Dok inner join arsipmasuk on arsip.id_arsip=arsipmasuk.Id_Dok WHERE Tgl_Masuk between '$dari' and '$sampai'";
        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($x = mysqli_fetch_array($query)) {
            $data[] = $x;
        }
        return $data;

    }

    public function insert($nmr, $srtmsk, $jenis, $perihal, $namaB ,$poto){
        $query = "INSERT INTO arsip( no_berkas, no_surat, id_jenis, perihal, nama_berkas, nama_poto) VALUES ($nmr,'$srtmsk',$jenis,'$perihal','$namaB'
        ,'$poto')";
        $sql = mysqli_query($this->conn, $query);
        if ($sql) {
            return true;
        }
        return false;
    }

    public function update($nmr, $nmrs , $jenis, $prs, $nm, $id, $fileNameNew){
        $query = "UPDATE arsip SET no_berkas=$nmr, no_surat='$nmrs', id_jenis=$jenis, perihal='$prs', nama_berkas='$nm', nama_poto='$fileNameNew' WHERE id_arsip=$id";
        $hasil = mysqli_query($this->conn, $query);
        if ($hasil) {
            return true;
        }
        return false;
    }

    public function lihat1($id){
        $query = "SELECT * FROM arsip WHERE arsip.id_arsip=$id";
        $hasil = mysqli_query($this->conn, $query);
        $data = [];
        while ($x = mysqli_fetch_array($hasil)) {
            $data[] = $x;
        }
        return $data;
    }

    public function delete($id){
        $query = "DELETE FROM arsip WHERE id_arsip=$id";
        $hasil = mysqli_query($this->conn, $query);
        if ($hasil) {
            return true;
        }
        return false;
    }


    public function login($user, $pass){
        $hasil = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$user' and password = '$pass'");
        if (mysqli_num_rows($hasil) > 0) {
            return true;
        }
        return false;

    }


}


?>