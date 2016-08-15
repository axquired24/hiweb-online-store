-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 10:17 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_kategori`
--

CREATE TABLE IF NOT EXISTS `all_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_kategori`
--

INSERT INTO `all_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Baju Batik Solo'),
(2, 'Batik Lampung '),
(3, 'Batik Asam Manis'),
(4, 'Batik Aceh'),
(5, 'Batik FKIP'),
(6, 'Batik Polosan'),
(7, 'Batik Aksara Lampung'),
(8, 'Batik Mahalan - Branded');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(5) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` varchar(10) NOT NULL,
  `kategori_produk` int(5) NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `kategori_produk`, `gambar_produk`) VALUES
(1, 'Batik Merah Pink', '28000', 3, 'baju-batik.jpg'),
(2, 'Batik Biru', '45000', 1, 'baju-batik.jpg'),
(3, 'Batik Putih', '100000', 1, 'baju-batik.jpg'),
(5, 'Batik Kuhued', '29000', 6, 'baju-batik.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_kategori`
--
ALTER TABLE `all_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_kategori`
--
ALTER TABLE `all_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
