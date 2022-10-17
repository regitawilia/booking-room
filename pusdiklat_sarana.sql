-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 12:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusdiklat_sarana`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval_log`
--

CREATE TABLE `approval_log` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `approval_by` varchar(255) DEFAULT NULL,
  `approval_by_id` int(11) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval_log`
--

INSERT INTO `approval_log` (`id`, `id_peminjaman`, `status`, `approval_by`, `approval_by_id`, `role`, `created_date`) VALUES
(137, '112', '1', NULL, NULL, NULL, '2022-09-28 03:25:56'),
(138, '112', '2', 'rgtwilia', 1, 'admin', '2022-09-28 03:26:38'),
(140, '113', '1', NULL, NULL, NULL, '2022-09-28 03:33:43'),
(141, '113', '3', 'evi', 8, 'approval', '2022-09-28 03:33:56'),
(142, '114', '1', NULL, NULL, NULL, '2022-09-28 03:54:57'),
(143, '114', '2', 'rgtwilia', 1, 'admin', '2022-09-28 03:55:07'),
(144, '115', '1', NULL, NULL, NULL, '2022-09-28 04:17:19'),
(145, '115', '2', 'evi', 8, 'approval', '2022-09-28 04:19:45'),
(146, '116', '1', NULL, NULL, NULL, '2022-09-28 04:41:19'),
(147, '117', '1', NULL, NULL, NULL, '2022-09-30 06:08:08'),
(148, '117', '2', 'evi', 8, 'approval', '2022-09-30 06:08:24'),
(149, '118', '1', NULL, NULL, NULL, '2022-09-30 08:00:29'),
(150, '118', '3', 'evi', 8, 'approval', '2022-09-30 08:02:35'),
(151, '119', '1', NULL, NULL, NULL, '2022-09-30 08:04:17'),
(152, '119', '2', 'evi', 8, 'approval', '2022-09-30 08:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `log` varchar(500) DEFAULT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `id_user`, `name`, `username`, `role`, `log`, `id_peminjaman`, `created_date`) VALUES
(37, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan logout', NULL, '2022-09-27 06:10:02'),
(38, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan login', NULL, '2022-09-27 06:10:10'),
(39, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan logout', NULL, '2022-09-27 06:15:38'),
(40, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan login', NULL, '2022-09-28 03:05:20'),
(41, NULL, 'Regita', NULL, NULL, 'Mengajukan peminjaman', 111, '2022-09-28 03:06:54'),
(42, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-28 03:07:12'),
(43, NULL, 'Regita', NULL, NULL, 'Mengajukan peminjaman', 112, '2022-09-28 03:25:56'),
(44, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Menyetujui peminjaman ruangan', 112, '2022-09-28 03:28:33'),
(45, NULL, 'Rani', NULL, NULL, 'Mengajukan peminjaman', 113, '2022-09-28 03:33:43'),
(46, 8, 'Evi Subarkha', 'evi', 'approval', 'Menyetujui peminjaman ruangan', 113, '2022-09-28 03:33:56'),
(47, NULL, 'Monica', NULL, NULL, 'Mengajukan peminjaman', 114, '2022-09-28 03:54:57'),
(48, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Menyetujui peminjaman ruangan', 114, '2022-09-28 03:55:07'),
(49, NULL, 'Regita', NULL, NULL, 'Mengajukan peminjaman', 115, '2022-09-28 04:17:19'),
(50, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan logout', NULL, '2022-09-28 04:18:47'),
(51, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-28 04:18:53'),
(52, 8, 'Evi Subarkha', 'evi', 'approval', 'Menyetujui peminjaman ruangan', 115, '2022-09-28 04:19:45'),
(53, NULL, 'Maharani', NULL, NULL, 'Mengajukan peminjaman', 116, '2022-09-28 04:41:19'),
(54, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan logout', NULL, '2022-09-28 05:33:50'),
(55, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 05:36:35'),
(56, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 05:38:27'),
(57, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:01:00'),
(58, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:04:22'),
(59, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:06:59'),
(60, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:09:14'),
(61, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:09:26'),
(62, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:10:53'),
(63, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:12:32'),
(64, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:15:34'),
(65, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:15:52'),
(66, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:16:05'),
(67, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:18:55'),
(68, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:19:57'),
(69, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:24:30'),
(70, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:29:18'),
(71, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:29:41'),
(72, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:37:20'),
(73, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:37:29'),
(74, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:39:51'),
(75, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:40:19'),
(76, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:40:32'),
(77, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:41:41'),
(78, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:42:12'),
(79, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:42:47'),
(80, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:42:51'),
(81, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:43:06'),
(82, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:43:35'),
(83, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:43:49'),
(84, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:44:03'),
(85, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:44:24'),
(86, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:44:37'),
(87, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:45:58'),
(88, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:46:02'),
(89, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:51:20'),
(90, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:51:38'),
(91, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:53:06'),
(92, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:55:04'),
(93, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:55:50'),
(94, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:56:11'),
(95, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-28 06:58:41'),
(96, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-28 07:46:05'),
(97, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-28 07:46:26'),
(98, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan logout', NULL, '2022-09-28 07:48:38'),
(99, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan login', NULL, '2022-09-28 07:49:39'),
(100, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan logout', NULL, '2022-09-28 07:49:44'),
(101, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan login', NULL, '2022-09-29 00:34:11'),
(102, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan logout', NULL, '2022-09-29 00:34:15'),
(103, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-29 00:35:09'),
(104, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-29 04:29:56'),
(105, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan logout', NULL, '2022-09-29 04:30:44'),
(106, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan login', NULL, '2022-09-29 04:31:30'),
(107, NULL, NULL, NULL, NULL, 'Melakukan logout', NULL, '2022-09-30 03:01:23'),
(108, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan login', NULL, '2022-09-30 03:01:26'),
(109, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-30 06:04:27'),
(110, NULL, 'Rani', NULL, NULL, 'Mengajukan peminjaman', 117, '2022-09-30 06:08:08'),
(111, 8, 'Evi Subarkha', 'evi', 'approval', 'Menyetujui peminjaman ruangan', 117, '2022-09-30 06:08:24'),
(112, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan logout', NULL, '2022-09-30 06:58:13'),
(113, NULL, 'Dirto', NULL, NULL, 'Mengajukan peminjaman', 118, '2022-09-30 08:00:29'),
(114, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-30 08:02:13'),
(115, 8, 'Evi Subarkha', 'evi', 'approval', 'Menyetujui peminjaman ruangan', 118, '2022-09-30 08:02:35'),
(116, NULL, 'Purnomo', NULL, NULL, 'Mengajukan peminjaman', 119, '2022-09-30 08:04:17'),
(117, 8, 'Evi Subarkha', 'evi', 'approval', 'Menyetujui peminjaman ruangan', 119, '2022-09-30 08:04:31'),
(118, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan logout', NULL, '2022-09-30 08:09:12'),
(119, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan login', NULL, '2022-09-30 08:09:15'),
(120, 1, 'Regita Wilia', 'rgtwilia', 'admin', 'Melakukan logout', NULL, '2022-09-30 08:09:21'),
(121, 8, 'Evi Subarkha', 'evi', 'approval', 'Melakukan login', NULL, '2022-09-30 08:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruangan`
--

CREATE TABLE `peminjaman_ruangan` (
  `id` int(11) NOT NULL,
  `id_ruangan` varchar(45) DEFAULT NULL,
  `nama_pic` varchar(255) DEFAULT NULL,
  `no_pic` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `jumlah_undangan` varchar(255) DEFAULT NULL,
  `pimpinan_hadir` int(255) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `surat_undangan` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `kode_booking` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_ruangan`
--

INSERT INTO `peminjaman_ruangan` (`id`, `id_ruangan`, `nama_pic`, `no_pic`, `unit_kerja`, `nama_kegiatan`, `jumlah_undangan`, `pimpinan_hadir`, `tanggal_mulai`, `tanggal_selesai`, `jam_mulai`, `jam_selesai`, `surat_undangan`, `created_date`, `kode_booking`, `status`, `updated_date`) VALUES
(112, '4', 'Regita', '08123232232', 'Pusdiklat', 'Evaluasi Akademik Indonesia', NULL, NULL, '2022-10-03', '2022-10-03', '08:00:00', '10:00:00', 'PKTBT_Nadiya_Khairani.pdf', '2022-09-28 03:25:56', 'PSDK00001', 2, NULL),
(113, '5', 'Rani', '0812993284722', 'Pusdiklat', 'Mengajar Diklat', NULL, NULL, '2022-10-04', '2022-10-04', '08:00:00', '10:00:00', 'Peraturan_BPS_2_2021_Juknis_Prakom.pdf', '2022-09-28 03:33:43', 'PSDK00002', 3, NULL),
(114, '7', 'Monica', '08123382322223', 'Pusdiklat', 'Mengajar', NULL, NULL, '2022-10-10', '2022-10-10', '08:00:00', '10:00:00', 'JaFungPrakomdanAKnya.pdf', '2022-09-28 03:54:57', 'PSDK00003', 2, NULL),
(115, '1', 'Regita', '08123232232', 'Pusdiklat', 'Evaluasi Akademik Indonesia', NULL, NULL, '2022-10-09', '2022-09-09', '08:00:00', '11:00:00', 'JukNisPenilaianPrakomdanAKnya_2.pdf', '2022-09-28 04:17:19', 'PSDK00004', 2, NULL),
(116, '3', 'Maharani', '083833821704', 'Pendidikan dan Pelatihan', 'Sosialisasi Indeks Kualitas Kebijakan', NULL, NULL, '2022-09-30', '2022-10-01', '08:00:00', '12:00:00', 'JukNisPenilaianPrakomdanAKnya_21.pdf', '2022-09-28 04:41:19', 'PSDK00005', 1, NULL),
(117, '7', 'Rani', '0812373212233', 'P3SMPT', 'Evaluasi Perpustakaan Sekolah', NULL, NULL, '2022-10-08', '2022-10-08', '08:00:00', '12:00:00', 'undangan_upacara_sabtu_01_Oktober_2022.pdf', '2022-09-30 06:08:08', 'PSDK00006', 2, NULL),
(118, '1', 'Dirto', '08123232232', 'Pusdiklat', 'Evaluasi Akademik Indonesia', NULL, NULL, '2022-10-03', '2022-10-07', '07:00:00', '10:00:00', 'undangan_upacara_sabtu_01_Oktober_20221.pdf', '2022-09-30 08:00:29', 'PSDK00007', 3, NULL),
(119, '6', 'Purnomo', '08123232232', 'Pusdiklat', 'Evaluasi Akademik Indonesia', NULL, NULL, '2022-10-17', '2022-10-17', '08:00:00', '12:00:00', 'undangan_upacara_sabtu_01_Oktober_20222.pdf', '2022-09-30 08:04:17', 'PSDK00008', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `deskripsi_ruangan` longtext NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `deskripsi_ruangan`, `kapasitas`, `foto`, `created_date`) VALUES
(1, 'STUDIO', 'Ruangan studio adalah ruangan atau sekelompok ruangan yang digunakan untuk pengambilan video baik itu untuk live streaming ataupun untuk membuat konten.', '8 orang', 'assets/img/studio.jpeg', NULL),
(3, 'PODCAST', 'Ruangan podcast adalah ruang untuk memproduksi konten-konten dalam bentuk rekaman audio, baik berupa talkshow, promosi atau iklan, maupun untuk konten pembelajaran.', '7 orang', 'assets/img/podcast.jpeg', NULL),
(4, 'Ruang Interaktif 1', 'Ruang interaktif adalah ruangan yang digunakan untuk para pengajar mengajar secara daring dimana ruangan interaktif ini di fasilitasi dengan ruang kedap suara.', '1 orang', 'assets/img/ruang_interaktif.jpeg', NULL),
(5, 'Ruang Interaktif 2', 'Ruang interaktif adalah ruangan yang digunakan untuk para pengajar mengajar secara daring dimana ruangan interaktif ini di fasilitasi dengan ruang kedap suara.', '1 orang', 'assets/img/ruang_interaktif.jpeg', NULL),
(6, 'Lab Komputer', 'Lab komputer adalah ruangan yang bisa digunakan untuk pelatihan diklat ataupun mengajar.', '32 orang', 'assets/img/lab_komputer.jpeg', NULL),
(7, 'Ruang Kelas', 'Ruang Kelas adalah ruangaan yang digunakan pengajar untuk mengajar secara luring atau bisa juga digunakan untuk rapat unit kerja.', '35 orang', 'assets/img/ruang_kelas.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `created_date`) VALUES
(1, 'Regita Wilia', 'rgtwilia', '123456', 'admin', NULL),
(6, 'Purnomo', 'purnomo', '123456', 'admin', '2022-09-17 08:22:10'),
(7, 'Gunawan Hadiwibowo', 'gunawan', '123456', 'admin', '2022-09-26 03:01:38'),
(8, 'Evi Subarkha', 'evi', '123456', 'approval', '2022-09-27 04:16:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval_log`
--
ALTER TABLE `approval_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval_log`
--
ALTER TABLE `approval_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
