<?php

/**
 * WoWRoster.net DKPStats
 *
 * DKPStats is a Roster addon that will show dkp from your EQDKP site
 * within the roster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.0
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=55.html
 * @since      01/11/2006
 *
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$char = $_REQUEST['char'];
// Server (for public roster use)
$server_name=$roster_conf['server_name'];

//First row
echo '<table cellpadding="0" cellspacing="10"><tr style="vertical-align:top;"><td>';

echo border('syellow','start','DKP Details');
echo '<table cellpadding="0" cellspacing="0" class="membersList">';

echo '<tr><td class="membersRow1">Name:</td>';
echo '<td class="membersRowRight1">';

// Check if char is in guild
		$gquery = 'SELECT member_id FROM '.ROSTER_MEMBERSTABLE.' WHERE name= \''.$char.'\'';
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $gquery -->\n";
		}
		$gid_result = $wowdb->query($gquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$gquery);
		$gid = $wowdb->fetch_array($gid_result);
		if($gid[0] != ''){
			// Check if charinfo exists
			$query = 'SELECT member_id FROM '.ROSTER_PLAYERSTABLE.' WHERE name= \''.$char.'\'';
			if ($roster_conf['sqldebug'])
			{
				print "<!-- $query -->\n";
			}
			$id_result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
			$id = $wowdb->fetch_array($id_result);
			if($id[0] != ''){
				echo '<a href="char.php?name='.$char.'&server='.$server_name.'">'.$char.'</a></td>';
			}else{
				echo ''.$char.'</td>';
			}
		}else{
			echo ' <span style="color:#999999;">'.$char.'</span></td>';
		}

		echo '</tr>';
		
		//Get DKP info
		
		$query = "SELECT (member_earned + member_adjustment - member_spent) as current_dkp, member_spent as spent_dkp, (member_earned + member_adjustment) as earned_dkp FROM ".$addon_conf['DKPStats']['eqdkp_prefix']."members WHERE member_name = '". $char ."'";
		$result = $eqdkpdb->query($query) or die_quietly($eqdkpdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
		if ($row = $eqdkpdb->fetch_array($result))
		{
		$cDKP = $row[0];
		$sDKP = $row[1];
		$eDKP = $row[2];
		}
		
echo '<tr><td class="membersRow2">Current DKP:</td>';
echo '<td class="membersRowRight2">'.round($cDKP).'</td></tr>';

echo '<tr><td class="membersRow1">Earned DKP:</td>';
echo '<td class="membersRowRight1">'.round($eDKP).'</td></tr>';

echo '<tr><td class="membersRow2">Spend DKP:</td>';
echo '<td class="membersRowRight2">'.round($sDKP).'</td></tr>';

//Get total loot of char
$query = "select count(*) from ".$addon_conf['DKPStats']['eqdkp_prefix']."items WHERE `item_buyer` = '" . $char ."'";
$result = $eqdkpdb->query($query) or die_quietly($eqdkpdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
if ($row = $eqdkpdb->fetch_array($result))
{
$total_drops = $row[0];
}
echo '<tr><td class="membersRow1">Total loot:</td>';
echo '<td class="membersRowRight1">'.$total_drops.'</td></tr>';

echo '</tr></table>';
echo border('syellow','end');

//Close first column
echo '</td>';

// Second Column
echo '<td>';
echo border('syellow','start','Loot History');
echo '<table cellpadding="0" cellspacing="0" class="membersList"><tr>';

$query = "SELECT `item_name`, `item_value` FROM ".$addon_conf['DKPStats']['eqdkp_prefix']."items  WHERE `item_buyer` = '" . $char ."' ORDER BY item_date DESC";
if ($roster_conf['sqldebug'])
{
print "<!-- $query -->\n";
}

$result = $eqdkpdb->query($query) or die_quietly($eqdkpdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

$rownum=1;
	while ($row = $eqdkpdb->fetch_array($result)) {
	// Open a new Row
			echo '<tr>';
		// Display the item in second column
		$loot_item = '[item]'.stripslashes($row['item_name']).'[/item]';
		echo itemstats_parse('<td class="membersRow'.$rownum.'">'.utf8_decode($loot_item));
	// Set note
	echo '<td style="text-align:center;" class="membersRowRight'.$rownum.'">';
	echo getNoteIcon($row['item_value']).'</td>';
		
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
echo '</table>';
echo border('syellow','end');

//Close second column
echo '</td>';

//Close table
echo '</tr></table>';

?>