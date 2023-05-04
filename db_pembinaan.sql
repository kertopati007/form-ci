-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2023 at 02:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembinaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jenis_perpus` varchar(50) NOT NULL,
  `sub_jenis_perpus` varchar(50) NOT NULL,
  `nama_lembaga` varchar(100) NOT NULL,
  `nama_perpus` varchar(100) NOT NULL,
  `akreditasi` varchar(10) NOT NULL,
  `kabupaten` varchar(10) NOT NULL,
  `kecamatan` varchar(10) NOT NULL,
  `kelurahan` varchar(10) NOT NULL,
  `terakhir_dibina` date DEFAULT NULL,
  `rec_hasil` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `dibina_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id`, `nama`, `nip`, `no_telp`, `jenis_perpus`, `sub_jenis_perpus`, `nama_lembaga`, `nama_perpus`, `akreditasi`, `kabupaten`, `kecamatan`, `kelurahan`, `terakhir_dibina`, `rec_hasil`, `alamat`, `status`, `created_at`, `dibina_at`) VALUES
(1, 'Yusfu', '0343242333', '081343333', 'sekolah', 'Perpustakaan SMK', 'sma 1', 'Perpusku', 'BELUM', '3302', '3302050', '3302050006', NULL, '', 'Surakarata', 0, '2023-01-23', NULL),
(2, 'Ria', '3423432423', '23423423432', 'umum', 'Perpustakaan Kabupaten Kota', 'kota solo', 'solokuu', 'A', '3309', '3309060', '3309060001', NULL, '', 'solooooo', 0, '2023-01-23', NULL),
(3, 'Muchlasin', '1223121213', '123131412', 'sekolah', 'Perpustakaan SMK', 'Perpus SINUS', 'SINUNS LIB', 'B', '3372', '3372010', '3372010002', NULL, '', 'LAWEYAN', 1, '2023-01-23', '2023-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
