<?php 

if (isset($_POST['simpan'])){
  include "koneksi.php";

    $id = $_POST['id'];
  	$nip = $_POST['nip'];
  	$keterangan = $_POST['keterangan'];
  	$tanggal = $_POST['tanggal'];
  	$masuk = $_POST['masuk'];
  	$jenis_kas = $_POST['jenis_kas'];
    $keluar = $_POST['keluar'];

  	$kas = mysqli_query($koneksi, "UPDATE data_kas SET nip = '$nip', keterangan='$keterangan', tanggal = '$tanggal', masuk = '$masuk',jenis_kas = '$jenis_kas',keluar = '$keluar' WHERE id = '$id'" );

  	if ($kas){
  		echo "<div class=\"alert alert-success\">Berhasil diedit</div>";
  	}else{
  		echo "<div class=\"alert alert-danger\">Gagal diedit</div>";
  	}
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

 	<?php 
  include 'koneksi.php';
 		$id = $_GET['id'];
 		$data = mysqli_query($koneksi, "select * from data_kas where id='$id'");
 		while ($kas = mysqli_fetch_array($data)) {
 			# code...
 		
 	 ?>

 	<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data kas</h3>
            </div>
            <!-- Form Edit -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nip</label>
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="text" class="form-control" name="nip" value="<?php echo $kas['nip']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNip">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" value="<?php echo $kas ['keterangan']; ?>">
                </div>
               <div class="form-group">
                  <label for="exampleInputRuangan">Tanggal</label>
                  <input type="text" class="form-control" name="tanggal" value="<?php echo $kas ['tanggal']; ?>">
                </div>  
                <div class="form-group">
                  <label for="exampleInputJenisKelamin">Jumlah Masuk</label>
                  <input type="number" class="form-control" name="masuk" value="<?php echo $kas ['masuk']; ?>">
                </div>
               <div class="form-group">
                  <label for="exampleInputJabatan">Jenis Kas</label>
                  <input type="text" class="form-control" name="jenis_kas" value="<?php echo $kas ['jenis_kas']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputJenisKelamin">Jumlah Keluar</label>
                  <input type="number" class="form-control" name="keluar" value="<?php echo $kas ['keluar']; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                <a href="?page=kas" class="btn btn-danger">Kembali</a>

              </div>
          <?php } ?>
 </body>
 </html>