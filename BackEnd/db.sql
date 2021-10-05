-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 oct. 2021 à 10:21
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
-- Base de données : `larmop1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(35) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `email`, `password`) VALUES
(1, 'admin.12@gmail.com', 'nimda4321');

-- --------------------------------------------------------

--
-- Structure de la table `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `name_area` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `area`
--

INSERT INTO `area` (`id_area`, `name_area`) VALUES
(2, 'Activités associatives'),
(3, 'Activités associatives'),
(4, 'Administration publique'),
(5, 'Aéronautique, navale'),
(6, 'Agriculture, pêche, aquaculture '),
(7, 'Agroalimentaire'),
(8, 'Ameublement, décoration'),
(9, 'Automobile, matériels de transport, réparation'),
(10, 'Banque, assurance, finances'),
(11, 'BTP, construction'),
(12, 'Centres d´appels, hotline, call center'),
(13, ' Chimie, pétrochimie, matières premières'),
(14, 'Conseil, audit, comptabilité'),
(15, 'Distribution, vente, commerce de gros'),
(16, 'Édition, imprimerie'),
(17, 'Éducation, formation'),
(18, 'Electricité, eau, gaz, nucléaire, énergie'),
(19, 'Environnement, recyclage'),
(20, 'Equipe électriques, électroniques, optiques, précision'),
(21, 'Equipements mécaniques, machines'),
(22, 'Événementiel, hôtel'),
(23, 'Hôtellerie, restauration'),
(24, 'Immobilier, architecture, urbanisme'),
(25, 'Import, export'),
(26, 'Industrie pharmaceutique'),
(27, 'Industrie, production, fabrication, autres'),
(28, 'Informatique, SSII, Internet'),
(29, 'Ingénierie, études développement'),
(30, 'Intérim, recrutement'),
(31, 'Location'),
(32, 'Nettoyage, sécurité, surveillance'),
(33, 'Papier, bois, caoutchouc, plastique, verre, tabac'),
(34, 'Produits de grande consommation '),
(35, 'Qualité, méthodes'),
(36, 'Recherche et développement'),
(37, 'Santé, pharmacie, hôpitaux, équipements médicaux'),
(38, 'Secrétariat'),
(39, 'Services autres'),
(40, 'Services collectifs et sociaux, services à la personne'),
(41, 'Sport, action culturelle et sociale'),
(42, 'Télécom'),
(43, 'Textile, habillement, cuir, chaussures'),
(44, 'Tourisme, loisirs'),
(45, 'Transports, logistique, services postaux');

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `id_city` int(11) NOT NULL,
  `name_city` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`id_city`, `name_city`) VALUES
(1, 'Casablanca'),
(2, 'Fès'),
(3, 'Tanger'),
(4, 'Tanger'),
(5, 'Tanger'),
(6, 'Marrakech'),
(7, 'Agadir'),
(8, 'Meknès'),
(9, 'Safi'),
(10, 'Eljadida'),
(11, 'Al hociema'),
(12, 'Benimellal'),
(13, 'Benslimane'),
(14, 'Azilal'),
(15, 'Berkane'),
(16, 'Boujdour'),
(17, 'Chefchaouen'),
(18, 'Errachidia'),
(19, 'Essaouira'),
(20, 'Es-semara'),
(21, 'Figuig'),
(22, 'Guelmim'),
(23, 'Ifrane'),
(24, 'Inzegane'),
(25, 'Jerada'),
(26, 'Kenitra'),
(27, 'Khemissat'),
(28, 'Khnifra'),
(29, 'Khribga'),
(30, 'Laayoune'),
(31, 'Laguira'),
(32, 'Larache'),
(33, 'Mohammedia'),
(34, 'Oued eddahab'),
(35, 'Oujda'),
(36, 'Sale'),
(37, 'Sefrou'),
(38, 'Settat'),
(39, 'KHEMISSET'),
(40, 'Temara'),
(41, 'Tétouan'),
(42, 'Ouarzazate'),
(43, 'Autres'),
(44, 'Sidi Bibi'),
(45, 'Sidi Bouzid'),
(46, 'Berrechid'),
(47, 'Jorf Lasfar'),
(48, 'Agadir Laayoune Casablanca'),
(49, 'Casablanca Meknès'),
(50, 'Agadir Laâyoune Oujda Settat Casablanca'),
(51, 'Casablanca Marrakech'),
(52, 'Agadir Laâyoune Oujda Casablanca'),
(53, 'Agadir Casablanca Rabat');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id_competence` int(11) NOT NULL,
  `name_competence` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id_competence`, `name_competence`, `id_user`) VALUES
(20, 'PHP', 52);

-- --------------------------------------------------------

--
-- Structure de la table `diplomas`
--

CREATE TABLE `diplomas` (
  `id_diploma` int(11) NOT NULL,
  `name_diploma` varchar(50) CHARACTER SET utf8 NOT NULL,
  `level` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_diploma` date NOT NULL,
  `etablissement` varchar(150) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(150) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `diplomas`
--

INSERT INTO `diplomas` (`id_diploma`, `name_diploma`, `level`, `date_diploma`, `etablissement`, `subject`, `id_user`) VALUES
(165, 'Technique', 'Bac +2', '2013-07-12', 'azertyuiop', 'qsdfghjklm', 52);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id_experience` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `company` varchar(55) CHARACTER SET utf8 NOT NULL,
  `type_contract` varchar(10) CHARACTER SET utf8 NOT NULL,
  `function` text CHARACTER SET utf8 NOT NULL,
  `area` text CHARACTER SET utf8 NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id_experience`, `start_date`, `end_date`, `company`, `type_contract`, `function`, `area`, `details`, `id_user`) VALUES
(33, '2011-09-11', '2019-02-24', 'MySTR', 'cdi', 'azegh', 'qsdfghjkl', 'azertyui', 52);

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id_language` int(11) NOT NULL,
  `name_language` varchar(25) CHARACTER SET utf8 NOT NULL,
  `level` varchar(10) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id_language`, `name_language`, `level`, `id_user`) VALUES
(21, 'Français', 'Bon', 52);

-- --------------------------------------------------------

--
-- Structure de la table `moreinfosuser`
--

CREATE TABLE `moreinfosuser` (
  `id_infos` int(11) NOT NULL,
  `offre_emploi` varchar(200) NOT NULL,
  `cnss` varchar(100) NOT NULL,
  `certificate` varchar(100) NOT NULL,
  `illness_records` varchar(100) NOT NULL,
  `pay_sheets` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id_offre` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type_contrat` varchar(25) CHARACTER SET utf8 NOT NULL,
  `poste` text CHARACTER SET utf8 NOT NULL,
  `mission` text CHARACTER SET utf8 NOT NULL,
  `profil` varchar(50) CHARACTER SET utf8 NOT NULL,
  `experience` varchar(50) CHARACTER SET utf8 NOT NULL,
  `required_profile` varchar(200) CHARACTER SET utf8 NOT NULL,
  `diploma_formation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `required_qualitie` varchar(100) CHARACTER SET utf8 NOT NULL,
  `place_activity` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id_offre`, `date`, `title`, `city`, `type_contrat`, `poste`, `mission`, `profil`, `experience`, `required_profile`, `diploma_formation`, `required_qualitie`, `place_activity`, `id_admin`) VALUES
(3, '2021-09-29', 'Projeteur Dessinateur Postes Electriques HT/THT/MT', 'Casablanca', 'Intérim', 'Société basée à Ain Sebaa cherche d\'urgence un projeteur dessinateur THT/HT/MT justifiant d\'une bonne connaissance des standards ONEE.', 'Elaboration des plans guide  génie civil des postes électriques THT/HT/MT\r\n\r\n  Elaboration des plans de détail  des ouvrages génie civil des  postes électriques THT/HT/MT\r\n\r\n  Etablissement des plans de la charpente primaire et secondaire avec les notes de calcul y afférentes\r\n\r\n  Etablissement des nomenclatures  et  liste des équipements ( état des raccords , liste des connexion , circuit de terre… )\r\n\r\n  Maîtrise le logiciel  AUTOCAD,  ROBOBAT,  ETAPE\r\n\r\n  Reconnu pour votre rigueur et votre esprit d\'équipe , sociable, dynamique et organisé.', ' bac+2 dessin', ' bac+2 dessin', '', '', '', '', 0),
(6, '2021-10-01', 'Gestionnaire Parc Automobile', 'Marrakech', 'CDI', 'Nous cherchons pour notre client basé à Marrakech un Gestionnaire Parc Automobile', '- Organiser  l’utilisation et assurer la disponibilité du parc en coordination avec les agences.\r\n- Assurer la maintenance réparation  des véhicules et la plateforme ,et gérer les flux logistiques.\r\n- Gestion des demande des clients en fonction des besoins des différents services.', 'Bac+2 / Bac+3 , Diplôme technique', '5 à 8 ans d\'expérience', '- Solides connaissances en mécanique et automobile.\r\n- Bon relationnel et gestionnaire.\r\n- Bonne locution en langues.', '', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `professions`
--

CREATE TABLE `professions` (
  `id_profession` int(11) NOT NULL,
  `name_profession` varchar(35) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `toapply`
--

CREATE TABLE `toapply` (
  `id` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `toapply`
--

INSERT INTO `toapply` (`id`, `id_offre`, `id_user`) VALUES
(12, 3, 52),
(13, 6, 52);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fName` varchar(15) NOT NULL,
  `lName` varchar(15) NOT NULL,
  `date_birth` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `civility` varchar(10) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(15) NOT NULL,
  `name_file` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `fName`, `lName`, `date_birth`, `phone`, `civility`, `zip_code`, `address`, `country`, `name_file`, `email`, `password`, `id_city`, `id_area`) VALUES
(52, 'douaa', 'larif', '1999-01-12', '0640731248', 'mlle', 46300, 'Qu Saada Rue Abdessamad El kanfaoui N12', 'maroc', 'Douaa Larif-CV.pdf', 'douaa.larif@gmail.com', '$2y$10$YF87.PfO8iVQppKVNitUCOFT0gW5F7nLXigQ9xnIaDS3FcUGP2qBe', 32, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_city`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id_competence`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `diplomas`
--
ALTER TABLE `diplomas`
  ADD PRIMARY KEY (`id_diploma`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id_language`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `moreinfosuser`
--
ALTER TABLE `moreinfosuser`
  ADD PRIMARY KEY (`id_infos`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id_profession`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `toapply`
--
ALTER TABLE `toapply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_offre` (`id_offre`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_city` (`id_city`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `diplomas`
--
ALTER TABLE `diplomas`
  MODIFY `id_diploma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `moreinfosuser`
--
ALTER TABLE `moreinfosuser`
  MODIFY `id_infos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `professions`
--
ALTER TABLE `professions`
  MODIFY `id_profession` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `toapply`
--
ALTER TABLE `toapply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `diplomas`
--
ALTER TABLE `diplomas`
  ADD CONSTRAINT `diplomas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `moreinfosuser`
--
ALTER TABLE `moreinfosuser`
  ADD CONSTRAINT `moreinfosuser_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `professions`
--
ALTER TABLE `professions`
  ADD CONSTRAINT `professions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `toapply`
--
ALTER TABLE `toapply`
  ADD CONSTRAINT `toapply_ibfk_1` FOREIGN KEY (`id_offre`) REFERENCES `offres` (`id_offre`),
  ADD CONSTRAINT `toapply_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
