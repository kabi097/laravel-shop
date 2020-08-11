-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: laravel_shop
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

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
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Nazwa',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Hasło',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Utworzono',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Zaktualizowano',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Nazwa',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Utworzono',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Zaktualizowano',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Nazwa',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Utworzono',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Zaktualizowano',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Nazwa Wyświetlana',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,4,'id','text','Id',1,0,0,0,0,0,'{}',1),(23,4,'name','text','Nazwa',1,1,1,1,1,1,'{}',2),(24,4,'description','text_area','Opis',0,1,1,1,1,1,'{}',3),(25,4,'created_at','timestamp','Dodano',0,1,1,0,0,0,'{}',4),(26,4,'updated_at','timestamp','Zaktualizowano',0,0,1,0,0,0,'{}',5),(27,5,'id','text','Id',1,0,0,0,0,0,'{}',1),(28,5,'title','text','Tytuł',1,1,1,1,1,1,'{}',3),(29,5,'price','number','Cena',1,1,1,1,1,1,'{}',4),(30,5,'description','text_area','Opis',0,0,1,1,1,1,'{}',5),(31,5,'quantity','number','Ilość',1,1,1,1,1,1,'{}',6),(32,5,'images','media_picker','Obrazy',0,1,1,1,1,1,'{\"max\":10,\"min\":0,\"expanded\":true,\"show_folders\":true,\"show_toolbar\":true,\"allow_upload\":true,\"allow_move\":true,\"allow_delete\":true,\"allow_create_folder\":true,\"allow_rename\":true,\"allow_crop\":true,\"allowed\":[],\"hide_thumbnails\":false,\"quality\":90,\"thumbnails\":[{\"type\":\"fit\",\"name\":\"cropped\",\"width\":\"300\",\"height\":\"250\",\"position\":\"center\"}]}',7),(33,5,'date','date','Data wydarzenia',1,1,1,1,1,1,'{}',8),(34,5,'featured','checkbox','Wyróżnienie',1,1,1,1,1,1,'{\"on\":\"TAK\",\"off\":\"NIE\",\"checked\":false}',9),(35,5,'category_id','text','Category Id',1,0,0,0,0,0,'{}',2),(36,5,'created_at','timestamp','Dodano',0,1,1,1,0,1,'{}',10),(37,5,'updated_at','timestamp','Zaktualizowano',0,0,0,0,0,0,'{}',11),(38,5,'product_belongsto_category_relationship','relationship','categories',0,1,1,1,1,1,'{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',12);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Tytuł Strony','GoEvents.pl','','text',1,'Site'),(2,'site.description','Opis Strony','Prosty sklep internetowy napisany przy użyciu frameworka Laravel oraz biblioteki jQuery.','','text',2,'Site'),(3,'site.logo','Logo Strony','settings/August2020/TPshDPuP9ysNIg7SLZPG.png','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',6,'Site'),(5,'admin.bg_image','Admin Grafika Tła','','','image',5,'Admin'),(6,'admin.title','Admin Tytuł','GoEvents.pl','','text',1,'Admin'),(7,'admin.description','Admin Opis','Witaj w Voyagerze. Zaginionym administratorze dla Laravela','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Grafika Ikony','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (dla panelu administracyjnego)',NULL,'','text',1,'Admin'),(11,'site.showtitle','Pokaż tytuł strony','0',NULL,'checkbox',4,'Site');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-08-11 05:28:11','2020-08-11 05:28:11'),(2,'user','Normalny Użytkownik','2020-08-11 05:28:11','2020-08-11 05:28:11');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(2,'browse_bread',NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(3,'browse_database',NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(4,'browse_media',NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(5,'browse_compass',NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(6,'browse_menus','menus','2020-08-11 05:28:11','2020-08-11 05:28:11'),(7,'read_menus','menus','2020-08-11 05:28:11','2020-08-11 05:28:11'),(8,'edit_menus','menus','2020-08-11 05:28:11','2020-08-11 05:28:11'),(9,'add_menus','menus','2020-08-11 05:28:11','2020-08-11 05:28:11'),(10,'delete_menus','menus','2020-08-11 05:28:11','2020-08-11 05:28:11'),(11,'browse_roles','roles','2020-08-11 05:28:11','2020-08-11 05:28:11'),(12,'read_roles','roles','2020-08-11 05:28:11','2020-08-11 05:28:11'),(13,'edit_roles','roles','2020-08-11 05:28:11','2020-08-11 05:28:11'),(14,'add_roles','roles','2020-08-11 05:28:11','2020-08-11 05:28:11'),(15,'delete_roles','roles','2020-08-11 05:28:11','2020-08-11 05:28:11'),(16,'browse_users','users','2020-08-11 05:28:11','2020-08-11 05:28:11'),(17,'read_users','users','2020-08-11 05:28:11','2020-08-11 05:28:11'),(18,'edit_users','users','2020-08-11 05:28:11','2020-08-11 05:28:11'),(19,'add_users','users','2020-08-11 05:28:11','2020-08-11 05:28:11'),(20,'delete_users','users','2020-08-11 05:28:11','2020-08-11 05:28:11'),(21,'browse_settings','settings','2020-08-11 05:28:11','2020-08-11 05:28:11'),(22,'read_settings','settings','2020-08-11 05:28:11','2020-08-11 05:28:11'),(23,'edit_settings','settings','2020-08-11 05:28:11','2020-08-11 05:28:11'),(24,'add_settings','settings','2020-08-11 05:28:11','2020-08-11 05:28:11'),(25,'delete_settings','settings','2020-08-11 05:28:11','2020-08-11 05:28:11'),(26,'browse_hooks',NULL,'2020-08-11 05:30:21','2020-08-11 05:30:21'),(27,'browse_categories','categories','2020-08-11 05:34:44','2020-08-11 05:34:44'),(28,'read_categories','categories','2020-08-11 05:34:44','2020-08-11 05:34:44'),(29,'edit_categories','categories','2020-08-11 05:34:44','2020-08-11 05:34:44'),(30,'add_categories','categories','2020-08-11 05:34:44','2020-08-11 05:34:44'),(31,'delete_categories','categories','2020-08-11 05:34:44','2020-08-11 05:34:44'),(32,'browse_products','products','2020-08-11 05:36:29','2020-08-11 05:36:29'),(33,'read_products','products','2020-08-11 05:36:29','2020-08-11 05:36:29'),(34,'edit_products','products','2020-08-11 05:36:29','2020-08-11 05:36:29'),(35,'add_products','products','2020-08-11 05:36:29','2020-08-11 05:36:29'),(36,'delete_products','products','2020-08-11 05:36:29','2020-08-11 05:36:29');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2020-08-11 05:28:11','2020-08-11 05:28:11');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Panel','','_self','voyager-boat',NULL,NULL,1,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.media.index',NULL),(3,1,'Uzytkownicy','','_self','voyager-person',NULL,NULL,3,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.users.index',NULL),(4,1,'Role','','_self','voyager-lock',NULL,NULL,2,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.roles.index',NULL),(5,1,'Narzędzia','','_self','voyager-tools',NULL,NULL,9,'2020-08-11 05:28:11','2020-08-11 05:28:11',NULL,NULL),(6,1,'Edytor Menu','','_self','voyager-list',NULL,5,10,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.menus.index',NULL),(7,1,'Baza Danych','','_self','voyager-data',NULL,5,11,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.database.index',NULL),(8,1,'Komaps','','_self','voyager-compass',NULL,5,12,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,13,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.bread.index',NULL),(10,1,'Ustawienia','','_self','voyager-settings',NULL,NULL,14,'2020-08-11 05:28:11','2020-08-11 05:28:11','voyager.settings.index',NULL),(11,1,'Hooks','','_self','voyager-hook',NULL,NULL,13,'2020-08-11 05:30:21','2020-08-11 05:30:21','voyager.hooks',NULL),(12,1,'Kategorie','','_self','voyager-categories',NULL,NULL,15,'2020-08-11 05:34:44','2020-08-11 05:34:44','voyager.categories.index',NULL),(13,1,'Produkty','','_self','voyager-shop',NULL,NULL,16,'2020-08-11 05:36:29','2020-08-11 05:36:29','voyager.products.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','Użytkownik','Użytkownicy','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(2,'menus','menus','Menu','Menu','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(3,'roles','roles','Rola','Role','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2020-08-11 05:28:11','2020-08-11 05:28:11'),(4,'categories','categories','Kategoria','Kategorie','voyager-categories','App\\Category',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-08-11 05:34:44','2020-08-11 05:36:40'),(5,'products','products','Produkt','Produkty','voyager-shop','App\\Product',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"created_at\",\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-08-11 05:36:29','2020-08-11 10:35:02');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-11 17:14:10
