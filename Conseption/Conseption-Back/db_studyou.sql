-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 août 2021 à 19:34
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `studyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'STUDYOU', 'studyou@gmail.com', 'studyou123');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 NOT NULL,
  `phone` int(10) NOT NULL,
  `gender` varchar(15) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `occasion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `email`, `phone`, `gender`, `occasion`) VALUES
(2, 'douaa@gmail.com', 56646557, 'vidéos,', 'shooting,autre,'),
(8, 'sabae.larif@gmail.com', 699494693, 'photos,vidéos,', 'marriage,fete,'),
(9, 'ahmed@gmail.com', 78654534, 'photos,vidéos,', 'match,'),
(10, 'Soumia@gmail.com', 699875463, 'vidéos,', 'anniversaire,');

-- --------------------------------------------------------

--
-- Structure de la table `folders`
--

CREATE TABLE `folders` (
  `id_folder` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `folders`
--

INSERT INTO `folders` (`id_folder`, `name`, `image`) VALUES
(13, 'Nature', 'simon-migaj-Utvwp12891U-unsplash.jpg'),
(14, 'Sport', 'alexander-redl-d3bYmnZ0ank-unsplash.jpg'),
(15, 'Fête', 'alexander-popov-hTv8aaPziOQ-unsplash.jpg'),
(17, 'Photographie', 'markus-spiske-EfhOW3cYqD8-unsplash.jpg'),
(18, 'Technologie', 'ales-nesetril-Im7lZjxeLhg-unsplash.jpg'),
(19, 'Animale', 'ray-hennessy-xUUZcpQlqpM-unsplash.jpg'),
(21, 'Filme', 'jakob-owens-CiUR8zISX60-unsplash.jpg'),
(22, 'Histoire', 'natalia-y-f5xddISq428-unsplash.jpg'),
(23, 'Art et Culture', 'claudio-schwarz-VPT1C8b_OE8-unsplash.jpg'),
(24, 'Autre', 'debby-hudson-gjS9qPIQE_A-unsplash.jpg'),
(26, 'Marriage', 'beatriz-perez-moya-M2T1j-6Fn8w-unsplash.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tag` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_folder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `title`, `image`, `description`, `tag`, `id_folder`) VALUES
(39, 'Une porte bleu ciel', 'catarina-carvalho-cqMwRNd0i7I-unsplash.jpg', 'Une porte de la couleur bleu ciel, j\'aime les vielles portes.', '#porte, #culture, #tradution, #bleu', 23),
(40, 'Livres d\'histoi', 'natalia-y-f5xddISq428-unsplash.jpg', 'Des livres d\'histoire', '#histoire, #livre, #lecture', 22),
(41, 'Photographe', 'brandon-erlinger-ford-jL8QFwnuOcQ-unsplash.jpg', 'Un jeune photographe port une ', '#photo, #photographe, #smok', 17),
(45, 'Garrage', 'kenny-leys-j27SKDa-vBg-unsplash.jpg', 'Garage contient une voiture et une bicyclette', '#voiture, #sport, #garage', 14),
(46, 'Les arbres nous regardent', 'jaanus-jagomagi-XcKog6oW1FI-unsplash.jpg', 'Les arbres nous regardent toujours.', '#nature, #arbres, #la_forêt ', 13);

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `video` text NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `tag` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_folder` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `title`, `video`, `description`, `tag`, `id_folder`) VALUES
(5, 'La nature', 'Nature Beautiful short video 720p HD.mp4', 'Une petite vidéo présente la magie de la nature', '#nature, #verte', 13),
(7, 'Test1', 'Creative short film- Wonderful little world.mp4', 'Voici une vidéo créative par le jeun photographe', '#créative', 24),
(8, 'Voice 2', 'TOXIC - Kwon Yul (Voice 2 FMV).mkv', '#voice, #voice2#voice, #voice2#voice, #voice2#voic', '#voice, #voice2', 21),
(9, 'lmkmlkm', 'Creative short film- Wonderful little world.mp4', ',;ksfoiqomskcqs:wdmoiqzpemqkdslmifpàismdkfc qssjfposdmfk:scjwpoidspàirps', '#voice, #voice2', 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id_folder`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_folder` (`id_folder`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folders_fk` (`id_folder`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `folders`
--
ALTER TABLE `folders`
  MODIFY `id_folder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_folder`) REFERENCES `folders` (`id_folder`);

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_folder`) REFERENCES `folders` (`id_folder`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
