<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Utama Apps</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php"><b>BANK BTN</b></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        </div>
      </div>
    </form>
    <?php
    session_start();
    if (!isset($_SESSION['username'])){
      header("Location:login.php");
    }
    ?>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($koneksi,"SELECT * FROM data_admin");
    $data = mysqli_num_rows($sql);
    ?>

    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hai, <b><?php echo $_SESSION['nama']; ?></b>
          <i class="fas fa-user-circle fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="?page=settings" >Set Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="?page=pegawai">Data Pegawai</a>
          <a class="dropdown-item" href="?page=kas">Data Kas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=laporan">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Laporan</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        

        <!-- Page Content -->
        
        <?php

        if (isset($_GET['page'])){
        	$page = $_GET['page'];

       		switch ($page){
       			case 'pegawai':
       			include "page/pegawai/pegawai.php";
       			break;

       			case 'kas':
       			include "page/kas/kas.php";
       			break;

            case 'kasklr':
            include "page/kasklr/kas.php";
            break;

       			case 'rekapkas':
       			include "page/rekap/rekapkas.php";
       			break;

            case 'laporan':
            include "page/laporan/laporan.php";
            break;

            // Pegawai
            case 'tambah':
            include "page/pegawai/tambah.php";
            break;

            case 'edit':
            include "page/pegawai/edit.php";
            break;

            case 'hapus':
            include "page/pegawai/hapus.php";
            break;

            // Kas
            case 'edit1':
            include "page/kas/edit.php";
            break;

            case 'tambah1';
            include "page/kas/tambah.php";
            break;

            case 'hapus1' ;
            include "page/kas/hapus.php";
            break;

            case 'settings':
            include "page/settings/settings.php";
            break;

            case 'cetak':
            include "page/rekap/cetakpdf.php";
            break;

            case 'edit2':
            include "page/settings/edit.php";
            break;

            case 'terima';
            include "page/terima/terima.php";
            break;

            case 'tambah2';
            include "page/terima/tambah.php";
            break;

            case 'detailkas';
            include "page/kas/detailkas.php";
            break;

            case 'ajax';
            include "page/kas/ajax.php";
            break;

            case 'cetak_cicil';
            include "page/kas/cetak_cicilan.php";
            break;

            case 'laporanbln';
            include "page/laporan/laporanbln.php";
            break;
          }
        }else{
          include "home.php";
       }
        ?>

      </div>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin.min.js"></script>

</body>

</html>




