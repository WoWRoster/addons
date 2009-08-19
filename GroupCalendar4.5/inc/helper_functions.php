<?php
////////////////////////////////////////////////////////////////////////////////
// Calendar Helper Functions                                                  //
////////////////////////////////////////////////////////////////////////////////
// This file can be included anywhere on your website to draw out information
// from your calendar database.
////////////////////////////////////////////////////////////////////////////////
if (!isset($gc_database)) include_once("database_info.php");
if (!isset($gc_lang)) include_once("language.php");

///////////////////////////////////////////////////////////
//  Nice Helper functions
///////////////////////////////////////////////////////////
	function Race($code){
		global $gc_lang;
		return $gc_lang['Race'][$code];
	}
	
	function ClassInt($code){
		global $gc_lang;
		return $gc_lang['Class'][$code];
	}
	
	function debug_output($txt) {
		global $htmlout;
		
		if ($htmlout) {
			$txt = str_replace(" ","&nbsp;",$txt);
			$txt = str_replace("\n","<br>\n",$txt);
		}
		print $txt;
	}
	
	function getGCtext($type) {
		global $gc_lang;
		if (array_key_exists($type,$gc_lang['gcType'])) return $gc_lang['gcType'][$type];
		else if ($type != "") return $gc_lang['gcType']['OTHER'] . " ($type)";
		else return $gc_lang['gcType']['OTHER'];
	}

	function getGCimage($type,$path) {
	global $roster, $addon;

		$base_path = "./";
		$filename = $base_path . $path . "Icon-" . $type . ".png";
		if (file_exists($filename)) return $path ."Icon-". $type . ".png";
		else return $path . "Icon-Unknown.png";

	}
	
	function reset_event_names() {
		// Items with this Event Type will be ignored, regardless of the "Private" flag
		$val = array();
		$val[] = "RSAQR";
		$val[] = "RSMoon";
		$val[] = "RSZG";
		$val[] = "RSMC";
		$val[] = "RSAQT";
		$val[] = "RSSalt";
		$val[] = "RSOny";
		$val[] = "RSBWL";
		$val[] = "RSNaxx";
		$val[] = "RSXmut";
		$val[] = "RSSnow";
		$val[] = "Doctor";
		$val[] = "Dentist";
		return $val;
	}
///////////////////////////////////////////////////////////
//  END Nice Helper functions section
///////////////////////////////////////////////////////////

	////////////////////////////////////////////////////
	// function getUpcomingEvents()
	// Returns an array of upcoming events that are not birthdays or resets
	// The array will be sorted where the soonest event will be at [0]	
	function getUpcomingEvents()
	{
		$right_now = gmdate("Y-m-d H:i:s");
		global $gc_database, $roster;
		global $gc_user;
		global $debuging_flag;
		
		$skipme = reset_event_names();
		//Check to see if user specified timezone exists, if not use default
		if (!isset($gc_user['user_timezone'])) $gc_user['user_timezone'] = CURR_TIME_OFFSET;
		$t_offset = $gc_user['user_timezone'] * 3600;
		
		//////////////////////////////////////////////////////////////////////
		// Get Group Calendar Events
		//////////////////////////////////////////////////////////////////////
		$sql = "SELECT `id`, `title`, `start` AS `start_time`, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, `type`, `duration`, `description`, `guildonly`, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%l:%i%p') AS stime12, ";
		$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%l:%i%p') AS etime12, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%H:%i') AS stime24, ";
		$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%H:%i') AS etime24, ";
		$sql .= "TIME_FORMAT(start, '%H:%i:%s') AS s_time, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
		$sql .= "DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS d, MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS m, YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS y ";
		$sql .= "FROM ". CALENDAR_TABLE ."  WHERE (`start` > '$right_now' OR DATE_ADD(`start`, INTERVAL `duration` MINUTE) > '$right_now') AND `type` != 'Birth' ORDER BY `start` ASC";
		$result = $roster->db->query($sql);// $result = mysql_query($sql,$gc_database['connection']);
		if ($result == false && $debuging_flag) print("Error in SQL statement in getUpcomingEvents() function.<br />\nmySQL error: ". mysql_error() ."<br />\nFull SQL string: $sql<br />\n");
		
		$newEvents = array();
		while($row = mysql_fetch_array($result)) {
			if (in_array($row["type"],$skipme)) continue;
			$event = array();
			$event['title'] = stripslashes($row["title"]);
			if ($event['title']=="") $event['title'] = getGCtext($row['type']);

			if (defined("TIME_DISPLAY_FORMAT") && TIME_DISPLAY_FORMAT == "12hr") {
				$stime = $row["stime12"];
				$etime = $row["etime12"];
			} else {
				$stime = $row["stime24"];
				$etime = $row["etime24"];
			}
			if (!($row["s_time"] == "00:00:25" && $row["e_time"] == "00:00:25")) {
				if ($row["s_time"] == "00:00:25")
					$starttime = "- -";
				else
					$starttime = $stime;
					
				if ($row["e_time"] == "00:00:25" || $row["e_time"] == $row["s_time"])
					$endtime = "";
				else
					$endtime = " - ".$etime;
				
				$timestr = "($starttime$endtime)&nbsp;";
			} else {
				$timestr = "<br>";
			}
	
			$event["id"] = $row["id"];
			$event["timestr"] = $timestr;
			$event["type"] = $row["type"];
			$event["start12"] = $row["stime12"];
			$event["end12"] = $row["etime12"];
			$event["start24"] = $row["stime24"];
			$event["end24"] = $row["etime24"];
			$event["duration"] = $row["duration"];
			$event["description"] = $row["description"];
			$event["guildonly"] = $row["guildonly"];
			$event["mday"] = $row["d"];
			$event["mon"] = $row["m"];
			$event["year"] = $row["y"];
			$event["datestr"] = date("l M j", mktime(12,1,1,$row["m"],$row["d"],$row["y"]));
			
			$newEvents[] = $event;
		}
		return $newEvents;
	}

