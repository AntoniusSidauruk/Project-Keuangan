<?php 
  include "koneksi.php";

  $keyword = $_GET["keyword"];

  $query = "SELECT * FROM data_pegawai WHERE nama LIKE '%$keyword%' OR
            nip LIKE '%$keyword%' OR
            ruangan LIKE '%$keyword%' OR
            jenis_kelamin LIKE '%$keyword%' OR
            jabatan LIKE '%$keyword%' OR
            head LIKE '%$keyword%'";

  $data = query($query);
 ?>

 <table class="table table-bordered" id="dataTable" id="table-data" width="100%" cellspacing="0">
                <thead>
                  <tr>
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
                <tfoot>
                </tfoot>
                <tbody>
                  
                  <?php 
                      include "koneksi.php";
                      $no = 1;
                      $sql = $koneksi->query("SELECT * FROM data_pegawai");
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

                      </tr>
                      <?php } ?>

                </tbody>
              </table>