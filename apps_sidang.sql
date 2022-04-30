-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 06:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps_sidang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `photo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `username`, `password`, `nama`, `photo`) VALUES
(1, 'BataraBTN901', '12345678', 'Antonius Sidauruk', 'img1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_kas_keluar`
--

CREATE TABLE `data_kas_keluar` (
  `nama` varchar(30) NOT NULL,
  `nip` int(4) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `lama_pinjam` int(10) NOT NULL,
  `keluar` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_kas_masuk`
--

CREATE TABLE `data_kas_masuk` (
  `uang_masuk` int(30) NOT NULL,
  `tanggal` date NOT NULL,
  `nip` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ruangan` enum('IT','Analysis','Support','Funding','KPR') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `head` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kas_keluar`
--
ALTER TABLE `data_kas_keluar`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_kas_masuk`
--
ALTER TABLE `data_kas_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_kas_masuk`
--
ALTER TABLE `data_kas_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kas_keluar`
--
ALTER TABLE `data_kas_keluar`
  ADD CONSTRAINT `data_kas_keluar_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `data_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_kas_masuk`
--
ALTER TABLE `data_kas_masuk`
  ADD CONSTRAINT `data_kas_masuk_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `data_kas_keluar` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
