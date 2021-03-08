-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 mars 2021 à 11:09
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `plome`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int NOT NULL AUTO_INCREMENT,
  `promotion` varchar(255) NOT NULL,
  `groupe` varchar(255) NOT NULL,
  `anneeDiplome` int NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `promotion`, `groupe`, `anneeDiplome`) VALUES
(1, 'I2', 'G1', 2022),
(2, 'I2', 'G2', 2022),
(3, 'I2', 'G3', 2022),
(4, 'I2', 'G4', 2022),
(5, 'I2', 'G5', 2022),
(6, 'I2', 'G6', 2022),
(7, 'I1', 'G1', 2023),
(8, 'I1', 'G2', 2023),
(9, 'I1', 'G3', 2023),
(10, 'I1', 'G4', 2023),
(11, 'I1', 'G5', 2023),
(12, 'I1', 'G6', 2023),
(13, 'I1', 'G7', 2023),
(14, 'I1', 'G8', 2023),
(15, 'I3', 'G6', 2021),
(16, 'I3', 'G1', 2021),
(17, 'I3', 'G2', 2021),
(18, 'I3', 'G3', 2021),
(19, 'I3', 'G4', 2021),
(20, 'I3', 'G5', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvenement` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `dateEvt` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `idMatiere` int NOT NULL,
  `typeRendu` varchar(255) NOT NULL,
  `idClasse` int NOT NULL,
  `idType` int NOT NULL,
  PRIMARY KEY (`idEvenement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `nom`, `dateEvt`, `description`, `idMatiere`, `typeRendu`, `idClasse`, `idType`) VALUES
(1, 'DS Electronique', '2021-03-02', 'Loi d\'ohm, loi des noeuds, etc. à apprendre par cœur !', 1, '', 1, 1),
(2, 'DS Electronique', '2021-06-18', 'Loi d\'ohm, loi des noeuds, etc. à apprendre par cœur !', 1, '', 19, 1),
(3, 'EI AnaNum', '2021-04-15', 'Euler Taylor2 RungeKutta', 4, '', 1, 2),
(4, 'DS Sécurité', '2021-01-12', '', 5, '', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lienutilisateurrole`
--

DROP TABLE IF EXISTS `lienutilisateurrole`;
CREATE TABLE IF NOT EXISTS `lienutilisateurrole` (
  `idRole` int NOT NULL,
  `idUtilisateur` int NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idRole`,`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lienutilisateurrole`
--

INSERT INTO `lienutilisateurrole` (`idRole`, `idUtilisateur`, `valide`) VALUES
(1, 1, 0),
(1, 2, 0),
(2, 1, 0),
(3, 1, 0),
(4, 1, 0),
(5, 1, 0),
(5, 2, 0),
(6, 1, 0),
(7, 1, 0),
(8, 1, 0),
(8, 2, 0),
(9, 1, 0),
(10, 1, 0),
(10, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `idMatiere` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idMatiere`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nom`) VALUES
(1, 'Electronique'),
(2, 'Java'),
(3, 'Maths'),
(4, 'Analyse Numerique'),
(5, 'Sécurité'),
(6, 'Anglais'),
(7, 'Web'),
(8, 'DotNet'),
(9, 'Php'),
(10, 'IA');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(255) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `nomRole`) VALUES
(1, 'eleve'),
(2, 'delegue');

-- --------------------------------------------------------

--
-- Structure de la table `typeevenement`
--

DROP TABLE IF EXISTS `typeevenement`;
CREATE TABLE IF NOT EXISTS `typeevenement` (
  `idTypeEvenement` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idTypeEvenement`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeevenement`
--

INSERT INTO `typeevenement` (`idTypeEvenement`, `nom`) VALUES
(1, 'DS'),
(2, 'EI'),
(3, 'TOEIC'),
(4, 'FORUM'),
(5, 'SOUTENANCE'),
(6, 'DSM');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `idClasse` int NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `mail`, `mdp`, `idClasse`) VALUES
(1, 'jdupont@3il.fr', '1234', 1),
(2, 'fdupon@3il.fr', '1234', 1),
(3, 'fkarli@3il.fr', '1234', 2),
(4, 'abichon@3il.fr', '1234', 6),
(5, 'plicant@3il.fr', '1234', 19),
(6, 'dtarine@3il.fr', '1234', 15),
(7, 'bminner@3il.fr', '1234', 19),
(8, 'kpublie@3il.fr', '1234', 3),
(9, 'slature@3il.fr', '1234', 5),
(10, 'itilidi@3il.fr', '1234', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
