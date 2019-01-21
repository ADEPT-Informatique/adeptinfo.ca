-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 20 déc. 2018 à 23:42
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adpet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `articleID` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prixPaquet` decimal(10,2) NOT NULL,
  `qtyPaquet` int(11) NOT NULL,
  `qtyCourant` int(11) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `info` varchar(250) DEFAULT NULL,
  `cout` decimal(4,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`articleID`, `nom`, `prixPaquet`, `qtyPaquet`, `qtyCourant`, `img`, `info`, `cout`) VALUES
(1, 'Arizona', '18.00', 25, 25, '../img/article.png', 'L\'arizona c\'est Hot', '1.00'),
(17, 'Big Daddy', '18.00', 25, 25, '../img/article.png', 'Biscuits au pepites de chocolat ou au chocolat.', '1.50'),
(14, 'Gatorade', '28.00', 25, 25, '../img/article.png', 'Gatorade', '2.50'),
(26, 'Pogo', '25.00', 50, 50, '../img/article.png', 'Pogo', '1.00'),
(27, 'Pizza Pochettes', '7.00', 10, 10, '../img/article.png', 'test', '1.00'),
(28, 'Bonbons', '10.00', 2, 2, '../img/article.png', 'C\'est bon', '1.00'),
(29, 'Bonbons', '10.00', 2, 2, '../img/article.png', 'C\'est bon', '1.00');

-- --------------------------------------------------------

--
-- Structure de la table `epicerie`
--

CREATE TABLE `epicerie` (
  `epicerieID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` date NOT NULL,
  `cout` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listachats`
--

CREATE TABLE `listachats` (
  `epicerieID` int(11) NOT NULL,
  `articleID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`roleID`, `titre`) VALUES
(2, 'President'),
(3, 'Vice-President'),
(4, 'Tresorier'),
(5, 'Interne'),
(6, 'Externe'),
(7, 'Membre-Confiance'),
(8, 'Gestionaire-LAN'),
(9, 'BE'),
(1, 'Visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `userID` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `roleID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`userID`, `nom`, `prenom`, `roleID`, `email`, `password`) VALUES
(1, 'Martin', 'Matei', 2, 'mat4school@gmail.com', '12345'),
(2, 'Richard', 'Laurianne', 7, 'laue@exemple.com', 'exemple'),
(3, 'Turgeon', 'Valerie', 1, 'val@exemple.com', 'test'),
(4, 'Pauze', 'Hugo', 4, 'Treso@exemple.com', '12345'),
(5, 'Perron', 'Olivier', 3, 'VP@exemple.com', '12345'),
(6, 'Bouchard', 'Laurent', 6, 'externe@exemple.com', '12345'),
(7, 'Richer', 'William', 5, 'interne@adeptinfo.ca', '12345'),
(8, 'El Masoum', 'Amine', 8, 'LANadmin@adeptinfo.ca', '12345');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleID`);

--
-- Index pour la table `epicerie`
--
ALTER TABLE `epicerie`
  ADD PRIMARY KEY (`epicerieID`),
  ADD KEY `userID` (`userID`);

--
-- Index pour la table `listachats`
--
ALTER TABLE `listachats`
  ADD PRIMARY KEY (`epicerieID`,`articleID`),
  ADD KEY `articleID` (`articleID`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `epicerie`
--
ALTER TABLE `epicerie`
  MODIFY `epicerieID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
