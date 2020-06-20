-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Avril 2020 à 11:44
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pratoverde hotels`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('Commagnac', 'admin@pratoverde.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `creditcard` varchar(20) NOT NULL,
  `reservedroomsl` int(3) NOT NULL,
  `price` int(5) NOT NULL,
  `datein` date NOT NULL,
  `dateout` date NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `customer`
--

INSERT INTO `customer` (`name`, `address`, `email`, `password`, `creditcard`, `reservedroomsl`, `price`, `datein`, `dateout`) VALUES
('aaa', 'aaa', 'aaa@gmail.com', 'aaa', '', 0, 0, '0000-00-00', '0000-00-00'),
('dfg', 'dfg', 'dfg@gmail.com', 'dfg', '1234', 100, 150, '2020-01-06', '2020-01-15'),
('ert', 'ert', 'ert@gmail.com', 'ert', '1234', 100, 150, '2020-03-02', '2020-04-14'),
('qsd', 'qsd', 'qsd@gmail.com', 'qsd', '1234', 101, 150, '2020-03-26', '2020-03-27'),
('test', 'test', 'test@gmail.com', 'test', '1234', 101, 150, '2020-03-28', '2020-03-29');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `Serial_Number` int(2) NOT NULL AUTO_INCREMENT,
  `id` int(3) NOT NULL,
  `location` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` int(5) NOT NULL,
  PRIMARY KEY (`Serial_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`Serial_Number`, `id`, `location`, `type`, `price`) VALUES
(1, 101, 'Limoges', 'Famille', 150),
(2, 201, 'Limoges', 'Double', 100),
(3, 301, 'Limoges', 'Simple', 50),
(4, 110, 'Perigueux', 'Famille', 150),
(5, 210, 'Perigueux', 'Double', 100),
(6, 310, 'Perigueux', 'Simple', 50),
(7, 120, 'Toulouse', 'Famille', 150),
(8, 220, 'Toulouse', 'Double', 100),
(9, 321, 'Toulouse', 'Simple', 50),
(12, 100, 'Limoges', 'Famille', 150),
(13, 121, 'Toulouse', 'Famille', 150),
(14, 111, 'Perigueux', 'Famille', 150),
(15, 200, 'Limoges', 'Double', 100),
(16, 211, 'Perigueux', 'Double', 100),
(17, 221, 'Toulouse', 'Double', 100),
(18, 300, 'Limoges', 'Simple', 50),
(19, 311, 'Perigueux', 'Simple', 50),
(20, 320, 'Toulouse', 'Simple', 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
