<?php

include 'aksi.php';
$aksi = new AKSI();
session_start();
if (!$_SESSION['username']) {
	header('Location: login.php');
}

?>

<html>
	<head>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
	<nav>
		<ul>
		<li class="atas">
			<div id="gambar">
			<img src="">
			</div>
			<p class="user">Username</p>
		</li>
		<li><a href="#">Dashboard</a></li>
		<li><a href="data-arsip.php">Data Arsip</a></li>
		<li><a href="input-arsip.php">Input Arsip</a></li>
		<li><a href="cari-arsip.php">Cari Arsip</a></li>
		<li><a href="#">Logout</a></li>
		</ul>
	</nav>
	
<div class="content">
	<p class = "judul">
		Input Arsip
	</p>
	
	<hr>
	<form action="proses.php?aksi=input" method="post" enctype="multipart/form-data">
    <table>

    <tr>
        <td>Nama Berkas</td>
        <td><input type="text" name="nm_berkas" id=""></td>
    </tr>
    <tr>
        <td>Nomor Berkas</td>
        <td><input type="text" name="nmr_berkas" id=""></td>
    </tr>

    <tr>
        <td>Nomor Surat Masuk</td>
        <td><input type="text" name="surat_msk" id=""></td>
    </tr>

    <tr>
        <td>Tanggal Masuk</td>
        <td><input type="date" name="tgl_masuk" id=""></td>
    </tr>

    <tr>
        <td>Pilih Jenis Surat</td>
        <td>
        <select name="category" style="width: 180px;">
            <option>----Pilih Jenis Surat----</option>
        <?php
                foreach ($aksi->tampil('category') as $c) {
              ?>
                <option value="<?= $c['Id_Dok']?>"><?= $c['Nm_Cat']?></option>
            <?php 
                }
            ?>
        </select>
        </td>
    </tr>

    <tr>
        <td>
            Poto Berkas
        </td>
        <td><input type="file" name="gmbr"></td>
    </tr>

    <tr>
        <td>Perihal</td>
        <td><input type="text" name="perihal" id=""></td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" value="Upload Berkas"></td>
    </tr>
    </table>
    </form>
</div>

<div class="footer">
	Copyright Hakim
</div>
	</body>
</html>
