/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.0.17-MariaDB : Database - openclassifieds
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `oc2_access` */

CREATE TABLE `oc2_access` (
  `id_access` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_role` int(10) unsigned NOT NULL,
  `access` varchar(100) NOT NULL,
  PRIMARY KEY (`id_access`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_ads` */

CREATE TABLE `oc2_ads` (
  `id_ad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_category` int(10) unsigned NOT NULL DEFAULT '0',
  `id_location` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(145) NOT NULL,
  `seotitle` varchar(145) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(145) DEFAULT '0',
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `price` decimal(14,3) NOT NULL DEFAULT '0.000',
  `phone` varchar(30) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `ip_address` bigint(20) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` datetime DEFAULT NULL,
  `featured` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `has_images` tinyint(1) NOT NULL DEFAULT '0',
  `stock` int(10) unsigned DEFAULT NULL,
  `rate` float(4,2) DEFAULT NULL,
  `favorited` int(10) unsigned NOT NULL DEFAULT '0',
  `cf_map-link` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_ad`) USING BTREE,
  UNIQUE KEY `oc2_ads_UK_seotitle` (`seotitle`),
  KEY `oc2_ads_IK_id_user` (`id_user`),
  KEY `oc2_ads_IK_id_category` (`id_category`),
  KEY `oc2_ads_IK_title` (`title`),
  KEY `oc2_ads_IK_status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_categories` */

CREATE TABLE `oc2_categories` (
  `id_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `order` int(2) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_category_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_deep` int(2) unsigned NOT NULL DEFAULT '0',
  `seoname` varchar(145) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `last_modified` datetime DEFAULT NULL,
  `has_image` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_category`) USING BTREE,
  UNIQUE KEY `oc2_categories_IK_seo_name` (`seoname`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_config` */

CREATE TABLE `oc2_config` (
  `group_name` varchar(128) NOT NULL,
  `config_key` varchar(128) NOT NULL,
  `config_value` longtext,
  PRIMARY KEY (`config_key`),
  UNIQUE KEY `oc2_config_UK_group_name_AND_config_key` (`group_name`,`config_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_content` */

CREATE TABLE `oc2_content` (
  `id_content` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) NOT NULL DEFAULT 'en_UK',
  `order` int(2) unsigned NOT NULL DEFAULT '0',
  `title` varchar(145) NOT NULL,
  `seotitle` varchar(145) NOT NULL,
  `description` longtext,
  `from_email` varchar(145) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` enum('page','email','help') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_content`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_coupons` */

CREATE TABLE `oc2_coupons` (
  `id_coupon` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned DEFAULT NULL,
  `name` varchar(145) NOT NULL,
  `notes` varchar(245) DEFAULT NULL,
  `discount_amount` decimal(14,3) NOT NULL DEFAULT '0.000',
  `discount_percentage` decimal(14,3) NOT NULL DEFAULT '0.000',
  `number_coupons` int(10) DEFAULT NULL,
  `valid_date` datetime DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_coupon`),
  UNIQUE KEY `oc2_coupons_UK_name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_crontab` */

CREATE TABLE `oc2_crontab` (
  `id_crontab` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `period` varchar(50) NOT NULL,
  `callback` varchar(140) NOT NULL,
  `params` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_started` datetime DEFAULT NULL,
  `date_finished` datetime DEFAULT NULL,
  `date_next` datetime DEFAULT NULL,
  `times_executed` bigint(20) DEFAULT '0',
  `output` varchar(50) DEFAULT NULL,
  `running` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_crontab`),
  UNIQUE KEY `oc2_crontab_UK_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_favorites` */

CREATE TABLE `oc2_favorites` (
  `id_favorite` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_ad` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_favorite`) USING BTREE,
  KEY `oc2_favorites_IK_id_user_AND_id_ad` (`id_user`,`id_ad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_forums` */

CREATE TABLE `oc2_forums` (
  `id_forum` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `order` int(2) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_forum_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_deep` int(2) unsigned NOT NULL DEFAULT '0',
  `seoname` varchar(145) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_forum`) USING BTREE,
  UNIQUE KEY `oc2_forums_IK_seo_name` (`seoname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_locations` */

CREATE TABLE `oc2_locations` (
  `id_location` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `order` int(2) unsigned NOT NULL DEFAULT '0',
  `id_location_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_deep` int(2) unsigned NOT NULL DEFAULT '0',
  `seoname` varchar(145) NOT NULL,
  `description` text,
  `last_modified` datetime DEFAULT NULL,
  `has_image` tinyint(1) NOT NULL DEFAULT '0',
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id_location`),
  UNIQUE KEY `oc2_loations_UK_seoname` (`seoname`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_messages` */

CREATE TABLE `oc2_messages` (
  `id_message` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ad` int(10) unsigned DEFAULT NULL,
  `id_message_parent` int(10) unsigned DEFAULT NULL,
  `id_user_from` int(10) unsigned NOT NULL,
  `id_user_to` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `price` decimal(14,3) NOT NULL DEFAULT '0.000',
  `read_date` datetime DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_to` tinyint(1) NOT NULL DEFAULT '0',
  `status_from` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_orders` */

CREATE TABLE `oc2_orders` (
  `id_order` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_ad` int(10) unsigned DEFAULT NULL,
  `id_product` varchar(20) NOT NULL,
  `id_coupon` int(10) unsigned DEFAULT NULL,
  `paymethod` varchar(20) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pay_date` datetime DEFAULT NULL,
  `currency` char(3) NOT NULL,
  `amount` decimal(14,3) NOT NULL DEFAULT '0.000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(145) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `featured_days` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `oc2_orders_IK_id_user` (`id_user`),
  KEY `oc2_orders_IK_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_posts` */

CREATE TABLE `oc2_posts` (
  `id_post` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_post_parent` int(10) unsigned DEFAULT NULL,
  `id_forum` int(10) unsigned DEFAULT NULL,
  `title` varchar(245) NOT NULL,
  `seotitle` varchar(245) NOT NULL,
  `description` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`) USING BTREE,
  UNIQUE KEY `oc2_posts_UK_seotitle` (`seotitle`),
  KEY `oc2_posts_IK_id_user` (`id_user`),
  KEY `oc2_posts_IK_id_post_parent` (`id_post_parent`),
  KEY `oc2_posts_IK_id_forum` (`id_forum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_reviews` */

CREATE TABLE `oc2_reviews` (
  `id_review` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_ad` int(10) unsigned NOT NULL,
  `rate` int(2) unsigned NOT NULL DEFAULT '0',
  `description` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_review`) USING BTREE,
  KEY `oc2_reviews_IK_id_user` (`id_user`),
  KEY `oc2_reviews_IK_id_ad` (`id_ad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_roles` */

CREATE TABLE `oc2_roles` (
  `id_role` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(245) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `oc2_roles_UK_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_subscribers` */

CREATE TABLE `oc2_subscribers` (
  `id_subscribe` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_category` int(10) unsigned NOT NULL DEFAULT '0',
  `id_location` int(10) unsigned NOT NULL DEFAULT '0',
  `min_price` decimal(14,3) NOT NULL DEFAULT '0.000',
  `max_price` decimal(14,3) NOT NULL DEFAULT '0.000',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subscribe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_users` */

CREATE TABLE `oc2_users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `seoname` varchar(145) DEFAULT NULL,
  `email` varchar(145) NOT NULL,
  `password` varchar(64) NOT NULL,
  `description` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `id_role` int(10) unsigned DEFAULT '1',
  `id_location` int(10) unsigned DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` datetime DEFAULT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_ip` bigint(20) DEFAULT NULL,
  `user_agent` varchar(40) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `token_created` datetime DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(40) DEFAULT NULL,
  `hybridauth_provider_name` varchar(40) DEFAULT NULL,
  `hybridauth_provider_uid` varchar(245) DEFAULT NULL,
  `subscriber` tinyint(1) NOT NULL DEFAULT '1',
  `rate` float(4,2) DEFAULT NULL,
  `has_image` tinyint(1) NOT NULL DEFAULT '0',
  `failed_attempts` int(10) unsigned NOT NULL DEFAULT '0',
  `last_failed` datetime DEFAULT NULL,
  `notification_date` datetime DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `oc2_users_UK_email` (`email`),
  UNIQUE KEY `oc2_users_UK_token` (`token`),
  UNIQUE KEY `oc2_users_UK_api_token` (`api_token`),
  UNIQUE KEY `oc2_users_UK_seoname` (`seoname`),
  UNIQUE KEY `oc2_users_UK_provider_AND_uid` (`hybridauth_provider_name`,`hybridauth_provider_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `oc2_visits` */

CREATE TABLE `oc2_visits` (
  `id_visit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ad` int(10) unsigned DEFAULT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  `contacted` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_visit`),
  KEY `oc2_visits_IK_id_ad` (`id_ad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
