-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 déc. 2025 à 10:42
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
-- Base de données : `dbecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `login`, `mdp`) VALUES
(1, 'admin1', 'adminpass123');

-- --------------------------------------------------------

--
-- Structure de la table `tb_classe`
--

DROP TABLE IF EXISTS `tb_classe`;
CREATE TABLE IF NOT EXISTS `tb_classe` (
  `idClasse` int NOT NULL AUTO_INCREMENT,
  `LibelleClasse` varchar(50) NOT NULL,
  `Niveaux` varchar(10) NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tb_classe`
--

INSERT INTO `tb_classe` (`idClasse`, `LibelleClasse`, `Niveaux`) VALUES
(3, '1er1', '1er'),
(4, '1er2', '1er'),
(5, '2nd1', '2nd'),
(6, '2nd2', '2nd'),
(7, 'term1', 'terminale'),
(8, 'term2', 'terminale');

-- --------------------------------------------------------

--
-- Structure de la table `tb_controle`
--

DROP TABLE IF EXISTS `tb_controle`;
CREATE TABLE IF NOT EXISTS `tb_controle` (
  `idControle` int NOT NULL AUTO_INCREMENT,
  `Coef` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idControle`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tb_controle`
--

INSERT INTO `tb_controle` (`idControle`, `Coef`, `titre`, `description`, `date`) VALUES
(1, 1, 'chapitre 1', 'Controle sur le cour de math', '2025-01-15'),
(2, 3, 'chapitre 2', 'controle sur le cour d\'histoire', '2025-02-03');

-- --------------------------------------------------------

--
-- Structure de la table `tb_eleve`
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tb_eleve`
--

INSERT INTO `tb_eleve` (`idEleve`, `nomEleve`, `prenomEleve`, `loginEleve`, `mdpEleve`, `idClasseEleve`) VALUES
(1, 'Chevalier', 'Théo', 'Tchevalier', 'chevalit', 3),
(2, 'Chevalier', 'Arthur', 'Achevalier', 'chevalit', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tb_enseignant`
--

DROP TABLE IF EXISTS `tb_enseignant`;
CREATE TABLE IF NOT EXISTS `tb_enseignant` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `Identifiant` varchar(50) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tb_enseignant`
--

INSERT INTO `tb_enseignant` (`idUser`, `Identifiant`, `Motdepasse`, `Nom`, `Prenom`) VALUES
(1, 'Dallier', 'Sdallier', 'Dallier', 'Sylvia'),
(2, 'Gaullier', 'Sgaullier', 'Gaullier', 'Sébastien');

-- --------------------------------------------------------

--
-- Structure de la table `tb_enseigner`
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

--
-- Déchargement des données de la table `tb_enseigner`
--

INSERT INTO `tb_enseigner` (`idUser`, `idMat`, `idClasse`) VALUES
(1, 3, 3),
(1, 3, 4),
(2, 1, 3),
(2, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tb_matiere`
--

DROP TABLE IF EXISTS `tb_matiere`;
CREATE TABLE IF NOT EXISTS `tb_matiere` (
  `idMat` int NOT NULL AUTO_INCREMENT,
  `LibelleMat` varchar(50) NOT NULL,
  PRIMARY KEY (`idMat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tb_matiere`
--

INSERT INTO `tb_matiere` (`idMat`, `LibelleMat`) VALUES
(1, 'Math'),
(2, 'Français'),
(3, 'histoire');

-- --------------------------------------------------------

--
-- Structure de la table `tb_participer`
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

--
-- Déchargement des données de la table `tb_participer`
--

INSERT INTO `tb_participer` (`idEleve`, `idControle`, `idMat`, `Note`) VALUES
(1, 1, 1, '18'),
(2, 1, 1, '17'),
(1, 2, 3, '12'),
(2, 2, 3, '14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
