<?php

/**
 * WoWRoster.net RaidTracker
 *
 * RaidTracker is a Roster addon that allows you to track raids, bosskills, loot
 * with the data from CT_RaidTracker MLdkp WoW Addon
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.2.1
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=55.html
 *
*/

function checkDb( $table )
{
	global $wowdb;
	$sql_str = "SHOW TABLES LIKE '$table';";

	$result = $wowdb->query($sql_str);
	$r = $wowdb->fetch_assoc($result);

	if( empty($r) )
	{
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}

function getZoneIcon($zone){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
		
	$icon_name = $rt_wordings['RaidTracker']['ZoneIcons'][$zone];
	
	$icon_value = '<img class="membersRowimg" width="'.$roster_conf['index_iconsize'].'" height="'.$roster_conf['index_iconsize'].'" src="'.$roster_conf['roster_dir'].'/addons/RaidTracker/img/'.$icon_name.'.gif" alt="'.$zone.'" /> ';
	if($icon_name !='')
	return $icon_value;
}

function getNoteIcon($note){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	
	$icon_value = '';
	if($note != ''){
		$icon_value = '<img src="'.$roster_conf['img_url'].'note.gif" style="cursor:help;" class="membersRowimg" alt="'.$wordings[$roster_conf['roster_lang']]['note'].'" '.makeOverlib(stripslashes($note),$wordings[$roster_conf['roster_lang']]['note'],'',1).'>';
	}else{
		$icon_value = '<img src="'.$roster_conf['img_url'].'no_note.gif" class="membersRowimg" alt="'.$wordings[$roster_conf['roster_lang']]['note'].'">';
	}
	return $icon_value;
}

function getClass($name){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	
	// Display class-icon and color name
	$cquery = 'SELECT class FROM `'.$db_prefix.'raidmembers` WHERE name = \''.$name.'\'';
	$cresult = $wowdb->query($cquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$cquery);
	$crow = $wowdb->fetch_array($cresult);
	$class = substr($crow['class'], 0, 1).strtolower(substr($crow['class'],1));
	// Class Icon
	foreach ($roster_conf['multilanguages'] as $language)
	{
	$icon_name = $wordings[$language]['class_iconArray'][$class];
	if( strlen($icon_name) > 0 ) break;
	}
	$icon_name = 'Interface/Icons/'.$icon_name;
	if($icon_name == 'Interface/Icons/')
	{
		$icon_name = 'Interface/Icons/INV_Misc_QuestionMark';
	}
	
	
	// Class coloring
	$icon_value = '<img class="membersRowimg" width="'.$roster_conf['index_iconsize'].'" height="'.$roster_conf['index_iconsize'].'" src="'.$roster_conf['roster_dir'].'/'.$roster_conf['interface_url'].$icon_name.'.jpg" alt="'.$class.'" /> ';
	
	return $icon_value;
}

// Lootview functions

function getLoot($raidnum,$color){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	
	$server_name=$roster_conf['server_name'];
	
	// Display loot by color
	echo border('syellow','start',$rt_wordings[$roster_conf['roster_lang']]['LootTypes'][$color]);
	// Make a table to hold the content
		echo '<table cellpadding="0" cellspacing="0" width="250px" class="membersList">';
		
		// Display the header of the table
		echo '<tr>';
		echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['Looted'].'</th>';
		echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['Name'].'</th>';
		echo '<th class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['Note'].'</th>';
		echo '</tr>';
	
	// Check if we have a Loot Filter
	$loot_where = '';
	if ($color != '') {
		$loot_where = ' AND color = \''.$color.'\' ';
	}
		
	// Get all loot
	$query = 'SELECT itemname, name, color, note FROM `'.$db_prefix.'raiditems` WHERE raidnum = '.$raidnum.' '.$loot_where.' GROUP BY itemname, name ORDER BY itemname ASC';
	
	if ($roster_conf['sqldebug'])
	{
		print "<!-- $query -->\n";
	}
	
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	
	$rownum=1;
	while ($row = $wowdb->fetch_array($result)) {
	// Open a new Row
			echo '<tr>';
		// Display the item in second column
		$loot_item = '[item]'.$row['itemname'].'[/item]';
		echo itemstats_parse('<td class="membersRow'.$rownum.'">'.utf8_decode($loot_item));
		//echo '<td class="membersRow'.$rownum.'">'.utf8_decode($loot_item);
	
	// Display the count
					$count = 0;
					$cquery = 'SELECT number FROM `'.$db_prefix.'raiditems` WHERE name = \''.$row['name'].'\' AND itemname = \''.$wowdb->escape($row['itemname']).'\' AND raidnum = '.$raidnum;
					$cresult = $wowdb->query($cquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$cquery);
					while ($crow = $wowdb->fetch_array($cresult)){
						$count += $crow['number'];
					}
					echo ' x'. $count.'</td>';
			
			//echo $row['itemname'].'</div></td>';
	
	// Display the name
	echo '<td class="membersRow'.$rownum.'">';
		// Check if char is in guild
		$gquery = 'SELECT member_id FROM '.ROSTER_MEMBERSTABLE.' WHERE name= \''.$row['name'].'\'';
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $gquery -->\n";
		}
		$gid_result = $wowdb->query($gquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$gquery);
		$gid = $wowdb->fetch_array($gid_result);
		if($gid[0] != ''){
			// Check if charinfo exists
			$query = 'SELECT member_id FROM '.ROSTER_PLAYERSTABLE.' WHERE name= \''.$row['name'].'\'';
			if ($roster_conf['sqldebug'])
			{
				print "<!-- $query -->\n";
			}
			$id_result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
			$id = $wowdb->fetch_array($id_result);
			if($id[0] != ''){
				echo ' <a href="char.php?name='.$row['name'].'&server='.$server_name.'">'.$row['name'].'</a></td>';
			}else{
				echo ' '.$row['name'].'</td>';
			}
		}else{
			echo ' <span style="color:#999999;">'.$row['name'].'</span></td>';
		}

	// Set note
	echo '<td style="text-align:center;" class="membersRowRight'.$rownum.'">';
	echo getNoteIcon($row['note']).'</td>';
		
	// Close the Row
			echo '</tr>';
		
			switch ($rownum) {
			case 1:
				$rownum=2;
				break;
			default:
				$rownum=1;
		}
	}
	
	// Add total loot at bottom
	$lquery = 'SELECT sum(number) FROM `'.$db_prefix.'raiditems` WHERE color = \''.$color.'\' AND raidnum = '.$raidnum;
	$lresult = $wowdb->query($lquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$lquery);
	$lrow = $wowdb->fetch_array($lresult);
	echo '<tr><th colspan="3" class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['TotalDrop'].': '.$lrow['0'].'</th></tr>';
	
	// Close the table
		echo '</table>';
		
	echo border('syellow','end');
	echo '<br/>';
}

function getLootByName($raidnum,$color,$name){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	
		// Get all loot
		$query = 'SELECT itemname, note FROM `'.$db_prefix.'raiditems` WHERE name = \''.$name.'\'  AND color = \''.$color.'\'  AND raidnum = '.$raidnum.' '.$loot_where.' GROUP BY itemname';
		
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $query -->\n";
		}
		
		$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
		
		$rownum=1;
		while ($row = $wowdb->fetch_array($result)) {
		// Open a new Row
				echo '<tr>';
		
		// Display the loot
				$loot_item = '[item]'.$row['itemname'].'[/item]';
				echo itemstats_parse('<td class="membersRow'.$rownum.'">'.utf8_decode($loot_item));
			
			// Display the count
				$count = 0;
				$cquery = 'SELECT number FROM `'.$db_prefix.'raiditems` WHERE name = \''.$name.'\' AND itemname = \''.$wowdb->escape($row['itemname']).'\' AND raidnum = '.$raidnum;
				$cresult = $wowdb->query($cquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$cquery);
				while ($crow = $wowdb->fetch_array($cresult)){
					$count += $crow['number'];
				}
				echo ' x'. $count.'</td>';
		
		// Set note
		echo '<td style="text-align:center;" class="membersRowRight'.$rownum.'">';
		echo getNoteIcon($row['note']).'</td>';
		
		// Close the Row
				echo '</tr>';
			
				switch ($rownum) {
				case 1:
					$rownum=2;
					break;
				default:
					$rownum=1;
			}
		}
	}

// Loothistory functions

function showLoot($color)
{
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix, $zone, $boss;
	
	// Check if we have a Zone Filter
	$zone_where = '';
	if ($zone != '') {
		$zone_where = ' AND zone = \''.$zone.'\' ';
	}
	
	// Check if we have a Boss Filter
	$boss_where = '';
	if ($boss != '') {
		$boss_where = ' AND boss = \''.$boss.'\' ';
	}
	
	// Check if their is loot
	$query = 'SELECT count(itemname) FROM `'.$db_prefix.'raiditems` WHERE color = \''.$color.'\''.$zone_where.$boss_where.' GROUP BY itemname ORDER BY color DESC, itemname ASC'.$limit;
	if ($roster_conf['sqldebug'])
	{
		print "<!-- $query -->\n";
	}
	
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	$loot_count = $wowdb->fetch_array($result);
	
	if($loot_count['0'] != 0){
	
	// Display the Top / left side of the Stylish Border
	echo border('syellow', 'start', $rt_wordings[$roster_conf['roster_lang']]['LootTypes'][$color]);

	// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" class="membersList">';
	
	// Check if we have a Zone Filter
	$zone_where = '';
	if ($zone != '') {
		$zone_where = ' AND zone = \''.$zone.'\' ';
	}
	//$limit = ' limit 25';
	
	// Get all loot
	$query = 'SELECT itemname, name, number, loottime FROM `'.$db_prefix.'raiditems` WHERE color = \''.$color.'\''.$zone_where.$boss_where.' GROUP BY itemname ORDER BY itemname ASC'.$limit;
	
	if ($roster_conf['sqldebug'])
	{
		print "<!-- $query -->\n";
	}
	
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	
	$rownum=1;
	while ($row = $wowdb->fetch_array($result)) {
	// Open a new Row
			echo '<tr>';
	
	// Display the loot
		$loot_item = '[item]'.$row['itemname'].'[/item]';
		echo '<td class="membersRowRight'.$rownum.'">';
		echo itemstats_parse(utf8_decode($loot_item));
	
	// Display the count
		$count = 0;
		$cquery = 'SELECT number FROM `'.$db_prefix.'raiditems` WHERE itemname = \''.$wowdb->escape($row['itemname']).'\''.$boss_where;
		$cresult = $wowdb->query($cquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$cquery);
		while ($crow = $wowdb->fetch_array($cresult)){
			$count += $crow['number'];
		}
		echo ' x'. $count.'</td>';
	
	
	// Close the Row
			echo '</tr>';
		
			switch ($rownum) {
			case 1:
				$rownum=2;
				break;
			default:
				$rownum=1;
		}
	}
	// Add total loot at bottom
	$lquery = 'SELECT sum(number) FROM `'.$db_prefix.'raiditems` WHERE color = \''.$color.'\'';
	$lresult = $wowdb->query($lquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$lquery);
	$lrow = $wowdb->fetch_array($lresult);
	$tquery = 'SELECT sum(number) FROM `'.$db_prefix.'raiditems` WHERE color = \''.$color.'\''.$zone_where.$boss_where;
	$tresult = $wowdb->query($tquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$tquery);
	$trow = $wowdb->fetch_array($tresult);
	echo '<tr><th class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['TotalDrop'].': '.$trow['0'].' | '.$rt_wordings[$roster_conf['roster_lang']]['LootTypes'][$color].': '.$lrow['0'].'</th></tr>';
	
	// Close the table
	echo '</table>';
			
	// Display the Right side / Bottom of the Stylish Border
	echo border('syellow','end');
	}
}

// Bossprogress functions
function bossProgress($zone)
{
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix, $display ;
	
	// Display the Top / left side of the Stylish Border
	if ($display =="bosses") {
		$title = '<div style="text-align:left;">'.getZoneIcon($zone) . $rt_wordings[$roster_conf['roster_lang']]['Zones'][$zone].'</div>';
	} else {
		$title = '<div style="text-align:left;">'.getZoneIcon($zone) . $rt_wordings[$roster_conf['roster_lang']]['ZonesBC'][$zone].'</div>';
	}
	echo border('syellow', 'start', $title);
	
	// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" width="250px" class="membersList">';
	
	// Display the header of the table
	echo '<tr>';
	echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['Boss'].'</th>';
	echo '<th width="80px" class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['Status'].'</th>';
	echo '</tr>';
	
	$bosscount = 0;
	$killcount = 0;
	
	$rownum=1;
	foreach($rt_wordings[$roster_conf['roster_lang']]['Bosses'][$zone] as $bossname => $bosslang){
		$bosscount = $bosscount + 1;
		echo '<tr>';
		
		$squery = 'SELECT count(*) FROM `'.$db_prefix.'raidbosskills` WHERE boss = \''.addslashes($bossname).'\'';
	
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $squery -->\n";
		}
		
		$sresult = $wowdb->query($squery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$squery);
		$scount = $wowdb->fetch_array($sresult);
		
		// Display Bosses
		echo '<td class="membersRow'.$rownum.'">';
		if($scount[0] != 0){
			echo '<a href="addon.php?roster_addon_name=RaidTracker&display=history&bossfilter='.addslashes($bossname).'">'.$bosslang.'</a></td>';
		}else{
			echo '<span style="color:#999999">'.$bosslang.'</span></td>';
		}
		
		// Display Status
		echo '<td class="membersRowRight'.$rownum.'">';
		
		if($scount[0] != 0){
			$killcount = $killcount + 1;
			echo '<span style="color:#00CC00">'.$rt_wordings[$roster_conf['roster_lang']]['Killed'].' ('.$scount[0].'x)</span></td>';
		}else{
			echo '<span style="color:#CC0000">'.$rt_wordings[$roster_conf['roster_lang']]['NotKilled'].'</span></td>';
		}
		
		// Close the Row
			echo '</tr>';
			switch ($rownum) {
			case 1:
				$rownum=2;
				break;
			default:
				$rownum=1;
		}
	}
	// Add progress
	//$progress = number_format((($killcount/$bosscount)*100), 2, '.', '');
	$progress = round(($killcount/$bosscount)*100);
	if($progress != 100){
		echo '<tr><th colspan="2" class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['Progress'].': '.$killcount.' / '.$bosscount.' ('.$progress.'%)'.'</th></tr>';
	}else{
		echo '<tr><th colspan="2" class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['Progress'].': '.$killcount.' / '.$bosscount.' ('.$rt_wordings[$roster_conf['roster_lang']]['Completed'].')</th></tr>';	
	}
	
	// Close the table
	echo '</table>';
	
	// Display the Right side / Bottom of the Stylish Border
	echo border('syellow','end');
	
	echo '<br/>';
}

// Summary functions
function getLootCount(){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	$totalloot = 0;

	// Display the Top / left side of the Stylish Border
	echo border('syellow', 'start', $rt_wordings[$roster_conf['roster_lang']]['LootHistory']);
	
	// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" class="membersList">';
	
	// Display the header of the table
	echo '<tr>';
	echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['LootType'].'</th>';
	echo '<th class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['TotalDrop'].'</th>';
	echo '</tr>';
	
	// Get all loottypes
		$rownum=1;
		foreach($rt_wordings[$roster_conf['roster_lang']]['LootTypes'] as $color => $name) {
			// Open a new Row
			echo '<tr>';
			
			// Display the loot
			echo '<td class="membersRow'.$rownum.'"><span style="color:#'.substr($color, 2, 6).'">'.$name.'</span></td>';	
		
			// Add total loot at bottom
			$lquery = 'SELECT sum(number) FROM `'.$db_prefix.'raiditems` WHERE color = \''.$color.'\'';
			$lresult = $wowdb->query($lquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$lquery);
			$lrow = $wowdb->fetch_array($lresult);
			echo '<td class="membersRowRight'.$rownum.'">'.($lrow['0']>1?$lrow['0']:'0').'</td>';
		// Add total to $totalloot
		$totalloot = $totalloot + $lrow['0'];
	
		// Close the Row
			echo '</tr>';
			switch ($rownum) {
			case 1:
				$rownum=2;
				break;
			default:
				$rownum=1;
		}
	}
	// Add total loot at bottom
	echo '<tr><th colspan="2" class="membersHeaderRight">';
	echo $rt_wordings[$roster_conf['roster_lang']]['TotalDrop'].': '.$totalloot;
	echo '</th></tr>';
	
	// Close the table
	echo '</table>';
	
	// Display the Right side / Bottom of the Stylish Border
	echo border('syellow','end');
}

function getRaidCount(){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	
	$totalraids = 0;
	$totalbosskills = 0;
	
	// Display the Top / left side of the Stylish Border
	echo border('syellow', 'start', $rt_wordings[$roster_conf['roster_lang']]['RaidHistory']);
	
	// Make a table to hold the content
	echo '<table cellpadding="0" cellspacing="0" class="membersList">';
	
	// Display the header of the table
	echo '<tr>';
	echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['RaidZone'].'</th>';
	echo '<th class="membersHeader">'.$rt_wordings[$roster_conf['roster_lang']]['RaidCount'].'</th>';
	echo '<th class="membersHeaderRight">'.$rt_wordings[$roster_conf['roster_lang']]['BossKill'].'</th>';
	echo '</tr>';
	
	// Get Raids
	$query = 'SELECT DISTINCT zone FROM `'.$db_prefix.'raids` WHERE deleted != 1 ORDER BY zone ASC';
	
	if ($roster_conf['sqldebug'])
	{
		print "<!-- $query -->\n";
	}
	
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	
	$rownum=1;
	while ($row = $wowdb->fetch_array($result)) {
		// Open a new Row
		echo '<tr>';
			
		// Display zones
		if ($rt_wordings[$roster_conf['roster_lang']]['Zones'][$row['zone']] != '')
		{
			$zone = $rt_wordings[$roster_conf['roster_lang']]['Zones'][$row['zone']];
		}
		else
		{
			$zone = $rt_wordings[$roster_conf['roster_lang']]['ZonesBC'][$row['zone']];
		}
		echo '<td class="membersRow'.$rownum.'">'.getZoneIcon($row['zone']).' '.$zone.'</td>';	
		
		// Display killcount
		$kquery = 'SELECT count(*) FROM `'.$db_prefix.'raids` WHERE zone = \''.addslashes($row['zone']).'\'';
		
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $kquery -->\n";
		}
		
		$kresult = $wowdb->query($kquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$kquery);
		$krow = $wowdb->fetch_array($kresult);
		echo '<td class="membersRow'.$rownum.'">';
		echo ' '.$krow[0].'</td>';
		// Add count to $totalraids
		$totalraids = $totalraids + $krow[0];
		
		// Display bosskills for that zone
		$totalkills = 0;
			foreach($rt_wordings[$roster_conf['roster_lang']]['Bosses'][$row['zone']] as $boss => $bossloc){
				$tkquery = 'SELECT count(boss) FROM `'.$db_prefix.'raidbosskills` WHERE boss = \''.addslashes($boss).'\'';
				if ($roster_conf['sqldebug'])
				{
					print "<!-- $tkquery -->\n";
				}
		
				$tkresult = $wowdb->query($tkquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$tkquery);
				$tkrow = $wowdb->fetch_array($tkresult);
				$totalkills = $totalkills + $tkrow[0];
			}
		echo '<td class="membersRowRight'.$rownum.'">';
		echo $totalkills.'</td>';
		// Add $totalkills to $totalbosskills
		$totalbosskills = $totalbosskills + $totalkills;
		
	// Close the Row
			echo '</tr>';
			switch ($rownum) {
			case 1:
				$rownum=2;
				break;
			default:
				$rownum=1;
		}
	}
	// Add totals at bottom
	echo '<tr><th colspan="3" class="membersHeaderRight">';
	echo $rt_wordings[$roster_conf['roster_lang']]['TotalRaids'].': '.$totalraids.' | ';
	echo $rt_wordings[$roster_conf['roster_lang']]['TotalKills'].': '.$totalbosskills;
	echo '</th></tr>';
	
	// Close the table
	echo '</table>';
	
	// Display the Right side / Bottom of the Stylish Border
	echo border('syellow','end');
}

// Raid Admin Functions

	function deleteRaids($raidids){
		global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
		
		foreach($raidids as $raid){
			//set the raid as deleted
			$query = 'UPDATE `'.$db_prefix.'raids` set deleted = 1  WHERE raidnum='.$raid;
			if ($roster_conf['sqldebug']) {
				print "<!-- $query -->\n";
			}
			$wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
			
			//delete the boss
			$query = 'DELETE FROM `'.$db_prefix.'raidbosskills` WHERE raidnum='.$raid;
			if ($roster_conf['sqldebug']) {
				print "<!-- $query -->\n";
			}
			$wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
			//delete the loot
			$query = 'DELETE FROM `'.$db_prefix.'raiditems` WHERE raidnum='.$raid;
			if ($roster_conf['sqldebug']) {
				print "<!-- $query -->\n";
			}
			$wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
			//delete the join
			$query = 'DELETE FROM `'.$db_prefix.'raidjoins` WHERE raidnum='.$raid;
			if ($roster_conf['sqldebug']) {
				print "<!-- $query -->\n";
			}
			$wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
			//delete the leave
			$query = 'DELETE FROM `'.$db_prefix.'raidleaves` WHERE raidnum='.$raid;
			if ($roster_conf['sqldebug']) {
				print "<!-- $query -->\n";
			}
			$wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
		}
		return true;
	}
	function deactivateRaids($raidids){}
	function editRaids($raidid){}
	function updateOptions($options){}
	

?>