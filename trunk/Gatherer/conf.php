<?php
/******************************
* $Id: $
******************************/

// Update Trigger controll
$addon_conf['gatherer']['UpdateTrigger'] = 1;





/******** END OF CONFIG *******/







// The name of our addon folder, in case someone needs to rename it :s
$addonName = $_REQUEST['roster_addon_name'];

// Build the link to our xml generator so the swf can read it
$addonResults = ROSTER_URL.'/addons/'.$addonName.'/results.php';
// Define our database table, it not already defined
if( !defined('GATHERER_TABLE') )
{
	// We might not be able to see the database prefix...
	if( !isset($db_prefix) )
	{
		global $db_prefix;
	}
	define( 'GATHERER_TABLE' , $db_prefix.'addon_gatherer_nodes');
}
