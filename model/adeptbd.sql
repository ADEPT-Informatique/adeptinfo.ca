-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 15 Octobre 2019 à 17:59
-- Version du serveur :  5.7.27-0ubuntu0.16.04.1
-- Version de PHP :  7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adept`
--

DELIMITER $$
--
-- Procédures
--
CREATE PROCEDURE `USP_DeleteAllReservations` ()  BEGIN

INSERT INTO `HistoriqueReservationHoodie`(`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color`) 
SELECT c.`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color` FROM Client c inner join HoodieReservation h on c.ClientID = h.ClientID;

DELETE FROM HoodieReservation;
DELETE FROM Client;
END$$

CREATE PROCEDURE `USP_DeleteReservation` (IN `resID` INT)  BEGIN
set @clientId = (SELECT ClientID from HoodieReservation WHERE ReservationID = resID);

INSERT INTO `HistoriqueReservationHoodie`(`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color`) 
SELECT c.`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color` FROM Client c inner join HoodieReservation h on c.ClientID = h.ClientID where c.ClientID = @clientId;

DELETE FROM HoodieReservation WHERE ReservationID = resID;
DELETE FROM Client WHERE ClientID = @clientId;
END$$

CREATE PROCEDURE `USP_ShowReservation` ()  SELECT * FROM Client as c inner join HoodieReservation as h on c.ClientID = h.ClientID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `articleID` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `info` varchar(250) DEFAULT NULL,
  `cout` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`articleID`, `nom`, `img`, `info`, `cout`) VALUES
(1, 'Arizona Thé Vert', NULL, 'Th&eacute; vert rafra&icirc;chissant au ginseng et au miel Aucun agent de conservation ajout&eacute; Grande bo&icirc;te pour une grande valeur et une soif &eacute;touff&eacute;e.', '1.00'),
(14, 'Gatorade', '../img/article.png', 'Gatorade', '1.50'),
(26, 'Pogo', '../img/article.png', 'C&#039;est des pogo...', '0.75'),
(29, 'Arizona Mangues', NULL, ' L&#039;Arizona Mucho Mango', '1.00'),
(31, 'Arizona Punch au Fruits', NULL, 'Un goût de punch aux fruits classique fait avec plaisir, mélange frais de jus de fruits et les arômes naturels, maintenant servi avec du vrai sucre . ', '1.00'),
(32, 'Arizona Thé au cirton', NULL, 'La première et la saveur la plus populaire a un goût assez grand pour refroidir toute soif.', '1.00'),
(33, 'Kit Kat', NULL, 'Kit Kat est un biscuit enrob&eacute; de chocolat.', '1.00'),
(34, 'Coffee Crisp', NULL, 'Barre de chocolat au Café.', '1.00'),
(36, 'Pizza Pochette', NULL, 'Une pizza dans une pochette!', '1.00'),
(37, 'Twix', NULL, 'Twix est un bonbon consistant en un biscuit appliqu&eacute; avec d&#039;autres garnitures et enrobages de confiserie. Twix sont emball&eacute;s avec deux ou quatre barres dans un embalage.', '1.00'),
(38, 'Snickers', NULL, 'Snickers est une barre de chocolat compos&eacute;e de nougat garni de caramel et d&rsquo;arachides enrob&eacute; de chocolat au lait', '1.00'),
(39, 'Hershey', NULL, 'Hershey', '1.00'),
(40, 'Barre Mars', NULL, 'Nougat au chocolat et au chocolat recouvert d&#039;une couche de caramel et recouvert de chocolat au lait .', '1.00'),
(41, 'M&amp;Ms', NULL, 'descriptionLes M &amp; M&#039;s sont des &quot;chocolats color&eacute;s en forme de boutons&quot;, entourant un remplissage qui varie en fonction de la vari&eacute;t&eacute; des M &amp; M. ', '1.00'),
(43, 'Guru', NULL, 'La premi&egrave;re boisson &eacute;nerg&eacute;tique naturelle au monde!', '2.00'),
(44, 'RedBull', NULL, 'Boisson énergisante', '2.00'),
(45, 'Monster', NULL, 'Boisson &eacute;nergisante des gamers', '2.50'),
(46, 'Chips', NULL, 'Chips de toutes sortes.', '0.75'),
(47, 'Mr Noodle', NULL, 'Cheap Ramens', '0.50'),
(48, 'Nong Shim ', NULL, 'Fancy Ramen de toutes sortes.', '1.50');

-- --------------------------------------------------------

--
-- Structure de la table `CandidatureMembreConfiance`
--

CREATE TABLE `CandidatureMembreConfiance` (
  `ReponseID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `NbSessions` int(11) NOT NULL,
  `Motivations` varchar(500) NOT NULL,
  `Situation` varchar(500) NOT NULL,
  `Pizza` varchar(128) NOT NULL,
  `Facto` varchar(128) NOT NULL,
  `JavaJs` varchar(128) NOT NULL,
  `Gif` varchar(128) NOT NULL,
  `Meme` varchar(800) NOT NULL,
  `SujetBanis` varchar(100) NOT NULL,
  `Breuvage` varchar(128) NOT NULL,
  `AlimentPlusVendu` varchar(128) NOT NULL,
  `NumeroLocal` varchar(128) NOT NULL,
  `DateCandidature` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CandidaturesChefComiteLan`
--

CREATE TABLE `CandidaturesChefComiteLan` (
  `CandidatID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `NumEtudiant` int(7) NOT NULL,
  `Branche` varchar(30) NOT NULL,
  `Qualifications` varchar(300) NOT NULL,
  `ChoixPoste1` varchar(100) NOT NULL,
  `ChoixPoste2` varchar(100) DEFAULT NULL,
  `Motivation` varchar(300) NOT NULL,
  `Participation` varchar(4) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DateCandidature` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `ClientID` int(11) NOT NULL,
  `Nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NumEtudiant` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `ClientReservation`
--
CREATE TABLE `ClientReservation` (
`ClientId` int(11)
,`Nom` varchar(50)
,`Prenom` varchar(50)
,`Email` varchar(50)
,`NumEtudiant` int(7)
,`ReservationID` int(11)
,`NumeroReservation` varchar(11)
,`Taille` varchar(2)
,`Depot` decimal(10,0)
,`HoodieRecupere` tinyint(1)
,`Color` varchar(30)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `DETAILRESERVATION`
--
CREATE TABLE `DETAILRESERVATION` (
`ReservationID` int(11)
,`ClientID` int(11)
,`NumeroReservation` varchar(11)
,`Depot` decimal(10,0)
,`HoodieRecupere` tinyint(1)
,`Taille` varchar(2)
,`Color` varchar(30)
,`Nom` varchar(50)
,`Prenom` varchar(50)
,`Email` varchar(50)
,`NumEtudiant` int(7)
);

-- --------------------------------------------------------

--
-- Structure de la table `EquipesComiteLan`
--

CREATE TABLE `EquipesComiteLan` (
  `EquipeID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `HistoriqueCandidatureMembreConfiance`
--

CREATE TABLE `HistoriqueCandidatureMembreConfiance` (
  `ReponseID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `NbSessions` int(11) NOT NULL,
  `Motivations` varchar(500) NOT NULL,
  `Situation` varchar(500) NOT NULL,
  `Pizza` varchar(50) NOT NULL,
  `Facto` varchar(45) NOT NULL,
  `JavaJs` varchar(40) NOT NULL,
  `Gif` varchar(45) NOT NULL,
  `Meme` varchar(800) NOT NULL,
  `SujetBanis` varchar(100) NOT NULL,
  `Breuvage` varchar(45) NOT NULL,
  `AlimentPlusVendu` varchar(45) NOT NULL,
  `NumeroLocal` varchar(45) NOT NULL,
  `DateCandidature` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `HistoriqueReservation`
--

CREATE TABLE `HistoriqueReservation` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ReservationID` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Type` varchar(50) NOT NULL,
  `Depot` decimal(10,0) DEFAULT NULL,
  `Recup` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `HistoriqueReservationHoodie`
--

CREATE TABLE `HistoriqueReservationHoodie` (
  `ClientID` int(11) NOT NULL,
  `Nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NumEtudiant` int(7) NOT NULL,
  `ReservationID` int(11) NOT NULL,
  `NumeroReservation` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Depot` decimal(10,0) NOT NULL DEFAULT '0',
  `HoodieRecupere` tinyint(1) NOT NULL DEFAULT '0',
  `Taille` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Color` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `HoodieReservation`
--

CREATE TABLE `HoodieReservation` (
  `ReservationID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `NumeroReservation` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Depot` decimal(10,0) NOT NULL DEFAULT '0',
  `HoodieRecupere` tinyint(1) NOT NULL DEFAULT '0',
  `Taille` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Color` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `InscriptionInfolettre`
--

CREATE TABLE `InscriptionInfolettre` (
  `ID` int(11) NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `MembresComiteLan`
--

CREATE TABLE `MembresComiteLan` (
  `MembreComiteID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `NumÉtudiant` int(7) NOT NULL,
  `EquipeID` int(11) NOT NULL,
  `ChefEquipe` bit(1) NOT NULL DEFAULT b'0',
  `Email` varchar(50) DEFAULT NULL,
  `DateAjout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MembresConfiance`
--

CREATE TABLE `MembresConfiance` (
  `MembreID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `NumEtudiant` int(7) NOT NULL,
  `DateAjout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ProduitsAutoFinancement`
--

CREATE TABLE `ProduitsAutoFinancement` (
  `Id` int(11) NOT NULL,
  `NomProduit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prix` decimal(4,2) NOT NULL,
  `Disponible` bit(1) NOT NULL DEFAULT b'1',
  `EstUnBrevage` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Roles`
--

CREATE TABLE `Roles` (
  `RoleID` int(11) NOT NULL,
  `Role` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Roles`
--

INSERT INTO `Roles` (`RoleID`, `Role`) VALUES
(1, 'Président'),
(2, 'Vice-Président'),
(3, 'Interne'),
(4, 'Externe'),
(5, 'Trésorier'),
(6, 'Webmaster'),
(7, 'Gestionaire-LAN'),
(8, 'Membre-Confiance'),
(10, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `userID` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `roleID` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`userID`, `nom`, `prenom`, `roleID`, `email`, `password`) VALUES
(1, 'Président', 'Président', 1, 'president@adeptinfo.ca', ''),
(4, 'Trésorier', 'Trésorier', 5, 'tresorier@adeptinfo.ca', ''),
(5, 'Vice', 'Président', 2, 'vp@adeptinfo.ca', ''),
(6, 'Secrétaire', 'Externe', 4, 'externe@adeptinfo.ca', ''),
(7, 'Secrétaire', 'Interne', 3, 'interne@adeptinfo.ca', ''),
(44, 'admin', 'admin', 6, 'admin@adeptinfo.ca', 'ab38eadaeb746599f2c1ee90f8267f31f467347462764a24d71ac1843ee77fe3');

-- --------------------------------------------------------

--
-- Structure de la vue `ClientReservation`
--
DROP TABLE IF EXISTS `ClientReservation`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `ClientReservation`  AS  select `c`.`ClientID` AS `ClientId`,`c`.`Nom` AS `Nom`,`c`.`Prenom` AS `Prenom`,`c`.`Email` AS `Email`,`c`.`NumEtudiant` AS `NumEtudiant`,`r`.`ReservationID` AS `ReservationID`,`r`.`NumeroReservation` AS `NumeroReservation`,`r`.`Taille` AS `Taille`,`r`.`Depot` AS `Depot`,`r`.`HoodieRecupere` AS `HoodieRecupere`,`r`.`Color` AS `Color` from (`Client` `c` join `HoodieReservation` `r` on((`r`.`ClientID` = `c`.`ClientID`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `DETAILRESERVATION`
--
DROP TABLE IF EXISTS `DETAILRESERVATION`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `DETAILRESERVATION`  AS  select `h`.`ReservationID` AS `ReservationID`,`c`.`ClientID` AS `ClientID`,`h`.`NumeroReservation` AS `NumeroReservation`,`h`.`Depot` AS `Depot`,`h`.`HoodieRecupere` AS `HoodieRecupere`,`h`.`Taille` AS `Taille`,`h`.`Color` AS `Color`,`c`.`Nom` AS `Nom`,`c`.`Prenom` AS `Prenom`,`c`.`Email` AS `Email`,`c`.`NumEtudiant` AS `NumEtudiant` from (`HoodieReservation` `h` join `Client` `c` on((`c`.`ClientID` = `h`.`ClientID`))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleID`);

--
-- Index pour la table `CandidatureMembreConfiance`
--
ALTER TABLE `CandidatureMembreConfiance`
  ADD PRIMARY KEY (`ReponseID`);

--
-- Index pour la table `CandidaturesChefComiteLan`
--
ALTER TABLE `CandidaturesChefComiteLan`
  ADD PRIMARY KEY (`CandidatID`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Index pour la table `EquipesComiteLan`
--
ALTER TABLE `EquipesComiteLan`
  ADD PRIMARY KEY (`EquipeID`);

--
-- Index pour la table `HistoriqueCandidatureMembreConfiance`
--
ALTER TABLE `HistoriqueCandidatureMembreConfiance`
  ADD PRIMARY KEY (`ReponseID`);

--
-- Index pour la table `HistoriqueReservation`
--
ALTER TABLE `HistoriqueReservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Admin` (`userID`);

--
-- Index pour la table `HoodieReservation`
--
ALTER TABLE `HoodieReservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `FK_Client_Reservation` (`ClientID`);

--
-- Index pour la table `InscriptionInfolettre`
--
ALTER TABLE `InscriptionInfolettre`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `MembresComiteLan`
--
ALTER TABLE `MembresComiteLan`
  ADD PRIMARY KEY (`MembreComiteID`),
  ADD KEY `FK_EquipeComite_Membres` (`EquipeID`);

--
-- Index pour la table `MembresConfiance`
--
ALTER TABLE `MembresConfiance`
  ADD PRIMARY KEY (`MembreID`);

--
-- Index pour la table `ProduitsAutoFinancement`
--
ALTER TABLE `ProduitsAutoFinancement`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `CandidatureMembreConfiance`
--
ALTER TABLE `CandidatureMembreConfiance`
  MODIFY `ReponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `CandidaturesChefComiteLan`
--
ALTER TABLE `CandidaturesChefComiteLan`
  MODIFY `CandidatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT pour la table `EquipesComiteLan`
--
ALTER TABLE `EquipesComiteLan`
  MODIFY `EquipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `HistoriqueCandidatureMembreConfiance`
--
ALTER TABLE `HistoriqueCandidatureMembreConfiance`
  MODIFY `ReponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `HistoriqueReservation`
--
ALTER TABLE `HistoriqueReservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pour la table `HoodieReservation`
--
ALTER TABLE `HoodieReservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `InscriptionInfolettre`
--
ALTER TABLE `InscriptionInfolettre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT pour la table `MembresComiteLan`
--
ALTER TABLE `MembresComiteLan`
  MODIFY `MembreComiteID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `MembresConfiance`
--
ALTER TABLE `MembresConfiance`
  MODIFY `MembreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ProduitsAutoFinancement`
--
ALTER TABLE `ProduitsAutoFinancement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `HoodieReservation`
--
ALTER TABLE `HoodieReservation`
  ADD CONSTRAINT `FK_Client_Reservation` FOREIGN KEY (`ClientID`) REFERENCES `Client` (`ClientID`);

--
-- Contraintes pour la table `MembresComiteLan`
--
ALTER TABLE `MembresComiteLan`
  ADD CONSTRAINT `FK_EquipeComite_Membres` FOREIGN KEY (`EquipeID`) REFERENCES `EquipesComiteLan` (`EquipeID`);

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `FK_Role` FOREIGN KEY (`roleID`) REFERENCES `Roles` (`RoleID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
