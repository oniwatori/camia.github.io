-- CREATE DATABASE
DROP DATABASE IF EXISTS mysql_camia_resort;
CREATE DATABASE IF NOT EXISTS mysql_camia_resort;
USE mysql_camia_resort;

-- CREATE TABLE USER
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `roles` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) unsigned DEFAULT '1',
  `visited` datetime DEFAULT NULL,
  `updater` int(11) DEFAULT NULL,
  `inserted` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  `deleted` timestamp,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- INSERT ADMINISTRATOR USER
INSERT INTO `tbl_user`
(`username`,`password`,`roles`,`fullname`,`inserted`,`updated`)
VALUES
('admin','admin',1,'Administrator',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

-- CREATE TABLE HORIZONTAL FUNCTION
CREATE TABLE  IF NOT EXISTS `tbl_horizontal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `horizontal_id` int(11) DEFAULT '0',
  `seq` INT NOT NULL,
  `is_module` tinyint(2) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `updater` int(11) NOT NULL,
  `inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `alias` (`alias`),
  KEY `horizontal_id` (`horizontal_id`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- INSERT HOME MENU
INSERT INTO `tbl_horizontal` (`name`,`alias`,`seq`,`updater`) VALUES 
('Destination','destination', 1, 1),('Resort','resort', 2, 1),
('Accommodation','accommodation', 3, 1),('Dining','dining', 4, 1),
('Wedding','wedding', 5, 1),('SPA','spa', 6, 1),
('Rock club','rock club', 7, 1),('Facilities','facilities', 8, 1),
('Gallery','gallery', 9, 1);


-- CREATE TABLE POST FUNCTION
CREATE TABLE  IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `horizontal_id` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT 1,
  `updater` int(11) NOT NULL,
  `inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `alias` (`alias`),
  KEY `horizontal_id` (`horizontal_id`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- CREATE TABLE LANG FUNCTION
CREATE TABLE  IF NOT EXISTS `tbl_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,tbl_posttbl_post
  `alias` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `updater` int(11) NOT NULL,
  `inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `alias` (`alias`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
INSERT INTO `tbl_language` (`name`, `alias`, `updater`) VALUES ('VI', 'vi-VN', 1), ('EN', 'en-US', 1);

-- CREATE TABLE POST DETAIL FUNCTION
CREATE TABLE  IF NOT EXISTS `tbl_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(255) NOT NULL,
  `post_id` int(11) DEFAULT '0',
  `content` text,
  `status` tinyint(4) DEFAULT 1,
  `updater` int(11) NOT NULL,
  `inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `language_id` (`language_id`),
  KEY `post_id` (`post_id`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
