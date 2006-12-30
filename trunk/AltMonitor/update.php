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

// --[ Check if we are dealing with a record with manual settings. If so, don't apply changes.
$query =
	"SELECT `member_id`, `alt_type`".
	" FROM `".ROSTER_ALT_TABLE."`".
	" WHERE `member_id`=".$member_id;

$result = $wowdb->query( $query );

if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

if ( $row = $wowdb->fetch_array( $result )) {
	if ( $row['alt_type'] & 0x4 ) {			// Manual record
		$messages .= "Not updating manual record for $member_name<br>\n";
		$wowdb->free_result( $result );
		break;
	}
}
else
	$wowdb->free_result( $result );


// --[ Get the member record for this member ]--
$query =
	"SELECT `members`.`member_id`, `members`.`name`, `members`.`note`, `members`.`guild_rank`, `members`.`guild_title`, `members`.`officer_note`".
	" FROM `".ROSTER_MEMBERSTABLE."` as `members`".
	" WHERE `members`.`member_id`=".$member_id;

$result = $wowdb->query( $query );

if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

if ( $row = $wowdb->fetch_array( $result ))
	$wowdb->free_result( $result );			// We can't get back multiple entries here.
else
{
	$messages .= "Failed to find member entry for $member_name<br>\n";
	$wowdb->free_result( $result );
	break;
}

// --[ Use regex to parse the main name ]--
if(preg_match($addon_conf['AltMonitor']['getmain_regex'],$row[$addon_conf['AltMonitor']['getmain_field']], $regs))
{
	$main_name = $regs[$addon_conf['AltMonitor']['getmain_match']]; // We have a regex result.
}
else if($addon_conf['AltMonitor']['defmain'])
{
	$main_name = $member_name;			// No regex result; assume the character is a main
}
else
{
	$main_name = '';				// No regex result; assume the character is mainless alt
}

$messages .= "$member_name has main $main_name\n";

// If the main name is equal to this config field then this char is a main, and we should set the $main_name accordingly
if($main_name == $addon_conf['AltMonitor']['getmain_main'])
{
	$main_name = $member_name;
}


// --[ Get the main's member ID. We handle the 2 easy cases (Main and mainless alt) first ]--
if ( $main_name == $member_name ) {
	$messages .= "<p style='color:green;'>$member_name is a main</p>\n";
	$main_id = $member_id;

	// --[ Look up if there are alts for this main ]--
	$query =
		"SELECT COUNT(member_id) ".
		" FROM `".ROSTER_ALT_TABLE."` as `alts`".
		" WHERE `alts`.`main_id`=".$member_id;

	$result = $wowdb->query( $query );

	if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

	$row = mysql_fetch_array( $result );

	if ($row[0] == 1) {
		$alt_type = ALTMONITOR_MAIN_NO_ALTS;
		$messages .= "<p style='color:green;'>$member_name has no alts</p>\n";
	}
	else {
		$alt_type = ALTMONITOR_MAIN_ALTS;
		$messages .= "<p style='color:green;'>$member_name has alts</p>\n";
	}
}
elseif ( $main_name == '' ) {
	$messages .= "<p style='color:red;'>$member_name is a mainless alt</p>\n";
	$main_id = 0;
	$alt_type = ALTMONITOR_ALT_NO_MAIN;
}
else {
	$messages .= "<p style='color:green;'>$member_name is an alt to $main_name</p>\n";
	// --[ Get the main's member ID ]--
	$query =
		"SELECT `members`.`member_id`, `members`.`name`".
		" FROM `".ROSTER_MEMBERSTABLE."` as `members`".
		" WHERE `members`.`name`='".$main_name."'";

	if ( $roster_conf['sqldebug'] ) echo "<!--$query-->\n";

	$result = $wowdb->query( $query );

	if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

	if ( $row = $wowdb->fetch_array( $result )) {
		$main_id = $row['member_id'];
		$wowdb->free_result( $result );

		// --[ Alt of alt check ]--
		if ( $addon_conf['AltMonitor']['altofalt'] == 'leave' ) {
			$alt_type = ALTMONITOR_ALT_WITH_MAIN;	// Don't check if we're allowing alt of alt in the database
			$messages .= "<p style='color:green;'>We're not caring if $main_name is a main</p>\n";
		}
		else {
			$query =			// Lookup main's alt_type
				"SELECT `member_id`, `main_id`, `alt_type`".
				" FROM `".ROSTER_ALT_TABLE."`".
				" WHERE `member_id`=".$main_id;

			if ( $roster_conf['sqldebug'] ) echo "<!--$query-->\n";

			$result = $wowdb->query( $query );

			if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

			if ( $row = $wowdb->fetch_array( $result )) {
				if ( ( $row['alt_type'] & 2 ) == 0 ) { // Alt of main
					$alt_type = ALTMONITOR_ALT_WITH_MAIN;
					$messages .= "<p style='color:green;'>$main_name is a main, so $member_name is an alt with a main</p>\n";
				}
				elseif ( $addon_conf['AltMonitor']['altofalt'] == 'main' ) {
					// The main is an alt so the member is being made a main
					$main_id = $member_id;

					// --[ Look up if there are alts for this main ]--
					$query =
						"SELECT COUNT(member_id) ".
						" FROM `".ROSTER_ALT_TABLE."` as `alts`".
						" WHERE `alts`.`main_id`=".$member_id;

					$result = $wowdb->query( $query );

					if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

					$row = $wowdb->fetch_array( $result );

					if ($row[0] == 1) {
						$alt_type = ALTMONITOR_MAIN_NO_ALTS;
						$messages .= "<p style='color:red;'>$member_name is an alt of alt, so we're making him a main. He doesn't have alts. </p>\n";
					}
					else {
						$alt_type = ALTMONITOR_MAIN_ALTS;
						$messages .= "<p style='color:red;'>$member_name is an alt of alt, so we're making him a main. He even has alts. </p>\n";
					}
				}
				elseif ( $addon_conf['AltMonitor']['altofalt'] == 'alt' ) {
					$main_id = 0;
					$alt_type = ALTMONITOR_ALT_NO_MAIN;
					$messages .= "<p style='color:red;'>$member_name is an alt of alt, so we're making him a mainless alt.</p>\n";
				}
				else {
					$alt_type = $row['alt_type'] & 3; // don't accidentically set this to manual
					$main_id = $row['main_id'];
				}
			}
			else {
				$messages .= "<p style='color:red;'>Can't resolve main for alt of alt check; main not in alt table.</p>\n";
				$alt_type = ALTMONITOR_ALT_NO_MAIN;
			}
		}
	}
	else
	{
		if($addon_conf['AltMonitor']['invmain'])
		{
			// --[ Main name invalid, so we're making this a main ]--
			$main_id = $member_id;

			// --[ Look up if there are alts for this main ]--
			$query =
				"SELECT COUNT(member_id) ".
				" FROM `".ROSTER_ALT_TABLE."` as `alts`".
				" WHERE `alts`.`main_id`=".$member_id;

			$result = $wowdb->query( $query );

			if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

			$row = $wowdb->fetch_array( $result );

			if ($row[0] == 1) {
				$alt_type = ALTMONITOR_MAIN_NO_ALTS;
				$messages .= "<p style='color:red;'>$member_name has invalid main name $main_name, so we're making him a main. He doesn't have alts. </p>\n";
			}
			else {
				$alt_type = ALTMONITOR_MAIN_ALTS;
				$messages .= "<p style='color:red;'>$member_name has invalid main name $main_name, so we're making him a main. He has alts. </p>\n";
			}
		}
		else
		{
			$main_id = 0;			// Invalid regex result; assume the character is mainless alt
			$alt_type = ALTMONITOR_ALT_NO_MAIN;
		}

		$wowdb->free_result( $result );
	}
}


// -[ Start DB update code ]-

$query = "SELECT `member_id` FROM `".ROSTER_ALT_TABLE."` WHERE `member_id`='$member_id'";

$result = $wowdb->query( $query );

if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

$update = $wowdb->num_rows( $result ) == 1;
$wowdb->free_result($result);

$wowdb->reset_values();

$wowdb->add_value( 'member_id', $member_id );

$wowdb->add_value( 'main_id', $main_id );

$wowdb->add_value( 'alt_type', $alt_type );

if( $update )
	$querystr = "UPDATE `".ROSTER_ALT_TABLE."` SET ".$wowdb->assignstr." WHERE `member_id` = '$member_id'";
else
	$querystr = "INSERT INTO `".ROSTER_ALT_TABLE."` SET ".$wowdb->assignstr;

$result = $wowdb->query( $querystr );

if ( !$result ) { return("$member_name not updated, failed at line ".__LINE__); }

?>
