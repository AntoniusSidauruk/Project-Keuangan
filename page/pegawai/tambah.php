<?php 
  error_reporting(0);
  include "koneksi.php";
 ?>
<?php 
  $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
  $ruangan = mysqli_real_escape_string($koneksi, $_POST['ruangan']);
  $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
  $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
  $head = mysqli_real_escape_string($koneksi, $_POST['head']);

  if (isset($_POST['simpan'])){
    if(empty($nama)){
      $error = "<pre style='color:red;'>* Masukan nama pegawai</pre>";
    }elseif(empty($nip)){
       $error = "<pre style='color:red;'>* Masukan nip pegawai</pre>";
    }elseif(empty($ruangan)){
       $error = "<pre style='color:red;'>* Pilih ruangan</pre>";
    }elseif(empty($jenis_kelamin)){
       $error = "<pre style='color:red;'>* Pilih jenis_kelamin pegawai</pre>";
    }elseif(empty($jabatan)){
       $error = "<pre style='color:red;'>* Masukan jabatan pegawai</pre>";
    }elseif(empty($head)){
       $error = "<pre style='color:red;'>* Masukan head dari pegawai</pre>";
    }else{

      $data = mysqli_query($koneksi,"insert into data_pegawai (nama,nip,ruangan,jenis_kelamin,jabatan,head)values('$nama','$nip','$ruangan','$jenis_kelamin','$jabatan','$head')");

      if ($data){
        echo "<div class=\"alert alert-success\">Berhasil Disimpan</div>";
      }else {
        echo "<div class=\"alert alert-danger\">Gagal Menyimpan</div>";
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body"><?php echo $error; ?>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" autocomplete="off" name="nama" value="<?php echo $_POST['nama']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNip">Nip</label>
                  <input type="number" class="form-control" autocomplete="off" name="nip" value="<?php echo $_POST['nip']; ?>"> 
                </div>

               <div class="form-group">
                  <label for="exampleInputRuangan">Ruangan</label>
                  <select name="ruangan" class="form-control">
                    <option>Pilih</option>
                    <option value="1">Analysis</option>
                    <option value="2">Support</option>
                    <option value="3">Funding</option>
                    <option value="4">IT</option>
                    <option value="5">KPR</option>
                  </select>
                </div>  
                <div class="form-group">
                  <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control">
                    <option>Pilih</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
               <div class="form-group">
                  <label for="exampleInputJabatan">Jabatan</label>
                  <input type="text" class="form-control" autocomplete="off" name="jabatan" value="<?php echo $_POST['jabatan']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputHead">Head</label>
                  <input type="text" class="form-control" autocomplete="off" name="head" value="<?php echo $_POST['head']; ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                <a href="?page=pegawai" class="btn btn-danger">Kembali</a>

              </div>
            </form>
          </div>

</body>
</html>