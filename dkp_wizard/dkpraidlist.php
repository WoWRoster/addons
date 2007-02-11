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

/* 
define('ROSTER_ADDON_ROSTER_DKP_CONFIG',$GLOBALS['db_prefix'].'dkpconfig');
define('ROSTER_ADDON_ROSTER_DKP_LOCAL',$GLOBALS['db_prefix'].'dkplocal');
define('ROSTER_ADDON_ROSTER_DKP_MEMBERS',$GLOBALS['db_prefix'].'dkpmembers');
define('ROSTER_ADDON_ROSTER_DKP_EVENTS',$GLOBALS['db_prefix'].'dkpevents');
define('ROSTER_ADDON_ROSTER_DKP_RAIDS',$GLOBALS['db_prefix'].'dkpraids');
define('ROSTER_ADDON_ROSTER_DKP_BOSSKILL',$GLOBALS['db_prefix'].'dkpbosskill');
define('ROSTER_ADDON_ROSTER_DKP_BOSSVAL',$GLOBALS['db_prefix'].'dkpbossvalues');
define('ROSTER_ADDON_ROSTER_DKP_LOOT',$GLOBALS['db_prefix'].'dkploot');
define('ROSTER_ADDON_ROSTER_DKP_CACHE',$GLOBALS['db_prefix'].'dkpitemcache');
define('ROSTER_ADDON_ROSTER_DKP_CACHE_STATS',$GLOBALS['db_prefix'].'dkpitemstats');
define('ROSTER_ADDON_ROSTER_DKP_CACHE_LOCAL',$GLOBALS['db_prefix'].'dkpitemstatslocal');
define('ROSTER_ADDON_ROSTER_DKP_FORCE',$GLOBALS['db_prefix'].'dkpitemsforced');
define('DEFAULT_ICON', 'INV_Misc_QuestionMark');
 */

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

if (isset($postfields['admindisplay']) && $postfields['admindisplay'])
{
	exit('Detected invalid access to this file!');
}

// Get the display variables	
$postfields = array_merge($_GET, $_POST);

if (!isset($postfields['display']) || !$postfields['display'])
{
	if (!isset($display) || !$display)
	{
		$output = border('sred','start').'&nbsp;No display action specified!&nbsp;'.border('sred','end');
	}
}
else
{
	$display = $postfields['display'];
}

// Include the roster dkp common functions and classes
require_once($addonDir.'inc/functions.php');
require_once($addonDir.'inc/itemlink.class.php');
require_once($addonDir.'inc/calculations.functions.php');

if (isset($postfields['raid_id']) && $postfields['raid_id'])
{
	$raidid = $postfields['raid_id'];
	
	// Get the details for this raid.
	$get_raid_details_query = "SELECT * FROM `".ROSTER_ADDON_ROSTER_DKP_RAIDS."` WHERE `raid_id` = '".$raidid."' LIMIT 1";
	$raid_result = $wowdb->query( $get_raid_details_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_raid_details_query );
	
	if ($memberdetails = $wowdb->fetch_assoc($member_result))
	{
		// If the member has a Roster ID, show the details regarding this		
		if (isset($memberdetails['roster_id']) && $memberdetails['roster_id'] > 0)
		{
			$get_member_roster_query = "SELECT `note`, `guild_title` FROM `".ROSTER_MEMBERSTABLE."` WHERE `member_id` = '".$memberdetails['roster_id']."' LIMIT 1";
			$member_roster_result = $wowdb->query( $get_member_roster_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_member_roster_query );
			if ($memberroster = $wowdb->fetch_assoc($member_roster_result))
			{
				$memberdetails['note'] = $memberroster['note'];
				$memberdetails['guild_title'] = $memberroster['guild_title'];
			}
			else
			{
				$memberdetails['note'] = '';				
				$memberdetails['guild_title'] = $wordings[$roster_conf['roster_lang']]['unknown'];
			}
		}
		else
		{
			$memberdetails['note'] = '';				
			$memberdetails['guild_title'] = $wordings[$roster_conf['roster_lang']]['not_in_guild'];
		}
		
		// Get all the events for the member from the database
		$get_member_events_query = "SELECT * FROM `".ROSTER_ADDON_ROSTER_DKP_EVENTS."` WHERE `member_id` = '".$memberid."' ORDER BY `start` DESC";
		$event_results = $wowdb->query( $get_member_events_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_member_events_query );
	
		while( $eventrow = $wowdb->fetch_assoc($event_results) )
		{
			switch ($eventrow['type'])
			{
				case 'raidatt':
					$events['raid'][$eventrow['reference_id']]['raidatt'] = $eventrow;
					$get_raid_query = "SELECT `zone`, `note`, `start`, `end`, `leader` FROM ".ROSTER_ADDON_ROSTER_DKP_RAIDS." WHERE `raid_id` = '".$eventrow['reference_id']."' LIMIT 1";
					$get_raid_result = $wowdb->query( $get_raid_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_raid_query );
					if ($raiddetail = $wowdb->fetch_assoc($get_raid_result))
					{
						$events['raid'][$eventrow['reference_id']]['zone'] = $raiddetail['zone'];
						$events['raid'][$eventrow['reference_id']]['note'] = $raiddetail['note'];
						$events['raid'][$eventrow['reference_id']]['start'] = $raiddetail['start'];
						$events['raid'][$eventrow['reference_id']]['end'] = $raiddetail['end'];
						$events['raid'][$eventrow['reference_id']]['leader'] = $raiddetail['leader'];
					}
					else
					{
						$events['raid'][$eventrow['reference_id']]['zone'] = $wordings[$roster_conf['roster_lang']]['unknown'];
						$events['raid'][$eventrow['reference_id']]['note'] = $wordings[$roster_conf['roster_lang']]['unknown'];
						$events['raid'][$eventrow['reference_id']]['start'] = $wordings[$roster_conf['roster_lang']]['unknown'];
						$events['raid'][$eventrow['reference_id']]['end'] = $wordings[$roster_conf['roster_lang']]['unknown'];
						$events['raid'][$eventrow['reference_id']]['leader'] = $wordings[$roster_conf['roster_lang']]['unknown'];
					}
					$events['earned'][] = $eventrow;
					break;
				case 'raidontime';
					$events['raid'][$eventrow['reference_id']]['raidontime'] = $eventrow;
					$events['earned'][] = $eventrow;
					break;
				case 'raidtillend';
					$events['raid'][$eventrow['reference_id']]['raidtillend'] = $eventrow;
					$events['earned'][] = $eventrow;
					break;
				case 'raidhours';
					$events['raid'][$eventrow['reference_id']]['raidhours'] = $eventrow;
					$events['earned'][] = $eventrow;
					break;
				case 'bosskill';
					$events['boss'][$eventrow['reference_id']] = $eventrow;
					$get_boss_query = "SELECT `raid_id`, `boss_name`, `zone`, `kill_time` FROM ".ROSTER_ADDON_ROSTER_DKP_BOSSKILL." WHERE `boss_id` = '".$eventrow['reference_id']."' LIMIT 1";
					$get_boss_result = $wowdb->query( $get_boss_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_boss_query );
					if ($bossdetail = $wowdb->fetch_assoc($get_boss_result))
					{
						$events['boss'][$eventrow['reference_id']]['raid_id'] = $bossdetail['raid_id'];
						$events['boss'][$eventrow['reference_id']]['boss_name'] = $bossdetail['boss_name'];
						$events['boss'][$eventrow['reference_id']]['zone'] = $bossdetail['zone'];
						$events['boss'][$eventrow['reference_id']]['kill_time'] = $bossdetail['kill_time'];
					}
					else
					{
						$events['boss'][$eventrow['reference_id']]['raid_id'] = -1;
						$events['boss'][$eventrow['reference_id']]['boss_name'] = $wordings[$roster_conf['roster_lang']]['unknown'];
						$events['boss'][$eventrow['reference_id']]['zone'] = $wordings[$roster_conf['roster_lang']]['unknown'];
						$events['boss'][$eventrow['reference_id']]['kill_time'] = $wordings[$roster_conf['roster_lang']]['unknown'];
					}
					$events['earned'][] = $eventrow;
					break;
				case 'loot';
					$events['loot'][$eventrow['reference_id']] = $eventrow;
					$get_loot_query = "SELECT `item_id` FROM ".ROSTER_ADDON_ROSTER_DKP_LOOT." WHERE `loot_id` = '".$eventrow['reference_id']."' LIMIT 1";
					$get_loot_result = $wowdb->query( $get_loot_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_loot_query );
					if ($lootdetail = $wowdb->fetch_assoc($get_loot_result))
					{
						$events['loot'][$eventrow['reference_id']]['item_id'] = $lootdetail['item_id'];
					}
					else
					{
						$events['loot'][$eventrow['reference_id']]['item_id'] = -1;
					}
					$events['spend'][] = $eventrow;
					break;
				case 'adjustment';
					$events['adjustments'][$eventrow['event_id']] = $eventrow;
					break;
			}
		}
		
		$output = "<table border=\"0\"><tr><td>\n";
		 
		// Begin the nice bordered table
		$output .= border('sgreen', 'start', stripslashes($memberdetails['name']))."\n";
		$output .= "<table cellpadding=\"0\" cellspacing=\"0\" class=\"membersList\">";
		$output .= "<tr>\n";

		// If we got a roster_id display the avatar, and guild char.php link.
		if (isset($memberdetails['roster_id']) && $memberdetails['roster_id'] > 0)
		{
			if ($roster_conf['show_avatar'])
			{
				$output .= "<td rowspan=\"4\" class=\"membersRow1\">\n";
				$output .= "<img src=\"".$roster_conf['roster_dir']."/addons/siggen/av.php?name=".$memberdetails['name']."\">\n";
				$output .= "</td>\n";
			}
			$output .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['name']."</td><td class=\"membersRow1\"><a href=\"".$roster_conf['roster_dir']."/char.php?name=".$memberdetails['name']."&server=".$roster_conf['server_name']."\">".stripslashes($memberdetails['name'])."</a></td>\n</tr>\n";
		}
		else
		{
			$output .= "<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['name']."</td><td class=\"membersRow1\">".stripslashes($memberdetails['name'])."</td>\n</tr>\n";
		}
		
		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rank']."</td><td class=\"membersRow1\">".stripslashes($memberdetails['guild_title'])."</td>\n</tr>\n";
		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['class']."</td><td class=\"membersRow1\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/class_".strtolower($memberdetails['class']).'.'.$roster_conf['img_suffix']."\" /> ".stripslashes($memberdetails['class'])."</td>\n</tr>\n";

		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['race']."</td><td class=\"membersRow1\">".stripslashes($memberdetails['race'])."</td>\n</tr>\n";


		$output .= "</tr></table>".border('sgreen', 'end')."\n";
		
		$output .= "</td><td>&nbsp;</td><td>\n";
		
		// Display the box for the DKP balance stuff
		$output .= border('spurple', 'start', $wordings[$roster_conf['roster_lang']]['dkp_balance']);
		$output .= "<table cellpadding=\"0\" cellspacing=\"0\" class=\"membersList\">";
		
		if (floatval($memberdetails['dkp_balance']) > 0)
		{
			$dkpb_color = '#74ff76';
		}
		elseif (floatval($memberdetails['dkp_balance']) < 0)
		{
			$dkpb_color = '#fb0101';
		}
		else
		{
			$dkpb_color = 'gray';
		}
	
		if (floatval($memberdetails['dkp_earned']) > 0)
		{
			$dkpe_color = '#74ff76';
		}
		elseif (floatval($memberdetails['dkp_earned']) < 0)
		{
			$dkpe_color = '#fb0101';
		}
		else
		{
			$dkpe_color = '#003e08';
		}
	
		if (floatval($memberdetails['dkp_spend']) < 0)
		{
			$dkps_color = '#fb0101';
			$memberdetails['dkp_spend'] = 0.00 - $memberdetails['dkp_spend'];
		}
		else
		{
			$dkps_color = '#660005';
		}
		
		if (floatval($memberdetails['dkp_adjusted']) > 0)
		{
			$dkpa_color = '#a335ee';
		}
		elseif (floatval($memberdetails['dkp_adjusted']) < 0)
		{
		$memberdetails['dkp_adjusted'] = 0 - $memberdetails['dkp_adjusted'];
			$dkpa_color = '#fb0101';
		}
		else
		{
			$dkpa_color = '#6d005f';
		}
		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkp_balance']."</td>\n";
		$output .= '<td class="DKPValueRow1" style="color: '.$dkpb_color.';" align="right">'.number_format($memberdetails['dkp_balance'], 2, '.', '')."</td>\n</tr>\n";
		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkp_earned']."</td>\n";
		$output .= '<td class="DKPValueRow1" style="color: '.$dkpe_color.';" align="char" char=".">'.number_format($memberdetails['dkp_earned'], 2, '.', '')."</td>\n</tr>\n";
		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkp_spend']."</td>\n";
		$output .= '<td class="DKPValueRow1" style="color: '.$dkps_color.';">'.number_format($memberdetails['dkp_spend'], 2, '.', '')."</td>\n</tr>\n";
		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['dkp_adjusted']."</td>\n";
		$output .= '<td class="DKPValueRow1" style="color: '.$dkpa_color.';">'.number_format($memberdetails['dkp_adjusted'], 2, '.', '')."</td>\n</tr>\n";
		
		$output .= "</table>\n";
		$output .= border('spurple', 'end')."\n";

		$output .= "</td></tr><tr><td>&nbsp;</td></tr><tr><td colspan=\"3\">\n";
		

		// Get a collapsed window for Raids
		$output .= "<div id=\"dkp_raids_hide\" style=\"display:inline;\">\n";
		$output .= border('sred','start',"<div style=\"cursor:pointer;width:600px;\" onclick=\"swapShow('dkp_raids_hide','dkp_raids_show')\"><img src=\"".$subdir.$roster_conf['img_url']."plus.gif\" style=\"float:right;\" />".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidlist']."</div>").border('sred','end')."\n";
		$output .= "</div>\n";

		$output .= "<div id=\"dkp_raids_show\" style=\"display:none;\">\n";
		$output .= border('sred','start',"<div style=\"cursor:pointer;width:600px;\" onclick=\"swapShow('dkp_raids_hide','dkp_raids_show')\"><img src=\"".$subdir.$roster_conf['img_url']."minus.gif\" style=\"float:right;\" />".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidlist']."</div>")."\n";
		
		$output .= "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" class=\"membersList\">";
		$output .= "<tr>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidzone']."</td>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidstart']."</td>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidend']."</td>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidleader']."</td>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_eventref']."</td>\n<td class=\"membersHeader\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidnote']."</td>\n</tr>\n";
		
		$tablerow = 1;
		foreach($events['raid'] as $raidref => $raiddata)
		{
			$output .= "<tr>\n";
			if (!isset($raiddata['zone']) || $raiddata['zone'] == '')
			{
				$raiddata['zone'] = $wordings[$roster_conf['roster_lang']]['unknown'];
			}
			$output .= "<td class=\"membersRow".$tablerow."\">".stripslashes($raiddata['zone'])."</td>\n";
			$output .= "<td class=\"membersRow".$tablerow."\">".$raiddata['start']."</td>\n";
			$output .= "<td class=\"membersRow".$tablerow."\">".$raiddata['end']."</td>\n";
			$output .= "<td class=\"membersRow".$tablerow."\">".stripslashes($raiddata['leader'])."</td>\n";

			// Start displaying Event Icons for this raid
			$output .= "<td class=\"membersRow".$tablerow."\">\n";
			$tooltip_h = $wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format($raiddata['raidatt']['dkp_value'], 2, '.', '');
			$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_attended'].' '.$raiddata['raidatt']['note'].'%'."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_attend.jpg\" /></span>&nbsp;";

			if (is_array($raiddata['raidontime']))
			{
				$tooltip_h = $wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format($raiddata['raidontime']['dkp_value'], 2, '.', '');
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_wasontime']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_ontime.jpg\" /></span>&nbsp;";
			}
			else
			{
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_wasnotontime']."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_ontime_false.jpg\" /></span>&nbsp;";
			}
			
			if (is_array($raiddata['raidhours']) && floatval($raiddata['raidhours']['dkp_value']) > 0)
			{
				$tooltip_h = $wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format($raiddata['raidhours']['dkp_value'], 2, '.', '');
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_amounthours']." ".$raiddata['raidhours']['note']." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_hours']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_hour.jpg\" /></span>&nbsp;";
			}
			else
			{
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_amounthours']." 0 ".$wordings[$roster_conf['roster_lang']]['rosterdkp_hours']."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_hour_false.jpg\" /></span>&nbsp;";
			}
			
			if (is_array($raiddata['raidtillend']))
			{
				$tooltip_h = $wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format($raiddata['raidtillend']['dkp_value'], 2, '.', '');
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_stayedtillend']."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_tillend.jpg\" /></span>&nbsp;";
			}
			else
			{
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_nottillend']."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format(0, 2, '.', '')."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_tillend_false.jpg\" /></span>&nbsp;";
			}
			
			// Add the Boss-Kills for the raid to the event reference
			$bosstooltip = '';
			$bossdkptotal = 0.00;
			
			if (is_array($events['boss']))
			{
				foreach($events['boss'] as $bossdata)
				{
					if ($bossdata['raid_id'] == $raidref)
					{
						if (floatval($bossdkptotal) > 0)
						{
							$bosstooltip .= '<br>';
						}
						$bosstooltip .= $memberdetails['name']." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_killedboss'].' '.$bossdata['boss_name']."&nbsp;&nbsp;&nbsp;DKP: ".$bossdata['dkp_value'];
						$bossdkptotal += $bossdata['dkp_value'];
					}
				}
			}
			$tooltip_h = $wordings[$roster_conf['roster_lang']]['rosterdkp_event']." - DKP: ".number_format($bossdkptotal, 2, '.', '');
			if (is_array($events['boss']) && floatval($bossdkptotal) > 0)
			{				
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".$bosstooltip."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_bosskill.jpg\" /></span>&nbsp;";
			}
			else
			{
				$bosstooltip = stripslashes($memberdetails['name'])." ".$wordings[$roster_conf['roster_lang']]['rosterdkp_notkillboss'];
				$output .= "<span style=\"cursor: help;\" onmouseover=\"overlib('".$bosstooltip."',CAPTION,'".$tooltip_h."',WRAP);\" onmouseout=\"return nd();\"><img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."px\" height=\"".$roster_conf['index_iconsize']."px\" src=\"addons/roster_dkp/img/event_bosskill_false.jpg\" /></span>&nbsp;";
			}
							
			$output .= "</td>\n";
			
			// Display the Raid Note icon
			if (!isset($raiddata['note']) || $raiddata['note'] == '')
			{
				$output .= "<td class=\"membersRow".$tablerow."\"><img class=\"membersRowimg\" src=\"addons/roster_dkp/img/no_note.gif\" /></td>\n";
			}
			else
			{
				$output .= "<td class=\"membersRow".$tablerow."\">\n<span style=\"cursor: help;\" onmouseover=\"overlib('".addslashes(stripslashes($raiddata['note']))."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidnote']."',WRAP);\" onmouseout=\"return nd();\">\n<img class=\"membersRowimg\" src=\"addons/roster_dkp/img/note.gif\" />\n</span>\n</td>\n";
			}
			
			// Swap $tablerow for the next
			if ($tablerow == 1)
				$tablerow = 2;
			else
				$tablerow = 1;
		}

		$output .= "</table>\n";
		$output .= border('sred','end')."\n";
		$output .= "</div>\n";

		
		$output .= "</td></tr></table>\n";
		
		// Get a collapsed window for Looted Items
		$output .= "<div id=\"dkp_loot_hide\" style=\"display:inline;\">\n";
		$output .= border('spurple','start',"<div style=\"cursor:pointer;width:600px;\" onclick=\"swapShow('dkp_loot_hide','dkp_loot_show')\"><img src=\"".$subdir.$roster_conf['img_url']."plus.gif\" style=\"float:right;\" />".$wordings[$roster_conf['roster_lang']]['dkp_adjusted']." ".$wordings[$roster_conf['roster_lang']]['events']."</div>").border('spurple','end')."\n";
		$output .= "</div>\n";

		$output .= "<div id=\"dkp_loot_show\" style=\"display:none;\">\n";
		$output .= border('spurple','start',"<div style=\"cursor:pointer;width:600px;\" onclick=\"swapShow('dkp_loot_hide','dkp_loot_show')\"><img src=\"".$subdir.$roster_conf['img_url']."minus.gif\" style=\"float:right;\" />".$wordings[$roster_conf['roster_lang']]['dkp_adjusted']." ".$wordings[$roster_conf['roster_lang']]['events']."</div>")."\n";
		$output .= "<table cellpadding=\"0\" cellspacing=\"0\" class=\"membersList\">";

		$output .= "test";

		$output .= "</table>\n";
		$output .= border('spurple','end')."\n";
		$output .= "</div>\n";

		
		$output .= "</td></tr></table>\n";

		// Get a collapsed window for DKP Adjustments
		$output .= "<div id=\"dkp_adjust_hide\" style=\"display:inline;\">\n";
		$output .= border('spurple','start',"<div style=\"cursor:pointer;width:600px;\" onclick=\"swapShow('dkp_adjust_hide','dkp_adjust_show')\"><img src=\"".$subdir.$roster_conf['img_url']."plus.gif\" style=\"float:right;\" />".$wordings[$roster_conf['roster_lang']]['dkp_adjusted']." ".$wordings[$roster_conf['roster_lang']]['events']."</div>").border('spurple','end')."\n";
		$output .= "</div>\n";

		$output .= "<div id=\"dkp_adjust_show\" style=\"display:none;\">\n";
		$output .= border('spurple','start',"<div style=\"cursor:pointer;width:600px;\" onclick=\"swapShow('dkp_adjust_hide','dkp_adjust_show')\"><img src=\"".$subdir.$roster_conf['img_url']."minus.gif\" style=\"float:right;\" />".$wordings[$roster_conf['roster_lang']]['dkp_adjusted']." ".$wordings[$roster_conf['roster_lang']]['events']."</div>")."\n";
		$output .= "<table cellpadding=\"0\" cellspacing=\"0\" class=\"membersList\">";

		$output .= "test";

		$output .= "</table>\n";
		$output .= border('spurple','end')."\n";
		$output .= "</div>\n";

		
		$output .= "</td></tr></table>\n";
	}
}
else
{
	// Determine the Sorting Order. Default sort = DKP Balance, DKP Earned, Rank, Name
	if (!is_array($postfields['sort']))
	{
		// Default Sorting Order!
		// Possible options are:
		// 'zone', 'note', 'start', 'end', 'leader'
		
		$sort[1]['field'] = 'start';
		$sort[1]['mode']  = SORT_DESC;
		$sort[2]['field'] = 'zone';
		$sort[2]['mode']  = SORT_ASC;
		$sort[3]['field'] = 'leader';
		$sort[3]['mode']  = SORT_ASC;
		$sort[4]['field'] = 'note';
		$sort[4]['mode']  = SORT_ASC;
	}
	else
	{
		foreach ($postfields['sort']['mode'] as $key => $val)
		{
			switch ($val)
			{
				case '3':
					$postfields['sort']['mode'][$key] = SORT_DESC;
					break;
				case '4':
					$postfields['sort']['mode'][$key] = SORT_ASC;
					break;
				default:
					$postfields['sort']['mode'][$key] = SORT_ASC;
			}
		}
		$sort[1]['field'] = $postfields['sort']['field'][1];
		$sort[1]['mode']  = $postfields['sort']['mode'][1];
		$sort[2]['field'] = $postfields['sort']['field'][2];
		$sort[2]['mode']  = $postfields['sort']['mode'][2];
		$sort[3]['field'] = $postfields['sort']['field'][3];
		$sort[3]['mode']  = $postfields['sort']['mode'][3];
		$sort[4]['field'] = $postfields['sort']['field'][4];
		$sort[4]['mode']  = $postfields['sort']['mode'][4];
	}
	
	// Begin the nice bordered table
	$output = border('sred', 'start')."\n";
	$output .= '<table cellpadding="0" cellspacing="0" class="membersList">';
	$output .=  '<tr>';
	
	$linkbase = $script_filename.'&amp;display=raidlist&amp;';
	$output .=  '<th class="membersHeader"><a href="'.$linkbase.sort_link($sort, 'zone').'">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_raidzone'].'</a></th>';
	$output .=  '<th class="membersHeader"><a href="'.$linkbase.sort_link($sort, 'start').'">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_raidstart'].'</a></th>';
	$output .=  '<th class="membersHeader"><a href="'.$linkbase.sort_link($sort, 'end').'">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_raidend'].'</a></th>';
	$output .=  '<th class="membersHeader"><a href="'.$linkbase.sort_link($sort, 'hours').'">'.ucfirst($wordings[$roster_conf['roster_lang']]['rosterdkp_hours']).'</a></th>';
	$output .=  '<th class="membersHeader"><a href="'.$linkbase.sort_link($sort, 'leader').'">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_raidleader'].'</a></th>';
	$output .=  '<th class="membersHeader" style="color: #1eff00;"><a href="'.$linkbase.sort_link($sort, 'uncommon').'">'.$wordings[$roster_conf['roster_lang']]['uncommon'].'</a></th>';
	$output .=  '<th class="membersHeader" style="color: #0070dd;"><a href="'.$linkbase.sort_link($sort, 'rare').'">'.$wordings[$roster_conf['roster_lang']]['rare'].'</a></th>';
	$output .=  '<th class="membersHeader" style="color: #a335ee;"><a href="'.$linkbase.sort_link($sort, 'epic').'">'.$wordings[$roster_conf['roster_lang']]['epic'].'</a></th>';
	$output .=  '<th class="membersHeader" style="color: #ff8000;"><a href="'.$linkbase.sort_link($sort, 'legendary').'">'.$wordings[$roster_conf['roster_lang']]['legendary'].'</a></th>';
	$output .=  '<th class="membersHeader"><a href="'.$linkbase.sort_link($sort, 'note').'">'.$wordings[$roster_conf['roster_lang']]['note'].'</a></th>';
	
	$output .=  '</tr>';
	
	// Different Row Display Swap
	$tablerow = 1;
	
	// Get the members from the database
	$get_raids_query = "SELECT * FROM `".ROSTER_ADDON_ROSTER_DKP_RAIDS."`";
	$raids_result = $wowdb->query( $get_raids_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_raids_query );
	while( $raidrow = $wowdb->fetch_assoc($raids_result))
	{
		// Get the amount of hours the raid took.
		$raidrow['hours'] = number_format((strtotime($raidrow['end']) - strtotime($raidrow['start']))/3600, 1, '.', '');
		
		// Get the loot counts from the loot table
		$raidrow['legendary'] = 0;
		$raidrow['epic'] = 0;
		$raidrow['rare'] = 0;
		$raidrow['uncommon'] = 0;
		$get_loot_query = "SELECT `item_id` FROM `".ROSTER_ADDON_ROSTER_DKP_LOOT."` WHERE `raid_id` = '".$raidrow['raid_id']."'";
		$loot_result = $wowdb->query( $get_loot_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_loot_query );
		while ($lootrow = $wowdb->fetch_assoc($loot_result))
		{
			$lootitem = getitemcache($lootrow['item_id'], '');
			switch ($lootitem['item_quality'])
			{
				case 2:
					$raidrow['uncommon']++;
					break;
				case 3:
					$raidrow['rare']++;
					break;
				case 4:
					$raidrow['epic']++;
					break;
				case 5:
					$raidrow['legendary']++;
					break;
				default:
			}
		}

		// Store the raids into an array
		$raid_array[] = $raidrow;
	}
	
	// Sort the array by the $sort parameters
	if (is_array($raid_array))
	{
    	foreach ($raid_array as $key => $sortrow)
    	{
			$order['zone'][$key] = stripslashes(strtolower($sortrow['zone']));
			$order['start'][$key] = $sortrow['start'];
			$order['end'][$key] = $sortrow['end'];
			$order['hours'][$key] = $sortrow['hours'];
			$order['leader'][$key] = stripslashes(strtolower($sortrow['leader']));
			$order['note'][$key] = stripslashes(strtolower($sortrow['note']));
			$order['uncommon'][$key] = $sortrow['uncommon'];
			$order['rare'][$key] = $sortrow['rare'];
			$order['epic'][$key] = $sortrow['epic'];
			$order['legendary'][$key] = $sortrow['legendary'];
		}
	
	


	
		array_multisort($order[$sort[1]['field']], $sort[1]['mode'], $order[$sort[2]['field']], $sort[2]['mode'], $order[$sort[3]['field']], $sort[3]['mode'], $order[$sort[4]['field']], $sort[4]['mode'], $raid_array);
	
		
		// Now display the table of members
		foreach ($raid_array as $raidrow)
		{
			// Open the row in the table
			$output .= "<tr>";
			if ($raidrow['zone'] == '')
			{
				$raidrow['zone'] = $wordings[$roster_conf['roster_lang']]['zone_random'];
			}
			$output .= '<td class="membersRow'.$tablerow.'"><a href="'.$script_filename.'&amp;display=raidlist&amp;raid_id='.$raidrow['raid_id'].'">';
			$output .= '<img class="membersRowimg" src="addons/roster_dkp/img/'.get_zoneicon($raidrow['zone']).'">&nbsp;'.stripslashes($raidrow['zone']).'</a></td>';
			$output .= '<td class="membersRow'.$tablerow.'">'.$raidrow['start'].'</td>';
			$output .= '<td class="membersRow'.$tablerow.'">'.$raidrow['end'].'</td>';
			$output .= '<td class="DKPValueRow'.$tablerow.'">'.$raidrow['hours'].'</td>';
			$output .= '<td class="membersRow'.$tablerow.'">'.stripslashes($raidrow['leader']).'</td>';
			$output .= '<td class="DKPValueRow'.$tablerow.'" style="color: #1eff00;">'.$raidrow['uncommon'].'x</td>';
			$output .= '<td class="DKPValueRow'.$tablerow.'" style="color: #0070dd;">'.$raidrow['rare'].'x</td>';
			$output .= '<td class="DKPValueRow'.$tablerow.'" style="color: #a335ee;">'.$raidrow['epic'].'x</td>';
			$output .= '<td class="DKPValueRow'.$tablerow.'" style="color: #ff8000;">'.$raidrow['legendary'].'x</td>';
			
			// Display the Raid Note icon
			if (!isset($raidrow['note']) || $raidrow['note'] == '')
			{
				$output .= "<td class=\"membersRow".$tablerow."\"><img class=\"membersRowimg\" src=\"addons/roster_dkp/img/no_note.gif\" /></td>\n";
			}
			else
			{
				$output .= "<td class=\"membersRow".$tablerow."\">\n<span style=\"cursor: help;\" onmouseover=\"overlib('".addslashes(stripslashes($raidrow['note']))."',CAPTION,'".$wordings[$roster_conf['roster_lang']]['rosterdkp_raidnote']."',WRAP);\" onmouseout=\"return nd();\">\n<img class=\"membersRowimg\" src=\"addons/roster_dkp/img/note.gif\" />\n</span>\n</td>\n";
			}
			
			// Close the row in the table
			$output .= "</tr>\n";			
						
			// Swap $tablerow for the next
			if ($tablerow == 1)
				$tablerow = 2;
			else
				$tablerow = 1;
		}
	}
	
	// Close the nice border
	$output .= "</table>\n";
	$output .= border('sred', 'end')."\n";
	
}

print($output);

?>
