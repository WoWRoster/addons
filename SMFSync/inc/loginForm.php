<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SMFSync
 * @subpackage Installer
*/
/**
 * It causes MAJOR problems with SMF's SSI.php when you include the roster files
 * due to not being able to set sessions. So because of this, unfortunatly, we
 * must manually get stuff from the database so we dont have to manually configure stuff.
 * Hence the reason for the nasty IFrame and multiple redirects.
 */

if ($_GET['login'] == "true"){
	//Do this to prevent asking to reload for post data.
	header ("Location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?login2=true&rosterTemplate={$_GET['rosterTemplate']}");
}elseif ($_GET['login2'] == "true"){
	echo '<link REL="STYLESHEET" TYPE="text/css" HREF="../../../templates/'.$_GET['rosterTemplate'].'/style.css"><center>';
	echo '<center><a href=# onClick="self.parent.location.reload(true)">Logged in. Click here to proceed.</a></center>';
echo '
<script language="JavaScript">
<!--
self.parent.location.reload(true);
-->
</script>';
}else{
	//Only get the required information for the login form, we dont need it anywhere else.

	//Get credentials from Roster
	require ('../../../conf.php');

	//Connect to the database.
	$dbh=mysql_connect ($db_config['host'], $db_config['username'], $db_config['password']) or die ('I cannot connect to the database because: ' . mysql_error());
	mysql_select_db ($db_config['database']);

	//Lets grab the forum path.
	$query = "SELECT `config_name`, `config_value` FROM `{$db_config['table_prefix']}addon` a, `{$db_config['table_prefix']}addon_config` c WHERE a.addon_id = c.addon_id AND a.basename = 'smfsync' AND c.config_name = 'forum_path' ";
	$sqlqueryresult = mysql_query ($query);
	$sqlqueryarray = mysql_fetch_array ($sqlqueryresult);
	$forumPath = $sqlqueryarray['config_value'];

	//And we need the theme name, for css.
	$query = "SELECT `config_value` FROM `{$db_config['table_prefix']}config` WHERE `config_name` = 'theme' LIMIT 1";
	$sqlqueryresult = mysql_query($query);
	$sqlqueryarray = mysql_fetch_array($sqlqueryresult);
	$rosterTemplate = $sqlqueryarray['config_value'];

	require ("../../../../{$forumPath}SSI.php");

	echo '<link REL="STYLESHEET" TYPE="text/css" HREF="../../../templates/'.$rosterTemplate.'/style.css"><center>';
	echo "<style>
label{
	color: #CBA300;
}
input{
	color: #CBA300;
}
</style>";

	$redirect = "http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?login=true&rosterTemplate={$rosterTemplate}";

	ssi_login($redirect);
}
?>