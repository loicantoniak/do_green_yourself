-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  ven. 06 mars 2020 à 17:56
-- Version du serveur :  10.2.25-MariaDB
-- Version de PHP :  7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cutron01_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `belong`
--

CREATE TABLE `belong` (
  `idCategory` int(11) NOT NULL,
  `idTutorial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bookmarkShop`
--

CREATE TABLE `bookmarkShop` (
  `idShop` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bookmarkTutorial`
--

CREATE TABLE `bookmarkTutorial` (
  `tutorialbookmark` int(11) NOT NULL,
  `userbookmarktutorial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Category`
--

CREATE TABLE `Category` (
  `idCategory` int(11) NOT NULL,
  `idCatMother` int(11) DEFAULT NULL,
  `nameCat` varchar(255) NOT NULL,
  `illustrationCat` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Comment`
--

CREATE TABLE `Comment` (
  `idComment` int(11) NOT NULL,
  `idComFather` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idTutorial` int(11) NOT NULL,
  `textComment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `flag`
--

CREATE TABLE `flag` (
  `idTutorial` int(11) NOT NULL,
  `idTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `usergrade` int(11) NOT NULL,
  `idTutorial` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `Ingredient`
--

CREATE TABLE `Ingredient` (
  `idIngredient` int(11) NOT NULL,
  `nameIng` varchar(255) NOT NULL,
  `unitIng` varchar(20) NOT NULL,
  `essential` tinyint(1) DEFAULT 0,
  `descriptionIng` varchar(255) DEFAULT NULL,
  `illustrationIng` longblob DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `need`
--

CREATE TABLE `need` (
  `idTutorial` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Shop`
--

CREATE TABLE `Shop` (
  `idShop` int(11) NOT NULL,
  `nameShop` varchar(255) NOT NULL,
  `addressShop` varchar(255) NOT NULL,
  `PCShop` char(5) NOT NULL,
  `cityShop` varchar(255) NOT NULL,
  `countryShop` varchar(255) NOT NULL,
  `phoneShop` char(10) DEFAULT NULL,
  `emailShop` varchar(255) DEFAULT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `photoShop` longblob DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `idUser` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `totalAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Step`
--

CREATE TABLE `Step` (
  `idStep` int(11) NOT NULL,
  `idTutorial` int(11) NOT NULL,
  `orderStep` int(11) NOT NULL,
  `textStep` text DEFAULT NULL,
  `illustrationStep` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Tag`
--

CREATE TABLE `Tag` (
  `idTag` int(11) NOT NULL,
  `tag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Tutorial`
--

CREATE TABLE `Tutorial` (
  `idTutorial` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptionTuto` varchar(1000) NOT NULL,
  `preparationTime` time DEFAULT NULL,
  `averageGrade` float DEFAULT NULL,
  `illustrationTuto` longblob DEFAULT NULL,
  `status` enum('Being edited','Waiting for validation','Valid','Not valid') DEFAULT 'Being edited',
  `dateTuto` datetime DEFAULT current_timestamp()
) ;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(255) NOT NULL,
  `firstnameUser` varchar(255) NOT NULL,
  `addressUser` varchar(255) DEFAULT NULL,
  `PCUser` char(5) DEFAULT NULL,
  `cityUser` varchar(255) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `countryUser` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` char(1) DEFAULT NULL,
  `emailUser` varchar(255) NOT NULL,
  `photoUser` longblob DEFAULT NULL,
  `roleUser` enum('User','Administrator','Moderator') DEFAULT 'User',
  `reporting` int(11) DEFAULT 0
) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`idCategory`,`idTutorial`),
  ADD KEY `FK_belong2` (`idTutorial`);

--
-- Index pour la table `bookmarkShop`
--
ALTER TABLE `bookmarkShop`
  ADD PRIMARY KEY (`idShop`,`idUser`),
  ADD KEY `FK_bookmarkShop2` (`idUser`);

--
-- Index pour la table `bookmarkTutorial`
--
ALTER TABLE `bookmarkTutorial`
  ADD PRIMARY KEY (`tutorialbookmark`,`userbookmarktutorial`),
  ADD KEY `FK_bookmarkTutorial2` (`userbookmarktutorial`);

--
-- Index pour la table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`idCategory`),
  ADD KEY `FK_mother` (`idCatMother`);

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `FK_leave` (`idUser`),
  ADD KEY `FK_comment` (`idTutorial`),
  ADD KEY `FK_father` (`idComFather`);

--
-- Index pour la table `flag`
--
ALTER TABLE `flag`
  ADD PRIMARY KEY (`idTutorial`,`idTag`),
  ADD KEY `FK_flag2` (`idTag`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`usergrade`,`idTutorial`),
  ADD KEY `FK_grade2` (`idTutorial`);

--
-- Index pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
  ADD PRIMARY KEY (`idIngredient`);

--
-- Index pour la table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`idTutorial`,`idIngredient`),
  ADD KEY `FK_need2` (`idIngredient`);

--
-- Index pour la table `Shop`
--
ALTER TABLE `Shop`
  ADD PRIMARY KEY (`idShop`);

--
-- Index pour la table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`idUser`,`idIngredient`),
  ADD KEY `FK_shopping_list2` (`idIngredient`);

--
-- Index pour la table `Step`
--
ALTER TABLE `Step`
  ADD PRIMARY KEY (`idStep`),
  ADD KEY `FK_possess` (`idTutorial`);

--
-- Index pour la table `Tag`
--
ALTER TABLE `Tag`
  ADD PRIMARY KEY (`idTag`);

--
-- Index pour la table `Tutorial`
--
ALTER TABLE `Tutorial`
  ADD PRIMARY KEY (`idTutorial`),
  ADD KEY `FK_post` (`user`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Category`
--
ALTER TABLE `Category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Shop`
--
ALTER TABLE `Shop`
  MODIFY `idShop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Step`
--
ALTER TABLE `Step`
  MODIFY `idStep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Tag`
--
ALTER TABLE `Tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Tutorial`
--
ALTER TABLE `Tutorial`
  MODIFY `idTutorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `FK_belong` FOREIGN KEY (`idCategory`) REFERENCES `Category` (`idCategory`),
  ADD CONSTRAINT `FK_belong2` FOREIGN KEY (`idTutorial`) REFERENCES `Tutorial` (`idTutorial`);

--
-- Contraintes pour la table `bookmarkShop`
--
ALTER TABLE `bookmarkShop`
  ADD CONSTRAINT `FK_bookmarkShop` FOREIGN KEY (`idShop`) REFERENCES `Shop` (`idShop`),
  ADD CONSTRAINT `FK_bookmarkShop2` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`);

--
-- Contraintes pour la table `bookmarkTutorial`
--
ALTER TABLE `bookmarkTutorial`
  ADD CONSTRAINT `FK_bookmarkTutorial` FOREIGN KEY (`tutorialbookmark`) REFERENCES `Tutorial` (`idTutorial`),
  ADD CONSTRAINT `FK_bookmarkTutorial2` FOREIGN KEY (`userbookmarktutorial`) REFERENCES `User` (`idUser`);

--
-- Contraintes pour la table `Category`
--
ALTER TABLE `Category`
  ADD CONSTRAINT `FK_mother` FOREIGN KEY (`idCatMother`) REFERENCES `Category` (`idCategory`);

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `FK_comment` FOREIGN KEY (`idTutorial`) REFERENCES `Tutorial` (`idTutorial`),
  ADD CONSTRAINT `FK_father` FOREIGN KEY (`idComFather`) REFERENCES `Comment` (`idComment`),
  ADD CONSTRAINT `FK_leave` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`);

--
-- Contraintes pour la table `flag`
--
ALTER TABLE `flag`
  ADD CONSTRAINT `FK_flag` FOREIGN KEY (`idTutorial`) REFERENCES `Tutorial` (`idTutorial`),
  ADD CONSTRAINT `FK_flag2` FOREIGN KEY (`idTag`) REFERENCES `Tag` (`idTag`);

--
-- Contraintes pour la table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `FK_grade` FOREIGN KEY (`usergrade`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `FK_grade2` FOREIGN KEY (`idTutorial`) REFERENCES `Tutorial` (`idTutorial`);

--
-- Contraintes pour la table `need`
--
ALTER TABLE `need`
  ADD CONSTRAINT `FK_need` FOREIGN KEY (`idTutorial`) REFERENCES `Tutorial` (`idTutorial`),
  ADD CONSTRAINT `FK_need2` FOREIGN KEY (`idIngredient`) REFERENCES `Ingredient` (`idIngredient`);

--
-- Contraintes pour la table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD CONSTRAINT `FK_shopping_list` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `FK_shopping_list2` FOREIGN KEY (`idIngredient`) REFERENCES `Ingredient` (`idIngredient`);

--
-- Contraintes pour la table `Step`
--
ALTER TABLE `Step`
  ADD CONSTRAINT `FK_possess` FOREIGN KEY (`idTutorial`) REFERENCES `Tutorial` (`idTutorial`);

--
-- Contraintes pour la table `Tutorial`
--
ALTER TABLE `Tutorial`
  ADD CONSTRAINT `FK_post` FOREIGN KEY (`user`) REFERENCES `User` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
