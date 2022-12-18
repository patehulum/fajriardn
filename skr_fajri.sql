-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 05:28 AM
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
(1, 'Siswa', 'siswa', 'fa fa-users', 0),
(2, 'Data Guru', 'guru', 'fa fa-user-circle', 0),
(3, 'Data Master', '#', 'fa fa-bars', 0),
(4, 'Mata Pelajaran', 'mapel', 'fa fa-book', 3),
(5, 'Ruangan Kelas', 'ruangan', 'fa fa-building', 3),
(6, 'Tingkatan Kelas', 'tingkatan', 'fa fa-sitemap', 3),
(7, 'Jurusan', 'jurusan', 'fa fa-th-large', 3),
(8, 'Tahun Akademik', 'tahunakademik', 'fa fa-calendar-check-o', 3),
(9, 'Kelas', 'kelas', 'fa fa-cubes', 3),
(10, 'Kurikulum', 'kurikulum', 'fa fa-list', 3),
(11, 'Jadwal Pelajaran', 'jadwal', 'fa fa-calendar-plus-o', 0),
(12, 'Peserta Didik', 'siswa/siswa_aktif', 'fa fa-users', 0),
(13, 'Wali Kelas', 'walikelas', 'fa fa-user-plus', 0),
(14, 'Pengguna Sistem', 'user', 'fa fa-id-badge', 0),
(15, 'Menu', 'menu', 'fa fa-list', 0),
(17, 'Nilai Akhir', 'nilai', 'fa fa-archive', 0),
(18, 'Laporan Nilai', 'laporan_nilai', 'fa fa-file-pdf-o', 0),
(19, 'Lihat Rapot', 'siswa/nilai_siswa_lihat', 'fa fa-file-pdf-o', 0),
(20, 'Profile', 'siswa/loginSiswa', 'fa fa-user-circle', 0),
(21, 'Approve nilai', 'laporan_nilai/kepsek_lihat', 'fa fa-check-square-o', 0),
(22, 'Form Pembayaran', 'keuangan/form', 'fa fa-shopping-cart', 0),
(23, 'Jenis Pembayaran', 'jenis_pembayaran', 'fa fa-credit-card', 0),
(24, 'Atur Biaya', 'keuangan/setup', 'fa fa-graduation-cap', 0),
(25, 'Laporan Keuangan', 'keuangan', 'fa fa-desktop', 0),
(26, 'Master Barang', 'master_barang', 'fa fa-th-large', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `kd_agama` int(2) NOT NULL,
  `nama_agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`kd_agama`, `nama_agama`) VALUES
(1, 'ISLAM'),
(2, 'KRISTEN/ PROTESTAN'),
(3, 'KATHOLIK'),
(4, 'HINDU'),
(5, 'BUDHA'),
(6, 'KHONG HU CHU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_sekolah`
--

CREATE TABLE `tbl_biaya_sekolah` (
  `id_biaya` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biaya_sekolah`
--

INSERT INTO `tbl_biaya_sekolah` (`id_biaya`, `id_jenis_pembayaran`, `id_tahun_akademik`, `jumlah_biaya`) VALUES
(5, 1, 9, 350000),
(6, 2, 9, 75000),
(7, 3, 9, 350000),
(8, 4, 9, 350000),
(9, 5, 9, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nuptk` varchar(16) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `jenis_kelamin` enum('P','W') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_guru` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nuptk`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_guru`, `status`, `pendidikan_terakhir`, `no_telp`, `foto`, `username`, `password`) VALUES
(0, 'default', 'default', '', '', '0000-00-00', '', 'Aktif', '', '', '', '', ''),
(7, '1234567', 'Sugeng Suharto. S.Pd', 'P', 'Yogyakarta', '1979-06-04', 'Jl.Hj.Ali', 'Aktif', 'S1 Sarjana Pendidika', '089899908972', '', 'sugeng', '6c62460ad1e6a9a106a8debb80e2f07e'),
(8, '1234568', 'Salamah Laras Asih. S.Pd', 'W', 'Bogor', '1990-01-08', 'Jl. Kayu Manis', 'Aktif', 'S1 Sarjana Pendidika', '083887653567', '', 'salamah', 'e74b735a1f88e0d9715ac0a8ac2fced5'),
(9, '1234569', 'Sabinus Suroso S.Pd', 'P', 'Depok', '1982-11-18', 'Jl. Kayu Manis', 'Aktif', 'S1 Sarjana Pendidika', '089983764536', '', 'sabinus', 'e5dd89d769470fd7a048921346137632'),
(10, '1234561', 'Tika  Armalasari. S.Pd', 'W', 'Jakarta', '1992-05-20', 'Jl. GG.Waru', 'Aktif', 'S1 Sarjana Pendidika', '082188286738', '', 'tika', '7a9c9826cf4184fa8baa132c0bf57c81'),
(11, '1234562', 'Septian Permana. ST', 'P', 'Jakarta', '1980-01-20', 'Jl. Lapangan', 'Aktif', 'S1 Sarjana Teknik', '082173672887', '', 'septian', 'd38d3f123722eac81b5620768cf7226e'),
(12, '1234563', 'Syarifah.  S.Pd', 'W', 'Jakarta', '1987-10-21', 'Komplek indah ', 'Aktif', 'S1 Sarjana Pendidika', '082278948373', '', 'syarifah', '827f1200ab3ce37eb793b6c2f6fc945b'),
(13, '1234564', 'Fadilah Hanum. S.Pd', 'P', 'Jakarta', '1995-06-20', 'Jl. Tabri', 'Aktif', 'S1 Sarjana Pendidika', '082178747773', '', 'fadilah', '952b18933245725ffcdca629e2967caa'),
(14, '1234565', 'Febri Ulfanisa. S.Pd', 'W', 'Jakarta', '1986-09-21', 'GG. Batu Alam 2', 'Aktif', 'S1 Sarjana Pendidika', '083836475778', '', 'febri', '296aadbf4ebe1379615e81800dab7777'),
(15, '1234566', 'Yuri Pratiwi. S.Pd', 'W', 'Bandung', '1991-01-31', 'Jl. Batu Tulis II', 'Aktif', 'S1 Sarjana Pendidika', '08982767282', '', 'yuri', '0517dd1e00b72285d3b203221fbdbc49'),
(16, '1234571', 'Resha Chettira. S.Pd', 'W', 'Depok', '1983-01-01', 'Jl. Inerbang Raya', 'Aktif', 'S1 Sarjana Pendidika', '087623325676', '', 'resha', '4f3d898eb8f2842183e02f285121b6a6'),
(17, '1234572', 'Siti Mufrodah. S.Pd', 'W', 'Kerinci', '1987-01-16', 'Jl. SDI', 'Aktif', 'S1 Sarjana Pendidika', '083876667380', '', 'siti', '5c2e4a2563f9f4427955422fe1402762'),
(18, '1234573', 'Zaini Djamaludin. MM', 'P', 'Malang', '1978-07-12', 'Jl. Mangga', 'Aktif', 'S2 Magister Manajeme', '082113890298', '', 'zaini', '9db5c8a58af3463fc60fc71d9033081f'),
(19, '1234574', 'Achmad Sutisna. MM', 'P', 'Jakarta', '1984-11-13', 'Jl. Condet Baru', 'Aktif', 'S2 Magister Manajeme', '087898999287', '', 'achmad', '6699b106c472bf44f11e5da46c1eac93'),
(20, '1234575', 'Sri Mulyani. S.Pd', 'W', 'Bogor', '1999-12-07', 'GG. Ceremai', 'Aktif', 'S1 Sarjana Pendidika', '087789088376', '', 'sri', '296c2075a196aef15e372a68ae77477b'),
(21, '1234576', 'Yusmanelly. S.Pd', 'P', 'Jakarta', '1985-10-20', 'JL. Teratai', 'Aktif', 'S1 Sarjana Pendidika', '08989877789', '', 'yusmanelly', '7297ad400dbc93eeebc387ebd729bf81'),
(22, '1234577', 'Nani Suryani. S.Pd', 'W', 'Jakarta', '1975-01-28', 'Jl . Teratai II', 'Aktif', 'S1 Sarjana Pendidika', '082178974635', '', 'nani', 'f09276379be92b588d79aaf8e6208861'),
(23, '1234577', 'Siti Nurkadari. S.Sos', 'W', 'Jakarta', '1980-11-17', 'GG. Alyas', 'Aktif', 'S1 Sarjana Sosiologi', '08998986876', '', 'siti', '160b22c3e0a38ded327d416885e1f88d'),
(24, '1234578', 'Burhanudin. S.Pd', 'P', 'Semarang', '1970-09-13', 'Jl. Palijia', 'Aktif', 'S1 Sarjana Pendidika', '0218015033', '', 'burhanudin', 'd312bddce349830b3671e3ea8e9bf141'),
(25, '1234579', 'Verawati Ernana, S.Pd', 'W', 'Jakarta', '1983-05-09', 'Jl. H.Baing', 'Aktif', 'S1 Sarjana Pendidika', '083876556788', '', 'verawati', '7ea9401301669e20d556826cb4287aaa'),
(26, '1234559', 'Sargiman Santoso.MM', 'P', 'Jakarta', '1978-05-24', 'Jl. Tanjung Barat', 'Aktif', 'S2 Magister Manajeme', '082134567875', '', 'sargiman', '08d121a36b481ad4d76c3ce9540a4018'),
(27, '1234558', 'Ratih Puji Astuti. S.Pd', 'W', 'Depok', '1988-12-07', 'Jl. Dermaga ', 'Aktif', 'S1 Sarjana Pendidika', '087867387365', '', 'ratih', 'e2c7a418f28ca1c0a209ff7672c85c3f'),
(28, '1234557', 'Kartini. S.Pd', 'W', 'Jakarta', '1967-08-11', 'Jl. Permata III', 'Aktif', 'S1 Sarjana Pendidika', '082178376352', '', 'kartini', 'edeedd7bd1b6c44c70d19e938a0a2d85'),
(29, '1234556', 'Moch Iksan. S.Pd', 'P', 'Surabaya', '1972-10-17', 'Jl. Lapangan II', 'Aktif', 'S1 Sarjana Pendidika', '083890734776', '', 'moch', '582e341f076050494528d9979d73e03e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `kd_ruangan` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_tahun_akademik`, `semester`, `kd_jurusan`, `kd_tingkatan`, `kd_kelas`, `kd_mapel`, `id_guru`, `jam`, `kd_ruangan`, `hari`) VALUES
(1, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'AGM', 7, '06.30 - 07.15', 'R.IPAX1', 'Senin'),
(2, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'AGM', 0, '06.30 - 07.15', 'R.IPAX2', 'Selasa'),
(3, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'B.ING', 7, '06.30 - 07.15', 'R.IPAX1', 'Selasa'),
(4, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'B.ING', 0, '', '000', ''),
(5, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'BIO', 0, '08.00 - 08.45', 'R.IPAX1', 'Selasa'),
(6, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'BIO', 0, '', '000', ''),
(7, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'BK', 0, '08.45 - 09.30', 'R.IPAX1', 'Kamis'),
(8, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'BK', 0, '', '000', ''),
(9, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'FIS', 0, '06.30 - 07.15', 'R.IPAX1', 'Kamis'),
(10, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'FIS', 0, '08.00 - 08.45', 'R.IPAX2', 'Jumat'),
(11, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'KMI', 0, '09.45 - 10.30', 'R.IPAX1', 'Jumat'),
(12, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'KMI', 0, '', '000', ''),
(13, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'MTK', 0, '08.45 - 09.30', 'R.IPAX1', 'Selasa'),
(14, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'MTK', 0, '', '000', ''),
(15, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'PJOK', 0, '07.15 - 08.00', 'R.IPAX1', 'Senin'),
(16, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'PJOK', 0, '', '000', ''),
(17, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'PPKN', 0, '13.15 - 14.00', 'R.IPAX1', 'Selasa'),
(18, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'PPKN', 0, '', '000', ''),
(19, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'SB', 0, '12.30 - 13.15', 'R.IPAX1', 'Rabu'),
(20, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'SB', 0, '', '000', ''),
(21, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'TIK', 0, '12.30 - 13.15', 'R.IPAX1', 'Selasa'),
(22, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'TIK', 0, '', '000', ''),
(23, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'B.IND', 0, '13.15 - 14.00', 'R.IPAX1', 'Senin'),
(24, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'B.IND', 0, '', '000', ''),
(25, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'AGM', 0, '', '000', ''),
(26, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'AGM', 0, '', '000', ''),
(27, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'B.IND', 0, '', '000', ''),
(28, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'B.IND', 0, '', '000', ''),
(29, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'B.ING', 0, '', '000', ''),
(30, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'B.ING', 0, '', '000', ''),
(31, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'B.JEP', 0, '', '000', ''),
(32, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'B.JEP', 0, '', '000', ''),
(33, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'BIO', 0, '', '000', ''),
(34, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'BIO', 0, '', '000', ''),
(35, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'FIS', 0, '', '000', ''),
(36, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'FIS', 0, '', '000', ''),
(37, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'KMI', 0, '', '000', ''),
(38, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'KMI', 0, '', '000', ''),
(39, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'MTK', 0, '', '000', ''),
(40, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'MTK', 0, '', '000', ''),
(41, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'PJOK', 0, '', '000', ''),
(42, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'PJOK', 0, '', '000', ''),
(43, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'PPKN', 0, '', '000', ''),
(44, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'PPKN', 0, '', '000', ''),
(45, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'SB', 0, '', '000', ''),
(46, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'SB', 0, '', '000', ''),
(47, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'TIK', 0, '', '000', ''),
(48, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'TIK', 0, '', '000', ''),
(49, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'EKM', 0, '06.30 - 07.15', 'R.IPAX1', 'Jumat'),
(50, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'EKM', 0, '', '000', ''),
(51, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'AGM', 0, '', '000', ''),
(52, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'AGM', 0, '', '000', ''),
(53, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'SB', 0, '', '000', ''),
(54, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'SB', 0, '', '000', ''),
(55, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'B.IND', 0, '', '000', ''),
(56, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'B.IND', 0, '', '000', ''),
(57, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'PPKN', 0, '', '000', ''),
(58, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'PPKN', 0, '', '000', ''),
(59, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'B.ING', 0, '', '000', ''),
(60, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'B.ING', 0, '', '000', ''),
(61, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'PJOK', 0, '', '000', ''),
(62, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'PJOK', 0, '', '000', ''),
(63, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'TIK', 0, '', '000', ''),
(64, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'TIK', 0, '', '000', ''),
(65, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'GEO', 0, '', '000', ''),
(66, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'GEO', 0, '', '000', ''),
(67, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'SOSIO', 0, '', '000', ''),
(68, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'SOSIO', 0, '', '000', ''),
(69, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'MTK', 0, '', '000', ''),
(70, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'MTK', 0, '', '000', ''),
(71, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'BK', 0, '', '000', ''),
(72, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'BK', 0, '', '000', ''),
(73, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'EKM', 0, '', '000', ''),
(74, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'EKM', 0, '', '000', ''),
(75, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'B.JEP', 0, '', '000', ''),
(76, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'B.JEP', 0, '', '000', ''),
(77, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'PPKN', 0, '', '000', ''),
(78, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'SB', 0, '', '000', ''),
(79, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'MTK', 0, '', '000', ''),
(80, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'SJR', 0, '', '000', ''),
(81, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'AGM', 0, '', '000', ''),
(82, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'SEJIN', 0, '', '000', ''),
(83, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'SEJIN', 0, '', '000', ''),
(84, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'SEJIN', 0, '', '000', ''),
(85, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'SEJIN', 0, '', '000', ''),
(86, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'SEJIN', 0, '', '000', ''),
(87, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'SEJIN', 0, '', '000', ''),
(88, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'SEJIN', 0, '', '000', ''),
(89, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'SEJIN', 0, '', '000', ''),
(90, 9, 'ganjil', 'IPA', '001', 'IPAX1', 'SIND', 0, '10.30 - 11.15', 'R.IPAX1', 'Rabu'),
(91, 9, 'ganjil', 'IPA', '001', 'IPAX2', 'SIND', 0, '', '000', ''),
(92, 9, 'ganjil', 'IPS', '001', 'IPSX1', 'SIND', 0, '', '000', ''),
(93, 9, 'ganjil', 'IPS', '001', 'IPSX2', 'SIND', 0, '', '000', ''),
(94, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'SIND', 0, '', '000', ''),
(95, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'SIND', 0, '', '000', ''),
(96, 9, 'ganjil', 'IPA', '002', 'IPAXI1', 'BK', 0, '', '000', ''),
(97, 9, 'ganjil', 'IPA', '002', 'IPAXI2', 'BK', 0, '', '000', ''),
(98, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'SIND', 0, '', '000', ''),
(99, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'TIK', 0, '', '000', ''),
(100, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'SOSIO', 0, '', '000', ''),
(101, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'GEO', 0, '', '000', ''),
(102, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'EKM', 0, '', '000', ''),
(103, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'B.JEP', 0, '', '000', ''),
(104, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'BK', 0, '', '000', ''),
(105, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'SJR', 0, '', '000', ''),
(106, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'B.IND', 0, '', '000', ''),
(107, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'PJOK', 0, '', '000', ''),
(108, 9, 'ganjil', 'IPS', '002', 'IPSXI', 'B.ING', 0, '', '000', ''),
(109, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'AGM', 0, '', '000', ''),
(110, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'FIS', 0, '', '000', ''),
(111, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'PJOK', 0, '', '000', ''),
(112, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'BIO', 0, '', '000', ''),
(113, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'B.IND', 0, '', '000', ''),
(114, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'PPKN', 0, '', '000', ''),
(115, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'SOSIO', 0, '', '000', ''),
(116, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'KMI', 0, '', '000', ''),
(117, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'SB', 0, '', '000', ''),
(118, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'SIND', 0, '', '000', ''),
(119, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'B.IND', 0, '', '000', ''),
(120, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'B.ING', 0, '', '000', ''),
(121, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'B.ING', 0, '', '000', ''),
(122, 9, 'ganjil', 'IPA', '003', 'IPAXII', 'MTK', 0, '', '000', ''),
(123, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'SOSIO', 0, '', '000', ''),
(124, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'SB', 0, '', '000', ''),
(125, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'GEO', 0, '', '000', ''),
(126, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'PPKN', 0, '', '000', ''),
(127, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'EKM', 0, '', '000', ''),
(128, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'SIND', 0, '', '000', ''),
(129, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'SJR', 0, '', '000', ''),
(130, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'PJOK', 0, '', '000', ''),
(131, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'MTK', 0, '', '000', ''),
(132, 9, 'ganjil', 'IPS', '003', 'IPSXII', 'AGM', 0, '', '000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pembayaran`
--

CREATE TABLE `tbl_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `nama_jenis_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_pembayaran`
--

INSERT INTO `tbl_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`) VALUES
(1, 'SPP SEMESTER '),
(2, 'DANA SUMBANGAN POKOK'),
(3, 'SPP SEMESTER 2'),
(4, 'SPP SEMESTER 3'),
(5, 'SPP SEMESTER 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `kd_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`kd_jurusan`, `nama_jurusan`) VALUES
('IPA', 'Ilmu Pengetahuan Alam'),
('IPS', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kd_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kd_kelas`, `nama_kelas`, `kd_tingkatan`, `kd_jurusan`) VALUES
('IPAX1', 'X IPA 1', '001', 'IPA'),
('IPAX2', 'X IPA 2', '001', 'IPA'),
('IPAXI1', 'XI IPA 1', '002', 'IPA'),
('IPAXI2', 'XI IPA 2', '002', 'IPA'),
('IPAXII', 'XII IPA ', '003', 'IPA'),
('IPSX1', 'X IPS 1', '001', 'IPS'),
('IPSX2', 'X IPS 2', '001', 'IPS'),
('IPSXI', 'XI IPS ', '002', 'IPS'),
('IPSXII', 'XII IPS', '003', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`id_kurikulum`, `nama_kurikulum`, `is_aktif`) VALUES
(4, 'Kurikulum 2013 (KTSP)', 'Y'),
(5, 'Kurikulum 2006 (KTSP)', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum_detail`
--

CREATE TABLE `tbl_kurikulum_detail` (
  `id_kurikulum_detail` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum_detail`
--

INSERT INTO `tbl_kurikulum_detail` (`id_kurikulum_detail`, `id_kurikulum`, `kd_mapel`, `kd_jurusan`, `kd_tingkatan`) VALUES
(1, 1, 'BIO1', 'IPA', '001'),
(2, 1, 'MTK1', 'IPA', '001'),
(3, 1, 'PAI1', 'IPA', '001'),
(4, 1, 'BIO 1', 'IPA', '001'),
(5, 1, 'MTK1', 'IPA', '001'),
(6, 1, 'MTK1', 'IPS', '001'),
(7, 1, 'MTK1', 'IPS', '002'),
(8, 4, 'AGM', 'IPA', '001'),
(9, 4, 'B.ING', 'IPA', '001'),
(11, 4, 'BIO', 'IPA', '001'),
(12, 4, 'BK', 'IPA', '001'),
(13, 4, 'FIS', 'IPA', '001'),
(14, 4, 'KMI', 'IPA', '001'),
(15, 4, 'MTK', 'IPA', '001'),
(16, 4, 'PJOK', 'IPA', '001'),
(17, 4, 'PPKN', 'IPA', '001'),
(18, 4, 'SB', 'IPA', '001'),
(19, 4, 'TIK', 'IPA', '001'),
(20, 4, 'B.IND', 'IPA', '001'),
(22, 4, 'AGM', 'IPA', '002'),
(23, 4, 'B.IND', 'IPA', '002'),
(24, 4, 'B.ING', 'IPA', '002'),
(25, 4, 'B.JEP', 'IPA', '002'),
(26, 4, 'BIO', 'IPA', '002'),
(28, 4, 'FIS', 'IPA', '002'),
(29, 4, 'KMI', 'IPA', '002'),
(30, 4, 'MTK', 'IPA', '002'),
(31, 4, 'PJOK', 'IPA', '002'),
(32, 4, 'PPKN', 'IPA', '002'),
(33, 4, 'SB', 'IPA', '002'),
(34, 4, 'TIK', 'IPA', '002'),
(36, 4, 'EKM', 'IPA', '001'),
(38, 4, 'AGM', 'IPS', '001'),
(39, 4, 'SB', 'IPS', '001'),
(40, 4, 'B.IND', 'IPS', '001'),
(41, 4, 'PPKN', 'IPS', '001'),
(42, 4, 'B.ING', 'IPS', '001'),
(43, 4, 'PJOK', 'IPS', '001'),
(44, 4, 'TIK', 'IPS', '001'),
(45, 4, 'GEO', 'IPS', '001'),
(47, 4, 'SOSIO', 'IPS', '001'),
(48, 4, 'MTK', 'IPS', '001'),
(49, 4, 'BK', 'IPS', '001'),
(50, 4, 'EKM', 'IPS', '001'),
(51, 4, 'B.JEP', 'IPS', '001'),
(52, 4, 'PPKN', 'IPS', '002'),
(53, 4, 'SB', 'IPS', '002'),
(54, 4, 'MTK', 'IPS', '002'),
(55, 4, 'SJR', 'IPS', '002'),
(56, 4, 'AGM', 'IPS', '002'),
(57, 4, 'SEJIN', 'IPA', '001'),
(58, 4, 'SEJIN', 'IPA', '001'),
(59, 4, 'SEJIN', 'IPA', '001'),
(60, 4, 'SEJIN', 'IPS', '001'),
(61, 4, 'SIND', 'IPA', '001'),
(62, 4, 'SIND', 'IPS', '001'),
(63, 4, 'SIND', 'IPA', '002'),
(64, 4, 'BK', 'IPA', '002'),
(65, 4, 'SIND', 'IPS', '002'),
(66, 4, 'TIK', 'IPS', '002'),
(67, 4, 'SOSIO', 'IPS', '002'),
(68, 4, 'GEO', 'IPS', '002'),
(69, 4, 'EKM', 'IPS', '002'),
(70, 4, 'B.JEP', 'IPS', '002'),
(71, 4, 'BK', 'IPS', '002'),
(72, 4, 'SJR', 'IPS', '002'),
(73, 4, 'B.IND', 'IPS', '002'),
(74, 4, 'PJOK', 'IPS', '002'),
(75, 4, 'B.ING', 'IPS', '002'),
(76, 4, 'AGM', 'IPA', '003'),
(77, 4, 'FIS', 'IPA', '003'),
(78, 4, 'PJOK', 'IPA', '003'),
(79, 4, 'BIO', 'IPA', '003'),
(80, 4, 'B.IND', 'IPA', '003'),
(81, 4, 'PPKN', 'IPA', '003'),
(82, 4, 'SOSIO', 'IPA', '003'),
(83, 4, 'KMI', 'IPA', '003'),
(84, 4, 'SB', 'IPA', '003'),
(85, 4, 'SIND', 'IPA', '003'),
(86, 4, 'B.IND', 'IPS', '003'),
(87, 4, 'B.ING', 'IPS', '003'),
(88, 4, 'B.ING', 'IPA', '003'),
(89, 4, 'MTK', 'IPA', '003'),
(91, 4, 'SOSIO', 'IPS', '003'),
(92, 4, 'SB', 'IPS', '003'),
(93, 4, 'GEO', 'IPS', '003'),
(94, 4, 'PPKN', 'IPS', '003'),
(95, 4, 'EKM', 'IPS', '003'),
(96, 4, 'SIND', 'IPS', '003'),
(97, 4, 'SJR', 'IPS', '003'),
(98, 4, 'PJOK', 'IPS', '003'),
(99, 4, 'MTK', 'IPS', '003'),
(100, 4, 'AGM', 'IPS', '003');

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
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `kd_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kd_mapel`, `nama_mapel`) VALUES
('AGM', 'Agama'),
('B.IND', 'Bahasa Indonesia'),
('B.ING', 'Bahasa Inggris'),
('B.JEP', 'Bahasa Jepang'),
('BIO', 'Biologi'),
('BK', 'Bimbingan Korseling'),
('EKM', 'Ekonomi'),
('FIS', 'Fisika'),
('GEO', 'Geografi'),
('KMI', 'Kimia'),
('MTK', 'Matematika'),
('PJOK', 'Penjasorkes'),
('PPKN', 'Pendidikan Kewarganegaraan'),
('SB', 'Seni Budaya'),
('SIND', 'Sejarah Indonesia'),
('SJR', 'Sejarah'),
('SOSIO', 'Sosiologi'),
('TIK', 'Teknologi Informasi Komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nilai_tugas` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nilai` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_jadwal`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nis`, `nilai`, `status`) VALUES
(1, 9, 88, 98, 94, '24216', 93.4, 'approve'),
(2, 9, 80, 85, 87, '24467', 84.3, '-'),
(3, 9, 76, 92, 82, '24364', 83.2, '-'),
(4, 9, 90, 82, 75, '24222', 81.6, 'approve'),
(5, 9, 88, 95, 85, '24398', 88.9, '-'),
(6, 9, 86, 93, 84, '24259', 87.3, 'approve'),
(7, 3, 0, 0, 0, '24467', 38, '-'),
(8, 3, 0, 0, 0, '24216', 38, 'approve'),
(9, 3, 0, 0, 0, '24364', 38, '-'),
(10, 3, 0, 0, 0, '24222', 38, 'approve'),
(11, 3, 0, 0, 0, '24398', 38, '-'),
(12, 3, 0, 0, 0, '24259', 38, 'approve'),
(13, 1, 0, 0, 0, '24467', 38, '-'),
(14, 1, 0, 0, 0, '24216', 38, 'approve'),
(15, 1, 0, 0, 0, '24364', 38, '-'),
(16, 1, 0, 0, 0, '24222', 38, 'approve'),
(17, 1, 0, 0, 0, '24398', 38, '-'),
(18, 1, 0, 0, 0, '24259', 38, 'approve'),
(19, 2, 0, 0, 0, '24142', 38, 'approve'),
(20, 2, 0, 0, 0, '24256', 38, '-'),
(21, 2, 0, 0, 0, '24295', 38, '-'),
(22, 2, 0, 0, 0, '24296', 38, '-'),
(23, 2, 0, 0, 0, '24472', 38, '-'),
(24, 0, 0, 0, 0, '', 38, '-'),
(25, 0, 0, 0, 0, '', 38, '-'),
(26, 0, 0, 0, 0, '', 38, '-'),
(27, 0, 0, 0, 0, '', 38, '-'),
(28, 0, 0, 0, 0, '', 38, '-'),
(29, 0, 0, 0, 0, '', 38, '-'),
(30, 0, 0, 0, 0, '', 38, '-'),
(31, 0, 0, 0, 0, '', 38, '-'),
(32, 0, 0, 0, 0, '', 38, '-'),
(33, 0, 0, 0, 0, '', 38, '-'),
(34, 0, 0, 0, 0, '', 38, '-'),
(35, 0, 0, 0, 0, '', 38, '-'),
(36, 0, 0, 0, 0, '', 38, '-'),
(37, 0, 0, 0, 0, '', 38, '-'),
(38, 0, 0, 0, 0, '', 38, '-'),
(39, 0, 0, 0, 0, '', 38, '-'),
(40, 0, 0, 0, 0, '', 38, '-'),
(43, 10, 98, 88, 90, '24256', 91.8, ''),
(44, 10, 90, 86, 88, '24142', 88, 'approve'),
(45, 10, 76, 80, 82, '24296', 79.6, ''),
(46, 10, 98, 90, 100, '24472', 96.4, ''),
(47, 10, 99, 98, 85, '24295', 93.1, ''),
(48, 15, 80, 90, 100, '24467', 91, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nis` varchar(13) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `tanggal`, `nis`, `id_jenis_pembayaran`, `jumlah`, `keterangan`) VALUES
(1, '2017-03-02', 'ti102132', 1, 100000, 'tidak ada'),
(2, '2017-03-02', 'ti102132', 1, 100000, 'tidak ada'),
(3, '2020-08-06', '24216', 1, 100000, 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_kelas`
--

CREATE TABLE `tbl_riwayat_kelas` (
  `id_riwayat` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat_kelas`
--

INSERT INTO `tbl_riwayat_kelas` (`id_riwayat`, `kd_kelas`, `nis`, `id_tahun_akademik`) VALUES
(22, 'IPAX1', '24467', 9),
(23, 'IPAX1', '24216', 9),
(24, 'IPAX1', '24364', 9),
(25, 'IPAX1', '24222', 9),
(26, 'IPAX1', '24398', 9),
(27, 'IPAX2', '24256', 9),
(28, 'IPAX2', '24295', 9),
(29, 'IPAX2', '24142', 9),
(30, 'IPAX2', '24296', 9),
(31, 'IPAX2', '24472', 9),
(32, 'IPSX1', '24383', 9),
(33, 'IPSX1', '24240', 9),
(34, 'IPSX1', '24241', 9),
(35, 'IPSX1', '24283', 9),
(36, 'IPSX1', '24554', 9),
(37, 'IPSX2', '24244', 9),
(38, 'IPSX2', '24426', 9),
(39, 'IPSX2', '24316', 9),
(40, 'IPSX2', '24391', 9),
(41, 'IPSX2', '24392', 9),
(42, 'IPAXI', '24371', 9),
(43, 'IPAXI', '24264', 9),
(44, 'IPAXI', '24406', 9),
(45, 'IPAXI', '24475', 9),
(46, 'IPAXI', '24269', 9),
(47, 'IPAXI', '24479', 9),
(48, 'IPAXI', '24274', 9),
(49, 'IPAXI', '24546', 9),
(50, 'IPAXI', '24277', 9),
(51, 'IPAXI', '24233', 9),
(52, 'IPSXI', '24292', 9),
(53, 'IPSXI', '24366', 9),
(54, 'IPSXI', '24367', 9),
(55, 'IPSXI', '24258', 9),
(56, 'IPAX1', '24259', 9),
(57, 'IPAXI', '24411', 9),
(58, 'IPAXI', '24551', 9),
(59, 'IPAXI', '24235', 9),
(60, 'IPAXI', '24310', 9),
(61, 'IPAXI', '24239', 9),
(62, 'IPSXI', '24260', 9),
(63, 'IPSXI', '24262', 9),
(64, 'IPSXI', '24297', 9),
(65, 'IPSXI', '24226', 9),
(66, 'IPSXI', '24265', 9),
(67, 'IPAX1', '24557', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `kapasitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kd_ruangan`, `nama_ruangan`, `kapasitas`) VALUES
('000', 'Default', 'default'),
('R.IPAX1', 'X IPA 1', '35'),
('R.IPAX2', 'X IPA 2', '35'),
('R.IPAXI1', 'XI IPA 1', '35'),
('R.IPAXI2', 'XI IPA 2', '35'),
('R.IPAXII', 'XII IPA ', '35'),
('R.IPSX1', 'X IPS 1', '35'),
('R.IPSX2', 'X IPS 2', '35'),
('R.IPSXI', 'XI IPS ', '35'),
('R.IPSXII', 'XII IPS', '35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `nama_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(15) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `no_telp_ortu` varchar(15) NOT NULL,
  `no_telp_siswa` varchar(15) NOT NULL,
  `no_ijazah` varchar(20) NOT NULL,
  `sekolah_asal` varchar(20) NOT NULL,
  `kd_agama` int(2) NOT NULL,
  `foto` text NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `status_siswa` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama`, `jenis_kelamin`, `alamat_siswa`, `tanggal_lahir`, `tempat_lahir`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `no_telp_ortu`, `no_telp_siswa`, `no_ijazah`, `sekolah_asal`, `kd_agama`, `foto`, `kd_kelas`, `status_siswa`, `username`, `password`) VALUES
(24142, 'CHESYA BINTANG CAROLINE', 'Perempuan', '', '2005-06-07', 'Jakarta', '', '', '', '', '', '', '', 3, 'wallpaper1.jpg', 'IPAX2', 'Aktif', 'chesya', 'cd93c90654c7f9e70f021b9a7ccfe5b0'),
(24216, 'ADJI PANGESTU WICAKSONO', 'Laki-laki', '', '2005-03-17', 'Malang', '', '', '', '', '', '', '', 1, 'sequencemapel.jpg', 'IPAX1', 'Aktif', 'adji', '688489f506b5b54194d46c15811404d7'),
(24222, 'ARIO JAMESBOND ACHMADSYAH', 'Laki-laki', '', '2004-11-30', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAX1', 'Aktif', 'ario', '3f74ca9659b88266cc6da00c44a3e658'),
(24226, 'DWI JULIA AZIZAH', 'Perempuan', '', '2003-10-14', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSXII', 'Aktif', 'dwijulia', '423c74bbe61b7495a6c5'),
(24233, 'MITHA PERMATASARI', 'Perempuan', '', '2004-06-23', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAXI2', 'Aktif', 'mitha', '281009f184e5d7a5a258'),
(24235, 'MUHAMMAD RAHMANDITO SUSILO', 'Laki-laki', '', '2003-02-12', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAXII', 'Aktif', 'm.rahmandito', 'd41d8cd98f00b204e980'),
(24239, 'NADIA DEYA EVANIA', 'Perempuan', '', '2003-10-06', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAXII', 'Aktif', 'nadia', 'a2a31b1ef6d3baa26edc'),
(24240, 'NADYA DINDA SAFIRA', 'Perempuan', '', '2005-02-02', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSX1', 'Aktif', 'nadya', '19985789e3c29fdaa889'),
(24241, 'NAUFAL IRSALY ZIKRI', 'Laki-laki', '', '2005-08-17', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSX1', 'Aktif', 'naufal', '5b02e4de337eab8ef40d'),
(24244, 'RAHMADIANTO ZAKI NUGROHO', 'Perempuan', '', '2005-04-22', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSX2', 'Aktif', 'rahmadianto', 'b321972674648c7b4fbc'),
(24256, 'ARIS RADHITAMA ARIASATYA', 'Laki-laki', '', '2005-09-24', 'Depok', '', '', '', '', '', '', '', 1, '', 'IPAX2', 'Aktif', 'aris', '9d76270605f44f5c2063'),
(24258, 'CLARISSA AGATHA DEBORA', 'Perempuan', '', '2005-04-12', 'Jakarta', '', '', '', '', '', '', '', 3, '', 'IPSXI', 'Aktif', 'clarissa', '20ef998154988cde40a1'),
(24259, 'DAFFA HIJRIANSYAH PUTRA', 'Laki-laki', '', '2005-06-02', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAX1', 'Aktif', 'daffa', 'e53e9b778f03b2af5ade'),
(24260, 'DEANDRA ADELLIA SHAVIRA', 'Perempuan', '', '2005-11-10', 'Jambi', '', '', '', '', '', '', '', 1, '', 'IPSXII', 'Aktif', 'deandra', '00f8a9be16e1050155fc'),
(24262, 'DHIYA SYAKARA', 'Perempuan', '', '2006-05-10', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSXII', 'Aktif', 'dhiya', 'b18b591cd38a0a4ab72a'),
(24264, 'ERINA NURSYAFITRI', 'Perempuan', '', '2005-11-02', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAXI1', 'Aktif', 'erina', '9a4607368f35a511f9ab'),
(24265, 'ERLANGGA PRADIPTA', 'Laki-laki', '', '2005-03-06', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSXII', 'Aktif', 'erlangga', '47b188a8aeba11716bbe'),
(24269, 'GLYCERIA ERICHA PUTRA AJIMA', 'Laki-laki', '', '2005-03-17', 'Tanggerang', '', '', '', '', '', '', '', 1, '', 'IPAXI1', 'Aktif', 'glyceria', '4f7c84422311c2e61f57'),
(24274, 'JIYI MALIKAH ADILAH PUTRA', 'Laki-laki', '', '2005-07-02', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAXI2', 'Aktif', 'jiya', '85534ebb03260fe1e587'),
(24277, 'KARINA CAHYAMENTARI', 'Perempuan', '', '2005-08-12', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAXI2', 'Aktif', 'karina', 'be25eceb0fcaa5d51dd4'),
(24283, 'RAESHAD PARANDANGI', 'Laki-laki', '', '2005-12-30', 'Bogor', '', '', '', '', '', '', '', 1, '', 'IPSX1', 'Aktif', 'raeshad', 'b2bdb6f068ec6580df54'),
(24292, 'ANANDA SATYA PRAWIRA', 'Laki-laki', '', '2005-10-19', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSXI', 'Aktif', 'ananda', 'be634c0afc765538587d'),
(24295, 'CATHERINE SHARON RIRIS SILABAN', 'Laki-laki', '', '2004-12-30', 'Bandung', '', '', '', '', '', '', '', 1, '', 'IPAX2', 'Aktif', 'catherine', 'ed8af10be87dd9633dd5'),
(24296, 'CINDY NATASHA LALITA', 'Perempuan', '', '2005-04-13', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPAX2', 'Aktif', 'cindy_n', '3f2cdac1ccef81830821'),
(24297, 'DIMAS ARIF NUGROHO', 'Perempuan', '', '2004-11-10', 'Jakarta', '', '', '', '', '', '', '', 1, '', 'IPSXII', 'Aktif', 'dimas', '5dee38be1a7164b147c0'),
(24310, 'MURFID AUFA RACHMAN', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXII', 'Aktif', 'murfid', '176d4523d1c3d1b8b5e2'),
(24316, 'SHAFIA FAHIRA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSX2', 'Aktif', 'shafia', '4436a6bfcb67cee84309'),
(24364, 'ANISSYA EKA HENDARYATI', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAX1', 'Aktif', 'anissya', '4f1d40fb2a02b1e78b341d5f2cc4ea38'),
(24366, 'BENAYYA KARINA HARNIS', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSXI', 'Aktif', 'benayya', '81696f09d6dcaac43078'),
(24367, 'CALLISTA SITANGGANG', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSXI', 'Aktif', 'callista', 'b34406ac42246f5108a0'),
(24371, 'EKIDA REHAN FIRMANSYAH', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXI1', 'Aktif', 'ekida', 'fb1acb82a794c9da7229'),
(24383, 'NADILA FILZA RAHMALINA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSX1', 'Aktif', 'nadila', '128e8860871e2dfd715e'),
(24391, 'TUBAGUS YASSER MUHAMMAD', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSX2', 'Aktif', 'tubagus', 'd05b3a80249c8e14027f'),
(24392, 'VANYA PERMATA AZZURA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSX2', 'Aktif', 'vanya', 'bce0a79b7831d400591f'),
(24398, 'ARIQ GUSTAMA PASYA', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAX1', 'Aktif', 'ariq', '77ad8013cb5aa50fc8f4b85043798dad'),
(24406, 'FAISAL RAHMAT NURYANTO', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXI1', 'Aktif', 'faisal', 'b67aaaf5e991b8aa6cdc'),
(24411, 'MUHAMMAD ATTARIQ ADITYA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXII', 'Aktif', 'm.attariq', 'af6a1694f68388226408'),
(24426, 'SANIA CHAIRUNNISA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSX2', 'Aktif', 'sania', '00998bb35f496c886237'),
(24467, 'ABDUL ALIK SULAIMAN SAID', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAX1', 'Aktif', 'abdul', '428a78b4fee47253898d7918c0a09160'),
(24472, 'CINDY THALIA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAX2', 'Aktif', 'cindy_t', '1997eafd242d2f408199'),
(24475, 'FAIZAL ABIZAR', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXI1', 'Aktif', 'faizal', '3adbf84fcc3478d48d60'),
(24479, 'HANAFA HASNATA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXI2', 'Aktif', 'hanafa', 'c89783319b912243eae4'),
(24546, 'JOHANNES FELIX RIMBUN', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXI2', 'Aktif', 'johannes', '2f6df87f74a9f33373c0'),
(24551, 'MUHAMMAD INDRA NUR PRATAMA', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPAXII', 'Aktif', 'm.indra', '7ce98933bb56b1e4dd56'),
(24554, 'RAHADIAN ALDI NUGROHO', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, '', 'IPSX1', 'Aktif', 'rahadian', 'de36880d81a875d7d1d1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `is_aktif`, `semester`) VALUES
(9, '2020/2021', 'Y', 'ganjil'),
(10, '2021/2022', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tingkatan_kelas`
--

CREATE TABLE `tbl_tingkatan_kelas` (
  `kd_tingkatan` varchar(5) NOT NULL,
  `nama_tingkatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tingkatan_kelas`
--

INSERT INTO `tbl_tingkatan_kelas` (`kd_tingkatan`, `nama_tingkatan`) VALUES
('001', 'X'),
('002', 'XI'),
('003', 'XII');

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
(50, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id_walikelas`, `id_guru`, `id_tahun_akademik`, `kd_kelas`) VALUES
(1, 22, 9, 'IPAX1'),
(2, 22, 9, 'IPAX2'),
(3, 13, 9, 'IPAXI1'),
(4, 21, 9, 'IPAXI2'),
(5, 26, 9, 'IPAXII'),
(6, 23, 9, 'IPSX1'),
(7, 19, 9, 'IPSX2'),
(8, 15, 9, 'IPSXI'),
(9, 18, 9, 'IPSXII'),
(10, 0, 9, 'IPSXII2'),
(11, 0, 10, 'IPAX1'),
(12, 0, 10, 'IPAX2'),
(13, 0, 10, 'IPAXI1'),
(14, 0, 10, 'IPAXI2'),
(15, 0, 10, 'IPAXII'),
(16, 0, 10, 'IPSX1'),
(17, 0, 10, 'IPSX2'),
(18, 0, 10, 'IPSXI'),
(19, 0, 10, 'IPSXII');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kelas`
-- (See below for the actual view)
--
CREATE TABLE `view_kelas` (
`kd_kelas` varchar(10)
,`nama_kelas` varchar(30)
,`kd_tingkatan` varchar(5)
,`kd_jurusan` varchar(5)
,`nama_tingkatan` varchar(30)
,`nama_jurusan` varchar(30)
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
-- Stand-in structure for view `view_walikelas`
-- (See below for the actual view)
--
CREATE TABLE `view_walikelas` (
`nama_guru` varchar(40)
,`nama_kelas` varchar(30)
,`id_walikelas` int(11)
,`id_tahun_akademik` int(11)
,`nama_jurusan` varchar(30)
,`nama_tingkatan` varchar(30)
,`tahun_akademik` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `view_kelas`
--
DROP TABLE IF EXISTS `view_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas`  AS SELECT `tk`.`kd_kelas` AS `kd_kelas`, `tk`.`nama_kelas` AS `nama_kelas`, `tk`.`kd_tingkatan` AS `kd_tingkatan`, `tk`.`kd_jurusan` AS `kd_jurusan`, `ttk`.`nama_tingkatan` AS `nama_tingkatan`, `tj`.`nama_jurusan` AS `nama_jurusan` FROM ((`tbl_kelas` `tk` join `tbl_tingkatan_kelas` `ttk`) join `tbl_jurusan` `tj`) WHERE `tk`.`kd_tingkatan` = `ttk`.`kd_tingkatan` AND `tk`.`kd_jurusan` = `tj`.`kd_jurusan``kd_jurusan`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS SELECT `tu`.`id_user` AS `id_user`, `tu`.`nama_lengkap` AS `nama_lengkap`, `tu`.`username` AS `username`, `tu`.`password` AS `password`, `tu`.`id_level_user` AS `id_level_user`, `tu`.`foto` AS `foto`, `tlu`.`nama_level` AS `nama_level` FROM (`tbl_user` `tu` join `tbl_level_user` `tlu`) WHERE `tu`.`id_level_user` = `tlu`.`id_level_user``id_level_user`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_walikelas`
--
DROP TABLE IF EXISTS `view_walikelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_walikelas`  AS SELECT `tg`.`nama_guru` AS `nama_guru`, `tk`.`nama_kelas` AS `nama_kelas`, `tw`.`id_walikelas` AS `id_walikelas`, `tw`.`id_tahun_akademik` AS `id_tahun_akademik`, `tj`.`nama_jurusan` AS `nama_jurusan`, `ttk`.`nama_tingkatan` AS `nama_tingkatan`, `tta`.`tahun_akademik` AS `tahun_akademik` FROM (((((`tbl_walikelas` `tw` join `tbl_kelas` `tk`) join `tbl_guru` `tg`) join `tbl_jurusan` `tj`) join `tbl_tingkatan_kelas` `ttk`) join `tbl_tahun_akademik` `tta`) WHERE `tw`.`kd_kelas` = `tk`.`kd_kelas` AND `tw`.`id_guru` = `tg`.`id_guru` AND `tk`.`kd_jurusan` = `tj`.`kd_jurusan` AND `tk`.`kd_tingkatan` = `ttk`.`kd_tingkatan` AND `tw`.`id_tahun_akademik` = `tta`.`id_tahun_akademik``id_tahun_akademik`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`kd_agama`);

--
-- Indexes for table `tbl_biaya_sekolah`
--
ALTER TABLE `tbl_biaya_sekolah`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `tbl_kurikulum_detail`
--
ALTER TABLE `tbl_kurikulum_detail`
  ADD PRIMARY KEY (`id_kurikulum_detail`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_riwayat_kelas`
--
ALTER TABLE `tbl_riwayat_kelas`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`kd_ruangan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tbl_tingkatan_kelas`
--
ALTER TABLE `tbl_tingkatan_kelas`
  ADD PRIMARY KEY (`kd_tingkatan`);

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
-- Indexes for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_biaya_sekolah`
--
ALTER TABLE `tbl_biaya_sekolah`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kurikulum_detail`
--
ALTER TABLE `tbl_kurikulum_detail`
  MODIFY `id_kurikulum_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_riwayat_kelas`
--
ALTER TABLE `tbl_riwayat_kelas`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24555;

--
-- AUTO_INCREMENT for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
