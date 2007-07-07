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

/******************************
 * $Id$
 ******************************/

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
$updateChars = $addon_conf['RaidTracker']['RaidUpdaters'];

//----------[ INSERT UPDATE TRIGGER BELOW ]-----------------------

// Run this on a character update
if( $mode == 'char' ){
	if( $addon_conf['RaidTracker']['UpdateTrigger'] ){
		// Check if character is allowed to updated raids
		if(in_array($member_name,$updateChars)){
			// If CT_RaidTracker data is there, assign it to $uploadData['RaidTracker']
			if( isset($uploadData['RaidTrackerData']) ){
				$output = "<span class=\"yellow\">Updating CTMod RaidTracker Data from Character <b>[".$name."]</b><br/>\n";				
				include_once("trigger_functions.php");
				$output .= processRaids($member_name,$uploadData['RaidTrackerData']);
			}
		}
		$output .= "</span>\n";
	}
	print("<!-- Update RaidTracker Log Output -->");
	echo $output;
}

?>
