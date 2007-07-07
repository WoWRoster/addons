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
 * @author     PoloDude
 * @updated    17/06/2007
 * @link       http://www.wowroster.net/Forums/viewforum/f=55.html
 * @since      01/11/2006
 *
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// Server (for public roster use)
$server_name=$roster_conf['server_name'];

//Get total drops from eqdkp
$query = "select count(*) from ".$addon_conf['DKPStats']['eqdkp_prefix']."items";
$result = $eqdkpdb->query($query) or die_quietly($eqdkpdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
if ($row = $eqdkpdb->fetch_array($result))
{
$total_drops = $row[0];
}

if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}
$query = "SELECT `item_name`, `item_buyer`, `item_value` FROM ".$addon_conf['DKPStats']['eqdkp_prefix']."items ORDER BY item_date DESC limit 50";
if ($roster_conf['sqldebug'])
{
print "<!-- $query -->\n";
}
echo border('syellow', 'start', $title);
// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" width="250px" class="membersList">';
$result = $eqdkpdb->query($query) or die_quietly($eqdkpdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

$rownum=1;
	while ($row = $eqdkpdb->fetch_array($result)) {
	// Open a new Row
			echo '<tr>';
		// Display the item in second column
		$loot_item = '[item]'.stripslashes($row['item_name']).'[/item]';
		echo itemstats_parse('<td class="membersRow'.$rownum.'">'.utf8_decode($loot_item));
		
		// Check if char is in guild
		$gquery = 'SELECT member_id FROM '.ROSTER_MEMBERSTABLE.' WHERE name= \''.$row['item_buyer'].'\'';
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $gquery -->\n";
		}
		$gid_result = $wowdb->query($gquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$gquery);
		$gid = $wowdb->fetch_array($gid_result);
		if($gid[0] != ''){
			// Check if charinfo exists
			$query = 'SELECT member_id FROM '.ROSTER_PLAYERSTABLE.' WHERE name= \''.$row['item_buyer'].'\'';
			if ($roster_conf['sqldebug'])
			{
				print "<!-- $query -->\n";
			}
			$id_result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
			$id = $wowdb->fetch_array($id_result);
			if($id[0] != ''){
				echo ' by <a href="char.php?name='.$row['item_buyer'].'&server='.$server_name.'">'.$row['item_buyer'].'</a></td>';
			}else{
				echo ' by '.$row['item_buyer'].'</td>';
			}
		}else{
			echo ' <span style="color:#999999;">'.$row['item_buyer'].'</span></td>';
		}

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

	
	// Add total loot at bottom
	echo '<tr><th colspan="3" class="membersHeaderRight">'.$wordings[$roster_conf['roster_lang']]['TotalLoot'].': '.$total_drops.'</th></tr>';
	
	// Close the table
		echo '</table>';
		
	echo border('syellow','end');
	echo '<br/>';

?>