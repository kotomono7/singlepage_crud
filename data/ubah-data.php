<?php
	include 'koneksi.php';
	
	$postdata = file_get_contents("php://input");
	$member = json_decode($postdata);
	
	$id = $member->id;
	$nama = $member->data->nama;
	$alamat = $member->data->alamat;
	$telp = $member->data->telp;
	$email = $member->data->email;
	
	$query = "update member set nama = '{$nama}',alamat='{$alamat}',telp='{$telp}',email = '{$email}' where id = {$id} ";
	
	$result = mysqli_query($koneksi,$query);
	
	$respon = "";
	if ($result) {
		$respon = "Berhasil mengubah data!";
	} else {
		$respon = "Gagal mengubah data!";
	}
	
	echo $respon;
?>
