<?php
/******************************
* $Id: $
******************************/


if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

global $uploadData, $addon_conf;
$output = '';

//----------[ INSERT UPDATE TRIGGER BELOW ]-----------------------
// Run this on a character update
if( $mode == 'char_post' )
{
	if( $addon_conf['gatherer']['UpdateTrigger'] )
	{
		// If Gatherer data is there, assign it to $uploadData['GatherItems']
		if( isset($uploadData['GatherItems']) )
		{
			print "<span class=\"green\">Updating Gatherer Data</span>\n<br /><br />\n";
			include_once($addonDir.'functions.php');
			processGatherer($uploadData['GatherItems'], $gatherwords);
		}
		if( isset($uploadData['Cartoherb']) )
		{
			print "<span class=\"green\">Updating Cartographer Herbalism Data</span>\n<br /><br />\n";
			include_once($addonDir.'functions.php');
			processCartoHerb($uploadData['Cartoherb'], $gatherwords);
		}
		if( isset($uploadData['Cartomine']) )
		{
			print "<span class=\"green\">Updating Cartographer Mining Data</span>\n<br /><br />\n";
			include_once($addonDir.'functions.php');
			processCartoMine($uploadData['Cartomine'], $gatherwords);
		}
	}
}
