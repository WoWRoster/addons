<?php
/******************************
 * $Id$
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/*
	Whatever configuration for your addon you need
	Try to follow this format to reduce the chance
	that overwritting could occur
		$addon_conf['addon_name']['variable_name'] = 1;
*/


// The following is an "example conf.php" file



//------[ Show Debug? ]------------
	$addon_conf['dummy']['debug'] = 1;


// Update Triggers config
	$addon_conf['dummy']['trigger_1'] = 0;		// Trigger ONE
	$addon_conf['dummy']['trigger_2'] = 0;		// Trigger TWO



	// Display output configuration
	$addon_conf['dummy']['generate_output'] = 1;			//dummy addon generates output


	// Database table prefixes
	define('ROSTER_DUMMYTABLE',$db_prefix.'dummy');
