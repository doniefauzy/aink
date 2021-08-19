-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2021 pada 10.16
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `jabatan`) VALUES
(1, 'Agung', 'Staf'),
(2, 'Indra', 'Jurusita'),
(3, 'Kiana', 'Hakim'),
(4, 'Maruas', 'Hakim'),
(5, 'Rere', 'Hakim'),
(6, 'Rini', 'Hakim'),
(7, 'Reza', 'Jurusita'),
(8, 'Sindi', 'Staf'),
(9, 'Robert', 'Kasubag'),
(10, 'Bambang', 'Panitera'),
(11, 'Cindy', 'Panitera Pengganti'),
(12, 'Dimas', 'Panitera Pengganti'),
(13, 'Eman', 'Hakim'),
(14, 'Fitri', 'Panitera'),
(15, 'Fandi', 'Staff'),
(16, 'Elang', 'Hakim'),
(17, 'Ginanjar', 'Sekretaris'),
(18, 'Gilang', 'Jurusita Pengganti'),
(19, 'Herman', 'Kasubag'),
(20, 'Heri', 'Staf'),
(21, 'Ilmi', 'Hakim'),
(22, 'Ikhsan', 'Jurusita'),
(23, 'Iman', 'Staff'),
(24, 'Jajang', 'Sekretaris'),
(25, 'Jika', 'Staff'),
(26, 'Komar', 'Panitera Muda'),
(27, 'Karina', 'Hakim'),
(28, 'Kirin', 'Kasubag'),
(29, 'Lazuar', 'Jurusita Pengganti'),
(30, 'Liliana', 'Kasubag'),
(31, 'Lamimah', 'Panitera'),
(32, 'Memen', 'Sekretaris'),
(33, 'Maman', 'Kasubag'),
(34, 'Nina', 'Staf'),
(35, 'Anissa', 'Hakim'),
(36, 'Nirmala', 'Panitera Pengganti'),
(37, 'Opik', 'Jurusita'),
(38, 'Oman', 'Hakim'),
(39, 'Osman', 'Sekretaris'),
(40, 'Patri', 'Panitera'),
(41, 'Asta', 'Hakim'),
(42, 'Noele', 'Staf'),
(43, 'Magna', 'Panitera Muda'),
(44, 'Luck', 'Panitera Pengganti'),
(45, 'Papat', 'Panitera'),
(46, 'Qamarul', 'Staf'),
(47, 'Roni', 'Sekretaris'),
(48, 'Ridwan', 'Hakim'),
(49, 'Rosa', 'Hakim'),
(50, 'Safitri', 'Jurusita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `password`) VALUES
(1, 'admin', '199602022019031008', '$2y$10$Ims4oLkjWtJNTP45xRAvWODcy/Uwd40PJyUzEHoKV9KJOp5x.hP2S');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
