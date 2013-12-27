-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Ven 27 Décembre 2013 à 04:27
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
  `name` varchar(20) NOT NULL,
  `value` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Configuration table this has no relation with the normal configuration of CI';

--
-- Contenu de la table `configurations`
--

INSERT INTO `configurations` (`name`, `value`, `comment`) VALUES
('admin_pass', 'password', 'Administration Password \r\nthis is stored in clear text for testing reason and needs to be encrypted for production'),
('admin_user', 'admin', 'Administration username used to access the  configuration '),
('lnch_brk_end', '14', 'Lunch break end hour (24 hour format ) '),
('lnch_brk_start', '12', 'Lunch break start hour (24hour format )'),
('mail_host', 'smtp.googlemail.com', 'mail server used '),
('mail_password', 'doctor123456789', 'paasword used to authenticate to mail server '),
('mail_port', '25', ''),
('mail_protocol', 'smtp', 'Mail protocol to be used \r\ngenerally SMTP'),
('mail_user_name', 'doctorreservation@gmail.com', 'user name to authenticate to the mail server '),
('visit_end', '17', 'The time of the last meeting of a working day (24 hour format)'),
('visit_strt', '9', 'the hour when visitation start on a normal day '),
('weekly_day_off', '7', 'the number of the weekly day off\r\nsame as result of date ("N") \r\n1=Monday....7=Sunday');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `nom`, `prenom`, `email`) VALUES
(8, 'amin', 'amin2', 'amin@amin.com'),
(7, 'feker', 'feker2', 'feker@feker.com'),
(9, 'am2', 'ammmm3', 'aminnnn@ee.comm'),
(1, 'admin', 'admin', 'admin'),
(11, 'testuser', 'usertest', 'testuser@test.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_reserv`, `patient_id`, `lenght`, `date_time_start`) VALUES
(1, 7, 1, '2013-12-28 10:00:00'),
(2, 7, 1, '2013-12-28 15:00:00'),
(3, 7, 1, '2013-12-28 14:00:00'),
(4, 8, 1, '2013-12-28 16:00:00'),
(5, 1, 1, '2013-12-28 17:00:00'),
(10, 1, 1, '2013-12-27 11:00:00'),
(11, 1, 1, '2013-12-27 14:00:00'),
(13, 1, 1, '2013-12-28 11:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
