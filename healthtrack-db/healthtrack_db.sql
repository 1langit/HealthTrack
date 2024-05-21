-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 04:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_spesialis` varchar(35) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `jenis_spesialis`, `kontak`, `alamat`) VALUES
(1, 'Dr. Arya Pratama', 'Kardiologi', '081234567890', 'Jl. Sudirman No. 10, Jakarta'),
(2, 'Dr. Budi Santoso', 'Neurologi', '081234567891', 'Jl. Thamrin No. 20, Jakarta'),
(3, 'Dr. Clara Wijaya', 'Pediatri', '081234567892', 'Jl. Gatot Subroto No. 30, Jakarta');

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

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `tgl_lahir`, `jenis_kelamin`, `kontak`, `alamat`) VALUES
(1, 'Andi Wijaya', '1990-01-01', 'Laki-laki', '081298765432', 'Jl. Kebon Jeruk No. 15, Jakarta'),
(2, 'Budi Hartono', '1985-05-20', 'Laki-laki', '081298765433', 'Jl. Mangga Besar No. 25, Jakarta'),
(3, 'Citra Dewi', '1992-12-30', 'Perempuan', '081298765434', 'Jl. Melawai No. 35, Jakarta');

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
-- Dumping data for table `riwayat_pemeriksaan`
--

INSERT INTO `riwayat_pemeriksaan` (`id_riwayat`, `id_pasien`, `id_dokter`, `Tanggal_Pemeriksaan`, `Diagnosis`, `Tindakan`, `Obat_yang_Diresepkan`, `Catatan`) VALUES
(1, 1, 1, '2024-05-01', 'Hipertensi', 'Pengukuran tekanan darah, EKG', 'Amlodipine 10mg', 'Perlu kontrol tekanan darah setiap bulan'),
(2, 2, 2, '2024-05-10', 'Migrain', 'Pemeriksaan neurologi', 'Sumatriptan 50mg', 'Hindari stres dan makanan pemicu'),
(3, 3, 3, '2024-05-15', 'Infeksi saluran pernapasan', 'Pemeriksaan fisik, X-ray', 'Amoxicillin 500mg', 'Banyak istirahat dan minum air putih');

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
