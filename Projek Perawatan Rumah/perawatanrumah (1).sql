-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 08:10 PM
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
-- Database: `perawatanrumah`
--

-- --------------------------------------------------------

--
-- Table structure for table `companyaccount`
--

CREATE TABLE `companyaccount` (
  `id` int(11) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companyaccount`
--

INSERT INTO `companyaccount` (`id`, `companyname`, `email`, `phone`, `address`, `city`, `password`, `level_user`) VALUES
(1, 'udin', 'udin@gmailcom', '21311213', 'jogja', 'jogja', 'e2a47d699525dfa42419623a2bfcc9a96f4b7a3da2275a720deeeeebefb03a9f', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` int(11) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `nama_jasa` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `harga` int(12) NOT NULL,
  `durasi` varchar(12) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `companyname`, `nama_jasa`, `kategori`, `jenis`, `deskripsi`, `harga`, `durasi`, `gambar`, `status`) VALUES
(3, 'udin', 'asd', 'Kebersihan Rumah', 'Pembersihan harian/rutin', 'adssad', 12, '12', '', 'Disetujui'),
(4, 'udin', 'asd', 'Kebersihan Rumah', 'Pembersihan harian/rutin', 'asd', 1, '1', '', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `id_order` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `keluhan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `nama_pelanggan`, `id_order`, `nama_perusahaan`, `keluhan`) VALUES
(3, 'user', 1, 'udin', 'asdassadads');

-- --------------------------------------------------------

--
-- Table structure for table `listorder`
--

CREATE TABLE `listorder` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama_jasa` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `nominal_bayar` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_selesai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bukti_transfer` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listorder`
--

INSERT INTO `listorder` (`id`, `nama_pelanggan`, `alamat`, `nomor_telepon`, `catatan`, `nama_perusahaan`, `nama_jasa`, `jenis`, `harga`, `metode_pembayaran`, `nominal_bayar`, `tanggal`, `tanggal_selesai`, `bukti_transfer`, `status`) VALUES
(1, 'user', 'asdads', '123', 'asdads', 'udin', 'asd', 'Pembersihan harian/rutin', 12, 'bank', 12312, '2024-12-23 15:05:45', '2024-12-23 15:05:45', 'uploads/1734948920_Stray Sheep.jpeg', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `address`, `password`, `level_user`) VALUES
(1, 'rijal', 'rijal@gmail.com', '085774884576', 'Bogor', '250c18565fb2cbe7cc3ce31fb84f99fe46fe81f4d3c6e17ffdd45f0dfc9c7d1d', 1),
(2, 'user', 'user@gmail.com', '123123123', 'bogor', 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companyaccount`
--
ALTER TABLE `companyaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listorder`
--
ALTER TABLE `listorder`
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
-- AUTO_INCREMENT for table `companyaccount`
--
ALTER TABLE `companyaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listorder`
--
ALTER TABLE `listorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
