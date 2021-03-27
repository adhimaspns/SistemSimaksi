<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Form Pendataan Anggota</title>
</head>
<body>

<?php
  include '../../database/koneksi.php';
  include '../../frontend/layouts/sidebar.php';
?>

<div class="content">
  <h1>Pendataan Simaksi Gunung</h1>
  <h2 class="teks-rata-kanan margin-top-100">Data Simaksi</h2>

  <?php
    $simaksi   = $_GET['simaksi'];
    $gunung_id = $_GET['gunung']; 

    //! Select Simaksi
    $selectSimaksi   = "SELECT * FROM simaksi INNER JOIN data_gunung ON simaksi.gunung_id = data_gunung.id_gunung WHERE no_urut = '$simaksi' ";
    $querySimaksi    = mysqli_query($host, $selectSimaksi); 
    $dataSimaksi     = mysqli_fetch_assoc($querySimaksi);
    $noUrut          = $dataSimaksi['no_urut'];
    ?>
  <h3>Data Simaksi</h3>
  <form class="margin-bottom-50" style="width: 50%;">
    <label>Nomor Simaksi</label>
    <input type="text" class="form form-edit" value="<?= $dataSimaksi['no_urut'] ?>" readonly>

    <label>Tanggal Pendaftaran</label>
    <input type="text" class="form form-edit" value="<?= date('d M Y', strtotime($dataSimaksi['tgl_simaksi'])) ?>" readonly>

    <label>Gunung Yang Dituju</label>
    <input type="text" class="form form-edit" value="<?= $dataSimaksi['nama_gunung'] ?>" readonly>

    <label>Satuan Pendakian</label>
    <input type="text" class="form form-edit" value="<?= $dataSimaksi['satuan_pendakian'] ?>" readonly>

    <label>Tanggal Masuk</label>
    <input type="text" class="form form-edit" value="<?= date('d M Y', strtotime($dataSimaksi['tgl_masuk'])) ?>" readonly>

    <label>Tanggal Keluar</label>
    <input type="text" class="form form-edit" value="<?= date('d M Y', strtotime($dataSimaksi['tgl_keluar'])) ?>" readonly>

    <label>Jumlah Hari</label>
    <input type="text" class="form form-edit" value="<?= $dataSimaksi['jumlah_hari'] ?>" readonly>

    <label>Harga Tiket</label>
    <input type="text" class="form form-edit" value="<?= "Rp. " . number_format($dataSimaksi['htm'],0,',','.') ?>" readonly>

  </form>

  <h2>Pendataan Anggota</h2>
  <div class="kotak-form margin-bottom-50">
    <form action="../../backend/simaksi/simaksi.php" method="POST">

      <input type="hidden" name="no_urut" value="<?= $noUrut ?>">
      <input type="hidden" name="gunung_id" value="<?= $gunung_id ?>">

      <label>Nama Lengkap</label>
      <input type="text" class="form" name="nama_lengkap" placeholder="Adhimas Putra Nugraha Sugianto" required>

      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form">
        <option value="Laki-Laki">laki-laki</option>
        <option value="Perempuan">perempuan</option>
      </select>

      <label>Alamat Lengkap</label>
      <textarea name="alamat" class="form textarea-no-resize" cols="30" rows="10" placeholder="Desa. Mlaten Dusun. Mlaten, Kec. Puri Kab. Mojokerto" required></textarea>

      <label>No Telepon (mudah dihubungi)</label>
      <input type="number" class="form" name="no_telp" placeholder="08161227898" required>

      <label>Status Kelompok</label>
      <select name="status_anggota" class="form" required>
        <option value="Anggota">Anggota</option>
        <option value="Ketua">Ketua</option>
      </select>

      <input type="submit" class="button-form-full background-hijau" name="simpan_data_anggota" value="Simpan">
    </form>
  </div>

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
        $selectTemp   = "SELECT * FROM temp WHERE nomor_simaksi = '$noUrut' ";
        $queryTemp    = mysqli_query($host, $selectTemp);
        while ($dataTemp = mysqli_fetch_assoc($queryTemp) ) {
      ?>
      <tr>
        <td><?= $no++?></td>
        <td><?= $dataTemp['nama_lengkap']?></td>
        <td><?= $dataTemp['jenis_kelamin']?></td>
        <td><?= $dataTemp['alamat_lengkap']?></td>
        <td><?= $dataTemp['no_telp']?></td>
        <td>
          <?php
            if ($dataTemp['status_anggota'] == 'Ketua' ) {
              echo "<span class='lencana-radius lencana-biru'>Ketua</span>";
            } else {
              echo "<span class='lencana-radius lencana-hijau'>Anggota</span>";
            }
            
          ?>
        </td>
      </tr>
      <?php } ?>
      <tr>
        <?php
          $sumBiaya    = "SELECT SUM(htm_anggota) AS total_tiket FROM temp WHERE nomor_simaksi = '$noUrut' ";
          $querySum    = mysqli_query($host, $sumBiaya);
          $total_tiket = mysqli_fetch_assoc($querySum);
        ?>
        <td colspan="5" class="background-hijau teks-putih">Total Biaya</td>
        <td colspan="1" class="background-hijau teks-putih"><?= "Rp. " . number_format($total_tiket['total_tiket'],0,',','.') ?></td>
      </tr>
    </table>
  </div>
  <form action="../../backend/simaksi/simaksi.php" method="POST">
    <?php
      $selectDataTemp = "SELECT * FROM temp WHERE nomor_simaksi = '$simaksi' ";
      $queryDataTemp  = mysqli_query($host, $selectDataTemp);
      $cekDataTemp    = mysqli_num_rows($queryDataTemp);
    ?>
    <input type="hidden" name="noUrut" value="<?= $simaksi ?>">
    <input type="hidden" name="gunung_id" value="<?= $gunung_id ?>">
    <input type="hidden" name="jumlah_pendaki" value="<?= $cekDataTemp ?>">
    <input type="hidden" name="tgl_masuk" value="<?= $dataSimaksi['tgl_masuk'] ?>">
    <input type="hidden" name="tgl_keluar" value="<?= $dataSimaksi['tgl_keluar'] ?>">
    <input type="hidden" name="jml_hari" value="<?= $dataSimaksi['jumlah_hari'] ?>">
    <input type="hidden" name="biaya_total" value="<?= $total_tiket['total_tiket'] ?>">

    <input type="submit" class="tmbl tmbl-hijau margin-20-0" name="simpanDftrAnggota" value="Simpan">
  </form>
  <br>
  <br>
  <br>


</div>

</body>
</html>
