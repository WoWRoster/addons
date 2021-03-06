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

global $rc_wordings, $roster_conf;

require_once 'lib/wowdb.php';

// Display the Top / left side of the Stylish Border
echo border('syellow', 'start', $rc_wordings[$roster_conf['roster_lang']]['UpcomingRaids']);

// Make a table to hold the content
echo '<table cellpadding="0" cellspacing="0" class="membersList">';

// Display the header of the table
echo '<tr>';
echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Date'].'</th>';
echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Zone'].'</th>';
echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Leader'].'</th>';
echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Attendees'].'</th>';
echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Level'].'</th>';
echo '<th class="membersHeaderRight">'.$rc_wordings[$roster_conf['roster_lang']]['Note'].'</th>';
echo '</tr>';

// Get all raids
$query = 'SELECT * FROM `'.$db_prefix.'events` WHERE type != "Birth" AND type !="Meet" ORDER BY date ASC';
if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

$rownum=1;
while ($row = $wowdb->fetch_array($result)) {

if (isset($lastdate)){
	if (date("j",$lastdate) != date("j",strtotime($row['date']))){
		for ($i = 1; $i < 8; $i++){				
			$resetdate = mktime(3, 0, 0, date("m",$lastdate)  , date("d",$lastdate)+$i, date("Y",$lastdate));	
			unset($resetdata);
			$resetdata=checkReset(date("j",$resetdate),date("n",$resetdate),date("Y",$resetdate));
			if ($resetdata){
				echo ('<tr>'."\n");
				echo ('<td style="background-color:#2D0000" class="membersRow'.$rownum.'">'."\n");
				echo (date($addon_conf['EventCalendar']['ResetDate'],$resetdate)."\n");
				echo ('</td>'."\n");
				echo ('<td style="text-align:center;background-color:#2D0000" class="membersRow'.$rownum.'">'."\n");
				echo ($rc_wordings[$roster_conf['roster_lang']]['Reset']."\n");
				echo ('</td>'."\n");
				echo ('<td style="background-color:#2D0000" colspan="4" class="membersRowRight'.$rownum.'">'."\n");
				foreach ($resetdata as $type){
					resetIcon($type);
				}
			echo ('</td>'."\n");
			echo ('</tr>'."\n");
		}
		if (date("j",$resetdate)==date("j",strtotime($row['date']))) {break;}
		}
	}
}
// Open a new Row
echo '<tr>';

$zoneicon = $roster_conf['roster_dir'].'/addons/EventCalendar/img/icons/';
$zoneicon .= ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] !=''?'Icon-'.$row['type'].'.jpg':'Icon-Unknown.jpg');
$zone = ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] != ''?$rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']]:$row['type']);

echo '<td class="membersRow'.$rownum.'">';
echo '<a href="addon.php?roster_addon_name=EventCalendar&event='.$row['eventid'].'">';
if($addon_conf['EventCalendar']['ShowIcon'])
echo '<img class="membersRowimg" width="'.$roster_conf['index_iconsize'].'" height="'.$roster_conf['index_iconsize'].'" src="'.$zoneicon.'" alt="'.$zone.'" /> ';
echo date($addon_conf['EventCalendar']['EventDate'],strtotime($row['date'])).'</a></td>';

echo '<td class="membersRow'.$rownum.'">';
echo $zone.'</td>';

echo '<td style="text-align:center;" class="membersRow'.$rownum.'">';
echo $row['leader'].'</td>';



$titular_count = getTitularCount($row['eventid']);
$substitute_count = getSubstituteCount($row['eventid']);

echo '<td style="text-align:center;" class="membersRow'.$rownum.'">';
echo $titular_count.'/'.$row['maxCount'].'('.$substitute_count.')</td>';

echo '<td style="text-align:center;" class="membersRow'.$rownum.'">';
echo $row['minLevel'].' - '.$row['maxLevel'].'</td>';

$note = $row['note'];
if($row['title'] !='')
$note = $row['title'] .'\n'.$row['note'];

echo '<td style="text-align:center;" class="membersRowRight'.$rownum.'">';
echo getNoteIcon($note).'</td>';

	// Close the Row
	echo '</tr>';
	switch ($rownum) {
	case 1:
		$rownum=2;
	break;
	default:
		$rownum=1;
	}
$lastdate = strtotime($row['date']);
}
// Close the table
echo '</table>';

// Display the Right side / Bottom of the Stylish Border
echo border('syellow','end');

// Meetings (GroupCalendar only)

// Get all raids
$query = 'SELECT * FROM `'.$db_prefix.'events` WHERE type = "Meet" ORDER BY date ASC';
if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

if($wowdb->num_rows($result) == 0){}else{
echo '<br/>';
	// Display the Top / left side of the Stylish Border
	echo border('syellow', 'start', $rc_wordings[$roster_conf['roster_lang']]['UpcomingMeetings']);
	
	// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" class="membersList">';
	
	// Display the header of the table
	echo '<tr>';
	echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Date'].'</th>';
	echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Leader'].'</th>';
	echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Attendees'].'</th>';
	echo '<th class="membersHeaderRight">'.$rc_wordings[$roster_conf['roster_lang']]['Note'].'</th>';
	echo '</tr>';
	
	$rownum=1;
	while ($row = $wowdb->fetch_array($result)) {
	// Open a new Row
	echo '<tr>';
	
	$zoneicon = $roster_conf['roster_dir'].'/addons/EventCalendar/img/icons/';
	$zoneicon .= ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] !=''?'Icon-'.$row['type'].'.jpg':'Icon-Unknown.jpg');
	$zone = ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] != ''?$rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']]:$row['type']);
	
	echo '<td class="membersRow'.$rownum.'">';
	echo '<a href="addon.php?roster_addon_name=EventCalendar&event='.$row['eventid'].'">';
	if($addon_conf['EventCalendar']['ShowIcon'])
	echo '<img class="membersRowimg" width="'.$roster_conf['index_iconsize'].'" height="'.$roster_conf['index_iconsize'].'" src="'.$zoneicon.'" alt="'.$zone.'" /> ';
	echo date($addon_conf['EventCalendar']['EventDate'],strtotime($row['date'])).'</a></td>';
	
	echo '<td style="text-align:center;" class="membersRow'.$rownum.'">';
	echo $row['leader'].'</td>';
	
	$titular_count = getTitularCount($row['eventid']);
	$substitute_count = getSubstituteCount($row['eventid']);
	
	echo '<td style="text-align:center;" class="membersRow'.$rownum.'">';
	echo $titular_count.'/'.$row['maxCount'].'('.$substitute_count.')</td>';
	
	$note = $row['note'];
	if($row['title'] !='')
	$note = $row['title'] .'\n'.$row['note'];
	
	echo '<td style="text-align:center;" class="membersRowRight'.$rownum.'">';
	echo getNoteIcon($note).'</td>';
	
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
	// Close the table
	echo '</table>';
	
	// Display the Right side / Bottom of the Stylish Border
	echo border('syellow','end');
}

// Birthdays (GroupCalendar only)

// Get all raids
$query = 'SELECT * FROM `'.$db_prefix.'events` WHERE type = "Birth" ORDER BY date ASC';
if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

if($wowdb->num_rows($result) == 0){}else{
echo '<br/>';
	// Display the Top / left side of the Stylish Border
	echo border('syellow', 'start', $rc_wordings[$roster_conf['roster_lang']]['UpcomingBirthdays']);
	
	// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" class="membersList">';
	
	// Display the header of the table
	echo '<tr>';
	echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['BPerson'].'</th>';
	echo '<th class="membersHeader">'.$rc_wordings[$roster_conf['roster_lang']]['Date'].'</th>';
	echo '<th class="membersHeaderRight">'.$rc_wordings[$roster_conf['roster_lang']]['Note'].'</th>';
	echo '</tr>';
	
	$rownum=1;
	while ($row = $wowdb->fetch_array($result)) {
	// Check if char is in guild
		$gquery = 'SELECT member_id FROM '.ROSTER_MEMBERSTABLE.' WHERE name= \''.$row['leader'].'\'';
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $gquery -->\n";
		}
		$gid_result = $wowdb->query($gquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$gquery);
		$gid = $wowdb->fetch_array($gid_result);
		if($gid[0] != ''){
	// Open a new Row
	echo '<tr>';
	
	$zoneicon = $roster_conf['roster_dir'].'/addons/EventCalendar/img/icons/';
	$zoneicon .= ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] !=''?'Icon-'.$row['type'].'.jpg':'Icon-Unknown.jpg');
	$zone = ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] != ''?$rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']]:$row['type']);
	
	echo '<td class="membersRow'.$rownum.'">';
	if($addon_conf['EventCalendar']['ShowIcon'])
	echo '<img class="membersRowimg" width="'.$roster_conf['index_iconsize'].'" height="'.$roster_conf['index_iconsize'].'" src="'.$zoneicon.'" alt="'.$zone.'" />&nbsp;';
	echo $row['leader'].'</td>';
	
	echo '<td class="membersRow'.$rownum.'">';
	echo date($addon_conf['EventCalendar']['EventDate'],strtotime($row['date'])).'</td>';
	
	$note = $row['note'];
	if($row['title'] !='')
	$note = $row['title'] .'\n'.$row['note'];
	
	echo '<td style="text-align:center;" class="membersRowRight'.$rownum.'">';
	echo getNoteIcon($note).'</td>';
	
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
	// Close the table
	echo '</table>';
	
	// Display the Right side / Bottom of the Stylish Border
	echo border('syellow','end');
}

$wowdb->free_result($result);
?>