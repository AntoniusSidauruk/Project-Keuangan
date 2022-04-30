<?php
include 'koneksi.php';
$nip = $_GET['nip'];
$query = mysqli_query($koneksi, "select * from data_pegawai where nip='$nip'");
$pegawai = mysqli_fetch_array($query);
$data = array(
            'nama'      =>  $pegawai['nama']);
 echo json_encode($data);
?>
