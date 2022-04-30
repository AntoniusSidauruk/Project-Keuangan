<?php 
	include 'koneksi.php';

	$id = $_GET['id'];

	$data = mysqli_query($koneksi,"delete from data_kas where id = '$id'");

	if ($data){
		echo "<div class = \"alert alert-success\">Berhasil Dihapus</div>";
	}else{
		echo "<div class = \"alert alert-danger\">Gagal Dihapus</div>";
	}

 ?>