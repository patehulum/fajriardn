-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 03:23 PM
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
(2, 'Barang', '#', 'fa fa-cubes', 0),
(4, 'Master Mekanik', 'mekanik', 'fa fa-book', 0),
(10, 'Transaksi', '#', 'fa fa-list', 0),
(14, 'Pengguna Sistem', 'user', 'fa fa-id-badge', 0),
(15, 'Menu', 'menu', 'fa fa-list', 0),
(27, 'Service Kendaraan', 'service', 'fa fa-money', 0),
(28, 'Pengeluaran', 'outcome', 'fa fa-usd', 10),
(30, 'Customer', 'cust', 'fa fa-user', 0),
(31, 'Daftar Barang', 'master_barang', 'fa fa-list', 2),
(32, 'Barang Keluar', 'master_barang/out', 'fa fa-sign-out', 2),
(33, 'Barang Masuk', 'master_barang/in', 'fa fa-truck', 2),
(34, 'Pemasukan', 'income', 'fa fa-money', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_out`
--

CREATE TABLE `tbl_barang_out` (
  `id_out` int(10) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tanggal_out` date NOT NULL,
  `invoice_out` varchar(100) NOT NULL,
  `qty_awal` int(10) NOT NULL,
  `qty_out` int(10) NOT NULL,
  `last_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_out`
--

INSERT INTO `tbl_barang_out` (`id_out`, `kd_barang`, `nama_barang`, `tanggal_out`, `invoice_out`, `qty_awal`, `qty_out`, `last_qty`) VALUES
(3, '5tl-423', 'Stang Mio Sporty 2006', '2022-12-18', 'INV-211222-021212', 5, 2, 3),
(4, '5vv-423', 'knalpot bobokan mio', '2022-12-11', 'INV-211222-021211', 5, 2, 3),
(5, '5tl-423', 'Stang Mio Sporty 2006', '2022-12-11', 'INV-211222-021211', 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(10) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `no_plat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama_customer`, `no_plat`) VALUES
(2, 'Nop Al Nab Il', 'BD 9808 K'),
(3, 'Miki Miko', 'OP 4547 PO'),
(4, 'Wakcuy', 'B 3452 TMR');

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
  `tanggal_income` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_income`
--

INSERT INTO `tbl_income` (`id_income`, `invoice_income`, `customer`, `income_amount`, `saldo_awal`, `saldo_akhir`, `tanggal_income`) VALUES
(1, 'INV-211222-021212', 'Nop Al Nab Il', 200000, 10000000, 10000000, '2022-12-18'),
(2, 'INV-211222-021211', 'Nop Al Nab Il', 1725000, 10000000, 11725000, '2022-12-11');

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
('ZicSpeed', 'Kota Bekasi', 682187654, 11725000);

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
(2, 'Walikelas'),
(3, 'Guru'),
(4, 'Keuangan'),
(5, 'Siswa'),
(6, 'Kepala Sekolah');

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
('000', 'Jasa Service', 0, 0, 0, 'IMG_3112.jpg'),
('5nw-76da', 'Vanbelt MIO Sporty BIG ', 63000, 100000, 5, 'wallpaper1.jpg'),
('5tl-423', 'Stang Mio Sporty 2006', 630099, 50000, 2, 'Untitled2.png'),
('5vv-423', 'knalpot bobokan mio', 500000, 800000, 3, 'impreza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mekanik`
--

CREATE TABLE `tbl_mekanik` (
  `id_mekanik` int(10) NOT NULL,
  `nama_mekanik` varchar(100) NOT NULL,
  `bod` varchar(100) NOT NULL,
  `telp` int(12) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mekanik`
--

INSERT INTO `tbl_mekanik` (`id_mekanik`, `nama_mekanik`, `bod`, `telp`, `alamat`, `foto`) VALUES
(1, 'Patch', 'Kerinci, 27 Okt 2000', 2147483647, 'jl. baru jadi kemarin', 'user-siluet.jpg'),
(4, 'Fajri', 'Bekasi, 23 agustus 2022', 5443435, 'jl. baru jadi kemarin juga hahaha', 'praza_22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id_service` int(10) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `no_plat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id_service`, `no_invoice`, `no_plat`, `tanggal`, `kd_barang`, `qty`, `total`, `keterangan`) VALUES
(60, 'INV-211222-021212', 'BD 9808 K', '2022-12-18', '000', 1, 100000, '- benerin otak'),
(61, 'INV-211222-021212', 'BD 9808 K', '2022-12-18', '5tl-423', 2, 100000, NULL),
(62, 'INV-211222-021211', 'BD 9808 K', '2022-12-11', '000', 1, 75000, '- oadak'),
(63, 'INV-211222-021211', 'BD 9808 K', '2022-12-11', '5vv-423', 2, 1600000, NULL),
(64, 'INV-211222-021211', 'BD 9808 K', '2022-12-11', '5tl-423', 1, 50000, NULL);

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
(5, 'Yunita Rustani', 'nita', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Untitled.png'),
(7, 'aditya pramana', 'adit', 'e10adc3949ba59abbe56e057f20f883e', 4, 'IMG_3453.JPG'),
(10, 'wnc', 'wncy', 'e10adc3949ba59abbe56e057f20f883e', 1, 'aishakids_20190623094052gl.jpg'),
(11, 'fitri wulandari', 'fitri', '8ac99bb12b7c18e27d06fd34fe1203fc', 1, ''),
(12, 'Moch Iksan. S.Pd', 'kepsek', 'e10adc3949ba59abbe56e057f20f883e', 6, 'wallpaper2.jpg'),
(13, 'Fajri Ardian', 'admin', '62c8ad0a15d9d1ca38d5dee762a16e01', 1, 'impreza.jpg');

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
(1, 16, 4),
(2, 1, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1),
(7, 7, 1),
(8, 8, 1),
(9, 11, 1),
(10, 6, 1),
(11, 14, 1),
(13, 13, 1),
(14, 12, 1),
(15, 10, 1),
(16, 9, 1),
(17, 11, 3),
(19, 17, 3),
(30, 15, 1),
(34, 18, 3),
(37, 12, 3),
(38, 12, 6),
(41, 11, 5),
(42, 19, 5),
(44, 20, 5),
(45, 21, 6),
(46, 22, 4),
(47, 23, 4),
(48, 24, 4),
(49, 25, 4),
(50, 12, 4),
(51, 26, 1),
(52, 29, 1),
(53, 30, 1),
(54, 27, 1),
(55, 34, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_service`
-- (See below for the actual view)
--
CREATE TABLE `view_service` (
`id_service` int(10)
,`no_invoice` varchar(100)
,`no_plat` varchar(100)
,`tanggal` date
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_barang_out`
--
ALTER TABLE `tbl_barang_out`
  MODIFY `id_out` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_income`
--
ALTER TABLE `tbl_income`
  MODIFY `id_income` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  MODIFY `id_mekanik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id_service` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
