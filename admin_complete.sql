-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: admin
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `challenges`
--

DROP TABLE IF EXISTS `challenges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `challenges` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `difficulty` int(1) NOT NULL,
  `src` varchar(128) NOT NULL,
  `category` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenges`
--

LOCK TABLES `challenges` WRITE;
/*!40000 ALTER TABLE `challenges` DISABLE KEYS */;
INSERT INTO `challenges` VALUES (1,1,'dvwa_sql_low.php','SQLi'),(2,1,'xvwa_sql.php','SQLi'),(3,1,'bricks_get_1.php','URL'),(4,1,'dvwa_cmdi_low.php','CMDi'),(5,1,'dvwa_xss_reflected_low.php','XSS');
/*!40000 ALTER TABLE `challenges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlists` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `challenges` varchar(128) NOT NULL,
  `creator` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlists`
--

LOCK TABLES `playlists` WRITE;
/*!40000 ALTER TABLE `playlists` DISABLE KEYS */;
INSERT INTO `playlists` VALUES (1,'Easy','1;2;3;4;5;','Brae');
/*!40000 ALTER TABLE `playlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `challengeid` int(6) unsigned NOT NULL,
  `username` varchar(256) NOT NULL,
  `time` int(6) unsigned NOT NULL,
  `clickcount` int(10) NOT NULL,
  `charcount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (1,'Brae',11,4,11),(2,'Brae',7,3,11),(2,'Brae',6,4,6),(1,'test1',9,3,11),(2,'test1',37,5,12),(1,'test1',5,4,11),(2,'test1',12,4,11),(1,'test1',12,3,11),(2,'test1',6,3,11),(2,'test1',8,3,11),(1,'test1',282,5,11),(2,'test1',7,4,15),(1,'test1',33,36,13),(1,'test1',6,3,11),(2,'test1',5,3,11),(1,'Brae',5,3,15),(2,'Brae',6,3,12),(1,'Brae',11,3,14),(2,'Brae',6,3,2),(1,'Brae',8,3,19),(2,'Brae',5,3,3),(1,'Brae',7,3,15),(2,'Brae',7,3,11),(1,'Brae',79,5,12),(1,'Brae',7,3,11),(2,'Brae',6,3,11),(1,'Brae',6,3,11),(2,'Brae',5,3,11),(1,'Brae',6,3,15),(2,'Brae',6,3,16),(1,'Brae',8,3,13),(2,'Brae',5,3,15),(1,'Brae',51,5,13),(2,'Brae',1,1,0),(1,'Brae',1371,8,11),(2,'Brae',6,3,11),(3,'Brae',17,1,0),(1,'Brae',5,3,11),(2,'Brae',294,4,3),(3,'Brae',6,1,0),(1,'Brae',6,3,27),(2,'Brae',3,3,3),(3,'Brae',4,1,0),(1,'Brae',4,3,12),(2,'Brae',5,3,3),(3,'Brae',5,1,0),(4,'Brae',10,3,10),(5,'Brae',1,1,0),(1,'Brae',9,3,13),(2,'Brae',6,3,5),(2,'Brae',56,5,78),(3,'Brae',4,1,0),(4,'Brae',10,3,27),(5,'Brae',7,3,9);
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pedrocowman@gmail.com','$2y$11$j6f9DndlKCarWjr7fAQ4n.EGGAdFnG4mQsukwR1KOqveNyTDxdvq2','Brae',NULL),(2,'test1@brae.io','$2y$11$tWd8A7a9MU1zd2N056RLy.3carZYBzlu6G2k2j9LE14xIdRIgM3ka','test1',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-05 22:25:18
