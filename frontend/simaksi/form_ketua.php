<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Form Ketua Kelompok</title>
</head>
<body>

<?php
  include '../../frontend/layouts/sidebar.php';
?>

<div class="content">
  <h1>Pendataan Simaksi Gunung</h1>
  <h2 class="teks-rata-kanan margin-top-100">Data Simaksi</h2>

  <h3>Form Data Diri Ketua Rombongan</h3>
  <div class="kotak-form">
    <form action="../../backend/simaksi/simaksi.php" method="POST">
      <label>Nama Lengkap</label>
      <input type="text" class="form" name="nama_lengkap" placeholder="Adhimas Putra Nugraha Sugianto" required>

      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form">
        <option value="laki-laki">laki-laki</option>
        <option value="perempuan">perempuan</option>
      </select>

      <label>Pekerjaan</label>
      <input type="text" class="form" name="pekerjaan" placeholder="Aparatur Sipil Negara" required>

      <label>Alamat Lengkap</label>
      <textarea name="alamat" class="form textarea-no-resize" cols="30" rows="10" placeholder="Desa. Mlaten Dusun. Mlaten, Kec. Puri Kab. Mojokerto" required></textarea>

      <label>Tanggal Masuk</label>
      <input type="date" class="form" name="tgl_masuk" required>

      <label>Tanggal Keluar</label>
      <input type="date" class="form" name="tgl_keluar" required>

      <label>No Telepon (mudah dihubungi)</label>
      <input type="number" class="form" name="no_telp" placeholder="08161227898" required>

      <input type="submit" class="button-form-full background-hijau" name="simpanKetuaRombongan" value="Simpan">
    </form>
  </div>
  <a href="index.php?page=databarang" class="tmbl tmbl-abu-abu margin-20-0">
    Kembali
  </a>

</div>

</body>
</html>
