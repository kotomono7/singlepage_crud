<?php
	include 'koneksi.php';
	
	$postdata = file_get_contents("php://input");
	$member = json_decode($postdata);
	
	$nama = $member->data->nama;
	$alamat = $member->data->alamat;
	$telp = $member->data->telp;
	$email = $member->data->email;
	
	$query = "insert into member (nama,alamat,telp,email) values ('{$nama}','{$alamat}','{$telp}','{$email}')";
	
	$result = mysqli_query($koneksi,$query);
	
	$respon = "";
	if ($result){
		$respon = "Berhasil menyimpan data!";
	} else {
		$respon = "Gagal menyimpan data!";
	}
	
	echo $respon;
?>
