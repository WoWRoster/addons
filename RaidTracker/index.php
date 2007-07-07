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

// Version Check
	$file_ver = $addon_conf['RaidTracker']['Version'];
	$wrnet_download_id = '43';
	$file_ver_latest = '';	

	// Check wowroster.net for versioning
	$sh = @fsockopen('wowroster.net', 80, $errno, $error, 5);
	if ( $sh )
	{
		@fputs($sh, "GET /rss/downloads.php?id=$wrnet_download_id HTTP/1.1\r\nHost: wowroster.net\r\nConnection: close\r\n\r\n");
		while ( !@feof($sh) )
		{
			$content = @fgets($sh, 512);
			if ( preg_match('#<version>(.+)</version>#i',$content,$version) )
			{
				$file_ver_latest = $version[1];
				break;
			}
		}
	}
	@fclose($sh);

	if( $file_ver_latest == '' )
	{
		print '<b>Could not check version information</b><br/><br/>';
	}
	elseif( version_compare($file_ver_latest, $file_ver,'>') == true )
	{
		print '<b><a href="http://www.wowroster.net/Downloads/details/id='.$wrnet_download_id.'.html" target="_blank">There is a new version available! v' . $file_ver_latest . '</a></b><br/><br/>';
	}

// Add itemstats css and javascript to header
$more_css = "  <link rel=\"stylesheet\" href=\"".$addon_conf['RaidTracker']['itemstatsLib']."/templates/".$addon_conf['RaidTracker']['itemstatsCSS']."\" type=\"text/css\">\n";
$html_head = "  <script type=\"text/javascript\" src=\"".$addon_conf['RaidTracker']['itemstatsLib']."/overlib/overlib.js\"><!-- overLIB © Erik Bosrup --></script>\n";

include_once($addon_conf['RaidTracker']['itemstatsLib'].'/'.$addon_conf['RaidTracker']['itemstatsLibFile']);
include_once('functions.php');

$display = $_REQUEST['display'];
$raid = $_REQUEST['raid'];
$color = $_REQUEST['color'];

if($display != 'admin'){

// Show addon menu
if($display == 'history'){
	echo border('syellow','start',$rt_wordings[$roster_conf['roster_lang']]['LootHistory']);
}elseif($display == 'bosses'){
	echo border('syellow','start',$rt_wordings[$roster_conf['roster_lang']]['BossProgress']);
}elseif($display == 'bossesBC'){
	echo border('syellow','start',$rt_wordings[$roster_conf['roster_lang']]['BossProgressBC']);
}elseif($display == 'summary'){
	echo border('syellow','start',$rt_wordings[$roster_conf['roster_lang']]['Summary']);
}elseif($display == 'attendance'){
	echo border('syellow','start',$rt_wordings[$roster_conf['roster_lang']]['Attendance']);
}else{
	if($raid != '')
	{
		$query = 'SELECT raidid, instanceid, zone FROM `'.$db_prefix.'raids` WHERE raidnum = '.$raid;
		if ($roster_conf['sqldebug'])
		{
			print "<!-- $query -->\n";
		}
		$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
		$row = $wowdb->fetch_array($result);
		
		// Set title for selected raid
		$title = getZoneIcon($row['zone']);
		if($row['zone'] != 'RandomRaid'){
			$zoneName= $rt_wordings[$roster_conf['roster_lang']]['Zones'][$row['zone']];
			if( !isset ($zoneName) || $zoneName ==''){
				$zoneName= $rt_wordings[$roster_conf['roster_lang']]['ZonesBC'][$row['zone']];	
			}
		}else{
			$zoneName= $rt_wordings[$roster_conf['roster_lang']][$row['zone']];
		}
		$title .= $zoneName.' <span style="font-size:10px;">(' . date($addon_conf['RaidTracker']['DateView'], strtotime($row['raidid'])) . ' - '.$row['instanceid'].' )</span>';
		echo border('syellow','start',$title);
	}
	else
	{
		echo border('syellow','start',$wordings[$roster_conf['roster_lang']]['RaidTracker']);
	}
}

echo '<table cellpadding="0" cellspacing="0" class="membersList"><tr>';
echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker">'.$wordings[$roster_conf['roster_lang']]['RaidTracker'].'</a></td>';
echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=history">'.$rt_wordings[$roster_conf['roster_lang']]['LootHistory'].'</a></td>';
echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=bosses">'.$rt_wordings[$roster_conf['roster_lang']]['BossProgress'].'</a></td>';
echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=bossesBC">'.$rt_wordings[$roster_conf['roster_lang']]['BossProgressBC'].'</a></td>';
echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=attendance">'.$rt_wordings[$roster_conf['roster_lang']]['Attendance'].'</a></td>';
echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=summary">'.$rt_wordings[$roster_conf['roster_lang']]['Summary'].'</a></td>';
echo '<td class="membersHeaderRight"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=admin">'.$rt_wordings[$roster_conf['roster_lang']]['Admin'].'</a></td>';
echo '</tr></table>';
echo border('syellow','end');
echo '<br/>';

}

$result = checkDB($db_prefix."raids");
$reinstall = (!$result? 1 : 0);

// Check if tables already excists
if( !$result || $reinstall){
	require 'install_db.php';
}else{
	if($display == '')
	{
		if($raid != '')
		{
			require 'raidview.php';	
		}else{
			require 'raidlist.php';
		}
	}
	if($display == 'history')
	{
		if($color != ''){
			require 'lootview.php';
		}else{
			require 'loothistory.php';
		}
	}
	if($display == 'bosses')
	{
		require 'bosses.php';
	}
	if($display == 'bossesBC')
	{
		require 'bossesBC.php';
	}
	if($display == 'summary')
	{
		require 'summary.php';
	}
	if($display == 'attendance')
	{
		require 'attendance.php';
	}
	if($display == 'admin')
	{
		require 'RTAdmin.php';
	}
	
	
	
}

?>