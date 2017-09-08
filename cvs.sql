-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Septembre 2017 à 16:20
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cvs`
--

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

CREATE TABLE `application` (
  `applicationId` int(11) NOT NULL,
  `applicationName` varchar(255) DEFAULT NULL,
  `applicationLogo` varchar(255) DEFAULT NULL,
  `applicationUrl` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `customerAddress` varchar(255) NOT NULL,
  `customerPhone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `customerAddress`, `customerPhone`) VALUES
(1009, 'TDF', 'Fort de Romainville, 93260 Les Lilas, France', '+33 1 55 95 10 00');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `employeeFirstName` varchar(255) NOT NULL,
  `employeeLastName` varchar(255) NOT NULL,
  `employeeMail` varchar(255) NOT NULL,
  `employeePhone` varchar(255) NOT NULL,
  `employeeService` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employee`
--

INSERT INTO `employee` (`employeeId`, `employeeFirstName`, `employeeLastName`, `employeeMail`, `employeePhone`, `employeeService`) VALUES
(1, 'Guillaume', 'HANOCQ', 'guillaume.hanocq@cvs.fr', '0632006909', 'Bureau d\'étude'),
(2, 'Victor', 'RUBIRA', 'victor.rubira@cvs.fr', '0681521931', 'Commercial'),
(3, 'Léo', 'ASSELOT', 'leo.asselot@cvs.fr', '0679538113', 'Bureau d\'étude');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `projectId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `projectName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`projectId`, `customerId`, `projectName`) VALUES
(2735, 1009, 'BAIES ANTALIS');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `serviceId` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`serviceId`, `serviceName`) VALUES
(3, 'Bureau d\'étude'),
(5, 'Câbleur'),
(4, 'Commercial'),
(1, 'Direction'),
(2, 'Ressources Humaines');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `userEmployee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`userId`, `userName`, `userPass`, `userEmployee`) VALUES
(1, 'ghanocq', '100f600faf1f24a892c5ea67aceb812f7f9cd75a', 1),
(2, 'vrubira', '1f6eff0970e43b49273476ce317241819a87c7bf', 2),
(3, 'lasselot', 'c95afe6662b78bf8562a30bcdb343e6f6ebc69f4', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationId`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `customerId` (`customerId`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`),
  ADD KEY `employeeService` (`employeeService`),
  ADD KEY `employeeId` (`employeeId`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `projectId` (`projectId`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceId`),
  ADD KEY `serviceName` (`serviceName`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `userEmployee` (`userEmployee`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `application`
--
ALTER TABLE `application`
  MODIFY `applicationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;
--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2736;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_SERVICE` FOREIGN KEY (`employeeService`) REFERENCES `service` (`serviceName`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_CUSTOMER_ID` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_EMPLOYEE` FOREIGN KEY (`userEmployee`) REFERENCES `employee` (`employeeId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
