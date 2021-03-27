<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Beranda</title>
</head>
<body>

<?php
  include 'frontend/layouts/sidebar.php';
  include 'database/koneksi.php';

  $today = date('Y-m-d');
  $month = date('m', strtotime($today));

  $orderdate  = explode('-', $today);
  $years      = $orderdate[0];
  $month      = $orderdate[1];
  $day        = $orderdate[2];

  //! Select pendaki yang belum turun (kelompok)
  $status          = "Masih Mendaki";
  $satuan_kel      = "Kelompok";
  $selectPendaki   = "SELECT * FROM simaksi WHERE status_pendakian = '$status' AND satuan_pendakian = '$satuan_kel' "; 
  $queryPendaki    = mysqli_query($host, $selectPendaki);
  $dataPendaki     = mysqli_fetch_assoc($queryPendaki);
  $cekPendakiKel   = mysqli_num_rows($queryPendaki);

  //! Select pendaki yang belum turun (solo)
  $satuan             = "Solo";
  $selectPendakiSolo  = "SELECT * FROM simaksi WHERE status_pendakian = '$status' AND satuan_pendakian = '$satuan' "; 
  $queryPendakiSolo   = mysqli_query($host, $selectPendakiSolo);
  $dataPendakiSolo    = mysqli_fetch_assoc($queryPendakiSolo);
  $cekPendakiSolo     = mysqli_num_rows($queryPendakiSolo);
?>

<div class="content">
  <h1>Pendataan Simaksi Gunung</h1>
  <h2 class="teks-rata-kanan margin-top-100">Beranda</h2>


  <center>
    <div class="witdh-50">
      <div class="kotak-konten background-biru padding-20 teks-putih">
        <h2>
          <?php echo $cekPendakiKel ?> Kelompok
        </h2>
        <p>
          Kelompok Yang Masih Mendaki Pada Hari Ini
        </p>
      </div>
    </div>
    <div class="witdh-50">
      <div class="kotak-konten background-hijau padding-20 teks-putih">
        <h2>
          <?php echo $cekPendakiSolo ?>  Orang
        </h2>
        <p>
          Pendaki Solo Yang Masih Mendaki Pada Hari Ini
        </p>
      </div>
    </div>
  </center>
</div>

</body>
</html>
