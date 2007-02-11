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

$install_sql['0.0.1'] = "
DROP TABLE IF EXISTS `".ROSTER_ADDON_ROSTER_DKP_CONFIG."`;
CREATE TABLE `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` (
  `id` int(11) NOT NULL,
  `config_name` varchar(255) default NULL,
  `config_value` tinytext,
  `form_type` mediumtext,
  `config_type` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# Master data for the config file
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1,'config_list','build|display','display','master');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (2,'version','0.1.0','display','master');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (3,'startpage','1','display','master')
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (3,'roster_dkp_password','".md5('password')."','password:30|30','master')

# Build settings
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1000,'getmain_regex','/ALT-([\\\\\\\\w]+)/i','text{50|30','build');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1010,'getmain_field','note','text{15|30','build');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1020,'getmain_match','1','text{2|30','build');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1030,'getmain_main','Main','text{20|30','build');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1040,'defmain','1','radio{Main^1|Mainless Alt^0','build');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1050,'invmain','0','radio{Main^1|Mainless Alt^0','build');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (1060,'altofalt','alt','select{Try to resolve^resolve|Leave in table^leave|Set as main^main|Set as mainless alt^alt','build');

# Display options
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (2000,'showmain','0','radio{Show^1|Hide^0','display');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (2010,'altopen','1','radio{Open^1|Closed^0','display');
INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` VALUES (2020,'mainlessbottom','1','radio{Bottom^1|Top^0','display')
";

$install_sql['0.1.0'] = "
UPDATE `".ROSTER_ADDON_ROSTER_DKP_CONFIG."` SET `form_type` = 'select{Member name^name|Guild Title^guild_title|Public note^note|Officer note^officer_note' WHERE `config_name` = 'getmain_field'
";


?>
