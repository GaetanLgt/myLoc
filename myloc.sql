-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 10 avr. 2022 à 11:16
-- Version du serveur :  10.3.34-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myloc`
--
CREATE DATABASE IF NOT EXISTS `myloc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `myloc`;

-- --------------------------------------------------------

--
-- Structure de la table `affaires`
--

CREATE TABLE `affaires` (
  `id` int(11) NOT NULL,
  `proprietaire_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_pts` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `affaires`
--

INSERT INTO `affaires` (`id`, `proprietaire_id`, `categorie_id`, `name`, `description`, `nb_pts`, `image_name`, `updated_at`) VALUES
(1, 4, 2, 'Mad Max', 'Une bombe d\'adrénaline placée sous le signe de l\'asphalte et du chaos comprenant : la trilogie culte de George Miller, son flamboyant Fury Road, sa version inédite Black & Chrome ainsi que 4h de bonus.', 3, 'Mad-Max-L-anthologie-Blu-ray.jpg', '0000-00-00 00:00:00'),
(2, 4, 2, 'Star Wars L\'Ascension de Skywalker', 'Star Wars, épisode IX : L\'Ascension de Skywalker est un film américain de science-fiction de type space opera coécrit et réalisé par J. J. Abrams, sorti en 2019.', 3, 'Star-Wars-L-Ascension-de-Skywalker-DVD(2).jpg', '0000-00-00 00:00:00'),
(3, 4, 2, 'John Wick 3 Parabellum', 'John Wick a transgressé une règle fondamentale : il a tué à l’intérieur même de l’Hôtel Continental. «Excommunié», tous les services liés au Continental lui sont fermés et sa tête mise à prix. John se retrouve sans soutien, traqué par tous les plus dangereux tueurs du monde.', 7, 'John-Wick-Parabellum-Steelbook-Edition-Limitee-Blu-ray.jpg', '0000-00-00 00:00:00'),
(4, 4, 2, 'Sherlock Holmes Jeu d\'ombres', 'Sherlock Holmes a toujours été réputé pour être l\'homme à l\'esprit le plus affûté de son époque. Jusqu\'au jour où le redoutable professeur James Moriarty, criminel d\'une puissance intellectuelle comparable à celle du célèbre détective, fait son entrée en scène… ', 8, 'Sherlock-Holmes-Jeu-d-ombres-Steelbook-Blu-ray-4K-Ultra-HD.jpg', '0000-00-00 00:00:00'),
(5, 4, 2, '1917', 'Pris dans la tourmente de la Première Guerre Mondiale, Schofield et Blake, deux jeunes soldats britanniques, se voient assigner une mission à proprement parler impossible. Porteurs d’un message qui pourrait empêcher une attaque dévastatrice et la mort de centaines de soldats, dont le frère de Blake, ils se lancent dans une véritable course contre la montre, derrière les lignes ennemies.', 4, '1917-Steelbook-Edition-Speciale-Fnac-Blu-ray.jpg', '0000-00-00 00:00:00'),
(16, 5, 4, 'Alicia', 'Alicia Keys nous présente son 7ème album studio. Le 1er extrait « underdog » co-écrit par l’auteur, compositeur et interprète britannique « Ed Sheeran » est le reflet de l’univers roots et authentique de son nouvel opus qui sortira le 20/03. Le clip, réalisée par Wendy Morgan, dévoile l\'artiste qui fait un constat amer sur les personnes qui ne profitent pas assez de ce qu\'ils ont déjà. « Certaines personnes peuvent penser que le mot \"underdog\" est négatif, mais je le vois comme un mot puissant représentant des personnes... Voir la suite', 2, 'Alicia.jpg', '0000-00-00 00:00:00'),
(17, 5, 4, 'Alpha', 'Le rappeur niçois Fartas, pur talent de la frenchriviera, produit une musique urbaine métissée depar ses origines antillaises et marocaines. A traversses influences trap et pop il propose un hip hopcomplet avec une culture de l’image très fun, unson moderne, riche en sonorités et en diversité desamples. Découvert en 2016 grâce à sa mixtape Milliet Milli 2.0 avec lesquels il parvient à intégrer leViral 50 sur Spotify ainsi que le Top 100 France surTidal, il sort aujourd’hui le premier volet dudiptyque Alpha.', 3, 'Alpha.jpg', '0000-00-00 00:00:00'),
(18, 5, 4, 'Coldplay – Everyday Life', 'De la douceur, une touche de pop, un peu de groove, et une pointe d’Orient : voilà ce que Coldplay nous livre avec Everyday Life. Pour Chris Martin, cet album est une « réaction à la négativité ambiante ». Sunrise et Sunset nous réservent des titres réconfortants et acidulés, l’idéal pour cette fin d’année.', 3, 'Everyday-Life.jpg', '0000-00-00 00:00:00'),
(19, 5, 4, 'Sainte Victoire - Clara Luciani', 'Une année victorieuse pour Clara Luciani, qui ne cesse d’enchanter la musique francophone de sa voix grave, de sa féminité assumée et de ses paroles nuancées. Sainte Victoire, porté par « La Grenade » qui détonne, est une valeur sûre qui monte en puissance et dont on ne se lasse pas !', 4, 'Sainte-Victoire.jpg', '0000-00-00 00:00:00'),
(20, 5, 4, 'Brol La Suite - Angèle', 'Elle n’a pas fini de nous étonner ! Angèle ne cesse de déchaîner les foules en musique, et d’autant plus en nous offrant Brol La Suite. 7 titres inédits s’ajoutent aux précédents, dont le déjà culte Oui ou Non et l’excellent Que du Love en featuring avec Kiddy Smile. Un must-have pour Noël !', 5, 'Brol-La-Suite-Digisleeve.jpg', '0000-00-00 00:00:00'),
(21, 7, 5, 'Cyberpunk 2077', 'Cyberpunk 2077 est un jeu vidéo d\'action-RPG en vue à la première personne développé par CD Projekt RED, fondé sur la série de jeu de rôle sur table Cyberpunk 2020 conçue par Mike Pondsmith.', 12, 'Cyberpunk-2077-Edition-Day-One-PC.jpg', '0000-00-00 00:00:00'),
(22, 7, 5, 'Les Sims 4', 'Les Sims 4 est un jeu vidéo de simulation de vie de la série d\'accord Les Sims, développé par Maxis et édité par Electronic Arts. Il est sorti sur Microsoft Windows le 4 septembre 2014 en Europe. La bande-son du jeu a été composée par Ilan Eshkeri. ', 1, 'Les-Sims-4-Edition-Standard-PC-et-MAC.jpg', '0000-00-00 00:00:00'),
(23, 7, 5, 'Flight Simulator', 'Flight Simulator est un logiciel de simulation de vol pour Microsoft Windows, vendu et souvent vu comme un jeu vidéo. Le programme Flight Simulator a été développé par Bruce Artwick à partir de 1977; sa société SubLogic le vendait pour divers ordinateurs personnels.', 12, 'Flight-Simulator-Premium-Deluxe-Edition-PC.jpg', '0000-00-00 00:00:00'),
(24, 7, 5, 'Red Dead Redemption 2', 'Red Dead Redemption II est un jeu vidéo d\'action-aventure et de western multiplateforme, développé par Rockstar Studios et édité par Rockstar Games, sorti le 26 octobre 2018 sur PlayStation 4 et Xbox One et le 5 novembre 2019 sur Windows.', 4, 'Red-Dead-Redemption-2-PC.jpg', '0000-00-00 00:00:00'),
(25, 7, 5, 'GTA 5', 'Grand Theft Auto V est un jeu vidéo d\'action-aventure, développé par Rockstar North et édité par Rockstar Games en 2013. Faisant partie de la série vidéoludique série des jeux vidéo Grand Theft Auto, il est une suite de l\'univers fictif introduit dans Grand Theft Auto IV, sorti en 2008.', 16, 'GTA-5-PC.jpg', '0000-00-00 00:00:00'),
(26, 8, 1, 'Le Temps des Tempêtes', 'À compter du 16 mai 2007, j\'étais seul. Bien sûr, il y avait le peuple français, mais sa force collective ne s\'exprime pas dans le quotidien des décisions à prendre, ou des nominations à effectuer. J\'avais une équipe, des conseillers, des amis, des visiteurs du soir, mais j\'étais seul à prendre et à assumer la décision finale. C\'est le premier sentiment qui m\'a envahi après avoir raccompagné Jacques Chirac à sa voiture et être remonté dans le bureau présidentiel qui était devenu le mien pour les cinq années à venir.', 4, 'Le-Temps-des-Tempetes.jpg', '0000-00-00 00:00:00'),
(27, 8, 1, 'Espoir', 'L’espoir est une disposition de l\'esprit humain reposant sur l\'attente d\'une situation meilleure à celle existante. Classé parmi les émotions, l\'espoir est à ce titre opposé au désespoir.', 2, 'Espoir.jpg', '0000-00-00 00:00:00'),
(28, 8, 1, 'Le Grand livre de la Cuisine asiatique', 'La collection référence sur des sujets de fond. 475 recettes asiatiques : chinoises, japonaises, coréennes, thaïes.Des recettes expliquées pas à pas. Les meilleurs plats mijotés, les meilleures bouchées vapeur, les meilleurs sashimis et sushis.En supplément, un guide pour découvrir les ingrédients du placard asiatique et comment les cuisiner.\r\n\r\n', 4, 'Le-grand-livre-Marabout-de-la-cuisine-asiatique.jpg', '0000-00-00 00:00:00'),
(29, 8, 1, 'Lara Tome 3', 'Lara prépare son retour au Venezuela, où elle espère retrouver une existence apaisée auprès d\'Olivier et de leur fille, Loanne. La jeune femme est d’autant plus impatiente de retrouver son pays d’adoption qu\'elle sent qu’un danger plane toujours sur sa famille.? Ses craintes sont confirmées la veille du départ lorsqu’Olivier est enlevé par un complice des hommes qui le traquent depuis la fin de la guerre, et que Daniel Masson, le meilleur ami du jeune homme, disparaît à son tour peu de temps après.?Lara parviendra-t-elle à...', 4, 'Lara-Tome-3-La-Danse-macabre.jpg', '0000-00-00 00:00:00'),
(30, 8, 1, 'Le Crépuscule et l\'Aube', 'Avant Les Piliers de la Terre...En l\'an 997, à la fin du haut Moyen Âge, les Anglais font face à des attaques de Vikings qui menacent d\'envahir le pays. En l\'absence d\'un État de droit, c\'est le règne du chaos.\r\nDans cette période tumultueuse, s\'entrecroisent les destins de trois personnages. Le jeune Edgar, constructeur de bateaux, voit sa vie basculer quand sa maison est détruite au cours d\'un raid viking. Ragna, jeune noble normande insoumise, épouse par amour l\'Anglais Wilwulf, mais les coutumes de son pays d\'adoption...', 7, 'Le-Crepuscule-et-l-Aube.jpg', '0000-00-00 00:00:00'),
(31, 10, 3, 'The Boys Saison 1', 'ATTENTION : VERSION ORIGINALE SOUS-TITREE UNIQUEMENT\r\nDans un monde fictif où les super-héros se sont laissés corrompre par la célébrité et la gloire et ont peu à peu révélé la part sombre de leur personnalité, une équipe de justiciers qui se fait appeler \"The Boys\" décide de passer à l\'action et d\'abattre ces super-héros autrefois appréciés de tous.', 45, 'The-Boys-Saison-1-Blu-ray.jpg', '0000-00-00 00:00:00'),
(32, 10, 3, 'Doom Patrol Saison 1', 'Robotman, Negative Man, Crazy Jane ou encore Elasti-Girl souffrent de handicaps ou ont été physiquement marqués par des accidents. Rejetés par la société et désormais dotés de super pouvoirs, tous ont trouvé un sens à leur vie en agissant pour le compte du Dr. Niles Caulder, un scientifique fou qui leur est venu en aide à un moment donné de leur vie et qu\'ils aident à protéger la planète...', 63, 'Doom-Patrol-Saison-1-DVD.jpg', '0000-00-00 00:00:00'),
(33, 10, 3, 'Scott et Bailey Saison 2', 'Janet Scott et Rachel Bailey sont toutes les deux membres de l\'équipe des Incidents Majeurs de la Police de Manchester mais aussi deux amies aux styles totalement opposés. Ensemble, elles enquêtent sur des affaires de meurtres avec une efficacité redoutable tout en essayant de mener de front leur vie privée agitée...', 47, 'Scott-et-Bailey-Saison-2-DVD.jpg', '0000-00-00 00:00:00'),
(34, 10, 3, 'Pennyworth Saison 1', 'Focus sur les jeunes années d\'Alfred Pennyworth, le célèbre majordome de Batman. Dans le Londres des années 1960, ce soldat des Forces Spéciales Britanniques rejoint un jeune millionnaire du nom de Thomas Wayne, futur père de Bruce Wayne, pour travailler à ses côtés.', 8, 'Pennyworth-Saison-1-DVD.jpg', '0000-00-00 00:00:00'),
(35, 10, 3, 'Peaky Blinders Saison 5', 'La saison 5 de la saga familiale prend place dans le monde bouleversé par la crise de 1929. Thomas Shelby est devenu député travailliste. Les opportunités comme les contretemps se succèdent. Il est approché par un politicien charismatique qui porte une vision audacieuse de la Grande-Bretagne. Le choix de Tommy affectera non seulement l’avenir de sa famille, mais aussi celle de la nation toute entière…', 5, 'Peaky-Blinders-Saison-5-Blu-ray.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Livres'),
(2, 'Dvd'),
(3, 'Series'),
(4, 'Musique'),
(5, 'Jeux-Video'),
(6, 'BD');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200728134432', '2020-07-28 15:44:43', 44),
('DoctrineMigrations\\Version20200728135904', '2020-07-28 15:59:30', 44),
('DoctrineMigrations\\Version20200728144457', '2020-07-28 16:45:08', 421),
('DoctrineMigrations\\Version20200728145430', '2020-07-28 16:54:34', 127),
('DoctrineMigrations\\Version20200728150128', '2020-07-28 17:01:32', 107),
('DoctrineMigrations\\Version20200731085526', '2020-07-31 14:13:27', 92),
('DoctrineMigrations\\Version20200803090554', '2020-08-03 11:06:01', 116),
('DoctrineMigrations\\Version20200806144028', '2020-08-06 16:40:37', 164);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `emprunteur_id` int(11) DEFAULT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `affaire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `emprunteur_id`, `date_debut`, `date_fin`, `affaire_id`) VALUES
(1, 4, '2020-08-04 00:00:00', '2020-08-07 00:00:00', 31),
(2, 4, '2020-08-06 00:00:00', '2020-08-13 00:00:00', 35),
(7, 4, '2020-08-20 00:00:00', '2020-08-26 00:00:00', 35),
(8, 5, '2020-08-13 00:00:00', '2020-08-16 00:00:00', 31),
(9, 5, '2020-08-25 00:00:00', '2020-08-27 00:00:00', 31),
(10, 5, '2020-09-01 00:00:00', '2020-09-05 00:00:00', 31),
(11, 5, '2020-08-11 00:00:00', '2020-08-15 00:00:00', 33),
(12, 5, '2020-08-25 00:00:00', '2020-08-30 00:00:00', 33),
(13, 5, '2020-08-07 00:00:00', '2020-08-10 00:00:00', 25),
(14, 5, '2020-08-20 00:00:00', '2020-08-22 00:00:00', 25),
(15, 5, '2020-08-20 00:00:00', '2020-08-22 00:00:00', 25),
(16, 5, '2020-08-20 00:00:00', '2020-08-22 00:00:00', 24),
(17, 5, '2020-08-10 00:00:00', '2020-08-15 00:00:00', 24),
(18, 5, '2020-08-25 00:00:00', '2020-08-30 00:00:00', 24),
(19, 5, '2020-08-23 00:00:00', '2020-08-24 00:00:00', 24),
(20, 7, '2020-08-10 00:00:00', '2020-08-15 00:00:00', 32),
(22, 4, '2020-08-10 00:00:00', '2020-08-12 00:00:00', 30),
(23, 4, '2020-08-10 00:00:00', '2020-08-15 00:00:00', 21),
(24, 7, '2020-08-10 00:00:00', '2020-08-15 00:00:00', 22),
(25, 4, '2020-08-10 00:00:00', '2020-08-13 00:00:00', 34),
(26, 4, '2020-08-19 00:00:00', '2020-08-21 00:00:00', 34),
(27, 4, '2020-08-19 00:00:00', '2020-08-21 00:00:00', 28),
(28, 26, '2022-03-11 00:00:00', '2022-03-12 00:00:00', 2),
(29, 26, '2022-04-12 00:00:00', '2022-04-19 00:00:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pts` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `total_pts`, `role`, `image`, `image_name`, `updated_at`) VALUES
(4, 'Dupond', 'Michel', 'dd@live.fr', '$2y$13$NniICacfR1rMkwDJS68ynuqsSho3k7serEkubg3DFZaBWVl4Z113.', 388, 'ROLE_ADMIN', '', '2823212.jpg', '0000-00-00 00:00:00'),
(5, 'Garcia', 'José', 'garciajose@live.fr', '$2y$13$kA7NrWr84INp3upYgR0oR.r9Zg6MyRJqtZkiI4957oxLVjO61I92.', 537, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(7, 'Pablo', 'Escobar', 'nezblanc@live.fr', '$2y$13$SuZl7U8384w9OirbQLen8.98gMInv3pcVV/em.yUd4rYZCi2aOAEy', 1709, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(8, 'Chapo', 'El', 'elchapo@live.fr', '$2y$13$XB6jOsWneg6QWM4Twoo2P.KCeYAGLLf5DnE3LqpFHxE9H73mZOUQm', 516, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(10, 'Pierre', 'Artidi', 'arditipierre@live.fr', '$2y$13$Ju4JyZ6I06iGc57KoqoxKucrRRcZLEuWIHXFTkWOLXn2gaLO7kSk.', 1298, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(11, 'jean', 'Bon', 'jeanbon@live.fr', '$2y$13$lJXNTxvJs1URaqjm7xnZ3u.B0BTxnpKGnaPy4yktDhDktKpHxJa2m', NULL, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(16, 'AL', 'MASH', 'marshal@live.fr', '$2y$13$iXSArM.Bj0OlROwy5SBx5uNb6nHXFTMZZec9QVRmNilSjK2dvoKXa', 10, 'ROLE_ADMIN', '', '', '0000-00-00 00:00:00'),
(17, 'stiv', 'puceau', 'stivlenainpuissant@live.fr', '$2y$13$XLivBiHGo0HNIU4vFCDskevV7.InRFqHxrk6CB26IAJ0CKoVmoB2S', 1000, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(18, 'Chat', 'PAPIN', 'chatpapin@live.fr', '$2y$13$ssVYdc.PNvzeaIz3GlEILumSCM33IhFGCSUM6zlzjG9TVKsz0JCZC', NULL, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(21, 'PAPLOUF', 'LEPALOUF', 'paplouflepaplouf@live.fr', '$2y$13$WZuh4h0RmIHuQLbvHjMvIOEOSCHJ/odWAZCYHnwio1ebE.G88Ia.m', 1000, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(22, 'HARDY', 'François', 'pashardy@live.fr', '$2y$13$FvF7bZrPJuPmDyEpsoHbGO.NananWdLR.v5wV0aQjaQvDM23Z6ssO', 1000, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(23, 'john', 'Smith', 'johnsmith@live.fr', '$2y$13$h5l/sWRERW7N.2QTK9fhP.b0oGgb2yy1IrR6MYfa3zdx2o3UZmHxi', 1000, 'ROLE_USER', '', '', '0000-00-00 00:00:00'),
(26, 'Poney', 'Petit', 'petitponey@aol.fr', '$2y$13$pXWNcqG3b8N.LfcGnIb5yee6HcHXqKRoJGAJe.aZUdbhfJglhbdy2', 976, 'ROLE_ADMIN', ' ', '1361309446170-622a1fc373c33112905437.jpg', '2022-03-10 16:56:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affaires`
--
ALTER TABLE `affaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2B270FFA76C50E4A` (`proprietaire_id`),
  ADD KEY `IDX_2B270FFABCF5E72D` (`categorie_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_364071D7F0840037` (`emprunteur_id`),
  ADD KEY `IDX_364071D7F082E755` (`affaire_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affaires`
--
ALTER TABLE `affaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affaires`
--
ALTER TABLE `affaires`
  ADD CONSTRAINT `FK_2B270FFA76C50E4A` FOREIGN KEY (`proprietaire_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_2B270FFABCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_364071D7F082E755` FOREIGN KEY (`affaire_id`) REFERENCES `affaires` (`id`),
  ADD CONSTRAINT `FK_364071D7F0840037` FOREIGN KEY (`emprunteur_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
