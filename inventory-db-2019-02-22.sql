/*
SQLyog Ultimate v8.55 
MySQL - 5.7.19 : Database - inventory_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `inventory_db`;

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

insert  into `tbl_activity_log`(`id`,`user_id`,`action`,`menu_code`,`ip_address`,`mac_address`,`datetime`) values (0,2,'view','y5_m01',NULL,NULL,'2018-12-12 10:20:13'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-12 10:21:40'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-12 10:21:48'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-12 10:27:58'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-12 10:28:00'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-12 10:28:03'),(0,2,'Delete bank_account','y5_m01',NULL,NULL,'2018-12-12 10:34:14'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-12 10:35:05'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-12 10:35:23'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-12 10:35:50'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-12 10:36:04'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-12 10:38:34'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-12 10:39:14'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-12 10:40:37'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-12 10:42:30'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-12 11:09:12'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-12 11:09:15'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-12 11:47:56'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-13 12:26:30'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-13 09:49:25'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:03:45'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:05:59'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:06:18'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:06:31'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:07:41'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:13:17'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:13:24'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:15:11'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:15:15'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:15:34'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:15:39'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:15:49'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:15:54'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:19:57'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:20:02'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 10:20:49'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-13 11:25:52'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-14 08:30:48'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-14 10:02:45'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-14 10:19:36'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-14 10:48:28'),(0,2,'cancel','y5_m01',NULL,NULL,'2018-12-14 10:48:38'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-14 10:52:27'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-14 10:53:12'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-14 10:55:28'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-14 10:57:28'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-14 10:57:39'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-14 10:59:01'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-14 02:39:27'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-14 02:40:12'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-14 02:41:20'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-14 02:41:26'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-14 03:23:19'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-16 02:54:45'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-16 02:55:45'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-16 02:56:08'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-16 05:18:37'),(0,2,'update permission','y5_m01',NULL,NULL,'2018-12-16 05:18:45'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-16 10:09:12'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-18 12:44:53'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 06:42:18'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-18 06:42:45'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 06:42:45'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 06:43:14'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 06:43:18'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 06:44:19'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 09:27:29'),(0,2,'delete','y5_m01',NULL,NULL,'2018-12-18 09:27:36'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-18 09:42:58'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-18 09:43:13'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-18 09:43:17'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-18 09:43:57'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-18 09:44:01'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-18 09:44:42'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-18 09:44:48'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-18 09:44:50'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-18 09:45:29'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-18 09:45:32'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 09:50:08'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 09:50:16'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-18 09:50:24'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-19 08:40:47'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-19 09:26:00'),(0,2,'update permission','y5_m01',NULL,NULL,'2018-12-19 09:26:04'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-19 09:41:47'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-19 09:42:08'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-19 09:42:22'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-19 09:51:26'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-19 09:51:53'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-20 12:59:51'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-20 01:00:11'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-21 03:44:16'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-21 03:55:43'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-21 03:56:55'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-21 03:59:06'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-21 04:00:49'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-21 04:08:04'),(0,2,'update permission','y5_m01',NULL,NULL,'2018-12-21 04:08:11'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-22 12:18:15'),(0,2,'create','y5_m01',NULL,NULL,'2018-12-22 01:52:17'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-22 01:52:25'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-22 01:52:37'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-22 01:52:41'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-22 01:52:46'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-22 01:52:51'),(0,2,'update','y5_m01',NULL,NULL,'2018-12-22 01:53:27'),(0,2,'delete','y5_m01',NULL,NULL,'2018-12-22 02:24:11'),(0,2,'delete','y5_m01',NULL,NULL,'2018-12-22 02:24:25'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-22 02:24:30'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-22 02:24:36'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-22 02:26:40'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-22 02:26:43'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-22 02:27:13'),(0,2,'Logout','y5_m01',NULL,NULL,'2018-12-22 02:27:17'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-22 02:27:20'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-23 08:32:30'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-25 01:26:55'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-25 03:42:39'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-25 03:43:01'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-25 03:43:56'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-25 03:44:11'),(0,2,'view','y5_m01',NULL,NULL,'2018-12-25 03:44:55'),(0,2,'update permission','y5_m01',NULL,NULL,'2018-12-25 03:45:02'),(0,2,'Login','y5_m01',NULL,NULL,'2018-12-26 12:42:17'),(0,2,'Login','y5_m01',NULL,NULL,'2019-01-02 09:37:06'),(0,2,'Login','y5_m01',NULL,NULL,'2019-01-02 10:36:40'),(0,2,'Login','y5_m01',NULL,NULL,'2019-01-02 10:42:27'),(0,2,'Login','y5_m01',NULL,NULL,'2019-01-05 11:19:45'),(0,2,'update','y5_m01',NULL,NULL,'2019-01-05 11:37:57'),(0,2,'create','y5_m01',NULL,NULL,'2019-01-05 11:38:10'),(0,2,'update','y5_m01',NULL,NULL,'2019-01-05 11:38:14'),(0,2,'create','y5_m01',NULL,NULL,'2019-01-05 11:38:22'),(0,2,'view','y5_m01',NULL,NULL,'2019-01-05 11:47:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_actual_stock` */

insert  into `tbl_actual_stock`(`id`,`branch_id`,`item_id`,`unit_id`,`qty`,`date`,`cost`,`expected_close`,`end_margin`,`act_unit_id`,`act_qty`,`sub_location_id`) values (1,1,1,7,5,'2018-12-12',NULL,NULL,NULL,NULL,NULL,NULL),(2,1,1,5,1,'2018-12-12',NULL,NULL,NULL,NULL,NULL,NULL),(3,1,1,7,0,'2018-12-18',NULL,NULL,NULL,NULL,NULL,NULL),(4,1,1,5,0,'2018-12-18',NULL,NULL,NULL,NULL,NULL,NULL),(5,1,2,7,0,'2018-12-18',NULL,NULL,NULL,NULL,NULL,NULL);

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

insert  into `tbl_adjustment`(`id`,`item_id`,`adjustment_date`,`adjust_qty`,`adjust_type`,`adjust_by`,`reason`,`branch_id`,`unit_id`,`lost_qty`,`damage_qty`,`created_at`,`updated_at`) values (0,1,'2018-12-12 00:00:00',4,NULL,'','',1,7,1,2,'2018-12-12 23:22:14','2018-12-12 23:22:14'),(0,1,'2018-12-12 00:00:00',1,NULL,'','',1,5,0,0,'2018-12-12 23:22:14','2018-12-12 23:22:14'),(0,2,'2018-12-14 00:00:00',15,NULL,'','',1,7,0,0,'2018-12-14 11:10:18','2018-12-14 11:10:18'),(0,1,'2018-12-14 00:00:00',0,NULL,'','',1,7,0,0,'2018-12-14 11:10:18','2018-12-14 11:10:18'),(0,1,'2018-12-14 00:00:00',10,NULL,'','',1,5,0,0,'2018-12-14 11:10:18','2018-12-14 11:10:18');

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

insert  into `tbl_branch`(`id`,`company_id`,`branch_name`,`description`,`branch_group_id`,`is_delete`,`is_default`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,'Branch A',NULL,1,0,1,NULL,2,NULL,'2018-12-18 18:47:37'),(2,1,'Branch B',NULL,3,0,0,NULL,2,NULL,'2018-12-18 18:47:37');

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

insert  into `tbl_branch_group`(`id`,`branch_group_name`,`branch_group_description`,`is_active`,`is_delete`) values (1,'Group A',NULL,1,0),(3,'Group B',NULL,1,0);

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

insert  into `tbl_company`(`id`,`company_kh`,`company_en`,`image`,`address`,`description`,`website`,`phone`,`email`,`created_at`,`updated_at`) values (1,'General','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
  `id` int(11) NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_currency` */

insert  into `tbl_currency`(`id`,`name`,`value`,`currency_sign`,`fraction_unit`,`is_default`,`is_delete`,`is_active`,`exchange_rate`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Dollar','1','$','1',1,NULL,1,'1',NULL,NULL,NULL,'2017-01-23 23:37:13'),(2,'Reil','4100','R','100',0,NULL,1,'41',NULL,NULL,'2017-01-20 22:44:05','2017-11-08 14:50:50'),(1,'Dollar','1','$','1',1,NULL,1,'1',NULL,NULL,NULL,'2017-01-23 23:37:13'),(2,'Reil','4100','R','100',0,NULL,1,'41',NULL,NULL,'2017-01-20 22:44:05','2017-11-08 14:50:50');

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

insert  into `tbl_customer`(`id`,`customer_group_id`,`customer_type_id`,`group_invoice_due_id`,`name`,`phone`,`email`,`address`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_default`,`is_delete`) values (1,1,1,NULL,'General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0);

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

insert  into `tbl_department`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'test12',1,0,2,2,'2016-10-23 12:04:03','2016-10-23 12:04:20'),(2,'de',1,1,2,NULL,'2017-11-05 20:54:38','2017-11-05 20:54:47'),(1,'test12',1,0,2,2,'2016-10-23 12:04:03','2016-10-23 12:04:20'),(2,'de',1,1,2,NULL,'2017-11-05 20:54:38','2017-11-05 20:54:47');

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

insert  into `tbl_employee`(`id`,`position_id`,`department_id`,`emp_name`,`emp_gender`,`emp_dob`,`emp_pob`,`emp_current_living`,`emp_contact`,`emp_email`,`emp_relative`,`is_delete`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,1,'testtest',NULL,'0000-00-00',NULL,'','test@test',NULL,'',NULL,2,2,'2016-10-23 17:38:53','2016-10-23 17:41:07'),(2,1,1,'uikhj',NULL,'0000-00-00',NULL,'','',NULL,'',1,2,NULL,'2017-11-05 20:55:23','2017-11-05 20:55:29');

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

insert  into `tbl_invoice_sequence`(`id`,`sequence_no`) values (1,21);

/*Table structure for table `tbl_item` */

DROP TABLE IF EXISTS `tbl_item`;

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_barcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item` */

insert  into `tbl_item`(`id`,`item_code`,`item_barcode`,`image`,`item_category_id`,`item_sub_category_id`,`item_type_id`,`item_status_id`,`name`,`alias`,`qty`,`cost`,`price`,`default_currency`,`default_unit`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_active`,`is_delete`) values (1,'001','90111','12-Dec-2018/D041.jpg',1,1,1,2,'T-Shirt','T-Shirt',2.0000,10.000,14.000,1,7,'2018-12-12 22:38:34',2,'2018-12-12 22:40:37',2,1,0),(2,'23423','2343',NULL,1,2,1,2,'JW - T-Shirt','JW - T-Shirt',1.0000,10.000,15.000,1,7,'2018-12-12 23:47:56',2,'2018-12-12 23:47:56',0,1,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_base_branch` */

insert  into `tbl_item_base_branch`(`id`,`branch_id`,`item_category_id`,`item_id`,`is_delete`,`due_date`,`created_at`,`updated_at`) values (1,1,1,1,0,NULL,NULL,NULL),(2,1,2,2,0,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_category` */

insert  into `tbl_item_category`(`id`,`image`,`item_category_name`,`branch_id`,`is_delete`) values (1,NULL,'Clothes',1,0),(2,NULL,'Equipment',1,0);

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

insert  into `tbl_item_conversion`(`item_id`,`unit1`,`unit2`,`qty1`,`qty2`) values (1,7,7,1,1),(1,5,7,1,10),(2,7,7,1,1);

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

insert  into `tbl_item_size`(`id`,`abbr`,`size_name`,`description`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,'S','Small',NULL,0,1,2,2,'2017-11-05 20:56:18','2019-01-05 11:37:57'),(3,'L','Large',NULL,0,1,2,2,'2019-01-05 11:38:10','2019-01-05 11:38:14'),(4,'M','Medium',NULL,0,1,2,NULL,'2019-01-05 11:38:22','2019-01-05 11:38:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_status` */

insert  into `tbl_item_status`(`id`,`name`,`description`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Status Products','test',1,1,2,2,'2016-10-23 13:05:36','2016-10-23 13:08:57'),(2,'Instock','',0,1,2,2,'2016-10-23 14:07:44','2017-11-14 09:50:54'),(3,'Out of stock','',0,1,2,2,'2017-11-14 09:51:08','2017-11-14 09:51:46'),(4,'2 or 3 day instock','',0,1,2,2,'2017-11-14 09:51:25','2017-11-14 09:51:57');

/*Table structure for table `tbl_item_sub_category` */

DROP TABLE IF EXISTS `tbl_item_sub_category`;

CREATE TABLE `tbl_item_sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(4) DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_sub_category` */

insert  into `tbl_item_sub_category`(`id`,`image`,`branch_id`,`item_category_id`,`name`,`is_delete`) values (1,NULL,1,1,'Men Clothes',0),(2,NULL,1,1,'Women Clothes',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_item_type` */

insert  into `tbl_item_type`(`id`,`name`,`is_delete`,`is_active`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Modern',0,1,2,2,'2016-10-23 13:59:21','2017-11-14 09:52:22'),(2,'Classic',0,1,2,2,'2017-11-14 09:54:59','2017-11-14 09:55:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_location` */

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

insert  into `tbl_menu`(`id`,`fa_icon`,`parent_id`,`menu_type_id`,`menu_link`,`menu_code`,`default`,`url`,`ordering`,`is_active`,`created_date`,`modified_date`) values (1,'fa-dashboard',0,1,'','y5_m01',1,'/',1,1,NULL,NULL),(2,'fa-edit',0,1,'admin/admin','y5_m02',0,'/admin/admin',2,0,NULL,NULL),(3,'fa-list',0,1,'admin/audi_trail','y5_m09',0,NULL,3,1,NULL,NULL),(4,'fa-users',0,1,'admin/users','y5_m10',0,NULL,4,1,NULL,NULL),(5,'fa fa-gears',0,1,'admin/config/configuration','y5_m11',0,NULL,5,1,NULL,NULL),(6,NULL,4,3,'admin/users','y5_s24',0,'/admin/users',45,1,NULL,NULL),(7,NULL,4,3,'admin/user_groups','y5_s25',0,'admin/user_group',45,1,NULL,NULL),(8,NULL,4,3,'admin/users_group_role','y5_s26',0,'/admin/users_group_role',45,1,NULL,NULL),(10,NULL,5,3,'admin/config/configuration','y5_s43',0,NULL,45,1,NULL,NULL),(11,'fa-user',0,3,'admin/dashboard','y5_m14',0,NULL,6,1,NULL,NULL),(12,'fa-edit',0,1,'setup/system','y5_m15',0,NULL,45,1,NULL,NULL),(13,NULL,5,3,'admin/setup_mgr/currency','y5_s28',0,NULL,45,1,NULL,NULL),(15,'fa fa-money',0,1,'setup/sale','y5_m16',0,NULL,45,1,NULL,NULL),(16,NULL,15,3,'setup/sale/agency','y5_s30',0,NULL,11,1,NULL,NULL),(17,NULL,44,3,'admin/customer_mgr/customer','y5_s31',0,NULL,45,1,NULL,NULL),(19,NULL,15,3,'setup/sale/invoice','y5_s33',0,NULL,11,1,NULL,NULL),(21,'fa fa-database',0,1,'setup/sale/stock','y5_m17',0,NULL,45,1,NULL,NULL),(23,NULL,37,3,'admin/setup_mgr/item_category','y5_s36',0,NULL,1,1,NULL,NULL),(24,NULL,37,3,'admin/setup_mgr/item','y5_s37',0,NULL,3,1,NULL,NULL),(25,NULL,21,3,'admin/stock_mgr/actual_stock','y5_s38',0,NULL,45,1,NULL,NULL),(26,NULL,5,3,'setup/sale/stock/bank_account','y5_s39',0,NULL,45,1,NULL,NULL),(27,NULL,21,3,'setup/sale/stock/bank_account_history','y5_s40',0,NULL,45,0,NULL,NULL),(29,NULL,5,3,'admin/config/next_code','y5_s42',0,NULL,45,1,NULL,NULL),(30,NULL,12,3,'admin/setup_mgr/department','y5_s44',0,NULL,45,1,NULL,NULL),(31,NULL,12,3,'admin/setup_mgr/position','y5_s45',0,NULL,45,1,NULL,NULL),(32,NULL,12,3,'admin/setup_mgr/branch_group','y5_s46',0,NULL,45,1,NULL,NULL),(33,NULL,12,3,'admin/setup_mgr/branch','y5_s47',0,NULL,45,1,NULL,NULL),(34,NULL,12,3,'admin/setup_mgr/unit_group','y5_s48',0,NULL,45,1,NULL,NULL),(35,NULL,12,3,'admin/setup_mgr/unit','y5_s49',0,NULL,45,1,NULL,NULL),(36,NULL,12,3,'admin/setup_mgr/employee','y5_s50',0,NULL,45,1,NULL,NULL),(37,'fa fa-file-text',0,3,'setup/item','y5_m18',0,NULL,45,1,NULL,NULL),(38,NULL,37,3,'admin/setup_mgr/item_status','y5_s51',0,NULL,7,1,NULL,NULL),(39,NULL,37,3,'admin/item_mgr/item_base_store','y5_s52',0,NULL,9,1,NULL,NULL),(40,NULL,37,3,'admin/item_mgr/item_base_vendor','y5_s53',0,NULL,10,1,NULL,NULL),(41,'fa fa-institution',0,3,'mgr/supplier','y5_m19',0,NULL,45,1,NULL,NULL),(42,NULL,41,3,'admin/supplier_mgr/supplier','y5_s54',0,NULL,45,1,NULL,NULL),(44,'fa fa-users',0,3,'mrg/customer','y5_m20',0,NULL,45,1,NULL,NULL),(46,NULL,44,3,'admin/customer_mgr/customer_group','y5_s57',0,NULL,45,1,NULL,NULL),(47,NULL,44,3,'admin/customer_mgr/customer_field','y5_s58',0,NULL,45,1,NULL,NULL),(48,'fa fa-eyedropper',0,3,'mrg/tool','y5_m21',0,NULL,45,1,NULL,NULL),(49,NULL,48,3,'admin/tool_mgr/backup_list','y5_s59',0,NULL,45,1,NULL,NULL),(50,NULL,5,3,'admin/setup_mgr/language','y5_s60',0,NULL,45,1,NULL,NULL),(55,NULL,15,3,'setup/sale/purchase_invoice','y5_s65',0,NULL,11,1,NULL,NULL),(57,NULL,15,3,'setup/sale/purchase_order_number','y5_s67',0,NULL,11,1,NULL,NULL),(58,NULL,15,3,'setup/sale/purchase_order_vendor','y5_s68',0,NULL,11,1,NULL,NULL),(60,NULL,15,3,'admin/sale_mgr/return','y5_s70',0,NULL,3,1,NULL,NULL),(61,NULL,37,3,'admin/setup_mgr/item_size','y5_s71',0,NULL,6,1,NULL,NULL),(62,'fa fa-line-chart',0,3,'mrg/report','y5_m22',0,NULL,45,1,NULL,NULL),(63,NULL,62,3,'admin/report/summary_report','y5_s72',0,NULL,1,1,NULL,NULL),(64,NULL,62,3,'admin/report/inventory_on_hand','y5_s73',0,NULL,2,1,NULL,NULL),(65,NULL,62,3,'admin/report/sales_item','y5_s74',0,NULL,3,1,NULL,NULL),(66,NULL,62,3,'admin/report/item_information','y5_s75',0,NULL,4,1,NULL,NULL),(67,NULL,62,3,'admin/report/transfer_item','y5_s76',0,NULL,8,1,NULL,NULL),(68,NULL,21,3,'admin/stock_mgr/adjustment_stock','y5_s77',0,NULL,45,1,NULL,NULL),(69,NULL,37,3,'item_mgr/itemsize','y5_s78',0,NULL,6,1,NULL,NULL),(70,NULL,12,3,'admin/setup_mgr/stock_type','y5_s79',0,NULL,45,1,NULL,NULL),(71,'fa fa-th-large',0,3,'admin/store/main_store','y5_m23',0,'admin/store/main_store',45,1,NULL,NULL),(74,NULL,5,3,'admin/setup_mgr/company','y5_s82',0,NULL,45,1,NULL,NULL),(75,NULL,37,3,'admin/setup_mgr/item_type','y5_s83',0,NULL,5,1,NULL,NULL),(78,NULL,15,3,'admin/quotation','y5_s85',0,NULL,2,1,NULL,NULL),(80,NULL,15,3,'admin/transfer','y5_s86',0,NULL,45,1,NULL,NULL),(87,NULL,15,3,'admin/sale_mgr/sale_order','y5_s93',0,NULL,1,1,NULL,NULL),(88,NULL,37,3,'admin/setup_mgr/item_sub_category','y5_s94',0,NULL,2,1,NULL,NULL),(89,NULL,37,3,'admin/item_mgr/item_barcode','y5_s95',0,NULL,4,1,NULL,NULL),(90,'fa fa-dollar',0,3,'admin/discount','y5_m26',0,NULL,5,1,NULL,NULL),(91,NULL,90,3,'admin/discount/discount_item','y5_s96',0,NULL,2,1,NULL,NULL),(92,NULL,90,3,'admin/discount/discount_methods','y5_s97',0,NULL,1,1,NULL,NULL),(93,NULL,5,3,'admin/setup_mgr/item_location','y5_s98',0,NULL,45,1,NULL,NULL),(94,NULL,37,3,'admin/item_mgr/location_base_branch','y5_s99',0,NULL,8,1,NULL,NULL),(95,NULL,37,3,'admin/item_mgr/item_base_location','y5_s100',0,NULL,11,1,NULL,NULL),(96,NULL,62,3,'admin/report/return_item','y5_s101',0,NULL,9,1,NULL,NULL),(97,NULL,62,3,'admin/report/purchase_order_by_supplier','y5_s102',0,NULL,6,1,NULL,NULL),(99,NULL,0,3,'admin/vendor','y5_m30',0,NULL,1,1,NULL,NULL),(100,NULL,99,3,'admin/vendor','y5_s104',0,NULL,1,1,NULL,NULL),(102,NULL,15,3,'admin/stock_mgr/purchase_order','y5_s105',0,NULL,1,1,NULL,NULL);

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

insert  into `tbl_menu_description`(`id`,`menu_id`,`language_id`,`name`,`meta_description`,`meta_keywords`) values (1,1,2,'Home',NULL,NULL),(2,2,2,'Administrator',NULL,NULL),(3,3,2,'Audit trail',NULL,NULL),(4,4,2,'Users',NULL,NULL),(5,5,2,'Settings',NULL,NULL),(7,7,2,'User groups',NULL,NULL),(8,8,2,'Group roles',NULL,NULL),(10,10,2,'Configuration',NULL,NULL),(77,6,2,'Users',NULL,NULL),(78,12,2,'Store Setup',NULL,NULL),(79,13,2,'Currency Rates',NULL,NULL),(81,15,2,'Sale Management',NULL,NULL),(83,17,2,'Customers',NULL,NULL),(84,18,2,'Quotation',NULL,NULL),(87,21,2,'Stocks',NULL,NULL),(89,23,2,'Item Category',NULL,NULL),(90,24,2,'Items',NULL,NULL),(91,25,2,'Inventory Count',NULL,NULL),(92,26,2,'Bank Account',NULL,NULL),(94,29,2,'Next Codes',NULL,NULL),(95,30,2,'Departments',NULL,NULL),(96,31,2,'Positions',NULL,NULL),(97,32,2,'Branch Groups',NULL,NULL),(98,33,2,'Branchs',NULL,NULL),(99,34,2,'Unit Groups',NULL,NULL),(100,35,2,'Units',NULL,NULL),(101,36,2,'Employees',NULL,NULL),(102,37,2,'Items',NULL,NULL),(103,38,2,'Item Status',NULL,NULL),(104,39,2,'Item Base Branch',NULL,NULL),(105,40,2,'Item Base Vendor',NULL,NULL),(106,41,2,'Supplier Management',NULL,NULL),(107,42,2,'Suppliers',NULL,NULL),(109,44,2,'Customer Management',NULL,NULL),(111,46,2,'Customer Groups',NULL,NULL),(112,47,2,'Customer Fields',NULL,NULL),(113,48,2,'Tool Management',NULL,NULL),(114,49,2,'Back Up / Restore',NULL,NULL),(115,50,2,'Language',NULL,NULL),(125,60,2,'Return Items',NULL,NULL),(126,62,2,'Reports',NULL,NULL),(127,63,2,'Summary Reports',NULL,NULL),(128,64,2,'Inventory On Hand',NULL,NULL),(129,65,2,'Sales Item',NULL,NULL),(130,66,2,'Item Information',NULL,NULL),(131,67,2,'Transfer Item',NULL,NULL),(132,68,2,'Stock Adjustment',NULL,NULL),(133,61,2,'Item Size',NULL,NULL),(135,71,2,'Change Branch',NULL,NULL),(138,74,2,'Company',NULL,NULL),(139,75,2,'Item Type',NULL,NULL),(142,78,2,'Quotations',NULL,NULL),(144,80,2,'Transfers',NULL,NULL),(146,82,2,'Transfer List',NULL,NULL),(151,87,2,'Sale Orders',NULL,NULL),(152,88,2,'Item Subcategory',NULL,NULL),(153,70,2,'Stock Type',NULL,NULL),(154,89,2,'Generate Barcode',NULL,NULL),(155,90,2,'Discount',NULL,NULL),(156,91,2,'Discount By Items',NULL,NULL),(157,92,2,'Discount Methods',NULL,NULL),(158,93,2,'Location',NULL,NULL),(159,94,2,'Location Base Branch',NULL,NULL),(160,95,2,'Item Base Location',NULL,NULL),(161,96,2,'Return Item',NULL,NULL),(162,97,2,'Purchase Order By Supplier',NULL,NULL),(164,99,2,'Vendors',NULL,NULL),(165,100,2,'Vendors',NULL,NULL),(167,102,2,'Purchase Order',NULL,NULL);

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

insert  into `tbl_next_codes`(`id`,`module`,`cit`,`cet`,`prefix`,`suffix`,`length`,`year_format`,`month_format`,`created_at`,`updated_at`,`is_manaul`) values (1,'RECEIPT',3,1,'RCP-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-29 09:35:49',1),(2,'INVOICE',1,1,'INV-','00',4,'Y','m','2016-08-03 00:00:00','2016-09-09 16:02:58',1),(3,'QUOTATION',1,1,'QUO-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-03 00:00:00',1),(4,'TRANSFER',1,1,'TRNS-','00',4,'Y','m','2016-08-03 00:00:00','2016-08-03 00:00:00',1),(5,'RETURN',1,1,'RET-','00',4,'Y','m','2017-11-05 00:00:00','2017-11-05 00:00:00',1),(6,'SALE ORDER',1,1,'SO-','00',4,'Y','m','2017-11-06 00:00:00','2017-11-06 00:00:00',1);

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

insert  into `tbl_order_types`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'Dine In',NULL,'2018-02-02 00:00:00','2018-02-02 00:00:00'),(2,'Take a way',NULL,'2018-02-02 00:00:00','2018-02-02 00:00:00'),(3,'Delivery',NULL,'2018-02-02 00:00:00','2018-02-02 00:00:00');

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pos_cus_order_details_pos_menu_prices1_idx` (`item_id`) USING BTREE,
  KEY `fk_pos_cus_order_details_pos_cus_orders1_idx` (`pos_order_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_order_details` */

insert  into `tbl_pos_cus_order_details`(`id`,`pos_order_id`,`item_id`,`unit_id`,`qty`,`cost_amount`,`unit_price`,`price`,`is_cancel`,`is_delete`,`printed_qty`,`is_discount_item`,`discount_amount`,`created_at`,`updated_at`,`note`) values (1,1,1,3,1,'0.0000','4.0000','4.0000',0,1,NULL,0,0.0000,'2018-12-12 22:16:27','2018-12-12 22:17:04',NULL),(2,1,14,3,1,'0.0000','16.0000','16.0000',0,1,NULL,0,0.0000,'2018-12-12 22:16:28','2018-12-12 22:17:04',NULL),(3,1,15,3,1,'0.0000','4.0000','4.0000',0,1,NULL,0,0.0000,'2018-12-12 22:16:29','2018-12-12 22:17:05',NULL),(4,1,16,3,3,'0.0000','4.0000','12.0000',0,1,NULL,0,0.0000,'2018-12-12 22:16:30','2018-12-12 22:17:05',NULL),(5,1,21,3,1,'0.0000','15.0000','15.0000',0,1,NULL,0,0.0000,'2018-12-12 22:16:31','2018-12-12 22:17:08',NULL),(6,1,20,3,1,'0.0000','88.0000','88.0000',0,1,NULL,0,0.0000,'2018-12-12 22:16:31','2018-12-12 22:17:01',NULL),(7,1,16,3,1,'0.0000','4.0000','4.0000',0,0,NULL,0,0.0000,'2018-12-12 22:17:11','2018-12-12 22:17:11',NULL),(8,1,15,3,1,'0.0000','4.0000','4.0000',0,0,NULL,0,0.0000,'2018-12-12 22:17:13','2018-12-12 22:17:13',NULL),(9,2,1,3,2,'0.0000','4.0000','8.0000',0,0,NULL,0,0.0000,'2018-12-12 22:18:40','2018-12-12 22:18:49',NULL),(10,2,14,3,3,'0.0000','16.0000','48.0000',0,0,NULL,0,0.0000,'2018-12-12 22:18:41','2018-12-12 22:18:52',NULL),(11,3,1,7,1,'0.0000','0.0000','0.0000',0,1,NULL,0,0.0000,'2018-12-18 21:18:57','2018-12-18 21:19:03',NULL),(12,3,1,7,1,'0.0000','0.0000','0.0000',0,1,NULL,0,0.0000,'2018-12-18 21:18:57','2018-12-18 21:19:04',NULL),(13,4,1,7,1,'0.0000','0.0000','0.0000',0,1,NULL,0,0.0000,'2018-12-18 21:25:13','2018-12-18 21:25:18',NULL),(14,4,2,7,1,'0.0000','0.0000','0.0000',0,1,NULL,0,0.0000,'2018-12-18 21:25:15','2018-12-18 21:25:21',NULL),(15,3,2,7,1,'0.0000','0.0000','0.0000',0,1,NULL,0,0.0000,'2019-01-05 11:23:12','2019-01-05 11:23:16',NULL);

/*Table structure for table `tbl_pos_cus_order_sequence` */

DROP TABLE IF EXISTS `tbl_pos_cus_order_sequence`;

CREATE TABLE `tbl_pos_cus_order_sequence` (
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_order_sequence` */

insert  into `tbl_pos_cus_order_sequence`(`sequence`) values (28);

/*Table structure for table `tbl_pos_cus_orders` */

DROP TABLE IF EXISTS `tbl_pos_cus_orders`;

CREATE TABLE `tbl_pos_cus_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(11) DEFAULT '0',
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `invoice_no` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT '0',
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `is_void` tinyint(1) DEFAULT '0',
  `made_by` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `made_date` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_printed_receipt` tinyint(1) DEFAULT NULL,
  `cancel_by` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(3) DEFAULT '0',
  `discount_amount` decimal(16,4) DEFAULT '0.0000',
  `vat_percentag` decimal(10,4) DEFAULT '0.0000',
  `vat_amount` decimal(16,4) DEFAULT '0.0000',
  `sub_total_amount` decimal(16,4) DEFAULT '0.0000',
  `order_type_id` int(11) DEFAULT NULL,
  `drawer_id` int(11) DEFAULT NULL,
  `printed_qty` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `flag_check` tinyint(1) DEFAULT '0' COMMENT 'If_flagcheck = 1 means customer ordering products.',
  `ref_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `discount_method_id` int(11) DEFAULT NULL,
  `discount_by` int(11) DEFAULT NULL,
  `discount_profile_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pos_cus_orders_discount_methods1_idx` (`discount_method_id`) USING BTREE,
  KEY `fk_pos_cus_orders_discount_profiles1_idx` (`discount_profile_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_cus_orders` */

insert  into `tbl_pos_cus_orders`(`id`,`order_no`,`branch_id`,`invoice_no`,`unit_id`,`customer_id`,`check_in_date`,`check_out_date`,`is_void`,`made_by`,`made_date`,`is_printed_receipt`,`cancel_by`,`discount`,`discount_amount`,`vat_percentag`,`vat_amount`,`sub_total_amount`,`order_type_id`,`drawer_id`,`printed_qty`,`status_id`,`flag_check`,`ref_id`,`created_at`,`updated_at`,`discount_method_id`,`discount_by`,`discount_profile_type_id`) values (1,25,1,NULL,NULL,1,'2018-12-12 22:15:42','2018-12-12 22:15:42',0,'2',NULL,NULL,NULL,0,'0.0000','0.0000','0.0000','8.0000',NULL,NULL,NULL,4,0,NULL,'2018-12-12 22:15:42','2018-12-12 22:17:25',NULL,NULL,NULL),(2,26,1,NULL,NULL,1,'2018-12-12 22:18:37','2018-12-12 22:18:37',0,'2',NULL,NULL,NULL,0,'0.0000','0.0000','0.0000','20.0000',NULL,NULL,NULL,4,0,NULL,'2018-12-12 22:18:37','2018-12-12 22:19:03',NULL,NULL,NULL),(3,27,1,NULL,NULL,1,'2018-12-18 21:18:52','2018-12-18 21:18:52',0,'2',NULL,NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',NULL,NULL,NULL,3,0,NULL,'2018-12-18 21:18:52','2019-01-05 11:23:12',NULL,NULL,NULL),(4,28,1,NULL,NULL,1,'2018-12-18 21:25:08','2018-12-18 21:25:08',0,'2',NULL,NULL,NULL,0,'0.0000','0.0000','0.0000','0.0000',NULL,NULL,NULL,4,0,NULL,'2018-12-18 21:25:08','2018-12-18 21:25:42',NULL,NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_outlets` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_reciept` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_pos_tables` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_position` */

insert  into `tbl_position`(`id`,`name`,`is_active`,`is_delete`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Designer',1,0,2,2,'2016-10-23 14:32:02','2017-11-05 20:57:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_order` */

insert  into `tbl_purchase_order`(`id`,`po_number`,`po_date`,`pr_id`,`sub_total`,`vat_amount`,`shipping`,`grand_total`,`po_footer_remark`,`is_post`,`is_cancel`,`is_approve`,`post_date`,`cancel_date`,`branch_id`,`supplier_id`,`description`,`sub_discount`,`make_by`,`remark`,`created_at`,`updated_at`) values (1,'PO-001','2018-12-25 00:00:00',NULL,24.000,0.000,0.000,24.000,NULL,NULL,NULL,1,NULL,NULL,1,1,'sadf',0,'2',NULL,NULL,'2018-12-13 22:20:49'),(2,'PO-002','2018-12-25 00:00:00',NULL,60.000,0.000,0.000,60.000,NULL,NULL,NULL,0,NULL,NULL,1,1,'',0,'2',NULL,NULL,NULL),(3,'PO-003','2018-12-25 00:00:00',NULL,24.000,0.000,0.000,24.000,NULL,NULL,NULL,0,NULL,NULL,1,1,'',0,'2',NULL,NULL,NULL),(4,'PO-004','2018-12-25 00:00:00',NULL,48.000,0.000,0.000,48.000,NULL,NULL,NULL,0,NULL,NULL,1,1,'',0,'2',NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_purchase_order_detail` */

insert  into `tbl_purchase_order_detail`(`id`,`po_id`,`delivery_date`,`qty`,`receive_qty`,`unit_id`,`price`,`discount_id`,`discount_amount`,`change`,`item_id`,`is_complete`,`total`,`remark`) values (17,1,NULL,2,NULL,7,12,NULL,0,NULL,1,NULL,24.000,'12'),(18,2,NULL,10,NULL,5,15,NULL,0,NULL,1,NULL,30.000,''),(19,2,NULL,2,NULL,5,15,NULL,0,NULL,1,NULL,30.000,''),(21,4,NULL,2,NULL,5,12,NULL,0,NULL,1,NULL,24.000,''),(22,4,NULL,2,NULL,5,12,NULL,0,NULL,1,NULL,24.000,''),(24,3,NULL,2,NULL,5,12,NULL,0,NULL,1,NULL,24.000,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_quotation` */

insert  into `tbl_quotation`(`id`,`quotation_no`,`quotation_date`,`quotation_item_master`,`customer_id`,`description`,`sub_total`,`discount`,`vat_percentage`,`grand_total`,`is_void`,`is_cancel`,`branch_id`,`expired_date`,`created_at`,`updated_at`,`created_by`,`updated_by`,`is_approve`,`is_sale_order`) values (1,'QUO-201711004','2017-11-30 00:00:00',NULL,1,'',0.00,NULL,0.00,0.00,'',NULL,1,'0000-00-00 00:00:00',NULL,'2018-05-25 09:11:27',2,NULL,0,0),(2,'QUO-201812003','2018-12-14 00:00:00',NULL,1,'',42.00,NULL,0.00,42.00,NULL,NULL,1,'0000-00-00 00:00:00',NULL,'2018-12-14 10:19:41',2,2,1,1);

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

insert  into `tbl_quotation_detail`(`quotation_id`,`branch_id`,`unit_id`,`quotation_date`,`quotation_qty`,`comp_qty`,`void_qty`,`item_id`,`retailer_price`,`whole_sale_price`,`DisMethodId`,`discount_amount`,`quotation_price`,`whole_sell_unit`,`retail_unit`,`item_sell_price_id`,`total`,`remark`) values (1,1,0,NULL,0.00,NULL,NULL,0,NULL,0.00,NULL,NULL,0.00,NULL,NULL,NULL,0.00,''),(2,1,5,NULL,2.00,NULL,NULL,1,NULL,21.00,NULL,NULL,21.00,NULL,NULL,NULL,42.00,'');

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

insert  into `tbl_quotation_sequence`(`id`,`sequence_no`) values (1,4);

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

insert  into `tbl_return`(`id`,`branch_id`,`bill_no`,`return_no`,`return_date`,`return_by`,`verify_by`,`description`,`is_returned`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,'Bill-001','RET-201812007','2018-12-25','Dara','sineth','descr',1,NULL,NULL,'2018-12-14 10:57:28','2018-12-14 10:59:01');

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

insert  into `tbl_return_detail`(`return_id`,`unit_id`,`item_id`,`qty`,`unit_price`,`remark`) values (1,5,1,3,NULL,'rearmark'),(1,7,1,1,NULL,'rearmark'),(1,7,1,1,NULL,'rearmark');

/*Table structure for table `tbl_return_sequence` */

DROP TABLE IF EXISTS `tbl_return_sequence`;

CREATE TABLE `tbl_return_sequence` (
  `id` int(11) NOT NULL DEFAULT '1',
  `sequence_no` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_return_sequence` */

insert  into `tbl_return_sequence`(`id`,`sequence_no`) values (1,8);

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
  `discount` float(10,2) DEFAULT NULL,
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

insert  into `tbl_sale_order`(`id`,`sale_order_no`,`invoice_no`,`quotation_no`,`sale_order_date`,`sale_order_item_master`,`customer_id`,`description`,`sub_total`,`discount`,`vat_percentage`,`grand_total`,`sale_return`,`is_void`,`is_cancel`,`branch_id`,`expired_date`,`created_at`,`updated_at`,`created_by`,`updated_by`,`is_approve`) values (1,'SO-201812003',NULL,NULL,'2018-12-13 00:00:00',NULL,1,'Descriptioon',480.00,NULL,0.00,480.00,NULL,NULL,NULL,1,'2018-12-13 00:00:00',NULL,'2018-12-13 23:25:52',2,2,1),(2,'SO-201812003',NULL,NULL,'2018-12-14 00:00:00',NULL,1,'13',39.00,NULL,0.00,39.00,NULL,NULL,NULL,1,'2018-12-14 00:00:00',NULL,NULL,2,NULL,1),(3,'SO-201812004','INV-2018120020','QUO-201812003','2018-12-14 10:19:41',NULL,1,'',42.00,NULL,0.00,42.00,NULL,NULL,NULL,1,'0000-00-00 00:00:00','2018-12-14 10:19:41','2018-12-14 10:19:41',2,2,1);

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

insert  into `tbl_sale_order_detail`(`sale_order_id`,`branch_id`,`unit_id`,`sale_order_date`,`sale_order_qty`,`comp_qty`,`void_qty`,`item_id`,`retailer_price`,`whole_sale_price`,`DisMethodId`,`discount_amount`,`sale_order_price`,`whole_sell_unit`,`retail_unit`,`item_sell_price_id`,`total`,`remark`) values (1,1,7,NULL,2.00,NULL,NULL,2,NULL,120.00,NULL,NULL,120.00,NULL,NULL,NULL,240.00,''),(1,1,5,NULL,2.00,NULL,NULL,1,NULL,120.00,NULL,NULL,120.00,NULL,NULL,NULL,240.00,''),(2,1,5,NULL,2.00,NULL,NULL,1,NULL,12.00,NULL,NULL,12.00,NULL,NULL,NULL,24.00,''),(2,1,7,NULL,1.00,NULL,NULL,2,NULL,15.00,NULL,NULL,15.00,NULL,NULL,NULL,15.00,''),(3,1,5,NULL,2.00,NULL,NULL,1,NULL,21.00,NULL,NULL,21.00,NULL,NULL,NULL,42.00,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_sale_summary_item` */

insert  into `tbl_sale_summary_item`(`id`,`branch_id`,`sale_menu_id`,`unit_id`,`sale_date`,`sale_qty`,`comp_qty`,`void_qty`,`item_id`,`retail_price`,`whole_sale_price`,`discount_method_id`,`discount_amount`,`tax_amount`,`sub_total`,`grand_total`,`cost_price`,`sale_price`,`net_price`,`item_code`,`item_serial_number`) values (1,1,1,5,'2019-01-05 00:00:00',2.00,NULL,1.00,1,NULL,NULL,NULL,0.00,0.00,0.00,100.00,5.00,5.00,5.00,NULL,NULL),(2,1,2,7,'2019-01-05 00:00:00',3.00,NULL,1.00,1,NULL,NULL,NULL,0.00,0.00,0.00,100.00,10.00,0.00,0.00,NULL,NULL),(3,1,2,7,'2019-01-05 00:00:00',3.00,NULL,1.00,2,NULL,NULL,NULL,0.00,0.00,0.00,100.00,20.00,0.00,0.00,NULL,NULL),(4,1,2,7,'2019-01-05 00:00:00',3.00,NULL,1.00,1,NULL,NULL,NULL,0.00,0.00,0.00,100.00,10.00,0.00,0.00,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_supplier` */

insert  into `tbl_supplier`(`id`,`branch_id`,`name`,`company_name`,`contact`,`email`,`address`,`website`,`is_delete`,`is_active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,1,'Skymall',NULL,'asdf','','','',0,1,'2016-10-23 17:13:25','2018-05-16 20:43:41',NULL,NULL),(2,1,'CLAir',NULL,'0182212222','test@tes12t.com','','wwww',0,1,'2017-01-28 09:41:55','2018-05-16 20:43:51',NULL,NULL);

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

insert  into `tbl_transfer`(`id`,`from_branch_id`,`to_branch_id`,`transfer_no`,`transfer_date`,`transferor`,`receiver`,`description`,`voucher_no`,`is_transfered`,`is_received`,`is_cancel`,`total`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,2,'TRNS-201812005','2018-12-12','sineth','dara','description',NULL,1,1,0,NULL,2,2,'2018-12-14 14:41:20','2018-12-14 14:41:26');

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

insert  into `tbl_transfer_detail`(`transfer_id`,`unit_id`,`item_id`,`qty`,`remark`,`total`) values (1,5,1,1,'rear',NULL),(1,7,1,3,'rear',NULL),(1,7,1,2,'rear',NULL);

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

insert  into `tbl_transfer_sequence`(`id`,`sequence_no`) values (1,6);

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

insert  into `tbl_user`(`id`,`username`,`password`,`group_id`,`photo`,`remember_token`,`email`,`profile_image`,`created_at`,`updated_at`) values (2,'admin','$2y$10$IAJ32BbktMky0TfW.YH5FOeNU9u1.JT/P5VOFrHLt05SBOylaxBji',1,'16-Oct-2016/camera (3).jpg','WYmuGh95ntGsEaH8czCuaDAsf3ueugL94QeuUi0lWWfdkGfWFtfcufTGcDxw','admin@admin.com',NULL,NULL,'2018-12-22 14:27:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_vendor` */

insert  into `tbl_vendor`(`id`,`branch_id`,`image`,`vendor_name`,`contact`,`address1`,`address2`,`tel1`,`tel2`,`tel3`,`fax1`,`fax2`,`account_number`,`terms_of_payment`,`delivery_day`,`email`,`website`,`vendor_code`,`description`,`is_active`,`is_vat`,`vat_no`,`is_delete`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,NULL,'Pisey','081333 333','asdf','asdf','asdf','asdf','asdf','asdf','asdf','asdf','asdf',0,'sadfsdf@tesa.com','asdf','12312',NULL,'','','asdf',0,NULL,NULL,'2016-10-23 16:19:02','2018-12-19 09:42:22');

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
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
