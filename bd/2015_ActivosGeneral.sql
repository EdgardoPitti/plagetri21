-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.17


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

CREATE DATABASE /*!32312 IF NOT EXISTS*/ plagetri21;
USE plagetri21;

--
-- Table structure for table `plagetri21`.`activos`
--

DROP TABLE IF EXISTS `activos`;
CREATE TABLE `activos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `num_activo` varchar(45) NOT NULL DEFAULT '',
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `id_tipo` int(10) unsigned NOT NULL,
  `marca` varchar(45) NOT NULL,
  `id_nivel` int(10) unsigned NOT NULL,
  `id_ubicacion` int(10) unsigned NOT NULL,
  `fecha_compra` varchar(45) NOT NULL,
  `num_factura` varchar(45) NOT NULL,
  `costo` double NOT NULL,
  `id_proveedor` int(10) unsigned NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `id_tipo_fuente` int(10) unsigned NOT NULL DEFAULT '0',
  `id_estado` int(10) unsigned NOT NULL DEFAULT '0',
  `modelo` varchar(45) NOT NULL DEFAULT '',
  `serie` varchar(45) NOT NULL DEFAULT '',
  `voltaje` varchar(45) NOT NULL DEFAULT '',
  `consumo` varchar(45) NOT NULL DEFAULT '',
  `alimentacion` varchar(45) NOT NULL DEFAULT '',
  `protocolo` varchar(45) NOT NULL DEFAULT '',
  `id_fecha_mantenimiento` varchar(45) NOT NULL DEFAULT '',
  `fecha_garantia` varchar(45) NOT NULL DEFAULT '',
  `fecha_de_baja` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`activos`
--

/*!40000 ALTER TABLE `activos` DISABLE KEYS */;
INSERT INTO `activos` (`id`,`num_activo`,`nombre`,`descripcion`,`id_tipo`,`marca`,`id_nivel`,`id_ubicacion`,`fecha_compra`,`num_factura`,`costo`,`id_proveedor`,`created_at`,`updated_at`,`id_tipo_fuente`,`id_estado`,`modelo`,`serie`,`voltaje`,`consumo`,`alimentacion`,`protocolo`,`id_fecha_mantenimiento`,`fecha_garantia`,`fecha_de_baja`) VALUES 
 (1,'A-001','Cama','Excelente Cama',1,'LG',2,1,'2014-06-13','2231-44',100.05,2,'2014-06-13 22:00:32','2015-07-26 22:09:39',1,3,'','','','','','','2','2015-12-12','2015-07-10'),
 (2,'AAAAA_1','PC','Descripcion',2,'DELL',3,3,'2015-07-20','aa-111',110,1,'2015-07-20 14:57:47','2015-07-30 13:50:55',2,3,'ASPX1','1111','11.4v','1.4a','122a','Protocolo','0','2015-09-03','2015-07-12');
/*!40000 ALTER TABLE `activos` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`fechas_mantenimientos`
--

DROP TABLE IF EXISTS `fechas_mantenimientos`;
CREATE TABLE `fechas_mantenimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_mantenimiento` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`fechas_mantenimientos`
--

/*!40000 ALTER TABLE `fechas_mantenimientos` DISABLE KEYS */;
INSERT INTO `fechas_mantenimientos` (`id`,`fecha_mantenimiento`) VALUES 
 (1,'NO DEFINIDO'),
 (2,'7 DÍAS'),
 (3,'15 DÁS'),
 (4,'MENSUALES'),
 (5,'TRIMESTRALES'),
 (6,'SEMESTRALES'),
 (7,'ANUALES');
/*!40000 ALTER TABLE `fechas_mantenimientos` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`mantenimientos`
--

DROP TABLE IF EXISTS `mantenimientos`;
CREATE TABLE `mantenimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_realizacion` varchar(45) NOT NULL,
  `realizado_por` varchar(45) NOT NULL,
  `aprobado_por` varchar(45) NOT NULL,
  `id_activo` int(10) unsigned NOT NULL,
  `proximo_mant` varchar(45) NOT NULL,
  `observacion` text NOT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `costo_mantenimiento` varchar(45) DEFAULT NULL,
  `id_tipo_mantenimiento` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`mantenimientos`
--

/*!40000 ALTER TABLE `mantenimientos` DISABLE KEYS */;
INSERT INTO `mantenimientos` (`id`,`fecha_realizacion`,`realizado_por`,`aprobado_por`,`id_activo`,`proximo_mant`,`observacion`,`created_at`,`updated_at`,`costo_mantenimiento`,`id_tipo_mantenimiento`) VALUES 
 (1,'2015-07-09','as','as',1,'2015-07-16','as','2015-07-21 14:04:05','2015-08-06 14:56:48','150',1),
 (2,'2015-07-15','Luis','',1,'2015-07-30','','2015-07-28 14:06:22','2015-07-28 14:06:22','110',2),
 (3,'2015-07-23','Luis','as',2,'2015-07-31','','2015-07-30 13:51:37','2015-07-30 13:51:37','100',1),
 (4,'2015-07-30','Luis','as',2,'2015-08-09','','2015-07-30 14:06:10','2015-07-30 14:06:10','233',2),
 (7,'2015-08-05','Luis','as',2,'2015-08-20','','2015-08-05 13:22:22','2015-08-05 13:22:22','444',2);
/*!40000 ALTER TABLE `mantenimientos` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`niveles`
--

DROP TABLE IF EXISTS `niveles`;
CREATE TABLE `niveles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`niveles`
--

/*!40000 ALTER TABLE `niveles` DISABLE KEYS */;
INSERT INTO `niveles` (`id`,`nivel`,`created_at`,`updated_at`) VALUES 
 (1,'NO DEFINIDO','',''),
 (2,'PLANTA BAJA','',''),
 (3,'PRIMER PISO','','');
/*!40000 ALTER TABLE `niveles` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`tipos_activos`
--

DROP TABLE IF EXISTS `tipos_activos`;
CREATE TABLE `tipos_activos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`tipos_activos`
--

/*!40000 ALTER TABLE `tipos_activos` DISABLE KEYS */;
INSERT INTO `tipos_activos` (`id`,`tipo`,`descripcion`) VALUES 
 (1,'NO DEFINIDO','NO DEFINIDO'),
 (2,'CAMA','CAMA'),
 (3,'MUEBLE','MUEBLE');
/*!40000 ALTER TABLE `tipos_activos` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`tipos_estados`
--

DROP TABLE IF EXISTS `tipos_estados`;
CREATE TABLE `tipos_estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_estado` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`tipos_estados`
--

/*!40000 ALTER TABLE `tipos_estados` DISABLE KEYS */;
INSERT INTO `tipos_estados` (`id`,`tipo_estado`) VALUES 
 (1,'NUEVO'),
 (2,'REEMPLAZADO'),
 (3,'DESCARTADO');
/*!40000 ALTER TABLE `tipos_estados` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`tipos_fuentes`
--

DROP TABLE IF EXISTS `tipos_fuentes`;
CREATE TABLE `tipos_fuentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_fuente` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`tipos_fuentes`
--

/*!40000 ALTER TABLE `tipos_fuentes` DISABLE KEYS */;
INSERT INTO `tipos_fuentes` (`id`,`tipo_fuente`) VALUES 
 (1,'NO DEFINIDO'),
 (2,'HIDRÁULICO'),
 (3,'VAPOR'),
 (4,'NEUMÁTICO'),
 (5,'ELÉCTRICO'),
 (6,'MECÁNICO');
/*!40000 ALTER TABLE `tipos_fuentes` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`tipos_mantenimientos`
--

DROP TABLE IF EXISTS `tipos_mantenimientos`;
CREATE TABLE `tipos_mantenimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_mantenimiento` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`tipos_mantenimientos`
--

/*!40000 ALTER TABLE `tipos_mantenimientos` DISABLE KEYS */;
INSERT INTO `tipos_mantenimientos` (`id`,`tipo_mantenimiento`) VALUES 
 (1,'PREVENTIVO'),
 (2,'CORRECTIVO');
/*!40000 ALTER TABLE `tipos_mantenimientos` ENABLE KEYS */;


--
-- Table structure for table `plagetri21`.`ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE `ubicacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plagetri21`.`ubicacion`
--

/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` (`id`,`ubicacion`,`created_at`,`updated_at`) VALUES 
 (1,'NO DEFINIDO','',''),
 (2,'TORRE A','',''),
 (3,'TORRE B','','');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;


--
-- View structure for view `plagetri21`.`activos_fallas`
--

DROP VIEW IF EXISTS `activos_fallas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activos_fallas` AS select `mantenimientos`.`id` AS `id`,`mantenimientos`.`fecha_realizacion` AS `fecha_realizacion`,`mantenimientos`.`realizado_por` AS `realizado_por`,`mantenimientos`.`aprobado_por` AS `aprobado_por`,`mantenimientos`.`id_activo` AS `id_activo`,`mantenimientos`.`proximo_mant` AS `proximo_mant`,`mantenimientos`.`observacion` AS `observacion`,`mantenimientos`.`created_at` AS `created_at`,`mantenimientos`.`updated_at` AS `updated_at`,`mantenimientos`.`costo_mantenimiento` AS `costo_mantenimiento`,`mantenimientos`.`id_tipo_mantenimiento` AS `id_tipo_mantenimiento`,count(`mantenimientos`.`id`) AS `cantidad` from `mantenimientos` where (`mantenimientos`.`id_tipo_mantenimiento` = 2) group by `mantenimientos`.`id_activo` order by `cantidad` desc;


--
-- View structure for view `plagetri21`.`buscar_activos`
--

DROP VIEW IF EXISTS `buscar_activos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `buscar_activos` AS select `a`.`id` AS `id`,`a`.`num_activo` AS `num_activo`,`a`.`nombre` AS `nombre`,`t`.`tipo` AS `tipo`,`n`.`nivel` AS `nivel`,`u`.`ubicacion` AS `ubicacion`,`a`.`costo` AS `costo` from (((`activos` `a` join `tipos_activos` `t`) join `ubicacion` `u`) join `niveles` `n`) where ((`t`.`id` = `a`.`id_tipo`) and (`u`.`id` = `a`.`id_ubicacion`) and (`n`.`id` = `a`.`id_nivel`));


--
-- View structure for view `plagetri21`.`mantenimiento_correctivo`
--

DROP VIEW IF EXISTS `mantenimiento_correctivo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mantenimiento_correctivo` AS select `m`.`fecha_realizacion` AS `fecha_realizacion`,`a`.`num_activo` AS `num_activo`,`a`.`nombre` AS `nombre`,`a`.`marca` AS `marca`,`a`.`modelo` AS `modelo`,`a`.`serie` AS `serie`,`m`.`realizado_por` AS `realizado_por`,`m`.`aprobado_por` AS `aprobado_por`,`m`.`costo_mantenimiento` AS `costo_mantenimiento` from (`mantenimientos` `m` join `activos` `a`) where ((`m`.`id_tipo_mantenimiento` = 2) and (`a`.`id` = `m`.`id_activo`)) order by `m`.`costo_mantenimiento` desc;


--
-- View structure for view `plagetri21`.`mantenimiento_preventivo`
--

DROP VIEW IF EXISTS `mantenimiento_preventivo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mantenimiento_preventivo` AS select `m`.`fecha_realizacion` AS `fecha_realizacion`,`a`.`num_activo` AS `num_activo`,`a`.`nombre` AS `nombre`,`a`.`marca` AS `marca`,`a`.`modelo` AS `modelo`,`a`.`serie` AS `serie`,`m`.`realizado_por` AS `realizado_por`,`m`.`aprobado_por` AS `aprobado_por`,`m`.`costo_mantenimiento` AS `costo_mantenimiento` from (`mantenimientos` `m` join `activos` `a`) where ((`m`.`id_tipo_mantenimiento` = 1) and (`a`.`id` = `m`.`id_activo`)) order by `m`.`costo_mantenimiento` desc;


--
-- View structure for view `plagetri21`.`obtener_activos`
--

DROP VIEW IF EXISTS `obtener_activos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `obtener_activos` AS select `a`.`id` AS `id`,`a`.`num_activo` AS `num_activo`,`a`.`nombre` AS `nombre`,`t`.`tipo` AS `tipo`,`n`.`nivel` AS `nivel`,`u`.`ubicacion` AS `ubicacion`,`a`.`costo` AS `costo` from (((`activos` `a` join `tipos_activos` `t`) join `ubicacion` `u`) join `niveles` `n`) where ((`t`.`id` = `a`.`id_tipo`) and (`u`.`id` = `a`.`id_ubicacion`) and (`n`.`id` = `a`.`id_nivel`) and (`a`.`id` > 0));

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
