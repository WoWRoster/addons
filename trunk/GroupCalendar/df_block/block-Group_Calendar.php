<?php
/*********************************************
  CPG Dragonfly CMS - Group Calendar Block
  ********************************************
  Copyright (c)¸ 2004 - 2005 by CPG-Nuke Dev Team
  http://www.dragonflycms.com

  Dragonfly is released under the terms and conditions
  of the GNU GPL version 2 or any later version
  
  Displays the next 7 days of events on your Calendar
  
********************************************************/
if (!defined('CPG_NUKE')) { exit; }
global $db, $prefix;
$disabled = false;
define ( 'WOSTERDF_PATH', 'modules/roster/');
if ($disabled != True){

$content .= '<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script type="text/javascript" src="'.WOSTERDF_PATH.'js/overlib.js"></script>
<script type="text/javascript" src="'.WOSTERDF_PATH.'\js/overlib_hideform.js"></script>
';


define('IN_ROSTER',True);
include_once (''.WOSTERDF_PATH.'addons\GroupCalendar\locale\block-enUS.php');
include ''.WOSTERDF_PATH.'lib\cmslink.lib.php';

//echo $lang['gcType']['SlavePensH'].'<br>';
define('CALENDAR_TABLE',$prefix.'_roster_roster_addons_groupcalendar_info');
	
define('ATTENDANCE_TABLE',$prefix.'_roster_roster_addons_groupcalendar_attend');
	
define('OTHERINFO_TABLE',$prefix.'_roster_roster_addons_groupcalendar_other');

class functions
      {

      var $tooltips = array();
      var $tooltipss = 0;
function setTooltip( $var , $contentt )
{
	global $tooltips;

	if( !isset($tooltips[$var]) )
	{
		$contentt = str_replace("\n",'',$contentt);
		$contentt = addslashes($contentt);
		$contentt = str_replace('</','<\\/',$contentt);
		$contentt = str_replace('/>','\\/>',$contentt);

		$tooltips += array($var=>$contentt);
	}
}


function makeOverlib( $tooltip , $caption='' , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' )
{
	global $roster, $tooltips, $tooltipss;

	//$tooltip = stripslashes($tooltip);

	// Use main locale if one is not specified
	if( $locale == '' )
	{
		$locale = $roster->config['locale'];
	}

	// Detect caption text and display accordingly
	$caption_mode = 1;
	if( $caption_color != '' )
	{
		if( strlen($caption_color) > 6 )
		{
			$caption_color = substr( $caption_color, 2 );
		}
	}

	if( $caption != '' )
	{
		if( $caption_color != '' )
		{
			$caption = '<span style="color:#' . $caption_color . ';">' . $caption . '</span>';
		}

		$caption = ",CAPTION,'" . addslashes($caption) . "'";

		$caption_mode = 0;
	}

	switch ($mode)
	{
		case 0:
			$tooltip = colorTooltip($tooltip,$caption_color,$locale,$caption_mode);
			break;

		case 1:
			$tooltip = cleanTooltip($tooltip,$caption_color,$caption_mode);
			break;

		case 2:
			break;

		default:
			$tooltip = colorTooltip($tooltip,$caption_color,$locale,$caption_mode);
			break;
	}
      $this->tooltipss = ($this->tooltipss +1 );
      //echo $this->tooltipss;
	$num_of_tips = $this->tooltipss;

	//setTooltip($num_of_tips,$tooltip);

	return 'onmouseover="return overlib(\''.$tooltip .'\''. $caption . $extra_parameters . ');" onmouseout="return nd();"';
}	

function gctt($tip,$image,$place,$w,$h)
{

	
$icon_value = '<img src="'.$image.'" width="'.$w.'" height="'.$h.'" style="cursor:help;" class="membersRowimg"  '.$this->makeOverlib(stripslashes($tip),$place,'',2).">\n\n";
	
	return $icon_value;
}


function getEventDataArray($month, $year, $auth = 0)
	{
	global $db, $prefix,$wosterdf_path;	
		
		//////////////////////////////////////////////////////////////////////
		// Get Group Calendar Events
		//////////////////////////////////////////////////////////////////////
		
		//First we get the events that DONT have set start times becuase they will
		// not be adjusted for the current time zone
		$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, type, description, duration, ";
		$sql .= "TIME_FORMAT(`start`, '%l:%i%p') AS stime, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
		
		$sql .= "TIME_FORMAT(`start`, '%H:%i:%s') AS s_time, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
		$sql .= "DAYOFMONTH(`start`) AS d, MONTH(`start`) AS m, YEAR(`start`) AS y ";
		$sql .= "FROM ". CALENDAR_TABLE ." WHERE ";
		$sql .= "MONTH(`start`) = $month AND YEAR(`start`) = $year ";
		$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')='00:00:25' ";
		$sql .= "ORDER BY `start`";
            $result = $db->sql_query($sql);
		//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
		
		$eventdata = array();
		
		while($row = mysql_fetch_array($result)) {
			$eventdata[$row["d"]]["id"][] = $row["id"];
			if ($row['title']=="") $row['title'] = $lang['gcType'][$row['type']];

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

			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%l:%i%p') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";

		$sql .= "TIME_FORMAT(`start`, '%H:%i:%s') AS s_time, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
		$sql .= "DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS d, MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS m, YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS y ";
		$sql .= "FROM ". CALENDAR_TABLE ." WHERE ";
		$sql .= "MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $month AND YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $year ";
		$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')!='00:00:25' ";
		$sql .= "ORDER BY `start`";

		$result = $db->sql_query($sql); //$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
		
		while($row = mysql_fetch_array($result)) {
			$eventdata[$row["d"]]["id"][] = $row["id"];
			if ($row['title']=="") $row['title'] = $lang['gcType'][$row['type']];
	
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
		function getResetEvents($m,$y)
	{
	global $wosterdf_path;
		if (! class_exists("xmlParser"))
			require (WOSTERDF_PATH."addons/GroupCalendar/guild/include/xmlparse.php");
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


}
$functions = new functions;
	
$timestamp = gmmktime() + $gc_user['user_timezone'] * 3600;
$d = date("j", $timestamp); 
$m = date("n", $timestamp); 
$y = date("Y", $timestamp);	

$eventdata = $functions->getEventDataArray($m, $y, $auth);


$resetEvents = $functions->getResetEvents($m,$y);
//echo '<pre>';
//print_r($eventdata);
//echo '</pre>';

$content .= '<table width="100%">
<tr>
<td align=center>This Weeks Events<br><hr></td>
</tr>';

for($day=$d;$day < ($d + 7);$day++) {
$str = null;
$str = '';
$content .= '<tr>
<td>'.$lang['months'][$m].' '.$day.'<br>';

      for($j=0;$j < 1 ;$j++) {
      
      if (!empty($resetEvents[$day]['Name'])){
				$resetnum = count($resetEvents[$day]['Name']);
				}
				else
				{
				$resetnum = 0;
				}
				for ($x=0;$x<$resetnum;$x++) {
					
				if ($resetEvents[$day]['GAME'][$x] == 'TBC')
                              {	
                                    $tip = ''. addslashes(utf8_decode($resetEvents[$day]['Name'][$x])).$lang['gcType']['reset_time']." Reset <br>". $resetEvents[$day]['Time'][$x] .'';
                                    $image = $resetEvents[$day]['Icon'][$x];
                                    $str .= $functions->gctt(addslashes($tip),$image,$lang['gcType'][$resetEvents[$day]['Name'][$x]],20,20);
					}				
					
					}$str .= "<br>\n\n";
				
					
					
      if (!empty($eventdata[$day]['title'])){
                                    switch ($eventdata[$day]["type"][$j]) {
						      case "birthday":
								//is a birthday
								$str .= "<span class=\"title_txt\">";
								$str .= $eventdata[$day]["title"][$j] . "</span><br>";
								break;
							// Otherwise, it is an event so show it
							default:
								
                                                $str .= "<a href=\"".makelink()."&id=" . utf8_decode($eventdata[$day]["id"][$j]) . "$sid\">\n\n";
								$tip = ''. addslashes($eventdata[$day]['title'][$j])." <br>".$eventdata[$day]["description"][$j]."<br>". $eventdata[$day]['timestr'][$j] .'';
								$image = WOSTERDF_PATH."addons\GroupCalendar\images/calendar/Icon-".$eventdata[$day]["type"][$j].".png";
								$str .= $functions->gctt(addslashes($tip),$image,$eventdata[$day]['title'][$j],32,32);
								$str .= '</span><span class=\"title_txt\">'.utf8_decode($lang['gcType'][$eventdata[$day]["type"][$j]]) . "</a></span><div align=\"right\" class=\"time_str\">" . $eventdata[$day]["timestr"][$j] ."</div>\n\n";
								break;
						}
					}
					
					}$content .=	$str;
			$content .= '<hr>
</td></tr>';
				}
$content .= '</table>';

}
