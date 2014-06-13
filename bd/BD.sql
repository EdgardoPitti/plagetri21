-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.12-log


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
-- Definition of table `activos`
--

DROP TABLE IF EXISTS `activos`;
CREATE TABLE `activos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activos`
--

/*!40000 ALTER TABLE `activos` DISABLE KEYS */;
INSERT INTO `activos` (`id`,`codigo`,`nombre`,`descripcion`,`id_tipo`,`marca`,`id_nivel`,`id_ubicacion`,`fecha_compra`,`num_factura`,`costo`,`id_proveedor`,`created_at`,`updated_at`) VALUES 
 (1,'A-001','Cama','Excelente Cama',1,'LG',2,1,'2014-06-13','2231-44',100.05,2,'2014-06-13 22:00:32','2014-06-13 22:04:24');
/*!40000 ALTER TABLE `activos` ENABLE KEYS */;


--
-- Definition of table `agendas`
--

DROP TABLE IF EXISTS `agendas`;
CREATE TABLE `agendas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(90) NOT NULL,
  `profesion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `ruc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agendas`
--

/*!40000 ALTER TABLE `agendas` DISABLE KEYS */;
INSERT INTO `agendas` (`id`,`nombre_completo`,`profesion`,`telefono`,`celular`,`extension`,`created_at`,`updated_at`,`correo`,`ruc`) VALUES 
 (1,'Luis Mendoza','Agricultor','7723911','67231122','276','2014-06-11 19:45:51','2014-06-13 20:57:24','luis.mendoza1@utp.ac.pa','222'),
 (2,'Edgardo Pitti','Gigolo','7743095','62510254','507','2014-06-13 22:04:07','2014-06-13 22:04:07','edgardo.pitti2@utp.ac.pa','1254-778-7777');
/*!40000 ALTER TABLE `agendas` ENABLE KEYS */;


--
-- Definition of table `citas_medicas`
--

DROP TABLE IF EXISTS `citas_medicas`;
CREATE TABLE `citas_medicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente` int(10) unsigned NOT NULL DEFAULT '0',
  `id_medico` int(10) unsigned NOT NULL DEFAULT '0',
  `peso` double NOT NULL DEFAULT '0',
  `fecha_ultrasonido` varchar(45) NOT NULL DEFAULT '',
  `fur` varchar(45) NOT NULL DEFAULT '',
  `fpp` varchar(45) NOT NULL DEFAULT '',
  `fecha` varchar(45) NOT NULL,
  `edad_gestacional` int(10) unsigned NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `observaciones` text,
  `estatura` double NOT NULL DEFAULT '0',
  `id_institucion` int(10) unsigned NOT NULL DEFAULT '0',
  `hijos_embarazo` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_citas_medicas_paciente` (`id_paciente`),
  KEY `FK_citas_medicas_medico` (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citas_medicas`
--

/*!40000 ALTER TABLE `citas_medicas` DISABLE KEYS */;
INSERT INTO `citas_medicas` (`id`,`id_paciente`,`id_medico`,`peso`,`fecha_ultrasonido`,`fur`,`fpp`,`fecha`,`edad_gestacional`,`created_at`,`updated_at`,`observaciones`,`estatura`,`id_institucion`,`hijos_embarazo`) VALUES 
 (1,1,3,45,'2014-06-04','2014-06-04','2014-06-04','2014-06-04',22,'2014-06-04 18:46:56','2014-06-10 19:46:16','Observaciones',1.65,406011303,2);
/*!40000 ALTER TABLE `citas_medicas` ENABLE KEYS */;


--
-- Definition of table `coeficientes`
--

DROP TABLE IF EXISTS `coeficientes`;
CREATE TABLE `coeficientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_raza` int(10) unsigned NOT NULL,
  `id_marcador` int(10) unsigned NOT NULL,
  `a` double NOT NULL,
  `b` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coeficientes`
--

/*!40000 ALTER TABLE `coeficientes` DISABLE KEYS */;
INSERT INTO `coeficientes` (`id`,`id_raza`,`id_marcador`,`a`,`b`) VALUES 
 (1,1,1,0.00173,0.2583),
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
/*!40000 ALTER TABLE `coeficientes` ENABLE KEYS */;


--
-- Definition of table `corregimientos`
--

DROP TABLE IF EXISTS `corregimientos`;
CREATE TABLE `corregimientos` (
  `id_provincia` int(11) NOT NULL DEFAULT '0',
  `id_distrito` int(11) NOT NULL DEFAULT '0',
  `id_corregimiento` int(11) NOT NULL DEFAULT '0',
  `corregimiento` varchar(130) NOT NULL DEFAULT 'POR DEFINIR',
  `latitud` varchar(45) NOT NULL DEFAULT '',
  `longitud` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_provincia`,`id_distrito`,`id_corregimiento`),
  KEY `ID_PROVINCIA` (`id_provincia`) USING BTREE,
  KEY `ID_DISTRITO` (`id_distrito`) USING BTREE,
  CONSTRAINT `corregimientos_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `corregimientos_ibfk_2` FOREIGN KEY (`id_distrito`) REFERENCES `distritos` (`id_distrito`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corregimientos`
--

/*!40000 ALTER TABLE `corregimientos` DISABLE KEYS */;
INSERT INTO `corregimientos` (`id_provincia`,`id_distrito`,`id_corregimiento`,`corregimiento`,`latitud`,`longitud`) VALUES 
 (1,1,1,'BOCAS DEL TORO','9.33333','-82.25000'),
 (1,1,2,'BASTIMENTOS','9.35000','-82.20000'),
 (1,1,3,'CAUCHERO','9.15000','-82.26667'),
 (1,1,4,'PUNTA LAUREL','9.13333','-82.13333'),
 (1,1,5,'TIERRA OSCURA','9.18333','-82.28333'),
 (1,2,6,'CHANGUINOLA','9.45363','-82.50869'),
 (1,2,7,'ALMIRANTE','9.30000','-82.40000'),
 (1,2,8,'GUABITO','8.85000','-82.18333'),
 (1,2,9,'EL TERIBE','9.36667','-82.53333'),
 (1,2,10,'VALLE DEL RISCO','9.24136','-82.44082'),
 (1,2,11,'EL EMPALME','9.41667','-82.51667'),
 (1,2,12,'LAS TABLAS','9.54374','-82.74010'),
 (1,2,13,'VALLE DE AGUA','9.25000','-82.38333'),
 (1,2,14,'NANCE DE RISCO','9.23237','-82.42823'),
 (1,2,15,'LAS DELICIAS','9.60889','-82.84861'),
 (1,2,16,'COCHIGRO','9.33588','-82.25451'),
 (1,2,17,'LA GLORIA','8.98333','-82.23333'),
 (1,3,18,'CHIRIQUI GRANDE','8.95000','-82.11667'),
 (1,3,19,'BAJO CEDRO','9.10012','-82.28309'),
 (1,3,20,'MIRAMAR','9.00000','-82.25000'),
 (1,3,21,'PUNTA PEÑA','8.90042','-82.18471'),
 (1,3,22,'PUNTA ROBALO','9.03333','-82.25000'),
 (1,3,23,'RAMBALA','8.94663','-82.17586'),
 (2,4,24,'ALANJE','8.40000','-82.55000'),
 (2,4,25,'DIVALA','8.41667','-82.71667'),
 (2,4,26,'EL TEJAR','8.43333','-82.56667'),
 (2,4,27,'GUARUMAL','8.35000','-82.53333'),
 (2,4,28,'PALO GRANDE','8.33333','-82.60000'),
 (2,4,29,'QUEREVALO','8.36667','-82.51667'),
 (2,4,30,'SANTO TOMÁS','8.38333','-82.65000'),
 (2,4,31,'CANTA GALLO','8.36667','-82.61667'),
 (2,4,32,'NUEVO MÉXICO','8.58490','-82.38858'),
 (2,5,33,'PUERTO ARMUELLES','8.28333','-82.86667'),
 (2,5,34,'LIMONES','8.10000','-82.86667'),
 (2,5,35,'PROGRESO','8.45000','-82.83333'),
 (2,5,36,'BACO','8.08333','-82.86667'),
 (2,5,37,'RODOLFO AGUILAR DELGADO','8.39131','-82.86717'),
 (2,6,38,'BOQUERON','8.50000','-82.56667'),
 (2,6,39,'BÁGALA','8.46667','-82.53333'),
 (2,6,40,'CORDILLERA','8.50624','-82.57121'),
 (2,6,41,'GUABAL','8.58333','-82.53333'),
 (2,6,42,'GUAYABAL','8.33333','-82.03333'),
 (2,6,43,'PARAISO','8.50624','-82.57121'),
 (2,6,44,'PEDREGAL','8.37791','-82.42612'),
 (2,6,45,'TIJERAS','8.47005','-82.55600'),
 (2,7,46,'BAJO BOQUETE','8.76854','-82.46272'),
 (2,7,47,'CALDERA','8.70762','-82.31295'),
 (2,7,48,'PALMIRA (CENTRO)','8.69688','-82.45126'),
 (2,7,49,'ALTO BOQUETE','8.68334','-82.41936'),
 (2,7,50,'JARAMILLO (CENTRO)','8.78814','-82.43869'),
 (2,7,51,'LOS NARANJOS','8.83756','-82.45928'),
 (2,8,52,'LA CONCEPCIÓN','8.49828','-82.61606'),
 (2,8,53,'ASERRIO DE GARICHÉ','8.48604','-82.77937'),
 (2,8,54,'BUGABA','8.48333','-82.61667'),
 (2,8,55,'CERRO PUNTA','8.85000','-82.56667'),
 (2,8,56,'GÓMEZ','8.56572','-82.73876'),
 (2,8,57,'LA ESTRELLA','8.50493','-82.66180'),
 (2,8,58,'SAN ANDRÉS','8.60000','-82.73333'),
 (2,8,59,'SANTA MARTA','8.50190','-82.69781'),
 (2,8,60,'SANTA ROSA','8.60000','-82.68333'),
 (2,8,61,'SANTO DOMINGO','8.48120','-82.74025'),
 (2,8,62,'SORTOVÁ','8.50494','-82.61545'),
 (2,8,63,'VOLCÁN','8.68867','-82.62658'),
 (2,8,64,'EL BONGO','8.57290','-82.61754'),
 (2,8,65,'SOLANO','8.51692','-82.61078'),
 (2,9,66,'DAVID','8.39898','-82.42564'),
 (2,9,67,'BIJAGUAL','8.49720','-82.32557'),
 (2,9,68,'COCHEA','8.59723','-82.42376'),
 (2,9,69,'CHIRIQUÍ','8.27570','-82.85909'),
 (2,9,70,'GUACÁ','8.53395','-82.48153'),
 (2,9,71,'LAS LOMAS','8.44251','82.36413'),
 (2,9,72,'PEDREGAL','8.37785','-82.42677'),
 (2,9,73,'SAN CARLOS','8.52833','82.50738'),
 (2,9,74,'SAN PABLO NUEVO','8.39011','-82.48562'),
 (2,9,75,'SAN PABLO VIEJO','8.45560','-82.48891'),
 (2,10,76,'DOLEGA','8.56387','-82.41677'),
 (2,10,77,'DOS RÍOS','8.53179','-82.38561'),
 (2,10,78,'LOS ANASTACIOS','8.53622','-82.42214'),
 (2,10,79,'POTRERILLOS','8.67512','-82.48981'),
 (2,10,80,'POTRERILLOS ABAJO','8.64920','-82.48573'),
 (2,10,81,'ROVIRA','8.64507','-82.50080'),
 (2,10,82,'TINAJAS','8.55727','-82.46595'),
 (2,10,83,'LOS ALGARROBOS','8.51311','-82.42520'),
 (2,11,84,'GUALACA','8.53416','-82.29781'),
 (2,11,85,'HORNITO','8.64852','-82.17344'),
 (2,11,86,'LOS ÁNGELES','8.52126','-82.20472'),
 (2,11,87,'PAJA DE SOMBRERO','8.67729','-82.27626'),
 (2,11,88,'RINCÓN','8.46515','-82.26980'),
 (2,12,89,'REMEDIOS','8.22193','-81.77105'),
 (2,12,90,'EL NANCITO','8.23333','-81.74828'),
 (2,12,91,'EL PORVENIR','8.23489','-81.83068'),
 (2,12,92,'EL PUERTO','8.21662','-81.81359'),
 (2,12,93,'SANTA LUCÍA','8.2501','-81.82252'),
 (2,13,94,'RIO SERENO','8.81896','-82.85622'),
 (2,13,95,'BREÑON','8.63333','-82.81666'),
 (2,13,96,'CAÑAS GORDAS','8.74730','-82.90750'),
 (2,13,97,'MONTE LIRIO','8.79194','-82.82386'),
 (2,13,98,'PLAZA DE CAISAN','8.74088','-82.81373'),
 (2,13,99,'SANTA CRUZ','8.63624','-82.77588'),
 (2,13,100,'DOMINICAL','8.67411','-82.80180'),
 (2,13,101,'SANTA CLARA','8.83791','-82.77494'),
 (2,14,102,'LAS LAJAS','8.20793','-81.86871'),
 (2,14,103,'JUAY','8.28271','-81.95685'),
 (2,14,104,'SAN FELIX','8.25859','-81.91146'),
 (2,14,105,'LAJAS ADENTRO','8.24013','-81.93506'),
 (2,14,106,'SANTA CRUZ','8.24304','-81.92084'),
 (2,15,107,'HORCONCITOS','8.31116','-82.15567'),
 (2,15,108,'BOCA CHICA','8.22113','-82.21908'),
 (2,15,109,'BOCA DEL MONTE','8.35133','-82.10954'),
 (2,15,110,'SAN JUAN','8.27494','-81.99079'),
 (2,15,111,'SAN LORENZO','8.31131','-82.13278'),
 (2,16,112,'TOLÉ','8.22380','-81.69167'),
 (2,16,113,'CERRO VIEJO','8.25137','-81.57168'),
 (2,16,114,'LAJAS DE TOLÉ','8.16862','-81.67099'),
 (2,16,115,'POTRERO DE CAÑA','8.30659','-81.69801'),
 (2,16,116,'QUEBRADA DE PIEDRA','8.07830','-81.67901'),
 (2,16,117,'BELLA VISTA','8.21236','-81.62595'),
 (2,16,118,'EL CRISTO','8.33370','-81.59967'),
 (2,16,119,'JUSTO FIDEL PALACIOS','8.29547','-81.58871'),
 (2,16,120,'VELADERO','8.23330','-81.65283'),
 (3,17,121,'AGUADULCE','8.22021','-80.54581'),
 (3,17,122,'EL CRISTO','8.43071','-80.68148'),
 (3,17,123,'EL ROBLE','8.16612','-80.62625'),
 (3,17,124,'POCRÍ','8.25950','-80.56156'),
 (3,17,125,'BARRIOS UNIDOS','8.19963','-80.52077'),
 (3,18,126,'ANTÓN','8.39888','-80.26924'),
 (3,18,127,'CABUYA','8.55000','-80.16667'),
 (3,18,128,'EL CHIRU','8.40470','-80.18788'),
 (3,18,129,'EL RETIRO','8.47635','-80.15603'),
 (3,18,130,'EL VALLE','8.60401','-80.12719'),
 (3,18,131,'JUAN DÍAZ','8.46142','-80.28458'),
 (3,18,132,'RÍO HATO','8.39472','-80.16294'),
 (3,18,133,'SAN JUAN DE DIOS','8.46868','-80.28380'),
 (3,18,134,'SANTA RITA','7.95877','-80.42285'),
 (3,18,135,'CABALLERO','8.54790','-80.18947'),
 (3,19,136,'LA PINTADA','8.59439','-80.44588'),
 (3,19,137,'EL HARINO','8.56713','-80.17323'),
 (3,19,138,'EL POTRERO','8.57387','-80.32178'),
 (3,19,139,'LLANO GRANDE','8.63379','-80.44020'),
 (3,19,140,'PIEDRAS GORDAS','8.63025','-80.51860'),
 (3,19,141,'LAS LOMAS','8.49999','-80.38334'),
 (3,20,142,'NATÁ','8.33602','-80.52111'),
 (3,20,143,'CAPELLANIA','8.30095','-80.55448'),
 (3,20,144,'EL CAÑO','8.40962','-80.52652'),
 (3,20,145,'GUZMAN','8.50984','-80.58453'),
 (3,20,146,'LAS HUACAS','8.46844','-80.75150'),
 (3,20,147,'TOZA','8.34644','-80.64221'),
 (3,21,148,'OLÁ','8.42271','-80.64817'),
 (3,21,149,'EL COPÉ','8.62119','-80.58518'),
 (3,21,150,'EL PALMAR','8.65317','-80.39713'),
 (3,21,151,'EL PICACHO','8.63333','-80.05000'),
 (3,21,152,'LA PAVA','8.43333','-80.61666'),
 (3,22,153,'PENONOMÉ','8.51279','-80.35756'),
 (3,22,154,'CAÑAVERAL','8.52141','-80.42690'),
 (3,22,155,'COCLÉ','8.45921','-80.42129'),
 (3,22,156,'CHIGUIRÍ ARRIBA','8.67443','-80.18798'),
 (3,22,157,'EL COCO','8.40167','-80.35301'),
 (3,22,158,'PAJONAL','8.59442','-80.25511'),
 (3,22,159,'RIO GRANDE','8.42737','-80.48564'),
 (3,22,160,'RIO INDIO','9.04038','-80.18729'),
 (3,22,161,'TOABRE','8.65023','-80.32239'),
 (3,22,162,'TULU','8.76649','-80.40000'),
 (3,22,163,'EL VALLE DE SAN MIGUEL','',''),
 (4,23,164,'BARRIO NORTE','',''),
 (4,23,165,'BARRIO SUR','',''),
 (4,23,166,'BUENA VISTA','',''),
 (4,23,167,'CATIVA','',''),
 (4,23,168,'CIRICITO','',''),
 (4,23,169,'SABANITAS','',''),
 (4,23,170,'SALAMANCA','',''),
 (4,23,171,'LIMÓN','',''),
 (4,23,172,'NUEVA PROVIDENCIA','',''),
 (4,23,173,'PUERTO PILÓN','',''),
 (4,23,174,'CRISTÓBAL','',''),
 (4,23,175,'ESCOBAL','',''),
 (4,23,176,'SAN JUAN','',''),
 (4,23,177,'SANTA ROSA','',''),
 (4,24,178,'NUEVO CHAGRES','',''),
 (4,24,179,'ACHIOTE','',''),
 (4,24,180,'EL GUABO','',''),
 (4,24,181,'LA ENCANTADA','',''),
 (4,24,182,'PALMAS BELLAS','',''),
 (4,24,183,'PIÑA','',''),
 (4,24,184,'SALUD','',''),
 (4,25,185,'MIGUEL DE LA BORDA','',''),
 (4,25,186,'COCLÉ DEL NORTE','',''),
 (4,25,187,'EL GUASIMO','',''),
 (4,25,188,'GOBEA','',''),
 (4,25,189,'RÍO ÍNDIO','',''),
 (4,25,190,'SAN JOSÉ DEL GENERAL','',''),
 (4,26,191,'PORTOBÉLO','',''),
 (4,26,192,'CACIQUE','',''),
 (4,26,193,'GARROTE','',''),
 (4,26,194,'ISLA GRANDE','',''),
 (4,26,195,'MARÍA CHIQUITA','',''),
 (4,27,196,'PALENQUE','',''),
 (4,27,197,'CUANGO','',''),
 (4,27,198,'MIRAMAR','',''),
 (4,27,199,'NOMBRE DE DIOS','',''),
 (4,27,200,'PALMIRA','',''),
 (4,27,201,'PLAYA CHIQUITA','',''),
 (4,27,202,'SANTA ISABEL','',''),
 (4,27,203,'VIENTO FRIO','',''),
 (5,28,204,'LA PALMA','',''),
 (5,28,205,'CAMOGANTI','',''),
 (5,28,206,'CHEPIGANA','',''),
 (5,28,207,'GARACHINE','',''),
 (5,28,208,'JAQUÉ','',''),
 (5,28,209,'PUERTO PIÑA','',''),
 (5,28,210,'RIO CONGO','',''),
 (5,28,211,'RIO IGLESIAS','',''),
 (5,28,212,'SAMBÚ','',''),
 (5,28,213,'SETEGANTÍ','',''),
 (5,28,214,'TAIMATÍ','',''),
 (5,28,215,'TUCUTÍ','',''),
 (5,28,216,'AGUA FRÍA','',''),
 (5,28,217,'CUCUNATI','',''),
 (5,28,218,'RÍO CONGO ARRIBA','',''),
 (5,28,219,'SANTA FÉ','',''),
 (5,29,220,'EL REAL DE SANTA MARÍA','',''),
 (5,29,221,'BOCA DE CUPÉ','',''),
 (5,29,222,'PAYA','',''),
 (5,29,223,'PUCURO','',''),
 (5,29,224,'YAPE','',''),
 (5,29,225,'YAVIZA','',''),
 (5,29,226,'METETI','',''),
 (5,29,227,'WARGANDÍ','',''),
 (6,30,228,'CHITRÉ','',''),
 (6,30,229,'LA ARENA','',''),
 (6,30,230,'LLANO BONITO','',''),
 (6,30,231,'SAN JUAN BAUTISTA','',''),
 (6,30,642,'MONAGRILLO','',''),
 (6,31,232,'LAS MINAS','',''),
 (6,31,233,'CHEPO','',''),
 (6,31,234,'CHUMICAL','',''),
 (6,31,235,'EL TORO','',''),
 (6,31,236,'LEONES','',''),
 (6,31,237,'QUEBRADA DEL ROSARIO','',''),
 (6,31,238,'QUEBRADA EL CIPRÍAN','',''),
 (6,32,239,'LOS POZOS','',''),
 (6,32,240,'EL CAPURI','',''),
 (6,32,241,'EL CALABACITO','',''),
 (6,32,242,'EL CEDRO','',''),
 (6,32,243,'LA ARENA','',''),
 (6,32,244,'LA PITALOZA','',''),
 (6,32,245,'LOS CERRITOS','',''),
 (6,32,246,'LOS CERROS DE PAJA','',''),
 (6,32,247,'LAS LLANAS','',''),
 (6,33,248,'OCÚ','',''),
 (6,33,249,'CERRO LARGO','',''),
 (6,33,250,'LOS LLANOS','',''),
 (6,33,251,'LLANO GRANDE','',''),
 (6,33,252,'PEÑAS CHATAS','',''),
 (6,33,253,'EL TIJERA','',''),
 (6,33,254,'MENCHACA','',''),
 (6,33,255,'ENTRADERO DEL CASTILLO','',''),
 (6,34,256,'PARITA','',''),
 (6,34,257,'CABUYA','',''),
 (6,34,258,'LOS CASTILLOS','',''),
 (6,34,259,'LLANO DE LA CRUZ','',''),
 (6,34,260,'PARIS','',''),
 (6,34,261,'PORTOBELILLO','',''),
 (6,34,262,'PORTUGA','',''),
 (6,35,263,'PESÉ','',''),
 (6,35,264,'LAS CABRAS','',''),
 (6,35,265,'LOS PÁJAROS','',''),
 (6,35,266,'EL BARRERO','',''),
 (6,35,267,'EL PEDREGOSO','',''),
 (6,35,268,'EL CIRUELO','',''),
 (6,35,269,'SABANAGRANDE','',''),
 (6,35,270,'RINCÓN HONDO','',''),
 (6,36,271,'SANTA MARÍA','',''),
 (6,36,272,'CHUPAMPA','',''),
 (6,36,273,'EL RINCÓN','',''),
 (6,36,274,'EL LIMÓN','',''),
 (6,36,275,'LOS CANELOS','',''),
 (7,37,276,'GUARARÉ','',''),
 (7,37,277,'EL ESPINAL','',''),
 (7,37,278,'EL MACANO','',''),
 (7,37,279,'GUARARÉ ARRIBA','',''),
 (7,37,280,'LA ENEA','',''),
 (7,37,281,'LA PASERA','',''),
 (7,37,282,'LAS TRANCAS','',''),
 (7,37,283,'LLANO ABAJO','',''),
 (7,37,284,'EL HATO','',''),
 (7,37,285,'PERALES','',''),
 (7,38,286,'LAS TABLAS','',''),
 (7,38,287,'BAJO CORAL','',''),
 (7,38,288,'BAYANO','',''),
 (7,38,289,'EL CARATE','',''),
 (7,38,290,'EL COCAL','',''),
 (7,38,291,'EL MANANTIAL','',''),
 (7,38,292,'EL MUÑOZ','',''),
 (7,38,293,'EL PEDREGOSO','',''),
 (7,38,294,'LA LAJA','',''),
 (7,38,295,'LA MIEL','',''),
 (7,38,296,'LA PALMA','',''),
 (7,38,297,'LA TIZA','',''),
 (7,38,298,'LAS PALMITAS','',''),
 (7,38,299,'LAS TABLAS ABAJO','',''),
 (7,38,300,'NUARIO','',''),
 (7,38,301,'PALMIRA','',''),
 (7,38,302,'PEÑA BLANCA','',''),
 (7,38,303,'RIO HONDO','',''),
 (7,38,304,'SAN JOSÉ','',''),
 (7,38,305,'SAN MIGUEL','',''),
 (7,38,306,'SANTO DOMINGO','',''),
 (7,38,307,'EL SESTEADERO','',''),
 (7,38,308,'VALLE RICO','',''),
 (7,38,309,'VALLERRIQUITO','',''),
 (7,39,310,'LA VILLA DE LOS SANTOS','',''),
 (7,39,311,'EL EJIDO','',''),
 (7,39,312,'EL GUASIMO','',''),
 (7,39,313,'LA COLOROADA','',''),
 (7,39,314,'LA ESPIGADILA','',''),
 (7,39,315,'LAS CRUCES','',''),
 (7,39,316,'LAS GUABAS','',''),
 (7,39,317,'LOS ÁNGELES','',''),
 (7,39,318,'LOS OLIVOS','',''),
 (7,39,319,'LLANO LARGO','',''),
 (7,39,320,'SABANAGRANDE','',''),
 (7,39,321,'SAN AGUSTÍN','',''),
 (7,39,322,'SANTA ANA','',''),
 (7,39,323,'TRES QUEBRADAS','',''),
 (7,39,324,'VILLA LOURDES','',''),
 (7,39,325,'AGUA BUENA','',''),
 (7,40,326,'MACARACAS','',''),
 (7,40,327,'BAHIA HONDA','',''),
 (7,40,328,'BAJO DE GÜERA','',''),
 (7,40,329,'COROZAL','',''),
 (7,40,330,'CHUPA','',''),
 (7,40,331,'EL CEDRO','',''),
 (7,40,332,'ESPINO AMARILLO','',''),
 (7,40,333,'LA MESA','',''),
 (7,40,334,'LLANO DE PIEDRAS','',''),
 (7,40,335,'LAS PALMAS','',''),
 (7,40,336,'MOGOLLÓN','',''),
 (7,41,337,'PEDASÍ','',''),
 (7,41,338,'LOS ASIENTOS','',''),
 (7,41,339,'MARIABE','',''),
 (7,41,340,'PURIO','',''),
 (7,41,341,'ORIA ARRIBA','',''),
 (7,42,342,'POCRÍ','',''),
 (7,42,343,'EL CAÑAFISTULO','',''),
 (7,42,344,'LAJAMINA','',''),
 (7,42,345,'PARAISO','',''),
 (7,42,346,'PARITILLA','',''),
 (7,43,347,'TONOSÍ','',''),
 (7,43,348,'ALTOS DE GÜERA','',''),
 (7,43,349,'CAÑAS','',''),
 (7,43,350,'EL BEBEDERO','',''),
 (7,43,351,'EL CACAO','',''),
 (7,43,352,'EL CORTEZO','',''),
 (7,43,353,'FLORES','',''),
 (7,43,354,'GUANICO','',''),
 (7,43,355,'LA TRONOSA','',''),
 (7,43,356,'CAMBUTAL','',''),
 (7,43,357,'ISLA DE CAÑAS','',''),
 (8,44,358,'ARRAIJÁN','',''),
 (8,44,359,'BURUNGA','',''),
 (8,44,360,'CERRO SILVESTRE','',''),
 (8,44,361,'JUAN DEMÓSTENES AROSEMENA','',''),
 (8,44,362,'NUEVO EMPERADOR','',''),
 (8,44,363,'SANTA CLARA','',''),
 (8,44,364,'VERACRUZ','',''),
 (8,44,365,'VISTA ALEGRE','',''),
 (8,45,366,'SAN MIGUEL ','',''),
 (8,45,367,'LA ENSENADA','',''),
 (8,45,368,'LA ESMERALDA','',''),
 (8,45,369,'LA GUINEA','',''),
 (8,45,370,'PEDRO GONZÁLEZ','',''),
 (8,45,371,'SABOGA','',''),
 (8,46,372,'CAPIRA','',''),
 (8,46,373,'CAIMITO','',''),
 (8,46,374,'CAMPANA','',''),
 (8,46,375,'CERMEÑO','',''),
 (8,46,376,'CIRI DE LOS SOTOS','',''),
 (8,46,377,'CIRI GRANDE','',''),
 (8,46,378,'EL CACAO','',''),
 (8,46,379,'LA TRINIDAD','',''),
 (8,46,380,'LAS OLLAS ARRIBA','',''),
 (8,46,381,'LIDICE','',''),
 (8,46,382,'VILLA CARMEN','',''),
 (8,46,383,'VILLA ROSARIO','',''),
 (8,46,384,'SANTA ROSA','',''),
 (8,47,385,'CHAME','',''),
 (8,47,386,'BEJUCO','',''),
 (8,47,387,'BUENOS AIRES','',''),
 (8,47,388,'CABUYA','',''),
 (8,47,389,'CHICA','',''),
 (8,47,390,'EL LIBANO','',''),
 (8,47,391,'LAS LAJAS','',''),
 (8,47,392,'NUEVA GORGONA','',''),
 (8,47,393,'PUNTA CHAME','',''),
 (8,47,394,'SAJALICES','',''),
 (8,47,395,'SORA','',''),
 (8,48,396,'CHEPO','',''),
 (8,48,397,'CAÑITA','',''),
 (8,48,398,'CHEPILLO','',''),
 (8,48,399,'EL LLANO','',''),
 (8,48,400,'LAS MARGARITAS DE CHEPO','',''),
 (8,48,401,'SANTA CRUZ DE CHININA','',''),
 (8,48,402,'MADUGANDÍ','',''),
 (8,48,403,'TORTÍ','',''),
 (8,49,404,'CHIMÁN','',''),
 (8,49,405,'BRUJAS','',''),
 (8,49,406,'GONZALO VASQUEZ','',''),
 (8,49,407,'PASIGA','',''),
 (8,49,408,'UNIÓN SANTEÑA','',''),
 (8,50,409,'BARRIO BALBOA','',''),
 (8,50,410,'BARRIO COLÓN','',''),
 (8,50,411,'AMADOR','',''),
 (8,50,412,'AROSEMENA','',''),
 (8,50,413,'EL ARADO','',''),
 (8,50,414,'EL COCO','',''),
 (8,50,415,'FEUILLET','',''),
 (8,50,416,'GUADALUPE','',''),
 (8,50,417,'HERRERA','',''),
 (8,50,418,'HURTADO','',''),
 (8,50,419,'ITURRALDE','',''),
 (8,50,420,'LA REPRESA','',''),
 (8,50,421,'LOS DIAZ','',''),
 (8,50,422,'MENDOZA','',''),
 (8,50,423,'OBALDÍA','',''),
 (8,50,424,'PLAYA LEONA','',''),
 (8,50,425,'PUERTO CAIMITO','',''),
 (8,50,426,'SANTA RITA','',''),
 (8,51,427,'24 DICIEMBRE','',''),
 (8,51,428,'ALCALDE DÍAZ','',''),
 (8,51,429,'ANCÓN','',''),
 (8,51,430,'BETANIA','',''),
 (8,51,431,'BELLA VISTA','',''),
 (8,51,432,'CAIMITILLO','',''),
 (8,51,433,'CHILIBRE','',''),
 (8,51,434,'EL CHORRILLO','',''),
 (8,51,435,'LA EXPOSICION O CALIDONIA','',''),
 (8,51,436,'CURUNDÚ','',''),
 (8,51,437,'ERNESTO CORDOBA CAMPOS','',''),
 (8,51,438,'JUAN DÍAZ','',''),
 (8,51,439,'LAS CUMBRES','',''),
 (8,51,440,'LAS MAÑANITAS','',''),
 (8,51,441,'PACORA','',''),
 (8,51,442,'PARQUE LEFEVRE','',''),
 (8,51,443,'PEDREGAL','',''),
 (8,51,444,'PUEBLO NUEVO','',''),
 (8,51,445,'RÍO ABAJO','',''),
 (8,51,446,'SAN FELIPE','',''),
 (8,51,447,'SAN FRANCISCO','',''),
 (8,51,448,'SAN MARTÍN','',''),
 (8,51,449,'SANTA ANA','',''),
 (8,51,450,'TOCUMEN','',''),
 (8,52,451,'SAN CARLOS','',''),
 (8,52,452,'EL ESPINO','',''),
 (8,52,453,'EL HIGO','',''),
 (8,52,454,'GUAYABITO','',''),
 (8,52,455,'LA ERMITA','',''),
 (8,52,456,'LA LAGUNA','',''),
 (8,52,457,'LAS UVAS','',''),
 (8,52,458,'LOS LLANITOS','',''),
 (8,52,459,'SAN JOSÉ','',''),
 (8,53,460,'AMELIA DENIS DE ICAZA','',''),
 (8,53,461,'BELISARIO PORRAS','',''),
 (8,53,462,'JOSÉ DOMINGO ESPINAR','',''),
 (8,53,463,'MATEO ITURRALDE','',''),
 (8,53,464,'VICTORIANO LORENZO','',''),
 (8,53,465,'ARNULFO ARIAS','',''),
 (8,53,466,'BELISARIO PORRAS','',''),
 (8,53,467,'OMAR TORRIJOS','',''),
 (8,53,468,'RUFINA ALFARO','',''),
 (8,54,469,'TABOGA','',''),
 (8,54,470,'OTOQUE OCCIDENTE','',''),
 (8,54,471,'OTOQUE ORIENTE','',''),
 (9,55,472,'ATALAYA','',''),
 (9,55,473,'EL BARRITO','',''),
 (9,55,474,'LA MONTAÑUELA','',''),
 (9,55,475,'SAN ANTONIO','',''),
 (9,55,476,'LA CARRILLO','',''),
 (9,56,477,'CALOBRE','',''),
 (9,56,478,'BARNIZAL','',''),
 (9,56,479,'CHITRA','',''),
 (9,56,480,'EL COCLA','',''),
 (9,56,481,'EL POTRERO','',''),
 (9,56,482,'LA LAGUNA','',''),
 (9,56,483,'LA RAYA DE CALOBRE','',''),
 (9,56,484,'LA TETILLA','',''),
 (9,56,485,'LA YEGUADA','',''),
 (9,56,486,'LAS GUIAS','',''),
 (9,56,487,'MONJARAS','',''),
 (9,56,488,'SAN JOSÉ','',''),
 (9,57,489,'CAÑAZAS','',''),
 (9,57,490,'CERRO DE PLATA','',''),
 (9,57,491,'LOS VALLES','',''),
 (9,57,492,'SAN MARCELO','',''),
 (9,57,493,'EL PICADOR','',''),
 (9,57,494,'SAN JOSE','',''),
 (9,57,495,'EL AROMILLO','',''),
 (9,57,496,'LAS CRUCES','',''),
 (9,58,497,'LA MESA','',''),
 (9,58,498,'BISVALLES','',''),
 (9,58,499,'BORO','',''),
 (9,58,500,'LLANO GRANDE','',''),
 (9,58,501,'SAN BARTOLO','',''),
 (9,58,502,'LOS MILAGROS','',''),
 (9,58,503,'EL HIGO','',''),
 (9,59,504,'LAS PALMAS','',''),
 (9,59,505,'CERRO DE CASA','',''),
 (9,59,506,'COROZAL','',''),
 (9,59,507,'EL MARIA','',''),
 (9,59,508,'EL PRADO','',''),
 (9,59,509,'EL RINCÓN','',''),
 (9,59,510,'LOLA','',''),
 (9,59,511,'PIXVAE','',''),
 (9,59,512,'PUERTO VIDAL','',''),
 (9,59,513,'ZAPOTILLO','',''),
 (9,59,514,'SAN MARTIN DE PORRES','',''),
 (9,59,515,'VIGUÍ','',''),
 (9,59,516,'MANUEL AMADOR GUERRERO','',''),
 (9,60,517,'MARIATO','',''),
 (9,60,518,'ARENAS','',''),
 (9,60,519,'EL CACAO','',''),
 (9,60,520,'QUEBRO','',''),
 (9,60,521,'TEBARIO','',''),
 (9,61,522,'MONTIJO','',''),
 (9,61,523,'GOBERNADORA','',''),
 (9,61,524,'LA GARCEANA','',''),
 (9,61,525,'LEONES','',''),
 (9,61,526,'PILÓN','',''),
 (9,61,527,'CEBACO','',''),
 (9,61,528,'COSTA HERMOSA','',''),
 (9,61,529,'UNIÓN DEL NORTE','',''),
 (9,62,530,'RÍO DE JESÚS','',''),
 (9,62,531,'LAS HUACAS','',''),
 (9,62,532,'LOS CASTILLOS','',''),
 (9,62,533,'UTIRA','',''),
 (9,62,534,'CATORCE DE NOVIEMBRE','',''),
 (9,63,535,'SAN FRANCISCO','',''),
 (9,63,536,'CORRAL FALSO','',''),
 (9,63,537,'LOS HATILLOS','',''),
 (9,63,538,'REMANCE','',''),
 (9,63,539,'SAN JUAN','',''),
 (9,63,540,'SAN JOSÉ','',''),
 (9,64,541,'SANTA FÉ','',''),
 (9,64,542,'CALOVEBORA','',''),
 (9,64,543,'EL ALTO','',''),
 (9,64,544,'EL CUAY','',''),
 (9,64,545,'EL PANTANO','',''),
 (9,64,546,'GATUNCITO','',''),
 (9,64,547,'RIO LUIS','',''),
 (9,64,548,'RUBEN CANTÚ','',''),
 (9,65,549,'SANTIAGO','',''),
 (9,65,550,'LA COLORADA','',''),
 (9,65,551,'LA PEÑA','',''),
 (9,65,552,'LA RAYA DE SANTA MARIA','',''),
 (9,65,553,'PONUGA','',''),
 (9,65,554,'SAN PEDRO DEL ESPINO','',''),
 (9,65,555,'CANTO DE LLANO','',''),
 (9,65,556,'LOS ALGARROBOS','',''),
 (9,65,557,'CARLOS SANTANA ÁVILA','',''),
 (9,65,558,'EDWIN FÁBREGA','',''),
 (9,65,559,'SAN MARTÍN DE PORRES','',''),
 (9,65,560,'URRACÁ','',''),
 (9,65,561,'LA SOLEDAD','',''),
 (9,65,562,'RINCÓN LARGO','',''),
 (9,65,563,'EL LLANITO','',''),
 (9,66,564,'SONÁ','',''),
 (9,66,565,'BAHÍA HONDA','',''),
 (9,66,566,'CALIDONIA','',''),
 (9,66,567,'CATIVE','',''),
 (9,66,568,'EL MARAÑON','',''),
 (9,66,569,'GUARUMAL','',''),
 (9,66,570,'LA SOLEDAD','',''),
 (9,66,571,'QUEBRADA DE ORO','',''),
 (9,66,572,'RIO GRANDE','',''),
 (9,66,573,'RODEO VIEJO','',''),
 (9,66,574,'HICACO','',''),
 (10,67,575,'PUERTO OBALDÍA','',''),
 (10,67,576,'NARGANÁ','',''),
 (10,67,577,'TUBUALÁ','',''),
 (10,67,578,'AILIGANDÍ','',''),
 (11,68,579,'CIRILO GUAYNORA','',''),
 (11,68,580,'LAJAS BLANCAS','',''),
 (11,68,581,'MANUEL ORTEGA','',''),
 (11,69,582,'JINGURUNDÓ','',''),
 (11,69,583,'RÍO SABALO','',''),
 (12,70,584,'BISIRA','',''),
 (12,70,585,'BURÍ','',''),
 (12,70,586,'KANKINTÚ','',''),
 (12,70,587,'GUARIVIARA','',''),
 (12,70,588,'GUORONÍ','',''),
 (12,70,589,'MUNUNÍ','',''),
 (12,70,590,'PIEDRA ROJA','',''),
 (12,70,591,'TUWAI','',''),
 (12,70,592,'MAN CREEK','',''),
 (12,71,593,'KUSAPÍN','',''),
 (12,71,594,'CALOVEBORA','',''),
 (12,71,595,'BAHÍA AZUL','',''),
 (12,71,596,'RÍO CHIRIQUÍ','',''),
 (12,71,597,'LOMA YUCA','',''),
 (12,71,598,'TOBOBÉ','',''),
 (12,71,599,'VALLE BONITO','',''),
 (12,72,600,'SOLOY','',''),
 (12,72,601,'BOCA DE BALSA','',''),
 (12,72,602,'CERRO BANCO','',''),
 (12,72,603,'CERRO PATENA','',''),
 (12,72,604,'CAMARÓN ARRIBA','',''),
 (12,72,605,'EMPLANADA DE CHORCA','',''),
 (12,72,606,'NAMNONÍ','',''),
 (12,72,607,'NIBA','',''),
 (12,73,608,'HATO PILÓN','',''),
 (12,73,609,'CASCABEL','',''),
 (12,73,610,'HATO COROTÚ','',''),
 (12,73,611,'HATO CULANTRO','',''),
 (12,73,612,'HATO JOBO','',''),
 (12,73,613,'HATO JULÍ','',''),
 (12,73,614,'QUEBRADA DE LORO','',''),
 (12,73,615,'SALTO DUPÍ','',''),
 (12,74,616,'CERRO IGLESIAS','',''),
 (12,74,617,'LAJERO','',''),
 (12,74,618,'HATO CHAMÍ','',''),
 (12,74,619,'SUSAMA','',''),
 (12,74,620,'JADEBERI','',''),
 (12,75,621,'CHCHICA','',''),
 (12,75,622,'ALTO CABALLERO','',''),
 (12,75,623,'BAGAMA','',''),
 (12,75,624,'CERRO CAÑA','',''),
 (12,75,625,'CERRO PUERCO','',''),
 (12,75,626,'KRUNA','',''),
 (12,75,627,'MARACA','',''),
 (12,75,628,'NIBRA','',''),
 (12,75,629,'PEÑA BLANCA','',''),
 (12,75,630,'ROKA','',''),
 (12,75,631,'SITIO PRADO','',''),
 (12,75,632,'UMANÍ','',''),
 (12,76,633,'BUENOS AIRES','',''),
 (12,76,634,'AGUA DE SALUD','',''),
 (12,76,635,'ALTO DE JESÚS','',''),
 (12,76,636,'CERRO PELADO','',''),
 (12,76,637,'EL BALE','',''),
 (12,76,638,'EL PAREDÓN','',''),
 (12,76,639,'EL PIRO','',''),
 (12,76,640,'GUAYABITO','',''),
 (12,76,641,'GUIBALE','','');
/*!40000 ALTER TABLE `corregimientos` ENABLE KEYS */;


--
-- Definition of table `distritos`
--

DROP TABLE IF EXISTS `distritos`;
CREATE TABLE `distritos` (
  `id_provincia` int(11) NOT NULL DEFAULT '0',
  `id_distrito` int(11) NOT NULL DEFAULT '0',
  `distrito` varchar(130) NOT NULL DEFAULT 'POR DEFINIR',
  `latitud` varchar(45) NOT NULL,
  `longitud` varchar(45) NOT NULL,
  PRIMARY KEY (`id_distrito`,`id_provincia`),
  KEY `ID_PROVINCIA` (`id_provincia`) USING BTREE,
  CONSTRAINT `distritos_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distritos`
--

/*!40000 ALTER TABLE `distritos` DISABLE KEYS */;
INSERT INTO `distritos` (`id_provincia`,`id_distrito`,`distrito`,`latitud`,`longitud`) VALUES 
 (1,1,'BOCAS DEL TORO','9.34967','-82.2559'),
 (1,2,'CHANGUINOLA','9.46762','-82.51161'),
 (1,3,'CHIRIQUÍ GRANDE','8.96015','-82.13859'),
 (2,4,'ALANJE','8.36444','-82.62508'),
 (2,5,'BARÚ','8.30178','-82.87360'),
 (2,6,'BOQUERÓN','8.63261','-82.57040'),
 (2,7,'BOQUETE','8.75190','-82.43642'),
 (2,8,'BUGABA','8.67547','-82.68606'),
 (2,9,'SAN JOSÉ DE DAVID','8.48993','-82.38072'),
 (2,10,'DOLEGA','8.62438','-82.45854'),
 (2,11,'GUALACA','8.60660','-82.26146'),
 (2,12,'REMEDIOS','8.22021','-81.78935'),
 (2,13,'RENACIMIENTO','8.72200','-82.85631'),
 (2,14,'SAN FÉLIX','8.25859','-81.91146'),
 (2,15,'SAN LORENZO','8.31131','-82.13278'),
 (2,16,'TOLÉ','8.18544','-81.64480'),
 (3,17,'AGUADULCE','8.21072','-80.60173'),
 (3,18,'ANTÓN','8.39888','-80.26924'),
 (3,19,'LA PINTADA','8.53856','-80.59483'),
 (3,20,'NATÁ','8.33956','-80.5316'),
 (3,21,'OLÁ','8.41638','-80.67077'),
 (3,22,'PENONOMÉ','8.50165','-80.37039'),
 (4,23,'COLÓN','9.35998','-79.92634'),
 (4,24,'CHAGRES','9.12755','-80.09925'),
 (4,25,'DONOSO','9.02364','-80.47087'),
 (4,26,'PORTOBELO','9.53375','-79.66577'),
 (4,27,'SANTA ISABÉL','9.50174','-79.34448'),
 (5,28,'CHEPIGANA','8.30182','-78.05404'),
 (5,29,'PINOGANA','8.13919','-77.67272'),
 (6,30,'CHITRE','7.97281','-80.42408'),
 (6,31,'LAS MINAS','7.80023','-80.74496'),
 (6,32,'LOS POZOS','7.78808','-80.64643'),
 (6,33,'OCÚ','7.95307','-80.77090'),
 (6,34,'PARITA','8.00500','-80.52347'),
 (6,35,'PESÉ','7.90652','-80.60786'),
 (6,36,'SANTA MARÍA','8.09279','-80.68316'),
 (7,37,'GUARARÉ','7.81476','-80.27860'),
 (7,38,'LAS TABLAS','7.77004','-80.27452'),
 (7,39,'LOS SANTOS','7.83333','-80.33333'),
 (7,40,'MACARACAS','7.72723','-80.55038'),
 (7,41,'PEDASÍ','7.49832','-80.04888'),
 (7,42,'POCRÍ','7.65207','-80.15140'),
 (7,43,'TONOSÍ','7.39434','-80.43528'),
 (8,44,'ARRAIJÁN','8.94303','-79.64525'),
 (8,45,'BALBOA','8.95753','-79.56030'),
 (8,46,'CAPIRA','8.75534','-79.85095'),
 (8,47,'CHAME','8.60085','-79.89700'),
 (8,48,'CHEPO','9.16472','-79.09499'),
 (8,49,'CHIMAN','8.72277','-78.62523'),
 (8,50,'LA CHORRERA','8.93490','-79.81335'),
 (8,51,'PANAMÁ','9.00878','-79.47588'),
 (8,52,'SAN CARLOS','8.51241','-79.98786'),
 (8,53,'SAN MIGUELITO','9.05581','-79.48761'),
 (8,54,'TABOGA','8.78953','-79.55608'),
 (9,55,'ATALAYA','8.04109','-80.92370'),
 (9,56,'CALOBRE','8.32053','-80.84036'),
 (9,57,'CAÑAZAS','8.31099','-81.21437'),
 (9,58,'LA MESA','8.15463','-81.17789'),
 (9,59,'LAS PALMAS','8.06189','-81.52961'),
 (9,60,'MARIATO','7.66664','-81.01553'),
 (9,61,'MONTIJO','7.99395','-81.05455'),
 (9,62,'RÍO DE JESÚS','7.98137','-81.16471'),
 (9,63,'SAN FRANCISCO','8.24627','-80.95473'),
 (9,64,'SANTA FÉ','8.51042','-81.07764'),
 (9,65,'SANTIAGO','8.10549','-80.96670'),
 (9,66,'SONÁ','8.00677','-81.31571'),
 (10,67,'KUNA YALA','9.22338','-78.44965'),
 (11,68,'CÉMACO','8.44793','-77.61331'),
 (11,69,'SAMBÚ','7.87427','-78.19284'),
 (12,70,'KANKINTÚ','8.84583','-81.81474'),
 (12,71,'KUSAPIN','7.90573','-78.10907'),
 (12,72,'BESIKÓ','8.55138','-82.04375'),
 (12,73,'MIRONÓ','8.48076','-81.88968'),
 (12,74,'NOLE DÜIMA','8.41078','-81.78475'),
 (12,75,'MÜNA','8.45410','-81.63762'),
 (12,76,'ÑÜRÜM','8.50979','-81.40938');
/*!40000 ALTER TABLE `distritos` ENABLE KEYS */;


--
-- Definition of table `especialidades_medicas`
--

DROP TABLE IF EXISTS `especialidades_medicas`;
CREATE TABLE `especialidades_medicas` (
  `id_especialidades_medicas` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL DEFAULT 'POR DEFINIR',
  PRIMARY KEY (`id_especialidades_medicas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `especialidades_medicas`
--

/*!40000 ALTER TABLE `especialidades_medicas` DISABLE KEYS */;
INSERT INTO `especialidades_medicas` (`id_especialidades_medicas`,`descripcion`) VALUES 
 (1,'ALERGÍA E INMUNOLOGÍA'),
 (2,'ANATOMIA PATOLOGICA'),
 (3,'ANESTESIOLOGÍA'),
 (4,'ANGIOLOGÍA GENERAL Y HEMODINAMIA'),
 (5,'CARDIOLOGÍA'),
 (6,'CARDIOLOGO INFANTIL'),
 (7,'CIRUGÍA CARDIOVASCULAR'),
 (8,'CIRUGÍA DE CABEZA Y CUELLO'),
 (9,'CIRUGÍA DE TORAX/CIRUGÍA TORACICA'),
 (10,'CIRUGÍA GENERAL'),
 (11,'CIRUGÍA INFANTIL/CIRUGÍA PEDIATRICA'),
 (12,'CIRUGÍA PLÁSTICA Y REPARADORA'),
 (13,'CIRUGÍA VASCULAR PERIFERICA'),
 (14,'COLOPROCTOLOGÍA'),
 (15,'DERMATOLOGÍA'),
 (16,'DIAGNÓSTICO POR IMÁGENES'),
 (17,'ENDOCRINOLOGÍA'),
 (18,'ENDOCRINOLOGO INFANTIL'),
 (19,'FARMACOLOGÍA CLINICA'),
 (20,'FISIATRIA/MEDICINA FÍSICA Y REHABILITACIÓN'),
 (21,'GASTROENTEROLOGÍA'),
 (22,'GASTROENTEROLOGO INFANTIL'),
 (23,'GENÉTICA MÉDICA'),
 (24,'GERIATRÍA'),
 (25,'GINECOLOGÍA'),
 (26,'HEMATOLOGÍA'),
 (27,'HEMATOLOGO INFANTIL'),
 (28,'HEMOTERAPIA E INMUNOHEMATOLOGÍA'),
 (29,'INFECTOLOGÍA'),
 (30,'INFECTOLOGO INFANTIL'),
 (31,'MEDICINA DEL DEPORTE'),
 (32,'MEDICINA DEL TRABAJO'),
 (33,'MEDICINA GENERAL/MEDICINA DE FAMILIA'),
 (34,'MEDICINA LEGAL'),
 (35,'MEDICINA NUCLEAR'),
 (36,'NEFROLOGÍA'),
 (37,'NEFROLOGO INFANTIL'),
 (38,'NEONATOLOGÍA'),
 (39,'NEUMONOLOGÍA'),
 (40,'NEUMONOLOGO INFANTIL'),
 (41,'NEUROCIRUGÍA'),
 (42,'NEUROLOGÍA'),
 (43,'NEUROLOGO INFANTIL'),
 (44,'NUTRICION'),
 (45,'OBSTETRICIA'),
 (46,'OFTALMOLOGÍA'),
 (47,'ONCOLOGÍA'),
 (48,'ONCOLOGO INFANTIL'),
 (49,'ORTOPEDIA Y TRAUMATOLOGÍA'),
 (50,'OTORRINOLARINGOLOGÍA'),
 (51,'PEDIATRIA'),
 (52,'PSIQUIATRIA'),
 (53,'PSIQUIATRIA INFANTO JUVENIL'),
 (54,'RADIOTERAPIA O TERAPIA RADIANTE'),
 (55,'REUMATOLOGÍA'),
 (56,'REUMATOLOGO INFANTIL'),
 (57,'TERAPIA INTENSIVA'),
 (58,'TERAPISTA INTENSIVO INFANTIL'),
 (59,'TOCOGINECOLOGÍA '),
 (60,'TOXICOLOGÍA'),
 (61,'UROLOGÍA');
/*!40000 ALTER TABLE `especialidades_medicas` ENABLE KEYS */;


--
-- Definition of table `estados_civiles`
--

DROP TABLE IF EXISTS `estados_civiles`;
CREATE TABLE `estados_civiles` (
  `id_estado_civil` int(11) NOT NULL DEFAULT '0',
  `estado_civil` varchar(15) NOT NULL DEFAULT 'POR DEFINIR',
  PRIMARY KEY (`id_estado_civil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estados_civiles`
--

/*!40000 ALTER TABLE `estados_civiles` DISABLE KEYS */;
INSERT INTO `estados_civiles` (`id_estado_civil`,`estado_civil`) VALUES 
 (1,'CASADO'),
 (2,'SOLTERO'),
 (3,'DIVORCIADO'),
 (4,'UNIDO'),
 (5,'VIUDO');
/*!40000 ALTER TABLE `estados_civiles` ENABLE KEYS */;


--
-- Definition of table `etnias`
--

DROP TABLE IF EXISTS `etnias`;
CREATE TABLE `etnias` (
  `id_etnia` int(11) NOT NULL AUTO_INCREMENT,
  `etnia` varchar(30) NOT NULL DEFAULT 'POR DEFINIR',
  PRIMARY KEY (`id_etnia`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etnias`
--

/*!40000 ALTER TABLE `etnias` DISABLE KEYS */;
INSERT INTO `etnias` (`id_etnia`,`etnia`) VALUES 
 (1,'NO INDIGENA'),
 (2,'KUNA'),
 (3,'EMBERÁ'),
 (4,'WOUNAAN'),
 (5,'NGÖBE'),
 (6,'BUGLE'),
 (7,'NASSO O TERIBE'),
 (8,'BOKOTA'),
 (9,'BRI BRI');
/*!40000 ALTER TABLE `etnias` ENABLE KEYS */;


--
-- Definition of table `instituciones`
--

DROP TABLE IF EXISTS `instituciones`;
CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provincia` int(11) NOT NULL,
  `id_distrito` int(11) NOT NULL,
  `id_corregimiento` int(11) NOT NULL,
  `id_tipo_institucion` int(11) NOT NULL,
  `lugar` varchar(200) NOT NULL DEFAULT 'POR DEFINIR',
  `denominacion` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1102021403 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instituciones`
--

/*!40000 ALTER TABLE `instituciones` DISABLE KEYS */;
INSERT INTO `instituciones` (`id`,`id_provincia`,`id_distrito`,`id_corregimiento`,`id_tipo_institucion`,`lugar`,`denominacion`) VALUES 
 (101010501,1,1,1,24,'ISLA COLÓN','HOSPITAL DE BOCAS DEL TORO'),
 (101011401,1,1,1,12,'BOCA DE DRAGO','P. DE S. BOCA DE DRAGO'),
 (101020801,1,1,2,9,'BASTIMENTOS','C. DE S. DE BASTIMENTOS'),
 (101021403,1,1,2,12,'SAN CRISTOBAL','P. DE S. SAN CRISTOBAL'),
 (101030801,1,1,3,9,'QUEBRADA HONDA','C. DE S. LOS HIGUERONES'),
 (101031401,1,1,3,12,'CAUCHERO','P. DE S. CAUCHERO'),
 (101041401,1,1,4,12,'ISLA TIGRE','P. DE S. ISLA TIGRE'),
 (101041402,1,1,4,12,'SHARK HOLE','P. DE S. SHARK HOLE'),
 (101051403,1,1,5,12,'BUENA ESPERANZA','P. DE S. BUENA ESPERANZA'),
 (102010801,1,2,6,9,'FINCA 06','C. DE S. FINCA 06 / CABY RODRIGUEZ'),
 (102010802,1,2,6,9,'FINCA 32','C. DE S. FINCA 32 / RANDON D ACOSTA'),
 (102010803,1,2,6,9,'FINCA 63','C. DE S. FINCA 63 / ANTONIO PRECIADO'),
 (102011201,1,2,6,11,'CHARAGRE','S. C. DE S. CHARAGRE'),
 (102011601,1,2,6,22,'CHANGUINOLA','OFICINA REGIONAL DE BOCAS DEL TORO'),
 (102012501,1,2,6,24,'CHANGUINOLA','HOSPITAL DE CHANGUINOLA'),
 (102021201,1,2,7,11,'OJO DE AGUA','S. C. DE S. OJO DE AGUA'),
 (102021401,1,2,7,12,'NUEVO PARAISO','P. DE S. DE NUEVO PARAISO'),
 (102022501,1,2,7,24,'ALMIRANTE','HOSPITAL DE ALMIRANTE'),
 (102030601,1,2,8,19,'GUABITO','POLICLINICA GUABITO'),
 (102031001,1,2,8,20,'LAS TABLAS','ULAPS DE LAS TABLAS'),
 (102031403,1,2,8,12,'CALIFORNIA','P. DE S. CALIFORNIA 1/'),
 (102031404,1,2,8,12,'DEBORA','P. DE S. DEBORA'),
 (102041401,1,2,9,12,'BONYIC','P. DE S. BONYIC'),
 (102041403,1,2,9,12,'SAN SAN DRUY','P. DE S. SAN SAN DRUY'),
 (102041404,1,2,9,12,'SIEKIN','P. DE S. SIEKIN'),
 (102041405,1,2,9,12,'SIEYIK','P. DE S. SIEYIK'),
 (102041406,1,2,9,12,'SOLON','P. DE S. SOLON'),
 (102041407,1,2,9,12,'LA TIGRA','P. DE S. LA TIGRA'),
 (102041408,1,2,9,12,'SAN SAN','P. DE S. SAN SAN'),
 (102050801,1,2,10,9,'VALLE DEL RISCO','C. DE S. VALLE RISCO'),
 (102060801,1,2,11,9,'EL SILENCIO','C. DE S. SILENCIO'),
 (102060802,1,2,11,23,'FINCA 04','C. DE S. FINCA 04'),
 (102070801,1,2,12,9,'LA MESA','C. DE S. LA MESA'),
 (102071401,1,2,12,12,'BARRANCO ADENTRO','P. DE S. DE BARRANCO ADENTRO'),
 (102091201,1,2,17,11,'LA GLORIA','S. C. DE SALUD LA GLORIA'),
 (102101401,1,2,15,12,'GUABO','P. DE S. DE GUABO DE YORKIN'),
 (102101402,1,2,15,12,'LAS DELICIAS','P. DE S. LAS DELICIAS'),
 (102111401,1,2,14,12,'NANCE RISCO','P. DE S. NANCE RISCO'),
 (103010801,1,3,18,9,'CHIRIQUI GRANDE','C. DE S. CHIRIQUI GRANDE'),
 (103020801,1,3,20,9,'MIRAMAR','C. DE S. MIRAMAR'),
 (103041401,1,3,22,12,'TRAICIONERA','P. DE S. TRAICIONERA'),
 (103041402,1,3,22,12,'PALMA REAL (P)','P. DE S. PALMA REAL'),
 (103050801,1,3,23,9,'RAMBALA (P)','C. DE S. DE RAMBALA'),
 (103052501,1,3,23,24,'RAMBALA (P)','HOSPITAL DE CHIRIQUI GRANDE'),
 (201010601,3,17,121,19,'CABECERA','POLICLÍNICA MANUEL DE ROJAS SUCRE'),
 (201011101,3,17,121,13,'AGUADULCE','CENTRO DE PROMOCIÓN AGUADULCE'),
 (201012501,3,17,121,24,'CABECERA','HOSPITAL RAFAEL ESTEVEZ'),
 (201020801,3,17,122,24,'EL CRISTO','C. DE S. EL CRISTO'),
 (201021201,3,17,122,11,'EL CRISTO','S. C. DE S. EL HATO 1/'),
 (201030801,3,17,123,24,'EL JAGÜITO','C. DE S. EL JAGÜITO'),
 (201030802,3,17,123,24,'LA LOMA','C. DE S. LA LOMA'),
 (201031202,3,17,123,11,'LLANO SÁNCHEZ','S. C. DE S. LLANO SÁNCHEZ'),
 (201040801,3,17,124,24,'POCRÍ','C. DE S. POCRÍ'),
 (201050801,3,17,125,24,'POZO AZUL','C. DE S. POZO AZUL'),
 (202010901,3,18,126,10,'ANTÓN','C.S.M.I DE ANTÓN'),
 (202021401,3,18,127,12,'CABUYA','P. DE S. CABUYA'),
 (202031401,3,18,128,12,'EL CHIRÚ','P. DE S. EL CHIRÚ'),
 (202041401,3,18,129,12,'EL RETIRO','P. DE S. EL RETIRO'),
 (202041402,3,18,129,12,'LLANO GRANDE','P. DE S. LLANO GRANDE'),
 (202050901,3,18,130,10,'EL VALLE','C.S.M.I DEL VALLE'),
 (202061401,3,18,131,12,'JUAN DÍAZ','P. DE S. JUAN DÍAZ'),
 (202070801,3,18,132,24,'RÍO HATO','C. DE S.  RÍO HATO'),
 (202071401,3,18,132,12,'LAS MATAS','P. DE S. LAS MATAS'),
 (202081401,3,18,133,12,'ALTOS DE LA ESTANCIA','P. DE S. ALTOS DE LA ESTANCIA'),
 (202081402,3,18,133,12,'SAN JUAN DE DIOS','P. DE S. SAN JUAN DE DIOS'),
 (202090801,3,18,134,24,'SANTA RITA','C. DE S.  SANTA RITA'),
 (202101401,3,18,135,12,'CABALLERO','P. DE S. CABALLERO'),
 (202101402,3,18,135,12,'LOS CERRITOS','P. DE S. LOS CERRITOS 1/'),
 (202101403,3,18,135,12,'TRANQUILLA','P. DE S. TRANQUILLA 1/'),
 (203010901,3,19,136,10,'LA PINTADA','C.S.M.I DE LA PINTADA'),
 (203011001,3,19,136,20,'LA PINTADA','U.L.A.P.S'),
 (203020801,3,19,137,24,'EL COPÉ','C. DE S. EL COPE'),
 (203021201,3,19,137,11,'BAJO GRANDE','S. C. DE BAJO GRANDE'),
 (203021401,3,19,137,12,'EL LIMÓN DEL HARINO','P. DE S. LIMÓN DEL HARINO'),
 (203021403,3,19,137,12,'SANTA MARTA','P. DE S. SANTA MARTA'),
 (203031201,3,19,138,11,'EL POTRERO','S. C. DE S. EL POTRERO'),
 (203031401,3,19,138,12,'PIEDRAS AMARILLAS','P. DE S. PIEDRAS AMARILLAS'),
 (203041401,3,19,139,12,'EMBARCADERO DEL CASCAJAL','P. DE S. EMBARCADERO DEL CASCAJAL'),
 (203041402,3,19,139,12,'ARENAL GRANDE','P. DE S. ARENAL GRANDE'),
 (203041403,3,19,139,12,'CUTEVILLA','P. DE S. CUTEVILLA'),
 (203041404,3,19,139,12,'MOLEJÓN','P. DE S. MOLEJÓN'),
 (203041405,3,19,139,12,'CASCAJAL','P. DE S. CASCAJAL'),
 (203051401,3,19,140,12,'LAS LAJAS','P. DE S. LAS LAJAS'),
 (203051402,3,19,140,12,'PIEDRAS GORDAS','P. DE S. PIEDRAS GORDAS'),
 (203051403,3,19,140,12,'EL JOBO','P. DE S. EL JOBO'),
 (203051404,3,19,140,12,'PLATANAL','P. DE S. PLATANAL'),
 (203051405,3,19,140,12,'SARDINA','P. DE S. SARDINA'),
 (203061401,3,19,141,12,'OJO DE AGUA','P. DE S. OJO DE AGUA'),
 (204010601,3,20,142,19,'NATÁ','POLICLÍNICA SAN JUAN DE DIOS'),
 (204011101,3,20,142,13,'NATÁ','C. DE PROMOC. OFELINA CHIARI DE NATÁ'),
 (204021201,3,20,143,11,'CAPELLANÍA','S. C. DE S. CAPELLANÍA'),
 (204021401,3,20,143,12,'VILLAREAL','P. DE S. VILLARREAL'),
 (204031201,3,20,144,11,'CHURUBÉ ABAJO','S. C. DE S. CHURUBÉ'),
 (204031202,3,20,144,11,'EL CAÑO','S. C. DE S. EL CAÑO'),
 (204041401,3,20,145,12,'GUZMÁN','P. DE S. GUZMÁN'),
 (204041402,3,20,145,12,'SAPILLO ARRIBA','P. DE S. SAPILLO'),
 (204051401,3,20,146,12,'LAS HUACAS DE QUIJE','P. DE S. LAS HUACAS DE QUIJE'),
 (204061401,3,20,147,12,'TOZA','P. DE S. TOZA'),
 (204061402,3,20,147,12,'EL CORTEZO','P. DE S. EL CORTEZO'),
 (205010801,3,21,148,24,'CABECERA','C. DE S. OLÁ'),
 (205011401,3,21,148,12,'BURRICA','P. DE S. BURRICA'),
 (205021401,3,21,149,12,'EL CRISTO','P. DE S. EL CRISTO'),
 (205031401,3,21,150,12,'LAS SABANAS','P. DE S. LAS SABANAS'),
 (205031402,3,21,150,12,'LAS BARRETAS','P. DE S. LAS BARRETAS'),
 (205041401,3,21,151,12,'BARRANCO COLORADO','P. DE S. BARRANCO COLORADO 1/'),
 (205051201,3,21,152,11,'NUESTRO AMO','S. C. DE S. NUESTRO AMO'),
 (206010401,3,22,153,24,'PENONOMÉ','HISPITAL AQUILINO TEJEIRA'),
 (206010601,3,22,153,19,'PENONOMÉ','POLICLÍNICA MANUEL P. OCAÑA'),
 (206010801,3,22,153,24,'PENONOMÉ','C. DE S. PENONOMÉ'),
 (206011101,3,22,153,13,'PENONOMÉ','CENTRO DE PROMOCIÓN PENONOMÉ'),
 (206011601,3,22,153,22,'PENONOMÉ','OFICINA REGIONAL DE COCLÉ'),
 (206031401,3,22,155,12,'LAS GUABAS','P. DE S. LAS GUABAS'),
 (206040801,3,22,156,24,'CHIGUIRÍ ARRIBA','C. DE S. CHIGUIRÍ ARRIBA'),
 (206041401,3,22,156,12,'SAN MIGUEL CENTRO','P. DE S. SAN MIGUEL CENTRO'),
 (206060801,3,22,158,24,'CAIMITO','C. DE S. CAIMITO'),
 (206061401,3,22,158,12,'MEMBRILLO','P. DE S. MEMBRILLO'),
 (206070801,3,22,159,24,'RÍO GRANDE','C. DE S. RÍO GRANDE (M. DE J. CONTE)'),
 (206081401,3,22,160,12,'BOCA DE URACILLO','P. DE S. BOCA DE URACILLO'),
 (206081402,3,22,160,12,'EL JOBO ARRIBA','P. DE S. EL JOBO ARRIBA'),
 (206081403,3,22,160,12,'LAS PALMAS','P. DE S. LAS PALMAS 1/'),
 (206081404,3,22,160,12,'SAN CRISTÓBAL','P. DE S. SAN CRISTÓBAL'),
 (206081405,3,22,160,12,'U CENTRO (P)','P. DE S. U CENTRO'),
 (206081406,3,22,160,12,'LAS MARÍAS','P. DE S. LAS MARÍAS'),
 (206090801,3,22,161,24,'TOABRÉ','C. DE S. TOABRÉ'),
 (206091401,3,22,161,12,'EL GUAYABO','P. DE S. EL GUAYABO'),
 (206091402,3,22,161,12,'TUCUÉ','P. DE S. TUCUÉ'),
 (206091403,3,22,161,12,'ALTOS DE SAN MIGUEL','P. DE S. ALTOS DE SAN MIGUEL'),
 (206101401,3,22,162,12,'EL LIMÓN','P. DE S. EL LIMON DE TULÚ'),
 (206101402,3,22,162,12,'LURÁ CENTRO','P. DE S. LURÁ CENTRO'),
 (206101403,3,22,162,12,'SAN ISIDRO','P. DE S. SAN ISIDRO'),
 (206101404,3,22,162,12,'TULÚ CENTRO','P. DE S. TULÚ'),
 (301010701,4,23,164,8,'BARRIO NORTE','POLICENTRO JUAN A. NUÑEZ'),
 (301010801,4,23,164,9,'BARRIO NORTE','C. DE S. PATRICIA DUNCAN'),
 (301010803,4,23,165,9,'BARRIO SUR','C. DE S. DE ATENCION INTEGRAL DEL ADOLESCENTE'),
 (301020401,4,23,165,24,'BARRIO SUR','HOSPITAL MANUEL AMADOR GUERRERO'),
 (301021601,4,23,165,22,'BARRIO SUR','OFICINA REGIONAL DE COLON'),
 (301030801,4,23,166,9,'BUENA VISTA','C. DE S. BUENA VISTA (DR. HENRY SIMONS)'),
 (301031201,4,23,166,11,'EL GIRAL','S. C. DE S. GIRAL'),
 (301031202,4,23,166,11,'QUEBRADA BONITA','S. C. DE S. QDA. BONITA'),
 (301040801,4,23,167,9,'CATIVA','C. DE S. CATIVA 1/'),
 (301041201,4,23,167,11,'BDA. PRO-KUNA','S. C. DE S. BDA. KUNA'),
 (301041401,4,23,167,12,'LA REPRESA (P)','P. DE S. LA REPRESA DE CATIVA'),
 (301051201,4,23,168,11,'CUIPO (P)','S. C. DE S. CUIPO'),
 (301051401,4,23,168,12,'CIRICITO (P)','P. DE S. CIRICITO'),
 (301060601,4,23,174,19,'CRISTOBAL','POLICLINICA DR. HUGO SPADAFORA'),
 (301061201,4,23,174,11,'PUERTO ESCONDIDO','S. C. DE S. PUERTO ESCONDIDO'),
 (301062001,4,23,174,2,'CRISTOBAL','CENTRO DE REHABILITACIÓN INTEGRAL (REINTEGRA)'),
 (301070801,4,23,175,9,'ESCOBAL (P)','C. DE S. ESCOBAL (SR. CIRILO ESCOBAR)'),
 (301071403,4,23,175,12,'QUEBRAON','P. DE S.  QUEBRAON'),
 (301081201,4,23,171,11,'EL LIMON (P)','S. C. DE S. EK LIMON'),
 (301101401,4,23,173,12,'VILLA ALONDRA','P. DE S.  VILLA ALONDRA'),
 (301110601,4,23,169,19,'SABANITAS','POLICLINICA SABANITAS'),
 (301120801,4,23,170,9,'SARDINILLA (P)','C. DE S. JUVENTINA MONTENEGRO SARDINILLA'),
 (301121401,4,23,170,12,'SALAMANQUITA','P. DE S. SALAMANQUITA'),
 (301121402,4,23,170,12,'BOQUERON ARRIBA','P. DE S.  BOQUERON ARRIBA'),
 (301130601,4,23,176,19,'NVO. SAN JUAN','POLICLINICA NUEVO SAN JUAN'),
 (301131201,4,23,176,11,'NVO. VIGIA (P)','S. C. DE S. NVO. VIGIA'),
 (301131401,4,23,176,12,'GATUNCILLO','P. DE S.  GATUNCILLO NORTE 1/'),
 (301141401,4,23,177,12,'GUAYABALITO (P)','P. DE S.  GUAYABALITO 1/'),
 (301141402,4,23,177,12,'SANTA ROSA (P)','P. DE S.  SANTA ROSA'),
 (302021401,4,24,179,12,'ACHIOTE','P. DE S.  ACHIOTE'),
 (302021402,4,24,179,12,'LA TAGUA','P. DE S. LA TAGUA'),
 (302031401,4,24,180,12,'EL GUABO','P. DE S. EL GUABO'),
 (302031403,4,24,180,12,'STA. FE ARRIBA','P. DE S.  SANTA FE DEL GUABO'),
 (302041401,4,24,181,12,'LA ENCANTADA','P. DE S. LA ENCANTADA'),
 (302041402,4,24,181,12,'SANTA ROSA','P. DE S. STA. ROSA DE RIO INDIO'),
 (302041403,4,24,181,12,'QUEBRADA BONITA','P. DE S. QUEBRADA BONITA'),
 (302041404,4,24,181,12,'LAS CRUCES','P. DE S.  LAS CRUCES'),
 (302041405,4,24,181,12,'LIMON','P. DE S.  LIMON DE CHAGRES'),
 (302050901,4,24,182,10,'PALMAS BELLAS','C. DE S. PALMAS BELLAS (DR. MIGUEL A. VARGAS) /2'),
 (302061201,4,24,183,11,'PIÑA (P)','S. C. DE S. PIÑA'),
 (302070801,4,24,184,9,'ICACAL','C. DE S. ICACAL'),
 (302071401,4,24,184,12,'NUEVA SEVILLA','P. DE S. SEVILLA 1/'),
 (303010801,4,25,185,9,'MIGUEL DE LA BORDA','C. DE S. MIGUEL DE LA BORDA'),
 (303011401,4,25,185,12,'LIMON','P. DE S.  LIMON DE DONOSO'),
 (303011402,4,25,185,12,'DIEGO','P. DE S.  RIO DIEGO'),
 (303020801,4,25,186,9,'BELEN','C. DE S. BELEN'),
 (303021401,4,25,186,12,'COCLE DEL NORTE','P. DE S. COCLE DEL NORTE'),
 (303021402,4,25,186,12,'SABANITA VERDE','P. DE S. SABANITA VERDE'),
 (303031401,4,25,187,12,'CERRO MIGUEL','P. DE S. CERRO MIGUEL 1/'),
 (303031402,4,25,187,12,'BOCA DEL CONGAL','P. DE S. BOCA DEL CONGAL'),
 (303031403,4,25,187,12,'SANTA MARIA (P)','P. DE S. STA. MARIA'),
 (303031404,4,25,187,12,'EL GUASIMO','P. DE S. VILLA DEL CARMEN'),
 (303031405,4,25,187,12,'EL GUASIMO (P)','P. DE S. GUASIMO'),
 (303041401,4,25,188,12,'GOBEA','P. DE S. DE GOBEA'),
 (303051201,4,25,189,11,'BOCA DE RIO INDIO','S. C. DE S.  RIO INDIO'),
 (303051402,4,25,189,12,'RIO INDIO','P. DE S. EL GUAYABITO'),
 (303051403,4,25,189,12,'EL PAPAYO','P. DE S. EL PAPAYO'),
 (304010801,4,26,191,9,'PORTOBELO','C. DE S. PORTOBELO (SRA. BLASINA BERNAL)'),
 (304011001,4,26,191,20,'PORTOBELO','U.L.A.P.S PORTOBELO'),
 (304012401,4,26,194,11,'ISLA GRANDE','S. C. DE S. ISLA GRANDE'),
 (304021401,4,26,192,12,'CACIQUE','P. DE S. CACIQUE'),
 (304031401,4,26,193,12,'GARROTE O PTO. LINDO','P. DE S. PUERTO LINDO'),
 (304040120,4,26,192,12,'JOSE DEL MAR','P. DE S. JOSE DEL MAR'),
 (304041402,4,26,194,12,'LA GUAIRA','P. DE S. LA GUAIRA 1/'),
 (304041403,4,26,194,12,'SAN ANTONIO (P)','P. DE S. SAN ANTONIO'),
 (304051201,4,26,191,11,'MARIA CHIQUITA','S. C. DE S. MARIA CHIQUITA'),
 (305011401,4,27,196,12,'PALENQUE CABECERA','P. DE S. PALENQUE'),
 (305021401,4,27,197,12,'CUANGO','P. DE S. CUANGO'),
 (305031201,4,27,198,11,'MIRAMAR','S. C. DE S. MIRAMAR'),
 (305040801,4,27,199,9,'NOMBRE DE DIOS','C. DE S. NOMBRE DE DIOS'),
 (305051401,4,27,200,12,'PALMIRA','P. DE S. PALMIRA'),
 (305061401,4,27,201,12,'PLAYA CHIQUITA','P. DE S. PLAYA CHIQUITA'),
 (305071201,4,27,202,11,'SANTA ISABEL','S. C. DE S. SANTA ISABEL'),
 (305081401,4,27,203,12,'VIENTO FRIO','P. DE S. VIENTO FRIO'),
 (401010801,2,4,24,9,'ALANJE','C. DE S. ALANJE'),
 (401031201,2,4,26,11,'EL TEJAR','S. C. DE S. EL TEJAR'),
 (401031401,2,4,26,12,'LA PITA','P. DE S. LA PITA'),
 (401041201,2,4,27,11,'GUARUMAL','S. C. DE S. GUARUMAL'),
 (401051401,2,4,28,12,'PALO GRANDE','P. DE S. PALO GRANDE 1/'),
 (401061201,2,4,29,11,'QUEREVALO','S. C. DE S. QUEREVALO'),
 (401061401,2,4,29,12,'ORILLAS DEL RIO','P. DE S. ORILLA DEL RIO'),
 (401071401,2,4,30,12,'SANTO TOMAS','P. DE S. SANTO TOMAS'),
 (401081401,2,4,31,12,'CANTA GALLO','P. DE S. CANTA GALLO'),
 (401091401,2,4,32,12,'MONTE LIRIO','P. DE S. CHIRIQUI VIEJO'),
 (402011404,2,5,33,12,'RIO CHIQUITO','P. DE S. RIO CHIQUITO'),
 (402021201,2,5,34,11,'LIMONES','S. C. DE S. LIMONES'),
 (402021202,2,5,34,11,'BELLA VISTA','S. C. DE S. BELLA VISTA'),
 (402021203,2,5,36,11,'BACO','S. C. DE S. BACO'),
 (402030801,2,5,35,9,'PASO CANOA INTERNACIONAL','C. DE S. PASO CANOA INTERNACIONAL'),
 (402030802,2,5,35,9,'PROGRESO','C. DE S. PROGRESO'),
 (402031401,2,5,35,12,'MAJAGUAL','P. DE S. MAJAGUAL'),
 (402040801,2,5,36,9,'LA ESPERANZA','C. DE S. LA ESPERANZA'),
 (402051001,2,5,37,21,'FINCA BLANCO','CAPPS DE BLANCO'),
 (402051002,2,5,37,21,'FINCA BALSA','CAPPS DE BALSA 1/'),
 (402051003,2,5,37,21,'PROYECTO CAOBA','CAPPS DE CAOBA'),
 (402051004,2,5,37,21,'FINCA LECHOZA','CAPPS DE LECHOZA 1/'),
 (402051005,2,5,37,21,'FINCA MALAQUETO','CAPPS DE MALAQUETO'),
 (402051006,2,5,37,21,'FINCA ZAPATERO','CAPPS DE ZAPATERO'),
 (402051007,2,5,37,21,'FINCA CORREDOR','CAPPS DE CORREDOR'),
 (402051008,2,5,37,21,'JOBITO','CAPPS DE JOBITO'),
 (402051201,2,5,37,11,'LA VICTORIA','S. C. DE S. LA VICTORIA'),
 (402051202,2,5,37,11,'MANACA CIVIL','S. C. DE S. MANACA CIVIL'),
 (402051402,2,5,37,12,'OLIVO CIVIL','P. DE S. LOS OLIVOS'),
 (403010801,2,6,38,9,'BOQUERON','C. DE S. BOQUERON'),
 (403031401,2,6,40,12,'CORDILLERA','P. DE S. CORDILLERA'),
 (403041401,2,6,41,12,'GUABAL','P. DE S. GUABAL'),
 (403051401,2,6,42,12,'BOCALATUM (P)','P. DE S. BOCALATUM'),
 (403081401,2,6,45,12,'TIJERA','P. DE S. DE TIJERA'),
 (404010801,2,7,46,9,'BAJO BOQUETE','C. DE S. DE BOQUETE'),
 (404020801,2,7,47,9,'CALDERA','C. DE S. DE CALDERA'),
 (404030801,2,7,48,9,'PALMIRA CENTRO','C. DE S. PALMIRA'),
 (405020801,2,8,53,9,'ASERRIO DE GARICHE','C. DE S. ASERRIO DE GARICHE'),
 (405021401,2,8,53,12,'SAN PEDRO','P. DE S. SAN PEDRO 1/'),
 (405031201,2,8,54,11,'MATA DE BUGABA','S. C. DE S. MATA DE BUGABA'),
 (405040801,2,8,55,9,'CERRO PUNTA','C. DE S. CERRO PUNTA'),
 (405051201,2,8,56,11,'GOMEZ','S. C. DE S. GOMEZ'),
 (405060801,2,8,57,9,'LA ESTRELLA','C. DE S. LA ESTRELLA'),
 (405061401,2,8,57,12,'SIOGUI ABAJO (P)','P. DE S. LA TRANCA DE SIOGUI 1/'),
 (405070801,2,8,58,9,'SAN ANDRES','C. DE S. SAN ANDRES'),
 (405080801,2,8,59,9,'SANTA MARTA (P)','C. DE S. SANTA MARTA'),
 (405090801,2,8,60,9,'SANTA ROSA','C. DE S. EL SANTO'),
 (405100801,2,8,61,9,'SANTO DOMINGO','C. DE S. SANTO DOMINGO'),
 (405101201,2,8,61,11,'MANCHUILA','S. C. DE S. MANCHUILA'),
 (405110801,2,8,62,9,'SORTOVA','C. DE S. SORTOVA'),
 (405111201,2,8,60,11,'SANTA ROSA','S. C. DE S. SANTA ROSA'),
 (405121001,2,8,63,20,'VOLCAN','ULAPS DE VOLCAN'),
 (405131201,2,8,64,11,'EL BONGO','S. C. DE S. BONGO ARRIBA'),
 (406010801,2,9,66,9,'BARRIO BOLIVAR','C. DE S. BOLIVAR (SECTOR 2)'),
 (406010802,2,9,66,9,'BARRIO SAN CRISTOBAL','C. DE S. CRISTOBAL (JOSE DIEZ SECTOR 9)'),
 (406010803,2,9,66,9,'BARRIO SAN MATEO','C. DE S. SAN MATEO (SECTOR 4)'),
 (406011001,2,9,66,20,'NVO. VEDADO','ULAPS NUEVO VEDADO'),
 (406011301,2,9,66,24,'NVO. VEDADO','DISPENSARIO CARCEL DE DAVID'),
 (406011303,2,9,66,24,'DAVID','DISPENSARIO CUARTEL DE BOMBEROS 1/'),
 (406011308,2,9,66,24,'DAVID','DISPENSARIO ASILO DE ANCIANO (SANTA CATALINA)'),
 (406011601,2,9,66,23,'DAVID','OFICINA REGIONAL DE CHIRIQUI'),
 (406012001,2,9,66,2,'EL VARITAL','CENTRO DE REHABILITACION  INTEGRAL (REINTEGRA)'),
 (406012301,2,9,66,24,'CABECERA','CLINICA DEL COLEGIO FELIX OLIVARES'),
 (406012302,2,9,66,24,'CABECERA','CLINICA DEL COLEGIO FRANCISCO MORAZAN'),
 (406012303,2,9,66,24,'CABECERA','CLINICA DEL COLEGIO INSTITUTO DAVID'),
 (406012304,2,9,66,24,'CABECERA','CLINICA DEL I.P.T ARNULFO ARIAS'),
 (406031401,2,6,42,12,'GUAYABAL','P. DE S. DE GUAYABAL 1/'),
 (406040801,2,9,69,9,'CHIRIQUI','C. DE S. CHIRIQUI (SECTOR 10)'),
 (406051401,2,9,70,12,'GUACA','P. DE S. DE GUACA'),
 (406060801,2,9,71,9,'LAS LOMAS','C. DE S. LAS LOMAS (SECTOR 5)'),
 (406061401,2,9,71,12,'LAS LOMAS','P. DE S. QUITEÑO 1/'),
 (406062301,2,9,71,24,'CABECERA','CLINICA DEL COLEGIO VICTORIANO LORENZO'),
 (406070701,2,9,72,8,'BARRIO SAN JOSE','POLICENTRO DE SAN JOSE (SECTOR 3)'),
 (406072301,2,9,72,24,'CABECERA','CLINICA DEL COLEGIO PABLO EMILIO'),
 (406081401,2,9,73,12,'SAN CARLOS','P. DE S. SAN CARLOS 1/'),
 (406081402,2,9,73,12,'SAN CARLOS','P. DE S. SAN CARLITO 1/'),
 (406100401,2,9,75,24,'SAN PABLO VIEJO','HOSPITAL RAFAEL HERNANDEZ'),
 (407010801,2,10,76,9,'DOLEGA','C. DE S. DOLEGA (SECTOR 6)'),
 (407011001,2,10,76,20,'DOLEGA','ULAPS DE DOLEGA'),
 (407011401,2,10,76,12,'LAS CAÑAS','P. DE S. LAS CAÑAS'),
 (407021401,2,10,77,12,'DOS RIOS ARRIBA','P. DE S. DOS RIOS'),
 (407030801,2,10,78,9,'LOS ANASTASIOS','C. DE S. LOS ANASTASIOS'),
 (407041201,2,10,79,11,'POTRERILLOS ARRIBA','S. C. DE S. POTRERILLOS ARRIBA'),
 (407050801,2,10,80,9,'PROTERILLOS ABAJO','C. DE S. POTRERILLOS ABAJO (SEC. 11) '),
 (407061401,2,10,81,12,'ROVIRA ARRIBA','P. DE S. ROVIRA 1/'),
 (407071401,2,10,82,12,'TINAJAS','P. DE S. TINAJAS'),
 (407081201,2,10,83,11,'DOLEGA','S. C. DE S. LOS ALGARROBOS'),
 (408010801,2,11,84,9,'GUALACA','C. DE S. GUALACA (SECTOR 8)'),
 (408041401,2,11,87,12,'PAJA DE SOMBRERO','P. DE S. PAJA DE SOMBRERO 1/'),
 (408051401,2,11,88,12,'MATA RICA (P)','P. DE S. PAJA DE MATA RICA 1/'),
 (408051402,2,11,88,12,'RINCON','P. DE S. DE RINCON 1/'),
 (409010801,2,12,89,9,'REMEDIOS ','C. DE S. REMEDIOS'),
 (409021401,2,12,90,12,'EL NANCITO','P. DE S. EL NANCITO'),
 (409041401,2,12,92,12,'REMEDIOS','P. DE S. DE REMEDIOS 1/'),
 (410010901,2,13,94,10,'RIO SERENO','C. DE S. RIO SERENO'),
 (410021401,2,13,95,12,'BREÑON','P. DE S. BREÑON'),
 (410031201,2,13,96,11,'CAÑAS GORDAS','S. C. DE S. CAÑAS GORDAS'),
 (410031401,2,13,96,12,'CAÑAS GORDAS','P. DE S. BAJO CHIRIQUI'),
 (410041201,2,13,97,11,'MONTE LIRIO','S. C. DE S. MONTE LIRIO'),
 (410051201,2,13,98,11,'PLAZA DE CAISAN','S. C. DE S. CAISAN'),
 (410061402,2,13,99,12,'SANTA CRUZ','P. DE S. PIEDRA CANDELA'),
 (410081401,2,13,101,12,'SANTA CLARA','P. DE S. SANTA CLARA'),
 (411010801,2,14,102,9,'LAS LAJAS','C. DE S. LAS LAJAS'),
 (411021201,2,14,103,11,'JUAY','S. C. DE S. JUAY'),
 (411040801,2,14,104,9,'SAN FELIX','C. DE S. DE SAN FELIX'),
 (411051201,2,14,106,11,'SANTA CRUZ','S. C. DE S. SANTA CRUZ'),
 (412011201,2,15,107,11,'HORCONCITO','S. C. DE S. HORCONCITO'),
 (412021401,2,15,108,12,'BOCA CHICA','P. DE S. BOCA CHICA'),
 (412031201,2,15,109,11,'BOCA DEL MONTE','S. C. DE S. BOCA DEL MONTE'),
 (412031401,2,15,109,12,'SABALO','P. DE S. SABALO'),
 (412040801,2,15,110,9,'SAN JUAN CERRILLOS','C. DE S. SAN JUAN'),
 (412041401,2,15,110,12,'CIENEGUITA','P. DE S. CINEGUITA'),
 (412050801,2,15,111,9,'SAN LORENZO','C. DE S. SAN LORENZO'),
 (413010901,2,16,112,10,'TOLE','C. DE S. M. I. DE TOLE'),
 (413031401,2,16,113,12,'CERRO VIEJO N°1','P. DE S. CERRO VIEJO'),
 (413041401,2,16,118,12,'LLANO CULEBRA','P. DE S. LLANO CULEBRA'),
 (413061401,2,16,114,12,'LAJAS DE TOLE','P. DE S. LAJAS DE TOLE'),
 (413061404,2,16,114,12,'LAJAS DE TOLE','P. DE S. DE GUABINO 1/'),
 (413071401,2,16,115,12,'POTRERO DE CAÑA','P. DE S. POTRERO DE CAÑA'),
 (413081401,2,16,116,12,'QUEBRADA DE PIEDRA','P. DE S. QUEBRADA DE PIEDRA 1/'),
 (413081402,2,16,116,12,'NATA DE TOLE','P. DE S. NATA DE TOLE 1/'),
 (413091401,2,16,120,12,'VELADERO','P. DE S. VELADERO 1/'),
 (413091402,2,8,63,9,'VOLCAN','C. DE S. VOLCAN'),
 (413091403,2,9,69,9,'CHIRIQUI','C. DE S. CHIRIQUI (SECTOR 10)'),
 (413091404,2,9,71,9,'LAS LOMAS','C. DE S. LAS LOMAS (SECTOR 5)'),
 (413091405,2,10,76,9,'DOLEGA','C. DE S. DOLEGA (SECTOR 6)'),
 (413091406,2,14,102,9,'LAS LAJAS','C. DE S. LAS LAJAS'),
 (413091407,2,10,78,9,'LOS ANASTASIOS','C. DE S. LOS ANASTASIOS'),
 (413091408,2,10,80,9,'POTRERILLOS ABAJO','C. DE S. POTRERILLOS ABAJO (SEC. 11)'),
 (413091409,2,11,84,9,'GUALACA','C. DE S. GUALACA (SECTOR 8)'),
 (413091410,2,12,89,9,'REMEDIOS','C. DE S. REMEDIOS'),
 (413091411,2,14,104,9,'SAN FELIX','C. DE S. DE SAN FELIX'),
 (413091412,2,15,110,9,'SAN JUAN','C. DE S. SAN JUAN'),
 (413091413,2,15,111,9,'SAN LORENZO','C. DE S. SAN LORENZO'),
 (501010401,5,28,204,24,'LA PALMA','HOSPITAL SAN JOSE DE LA PALMA'),
 (501011401,5,28,204,12,'MOGUE','P. DE S. MOGUE'),
 (501011402,5,28,204,12,'PUNTA ALEGRE','P. DE S. PUNTA ALEGRE'),
 (501011601,5,28,204,22,'LA PALMA','OFICINA REGIONAL DE DARIEN'),
 (501021401,5,28,205,12,'CAMOGANTI','P. DE S. CAMOGANTI'),
 (501031201,5,28,206,11,'CHEPIGANA','S. C. DE S. CHEPIGANA'),
 (501031401,5,28,206,12,'LA MAREA','P. DE S. LA MAREA'),
 (501040901,5,28,207,10,'GARACHINE','C. DE S. GARACHINE'),
 (501041401,5,28,207,12,'CALLE LARGA','P. DE S. CALLE LARGA'),
 (501041402,5,28,207,12,'RIO DE JESUS','P. DE S. RIO DE JESUS'),
 (501050901,5,28,208,10,'JAQUE','C. DE S. JAQUE'),
 (501051401,5,28,208,12,'BOROQUERA','P. DE S. BIROQUERA'),
 (501061401,5,28,209,12,'PLAYA MUERTO','P. DE S. PLAYA MUERTO'),
 (501061402,5,28,209,12,'PUERTO PIÑA','P. DE S. PUERTO PIÑA'),
 (501071401,5,28,210,12,'BARRIALES','P. DE S. BARRIALES'),
 (501071402,5,28,210,12,'RESERVA','P. DE S. RESERVA'),
 (501071403,5,28,210,12,'RICO CONGO','P. DE S. RICO CONGO'),
 (501081401,5,28,211,12,'ARRETI','P. DE S. ARRETI 1/'),
 (501081402,5,28,211,12,'RIO IGLESIAS','P. DE S. RIO IGLESIAS'),
 (501090901,5,28,212,10,'SAMBU','C. DE S. SAMBU'),
 (501101401,5,28,213,12,'QUINTIN','P. DE S. QUINTIN'),
 (501101402,5,28,213,12,'SETEGANTI','P. DE S. SETEGANTI'),
 (501111401,5,28,214,12,'TAIMATI','P. DE S. TAIMATI'),
 (501121201,5,28,215,11,'TUCUTI','S. C. DE S. TUCUTI'),
 (501121401,5,28,215,12,'MANENE','P. DE S. MANENE'),
 (501131401,5,28,216,12,'EL TIRAO','P. DE S. EL TIRAO'),
 (501141201,5,28,217,11,'CUCUNATI','S. C. DE S. CUCUNATI'),
 (501151201,5,28,219,11,'PLATANILLA','S. C. DE S. PLATANILLA'),
 (501151402,5,28,218,12,'BUENA VISTA','P. DE S. BUENA VISTA 1/'),
 (501160901,5,28,219,10,'SANTA FE','C. DE S. SANTA FE'),
 (501161402,5,28,219,12,'TAMARINDO','P. DE S. TAMARINDO'),
 (501161403,5,28,219,12,'BOCA DE LARA','P. DE S. DE BOCA DE LARA'),
 (501161404,5,28,219,12,'ARIMAE','P. DE S. ARIMAE 1/'),
 (502010501,5,29,220,24,'EL REAL','HOSPITAL EL REAL'),
 (502020901,5,29,221,10,'BOCA DE CUPE','C. DE S. BOCA DE CUPE'),
 (502021401,5,29,223,12,'EL BASAL','P. DE S. EL BASAL'),
 (502031401,5,29,222,12,'PAYA','P. DE S. PAYA'),
 (502051401,5,29,223,12,'PUCURO','P. DE S. PUCURO'),
 (502070501,5,29,225,24,'YAVIZA','HOSPITAL YAVIZA (MANUEL NIETO)'),
 (502071201,5,29,226,11,'CANGLON','S. C. DE S. CANGLON'),
 (502080901,5,29,226,10,'METETI','C. DE S. METETI'),
 (502081401,5,29,226,12,'METETI','P. DE S. METETI'),
 (502091401,5,29,227,12,'WARGANDI','P. DE S. WALA'),
 (502091402,5,29,227,12,'NURRA','P. DE S. NURRA'),
 (601010401,6,30,228,24,'CHITRE','HOSPITAL CECILIO CASTILLERO'),
 (601010402,6,30,230,24,'LLANO BONITO','HOSPITAL EL VIGIA'),
 (601010601,6,30,228,19,'CHITRE','POLICLINICA ROBERTO RAMIREZ DIEGO'),
 (601011501,6,30,228,24,'CHITRE ','CENTRO MEDICO CHITRE'),
 (601012001,6,30,230,7,'LLANO BONITO','CENTRO DE REHABILITACION INTEGRAL (REINTEGRA)'),
 (601020801,6,30,229,9,'LA ARENA','C. DE S. ARENA (J. BERNAL)'),
 (601021101,6,30,229,13,'LA ARENA','CENTRO DE PROMOCION LA ARENA'),
 (601030801,6,30,642,9,'MONAGRILLO','C. DE S. MONAGRILLO'),
 (601031201,6,30,642,11,'BOCA DE PARITA','S. C DE S. BOCA DE PARITA'),
 (601040801,6,30,230,9,'LLANO BONITO','C. DE S. LLANO BONITO'),
 (601050801,6,30,228,9,'ASERRIO','C. DE S. DE CHITRE'),
 (601051601,6,30,228,22,'ASERRIO','OFICINA REGIONAL DE HERRERA'),
 (602010801,6,31,232,9,'LAS MINAS','C. DE S. LAS MINAS'),
 (602020801,6,31,233,9,'CHEPO (P)','C. DE S. CHEPO'),
 (602061201,6,31,237,11,'ROSARIO','S. C DE S. QUEBRADA ROSARIO'),
 (603010801,6,32,239,9,'LOS POZOS','C. DE S. LOS POZOS'),
 (603011001,6,32,239,21,'LOS POZOS','CAPPS LOS POZOS'),
 (603041201,6,32,242,11,'EL CEDRO','S. C DE S. DE EL CEDRO'),
 (603061201,6,32,244,11,'PITALOZA ARRIBA','S. C DE S. LA PITALOZA'),
 (603081201,6,32,246,11,'LAS PIPAS','S. C DE S. LAS PIPAS'),
 (604010501,6,33,248,24,'OCU','HOSPITAL SERGIO NUÑEZ'),
 (604010801,6,33,248,9,'OCU','C. DE S. DE OCU'),
 (604011001,6,33,248,21,'OCU','CAPPS OCU'),
 (604021201,6,33,249,11,'CERRO LARGO','S. C DE S. CERRO LARGO'),
 (604030801,6,33,250,9,'LOS LLANOS','C. DE S. LOS LLANOS'),
 (604041201,6,33,251,11,'LLANO GRANDE','S. C DE S. LLANO GRANDE 1/'),
 (604051201,6,33,252,11,'PEÑAS CHATAS','S. C DE S. PEÑAS CHATAS'),
 (604061201,6,33,253,11,'TIJERAS','S. C DE S. TIJERAS 1/'),
 (605010801,6,34,256,9,'PARITA','C. DE S. PARITA'),
 (605021201,6,34,257,11,'CABUYA','S. C DE S. CABUYA'),
 (605031201,6,34,258,11,'LOS CASTILLO','S. C DE S. LOS CASTILLO'),
 (605051201,6,34,260,11,'PARIS','S. C DE S. PARIS'),
 (605061201,6,34,261,11,'PORTOBELILLO','S. C DE S. PORTOBELILLO'),
 (605071201,6,34,262,11,'POTUGA','S. C DE S. POTUGA'),
 (606010801,6,35,263,9,'PESE','C. DE S. PESE'),
 (606011001,6,35,263,21,'PESE','CAPPS PESE'),
 (606020801,6,35,264,9,'LAS CABRAS','C. DE S. LAS CABRAS'),
 (606031201,6,35,265,11,'EL PAJARO (P)','S. C DE S. EL PAJARO'),
 (606041201,6,35,266,11,'EL BARRERO','S. C DE S. EL BARRERO'),
 (606051201,6,35,267,11,'EL PEDREGOSO','S. C DE S. PEDREGOSO'),
 (606071201,6,35,269,11,'SABANA GRANDE','S. C DE S. SABANA GRANDE'),
 (606080801,6,35,270,9,'RINCON HONDO','C. DE S. RINCON HONDO'),
 (607010801,6,36,271,9,'SANTA MARIA','C. DE S. SANTA MARIA'),
 (607011001,6,36,271,21,'SANTA MARIA','CAPPS SANTA MARIA'),
 (607020801,6,36,272,9,'CHUPAMPA','C. DE S. CHUPAMPA'),
 (607031201,6,36,273,11,'EL RINCON','S. C DE S. EL RINCON'),
 (607041201,6,36,274,11,'LA CRUZ DEL RAYO','S. C DE S. LA CRUZ DEL RAYO 1/'),
 (701010801,7,37,276,9,'GUARARE','C. DE S. GUARARE DR. CARLO UGALDE'),
 (701011001,7,37,276,21,'GUARARE','CAPPS DE GUARARÉ'),
 (701071201,7,37,282,11,'LAS TRANCAS','S. C. DE S. LAS TRANCAS'),
 (702010501,7,38,286,24,'LAS TABLAS','HOSPITAL JOAQUIN P. FRANCO'),
 (702010601,7,38,286,19,'LAS TABLAS','POLICLINICA DR. EMILIO CASTRO'),
 (702031201,7,38,288,11,'BAYANO','S. C. DE S. BAYANO'),
 (702081201,7,38,293,11,'EL PEDREGOSO','S. C. DE S. EL PEDREGOSO'),
 (702091201,7,38,294,11,'LA LAJA','S. C. DE S. LA LAJA'),
 (702110801,7,38,296,9,'LA PALMA','C. DE S. LA PALMA'),
 (702190801,7,38,304,9,'SAN JOSE','C. DE S. SAN JOSE'),
 (702210801,7,38,306,9,'SANTO DOMINGO','C. DE S. STO. DOMINGO'),
 (702230801,7,38,308,9,'VALLE RICO','C. DE S. VALLE RICO'),
 (702241201,7,38,309,11,'VALLERRIQUITO','S. C. DE S. VALLERRIQUITO'),
 (703010601,7,39,310,19,'LA VILLA DE LOS SANTOS','POLICLINICA SAN JUAN DE DIOS'),
 (703031201,7,39,313,11,'LA COLORADA','S. C. DE S. LA COLORADA'),
 (703041201,7,39,314,11,'LA ESPIGADILLA','S. C. DE S. LA ESPIGADILLA'),
 (703061201,7,39,316,11,'LAS GUABAS','S. C. DE S. LAS GUABAS'),
 (703071201,7,39,317,11,'LOS ANGELES','S. C. DE S. LOS ANGELES'),
 (703081201,7,39,318,11,'EL GUAYABAL','S. C. DE S. EL GUAYABAL'),
 (703091201,7,39,319,11,'LLANO LARGO','S. C. DE S. LLANO LARGO'),
 (703100801,7,39,320,9,'SABANA GRANDE','C. DE S. SABANA GRANDE'),
 (703110401,7,39,322,24,'SANTA ANA','HOSPITAL REGIONAL ANITA MORENO'),
 (703111601,7,39,322,22,'SANTA ANA','OFICINA REGIONAL DE LOS SANTOS'),
 (704010501,7,40,326,24,'MACARACAS','HOSPITAL LUIS H. MORENO'),
 (704011001,7,40,326,21,'MACARACAS','CAPPS DE MACARACAS'),
 (704021201,7,40,327,11,'BAHIA HONDA','S. C. DE S. BAHIA HONDA'),
 (704031201,7,40,328,11,'BAJO GUERA','S. C. DE S. BAJO GUERA 1/'),
 (704051201,7,40,330,11,'CHUPA','S. C. DE S. CHUPA'),
 (704081201,7,40,333,11,'LA MESA','S. C. DE S. LA MESA'),
 (704100801,7,40,334,9,'LLANO DE PIEDRA','C. DE S. LLANO DE PIEDRA'),
 (704110801,7,39,322,9,'SANTA ANA ARRIBA','C. DE S. SANTA ANA'),
 (705010801,7,41,337,9,'PEDASI','C. DE S. PEDASI, ENRIQUE MOSCOSO'),
 (705021201,7,41,338,11,'LOS ASIENTOS','S. C. DE S. LOS ASIENTOS'),
 (705041201,7,41,340,11,'BUENOS AIRES','S. C. DE S. BUENOS AIRES 1/'),
 (706010801,7,42,342,9,'POCRI','C. DE S. POCRI'),
 (706021201,7,42,343,11,'EL CAÑAFISTULO','S. C. DE S. EL CAÑAFISTULO'),
 (706031201,7,42,344,11,'LAJAMINA','S. C. DE S. LAJAMINA'),
 (706050801,7,42,346,9,'PARITILLA','C. DE S. PARITILLA'),
 (707010501,7,43,347,24,'TONOSI','HOSPITAL TONOSI'),
 (707011001,7,43,347,21,'TONOSI','CAPPS DE TONOSI'),
 (707011201,7,43,347,11,'BUCARO','S. C. DE S. BUCARO'),
 (707021201,7,43,348,11,'ALTOS DE GUERRA','S. C. DE S. ALTO DE GUERRA'),
 (707100801,7,43,356,9,'CAMBUTAL','C. DE S. DE CAMBUTAL'),
 (707111201,7,43,357,11,'ISLA DE CAÑAS','S. C. DE S. ISLA DE CAÑAS'),
 (802010801,8,45,366,9,'BALBOA','C. DE S. SAN MIGUEL (BALBOA)'),
 (802021401,8,45,367,12,'LA ENSENADA','P. DE S. LA ENSENADA 1/'),
 (802031401,8,45,368,12,'LA ESMERALDA','P. DE S. LA ESMERALDA'),
 (802041401,8,45,369,12,'LA GUINEA','P. DE S. LA GUINEA'),
 (802051401,8,45,370,12,'PEDRO GONZALES','P. DE S. PEDRO GONZALEZ'),
 (802061401,8,45,371,12,'SABOGA','P. DE S. SABOGA'),
 (805010401,8,48,396,24,'CHEPO','HOSPITAL DE CHEPO'),
 (805010701,8,48,396,8,'CHEPO','POLICENTRO DE SALUD DE CHEPO'),
 (805011401,8,48,396,12,'CALOBRE ABAJO','P. DE S. CALOBRE DE SAN JUDAS'),
 (805011402,8,48,396,12,'EL TIGRE','P. DE S. EL TIGRE'),
 (805011403,8,48,396,12,'JESUS MARIA','P. DE S. JESUS MARIA'),
 (805011405,8,48,396,12,'LIMONADA','P. DE S. LA LIMONADA'),
 (805011406,8,48,396,12,'TRAPICHE ARRIBA','P. DE S. TRAPICHE ARRIBA 1/'),
 (805011407,8,48,396,12,'SAN JUDAS','P. DE S. DE SAN JUDAS'),
 (805011601,8,48,396,22,'CHEPO','OFICINA REGIONAL DE PANAMA ESTE'),
 (805020601,8,48,397,19,'CAÑITAS','POLICLINICA CAÑITAS'),
 (805021401,8,48,397,12,'BUENOS AIRES','P. DE S. BUENOS AIRES'),
 (805021402,8,48,397,12,'CAÑITAS','P. DE S. DE CAÑITAS 1/'),
 (805021403,8,48,397,12,'NAZARENO','P. DE S. DE NAZARENO 1/'),
 (805021404,8,48,397,12,'JUAN BAÑON','P. DE S. DE JUAN BAÑON 1/'),
 (805021405,8,48,397,12,'CAÑAZAS','P. DE S. DE CAÑAZAS 1/'),
 (805031401,8,48,398,12,'CHEPILLO','P. DE S. CHEPILLO 1/'),
 (805040806,8,48,399,9,'LOMA DE NARANJO','C. DE S. LOMA DE NARANJO'),
 (805041403,8,48,399,12,'EL LLANO','P. DE S. EL LLANO'),
 (805041404,8,48,399,12,'PAVITA','P. DE S. PAVITA DE MAJÉ'),
 (805041407,8,48,399,12,'BUENA VISTA','P. DE S. BUENA VISTA 1/'),
 (805041411,8,48,399,12,'TRES QUEBRADAS','P. DE S. TRES QUEBRADAS'),
 (805050801,8,48,400,9,'MARGARITAS','C. DE S. MARGARITAS'),
 (805051401,8,48,400,12,'MAMONI ARRIBA','P. DE S. ALTO DE MAMONI'),
 (805051402,8,48,400,12,'CHARARE','P. DE S. CHARARE'),
 (805051403,8,48,400,12,'ZAHINA','P. DE S. ZAHINA'),
 (805061401,8,48,401,12,'CHININA ARRIBA','P. DE S. CHININA'),
 (805061402,8,48,401,12,'LAGARTO','P. DE S. LAGARTO 1/'),
 (805061403,8,48,401,12,'MARTINAMBO ABAJO','P. DE S. MARTINAMBO'),
 (805061404,8,48,401,12,'UNION HERRERANA','P. DE S. UNION HERRERANA 1/'),
 (805061405,8,48,401,12,'EL VALLE DE LA UNION','P. DE S. VALLE DE LA UNION 1/'),
 (805071401,8,48,402,12,'IPETI CHOCO','P. DE S. IPETI CHOCOE 1/'),
 (805071402,8,48,402,12,'IPETI KUNA','P. DE S. IPETI KUNA'),
 (805071403,8,48,402,12,'PIRIATI','P. DE S. PIRIATI'),
 (805071404,8,48,402,12,'IPETI EMBERA','P. DE S. IPETI EMBERA'),
 (805071405,8,48,402,12,'PINTUPO','P. DE S. PINTUPO 1/'),
 (805071406,8,48,402,12,'AKUA YALA','P. DE S. AKUA YALA'),
 (805080801,8,48,403,9,'TORTI','C. DE S. TORTI'),
 (805081401,8,48,403,12,'AGUA FRIA','P. DE S. DE AGUA FRIA N° 1 1/'),
 (805081402,8,48,403,12,'HIGUERONAL','P. DE S. HIGUERONAL'),
 (805081404,8,48,403,12,'IPETI COLONO','P. DE S. IPETI COLONO 1/'),
 (805081405,8,48,403,12,'AMBROYA','P. DE S. DE AMBROYA 1/'),
 (806010801,8,49,404,9,'CHIMAN','C. DE S. CHIMAN'),
 (806011401,8,49,404,12,'MAJE','P. DE S. MAJE'),
 (806021401,8,49,405,12,'BRUJAS','P. DE S. BRUJAS'),
 (806031401,8,49,406,12,'GONZALO VASQUEZ','P. DE S. GONZALO VASQUEZ'),
 (806041401,8,49,407,12,'OQUENDO','P. DE S. OQUENDO'),
 (806041402,8,49,407,12,'PASIGA','P. DE S. RIO PASIGA 1/'),
 (806050801,8,49,408,9,'UNION SANTEÑA','C. DE S. UNION SANTEÑA'),
 (806051401,8,49,408,12,'RIO HONDO','P. DE S. RIO HONDO'),
 (806051402,8,49,408,12,'UNION SANTEÑA','P. DE S. RIO PLATANARES'),
 (808170803,8,51,441,9,'PACORA','C. DE S. PACORA'),
 (808170807,8,51,441,9,'PACORA','C. DE S. VIRGEN DE LAS MERCEDEZ'),
 (808171401,8,51,441,12,'ALTOS DE PACORA','P. DE S. ALTO DE PACORA'),
 (808180801,8,51,448,9,'SAN MIGUEL','C. DE S. SAN MIGUEL'),
 (808181401,8,51,448,12,'LA CHAPA','P. DE S. LA CHAPA 1/'),
 (808181402,8,51,448,12,'LA MESA','P. DE S. LA MESA 1/'),
 (808181403,8,51,448,12,'RIO INDIO','P. DE S. DE RIO INDIO 1/'),
 (808210802,8,51,427,9,'CERRO AZUL','C. DE S. CERRO AZUL'),
 (1101011202,11,68,579,11,'UNION CHOCOE','S. C. DE S. UNION CHOCOE'),
 (1101011401,11,68,579,12,'CAPETUIRA','P. DE S. CAPETUIRA'),
 (1101011403,11,68,579,12,'VISTA ALEGRE','P. DE S. VISTA ALEGRE'),
 (1101021203,11,68,580,11,'LAJAS BLANCAS','S. C. DE S. LAJAS BLANCAS'),
 (1101021401,11,68,580,12,'BAJO CHIQUITO','P. DE S. BAJO CHIQUITO'),
 (1101021402,11,68,580,12,'EL SALTO','P. DE S. EL SALTO'),
 (1101021404,11,68,580,12,'MARROGANTI','P. DE S. MARROGANTI'),
 (1101021405,11,68,580,12,'CANAAN','P. DE S. CANAAN'),
 (1101021406,11,68,580,12,'PEÑA BIJAGUAL','P. DE S. PEÑA BIJAGUAL'),
 (1101021407,11,68,580,12,'LA CALETA','P. DE S. BELLA AMOR Y CALETA'),
 (1101031401,11,68,581,12,'COMUN','P. DE S. COMUN'),
 (1101031402,11,68,581,12,'COROZAL','P. DE S. COROZAL'),
 (1101031403,11,68,581,12,'EL TIGRE','P. DE S. EL TIGRE'),
 (1101031404,11,68,581,12,'PUNTA GRANDE','P. DE S. PUNTA GRANDE'),
 (1102011401,11,69,583,12,'BAYAMON','P. DE S. BAYAMON'),
 (1102011402,11,69,583,12,'BOCA DE TRAMPA','P. DE S. BOCA DE TRAMPA'),
 (1102021401,11,69,582,12,'JINGURUNDO','P. DE S. JINGURUNDO'),
 (1102021402,11,69,582,12,'PAVARANDO','P. DE S. PAVARANDO 1/');
/*!40000 ALTER TABLE `instituciones` ENABLE KEYS */;


--
-- Definition of table `mantenimientos`
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mantenimientos`
--

/*!40000 ALTER TABLE `mantenimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mantenimientos` ENABLE KEYS */;


--
-- Definition of table `marcadores`
--

DROP TABLE IF EXISTS `marcadores`;
CREATE TABLE `marcadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marcador` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marcadores`
--

/*!40000 ALTER TABLE `marcadores` DISABLE KEYS */;
INSERT INTO `marcadores` (`id`,`marcador`) VALUES 
 (1,'AFP'),
 (2,'UE3'),
 (3,'INHIBIN A'),
 (4,'HCG'),
 (5,'PAPPA'),
 (6,'TN'),
 (7,'HCG TOTAL');
/*!40000 ALTER TABLE `marcadores` ENABLE KEYS */;


--
-- Definition of table `marcadores_citas`
--

DROP TABLE IF EXISTS `marcadores_citas`;
CREATE TABLE `marcadores_citas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cita` int(10) unsigned NOT NULL DEFAULT '0',
  `id_marcador` int(10) unsigned NOT NULL DEFAULT '0',
  `id_metodologia` int(10) unsigned NOT NULL DEFAULT '0',
  `valor` double NOT NULL DEFAULT '0',
  `created_at` varchar(45) NOT NULL DEFAULT '',
  `updated_at` varchar(45) NOT NULL DEFAULT '',
  `mom` double NOT NULL DEFAULT '0',
  `mom_corr1` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marcadores_citas`
--

/*!40000 ALTER TABLE `marcadores_citas` DISABLE KEYS */;
INSERT INTO `marcadores_citas` (`id`,`id_cita`,`id_marcador`,`id_metodologia`,`valor`,`created_at`,`updated_at`,`mom`,`mom_corr1`) VALUES 
 (1,1,1,2,1,'2014-06-04 18:46:56','2014-06-10 19:46:16',1,133.86880856760376),
 (2,1,2,2,2,'2014-06-04 18:46:56','2014-06-10 19:46:16',1,380.71065989848),
 (3,1,3,1,3,'2014-06-04 18:46:56','2014-06-10 19:46:16',1,0),
 (4,1,4,1,4,'2014-06-04 18:46:56','2014-06-10 19:46:16',1,129.81393336218),
 (5,1,5,1,5,'2014-06-04 18:46:56','2014-06-10 19:46:17',1,0),
 (6,1,6,2,6,'2014-06-04 18:46:56','2014-06-10 19:46:17',1,0),
 (7,1,7,1,7,'2014-06-05 01:37:19','2014-06-10 19:46:17',1,0);
/*!40000 ALTER TABLE `marcadores_citas` ENABLE KEYS */;


--
-- Definition of table `mediana_marcadores`
--

DROP TABLE IF EXISTS `mediana_marcadores`;
CREATE TABLE `mediana_marcadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_marcador` int(10) unsigned NOT NULL,
  `mediana_marcador` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mediana_marcadores`
--

/*!40000 ALTER TABLE `mediana_marcadores` DISABLE KEYS */;
INSERT INTO `mediana_marcadores` (`id`,`id_marcador`,`mediana_marcador`) VALUES 
 (1,1,1),
 (2,2,2),
 (3,3,3),
 (4,4,4),
 (5,5,5),
 (6,6,6),
 (7,7,7);
/*!40000 ALTER TABLE `mediana_marcadores` ENABLE KEYS */;


--
-- Definition of table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(45) NOT NULL DEFAULT '',
  `primer_nombre` varchar(45) NOT NULL DEFAULT '',
  `segundo_nombre` varchar(45) NOT NULL DEFAULT '',
  `apellido_paterno` varchar(45) NOT NULL DEFAULT '',
  `apellido_materno` varchar(45) NOT NULL DEFAULT '',
  `sexo` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `id_especialidades_medicas` int(10) unsigned NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `extension` varchar(45) NOT NULL,
  `id_nivel` int(10) unsigned NOT NULL,
  `id_ubicacion` int(10) unsigned NOT NULL,
  `observacion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicos`
--

/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`id`,`cedula`,`primer_nombre`,`segundo_nombre`,`apellido_paterno`,`apellido_materno`,`sexo`,`created_at`,`updated_at`,`id_especialidades_medicas`,`telefono`,`celular`,`email`,`foto`,`extension`,`id_nivel`,`id_ubicacion`,`observacion`) VALUES 
 (3,'4-759-372','Edgardo','Joel','Pitti','Sanchez',1,'2014-05-15 20:47:24','2014-06-13 19:07:53',5,'75464234','645678789','ed_joel28@hortmail.com','m_3.jpg','',2,1,'Observacion Edgardo'),
 (4,'4-760-768','Luis','Agustin','Mendoza','Pitti',1,'2014-06-05 01:50:28','2014-06-13 21:07:16',25,'7743095','60083613','ed_joel28@hortmail.com','m_4.jpg','69',1,1,''),
 (5,'4-1241-1231','jose','mario','perez','gutierrez',1,'2014-06-05 19:30:51','2014-06-13 19:34:40',25,'764-2487','6154-4789','josegutierrez@hotmail.com','m_5.jpg','711',1,1,'');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;


--
-- Definition of table `metodologia`
--

DROP TABLE IF EXISTS `metodologia`;
CREATE TABLE `metodologia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `metodologia` varchar(45) NOT NULL,
  `observacion` text NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metodologia`
--

/*!40000 ALTER TABLE `metodologia` DISABLE KEYS */;
INSERT INTO `metodologia` (`id`,`metodologia`,`observacion`,`created_at`,`updated_at`) VALUES 
 (1,'RIA','','',''),
 (2,'ELISA','','','');
/*!40000 ALTER TABLE `metodologia` ENABLE KEYS */;


--
-- Definition of table `nacionalidades`
--

DROP TABLE IF EXISTS `nacionalidades`;
CREATE TABLE `nacionalidades` (
  `id_nacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidad` varchar(130) NOT NULL DEFAULT 'POR DEFINIR',
  PRIMARY KEY (`id_nacionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nacionalidades`
--

/*!40000 ALTER TABLE `nacionalidades` DISABLE KEYS */;
INSERT INTO `nacionalidades` (`id_nacionalidad`,`nacionalidad`) VALUES 
 (1,'ALBANESA'),
 (2,'ALEMANA'),
 (3,'ARGELINA'),
 (4,'ARGENTINA'),
 (5,'ARMENIA'),
 (6,'AUSTRALIANA'),
 (7,'AUSTRÍACA'),
 (8,'BELGA'),
 (9,'BIELORRUSA'),
 (10,'BOLIVIANA'),
 (11,'BOSNIA'),
 (12,'BRASILEÑA'),
 (13,'BÚLGARA'),
 (14,'CANADIENSE'),
 (15,'CHECA'),
 (16,'CHILENA'),
 (17,'CHINA'),
 (18,'CHIPRIOTA'),
 (19,'COLOMBIANA'),
 (20,'COSTARRICENSE'),
 (21,'CUBANA'),
 (22,'DANESA'),
 (23,'DOMINICANA'),
 (24,'ECUATOGUINEANA'),
 (25,'ECUATORIANA'),
 (26,'ESCOCESA'),
 (27,'ESLOVACA'),
 (28,'ESLOVENA'),
 (29,'ESPAÑOLA'),
 (30,'ESTADOUNIDENSE'),
 (31,'ESTONIA'),
 (32,'FILIPINA'),
 (33,'FINLANDESA'),
 (34,'FRANCESA'),
 (35,'GRIEGA'),
 (36,'GUATEMALTECA'),
 (37,'HAITIANA'),
 (38,'HINDÚ'),
 (39,'HOLANDESA'),
 (40,'HONDUREÑA'),
 (41,'HÚNGARA'),
 (42,'INDONESIA'),
 (43,'INGLESA'),
 (44,'IRLANDESA'),
 (45,'ISRAELÍ'),
 (46,'ITALIANA'),
 (47,'JAMAIQUINA'),
 (48,'JAPONESA'),
 (49,'LETONA'),
 (50,'LIBANESA'),
 (51,'LITUANA'),
 (52,'LUXEMBURGUESA'),
 (53,'MALTESA'),
 (54,'MEXICANA'),
 (55,'MOLDAVA'),
 (56,'MONEGASCA'),
 (57,'MONTENEGRINA'),
 (58,'NEOZELANDESA'),
 (59,'NICARAGÜENSE'),
 (60,'NORCOREANA'),
 (61,'NORUEGA'),
 (62,'PANAMEÑA'),
 (63,'PARAGUAYA'),
 (64,'PERUANA'),
 (65,'POLACA'),
 (66,'PORTUGUESA'),
 (67,'PUERTORRIQUEÑA'),
 (68,'RUMANA'),
 (69,'RUSA'),
 (70,'SAHARAUI'),
 (71,'SALVADOREÑA'),
 (72,'SERBIA'),
 (73,'SIRIA'),
 (74,'SUDAFRICANA'),
 (75,'SUECA'),
 (76,'SUIZA'),
 (77,'SURCOREANA'),
 (78,'TURCA'),
 (79,'UCRANIANA'),
 (80,'URUGUAYA'),
 (81,'VENEZOLANA'),
 (82,'VIETNAMITA');
/*!40000 ALTER TABLE `nacionalidades` ENABLE KEYS */;


--
-- Definition of table `niveles`
--

DROP TABLE IF EXISTS `niveles`;
CREATE TABLE `niveles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveles`
--

/*!40000 ALTER TABLE `niveles` DISABLE KEYS */;
INSERT INTO `niveles` (`id`,`nivel`,`created_at`,`updated_at`) VALUES 
 (1,'PLANTA BAJA','',''),
 (2,'PRIMER PISO','','');
/*!40000 ALTER TABLE `niveles` ENABLE KEYS */;


--
-- Definition of table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(45) NOT NULL DEFAULT '',
  `primer_nombre` varchar(45) NOT NULL DEFAULT '',
  `segundo_nombre` varchar(45) NOT NULL DEFAULT '',
  `apellido_paterno` varchar(45) NOT NULL DEFAULT '',
  `apellido_materno` varchar(45) NOT NULL DEFAULT '',
  `sexo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `fecha_nacimiento` varchar(45) NOT NULL DEFAULT '',
  `lugar_nacimiento` varchar(45) NOT NULL DEFAULT '',
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL DEFAULT '',
  `telefono` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `id_provincia_nacimiento` int(10) unsigned NOT NULL DEFAULT '0',
  `id_distrito_nacimiento` int(10) unsigned NOT NULL DEFAULT '0',
  `id_corregimiento_nacimiento` int(10) unsigned NOT NULL DEFAULT '0',
  `id_nacionalidad` int(10) unsigned NOT NULL DEFAULT '0',
  `id_etnia` int(10) unsigned NOT NULL DEFAULT '1',
  `id_tipo_sangre` int(10) unsigned NOT NULL DEFAULT '0',
  `diabetes` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `id_raza` int(10) unsigned NOT NULL DEFAULT '0',
  `id_provincia_residencia` int(10) unsigned NOT NULL,
  `id_distrito_residencia` int(10) unsigned NOT NULL,
  `id_corregimiento_residencia` int(10) unsigned NOT NULL,
  `lugar_residencia` text NOT NULL,
  `fuma` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `embarazo_trisomia` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacientes`
--

/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`,`cedula`,`primer_nombre`,`segundo_nombre`,`apellido_paterno`,`apellido_materno`,`sexo`,`fecha_nacimiento`,`lugar_nacimiento`,`created_at`,`updated_at`,`celular`,`telefono`,`email`,`id_provincia_nacimiento`,`id_distrito_nacimiento`,`id_corregimiento_nacimiento`,`id_nacionalidad`,`id_etnia`,`id_tipo_sangre`,`diabetes`,`id_raza`,`id_provincia_residencia`,`id_distrito_residencia`,`id_corregimiento_residencia`,`lugar_residencia`,`fuma`,`embarazo_trisomia`,`foto`) VALUES 
 (1,'4-769-466','Sarah','Stephanie','Pimentel','Quiel',0,'1993-11-06','Pedregal','2014-05-12 22:33:03','2014-06-10 19:40:41','60083613','7743095','saritah_0611@hotmail.com',2,9,72,62,1,1,0,1,2,9,72,'16 de Diciembre',0,0,'p_1.png'),
 (2,'4-205-369','Fany','Estela','Sanchez','Perez',0,'1969-06-01','David','2014-05-21 19:27:54','2014-06-03 19:21:44','69234484','7743095','fany_sanchez@hotmail.com',2,9,66,62,1,1,0,3,2,9,66,'San Cristobal',0,0,'p_2.jpg'),
 (3,'4-789-333','Ariadne','Leovelia','Pitti','Sanchez',0,'1995-12-29','Gualaca','2014-06-03 03:42:42','2014-06-03 03:42:42','67149299','7743095','ariadne_29@hotmail.com',2,11,86,62,1,3,0,3,3,21,149,'El Cope',0,0,NULL);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;


--
-- Definition of table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL DEFAULT '0',
  `provincia` varchar(20) NOT NULL DEFAULT 'POR DEFINIR',
  `latitud` varchar(45) NOT NULL,
  `longitud` varchar(45) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provincias`
--

/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` (`id_provincia`,`provincia`,`latitud`,`longitud`) VALUES 
 (1,'BOCAS DEL TORO','9.34055','-82.24055'),
 (2,'CHIRIQUÍ','8.43781','-82.28204'),
 (3,'COCLÉ','8.57432','-80.43275'),
 (4,'COLÓN','9.35998','-79.92634'),
 (5,'DARIÉN','8.07837','-77.84287'),
 (6,'HERRERA','7.82251','-80.67948'),
 (7,'LOS SANTOS','7.61501','-80.36428'),
 (8,'PANAMÁ','9.02523','-79.44292'),
 (9,'VERAGUAS','8.04259','-81.25017'),
 (10,'KUNA YALA','9.17797','-78.32330'),
 (11,'COMARCA EMBERA','8.18295','-77.79184'),
 (12,'COMARCA NGÄBE-BUGLÉ','8.72144','-81.78672');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;


--
-- Definition of table `razas`
--

DROP TABLE IF EXISTS `razas`;
CREATE TABLE `razas` (
  `id_razas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `raza` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id_razas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `razas`
--

/*!40000 ALTER TABLE `razas` DISABLE KEYS */;
INSERT INTO `razas` (`id_razas`,`raza`,`created_at`,`updated_at`) VALUES 
 (1,'BLANCO','',''),
 (2,'NEGRO','',''),
 (3,'HISPÁNICO','',''),
 (4,'OTROS','',''),
 (5,'INDIGENA','','');
/*!40000 ALTER TABLE `razas` ENABLE KEYS */;


--
-- Definition of table `tipo_instituciones`
--

DROP TABLE IF EXISTS `tipo_instituciones`;
CREATE TABLE `tipo_instituciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_institucion` varchar(60) NOT NULL DEFAULT 'POR DEFINIR',
  `departamento` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_instituciones`
--

/*!40000 ALTER TABLE `tipo_instituciones` DISABLE KEYS */;
INSERT INTO `tipo_instituciones` (`id`,`tipo_institucion`,`departamento`) VALUES 
 (1,'HOSPITALES NACIONALES ESPECIAL','MINSA'),
 (2,'INSTITUTOS ESPECIALIZADOS','MINSA'),
 (3,'HOSPITALES DE REGIONALES','MINSA'),
 (4,'HOSPITAL DE REGIONAL INTEGRADO','MINSA'),
 (5,'HOSPITAL NACIONAL LARGA ESTANC','MINSA'),
 (6,'HOSPITALES DE AREAS','MINSA'),
 (7,'CENTROS REINTEGRA','MINSA'),
 (8,'POLICENTROS','MINSA'),
 (9,'CENTROS DE SALUD SIN CAMA','MINSA'),
 (10,'CENTROS DE SALUD CON CAMA','MINSA'),
 (11,'SUB-CENTROS DE SALUD','MINSA'),
 (12,'PUESTOS DE SALUD','MINSA'),
 (13,'CENTRO DE PROMOCION','MINSA'),
 (14,'HOSPITALES NACIONALES ESPECIAL','CSS'),
 (15,'HOSPITAL NACIONAL HOGAR DE LA ','CSS'),
 (16,'HOSPITALES DE REGIONALES','CSS'),
 (17,'HOSPITAL SECTORIAL','CSS'),
 (18,'HOSPITALES DE AREAS','CSS'),
 (19,'POLICLINICAS','CSS'),
 (20,'ULAPS','CSS'),
 (21,'CAPPS','CSS'),
 (22,'SEDE REGIONAL','MINSA'),
 (23,'CENTRO DE SALUD SIN CAMA','CSS'),
 (24,'OTROS','OTROS');
/*!40000 ALTER TABLE `tipo_instituciones` ENABLE KEYS */;


--
-- Definition of table `tipos_activos`
--

DROP TABLE IF EXISTS `tipos_activos`;
CREATE TABLE `tipos_activos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_activos`
--

/*!40000 ALTER TABLE `tipos_activos` DISABLE KEYS */;
INSERT INTO `tipos_activos` (`id`,`tipo`,`descripcion`) VALUES 
 (1,'Cama','Camas');
/*!40000 ALTER TABLE `tipos_activos` ENABLE KEYS */;


--
-- Definition of table `tipos_sanguineos`
--

DROP TABLE IF EXISTS `tipos_sanguineos`;
CREATE TABLE `tipos_sanguineos` (
  `id_tipo_sanguineo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_sangre` varchar(4) NOT NULL DEFAULT 'N/A',
  PRIMARY KEY (`id_tipo_sanguineo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipos_sanguineos`
--

/*!40000 ALTER TABLE `tipos_sanguineos` DISABLE KEYS */;
INSERT INTO `tipos_sanguineos` (`id_tipo_sanguineo`,`tipo_sangre`) VALUES 
 (1,'O+'),
 (2,'O-'),
 (3,'A+'),
 (4,'A-'),
 (5,'B+'),
 (6,'B-'),
 (7,'AB+'),
 (8,'AB-');
/*!40000 ALTER TABLE `tipos_sanguineos` ENABLE KEYS */;


--
-- Definition of table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE `ubicacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ubicacion`
--

/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` (`id`,`ubicacion`,`created_at`,`updated_at`) VALUES 
 (1,'TORRE A','','');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;