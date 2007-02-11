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

if (isset($postfields['admindisplay']) && $postfields['admindisplay'])
{
	exit('Detected invalid access to this file!');
}

// Get the display variables	
$postfields = array_merge($_GET, $_POST);

if (!isset($postfields['display']) || !$postfields['display'])
{
	if (!isset($display) || !$display)
	{
		print(border('sred','start').'&nbsp;No display action specified!&nbsp;'.border('sred','end'));
	}
}
else
{
	$display = $postfields['display'];
}

// Case the $display
switch ($display)
{
	case 'standings':
		include($addonDir.'/dkpstandings.php');
		break;
	case 'raidlist':
		include($addonDir.'/dkpraidlist.php');
		break;
	case 'raidbank':
		include($addonDir.'/dkpraidbank.php');
		break;
	case 'bosses':
		print($display."<br>");
		break;
	case 'raidattendence':
		print($display."<br>");
		break;
	case 'summary':
		print($display."<br>");
		break;
}

?>
