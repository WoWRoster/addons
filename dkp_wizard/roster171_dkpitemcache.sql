-- phpMyAdmin SQL Dump
-- version 2.6.4-pl1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 20, 2006 at 02:08 AM
-- Server version: 4.1.20
-- PHP Version: 5.1.4
-- 
-- Database: `fantasyworld_roster`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `roster171_dkpitemcache`
-- 

CREATE TABLE `roster171_dkpitemcache` (
  `cache_id` int(11) NOT NULL auto_increment,
  `storedate` datetime NOT NULL default '0000-00-00 00:00:00',
  `item_name` varchar(96) NOT NULL default '',
  `item_id` varchar(32) NOT NULL default '',
  `item_quality` int(11) NOT NULL default '1',
  `item_tooltip` mediumtext NOT NULL,
  `item_color` varchar(16) NOT NULL default '',
  `item_texture` varchar(64) NOT NULL default '',
  `dkp_value` float(6,2) NOT NULL default '0.00',
  UNIQUE KEY `loot_id` (`cache_id`),
  UNIQUE KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `roster171_dkpitemcache`
-- 

INSERT INTO `roster171_dkpitemcache` VALUES (17, '2006-08-19 19:43:00', 'TestItemYeah', '16684:0:3:0:4', 2, ' Magister''s Gloves\n Binds when equipped\n Hands	Cloth\n 52 Armor\n +14 Spirit\n +14 Intellect\n +9 Stamina\n Requires Level 54\n', 'ffff', 'INV_tessie.png', 0.00);
INSERT INTO `roster171_dkpitemcache` VALUES (15, '2006-08-18 16:15:00', 'TestItemYeah', '16683,4.3', 2, 'TestItemYeah', 'ffff', 'INV_tessie.png', 0.00);
INSERT INTO `roster171_dkpitemcache` VALUES (16, '2006-08-18 16:16:00', 'TestItemYeah', '16683:0:3:0:4', 2, ' Magister''s Bindings\n Binds when equipped\n Wrist	Cloth\n 35 Armor\n +15 Intellect\n +5 Spirit\n +4 Stamina\n Requires Level 52\n', 'ffff', 'INV_tessie.png', 0.00);
