<?php // Include all the settings and functions

	include_once("include/helper_functions.php");
	include_once("include/calendar_functions.php");



	//Check to see if user specified timezone exists, if not use default
	if (!isset($gc_user['user_timezone'])) $gc_user['user_timezone'] = $addon['config']['CURR_TIME_OFFSET'];
	$t_offset = $gc_user['user_timezone'] * 3600;


	if ($_GET['id']) {
		$eid = $_GET['id'];
		$order = isset($_GET['order'])?$_GET['order']:"level ASC, classcode, guild, name";
		$order = str_replace(";","",$order);
		
		$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
		$sql.= "creator, type, duration, `description`, guildonly, minlevel, maxlevel, limits, maxattend, ";
		if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%l:%i%p') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
		} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%H:%i') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
		} else {
			echo "Bad time display format, check your configuration.";
		}
		$sql .= "TIME_FORMAT(start, '%H:%i:%s') AS s_time, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
		$sql .= "DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS d, MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS m, YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS y ";
		$sql .= "FROM ". CALENDAR_TABLE ." WHERE id='". mysql_escape_string($_GET['id']) ."'";

		$result = $roster->db->query($sql); //$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
		$event = mysql_fetch_array($result);
		if ($event['s_time'] == "00:00:25") {
			//This event had no specified Start Time, so we need to redo the query to get
			// the times without the TimeZone offset
			$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
			$sql.= "creator, type, duration, guildonly,`description`, minlevel, maxlevel, limits, maxattend, ";
			if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
				$sql .= "TIME_FORMAT(`start`, '%l:%i%p') AS stime, ";
				$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
			} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
				$sql .= "TIME_FORMAT(`start`, '%H:%i') AS stime, ";
				$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
			} else {
				echo "Bad time display format, check your configuration.";
			}
			$sql .= "TIME_FORMAT(start, '%H:%i:%s') AS s_time, ";
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
			$sql .= "DAYOFMONTH(`start`) AS d, MONTH(`start`) AS m, YEAR(`start`) AS y ";
			$sql .= "FROM ". CALENDAR_TABLE ." WHERE id='". mysql_escape_string($_GET['id']) ."'";
	
			$result = $roster->db->query($sql);//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
			$event = mysql_fetch_array($result);
		}
		
		if ($event['s_time'] == "00:00:25") $timestr = "";
		elseif ($event['s_time'] == $event['e_time']) $timestr = $event['stime'];
		else $timestr = $event['stime'] ." - ". $event['etime'];
		$event['timestr'] = $timestr;
		
		if ($event['title']=="") $event['title'] = getGCtext($event['type']);
		
		$sql = "SELECT * FROM ". ATTENDANCE_TABLE ." WHERE eid='". mysql_escape_string($_GET['id']) ."' AND status='Y' ORDER BY `classcode`";
		$y_attendees = $roster->db->query($sql);//,$gc_database['connection']);
		$y_attendees_n = $roster->db->num_rows($y_attendees);
		$sql = "SELECT * FROM ". ATTENDANCE_TABLE ." WHERE eid='". mysql_escape_string($_GET['id']) ."' AND status='N' ORDER BY `classcode`";
		$n_attendees = $roster->db->query($sql);//,$gc_database['connection']);
		$n_attendees_n = $roster->db->num_rows($n_attendees);
		$sql = "SELECT * FROM ". ATTENDANCE_TABLE ." WHERE eid='". mysql_escape_string($_GET['id']) ."' AND status='S' ORDER BY `classcode`";
		$s_attendees = $roster->db->query($sql);//,$gc_database['connection']);
		$s_attendees_n = $roster->db->num_rows($s_attendees);
		
		$month = $event['m'];
		$day = $event['d'];
		$year = $event['y'];
	} elseif ($_GET['d']) {
		$eid = "";
		$month 	= (int) $_GET['m'];
		$day	= (int) $_GET['d'];
		$year 	= (int) $_GET['y'];
	} else {
		// set month and year to present if month
		// and year not received from query string
		$eid = "";
		$month = date("n",gmmktime()+$t_offset);
		$day = date("j",gmmktime()+$t_offset);
		$year = date("Y",gmmktime()+$t_offset);
	}
	$prevDay = dateadd($month,$day,$year,"-1","day");
	$nextDay = dateadd($month,$day,$year,"1","day");
	
	////// Get other events happening this day
	$skipme = reset_event_names();
	$dayEvents = array();
	//First get the ones without a start time
	$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
	$sql.= "creator, type, duration, `description`, minlevel, maxlevel, limits, maxattend, ";
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
	$sql .= "FROM ". CALENDAR_TABLE ." WHERE DAYOFMONTH(`start`) = $day AND MONTH(`start`) = $month AND YEAR(`start`) = $year ";
	$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')='00:00:25' AND id != '". $event['id'] ."' ";
	$sql .= "ORDER BY `start` ASC";
	
	$result = $roster->db->query($sql);//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());

	while ($row = mysql_fetch_array($result)) {
		if ($row['s_time'] == "00:00:25") $timestr = "";
		elseif ($row['s_time'] == $row['e_time']) $timestr = $row['stime'];
		else $timestr = $row['stime'] ." - ". $row['etime'];
		$row['timestr'] = $timestr;
		if ($row['title']=="") $row['title'] = getGCtext($row['type']);
		
		if (! in_array($row['type'],$skipme)) $dayEvents[] = $row;
	}
	//Now get the ones that DO have a start time
	$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
	$sql.= "creator, type, duration, `description`, minlevel, maxlevel, limits, maxattend, ";
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
	$sql .= "FROM ". CALENDAR_TABLE ." WHERE DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $day AND MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $month AND YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $year ";
	$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')!='00:00:25' AND id != '". $event['id'] ."' ";
	$sql .= "ORDER BY start ASC";
	
	$result = $roster->db->query($sql);//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());

	while ($row = mysql_fetch_array($result)) {
		if ($row['s_time'] == "00:00:25") $timestr = "";
		elseif ($row['s_time'] == $row['e_time']) $timestr = $row['stime'];
		else $timestr = $row['stime'] ." - ". $row['etime'];
		$row['timestr'] = $timestr;
		if ($row['title']=="") $row['title'] = getGCtext($row['type']);
	
		if (! in_array($row['type'],$skipme)) $dayEvents[] = $row;
	}

?>
<?php echo  $tooltipHolder ?>
<?php javaScript() ?>
	<form name="monthYear">
	<input type="hidden" name="_month" value="<?php echo $month?>">
	<input type="hidden" name="_year" value="<?php echo $year?>">
	</form>
<?php print border('spurple','start',$roster->locale->act['event_calendar']); ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><a href="<?php echo makelink('&amp;m='.$prevDay["mon"].'&amp;d='.$prevDay["day"].'&amp;y='.$prevDay["year"]);?>"><img src="<?php echo $addon['image_url']  ?>calendar/leftArrow.gif" border="0"></a></td>
	<td align=center nowrap><p class="GCH1"><a href="<?php echo makelink(); ?>"><?php echo  $roster->locale->act['months'][$month-1] ?> <?php echo  $day ?>, <?php echo  $year ?></p></a></td>
	<td align="right"><a href="<?php echo makelink('&amp;m='.$nextDay["mon"].'&amp;d='.$nextDay["day"].'&amp;y='.$nextDay["year"]);?>"><img src="<?php echo $addon['image_url']  ?>calendar/rightArrow.gif" border="0"></a></td>
  </tr>
</table>
<?php if ($_GET['id']) { ?>
	<table border="0" width="100%">
	<tr>
	<td valign="top" width="400">
	<?php 
      //print makeContainerTop(utf8_decode($event['title']) ." ". $roster->locale->act['posted_by'] ." ". utf8_decode($event['creator']),"100%"); 
      echo border('sgreen','start',utf8_decode($event['title']) ." ". $roster->locale->act['posted_by'] ." ". utf8_decode($event['creator']));
      ?>
      <table border="0" width="100%">
	<tr>
	<td valign="top" width="400">
	<p class="GCH2"><img src="<?php echo getGCimage($event['type'], "addons/".$addon['basename']."/images/calendar/"); ?>" border="0" style="float:right;">
	<?php echo  $roster->locale->act['event_info'] ?></p>
	<p><?php echo  utf8_decode($event['title']) ?><br>
	<?php echo  $roster->locale->act['created_by']?> <?php echo  utf8_decode($event['creator']) ?></p>
	<table border="0" width="400" cellpadding="2" cellspacing="0">
	  <tr>
		<td valign="top" width="100%">
		  <p><?php echo  getGCtext($event['type']) ?><br><br>
		  <?php echo  $roster->locale->act['months_short'][$event['m'] -1]?> <?php echo  $event['d'] ?>, <?php echo  $event['y'] ?> <?php echo  $event['timestr'] ?>
		  <?php if ($event['minlevel'] || $event['maxlevel']) { 
				echo "<br>";
				if ($event['minlevel'] == $event['maxlevel']) echo $roster->locale->act['Level'] ." ". $event['minlevel'] ." ". $roster->locale->act['Only'];
				elseif (! $event['maxlevel'] ) echo $roster->locale->act['least_level'] ." ". $event['minlevel'];
				elseif (! $event['minlevel'] ) echo $roster->locale->act['below_level'] ." ". $event['maxlevel'];
				else echo $roster->locale->act['Levels'] ." ". $event['minlevel'] ." ". $roster->locale->act['to'] ." ". $event['maxlevel'];
			 } ?>
		  <?php if ($event['guildonly'] != "") {
		  		
				echo $roster->locale->act['GuildRestricted'] ." ". $event['guildonly'];
			 } ?></p>
		  <p><?php echo  utf8_decode($event['description']) ?></p>
		</td>
		<td width="8">&nbsp;</td>
		<td valign="top" class="membersRow2">
		  <?php if ($event['maxattend'] != "") print(str_replace(" ","&nbsp;",$roster->locale->act['max_attend']) .":&nbsp; ". $event['maxattend'] ."<br>". $event['limits']); ?>
		</td>
	  </tr>
	</table>
	<?php if (! in_array($event['type'],array("Vacation","Birth"))) { ?>
		<p class="GCH2"><?php echo  $roster->locale->act['attend_info'] ?></p>
		<table border="0" cellspacing="0" cellpadding="2" width="100%">
		  <tr>
			<td colspan=7><b><?php echo  $roster->locale->act['conf_yes'] ?> (<?php echo $y_attendees_n ?>)</b></td>
		  </tr>
		  <tr class="membersRowColor2">
			<th class="membersRowCell"><?php echo $roster->locale->act['level_abrv']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Name']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Class_txt']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Race_txt']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Guild']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Comment']?></td>
		  </tr>
		  <?php
		  $stripe_counter=0;
		  while ($y_attendes = $roster->db->fetch($y_attendees)){
		  $stripe_counter = ($stripe_counter % 2) + 1;
		$stripe_class = ' class="membersRowColor'.$stripe_counter.'"';
		if ( !empty($y_attendes['racecode']) && $y_attendes['classcode'] != '?'){
		    $race_txt = $roster->locale->act['Race'][$y_attendes['racecode']];
		}
		else
		{
		    $race_txt = '';
		}
		if ( !empty($y_attendes['classcode']) && $y_attendes['classcode'] != '?'){
		    $class_txt = $roster->locale->act['Class'][$y_attendes['classcode']];
		    $class_cd = classswitcher($y_attendes['classcode']);
		}
		else
		{
		    $class_txt = '';
		    $class_cd = '';
		}
		  echo'<tr '.$stripe_class.'>
			<td class="membersRowCell">'.$y_attendes['level'].'</td>
			<td class="membersRowCell">'.utf8_decode($y_attendes['name']).'</td>
			<td class="membersRowCell">'.getClassIcon($class_cd).'<span class = "class'.$class_txt.'txt">'.$class_txt.'</span></td>
			<td class="membersRowCell">'.$race_txt.'</td>
			<td class="membersRowCell">'.utf8_decode($y_attendes['guild']).'</td>
			<td class="membersRowCell">'.getNoteIcon($y_attendes['comment']).'</td>
		  </tr>
		  ';
		  }
		  ?>
		  <tr>
			<td class="GCattend">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan=7><b><?php echo  $roster->locale->act['standby'] ?> (<?php echo $s_attendees_n ?>)</b></td>
		  </tr>
		  <tr class="membersRowColor2">
			
			<th class="membersRowCell"><?php echo $roster->locale->act['level_abrv']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Name']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Class_txt']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Race_txt']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Guild']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Comment']?></td>
		  </tr>
		  <?php
		  $stripe_counter=0;
		  while ($s_attendes = $roster->db->fetch($s_attendees)){
		  $stripe_counter = ($stripe_counter % 2) + 1;
		$stripe_class = ' class="membersRowColor'.$stripe_counter.'"';
		if ( !empty($s_attendes['racecode']) && $s_attendes['classcode'] != '?'){
		    $race_txt = $roster->locale->act['Race'][$s_attendes['racecode']];
		}
		else
		{
		    $race_txt = '';
		}
		  if ( !empty($s_attendes['classcode']) && $y_attendes['classcode'] != '?'){
		$class_txt = $roster->locale->act['Class'][$s_attendes['classcode']];
		$class_cd = classswitcher($s_attendes['classcode']);
		}
		else
		{
		$class_txt = '';
		$class_cd = '';
		}
		  echo'<tr '.$stripe_class.'>
			<td class="membersRowCell">'.$s_attendes['level'].'</td>
			<td class="membersRowCell">'.utf8_decode($s_attendes['name']).'</td>
			<td class="membersRowCell">'.getClassIcon($class_cd).'<span class = "class'.$class_txt.'txt">'.$class_txt.'</span></td>
			<td class="membersRowCell">'.$race_txt.'</td>
			<td class="membersRowCell">'.utf8_decode($s_attendes['guild']).'</td>
			<td class="membersRowCell">'.getNoteIcon($s_attendes['comment']).'</td>
		  </tr>
		  ';
		  }
		  ?>
		  <tr>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan=7><b><?php echo  $roster->locale->act['conf_no'] ?> (<?php echo  $n_attendees_n ?>)</b></td>
		  </tr>
		  <tr class="membersRowColor2">
			
			<th class="membersRowCell"><?php echo $roster->locale->act['level_abrv']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Name']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Class_txt']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Race_txt']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Guild']?></td>
			<th class="membersRowCell"><?php echo $roster->locale->act['Comment']?></td>
		  </tr>
		  <?php
		  $stripe_counter=0;
		  while ($n_attendes = $roster->db->fetch($n_attendees)){
		  $stripe_counter = ($stripe_counter % 2) + 1;
		$stripe_class = ' class="membersRowColor'.$stripe_counter.'"';
		if ( !empty($n_attendes['racecode']) && $n_attendes['classcode'] != '?'){
		    $race_txt = $roster->locale->act['Race'][$n_attendes['racecode']];
		}
		else
		{
		    $race_txt = '';
		}
		
		    if ( !empty($s_attendes['classcode']) && $y_attendes['classcode'] != '?'){
		$class_txt = $roster->locale->act['Class'][$n_attendes['classcode']];
		$class_cd = classswitcher($n_attendes['classcode']);
		}
		else
		{
		$class_txt = '';
		$class_cd = '';
		}
		  echo'<tr '.$stripe_class.'>
			<td class="membersRowCell">'.$n_attendes['level'].'</td>
			<td class="membersRowCell">'.utf8_decode($n_attendes['name']).'</td>
			<td class="membersRowCell">'.getClassIcon($class_cd).'<span class = "class'.$class_txt.'txt">'.$class_txt.'</span></td>
			<td class="membersRowCell">'.$race_txt.'</td>
			<td class="membersRowCell">'.utf8_decode($n_attendes['guild']).'</td>
			<td class="membersRowCell">'.getNoteIcon($n_attendes['comment']).'</td>
		  </tr>
		  ';
		  }
		  ?>
		</table>
		</tr></table>
	<?php } // close the attendance if statement ?>
	<?php print border('sgreen','end',''); ?>
	</td>
	<td width="2%">&nbsp;</td>
	<td valign="top" width="35%">

	<?php 
      print border('sblue','start',''. $roster->locale->act['months'][$month-1] .' '. $year .''); 
      
      ?>
	  <table border="0" cellpadding="0" cellspacing="0" bgcolor="#000000" align="center">
		<tr>
		  <td>
	<?php echo writeMiniCalendar($month,$year); ?>
		  </td>
		</tr>
		<tr>
		<td>
		<font size="-1"><?php echo $roster->locale->act['Last_Updated']?> <?php echo get_calendar_update_time() ?></font>
		</td>
		</tr>
	  </table>
	  <?php print border('sblue','end',''); ?>
<br>

	  
		
	<?php if (count($dayEvents) > 0) { ?>
		<?php print border('syellow','start',$roster->locale->act['Other_Events_Today']); ?>
			<table border="0">
			<?php for ($i=0;$i<count($dayEvents);$i++) { ?>
			  <tr>
				<td valign="top"><a href="<?php echo makelink('&amp;id='.$dayEvents[$i]['id']);?>"><img src="<?php echo  getGCimage($dayEvents[$i]['type'],"addons/".$addon['basename']."/images/calendar/"); ?>" border="0" height="40" width="40"></a></td>
				<td valign="top"><p class="otherEvents"><?php echo utf8_decode($dayEvents[$i]['title'])?><br><?php echo utf8_decode($dayEvents[$i]['timestr'])?></p></td>
			  </tr>
			<?php } ?>
			</table>
		<?php print border('syellow','end',''); ?>
	<?php } ?>


</tr>
</table>
	<?php print border('spurple','end',''); ?>
<?php }  ?>
<?php
function dateadd($mon,$day,$year,$val = 1,$type = "day") {
	$type = strtolower($type);
	if ($val < 0) return datesubtract($mon,$day,$year,($val * -1),$type);
	if ($type == "week") { $type="day"; $val = $val*7; }
	switch ($type) {
	  case "day":
	    $day += $val;
		$maxdays = 31-((($mon-(($mon<8)?1:0))%2)+(($mon==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		while ($day > $maxdays) {
		  $day -= $maxdays;
		  $mon++;
		  if ($mon == 13) { $mon = 1; $year++; }
		  $maxdays = 31-((($mon-(($mon<8)?1:0))%2)+(($mon==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		}
		break;
	  case "month":
	    $mon += $val;
		while ($mon > 12) {
		  $year ++;
		  $mon -= 12;
		}
		$maxdays = 31-((($mon-(($mon<8)?1:0))%2)+(($mon==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		if ($day > $maxdays) $day = $maxdays;
		break;
	  case "year":
	    $year += $val;
		$maxdays = 31-((($mon-(($mon<8)?1:0))%2)+(($mon==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		if ($day > $maxdays) $day = $maxdays;
		break;
	}
	return array("mon"=>$mon,"day"=>$day,"year"=>$year);
}

function datesubtract($mon,$day,$year,$val = 1,$type = "day") {
	$type = strtolower($type);
	if ($val < 0) return dateadd($mon,$day,$year,($val * -1),$type);
	if ($type == "week") { $type="day"; $val = $val*7; }
	switch ($type) {
	  case "day":
	    $day -= $val;
		while ($day < 1) {
		  $mon--;
		  if ($mon == 0) { $mon=12; $year--; }
		  $maxdays = 31-((($mon-(($mon<8)?1:0))%2)+(($mon==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		  $day += $maxdays;
		}
		break;
	  case "month":
		$mon -= $val;
		while ($mon < 1) {
		  $year--;
		  $mon += 12;
		}
		$maxdays = 31-((($mon-(($mon<8)?1:0))%2)+(($mon==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		if ($day > $maxdays) $day = $maxdays;
		break;
	  case "year":
	    $year -= $val;
		$maxdays = 31-((($mon-(($mon<8)?1:0))%2)+(($mon==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
		if ($day > $maxdays) $day = $maxdays;
		break;
	}
	return array("mon"=>$mon,"day"=>$day,"year"=>$year);
}
print border('spurple','end','');
?>
