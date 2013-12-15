-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 15 Décembre 2013 à 22:23
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
-- Structure de la table `configurations`
--

DROP TABLE IF EXISTS `configurations`;
CREATE TABLE IF NOT EXISTS `configurations` (
  `name` varchar(10) NOT NULL,
  `value` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Configuration table this has no relation with the normal configuration of CI';

--
-- Vider la table avant d'insérer `configurations`
--

TRUNCATE TABLE `configurations`;
--
-- Contenu de la table `configurations`
--

INSERT INTO `configurations` (`name`, `value`, `comment`) VALUES
('admin_pass', 'password', 'Administration Password \r\nthis is stored in clear text for testing reason and needs to be encrypted for production'),
('admin_user', 'admin', 'Administration username used to access the  configuration '),
('lnch_brk_e', '14', 'Lunch break end hour (24 hour format ) '),
('lnch_brk_s', '12', 'Lunch break start hour (24hour format )'),
('visit_end', '17', 'The time of the last meeting of a working day (24 hour format)'),
('visit_strt', '9', 'the hour when visitation start on a normal day '),
('w_day_off', '7', 'the number of the weekly day off\r\nsame as result of date ("N") \r\n1=Monday....7=Sunday');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
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
-- Vider la table avant d'insérer `patients`
--

TRUNCATE TABLE `patients`;
--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `nom`, `prenom`, `email`) VALUES
(8, 'amin', 'amin2', 'amin@amin.com'),
(7, 'feker', 'feker2', 'feker@feker.com');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reserv` int(4) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `lenght` int(11) NOT NULL,
  `date_time_start` datetime DEFAULT NULL,
  PRIMARY KEY (`id_reserv`),
  UNIQUE KEY `id_reserv` (`id_reserv`),
  UNIQUE KEY `date_time_start` (`date_time_start`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Vider la table avant d'insérer `reservation`
--

TRUNCATE TABLE `reservation`;
--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_reserv`, `patient_id`, `lenght`, `date_time_start`) VALUES
(1, 8, 1, '2013-12-07 14:00:00'),
(2, 7, 1, '2013-12-01 10:00:00'),
(3, 7, 1, '2013-12-01 11:00:00'),
(4, 7, 1, '2013-12-01 15:00:00'),
(7, 7, 1, '2013-12-01 09:00:00'),
(8, 7, 1, '2013-12-01 14:00:00'),
(9, 7, 1, '2013-12-01 16:00:00'),
(10, 7, 1, '2013-12-01 17:00:00'),
(11, 7, 1, '2013-12-02 10:00:00'),
(12, 7, 1, '2013-12-02 14:00:00'),
(13, 7, 1, '2013-12-02 11:00:00'),
(14, 7, 1, '2013-12-02 09:00:00'),
(15, 7, 1, '2013-12-02 15:00:00'),
(16, 7, 1, '2013-12-02 16:00:00'),
(17, 7, 1, '2013-12-02 17:00:00'),
(18, 7, 1, '2013-12-03 10:00:00'),
(20, 7, 1, '2013-12-03 11:00:00'),
(21, 7, 1, '2013-12-03 15:00:00'),
(23, 7, 1, '2013-12-03 09:00:00'),
(24, 7, 1, '2013-12-03 14:00:00'),
(25, 7, 1, '2013-12-03 16:00:00'),
(26, 7, 1, '2013-12-03 17:00:00'),
(27, 8, 1, '2013-12-28 17:00:00'),
(28, 8, 1, '2013-12-15 09:00:00'),
(29, 7, 1, '2013-12-15 11:00:00'),
(30, 7, 1, '2013-12-17 09:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
