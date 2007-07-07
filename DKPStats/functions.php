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
 * @link       http://www.wowroster.net/Forums/viewforum/f=55.html
 * @since      01/11/2006
 *
*/

function getNoteIcon($note){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	
	$icon_value = '';
	if($note != ''){
		$icon_value = '<img src="'.$roster_conf['img_url'].'note.gif" style="cursor:help;" class="membersRowimg" alt="'.$wordings[$roster_conf['roster_lang']]['DKPCost'].'" '.makeOverlib(stripslashes($note),$wordings[$roster_conf['roster_lang']]['DKPCost'],'',1).'> ';
	}else{
		$icon_value = '<img src="'.$roster_conf['img_url'].'no_note.gif" class="membersRowimg" alt="'.$wordings[$roster_conf['roster_lang']]['note'].'"> ';
	}
	return $icon_value;
}

function getClass($class){
	global $wowdb, $roster_conf, $wordings, $rt_wordings, $db_prefix;
	
	// Class Icon
	foreach ($roster_conf['multilanguages'] as $language)
	{
	$icon_name = $wordings[$language]['class_iconArray'][$class];
	if( strlen($icon_name) > 0 ) break;
	}
	$icon_name = 'Interface/Icons/'.$icon_name;
	if($icon_name == 'Interface/Icons/')
	{
		$icon_name = 'Interface/Icons/INV_Misc_QuestionMark.jpg';
	}
	
	
	// Class coloring
	$icon_value = '<img class="membersRowimg" width="'.$roster_conf['index_iconsize'].'" height="'.$roster_conf['index_iconsize'].'" src="'.$roster_conf['interface_url'].$icon_name.'.jpg" alt="'.$class.'" /> ';
	
	return $icon_value;
}

?>