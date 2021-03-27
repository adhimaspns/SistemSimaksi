-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2021 pada 18.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataansimaksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gunung`
--

CREATE TABLE `data_gunung` (
  `id_gunung` int(11) NOT NULL,
  `nama_gunung` varchar(100) NOT NULL,
  `mdpl` varchar(20) NOT NULL,
  `alamat_gunung` text NOT NULL,
  `unit_htm` int(100) NOT NULL,
  `satuan_htm` varchar(100) NOT NULL,
  `htm` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_gunung`
--

INSERT INTO `data_gunung` (`id_gunung`, `nama_gunung`, `mdpl`, `alamat_gunung`, `unit_htm`, `satuan_htm`, `htm`) VALUES
(1, 'Gunung Welirang ', '3339 Meter', 'Desa. Pacet Kab. Mojokerto, Prov. Jawa Timur', 1, 'Perorangan', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_simaksi`
--

CREATE TABLE `detail_simaksi` (
  `id_detail_simaksi` int(11) NOT NULL,
  `nomor_simaksi` varchar(30) NOT NULL,
  `gunung_id` varchar(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `status_anggota` varchar(10) NOT NULL,
  `htm_detail_anggota` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_simaksi`
--

INSERT INTO `detail_simaksi` (`id_detail_simaksi`, `nomor_simaksi`, `gunung_id`, `nama_lengkap`, `jenis_kelamin`, `alamat_lengkap`, `no_telp`, `status_anggota`, `htm_detail_anggota`) VALUES
(2, '202103270001', '1', 'Adhimas Putra Nugraha Sugianto', 'Laki-Laki', 'Desa.Mlaten Dusun.Mlaten Kec.Puri Kab.Mojokerto', '081615227898', 'Ketua', '10000'),
(3, '202103270001', '1', 'Tesing 2', 'Perempuan', 'alamat tesing', '0123123', 'Anggota', '10000'),
(4, '202103270001', '1', 'Testing 3', 'Laki-Laki', 'alamat testing 3', '23123123123', 'Anggota', '10000'),
(5, '202103270002', '1', 'Adhimas Putra Nugraha Sugianto', 'Laki-Laki', 'Desa.Mlaten Dusun.Mlaten Kec.Puri Kab.Mojokerto', '081615227898', 'Ketua', '10000'),
(6, '202103270002', '1', 'Tester 5', 'Laki-Laki', 'alamat tester', '809808', 'Anggota', '10000'),
(7, '202103270003', '1', 'Tester 1', 'Laki-Laki', 'alamat tester', '3123123121', 'Ketua', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl_simaksi` datetime NOT NULL,
  `lprn_tgl_keluar` datetime DEFAULT NULL,
  `nomor_simaksi` varchar(30) NOT NULL,
  `gunung_id` varchar(9) NOT NULL,
  `laporan_tgl_masuk` date NOT NULL,
  `laporan_tgl_keluar` date NOT NULL,
  `laporan_jml_hari` varchar(10) NOT NULL,
  `jumlah_pendaki` int(10) NOT NULL,
  `total_biaya` decimal(10,0) NOT NULL,
  `lprn_status_pendakian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tgl_simaksi`, `lprn_tgl_keluar`, `nomor_simaksi`, `gunung_id`, `laporan_tgl_masuk`, `laporan_tgl_keluar`, `laporan_jml_hari`, `jumlah_pendaki`, `total_biaya`, `lprn_status_pendakian`) VALUES
(1, '2021-03-27 15:47:01', '2021-03-31 17:33:31', '202103270001', '1', '2021-03-27', '2021-03-31', '4 Hari', 3, '30000', 'Masih Mendaki'),
(4, '2021-03-27 17:30:37', '2021-03-27 17:34:21', '202103270002', '1', '2021-03-27', '2021-04-01', '5 Hari', 2, '20000', 'Sudah Turun'),
(6, '2021-03-27 17:35:32', '2021-03-27 17:36:05', '202103270003', '1', '2021-03-27', '2021-03-27', '0 Hari', 1, '10000', 'Sudah Turun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simaksi`
--

CREATE TABLE `simaksi` (
  `id_simaksi` int(11) NOT NULL,
  `no_urut` varchar(30) NOT NULL,
  `tgl_simaksi` date NOT NULL,
  `gunung_id` varchar(10) NOT NULL,
  `satuan_pendakian` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah_hari` varchar(10) NOT NULL,
  `status_pendakian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `simaksi`
--

INSERT INTO `simaksi` (`id_simaksi`, `no_urut`, `tgl_simaksi`, `gunung_id`, `satuan_pendakian`, `tgl_masuk`, `tgl_keluar`, `jumlah_hari`, `status_pendakian`) VALUES
(11, '202103270001', '2021-03-27', '1', 'Kelompok', '2021-03-27', '2021-03-31', '4 Hari', 'Sudah Turun'),
(12, '202103270002', '2021-03-27', '1', 'Kelompok', '2021-03-27', '2021-04-01', '5 Hari', 'Sudah Turun'),
(13, '202103270003', '2021-03-27', '1', 'Solo', '2021-03-27', '2021-03-27', '0 Hari', 'Sudah Turun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `nomor_simaksi` varchar(30) NOT NULL,
  `gunung_id` varchar(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `status_anggota` varchar(10) NOT NULL,
  `htm_anggota` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_gunung`
--
ALTER TABLE `data_gunung`
  ADD PRIMARY KEY (`id_gunung`);

--
-- Indeks untuk tabel `detail_simaksi`
--
ALTER TABLE `detail_simaksi`
  ADD PRIMARY KEY (`id_detail_simaksi`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `simaksi`
--
ALTER TABLE `simaksi`
  ADD PRIMARY KEY (`id_simaksi`),
  ADD UNIQUE KEY `no_urut` (`no_urut`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_gunung`
--
ALTER TABLE `data_gunung`
  MODIFY `id_gunung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_simaksi`
--
ALTER TABLE `detail_simaksi`
  MODIFY `id_detail_simaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `simaksi`
--
ALTER TABLE `simaksi`
  MODIFY `id_simaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
