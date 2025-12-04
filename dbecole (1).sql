-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2025 at 11:21 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecole`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `login`, `mdp`) VALUES
(1, 'Admin1', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_classe`
--

DROP TABLE IF EXISTS `tb_classe`;
CREATE TABLE IF NOT EXISTS `tb_classe` (
  `idClasse` int NOT NULL AUTO_INCREMENT,
  `LibelleClasse` varchar(50) NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_controle`
--

DROP TABLE IF EXISTS `tb_controle`;
CREATE TABLE IF NOT EXISTS `tb_controle` (
  `idControle` int NOT NULL AUTO_INCREMENT,
  `Coef` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idControle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_eleve`
--

DROP TABLE IF EXISTS `tb_eleve`;
CREATE TABLE IF NOT EXISTS `tb_eleve` (
  `idEleve` int NOT NULL AUTO_INCREMENT,
  `nomEleve` varchar(50) NOT NULL,
  `prenomEleve` varchar(50) NOT NULL,
  `loginEleve` varchar(50) NOT NULL,
  `mdpEleve` varchar(255) NOT NULL,
  `idClasseEleve` int NOT NULL,
  PRIMARY KEY (`idEleve`),
  KEY `FK1` (`idClasseEleve`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_eleve`
--

INSERT INTO `tb_eleve` (`idEleve`, `nomEleve`, `prenomEleve`, `loginEleve`, `mdpEleve`, `idClasseEleve`) VALUES
(1, 'nomeleve1', 'prenomeleve1', 'eleve1', 'Test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_enseignant`
--

DROP TABLE IF EXISTS `tb_enseignant`;
CREATE TABLE IF NOT EXISTS `tb_enseignant` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `Identifiant` varchar(50) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_enseignant`
--

INSERT INTO `tb_enseignant` (`idUser`, `Identifiant`, `Motdepasse`, `Nom`, `Prenom`) VALUES
(1, 'enseignant1', 'Test', 'nomEnseignant1', 'PrenomEnseignant1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_enseigner`
--

DROP TABLE IF EXISTS `tb_enseigner`;
CREATE TABLE IF NOT EXISTS `tb_enseigner` (
  `idUser` int NOT NULL,
  `idMat` int NOT NULL,
  `idClasse` int NOT NULL,
  PRIMARY KEY (`idUser`,`idMat`,`idClasse`),
  KEY `idMat` (`idMat`),
  KEY `idClasse` (`idClasse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matiere`
--

DROP TABLE IF EXISTS `tb_matiere`;
CREATE TABLE IF NOT EXISTS `tb_matiere` (
  `idMat` int NOT NULL AUTO_INCREMENT,
  `LibelleMat` varchar(50) NOT NULL,
  PRIMARY KEY (`idMat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_participer`
--

DROP TABLE IF EXISTS `tb_participer`;
CREATE TABLE IF NOT EXISTS `tb_participer` (
  `idEleve` int NOT NULL,
  `idControle` int NOT NULL,
  `idMat` int NOT NULL,
  `Note` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idEleve`,`idControle`,`idMat`),
  KEY `idControle` (`idControle`),
  KEY `idMat` (`idMat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
