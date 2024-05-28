-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 mai 2024 à 20:36
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

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `Mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `video` varchar(50) NOT NULL,
  `ID` int NOT NULL,
  PRIMARY KEY (`Mail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`Mail`, `mdp`, `Nom`, `Prenom`, `photo`, `video`, `ID`) VALUES
('alice@example.com', 'password123', 'Dupont', 'Alice', 'photo1.jpg', 'video1.mp4', 1),
('bob@example.com', 'securePass', 'Martin', 'Bob', 'photo2.jpg', 'video2.mp4', 2),
('carol@example.com', '12345abcde', 'Durand', 'Carol', 'photo3.jpg', 'video3.mp4', 3),
('dave@example.com', 'myPassw0rd', 'Moreau', 'Dave', 'photo4.jpg', 'video4.mp4', 4),
('eve@example.com', 'qwertyuiop', 'Roux', 'Eve', 'photo5.jpg', 'video5.mp4', 5),
('frank@example.com', 'letmein123', 'Petit', 'Frank', 'photo6.jpg', 'video6.mp4', 6),
('grace@example.com', 'password!', 'Garnier', 'Grace', 'photo7.jpg', 'video7.mp4', 7),
('heidi@example.com', 'abc123xyz', 'Lemoine', 'Heidi', 'photo8.jpg', 'video8.mp4', 8),
('ivan@example.com', 'mypassword', 'Lefevre', 'Ivan', 'photo9.jpg', 'video9.mp4', 9),
('judy@example.com', 'password321', 'Faure', 'Judy', 'photo10.jpg', 'video10.mp4', 10);

-- --------------------------------------------------------

--
-- Structure de la table `edt`
--

DROP TABLE IF EXISTS `edt`;
CREATE TABLE IF NOT EXISTS `edt` (
  `id_coach` int NOT NULL,
  `l1` int NOT NULL,
  `l2` int NOT NULL,
  `l3` int NOT NULL,
  `l4` int NOT NULL,
  `l5` int NOT NULL,
  `l6` int NOT NULL,
  `ma1` int NOT NULL,
  `ma2` int NOT NULL,
  `ma3` int NOT NULL,
  `ma4` int NOT NULL,
  `ma5` int NOT NULL,
  `ma6` int NOT NULL,
  `me1` int NOT NULL,
  `me2` int NOT NULL,
  `m3` int NOT NULL,
  `me4` int NOT NULL,
  `me5` int NOT NULL,
  `me6` int NOT NULL,
  `j1` int NOT NULL,
  `j2` int NOT NULL,
  `j3` int NOT NULL,
  `j4` int NOT NULL,
  `j5` int NOT NULL,
  `j6` int NOT NULL,
  `v1` int NOT NULL,
  `v2` int NOT NULL,
  `v3` int NOT NULL,
  `v4` int NOT NULL,
  `v5` int NOT NULL,
  `v6` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `edt`
--

INSERT INTO `edt` (`id_coach`, `l1`, `l2`, `l3`, `l4`, `l5`, `l6`, `ma1`, `ma2`, `ma3`, `ma4`, `ma5`, `ma6`, `me1`, `me2`, `m3`, `me4`, `me5`, `me6`, `j1`, `j2`, `j3`, `j4`, `j5`, `j6`, `v1`, `v2`, `v3`, `v4`, `v5`, `v6`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rendez-vous`
--

DROP TABLE IF EXISTS `rendez-vous`;
CREATE TABLE IF NOT EXISTS `rendez-vous` (
  `Mail_coach` varchar(50) NOT NULL,
  `Mail_client` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `ID` int NOT NULL,
  `Lieu` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
