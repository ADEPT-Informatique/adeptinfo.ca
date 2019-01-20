-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 20 Janvier 2019 à 15:17
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adeptinfo`
--
CREATE DATABASE IF NOT EXISTS `adeptinfo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `adeptinfo`;


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
-- Structure de la table `Administrateurs`
--

CREATE TABLE `Administrateurs` (
  `Prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `AdminID` int(11) NOT NULL,
  `DateMendat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Afficher` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Structure de la table `HistoriqueReservation`
--

CREATE TABLE `HistoriqueReservation` (
  `ID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
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

create table if not exists ProduitsAutoFinancement
(
	Id int auto_increment
		primary key,
	NomProduit varchar(50) not null,
	Prix decimal(4,2) not null,
	Disponible bit default b'1' not null,
	EstUnBrevage bit not null
)
collate=utf8_unicode_ci;


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
-- Structure de la table `RolesCA`
--

CREATE TABLE `RolesCA` (
  `RoleID` int(11) NOT NULL,
  `Role` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la vue `ClientReservation`
--
DROP TABLE IF EXISTS `ClientReservation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ClientReservation`  AS  select `c`.`ClientID` AS `ClientId`,`c`.`Nom` AS `Nom`,`c`.`Prenom` AS `Prenom`,`c`.`Email` AS `Email`,`c`.`NumEtudiant` AS `NumEtudiant`,`r`.`ReservationID` AS `ReservationID`,`r`.`NumeroReservation` AS `NumeroReservation`,`r`.`Taille` AS `Taille`,`r`.`Depot` AS `Depot`,`r`.`HoodieRecupere` AS `HoodieRecupere` from (`Client` `c` join `HoodieReservation` `r` on((`r`.`ClientID` = `c`.`ClientID`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `DETAILRESERVATION`
--
DROP TABLE IF EXISTS `DETAILRESERVATION`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `DETAILRESERVATION`  AS  select `h`.`ReservationID` AS `ReservationID`,`c`.`ClientID` AS `ClientID`,`h`.`NumeroReservation` AS `NumeroReservation`,`h`.`Depot` AS `Depot`,`h`.`HoodieRecupere` AS `HoodieRecupere`,`h`.`Taille` AS `Taille`,`h`.`Color` AS `Color`,`c`.`Nom` AS `Nom`,`c`.`Prenom` AS `Prenom`,`c`.`Email` AS `Email`,`c`.`NumEtudiant` AS `NumEtudiant` from (`HoodieReservation` `h` join `Client` `c` on((`c`.`ClientID` = `h`.`ClientID`))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Administrateurs`
--
ALTER TABLE `Administrateurs`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `FK_Admin_Role_RoleID` (`RoleID`);

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
-- Index pour la table `HistoriqueReservation`
--
ALTER TABLE `HistoriqueReservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Admin` (`AdminID`);

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
-- Index pour la table `RolesCA`
--
ALTER TABLE `RolesCA`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `CandidatureMembreConfiance`
--
ALTER TABLE `CandidatureMembreConfiance`
  MODIFY `ReponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--

--
-- AUTO_INCREMENT pour la table `Administrateurs`
--
ALTER TABLE `Administrateurs`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `CandidatureMembreConfiance`
--
ALTER TABLE `CandidatureMembreConfiance`
  MODIFY `ReponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `CandidaturesChefComiteLan`
--
ALTER TABLE `CandidaturesChefComiteLan`
  MODIFY `CandidatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `EquipesComiteLan`
--
ALTER TABLE `EquipesComiteLan`
  MODIFY `EquipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `HistoriqueReservation`
--
ALTER TABLE `HistoriqueReservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT pour la table `HoodieReservation`
--
ALTER TABLE `HoodieReservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT pour la table `InscriptionInfolettre`
--
ALTER TABLE `InscriptionInfolettre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
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
-- AUTO_INCREMENT pour la table `RolesCA`
--
ALTER TABLE `RolesCA`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Administrateurs`
--
ALTER TABLE `Administrateurs`
  ADD CONSTRAINT `FK_Admin_Role_RoleID` FOREIGN KEY (`RoleID`) REFERENCES `RolesCA` (`RoleID`);

--
-- Contraintes pour la table `HistoriqueReservation`
--
ALTER TABLE `HistoriqueReservation`
  ADD CONSTRAINT `FK_Admin` FOREIGN KEY (`AdminID`) REFERENCES `Administrateurs` (`AdminID`);

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


DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_DeleteAllReservations` ()  BEGIN

INSERT INTO `HistoriqueReservationHoodie`(`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color`) 
SELECT c.`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color` FROM Client c inner join HoodieReservation h on c.ClientID = h.ClientID;

DELETE FROM HoodieReservation;
DELETE FROM Client;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_DeleteReservation` (IN `resID` INT)  BEGIN
set @clientId = (SELECT ClientID from HoodieReservation WHERE ReservationID = resID);

INSERT INTO `HistoriqueReservationHoodie`(`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color`) 
SELECT c.`ClientID`, `Nom`, `Prenom`, `Email`, `NumEtudiant`, `ReservationID`, `NumeroReservation`, `Depot`, `HoodieRecupere`, `Taille`, `Color` FROM Client c inner join HoodieReservation h on c.ClientID = h.ClientID where c.ClientID = @clientId;

DELETE FROM HoodieReservation WHERE ReservationID = resID;
DELETE FROM Client WHERE ClientID = @clientId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ShowReservation` ()  SELECT * FROM Client as c inner join HoodieReservation as h on c.ClientID = h.ClientID$$

DELIMITER ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
