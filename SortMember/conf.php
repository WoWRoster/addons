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

$fileversion='0.1';

define('ROSTER_SORTMEMBER_CONFIG_TABLE',$GLOBALS['db_prefix'].'addon_sortmember_config');

// -[ Test if our config table exists ]-
$query = "SHOW TABLES LIKE '".ROSTER_SORTMEMBER_CONFIG_TABLE."'";

$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'AltMonitor',__FILE__,__LINE__, $query );

if ( $row = $wowdb->fetch_assoc($result) )
{
	$wowdb->free_result($result);

	// -[ Get config values and insert them into the array ]-
	$query = "SELECT `config_name`, `config_value` FROM `".ROSTER_SORTMEMBER_CONFIG_TABLE."` ORDER BY `id` ASC;";

	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'AltMonitor',__FILE__,__LINE__, $query );

	while( $row = $wowdb->fetch_assoc($result) )
	{
		$addon_conf['AltMonitor'][$row['config_name']] = stripslashes($row['config_value']);
	}

	$wowdb->free_result($result);

	$dbversion = $addon_conf['AltMonitor']['version'];
}
else
{
	$dbversion = '0.0.0'; // we need to install
	$addon_conf['AltMonitor']['update_type'] = 0; // for the trigger file
}

?>
