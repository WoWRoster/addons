<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// Include the roster dkp common functions and classes
require_once($addonDir.'inc/functions.php');
require_once($addonDir.'inc/itemlink.class.php');

class rosterdkp_raidform
{
	var $raid_id = 0;
	var $raid_start = '';
	var $raid_end = '';
	var $raid_zone = 'Random Event';
	var $raid_note = '';
	var $raid_bosses = array();
	var $raid_players = array();
	var $raid_loot = array();
	var $raid_form = '';
	var $raid_form_hidden = array();
	
	// Constructor. Parameter is a raid_id in case of editing a raid. 
	// If the raid_id is 0, a new raid and new events will be inserted.
	function rosterdkp_raidform($raidid = 0)
	{
		$this->raid_id = $raidid;
	}

	// Set the Start-Time of the raid.
	function set_start($time)
	{
		$this->raid_start = $time;
	}

	// Set the End-Time of the raid.
	function set_end($time)
	{
		$this->raid_end = $time;
	}
	
	// Set the Zone-Name of the raid.
	function set_zone($zonename)
	{
		$this->raid_zone = $zonename;
	}
	
	// Set the note of the raid.
	function set_note($note)
	{
		$this->raid_note = $note;
	}
	
	// Insert the killed bosses
	function insert_bosses($bosses)
	{
		global $roster_conf, $addon_conf, $wowdb;
		
		// Test if our boss values table exists
		$query = "SHOW TABLES LIKE '".ROSTER_ADDON_ROSTER_DKP_BOSSVAL."'";
		$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $query );
		if ( $row = $wowdb->fetch_assoc($result) )
		{
			$wowdb->free_result($result);

			// Get boss values and insert them into the array
			$query = "SELECT * FROM `".ROSTER_ADDON_ROSTER_DKP_BOSSVAL."`";
			$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $query );
			while( $row = $wowdb->fetch_assoc($result) )
			{
				$bossvalues[$row['boss_name']] = $row['dkp_value'];
			}
		}
		else
		{
			$bossvalues['default'] = 1.00;
		}
		$wowdb->free_result($result);
		
		// Insert all the bosses into the class, + their appropiate DKP value
		$bossindex = 0;
		foreach ($bosses as $boss)
		{
			$bossname_lower = strtolower($boss['name']);
			$this->raid_bosses[$bossindex]['name'] = $boss['name'];
			$this->raid_bosses[$bossindex]['killtime'] = $boss['time'];
			$this->raid_bosses[$bossindex]['zonename'] = $boss['zone'];
			if (isset($bossvalues[$bossname_lower]) && $bossvalues[$bossname_lower])
			{
				$this->raid_bosses[$bossindex]['dkp_value'] = $bossvalues[$bossname_lower];
			}
			else
			{
				$this->raid_bosses[$bossindex]['dkp_value'] = $bossvalues['default'];
			}
			$bossindex++;
		}
	}
		

	function insert_players($players)
	{
		global $roster_conf, $addon_conf, $wowdb;
		$playerindex = 0;
		foreach ($players as $player)
		{
			$playereventindex = 0;

			// Check if the player is a member of the guild
			$name_escape = $wowdb->escape($player['name']);
			$membersql = "SELECT `member_id`, `guild_id`, `class`, `level` FROM `".ROSTER_MEMBERSTABLE."` WHERE `name` = '".$name_escape."' LIMIT 1";
			$result = $wowdb->query( $membersql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $membersql );

			$this->raid_players[$playerindex]['name'] = $name_escape;
			$this->raid_players[$playerindex]['race'] = $player['race'];
			$this->raid_players[$playerindex]['join'] = $player['first_join'];
			$this->raid_players[$playerindex]['leave'] = $player['last_leave'];
			
			if ($row = $wowdb->fetch_assoc($result))
			{
				$this->raid_players[$playerindex]['roster_id'] = $row['member_id'];
				$this->raid_players[$playerindex]['guild_id'] = $row['guild_id'];
				$this->raid_players[$playerindex]['class'] = $row['class'];
				$this->raid_players[$playerindex]['level'] = $row['level'];
			}
			else
			{
				$this->raid_players[$playerindex]['roster_id'] = 0;
				$this->raid_players[$playerindex]['guild_id'] = 0;
				$this->raid_players[$playerindex]['class'] = ucfirst(strtolower($player['class']));
				$this->raid_players[$playerindex]['level'] = $player['level'];
			}
			$wowdb->free_result($result);
			
			// Check if the player already is a member of Roster DKP
			$membersql = "SELECT `member_id`, `name` FROM `".ROSTER_ADDON_ROSTER_DKP_MEMBERS."` WHERE `name` = '".$name_escape."' LIMIT 1";
			$result = $wowdb->query( $membersql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $membersql );
			if ($row = $wowdb->fetch_assoc($result))
			{
				$this->raid_players[$playerindex]['member_id'] = $row['member_id'];
			}
			else
			{
				$this->raid_players[$playerindex]['member_id'] = 0;
			}
			$wowdb->free_result($result);
			
			// Check if the player experienced any DKP valued events
			// Get UTime string for players attendence
			$playerjoin = strtotime($player['first_join']);
			$playerleave = strtotime($player['last_leave']);
			
			// Raid attendence
			if (floatval($addon_conf['roster_dkp']['rosterdkp_dkpattendence']) > 0)
			{
				if ($addon_conf['roster_dkp']['rosterdkp_dkpattpercentage'])
				{
					$dkpvaluepercentage = ($addon_conf['roster_dkp']['rosterdkp_dkpattendence']*$player['percentage'])/100;
				}
				else
				{
					$dkpvaluepercentage = $addon_conf['roster_dkp']['rosterdkp_dkpattendence'];
				}
				$this->raid_players[$playerindex]['events'][$playereventindex]['event_reference'] = $this->raid_id;
				$this->raid_players[$playerindex]['events'][$playereventindex]['type'] = 'raidatt';
				$this->raid_players[$playerindex]['events'][$playereventindex]['dkp_value'] = $dkpvaluepercentage;
				$this->raid_players[$playerindex]['events'][$playereventindex]['start'] = $player['first_join'];
				$this->raid_players[$playerindex]['events'][$playereventindex]['end'] = $player['last_leave'];
				$this->raid_players[$playerindex]['events'][$playereventindex]['note'] = $player['percentage'];
				$playereventindex++;
			}
			
			// Boss kills
			foreach ($this->raid_bosses as $key => $boss)
			{
            			if (floatval($boss['dkp_value']) > 0)
            			{
					$killtime = strtotime($boss['killtime']);
					if ($killtime > $playerjoin && $killtime < $playerleave)
					{
						$this->raid_players[$playerindex]['events'][$playereventindex]['event_reference'] = $key;
						$this->raid_players[$playerindex]['events'][$playereventindex]['type'] = 'bosskill';
						$this->raid_players[$playerindex]['events'][$playereventindex]['dkp_value'] = $boss['dkp_value'];
						$this->raid_players[$playerindex]['events'][$playereventindex]['start'] = date("Y-m-d H:i", $killtime);
						$this->raid_players[$playerindex]['events'][$playereventindex]['end'] = date("Y-m-d H:i", $killtime);
						$this->raid_players[$playerindex]['events'][$playereventindex]['note'] = $wowdb->escape($boss['name']);
						$playereventindex++;
					}
				}	
			}
			
			// Timed Bonus
			if (floatval($addon_conf['roster_dkp']['rosterdkp_dkphourbonus']) > 0)
			{
				
				$hoursjoined = floor($player['totaltime']/3600);
				$this->raid_players[$playerindex]['events'][$playereventindex]['event_reference'] = $this->raid_id;
				$this->raid_players[$playerindex]['events'][$playereventindex]['type'] = 'raidhours';
				$this->raid_players[$playerindex]['events'][$playereventindex]['dkp_value'] = $addon_conf['roster_dkp']['rosterdkp_dkphourbonus']*$hoursjoined;
				$this->raid_players[$playerindex]['events'][$playereventindex]['start'] = $player['first_join'];
				$this->raid_players[$playerindex]['events'][$playereventindex]['end'] = $player['last_leave'];
				$this->raid_players[$playerindex]['events'][$playereventindex]['note'] = $hoursjoined;
				$playereventindex++;
			}

			// On-Time Bonus
			if (floatval($addon_conf['roster_dkp']['rosterdkp_dkpontimebonus']) > 0)
			{
				if ($player['was_ontime'])
				{
					$this->raid_players[$playerindex]['events'][$playereventindex]['event_reference'] = $this->raid_id;
					$this->raid_players[$playerindex]['events'][$playereventindex]['type'] = 'raidontime';
					$this->raid_players[$playerindex]['events'][$playereventindex]['dkp_value'] = $addon_conf['roster_dkp']['rosterdkp_dkpontimebonus'];
					$this->raid_players[$playerindex]['events'][$playereventindex]['start'] = $player['first_join'];
					$this->raid_players[$playerindex]['events'][$playereventindex]['end'] = $player['first_join'];
					$this->raid_players[$playerindex]['events'][$playereventindex]['note'] = 'ontime';
					$playereventindex++;
				}
			}
			
			// Till-The-End Bonus
			if (floatval($addon_conf['roster_dkp']['rosterdkp_dkptillendbonus']) > 0)
			{
				if ($player['stay_tillend'])
				{
					$this->raid_players[$playerindex]['events'][$playereventindex]['event_reference'] = $this->raid_id;
					$this->raid_players[$playerindex]['events'][$playereventindex]['type'] = 'raidtillend';
					$this->raid_players[$playerindex]['events'][$playereventindex]['dkp_value'] = $addon_conf['roster_dkp']['rosterdkp_dkptillendbonus'];
					$this->raid_players[$playerindex]['events'][$playereventindex]['start'] = $player['last_leave'];
					$this->raid_players[$playerindex]['events'][$playereventindex]['end'] = $player['last_leave'];
					$this->raid_players[$playerindex]['events'][$playereventindex]['note'] = 'tillend';
					$playereventindex++;
				}
			}
			$playerindex++;
		}
	}
				
	function insert_loot($lootitems)
	{
		global $roster_conf, $addon_conf, $wowdb, $wordings;
		
		$itemkey = 0;
		foreach ($lootitems as $itemval)
		{
			$this->raid_loot[$itemkey]['item_name'] = $itemval['name'];
			$this->raid_loot[$itemkey]['item_id'] = $itemval['itemid'];
			$this->raid_loot[$itemkey]['item_texture'] = $itemval['icon'];
			$this->raid_loot[$itemkey]['item_quality'] = $itemval['quality'];
			$this->raid_loot[$itemkey]['item_color'] = $itemval['color'];
			$this->raid_loot[$itemkey]['item_slot'] = 'loot';
			$this->raid_loot[$itemkey]['time'] = $itemval['time'];
			$this->raid_loot[$itemkey]['zone'] = $itemval['zone'];
			$this->raid_loot[$itemkey]['note'] = $itemval['note'];
			$this->raid_loot[$itemkey]['ctrt_value'] = $itemval['value'];
			
			$this->raid_loot[$itemkey]['playerid'] = -1;
			foreach ($this->raid_players as $playerkey => $player)
			{
				if (strtolower(stripslashes($player['name'])) == strtolower(stripslashes($itemval['player'])))
				{
					$this->raid_loot[$itemkey]['playerid'] = $playerkey;
				}
			}
			$this->raid_loot[$itemkey]['playername'] = $wowdb->escape(stripslashes($itemval['player']));

			$this->raid_loot[$itemkey]['bossid'] = -1;
			foreach ($this->raid_bosses as $bosskey => $boss)
			{
				if (strtolower(stripslashes($boss['name'])) == strtolower(stripslashes($itemval['boss'])))
				{
					$this->raid_loot[$itemkey]['bossid'] = $bosskey;
				}
			}
			$this->raid_loot[$itemkey]['bossname'] = $wowdb->escape(stripslashes($itemval['boss']));
			
			$itemcache = getitemcache($itemval['itemid'], $itemval['name'], '', $itemval['quality'], $itemval['color'], $itemval['icon']);
			
			$this->raid_loot[$itemkey]['item_setid'] = $itemcache['item_setid'];
			$this->raid_loot[$itemkey]['item_setname'] = $itemcache['item_setname'];
			$this->raid_loot[$itemkey]['item_tooltip'] = $itemcache['item_tooltip'];
			
			if (isset($itemcache['dkp_value']) && floatval($itemcache['dkp_value']) > 0)
			{
				$this->raid_loot[$itemkey]['dkp_value'] = $itemcache['dkp_value'];
			}
			elseif (floatval($itemval['value']) > 0)
			{
				$this->raid_loot[$itemkey]['dkp_value'] = $itemval['value'];
			}
			else
			{
				$this->raid_loot[$itemkey]['dkp_value'] = 0.00;
			}
			
			$itemkey++;
		}
	}

	function build_form($formoptions = 0)
	{
		global $postfields, $script_filename, $roster_conf, $addon_conf, $wordings;
		
		// Tooltip Replace Patterns
		$prg_find = array("/'/",'/"/','|\\>|','|\\<|',"/\\n/");
		$prg_rep  = array("\'",'&quot;','&#8250;','&#8249;','<br />');
		
		// Arrays to hold valuable data
		$bosses = array();
		$lootitems = array();
		$players = array();

		// Start the HTML Form
		$this->form = "<!-- Begin Input Form -->\n";
		
		// One BIG box around the whole form
		$this->form .= border('sgray','start')."\n";
		$this->form .= "<table bgcolor=\"black\">\n<tr>\n<td>\n";
		
		$this->form .= '<form action="'.$script_filename.'" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">'."\n";
		
		//Display the Raid Details
		$this->form .= border('sred','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_raiddetails'])."\n";
		$this->form .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
		$this->form .= "<tr>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidzone']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidnote']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidstart']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidend']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidleader']."</td>\n";
		$this->form .= "</tr>\n<tr>\n";
		if (isset($this->raid_zone) && $this->raid_zone != '')
		{
			$this->form .= "<td class=\"membersRowRight1\">".stripslashes($this->raid_zone)."</td>\n";
			$this->form .= "<input name=\"raid[zone]\" type=\"hidden\" size=\"15\" value=\"".stripslashes($this->raid_zone)."\" />\n";
		}
		else
		{
			$this->form .= "<td class=\"membersRowRight1\"><input name=\"raid[zone]\" type=\"text\" size=\"15\" value=\"".stripslashes($this->raid_zone)."\" /></td>\n";
		}
		$this->form .= "<td class=\"membersRowRight1\"><input name=\"raid[note]\" type=\"text\" size=\"40\" value=\"".stripslashes($this->raid_note)."\" />\n</td>\n";
		$this->form .= "<td class=\"membersRowRight1\">".$this->raid_start."</td>\n";
		$this->form .= "<td class=\"membersRowRight1\">".$this->raid_end."</td>\n";
		$this->form .= "<td class=\"membersRowRight1\"><select name=\"raid[leader]\">\n<option selected value=\"Unknown\">Unknown</option>\n";
		foreach ($this->raid_players as $playername_tmp)
		{
			$this->form .= "<option value=\"".$playername_tmp['name']."\">".stripslashes($playername_tmp['name'])."</option>\n";
		}
		$this->form .= "</select>\n</td>\n";

		$this->form .= "</tr>\n</table>\n";
		$this->form .= "<input name=\"raid[id]\" type=\"hidden\" value=\"".$this->raid_id."\" />\n";
		$this->form .= "<input name=\"raid[start]\" type=\"hidden\" value=\"".$this->raid_start."\" />\n";
		$this->form .= "<input name=\"raid[end]\" type=\"hidden\" value=\"".$this->raid_end."\" />\n";
		$this->form .= border('sred','end')."<br>\n";

		// Show the Different Event Details
		$this->form .= border('sgreen','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_eventdetails'])."\n";
		$this->form .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
		$row = 1;
		
		// Header of Table
		$this->form .= "<tr>\n";
		$this->form .= "<td colspan=\"2\" class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_eventtype']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_eventref']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_eventstart']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_eventend']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_dkpvalue']."</td>\n";
		$this->form .= "</tr>\n";
		
		// DKP Attendence Event
		if (floatval($addon_conf['roster_dkp']['rosterdkp_dkpattendence']) > 0)
		{
			if ($addon_conf['roster_dkp']['rosterdkp_dkpattendence'])
			{
				$percentagemessage = ' (100%)';
			}
			else
			{
				$percentagemessage = '';
			}
			$this->form .= "<tr>\n";
			$this->form .= "<td class=\"membersRowRight1\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_attend.jpg\" /></td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidattended'].$percentagemessage."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->raid_zone)."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$this->raid_start."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$this->raid_end."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['roster_dkp']['rosterdkp_dkpattendence']."</td>\n";
			$this->form .= "</tr>\n";
			
			// Swap $row for the next
			if ($row == 1)
				$row = 2;
			else
				$row = 1;		

		}
		
		// Raid On-Time Event
		if (floatval($addon_conf['roster_dkp']['rosterdkp_dkpontimebonus']) > 0)
		{
			$this->form .= "<tr>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_ontime.jpg\" /></td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_ontimebonus']."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->raid_zone)."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$this->raid_start."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">"."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['roster_dkp']['rosterdkp_dkpontimebonus']."</td>\n";
			$this->form .= "</tr>\n";
		
			// Swap $row for the next
			if ($row == 1)
				$row = 2;
			else
				$row = 1;
		}
		
		// Raid Hour Event
		if (floatval($addon_conf['roster_dkp']['rosterdkp_dkphourbonus']) > 0)
		{
			$this->form .= "<tr>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_hour.jpg\" /></td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_hourbonus'].": ".$wordings[$roster_conf['roster_lang']]['rosterdkp_dkpperhour']."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->raid_zone)."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$this->raid_start."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$this->raid_end."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['roster_dkp']['rosterdkp_dkphourbonus']."</td>\n";
			$this->form .= "</tr>\n";
		
			// Swap $row for the next
			if ($row == 1)
				$row = 2;
			else
				$row = 1;
		}
		
		// Raid Till-End Event
		if (floatval($addon_conf['roster_dkp']['rosterdkp_dkptillendbonus']) > 0)
		{
			$this->form .= "<tr>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_tillend.jpg\" /></td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_tillendbonus']."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->raid_zone)."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">"."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$this->raid_end."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['roster_dkp']['rosterdkp_dkptillendbonus']."</td>\n";
			$this->form .= "</tr>\n";
		
			// Swap $row for the next
			if ($row == 1)
				$row = 2;
			else
				$row = 1;
		}
		
		// Boss Kill Event(s)
		if (count($this->raid_bosses) > 0)
		{
			foreach ($this->raid_bosses as $bosskey => $bossval)
			{
				$bosses[$bosskey]['name'] = $bossval['name'];
				$bosses[$bosskey]['time'] = $bossval['killtime'];
				$bosses[$bosskey]['zone'] = $bossval['zonename'];
				$bosses[$bosskey]['dkp_value'] = $bossval['dkp_value'];
				$tooltip = "test tooltip jek\'klik\n";
				//$tooltip = preg_replace($prg_find, $prg_rep, $tooltip);
				$tooltip_h = 'test';
				$this->form .= "<tr>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_bosskill.jpg\" /></div></td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_killedboss'].": <span style=\"color: #d9b200;\">".stripslashes($bosses[$bosskey]['name'])."</span></td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($bosses[$bosskey]['zone'])."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".$bosses[$bosskey]['time']."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".$bosses[$bosskey]['time']."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$bosses[$bosskey]['dkp_value']."</td>\n";
				$this->form .= "</tr>\n";

				// Set some fixed explode chars into the conf
				$this->raid_form_hidden['boss'][$bosskey]['name'] = $bosses[$bosskey]['name'];
				$this->raid_form_hidden['boss'][$bosskey]['time'] = $bosses[$bosskey]['time'];
				$this->raid_form_hidden['boss'][$bosskey]['zone'] = $bosses[$bosskey]['zone'];
				$this->raid_form_hidden['boss'][$bosskey]['dkp_value'] = $bosses[$bosskey]['dkp_value'];

				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;
			}
			// Serialize the input field for the form to limit the number of post-variables.
			$this->form .= "<input name=\"bossarray\" type=\"hidden\" value=\"".urlencode(implode_assoc_r2($this->raid_form_hidden['boss']))."\" />\n";
		}
		
		// End of the Event Box
		$this->form .= "</table>\n";
		$this->form .= border('sgreen','end')."<br>\n";
		
		// Begin of the Players Box
		$this->form .= border('syellow','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_playerdetails'])."\n";
		$this->form .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
		$this->form .= "<tr>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['name']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['level']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['class']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['race']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidstart']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidend']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_totaldkp']."</td>\n";
		$this->form .= "</tr>\n";
		$row = 1;
		if (count($this->raid_players) > 0)
		{
			foreach ($this->raid_players as $playerkey => $playerval)
			{
    				// Put the member in the form as a hidden field
    				$this->raid_form_hidden['member'][$playerkey]['member_id'] = $playerval['member_id'];
    				$this->raid_form_hidden['member'][$playerkey]['roster_id'] = $playerval['roster_id'];
    				$this->raid_form_hidden['member'][$playerkey]['level'] = $playerval['level'];
    				$this->raid_form_hidden['member'][$playerkey]['class'] = $playerval['class'];
    				$this->raid_form_hidden['member'][$playerkey]['race'] = $playerval['race'];
    				
    				// Show the details in the table
				$this->form .= "<tr>\n";
				if (isset($playerval['name']) && $playerval['name'] && $playerval['name'] != 'Unknown')
				{
					$this->raid_form_hidden['member'][$playerkey]['name'] = $playerval['name'];
					$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($playerval['name'])."</td>\n";
				}
				else
				{
					$this->raid_form_hidden['member'][$playerkey]['name'] = "Unknown";
					$this->form .= "<input name=\"member[".$playerkey."][unknown]\" type=\"hidden\" value=\"true\" />\n";
					$this->form .= "<td class=\"membersRowRight".$row."\"><input name=\"member[".$playerkey."][namenew]\" type=\"text\" size=\"20\" value=\"".stripslashes($playerval['name'])."\" />\n</td>\n";
				}
				
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($playerval['level'])."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/class_".strtolower($playerval['class']).".".$roster_conf['img_suffix']."\" /> ".stripslashes($playerval['class'])."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($playerval['race'])."</td>\n";
				
				// Process all events and display the icons with tooltips
				$this->form .= "<td class=\"membersRowRight".$row."\">";
    				
    				// some variables that we will use    				
				$tooltip = '';
				$dkptotal = number_format(0, 2, '.', '');
				$bosstooltip = '';
				$bossdkptotal = number_format(0, 2, '.', '');
				
				unset($form_ontime, $form_tillend, $form_hours);
					
				foreach ($playerval['events'] as $eventkey => $eventval)
				{	
					// Increase $dkptotal
					$dkptotal += $eventval['dkp_value'];
					
					// Put the event in the form as a hidden field
					$this->raid_form_hidden['events'][$playerkey][$eventkey]['type'] = $eventval['type'];
					$this->raid_form_hidden['events'][$playerkey][$eventkey]['reference'] = $eventval['event_reference'];
					$this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'] = $eventval['dkp_value'];
					$this->raid_form_hidden['events'][$playerkey][$eventkey]['start'] = $eventval['start'];
					$this->raid_form_hidden['events'][$playerkey][$eventkey]['end'] = $eventval['end'];
					$this->raid_form_hidden['events'][$playerkey][$eventkey]['note'] = $eventval['note'];

					$tooltip_h = $wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format($eventval['dkp_value'], 2, '.', '');
					switch($eventval['type'])
					{
						
						case 'raidatt':
							$raidatt_false = '';
							if ($eventval['note'] <= 0)
							{
								$raidatt_false = '_false';
							}
							$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_attended'].' '.$eventval['note'].'%'."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_attend".$raidatt_false.".jpg\" /></span>&nbsp;";
							break;
													
						case 'raidontime':
							$form_ontime = "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_wasontime']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_ontime.jpg\" /></span>&nbsp;";
							break;

						case 'raidtillend':
							$form_tillend = "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_stayedtillend']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_tillend.jpg\" /></span>&nbsp;";
							break;
							
						case 'raidhours':
							if (floatval($eventval['note']) > 0)
							{
								$form_hours = "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_amounthours']." ".$eventval['note']." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_hours']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_hour.jpg\" /></span>&nbsp;";
							}
							break;
							
						case 'bosskill':
							if (floatval($bossdkptotal) > 0)
							{
								$bosstooltip .= '<br>';
							}
							$bosstooltip .= stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_killedboss'].' '.stripslashes($eventval['note'])."&nbsp;&nbsp;&nbsp;DKP: ".$eventval['dkp_value'];
							$bossdkptotal += $eventval['dkp_value'];
							break;
					}
				}
				
				if (isset($form_ontime) && $form_ontime)
				{
					$this->form .= $form_ontime;
				}
				elseif (floatval($addon_conf['roster_dkp']['rosterdkp_dkpontimebonus']) > 0)
				{
					$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_wasnotontime']."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_ontime_false.jpg\" /></span>&nbsp;";
				}
				
				if (isset($form_hours) && $form_hours)
				{
					$this->form .= $form_hours;
				}
				elseif (floatval($addon_conf['roster_dkp']['rosterdkp_dkphourbonus']) > 0)
				{
					$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_amounthours']." 0 ".$wordings[$roster_conf['roster_lang']]['rosterdkp_hours']."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_hour_false.jpg\" /></span>&nbsp;";
				}

				if (isset($form_tillend) && $form_tillend)
				{
					$this->form .= $form_tillend;
				}
				elseif (floatval($addon_conf['roster_dkp']['rosterdkp_dkptillendbonus']) > 0)
				{
					$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_nottillend']."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_tillend_false.jpg\" /></span>&nbsp;";
				}

				if (count($this->raid_bosses) > 0)
				{
					if (floatval($bossdkptotal) > 0)
					{
						$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".$bosstooltip."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_killedboss']." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_totaldkp'].": ".number_format($bossdkptotal, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_bosskill.jpg\" /></span>";
					}
					else
					{
						$bosstooltip .= stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_notkillboss']."&nbsp;&nbsp;&nbsp;DKP: 0.00";
						$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".$bosstooltip."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_notkillboss']." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_totaldkp'].": ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" height=\"".$addon_conf['roster_dkp']['rosterdkp_iconsize']."px\" src=\"addons/roster_dkp/img/event_bosskill_false.jpg\" /></span>";
					}
				}
				
				$this->form .= "</td>";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", strtotime($playerval['join']))."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", strtotime($playerval['leave']))."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".number_format($dkptotal, 2, '.', '')."</td>\n";
				$this->form .= "</tr>";
				
				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;
			}
			
			// Serialize the input field for the form to limit the number of post-variables.
			$this->form .= "<input name=\"memberarray\" type=\"hidden\" value=\"".urlencode(implode_assoc_r2($this->raid_form_hidden['member']))."\" />\n";
			$this->form .= "<input name=\"eventsarray\" type=\"hidden\" value=\"".urlencode(implode_assoc_r2($this->raid_form_hidden['events']))."\" />\n";
		}
		
		// End of Players Box
		$this->form .= "</table>\n";		
		$this->form .= border('syellow','end')."\n";
		
		
		// Begin of the Loot Box
		$this->raid_form_hidden['loot'] = array();
		$row = 1;
		$this->form .= "<br>".border('spurple','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_lootdetails'])."\n";
		$this->form .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
		$this->form .= "<tr>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['item']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['loot_time']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dropped_by']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidzone']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['looted_by']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['CTRA']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['cache']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['store']."</td>\n";
		$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['charge']."</td>\n";
		
		
		$this->form .= "</tr>\n";

    		// Sort the array by color, name and time
    		foreach ($this->raid_loot as $key => $sortrow)
    		{
			$itemquality[$key]  = $sortrow['item_quality'];
			$itemname[$key]  = $sortrow['item_name'];
			$itemtime[$key]  = strtotime($sortrow['time']);
		}

		array_multisort($itemquality, SORT_DESC, $itemname, SORT_ASC, $itemtime, SORT_ASC, $this->raid_loot);
		
		foreach ($this->raid_loot as $itemkey => $itemval)
		{
			$itemdisplay = new itemlink($itemval);
			
			$itemcolor = substr($itemval['item_color'], 2, 6 );

			$this->form .= "<tr>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".$itemdisplay->display('both', true)."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", strtotime($itemval['time']))."</td>\n";
			if ($itemval['bossid'] >= 0)
			{
				$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: #d9b200;\">".stripslashes($itemval['bossname'])."</td>\n";
			}
			else
			{
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($wordings[$roster_conf['roster_lang']]['random_mob'])."</td>\n";
			}
			$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($itemval['zone'])."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($itemval['playername'])."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: #d9b200; text-align: right;\">".number_format($itemval['ctrt_value'], 2, '.', '')."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: red; text-align: right;\">".number_format($itemval['dkp_value'], 2, '.', '')."</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">\n";
			$this->form .= "<input name=\"loot[".$itemkey."][dkp_realvalue]\" type=\"text\" size=\"5\" value=\"".number_format($itemval['dkp_value'], 2, '.', '')."\" />\n</td>\n";
			$this->form .= "<td class=\"membersRowRight".$row."\" style=\"text-align: left;\">\n<table>";
			$this->form .= "<tr><td style=\"text-align: left; font-size: 8pt; color: #d9b200;\"><input name=\"loot[".$itemkey."][charge]\" type=\"radio\" checked size=\"5\" value=\"player\" /></td>\n<td style=\"text-align: left; font-size: 8pt; color: #d9b200;\">".$wordings[$roster_conf['roster_lang']]['player']."</td>\n</tr>\n";
			$this->form .= "<tr><td style=\"text-align: left; font-size: 8pt; color: #00ff00;\"><input name=\"loot[".$itemkey."][charge]\" type=\"radio\" size=\"5\" value=\"bank\" /></td>\n<td style=\"text-align: left; font-size: 8pt; color: #00ff00;\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidbank']."</td>\n</tr>\n";
			$this->form .= "</table>\n</td>\n";

			$this->form .= "</tr>\n";
			
			// Fill the hidden values into an array to serialize
			$this->raid_form_hidden['loot'][$itemkey]['item_name'] = $itemval['item_name'];
			$this->raid_form_hidden['loot'][$itemkey]['item_id'] = $itemval['item_id'];
			$this->raid_form_hidden['loot'][$itemkey]['time'] = $itemval['time'];
			$this->raid_form_hidden['loot'][$itemkey]['zone'] = $itemval['zone'];
			$this->raid_form_hidden['loot'][$itemkey]['note'] = $itemval['note'];
			$this->raid_form_hidden['loot'][$itemkey]['playerid'] = $itemval['playerid'];
			$this->raid_form_hidden['loot'][$itemkey]['bossid'] = $itemval['bossid'];
			
			// Swap $row for the next
			if ($row == 1)
				$row = 2;
			else
				$row = 1;
		}
		
		// Serialize the input field for the form to limit the number of post-variables.
		$this->form .= "<input name=\"lootarray\" type=\"hidden\" value=\"".urlencode(implode_assoc_r2($this->raid_form_hidden['loot']))."\" />\n";
			
		//$this->form .= 		
		// End of Loot Box
		$this->form .= "</table>\n";		
		$this->form .= border('spurple','end')."<br />\n";
		
		// Display the Submit button and Cancel Button
		$this->form .= '<center>'.border('sred','start',$wordings[$roster_conf['roster_lang']]['submit_raid_confirm'])."\n";
		$this->form .= "<table width=\"100%\"><tr><td align=\"left\">";
		$this->form .= "<input style=\"color: #d9b200; font-size: 16pt; font-weight: bold;\" type=\"submit\" value=\"".$wordings[$roster_conf['roster_lang']]['confirm']."\" /></td>\n";
		$this->form .= "<td></td>";
		$this->form .= "<td align=\"right\"><input style=\"color: red; font-size: 16pt; font-weight: bold;\" type=\"button\" value=\"".$wordings[$roster_conf['roster_lang']]['cancel']."\" onclick=\"history.go(-1);return false;\" /></td>\n";
		$this->form .= "</tr></table>\n";
		$this->form .= border('sred','end')."</center>\n";
		
		// End the BIG Box
		$this->form .= "</td>\n</tr>\n</table>\n";
		$this->form .= border('sgray','end')."\n";
		
		// Insert the required variables to confirm the posting of the raid
		$this->form .= "<input name=\"action\" type=\"hidden\" value=\"".$postfields['action']."\" />\n";
		$this->form .= "<input name=\"display\" type=\"hidden\" value=\"".$postfields['display']."\" />\n";
		$this->form .= "<input name=\"admindisplay\" type=\"hidden\" value=\"".$postfields['admindisplay']."\" />\n";
		$this->form .= "<input name=\"parseconfirm\" type=\"hidden\" value=\"true\" />\n";
		
		$this->form .= "</form>\n";
	}
}

// CT_RaidTracker class to parse the XML data into structured PHP data
class ct_raidtracker
{
	var $raid_start = '21:00';		// Either H:i or Y-m-d H:i:s
	var $raid_end = '00:00';		// Either H:i or Y-m-d H:i:s

	var $quality_threshold = 2;
	var $items_forced = array();
	var $items_ignored = array();
	var $looters_ignored = array();

	var $zone_name = '';			// Name of the zone.
	var $raid_note = '';			// Raid note.

	var $players = array();			// List of players and their attendance duration

	var $players_ontime = array();		// Players who where on time
	var $players_tillend = array();		// Players who where present end of raid
	var $players_ontimethreshold = null;	// Date / Time of the ontime mark.
	var $raid_endthreshold = null;		// Date / Time of the end of raid mark.

	var $items = array();			// Loot array
	var $bosses = array();			// Bosses array
	var $zones = array();			// Zones array

	var $log = '';				// Holds the log string.
	var $error = '';			// Error

	// Private use variables
	private $start = null;
	private $end = null;
	private $boss_kills = null;
	private $zone = null;
	private $raidnote = null;
	private $player_info = null;
	private $loot = null;
	private $joins = null;
	private $leaves = null;

	private function convert_date($string)
	{
		return preg_replace('|(\d+)/(\d+)/(\d+) (\d+):(\d+):(\d+)|', '20\3-\1-\2 \4:\5:\6', $string);
	}

	function ct_raidtracker($options = array() )
	{

		$this->xml = new xml_string();
		if(isset($options['raid_start']))
		{
			$this->raid_start = $options['raid_start'];
		}
		if(isset($options['raid_end']))
		{
			$this->raid_end = $options['raid_end'];
		}
		if(isset($options['quality_threshold']))
		{
			$this->quality_threshold = $options['quality_threshold'];
		}
		if(isset($options['items_forced']))
		{
			foreach($options['items_forced'] as $v)
			{
				$this->items_forced[]=strtolower($v);
			}
		}
		if(isset($options['items_ignored']))
		{
			foreach($options['items_ignored'] as $v)
			{
				$this->items_ignored[]=strtolower($v);
			}
		}
		if(isset($options['looters_ignored'])) {
			foreach($options['looters_ignored'] as $v) {
				$this->looters_ignored[]=strtolower($v);
			}
		}
	}

	private function get_zone()
	{
		$zone = $this->xml->get('zone', $this->log);
		if(is_object($zone))
		{
			$this->zone_name = $zone->get_content();
		}
	}

	private function get_start()
	{
		$start = $this->xml->get('start', $this->log);
		if(is_object($start))
		{
			$this->start = strtotime($this->convert_date($start->get_content()));
			$this->raid_start = date("Y-m-d", $this->start)." ".$this->raid_start;
		}
	}

	private function get_end()
	{
		$end = $this->xml->get('end', $this->log);
		if(is_object($end))
		{
			$this->end = strtotime($this->convert_date($end->get_content()));
			$this->raid_end = date("Y-m-d", $this->end)." ".$this->raid_end;
		}
	}

	private function get_raidnote()
	{
		$raid_note = $this->xml->get('note', $this->log);
		if(is_object($raid_note))
		{
			$this->raid_note = $raid_note->get_content();
		}
	}

	private function get_bosskills()
	{
		$this->boss_kills = $this->xml->get('BossKills', $this->log);
	}

	private function get_loot()
	{
		$this->loot = $this->xml->get('Loot', $this->log);
	}

	private function get_joins()
	{
		$this->joins = $this->xml->get('Join', $this->log);
	}

	private function get_leaves()
	{
		$this->leaves = $this->xml->get('Leave', $this->log);
	}

	private function get_playerinfo()
	{
		$this->player_info = $this->xml->get('PlayerInfos', $this->log);
	}

	private function parse_bosses()
	{
		$tmpbosses = array();
		if(is_array($this->boss_kills->children))
		{
			foreach($this->boss_kills->children as $child)
			{
				$boss = array();
				foreach($child->children as $i)
				{
					switch($i->tagname)
					{
						case 'name':
							$boss['name']=$i->get_content();
							break;
						case 'time':
							$boss['time']=$this->convert_date($i->get_content());
							break;
					}
				}
				$tmpbosses[$boss['time']]=$boss;
			}
		}

		ksort($tmpbosses);
		foreach($tmpbosses as $boss)
		{
			$this->bosses[$boss['name']]=$boss;
		}
	}

	private function parse_loot()
	{
		$tmpitems = array();
		if(is_array($this->loot->children))
		{
			foreach($this->loot->children as $child)
			{
				$item = array();
				foreach($child->children as $i)
				{
					switch($i->tagname)
					{
						case 'ItemName':
							$item['name']=utf8_decode($i->get_content());
							break;
						case 'Color':
							$item['quality']=$this->get_qualitybycolor($i->get_content());
							$item['color']=$i->get_content();
							break;
						case 'Player':
							$item['player']=ucfirst(strtolower(utf8_decode($i->get_content())));
							break;
						case 'Time':
							$item['time']=$this->convert_date($i->get_content());
							break;
						case 'Zone':
							$item['zone']=$i->get_content();
							break;
						case 'Boss':
							$item['boss']=$i->get_content();
							break;
						case 'Note':
							$item['note']=$i->get_content();
							break;
						case 'ItemID':
							$item['itemid']=$i->get_content();
							break;
						case 'Icon':
							$item['icon']=$i->get_content();
							break;
					}
				}

				if( ($item['quality'] >= $this->quality_threshold || in_array(strtolower($item['name']), $this->items_forced)) && !in_array(strtolower($item['name']), $this->items_ignored) && !in_array(strtolower($item['player']), $this->looters_ignored))
				{
					// Save zone if it's not known yet
					if(strlen($item['zone']))
					{
						if(!isset($this->zones[$item['zone']])) $this->zones[$item['zone']]=array('name' => $item['zone']);
					}

					// Save boss zone if it's not known yet
					if(strlen($item['boss']))
					{
						if(isset($this->bosses[$item['boss']])) $this->bosses[$item['boss']]['zone']=$item['zone'];
					}

					// Get item value if it's supplied.
					if(preg_match('|[-] ([0-9.]+) DKP|i', $item['note'], $match))
					{
						$item['value'] = sprintf('%0.2f', $match[1]);
					}
					else
					{
						$item['value'] = null;
					}
					$tmpitems[$item['time']]=$item;
				}
			}
		}
		ksort($tmpitems);
		$this->items=$tmpitems;
	}

	private function parse_players()
	{
		// Get player data
		if(is_array($this->player_info->children))
		{
			foreach($this->player_info->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{
					switch(strtolower($element->tagname))
					{
						case 'name':
							$currentplayer['name'] = ucfirst(strtolower(utf8_decode($element->get_content())));
							break;
						case 'class':
							$currentplayer['class'] = $element->get_content();
							break;
						case 'race':
							$currentplayer['race'] = $element->get_content();
							break;
						case 'level':
							$currentplayer['level'] = $element->get_content();
							break;
					}
				}
				$this->players[$currentplayer['name']] = $currentplayer;
			}
		}

		$joins = array();
		$leaves = array();

		// Get join data
		if(is_array($this->joins->children))
		{
			foreach($this->joins->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{

					switch($element->tagname)
					{
						case 'player':
							$currentplayer['name'] = ucfirst(strtolower(utf8_decode($element->get_content())));
							break;
						case 'time':
							$currentplayer['time'] = $this->convert_date($element->get_content());
							break;
					}
				}
				$this->players[$currentplayer['name']]['joins'][]=$currentplayer['time'];
			}
		}

		// Get leave data and find latest leave time
		$last_leave = 0;
		if(is_array($this->leaves->children))
		{
			foreach($this->leaves->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{
					switch($element->tagname)
					{
						case 'player':
							$currentplayer['name'] =  ucfirst(strtolower(utf8_decode($element->get_content())));
							break;
						case 'time':
							$currentplayer['time'] = $this->convert_date($element->get_content());
							break;
					}
				}

				$this->players[$currentplayer['name']]['leaves'][]=$currentplayer['time'];
				if(strtotime($currentplayer['time']) > $last_leave) $last_leave = $currentplayer['time'];
			}
		}


		// Set raid end time to latest leave time if none has been recorded.
		if(is_null($this->end))
		{
			$this->end = date('Y-m-d H:i:s', $last_leave);
		}

		// Clean up joins and leaves.
		$playerNames = array_keys($this->players);
		foreach($playerNames as $player)
		{
			if(!is_array( $this->players[$player]['joins']))
			{
				$this->players[$player]['joins']=array();
			}
			if(!is_array( $this->players[$player]['leaves']))
			{
				$this->players[$player]['leaves']=array();
			}
		}

		// Calculate on time threshold value
		$players_ontimethreshold = strtotime($this->raid_start);

		// Calculate end of raid threshold value
		$raid_endthreshold  = strtotime($this->raid_end);

		$this->was_ontimeThreshold = date('Y-m-d H:i:s', $players_ontimethreshold);
		$this->stay_tillendThreshold = date('Y-m-d H:i:s', $raid_endthreshold);

		foreach($playerNames as $player)
		{
			// Get a reference to the data array.
			$playerdata = &$this->players[$player];

			$jp = array();
			// Sort joins and parts and remove inconsistencies.
			foreach($playerdata['joins'] as $j)
			{
				$time = strtotime($j);
				$jp[$time]='join';
			}

			foreach($playerdata['leaves'] as $j)
			{
				$time = strtotime($j);
				//if(isset($jp[$time]) && $jp[$time] != 'leave') $doubles[$time]='leave';
				if(isset($jp[$time]))
				{
					$jp[$time+1]='leave';
				}
				else
				{
					$jp[$time]='leave';
				}
			}

			// Remove multiples.
			ksort($jp);
			$count = 0;
			$keys = array_keys($jp);
			$joins = array();
			$leaves = array();
			$last = '';

			foreach($keys as $k)
			{
				if($jp[$k] == $last)
				{
					unset($jp[$k]);
				}
				else
				{
					$last=$jp[$k];
				}
			}

			ksort($jp);

			// Last one should be a leave event.
			if(end($jp) != 'leave')
			{
				$jp[strtotime($this->end)]='leave';
			}

			if(reset($jp) != 'join')
			{
				$jp[strtotime($this->start)]='join';
			}

			ksort($jp);

			foreach($jp as $k=>$v)
			{
				if($v=='join')
				{
					$joins[]=date('Y-m-d H:i:s', $k);
				}
				if($v=='leave')
				{
					$leaves[]=date('Y-m-d H:i:s', $k);
				}
			}

			$playerdata['oldjoins']=$playerdata['joins'];
			$playerdata['oldleaves']=$playerdata['leaves'];

			$playerdata['joins']=$joins;
			$playerdata['leaves']=$leaves;

			// Get first join and last leave timestamps
			$first_join = strtotime(reset($playerdata['joins']));
			$last_leave = strtotime(end($playerdata['leaves']));
			
			$playerdata['first_join'] = date('Y-m-d H:i:s', $first_join);
			$playerdata['last_leave'] = date('Y-m-d H:i:s', $last_leave);

			// Was the player on time?
			if($first_join < strtotime($this->raid_start) && $last_leave > strtotime($this->raid_start))
			{
				$playerdata['was_ontime'] = true;
				$playerdata['first_join'] = $this->raid_start;
			}
			else
			{
				$playerdata['was_ontime'] = false;
			}

			// Check whether player was there at the end of the raid.
			if($last_leave > strtotime($this->raid_end) && $first_join < strtotime($this->raid_end))
			{
				$playerdata['stay_tillend'] = true;
				$playerdata['last_leave'] = $this->raid_end;
			}
			else
			{
				$playerdata['stay_tillend'] = false;
			}

			$totaltime = $this->get_attendancetime($playerdata, $players_ontimethreshold, $raid_endthreshold);
			$time = $players_ontimethreshold;

			while($time < $last_leave)
			{
				$hourtime = $this->get_attendancetime($playerdata, $time, ($time+3600 > $last_leave ? $last_leave : $time+3600) );
				$playerdata['time_perhour'][]=$hourtime;
				$time += 3600;
			}


			$stringtime = $this->get_time($totaltime);
			$playerdata['totaltime'] = $totaltime;
			$playerdata['stringtime'] = $stringtime;
			$playerdata['percentage']= round($totaltime / ($raid_endthreshold-$players_ontimethreshold) * 100);

		}
		ksort($this->players);
	}

	private function get_attendancetime(&$playerdata, $start, $end)
	{
		// Cap time at thresholds.
		$totaltime = 0;

		for($i=0; $i<count($playerdata['joins']); $i++)
		{
			$j = strtotime($playerdata['joins'][$i]);
			$l = strtotime($playerdata['leaves'][$i]);
			if($l >= $start && $j <= $end)
			{
				$totaltime += ($l > $end ? $end : $l) - ($j < $start ? $start : $j);
			}
		}

		return $totaltime;
	}

	private function get_qualitybycolor($color)
	{
		$color = strtolower($color);
		if($color == "ffff8000")
		{
			return 5;
		}
		elseif($color == "ffa335ee")
		{
			return 4;
		}
		elseif($color == "ff0070dd")
		{
			return 3;
		}
		elseif($color == "ff1eff00")
		{
			return 2;
		}
		elseif($color == "ffffffff")
		{
			return 1;
		}
		elseif($color == "ff9d9d9d")
		{
			return 0;
		}
		else
		{
			return false;
		}
	}

	private function get_time($seconds)
	{
		$minutes = floor($seconds / 60);
		$seconds = $seconds - $minutes * 60;
		$hours = floor($minutes / 60);
		$minutes = $minutes - $hours * 60;
		return sprintf("%01d:%02d:%02d", $hours, $minutes, $seconds);
	}

	public function process($log)
	{
		$this->log = trim(str_replace(array("\r", "\n"), '', $log));
		if(!preg_match('|<raidinfo>.*</raidinfo>|i', $this->log))
		{
			$this->error = 'Invalid logdata';
			return false;
		}

		// Convert to DOM tree
		$this->log = $this->xml->getRootNode($this->log);

		// Retrieve subtrees
		$this->get_start();
		$this->get_end();
		$this->get_zone();
		$this->get_raidnote();
		$this->get_bosskills();
		$this->get_loot();
		$this->get_playerinfo();
		$this->get_joins();
		$this->get_leaves();

		$this->parse_players();
		$this->parse_bosses();
		$this->parse_loot();

		return true;
	}
}

// XML String class
class xml_string 
{
	var $xml;

	function xml_string($xmldata = '') 
	{
	}

	// Returns domxmlNode of rootnode in supplied xml string.
	function getRootNode($xmldata) 
	{
		$xmlstring = utf8_encode(str_replace(array("\n", "\r"), '', $xmldata));
		$p = new xmlParser();
		if($p->parse($xmlstring)) 
		{
			return $p->rootnodes[0];
		} 
		else 
		{
			return false;
		}
	}

	// Finds a tag or tags amongst the children of the node object or the rootnode of supplied xml string.
	function get($tag, $data = null) 
	{
		$blocks = array();
		if(is_string($data)) 
		{
			$data = $this->getRootNode($xmldata);
		}

		foreach($data->children as $k => $child) 
		{
			if($child->tagname == $tag) 
			{
				$blocks[] = $child;
			}
		}

		if(count($blocks) > 1) 
		{
			return $blocks;
		} 
		elseif(count($blocks) == 1) 
		{
			return $blocks[0];
		} 
		else
		{
			return null;
		}
	}
}

// Simple xml parser class
class xmlParser  
{
	var $parser;
	var $stack;
	var $rootnodes;

	function xmlParser()
	{
		$this->parser = xml_parser_create();
		xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
		xml_set_object($this->parser, $this);
		xml_set_element_handler($this->parser, "tag_open", "tag_close");
		xml_set_character_data_handler($this->parser, "cdata");
	}

	// Parse the supplied xml.
	function parse($data)
	{
		$this->stack = array();
		$this->rootnodes = array();
		$result = xml_parse($this->parser, $data);
		if(!$result) 
		{
			$this->errorCode = xml_get_error_code($this->parser);
			$this->errorText = xml_error_string($this->parser);
			$this->errorLine = xml_get_current_line_number($this->parser).', '.xml_get_current_line_number;

		}
		return result;
	}

	// Tag open function
	function tag_open($parser, $tag, $attributes)
	{
		$node = new xmlNode();
		$node->tagname=$tag;
		$node->attributes = $attributes;
		array_push($this->stack, $node);
	}

	// cdata function
	function cdata($parser, $cdata)
	{
		$node = array_pop($this->stack);
		$node->text.=$cdata;
		array_push($this->stack, $node);
	}

	// Tag close function
	function tag_close($parser, $tag)
	{
		$node = array_pop($this->stack);
		if(count($this->stack)) 
		{
			$parent = array_pop($this->stack);
			$parent->children[]=$node;
			array_push($this->stack, $parent);
		}
		else
		{
			$this->rootnodes[] = $node;
		}
	}
}

// Dom like node class
class xmlNode 
{
	var $tagname = '';
	var $attributes = array();
	var $text = '';
	var $children = array();

	function get_content() 
	{
		return $this->text;
	}
}


?>
