<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Bukti Simaksi</title>
</head>
<body>

<?php
  include '../../database/koneksi.php';
?>

<div>

  <?php
    $simaksi   = $_GET['simaksi'];
  ?>
  <center>
    <h3>Bukti Simaksi</h3>
    <div class="kotak-keterangan">
      <?php
        //! Select Laporan 
        $selectLaporan  = "SELECT * FROM laporan INNER JOIN data_gunung ON laporan.gunung_id = data_gunung.id_gunung WHERE nomor_simaksi = '$simaksi' ";
        $queryLaporan   = mysqli_query($host, $selectLaporan);
        $dataLaporan    = mysqli_fetch_assoc($queryLaporan);
        $gunung_id      = $dataLaporan['gunung_id']; 
      ?>
      <table>
        <tr>
          <td>Tanggal Simaksi</td>
          <td> : <?= date('d M Y -- H:i:s', strtotime($dataLaporan['tgl_simaksi']))  ?> </td>
        </tr>
        <tr>
          <td>Nomor Simaksi</td>
          <td> : <?= $dataLaporan['nomor_simaksi'] ?></td>
        </tr>
        <tr>
          <td>Nama Gunung</td>
          <td> : <?= $dataLaporan['nama_gunung'] ?></td>
        </tr>
        <tr>
          <td>Tanggal Masuk</td>
          <td> : <?= date('d M Y', strtotime($dataLaporan['laporan_tgl_masuk'])) ?></td>
        </tr>
        <tr>
          <td>Tanggal Keluar</td>
          <td> : <?= date('d M Y', strtotime($dataLaporan['laporan_tgl_keluar'])) ?></td>
        </tr>
        <tr>
          <td>Total Hari</td>
          <td> : <?= $dataLaporan['laporan_jml_hari'] ?></td>
        </tr>
        <tr>
          <td>Jumlah Anggota (termasuk ketua)</td>
          <td> : <?= $dataLaporan['jumlah_pendaki'] . " " . "Orang" ?></td>
        </tr>
        <tr>
          <td>Biaya Pendakian</td>
          <td> : <?= "Rp. " . number_format($dataLaporan['total_biaya'],0,',','.')  ?></td>
        </tr>
      </table>
    </div>
  </center>

  <div class="detail-anggota padding-20">
    <h2>Data Anggota</h2>
    <div class="kotak-table">
      <table class="table-responsive">
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>Jenis Kelamin</th>
          <th>Alamat Lengkap</th>
          <th>No Telepon</th>
          <th>Status Anggota</th>
        </tr>
        <?php
          $no           = 1;
          $dataDetail   = "SELECT * FROM detail_simaksi WHERE nomor_simaksi = '$simaksi' ";
          $queryDetail  = mysqli_query($host, $dataDetail);
          while ($dataDetail  = mysqli_fetch_assoc($queryDetail) ) {
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $dataDetail['nama_lengkap'] ?></td>
          <td><?= $dataDetail['jenis_kelamin'] ?></td>
          <td><?= $dataDetail['alamat_lengkap'] ?></td>
          <td><?= $dataDetail['no_telp'] ?></td>
          <td><?= $dataDetail['status_anggota'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<script>
  window.print();
</script>

</body>
</html>
