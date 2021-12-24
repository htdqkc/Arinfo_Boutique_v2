-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 déc. 2021 à 03:18
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arinfoboutiquev2`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

DROP TABLE IF EXISTS `adresses`;
CREATE TABLE IF NOT EXISTS `adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_postal` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `desc_short` varchar(255) NOT NULL,
  `price` int(110) NOT NULL,
  `count` int(11) NOT NULL,
  `id_gamme` int(11) NOT NULL,
  `stock` int(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_3` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `fk` (`id_gamme`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `image`, `title`, `description`, `desc_short`, `price`, `count`, `id_gamme`, `stock`) VALUES
(3, 'https://m.media-amazon.com/images/I/71MFZZWSvRL._AC_UX342_.jpg', 'Montre', 'BENYAR Montre Homme chronographe pour Homme Mouvement à Quartz Bracelet en Cuir Montre de Sport d\'affaires de Mode 30M étanche et Anti-Rayures ', 'BENYAR Montre Homme chronographe pour Homme', 60, 1, 1, 0),
(5, 'https://media.discordapp.net/attachments/916990487943086120/923572126546530334/unknown.png?width=510&height=613', 'Hoshy', 'BENYAR Montre Homme chronographe pour Homme Mouvement à Quartz Bracelet en Cuir Montre de Sport d\'affaires de Mode 30M étanche et Anti-Rayures ', 'BENYAR Montre Homme chronographe pour Homme', 60, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `nom`, `prenom`) VALUES
(10, 'b@b.fr', '', 'cc', 'cc'),
(11, 'x@x.fr', 'x@x.fr', 'clement', 'sorio'),
(12, 'a@mal.lu', '', 'c', 'c'),
(13, 'clement@mal.lu', '', 'soriot', 'clement'),
(14, 'a', 'aa', '', ''),
(15, 'aa@mal.lu', 'aa@mal.lu', 'a', 'a'),
(16, 'x@mal.lu', 'x@mal.lu', 'c', 'b');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `numero`, `date`, `prix`) VALUES
(184, 1, '', 0),
(185, 1, '', 0),
(186, 0, '0', 1),
(187, 0, '0', 1),
(188, 0, '0', 1),
(189, 0, '0', 1),
(190, 0, '0', 1),
(191, 0, '0', 1),
(192, 0, '0', 1),
(193, 0, '0', 1),
(194, 0, '0', 1),
(195, 0, '0', 1),
(196, 0, '0', 1),
(197, 0, '0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes_articles`
--

DROP TABLE IF EXISTS `commandes_articles`;
CREATE TABLE IF NOT EXISTS `commandes_articles` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  UNIQUE KEY `id_articles` (`id_commande`),
  KEY `id_articles_2` (`id_commande`),
  KEY `id_articles_3` (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes_articles`
--

INSERT INTO `commandes_articles` (`id_commande`, `id_article`, `quantite`) VALUES
(190, 3, 1),
(191, 3, 1),
(192, 5, 1),
(193, 3, 1),
(194, 5, 1),
(195, 5, 4),
(196, 3, 1),
(197, 5, 14);

-- --------------------------------------------------------

--
-- Structure de la table `gammes`
--

DROP TABLE IF EXISTS `gammes`;
CREATE TABLE IF NOT EXISTS `gammes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gammes`
--

INSERT INTO `gammes` (`id`, `nom`) VALUES
(1, 'gamme bien');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_gamme`) REFERENCES `gammes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
