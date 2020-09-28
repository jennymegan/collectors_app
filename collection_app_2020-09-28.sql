# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.31)
# Database: collection_app
# Generation Time: 2020-09-28 12:57:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table my_vinyl_collection
# ------------------------------------------------------------

DROP TABLE IF EXISTS `my_vinyl_collection`;

CREATE TABLE `my_vinyl_collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `artist_firstname` varchar(100) NOT NULL DEFAULT '',
  `artist_lastname` varchar(100) DEFAULT NULL,
  `album` varchar(100) NOT NULL DEFAULT '',
  `year` year(4) NOT NULL,
  `cover_art` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `my_vinyl_collection` WRITE;
/*!40000 ALTER TABLE `my_vinyl_collection` DISABLE KEYS */;

INSERT INTO `my_vinyl_collection` (`id`, `artist_firstname`, `artist_lastname`, `album`, `year`, `cover_art`)
VALUES
	(1,'Fiona','Apple','When The Pawn','1999','Fiona_apple_when_the_pawn.jpg'),
	(2,'Alanis','Morrissette','Jagged Little Pill','1995','Alanis_m_jagged.jpg'),
	(3,'Aimee','Mann','Bachelor No. 2','2000','Aimee_m_bachelor.jpg'),
	(4,'Garbage',NULL,'Garbage','1995','Garbage_garbage.jpg'),
	(5,'Brandi','Carlile','Give Up The Ghost','2009','Brandi_Carlile_Give_Up_the_Ghost.png'),
	(6,'Amanda','Palmer','Who Killed Amanda Palmer','2008','amanda_palmer_who_killed.jpg'),
	(7,'Kate','Bush','Hounds Of Love','1985','kate_bush_hounds.jpg'),
	(8,'Roger ','Glover','Elements','1978','Roger_glover_elements.jpg'),
	(9,'Pink','Floyd','Wish You Were Here','1975','Pink_Floyd_Wish_You_Were_Here.png'),
	(10,'Mike','Oldfield','Crises','1983','Mike_oldfield_crises.jpg');

/*!40000 ALTER TABLE `my_vinyl_collection` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
