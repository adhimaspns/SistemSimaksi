<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Data Simaksi</title>
</head>
<body>

<?php
  include '../../database/koneksi.php';
  include '../../frontend/layouts/sidebar.php';
?>

<div class="content">
  <h1>Pendataan Simaksi Gunung</h1>
  <h2 class="teks-rata-kanan margin-top-100">Data Simaksi</h2>

  <a href="form_ketua.php?page=simaksi" class="tmbl tmbl-biru margin-20-0">
    Tambah Pendaki
  </a>

  <div class="kotak-table">
    <table class="table-responsive">
      <tr>
        <th>No</th>
        <th>Nama Ketua</th>
      </tr>
    </table>
  </div>

</div>

</body>
</html>
