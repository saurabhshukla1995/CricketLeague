-- MySQL dump 10.13  Distrib 8.0.17, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: cricket
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (1,'Mumbai Indians','Delhi Capitals','Delhi Capitals','2020-06-29 01:22:17','2020-06-29 01:22:43');
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2020_06_27_140910_create_teams_table',1),(17,'2020_06_27_140925_create_players_table',1),(18,'2020_06_27_205444_create_matches_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teamId` int(10) unsigned NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageUri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playerJerNo` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `playerHistory` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `players_teamid_foreign` (`teamId`),
  CONSTRAINT `players_teamid_foreign` FOREIGN KEY (`teamId`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,1,'Rohit','Sharma','rohit.jpeg',1,'India','Match:40,Innings:20,Score:1200','2020-06-28 06:43:31','2020-06-28 13:40:53',NULL),(2,1,'Hardika','Pandya','hardik.jpeg',2,'India','Match:10,Innings:10,Score:1000','2020-06-28 06:44:37','2020-06-28 06:44:37',NULL),(3,1,'Kunal','Pandya','mi-krunal.jpeg',3,'India','Match:15, Innings:12, Score:500','2020-06-28 06:46:20','2020-06-28 13:51:40',NULL),(4,1,'Lasith','Malinga','lasith.jpeg',4,'Srilanka','Match:25, Innings:23, Score:500','2020-06-28 06:47:20','2020-06-28 06:47:20',NULL),(5,1,'Isan','Sharma','mi-ishan.jpeg',6,'India','Match:17, Innings:10, Score:470','2020-06-28 06:52:23','2020-06-28 06:52:23',NULL),(6,1,'Jasprit','Bumrah','mi-jasprit.jpeg',8,'India','Match:18, Innings:13, Score:278','2020-06-28 06:53:54','2020-06-28 06:53:54',NULL),(7,1,'Surya Kumar','Yadav','m--surya.png',9,'India','Match:17, Innings:17, Score:740','2020-06-28 07:00:18','2020-06-28 07:00:18',NULL),(8,1,'Mitchell','MaClnaghan','mi-mitchell.jpeg',10,'Newzealand','Match:19, Innings:13, Score:610','2020-06-28 07:02:32','2020-06-28 07:02:32',NULL),(9,1,'Chris','Lynn','mi-chirs.jpeg',11,'Australia','Match:11, Innings:10, Score:278','2020-06-28 07:04:06','2020-06-28 07:04:06',NULL),(10,1,'Trent','Boult','mi-trent.jpeg',13,'Newzealand','Match:18, Innings:13, Score:670','2020-06-28 07:07:41','2020-06-28 07:07:41',NULL),(11,1,'Rahul','Chahar','mi-rahul.jpeg',14,'India','Match:17, Innings:13, Score:380','2020-06-28 07:08:20','2020-06-28 07:08:20',NULL),(12,2,'Shreyas','Iyer','delhi-shreyas.png',1,'India','Match:22, Innings:22, Score:1600','2020-06-28 07:23:00','2020-06-28 07:23:00',NULL),(13,2,'Axar','Patel','delhi-axar.jpeg',2,'India','Match:17, Innings:15, Score:590','2020-06-28 07:23:51','2020-06-28 07:23:51',NULL),(14,2,'Ravichandan','Ashwin','avtar-img.jpeg',3,'India','Match:17, Innings:15, Score:590','2020-06-28 07:27:08','2020-06-28 07:27:08',NULL),(15,2,'Rishabh','Pant','delhi-rishabh.png',5,'India','Match:18, Innings:15, Score:1900','2020-06-28 07:49:46','2020-06-28 07:49:46',NULL),(16,2,'Keemo','Paul','delhi-keemo.png',6,'Westindies','Match:17, Innings:15, Score:530','2020-06-28 07:51:42','2020-06-28 07:51:42',NULL),(17,2,'Amit','Mishra','delhi-amit.png',4,'India','Match:17, Innings:15, Score:590','2020-06-28 07:52:44','2020-06-28 07:52:44',NULL),(18,2,'Kagiso','Rabada','delhi-kagiso.png',7,'South Africa','Match:17, Innings:15, Score:590','2020-06-28 07:54:06','2020-06-28 07:54:06',NULL),(19,1,'Prithvi','Shaw','delhi-prthvi.jpeg',8,'India','Match:17, Innings:15, Score:590','2020-06-28 07:54:44','2020-06-28 07:54:44',NULL),(20,2,'Sandeep','Sharma','delhi-sandeep.png',9,'India','Match:17, Innings:15, Score:590','2020-06-28 07:55:23','2020-06-28 07:55:23',NULL),(21,2,'Shikhar','Dhawan','delhi-shikar.png',10,'India','Match:17, Innings:15, Score:590','2020-06-28 07:55:59','2020-06-28 07:55:59',NULL),(22,2,'Harshal','Patel','delhi-harshal.png',11,'India','Match:17, Innings:15, Score:590','2020-06-28 07:56:49','2020-06-28 07:56:49',NULL);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teamName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clubState` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logoUri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Mumbai Indians','Mumbai','1200px-Mumbai_Indians_Logo.svg.png','2020-06-28 06:34:09','2020-06-28 06:34:09',NULL),(2,'Delhi Capitals','Delhi','1200px-Delhi_Capitals_Logo.svg.png','2020-06-28 06:34:30','2020-06-28 06:34:30',NULL);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Saurabh Shukla','saurabh.shukla03@gmail.com',NULL,'$2y$10$y8Pbli3GiTfET2qugtQOI.gNv1pRRoqYOyBAEqM9TleD4/KNcXInO','H7UpIPr5tr1DV6UhjQPB50jh2TH0HjUxxBcCXrHWcRGmLaoOaeDqAHHYS8Ji','2020-06-28 06:31:34','2020-06-28 06:31:34');
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

-- Dump completed on 2020-06-29 12:30:38
