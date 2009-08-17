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
 * $Id: conf.php 12 2006-12-24 07:25:20Z zanix $
 *
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/////////////////////////// CONFIGURATION OPTIONS /////////////////////////////

// Request Rank

if( !isset($db_prefix))
{
	global $db_prefix;
}

if( !defined('ROSTER_VS_CONFIGTABLE') )
{
	define('ROSTER_VS_CONFIGTABLE',$db_prefix.'vs_config');
}

$addon_conf['ventstatus']['ventstatus'] = $wordings[$roster_conf['roster_lang']]['ventstatus'];
$addon_conf['ventstatus']['vs_admin'] = $wordings[$roster_conf['roster_lang']]['vs_admin'];
$addon_conf['ventstatus']['vs_login'] = $wordings[$roster_conf['roster_lang']]['vs_login'];
$addon_conf['ventstatus']['vs_err_password'] = $wordings[$roster_conf['roster_lang']]['vs_err_password'];
$addon_conf['ventstatus']['vs_password'] = 'billy';
$addon_conf['ventstatus']['vs_img'] = 'jimmy';
// $addonDir.'img/';

?>