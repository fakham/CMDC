--
-- Config de base de données
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
--  Base de données : CMDC
--
CREATE DATABASE IF NOT EXISTS `CMDC` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `CMDC`;

--
-- Structure de table : Utilisateur
--
DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE IF NOT EXISTS `Utilisateur` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`prenom` varchar(50) NOT NULL,
	`email` varchar(255) NOT NULL,
	`telephone` varchar(50) NOT NULL,
	`username` varchar(50) NOT NULL,
	`password` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Structure de table : Administrateur
--
DROP TABLE IF EXISTS `Administrateur`;
CREATE TABLE IF NOT EXISTS `Administrateur` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`prenom` varchar(50) NOT NULL,
	`email` varchar(255) NOT NULL,
	`username` varchar(50) NOT NULL,
	`password` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Structure de table : Fournisseur
--
DROP TABLE IF EXISTS `Fournisseur`;
CREATE TABLE IF NOT EXISTS `Fournisseur` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`telephone` varchar(50) NOT NULL,
	`activite` varchar(255) NOT NULL,
	`region` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Structure de table : Client
--
DROP TABLE IF EXISTS `Client`;
CREATE TABLE IF NOT EXISTS `Client` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`telephone` varchar(50) NOT NULL,
	`activite` varchar(255) NOT NULL,
	`region` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Structure de table : Produit
--
DROP TABLE IF EXISTS `Produit`;
CREATE TABLE IF NOT EXISTS `Produit` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`description` varchar(255) NOT NULL,
	`prix` decimal(15,2) NOT NULL,
	`type` varchar(50) NOT NULL,
	`qtte` int(11) NOT NULL,
	`isFinit` tinyint(1) NOT NULL,
	`client` int(11) NOT NULL,
	`fournisseur` int(11) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Structure de table : Charge
--
DROP TABLE IF EXISTS `Charge`;
CREATE TABLE IF NOT EXISTS `Charge` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`date` datetime NOT NULL,
	`type` varchar(50) NOT NULL,
	`utilisateur` int(11) NOT NULL,
	`produit` int(11) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Structure de table : Recette
--
DROP TABLE IF EXISTS `Recette`;
CREATE TABLE IF NOT EXISTS `Recette` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`date` datetime NOT NULL,
	`type` varchar(50) NOT NULL,
	`utilisateur` int(11) NOT NULL,
	`produit` int(11) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Constraints for table `Recette`
--
ALTER TABLE `Recette`
  ADD CONSTRAINT `FK_Recette_Utilisateur` FOREIGN KEY (`utilisateur`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  ADD CONSTANT `FK_Recette_Produit` FOREIGN KEY (`produit`) REFERENCES `Produit`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 
--
-- Constraints for table `Charge`
--
ALTER TABLE `Charge`
  ADD CONSTRAINT `FK_Charge_Utilisateur` FOREIGN KEY (`utilisateur`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 ALTER TABLE `Charge`
  ADD CONSTANT `FK_Charge_Produit` FOREIGN KEY (`produit`) REFERENCES `Produit`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 
 --
-- Constraints for table `Produit`
--
ALTER TABLE `Produit`
  ADD CONSTRAINT `FK_Produit_Client` FOREIGN KEY (`client`) REFERENCES `Client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 ALTER TABLE `Produit`
  ADD CONSTANT `FK_Produit_Fournisseur` FOREIGN KEY (`fournisseur`) REFERENCES `Fournisseur`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  
  
COMMIT;