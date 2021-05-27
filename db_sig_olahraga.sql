-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 05:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sig_olahraga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_nama` varchar(255) DEFAULT NULL,
  `admin_alamat` varchar(255) DEFAULT NULL,
  `admin_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_nama`, `admin_alamat`, `admin_foto`) VALUES
(25, 'user2', 'user2', 'nama baru', 'alamat', 'foto.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bt`
--

CREATE TABLE `tb_bt` (
  `bt_id` int(11) NOT NULL,
  `bt_nama` varchar(255) DEFAULT NULL,
  `bt_alamat` varchar(255) DEFAULT NULL,
  `bt_jam_buka` varchar(255) DEFAULT NULL,
  `bt_jam_tutup` varchar(255) DEFAULT NULL,
  `bt_kontak` varchar(255) DEFAULT NULL,
  `bt_jumlah` int(11) DEFAULT NULL,
  `bt_biaya` float DEFAULT NULL,
  `bt_foto` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `bt_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bt`
--

INSERT INTO `tb_bt` (`bt_id`, `bt_nama`, `bt_alamat`, `bt_jam_buka`, `bt_jam_tutup`, `bt_kontak`, `bt_jumlah`, `bt_biaya`, `bt_foto`, `latitude`, `longitude`, `bt_status`) VALUES
(1, 'lapangan bulu tangkis 1', 'alamat 1', '08:56', '10:56', 'kontak 1', NULL, NULL, 'bt_default.jpg', '-8.580181', '116.100741', 1),
(7, 'nama baru', 'alamat baru', '08:03', '07:58', '0987654', NULL, NULL, 'gigit.jpg', '-8.578135628497737', '116.10660116437805', 1),
(8, 'as baru', 'bn baru', '01:55', '20:00', 'kontak baru', NULL, NULL, '10155177_540626589389254_4387240563293915915_n1.jpg', '-8.601049980458777', '116.13956703163419', 1),
(9, 'nama baru 1', 'alamat baru 1', '06:05', '00:05', '987654', NULL, NULL, 'EVOS-ESPORTS-New-Logo-2018-300x290.png', '-8.4095178', '115.18891599999999', 2),
(10, 'lap baru', 'al baru', '03:37', '23:37', 'kon baru', NULL, NULL, 'image_2021-05-25_233735.png', '-8.5542059', '116.1233981', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `stts_id` int(11) NOT NULL,
  `stts_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`stts_id`, `stts_nama`) VALUES
(1, 'Diverifikasi'),
(2, 'Tidak diverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_bt`
--
ALTER TABLE `tb_bt`
  ADD PRIMARY KEY (`bt_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`stts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_bt`
--
ALTER TABLE `tb_bt`
  MODIFY `bt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `stts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
