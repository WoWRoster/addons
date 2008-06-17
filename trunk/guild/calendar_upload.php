<?php
/*
File Name:  calendar_upload.php
WoW Addon Version:  GroupCalendar 3.0
File Version:  2.0
File Useage:  Upload and parse information from GroupCalendar.lua to a database for
	use on a website.  This file should work both manually (website) and with the UniUploader program.
Author: Munazz of Mediocrity in Motion on Skywall
Inspiration from: (Saerok/Neer) of Cenarion Circle
Warrenty & Copyright:  You're kidding, right?  Free to use and modify, but please let me know what
	you are up to so that I can possibly incorporate it too.

Thanks to Saerok/Neer for the original idea.  I have heavily modified his code, and as such I have changed the
primary author to me.  But I was led down the proper path from the files I got from Saerok/Neer.	

--Useful Links--
UniUploader @ http://www.wowroster.net
Group Calendar mod @ http://www.curse-gaming.com/en/wow/addons-2718-1-groupcalendar.html
*/

// Set $htmlout to 1 to assume request is from a browser
// If it is UniUploader sending the file, set $htmlout to 0
if( substr( $_SERVER["HTTP_USER_AGENT"], 0, 11 ) == 'UniUploader' )	$htmlout = 0;
else $htmlout = 1;
//Increase the memory limit because this can be a big file
ini_set( 'memory_limit', '24M' );

// Your settings are saved in these files
include_once("include/config.php");
include_once("include/auth-config.php");
include_once("include/helper_functions.php");

if (!$gc_user['is_admin']) {
	if ($htmlout) {
			include($HEADER_FILE);
		    print makeContainerTop($gc_lang['login_required'],"100%");		//Function for template output for my web pages
		?>
			<?php echo $gc_lang['Invalid User']?>
			<form method="post">
				<?php echo $gc_lang['forms']['username']?>: <input type="text" name="username"><br>
				<?php echo $gc_lang['forms']['password']?>: <input type="password" name="password"><br>
				<?php echo $gc_lang['forms']['autologin']?> <input type="checkbox" name="autologin" value="1"><br>
				<input type="submit" value="<?php echo $gc_lang['forms']['submit']?>">
			</form>
		<?php
			print makeContainerBottom();		//Function for template output for my web pages
			include($FOOTER_FILE);
	}
	else {
		print $gc_lang['Invalid User'];
	}
	exit;
}

///////////////////////////////////////////////////////////
//  Main Guts of the program
///////////////////////////////////////////////////////////
if ($htmlout) {
	//PUT YOUR WEBPAGE GRAPHICS CONTENT HERE
	include($HEADER_FILE);
	print makeContainerTop($gc_lang['Data_Uploaded'],"100%");		//Function for template output for my web pages
}

if($gc_user['is_admin']){		//check to ensure that uploader is a guild officer/administrator from authentication

	$filefield = "GroupCalendar";
	if(isset($_FILES[$filefield])){
		//If the file is gzipped, uncompress the file first
		$filename = $_FILES[$filefield]['tmp_name'];
		if (substr_count($_FILES[$filefield]['name'],'.gz') > 0)	// If the file is gzipped
			$file_as_array = gzfile($filename);
		else		// The file is not gzipped
			$file_as_array = file($filename);
		unlink($filename);
		
		//Disable Error Reporting since this is an autoupdate.  This is temporary only works while this script executes.
		if (!$htmlout) error_reporting(0);
		//Parse the LUA file into an array
		$lua_data = ParseLuaArray($file_as_array);
		unset($file_as_array);
		if ($debuging_flag==2) { debug_output("***** DATA READ FROM LUA FILE *****\n"); debug_output(print_r($lua_data,1)); }
		
		$calendar_data = GroupCalendarParse($lua_data,$WOW_server);
		if ($debuging_flag==2) { debug_output("***** DATA STORED AS CALENDAR INFO *****\n"); debug_output(print_r($calendar_data,1)); }
		unset($lua_data);
		
		$replace_chars = array("&a;","&c;","&s;","&cn;","&n;");
		$substu_chars = array("&",",","/",":","\n");

		if (count($calendar_data) > 0 )
		{
			if ($debuging_flag) { debug_output("** Count of data array is: ". count($calendar_data) .".  Tables dumped for anticipated data entry.\n"); }
			//empty table to get rid of all information before reposting new events.  This eliminate events that were removed in game.
			$query = "TRUNCATE ". CALENDAR_TABLE;
			$result = mysql_query($query,$gc_database['connection']);
			if (!$result) die("Failed to clear out the old data. SQL: $query.<b>".mysql_error()."</b>\n");
			$query = "TRUNCATE ". ATTENDANCE_TABLE;
			$result = mysql_query($query,$gc_database['connection']);
			if (!$result) die("Failed to clear out the old data. SQL: $query.<b>".mysql_error()."</b>\n");
			$query = "UPDATE ". OTHERINFO_TABLE ." SET `value`='". gmmktime() ."' WHERE id='upload_time'";
			$result = mysql_query($query,$gc_database['connection']);
			if (mysql_affected_rows() == 0) {
				$query = "INSERT INTO ". OTHERINFO_TABLE ." SET id='upload_time',`value`='". gmmktime() ."'";
				$result = mysql_query($query,$gc_database['connection']);
				if (!$result) die("Failed to create the upload_time field. SQL: $query.<b>".mysql_error()."</b>\n");
			}
		}
		else if ($debuging_flag) { debug_output("** Count of data array is: ". count($calendar_data) .".  Tables not emptied.\n"); }

		$good_adds = 0;
		$bad_adds = 0;
		
		$id_counter = 1;
		
		foreach (array_keys($calendar_data) as $eid) {
			if ($calendar_data[$eid]['MinLevel'] == "") $calendar_data[$eid]['MinLevel'] = "NULL";
			if ($calendar_data[$eid]['MaxLevel'] == "") $calendar_data[$eid]['MaxLevel'] = "NULL";
			if ($calendar_data[$eid]['MaxAttendance'] == "") $calendar_data[$eid]['MaxAttendance'] = "NULL";
			$sql = "INSERT INTO ". CALENDAR_TABLE ." SET ";
			$sql.= "`id`='".$id_counter."', ";
			$sql.= "`creator`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Creator'])) ."', ";
			$sql.= "`start`=FROM_UNIXTIME(". $calendar_data[$eid]['DateTime'] ."), ";
			$sql.= "`title`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Title'])) ."', ";
			$sql.= "`type`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Type'])) ."', ";
			$sql.= "`description`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['description'])) ."', ";
			$sql.= "`guildonly`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['GuildOnly'])) ."', ";
			$sql.= "`duration`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Duration'])) .", ";
			$sql.= "`minlevel`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MinLevel'])) .", ";
			$sql.= "`maxlevel`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MaxLevel'])) .", ";
			$sql.= "`maxattend`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MaxAttendance'])). ", ";
			$limitstr = "";
			if (is_array($calendar_data[$eid]['Limits'])) {
				$tempLimits = array();
				foreach (array_keys($calendar_data[$eid]['Limits']) as $k) {
					$v = $calendar_data[$eid]['Limits'][$k]['mMax'];
					if ($v >0) $tempLimits[ClassInt($k)] = $v;
				}
				$tk = array_keys($tempLimits);
				sort($tk);
				foreach ($tk as $k) {
					$limitstr .= $k .": ". mysql_escape_string(str_replace($replace_chars,$substu_chars,$tempLimits[$k])) ."<br />";
				}
			}
			$sql.= "`limits`='" . $limitstr ."'";
			if ($debuging_flag) debug_output("$sql\n");
			$result = mysql_query($sql,$gc_database['connection']);
			if (!$result) {
				$bad_adds++;
				if ($debuging_flag) debug_output("***FAILED to add event. <b>".mysql_error()."</b>\n");
			}			
			else {
				$good_adds++;
				if (is_array($calendar_data[$eid]['Attendance'])) {
					foreach (array_keys($calendar_data[$eid]['Attendance']) as $i) {
						$v = $calendar_data[$eid]['Attendance'][$i];
						if ($v['modDate']=="") $v['modDate']="1971-1-1";
						if ($v['modTime']=="") $v['modTime']="0";
						if ($v['GuildRank']=="") $v['GuildRank']="0";
						if ($v['createDate']=="") $v['createDate']=$v['modDate'];
						if ($v['createTime']=="") $v['createTime']=$v['modTime'];
						if ($v['Level']=="") $v['Level']="0";
						$sql = "INSERT INTO ". ATTENDANCE_TABLE ." SET ";
						$sql.= "`eid`='". $id_counter ."', ";
						$sql.= "`name`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Name'])) ."', ";
						$sql.= "`modDate`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['modDate'])) ."', ";
						$sql.= "`modTime`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['modTime'])) ."', ";
						$sql.= "`status`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Status'])) ."', ";
						$sql.= "`level`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Level'])) .", ";
						$sql.= "`racecode`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['RaceCode'])) ."', ";
						$sql.= "`classcode`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['ClassCode'])) ."', ";
						$sql.= "`comment`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Comment'])) ."', ";
						$sql.= "`guild`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Guild'])) ."', ";
						$sql.= "`guildRank`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['GuildRank'])) .", ";
						$sql.= "`createDate`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['createDate'])) ."', ";
						$sql.= "`createTime`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['createTime'])) ."'";
						if ($debuging_flag) debug_output("$sql\n");
						$result = mysql_query($sql,$gc_database['connection']);
						if (!$result) {
							$bad_adds++;
							if ($debuging_flag) debug_output("***FAILED to add attendance. <b>".mysql_error()."</b>\n");
						}
					}
				}
			}
			$id_counter++;
		}
		print $gc_lang['Updated'] .' '. $good_adds .' '.$gc_lang['Records_Calendar'] ."<br />\n";
		if ($bad_adds) print $gc_lang['Failed'] .' '. $bad_adds .' '.$gc_lang['Records_Calendar'] ."<br />\n";
	} else {
		if ($htmlout) {
			?>
				<?php echo $gc_lang['Browse_to']?>
				<p><form ENCTYPE="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="file" accept="*.lua" name="GroupCalendar"><br>
				<input type="hidden" name="sid" value="<?php echo  $userdata['session_id'] ?>">
				<input type="submit" value="<?php echo $gc_lang['forms']['submit']?>">
				</form>
			<?php
		}
		else {
			print $gc_lang['no_file'];
		}
	}
}else{
	echo $gc_lang['Invalid User'];
}
if ($htmlout) {
	//MORE WEBPAGE GRAPHICS/CONTENT HERE
	print makeContainerBottom();		//Function for template output for my web pages
	include($FOOTER_FILE);
}


///////////////////////////////////////////////////////////
//  Parses the associative array provided from the LUA
//		input:	$lua_data is an associative array
//				$only_realm is an optional restrictor of data
//		returns an associative array of events
///////////////////////////////////////////////////////////
function GroupCalendarParse($lua_data,$only_realm = "") {
  global $debuging_flag;

  $calendar_items = array();
  $count = 0;
  
  if (!array_key_exists("gGroupCalendar_Database",$lua_data)) {
  	if ($debuging_flag) debug_output("\n\nERROR:  No Calendar Database key found in LUA Data.\n\n");
	return array();
  }
  $database = $lua_data['gGroupCalendar_Database'];
  if ($debuging_flag) debug_output("Database Format is ". $database['Format'] ."\n");
  if ($debuging_flag && $database['Format'] != 14) debug_output("WARNING: Expecting Format 14, possible errors from different format versions.  Continuing anyway...\n");

  $gd = $database['Databases'];
  foreach( array_keys( $gd ) as $char_name ) {
    //get char name that posted the event
	$charName = $gd[$char_name]['UserName'];
	$realm = $gd[$char_name]['Realm'];
	if ($only_realm != "" && $realm != $only_realm) {
		if ($debuging_flag) debug_output("Entry $char_name is being skipped because the realm '$realm' does not meet required realm of '$only_realm'.\n");
		continue;
	}

	$events = $gd[$char_name]['Events'];
	if ($debuging_flag == 2) { debug_output("$char_name Events "); debug_output(print_r($events,1)); }
	foreach(array_keys($events) as $event){
	  if ($debuging_flag == 2) { debug_output("Event $event\n"); }
	  $detail = $events[$event];
	  foreach(array_keys($detail) as $detailinfo){
	    $thisEvent = array();
		$detailedinfo = $detail[$detailinfo];
		if ($debuging_flag == 2) { debug_output(print_r($detailedinfo,1)); }
		
		// the 'mPrivate' field will signify if this event is private and shouldn't be uploaded
		if ($detailedinfo['mPrivate'] == "true") continue;
					
		$mDate = $detailedinfo['mDate'];
		$mTitle = $detailedinfo['mTitle'];
		$mType = $detailedinfo['mType'];
		$mID = $detailedinfo['mID'];
		$mTime = $detailedinfo['mTime'];
		$mGuildOnly = $detailedinfo['mGuild'];
		$mDescription = $detailedinfo['mDescription'];
		$mDuration = $detailedinfo['mDuration'];
		$mMinLevel = $detailedinfo['mMinLevel'];
		$mMaxLevel = $detailedinfo['mMaxLevel'];
		$mAttendance = $detailedinfo['mAttendance'];
		$mLimits = $detailedinfo['mLimits'];
		$mMaxAttendance = $detailedinfo['mLimits']['mMaxAttendance'];

		//Convert GroupCal Date to Calendar date
		$startdate = mktime(12,0,0,1,1,2000);
		$mDateConv = $startdate + ($mDate * 86400);
		$eventDate = getdate($mDateConv);
						
		//Convert GroupCal Time to Standard Time
		$eventTime = $mTime / 60;
		if($decpos = strpos($eventTime,'.')){
		  $eventTimeH = substr($eventTime,0,$decpos);
		  $eventTimeM = substr($eventTime,$decpos);
		  $eventTimeM = 60 * $eventTimeM;
		  $eventTimeS = 0;
		  if($eventTimeM > 0 && $eventTimeM < 10){
		    $eventTimeM = 05;
		  }
		}else{
		  $eventTimeH = $eventTime;
		  $eventTimeM = 0;
		  $eventTimeS = 0;
		}
						
		//Calculate Duration (leave it in minutes)
		$duration = (int)$mDuration;
						
		if ($debuging_flag==2) print "Title: $mTitle<br />Date: $mDate Time: $mTime<br />\n";
		if ($debuging_flag==2) print "Initial Date found to be $eventTimeH:$eventTimeM:$eventTimeS ". $eventDate['mon'] ."/". $eventDate['mday'] ."/". $eventDate['year'] ."<br />\n";

		//check event type for b-day and set time to be allday event
		if($mType == 'Birth'){
		  $eventTimeS = 25;
		  $eventTimeH = 0;
		  $eventTimeM = 0;
		  $duration = 0;
		} else $eventTimeS = $eventTimeS - (WOW_TIME_OFFSET * 3600);
			//Not a birthday, so add the Server Time Offset to store it in GMT
							
		//Calculate the Unix Date using the vars we have gotten from our data.
		$date = mktime($eventTimeH,$eventTimeM,$eventTimeS,$eventDate['mon'],$eventDate['mday'],$eventDate['year']);
						
		if ($debuging_flag==2) print "GMT Date found to be ". date("r",$date) ."<br />\n";

		//Parse the attendace information.
		$fAttendance = "";
		if(is_array($mAttendance)){
		  $fAttendance = array();
		  //Check for People whom will attend the event.
		  $attenCount = 0;
		  foreach(array_keys($mAttendance) as $attendees){
		    $currAttend = explode(",",$mAttendance[$attendees]);
			//$currAttend = array(modified date,modified time,status,playerinfo,attend_comment,guild,guild rank,create date,create time)
			// playerinfo is string of 4 characters: first one is Race, second one is Class, last two are level
			$fAttendance[$attenCount]['Name'] = $attendees;
			$fAttendance[$attenCount]['str'] = $mAttendance[$attendees];
			$fAttendance[$attenCount]['modDate'] = $currAttend[0];
			$fAttendance[$attenCount]['modTime'] = $currAttend[1];
			$fAttendance[$attenCount]['Status'] = $currAttend[2];
			$fAttendance[$attenCount]['Level'] = substr($currAttend[3],2,2);
			$fAttendance[$attenCount]['RaceCode'] = substr($currAttend[3],0,1);
			$fAttendance[$attenCount]['ClassCode'] = substr($currAttend[3],1,1);
			$fAttendance[$attenCount]['Comment'] = $currAttend[4];
			$fAttendance[$attenCount]['Guild'] = $currAttend[5];
			$fAttendance[$attenCount]['GuildRank'] = $currAttend[6];
			$fAttendance[$attenCount]['createDate'] = $currAttend[7];
			$fAttendance[$attenCount]['createTime'] = $currAttend[8];
								
			//Convert GroupCal Time and Date to Gregorian Calendar date GMT timezone
			//	Time is stored is seconds since midnight
			$startdate = mktime(12,0,0,1,1,2000);
			if ($fAttendance[$attenCount]['modDate'] != "") {
				$mDateConv = $startdate + ($fAttendance[$attenCount]['modDate'] * 86400);
				$modDate = getdate($mDateConv);
				$eventTimeS = $fAttendance[$attenCount]['modTime'] % 60;
				$eventTimeH = floor($fAttendance[$attenCount]['modTime'] / 60);
				$eventTimeM = $eventTimeH % 60;
				$eventTimeH = floor($eventTimeH / 60);
				$modDate = mktime($eventTimeH,$eventTimeM,$eventTimeS,$modDate['mon'],$modDate['mday'],$modDate['year']);
				$modDate = $modDate - (WOW_TIME_OFFSET * 3600);
				$fAttendance[$attenCount]['modDate'] = date("Y-m-d",$modDate);
				$fAttendance[$attenCount]['modTime'] = date("H:i:s",$modDate);
			}

			if ($fAttendance[$attenCount]['createDate'] != "") {
				$mDateConv = $startdate + ($fAttendance[$attenCount]['createDate'] * 86400);
				$modDate = getdate($mDateConv);
				$eventTimeS = $fAttendance[$attenCount]['createTime'] % 60;
				$eventTimeH = floor($fAttendance[$attenCount]['createTime'] / 60);
				$eventTimeM = $eventTimeH % 60;
				$eventTimeH = floor($eventTimeH / 60);
				$modDate = mktime($eventTimeH,$eventTimeM,$eventTimeS,$modDate['mon'],$modDate['mday'],$modDate['year']);
				$modDate = $modDate - (WOW_TIME_OFFSET * 3600);
				$fAttendance[$attenCount]['createDate'] = date("Y-m-d",$modDate);
				$fAttendance[$attenCount]['createTime'] = date("H:i:s",$modDate);
			}

			//Increment and ready for next loop
			$attenCount++;
			if ($debuging_flag==2) debug_output('<br>'.$name.' '.$status.' '.$level.' '.Race($raceCode).' '.ClassInt($classCode).' '.$guild);
		  }
		}

		$fAttendLimits = $mLimits['mClassLimits'];
						
		$thisEvent['Creator'] = $charName;
		$thisEvent['DateTime'] = $date;
		$thisEvent['Title'] = $mTitle;
		$thisEvent['Type'] = $mType;
		$thisEvent['ID'] = $mID;
		$thisEvent['description'] = $mDescription;
		$thisEvent['GuildOnly'] = $mGuildOnly;
		$thisEvent['Duration'] = $duration;
		$thisEvent['MinLevel'] = $mMinLevel;
		$thisEvent['MaxLevel'] = $mMaxLevel;
		$thisEvent['Attendance'] = $fAttendance;
		$thisEvent['Limits'] = $fAttendLimits;
		$thisEvent['MaxAttendance'] = $mMaxAttendance;
						
		$calendar_items[$charName . $mID] = $thisEvent;
	  }
	}
  }
  return $calendar_items;
}

///////////////////////////////////////////////////////////
//  Parses the LUA file and creates and associative array
//		input:	$filename is the location of the file
//		returns an associative array styled like the file
//  @auther six, orginally mordon (of wowroster.net)
///////////////////////////////////////////////////////////
function ParseLuaArray( &$file_as_array )
{
	if( !is_array($file_as_array) )
	{
		// return false if not presented with an array
		return(false);
	}
	else
	{
		// Parse the contents of the array
		$stack = array( array( '',  array() ) );
		$stack_pos = 0;
		$last_line = '';
		foreach( $file_as_array as $line )
		{
			// join lines ending in \\ together
			if( substr( $line, -2, 1 ) == '\\' )
			{
				$last_line .= substr($line, 0, -2) . "\n";
				continue;
			}
			if($last_line!='')
			{
				$line = trim($last_line . $line);
				$last_line = '';
			}
			else
			{
				$line = trim($line);
			}
			
			// Look for end of an array
			if( $line[0] == '}' )
			{
				$hash = $stack[$stack_pos];
				unset($stack[$stack_pos]);
				$stack_pos--;
				$stack[$stack_pos][1][$hash[0]] = $hash[1];
				unset($hash);
			}
			// Handle other cases
			else
			{
				// Check if the key is given
				if( strpos($line,'=') )
				{
					list($name, $value) = explode( '=', $line, 2 );
					$name = trim($name);
					$value = trim($value,', ');
					if($name[0]=='[')
					{
						$name = trim($name, '[]"');
					}
				}
				// Otherwise we'll have to make one up for ourselves
				else
				{
					$value = $line;
					if( empty($stack[$stack_pos][1]) )
					{
						$name = 1;
					}
					else
					{
						$name = max(array_keys($stack[$stack_pos][1]))+1;
					}
					if( strpos($line,'-- [') )
					{
						$value = explode('-- [',$value);
						array_pop($value);
						$value = implode('-- [',$value);
					}
					$value = trim($value,', ');
				}
				if( $value == '{' )
				{
					$stack_pos++;
					$stack[$stack_pos] = array($name, array());
				}
				else
				{
					if($value[0]=='"')
					{
						$value = substr($value,1,-1);
					}
					else if($value == 'true')
					{
						$value = true;
					}
					else if($value == 'false')
					{
						$value = false;
					}
					else if($value == 'nil')
					{
						$value = NULL;
					}
					$stack[$stack_pos][1][$name] = $value;
				}
			}
		}
		return($stack[0][1]);
	}
}
?>