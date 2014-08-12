-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 28 Août 2013 à 19:28
-- Version du serveur: 5.5.24
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `carnet`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `idNom` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) DEFAULT NULL,
  `nom` text,
  `telephone` varchar(10) DEFAULT NULL,
  `courriel` varchar(100) DEFAULT NULL,
  `codepostal` varchar(6) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idNom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`idNom`, `prenom`, `nom`, `telephone`, `courriel`, `codepostal`, `image`) VALUES
(3, 'Carl', 'Moelbat', '5144564', 'cal@moelbat', NULL, 'http://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Batt-Dennis.jpg/502px-Batt-Dennis.jpg'),
(11, 'Bobe', 'Gratton', '1234567899', 'bob@asd.com', NULL, 'http://www.librarising.com/astrology/celebs/images2/B/bobgratton.jpg'),
(13, 'Gilles', 'McPixel', 'McPixel', 'McPixel', NULL, 'http://image.spreadshirt.com/image-server/v1/compositions/20456414/views/1,width=280,height=280,appe'),
(17, 'Jo', 'Des', '1234567899', 'bob@asd.com', NULL, 'https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn2/q71/971342_10151530819351279_1283123075_n.jpg'),
(18, 'J', 'Query', '1234567899', '$@jquery.com', NULL, 'http://blog.cozic.fr/wp-content/uploads/2010/01/jquery-logo.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
