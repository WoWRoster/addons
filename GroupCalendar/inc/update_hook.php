<?php



if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Addon Update class
 * This MUST be the same name as the addon basename
 */
 
// ini_set( 'memory_limit', '24M' );

// Your settings are saved in these files
//include_once("include/config.php");
//include_once("include/auth-config.php");
//include_once("include/helper_functions.php");

      define('CALENDAR_TABLE','roster_addons_GroupCalendar_info');
	
	define('ATTENDANCE_TABLE','roster_addons_GroupCalendar_attend');
	
	define('OTHERINFO_TABLE','roster_addons_GroupCalendar_other');
	
// Set the following value to the WoW Server's timezone.  This value will be
// used to add to the GroupCalendar times to make them GMT values
// instead of saving them in Server Time.


// Allows you to specify the format in which time
// values are output.  Currently there are two
// formats available: "12hr", which displays
// hours 1-12 with an am/pm, and "24hr" which
// display hours 00-23 with no am/pm.

class GroupCalendarUpdate
{

var $messages = '';		// Update messages
	var $data = array();		// Addon config data automatically pulled from the addon_config table
	var $files = array();	// We need on of them
	var $evid = '';
	var $evt = '0';
	var $debuging_flag = '0';
	var $mDate = null;
	var $mTitle = null;
	var $mType = null;
	var $mID = null;
	var $mTime = null;
	var $mPrivate = null;
	var $mGuildOnly = null;
	var $mDescription = null;
	var $mDuration = null;
	var $mMinLevel = null;
	var $mMaxLevel = null;
	var $mAttendance = null;
	var $mLimits = null;
	var $mMaxAttendance = null;
	var $startdate = null;
	var $mDateConv = null;
	var $eventDate = null;
	var $eventTime = null;
	var $eventTimeH = null;
	var $eventTimeM = null;
	var $eventTimeS = null;
	var $only_realm = null;
			
//Increase the memory limit because this can be a big file



	function GroupCalendarUpdate($data)
	{
		global $roster, $update, $addon;
		
            $this->data = $data;
            $this->files[] = 'groupcalendar'; // Register this file for upload

	}
		/**
	 * Resets addon messages
	 */
	function reset_messages()
	{
		$this->messages = '';
	}
///////////////////////////////////////////////////////////
//  Main Guts of the program
///////////////////////////////////////////////////////////

	function update()
	{
		global $roster, $update, $addon;
		$this->messages = "<br />\n";
            $filefield = "groupcalendar";
            $calendar_data = $this->GroupCalendarParse($update->uploadData['groupcalendar'],$roster->data['server']);//GroupCalendarParse($lua_data,$WOW_server);
		
		$replace_chars = array("&a;","&c;","&s;","&cn;","&n;");
		$substu_chars = array("&",",","/",":","\n");

		if (count($calendar_data) > 0 )
		{
			//if ($this->debuging_flag) { $this->messages = ("** Count of data array is: ". count($calendar_data) .".  Tables dumped for anticipated data entry.\n"); }
			
			//empty table to get rid of all information before reposting new events.  This eliminate events that were removed in game.
			$query = "TRUNCATE `". CALENDAR_TABLE."`";
			$result =$roster->db->query($query);////,$gc_database['connection']);
			
			if (!$result) die("Failed to clear out the old data. SQL: $query.<b>".mysql_error()."</b>\n");
			$query = "TRUNCATE `". ATTENDANCE_TABLE."`";
			$result = $roster->db->query($query);////,$gc_database['connection']);
			
			if (!$result) die("Failed to clear out the old data. SQL: $query.<b>".mysql_error()."</b>\n");
			$query = "UPDATE `". OTHERINFO_TABLE ."` SET `value`='". gmmktime() ."' WHERE id='upload_time'";
			$result =$roster->db->query($query);//,$gc_database['connection']);
			
			if (mysql_affected_rows() == 0) {
				$query = "INSERT INTO ". OTHERINFO_TABLE ." SET id='upload_time',`value`='". gmmktime() ."'";
				$result = $roster->db->query($query);//,$gc_database['connection']);
				if (!$result) die("Failed to create the upload_time field. SQL: $query.<b>".mysql_error()."</b>\n");
			}
		}
		$good_adds = 0;
		$bad_adds = 0;
		
		$id_counter = 1;
		
		foreach (array_keys($calendar_data) as $eid) {
		
		      if (isset($calendar_data[$eid]['MinLevel']))
			if ($calendar_data[$eid]['MinLevel'] == "") $calendar_data[$eid]['MinLevel'] = NULL;
			if (isset($calendar_data[$eid]['MaxLevel']))
			if ($calendar_data[$eid]['MaxLevel'] == "") $calendar_data[$eid]['MaxLevel'] = NULL;
			if (isset($calendar_data[$eid]['MaxAttendance']))
			if ($calendar_data[$eid]['MaxAttendance'] == "") $calendar_data[$eid]['MaxAttendance'] = NULL;
			$sql = "INSERT INTO ". CALENDAR_TABLE ." SET ";
			$sql.= "`id`='".$id_counter."', ";
			$sql.= "`creator`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Creator'])) ."', ";
			$sql.= "`start`=FROM_UNIXTIME(". $calendar_data[$eid]['DateTime'] ."), ";
			$sql.= "`title`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Title'])) ."', ";
			$sql.= "`type`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Type'])) ."', ";
			$sql.= "`description`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['description'])) ."', ";
			if (isset($calendar_data[$eid]['GuildOnly']))
			$sql.= "`guildonly`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['GuildOnly'])) ."', ";
			
			$sql.= "`duration`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Duration'])) ."', ";
			if (isset($calendar_data[$eid]['MinLevel']))
			$sql.= "`minlevel`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MinLevel'])) ."', ";
			if (isset($calendar_data[$eid]['MaxLevel']))
			$sql.= "`maxlevel`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MaxLevel'])) ."', ";
			if (isset($calendar_data[$eid]['MaxAttendance']))
			$sql.= "`maxattend`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MaxAttendance'])). "', ";
			
			// ok some edits here for new role limits no longer class limited llpo
			
                  $limitstr = "";
			if (isset($calendar_data[$eid]['Limits']))
			if (is_array($calendar_data[$eid]['Limits'])) {
				$tempLimits = array();
				foreach (array_keys($calendar_data[$eid]['Limits']) as $k) {
				//echo $k.'<br>';
					$v = $calendar_data[$eid]['Limits'][$k]['mMax'];
					if ($v >0) $tempLimits[$this->RoleInts($k)] = $v;
				}
				$tk = array_keys($tempLimits);
				sort($tk);
				foreach ($tk as $k) {
					$limitstr .= $k .": ". mysql_escape_string(str_replace($replace_chars,$substu_chars,$tempLimits[$k])) ."<br />";
				}
				//echo $limitstr.'<br>';
			}
			$sql.= "`limits`='" . $limitstr ."'";
			// end new eddits
			if ($this->debuging_flag) $this->messages = ("$sql\n");
			$result = $roster->db->query($sql);//,$gc_database['connection']);
			if (!$result) {
				$bad_adds++;
				if ($this->debuging_flag) $this->messages = ("***FAILED to add event. <b>".mysql_error()."</b>\n");
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
						$sql.= "`role`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Role'])) ."', ";
						$sql.= "`guild`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Guild'])) ."', ";
						$sql.= "`guildRank`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['GuildRank'])) .", ";
						$sql.= "`createDate`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['createDate'])) ."', ";
						$sql.= "`createTime`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['createTime'])) ."'";
						if ($this->debuging_flag) $this->messages = ("$sql\n");
						$result = $roster->db->query($sql);//,$gc_database['connection']);
						if (!$result) {
							$bad_adds++;
							//if ($this->debuging_flag) $this->messages = ("***FAILED to add attendance. <b>".mysql_error()."</b>\n");
						}
					}
				}
			}
			$id_counter++;
		}
		$this->messages .= $roster->locale->act['gc_title'] .'<br> '.$roster->locale->act['Data_Uploaded'] ."<br />\n";
		$this->messages .= $roster->locale->act['Updated'] .' '. $good_adds .' '.$roster->locale->act['Records_Calendar'] ."<br />\n";
		if ($bad_adds) $this->messages = $roster->locale->act['Failed'] .' '. $bad_adds .' '.$roster->locale->act['Records_Calendar'] ."<br />\n";
            return true;
}

///////////////////////////////////////////////////////////
//  Parses the associative array provided from the LUA
//		input:	$lua_data is an associative array
//				$only_realm is an optional restrictor of data
//		returns an associative array of events
///////////////////////////////////////////////////////////
function GroupCalendarParse($lua_data,$only_realm = "") {
  global $roster, $addon;

  $calendar_items = array();
  $count = 0;
  
  if (!array_key_exists("gGroupCalendar_Database",$lua_data)) {
  	if ($this->debuging_flag) $this->messages = ("\n\nERROR:  No Calendar Database key found in LUA Data.\n\n");
	return array();
  }
  $database = $lua_data['gGroupCalendar_Database'];
  if ($this->debuging_flag) $this->messages = ("Database Format is ". $database['Format'] ."\n");
  if ($this->debuging_flag && $database['Format'] != 14) $this->messages = ("WARNING: Expecting Format 14, possible errors from different format versions.  Continuing anyway...\n");

  $gd = $database['Databases'];
  foreach( array_keys( $gd ) as $char_name ) {
    //get char name that posted the event
	$charName = $gd[$char_name]['UserName'];
	$realm = $gd[$char_name]['Realm'];
	if ($only_realm != "" && $realm != $only_realm) {
		$this->messages = ("Entry $char_name is being skipped because the realm '$realm' does not meet required realm of '$only_realm'.\n");
		continue;
	}

	$events = $gd[$char_name]['Events'];
	if ($this->debuging_flag == 2) { $this->messages = ("$char_name Events "); $this->messages = (print_r($events,1)); }
	foreach(array_keys($events) as $event){
	  if ($this->debuging_flag == 2) { $this->messages = ("Event $event\n"); }
	  $detail = $events[$event];
	  //$detailinfo = null;
	  foreach(array_keys($detail) as $detailinfo){
	    $thisEvent = array();
		$detailedinfo = $detail[$detailinfo];
		if ($this->debuging_flag == 2) { $this->messages = (print_r($detailedinfo,1)); }
		
		if (isset($detailedinfo['mPrivate']))
            {
		$detailedinfo['mPrivate'] = $detailedinfo['mPrivate'];
		}
		else
		{
		$detailedinfo['mPrivate'] = false;
		}
		
		// the 'mPrivate' field will signify if this event is private and shouldn't be uploaded
		if ($detailedinfo['mPrivate'] == "true") continue;
		if (isset($detailedinfo['mDate']))			
		$mDate = $detailedinfo['mDate'];
		if (isset($detailedinfo['mTitle']))
            {
		$mTitle = $detailedinfo['mTitle'];
		}
		else{
		$mTitle = '';
		}
		if (isset($detailedinfo['mType']))
		$mType = $detailedinfo['mType'];
            if (isset($detailedinfo['mID']))
		$mID = $detailedinfo['mID'];
		if (isset($detailedinfo['mTime']))
		$mTime = $detailedinfo['mTime'];
		if (isset($detailedinfo['mGuild']))
		$mGuildOnly = $detailedinfo['mGuild'];
            if (isset($detailedinfo['mDescription']))
            {
		$mDescription = $detailedinfo['mDescription'];
		}
		else{
		$mDescription = '';
		}
		if (isset($detailedinfo['mDuration']))
		$mDuration = $detailedinfo['mDuration'];
		if (isset($detailedinfo['mMinLevel']))
		$mMinLevel = $detailedinfo['mMinLevel'];
		if (isset($detailedinfo['mMaxLevel']))
		$mMaxLevel = $detailedinfo['mMaxLevel'];
		if (isset($detailedinfo['mAttendance']))
		$mAttendance = $detailedinfo['mAttendance'];
		if (isset($detailedinfo['mLimits']))
		$mLimits = $detailedinfo['mLimits'];
		if (isset($detailedinfo['mLimits']['mMaxAttendance']))
		$mMaxAttendance = $detailedinfo['mLimits']['mMaxAttendance'];

		//Convert GroupCal Date to Calendar date
		$startdate = mktime(12,0,0,1,1,2000);
		$mDateConv = $startdate + ($mDate * 86400);
		$eventDate = getdate($mDateConv);
						
		//Convert GroupCal Time to Standard Time
		if (isset($mTime))
		$eventTime = $mTime / 60;
		if (isset($eventTime))
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
		if (isset($mDuration))
		$duration = (int)$mDuration;
						
		if ($this->debuging_flag==2) $this->messages = 'Title: '.$mTitle.'<br />Date: '.$mDate.' Time: '.$mTime.'<br />';
		if ($this->debuging_flag==2) $this->messages = "Initial Date found to be $eventTimeH:$eventTimeM:$eventTimeS ". $eventDate['mon'] ."/". $eventDate['mday'] ."/". $eventDate['year'] ."<br />\n";

		//check event type for b-day and set time to be allday event
		if($mType == 'Birth'){
		  $eventTimeS = 25;
		  $eventTimeH = 0;
		  $eventTimeM = 0;
		  $duration = 0;
		} else $eventTimeS = $eventTimeS - ($addon['config']['WOW_TIME_OFFSET'] * 3600);
			//Not a birthday, so add the Server Time Offset to store it in GMT
							
		//Calculate the Unix Date using the vars we have gotten from our data.
		$date = mktime($eventTimeH,$eventTimeM,$eventTimeS,$eventDate['mon'],$eventDate['mday'],$eventDate['year']);
						
		if ($this->debuging_flag==2) print "GMT Date found to be ". date("r",$date) ."<br />\n";

		//Parse the attendace information.
		$fAttendance = "";
		if(isset($mAttendance))
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
                  $fAttendance[$attenCount]['Role'] = $this->RoleInt($currAttend[9]);
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
				$modDate = $modDate - ($addon['config']['WOW_TIME_OFFSET'] * 3600);
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
				$modDate = $modDate - ($addon['config']['WOW_TIME_OFFSET'] * 3600);
				$fAttendance[$attenCount]['createDate'] = date("Y-m-d",$modDate);
				$fAttendance[$attenCount]['createTime'] = date("H:i:s",$modDate);
			}

			//Increment and ready for next loop
			$attenCount++;
			if ($this->debuging_flag==2) $this->messages = ('<br>'.$name.' '.$status.' '.$level.' '.$this->Race($raceCode).' '.$this->ClassInt($classCode).' '.$guild);
		  }
		}
            if (isset($mLimits['mRoleLimits']))
		$fAttendLimits = $mLimits['mRoleLimits'];
		if (isset($charName))				
		$thisEvent['Creator'] = $charName;
		if (isset($date))
		$thisEvent['DateTime'] = $date;
		if (isset($mTitle))
		$thisEvent['Title'] = $mTitle;
		if (isset($mType))
            $thisEvent['Type'] = $mType;
            if (isset($mID))
		$thisEvent['ID'] = $mID;
		if (isset($mDescription))
		$thisEvent['description'] = $mDescription;
		if (isset($mGuildOnly))
		$thisEvent['GuildOnly'] = $mGuildOnly;
		if (isset($duration))
		$thisEvent['Duration'] = $duration;
		if (isset($mMinLevel))
		$thisEvent['MinLevel'] = $mMinLevel;
		if (isset($mMaxLevel))
		$thisEvent['MaxLevel'] = $mMaxLevel;
            if (isset($fAttendance))
		$thisEvent['Attendance'] = $fAttendance;
		if (isset($fAttendLimits))
		$thisEvent['Limits'] = $fAttendLimits;
		if (isset($mMaxAttendance))
		$thisEvent['MaxAttendance'] = $mMaxAttendance;
						
		$calendar_items[$charName . $mID] = $thisEvent;
		
	  }
	}
  }
  return $calendar_items;
}

	function Race($code){
			$gc_lang['Race']['U']	= 'Undead';
	$roster->locale->act['Race']['R']	= 'Troll';
	$roster->locale->act['Race']['T']	= 'Tauren';
	$roster->locale->act['Race']['O']	= 'Orc';
	$roster->locale->act['Race']['B']	= 'Blood Elf';
	$roster->locale->act['Race']['N']	= 'Night Elf';
	$roster->locale->act['Race']['H']	= 'Human';
	$roster->locale->act['Race']['G']	= 'Gnome';
	$roster->locale->act['Race']['D']	= 'Dwarf';
	$roster->locale->act['Race']['A']	= 'Draenei';
	$roster->locale->act['Race']['?']	= 'n/';
		return $gc_lang['Race'][$code];
	}
	
	function epty($va)
      {
	     if (isset($va)){
	      return $va;
	     }
	     else
	     {
	           return "";
	     }
	     
	}
	
	
function ClassInt($code){
	$roster->locale->act['Class']['P']	= 'Priest';
	$roster->locale->act['Class']['S']	= 'Shaman';
	$roster->locale->act['Class']['M']	= 'Mage';
	$roster->locale->act['Class']['R']	= 'Rogue';
	$roster->locale->act['Class']['D']	= 'Druid';
	$roster->locale->act['Class']['W']	= 'Warrior';
	$roster->locale->act['Class']['H']	= 'Hunter';
	$roster->locale->act['Class']['K']	= 'Warlock';
	$roster->locale->act['Class']['L']	= 'Paladin';
	$roster->locale->act['Class']['?']	= 'n/a';
		return $roster->locale->act['Class'][$code];
	}
	
function RoleInt($code){

	$r['Role']['MH'] = "Healer";
	$r['Role']['OH'] = "Off-Healer";
	$r['Role']['MT'] = "Tank";
	$r['Role']['OT'] = "Off-Tank";
	$r['Role']['RD'] = "Ranged";
	$r['Role']['MD'] = "Melee";
		return $r['Role'][$code];
	}
function RoleInts($code){
	$rs['Role']['MH'] = "Healers";
	$rs['Role']['OH'] = "Off-Healers";
	$rs['Role']['MT'] = "Tanks";
	$rs['Role']['OT'] = "Off-Tanks";
	$rs['Role']['RD'] = "Ranged";
	$rs['Role']['MD'] = "Melee";
		return $rs['Role'][$code];
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




}
?>
