-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 mars 2023 à 23:29
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `prenom`, `nom`, `email`, `adresse`, `codePostal`, `ville`, `pays`, `website`, `tel`, `logo`, `id_user`, `created_at`, `updated_at`) VALUES
(4, 'Yassine', 'Achouyne', 'yachouyne@gmail.com', 'Safi', '20160', 'Safi', 'MA', NULL, '+212620858128', 'logo-2023-03-09-061539pm.jpg', 1, '2023-03-08 08:10:00', '2023-03-10 09:36:52'),
(8, 'Yassine', 'Achouyne', 'yassine.achouyne2022@gmail.com', 'Safi', '20160', 'Safi', 'MA', NULL, '+212620858128', 'logo-2023-03-09-061539pm.jpg', 2, '2023-03-08 12:48:21', '2023-03-08 13:27:27'),
(10, 'Yassine', 'Achouyne', 'yassine.achouyne2022@gmail.com', 'Safi', '20160', 'Safi', 'MA', 'https://yassineachouyne.me/', '+212620858128', 'logo-2023-03-09-061539pm.jpg', 4, '2023-03-09 17:15:39', '2023-03-09 17:15:39'),
(11, 'Yassine', 'Achouyne', 'yachouyne@gmail.com', 'Safi', '20160', 'Safi', 'MA', NULL, '+212620858128', 'logo-2023-03-11-040312pm.png', 1, '2023-03-11 15:03:12', '2023-03-11 15:03:12'),
(12, 'radi', 'radi', 'rada@gmail.com', 'tanger', '105846', 'tanger', 'MA', NULL, '+212 6851248525', 'logo-2023-03-12-022311pm.png', 1, '2023-03-12 13:23:12', '2023-03-12 13:23:12'),
(13, 'Yassine', 'Achouyne', 'yassine.achouyne2022@gmail.com', 'Marrakech', '46000', 'Safi', 'MA', NULL, '+212620858128', 'logo-2023-03-13-093110am.png', 5, '2023-03-13 08:31:11', '2023-03-13 08:31:11');

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
  `nbr_facture` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_facture`),
  KEY `factures_id_client_foreign` (`id_client`),
  KEY `factures_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id_facture`, `id_client`, `dateEmission`, `dateFin`, `quantite`, `prixHT`, `tva`, `Description`, `modePayment`, `id_user`, `statut`, `nbr_facture`, `created_at`, `updated_at`) VALUES
(16, 13, '2023-03-13', '2023-04-12', 0, 0, 0, NULL, 'Espèces', 5, 'nonpayer', 3, '2023-03-13 11:44:02', '2023-03-13 11:44:02'),
(15, 13, '2023-03-13', '2023-04-12', 5, 150, 20, NULL, 'Espèces', 5, 'payer', 2, '2023-03-13 09:41:06', '2023-03-13 10:37:47');

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
-- Structure de la table `form_jiridiques`
--

DROP TABLE IF EXISTS `form_jiridiques`;
CREATE TABLE IF NOT EXISTS `form_jiridiques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomSociete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codePostal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RC` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IF` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnss` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ICF` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `form_jiridiques`
--

INSERT INTO `form_jiridiques` (`id`, `nomSociete`, `adresse`, `codePostal`, `ville`, `pays`, `website`, `RC`, `IF`, `patent`, `cnss`, `ICF`, `fax`, `logo`, `created_at`, `updated_at`) VALUES
(10, 'Yassine Achouyne', 'Safi', '20160', 'Safi', 'MA', 'https://yassineachouyne.me/', '123456', '123456', '123456', '123456', '123456', '+212620858128', 'logo-2023-03-13-112147pm.png', '2023-03-13 21:17:09', '2023-03-13 22:21:47');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2023_03_08_093753_create_factures_table', 3),
(10, '2023_03_13_211955_create_form_jiridiques_table', 4);

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
  `nbr_facture` int(11) NOT NULL DEFAULT '0',
  `societe` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `email_verified_at`, `password`, `adresse`, `avatar`, `nbr_facture`, `societe`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Yassine Achouyne', 'yassine.achouyne2022@gmail.com', '+212620858128', NULL, '$2y$10$d8pj6igwgi9CoGt3cMKDD.AotBukYLZ2dXTnLUT0/BY55quEbeb7u', 'test', 'undraw_profile.svg', 0, 0, NULL, '2023-03-13 22:28:12', '2023-03-13 22:28:12'),
(10, 'Yassine Achouyne', 'yachouyne@gmail.com', '+212620858128', NULL, '$2y$10$lnvgAUj1FPqu.5wDyY8dGuvCcAIFEmlKb31r4fL0VtLs.LZJaLaPe', 'tanger', 'undraw_profile.svg', 0, 1, NULL, '2023-03-13 21:15:34', '2023-03-13 21:15:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
