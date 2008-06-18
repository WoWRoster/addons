<?php
	
	function get_query_select($sql,$conn) {
		$foo = mysql_query($sql,$conn) or die("Bad request: ".$sql."<br>\nReason: ". mysql_error());
		while ($result[] = mysql_fetch_array($foo));
		//pop off last 'false' value
		array_pop($result);
		return $result;
	};

	function cal_auth()
	{

		return 0;
	}
	
	function monthPullDown($month, $montharray, $namepre = "")
	{
		echo "<select name=\"". $namepre ."_month\">\n";
	
		for($i=0;$i < 12; $i++) {
			if ($i != ($month - 1))
				echo "	<option value=\"" . ($i + 1) . "\">$montharray[$i]</option>\n";
			else
				echo "	<option value=\"" . ($i + 1) . "\" selected>$montharray[$i]</option>\n";
		}
	
		echo "</select>";
	}
	
	function yearPullDown($year, $namepre="")
	{
		echo "<select name=\"". $namepre ."_year\">\n";
	
		$z = 3;
		for($i=1;$i < 8; $i++) {
			if ($z == 0)
				echo "	<option value=\"" . ($year - $z) . "\" selected>" . ($year - $z) . "</option>\n";
			else
				echo "	<option value=\"" . ($year - $z) . "\">" . ($year - $z) . "</option>\n";
			
			$z--;
		}
	
		echo "</select>";
	}
	
	function dayPullDown($day, $namepre="")
	{
		echo "<select name=\"". $namepre ."_day\">\n";
	
		for($i=1;$i <= 31; $i++) {
			if ($i == $day)
				echo "	<option value=\"$i\" selected>$i</option>\n";
			else
				echo "	<option value=\"$i\">$i</option>\n";
		}
	
		echo "</select>";
	}
	
	function hourPullDown($hour, $namepre)
	{
		echo "<select name=\"" . $namepre . "_hour\">\n";
	
		for($i=0;$i <= 12; $i++) {
			if ($i == $hour)
				echo "	<option value=\"$i\" selected>$i</option>\n";
			else
				echo "	<option value=\"$i\">$i</option>\n";
		}
	
		echo "</select>";
	}
	
	function minPullDown($min, $namepre)
	{
		echo "<select name=\"" . $namepre . "_min\">\n";
	
		for($i=0;$i <= 55; $i+=5) {
			
			if ($i < 10)
				$disp = "0" . $i;
			else
				$disp = $i;
			
			if ($i == $min)
				echo "	<option value=\"".$i."\" selected>".$disp."</option>\n";
			else
				echo "	<option value=\"$i\">$disp</option>\n";
		}
	
		echo "</select>";
	}
	
	function amPmPullDown($pm, $namepre)
	{
		global $gc_lang;
		if ($pm) { $pm = " selected"; } else { $am = " selected"; }
	
		echo "<select name=\"" . $namepre . "_am_pm\">\n";
		echo "	<option value=\"0\"$am>". $gc_lang['timeAM'] ."</option>\n";
		echo "	<option value=\"1\"$pm>". $gc_lang['timePM'] ."</option>\n";
		echo "</select>";
	}
	
	function javaScript()
	{
		
	echo '<script language="JavaScript">
		function submitMonthYear() {
			document.monthYear.method = "post";
			document.monthYear.action = "'.makelink( "&amp;month=\"+document.monthYear._month.value+\"&amp;year=\"+document.monthYear._year.value+\"&amp;sid=").';
			document.monthYear.submit();
		}
		</script>';

	}
	
	
	function footprint($auth, $m, $y) 
	{
	}
	
	
	function scrollArrows($m, $y)
	{
		global $gc_user, $roster, $addon;
		//if using SID field for authentication, include it in the links
		if (isset($gc_user['session_id'])) $sid = "&sid=".$gc_user['session_id'];
		else $sid = "";

		// set variables for month scrolling
		$nextyear = ($m != 12) ? $y : $y + 1;
		$prevyear = ($m != 1) ? $y : $y - 1;
		$prevmonth = ($m == 1) ? 12 : $m - 1;
		$nextmonth = ($m == 12) ? 1 : $m + 1;
	
		$s = "<a href=\"".makelink('&amp;month=' . $prevmonth . '&amp;year=' . $prevyear . $sid)."\">\n";
		$s .= "<img src=\"".$addon['image_url'] ."calendar/leftArrow.gif\" border=\"0\"></a> ";
		$s .= "<a href=\"".makelink('&amp;month=' . $nextmonth . '&amp;year=' . $nextyear . $sid)."\">";
		$s .= "<img src=\"".$addon['image_url'] ."calendar/rightArrow.gif\" border=\"0\"></a>";
		
		return $s;
	}
	
	function writeCalendar($month, $year)
	{
		global $roster, $addon;
		//if using SID field for authentication, include it in the links
		if (isset($gc_user['session_id'])) $sid = "&sid=".$gc_user['session_id'];
		else $sid = "";
		//Check to see if user specified timezone exists, if not use default
		if (!isset($gc_user['user_timezone'])) $gc_user['user_timezone'] = $addon['config']['CURR_TIME_OFFSET'];
		
		$str = getDayNameHeader();
		// get user permission level
		$auth = cal_auth();
		// get the events for the month
		$eventdata = getEventDataArray($month, $year, $auth);
		
		//Instance reset data do it ou not ?!?!?!
		
		$resetEvents = array();
		if ($addon['config']['DISPLAY_INSTANCE_RESETS']) {
			// get the Raid Instance Resets for the month		
			$resetEvents = getResetEvents($month,$year);
		}
		
		// get week position of first day of month.
		$weekpos = getFirstDayOfMonthPosition($month, $year);
		// get number of days in month
		$days = 31-((($month-(($month<8)?1:0))%2)+(($month==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		
		// initialize day variable to zero, unless $weekpos is zero
		if ($weekpos == 0) $day = 1; else $day = 0;
		
		// initialize today's date variables for color change
		$timestamp = gmmktime() + $gc_user['user_timezone'] * 3600;
		$d = date("j", $timestamp); $m = date("n", $timestamp); $y = date("Y", $timestamp);
		
		// loop writes empty cells until it reaches position of 1st day of month ($wPos)
		// it writes the days, then fills the last row with empty cells after last day
		while($day <= $days) {
			
			$str .="<tr>\n";
	
			for($i=0;$i < 7; $i++) {
				
				if($day > 0 && $day <= $days) {
					
					$str .= "	<td class=\"";
					
					if (($day == $d ) && ($month == $m) && ($year == $y))
						$str .= "today";
					else
						$str .= "day";
					
					$str .= "_cell\" valign=\"top\"><span class=\"day_number\">";
					
					$str .= "".$day."";
					
					$str .= "</span><br>";
					
					// enforce title limit
					$eventcount = '0';
					
					if (!empty($eventdata[$day]['title'])){
					$eventcount = count($eventdata[$day]["title"],COUNT_RECURSIVE);
					}

					if ($eventcount > $addon['config']['MAX_TITLES_DISPLAYED']){ $eventcount = $addon['config']['MAX_TITLES_DISPLAYED'];}
				/*
				  event reset info
				*/
				// write Reset Event info if exists for the day
				if (!empty($resetEvents[$day]['Name'])){
				$resetnum = count($resetEvents[$day]['Name']);
				}
				else
				{
				$resetnum = 0;
				}
				for ($j=0;$j<$resetnum;$j++) {
					
					//if ($resetEvents[$day]['GAME'][$j] == $addon['config']['resettype'])
                              //{
                              if ($addon['config']['INSTANCE_RESET_TYPE'] == 'ALL')
                              {
                                    $tip = ''. addslashes(utf8_decode($resetEvents[$day]['Name'][$j]))."\n".$roster->locale->act['reset_time'].":". $resetEvents[$day]['Time'][$j] .'';
                                    $image = $resetEvents[$day]['Icon'][$j];
                                    $str .= gctt($tip,$image,getGCtext($resetEvents[$day]['Name'][$j]),$addon['config']['INSTANCE_RESET_ICON_SIZE'],$addon['config']['INSTANCE_RESET_ICON_SIZE']);
					}
					else
					{
					if ($resetEvents[$day]['GAME'][$j] == $addon['config']['INSTANCE_RESET_TYPE'])
                              {
                                    $tip = ''. addslashes(utf8_decode($resetEvents[$day]['Name'][$j]))."\n".$roster->locale->act['reset_time'].":". $resetEvents[$day]['Time'][$j] .'';
                                    $image = $resetEvents[$day]['Icon'][$j];
                                    $str .= gctt($tip,$image,getGCtext($resetEvents[$day]['Name'][$j]),$addon['config']['INSTANCE_RESET_ICON_SIZE'],$addon['config']['INSTANCE_RESET_ICON_SIZE']);
					}					
					
					}
				}
					if ($j) $str .= "<br>\n";
					/*
					 end event reset
					*/
					
					for($j=0;$j < $eventcount;$j++) {
						// skip these
						if (in_array($eventdata[$day]["type"][$j],reset_event_names())) continue;

						switch ($eventdata[$day]["type"][$j]) {
							case "birthday":
								//is a birthday
								$str .= "<span class=\"title_txt\">";
								$str .= $eventdata[$day]["title"][$j] . "</span><br>";
								break;
							// Otherwise, it is an event so show it
							default:
								
                                                $str .= '<a href="'.makelink('&amp;id=' . utf8_decode($eventdata[$day]['id'][$j]) . $sid).'">';
								$tip = ''. $eventdata[$day]['title'][$j]." <br>".$eventdata[$day]["description"][$j]."<br>". $eventdata[$day]['timestr'][$j] .'';
								$image = $addon['image_url'] .'calendar/Icon-'.$eventdata[$day]['type'][$j].'.png';
								$str .= gctt($tip,$image,getGCtext($eventdata[$day]['type'][$j]),$addon['config']['EVENT_ICON_SIZE'],$addon['config']['EVENT_ICON_SIZE']);
								$str .= '</span><span class=\"title_txt\">'.utf8_decode(getGCtext($eventdata[$day]["type"][$j])) . "</a></span><div align=\"right\" class=\"time_str\">" . $eventdata[$day]["timestr"][$j] ."</div>";
								break;
						}
					}
	
					$str .= "</td>\n";
					$day++;
				} elseif($day == 0)  {
					$str .= "	<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
					$weekpos--;
					if ($weekpos == 0) $day++;
				} else {
					$str .= "	<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
				}
			}
			$str .= "</tr>\n\n";
		}
		
		$str .= "</table>\n\n";
		return $str;
	}
	
	function writeMiniCalendar($month, $year)
	{
		global $gc_user, $roster, $addon;
		//if using SID field for authentication, include it in the links
		if (isset($gc_user['session_id'])) $sid = "&sid=".$gc_user['session_id'];
		else $sid = "";
		//Check to see if user specified timezone exists, if not use default
		if (!isset($gc_user['user_timezone'])) $gc_user['user_timezone'] = $addon['config']['CURR_TIME_OFFSET'];
		
		$str = getDayNameHeader();
		// get user permission level
		$auth = cal_auth();
		// get the events for the month
		$eventdata = getEventDataArray($month, $year, $auth);
		// get week position of first day of month.
		$weekpos = getFirstDayOfMonthPosition($month, $year);
		// get number of days in month
		$days = 31-((($month-(($month<8)?1:0))%2)+(($month==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		
		// initialize day variable to zero, unless $weekpos is zero
		if ($weekpos == 0) $day = 1; else $day = 0;
		
		// initialize today's date variables for color change
		$timestamp = gmmktime() + $gc_user['user_timezone'] * 3600;
		$d = date('j', $timestamp); 
            $m = date('n', $timestamp); 
            $y = date('Y', $timestamp);
		
		// loop writes empty cells until it reaches position of 1st day of month ($wPos)
		// it writes the days, then fills the last row with empty cells after last day
		while($day <= $days) {
			
			$str .="<tr>\n";
	
			for($i=0;$i < 7; $i++) {
				
				if($day > 0 && $day <= $days) {
					
					$str .= "	<td class=\"";
					
					if (($day == $d) && ($month == $m) && ($year == $y))
						$str .= "today";
					else
						$str .= "day";
					
					$str .= "_minicell\" valign=\"top\"><span class=\"day_number\">";
					
					$str .= "".$day."";
					
					$str .= "</span><br>";
					if (!empty($eventdata[$day]["title"])){
					$eventcount = count($eventdata[$day]["title"]);
					}
					else
					{
					$eventcount = '0';
					}
					
					// write picture link if posting exists for day
					for($j=0;$j < $eventcount;$j++) {
						// skip these
						if (in_array($eventdata[$day]["type"][$j],reset_event_names())) continue;
						
						switch ($eventdata[$day]["type"][$j]) {
							case "birthday":
								//is a birthday
								$str .= '<a href=\"'.makelink('&amp;m='.$month.'&amp;d='.$day.$sid).'">';
								$str .= '<img src="'.$addon['image_url'] .'calendar/Icon-Birth.jpg" border="0" width="16" height="16"></a>';
								break;
							//Do anything else
							default:
							// Blacknight
								$str .= '<a href="'.makelink('&amp;id=' . utf8_decode($eventdata[$day]['id'][$j]) . $sid).'">';
								$tip = ''. $eventdata[$day]['title'][$j]." \n".getGCtext($eventdata[$day]['type'][$j])."\n". $eventdata[$day]['timestr'][$j] .'';
								$image = $addon['image_url'] .'calendar/Icon-'.$eventdata[$day]['type'][$j].'.png';
								$str .= gctt($tip,$image,getGCtext($eventdata[$day]['type'][$j]),'16','16');
								break;
						}
					}
	
					$str .= "</td>\n";
					$day++;
				} elseif($day == 0)  {
					$str .= "	<td class=\"empty_day_minicell\" valign=\"top\">&nbsp;</td>\n";
					$weekpos--;
					if ($weekpos == 0) $day++;
				} else {
					$str .= "	<td class=\"empty_day_minicell\" valign=\"top\">&nbsp;</td>\n";
				}
			}
			$str .= "</tr>\n\n";
		}
		
		$str .= "</table>\n\n";
		return $str;
	}

	function getDayNameHeader()
	{
		global $addon, $roster;
		
		// adjust day name order if weekstart not Sunday
		if ($addon['config']['WEEK_START'] != 0) {
			for($i=0; $i < $addon['config']['WEEK_START']; $i++) {
				$tempday = array_shift($roster->locale->act['abrvdays']);
				array_push($roster->locale->act['abrvdays'], $tempday);
			}
		}
		
		$s = "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n<tr>\n";
		
		foreach($roster->locale->act['abrvdays'] as $day) {
			$s .= "\t<td class=\"column_header\">&nbsp;$day</td>\n";
		}
	
		$s .= "</tr>\n\n";
		return $s;
	}
	function getNoteIcon($note)
{
	global $roster;

	$icon_value = '';
	if($note != '')
	{
		$icon_value = '<img src="'.$roster->config['img_url'].'note.gif" style="cursor:help;" class="membersRowimg" alt="'.$roster->locale->act['note'].'" '.makeOverlib(stripslashes($note),$roster->locale->act['note'],'',1).'>';
	}
	else
	{
		$icon_value = '<img src="'.$roster->config['img_url'].'no_note.gif" class="membersRowimg" alt="'.$roster->locale->act['note'].'">';
	}	
	return $icon_value;
}

function gctt($tip,$image,$place,$w,$h)
{
	global $roster;

	
$icon_value = '<img src="'.$image.'" width="'.$w.'" height="'.$h.'" style="cursor:help;" class="membersRowimg"  '.makeOverlib(stripslashes($tip),$place,'',2).'>';
	
	return $icon_value;
}


	function classswitcher( $class )
	{
	
            switch( $class )
            {
	           case 'D':
                        return "Druid";
                  break;
                  case 'H':
                        return "Hunter";
                  break;
                  case 'M':
                        return "Mage";
                  break;
                  case 'L':
                        return "Paladin";
                  break;
                  case 'P':
                        return "Priest";
                  break;
                  case 'R':
                        return "Rogue";
                  break;
                  case 'S':
                        return "Shaman";
                  break;
                  case 'K':
                        return "Warlock";
                  break;
                  case 'W':
                        return "Warrior";
                  break;
            }
      }
function getClassIcon($class)
{
	global $roster, $addon;
	
	if (!empty($class)){
	     $icon_name = $roster->locale->wordings['enUS']['class_iconArray'][$class];
	     $alt = array_keys($roster->locale->act['class_to_en'],$class);
	     $icon_value = '<img class="membersRowimg" width="16" height="16" src="'.ROSTER_PATH.'img/class/'.$icon_name.'.jpg" alt="'.$alt[0].'" /> ';
	}
      else
	{
	$icon_value = '';
	}
	return $icon_value;
}
	function getEventDataArray($month, $year, $auth = 0)
	{
		global $roster, $addon;
		
		//////////////////////////////////////////////////////////////////////
		// Get Group Calendar Events
		//////////////////////////////////////////////////////////////////////
		$starttime = '';
		//First we get the events that DONT have set start times becuase they will
		// not be adjusted for the current time zone
		$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, type, description, duration, ";
		if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
			$sql .= "TIME_FORMAT(`start`, '%l:%i%p') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
		} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
			$sql .= "TIME_FORMAT(`start`, '%H:%i') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
		} else {
			echo "Bad time display format, check your configuration.";
		}
		$sql .= "TIME_FORMAT(`start`, '%H:%i:%s') AS s_time, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
		$sql .= "DAYOFMONTH(`start`) AS d, MONTH(`start`) AS m, YEAR(`start`) AS y ";
		$sql .= "FROM ". CALENDAR_TABLE ." WHERE ";
		$sql .= "MONTH(`start`) = $month AND YEAR(`start`) = $year ";
		$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')='00:00:25' ";
		$sql .= "ORDER BY `start`";
            $result = $roster->db->query($sql);
		//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
		
		$eventdata = array();
		
		while($row = mysql_fetch_array($result)) {
			$eventdata[$row["d"]]["id"][] = $row["id"];
			if ($row['title']=="") $row['title'] = getGCtext($row['type']);

			if (strlen($row["title"]) > $addon['config']['TITLE_CHAR_LIMIT'])
				$eventdata[$row["d"]]["title"][] = substr(stripslashes($row["title"]), 0, TITLE_CHAR_LIMIT) . "...";
			else
				$eventdata[$row["d"]]["title"][] = stripslashes($row["title"]);
			
			if (!($row["s_time"] == "00:00:25" && $row["e_time"] == "00:00:25")) {
				if ($row["s_time"] == "00:00:25")
					$starttime = "- -";
				else
					$starttime = $row["stime"];
					
				if ($row["e_time"] == "00:00:25" || $row["e_time"] == $row["s_time"])
					$endtime = "";
				else
					$endtime = " - ".$row["etime"];
				
				$timestr = "($starttime$endtime)&nbsp;";
			} else {
				$timestr = "<br>";
			}
	           
	            $eventdata[$row["d"]]["stime"][] = $starttime;
			$eventdata[$row["d"]]["timestr"][] = $timestr;
			$eventdata[$row["d"]]["type"][] = $row["type"];
			$eventdata[$row["d"]]["description"][] = $row["description"];
		}

		//Check to see if user specified timezone exists, if not use default
		if (!isset($gc_user['user_timezone'])) $gc_user['user_timezone'] = $addon['config']['CURR_TIME_OFFSET'];
		$t_offset = $gc_user['user_timezone'] * 3600;
		//Now we get the Events that HAVE set start times becuase they will
		// need to be adjusted for the current time zone
		$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, type, description, duration, ";
		if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%l:%i%p') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
		} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%H:%i') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
		} else {
			echo "Bad time display format, check your configuration.";
		}
		$sql .= "TIME_FORMAT(`start`, '%H:%i:%s') AS s_time, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
		$sql .= "DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS d, MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS m, YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS y ";
		$sql .= "FROM ". CALENDAR_TABLE ." WHERE ";
		$sql .= "MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $month AND YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $year ";
		$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')!='00:00:25' ";
		$sql .= "ORDER BY `start`";

		$result = $roster->db->query($sql); //$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
		
		while($row = mysql_fetch_array($result)) {
			$eventdata[$row["d"]]["id"][] = $row["id"];
			if ($row['title']=="") $row['title'] = getGCtext($row['type']);
	
			if (strlen($row["title"]) > $addon['config']['TITLE_CHAR_LIMIT'])
				$eventdata[$row["d"]]["title"][] = substr(stripslashes($row["title"]), 0, $addon['config']['TITLE_CHAR_LIMIT']) . "...";
			else
				$eventdata[$row["d"]]["title"][] = stripslashes($row["title"]);
			
			if (!($row["s_time"] == "00:00:25" && $row["e_time"] == "00:00:25")) {
				if ($row["s_time"] == "00:00:25")
					$starttime = "- -";
				else
					$starttime = $row["stime"];
					
				if ($row["e_time"] == "00:00:25" || $row["e_time"] == $row["s_time"])
					$endtime = "";
				else
					$endtime = " - ".$row["etime"];
				
				$timestr = "($starttime$endtime)&nbsp;";
			} else {
				$timestr = "<br>";
			}
	                 $eventdata[$row["d"]]["stime"][] = $starttime;
			$eventdata[$row["d"]]["timestr"][] = $timestr;
			$eventdata[$row["d"]]["type"][] = $row["type"];
			$eventdata[$row["d"]]["description"][] = $row["description"];
		}
		
		return $eventdata;
	}

	function getFirstDayOfMonthPosition($month, $year)
	{
	global $roster, $addon;
		$weekpos = date("w",mktime(0,0,0,$month,1,$year));
		
		// adjust position if weekstart not Sunday
		if ($addon['config']['WEEK_START'] != 0)
			if ($weekpos < $addon['config']['WEEK_START'])
				$weekpos = $weekpos + 7 - $addon['config']['WEEK_START'];
			else
				$weekpos = $weekpos - $addon['config']['WEEK_START'];
		
		return $weekpos;
	}
	
	function getResetEvents($m,$y)
	{
		if (! class_exists("xmlParser"))
			include("xmlparse.php");
		$l = 'en';
		$xmlp = new xmlParser;
		$xmlp->parse("http://www.mediocrityinmotion.com/RSS/dungeons.php?month=".$m."&year=".$y."&lang=".$l."");
		
		$file = $xmlp->output;
		$file = $file[0]['child'];
		for($i=0;$i<count($file);$i++) {
			$d = $file[$i]['attrs']['NUMBER'];
			$items = $file[$i]['child'];
			for($j=0;$j<count($items);$j++) {
				$abrv = $items[$j]['attrs']['ID'];
				$inst = $items[$j]['child'];
				$name = $icon = $game = $url = $reset = "";
				for($k=0;$k<count($inst);$k++){
					if($inst[$k]['name'] == "NAME") $name = $inst[$k]['content'];
					if($inst[$k]['name'] == "ICON") $icon = $inst[$k]['content'];
					//if($inst[$k]['name'] == "URL") $url = $inst[$k]['content'];
					if($inst[$k]['name'] == "RESET") $reset = $inst[$k]['content'];
					if($inst[$k]['name']=="GAME_VER") $game = $inst[$k]['content'];
				}
				$eventdata[$d]['Name'][] = $name;
				$eventdata[$d]['Icon'][] = $icon;
				//$eventdata[$d]['URL'][] = $url;
				$eventdata[$d]['Time'][] = $reset;
				$eventdata[$d]['Type'][] = $abrv;
				$eventdata[$d]['GAME'][] = $game;
			}
		}
		return $eventdata;
	}
	
	function get_calendar_update_time()
	{
		global $addon, $roster;
		
		//Check to see if user specified timezone exists, if not use default
		if (!isset($gc_user['user_timezone'])) $gc_user['user_timezone'] = $addon['config']['CURR_TIME_OFFSET'];
		$t_offset = $gc_user['user_timezone'] * 3600;

		$sql = "SELECT * FROM ". OTHERINFO_TABLE ." WHERE id='upload_time'";
		$result = $roster->db->query($sql);//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());

		$row = mysql_fetch_array($result);
		if (!$row) return "";	// No data in the table

		$ts = $row['value'];
		$ts = localtime($ts+$t_offset,true);
		$ts['tm_year']+= 1900;
		
		$ret_str = $ts['tm_mday'] ." ". $roster->locale->act['months_short'][ $ts['tm_mon'] ] ." ". $ts['tm_year'] ." ";
		
		if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
			if ($ts['tm_hour'] > 12) {
				$ts['tm_hour'] -= 12;
				$ret_str .= $ts['tm_hour'] .":";
				if ($ts['tm_min'] < 10) $ret_str .= "0";
				$ret_str .= $ts['tm_min'] ." ". $roster->locale->act['timePM'];
			} else {
				$ret_str .= $ts['tm_hour'] .":";
				if ($ts['tm_min'] < 10) $ret_str .= "0";
				$ret_str .= $ts['tm_min'] ." ". $roster->locale->act['timeAM'];
			}
		} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
			if ($ts['tm_hour'] < 10) $ret_str .= "0";
			$ret_str .= $ts['tm_hour'] .":";
			if ($ts['tm_min'] < 10) $ret_str .= "0";
			$ret_str .= $ts['tm_min'];
		} else {
			if ($ts['tm_hour'] < 10) $ret_str .= "0";
			$ret_str .= $ts['tm_hour'] .":";
			if ($ts['tm_min'] < 10) $ret_str .= "0";
			$ret_str .= $ts['tm_min'];
		}

		return $ret_str;
	}
	
	include_once("helper_functions.php");
	
	$month 	= (isset($_GET['month'])) ? (int) $_GET['month'] : date("n");
	$year 	= (isset($_GET['year'])) ? (int) $_GET['year'] : date("Y");

	// set month and year to present if month and year not received from query string
	$m = (!$month) ? date("n") : $month;
	$y = (!$year) ? date("Y") : $year;

	$scrollarrows	= scrollArrows($m, $y);
	
	$tooltipHolder = "
<div id=\"contents\">
	<table cellspacing = \"0\" cellpadding = \"0\" border = \"0\" width = \"100%\">
		<tr>
			<td><img src = \"images/blank.gif\" width = \"1\" height = \"1\"></td>
			<td bgcolor = \"#000000\"></td>
			<td><img src = \"images/blank.gif\" width = \"1\" height = \"1\"></td>
		</tr>
		<tr>
			<td bgcolor = \"#000000\"></td>
			<td>
				<table cellspacing = \"0\" cellpadding = \"0\" border = \"0\" width = \"100%\">
				  <tr>
					<td width = \"1\" height = \"1\" bgcolor = \"#000000\"></td>
					<td bgcolor = \"#D5D5D7\" height = \"1\"><img src = \"images/blank.gif\" width = \"1\" height = \"1\"></td>
					<td width = \"1\" height = \"1\" bgcolor = \"#000000\"></td>
				  </tr>
				  <tr>
					<td bgcolor = \"#A5A5A5\" width = \"1\"><img src = \"images/blank.gif\" width = \"1\" height = \"1\"></td>
					<td valign = \"top\" class = \"trans_div\"><div id=\"tooltipText\"></div></td> 
					<td bgcolor = \"#A5A5A5\" width = \"1\"><img src = \"images/blank.gif\" width = \"1\" height = \"1\"></td>
				  </tr>
				  <tr>
					<td width = \"1\" height = \"1\" bgcolor = \"#000000\"></td>
					<td bgcolor = \"#4F4F4F\"><img src = \"images/blank.gif\" width = \"1\" height = \"2\"></td>
					<td width = \"1\" height = \"1\" bgcolor = \"#000000\"></td>
				  </tr>
				</table>
			</td>
			<td bgcolor = \"#000000\"></td>
		</tr>
		<tr>
			<td><img src = \"images/blank.gif\" width = \"1\" height = \"1\"></td>
			<td bgcolor = \"#000000\"></td>
			<td><img src = \"images/blank.gif\" width = \"1\" height = \"1\"></td>
		</tr>
	</table>
</div>
<script type=\"text/javascript\" src=\"tooltip.js\"></script>";

function makeContainerTop($title,$w=0,$h=0) {
		if (!$h) {$h = "";}
		else {$h = "height=\"$h\""; }
		if (!$w) {$w = "width=\"100%\""; }
		else {$w = "width=\"$w\""; }
		$res = "";
		$res .= "<table border=\"0\" $w $h cellpadding=\"0\" cellspacing=\"0\" class=\"ContainerTable\">\n";
		$res .= "<tr>\n";
		$res .= "<td colspan=\"3\">\n";
		$res .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
		$res .= "<tr>\n";
		$res .= "<td width=\"24\"><img src=\"images/container-1.jpg\" width=\"24\" height=\"25\" border=\"0\"></td>\n";
		$res .= "<td class=\"ContainerTitle\" align=left>$title</td>\n";
		$res .= "<td width=\"11\"><img src=\"images/container-3.jpg\" width=\"11\" height=\"25\"></td>\n";
		$res .= "</tr>\n";
		$res .= "</table>\n";
		$res .= "</td>\n";
		$res .= "</tr>\n";
		$res .= "<tr>\n";
		$res .= "<td class=\"ContainerLeft\" width=\"3\"><img src=\"images/blank.gif\"></td>\n";
		$res .= "<td class=\"ContainerContent\" width=\"100%\">\n";
		return $res;
	};
?>
