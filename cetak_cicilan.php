<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'koneksi.php';
$sql = $koneksi->query("SELECT * FROM data_kas_keluar");
$tanggal = date("d F Y");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html>
<head>
  <title></title>
    <style type="text/css">
        h1{
         text-align: center;
        }
        </style>
</head>
<body>

  <h1><u>Laporan Cicilan</u></h1>

  <table cellpadding="10px" cellspacing="3"  border="1">';

               include 'koneksi.php';
  $nip = $_GET['nip'];
    $sql = mysqli_query($koneksi, "select * from data_kas_keluar where nip='$nip' ");
    $sql1 = mysqli_query($koneksi,"SELECT * FROM data_kas_masuk where nip='$nip' ");
    $data1 = mysqli_fetch_array($sql1);
    while ($laporan = mysqli_fetch_array($sql)) { 
    $html .= '<tr>
    <td>Nama : '.$laporan["nama"].'</td>
    </tr>';
    $html .= '<tr>
    <td>Nip : '.$laporan["nip"].'</td>
    </tr>';
     $html .= '<tr>
    <td>Nip : '.$laporan["keterangan"].'</td>
    </tr>';
    $html .= '<tr>
    <td>Uang Cicilan : '.$data1["uang_masuk"].'</td>
    </tr>';
    $html .= '<tr>
    <td>Jumlah Pinjaman : '.$laporan["keluar"].'</td>
    </tr>';
}
    $html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

