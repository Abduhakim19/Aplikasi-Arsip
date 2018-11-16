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
		<link rel="stylesheet" href="data-arsip.css">
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
		Data Arsip
	</p>
	
	<hr>
	<table>
        <tr>
            <td>Nama Berkas</td>
            <td>Nomor Berkas</td>
            <td>Nomor Surat</td>
            <td>Jenis Surat</td>
			<td>Perihal</td>
			<td colspan=3>Action</td>
        </tr>

		
        <?php
        foreach($aksi->tampilarsip('arsip') as $v) {
        ?>
            <tr>
                <td><?= $v['nama_berkas']?></td>
                <td><?= $v['no_berkas']?></td>
				<td><?= $v['no_surat']?></td>
                <td><?= $v['Nm_Cat']?></td>
                <td><?= $v['perihal']?></td>
				<td><a href="proses.php?aksi=hapus&id=<?=$v['id_arsip']?>" onclick="return confirm('Apakah anda yakin')">Hapus</a></td>
				<td><a href="javascript:void(0)" onclick="showedit(this)" id="<?=$v['id_arsip']?>">Edit</a></td>
				<td><a href="javascript:void(0)" id="<?=$v['id_arsip']?>">Detail</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div class="aPopUp">
	<div class="cPopUp">
		<div class="hPopUp">
		<h2>Edit Data</h2>
		</div>
		<div class="iPopUp">
		<form id="form" action="proses.php?aksi=inputEdit" method="post" enctype="multipart/form-data">
    	<table>

    	<tr>
        	<td>Nama Berkas</td>
        	<td><input type="text" name="nm_berkas" class="nm_berkas"></td>
    	</tr>
    	<tr>
        	<td>Nomor Berkas</td>
        	<td><input type="text" name="nmr_berkas" class="nmr_berkas"></td>
    	</tr>
		<input type="hidden" name="id" class="id">
    	<tr>
        	<td>Nomor Surat Masuk</td>
        <td><input type="text" name="surat_msk"  class="nmr_surat_berkas"></td>
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
        	<td>Edit Gambar</td>
        	<td>
				<img class="gambarP">
				<input type="file" id="files"  name="gambar" onchange="previewFile(event)">
			</td>
    	</tr>


    	<tr>
        	<td>Perihal</td>
        	<td><input type="text" name="perihal" id="" class="perihal"></td>
    	</tr>

    	<tr>
        	<td></td>
        	<td><input type="submit" value="Edit Berkas"></td>
    	</tr>
    	</table>
    	</form>
		</div>
		

		</div>
	</div>
</div>


<div class="pdetail">

</div>

<div class="footer">
	Copyright Hakim
</div>

<script>
	const pg = document.querySelector('.pilihGambar');
	const bggambar = document.querySelector('.gambarP');
	
	function showedit(buton){
		const id = buton.id;
		const popup = document.querySelector(".apopup");
		const nama = document.querySelector('.nm_berkas');
		const nmr = document.querySelector('.nmr_berkas');
		const nmrs = document.querySelector('.nmr_surat_berkas');
		const idoang = document.querySelector('.id');
		const prs = document.querySelector('.perihal');
		
		popup.style.display = 'block';
		popup.addEventListener("click", function(e){
			let target = e.target.className;
			if (target == popup.className) {
				popup.style.display = 'none';
			}
		});

		const ajax = new XMLHttpRequest();
		ajax.open("GET", "proses.php?id="+id+"&aksi=edit", true);
		ajax.send();
		ajax.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				let data = JSON.parse(this.responseText);
				for (let i = 0; i < data.length; i++) {
					console.log(data[i].nama_berkas);
					nama.value = data[i].nama_berkas;
					nmr.value = data[i].no_berkas;
					nmrs.value = data[i].no_surat;
					prs.value = data[i].perihal;
					bggambar.src = "gambar/"+data[i].nama_poto;
					idoang.value = data[i].id_arsip;
				}
			}
		}
	}

	function previewFile(e){
		console.log(e.target.files[0]);
		bggambar.src = URL.createObjectURL(e.target.files[0]);
	}
</script>
	</body>

</html>
