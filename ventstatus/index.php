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
 * $Id: index.php 12 2006-12-24 07:25:20Z zanix $
 *
 ******************************/
if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}
$query = "SHOW TABLES LIKE '".ROSTER_ADDON_VENTSTATUS_CONFIG."';";

$result = $wowdb->query($query);

if( $wowdb->num_rows($result) < 1 )
{
	require ($addonDir.'install.php');
} else {
	$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'version'";
	$result = $wowdb->query($query);
	$r = $wowdb->fetch_assoc($result);
	if($r['conf_data'] != "0.0.3")
	{
		require ($addonDir.'install.php');
	}
}

$wowdb->free_result($result);
error_reporting(E_ALL);
//echo 'index page ';
if( isset( $_GET['action'] ) )
{
	switch( $_GET['action'] )
	{
		case "admin":
		//echo 'going to admin ';
			$header_title = $wordings[$roster_conf['roster_lang']]['ventstatus_admin'];
			require ($addonDir.'admin.php');
		break;
		default:
		//echo 'going to status with action ';
			$header_title = $wordings[$roster_conf['roster_lang']]['ventstatus'];
			require ($addonDir.'status.php');
		break;
	}
} else {
//echo 'going to status ';
	$header_title = $wordings[$roster_conf['roster_lang']]['ventstatus'];
	require ($addonDir.'status.php');
}

echo $content;
?>