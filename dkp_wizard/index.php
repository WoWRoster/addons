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

// Includes
include (ROSTER_BASE.'lib/item.php');

// -[ Begin testing conditions for what we want to do ]-

if (isset($_GET['action']))
{
	$action = strtolower($_GET['action']);
}
elseif (isset($_POST['action']))
{
	$action = strtolower($_POST['action']);
}
else
{
	$action = 'defpage';
}
if (isset($_GET['display']))
{
	$display = strtolower($_GET['display']);
}
elseif (isset($_POST['display']))
{
	$display = strtolower($_POST['display']);
}
else
{
	$display = $addon_conf['roster_dkp']['rosterdkp_defaultview'];
}

if (($action == 'install') || ($action == 'upgrade') || ($action == 'update') || $display == 'admin')
{
	require_once($addonDir.'/login.php');
}

if ($action == 'install')
{
	$dbversion = '0.0.0';
	$action = 'install';
}
elseif (($action == 'upgrade') && (version_compare($dbversion,$fileversion,"<")))
{
	$action = 'install';
}
elseif ($action == 'upgrade') // but we are already up to date
{
	$action = 'cant_upgrade_message';
}
elseif (version_compare($dbversion,$fileversion,"<"))  // If the database version is older than the file version we need to produce notice we need to update
{
	if ($dbversion == '0.0.0')
		$action = 'install_message';
	else
		$action = 'upgrade_message';
}
elseif (!isset($display) || $display != 'admin')
{
	display_dkpmenu('main', $display);
}

if ($display == 'admin' && $allow_dkp_login)
{
	if (isset($_GET['admindisplay']) && $_GET['admindisplay'])
	{
		$admindisplay = strtolower($_GET['admindisplay']);
	}
	elseif (isset($_POST['admindisplay']) && $_POST['admindisplay'])
	{
		$admindisplay = strtolower($_POST['admindisplay']);
	}
	else
	{
		$admindisplay = $addon_conf['roster_dkp']['rosterdkp_admindefaultview'];
	}
	$action = 'dkpadmin';
	if ($admindisplay != 'dkpconfig')
	{
		display_dkpmenu('admin', $admindisplay);
	}
	elseif ($admindisplay == 'dkpconfig')
	{
		if (isset($_GET['configdisplay']) && $_GET['configdisplay'])
		{
			$configdisplay = strtolower($_GET['configdisplay']);
		}
		elseif (isset($_POST['configdisplay']) && $_POST['configdisplay'])
		{
			$configdisplay = strtolower($_POST['configdisplay']);
		}
		else
		{
			$configdisplay = $addon_conf['roster_dkp']['rosterdkp_configdefaultview'];
		}
		display_dkpmenu('config', $configdisplay);
		$action = 'dkpconfig';
	}
}

// -[ Begin switch for what we are going to do ]-
switch ($action) {
case 'install':
	include($addonDir.'/install.php');
	break;
case 'update':
	include($addonDir.'/update_wrap.php');	
	break;
case 'dkpadmin':
	include($addonDir.'/dkpadmin.php');
	break;
case 'dkpconfig':
	include($addonDir.'/dkpconfig.php');
	break;
case 'install_message':
	die_quietly($wordings[$roster_conf['roster_lang']]['rosterdkp_install']."<br />\n".
	'<div style="text-align:center;"><span style="border:1px outset white; padding:2px 6px 2px 6px;"><a href="?roster_addon_name='.$_GET['roster_addon_name'].'&amp;action=install">Install</a></span></div>',
	$wordings[$roster_conf['roster_language']]['Skeleton_install_page']);
	break;
case 'upgrade_message':
	die_quietly($wordings[$roster_conf['roster_lang']]['rosterdkp_upgrade']."<br />\n".
	'<table><tr><td align="center"><div style="text-align:center; border:1px outset white; padding:2px 6px 2px 6px;"><a href="?roster_addon_name='.$_GET['roster_addon_name'].'&amp;action=upgrade">Update</a></div>'.
	'<td align="center"><div style="text-align:center; border:1px outset white; padding:2px 6px 2px 6px;"><a href="?roster_addon_name='.$_GET['roster_addon_name'].'&amp;action=install">Install</a></div></table>',
	$wordings[$roster_conf['roster_language']]['Skeleton_install_page']);
	break;
case 'cant_upgrade_message':
	die_quietly($wordings[$roster_conf['roster_lang']]['rosterdkp_no_upgrade']."<br />\n".
	'<div style="text-align:center;"><span style="border:1px outset white; padding:2px 6px 2px 6px;"><a href="?roster_addon_name='.$_GET['roster_addon_name'].'&amp;action=install">Reinstall</a></span></div>',
	$wordings[$roster_conf['roster_language']]['Skeleton_install_page']);
	break;
case 'defpage':
	include('dkpdisplay.php');
	break;
default:
	die_quietly($wordings[$roster_conf['roster_lang']]['Skeleton_NoAction'],'Skeleton');
}

function display_dkpmenu($menu, $display)
{
	global $roster_conf, $script_filename, $wordings;
	
	switch ($menu) {
	case 'main':
		print(border('syellow','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_'.$display]));
		print('<table cellpadding="0" cellspacing="0" class="membersList"><tr>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=standings">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_standings'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=raidlist">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_raidlist'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=raidbank">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_raidbank'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=bosses">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_bosses'].'</a></td>');
//		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=zones">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_zones'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=raidattendence">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_raidattendence'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=summary">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_summary'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_admin'].'</a></td>');
		print('</tr></table>');
		print(border('syellow','end').'<br>');
		break;
	
	case 'admin':
		print(border('spurple','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_'.$display]));
		print('<table cellpadding="0" cellspacing="0" class="membersList"><tr>');
		print('<td class="membersHeader"><a href="'.$script_filename.'">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_backmainview'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=editraids">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_editraids'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=editmembers">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_editmembers'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=edititems">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_edititems'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=insertnewraid">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_insertnewraid'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=dkpconfig">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_dkpconfig'].'</a></td>');
		print('</tr></table>');
		print(border('spurple','end').'<br>');
		break;
	case 'config':
		print(border('sred','start',$wordings[$roster_conf['roster_lang']]['rosterdkp_'.$display]));
		print('<table cellpadding="0" cellspacing="0" class="membersList"><tr>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_backadminview'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=dkpconfig&amp;configdisplay=generalconfig">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_generalconfig'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=dkpconfig&amp;configdisplay=zonesconfig">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_zonesconfig'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=dkpconfig&amp;configdisplay=bossconfig">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_bossconfig'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=dkpconfig&amp;configdisplay=itemconfig">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_itemconfig'].'</a></td>');
		print('<td class="membersHeader"><a href="'.$script_filename.'&amp;display=admin&amp;admindisplay=dkpconfig&amp;configdisplay=localconfig">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_localconfig'].'</a></td>');
		print('</tr></table>');
		print(border('sred','end').'<br>');
		break;
	}
}

?>
