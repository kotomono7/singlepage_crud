<?php
	include 'koneksi.php';
	
	$postdata = file_get_contents("php://input");
	$member = json_decode($postdata);
	
	$id = $member->id;
	
	$query = "delete from member where id = {$id}";
	
	$result = mysqli_query($koneksi,$query);
?>
