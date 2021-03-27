<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Laporan Pendaki Turun</title>
</head>
<body>

<?php
  include '../../frontend/layouts/sidebar.php';
  include '../../database/koneksi.php';
?>

<div class="content">
  <h1>Pendataan Simaksi Gunung</h1>
  <h2 class="teks-rata-kanan margin-top-100">Data Laporan</h2>

  <h3>Laporan Pendaki Turun</h3>
  <div class="kotak-table">
    <table class="table-responsive">
      <tr>
        <th>No</th>
        <th>Nomor Simaksi</th>
        <th>Nama Gunung</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Jumlah Hari</th>
        <th>Jumlah Pendaki</th>
        <th>Tanggal Turun</th>
      </tr>
      <?php
        $status         = "Masih Mendaki";
        $no             = 1;
        $tgl            = "0000-00-00 00:00:00";
        $selectLaporan  = "SELECT * FROM laporan INNER JOIN data_gunung ON laporan.gunung_id = data_gunung.id_gunung WHERE lprn_status_pendakian = '$status' AND lprn_tgl_keluar != '$tgl'  ";
        $queryLaporan   = mysqli_query($host, $selectLaporan);
        while ($data  = mysqli_fetch_assoc($queryLaporan) ) {

      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nomor_simaksi'] ?></td>
        <td><?= $data['nama_gunung'] ?></td>
        <td><?= date('d M Y', strtotime($data['laporan_tgl_masuk'])) ?></td>
        <td><?= date('d M Y', strtotime($data['laporan_tgl_keluar'])) ?></td>
        <td><?= $data['laporan_jml_hari'] ?></td>
        <td><?= $data['jumlah_pendaki'] . " " . "Orang" ?></td>
        <td><?= date('d M Y -- H:i:s', strtotime($data['lprn_tgl_keluar'])) ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>

  <a href="index.php?page=laporan" class="tmbl tmbl-abu-abu margin-20-0">
    Kembali
  </a>

</div>

</body>
</html>
