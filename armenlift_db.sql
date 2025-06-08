-- MySQL dump 10.13  Distrib 9.3.0, for macos14.7 (x86_64)
--
-- Host: localhost    Database: armenlift_db
-- ------------------------------------------------------
-- Server version	9.3.0

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
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us`
--

LOCK TABLES `about_us` WRITE;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` VALUES (1,NULL,'«Արմենլիֆտ» ՀՁ ՍՊԸ-ն հիմնադրվել է 1998 թվականի օգոստոսի 15-ին:\r\n\r\nԿազմակերպության հիմնադիր են հանդիսանում Գևորգ Բաղդասարի Մուրադխանյանը և Գոռ Բաղդասարի Մուրադխանյանը: Առաջին իսկ օրերից ընկերությունը հավաքագրել է իր կազմում փորձառու մասնագետների և շատ կարճ ժամանակում իր հաստատուն տեղն է գրավել վերելակների տեղադրման և տեխնիկական սպասարկման Հայաստանյան շուկայում:\r\n\r\n2001 թվականի դեկտեմբերի 17-ին «Արմենլիֆտ» ՀՁ ՍՊԸ-ն ՀՀ Քաղաքաշինության նախարարության կողմից ստացել է թիվ - 6520 պետական լիցենզիան:\r\n\r\n2008 թվականի ապրիլի 7-ին «Արմենլիֆտ» ՀՁ ՍՊԸ-ն ՀՀ քաղաքաշինության նախարարության կողմից ստացել է թիվ - 11893 պետական լիցենզիան:\r\n\r\n2001 թվականից «Արմենլիֆտ» ՀՁ ՍՊԸ-ն հանդիսանում է OTIS ֆիրմայի պաշտոնական ներկայացուցիչը Հայաստանի Հանրապետությունում:','about_us/ir6PaG3PMNt6jhsTASLaoOCs9agax5LDnJaipiPp.png','2025-06-02 04:42:54','2025-06-03 02:30:25');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (2,'ս','ս','jobs/HzxjJz3uaivnCej50WpLMNVI8pEEBrNIlwTk08rm.jpg','[\"jobs/olEU5T5wbWpF0YB39yYtHTQyc5x6N6I5ELJafJXQ.png\"]','https://www.youtube.com/watch?v=prmmCg5bKxA&list=PLbt3L4rpcumRziVsXhvy4oV6hsy_1hmmY','2025-06-02 09:12:00','2025-06-02 09:12:00'),(3,'դոսղ','սղդս','jobs/Coah6tV998BJa3Ybb7wFGHLiSIJQgvXMsgplGf7v.png','[]',NULL,'2025-06-03 04:27:30','2025-06-03 04:27:30'),(4,'v','v','jobs/SaJqGQzaYVHpSYOLADn7kNj6oXjzgNaBQRzWaXw0.png','[]',NULL,'2025-06-03 06:51:31','2025-06-03 06:51:31'),(5,'v','h','jobs/d8w54vSjC4u9vBTsZbYphbAKDqFQOUt8wwjuSQWi.png','[]',NULL,'2025-06-03 06:51:42','2025-06-03 06:51:42'),(6,'vvv','vvv','jobs/i0HCVCKiv4sKJ911MBHrZmMI1aV5mgxrY5xI1RAM.png','[]',NULL,'2025-06-03 06:52:09','2025-06-03 06:52:09'),(7,'fg','fg','jobs/p4Zi3RVKck8jFewUJp7o5q2LC3ZmndbR5tASKJJX.jpg','[]',NULL,'2025-06-03 06:52:26','2025-06-03 06:52:26'),(8,'DALMA GARDEN MALL Տեղադրված են OTIS բրենդի վերելակներ,','.','jobs/m4S1rHe9GB5RuraJcIqDJ4P3k3YcTFrAynfybBCZ.png','[]',NULL,'2025-06-03 06:52:37','2025-06-03 09:41:54'),(9,'DALMA GARDEN MALL Տեղադրված են OTIS բրենդի վերելակներ,','մանրամասն նկարագիր','jobs/TDJgCLZueHZwTT0VYU0cR7Ln8SuKqkMF7a5SXiUD.png','[]',NULL,'2025-06-03 06:52:48','2025-06-03 09:42:20'),(10,'վբցնղմ','ասդֆգհ','jobs/q7TnYXQ63uDuCokzVfaKS6shPgImJlahO4OK6wxQ.png','[]',NULL,'2025-06-03 10:51:47','2025-06-03 10:51:47'),(11,'քոերտ','քոերտ','jobs/wtL32cmgS09tXkUQA6yAfPHFwH4vI931kL8ZIKwS.jpg','[]',NULL,'2025-06-03 10:51:56','2025-06-03 10:51:56'),(12,'սդֆգ','ասդֆգ','jobs/HEGqL9Xw814FVlDWbtmkSQ8InqcZlVdh6LS4NniK.png','[]',NULL,'2025-06-03 10:52:06','2025-06-03 10:52:06'),(13,'քոերտը','քոերտ','jobs/yGGJOHKSIrsF1vRo4EieIeA5FbSZVeEJhqjJmLG7.png','[]',NULL,'2025-06-03 10:52:15','2025-06-03 10:52:15');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_06_02_071336_create_about_us_table',2),(6,'2025_06_02_102135_create_services_table',3),(7,'2025_06_02_124150_create_jobs_table',4);
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
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (4,'ցդդց','ցդդցցդդ','services/oCTIWCf8n62msvt8wugoEbmZU65pPzgBbyyaSvif.png','[]','https://www.youtube.com/watch?v=prmmCg5bKxA&list=PLbt3L4rpcumRziVsXhvy4oV6hsy_1hmmY','2025-06-02 08:29:34','2025-06-02 08:29:34'),(6,'վերնագիր','ննն','services/kSEr6ZkPVwM14t3KTgzqzFX8CJjRySyeIZNeYPHN.png','[]','https://www.youtube.com/watch?v=prmmCg5bKxA&list=PLbt3L4rpcumRziVsXhvy4oV6hsy_1hmmY','2025-06-03 04:12:05','2025-06-03 04:12:05'),(7,'էլի','ղ','services/z1MTAMJU010C2WPYdkoFZikaUT6BAFVxWfAKCBPD.jpg','[]',NULL,'2025-06-03 04:12:27','2025-06-03 04:12:27'),(8,'նորից','ղ','services/DfWpfT45gvrDR5xgtALS57yUth2kASqzuUHEfW81.jpg','[]','https://www.youtube.com/watch?v=prmmCg5bKxA&list=PLbt3L4rpcumRziVsXhvy4oV6hsy_1hmmY','2025-06-03 04:12:40','2025-06-03 04:12:40'),(9,'DALMA GARDEN MALL                                                                           Տեղադրված են  OTIS բրենդի վերելակներ, շարժասանդուղքներ','.','services/bFwMlnuALWXnhW39BGBJ9KRG82j1pWxBeeHWMPk2.png','[\"services/A6aj3q1j2e23r2tGQY2PjR7XBxbzOJsE4xCQKtkV.jpg\"]',NULL,'2025-06-03 04:39:08','2025-06-03 09:32:58'),(10,'լալալալալալա','լալալալալ','services/axzRzwNcaagl6n6gfOrDPXzqSwSYgnaFHnGEvmuv.png','[]',NULL,'2025-06-03 10:44:34','2025-06-03 10:44:34'),(11,'սդֆգհյ','ասդֆգհ','services/xdI2t7muX1o8AFl8SNrJxmx8TByqfm5SJCaT7RTQ.png','[]',NULL,'2025-06-03 10:44:44','2025-06-03 10:44:44'),(12,'ասդֆգհյ','ասդֆգհյկ','services/FgpP509iuNaTdM7xZJdmOJoJ8oi454z4GTHWJoaZ.jpg','[]',NULL,'2025-06-03 10:44:55','2025-06-03 10:44:55'),(13,'DALMA GARDEN MALL','Տեղադրված են  OTIS բրենդի վերելակներ, շարժասանդուղքներ','services/hiyw7Ld5PB08P5bdBHY1y9X4gmC8pltum7YjUsPZ.png','[]',NULL,'2025-06-03 10:55:19','2025-06-03 10:55:19'),(14,'asdfghjkl','asdfghj','services/tk3trIdZgRy5vXKbNzK3mVe8EMoultCsSBCYWIq7.png','[]',NULL,'2025-06-03 10:57:47','2025-06-03 10:57:47');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'armenlift','armenlift@admin.com',NULL,'$2y$10$jH5iq8DyhEAqgKwS5IimsOrMvv2wg73okIUd4fM.rw5rkqwIFMMCu','LErWw00LVHVqIAYsvjrfmOy2XywwJCGvCCQxJBMjj9UnS5dnIhXoSBU0PsMM','2025-06-02 02:37:29','2025-06-02 02:37:29');
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

-- Dump completed on 2025-06-03 19:25:14
