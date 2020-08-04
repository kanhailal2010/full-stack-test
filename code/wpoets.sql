-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: wpoets
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `page_details`
--

DROP TABLE IF EXISTS `page_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_details` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(100) NOT NULL DEFAULT 'Page Title',
  `page_description` varchar(255) NOT NULL DEFAULT 'Page Description',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_details`
--

LOCK TABLES `page_details` WRITE;
/*!40000 ALTER TABLE `page_details` DISABLE KEYS */;
INSERT INTO `page_details` VALUES (1,'DelphianLogic in Action','Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet');
/*!40000 ALTER TABLE `page_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_slides`
--

DROP TABLE IF EXISTS `tab_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_slides` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `tab_id` int(10) NOT NULL,
  `slide_title` varchar(100) NOT NULL DEFAULT 'Slide Title',
  `slide_description` varchar(255) NOT NULL DEFAULT 'Slide Description',
  `slide_image` varchar(100) NOT NULL DEFAULT 'default_img.jpg',
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_slides`
--

LOCK TABLES `tab_slides` WRITE;
/*!40000 ALTER TABLE `tab_slides` DISABLE KEYS */;
INSERT INTO `tab_slides` VALUES (1,5,'Tech title 1 should look great','Tech one description and a not very long description due to size constraints, you know what i mean right?','1596480444012.jpg'),(2,5,'Tech title 2 should look great','Tech two description and a not very long description due to size constraints, you know what i mean right?','1596480455231.jpg'),(3,5,'Tech title 3 should look great','Tech three description and a not very long description due to size constraints, you know what i mean right?','1596480461148.jpg'),(4,6,'Learning one is the title of this slide','This is the description of learning one. Hope to make it a long text but under 255 max character limit.','1596480469105.jpg'),(5,6,'Learning two is the title of this slide','This is the description of learning two. Hope to make it a long text but under 255 max character limit.','1596480476439.jpg'),(6,6,'Learning three is the title of this slide','This is the description of learning three. Hope to make it a long text but under 255 max character limit.','1596480482936.jpg'),(7,7,'Communication one is the title of this slide','This is the description of Communication one. Hope to make it a long text but under 255 max character limit.','1596480490735.jpg'),(8,7,'Communication two is the title of this slide','This is the description of Communication two. Hope to make it a long text but under 255 max character limit.','1596480497078.jpg');
/*!40000 ALTER TABLE `tab_slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabs`
--

DROP TABLE IF EXISTS `tabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabs` (
  `tab_id` int(10) NOT NULL AUTO_INCREMENT,
  `tab_title` varchar(100) NOT NULL DEFAULT 'TAB Title',
  `tab_icon` varchar(100) NOT NULL DEFAULT 'default_icon.jpg',
  PRIMARY KEY (`tab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabs`
--

LOCK TABLES `tabs` WRITE;
/*!40000 ALTER TABLE `tabs` DISABLE KEYS */;
INSERT INTO `tabs` VALUES (5,'Technology','1596465088993.svg'),(6,'Learning','1596465617105.svg'),(7,'Communication','1596465626268.svg');
/*!40000 ALTER TABLE `tabs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-03 19:07:12
