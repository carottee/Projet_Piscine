-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 01 juin 2024 à 20:59
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`Mail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Mail`, `mdp`, `Nom`) VALUES
('pierre.tailhades@edu.ece.fr', 'Cptat2PC', 'Tailhades'),
('thais.leclaire@edu.ece.fr', '12345678', 'Thaïs'),
('lucie.daix@edu.ece.fr', '12345678', 'Lucie'),
('noemie.daou@edu.ece.fr', '12345678', 'Noémie');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `ID` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `carte` varchar(50) NOT NULL,
  PRIMARY KEY (`Mail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Mail`, `mdp`, `Nom`, `Prenom`, `ID`, `Adresse`, `carte`) VALUES
('pierro@gmail.com', '1', 'pierrot', 'lapin', '1', '8 rue du marechal', '123456789'),
('pierro.lapin@gmail.com', '2', 'lapin', 'pierrot', '1', '9 rue de beatrice potter', '147258369'),
('client@gmail.com', '123', 'Pierre', 'Tailhades', '1', '8 rue des kayous', '159'),
('client1@gmail.com', '123', 'tailhades', 'pierre', '1', '9 rue felix faure', '159'),
('client2@gmail.com', '123', 'Tailhades', 'Pierre', '1', '9 rue felix faure', '159'),
('client3@gmail.com', '123', 'Tailhades', 'Pierre', '1', '9 rue felix faure', '159'),
('client4@gmail.com', '123', 'Tailhades', 'Pierre', '1', '9 rue felix faure', '159'),
('client5@gmail.com', '123', 'Tailhades', 'Pierre', '1', '9 rue felix faure', '159');

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `video` varchar(50) NOT NULL,
  `discipline` varchar(50) NOT NULL,
  `CV` varchar(50) NOT NULL,
  `num` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`ID`, `Mail`, `mdp`, `Nom`, `Prenom`, `photo`, `video`, `discipline`, `CV`, `num`) VALUES
(1, 'adrien.dupont@gmail.com', 'password123', 'Dupont', 'Adrien', 'coatch-musculation.jpg', '', 'musculation', 'cv-musculation.pdf', '0612345678'),
(2, 'bob.martin@gmail.com', 'securePass', 'Martin', 'Bob', 'coatch-plongeon.jpg', '', 'plongeon', 'cv-plongeon.pdf', '0687654321'),
(3, 'charles.durand@gmail.com', '12345abcde', 'Durand', 'Charles', 'coatch-cardio.jpg', '', 'cardio', 'cv-cardio.pdf', '0723456789'),
(4, 'dave.moreau@gmail.com', 'myPassw0rd', 'Moreau', 'Dave', 'coatch-step.jpg', '', 'step', 'cv-step.pdf', '0654321098'),
(5, 'eve.roux@gmail.com', 'qwertyuiop', 'Roux', 'Eve', 'coatch-courscollectifs.jpg', '', 'courscollectifs', 'cv-cours-collectif.pdf', '0756789012'),
(6, 'frank.petit@gmail.com', 'letmein123', 'Petit', 'Frank', 'coatch-basketball.jpg', '', 'basketball', 'cv-basketball.pdf', '0698765432'),
(7, 'grace.garnier@gmail.com', 'password!', 'Garnier', 'Grace', 'coatch-football.jpg', '', 'football', 'cv-football.pdf', '0765432109'),
(8, 'eric.lemoine@gmail.com', 'abc123xyz', 'Lemoine', 'Eric', 'coatch-rugby.jpg', '', 'rugby', 'cv-rugby.pdf', '0623456789'),
(9, 'isildure.lefevre@gmail.com', 'mypassword', 'Lefevre', 'Isildure', 'coatch-tennis.jpg', '', 'tennis', 'cv-tennis.pdf', '0712345678'),
(10, 'julien.faure@gmail.com', 'password321', 'Faure', 'Julien', 'coatch-natation.jpg', '', 'natation', 'cv-natation.pdf', '0687654321'),
(11, 'emilie.bianchini@gmail.com', '12345678', 'Bianchini', 'Emilie', 'coatch-biking.jpg', '', 'biking', 'cv-biking.pdf', '0734567890'),
(12, 'jeanpierre.segado@gmail.com', '12345678', 'Segado', 'Jean Pierre', 'coatch-fitness.jpg', '', 'fitness', 'cv-fitness.pdf', '0643210987');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `numero` int NOT NULL,
  `cvv` int NOT NULL,
  `dateExpi` date NOT NULL,
  `Solde` int NOT NULL DEFAULT '300',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `mail`, `numero`, `cvv`, `dateExpi`, `Solde`) VALUES
(1, 'client@gmail.com', 2147483647, 123, '2025-12-31', 300),
(2, 'client2@gmail.com', 2147483647, 456, '2024-11-30', 300),
(3, 'client3@gmail.com', 2147483647, 789, '2026-10-31', 300),
(4, 'client4@gmail.com', 2147483647, 12, '2023-09-30', 300),
(5, 'client5@gmail.com', 2147483647, 345, '2027-08-31', 300);

-- --------------------------------------------------------

--
-- Structure de la table `edt`
--

DROP TABLE IF EXISTS `edt`;
CREATE TABLE IF NOT EXISTS `edt` (
  `id_coach` int NOT NULL,
  `l` int NOT NULL,
  `ld` int NOT NULL,
  `ma` int NOT NULL,
  `mad` int NOT NULL,
  `me` int NOT NULL,
  `med` int NOT NULL,
  `j` int NOT NULL,
  `jd` int NOT NULL,
  `v` int NOT NULL,
  `vd` int NOT NULL,
  `s` int NOT NULL,
  `sd` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `edt`
--

INSERT INTO `edt` (`id_coach`, `l`, `ld`, `ma`, `mad`, `me`, `med`, `j`, `jd`, `v`, `vd`, `s`, `sd`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Coaching individuel', '1 session', 50.00, 'coaching_ind_u.jpg'),
(2, 'Coaching individuel', '10 sessions', 450.00, 'coaching_ind_d.jpg'),
(3, 'Coaching duo', '1 session.', 80.00, 'coaching_duo_u.jpg'),
(4, 'Coaching duo', '10 session.', 700.00, 'coaching_duo_d.jpg'),
(5, 'Coaching de groupe', '1 session.', 100.00, 'coaching_grp_u.jpg'),
(6, 'Coaching de groupe', '10 sessions.', 900.00, 'coaching_grp_d.jpg'),
(7, 'remise 20% coaching individuel', '1 session', 40.00, 'coaching_bien_etre.jpg'),
(8, 'remise 15% coaching individuel', '10 sessions', 382.50, 'coaching_posture_mobilite.jpg'),
(9, 'Barres Protéinées', '', 20.00, 'barres_proteinees.jpg'),
(10, 'Shakes Protéinés', '', 15.00, 'shakes_proteines.jpg'),
(11, 'Compléments Vitaminés', '', 25.00, 'complements_vitamines.jpg'),
(12, 'Granola Healthy', '', 10.00, 'granola_healthy.jpg'),
(13, 'Boisson Énergisante', '', 5.00, 'boisson_energisante.jpg'),
(14, 'Barres Céréales', '', 12.00, 'barres_cereales.jpg'),
(15, 'Noix et Graines', '', 8.00, 'noix_et_graines.jpg'),
(16, 'Repas Déshydratés', '', 18.00, 'repas_deshydrates.jpg'),
(17, 'Protéine en Poudre', '', 22.00, 'proteine_en_poudre.jpg'),
(18, 'Snacks Sains', '', 6.00, 'snacks_sains.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `mail_coach` varchar(50) NOT NULL,
  `mail_client` varchar(50) NOT NULL,
  `passe` int NOT NULL,
  `creneau` varchar(50) NOT NULL,
  `ID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`mail_coach`, `mail_client`, `passe`, `creneau`, `ID`) VALUES
('adrien.dupont@gmail.com', 'client@gmail.com', 0, 'l', 4);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `statut` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`statut`, `mail`) VALUES
('0', 'client@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
