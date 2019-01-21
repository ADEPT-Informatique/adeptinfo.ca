-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 17 avr. 2018 à 20:09
-- Version du serveur :  10.0.34-MariaDB
-- Version de PHP :  5.6.30
--
-- --------------------------------------------------------
--
-- Base de données :  `adept`
--

DELIMITER $$
--
-- Procédures
--
CREATE PROCEDURE `USP_DeleteReservation` (IN `resID` INT)  BEGIN
set @clientId = (SELECT ClientID from HoodieReservation WHERE ReservationID = resID);
DELETE FROM HoodieReservation WHERE ReservationID = resID;
DELETE FROM Client WHERE ClientID = @clientId;
END$$

CREATE PROCEDURE `USP_ShowReservation` ()  SELECT * FROM Client as c inner join HoodieReservation as h on c.ClientID = h.ClientID$$

DELIMITER ;

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
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `ClientID` int(11) NOT NULL,
  `Nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NumEtudiant` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Doublure de structure pour la vue `ClientReservation`
-- (Voir ci-dessous la vue réelle)
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

--
-- Structure de la table `HoodieReservation`
--

CREATE TABLE `HoodieReservation` (
  `ReservationID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `NumeroReservation` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Depot` decimal(10,0) NOT NULL DEFAULT '0',
  `HoodieRecupere` tinyint(1) NOT NULL DEFAULT '0',
  `Taille` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `RolesCA`
--

CREATE TABLE `RolesCA` (
  `RoleID` int(11) NOT NULL,
  `Role` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `RolesCA`
--

INSERT INTO `RolesCA` (`RoleID`, `Role`) VALUES
(1, 'Président'),
(2, 'Vice-Président'),
(3, 'Interne'),
(4, 'Externe'),
(5, 'Trésorier'),
(6, 'Webmaster');

-- --------------------------------------------------------

--
-- Structure de la vue `ClientReservation`
--
DROP TABLE IF EXISTS `ClientReservation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`obrassard`@`localhost` SQL SECURITY DEFINER VIEW `ClientReservation`  AS  select `c`.`ClientID` AS `ClientId`,`c`.`Nom` AS `Nom`,`c`.`Prenom` AS `Prenom`,`c`.`Email` AS `Email`,`c`.`NumEtudiant` AS `NumEtudiant`,`r`.`ReservationID` AS `ReservationID`,`r`.`NumeroReservation` AS `NumeroReservation`,`r`.`Taille` AS `Taille`,`r`.`Depot` AS `Depot`,`r`.`HoodieRecupere` AS `HoodieRecupere` from (`Client` `c` join `HoodieReservation` `r` on((`r`.`ClientID` = `c`.`ClientID`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administrateurs`
--
ALTER TABLE `Administrateurs`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `FK_Admin_Role_RoleID` (`RoleID`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ClientID`);

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
-- Index pour la table `CandidatureMembreConfiance`
--
ALTER TABLE `CandidatureMembreConfiance`
  ADD PRIMARY KEY (`ReponseID`);


--
-- Index pour la table `RolesCA`
--
ALTER TABLE `RolesCA`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT pour les tables déchargées
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
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `HistoriqueReservation`
--
ALTER TABLE `HistoriqueReservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `HoodieReservation`
--
ALTER TABLE `HoodieReservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `InscriptionInfolettre`
--
ALTER TABLE `InscriptionInfolettre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `RolesCA`
--
ALTER TABLE `RolesCA`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
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
COMMIT;
