-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema plagetri21
--

CREATE DATABASE IF NOT EXISTS plagetri21;
USE plagetri21;

--
-- Definition of table `plagetri21`.`activos`
--


-- Dumping data for table `plagetri21`.`activos`
--




--
-- Definition of table `plagetri21`.`citas_medicas`
--

DROP TABLE IF EXISTS `plagetri21`.`citas_medicas`;
CREATE TABLE  `plagetri21`.`citas_medicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente` int(10) unsigned NOT NULL DEFAULT '0',
  `id_medico` int(10) unsigned NOT NULL DEFAULT '0',
  `peso` double NOT NULL DEFAULT '0',
  `fecha_ultrasonido` varchar(45) NOT NULL DEFAULT '',
  `fur` varchar(45) NOT NULL DEFAULT '',
  `fpp` varchar(45) NOT NULL DEFAULT '',
  `fecha_flebotomia` varchar(45) NOT NULL,
  `edad_gestacional` int(10) unsigned NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `observaciones` text,
  `estatura` double NOT NULL DEFAULT '0',
  `id_institucion` int(10) unsigned NOT NULL DEFAULT '0',
  `hijos_embarazo` int(10) unsigned NOT NULL DEFAULT '1',
  `fecha_cita` varchar(45) NOT NULL,
  `riesgo` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_citas_medicas_paciente` (`id_paciente`),
  KEY `FK_citas_medicas_medico` (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`citas_medicas`
--

/*!40000 ALTER TABLE `citas_medicas` DISABLE KEYS */;
LOCK TABLES `citas_medicas` WRITE;
INSERT INTO `plagetri21`.`citas_medicas` VALUES  (1,1,3,45,'2014-06-04','2014-06-04','2014-06-04','2014-06-04',22,'2014-06-04 18:46:56','2014-07-18 19:33:31','Observaciones',1.65,406011303,2,'2014-07-04','1526.90'),
 (2,1,3,147,'','2014-08-08','','2014-08-08',4147,'2014-08-08 18:49:09','2014-08-08 18:49:09','',0,0,0,'2014-08-08','966.52');
UNLOCK TABLES;
/*!40000 ALTER TABLE `citas_medicas` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`coeficientes`
--

DROP TABLE IF EXISTS `plagetri21`.`coeficientes`;
CREATE TABLE  `plagetri21`.`coeficientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_raza` int(10) unsigned NOT NULL,
  `id_marcador` int(10) unsigned NOT NULL,
  `a` double NOT NULL,
  `b` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`coeficientes`
--

/*!40000 ALTER TABLE `coeficientes` DISABLE KEYS */;
LOCK TABLES `coeficientes` WRITE;
INSERT INTO `plagetri21`.`coeficientes` VALUES  (1,1,1,0.00173,0.2583),
 (2,1,4,0.00177,0.267),
 (3,1,2,0.0006,0.0912),
 (4,2,1,0.00137,0.2227),
 (5,2,4,0.00141,0.2276),
 (6,2,2,0.00069,0.1127),
 (7,3,1,0.00173,0.2466),
 (8,3,4,0.00151,0.2184),
 (9,3,2,0.00075,0.1076),
 (10,4,1,0.00231,0.2904),
 (11,4,4,0.00341,0.4369),
 (12,4,2,0.00129,0.1625);
UNLOCK TABLES;
/*!40000 ALTER TABLE `coeficientes` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`coeficientes_nuevos`
--

DROP TABLE IF EXISTS `plagetri21`.`coeficientes_nuevos`;
CREATE TABLE  `plagetri21`.`coeficientes_nuevos` (
  `id` int(11) NOT NULL,
  `id_marcador` int(10) DEFAULT NULL,
  `a` double DEFAULT NULL,
  `b` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`coeficientes_nuevos`
--

/*!40000 ALTER TABLE `coeficientes_nuevos` DISABLE KEYS */;
LOCK TABLES `coeficientes_nuevos` WRITE;
INSERT INTO `plagetri21`.`coeficientes_nuevos` VALUES  (1,1,0.2452,54.0555),
 (2,2,0.7474,19.8874),
 (3,4,0.6189,32.5776);
UNLOCK TABLES;
/*!40000 ALTER TABLE `coeficientes_nuevos` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`corregimientos`
--


-- Dumping data for table `plagetri21`.`corregimientos`
--

--
-- Definition of table `plagetri21`.`distritos`
--

-- Definition of table `plagetri21`.`grupos_usuarios`
--

DROP TABLE IF EXISTS `plagetri21`.`grupos_usuarios`;
CREATE TABLE  `plagetri21`.`grupos_usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grupo_usuario` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL DEFAULT 'aaaa-mm-dd',
  `updated_at` varchar(45) NOT NULL DEFAULT 'aaaa-mm-dd',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`grupos_usuarios`
--

/*!40000 ALTER TABLE `grupos_usuarios` DISABLE KEYS */;
LOCK TABLES `grupos_usuarios` WRITE;
INSERT INTO `plagetri21`.`grupos_usuarios` VALUES  (1,'ADMINISTRADOR','aaaa-mm-dd','2014-08-07 22:12:26'),
 (2,'MEDICOS','aaaa-mm-dd','aaaa-mm-dd'),
 (3,'ENFERMEROS','aaaa-mm-dd','aaaa-mm-dd');
UNLOCK TABLES;
/*!40000 ALTER TABLE `grupos_usuarios` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`instituciones`
--


-- Definition of table `plagetri21`.`marcadores`
--

DROP TABLE IF EXISTS `plagetri21`.`marcadores`;
CREATE TABLE  `plagetri21`.`marcadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marcador` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`marcadores`
--

/*!40000 ALTER TABLE `marcadores` DISABLE KEYS */;
LOCK TABLES `marcadores` WRITE;
INSERT INTO `plagetri21`.`marcadores` VALUES  (1,'AFP'),
 (2,'UE3'),
 (3,'INHIBIN A'),
 (4,'HCG'),
 (5,'PAPPA'),
 (6,'TN'),
 (7,'HCG TOTAL');
UNLOCK TABLES;
/*!40000 ALTER TABLE `marcadores` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`marcadores_citas`
--

DROP TABLE IF EXISTS `plagetri21`.`marcadores_citas`;
CREATE TABLE  `plagetri21`.`marcadores_citas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cita` int(10) unsigned NOT NULL DEFAULT '0',
  `id_marcador` int(10) unsigned NOT NULL DEFAULT '0',
  `id_metodologia` int(10) unsigned NOT NULL DEFAULT '0',
  `valor` double NOT NULL DEFAULT '0',
  `mom` double NOT NULL DEFAULT '0',
  `corr_peso_exponencial` double NOT NULL,
  `corr_peso_lineal` double NOT NULL,
  `id_unidad` int(10) NOT NULL,
  `created_at` varchar(45) NOT NULL DEFAULT '',
  `updated_at` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`marcadores_citas`
--

/*!40000 ALTER TABLE `marcadores_citas` DISABLE KEYS */;
LOCK TABLES `marcadores_citas` WRITE;
INSERT INTO `plagetri21`.`marcadores_citas` VALUES  (1,1,1,2,1,1,0.0000000000023701181715118,133.8688085676,0,'2014-06-04 18:46:56','2014-07-18 19:33:31'),
 (2,1,2,2,2,1,0.000078595919651819,380.71065989848,0,'2014-06-04 18:46:56','2014-07-18 19:33:31'),
 (3,1,3,1,3,1,0,0,0,'2014-06-04 18:46:56','2014-07-18 19:33:31'),
 (4,1,4,1,4,1,0.00000000000096212167790178,129.81393336218,0,'2014-06-04 18:46:56','2014-07-18 19:33:31'),
 (5,1,5,1,5,1,0,0,0,'2014-06-04 18:46:56','2014-07-18 19:33:31'),
 (6,1,6,2,6,1,0,0,0,'2014-06-04 18:46:56','2014-07-18 19:33:31'),
 (7,1,7,1,7,1,0,0,0,'2014-06-05 01:37:19','2014-07-18 19:33:31'),
 (8,2,1,0,0,0,0,0,0,'2014-08-08 18:49:09','2014-08-08 18:49:09'),
 (9,2,2,0,0,0,0,0,0,'2014-08-08 18:49:09','2014-08-08 18:49:09'),
 (10,2,3,0,0,0,0,0,0,'2014-08-08 18:49:09','2014-08-08 18:49:09'),
 (11,2,4,0,0,0,0,0,0,'2014-08-08 18:49:09','2014-08-08 18:49:09'),
 (12,2,5,0,0,0,0,0,0,'2014-08-08 18:49:09','2014-08-08 18:49:09'),
 (13,2,6,0,0,0,0,0,0,'2014-08-08 18:49:09','2014-08-08 18:49:09'),
 (14,2,7,0,0,0,0,0,0,'2014-08-08 18:49:09','2014-08-08 18:49:09');
UNLOCK TABLES;
/*!40000 ALTER TABLE `marcadores_citas` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`mediana_marcadores`
--

DROP TABLE IF EXISTS `plagetri21`.`mediana_marcadores`;
CREATE TABLE  `plagetri21`.`mediana_marcadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_marcador` int(10) unsigned NOT NULL,
  `mediana_marcador` double NOT NULL,
  `id_unidad` int(10) unsigned NOT NULL,
  `semana` int(10) unsigned NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`mediana_marcadores`
--

/*!40000 ALTER TABLE `mediana_marcadores` DISABLE KEYS */;
LOCK TABLES `mediana_marcadores` WRITE;
INSERT INTO `plagetri21`.`mediana_marcadores` VALUES  (8,5,25.3,2,15,'',''),
 (10,1,42.5,2,16,'2014-07-29 22:26:40','2014-07-15 18:12:29'),
 (13,2,0.6,2,12,'2014-07-29 22:23:04','2014-07-29 22:23:04'),
 (14,2,0.7,2,13,'2014-07-29 22:23:18','2014-07-29 22:23:18'),
 (15,2,1,2,14,'2014-07-29 22:23:31','2014-07-29 22:23:31'),
 (16,2,2.7,2,15,'2014-07-29 22:23:44','2014-07-29 22:23:44'),
 (17,2,3.95,2,16,'2014-07-29 22:23:58','2014-07-29 22:23:58'),
 (18,2,4.05,2,17,'2014-07-29 22:24:12','2014-07-29 22:24:12'),
 (19,2,5.05,2,18,'2014-07-29 22:24:24','2014-07-29 22:24:24'),
 (20,1,28,2,14,'2014-07-29 22:26:15','2014-07-29 22:25:34'),
 (21,1,37,2,15,'2014-07-29 22:26:28','2014-07-29 22:26:28'),
 (22,1,47.5,2,17,'2014-07-29 22:26:57','2014-07-29 22:26:57'),
 (23,1,57.5,2,18,'2014-07-29 22:27:08','2014-07-29 22:27:08'),
 (24,4,28.8,2,14,'2014-07-29 22:52:16','2014-07-29 22:52:16'),
 (25,5,1337,2,11,'2014-07-29 23:02:30','2014-07-29 23:02:30'),
 (26,5,1919,2,12,'2014-07-29 23:02:39','2014-07-29 23:02:39'),
 (27,5,2926,2,13,'2014-07-29 23:02:53','2014-07-29 23:02:53'),
 (28,5,4358,2,14,'2014-07-29 23:03:05','2014-07-29 23:03:05');
UNLOCK TABLES;
/*!40000 ALTER TABLE `mediana_marcadores` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`medicos`
--


--
-- Definition of table `plagetri21`.`modulos`
--

DROP TABLE IF EXISTS `plagetri21`.`modulos`;
CREATE TABLE  `plagetri21`.`modulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`modulos`
--

/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
LOCK TABLES `modulos` WRITE;
INSERT INTO `plagetri21`.`modulos` VALUES  (1,'Citas de Tamizaje','datos.citas.index','citas.png'),
 (2,'Pacientes','datos.pacientes.index','woman.png'),
 (3,'Médicos','datos.medicos.index','medico.png'),
 (4,'Mediana de Marcadores','datos.mediana.index','marcadores.png'),
 (5,'Activos','datos.activos.index','activo.png'),
 (6,'Mantenimiento','datos.mantenimientos.index','mantenimiento.png'),
 (7,'Agenda Telefónica','datos.agenda.index','agenda.png'),
 (8,'Localizar','datos.pacientesmapas.index','mapa.png');
UNLOCK TABLES;
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`modulos_usuarios`
--

DROP TABLE IF EXISTS `plagetri21`.`modulos_usuarios`;
CREATE TABLE  `plagetri21`.`modulos_usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_modulo` int(10) unsigned NOT NULL,
  `id_grupo_usuario` int(10) unsigned NOT NULL,
  `created_at` varchar(45) NOT NULL DEFAULT 'aaaa-mm-dd',
  `updated_at` varchar(45) NOT NULL DEFAULT 'aaaa-mm-dd',
  `inactivo` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`modulos_usuarios`
--

/*!40000 ALTER TABLE `modulos_usuarios` DISABLE KEYS */;
LOCK TABLES `modulos_usuarios` WRITE;
INSERT INTO `plagetri21`.`modulos_usuarios` VALUES  (1,1,1,'aaaa-mm-dd','aaaa-mm-dd',0),
 (19,2,1,'2014-07-29 21:22:22','2014-07-30 18:56:50',0),
 (20,3,1,'2014-07-29 21:22:29','2014-07-29 21:23:36',0),
 (21,4,1,'2014-07-29 21:24:40','2014-07-29 21:28:48',0),
 (22,5,1,'2014-07-29 21:25:44','2014-07-30 18:56:50',0),
 (23,6,1,'2014-07-29 21:28:48','2014-07-29 21:28:48',0),
 (24,7,1,'2014-07-29 21:28:48','2014-07-30 19:14:01',0),
 (25,8,1,'2014-07-29 21:28:48','2014-08-08 19:51:40',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `modulos_usuarios` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`nacionalidades`
--


-- Definition of table `plagetri21`.`niveles`
--

DROP TABLE IF EXISTS `plagetri21`.`niveles`;
CREATE TABLE  `plagetri21`.`niveles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`niveles`
--

/*!40000 ALTER TABLE `niveles` DISABLE KEYS */;
LOCK TABLES `niveles` WRITE;
INSERT INTO `plagetri21`.`niveles` VALUES  (1,'PLANTA BAJA','',''),
 (2,'PRIMER PISO','','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `niveles` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`pacientes`
--


--
-- Definition of table `plagetri21`.`unidades_marcadores`
--

DROP TABLE IF EXISTS `plagetri21`.`unidades_marcadores`;
CREATE TABLE  `plagetri21`.`unidades_marcadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_marcador` int(10) NOT NULL,
  `id_unidad` int(10) NOT NULL,
  `id_usuario` int(45) DEFAULT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`unidades_marcadores`
--

/*!40000 ALTER TABLE `unidades_marcadores` DISABLE KEYS */;
LOCK TABLES `unidades_marcadores` WRITE;
INSERT INTO `plagetri21`.`unidades_marcadores` VALUES  (1,1,2,1,'2014-07-29 21:22:22',''),
 (2,2,1,4,'2014-08-13 14:02:51','2014-08-13 14:02:51'),
 (3,2,1,4,'2014-08-13 14:04:25','2014-08-13 14:04:25'),
 (4,3,1,4,'2014-08-13 14:04:42','2014-08-13 14:04:42'),
 (5,3,2,4,'2014-08-13 14:06:24','2014-08-13 14:06:24'),
 (6,3,2,4,'2014-08-13 14:19:54','2014-08-13 14:19:54'),
 (7,4,1,4,'2014-08-13 14:20:18','2014-08-13 14:20:18'),
 (8,5,1,4,'2014-08-13 14:20:21','2014-08-13 14:20:21'),
 (9,6,1,4,'2014-08-13 14:20:24','2014-08-13 14:20:24'),
 (10,7,1,4,'2014-08-13 14:20:27','2014-08-13 14:20:27'),
 (11,2,2,4,'2014-08-13 15:02:12','2014-08-13 15:02:12'),
 (12,4,2,4,'2014-08-13 15:02:18','2014-08-13 15:02:18'),
 (13,5,2,4,'2014-08-13 15:02:25','2014-08-13 15:02:25'),
 (14,6,2,4,'2014-08-13 15:04:07','2014-08-13 15:04:07'),
 (15,7,2,4,'2014-08-13 15:04:12','2014-08-13 15:04:12');
UNLOCK TABLES;
/*!40000 ALTER TABLE `unidades_marcadores` ENABLE KEYS */;


--
-- Definition of table `plagetri21`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
