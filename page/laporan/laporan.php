<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    th{
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="card mb-3">
    <div class="card-header" style=" font-family: arial; font-size: 20px; text-decoration: underline;">
      <center><b>Laporan Semua Kas</b></center><a href="?page=laporanbln"><input type="submit" name="laporanbln" class="btn btn-primary" value="Laporan Bulanan"></a></div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Lama Pinjam</th>
                <th>Jumlah Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>

            <!-- script data kas dan -->               
        <?php 
          error_reporting(0);

          include "koneksi.php";
          $no = 1;
          $sql = $koneksi->query("SELECT * FROM data_pegawai INNER JOIN data_kas_keluar ON data_pegawai.nip = data_kas_keluar.nip");
          $sql1 = mysqli_query($koneksi,"SELECT * FROM data_kas_masuk");
          $data1 = mysqli_fetch_array($sql1);
          while ($kas = mysqli_fetch_array($sql)){
            $kas_keluar = $kas['keluar'];
            $kas_masuk = $kas['masuk'];
        ?>

        <tr style="font-size: 17px;">
          <td><?php echo $no++; ?></td>
          <td><?php echo $kas['nama']; ?></td>
          <td><?php echo $kas['nip']; ?></td>
          <td><?php echo date('d F Y', strtotime($kas['tanggal'])); ?></td>
          <td><?php echo $kas['keterangan'] ?></td>
          <td><?php echo $kas['lama_pinjam'] ?></td>
          <td align="right" style=""><?php echo number_format($data1['uang_masuk']) . ",-"; ?></td>
          <td align="right"><?php echo number_format($kas['keluar']) . ",-"; ?></td>
          <td>
            <?php 
              if ($kas_masuk >= $kas_keluar){
                echo "Lunas";
              }else if($kas_masuk == "0"){
                echo "<div style='color:blue';>Belum Rekonsiliasi</div>";
              }else{
                echo "Tahap rekonsiliasi";
              }
              ?></td>
        </tr>

        <?php 
            $total_masuk = $total_masuk + $data1['uang_masuk'];
            $total_keluar = $total_keluar + $kas['keluar'];
            $saldo = $total_keluar - $total_masuk;
          }
        ?>
        <!-- -->
      </tbody>
      <tr>
        <th colspan="4" style="text-align: center; font-size: 20px;">Total Kas Masuk</th>
        <td style="font-size: 20px; text-align: right;" ><?php echo "Rp. " . number_format($total_masuk) . ",-"; ; ?></td>
      </tr>

      <tr>
        <th colspan="4" style="text-align: center; font-size: 20px;">Total Kas Keluar</th>
        <td style="font-size: 20px; text-align: right;"><?php echo "Rp. " . number_format($total_keluar) . ",-"; ; ?></td>
     </tr>

     <tr>
        <th colspan="4" style="text-align: center; font-size: 20px;">Total Saldo</th>
        <th style="font-size: 21px; text-align: right;" ><?php echo "Rp.".number_format($saldo) . ",-"; ; ?></th>
     </tr>

     </table>
         <a href="cetakpdf.php" class="btn btn-success">  <i class="fa fa-print" ><font color="white"> Cetak PDF</font></i></a>
     </table>

</div>
</body>
</html>
