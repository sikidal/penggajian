-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2023 at 02:09 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--
CREATE DATABASE IF NOT EXISTS `penggajian` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `penggajian`;

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

DROP TABLE IF EXISTS `bagian`;
CREATE TABLE IF NOT EXISTS `bagian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`) VALUES
(1, 'Marketing'),
(2, 'HRD'),
(3, 'Manager'),
(4, 'Gudang'),
(5, 'Test'),
(6, 'Test 2'),
(7, 'Test 3'),
(8, 'Test 4'),
(9, 'Test'),
(10, 'Test 5'),
(11, 'Test 6'),
(12, 'Test 7'),
(13, 'Test 8'),
(14, 'Test 9');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `gaji_pokok` int DEFAULT NULL,
  `status_karyawan` enum('TETAP','KONTRAK','MAGANG') DEFAULT NULL,
  `bagian_id` int DEFAULT '1',
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tanggal_mulai`, `gaji_pokok`, `status_karyawan`, `bagian_id`) VALUES
('0001', 'WACHID', '2022-10-01', 3100000, 'TETAP', 3),
('0002', 'DWI', '2011-01-05', 3100000, 'TETAP', 2),
('0003', 'TRIO', '2011-01-05', 2900000, 'TETAP', 1),
('0004', 'ARBA', '2015-09-09', 2400000, 'KONTRAK', 1),
('0005', 'PANCA', '2019-09-09', 2200000, 'KONTRAK', 1),
('0006', 'SITI', '2021-09-16', 1500000, 'MAGANG', 1),
('0008', 'WINDU', '2018-08-08', 1300000, 'KONTRAK', 1),
('0009', 'NINO', '2022-01-05', 1000000, 'TETAP', 1),
('0011', 'EVAN', '2022-01-05', 1000000, 'MAGANG', 1),
('0012', 'TIWI', '2022-12-31', 1234567, 'MAGANG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kosong`
--

DROP TABLE IF EXISTS `kosong`;
CREATE TABLE IF NOT EXISTS `kosong` (
  `id` int NOT NULL,
  `untuk_uji_coba_data_kosong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

DROP TABLE IF EXISTS `penggajian`;
CREATE TABLE IF NOT EXISTS `penggajian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `karyawan_nik` varchar(20) DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `bulan` char(2) DEFAULT NULL,
  `gaji_bayar` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id`, `karyawan_nik`, `tahun`, `bulan`, `gaji_bayar`) VALUES
(1, '0001', 2015, '07', 1000000),
(2, '0002', 2015, '07', 1000000),
(3, '0001', 2015, '08', 1000000),
(4, '0002', 2015, '08', 1000000),
(5, '0001', 2015, '09', 1200000),
(6, '0002', 2015, '09', 1200000),
(7, '0003', 2015, '09', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','pimpinan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Muhammad Edya Rosadi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(2, 'Haris Fadhilah', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan'),
(3, 'Administrator', 'administrator', '5f4dcc3b5aa765d61d8327deb882cf99', 'administrator'),
(4, 'Pimpinan', 'manager', '945e1851cabf212a22b1879e2ae017d5', 'pimpinan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
