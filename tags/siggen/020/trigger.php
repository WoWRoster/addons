<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /trigger.php
 *
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Legal Information:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 *
 * Full License:
 *  license.txt (Included within this library)
 *
 * You should have recieved a FULL copy of this license in license.txt
 * along with this library, if you did not and you are unable to find
 * and agree to the license you may not use this library.
 *
 * For questions, comments, information and documentation please visit
 * the official website at cpframework.org
 *
 * @link http://www.wowroster.net
 * @license http://creativecommons.org/licenses/by-nc-sa/2.5/
 * @author Joshua Clark
 * @version 0.2.0
 * @copyright 2005-2007 Joshua Clark
 * @package SigGen
 * @filesource
 *
 * $Id:$
 */

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Start the following scripts when "update.php" is called
 *
 * Available variables
 *   - $wowdb       = roster's db layer
 *   - $member_id   = character id from the database ( ex. 24 )
 *   - $member_name = character's name ( ex. 'Jonny Grey' )
 *   - $roster_conf = The entire roster config array
 *   - $mode        = when you want to run the trigger
 *      = 'char'  - during a character update
 *      = 'guild' - during a guild update
 *
 * You may need to do some fancy coding if you need more variables
 *
 * You can just print any needed output
 */
//----------[ INSERT UPDATE TRIGGER BELOW ]-----------------------


// The following is an example "trigger.php" file from zanix's SigGen

//------[ Get DB settings ]-----------------------

$sql_str = "SHOW TABLES LIKE '".ROSTER_SIGCONFIGTABLE."';";
$result = $wowdb->query($sql_str);
$r = $wowdb->fetch_assoc($result);


if( !empty($r) )
{
	// Read SigGen Config data from Database
	$config_str = "SELECT `config_id`,`trigger`,`guild_trigger` FROM `".ROSTER_SIGCONFIGTABLE."`;";
	$config_sql = $wowdb->query($config_str);
	if( $config_sql && $wowdb->num_rows($config_sql) != 0 )
	{
		while( $siggen_row = $wowdb->fetch_assoc($config_sql) )
		{
			$SigGenConfig[$siggen_row['config_id']]['trigger'] = $siggen_row['trigger'];
			$SigGenConfig[$siggen_row['config_id']]['guild_trigger'] = $siggen_row['guild_trigger'];
		}
	}
	$wowdb->free_result($config_sql);
	unset($siggen_row);
}



// Run this on a character update
if( $mode == 'char' )
{
	if( $SigGenConfig['signature']['trigger'] )
	{
		print 'Saving Sig-[ <img src="'.$roster_conf['roster_dir'].'/addons/siggen/sig.php?etag=0&name='.urlencode(utf8_decode($member_name)).'" width="75" height="16" alt="" /> ]';
	}

	if( $SigGenConfig['avatar']['trigger'] )
	{
		print ' Saving Avatar-[ <img src="'.$roster_conf['roster_dir'].'/addons/siggen/av.php?etag=0&name='.urlencode(utf8_decode($member_name)).'" width="19" height="16" alt="" /> ]';
	}
}


// Run this on a guild update
if( $mode == 'guild' )
{
	if( $SigGenConfig['signature']['guild_trigger'] )
	{
		print 'Saving Sig-[ <img src="'.$roster_conf['roster_dir'].'/addons/siggen/sig.php?etag=0&name='.urlencode(utf8_decode($member_name)).'" width="75" height="16" alt="" /> ]';
	}

	if( $SigGenConfig['avatar']['guild_trigger'] )
	{
		print ' Saving Avatar-[ <img src="'.$roster_conf['roster_dir'].'/addons/siggen/av.php?etag=0&name='.urlencode(utf8_decode($member_name)).'" width="19" height="16" alt="" /> ]';
	}
}
unset($SigGenConfig);
