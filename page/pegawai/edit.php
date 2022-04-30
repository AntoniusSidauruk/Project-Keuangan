<?php 

	if (isset($_POST['simpan'])){
      include "koneksi.php";

  	$nama = $_POST['nama'];
    $nip = $_POST['nip'];
  	$ruangan = $_POST['ruangan'];
  	$jenis_kelamin = $_POST['jenis_kelamin'];
  	$jabatan = $_POST['jabatan'];
  	$head = $_POST['head'];

	$data = mysqli_query($koneksi, "UPDATE data_pegawai SET nama = '$nama',ruangan = '$ruangan', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', head = '$head' WHERE nip = '$nip'" );

	if ($data){
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
 		$nip = $_GET['nip'];
 		$data = mysqli_query($koneksi, "select * from data_pegawai where nip='$nip'");
 		while ($pegawai = mysqli_fetch_array($data)) {
 			# code...
 		
 	 ?>

 	<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Pegawai</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $pegawai['nama']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNip">Nip</label>
                  <input type="text" class="form-control" name="nip" value="<?php echo $pegawai ['nip']; ?>">
                </div>
               <div class="form-group">
                  <label for="exampleInputRuangan">Ruangan</label>
                  <input type="text" class="form-control" name="ruangan" value="<?php echo $pegawai ['ruangan']; ?>">
                </div>  
                <div class="form-group">
                  <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                  <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $pegawai ['jenis_kelamin']; ?>">
                </div>
               <div class="form-group">
                  <label for="exampleInputJabatan">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" value="<?php echo $pegawai ['jabatan']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputHead">Head</label>
                  <input type="text" class="form-control" name="head" value="<?php echo $pegawai ['head']; ?>">
                </div>
              </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                <a href="?page=pegawai" class="btn btn-danger">Kembali</a>

              </div>
          <?php } ?>
 </body>
 </html>