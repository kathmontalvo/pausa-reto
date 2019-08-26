-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: packapp_demo
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `atractivos`
--

DROP TABLE IF EXISTS `atractivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atractivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atractivos`
--

LOCK TABLES `atractivos` WRITE;
/*!40000 ALTER TABLE `atractivos` DISABLE KEYS */;
INSERT INTO `atractivos` VALUES (1,NULL,NULL,'Ordeño de vacas','icon-18'),(2,NULL,NULL,'Paisajes','icon-17'),(3,NULL,NULL,'Elaboración de quesos','icon-16'),(4,NULL,NULL,'Trekking','icon-14'),(5,NULL,NULL,'Flora','icon-13'),(6,NULL,NULL,'Paseo de cataratas','icon-11'),(7,NULL,NULL,'Mono choro de cola amarilla','icon-15'),(8,NULL,NULL,'Aves','icon-12');
/*!40000 ALTER TABLE `atractivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias_preguntas`
--

DROP TABLE IF EXISTS `categorias_preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias_preguntas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_preguntas`
--

LOCK TABLES `categorias_preguntas` WRITE;
/*!40000 ALTER TABLE `categorias_preguntas` DISABLE KEYS */;
INSERT INTO `categorias_preguntas` VALUES (1,'2017-10-11 11:29:07','2017-10-11 11:29:12','Preguntas Frecuentes','1','icon-24'),(2,'2017-10-11 11:29:33','2017-10-11 11:29:36','Medidas de Seguridad','1','icon-25');
/*!40000 ALTER TABLE `categorias_preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` VALUES (1,'2017-10-05 20:55:16','2017-10-05 20:55:16','adasda','genix.granados@godigital.pe','sadas dasdsad'),(2,'2017-10-05 21:20:12','2017-10-05 21:20:12','Joan','join@gmail.com','oasl mundo'),(3,'2017-10-05 21:36:47','2017-10-05 21:36:47','Joan','join@gmail.com','oasl mundo'),(4,'2017-10-05 21:59:15','2017-10-05 21:59:15','Mori G','genix.granados@godigital.pe','Hola mediaimpact'),(5,'2017-10-05 22:10:05','2017-10-05 22:10:05','peipto','pspadpsad@sdasd.com','dasdadasdad'),(6,'2017-10-05 22:11:40','2017-10-05 22:11:40','adsdfhgghfds','genix.granados@godigital.pe','asdsadsadad'),(7,'2017-10-05 22:37:01','2017-10-05 22:37:01','Genixxx ','e@mediaimpact.pe','oasodoasodsad'),(8,'2017-10-05 22:45:58','2017-10-05 22:45:58','Maria','maria@gmail.com','Arriba perú'),(9,'2017-10-06 14:55:21','2017-10-06 14:55:21','David','david@gmail.com','Arriba peru'),(10,'2017-10-06 23:10:17','2017-10-06 23:10:17','sadsadsad','e@mediaimpact.pe','sadsadsasdad'),(11,'2017-10-11 17:43:47','2017-10-11 17:43:47','Moriii','JoelCastillo@toyotaperu.com','olas peru'),(12,'2017-10-12 17:24:12','2017-10-12 17:24:12','','','');
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRutas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fotos_idrutas_foreign` (`idRutas`),
  CONSTRAINT `fotos_idrutas_foreign` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (6,NULL,NULL,'nape_01.jpg','napes 01',1),(7,NULL,NULL,'nape_02.jpg','Ñape 02',1),(8,NULL,NULL,'nape_03.jpg','Ñape 03',1),(9,NULL,NULL,'nape_04.jpg','Ñape 04',1),(11,NULL,NULL,'monos_01.jpg','monos 01',2),(12,NULL,NULL,'monos_02.jpg','monos 02',2),(13,NULL,NULL,'monos_03.jpg','monos 03',2),(14,NULL,NULL,'monos_04.jpg','monos 04',2),(15,NULL,NULL,'tingana_01.jpg','tingana 01',3),(16,NULL,NULL,'tingana_02.jpg','tingana 02',3),(17,NULL,NULL,'tingana_03.jpg','tingana 03',3),(18,NULL,NULL,'tingana_04.jpg','tingana 04',3),(19,NULL,NULL,'tingana_05.jpg','tingana 05',3),(20,NULL,NULL,'journey_01.jpg','journey 01',4),(21,NULL,NULL,'journey_02.jpg','journey 02',4),(22,NULL,NULL,'journey_03.jpg','journey 03',4),(23,NULL,NULL,'journey_04.jpg','journey 04',4),(24,NULL,NULL,'journey_05.jpg','journey 05',4),(25,NULL,NULL,'soptapata_01.jpg','soptapata 01',5),(26,NULL,NULL,'soptapata_02.jpg','soptapata 02',5),(27,NULL,NULL,'soptapata_03.jpg','soptapata 03',5),(28,NULL,NULL,'soptapata_04.jpg','soptapata 04',5),(29,NULL,NULL,'turuyacu_01.jpg','turuyacu_01',6),(30,NULL,NULL,'turuyacu_02.jpg','turuyacu_02',6),(31,NULL,NULL,'turuyacu_03.jpg','turuyacu_03',6);
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incluyes`
--

DROP TABLE IF EXISTS `incluyes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incluyes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incluyes`
--

LOCK TABLES `incluyes` WRITE;
/*!40000 ALTER TABLE `incluyes` DISABLE KEYS */;
INSERT INTO `incluyes` VALUES (1,NULL,NULL,'Hospedaje','icon-9'),(2,NULL,NULL,'Alimentación','icon-8'),(3,NULL,NULL,'Traslado desde aeropuerto','icon-7');
/*!40000 ALTER TABLE `incluyes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itinerarios`
--

DROP TABLE IF EXISTS `itinerarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itinerarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idRutas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itinerarios_idrutas_foreign` (`idRutas`),
  CONSTRAINT `itinerarios_idrutas_foreign` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itinerarios`
--

LOCK TABLES `itinerarios` WRITE;
/*!40000 ALTER TABLE `itinerarios` DISABLE KEYS */;
INSERT INTO `itinerarios` VALUES (1,NULL,NULL,'Itinerario Día 01','<ul><li>11:40 am - Recepción en el aeropuerto de la Ciudad de Puerto Maldonado u hotel.</li><li>12:00 pm - Viaje en bus o auto de 45 minutos con dirección a la Comunidad Nativa de Infierno donde abordaremos un bote con motor fuera de borda para recorrer por las cálidas y tranquilas aguas del río Tambopata. Tiempo de viaje: 30minutos.</li><li>03:00 pm - Recepción en el albergue y bienvenida.</li><li>06:00 pm - Torre de Dosel: Esta actividad es única y divertida, uno de nuestros guías los llevará a la torre para ayudarle a buscar e identificar aves y otros animales de selva tropical. All legar al nivel más alto (37 Metros) tendrás la oportunidad de estar en el más alto de los árboles que crecen alrededor de los 30 metros (100 pies a más).</li><li>08:00 pm - Búsqueda de Caimanes en el río: Daremos un paseo en bote buscando estas especies cerca a la orilla.</li></ul>',1),(4,NULL,NULL,'Itinerario Día 02','<ul><li>10:00 am - Collpa de Loros: Se viaja aproximadamente 15 minutos en bote, luego se llega a un escondite, donde todas las mañanas al amanecer, se reúnen diferentes tipos de loros y pericos y otras especies de aves.</li><li>11:00 am - Lago Tres Chimbadas: Viaje en bote 30 minutos aproximadamente y una caminata de 30 minutos hasta la orilla donde abordaremos un catamarán. Este atractivo se encuentra adyacente de la Reserva de Tambopata. Duración aproximada: 3 horas.</li><li>03:00 pm - Jardín botánico: Haremos un recorrido por el Jardín medicinal junto a un guía etno botánico quien compartirá con nosotros algunos conocimientos de preparación de las medicinas naturales.</li><li>05:00 pm - Tiro de Arco y flecha: Para realizar esta actividad se hace una caminata de aproximadamente 30minutos por una trocha que está cerca al albergue.</li><li>08:00 pm - Caminata nocturna: una caminata nocturna por una de las trochas del Albergue, buscando insectos, anfibios, tarántulas, murciélagos, aves nocturnas y escuchando diversos sonidos de animales.</li></ul>',1),(5,NULL,NULL,'Itinerario Día 03 (Opcional)','<ul><li>07:00 am - Collpa de loros: Nos levantaremos muy temprano para ver loros.</li><li>11:00 am - Collpa de los mamíferos: Para realizar esta actividad se tiene que caminar alrededor de 2 horas hasta llegar al escondite de observación. Esta Collpa es visitada por las huanganas, sajinos, venados, agutí, ardilla, tapir.</li><li>03:00 pm - Jardín de frutas orgánicas: nos embarcaremos en un bote motorizado durante 10 minutos para visitar la chacra de la Familia Flores, miembro de la comunidad Nativa de Infierno, quien ha desarrollado una agricultura tradicional y sostenible.</li></ul>',1),(6,NULL,NULL,'Itinerario Día 04','<ul><li>10:00 am - Traslado albergue - Puerto Nuevo - oficina.</li><li>12:00 pm - Traslado oficina - hotel/aeropuerto.</li></ul>',1),(20,NULL,NULL,'Itinerario Día 01','<ul><li>02:00 pm - Recojo del aeropuerto/hotel en caso se haya acordado dicho servicio.</li><li>03:00 pm - Llegada a Bagua Grande y parada opcional en caso el grupo desee almorzar.</li><li>05:00 pm - Llegada al cruce Santa Clara, recibimiento y compartir de indicaciones para iniciar la caminata a Bosque Berlín a cargo de la guía Leyda Rimarachín.</li><li>06:00 pm - Llegada al albergue Bosque Berlín.</li><li>08:00 pm - Fogata para los que desean.</li></ul>',2),(21,NULL,NULL,'Itinerario Día 02','<ul><li>09:00 am - Caminata al avistamiento del endémico mono choro cola amarilla.</li><li>10:30 am - Avistamiento de los monos de cola amarilla.</li><li>04:00 pm - Caminata por el Sendero Gallito de la roca.</li><li>06:00 pm - Tiempo libre.</li></ul>',2),(22,NULL,NULL,'Itinerario Día 03','<ul><li>09:00 am - Caminata por el sendero Las Cascadas.</li><li>02:00 pm - Salida de Bosque Berlín al cruce Santa Clara.</li><li>04:00 pm - Llegada a cruce Santa Clara y traslado a Bagua Grande.</li><li>05:00 pm - Llegada a Bagua Grande.</li></ul>',2),(23,NULL,NULL,'Itinerario Día 01','<ul><li>05:45 am - Salida a Tingana desde la Boca de Huascayacu.</li><li>07:00 am - Llegada y desayuno regional en Tingana.</li><li>08:00 am - Paseo en canoa para la observación de fauna</li><li>01:00 pm - Fin del paseo en canoa</li><li>03:00 pm - Visita al vivero comunitario</li><li>04:00 pm - Visita a las parcelas agroecológicas</li><li>08:00 pm - Fogata</li></ul>',3),(24,NULL,NULL,'Itinerario Día 02','<ul><li>08:00 am - Paseo en canoa para la observación de fauna</li><li>01:00 pm - Fin del paseo en canoa</li><li>03:00 pm - Pesca deportiva</li><li>08:30 pm - Paseo nocturno</li></ul>',3),(25,NULL,NULL,'Itinerario Día 03','<ul><li>09:00 am - Retorno a la Boca de Huascayacu</li><li>10:30 am - Retorno a Moyobamba</li></ul>',3),(26,NULL,NULL,'Itinerario Día 01','<ul><li>Recepción en el aeropuerto y transporte al hotel “La Patarashca” donde estarán hospedados.</li><li>13:00 - Almuerzo.</li><li>14:00 - Tour de rapel en Cascada Talliquihui.<ul><li>Duración: 4 horas.</li><li>Múltiples descensos a rapel</li><li>Piscinas naturales.</li></ul></li><li>19:00 - Retorno al hotel, cena y pernocte.</li></ul>',4),(27,NULL,NULL,'Itinerario Día 02','<ul><li>08:00 - Tour de aventura catarata de Pucayaquillo.<ul><li>Duración: 9 horas.</li><li>Caminata por la selva (1 hora)</li><li>Baño en piscinas naturales.</li><li>Catarata.</li><li>Múltiples descensos a rapel.</li><li>Visita a cavernas.</li></ul></li><li>17:00 - Transporte a la Laguna Azul en el distrito de Sauce.</li><li>Cena y pernocte en el albergue La Posada de Sauce.</li></ul>',4),(28,NULL,NULL,'Itinerario Día 03','<ul><li>9:00 - Visita al eco-parque La Soñada.</li><li>Duración: 7 horas.</li><li>Paseo en lancha por la Laguna.</li><li>Orquidiario.</li><li>Mariposario.</li><li>Piscina natural.</li><li>Taller de chocolates.</li></ul></li><li>Traslado al aeropuerto de Tarapoto u hotel, y fin del servicio.</li></ul>',4),(29,NULL,NULL,'Itinerario Día 01','<ul><li>La experiencia inicia a las 5 am partiendo por la mañana de la ciudad de Cusco. Durante el recorrido apreciamos bellos paisajes, cadena de nevados, y poblaciones típicas andinas.</li><li>En el camino, sobre los 3,500 m.s.n.m. realizaremos una parada en una población típica altoandina para desayunar (El desayuno no está incluído y se trata directamente con los pequeños comercios).</li><li>Después de un recorrido de 4 horas de paisajes increíbles, arribamos a la entrada de la reserva, donde iniciamos la aventura con una caminata de 50 minutos por un sendero entre árboles gigantes y el sonido del río que va junto al camino, el cual debemos cruzar en algunos tramos.</li><li>La aventura de conservación inicia con el traslado de equipaje y víveres con los que nos internamos en la selva.</li><li>Al llegar al campamento base, disfrutamos un almuerzo reponedor; y podremos descansar en las hamacas o pasear por el orquideario junto al río.</li><li>Por la tarde iniciamos una excursión en el bosque hacia un mirador, para observar y escuchar diferentes aves que se mimetizan en los árboles en busca de alimento y protección, mientras disfrutamos de los paisajes y  las diferentes especies de plantas que nos rodean.</li><li>Regresamos al campamento y nos preparamos para la cena. Tendremos una introducción al proyecto de conservación e iniciaremos la sesión de cuentos y leyendas del lugar mientras escuchamos un verdadero concierto de sonidos de la naturaleza.</li></ul>',5),(30,NULL,NULL,'Itinerario Día 02','<ul><li>El día empieza temprano en Soqtapata, y madrugamos (5 am) para realizar una corta caminata en búsqueda del Gallito de las Rocas, ave emblemática de la reserva. (Esta actividad es opcional)</li><li>Como parte de las actividades de conservación, empezamos el día colaborando en las pequeñas tareas comunitarias.</li><li>Desayunamos en el campamento para luego dar inicio a una excursión por las zonas medias del bosque, en donde podremos avistar flora y fauna única y característica de bosques primarios muy bien conservados. Si la naturaleza nos lo permite, observaremos heliconias, bromelias, orquídeas, helechos arbóreos y algunos especies de la fauna silvestre como oropéndolas, tucanetas, e incluso pequeños mamíferos y monos choros.</li><li>La aventura de conservación inicia con el traslado de equipaje y víveres con los que nos internamos en la selva.</li><li>De regreso, bajamos a una zona especial del río Saucipata, en donde recargamos energía en una piscina natural rodeada de vegetación y recibimos un baño de purificación para conectar con la naturaleza.</li><li>Regresamos al campamento para almorzar y tomar un merecido descanso.</li><li>Por la tarde, salimos a una excursión por el sotobosque (la parte más baja del bosque), en donde descubriremos otras especies de flora y podremos seguir huellas de mamíferos junto al río.</li><li>Regresamos al campamento para asearnos, cenar y descansar.</li></ul>',5),(31,NULL,NULL,'Itinerario Día 03','<ul><li>Nuevamente es una oportunidad para madrugar (5 am) y realizar una corta caminata en búsqueda del Gallito de las Rocas o practicar Yoga (actividades opcionales)</li><li>Continuamos con las actividades de conservación - comunitarias. Para la reserva el apoyo de los visitantes es muy importante.</li><li>Desayunamos en el campamento y partimos a una expedición hacia los bosques más altos de la concesión. Durante la caminata de 4 horas en la que ascenderemos a casi 2,000 msnm necesitaremos de tu ayuda de asistencia al guardaparque o biólogo que lidere la expedición, inventariando especies, limpiando las trochas y tomando muy buenas fotografías.</li><li>Tomaremos un refrigerio en la zona alta del bosque para bajar a una de las cataratas más representativas de la zona, en donde podremos relajarnos y disfrutar de estar en medio de uno de los bosques mejor conservados del continente.</li><li>Regresamos al campamento para almorzar y tomar un merecido descanso.</li><li>Por la tarde, tendremos un tiempo para actividades cercanas al campamento y al río, y por la noche podremos realizar una caminata nocturna, en dónde tendremos otra perspectiva del bosque.</li></ul>',5),(32,NULL,NULL,'Itinerario Día 01','<ul><li>11:40 am - Recepción en el aeropuerto de la Ciudad de Puerto Maldonado u hotel.</li><li>12:00 pm - Viaje en bus o auto de 45 minutos con dirección a la Comunidad Nativa de Infierno donde abordaremos un bote con motor fuera de borda para recorrer por las cálidas y tranquilas aguas del río Tambopata. Tiempo de viaje: 30minutos.</li><li>03:00 pm - Recepción en el albergue y bienvenida.</li><li>06:00 pm - Torre de Dosel: Esta actividad es única y divertida, uno de nuestros guías los llevará a la torre para ayudarle a buscar e identificar aves y otros animales de selva tropical. All legar al nivel más alto (37 Metros) tendrás la oportunidad de estar en el más alto de los árboles que crecen alrededor de los 30 metros (100 pies a más).</li><li>08:00 pm - Búsqueda de Caimanes en el río: Daremos un paseo en bote buscando estas especies cerca a la orilla.</li></ul>',6),(33,NULL,NULL,'Itinerario Día 02','<ul><li>11:40 am - Recepción en el aeropuerto de la Ciudad de Puerto Maldonado u hotel.</li><li>12:00 pm - Viaje en bus o auto de 45 minutos con dirección a la Comunidad Nativa de Infierno donde abordaremos un bote con motor fuera de borda para recorrer por las cálidas y tranquilas aguas del río Tambopata. Tiempo de viaje: 30minutos.</li><li>03:00 pm - Recepción en el albergue y bienvenida.</li><li>06:00 pm - Torre de Dosel: Esta actividad es única y divertida, uno de nuestros guías los llevará a la torre para ayudarle a buscar e identificar aves y otros animales de selva tropical. All legar al nivel más alto (37 Metros) tendrás la oportunidad de estar en el más alto de los árboles que crecen alrededor de los 30 metros (100 pies a más).</li><li>08:00 pm - Búsqueda de Caimanes en el río: Daremos un paseo en bote buscando estas especies cerca a la orilla.</li></ul>',6);
/*!40000 ALTER TABLE `itinerarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_10_02_200543_create_contactos_table',1),(4,'2017_10_02_202927_create_incluyes_table',1),(5,'2017_10_02_203326_create_atractivos_table',1),(6,'2017_10_02_205710_create_rutas_table',1),(7,'2017_10_02_211758_create_testimonios_table',1),(8,'2017_10_02_212432_create_itinerarios_table',1),(9,'2017_10_02_213207_create_videos_table',1),(10,'2017_10_02_213826_create_fotos_table',1),(11,'2017_10_02_214909_create_ubicaciones_table',1),(12,'2017_10_02_220150_create_rutas_atractivos_table',1),(13,'2017_10_02_220924_create_rutas_incluyes_table',1),(14,'2017_10_11_140555_create_categorias_preguntas_table',2),(15,'2017_10_11_150049_create_preguntas_frecuentes_table',3),(20,'2017_10_17_211115_social_providers_table',4),(21,'2017_10_18_171540_create_reservas_table',5),(22,'2017_10_19_165306_create_rutas_habitaciones_table',6),(23,'2017_10_19_165317_create_rutas_paquetes_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas_frecuentes`
--

DROP TABLE IF EXISTS `preguntas_frecuentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas_frecuentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titulo` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idcat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_frecuentes`
--

LOCK TABLES `preguntas_frecuentes` WRITE;
/*!40000 ALTER TABLE `preguntas_frecuentes` DISABLE KEYS */;
INSERT INTO `preguntas_frecuentes` VALUES (1,'2017-10-11 11:30:05','2017-10-11 11:30:08','¿Necesito algún tipo de entrenamiento previo al viaje para poder terminar las rutas?','<p>No, la mayoría de rutas son aptas para todos y no necesitas mayor entrenamiento. Solo necesitas gozar de buen estado de salud y de muy buena actitud.</p>',1),(2,'2017-10-11 11:30:31','2017-10-11 11:30:35','¿Se tiene acceso a señal de internet o telefónica?','<p>Depende de la experiencia y del operador telefónico con el que cuentes. Sin embargo, no olvides que lo más importante es disfrutar de las actividades y la naturaleza que te rodea.</p>',1),(3,'2017-10-11 11:31:20','2017-10-11 11:31:24','Si tengo un requerimiento específico de alimentación ¿Cómo lo comunico?','<p>Al momento de confirmar la reserva hacemos las consultas sobre alergias o requerimientos especiales, además si hay algo que nos quieras comunicar puedes escribirnos a: <a href=\"mailto:info@pack-app.com\">info@pack-app.com</a></p>',1),(4,'2017-10-11 11:32:49','2017-10-11 11:32:53','¿Los precios incluyen los pasajes de avión?','<p>No, los precios incluyen el traslado desde el aeropuerto de la ciudad de destino (excepto en el caso de la Ruta de los Monos, en la que podemos ayudarte a conseguir el transporte), alimentación, alojamiento, guías turísticos, actividades, etc. Los pasajes de avión corren por cuenta del viajero.</p>',1),(5,'2017-10-11 11:33:30','2017-10-11 11:33:33','¿Es necesario ponerme alguna vacuna previo al viaje?','<p>Si bien no hay vacunas requeridas para viajar a Perú, algunos Centros para el Control y la Prevención de Enfermedades tienen las siguientes recomendaciones:</p><p><b>Fiebre Amarilla:</b> La inyección se debe administrar al menos 10 días previos a su llegada.</p><p><b>Hepatitis A:</b> Se recomienda la vacunación a todos los viajeros a Perú.</p><p><b>Hepatitis B:</b> La vacunación se recomienda a todos los viajeros a Perú.</p><p><b>Fiebre Tifoidea:</b> Se recomienda la vacunación a todos los viajeros a zonas tropicales de América del Sur, especialmente aquellos que pueden quedarse en las zonas rurales, donde podría ocurrir la exposición a través de alimentos o agua.</p>',2),(6,'2017-10-11 11:36:03','2017-10-11 11:36:07','Quiero ir con niños menores ¿Cuál es la mínima edad requerida para viajar?','<p>La mayoría de rutas son aptas para todas las edades a partir de 7 años.</p><p>La ruta al Toroyacu es una ruta de aventura, para lo cual se recomienda adolescentes a partir de los 15 años. Sin embargo, la organización de esta ruta cuenta con alternativas familiares en los que podría asistir con niños más pequeños. Por favor consúltenos y con gusto le brindaremos la información necesaria.</p>',2),(7,'2017-10-11 12:03:12','2017-10-11 12:03:16','¿Es necesario que lleve provisiones de agua?','<p>No, como parte del costo del viaje está considerada la provisión de agua potable necesaria para todo el grupo.</p>',2);
/*!40000 ALTER TABLE `preguntas_frecuentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_llegada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `extras` int(11) DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentarios` text COLLATE utf8_unicode_ci,
  `estado` tinyint(1) NOT NULL,
  `precio_total` decimal(10,2) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `ruta_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reservas_user_id_foreign` (`user_id`),
  KEY `reservas_ruta_id_foreign` (`ruta_id`),
  CONSTRAINT `reservas_ruta_id_foreign` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`id`),
  CONSTRAINT `reservas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (23,'2017-10-18 23:18:28','2017-10-18 23:31:30',12,'2017-11-03','2110-10-01',11,'12','sasd','rca@mediaimpact.pe','232131','323',1,6292.00,4,4),(24,'2017-10-18 23:33:40','2017-10-18 23:33:54',111,'2017-10-19','2110-10-01',11,'Russel','Caberar','rassell_513@hotmail.com','122','dadsd',1,55297.00,4,4),(25,'2017-10-18 23:44:11','2017-10-18 23:47:53',12,'2017-10-26','2110-10-01',12,'11','12','rca@mediaimpact.pe','1112d','asd',1,6324.00,3,4),(26,'2017-10-18 23:56:34','2017-10-18 23:56:51',1,'2017-10-25','2110-10-01',1,'Russel','11','rca@mediaimpact.pe','2','122',1,527.00,3,4),(27,'2017-10-18 23:59:43','2017-10-18 23:59:57',11,'2017-10-18','2110-10-01',12,'sR','11','e@mediaimpact.pe','11','dasd',1,5829.00,3,4),(28,'2017-10-19 14:27:18','2017-10-19 14:27:34',6,'2017-10-05','2110-10-01',12,'Russel','Cabrera','rassell_513@hotmail.com','1222','dasdsd',1,4422.00,3,1),(29,'2017-10-19 15:05:33','2017-10-19 15:05:44',11,'2017-10-04','2110-10-01',11,'Russel','Cabrera','rassell_513@hotmail.com','2222','dasd',1,7876.00,3,1),(30,'2017-10-19 15:51:08','2017-10-19 15:51:16',1,'2017-10-19','2110-10-01',22,'R','Cabrera','rca@mediaimpact.pe','123','dasdsad',1,1157.00,3,1),(31,'2017-10-19 16:24:18','2017-10-19 16:24:36',12,'2017-10-20','2110-10-01',12,'Russel','Cabrera','sipes.marlee@example.net','233','asdasdd',1,7776.00,3,5),(32,'2017-10-19 16:25:32','2017-10-19 16:25:41',12,'2017-10-19','2110-10-01',22,'Zapatilla deportivas','Cabrera','VivianRo@iadb.org','3','asdasd',1,7996.00,3,5),(33,'2017-10-19 16:27:15','2017-10-19 16:27:25',2,'2017-10-19','2110-10-01',2,'adds','dasd','rca@mediaimpact.pe','2323','dasdsad',1,1296.00,3,5),(34,'2017-10-19 17:47:08','2017-10-19 17:47:21',12,'2017-10-20','2110-10-01',12,'Zapatilla deportivas','Cabrera','rca@mediaimpact.pe','13213','cascasdd',1,9984.00,3,6),(37,'2017-10-20 19:49:52','2017-10-20 19:50:13',1,'2017-10-12','2110-10-01',222,'Russel','2','carenas@iadb.org','11','sdasdasd',1,7454.00,5,3),(38,'2017-10-20 19:54:25','2017-10-20 19:54:32',6,'2017-10-18','2110-10-01',11,'Russel','2','carenas@iadb.org','111','ss',1,2452.00,5,3),(39,'2017-10-20 19:57:46','2017-10-20 19:57:54',6,'2017-10-12','2110-10-01',11,'Russel','sds','carenas@iadb.org','dsd','sdsd',1,2452.00,5,3),(40,'2017-10-20 20:11:51','2017-10-20 20:12:00',1,'2017-10-06','2110-10-01',1,'Russel','Cas','VivianRo@iadb.org','2323','dasdasdd',1,716.00,6,1),(42,'2017-10-20 23:51:21','2017-10-21 00:19:11',11,'2017-10-20','2110-10-01',1,'Russel Cabrera','A','rca@mediaimpact.pe','11','dasd',1,7666.00,7,1),(43,'2017-10-20 23:53:41','2017-10-20 23:53:59',4,'2017-10-24','2110-10-01',5,'toyotabeta','granados elias','genix.granados@godigital.pe','9999999999','Olas como estas',1,1255.00,1,2),(44,'2017-10-21 00:29:22','2017-10-21 00:38:22',2,'2017-10-21','2110-10-01',2,'Max Enrique','Carrasco Huaripata','emxmax@hotmail.com','980731962','hola',4,1432.00,8,1);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas`
--

DROP TABLE IF EXISTS `rutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dificultad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clima` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relieve` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `altura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alojamiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `llegar` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas`
--

LOCK TABLES `rutas` WRITE;
/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` VALUES (1,'2017-10-03 08:00:00','2017-10-03 08:00:00','CULTURA Y NATURALEZA','Aventura/Cultural','Madre de Dios','Selva','3D - 2N','Media','Tropical','Humedal','180/220 msnm','Albergue Ñape Lodge','695','21','¡Visita el Centro Ñape, el lodge de la comunidad nativa Infierno! Conoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oportunidad de vivir una experiencia única en lo más profundo de la naturaleza en la Reserva Tambopata, a orillas del río Tambopata. La experiencia es todo incluido (traslado, alimentación, hospedaje y guiado). No incluye pasaje de avión.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis','Visita el Centro Ñape, el lodge de la comunidad nativa Infierno!\r\nConoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oportunidad de vivir una experiencia.','cultura_naturaleza.jpg','cultura-y-naturaleza'),(2,'2017-10-03 09:00:00','2017-10-03 09:00:00','RUTA DE LOS MONOS','Aventura/Cultural','Amazonas','Sierra','2D - 2N','Media','Soleado','Empinado','180/220 msnm','Albergue','300','11','¡Visita el Bosque Berlín y verás a los monos choros de cola amarilla! Un privilegio, ya que es una especie endémica en el Perú. Quédate con la familia Rimarachín, escucha sus historias, recorre los senderos de este bosque nublado cuidado por ellos mismo, aprende sobre conservación y costumbres, prueba comida sana, cosecha tus propios alimentos, y relájate. La experiencia es todo incluido: No tendrás que preocuparte por la comida, guías, actividades ni hospedaje. No incluye pasaje de avión.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 2','Visita el Bosque Berlín, el lodge de la comunidad nativa Infierno!\r\nConoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oportunidad de vivir una experiencia.','monos.jpg','ruta-de-los-monos'),(3,'2017-10-03 09:00:00','2017-10-03 09:00:00','TINGANA','Aventura/Relax','San Martín','Selva','3D - 2N','Facil','Tropical','Humedal','180/220 msnm','Lodge(Tambos)','350','32','Cautívate y admírate por el hermoso paisaje natural de Tingana. Además las leyendas y mitos que encierra dentro de sus bosques, convierten a este lugar en mágico y misterioso. Tingana, ofrece un potencial asombroso para realizar estudios de investigación y observación de flora y fauna, es ideal para la práctica del ecoturismo y turismo vivencial. Este es un refugio de animales silvestres, en su mayoría monos y aves, además es hábitat natural de especies en peligro de extinción y en situación vulnerable.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.3','Visita Tingana, el lodge de la comunidad nativa! Conoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oportunidad de vivir una experiencia.','tingana.jpg','tingana'),(4,'2017-10-03 09:00:00','2017-10-03 09:00:00','VERTICAL JOURNEY','Aventura','San Martín','Selva','3D - 2N','Media','Soleado y Humedo','Desnivelado leve','180/220 msnm','Eco albergue Chirapa Manta','495','32','¡Para amantes de la aventura y naturaleza!, En esta experiencia conocerás un lado no tan conocido de la “Laguna Azul de Sauce” y el “Área de Conservación Regional Cordillera Cerro Escalera”. Dentro de estas zonas se realizarán descensos a Rappel, caminatas por la selva y más. Ellos cuentan con certificaciones de seguridad y personal altamente capacitado que garantizan seguridad y diversión. Importante: No necesitas previa experiencia.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 4','Visita JOURNEY, el lodge de la comunidad nativa!. Conoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oportunidad de vivir una experiencia.','journey.jpg','vertical-journey'),(5,'2017-10-03 17:48:01','2017-10-03 17:48:10','SOQTAPATA','Aventura/Relax/Vivencial','Cusco','Sierra','4D - 3N','Media','Tropical','Bosque nublado','180/220 msnm','Campamento 100% equipado','626','22','En esta experiencia formarás parte del equipo de conservación de Soqtapata, colaborando en algunas actividades según tus capacidades y preferencias mientras conoces la belleza que ofrece este increíble bosque casi virgen de más de 15 mil hectáreas. Caminarás por sus interminables senderos y encontrarás aguas cristalinas para llenar de energía el cuerpo y conectarte con la naturaleza.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 5','Visita el Centro Soqtapata, el lodge de la comunidad nativa!. Conoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oportunidad de vivir una experiencia.','soqtapata.jpg','soqtapata'),(6,NULL,NULL,'RUTA TOROYACU','Aventura/Cultural','Lima','Costa','4D - 4N','Intermedio','Tropical','Escarpado y Húmedo','180/220 msnm','Campamento en ruta','810','22','Intérnate con nuestros guías locales, en el bosque primario con naturaleza inigualable. Comparte con las comunidades Kechwa-Lamas en esta ruta ecosostenible que genera un importante impacto social en la comunidad de San Roque de Cumbaza. Nada que envidiarle a las mejores caminatas del Perú.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 6','Haz un trekking alucinante en Tarapoto! Comparte con las comunidades de San Roque de Cumbaza en esta gran ruta ecoturística y saca fotos inolvidables. ','toroyacu.jpg','ruta-toroyacu');
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas_atractivos`
--

DROP TABLE IF EXISTS `rutas_atractivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutas_atractivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idRutas` int(10) unsigned NOT NULL,
  `idAtractivos` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rutas_atractivos_idrutas_foreign` (`idRutas`),
  KEY `rutas_atractivos_idatractivos_foreign` (`idAtractivos`),
  CONSTRAINT `rutas_atractivos_idatractivos_foreign` FOREIGN KEY (`idAtractivos`) REFERENCES `atractivos` (`id`),
  CONSTRAINT `rutas_atractivos_idrutas_foreign` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas_atractivos`
--

LOCK TABLES `rutas_atractivos` WRITE;
/*!40000 ALTER TABLE `rutas_atractivos` DISABLE KEYS */;
INSERT INTO `rutas_atractivos` VALUES (1,NULL,NULL,1,1),(2,NULL,NULL,1,2),(3,NULL,NULL,1,3),(4,NULL,NULL,1,4),(5,NULL,NULL,1,5),(6,NULL,NULL,1,6),(7,NULL,NULL,1,7),(8,NULL,NULL,1,8),(9,NULL,NULL,2,1),(10,NULL,NULL,2,2),(11,NULL,NULL,2,3),(12,NULL,NULL,2,4),(13,NULL,NULL,2,5),(14,NULL,NULL,2,6),(15,NULL,NULL,2,7),(16,NULL,NULL,2,8),(17,NULL,NULL,3,2),(18,NULL,NULL,3,4),(19,NULL,NULL,3,5),(20,NULL,NULL,3,8),(21,NULL,NULL,4,2),(22,NULL,NULL,4,4),(23,NULL,NULL,4,5),(24,NULL,NULL,4,6),(25,NULL,NULL,4,8),(26,NULL,NULL,5,2),(27,NULL,NULL,5,4),(28,NULL,NULL,5,5),(29,NULL,NULL,5,8),(30,NULL,NULL,6,1),(31,NULL,NULL,6,4),(32,NULL,NULL,6,2);
/*!40000 ALTER TABLE `rutas_atractivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas_incluyes`
--

DROP TABLE IF EXISTS `rutas_incluyes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutas_incluyes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idRutas` int(10) unsigned NOT NULL,
  `idIncluyes` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rutas_incluyes_idrutas_foreign` (`idRutas`),
  KEY `rutas_incluyes_idincluyes_foreign` (`idIncluyes`),
  CONSTRAINT `rutas_incluyes_idincluyes_foreign` FOREIGN KEY (`idIncluyes`) REFERENCES `incluyes` (`id`),
  CONSTRAINT `rutas_incluyes_idrutas_foreign` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas_incluyes`
--

LOCK TABLES `rutas_incluyes` WRITE;
/*!40000 ALTER TABLE `rutas_incluyes` DISABLE KEYS */;
INSERT INTO `rutas_incluyes` VALUES (1,NULL,NULL,1,1),(2,NULL,NULL,1,2),(3,NULL,NULL,1,3),(13,NULL,NULL,2,1),(14,NULL,NULL,2,2),(15,NULL,NULL,2,3),(16,NULL,NULL,3,1),(17,NULL,NULL,3,2),(18,NULL,NULL,4,1),(19,NULL,NULL,4,2),(20,NULL,NULL,4,3),(21,NULL,NULL,5,2),(22,NULL,NULL,5,3),(23,NULL,NULL,6,2),(24,NULL,NULL,6,3);
/*!40000 ALTER TABLE `rutas_incluyes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas_paquetes`
--

DROP TABLE IF EXISTS `rutas_paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutas_paquetes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `ruta_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rutas_paquetes_ruta_id_foreign` (`ruta_id`),
  CONSTRAINT `rutas_paquetes_ruta_id_foreign` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas_paquetes`
--

LOCK TABLES `rutas_paquetes` WRITE;
/*!40000 ALTER TABLE `rutas_paquetes` DISABLE KEYS */;
INSERT INTO `rutas_paquetes` VALUES (1,'economico',100.00,1,NULL,NULL),(2,'vip',200.00,1,NULL,NULL);
/*!40000 ALTER TABLE `rutas_paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_providers`
--

DROP TABLE IF EXISTS `social_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_providers`
--

LOCK TABLES `social_providers` WRITE;
/*!40000 ALTER TABLE `social_providers` DISABLE KEYS */;
INSERT INTO `social_providers` VALUES (1,3,'1688938387784399','facebook','2017-10-20 23:40:37','2017-10-20 23:40:37'),(2,7,'102139927853715874422','google','2017-10-20 23:41:00','2017-10-20 23:41:00'),(3,8,'10210089273416569','facebook','2017-10-21 00:26:09','2017-10-21 00:26:09');
/*!40000 ALTER TABLE `social_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonios`
--

DROP TABLE IF EXISTS `testimonios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRutas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonios_idrutas_foreign` (`idRutas`),
  CONSTRAINT `testimonios_idrutas_foreign` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonios`
--

LOCK TABLES `testimonios` WRITE;
/*!40000 ALTER TABLE `testimonios` DISABLE KEYS */;
INSERT INTO `testimonios` VALUES (1,NULL,NULL,'Ineke Kvernenes','Tuve una gran estadía en Ñape durante los inicios de noviembre 2015, Increíble en todo sentido, amé los bungalows, la naturaleza, las actividades, !Gracias Ñape!','ineke.jpg',1),(2,NULL,NULL,'Jimena Lop','¡Dex ge de la comunidad nativa Infierno! Conoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oport unidad de. Conoce la diversidad de especies, dex ge de la comunidad nativa.','jimena.jpg',1),(3,NULL,NULL,'Pedro Gonzalez','Necesitamos más familias como los Rimarachín Cayatopa que saber vivir de la naturaleza sin necesidad de bestruirla','pedro.jpg',2),(4,NULL,NULL,'Christian Rojas','Nos gustó muchísimo, gran oportunidad para descansar y entrar en contacto con la naturaleza, bellísimos paisajes y gente muy amable, gran experiencia de aprendizaje, relajo y diversión.','christian.jpg',3),(5,NULL,NULL,'Sebastian Pardo','Más que una escalada es una experiencia alucinante, las medidas de seguridad, herramientas, cuerdas y demás son de primera calidad. Un servicio muy bien pensado, 100% remomendado','sebastian.jpg',4),(7,NULL,NULL,'Christian Rojas','Más que una escalada es una experiencia alucinante, las medidas de seguridad, herramientas, cuerdas y demás son de primera calidad. Un servicio muy bien pensado, 100% remomendado','sebastian.jpg',6),(9,NULL,NULL,'Jimena Lop','¡Dex ge de la comunidad nativa Infierno! Conoce la diversidad de especies botánicas y zoológicas, los majestuosos paisajes y la oport unidad de. Conoce la diversidad de especies, dex ge de la comunidad nativa.','jimena.jpg',5);
/*!40000 ALTER TABLE `testimonios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coord_top` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coord_left` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coord_rigth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_maps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRutas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ubicaciones_idrutas_foreign` (`idRutas`),
  CONSTRAINT `ubicaciones_idrutas_foreign` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicaciones`
--

LOCK TABLES `ubicaciones` WRITE;
/*!40000 ALTER TABLE `ubicaciones` DISABLE KEYS */;
INSERT INTO `ubicaciones` VALUES (1,NULL,NULL,'Pto. Maldonado, Madre de Dios','nape.jpg','61','69','','https://goo.gl/maps/R5HKTmGff262',1),(2,NULL,NULL,'Amazonas','monos_map.jpg','25','32','','https://goo.gl/maps/KfRUqmzRRer',2),(3,NULL,NULL,'Moyobamba - San Martín','tingana_map.jpg','30','38','','https://goo.gl/maps/n7sRhTTdgQ12',3),(4,NULL,NULL,'Tarapoto - San Martín','journey_map.jpg','33','41','','https://goo.gl/maps/SRF5itoVSEk',4),(5,NULL,NULL,'Camantí - Cusco','soqtapata_map.jpg','65','58','','https://goo.gl/maps/QUmi9rkJiFP2',5),(6,NULL,NULL,'Tarapoto - San Martín','toroyacu_map.jpg','47','37','','https://goo.gl/maps/QUmi9rkJiFP2',6);
/*!40000 ALTER TABLE `ubicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'toyotabeta','gfhg','genix.granados@godigital.pe','3232','packapp1508543758.png','$2y$10$JZCjH6mGAvAOq6vZtP5UvO2TK24BwkYkx/uadfRgi7oazI3O9cKnG','8Iv0nSUuywSNmnAETpFO8YMy2wABTKizfqPzpQ6soyse0Df4UeCMSKX5ruln','2017-10-12 16:06:14','2017-10-20 23:55:58'),(3,'Edwin Russel sdasd','Cabrera Ojeda dasd','rassell_513@hotmail.com','985418421122','packapp1508435302.jpg',NULL,'ZpTEyH34Y5GUJWdPE9hKOTGk50i9HiiPbW1TmPWi9hWOzNvIriSMoMIc1T80','2017-10-17 23:00:20','2017-10-19 17:48:30'),(4,'Russel',NULL,'ayla23@example.net',NULL,NULL,'$2y$10$S3jIZx2iHePQTFX/MXC.pe0G9AzNo2mn15AM98KpVbZS.d09TBPHC','iKPmUX5BQhFXvivYa5CjRYY40uDhEIWk9L5Wo3V9EJgYkEK15jVXwfKdSRBZ','2017-10-17 23:25:03','2017-10-17 23:25:03'),(5,'Russel',NULL,'carenas@iadb.org',NULL,NULL,'$2y$10$FX9WfJHgapH6kTX01Xg4Fujy/5RVyoWjKCAZ/xkXLiLojBpyem/1K','rKvr81V5RQBgA1aT46BE4nfENoRbdPwoM22xjabujRoc1DoeDPR7tmxAbaEn','2017-10-20 15:06:16','2017-10-20 15:06:16'),(6,'Russel','asa','VivianRo@iadb.org','111','packapp1508546172.jpg','$2y$10$Oue6CmS.2cwMsRyM8e/YkuQx.p5hX.o1GjLWqfY2ugKjcnhqmFjRe','fJ2O67bfP27IcxnW6dXHahWyNrO5UfHQlGAJ7HB2biPUyLdacUDh4XN0DKKM','2017-10-20 17:43:50','2017-10-21 00:36:12'),(7,'Russel Cabrera',NULL,'rca@mediaimpact.pe',NULL,NULL,NULL,'lMD246YVgfu5jBcFGSkbSG8mONdc17FjIQ3gE8i5MIlNl8jx8POV9FjpVgle','2017-10-20 23:41:00','2017-10-20 23:41:00'),(8,'Max Carrasco','carrasco','emxmax@hotmail.com','980731962','packapp1508546378.jpg',NULL,'nTW3mYtSugzMIufNr8bihpX1a0mmAWWOGMMFxOQSaEVC7BBnLM9LSpYDQLef','2017-10-21 00:26:09','2017-10-21 00:39:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRutas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_idrutas_foreign` (`idRutas`),
  CONSTRAINT `videos_idrutas_foreign` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,NULL,NULL,'https://www.youtube.com/watch?v=JpxsRwnRwCQ','Ñape video 01',1),(2,NULL,NULL,'https://www.youtube.com/watch?v=KUyGS4bKvI8','Ñape video 02',1),(3,NULL,NULL,'https://www.youtube.com/watch?v=V3UJ6xOPZkc','Ruta mono video 01',2),(4,NULL,NULL,'https://www.youtube.com/watch?v=tRAeQMRv-OI','Ruta monos video 2',2),(5,NULL,NULL,'https://www.youtube.com/watch?v=Fo4TA15J9oI','Tingana video 1',3),(6,NULL,NULL,'https://www.youtube.com/watch?v=3Tyl_lNVh_c','Tingana video 2',3),(7,NULL,NULL,'https://www.youtube.com/watch?v=OY3NsUD9H3Q','journey video 1',4),(8,NULL,NULL,'https://www.youtube.com/watch?v=3GDtWUy70tE','journey video 2',4),(9,NULL,NULL,'https://www.youtube.com/watch?v=tPWijHivM-w','soqtapata video 01',5),(10,NULL,NULL,'https://www.youtube.com/watch?v=F9iM56i6-qg','soqtapata video 02',5),(11,NULL,NULL,'https://www.youtube.com/watch?v=TCPIK19ok34','Turuyacu 01',6),(12,NULL,NULL,'https://www.youtube.com/watch?v=fTY96oCJuMU','Turuyacu 02',6);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-22 18:59:59
