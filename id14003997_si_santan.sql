-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Jun 2020 pada 13.14
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14003997_si_santan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_sisantan`
--

CREATE TABLE `admin_sisantan` (
  `id` int(11) NOT NULL,
  `user_admin` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pass_admin` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `admin_sisantan`
--

INSERT INTO `admin_sisantan` (`id`, `user_admin`, `pass_admin`) VALUES
(3, 'admin', 'admin'),
(4, 'anashaq', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_pesanan`
--

CREATE TABLE `daftar_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pesanan1` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pesanan2` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `daftar_pesanan`
--

INSERT INTO `daftar_pesanan` (`id_pesanan`, `id`, `nama`, `pesanan1`, `pesanan2`, `email`, `telp`, `alamat`) VALUES
(1, 2, 'Ahmad Nashirul Haq', 'Mesin Pengolah Kopi', 'Bibit Kopi', 'ramboxman22@gmail.com', '085231689831', 'Hai'),
(2, 2, 'Ahmad Nashirul Haq', 'Mesin Pengolah Kopi', 'Bibit Kopi', 'ramboxman22@gmail.com', '085231689831', 'aaaa'),
(3, 3, 'RIZAL', 'Mesin Pengolah Kelapa', 'Bibit Kelapa', 'Zalrizal0416@gmail.con', '085704712650', 'Sidoarjo'),
(5, 2, 'Ahmad Nashirul Haq', 'Mesin Pengolah Jagung', 'Bibit Kopi', 'ramboxman22@gmail.com', '085231689831', ''),
(6, 2, 'Ahmad Nashirul Haq', 'Mesin Pengolah Padi', 'Bibit Kelapa', 'ramboxman23@gmail.com', '085231689831', 'aaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_alat_pesanan`
--

CREATE TABLE `jumlah_alat_pesanan` (
  `id_barang` int(11) NOT NULL,
  `nama_alat` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jumlah_alat_pesanan`
--

INSERT INTO `jumlah_alat_pesanan` (`id_barang`, `nama_alat`, `jumlah`) VALUES
(1, 'Mesin Pengolah Kopi', 2),
(2, 'Mesin Pengolah Kelapa', 1),
(3, 'Mesin Pengolah Padi', 1),
(4, 'Mesin Pengolah Jagung', 1),
(5, 'Mesin Pengolah Umbi-Umbian', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_bibit`
--

CREATE TABLE `jumlah_bibit` (
  `id` int(11) NOT NULL,
  `nama_bibit` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jumlah_bibit`
--

INSERT INTO `jumlah_bibit` (`id`, `nama_bibit`, `jumlah`) VALUES
(1, 'Bibit Kopi', 3),
(2, 'Bibit Kelapa', 2),
(3, 'Bibit Padi', 0),
(4, 'Bibit Jagung ', 0),
(5, 'Bibit Umbi-Umbian', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `telp`, `alamat`) VALUES
(2, 'anashaq', 'aaaa', 'Ahmad Nashirul Haq', 'ramboxman22@gmail.com', '085231689831', 'aaaa'),
(3, 'Rizal04', 'Rizal04', 'M Rizal Abdullah Rozi', 'Zalrizal040416@gmail.com', '085704712640', 'Sidoarjo');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_sisantan`
--
ALTER TABLE `admin_sisantan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_pesanan`
--
ALTER TABLE `daftar_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_id` (`id`);

--
-- Indeks untuk tabel `jumlah_alat_pesanan`
--
ALTER TABLE `jumlah_alat_pesanan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `jumlah_bibit`
--
ALTER TABLE `jumlah_bibit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik_username` (`username`),
  ADD UNIQUE KEY `unik_email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_sisantan`
--
ALTER TABLE `admin_sisantan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `daftar_pesanan`
--
ALTER TABLE `daftar_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jumlah_alat_pesanan`
--
ALTER TABLE `jumlah_alat_pesanan`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_pesanan`
--
ALTER TABLE `daftar_pesanan`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
