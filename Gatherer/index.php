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
 * $Id: index.php 59 2006-06-14 21:17:28Z mathos $
 *
 ******************************/

if( eregi(basename(__FILE__),$_SERVER['PHP_SELF']) )
{
	die("You can't access this file directly!");
}


$header_title = $wordings[$roster_conf['roster_lang']]['gatherer_addon'];

if(!$wowdb->query("SELECT * FROM ".$db_prefix."gatherer_nodes")){
	require 'install_db.php';
}else{
	require_once ($addonDir.'gatherer.php');
}

echo $content;
?>