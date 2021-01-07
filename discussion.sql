-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 07 jan. 2021 à 13:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES
(115, 'PQ', 3, '2020-12-03'),
(114, 'ok', 3, '2020-12-03'),
(113, 'parfait', 3, '2020-12-03'),
(112, 'voyons cool', 3, '2020-12-03'),
(111, 'ok', 2, '2020-12-03'),
(110, '1', 2, '2020-12-03'),
(109, 'parfait', 2, '2020-12-03'),
(108, 'cool', 2, '2020-12-03'),
(107, 'Ã§a y est', 2, '2020-12-03'),
(116, 'ok', 9, '2020-12-03'),
(117, 'vasy ', 9, '2020-12-03'),
(118, 'samir tg', 9, '2020-12-03'),
(119, 'comment on dÃ©bloque la quÃªte ?', 12, '2021-01-07');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Nadir13', 'nadir'),
(2, 'karim1998', '1998'),
(3, 'nadirdu13', '13'),
(4, 'hichem', 'hichem'),
(5, 'lemokdu84', 'aaa'),
(8, 'ok', '$2y$10$EhLFtnggAgEueua3lu38GeY7jPoIiy7b4jh5F0TttEVFZvWUzkPO6'),
(9, 'ruben', '$2y$10$J3pyAf4H0j9gWl1CnsHK9uslvb9ZFFq6vErjvRdtENFoow/yk61dG'),
(10, 'samir', '$2y$10$JJz6spqb/mkyckjYBv40jetQF/I5GlxlNGAkDbgK..O3kbjE5K4BG'),
(11, 'robin', '$2y$10$iSGz3eI5i6hJCEZDEUOA7O9Z5xl8URu6Ad7dK4FFHGII4BIpNstQW'),
(12, 'elias', '$2y$10$o8R5z1Vh835rHt9wOiemqOz4Ip4TIKJbP3GgGN64tzbLFkTj8AVey');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
