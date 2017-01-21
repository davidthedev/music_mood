-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: music-mood
-- ------------------------------------------------------
-- Server version	5.7.12

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
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artist` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artists`
--

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
INSERT INTO `artists` VALUES (1,'Dogg Master'),(2,'B Bravo'),(3,'Ginji Ito'),(4,'Parov Stela'),(5,'Grandmaster Flash'),(7,'Calvin Harris'),(9,'Kimiko Kasai'),(10,'Windjammer'),(11,'Michael Jackson'),(13,'James Brown'),(14,'Stevie Wonder'),(15,'ABBA'),(16,'Boney M'),(17,'Ray Charles'),(18,'Curtis Mayfield'),(19,'Pharrell Williams'),(20,'David Guetta'),(21,'Avicii'),(22,'Bastille'),(23,'Martin Garrix'),(24,'Naughty Boy'),(25,'Kiesza'),(26,'Nico & Vinz'),(27,'Clean Bandit'),(28,'Clean Bandit'),(29,'Zara Larsson');
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (8,'Soul'),(9,'Hip-Hop'),(10,'Jazz'),(11,'Pop'),(12,'Funk'),(13,'Electro Swing');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_12_28_142215_create_artists_table',1),(4,'2016_12_28_142426_create_genres_table',1),(5,'2016_12_28_142459_create_moods_table',1),(6,'2016_12_28_143500_create_records_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moods`
--

DROP TABLE IF EXISTS `moods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mood` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moods`
--

LOCK TABLES `moods` WRITE;
/*!40000 ALTER TABLE `moods` DISABLE KEYS */;
INSERT INTO `moods` VALUES (1,'happy'),(3,'intimate'),(4,'relaxed'),(5,'upbeat'),(6,'sad');
/*!40000 ALTER TABLE `moods` ENABLE KEYS */;
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
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
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
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video_token` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  `mood_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `records_artist_id_foreign` (`artist_id`),
  KEY `records_genre_id_foreign` (`genre_id`),
  KEY `records_mood_id_foreign` (`mood_id`),
  CONSTRAINT `records_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  CONSTRAINT `records_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  CONSTRAINT `records_mood_id_foreign` FOREIGN KEY (`mood_id`) REFERENCES `moods` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `records`
--

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
INSERT INTO `records` VALUES (1,1,'Poison Apple feat. B.Thompson','wTkoQ3whd0g',12,1,'2017-01-02 20:39:43','2017-01-02 20:39:43'),(7,2,'Computa Love','wYk7xXlLZKk',12,3,'2017-01-02 22:56:50','2017-01-02 22:56:50'),(8,3,'Rainy Season','6PlXBJ4sR7Q',8,4,'2017-01-03 13:46:21','2017-01-03 13:46:21'),(9,4,'All Night','_C7UgR_sIW0',13,5,'2017-01-03 13:57:33','2017-01-03 13:57:33'),(10,5,'The Message','gYMkEMCHtJ4',9,1,'2017-01-03 19:34:58','2017-01-03 19:36:25'),(11,7,'Summer','ebXbLfLACGM',11,1,'2017-01-03 20:48:41','2017-01-11 21:28:54'),(12,9,'Mmm mmm good','7PtMsghCaF4',12,3,'2017-01-06 14:25:08','2017-01-06 14:25:08'),(13,10,'Tossing and Turning','3x7DlZyUQcQ',12,1,'2017-01-07 00:10:29','2017-01-07 00:10:29'),(14,11,'Thriller','sOnqjkJTMaA',11,5,'2017-01-07 22:55:28','2017-01-07 22:55:28'),(15,13,'I Got You (\"Feel Good\")','PJqKkZ1VVMk',12,1,'2017-01-11 21:34:49','2017-01-11 21:34:49'),(16,14,'Superstition','0CFuCYNx-1g',12,1,'2017-01-11 21:36:32','2017-01-11 21:36:32'),(17,15,'Dancing Queen','xFrGuyw1V8s',11,1,'2017-01-11 21:38:21','2017-01-11 21:38:21'),(18,16,'Daddy Cool','StVt9-MmOTY',11,1,'2017-01-11 21:39:06','2017-01-11 21:39:06'),(19,17,'I Got A Woman','Mrd14PxaUco',10,1,'2017-01-11 21:40:09','2017-01-11 21:40:09'),(20,18,'Move On Up','6Z66wVo7uNw',8,1,'2017-01-11 21:41:20','2017-01-11 21:41:20'),(21,19,'Happy','y6Sxv-sUYtM',8,1,'2017-01-11 21:43:22','2017-01-11 21:43:22'),(22,20,'Titanium ft. Sia','JRfuAukYTKg',11,5,'2017-01-13 14:36:27','2017-01-13 14:36:27'),(23,21,'Wake Me Up','IcrbM1l_BoI',11,5,'2017-01-13 14:38:01','2017-01-13 14:38:01'),(24,22,'Pompeii','F90Cw4l-8NY',11,5,'2017-01-13 14:39:18','2017-01-13 14:39:18'),(25,23,'Don\'t Look Down (Towel Boy) feat. Usher','nJSdYlAFKqA',11,5,'2017-01-13 14:43:01','2017-01-13 14:43:01'),(26,24,'Wonder ft. Emeli Sande','_kASjW_aPbQ',11,5,'2017-01-13 14:45:50','2017-01-13 14:45:50'),(27,25,'Hideaway','ESXgJ9-H-2U',11,5,'2017-01-13 14:48:05','2017-01-13 14:48:05'),(28,26,'Am I Wrong','bg1sT4ILG0w',11,5,'2017-01-13 14:50:22','2017-01-13 14:50:22'),(29,28,'Rather Be ft. Jess Glynne','m-M1AtrxztU',11,5,'2017-01-13 14:52:22','2017-01-13 14:52:22'),(30,29,'Never Forget You feat. MNEK','GTyN-DB_v5M',11,5,'2017-01-13 16:34:41','2017-01-13 16:34:41');
/*!40000 ALTER TABLE `records` ENABLE KEYS */;
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
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'David','david@davidthedev.com','$2y$10$ZFxHIvCVYjvM3iCOOpEUouZ0tDkaRdicC4qvd/gIuYZNmpfMF5Xa2','ircoTFuQjzRFavGJPmaPgaqr9ODk2NcphBsGLmG60IjLjGwWugZwpICCD096','2017-01-14 13:09:33','2017-01-14 21:12:49');
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

-- Dump completed on 2017-01-15  9:53:06
