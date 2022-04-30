<?php 
  
  include "koneksi.php";
  if (isset($_POST['nama'])){
  $password = $_POST['password'];

  $data = mysqli_query($koneksi,"UPDATE data_admin SET nama = '$nama' WHERE id='$id'");
  if ($data){
    echo "Berhasil diedit";
  }else{
    echo "Gagal disimpan";
  }
}

	

 ?>