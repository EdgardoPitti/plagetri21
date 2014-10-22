CREATE DATABASE  IF NOT EXISTS `plagetri21` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `plagetri21`;
-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: plagetri21
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `condiciones_enfermedades`
--

DROP TABLE IF EXISTS `condiciones_enfermedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condiciones_enfermedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_enfermedad` int(11) DEFAULT NULL,
  `id_marcador` int(11) DEFAULT NULL,
  `valor_condicion` tinyint(4) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condiciones_enfermedades`
--

LOCK TABLES `condiciones_enfermedades` WRITE;
/*!40000 ALTER TABLE `condiciones_enfermedades` DISABLE KEYS */;
INSERT INTO `condiciones_enfermedades` VALUES (1,3,1,-1,'2014-10-22 15:25:39','2014-10-22 15:25:39'),(2,3,2,0,'2014-10-22 15:25:39','2014-10-22 15:44:34'),(3,3,3,0,'2014-10-22 15:25:39','2014-10-22 15:25:39'),(4,3,4,1,'2014-10-22 15:25:39','2014-10-22 15:25:39'),(5,3,5,1,'2014-10-22 15:25:39','2014-10-22 15:44:05'),(6,3,6,0,'2014-10-22 15:25:39','2014-10-22 15:25:39'),(7,3,7,0,'2014-10-22 15:25:39','2014-10-22 15:25:39'),(8,1,1,-1,'2014-10-22 15:40:45','2014-10-22 15:40:45'),(9,1,2,1,'2014-10-22 15:40:45','2014-10-22 15:40:51'),(10,1,3,0,'2014-10-22 15:40:45','2014-10-22 15:40:45'),(11,1,4,0,'2014-10-22 15:40:45','2014-10-22 15:40:45'),(12,1,5,-1,'2014-10-22 15:40:45','2014-10-22 15:40:51'),(13,1,6,0,'2014-10-22 15:40:45','2014-10-22 15:40:45'),(14,1,7,0,'2014-10-22 15:40:45','2014-10-22 15:40:45');
/*!40000 ALTER TABLE `condiciones_enfermedades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedades`
--

DROP TABLE IF EXISTS `enfermedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `mensaje_positivo` text,
  `mensaje_negativo` text,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedades`
--

LOCK TABLES `enfermedades` WRITE;
/*!40000 ALTER TABLE `enfermedades` DISABLE KEYS */;
INSERT INTO `enfermedades` VALUES (1,'Trisomía 21','','El riesgo del síndrome de Down es MENOR que el del corte de sondeo. El exámen de suero ha indicado un riesgo sustancialmente REDUCIDO en comparación al de aquel basado en la edad materna solamente.',NULL,NULL),(3,'Trisomia 18','Positivo','Negativo','2014-10-22 15:25:39','2014-10-22 15:25:39');
/*!40000 ALTER TABLE `enfermedades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-22 11:25:00
