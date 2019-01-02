-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 04:11 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `amount_id` int(11) NOT NULL,
  `amount_debet` int(11) NOT NULL,
  `amount_kredit` int(11) NOT NULL,
  `gl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `amount_debet`, `amount_kredit`, `gl_id`) VALUES
(1, 0, 50000, 11),
(2, 0, 100000, 10),
(3, 0, 20000, 19),
(4, 10000000, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cost_center`
--

CREATE TABLE `cost_center` (
  `cost_id` int(11) NOT NULL,
  `cost_no` varchar(11) NOT NULL,
  `cost_desc` varchar(50) NOT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost_center`
--

INSERT INTO `cost_center` (`cost_id`, `cost_no`, `cost_desc`, `dept_id`) VALUES
(1, '111101', 'Sanitary Napkin', 1),
(2, '111102', 'Diapers', 1),
(3, '111103', 'Engineering', 2),
(4, '111104', 'QC & RND', 3),
(5, '111105', 'HRD', 4),
(6, '111106', 'GA', 5),
(7, '111107', 'Accounting', 6),
(8, '111108', 'ITE', 7),
(9, '111109', 'Purchasing', 8),
(10, '111110', 'Ekspedisi', 9),
(11, '111111', 'PPIC', 9),
(12, '111112', 'Warehouse Sparepart', 9),
(13, '111113', 'Warehouse Raw Material', 9),
(14, '111114', 'Warehouse Finished Goods', 9),
(15, 'CB1069', 'Innova B 1069 KK', 5),
(16, 'CB1875', 'Innova B 1875 KE', 5),
(17, 'CB1042', 'Innova B 1042 BU', 5);

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
(4, 'HRD'),
(5, 'GA'),
(6, 'Accounting'),
(7, 'ITE'),
(8, 'Purchasing'),
(9, 'Logistic');

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
-- Table structure for table `kas_kecil`
--

CREATE TABLE `kas_kecil` (
  `kas_id` int(11) NOT NULL,
  `kas_no` int(5) NOT NULL,
  `kas_companycode` varchar(5) NOT NULL,
  `kas_requestor` varchar(50) NOT NULL,
  `kas_datecreate` datetime NOT NULL,
  `kas_date` datetime NOT NULL,
  `dept_id` int(11) NOT NULL,
  `gl_id` int(11) NOT NULL,
  `kas_desc` varchar(200) NOT NULL,
  `cost_id` int(11) NOT NULL,
  `amount_id` int(11) NOT NULL,
  `kas_status` int(11) NOT NULL COMMENT '1=pengajuan, 2=direvisi, 3=disetujui, 4=ditolak',
  `kas_note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_kecil`
--

INSERT INTO `kas_kecil` (`kas_id`, `kas_no`, `kas_companycode`, `kas_requestor`, `kas_datecreate`, `kas_date`, `dept_id`, `gl_id`, `kas_desc`, `cost_id`, `amount_id`, `kas_status`, `kas_note`) VALUES
(1, 100, 'A019', 'Denni Angga', '2018-12-15 11:16:07', '2018-12-15 11:16:07', 5, 11, 'Biaya Pajak Kendaraan', 6, 1, 1, ''),
(2, 101, 'A019', 'Angga', '2018-01-31 10:04:34', '2018-06-05 14:19:03', 5, 10, 'Biaya Bensin', 15, 2, 3, 'Disetujui dan mohon diproses'),
(3, 101, 'A019', 'Denni Angga', '2018-01-31 10:04:34', '2018-06-05 14:19:03', 5, 19, 'Pembelian snack', 6, 3, 3, 'Disetujui dan mohon diproses'),
(4, 102, 'A019', 'Imaniar', '2018-12-26 08:52:49', '2018-12-26 08:52:49', 6, 2, 'Debet', 7, 4, 1, 'Disetujui');

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
(1, 'Administrator', 'admin', '5012a1cbc560d21c9ad22c555790c2b0', 1, 6),
(2, 'Herman Suwanto', 'herman', 'a1a6907c989946085b0e35493786fce3', 2, 1),
(3, 'Admin ENG', 'admin', '74e6a8b111ea7da1a7d0a596f4c35208', 3, 2),
(4, 'Admin PRD', 'admin', '23e1691cb0a5e42bd8236b4ea794bf0c', 3, 1),
(7, 'Adm QC', 'admin', '9300c96aaec324987ea5ca6e13a02eda', 3, 3),
(8, 'Adm HRD', 'admin', '4bf31e6f4b818056eaacb83dff01c9b8', 3, 4),
(9, 'Adm PUR', 'admin', '8fc789ca71a8700c00acb230a58928bb', 3, 8),
(10, 'Adm LOG', 'admin', 'dc1d71bbb5c4d2a5e936db79ef10c19f', 3, 9),
(11, 'Admin ITE', 'admin', '69922873cb0cd47a84ef3e70b21eaf06', 3, 7),
(12, 'Adm GA', 'admin', '32d7508fe69220cb40af28441ef746d9', 3, 5);

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
-- Indexes for table `kas_kecil`
--
ALTER TABLE `kas_kecil`
  ADD PRIMARY KEY (`kas_id`);

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
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gl_account`
--
ALTER TABLE `gl_account`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kas_kecil`
--
ALTER TABLE `kas_kecil`
  MODIFY `kas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
