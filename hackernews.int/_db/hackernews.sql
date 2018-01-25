-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jan 2018 om 19:16
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackernews`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `posted_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `url`, `votes`, `user_id`, `posted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'google!', 'http://www.google.com', -1, 1, 'admin', NULL, '2018-01-25 15:08:38', '2018-01-25 17:14:11'),
(2, 'A link to facebook!', 'http://www.facebook.com', 1, 2, 'test123', NULL, '2018-01-25 15:09:20', '2018-01-25 17:11:07'),
(3, 'outlook', 'https://www.outlook.com', 4, 3, 'test@test.be', NULL, '2018-01-25 15:27:16', '2018-01-25 16:05:19'),
(4, 'test', 'test', 0, 8, 'teste', '2018-01-25 16:17:46', '2018-01-25 16:17:40', '2018-01-25 16:17:46'),
(5, 'test', 'test.be', 0, 8, 'teste', '2018-01-25 16:48:05', '2018-01-25 16:47:12', '2018-01-25 16:48:05'),
(6, 'test', 'test', 0, 8, 'teste', '2018-01-25 17:10:21', '2018-01-25 16:49:30', '2018-01-25 17:10:21'),
(7, 'test2', 'test1232131', 0, 8, 'teste', '2018-01-25 16:59:38', '2018-01-25 16:50:01', '2018-01-25 16:59:38'),
(8, 'test', '123', 0, 8, 'teste', '2018-01-25 16:57:56', '2018-01-25 16:50:36', '2018-01-25 16:57:56'),
(9, 'test123', 'te2132132132131', 0, 8, 'teste', '2018-01-25 16:57:43', '2018-01-25 16:52:03', '2018-01-25 16:57:43'),
(10, 'nog een test', 'hmmmmmmmm???', 0, 8, 'teste', '2018-01-25 16:54:21', '2018-01-25 16:52:17', '2018-01-25 16:54:21'),
(11, 'test123', 'test', 0, 8, 'teste', '2018-01-25 17:10:25', '2018-01-25 17:00:01', '2018-01-25 17:10:25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `article_comments`
--

CREATE TABLE `article_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `article_comments`
--

INSERT INTO `article_comments` (`id`, `article_id`, `user_id`, `body`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'test comment', NULL, '2018-01-25 15:08:52', '2018-01-25 15:08:52'),
(2, 1, 8, 'test', NULL, '2018-01-25 16:14:58', '2018-01-25 16:14:58'),
(3, 1, 8, '123\r\nedit', NULL, '2018-01-25 16:17:11', '2018-01-25 16:17:29'),
(4, 3, 8, 'Cool toch?', '2018-01-25 17:01:30', '2018-01-25 17:00:45', '2018-01-25 17:01:30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_23_211846_create_article_table', 1),
(4, '2018_01_23_212037_create_article_comments_table', 1),
(5, '2018_01_23_212051_create_votes_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'andre.robbe@student.kdg.be', '$2y$10$Ye/pNtXGc4Jz7qBM0Sa3KO1/.5Gk/c21jubKMa5qd/Jli6ev8q1ZS', 'Znt5rYVamSRGLvRef95wUFLA5myhX27JhtyxJ2cNdivKeEOyLbSBrz0AckMd', '2018-01-25 15:08:29', '2018-01-25 15:08:29'),
(2, 'test123', 'mauritsrobbe@hotmail.com', '$2y$10$XanZmuSDM.ULlv9vsbI8cu845xOuU13J62LVoN4bPCuv8Gv7G2gD6', '1fe7Qab0LOz60LzciduLKdlimTsdQfbLVy4RtzlO4hNpJzytEqj9r51cnX3j', '2018-01-25 15:09:11', '2018-01-25 15:09:11'),
(3, 'test@test.be', 'test@test.be', '$2y$10$vgli4lLpY3CQM6fcxFe5/.y865Z.azn7T/pxNSGeVfiadYfMLpXVO', 'VQVHi8IHOdbmoF04dxxRfaANFEaQtqKedoMLZHAPAZmw110314O4WBit68gp', '2018-01-25 15:12:47', '2018-01-25 15:12:47'),
(4, 'testA', 'testa@testa.com', '$2y$10$yc1I7YMF.5QHl4jlYurBYO6OLMYg9d5SBr7qCuAavmfl7kQD5HaXC', 'JtdKsuvOAiWLfy2xoCebgoowa9bEdp16p18QWTuYNSLUS4GRwgHf3mjrRIXY', '2018-01-25 15:37:05', '2018-01-25 15:37:05'),
(5, 'testB', 'testb@testb.com', '$2y$10$OrBIl1FXXXOiOSoR.6GgeOIDbItCUsJGsBJ5vmJUJwficX1rc/OLy', 'yahqkQF0z4fsHnbOO7hgfJg6NjDQw6V7o4lhFD2qsh9e0t6fACGnDmai77cr', '2018-01-25 15:41:07', '2018-01-25 15:41:07'),
(6, 'testc', 'testc@testc.com', '$2y$10$bh49V/ttCONG/QTnMCdM5.MxdmTEi4gQnfHP7VE8UsvLCy3LoBdqi', 'R7gEqI43EM6eMyfczXbUXwjcNYg1MnbRANjr8pC4nO0wNEC6kSn6vWTHY1RI', '2018-01-25 15:45:07', '2018-01-25 15:45:07'),
(7, 'testd', 'testd@testd.com', '$2y$10$qUbgwsJjcRn73pWHJ0YLdeXSvknYhWrDMTTmeVwRWB5PBm3f6NNu.', 'zxmROsWHm84wUYK83poea6fR4XfpdzXqhZKoJea3BA9s63UMHfm1PzBasSCv', '2018-01-25 15:50:30', '2018-01-25 15:50:30'),
(8, 'teste', 'teste@teste.com', '$2y$10$fsopFsF6s1gdOD2xs13UxeL9TCNhkFTpH72/XMmbagX.af5p0rd2C', '6i4p7EsJIoOgbfbDeuufWFG4GaqFe22GLSDavz46DPz0IqChI8UxhtIcYHjD', '2018-01-25 16:02:00', '2018-01-25 16:02:00'),
(9, 'testf', 'testf@testf.com', '$2y$10$fMykeUVJW4Yg.U89Gj5MJ.6Fsim95yqDePDvnqEVCrmNOre3yliCi', 'BLBwXQwIocKOf44uOpktTAvC7YF0xaUaVjCOMJNwtFhho43DQhRDIma4cYPU', '2018-01-25 17:11:32', '2018-01-25 17:11:32'),
(10, 'testg', 'testg@testg.com', '$2y$10$ufLyh63pjb3HdC.ZMM7oNOJAODHOBmZxUHIbqY1SOyij.tiujkEgS', 'N2pDpg1Dwin84qYnMFbbiGcwA7zhNUznYo46v99NvkBBa2sz1L4bPGo3LfKN', '2018-01-25 17:12:38', '2018-01-25 17:12:38'),
(11, 'testh', 'testh@testh.com', '$2y$10$toDsSPVna0F.RMTstEYN/u7wLFGX2QyQfNPl8lzVc8byAyZYaPQpi', NULL, '2018-01-25 17:14:09', '2018-01-25 17:14:09');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `votes`
--

CREATE TABLE `votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `votes`
--

INSERT INTO `votes` (`id`, `article_id`, `user_id`, `votes`, `created_at`, `updated_at`) VALUES
(1, 1, 2, -1, '2018-01-25 15:10:10', '2018-01-25 15:10:10'),
(2, 1, 3, 1, '2018-01-25 15:12:50', '2018-01-25 15:12:50'),
(3, 2, 3, 1, '2018-01-25 15:12:54', '2018-01-25 15:12:54'),
(4, 3, 1, 1, '2018-01-25 15:29:01', '2018-01-25 15:29:28'),
(5, 2, 1, 1, '2018-01-25 15:31:15', '2018-01-25 15:31:27'),
(6, 3, 2, 1, '2018-01-25 15:36:24', '2018-01-25 15:36:24'),
(7, 1, 4, 1, '2018-01-25 15:37:08', '2018-01-25 15:37:08'),
(8, 2, 4, 1, '2018-01-25 15:37:20', '2018-01-25 15:37:20'),
(9, 3, 4, 1, '2018-01-25 15:37:23', '2018-01-25 15:37:23'),
(10, 1, 5, 1, '2018-01-25 15:41:10', '2018-01-25 15:41:10'),
(11, 2, 5, 1, '2018-01-25 15:42:44', '2018-01-25 15:42:44'),
(12, 3, 5, 1, '2018-01-25 15:42:46', '2018-01-25 15:42:46'),
(13, 1, 6, -1, '2018-01-25 15:45:09', '2018-01-25 15:47:06'),
(14, 2, 6, -1, '2018-01-25 15:45:16', '2018-01-25 15:47:08'),
(15, 1, 7, 1, '2018-01-25 15:50:39', '2018-01-25 15:59:02'),
(16, 3, 7, 1, '2018-01-25 15:52:56', '2018-01-25 16:01:38'),
(17, 1, 8, -1, '2018-01-25 16:02:02', '2018-01-25 17:11:12'),
(18, 2, 8, 0, '2018-01-25 16:02:17', '2018-01-25 17:11:07'),
(19, 3, 8, 0, '2018-01-25 16:03:05', '2018-01-25 16:05:19'),
(20, 1, 9, 0, '2018-01-25 17:11:34', '2018-01-25 17:12:14'),
(21, 1, 10, 0, '2018-01-25 17:12:40', '2018-01-25 17:13:56'),
(22, 1, 11, -1, '2018-01-25 17:14:11', '2018-01-25 17:14:11');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `article_comments`
--
ALTER TABLE `article_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_comments_article_id_index` (`article_id`),
  ADD KEY `article_comments_user_id_index` (`user_id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexen voor tabel `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `article_comments`
--
ALTER TABLE `article_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
