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

insert  into `tbl_activity_log`(`id`,`user_id`,`action`,`menu_code`,`ip_address`,`mac_address`,`datetime`) values (0,2,'Login','y5_m01',NULL,NULL,'2019-03-02 09:21:08'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:22:02'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:22:12'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:22:12'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:22:42'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:25:11'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:25:41'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:25:41'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:26:37'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:26:46'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:27:00'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:27:08'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:27:27'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:27:38'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:27:56'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:28:04'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:29:51'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:30:52'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:31:51'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:32:57'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:34:13'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:35:23'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:37:42'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 09:38:07'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 09:38:26'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 09:38:52'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 09:39:19'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 09:39:39'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 09:40:05'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:41:30'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:42:40'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-02 09:43:05'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:44:33'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:45:33'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:46:43'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:48:15'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:55:29'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:55:29'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:57:33'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:58:52'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 09:59:41'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:00:59'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:02:05'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:03:19'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:05:13'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:06:31'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:07:58'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:08:56'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:10:26'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:11:29'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:13:16'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:14:07'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:15:21'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:16:11'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:18:04'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:18:58'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:20:14'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:21:30'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:29:23'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:30:29'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:31:56'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:33:06'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:34:21'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:36:34'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:37:21'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:38:09'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:38:55'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:39:59'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:44:27'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:45:50'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:47:43'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:48:41'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:49:34'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:50:33'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:51:38'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:52:59'),(0,2,'delete','y5_m01',NULL,NULL,'2019-03-02 10:53:12'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:54:24'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-02 10:55:18'),(0,2,'Login','y5_m01',NULL,NULL,'2019-03-03 04:38:04'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-03 05:07:53'),(0,2,'Login','y5_m01',NULL,NULL,'2019-03-03 07:49:34'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-03 07:54:43'),(0,2,'create','y5_m01',NULL,NULL,'2019-03-03 08:24:47'),(0,2,'Login','y5_m01',NULL,NULL,'2019-03-06 04:41:06'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 05:28:41'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 05:30:09'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 05:30:52'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 05:31:07'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 05:35:41'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 05:35:49'),(0,2,'Login','y5_m01',NULL,NULL,'2019-03-06 08:56:25'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 08:57:32'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:03:15'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:06:17'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:07:12'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:21:24'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:21:30'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:21:37'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:21:39'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:21:45'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:21:54'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:21:55'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:23:14'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-06 09:31:26'),(0,2,'Login','y5_m01',NULL,NULL,'2019-03-07 08:29:24'),(0,2,'update','y5_m01',NULL,NULL,'2019-03-07 08:59:16'),(0,2,'view','y5_m01',NULL,NULL,'2019-03-07 12:34:28'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-21 09:16:41'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-26 09:53:59'),(0,2,'view','y5_m01',NULL,NULL,'2019-05-26 09:54:27'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-26 10:48:45'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-26 11:04:36'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-26 11:15:24'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-05-26 11:42:07'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-26 11:42:12'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 12:20:06'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:20:42'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:21:02'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:23:50'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:24:01'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:24:10'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:24:17'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:24:24'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:24:31'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:24:38'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:25:20'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:25:27'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:25:35'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:25:46'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:25:56'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:26:03'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:26:11'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:26:19'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:26:27'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:26:34'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:26:42'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:26:52'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:27:00'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:27:10'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:27:17'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:27:25'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:27:34'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:27:44'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:27:58'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:28:05'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:28:11'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:28:18'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:28:32'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:28:44'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 12:28:54'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:29:07'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:29:19'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:29:33'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:29:47'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:29:56'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:30:07'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:30:16'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:30:30'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 12:30:39'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:30:55'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:31:06'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:31:20'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:31:30'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:31:48'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:31:57'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 12:39:17'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 12:40:12'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 12:40:20'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:43:05'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 12:53:27'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 12:53:39'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 01:11:32'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 02:38:02'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 02:40:36'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-26 03:42:09'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 03:42:43'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-26 04:09:29'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-27 09:07:28'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-27 09:08:12'),(0,2,'update','y5_m01',NULL,NULL,'2019-05-27 10:28:49'),(0,2,'create','y5_m01',NULL,NULL,'2019-05-27 10:30:28'),(0,2,'Login','y5_m01',NULL,NULL,'2019-05-28 10:42:27'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-05 06:10:39'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-05 06:17:46'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-05 06:34:14'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-06-05 06:42:07'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-12 10:04:44'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-13 03:26:48'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-14 10:37:52'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-14 10:51:17'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-15 04:19:55'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 04:56:21'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 04:56:55'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 04:57:09'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 04:58:27'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 04:58:38'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:17:15'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:17:51'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:20:16'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:20:17'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 05:20:38'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 05:21:17'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:21:33'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:24:25'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:24:37'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:25:37'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:27:58'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 05:28:51'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 05:31:20'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 05:53:25'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 05:53:45'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 06:20:23'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 06:20:47'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 06:21:13'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 06:21:54'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 06:23:01'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 07:08:11'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 07:08:31'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 07:09:18'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 07:09:45'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 07:18:03'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 07:18:11'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:21:04'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:21:33'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:21:59'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 07:22:36'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:22:55'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:22:55'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:23:09'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:23:09'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:23:21'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:23:21'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:24:05'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 07:25:05'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 07:32:13'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:10:10'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:11:19'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:12:35'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:15:27'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 08:15:36'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:18:16'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 08:18:21'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:18:58'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:19:19'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 08:19:25'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:20:09'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 08:26:58'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 08:27:08'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 09:10:24'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 09:11:56'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 09:12:07'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 09:17:47'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 09:17:57'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 09:19:38'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 09:20:29'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 09:21:01'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 09:21:18'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 09:42:56'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 09:44:21'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 10:23:38'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 10:24:10'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 10:30:19'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 10:33:30'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 10:36:07'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-15 10:46:57'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-15 11:40:33'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-15 11:40:58'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 11:42:05'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 11:43:47'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-15 11:44:11'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-15 11:44:19'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-16 09:56:43'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-16 12:53:40'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-16 12:53:48'),(0,2,'create','y5_m01',NULL,NULL,'2019-06-16 02:25:32'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-16 03:02:56'),(0,2,'delete','y5_m01',NULL,NULL,'2019-06-16 06:30:49'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-16 06:41:14'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-16 07:19:19'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-06-16 07:19:30'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-06-16 07:20:35'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-16 07:20:38'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-17 01:13:21'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-17 10:09:07'),(0,2,'view','y5_m01',NULL,NULL,'2019-06-17 10:15:06'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-29 12:59:38'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-29 01:01:32'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-06-29 01:02:48'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-29 02:20:55'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-29 02:21:57'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-29 02:22:19'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-29 02:28:08'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-29 02:29:24'),(0,2,'update','y5_m01',NULL,NULL,'2019-06-29 06:18:28'),(0,2,'Login','y5_m01',NULL,NULL,'2019-06-30 10:17:19'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-02 07:28:27'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 07:32:05'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 07:32:16'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:32:31'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:35:47'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:36:02'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:36:19'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:47:06'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:47:07'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:53:15'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:53:35'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 07:57:39'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 08:00:31'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 08:02:37'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:01:49'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:03:10'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:20:32'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:24:07'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:26:35'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:36:49'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:37:02'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 09:38:41'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 09:45:35'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 09:45:49'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:48:02'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 09:50:16'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 09:54:22'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 09:54:49'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:04:20'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:04:40'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:05:03'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:05:34'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:06:09'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:06:24'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:06:43'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:07:05'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:08:58'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:09:20'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 10:09:51'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 10:09:59'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 10:10:05'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-02 10:28:32'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:30:45'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:34:57'),(0,2,'delete','y5_m01',NULL,NULL,'2019-07-02 10:37:09'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:37:33'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:38:08'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-02 10:38:45'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 11:01:55'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-07 11:06:34'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 11:10:24'),(0,2,'create','y5_m01',NULL,NULL,'2019-07-07 01:53:41'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 07:55:47'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 07:56:39'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 09:53:18'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-07 09:56:51'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 09:59:53'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-07 10:00:01'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 10:00:11'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-07 10:37:41'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-07 10:44:09'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-08 08:32:31'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-09 10:01:54'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-09 10:11:43'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-09 10:23:09'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-10 09:52:13'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-10 10:22:50'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-10 03:01:46'),(0,2,'view','y5_m01',NULL,NULL,'2019-07-10 04:16:25'),(0,2,'view','y5_m01',NULL,NULL,'2019-07-10 04:16:33'),(0,2,'view','y5_m01',NULL,NULL,'2019-07-10 04:17:01'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-07-10 04:17:11'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-07-10 04:17:30'),(0,2,'view','y5_m01',NULL,NULL,'2019-07-10 04:30:43'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-07-10 04:30:53'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-07-10 04:31:02'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-10 05:03:06'),(0,2,'update','y5_m01',NULL,NULL,'2019-07-10 05:03:46'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-10 09:52:50'),(0,2,'create','y5_m01',NULL,NULL,'2019-07-10 10:13:27'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-11 09:29:53'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-17 09:48:35'),(0,2,'view','y5_m01',NULL,NULL,'2019-07-17 09:55:18'),(0,2,'view','y5_m01',NULL,NULL,'2019-07-17 11:03:17'),(0,2,'update permission','y5_m01',NULL,NULL,'2019-07-17 11:03:33'),(0,2,'view','y5_m01',NULL,NULL,'2019-07-17 11:41:50'),(0,2,'Logout','y5_m01',NULL,NULL,'2019-07-17 11:42:21'),(0,2,'Login','y5_m01',NULL,NULL,'2019-07-18 09:38:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_actual_stock` */

insert  into `tbl_actual_stock`(`id`,`branch_id`,`item_id`,`unit_id`,`qty`,`date`,`cost`,`expected_close`,`end_margin`,`act_unit_id`,`act_qty`,`sub_location_id`) values (14,1,83,2,5,'2019-06-16',NULL,NULL,NULL,NULL,NULL,NULL),(19,1,90,8,5,'2019-06-16',NULL,NULL,NULL,NULL,NULL,NULL),(20,1,91,9,1,'2019-06-16',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_adjustment` */

DROP TABLE IF EXISTS `tbl_adjustment`;

CREATE TABLE `tbl_adjustment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_adjustment` */

insert  into `tbl_adjustment`(`id`,`item_id`,`adjustment_date`,`adjust_qty`,`adjust_type`,`adjust_by`,`reason`,`branch_id`,`unit_id`,`lost_qty`,`damage_qty`,`created_at`,`updated_at`) values (1,83,'2019-06-16 00:00:00',12,NULL,'sineth','test',1,2,2,2,'2019-06-16 19:02:03','2019-06-16 19:02:03'),(2,83,'2019-06-17 00:00:00',15,NULL,'','',1,2,9,2,'2019-06-16 19:06:59','2019-06-16 19:06:59');

/*Table structure for table `tbl_adjustment_date` */

DROP TABLE IF EXISTS `tbl_adjustment_date`;

CREATE TABLE `tbl_adjustment_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adjust_stock_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_adjustment_date` */

insert  into `tbl_adjustment_date`(`id`,`adjust_stock_date`) values (1,'2019-05-26'),(2,'2019-05-26'),(3,'2019-05-26'),(4,'2019-06-16'),(5,'2019-06-16');

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

insert  into `tbl_branch`(`id`,`company_id`,`branch_name`,`description`,`branch_group_id`,`is_delete`,`is_default`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,'Default',NULL,1,0,1,NULL,2,NULL,'2019-05-26 12:20:06');

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

insert  into `tbl_branch_group`(`id`,`branch_group_name`,`branch_group_description`,`is_active`,`is_delete`) values (1,'Group A','description',1,0);

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
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cash_drawer_cash_drawer_group1_idx` (`cash_drawer_group_id`) USING BTREE,
  KEY `fk_cash_drawer_sys_users1_idx` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_cash_drawer` */

insert  into `tbl_cash_drawer`(`id`,`user_id`,`cash_drawer_group_id`,`workshift_id`,`amount_usd`,`amount_khr`,`is_active`,`is_deleted`,`created_at`,`updated_at`) values (1,2,1,1,12,12,1,0,'2019-06-15 21:42:56','2019-06-15 21:44:21'),(2,3,1,1,12,12,1,0,'2019-06-16 14:25:32','2019-06-16 14:25:32');

/*Table structure for table `tbl_cash_drawer_group` */

DROP TABLE IF EXISTS `tbl_cash_drawer_group`;

CREATE TABLE `tbl_cash_drawer_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_cash_drawer_group` */

insert  into `tbl_cash_drawer_group`(`id`,`name`,`description`,`is_active`,`is_delete`,`created_at`,`updated_at`) values (1,'Drawer Cashier Morning','description',1,0,'2019-06-15 21:19:38','2019-06-15 21:21:18');

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `actual_amount` decimal(16,4) DEFAULT NULL,
  `diff_amount` decimal(16,4) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_cash_drawer_transaction_cash_drawer1_idx` (`cash_drawer_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_cash_drawer_transaction` */

insert  into `tbl_cash_drawer_transaction`(`id`,`cash_drawer_id`,`workshift_id`,`open_by`,`close_by`,`open_amount`,`open_date`,`close_amount`,`close_date`,`created_at`,`updated_at`,`actual_amount`,`diff_amount`,`description`) values (1,2,1,3,3,'10.0000','2019-06-16 14:56:39','20.0000','2019-06-16 14:56:45','2019-06-16 14:56:39','2019-06-16 14:56:45','30.0000','0.0000',''),(2,1,1,2,NULL,'200.0000','2019-07-09 10:10:05',NULL,NULL,'2019-07-09 10:10:05',NULL,NULL,NULL,NULL),(3,1,1,2,2,'0.0000','2019-07-17 21:47:00','10.0000','2019-07-17 21:47:06','2019-07-17 21:47:00','2019-07-17 21:47:06','10.0000','0.0000','dsad'),(4,1,1,2,2,'0.0000','2019-07-17 21:47:28','10.0000','2019-07-17 21:47:34','2019-07-17 21:47:28','2019-07-17 21:47:34','20.0000','0.0000','adf');

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

insert  into `tbl_company`(`id`,`company_kh`,`company_en`,`image`,`address`,`description`,`website`,`phone`,`email`,`created_at`,`updated_at`) values (1,'General','General','26-May-2019/logo.png','','','','','',NULL,'2019-05-26 16:09:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`id`,`customer_group_id`,`customer_type_id`,`group_invoice_due_id`,`name`,`phone`,`email`,`address`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_default`,`is_delete`) values (1,1,1,NULL,'General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0),(2,1,0,NULL,'Muyly','016759927','','','2019-07-07 13:53:41',2,'2019-07-07 13:53:41',NULL,0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_group_role` */

insert  into `tbl_group_role`(`id`,`name`,`group_id`,`remark`,`is_alert_email`,`is_alert_system`,`is_active`) values (7,'Admin Role',1,'',1,1,1),(8,'Accountant Role',4,'',0,0,1),(9,'Cashier Role',2,'',0,0,1),(10,'Service Order Role',3,'',0,0,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9518 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_group_role_detail` */

insert  into `tbl_group_role_detail`(`id`,`group_role_id`,`menu_code`,`parent_menu_id`,`menu_id`,`read`,`write`) values (7511,8,'y5_m01',0,1,1,1),(7512,8,'y5_m02',0,2,1,1),(7513,8,'y5_m09',0,3,1,1),(7514,8,'y5_m10',0,4,1,1),(7515,8,'y5_s25',4,7,1,1),(7516,8,'y5_s26',4,8,1,1),(7517,8,'y5_s24',4,6,1,1),(7518,8,'y5_m26',0,90,1,1),(7519,8,'y5_s97',90,92,1,1),(7520,8,'y5_s96',90,91,1,1),(7521,8,'y5_m11',0,5,1,1),(7522,8,'y5_s27',5,9,1,1),(7523,8,'y5_s43',5,10,1,1),(7524,8,'y5_s42',5,29,1,1),(7525,8,'y5_m18',0,37,1,1),(7526,8,'y5_s37',37,24,1,1),(7527,8,'y5_s52',37,39,1,1),(7528,8,'y5_s89',37,83,1,1),(7529,8,'y5_s95',37,89,1,1),(7530,8,'y5_s53',37,40,1,1),(7531,8,'y5_m21',0,48,1,1),(7532,8,'y5_s59',48,49,1,1),(7533,8,'y5_m16',0,15,1,1),(7534,8,'y5_s66',15,56,1,1),(7535,8,'y5_s93',15,87,1,1),(7536,8,'y5_s70',15,60,1,1),(7537,8,'y5_s30',15,16,1,1),(7538,8,'y5_s33',15,19,1,1),(7539,8,'y5_s67',15,57,1,1),(7540,8,'y5_s65',15,55,1,1),(7541,8,'y5_s68',15,58,1,1),(7542,8,'y5_m24',0,76,1,1),(7543,8,'y5_s84',76,77,1,1),(7544,8,'y5_s85',76,78,1,1),(7545,8,'y5_m19',0,41,1,1),(7546,8,'y5_s54',41,42,1,1),(7547,8,'y5_m22',0,62,1,1),(7548,8,'y5_s72',62,63,1,1),(7549,8,'y5_s75',62,66,1,1),(7550,8,'y5_s73',62,64,1,1),(7551,8,'y5_s76',62,67,1,1),(7552,8,'y5_s74',62,65,1,1),(7553,8,'y5_m17',0,21,1,1),(7554,8,'y5_s38',21,25,1,1),(7555,8,'y5_s39',21,26,1,1),(7556,8,'y5_s77',21,68,1,1),(7557,8,'y5_m25',0,79,1,1),(7558,8,'y5_s86',79,80,1,1),(7559,8,'y5_m20',0,44,1,1),(7560,8,'y5_s31',44,17,1,1),(7561,8,'y5_s57',44,46,1,1),(7562,8,'y5_s58',44,47,1,1),(7563,8,'y5_m15',0,12,1,1),(7564,8,'y5_s94',12,88,1,1),(7565,8,'y5_s28',12,13,1,1),(7566,8,'y5_s50',12,36,1,1),(7567,8,'y5_s45',12,31,1,1),(7568,8,'y5_s71',12,61,1,1),(7569,8,'y5_s48',12,34,1,1),(7570,8,'y5_s36',12,23,1,1),(7571,8,'y5_s51',12,38,1,1),(7572,8,'y5_s46',12,32,1,1),(7573,8,'y5_s82',12,74,1,1),(7574,8,'y5_s49',12,35,1,1),(7575,8,'y5_s79',12,70,1,1),(7576,8,'y5_s44',12,30,1,1),(7577,8,'y5_s60',12,50,1,1),(7578,8,'y5_s47',12,33,1,1),(7579,8,'y5_s83',12,75,1,1),(7580,8,'y5_m23',0,71,1,1),(9438,7,'y5_m31',0,107,1,1),(9439,7,'y5_s108',107,105,1,1),(9440,7,'y5_s112',107,110,1,1),(9441,7,'y5_s106',107,103,1,1),(9442,7,'y5_s110',107,108,1,1),(9443,7,'y5_s107',107,104,1,1),(9444,7,'y5_s111',107,109,1,1),(9445,7,'y5_m30',0,99,1,1),(9446,7,'y5_s104',99,100,1,1),(9447,7,'y5_m01',0,1,1,1),(9448,7,'y5_m22',0,62,1,1),(9449,7,'y5_s72',62,63,1,1),(9450,7,'y5_s73',62,64,1,1),(9451,7,'y5_s75',62,66,1,1),(9452,7,'y5_s74',62,65,1,1),(9453,7,'y5_s109',62,106,1,1),(9454,7,'y5_s113',62,111,1,1),(9455,7,'y5_s100',62,117,1,1),(9456,7,'y5_s114',62,112,1,1),(9457,7,'y5_s102',62,97,1,1),(9458,7,'y5_s76',62,67,1,1),(9459,7,'y5_s101',62,96,1,1),(9460,7,'y5_m20',0,44,1,1),(9461,7,'y5_s31',44,17,1,1),(9462,7,'y5_s57',44,46,1,1),(9463,7,'y5_s58',44,47,1,1),(9464,7,'y5_s100',44,113,1,1),(9465,7,'y5_s101',44,114,1,1),(9466,7,'y5_m02',0,2,1,1),(9467,7,'y5_m19',0,41,1,1),(9468,7,'y5_s54',41,42,1,1),(9469,7,'y5_m18',0,37,1,1),(9470,7,'y5_s36',37,23,1,1),(9471,7,'y5_s94',37,88,1,1),(9472,7,'y5_s37',37,24,1,1),(9473,7,'y5_s95',37,89,1,1),(9474,7,'y5_s83',37,75,1,1),(9475,7,'y5_s71',37,61,1,1),(9476,7,'y5_s51',37,38,1,1),(9477,7,'y5_s99',37,94,1,1),(9478,7,'y5_s52',37,39,1,1),(9479,7,'y5_s53',37,40,1,1),(9480,7,'y5_s100',37,95,1,1),(9481,7,'y5_m10',0,4,1,1),(9482,7,'y5_s24',4,6,1,1),(9483,7,'y5_s25',4,7,1,1),(9484,7,'y5_s26',4,8,1,1),(9485,7,'y5_m15',0,12,1,1),(9486,7,'y5_s79',12,70,1,1),(9487,7,'y5_s46',12,32,1,1),(9488,7,'y5_s49',12,35,1,1),(9489,7,'y5_s44',12,30,1,1),(9490,7,'y5_s47',12,33,1,1),(9491,7,'y5_s50',12,36,1,1),(9492,7,'y5_s45',12,31,1,1),(9493,7,'y5_s48',12,34,1,1),(9494,7,'y5_m26',0,90,1,1),(9495,7,'y5_s97',90,92,1,1),(9496,7,'y5_m11',0,5,1,1),(9497,7,'y5_s39',5,26,1,1),(9498,7,'y5_s82',5,74,1,1),(9499,7,'y5_s43',5,10,1,1),(9500,7,'y5_s42',5,29,1,1),(9501,7,'y5_s98',5,93,1,1),(9502,7,'y5_s28',5,13,1,1),(9503,7,'y5_s60',5,50,1,1),(9504,7,'y5_m21',0,48,1,1),(9505,7,'y5_s59',48,49,1,1),(9506,7,'y5_m23',0,71,1,1),(9507,7,'y5_m09',0,3,1,1),(9508,7,'y5_m17',0,21,1,1),(9509,7,'y5_s77',21,68,1,1),(9510,7,'y5_m16',0,15,1,1),(9511,7,'y5_s93',15,87,1,1),(9512,7,'y5_s102',15,115,1,1),(9513,7,'y5_s103',15,116,1,1),(9514,7,'y5_s105',15,102,1,1),(9515,7,'y5_s70',15,60,1,1),(9516,7,'y5_s86',15,80,1,1),(9517,7,'y5_s85',15,78,1,1);

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

insert  into `tbl_invoice_sequence`(`id`,`sequence_no`) values (1,23);

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
  `item_size_id` int(4) NOT NULL DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item` */

insert  into `tbl_item`(`id`,`item_code`,`item_barcode`,`image`,`net_price`,`item_category_id`,`item_sub_category_id`,`item_type_id`,`item_status_id`,`item_size_id`,`name`,`alias`,`qty`,`cost`,`price`,`default_currency`,`default_unit`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_active`,`is_delete`) values (1,'0022','0022','02-Jul-2019/burger.png',4.5000,1,1,1,1,1,'Pull Pork Burger','Pull Pork Burger',1.0000,4.500,4.500,NULL,2,'2019-05-26 12:53:27',2,'2019-07-02 22:34:57',2,1,0),(2,'002','005','',4.5000,1,1,1,1,1,'Beef Burger','Beef Burger',1.0000,4.500,4.500,NULL,9,'2019-05-26 14:31:39',2,'2019-07-02 22:37:09',2,0,1),(3,'B001','B001',NULL,4.0000,5,0,1,1,3,'Fresh fruit Pancake ','Fresh fruit Pancake recipe ',0.0000,4.000,4.000,NULL,9,'2019-05-27 22:14:58',2,'2019-05-27 22:14:58',0,1,0),(4,'B002','B002',NULL,3.0000,5,0,1,1,3,'Omletel ( Vegetable or Bacon )','Omletel ( Vegetable or Bacon )',0.0000,3.000,3.000,NULL,9,'2019-05-27 22:17:38',2,'2019-05-27 22:17:38',0,1,0),(5,'B003','B003',NULL,4.0000,5,34,1,1,3,'Scrumble egg','Scrumble egg',0.0000,4.000,4.000,NULL,9,'2019-05-27 22:19:18',2,'2019-05-27 22:19:18',0,1,0),(6,'B004','B004',NULL,6.5000,5,34,1,1,3,'Western Breakfast ','Western Breakfast ',0.0000,6.500,6.500,NULL,9,'2019-05-27 22:20:16',2,'2019-05-27 22:20:16',0,1,0),(7,'B007','B007',NULL,4.0000,5,34,1,1,3,'Dip Fried Chicken Leg','Dip Fried Chicken Leg',0.0000,4.000,4.000,NULL,9,'2019-05-27 22:21:15',2,'2019-05-27 22:21:15',0,1,0),(8,'B008','B008',NULL,3.0000,5,34,1,1,3,'Vegetarain','Vegetarain',0.0000,3.000,3.000,NULL,9,'2019-05-27 22:22:15',2,'2019-05-27 22:22:15',0,1,0),(9,'B005','B005',NULL,6.0000,5,34,1,1,3,'79 Breakfast','79 Breakfast',0.0000,6.000,6.000,NULL,9,'2019-05-27 22:23:29',2,'2019-05-27 22:23:29',0,1,0),(10,'B009','B009',NULL,3.5000,5,34,1,1,3,'Fried Rice Vegetarain','Fried Rice Vegetarian ',0.0000,3.500,3.500,NULL,9,'2019-05-27 22:24:34',2,'2019-05-27 22:24:34',0,1,0),(11,'S001','S001',NULL,3.0000,5,34,1,1,3,'Spring Roll Vegatable','Spring Roll Vegatable',0.0000,3.000,3.000,NULL,9,'2019-05-27 22:25:57',2,'2019-05-27 22:25:57',0,1,0),(12,'S002','S002',NULL,3.5000,1,4,1,1,3,'Spring Roll Chicken','Spring Roll Chicken',0.0000,3.500,3.500,NULL,9,'2019-05-27 22:27:22',2,'2019-05-27 22:27:22',0,1,0),(13,'S003','S003',NULL,4.0000,1,4,1,1,3,'Fried Calamari','Fried Calamari',0.0000,4.000,4.000,NULL,9,'2019-05-27 22:28:14',2,'2019-05-27 22:28:14',0,1,0),(14,'S004','S004',NULL,4.5000,1,4,1,1,3,'Prawn Calamari','Prawn Calamari',0.0000,4.540,4.500,NULL,9,'2019-05-27 22:29:11',2,'2019-05-27 22:29:11',0,1,0),(15,'S005','S005',NULL,1.5000,1,4,1,1,3,'French Fried','French Fried',0.0000,1.500,1.500,NULL,9,'2019-05-27 22:30:18',2,'2019-05-27 22:30:18',0,1,0),(16,'Sa001','Sa001',NULL,5.0000,1,0,1,1,3,'NIcoise Salad','NIcoise Salad',0.0000,5.000,5.000,NULL,9,'2019-05-27 22:32:02',2,'2019-05-27 22:32:02',0,1,0),(17,'Sa002','Sa002',NULL,5.0000,1,5,1,1,3,'Caesar Salad','Caesar Salad',0.0000,5.000,5.000,NULL,9,'2019-05-27 22:33:18',2,'2019-05-27 22:33:18',0,1,0),(18,'Sa003','Sa003',NULL,4.5000,1,5,1,1,3,'Warm Baby Potato salad','Warm Baby Potato salad',0.0000,4.500,4.500,NULL,9,'2019-05-27 22:35:57',2,'2019-05-27 22:35:57',0,1,0),(19,'Sa004','Sa004',NULL,6.5000,1,5,1,1,3,'Carpaccio Salad','Carpaccio Salad',0.0000,6.500,6.500,NULL,9,'2019-05-27 22:36:49',2,'2019-05-27 22:36:49',0,1,0),(20,'Sw001','Sw001',NULL,4.0000,1,7,1,1,3,'Chicken Sandwich','Chicken Sandwich',0.0000,4.000,4.000,NULL,9,'2019-05-27 22:38:21',2,'2019-05-27 22:38:21',0,1,0),(21,'Sw002','Sw002',NULL,4.5000,1,7,1,1,3,'Beef Sandwich ','Beef Sandwich ',0.0000,4.500,4.500,NULL,9,'2019-05-27 22:39:19',2,'2019-05-27 22:39:19',0,1,0),(22,'Sw003','Sw003',NULL,3.5000,1,0,1,1,3,'Veggies Sandwich','Veggies Sandwich',0.0000,3.500,3.500,NULL,9,'2019-05-27 22:40:25',2,'2019-05-27 22:40:25',0,1,0),(23,'Bg001','Bg001','02-Jul-2019/beef-burger.png',4.5000,1,1,1,1,3,'Beef Buger','Beef Buger',1.0000,4.500,4.500,NULL,9,'2019-05-27 22:44:10',2,'2019-07-02 22:37:33',2,1,0),(24,'Bg002','Bg002','02-Jul-2019/beef-burger.png',4.0000,1,1,1,1,3,'Chicken burger','Chicken burger',1.0000,4.000,4.000,NULL,9,'2019-05-27 22:45:06',2,'2019-07-02 22:38:08',2,1,0),(25,'Bg003','Bg003','02-Jul-2019/burger.png',3.5000,1,1,1,1,3,'Veggi Burger','Veggi Burger',1.0000,3.500,3.500,NULL,9,'2019-05-27 22:45:54',2,'2019-07-02 22:38:45',2,1,0),(26,'Pt001','Pt001',NULL,4.5000,1,23,1,1,3,'Panne Arrabbiata','Panne Arrabbiata',0.0000,4.500,4.500,NULL,9,'2019-05-27 22:46:41',2,'2019-05-27 22:46:41',0,1,0),(27,'Pt002','Pt002',NULL,3.5000,1,23,1,1,3,'Spagghetti Aglio olio','Spagghetti Aglio olio',0.0000,3.500,3.500,NULL,9,'2019-05-27 22:47:27',2,'2019-05-27 22:47:27',0,1,0),(28,'Pt003','Pt003',NULL,7.0000,1,23,1,1,3,'Spagghetti Seafoods','Spagghetti Seafoods',0.0000,7.000,7.000,NULL,9,'2019-05-27 22:48:15',2,'2019-05-27 22:48:15',0,1,0),(29,'Pt004','Pt004',NULL,6.5000,1,23,1,1,3,'Spagghetti carbonara','Spagghetti carbonara',0.0000,6.500,6.500,NULL,9,'2019-05-27 22:49:08',2,'2019-05-27 22:49:08',0,1,0),(30,'Pt005','Pt005',NULL,6.5000,1,23,1,1,3,'Spagghetti bolognese','Spagghetti bolognese',0.0000,6.500,6.500,NULL,9,'2019-05-27 22:50:10',2,'2019-05-27 22:50:10',0,1,0),(31,'Pt006','Pt006',NULL,5.5000,1,23,1,1,3,'Fusili Broccolli','Fusili Broccolli',0.0000,5.500,5.500,NULL,9,'2019-05-27 22:51:07',2,'2019-05-27 22:51:07',0,1,0),(32,'Pz001','Pz001',NULL,10.0000,7,0,1,1,3,'Seafood Pizza','Seafood Pizza',0.0000,10.000,10.000,NULL,9,'2019-05-27 22:52:11',2,'2019-05-27 22:52:11',0,1,0),(33,'Pz002','Pz002',NULL,7.0000,7,36,1,1,3,'pepperoni','pepperoni',0.0000,7.000,7.000,NULL,9,'2019-05-27 22:52:54',2,'2019-05-27 22:52:54',0,1,0),(34,'Pz003','Pz003',NULL,8.5000,7,36,1,1,3,'Ham & Mushroom','Ham & Mushroom',0.0000,8.500,8.500,NULL,9,'2019-05-27 22:53:49',2,'2019-05-27 22:53:49',0,1,0),(35,'Pz004','Pz004',NULL,8.0000,7,36,1,1,3,'Hawaii','Hawaii',0.0000,8.000,8.000,NULL,9,'2019-05-27 22:54:28',2,'2019-05-27 22:54:28',0,1,0),(36,'Pz005','Pz005',NULL,8.5000,8,37,1,1,3,'Calzon','Calzon',0.0000,8.500,8.500,NULL,9,'2019-05-27 22:55:13',2,'2019-05-27 22:55:13',0,1,0),(37,'Pz006','Pz006',NULL,7.5000,7,36,1,1,3,'Amatriciana','Amatriciana',0.0000,7.500,7.500,NULL,9,'2019-05-27 22:56:11',2,'2019-05-27 22:56:11',0,1,0),(38,'Pz007','Pz007',NULL,7.5000,7,36,1,1,3,'Veggi','Veggi',0.0000,7.500,7.500,NULL,9,'2019-05-27 22:56:49',2,'2019-05-27 22:56:49',0,1,0),(39,'Pz008','Pz008',NULL,6.0000,7,36,1,1,3,'Magrherita','Magrherita',0.0000,6.000,6.000,NULL,9,'2019-05-27 22:58:07',2,'2019-05-27 22:58:07',0,1,0),(40,'St001','St001',NULL,17.0000,1,2,2,1,3,'Tenderloin','Tenderloin',0.0000,17.000,17.000,NULL,9,'2019-05-29 18:56:04',2,'2019-05-29 18:56:04',0,1,0),(41,'St002','St002',NULL,15.0000,1,2,2,1,3,'Rib Eye','Rib Eye',0.0000,15.000,15.000,NULL,9,'2019-05-29 18:56:51',2,'2019-05-29 18:56:51',0,1,0),(42,'St003','St003',NULL,8.5000,1,2,2,1,3,'Pork Chop','Rib Eye',0.0000,8.500,8.500,NULL,9,'2019-05-29 19:01:53',2,'2019-05-29 19:01:53',0,1,0),(43,'St004','St004',NULL,8.0000,1,2,2,1,3,'chicken Breast','chicken Breast',0.0000,8.000,8.000,NULL,9,'2019-05-29 19:02:56',2,'2019-05-29 19:02:56',0,1,0),(44,'St005','St005',NULL,10.0000,1,2,2,1,3,'Seabass','Seabass',0.0000,10.000,10.000,NULL,9,'2019-05-29 19:04:40',2,'2019-05-29 19:04:40',0,1,0),(45,'St006','St006',NULL,15.0000,1,2,2,1,3,'Salmon Steak','Salmon Steak',0.0000,15.000,15.000,NULL,9,'2019-05-29 19:05:33',2,'2019-05-29 19:05:33',0,1,0),(46,'Af 001','Af 001',NULL,4.0000,1,12,1,1,3,'A mok','A mok',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:07:48',2,'2019-05-29 19:07:48',0,1,0),(47,'Af 002','Af 002',NULL,4.0000,1,12,1,1,3,'Khmer Red Curry ','Khmer Red Curry ',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:08:49',2,'2019-05-29 19:08:49',0,1,0),(48,'Af 003','Af 003',NULL,4.5000,1,12,1,1,3,'Lok Lak ( beef or seaood )','Lok Lak ( beef or seaood )',0.0000,4.500,4.500,NULL,9,'2019-05-29 19:09:39',2,'2019-05-29 19:09:39',0,1,0),(49,'Af 004','Af 004',NULL,4.0000,1,12,1,1,3,'Lok Lak  ( Pork & chicken )','Lok Lak  ( Pork & chicken )',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:11:42',2,'2019-05-29 19:11:42',0,1,0),(50,'Af 005','Af 005',NULL,4.0000,1,12,1,1,3,'79 Fried rice ( Beef or Seafood )','79 Fried rice ( Beef or Seafood )',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:14:38',2,'2019-05-29 19:14:38',0,1,0),(51,'Af 006','Af 006',NULL,3.5000,1,12,1,1,3,'79 Fried rice ( Chicken or Pork )','79 Fried rice ( Chicken or Pork ',0.0000,3.500,3.500,NULL,9,'2019-05-29 19:15:40',2,'2019-05-29 19:15:40',0,1,0),(52,'Af 007','Af 007',NULL,4.5000,1,10,1,1,3,'Carpik Fried Rice ( Beef or seafood )','Carpik Fried Rice ( Beef or seafood )',0.0000,4.500,4.500,NULL,9,'2019-05-29 19:18:10',2,'2019-05-29 19:18:10',0,1,0),(53,'Af 008','Af 008',NULL,4.0000,1,12,1,1,3,'Pad Thai','Pad Thai',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:20:32',2,'2019-05-29 19:20:32',0,1,0),(54,'Af 010','Af 010',NULL,4.0000,1,12,1,1,3,'Yam Wunsen','Yam Wunsen',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:24:00',2,'2019-05-29 19:24:00',0,1,0),(55,'Af 011','Af 011',NULL,4.0000,1,12,1,1,3,'Pork rib Sweet & Sour','Pork rib Sweet & Sou',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:38:05',2,'2019-05-29 19:38:05',0,1,0),(56,'Af 012','Af 012',NULL,4.0000,1,12,1,1,3,'Larb','Larb',0.0000,4.000,4.000,NULL,9,'2019-05-29 19:47:51',2,'2019-05-29 19:47:51',0,1,0),(57,'So001','So001',NULL,3.0000,1,6,1,1,3,'Mushroom Soup','Mushroom Soup',0.0000,3.000,3.000,NULL,9,'2019-05-29 19:49:28',2,'2019-05-29 19:49:28',0,1,0),(58,'Su002','Su002',NULL,3.0000,1,5,1,1,3,'Pumpkin Soup','Pumpkin Soup',0.0000,3.000,3.000,NULL,9,'2019-05-29 19:51:38',2,'2019-05-29 19:51:38',0,1,0),(59,'Su003','Su003',NULL,5.0000,1,10,1,2,3,'Seafood Soup','Seafood Soup',0.0000,5.000,5.000,NULL,9,'2019-05-29 19:54:53',2,'2019-05-29 19:54:53',0,1,0),(60,'Su004','Su004',NULL,4.5000,1,6,1,1,3,'Tom Yam Soup','Tom Yam Soup',0.0000,4.500,4.500,NULL,9,'2019-05-29 19:57:02',2,'2019-05-29 19:57:02',0,1,0),(61,'Ds001','Ds001',NULL,3.5000,1,8,1,1,3,'Sweet sticky Rice with yellow Mango','Sweet sticky Rice with yellow Mango',0.0000,3.500,3.500,NULL,9,'2019-05-29 20:00:02',2,'2019-05-29 20:00:02',0,1,0),(62,'Ds002','Ds002',NULL,3.0000,8,37,1,1,3,'Chhessnut Cambodia','Chhessnut Cambodia',0.0000,3.000,3.000,NULL,9,'2019-05-29 20:01:17',2,'2019-05-29 20:01:17',0,1,0),(63,'Ds003','Ds003',NULL,3.0000,8,37,1,1,3,'Tiramisu','Tiramisu',0.0000,3.000,3.000,NULL,9,'2019-05-29 20:03:56',2,'2019-05-29 20:03:56',0,1,0),(64,'Ds004','Ds004',NULL,3.0000,8,37,1,1,3,'Passion Mousse','Passion Mousse',0.0000,3.000,3.000,NULL,9,'2019-05-29 20:04:41',2,'2019-05-29 20:04:41',0,1,0),(65,'Ds005','Ds005',NULL,3.0000,8,0,1,1,3,'Fresh Fruits','Fresh Fruits',0.0000,3.000,3.000,NULL,9,'2019-05-29 20:05:27',2,'2019-05-29 20:05:27',0,1,0),(66,'Bv001','Bv001',NULL,1.0000,2,14,1,1,3,'Coca Cola','Coca Cola',0.0000,1.000,1.000,NULL,4,'2019-05-29 20:07:12',2,'2019-05-29 20:07:12',0,1,0),(67,'Bv002','Bv002',NULL,1.0000,2,14,1,1,3,'Sprits','Sprits',0.0000,1.000,1.000,NULL,4,'2019-05-29 20:07:50',2,'2019-05-29 20:07:50',0,1,0),(68,'Bv003','Bv003',NULL,1.0000,2,14,1,1,3,'7 UP','7 UP',0.0000,1.000,1.000,NULL,4,'2019-05-29 20:08:36',2,'2019-05-29 20:08:36',0,1,0),(69,'Bv004','Bv004',NULL,1.0000,2,14,1,1,3,'Red Bull','Red Bull',0.0000,1.000,1.000,NULL,4,'2019-05-29 20:09:16',2,'2019-05-29 20:09:16',0,1,0),(70,'Bv005','Bv005',NULL,1.0000,2,0,1,1,3,'Ize cola','Ize cola',0.0000,1.000,1.000,NULL,3,'2019-05-29 20:10:03',2,'2019-05-29 20:10:03',0,1,0),(71,'Bv006','Bv006',NULL,1.2500,2,14,1,1,3,'Soda Water','Soda Water',0.0000,1.250,1.250,NULL,4,'2019-05-29 20:11:40',2,'2019-05-29 20:11:40',0,1,0),(72,'Bv007','Bv007',NULL,1.2500,2,14,1,1,3,'Tonic Water','Tonic Water',0.0000,1.250,1.250,NULL,9,'2019-05-29 20:12:54',2,'2019-05-29 20:12:54',0,1,0),(73,'W001','W001',NULL,0.7500,2,15,1,1,1,'Kulen','Kulen',0.0000,0.750,0.750,NULL,2,'2019-05-29 20:14:19',2,'2019-05-29 20:14:19',0,1,0),(74,'W002','W002',NULL,2.0000,2,15,1,1,2,'Kulen','Kulen',0.0000,2.000,2.000,NULL,2,'2019-05-29 20:15:17',2,'2019-05-29 20:15:17',0,1,0),(75,'Be001','Be001',NULL,3.0000,3,24,1,1,3,'Corona','Corona',0.0000,3.000,3.000,NULL,2,'2019-05-29 20:16:13',2,'2019-05-29 20:16:13',0,1,0),(76,'Be002','Be002',NULL,3.0000,3,24,1,1,3,'Tiger','Tiger',0.0000,3.000,3.000,NULL,2,'2019-05-29 20:17:15',2,'2019-05-29 20:17:15',0,1,0),(77,'Be003','Be003',NULL,3.0000,3,24,1,1,3,'Tiger Crystral','Tiger Crystral',0.0000,3.000,3.000,NULL,2,'2019-05-29 20:21:59',2,'2019-05-29 20:21:59',0,1,0),(78,'Be004','Be004',NULL,2.5000,3,0,1,1,3,'Angkor ','Angkor ',0.0000,2.500,2.500,NULL,2,'2019-05-29 20:22:42',2,'2019-05-29 20:22:42',0,1,0),(79,'Bee005','Bee005',NULL,3.0000,3,24,1,1,3,'ABC','ABC',0.0000,3.000,3.000,NULL,4,'2019-05-29 20:23:14',2,'2019-05-29 20:23:14',0,1,0),(80,'Be006','Be006',NULL,2.5000,3,24,1,1,3,'Cambodia','Cambodia',0.0000,2.500,2.500,NULL,2,'2019-05-29 20:24:12',2,'2019-05-29 20:24:12',0,1,0),(81,'Be007','Be007',NULL,1.0000,3,24,1,1,3,'Cambodia Draft','Cambodia Draft',0.0000,1.000,1.000,NULL,8,'2019-05-29 20:25:00',2,'2019-05-29 20:25:00',0,1,0),(82,'Be008','Be008',NULL,3.0000,3,24,1,1,2,'Cambodia Draft 1L ','Cambodia Draft 1L',0.0000,3.000,3.000,NULL,8,'2019-05-29 20:25:57',2,'2019-05-29 20:25:57',0,1,0),(83,'Be009','Be009','',9.0000,3,24,1,1,3,'Cambodia Draft 3L ','Cambodia Draft 3L ',1.0000,9.000,9.000,NULL,8,'2019-05-29 20:26:54',2,'2019-06-16 18:41:14',2,1,0),(84,'Ju001','Ju001',NULL,3.0000,2,19,1,1,3,'Watermelon','Watermelon',0.0000,3.000,3.000,NULL,8,'2019-05-29 20:28:05',2,'2019-05-29 20:28:05',0,1,0),(85,'Ju002','Ju002',NULL,3.0000,2,19,1,1,3,'Orange','Orange',0.0000,3.000,3.000,NULL,8,'2019-05-29 20:29:24',2,'2019-05-29 20:29:24',0,1,0),(86,'Ju003','Ju003',NULL,3.0000,2,19,1,1,3,'Pineapple','Pineapple',0.0000,3.000,3.000,NULL,8,'2019-05-29 20:31:06',2,'2019-05-29 20:31:06',0,1,0),(87,'Ju004','Ju004',NULL,3.0000,2,19,1,1,3,'Carrot','Carrot',0.0000,3.000,3.000,NULL,8,'2019-05-29 20:32:04',2,'2019-05-29 20:32:04',0,1,0),(88,'Ju005','Ju005',NULL,3.0000,2,19,1,1,3,'Apple','Apple',0.0000,3.000,3.000,NULL,8,'2019-05-29 20:34:37',2,'2019-05-29 20:34:37',0,1,0),(89,'Ju006','Ju006',NULL,2.0000,2,19,1,1,3,'Fresh Coconut','Fresh Coconut',0.0000,2.000,2.000,NULL,8,'2019-05-29 20:35:31',2,'2019-05-29 20:35:31',0,1,0),(90,'Ct001','Ct001','',4.0000,2,11,1,1,1,'Blue Margarita','Blue Margarita',1.0000,4.000,4.000,NULL,8,'2019-05-29 21:26:34',2,'2019-06-15 22:33:30',2,1,0),(91,'Ct002','Ct002','',8.0000,2,11,1,1,2,'Blue Margarita','Blue Margarita',0.0000,8.000,8.000,NULL,8,'2019-05-29 21:27:12',2,'2019-06-15 22:23:38',2,1,0),(92,'Ct003','Ct003',NULL,3.0000,2,11,1,1,1,'Cuber Libre','Cuber Libre',0.0000,3.000,3.000,NULL,8,'2019-05-29 21:27:58',2,'2019-05-29 21:27:58',0,1,0),(93,'Ct004','Ct004',NULL,8.0000,2,11,1,1,2,'Cuber Libre','Cuber Libre',0.0000,8.000,8.000,NULL,8,'2019-05-29 21:29:19',2,'2019-05-29 21:29:19',0,1,0),(94,'Ct005','Ct005',NULL,4.0000,2,11,1,1,1,'Cucumber & Basil Mojito','Cucumber & Basil Mojito',0.0000,4.000,4.000,NULL,8,'2019-05-29 21:30:09',2,'2019-05-29 21:30:09',0,1,0),(95,'Ct006','Ct006',NULL,8.0000,2,11,1,1,2,'Cucumber & Basil Mojito','Cucumber & Basil Mojito',0.0000,8.000,8.000,NULL,8,'2019-05-29 21:30:47',2,'2019-05-29 21:30:47',0,1,0),(96,'Ct007','Ct007',NULL,4.0000,2,11,1,1,1,'Epresso Martini','Epresso Martini',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:16:48',2,'2019-05-30 18:16:48',0,1,0),(97,'Ct008','Ct008',NULL,8.0000,2,11,1,1,2,'Epresso Martini','Epresso Martini',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:17:23',2,'2019-05-30 18:17:23',0,1,0),(98,'Ct009','Ct009',NULL,4.0000,2,11,1,1,1,'Long I\'s Land','Long I\'s Land',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:18:02',2,'2019-05-30 18:18:02',0,1,0),(99,'Ct010','Ct010',NULL,8.0000,2,11,1,1,2,'Long I\'s Land','Long I\'s Land',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:18:37',2,'2019-05-30 18:18:37',0,1,0),(100,'Ct011','Ct011',NULL,4.0000,2,11,1,1,1,'Lychee Capiorsca','Lychee Capiorsca',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:19:23',2,'2019-05-30 18:19:23',0,1,0),(101,'Ct012','Ct012',NULL,8.0000,2,11,1,1,2,'Lychee Capiorsca','Lychee Capiorsca',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:19:52',2,'2019-05-30 18:19:52',0,1,0),(102,'Ct013','Ct013',NULL,4.0000,2,11,1,1,1,'Magarita classic','Magarita classic',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:20:39',2,'2019-05-30 18:20:39',0,1,0),(103,'Ct014','Ct014',NULL,8.0000,2,11,1,1,2,'Magarita classic','Magarita classic',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:21:04',2,'2019-05-30 18:21:04',0,1,0),(104,'Ct015','Ct015',NULL,4.0000,2,11,1,1,1,'Mai Tai','Mai Tai',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:21:53',2,'2019-05-30 18:21:53',0,1,0),(105,'Ct016','Ct016',NULL,8.0000,2,11,1,1,2,'Mai Tai','Mai Tai',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:22:28',2,'2019-05-30 18:22:28',0,1,0),(106,'Ct017','Ct017',NULL,4.0000,2,11,1,1,1,'Negroni','Negroni',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:23:07',2,'2019-05-30 18:23:07',0,1,0),(107,'Ct018','Ct018',NULL,8.0000,2,11,1,1,2,'Negroni','Negroni',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:23:42',2,'2019-05-30 18:23:42',0,1,0),(108,'Ct019','Ct019',NULL,4.0000,2,11,1,1,1,'Passion Margarita','Passion Margarita',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:24:28',2,'2019-05-30 18:24:28',0,1,0),(109,'Ct020','Ct020',NULL,8.0000,2,11,1,1,2,'Passion Margarita','Passion Margarita',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:25:20',2,'2019-05-30 18:25:20',0,1,0),(110,'Ct021','Ct021',NULL,4.0000,2,11,1,1,1,'PinaColada','PinaColada',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:26:05',2,'2019-05-30 18:26:05',0,1,0),(111,'Ct022','Ct022',NULL,8.0000,2,11,1,1,2,'PinaColada','PinaColada',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:26:29',2,'2019-05-30 18:26:29',0,1,0),(112,'Ct023','Ct023',NULL,4.0000,2,11,1,1,1,'Sex on the Beach','Sex on the Beach',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:27:12',2,'2019-05-30 18:27:12',0,1,0),(113,'Ct024','Ct024',NULL,8.0000,2,11,1,1,1,'Sex on the Beach','Sex on the Beach',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:29:30',2,'2019-05-30 18:29:30',0,1,0),(114,'Ct025','Ct025',NULL,4.0000,2,11,1,1,1,'Pajita','Pajita',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:30:08',2,'2019-05-30 18:30:08',0,1,0),(115,'Ct026','Ct026',NULL,8.0000,2,11,1,1,2,'Pajita','Pajita',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:30:43',2,'2019-05-30 18:30:43',0,1,0),(116,'Ct027','Ct027',NULL,4.0000,2,11,1,1,1,'Sangria ','Sangria ',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:31:25',2,'2019-05-30 18:31:25',0,1,0),(117,'Ct028','Ct028',NULL,8.0000,2,11,1,1,2,'Sangria ','Sangria ',0.0000,8.000,8.000,NULL,8,'2019-05-30 18:31:58',2,'2019-05-30 18:31:58',0,1,0),(118,'Ct029','Ct029',NULL,18.0000,2,11,1,1,4,'Sangria ','Sangria ',0.0000,18.000,18.000,NULL,8,'2019-05-30 18:33:07',2,'2019-05-30 18:33:07',0,1,0),(119,'R001','R001',NULL,4.0000,2,22,1,1,1,'Horus','Horus',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:34:45',2,'2019-05-30 18:34:45',0,1,0),(120,'R002','R002',NULL,20.0000,2,22,1,1,3,'Horus','Horus',0.0000,20.000,20.000,NULL,2,'2019-05-30 18:35:20',2,'2019-05-30 18:35:20',0,1,0),(121,'R003','R003',NULL,25.0000,2,22,1,1,2,'Elixir DÁmour-Red','Elixir DÁmour-Red',0.0000,25.000,25.000,NULL,2,'2019-05-30 18:37:45',2,'2019-05-30 18:37:45',0,1,0),(122,'R004','R004',NULL,16.0000,2,22,1,1,2,'Helios','Helios',0.0000,16.000,16.000,NULL,2,'2019-05-30 18:38:44',2,'2019-05-30 18:38:44',0,1,0),(123,'R005','R005',NULL,16.0000,2,11,1,1,2,'Solal','Solal',0.0000,16.000,16.000,NULL,2,'2019-05-30 18:39:22',2,'2019-05-30 18:39:22',0,1,0),(124,'Gin001','Gin001',NULL,3.5000,2,13,1,1,1,'Streaker Mekong Gry Gin','Streaker Mekong Gry Gin',0.0000,3.500,3.500,NULL,8,'2019-05-30 18:40:45',2,'2019-05-30 18:40:45',0,1,0),(125,'Gin002','Gin002',NULL,3.5000,2,11,1,1,1,'Beefeater','Beefeater',0.0000,3.500,3.500,NULL,8,'2019-05-30 18:41:33',2,'2019-05-30 18:41:33',0,1,0),(126,'Gin003','Gin003',NULL,3.5000,2,11,1,1,1,'Tamgueray','Tamgueray',0.0000,3.500,3.500,NULL,8,'2019-05-30 18:42:22',2,'2019-05-30 18:42:22',0,1,0),(127,'Gin004','Gin004',NULL,3.5000,2,13,1,1,1,'BomBay','BomBay',0.0000,3.500,3.500,NULL,8,'2019-05-30 18:43:54',2,'2019-05-30 18:43:54',0,1,0),(128,'Gin005','Gin005',NULL,3.5000,2,22,1,1,1,'Hemdrik','Hemdrik',0.0000,3.500,3.500,NULL,8,'2019-05-30 18:44:55',2,'2019-05-30 18:44:55',0,1,0),(129,'Wk001','Wk001',NULL,3.5000,2,16,1,1,1,'Jamesom','Jamesom',0.0000,3.500,3.500,NULL,8,'2019-05-30 18:45:44',2,'2019-05-30 18:45:44',0,1,0),(130,'Wk002','Wk002',NULL,4.0000,2,16,1,1,1,'Jack Daniels','Jack Daniels',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:46:21',2,'2019-05-30 18:46:21',0,1,0),(131,'Wk003','Wk003',NULL,4.0000,2,16,1,1,1,'Black Lable','Black Lable',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:47:05',2,'2019-05-30 18:47:05',0,1,0),(132,'Vk001','Vk001',NULL,4.0000,2,17,1,1,1,'Stolichaya','Stolichaya',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:47:46',2,'2019-05-30 18:47:46',0,1,0),(133,'Vk002','Vk002',NULL,4.0000,2,17,1,1,1,'Absolut','Absolut',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:48:43',2,'2019-05-30 18:48:43',0,1,0),(134,'Vk003','Vk003',NULL,4.0000,2,17,1,1,1,'Grey Goose','Grey Goose',0.0000,4.000,4.000,NULL,8,'2019-05-30 18:50:16',2,'2019-05-30 18:50:16',0,1,0),(135,'Hd001','Hd001',NULL,1.5000,4,29,1,1,3,'Espresso ','Espresso ',0.0000,1.500,1.500,NULL,8,'2019-05-30 18:51:26',2,'2019-05-30 18:51:26',0,1,0),(136,'Hd002','Hd002',NULL,1.5000,4,29,1,1,1,'Americano','Americano',0.0000,1.500,1.500,NULL,8,'2019-05-30 18:52:42',2,'2019-05-30 18:52:42',0,1,0),(137,'Hd003','Hd003','',1.7500,4,29,1,1,3,'Cappuccino','Cappuccino',0.0000,1.750,1.750,NULL,8,'2019-05-30 18:53:52',2,'2019-05-30 18:54:10',2,1,0),(138,'Hd004','Hd004',NULL,1.7500,4,29,1,1,1,'Cafe Latte','Cafe Latte',0.0000,1.750,1.750,NULL,8,'2019-05-30 18:56:50',2,'2019-05-30 18:56:50',0,1,0),(139,'Hd005','Hd005',NULL,1.7500,4,29,1,1,1,'Hot Chocolate','Hot Chocolate',0.0000,1.750,1.750,NULL,8,'2019-05-30 18:57:42',2,'2019-05-30 18:57:42',0,1,0),(140,'Hd006','Hd006',NULL,1.7500,4,29,1,1,1,'Green tea latte','Green tea latte',0.0000,1.750,1.750,NULL,8,'2019-05-30 18:58:52',2,'2019-05-30 18:58:52',0,1,0),(141,'Cd001','Cd001',NULL,1.5000,4,25,1,1,3,'Ice Lemon Tea','Ice Lemon Tea',0.0000,1.500,1.500,NULL,8,'2019-05-30 18:59:57',2,'2019-05-30 18:59:57',0,1,0),(142,'Cd002','Cd002',NULL,1.7500,4,25,1,1,3,'Ice Americano','Ice Americano',0.0000,1.750,1.750,NULL,8,'2019-05-30 19:00:51',2,'2019-05-30 19:00:51',0,1,0),(143,'Cd003','Cd003',NULL,2.5000,4,25,1,1,3,'Ice cappuccino','Ice cappuccino',0.0000,2.500,2.500,NULL,8,'2019-05-30 19:02:26',2,'2019-05-30 19:02:26',0,1,0),(144,'Cd004','Cd004',NULL,2.5000,4,25,1,1,3,'Ice latte','Ice latte',0.0000,2.500,2.500,NULL,8,'2019-05-30 19:04:03',2,'2019-05-30 19:04:03',0,1,0),(145,'Cd005','Cd005',NULL,2.5000,4,25,1,1,3,'Ice chocolate','Ice chocolate',0.0000,2.500,2.500,NULL,8,'2019-05-30 19:04:45',2,'2019-05-30 19:04:45',0,1,0),(146,'Cd006','Cd006',NULL,2.5000,4,25,1,1,3,'Ice Mocha','Ice Mocha',0.0000,2.500,2.500,NULL,8,'2019-05-30 19:07:48',2,'2019-05-30 19:07:48',0,1,0),(147,'Cd007','Cd007',NULL,2.5000,4,25,1,1,3,'Ice green Tea latte','Ice green Tea latte',0.0000,2.500,2.500,NULL,8,'2019-05-30 19:08:39',2,'2019-05-30 19:08:39',0,1,0),(148,'Cd008','Cd008',NULL,1.5000,4,25,1,1,3,'Lime Juice','Lime Juice',0.0000,1.500,1.500,NULL,8,'2019-05-30 19:09:43',2,'2019-05-30 19:09:43',0,1,0),(149,'Hj001','Hj001',NULL,3.0000,4,30,1,1,3,'Love healthy Ginger','Love healthy Ginger',0.0000,3.000,3.000,NULL,8,'2019-05-30 19:11:32',2,'2019-05-30 19:11:32',0,1,0),(150,'Hj002','Hj002',NULL,3.0000,4,30,1,1,3,'Good eyes','Good eyes',0.0000,3.000,3.000,NULL,8,'2019-05-30 19:12:14',2,'2019-05-30 19:12:14',0,1,0),(151,'Hj003','Hj003',NULL,3.0000,4,30,1,1,3,'Sunny mint','Sunny mint',0.0000,3.000,3.000,NULL,8,'2019-05-30 19:12:56',2,'2019-05-30 19:12:56',0,1,0),(152,'Hj004','Hj004',NULL,3.0000,4,30,1,1,3,'World Green','World Green',0.0000,3.000,3.000,NULL,8,'2019-05-30 19:13:55',2,'2019-05-30 19:13:55',0,1,0),(153,'Hj005','Hj005',NULL,3.0000,4,30,1,1,3,'Red Roar','Red Roar',0.0000,3.000,3.000,NULL,8,'2019-05-30 19:14:54',2,'2019-05-30 19:14:54',0,1,0),(154,'Fp001','Fp001','29-Jun-2019/14.png',3.0000,4,27,1,1,2,'Banana','Banana',1.0000,3.000,3.000,NULL,8,'2019-05-30 19:17:12',2,'2019-06-29 14:22:19',2,1,0),(155,'Fp002','Fp002',NULL,3.0000,4,26,1,1,3,'Coconut','Coconut',0.0000,3.000,3.000,NULL,8,'2019-05-30 19:17:49',2,'2019-05-30 19:17:49',0,1,0),(156,'Fp003','Fp003','29-Jun-2019/3.png',3.0000,4,27,1,1,3,'Pineapple','Pineapple',1.0000,3.000,3.000,NULL,8,'2019-05-30 19:18:27',2,'2019-06-29 14:21:57',2,1,0),(157,'Fp004','Fp004','29-Jun-2019/noodle.png',3.0000,4,27,1,1,3,'Watermelon','Watermelon',1.0000,3.000,3.000,NULL,8,'2019-05-30 19:20:08',2,'2019-06-29 13:01:32',2,1,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_base_branch` */

insert  into `tbl_item_base_branch`(`id`,`branch_id`,`item_category_id`,`item_id`,`is_delete`,`due_date`,`created_at`,`updated_at`) values (4,1,1,1,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(5,1,1,2,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(6,1,1,157,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(7,1,1,156,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(8,1,1,155,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(9,1,1,154,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(10,1,1,153,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(11,1,1,152,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(12,1,1,151,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(13,1,1,150,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(14,1,1,149,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(15,1,1,148,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(16,1,1,147,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(17,1,1,146,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(18,1,1,145,0,NULL,'2019-06-15 22:36:06','2019-06-15 22:36:06'),(19,1,1,144,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(20,1,1,143,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(21,1,1,142,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(22,1,1,141,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(23,1,1,140,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(24,1,1,139,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(25,1,1,138,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(26,1,1,137,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(27,1,1,136,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(28,1,1,135,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(29,1,1,134,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(30,1,1,133,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(31,1,1,132,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(32,1,1,131,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(33,1,1,130,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(34,1,1,129,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(35,1,1,128,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(36,1,1,127,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(37,1,1,126,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(38,1,1,125,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(39,1,1,124,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(40,1,1,123,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(41,1,1,122,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(42,1,1,121,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(43,1,1,120,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(44,1,1,119,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(45,1,1,118,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(46,1,1,117,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(47,1,1,116,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(48,1,1,115,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(49,1,1,114,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(50,1,1,113,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(51,1,1,112,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(52,1,1,111,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(53,1,1,110,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(54,1,1,109,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(55,1,1,108,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(56,1,1,107,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(57,1,1,106,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(58,1,1,105,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(59,1,1,104,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(60,1,1,103,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(61,1,1,102,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(62,1,1,101,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(63,1,1,100,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(64,1,1,99,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(65,1,1,98,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(66,1,1,97,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(67,1,1,96,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(68,1,1,95,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(69,1,1,94,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(70,1,1,93,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(71,1,1,92,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(72,1,1,91,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(73,1,1,90,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(74,1,1,89,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(75,1,1,88,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(76,1,1,87,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(77,1,1,86,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(78,1,1,85,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(79,1,1,84,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(80,1,1,83,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(81,1,1,82,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(82,1,1,81,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(83,1,1,80,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(84,1,1,79,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(85,1,1,78,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(86,1,1,77,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(87,1,1,76,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(88,1,1,75,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(89,1,1,74,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(90,1,1,61,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(91,1,1,59,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(92,1,1,58,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(93,1,1,57,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(94,1,1,56,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(95,1,1,55,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(96,1,1,54,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(97,1,1,53,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(98,1,1,52,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(99,1,1,51,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(100,1,1,50,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(101,1,1,49,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(102,1,1,48,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(103,1,1,47,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(104,1,1,46,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(105,1,1,45,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(106,1,1,44,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(107,1,1,43,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(108,1,1,42,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(109,1,1,41,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(110,1,1,40,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(111,1,1,39,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(112,1,1,38,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(113,1,1,37,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(114,1,1,60,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(115,1,1,36,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(116,1,1,35,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(117,1,1,34,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(118,1,1,33,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(119,1,1,32,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(120,1,1,31,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(121,1,1,30,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(122,1,1,29,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(123,1,1,28,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(124,1,1,27,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(125,1,1,26,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(126,1,1,25,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(127,1,1,24,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(128,1,1,23,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(129,1,1,22,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(130,1,1,21,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(131,1,1,20,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(132,1,1,19,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(133,1,1,18,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(134,1,1,17,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(135,1,1,16,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(136,1,1,15,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(137,1,1,14,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(138,1,1,13,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(139,1,1,12,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(140,1,1,11,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(141,1,1,10,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(142,1,1,9,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(143,1,1,8,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(144,1,1,7,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(145,1,1,6,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(146,1,1,5,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(147,1,1,4,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(148,1,1,3,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(149,1,1,72,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(150,1,1,71,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(151,1,1,70,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(152,1,1,69,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(153,1,1,68,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(154,1,1,67,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(155,1,1,66,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(156,1,1,65,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(157,1,1,64,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(158,1,1,63,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(159,1,1,62,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07'),(160,1,1,73,0,NULL,'2019-06-15 22:36:07','2019-06-15 22:36:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_category` */

insert  into `tbl_item_category`(`id`,`image`,`item_category_name`,`branch_id`,`is_delete`) values (1,'02-Jul-2019/food.png','Food',1,0),(2,'02-Jul-2019/beverage.png','Beverage',1,0),(3,'02-Jul-2019/beer.png','Beer',1,0),(4,'02-Jul-2019/cafe.png','Cafe',1,0),(5,'02-Jul-2019/breakfast.png','Breakfast',1,0),(6,'02-Jul-2019/cigarette.png','Cigarette',1,0),(7,'02-Jul-2019/pizza.png','Pizza',1,0),(8,'02-Jul-2019/dessert.png','Dessert',1,0),(9,NULL,'DIMSUM ',1,1),(10,NULL,'test',1,1);

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

insert  into `tbl_item_conversion`(`item_id`,`unit1`,`unit2`,`qty1`,`qty2`) values (6,3,5,1,1),(5,5,3,1,12),(4,3,5,1,1),(3,3,3,1,1),(2,3,3,1,1),(8,3,5,1,1),(9,3,5,1,1),(10,3,5,1,1),(11,3,5,1,1),(12,3,5,1,1),(13,3,5,1,1),(14,3,5,1,1),(15,3,5,1,1),(16,3,5,1,1),(17,3,3,1,1),(17,5,3,1,12),(18,3,3,1,1),(18,5,3,1,12),(19,3,5,1,1),(20,3,5,1,1),(21,3,5,1,1),(22,3,5,1,1),(26,3,5,1,1),(27,3,3,1,0),(27,5,3,1,12),(28,3,3,1,1),(28,5,2,1,12),(29,3,3,1,1),(29,5,3,1,12),(30,3,3,1,1),(30,5,3,1,12),(31,3,3,1,1),(31,5,3,1,12),(32,3,3,1,1),(32,5,3,1,12),(33,3,5,1,1),(34,5,5,1,1),(35,5,4,1,1),(36,5,5,1,1),(37,5,5,1,1),(38,5,5,1,1),(39,5,5,1,1),(40,5,5,1,1),(41,5,5,1,1),(42,5,5,1,1),(43,5,5,1,1),(44,5,5,1,1),(45,5,5,1,1),(46,3,3,1,1),(46,5,3,1,12),(47,3,3,1,1),(47,5,3,1,12),(48,3,3,1,1),(48,5,3,1,12),(49,3,3,1,1),(49,5,3,1,12),(50,3,3,1,1),(50,5,3,1,12),(51,3,3,1,1),(51,5,3,1,12),(52,3,3,1,1),(52,5,3,1,12),(53,3,3,1,1),(53,5,3,1,12),(54,3,3,1,1),(54,5,3,1,12),(55,3,3,1,1),(55,5,3,1,12),(7,3,3,1,1),(7,5,3,1,12),(91,9,9,1,1),(90,8,8,1,1),(83,2,2,1,1),(157,8,8,1,1),(1,2,2,1,1),(23,3,5,1,1),(24,3,5,1,1),(25,3,5,1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_size` */

insert  into `tbl_item_size`(`id`,`abbr`,`size_name`,`description`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'S','Small',NULL,0,1,2,2,'2017-11-05 20:56:18','2019-01-05 11:37:57'),(2,'L','Large',NULL,0,1,2,2,'2019-01-05 11:38:10','2019-01-05 11:38:14'),(3,'M','Medium',NULL,0,1,2,NULL,'2019-01-05 11:38:22','2019-01-05 11:38:22'),(4,'EL','Extra Large',NULL,0,1,2,2,'2019-02-28 22:41:00','2019-05-26 12:39:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_sub_category` */

insert  into `tbl_item_sub_category`(`id`,`pos_kitchens_id`,`image`,`branch_id`,`item_category_id`,`name`,`is_delete`) values (1,2,'02-Jul-2019/burger.png',1,1,'Burger ',0),(2,2,'02-Jul-2019/steak.png',1,1,'STEAK',0),(3,2,NULL,1,1,'PASTA',1),(4,2,'02-Jul-2019/starter.png',1,1,'STARTER',0),(5,2,'02-Jul-2019/salad.png',1,1,'Salad',0),(6,2,NULL,1,1,'SOUP',1),(7,2,'02-Jul-2019/skewer.png',1,1,'STIR/ SKEWER',0),(8,2,NULL,1,1,'DESSERT',1),(9,2,'',1,1,'Burger ',1),(10,2,'02-Jul-2019/soup.png',1,1,'Soup',0),(11,1,'02-Jul-2019/cocktail.png',1,2,'Cocktails',0),(12,2,'',1,1,'Asian Food',1),(13,2,'02-Jul-2019/gin.png',1,2,'GIN',0),(14,1,'02-Jul-2019/beverage.png',1,2,'Softdrink',0),(15,1,'02-Jul-2019/water.png',1,2,'Water',0),(16,1,NULL,1,2,'Whisky',0),(17,1,NULL,1,2,'Vodka',0),(18,1,NULL,1,2,'BOURBON',0),(19,1,NULL,1,2,'Fusion',0),(20,1,NULL,1,2,'Frape&Shake ',0),(21,1,NULL,1,2,'Lrgueur /Short glass',0),(22,1,NULL,1,2,'Red wine',0),(23,2,'02-Jul-2019/pasta.png',1,1,'Pasta',0),(24,1,'02-Jul-2019/beer.png',1,3,'Beer',0),(25,1,NULL,1,4,'Cold Drink',0),(26,1,NULL,1,4,'Italian Soda',0),(27,1,'29-Jun-2019/7.png',1,4,'Frappe',0),(28,1,NULL,1,4,'Fruits Smoothies',1),(29,1,NULL,1,4,'Hot Drink',1),(30,1,NULL,1,4,'Healthy juice',1),(31,2,'',1,5,'Noddle Soup ',0),(32,2,NULL,1,5,'Rice Station ',0),(33,2,NULL,1,5,'Khmer Soup ( Lunch )',0),(34,2,'',1,5,'Breakfast ',0),(35,1,NULL,1,6,'CIGARETTE',0),(36,2,NULL,1,7,'PIZZA',0),(37,2,NULL,1,8,'Dessert',0),(38,2,NULL,1,9,'Chinese Food ',0);

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

insert  into `tbl_item_type`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Normal',0,1,2,2,'2016-10-23 13:59:21','2019-05-26 12:40:20'),(2,'Classic',0,1,2,2,'2017-11-14 09:54:59','2019-05-26 12:40:12'),(3,'Typ1',1,1,2,NULL,'2019-02-28 22:40:34','2019-02-28 22:40:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`id`,`fa_icon`,`parent_id`,`menu_type_id`,`menu_link`,`menu_code`,`default`,`url`,`ordering`,`is_active`,`created_date`,`modified_date`) values (1,'fa-dashboard',0,1,'','y5_m01',1,'/',1,1,NULL,NULL),(2,'fa-edit',0,1,'admin/admin','y5_m02',0,'/admin/admin',2,0,NULL,NULL),(3,'fa-list',0,3,'admin/audi_trail','y5_m09',0,NULL,9,1,NULL,NULL),(4,'fa-users',0,1,'admin/users','y5_m10',0,NULL,4,1,NULL,NULL),(5,'fa fa-gears',0,1,'admin/config/configuration','y5_m11',0,NULL,5,1,NULL,NULL),(6,NULL,4,3,'admin/users','y5_s24',0,'/admin/users',45,1,NULL,NULL),(7,NULL,4,3,'admin/user_groups','y5_s25',0,'admin/user_group',45,1,NULL,NULL),(8,NULL,4,3,'admin/users_group_role','y5_s26',0,'/admin/users_group_role',45,1,NULL,NULL),(10,NULL,5,3,'admin/config/configuration','y5_s43',0,NULL,45,1,NULL,NULL),(11,'fa-user',0,3,'admin/dashboard','y5_m14',0,NULL,6,1,NULL,NULL),(12,'fa-edit',0,3,'setup/system','y5_m15',0,NULL,5,1,NULL,NULL),(13,NULL,5,3,'admin/setup_mgr/currency','y5_s28',0,NULL,45,1,NULL,NULL),(15,'fa fa-money',0,1,'setup/sale','y5_m16',0,NULL,45,1,NULL,NULL),(16,NULL,15,3,'setup/sale/agency','y5_s30',0,NULL,12,1,NULL,NULL),(17,NULL,44,3,'admin/customer_mgr/customer','y5_s31',0,NULL,1,1,NULL,NULL),(19,NULL,15,3,'setup/sale/invoice','y5_s33',0,NULL,11,1,NULL,NULL),(21,'fa fa-database',0,1,'setup/sale/stock','y5_m17',0,NULL,45,1,NULL,NULL),(23,NULL,37,3,'admin/setup_mgr/item_category','y5_s36',0,NULL,1,1,NULL,NULL),(24,NULL,37,3,'admin/setup_mgr/item','y5_s37',0,NULL,3,1,NULL,NULL),(25,NULL,21,3,'admin/stock_mgr/actual_stock','y5_s38',0,NULL,45,1,NULL,NULL),(26,NULL,5,3,'setup/sale/stock/bank_account','y5_s39',0,NULL,45,1,NULL,NULL),(27,NULL,21,3,'setup/sale/stock/bank_account_history','y5_s40',0,NULL,45,0,NULL,NULL),(29,NULL,5,3,'admin/config/next_code','y5_s42',0,NULL,45,1,NULL,NULL),(30,NULL,12,3,'admin/setup_mgr/department','y5_s44',0,NULL,45,1,NULL,NULL),(31,NULL,12,3,'admin/setup_mgr/position','y5_s45',0,NULL,45,1,NULL,NULL),(32,NULL,12,3,'admin/setup_mgr/branch_group','y5_s46',0,NULL,45,1,NULL,NULL),(33,NULL,12,3,'admin/setup_mgr/branch','y5_s47',0,NULL,45,1,NULL,NULL),(34,NULL,12,3,'admin/setup_mgr/unit_group','y5_s48',0,NULL,45,1,NULL,NULL),(35,NULL,12,3,'admin/setup_mgr/unit','y5_s49',0,NULL,45,1,NULL,NULL),(36,NULL,12,3,'admin/setup_mgr/employee','y5_s50',0,NULL,45,1,NULL,NULL),(37,'fa fa-file-text',0,3,'setup/store_setup','y5_m18',0,NULL,4,1,NULL,NULL),(38,NULL,37,3,'admin/setup_mgr/item_status','y5_s51',0,NULL,7,1,NULL,NULL),(39,NULL,37,3,'admin/item_mgr/item_base_store','y5_s52',0,NULL,9,1,NULL,NULL),(40,NULL,37,3,'admin/item_mgr/item_base_vendor','y5_s53',0,NULL,10,1,NULL,NULL),(41,'fa fa-institution',0,3,'mgr/supplier','y5_m19',0,NULL,3,1,NULL,NULL),(42,NULL,41,3,'admin/supplier_mgr/supplier','y5_s54',0,NULL,45,1,NULL,NULL),(44,'fa fa-users',0,3,'mrg/customer','y5_m20',0,NULL,2,1,NULL,NULL),(46,NULL,44,3,'admin/customer_mgr/customer_group','y5_s57',0,NULL,2,1,NULL,NULL),(47,NULL,44,3,'admin/customer_mgr/customer_field','y5_s58',0,NULL,3,1,NULL,NULL),(48,'fa fa-eyedropper',0,3,'mrg/tool','y5_m21',0,NULL,7,1,NULL,NULL),(49,NULL,48,3,'admin/tool_mgr/backup_list','y5_s59',0,NULL,45,1,NULL,NULL),(50,NULL,5,3,'admin/setup_mgr/language','y5_s60',0,NULL,45,1,NULL,NULL),(55,NULL,15,3,'setup/sale/purchase_invoice','y5_s65',0,NULL,10,1,NULL,NULL),(57,NULL,15,3,'setup/sale/purchase_order_number','y5_s67',0,NULL,9,1,NULL,NULL),(58,NULL,15,3,'setup/sale/purchase_order_vendor','y5_s68',0,NULL,8,1,NULL,NULL),(60,NULL,15,3,'admin/sale_mgr/return','y5_s70',0,NULL,5,1,NULL,NULL),(61,NULL,37,3,'admin/setup_mgr/item_size','y5_s71',0,NULL,6,1,NULL,NULL),(62,'fa fa-line-chart',0,3,'mrg/report','y5_m22',0,NULL,1,1,NULL,NULL),(63,NULL,62,3,'admin/report/summary_report','y5_s72',0,NULL,1,1,NULL,NULL),(64,NULL,62,3,'admin/report/inventory_on_hand','y5_s73',0,NULL,2,1,NULL,NULL),(65,NULL,62,3,'admin/report/sales_item','y5_s74',0,NULL,4,1,NULL,NULL),(66,NULL,62,3,'admin/report/item_information','y5_s75',0,NULL,3,1,NULL,NULL),(67,NULL,62,3,'admin/report/transfer_item','y5_s76',0,NULL,10,1,NULL,NULL),(68,NULL,21,3,'admin/stock_mgr/adjustment_stock','y5_s77',0,NULL,45,1,NULL,NULL),(69,NULL,37,3,'item_mgr/itemsize','y5_s78',0,NULL,6,1,NULL,NULL),(70,NULL,12,3,'admin/setup_mgr/stock_type','y5_s79',0,NULL,45,1,NULL,NULL),(71,'fa fa-th-large',0,3,'admin/store/main_store','y5_m23',0,'admin/store/main_store',8,1,NULL,NULL),(74,NULL,5,3,'admin/setup_mgr/company','y5_s82',0,NULL,45,1,NULL,NULL),(75,NULL,37,3,'admin/setup_mgr/item_type','y5_s83',0,NULL,5,1,NULL,NULL),(78,NULL,15,3,'admin/quotation','y5_s85',0,NULL,7,1,NULL,NULL),(80,NULL,15,3,'admin/transfer','y5_s86',0,NULL,6,1,NULL,NULL),(87,NULL,15,3,'admin/sale_mgr/sale_order','y5_s93',0,NULL,1,1,NULL,NULL),(88,NULL,37,3,'admin/setup_mgr/item_sub_category','y5_s94',0,NULL,2,1,NULL,NULL),(89,NULL,37,3,'admin/item_mgr/item_barcode','y5_s95',0,NULL,4,1,NULL,NULL),(90,'fa fa-dollar',0,3,'admin/discount','y5_m26',0,NULL,5,1,NULL,NULL),(92,NULL,90,3,'admin/discount/discount_methods','y5_s97',0,NULL,1,1,NULL,NULL),(93,NULL,5,3,'admin/setup_mgr/item_location','y5_s98',0,NULL,45,1,NULL,NULL),(94,NULL,37,3,'admin/item_mgr/location_base_branch','y5_s99',0,NULL,8,1,NULL,NULL),(95,NULL,37,3,'admin/item_mgr/item_base_location','y5_s100',0,NULL,11,1,NULL,NULL),(96,NULL,62,3,'admin/report/return_item','y5_s101',0,NULL,11,1,NULL,NULL),(97,NULL,62,3,'admin/report/purchase_order_by_supplier','y5_s102',0,NULL,9,1,NULL,NULL),(99,'fa fa-user',0,3,'admin/vendor','y5_m30',0,NULL,1,1,NULL,NULL),(100,NULL,99,3,'admin/vendor','y5_s104',0,NULL,1,1,NULL,NULL),(102,NULL,15,3,'admin/stock_mgr/purchase_order','y5_s105',0,NULL,4,1,NULL,NULL),(103,NULL,107,3,'admin/setup_mgr/pos_kitchen','y5_s106',1,NULL,0,1,NULL,NULL),(104,NULL,107,3,'admin/setup_mgr/pos_outlet','y5_s107',2,NULL,0,1,NULL,NULL),(105,NULL,107,3,'admin/setup_mgr/pos_table','y5_s108',3,NULL,0,1,NULL,NULL),(106,NULL,62,3,'admin/report/sales_pos_item','y5_s109',0,NULL,5,1,NULL,NULL),(107,'fa fa-spoon',0,3,'admin/pos','y5_m31',0,NULL,0,1,NULL,NULL),(108,NULL,107,3,'admin/setup_mgr/pos_drawer_group','y5_s110',4,NULL,0,1,NULL,NULL),(109,NULL,107,3,'admin/setup_mgr/pos_drawer','y5_s111',5,NULL,0,1,NULL,NULL),(110,NULL,107,3,'admin/setup_mgr/pos_work_shift','y5_s112',0,NULL,0,1,NULL,NULL),(111,NULL,62,3,'admin/report/sales_pos_by_drawer','y5_s113',0,NULL,6,1,NULL,NULL),(112,NULL,62,3,'admin/report/drawer_transaction','y5_s114',0,NULL,8,1,NULL,NULL),(113,NULL,44,3,'admin/customer_mgr/credit_customer','y5_s100',0,NULL,4,1,NULL,NULL),(114,NULL,44,3,'admin/customer_mgr/paid_customer','y5_s101',0,NULL,5,1,NULL,NULL),(115,NULL,15,3,'admin/sale_mgr/paid_invoice','y5_s102',0,NULL,2,1,NULL,NULL),(116,NULL,15,3,'admin/sale_mgr/unpaid_invoice','y5_s103',0,NULL,3,1,NULL,NULL),(117,NULL,62,3,'admin/report/sales_pos_receipt','y5_s100',0,NULL,7,1,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_description` */

insert  into `tbl_menu_description`(`id`,`menu_id`,`language_id`,`name`,`meta_description`,`meta_keywords`) values (1,1,2,'Home',NULL,NULL),(2,2,2,'Administrator',NULL,NULL),(3,3,2,'Audit trail',NULL,NULL),(4,4,2,'Users',NULL,NULL),(5,5,2,'Settings',NULL,NULL),(7,7,2,'User groups',NULL,NULL),(8,8,2,'Group roles',NULL,NULL),(10,10,2,'Configuration',NULL,NULL),(77,6,2,'Users',NULL,NULL),(78,12,2,'Store Setup',NULL,NULL),(79,13,2,'Currency Rates',NULL,NULL),(81,15,2,'Sale Management',NULL,NULL),(83,17,2,'Customers',NULL,NULL),(84,18,2,'Quotation',NULL,NULL),(87,21,2,'Stocks',NULL,NULL),(89,23,2,'Item Category',NULL,NULL),(90,24,2,'Items',NULL,NULL),(91,25,2,'Inventory Count',NULL,NULL),(92,26,2,'Bank Account',NULL,NULL),(94,29,2,'Next Codes',NULL,NULL),(95,30,2,'Departments',NULL,NULL),(96,31,2,'Positions',NULL,NULL),(97,32,2,'Branch Groups',NULL,NULL),(98,33,2,'Branchs',NULL,NULL),(99,34,2,'Unit Groups',NULL,NULL),(100,35,2,'Units',NULL,NULL),(101,36,2,'Employees',NULL,NULL),(102,37,2,'Items',NULL,NULL),(103,38,2,'Item Status',NULL,NULL),(104,39,2,'Item Base Branch',NULL,NULL),(105,40,2,'Item Base Vendor',NULL,NULL),(106,41,2,'Supplier Management',NULL,NULL),(107,42,2,'Suppliers',NULL,NULL),(109,44,2,'Customer Management',NULL,NULL),(111,46,2,'Customer Groups',NULL,NULL),(112,47,2,'Customer Fields',NULL,NULL),(113,48,2,'Tool Management',NULL,NULL),(114,49,2,'Back Up / Restore',NULL,NULL),(115,50,2,'Language',NULL,NULL),(125,60,2,'Return Items',NULL,NULL),(126,62,2,'Reports',NULL,NULL),(127,63,2,'Summary Reports',NULL,NULL),(128,64,2,'Inventory On Hands',NULL,NULL),(129,65,2,'Whole Sales Item',NULL,NULL),(130,66,2,'Item Information',NULL,NULL),(131,67,2,'Transfer Item',NULL,NULL),(132,68,2,'Stock Adjustment',NULL,NULL),(133,61,2,'Item Size',NULL,NULL),(135,71,2,'Manage Branch',NULL,NULL),(138,74,2,'Company',NULL,NULL),(139,75,2,'Item Type',NULL,NULL),(142,78,2,'Quotations',NULL,NULL),(144,80,2,'Transfers',NULL,NULL),(146,82,2,'Transfer List',NULL,NULL),(151,87,2,'Manage Sale Invoice',NULL,NULL),(152,88,2,'Item Subcategory',NULL,NULL),(153,70,2,'Stock Type',NULL,NULL),(154,89,2,'Generate Barcode',NULL,NULL),(155,90,2,'Discount',NULL,NULL),(157,92,2,'Discount Methods',NULL,NULL),(158,93,2,'Location',NULL,NULL),(159,94,2,'Location Base Branch',NULL,NULL),(160,95,2,'Item Base Location',NULL,NULL),(161,96,2,'Return Item',NULL,NULL),(162,97,2,'Purchase Order By Suppliers',NULL,NULL),(164,99,2,'Vendors',NULL,NULL),(165,100,2,'Vendors',NULL,NULL),(167,102,2,'Purchase Order',NULL,NULL),(168,103,2,'POS Kitchen',NULL,NULL),(169,104,2,'POS Outlet',NULL,NULL),(170,105,2,'POS Table',NULL,NULL),(171,106,2,'POS Sales Item',NULL,NULL),(172,107,2,'POS',NULL,NULL),(173,108,2,'Drawer Group',NULL,NULL),(174,109,2,'Drawer',NULL,NULL),(175,110,2,'Work Shift',NULL,NULL),(176,111,2,'POS Sale By Drawer',NULL,NULL),(177,112,2,'Drawer Transaction',NULL,NULL),(178,113,2,'Credit Customers',NULL,NULL),(179,114,2,'Paid Customers',NULL,NULL),(180,115,2,'Paid Invoice',NULL,NULL),(181,116,2,'Unpaid Invoice',NULL,NULL),(182,117,2,'POS Receipts',NULL,NULL);

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

insert  into `tbl_next_codes`(`id`,`module`,`next_sequence`,`cit`,`cet`,`prefix`,`suffix`,`length`,`year_format`,`month_format`,`created_at`,`updated_at`,`is_manaul`) values (1,'RECEIPT',123,3,1,'RCP-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-29 09:35:49',1),(2,'INVOICE',445,1,1,'INV-','00',4,'Y','m','2016-08-03 00:00:00','2016-09-09 16:02:58',1),(3,'QUOTATION',1,1,1,'QUO-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-03 00:00:00',1),(4,'TRANSFER',1,1,1,'TRNS-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-03 00:00:00',1),(5,'RETURN',1,1,1,'RET-','00',4,'Y','m','2017-11-05 00:00:00','2017-11-05 00:00:00',1),(6,'SALE ORDER',1,1,1,'SO-','00',4,'Y','m','2017-11-06 00:00:00','2017-11-06 00:00:00',1);

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
  `ref_order_id` int(11) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_order_details` */

insert  into `tbl_pos_cus_order_details`(`id`,`pos_order_id`,`pos_add_on_id`,`ref_order_id`,`ref_order_detail_id`,`item_id`,`unit_id`,`qty`,`cost_amount`,`unit_price`,`price`,`is_cancel`,`is_delete`,`printed_qty`,`is_discount_item`,`discount_amount`,`created_date`,`updated_date`,`note`) values (1,1,0,0,0,1,2,1,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,NULL,NULL,NULL),(4,2,0,0,0,75,2,1,'3.0000','3.0000','3.0000',0,0,1,0,0.0000,'2019-07-07 22:39:17',NULL,NULL),(5,2,0,0,0,1,2,2,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,'2019-07-07 22:39:17',NULL,NULL),(6,2,0,0,0,34,9,1,'8.5000','8.5000','8.5000',0,0,1,0,0.0000,'2019-07-07 22:39:17',NULL,NULL),(7,3,0,0,0,1,2,1,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,NULL,NULL,NULL),(8,4,0,0,0,1,2,1,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,NULL,NULL,NULL),(9,5,0,0,0,1,2,1,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,NULL,NULL,NULL),(10,7,0,6,0,1,2,1,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,NULL,NULL,NULL),(11,7,0,0,0,1,2,1,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,NULL,NULL,NULL),(12,8,0,0,0,1,2,1,'4.5000','4.5000','4.5000',0,0,1,0,0.0000,NULL,NULL,NULL);

/*Table structure for table `tbl_pos_cus_order_sequence` */

DROP TABLE IF EXISTS `tbl_pos_cus_order_sequence`;

CREATE TABLE `tbl_pos_cus_order_sequence` (
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_order_sequence` */

insert  into `tbl_pos_cus_order_sequence`(`sequence`) values (1);

/*Table structure for table `tbl_pos_cus_orders` */

DROP TABLE IF EXISTS `tbl_pos_cus_orders`;

CREATE TABLE `tbl_pos_cus_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `remark` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_pos_cus_orders_discount_methods1_idx` (`discount_method_id`) USING BTREE,
  KEY `fk_pos_cus_orders_discount_profiles1_idx` (`discount_profile_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_orders` */

insert  into `tbl_pos_cus_orders`(`id`,`quotation_no`,`order_no`,`branch_id`,`invoice_no`,`unit_id`,`table_id`,`member_id`,`customer_id`,`check_in_date`,`check_out_date`,`is_void`,`pax`,`made_by`,`made_date`,`is_printed_receipt`,`cancel_by`,`discount`,`discount_amount`,`vat_percentag`,`vat_amount`,`tax_amount`,`tax_percentage`,`sub_total_amount`,`service_tax_amount`,`service_tax_percentage`,`order_type_id`,`drawer_id`,`printed_qty`,`status_id`,`flag_check`,`ref_id`,`created_date`,`updated_date`,`discount_method_id`,`discount_by`,`discount_profile_type_id`,`remark`) values (1,NULL,'INV-43800',0,NULL,NULL,0,0,1,'2019-07-07 22:12:04',NULL,0,0,'3','2019-07-07 22:12:04',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'4.5000','0.0000','0.0000',1,2,NULL,11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,'INV-43900',0,NULL,NULL,27,0,1,'2019-07-07 22:38:56',NULL,0,3,'3','2019-07-07 22:38:56',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'20.5000','0.0000','0.0000',1,2,NULL,11,0,NULL,NULL,'2019-07-07 22:39:17',NULL,NULL,NULL,NULL),(3,NULL,'INV-44000',0,NULL,NULL,0,0,1,'2019-07-08 08:35:41',NULL,0,0,'3','2019-07-08 08:35:41',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'4.5000','0.0000','0.0000',1,2,NULL,11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,'INV-44100',0,NULL,NULL,27,0,1,'2019-07-09 09:57:47',NULL,0,3,'2','2019-07-09 09:57:47',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'4.5000','0.0000','0.0000',1,1,NULL,10,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,'INV-44200',0,NULL,NULL,28,0,1,'2019-07-09 10:45:28',NULL,0,1,'2','2019-07-09 10:45:28',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'4.5000','0.0000','0.0000',1,1,NULL,11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,'INV-44300',0,NULL,NULL,28,0,1,'2019-07-11 22:47:29',NULL,0,1,'2','2019-07-11 22:47:29',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'4.5000','0.0000','0.0000',1,1,NULL,10,0,7,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,'INV-44400',0,NULL,NULL,28,0,1,'2019-07-11 22:48:14',NULL,0,2,'2','2019-07-11 22:48:14',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'9.0000','0.0000','0.0000',1,1,NULL,10,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,'INV-44500',0,NULL,NULL,0,0,1,'2019-07-17 21:46:38',NULL,0,0,'2','2019-07-17 21:46:38',NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',0,'4.5000','0.0000','0.0000',1,1,NULL,11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_pos_kitchens` */

DROP TABLE IF EXISTS `tbl_pos_kitchens`;

CREATE TABLE `tbl_pos_kitchens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_kitchens` */

insert  into `tbl_pos_kitchens`(`id`,`name`,`printer_name`,`ip_address`,`is_deleted`,`created_at`,`updated_at`) values (1,'Cashier','epson1','192.168.123.100',0,NULL,NULL),(2,'Drink','epson2','192.168.122.100',0,NULL,'2019-06-15 18:23:01'),(12,'printer 1','epson','192.168.1.1',1,'2019-06-15 17:28:51','2019-06-15 17:31:20');

/*Table structure for table `tbl_pos_membership` */

DROP TABLE IF EXISTS `tbl_pos_membership`;

CREATE TABLE `tbl_pos_membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_card_id` int(4) NOT NULL DEFAULT '0',
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `max_discount` int(3) DEFAULT '0',
  `member_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_type` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_membership` */

insert  into `tbl_pos_membership`(`id`,`member_card_id`,`name`,`image`,`gender`,`nationality`,`phone`,`fax`,`email`,`address`,`start_date`,`expired_date`,`is_active`,`max_discount`,`member_code`,`member_type`,`created_at`,`updated_at`) values (6,1,'Sineth',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(7,1,'as',NULL,NULL,NULL,'sdf',NULL,NULL,NULL,NULL,NULL,NULL,0,'00009',NULL,'2019-06-29 17:44:06','2019-06-29 17:44:06'),(8,1,'sineth',NULL,NULL,NULL,'081397071',NULL,NULL,NULL,NULL,NULL,NULL,0,'081397071',NULL,'2019-06-29 18:17:35','2019-06-29 18:17:35');

/*Table structure for table `tbl_pos_membership_card` */

DROP TABLE IF EXISTS `tbl_pos_membership_card`;

CREATE TABLE `tbl_pos_membership_card` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `expired_date` date DEFAULT NULL,
  `code_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `membercard_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `max_discount` int(3) DEFAULT '0',
  `create_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_membership_card` */

insert  into `tbl_pos_membership_card`(`id`,`expired_date`,`code_no`,`membercard_type`,`max_discount`,`create_at`,`updated_at`) values (1,'2019-02-02','001','General',10,NULL,NULL),(2,'2019-02-02','002','VIP',50,NULL,NULL),(3,'2019-02-02','003','Mid Night',60,NULL,NULL);

/*Table structure for table `tbl_pos_membership_condition` */

DROP TABLE IF EXISTS `tbl_pos_membership_condition`;

CREATE TABLE `tbl_pos_membership_condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score_from` int(11) DEFAULT '0',
  `score_to` int(11) DEFAULT '0',
  `membership_condition` text COLLATE utf8_unicode_ci,
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_membership_condition` */

insert  into `tbl_pos_membership_condition`(`id`,`score_from`,`score_to`,`membership_condition`,`remark`,`created_at`,`updated_at`) values (1,0,0,'20-30','Get package of cartoon.',NULL,NULL);

/*Table structure for table `tbl_pos_membership_score` */

DROP TABLE IF EXISTS `tbl_pos_membership_score`;

CREATE TABLE `tbl_pos_membership_score` (
  `membership_id` int(11) NOT NULL,
  `membership_condition_id` int(11) NOT NULL,
  `score` int(99) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_membership_score` */

insert  into `tbl_pos_membership_score`(`membership_id`,`membership_condition_id`,`score`,`created_at`,`updated_at`) values (1,0,1,NULL,NULL);

/*Table structure for table `tbl_pos_outlets` */

DROP TABLE IF EXISTS `tbl_pos_outlets`;

CREATE TABLE `tbl_pos_outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `tooltype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_outlets` */

insert  into `tbl_pos_outlets`(`id`,`name`,`description`,`tooltype`,`is_deleted`,`is_active`,`created_at`,`updated_at`) values (1,'1st FLOOR',NULL,'Graphic',0,1,'2016-07-19 13:26:37','2016-07-19 13:26:37'),(2,'2nd FLOOR','asdfasdf','Graphic',0,1,'2016-07-25 22:09:27','2019-06-15 18:21:13'),(3,'3rd FLOOR','desc','Graphic',0,1,'2017-10-09 12:09:11','2019-06-15 19:09:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_reciept` */

insert  into `tbl_pos_reciept`(`id`,`receipt_no`,`account_id`,`order_id`,`payment_method_id`,`amount`,`currency_id`,`transaction_date`,`description`,`status_id`,`udpated_at`,`created_at`) values (1,'RCP-11900',NULL,1,1,'4.5000',1,'2019-07-07 22:12:07','',20,NULL,'2019-07-07 22:12:07'),(2,'RCP-12000',NULL,2,1,'20.5000',1,'2019-07-07 22:39:43','',20,NULL,'2019-07-07 22:39:43'),(3,'RCP-12100',NULL,3,1,'4.5000',1,'2019-07-08 08:35:44','',20,NULL,'2019-07-08 08:35:44'),(4,'RCP-12200',NULL,5,1,'4.5000',1,'2019-07-10 10:13:03','',20,NULL,'2019-07-10 10:13:03'),(5,'RCP-12300',NULL,8,1,'4.5000',1,'2019-07-17 21:47:23','',20,NULL,'2019-07-17 21:47:23');

/*Table structure for table `tbl_pos_tables` */

DROP TABLE IF EXISTS `tbl_pos_tables`;

CREATE TABLE `tbl_pos_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_outlets_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT 'Table',
  `pax` int(11) DEFAULT '0',
  `is_table` tinyint(1) DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT '1',
  `font_size` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT '100',
  `height` int(11) DEFAULT '100',
  `table_shape` varchar(45) COLLATE utf8_unicode_ci DEFAULT 'Rounded',
  `position_x` int(11) DEFAULT '0',
  `position_y` int(11) DEFAULT '0',
  `background_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#ffffff',
  `background_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#f0f0f0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_tables` */

insert  into `tbl_pos_tables`(`id`,`pos_outlets_id`,`name`,`pax`,`is_table`,`description`,`status`,`font_size`,`width`,`height`,`table_shape`,`position_x`,`position_y`,`background_color`,`background_url`,`text_color`,`is_deleted`,`created_at`,`updated_at`) values (21,2,'TB1',10,1,'',1,NULL,100,100,'rect',130,170,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-09 12:09:23','2017-10-10 16:50:28'),(27,1,'TB13',12,1,'',3,NULL,100,100,'rect',23,-1912,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-10 14:27:45','2018-01-10 12:07:43'),(28,1,'TB2',4,1,'',3,NULL,100,50,'rect',551,-1999,'#0D1C0F','/images/TABLE/square.png','#FFFFFF',0,'2017-10-10 14:28:46','2017-10-13 20:43:48'),(29,1,'TB3',4,1,'',1,NULL,100,50,'rect',551,-1972,'#0D1C0F','/images/TABLE/square.png','#FFFFFF',0,'2017-10-10 14:29:16','2017-10-14 13:40:01'),(31,2,'TB5',12,1,'',1,NULL,100,100,'rect',137,-167,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-10 14:32:36','2017-10-10 16:50:33'),(50,3,'VIP2',10,1,'',1,NULL,80,80,'rect',136,114,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-09 12:09:23','2017-10-13 20:57:40'),(52,1,'VIP22',122,1,'',1,NULL,80,80,'rect',137,-247,'#0D1C0F','/images/TABLE/round_table.png','#FFFFFF',0,'2017-10-10 14:32:36','2019-06-15 19:09:18');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_order` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_order_detail` */

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

insert  into `tbl_quotation`(`id`,`quotation_no`,`quotation_date`,`quotation_item_master`,`customer_id`,`description`,`sub_total`,`discount`,`vat_percentage`,`grand_total`,`is_void`,`is_cancel`,`branch_id`,`expired_date`,`created_at`,`updated_at`,`created_by`,`updated_by`,`is_approve`,`is_sale_order`) values (1,'QUO-201905003','2019-05-26 00:00:00',NULL,1,'',60.00,NULL,0.00,60.00,NULL,NULL,1,'2019-05-26 00:00:00',NULL,'2019-07-10 17:03:26',2,2,1,1);

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

insert  into `tbl_quotation_detail`(`quotation_id`,`branch_id`,`unit_id`,`quotation_date`,`quotation_qty`,`comp_qty`,`void_qty`,`item_id`,`retailer_price`,`whole_sale_price`,`DisMethodId`,`discount_amount`,`quotation_price`,`whole_sell_unit`,`retail_unit`,`item_sell_price_id`,`total`,`remark`) values (1,1,5,NULL,2.00,NULL,NULL,1,NULL,30.00,NULL,NULL,30.00,NULL,NULL,NULL,60.00,'');

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
  `customer_id` int(11) DEFAULT NULL,
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

insert  into `tbl_return`(`id`,`branch_id`,`customer_id`,`bill_no`,`return_no`,`return_date`,`return_by`,`verify_by`,`description`,`is_returned`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,2,'#00922','RET-201907009','2019-07-10','sineth','sineth','description',0,NULL,NULL,'2019-07-10 22:13:27','2019-07-10 22:13:27');

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

insert  into `tbl_return_detail`(`return_id`,`unit_id`,`item_id`,`qty`,`unit_price`,`remark`) values (1,3,19,12,NULL,'2');

/*Table structure for table `tbl_return_sequence` */

DROP TABLE IF EXISTS `tbl_return_sequence`;

CREATE TABLE `tbl_return_sequence` (
  `id` int(11) NOT NULL DEFAULT '1',
  `sequence_no` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_return_sequence` */

insert  into `tbl_return_sequence`(`id`,`sequence_no`) values (1,10);

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
  `sub_total` float(10,2) DEFAULT '0.00',
  `discount` float(10,2) DEFAULT '0.00',
  `vat_percentage` float(10,2) DEFAULT '0.00',
  `grand_total` float(10,2) DEFAULT '0.00',
  `sale_return` float(10,2) DEFAULT '0.00',
  `paid_amount` float(10,2) DEFAULT '0.00',
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_sale_order` */

insert  into `tbl_sale_order`(`id`,`sale_order_no`,`invoice_no`,`quotation_no`,`sale_order_date`,`sale_order_item_master`,`customer_id`,`description`,`sub_total`,`discount`,`vat_percentage`,`grand_total`,`sale_return`,`paid_amount`,`is_void`,`is_cancel`,`branch_id`,`expired_date`,`created_at`,`updated_at`,`created_by`,`updated_by`,`is_approve`) values (1,'SO-201907003',NULL,NULL,'2019-07-07 00:00:00',NULL,1,'',0.00,NULL,0.00,87.00,NULL,NULL,NULL,NULL,1,'1970-01-01 00:00:00',NULL,'2019-07-10 17:03:46',2,2,1),(2,'SO-201907003','INV-2019070022','QUO-201905003','2019-07-10 17:03:26',NULL,1,'',60.00,NULL,0.00,60.00,0.00,0.00,NULL,NULL,1,'2019-05-26 00:00:00','2019-07-10 17:03:26','2019-07-10 17:03:26',2,2,1);

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

insert  into `tbl_sale_order_detail`(`sale_order_id`,`branch_id`,`unit_id`,`sale_order_date`,`sale_order_qty`,`comp_qty`,`void_qty`,`item_id`,`retailer_price`,`whole_sale_price`,`DisMethodId`,`discount_amount`,`sale_order_price`,`whole_sell_unit`,`retail_unit`,`item_sell_price_id`,`total`,`remark`) values (2,1,5,NULL,2.00,NULL,NULL,1,NULL,30.00,NULL,NULL,30.00,NULL,NULL,NULL,60.00,''),(1,1,3,NULL,2.00,NULL,NULL,9,NULL,22.00,NULL,NULL,22.00,NULL,NULL,NULL,43.12,'remark'),(1,1,5,NULL,2.00,NULL,NULL,17,NULL,22.00,NULL,NULL,22.00,NULL,NULL,NULL,44.00,'remark');

/*Table structure for table `tbl_sale_order_sequence` */

DROP TABLE IF EXISTS `tbl_sale_order_sequence`;

CREATE TABLE `tbl_sale_order_sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sequence_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_sale_order_sequence` */

insert  into `tbl_sale_order_sequence`(`id`,`sequence_no`) values (1,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_table_reservations` */

insert  into `tbl_table_reservations`(`id`,`table_id`,`contact_name`,`reservation_date`,`contact_number`,`reservation_by`,`note`,`status_id`,`created_at`,`updated_at`) values (1,28,'','0000-00-00 00:00:00','',NULL,'',5,'2019-06-14 22:48:01',NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_transfer` */

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_unit` */

insert  into `tbl_unit`(`id`,`unit_group_id`,`name`,`is_standard`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,1,'Bottle',NULL,0,1,2,2,'2017-01-19 21:48:09','2017-01-19 21:48:09'),(3,1,'Box',NULL,0,1,2,2,'2017-01-19 21:48:32','2017-01-19 21:48:32'),(4,1,'Can',NULL,0,1,2,2,'2017-01-19 21:48:50','2017-01-19 21:48:50'),(5,1,'Case',NULL,0,1,2,2,'2017-01-19 21:49:00','2017-11-04 08:38:03'),(6,1,'Package',NULL,0,1,2,2,'2017-01-19 21:49:13','2017-11-05 20:58:18'),(7,1,'Bulb',NULL,0,1,2,2,'2018-12-12 22:39:14','2018-12-12 22:39:14'),(8,1,'Glass',NULL,0,1,2,2,'2018-12-12 22:39:14','2018-12-12 22:39:14'),(9,1,'Item',NULL,0,1,2,NULL,'2019-05-26 12:43:05','2019-05-26 12:43:05');

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
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`password`,`group_id`,`photo`,`remember_token`,`email`,`profile_image`,`is_delete`,`created_at`,`updated_at`) values (2,'admin','$2y$10$IAJ32BbktMky0TfW.YH5FOeNU9u1.JT/P5VOFrHLt05SBOylaxBji',1,'16-Oct-2016/camera (3).jpg','uCiquTtA7ZquEHSpvGccxBdfysVNi05DLqL4dDZMFXhrKvYCF5lZvjOOkUw5','admin@admin.com',NULL,0,NULL,'2019-07-17 23:42:21'),(3,'cashier1','$2y$10$bmvxahYpN1wFZIbSOgDM5utbhspa84prCECgNlay5lMJOwNHOZd2.',2,'',NULL,'test@gmail.com',NULL,0,NULL,NULL),(4,'so1','$2y$10$Ss.5MbxebvvnuqatEsCDjuTJCTokeR8Uxpg1cWZEnUsJA5lmQBEqG',3,'',NULL,'so1@gmail.com',NULL,0,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_user_group` */

insert  into `tbl_user_group`(`id`,`name`,`is_active`,`is_delete`,`remark`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Top Administrator',1,0,'Full System Control',NULL,2,NULL,NULL),(2,'Cashier',0,0,'',2,NULL,NULL,NULL),(3,'Service Order',0,0,'',2,NULL,NULL,NULL),(4,'Accountant',0,0,'',2,NULL,NULL,NULL);

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

insert  into `tbl_vendor`(`id`,`branch_id`,`image`,`vendor_name`,`contact`,`address1`,`address2`,`tel1`,`tel2`,`tel3`,`fax1`,`fax2`,`account_number`,`terms_of_payment`,`delivery_day`,`email`,`website`,`vendor_code`,`description`,`is_active`,`is_vat`,`vat_no`,`is_delete`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,NULL,'Pisey','081333 333','asdf','asdf','asdf','asdf','asdf','asdf','asdf','asdf','asdf',0,'sadfsdf@tesa.com','asdf','12312',NULL,'','','asdf',1,NULL,NULL,'2016-10-23 16:19:02','2019-02-28 22:39:16'),(2,1,NULL,'v1','081223333','','','','','','','','','',0,'test@test.com','www.google.com','001',NULL,'',NULL,'',0,NULL,NULL,'2019-02-28 22:37:39','2019-02-28 22:37:39'),(3,2,NULL,'dara','','','','','','','','','','',0,'','','',NULL,'',NULL,'',1,NULL,NULL,'2019-02-28 22:39:07','2019-02-28 22:39:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_workshifts` */

insert  into `tbl_workshifts`(`id`,`workshift_name`,`start_time`,`end_time`,`description`,`is_active`,`created_at`,`updated_at`) values (1,'Morning','06:00:05','12:00:12','',1,'2019-06-15 21:10:24','2019-06-15 21:12:07');

/*Table structure for table `tlkp_lookups` */

DROP TABLE IF EXISTS `tlkp_lookups`;

CREATE TABLE `tlkp_lookups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `l_type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line_seq` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tlkp_lookups` */

insert  into `tlkp_lookups`(`id`,`code`,`l_type`,`name`,`line_seq`,`description`) values (1,NULL,'TABLE STATUS','green',NULL,'Avaliable'),(2,NULL,'TABLE STATUS','gray',NULL,'Reserve'),(3,NULL,'TABLE STATUS','red',NULL,'Busy'),(5,NULL,'RESERVATION STATUS','NEW',NULL,''),(6,NULL,'RESERVATION STATUS','Arrived',NULL,''),(7,NULL,'RESERVATION STATUS','Cancel',NULL,''),(10,NULL,'POS ORDER','NEW Order',NULL,'NEW ORDER'),(11,NULL,'POS ORDER','Paid',NULL,'ORDER has paided'),(12,NULL,'POS ORDER','Void',NULL,'ORDER has cancel BEFORE paid'),(13,NULL,'POS MERGE','MERGE',NULL,'MERGE TABLE candidate STATUS must be avaliable AND MERGE INTO ONE ORDER'),(20,NULL,'RECEIPT','NEW',NULL,'NEW receipt'),(21,NULL,'RECEIPT','Void',NULL,'Void receipt'),(22,NULL,'ORDER TYPE','Delivery',NULL,'Delivery Customer');

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
