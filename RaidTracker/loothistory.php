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

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// Server (for public roster use)
$server_name=$roster_conf['server_name'];

// Zone Selection
if (isset($_REQUEST["zonefilter"]))
    $zone = $_REQUEST["zonefilter"];
// Boss Selection
if (isset($_REQUEST["bossfilter"]))
	$boss = $_REQUEST["bossfilter"];
	
$form = '';
$form .= '<table cellpadding="0" cellspacing="0" class="membersList">';
$form .= '<form action="addon.php" method=GET name=myform>';
$form .= '<input type="hidden" name="roster_addon_name" value="RaidTracker">';
$form .= '<input type="hidden" name="display" value="history">';
//Instance selection
$form .= '<th class="membersRow1">'.$rt_wordings[$roster_conf['roster_lang']]['Zone'].':</th>';
$form .= '<td class="membersRow1">';
$form .= '<select name="zonefilter">';
if ($zone == '') {
	$is_selected = ' selected';
} else {
	$is_selected = '';
}
$form .= '<option value="" '.$is_selected.'>'.$rt_wordings[$roster_conf['roster_lang']]['AllZones'].'</option>';

	$query = 'SELECT distinct zone FROM `'.$db_prefix.'raiditems` ORDER BY zone ASC';

	if ($roster_conf['sqldebug'])
	{
		print "<!-- $query -->\n";
	}

	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

	while ($row = $wowdb->fetch_array($result)) {
		$zone_stripped = stripslashes($zone);
		
		if ($zone_stripped == $row['zone']) {
			$is_selected = ' selected';
		} else {
			$is_selected = '';
		}
		$form .= '<option value="'.$row['zone'].'"'.$is_selected.'>'.$row['zone'].'</option>'; 
	}

$form .= '</select></td>';

$form .= '<td class="membersRow1"><input type="submit" value="submit" /></td>';
$form .= '</tr></form></table>';

// Display the Instance select Form in a stylish border
echo border('sgray','start');
echo $form;
echo border('sgray','end');

echo "<br/>";

// Display all loottype tables next to each other
echo '<table cellpadding="0" cellspacing="10"><tr style="vertical-align:top;">';

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

// Check if color is in db
	foreach($rt_wordings[$roster_conf['roster_lang']]['LootTypes'] as $color => $name) {
		$query = 'SELECT color FROM `'.$db_prefix.'raiditems` WHERE color = \''.$color.'\''.$zone_where.$boss_where;
		$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
		$row = $wowdb->fetch_array($result);
		
		if($row){
			echo '<td>';
			showLoot($color);
			echo '</td>';
		}
	}

echo '</tr></table>';

$wowdb->free_result($result);

?>