<?php

include 'aksi.php';
$aksi = new AKSI();

if($_GET['aksi']){
    switch ($_GET['aksi']) {
        case 'input':

        $fileName = $_FILES['gmbr']['name'];
        $fileSize = $_FILES['gmbr']['size'];
        $fileType = $_FILES['gmbr']['type'];
        $fileTmpName = $_FILES['gmbr']['tmp_name'];
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'png', 'jpg');
        if (in_array($fileActualExt, $allowed)) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'gambar/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            echo $fileNameNew;
            // Insert
            $hasil = $aksi->insert($_POST['nmr_berkas'], $_POST['surat_msk'], $_POST['category'], $_POST['perihal'], $_POST['nm_berkas'],$fileNameNew);
            
            if ($hasil) {
                header("Location: input-arsip.php");
            }else{
                echo 'Salah ini query';
            }
        }
        break;
        case 'login':
            session_start();
            $user = $_POST['username'];
            $pass = $_POST['pass'];

           if ($aksi->login($user, $pass)) {
               $_SESSION['username'] = $user;
               header('Location: index.php');
           } 
        break;

        case 'hapus':
           $id = $_GET['id'];
           if ($aksi->delete($id)) {
               header('Location: data-arsip.php');
           }
           break;

        case 'edit':
           $id = $_GET['id'];
           echo json_encode($aksi->lihat1($id));
           break;
        case 'inputEdit':
            $id = $_POST['id'];
            $Ngambar = $_FILES['gambar']['name'];
            $Tgambar = $_FILES['gambar']['type'];
            $TNgambar = $_FILES['gambar']['tmp_name'];
            $gambarext = explode(".",$Ngambar);
            $gambarActualExt = strtolower(end($gambarext));
            $allowed = array("jpg", "png" );
            if (in_array($gambarActualExt, $allowed)) {
                $gambarNameNew = uniqid('', true).".".$gambarActualExt;
                $gambarDestination = "gambar/".$gambarNameNew;
                move_uploaded_file($TNgambar, $gambarDestination);

                echo $gambarNameNew;
                $hasil = $aksi->update($_POST['nmr_berkas'], $_POST['surat_msk'], $_POST['category'], $_POST['perihal'], $_POST['nm_berkas'], $id, $gambarNameNew);
                if ($hasil) {
                    header("Location: index.php");
                }else{
                    echo 'salah query';
                }
        }
        
        break;
    }
}





?>