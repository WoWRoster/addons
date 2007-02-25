<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$install_sql['0.1'] = "
DROP TABLE IF EXISTS `".ROSTER_SORTMEMBER_CONFIG_TABLE."`;
CREATE TABLE `".ROSTER_SORTMEMBER_CONFIG_TABLE."` (
  `id` int(11) NOT NULL,
  `config_name` varchar(255) default NULL,
  `config_value` tinytext,
  `form_type` mediumtext,
  `config_type` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# Master data for the config file
INSERT INTO `".ROSTER_SORTMEMBER_CONFIG_TABLE."` VALUES (1,'config_list','display','display','master');
INSERT INTO `".ROSTER_SORTMEMBER_CONFIG_TABLE."` VALUES (2,'version','1.0.1','display','master');
INSERT INTO `".ROSTER_SORTMEMBER_CONFIG_TABLE."` VALUES (3,'startpage','display','display','master');

# Build settings
INSERT INTO `".ROSTER_SORTMEMBER_CONFIG_TABLE."` VALUES (1000,'openfilter','0','radio{Show^1|Hide^0','display');
";

$uninstall_sql['1.0.0'] = "
DROP TABLE IF EXISTS `".ROSTER_SORTMEMBER_CONFIG_TABLE."`;
";
?>
