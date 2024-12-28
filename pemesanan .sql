-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 03:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cikuda_explore`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesanan` varchar(255) NOT NULL,
  `hp_pemesan` varchar(20) NOT NULL,
  `waktu_wisata` date NOT NULL,
  `hari_wisata` int(11) NOT NULL,
  `paket_inap` tinyint(1) DEFAULT 0,
  `paket_transport` tinyint(1) DEFAULT 0,
  `paket_makan` tinyint(1) DEFAULT 0,
  `jumlah_peserta` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama_pemesanan`, `hp_pemesan`, `waktu_wisata`, `hari_wisata`, `paket_inap`, `paket_transport`, `paket_makan`, `jumlah_peserta`, `total_tagihan`, `is_deleted`, `created_at`) VALUES
(25, 'rintan', '09876328', '2024-12-23', 1, 1, 1, 0, 1, 2200000, 0, '2024-12-23 16:11:31'),
(26, 'nurhaliza', '0987', '2024-12-20', 2, 0, 1, 0, 2, 4800000, 0, '2024-12-23 16:12:01'),
(27, 'rudi', '09876256778', '2024-12-26', 1, 1, 1, 1, 3, 8100000, 0, '2024-12-23 16:12:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
