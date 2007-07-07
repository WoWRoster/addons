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

$sort = $_REQUEST['sort'];

// Server (for public roster use)
$server_name=$roster_conf['server_name'];

echo border('syellow', 'start', $title);
		
	// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" width="250px" class="membersList">';
	
	// Display the header of the table
	echo '<tr>';
	if($sort != 'class'){
	echo '<th class="membersHeader"><a href="addon.php?roster_addon_name=DKPStats&sort=class">'.$wordings[$roster_conf['roster_lang']]['Name'].'</a></th>';
	}else{
	echo '<th class="membersHeader"><a href="addon.php?roster_addon_name=DKPStats">'.$wordings[$roster_conf['roster_lang']]['Name'].'</a></th>';
	}
	echo '<th class="membersHeader">'.$wordings[$roster_conf['roster_lang']]['Rank'].'</th>';
	if($sort != 'dkp'){
	echo '<th class="membersHeader"><a href="addon.php?roster_addon_name=DKPStats&sort=dkp">'.$wordings[$roster_conf['roster_lang']]['CurrentDKP'].'</a></th>';
	}else{
	echo '<th class="membersHeader"><a href="addon.php?roster_addon_name=DKPStats">'.$wordings[$roster_conf['roster_lang']]['CurrentDKP'].'</a></th>';	
	}
	echo '<th class="membersHeader">'.$wordings[$roster_conf['roster_lang']]['EarnedDKP'].'</th>';
	echo '<th class="membersHeader">'.$wordings[$roster_conf['roster_lang']]['SpentDKP'].'</th>';
	echo '<th class="membersHeaderRight">'.$wordings[$roster_conf['roster_lang']]['TotalLoot'].'</th>';
	echo '</tr>';
	
	$query = 'SELECT m.member_name, c.class_name as member_class, mr.rank_name as member_rank,
    (m.member_earned + m.member_adjustment - m.member_spent) as current_dkp, m.member_spent as spent_dkp, (m.member_earned + m.member_adjustment) as earned_dkp FROM
    '.$addon_conf['DKPStats']['eqdkp_prefix'].'members m, ' .$addon_conf['DKPStats']['eqdkp_prefix'].'classes c, '.$addon_conf['DKPStats']['eqdkp_prefix'].'member_ranks mr
 	WHERE (m.member_class_id = c.class_id) AND (m.member_rank_id = mr.rank_id) GROUP BY m.member_name ORDER BY ';
	
	if($sort == '')
	$query .= 'member_name ASC';
	if($sort == 'class')
	$query .= 'member_class ASC, current_dkp DESC';
	if($sort == 'dkp')
	$query .= 'current_dkp DESC';
	
	if ($roster_conf['sqldebug'])
	{
		print "<!-- $query -->\n";
	}
	
	$result = $eqdkpdb->query($query) or die_quietly($eqdkpdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	
	$rownum=1;
	while ($row = $eqdkpdb->fetch_array($result)) {
	
	// Check if char is in guild
		$gquery = 'SELECT member_id FROM '.ROSTER_MEMBERSTABLE.' WHERE name= \''.$row['member_name'].'\'';
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $gquery -->\n";
		}
		$gid_result = $wowdb->query($gquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$gquery);
		$gid = $wowdb->fetch_array($gid_result);
		//if($gid[0] != ''){
			// Open a new Row
			echo '<tr>';
			echo '<td class="membersRow'.$rownum.'"> '.getClass($row['member_class']);
			// Check if charinfo exists
			$cquery = 'SELECT member_id FROM '.ROSTER_PLAYERSTABLE.' WHERE name= \''.$row['member_name'].'\'';
			if ($roster_conf['sqldebug'])
			{
				print "<!-- $cquery -->\n";
			}
			$cid_result = $wowdb->query($cquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$cquery);
			$cid = $wowdb->fetch_array($cid_result);
			if($cid[0] != ''){
				echo '&nbsp;<a href="char.php?name='.$row['member_name'].'&server='.$server_name.'">'.$row['member_name'].'</a></td>';
			}else{
				echo '&nbsp;'.$row['member_name'].'</td>';
			}
	
	// Show DKP Info
		echo '<td class="membersRow'.$rownum.'">'.$row['member_rank'].'</td>';
		echo '<td class="membersRow'.$rownum.'" style="color:#CC6600;">'.round($row['current_dkp']).'</td>';
		echo '<td class="membersRow'.$rownum.'">'.round($row['earned_dkp']).'</td>';
		echo '<td class="membersRow'.$rownum.'">'.round($row['spent_dkp']).'</td>';
		
	// Show lootcount
	
		$lquery = "select count(*) from ".$addon_conf['DKPStats']['eqdkp_prefix']."items WHERE `item_buyer` = '" . $row['member_name'] ."'";
		$lresult = $eqdkpdb->query($lquery) or die_quietly($eqdkpdb->error(),'Database Error',basename(__FILE__),__LINE__,$lquery);
		if ($lrow = $eqdkpdb->fetch_array($lresult))
		{
		$user_loot = $lrow[0];
		}
		echo '<td class="membersRowRight'.$rownum.'"> '.$user_loot;
		if($user_loot > 0)
		echo '<a href="addon.php?roster_addon_name=DKPStats&display=loot&char='.$row['member_name'].'"> [details]</a>';
		echo '</td>';
	
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
	echo border('syellow','end');
	echo '<br/>';

?>