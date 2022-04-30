<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'koneksi.php';
$sql = $koneksi->query("SELECT * FROM data_pegawai INNER JOIN data_kas_keluar ON data_pegawai.nip = data_kas_keluar.nip");

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

	<h1><u>Data Pegawai Dan laporan</u></h1>
	<table cellpadding="10px" cellspacing="5"  border="1">
              <tr bgcolor = "aqua">
                <th>NO</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Nominal</th>
                <th>Kas Keluar</th>

              </tr>';

              $no = 1;
              while($laporan = $sql->fetch_assoc()){
                $kas_masuk = $laporan['masuk'];
                $kas_keluar= $laporan['keluar'];
              
    $html .= '<tr>
    <td bgcolor="aqua">'.$no++.'</td>
    <td>'.$laporan["nama"].'</td>
    <td>'.$laporan["nip"].'</td>
    <td>'.$laporan["tanggal"].'</td>
    <td>'.$laporan["keterangan"].'</td>
    <td>'.$laporan["masuk"].'</td>
    <td>'.$laporan["keluar"].'</td>

    </tr>';
}
$sql = mysqli_query($koneksi,"SELECT * FROM data_kas_keluar");
while($data = $sql->fetch_assoc()){
  $jml = $data['masuk'];
  $total_masuk = $total_masuk + $jml;
  $jml = $data['keluar'];
  $total_keluar = $total_keluar + $jml;
  $saldo = $total_masuk - $total_keluar;
}
$sql1 = mysqli_query($koneksi,"SELECT * FROM data_pegawai");
  $data1 = mysqli_num_rows($sql1);
$html .= '<tr>
    <th colspan="3">Total laporan Masuk</th>
    <th colspan="3">Rp .'.$total_masuk.'</th>
    </tr>';
$html .= '<tr>
    <th colspan="3">Total laporan Keluar</th>
    <th colspan="3">Rp. '.$total_keluar.'</th>
    </tr>';
$html .= '<tr>
        <th colspan="3">Saldo</th>
        <th colspan="3">Rp. '.$saldo.'</th>
  </tr>';
$html .= '<tr>
        <th colspan="3">Total Pegawai</th>
        <th colspan="3">'.$data1.' Jumlah Pegawai</th>
  </tr>';
    $html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

