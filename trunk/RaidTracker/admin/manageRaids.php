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

// Display the Top / left side of the Stylish Border
echo border('syellow', 'start', $rt_wordings[$roster_conf['roster_lang']]['Admindelete']);

// Make a table to hold the content
echo '<table cellpadding="0" cellspacing="0" class="membersList">';

// Display the header of the table
echo '<tr>';
echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['Zone'].'</th>';
echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['Date'].'</th>';
echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['BossKills'].'</th>';
echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['LootCount'].'</th>';
echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['Attendees'].'</th>';
echo '<th class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['Note'].'</th>';
echo '</tr>';

// Check if we have a Zone Filter
$zone_where = ' WHERE deleted != 1 ';

// Get all raids
$query = 'SELECT raidnum, raidid, zone, note FROM `'.$db_prefix.'raids` '.$zone_where.' ORDER BY raidid DESC, zone ASC';

if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}

$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

$rownum=1;
while ($row = $wowdb->fetch_array($result)) {

// If loot is 0 don't show it
$query = 'SELECT count(*) FROM `'.$db_prefix.'raiditems` WHERE raidnum = '.$row['raidnum'];

if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}

$loot_result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
$loot_row = $wowdb->fetch_array($loot_result);

if($loot_row[0] == -1){}else{
// Open a new Row
		echo '<tr>';
// Display the zone in first column
echo '<td class="membersRow'.$rownum.'"> '.getZoneIcon($row['zone']);
echo '<a href="addon.php?roster_addon_name=RaidTracker&amp;display=admin&amp;action=edit&amp;raid='.$row['raidnum'].'">';
if($row['zone'] != 'RandomRaid'){
	$zoneName= $rt_wordings[$roster_conf['roster_lang']]['Zones'][$row['zone']];
	if( !isset ($zoneName) || $zoneName ==''){
		$zoneName= $rt_wordings[$roster_conf['roster_lang']]['ZonesBC'][$row['zone']];	
	}
}else{
	$zoneName= $rt_wordings[$roster_conf['roster_lang']][$row['zone']];
}
echo $zoneName;

// Display the date in second column
echo '<td class="membersRow'.$rownum.'">';
echo date($addon_conf['RaidTracker']['DateView'], strtotime($row['raidid'])).'</td>';

// Get bosskills
$query = 'SELECT count(*) FROM `'.$db_prefix.'raidbosskills` WHERE raidnum = '.$row['raidnum'];

if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}

$kill_result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
$kill_row = $wowdb->fetch_array($kill_result);

echo '<td class="membersRow'.$rownum.'">';
echo $kill_row[0].'</td>';

// Set Lootcount
echo '<td class="membersRow'.$rownum.'">';
echo $loot_row[0].'</td>';


// Get number of raidattendees
$query = 'SELECT DISTINCT name FROM `'.$db_prefix.'raidjoins` WHERE raidnum = '.$row['raidnum'];

if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}

$attendees_result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
$attendees = 0;
while ($attendees_row = $wowdb->fetch_array($attendees_result)) {
$attendees = $attendees + 1; 
}

echo '<td class="membersRow'.$rownum.'">';
echo $attendees.'</td>';

// Set note
echo '<td style="text-align:center;" class="membersRowRight'.$rownum.'">';
echo getNoteIcon($row['note']).'</td>';

// Close the Row
		echo '</tr>';
		switch ($rownum) {
		case 1:
			$rownum=2;
			break;
		default:
			$rownum=1;
	}
	}
}

// Add row with delete & deactivate button
	echo '<tr><th colspan="7" class="membersHeaderRight" style="text-align:center; height:20px;">';
	echo '<input type="submit" value="delete" onclick="return confirm(\'Are you sure?\')" />';
	echo '</th></tr>';

// Close the table
echo '</table>';

// Display the Right side / Bottom of the Stylish Border
echo border('syellow','end');

$wowdb->free_result($result);

?>