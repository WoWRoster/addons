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

include '../../../settings.php';
include '../conf.php';
include '../inc/functions.php';
include '../inc/itemlink.class.php';
include 'xmls.php';
$roster_conf['interface_url'] = "/dkp_wizzard/img/";
$addonDir = "/dkp_wizzard/addons/dkp_wizard";
include_once ('../../../roster_header.tpl');


if (isset($_GET['format']))
{
	if ($_GET['format'] == 'new')
	{
		$xml = $xmlnew;
	}
	else
	{
		$xml = $xmlold;
	}
}
else
{
	$xml = $xmlold;
}


$ctrt = new ct_raidtracker($xml);
print("<pre>");
//print("error: ".$ctrt->error."\n");
//print("zone: ".$ctrt->zone_name."\n");
//print("format: ".$ctrt->format."\n");
//print("start: ".$ctrt->raid_start."\n");
//print("end: ".$ctrt->raid_end."\n");
//print("duration: ".$ctrt->raid_duration."\n");
//print("note: ".$ctrt->raid_note."\n");
//print("prefix: ".$GLOBALS['db_prefix']."\n");
//print("\n");

//print("Was Shalkir there? : ".$ctrt->was_player_present($ctrt->players['Shalkir'], 1158788752)."\n");
//print_r ($ctrt->players['Shalkir']);
//print_r ($ctrt->players['Shalkir']);
//print_r ($ctrt->bosses);
//print_r ($addon_conf);
//print_r ($ctrt->players);
//print_r ($ctrt->items);
print(getitemcache('19927:0:0:0', "Mar'li's Touch", '', 3, 'ffa335ee', "INV_Wand_06", 0));
print("</pre>");

$ctrt->build_form();
print($ctrt->form);

include_once ('../../../roster_footer.tpl');

class ct_raidtracker
{
	// Variables that will output data
	var $xml;
	var $raid_start = '';	
	var $raid_end = '';
	var $raid_duration = '';

	var $quality_threshold = 2;
	var $items_forced = array();
	var $items_ignored = array();
	var $looters_ignored = array();

	var $zone_name = '';			// Name of the zone.
	var $raid_note = '';			// Raid note.

	var $players = array();			// List of players and their attendance duration

	var $items = array();			// Loot array
	var $bosses = array();			// Bosses array
	var $zones = array();			// Zones array

	var $form = '';					// Holds the form HTML for final parsing
	var $raid_form_hidden = array();

	var $xmlstring = '';			// Holds the XML log string
	var $error = '';				// Error string if there are any errors

	// Default Constructor
	// This function will gather all data from the XML string and stores it in the class variables
	function ct_raidtracker($xmlstring)
	{
		global $wowdb, $addon_conf, $options;
		
		// Create an instance of the XML class
		$this->xml = new xml_string();
		
		// Insert the XML string into the variable
		$this->xmlstring = trim(str_replace(array("\r", "\n"), '', $xmlstring));
		
		// Check if the XML string is valid, otherwise raise an error
		if(!preg_match('|<raidinfo>.*</raidinfo>|i', $this->xmlstring))
		{
			$this->error = 'Invalid XML Log Data String';
			return false;
		}
		
		// Convert to DOM tree
		$this->xmlstring = $this->xml->getRootNode($this->xmlstring);
		
		// Gather the options parsed
		if(isset($addon_conf['dkpw_quality_threshold']))
		{
			$this->quality_threshold = $addon_conf['dkpw_quality_threshold'];
		}
		if(isset($addon_conf['dkpw_items_forced']))
		{
			foreach($addon_conf['dkpw_items_forced'] as $v)
			{
				$this->items_forced[]=strtolower($v);
			}
		}
		if(isset($addon_conf['dkpw_items_ignored']))
		{
			foreach($addon_conf['dkpw_items_ignored'] as $v)
			{
				$this->items_ignored[]=strtolower($v);
			}
		}
		
		// Get the Zone Name
		$zone = $this->xml->get('zone', $this->xmlstring);
		if(is_object($zone))
		{
			$this->zone_name = $zone->get_content();
		}
		
		// Get the Raid-Note
		$raid_note = $this->xml->get('note', $this->xmlstring);
		if(is_object($raid_note))
		{
			$this->raid_note = $raid_note->get_content();
		}
		
		// Get the start time of the raid (utime)
		$start = $this->xml->get('start', $this->xmlstring);
		if(is_object($start))
		{
			$this->raid_start = $start->get_content();
			
			if (strtotime($this->convert_date($this->raid_start)))
			{
				// Mark the format as OLD Format for the Modded CTRT addon output
				$this->format = 'old';

				// Convert the time from string to utime
				$this->raid_start = strtotime($this->convert_date($this->raid_start));
			}
			else
			{
				// Mark the format as NEW Format for the Modded CTRT addon output
				$this->format = 'new';
			}
		}
		
		// Get the End Time of the raid (utime)
		$end = $this->xml->get('end', $this->xmlstring);
		if(is_object($end))
		{
			$this->raid_end = $end->get_content();
			
			if ($this->format == 'old')
			{
				// Convert the time from string to utime
				$this->raid_end = strtotime($this->convert_date($this->raid_end));
			}
		}
		
		// Calculate the raid duration
		$this->raid_duration = $this->raid_end - $this->raid_start;
		
		// Get the players
		$player_info = $this->xml->get('PlayerInfos', $this->xmlstring);
		
		// Get player data
		if(is_array($player_info->children))
		{
			foreach($player_info->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{
					switch(strtolower($element->tagname))
					{
						case 'name':
							$currentplayer['name'] = ucfirst(strtolower($wowdb->escape($element->get_content())));
							break;
						case 'class':
							$currentplayer['class'] = ucfirst(strtolower($wowdb->escape($element->get_content())));
							break;
						case 'race':
							$currentplayer['race'] = ucfirst(strtolower($wowdb->escape($element->get_content())));
							break;
						case 'level':
							$currentplayer['level'] = $element->get_content();
							break;
						case 'guild':
							$currentplayer['guild'] = $element->get_content();
							break;
					}
				}
				$this->players[$currentplayer['name']] = $currentplayer;
			}
		}
		
		// Get the times for the players
		// Get all the Join times for all players
		$joins = $this->xml->get('Join', $this->xmlstring);
		if(is_array($joins->children))
		{
			foreach($joins->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{
					switch($element->tagname)
					{
						case 'player':
							$currentplayer['name'] = ucfirst(strtolower($wowdb->escape($element->get_content())));
							break;
						case 'time':
							if ($this->format == 'old')
							{
								$currentplayer['time'] = strtotime($this->convert_date($element->get_content()));
							}
							else
							{
								$currentplayer['time'] = $element->get_content();
							}
							break;
					}
				}
				// Insert an entry for that time in the players times array as Join (1)
				$this->players[$currentplayer['name']]['times'][$currentplayer['time']] = 1;
			}
		}
		$leaves = $this->xml->get('Leave', $this->xmlstring);
		if(is_array($leaves->children))
		{
			foreach($leaves->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{

					switch($element->tagname)
					{
						case 'player':
							$currentplayer['name'] = ucfirst(strtolower($wowdb->escape($element->get_content())));
							break;
						case 'time':
							if ($this->format == 'old')
							{
								$currentplayer['time'] = strtotime($this->convert_date($element->get_content()));
							}
							else
							{
								$currentplayer['time'] = $element->get_content();
							}
							break;
					}
				}
				// Insert an entry for that time in the players times array as Leave (0)
				$this->players[$currentplayer['name']]['times'][$currentplayer['time']] = 0;
			}
		}
		
		// Process the Join/Leaves
		foreach ($this->players as $playername => $playerdata)
		{
			// Sort the Join/Leave times to the time (which is the key)
			ksort($this->players[$playername]['times']);
			
			// Set some variables
			$i = 0;
			$timecount = count($this->players[$playername]['times']);
			$lastjoin = 0;
			$lastleave = 0;
			$totaltime = 0;
			
			// Process all times
			foreach ($this->players[$playername]['times'] as $time => $type)
			{
				// Set the Temp variables
				if ($type)
				{
					$lastjoin = $time;
				}
				else
				{
					$lastleave = $time;
				}					
				
				// If this is the first join time, check for On-Time
				if ($i == 0 && $type == 1)
				{
					// Check if the player was on-time
					if ($time < $this->raid_start)
					{
						$this->players[$playername]['ontime'] = 1;
					}
					else
					{
						$this->players[$playername]['ontime'] = 0;
					}
					
					// Set the players first join time
					$this->players[$playername]['join'] = $time;
				}
				
				// Add time to Total-Time for the player if he left during the raid
				if ($type == 0 && $lastjoin)
				{
					$totaltime += $lastleave - $lastjoin;
				}
				
				// If this is the last leave time, check for Till-End
				if ($i == $timecount - 1 && $type == 0)
				{
					if ($time > $this->raid_end)
					{
						$this->players[$playername]['tillend'] = 1;
					}
					else
					{
						$this->players[$playername]['tillend'] = 0;
					}
					$this->players[$playername]['leave'] = $time;
				}
				// The last Join/Leave was a Join, the player probably stayed till the end
				elseif ($i == $timecount - 1 && $type == 1)
				{
					$this->players[$playername]['tillend'] = 1;
					$this->players[$playername]['leave'] = $this->raid_end;
				}
				
				// Increase the counter
				$i++;
			}
			
			// Set the total played time for the player
			if ($totaltime > $this->raid_duration)
			{
				$this->players[$playername]['totaltime'] = $this->raid_duration;
				$this->players[$playername]['percentage'] = 100;
			}
			else
			{
				$this->players[$playername]['totaltime'] = $totaltime;
				$this->players[$playername]['percentage'] = round($totaltime/($this->raid_duration/100));
			}
		}
		
		// Get the Boss-kills
		$boss_kills = $this->xml->get('BossKills', $this->xmlstring);
		$tmpbosses = array();
		if(is_array($boss_kills->children))
		{
			foreach($boss_kills->children as $child)
			{
				$boss = array();
				foreach($child->children as $i)
				{
					switch($i->tagname)
					{
						case 'name':
							$boss['name'] = $i->get_content();
							break;
						case 'time':
							if ($this->format == 'old')
							{
								$boss['time'] = strtotime($this->convert_date($i->get_content()));
							}
							else
							{
								$boss['time'] = $i->get_content();
							}
							break;
					}
				}
				
				if (isset($boss['name']))
				{
					$boss['dkp_value'] = $addon_conf['dkpbosskillbonus'];
					foreach ($options['bossvalue'] as $bossname => $dkp_value)
					{
						if (strtolower($boss['name']) == strtolower($bossname))
						{
							$boss['dkp_value'] = $dkp_value;
						}
					}
				}
				else
				{
					$boss['dkp_value'] = 0.00;
				}
				
				$tmpbosses[$boss['time']] = $boss;
			}
		}
		// Sort the bosses by name
		ksort($tmpbosses);
		
		// Insert the killed bosses in the bosses array
		foreach($tmpbosses as $boss)
		{
			$this->bosses[$boss['name']]=$boss;
		}
		
		// Get the Looted Items
		$loot = $this->xml->get('Loot', $this->xmlstring);
		$tmploot = array();
		if(is_array($loot->children))
		{
			foreach($loot->children as $child)
			{
				$item = array();
				foreach($child->children as $i)
				{
					switch($i->tagname)
					{
						case 'ItemName':
							$item['name'] = $i->get_content();
							break;
						case 'Time':
							if ($this->format == 'old')
							{
								$item['time'] = strtotime($this->convert_date($i->get_content()));
							}
							else
							{
								$item['time'] = $i->get_content();
							}
							break;
						case 'ItemID':
							//itemId:enchantId:suffixId:uniqueId
							$tmpitemid = $i->get_content();
							$tmpitemid = explode(':', $tmpitemid);
							$item['id']['itemid'] = $tmpitemid[0];
							$item['id']['enchantid'] = $tmpitemid[1];
							$item['id']['suffixid'] = $tmpitemid[2];
							break;
						case 'Boss':
							$item['boss'] = $i->get_content();
							break;
						case 'Color':
							$item['color'] = $i->get_content();
							break;
						case 'Icon':
							$item['texture'] = $i->get_content();
							break;
						case 'Count':
							$item['quantity'] = $i->get_content();
							break;
						case 'Player':
							$item['looter'] = $i->get_content();
							break;
						case 'Note':
							$item['note'] = $i->get_content();
							break;
						case 'Costs':
							$item['dkp_value'] = $i->get_content();
							break;
					}
				}
				
				// Get item value if it's supplied in the note
				if (isset($item['note']) && !isset($item['dkp_value']))
				{
					if(preg_match('|[-] ([0-9.]+) DKP|i', $item['note'], $match))
					{
						$item['dkp_value'] = sprintf('%0.2f', $match[1]);
					}
					else
					{
						$item['dkp_value'] = null;
					}
				}
				
				// Get the quality of the item
				if (isset($item['color']))
				{
					$item['quality'] = $this->get_qualitybycolor($item['color']);
				}
				
				// Check how many players were around during the loot of this item
				$numplayers = 0;
				foreach ($this->players as $player)
				{
					if ($this->was_player_present($player, $item['time']))
					{
						$numplayers++;
					}
				}
				$item['numplayers'] = $numplayers;
				$this->items[] = $item;
			}
		}
	}
	
	// Function to build up the After-Parse form to check the data
	function build_form()
	{
		global $postfields, $script_filename, $roster_conf, $addonDir, $addon_conf, $wordings, $wowdb, $options;
		
		// Check if there was a raid start AND end time
		if ($this->raid_start > 0 && $this->raid_end > $this->raid_start)
		{
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
			$this->form .= border('sred','start',$wordings[$roster_conf['roster_lang']]['dkpw_raiddetails'])."\n";
			$this->form .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
			$this->form .= "<tr>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidzone']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidnote']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidstart']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidend']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidleader']."</td>\n";
			$this->form .= "</tr>\n<tr>\n";
			if (isset($this->raid_zone) && $this->raid_zone != '')
			{
				$this->form .= "<td class=\"membersRowRight1\">".stripslashes($this->raid_zone)."</td>\n";
				$this->form .= "<input name=\"raid[zone]\" type=\"hidden\" size=\"15\" value=\"".stripslashes($this->raid_zone)."\" />\n";
			}
			else
			{
				$this->form .= "<td class=\"membersRowRight1\"><input name=\"raid[zone]\" type=\"text\" size=\"15\" value=\"".stripslashes($this->zone_name)."\" /></td>\n";
			}
			$this->form .= "<td class=\"membersRowRight1\"><input name=\"raid[note]\" type=\"text\" size=\"40\" value=\"".stripslashes($this->raid_note)."\" />\n</td>\n";
			$this->form .= "<td class=\"membersRowRight1\">".date("Y-m-d H:i", $this->raid_start)."</td>\n";
			$this->form .= "<td class=\"membersRowRight1\">".date("Y-m-d H:i", $this->raid_end)."</td>\n";
			$this->form .= "<td class=\"membersRowRight1\"><select name=\"raid[leader]\">\n<option selected value=\"Unknown\">Unknown</option>\n";
			foreach ($this->players as $playername_tmp)
			{
				$this->form .= "<option value=\"".$playername_tmp['name']."\">".$wowdb->escape($playername_tmp['name'])."</option>\n";
			}
			$this->form .= "</select>\n</td>\n";
	
			$this->form .= "</tr>\n</table>\n";
			$this->form .= "<input name=\"raid[id]\" type=\"hidden\" value=\"".$this->raid_id."\" />\n";
			$this->form .= "<input name=\"raid[start]\" type=\"hidden\" value=\"".$this->raid_start."\" />\n";
			$this->form .= "<input name=\"raid[end]\" type=\"hidden\" value=\"".$this->raid_end."\" />\n";
			$this->form .= border('sred','end')."<br>\n";
	
			// Show the Different Event Details
			$this->form .= border('sgreen','start',$wordings[$roster_conf['roster_lang']]['dkpw_eventdetails'])."\n";
			$this->form .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
			$row = 1;
			
			// Header of Table
			$this->form .= "<tr>\n";
			$this->form .= "<td colspan=\"2\" class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_eventtype']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_eventref']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_eventstart']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_eventend']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_dkpvalue']."</td>\n";
			$this->form .= "</tr>\n";
			
			// DKP Attendence Event
			if (floatval($addon_conf['dkpattendence']) > 0)
			{
				if ($addon_conf['dkpattendence'])
				{
					$percentagemessage = ' (100%)';
				}
				else
				{
					$percentagemessage = '';
				}
				$this->form .= "<tr>\n";
				$this->form .= "<td class=\"membersRowRight1\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_attend.jpg\" /></td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidattended'].$percentagemessage."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->raid_zone)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $this->raid_start)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $this->raid_end)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['dkpattendence']."</td>\n";
				$this->form .= "</tr>\n";
				
				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;		
	
			}
			
			// Raid On-Time Event
			if (floatval($addon_conf['dkpontimebonus']) > 0)
			{
				$this->form .= "<tr>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_ontime.jpg\" /></td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['dkpw_ontimebonus']."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->zone_name)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $this->raid_start)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">"."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['dkpontimebonus']."</td>\n";
				$this->form .= "</tr>\n";
			
				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;
			}
			
			// Raid Hour Event
			if (floatval($addon_conf['dkphourbonus']) > 0)
			{
				$this->form .= "<tr>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_hour.jpg\" /></td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['dkpw_hourbonus'].": ".$wordings[$roster_conf['roster_lang']]['dkpw_dkpperhour']."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->raid_zone)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $this->raid_start)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $this->raid_end)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['dkphourbonus']."</td>\n";
				$this->form .= "</tr>\n";
			
				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;
			}
			
			// Raid Till-End Event
			if (floatval($addon_conf['dkptillendbonus']) > 0)
			{
				$this->form .= "<tr>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_tillend.jpg\" /></td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['dkpw_tillendbonus']."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->raid_zone)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">"."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $this->raid_end)."</td>\n";
				$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">".$addon_conf['dkptillendbonus']."</td>\n";
				$this->form .= "</tr>\n";
			
				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;
			}
			
			// Boss Kill Event(s)
			if (count($this->bosses) > 0)
			{
				foreach ($this->bosses as $bosskey => $bossval)
				{
					$bosses[$bosskey]['name'] = $bossval['name'];
					$bosses[$bosskey]['time'] = $bossval['time'];
					$bosses[$bosskey]['zone'] = $bossval['zonename'];
					$bosses[$bosskey]['dkp_value'] = $bossval['dkp_value'];

					//$tooltip = preg_replace($prg_find, $prg_rep, $tooltip);
					$this->form .= "<tr>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_bosskill.jpg\" /></div></td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".$wordings[$roster_conf['roster_lang']]['dkpw_killedboss'].": <span style=\"color: #d9b200;\">".stripslashes($bosses[$bosskey]['name'])."</span></td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($bosses[$bosskey]['zone'])."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $bosses[$bosskey]['time'])."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $bosses[$bosskey]['time'])."</td>\n";
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
			$this->form .= border('syellow','start',$wordings[$roster_conf['roster_lang']]['dkpw_playerdetails'])."\n";
			$this->form .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
			$this->form .= "<tr>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['name']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['level']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['class']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['race']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_event']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidstart']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_raidend']."</td>\n";
			$this->form .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkpw_totaldkp']."</td>\n";
			$this->form .= "</tr>\n";
			$row = 1;
			
			if (count($this->players) > 0)
			{
				foreach ($this->players as $playerkey => $playerval)
				{
	    			// Put the member in the form as a hidden field
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
					$this->form .= "<td class=\"membersRowRight".$row."\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/class_".strtolower($playerval['class']).".".$roster_conf['img_suffix']."\" /> ".stripslashes($playerval['class'])."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($playerval['race'])."</td>\n";
					
					// Process all events and display the icons with tooltips
					$this->form .= "<td class=\"membersRowRight".$row."\">";
	    				
	    			// some variables that we will use    				
					$tooltip = '';
					$dkptotal = number_format(0, 2, '.', '');
					$bosstooltip = '';
					$bossdkptotal = number_format(0, 2, '.', '');
					
					//unset($form_ontime, $form_tillend, $form_hours);
					
					// Get all the appropiate events for the player
					$dkptotal = 0.00;
					$eventkey = 0;
					
					// Raid Attendence
					if (floatval($addon_conf['dkpattendence']) > 0.00)
					{
						$attended_false = '_false';
					
						if ($playerval['percentage'] > $addon_conf['dkpattpercentage'])
						{
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['type'] = 'raidatt';
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['reference'] = 1;
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'] = ($addon_conf['dkpattendence']/100)*$playerval['percentage'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['start'] = $playerval['join'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['end'] = $playerval['leave'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['note'] = $playerval['percentage'];

							// Show the correct ATTENDED image rather than the UNATTENDED image
							$attended_false = '';
							$dkptotal += $this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'];
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format($this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'], 2, '.', '');
							$eventkey++;
						}
						else
						{
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format(0, 2, '.', '');
						}
						
						// Put the event in the form
						$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['dkpw_attended'].' '.$playerval['percentage'].'%'."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_attend".$attended_false.".jpg\" /></span>&nbsp;";
					}
					
					// Was Player On-Time
					if ($playerval['percentage'] > $addon_conf['dkpattpercentage'] && floatval($addon_conf['dkpontimebonus']) > 0)
					{
						$ontime_false = '_false';
					
						if ($this->was_player_present($playerval, $this->raid_start))
						{
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['type'] = 'raidontime';
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['reference'] = 1;
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'] = $addon_conf['dkpontimebonus'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['start'] = $playerval['join'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['end'] = $playerval['leave'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['note'] = 'ontime';

							// Show the correct ATTENDED image rather than the UNATTENDED image
							$ontime_false = '';
							$dkptotal += $this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'];
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format($this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'], 2, '.', '');

							// Put the event in the form
							$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['dkpw_wasontime']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_ontime".$ontime_false.".jpg\" /></span>&nbsp;";
							$eventkey++;
						}
						else
						{
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format(0, 2, '.', '');
							// Put the event in the form
							$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['dkpw_wasnotontime']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_ontime".$ontime_false.".jpg\" /></span>&nbsp;";
						}
					}

					// Get the Hourly Bonus Event
					if ($playerval['percentage'] > $addon_conf['dkpattpercentage'] && floatval($addon_conf['dkphourbonus']) > 0)
					{
						$hours_false = '_false';
					
						if (floor($playerval['totaltime']/3600) > 0)
						{
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['type'] = 'raidhours';
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['reference'] = 1;
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'] = floor($playerval['totaltime']/3600) * $addon_conf['dkphourbonus'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['start'] = $playerval['join'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['end'] = $playerval['leave'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['note'] = floor($playerval['totaltime']/3600);

							// Show the correct ATTENDED image rather than the UNATTENDED image
							$hours_false = '';
							$dkptotal += $this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'];
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format($this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'], 2, '.', '');
							$eventkey++;
						}
						else
						{
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format(0, 2, '.', '');
						}
						
						// Put the event in the form
						$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['dkpw_amounthours']." ".floor($playerval['totaltime']/3600)." ".$wordings[$roster_conf['roster_lang']]['dkpw_hours']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_hour".$hours_false.".jpg\" /></span>&nbsp;";
					}

					// Did Player Stay-Till-End
					if ($playerval['percentage'] > $addon_conf['dkpattpercentage'] && floatval($addon_conf['dkptillendbonus']) > 0)
					{
						$tillend_false = '_false';
					
						if ($this->was_player_present($playerval, $this->raid_end))
						{
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['type'] = 'raidtillend';
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['reference'] = 1;
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'] = $addon_conf['dkptillendbonus'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['start'] = $playerval['join'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['end'] = $playerval['leave'];
							$this->raid_form_hidden['events'][$playerkey][$eventkey]['note'] = 'tillend';

							// Show the correct ATTENDED image rather than the UNATTENDED image
							$tillend_false = '';
							$dkptotal += $this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'];
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format($this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'], 2, '.', '');

							// Put the event in the form
							$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['dkpw_stayedtillend']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_tillend".$tillend_false.".jpg\" /></span>&nbsp;";
							$eventkey++;
						}
						else
						{
							$tooltip_h = $wordings[$roster_conf['roster_lang']]['dkpw_event']." - DKP: ".number_format(0, 2, '.', '');
							// Put the event in the form
							$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['dkpw_nottillend']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_tillend".$tillend_false.".jpg\" /></span>&nbsp;";
						}
					}
					
					// Did Player kill any bosses ?
					if ($playerval['percentage'] > $addon_conf['dkpattpercentage'])
					{
						$bossdkptotal = 0.00;
						$bosstooltip = '';
						if (is_array($this->raid_form_hidden['boss']))
						{
							foreach ($this->raid_form_hidden['boss'] as $bosskey => $bossval)
							{
								if ($this->was_player_present($playerval, $bossval['time']))
								{
									$this->raid_form_hidden['events'][$playerkey][$eventkey]['type'] = 'bosskill';
									$this->raid_form_hidden['events'][$playerkey][$eventkey]['reference'] = $bosskey;
									$this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'] = $bossval['dkp_value'];
									$this->raid_form_hidden['events'][$playerkey][$eventkey]['start'] = $bossval['time'];
									$this->raid_form_hidden['events'][$playerkey][$eventkey]['end'] = $bossval['time'];
									$this->raid_form_hidden['events'][$playerkey][$eventkey]['note'] = $bossval['name'];
									
									// Set the boss tooltip
									if (floatval($bossdkptotal) > 0)
									{
										$bosstooltip .= '<br>';
									}
									$bosstooltip .= addslashes(stripslashes($playerval['name']))." ".$wordings[$roster_conf['roster_lang']]['dkpw_killedboss'].' '.addslashes(stripslashes($this->raid_form_hidden['events'][$playerkey][$eventkey]['note']))."&nbsp;&nbsp;&nbsp;DKP: ".$this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'];
									$bossdkptotal += $this->raid_form_hidden['events'][$playerkey][$eventkey]['dkp_value'];
									$eventkey++;
								}
							}
						}
						
						// If there were boss kills, display the appropiate tooltip
						if (floatval($bossdkptotal) > 0)
						{
							$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".$bosstooltip."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['dkpw_killedboss']." ".$wordings[$roster_conf['roster_lang']]['dkpw_totaldkp'].": ".number_format($bossdkptotal, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_bosskill.jpg\" /></span>";
							$dkptotal += $bossdkptotal;
						}
						else
						{
							$bosstooltip .= stripslashes($playerval['name'])." ".$wordings[$roster_conf['roster_lang']]['dkpw_notkillboss']."&nbsp;&nbsp;&nbsp;DKP: 0.00";
							$this->form .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".$bosstooltip."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['dkpw_notkillboss']." ".$wordings[$roster_conf['roster_lang']]['dkpw_totaldkp'].": ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$addon_conf['iconsize']."px\" height=\"".$addon_conf['iconsize']."px\" src=\"".$addonDir."/img/event_bosskill_false.jpg\" /></span>";
						}
					}
					
					$this->form .= "</td>";
					$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $playerval['join'])."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $playerval['leave'])."</td>\n";
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
	    	foreach ($this->items as $key => $sortrow)
	    	{
				$itemquality[$key]  = $sortrow['quality'];
				$itemname[$key]  = $sortrow['name'];
				$itemtime[$key]  = strtotime($sortrow['time']);
			}
	
			array_multisort($itemquality, SORT_DESC, $itemname, SORT_ASC, $itemtime, SORT_ASC, $this->items);
			
			foreach ($this->items as $itemkey => $itemval)
			{
				$item_from_cache = getitemcache($itemval['id']['itemid'].':'.$itemval['id']['enchantid'].':'.$itemval['id']['suffixid'].':0', $itemval['name'], '', $itemval['quality'], $itemval['color'], $itemval['texture']);
			
				// Check if the quality is sufficient to show/charge the player at all
				// And that the item is not on the ignore list, or even on the forced list!
				if (($itemval['quality'] >= $addon_conf['qualityfilter'] && !in_array($itemval['id']['itemid'], $options['items_ignored'])) || in_array($itemval['id']['itemid'], $options['items_forced']))
				{
					$itemdisplay = new itemlink($item_from_cache);
					$itemcolor = substr($itemval['color'], 2, 6 );
					
					$this->form .= "<tr>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".$itemdisplay->display('both', true)."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".date("Y-m-d H:i", $itemval['time'])."</td>\n";
					if (isset($itemval['boss']) && $itemval['boss'] != '')
					{
						$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: #d9b200;\">".stripslashes($itemval['boss'])."</td>\n";
					}
					else
					{
						$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($wordings[$roster_conf['roster_lang']]['random_mob'])."</td>\n";
					}
					//$item_from_cache['dkp_value']
					
					if (floatval($item_from_cache['dkp_value']) > 0)
					{
						$item_post_val = $item_from_cache['dkp_value'];
					}
					else
					{
						$item_post_val = $itemval['dkp_value'];
					}
					
					$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($this->zone_name)."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\">".stripslashes($itemval['looter'])."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: #d9b200; text-align: right;\">".number_format($itemval['dkp_value'], 2, '.', '')."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: red; text-align: right;\">".number_format($item_from_cache['dkp_value'], 2, '.', '')."</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\" style=\"color: green; text-align: right;\">\n";
					$this->form .= "<input name=\"loot[".$itemkey."][dkp_realvalue]\" type=\"text\" size=\"5\" value=\"".number_format($item_post_val, 2, '.', '')."\" />\n</td>\n";
					$this->form .= "<td class=\"membersRowRight".$row."\" style=\"text-align: left;\">\n<table>";
					$this->form .= "<tr><td style=\"text-align: left; font-size: 8pt; color: #d9b200;\"><input name=\"loot[".$itemkey."][charge]\" type=\"radio\" checked size=\"5\" value=\"player\" /></td>\n<td style=\"text-align: left; font-size: 8pt; color: #d9b200;\">".$wordings[$roster_conf['roster_lang']]['player']."</td>\n</tr>\n";
					$this->form .= "<tr><td style=\"text-align: left; font-size: 8pt; color: #00ff00;\"><input name=\"loot[".$itemkey."][charge]\" type=\"radio\" size=\"5\" value=\"bank\" /></td>\n<td style=\"text-align: left; font-size: 8pt; color: #00ff00;\">".$wordings[$roster_conf['roster_lang']]['dkpw_nocharge']."</td>\n</tr>\n";
					$this->form .= "<tr><td style=\"text-align: left; font-size: 8pt; color: #00ff00;\"><input name=\"loot[".$itemkey."][charge]\" type=\"radio\" size=\"5\" value=\"ignore\" /></td>\n<td style=\"text-align: left; font-size: 8pt; color: #a335ee;\">".$wordings[$roster_conf['roster_lang']]['dkpw_ignore']."</td>\n</tr>\n";
					
					$this->form .= "</table>\n</td>\n";
		
					$this->form .= "</tr>\n";
				}
				else
				{
					$this->form .= "<input name=\"loot[".$itemkey."][charge]\" type=\"hidden\" value=\"bank\" />\n";
				}
				
				// Fill the hidden values into an array to serialize
				$this->raid_form_hidden['loot'][$itemkey]['name'] = $itemval['item_name'];
				$this->raid_form_hidden['loot'][$itemkey]['itemid'] = $itemval['id']['itemid'].':'.$itemval['id']['enchantid'].':'.$itemval['id']['suffixid'];
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
			
		}
		else
		{
			$this->error .= "No correct END and/or START time was found in the raid!";
			$this->form .= "No correct END and/or START time was found in the raid!";
		}
	}
	
	// Function to convert old-style date/time to utime
	function convert_date($string)
	{
		return preg_replace('|(\d+)/(\d+)/(\d+) (\d+):(\d+):(\d+)|', '20\3-\1-\2 \4:\5:\6', $string);
	}
	
	// Insert a player (including joins & leaves) and a time. It will return TRUE or FALSE
	function was_player_present($player, $utime)
	{
		$returnvalue = FALSE;
		foreach ($player['times'] as $time => $type)
		{
			// $type is a join, so if the $time was smaller than the $utime, The player was present (for now!)
			if ($time <= $utime && $type)
			{
				$returnvalue = TRUE;
			}
			// $type is leave, so if the $time is was smaller than the $utime, The player was not present.
			// If at a later stage, the player joined again, and the $time was still smaller than the $utime event,
			// the player will again be flagged as present.
			elseif ($time < $utime && !$type)
			{
				$returnvalue = FALSE;
			}
		}
		return $returnvalue;
	}
	
	// Function to get the quality of the loot by color
	function get_qualitybycolor($color)
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
		/*if(is_string($data)) 
		{
			$data = $this->getRootNode($xmldata);
		}*/

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
		return $result;
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
