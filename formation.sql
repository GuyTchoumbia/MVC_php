-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 01, 2018 at 04:44 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formation`
--

-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `id_formateur` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `id_salle` int(11) NOT NULL,
  PRIMARY KEY (`id_formateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`id_formateur`, `nom`, `prenom`, `id_salle`) VALUES
(1, 'Dupont', 'Robert', 1),
(2, 'Martin', 'Alexis', 2),
(3, 'Durand', 'Paul', 3),
(4, 'Duval', 'Alain', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nationalite`
--

DROP TABLE IF EXISTS `nationalite`;
CREATE TABLE IF NOT EXISTS `nationalite` (
  `id_nationalite` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id_nationalite`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nationalite`
--

INSERT INTO `nationalite` (`id_nationalite`, `libelle`) VALUES
(1, 'Français'),
(2, 'Anglais'),
(3, 'Allemand'),
(4, 'Russe');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `libelle`) VALUES
(1, '101'),
(2, '102'),
(3, '201'),
(4, '202');

-- --------------------------------------------------------

--
-- Table structure for table `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `id_nationalite` int(11) NOT NULL,
  `id_type_formation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stagiaire`
--

INSERT INTO `stagiaire` (`id`, `nom`, `prenom`, `id_nationalite`, `id_type_formation`) VALUES
(1, 'Sharapova', 'Nadia', 4, 1),
(2, 'Monfils', 'Boby', 1, 2),
(8, 'Murray', 'Bill', 2, 1),
(4, 'Becker', 'Josephine', 3, 2),
(6, 'Dupont', 'Robert', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stagiaire_formateur`
--

DROP TABLE IF EXISTS `stagiaire_formateur`;
CREATE TABLE IF NOT EXISTS `stagiaire_formateur` (
  `id_stagiaire` int(11) NOT NULL,
  `id_formateur` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stagiaire_formateur`
--

INSERT INTO `stagiaire_formateur` (`id_stagiaire`, `id_formateur`, `date_debut`, `date_fin`) VALUES
(1, 1, '2013-07-25', '2013-10-28'),
(1, 2, '2013-10-31', '2013-12-30'),
(2, 4, '2013-08-26', '2013-10-18'),
(8, 2, '2013-08-15', '2014-02-15'),
(6, 4, '2013-08-21', '2013-10-21'),
(4, 3, '2013-08-17', '2014-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `type_formation`
--

DROP TABLE IF EXISTS `type_formation`;
CREATE TABLE IF NOT EXISTS `type_formation` (
  `id_type_formation` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id_type_formation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_formation`
--

INSERT INTO `type_formation` (`id_type_formation`, `libelle`) VALUES
(1, 'Web designer'),
(2, 'Développeur');

-- --------------------------------------------------------

--
-- Table structure for table `type_formation_formateur`
--

DROP TABLE IF EXISTS `type_formation_formateur`;
CREATE TABLE IF NOT EXISTS `type_formation_formateur` (
  `id_type_formation` int(11) NOT NULL,
  `id_formateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_formation_formateur`
--

INSERT INTO `type_formation_formateur` (`id_type_formation`, `id_formateur`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
