<?php

/**
 * WoWRoster.net DKPStats
 *
 * DKPStats is a Roster addon that will show dkp from your EQDKP site
 * within the roster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.0
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link        http://www.wowroster.net/Forums/viewforum/f=112.html
 * @since      01/11/2006
 *
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// Version Check
	$file_ver = $addon_conf['DKPStats']['Version'];
	$wrnet_download_id = '111';
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
		print '<b>Could not check version information</b>';
	}
	elseif( version_compare($file_ver_latest, $file_ver,'>') == true )
	{
		print '<b><a href="http://www.wowroster.net/Downloads/details/id='.$wrnet_download_id.'.html" target="_blank">There is a new version available! v' . $file_ver_latest . '</a></b><br/><br/>';
	}

// Add itemstats css and javascript to header
$more_css = "  <link rel=\"stylesheet\" href=\"".$addon_conf['DKPStats']['itemstatsLib']."/templates/".$addon_conf['DKPStats']['itemstatsCSS']."\" type=\"text/css\">\n";
$html_head = "  <script type=\"text/javascript\" src=\"".$addon_conf['DKPStats']['itemstatsLib']."/overlib/overlib.js\"><!-- overLIB © Erik Bosrup --></script>\n";

include_once($addon_conf['DKPStats']['itemstatsLib'].'/'.$addon_conf['DKPStats']['itemstatsLibFile']);
include_once('functions.php');

$display = $_REQUEST['display'];
$color = $_REQUEST['color'];

//SHOW MENU
// Show addon menu
if($display == 'history'){
	echo border('syellow','start',$wordings[$roster_conf['roster_lang']]['LootHistory']);
}elseif($display == 'loot'){
	echo border('syellow','start',$wordings[$roster_conf['roster_lang']]['LootView']);
}else{
	echo border('syellow','start',$wordings[$roster_conf['roster_lang']]['DKPStats']);
}

echo '<table cellpadding="0" cellspacing="0" class="membersList"><tr>';
echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=DKPStats">'.$wordings[$roster_conf['roster_lang']]['DKPStats'].'</a></td>';
echo '<td class="membersHeaderRight"><a href="addon.php?roster_addon_name=DKPStats&amp;display=history">'.$wordings[$roster_conf['roster_lang']]['LootHistory'].'</a></td>';
echo '</tr></table>';
echo border('syellow','end');
echo '<br/>';

// DISPLAY SELECTED PAGE

if($display == '')
	{
		require 'dkpview.php';
	}
	if($display == 'loot')
	{
		require 'lootview.php';
	}
	if($display == 'history')
	{
		require 'loothistory.php';
	}

?>