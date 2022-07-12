-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2022 pada 10.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'sdada', 'sadadad\r\nafa\r\nfa\r\nd\r\nad\r\nasdasda\r\nsdasdasd\r\nasdsada\r\nsdasdad\r\nsadada', 'public/berita/219vAhe1M6t0rmFUglkiem9BlW2cfmeW3rqfynbk.png', '2022-04-05 08:07:52', '2022-04-05 08:07:52'),
(3, 'sdadaas', 'asdadadadasdasdad\r\nadsadadad\r\nasdadssa\r\ndadsad\r\nasdasda\r\nsdadadas', 'public/berita/VgedcstXdaHoWcWy3QcX2BwIwdH3omKMAniAZ5XP.png', '2022-04-05 08:36:15', '2022-04-05 08:36:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_01_135616_pajak', 1);

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
-- Struktur dari tabel `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transpajaks`
--

CREATE TABLE `transpajaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nopajak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` int(10) NOT NULL,
  `donor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Luas` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_jual` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transpajaks`
--

INSERT INTO `transpajaks` (`id`, `transaction_id`, `nopajak`, `userid`, `donor_name`, `donor_email`, `donation_type`, `Luas`, `nilai_jual`, `amount`, `note`, `status`, `snap_token`, `created_at`, `updated_at`) VALUES
(11, '9ac8135b-bb81-4782-b84c-7cf052f21009', '0123901231231', 1, 'randi', 'randibm12@gmail.com', 'Pajak Bumi', '200', '5000000', '1000000.00', NULL, 'success', 'd86bab00-c479-4a4b-9a66-2d81c9aea848', '2022-04-04 07:33:33', '2022-04-04 07:33:34'),
(12, '07c2999d-3053-4614-b1af-df43199c1fbc', '0123901231231', 1, 'randi', 'randibm12@gmail.com', 'Pajak Bumi', '200', '5000000', '1000000.00', NULL, 'success', '9d8d6413-1a17-48e3-a72e-ee28c893db0e', '2022-04-04 07:34:46', '2022-04-04 07:34:47'),
(13, '877418ec-ecf1-4874-90e8-4c6c97cf8a5c', '0123901231231', 1, 'randi', 'randibm12@gmail.com', 'Pajak Bumi', '200', '5000000', '1000000.00', NULL, 'pending', 'f36d5afd-eeac-4296-a65b-358d36a1bda1', '2022-04-04 07:37:13', '2022-04-04 07:37:14'),
(14, '079fe8db-300e-4ce6-a043-8a62a6f76220', '0123901231231', 1, 'randi', 'randibm12@gmail.com', 'Pajak Bumi', '200', '5000000', '1000000.00', NULL, 'pending', 'e9a65f13-979c-47e7-819d-33c7c2b1bb26', '2022-04-04 07:54:05', '2022-04-04 07:54:06'),
(15, '5309a030-43e8-4e14-acdf-1f51c74ca343', '0123901231231', 1, 'randi', 'randibm12@gmail.com', 'Pajak Bumi', '200', '5000000', '1000000.00', NULL, 'pending', 'f46254ca-f7ae-42ae-8dd1-e46ff569e8bc', '2022-04-04 07:57:09', '2022-04-04 07:57:10'),
(16, '29c9afee-d161-4362-aeb2-709742fec4a7', '0123901231231', 1, 'randi', 'randibm12@gmail.com', 'Pajak Bumi', '200', '5000000', '1000000.00', NULL, 'pending', 'd30d9fe2-e5cc-4ba6-aa23-c1a663da4447', '2022-04-04 07:57:58', '2022-04-04 07:57:59');

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
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'randi', 'randibm12@gmail.com', NULL, '$2y$10$rhNU7AfAld1MMEzKyANwlOlla7c0WYFIDtX7ZJkcxMkPr5.MbBzy.', NULL, 'user', '2022-04-03 05:23:57', '2022-04-03 05:23:57'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$gr6xzNcVgOm030jOGUNyie0PuYqcrbg5HisykcSj/aNM9usjUCp4W', NULL, 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transpajaks`
--
ALTER TABLE `transpajaks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donasis_transaction_id_unique` (`transaction_id`);

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
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transpajaks`
--
ALTER TABLE `transpajaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
