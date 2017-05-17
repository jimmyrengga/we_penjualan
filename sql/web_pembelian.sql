-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2017 at 12:00 AM
-- Server version: 5.6.16-1~exp1
-- PHP Version: 5.6.30-10+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pembelian`
--
CREATE DATABASE IF NOT EXISTS `web_pembelian` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web_pembelian`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pembelian`
--

CREATE TABLE `trx_pembelian` (
  `no_pembelian` varchar(50) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `supplier_id` varchar(50) NOT NULL,
  `jumlah_harga` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pembelian_detail`
--

CREATE TABLE `trx_pembelian_detail` (
  `no_pembelian` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` decimal(19,2) NOT NULL,
  `total_harga` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `status`, `nama_lengkap`) VALUES
('admin', 'admin', 1, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `trx_pembelian`
--
ALTER TABLE `trx_pembelian`
  ADD PRIMARY KEY (`no_pembelian`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `trx_pembelian_detail`
--
ALTER TABLE `trx_pembelian_detail`
  ADD KEY `no_pembelian` (`no_pembelian`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trx_pembelian`
--
ALTER TABLE `trx_pembelian`
  ADD CONSTRAINT `trx_pembelian_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trx_pembelian_detail`
--
ALTER TABLE `trx_pembelian_detail`
  ADD CONSTRAINT `trx_pembelian_detail_ibfk_2` FOREIGN KEY (`no_pembelian`) REFERENCES `trx_pembelian` (`no_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_pembelian_detail_ibfk_3` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
