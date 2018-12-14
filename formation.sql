-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 14 déc. 2018 à 14:36
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `id_formateur` varchar(13) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `id_salle` varchar(13) NOT NULL,
  PRIMARY KEY (`id_formateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`id_formateur`, `nom`, `prenom`, `id_salle`) VALUES
('5be2ffded242f', 'Dupont', 'Robert', '5be300702398c'),
('5be2ffded2649', 'Martin', 'Alexis', '5be3007023ae9'),
('5be2ffded27bc', 'Durand', 'Paul', '5be3007023bcd'),
('5be2ffded299e', 'Duval', 'Alain', '5be3007023c70');

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

DROP TABLE IF EXISTS `nationalite`;
CREATE TABLE IF NOT EXISTS `nationalite` (
  `id_nationalite` varchar(13) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id_nationalite`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nationalite`
--

INSERT INTO `nationalite` (`id_nationalite`, `libelle`) VALUES
('5be3002253b6a', 'Français'),
('5be3002253ccb', 'Anglais'),
('5be3002253ddc', 'Allemand'),
('5be3002253eb2', 'Russe');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` varchar(13) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `libelle`) VALUES
('5be300702398c', '101'),
('5be3007023ae9', '102'),
('5be3007023bcd', '201'),
('5be3007023c70', '202');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `id` varchar(13) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `id_nationalite` varchar(13) NOT NULL,
  `id_type_formation` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`id`, `nom`, `prenom`, `id_nationalite`, `id_type_formation`) VALUES
('5be2fa3a502dd', 'Monfils', 'Boby', '5be3002253b6a', '5be300465efb3'),
('5be2fa3a505ae', 'Murray', 'Bill', '5be3002253ccb', '5be300465efb3'),
('5be2fa3a5074a', 'Becker', 'Josephine', '5be3002253ddc', '5be300465f14f'),
('5be2fa3a508fc', 'Dupont', 'Robert', '5be3002253b6a', '5be300465f14f'),
('5be9534d2819e', 'dsfsdf', 'sdfsdfsdf', '5be3002253ccb', '5be300465efb3'),
('5be97eb73b4cc', 'xwfxx', 'wxfwfwxf', '5be3002253ccb', '5be300465efb3');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire_formateur`
--

DROP TABLE IF EXISTS `stagiaire_formateur`;
CREATE TABLE IF NOT EXISTS `stagiaire_formateur` (
  `id_stagiaire` varchar(13) NOT NULL,
  `id_formateur` varchar(13) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stagiaire_formateur`
--

INSERT INTO `stagiaire_formateur` (`id_stagiaire`, `id_formateur`, `date_debut`, `date_fin`) VALUES
('5be2fa3a5074a', '5be2ffded299e', '2013-08-21', '2013-10-21'),
('5be2fa3a505ae', '5be2ffded27bc', '2013-08-17', '2014-02-21'),
('5be958867ebe7', '5be2ffded242f', '2018-11-15', '2018-11-16'),
('5be97eb73b4cc', '5be2ffded2649', '2018-11-14', '2018-11-23'),
('5be2fa3a508fc', '5be2ffded27bc', '2018-11-01', '2018-11-30'),
('24', '1', '2018-11-06', '2018-11-23'),
('24', '2', '2018-11-01', '2018-11-08'),
('24', '3', '2018-11-01', '2018-11-30'),
('5be3f922a12eb', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3f970cc3f0', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3f9a685f78', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3f9a7e2489', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa4460f6e', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa701fedf', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa71520aa', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa724e636', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa732e7a2', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa74092c2', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa750b895', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fa7652692', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3faf15a26e', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fb6ebec1d', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fb86a6823', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fc162720a', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fc342f0a8', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fc476f3a0', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be3fc90ab018', '5be2ffded242f', '2018-11-21', '2018-11-30'),
('5be9534d2819e', '5be2ffded242f', '2018-11-08', '2018-11-09'),
('5be2fa3a502dd', '5be2ffded2649', '2018-11-14', '2018-11-22'),
('5be5ae3ace6a5', '5be2ffded242f', '2018-11-15', '2018-11-23'),
('5be5ada1c15b8', '5be2ffded27bc', '2018-11-15', '2018-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

DROP TABLE IF EXISTS `type_formation`;
CREATE TABLE IF NOT EXISTS `type_formation` (
  `id_type_formation` varchar(13) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id_type_formation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_formation`
--

INSERT INTO `type_formation` (`id_type_formation`, `libelle`) VALUES
('5be300465efb3', 'Web designer'),
('5be300465f14f', 'Développeur');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation_formateur`
--

DROP TABLE IF EXISTS `type_formation_formateur`;
CREATE TABLE IF NOT EXISTS `type_formation_formateur` (
  `id_type_formation` varchar(13) NOT NULL,
  `id_formateur` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_formation_formateur`
--

INSERT INTO `type_formation_formateur` (`id_type_formation`, `id_formateur`) VALUES
('5be300465efb3', '5be2ffded242f'),
('5be300465efb3', '5be2ffded2649'),
('5be300465f14f', '5be2ffded27bc'),
('5be300465f14f', '5be2ffded299e'),
('5be300465efb3', '5be2ffded27bc');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
