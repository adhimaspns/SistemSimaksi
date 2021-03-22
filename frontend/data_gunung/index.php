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

  <a href="form_tambah.php?page=datagunung" class="tmbl tmbl-biru margin-20-0">
    Tambah Data Gunung
  </a>
  <div class="kotak-table">
    <table class="table-responsive">
      <tr>
        <th>No</th>
        <th>Nama Gunung</th>
        <th>Ketinggian</th>
        <th>Alamat Gunung</th>
        <th>Harga HTM</th>
        <th>Aksi</th>
      </tr>
      <?php
        $no           = 1;
        $selectData   = "SELECT * FROM data_gunung";
        $queryData    = mysqli_query($host, $selectData);
        while ($data  = mysqli_fetch_assoc($queryData) ) {

      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nama_gunung'] ?></td>
        <td><?= $data['mdpl'] ?></td>
        <td><?= $data['alamat_gunung'] ?></td>
        <td><?= $data['unit_htm'] . " " . $data['satuan_htm'] . " " . "Rp. " . number_format($data['htm'],0,',','.')  ?></td>
        <td>
          <a href="edit.php?id=<?= $data['id_gunung']?>&page=datagunung" class="tmbl tmbl-kuning">
            Edit
          </a>
          <a href="../../backend/data_gunung/hapus.php?id=<?= $data['id_gunung']?>" class="tmbl tmbl-merah">
            Hapus
          </a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</div>

</body>
</html>
