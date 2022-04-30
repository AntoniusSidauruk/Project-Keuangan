<?php 
error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
    label{
      float: right;
    }
    form {
      margin-bottom:10px;
    }
  </style>
</head>
<body>

	<div class="card mb-3">
          <div class="card-header" style="background-color: aqua; font-family: Brush Script;">
            <i class="fas fa-wallet"></i>
            <b>Data Kas Pegawai</b></div>

          <div class="card-body">
            <div class="table-responsive">
              <a href="?page=tambah1" class="btn btn-primary" style="margin-bottom: 10px; float: right; font-size: 20px;"><i class="fa fa-plus-circle"> Add Kas</i></a>
              <!--ini form cari per periode -->
              <div>
          <form method="POST" class="">
            <input type="date" class="form-control" style="float: left ; width: 20%;" name="tanggal1">
            <input type="date" class="form-control" style="float: left ; width: 20%; margin-right: 10px; " name="tanggal2">
            <input type="submit"  class="btn btn-success" name="search" value="Cari">            

          </form>
        </div>
          <pre>/* Masukan tanggal awal lalu akhir..</pre>
          <!---->

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center; background-color: aqua">NO</th>
                    <th style="text-align: center; background-color: aqua">Nama</th>
                    <th style="text-align: center; background-color: aqua" name="nip">Nip</th> 
                    <th style="text-align: center; background-color: aqua">Tanggal</th>
                    <th style="text-align: center; background-color: aqua">Total</th>
                    <th style="text-align: center; background-color: aqua">Sudah Dibayar</th>
                    <th style="text-align: center; background-color: aqua">Sisa</th>
                    <th style="text-align: center; background-color: aqua">Status</th>
                  </tr>
                </thead>
                <tbody>

                	<?php 
                		include "koneksi.php";
          $no = 1;

          if (isset($_POST['search'])){
          $tanggal1 = $_POST['tanggal1'];
          $tanggal2 = $_POST['tanggal2'];

          $sql = mysqli_query($koneksi, "SELECT nama,nip,tanggal,keluar,masuk FROM data_kas_keluar WHERE tanggal BETWEEN  '$tanggal1' and '$tanggal2' ORDER by tanggal");
          $hasiltgl = mysqli_num_rows($sql);
          if ($tanggal1 == "" and $password2 == ""){
            echo "Tidak ditemukan";
          }
          }else{       
            $sql = $koneksi->query("SELECT * FROM data_pegawai INNER JOIN data_kas_keluar ON data_pegawai.nip = data_kas_keluar.nip ");
          }       
          $nip = $_POST['nip'];
    $sql3 = $koneksi->query("SELECT * FROM data_kas_masuk WHERE nip ");
          if (mysqli_num_rows($sql)){
            while ($kas = mysqli_fetch_array($sql)){
              $data1 =  mysqli_fetch_array($sql3);

            $kas_keluar = $kas['keluar'];
            $kas_masuk = $data1['uang_masuk'];
            $lama = $kas['lama_pinjam'];
            $total1 = 10;
            $bunga = $kas_keluar / $total1;
            $bunga1 = $kas_keluar + $bunga;
            $bungga = 2000;
            $denda = $kas_masuk + $bunga;
            $total = $bunga1 - $kas_masuk;

                	 ?>
                	 <tr>
                	 	<td style="text-align: center; "><?php echo $no++; ?></td>
                    <td style="text-align: center; font-family: Courier;"><?php echo $kas ['nama']; ?></td>          
                    <td style="text-align: center;"><a href="?page=detailkas&nip=<?php echo $kas['nip']; ?>" style="text-decoration: none;"> <?php echo $kas ['nip']; ?></a> </td>

                	 	<td style="text-align: center;"><?php echo date(' d F Y', strtotime($kas['tanggal'])) ?></td>
                    <td align="right"><?php echo  "Rp." . number_format( $bunga1) . ",-"; ?></td>
                	 	   <td align='right' bgcolor="#90ef8c"><?php echo  'Rp.' . number_format($data1['uang_masuk'])  . ",-" ?></td>
                    <td><?php echo "Rp. ".number_format($total) . ",-" ?></td>

                    <td bgcolor=""><?php if ($kas_masuk >= $bunga1){
                echo "<div style='text-align: center; color: green;'><b>LUNAS</b></div>";
              }else if($kas_masuk==0){
                echo "<div style='text-align:center; color:red;'><b>Belum Bayar</b></div>";
              }else{
                echo "<div style='text-align: center; color: blue;''><b>Tahap Rekonsiliasi</b></div>";
              }
              ?>
              </td>   
                	 </tr>

                	<?php }}?>
                </tbody>
              </table>
              <div>
              </div>
              </div>
            </div>
            </div>

</body>
</html>