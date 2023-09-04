-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 02:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4-portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nama_hotel` varchar(25) NOT NULL,
  `bintang` enum('1','2','3','4','5') NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `nama_hotel`, `bintang`, `alamat`, `telp`, `email`) VALUES
(1, 'dupan', '2', 'Batang', '097543589990', 'ayunirmala.002@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-06-05-152515', 'App\\Database\\Migrations\\Profile', 'default', 'App', 1654443046, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telp` varchar(256) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `alamat`, `email`, `telp`, `gambar`) VALUES
(5, 'Aulia', 'Doro Pekalongan', 'Aulia@gmail.com', '085312312399', '1654530637_2891e6399a0cfc3e4680.jpg'),
(12, 'AYU NIRMALA', 'Batang', 'ayunirmlaa@gmail.com', '085741733318', '1670939787_ec0c0bd281e64e138709.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkin`
--

CREATE TABLE `tbl_checkin` (
  `id` int(11) NOT NULL,
  `idtamu` varchar(5) NOT NULL,
  `idkamar` varchar(5) NOT NULL,
  `checkin` date NOT NULL,
  `duration` int(11) NOT NULL,
  `status` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `idkamar` varchar(5) NOT NULL,
  `nokamar` varchar(11) NOT NULL,
  `idtipekamar` varchar(5) NOT NULL,
  `price` double NOT NULL,
  `allotment` int(11) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`idkamar`, `nokamar`, `idtipekamar`, `price`, `allotment`, `picture`) VALUES
('2', 'a', '10', 300, 1, '1671769154_3a8520a9351a36436f5e.png'),
('3', 'a', '10', 300, 1, '1671773918_be38822775a6f0838bb1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `kode` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `bintang` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `idtamu` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`idtamu`, `nama`, `alamat`, `email`, `telp`) VALUES
('2', '90', 'BATANG', 'ayunirmlaa@gmail.com', '097543589990'),
('3', 'ayu', 'BATANG', 'ayunirmlaa@gmail.com', '097543589990');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipekamar`
--

CREATE TABLE `tbl_tipekamar` (
  `idtipekamar` varchar(5) NOT NULL,
  `namatipe` varchar(11) NOT NULL,
  `ukuran` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_tipekamar`
--

INSERT INTO `tbl_tipekamar` (`idtipekamar`, `namatipe`, `ukuran`) VALUES
('10', 'top', '192 x 154');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtamu` (`idtamu`,`idkamar`),
  ADD KEY `fk_id_kamar` (`idkamar`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`idkamar`),
  ADD KEY `idtipekamar` (`idtipekamar`),
  ADD KEY `idtipekamar_2` (`idtipekamar`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- Indexes for table `tbl_tipekamar`
--
ALTER TABLE `tbl_tipekamar`
  ADD PRIMARY KEY (`idtipekamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  ADD CONSTRAINT `fk_id_kamar` FOREIGN KEY (`idkamar`) REFERENCES `tbl_kamar` (`idkamar`),
  ADD CONSTRAINT `fk_id_tamu` FOREIGN KEY (`idtamu`) REFERENCES `tbl_tamu` (`idtamu`);

--
-- Constraints for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD CONSTRAINT `fk_id_tipekamar` FOREIGN KEY (`idtipekamar`) REFERENCES `tbl_tipekamar` (`idtipekamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
