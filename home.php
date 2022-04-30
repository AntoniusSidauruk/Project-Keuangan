<?php 
include 'koneksi.php';
  error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
  $sql1 = mysqli_query($koneksi, "SELECT * FROM data_pegawai");
  $data1 = mysqli_num_rows($sql1);
  $sql2 = $koneksi->query("SELECT * FROM data_kas_keluar");
  $sql = $koneksi->query("SELECT * FROM data_kas_masuk");
  $data = mysqli_fetch_array($sql);
    while($data2 = $sql2->fetch_assoc()){
            $jml =$data['uang_masuk'];
            $total_masuk=$total_masuk+$jml;
            $jml_keluar =$data2['keluar'];
            $total_keluar = $total_keluar + $jml_keluar;
            $saldo = $total_keluar - $total_masuk;
                        $bunga1 = $kas_keluar + $bunga;

          }
  $sql3 = mysqli_query($koneksi, "SELECT * FROM data_admin");
  $data3 = mysqli_num_rows($sql3);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <h4 class="card-title"><?php echo $data1 ?> <br>Jumlah Pegawai</h4>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>


          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <h4 class="card-title"><?php echo "Rp. ". number_format($saldo) ?> <br>Jumlah Saldo</h4>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>


          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <h5><?php echo "Rp. " . number_format($total_masuk )?> <br>Jumlah Kas Masuk!</h5>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>


          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <h5><?php echo "Rp. " . number_format($total_keluar) ?><br>Jumlah kas keluar!</h5>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>


</body>
</html>
<?php 
 ?>