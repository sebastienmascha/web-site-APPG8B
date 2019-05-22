-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 mai 2019 à 09:03
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `boisson_boisson`
--

DROP TABLE IF EXISTS `boisson_boisson`;
CREATE TABLE IF NOT EXISTS `boisson_boisson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boisson_boisson`
--

INSERT INTO `boisson_boisson` (`id`, `nom`) VALUES
(1, 'Café'),
(2, 'Chocolat'),
(3, 'Thé'),
(4, 'Latté');

-- --------------------------------------------------------

--
-- Structure de la table `boisson_servie`
--

DROP TABLE IF EXISTS `boisson_servie`;
CREATE TABLE IF NOT EXISTS `boisson_servie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBoisson` int(11) NOT NULL,
  `idMachine` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `isRemoved` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `boisson_stock`
--

DROP TABLE IF EXISTS `boisson_stock`;
CREATE TABLE IF NOT EXISTS `boisson_stock` (
  `idBoisson` int(11) NOT NULL,
  `idMachine` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boisson_stock`
--

INSERT INTO `boisson_stock` (`idBoisson`, `idMachine`, `stock`) VALUES
(1, 1, 10),
(2, 1, 10),
(3, 1, 10),
(4, 1, 10),
(1, 2, 10),
(2, 2, 10),
(3, 2, 10),
(4, 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sav_message`
--

DROP TABLE IF EXISTS `sav_message`;
CREATE TABLE IF NOT EXISTS `sav_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sensors`
--

DROP TABLE IF EXISTS `sensors`;
CREATE TABLE IF NOT EXISTS `sensors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `type` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `structure_capteur`
--

DROP TABLE IF EXISTS `structure_capteur`;
CREATE TABLE IF NOT EXISTS `structure_capteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMachine` int(11) NOT NULL,
  `type` text NOT NULL,
  `etat` int(11) NOT NULL,
  `Mesure` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `structure_capteur`
--

INSERT INTO `structure_capteur` (`id`, `idMachine`, `type`, `etat`, `Mesure`) VALUES
(1, 1, 'Température', 1, 18),
(2, 1, 'Présence de tasse', 1, 50),
(3, 1, 'Présence de capsules', 1, 2),
(4, 1, 'Sonore', 1, 0),
(5, 2, 'Température', 1, 18),
(6, 2, 'Présence de tasse', 1, 50),
(7, 2, 'Présence de capsules', 1, 2),
(8, 2, 'Sonore', 1, 0),
(9, 1, 'Résistance Chauffante', 1, 0),
(10, 2, 'Résistance Chauffante', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `structure_foyer`
--

DROP TABLE IF EXISTS `structure_foyer`;
CREATE TABLE IF NOT EXISTS `structure_foyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `structure_foyer`
--

INSERT INTO `structure_foyer` (`id`, `nom`) VALUES
(1, 'APPG8B');

-- --------------------------------------------------------

--
-- Structure de la table `structure_machine`
--

DROP TABLE IF EXISTS `structure_machine`;
CREATE TABLE IF NOT EXISTS `structure_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMaison` int(11) NOT NULL,
  `isDispo` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `etat` text NOT NULL,
  `tempsUtilisation` int(11) NOT NULL,
  `machineStatut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `structure_machine`
--

INSERT INTO `structure_machine` (`id`, `idMaison`, `isDispo`, `name`, `etat`, `tempsUtilisation`, `machineStatut`) VALUES
(1, 1, 1, 'Salon', 'Fonctionnelle', 26, 0),
(2, 2, 1, 'Diner', 'Fonctionnelle', 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `structure_maison`
--

DROP TABLE IF EXISTS `structure_maison`;
CREATE TABLE IF NOT EXISTS `structure_maison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFoyer` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `structure_maison`
--

INSERT INTO `structure_maison` (`id`, `idFoyer`, `nom`, `location`) VALUES
(1, 1, 'Maison 1', 'NDC'),
(2, 1, 'Maison 2', 'NDL');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users_homes`
--

DROP TABLE IF EXISTS `users_homes`;
CREATE TABLE IF NOT EXISTS `users_homes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMaison` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_homes`
--

INSERT INTO `users_homes` (`id`, `idMaison`, `idUser`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(6, 2, 3),
(7, 1, 4),
(8, 2, 4),
(9, 1, 5),
(10, 2, 5),
(11, 1, 6),
(12, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `users_main`
--

DROP TABLE IF EXISTS `users_main`;
CREATE TABLE IF NOT EXISTS `users_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idFoyer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_main`
--

INSERT INTO `users_main` (`id`, `idUser`, `idFoyer`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_user`
--

DROP TABLE IF EXISTS `users_user`;
CREATE TABLE IF NOT EXISTS `users_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFoyer` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `heure` time NOT NULL,
  `preference` int(11) NOT NULL,
  `acces` int(11) NOT NULL,
  `invite` int(11) NOT NULL,
  `datecre` int(11) NOT NULL,
  `valide` int(11) NOT NULL,
  `typeUser` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_user`
--

INSERT INTO `users_user` (`id`, `idFoyer`, `prenom`, `nom`, `email`, `mdp`, `heure`, `preference`, `acces`, `invite`, `datecre`, `valide`, `typeUser`) VALUES
(1, 1, 'azert', 'BERTHIER', 'gaet@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:00:00', 1, 50, 0, 1553507143, 1, 'utilisateurs'),
(2, 1, 'Guuuus', 'Simon', 'gus@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:10:00', 1, 50, 0, 1553507143, 1, 'utilisateurs'),
(4, 1, 'Gsdfvzdx', 'BERTHIER', 'gaet@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:00:00', 1, 50, 0, 1553507143, 1, 'utilisateurs'),
(6, 1, 'sdfghj', 'BERTHIEROK', 'gaet@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:00:00', 1, 50, 0, 1553507143, 1, 'utilisateurs'),
(7, 0, 'webmaster', '', 'webmaster@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:10:00', 1, 50, 0, 1553507143, 1, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
