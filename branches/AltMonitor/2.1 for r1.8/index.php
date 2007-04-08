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

// -[ Begin testing conditions for what we want to do ]-
$page = isset($roster_pages[2])?$roster_pages[2]:'altlist';


if ($page == 'update')
{
	include($addon['dir'].'/login.php');
}

// -[ Begin switch for what we are going to do ]-
switch ($page) {
case 'update':
	include($addon['dir'].'/update_wrap.php');
	break;
case 'altlist':
	include($addon['dir'].'/altlist_wrap.php');
	break;
case 'debug':
	include($addon['dir'].'/debug_wrap.php');
	break;
default:
	die_quietly($act_words['AltMonitor_NoAction'],'AltMonitor');
}
