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

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// ----[ Check log-in ]-------------------------------------
$roster_login = new RosterLogin($script_filename."&amp;display=admin");
$action = $_REQUEST['action'];
 
// Disallow viewing of the page
if( !$roster_login->getAuthorized() )
{
	print
	'<span class="title_text">RaidTracker Admin</span><br />'.
	$roster_login->getMessage().
	$roster_login->getLoginForm();
 
	return;
}
else
{

	// Show Admin Menu
	echo border('syellow','start',$rt_wordings[$roster_conf['roster_lang']]['Admin']);
	echo '<table cellpadding="0" cellspacing="0" class="membersList"><tr>';
	echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=admin">'.$rt_wordings[$roster_conf['roster_lang']]['Admin'].'</a></td>';
	echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=admin&amp;action=delete">Delete Raids</a></td>';
	// echo '<td class="membersHeader"><a href="addon.php?roster_addon_name=RaidTracker&amp;display=admin&amp;action=options">RaidTracker Options</a></td>';
	echo '<td class="membersHeaderRight"><a href="addon.php?roster_addon_name=RaidTracker">Back to RaidTracker</a></td>';
	echo '</tr></table>';
	echo border('syellow','end');
	echo '<br/>';

	if($action == '')
	{
		require 'admin/manageRaids.php';
	}
	if($action == 'delete')
	{
		require 'admin/deleteRaids.php';
	}
	if($action == 'edit')
	{
		require 'admin/editRaid.php';
	}
}
// ----[ End Check log-in ]--------------------------------- 
?>