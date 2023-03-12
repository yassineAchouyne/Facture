-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 12 mars 2023 à 23:39
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `system_factures`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codePostal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  KEY `clients_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `prenom`, `nom`, `email`, `adresse`, `codePostal`, `ville`, `pays`, `website`, `tel`, `logo`, `id_user`, `created_at`, `updated_at`) VALUES
(4, 'Yassine', 'Achouyne', 'yachouyne@gmail.com', 'Safi', '20160', 'Safi', 'MA', NULL, '+212620858128', 'logo-2023-03-09-061539pm.jpg', 1, '2023-03-08 08:10:00', '2023-03-10 09:36:52'),
(8, 'Yassine', 'Achouyne', 'yassine.achouyne2022@gmail.com', 'Safi', '20160', 'Safi', 'MA', NULL, '+212620858128', 'logo-2023-03-09-061539pm.jpg', 2, '2023-03-08 12:48:21', '2023-03-08 13:27:27'),
(10, 'Yassine', 'Achouyne', 'yassine.achouyne2022@gmail.com', 'Safi', '20160', 'Safi', 'MA', 'https://yassineachouyne.me/', '+212620858128', 'logo-2023-03-09-061539pm.jpg', 4, '2023-03-09 17:15:39', '2023-03-09 17:15:39'),
(11, 'Yassine', 'Achouyne', 'yachouyne@gmail.com', 'Safi', '20160', 'Safi', 'MA', NULL, '+212620858128', 'logo-2023-03-11-040312pm.png', 1, '2023-03-11 15:03:12', '2023-03-11 15:03:12'),
(12, 'radi', 'radi', 'rada@gmail.com', 'tanger', '105846', 'tanger', 'MA', NULL, '+212 6851248525', 'logo-2023-03-12-022311pm.png', 1, '2023-03-12 13:23:12', '2023-03-12 13:23:12');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id_facture` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `dateEmission` date NOT NULL,
  `dateFin` date NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixHT` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `Description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modePayment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `statut` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'nonpayer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_facture`),
  KEY `factures_id_client_foreign` (`id_client`),
  KEY `factures_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id_facture`, `id_client`, `dateEmission`, `dateFin`, `quantite`, `prixHT`, `tva`, `Description`, `modePayment`, `id_user`, `statut`, `created_at`, `updated_at`) VALUES
(1, 8, '2023-03-08', '2023-03-07', 5, 10, 20, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'Espèces', 2, 'payer', '2023-03-08 13:24:19', '2023-03-08 13:24:19'),
(5, 9, '2023-03-08', '2023-04-07', 10, 5, 15, NULL, 'PayPal', 3, 'nonpayer', '2023-03-08 22:42:24', '2023-03-08 22:43:05'),
(10, 4, '2023-03-10', '2023-04-09', 10, 5, 10, NULL, 'Espèces', 1, 'payer', '2023-03-10 11:07:45', '2023-03-10 11:35:06'),
(6, 10, '2023-03-09', '2023-04-08', 0, 0, 0, 'test', 'Espèces', 4, 'nonpayer', '2023-03-09 19:11:57', '2023-03-09 19:11:57'),
(9, 4, '2023-03-10', '2023-03-01', 10, 50, 10, NULL, 'Espèces', 1, 'nonpayer', '2023-03-10 09:34:35', '2023-03-10 09:34:35'),
(11, 4, '2023-03-10', '2023-04-09', 11, 150, 0, NULL, 'Espèces', 1, 'nonpayer', '2023-03-10 12:37:42', '2023-03-10 12:37:42'),
(12, 12, '2023-03-12', '2023-04-11', 2, 200, 5, NULL, 'Espèces', 1, 'nonpayer', '2023-03-12 13:23:55', '2023-03-12 13:23:55');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_03_07_112449_create_clients_table', 2),
(9, '2023_03_08_093753_create_factures_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('yachouyne@gmail.com', '$2y$10$yWGu99njHSk/eyd0qYNfVuaQrN2974Y37enmMxWztHGuV/kS4Szku', '2023-03-07 08:47:35');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'undraw_profile.svg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `email_verified_at`, `password`, `adresse`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yassine Achouyne', 'yachouyne@gmail.com', '+212620858128', NULL, '$2y$10$lT9b/hEXpTKhfp0YMIS21.rCbGR3/HkC89U5cRtcAdcScxCd9WhTi', 'Safi', 'avatar-1-2023-03-09-033124pm.jpg', 'eMuO8eZhPI3YG4ARSq3GM4BvUnw4uKBq6UT8Hpp4X2Do2pqkuwH6wVSrnrBS', '2023-03-06 11:58:40', '2023-03-11 11:36:13'),
(2, 'REDOUANE ACHOUYNE', 'yassine.achouyne2022@gmail.com', '', NULL, '$2y$10$kfDld/HMuHa8328mkg5pJOR5YFuTMTFGEED1Y4au2p7QCK/Nv4fym', 'tanger', 'undraw_profile.svg	', NULL, '2023-03-06 15:24:42', '2023-03-06 15:24:42'),
(3, 'TAHA WAHAB', '19xmax2005@gmai.com', '+212620858128', NULL, '$2y$10$Z0/VKoC0JduqVShU9kjAx.rPyUPRPcKvLAfy0jKQHwCiqEnoRHFqO', 'casa blanca', 'undraw_profile.svg	', NULL, '2023-03-08 22:40:29', '2023-03-09 12:01:29'),
(4, 'adil achouyne', 'adil@gmail.com', '+212625842113', NULL, '$2y$10$.WXO8aV7ieQH0qkzNPxu2.IX9HFB0hrIeAtFd7/24S0ikm2q72HHS', 'safi', 'avatar-4-2023-03-09-060105pm.jpg', NULL, '2023-03-09 16:58:09', '2023-03-09 17:01:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
