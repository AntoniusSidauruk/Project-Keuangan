<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .forem {
      float: right;
    }
    .sisi{
      text-align: center;
    }
  </style>
   <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="script.js"></script>

</head>
<body>

  <div class="card mb-3">
          <div class="card-header" style="background-color: red; font-family: Brush Script;">
            <i class="fas fa-user-tie"></i>
            <b>Data Pegawai</b></div>
          <div class="card-body">
            <div class="table-responsive">
              <a href="?page=tambah" style="margin-bottom: 10px; float: left;" class="btn btn-primary"><i class="fa fa-plus-circle">
               Add data</i></a>
               <form method="POST">
                 <input type="submit" class="btn btn-success" name="cari" style="float: right;" value="Cari">
                 <input type="text"  name="search" class="form-control" style="float: right; margin-right: 10px; width: 20%" autocomplete="off">
               </form>
              <div id="container">
              <table class="table table-bordered" id="dataTable" id="table-data" width="100%" cellspacing="0">
                <thead>
                  <tr class="sisi">
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Ruangan</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Head</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                  
                  <?php 
                  error_reporting(0);
                      include "koneksi.php";
                      $no =1;
                      $search = $_POST['search'];
                      if ($search != ''){
                        $sql = mysqli_query($koneksi,"SELECT * FROM data_pegawai WHERE nama LIKE '".$search."' ");
                      }else{
                        $sql = $koneksi->query("SELECT * FROM data_pegawai");
                      }
                      if (mysqli_num_rows($sql));
                      while ($data = $sql->fetch_assoc()){
                  ?>

                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data ['nama']; ?></td>
                        <td><?php echo $data ['nip']; ?></td>
                        <td><?php echo $data ['ruangan']; ?></td>
                        <td><?php echo $data ['jenis_kelamin']; ?></td>
                        <td><?php echo $data ['jabatan']; ?></td>
                        <td><?php echo $data ['head']; ?></td>

                        <td>
                          <a href="?page=edit&nip=<?php echo $data['nip']; ?>" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
                          <a class="btn btn-danger" href="?page=hapus&nip=<?php echo $data['nip']; ?>" onclick="return confirm('Anda yakin mau menghapus');">
                            <i class="fa fa-trash"> Hapus</i></a>
                        </td>
                      </tr>
                      <?php } ?>

                </tbody>
                 <div id="result"></div>
            </div>
          </table>
</body>
</html>

 