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

// Trigger functions
function processRaids($name,$raiddata)
{
	global $wowdb, $roster_conf, $wordings;
	
	
	$output = "<ul>\n";
	
	//Put each raid in an array and then process them
	foreach( array_keys($raiddata) as $raid ) {
		$data_raids = $raiddata[$raid];
		$raid_array = array();
		
		foreach( array_keys($data_raids) as $raidId ) {
			$raid_array[$raidId] = $data_raids[$raidId];
		}
		//Process this raid
		$output .= update_raid($raid_array);
	}
	
	$output .= "</ul>\n";
	
	return $output;
}

function update_raid($raiddata){
	global $wowdb, $roster_conf, $wordings, $db_prefix;
	
	$output = '';
	
	$raidkey = date("Y-m-d G:i:s", strtotime($raiddata['key']));
	$raidend = date("Y-m-d G:i:s", strtotime($raiddata['End']));
	$raidzone = ($raiddata['zone'] != ''?$raiddata['zone']:'RandomRaid');
	$raidnote = $raiddata['note'];
	$raidinstanceid = $raiddata['instanceid'];
	$raidnote = addslashes($raidnote);
	
	$raidday=date("Y-m-d", strtotime($raiddata['key']));
	
	
	$query_exist = "SELECT raidnum FROM `".$db_prefix."raids` WHERE (TO_DAYS(raidid) - TO_DAYS('".$raidkey."')=0) AND zone='".addslashes($raidzone)."' AND instanceid = '".$raidinstanceid."'";
	$result_exist = $wowdb->query($query_exist) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_exist);
	// If the raid exists we don't need to add or update it
		
	
	if($wowdb->num_rows($result_exist) > 0){  
		
		$row_raidnum = $wowdb->fetch_array($result_exist);		
		$raidnum = $row_raidnum[0];
		$output .= "<li>updating raid $raidnum ID:$raidinstanceid</li>";		
	
	} else {
		// Add new raid to db
		$output .= '<li>Adding Raids ID:'.$raidinstanceid.' : '.($raidzone !=''?'<b>['.$raidzone.']</b> - ':'') . '<i>' . $raidkey . '</i>' .($raidnote !=''?' ('. $raidnote.')':'') .'</li>';
	
		// Add raidinfo to db
		$wowdb->reset_values();
		$wowdb->add_value('raidid', $raidkey);
		$wowdb->add_value('instanceid', $raidinstanceid);
		$wowdb->add_value('zone', $raidzone);
		$wowdb->add_value('end', $raidend);
		$wowdb->add_value('note', $raidnote);
							
		$query_raidinfo = "INSERT INTO `".$db_prefix."raids` SET " . $wowdb->assignstr;
		# echo "<!-- $query_raidinfo -->\n";
		$wowdb->query($query_raidinfo) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_raidinfo);
		
		// Get raidnum
		$query_raidnum = "SELECT raidnum FROM `".$db_prefix."raids` WHERE raidid = '".$raidkey."' AND instanceid = '".$raidinstanceid."'";
		$result_raidnum = $wowdb->query($query_raidnum) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_raidnum);
		$row_raidnum = $wowdb->fetch_array($result_raidnum);
		
		$raidnum = $row_raidnum[0];
		$output .= "<li>adding raid $raidnum ID:$raidinstanceid</li>";
	}
	$output .="<ul>";
	// Update players in db
	$output .= '<li>Updating Players</li>';
	$playerinfo = $raiddata['PlayerInfos']; // Array[player] with playerinfo (class, race, level)
	
	foreach( array_keys( $playerinfo ) as $player_id ) {
		
		$player = $playerinfo[$player_id];
		$race = $player['race'];
		$class = $player['class'];
		$level = ($player['level'] != ''?$player['level']:70);
		
		// update info if needed
		$querystr = "SELECT name FROM `".$db_prefix."raidmembers` WHERE name = '$player_id';";
		$result = $wowdb->query($querystr) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$querystr);
		$memberInfo = $wowdb->fetch_assoc( $result );
		$wowdb->closeQuery($result);
		if ($memberInfo) {
			$subquery = "SELECT name FROM `".$db_prefix."raidmembers` WHERE race = '$race' and name = '$player_id' and class = '$class' and level = '$level';";
			$subresult = $wowdb->query($subquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$subquery);
			$levelinfo = $wowdb->fetch_assoc( $subresult );
			$wowdb->closeQuery($subresult);
			if($levelinfo){}else{
				$wowdb->reset_values();
				$wowdb->add_value('level', $level);
				
				$query_updateplayer = "UPDATE `".$db_prefix."raidmembers` SET " . $wowdb->assignstr . " WHERE name = '$player_id'";
				# echo "<!-- $query_updateplayer -->\n";
				$wowdb->query($query_updateplayer) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_updateplayer);
			}
		} else {			
			// add new player
			$wowdb->reset_values();
			$wowdb->add_value('name', $player_id);
			$wowdb->add_value('race', $race);
			$wowdb->add_value('class', $class);
			$wowdb->add_value('level', $level);
			
			$query_addplayer = "INSERT INTO `".$db_prefix."raidmembers` SET " . $wowdb->assignstr;
			# echo "<!-- $query_addplayer -->\n";
			$wowdb->query($query_addplayer) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_addplayer);
		}
	}
	
	// Add playerinfo to db (joins)
	$output .= '<li>Adding joins and leaves</li>';
	$playerjoins = $raiddata['Join']; // Array with joininfo (player, time)
	
	foreach( array_keys( $playerjoins ) as $joins ) {
		$playerInfo = $playerjoins[$joins];
		$playerName = $playerInfo['player'];
		$playerJoinDate = date("Y-m-d G:i:s", strtotime($playerInfo['time']));
		
		// check if entry already there
		$querystr = "SELECT datejoin FROM `".$db_prefix."raidjoins` WHERE name = '$playerName' and raidnum = '$raidnum';";
		$result = $wowdb->query($querystr) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$querystr);		
		if ($wowdb->num_rows($result) > 0) { 
			//alredy existe chek for first date
			$row = $wowdb->fetch_array($result);
			if(strcmp($row['datejoin'],$playerJoinDate)>0) {
				$wowdb->reset_values();
				$wowdb->add_value('datejoin', $playerJoinDate);
				$query_updateplayer = "UPDATE `".$db_prefix."raidjoins` SET " . $wowdb->assignstr . " WHERE name = '$playerName' and raidnum = '$raidnum'";
				# echo "<!-- $query_updateplayer -->\n";
				$wowdb->query($query_updateplayer) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_updateplayer);
			}
			
		} else {	
			//dont existe add new	
			$wowdb->reset_values();
			$wowdb->add_value('raidnum', $raidnum);
			$wowdb->add_value('raidid', $raidkey);
			$wowdb->add_value('datejoin', $playerJoinDate);
			$wowdb->add_value('name', $playerName);
			
			$query_addjoins = "INSERT INTO `".$db_prefix."raidjoins` SET " . $wowdb->assignstr;
			# echo "<!-- $query_addjoins -->\n";
			$wowdb->query($query_addjoins) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_addjoins);
		}
	}
	
	// Add playerinfo to db (leaves)
	$playerleaves = $raiddata['Leave']; // Array with leaveinfo (player, time)
	
	foreach( array_keys( $playerleaves ) as $leaves ) {
		$playerInfo = $playerleaves[$leaves];
		$playerName = $playerInfo['player'];
		$playerLeftDate = date("Y-m-d G:i:s", strtotime($playerInfo['time']));
		
		# skip if entry already there
		$querystr = "SELECT dateleft FROM `".$db_prefix."raidleaves` WHERE name = '$playerName' and raidnum = '$raidnum';";
		$result = $wowdb->query($querystr) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$querystr);
		if ($wowdb->num_rows($result) > 0) {
			//alredy existe chek for last date
			$row = $wowdb->fetch_array($result);			
			if(strcmp($row['dateleft'],$playerLeftDate)<0) {
				$wowdb->reset_values();
				$wowdb->add_value('dateleft', $playerLeftDate);
				$query_updateplayer = "UPDATE `".$db_prefix."raidleaves` SET " . $wowdb->assignstr . " WHERE name = '$playerName' and raidnum = '$raidnum'";
				# echo "<!-- $query_updateplayer -->\n";
				$wowdb->query($query_updateplayer) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_updateplayer);
			}
		 } else {
			$wowdb->reset_values();
			$wowdb->add_value('raidnum', $raidnum);
			$wowdb->add_value('raidid', $raidkey);
			$wowdb->add_value('dateleft', $playerLeftDate);
			$wowdb->add_value('name', $playerName);
			
			$query_addleaves = "INSERT INTO `".$db_prefix."raidleaves` SET " . $wowdb->assignstr;
			# echo "<!-- $query_addleaves -->\n";
			$wowdb->query($query_addleaves) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_addleaves);
		}
	}
	
			
	// Add lootinfo to db
	$output .= '<li>Adding loot</li>';
	$lootinfo = $raiddata['Loot']; // Array with lootinfo[id] (zone, player, time, boss, [item] => name, c)
	
	foreach( array_keys($lootinfo) as $looted ) {
		foreach( array_keys($lootinfo) as $player_looted ) {
			$lootInfo = $lootinfo[$player_looted];

			$player = $lootInfo['player'];
			$zone = $lootInfo['zone'];
			$boss = $lootInfo['boss'];
			$note = $lootInfo['note'];
			$loot = $lootInfo['item'];
			$itemname = $loot['name'];
			$count = $loot['count'];
			$codecol = $loot['c'];
			$loottime = date("Y-m-d G:i:s", strtotime($lootInfo['time']));
			
			# skip if entry already there
			$querystr = "SELECT raidId FROM `".$db_prefix."raiditems` WHERE name = '$player' and loottime = '$loottime';";
			$result = $wowdb->query($querystr) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$querystr);
			$memberInfo = $wowdb->fetch_assoc($result);
			$wowdb->closeQuery($result);
			if ($memberInfo) { } else {		
				$wowdb->reset_values();
				$wowdb->add_value('raidnum', $raidnum);
				$wowdb->add_value('raidid', $raidkey);
				$wowdb->add_value('itemname', $itemname);
				$wowdb->add_value('color', $codecol);
				$wowdb->add_value('loottime', $loottime);
				$wowdb->add_value('number', $count);
				$wowdb->add_value('zone', $zone);
				$wowdb->add_value('boss', $boss);
				$wowdb->add_value('name', $player);
				$wowdb->add_value('note', $note);

				$query_loot = "INSERT INTO `".$db_prefix."raiditems` SET " . $wowdb->assignstr;
				# echo "<!-- $query_loot -->\n";				
				$wowdb->query($query_loot) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_loot);
			}
		}
	}
	
	// Add bosskills to db
	$output .= '<li>Adding bosskills</li>';
	$bosskills = $raiddata['BossKills']; // Array with bosskills[id] (boss, time)
	
	foreach( array_keys( $bosskills ) as $bosskill ) {
		$bossInfo = $bosskills[$bosskill];
		
		$boss = $bossInfo['boss'];
		$killtime = date("Y-m-d G:i:s", strtotime($bossInfo['time']));
		
		# skip if entry already there
		$querystr = "SELECT raidId FROM `".$db_prefix."raidbosskills` WHERE boss = '".addslashes($boss)."' and raidnum = '".$raidnum."' and time = '".$killtime."';";												  
		$result = $wowdb->query($querystr) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$querystr);
		$bossExcists = $wowdb->fetch_assoc( $result );
		$wowdb->closeQuery($result);
		if ($bossExcists) { } else {
			$wowdb->reset_values();
			$wowdb->add_value('raidnum', $raidnum);
			$wowdb->add_value('raidid', $raidkey);
			$wowdb->add_value('boss', $boss);
			$wowdb->add_value('time', $killtime);
			
			$query_bosskills = "INSERT INTO `".$db_prefix."raidbosskills` SET " . $wowdb->assignstr;
			# echo "<!-- $query_bosskills -->\n";
			$wowdb->query($query_bosskills) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query_bosskills);
		}
	}
	$output .="</ul>";
	return $output;
}

?>