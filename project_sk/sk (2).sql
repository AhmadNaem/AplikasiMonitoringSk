-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(103) NOT NULL,
  `jabatan` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jabatan`) VALUES
(123321, 'Naim', 'Tertinggi');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penerbitan_sk`
--

CREATE TABLE `laporan_penerbitan_sk` (
  `id_pelaporan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `Deskripsi` varchar(103) NOT NULL,
  `tanggal_laporan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_admin` int(11) DEFAULT NULL,
  `id_pimpinan` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `id_pengaju` int(11) DEFAULT NULL,
  `password` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_admin`, `id_pimpinan`, `id_staff`, `id_pengaju`, `password`) VALUES
(123321, NULL, NULL, NULL, 'n123123'),
(NULL, NULL, 321123, NULL, 'd321123'),
(NULL, NULL, 321123, NULL, 'd321123'),
(NULL, 412321, NULL, NULL, 'p412321'),
(NULL, NULL, NULL, 321412, 'h321412');

-- --------------------------------------------------------

--
-- Table structure for table `melihat_status`
--

CREATE TABLE `melihat_status` (
  `id_status` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `tanggal_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menerbitkan_sk`
--

CREATE TABLE `menerbitkan_sk` (
  `id_penerbitan` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status_penerbitan` varchar(103) NOT NULL,
  `tanggal_penerbitan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_sk` int(11) NOT NULL,
  `id_pengaju` int(11) NOT NULL,
  `judul_sk` varchar(103) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `tembusan` varchar(233) NOT NULL,
  `menimbang` varchar(233) NOT NULL,
  `menetapkan` varchar(233) NOT NULL,
  `memperhatikan` varchar(233) NOT NULL,
  `mengingat` varchar(233) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_sk`, `id_pengaju`, `judul_sk`, `tanggal_pengajuan`, `tembusan`, `menimbang`, `menetapkan`, `memperhatikan`, `mengingat`, `created_at`, `updated_at`) VALUES
(6, 321412, 'kaka', '2004-07-14 00:00:00', 'kalaldld', 'akhcahacha', 'aaacljacjl', 'aclacaclac', 'hkadagfakflsls', '2024-12-05 03:57:50', '2024-12-05 03:57:50'),
(7, 321412, 'penundaan skripsi', '2003-02-14 00:00:00', 'alalala', 'akakakaka', 'djdhdhddhd', 'sjsjsjsjsjsj', 'skakakshhsksk', '2024-12-05 06:50:11', '2024-12-05 06:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `pengaju_sk`
--

CREATE TABLE `pengaju_sk` (
  `id_pengaju` int(11) NOT NULL,
  `nama_pengaju` varchar(103) NOT NULL,
  `jabatan_pengaju` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaju_sk`
--

INSERT INTO `pengaju_sk` (`id_pengaju`, `nama_pengaju`, `jabatan_pengaju`) VALUES
(321412, 'handicap', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `nama_pimpinan` varchar(103) NOT NULL,
  `jabatan_pimpinan` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `nama_pimpinan`, `jabatan_pimpinan`) VALUES
(412321, 'paem', 'tertinggi');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(103) NOT NULL,
  `jabatan_staff` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `jabatan_staff`) VALUES
(321123, 'dori', 'tertinggi');

-- --------------------------------------------------------

--
-- Table structure for table `status_sk`
--

CREATE TABLE `status_sk` (
  `id_sk` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `status` varchar(103) NOT NULL,
  `Tanggal_Update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `laporan_penerbitan_sk`
--
ALTER TABLE `laporan_penerbitan_sk`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pimpinan` (`id_pimpinan`),
  ADD KEY `id_pengaju` (`id_pengaju`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `menerbitkan_sk`
--
ALTER TABLE `menerbitkan_sk`
  ADD PRIMARY KEY (`id_penerbitan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_pengaju` (`id_pengaju`);

--
-- Indexes for table `pengaju_sk`
--
ALTER TABLE `pengaju_sk`
  ADD PRIMARY KEY (`id_pengaju`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `status_sk`
--
ALTER TABLE `status_sk`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_sk` (`id_sk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_penerbitan_sk`
--
ALTER TABLE `laporan_penerbitan_sk`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menerbitkan_sk`
--
ALTER TABLE `menerbitkan_sk`
  MODIFY `id_penerbitan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_penerbitan_sk`
--
ALTER TABLE `laporan_penerbitan_sk`
  ADD CONSTRAINT `laporan_penerbitan_sk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`id_pimpinan`) REFERENCES `pimpinan` (`id_pimpinan`),
  ADD CONSTRAINT `login_ibfk_3` FOREIGN KEY (`id_pengaju`) REFERENCES `pengaju_sk` (`id_pengaju`),
  ADD CONSTRAINT `login_ibfk_4` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Constraints for table `menerbitkan_sk`
--
ALTER TABLE `menerbitkan_sk`
  ADD CONSTRAINT `menerbitkan_sk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pengaju`) REFERENCES `pengaju_sk` (`id_pengaju`);

--
-- Constraints for table `status_sk`
--
ALTER TABLE `status_sk`
  ADD CONSTRAINT `status_sk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `status_sk_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
