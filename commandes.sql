-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 12 déc. 2021 à 20:13
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
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` varchar(2550) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `article`) VALUES
(3, '{\"id\":\"1\",\"image\":\"https://imgr.search.brave.com/aE3S7p3-39An_jpuQFnHrJO017OffOBdY33Bkr5lOlE/fit/474/225/ce/1/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5s/RzBBNU5sZXNITmpE/bm9Hc1c5M1ZBSGFI/YSZwaWQ9QXBp\",\"title\":\"roxel or\",\"description\":\"blablabla\",\"desc_short\":\"cour\",\"price\":\"10\",\"count\":\"1\"}'),
(4, '{\"id\":\"1\",\"image\":\"https://imgr.search.brave.com/aE3S7p3-39An_jpuQFnHrJO017OffOBdY33Bkr5lOlE/fit/474/225/ce/1/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5s/RzBBNU5sZXNITmpE/bm9Hc1c5M1ZBSGFI/YSZwaWQ9QXBp\",\"title\":\"roxel or\",\"description\":\"blablabla\",\"desc_short\":\"cour\",\"price\":\"10\",\"count\":\"1\"}'),
(5, '{\"id\":\"1\",\"image\":\"https://imgr.search.brave.com/aE3S7p3-39An_jpuQFnHrJO017OffOBdY33Bkr5lOlE/fit/474/225/ce/1/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5s/RzBBNU5sZXNITmpE/bm9Hc1c5M1ZBSGFI/YSZwaWQ9QXBp\",\"title\":\"roxel or\",\"description\":\"blablabla\",\"desc_short\":\"cour\",\"price\":\"10\",\"count\":\"1\"}'),
(6, '{\"id\":\"1\",\"image\":\"https://imgr.search.brave.com/aE3S7p3-39An_jpuQFnHrJO017OffOBdY33Bkr5lOlE/fit/474/225/ce/1/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5s/RzBBNU5sZXNITmpE/bm9Hc1c5M1ZBSGFI/YSZwaWQ9QXBp\",\"title\":\"roxel or\",\"description\":\"blablabla\",\"desc_short\":\"cour\",\"price\":\"10\",\"count\":\"1\"}');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
