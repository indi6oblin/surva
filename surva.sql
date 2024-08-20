-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2024 at 12:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surva`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$K9/bhkSZYQCAErIcmjPhS.I.fRM1vrMvm94pFCWF08VOXwNcvlSZO'),
(2, 'absar', 'absar@gmail.com', '$2y$10$O1U10nL4PJGT6MBqqJmG9ef..0Sc/rnLvcjLE0D./BrThKTszqMFq'),
(3, 'ririn', 'ririn@gmail.com', '$2y$10$D.Z1vF8A8b7/HWtvr39i9.9.74jrKpgtMfI9LUsqZiUknWOdw6gk6'),
(4, 'aldo', 'Aldo@gmail.com', '$2y$10$L8yaB6xNXdjGuFYeWIACyOEchoobx1BgxTSPmAzDkMiM5w5rTyCVu'),
(5, 'tyas', 'tyas@gmail.com', '$2y$10$ZkKC.f0U8oltGA.9fL78..CEEDk0OUfhtJmbQT.VMRcoCBuHRSiz6'),
(6, 'bowen', 'bowen@gmail.com', '$2y$10$uNJs/h472UpZmgjbVDtmn.M9SwPylnLLjhiNpUYeiZ7jer3DcjpN2');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_survei`
--

CREATE TABLE `hasil_survei` (
  `id_hasil` int UNSIGNED NOT NULL,
  `id_responden` int UNSIGNED NOT NULL,
  `id_pertanyaan` int UNSIGNED NOT NULL,
  `hasil_opsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_essai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_survei` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_survei`
--

INSERT INTO `hasil_survei` (`id_hasil`, `id_responden`, `id_pertanyaan`, `hasil_opsi`, `hasil_essai`, `created_at`, `updated_at`, `id_survei`) VALUES
(26, 12, 16, 'Pilihan 3', NULL, NULL, NULL, 23),
(27, 12, 17, NULL, NULL, NULL, NULL, 23);

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` int UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nama`, `username`, `email`, `password`, `remember_token`) VALUES
(1, 'klien1', 'klien', 'klien@example.com', '$2y$10$b0DbNCNafwpDJSfLe.lHierObsLy/7qDyKGktJ1OstlElInCzTHJ.', NULL),
(2, 'tyas pening', 'tyas', 'tyas@gmail.com', '$2y$10$xoGVDouu/aAKDFALI/cWf.oklwKeEaI7reG.NcC9stnYUzHrpUAbW', NULL),
(3, 'ririn', 'ririn', 'ririn@gmailcom', '$2y$10$D.Z1vF8A8b7/HWtvr39i9.9.74jrKpgtMfI9LUsqZiUknWOdw6gk6', NULL),
(5, 'Asep', 'asep', 'asep@gmail.com', '$2y$10$LhbG9hgqbTa5w6b/CrbQT.Vg76r.v723CEXXvd7m/kfVTqI73O0a.', NULL),
(6, 'bowen', 'bowen', 'bowen@example.com', '$2y$10$M6zp15/1kvqsLncr1pZ/LujEP2hBrW0cbM5h0jni39wQBLSBrTHH6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_10_01_104716_buat_tabel_klien', 1),
(4, '2023_10_01_105016_buat_tabel_admin', 1),
(5, '2023_10_21_161648_create_survei_table', 1),
(6, '2023_10_21_165403_create_responden_table', 1),
(7, '2023_10_21_170715_create_pertanyaan_table', 1),
(8, '2023_10_21_171716_create_hasil_survei_table', 1),
(9, '2023_12_14_164949_create_survei_terjawab_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_pertanyaan`
--

CREATE TABLE `paket_pertanyaan` (
  `id_paket` int NOT NULL,
  `id_pertanyaan` int NOT NULL,
  `id_survei` int NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `jumlah_responden` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int UNSIGNED NOT NULL,
  `id_survei` int UNSIGNED NOT NULL,
  `pertanyaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'multiple_choice',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_survei`, `pertanyaan`, `opsi_1`, `opsi_2`, `opsi_3`, `opsi_4`, `opsi_5`, `type`, `created_at`, `updated_at`) VALUES
(16, 23, 'Soal Pertanyaan Ganda', 'Pilihan 1', 'Pilihan 2', 'Pilihan 3', 'Pilihan 4', 'Pilihan 5', 'multiple_choice', '2024-06-27 03:47:14', '2024-06-27 03:47:14'),
(17, 23, 'Soal Pertanyaan Essai', NULL, NULL, NULL, NULL, NULL, 'essay', '2024-06-27 03:47:14', '2024-06-27 03:47:14'),
(18, 24, 'asdwasd', NULL, NULL, NULL, NULL, NULL, 'essay', '2024-06-27 06:05:57', '2024-06-27 06:05:57'),
(19, 25, '111', '11', '22', '33', '44', '55', 'multiple_choice', '2024-06-27 07:02:30', '2024-06-27 07:02:30'),
(20, 26, 'Bagaimana tanggapan anda mengenai TAPERA?', 'Sangat setuju', 'Setuju', 'Ragu', 'Tidak setuju', 'Sangat tidak setuju', 'multiple_choice', '2024-06-27 09:32:24', '2024-06-27 09:32:24'),
(21, 26, 'Bagaimana tanggapan anda mengenai TAPERA?', NULL, NULL, NULL, NULL, NULL, 'essay', '2024-06-27 09:32:24', '2024-06-27 09:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id_responden` int UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id_responden`, `username`, `password`, `nama`, `jenis_kelamin`, `umur`, `email`, `poin`, `created_at`, `updated_at`) VALUES
(1, 'ririn', '$2y$10$JUvA3gT3/YqsBzlwc4aLLeMltseYtCii/OAkxMwddeHz6byjWpyEO', 'ririn', 'laki-laki', 0, 'ririn@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'rahel', '$2y$10$D7hK2hxFFjw/8IY63pxyxeQXgrPKD8HtpY2e3pjtYhjbPCejXey5u', 'rahel', 'perempuan', 19, 'rahel@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'bowen', '$2y$10$1JE7MGGvm2Pf.f08I9KjzusZUQLIi1cVEn3HlxmK9oVF200bz8s6a', 'bowen', 'laki-laki', 19, 'bowen@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'udin', '$2y$10$TMEQfVUD9T1Gl99UdY5L2OO9B4XsVUEHVYerM4ba.Q7SDzGxD4KFi', 'udin', 'laki-laki', 18, 'udin@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'rudi', '$2y$10$ALqD2lKv8spSwDEyg/DB4utEI2DcHNoSDlTHAOt6gK0vHNID1c/OW', 'rudi', 'laki-laki', 18, 'rudi@gmail.com', 10000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'riki', '$2y$10$dNnyOU9FwJScaRqxeHn13urs5lvsatAYO17DUlZS9sen2YrQE44KK', 'riki', 'laki-laki', 19, 'riki@gmail.com', NULL, '2024-06-26 07:04:02', '2024-06-26 07:04:02'),
(16, 'absar', '$2y$10$erpD6E0mKDKPlkEmeYUonuzfX1VIErXqfFoK2ypf6r74zItGGK8a2', 'absar', 'laki-laki', 17, 'absar@example.com', NULL, '2024-06-27 09:45:08', '2024-06-27 09:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id_survei` int UNSIGNED NOT NULL,
  `id_klien` int UNSIGNED NOT NULL,
  `jumlah_responden` int UNSIGNED DEFAULT NULL,
  `poin` int UNSIGNED NOT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` int UNSIGNED DEFAULT NULL,
  `judul` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deskripsi_validasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rincian_harga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('Sortir','Belum Bayar','Sudah Bayar','Disetujui','Dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sortir',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_pengisian` enum('Belum','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id_survei`, `id_klien`, `jumlah_responden`, `poin`, `bukti`, `nominal`, `judul`, `deskripsi`, `deskripsi_validasi`, `rincian_harga`, `tgl_mulai`, `tgl_selesai`, `status`, `created_at`, `updated_at`, `status_pengisian`) VALUES
(23, 2, 10, 2000, 'bukti_pembayaran/1719460102_envelope_9482438.png', 2000, 'Contoh Survei', 'Berikut merupakan Deskripsi Survei', NULL, 'Rincian Harga Survei', '2024-06-28', '2024-06-29', 'Disetujui', '2024-06-27 03:47:14', '2024-06-27 03:48:40', 'Belum'),
(24, 2, 12, 5000, NULL, 5000, 'tes', 'tes', NULL, 'harga', '2024-06-28', '2024-06-29', 'Belum Bayar', '2024-06-27 06:05:57', '2024-06-27 06:11:52', 'Belum'),
(25, 2, 12, 5, NULL, NULL, 'Pendapatan rata-rata pekerja di batam', 'aaaa', NULL, NULL, '2024-06-27', '2024-07-06', 'Sortir', '2024-06-27 07:02:30', '2024-06-27 07:02:30', 'Belum'),
(26, 6, 99, 10000, 'bukti_pembayaran/1719481024_Screenshot 2024-04-29 142842.png', 10000, 'Bagaimana tanggapan anda mengenai TAPERA?', 'Bagaimana tanggapan kalian pribadi mengenai TAPERA?', NULL, 'Sepuluh ribu rupiah', '2024-06-27', '2024-07-04', 'Disetujui', '2024-06-27 09:32:24', '2024-06-27 09:41:35', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `survei_terjawab`
--

CREATE TABLE `survei_terjawab` (
  `id` int UNSIGNED NOT NULL,
  `id_responden` int UNSIGNED NOT NULL,
  `id_survei` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_username_unique` (`username`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `hasil_survei`
--
ALTER TABLE `hasil_survei`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `hasil_survei_id_responden_foreign` (`id_responden`),
  ADD KEY `hasil_survei_id_survei_foreign` (`id_survei`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`),
  ADD UNIQUE KEY `klien_username_unique` (`username`),
  ADD UNIQUE KEY `klien_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_pertanyaan`
--
ALTER TABLE `paket_pertanyaan`
  ADD PRIMARY KEY (`id_paket`),
  ADD UNIQUE KEY `id_pertanyaan` (`id_pertanyaan`,`id_survei`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `pertanyaan_id_survei_foreign` (`id_survei`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id_responden`),
  ADD UNIQUE KEY `responden_username_unique` (`username`),
  ADD UNIQUE KEY `responden_email_unique` (`email`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id_survei`),
  ADD KEY `survei_id_klien_foreign` (`id_klien`);

--
-- Indexes for table `survei_terjawab`
--
ALTER TABLE `survei_terjawab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survei_terjawab_id_survei_foreign` (`id_survei`),
  ADD KEY `survei_terjawab_id_responden_foreign` (`id_responden`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil_survei`
--
ALTER TABLE `hasil_survei`
  MODIFY `id_hasil` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id_responden` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id_survei` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `survei_terjawab`
--
ALTER TABLE `survei_terjawab`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_survei`
--
ALTER TABLE `hasil_survei`
  ADD CONSTRAINT `hasil_survei_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_survei_id_survei_foreign` FOREIGN KEY (`id_survei`) REFERENCES `survei` (`id_survei`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_id_survei_foreign` FOREIGN KEY (`id_survei`) REFERENCES `survei` (`id_survei`) ON DELETE CASCADE;

--
-- Constraints for table `survei`
--
ALTER TABLE `survei`
  ADD CONSTRAINT `survei_id_klien_foreign` FOREIGN KEY (`id_klien`) REFERENCES `klien` (`id_klien`) ON DELETE CASCADE;

--
-- Constraints for table `survei_terjawab`
--
ALTER TABLE `survei_terjawab`
  ADD CONSTRAINT `survei_terjawab_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE,
  ADD CONSTRAINT `survei_terjawab_id_survei_foreign` FOREIGN KEY (`id_survei`) REFERENCES `survei` (`id_survei`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
