<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
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

	Just print any needed output

*/

?>
