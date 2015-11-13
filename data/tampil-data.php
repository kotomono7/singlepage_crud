<?php
	include 'koneksi.php';
	$query = "select * from member";
	
	$data = [];
	
	$result = mysqli_query($koneksi,$query);
	while ($row = mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['id'] = $row['id'];
		$temp_data['nama'] = $row['nama'];
		$temp_data['alamat'] = $row['alamat'];
		$temp_data['telp'] = $row['telp'];
		$temp_data['email'] = $row['email'];
		
		array_push($data,$temp_data);
	}
	
	echo json_encode($data);
?>
