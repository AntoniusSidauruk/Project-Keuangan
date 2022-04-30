<?php 

	$koneksi = mysqli_connect("localhost", "root", "", "apps_sidang");

	if (mysqli_connect_errno()){
		echo "Login Gagal !" . mysqli_connect_error();
	}

 ?>