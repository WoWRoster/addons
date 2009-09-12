<?php
/**
 * WoWRoster GuildSpeak - TeamSpeak 2 and Ventrilo for WoWRoster
 * 
 * Addon based on Gryphon, LLC's gllcts2 version 4.2.5
 * and the Ventrilo Server Monitor Script
 *
 * @author Mike DeShane (mdeshane@pkcomp.net)
 * @copyright 2006-2008 Mike DeShane, US
 * @package WoWRoster GuildSpeak
 * @subpackage Login Page
 * 
 */

if (isset($_POST["action"]))
{
	include($addon['inc_dir'] . 'db_inc.php');
	//include("tpl_style.php");
	include("tpl_loggedin.php");
}
else
{
	include($addon['inc_dir'] . 'db_inc.php');
	//include("tpl_style.php");
	$r = query("SELECT * FROM $dbtable1 WHERE server_id='" . addslashes(htmlspecialchars($_GET['detail'])) . "'");
	$row = $roster->db->fetch($r);

	include("tpl_login.php");
}
?>
