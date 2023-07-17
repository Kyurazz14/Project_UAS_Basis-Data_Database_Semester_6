-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 12:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepatu_dandeli`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `alamat_pembeli` varchar(255) DEFAULT NULL,
  `jenis_sepatu` varchar(50) DEFAULT NULL,
  `nama_sepatu` varchar(50) DEFAULT NULL,
  `ukuran_sepatu` varchar(10) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `jumlah_pembelian` int(11) DEFAULT NULL,
  `lokasi_pengiriman` varchar(255) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `nama_pembeli`, `alamat_pembeli`, `jenis_sepatu`, `nama_sepatu`, `ukuran_sepatu`, `tanggal_pembelian`, `jumlah_pembelian`, `lokasi_pengiriman`, `total_harga`, `metode_pembayaran`) VALUES
(119, 'Monkey D Luffy', 'Fusha ', 'Sepatu Second', 'Sepatu SC 3', '100', '2023-07-15', 10, 'East Blue', 800000.00, 'COD'),
(120, 'Roronoa Zoro', 'East Blue', 'Sepatu Import', 'Sepatu SI 3', '55', '2023-07-15', 11, 'Wano Kuni', 11000000.00, 'ATM'),
(121, 'Tony Chopper', 'Drum Island', 'Sepatu Lokal', 'Sepatu SL 1', '13', '2023-07-15', 13, 'Thousand Sunny', 1235000.00, 'Debit'),
(122, 'Vinsmoke Sanji', 'West Blue', 'Sepatu Second', 'Sepatu SC 3', '55', '2023-07-15', 11, 'Thousand Sunny', 880000.00, 'ATM'),
(123, 'Fishman Jinbe', 'Fishman Island', 'Sepatu Import', 'Sepatu SI 2', '60', '2023-07-15', 20, 'Thousand Sunny', 10000000.00, 'COD'),
(124, 'Doflamingo', 'Dresrossa', 'Sepatu Lokal', 'Sepatu SL 3', '34', '2023-07-15', 44, 'Colessium Dressrossa', 15400000.00, 'Debit'),
(125, 'Edward Newgate', 'Moby Dik', 'Sepatu Import', 'Sepatu SI 3', '100', '2023-07-15', 8, 'Kapal Mobi', 8000000.00, 'ATM'),
(126, 'Marco the Phoenix', 'Mobi Dik', 'Sepatu Second', 'Sepatu SC 3', '55', '2023-07-15', 28, 'Kapal Mobi', 2240000.00, 'Debit'),
(127, 'Marco the Phoenix', 'Mobi Dik', 'Sepatu Second', 'Sepatu SC 3', '55', '2023-07-15', 28, 'Kapal Mobi', 2240000.00, 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id`, `nama`, `email`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `username`, `password`) VALUES
(4, 'ttretert', '22001053011@unisma.ac.id', 'Jl. Pasundan', 'male', '2023-07-18', 'regis', '12345678'),
(5, 'Ardi', 'ardi@gmail.com', 'Ardirejo', 'male', '2023-07-11', 'Ardi', 'asu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
