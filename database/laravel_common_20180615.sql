-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

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
-- Table structure for table `catelory`
--

DROP TABLE IF EXISTS `catelory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catelory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catelory`
--

LOCK TABLES `catelory` WRITE;
/*!40000 ALTER TABLE `catelory` DISABLE KEYS */;
INSERT INTO `catelory` VALUES (1,'ELECTRONICS',1,20),(2,'TELEVISIONS',2,9),(3,'TUBE',3,4),(4,'LCD',5,6),(5,'PLASMA',7,8),(6,'PORTABLE ELECTRONICS',10,19),(7,'MP3 PLAYERS',11,14),(8,'FLASH',12,13),(9,'CD PLAYERS',15,16),(10,'2 WAY RADIOS',17,18);
/*!40000 ALTER TABLE `catelory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dev_translate_type`
--

DROP TABLE IF EXISTS `dev_translate_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dev_translate_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `comment` text,
  `has_input_type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dev_translate_type`
--

LOCK TABLES `dev_translate_type` WRITE;
/*!40000 ALTER TABLE `dev_translate_type` DISABLE KEYS */;
INSERT INTO `dev_translate_type` VALUES (1,'validation','type of message validation',1),(2,'label',NULL,NULL),(3,'auth',NULL,NULL),(4,'password',NULL,NULL);
/*!40000 ALTER TABLE `dev_translate_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dev_translation`
--

DROP TABLE IF EXISTS `dev_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dev_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_code` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'en',
  `translate_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `code` varchar(100) CHARACTER SET latin1 NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci,
  `input_type` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=591 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dev_translation`
--

LOCK TABLES `dev_translation` WRITE;
/*!40000 ALTER TABLE `dev_translation` DISABLE KEYS */;
INSERT INTO `dev_translation` VALUES (1,'en','auth','failed','These credentials do not match our records.','','2018-06-18 10:15:57',NULL,0),(2,'en','auth','throttle','Too many login attempts. Please try again in :seconds seconds.','','2018-06-18 10:15:57',NULL,0),(3,'en','pagination','previous','&laquo; Previous','','2018-06-18 10:15:57',NULL,0),(4,'en','pagination','next','Next &raquo;','','2018-06-18 10:15:57',NULL,0),(5,'en','passwords','password','Passwords must be at least six characters and match the confirmation.','','2018-06-18 10:15:57',NULL,0),(6,'en','passwords','reset','Your password has been reset!','','2018-06-18 10:15:57',NULL,0),(7,'en','passwords','sent','We have e-mailed your password reset link!','','2018-06-18 10:15:57',NULL,0),(8,'en','passwords','token','This password reset token is invalid.','','2018-06-18 10:15:57',NULL,0),(9,'en','passwords','user','We can\'t find a user with that e-mail address.','','2018-06-18 10:15:57',NULL,0),(10,'en','validation','accepted','The :attribute must be accepted.','','2018-06-18 10:15:57',NULL,0),(11,'en','validation','active_url','The :attribute is not a valid URL.','','2018-06-18 10:15:57',NULL,0),(12,'en','validation','after','The :attribute must be a date after :date.','','2018-06-18 10:15:57',NULL,0),(13,'en','validation','after_or_equal','The :attribute must be a date after or equal to :date.','','2018-06-18 10:15:57',NULL,0),(14,'en','validation','alpha','The :attribute may only contain letters.','','2018-06-18 10:15:57',NULL,0),(15,'en','validation','alpha_dash','The :attribute may only contain letters, numbers, dashes and underscores.','','2018-06-18 10:15:57',NULL,0),(16,'en','validation','alpha_num','The :attribute may only contain letters and numbers.','','2018-06-18 10:15:57',NULL,0),(17,'en','validation','array','The :attribute must be an array.','','2018-06-18 10:15:57',NULL,0),(18,'en','validation','before','The :attribute must be a date before :date.','','2018-06-18 10:15:57',NULL,0),(19,'en','validation','before_or_equal','The :attribute must be a date before or equal to :date.','','2018-06-18 10:15:57',NULL,0),(20,'en','validation','between','The :attribute must be between :min and :max.','numeric','2018-06-18 10:15:57',NULL,0),(21,'en','validation','between','The :attribute must be between :min and :max kilobytes.','file','2018-06-18 10:15:57',NULL,0),(22,'en','validation','between','The :attribute must be between :min and :max characters.','string','2018-06-18 10:15:57',NULL,0),(23,'en','validation','between','The :attribute must have between :min and :max items.','array','2018-06-18 10:15:57',NULL,0),(24,'en','validation','boolean','The :attribute field must be true or false.','','2018-06-18 10:15:57',NULL,0),(25,'en','validation','confirmed','The :attribute confirmation does not match.','','2018-06-18 10:15:57',NULL,0),(26,'en','validation','date','The :attribute is not a valid date.','','2018-06-18 10:15:57',NULL,0),(27,'en','validation','date_format','The :attribute does not match the format :format.','','2018-06-18 10:15:57',NULL,0),(28,'en','validation','different','The :attribute and :other must be different.','','2018-06-18 10:15:57',NULL,0),(29,'en','validation','digits','The :attribute must be :digits digits.','','2018-06-18 10:15:57',NULL,0),(30,'en','validation','digits_between','The :attribute must be between :min and :max digits.','','2018-06-18 10:15:57',NULL,0),(31,'en','validation','dimensions','The :attribute has invalid image dimensions.','','2018-06-18 10:15:57',NULL,0),(32,'en','validation','distinct','The :attribute field has a duplicate value.','','2018-06-18 10:15:57',NULL,0),(33,'en','validation','email','The :attribute must be a valid email address.','','2018-06-18 10:15:57',NULL,0),(34,'en','validation','exists','The selected :attribute is invalid.','','2018-06-18 10:15:57',NULL,0),(35,'en','validation','file','The :attribute must be a file.','','2018-06-18 10:15:57',NULL,0),(36,'en','validation','filled','The :attribute field must have a value.','','2018-06-18 10:15:57',NULL,0),(37,'en','validation','gt','The :attribute must be greater than :value.','numeric','2018-06-18 10:15:57',NULL,0),(38,'en','validation','gt','The :attribute must be greater than :value kilobytes.','file','2018-06-18 10:15:57',NULL,0),(39,'en','validation','gt','The :attribute must be greater than :value characters.','string','2018-06-18 10:15:57',NULL,0),(40,'en','validation','gt','The :attribute must have more than :value items.','array','2018-06-18 10:15:57',NULL,0),(41,'en','validation','gte','The :attribute must be greater than or equal :value.','numeric','2018-06-18 10:15:57',NULL,0),(42,'en','validation','gte','The :attribute must be greater than or equal :value kilobytes.','file','2018-06-18 10:15:57',NULL,0),(43,'en','validation','gte','The :attribute must be greater than or equal :value characters.','string','2018-06-18 10:15:57',NULL,0),(44,'en','validation','gte','The :attribute must have :value items or more.','array','2018-06-18 10:15:57',NULL,0),(45,'en','validation','image','The :attribute must be an image.','','2018-06-18 10:15:57',NULL,0),(46,'en','validation','in','The selected :attribute is invalid.','','2018-06-18 10:15:57',NULL,0),(47,'en','validation','in_array','The :attribute field does not exist in :other.','','2018-06-18 10:15:57',NULL,0),(48,'en','validation','integer','The :attribute must be an integer.','','2018-06-18 10:15:57',NULL,0),(49,'en','validation','ip','The :attribute must be a valid IP address.','','2018-06-18 10:15:57',NULL,0),(50,'en','validation','ipv4','The :attribute must be a valid IPv4 address.','','2018-06-18 10:15:57',NULL,0),(51,'en','validation','ipv6','The :attribute must be a valid IPv6 address.','','2018-06-18 10:15:57',NULL,0),(52,'en','validation','json','The :attribute must be a valid JSON string.','','2018-06-18 10:15:57',NULL,0),(53,'en','validation','lt','The :attribute must be less than :value.','numeric','2018-06-18 10:15:57',NULL,0),(54,'en','validation','lt','The :attribute must be less than :value kilobytes.','file','2018-06-18 10:15:57','2018-06-18 17:50:15',0),(55,'en','validation','lt','The :attribute must be less than :value characters.','string','2018-06-18 10:15:57',NULL,0),(56,'en','validation','lt','The :attribute must have less than :value items.','array','2018-06-18 10:15:57',NULL,0),(57,'en','validation','lte','The :attribute must be less than or equal :value.','numeric','2018-06-18 10:15:57',NULL,0),(58,'en','validation','lte','The :attribute must be less than or equal :value kilobytes.','file','2018-06-18 10:15:57',NULL,0),(59,'en','validation','lte','The :attribute must be less than or equal :value characters.','string','2018-06-18 10:15:57',NULL,0),(60,'en','validation','lte','The :attribute must not have more than :value items.','array','2018-06-18 10:15:57',NULL,0),(61,'en','validation','max','The :attribute may not be greater than :max.','numeric','2018-06-18 10:15:57',NULL,0),(62,'en','validation','max','The :attribute may not be greater than :max kilobytes.','file','2018-06-18 10:15:57',NULL,0),(63,'en','validation','max','The :attribute may not be greater than :max characters.','string','2018-06-18 10:15:57',NULL,0),(64,'en','validation','max','The :attribute may not have more than :max items.','array','2018-06-18 10:15:57',NULL,0),(65,'en','validation','mimes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:57',NULL,0),(66,'en','validation','mimetypes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:57',NULL,0),(67,'en','validation','min','The :attribute must be at least :min.','numeric','2018-06-18 10:15:57',NULL,0),(68,'en','validation','min','The :attribute must be at least :min kilobytes.','file','2018-06-18 10:15:57',NULL,0),(69,'en','validation','min','The :attribute must be at least :min characters.','string','2018-06-18 10:15:57',NULL,0),(70,'en','validation','min','The :attribute must have at least :min items.','array','2018-06-18 10:15:57',NULL,0),(71,'en','validation','not_in','The selected :attribute is invalid.','','2018-06-18 10:15:57',NULL,0),(72,'en','validation','not_regex','The :attribute format is invalid.','','2018-06-18 10:15:57',NULL,0),(73,'en','validation','numeric','The :attribute must be a number.','','2018-06-18 10:15:57',NULL,0),(74,'en','validation','present','The :attribute field must be present.','','2018-06-18 10:15:57',NULL,0),(75,'en','validation','regex','The :attribute format is invalid.','','2018-06-18 10:15:57',NULL,0),(76,'en','validation','required','The :attribute field is required.','','2018-06-18 10:15:57',NULL,0),(77,'en','validation','required_if','The :attribute field is required when :other is :value.','','2018-06-18 10:15:57',NULL,0),(78,'en','validation','required_unless','The :attribute field is required unless :other is in :values.','','2018-06-18 10:15:57',NULL,0),(79,'en','validation','required_with','The :attribute field is required when :values is present.','','2018-06-18 10:15:57',NULL,0),(80,'en','validation','required_with_all','The :attribute field is required when :values is present.','','2018-06-18 10:15:57',NULL,0),(81,'en','validation','required_without','The :attribute field is required when :values is not present.','','2018-06-18 10:15:57',NULL,0),(82,'en','validation','required_without_all','The :attribute field is required when none of :values are present.','','2018-06-18 10:15:57',NULL,0),(83,'en','validation','same','The :attribute and :other must match.','','2018-06-18 10:15:57',NULL,0),(84,'en','validation','size','The :attribute must be :size.','numeric','2018-06-18 10:15:57',NULL,0),(85,'en','validation','size','The :attribute must be :size kilobytes.','file','2018-06-18 10:15:57',NULL,0),(86,'en','validation','size','The :attribute must be :size characters.','string','2018-06-18 10:15:57',NULL,0),(87,'en','validation','size','The :attribute must contain :size items.','array','2018-06-18 10:15:57',NULL,0),(88,'en','validation','string','The :attribute must be a string.','','2018-06-18 10:15:57',NULL,0),(89,'en','validation','timezone','The :attribute must be a valid zone.','','2018-06-18 10:15:57',NULL,0),(90,'en','validation','unique','The :attribute has already been taken.','','2018-06-18 10:15:57',NULL,0),(91,'en','validation','uploaded','The :attribute failed to upload.','','2018-06-18 10:15:57',NULL,0),(92,'en','validation','url','The :attribute format is invalid.','','2018-06-18 10:15:57',NULL,0),(93,'en','validation_test','accepted','The :attribute must be accepted.','','2018-06-18 10:15:57',NULL,0),(94,'en','validation_test','active_url','The :attribute is not a valid URL.','','2018-06-18 10:15:57',NULL,0),(95,'en','validation_test','after','The :attribute must be a date after :date.','','2018-06-18 10:15:57',NULL,0),(96,'en','validation_test','after_or_equal','The :attribute must be a date after or equal to :date.','','2018-06-18 10:15:57',NULL,0),(97,'en','validation_test','alpha','The :attribute may only contain letters.','','2018-06-18 10:15:57',NULL,0),(98,'en','validation_test','alpha_dash','The :attribute may only contain letters, numbers, dashes and underscores.','','2018-06-18 10:15:57',NULL,0),(99,'en','validation_test','alpha_num','The :attribute may only contain letters and numbers.','','2018-06-18 10:15:57',NULL,0),(100,'en','validation_test','array','The :attribute must be an array.','','2018-06-18 10:15:57',NULL,0),(101,'en','validation_test','before','The :attribute must be a date before :date.','','2018-06-18 10:15:57',NULL,0),(102,'en','validation_test','before_or_equal','The :attribute must be a date before or equal to :date.','','2018-06-18 10:15:57',NULL,0),(103,'en','validation_test','between','The :attribute must have between :min and :max items.','array','2018-06-18 10:15:57',NULL,0),(104,'en','validation_test','between','The :attribute must be between :min and :max kilobytes.','file','2018-06-18 10:15:57',NULL,0),(105,'en','validation_test','between','The :attribute must be between :min and :max.','numeric','2018-06-18 10:15:57',NULL,0),(106,'en','validation_test','between','The :attribute must be between :min and :max characters.','string','2018-06-18 10:15:57',NULL,0),(107,'en','validation_test','boolean','The :attribute field must be true or false.','','2018-06-18 10:15:57',NULL,0),(108,'en','validation_test','confirmed','The :attribute confirmation does not match.','','2018-06-18 10:15:57',NULL,0),(109,'en','validation_test','date','The :attribute is not a valid date.','','2018-06-18 10:15:57',NULL,0),(110,'en','validation_test','date_format','The :attribute does not match the format :format.','','2018-06-18 10:15:57',NULL,0),(111,'en','validation_test','different','The :attribute and :other must be different.','','2018-06-18 10:15:57',NULL,0),(112,'en','validation_test','digits','The :attribute must be :digits digits.','','2018-06-18 10:15:57',NULL,0),(113,'en','validation_test','digits_between','The :attribute must be between :min and :max digits.','','2018-06-18 10:15:57',NULL,0),(114,'en','validation_test','dimensions','The :attribute has invalid image dimensions.','','2018-06-18 10:15:57',NULL,0),(115,'en','validation_test','distinct','The :attribute field has a duplicate value.','','2018-06-18 10:15:57',NULL,0),(116,'en','validation_test','email','The :attribute must be a valid email address.','','2018-06-18 10:15:57',NULL,0),(117,'en','validation_test','exists','The selected :attribute is invalid.','','2018-06-18 10:15:57',NULL,0),(118,'en','validation_test','file','The :attribute must be a file.','','2018-06-18 10:15:57',NULL,0),(119,'en','validation_test','filled','The :attribute field must have a value.','','2018-06-18 10:15:57',NULL,0),(120,'en','validation_test','gt','The :attribute must have more than :value items.','array','2018-06-18 10:15:57',NULL,0),(121,'en','validation_test','gt','The :attribute must be greater than :value kilobytes.','file','2018-06-18 10:15:57',NULL,0),(122,'en','validation_test','gt','The :attribute must be greater than :value.','numeric','2018-06-18 10:15:57',NULL,0),(123,'en','validation_test','gt','The :attribute must be greater than :value characters.','string','2018-06-18 10:15:57',NULL,0),(124,'en','validation_test','gte','The :attribute must have :value items or more.','array','2018-06-18 10:15:57',NULL,0),(125,'en','validation_test','gte','The :attribute must be greater than or equal :value kilobytes.','file','2018-06-18 10:15:57',NULL,0),(126,'en','validation_test','gte','The :attribute must be greater than or equal :value.','numeric','2018-06-18 10:15:57',NULL,0),(127,'en','validation_test','gte','The :attribute must be greater than or equal :value characters.','string','2018-06-18 10:15:57',NULL,0),(128,'en','validation_test','image','The :attribute must be an image.','','2018-06-18 10:15:57',NULL,0),(129,'en','validation_test','in','The selected :attribute is invalid.','','2018-06-18 10:15:57',NULL,0),(130,'en','validation_test','integer','The :attribute must be an integer.','','2018-06-18 10:15:57',NULL,0),(131,'en','validation_test','in_array','The :attribute field does not exist in :other.','','2018-06-18 10:15:57',NULL,0),(132,'en','validation_test','ip','The :attribute must be a valid IP address.','','2018-06-18 10:15:57',NULL,0),(133,'en','validation_test','ipv4','The :attribute must be a valid IPv4 address.','','2018-06-18 10:15:57',NULL,0),(134,'en','validation_test','ipv6','The :attribute must be a valid IPv6 address.','','2018-06-18 10:15:57',NULL,0),(135,'en','validation_test','json','The :attribute must be a valid JSON string.','','2018-06-18 10:15:57',NULL,0),(136,'en','validation_test','lt','The :attribute must have less than :value items.','array','2018-06-18 10:15:57',NULL,0),(137,'en','validation_test','lt','The :attribute must be less than :value kilobytes.','file','2018-06-18 10:15:57',NULL,0),(138,'en','validation_test','lt','The :attribute must be less than :value.','numeric','2018-06-18 10:15:57',NULL,0),(139,'en','validation_test','lt','The :attribute must be less than :value characters.','string','2018-06-18 10:15:57',NULL,0),(140,'en','validation_test','lte','The :attribute must not have more than :value items.','array','2018-06-18 10:15:57',NULL,0),(141,'en','validation_test','lte','The :attribute must be less than or equal :value kilobytes.','file','2018-06-18 10:15:57',NULL,0),(142,'en','validation_test','lte','The :attribute must be less than or equal :value.','numeric','2018-06-18 10:15:57',NULL,0),(143,'en','validation_test','lte','The :attribute must be less than or equal :value characters.','string','2018-06-18 10:15:57',NULL,0),(144,'en','validation_test','max','The :attribute may not have more than :max items.','array','2018-06-18 10:15:57',NULL,0),(145,'en','validation_test','max','The :attribute may not be greater than :max kilobytes.','file','2018-06-18 10:15:57',NULL,0),(146,'en','validation_test','max','The :attribute may not be greater than :max.','numeric','2018-06-18 10:15:57',NULL,0),(147,'en','validation_test','max','The :attribute may not be greater than :max characters.','string','2018-06-18 10:15:57',NULL,0),(148,'en','validation_test','mimes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:57',NULL,0),(149,'en','validation_test','mimetypes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:57',NULL,0),(150,'en','validation_test','min','The :attribute must have at least :min items.','array','2018-06-18 10:15:57',NULL,0),(151,'en','validation_test','min','The :attribute must be at least :min kilobytes.','file','2018-06-18 10:15:57',NULL,0),(152,'en','validation_test','min','The :attribute must be at least :min.','numeric','2018-06-18 10:15:57',NULL,0),(153,'en','validation_test','min','The :attribute must be at least :min characters.','string','2018-06-18 10:15:57',NULL,0),(154,'en','validation_test','not_in','The selected :attribute is invalid.','','2018-06-18 10:15:57',NULL,0),(155,'en','validation_test','not_regex','The :attribute format is invalid.','','2018-06-18 10:15:57',NULL,0),(156,'en','validation_test','numeric','The :attribute must be a number.','','2018-06-18 10:15:57',NULL,0),(157,'en','validation_test','present','The :attribute field must be present.','','2018-06-18 10:15:57',NULL,0),(158,'en','validation_test','regex','The :attribute format is invalid.','','2018-06-18 10:15:57',NULL,0),(159,'en','validation_test','required','The :attribute field is required.','','2018-06-18 10:15:57',NULL,0),(160,'en','validation_test','required_if','The :attribute field is required when :other is :value.','','2018-06-18 10:15:57',NULL,0),(161,'en','validation_test','required_unless','The :attribute field is required unless :other is in :values.','','2018-06-18 10:15:57',NULL,0),(162,'en','validation_test','required_with','The :attribute field is required when :values is present.','','2018-06-18 10:15:57',NULL,0),(163,'en','validation_test','required_without','The :attribute field is required when :values is not present.','','2018-06-18 10:15:57',NULL,0),(164,'en','validation_test','required_without_all','The :attribute field is required when none of :values are present.','','2018-06-18 10:15:57',NULL,0),(165,'en','validation_test','required_with_all','The :attribute field is required when :values is present.','','2018-06-18 10:15:57',NULL,0),(166,'en','validation_test','same','The :attribute and :other must match.','','2018-06-18 10:15:57',NULL,0),(167,'en','validation_test','size','The :attribute must contain :size items.','array','2018-06-18 10:15:57',NULL,0),(168,'en','validation_test','size','The :attribute must be :size kilobytes.','file','2018-06-18 10:15:57',NULL,0),(169,'en','validation_test','size','The :attribute must be :size.','numeric','2018-06-18 10:15:57',NULL,0),(170,'en','validation_test','size','The :attribute must be :size characters.','string','2018-06-18 10:15:57',NULL,0),(171,'en','validation_test','string','The :attribute must be a string.','','2018-06-18 10:15:57',NULL,0),(172,'en','validation_test','timezone','The :attribute must be a valid zone.','','2018-06-18 10:15:57',NULL,0),(173,'en','validation_test','unique','The :attribute has already been taken.','','2018-06-18 10:15:57',NULL,0),(174,'en','validation_test','uploaded','The :attribute failed to upload.','','2018-06-18 10:15:57',NULL,0),(175,'en','validation_test','url','The :attribute format is invalid.','','2018-06-18 10:15:57',NULL,0),(176,'en','validation_tmp','accepted','The :attribute must be accepted.','','2018-06-18 10:15:58',NULL,0),(177,'en','validation_tmp','active_url','The :attribute is not a valid URL.','','2018-06-18 10:15:58',NULL,0),(178,'en','validation_tmp','after','The :attribute must be a date after :date.','','2018-06-18 10:15:58',NULL,0),(179,'en','validation_tmp','after_or_equal','The :attribute must be a date after or equal to :date.','','2018-06-18 10:15:58',NULL,0),(180,'en','validation_tmp','alpha','The :attribute may only contain letters.','','2018-06-18 10:15:58',NULL,0),(181,'en','validation_tmp','alpha_dash','The :attribute may only contain letters, numbers, dashes and underscores.','','2018-06-18 10:15:58',NULL,0),(182,'en','validation_tmp','alpha_num','The :attribute may only contain letters and numbers.','','2018-06-18 10:15:58',NULL,0),(183,'en','validation_tmp','array','The :attribute must be an array.','','2018-06-18 10:15:58',NULL,0),(184,'en','validation_tmp','before','The :attribute must be a date before :date.','','2018-06-18 10:15:58',NULL,0),(185,'en','validation_tmp','before_or_equal','The :attribute must be a date before or equal to :date.','','2018-06-18 10:15:58',NULL,0),(186,'en','validation_tmp','between','The :attribute must be between :min and :max.','numeric','2018-06-18 10:15:58',NULL,0),(187,'en','validation_tmp','between','The :attribute must be between :min and :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(188,'en','validation_tmp','between','The :attribute must be between :min and :max characters.','string','2018-06-18 10:15:58',NULL,0),(189,'en','validation_tmp','between','The :attribute must have between :min and :max items.','array','2018-06-18 10:15:58',NULL,0),(190,'en','validation_tmp','boolean','The :attribute field must be true or false.','','2018-06-18 10:15:58',NULL,0),(191,'en','validation_tmp','confirmed','The :attribute confirmation does not match.','','2018-06-18 10:15:58',NULL,0),(192,'en','validation_tmp','date','The :attribute is not a valid date.','','2018-06-18 10:15:58',NULL,0),(193,'en','validation_tmp','date_format','The :attribute does not match the format :format.','','2018-06-18 10:15:58',NULL,0),(194,'en','validation_tmp','different','The :attribute and :other must be different.','','2018-06-18 10:15:58',NULL,0),(195,'en','validation_tmp','digits','The :attribute must be :digits digits.','','2018-06-18 10:15:58',NULL,0),(196,'en','validation_tmp','digits_between','The :attribute must be between :min and :max digits.','','2018-06-18 10:15:58',NULL,0),(197,'en','validation_tmp','dimensions','The :attribute has invalid image dimensions.','','2018-06-18 10:15:58',NULL,0),(198,'en','validation_tmp','distinct','The :attribute field has a duplicate value.','','2018-06-18 10:15:58',NULL,0),(199,'en','validation_tmp','email','The :attribute must be a valid email address.','','2018-06-18 10:15:58',NULL,0),(200,'en','validation_tmp','exists','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(201,'en','validation_tmp','file','The :attribute must be a file.','','2018-06-18 10:15:58',NULL,0),(202,'en','validation_tmp','filled','The :attribute field must have a value.','','2018-06-18 10:15:58',NULL,0),(203,'en','validation_tmp','gt','The :attribute must be greater than :value.','numeric','2018-06-18 10:15:58',NULL,0),(204,'en','validation_tmp','gt','The :attribute must be greater than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(205,'en','validation_tmp','gt','The :attribute must be greater than :value characters.','string','2018-06-18 10:15:58',NULL,0),(206,'en','validation_tmp','gt','The :attribute must have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(207,'en','validation_tmp','gte','The :attribute must be greater than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(208,'en','validation_tmp','gte','The :attribute must be greater than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(209,'en','validation_tmp','gte','The :attribute must be greater than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(210,'en','validation_tmp','gte','The :attribute must have :value items or more.','array','2018-06-18 10:15:58',NULL,0),(211,'en','validation_tmp','image','The :attribute must be an image.','','2018-06-18 10:15:58',NULL,0),(212,'en','validation_tmp','in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(213,'en','validation_tmp','in_array','The :attribute field does not exist in :other.','','2018-06-18 10:15:58',NULL,0),(214,'en','validation_tmp','integer','The :attribute must be an integer.','','2018-06-18 10:15:58',NULL,0),(215,'en','validation_tmp','ip','The :attribute must be a valid IP address.','','2018-06-18 10:15:58',NULL,0),(216,'en','validation_tmp','ipv4','The :attribute must be a valid IPv4 address.','','2018-06-18 10:15:58',NULL,0),(217,'en','validation_tmp','ipv6','The :attribute must be a valid IPv6 address.','','2018-06-18 10:15:58',NULL,0),(218,'en','validation_tmp','json','The :attribute must be a valid JSON string.','','2018-06-18 10:15:58',NULL,0),(219,'en','validation_tmp','lt','The :attribute must be less than :value.','numeric','2018-06-18 10:15:58',NULL,0),(220,'en','validation_tmp','lt','The :attribute must be less than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(221,'en','validation_tmp','lt','The :attribute must be less than :value characters.','string','2018-06-18 10:15:58',NULL,0),(222,'en','validation_tmp','lt','The :attribute must have less than :value items.','array','2018-06-18 10:15:58',NULL,0),(223,'en','validation_tmp','lte','The :attribute must be less than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(224,'en','validation_tmp','lte','The :attribute must be less than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(225,'en','validation_tmp','lte','The :attribute must be less than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(226,'en','validation_tmp','lte','The :attribute must not have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(227,'en','validation_tmp','max','The :attribute may not be greater than :max.','numeric','2018-06-18 10:15:58',NULL,0),(228,'en','validation_tmp','max','The :attribute may not be greater than :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(229,'en','validation_tmp','max','The :attribute may not be greater than :max characters.','string','2018-06-18 10:15:58',NULL,0),(230,'en','validation_tmp','max','The :attribute may not have more than :max items.','array','2018-06-18 10:15:58',NULL,0),(231,'en','validation_tmp','mimes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(232,'en','validation_tmp','mimetypes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(233,'en','validation_tmp','min','The :attribute must be at least :min.','numeric','2018-06-18 10:15:58',NULL,0),(234,'en','validation_tmp','min','The :attribute must be at least :min kilobytes.','file','2018-06-18 10:15:58',NULL,0),(235,'en','validation_tmp','min','The :attribute must be at least :min characters.','string','2018-06-18 10:15:58',NULL,0),(236,'en','validation_tmp','min','The :attribute must have at least :min items.','array','2018-06-18 10:15:58',NULL,0),(237,'en','validation_tmp','not_in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(238,'en','validation_tmp','not_regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(239,'en','validation_tmp','numeric','The :attribute must be a number.','','2018-06-18 10:15:58',NULL,0),(240,'en','validation_tmp','present','The :attribute field must be present.','','2018-06-18 10:15:58',NULL,0),(241,'en','validation_tmp','regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(242,'en','validation_tmp','required','The :attribute field is required.','','2018-06-18 10:15:58',NULL,0),(243,'en','validation_tmp','required_if','The :attribute field is required when :other is :value.','','2018-06-18 10:15:58',NULL,0),(244,'en','validation_tmp','required_unless','The :attribute field is required unless :other is in :values.','','2018-06-18 10:15:58',NULL,0),(245,'en','validation_tmp','required_with','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(246,'en','validation_tmp','required_with_all','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(247,'en','validation_tmp','required_without','The :attribute field is required when :values is not present.','','2018-06-18 10:15:58',NULL,0),(248,'en','validation_tmp','required_without_all','The :attribute field is required when none of :values are present.','','2018-06-18 10:15:58',NULL,0),(249,'en','validation_tmp','same','The :attribute and :other must match.','','2018-06-18 10:15:58',NULL,0),(250,'en','validation_tmp','size','The :attribute must be :size.','numeric','2018-06-18 10:15:58',NULL,0),(251,'en','validation_tmp','size','The :attribute must be :size kilobytes.','file','2018-06-18 10:15:58',NULL,0),(252,'en','validation_tmp','size','The :attribute must be :size characters.','string','2018-06-18 10:15:58',NULL,0),(253,'en','validation_tmp','size','The :attribute must contain :size items.','array','2018-06-18 10:15:58',NULL,0),(254,'en','validation_tmp','string','The :attribute must be a string.','','2018-06-18 10:15:58',NULL,0),(255,'en','validation_tmp','timezone','The :attribute must be a valid zone.','','2018-06-18 10:15:58',NULL,0),(256,'en','validation_tmp','unique','The :attribute has already been taken.','','2018-06-18 10:15:58',NULL,0),(257,'en','validation_tmp','uploaded','The :attribute failed to upload.','','2018-06-18 10:15:58',NULL,0),(258,'en','validation_tmp','url','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(259,'fr','validation','accepted','FR - text','','2018-06-18 10:15:58',NULL,0),(260,'fr','validation','active_url','The :attribute is not a valid URL.','','2018-06-18 10:15:58',NULL,0),(261,'fr','validation','after','The :attribute must be a date after :date.','','2018-06-18 10:15:58',NULL,0),(262,'fr','validation','after_or_equal','The :attribute must be a date after or equal to :date.','','2018-06-18 10:15:58',NULL,0),(263,'fr','validation','alpha','The :attribute may only contain letters.','','2018-06-18 10:15:58',NULL,0),(264,'fr','validation','alpha_dash','The :attribute may only contain letters, numbers, dashes and underscores.','','2018-06-18 10:15:58',NULL,0),(265,'fr','validation','alpha_num','The :attribute may only contain letters and numbers.','','2018-06-18 10:15:58',NULL,0),(266,'fr','validation','array','The :attribute must be an array.','','2018-06-18 10:15:58',NULL,0),(267,'fr','validation','before','The :attribute must be a date before :date.','','2018-06-18 10:15:58',NULL,0),(268,'fr','validation','before_or_equal','The :attribute must be a date before or equal to :date.','','2018-06-18 10:15:58',NULL,0),(269,'fr','validation','between','The :attribute must be between :min and :max.','numeric','2018-06-18 10:15:58',NULL,0),(270,'fr','validation','between','The :attribute must be between :min and :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(271,'fr','validation','between','The :attribute must be between :min and :max characters.','string','2018-06-18 10:15:58',NULL,0),(272,'fr','validation','between','The :attribute must have between :min and :max items.','array','2018-06-18 10:15:58',NULL,0),(273,'fr','validation','boolean','The :attribute field must be true or false.','','2018-06-18 10:15:58',NULL,0),(274,'fr','validation','confirmed','The :attribute confirmation does not match.','','2018-06-18 10:15:58',NULL,0),(275,'fr','validation','date','The :attribute is not a valid date.','','2018-06-18 10:15:58',NULL,0),(276,'fr','validation','date_format','The :attribute does not match the format :format.','','2018-06-18 10:15:58',NULL,0),(277,'fr','validation','different','The :attribute and :other must be different.','','2018-06-18 10:15:58',NULL,0),(278,'fr','validation','digits','The :attribute must be :digits digits.','','2018-06-18 10:15:58',NULL,0),(279,'fr','validation','digits_between','The :attribute must be between :min and :max digits.','','2018-06-18 10:15:58',NULL,0),(280,'fr','validation','dimensions','The :attribute has invalid image dimensions.','','2018-06-18 10:15:58',NULL,0),(281,'fr','validation','distinct','The :attribute field has a duplicate value.','','2018-06-18 10:15:58',NULL,0),(282,'fr','validation','email','The :attribute must be a valid email address.','','2018-06-18 10:15:58',NULL,0),(283,'fr','validation','exists','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(284,'fr','validation','file','The :attribute must be a file.','','2018-06-18 10:15:58',NULL,0),(285,'fr','validation','filled','The :attribute field must have a value.','','2018-06-18 10:15:58',NULL,0),(286,'fr','validation','gt','The :attribute must be greater than :value.','numeric','2018-06-18 10:15:58',NULL,0),(287,'fr','validation','gt','The :attribute must be greater than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(288,'fr','validation','gt','The :attribute must be greater than :value characters.','string','2018-06-18 10:15:58',NULL,0),(289,'fr','validation','gt','The :attribute must have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(290,'fr','validation','gte','The :attribute must be greater than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(291,'fr','validation','gte','The :attribute must be greater than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(292,'fr','validation','gte','The :attribute must be greater than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(293,'fr','validation','gte','The :attribute must have :value items or more.','array','2018-06-18 10:15:58',NULL,0),(294,'fr','validation','image','The :attribute must be an image.','','2018-06-18 10:15:58',NULL,0),(295,'fr','validation','in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(296,'fr','validation','in_array','The :attribute field does not exist in :other.','','2018-06-18 10:15:58',NULL,0),(297,'fr','validation','integer','The :attribute must be an integer.','','2018-06-18 10:15:58',NULL,0),(298,'fr','validation','ip','The :attribute must be a valid IP address.','','2018-06-18 10:15:58',NULL,0),(299,'fr','validation','ipv4','The :attribute must be a valid IPv4 address.','','2018-06-18 10:15:58',NULL,0),(300,'fr','validation','ipv6','The :attribute must be a valid IPv6 address.','','2018-06-18 10:15:58',NULL,0),(301,'fr','validation','json','The :attribute must be a valid JSON string.','','2018-06-18 10:15:58',NULL,0),(302,'fr','validation','lt','The :attribute must be less than :value.','numeric','2018-06-18 10:15:58',NULL,0),(303,'fr','validation','lt','The :attribute must be less than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(304,'fr','validation','lt','The :attribute must be less than :value characters.','string','2018-06-18 10:15:58',NULL,0),(305,'fr','validation','lt','The :attribute must have less than :value items.','array','2018-06-18 10:15:58',NULL,0),(306,'fr','validation','lte','The :attribute must be less than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(307,'fr','validation','lte','The :attribute must be less than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(308,'fr','validation','lte','The :attribute must be less than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(309,'fr','validation','lte','The :attribute must not have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(310,'fr','validation','max','The :attribute may not be greater than :max.','numeric','2018-06-18 10:15:58',NULL,0),(311,'fr','validation','max','The :attribute may not be greater than :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(312,'fr','validation','max','The :attribute may not be greater than :max characters.','string','2018-06-18 10:15:58',NULL,0),(313,'fr','validation','max','The :attribute may not have more than :max items.','array','2018-06-18 10:15:58',NULL,0),(314,'fr','validation','mimes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(315,'fr','validation','mimetypes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(316,'fr','validation','min','The :attribute must be at least :min.','numeric','2018-06-18 10:15:58',NULL,0),(317,'fr','validation','min','The :attribute must be at least :min kilobytes.','file','2018-06-18 10:15:58',NULL,0),(318,'fr','validation','min','The :attribute must be at least :min characters.','string','2018-06-18 10:15:58',NULL,0),(319,'fr','validation','min','The :attribute must have at least :min items.','array','2018-06-18 10:15:58',NULL,0),(320,'fr','validation','not_in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(321,'fr','validation','not_regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(322,'fr','validation','numeric','The :attribute must be a number.','','2018-06-18 10:15:58',NULL,0),(323,'fr','validation','present','The :attribute field must be present.','','2018-06-18 10:15:58',NULL,0),(324,'fr','validation','regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(325,'fr','validation','required','The :attribute field is required.','','2018-06-18 10:15:58',NULL,0),(326,'fr','validation','required_if','The :attribute field is required when :other is :value.','','2018-06-18 10:15:58',NULL,0),(327,'fr','validation','required_unless','The :attribute field is required unless :other is in :values.','','2018-06-18 10:15:58',NULL,0),(328,'fr','validation','required_with','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(329,'fr','validation','required_with_all','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(330,'fr','validation','required_without','The :attribute field is required when :values is not present.','','2018-06-18 10:15:58',NULL,0),(331,'fr','validation','required_without_all','The :attribute field is required when none of :values are present.','','2018-06-18 10:15:58',NULL,0),(332,'fr','validation','same','The :attribute and :other must match.','','2018-06-18 10:15:58',NULL,0),(333,'fr','validation','size','The :attribute must be :size.','numeric','2018-06-18 10:15:58',NULL,0),(334,'fr','validation','size','The :attribute must be :size kilobytes.','file','2018-06-18 10:15:58',NULL,0),(335,'fr','validation','size','The :attribute must be :size characters.','string','2018-06-18 10:15:58',NULL,0),(336,'fr','validation','size','The :attribute must contain :size items.','array','2018-06-18 10:15:58',NULL,0),(337,'fr','validation','string','The :attribute must be a string.','','2018-06-18 10:15:58',NULL,0),(338,'fr','validation','timezone','The :attribute must be a valid zone.','','2018-06-18 10:15:58',NULL,0),(339,'fr','validation','unique','The :attribute has already been taken.','','2018-06-18 10:15:58',NULL,0),(340,'fr','validation','uploaded','The :attribute failed to upload.','','2018-06-18 10:15:58',NULL,0),(341,'fr','validation','url','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(342,'fr','validation_test','accepted','The :attribute must be accepted.','','2018-06-18 10:15:58',NULL,0),(343,'fr','validation_test','active_url','The :attribute is not a valid URL.','','2018-06-18 10:15:58',NULL,0),(344,'fr','validation_test','after','The :attribute must be a date after :date.','','2018-06-18 10:15:58',NULL,0),(345,'fr','validation_test','after_or_equal','The :attribute must be a date after or equal to :date.','','2018-06-18 10:15:58',NULL,0),(346,'fr','validation_test','alpha','The :attribute may only contain letters.','','2018-06-18 10:15:58',NULL,0),(347,'fr','validation_test','alpha_dash','The :attribute may only contain letters, numbers, dashes and underscores.','','2018-06-18 10:15:58',NULL,0),(348,'fr','validation_test','alpha_num','The :attribute may only contain letters and numbers.','','2018-06-18 10:15:58',NULL,0),(349,'fr','validation_test','array','The :attribute must be an array.','','2018-06-18 10:15:58',NULL,0),(350,'fr','validation_test','before','The :attribute must be a date before :date.','','2018-06-18 10:15:58',NULL,0),(351,'fr','validation_test','before_or_equal','The :attribute must be a date before or equal to :date.','','2018-06-18 10:15:58',NULL,0),(352,'fr','validation_test','between','The :attribute must have between :min and :max items.','array','2018-06-18 10:15:58',NULL,0),(353,'fr','validation_test','between','The :attribute must be between :min and :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(354,'fr','validation_test','between','The :attribute must be between :min and :max.','numeric','2018-06-18 10:15:58',NULL,0),(355,'fr','validation_test','between','The :attribute must be between :min and :max characters.','string','2018-06-18 10:15:58',NULL,0),(356,'fr','validation_test','boolean','The :attribute field must be true or false.','','2018-06-18 10:15:58',NULL,0),(357,'fr','validation_test','confirmed','The :attribute confirmation does not match.','','2018-06-18 10:15:58',NULL,0),(358,'fr','validation_test','date','The :attribute is not a valid date.','','2018-06-18 10:15:58',NULL,0),(359,'fr','validation_test','date_format','The :attribute does not match the format :format.','','2018-06-18 10:15:58',NULL,0),(360,'fr','validation_test','different','The :attribute and :other must be different.','','2018-06-18 10:15:58',NULL,0),(361,'fr','validation_test','digits','The :attribute must be :digits digits.','','2018-06-18 10:15:58',NULL,0),(362,'fr','validation_test','digits_between','The :attribute must be between :min and :max digits.','','2018-06-18 10:15:58',NULL,0),(363,'fr','validation_test','dimensions','The :attribute has invalid image dimensions.','','2018-06-18 10:15:58',NULL,0),(364,'fr','validation_test','distinct','The :attribute field has a duplicate value.','','2018-06-18 10:15:58',NULL,0),(365,'fr','validation_test','email','The :attribute must be a valid email address.','','2018-06-18 10:15:58',NULL,0),(366,'fr','validation_test','exists','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(367,'fr','validation_test','file','The :attribute must be a file.','','2018-06-18 10:15:58',NULL,0),(368,'fr','validation_test','filled','The :attribute field must have a value.','','2018-06-18 10:15:58',NULL,0),(369,'fr','validation_test','gt','The :attribute must have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(370,'fr','validation_test','gt','The :attribute must be greater than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(371,'fr','validation_test','gt','The :attribute must be greater than :value.','numeric','2018-06-18 10:15:58',NULL,0),(372,'fr','validation_test','gt','The :attribute must be greater than :value characters.','string','2018-06-18 10:15:58',NULL,0),(373,'fr','validation_test','gte','The :attribute must have :value items or more.','array','2018-06-18 10:15:58',NULL,0),(374,'fr','validation_test','gte','The :attribute must be greater than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(375,'fr','validation_test','gte','The :attribute must be greater than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(376,'fr','validation_test','gte','The :attribute must be greater than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(377,'fr','validation_test','image','The :attribute must be an image.','','2018-06-18 10:15:58',NULL,0),(378,'fr','validation_test','in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(379,'fr','validation_test','integer','The :attribute must be an integer.','','2018-06-18 10:15:58',NULL,0),(380,'fr','validation_test','in_array','The :attribute field does not exist in :other.','','2018-06-18 10:15:58',NULL,0),(381,'fr','validation_test','ip','The :attribute must be a valid IP address.','','2018-06-18 10:15:58',NULL,0),(382,'fr','validation_test','ipv4','The :attribute must be a valid IPv4 address.','','2018-06-18 10:15:58',NULL,0),(383,'fr','validation_test','ipv6','The :attribute must be a valid IPv6 address.','','2018-06-18 10:15:58',NULL,0),(384,'fr','validation_test','json','The :attribute must be a valid JSON string.','','2018-06-18 10:15:58',NULL,0),(385,'fr','validation_test','lt','The :attribute must have less than :value items.','array','2018-06-18 10:15:58',NULL,0),(386,'fr','validation_test','lt','The :attribute must be less than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(387,'fr','validation_test','lt','The :attribute must be less than :value.','numeric','2018-06-18 10:15:58',NULL,0),(388,'fr','validation_test','lt','The :attribute must be less than :value characters.','string','2018-06-18 10:15:58',NULL,0),(389,'fr','validation_test','lte','The :attribute must not have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(390,'fr','validation_test','lte','The :attribute must be less than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(391,'fr','validation_test','lte','The :attribute must be less than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(392,'fr','validation_test','lte','The :attribute must be less than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(393,'fr','validation_test','max','The :attribute may not have more than :max items.','array','2018-06-18 10:15:58',NULL,0),(394,'fr','validation_test','max','The :attribute may not be greater than :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(395,'fr','validation_test','max','The :attribute may not be greater than :max.','numeric','2018-06-18 10:15:58',NULL,0),(396,'fr','validation_test','max','The :attribute may not be greater than :max characters.','string','2018-06-18 10:15:58',NULL,0),(397,'fr','validation_test','mimes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(398,'fr','validation_test','mimetypes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(399,'fr','validation_test','min','The :attribute must have at least :min items.','array','2018-06-18 10:15:58',NULL,0),(400,'fr','validation_test','min','The :attribute must be at least :min kilobytes.','file','2018-06-18 10:15:58',NULL,0),(401,'fr','validation_test','min','The :attribute must be at least :min.','numeric','2018-06-18 10:15:58',NULL,0),(402,'fr','validation_test','min','The :attribute must be at least :min characters.','string','2018-06-18 10:15:58',NULL,0),(403,'fr','validation_test','not_in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(404,'fr','validation_test','not_regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(405,'fr','validation_test','numeric','The :attribute must be a number.','','2018-06-18 10:15:58',NULL,0),(406,'fr','validation_test','present','The :attribute field must be present.','','2018-06-18 10:15:58',NULL,0),(407,'fr','validation_test','regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(408,'fr','validation_test','required','The :attribute field is required.','','2018-06-18 10:15:58',NULL,0),(409,'fr','validation_test','required_if','The :attribute field is required when :other is :value.','','2018-06-18 10:15:58',NULL,0),(410,'fr','validation_test','required_unless','The :attribute field is required unless :other is in :values.','','2018-06-18 10:15:58',NULL,0),(411,'fr','validation_test','required_with','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(412,'fr','validation_test','required_without','The :attribute field is required when :values is not present.','','2018-06-18 10:15:58',NULL,0),(413,'fr','validation_test','required_without_all','The :attribute field is required when none of :values are present.','','2018-06-18 10:15:58',NULL,0),(414,'fr','validation_test','required_with_all','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(415,'fr','validation_test','same','The :attribute and :other must match.','','2018-06-18 10:15:58',NULL,0),(416,'fr','validation_test','size','The :attribute must contain :size items.','array','2018-06-18 10:15:58',NULL,0),(417,'fr','validation_test','size','The :attribute must be :size kilobytes.','file','2018-06-18 10:15:58',NULL,0),(418,'fr','validation_test','size','The :attribute must be :size.','numeric','2018-06-18 10:15:58',NULL,0),(419,'fr','validation_test','size','The :attribute must be :size characters.','string','2018-06-18 10:15:58',NULL,0),(420,'fr','validation_test','string','The :attribute must be a string.','','2018-06-18 10:15:58',NULL,0),(421,'fr','validation_test','timezone','The :attribute must be a valid zone.','','2018-06-18 10:15:58',NULL,0),(422,'fr','validation_test','unique','The :attribute has already been taken.','','2018-06-18 10:15:58',NULL,0),(423,'fr','validation_test','uploaded','The :attribute failed to upload.','','2018-06-18 10:15:58',NULL,0),(424,'fr','validation_test','url','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(425,'jp','validation','accepted','：属性を受け入れる必要があります。','','2018-06-18 10:15:58',NULL,0),(426,'jp','validation','active_url','The :attribute is not a valid URL.','','2018-06-18 10:15:58',NULL,0),(427,'jp','validation','after','The :attribute must be a date after :date.','','2018-06-18 10:15:58',NULL,0),(428,'jp','validation','after_or_equal','The :attribute must be a date after or equal to :date.','','2018-06-18 10:15:58',NULL,0),(429,'jp','validation','alpha','The :attribute may only contain letters.','','2018-06-18 10:15:58',NULL,0),(430,'jp','validation','alpha_dash','The :attribute may only contain letters, numbers, dashes and underscores.','','2018-06-18 10:15:58',NULL,0),(431,'jp','validation','alpha_num','The :attribute may only contain letters and numbers.','','2018-06-18 10:15:58',NULL,0),(432,'jp','validation','array','The :attribute must be an array.','','2018-06-18 10:15:58',NULL,0),(433,'jp','validation','before','The :attribute must be a date before :date.','','2018-06-18 10:15:58',NULL,0),(434,'jp','validation','before_or_equal','The :attribute must be a date before or equal to :date.','','2018-06-18 10:15:58',NULL,0),(435,'jp','validation','between','The :attribute must be between :min and :max.','numeric','2018-06-18 10:15:58',NULL,0),(436,'jp','validation','between','The :attribute must be between :min and :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(437,'jp','validation','between','The :attribute must be between :min and :max characters.','string','2018-06-18 10:15:58',NULL,0),(438,'jp','validation','between','The :attribute must have between :min and :max items.','array','2018-06-18 10:15:58',NULL,0),(439,'jp','validation','boolean','The :attribute field must be true or false.','','2018-06-18 10:15:58',NULL,0),(440,'jp','validation','confirmed','The :attribute confirmation does not match.','','2018-06-18 10:15:58',NULL,0),(441,'jp','validation','date','The :attribute is not a valid date.','','2018-06-18 10:15:58',NULL,0),(442,'jp','validation','date_format','The :attribute does not match the format :format.','','2018-06-18 10:15:58',NULL,0),(443,'jp','validation','different','The :attribute and :other must be different.','','2018-06-18 10:15:58',NULL,0),(444,'jp','validation','digits','The :attribute must be :digits digits.','','2018-06-18 10:15:58',NULL,0),(445,'jp','validation','digits_between','The :attribute must be between :min and :max digits.','','2018-06-18 10:15:58',NULL,0),(446,'jp','validation','dimensions','The :attribute has invalid image dimensions.','','2018-06-18 10:15:58',NULL,0),(447,'jp','validation','distinct','The :attribute field has a duplicate value.','','2018-06-18 10:15:58',NULL,0),(448,'jp','validation','email','The :attribute must be a valid email address.','','2018-06-18 10:15:58',NULL,0),(449,'jp','validation','exists','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(450,'jp','validation','file','The :attribute must be a file.','','2018-06-18 10:15:58',NULL,0),(451,'jp','validation','filled','The :attribute field must have a value.','','2018-06-18 10:15:58',NULL,0),(452,'jp','validation','gt','The :attribute must be greater than :value.','numeric','2018-06-18 10:15:58',NULL,0),(453,'jp','validation','gt','The :attribute must be greater than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(454,'jp','validation','gt','The :attribute must be greater than :value characters.','string','2018-06-18 10:15:58',NULL,0),(455,'jp','validation','gt','The :attribute must have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(456,'jp','validation','gte','The :attribute must be greater than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(457,'jp','validation','gte','The :attribute must be greater than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(458,'jp','validation','gte','The :attribute must be greater than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(459,'jp','validation','gte','The :attribute must have :value items or more.','array','2018-06-18 10:15:58',NULL,0),(460,'jp','validation','image','The :attribute must be an image.','','2018-06-18 10:15:58',NULL,0),(461,'jp','validation','in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(462,'jp','validation','in_array','The :attribute field does not exist in :other.','','2018-06-18 10:15:58',NULL,0),(463,'jp','validation','integer','The :attribute must be an integer.','','2018-06-18 10:15:58',NULL,0),(464,'jp','validation','ip','The :attribute must be a valid IP address.','','2018-06-18 10:15:58',NULL,0),(465,'jp','validation','ipv4','The :attribute must be a valid IPv4 address.','','2018-06-18 10:15:58',NULL,0),(466,'jp','validation','ipv6','The :attribute must be a valid IPv6 address.','','2018-06-18 10:15:58',NULL,0),(467,'jp','validation','json','The :attribute must be a valid JSON string.','','2018-06-18 10:15:58',NULL,0),(468,'jp','validation','lt','The :attribute must be less than :value.','numeric','2018-06-18 10:15:58',NULL,0),(469,'jp','validation','lt','The :attribute must be less than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(470,'jp','validation','lt','The :attribute must be less than :value characters.','string','2018-06-18 10:15:58',NULL,0),(471,'jp','validation','lt','The :attribute must have less than :value items.','array','2018-06-18 10:15:58',NULL,0),(472,'jp','validation','lte','The :attribute must be less than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(473,'jp','validation','lte','The :attribute must be less than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(474,'jp','validation','lte','The :attribute must be less than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(475,'jp','validation','lte','The :attribute must not have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(476,'jp','validation','max','The :attribute may not be greater than :max.','numeric','2018-06-18 10:15:58',NULL,0),(477,'jp','validation','max','The :attribute may not be greater than :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(478,'jp','validation','max','The :attribute may not be greater than :max characters.','string','2018-06-18 10:15:58',NULL,0),(479,'jp','validation','max','The :attribute may not have more than :max items.','array','2018-06-18 10:15:58',NULL,0),(480,'jp','validation','mimes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(481,'jp','validation','mimetypes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(482,'jp','validation','min','The :attribute must be at least :min.','numeric','2018-06-18 10:15:58',NULL,0),(483,'jp','validation','min','The :attribute must be at least :min kilobytes.','file','2018-06-18 10:15:58',NULL,0),(484,'jp','validation','min','The :attribute must be at least :min characters.','string','2018-06-18 10:15:58',NULL,0),(485,'jp','validation','min','The :attribute must have at least :min items.','array','2018-06-18 10:15:58',NULL,0),(486,'jp','validation','not_in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(487,'jp','validation','not_regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(488,'jp','validation','numeric','The :attribute must be a number.','','2018-06-18 10:15:58',NULL,0),(489,'jp','validation','present','The :attribute field must be present.','','2018-06-18 10:15:58',NULL,0),(490,'jp','validation','regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(491,'jp','validation','required','The :attribute field is required.','','2018-06-18 10:15:58',NULL,0),(492,'jp','validation','required_if','The :attribute field is required when :other is :value.','','2018-06-18 10:15:58',NULL,0),(493,'jp','validation','required_unless','The :attribute field is required unless :other is in :values.','','2018-06-18 10:15:58',NULL,0),(494,'jp','validation','required_with','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(495,'jp','validation','required_with_all','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(496,'jp','validation','required_without','The :attribute field is required when :values is not present.','','2018-06-18 10:15:58',NULL,0),(497,'jp','validation','required_without_all','The :attribute field is required when none of :values are present.','','2018-06-18 10:15:58',NULL,0),(498,'jp','validation','same','The :attribute and :other must match.','','2018-06-18 10:15:58',NULL,0),(499,'jp','validation','size','The :attribute must be :size.','numeric','2018-06-18 10:15:58',NULL,0),(500,'jp','validation','size','The :attribute must be :size kilobytes.','file','2018-06-18 10:15:58',NULL,0),(501,'jp','validation','size','The :attribute must be :size characters.','string','2018-06-18 10:15:58',NULL,0),(502,'jp','validation','size','The :attribute must contain :size items.','array','2018-06-18 10:15:58',NULL,0),(503,'jp','validation','string','The :attribute must be a string.','','2018-06-18 10:15:58',NULL,0),(504,'jp','validation','timezone','The :attribute must be a valid zone.','','2018-06-18 10:15:58',NULL,0),(505,'jp','validation','unique','The :attribute has already been taken.','','2018-06-18 10:15:58',NULL,0),(506,'jp','validation','uploaded','The :attribute failed to upload.','','2018-06-18 10:15:58',NULL,0),(507,'jp','validation','url','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(508,'jp','validation_test','accepted','：属性を受け入れる必要があります。','','2018-06-18 10:15:58',NULL,0),(509,'jp','validation_test','active_url','The :attribute is not a valid URL.','','2018-06-18 10:15:58',NULL,0),(510,'jp','validation_test','after','The :attribute must be a date after :date.','','2018-06-18 10:15:58',NULL,0),(511,'jp','validation_test','after_or_equal','The :attribute must be a date after or equal to :date.','','2018-06-18 10:15:58',NULL,0),(512,'jp','validation_test','alpha','The :attribute may only contain letters.','','2018-06-18 10:15:58',NULL,0),(513,'jp','validation_test','alpha_dash','The :attribute may only contain letters, numbers, dashes and underscores.','','2018-06-18 10:15:58',NULL,0),(514,'jp','validation_test','alpha_num','The :attribute may only contain letters and numbers.','','2018-06-18 10:15:58',NULL,0),(515,'jp','validation_test','array','The :attribute must be an array.','','2018-06-18 10:15:58',NULL,0),(516,'jp','validation_test','before','The :attribute must be a date before :date.','','2018-06-18 10:15:58',NULL,0),(517,'jp','validation_test','before_or_equal','The :attribute must be a date before or equal to :date.','','2018-06-18 10:15:58',NULL,0),(518,'jp','validation_test','between','The :attribute must have between :min and :max items.','array','2018-06-18 10:15:58',NULL,0),(519,'jp','validation_test','between','The :attribute must be between :min and :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(520,'jp','validation_test','between','The :attribute must be between :min and :max.','numeric','2018-06-18 10:15:58',NULL,0),(521,'jp','validation_test','between','The :attribute must be between :min and :max characters.','string','2018-06-18 10:15:58',NULL,0),(522,'jp','validation_test','boolean','The :attribute field must be true or false.','','2018-06-18 10:15:58',NULL,0),(523,'jp','validation_test','confirmed','The :attribute confirmation does not match.','','2018-06-18 10:15:58',NULL,0),(524,'jp','validation_test','date','The :attribute is not a valid date.','','2018-06-18 10:15:58',NULL,0),(525,'jp','validation_test','date_format','The :attribute does not match the format :format.','','2018-06-18 10:15:58',NULL,0),(526,'jp','validation_test','different','The :attribute and :other must be different.','','2018-06-18 10:15:58',NULL,0),(527,'jp','validation_test','digits','The :attribute must be :digits digits.','','2018-06-18 10:15:58',NULL,0),(528,'jp','validation_test','digits_between','The :attribute must be between :min and :max digits.','','2018-06-18 10:15:58',NULL,0),(529,'jp','validation_test','dimensions','The :attribute has invalid image dimensions.','','2018-06-18 10:15:58',NULL,0),(530,'jp','validation_test','distinct','The :attribute field has a duplicate value.','','2018-06-18 10:15:58',NULL,0),(531,'jp','validation_test','email','The :attribute must be a valid email address.','','2018-06-18 10:15:58',NULL,0),(532,'jp','validation_test','exists','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(533,'jp','validation_test','file','The :attribute must be a file.','','2018-06-18 10:15:58',NULL,0),(534,'jp','validation_test','filled','The :attribute field must have a value.','','2018-06-18 10:15:58',NULL,0),(535,'jp','validation_test','gt','The :attribute must have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(536,'jp','validation_test','gt','The :attribute must be greater than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(537,'jp','validation_test','gt','The :attribute must be greater than :value.','numeric','2018-06-18 10:15:58',NULL,0),(538,'jp','validation_test','gt','The :attribute must be greater than :value characters.','string','2018-06-18 10:15:58',NULL,0),(539,'jp','validation_test','gte','The :attribute must have :value items or more.','array','2018-06-18 10:15:58',NULL,0),(540,'jp','validation_test','gte','The :attribute must be greater than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(541,'jp','validation_test','gte','The :attribute must be greater than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(542,'jp','validation_test','gte','The :attribute must be greater than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(543,'jp','validation_test','image','The :attribute must be an image.','','2018-06-18 10:15:58',NULL,0),(544,'jp','validation_test','in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(545,'jp','validation_test','integer','The :attribute must be an integer.','','2018-06-18 10:15:58',NULL,0),(546,'jp','validation_test','in_array','The :attribute field does not exist in :other.','','2018-06-18 10:15:58',NULL,0),(547,'jp','validation_test','ip','The :attribute must be a valid IP address.','','2018-06-18 10:15:58',NULL,0),(548,'jp','validation_test','ipv4','The :attribute must be a valid IPv4 address.','','2018-06-18 10:15:58',NULL,0),(549,'jp','validation_test','ipv6','The :attribute must be a valid IPv6 address.','','2018-06-18 10:15:58',NULL,0),(550,'jp','validation_test','json','The :attribute must be a valid JSON string.','','2018-06-18 10:15:58',NULL,0),(551,'jp','validation_test','lt','The :attribute must have less than :value items.','array','2018-06-18 10:15:58',NULL,0),(552,'jp','validation_test','lt','The :attribute must be less than :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(553,'jp','validation_test','lt','The :attribute must be less than :value.','numeric','2018-06-18 10:15:58',NULL,0),(554,'jp','validation_test','lt','The :attribute must be less than :value characters.','string','2018-06-18 10:15:58',NULL,0),(555,'jp','validation_test','lte','The :attribute must not have more than :value items.','array','2018-06-18 10:15:58',NULL,0),(556,'jp','validation_test','lte','The :attribute must be less than or equal :value kilobytes.','file','2018-06-18 10:15:58',NULL,0),(557,'jp','validation_test','lte','The :attribute must be less than or equal :value.','numeric','2018-06-18 10:15:58',NULL,0),(558,'jp','validation_test','lte','The :attribute must be less than or equal :value characters.','string','2018-06-18 10:15:58',NULL,0),(559,'jp','validation_test','max','The :attribute may not have more than :max items.','array','2018-06-18 10:15:58',NULL,0),(560,'jp','validation_test','max','The :attribute may not be greater than :max kilobytes.','file','2018-06-18 10:15:58',NULL,0),(561,'jp','validation_test','max','The :attribute may not be greater than :max.','numeric','2018-06-18 10:15:58',NULL,0),(562,'jp','validation_test','max','The :attribute may not be greater than :max characters.','string','2018-06-18 10:15:58',NULL,0),(563,'jp','validation_test','mimes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(564,'jp','validation_test','mimetypes','The :attribute must be a file of type: :values.','','2018-06-18 10:15:58',NULL,0),(565,'jp','validation_test','min','The :attribute must have at least :min items.','array','2018-06-18 10:15:58',NULL,0),(566,'jp','validation_test','min','The :attribute must be at least :min kilobytes.','file','2018-06-18 10:15:58',NULL,0),(567,'jp','validation_test','min','The :attribute must be at least :min.','numeric','2018-06-18 10:15:58',NULL,0),(568,'jp','validation_test','min','The :attribute must be at least :min characters.','string','2018-06-18 10:15:58',NULL,0),(569,'jp','validation_test','not_in','The selected :attribute is invalid.','','2018-06-18 10:15:58',NULL,0),(570,'jp','validation_test','not_regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(571,'jp','validation_test','numeric','The :attribute must be a number.','','2018-06-18 10:15:58',NULL,0),(572,'jp','validation_test','present','The :attribute field must be present.','','2018-06-18 10:15:58',NULL,0),(573,'jp','validation_test','regex','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0),(574,'jp','validation_test','required','The :attribute field is required.','','2018-06-18 10:15:58',NULL,0),(575,'jp','validation_test','required_if','The :attribute field is required when :other is :value.','','2018-06-18 10:15:58',NULL,0),(576,'jp','validation_test','required_unless','The :attribute field is required unless :other is in :values.','','2018-06-18 10:15:58',NULL,0),(577,'jp','validation_test','required_with','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(578,'jp','validation_test','required_without','The :attribute field is required when :values is not present.','','2018-06-18 10:15:58',NULL,0),(579,'jp','validation_test','required_without_all','The :attribute field is required when none of :values are present.','','2018-06-18 10:15:58',NULL,0),(580,'jp','validation_test','required_with_all','The :attribute field is required when :values is present.','','2018-06-18 10:15:58',NULL,0),(581,'jp','validation_test','same','The :attribute and :other must match.','','2018-06-18 10:15:58',NULL,0),(582,'jp','validation_test','size','The :attribute must contain :size items.','array','2018-06-18 10:15:58',NULL,0),(583,'jp','validation_test','size','The :attribute must be :size kilobytes.','file','2018-06-18 10:15:58',NULL,0),(584,'jp','validation_test','size','The :attribute must be :size.','numeric','2018-06-18 10:15:58',NULL,0),(585,'jp','validation_test','size','The :attribute must be :size characters.','string','2018-06-18 10:15:58',NULL,0),(586,'jp','validation_test','string','The :attribute must be a string.','','2018-06-18 10:15:58',NULL,0),(587,'jp','validation_test','timezone','The :attribute must be a valid zone.','','2018-06-18 10:15:58',NULL,0),(588,'jp','validation_test','unique','The :attribute has already been taken.','','2018-06-18 10:15:58',NULL,0),(589,'jp','validation_test','uploaded','The :attribute failed to upload.','','2018-06-18 10:15:58',NULL,0),(590,'jp','validation_test','url','The :attribute format is invalid.','','2018-06-18 10:15:58',NULL,0);
/*!40000 ALTER TABLE `dev_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dev_validation_input_type`
--

DROP TABLE IF EXISTS `dev_validation_input_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dev_validation_input_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_code` varchar(45) DEFAULT NULL,
  `type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_code_UNIQUE` (`type_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dev_validation_input_type`
--

LOCK TABLES `dev_validation_input_type` WRITE;
/*!40000 ALTER TABLE `dev_validation_input_type` DISABLE KEYS */;
INSERT INTO `dev_validation_input_type` VALUES (1,'numeric','numeric'),(2,'file','file'),(3,'string','string'),(4,'array','array');
/*!40000 ALTER TABLE `dev_validation_input_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_languages`
--

DROP TABLE IF EXISTS `sys_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_languages` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_languages`
--

LOCK TABLES `sys_languages` WRITE;
/*!40000 ALTER TABLE `sys_languages` DISABLE KEYS */;
INSERT INTO `sys_languages` VALUES (1,'jp','Japanese',NULL),(2,'en','English',NULL),(3,'fr','France',NULL);
/*!40000 ALTER TABLE `sys_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_permissions`
--

DROP TABLE IF EXISTS `sys_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_permissions` (
  `id` int(11) NOT NULL,
  `permission_value` int(11) DEFAULT NULL,
  `permission_name` varchar(45) DEFAULT NULL,
  `descriptions` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_value_UNIQUE` (`permission_value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_permissions`
--

LOCK TABLES `sys_permissions` WRITE;
/*!40000 ALTER TABLE `sys_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_role_map_screen`
--

DROP TABLE IF EXISTS `sys_role_map_screen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_role_map_screen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_value` int(11) DEFAULT NULL,
  `screen_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_role_map_screen`
--

LOCK TABLES `sys_role_map_screen` WRITE;
/*!40000 ALTER TABLE `sys_role_map_screen` DISABLE KEYS */;
INSERT INTO `sys_role_map_screen` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(9,1,9,1),(10,1,10,1),(11,1,11,1),(12,1,12,1),(13,2,1,0),(14,2,2,0),(15,2,3,0),(16,2,4,0),(17,2,5,0),(18,2,6,0),(19,2,7,0),(20,2,8,0),(21,2,9,0),(22,2,10,0),(23,2,11,0),(24,2,12,0),(25,3,1,0),(26,3,2,0),(27,3,3,0),(28,3,4,0),(29,3,5,0),(30,3,6,0),(31,3,7,0),(32,3,8,0),(33,3,9,0),(34,3,10,0),(35,3,11,0),(36,3,12,0);
/*!40000 ALTER TABLE `sys_role_map_screen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_roles`
--

DROP TABLE IF EXISTS `sys_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `role_value` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value_UNIQUE` (`role_value`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_roles`
--

LOCK TABLES `sys_roles` WRITE;
/*!40000 ALTER TABLE `sys_roles` DISABLE KEYS */;
INSERT INTO `sys_roles` VALUES (1,'System Administrator',1,'Full access'),(2,'Mananger',2,NULL),(3,'User',3,NULL);
/*!40000 ALTER TABLE `sys_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_screens`
--

DROP TABLE IF EXISTS `sys_screens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_screens` (
  `id` int(11) NOT NULL,
  `module` varchar(45) DEFAULT NULL,
  `controller` varchar(45) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_screens`
--

LOCK TABLES `sys_screens` WRITE;
/*!40000 ALTER TABLE `sys_screens` DISABLE KEYS */;
INSERT INTO `sys_screens` VALUES (1,'','logincontroller','showloginform',NULL),(2,'','logincontroller','login',NULL),(3,'','logincontroller','logout',NULL),(4,'','registercontroller','showregistrationform',NULL),(5,'','registercontroller','register',NULL),(6,'','forgotpasswordcontroller','showlinkrequestform',NULL),(7,'','forgotpasswordcontroller','sendresetlinkemail',NULL),(8,'','resetpasswordcontroller','showresetform',NULL),(9,'','resetpasswordcontroller','reset',NULL),(10,'api','somecontroller','index',NULL),(11,'web','homecontroller','index',NULL),(12,'web','somecontroller','index',NULL);
/*!40000 ALTER TABLE `sys_screens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_value` int(11) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1@mail.com','$2y$10$XQHQV4cWDV4GNjukZPSUxu.rDeRnaOG5NwFbNsOX0CIeBGJ527K06',1,'rl9szeEfbinVaewXyoIyXMZ9QKRs80bADOAf262X68przt0lfOqeaMZdTtTw',0),(2,'2@mail.com','$2y$10$XQHQV4cWDV4GNjukZPSUxu.rDeRnaOG5NwFbNsOX0CIeBGJ527K06',2,'PwOwGpFrvDQoecoCucnrifgvHO6B1KpxmHb8zFQ68Swza4pV99UNMAe8fe7a',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_category_item_level`
--

DROP TABLE IF EXISTS `view_category_item_level`;
/*!50001 DROP VIEW IF EXISTS `view_category_item_level`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_category_item_level` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `lft`,
 1 AS `rgt`,
 1 AS `level`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'test'
--
/*!50003 DROP PROCEDURE IF EXISTS `DEV_ADD_TRANSLATE_COMBO_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_ADD_TRANSLATE_COMBO_LST`()
BEGIN
	
    SELECT 
		id
	,	type_code
    ,	type_name
	FROM dev_validation_input_type;
    
	SELECT 
		id
	,	code
    ,	comment
    FROM dev_translate_type;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DEV_GET_LANGUAGE_CODE_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_GET_LANGUAGE_CODE_LST`()
BEGIN
	SELECT
		id,
        code,
        name
	FROM sys_languages;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DEV_GET_ROLES_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_GET_ROLES_LST`()
BEGIN
	SELECT * FROM sys_roles
    ORDER BY role_value;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DEV_GET_ROLES_MAP_ACTION_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_GET_ROLES_MAP_ACTION_LST`()
BEGIN

	SELECT 
		SR.id AS role_id
	,	SR.name AS role_name
    ,	SR.role_value AS role_value
    ,	SR.description AS role_description
    FROM sys_roles AS SR
    ORDER BY SR.role_value;
    
	SELECT 
		SR.id AS role_id
	,	RMS.id AS role_map_id
	,	SR.name AS role_name
    ,	SR.role_value AS role_value
    ,	SR.description AS role_description
    ,	SS.module
    ,	SS.controller
    ,	SS.action
    ,	RMS.is_active AS is_active
    ,	CONCAT(LOWER(SS.module),'\\',LOWER(SS.controller),'\\',LOWER(SS.action)) AS screen_code
    FROM sys_roles AS SR
    LEFT JOIN sys_role_map_screen AS RMS ON
			SR.role_value = RMS.role_value
	LEFT JOIN sys_screens AS SS ON
			RMS.screen_id = SS.id
	ORDER BY
		SR.role_value
	,	RMS.screen_id;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DEV_GET_TRANSLATION_DATA_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_GET_TRANSLATION_DATA_LST`( p_translate_type_code VARCHAR(50),p_lang VARCHAR(50) )
BEGIN
	SELECT 
			V.id
		,	V.lang_code
        ,	VI.type_code
		,	V.code
		,	V.text
        ,	TT.code AS translate_type_code
		FROM dev_translation AS V
		LEFT JOIN dev_validation_input_type AS VI ON
			V.input_type = VI.type_code
		LEFT JOIN dev_translate_type TT ON
			V.translate_type= TT.code
		WHERE
				(V.is_deleted IS NULL OR  V.is_deleted<>1)
			AND (	p_translate_type_code IS NULL OR p_translate_type_code = '' OR TT.code= p_translate_type_code)
			AND (TT.code IS NOT NULL)
            AND (	p_lang IS NULL OR p_lang = '' OR V.lang_code= p_lang)
        ORDER BY
				V.lang_code
			,	V.code
			,	VI.type_name;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DEV_GET_VALIDATION_RULES_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_GET_VALIDATION_RULES_LST`()
BEGIN
	SELECT 
		V.id
	,	V.lang_code
    ,	V.code
    ,	VI.type_name
    ,	V.text
	FROM dev_translation AS V
    LEFT JOIN dev_validation_input_type AS VI ON
		V.input_type = VI.id
	LEFT JOIN dev_translate_type TT ON
		V.translate_type= TT.id
	WHERE
			V.is_deleted IS NULL
		OR  V.is_deleted<>1
		AND TT.code= 'validation'
	ORDER BY
			V.lang_code
		,	V.code
        ,	VI.type_name;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DEV_ROLE_UPDATE_ACTIVE_ACT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_ROLE_UPDATE_ACTIVE_ACT`(roleMapId INT,isActive INT)
BEGIN
	UPDATE sys_role_map_screen
    SET
		is_active = isActive
	WHERE
		id = roleMapId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DEV_TRANSLATE_UPDATE_TEXT_ACT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DEV_TRANSLATE_UPDATE_TEXT_ACT`(p_id INT,p_text TEXT )
BEGIN
	UPDATE dev_translation
    SET
		text = p_text
	,	updated_at = NOW()
	WHERE
		id = p_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_CATEGORY_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_CATEGORY_LST`()
BEGIN

	SELECT BASE.id, BASE.name, BASE.level , TMP.id AS parent
    FROM view_category_item_level AS BASE
	LEFT JOIN view_category_item_level AS TMP ON
			TMP.level = BASE.level -1
		AND  BASE.lft BETWEEN TMP.lft AND TMP.rgt
	ORDER BY BASE.id;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_CATEGORY_WITH_LEVEL_LIST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_CATEGORY_WITH_LEVEL_LIST`()
BEGIN
	SELECT BASE.id, BASE.name, BASE.level
    FROM view_category_item_level AS BASE
	ORDER BY BASE.id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TEST_USERS_LST` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `TEST_USERS_LST`(  a VARCHAR(20),b VARCHAR(20))
BEGIN
	select * from tbl_users;
    select a,b;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `view_category_item_level`
--

/*!50001 DROP VIEW IF EXISTS `view_category_item_level`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_category_item_level` AS select `n`.`id` AS `id`,`n`.`name` AS `name`,`n`.`lft` AS `lft`,`n`.`rgt` AS `rgt`,(count(`p`.`id`) - 1) AS `level` from (`catelory` `n` left join `catelory` `p` on((`n`.`lft` between `p`.`lft` and `p`.`rgt`))) group by `n`.`name` order by `p`.`id`,count(`p`.`id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-18 18:08:36
