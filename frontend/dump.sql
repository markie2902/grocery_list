-- MySQL dump 10.13  Distrib 5.6.22, for osx10.10 (x86_64)
--
-- Host: localhost    Database: grocery_list
-- ------------------------------------------------------
-- Server version	5.6.22

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
-- Current Database: `grocery_list`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `grocery_list` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `grocery_list`;

--
-- Table structure for table `create_account`
--

DROP TABLE IF EXISTS `create_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `create_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `repeat_password` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `zipcode` int(5) DEFAULT NULL,
  `picture` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_account`
--

LOCK TABLES `create_account` WRITE;
/*!40000 ALTER TABLE `create_account` DISABLE KEYS */;
INSERT INTO `create_account` VALUES (1,'dfsdf','sdfsdfs','dsffd','dfdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'markie2902','burlbus952','burlbus952','markie2902@yahoo.com',NULL,'Markie','Guerrero','M','1979-01-23','Lafayette','California','United States',94549,NULL),(6,'marcvguerrero','ehem','ehem','marcvguerrero@gmail.com',NULL,'Marc Vincent','Guerrero','M','1980-07-10','Lafayette','California','United States',94549,''),(7,'patriciadd','dd','dd','patriciadguerrero@yahoo.com',NULL,'Patricia Deniece','Guerrero','Female','1985-01-26','Lafayette','California','United States',94549,NULL),(10,'st.markie','nice','nice','st.markie@yahoo.com',NULL,'Marcus Sanrosa','Araneta','M','1999-12-12','Bacolod','Negros Occidental','Philippines',0,NULL),(11,'jon717','wewewewe','wewewewe','jonvanhoy@nono.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'spidey','guerrero','guerrero','spideyguerrero@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'titototo','aaaaa','aaaaa','abcde@blabla.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'fidodido','1234','1234','fidodido@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'patrik','pooo','pooo','patrick@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'Mickey12','nana','nana','mickey12@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'marky2902','nagger','nagger','marky2902@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'patringdd','nene','nene','patring@yoyo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,'litolito','lito','lito','litolito@yoyo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'linda27','weeee','weeee','linda27@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'ethan123','mama','repeat_password','ethan123@example.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'isay','nono','repeat_password','isay@example.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,'ethan122','lolo','repeat_password','ethan122@example.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,'kimmi','123','repeat_password','kimmi@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,'ethanfran','1234','1234','ethanfran@yahoo.com',NULL,'Ethan Francis','Guerrero','M','2013-05-13','Lafayette','California','United States',94549,''),(45,'mamamia','mmmm','mmmm','mamamia@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,'markie290222','himhim','himhim','marcvieeguerrero@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'markievguerrero','yes','yes','markievguerrero@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,'kellyg','grant','grant','grant@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,'kellygrant','grant','grant','kellyg@yoyo.com',NULL,'Kelly Grant','Guerrero','M','1977-05-14','Bacolod','Negros Occidental','Philippines',0,NULL),(50,'issai','sam','sam','sammy@gmail.com',NULL,'issai','Vanhoy','F','1983-01-27','Lafayette','California','United States',94549,NULL),(51,'ethanfrancis','','','ethanfrancis123@example.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,'krisgrace','grace','grace','krissy@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,'kristin','tin','tin','kristing@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'mamama','mama','mama','mamama@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'brandonvan','vanhoy','vanhoy','brandonvan@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,'dsfsdfs','dfdf','dfdf','sdfsdfsdfs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,'cynthia77','7712','7712','cynthia@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(58,'maryangelica','lica','lica','angelica@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,'lawrence','rence','rence','lawrence@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,'dinommril','mamaril','mamaril','dinodins@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,'dinodins','dino','dino','dinomamaril@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,'kristian','mark','mark','kristianmark@papasin.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,'ethanethan123','123','123','ethanethan123@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,'laralara','lara','lara','laramarie@ibrado.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,'kellygran','grant','grant','user_kellygran@yoyo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,'grantkelly','andie','andie','user_andiegrant@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,'kellygrant10101','1010','1010','kellygran1010@yoyo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,'jonajonathan','jona','jona','jonathan@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,'abbygoil','abby','abby','abby@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(71,'markiepat','patricia','patricia','markiepat@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(72,'markie2902pat','ethan','ethan','markie2902pat@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,'markiepatricia','ethan','ethan','markiepatricia@gmail.com',NULL,'Markie','Patricia','M','1985-01-20','Quezon','Manila','Philippines',0,NULL),(74,'marco','polo','polo','marcpolo@gmail.com',NULL,'Maco Polo','Culombus','M','1661-01-01','Maldrid','','Spain',0,NULL),(75,'kristin grace','sean','sean','kristingrace@yahoo.com',NULL,'Kristin Gracey','Gonzalez','Female','1982-03-19','Bacolod','Negros Occidental','Philippines',6100,NULL),(76,'brucelee','lee','lee','brucelee@gmail.com',NULL,'Bruce','Lee','Male','1940-11-27','San Francisco','California','United States',91001,NULL);
/*!40000 ALTER TABLE `create_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-22 21:59:15
