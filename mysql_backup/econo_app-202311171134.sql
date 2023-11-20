-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: econo-app-mysql-1    Database: econo_app
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `item_solicituds`
--

DROP TABLE IF EXISTS `item_solicituds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_solicituds` (
  `idItemSolicitud` int unsigned NOT NULL AUTO_INCREMENT,
  `idSolicitud` int unsigned NOT NULL,
  `idItem` int unsigned NOT NULL,
  `cantidad` mediumint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idItemSolicitud`),
  KEY `item_solicituds_idsolicitud_foreign` (`idSolicitud`),
  KEY `item_solicituds_iditem_foreign` (`idItem`),
  CONSTRAINT `item_solicituds_iditem_foreign` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`),
  CONSTRAINT `item_solicituds_idsolicitud_foreign` FOREIGN KEY (`idSolicitud`) REFERENCES `solicituds` (`idSolicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_solicituds`
--

LOCK TABLES `item_solicituds` WRITE;
/*!40000 ALTER TABLE `item_solicituds` DISABLE KEYS */;
INSERT INTO `item_solicituds` VALUES (1,1,1,100,'2023-11-12 21:12:30','2023-11-12 21:12:30'),(3,1,2,250,'2023-11-12 21:12:46','2023-11-12 21:30:12'),(4,1,3,1200,'2023-11-12 21:12:54','2023-11-12 21:32:52'),(5,1,6,10,'2023-11-13 12:22:10','2023-11-13 12:22:10'),(6,1,4,28,'2023-11-13 12:26:14','2023-11-13 12:26:14'),(7,1,5,29,'2023-11-13 12:29:36','2023-11-13 12:29:36'),(8,2,1,100,'2023-11-13 12:54:10','2023-11-13 12:54:10'),(9,2,4,20,'2023-11-13 19:15:26','2023-11-13 19:15:26'),(10,2,3,200,'2023-11-13 19:15:37','2023-11-13 19:15:37'),(11,3,2,200,'2023-11-13 20:51:16','2023-11-13 20:51:16'),(12,3,4,10,'2023-11-13 20:51:23','2023-11-13 20:51:23');
/*!40000 ALTER TABLE `item_solicituds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `idItem` int unsigned NOT NULL AUTO_INCREMENT,
  `nombItem` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medida` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rafam` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Carne Picada','Carnes','Kilos','1111111111','2023-11-12 20:31:58','2023-11-12 20:31:58'),(2,'Suprema Pollo','Carnes','Kilos','1111122222','2023-11-12 20:32:17','2023-11-12 20:32:17'),(3,'Leche','Lácteos','Litros','2222211111','2023-11-12 20:32:30','2023-11-12 20:32:30'),(4,'Ricota','Lácteos','Kilos','2222222222','2023-11-12 20:32:47','2023-11-12 20:32:47'),(5,'Tallarines','Secos','Unidades','5555555555','2023-11-12 20:33:13','2023-11-12 20:33:13'),(6,'Lechuga','Frutas y Verduras','Kilos','3333333331','2023-11-12 20:33:38','2023-11-12 20:33:53'),(7,'Lavandina','Limpieza','Unidades','6662737623','2023-11-12 20:34:23','2023-11-12 20:34:23'),(8,'fideos','Secos','Unidades','2222211111','2023-11-13 13:09:34','2023-11-13 13:10:06');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (15,'2014_10_12_000000_create_users_table',1),(16,'2014_10_12_100000_create_password_reset_tokens_table',1),(17,'2014_10_12_100000_create_password_resets_table',1),(18,'2019_08_19_000000_create_failed_jobs_table',1),(19,'2019_12_14_000001_create_personal_access_tokens_table',1),(20,'2023_10_24_174943_create_items_table',1),(21,'2023_11_01_204500_create_proveedores',1),(22,'2023_11_10_155709_create_solicituds_table',1),(23,'2023_11_10_165708_create_item_solicituds_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `idProveedor` int unsigned NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUIT` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicituds`
--

DROP TABLE IF EXISTS `solicituds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicituds` (
  `idSolicitud` int unsigned NOT NULL AUTO_INCREMENT,
  `idEconomato` bigint unsigned NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `solicituds_ideconomato_foreign` (`idEconomato`),
  CONSTRAINT `solicituds_ideconomato_foreign` FOREIGN KEY (`idEconomato`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicituds`
--

LOCK TABLES `solicituds` WRITE;
/*!40000 ALTER TABLE `solicituds` DISABLE KEYS */;
INSERT INTO `solicituds` VALUES (1,2,'Nueva lista de solicitud',2,'2023-11-12 20:35:01','2023-11-13 21:01:12'),(2,2,'Solicitud de 0, nueva solicitud para comparar con la cerrada',2,'2023-11-13 12:53:57','2023-11-14 22:47:58'),(3,3,'Solicitud del usuaruo o economato2',2,'2023-11-13 20:51:06','2023-11-14 01:59:44'),(4,2,'Ultima solicitud abierta',2,'2023-11-14 01:59:04','2023-11-14 22:46:40');
/*!40000 ALTER TABLE `solicituds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capita` smallint unsigned DEFAULT NULL,
  `adm` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','admin@admin.com',NULL,'$2y$10$FmxSvxx65vOjXwlwQacelO99JtqrZdS8cDx5YT6BDLFrK72F9l0B2',0,1,NULL,'2023-11-12 20:31:05','2023-11-12 20:31:05'),(2,'Usuario','u@u.com',NULL,'$2y$10$e9A9p1e3SJzMkwSgTqwzbOMihO9F7DZ/aylLyrmGhlpQs9sZT206.',10,0,NULL,'2023-11-12 20:31:21','2023-11-14 01:58:29'),(3,'Economato2','e2@e.com',NULL,'$2y$10$9HpG8KaIbBZlxtNrxL2z3up2nv2mcX20dvP7UrDDtnnBjGtrpjgbm',20,0,NULL,'2023-11-13 20:49:40','2023-11-14 01:58:23'),(4,'Nuevo Usuario','nuevo@nuevo.com',NULL,'$2y$10$sWCGgpyTEpkchGy.9mymUOt0NX6iCd241s03ac1ke9JL1ojQv9Q92',10,0,NULL,'2023-11-16 22:45:07','2023-11-16 22:45:07'),(5,'Nuevo Otro Usuario','nou@nou.com',NULL,'$2y$10$YEBaUnf72CxJYt8XkTm.sOXkbNDm00bRZA9V7SOTsXhlq/Bk3Yxvm',0,0,NULL,'2023-11-16 22:49:20','2023-11-16 22:49:20');
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

-- Dump completed on 2023-11-17 11:34:20
