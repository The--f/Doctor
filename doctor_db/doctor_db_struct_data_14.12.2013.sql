-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Sam 14 Décembre 2013 à 11:57
-- Version du serveur: 5.6.11
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `doctor_db`
--
CREATE DATABASE IF NOT EXISTS `doctor_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `doctor_db`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `Test_procedure`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Test_procedure`(IN `R` INT(3))
    NO SQL
    DETERMINISTIC
select * from reservation where patient_id in (select id from Patient where  nom = R )$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--
-- Création: Dim 24 Novembre 2013 à 21:33
-- Dernière modification: Ven 13 Décembre 2013 à 21:15
-- Dernière vérification: Ven 13 Décembre 2013 à 21:15
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `nom`, `prenom`, `email`) VALUES
(8, 'amin', 'amin', 'amin@amin.com'),
(7, 'feker', 'feker', 'feker@feker.com');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--
-- Création: Ven 13 Décembre 2013 à 21:39
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reserv` int(4) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `lenght` int(11) NOT NULL,
  `date_time_start` datetime DEFAULT NULL,
  PRIMARY KEY (`id_reserv`),
  UNIQUE KEY `id_reserv` (`id_reserv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- RELATIONS POUR LA TABLE `reservation`:
--   `patient_id`
--       `patients` -> `id`
--

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_reserv`, `patient_id`, `lenght`, `date_time_start`) VALUES
(1, 7, 1, '2013-12-09 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
