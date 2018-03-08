-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 11:27 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcustmotor`
--

CREATE TABLE `mcustmotor` (
  `inIDCustomer` int(10) NOT NULL,
  `chNoMotor` varchar(50) NOT NULL,
  `chJenisMotor` varchar(150) NOT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcustmotor`
--

INSERT INTO `mcustmotor` (`inIDCustomer`, `chNoMotor`, `chJenisMotor`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
(8, 'B 33333', 'Matic', 'admin', NULL, '2017-01-18 16:02:09', NULL),
(9, 'E 4573 MK', 'sport', 'elisa', NULL, '2017-10-07 02:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mcustomer`
--

CREATE TABLE `mcustomer` (
  `inIDCustomer` int(10) NOT NULL,
  `chCustomerName` varchar(250) NOT NULL,
  `chAddress` varchar(255) NOT NULL,
  `chPhone` varchar(20) DEFAULT NULL,
  `chEmail` varchar(100) DEFAULT NULL,
  `loJenisKelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `chUsername` varchar(50) DEFAULT NULL,
  `inIDUser` int(10) DEFAULT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcustomer`
--

INSERT INTO `mcustomer` (`inIDCustomer`, `chCustomerName`, `chAddress`, `chPhone`, `chEmail`, `loJenisKelamin`, `chUsername`, `inIDUser`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
(8, 'suheriyanto', 'jati padang', '085289989499', 'hery636@gmail.com', 'Laki-Laki', 'endul2', 48, 'endul2', 'admin', '2016-12-27 17:11:28', '2016-12-31 11:35:36'),
(9, 'Elisa MELISA', 'Leuwi Dongdong', '08190981445', 'elisamelisa@gmail.com', 'Perempuan', 'elisa', 49, 'elisa', NULL, '2017-08-16 18:24:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mjenisservice`
--

CREATE TABLE `mjenisservice` (
  `inIDJenisService` int(10) NOT NULL,
  `chJenisService` varchar(100) DEFAULT NULL,
  `inHarga` int(10) DEFAULT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mjenisservice`
--

INSERT INTO `mjenisservice` (`inIDJenisService`, `chJenisService`, `inHarga`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
(6, 'Service kecil', 27000, 'admin', 'admin', '2017-01-23 16:22:32', '2017-01-23 16:22:45'),
(5, 'Service Ringan', 45000, 'admin', NULL, '2017-01-23 16:22:02', NULL),
(4, 'Service Besar', 340000, 'admin', 'admin', '2017-01-18 16:01:25', '2017-01-23 16:21:43'),
(7, 'Ganti Spare part', 5000, 'admin', NULL, '2017-01-23 16:23:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mmekanik`
--

CREATE TABLE `mmekanik` (
  `inIDMekanik` int(10) NOT NULL,
  `chNamaMekanik` varchar(250) NOT NULL,
  `chPhone` varchar(20) DEFAULT NULL,
  `chAddress` varchar(255) DEFAULT NULL,
  `loJenisKelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmekanik`
--

INSERT INTO `mmekanik` (`inIDMekanik`, `chNamaMekanik`, `chPhone`, `chAddress`, `loJenisKelamin`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
(4, 'Rahman', '085289989498', 'Bandung', 'Laki-Laki', 'admin', 'admin', '2016-12-30 16:39:26', '2017-01-23 16:24:01'),
(3, 'Budi', '081313270899', 'kemang', 'Laki-Laki', 'admin', 'admin', '2016-12-30 16:39:11', '2017-01-23 16:24:23'),
(5, 'Ahmad', '085227209500', 'pejaten', 'Laki-Laki', 'admin', 'admin', '2016-12-30 16:54:24', '2017-01-23 16:24:40'),
(6, 'Edi', '0852270908', 'ragunan', 'Laki-Laki', 'admin', NULL, '2017-01-23 16:25:07', NULL),
(7, 'arif', '082221316547', 'Mampang', 'Laki-Laki', 'admin', NULL, '2017-01-23 16:25:49', NULL),
(8, 'Khaerul', '08889063221', 'pasar minggu', 'Laki-Laki', 'admin', NULL, '2017-01-23 16:26:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msparepart`
--

CREATE TABLE `msparepart` (
  `inIDSparepart` int(10) NOT NULL,
  `chNamaSparepart` varchar(250) NOT NULL,
  `chKdSparepart` varchar(50) NOT NULL,
  `chDescription` text NOT NULL,
  `inHarga` int(10) DEFAULT NULL,
  `inStock` int(10) DEFAULT NULL,
  `inOngkosPasang` int(10) DEFAULT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msparepart`
--

INSERT INTO `msparepart` (`inIDSparepart`, `chNamaSparepart`, `chKdSparepart`, `chDescription`, `inHarga`, `inStock`, `inOngkosPasang`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
(5, 'Aki Basah', 'YM90874', 'Aki untuk motor matic dan non matci tioe basah', 190000, 40, 5000, 'admin', 'admin', '2017-01-23 15:32:00', '2017-12-25 01:51:23'),
(4, 'Aki Kering', 'YM90387', 'Aki  untuk motor matic dan non matic ', 22000, 40, 5000, 'admin', 'admin', '2017-01-23 15:31:20', '2017-12-25 01:51:37'),
(6, 'Oli Yamalube', 'YM90383', 'Oli untuk motor merk yamaha 4T matic ', 32000, 99, 15000, 'admin', 'admin', '2017-01-23 15:33:30', '2017-11-05 05:27:57'),
(7, 'Oli Mpx', 'YM903652', 'oli untuk motor honda', 37000, 100, 15000, 'admin', 'admin', '2017-01-23 15:35:29', '2017-12-25 01:52:00'),
(8, 'Oli All', '', 'untuk sepeda motor matic dan non matic semua merk', 44000, 120, 15000, 'admin', NULL, '2017-01-23 15:36:31', NULL),
(9, 'Ban Tubeles zeneos (belakang)', 'YM90684', 'Untuk matic', 225000, 20, 20000, 'admin', 'admin', '2017-01-23 15:39:58', '2017-12-25 01:52:35'),
(10, 'Ban tubeles Zeneos (depan)', 'YM98440', 'Untuk motor matic depan', 175000, 20, 20000, 'admin', 'admin', '2017-01-23 15:40:49', '2017-11-05 05:28:40'),
(11, 'Kanvas Rem depan matic honda', 'YM03837', 'merk aspira', 63000, 40, 12000, 'admin', 'admin', '2017-01-23 15:42:23', '2017-11-05 05:28:53'),
(12, 'Kanvas rem belakang matic honda', 'YM83633', 'merk aspira', 38000, 40, 12000, 'admin', 'admin', '2017-01-23 15:43:06', '2017-11-05 05:29:02'),
(13, 'Kanvas rem depan matic yamaha', 'YM07363', 'original', 73000, 40, 12000, 'admin', 'admin', '2017-01-23 15:45:42', '2017-11-05 05:29:13'),
(14, 'Kanvas rem belakang matic yamaha', 'YM93733', 'original', 42000, 40, 12000, 'admin', 'admin', '2017-01-23 15:46:40', '2017-11-05 05:29:37'),
(15, 'Kanvas rem depan ', '', 'all merk', 83000, 40, 12000, 'admin', NULL, '2017-01-23 15:47:19', NULL),
(16, 'Kanvas rem belakang', '', 'all merk', 48000, 40, 12000, 'admin', NULL, '2017-01-23 15:47:47', NULL),
(17, 'bohlam depan', '', 'merk osram', 2000, 100, 5000, 'admin', NULL, '2017-01-23 15:48:39', NULL),
(18, 'bohlam lampu belakang', '', 'merk osram', 15000, 100, 5000, 'admin', NULL, '2017-01-23 15:49:11', NULL),
(19, 'bohlam lampu sein', '', 'all merk', 3000, 100, 5000, 'admin', NULL, '2017-01-23 15:49:37', NULL),
(20, 'Rantai motor bebek', '', 'all merk (bukan original )', 83000, 20, 2000, 'admin', NULL, '2017-01-23 15:52:36', NULL),
(21, 'Rantai Motor sport ', '', 'Non Original', 117000, 20, 20000, 'admin', NULL, '2017-01-23 16:01:38', NULL),
(22, 'Van belt matic', '', 'all matic', 84000, 20, 35000, 'admin', NULL, '2017-01-23 16:02:33', NULL),
(23, 'Busi ', 'YM58242', 'all motor bebek', 15500, 100, 5000, 'admin', 'admin', '2017-01-23 16:03:08', '2017-11-05 05:00:28'),
(24, 'mur & Baut', '', 'ukuran 8 12 14 16 18 dst', 2000, 10, 5000, 'admin', NULL, '2017-01-23 16:04:45', NULL),
(25, 'Spion  yamaha', '', 'kanan kiri', 28000, 20, 5000, 'admin', 'admin', '2017-01-23 16:18:37', '2017-01-23 16:20:27'),
(26, 'Gear Set Yamaha Vixion', 'YM09744', 'kanan kiri', 320000, 20, 35000, 'admin', 'admin', '2017-01-23 16:19:11', '2017-12-25 01:53:52'),
(27, 'Key Chain ', 'YM903908', 'kanan kiri', 39000, 20, 5000, 'admin', 'admin', '2017-01-23 16:20:58', '2017-12-25 01:54:18'),
(28, 'Gear Set', 'YM037347', 'Untuk Motor Mio, Mx dan Soul', 350000, 12, 45000, 'admin', NULL, '2017-11-05 04:58:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `muser`
--

CREATE TABLE `muser` (
  `inIDUser` int(11) NOT NULL,
  `chUsername` varchar(50) NOT NULL,
  `chNama` varchar(255) NOT NULL,
  `chNik` varchar(50) NOT NULL,
  `chJabatan` varchar(100) NOT NULL,
  `chPassword` varchar(150) NOT NULL,
  `chLevel` enum('Administrator','Customer','Owner') NOT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muser`
--

INSERT INTO `muser` (`inIDUser`, `chUsername`, `chNama`, `chNik`, `chJabatan`, `chPassword`, `chLevel`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
(1, 'admin', '', '', '', '0DPiKuNIrrVmD8IUCuw1hQxNqZc=', 'Administrator', 'admin', 'admin', '2016-11-13 23:45:32', '2016-11-19 20:59:17'),
(48, 'endul2', '', '', '', 'ARyUXzDOLLr8RS85hA8CVpMznEI=', 'Customer', 'endul2', NULL, '2016-12-27 17:11:28', NULL),
(49, 'elisa', '', '', '', 'A8MxKoodHM5iInCXnBK/lFL31l0=', 'Customer', 'elisa', NULL, '2017-08-16 18:24:26', NULL),
(50, 'servicecounter', 'Sahlan', '1334', 'Service Counter', 'B9LWHyzRIpaqiNIzr3y9jXlr9m4=', 'Administrator', 'admin', 'admin', '2017-11-05 01:03:10', '2017-11-05 01:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `tserviced`
--

CREATE TABLE `tserviced` (
  `chNoService` varchar(20) NOT NULL,
  `inIDSparepart` int(10) NOT NULL,
  `inQty` int(10) NOT NULL,
  `inSubTotalHarga` int(10) NOT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tserviced`
--

INSERT INTO `tserviced` (`chNoService`, `inIDSparepart`, `inQty`, `inSubTotalHarga`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
('SRV2017100700002', 6, 1, 52000, 'elisa', NULL, '2017-10-07 12:21:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tserviceh`
--

CREATE TABLE `tserviceh` (
  `chNoService` varchar(20) NOT NULL,
  `inIDCustomer` int(10) NOT NULL,
  `inIDJenisService` int(10) NOT NULL,
  `inIDMekanik` int(10) NOT NULL,
  `chNoMotor` varchar(50) NOT NULL,
  `loStatus` enum('Booking','Confirm','OnProgress','Closed','Cancel','Null') DEFAULT NULL,
  `loType` enum('Online','Offline') DEFAULT NULL,
  `chTime` varchar(5) DEFAULT NULL,
  `daServiceDate` date DEFAULT NULL,
  `chProblem` text,
  `inTotalHarga` int(10) DEFAULT NULL,
  `chUserCreate` varchar(50) DEFAULT NULL,
  `chUserUpdate` varchar(50) DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `dtUpdateDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tserviceh`
--

INSERT INTO `tserviceh` (`chNoService`, `inIDCustomer`, `inIDJenisService`, `inIDMekanik`, `chNoMotor`, `loStatus`, `loType`, `chTime`, `daServiceDate`, `chProblem`, `inTotalHarga`, `chUserCreate`, `chUserUpdate`, `dtCreateDate`, `dtUpdateDate`) VALUES
('SRV2017011800001', 8, 4, 0, 'B 33333', 'Cancel', 'Online', '09:02', '2017-01-11', 'hhh', 2000, 'endul2', 'admin', '2017-01-18 16:02:41', '2017-01-23 15:24:13'),
('SRV2017100700002', 9, 6, 0, 'E 4573 MK', 'Booking', 'Online', '09:19', '2017-10-08', 'sering mogok', 82000, 'elisa', NULL, '2017-10-07 12:21:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcustmotor`
--
ALTER TABLE `mcustmotor`
  ADD PRIMARY KEY (`inIDCustomer`,`chNoMotor`);

--
-- Indexes for table `mcustomer`
--
ALTER TABLE `mcustomer`
  ADD PRIMARY KEY (`inIDCustomer`);

--
-- Indexes for table `mjenisservice`
--
ALTER TABLE `mjenisservice`
  ADD PRIMARY KEY (`inIDJenisService`);

--
-- Indexes for table `mmekanik`
--
ALTER TABLE `mmekanik`
  ADD PRIMARY KEY (`inIDMekanik`);

--
-- Indexes for table `msparepart`
--
ALTER TABLE `msparepart`
  ADD PRIMARY KEY (`inIDSparepart`);

--
-- Indexes for table `muser`
--
ALTER TABLE `muser`
  ADD PRIMARY KEY (`inIDUser`);

--
-- Indexes for table `tserviced`
--
ALTER TABLE `tserviced`
  ADD PRIMARY KEY (`chNoService`,`inIDSparepart`);

--
-- Indexes for table `tserviceh`
--
ALTER TABLE `tserviceh`
  ADD PRIMARY KEY (`chNoService`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcustomer`
--
ALTER TABLE `mcustomer`
  MODIFY `inIDCustomer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mjenisservice`
--
ALTER TABLE `mjenisservice`
  MODIFY `inIDJenisService` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mmekanik`
--
ALTER TABLE `mmekanik`
  MODIFY `inIDMekanik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `msparepart`
--
ALTER TABLE `msparepart`
  MODIFY `inIDSparepart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `muser`
--
ALTER TABLE `muser`
  MODIFY `inIDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
