<?php 
	include "koneksi.php";
	error_reporting(0);

 ?>
<?php 
	
	if (isset($_POST['simpan'])){

		$masuk = $_POST['masuk'];

		$data = mysqli_query($koneksi,"insert into data_kas_keluar (masuk)values('$masuk')");
		if($data){
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
		?>

<!DOCTYPE html>
<html>
<head>
	<title>Latihan isset</title>
</head>
<body>
	<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><u>Tambah Cicilan</u></h3>
            </div>
              <!--Form Tambah -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputnama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputnama">Nip</label>
                  <input type="number" class="form-control" autocomplete="off" name="nip">
                  <pre>/* Masukan nip yang telah ada</pre>
                </div>
               <div class="form-group">
                  <label for="exampleInputTanggal">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal">
                </div>  
                <div class="form-group">
                  <label for="exampleInputJumlah">Uang Masuk</label>
                  <input type="number" class="form-control" autocomplete="off" name="masuk">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                <a href="?page=kas" class="btn btn-danger">Kembali</a>
              </div>
            </form>
          </div>
          </div>
        </div>
</body>
</html>

<?php 
		
		$sql = mysqli_query($koneksi,"select * from data_kas_masuk");
		while($data = $sql->fetch_assoc()){
			$bunga = 100000;
			$jml = $data['uang_masuk'];
			$masuk  = $total + $jml;

			$total = $masuk + $bunga;

		}

	 ?>

