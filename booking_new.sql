-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 07:02 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_new`
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
(9, 'Elisa MELISA', 'Leuwi Dongdong', '08190981445', 'elisamelisa@gmail.com', 'Perempuan', 'elisa', 49, 'elisa', NULL, '2017-08-16 18:24:26', NULL),
(10, 'Muhamad Sahlan', 'Kemang', '081906702498', 'alan.andalas@gmail.com', 'Laki-Laki', 'alansahlan', 51, 'alansahlan', NULL, '2018-01-27 18:39:33', NULL),
(11, 'Test Konsumen', 'Kemang', '09888903', 'test@gmail.com', 'Laki-Laki', 'test', 53, 'admin', NULL, '2018-01-29 16:59:37', NULL);

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
(4, 'Service Besar', 120000, 'admin', 'admin', '2017-01-18 16:01:25', '2018-01-29 16:04:07'),
(7, 'Ganti Spare part', 15000, 'admin', 'admin', '2017-01-23 16:23:14', '2018-01-29 17:02:28');

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
(8, 'Oli All', 'YPM-5TL0883', 'untuk sepeda motor matic dan non matic semua merk', 44000, 120, 15000, 'admin', 'admin', '2017-01-23 15:36:31', '2018-01-30 18:09:47'),
(9, 'Ban Tubeles zeneos (belakang)', 'YM90684', 'Untuk matic', 225000, 20, 20000, 'admin', 'admin', '2017-01-23 15:39:58', '2017-12-25 01:52:35'),
(10, 'Ban tubeles Zeneos (depan)', 'YM98440', 'Untuk motor matic depan', 175000, 20, 20000, 'admin', 'admin', '2017-01-23 15:40:49', '2017-11-05 05:28:40'),
(11, 'Kanvas Rem depan matic honda', 'YPM-5TL9282', 'merk aspira', 63000, 40, 12000, 'admin', 'admin', '2017-01-23 15:42:23', '2018-01-30 18:10:18'),
(12, 'Kanvas rem belakang matic honda', 'YM83633', 'merk aspira', 38000, 40, 12000, 'admin', 'admin', '2017-01-23 15:43:06', '2017-11-05 05:29:02'),
(13, 'Kanvas rem depan matic yamaha', 'YM07363', 'original', 73000, 40, 12000, 'admin', 'admin', '2017-01-23 15:45:42', '2017-11-05 05:29:13'),
(14, 'Kanvas rem belakang matic yamaha', 'YM93733', 'original', 42000, 40, 12000, 'admin', 'admin', '2017-01-23 15:46:40', '2017-11-05 05:29:37'),
(15, 'Kanvas rem depan ', 'YM-564812', 'all merk', 83000, 40, 12000, 'admin', 'admin', '2017-01-23 15:47:19', '2018-01-30 18:12:13'),
(16, 'Kanvas rem belakang', 'YM-7849', 'all merk', 48000, 40, 12000, 'admin', 'admin', '2017-01-23 15:47:47', '2018-01-30 18:12:38'),
(17, 'bohlam depan', 'YM-868345', 'merk osram', 2000, 100, 5000, 'admin', 'admin', '2017-01-23 15:48:39', '2018-01-30 18:13:01'),
(18, 'bohlam lampu belakang', 'YM-86334', 'merk osram', 15000, 100, 5000, 'admin', 'admin', '2017-01-23 15:49:11', '2018-01-30 18:13:25'),
(19, 'bohlam lampu sein', 'YM-78465', 'all merk', 3000, 100, 5000, 'admin', 'admin', '2017-01-23 15:49:37', '2018-01-30 18:13:45'),
(20, 'Rantai motor bebek', 'YM-78745', 'all merk (bukan original )', 83000, 20, 2000, 'admin', 'admin', '2017-01-23 15:52:36', '2018-01-30 18:14:08'),
(21, 'Rantai Motor sport ', 'YM-5Tl973', 'Non Original', 117000, 20, 20000, 'admin', 'admin', '2017-01-23 16:01:38', '2018-01-30 18:14:27'),
(22, 'Van belt matic', 'YM-BT9485', 'all matic', 84000, 20, 35000, 'admin', 'admin', '2017-01-23 16:02:33', '2018-01-30 18:14:55'),
(23, 'Busi ', 'YM58242', 'all motor bebek', 15500, 100, 5000, 'admin', 'admin', '2017-01-23 16:03:08', '2017-11-05 05:00:28'),
(24, 'mur & Baut', 'YM-5TL822', 'ukuran 8 12 14 16 18 dst', 2000, 10, 5000, 'admin', 'admin', '2017-01-23 16:04:45', '2018-01-30 18:10:55'),
(25, 'Spion  yamaha', 'YM-5TL883', 'kanan kiri', 28000, 20, 5000, 'admin', 'admin', '2017-01-23 16:18:37', '2018-01-30 18:11:24'),
(26, 'Gear Set Yamaha Vixion', 'YM09744', 'kanan kiri', 320000, 20, 35000, 'admin', 'admin', '2017-01-23 16:19:11', '2017-12-25 01:53:52'),
(27, 'Key Chain ', 'YM903908', 'kanan kiri', 39000, 20, 5000, 'admin', 'admin', '2017-01-23 16:20:58', '2017-12-25 01:54:18'),
(28, 'Gear Set', 'YM037347', 'Untuk Motor Mio, Mx dan Soul', 350000, 12, 45000, 'admin', NULL, '2017-11-05 04:58:30', NULL),
(29, 'Kampas BelakangMio J', 'YPM-5TL-874', 'Kampas Rem Belakang', 37000, 20, 15000, 'admin', NULL, '2018-01-29 17:01:53', NULL);

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
(1, 'admin', 'Rendy', '20128763', 'Service Counter', '0DPiKuNIrrVmD8IUCuw1hQxNqZc=', 'Administrator', 'admin', 'admin', '2016-11-13 23:45:32', '2018-01-29 16:21:22'),
(48, 'endul2', '', '', '', 'ARyUXzDOLLr8RS85hA8CVpMznEI=', 'Customer', 'endul2', NULL, '2016-12-27 17:11:28', NULL),
(49, 'elisa', '', '', '', 'A8MxKoodHM5iInCXnBK/lFL31l0=', 'Customer', 'elisa', NULL, '2017-08-16 18:24:26', NULL),
(50, 'servicecounter', 'Sahlan', '2012005', 'Service Counter', 'B9LWHyzRIpaqiNIzr3y9jXlr9m4=', 'Administrator', 'admin', 'admin', '2017-11-05 01:03:10', '2018-01-29 16:45:01'),
(51, 'alansahlan', '', '', '', 'ME/dMa9Ft7AqJeBw2eMAxO5XdL8=', 'Customer', 'alansahlan', NULL, '2018-01-27 18:39:33', NULL),
(52, 'administrator', 'Agus', '2012936', 'Kepala Mekanik', 'ME/dMa9Ft7AqJeBw2eMAxO5XdL8=', 'Administrator', 'admin', NULL, '2018-01-29 15:59:48', NULL),
(53, 'test', '', '', '', '2jmj7l5rSw0yVb/vlWAYkK/YBwk=', 'Customer', 'admin', NULL, '2018-01-29 16:59:37', NULL);

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
('SRV2017100700002', 9, 6, 5, 'E 4573 MK', 'Closed', 'Online', '09:19', '2017-10-08', 'sering mogok', 52000, 'elisa', 'admin', '2017-10-07 12:21:00', '2018-01-29 17:17:21');

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
  MODIFY `inIDCustomer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `inIDSparepart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `muser`
--
ALTER TABLE `muser`
  MODIFY `inIDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
