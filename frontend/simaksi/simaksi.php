<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Form Simaksi</title>
</head>
<body>

<?php
  include '../../frontend/layouts/sidebar.php';
  include '../../database/koneksi.php';
?>

<div class="content">
  <h1>Pendataan Simaksi Gunung</h1>
  <h2 class="teks-rata-kanan margin-top-100">Data Simaksi</h2>

  <h3>Simaksi</h3>
  <div class="kotak-form">
    <form action="../../backend/simaksi/simaksi.php" method="POST">

    <label>Tanggal Masuk</label>
    <input type="date" name="tgl_masuk" class="form">

    <label>Tanggal Keluar</label>
    <input type="date" name="tgl_keluar" class="form">

    <label>Gunung</label>
    <select name="gunung_id" class="form">
      <?php
        $selectGunung   = "SELECT * FROM data_gunung";
        $queryGunung    = mysqli_query($host, $selectGunung);
        while ($listGunung = mysqli_fetch_assoc($queryGunung) ) {
      ?>  
      <option value="<?= $listGunung['id_gunung']?>"><?= $listGunung['nama_gunung'] ?></option>
      <?php } ?>
    </select>

    <label>Satuan Pendakian</label>
    <input type="text" name="satuan_pendakian" class="form" placeholder="Cth: Solo,Kelompok">

      <input type="submit" class="button-form-full background-hijau" name="simpanSimaksi" value="Simpan">
    </form>
  </div>
  <a href="index.php?page=databarang" class="tmbl tmbl-abu-abu margin-20-0">
    Kembali
  </a>

</div>

</body>
</html>
