<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Data Gunung</title>
</head>
<body>

<?php
  include '../layouts/sidebar.php';
?>

<div class="content">
  <h2>Pendataan Simaksi Gunung</h2>
  <h2 class="teks-rata-kanan margin-top-100">Data Gunung</h2>

  <a href="form_tambah.php?page=datagunung" class="tmbl tmbl-biru margin-20-0">
    Tambah Data Gunung
  </a>
  <div class="kotak-table">
    <table class="table-responsive">
      <tr>
        <th>No</th>
        <th>Nama Gunung</th>
        <th>Alamat Gunung</th>
        <th>Satuan</th>
        <th>Harga HTM</th>
        <th>Aksi</th>
      </tr>
    </table>
  </div>
</div>

</body>
</html>
