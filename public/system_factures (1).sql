-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 mars 2023 à 15:04
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
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  KEY `clients_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `prenom`, `nom`, `email`, `adresse`, `codePostal`, `ville`, `pays`, `website`, `tel`, `id_user`, `created_at`, `updated_at`) VALUES
(28, 'Kihn', 'Jennings', 'krajcik.ofelia@yahoo.com', '9321 Tania Drives Suite 131\nHattieside, OH 12379', '54808-0875', 'Micahfort', 'Cayman Islands', NULL, '(520) 875-3018', 12, NULL, NULL),
(27, 'Leannon', 'Edgardo', 'satterfield.nona@yahoo.com', '3021 Anne Field Apt. 246\nKuhlmantown, CT 62426', '62819-9001', 'North Marcelinomouth', 'Mongolia', NULL, '+1.310.568.0024', 14, NULL, NULL),
(26, 'Pollich', 'Camren', 'wisoky.candice@wilkinson.com', '32726 McKenzie Harbor Apt. 440\nEast Candelarioside, AL 84142-3478', '36768-8291', 'Grimesborough', 'Namibia', NULL, '704-790-8330', 13, NULL, NULL),
(25, 'Schaden', 'Kattie', 'pasquale.jacobi@yahoo.com', '3810 Ken Lights\nLake Cielohaven, CT 46710-1921', '27337', 'New Berneicefort', 'United Kingdom', NULL, '1-878-521-9937', 14, NULL, NULL),
(24, 'Grimes', 'Alberta', 'lind.reed@gmail.com', '701 Schinner Land Apt. 252\nLednerton, NH 46505-8047', '96945-8507', 'Fosterstad', 'Peru', NULL, '+1-385-951-9198', 14, NULL, NULL),
(23, 'Hackett', 'Rosalinda', 'billie88@hotmail.com', '16920 Rolfson Track Suite 887\nReeceborough, WI 28549-6637', '66832', 'Arvidside', 'Belgium', NULL, '704.705.5262', 15, NULL, NULL),
(22, 'Satterfield', 'Kameron', 'mozell.hirthe@reichel.biz', '545 Ryleigh Vista\nArjunside, ND 17916', '43306', 'Dakotaborough', 'Chad', NULL, '1-510-746-6476', 15, NULL, NULL),
(29, 'Gleason', 'Gladys', 'goyette.sienna@zboncak.com', '136 Cesar Plaza Suite 461\nNew Durwardville, AL 37022', '45862-3207', 'East Enriquestad', 'Dominican Republic', NULL, '1-563-524-2139', 13, NULL, NULL),
(30, 'Kuhic', 'Cathy', 'katarina17@schoen.info', '303 Rodriguez Mountain\nMarisabury, RI 09811', '13004-2018', 'Danefurt', 'Mauritania', NULL, '+14233330809', 13, NULL, NULL),
(31, 'Pouros', 'Lukas', 'douglas.chadd@collins.com', '660 Monserrate Lane\nMosestad, WA 33473', '97322-9302', 'North Wilfredohaven', 'Norfolk Island', NULL, '820-247-1785', 15, NULL, NULL),
(32, 'McGlynn', 'Regan', 'suzanne.hirthe@douglas.com', '926 Hessel Isle\nWest Yadira, GA 90007-6264', '64898', 'East Benniefort', 'Lebanon', NULL, '(240) 940-8005', 10, NULL, NULL),
(33, 'Heidenreich', 'Uriah', 'akassulke@wolf.com', '6910 Oliver Forks Suite 356\nAdelbertland, IA 75668', '33506-9476', 'West Macie', 'Mauritius', NULL, '1-757-649-6165', 13, NULL, NULL),
(34, 'Kozey', 'Dayton', 'hackett.jarred@yahoo.com', '64583 Shanel Creek\nSouth Roy, NE 51206-2698', '56324-2391', 'Dickinsonmouth', 'Tajikistan', NULL, '+1-404-595-9491', 10, NULL, NULL),
(35, 'Reinger', 'Ayla', 'watson59@shanahan.com', '2377 Zboncak Port Apt. 747\nPort Calebside, CO 96132', '25997-5760', 'Franeckifurt', 'Myanmar', NULL, '808-894-6363', 15, NULL, NULL),
(36, 'Kutch', 'Jaunita', 'delores12@hotmail.com', '97316 Kerluke Canyon Apt. 620\nEast Karolannburgh, ME 02100', '76872', 'South Amarahaven', 'Isle of Man', NULL, '815.975.9463', 10, NULL, NULL),
(37, 'Mayer', 'Shanie', 'george32@hotmail.com', '732 Carolina Center\nLake Daphneybury, AR 27568-1282', '19356', 'Smithambury', 'Guam', NULL, '+1.240.491.8118', 11, NULL, NULL),
(38, 'Harvey', 'Daniella', 'mattie05@hickle.com', '91238 Wintheiser Plaza\nLake Louiehaven, MN 14421-7010', '51007-3269', 'East Tayafurt', 'Poland', NULL, '+1-601-513-8316', 12, NULL, NULL),
(39, 'Oberbrunner', 'Jasper', 'ojaskolski@yahoo.com', '89706 Tristian Hill\nBoehmhaven, WI 85459-7215', '17202', 'Joellestad', 'Seychelles', NULL, '210-663-3797', 11, NULL, NULL),
(40, 'Rice', 'Isabelle', 'malika02@yahoo.com', '26699 Ondricka Walks\nSamanthatown, MT 09339-8977', '37258', 'New Garfieldport', 'Tokelau', NULL, '820-322-6861', 12, NULL, NULL),
(41, 'Hane', 'Sanford', 'joesph.rowe@weber.com', '644 Carley Harbors Suite 578\nEast Mosemouth, WY 67531', '09528', 'Bernardmouth', 'South Africa', NULL, '534-304-0506', 15, NULL, NULL),
(42, 'Toy', 'Zita', 'zachariah.zulauf@hotmail.com', '5371 Bogisich Gateway\nEast Nicolas, RI 67107-6481', '11954-8021', 'Nikolaushaven', 'United Kingdom', NULL, '689-431-6815', 15, NULL, NULL),
(43, 'Bins', 'Johnnie', 'roel.greenfelder@yahoo.com', '55365 Jada Mission\nWest Jenastad, NM 79334-9390', '41024-1985', 'West Alycehaven', 'Jamaica', NULL, '608-241-8701', 11, NULL, NULL),
(44, 'Armstrong', 'Jada', 'schneider.francesca@lockman.com', '5184 Janie Key Apt. 816\nNorth Rosaleestad, NM 02322', '66549', 'Lake Brandt', 'Namibia', NULL, '+1 (870) 905-7272', 13, NULL, NULL),
(45, 'Bartell', 'Deron', 'qorn@reynolds.org', '5734 Kayleigh Row Suite 416\nBoylefurt, PA 89401', '00369', 'Anissafurt', 'Qatar', NULL, '1-678-242-3382', 14, NULL, NULL),
(46, 'Schmeler', 'Delmer', 'rigoberto97@gmail.com', '436 D\'Amore Mills\nSalmatown, DE 72183-2658', '71409', 'Brakusshire', 'Trinidad and Tobago', NULL, '+1-760-697-8696', 14, NULL, NULL),
(47, 'Fadel', 'Kyra', 'jonathan07@gmail.com', '8834 Elias Fort Suite 368\nSouth Brendon, MT 96360-8409', '71016', 'New Sheridan', 'Haiti', NULL, '1-214-772-7593', 12, NULL, NULL),
(48, 'Jacobs', 'Gerard', 'carroll.leann@mcglynn.com', '16283 Laurie Manors\nPort Roslyn, NH 73265', '89140-7395', 'Tracefurt', 'Romania', NULL, '+1.203.670.5231', 15, NULL, NULL),
(49, 'Bartoletti', 'Barbara', 'wilma87@quigley.com', '8741 Boyle Alley Apt. 922\nNew Destiniburgh, HI 16515-3652', '10280-4655', 'Caylaville', 'Afghanistan', NULL, '(305) 788-2968', 13, NULL, NULL),
(50, 'Goyette', 'Hector', 'erna69@abshire.biz', '56686 Carroll Meadow\nWest Carissa, CT 83799', '44975-8378', 'South Cletashire', 'Guatemala', NULL, '530-617-0459', 11, NULL, NULL),
(51, 'Mante', 'Dulce', 'sipes.garret@gmail.com', '145 Dare Shoals\nBoehmberg, CO 87352-9728', '09685', 'Lake Danny', 'Sri Lanka', NULL, '(463) 400-7126', 11, NULL, NULL),
(52, 'Leffler', 'Karlee', 'gutkowski.aric@hotmail.com', '207 Damaris Knolls\nEast Aleenstad, WV 06110-9544', '56506-2217', 'Rennerstad', 'Timor-Leste', NULL, '+1-425-998-5175', 10, NULL, NULL),
(53, 'Altenwerth', 'Eleanore', 'kiera.huel@wunsch.com', '495 Kyleigh Rapid Suite 340\nNoreneport, NE 03120', '84181-6382', 'Port Yazmin', 'Faroe Islands', NULL, '657.936.6842', 15, NULL, NULL),
(54, 'Lubowitz', 'Hester', 'von.elbert@hotmail.com', '1902 Jillian Underpass\nNew Myahmouth, GA 30587-0392', '72982-3510', 'South Meghan', 'Oman', NULL, '+1-743-308-0393', 12, NULL, NULL),
(55, 'Gaylord', 'Abbigail', 'hill.teresa@lebsack.net', '8197 McClure Wells\nNitzschemouth, ND 99530-1209', '55805', 'South Mireyaport', 'Tanzania', NULL, '760.242.9242', 10, NULL, NULL),
(56, 'Sawayn', 'Lewis', 'gibson.summer@altenwerth.com', '545 Raynor Keys\nWestview, NV 53148', '40949', 'New Janick', 'Tuvalu', NULL, '+1-478-957-3898', 14, NULL, NULL),
(57, 'Price', 'Raheem', 'rebeka75@doyle.com', '42885 Murray Turnpike\nWest Amosberg, OH 29473', '42121-2460', 'West Garthchester', 'Azerbaijan', NULL, '773-816-2343', 15, NULL, NULL),
(58, 'Klein', 'Ozella', 'skyla.zulauf@zulauf.com', '76222 Jarvis Mountains Suite 030\nLake Jermainmouth, VA 51894-2172', '20465', 'Randichester', 'Saint Pierre and Miquelon', NULL, '+1 (646) 340-7236', 11, NULL, NULL),
(59, 'Runte', 'Cruz', 'amparo.steuber@hotmail.com', '7551 Hackett Orchard Apt. 619\nWest Trinity, HI 49289-1146', '17114', 'Port Celestine', 'Angola', NULL, '1-612-257-6695', 12, NULL, NULL),
(60, 'Hill', 'Eugene', 'clarissa.farrell@nolan.com', '2423 Woodrow Turnpike\nHermistonburgh, NC 71232', '86948', 'East Travisstad', 'Lesotho', NULL, '307-784-8445', 10, NULL, NULL),
(61, 'Ondricka', 'Sigmund', 'eerdman@bruen.biz', '16720 McLaughlin Parkways\nSouth Xzavierhaven, OK 46583', '08285', 'Port Naomieville', 'Bulgaria', NULL, '1-586-868-6436', 10, NULL, NULL),
(62, 'Mosciski', 'Theodora', 'zcarroll@jacobi.info', '54560 Elijah Estates Apt. 946\nNorth Joeyberg, AK 69590', '02601-8857', 'Frankieside', 'Madagascar', NULL, '(820) 436-1305', 15, NULL, NULL),
(63, 'Windler', 'Tomasa', 'dziemann@tromp.com', '53883 Efrain Ranch Apt. 087\nBartonside, MI 13245-7003', '61249', 'Lake Eliane', 'Germany', NULL, '+1-920-410-4304', 11, NULL, NULL),
(64, 'Muller', 'Wilford', 'nhagenes@damore.net', '179 Greenholt Glen\nNorth Macyview, VT 19270-5820', '79759', 'Fadelberg', 'Sierra Leone', NULL, '(689) 461-7444', 14, NULL, NULL),
(65, 'Kuhic', 'Asa', 'hoconner@dietrich.com', '4975 Lillian Isle Apt. 860\nWest Khalilstad, MT 88643-9690', '88197-0761', 'Ornbury', 'Burundi', NULL, '+1.914.742.2593', 11, NULL, NULL),
(66, 'Bartoletti', 'Alvis', 'hellen00@johnston.info', '616 Oleta Center Suite 395\nEast Garfield, IL 85826', '91413', 'Lake Alexandromouth', 'Tunisia', NULL, '763.995.1021', 10, NULL, NULL),
(67, 'Jerde', 'Ethan', 'paul26@hagenes.net', '77220 Pfeffer Hollow Apt. 020\nPort Aglae, MD 50987-8248', '68845', 'Hickleside', 'Antigua and Barbuda', NULL, '+18207795101', 10, NULL, NULL),
(68, 'Spencer', 'Easter', 'hills.glenna@adams.com', '3875 Mia Wall Suite 958\nWest Jocelynstad, CA 18333', '82221-5993', 'Burnicefurt', 'Barbados', NULL, '843-533-9722', 10, NULL, NULL),
(69, 'Kihn', 'Henry', 'pacocha.mallory@hotmail.com', '159 Abbigail Dale\nNew Elmofort, IN 85622-9674', '75902', 'West Pattiefort', 'Cook Islands', NULL, '832-975-1305', 10, NULL, NULL),
(70, 'Hagenes', 'Rosalind', 'iblanda@hotmail.com', '355 Blaze Causeway Suite 608\nReynoldstown, MO 69365-2199', '01598-2676', 'East Sheafort', 'Palestinian Territories', NULL, '+19048833914', 10, NULL, NULL),
(71, 'Pacocha', 'Raven', 'wiley97@howe.info', '4739 Thompson Roads\nTownefort, CA 35592', '75455', 'North Raven', 'Timor-Leste', NULL, '+1.903.824.5831', 10, NULL, NULL),
(72, 'Armstrong', 'Korey', 'qmclaughlin@yahoo.com', '9545 Dalton Ways\nSouth Bart, KY 39686', '39172', 'East Americoburgh', 'Korea', NULL, '703-493-3389', 10, NULL, NULL),
(73, 'Marks', 'Colin', 'hailey.ledner@bogan.com', '86278 Amy Plains Apt. 170\nJenkinsfort, NC 72864', '37616', 'Lake Deshawnburgh', 'United Arab Emirates', NULL, '929.404.2685', 10, NULL, NULL),
(74, 'Davis', 'Laurie', 'kutch.savannah@hotmail.com', '215 Glover Isle\nQuigleychester, NH 52964', '70001-8384', 'West Gail', 'Slovakia (Slovak Republic)', NULL, '+16809746576', 10, NULL, NULL),
(75, 'Simonis', 'Jordan', 'liliane10@shields.com', '28228 Darion Road\nLake Thurman, ME 71424-9449', '37232-5038', 'Port Tatumton', 'Syrian Arab Republic', NULL, '+1 (351) 376-7738', 10, NULL, NULL),
(76, 'D\'Amore', 'Brigitte', 'orville41@gmail.com', '2510 Hoeger Parkway Apt. 912\nMonahanfort, CA 07592', '35967-0867', 'Lindgrenton', 'Germany', NULL, '+1.231.319.1175', 10, NULL, NULL),
(77, 'Paucek', 'Edward', 'agustin.okeefe@yahoo.com', '1038 Daniella Cliffs\nPort Ernestside, WY 34248', '93771-5191', 'New Viviane', 'Brunei Darussalam', NULL, '351.359.4616', 10, NULL, NULL),
(78, 'Gislason', 'Jerrell', 'sherwood.kemmer@reichel.com', '76412 Becker Courts\nCrooksburgh, MI 33169', '85079-3903', 'Caliview', 'Svalbard & Jan Mayen Islands', NULL, '870.707.4974', 10, NULL, NULL),
(79, 'Cruickshank', 'Kasey', 'kaylie53@huel.org', '4631 Malika Hills\nLudieshire, FL 38608', '74468-6900', 'East Raymond', 'Cayman Islands', NULL, '+1-848-675-9994', 10, NULL, NULL),
(80, 'Nader', 'Sophia', 'vincenza.wyman@haley.org', '6387 Katelin Square\nEast Avaburgh, CA 48155-7883', '73695-0989', 'Boscoton', 'Nauru', NULL, '+1.220.959.6350', 10, NULL, NULL),
(81, 'Metz', 'Kaela', 'hollis.leannon@langosh.com', '3499 Matilda Lake Apt. 763\nCasperberg, WI 56676', '24779', 'East Alanna', 'Montenegro', NULL, '+1-580-434-3252', 10, NULL, NULL),
(82, 'Wolff', 'Rodolfo', 'will.bill@hirthe.org', '623 Stroman Junction Suite 092\nSouth Sigmundland, TN 35765', '57537-5285', 'Port Vanessabury', 'Sudan', NULL, '1-445-510-4423', 10, NULL, NULL),
(83, 'Goodwin', 'Layla', 'hwolf@hotmail.com', '981 Adolfo Forges\nLake Raleightown, MI 41554', '45826', 'Ramiroside', 'Uruguay', NULL, '+12297389177', 10, NULL, NULL),
(84, 'Stokes', 'Jasmin', 'rturcotte@gmail.com', '8234 Frederique Canyon\nNew Bradford, PA 77714', '40510-5199', 'Zulaufchester', 'Jersey', NULL, '1-210-463-7534', 10, NULL, NULL),
(85, 'Nitzsche', 'Randall', 'tiara48@rohan.com', '201 Augustus Valley Apt. 559\nAbbottland, RI 55409-5903', '58205-6795', 'Kilbackburgh', 'Marshall Islands', NULL, '1-386-374-5410', 10, NULL, NULL),
(86, 'Turner', 'Jana', 'karmstrong@treutel.com', '4859 Morton Curve Apt. 318\nTrompview, RI 39171-5237', '37482', 'Hopehaven', 'Mayotte', NULL, '+1-541-970-5750', 10, NULL, NULL),
(87, 'Luettgen', 'Kenny', 'christa84@nienow.biz', '2383 Watsica Valley Apt. 643\nLake Patienceberg, MA 94546-1254', '02759', 'Jordanebury', 'United States of America', NULL, '+1-870-351-4263', 10, NULL, NULL),
(88, 'Runolfsson', 'Karlee', 'wcrist@yahoo.com', '8786 Bogisich Canyon Apt. 108\nNorth Thaliamouth, MT 34289-1560', '86374', 'Kenyamouth', 'Vietnam', NULL, '1-828-521-4263', 10, NULL, NULL),
(89, 'Price', 'Minerva', 'georgette.funk@hegmann.com', '353 Daren Passage\nNorth Maximilliaview, AR 63004', '82310-0461', 'Fritschshire', 'Poland', NULL, '(816) 951-2967', 10, NULL, NULL),
(90, 'Yundt', 'Estell', 'reichert.lorna@yahoo.com', '7386 Cassin Spur Apt. 162\nNorth Dereckberg, MA 47222-9149', '53663-3344', 'Darrenview', 'British Indian Ocean Territory (Chagos Archipelago)', NULL, '458-561-5607', 10, NULL, NULL),
(91, 'Kassulke', 'Misty', 'genevieve03@gmail.com', '9501 Reynolds Crest\nWest Georgeville, KY 32816-2540', '63421', 'Stantonton', 'Armenia', NULL, '(762) 267-6019', 10, NULL, NULL),
(92, 'Ziemann', 'Kacey', 'tremblay.warren@hotmail.com', '42083 Lukas Path\nDachview, MN 22800-7796', '29768-3588', 'New Mckayla', 'Portugal', NULL, '541-641-9252', 10, NULL, NULL),
(93, 'Kautzer', 'Neva', 'ressie.oconnell@bartoletti.com', '7855 Art Drive\nWest Deondre, WA 62591', '49814-2079', 'Grantbury', 'Madagascar', NULL, '+1.432.725.8606', 10, NULL, NULL),
(94, 'Heller', 'Violet', 'qtromp@rolfson.org', '8656 Jamaal Flats Apt. 175\nWymanland, VA 67362', '54978-2249', 'Danikaside', 'Togo', NULL, '870-384-1943', 10, NULL, NULL),
(95, 'VonRueden', 'Javier', 'rick58@rowe.com', '894 Langosh Run\nBrigitteberg, MI 61845', '91975-2584', 'East Joey', 'Cook Islands', NULL, '(319) 532-3446', 10, NULL, NULL),
(96, 'Hand', 'Jalyn', 'rmante@yahoo.com', '86986 Bogisich Hills Apt. 676\nWest Melodyhaven, VA 30172', '61309-0457', 'Lake Aurelia', 'Azerbaijan', NULL, '816.766.7879', 10, NULL, NULL),
(97, 'Hayes', 'Daisy', 'catharine99@willms.com', '63538 Estelle Road\nYvettefort, KS 51975', '14864-7741', 'Breitenbergside', 'Puerto Rico', NULL, '234.932.7929', 10, NULL, NULL),
(98, 'Balistreri', 'Brice', 'levi68@hotmail.com', '2275 Lucius Greens Suite 655\nNorth Lueshire, IL 91816', '15644', 'West Lonieshire', 'Djibouti', NULL, '(412) 238-8124', 10, NULL, NULL),
(99, 'Kris', 'Bradley', 'hyatt.kian@sporer.com', '891 Stamm Center Apt. 345\nMarcelleborough, WA 55926', '04026-2967', 'Pollichburgh', 'Slovakia (Slovak Republic)', NULL, '+1.484.215.6098', 10, NULL, NULL),
(100, 'Welch', 'Rosalind', 'annabell.dubuque@ernser.info', '557 Gudrun Rest Apt. 810\nStantonfurt, MA 83075', '61354', 'Judybury', 'Kyrgyz Republic', NULL, '559-688-2279', 10, NULL, NULL);

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
  `quantite` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixHT` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id_facture`, `id_client`, `dateEmission`, `dateFin`, `quantite`, `prixHT`, `Description`, `modePayment`, `id_user`, `statut`, `nbr_facture`, `created_at`, `updated_at`) VALUES
(37, 21, '2023-03-15', '2023-04-14', '{\"0\":\"0\"}', '{\"0\":\"0\"}', '{\"0\":null}', 'Espèces', 15, 'nonpayer', 1, '2023-03-15 12:53:44', '2023-03-15 12:53:44'),
(36, 19, '2023-03-15', '2023-04-14', '{\"0\":\"10\",\"1\":\"15\"}', '{\"0\":\"50\",\"1\":\"120\"}', '{\"0\":\"test1\",\"1\":\"test2\"}', 'Espèces', 11, 'nonpayer', 2, '2023-03-15 10:38:36', '2023-03-15 10:38:36'),
(30, 20, '2023-03-14', '2023-04-13', '{\"0\":\"4\",\"1\":\"5\"}', '{\"0\":\"10\",\"1\":\"10\"}', '{\"0\":null,\"1\":null}', 'Espèces', 13, 'nonpayer', 13, '2023-03-14 21:06:55', '2023-03-14 21:06:55'),
(29, 20, '2023-03-14', '2023-04-13', '{\"0\":\"2\",\"1\":\"4\"}', '{\"0\":\"3\",\"1\":\"5\"}', '{\"0\":null,\"1\":null}', 'Espèces', 13, 'nonpayer', 12, '2023-03-14 20:43:30', '2023-03-14 20:43:30'),
(28, 20, '2023-03-14', '2023-04-13', '{\"0\":\"2\",\"1\":\"5\",\"2\":\"3\"}', '{\"0\":\"2\",\"1\":\"2\",\"2\":\"2\"}', '{\"0\":null,\"1\":null,\"2\":null}', 'Espèces', 13, 'nonpayer', 11, '2023-03-14 20:03:48', '2023-03-14 20:03:48'),
(35, 30, '2023-03-15', '2023-04-14', '{\"0\":\"1\",\"1\":\"3\"}', '{\"0\":\"2\",\"1\":\"4\"}', '{\"0\":\"test1\",\"1\":\"test2\"}', 'Espèces', 10, 'payer', 6, '2023-03-15 08:33:46', '2023-03-16 13:55:51'),
(107, 32, '2023-03-16', '2023-04-15', '{\"0\":\"0\"}', '{\"0\":\"0\"}', '{\"0\":null}', 'Espèces', 10, 'payer', 10, '2023-03-16 11:32:09', '2023-03-16 13:40:29'),
(106, 32, '2023-03-16', '2023-04-15', '{\"0\":\"0\"}', '{\"0\":\"0\"}', '{\"0\":null}', 'Espèces', 10, 'payer', 9, '2023-03-16 11:31:58', '2023-03-16 11:31:58'),
(105, 60, '2023-03-16', '2023-04-15', '{\"0\":\"0\"}', '{\"0\":\"0\"}', '{\"0\":null}', 'Espèces', 10, 'payer', 8, '2023-03-16 11:31:49', '2023-03-16 11:31:49');

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
  `nomSociete` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codePostal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RC` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IF` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ICF` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxe` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnie` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `form_jiridiques`
--

INSERT INTO `form_jiridiques` (`id`, `nomSociete`, `adresse`, `codePostal`, `ville`, `pays`, `website`, `RC`, `IF`, `patent`, `cnss`, `ICF`, `fax`, `logo`, `taxe`, `cnie`, `created_at`, `updated_at`) VALUES
(10, NULL, 'Safi', '20160', 'Safi', 'MA', NULL, NULL, '123456', NULL, NULL, '123456', NULL, NULL, '123456', '123456', '2023-03-15 14:16:39', '2023-03-16 09:02:53');

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
  `societe` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `email_verified_at`, `password`, `adresse`, `avatar`, `nbr_facture`, `societe`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'TAHA WAHAB', '19xmax2005@gmai.com', '+212620858128', NULL, '$2y$10$fTzp4hVyeuZNUmp/CwpuxOGXM8qmLnfr/lEZ57vhSqePCSw.iUs9S', 'tanger', 'undraw_profile.svg', 0, 1, NULL, '2023-03-15 11:13:36', '2023-03-15 11:13:36'),
(13, 'Yassine Achouyne', 'yachouyne@email.com', '+212620858128', NULL, '$2y$10$JeJZxNmHR27hwdIjbolKj.dWTyLQr3whVFaEIdoEnfAwvfQbpiw0a', 'adresse', 'undraw_profile.svg', 13, 0, NULL, '2023-03-14 18:31:06', '2023-03-14 21:06:55'),
(12, 'Yassine Achouyne', 'yassine.achouyne@gmail.com', '+212620858128', NULL, '$2y$10$HLMzosFSCiKOX6GNEkaa1OnlyuBtNfhial5Ez0J11Sh8ShieiqC2e', 'rue 12331', 'undraw_profile.svg', 3, 0, NULL, '2023-03-14 11:55:57', '2023-03-14 14:40:40'),
(11, 'Yassine Achouyne', 'yassine.achouyne2022@gmail.com', '+212620858128', NULL, '$2y$10$d8pj6igwgi9CoGt3cMKDD.AotBukYLZ2dXTnLUT0/BY55quEbeb7u', 'test', 'undraw_profile.svg', 2, 0, NULL, '2023-03-13 22:28:12', '2023-03-15 10:38:36'),
(10, 'Yassine Achouyne', 'yachouyne@gmail.com', '+212620858128', NULL, '$2y$10$lnvgAUj1FPqu.5wDyY8dGuvCcAIFEmlKb31r4fL0VtLs.LZJaLaPe', 'tanger', 'avatar-10-2023-03-16-122937pm.png', 10, 0, NULL, '2023-03-13 21:15:34', '2023-03-16 11:32:09'),
(15, 'name name', 'name@gmail.com', '+21545232451232', NULL, '$2y$10$sITjs/6PT6NCFvSNYsXPQ.MkqK1Dzp/5CWeG8RUJsGT.pVe.xMKjS', 'rue 252', 'undraw_profile.svg', 1, NULL, NULL, '2023-03-15 11:35:03', '2023-03-15 12:53:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
