<?php
/******************************
 * $Id$
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
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
//----------[ INSERT UPDATE TRIGGER BELOW ]-----------------------

// Run this on a character update
if( $mode == 'char' )
{
	if( $addon_conf['dummy']['trigger_1'] )
	{
		print "<span class=\"blue\">Dummy Addon: This is trigger 1 for a character update</span><br />\n";
	}

	if( $addon_conf['dummy']['trigger_2'] )
	{
		print "<span class=\"grey\">Dummy Addon: This is trigger 2 for a character update</span><br />\n";
	}
}

// Run this on a guild update
if( $mode == 'guild' )
{
	if( $addon_conf['dummy']['trigger_1'] )
	{
		print "<span class=\"blue\">Dummy Addon: This is trigger 1 for a guild update</span><br />\n";
	}

	if( $addon_conf['dummy']['trigger_2'] )
	{
		print "<span class=\"grey\">Dummy Addon: This is trigger 2 for a guild update</span><br />\n";
	}
}
