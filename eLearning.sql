-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2020 at 11:26 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `link_konten` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Ikbal Nurrohman', 'ikbal', '$2y$10$M3Iz3OKB/hywdgQ7qqbxLuHHKkCStbg/JuTXPKmPeTitun7qrSRPy', 'ikbalnurrohman01@gmail.com', 'Sagarahiang', 'Screenshot_2020-01-06_10-36-22.png', 1, 1, '01 Jul 2020 19:07:21', '27 Jun 2020 23:13:45'),
(2, 'Annisa Nurulailly', 'nurul', '$2y$10$8OcTOcO.MdEqmt/GixfLku2ZU5mlPPawOxR98CLJd.HgK2n4QtfIS', 'annisa@gmail.com', '', 'default.png', 3, 1, '', '29 Jun 2020 19:35:46'),
(3, 'Galih Nulhakim', 'galih', '$2y$10$Y9cgoYkqudaGbUkJK4z0COygcQDGkOayOtsUAqWwMmu4aTo08r9Na', 'ardanava@gmail.com', 'Karanganyar Darma Kuningan', 'ayo.png', 2, 1, '30 Jun 2020 10:12:29', '29 Jun 2020 19:47:14');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
