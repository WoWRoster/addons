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

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// Make boxes for each instance
$count = 0;
echo '<table><tr><td valign="top">';
foreach($rt_wordings[$roster_conf['roster_lang']]['ZonesBC'] as $zonename => $zone){

$count = $count + 1;
	bossProgress($zonename);
	if($count == 3)
	{
		$count = 0;
		echo '</td><td width="10px"></td><td valign="top">';
	}
}
echo '</td></tr></table>';

$wowdb->free_result($result);
?>