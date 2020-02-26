-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2020 at 11:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `nm_departement` varchar(100) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id_departement`, `nm_departement`, `keterangan`) VALUES
(1, 'Marketing', 'Departemen Pemasaran'),
(2, 'Front Office ', 'Departemen Kantor Depan'),
(3, 'Housekeeping', 'Departemen tata graham');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Unit Eselon I'),
(2, 'Unit Eselon II');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nik` int(11) NOT NULL,
  `nm_pegawai` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nik`, `nm_pegawai`, `password`, `email`, `departement_id`, `jabatan_id`, `alamat`, `pendidikan`, `jenis_kelamin`, `tgl_lahir`, `img`, `role`) VALUES
(1, 'frans', '28b662d883b6d76fd96e4ddc5e9ba780', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, 'manager'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, 'admin'),
(111, 'marketing', '28b662d883b6d76fd96e4ddc5e9ba780', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 'manager'),
(222, 'Front Office', '28b662d883b6d76fd96e4ddc5e9ba780', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, 'manager'),
(18291212, 'Hombing', 'f658b98c10ed89ea56bfbb9922ec9b3c', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
