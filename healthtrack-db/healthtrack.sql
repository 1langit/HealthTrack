-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthtrack_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE DATABASE IF NOT EXISTS `healthtrack_db`;

USE `healthtrack_db`;

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_spesialis` varchar(35) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pemeriksaan`
--

CREATE TABLE `riwayat_pemeriksaan` (
  `id_riwayat` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `Tanggal_Pemeriksaan` date DEFAULT NULL,
  `Diagnosis` text DEFAULT NULL,
  `Tindakan` text DEFAULT NULL,
  `Obat_yang_Diresepkan` text DEFAULT NULL,
  `Catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `riwayat_pemeriksaan`
--
ALTER TABLE `riwayat_pemeriksaan`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_pemeriksaan`
--
ALTER TABLE `riwayat_pemeriksaan`
  ADD CONSTRAINT `riwayat_pemeriksaan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `riwayat_pemeriksaan_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
