-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2021 pada 20.18
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
(1, 'Gunung Welirang ', '3339 Meter', 'Desa. Pacet Kab. Mojokerto, Prov. Jawa Timur', 1, 'Perorangan', 10000),
(2, 'Gunung Lawu', '4000 Mdpl', 'Desa.Lawu Dusun.Kediri', 1, 'Perorangan', 20000);

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
(11, '202103270001', '2', 'Adhimas Putra Nugraha Sugianto', 'Laki-Laki', 'Desa.Mlaten Dusun.Mlaten', '081615227898', 'Ketua', '20000'),
(12, '202103270001', '2', 'Edi Purwanto', 'Laki-Laki', 'Desa.Dlanggu Dusun.Pohkecik', '08970898910', 'Anggota', '20000'),
(13, '202103270001', '2', 'Bondan Putra', 'Laki-Laki', 'Desa.Gondang Dusun.Sawahan', '085850123321', 'Anggota', '20000');

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
(8, '2021-03-27 20:06:28', '0000-00-00 00:00:00', '202103270001', '2', '2021-03-27', '2021-03-29', '2 Hari', 3, '60000', 'Masih Mendaki');

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
(16, '202103270001', '2021-03-27', '2', 'Kelompok', '2021-03-27', '2021-03-29', '2 Hari', 'Masih Mendaki');

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
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id_temp`, `nomor_simaksi`, `gunung_id`, `nama_lengkap`, `jenis_kelamin`, `alamat_lengkap`, `no_telp`, `status_anggota`, `htm_anggota`) VALUES
(10, '202103270005', '1', 'Edi Purwanto', 'Laki-Laki', 'Desa.Dlanggu Dusun.Pohkecik', '085785173514', 'Solo', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'putri_nova', 'putrinova123', 'admin');

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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_gunung`
--
ALTER TABLE `data_gunung`
  MODIFY `id_gunung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_simaksi`
--
ALTER TABLE `detail_simaksi`
  MODIFY `id_detail_simaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `simaksi`
--
ALTER TABLE `simaksi`
  MODIFY `id_simaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
