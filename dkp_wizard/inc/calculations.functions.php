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

// Calculate all DKP values and statistics for a specific member, and update the member.
function calculate_member($memberid)
{
	global $roster_conf, $addon_conf, $wowdb, $wordings;
	
	// Set everything to float 0.00
	$output = '';
	$raidattend_life = 0;
	$raidattend_ratio = 0;
	$raidhours_life = 0;
	$raidontime = 0;
	$raidtillend = 0;
	$adjustments = 0;
	$dkp_earned = floatval(0.00);
	$dkp_spend = floatval(0.00);
	$dkp_adjusted = floatval(0.00);
	$dkp_balance = floatval(0.00);
	
	// Get all the events for the member from the database
	$get_member_events_query = "SELECT type, dkp_value, note FROM `".ROSTER_ADDON_ROSTER_DKP_EVENTS."` WHERE `member_id` = '".$memberid."'";
	$event_results = $wowdb->query( $get_member_events_query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $get_member_events_query );
	
	while( $eventrow = $wowdb->fetch_assoc($event_results) )
	{
		switch ($eventrow['type'])
		{
			case 'raidatt':
				$raidattend_life++;
				$raidattend_ratio += $eventrow['note'];
				$dkp_earned += floatval($eventrow['dkp_value']);
				break;
			case 'raidontime';
				$raidontime++;
				$dkp_earned += floatval($eventrow['dkp_value']);
				break;
			case 'raidtillend';
				$raidtillend++;
				$dkp_earned += floatval($eventrow['dkp_value']);
				break;
			case 'raidhours';
				$raidhours_life += $eventrow['note'];
				$dkp_earned += floatval($eventrow['dkp_value']);
				break;
			case 'bosskill';
				$dkp_earned += floatval($eventrow['dkp_value']);
				break;
			case 'loot';
				$dkp_spend += floatval($eventrow['dkp_value']);
				break;
			case 'buy';
				$dkp_spend += floatval($eventrow['dkp_value']);
				break;
			case 'adjustment';
				$dkp_adjusted += floatval($eventrow['dkp_value']);
				break;
		}
	}
	
	// Calculate the statistics. This may not be 100% accurate due to configuration changes.
	if ($raidattend_life > 0)
	{
		$raidattend_ratio = $raidattend_ratio / $raidattend_life;
		$raidontime = round(($raidontime / $raidattend_life) * 100);
		$raidtillend = round(($raidtillend / $raidattend_life) * 100);
	}
	else
	{
		$raidattend_ratio = 0;
		$raidontime = 0;
		$raidtillend = 0;
	}
	
	// Calculate the balance and compare it to the temp balance
	$dkp_balance = floatval($dkp_earned) + floatval($dkp_spend) + floatval($dkp_adjusted);

	// Update the Database with the new statistics
	$update_memberstats_sql = "UPDATE `".ROSTER_ADDON_ROSTER_DKP_MEMBERS."` SET `dkp_earned` = '".$dkp_earned."', `dkp_spend` = '".$dkp_spend."', `dkp_adjusted` = '".$dkp_adjusted."', `dkp_balance` = '".$dkp_balance."', `raids_lifetime` = '".$raidattend_life."', `raids_ratio` = '".$raidattend_ratio."', `raids_ontime` = '".$raidontime."', `raids_tillend` = '".$raidtillend."', `raids_hours` = '".$raidhours_life."' WHERE `member_id` = '".$memberid."' LIMIT 1";
	$update_stats_result = $wowdb->query( $update_memberstats_sql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $update_memberstats_sql );
	
	if ($update_stats_result)
	{
		$output .= "Update Statistics & DKP values for Member with id: ".$memberid.", in the database.<br>";
	}
	else
	{
		$output .= "ERROR updating the database with Statistics & DKP value for Member with id: ".$memberid."<br>";
	}
	
	return $output;
}
		

?> 
