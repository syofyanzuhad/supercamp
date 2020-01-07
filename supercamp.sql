-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: supercamp
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `classname`
--

DROP TABLE IF EXISTS `classname`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classname` (
  `id_classname` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_classname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classname`
--

LOCK TABLES `classname` WRITE;
/*!40000 ALTER TABLE `classname` DISABLE KEYS */;
INSERT INTO `classname` VALUES (1,'Membuat Website Responsive',NULL,NULL);
/*!40000 ALTER TABLE `classname` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `date`
--

DROP TABLE IF EXISTS `date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date` (
  `id_date` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_date`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date`
--

LOCK TABLES `date` WRITE;
/*!40000 ALTER TABLE `date` DISABLE KEYS */;
INSERT INTO `date` VALUES (1,'1',NULL,NULL),(2,'2',NULL,NULL),(3,'3',NULL,NULL),(4,'4',NULL,NULL),(5,'5',NULL,NULL),(6,'6',NULL,NULL),(7,'7',NULL,NULL),(8,'8',NULL,NULL),(9,'9',NULL,NULL),(10,'10',NULL,NULL),(11,'11',NULL,NULL),(12,'12',NULL,NULL),(13,'13',NULL,NULL),(14,'14',NULL,NULL),(15,'15',NULL,NULL),(16,'16',NULL,NULL),(17,'17',NULL,NULL),(18,'18',NULL,NULL),(19,'19',NULL,NULL),(20,'20',NULL,NULL),(21,'21',NULL,NULL),(22,'22',NULL,NULL),(23,'23',NULL,NULL),(24,'24',NULL,NULL),(25,'25',NULL,NULL),(26,'26',NULL,NULL),(27,'27',NULL,NULL),(28,'28',NULL,NULL),(29,'29',NULL,NULL),(30,'30',NULL,NULL),(31,'31',NULL,NULL),(32,'1-3',NULL,NULL),(33,'8-10',NULL,NULL),(34,'15-17',NULL,NULL),(35,'22-24',NULL,NULL);
/*!40000 ALTER TABLE `date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `draft`
--

DROP TABLE IF EXISTS `draft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `draft` (
  `id_draft` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` bigint(20) unsigned NOT NULL,
  `student_date` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_month` enum('1','2','3','4','5','6','7','8','9','10','11','12') COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_year` smallint(6) NOT NULL,
  `t_shirt` enum('S','M','L','XL','XXL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` enum('1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '4',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_draft`),
  UNIQUE KEY `draft_id_number_unique` (`id_number`),
  UNIQUE KEY `draft_phone_unique` (`phone`),
  UNIQUE KEY `draft_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `draft`
--

LOCK TABLES `draft` WRITE;
/*!40000 ALTER TABLE `draft` DISABLE KEYS */;
/*!40000 ALTER TABLE `draft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duration`
--

DROP TABLE IF EXISTS `duration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duration` (
  `id_duration` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_duration`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duration`
--

LOCK TABLES `duration` WRITE;
/*!40000 ALTER TABLE `duration` DISABLE KEYS */;
INSERT INTO `duration` VALUES (1,'1 Hari',NULL,NULL),(2,'3 Hari',NULL,NULL),(3,'1 Bulan',NULL,NULL),(4,'3 Bulan',NULL,NULL);
/*!40000 ALTER TABLE `duration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lessons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` bigint(20) unsigned NOT NULL,
  `quota` int(11) NOT NULL DEFAULT '36',
  `class_wave` bigint(20) unsigned DEFAULT NULL,
  `class_date` bigint(20) unsigned NOT NULL,
  `class_month` bigint(20) unsigned NOT NULL,
  `class_year` smallint(6) NOT NULL,
  `class_duration` bigint(20) unsigned NOT NULL,
  `status_lesson` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lessons_class_date_foreign` (`class_date`),
  KEY `lessons_class_month_foreign` (`class_month`),
  KEY `lessons_class_duration_foreign` (`class_duration`),
  KEY `lessons_status_lesson_foreign` (`status_lesson`),
  CONSTRAINT `lessons_class_date_foreign` FOREIGN KEY (`class_date`) REFERENCES `date` (`id_date`),
  CONSTRAINT `lessons_class_duration_foreign` FOREIGN KEY (`class_duration`) REFERENCES `duration` (`id_duration`),
  CONSTRAINT `lessons_class_month_foreign` FOREIGN KEY (`class_month`) REFERENCES `month` (`id_month`),
  CONSTRAINT `lessons_status_lesson_foreign` FOREIGN KEY (`status_lesson`) REFERENCES `status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,1,36,1,1,1,2020,1,1,NULL,NULL),(2,1,36,2,8,1,2020,1,1,NULL,NULL),(3,1,36,3,15,1,2020,1,1,NULL,NULL),(4,1,36,4,22,1,2020,1,1,NULL,NULL),(5,1,36,1,1,2,2020,1,1,NULL,NULL),(6,1,36,2,8,2,2020,1,1,NULL,NULL),(7,1,36,3,15,2,2020,1,1,NULL,NULL),(8,1,36,4,22,2,2020,1,1,NULL,NULL),(9,1,36,1,1,3,2020,1,1,NULL,NULL),(10,1,36,2,8,3,2020,1,1,NULL,NULL),(11,1,36,3,15,3,2020,1,1,NULL,NULL),(12,1,36,4,22,3,2020,1,1,NULL,NULL),(13,1,36,1,1,4,2020,1,1,NULL,NULL),(14,1,36,2,8,4,2020,1,1,NULL,NULL),(15,1,36,3,15,4,2020,1,1,NULL,NULL),(16,1,36,4,22,4,2020,1,1,NULL,NULL),(17,1,36,1,1,5,2020,1,1,NULL,NULL),(18,1,36,2,8,5,2020,1,1,NULL,NULL),(19,1,36,3,15,5,2020,1,1,NULL,NULL),(20,1,36,4,22,5,2020,1,1,NULL,NULL),(21,1,36,1,1,6,2020,1,1,NULL,NULL),(22,1,36,2,8,6,2020,1,1,NULL,NULL),(23,1,36,3,15,6,2020,1,1,NULL,NULL),(24,1,36,4,22,6,2020,1,1,NULL,NULL),(25,1,36,1,1,7,2020,1,1,NULL,NULL),(26,1,36,2,8,7,2020,1,1,NULL,NULL),(27,1,36,3,15,7,2020,1,1,NULL,NULL),(28,1,36,4,22,7,2020,1,1,NULL,NULL),(29,1,36,1,1,8,2020,1,1,NULL,NULL),(30,1,36,2,8,8,2020,1,1,NULL,NULL),(31,1,36,3,15,8,2020,1,1,NULL,NULL),(32,1,36,4,22,8,2020,1,1,NULL,NULL),(33,1,36,1,1,9,2020,1,1,NULL,NULL),(34,1,36,2,8,9,2020,1,1,NULL,NULL),(35,1,36,3,15,9,2020,1,1,NULL,NULL),(36,1,36,4,22,9,2020,1,1,NULL,NULL),(37,1,36,1,1,10,2020,1,1,NULL,NULL),(38,1,36,2,8,10,2020,1,1,NULL,NULL),(39,1,36,3,15,10,2020,1,1,NULL,NULL),(40,1,36,4,22,10,2020,1,1,NULL,NULL),(41,1,36,1,1,11,2020,1,1,NULL,NULL),(42,1,36,2,8,11,2020,1,1,NULL,NULL),(43,1,36,3,15,11,2020,1,1,NULL,NULL),(44,1,36,4,22,11,2020,1,1,NULL,NULL),(45,1,36,1,1,12,2020,1,1,NULL,NULL),(46,1,36,2,8,12,2020,1,1,NULL,NULL),(47,1,36,3,15,12,2020,1,1,NULL,NULL),(48,1,36,4,22,12,2020,1,1,NULL,NULL);
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentor` (
  `id_mentor` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mentor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_mentor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentor`
--

LOCK TABLES `mentor` WRITE;
/*!40000 ALTER TABLE `mentor` DISABLE KEYS */;
INSERT INTO `mentor` VALUES (1,'Bagas',NULL,NULL),(2,'Rizqan',NULL,NULL),(3,'Wandi',NULL,NULL),(4,'Hafif',NULL,NULL),(5,'Amar',NULL,NULL),(6,'Dimas',NULL,NULL),(7,'Syofyan',NULL,NULL);
/*!40000 ALTER TABLE `mentor` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_06_030901_create_status_table',1),(5,'2019_12_06_031005_create_month_table',1),(6,'2019_12_06_031020_create_date_table',1),(7,'2019_12_06_031035_create_duration_table',1),(8,'2019_12_07_011332_create_mentor_table',1),(9,'2019_12_07_034248_create_classname_table',1),(10,'2019_12_08_095141_create_lessons_table',1),(11,'2019_12_09_065836_create_participants_table',1),(12,'2019_12_25_001904_create_draft_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `month`
--

DROP TABLE IF EXISTS `month`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `month` (
  `id_month` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_month`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `month`
--

LOCK TABLES `month` WRITE;
/*!40000 ALTER TABLE `month` DISABLE KEYS */;
INSERT INTO `month` VALUES (1,'Januari',NULL,NULL),(2,'Februari',NULL,NULL),(3,'Maret',NULL,NULL),(4,'April',NULL,NULL),(5,'Mei',NULL,NULL),(6,'Juni',NULL,NULL),(7,'Juli',NULL,NULL),(8,'Agustus',NULL,NULL),(9,'September',NULL,NULL),(10,'November',NULL,NULL),(11,'Oktober',NULL,NULL),(12,'Desember',NULL,NULL);
/*!40000 ALTER TABLE `month` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id_participant` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` bigint(20) unsigned NOT NULL,
  `student_date` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_month` enum('1','2','3','4','5','6','7','8','9','10','11','12') COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_year` smallint(6) NOT NULL,
  `t_shirt` enum('S','M','L','XL','XXL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` enum('1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '4',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_participant`),
  UNIQUE KEY `participants_id_number_unique` (`id_number`),
  UNIQUE KEY `participants_phone_unique` (`phone`),
  UNIQUE KEY `participants_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
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
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id_status` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Tersedia',NULL,NULL),(2,'Penuh',NULL,NULL),(3,'Segera',NULL,NULL),(4,'Belum Konfirmasi',NULL,NULL),(5,'Terkonfirmasi',NULL,NULL),(6,'Terdaftar',NULL,NULL);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
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
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superprogrammer','superprogrammer@gmail.com',NULL,'$2y$10$NePy1afYRnNUowEUX6imBOns58j16e7wgdmO8AGD1Crd6lBsqFqm.','0',NULL,NULL,NULL);
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

-- Dump completed on 2020-01-08  5:54:52
