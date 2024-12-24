-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2024 pada 11.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(103) NOT NULL,
  `jabatan` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jabatan`) VALUES
(123321, 'Naimm', 'Tertinggi');

--
-- Trigger `admin`
--
DELIMITER $$
CREATE TRIGGER `after_update_id_admin` AFTER UPDATE ON `admin` FOR EACH ROW BEGIN
    -- Mengecek jika id_admin di tabel_pertama berubah
    IF NEW.id_admin <> OLD.id_admin THEN
        -- Melakukan update pada tabel_kedua berdasarkan id_admin yang baru
        UPDATE laporan_penerbitan_sk
        SET id_admin = NEW.id_admin
        WHERE id_admin = OLD.id_admin;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penerbitan_sk`
--

CREATE TABLE `laporan_penerbitan_sk` (
  `id_pelaporan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `deskripsi` varchar(103) NOT NULL,
  `tanggal_laporan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_penerbitan_sk`
--

INSERT INTO `laporan_penerbitan_sk` (`id_pelaporan`, `id_admin`, `id_sk`, `deskripsi`, `tanggal_laporan`) VALUES
(17, 123321, 6, 'kakak', '2024-12-19 03:28:10'),
(26, 123321, 8, 'klalkalka', '2024-12-19 08:06:44'),
(27, 123321, 11, 'mari', '2024-12-20 00:59:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_admin` int(11) DEFAULT NULL,
  `id_pimpinan` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `id_pengaju` int(11) DEFAULT NULL,
  `password` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_admin`, `id_pimpinan`, `id_staff`, `id_pengaju`, `password`) VALUES
(123321, NULL, NULL, NULL, 'n123123'),
(NULL, NULL, 321123, NULL, 'd321123'),
(NULL, NULL, 321123, NULL, 'd321123'),
(NULL, 412321, NULL, NULL, 'p412321'),
(NULL, NULL, NULL, 321412, 'h321412');

-- --------------------------------------------------------

--
-- Struktur dari tabel `melihat_laporan`
--

CREATE TABLE `melihat_laporan` (
  `id_pelaporan` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `isi_laporan` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `melihat_status`
--

CREATE TABLE `melihat_status` (
  `id_status` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `id_pengaju` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `tanggal_update` datetime NOT NULL,
  `status` varchar(103) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menerbitkan_sk`
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
-- Struktur dari tabel `pengajuan`
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
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_sk`, `id_pengaju`, `judul_sk`, `tanggal_pengajuan`, `tembusan`, `menimbang`, `menetapkan`, `memperhatikan`, `mengingat`, `created_at`, `updated_at`) VALUES
(6, 321412, 'kaka', '2004-07-14 00:00:00', 'kalaldld', 'akhcahacha', 'aaacljacjl', 'aclacaclac', 'hkadagfakflsls', '2024-12-05 03:57:50', '2024-12-05 03:57:50'),
(7, 321412, 'penundaan skripsi', '2003-02-14 00:00:00', 'alalala', 'akakakaka', 'djdhdhddhd', 'sjsjsjsjsjsj', 'skakakshhsksk', '2024-12-05 06:50:11', '2024-12-05 06:50:11'),
(8, 321412, 'wkwkw', '2004-04-12 00:00:00', 'alh', 'ahal', 'cabbkacb', 'andllnda', 'alnc', '2024-12-18 09:54:46', '2024-12-18 09:54:46'),
(10, 321412, 'pol', '2003-04-12 00:00:00', 'anc', 'val', 'abkv', 'bavj', 'abvk', '2024-12-19 01:07:36', '2024-12-19 01:07:36'),
(11, 321412, 'implementasi digital', '2004-05-12 00:00:00', 'nkackcaaknk', 'acbkcabkakbcabkakbcbak', 'bakbfkjabkfabkfbjabfka', 'kbafkbakfakbfakbfakbfkafka', 'aafkbfabfakbfakfkabfka', '2024-12-19 09:05:03', '2024-12-19 09:05:03'),
(12, 321412, 'sk umrah', '2024-04-12 00:00:00', 'anckcankcka', 'cabkbacbka', 'bkackacbk', 'jacbbkcabkacb', 'jkbcakbckbja', '2024-12-19 20:18:30', '2024-12-19 20:18:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaju_sk`
--

CREATE TABLE `pengaju_sk` (
  `id_pengaju` int(11) NOT NULL,
  `nama_pengaju` varchar(103) NOT NULL,
  `jabatan_pengaju` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaju_sk`
--

INSERT INTO `pengaju_sk` (`id_pengaju`, `nama_pengaju`, `jabatan_pengaju`) VALUES
(321412, 'handicap', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunduhan`
--

CREATE TABLE `pengunduhan` (
  `id_unduh` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `id_pengaju` int(11) NOT NULL,
  `tanggal_unduh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `persetujuan_sk`
--

CREATE TABLE `persetujuan_sk` (
  `id_persetujuan` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `jenis_keputusan` varchar(103) NOT NULL,
  `tanggal_keputusan` date NOT NULL,
  `keterangan` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `nama_pimpinan` varchar(103) NOT NULL,
  `jabatan_pimpinan` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `nama_pimpinan`, `jabatan_pimpinan`) VALUES
(412321, 'paem', 'tertinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisi`
--

CREATE TABLE `revisi` (
  `id_revisi` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `deskripsi_revisi` varchar(103) NOT NULL,
  `tanggal_revisi` date NOT NULL,
  `status_revisi` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `revisi`
--

INSERT INTO `revisi` (`id_revisi`, `id_sk`, `id_staff`, `deskripsi_revisi`, `tanggal_revisi`, `status_revisi`) VALUES
(1, 10, 321123, 'tidak bagus\r\n', '2024-12-20', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(103) NOT NULL,
  `jabatan_staff` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `jabatan_staff`) VALUES
(321123, 'dori', 'tertinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_sk`
--

CREATE TABLE `status_sk` (
  `id_sk` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `status` varchar(103) NOT NULL,
  `Tanggal_Update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi_sk`
--

CREATE TABLE `verifikasi_sk` (
  `id_aturan` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `status_verifikasi` varchar(103) NOT NULL,
  `deskripsi_aturan` varchar(103) NOT NULL,
  `status_aturan` varchar(103) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `verifikasi_sk`
--

INSERT INTO `verifikasi_sk` (`id_aturan`, `id_sk`, `id_staff`, `status_verifikasi`, `deskripsi_aturan`, `status_aturan`) VALUES
(2, 6, 321123, 'rejected', 'lalaja', 'ditolak'),
(3, 7, 321123, 'approved', 'bagus', 'disetujui'),
(6, 10, 321123, 'approved', 'bagus', 'disetujui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `laporan_penerbitan_sk`
--
ALTER TABLE `laporan_penerbitan_sk`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_sk` (`id_sk`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pimpinan` (`id_pimpinan`),
  ADD KEY `id_pengaju` (`id_pengaju`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `melihat_laporan`
--
ALTER TABLE `melihat_laporan`
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_pelaporan` (`id_pelaporan`),
  ADD KEY `id_pimpinan` (`id_pimpinan`);

--
-- Indeks untuk tabel `melihat_status`
--
ALTER TABLE `melihat_status`
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_pimpinan` (`id_pimpinan`),
  ADD KEY `id_pengaju` (`id_pengaju`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `menerbitkan_sk`
--
ALTER TABLE `menerbitkan_sk`
  ADD PRIMARY KEY (`id_penerbitan`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_sk` (`id_sk`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_pengaju` (`id_pengaju`);

--
-- Indeks untuk tabel `pengaju_sk`
--
ALTER TABLE `pengaju_sk`
  ADD PRIMARY KEY (`id_pengaju`);

--
-- Indeks untuk tabel `pengunduhan`
--
ALTER TABLE `pengunduhan`
  ADD PRIMARY KEY (`id_unduh`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_pimpinan` (`id_pimpinan`),
  ADD KEY `id_pengaju` (`id_pengaju`);

--
-- Indeks untuk tabel `persetujuan_sk`
--
ALTER TABLE `persetujuan_sk`
  ADD PRIMARY KEY (`id_persetujuan`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_pimpinan` (`id_pimpinan`);

--
-- Indeks untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indeks untuk tabel `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id_revisi`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indeks untuk tabel `status_sk`
--
ALTER TABLE `status_sk`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_sk` (`id_sk`);

--
-- Indeks untuk tabel `verifikasi_sk`
--
ALTER TABLE `verifikasi_sk`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_staff` (`id_staff`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan_penerbitan_sk`
--
ALTER TABLE `laporan_penerbitan_sk`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `menerbitkan_sk`
--
ALTER TABLE `menerbitkan_sk`
  MODIFY `id_penerbitan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengunduhan`
--
ALTER TABLE `pengunduhan`
  MODIFY `id_unduh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `persetujuan_sk`
--
ALTER TABLE `persetujuan_sk`
  MODIFY `id_persetujuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id_revisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `verifikasi_sk`
--
ALTER TABLE `verifikasi_sk`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_penerbitan_sk`
--
ALTER TABLE `laporan_penerbitan_sk`
  ADD CONSTRAINT `laporan_penerbitan_sk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `laporan_penerbitan_sk_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`);

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`id_pimpinan`) REFERENCES `pimpinan` (`id_pimpinan`),
  ADD CONSTRAINT `login_ibfk_3` FOREIGN KEY (`id_pengaju`) REFERENCES `pengaju_sk` (`id_pengaju`),
  ADD CONSTRAINT `login_ibfk_4` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Ketidakleluasaan untuk tabel `melihat_laporan`
--
ALTER TABLE `melihat_laporan`
  ADD CONSTRAINT `melihat_laporan_ibfk_1` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`),
  ADD CONSTRAINT `melihat_laporan_ibfk_2` FOREIGN KEY (`id_pelaporan`) REFERENCES `laporan_penerbitan_sk` (`id_pelaporan`),
  ADD CONSTRAINT `melihat_laporan_ibfk_3` FOREIGN KEY (`id_pimpinan`) REFERENCES `pimpinan` (`id_pimpinan`);

--
-- Ketidakleluasaan untuk tabel `melihat_status`
--
ALTER TABLE `melihat_status`
  ADD CONSTRAINT `melihat_status_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status_sk` (`id_status`),
  ADD CONSTRAINT `melihat_status_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`),
  ADD CONSTRAINT `melihat_status_ibfk_3` FOREIGN KEY (`id_pimpinan`) REFERENCES `pimpinan` (`id_pimpinan`),
  ADD CONSTRAINT `melihat_status_ibfk_4` FOREIGN KEY (`id_pengaju`) REFERENCES `pengaju_sk` (`id_pengaju`),
  ADD CONSTRAINT `melihat_status_ibfk_5` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Ketidakleluasaan untuk tabel `menerbitkan_sk`
--
ALTER TABLE `menerbitkan_sk`
  ADD CONSTRAINT `menerbitkan_sk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `menerbitkan_sk_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`);

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pengaju`) REFERENCES `pengaju_sk` (`id_pengaju`);

--
-- Ketidakleluasaan untuk tabel `pengunduhan`
--
ALTER TABLE `pengunduhan`
  ADD CONSTRAINT `pengunduhan_ibfk_1` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`),
  ADD CONSTRAINT `pengunduhan_ibfk_2` FOREIGN KEY (`id_pimpinan`) REFERENCES `pimpinan` (`id_pimpinan`),
  ADD CONSTRAINT `pengunduhan_ibfk_3` FOREIGN KEY (`id_pengaju`) REFERENCES `pengaju_sk` (`id_pengaju`);

--
-- Ketidakleluasaan untuk tabel `persetujuan_sk`
--
ALTER TABLE `persetujuan_sk`
  ADD CONSTRAINT `persetujuan_sk_ibfk_1` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`),
  ADD CONSTRAINT `persetujuan_sk_ibfk_2` FOREIGN KEY (`id_pimpinan`) REFERENCES `pimpinan` (`id_pimpinan`);

--
-- Ketidakleluasaan untuk tabel `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`),
  ADD CONSTRAINT `revisi_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Ketidakleluasaan untuk tabel `status_sk`
--
ALTER TABLE `status_sk`
  ADD CONSTRAINT `status_sk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `status_sk_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`);

--
-- Ketidakleluasaan untuk tabel `verifikasi_sk`
--
ALTER TABLE `verifikasi_sk`
  ADD CONSTRAINT `verifikasi_sk_ibfk_1` FOREIGN KEY (`id_sk`) REFERENCES `pengajuan` (`id_sk`),
  ADD CONSTRAINT `verifikasi_sk_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
