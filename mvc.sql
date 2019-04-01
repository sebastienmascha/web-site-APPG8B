-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 01, 2019 at 08:12 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `boisson_boisson`
--

CREATE TABLE `boisson_boisson` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boisson_boisson`
--

INSERT INTO `boisson_boisson` (`id`, `nom`) VALUES
(1, 'Café'),
(2, 'Chocolat'),
(3, 'Thé'),
(4, 'Latté');

-- --------------------------------------------------------

--
-- Table structure for table `boisson_servie`
--

CREATE TABLE `boisson_servie` (
  `id` int(11) NOT NULL,
  `idBoisson` int(11) NOT NULL,
  `idMachine` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `isRemoved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `boisson_stock`
--

CREATE TABLE `boisson_stock` (
  `idBoisson` int(11) NOT NULL,
  `idMaison` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boisson_stock`
--

INSERT INTO `boisson_stock` (`idBoisson`, `idMaison`, `stock`) VALUES
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
-- Table structure for table `sav_message`
--

CREATE TABLE `sav_message` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `structure_capteur`
--

CREATE TABLE `structure_capteur` (
  `id` int(11) NOT NULL,
  `idMachine` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `structure_capteur`
--

INSERT INTO `structure_capteur` (`id`, `idMachine`, `type`, `etat`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 2, 1, 1),
(6, 2, 2, 1),
(7, 2, 3, 1),
(8, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `structure_foyer`
--

CREATE TABLE `structure_foyer` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `structure_foyer`
--

INSERT INTO `structure_foyer` (`id`, `nom`) VALUES
(1, 'APPG8B');

-- --------------------------------------------------------

--
-- Table structure for table `structure_machine`
--

CREATE TABLE `structure_machine` (
  `id` int(11) NOT NULL,
  `idMaison` int(11) NOT NULL,
  `isDispo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `structure_machine`
--

INSERT INTO `structure_machine` (`id`, `idMaison`, `isDispo`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `structure_maison`
--

CREATE TABLE `structure_maison` (
  `id` int(11) NOT NULL,
  `idFoyer` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `structure_maison`
--

INSERT INTO `structure_maison` (`id`, `idFoyer`, `nom`, `location`) VALUES
(1, 1, 'Maison 1', 'NDC'),
(2, 1, 'Maison 2', 'NDL');

-- --------------------------------------------------------

--
-- Table structure for table `users_homes`
--

CREATE TABLE `users_homes` (
  `id` int(11) NOT NULL,
  `idMaison` int(11) NOT NULL,
  `isUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_homes`
--

INSERT INTO `users_homes` (`id`, `idMaison`, `isUser`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(5, 1, 3),
(6, 2, 3),
(7, 1, 4),
(8, 2, 4),
(9, 1, 5),
(10, 2, 5),
(11, 1, 6),
(12, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users_main`
--

CREATE TABLE `users_main` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idFoyer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_main`
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
-- Table structure for table `users_user`
--

CREATE TABLE `users_user` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `heure` time NOT NULL,
  `preference` int(11) NOT NULL,
  `acces` int(11) NOT NULL,
  `invite` int(11) NOT NULL,
  `datecre` int(11) NOT NULL,
  `valide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_user`
--

INSERT INTO `users_user` (`id`, `prenom`, `nom`, `email`, `mdp`, `heure`, `preference`, `acces`, `invite`, `datecre`, `valide`) VALUES
(1, 'Gaétan', 'BERTHIER', 'gaet@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:00:00', 1, 50, 0, 1553507143, 1),
(2, 'Gus', 'Simon', 'gus@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:10:00', 1, 50, 0, 1553507143, 1),
(3, 'Agathe', 'Lebris', 'agathe@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:10:00', 1, 50, 0, 1553507143, 1),
(4, 'Seb', 'Mascha', 'seb@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '00:00:00', 1, 50, 0, 1553507143, 1),
(5, 'Astrid', 'Benoit', 'astrid@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:10:00', 1, 50, 0, 1553507143, 1),
(6, 'Olivier', 'Condere', 'oliv@app.com', '32c57a4f95915ebb6f24dbe58d1aa933a3af5c7b', '08:10:00', 1, 50, 0, 1553507143, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boisson_boisson`
--
ALTER TABLE `boisson_boisson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boisson_servie`
--
ALTER TABLE `boisson_servie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sav_message`
--
ALTER TABLE `sav_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_capteur`
--
ALTER TABLE `structure_capteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_foyer`
--
ALTER TABLE `structure_foyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_machine`
--
ALTER TABLE `structure_machine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_maison`
--
ALTER TABLE `structure_maison`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_homes`
--
ALTER TABLE `users_homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_main`
--
ALTER TABLE `users_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_user`
--
ALTER TABLE `users_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boisson_boisson`
--
ALTER TABLE `boisson_boisson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boisson_servie`
--
ALTER TABLE `boisson_servie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sav_message`
--
ALTER TABLE `sav_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `structure_capteur`
--
ALTER TABLE `structure_capteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `structure_foyer`
--
ALTER TABLE `structure_foyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `structure_machine`
--
ALTER TABLE `structure_machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `structure_maison`
--
ALTER TABLE `structure_maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_homes`
--
ALTER TABLE `users_homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_main`
--
ALTER TABLE `users_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_user`
--
ALTER TABLE `users_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
