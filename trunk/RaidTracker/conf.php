<?php

/**
 * WoWRoster.net RaidTracker
 *
 * RaidTracker is a Roster addon that allows you to track raids, bosskills, loot
 * with the data from CT_RaidTracker MLdkp WoW Addon
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.2.1
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=55.html
 *
*/

//Characters that can update the raids
	$addon_conf['RaidTracker']['RaidUpdaters'] = array(
		'Nogarth','Calaglin',
	);

//where is the itemstats lib
	$addon_conf['RaidTracker']['itemstatsLib'] = "./itemstats";
	$addon_conf['RaidTracker']['itemstatsCSS'] = "wowhead.css";
	$addon_conf['RaidTracker']['itemstatsLibFile'] = "wowroster_itemstats.php";

// Date display like "Y-m-d G:i:s", "d-m-Y G:i:s"
	$addon_conf['RaidTracker']['DateView'] = "Y-m-d G:i:s";

// Show loot in one box or seperate by users who won
	$addon_conf['RaidTracker']['SortByUser'] = 0;

/****** DON'T CHANGE ANYTHING BELOW! ******/

//Version Check
	$addon_conf['RaidTracker']['Version'] = '1.2.1';

//Update Trigger
	$addon_conf['RaidTracker']['UpdateTrigger'] = 1;

// General variables
	$rt_wordings['RaidTracker']['ZoneIcons'] = array(
		"Zul'Gurub" => "zg",
		"Onyxia's Lair" => "onx",
		"Molten Core" => "mc",
		"Blackwing Lair" => "bwl",
		"Ahn'Qiraj Ruins" => "aq20",
		"Ahn'Qiraj Temple" => "aq40",
		"Naxxramas" => "nax",
		"Karazhan" => "kz",
		"Gruul's Lair" => "gl",
		"Magtheridon's Lair" => "mag",
		"Serpentshrine Cavern" => "sc",
		"Tempest Keep: The Eye" => "tk",
		"Black Temple" => "",
		"Battle of Mount Hyjal" => "cot",
		"World Bosses" => "outdoor",
		"RandomRaidBC" => "outdoor",
		"RandomRaid" => "outdoor",
	);

?>