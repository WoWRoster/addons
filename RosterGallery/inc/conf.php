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
$addon_conf['name'] = "Roster Gallery";
//    $addon_cfgn = 'addon_rg';
    

// The following is an "example conf.php" file
//------[ Show Debug? ]------------
$addon_conf['ss']['debug'] = 1;

$ssbordercolor = array(
'Ranking' => 'ranking',
'Blue' => 'sblue',
'Gray' => 'sgray',
'Green' => 'sgreen',
'Orange' => 'sorange',
'Purple' => 'spurple',
'Red' => 'sred',
'Yellow' => 'syellow'
);

$ssfolder = array(
'screenshots/',
'screenshots/thumbs/',
'screenshots/cat1/',
'screenshots/cat2/',
'screenshots/cat3/',
'screenshots/cat4/',
'screenshots/cat5/',
'screenshots/cat6/',
'screenshots/cat7/',
'screenshots/cat8/',
'screenshots/cat9/',
'screenshots/cat10/');

$db_table = array(
'id',
'file',
'caption',
'disc',
'ext',
'catagory',
'approve',
'votes',
'rateing'
);
$is_db = null;
?>
