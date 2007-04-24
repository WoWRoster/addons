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

#--[ CONFIG ]--------------------------------------------------------

define('MADEBY_CONFIG_TABLE', $db_prefix.'addon_madeby_config');
include_once($addonDir.'lib/madeby_common.php');  

$fileversion='2.0.2';

$query = "SHOW TABLES LIKE '".MADEBY_CONFIG_TABLE."'";

$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'MadeBy',__FILE__,__LINE__, $query );

if ( $row = $wowdb->fetch_assoc($result) )
{
//	$wowdb->free_result($result);

	// -[ Get config values and insert them into the array ]-
	$query = "SELECT `config_name`, `config_value` FROM `".MADEBY_CONFIG_TABLE."` ORDER BY `id` ASC;";

	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'MadeBy',__FILE__,__LINE__, $query );

	while( $row = $wowdb->fetch_assoc($result) )
	{
		$addon_conf['MadeBy'][$row['config_name']] = stripslashes($row['config_value']);
	}

//	$wowdb->free_result($result);

	$dbversion = $addon_conf['MadeBy']['version'];
}
else
{
	$dbversion = '0.0.0'; // we need to install
}

?>