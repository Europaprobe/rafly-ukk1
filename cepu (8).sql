-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2023 pada 10.09
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cepu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'test'),
(2, 'test1'),
(3, 'Lalu Lintas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `nik` char(128) NOT NULL,
  `laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl`, `waktu`, `nik`, `laporan`, `foto`, `kategori`, `sub`, `status`) VALUES
(9, '2023-02-27', '13:19:00', '123', 'adsad', './assets/upload/3dlogo.png', '1', '5', 'selesai'),
(10, '2023-03-08', '01:46:00', '123', 'daw', './assets/upload/DFD_lvl_1_pengaduan_drawio.png', '1', '5', 'proses'),
(11, '2023-03-14', '09:33:00', '123', 'sdfasf', './assets/upload/OIP.jpg', '1', '5', 'proses'),
(13, '2023-03-21', '07:07:00', '123', 'asd', './assets/upload/12342-coca-cola-wwwcocacolacoid.jpg', '3', '9', '0'),
(14, '2023-03-21', '03:24:00', '123', 'lampu lalin rusak', './assets/upload/KISI-KISI UTS GASAL_RPL_XI RPL.pdf', '3', '10', '0'),
(15, '2023-03-21', '03:30:00', '123456789012', 'afsf', './assets/upload/12342-coca-cola-wwwcocacolacoid1.jpg', '3', '10', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `username`, `password`, `telp`, `level`) VALUES
(17, 'admin', 'admin', '$2y$10$h9lJv3tDrHccm3.hyw71eOIb/0IyYuDV9go40LMYMB3rBahi3Etf6', '087871958257', 'admin'),
(18, 'petugas', 'petugas', '$2y$10$qC2i1y6.w0rdsulQ6fvE/etos4YrYKdP3Y47BVGzQS0B0voGTtlL2', '087', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE `subkategori` (
  `subkategori_id` int(11) NOT NULL,
  `subkategori_nama` varchar(128) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`subkategori_id`, `subkategori_nama`, `kategori_id`) VALUES
(4, 'halo', 5),
(5, 'halo', 1),
(7, 'test2', 1),
(8, 'Parkir sembarangan', 3),
(9, 'Macet', 3),
(10, 'Lampu lalu lintas rusak', 3),
(11, 'tawuran', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_pengaduan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_pengaduan`, `tanggal`, `tanggapan`, `id_petugas`) VALUES
(9, '2023-03-21', 'asd', 18),
(10, '2023-03-21', 'dg', 18),
(11, '2023-03-21', 'asd', 18),
(15, '2023-03-21', 'asd', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` char(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `level` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `google_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `name`, `username`, `password`, `telp`, `level`, `img`, `email`, `google_id`) VALUES
(6, 'abc', '', '', '$2y$10$2EHpp6gdr94XN5ndQ5skK.OsBx/AMyfSecYaN3tpU1NruWOta2L42', '', 3, '', '', ''),
(8, '12345', 'test bang', 'halo halo', '$2y$10$oaJ3vbfhll0u2buwIKjKYel36RRpPu66aavISiIjSKi9WxAgwHrVW', '087871958257', 3, '', '', ''),
(9, '123456789012', 'asd', 'asd', '$2y$10$D8i7BSk4Koq0RNrsNMrJKu/DMpejAg85o34EaedyVnlUiGykrlKUe', '087871958257', 3, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`subkategori_id`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `subkategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
