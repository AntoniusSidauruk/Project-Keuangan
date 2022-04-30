<?php 

error_reporting(0);
include "koneksi.php";

 ?>
<?php 
	if (isset($_POST['sisa'])){
		$nip = $_POST['nip'];
		$keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
		$cicilan = $_POST['cicilan'];
    $cicilan2 =  $_POST['cicilan2'];
    $total = $_POST['cicilan'] + $_POST['cicilan2'];

		$data = mysqli_query($koneksi,"insert into data_kas_masuk (nip,uang_masuk,tanggal)values('$nip','$cicilan','$tanggal')");

		if($data){
			echo "<div class=\"alert alert-success\">Telah ditambahkan penerimaan</div>";
		}else{
			echo "<div class=\n alert alert-danger\">Periksa jumlah nominal </div>";
		}
	}
 ?>

 <?php 
 $sql = mysqli_query($koneksi,"SELECT * FROM data_kas_masuk");
 $data = mysqli_fetch_array($sql);
 $uangmsk = $data['uang_masuk'];
    if (isset($_POST['edit'])){
      $nip = $_POST['nip'];
      $cicilan = $_POST['cicilan'];
      $cicilan2 = $_POST['cicilan2'];
      $total = $uangmsk + $cicilan2;
      $sql1 = mysqli_query($koneksi,"UPDATE data_kas_masuk SET uang_masuk='$total' WHERE nip='$nip' ");
      if ($sql1){
        echo "Berhasil edit";
      }else {
        echo "Sory";}}
        ?>

 <?php 
 	$query = mysqli_query($koneksi,"SELECT * FROM data_kas_keluar");
  $sql = mysqli_query($koneksi, "SELECT * FROM data_kas_masuk");
 	$data = mysqli_num_rows($query);
  $data1 = mysqli_fetch_array($sql);
  $uang_masuk = $data1['uang_masuk'];
  $bungga = 2000;
            $denda = $uang_masuk + $bungga;
  ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript">
    function sum(){
      var angka1 = document.getElementById('angka1').value;
      var angka2 = document.getElementById('angka2').value;
      var hasil = parseInt(angka1) + parseInt(angka2);
      if (!isNaN(hasil)) {
         document.getElementById('hasil').value = hasil;
      }
    }
  </script>
  <style type="text/css">
    label{
      font-weight: bold;
    }
  </style>
</head>
<body>
		<?php 
  include 'koneksi.php';
  $nip = $_GET['nip'];
 		$sql = mysqli_query($koneksi, "select * from data_kas_keluar where nip='$nip' ");
    $sql1 = mysqli_query($koneksi, "select * from data_kas_masuk where nip='$nip' ");
 		while ($kas = mysqli_fetch_array($sql)) { 	
          $data1 =  mysqli_fetch_array($sql1);

    $kas_keluar= $kas['keluar'];	
            $kas_masuk = $data1['uang_masuk'];
            $lama = $kas['lama_pinjam'];
            $total1 = 10 * 10000;
            $bunga0 = $kas_keluar / $lama;
            $bunga = $kas_keluar / $total1;
            $bunga2 =  $total1 / $lama;
            $total3 = $bunga2 + $bunga0;
            $bunga1 = $kas_keluar + $bunga;
            $bungga = $bunga + $bunga1;
            $total = $bunga - $kas_masuk;
            $tanggal = $data1['tanggal'];
            $date = date('d m Y');
            $denda = 2000;
            $denda1  = $denda + $kas_masuk;
 	 ?>
<div class="card mb-3">
          <div class="card-header" style="background-color: aqua;">
            <i class="fas fa-wallet"></i>
            Data Kas Pegawai</div>

          <div class="card-body">
            <div class="table-responsive">
              <!--ini form cari per periode -->
              <div>
          <!---->

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="dtc-web.blogspot.com">
    <title>Tutorial Form Horizontal</title>
    <!-- Bagian css -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/ilmudetil.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
</div>
<!--- Bagian Judul 2--> 
<div class ="container" style="padding-top:5px;">
    <div class="row">
            <div class="col-md-12">
            <h4><u>Detail Kas Keluar</u></h4>
            </div>
          </div>
        </div>

<div class="container" >
    <form method="POST">
  <div class="form-row">
    <div class="col-md-3">
      <label>Nip</label><br>
      <input type="number" class="form-control" name="nip" value="<?php echo $kas['nip']; ?>" >
      <label style="margin-top: 10px;">Keterangan</label><br>
      <input type="text" class="form-control" name="keterangan"  value="<?php echo $kas['keterangan']; ?>" disabled>
      <label style="margin-top: 10px;">Tanggal</label>
      <input type="text" class="form-control" name="tanggal"  value="<?php echo $kas['tanggal']; ?>"><br>
    </div>

    <div class="col-md-3">
      <label style="">Uang Keluar</label><br>
      <input type="number" class="form-control" name="uangklr" value="<?php echo $kas['keluar'] ?>" disabled>

      <label style="margin-top: 10px;">Cicilan Per Bulan</label>
      <input type="number" class="form-control" style="float: right;" name="cicilan" value="<?php echo $total3 ?>" id="angka1" onkeyup="sum();"><br>
      <input type="number" class="form-control" style="float: right;" name="cicilan2" id="angka1" onkeyup="sum()"; value="<?php echo $total3 ?>"><br>
     </div>
</div>
<?php 
  
  if ($date > $tanggal){
    echo $denda1;
  }else{
    echo $total3;
  }

 ?>
    <div class="form-row">
      <div class="col-md-6">
      <a href='cetak_cicilan.php?nip=<?php echo $kas[nip]; ?> 'target='_blank' style='font-weight: bold;' name='cetak' class='btn btn-primary'>Cetak</a>    
      <input type="submit" style="font-weight: bold; margin-right: 40px;" class="btn btn-success" name="sisa" value="Tambahkan">
              <input type="submit" style="font-weight: bold;" class="btn btn-warning" name="edit" value="Cicilan Kedua">
        <a href="?page=kas" style="font-weight: bold;" class="btn btn-danger">Kembali</a>


      </div>
    </div>

<?php }?>
  </form>
</div>
</body>
</html> 

