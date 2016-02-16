-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 15 Février 2016 à 17:12
-- Version du serveur :  5.5.41-0+wheezy1
-- Version de PHP :  5.4.36-0+deb7u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `E145271D`
--

-- --------------------------------------------------------

--
-- Structure de la table `plutoto`
--

CREATE TABLE IF NOT EXISTS `plutoto` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `sentence` varchar(254) NOT NULL,
  `video` varchar(800) DEFAULT NULL,
  `Valide` int(1) NOT NULL,
  `auteur` varchar(200) NOT NULL,
  `voteslike` int(255) NOT NULL,
  `votesdislike` int(255) NOT NULL,
  `dernier_vote` datetime NOT NULL,
  `derniere_ip` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `plutoto`
--

INSERT INTO `plutoto` (`id`, `name`, `sentence`, `video`, `Valide`, `auteur`, `voteslike`, `votesdislike`, `dernier_vote`, `derniere_ip`) VALUES
(1, 'plutoto', 'Le train est arriver plutot tot', '#', 1, '', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'patapote', 'c pas ta pote', '#', 1, '', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'axel', 'axel rambo', NULL, 1, '', 0, 0, '0000-00-00 00:00:00', 0),
(14, 'mecotaké', 'Ce mec est au taquet', NULL, 1, '', 0, 0, '0000-00-00 00:00:00', 0),
(20, 'tesvideo', 'un test video', 'https://www.youtube.com/watch?v=hoIA4TaB9sE', 1, '', 0, 0, '0000-00-00 00:00:00', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `plutoto`
--
ALTER TABLE `plutoto`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `plutoto`
--
ALTER TABLE `plutoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
