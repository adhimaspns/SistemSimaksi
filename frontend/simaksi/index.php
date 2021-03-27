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

  $today   = date('Y-m-d');

  function tgl_indo($today){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $today);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }

?>

<div class="content">
  <h1>Pendataan Simaksi Gunung</h1>
  <h2 class="teks-rata-kanan margin-top-100">Data Simaksi</h2>

  <a href="simaksi.php?page=simaksi" class="tmbl tmbl-biru margin-20-0">
    Tambah Pendakian
  </a>

  <h2>Status Pendakian</h2>
  <h3>
    Tanggal Hari Ini : 
    <?= tgl_indo(date('Y-m-d'))?>
  </h3>
  <div class="kotak-table">
    <table class="table-responsive">
      <tr>
        <th>No</th>
        <th>Nomor Simaksi</th>
        <th>Yang Bertanda Tangan</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Banyaknya Orang</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      <?php
        $status          = "Masih Mendaki";
        $no              = 1;
        $selectSimaksi   = "SELECT * FROM simaksi WHERE status_pendakian = '$status' ";
        $querySimaksi    = mysqli_query($host, $selectSimaksi);
        while ($dataSimaksi = mysqli_fetch_assoc($querySimaksi) ) {
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $dataSimaksi['no_urut'] ?></td>
        <td>
          <?php
            $nomor_simaksi = $dataSimaksi['no_urut'];
            $statusAnggota = "Ketua";
            $selectKetua   = "SELECT nama_lengkap FROM detail_simaksi WHERE nomor_simaksi = '$nomor_simaksi' AND status_anggota = '$statusAnggota' ";
            $queryKetua    = mysqli_query($host, $selectKetua);
            $data_ketua    = mysqli_fetch_assoc($queryKetua);
            $nama_ketua    = $data_ketua['nama_lengkap']; 
          ?>
          <?= $nama_ketua ?>
        </td>
        <td><?= date('d M Y', strtotime($dataSimaksi['tgl_masuk'])) ?></td>
        <td><?= date('d M Y', strtotime($dataSimaksi['tgl_keluar'])) ?></td>
        <td>
          <?php
            $nomor_simaksi = $dataSimaksi['no_urut'];
            $selectLaporan = "SELECT jumlah_pendaki FROM laporan WHERE nomor_simaksi = '$nomor_simaksi' ";
            $queryLaporan    = mysqli_query($host, $selectLaporan);
            $data_laporan    = mysqli_fetch_assoc($queryLaporan);
            $jumlah_orang    = $data_laporan['jumlah_pendaki']; 
          ?>
          <?= $jumlah_orang . " Orang" ?>
        </td>
        <td><?= $dataSimaksi['status_pendakian'] ?></td>
        <td>
          <form action="../../backend/simaksi/simaksi.php" method="POST">
            <input type="hidden" name="noSimaksi" value="<?= $dataSimaksi['no_urut'] ?>">
            <input type="submit" name="pendaki_turun" class="tmbl tmbl-hijau" value="Sudah Turun">
          </form>
        </td>
        
      </tr>
      <?php } ?>
    </table>
  </div>

</div>

</body>
</html>
