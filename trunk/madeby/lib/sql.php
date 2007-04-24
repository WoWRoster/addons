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
 * $Id: sql.php 1 2006-06-17 14:45:00Z PleegWat $
 *
 ******************************/
// madeby sql 
if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}
$lang = $roster_conf['roster_lang'];

$install_sql['2.0.2'] = "
DROP TABLE IF EXISTS `".MADEBY_CONFIG_TABLE."`;
CREATE TABLE `".MADEBY_CONFIG_TABLE."` (
  `id` int(11) NOT NULL,
  `config_name` varchar(255) default NULL,
  `config_value` tinytext,
  `form_type` mediumtext,
  `config_type` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# Master data for the config file
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1,'config_list','display|recipe','display','master');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2,'version','1.0.0','display','master');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (3,'startpage','display','display','master');

# Display settings
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1000,'display_recipe_icon','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1010,'display_recipe_name','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1020,'display_recipe_level','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1030,'display_recipe_tooltip','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1040,'display_recipe_type','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1050,'display_recipe_reagents','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1060,'display_recipe_makers','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1070,'display_recipe_makers_count','3','select{1^1|2^2|3^3|4^4|5^5|6^6|7^7|8^8|9^9|10^10','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1080,'display_prof_bar','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1090,'default_sort_by','type','select{Sort by Type^type|Sort by Level^level','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1100,'display_language_bar','0','radio{Show^1|Hide^0','display');

INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1110,'allow_enUS','1','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1120,'allow_deDE','0','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1130,'allow_frFR','0','radio{Show^1|Hide^0','display');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1140,'allow_esES','0','radio{Show^1|Hide^0','display');

#recipe settings
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2000,'Blacksmithing','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2010,'Mining','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2030,'Alchemy','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2040,'Leatherworking','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2060,'Tailoring','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2070,'Enchanting','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2080,'Engineering','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2090,'Cooking','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2110,'First Aid','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2120,'Poisons','1','radio{Show^1|Hide^0','recipe');
INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (2130,'Jewelcrafting','1','radio{Show^1|Hide^0','recipe');";

// build a list of languages installed

//$install_sql['1.3.0'] = "
//INSERT INTO `".MADEBY_CONFIG_TABLE."` VALUES (1100,'multi_lang_use','$lang','$ulang','display');";
?>