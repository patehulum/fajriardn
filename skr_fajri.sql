-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 09:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skr_fajri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Menu', 'menu', 'fa fa-list', 0),
(2, 'Master Data', '#', 'fa fa-cubes', 0),
(3, 'Keuangan', '#', 'fa fa-list', 0),
(4, 'Daftar Barang', 'master_barang', 'fa fa-list', 2),
(5, 'Barang Masuk', 'master_barang/in', 'fa fa-truck', 0),
(6, 'Barang Keluar', 'master_barang/out', 'fa fa-sign-out', 0),
(7, 'Pemasukan', 'income', 'fa fa-money', 3),
(8, 'Pengeluaran', 'outcome', 'fa fa-usd', 3),
(9, 'Gaji Mekanik', 'gaji_mekanik', 'fa fa-money', 3),
(10, 'Service Kendaraan', 'service', 'fa fa-money', 0),
(11, 'Customer', 'cust', 'fa fa-user', 2),
(12, 'Pengguna Sistem', 'user', 'fa fa-id-badge', 0),
(13, 'Mekanik', 'mekanik', 'fa fa-book', 2),
(14, 'Paket Service', 'paket_service', 'fa fa-database', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_in`
--

CREATE TABLE `tbl_barang_in` (
  `id_in` int(10) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tanggal_in` varchar(100) NOT NULL,
  `qty_awal` int(10) NOT NULL,
  `qty_in` int(10) NOT NULL,
  `last_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_in`
--

INSERT INTO `tbl_barang_in` (`id_in`, `kd_barang`, `nama_barang`, `tanggal_in`, `qty_awal`, `qty_in`, `last_qty`) VALUES
(11, '5nw-76da', 'Vanbelt MIO Sporty BIG ', '2022-12-25', 15, 10, 25),
(15, '5tl-423', 'Stang Mio Sporty 2006', '2022-12-25', 3, 10, 13),
(16, 'KW6SP', 'Bearing Nsr SP', '2022-12-25', 0, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_out`
--

CREATE TABLE `tbl_barang_out` (
  `id_out` int(10) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tanggal_out` varchar(100) NOT NULL,
  `invoice_out` varchar(100) NOT NULL,
  `qty_awal` int(10) NOT NULL,
  `qty_out` int(10) NOT NULL,
  `last_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_out`
--

INSERT INTO `tbl_barang_out` (`id_out`, `kd_barang`, `nama_barang`, `tanggal_out`, `invoice_out`, `qty_awal`, `qty_out`, `last_qty`) VALUES
(24, '5vv-423', 'knalpot bobokan mio', '2022-12-01', 'INV-251222-023939', 5, 1, 4),
(25, '5vv-423', 'knalpot bobokan mio', '2022-12-27', 'INV-271222-013551', 4, 1, 3),
(26, '5tl-423', 'Stang Mio Sporty 2006', '2022-12-27', 'INV-271222-013551', 13, 1, 12),
(27, '5tl-423', 'Stang Mio Sporty 2006', '2023-01-18', 'INV-180123-123623', 12, 1, 11),
(28, '5tl-423', 'Stang Mio Sporty 2006', '2023-01-18', 'INV-180123-010338', 11, 1, 10),
(29, '5tl-423', 'Stang Mio Sporty 2006', '2023-01-18', 'INV-180123-022639', 10, 1, 9),
(30, '5tl-423', 'Stang Mio Sporty 2006', '2023-01-18', 'INV-180123-022904', 9, 2, 7),
(31, '5tl-423', 'Stang Mio Sporty 2006', '2023-01-18', 'INV-180123-023113', 7, 1, 6),
(32, '5vv-423', 'knalpot bobokan mio', '2023-01-18', 'INV-180123-023113', 3, 1, 2),
(33, '5tl-423', 'Stang Mio Sporty 2006', '2023-01-19', 'INV-180123-025754', 6, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(10) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `no_plat` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `handphone` varchar(12) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `th_kendaraan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama_customer`, `no_plat`, `alamat`, `handphone`, `jenis_kendaraan`, `th_kendaraan`) VALUES
(2, 'Nop Al Nab Il', 'BD 9808 K', 'Jl. Jakarta Selatan', '081232322242', 'Mio', 2011),
(3, 'Miki Miko', 'OP 4547 PO', 'Jl. Bekasi Jaya', '087712213342', 'Satri Fu', 2007),
(4, 'Wakcuy', 'B 3452 TMR', 'Jl. Jakarta Barat', '088823222111', 'Mio', 2004),
(5, 'bu andiani', 'B 1234 RFK', 'JL DEPOK', '089323212', 'Mio', 2010),
(6, 'tuti', 'B 1234 RFK', 'Jl JKARTA', '0897878788', 'mio', 2005),
(7, 'iya', 'B 19 OK', 'JL. Bekasi Timur', '087712213342', 'NSR', 1999),
(9, 'bu andiani2', 'B 1234 RFS', 'jl jl', '08983912312', 'Vixion Ngebut', 98),
(10, 'tuti2', 'B 1234 RFKS', 'JL. Bekasi Timur', '087712213342', '', 0),
(11, 'bu andiani3', 'B 1234 RFK2', 'JL. Bekasi Timur', '087712213342', 'Mio', 2312);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji_mekanik`
--

CREATE TABLE `tbl_gaji_mekanik` (
  `id_gaji` int(10) NOT NULL,
  `id_mekanik` int(10) NOT NULL,
  `nama_mekanik` varchar(100) NOT NULL,
  `tanggal_service` varchar(100) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `nama_cust` varchar(100) NOT NULL,
  `jumlah_gaji` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gaji_mekanik`
--

INSERT INTO `tbl_gaji_mekanik` (`id_gaji`, `id_mekanik`, `nama_mekanik`, `tanggal_service`, `no_invoice`, `nama_cust`, `jumlah_gaji`) VALUES
(14, 1, 'Aldi', '2022-12-01', 'INV-251222-023939', 'Nop Al Nab Il', 60000),
(15, 4, 'Fajri', '2022-12-27', 'INV-271222-013551', 'bu andiani', 60000),
(16, 1, 'Aldi', '2023-01-18', 'INV-180123-123623', 'Miki Miko', 54000),
(17, 1, 'Aldi', '2023-01-18', 'INV-180123-010338', 'Nop Al Nab Il', 60000),
(18, 4, 'Fajri', '2023-01-18', 'INV-180123-022639', 'Wakcuy', 6000),
(19, 4, 'Fajri', '2023-01-18', 'INV-180123-022904', 'bu andiani3', 33000),
(20, 1, 'Aldi', '2023-01-18', 'INV-180123-023038', 'tuti2', 6000),
(21, 1, 'Aldi', '2023-01-18', 'INV-180123-023113', 'tuti2', 6000),
(22, 1, 'Aldi', '2023-01-19', 'INV-180123-025754', 'Nop Al Nab Il', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income`
--

CREATE TABLE `tbl_income` (
  `id_income` int(10) NOT NULL,
  `invoice_income` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `income_amount` int(10) NOT NULL,
  `saldo_awal` int(10) NOT NULL,
  `saldo_akhir` int(10) NOT NULL,
  `tanggal_income` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_income`
--

INSERT INTO `tbl_income` (`id_income`, `invoice_income`, `customer`, `income_amount`, `saldo_awal`, `saldo_akhir`, `tanggal_income`) VALUES
(1, 'INV-251222-023939', 'Nop Al Nab Il', 900000, 10000000, 10900000, '2022-12-01'),
(2, 'INV-271222-013551', 'bu andiani', 980000, 9560000, 10540000, '2022-12-27'),
(3, 'INV-180123-123623', 'Miki Miko', 170000, 10480000, 10650000, '2023-01-18'),
(4, 'INV-180123-010338', 'Nop Al Nab Il', 180000, 10596000, 10776000, '2023-01-18'),
(5, 'INV-180123-022639', 'Wakcuy', 90000, 10716000, 10806000, '2023-01-18'),
(6, 'INV-180123-022904', 'bu andiani3', 215000, 10800000, 11015000, '2023-01-18'),
(7, 'INV-180123-023113', 'tuti2', 890000, 10982000, 11872000, '2023-01-18'),
(8, 'INV-180123-025754', 'Nop Al Nab Il', 90000, 11866000, 11956000, '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `nama_bengkel` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telp` int(12) NOT NULL,
  `saldo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`nama_bengkel`, `alamat`, `telp`, `saldo`) VALUES
('ZicSpeed', 'Kota Bekasi', 682187654, 11950000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_barang`
--

CREATE TABLE `tbl_master_barang` (
  `kd_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `kuantitas` int(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_master_barang`
--

INSERT INTO `tbl_master_barang` (`kd_barang`, `nama_barang`, `harga_barang`, `harga_jual`, `kuantitas`, `foto`) VALUES
('5nw-76da', 'Vanbelt MIO Sporty BIG G', 63000, 100000, 25, 'wallpaper1.jpg'),
('5tl-423', 'Stang Mio Sporty 2006', 63000, 80000, 5, 'Untitled2.png'),
('5vv-423', 'knalpot bobokan mio', 500000, 800000, 2, 'impreza.jpg'),
('5yp-bys', 'Tangki Byson', 200000, 250000, 10, 'baleno.jpg'),
('KW6SP', 'Bearing Nsr SP', 65000, 95000, 10, 'nsr_sp_bearing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mekanik`
--

CREATE TABLE `tbl_mekanik` (
  `id_mekanik` int(10) NOT NULL,
  `nama_mekanik` varchar(100) NOT NULL,
  `bod` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mekanik`
--

INSERT INTO `tbl_mekanik` (`id_mekanik`, `nama_mekanik`, `bod`, `telp`, `alamat`, `foto`) VALUES
(1, 'Aldi', 'Medan, 27 Okt 1984', '082147483647', 'jl ciketing asem raya blok s5 no 29, kota bekasi, bekasi', 'user-siluet.jpg'),
(4, 'Fajri', 'Bekasi, 22 Januari 1999', '081211837090', 'jl mutiara gading timur blok l1 no 17, kota bekasi', 'praza_22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_outcome`
--

CREATE TABLE `tbl_outcome` (
  `id_outcome` int(11) NOT NULL,
  `tanggal_outcome` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `outcome_amount` int(10) NOT NULL,
  `saldo_awal` int(10) NOT NULL,
  `saldo_akhir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_outcome`
--

INSERT INTO `tbl_outcome` (`id_outcome`, `tanggal_outcome`, `keperluan`, `outcome_amount`, `saldo_awal`, `saldo_akhir`) VALUES
(1, '2022-12-01', 'Bayar Jasa Service ke Aldi sejumlah RP.60000', 60000, 10900000, 10840000),
(2, '2022-12-25', 'Beli Stang Mio Sporty 2006 10 Pcs', 630000, 10840000, 10210000),
(3, '2022-12-25', 'Beli Bearing Nsr SP 10 Pcs', 650000, 10210000, 9560000),
(4, '2022-12-27', 'Bayar Jasa Service ke Fajri sejumlah RP.60000', 60000, 10540000, 10480000),
(5, '2023-01-18', 'Bayar Jasa Service ke Aldi sejumlah RP.54000', 54000, 10650000, 10596000),
(6, '2023-01-18', 'Bayar Jasa Service ke Aldi sejumlah RP.60000', 60000, 10776000, 10716000),
(7, '2023-01-18', 'Bayar Jasa Service ke Fajri sejumlah RP.6000', 6000, 10806000, 10800000),
(8, '2023-01-18', 'Bayar Jasa Service ke Fajri sejumlah RP.33000', 33000, 11015000, 10982000),
(9, '2023-01-18', 'Bayar Jasa Service ke Aldi sejumlah RP.6000', 6000, 11872000, 11866000),
(10, '2023-01-19', 'Bayar Jasa Service ke Aldi sejumlah RP.6000', 6000, 11956000, 11950000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_service`
--

CREATE TABLE `tbl_paket_service` (
  `id_paket_service` int(10) NOT NULL,
  `nama_paket_service` varchar(50) NOT NULL,
  `harga_paket_service` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket_service`
--

INSERT INTO `tbl_paket_service` (`id_paket_service`, `nama_paket_service`, `harga_paket_service`) VALUES
(2, 'Service Ringan', 10000),
(4, 'Non Paket', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id_service` int(10) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `no_plat` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_mekanik` int(10) DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id_service`, `no_invoice`, `no_plat`, `tanggal`, `kd_barang`, `qty`, `total`, `keterangan`, `id_mekanik`, `nama_barang`) VALUES
(98, 'INV-251222-023939', 'BD 9808 K', '2022-12-01', '000', 1, 100000, 'Jasa Service Knalpot Racing', 1, 'Barang Lain | Jasa Service'),
(99, 'INV-251222-023939', 'BD 9808 K', '2022-12-01', '5vv-423', 1, 800000, NULL, NULL, 'knalpot bobokan mio'),
(100, 'INV-271222-013551', 'B 1234 RFK', '2022-12-27', '000', 1, 100000, 'service knalpot', 4, 'Barang Lain | Jasa Service'),
(101, 'INV-271222-013551', 'B 1234 RFK', '2022-12-27', '5vv-423', 1, 800000, NULL, NULL, 'knalpot bobokan mio'),
(102, 'INV-271222-013551', 'B 1234 RFK', '2022-12-27', '5tl-423', 1, 80000, NULL, NULL, 'Stang Mio Sporty 2006'),
(103, 'INV-180123-123623', 'OP 4547 PO', '2023-01-18', '000', 1, 90000, 'adada ada', 1, 'Barang Lain | Jasa Service'),
(104, 'INV-180123-123623', 'OP 4547 PO', '2023-01-18', '5tl-423', 1, 80000, NULL, NULL, 'Stang Mio Sporty 2006'),
(105, 'INV-180123-010338', 'BD 9808 K', '2023-01-18', '000', 1, 100000, 'ASDKSADSAK\r\nDSAKDSAKSAK\r\nKDSAKDSAK', 1, 'Barang Lain | Jasa Service'),
(106, 'INV-180123-010338', 'BD 9808 K', '2023-01-18', '5tl-423', 1, 80000, NULL, NULL, 'Stang Mio Sporty 2006'),
(107, 'INV-180123-022639', 'B 3452 TMR', '2023-01-18', '000', 1, 10000, '- Borap ', 4, 'Biaya jasa service'),
(108, 'INV-180123-022639', 'B 3452 TMR', '2023-01-18', '5tl-423', 1, 80000, NULL, NULL, 'Stang Mio Sporty 2006'),
(109, 'INV-180123-022904', 'B 1234 RFK2', '2023-01-18', '000', 1, 55000, ' test aja', 4, 'Biaya jasa service'),
(110, 'INV-180123-022904', 'B 1234 RFK2', '2023-01-18', '5tl-423', 2, 160000, NULL, NULL, 'Stang Mio Sporty 2006'),
(111, 'INV-180123-023038', 'B 1234 RFKS', '2023-01-18', '000', 1, 10000, 'malam malam', 1, 'Biaya jasa service'),
(112, 'INV-180123-023113', 'B 1234 RFKS', '2023-01-18', '000', 1, 10000, 'malam malam', 1, 'Biaya jasa service'),
(113, 'INV-180123-023113', 'B 1234 RFKS', '2023-01-18', '5tl-423', 1, 80000, NULL, NULL, 'Stang Mio Sporty 2006'),
(114, 'INV-180123-023113', 'B 1234 RFKS', '2023-01-18', '5vv-423', 1, 800000, NULL, NULL, 'knalpot bobokan mio'),
(115, 'INV-180123-025754', 'BD 9808 K', '2023-01-19', '000', 1, 10000, '-ringan bener', 1, 'Service Ringan'),
(116, 'INV-180123-025754', 'BD 9808 K', '2023-01-19', '5tl-423', 1, 80000, NULL, NULL, 'Stang Mio Sporty 2006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `id_level_user`, `foto`) VALUES
(13, 'Fajri Ardiyan', 'admin', '62c8ad0a15d9d1ca38d5dee762a16e01', 1, 'impreza.jpg'),
(14, 'zico', 'owner', '62c8ad0a15d9d1ca38d5dee762a16e01', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`) VALUES
(1, 1, 1),
(2, 12, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1),
(7, 6, 1),
(8, 7, 1),
(9, 9, 1),
(10, 8, 1),
(11, 11, 1),
(12, 10, 1),
(13, 13, 1),
(26, 3, 2),
(29, 5, 2),
(30, 6, 2),
(31, 7, 2),
(32, 8, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_service`
-- (See below for the actual view)
--
CREATE TABLE `view_service` (
`id_service` int(10)
,`no_invoice` varchar(100)
,`no_plat` varchar(100)
,`tanggal` varchar(100)
,`kd_barang` varchar(100)
,`qty` int(10)
,`total` int(10)
,`keterangan` text
,`nama_customer` varchar(100)
,`nama_barang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
-- (See below for the actual view)
--
CREATE TABLE `view_user` (
`id_user` int(11)
,`nama_lengkap` varchar(40)
,`username` varchar(30)
,`password` varchar(40)
,`id_level_user` int(11)
,`foto` text
,`nama_level` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `view_service`
--
DROP TABLE IF EXISTS `view_service`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_service`  AS SELECT `ts`.`id_service` AS `id_service`, `ts`.`no_invoice` AS `no_invoice`, `ts`.`no_plat` AS `no_plat`, `ts`.`tanggal` AS `tanggal`, `ts`.`kd_barang` AS `kd_barang`, `ts`.`qty` AS `qty`, `ts`.`total` AS `total`, `ts`.`keterangan` AS `keterangan`, `tc`.`nama_customer` AS `nama_customer`, `tb`.`nama_barang` AS `nama_barang` FROM ((`tbl_service` `ts` join `tbl_customer` `tc` on(`tc`.`no_plat` = `ts`.`no_plat`)) join `tbl_master_barang` `tb` on(`tb`.`kd_barang` = `ts`.`kd_barang`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS SELECT `tu`.`id_user` AS `id_user`, `tu`.`nama_lengkap` AS `nama_lengkap`, `tu`.`username` AS `username`, `tu`.`password` AS `password`, `tu`.`id_level_user` AS `id_level_user`, `tu`.`foto` AS `foto`, `tlu`.`nama_level` AS `nama_level` FROM (`tbl_user` `tu` join `tbl_level_user` `tlu`) WHERE `tu`.`id_level_user` = `tlu`.`id_level_user``id_level_user`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang_in`
--
ALTER TABLE `tbl_barang_in`
  ADD PRIMARY KEY (`id_in`);

--
-- Indexes for table `tbl_barang_out`
--
ALTER TABLE `tbl_barang_out`
  ADD PRIMARY KEY (`id_out`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_gaji_mekanik`
--
ALTER TABLE `tbl_gaji_mekanik`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tbl_income`
--
ALTER TABLE `tbl_income`
  ADD PRIMARY KEY (`id_income`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_master_barang`
--
ALTER TABLE `tbl_master_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `tbl_outcome`
--
ALTER TABLE `tbl_outcome`
  ADD PRIMARY KEY (`id_outcome`);

--
-- Indexes for table `tbl_paket_service`
--
ALTER TABLE `tbl_paket_service`
  ADD PRIMARY KEY (`id_paket_service`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_barang_in`
--
ALTER TABLE `tbl_barang_in`
  MODIFY `id_in` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_barang_out`
--
ALTER TABLE `tbl_barang_out`
  MODIFY `id_out` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_gaji_mekanik`
--
ALTER TABLE `tbl_gaji_mekanik`
  MODIFY `id_gaji` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_income`
--
ALTER TABLE `tbl_income`
  MODIFY `id_income` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  MODIFY `id_mekanik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_outcome`
--
ALTER TABLE `tbl_outcome`
  MODIFY `id_outcome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_paket_service`
--
ALTER TABLE `tbl_paket_service`
  MODIFY `id_paket_service` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id_service` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
