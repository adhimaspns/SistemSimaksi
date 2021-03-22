<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Data Gunung</title>
</head>
<body>

<?php
  include '../../database/koneksi.php';
  include '../layouts/sidebar.php';
?>

<div class="content">
  <h2>Pendataan Simaksi Gunung</h2>
  <h2 class="teks-rata-kanan margin-top-100">Data Gunung</h2>


  <h3>Form Edit Data Gunung</h3>
  <div class="kotak-form">
    <?php
    $id            = $_GET['id'];
    
    $selectData    = "SELECT * FROM data_gunung WHERE id_gunung = '$id' ";
    $queryData     = mysqli_query($host, $selectData);
    $dataGunung    = mysqli_fetch_assoc($queryData); 
    ?>
    <form action="../../backend/data_gunung/data_gunung.php" method="POST">
      <input type="hidden" name="id" value="<?= $dataGunung['id_gunung']?>">

      <label>Nama Gunung</label>
      <input type="text" class="form" name="nama_gunung" value="<?= $dataGunung['nama_gunung']?>">

      <label>Mdpl</label>
      <input type="text" class="form" name="mdpl" value="<?= $dataGunung['mdpl']?>">

      <label>Alamat</label>
      <textarea name="alamat" class="form textarea-no-resize" cols="30" rows="10"><?= $dataGunung['alamat_gunung']?></textarea>

      <label>Harga Tiket Per Individu</label>
      <input type="text" class="form" name="harga_satuan" value="<?= $dataGunung['unit_htm']?>">

      <label>Satuan Individu</label>
      <input type="text" class="form" name="satuan" value="<?= $dataGunung['satuan_htm']?>">

      <label>Harga Tiket Masuk</label>
      <input type="text" class="form" name="htm" value="<?= $dataGunung['htm']?>">

      <input type="submit" class="button-form-full background-kuning" name="editDataGunung" value="Simpan">
    </form>
  </div>
  <a href="index.php?page=databarang" class="tmbl tmbl-abu-abu margin-20-0">
    Kembali
  </a>
</div>

</body>
</html>
