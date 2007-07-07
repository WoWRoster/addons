<?php

/**
 * WoWRoster.net RaidTracker
 *
 * RaidTracker is a Roster addon that allows you to track raids, bosskills, loot
 * with the data from CT_RaidTracker MLdkp WoW Addon
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.2.1
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=55.html
 *
*/

$wordings['addoncredits']['RaidTracker'] = array(
			array(	"name"=>	"PoloDude",
				"info"=>	"Original Addon Developer"),
);

$rt_directory = dirname(__FILE__).DIR_SEP;
$lang = $roster_conf['roster_lang'];

switch ($lang){
case 'deDE':
	include $rt_directory.'deDE.php';
	break;
case 'enUS':
	include $rt_directory.'enUS.php';
	break;
case 'frFR':
	include $rt_directory.'frFR.php';
	break;
}

?>