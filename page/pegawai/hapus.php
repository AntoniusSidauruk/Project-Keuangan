<?php 
	include 'koneksi.php';

	$nip = $_GET['nip'];

	$data = mysqli_query($koneksi,"delete from data_pegawai where nip = '$nip'");

	if ($data){
		echo "<script>alert('Berhasil Dihapus'); document.location='?page=pegawai'</script>";
	}else{
		echo "<div class = \"alert alert-danger\">Gagal Dihapus</div>";
	}

 ?>