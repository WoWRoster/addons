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

$fileversion='0.1.0';
$script_filename = basename($_SERVER['PHP_SELF']).'?roster_addon_name=dkp_wizard';

define('ROSTER_ADDON_DKP_WIZARD_CONFIG',$GLOBALS['db_prefix'].'dkpw_config');
define('ROSTER_ADDON_DKP_WIZARD_LOCAL',$GLOBALS['db_prefix'].'dkpw_local');
define('ROSTER_ADDON_DKP_WIZARD_MEMBERS',$GLOBALS['db_prefix'].'dkpw_members');
define('ROSTER_ADDON_DKP_WIZARD_EVENTS',$GLOBALS['db_prefix'].'dkpw_events');
define('ROSTER_ADDON_DKP_WIZARD_RAIDS',$GLOBALS['db_prefix'].'dkpw_raids');
define('ROSTER_ADDON_DKP_WIZARD_BOSSKILL',$GLOBALS['db_prefix'].'dkpw_bosskill');
define('ROSTER_ADDON_DKP_WIZARD_BOSSVAL',$GLOBALS['db_prefix'].'dkpw_bossvalues');
define('ROSTER_ADDON_DKP_WIZARD_LOOT',$GLOBALS['db_prefix'].'dkpw_loot');
define('ROSTER_ADDON_DKP_WIZARD_CACHE',$GLOBALS['db_prefix'].'dkpw_itemcache');
define('ROSTER_ADDON_DKP_WIZARD_CACHE_STATS',$GLOBALS['db_prefix'].'dkpw_itemstats');
define('ROSTER_ADDON_DKP_WIZARD_CACHE_LOCAL',$GLOBALS['db_prefix'].'dkpw_itemstatslocal');
define('ROSTER_ADDON_DKP_WIZARD_FORCE',$GLOBALS['db_prefix'].'dkpw_itemsforced');
define('ROSTER_ADDON_DKP_WIZARD_IGNORE',$GLOBALS['db_prefix'].'dkpw_itemsignored');
define('DEFAULT_ICON', 'INV_Misc_QuestionMark');

define('INNER_GLUE', '%26');
define('OUTER_GLUE', '%5D');

// Test if our config table exists
$query = "SHOW TABLES LIKE '".ROSTER_ADDON_DKP_WIZARD_CONFIG."'";
$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
if ( $row = $wowdb->fetch_assoc($result) )
{
	$wowdb->free_result($result);

	// Get config values and insert them into the array
	$query = "SELECT `config_name`, `config_value` FROM `".ROSTER_ADDON_DKP_WIZARD_CONFIG."` ORDER BY `id` ASC;";
	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );

	while( $row = $wowdb->fetch_assoc($result) )
	{
		$addon_conf[$row['config_name']] = stripslashes($row['config_value']);
	}

	$wowdb->free_result($result);
	
	$dbversion = $addon_conf['version'];
}
else
{
	$dbversion = '0.0.0'; // we need to install
}

// Load the Localization (from the Database)
$query = "SHOW TABLES LIKE '".ROSTER_ADDON_DKP_WIZARD_LOCAL."'";
$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );

if ( $row = $wowdb->fetch_assoc($result) )
{
	$wowdb->free_result($result);

	// Get localization values and insert them into the array
	$query = "SELECT `lang`, `term`, `value` FROM `".ROSTER_ADDON_DKP_WIZARD_LOCAL."` ORDER BY `term` ASC;";
	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
	while( $row = $wowdb->fetch_assoc($result) )
	{
		$wordings[$row['lang']][$row['term']] = $row['value'];
	}
	$wowdb->free_result($result);
	
	// If the $roster_conf['language'] wordings do not exist, use the 'enUS' value!
	if ($roster_conf['roster_lang'] != 'enUS')
	{
		$query = "SELECT `term`, `value` FROM `".ROSTER_ADDON_DKP_WIZARD_LOCAL."` WHERE `lang` = 'enUS' ORDER BY `term` ASC;";
		$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );	
		while( $row = $wowdb->fetch_assoc($result) )
		{
			if (!isset($wordings[$roster_conf['roster_lang']][$row['term']]) || $wordings[$roster_conf['roster_lang']][$row['term']] == '')
			{
				$wordings[$roster_conf['roster_lang']][$row['term']] = $wordings['enUS'][$row['term']];
			}
		}
		$wowdb->free_result($result);
	}
}

// Get the forced items from the database and put them into the parsing $options['itemsforced'][] as such
// These items (in-case sensitive) will ALWAYS be parsed as loot, no matter what the quality is!
$query = "SHOW TABLES LIKE '".ROSTER_ADDON_DKP_WIZARD_FORCE."'";
$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );

if ( $row = $wowdb->fetch_assoc($result) )
{
	$wowdb->free_result($result);

	// Get config values and insert them into the array
	$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_FORCE."`";
	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
	while( $row = $wowdb->fetch_assoc($result) )
	{
		$options['items_forced'][] = $row['id'];
	}
	$wowdb->free_result($result);
	
	if (!is_array($options['items_forced']))
	{
		$options['items_forced'][] = 0;
	}
}

// Get the ignored items from the database and put them into the parsing $options['itemsforced'][] as such
// These items (in-case sensitive) will ALWAYS be parsed as loot, no matter what the quality is!
$query = "SHOW TABLES LIKE '".ROSTER_ADDON_DKP_WIZARD_IGNORE."'";
$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );

if ( $row = $wowdb->fetch_assoc($result) )
{
	$wowdb->free_result($result);

	// Get config values and insert them into the array
	$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_IGNORE."`";
	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
	while( $row = $wowdb->fetch_assoc($result) )
	{
		$options['items_ignored'][] = $row['id'];
	}
	$wowdb->free_result($result);
	
	if (!is_array($options['items_ignored']))
	{
		$options['items_ignored'][] = 0;
	}
}


// Get all the Suffix names in the local language and enUS. If roster_lang does not exist, then use the enUS version
// Get the enUS array first
$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_CACHE_LOCAL."` WHERE `local` = 'enUS'";
$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
while ($row = $wowdb->fetch_assoc($result) )
{
	$wordings['enUS']['statlocal'][$row['statlocal_id']] = $row['description'];
}
$wowdb->free_result($result);

// Get the roster_lang array too
if ($roster_conf['roster_lang'] != 'enUS')
{
	$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_CACHE_LOCAL."` WHERE `local` = '".$roster_conf['roster_lang']."'";
	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
	while ($row = $wowdb->fetch_assoc($result) )
	{
		$wordings[$roster_conf['roster_lang']]['statlocal'][$row['statlocal_id']] = $row['description'];
	}
	$wowdb->free_result($result);
	
	// Check if the localised version against enUS version exists. If not, use the enUS version instead
	foreach ($wordings['enUS']['statlocal'] as $key => $value)
	{
		if (!isset($wordings[$roster_conf['roster_lang']]['statlocal'][$key]) || $wordings[$roster_conf['roster_lang']]['statlocal'][$key] == '')
		{
			$wordings[$roster_conf['roster_lang']]['statlocal'][$key] = $wordings['enUS']['statlocal'][$key];
		}
	}
}

// Get the Boss Values array
$query = "SELECT boss_name, dkp_value FROM `".ROSTER_ADDON_DKP_WIZARD_BOSSVAL."`";
$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
while ($row = $wowdb->fetch_assoc($result) )
{
	$options['bossvalue'][$row['boss_name']] = $row['dkp_value'];
}
$wowdb->free_result($result);


?>
