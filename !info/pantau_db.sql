-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Apr 2020 pada 12.48
-- Versi server: 10.3.17-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panteng_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendatang`
--

CREATE TABLE `pendatang` (
  `id` bigint(20) NOT NULL,
  `sender_fname` varchar(250) DEFAULT NULL,
  `sender_nname` varchar(250) DEFAULT NULL,
  `sender_nik` varchar(250) DEFAULT NULL,
  `sender_address` varchar(250) DEFAULT NULL,
  `sender_phone` varchar(250) DEFAULT NULL,
  `object_fname` varchar(250) DEFAULT NULL,
  `object_nname` varchar(250) DEFAULT NULL,
  `object_nik` varchar(250) DEFAULT NULL,
  `object_umur` varchar(250) DEFAULT NULL,
  `object_alasal` varchar(250) DEFAULT NULL,
  `object_kerja` varchar(250) DEFAULT NULL,
  `object_alkerja` varchar(250) DEFAULT NULL,
  `object_nope` varchar(250) DEFAULT NULL,
  `object_jumlah` varchar(250) DEFAULT NULL,
  `note_asal` varchar(250) DEFAULT NULL,
  `note_branglok` varchar(250) DEFAULT NULL,
  `note_brangwak` varchar(250) DEFAULT NULL,
  `note_singgah` varchar(250) DEFAULT NULL,
  `note_tiba` varchar(250) DEFAULT NULL,
  `note_moda` varchar(250) DEFAULT NULL,
  `note_tinggal` varchar(250) DEFAULT NULL,
  `note_tempat` varchar(250) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendatang`
--

INSERT INTO `pendatang` (`id`, `sender_fname`, `sender_nname`, `sender_nik`, `sender_address`, `sender_phone`, `object_fname`, `object_nname`, `object_nik`, `object_umur`, `object_alasal`, `object_kerja`, `object_alkerja`, `object_nope`, `object_jumlah`, `note_asal`, `note_branglok`, `note_brangwak`, `note_singgah`, `note_tiba`, `note_moda`, `note_tinggal`, `note_tempat`, `ip`, `status`, `created_at`, `updated_at`) VALUES
(3, 'informan', 'man', '1234567890123456', 'alamat inform', '081333333333', 'nama lengkap', 'panggil', '9876543210123456', '37', 'kota asal', 'kerja', NULL, '0888888888', '2', 'kota surabaya', 'terminal bungur', '7.00', 'malang', '12.00', 'bus', 'dusun', '2', '::1', 0, '2020-04-01 16:47:26', '2020-04-01 16:47:26'),
(6, 'AGUS RAHARJO', 'AGUS', '3519876755830001', 'JALAN KEMBANG KERTAS 01 PERMATA JINGGA KOTA MALANG', '081234567899', 'ANDI MARWAN', 'ANDI', '3519897690001', '35', 'JAKARTA', 'SWASTA', 'JAKARTA PUSAT', '089123424356', '1', 'JAKARTA', 'TERMINAL PULOGADUNG', '08.00', 'CIREBON, NGAWI', '06.00', 'BIS MALAM', 'JALAN CANDI 8 MALANG', 'RUMAH ORANG TUA', '202.80.216.103', 0, '2020-04-10 20:23:48', '2020-04-10 20:23:48'),
(7, 'ALI MAKSUM', 'ALI', '3519876866097002', 'JALAN KEMBANG KERTAS 02 PERMATA JINGGA KOTA MALANG', '081234567849', 'DWI HARIYADI', 'DWI', '3519876785675003', '40', 'JAKARTA SELATAN', 'KARYAWAN', 'PASAR MINGGU', '082342543577', '2', 'JAKARTA', 'TERMINAL PASAR MINGGU', '07.00', 'SEMARANG', '10.00', 'TRAVEL', 'KOTA MALANG', 'RUMAH ORANG TUA', '202.80.216.103', 0, '2020-04-10 20:35:01', '2020-04-10 20:35:01'),
(8, 'SSDAA', 'AAA', 'aafa', 'AF', 'fafafaf', 'AFF', 'AFFF', 'ffa', '34', 'DDSF', 'CXV', 'CXC', 'xvvv', '3', 'SADA', 'SAS', 'add', 'SASA', '09.00', 'ZCZC', 'DF', 'RUMAH ORANG TUA', '36.85.50.66', 0, '2020-04-11 01:03:18', '2020-04-11 01:03:18'),
(9, 'SADSA', 'SADSA', '324234-323___-____', '2332', '0324 3232 323', 'EWREW', 'EWREW', '436565-656565-6665', '43', '434', '4354', '434', '0434 3434 43', '1', '434', '434', '2020/03/12 00:15', '344', '2020/04/08 08:56', '434', '434', '', '140.0.70.149', 0, '2020-04-13 13:00:30', '2020-04-13 13:00:30'),
(10, 'ALI MAKSUM', 'ALI', '351987-686609-7002', 'JALAN KEMBANG KERTAS 02 PERMATA JINGGA KOTA MALANG', '0812 3456 7849', 'HJFD', 'FKJSDF', '523534-634634-6745', '35', 'GFGDF', 'GRG', 'GDF', '0843 6534 647', '2', 'JAKARTA', 'TERMINAL', '2020/04/02 10:38', 'CFG', '2020/04/04 10:38', 'BIS', 'FEDF', 'RUMAH ORANG TUA', '202.80.216.103', 0, '2020-04-13 14:49:23', '2020-04-13 14:49:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombongan`
--

CREATE TABLE `rombongan` (
  `id` bigint(20) NOT NULL,
  `id_pendatang` bigint(20) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `umur` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `kes1` int(1) NOT NULL DEFAULT 0,
  `kes2` int(1) NOT NULL DEFAULT 0,
  `kes3` int(1) NOT NULL DEFAULT 0,
  `kes4` int(1) NOT NULL DEFAULT 0,
  `kes5` int(1) NOT NULL DEFAULT 0,
  `kes6` int(1) NOT NULL DEFAULT 0,
  `kes7` int(1) NOT NULL DEFAULT 0,
  `kes8` int(1) NOT NULL DEFAULT 0,
  `kes9` int(1) NOT NULL DEFAULT 0,
  `sakit` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rombongan`
--

INSERT INTO `rombongan` (`id`, `id_pendatang`, `nama`, `umur`, `status`, `kes1`, `kes2`, `kes3`, `kes4`, `kes5`, `kes6`, `kes7`, `kes8`, `kes9`, `sakit`) VALUES
(5, 6, 'ANDI MARWAN', '35', 'KEPALA', 1, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(6, 7, 'DWI HARIYADI', '40', 'KETUA', 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(7, 7, 'ALI MUNAWAR', '26', 'ANGGOTA', 0, 1, 0, 1, 0, 0, 0, 0, 0, ''),
(8, 8, 'DSDD', '12', 'ASSA', 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(9, 8, 'WWQW', '13', 'AS', 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(10, 8, 'SSS', '12', 'SDDDDDD', 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(11, 9, 'WWQ', '1', 'WQE', 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(12, 10, 'ANDI MARWAN', '35', 'KETUA', 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(13, 10, 'INDRA BAKTI', '25', 'ANGGOTA', 1, 1, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Spora', 'admin@spora.id', NULL, '$2y$10$FTpnSeSl/R30t0aqOYylDeCTAT3Zw1CoRhG7KzpOs8yiTLuZxHBTm', NULL, '2020-03-30 11:05:28', '2020-03-30 11:05:28'),
(2, 'Admin Spora', 'tamu@spora.id', NULL, '$2y$10$FTpnSeSl/R30t0aqOYylDeCTAT3Zw1CoRhG7KzpOs8yiTLuZxHBTm', NULL, '2020-03-30 11:05:28', '2020-03-30 11:05:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendatang`
--
ALTER TABLE `pendatang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rombongan`
--
ALTER TABLE `rombongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendatang`
--
ALTER TABLE `pendatang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `rombongan`
--
ALTER TABLE `rombongan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
