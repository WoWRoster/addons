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

/////////////////////////// CONFIGURATION OPTIONS /////////////////////////////
// Number of columns per category row
$row_columns = 18;
// Show color border
$color_border = 1; // 0 = No, 1 = Yes
// Do you want categories with no items to appear?
$show_empty = 0; // 0 = No, 1 = Yes
////// ItemLink Site
// 1=Thottbot,
// 2=Allakhazam for 'enUS' and blasc.de for 'deDE'.
$searchtype = 1;
// The order the tables will display in the guildbank page
// You can exclude items you don't want to appear
$display_order = array(20,21,22,18,3,4,5,6,7,8,31,19,1,2,11,12,15,17,16,14,13,32,
		       10,26,24,25,9,23,27,28,30,29);

// The header name for each category that will appear
for ($i=1; $i<32; $i++)
{
	$bankitem[$i]['msg']  = $wordings[$roster_conf['roster_lang']]['bankitem_'.$i];
}

include($addonDir.'tmp_raidbanksearcharrays.php');

switch ($searchtype) {
	case 2:
		// Allakhazam / blasc.de
		$itemlink['enUS']='http://wow.allakhazam.com/search.html?q=';
		$itemlink['deDE']='http://blasc.planet-multiplayer.de/?i=';
		break;
	default:
		// Thottbot
		$itemlink['enUS']='http://www.thottbot.com/index.cgi?i=';
		$itemlink['deDE']='http://www.thottbot.com/de/index.cgi?i=';
}

?>
