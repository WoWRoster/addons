<?php

/**
 * WoWRoster.net EventCalendar
 *
 * Event Calendar is a Roster addon that will show upcoming events from ingame
 * WoW addons GuildEventManager (GEM) or GroupCalendar
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.3
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=59.html
 *
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// Version Check
	$file_ver = $addon_conf['EventCalendar']['Version'];
	$wrnet_download_id = '55';
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

include_once('functions.php');

$event = $_REQUEST['event'];

// Check if tables already excists
if(!$wowdb->query("SELECT * FROM ".$db_prefix."events")){
	require 'install_db.php';
}else{
	if($display == '')
	{
		if($event != '')
		{
			require 'eventview.php';	
		}else{
			require 'eventlist.php';
		}
	}
}

?>