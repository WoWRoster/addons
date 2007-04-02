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
	$create_nodes = 'CREATE TABLE `'.GATHERER_TABLE.'` (
		`id` int(11) NOT NULL auto_increment,
		`number` int(15) NOT NULL,
		`nodeNumber` int(11) NOT NULL,
		`map` varchar(25) NOT NULL,
		`nodeType` varchar(25) NOT NULL,
		`continent` int(3) NOT NULL,
		PRIMARY KEY  (`id`),
		KEY `number` (`number`)
		) ENGINE=MyISAM;';

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
