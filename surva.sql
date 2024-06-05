-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 04:49 AM
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
-- Database: `apsis_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$JE5fMvNdlzGDD2FHMJKFpe7Bdy17zmiNNkR583bbmcWSHdQdoyHt6'),
(2, 'admin1', 'admin1@example.com', '$2y$10$83BEiHiz/p1QYkvTNGy3Y.XsNosvUKMUzTB4dNrM3ywd/4WVboAii'),
(3, 'absar', 'absar@gmail.com', '$2y$10$2WhtvA1xzWyJnjK1XHFheOpRa82UeoikEz6QqrqCQWKPIKjDCzNpK');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_survei`
--

CREATE TABLE `hasil_survei` (
  `id_hasil` int UNSIGNED NOT NULL,
  `id_pertanyaan` int UNSIGNED NOT NULL,
  `id_responden` int UNSIGNED NOT NULL,
  `hasil_opsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` int UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nama`, `username`, `email`, `password`, `remember_token`) VALUES
(1, 'klien', 'klien', 'klien@example.com', '$2y$10$7N3Zaw4jUCfzSae0OH/s4O8DX9I4LDTZm3tcnfgZwcUmA8YrueE2u', NULL),
(3, 'tyas', 'tyas', 'tyas@gmail.com', '$2y$10$.DOFObl1U9PlqEYojZBl4e.EV5rg30rJeBGEw09.weqLY3aGNR1Qu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban_essai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_survei`, `pertanyaan`, `opsi_1`, `opsi_2`, `opsi_3`, `opsi_4`, `opsi_5`, `jawaban_essai`, `created_at`, `updated_at`) VALUES
(1, 6, 'Fungsi SQL mana yang digunakan untuk menghitung jumlah baris dalam tabel?', 'COUNT()', 'SUM()', 'TOTAL()', 'CACL()', 'TIDAK TAHU', NULL, '2024-05-30 07:46:35', '2024-05-30 07:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id_responden` int UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id_survei` int UNSIGNED NOT NULL,
  `id_klien` int UNSIGNED NOT NULL,
  `jumlah_responden` int UNSIGNED DEFAULT NULL,
  `poin` int UNSIGNED NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` int UNSIGNED DEFAULT NULL,
  `judul` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `deskripsi_validasi` text COLLATE utf8mb4_unicode_ci,
  `rincian_harga` text COLLATE utf8mb4_unicode_ci,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('Sortir','Belum Bayar','Sudah Bayar','Disetujui','Dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sortir',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id_survei`, `id_klien`, `jumlah_responden`, `poin`, `bukti`, `nominal`, `judul`, `deskripsi`, `deskripsi_validasi`, `rincian_harga`, `tgl_mulai`, `tgl_selesai`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 100, 5, NULL, NULL, 'PEMOGRAMAN BASIS DATA', 'BASIS DATA MYSQL', NULL, NULL, '2024-05-30', '2024-06-08', 'Sortir', '2024-05-30 07:46:35', '2024-05-30 07:46:35'),
(7, 3, 100, 5, NULL, NULL, 'PEMOGRAMAN BERBASIS OBJEK', 'PHP', NULL, NULL, '2024-05-30', '2024-06-08', 'Sortir', '2024-05-30 08:27:11', '2024-05-30 08:27:11');

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
  ADD KEY `hasil_survei_id_pertanyaan_foreign` (`id_pertanyaan`),
  ADD KEY `hasil_survei_id_responden_foreign` (`id_responden`);

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
  MODIFY `id_admin` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil_survei`
--
ALTER TABLE `hasil_survei`
  MODIFY `id_hasil` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_pertanyaan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id_responden` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id_survei` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `hasil_survei_id_pertanyaan_foreign` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_survei_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE;

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
