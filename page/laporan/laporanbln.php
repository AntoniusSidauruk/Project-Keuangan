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
      <center><b>Laporan Bulanan Kas</b></center></div>
      <div class="card-body">
        <div class="form-group" style="width: 15%">
          <form method="POST">
            <table>
              <tr>
                <select name="bulan" class="form-control"> 
                 <option>--Pilih Bulan--</option> 
                 <option value="01">Januari</option>
                 <option value="02">Februari</option>
                 <option value="03">Maret</option>
                 <option value="04">April</option>
                 <option value="05">Mei</option>
                 <option value="06">Juni</option>
                 <option value="07">Juli</option>
                 <option value="08">Agustus</option>
                 <option value="09">September</option>
                 <option value="10">Oktober</option>
                 <option value="12">November</option>
                 <option value="12">Desember</option>   
               </select><input type="submit" name="cari" class="btn btn-warning" value="Filter">
             </td>
           </tr>
         </table>

       </form>
     </div>
     <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th style="background-color: red;">No</th>
            <th style="background-color: red;">NIP</th>

            <th style="background-color: red;">Tanggal</th>

            <th style="background-color: red;">Uang Masuk</th>

          </tr>

          <?php
          $no = 1;   
          include "./koneksi.php";
          if (isset($_POST['cari'])){
            $bulan = $_POST['bulan'];

            
            $sql = mysqli_query($koneksi,"SELECT * FROM data_kas_masuk");
          
           while($data1 = mysqli_fetch_array($sql)){
             ?>
             <tr>
              <td style="font-size: 20px; text-align: center; "><?php echo $no++ ?></td>
              <td style="font-size: 20px; text-align: center;"><?php echo $data1['nip'] ?></td>
              <td style="font-size: 20px; text-align: center;"><?php echo date('Y-m-d', strtotime( $data1['tanggal'])) ?></td>
              <td style="font-size: 20px; text-align: center;"><?php echo $data1['uang_masuk'] ?></td>
            </tr>
          </thead>

          <?php 
          error_reporting(0);
          $uang_masuk = $data1['uang_masuk'];
          $uangmsk = $uangmsk + $uang_masuk;

          ?>
          <tr>
          <?php }?>
          <th colspan="" style="text-align: center; font-size: 20px;">Total</th>
          <td style="font-size: 25px; font-weight: bold; text-align: center;"><?php echo "Rp. " . number_format($uangmsk) . ",-";?></td>
        <?php }else{
        } ?>
      </tr>
      


    </table>
  </table>

</div>
</body>
</html>

