
<?php
session_start();
if (!isset($_SESSION['username'])) {
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
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="data-arsip.php">Data Arsip</a></li>
		<li><a href="input-arsip.php">Input Arsip</a></li>
		<li><a href="cari-arsip.php">Cari Arsip</a></li>
		<li><a href="#">Logout</a></li>
		</ul>
	</nav>
	
<div class="content">
	<p class = "judul">
		Dashboard
	</p>
	
	<hr>
	<p>
	Selamat datang di Aplikasi Pengarsipan Semoga anda senang melihat aplikasi ini
	</p>
</div>

<div class="footer">
	Copyright Hakim
</div>
	</body>
</html>
