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
  CONSTRAINT `corregimientos_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`ID_PROVINCIA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `corregimientos_ibfk_2` FOREIGN KEY (`id_distrito`) REFERENCES `distritos` (`ID_DISTRITO`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corregimientos`
--

/*!40000 ALTER TABLE `corregimientos` DISABLE KEYS */;
INSERT INTO `corregimientos` (`id_provincia`,`id_distrito`,`id_corregimiento`,`corregimiento`,`latitud`,`longitud`) VALUES 
 (1,1,1,'BOCAS DEL TORO','9.33333','-82.25000'),
 (1,1,2,'BASTIMENTOS','9.35000','-82-20000'),
 (1,1,3,'CAUCHERO','9.15000','-82.26667'),
 (1,1,4,'PUNTA LAUREL','9.13333','-82.13333'),
 (1,1,5,'TIERRA OSCURA','9.18333','-82.28333'),
 (1,2,6,'CHANGUINOLA','9.43333','-82.51667'),
 (1,2,7,'ALMIRANTE','9.30000','-82.40000'),
 (1,2,8,'GUABITO','8.85000','-82.18333'),
 (1,2,9,'EL TERIBE','9.36667','-82.53333'),
 (1,2,10,'VALLE DEL RISCO','9.23333','-82.43333'),
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
 (2,5,37,'RODOLFO AGUILAR DELGADO','',''),
 (2,6,38,'BOQUERON','8.50000','-82.56667'),
 (2,6,39,'BÁGALA','8.46667','-82.53333'),
 (2,6,40,'CORDILLERA','8.50624','-82.57121'),
 (2,6,41,'GUABAL','8.58333','-82.53333'),
 (2,6,42,'GUAYABAL','8.33333','-82.03333'),
 (2,6,43,'PARAISO','8.50624','-82.57121'),
 (2,6,44,'PEDREGAL','',''),
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
 (2,16,119,'JUSTO FIDEL PALACIOS','',''),
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
 (3,18,135,'CABALLERO','',''),
 (3,19,136,'LA PINTADA','',''),
 (3,19,137,'EL HARINO','',''),
 (3,19,138,'EL POTRERO','',''),
 (3,19,139,'LLANO GRANDE','',''),
 (3,19,140,'PIEDRAS GORDAS','',''),
 (3,19,141,'LAS LOMAS','',''),
 (3,20,142,'NATÁ','',''),
 (3,20,143,'CAPELLANIA','',''),
 (3,20,144,'EL CAÑO','',''),
 (3,20,145,'GUZMAN','',''),
 (3,20,146,'LAS HUACAS','',''),
 (3,20,147,'TOZA','',''),
 (3,21,148,'OLÁ','',''),
 (3,21,149,'EL COPÉ','',''),
 (3,21,150,'EL PALMAR','',''),
 (3,21,151,'EL PICACHO','',''),
 (3,21,152,'LA PAVA','',''),
 (3,22,153,'PENONOMÉ','',''),
 (3,22,154,'CAÑAVERAL','',''),
 (3,22,155,'COCLÉ','',''),
 (3,22,156,'CHIGUIRÍ ARRIBA','',''),
 (3,22,157,'EL COCO','',''),
 (3,22,158,'PAJONAL','',''),
 (3,22,159,'RIO GRANDE','',''),
 (3,22,160,'RIO INDIO','',''),
 (3,22,161,'TOABRE','',''),
 (3,22,162,'TULU','',''),
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
  PRIMARY KEY (`id_distrito`,`id_provincia`),
  KEY `ID_PROVINCIA` (`id_provincia`) USING BTREE,
  CONSTRAINT `distritos_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`ID_PROVINCIA`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distritos`
--

/*!40000 ALTER TABLE `distritos` DISABLE KEYS */;
INSERT INTO `distritos` (`id_provincia`,`id_distrito`,`distrito`) VALUES 
 (1,1,'BOCAS DEL TORO'),
 (1,2,'CHANGUINOLA'),
 (1,3,'CHIRIQUÍ GRANDE'),
 (2,4,'ALANJE'),
 (2,5,'BARÚ'),
 (2,6,'BOQUERÓN'),
 (2,7,'BOQUETE'),
 (2,8,'BUGABA'),
 (2,9,'SAN JOSÉ DE DAVID'),
 (2,10,'DOLEGA'),
 (2,11,'GUALACA'),
 (2,12,'REMEDIOS'),
 (2,13,'RENACIMIENTO'),
 (2,14,'SAN FÉLIX'),
 (2,15,'SAN LORENZO'),
 (2,16,'TOLÉ'),
 (3,17,'AGUADULCE'),
 (3,18,'ANTÓN'),
 (3,19,'LA PINTADA'),
 (3,20,'NATÁ'),
 (3,21,'OLÁ'),
 (3,22,'PENONOMÉ'),
 (4,23,'COLÓN'),
 (4,24,'CHAGRES'),
 (4,25,'DONOSO'),
 (4,26,'PORTOBELO'),
 (4,27,'SANTA ISABÉL'),
 (5,28,'CHEPIGANA'),
 (5,29,'PINOGANA'),
 (6,30,'CHITRE'),
 (6,31,'LAS MINAS'),
 (6,32,'LOS POZOS'),
 (6,33,'OCÚ'),
 (6,34,'PARITA'),
 (6,35,'PESÉ'),
 (6,36,'SANTA MARÍA'),
 (7,37,'GUARARÉ'),
 (7,38,'LAS TABLAS'),
 (7,39,'LOS SANTOS'),
 (7,40,'MACARACAS'),
 (7,41,'PEDASÍ'),
 (7,42,'POCRÍ'),
 (7,43,'TONOSÍ'),
 (8,44,'ARRAIJÁN'),
 (8,45,'BALBOA'),
 (8,46,'CAPIRA'),
 (8,47,'CHAME'),
 (8,48,'CHEPO'),
 (8,49,'CHIMAN'),
 (8,50,'LA CHORRERA'),
 (8,51,'PANAMÁ'),
 (8,52,'SAN CARLOS'),
 (8,53,'SAN MIGUELITO'),
 (8,54,'TABOGA'),
 (9,55,'ATALAYA'),
 (9,56,'CALOBRE'),
 (9,57,'CAÑAZAS'),
 (9,58,'LA MESA'),
 (9,59,'LAS PALMAS'),
 (9,60,'MARIATO'),
 (9,61,'MONTIJO'),
 (9,62,'RÍO DE JESÚS'),
 (9,63,'SAN FRANCISCO'),
 (9,64,'SANTA FÉ'),
 (9,65,'SANTIAGO'),
 (9,66,'SONÁ'),
 (10,67,'KUNA YALA'),
 (11,68,'CÉMACO'),
 (11,69,'SAMBÚ'),
 (12,70,'KANKINTÚ'),
 (12,71,'KUSAPIN'),
 (12,72,'BESIKÓ'),
 (12,73,'MIRONÓ'),
 (12,74,'NOLE DÜIMA'),
 (12,75,'MÜNA'),
 (12,76,'ÑÜRÜM');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicos`
--

/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`id`,`cedula`,`primer_nombre`,`segundo_nombre`,`apellido_paterno`,`apellido_materno`,`sexo`,`created_at`,`updated_at`,`id_especialidades_medicas`,`telefono`,`celular`,`email`) VALUES 
 (3,'4-759-372','Edgardo','','Pitti','',1,'2014-05-15 20:47:24','2014-05-15 21:39:32',25,'75464234','645678789','ed_joel28@hortmail.com');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;


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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacientes`
--

/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`,`cedula`,`primer_nombre`,`segundo_nombre`,`apellido_paterno`,`apellido_materno`,`sexo`,`fecha_nacimiento`,`lugar_nacimiento`,`created_at`,`updated_at`,`celular`,`telefono`,`email`,`id_provincia_nacimiento`,`id_distrito_nacimiento`,`id_corregimiento_nacimiento`,`id_nacionalidad`,`id_etnia`,`id_tipo_sangre`,`diabetes`,`id_raza`) VALUES 
 (1,'4-769-466','Sarah','Stephanie','Pimentel','Quiel',0,'1993-11-06','Pedregal','2014-05-12 22:33:03','2014-05-12 22:33:03','60083613','7743095','saritah_0611@hotmail.com',2,1,1,62,1,1,0,1);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;


--
-- Definition of table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL DEFAULT '0',
  `provincia` varchar(20) NOT NULL DEFAULT 'POR DEFINIR',
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provincias`
--

/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` (`id_provincia`,`provincia`) VALUES 
 (1,'BOCAS DEL TORO'),
 (2,'CHIRIQUÍ'),
 (3,'COCLÉ'),
 (4,'COLÓN'),
 (5,'DARIÉN'),
 (6,'HERRERA'),
 (7,'LOS SANTOS'),
 (8,'PANAMÁ'),
 (9,'VERAGUAS'),
 (10,'KUNA YALA'),
 (11,'COMARCA EMBERA'),
 (12,'COMARCA NGÄBE-BUGLÉ');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `razas`
--

/*!40000 ALTER TABLE `razas` DISABLE KEYS */;
INSERT INTO `razas` (`id_razas`,`raza`,`created_at`,`updated_at`) VALUES 
 (1,'CAUCASICO','',''),
 (2,'ASIATICO','',''),
 (3,'MESTIZO','',''),
 (4,'MULATO','',''),
 (5,'AFROAMERICANO','',''),
 (6,'NATIVO','','');
/*!40000 ALTER TABLE `razas` ENABLE KEYS */;


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




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;