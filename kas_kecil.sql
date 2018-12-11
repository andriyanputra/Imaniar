-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 08:52 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas_kecil`
--

-- --------------------------------------------------------

--
-- Table structure for table `cost_center`
--

CREATE TABLE `cost_center` (
  `cost_id` int(11) NOT NULL,
  `cost_no` varchar(11) NOT NULL,
  `cost_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost_center`
--

INSERT INTO `cost_center` (`cost_id`, `cost_no`, `cost_desc`) VALUES
(1, '111101', 'Sanitary Napkin'),
(2, '111102', 'Diapers'),
(3, '111103', 'Engineering'),
(4, '111104', 'QC & RND'),
(5, '111105', 'HRD'),
(6, '111106', 'GA'),
(7, '111107', 'Accounting'),
(8, '111108', 'ITE'),
(9, '111109', 'Purchasing'),
(10, '111110', 'Ekspedisi'),
(11, '111111', 'PPIC'),
(12, '111112', 'Warehouse Sparepart'),
(13, '111113', 'Warehouse Raw Material'),
(14, '111114', 'Warehouse Finished Goods'),
(15, 'CB1069', 'Innova B 1069 KK'),
(16, 'CB1875', 'Innova B 1875 KE'),
(17, 'CB1042', 'Innova B 1042 BU');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(11) NOT NULL,
  `dept_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_nama`) VALUES
(1, 'Produksi'),
(2, 'Engineering'),
(3, 'QC & RND'),
(4, 'HRD & GA'),
(5, 'Accounting'),
(6, 'ITE'),
(7, 'Purchasing'),
(8, 'Logistic');

-- --------------------------------------------------------

--
-- Table structure for table `gl_account`
--

CREATE TABLE `gl_account` (
  `gl_id` int(11) NOT NULL,
  `gl_no` int(11) NOT NULL,
  `gl_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gl_account`
--

INSERT INTO `gl_account` (`gl_id`, `gl_no`, `gl_desc`) VALUES
(1, 11100010, 'Kas Mandiri'),
(2, 11110105, 'Kas Kecil'),
(3, 21040202, 'PPH 23'),
(4, 21040203, 'PPH 21'),
(5, 62010101, 'Biaya PDAM'),
(6, 62010102, 'Biaya Telepon'),
(7, 62010103, 'Biaya Catering'),
(8, 62010104, 'Biaya Adm. Bank'),
(9, 62010105, 'Biaya Parkir & Tol'),
(10, 62010106, 'Biaya Bensin'),
(11, 62010107, 'Biaya Pajak Kendaraan'),
(12, 62010108, 'Biaya Pemeliharaan Kendaraan'),
(13, 62010109, 'Biaya Akomodasi'),
(14, 62010110, 'Biaya Dinas Luar'),
(15, 62010111, 'Biaya Visa Izin & Registrasi'),
(16, 62010112, 'Biaya Materai'),
(17, 62010113, 'Biaya Pos/Kurir'),
(18, 62010114, 'Biaya Recruitment'),
(19, 62010115, 'Biaya Humas'),
(20, 62010116, 'Biaya Representasi'),
(21, 62010117, 'Biaya Upah Borongan'),
(22, 62010118, 'Biaya Penghargaan Karyawan'),
(23, 62010119, 'Biaya Pernikahan/Kelahiran'),
(24, 62010120, 'Biaya Kematian'),
(25, 62010121, 'Biaya Pengunduran Diri'),
(26, 62010122, 'Biaya Kecelakaan Kerja'),
(27, 62010123, 'Biaya Keamanan'),
(28, 62010124, 'Biaya Kebersihan'),
(29, 62010125, 'Biaya Dapur'),
(30, 62010126, 'Biaya Obat-obatan'),
(31, 62010127, 'Biaya Cetakan/Fotokopi'),
(32, 62010128, 'Biaya Perlengkapan Kantor'),
(33, 62010129, 'Biaya Perlengkapan Sparepart'),
(34, 62010130, 'Biaya Lain-lain Lab'),
(35, 62010131, 'Biaya Pemeliharaan Bangunan & Prasarana'),
(36, 62010132, 'Biaya Sewa Peralatan Berat'),
(37, 62010133, 'Biaya Translator'),
(38, 62010134, 'Biaya Umum Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `peg_id` int(11) NOT NULL,
  `peg_nama` varchar(50) NOT NULL,
  `peg_user` varchar(20) NOT NULL,
  `peg_pass` varchar(250) NOT NULL,
  `peg_level` int(4) NOT NULL COMMENT '1=admin, 2=aproval, 3=user',
  `dept_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`peg_id`, `peg_nama`, `peg_user`, `peg_pass`, `peg_level`, `dept_id`) VALUES
(1, 'Administrator', 'admin', '5012a1cbc560d21c9ad22c555790c2b0', 1, 5),
(2, 'Herman Suwanto', 'herman', 'a1a6907c989946085b0e35493786fce3', 2, 1),
(3, 'Admin ENG', 'admin', '74e6a8b111ea7da1a7d0a596f4c35208', 3, 2),
(4, 'Admin PRD', 'admin', '23e1691cb0a5e42bd8236b4ea794bf0c', 3, 1),
(7, 'Adm QC', 'admin', '9300c96aaec324987ea5ca6e13a02eda', 3, 3),
(8, 'Adm HRD & GA', 'admin', '4bf31e6f4b818056eaacb83dff01c9b8', 3, 4),
(9, 'Adm PUR', 'admin', '8fc789ca71a8700c00acb230a58928bb', 3, 7),
(10, 'Adm LOG', 'admin', 'dc1d71bbb5c4d2a5e936db79ef10c19f', 3, 8),
(11, 'Admin ITE', 'admin', '69922873cb0cd47a84ef3e70b21eaf06', 3, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cost_center`
--
ALTER TABLE `cost_center`
  ADD PRIMARY KEY (`cost_id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `gl_account`
--
ALTER TABLE `gl_account`
  ADD PRIMARY KEY (`gl_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`peg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cost_center`
--
ALTER TABLE `cost_center`
  MODIFY `cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gl_account`
--
ALTER TABLE `gl_account`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
