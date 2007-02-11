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

if (isset($allow_dkp_login) && $allow_dkp_login)
{
	require_once($addonDir.'inc/rosterdkp.class.php');
	require_once($addonDir.'inc/calculations.functions.php');
	
	$postfields = array_merge($_GET, $_POST);
	if (isset($display) && $display)
	{
		$postfields['display'] = $display;
	}
	if (isset($admindisplay) && $admindisplay)
	{
		$postfields['admindisplay'] = $admindisplay;
	}
	
	if ($postfields['admindisplay'] == 'edititems' && isset($postfields['postconfirm']) && $postfields['postconfirm'])
	{
		// Start updating the new DKP Values into the item cache
		if (is_array($postfields['itemupdate']) && count($postfields['itemupdate']) > 0)
		{
			foreach ($postfields['itemupdate'] as $itemcache_id => $dkp_value)
			{
				$update_item_sql = "UPDATE `".ROSTER_ADDON_ROSTER_DKP_CACHE."` SET `dkp_value` = '".$dkp_value['dkp_value']."' WHERE `cache_id` = '".$itemcache_id."' LIMIT 1";
				$update_item_result = $wowdb->query( $update_item_sql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $update_item_sql );
				
				if (!$update_item_result)
				{
					print("<span style=\"color: red; font-size: large;\">COULD NOT UPDATE ITEM CACHE FOR ITEMID: ".$itemcache_id."</span><br>\n");
				}
			}
		}
	}

	
	if ($postfields['admindisplay'] == 'edititems')
	{
		// Get the items from the cache, limited by 50 rows each time.
		if (isset($postfields['limitstart']))
		{
			$limitstart = $postfields['limitstart'];
		}
		else
		{
			$limitstart = 0;
		}
		$itemcache_count_query = "SELECT COUNT(*) FROM ".ROSTER_ADDON_ROSTER_DKP_CACHE;
		$itemcache_count_result = $wowdb->query( $itemcache_count_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $itemcache_count_query );
		$itemcache_count = $wowdb->fetch_assoc($itemcache_count_result);
		$itemcache_count = $itemcache_count['COUNT(*)'];
		
		$form = '<!-- Begin Input Form -->'."\n";
		$itemcache_item_query = "SELECT * FROM ".ROSTER_ADDON_ROSTER_DKP_CACHE." ORDER BY `item_quality` DESC, `dkp_value` LIMIT ".$limitstart.", 30";
		$itemcache_result = $wowdb->query( $itemcache_item_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $itemcache_item_query );
		while ($itemcache_item = $wowdb->fetch_assoc($itemcache_result))
		{
			$items[$itemcache_item['cache_id']] = $itemcache_item;
		}

		// Set the link to the next / previous page
		$pagelink = $wordings[$roster_conf['roster_lang']]['rosterdkp_edititems'];
		if ($limitstart)
		{
			$limitstartnew = $limitstart - 30;
			$pagelink = '<a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=edititems&amp;limitstart='.$limitstartnew.'"><span style="font-weight: normal; font-size: 9px; color: yellow;"><< previous page <<</span></a>&nbsp;&nbsp;'.$pagelink;
		}
		else
		{
			$pagelink = '<span style="font-weight: normal; font-size: 9px; color: gray;"><< previous page <<</span>&nbsp;&nbsp;'.$pagelink;
		}
		
		if (($limitstart+30) < $itemcache_count)
		{
			$limitstartnew = $limitstart + 30;
			$pagelink = $pagelink.'&nbsp;&nbsp;<a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=edititems&amp;limitstart='.$limitstartnew.'"><span style="font-weight: normal; font-size: 9px; color: yellow;">>> next page >></span></a>';
		}
		else
		{
			$pagelink = $pagelink.'&nbsp;&nbsp;<span style="font-weight: normal; font-size: 9px; color: gray;">>> next page >></span>';
		}
		$form .= border('syellow', 'start', $pagelink)."\n";
		$form .= '<form action="'.$script_filename.'" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">'."\n";

		$form .= '<table class="bodyline" cellspacing="0" cellpadding="0">'."\n";

		$tablerow = 1;
		foreach ($items as $key => $value)
		{
			$itemlink[$key] = new itemlink($value);
			$form .= "<tr>\n<td class=\"membersRow".$tablerow."\">".$itemlink[$key]->display('both', true)."</td>\n";
			$form .= "<td class=\"DKPValueRow".$tablerow."\"><input name=\"itemupdate[".$key."][dkp_value]\" type=\"text\" size=\"5\" value=\"".number_format($value['dkp_value'], 2, '.', '')."\" /></td>\n</tr>\n";
			
			// Swap $row for the next
			if ($tablerow == 1)
				$tablerow = 2;
			else
				$tablerow = 1;
		}
		if (count($items) > 0)
		{

		}
		
		// Insert the required variables to confirm the posting of the raid
		$form .= "<input name=\"action\" type=\"hidden\" value=\"".$postfields['action']."\" />\n";
		$form .= "<input name=\"display\" type=\"hidden\" value=\"".$postfields['display']."\" />\n";
		$form .= "<input name=\"admindisplay\" type=\"hidden\" value=\"".$postfields['admindisplay']."\" />\n";
		$form .= "<input name=\"postconfirm\" type=\"hidden\" value=\"true\" />\n";
		$form .= "<input name=\"limitstart\" type=\"hidden\" value=\"".$limitstart."\" />\n";
		
		$form .= "</table>\n";
		$form .= border('syellow', 'end')."<br>\n";
		
		if (count($items) > 0)
		{
			// Display the Submit button and Cancel Button
			$form .= '<center>'.border('sred','start','Save Item DKP Values')."\n";
			$form .= "<table width=\"50%\"><tr><td align=\"left\">";
			$form .= "<input style=\"color: #d9b200; font-size: 12pt; font-weight: bold;\" type=\"submit\" value=\"".$wordings[$roster_conf['roster_lang']]['confirm']."\" /></td>\n";
			$form .= "<td></td>";
			$form .= "<td align=\"right\"><input style=\"color: red; font-size: 12pt; font-weight: bold;\" type=\"button\" value=\"".$wordings[$roster_conf['roster_lang']]['cancel']."\" onclick=\"history.go(-1);return false;\" /></td>\n";
			$form .= "</tr></table>\n";
			$form .= border('sred','end')."</center>\n";
		}
		
		$form .= "</form>\n";

		// Print the form		
		print($form);
	}
	
	if ($postfields['admindisplay'] == 'insertnewraid' && !isset($postfields['parseconfirm']))
	{
	
		// Calculate the default start and end of the raid
		$starttime = date("Y-m-d")." ".$addon_conf['roster_dkp']['rosterdkp_startraid'];
		$endtime = strtotime($starttime)+(3600*$addon_conf['roster_dkp']['rosterdkp_durationraid']);
		$endtime = date("H:i", $endtime);
		$starttime = date("H:i", strtotime($starttime));
		
		$form = '<!-- Begin Input Form -->'."\n";
		// Include jquery.js javascript to enable: Remove text in input field once tis selected
		$form .= '<script type="text/javascript" src="addons/roster_dkp/js/jquery.js"></script>';
		$form .= '<script type="text/javascript">$(document).ready(function(){$(document.getElementById("input_search")).set("value","\['.$wordings[$roster_conf['roster_lang']]['rosterdkp_parse_dkpstring'].'\]")
$(document.getElementById("input_search")).click(function(){$(document.getElementById("input_search")).set("value","").unclick();});$("#fancysearch label").hide();});</script>';
		
		$form .= '<form action="'.$script_filename.'" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">'."\n";
		$form .= border('sblue','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_insertnewraid'].': '.$wordings[$roster_conf['roster_lang']]['rosterdkp_paste_dkpstring'])."\n";
		$form .= '<table class="bodyline" cellspacing="0" cellpadding="0">'."\n";
		$form .= "<tr>\n<td class=\"membersRowRight1\">\n".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidstart'].":&nbsp;<input name=\"raidstarttime\" type=\"text\" size=\"20\" value=\"".$starttime."\" />\n</td>\n<td class=\"membersRowRight1\">\n".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidend'].":&nbsp;<input name=\"raidendtime\" type=\"text\" size=\"20\" value=\"".$endtime."\" />\n</td>\n</tr>\n";
		$form .= "<tr>\n<td colspan=\"2\" class=\"membersRowRight2\">\n<textarea id=\"input_search\" class=\"txtinput\" name=\"dkpstringxml\" rows=\"20\" cols=\"80\" style=\"color: #CBA300; background-color: #2e2d2b\">[".$wordings[$roster_conf['roster_lang']]['rosterdkp_parse_dkpstring']."]</textarea>\n</td>\n</tr>\n";
		$form .= "<tr>\n<td colspan=\"2\" class=\"membersRowRight1\" valign=\"bottom\">\n<div align=\"center\">\n<input type=\"submit\" value=\"".$wordings[$roster_conf['roster_lang']]['rosterdkp_parse_dkpstring']."\" />\n</div>\n</td>\n</tr>\n";
	  	$form .= "</table>\n";
		$form .= border('sblue','end');
		$form .= '<input name="parseconfirm" type="hidden" value="false" />'."\n";
		if (is_array($postfields))
		{
			foreach($postfields as $key => $value)
			{
				$form .= '<input name="'.$key.'" type="hidden" value="'.$value.'" />'."\n";
			}
		}
		$form .= '</form>'."\n";
		$form .= '<!-- End Input Form -->'."\n";
		
		print($form);
	}
	elseif ($postfields['admindisplay'] == 'insertnewraid' && isset($postfields['parseconfirm']) && $postfields['parseconfirm'] == 'false')
	{
		if (isset($postfields['dkpstringxml']) && $postfields['dkpstringxml'])
		{
			// Fill the rest of the options
			$options['raid_start'] = $postfields['raidstarttime'];
			$options['raid_end'] = $postfields['raidendtime'];
			$options['quality_threshold'] = $addon_conf['roster_dkp']['rosterdkp_qualityfilter'];

			// Create an instance of the ct_rt class and fill it
			$ctraid = new ct_raidtracker($options);
			$result = $ctraid->process($postfields['dkpstringxml']);
			
			// There were errors in parsing the string!
			if ($ctraid->error)
			{
				$exitstring = '<span class="title_text">';
				$exitstring .= $wordings[$roster_conf['roster_lang']]['rosterdkp_errorparsing'];
				$exitstring .= ': </span><span style="font-size:18px;color:red;">';
				$exitstring .= $ctraid->error.'</span><br>';
				print($exitstring);
			}
			else
			{
				$raidform = new rosterdkp_raidform(0);
				$raidform->set_start($ctraid->raid_start);
				$raidform->set_end($ctraid->raid_end);
				$raidform->set_zone($ctraid->zone_name);
				$raidform->set_note($ctraid->raid_note);
				$raidform->insert_bosses($ctraid->bosses);
				$raidform->insert_players($ctraid->players);
				$raidform->insert_loot($ctraid->items);
				$raidform->build_form();

				print($raidform->form);
			}
		}
	}
	elseif ($postfields['admindisplay'] == 'insertnewraid' && isset($postfields['parseconfirm']) && $postfields['parseconfirm'] == 'true')
	{
		// Reset the output to display after the insert
		$output = '';
		
		// Get some arrays ready to push stuff in for later reference
		$raid = array();
		$bosses = array();
		$players = array();
		$events = array();
		$loot = array();

		// Get the Raid info from the post and process it		
		if (isset($_POST['raid']))
		{
			$raid = $_POST['raid'];
			if (isset($raid['id']))
			{
				$raid = $_POST['raid'];
				if ($raid['id'])
				{
					//Updating previous raid <--- A lot of stuff has to be done to do so
				}
				else
				{
					$output .= border("syellow", 'start', "<span style=\"color: #d9b200; font-size: 10pt; font-weight: bold;\">Inserting Raid:</span>")."<table>";
					$output .= "<tr><td class=\"membersHeader\">Raid Zone:</td><td class=\"membersHeader\" style=\"color: green;\">".stripslashes($raid['zone'])."</td></tr>\n";
					$output .= "<tr><td class=\"membersHeader\">Raid Note:</td><td class=\"membersHeader\" style=\"color: green;\">".stripslashes($raid['note'])."</td></tr>\n";
					$output .= "<tr><td class=\"membersHeader\">Raid Start Time:</td><td class=\"membersHeader\" style=\"color: green;\">".$raid['start']."</td></tr>\n";
					$output .= "<tr><td class=\"membersHeader\">Raid End Time:</td><td class=\"membersHeader\" style=\"color: green;\">".$raid['end']."</td></tr>\n";
					$output .= "<tr><td class=\"membersHeader\">Raid Leader:</td><td class=\"membersHeader\" style=\"color: green;\">".stripslashes($raid['leader'])."</td></tr>\n";

					// We are inserting a new raid. Prepare the sql query
					$raid_insert_sql = "INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_RAIDS."` ( `zone`, `note`, `start`, `end`, `loot_filter`, `leader`) VALUES ('".$raid['zone']."', '".$raid['note']."', '".$raid['start']."', '".$raid['end']."', '".$addon_conf['roster_dkp']['rosterdkp_qualityfilter']."', '".$raid['leader']."')";
					// Insert the raid into the DB
					if ($result = $wowdb->query( $raid_insert_sql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $raid_insert_sql ))
					{
						$raid['raid_id'] = mysql_insert_id();
						if ($raid['raid_id'] > 0)
						{
							$output .= "<tr><td class=\"membersHeader\">Raid Database ID:</td><td class=\"membersHeader\" style=\"color: green;\">".$raid['raid_id']."</td></tr>\n";
						}
						else
						{
							$output .= "<tr><td class=\"membersHeader\" colspan=\"2\" style=\"color: red; font-size: 12pt; font-weight: bold;\">!! Raid Database ID was NOT set correctly !!</td></tr>\n";
						}
					}
					else
					{
						$output .= "<td colspan=\"2\"><b>INSERT Failed!!!</b></td>";
					}
					$wowdb->resetMessages();
					$output .= "</table>".border("syellow", 'end');
				}
			}
		}
		// Display output and reset
		print($output.'<br>');
		$output = '';
		
		if (!$raid['raid_id'])
		{
			exit(1);
		}
		else
		{
			if (isset($_POST['bossarray']))
			{
				// Un-Serialize the urlencoded serialized post variable string
				$bosses_tmp = urldecode($_POST['bossarray']);
				$bosses = explode_assoc_r2($bosses_tmp);
				$bosses_temp = '';
				
				// Make a box for the output
				$output .= border("sgreen", 'start', "<span style=\"color: lightgreen; font-size: 10pt; font-weight: bold;\">Inserting Boss Kill's:</span>");
				$output .= "<table><tr><td class=\"membersHeader\">Raid ID</td><td class=\"membersHeader\">Boss Kill ID</td><td class=\"membersHeader\">Boss Name</td><td class=\"membersHeader\">Kill Zone</td><td class=\"membersHeader\">Kill Time</td><td class=\"membersHeader\">DKP Value Awarded</td></tr>\n";
				$row = 1;
				foreach ($bosses as $bosskey => $bossvalue)
				{
					// Insert the boss kill in the database and reference it against the $raid['raid_id']
					$insert_boss_sql = "INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_BOSSKILL."` (`raid_id`, `boss_name`, `zone`, `kill_time`, `dkp_value`) VALUES ('".$raid['raid_id']."', '".$bossvalue['name']."', '".$bossvalue['zone']."', '".$bossvalue['time']."', '".$bossvalue['dkp_value']."')";
					if ($result = $wowdb->query( $insert_boss_sql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $insert_boss_sql ))
					{
						$output .= "<tr><td class=\"membersRowRight".$row."\" style=\"color: white;\">".$raid['raid_id']."</td>\n";
						
						$bosses[$bosskey]['boss_id'] = mysql_insert_id();
						if ($bosses[$bosskey]['boss_id'] > 0)
						{
							$output .= "<td class=\"membersRowRight".$row."\" style=\"color: green;\">".$bosses[$bosskey]['boss_id']."</td>\n";
						}
						else
						{
							$output .= "<td class=\"membersRowRight".$row."\" style=\"color: red; font-weight: bold;\">!!! NONE !!!</td>\n";
						}
						
						$output .= "<td class=\"membersRowRight".$row."\" style=\"color: #d9b200;\">".stripslashes($bossvalue['name'])."</td><td  class=\"membersRowRight".$row."\" style=\"color: white;\">".stripslashes($bossvalue['zone'])."</td><td  class=\"membersRowRight".$row."\" style=\"color: white; font-weight: bold;\">".$bossvalue['time']."</td><td class=\"membersRowRight".$row."\" style=\"color: green; font-weight: bold; align: right;\">".number_format($bossvalue['dkp_value'], 2, '.', '')."</td></tr>\n";
					}
					else
					{
						$output .= "<tr><td colspan=\"6\"><b>INSERT BOSSKILL FAILED!!!</b></td></tr>\n";
					}
					$wowdb->resetMessages();
					
					// Swap $row for the next
					if ($row == 1)
						$row = 2;
					else
						$row = 1;
				}
				$output .= "</table>".border("sgreen", 'end');
				// Display output and reset
				print($output.'<br>');
				$output = '';	
			}
			
			// Grab all the Raid Members from the post and put them in the players array.
			if (isset($_POST['memberarray']))
			{
				$memberarray = urldecode($_POST['memberarray']);
				$memberarray = explode_assoc_r2($memberarray);
				
				foreach ($memberarray as $playerkey => $playerval)
				{
					if ($playerval['member_id'])
					{
						$players[$playerkey]['insert'] = 'update';
						$players[$playerkey]['member_id'] = $playerval['member_id'];
					}
					else
					{
						$players[$playerkey]['insert'] = 'insert';
						$players[$playerkey]['member_id'] = 0;
					}
					
					if ($playerval['name'] == 'Unknown')
					{
						if (isset($_POST['member'][$playerkey]['namenew']) && $_POST['member'][$playerkey]['namenew'])
						{
							$players[$playerkey]['name'] = $_POST['member'][$playerkey]['namenew'];
						}
					}
					elseif ($playerval['name'])
					{
						$players[$playerkey]['name'] = $playerval['name'];
					}
					else
					{
						$players[$playerkey]['name'] = 'Unknown';
					}
					
					$players[$playerkey]['roster_id'] = $playerval['roster_id'];
					$players[$playerkey]['class'] = $playerval['class'];
					$players[$playerkey]['level'] = $playerval['level'];
					$players[$playerkey]['race'] = $playerval['race'];
					
				}
				$memberarray = '';
			}
			
			// Grab all events from the post and shove them into the players array
			if (isset($_POST['eventsarray']))
			{
				$events = urldecode($_POST['eventsarray']);
				$events = explode_assoc_r2($events);
				foreach ($events as $playerkey => $event)
				{
					foreach ($event as $playereventkey => $playerevent)
					{
						$players[$playerkey]['events'][$playereventkey] = $playerevent;
					}
				}
			}
			
			// Grab all looted items and look for changed DKP value.
			// Also if a player was charged for the item looted, make an event in the players array
			if (isset($_POST['lootarray']))
			{
				$loot = urldecode($_POST['lootarray']);
				$loot = explode_assoc_r2($loot);
			}
		
			
			// Get DKP and player info, and insert that into the item array.
			// Make a box for the output
			$output .= border("spurple", 'start', "<span style=\"color: lightgreen; font-size: 10pt; font-weight: bold;\">Inserting Looted Items</span>");
			$output .= "<table><tr><td class=\"membersHeader\">DB Item ID</td><td class=\"membersHeader\">Item</td><td class=\"membersHeader\">Looted From</td><td class=\"membersHeader\">Looter</td><td class=\"membersHeader\">DKP Value</td></tr>\n";
			$row = 1;
			
			foreach ($loot as $lootkey => $lootval)
			{
				// DKP Info
				if (isset($_POST['loot'][$lootkey]))
				{
					$loot[$lootkey]['dkp_value'] = $_POST['loot'][$lootkey]['dkp_realvalue'];
					$loot[$lootkey]['type'] = $_POST['loot'][$lootkey]['charge'];
				}
				else
				{
					$loot[$lootkey]['dkp_value'] = '';
					$loot[$lootkey]['type'] = 'bank';
				}
				
				
				// Get the item details from the itemcache, and update the DKP value in the cache at once!
				$loot[$lootkey]['item_details'] = getitemcache($loot[$lootkey]['item_id'], $loot[$lootkey]['item_name'], $loot[$lootkey]['dkp_value']);

				// Insert the Looted Item into the database.
				if ($loot[$lootkey]['bossid'] >= 0)
				{
					$bossname = $bosses[$loot[$lootkey]['bossid']]['name'];
				}
				else
				{
					$bossname = 'Random';
				}
				
				if ($loot[$lootkey]['type'] == 'bank')
				{
					$lootername = 'Raidbank';
				}
				else
				{
					$lootername = $players[$loot[$lootkey]['playerid']]['name'];
				}
					
				$itemdisplay = new itemlink($loot[$lootkey]['item_details']);
				
				// Define the Loot Insert query.
				$insert_loot_sql = "INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_LOOT."` (`raid_id`, `cache_id`, `item_id`, `item_note`, `item_quantity`, `boss_id`, `looter_id`, `dkp_value`) VALUES ('".$raid['raid_id']."', '".$loot[$lootkey]['item_details']['cache_id']."', '".$loot[$lootkey]['item_id']."', '".$loot[$lootkey]['note']."', '1', '".$bosses[$loot[$lootkey]['bossid']]['boss_id']."', '0', '".$loot[$lootkey]['dkp_value']."')";

 				// Insert the row
				if ($lootresult = $wowdb->query( $insert_loot_sql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $insert_loot_sql ))
				{
					$output .= "<tr>\n";
					
					$loot[$lootkey]['loot_id'] = mysql_insert_id();
					if ($loot[$lootkey]['loot_id'] > 0)
					{
						$output .= "<td class=\"membersRowRight".$row."\" style=\"color: green;\">".$loot[$lootkey]['loot_id']."</td>\n";
					}
					else
					{
						$output .= "<td class=\"membersRowRight".$row."\" style=\"color: red; font-weight: bold;\">!!! NONE !!!</td>\n";
					}
					
					$output .= "<td class=\"membersRowRight".$row."\" style=\"color: #d9b200;\">".$itemdisplay->display('both')."</td><td  class=\"membersRowRight".$row."\" style=\"color: white;\">".stripslashes($bossname)."</td><td  class=\"membersRowRight".$row."\" style=\"color: white; font-weight: bold;\">".stripslashes($lootername)."</td><td class=\"membersRowRight".$row."\" style=\"color: green; font-weight: bold; align: right;\">".number_format($loot[$lootkey]['dkp_value'], 2, '.', '')."</td></tr>\n";
					
					// Player Loot Event Insert
					if ($loot[$lootkey]['type'] == 'player')
					{
						$lootevent = array (
							'type' 		=> 'loot',
							'reference' 	=> $loot[$lootkey]['loot_id'],
							'dkp_value' 	=> 0.00 - $loot[$lootkey]['dkp_value'],
							'start' 	=> $loot[$lootkey]['time'],
							'end' 		=> $loot[$lootkey]['time'],
							'note' 		=> $loot[$lootkey]['bossid']
							
						);
						$players[$loot[$lootkey]['playerid']]['events'][] = $lootevent;
					}
				}
				else
				{
					$output .= "<tr><td colspan=\"5\"><b>INSERT LOOT ITEM FAILED!!!</b></td></tr>\n";
				}
				$wowdb->resetMessages();
				
				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;
			}

			$output .= "</table>".border("spurple", 'end');
			// Display output and reset
			print($output.'<br>');
			$output = '';
			
			
			// Now lets insert the players and their events.
			$output .= border('sorange','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_playerdetails'])."\n";
			$output .= "<table width=\"1000\" class=\"bodyline\" cellspacing=\"0\" cellpadding=\"0\">\n";
			$output .= "<tr>\n";
			$output .= "<td class=\"membersHeader\">Action</td>\n";
			$output .= "<td class=\"membersHeader\">Member ID</td>\n";
			$output .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['name']."</td>\n";
			$output .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['class']."</td>\n";
			$output .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['level']."</td>\n";
			$output .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']."</td>\n";
			$output .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_totaldkp']."</td>\n";
			$output .= "</tr>\n";
			$row = 1;
			
			foreach ($players as $playerkey => $playerval)
			{
				$output .= "<tr>\n";
				if ($playerval['insert'] == 'insert')
				{
					$player_query = "INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_MEMBERS."` (`roster_id`, `name`, `class`, `race`, `level`) VALUES ('".$playerval['roster_id']."', '".$playerval['name']."', '".$playerval['class']."', '".$playerval['race']."', '".$playerval['level']."')";
				
//					print($player_query);
					// Insert the row
					if ($playerresult = $wowdb->query( $player_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $player_query ))
					{
						// Get the newly created member_id.
						$players[$playerkey]['member_id'] = mysql_insert_id();
					
						if ($players[$playerkey]['member_id'] > 0)
						{
							$output .= "<td class=\"membersRowRight".$row."\" style=\"color: green;\">Inserted Member</td>\n";
							$output .= "<td class=\"membersRowRight".$row."\" style=\"color: green;\">".$players[$playerkey]['member_id']."</td>\n";
						}
						else
						{
							$output .= "<td class=\"membersRowRight".$row."\" style=\"color: red;\">Did NOT Insert Member</td>\n";
							$output .= "<td class=\"membersRowRight".$row."\" style=\"color: red; font-weight: bold;\">!!! NONE !!!</td>\n";
						}
					}
				}
				elseif ($playerval['insert'] == 'update')
				{
					// If the member already existed, update the details of the member rather than inserting a new member.
					$player_query = "UPDATE `".ROSTER_ADDON_ROSTER_DKP_MEMBERS."` SET `roster_id` = '".$playerval['roster_id']."', `name` = '".$playerval['name']."', `class` = '".$playerval['class']."', `level` = '".$playerval['level']."', `race` = '".$playerval['race']."' WHERE `member_id` = ".$playerval['member_id']." LIMIT 1";
						$result = $wowdb->query( $player_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $player_query );
						
					if ($result)
					{
						$output .= "<td class=\"membersRowRight".$row."\" style=\"color: green;\">Updated Member</td>\n";
						$output .= "<td class=\"membersRowRight".$row."\" style=\"color: green;\">".$players[$playerkey]['member_id']."</td>\n";
					}
					else
					{
						$output .= "<td class=\"membersRowRight".$row."\" style=\"color: red;\">COULD NOT UPDATE MEMBER</td>\n";
						$output .= "<td class=\"membersRowRight".$row."\" style=\"color: red; font-weight: bold;\">!!! ".$players[$playerkey]['member_id']." !!!</td>\n";
					}
				}
				
				// Some more output stuff
				$output .= "<td class=\"membersRowRight".$row."\" style=\"color: #d9b200;\">".stripslashes($playerval['name'])."</td>\n";
				$output .= "<td class=\"membersRowRight".$row."\" style=\"color: white;\">".stripslashes($playerval['class'])."</td>\n";
				$output .= "<td class=\"membersRowRight".$row."\" style=\"color: white;\">".$playerval['level']."</td>\n";

				//Insert the player Events and update the Loot-events with the correct member_id for later reference.
				$playereventtooltip = "<table><tr><td>Action</td><td>Type</td><td>DKP</td></tr>";
				$totaldkpplayer = 0.00;
				foreach ($playerval['events'] as $eventkey => $eventval)
				{
					$totaldkpplayer += $eventval['dkp_value'];
					
					// Assign the correct reference ID to the event
					switch ($eventval['type'])
					{
						case 'raidatt':
						case 'raidhours':
						case 'raidontime':
						case 'raidtillend':
							$eventval['reference'] = $raid['raid_id'];
							break;
						case 'bosskill':
							$eventval['reference'] = $bosses[$eventval['reference']]['boss_id'];
							break;
						case 'loot':
							$eventval['reference'] = $eventval['reference'];
							break;							
						default:
							$eventval['reference'] = -1;
							break;
					}
					
					// Insert the Event for the player
					$player_event_query = "INSERT INTO `".ROSTER_ADDON_ROSTER_DKP_EVENTS."` (`member_id`, `reference_id`, `type`, `start`, `end`, `dkp_value`, `note`) VALUES ('".$players[$playerkey]['member_id']."', '".$eventval['reference']."', '".$eventval['type']."', '".$eventval['start']."', '".$eventval['end']."', '".$eventval['dkp_value']."', '".$eventval['note']."')";
					
					// Set the color of the DKP thingy
					if (floatval($eventval['dkp_value']) > 0)
					{
						$dkpcolor = 'green';
					}
					elseif (floatval($eventval['dkp_value']) < 0)
					{
						$dkpcolor = 'red';
					}
					else
					{
						$dkpcolor = 'white';
					}
					
					// Insert the row
					if ($playereventresult = $wowdb->query( $player_event_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $player_event_query ))
					{
						$playereventtooltip .= '<tr><td>Inserted '.mysql_insert_id().'</td><td>'.$eventval['type'].'</td><td>'.number_format($eventval['dkp_value'], 2, '.', '').'</td></tr>';
					}
					else
					{
						$playereventtooltip .= "<tr><td>!! ERROR Inserting !!</td><td>".$eventval['type']."</td><td>".number_format($eventval['dkp_value'], 2, '.', '')."</td></tr>";
					}
					
					// If the event was of type loot, update the loot entry with the correct member_id.
					if ($eventval['type'] == 'loot')
					{
						$update_loot_query = "UPDATE `".ROSTER_ADDON_ROSTER_DKP_LOOT."` SET `looter_id` = '".$players[$playerkey]['member_id']."' WHERE `loot_id` = ".$eventval['reference']." LIMIT 1";
						$result = $wowdb->query( $update_loot_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $update_loot_query );
						
						if (!$result)
						{
							$playereventtooltip .= "<tr><td>ERROR Loot Update, Loot ID: ".$eventval['reference']."</td></tr>";
						}
					}
					
				}
				
				// Display a single entry with a tooltip for the loot
				$playereventtooltip .= "</table>";
				$output .= "<td  class=\"membersRowRight".$row."\" style=\"color: #a335ee; font-weight: bold;\"><span onmouseover=\"overlib('".$playereventtooltip."',CAPTION,'Event Insert Details');\" onmouseout=\"return nd();\">[Events]</span></td>\n";
				
				if (floatval($totaldkpplayer) > 0)
				{
					$dkpcolor = 'green';
				}
				elseif (floatval($totaldkpplayer) < 0)
				{
					$dkpcolor = 'red';
				}
				else
				{
					$dkpcolor = 'white';
				}
				
				// Display the total earned/spend DKP value
				$output .= "<td class=\"membersRowRight".$row."\" style=\"color: ".$dkpcolor.";\">".number_format($totaldkpplayer, 2, '.', '')."</td>\n";
				$output .= "</tr>\n";

				// Swap $row for the next
				if ($row == 1)
					$row = 2;
				else
					$row = 1;
				
				// Trigger the calculation for the DKP values and statistics, for this member
				$calculation_log .= calculate_member($players[$playerkey]['member_id']);
				
			}
			$output .= "</table>".border("sorange", 'end');
			// Display output and reset
			print($output.'<br>');
			$output = '';
//			print($calculation_log);
		}
	}
}


?>
