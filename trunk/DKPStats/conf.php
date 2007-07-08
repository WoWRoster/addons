<?php

/**
 * WoWRoster.net DKPStats
 *
 * DKPStats is a Roster addon that will show dkp from your EQDKP site
 * within the roster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.0
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link        http://www.wowroster.net/Forums/viewforum/f=112.html
 * @since      01/11/2006
 *
*/

//where is the itemstats lib
	$addon_conf['DKPStats']['itemstatsLib'] = "./itemstats";
	$addon_conf['DKPStats']['itemstatsCSS'] = "wowhead.css";
	$addon_conf['DKPStats']['itemstatsLibFile'] = "wowroster_itemstats.php";

//Is eqdkp data in another database the the roster?
	$addon_conf['DKPStats']['eqdkpdb'] = true;
	
//eqdkp table prefix (this is needed no matter what set above)
$addon_conf['DKPStats']['eqdkp_prefix'] = 'eqdkp_';		// MYSQL Database Table prefix for EQDKP tables. (Must match EQDKP setup)

// If using a different database fill these in
	$addon_conf['DKPStats']['db_user2'] = 'eqdkpdbuser';			// MYSQL Database Username
	$addon_conf['DKPStats']['db_passwd2'] = 'eqdkpdbpwd';		// MYSQL Database Password
	$addon_conf['DKPStats']['db_name2'] = 'eqdkpdbname';		// MYSQL Database Name
	$addon_conf['DKPStats']['db_host2'] = 'localhost';		// MYSQL Server Address (localhost if the database is on the same machine)

#--[ EQDKP INSTALL CONFIG ]--------------------------------------------------------	
	$addon_conf['DKPStats']['eqdkp_install'] = 'http://dkp.resurgam.van-z.net/';		// Set this to the full path of your EQDKP Install
	
/****** DON'T CHANGE ANYTHING BELOW! ******/

//Version Check
	$addon_conf['DKPStats']['Version'] = '1.0.0';

//Create connection to eqdkp db
		$eqdkpdb = object;
	if ($addon_conf['DKPStats']['eqdkpdb']){
		$eqdkpdb = new wowdb;
		$eqdkp_db = $eqdkpdb->connect($addon_conf['DKPStats']['db_host2'], $addon_conf['DKPStats']['db_user2'], $addon_conf['DKPStats']['db_passwd2'], $addon_conf['DKPStats']['db_name2']);
		if( !$eqdkp_db )
		{
			die(basename(__FILE__).': line['.(__LINE__).']<br />'.'Could not connect to database "'.$addon_conf['DKPStats']['db_name2'].'"<br />MySQL said:<br />'.$eqdkpdb->error());
		}
	}else{
		$eqdkpdb = $wowdb;
	}

	
?>