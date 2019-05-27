/*
SQLyog Community v12.2.6 (32 bit)
MySQL - 10.1.37-MariaDB : Database - mywebsite
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mywebsite` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mywebsite`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorie` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`categorie`) values 
(3,'jeux de plateaux'),
(2,'jeux de rôle'),
(1,'jeux de société');

/*Table structure for table `orderdetails` */

DROP TABLE IF EXISTS `orderdetails`;

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `price` double(6,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orderId` (`orderId`),
  KEY `productId` (`productId`),
  CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`idOrder`),
  CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `orderdetails` */

insert  into `orderdetails`(`id`,`orderId`,`productId`,`price`) values 
(1,1,1,40.000),
(2,1,4,40.000),
(3,1,5,25.000),
(4,2,1,40.000),
(5,2,3,90.000),
(6,2,4,40.000),
(7,2,5,25.000),
(8,3,1,40.000),
(9,3,2,50.000),
(10,3,5,25.000),
(11,4,1,40.000),
(12,4,4,40.000),
(13,5,1,40.000),
(14,5,4,40.000),
(15,5,5,25.000),
(16,6,1,40.000),
(17,6,5,25.000),
(18,7,1,40.000),
(19,8,1,40.000),
(21,9,4,40.000);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `statutId` int(11) DEFAULT NULL,
  `dateOrder` datetime DEFAULT NULL,
  PRIMARY KEY (`idOrder`),
  KEY `userId` (`userId`),
  KEY `statutId` (`statutId`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`statutId`) REFERENCES `statuts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

insert  into `orders`(`idOrder`,`userId`,`statutId`,`dateOrder`) values 
(1,1,6,'2019-05-25 12:29:36'),
(2,1,6,'2019-05-25 12:29:36'),
(3,2,6,'2019-05-25 12:29:36'),
(4,2,6,'2019-05-25 12:29:36'),
(5,3,6,'2019-05-25 12:29:36'),
(6,4,6,'2019-05-25 12:29:36'),
(7,1,1,NULL),
(8,2,1,NULL),
(9,1,5,NULL);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `price` double(6,3) NOT NULL,
  `categorieId` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `imageLink` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productName` (`productName`),
  KEY `categorieId` (`categorieId`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categorieId`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`productName`,`price`,`categorieId`,`description`,`imageLink`) values 
(1,'Dice Forge',40.000,1,'Ajouter déscirption','1diceForge'),
(2,'Zcoprs',50.000,2,'Ajouter déscirption','2zcorps'),
(3,'Descent',90.000,3,'Ajouter déscirption','3descentv2'),
(4,'Catane',40.000,1,'','4Catane'),
(5,'Carcassone',25.000,1,'','5carcassonne');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`roleName`) values 
(1,'Root'),
(2,'Administrator'),
(3,'Employee'),
(4,'Customer');

/*Table structure for table `statuts` */

DROP TABLE IF EXISTS `statuts`;

CREATE TABLE `statuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `statut` (`statut`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `statuts` */

insert  into `statuts`(`id`,`statut`) values 
(1,'En attente'),
(2,'En prépration'),
(3,'Expédiée'),
(5,'Panier'),
(4,'Refusée'),
(6,'Terminée');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `passwordUser` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `roleId` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `roleId` (`roleId`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`firstName`,`lastName`,`login`,`passwordUser`,`email`,`roleId`) values 
(1,'Cédric','Jacquemin','CédricRoot','$2y$10$wQDmoytI.gXIgm.juxe1N.zSDCyQNkwkvwGpDPcI27TfeOKBOGUxq','cedjacq@outlook.com',1),
(2,'Cédric','Jacquemin','CédricAdmin','$2y$10$jGVgNc2QyzgqzUSY.wcI2.m7gzryd4Uld7RQaAF291CgAQJkDMHAi','cedjacq@outlook.com',2),
(3,'Edward','Stark','Employee','$2y$10$Nm4N0dVqe03tJWz3aV89AuvWOwvjP5PMxl31mdUyE/R7rrfWWiWji','edwardstark@westeros.be',3),
(4,'Kurt','Cobain','User','$2y$10$lYF0YsGTw6qQd82x3DfgAukrNZ/BZRXXU.UdIWlqhBVPt2/iqH6La','kurtcobain@nirvana.be',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
