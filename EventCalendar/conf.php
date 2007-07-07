<?php

/**
 * WoWRoster.net EventCalendar
 *
 * Event Calendar is a Roster addon that will show upcoming events from ingame
 * WoW addons GuildEventManager (GEM) or GroupCalendar
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.3
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=59.html
 *
*/

// What calendar will you be updating -- GEM or GroupCalendar
	$addon_conf['EventCalendar']['UpdateMode'] = 'GroupCalendar';

//Every1 in guild can update the calendar if set to true, if set to false then it will look at EventUpdaters
	$addon_conf['EventCalendar']['UpdateAll'] = false;

//Characters that can update the events
	$addon_conf['EventCalendar']['EventUpdaters'] = array(
		'Updater1',
	);
//Channels that can be updated (GEM only)
	$wordings['EventCalendar']['Channels'] = array(
		'Channel1',
	);

// Show eventicon or not -- true or false
	$addon_conf['EventCalendar']['ShowIcon'] = false;

//Date display "D m/d G:i" => Wed 08/23 20:15
	$addon_conf['EventCalendar']['EventDate'] = "D d/m G:i";
	$addon_conf['EventCalendar']['ResetDate'] = "D d/m";

/****** DON'T CHANGE ANYTHING BELOW! ******/

//Version Check
	$addon_conf['EventCalendar']['Version'] = '1.0.2';

//Update Trigger
	$addon_conf['EventCalendar']['UpdateTrigger'] = 1;

// Resetoffset
	$wordings['EventCalendar']['ResetOffset'] = -1;

// General variables
	$wordings['EventCalendar']['Classes'] = array(
		"P" => "Priest",
		"S" => "Shaman",
		"M" => "Mage",
		"R" => "Rogue",
		"D" => "Druid",
		"W" => "Warrior",
		"H" => "Hunter",
		"K" => "Warlock",
		"L" => "Paladin",
	);

?>