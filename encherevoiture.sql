-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 14 nov. 2021 à 11:35
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `encherevoiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_car` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `prixReserve` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `puissance` int(3) NOT NULL,
  `annee` year(4) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `dateLimite` date NOT NULL,
  `id_proprietaire` int(11) DEFAULT NULL,
  `titre` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_car`, `marque`, `prixReserve`, `model`, `puissance`, `annee`, `description`, `img`, `dateLimite`, `id_proprietaire`, `titre`) VALUES
(1, 'TESLA', 2000, 'A47x', 255, 2020, 'voiture electrique', 'https://static.latribune.fr/149052/tesla-s.jpg', '2021-11-19', NULL, ''),
(2, 'BMW', 45000, 'SERIE 3', 400, 2016, 'Incroyable BMW', 'https://img-4.linternaute.com/H5Psps1X3EbgA1tLnVPE-3QXNys=/1500x/smart/fd849892ac194474adee1a3a44c0f48d/ccmcms-linternaute/10980317.jpg', '2021-11-19', NULL, ''),
(3, 'BMW', 45000, 'SERIE M3', 400, 2016, 'Incroyable BMW', 'https://cdn.motor1.com/images/mgl/rg1qY/s1/bmw-3er-2019-modell-m-sport.jpg', '2021-11-19', NULL, 'BMW SÃ©rie 3'),
(4, 'AUDI', 220000, 'R8', 650, 2019, 'Audi Exceptionnelle', 'https://cdn.abcmoteur.fr/wp-content/uploads/2020/08/Essai-Audi-R8-RWD-cover_13.jpg', '2021-11-18', NULL, 'Audi R8 a vendre'),
(5, 'DOLOREAN', 150000, 'DMC-12', 400, 1981, 'Magnifique DOLOREAN Boite Manuelle 8500Km', 'https://cdn.motor1.com/images/mgl/KrjGG/s1/1981-delorean-dmc-12.jpg', '2021-12-13', NULL, 'DOLOREAN DMC-12 / Back to Futur'),
(6, 'PORSCHE', 17500, '944', 250, 1991, 'Superbe Porsche 944 - Essence - 10 000km', 'https://upload.wikimedia.org/wikipedia/commons/1/14/Porsche_944S_3_quart_avant.jpg', '2021-11-30', NULL, 'PORSCHE 944');

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE `enchere` (
  `id_enchere` int(11) NOT NULL,
  `dateEnchere` date NOT NULL,
  `montantEnchere` int(11) NOT NULL,
  `id_car` int(11) NOT NULL DEFAULT '0',
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'Lucas', 'Bocalo', 'bocaltest@gmail.com', 'bocal'),
(3, 'Irina', 'Bocala', 'irina@bocala.fr', 'irina'),
(5, 'ludo', 'leclown', 'ludo@bocal.com', 'ludo'),
(15, 'Lucado', 'Irinadoca', 'lucas@bocalcamarche.fr', 'lucas'),
(17, 'Ludododo', 'dadada', 'ludo@boco.com', 'ludo'),
(18, 'TestA', 'allo', 'allo@bocal.fr', 'allo'),
(19, 'irinatest', 'testing', 'testestest@test.com', '$2y$10$TSxcnaztngtPjlkKlQbDV.LGHTQ1jgXtEIJpw/jCmXat6/dvcTTSi'),
(20, 'ludo', 'lezozo', 'ludoagain@bocal.com', '$2y$10$2AuH6OmZo.Y0Nnzpxh1c9eu2z/UqLKIgaBRY8T14a/LMYPFjyxIaK'),
(21, 'irina', 'lazaza', 'test54@bocal.fr', '$2y$10$QD6hra1SKT5brASfTXbmeOV0xG1RmummXJLFSj2ujJq0w1vGFsqzW'),
(22, 'Ludo', 'TEST', 'testludo@test.fr', '$2y$10$aEsjBWcTA3SIap1UegDbjOOwRSai9TPKBBwMPkg7PXcQAZOnxdqui'),
(23, 'test', 'test', 'test@test.fr', '$2y$10$WKo7zknbDHFWcU8YyMhzJOxFsZD7gGUowWkOIHBFA4whUvx3Wt.la'),
(24, 'ludo', 'ludotest', 'ludotest@test.fr', '$2y$10$uOImakzhYmZcWUoq5y/BIOI48DFd3u/biNU78a77ntJlbYDnG.k2y'),
(25, 'mario', 'BALOTELLI', 'mb9@ogcnice.com', '$2y$10$OPKfJbPatChjj34kgrEmtOm6pfJQqQNLoHu5gRB9dQzgYHJ2/uUNu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_car`) USING BTREE,
  ADD KEY `id_proprietaire` (`id_proprietaire`);

--
-- Index pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`id_enchere`),
  ADD KEY `id_car` (`id_car`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `id_enchere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `id_proprietaire` FOREIGN KEY (`id_proprietaire`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `id_car` FOREIGN KEY (`id_car`) REFERENCES `annonce` (`id_car`),
  ADD CONSTRAINT `id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
