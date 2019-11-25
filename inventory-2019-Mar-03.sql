/*
SQLyog Ultimate v8.55 
MySQL - 5.7.19 : Database - inventory_vandaravuth
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_activity_log` */

DROP TABLE IF EXISTS `tbl_activity_log`;

CREATE TABLE `tbl_activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_activity_log` */

insert  into `tbl_activity_log`(`id`,`user_id`,`action`,`menu_code`,`ip_address`,`mac_address`,`datetime`) values (0,2,'create','y5_m01',NULL,NULL,'2019-03-01 02:32:07'),(0,2,'Login','y5_m01',NULL,NULL,'2019-03-02 11:24:42'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 02:31:16'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 02:31:21'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 02:31:44'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 02:31:51'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 03:03:43'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 03:04:09'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 03:04:30'),(0,2,'delete','y5_m01',NULL,NULL,'2019-03-02 03:04:40'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 03:05:27'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 03:05:56'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 05:02:21'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 05:02:51'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 05:30:49'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 05:31:07'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 05:33:38'),(0,2,'view','y5_m01',NULL,NULL,'2019-03-02 05:53:29'),(0,2,'view','y5_m01',NULL,NULL,'2019-03-02 05:57:57'),(0,2,'Login','y5_m01',NULL,NULL,'2019-03-02 08:50:02');

/*Table structure for table `tbl_actual_stock` */

DROP TABLE IF EXISTS `tbl_actual_stock`;

CREATE TABLE `tbl_actual_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(4) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `unit_id` int(4) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cost` float(10,2) DEFAULT NULL,
  `expected_close` int(11) DEFAULT NULL,
  `end_margin` float(10,2) DEFAULT NULL,
  `act_unit_id` int(2) DEFAULT NULL,
  `act_qty` int(5) DEFAULT NULL,
  `sub_location_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_actual_stock` */

insert  into `tbl_actual_stock`(`id`,`branch_id`,`item_id`,`unit_id`,`qty`,`date`,`cost`,`expected_close`,`end_margin`,`act_unit_id`,`act_qty`,`sub_location_id`) values (1,1,14,5,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(2,1,1,5,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(3,1,17,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(4,1,18,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(5,1,19,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(6,1,29,6,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(7,1,39,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(8,1,44,6,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(9,1,45,6,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(10,1,46,6,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(11,1,47,6,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(12,1,48,6,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(13,1,50,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(14,1,52,6,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(15,1,56,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(16,1,55,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(17,1,54,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(18,1,53,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(19,1,49,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(20,1,42,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(21,1,30,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(22,1,26,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(23,1,23,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(24,1,21,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(25,1,20,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(26,1,57,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(27,1,58,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(28,1,59,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(29,1,60,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(30,1,40,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(31,1,61,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(32,1,62,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(33,1,63,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(34,1,43,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(35,1,65,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(36,1,69,2,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(37,1,83,2,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(38,1,84,2,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(39,1,85,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(40,1,89,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(41,1,90,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(42,1,91,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(43,1,92,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(44,1,93,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(45,1,94,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(46,1,88,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(47,1,87,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(48,1,86,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(49,1,95,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(50,1,96,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(51,1,97,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(52,1,101,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(53,1,103,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(54,1,104,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(55,1,105,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(56,1,106,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(57,1,99,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(58,1,98,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(59,1,51,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(60,1,107,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(61,1,108,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(62,1,109,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(63,1,110,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(64,1,111,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(65,1,100,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(66,1,112,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(67,1,123,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(68,1,124,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(69,1,125,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(70,1,126,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(71,1,127,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(72,1,128,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(73,1,129,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(74,1,130,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(75,1,131,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(76,1,132,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(77,1,133,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(78,1,134,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(79,1,135,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(80,1,136,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(81,1,137,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(82,1,138,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(83,1,139,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(84,1,102,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(85,1,140,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(86,1,141,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(87,1,142,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(88,1,143,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(89,1,144,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(90,1,145,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(91,1,146,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(92,1,147,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(93,1,148,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(94,1,149,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(95,1,150,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(96,1,151,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(97,1,152,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(98,1,153,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(99,1,154,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(100,1,155,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(101,1,156,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(102,1,157,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(103,1,158,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(104,1,159,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(105,1,160,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(106,1,161,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(107,1,164,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(108,1,165,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(109,1,166,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(110,1,167,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(111,1,168,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(112,1,169,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(113,1,171,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(114,1,170,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(115,1,172,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(116,1,162,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(117,1,163,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(118,1,173,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(119,1,174,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(120,1,175,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(121,1,176,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(122,1,177,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(123,1,178,2,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(124,1,33,3,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL),(125,1,261,4,0,'2019-03-02',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_adjustment` */

DROP TABLE IF EXISTS `tbl_adjustment`;

CREATE TABLE `tbl_adjustment` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `adjustment_date` datetime DEFAULT NULL,
  `adjust_qty` int(5) DEFAULT NULL,
  `adjust_type` int(5) DEFAULT NULL,
  `adjust_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `branch_id` int(5) DEFAULT NULL,
  `unit_id` int(5) DEFAULT NULL,
  `lost_qty` int(5) DEFAULT NULL,
  `damage_qty` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_adjustment` */

insert  into `tbl_adjustment`(`id`,`item_id`,`adjustment_date`,`adjust_qty`,`adjust_type`,`adjust_by`,`reason`,`branch_id`,`unit_id`,`lost_qty`,`damage_qty`,`created_at`,`updated_at`) values (0,14,'2019-03-01 00:00:00',12,NULL,'dara','',1,5,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,1,'2019-03-01 00:00:00',0,NULL,'','',1,5,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,17,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,18,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,19,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,29,'2019-03-01 00:00:00',0,NULL,'','',1,6,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,39,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,44,'2019-03-01 00:00:00',0,NULL,'','',1,6,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,45,'2019-03-01 00:00:00',0,NULL,'','',1,6,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,46,'2019-03-01 00:00:00',0,NULL,'','',1,6,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,47,'2019-03-01 00:00:00',0,NULL,'','',1,6,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,48,'2019-03-01 00:00:00',0,NULL,'','',1,6,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,50,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,52,'2019-03-01 00:00:00',0,NULL,'','',1,6,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,56,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,55,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,54,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,53,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,49,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,42,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,30,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,26,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,23,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,21,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,20,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,57,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,58,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,59,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,60,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,40,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,61,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,62,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,63,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,43,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,65,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,69,'2019-03-01 00:00:00',0,NULL,'','',1,2,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,83,'2019-03-01 00:00:00',0,NULL,'','',1,2,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,84,'2019-03-01 00:00:00',0,NULL,'','',1,2,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,85,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,89,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,90,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,91,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,92,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,93,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,94,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,88,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,87,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,86,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,95,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,96,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,97,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,101,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,103,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,104,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,105,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,106,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,99,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,98,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,51,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,107,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,108,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,109,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,110,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,111,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,100,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,112,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,123,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,124,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,125,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,126,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,127,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,128,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,129,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,130,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,131,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,132,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,133,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,134,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,135,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,136,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,137,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,138,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,139,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,102,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,140,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,141,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,142,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,143,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,144,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,145,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,146,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,147,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,148,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,149,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,150,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,151,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,152,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,153,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,154,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,155,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,156,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,157,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,158,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,159,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,160,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,161,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,164,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,165,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,166,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,167,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,168,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,169,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,171,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,170,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,172,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,162,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,163,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,173,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,174,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,175,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,176,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,177,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,178,'2019-03-01 00:00:00',0,NULL,'','',1,2,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12'),(0,33,'2019-03-01 00:00:00',0,NULL,'','',1,3,0,0,'2019-03-01 14:50:12','2019-03-01 14:50:12');

/*Table structure for table `tbl_audittrial` */

DROP TABLE IF EXISTS `tbl_audittrial`;

CREATE TABLE `tbl_audittrial` (
  `audit_trial_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) DEFAULT NULL,
  `context` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operator` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`audit_trial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_audittrial` */

/*Table structure for table `tbl_audittrialgroup` */

DROP TABLE IF EXISTS `tbl_audittrialgroup`;

CREATE TABLE `tbl_audittrialgroup` (
  `aduit_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `aduit_group_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`aduit_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_audittrialgroup` */

/*Table structure for table `tbl_bank_account` */

DROP TABLE IF EXISTS `tbl_bank_account`;

CREATE TABLE `tbl_bank_account` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bank_account` */

/*Table structure for table `tbl_bank_account_history` */

DROP TABLE IF EXISTS `tbl_bank_account_history`;

CREATE TABLE `tbl_bank_account_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_account_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `transfer` varchar(45) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_account_id_idx` (`bank_account_id`),
  KEY `stock_id_idx` (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bank_account_history` */

/*Table structure for table `tbl_billingmigration` */

DROP TABLE IF EXISTS `tbl_billingmigration`;

CREATE TABLE `tbl_billingmigration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qty_cust` float DEFAULT NULL,
  `type_cust_id` int(5) DEFAULT NULL,
  `date_cust` datetime DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `unit_id` int(5) DEFAULT NULL,
  `qty_item` float DEFAULT NULL,
  `branch_id` int(5) DEFAULT NULL,
  `date_item` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_billingmigration` */

/*Table structure for table `tbl_branch` */

DROP TABLE IF EXISTS `tbl_branch`;

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `branch_group_id` int(11) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_default` int(1) DEFAULT '0',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_branch` */

insert  into `tbl_branch`(`id`,`company_id`,`branch_name`,`description`,`branch_group_id`,`is_delete`,`is_default`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,'Branch A',NULL,1,0,1,NULL,2,NULL,'2019-02-28 22:26:02'),(2,1,'Branch B',NULL,1,0,0,NULL,2,NULL,'2019-02-28 22:26:02');

/*Table structure for table `tbl_branch_group` */

DROP TABLE IF EXISTS `tbl_branch_group`;

CREATE TABLE `tbl_branch_group` (
  `id` int(11) NOT NULL,
  `branch_group_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_group_description` longtext COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_branch_group` */

insert  into `tbl_branch_group`(`id`,`branch_group_name`,`branch_group_description`,`is_active`,`is_delete`) values (1,'Group A','description',1,0),(3,'Group B',NULL,1,0);

/*Table structure for table `tbl_cash_drawer` */

DROP TABLE IF EXISTS `tbl_cash_drawer`;

CREATE TABLE `tbl_cash_drawer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cash_drawer_group_id` int(11) DEFAULT NULL,
  `workshift_id` int(11) DEFAULT NULL,
  `amount_usd` float DEFAULT NULL,
  `amount_khr` float DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `udpated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cash_drawer_cash_drawer_group1_idx` (`cash_drawer_group_id`) USING BTREE,
  KEY `fk_cash_drawer_sys_users1_idx` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_cash_drawer` */

/*Table structure for table `tbl_cash_drawer_group` */

DROP TABLE IF EXISTS `tbl_cash_drawer_group`;

CREATE TABLE `tbl_cash_drawer_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptioin` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_cash_drawer_group` */

/*Table structure for table `tbl_cash_drawer_transaction` */

DROP TABLE IF EXISTS `tbl_cash_drawer_transaction`;

CREATE TABLE `tbl_cash_drawer_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_drawer_id` int(11) DEFAULT NULL,
  `workshift_id` int(11) DEFAULT NULL,
  `open_by` int(11) DEFAULT NULL,
  `close_by` int(11) DEFAULT NULL,
  `open_amount` decimal(16,4) DEFAULT NULL,
  `open_date` datetime DEFAULT NULL,
  `close_amount` decimal(16,4) DEFAULT NULL,
  `close_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `actaul_amount` decimal(16,4) DEFAULT NULL,
  `diff_amount` decimal(16,4) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_cash_drawer_transaction_cash_drawer1_idx` (`cash_drawer_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_cash_drawer_transaction` */

/*Table structure for table `tbl_company` */

DROP TABLE IF EXISTS `tbl_company`;

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_kh` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_en` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `website` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_company` */

insert  into `tbl_company`(`id`,`company_kh`,`company_en`,`image`,`address`,`description`,`website`,`phone`,`email`,`created_at`,`updated_at`) values (1,'General','General','02-Mar-2019/__logo.png','Phnom Penh Cambodia.','','www.website.com','081397071','test@test.com',NULL,'2019-03-02 17:02:51');

/*Table structure for table `tbl_config` */

DROP TABLE IF EXISTS `tbl_config`;

CREATE TABLE `tbl_config` (
  `id` int(11) NOT NULL,
  `config_group_id` int(11) DEFAULT '1',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_config` */

insert  into `tbl_config`(`id`,`config_group_id`,`name`,`keywords`,`value`) values (-1,1,'License Expired','CPDATE','1471453200'),(1,1,'Site Name','SITE_NAME','Inventory Management System'),(2,1,'Site Descriptiom','META_DESCRIPTION','Bassaka Air is a passenger airline in Cambodia. It began domestic flights on 1 Dec 2014, and international flights shortly afterwards on 30 Mar 2015, utilizing two Airbus 320-214'),(3,1,'Site Keywords','META_KEYWORDS','Cambodia Airline ,bassaka air, air, phnom penh air, fly to phnom penh, fly to siemreap, cambodia airlines'),(4,1,'Contact Email','CONTACT_EMAIL','customerservices@bassakaair.com'),(5,2,'Address','CONTACT_ADDRESS','#335 Preah Sihanouk Boulevard, Phnom Penh, 12253, Kingdom of Cambodia'),(6,1,'Base site url','SITE_HTTP_URL','http://kk_ticket_system.localhost:81/'),(7,1,'Site Logo','SITE_LOGO','images/logo.png'),(9,1,'Default Language','CONFIG_LANGUAGE','2'),(10,1,'Image parth','WWW_IMAGE_ROOT','E:/Y5Net/htdocs/flight_schedule/public/images/'),(11,3,'Image List Thumb Width','IMAGE_THUMB_WIDTH','120'),(12,3,'Image List Thumb Height','IMAGE_THUMB_HEIGHT','80'),(13,3,'Max upload image','MAX_UPLOAD_IMAGE','1MB'),(14,1,'Sub domain','WWW_SUB_DOMAIN','/'),(16,1,'Footer text','FOOTER_TEXT','Copyright &copy; 2019. All Right Reserved.'),(17,1,'Footer all right','FOOTER_TEXT2','Power by'),(18,1,'http-equiv: Content Type','HTTP_EQUIV_CONTENT_TYPE','text/html; charset=utf-8'),(19,1,'Metha view report','MATA_VIEW_REPORT','width=device-width, initial-scale=1, maximum-scale=1'),(20,1,'Widget Parth','WWW_ROOT','E:/Y5Net/htdocs/flight_schedule/public/'),(21,2,'Contact Number','CONTACT_NUMBER','+855 23 217 613'),(22,2,'Fax Number','FAX_NUMBER','+855 23 217 288'),(25,2,'Website','WEBSITE','www.bassakaair.com'),(26,2,'Company','COMPANY','Inventory System'),(27,3,'Max career file size','MAX_FILE_SIZE','3MB'),(31,7,'Default Time','DEFAULT_TIME','UTC'),(32,5,'Flight Frefix','FLIGHT_PREFIX','5B'),(33,6,'Allow Realtime Alert License Expired of Crews','License_Expiration_End_Time','7'),(34,7,'Set Default => UTC Time = 1, Local Time = 2','DEFAULT_UTC_TIME','1'),(36,7,'TOTAL_TIME_FORMAT','TOTAL_TIME_FORMAT','H:i'),(37,7,'Default date fomat','DEFAULT_DATE_FORMAT','d-M-Y'),(38,7,'Default time format','DEFAULT_TIME_FORMAT','H:i'),(39,7,'Day time','DAY_TIME','06:00'),(40,7,'Night time','NIGHT_TIME','16:00'),(41,8,'Page print width','PRINT_PAGE_WIDTH','1000px'),(42,8,'Print font size','PRINT_FONT_SIZE','12px'),(43,1,'Print row height','PRINT_ROW_PADDING','4px'),(44,7,'Format date time','DATE_TIME_FORMAT','d-m-Y H:i'),(45,9,'Flight Color','FLIGHT_COLOR','blue'),(46,9,'Color Flight Delay','FLIGHT_COLOR_DELAY','#f00'),(47,9,'Flight color not approved','FLIGHT_COLOR_NOT_APPROVED','#555'),(48,9,'Cancel highlight color','CANCEL_HIGHLIGHT_COLOR','yellow'),(49,1,'MAX_DO_FLIGHT_CANCEL_PAX_MOVEMENT','MAX_DO_FLIGHT_CANCEL_PAX_MOVEMENT','5'),(50,1,'Number of minute to count flight delay','MAX_DURATION_COUNT_DELAY','15'),(51,10,'Tax','TAX','0');

/*Table structure for table `tbl_config_group` */

DROP TABLE IF EXISTS `tbl_config_group`;

CREATE TABLE `tbl_config_group` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_config_group` */

insert  into `tbl_config_group`(`id`,`name`) values (1,'Site'),(2,'Contact info'),(3,'Image'),(4,'Expired Date'),(5,'FLIGHT_PREFIX'),(6,'Notification'),(7,'Date Time'),(8,'Print'),(9,'Group Color Flight'),(10,'Tax'),(1,'Site'),(2,'Contact info'),(3,'Image'),(4,'Expired Date'),(5,'FLIGHT_PREFIX'),(6,'Notification'),(7,'Date Time'),(8,'Print'),(9,'Group Color Flight'),(10,'Tax');

/*Table structure for table `tbl_currency` */

DROP TABLE IF EXISTS `tbl_currency`;

CREATE TABLE `tbl_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `currency_sign` varchar(45) DEFAULT NULL,
  `fraction_unit` varchar(50) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `exchange_rate` decimal(3,0) DEFAULT NULL,
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_currency` */

insert  into `tbl_currency`(`id`,`name`,`value`,`currency_sign`,`fraction_unit`,`is_default`,`is_delete`,`is_active`,`exchange_rate`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Dollar','1','$','1',1,NULL,1,'1',NULL,NULL,NULL,'2017-01-23 23:37:13'),(2,'Reil','4100','R','100',0,NULL,1,'41',NULL,NULL,'2017-01-20 22:44:05','2017-11-08 14:50:50');

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_group_id` int(4) NOT NULL,
  `customer_type_id` int(4) NOT NULL,
  `group_invoice_due_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `is_default` int(1) DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`id`,`customer_group_id`,`customer_type_id`,`group_invoice_due_id`,`name`,`phone`,`email`,`address`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_default`,`is_delete`) values (1,1,1,NULL,'General','none','none','none',NULL,NULL,'2019-03-02 17:31:07',2,1,0);

/*Table structure for table `tbl_customer_field` */

DROP TABLE IF EXISTS `tbl_customer_field`;

CREATE TABLE `tbl_customer_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_customer_field` */

insert  into `tbl_customer_field`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Normal',0,1,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_customer_group` */

DROP TABLE IF EXISTS `tbl_customer_group`;

CREATE TABLE `tbl_customer_group` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_customer_group` */

insert  into `tbl_customer_group`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'General',0,1,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_department` */

DROP TABLE IF EXISTS `tbl_department`;

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_department` */

insert  into `tbl_department`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'test12',1,0,2,2,'2016-10-23 12:04:03','2016-10-23 12:04:20'),(2,'de',1,1,2,NULL,'2017-11-05 20:54:38','2017-11-05 20:54:47'),(1,'test12',1,0,2,2,'2016-10-23 12:04:03','2016-10-23 12:04:20'),(2,'de',1,1,2,NULL,'2017-11-05 20:54:38','2017-11-05 20:54:47'),(0,'department',0,1,2,NULL,'2019-02-28 13:11:21','2019-02-28 13:11:21');

/*Table structure for table `tbl_discount_item` */

DROP TABLE IF EXISTS `tbl_discount_item`;

CREATE TABLE `tbl_discount_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_never_expire` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_delete` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_discount_item` */

insert  into `tbl_discount_item`(`id`,`name`,`start_date`,`end_date`,`is_never_expire`,`is_active`,`start_time`,`end_time`,`description`,`is_delete`,`created_at`,`updated_at`) values (1,'Discount Item','2018-12-19','2018-12-22',NULL,1,NULL,NULL,NULL,0,'2018-12-22 13:52:17','2018-12-22 13:53:27');

/*Table structure for table `tbl_discount_item_detail` */

DROP TABLE IF EXISTS `tbl_discount_item_detail`;

CREATE TABLE `tbl_discount_item_detail` (
  `discount_item_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `discount` decimal(16,2) DEFAULT NULL,
  `discount_method_id` int(11) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_discount_item_detail` */

insert  into `tbl_discount_item_detail`(`discount_item_id`,`item_id`,`category_id`,`branch_id`,`discount`,`discount_method_id`,`is_delete`,`created_at`,`updated_at`) values (1,2,1,NULL,'2.00',1,NULL,'2018-12-22 13:53:27','2018-12-22 13:53:27'),(1,1,1,NULL,'4.00',1,NULL,'2018-12-22 13:53:27','2018-12-22 13:53:27');

/*Table structure for table `tbl_discount_methods` */

DROP TABLE IF EXISTS `tbl_discount_methods`;

CREATE TABLE `tbl_discount_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbr` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_discount_methods` */

insert  into `tbl_discount_methods`(`id`,`abbr`,`name`,`description`,`created_at`,`updated_at`) values (1,'%','Percentage',NULL,NULL,NULL),(2,'$','Amount',NULL,NULL,NULL);

/*Table structure for table `tbl_discount_permissions` */

DROP TABLE IF EXISTS `tbl_discount_permissions`;

CREATE TABLE `tbl_discount_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `discount_method_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_discount_permissions_discount_methods1_idx` (`discount_method_id`) USING BTREE,
  KEY `fk_discount_permissions_sys_users1_idx` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_discount_permissions` */

/*Table structure for table `tbl_employee` */

DROP TABLE IF EXISTS `tbl_employee`;

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(2) DEFAULT NULL,
  `department_id` int(2) DEFAULT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_gender` int(1) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_pob` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_current_living` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_relative` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_employee` */

insert  into `tbl_employee`(`id`,`position_id`,`department_id`,`emp_name`,`emp_gender`,`emp_dob`,`emp_pob`,`emp_current_living`,`emp_contact`,`emp_email`,`emp_relative`,`is_delete`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,1,'emp1',NULL,'0000-00-00',NULL,'','test@test',NULL,'',NULL,2,2,'2016-10-23 17:38:53','2019-02-28 13:11:33'),(2,1,1,'emp2',NULL,'0000-00-00',NULL,'','',NULL,'',1,2,2,'2017-11-05 20:55:23','2019-02-28 13:11:39');

/*Table structure for table `tbl_group_invoice_due` */

DROP TABLE IF EXISTS `tbl_group_invoice_due`;

CREATE TABLE `tbl_group_invoice_due` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_group_invoice_due` */

insert  into `tbl_group_invoice_due`(`id`,`name`,`alias`,`value`) values (1,'teftefe','wfwe','wfwe'),(2,'teste','rfwer','6'),(3,'7 days','7D','7');

/*Table structure for table `tbl_group_role` */

DROP TABLE IF EXISTS `tbl_group_role`;

CREATE TABLE `tbl_group_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(5) DEFAULT NULL,
  `remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_alert_email` tinyint(1) DEFAULT '0',
  `is_alert_system` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `group_user_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_group_role` */

insert  into `tbl_group_role`(`id`,`name`,`group_id`,`remark`,`is_alert_email`,`is_alert_system`,`is_active`) values (7,'Top Admin',1,'',1,1,1);

/*Table structure for table `tbl_group_role_detail` */

DROP TABLE IF EXISTS `tbl_group_role_detail`;

CREATE TABLE `tbl_group_role_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_role_id` int(11) DEFAULT NULL,
  `menu_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `parent_menu_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `read` int(1) unsigned zerofill DEFAULT '0',
  `write` int(1) unsigned zerofill DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_group_role_detail` (`group_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8407 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_group_role_detail` */

insert  into `tbl_group_role_detail`(`id`,`group_role_id`,`menu_code`,`parent_menu_id`,`menu_id`,`read`,`write`) values (7511,8,'y5_m01',0,1,1,1),(7512,8,'y5_m02',0,2,1,1),(7513,8,'y5_m09',0,3,1,1),(7514,8,'y5_m10',0,4,1,1),(7515,8,'y5_s25',4,7,1,1),(7516,8,'y5_s26',4,8,1,1),(7517,8,'y5_s24',4,6,1,1),(7518,8,'y5_m26',0,90,1,1),(7519,8,'y5_s97',90,92,1,1),(7520,8,'y5_s96',90,91,1,1),(7521,8,'y5_m11',0,5,1,1),(7522,8,'y5_s27',5,9,1,1),(7523,8,'y5_s43',5,10,1,1),(7524,8,'y5_s42',5,29,1,1),(7525,8,'y5_m18',0,37,1,1),(7526,8,'y5_s37',37,24,1,1),(7527,8,'y5_s52',37,39,1,1),(7528,8,'y5_s89',37,83,1,1),(7529,8,'y5_s95',37,89,1,1),(7530,8,'y5_s53',37,40,1,1),(7531,8,'y5_m21',0,48,1,1),(7532,8,'y5_s59',48,49,1,1),(7533,8,'y5_m16',0,15,1,1),(7534,8,'y5_s66',15,56,1,1),(7535,8,'y5_s93',15,87,1,1),(7536,8,'y5_s70',15,60,1,1),(7537,8,'y5_s30',15,16,1,1),(7538,8,'y5_s33',15,19,1,1),(7539,8,'y5_s67',15,57,1,1),(7540,8,'y5_s65',15,55,1,1),(7541,8,'y5_s68',15,58,1,1),(7542,8,'y5_m24',0,76,1,1),(7543,8,'y5_s84',76,77,1,1),(7544,8,'y5_s85',76,78,1,1),(7545,8,'y5_m19',0,41,1,1),(7546,8,'y5_s54',41,42,1,1),(7547,8,'y5_m22',0,62,1,1),(7548,8,'y5_s72',62,63,1,1),(7549,8,'y5_s75',62,66,1,1),(7550,8,'y5_s73',62,64,1,1),(7551,8,'y5_s76',62,67,1,1),(7552,8,'y5_s74',62,65,1,1),(7553,8,'y5_m17',0,21,1,1),(7554,8,'y5_s38',21,25,1,1),(7555,8,'y5_s39',21,26,1,1),(7556,8,'y5_s77',21,68,1,1),(7557,8,'y5_m25',0,79,1,1),(7558,8,'y5_s86',79,80,1,1),(7559,8,'y5_m20',0,44,1,1),(7560,8,'y5_s31',44,17,1,1),(7561,8,'y5_s57',44,46,1,1),(7562,8,'y5_s58',44,47,1,1),(7563,8,'y5_m15',0,12,1,1),(7564,8,'y5_s94',12,88,1,1),(7565,8,'y5_s28',12,13,1,1),(7566,8,'y5_s50',12,36,1,1),(7567,8,'y5_s45',12,31,1,1),(7568,8,'y5_s71',12,61,1,1),(7569,8,'y5_s48',12,34,1,1),(7570,8,'y5_s36',12,23,1,1),(7571,8,'y5_s51',12,38,1,1),(7572,8,'y5_s46',12,32,1,1),(7573,8,'y5_s82',12,74,1,1),(7574,8,'y5_s49',12,35,1,1),(7575,8,'y5_s79',12,70,1,1),(7576,8,'y5_s44',12,30,1,1),(7577,8,'y5_s60',12,50,1,1),(7578,8,'y5_s47',12,33,1,1),(7579,8,'y5_s83',12,75,1,1),(7580,8,'y5_m23',0,71,1,1),(8340,7,'y5_m30',0,99,1,1),(8341,7,'y5_s104',99,100,1,1),(8342,7,'y5_m01',0,1,1,1),(8343,7,'y5_m02',0,2,1,1),(8344,7,'y5_m09',0,3,1,1),(8345,7,'y5_m10',0,4,1,1),(8346,7,'y5_s24',4,6,1,1),(8347,7,'y5_s25',4,7,1,1),(8348,7,'y5_s26',4,8,1,1),(8349,7,'y5_m26',0,90,1,1),(8350,7,'y5_s97',90,92,1,1),(8351,7,'y5_s96',90,91,1,1),(8352,7,'y5_m11',0,5,1,1),(8353,7,'y5_s39',5,26,1,1),(8354,7,'y5_s82',5,74,1,1),(8355,7,'y5_s43',5,10,1,1),(8356,7,'y5_s42',5,29,1,1),(8357,7,'y5_s98',5,93,1,1),(8358,7,'y5_s28',5,13,1,1),(8359,7,'y5_s60',5,50,1,1),(8360,7,'y5_m17',0,21,1,1),(8361,7,'y5_s38',21,25,1,1),(8362,7,'y5_s77',21,68,1,1),(8363,7,'y5_m20',0,44,1,1),(8364,7,'y5_s58',44,47,1,1),(8365,7,'y5_s31',44,17,1,1),(8366,7,'y5_s57',44,46,1,1),(8367,7,'y5_m15',0,12,1,1),(8368,7,'y5_s79',12,70,1,1),(8369,7,'y5_s46',12,32,1,1),(8370,7,'y5_s49',12,35,1,1),(8371,7,'y5_s44',12,30,1,1),(8372,7,'y5_s47',12,33,1,1),(8373,7,'y5_s50',12,36,1,1),(8374,7,'y5_s45',12,31,1,1),(8375,7,'y5_s48',12,34,1,1),(8376,7,'y5_m23',0,71,1,1),(8377,7,'y5_m18',0,37,1,1),(8378,7,'y5_s36',37,23,1,1),(8379,7,'y5_s94',37,88,1,1),(8380,7,'y5_s37',37,24,1,1),(8381,7,'y5_s95',37,89,1,1),(8382,7,'y5_s83',37,75,1,1),(8383,7,'y5_s71',37,61,1,1),(8384,7,'y5_s51',37,38,1,1),(8385,7,'y5_s99',37,94,1,1),(8386,7,'y5_s52',37,39,1,1),(8387,7,'y5_s53',37,40,1,1),(8388,7,'y5_s100',37,95,1,1),(8389,7,'y5_m21',0,48,1,1),(8390,7,'y5_s59',48,49,1,1),(8391,7,'y5_m16',0,15,1,1),(8392,7,'y5_s93',15,87,1,1),(8393,7,'y5_s105',15,102,1,1),(8394,7,'y5_s85',15,78,1,1),(8395,7,'y5_s70',15,60,1,1),(8396,7,'y5_s86',15,80,1,1),(8397,7,'y5_m19',0,41,1,1),(8398,7,'y5_s54',41,42,1,1),(8399,7,'y5_m22',0,62,1,1),(8400,7,'y5_s72',62,63,1,1),(8401,7,'y5_s73',62,64,1,1),(8402,7,'y5_s74',62,65,1,1),(8403,7,'y5_s75',62,66,1,1),(8404,7,'y5_s102',62,97,1,1),(8405,7,'y5_s76',62,67,1,1),(8406,7,'y5_s101',62,96,1,1);

/*Table structure for table `tbl_inventory_onhand` */

DROP TABLE IF EXISTS `tbl_inventory_onhand`;

CREATE TABLE `tbl_inventory_onhand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `onhand_qty` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_inventory_onhand` */

/*Table structure for table `tbl_invoice` */

DROP TABLE IF EXISTS `tbl_invoice`;

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_pre` varchar(100) DEFAULT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `is_agency` tinyint(4) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `profit_amount` decimal(10,0) DEFAULT NULL,
  `disposit` decimal(10,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `issue_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `exchange_rate` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `is_void` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id_idx` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_invoice` */

/*Table structure for table `tbl_invoice_sequence` */

DROP TABLE IF EXISTS `tbl_invoice_sequence`;

CREATE TABLE `tbl_invoice_sequence` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sequence_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_invoice_sequence` */

insert  into `tbl_invoice_sequence`(`id`,`sequence_no`) values (1,22);

/*Table structure for table `tbl_item` */

DROP TABLE IF EXISTS `tbl_item`;

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_barcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `net_price` float(10,4) DEFAULT NULL,
  `item_category_id` int(4) NOT NULL,
  `item_sub_category_id` int(4) DEFAULT NULL,
  `item_type_id` int(4) NOT NULL,
  `item_status_id` int(4) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` float(10,4) DEFAULT NULL,
  `cost` float(10,3) DEFAULT NULL,
  `price` float(10,3) DEFAULT NULL COMMENT 'Retail Sale',
  `default_currency` int(1) DEFAULT NULL,
  `default_unit` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `item_category_id_idx` (`item_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item` */

insert  into `tbl_item`(`id`,`item_code`,`item_barcode`,`image`,`net_price`,`item_category_id`,`item_sub_category_id`,`item_type_id`,`item_status_id`,`name`,`alias`,`qty`,`cost`,`price`,`default_currency`,`default_unit`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_active`,`is_delete`) values (1,'001','001','20-Nov-2017/23509329_1435171959884265_7764028649947648978_o.jpg',2.3000,6,31,1,2,'E27បីពណ៌','បីពណ៌',0.0000,3.000,4.000,1,3,'2017-11-04 08:24:56',2,'2017-11-20 18:47:07',2,1,0),(14,'123456789','123456789','20-Nov-2017/23509501_1435172023217592_6149394259937685616_o.jpg',10.0000,3,5,2,2,'AV21902','AV21902',15.0000,14.000,16.000,1,3,'2017-11-04 17:42:43',2,'2017-11-20 18:40:58',2,1,0),(15,'354120124260','354120124260','20-Nov-2017/23550047_1435172016550926_4757645041849090363_o.jpg',2.8000,6,5,1,2,'white 15w','YuanBo',0.0000,3.200,4.000,1,3,'2017-11-14 09:50:05',2,'2017-11-20 18:49:34',2,1,0),(16,'354120124260','354120124260','20-Nov-2017/light.jpg',2.8000,6,31,1,2,'warm 15w','YuanBo',0.0000,3.200,4.000,1,3,'2017-11-14 10:09:34',2,'2017-11-20 18:39:50',2,1,0),(17,'1671','01671','21-Nov-2017/3599186482_178148046.jpg',60.0000,2,8,1,2,'1671','1671',0.0000,75.000,88.000,1,3,'2017-11-21 21:34:36',2,'2017-11-21 22:15:32',0,1,1),(18,'1671','01671','21-Nov-2017/3599186482_178148046.jpg',60.0000,2,8,1,2,'1671','1671',0.0000,75.000,88.000,1,3,'2017-11-21 21:34:37',2,'2017-11-21 22:15:38',0,1,1),(19,'1671','01671','21-Nov-2017/3599186482_178148046.jpg',60.0000,2,8,1,2,'1671','1671',0.0000,75.000,88.000,1,3,'2017-11-21 21:34:38',2,'2017-11-21 22:15:41',0,1,1),(20,'1671','01671','05-Dec-2017/AV165.jpg',60.0000,2,8,1,2,'1671','1671',0.0000,75.000,88.000,1,3,'2017-11-21 21:34:39',2,'2017-12-05 14:02:35',2,1,0),(21,'1681','01681','05-Dec-2017/58963.jpg',9.0000,2,8,1,2,'1681','1681',0.0000,12.000,15.000,1,3,'2017-11-21 22:17:26',2,'2017-12-05 13:54:15',2,1,0),(22,'1682','01682',NULL,9.0000,2,0,1,2,'1682','1682',0.0000,12.000,15.000,1,3,'2017-11-21 22:19:38',2,'2017-11-21 22:19:38',0,1,0),(23,'1682','01682','05-Dec-2017/32.jpg',9.0000,2,8,1,2,'1682','1682',0.0000,12.000,15.000,1,3,'2017-11-21 22:23:27',2,'2017-12-05 13:49:43',2,1,0),(24,'1683','0168350','21-Nov-2017/AV1683.jpg',25.0000,2,8,1,2,'1683 (50cm)','1683',0.0000,30.000,35.000,1,3,'2017-11-21 22:28:41',2,'2017-11-23 16:10:19',0,1,1),(25,'168380','0168380','21-Nov-2017/AV1683.jpg',45.0000,2,8,1,2,'1683(80cm)','1683',0.0000,50.000,60.000,1,3,'2017-11-21 22:30:10',2,'2017-11-23 16:10:30',0,1,1),(26,'16919','16919','05-Dec-2017/2563.jpg',10.0000,2,8,1,2,'16919','16919',0.0000,12.000,16.000,1,3,'2017-11-22 19:45:56',2,'2017-12-05 12:36:57',2,1,0),(27,'169118','169118','05-Dec-2017/4845.jpg',10.0000,2,8,1,2,'169118','169118',0.0000,12.000,16.000,1,3,'2017-11-22 19:46:54',2,'2017-12-05 12:27:51',2,1,0),(28,'169116','169116','05-Dec-2017/AV169116.jpg',10.0000,2,8,1,2,'169116','169116',0.0000,12.000,16.000,1,3,'2017-11-22 19:47:50',2,'2017-12-05 12:27:16',2,1,0),(29,'21927','21927','22-Nov-2017/AV21927.jpg',8.0000,3,3,2,2,'21927','21927',0.0000,12.000,16.000,1,6,'2017-11-22 19:51:13',2,'2017-11-22 19:51:13',0,1,0),(30,'169114','169114','05-Dec-2017/987.jpg',10.0000,2,8,1,2,'169114','169114',0.0000,12.000,16.000,1,3,'2017-11-22 19:52:45',2,'2017-12-05 12:13:56',2,1,0),(31,'16921','16921','05-Dec-2017/AV16921.jpg',10.0000,2,8,1,2,'16921','16921',0.0000,12.000,16.000,1,3,'2017-11-22 20:08:11',2,'2017-12-05 11:38:06',2,1,0),(32,'16916','16916','05-Dec-2017/1234556.jpg',10.0000,2,8,1,2,'16916','16916',0.0000,12.000,16.000,1,3,'2017-11-22 20:11:47',2,'2017-12-05 12:10:06',2,1,0),(33,'169115','169115','05-Dec-2017/AV169115New picture.jpg',10.0000,2,8,1,2,'169115','169115',0.0000,12.000,16.000,1,3,'2017-11-22 20:26:00',2,'2018-02-26 00:57:33',2,1,0),(34,'!','','22-Nov-2017/A.jpg',4.0000,6,31,1,2,'A','A',0.0000,2.000,3.000,1,3,'2017-11-22 20:49:19',2,'2017-11-22 20:50:25',2,1,0),(35,'B','',NULL,4.0000,6,0,1,2,'B','B',0.0000,12.000,34.000,1,3,'2017-11-22 20:52:02',2,'2017-11-22 20:52:02',0,1,0),(36,'35','','22-Nov-2017/B.jpg',10.0000,6,31,1,2,'B','B',0.0000,2.000,1.000,1,3,'2017-11-22 20:53:46',2,'2017-11-22 20:53:46',0,1,0),(37,'323','','22-Nov-2017/D.jpg',11.0000,6,31,1,2,'D','D',0.0000,1.000,2.000,1,3,'2017-11-22 20:55:00',2,'2017-11-22 20:55:00',0,1,0),(38,'232','','22-Nov-2017/E.jpg',23.0000,6,31,1,2,'E','E',0.0000,3.000,4.000,1,3,'2017-11-22 20:55:43',2,'2017-11-22 20:55:43',0,1,0),(39,'1689','1689',NULL,28.0000,2,8,1,2,'1689','1689',0.0000,30.000,33.000,1,3,'2017-11-23 15:46:16',2,'2017-11-23 15:54:04',0,1,1),(40,'1689','1689','05-Dec-2017/ASEDCV.jpg',28.0000,2,8,1,2,'1689','1689',0.0000,30.000,33.000,1,3,'2017-11-23 15:46:26',2,'2017-12-05 11:29:44',2,1,0),(41,'1683','1683','05-Dec-2017/a.jpg',29.0000,2,8,1,2,'1683(50CM)','1683',0.0000,31.000,35.000,1,3,'2017-11-23 16:04:59',2,'2017-12-05 11:28:26',2,1,0),(42,'1683','1683','05-Dec-2017/a.jpg',50.0000,2,8,1,2,'1683(80CM)','1683',0.0000,53.000,60.000,1,3,'2017-11-23 16:12:31',2,'2017-12-05 11:27:52',2,1,0),(43,'1693','1693','05-Dec-2017/2.jpg',28.0000,2,8,1,2,'1693','1693',0.0000,30.000,33.000,1,3,'2017-11-23 16:14:49',2,'2017-12-05 11:26:47',2,1,0),(44,'011','011','23-Nov-2017/1.jpg',15.0000,3,2,1,2,'011','011',0.0000,18.000,22.000,1,6,'2017-11-23 16:17:46',2,'2017-12-05 11:26:22',0,1,1),(45,'001','001','23-Nov-2017/3.jpg',1.5000,14,33,1,2,'001','001',0.0000,1.700,2.000,1,6,'2017-11-23 16:19:57',2,'2017-12-05 11:25:56',0,1,1),(46,'002','002','23-Nov-2017/4.jpg',1.5000,14,33,1,2,'002','002',0.0000,1.700,2.000,1,6,'2017-11-23 16:21:33',2,'2017-12-05 11:25:49',0,1,1),(47,'003','003','23-Nov-2017/5.jpg',1.8000,14,33,1,2,'003','003',0.0000,1.900,2.200,1,6,'2017-11-23 16:22:34',2,'2017-12-05 11:25:42',0,1,1),(48,'005','005','23-Nov-2017/2.jpg',1.9000,14,33,1,2,'005','005',0.0000,2.200,2.500,1,6,'2017-11-23 16:23:50',2,'2017-12-05 11:25:36',0,1,1),(49,'1883','1883','23-Nov-2017/12.jpg',9.0000,2,7,1,2,'1883','1883',0.0000,11.000,17.000,1,3,'2017-11-23 16:27:25',2,'2017-12-29 12:38:17',2,1,1),(50,'21916','21916','23-Nov-2017/3.jpg',12.0000,3,0,2,2,'21916','21916',0.0000,14.000,17.000,1,3,'2017-11-23 16:30:11',2,'2017-11-23 16:30:11',0,1,0),(51,'AV21916','AV21916','29-Dec-2017/g.jpg',12.0000,3,3,2,2,'AV21916','AV21916',0.0000,14.000,20.000,1,3,'2017-11-23 16:32:11',2,'2017-12-29 12:29:13',2,1,0),(52,'1879','1879','23-Nov-2017/C.jpg',12.0000,3,2,1,2,'1879','1879',0.0000,14.000,18.000,1,6,'2017-11-23 23:46:04',2,'2017-11-23 23:46:51',2,1,0),(53,'2684','2684','05-Dec-2017/1.jpg',30.0000,3,1,2,2,'2684','2684',0.0000,35.000,40.000,1,3,'2017-11-24 00:20:55',2,'2017-12-05 11:14:09',2,1,0),(54,'2690','2690','30-Nov-2017/1.jpg',55.0000,3,1,2,2,'2690','2690',0.0000,62.000,68.000,1,3,'2017-11-24 00:22:23',2,'2017-11-30 23:31:22',2,1,0),(55,'2691','2691','30-Nov-2017/3.jpg',60.0000,3,1,2,2,'2691','2691',0.0000,68.000,75.000,1,3,'2017-11-24 00:27:20',2,'2017-11-30 23:28:56',2,1,0),(56,'1721','1721','24-Nov-2017/2.jpg',30.0000,2,8,1,2,'1721','1721',0.0000,33.000,38.000,1,3,'2017-11-24 00:36:21',2,'2017-11-24 00:36:21',0,1,0),(57,'1684','1684','05-Dec-2017/15897.jpg',25.0000,2,8,1,2,'1684','1684',0.0000,30.000,35.000,1,3,'2017-12-05 14:14:51',2,'2017-12-05 14:14:51',0,1,0),(58,'1685','1685','05-Dec-2017/154156.jpg',25.0000,2,8,1,2,'1685','1685',0.0000,30.000,33.000,1,3,'2017-12-05 14:21:07',2,'2017-12-05 14:21:07',0,1,0),(59,'1686','1686','05-Dec-2017/231215.jpg',28.0000,2,8,1,2,'1686','1686',0.0000,30.000,35.000,1,3,'2017-12-05 14:29:20',2,'2017-12-05 14:29:20',0,1,0),(60,'1687','1687','05-Dec-2017/28954.jpg',25.0000,2,8,1,2,'1687','1687',0.0000,30.000,35.000,1,3,'2017-12-05 14:35:20',2,'2017-12-05 14:35:20',0,1,0),(61,'1690','1690','05-Dec-2017/1247.jpg',25.0000,2,8,1,2,'1690','1690',0.0000,30.000,33.000,1,3,'2017-12-05 14:52:41',2,'2017-12-05 14:52:41',0,1,0),(62,'1691','1691','05-Dec-2017/1690.jpg',25.0000,2,8,1,2,'1691','1691',0.0000,30.000,33.000,1,3,'2017-12-05 15:05:36',2,'2017-12-05 15:05:36',0,1,0),(63,'1692','1692','05-Dec-2017/965.jpg',25.0000,2,8,1,2,'1692','1692',0.0000,30.000,35.000,1,3,'2017-12-05 15:10:04',2,'2017-12-05 15:10:04',0,1,0),(64,'AV21901','AV21901','05-Dec-2017/AV21901abc.jpg',10.0000,3,3,2,2,'AV21901','AV21901',0.0000,16.000,18.000,1,3,'2017-12-05 15:16:21',2,'2017-12-05 15:28:41',2,1,0),(65,'1694','1694','05-Dec-2017/078.jpg',25.0000,2,8,1,2,'1694','1694',0.0000,29.000,33.000,1,3,'2017-12-05 15:22:46',2,'2017-12-05 15:22:46',0,1,0),(66,'AV21902','AV21902','05-Dec-2017/AV21902.jpg',10.0000,3,3,2,2,'AV21902','AV21902',0.0000,14.000,16.000,1,3,'2017-12-05 15:40:37',2,'2017-12-05 15:46:54',2,1,0),(67,'AVW1884','AVW1884','13-Dec-2017/AVW1884.jpg',10.0000,2,7,1,2,'AVW1884','AVW1884',0.0000,15.000,18.000,1,3,'2017-12-13 17:41:10',2,'2017-12-13 17:41:10',0,1,0),(68,'AVW1885','AVW1885','13-Dec-2017/AVW1885.jpg',10.0000,2,7,1,2,'AVW1885','AVW1885',0.0000,13.000,15.000,1,3,'2017-12-13 17:47:48',2,'2017-12-13 17:48:30',2,1,0),(69,'AV21935','AV21935','13-Dec-2017/AV21935.jpg',85.0000,2,5,1,2,'AV21935','AV21935',0.0000,120.000,150.000,1,3,'2017-12-13 22:38:19',2,'2017-12-13 22:38:19',0,1,0),(70,'AV1801','AV1801','19-Dec-2017/AV1801a.jpg',65.0000,2,8,2,2,'AV1801','AV1801',0.0000,85.000,96.000,1,3,'2017-12-19 12:00:42',2,'2017-12-19 12:00:42',0,1,0),(71,'AV21938','AV21938','19-Dec-2017/AV21938.jpg',16.0000,2,5,1,2,'AV21938','AV21938',0.0000,35.000,38.000,1,3,'2017-12-19 12:04:30',2,'2017-12-19 12:04:30',0,1,0),(72,'AV1802','AV1802','19-Dec-2017/AV1802a.jpg',40.0000,2,8,1,2,'AV1802','AV1802',0.0000,55.000,60.000,1,3,'2017-12-19 21:44:48',2,'2017-12-19 21:44:48',0,1,0),(73,'AV1803','AV1803','19-Dec-2017/AV1803a.jpg',25.0000,2,8,1,2,'AV1803','AV1803',0.0000,45.000,50.000,1,3,'2017-12-19 22:11:56',2,'2017-12-19 22:11:56',0,1,0),(74,'AV21939','AV21939','20-Dec-2017/AV21939a.jpg',15.0000,2,5,1,2,'AV21939','AV21939',0.0000,23.000,26.000,1,3,'2017-12-20 22:32:06',2,'2017-12-20 22:32:06',0,1,0),(75,'AV1815','AV1815','20-Dec-2017/AV1815a.jpg',20.0000,2,8,1,2,'AV1815','AV1815',0.0000,35.000,38.000,1,3,'2017-12-20 22:45:35',2,'2017-12-20 22:45:35',0,1,0),(76,'AV2201','AV2201','22-Dec-2017/AV2201a.jpg',16.0000,2,5,1,2,'AV2201','AV2201',0.0000,30.000,36.000,1,3,'2017-12-22 23:54:15',2,'2017-12-22 23:54:15',0,1,0),(77,'AV1812','AV1812','23-Dec-2017/AV1812a.jpg',30.0000,2,8,1,2,'AV1812','AV1812',0.0000,38.000,40.000,1,3,'2017-12-23 00:17:26',2,'2017-12-23 00:18:05',2,1,0),(78,'AV1816','AV1816','23-Dec-2017/AV1816a.jpg',25.0000,2,8,1,2,'AV1816','AV1816',0.0000,35.000,40.000,1,3,'2017-12-23 00:26:26',2,'2017-12-23 00:26:26',0,1,0),(79,'AV1811','AV1811','23-Dec-2017/AV1811.jpg',30.0000,2,8,1,2,'AV1811','AV1811',0.0000,40.000,46.000,1,3,'2017-12-23 07:38:47',2,'2017-12-23 07:38:47',0,1,0),(80,'AVW1886','AVW1886','23-Dec-2017/AVW1886.jpg',8.0000,2,7,1,2,'AVW1886','AVW1886',0.0000,15.000,18.000,1,3,'2017-12-23 07:51:56',2,'2017-12-23 07:51:56',0,1,0),(81,'123456','123456','23-Dec-2017/1.jpg',123.0000,2,0,1,2,'123456','123456',0.0000,125.000,128.000,1,2,'2017-12-23 15:23:39',2,'2017-12-23 15:23:39',0,1,0),(82,'123456','123456','23-Dec-2017/1.jpg',12.0000,2,4,1,2,'123456','123456',0.0000,15.000,18.000,1,2,'2017-12-23 15:27:54',2,'2017-12-23 15:28:48',2,1,1),(83,'AVW1867','AVW1867','28-Dec-2017/89242232.jpg',15.0000,3,2,2,2,'AVW1867','AVW1867',0.0000,18.000,22.000,1,3,'2017-12-28 10:16:23',2,'2017-12-28 10:16:23',0,1,0),(84,'AV1893','AV1893','28-Dec-2017/1893.jpg',70.0000,2,6,1,2,'AV1893','AV1893',0.0000,75.000,87.000,1,3,'2017-12-28 10:18:55',2,'2017-12-28 10:18:55',0,1,0),(85,'AV1895','AV1895','28-Dec-2017/1895-1.jpg',69.0000,2,6,1,2,'AV1895','AV1895',0.0000,73.000,83.000,1,3,'2017-12-28 10:20:25',2,'2017-12-28 10:20:25',0,1,0),(86,'AVl2201','AVl2201','28-Dec-2017/1897.jpg',15.0000,15,48,1,2,'AVl2201','AVl2201',0.0000,18.000,22.000,1,3,'2017-12-28 10:35:13',2,'2017-12-28 15:06:36',2,1,0),(87,'AVl2202','AVl2202','28-Dec-2017/dfs.jpg',12.0000,15,48,1,2,'AVl2202','AVl2202',0.0000,14.000,17.000,1,3,'2017-12-28 10:45:36',2,'2017-12-28 15:06:13',2,1,0),(88,'AVl2203','AVl2203','28-Dec-2017/we21.jpg',12.0000,15,48,1,2,'AVl2203','AVl2203',0.0000,14.000,17.000,1,3,'2017-12-28 10:54:46',2,'2017-12-28 15:05:39',2,1,0),(89,'AV1720','AV1720','28-Dec-2017/b.jpg',32.0000,2,0,1,2,'AV1720','AV1720',0.0000,38.000,45.000,1,3,'2017-12-28 11:20:44',2,'2017-12-28 11:20:44',0,1,0),(90,'AV1720','AV1720','28-Dec-2017/b.jpg',32.0000,2,8,1,2,'AV1720','AV1720',0.0000,38.000,45.000,1,3,'2017-12-28 11:24:35',2,'2017-12-28 11:24:35',0,1,0),(91,'AV1922','AV1922','28-Dec-2017/h76.jpg',8.0000,2,7,1,2,'AV1922','AV1922',0.0000,11.000,13.000,1,3,'2017-12-28 11:43:00',2,'2017-12-28 11:43:00',0,1,0),(92,'AV1727','AV1727','28-Dec-2017/1254.jpg',20.0000,2,8,1,2,'AV1727','AV1727',0.0000,25.000,30.000,1,3,'2017-12-28 11:48:05',2,'2017-12-28 11:48:05',0,1,0),(93,'AV21910','AV21910','28-Dec-2017/q2d.jpg',32.0000,2,5,1,2,'AV21910','AV21910',0.0000,38.000,45.000,1,3,'2017-12-28 14:18:49',2,'2017-12-28 14:18:49',0,1,0),(94,'AV21897','AV21897','28-Dec-2017/C409.jpg',17.0000,3,3,2,2,'AV21897','AV21897',0.0000,19.000,24.000,1,3,'2017-12-28 14:53:02',2,'2017-12-28 14:53:02',0,1,0),(95,'AV2203','AV2203','28-Dec-2017/AV2203a.jpg',32.0000,2,5,1,2,'AV2203','AV2203',0.0000,38.000,45.000,1,3,'2017-12-28 15:11:06',2,'2017-12-28 15:11:06',0,1,0),(96,'AVW1888','AVW1888','28-Dec-2017/1888-2.jpg',13.0000,2,4,1,2,'AVW1888','AVW1888',0.0000,15.000,18.000,1,3,'2017-12-28 23:39:41',2,'2017-12-28 23:39:41',0,1,0),(97,'AVW1889','AVW1889','28-Dec-2017/1889-1.jpg',11.0000,2,4,1,2,'AVW1889','AVW1889',0.0000,13.000,16.000,1,3,'2017-12-28 23:52:32',2,'2017-12-28 23:52:32',0,1,0),(98,'AV21908','AV21908','29-Dec-2017/dwrft.jpg',32.0000,2,5,1,2,'AV21908','AV21908',0.0000,38.000,45.000,1,3,'2017-12-28 23:58:02',2,'2017-12-29 12:16:57',2,1,0),(99,'AV21909','AV21909','29-Dec-2017/fdgegew.jpg',32.0000,2,5,1,2,'AV21909','AV21909',0.0000,38.000,45.000,1,3,'2017-12-29 00:00:13',2,'2017-12-29 12:15:21',2,1,0),(100,'AVW1890','AVW1890','29-Dec-2017/hjkkl;.jpg',11.0000,2,4,1,2,'AVW1890','AVW1890',0.0000,13.000,16.000,1,3,'2017-12-29 00:04:24',2,'2017-12-29 14:02:55',2,1,0),(101,'AVW1891','AVW1891','29-Dec-2017/1890.jpg',10.0000,2,7,1,2,'AVW1891','AVW1891',0.0000,12.000,15.000,1,3,'2017-12-29 00:15:08',2,'2017-12-29 00:15:08',0,1,0),(102,'AV1818','AV1818','03-Jan-2018/1818-1.jpg',25.0000,2,8,1,2,'AV1818','AV1818',0.0000,32.000,40.000,1,3,'2017-12-29 10:30:00',2,'2018-01-03 12:27:48',2,1,0),(103,'AV1722','AV1722','29-Dec-2017/FDGSG.jpg',33.0000,2,8,1,2,'AV1722','AV1722',0.0000,38.000,45.000,1,3,'2017-12-29 10:40:41',2,'2017-12-29 10:40:41',0,1,0),(104,'AV21938','AV21938','29-Dec-2017/AV21938.jpg',28.0000,3,1,2,2,'AV21938','AV21938',0.0000,30.000,38.000,1,3,'2017-12-29 12:08:29',2,'2017-12-29 12:08:29',0,1,0),(105,'AV21922','AV21922','29-Dec-2017/dwrqr.jpg',12.0000,3,3,2,2,'AV21922','AV21922',0.0000,14.000,18.000,1,3,'2017-12-29 12:09:38',2,'2017-12-29 12:09:38',0,1,0),(106,'AV21937','AV21937','29-Dec-2017/AV21937b.jpg',75.0000,2,6,1,2,'AV21937','AV21937',0.0000,80.000,90.000,1,3,'2017-12-29 12:12:00',2,'2017-12-29 12:12:00',0,1,0),(107,'AV1883','AV1883','29-Dec-2017/c.jpg',10.0000,2,7,1,2,'AV1883','AV1883',0.0000,12.000,18.000,1,3,'2017-12-29 12:35:39',2,'2017-12-29 12:35:39',0,1,0),(108,'AV2684','AV2684','29-Dec-2017/qw.jpg',26.0000,3,1,2,2,'AV2684','AV2684',0.0000,30.000,40.000,1,3,'2017-12-29 12:49:33',2,'2017-12-29 12:49:33',0,1,0),(109,'AV21905','AV21905','29-Dec-2017/AV21905.jpg',13.0000,3,3,2,2,'AV21905','AV21905',0.0000,16.000,22.000,1,3,'2017-12-29 13:00:59',2,'2017-12-29 13:00:59',0,1,0),(110,'AVW1869','AVW1869','29-Dec-2017/dfvc.jpg',22.0000,3,2,2,2,'AVW1869','AVW1869',0.0000,25.000,32.000,1,3,'2017-12-29 13:35:57',2,'2017-12-29 13:35:57',0,1,0),(111,'AV21906','AV21906','29-Dec-2017/gvh.jpg',10.0000,3,2,2,2,'AV21906','AV21906',0.0000,12.000,17.000,1,3,'2017-12-29 13:58:47',2,'2017-12-29 13:58:47',0,1,0),(112,'AV21907','AV21907','29-Dec-2017/bnhjkhl.jpg',10.0000,3,3,2,2,'AV21907','AV21907',0.0000,12.000,17.000,1,3,'2017-12-29 14:14:12',2,'2017-12-29 14:14:35',2,1,0),(113,'AV2204','AV2204','30-Dec-2017/AV2204.jpg',10.0000,2,0,1,2,'AV2204','AV2204',0.0000,16.000,18.000,1,3,'2017-12-30 01:12:30',2,'2017-12-30 01:12:30',0,1,0),(114,'AV2205','AV2205','30-Dec-2017/AV2205.jpg',10.0000,2,5,1,2,'AV2205','AV2205',0.0000,15.000,18.000,1,3,'2017-12-30 01:33:19',2,'2017-12-30 01:33:19',0,1,0),(115,'AVW1892','AVW1892',NULL,10.0000,3,2,2,2,'AVW1892','AVW1892',0.0000,15.000,18.000,1,3,'2017-12-30 01:34:46',2,'2017-12-30 01:34:46',0,1,0),(116,'AVW1892','AVW1892','30-Dec-2017/AVW1892.jpg',10.0000,3,2,2,2,'AVW1892','AVW1892',0.0000,15.000,18.000,1,3,'2017-12-30 01:38:21',2,'2017-12-30 01:38:21',0,1,0),(117,'AVW1893','AVW1893','30-Dec-2017/AVW1893.jpg',10.0000,3,2,2,2,'AVW1893','AVW1893',0.0000,15.000,18.000,1,3,'2017-12-30 01:39:24',2,'2017-12-30 01:39:24',0,1,0),(118,'AVW1894','AVW1894',NULL,10.0000,3,2,1,2,'AVW1894','AVW1894',0.0000,15.000,18.000,1,3,'2017-12-30 01:40:14',2,'2017-12-30 01:40:14',0,1,0),(119,'AVW1894','AVW1894',NULL,10.0000,3,2,1,2,'AVW1894','AVW1894',0.0000,15.000,18.000,1,3,'2017-12-30 01:40:22',2,'2017-12-30 01:40:22',0,1,0),(120,'AVW1894','AVW1894','30-Dec-2017/AVW1894.jpg',10.0000,3,2,1,2,'AVW1894','AVW1894',0.0000,15.000,18.000,1,3,'2017-12-30 01:41:13',2,'2017-12-30 01:41:13',0,1,0),(121,'AVW1895','AVW1895','30-Dec-2017/AVW1895.jpg',10.0000,3,2,2,2,'AVW1895','AVW1895',0.0000,15.000,18.000,1,3,'2017-12-30 01:41:54',2,'2017-12-30 01:41:54',0,1,0),(122,'AVW1896','AVW1896','30-Dec-2017/AVW1896.jpg',10.0000,3,2,2,2,'AVW1896','AVW1896',0.0000,15.000,18.000,1,3,'2017-12-30 01:42:44',2,'2017-12-30 01:42:44',0,1,0),(123,'D002','D002','02-Jan-2018/D02-1.jpg',25.0000,20,59,2,2,'D002','D002',0.0000,28.000,32.000,1,3,'2018-01-02 22:26:51',2,'2018-01-02 22:26:51',0,1,0),(124,'D001','D001','02-Jan-2018/D1.jpg',25.0000,20,59,2,2,'D001','D001',0.0000,28.000,32.000,1,3,'2018-01-02 22:29:11',2,'2018-01-02 22:29:11',0,1,0),(125,'D003','D003','02-Jan-2018/D03.jpg',28.0000,20,59,2,2,'D003','D003',0.0000,33.000,39.000,1,3,'2018-01-02 22:49:34',2,'2018-01-02 22:49:34',0,1,0),(126,'D004','D004','02-Jan-2018/D04.jpg',18.0000,20,59,2,2,'D004','D004',0.0000,20.000,25.000,1,3,'2018-01-02 22:56:54',2,'2018-01-02 22:56:54',0,1,0),(127,'D005','D005','02-Jan-2018/D05.jpg',20.0000,20,59,2,2,'D005','D005',0.0000,24.000,30.000,1,3,'2018-01-02 23:05:25',2,'2018-01-02 23:05:25',0,1,0),(128,'D006','D006','02-Jan-2018/D06.jpg',22.0000,20,59,2,2,'D006','D006',0.0000,24.000,30.000,1,3,'2018-01-02 23:14:14',2,'2018-01-02 23:14:14',0,1,0),(129,'D007','D007','02-Jan-2018/D07.jpg',15.0000,20,59,2,2,'D007','D007',0.0000,17.000,22.000,1,3,'2018-01-02 23:24:03',2,'2018-01-02 23:24:03',0,1,0),(130,'D008','D008','03-Jan-2018/D08.jpg',30.0000,20,59,2,2,'D008','D008',0.0000,33.000,42.000,1,3,'2018-01-03 09:16:11',2,'2018-01-03 09:16:11',0,1,0),(131,'D009','D009','03-Jan-2018/D09.jpg',28.0000,20,59,2,2,'D009','D009',0.0000,30.000,39.000,1,3,'2018-01-03 09:23:13',2,'2018-01-03 09:23:13',0,1,0),(132,'D010','D010','03-Jan-2018/D010-2.jpg',30.0000,20,59,2,2,'D010','D010',0.0000,33.000,45.000,1,3,'2018-01-03 09:33:46',2,'2018-01-03 09:33:46',0,1,0),(133,'D011','D011','03-Jan-2018/D011.jpg',25.0000,20,59,2,2,'D011','D011',0.0000,30.000,38.000,1,3,'2018-01-03 09:59:54',2,'2018-01-03 09:59:54',0,1,0),(134,'D012','D012','03-Jan-2018/D012.jpg',28.0000,20,59,2,2,'D012','D012',0.0000,30.000,38.000,1,3,'2018-01-03 10:01:36',2,'2018-01-03 10:01:36',0,1,0),(135,'D013','D013','03-Jan-2018/D013.jpg',32.0000,20,59,2,2,'D013','D013',0.0000,33.000,42.000,1,3,'2018-01-03 10:02:47',2,'2018-01-03 10:02:47',0,1,0),(136,'D014','D014','03-Jan-2018/D014.jpg',30.0000,20,59,2,2,'D014','D014',0.0000,31.000,39.000,1,3,'2018-01-03 10:07:06',2,'2018-01-03 10:07:06',0,1,0),(137,'D015','D015','03-Jan-2018/D015.jpg',38.0000,20,59,2,2,'D015','D015',0.0000,40.000,48.000,1,3,'2018-01-03 10:08:06',2,'2018-01-03 10:08:06',0,1,0),(138,'D016','D016','03-Jan-2018/D016.jpg',30.0000,20,59,2,2,'D016','D016',0.0000,32.000,42.000,1,3,'2018-01-03 10:57:33',2,'2018-01-03 10:57:33',0,1,0),(139,'D017','D017','03-Jan-2018/D017.jpg',38.0000,20,59,2,2,'D017','D017',0.0000,40.000,50.000,1,3,'2018-01-03 11:07:00',2,'2018-01-03 11:07:00',0,1,0),(140,'AV21921','AV21921','03-Jan-2018/1544152.jpg',12.0000,3,3,2,2,'AV21921','AV21921',0.0000,15.000,20.000,1,3,'2018-01-03 13:22:35',2,'2018-01-03 13:22:35',0,1,0),(141,'AV2681','AV2681','03-Jan-2018/AV2681a.jpg',25.0000,3,1,2,2,'AV2681','AV2681',0.0000,38.000,55.000,1,3,'2018-01-03 13:59:34',2,'2018-01-03 13:59:34',0,1,0),(142,'AV2212','AV2212','03-Jan-2018/AV2212.jpg',10.0000,3,3,2,2,'AV2212','AV2212',0.0000,14.000,16.000,1,3,'2018-01-03 14:58:59',2,'2018-01-03 14:58:59',0,1,0),(143,'AV901','AV901','03-Jan-2018/901.jpg',11.0000,2,4,1,2,'AV901','AV901',0.0000,15.000,17.000,1,3,'2018-01-03 15:25:51',2,'2018-01-03 15:25:51',0,1,0),(144,'AVW1877','AVW1877','03-Jan-2018/1877.jpg',8.0000,3,2,2,2,'AVW1877','AVW1877',0.0000,9.500,13.000,1,3,'2018-01-03 15:36:53',2,'2018-01-03 15:36:53',0,1,0),(145,'AVW1878','AVW1878','03-Jan-2018/1878.jpg',8.0000,3,2,2,2,'AVW1878','AVW1878',0.0000,9.500,13.000,1,3,'2018-01-03 15:42:56',2,'2018-01-03 15:42:56',0,1,0),(146,'AVW1876','AVW1876','03-Jan-2018/1876.jpg',8.0000,3,2,2,2,'AVW1876','AVW1876',0.0000,9.500,13.000,1,3,'2018-01-03 15:47:30',2,'2018-01-03 15:47:30',0,1,0),(147,'AV2201','AV2201','03-Jan-2018/2201.jpg',15.0000,2,5,1,2,'AV2201','AV2201',0.0000,18.000,22.000,1,3,'2018-01-03 15:58:50',2,'2018-01-03 15:58:50',0,1,0),(148,'AV2213','AV2213','03-Jan-2018/2213.jpg',18.0000,3,3,2,2,'AV2213','AV2213',0.0000,20.000,26.000,1,3,'2018-01-03 16:13:44',2,'2018-01-03 16:13:44',0,1,0),(149,'AV2211','AV2211','03-Jan-2018/AV2211.jpg',46.0000,3,1,2,2,'AV2211','AV2211',0.0000,52.000,62.000,1,3,'2018-01-03 16:26:25',2,'2018-01-03 16:26:25',0,1,0),(150,'AV2209','AV2209','03-Jan-2018/2209.jpg',18.0000,3,3,2,2,'AV2209','AV2209',0.0000,20.000,25.000,1,3,'2018-01-03 21:55:09',2,'2018-01-03 21:55:09',0,1,0),(151,'AV2210','AV2210','03-Jan-2018/2210.jpg',18.0000,3,3,2,2,'AV2210','AV2210',0.0000,20.000,25.000,1,3,'2018-01-03 21:56:33',2,'2018-01-03 21:56:33',0,1,0),(152,'AV2208','AV2208','03-Jan-2018/2208.jpg',18.0000,3,3,2,2,'AV2208','AV2208',0.0000,20.000,25.000,1,3,'2018-01-03 21:58:07',2,'2018-01-03 21:58:07',0,1,0),(153,'AV1804','AV1804','04-Jan-2018/1804.jpg',38.0000,2,8,1,2,'AV1804','AV1804',0.0000,40.000,50.000,1,3,'2018-01-04 22:47:43',2,'2018-01-04 22:47:43',0,1,0),(154,'AV21939','AV21939','04-Jan-2018/AV21939a.jpg',16.0000,3,3,2,2,'AV21939','AV21939',0.0000,19.000,26.000,1,3,'2018-01-04 22:51:52',2,'2018-01-04 22:51:52',0,1,0),(155,'AV169113','AV169113','04-Jan-2018/169113-1.jpg',60.0000,2,8,1,2,'AV169113','AV169113',0.0000,65.000,75.000,1,3,'2018-01-04 23:03:12',2,'2018-01-04 23:03:12',0,1,0),(156,'AV21936-60','AV21936-60','04-Jan-2018/AV21936-80and60.jpg',78.0000,3,1,2,2,'AV21936-60','AV21936-60',0.0000,83.000,98.000,1,3,'2018-01-04 23:09:33',2,'2018-01-04 23:09:33',0,1,0),(157,'AV21936-80','AV21936-80','04-Jan-2018/AV21936-80and60.jpg',100.0000,3,1,2,2,'AV21936-80','AV21936-80',0.0000,105.000,120.000,1,3,'2018-01-04 23:11:06',2,'2018-01-04 23:11:06',0,1,0),(158,'AV21935','AV21935','04-Jan-2018/AV21935.jpg',100.0000,3,1,2,2,'AV21935','AV21935',0.0000,105.000,125.000,1,3,'2018-01-04 23:14:37',2,'2018-01-04 23:14:37',0,1,0),(159,'AV21937','AV21937','04-Jan-2018/AV21937b.jpg',75.0000,2,6,1,2,'AV21937','AV21937',0.0000,78.000,90.000,1,3,'2018-01-04 23:17:52',2,'2018-01-04 23:18:57',0,1,1),(160,'AV21912','AV21912','04-Jan-2018/21912Recovered.jpg',75.0000,2,6,1,2,'AV21912','AV21912',0.0000,78.000,95.000,1,3,'2018-01-04 23:26:53',2,'2018-01-04 23:26:53',0,1,0),(161,'AV1896','AV1896','04-Jan-2018/1896.jpg',70.0000,2,6,1,2,'AV1896','AV1896',0.0000,75.000,88.000,1,3,'2018-01-04 23:45:17',2,'2018-01-04 23:45:17',0,1,0),(162,'AV2206','AV2206','05-Jan-2018/AV2206.jpg',15.0000,3,3,2,2,'AV2206','AV2206',0.0000,17.000,22.000,1,3,'2018-01-05 09:30:09',2,'2018-01-05 23:11:47',2,1,0),(163,'AV2207','AV2207','05-Jan-2018/AV2207.jpg',15.0000,3,3,2,2,'AV2207','AV2207',0.0000,17.000,22.000,1,3,'2018-01-05 09:31:14',2,'2018-01-05 12:03:58',2,1,0),(164,'AV21928','AV21928','05-Jan-2018/21928-1.jpg',10.0000,3,3,2,2,'AV21928','AV21928',0.0000,11.000,17.000,1,3,'2018-01-05 09:38:17',2,'2018-01-05 09:38:17',0,1,0),(165,'AV21919','AV21919','05-Jan-2018/AV21919.jpg',15.0000,3,0,2,2,'AV21919','AV21919',0.0000,17.000,22.000,1,3,'2018-01-05 11:43:17',2,'2018-01-05 11:43:17',0,1,0),(166,'AVW1874','AVW1874','05-Jan-2018/1874-1.jpg',25.0000,3,2,2,2,'AVW1874','AVW1874',0.0000,27.000,33.000,1,3,'2018-01-05 12:00:25',2,'2018-01-05 12:00:25',0,1,0),(167,'AV999','AV999','05-Jan-2018/AV999.jpg',10.0000,3,3,2,2,'AV999','AV999',0.0000,12.000,16.000,1,3,'2018-01-05 12:42:57',2,'2018-01-05 12:42:57',0,1,0),(168,'AV21918','AV21918','05-Jan-2018/AV21918-1.jpg',10.0000,3,3,2,2,'AV21918','AV21918',0.0000,14.000,17.000,1,3,'2018-01-05 14:15:17',2,'2018-01-05 14:15:17',0,1,0),(169,'AV21930','AV21930','05-Jan-2018/21930--1.jpg',48.0000,3,3,2,2,'AV21930','AV21930',0.0000,50.000,65.000,1,3,'2018-01-05 14:25:27',2,'2018-01-05 14:34:56',2,1,0),(170,'AV21931','AV21931','05-Jan-2018/21931.jpg',26.0000,3,3,2,2,'AV21931','AV21931',0.0000,28.000,36.000,1,3,'2018-01-05 14:46:06',2,'2018-01-05 15:02:33',2,1,0),(171,'AVW1880','AVW1880','05-Jan-2018/1880-1.jpg',18.0000,3,2,2,2,'AVW1880','AVW1880',0.0000,20.000,25.000,1,3,'2018-01-05 15:00:33',2,'2018-01-05 15:00:33',0,1,0),(172,'AVW1864','AVW1864','05-Jan-2018/1864-4.jpg',15.0000,3,2,2,2,'AVW1864','AVW1864',0.0000,17.000,22.000,1,3,'2018-01-05 22:58:12',2,'2018-01-05 22:58:12',0,1,0),(173,'AV1881','AV1881','05-Jan-2018/AV1881-2.jpg',17.0000,3,3,2,2,'AV1881','AV1881',0.0000,19.000,25.000,1,3,'2018-01-05 23:26:32',2,'2018-01-05 23:26:32',0,1,0),(174,'AVW1882','AVW1882','05-Jan-2018/AV1882-1.jpg',15.0000,3,2,2,2,'AVW1882','AVW1882',0.0000,17.000,22.000,1,3,'2018-01-05 23:33:55',2,'2018-01-05 23:33:55',0,1,0),(175,'AVW1862','AVW1862','05-Jan-2018/1862.jpg',13.0000,3,2,2,2,'AVW1862','AVW1862',0.0000,15.000,20.000,1,3,'2018-01-05 23:42:47',2,'2018-01-05 23:42:47',0,1,0),(176,'AVW1881','AVW1881','05-Jan-2018/AV1881-1.jpg',18.0000,3,2,2,2,'AVW1881','AVW1881',0.0000,20.000,25.000,1,3,'2018-01-05 23:45:22',2,'2018-01-05 23:45:22',0,1,0),(177,'AVW1863','AVW1863','05-Jan-2018/1863.jpg',11.0000,3,2,2,2,'AVW1863','AVW1863',0.0000,12.000,17.000,1,3,'2018-01-05 23:53:15',2,'2018-01-05 23:53:15',0,1,0),(178,'organic001','organic001','07-Jan-2018/1890.jpg',2.0000,8,39,1,2,'Organic','Organic',1.0000,4.000,3.000,1,2,'2018-01-07 18:30:34',2,'2018-01-07 18:30:34',0,1,0),(179,'AV1802-15','AV1802-15','25-Feb-2018/AV1802-15.jpg',70.0000,2,8,1,2,'AV1802-15','AV1802-15',0.0000,98.000,120.000,1,3,'2018-02-25 23:03:01',2,'2018-02-25 23:03:01',0,1,0),(180,'AVF001','AVF001','25-Feb-2018/AVF001a.jpg',95.0000,8,60,1,2,'AVF001','AVF001',0.0000,105.000,120.000,1,3,'2018-02-25 23:11:19',2,'2018-02-25 23:11:19',0,1,0),(181,'AV1820','AV1820','25-Feb-2018/AV1820.jpg',50.0000,2,8,1,2,'AV1820','AV1820',0.0000,68.000,75.000,1,3,'2018-02-25 23:16:33',2,'2018-02-25 23:16:33',0,1,0),(182,'AV1823','AV1823','25-Feb-2018/AV1823.jpg',35.0000,2,8,1,2,'AV1823','AV1823',0.0000,38.000,43.000,1,3,'2018-02-25 23:19:30',2,'2018-02-25 23:19:30',0,1,0),(183,'AV1824','AV1824','25-Feb-2018/Photo Dec 21, 8 22 47 PM.jpg',30.0000,2,8,1,2,'AV1824','AV1824',0.0000,35.000,40.000,1,3,'2018-02-25 23:24:01',2,'2018-02-25 23:24:01',0,1,0),(184,'AV1822','AV1822','25-Feb-2018/AV1822.jpg',25.0000,2,8,1,2,'AV1822','AV1822',0.0000,29.000,33.000,1,3,'2018-02-25 23:26:57',2,'2018-02-25 23:26:57',0,1,0),(185,'AV1825','AV1825','25-Feb-2018/AV1825.jpg',33.0000,2,8,1,2,'AV1825','AV1825',0.0000,38.000,45.000,1,3,'2018-02-25 23:32:14',2,'2018-02-25 23:32:14',0,1,0),(186,'AV1821','AV1821','25-Feb-2018/AV1821.jpg',25.0000,2,8,1,2,'AV1821','AV1821',0.0000,30.000,35.000,1,3,'2018-02-25 23:36:21',2,'2018-02-25 23:36:21',0,1,0),(187,'AV1826-T3','AV1826-T3','25-Feb-2018/AV1826-T3.jpg',12.0000,2,8,1,2,'AV1826-T3','AV1826-T3',0.0000,13.000,20.000,1,3,'2018-02-25 23:44:05',2,'2018-02-25 23:44:05',0,1,0),(188,'AV1827-T3','AV1827-T3','25-Feb-2018/AV1826-T3 .jpg',10.0000,2,8,1,2,'AV1827-T3','AV1827-T3',0.0000,13.000,20.000,1,3,'2018-02-25 23:50:17',2,'2018-02-25 23:50:17',0,1,0),(189,'AV1830-T3','AV1830-T3','25-Feb-2018/AV1830-T3.jpg',10.0000,2,8,1,2,'AV1830-T3','AV1830-T3',0.0000,13.000,20.000,1,3,'2018-02-25 23:55:23',2,'2018-02-25 23:55:23',0,1,0),(190,'AV1828','AV1828','25-Feb-2018/1828.jpg',25.0000,2,8,1,2,'AV1828','AV1828',0.0000,33.000,40.000,1,3,'2018-02-25 23:59:44',2,'2018-02-25 23:59:44',0,1,0),(191,'AV1829','AV1829','26-Feb-2018/AV1829.jpg',24.0000,2,8,1,2,'AV1829','AV1829',0.0000,28.000,33.000,1,3,'2018-02-26 00:05:21',2,'2018-02-26 00:05:21',0,1,0),(192,'AV1808','AV1808','26-Feb-2018/1808 .jpg',28.0000,2,8,1,2,'AV1808','AV1808',0.0000,36.000,40.000,1,3,'2018-02-26 00:13:30',2,'2018-02-26 00:13:30',0,1,0),(193,'AV1809','AV1809','26-Feb-2018/AV1809.jpg',20.0000,2,8,1,2,'AV1809','AV1809',0.0000,28.000,33.000,1,3,'2018-02-26 00:17:00',2,'2018-02-26 00:17:00',0,1,0),(194,'AV1811','AV1811','26-Feb-2018/AV1811.jpg',25.0000,2,8,1,2,'AV1811','AV1811',0.0000,38.000,45.000,1,3,'2018-02-26 00:22:01',2,'2018-02-26 00:22:01',0,1,0),(195,'AV1831-80','AV1831-80','26-Feb-2018/AV1831-80f.jpg',60.0000,2,8,1,2,'AV1831-80','AV1831-80',0.0000,85.000,92.000,1,3,'2018-02-26 00:36:59',2,'2018-02-26 00:36:59',0,1,0),(196,'AV1832-80','AV1832-80','26-Feb-2018/AV1832-80e.jpg',40.0000,2,8,1,2,'AV1832-80','AV1832-80',0.0000,55.000,65.000,1,3,'2018-02-26 00:41:11',2,'2018-02-26 00:41:11',0,1,0),(197,'AV1833-80','AV1833-80','26-Feb-2018/AV1833-80a.jpg',45.0000,2,8,1,2,'AV1833-80','AV1833-80',0.0000,55.000,65.000,1,3,'2018-02-26 00:44:19',2,'2018-02-26 00:44:19',0,1,0),(198,'AV1834-80','AV1834-80','26-Feb-2018/AV1834-80f.jpg',45.0000,2,8,1,2,'AV1834-80','AV1834-80',0.0000,55.000,65.000,1,3,'2018-02-26 00:48:16',2,'2018-02-26 00:48:16',0,1,0),(199,'AV1835','AV1835','26-Feb-2018/AV1835d.jpg',30.0000,2,8,1,2,'AV1835','AV1835',0.0000,43.000,48.000,1,3,'2018-02-26 00:53:23',2,'2018-02-26 00:53:23',0,1,0),(200,'AV1838','AV1838','27-Feb-2018/AV18358a.jpg',40.0000,2,8,1,2,'AV1838','AV1838',0.0000,58.000,65.000,1,3,'2018-02-27 09:03:24',2,'2018-02-27 09:03:24',0,1,0),(201,'AV1839','AV1839','27-Feb-2018/AV1839a.jpg',50.0000,2,8,1,2,'AV1839','AV1839',0.0000,65.000,98.000,1,3,'2018-02-27 09:36:30',2,'2018-02-27 09:36:30',0,1,0),(202,'AV1836','AV1836','27-Feb-2018/AV1836a.jpg',25.0000,2,8,1,2,'AV1836','AV1836',0.0000,35.000,42.000,1,3,'2018-02-27 23:50:09',2,'2018-02-27 23:50:09',0,1,0),(203,'AV1815-T8','AV1815-T8','06-Mar-2018/AV1815.jpg',45.0000,2,8,1,2,'AV1815-T8','AV1815-T8',0.0000,65.000,75.000,1,3,'2018-03-06 23:47:35',2,'2018-03-06 23:47:35',0,1,0),(204,'AV2216','AV2216','06-Mar-2018/AV2216a.jpg',60.0000,2,6,1,2,'AV2216','AV2216',0.0000,75.000,88.000,1,3,'2018-03-06 23:59:29',2,'2018-03-06 23:59:29',0,1,0),(205,'AV2214-12','AV2214-12','07-Mar-2018/AV2214.jpg',30.0000,2,5,1,2,'AV2214-12','AV2214-12',0.0000,38.000,45.000,1,3,'2018-03-07 00:02:08',2,'2018-03-07 00:02:08',0,1,0),(206,'AV2214-09','AV2214-09','07-Mar-2018/AV2214.jpg',25.0000,2,5,1,2,'AV2214-09','AV2214-09',0.0000,30.000,35.000,1,3,'2018-03-07 00:05:40',2,'2018-03-07 00:05:40',0,1,0),(207,'AV1840','AV1840','07-Mar-2018/AV1840a.jpg',40.0000,2,8,1,2,'AV1840','AV1840',0.0000,48.000,55.000,1,3,'2018-03-07 00:37:09',2,'2018-03-07 00:37:09',0,1,0),(208,'AV1841','AV1841','07-Mar-2018/AV1841.jpg',30.0000,2,8,1,2,'AV1841','AV1841',0.0000,45.000,55.000,1,3,'2018-03-07 10:32:07',2,'2018-03-07 10:32:07',0,1,0),(209,'AV2215','AV2215','12-Mar-2018/AV2215.jpg',40.0000,2,5,1,2,'AV2215','AV2215',0.0000,80.000,90.000,1,3,'2018-03-12 16:50:37',2,'2018-03-12 16:50:37',0,1,0),(210,'AVW6015','AVW6015','12-Mar-2018/AVW60151.jpg',10.0000,2,7,1,2,'AVW6015','AVW6015',0.0000,15.000,17.000,1,3,'2018-03-12 17:22:04',2,'2018-03-12 17:22:04',0,1,0),(211,'AVW8053','AVW8053','12-Mar-2018/AVW8053a.jpg',11.0000,2,7,1,2,'AVW8053','AVW8053',0.0000,15.000,18.000,1,3,'2018-03-12 17:43:41',2,'2018-03-12 17:43:41',0,1,0),(212,'AVW8062','AVW8062','12-Mar-2018/AVW8062a.jpg',10.0000,2,7,1,2,'AVW8062','AVW8062',0.0000,15.000,17.000,1,3,'2018-03-12 22:51:39',2,'2018-03-12 22:51:39',0,1,0),(213,'AVW1892','AVW1892','12-Mar-2018/AVW1892.jpg',10.0000,2,7,1,2,'AVW1892','AVW1892',0.0000,15.000,17.000,1,3,'2018-03-12 23:08:00',2,'2018-03-12 23:08:00',0,1,0),(214,'AVW1896','AVW1896','12-Mar-2018/AVW1896.jpg',10.0000,2,7,1,2,'AVW1896','AVW1896',0.0000,15.000,17.000,1,3,'2018-03-12 23:12:11',2,'2018-03-12 23:12:11',0,1,0),(215,'AVW1895','AVW1895','12-Mar-2018/AVW1895.jpg',10.0000,2,7,1,2,'AVW1895','AVW1895',0.0000,15.000,17.000,1,3,'2018-03-12 23:14:55',2,'2018-03-12 23:14:55',0,1,0),(216,'AVW1893','AVW1893','12-Mar-2018/AVW1893.jpg',10.0000,2,7,1,2,'AVW1893','AVW1893',0.0000,15.000,17.000,1,3,'2018-03-12 23:17:06',2,'2018-03-12 23:17:06',0,1,0),(217,'AVW1894','AVW1894','12-Mar-2018/AVW1894.jpg',10.0000,2,7,1,2,'AVW1894','AVW1894',0.0000,14.000,16.000,1,3,'2018-03-12 23:20:44',2,'2018-03-12 23:20:44',0,1,0),(218,'AVW901','AVW901','12-Mar-2018/901-2.jpg',10.0000,2,7,1,2,'AVW901','AVW901',0.0000,14.000,17.000,1,3,'2018-03-12 23:31:29',2,'2018-03-12 23:31:29',0,1,0),(219,'AVW1922','AVW1922','12-Mar-2018/AV1922.jpg',8.0000,2,7,1,2,'AVW1922','AVW1922',0.0000,11.000,13.000,1,3,'2018-03-12 23:46:23',2,'2018-03-12 23:46:23',0,1,0),(220,'AVW1861','AVW1861','13-Mar-2018/AVW1861.jpg',10.0000,2,7,1,2,'AVW1861','AVW1861',0.0000,14.000,17.000,1,3,'2018-03-13 00:04:47',2,'2018-03-13 00:04:47',0,1,0),(221,'AVW1862','AVW1862','13-Mar-2018/1862-2.jpg',10.0000,2,7,1,2,'AVW1862','AVW1862',0.0000,15.000,20.000,1,3,'2018-03-13 00:08:46',2,'2018-03-13 00:08:46',0,1,0),(222,'AVW1864','AVW1864','13-Mar-2018/1864-4.jpg',10.0000,2,7,1,2,'AVW1864','AVW1864',0.0000,15.000,20.000,1,3,'2018-03-13 00:17:25',2,'2018-03-13 00:17:25',0,1,0),(223,'AVW1866','AVW1866','13-Mar-2018/AVW1866.jpg',12.0000,2,7,1,2,'AVW1866','AVW1866',0.0000,17.000,20.000,1,3,'2018-03-13 00:24:54',2,'2018-03-13 00:24:54',0,1,0),(224,'AV2683','AV2683','13-Mar-2018/AV2683a.jpg',110.0000,2,6,1,2,'AV2683','AV2683',0.0000,145.000,170.000,1,3,'2018-03-13 11:22:15',2,'2018-03-13 11:22:15',0,1,0),(225,'AV2686','AV2686','23-Mar-2018/AV2686.jpg',100.0000,2,5,1,2,'AV2686','AV2686',0.0000,150.000,180.000,1,3,'2018-03-23 17:34:05',2,'2018-03-23 17:34:05',0,1,0),(226,'AV2687','AV2687','25-Mar-2018/AV2687.jpg',120.0000,2,6,1,2,'AV2687','AV2687',0.0000,160.000,188.000,1,3,'2018-03-25 00:05:29',2,'2018-03-25 00:05:29',0,1,0),(227,'AV2688','AV2688','25-Mar-2018/AV2688.jpg',90.0000,2,5,1,2,'AV2688','AV2688',0.0000,120.000,150.000,1,3,'2018-03-25 00:16:05',2,'2018-03-25 00:16:05',0,1,0),(228,'AV2684','AV2684','26-Mar-2018/AV2684d.jpg',120.0000,2,6,1,2,'AV2684','AV2684',0.0000,165.000,190.000,1,3,'2018-03-26 16:44:44',2,'2018-03-26 16:44:44',0,1,0),(229,'AV2685','AV2685','26-Mar-2018/AV2685d.jpg',100.0000,2,6,1,2,'AV2685','AV2685',0.0000,155.000,168.000,1,3,'2018-03-26 17:54:11',2,'2018-03-26 17:54:11',0,1,0),(230,'AV2689','AV2689','27-Mar-2018/AV 2689d.jpg',85.0000,2,5,1,2,'AV2689','AV2689',0.0000,110.000,120.000,1,3,'2018-03-27 16:14:12',2,'2018-03-27 16:14:12',0,1,0),(231,'D018','D018','27-Mar-2018/ITD018b.jpg',40.0000,20,59,1,2,'D018','D018',0.0000,55.000,65.000,1,3,'2018-03-27 17:19:48',2,'2018-03-27 17:19:48',0,1,0),(232,'AV1842','AV1842','01-Apr-2018/AV1842-12.jpg',70.0000,2,8,1,2,'AV1842','AV1842',0.0000,110.000,120.000,1,3,'2018-04-01 21:09:54',2,'2018-04-01 21:09:54',0,1,0),(233,'AV1843','AV1843','01-Apr-2018/AV1843a.jpg',70.0000,2,8,1,2,'AV1843','AV1843',0.0000,110.000,120.000,1,3,'2018-04-01 22:17:51',2,'2018-04-01 22:17:51',0,1,0),(234,'AV1844','AV1844','07-Apr-2018/AV1844d.jpg',80.0000,2,8,1,2,'AV1844','AV1844',0.0000,100.000,120.000,1,3,'2018-04-07 15:11:03',2,'2018-04-07 15:11:03',0,1,0),(235,'AV2691','AV2691','08-Apr-2018/AV2691.jpg',150.0000,2,5,1,2,'AV2691','AV2691',0.0000,180.000,220.000,1,3,'2018-04-08 13:15:13',2,'2018-04-08 13:15:13',0,1,0),(236,'AV2690-50','AV2690-50','08-Apr-2018/AV2690a.jpg',80.0000,2,5,1,2,'AV2690-50','AV2690-50',0.0000,100.000,120.000,1,3,'2018-04-08 14:28:46',2,'2018-04-08 14:28:46',0,1,0),(237,'AV2690-80','AV2690-80','08-Apr-2018/AV2690b.jpg',200.0000,2,5,1,2,'AV2690-80','AV2690-80',0.0000,230.000,260.000,1,3,'2018-04-08 14:32:08',2,'2018-04-08 14:32:08',0,1,0),(238,'AVW1869','AVW1869','08-Apr-2018/dfvc.jpg',25.0000,2,7,1,2,'AVW1869','AVW1869',0.0000,28.000,32.000,1,3,'2018-04-08 16:48:44',2,'2018-04-08 16:48:44',0,1,0),(239,'AVW1870','AVW1870','08-Apr-2018/AVW1870.jpg',14.0000,2,7,1,2,'AVW1870','AVW1870',0.0000,15.000,17.000,1,3,'2018-04-08 16:52:06',2,'2018-04-08 16:52:06',0,1,0),(240,'AVW1874','AVW1874','09-Apr-2018/1874-1.jpg',25.0000,2,7,1,2,'AVW1874','AVW1874',0.0000,30.000,33.000,1,3,'2018-04-09 14:38:08',2,'2018-04-09 14:38:08',0,1,0),(241,'AVW1875','AVW1875','09-Apr-2018/AVW1875.jpg',15.0000,2,7,1,2,'AVW1875','AVW1875',0.0000,16.000,18.000,1,3,'2018-04-09 14:41:12',2,'2018-04-09 14:41:12',0,1,0),(242,'AVW1876','AVW1876','09-Apr-2018/1876.jpg',8.0000,2,7,1,2,'AVW1876','AVW1876',0.0000,10.000,13.000,1,3,'2018-04-09 16:30:29',2,'2018-04-09 16:30:29',0,1,0),(243,'AVW1877','AVW1877','09-Apr-2018/1877.jpg',8.0000,2,7,1,2,'AVW1877','AVW1877',0.0000,10.000,13.000,1,3,'2018-04-09 16:34:45',2,'2018-04-09 16:34:45',0,1,0),(244,'AVW1878','AVW1878','09-Apr-2018/1878.jpg',8.0000,2,7,1,2,'AVW1878','AVW1878',0.0000,10.000,13.000,1,3,'2018-04-09 16:38:36',2,'2018-04-09 16:38:36',0,1,0),(245,'AVW1879','AVW1879','09-Apr-2018/AVW1879.jpg',10.0000,2,7,1,2,'AVW1879','AVW1879',0.0000,15.000,18.000,1,3,'2018-04-09 16:42:55',2,'2018-04-09 16:42:55',0,1,0),(246,'AVW1880','AVW1880','09-Apr-2018/1880-4.jpg',15.0000,2,7,1,2,'AVW1880','AVW1880',0.0000,20.000,25.000,1,3,'2018-04-09 16:47:10',2,'2018-04-09 16:47:10',0,1,0),(247,'AVW1881','AVW1881','09-Apr-2018/AV1881-1.jpg',15.0000,2,7,1,2,'AVW1881','AVW1881',0.0000,20.000,25.000,1,3,'2018-04-09 16:53:43',2,'2018-04-09 16:53:43',0,1,0),(248,'AVW1882','AVW1882','09-Apr-2018/AV1882.jpg',15.0000,2,7,1,2,'AVW1882','AVW1882',0.0000,18.000,22.000,1,3,'2018-04-09 17:00:31',2,'2018-04-09 17:00:31',0,1,0),(249,'AVW1883','AVW1883','09-Apr-2018/c.jpg',10.0000,2,7,1,2,'AVW1883','AVW1883',0.0000,13.000,18.000,1,3,'2018-04-09 17:06:52',2,'2018-04-09 17:06:52',0,1,0),(250,'AVW1884','AVW1884','09-Apr-2018/AVW1884.jpg',10.0000,2,7,1,2,'AVW1884','AVW1884',0.0000,13.000,18.000,1,3,'2018-04-09 17:08:58',2,'2018-04-09 17:08:58',0,1,0),(251,'AVW1885','AVW1885','09-Apr-2018/AVW1885.jpg',8.0000,2,7,1,2,'AVW1885','AVW1885',0.0000,12.000,15.000,1,3,'2018-04-09 17:11:46',2,'2018-04-09 17:11:46',0,1,0),(252,'AVW1886','AVW1886','09-Apr-2018/AVW1886A.jpg',9.0000,2,7,1,2,'AVW1886','AVW1886',0.0000,13.000,18.000,1,3,'2018-04-09 17:18:47',2,'2018-04-09 17:18:47',0,1,0),(253,'AVW1888','AVW1888','09-Apr-2018/1888-1.jpg',10.0000,2,7,1,2,'AVW1888','AVW1888',0.0000,13.000,18.000,1,3,'2018-04-09 17:22:25',2,'2018-04-09 17:22:25',0,1,0),(254,'AV1845','AV1845','30-Apr-2018/AV1845a.jpg',60.0000,2,8,1,2,'AV1845','AV1845',0.0000,80.000,92.000,1,3,'2018-04-30 13:42:47',2,'2018-04-30 13:42:47',0,1,0),(255,'AV1846','AV1846','30-Apr-2018/AV1846a.jpg',65.0000,2,8,1,2,'AV1846','AV1846',0.0000,80.000,92.000,1,3,'2018-04-30 14:11:26',2,'2018-04-30 14:11:26',0,1,0),(256,'AV1847','AV1847','30-Apr-2018/AV1847a.jpg',70.0000,2,8,1,2,'AV1847','AV1847',0.0000,90.000,110.000,1,3,'2018-04-30 15:55:19',2,'2018-04-30 15:55:19',0,1,0),(257,'AV1848','AV1848','30-Apr-2018/AV1848.jpg',90.0000,2,0,1,2,'AV1848','AV1848',90.0000,110.000,130.000,1,3,'2018-04-30 18:51:29',2,'2018-04-30 18:51:29',0,1,0),(258,'AV1849','AV1849','30-Apr-2018/AV1849e.jpg',22.0000,2,8,1,2,'AV1849','AV1849',0.0000,30.000,40.000,1,2,'2018-04-30 19:32:26',2,'2018-04-30 19:32:26',0,1,0),(259,'AVW1899','AVW1899','30-Apr-2018/AVW1899.jpg',12.0000,2,0,1,2,'AVW1899','AVW1899',0.0000,16.000,20.000,1,3,'2018-04-30 22:38:51',2,'2018-04-30 22:38:51',0,1,0),(260,'AV2693','AV2693','05-May-2018/AV2693c.jpg',10.0000,2,5,1,2,'AV2693','AV2693',0.0000,12.000,15.000,1,3,'2018-05-05 14:49:56',2,'2019-03-02 14:31:51',2,1,0),(261,'0022','0022','02-Mar-2019/original_photo.jpg',10.0000,2,4,1,1,'test','test',2.0000,2.000,5.000,NULL,3,'2019-03-02 15:03:43',2,'2019-03-02 15:04:40',2,1,1);

/*Table structure for table `tbl_item_base_branch` */

DROP TABLE IF EXISTS `tbl_item_base_branch`;

CREATE TABLE `tbl_item_base_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `due_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_base_branch` */

insert  into `tbl_item_base_branch`(`id`,`branch_id`,`item_category_id`,`item_id`,`is_delete`,`due_date`,`created_at`,`updated_at`) values (9,1,2,14,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(10,1,2,260,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(11,1,2,258,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(12,1,2,257,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(13,1,2,256,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(14,1,2,255,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(15,1,2,254,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(16,1,2,250,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(17,1,2,249,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(18,1,2,248,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(19,1,2,247,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(20,1,2,246,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(21,1,2,245,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(22,1,2,244,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(23,1,2,259,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(24,1,2,253,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(25,1,2,252,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(26,1,2,251,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(27,1,2,243,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(28,1,2,242,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(29,1,2,241,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(30,1,2,240,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(31,1,2,239,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(32,1,2,238,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(33,1,2,237,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(34,1,2,236,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(35,1,2,235,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(36,1,2,234,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(37,1,2,233,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(38,1,2,232,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(39,1,2,231,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(40,1,2,230,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(41,1,2,229,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(42,1,2,228,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(43,1,2,227,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(44,1,2,226,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(45,1,2,225,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(46,1,2,224,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(47,1,2,223,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(48,1,2,222,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(49,1,2,221,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(50,1,2,220,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(51,1,2,219,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(52,1,2,218,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(53,1,2,217,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(54,1,2,216,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(55,1,2,215,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(56,1,2,214,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(57,1,2,213,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(58,1,2,212,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(59,1,2,211,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(60,1,2,210,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(61,1,2,209,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(62,1,2,208,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(63,1,2,207,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(64,1,2,206,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(65,1,2,205,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(66,1,2,204,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(67,1,2,203,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(68,1,2,202,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(69,1,2,201,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(70,1,2,200,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(71,1,2,199,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(72,1,2,198,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(73,1,2,197,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(74,1,2,196,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(75,1,2,195,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(76,1,2,194,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(77,1,2,193,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(78,1,2,192,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(79,1,2,191,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(80,1,2,190,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(81,1,2,189,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(82,1,2,188,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(83,1,2,187,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(84,1,2,186,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(85,1,2,185,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(86,1,2,184,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(87,1,2,183,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(88,1,2,182,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(89,1,2,181,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(90,1,2,180,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(91,1,2,179,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(92,1,2,178,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(93,1,2,177,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(94,1,2,176,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(95,1,2,175,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(96,1,2,174,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(97,1,2,173,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(98,1,2,172,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(99,1,2,171,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(100,1,2,170,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(101,1,2,169,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(102,1,2,168,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(103,1,2,167,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(104,1,2,166,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(105,1,2,165,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(106,1,2,164,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(107,1,2,163,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(108,1,2,162,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(109,1,2,161,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(110,1,2,160,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(111,1,2,158,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(112,1,2,157,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(113,1,2,156,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(114,1,2,155,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(115,1,2,154,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(116,1,2,153,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(117,1,2,152,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(118,1,2,151,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(119,1,2,150,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(120,1,2,149,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(121,1,2,148,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(122,1,2,147,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(123,1,2,146,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(124,1,2,145,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(125,1,2,144,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(126,1,2,143,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(127,1,2,142,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(128,1,2,141,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(129,1,2,140,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(130,1,2,139,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(131,1,2,138,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(132,1,2,137,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(133,1,2,136,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(134,1,2,135,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(135,1,2,134,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(136,1,2,133,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(137,1,2,132,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56'),(138,1,2,131,0,NULL,'2019-03-02 15:05:56','2019-03-02 15:05:56');

/*Table structure for table `tbl_item_base_location` */

DROP TABLE IF EXISTS `tbl_item_base_location`;

CREATE TABLE `tbl_item_base_location` (
  `branch_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`location_id`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_base_location` */

/*Table structure for table `tbl_item_base_vendor` */

DROP TABLE IF EXISTS `tbl_item_base_vendor`;

CREATE TABLE `tbl_item_base_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_base_vendor` */

/*Table structure for table `tbl_item_base_vendor_price` */

DROP TABLE IF EXISTS `tbl_item_base_vendor_price`;

CREATE TABLE `tbl_item_base_vendor_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_base_vendor_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_base_vendor_price` */

/*Table structure for table `tbl_item_category` */

DROP TABLE IF EXISTS `tbl_item_category`;

CREATE TABLE `tbl_item_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_category_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(2) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_category` */

insert  into `tbl_item_category`(`id`,`image`,`item_category_name`,`branch_id`,`is_delete`) values (2,'08-Nov-2017/HT1FSJlFLXbXXagOFbXa.jpg','ចង្កៀង lamp Modern',1,0),(3,'08-Nov-2017/lg-display-oled-classic.jpg','ចង្កៀង lamp classic',1,0),(4,'08-Nov-2017/images (1).jpg','ការ៉ូ Tile',1,0),(5,'08-Nov-2017/images (2).jpg','ក្បឿង Roof Tile',1,0),(6,'08-Nov-2017/images.jpg','អំពូល​ Bulb',1,0),(7,'08-Nov-2017/Coffee+Table.jpg','តុTable',1,0),(8,'08-Nov-2017/32W-220V-White-Ventilation-Extractor-Exhaust-Fan-Blower-Window-Wall-Kitchen-Bathroom-Toilet.jpeg_220x220.jpeg','កង្ហា Fan',1,0),(9,'01-Nov-2017/p2.jpg','របស់ផ្សេងៗ',1,1),(14,'08-Nov-2017/Electrical_Socket_Universal_2Pin_Dual[1].jpg','កង្តាក់ ',1,0),(15,'08-Nov-2017/Bathroom-Tools-and-Accessories.jpg','សំភារៈបន្ទប់ទឹក accessary',1,0),(16,NULL,'សំភារៈបន្ទប់ទឹក accessary ',1,1),(17,'09-Nov-2017/t30-e27-edison-led-bulb-5w-long-strip-vintage.jpg','light component ',1,0),(18,'09-Nov-2017/LED_Rope_Light_Line.jpg','ខ្សែ LED',1,0),(19,'14-Nov-2017/41s6n5DJaXL.01_SL500_.jpg','Light',1,0),(20,'02-Jan-2018/d02-2.jpg','Decor',1,0);

/*Table structure for table `tbl_item_conversion` */

DROP TABLE IF EXISTS `tbl_item_conversion`;

CREATE TABLE `tbl_item_conversion` (
  `item_id` int(11) DEFAULT NULL,
  `unit1` int(11) DEFAULT NULL,
  `unit2` int(11) DEFAULT NULL,
  `qty1` float DEFAULT NULL,
  `qty2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_conversion` */

insert  into `tbl_item_conversion`(`item_id`,`unit1`,`unit2`,`qty1`,`qty2`) values (14,5,3,1,15),(1,5,3,1,24),(17,3,3,1,1),(18,3,3,1,1),(19,3,3,1,1),(29,6,3,10,1),(39,3,5,1,1),(44,6,5,15,1),(45,6,3,10,1),(46,6,3,10,1),(47,6,3,10,1),(48,6,3,10,1),(50,3,5,1,1),(52,6,5,10,1),(56,3,5,1,1),(55,3,5,1,1),(54,3,5,1,1),(53,3,5,1,1),(49,3,5,10,1),(42,3,5,1,1),(30,3,5,12,1),(26,3,3,1,0),(23,3,5,1,1),(21,3,5,1,1),(20,3,5,1,1),(57,3,5,1,1),(58,3,5,1,1),(59,3,5,1,1),(60,3,5,1,1),(40,3,5,1,1),(61,3,5,1,1),(62,3,5,1,1),(63,3,5,1,1),(43,3,5,1,1),(65,3,5,1,1),(69,2,2,0,0),(83,2,5,1,1),(84,2,5,1,1),(85,3,5,1,1),(89,3,5,1,1),(90,3,5,1,1),(91,3,5,1,1),(92,3,5,1,1),(93,3,5,1,1),(94,3,5,1,1),(88,3,5,1,1),(87,3,5,1,1),(86,3,5,1,1),(95,3,5,1,1),(96,3,5,1,1),(97,3,5,1,1),(101,3,5,1,1),(103,3,5,1,1),(104,3,5,1,1),(105,3,5,1,1),(106,3,5,1,1),(99,3,5,1,1),(98,3,5,1,1),(51,3,5,1,1),(107,3,5,1,1),(108,3,5,1,1),(109,3,5,1,1),(110,3,5,1,1),(111,3,5,1,1),(100,3,5,1,1),(112,3,5,1,1),(123,3,5,1,1),(124,3,5,1,1),(125,3,5,1,1),(126,3,5,1,1),(127,3,5,1,1),(128,3,5,1,1),(129,3,5,1,1),(130,3,5,1,1),(131,3,5,1,1),(132,3,5,1,1),(133,3,5,1,1),(134,3,5,1,1),(135,3,5,1,1),(136,3,5,1,1),(137,3,5,1,1),(138,3,5,1,1),(139,3,5,1,1),(102,3,5,1,1),(140,3,5,1,1),(141,3,5,1,1),(142,3,5,1,1),(143,3,5,1,1),(144,3,5,1,1),(145,3,5,1,1),(146,3,5,1,1),(147,3,5,1,1),(148,3,5,1,1),(149,3,5,1,1),(150,3,5,1,1),(151,3,5,1,1),(152,3,5,1,1),(153,3,5,1,1),(154,3,5,1,1),(155,3,5,1,1),(156,3,5,1,1),(157,3,5,1,1),(158,3,5,1,1),(159,3,5,1,1),(160,3,5,1,1),(161,3,5,1,1),(164,3,5,1,1),(165,3,5,1,1),(166,3,5,1,1),(167,3,5,1,1),(168,3,5,1,1),(169,3,5,1,1),(171,3,5,1,1),(170,3,5,1,1),(172,3,5,1,1),(162,3,5,1,1),(163,3,5,1,1),(173,3,5,1,1),(174,3,5,1,1),(175,3,5,1,1),(176,3,5,1,1),(177,3,5,1,1),(178,2,3,12,1),(33,3,5,1,1),(261,4,3,1,22);

/*Table structure for table `tbl_item_gallary` */

DROP TABLE IF EXISTS `tbl_item_gallary`;

CREATE TABLE `tbl_item_gallary` (
  `item_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_gallary` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_gallary` */

/*Table structure for table `tbl_item_menu` */

DROP TABLE IF EXISTS `tbl_item_menu`;

CREATE TABLE `tbl_item_menu` (
  `item_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_menu_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(3) DEFAULT NULL,
  `sub_category_id` int(5) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `menu_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_sub_recipe` int(5) DEFAULT NULL,
  `is_salable` int(5) DEFAULT NULL,
  `is_active` int(5) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `costing_method_id` int(5) DEFAULT NULL,
  `cose` float DEFAULT NULL,
  PRIMARY KEY (`item_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_menu` */

/*Table structure for table `tbl_item_related` */

DROP TABLE IF EXISTS `tbl_item_related`;

CREATE TABLE `tbl_item_related` (
  `item_id` int(11) DEFAULT NULL,
  `item_related_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_related` */

/*Table structure for table `tbl_item_sell_price` */

DROP TABLE IF EXISTS `tbl_item_sell_price`;

CREATE TABLE `tbl_item_sell_price` (
  `item_sell_price_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `price_date` datetime DEFAULT NULL,
  `whole_sell_unit` int(11) DEFAULT NULL,
  `whole_sell_price` float DEFAULT NULL,
  `retail_unit` int(11) DEFAULT NULL,
  `retail_price` float DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL,
  `old_purchase_price` float DEFAULT NULL,
  `old_purchase_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_sell_price_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_sell_price` */

/*Table structure for table `tbl_item_size` */

DROP TABLE IF EXISTS `tbl_item_size`;

CREATE TABLE `tbl_item_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbr` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_size` */

insert  into `tbl_item_size`(`id`,`abbr`,`size_name`,`description`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,'S','Small',NULL,0,1,2,2,'2017-11-05 20:56:18','2019-01-05 11:37:57'),(3,'L','Large',NULL,0,1,2,2,'2019-01-05 11:38:10','2019-01-05 11:38:14'),(4,'M','Medium',NULL,0,1,2,NULL,'2019-01-05 11:38:22','2019-01-05 11:38:22'),(5,NULL,'Extra Large',NULL,0,1,2,NULL,'2019-02-28 22:41:00','2019-02-28 22:41:00');

/*Table structure for table `tbl_item_status` */

DROP TABLE IF EXISTS `tbl_item_status`;

CREATE TABLE `tbl_item_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_status` */

insert  into `tbl_item_status`(`id`,`name`,`description`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Instock','',0,1,2,2,'2016-10-23 14:07:44','2017-11-14 09:50:54'),(2,'Out of stock','',0,1,2,2,'2017-11-14 09:51:08','2017-11-14 09:51:46'),(3,'2 or 3 day instock','',0,1,2,2,'2017-11-14 09:51:25','2017-11-14 09:51:57');

/*Table structure for table `tbl_item_sub_category` */

DROP TABLE IF EXISTS `tbl_item_sub_category`;

CREATE TABLE `tbl_item_sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_kitchens_id` int(11) NOT NULL DEFAULT '1',
  `image` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(4) DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_sub_category` */

insert  into `tbl_item_sub_category`(`id`,`pos_kitchens_id`,`image`,`branch_id`,`item_category_id`,`name`,`is_delete`) values (1,1,'04-Nov-2017/p2.jpg',1,3,'អំពូលព្យួរធំ',0),(2,1,'08-Nov-2017/il_340x270.1031446176_80b2.jpg',1,3,'អំពូលចាប់ជញ្ជាំង',0),(3,1,'08-Nov-2017/HTB1FhkfHFXXXXaqaXXXq6xXFXXX3.jpg',1,3,'អំពូលព្យួរ',0),(4,1,'08-Nov-2017/11380216667811p.jpg',1,2,'អំពូល​outdoor',0),(5,1,'08-Nov-2017/5052931672868_04i.jpg',1,2,'អំពូលព្យួរ',0),(6,1,'08-Nov-2017/715roEGx-QL._SX342_.jpg',1,2,'អំពូលព្យួរធំ',0),(7,1,'08-Nov-2017/Bedside-Wall-mounted-Sconce-Lights-for-Corridor-Bedrooms-Creative-wall-lamp-Lights-With-lamp-shade-simple.jp',1,2,'អំពូលរាត្រី',0),(8,1,'08-Nov-2017/mUG5dJn49DQwkuBV_5QKNjA.jpg',1,2,'អំពូលពិដាន',0),(9,1,NULL,1,4,'30x30',1),(10,1,'08-Nov-2017/Garden-Floor-Tiles-Indian-Ceramic-Tiles-Cheapest.jpg',1,4,'30x30',0),(11,1,'08-Nov-2017/UT82sdBXwxaXXagOFbXe.jpg',1,4,'25x40',0),(12,1,'08-Nov-2017/digital-wall-tiles-30x60-584301.jpg',1,4,'30x60',0),(13,1,'08-Nov-2017/johnson_perola_silver_60_x_60_cm_glazed_vitrified_tile_beige_hrj2461562__11574513_0.jpg',1,4,'60x60',0),(14,1,'08-Nov-2017/HTB1ongpGXXXXXcaXFXXq6xXFXXXz.jpg',1,4,'80x80',0),(15,1,'08-Nov-2017/41s6n5DJaXL.01_SL500_.jpg',1,6,'អំពូលដេគ័រ',0),(16,1,'08-Nov-2017/small_EDISON_LED_BULB._1024x1024.jpg',1,6,'អំពូលដេគ័រ G65',1),(17,1,'08-Nov-2017/48C813CCC683999CCD80D2CBC7CFC7D2C7C985739ED29A9A46C7D263C943639E9C9E464306CACDCF9BA01343.jpg',1,6,'អំពូលដេគ័រ G125 4w',1),(18,1,'08-Nov-2017/t30-e27-edison-led-bulb-5w-long-strip-vintage.jpg',1,6,'អំពូលដេគ័រ G125 7w',1),(19,1,'08-Nov-2017/High-Quality-vintage-A19-Fireworks-LED-edison-light-bulb-flower-led-lamp-decor-your-home-warm.jpg_640x640.jp',1,6,'អំពូលដេគ័រ គ្រីស្តារ',1),(20,1,NULL,1,6,'អំពូលពងមាន់ #2',1),(21,1,'08-Nov-2017/LED-Bulbs-Wickes-LED-Gls-Frosted-Light-Bulb-9-2W-E27-T3274_141658_00.jpg',1,6,'អំពូលពងមាន់ #1',1),(22,1,'08-Nov-2017/LED-Spiral-Energy-Saving-Bulb-7W-12W-20W-E27-Base-AC-110V-220V-240V-2835-SMD.jpg',1,6,'អំពូលអង្រ្កាញ់ #1',1),(23,1,'08-Nov-2017/d0511778f881017c8b427d47307a6d93.jpg',1,6,'អំពូលអង្រ្កាញ់ #២',1),(24,1,'08-Nov-2017/images (4).jpg',1,6,'អំពូលម្ទេស E14',1),(25,1,'08-Nov-2017/images (4).jpg',1,6,'អំពូលម្ទេស E27',1),(26,1,'08-Nov-2017/kodak-led-light-bulbs-41116-ul-64_400_compressed.jpg',1,6,'អំពូលទៀន E14',1),(27,1,'08-Nov-2017/kodak-led-light-bulbs-41116-ul-64_400_compressed.jpg',1,6,'អំពូលទៀន E27',1),(28,1,'08-Nov-2017/images (4).jpg',1,6,'អំពូលម្ទេស E27 vomit',1),(29,1,'08-Nov-2017/led-chandelier-bulb-led-chandelier-bulb-suppliers-and.jpg',1,6,'អំពូលទៀន E14',1),(30,1,NULL,1,5,'ក្បឿងស្រកាលិយ',0),(31,1,'09-Nov-2017/LED-Bulbs-Wickes-LED-Gls-Frosted-Light-Bulb-9-2W-E27-T3274_141658_00.jpg',1,6,'អំពូលE27',0),(32,1,'09-Nov-2017/d0511778f881017c8b427d47307a6d93.jpg',1,6,'អំពូលU',0),(33,1,'09-Nov-2017/Electrical_Socket_Universal_2Pin_Dual[1].jpg',1,14,'saimon',0),(34,1,NULL,1,17,'ខ្សែភ្លើង',0),(35,1,'09-Nov-2017/Electrical_Socket_Universal_2Pin_Dual[1].jpg',1,14,'simon',0),(36,1,'09-Nov-2017/Electrical_Socket_Universal_2Pin_Dual[1].jpg',1,14,'BRT',0),(37,1,'09-Nov-2017/Electrical_Socket_Universal_2Pin_Dual[1].jpg',1,14,'Langhe',0),(38,1,'09-Nov-2017/Electrical_Socket_Universal_2Pin_Dual[1].jpg',1,14,'ផ្សេងៗ',0),(39,1,'09-Nov-2017/32W-220V-White-Ventilation-Extractor-Exhaust-Fan-Blower-Window-Wall-Kitchen-Bathroom-Toilet.jpeg_220x220.jpe',1,8,'កង្ហាបឺតពិដាន',0),(40,1,NULL,1,8,'កង្ហាបឺតចាប់ជញ្ជាំង',0),(41,1,'09-Nov-2017/polished-chrome-kingston-brass-drains-drain-assemblies-hevw6001-64_400_compressed.jpg',1,15,'ឆ្នុក',0),(42,1,'09-Nov-2017/49835A_large.jpg',1,15,'ខ្សែអនាម័យ',0),(43,1,'09-Nov-2017/51uwbyRgXCL._SX522_.jpg',1,15,'ផ្កាឈូក',0),(44,1,'09-Nov-2017/large.JPG',1,15,'បង្គន់',0),(45,1,'09-Nov-2017/HTB1vwW_HXXXXXX8aXXXq6xXFXXXY.jpg',1,15,'labo',0),(46,1,'09-Nov-2017/HTB1vwW_HXXXXXX8aXXXq6xXFXXXY.jpg',1,15,'labo',0),(47,1,'09-Nov-2017/download.jpg',1,15,'sink',0),(48,1,'09-Nov-2017/Doyours-Combo-Of-Bathroom-Accessories-SDL287945619-1-039e4.jpg',1,15,'ថ្នើរ',0),(49,1,NULL,1,15,'ស៊ីហ្វង់',0),(50,1,'09-Nov-2017/dh-3ms1.jpg',1,15,'ម៉ាស៊ីនទឹកក្តៅ',0),(51,1,'09-Nov-2017/41Yv8y7DAeL._SL500_AC_SS350_.jpg',1,19,'Flash light',0),(52,1,'09-Nov-2017/12-led-pir-motion-sensor-6v-6w-solar-panel.jpg',1,19,'sola',0),(53,1,'09-Nov-2017/HH_LA8001_M2.jpg',1,6,'អំពូលមែត',0),(54,1,'09-Nov-2017/download (1).jpg',1,19,'LED ពីដានបង្កប់',0),(55,1,'09-Nov-2017/images (6).jpg',1,17,'ដុយ',0),(56,1,'09-Nov-2017/A_dia_plug_l.jpg',1,17,'ដុយ',0),(57,1,'14-Nov-2017/kodak-led-light-bulbs-41116-ul-64_400_compressed.jpg',1,6,'E14',0),(58,1,'21-Nov-2017/3599186482_178148046.jpg',1,2,'អំពូលពិដាន',1),(59,1,'02-Jan-2018/D02-1.jpg',1,20,'Thing',0),(60,1,NULL,1,8,'កង្ហាពិដាន ',0);

/*Table structure for table `tbl_item_type` */

DROP TABLE IF EXISTS `tbl_item_type`;

CREATE TABLE `tbl_item_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_type` */

insert  into `tbl_item_type`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Modern',0,1,2,2,'2016-10-23 13:59:21','2017-11-14 09:52:22'),(2,'Classic',0,1,2,2,'2017-11-14 09:54:59','2017-11-14 09:55:47'),(3,'Typ1',1,1,2,NULL,'2019-02-28 22:40:34','2019-02-28 22:40:37');

/*Table structure for table `tbl_language` */

DROP TABLE IF EXISTS `tbl_language`;

CREATE TABLE `tbl_language` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `order_level` int(2) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(2) DEFAULT NULL,
  `updated_by` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_language` */

insert  into `tbl_language`(`id`,`name`,`code`,`image`,`order_level`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,'English','en','en.png',1,0,1,NULL,NULL,NULL,'2016-10-15 16:00:36');

/*Table structure for table `tbl_location` */

DROP TABLE IF EXISTS `tbl_location`;

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_location` */

insert  into `tbl_location`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Phnom Penh',0,1,2,NULL,'2019-02-28 13:05:39','2019-02-28 13:05:39');

/*Table structure for table `tbl_location_base_branch` */

DROP TABLE IF EXISTS `tbl_location_base_branch`;

CREATE TABLE `tbl_location_base_branch` (
  `branch_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_location_base_branch` */

/*Table structure for table `tbl_lookup` */

DROP TABLE IF EXISTS `tbl_lookup`;

CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_lookup` */

insert  into `tbl_lookup`(`id`,`group`,`name`,`description`) values (1,'1','Transfer In','Transfer In'),(2,'1','Transfer Out','Transfer Out'),(3,'3','Unpaid',NULL),(4,'3','Paid',NULL),(5,'3','Checkin','Customer Checkin Product'),(6,'3','Customer Ordering','This status show about customer is ordering not yet checkout');

/*Table structure for table `tbl_lookup_group` */

DROP TABLE IF EXISTS `tbl_lookup_group`;

CREATE TABLE `tbl_lookup_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_lookup_group` */

insert  into `tbl_lookup_group`(`id`,`name`) values (1,'Stock Type'),(2,'Sale Status'),(3,'Order Status');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fa_icon` varchar(20) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_type_id` int(11) NOT NULL DEFAULT '0',
  `menu_link` varchar(64) DEFAULT NULL,
  `menu_code` varchar(50) DEFAULT NULL,
  `default` tinyint(1) DEFAULT '0',
  `url` varchar(50) DEFAULT NULL,
  `ordering` int(3) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`id`,`fa_icon`,`parent_id`,`menu_type_id`,`menu_link`,`menu_code`,`default`,`url`,`ordering`,`is_active`,`created_date`,`modified_date`) values (1,'fa-dashboard',0,1,'','y5_m01',1,'/',1,1,NULL,NULL),(2,'fa-edit',0,1,'admin/admin','y5_m02',0,'/admin/admin',2,0,NULL,NULL),(3,'fa-list',0,1,'admin/audi_trail','y5_m09',0,NULL,3,1,NULL,NULL),(4,'fa-users',0,1,'admin/users','y5_m10',0,NULL,4,1,NULL,NULL),(5,'fa fa-gears',0,1,'admin/config/configuration','y5_m11',0,NULL,5,1,NULL,NULL),(6,NULL,4,3,'admin/users','y5_s24',0,'/admin/users',45,1,NULL,NULL),(7,NULL,4,3,'admin/user_groups','y5_s25',0,'admin/user_group',45,1,NULL,NULL),(8,NULL,4,3,'admin/users_group_role','y5_s26',0,'/admin/users_group_role',45,1,NULL,NULL),(10,NULL,5,3,'admin/config/configuration','y5_s43',0,NULL,45,1,NULL,NULL),(11,'fa-user',0,3,'admin/dashboard','y5_m14',0,NULL,6,1,NULL,NULL),(12,'fa-edit',0,1,'setup/system','y5_m15',0,NULL,45,1,NULL,NULL),(13,NULL,5,3,'admin/setup_mgr/currency','y5_s28',0,NULL,45,1,NULL,NULL),(15,'fa fa-money',0,1,'setup/sale','y5_m16',0,NULL,45,1,NULL,NULL),(16,NULL,15,3,'setup/sale/agency','y5_s30',0,NULL,11,1,NULL,NULL),(17,NULL,44,3,'admin/customer_mgr/customer','y5_s31',0,NULL,45,1,NULL,NULL),(19,NULL,15,3,'setup/sale/invoice','y5_s33',0,NULL,11,1,NULL,NULL),(21,'fa fa-database',0,1,'setup/sale/stock','y5_m17',0,NULL,45,1,NULL,NULL),(23,NULL,37,3,'admin/setup_mgr/item_category','y5_s36',0,NULL,1,1,NULL,NULL),(24,NULL,37,3,'admin/setup_mgr/item','y5_s37',0,NULL,3,1,NULL,NULL),(25,NULL,21,3,'admin/stock_mgr/actual_stock','y5_s38',0,NULL,45,1,NULL,NULL),(26,NULL,5,3,'setup/sale/stock/bank_account','y5_s39',0,NULL,45,1,NULL,NULL),(27,NULL,21,3,'setup/sale/stock/bank_account_history','y5_s40',0,NULL,45,0,NULL,NULL),(29,NULL,5,3,'admin/config/next_code','y5_s42',0,NULL,45,1,NULL,NULL),(30,NULL,12,3,'admin/setup_mgr/department','y5_s44',0,NULL,45,1,NULL,NULL),(31,NULL,12,3,'admin/setup_mgr/position','y5_s45',0,NULL,45,1,NULL,NULL),(32,NULL,12,3,'admin/setup_mgr/branch_group','y5_s46',0,NULL,45,1,NULL,NULL),(33,NULL,12,3,'admin/setup_mgr/branch','y5_s47',0,NULL,45,1,NULL,NULL),(34,NULL,12,3,'admin/setup_mgr/unit_group','y5_s48',0,NULL,45,1,NULL,NULL),(35,NULL,12,3,'admin/setup_mgr/unit','y5_s49',0,NULL,45,1,NULL,NULL),(36,NULL,12,3,'admin/setup_mgr/employee','y5_s50',0,NULL,45,1,NULL,NULL),(37,'fa fa-file-text',0,3,'setup/item','y5_m18',0,NULL,45,1,NULL,NULL),(38,NULL,37,3,'admin/setup_mgr/item_status','y5_s51',0,NULL,7,1,NULL,NULL),(39,NULL,37,3,'admin/item_mgr/item_base_store','y5_s52',0,NULL,9,1,NULL,NULL),(40,NULL,37,3,'admin/item_mgr/item_base_vendor','y5_s53',0,NULL,10,1,NULL,NULL),(41,'fa fa-institution',0,3,'mgr/supplier','y5_m19',0,NULL,45,1,NULL,NULL),(42,NULL,41,3,'admin/supplier_mgr/supplier','y5_s54',0,NULL,45,1,NULL,NULL),(44,'fa fa-users',0,3,'mrg/customer','y5_m20',0,NULL,45,1,NULL,NULL),(46,NULL,44,3,'admin/customer_mgr/customer_group','y5_s57',0,NULL,45,1,NULL,NULL),(47,NULL,44,3,'admin/customer_mgr/customer_field','y5_s58',0,NULL,45,1,NULL,NULL),(48,'fa fa-eyedropper',0,3,'mrg/tool','y5_m21',0,NULL,45,1,NULL,NULL),(49,NULL,48,3,'admin/tool_mgr/backup_list','y5_s59',0,NULL,45,1,NULL,NULL),(50,NULL,5,3,'admin/setup_mgr/language','y5_s60',0,NULL,45,1,NULL,NULL),(55,NULL,15,3,'setup/sale/purchase_invoice','y5_s65',0,NULL,11,1,NULL,NULL),(57,NULL,15,3,'setup/sale/purchase_order_number','y5_s67',0,NULL,11,1,NULL,NULL),(58,NULL,15,3,'setup/sale/purchase_order_vendor','y5_s68',0,NULL,11,1,NULL,NULL),(60,NULL,15,3,'admin/sale_mgr/return','y5_s70',0,NULL,3,1,NULL,NULL),(61,NULL,37,3,'admin/setup_mgr/item_size','y5_s71',0,NULL,6,1,NULL,NULL),(62,'fa fa-line-chart',0,3,'mrg/report','y5_m22',0,NULL,45,1,NULL,NULL),(63,NULL,62,3,'admin/report/summary_report','y5_s72',0,NULL,1,1,NULL,NULL),(64,NULL,62,3,'admin/report/inventory_on_hand','y5_s73',0,NULL,2,1,NULL,NULL),(65,NULL,62,3,'admin/report/sales_item','y5_s74',0,NULL,3,1,NULL,NULL),(66,NULL,62,3,'admin/report/item_information','y5_s75',0,NULL,4,1,NULL,NULL),(67,NULL,62,3,'admin/report/transfer_item','y5_s76',0,NULL,8,1,NULL,NULL),(68,NULL,21,3,'admin/stock_mgr/adjustment_stock','y5_s77',0,NULL,45,1,NULL,NULL),(69,NULL,37,3,'item_mgr/itemsize','y5_s78',0,NULL,6,1,NULL,NULL),(70,NULL,12,3,'admin/setup_mgr/stock_type','y5_s79',0,NULL,45,1,NULL,NULL),(71,'fa fa-th-large',0,3,'admin/store/main_store','y5_m23',0,'admin/store/main_store',45,1,NULL,NULL),(74,NULL,5,3,'admin/setup_mgr/company','y5_s82',0,NULL,45,1,NULL,NULL),(75,NULL,37,3,'admin/setup_mgr/item_type','y5_s83',0,NULL,5,1,NULL,NULL),(78,NULL,15,3,'admin/quotation','y5_s85',0,NULL,2,1,NULL,NULL),(80,NULL,15,3,'admin/transfer','y5_s86',0,NULL,45,1,NULL,NULL),(87,NULL,15,3,'admin/sale_mgr/sale_order','y5_s93',0,NULL,1,1,NULL,NULL),(88,NULL,37,3,'admin/setup_mgr/item_sub_category','y5_s94',0,NULL,2,1,NULL,NULL),(89,NULL,37,3,'admin/item_mgr/item_barcode','y5_s95',0,NULL,4,1,NULL,NULL),(90,'fa fa-dollar',0,3,'admin/discount','y5_m26',0,NULL,5,1,NULL,NULL),(92,NULL,90,3,'admin/discount/discount_methods','y5_s97',0,NULL,1,1,NULL,NULL),(93,NULL,5,3,'admin/setup_mgr/item_location','y5_s98',0,NULL,45,1,NULL,NULL),(94,NULL,37,3,'admin/item_mgr/location_base_branch','y5_s99',0,NULL,8,1,NULL,NULL),(95,NULL,37,3,'admin/item_mgr/item_base_location','y5_s100',0,NULL,11,1,NULL,NULL),(96,NULL,62,3,'admin/report/return_item','y5_s101',0,NULL,9,1,NULL,NULL),(97,NULL,62,3,'admin/report/purchase_order_by_supplier','y5_s102',0,NULL,6,1,NULL,NULL),(99,NULL,0,3,'admin/vendor','y5_m30',0,NULL,1,1,NULL,NULL),(100,NULL,99,3,'admin/vendor','y5_s104',0,NULL,1,1,NULL,NULL),(102,NULL,15,3,'admin/stock_mgr/purchase_order','y5_s105',0,NULL,1,1,NULL,NULL);

/*Table structure for table `tbl_menu_description` */

DROP TABLE IF EXISTS `tbl_menu_description`;

CREATE TABLE `tbl_menu_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_description` */

insert  into `tbl_menu_description`(`id`,`menu_id`,`language_id`,`name`,`meta_description`,`meta_keywords`) values (1,1,2,'Home',NULL,NULL),(2,2,2,'Administrator',NULL,NULL),(3,3,2,'Audit trail',NULL,NULL),(4,4,2,'Users',NULL,NULL),(5,5,2,'Settings',NULL,NULL),(7,7,2,'User groups',NULL,NULL),(8,8,2,'Group roles',NULL,NULL),(10,10,2,'Configuration',NULL,NULL),(77,6,2,'Users',NULL,NULL),(78,12,2,'Store Setup',NULL,NULL),(79,13,2,'Currency Rates',NULL,NULL),(81,15,2,'Sale Management',NULL,NULL),(83,17,2,'Customers',NULL,NULL),(84,18,2,'Quotation',NULL,NULL),(87,21,2,'Stocks',NULL,NULL),(89,23,2,'Item Category',NULL,NULL),(90,24,2,'Items',NULL,NULL),(91,25,2,'Inventory Count',NULL,NULL),(92,26,2,'Bank Account',NULL,NULL),(94,29,2,'Next Codes',NULL,NULL),(95,30,2,'Departments',NULL,NULL),(96,31,2,'Positions',NULL,NULL),(97,32,2,'Branch Groups',NULL,NULL),(98,33,2,'Branchs',NULL,NULL),(99,34,2,'Unit Groups',NULL,NULL),(100,35,2,'Units',NULL,NULL),(101,36,2,'Employees',NULL,NULL),(102,37,2,'Items',NULL,NULL),(103,38,2,'Item Status',NULL,NULL),(104,39,2,'Item Base Branch',NULL,NULL),(105,40,2,'Item Base Vendor',NULL,NULL),(106,41,2,'Supplier Management',NULL,NULL),(107,42,2,'Suppliers',NULL,NULL),(109,44,2,'Customer Management',NULL,NULL),(111,46,2,'Customer Groups',NULL,NULL),(112,47,2,'Customer Fields',NULL,NULL),(113,48,2,'Tool Management',NULL,NULL),(114,49,2,'Back Up / Restore',NULL,NULL),(115,50,2,'Language',NULL,NULL),(125,60,2,'Return Items',NULL,NULL),(126,62,2,'Reports',NULL,NULL),(127,63,2,'Summary Reports',NULL,NULL),(128,64,2,'Inventory On Hand',NULL,NULL),(129,65,2,'Sales Item',NULL,NULL),(130,66,2,'Item Information',NULL,NULL),(131,67,2,'Transfer Item',NULL,NULL),(132,68,2,'Stock Adjustment',NULL,NULL),(133,61,2,'Item Size',NULL,NULL),(135,71,2,'Change Branch',NULL,NULL),(138,74,2,'Company',NULL,NULL),(139,75,2,'Item Type',NULL,NULL),(142,78,2,'Quotations',NULL,NULL),(144,80,2,'Transfers',NULL,NULL),(146,82,2,'Transfer List',NULL,NULL),(151,87,2,'Sale Orders',NULL,NULL),(152,88,2,'Item Subcategory',NULL,NULL),(153,70,2,'Stock Type',NULL,NULL),(154,89,2,'Generate Barcode',NULL,NULL),(155,90,2,'Discount',NULL,NULL),(157,92,2,'Discount Methods',NULL,NULL),(158,93,2,'Location',NULL,NULL),(159,94,2,'Location Base Branch',NULL,NULL),(160,95,2,'Item Base Location',NULL,NULL),(161,96,2,'Return Item',NULL,NULL),(162,97,2,'Purchase Order By Supplier',NULL,NULL),(164,99,2,'Vendors',NULL,NULL),(165,100,2,'Vendors',NULL,NULL),(167,102,2,'Purchase Order',NULL,NULL);

/*Table structure for table `tbl_menu_type` */

DROP TABLE IF EXISTS `tbl_menu_type`;

CREATE TABLE `tbl_menu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_type` */

/*Table structure for table `tbl_next_codes` */

DROP TABLE IF EXISTS `tbl_next_codes`;

CREATE TABLE `tbl_next_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `next_sequence` int(11) NOT NULL DEFAULT '1',
  `cit` int(11) DEFAULT NULL,
  `cet` int(11) DEFAULT NULL,
  `prefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `year_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_manaul` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_next_codes` */

insert  into `tbl_next_codes`(`id`,`module`,`next_sequence`,`cit`,`cet`,`prefix`,`suffix`,`length`,`year_format`,`month_format`,`created_at`,`updated_at`,`is_manaul`) values (1,'RECEIPT',9,3,1,'RCP-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-29 09:35:49',1),(2,'INVOICE',87,1,1,'INV-','00',4,'Y','m','2016-08-03 00:00:00','2016-09-09 16:02:58',1),(3,'QUOTATION',1,1,1,'QUO-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-03 00:00:00',1),(4,'TRANSFER',1,1,1,'TRNS-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-03 00:00:00',1),(5,'RETURN',1,1,1,'RET-','00',4,'Y','m','2017-11-05 00:00:00','2017-11-05 00:00:00',1),(6,'SALE ORDER',1,1,1,'SO-','00',4,'Y','m','2017-11-06 00:00:00','2017-11-06 00:00:00',1);

/*Table structure for table `tbl_notification` */

DROP TABLE IF EXISTS `tbl_notification`;

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_group_id` int(3) DEFAULT NULL,
  `notification_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `endtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_notification` (`notification_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_notification` */

/*Table structure for table `tbl_notification_group` */

DROP TABLE IF EXISTS `tbl_notification_group`;

CREATE TABLE `tbl_notification_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notification_group` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_notification_group` */

insert  into `tbl_notification_group`(`id`,`icon`,`notification_group`,`parent_id`) values (1,'fa fa-plane','Flights',0),(2,'fa fa-mortar-board','Crew License',0),(3,'fa fa-edit','Comments Request',0),(4,'fa fa-reply-all','Swap Flight',1),(5,'fa fa-retweet','Diverted Flight',1),(6,'fa fa-close','Cancel Flight',1),(7,'fa fa-trash-o','Delete Flight',1),(8,'fa fa-plus-circle','New Flight',1),(9,'fa fa-tachometer','Retime Flight',1),(10,'fa fa-comments','Flight Requested',1);

/*Table structure for table `tbl_notification_users` */

DROP TABLE IF EXISTS `tbl_notification_users`;

CREATE TABLE `tbl_notification_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_email` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_notification_users_tbl_user` (`user_id`),
  KEY `FK_tbl_notification` (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_notification_users` */

/*Table structure for table `tbl_operaion_control` */

DROP TABLE IF EXISTS `tbl_operaion_control`;

CREATE TABLE `tbl_operaion_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(5) DEFAULT NULL,
  `control_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `control_description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_operaion_control` */

/*Table structure for table `tbl_operation_form` */

DROP TABLE IF EXISTS `tbl_operation_form`;

CREATE TABLE `tbl_operation_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_operation_form` */

/*Table structure for table `tbl_order_types` */

DROP TABLE IF EXISTS `tbl_order_types`;

CREATE TABLE `tbl_order_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_order_types` */

insert  into `tbl_order_types`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'Walk In',NULL,'2018-02-02 00:00:00','2018-02-02 00:00:00'),(2,'Booking',NULL,'2018-02-02 00:00:00','2018-02-02 00:00:00'),(3,'Delivery',NULL,'2018-02-02 00:00:00','2018-02-02 00:00:00');

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` int(11) DEFAULT NULL,
  `act_type_id` int(11) DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `paid_amt` float DEFAULT NULL,
  `change_amt` float DEFAULT NULL,
  `card_no` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit` float DEFAULT NULL,
  `rec_no` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_payment` */

/*Table structure for table `tbl_payment_method` */

DROP TABLE IF EXISTS `tbl_payment_method`;

CREATE TABLE `tbl_payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment_method` */

insert  into `tbl_payment_method`(`id`,`name`,`description`,`status`,`ordering`,`is_default`) values (1,'Cash',NULL,'1',1,1),(2,'Visa Card',NULL,'1',2,0),(3,'Master Card',NULL,'1',3,0);

/*Table structure for table `tbl_pos_cus_flag` */

DROP TABLE IF EXISTS `tbl_pos_cus_flag`;

CREATE TABLE `tbl_pos_cus_flag` (
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_flag` */

/*Table structure for table `tbl_pos_cus_order_details` */

DROP TABLE IF EXISTS `tbl_pos_cus_order_details`;

CREATE TABLE `tbl_pos_cus_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_order_id` int(11) DEFAULT '0',
  `pos_add_on_id` int(11) DEFAULT '0',
  `ref_order_detail_id` int(11) DEFAULT '0',
  `item_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `cost_amount` decimal(16,4) DEFAULT '0.0000',
  `unit_price` decimal(16,4) DEFAULT NULL,
  `price` decimal(16,4) DEFAULT '0.0000',
  `is_cancel` tinyint(1) DEFAULT '0',
  `is_delete` tinyint(1) DEFAULT '0',
  `printed_qty` int(11) DEFAULT NULL,
  `is_discount_item` int(1) DEFAULT '0',
  `discount_amount` float(16,4) DEFAULT '0.0000',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pos_cus_order_details_pos_menu_prices1_idx` (`item_id`) USING BTREE,
  KEY `fk_pos_cus_order_details_pos_cus_orders1_idx` (`pos_order_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_order_details` */

insert  into `tbl_pos_cus_order_details`(`id`,`pos_order_id`,`pos_add_on_id`,`ref_order_detail_id`,`item_id`,`unit_id`,`qty`,`cost_amount`,`unit_price`,`price`,`is_cancel`,`is_delete`,`printed_qty`,`is_discount_item`,`discount_amount`,`created_date`,`updated_date`,`note`) values (1,1,0,0,1,3,1,'3.0000','4.0000','4.0000',0,0,1,0,0.0000,NULL,NULL,NULL),(2,2,0,0,46,6,1,'1.7000','2.0000','2.0000',0,0,1,0,0.0000,NULL,NULL,NULL),(5,3,0,0,46,6,1,'1.7000','2.0000','2.0000',0,0,1,0,0.0000,'2019-03-02 21:48:45',NULL,NULL);

/*Table structure for table `tbl_pos_cus_order_sequence` */

DROP TABLE IF EXISTS `tbl_pos_cus_order_sequence`;

CREATE TABLE `tbl_pos_cus_order_sequence` (
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_order_sequence` */

insert  into `tbl_pos_cus_order_sequence`(`sequence`) values (29);

/*Table structure for table `tbl_pos_cus_orders` */

DROP TABLE IF EXISTS `tbl_pos_cus_orders`;

CREATE TABLE `tbl_pos_cus_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `invoice_no` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT '0',
  `member_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `is_void` tinyint(1) DEFAULT '0',
  `pax` int(10) DEFAULT '0',
  `made_by` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `made_date` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_printed_receipt` tinyint(1) DEFAULT NULL,
  `cancel_by` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(3) DEFAULT '0',
  `discount_amount` decimal(16,4) DEFAULT '0.0000',
  `vat_percentag` decimal(10,4) DEFAULT '0.0000',
  `vat_amount` decimal(16,4) DEFAULT '0.0000',
  `tax_amount` decimal(16,4) DEFAULT '0.0000',
  `tax_percentage` int(3) DEFAULT '0',
  `sub_total_amount` decimal(16,4) DEFAULT '0.0000',
  `service_tax_amount` decimal(16,4) DEFAULT '0.0000',
  `service_tax_percentage` decimal(16,4) DEFAULT '0.0000',
  `order_type_id` int(11) DEFAULT NULL,
  `drawer_id` int(11) DEFAULT NULL,
  `printed_qty` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `flag_check` tinyint(1) DEFAULT '0' COMMENT 'If_flagcheck = 1 means customer ordering products.',
  `ref_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `discount_method_id` int(11) DEFAULT NULL,
  `discount_by` int(11) DEFAULT NULL,
  `discount_profile_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pos_cus_orders_discount_methods1_idx` (`discount_method_id`) USING BTREE,
  KEY `fk_pos_cus_orders_discount_profiles1_idx` (`discount_profile_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_orders` */

insert  into `tbl_pos_cus_orders`(`id`,`order_no`,`branch_id`,`invoice_no`,`unit_id`,`table_id`,`member_id`,`customer_id`,`check_in_date`,`check_out_date`,`is_void`,`pax`,`made_by`,`made_date`,`is_printed_receipt`,`cancel_by`,`discount`,`discount_amount`,`vat_percentag`,`vat_amount`,`tax_amount`,`tax_percentage`,`sub_total_amount`,`service_tax_amount`,`service_tax_percentage`,`order_type_id`,`drawer_id`,`printed_qty`,`status_id`,`flag_check`,`ref_id`,`created_date`,`updated_date`,`discount_method_id`,`discount_by`,`discount_profile_type_id`) values (1,'INV-8500',0,NULL,NULL,0,0,0,'2019-03-02 21:21:45',NULL,0,0,'2','2019-03-02 21:21:45',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'4.0000','0.0000','0.0000',1,0,NULL,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(2,'INV-8600',0,NULL,NULL,0,0,0,'2019-03-02 21:43:44',NULL,0,0,NULL,'2019-03-02 21:43:44',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'2.0000','0.0000','0.0000',1,0,NULL,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(3,'INV-8700',0,NULL,NULL,0,0,0,'2019-03-02 21:46:36',NULL,0,0,NULL,'2019-03-02 21:46:36',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'2.0000','0.0000','0.0000',1,0,NULL,10,0,NULL,NULL,'2019-03-02 21:48:45',NULL,NULL,NULL);

/*Table structure for table `tbl_pos_kitchens` */

DROP TABLE IF EXISTS `tbl_pos_kitchens`;

CREATE TABLE `tbl_pos_kitchens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_kitchens` */

insert  into `tbl_pos_kitchens`(`id`,`name`,`printer_name`,`ip_address`,`is_deleted`,`created_at`,`updated_at`) values (1,'printer','printer','127.0.0.1',0,NULL,NULL);

/*Table structure for table `tbl_pos_outlets` */

DROP TABLE IF EXISTS `tbl_pos_outlets`;

CREATE TABLE `tbl_pos_outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `tooltype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_outlets` */

insert  into `tbl_pos_outlets`(`id`,`name`,`description`,`tooltype`,`is_deleted`,`created_at`,`updated_at`) values (1,'1st FLOOR',NULL,'Graphic',0,'2016-07-19 13:26:37','2016-07-19 13:26:37'),(2,'2nd FLOOR','','Graphic',0,'2016-07-25 22:09:27','2016-07-25 22:09:27'),(3,'3rd FLOOR','','Graphic',0,'2017-10-09 12:09:11','2017-10-09 12:09:11');

/*Table structure for table `tbl_pos_reciept` */

DROP TABLE IF EXISTS `tbl_pos_reciept`;

CREATE TABLE `tbl_pos_reciept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `amount` decimal(16,4) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status_id` int(11) DEFAULT NULL,
  `udpated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_reciept` */

insert  into `tbl_pos_reciept`(`id`,`receipt_no`,`account_id`,`order_id`,`payment_method_id`,`amount`,`currency_id`,`transaction_date`,`description`,`status_id`,`udpated_at`,`created_at`) values (1,'RCP-800',NULL,1,1,'4.0000',1,'2019-03-02 21:21:49','',20,NULL,'2019-03-02 21:21:49'),(2,'RCP-900',NULL,2,1,'2.0000',1,'2019-03-02 21:43:55','',20,NULL,'2019-03-02 21:43:55');

/*Table structure for table `tbl_pos_tables` */

DROP TABLE IF EXISTS `tbl_pos_tables`;

CREATE TABLE `tbl_pos_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_outlets_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pax` int(11) DEFAULT '0',
  `is_table` tinyint(1) DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT '1',
  `font_size` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `table_shape` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position_x` int(11) DEFAULT NULL,
  `position_y` int(11) DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_tables` */

insert  into `tbl_pos_tables`(`id`,`pos_outlets_id`,`name`,`pax`,`is_table`,`description`,`status`,`font_size`,`width`,`height`,`table_shape`,`position_x`,`position_y`,`background_color`,`background_url`,`text_color`,`is_deleted`,`created_at`,`updated_at`) values (21,2,'TB1',10,1,'',1,NULL,100,100,'rect',130,170,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-09 12:09:23','2017-10-10 16:50:28'),(27,1,'TB13',12,1,'',3,NULL,100,100,'rect',23,-1912,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-10 14:27:45','2018-01-10 12:07:43'),(28,1,'TB2',4,1,'',1,NULL,100,50,'rect',551,-1999,'#0D1C0F','/images/TABLE/square.png','#FFFFFF',0,'2017-10-10 14:28:46','2017-10-13 20:43:48'),(29,1,'TB3',4,1,'',1,NULL,100,50,'rect',551,-1972,'#0D1C0F','/images/TABLE/square.png','#FFFFFF',0,'2017-10-10 14:29:16','2017-10-14 13:40:01'),(31,2,'TB5',12,1,'',1,NULL,100,100,'rect',137,-167,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-10 14:32:36','2017-10-10 16:50:33'),(50,3,'VIP2',10,1,'',1,NULL,80,80,'rect',136,114,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-09 12:09:23','2017-10-13 20:57:40'),(52,3,'VIP2',12,1,'',1,NULL,80,80,'rect',137,-247,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-10 14:32:36','2017-10-13 20:57:40');

/*Table structure for table `tbl_position` */

DROP TABLE IF EXISTS `tbl_position`;

CREATE TABLE `tbl_position` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_position` */

insert  into `tbl_position`(`id`,`name`,`is_active`,`is_delete`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Designer',1,0,2,2,'2016-10-23 14:32:02','2019-02-28 13:11:52'),(2,'Designer2',1,0,2,2,'2019-02-28 13:11:58','2019-02-28 13:12:04');

/*Table structure for table `tbl_purchase_invoice` */

DROP TABLE IF EXISTS `tbl_purchase_invoice`;

CREATE TABLE `tbl_purchase_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) DEFAULT NULL,
  `pi_number` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pi_date` datetime DEFAULT NULL,
  `sub_total` float DEFAULT NULL,
  `grand_total` float DEFAULT NULL,
  `vat_amount` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `is_cancel` bit(1) DEFAULT NULL,
  `is_vat` bit(1) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `sub_total_return` float DEFAULT NULL,
  `is_complete` bit(1) DEFAULT NULL,
  `description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_discount` float DEFAULT NULL,
  `total_vat_amount` float DEFAULT NULL,
  `is_delete` bit(1) DEFAULT NULL,
  `adjust_qty_subitem` float DEFAULT NULL,
  `remark` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_approve` int(1) DEFAULT NULL COMMENT '1 = Approved',
  `is_subitem_complete` bit(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_invoice` */

/*Table structure for table `tbl_purchase_order` */

DROP TABLE IF EXISTS `tbl_purchase_order`;

CREATE TABLE `tbl_purchase_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_date` datetime DEFAULT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `sub_total` float(10,3) DEFAULT NULL,
  `vat_amount` float(10,3) DEFAULT NULL,
  `shipping` float(10,3) DEFAULT NULL,
  `grand_total` float(10,3) DEFAULT NULL,
  `po_footer_remark` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_post` bit(1) DEFAULT NULL,
  `is_cancel` bit(1) DEFAULT NULL,
  `is_approve` tinyint(1) DEFAULT '0',
  `post_date` datetime DEFAULT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `branch_id` int(3) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `sub_discount` float DEFAULT NULL,
  `make_by` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_purchase_order` (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_order` */

insert  into `tbl_purchase_order`(`id`,`po_number`,`po_date`,`pr_id`,`sub_total`,`vat_amount`,`shipping`,`grand_total`,`po_footer_remark`,`is_post`,`is_cancel`,`is_approve`,`post_date`,`cancel_date`,`branch_id`,`supplier_id`,`description`,`sub_discount`,`make_by`,`remark`,`created_at`,`updated_at`) values (1,'INV-001','2019-02-28 00:00:00',NULL,24.000,0.000,0.000,24.000,NULL,NULL,NULL,1,NULL,NULL,0,1,'',0,'0',NULL,NULL,'2019-02-28 22:52:21');

/*Table structure for table `tbl_purchase_order_detail` */

DROP TABLE IF EXISTS `tbl_purchase_order_detail`;

CREATE TABLE `tbl_purchase_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) DEFAULT NULL COMMENT 'pi = purchase_invoice_id',
  `delivery_date` datetime DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `receive_qty` int(5) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `change` float DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `is_complete` bit(1) DEFAULT NULL,
  `total` float(10,3) DEFAULT NULL,
  `remark` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_order_detail` */

insert  into `tbl_purchase_order_detail`(`id`,`po_id`,`delivery_date`,`qty`,`receive_qty`,`unit_id`,`price`,`discount_id`,`discount_amount`,`change`,`item_id`,`is_complete`,`total`,`remark`) values (2,1,NULL,2,NULL,6,12,NULL,0,NULL,29,NULL,24.000,'');

/*Table structure for table `tbl_purchase_order_number` */

DROP TABLE IF EXISTS `tbl_purchase_order_number`;

CREATE TABLE `tbl_purchase_order_number` (
  `po_no_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_character` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_number` int(11) DEFAULT NULL,
  `include_year` bit(1) DEFAULT NULL,
  `include_month` bit(1) DEFAULT NULL,
  `number_format` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_format` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_format` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_0_next_month` bit(1) DEFAULT NULL,
  `current_month` int(11) DEFAULT NULL,
  PRIMARY KEY (`po_no_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_order_number` */

/*Table structure for table `tbl_quotation` */

DROP TABLE IF EXISTS `tbl_quotation`;

CREATE TABLE `tbl_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quotation_date` datetime DEFAULT NULL,
  `quotation_item_master` datetime DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` float(10,2) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  `vat_percentage` float(10,2) DEFAULT NULL,
  `grand_total` float(10,2) DEFAULT NULL,
  `is_void` bit(1) DEFAULT NULL,
  `is_cancel` int(1) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_approve` int(1) DEFAULT '0',
  `is_sale_order` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_quotation` */

insert  into `tbl_quotation`(`id`,`quotation_no`,`quotation_date`,`quotation_item_master`,`customer_id`,`description`,`sub_total`,`discount`,`vat_percentage`,`grand_total`,`is_void`,`is_cancel`,`branch_id`,`expired_date`,`created_at`,`updated_at`,`created_by`,`updated_by`,`is_approve`,`is_sale_order`) values (1,'QUO-201902004','2019-02-28 00:00:00',NULL,1,'Description',24.00,NULL,0.00,24.00,NULL,NULL,1,'2019-03-01 00:00:00',NULL,'2019-03-02 15:07:43',2,NULL,1,1);

/*Table structure for table `tbl_quotation_detail` */

DROP TABLE IF EXISTS `tbl_quotation_detail`;

CREATE TABLE `tbl_quotation_detail` (
  `quotation_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `quotation_date` datetime DEFAULT NULL,
  `quotation_qty` float(10,2) DEFAULT NULL,
  `comp_qty` float(10,2) DEFAULT NULL,
  `void_qty` float(10,2) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `retailer_price` float(10,2) DEFAULT NULL,
  `whole_sale_price` float(10,2) DEFAULT NULL,
  `DisMethodId` float(10,2) DEFAULT NULL,
  `discount_amount` float(10,2) DEFAULT NULL,
  `quotation_price` float(10,2) DEFAULT NULL,
  `whole_sell_unit` int(4) DEFAULT NULL,
  `retail_unit` int(4) DEFAULT NULL,
  `item_sell_price_id` int(4) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `remark` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_quotation_detail` */

insert  into `tbl_quotation_detail`(`quotation_id`,`branch_id`,`unit_id`,`quotation_date`,`quotation_qty`,`comp_qty`,`void_qty`,`item_id`,`retailer_price`,`whole_sale_price`,`DisMethodId`,`discount_amount`,`quotation_price`,`whole_sell_unit`,`retail_unit`,`item_sell_price_id`,`total`,`remark`) values (1,1,3,NULL,12.00,NULL,NULL,30,NULL,2.00,NULL,NULL,2.00,NULL,NULL,NULL,24.00,'');

/*Table structure for table `tbl_quotation_number` */

DROP TABLE IF EXISTS `tbl_quotation_number`;

CREATE TABLE `tbl_quotation_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_character` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_character` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `include_year` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `include_month` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_month` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_quotation_number` */

/*Table structure for table `tbl_quotation_sequence` */

DROP TABLE IF EXISTS `tbl_quotation_sequence`;

CREATE TABLE `tbl_quotation_sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sequence_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_quotation_sequence` */

insert  into `tbl_quotation_sequence`(`id`,`sequence_no`) values (1,3);

/*Table structure for table `tbl_return` */

DROP TABLE IF EXISTS `tbl_return`;

CREATE TABLE `tbl_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `bill_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_returned` tinyint(1) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_return` */

insert  into `tbl_return`(`id`,`branch_id`,`bill_no`,`return_no`,`return_date`,`return_by`,`verify_by`,`description`,`is_returned`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,'0923','RET-201902008','2019-02-28','sinet','dara','description',1,NULL,NULL,'2019-02-28 22:54:53','2019-02-28 22:54:53');

/*Table structure for table `tbl_return_detail` */

DROP TABLE IF EXISTS `tbl_return_detail`;

CREATE TABLE `tbl_return_detail` (
  `return_id` int(11) DEFAULT NULL,
  `unit_id` int(5) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `unit_price` float(10,2) DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_return_detail` */

insert  into `tbl_return_detail`(`return_id`,`unit_id`,`item_id`,`qty`,`unit_price`,`remark`) values (1,3,63,12,NULL,'');

/*Table structure for table `tbl_return_sequence` */

DROP TABLE IF EXISTS `tbl_return_sequence`;

CREATE TABLE `tbl_return_sequence` (
  `id` int(11) NOT NULL DEFAULT '1',
  `sequence_no` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_return_sequence` */

insert  into `tbl_return_sequence`(`id`,`sequence_no`) values (1,9);

/*Table structure for table `tbl_sale_order` */

DROP TABLE IF EXISTS `tbl_sale_order`;

CREATE TABLE `tbl_sale_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_order_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quotation_no` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_order_date` datetime DEFAULT NULL,
  `sale_order_item_master` datetime DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `description` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` float(10,2) DEFAULT NULL,
  `discount` float(10,2) DEFAULT '0.00',
  `vat_percentage` float(10,2) DEFAULT NULL,
  `grand_total` float(10,2) DEFAULT NULL,
  `sale_return` float(10,2) DEFAULT NULL,
  `is_void` bit(1) DEFAULT NULL,
  `is_cancel` int(1) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_approve` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_sale_order` */

insert  into `tbl_sale_order`(`id`,`sale_order_no`,`invoice_no`,`quotation_no`,`sale_order_date`,`sale_order_item_master`,`customer_id`,`description`,`sub_total`,`discount`,`vat_percentage`,`grand_total`,`sale_return`,`is_void`,`is_cancel`,`branch_id`,`expired_date`,`created_at`,`updated_at`,`created_by`,`updated_by`,`is_approve`) values (1,'SO-201902005',NULL,NULL,'2019-02-28 00:00:00',NULL,1,'description',24.00,0.00,0.00,24.00,NULL,NULL,NULL,1,'2019-03-01 00:00:00',NULL,NULL,2,NULL,1),(2,'SO-201903003','INV-2019030021','QUO-201902004','2019-03-02 15:07:43',NULL,1,'Description',24.00,0.00,0.00,24.00,NULL,NULL,NULL,1,'2019-03-01 00:00:00','2019-03-02 15:07:43','2019-03-02 15:07:43',2,NULL,1),(3,'SO-201903004',NULL,NULL,'2019-03-02 00:00:00',NULL,1,'asdf',24.00,NULL,0.00,24.00,NULL,NULL,NULL,1,'2019-03-09 00:00:00',NULL,NULL,2,NULL,1);

/*Table structure for table `tbl_sale_order_detail` */

DROP TABLE IF EXISTS `tbl_sale_order_detail`;

CREATE TABLE `tbl_sale_order_detail` (
  `sale_order_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `sale_order_date` datetime DEFAULT NULL,
  `sale_order_qty` float(10,2) DEFAULT NULL,
  `comp_qty` float(10,2) DEFAULT NULL,
  `void_qty` float(10,2) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `retailer_price` float(10,2) DEFAULT NULL,
  `whole_sale_price` float(10,2) DEFAULT NULL,
  `DisMethodId` float(10,2) DEFAULT NULL,
  `discount_amount` float(10,2) DEFAULT NULL,
  `sale_order_price` float(10,2) DEFAULT NULL,
  `whole_sell_unit` int(4) DEFAULT NULL,
  `retail_unit` int(4) DEFAULT NULL,
  `item_sell_price_id` int(4) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `remark` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_sale_order_detail` */

insert  into `tbl_sale_order_detail`(`sale_order_id`,`branch_id`,`unit_id`,`sale_order_date`,`sale_order_qty`,`comp_qty`,`void_qty`,`item_id`,`retailer_price`,`whole_sale_price`,`DisMethodId`,`discount_amount`,`sale_order_price`,`whole_sell_unit`,`retail_unit`,`item_sell_price_id`,`total`,`remark`) values (1,1,5,NULL,12.00,NULL,NULL,14,NULL,2.00,NULL,NULL,2.00,NULL,NULL,NULL,24.00,''),(2,1,3,NULL,12.00,NULL,NULL,30,NULL,2.00,NULL,NULL,2.00,NULL,NULL,NULL,24.00,''),(3,1,5,NULL,2.00,NULL,NULL,14,NULL,12.00,NULL,NULL,12.00,NULL,NULL,NULL,24.00,'');

/*Table structure for table `tbl_sale_order_sequence` */

DROP TABLE IF EXISTS `tbl_sale_order_sequence`;

CREATE TABLE `tbl_sale_order_sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sequence_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_sale_order_sequence` */

insert  into `tbl_sale_order_sequence`(`id`,`sequence_no`) values (1,5);

/*Table structure for table `tbl_sale_summary_item` */

DROP TABLE IF EXISTS `tbl_sale_summary_item`;

CREATE TABLE `tbl_sale_summary_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(3) DEFAULT NULL,
  `sale_menu_id` int(3) DEFAULT NULL,
  `unit_id` int(3) DEFAULT NULL,
  `sale_date` datetime DEFAULT NULL,
  `sale_qty` float(10,2) DEFAULT NULL,
  `comp_qty` float(10,2) DEFAULT NULL,
  `void_qty` float(10,2) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `retail_price` float(10,2) DEFAULT '0.00',
  `whole_sale_price` float(10,2) DEFAULT '0.00',
  `discount_method_id` int(3) DEFAULT NULL,
  `discount_amount` float(10,2) DEFAULT '0.00',
  `tax_amount` float(10,2) DEFAULT '0.00',
  `sub_total` float(10,2) DEFAULT '0.00',
  `grand_total` float(10,2) DEFAULT '0.00',
  `cost_price` float(10,2) DEFAULT '0.00',
  `sale_price` float(10,2) DEFAULT '0.00',
  `net_price` float(10,2) DEFAULT '0.00',
  `item_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_serial_number` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_sale_summary_item` */

/*Table structure for table `tbl_stock_type` */

DROP TABLE IF EXISTS `tbl_stock_type`;

CREATE TABLE `tbl_stock_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_stock_type` */

insert  into `tbl_stock_type`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'In Stock',1,1,2,NULL,'2017-11-05 11:49:00','2017-11-11 23:40:52'),(2,'Out Of Stock',0,1,2,NULL,'2017-11-05 20:57:47','2017-11-05 20:57:47'),(3,'3 Day In Stock',0,1,2,NULL,'2017-11-11 18:13:12','2017-11-11 18:13:12');

/*Table structure for table `tbl_supplier` */

DROP TABLE IF EXISTS `tbl_supplier`;

CREATE TABLE `tbl_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(4) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_supplier` */

insert  into `tbl_supplier`(`id`,`branch_id`,`name`,`company_name`,`contact`,`email`,`address`,`website`,`is_delete`,`is_active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,1,'Skymall',NULL,'asdf','','','',0,1,'2016-10-23 17:13:25','2018-05-16 20:43:41',NULL,NULL),(2,1,'CLAir',NULL,'0182212222','test@tes12t.com','','wwww',0,1,'2017-01-28 09:41:55','2018-05-16 20:43:51',NULL,NULL),(3,1,'Supplier A',NULL,'012313','','','',0,1,'2019-02-28 22:40:12','2019-02-28 22:40:12',NULL,NULL);

/*Table structure for table `tbl_table_reservations` */

DROP TABLE IF EXISTS `tbl_table_reservations`;

CREATE TABLE `tbl_table_reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) DEFAULT NULL,
  `contact_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reservation_date` datetime DEFAULT NULL,
  `contact_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reservation_by` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_table_reservations` */

insert  into `tbl_table_reservations`(`id`,`table_id`,`contact_name`,`reservation_date`,`contact_number`,`reservation_by`,`note`,`status_id`,`created_at`,`updated_at`) values (1,27,'sineth','0123-12-12 00:00:00','234123',NULL,'1123',6,'2019-02-07 16:42:48','2019-02-27 10:21:49'),(2,27,'sineth','0123-12-12 00:00:00','234123',0,'1123',5,'2019-02-27 10:20:15',NULL);

/*Table structure for table `tbl_transfer` */

DROP TABLE IF EXISTS `tbl_transfer`;

CREATE TABLE `tbl_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_branch_id` int(11) DEFAULT NULL,
  `to_branch_id` int(11) DEFAULT NULL,
  `transfer_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `transferor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `voucher_no` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_transfered` tinyint(1) DEFAULT '0',
  `is_received` tinyint(1) DEFAULT '0',
  `is_cancel` int(1) DEFAULT '0' COMMENT 'Cancel = 1 means cancel this transfer',
  `total` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_transfer` */

insert  into `tbl_transfer`(`id`,`from_branch_id`,`to_branch_id`,`transfer_no`,`transfer_date`,`transferor`,`receiver`,`description`,`voucher_no`,`is_transfered`,`is_received`,`is_cancel`,`total`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,2,'TRNS-201902006','2019-02-28','dara','subetg','dsecsa',NULL,0,0,0,NULL,2,NULL,'2019-02-28 22:55:38','2019-02-28 22:55:38');

/*Table structure for table `tbl_transfer_detail` */

DROP TABLE IF EXISTS `tbl_transfer_detail`;

CREATE TABLE `tbl_transfer_detail` (
  `transfer_id` int(11) DEFAULT NULL,
  `unit_id` int(5) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `total` float(10,2) DEFAULT NULL,
  KEY `FK_tbl_transfer_detail` (`transfer_id`),
  KEY `FK_tbl_transfer_detaild` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_transfer_detail` */

insert  into `tbl_transfer_detail`(`transfer_id`,`unit_id`,`item_id`,`qty`,`remark`,`total`) values (1,5,14,12,'',NULL);

/*Table structure for table `tbl_transfer_number` */

DROP TABLE IF EXISTS `tbl_transfer_number`;

CREATE TABLE `tbl_transfer_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_character` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_number` int(11) DEFAULT NULL,
  `include_year` bit(1) DEFAULT NULL,
  `include_month` bit(1) DEFAULT NULL,
  `number_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_format` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_0_next_month` bit(1) DEFAULT NULL,
  `current_month` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_transfer_number` */

/*Table structure for table `tbl_transfer_sequence` */

DROP TABLE IF EXISTS `tbl_transfer_sequence`;

CREATE TABLE `tbl_transfer_sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sequence_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_transfer_sequence` */

insert  into `tbl_transfer_sequence`(`id`,`sequence_no`) values (1,7);

/*Table structure for table `tbl_unit` */

DROP TABLE IF EXISTS `tbl_unit`;

CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_group_id` int(5) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_standard` bit(5) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_unit` */

insert  into `tbl_unit`(`id`,`unit_group_id`,`name`,`is_standard`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,1,'Bottle',NULL,0,1,2,2,'2017-01-19 21:48:09','2017-01-19 21:48:09'),(3,1,'Box',NULL,0,1,2,2,'2017-01-19 21:48:32','2017-01-19 21:48:32'),(4,1,'Can',NULL,0,1,2,2,'2017-01-19 21:48:50','2017-01-19 21:48:50'),(5,1,'Case',NULL,0,1,2,2,'2017-01-19 21:49:00','2017-11-04 08:38:03'),(6,1,'Package',NULL,0,1,2,2,'2017-01-19 21:49:13','2017-11-05 20:58:18'),(7,1,'Bulb',NULL,0,1,2,2,'2018-12-12 22:39:14','2018-12-12 22:39:14'),(8,1,'Glass',NULL,0,1,2,2,'2018-12-12 22:39:14','2018-12-12 22:39:14');

/*Table structure for table `tbl_unit_group` */

DROP TABLE IF EXISTS `tbl_unit_group`;

CREATE TABLE `tbl_unit_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_unit_group` */

insert  into `tbl_unit_group`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Unit Group',0,1,2,2,'2016-10-23 14:44:40','2017-11-05 20:58:07');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(5) DEFAULT NULL,
  `photo` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_image` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`password`,`group_id`,`photo`,`remember_token`,`email`,`profile_image`,`created_at`,`updated_at`) values (2,'admin','$2y$10$IAJ32BbktMky0TfW.YH5FOeNU9u1.JT/P5VOFrHLt05SBOylaxBji',1,'16-Oct-2016/camera (3).jpg','oRdgwO0wJj2pLmJErQ1mi5pXzxa74VKD73vVsIp2NjnU9wnydWDq0q0wgBaA','admin@admin.com',NULL,NULL,'2019-02-24 13:33:49');

/*Table structure for table `tbl_user_group` */

DROP TABLE IF EXISTS `tbl_user_group`;

CREATE TABLE `tbl_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) DEFAULT '0',
  `remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_user_group` */

insert  into `tbl_user_group`(`id`,`name`,`is_active`,`is_delete`,`remark`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Top Administrator',1,0,'Full System Control',NULL,2,NULL,NULL);

/*Table structure for table `tbl_utilities` */

DROP TABLE IF EXISTS `tbl_utilities`;

CREATE TABLE `tbl_utilities` (
  `Util_id` int(4) NOT NULL AUTO_INCREMENT,
  `util_string` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `util_int` int(5) DEFAULT NULL,
  `util_double` float DEFAULT NULL,
  `util_date` datetime DEFAULT NULL,
  `util_bool` bit(5) DEFAULT NULL,
  `util_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Util_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_utilities` */

/*Table structure for table `tbl_vendor` */

DROP TABLE IF EXISTS `tbl_vendor`;

CREATE TABLE `tbl_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(3) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terms_of_payment` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_day` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` bit(3) DEFAULT NULL,
  `is_vat` bit(3) DEFAULT NULL,
  `vat_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(5) DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_vendor` */

insert  into `tbl_vendor`(`id`,`branch_id`,`image`,`vendor_name`,`contact`,`address1`,`address2`,`tel1`,`tel2`,`tel3`,`fax1`,`fax2`,`account_number`,`terms_of_payment`,`delivery_day`,`email`,`website`,`vendor_code`,`description`,`is_active`,`is_vat`,`vat_no`,`is_delete`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,NULL,'Pisey','081333 333','asdf','asdf','asdf','asdf','asdf','asdf','asdf','asdf','asdf',0,'sadfsdf@tesa.com','asdf','12312',NULL,'','','asdf',1,NULL,NULL,'2016-10-23 16:19:02','2019-02-28 22:39:16'),(2,1,NULL,'v1','081223333','','','','','','','','','',0,'test@test.com','www.google.com','001',NULL,'',NULL,'',0,NULL,NULL,'2019-02-28 22:37:39','2019-03-02 17:33:38'),(3,2,NULL,'dara','','','','','','','','','','',0,'','','',NULL,'',NULL,'',1,NULL,NULL,'2019-02-28 22:39:07','2019-02-28 22:39:21');

/*Table structure for table `tbl_workshifts` */

DROP TABLE IF EXISTS `tbl_workshifts`;

CREATE TABLE `tbl_workshifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workshift_name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_workshifts` */

/*Table structure for table `trip_parameters` */

DROP TABLE IF EXISTS `trip_parameters`;

CREATE TABLE `trip_parameters` (
  `trip_paramid` int(8) NOT NULL AUTO_INCREMENT,
  `fuel_content` double DEFAULT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vehicle_id` int(8) NOT NULL,
  PRIMARY KEY (`trip_paramid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `trip_parameters` */

insert  into `trip_parameters`(`trip_paramid`,`fuel_content`,`creation_time`,`vehicle_id`) values (1,4.6,'2012-11-08 01:43:37',14),(2,5.6,'2012-11-08 02:45:37',14),(3,15.6,'2012-11-08 02:47:37',13),(4,3.6,'2012-11-08 02:50:37',16),(5,11.6,'2012-11-09 02:45:37',14),(6,5.6,'2012-11-12 10:45:37',16);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
