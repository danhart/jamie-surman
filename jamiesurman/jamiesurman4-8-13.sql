-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: jamiesurman
-- ------------------------------------------------------
-- Server version	5.5.28-1

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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `image_type` varchar(255) NOT NULL,
  `image_description` varchar(255) NOT NULL,
  `image_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (3,'bum_0000_1.jpg','home','',0),(4,'bum_0001_2.jpg','','',1),(5,'bum_0002_3.jpg','','',2),(6,'bum_0003_4.jpg','','',13),(7,'bum_0004_5.jpg','','',14),(8,'bum_0005_6.jpg','','',15),(9,'bum_0006_7.jpg','','',7),(10,'bum_0007_8.jpg','','',6),(11,'bum_0008_9.jpg','','',8),(12,'bum_0009_10.jpg','contact','',18),(13,'bum_0010_11.jpg','','',19),(14,'bum_0011_12.jpg','','',20),(15,'bum_0012_13.jpg','','',21),(16,'bum_0013_14.jpg','','',22),(17,'bum_0014_15.jpg','','',23),(18,'bum_0015_16.jpg','','',26),(19,'bum_0016_17.jpg','','',27),(20,'bum_0017_17b.jpg','','',28),(53,'bum_0018_Vogue_Cover.jpg','','',46),(22,'bum_0019_Chinese Vogue1.jpg','','',34),(23,'bum_0020_Chinese Vogue 2.jpg','','',36),(55,'1.jpg','','',3),(25,'bum_0022_18.jpg','','',16),(26,'bum_0023_19.jpg','','',17),(27,'bum_0024_20.jpg','','',31),(28,'bum_0025_21.jpg','','',32),(29,'bum_0026_22.jpg','','',33),(30,'bum_0027_23.jpg','','',37),(31,'bum_0028_24.jpg','','',38),(32,'bum_0029_25.jpg','','',39),(33,'bum_0030_26.jpg','','',40),(34,'bum_0031_27.jpg','','',41),(35,'bum_0032_28.jpg','','',42),(36,'bum_0033_29.jpg','','',43),(37,'bum_0034_30.jpg','','',44),(38,'bum_0035_31.jpg','','',45),(39,'bum_0036_32.jpg','','',48),(40,'bum_0037_33.jpg','','',49),(41,'bum_0038_34.jpg','','',50),(42,'bum_0039_35.jpg','','',24),(43,'bum_0040_36.jpg','','',25),(44,'bum_0041_37.jpg','','',51),(45,'bum_0042_38.jpg','','',52),(46,'bum_0043_39.jpg','','',53),(47,'bum_0044_40.jpg','','',54),(48,'bum_0045_41.jpg','','',55),(49,'bum_0046_42.jpg','','',56),(50,'bum_0047_43.jpg','','',57),(51,'bum_0048_44.jpg','','',58),(52,'bum_0049_45.jpg','','',59),(54,'bum_0018_Vogue_Cover2.jpg','','',47),(56,'2.jpg','','',4),(57,'3.jpg','','',5),(58,'4.jpg','','',29),(59,'5.jpg','','',30),(60,'6.jpg','','',9),(61,'7.jpg','','',10),(62,'8.jpg','','',11),(63,'9.jpg','','',12),(64,'10.jpg','','',35);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-04  9:27:35
