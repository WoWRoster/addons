<?php
/******************************
* $Id: $
******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

createTables();

function createTables( )
{
	global $wowdb, $roster_conf, $wordings;

	// Declare tables needed for RaidTracker
	$create_nodes = "CREATE TABLE `".GATHERER_TABLE."` (
			`id` int(5) NOT NULL auto_increment,
			`continent` int(5) unsigned NOT NULL default '0',
			`map` varchar(25) NOT NULL default '',
			`nodeNumber` int(11) NOT NULL default '0',
			`nodeType` varchar(10) NOT NULL default '',
			`xPos` varchar(10) NOT NULL default '',
			`yPos` varchar(10) NOT NULL default '',
			`method` varchar(10) NOT NULL default '',
			PRIMARY KEY  (`id`),
			KEY `xPos` (`xPos`),
			KEY `yPos` (`yPos`),
			KEY `map` (`map`)
		);";

	// Create tables declared above
	$tables = 0;
	if( $wowdb->query($create_nodes) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$create_nodes) )
	{
		$tables += 1;
	}

	if( $tables == 1 )
	{
		print message_die('All tables successfully added<br /><br /><a href="'.$script_filename.'">Finish installation</a>','Installation Successful','syellow');
	}
	else
	{
		print message_die('Install failed<br /><br />Please copy the contents of the SQL log and make a post in the Gather Sub-forum at WoWRoster.net','Install Error');
	}
}
