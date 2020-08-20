-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2020 at 11:49 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eLearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `nama_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `pengguna_id`, `nama_genre`) VALUES
(1, 1, 'Web Programming'),
(2, 1, 'Android Programming'),
(4, 1, 'Kuliner');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `Id_kursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_krs` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `keuntungan` text NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `id_genre`, `id_pengguna`, `nama_krs`, `gambar`, `deskripsi`, `keuntungan`, `created_at`) VALUES
(8, 1, 3, 'kursus 2', 'tugasDB.png', 'materi 2', 'materi 2', '15 Aug 2020 18:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `file_pendukung` varchar(100) NOT NULL,
  `status` enum('tidak dikunci','dikunci') NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `id_kursus`, `pengguna_id`, `judul`, `konten`, `link`, `file_pendukung`, `status`, `created_at`) VALUES
(4, 8, 3, 'materi 1', '<p>ini materi 1</p>', '', 'www-dewaweb-com-blog-entity-relationship-diagram-.pdf', '', '15 Aug 2020 18:55:10'),
(5, 8, 3, 'materi 2', '<p>ini materi 2</p>', '', 'Pemrograman Web Dinamis BAB_III-V.pdf', '', '15 Aug 2020 18:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `created_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `pw`, `email`, `alamat`, `gambar`, `role_id`, `is_active`, `last_login`, `created_at`) VALUES
(1, 'Ikbal', 'ikbal', '$2y$10$M3Iz3OKB/hywdgQ7qqbxLuHHKkCStbg/JuTXPKmPeTitun7qrSRPy', 'ikbalnurrohman01@gmail.com', 'Sagarahiang1', 'yaampun1.png', 1, 1, '24 Jul 2020 23:52:28', '27 Jun 2020 23:13:45'),
(2, 'Annisa Nurulailly', 'nurul', '$2y$10$8OcTOcO.MdEqmt/GixfLku2ZU5mlPPawOxR98CLJd.HgK2n4QtfIS', 'annisa@gmail.com', '', 'default.png', 3, 1, '12 Aug 2020 20:07:06', '29 Jun 2020 19:35:46'),
(3, 'Galih Nulhakim', 'ardanav', '$2y$10$eiUeDW8gJpPSd2LwAzy7oefXf6ngSXA.ZoXYRO.fC.xGXlqN8l75W', 'ardanava@gmail.com', 'Karanganyar Darma Kuningan', 'tintin.png', 2, 1, '20 Aug 2020 11:03:20', '08 Jul 2020 01:40:17'),
(4, 'Hana Pajarwati', 'hana', '$2y$10$7fDtUxxcN7T04WxTzCdS8ekqBhyYRnAyNQkZc74ygRzDAaz81nBIO', 'hana@gmail.com', '', 'default.png', 2, 1, '13 Jul 2020 20:29:35', '11 Jul 2020 11:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `roleName` enum('pengelola','instruktur','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `roleName`) VALUES
(1, 'pengelola'),
(2, 'instruktur'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `penugasan` tinytext NOT NULL,
  `file_penugasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `id_materi`, `penugasan`, `file_penugasan`) VALUES
(1, 3, 'cari data yang terkait di Google', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
