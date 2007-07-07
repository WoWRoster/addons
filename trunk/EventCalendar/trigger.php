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

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/*
	Start the following scripts when "update.php" is called

	Available variables
		- $wowdb       = roster's db layer
		- $member_id   = character id from the database ( ex. 24 )
		- $member_name = character's name ( ex. 'Jonny Grey' )
		- $roster_conf = The entire roster config array
		- $mode        = when you want to run the trigger
			= 'char'  - during a character update
			= 'guild' - during a guild update

	You may need to do some fancy coding if you need more variables

	You can just print any needed output

*/

global $uploadData,$db_prefix;
$output = '';
$updateChars = $addon_conf['EventCalendar']['EventUpdaters'];

//----------[ INSERT UPDATE TRIGGER BELOW ]-----------------------

// Run this on a character update
if( $mode == 'char' ){
	if( $addon_conf['EventCalendar']['UpdateTrigger'] ){
		// Check if character is allowed to updated raids
		if(in_array($member_name,$updateChars) || $addon_conf['EventCalendar']['UpdateAll']){
			// If CT_EventCalendar data is there, assign it to $uploadData['EventCalendar']
			if( isset($uploadData['GroupCalendarData']) || isset($uploadData['GuildEventManagerData']) ){
				include_once('functions.php');
				if($addon_conf['EventCalendar']['UpdateMode'] == 'GEM'){
					$output = processGEM($member_name,$uploadData['GuildEventManagerData']);
				}
				elseif($addon_conf['EventCalendar']['UpdateMode'] == 'GroupCalendar'){
					$output = processGRP($member_name,$uploadData['GroupCalendarData']);
				}
			}
		}
	}
	print("<!-- Update EventCalendar Log Output -->");
	echo $output;
}

?>
