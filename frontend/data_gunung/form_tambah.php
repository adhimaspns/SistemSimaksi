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


  <h3>Form Tambah Data Gunung</h3>
  <div class="kotak-form">
    <form action="../../backend/data_gunung/data_gunung.php" method="POST">
      <label>Nama Gunung</label>
      <input type="text" class="form" name="nama_gunung" placeholder="Gunung Welirang">

      <label>Mdpl</label>
      <input type="text" class="form" name="mdpl" placeholder="3.339 m">

      <label>Alamat</label>
      <textarea name="alamat" class="form textarea-no-resize" cols="30" rows="10" placeholder="Alamat Pos Simaksi"></textarea>

      <label>Harga Tiket Per Individu</label>
      <input type="text" class="form" name="harga_satuan" placeholder="1">

      <label>Satuan Individu</label>
      <input type="text" class="form" name="satuan" placeholder="Perorangan">

      <label>Harga Tiket Masuk</label>
      <input type="text" class="form" name="htm" placeholder="5000">

      <input type="submit" class="button-form-full background-hijau" name="simpanDataGunung" value="Simpan">
    </form>
  </div>
  <a href="index.php?page=databarang" class="tmbl tmbl-abu-abu margin-20-0">
    Kembali
  </a>
</div>

</body>
</html>
