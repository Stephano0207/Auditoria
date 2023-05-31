-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cuae
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banco`
--

DROP TABLE IF EXISTS `banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco` (
  `idBanco` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  PRIMARY KEY (`idBanco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco`
--

LOCK TABLES `banco` WRITE;
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idCategoria` int(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'celulares'),(2,'cámaras'),(3,'auriculares'),(4,'laptops'),(5,'televisores'),(6,'Pcs'),(7,'Consolas de juego'),(8,'Parlantes'),(9,'Usb');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `dniCliente` varchar(8) NOT NULL,
  `ruc` varchar(50) DEFAULT NULL,
  `idUser` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`dniCliente`),
  KEY `fk_usersss` (`idUser`),
  CONSTRAINT `fk_usersss` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradores` (
  `idColaborador` int(5) NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `idUser` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`idColaborador`),
  KEY `fk_usuarioo` (`idUser`),
  CONSTRAINT `fk_usuarioo` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradores`
--

LOCK TABLES `colaboradores` WRITE;
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
INSERT INTO `colaboradores` VALUES (1,'78264250','Eagan','Castillo',3),(2,'77770782','Kelly','Norman',4),(3,'72587528','Hayley','Davidson',5),(4,'73735650','Wylie','Schmidt',6),(5,'71767498','Heidi','Sanchez',7),(6,'71052550','Alma','Sargent',8),(7,'71082841','Amity','Sims',9),(8,'75567665','Daquan','Irwin',10),(9,'73344816','Hall','Bauer',11),(10,'79575778','Jonas','Zamora',12),(11,'78252423','David','Faulkner',13),(12,'74625404','Brian','Haley',14),(13,'76447107','Mason','Reynolds',15),(14,'75485443','Dylan','Suarez',16),(15,'76458141','Gisela','Joseph',17),(16,'71152599','Deanna','George',18),(17,'74194523','Cruz','Thornton',19),(18,'72343548','Meredith','Hart',20),(19,'76152226','Hilel','Wolf',21),(20,'71911660','Fredericka','Black',22),(21,'77188479','Lee','Beach',23),(22,'77722516','Chadwick','Bender',24),(23,'77772083','Glenna','Stevens',25),(24,'77265766','Ivana','Aguirre',26),(25,'77168431','Wyatt','Guy',27),(26,'75691372','Kylan','Booth',28);
/*!40000 ALTER TABLE `colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventa` (
  `idDetalleVenta` int(10) NOT NULL AUTO_INCREMENT,
  `idVenta` int(10) NOT NULL,
  `idProducto` int(20) NOT NULL,
  `cantidad` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idDetalleVenta`,`idVenta`,`idProducto`),
  KEY `fk_vv` (`idVenta`),
  KEY `fk_ppp` (`idProducto`),
  CONSTRAINT `fk_ppp` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_vv` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventa`
--

LOCK TABLES `detalleventa` WRITE;
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `idHorario` int(5) NOT NULL AUTO_INCREMENT,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `idColaborador` int(5) DEFAULT NULL,
  PRIMARY KEY (`idHorario`),
  KEY `fk_colab` (`idColaborador`),
  CONSTRAINT `fk_colab` FOREIGN KEY (`idColaborador`) REFERENCES `colaboradores` (`idColaborador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,'08:00:00','18:00:00',1),(2,'08:00:00','18:00:00',2),(3,'08:00:00','18:00:00',3),(4,'08:00:00','18:00:00',4),(5,'08:00:00','18:00:00',5),(6,'08:00:00','18:00:00',6),(7,'08:00:00','18:00:00',7),(8,'08:00:00','18:00:00',8),(9,'08:00:00','18:00:00',9),(10,'08:00:00','18:00:00',10),(11,'08:00:00','18:00:00',11),(12,'08:00:00','18:00:00',12),(13,'08:00:00','18:00:00',13),(14,'08:00:00','18:00:00',14),(15,'08:00:00','18:00:00',15),(16,'08:00:00','18:00:00',16),(17,'08:00:00','18:00:00',17),(18,'08:00:00','18:00:00',18),(19,'08:00:00','18:00:00',19),(20,'08:00:00','18:00:00',20),(21,'08:00:00','18:00:00',21),(22,'08:00:00','18:00:00',22),(23,'08:00:00','18:00:00',23),(24,'08:00:00','18:00:00',24),(25,'08:00:00','18:00:00',25),(26,'08:00:00','18:00:00',26);
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `idMarca` int(20) NOT NULL AUTO_INCREMENT,
  `marca` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Samsung'),(2,'Apple'),(3,'Huawei'),(4,'Xiaomi'),(5,'F9'),(6,'Motorola'),(7,'Nokia'),(8,'Intel'),(9,'Amd'),(10,'Kingdom'),(11,'Sony'),(12,'Lg'),(13,'Xbox');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_08_20_125543_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',3),(2,'App\\Models\\User',4),(2,'App\\Models\\User',5),(2,'App\\Models\\User',6),(2,'App\\Models\\User',7),(2,'App\\Models\\User',8),(2,'App\\Models\\User',9),(2,'App\\Models\\User',10),(2,'App\\Models\\User',11),(2,'App\\Models\\User',12),(2,'App\\Models\\User',13),(2,'App\\Models\\User',14),(2,'App\\Models\\User',15),(2,'App\\Models\\User',16),(2,'App\\Models\\User',17),(2,'App\\Models\\User',18),(2,'App\\Models\\User',19),(2,'App\\Models\\User',20),(2,'App\\Models\\User',21),(2,'App\\Models\\User',22),(2,'App\\Models\\User',23),(2,'App\\Models\\User',24),(2,'App\\Models\\User',25),(2,'App\\Models\\User',26),(2,'App\\Models\\User',27),(2,'App\\Models\\User',28),(3,'App\\Models\\User',29),(3,'App\\Models\\User',30),(3,'App\\Models\\User',31),(3,'App\\Models\\User',32),(3,'App\\Models\\User',33),(3,'App\\Models\\User',34),(3,'App\\Models\\User',35),(3,'App\\Models\\User',36),(3,'App\\Models\\User',37),(3,'App\\Models\\User',38),(3,'App\\Models\\User',39),(3,'App\\Models\\User',40),(3,'App\\Models\\User',41),(3,'App\\Models\\User',42),(3,'App\\Models\\User',43),(3,'App\\Models\\User',44),(3,'App\\Models\\User',45),(3,'App\\Models\\User',46),(3,'App\\Models\\User',47),(3,'App\\Models\\User',48),(3,'App\\Models\\User',49),(3,'App\\Models\\User',50),(3,'App\\Models\\User',51);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'admin.home','web','2022-08-20 23:55:25','2022-08-20 23:55:25'),(2,'admin.producto.index','web','2022-08-20 23:55:26','2022-08-20 23:55:26'),(3,'admin.producto.create','web','2022-08-20 23:55:26','2022-08-20 23:55:26'),(4,'admin.producto.edit','web','2022-08-20 23:55:26','2022-08-20 23:55:26'),(5,'admin.producto.destroy','web','2022-08-20 23:55:26','2022-08-20 23:55:26'),(6,'admin.users.index','web','2022-08-20 23:55:26','2022-08-20 23:55:26'),(7,'admin.users.edit','web','2022-08-20 23:55:26','2022-08-20 23:55:26'),(8,'admin.users.update','web','2022-08-20 23:55:26','2022-08-20 23:55:26');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `idProducto` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `costo_envio` decimal(8,2) DEFAULT NULL,
  `idCategoria` int(5) DEFAULT NULL,
  `idMarca` int(5) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(20) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_categoria` (`idCategoria`),
  KEY `fk_marca` (`idMarca`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_marca` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`idMarca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'MacBook ProMax','15 pulgadas, 1TB HDD, 32GB RAM',2000.00,29.99,4,2,'macbook-pro.png',220),(2,'Dell Vostro 3557','15 pulgadas, 1TB HDD, 8GB RAM',1200.00,19.99,2,1,'dell-v3557.png',220),(3,'iPhone 11 Pro','6.1 pulgadas, 64GB 4GB RAM',1000.00,14.99,1,2,'iphone-11-pro.png',220),(4,'Remax 610D Headset','6.1 pulgadas, 64GB 4GB RAM',150.00,1.89,3,3,'remax-610d.jpg',220),(5,'Samsung LED TV','24 pulgadas, LED Display, Resolución 1366 x 768',2000.00,12.59,5,1,'samsung-led-24.png',200),(6,'Samsung Camara Digital','16.1MP, 5x Optical Zoom',1200.00,13.39,2,1,'samsung-mv800.jpg',300),(7,'Huawei GR 5 2017','5.5 pulgadas, 32GB 4GB RAM',700.00,6.79,1,3,'gr5-2017.jpg',426),(8,'Audífono Bluetooth Gato','Cuenta con luz LED',59.00,10.00,3,1,'20220822073836.jpg',15),(9,'Galaxy Z Flip3 128GB Negro','Cámara posterior: 12.0 MP + 12.0 MP\r\nCámara frontal: 10MP\r\nTamaño de la pantalla: 6.7 pulgadas\r\nMemoria interna: 128GB\r\nNúcleos del procesador: Octa Core',3399.00,15.00,1,1,'20220822074200.jpg',20),(10,'Play Station 5 Pro','Consola de juegos, 2 TB , Case  blanco',3000.00,20.00,7,11,'20220825034005.jpeg',50),(11,'Televisor LG','Con sintonizador digital integrado',2200.00,20.00,5,12,'20220825034106.jpg',20),(12,'Auriculares F9','5 horas de duracion\r\nResistencia al agua\r\nPantalla LED\r\nAuriculares táctiles\r\nBatería portátil integrada',60.00,10.00,3,5,'20220825034219.jpg',40),(13,'Xbox Pro','3 TB \r\ngame pass plan\r\ncase negro',3200.00,15.00,7,13,'20220825034325.jpg',17),(14,'Parlante Samsung','Modo karaoke\r\n500 w\r\nResistente al agua\r\nPotenciador de bajos\r\nBluetooh\r\nSonido Bidireccional',1277.00,20.00,8,1,'20220825034503.jpg',40);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_actividad`
--

DROP TABLE IF EXISTS `registro_actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_actividad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idUser` bigint(20) unsigned NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `accion` varchar(250) DEFAULT NULL,
  `categoria` varchar(250) DEFAULT NULL,
  `detalles` varchar(250) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userrrr` (`idUser`),
  CONSTRAINT `fk_userrrr` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_actividad`
--

LOCK TABLES `registro_actividad` WRITE;
/*!40000 ALTER TABLE `registro_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(1,2),(2,1),(2,2),(3,1),(3,2),(4,1),(4,2),(5,1),(5,2),(6,1),(6,2),(7,1),(8,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2022-08-20 23:55:25','2022-08-20 23:55:25'),(2,'Colaborador','web','2022-08-20 23:55:25','2022-08-20 23:55:25'),(3,'Cliente','web','2022-08-20 23:55:25','2022-08-20 23:55:25');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocliente`
--

DROP TABLE IF EXISTS `tipocliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocliente` (
  `idTipoCliente` int(2) NOT NULL AUTO_INCREMENT,
  `tipoCliente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTipoCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocliente`
--

LOCK TABLES `tipocliente` WRITE;
/*!40000 ALTER TABLE `tipocliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Cruz Ulloa Estrella','cuae@gmail.com',NULL,'$2y$10$Cyp0bo1VOSKw4eT4wqeCIeodeFMhf08MxW07Qf5F2mcpfLESjwW4q',NULL,'2022-08-21 04:55:26','2022-08-21 04:55:26'),(3,'Miss Ashlynn Kertzmann','llueilwitz@example.net','2022-08-22 10:32:37','$2y$10$hsgg68rLeBZ3hMPnuLRZE.RqRm13WJdIY3G3XlKYO5sr6Q4Ea4ZhO','qFFaM6JaLE','2022-08-22 10:32:42','2022-08-22 10:32:42'),(4,'Miss Laurianne Kovacek III','fcartwright@example.com','2022-08-22 10:32:37','$2y$10$ONKVq28BvdJ1Apl2rP/yXeBkt//2qwxbeG45wjDawONttvms/dOe6','Mw7qr5jeCS','2022-08-22 10:32:42','2022-08-22 10:32:42'),(5,'Mr. Preston McLaughlin','qbrown@example.net','2022-08-22 10:32:37','$2y$10$/tCT/7B88rGLqiQaRJ1dR.jtE8.ABQwsng6SxsBHh3Nqz7CRYLeOS','avAuGSdFRm','2022-08-22 10:32:42','2022-08-22 10:32:42'),(6,'Emilie Thompson','tkemmer@example.net','2022-08-22 10:32:37','$2y$10$tuQ7yOuAYVfQwO3jswMxHuIbS3404D.gFqsT2pbDpMKGKbX/qfe6.','KEKotN1CYH','2022-08-22 10:32:42','2022-08-22 10:32:42'),(7,'Nickolas Okuneva','welch.omari@example.com','2022-08-22 10:32:37','$2y$10$BkKqnEVvb9s7CQ0HjzMRKuOTRaTYz7gdxA710KBgUCrA7cMfCnvQS','phhk8C1ka2','2022-08-22 10:32:42','2022-08-22 10:32:42'),(8,'Kara Lesch','yzboncak@example.org','2022-08-22 10:32:37','$2y$10$3SbzM27mCk7mEyMmgFRc9OGa/AIiHWMWPrzfbUwtjKLL21PZrAf9y','cokZBUONjR','2022-08-22 10:32:42','2022-08-22 10:32:42'),(9,'Dr. Adolphus Stoltenberg III','marquardt.sandrine@example.net','2022-08-22 10:32:37','$2y$10$AlIlF7p1SWbLiZYimPx7deUJjIFxn9Jc2vIY5OELsbBnR4xaWITWe','Rj9WPpWP1U','2022-08-22 10:32:42','2022-08-22 10:32:42'),(10,'Prof. Amalia Reinger','addie.rodriguez@example.org','2022-08-22 10:32:38','$2y$10$9MczXkJe58QwWKhbHAQfpu7DoLS66jlFJJD2sEw.ai4QP4RECa6tm','kIQOwgmhcL','2022-08-22 10:32:42','2022-08-22 10:32:42'),(11,'Lambert McCullough','reece.bernier@example.org','2022-08-22 10:32:38','$2y$10$OHcYsq5aUgcz1VWGzyNNre2KcmShE9cNgRVW.iu7ROti6GuIIPrUa','A9bQVbKvw6','2022-08-22 10:32:42','2022-08-22 10:32:42'),(12,'Aryanna Murray','qwelch@example.com','2022-08-22 10:32:38','$2y$10$fRopFQb98kIewH3u3qJ.K.lRF9LoMuqXUlftf/sE3Jui11vyg4zUi','YKpVtyYT8L','2022-08-22 10:32:43','2022-08-22 10:32:43'),(13,'Sedrick Homenick MD','swehner@example.org','2022-08-22 10:32:38','$2y$10$bqxm0H3qYmni/omHa.u3UuWeFwlOUtOLW3aqQByly/T9snSpIRepa','dJxfWwaU8I','2022-08-22 10:32:43','2022-08-22 10:32:43'),(14,'Maxwell Johnson','zulauf.cathy@example.org','2022-08-22 10:32:38','$2y$10$/BlM8haM8tt47u6YYYrU7O08zYT1um0EmUi5igJq/axdE0RFDZPi2','1l8SQ4O6xI','2022-08-22 10:32:43','2022-08-22 10:32:43'),(15,'Arnulfo Hintz','asa62@example.net','2022-08-22 10:32:38','$2y$10$m8gye83R0BbYNcHBVXRV9uNOnrSgSX3KTBrpajVs3WQ/CH2oxnTay','6WyiDwqxSd','2022-08-22 10:32:43','2022-08-22 10:32:43'),(16,'Mr. Adam Hilpert','hudson.rolando@example.org','2022-08-22 10:32:38','$2y$10$yukW99FJGmNaC/iaGljbZOLnk.Kp.N/XDX/.lD8TnlnMYQRDMTdFS','5BBV8OcaFG','2022-08-22 10:32:43','2022-08-22 10:32:43'),(17,'Dayne Mohr','thayes@example.org','2022-08-22 10:32:38','$2y$10$aRqYADuOSLQJ6TrdKojaPuZbknSmv42Pg1v.Ce7q7rXlUwmGSEt5W','jx8jvMsgUy','2022-08-22 10:32:43','2022-08-22 10:32:43'),(18,'Zoila Wolff MD','camylle31@example.org','2022-08-22 10:32:38','$2y$10$jEpSB8XZNii5KnaporGVEuqqqlDSwzdWf3vLp/CT2kWlMDs/H1TIO','m3iJFEy7iS','2022-08-22 10:32:43','2022-08-22 10:32:43'),(19,'Prof. Cleora Schmidt Sr.','amira.adams@example.com','2022-08-22 10:32:38','$2y$10$pJY/S8j/nUVkgk5XWfvNf.0w7PI1.yfblXYV1qeXlUUWXE6EvGafi','tFQgTvH2jG','2022-08-22 10:32:43','2022-08-22 10:32:43'),(20,'Creola Weissnat','jena.terry@example.net','2022-08-22 10:32:38','$2y$10$7bZ7ESFTvrBE2cZ9/5sdVO/0Yei6nxWGLR.h7.fd/mhXkeMZE/DK2','0wilX5r1yy','2022-08-22 10:32:43','2022-08-22 10:32:43'),(21,'Ms. Rose Konopelski','kmayert@example.com','2022-08-22 10:32:39','$2y$10$OqAiJXO6msohB1KN4G6Z9Ombla9rS3NfZbsYFtsPJkVEP08Kt4seK','1V2nCpbGx4','2022-08-22 10:32:43','2022-08-22 10:32:43'),(22,'Sonny Smitham','gordon96@example.net','2022-08-22 10:32:39','$2y$10$bAnM2HJReYl8rZxuUDyK8u2Ix5rqBwJuOKyGsfMssu1.NydrPKoEW','kA5G3SeVjE','2022-08-22 10:32:44','2022-08-22 10:32:44'),(23,'Zelma Littel','anderson.prudence@example.com','2022-08-22 10:32:39','$2y$10$6MQYDpUebV0vlKuXz6F7xO05f/onLgNypBK0M/e/75ezzd1tIJqvG','rOANvQqjD9','2022-08-22 10:32:44','2022-08-22 10:32:44'),(24,'Savannah Kling','patience03@example.com','2022-08-22 10:32:39','$2y$10$1j2BjEaoreYth2zR65Hj6OIm9u5sawHEaYTeH7bjPs8JsHL5YfA7W','MfLQjG6zVu','2022-08-22 10:32:44','2022-08-22 10:32:44'),(25,'Nannie Christiansen','felicita.gibson@example.org','2022-08-22 10:32:39','$2y$10$9yEn6wAqfonDAfsJsJJa9.dP9TY40FrHBxXO2LdTM.zmeugUVEzLO','j3Z4wtvwE7','2022-08-22 10:32:44','2022-08-22 10:32:44'),(26,'Prof. Ruby Pollich','princess73@example.org','2022-08-22 10:32:39','$2y$10$JplCTSBswftnsJPbXRh1y.35YXxaPZuNVOaBJGR7/X2Ay85bIQ8LW','zXtny8mHN5','2022-08-22 10:32:44','2022-08-22 10:32:44'),(27,'Wilhelm Little','murray.bednar@example.org','2022-08-22 10:32:39','$2y$10$aCyeLgNiSm292.unKM4oVuWD4dpFxxQWesbNhXkBcrERHGsLin1Vq','qyZjP1VViF','2022-08-22 10:32:44','2022-08-22 10:32:44'),(28,'Florence Jerde','yost.enrique@example.com','2022-08-22 10:32:39','$2y$10$gzs36fEn6cVELrCd8cW4d.VQKKRgRazI8KRG6/Qac.ZqwIBO/wAiu','OBvstZ8HoN','2022-08-22 10:32:44','2022-08-22 10:32:44'),(29,'Mr. Tobin Mueller','reyna07@example.com','2022-08-22 10:32:39','$2y$10$OXRpy0puhNXZ798Th/kHFOWSXQSXHbIVc31sV4AfVrwsB3YhLUeu6','Q5smRYX3U6','2022-08-22 10:32:44','2022-08-22 10:32:44'),(30,'Eve Oberbrunner','kunde.august@example.com','2022-08-22 10:32:39','$2y$10$KRYbkoskmRGqLU0bH2CfmuZqIcGnJFL1CAK4hyz/0ZfT9FZYMXyNe','CfamFER8q0','2022-08-22 10:32:44','2022-08-22 10:32:44'),(31,'Lauren Beatty','burley.beer@example.net','2022-08-22 10:32:39','$2y$10$WbUkRWjXSG4AJO1dUB4IEefOzbJ9hIcwmTaBJAg1sgE4s57uq7mbW','RdN496XvEZ','2022-08-22 10:32:44','2022-08-22 10:32:44'),(32,'Landen Spinka','jboehm@example.org','2022-08-22 10:32:40','$2y$10$va0QTCO/qx8h1Af561PzmuILu11irbulbhkfdcaw18N6wbBKVDLIi','ruP8rZbQtg','2022-08-22 10:32:44','2022-08-22 10:32:44'),(33,'Prof. Dorothy Stiedemann','quentin.runte@example.net','2022-08-22 10:32:40','$2y$10$FLh86UR/AhNyvkkXy36rs.SEaTHQSiKLwifrV5DG/wk6F3N9wKlr.','3FVbZWj6fx','2022-08-22 10:32:44','2022-08-22 10:32:44'),(34,'Prof. Lincoln Kshlerin IV','bstiedemann@example.net','2022-08-22 10:32:40','$2y$10$Q5TlLGQ4/u/qkBZjY0GM/eG3ZhCRTcfyZ341S2f29.8EdbcyiFyIS','DfIKKJM2Mt','2022-08-22 10:32:44','2022-08-22 10:32:44'),(35,'Lonzo Watsica','rhiannon88@example.net','2022-08-22 10:32:40','$2y$10$CP2xLgH2KyhRcZS42Zz4V.2JO/jjdEgjLbfOozUdSPBSCz//pXhk6','zcAU7AywLc','2022-08-22 10:32:44','2022-08-22 10:32:44'),(36,'Mr. Julius Hane DVM','nyundt@example.org','2022-08-22 10:32:40','$2y$10$v2Yf.83RILEoUkxntZhX9O9E1LbTkDYL8/6/xai/8ISKY/KaKvvpm','UsBep6HJGa','2022-08-22 10:32:45','2022-08-22 10:32:45'),(37,'Brain Lockman','citlalli.johnson@example.net','2022-08-22 10:32:40','$2y$10$SBO0QL/7J4KQI4GtBXArjuy7eSmGw2CT9sQ7ReQE.DCbO3e/zabxm','1jEse07NGa','2022-08-22 10:32:45','2022-08-22 10:32:45'),(38,'Dr. Kiarra Ortiz','alanna.gorczany@example.org','2022-08-22 10:32:40','$2y$10$/bEoYte2qX6msiiFf1iN6.tuZimsYp27iPE3HiMs2gmc9ItlUElJu','He3ceBEQOZ','2022-08-22 10:32:45','2022-08-22 10:32:45'),(39,'Lauren Mertz','jacobson.mark@example.com','2022-08-22 10:32:40','$2y$10$OJr5rXO6dFS3nkcz7WiS2Oj2pCUrTKVickQ4s/lWD4rfDUg3a1rsC','FoyTaFi8Q1','2022-08-22 10:32:45','2022-08-22 10:32:45'),(40,'Nya Ondricka Jr.','tillman.sigmund@example.com','2022-08-22 10:32:40','$2y$10$ixUMc75gi4jLtAoCIYzcfOvCgmKFq5p.VmeVuIzDDFxoIi3cBumxW','bO01txDxVK','2022-08-22 10:32:45','2022-08-22 10:32:45'),(41,'Erwin Keeling','kenyon.botsford@example.com','2022-08-22 10:32:40','$2y$10$ul7w3074aLLVB13Zptc/7.RWI2hx/QbPd7bqizx.h4bVUwqj3Xfcq','Vpt5CtiG8N','2022-08-22 10:32:45','2022-08-22 10:32:45'),(42,'Dalton Jacobi Sr.','roberts.lee@example.net','2022-08-22 10:32:40','$2y$10$uEVCOGDstSJbdoPdL/HpRu0BkjEsmxM0TbG9qSUOA/hvqMj10689y','mWqovcuRS5','2022-08-22 10:32:45','2022-08-22 10:32:45'),(43,'Mrs. Providenci Wintheiser IV','joshuah17@example.net','2022-08-22 10:32:41','$2y$10$1ibaip/B3erReivDangZbOPpmm9VcIrciKtOcbItRubO7dpQXC2be','wFrKoz01rz','2022-08-22 10:32:45','2022-08-22 10:32:45'),(44,'Arvilla Nolan','mccullough.chris@example.org','2022-08-22 10:32:41','$2y$10$DnKut21xuplrqLK1Yr8f5Oanosk3aMLWx9px4jve36HPvWQM9gOFu','hHCGhcxWYM','2022-08-22 10:32:45','2022-08-22 10:32:45'),(45,'Sharon Senger','hdooley@example.net','2022-08-22 10:32:41','$2y$10$cLfvaKNugpK9dMWh3cXsq.rSTNtkMwAu4cux2dgwi.05tLXzOpEsC','7YBPZSKoAb','2022-08-22 10:32:45','2022-08-22 10:32:45'),(46,'Cleora Mills I','green.maximo@example.net','2022-08-22 10:32:41','$2y$10$eLmABobzUbbObn6QBQ0Txe3E7nc6sUt9Nm3Tkp7yDEJmJDKqslCYK','WHzOL1JdAZ','2022-08-22 10:32:45','2022-08-22 10:32:45'),(47,'Linwood Glover','dessie.walsh@example.net','2022-08-22 10:32:41','$2y$10$s72DVZoOVpfIzxYl00kuoOSg5cWDUAyZjYYaM5FrPa3Zd.ZralxxW','6x84rPJPvi','2022-08-22 10:32:45','2022-08-22 10:32:45'),(48,'Thad Heaney II','abrakus@example.net','2022-08-22 10:32:41','$2y$10$ZG0mtAb5ZgBOGgCd2Q71y.db3EbweANCs/D8COmuEUxMRS.luW33W','YG2MCiZfD4','2022-08-22 10:32:45','2022-08-22 10:32:45'),(49,'Abbigail Kulas','vern.padberg@example.com','2022-08-22 10:32:41','$2y$10$/3vIz0nzA580q8NeYP1jAesk4CJta57VBxNq4k053.G.1Rw600nWC','F92Hj26hr1','2022-08-22 10:32:46','2022-08-22 10:32:46'),(50,'Candida Luettgen','hahn.janelle@example.com','2022-08-22 10:32:41','$2y$10$zzUaxJ5egCZGa/omTDfvnO8BNJvGpd87Rbqp9xjVpeVC5hN24hh8q','mhGCxI12K7','2022-08-22 10:32:46','2022-08-22 10:32:46'),(51,'Rene Wisoky PhD','thiel.demetrius@example.net','2022-08-22 10:32:41','$2y$10$iNI9.lDUq6UW2nOSTOdU8.yZIgRPjsYIYZFPTg9tULUTy2bPoMkIi','wpxOb8fEyl','2022-08-22 10:32:46','2022-08-22 10:32:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `idVenta` int(10) NOT NULL AUTO_INCREMENT,
  `fechaVenta` datetime DEFAULT NULL,
  `estadoPedido` varchar(50) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `fk_pedido` (`id`),
  CONSTRAINT `fk_pedido` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-18  6:55:44
