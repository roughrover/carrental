/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.4.11-MariaDB : Database - carrental
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`carrental` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `carrental`;

/*Table structure for table `accident` */

DROP TABLE IF EXISTS `accident`;

CREATE TABLE `accident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `des` varchar(100) DEFAULT NULL,
  `dt` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `accident` */

insert  into `accident`(`id`,`uid`,`bid`,`des`,`dt`) values (1,2,2,'akshckjsabcjknsajkcx','2023-06-07'),(2,3,3,'dcdsc','2023-06-15');

/*Table structure for table `bookcar` */

DROP TABLE IF EXISTS `bookcar`;

CREATE TABLE `bookcar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `fdt` varchar(100) DEFAULT NULL,
  `tdt` varchar(100) DEFAULT NULL,
  `des` varchar(100) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `forkm` varchar(20) DEFAULT NULL,
  `statas` varchar(100) DEFAULT 'requested',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bookcar` */

insert  into `bookcar`(`id`,`uid`,`cid`,`fdt`,`tdt`,`des`,`days`,`total`,`forkm`,`statas`) values (2,2,9,'2023-06-12','2023-06-14','to travel from kochi to malappuram',2,NULL,'5000','paid'),(3,3,9,'2023-06-16','2023-06-22','ascjia\r\nknasb\r\nklcaso',6,NULL,'0','paid'),(5,2,12,'2023-06-24','2023-06-28','jhxbashj',6,'8000','164400','paid'),(8,4,11,'2023-07-20','2023-07-22','To TSR',2,'2000',NULL,'accepted');

/*Table structure for table `driven` */

DROP TABLE IF EXISTS `driven`;

CREATE TABLE `driven` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `rpk` varchar(20) DEFAULT NULL,
  `daylimit` varchar(20) DEFAULT NULL,
  `vid` int(11) DEFAULT NULL,
  `kms` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `driven` */

insert  into `driven`(`did`,`rpk`,`daylimit`,`vid`,`kms`,`date`) values (1,'10','50',9,'5000','2023-07-19'),(2,'10','60',10,'6000','2023-07-19'),(3,'9','60',11,'9000','2023-07-19'),(4,'10','60',12,'2000','2023-07-19');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `statas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`id`,`uid`,`username`,`password`,`usertype`,`statas`) values (1,2,'ajay@gmail.com','ajay@123','user','1'),(2,3,'vijay@gmail.com','vijay@123','user','1'),(3,2,'dona@gmail.com','Dona@123','rental','1'),(5,0,'admin@gmail.com','admin','admin','1'),(6,4,'ak@mail.com','Ak@12345','user','1');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `dt` varchar(100) DEFAULT NULL,
  `statas` varchar(100) DEFAULT 'not paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `payment` */

insert  into `payment`(`id`,`bid`,`amount`,`dt`,`statas`) values (2,2,'5000','2023-06-07','paid'),(4,3,'15000','2023-06-15','paid'),(5,5,'8000','2023-06-23','paid'),(6,6,'2500','2023-06-23','paid'),(7,8,'2000',NULL,'not paid');

/*Table structure for table `ploc` */

DROP TABLE IF EXISTS `ploc`;

CREATE TABLE `ploc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ploc` */

insert  into `ploc`(`id`,`bid`,`lat`,`lon`) values (2,2,'10.08225','76.34081'),(3,3,'10.10067','76.34810'),(4,5,'10.10160','76.35463'),(5,6,'10.10261','76.35463');

/*Table structure for table `register` */

DROP TABLE IF EXISTS `register`;

CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `register` */

insert  into `register`(`id`,`name`,`address`,`email`,`phone`) values (2,'Ajay','kjasgcxkhsabhcb','ajay@gmail.com','9089878677'),(3,'Vijay','KJHSAGHCKHAGS','vijay@gmail.com','8089788776'),(4,'AK','Ak\r\nAdrs','ak@mail.com','9090909090');

/*Table structure for table `rentalregister` */

DROP TABLE IF EXISTS `rentalregister`;

CREATE TABLE `rentalregister` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `license` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `proof` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rentalregister` */

insert  into `rentalregister`(`id`,`name`,`license`,`email`,`phone`,`proof`,`lat`,`lon`,`district`) values (2,'Dona Davis','Kl123','dona@gmail.com','8798879878','assets/images/c1.jpg','10.10000','76.35849','ernakulam'),(3,'Phiros','LO233','phiros@gmail.com','9078978980','assets/images/Arabian-jasmine.webp','10.10101','76.35815','ernakulam');

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `des` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `review` */

insert  into `review`(`id`,`uid`,`bid`,`des`) values (1,2,2,'providing the review forrrrr'),(2,3,3,'sacdvc');

/*Table structure for table `vehicle` */

DROP TABLE IF EXISTS `vehicle`;

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `model` varchar(50) NOT NULL,
  `vno` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `proof` varchar(100) NOT NULL,
  `seats` int(11) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `rate` varchar(20) DEFAULT NULL,
  `statas` varchar(100) DEFAULT 'available',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `vehicle` */

insert  into `vehicle`(`id`,`uid`,`model`,`vno`,`color`,`fuel`,`proof`,`seats`,`desc`,`rate`,`statas`) values (9,2,'Grandddddd','kl-43-M-6789','RED','petrol','../assets/images/38.avengers-poster-4k-27 (4).jpg',5,'hjvgjhbh','500','available'),(10,2,'Maruthi800','kl-43-K-3212','RED','diesal','../assets/images/ashaworker.jpg',4,'kjbgujh','500','available'),(11,2,'KIA','kl-43-X-1089','Brown','petrol','../assets/images/AAicon.png',6,'ljkbnhkj','1000','available'),(12,2,'Swift','KL07A0001','RED','petrol','../assets/images/gettyimages-807405670-612x612.jpg',5,'Swift ZXI+\r\nFully Automativc','20000','available');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
