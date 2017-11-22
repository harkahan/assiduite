-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 11 Janvier 2017 à 14:39
-- Version du serveur :  5.5.50-0+deb7u2
-- Version de PHP :  5.4.45-1~dotdeb+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `E155781C`
--

-- --------------------------------------------------------

--
-- Structure de la table `Absence`
--

CREATE TABLE IF NOT EXISTS `Absence` (
  `idEtu` int(11) NOT NULL,
  `logProf` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `creneau` time NOT NULL,
  `justifié` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Absence`
--
ALTER TABLE `Absence`
  ADD KEY `idEtu` (`idEtu`), ADD KEY `logProf` (`logProf`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Absence`
--
ALTER TABLE `Absence`
ADD CONSTRAINT `Absence_ibfk_2` FOREIGN KEY (`logProf`) REFERENCES `Professeur` (`login`),
ADD CONSTRAINT `Absence_ibfk_1` FOREIGN KEY (`idEtu`) REFERENCES `Etudiant` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
