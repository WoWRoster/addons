<?php
/******************************
* $Id: trigger.php,v 1.9 2006/05/10 09:30:17 zanix Exp $
******************************/

if( eregi(basename(__FILE__),$_SERVER['PHP_SELF']) )
{
	die("You can't access this file directly!");
}
/*
Start the following scripts when "update.php" is called

Available variables
- $wowdb       = roster's db layer
- $member_id   = character id from the database ( ex. 24 )
- $member_name = character's name ( ex. 'Jonny Grey' )
- $roster_conf = The entire roster config array
- $mode        = when you want to run the trigger
= 'char'  - during a character update
= 'guild' - during a guild update

You may need to do some fancy coding if you need more variables

You can just print any needed output

*/
global $uploadData;
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
			$output = "<span class=\"green\">Updating Gatherer Data<br>\n</span><br />\n";
			include_once($addonDir.'functions.php');
			processGatherer($uploadData['GatherItems']);
		}
	}
	return $output;
}


?>