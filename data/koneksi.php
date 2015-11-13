<?php
	// deklarasi variable untuk koneksi ke database
	$host = "localhost";
	$user = "root";
	$pass = "08121995";
	$db   = "crud_angular";
	
	// koneksi ke database mysqli
	$koneksi = mysqli_connect($host,$user,$pass,$db) or die ("Gagal menghubungkan ke database!");
?>
