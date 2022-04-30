<?php
error_reporting(0); 
include "koneksi.php";
?>

<?php
  if (isset($_POST['simpan'])){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $tanggali = date('Y-m-d');
   $lama = $_POST['lama'];
    $keluar = $_POST['keluar'];
  $data = mysqli_query($koneksi,"insert into data_kas_keluar (nip,nama,keterangan,tanggal,lama_pinjam,keluar)values('$nip', '$nama','$keterangan','$tanggali','$lama','$keluar')");

  if ($data){
    echo "<div class=\"alert alert-success\">Berhasil Disimpan</div>";
  }else {
    echo "<div class=\"alert alert-danger\">Gagal Menyimpan</div>";
  }

}
?>

<!DOCTYPE html>
<html>
<head>

	<title></title>

</head>
<body>
  

	<div class="row" id="tengah">
        <!-- left column -->
        <div class="col-md-5">
          <!-- general form elements -->
          <div class="box box-primary">
            <fieldset>
            <div class="box-header with-border">
             <h3 class="box-title"><legend>Add Data</legend></h3>
            </div>
              <!--Form Tambah -->
            <form role="form" method="POST">
              <div class="box-body"><?php echo $error; ?>
                <div class="form-group">
                  <label for="exampleInputnip">Nip</label>
                  <input type="text" class="form-control" autocomplete="off" name="nip" id="nip" onkeyup="otomatis()">
                  <pre>/* Masukan nip yang telah ada</pre>
                </div>
                <div class="form-group">
                  <label for="exampleInputnama">Nama</label>
                  <input type="text" class="form-control" name="nama" autocomplete="off" id="nama" value="">
                </div>
                <div class="form-group">
                  <label for="exampleInputKeterangan">Keterangan</label>
                  <input type="text" class="form-control" autocomplete="off" name="keterangan" >
                </div>
                <div class="form-group">
                  <label for="exampleInputJumlah">Uang Keluar</label>
                  <input type="number" class="form-control" autocomplete="off" name="keluar">
                </div>
                <div class="form-group" >
                  <label for="exampleInputTanggal">Lama Pinjam</label>
                  <input type="number" style="width: 30%" class="form-control" name="lama" value="">
                </div> 
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                <a href="?page=kas" class="btn btn-danger">Kembali</a>
              </div>
            </form>
            <script src="jquery-1.11.1.min.js"></script>
  <script type="text/javascript">
  function otomatis(){
    var nip = $("#nip").val();
    $.ajax({
      url : '?page=ajax',
      data : 'nip='+nip,
    }).success(function (data){
      var json = data,
      obj = JSON.parse(json);
      $('#nama').val(obj.nama);

    });
  }
</script>

          </div>
        </fieldset>

</body>
</html>