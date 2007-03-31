<?php
/******************************
* $Id: $
******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$header_title = $wordings[$roster_conf['roster_lang']]['gatherer_addon'];

if( !$wowdb->query("SELECT * FROM `".GATHERER_TABLE."`;") )
{
	require ($addonDir.'install_db.php');
}
else
{
	require_once ($addonDir.'gatherer.php');
}
