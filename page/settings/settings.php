<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .forem {
      float: right;
    }
    label {
      margin-right: 40%;
    }
  </style>
   <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <style type="text/css">
          label{
            font-weight: bold;
          }
        </style>

</head>
<body>
  <?php 
  error_reporting(0);
    include 'koneksi.php';

    $sql = mysqli_query($koneksi,"SELECT * FROM data_admin");
    $data = mysqli_num_rows($sql);

   ?>
  <div class="">
    <form method="POST">
              <center>

              <div class="card" style="width: 400px; border: 1px solid red;"> 
                <div class="card-body">
                  <h5 style="text-align: center;">Rubah Password Anda</h5><hr>
                  <pre style="margin-top:  10px">Agar dapat dengan mudah mengakses</pre>
                  <label>Password</label><br>
                  <input type="text" autocomplete="off" name="password0" style="width: 60%;" class="form-control" value="<?php echo $data['password'] ?>" placeholder="Password awal.." autofocus><br>
                  <label>Password</label><br>
                  <input type="password" autocomplete="off" name="password1" style="width: 60%;" class="form-control" value="<?php echo $data['password'] ?>"><br>
                  <input type="submit"  name="simpan" class="btn btn-primary" value="Simpan">
                  <a href="index.php" class="btn btn-danger">Batal</a>
                  <hr style="border: 1px solid red;">

          <?php 
          include "koneksi.php";

          $sql = mysqli_query($koneksi,"SELECT * FROM data_admin");
          while($ambil = mysqli_fetch_array($sql)){

            if (isset($_POST['simpan'])){
              $password0 = $_POST['password0'];
              $password1 = $_POST['password1'];

              $edit = mysqli_query($koneksi,"update data_admin set password = '$password0' where id");

            if ($edit){
              echo "<div class=\"alert alert-success\" style='width:60%'><b> Berhasil Diupdate</b></div>";
              }else{
                echo "<div class=\"alert alert-danger\" style='width:60%'> <b>Gagal Mengupdate</b></div>";
              }
            }
          }
          

           ?>
           </div>
            </div>
          </center>
        </form>
          </div>
       
</body>
</html>
