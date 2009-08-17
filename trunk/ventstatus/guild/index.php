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

error_reporting(E_ALL);
//echo 'index page ';

	$header_title = $roster->locale->act['ventstatus'];
	require ($addon['dir'].'status.php');

echo $content;
