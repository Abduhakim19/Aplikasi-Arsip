
<?php

include 'aksi.php';
$aksi = new AKSI();
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

?>
<html>
	<head>
		<link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="cari.css">
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
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="data-arsip.php">Data Arsip</a></li>
		<li><a href="input-arsip.php">Input Arsip</a></li>
		<li><a href="cari-arsip.php">Cari Arsip</a></li>
		<li><a href="#">Logout</a></li>
		</ul>
	</nav>
	
<div class="content">
	<p class = "judul">
		Cari Berkas
	</p>
	
    <div class="cari">
        <form action="" method="POST">
        <div class="kdari">
            Dari Tanggal
            <input type='date' name='from'>
        </div>

        <div class="ksampai">
            Sampai Tanggal
            <input type='date' name='sampai'>
        </div>

        <input type="submit" name='cari'>
        </form>

    </div>
    <table>
        <tr>
        <td>Nama Berkas</td>
            <td>Nomor Berkas</td>
            <td>Nomor Surat</td>
            <td>Jenis Surat</td>
			<td>Perihal</td>
            <td>Tanggal</td>
        </tr>
        <?php 
        if (isset($_POST['cari'])) {
            $dari = $_POST['from'];
            $sampai = $_POST['sampai'];
            foreach ($aksi->cariArsip($dari, $sampai) as $v){
                ?>
            <tr>
                <td><?= $v['nama_berkas']?></td>
                <td><?= $v['no_berkas']?></td>
				<td><?= $v['no_surat']?></td>
                <td><?= $v['Nm_Cat']?></td>
                <td><?= $v['perihal']?></td>
                <td><?= $v['Tgl_Masuk']?></td>
            </tr>
        

          <?php  
            }
        }?>
    </table>

</div>

<div class="footer">
	Copyright Hakim
</div>
	</body>
</html>