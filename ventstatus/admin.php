<?php
if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

session_start();

if(!isset($content)){
	$content = '';
}
// ----[ Decide what to do next ]---------------------------
if( isset($_POST['process']) && $_POST['process'] != '' )
{
	switch ( $_POST['process'] )
	{
		case 'process':
		//echo 'saving settings';
			processData();
			break;
		default:
			break;
	}
}
// ----[ End Decide what to do next ]-----------------------

//----Pull the admin password from the db and assign it to a $var
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'admin'";
$result = $wowdb->query($query);
$admin = $wowdb->fetch_assoc($result);
$wowdb->free_result($result);
//-----
//echo 'admin page';
//echo '<br>pass:' . $admin['conf_data'];
//echo '<br>post data:' . $_POST['vs_password'];
//echo '<br>get data:' . $_GET['vs_password'];
//echo '<br>session data:' . $_SESSION['vs_login'];
// If you're trying to login, You entered an password, and you get the password right
if( isset($_GET['vs_password']) && !empty($_GET['vs_password']) && ($_GET['vs_password'] === $admin['conf_data']) )
{
//echo '<br>logging in';
	$_SESSION['vs_login'] = $admin['conf_data'];
	header("Location: ".ROSTER_URL.DIR_SEP.$script_filename."&action=admin");
}
// If you're not logged in, You're trying to login, You entered a password,  and the password is wrong
if( (!isset($_SESSION['vs_login']) || empty($_SESSION['vs_login'])) && isset($_GET['vs_password']) && !empty($_GET['vs_password']) && $_GET['vs_password'] !== $admin['conf_data'] )
{
//echo '<br>badpassword';
// menu!
$content .= border('syellow', 'start');
$content .= "<table class='bodyline' cellpadding='0' cellspacing='0'>\n";
$content .= "<th class='membersHeader'><a href='".$script_filename."&amp;action=admin'>".$wordings[$roster_conf['roster_lang']]['vs_admin']."</th></a></tr>";
$content .= "</table>";
$content .= border('syellow', 'end');
$content .= "<br />";
$content .= border('syellow', 'start', $wordings[$roster_conf['roster_lang']]['vs_login']);
$content .= "<table class='bodyline' cellpadding='0' cellspacing='0'>\n";
$content .= "<tr><td>\n";
$content .= $wordings[$roster_conf['roster_lang']]['vs_err_password'];
$content .= "</td></tr>\n";
$content .= "</table>\n";
$content .= border('syellow', 'end');
// If you're not logged in
} elseif( (!isset($_SESSION['vs_login'])) || (empty($_SESSION['vs_login'])) || ($_SESSION['vs_login'] !== $admin['conf_data']) )
{
// menu!
//echo '<br>logged out';
$content .= border('syellow', 'start');
$content .= "<table class='bodyline' cellpadding='0' cellspacing='0'>\n";
$content .= "<th class='membersHeader'><a href='".$script_filename."&amp;action=admin'>".$wordings[$roster_conf['roster_lang']]['vs_admin']."</th></a></tr>";
$content .= "</table>";
$content .= border('syellow', 'end');
$content .= "<br />";
$content .= border('syellow', 'start', $wordings[$roster_conf['roster_lang']]['vs_login']);
$content .= "<form action='addon.php' method='get'>";
$content .= "<input type='hidden' name='roster_addon_name' value='ventstatus'>";
$content .= "<input type='hidden' name='action' value='admin'>";
$content .= "<table class='bodyline' cellpadding='0' cellspacing='0'>\n";
$content .= "<tr><td>\n";
$content .= $wordings[$roster_conf['roster_lang']]['vs_password'].": <input type='password' name='vs_password' maxlength='20' size='20'";
$content .= "</td></tr>\n";
$content .= "<tr><td>\n";
$content .= "<input type='submit' name='vs_sub' value = '".$wordings[$roster_conf['roster_lang']]['vs_submit']."'";
$content .= "</td></tr>\n";
$content .= "</table>\n";
$content .= "</form>";
$content .= border('syellow', 'end');
//You're logged in.
} else {
//echo '<br>logged in';
$content .= border('syellow', 'start');
$content .= "\n<form action='' method='post' enctype='multipart/form-data' id='config' onsubmit='submitonce(this)'>\n";
$content .= "<input type='hidden' name='process' value='process'>\n";
$content .= "<table class='bodyline' cellpadding='0' cellspacing='0'><tr>\n";
$content .= "<th class='membersHeader'></th></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_adminpass'] . "</td><td><input name='config_admin' type='text' value='";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'admin'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_path'] . "</td><td><input name='config_cmdprog' type='text' value='";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'cmdprog'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_detail'] . "</td><td>\n";
$content .= "<input class='checkBox' type='radio' name='config_cmdcode' value='2'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'cmdcode'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="2") $content .= "checked='checked'"; 
$content .= ">Advanced\n";
$content .= "<input class='checkBox' type='radio' name='config_cmdcode' value='1'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'cmdcode'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">Basic\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_host'] . "</td><td><input name='config_cmdhost' type='text' value='";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'cmdhost'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_stat_password'] . "</td><td><input name='config_cmdpass' type='text' value='";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'cmdpass'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_port'] . "</td><td><input name='config_cmdport' type='text' value='";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'cmdport'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_info1'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_info1' value='1'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'info1'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_info1' value='0'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'info1'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_display3'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_display3' value='1'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'display3'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_display3' value='0'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'display3'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_display2'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_display2' value='1'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'display2'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_display2' value='0'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'display2'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_display1'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_display1' value='1'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'display1'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_display1' value='0'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'display1'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $wordings[$roster_conf['roster_lang']]['vs_name'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_lobby' value='1'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'lobby'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_lobby' value='0'";
$query = "SELECT conf_data FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE conf_name = 'lobby'";
$result = $wowdb->query($query);
$r = $wowdb->fetch_assoc($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'><input type='reset' name='Reset' value='" . $wordings[$roster_conf['roster_lang']]['vs_reset'] . "' /></td><td align='left'><input type='submit' value='" . $wordings[$roster_conf['roster_lang']]['vs_save'] . "'/></td></tr>\n";
$content .= "</table>\n";
$content .= "</form>\n";
$content .= border('syellow', 'end');
$content .= "<br />\n";
//$wowdb->free_result($result);
}
/**
 * Process Data for entry to the database
 *
 * @return string Settings changed or not changed
 */
function processData( )
{
	global $wowdb, $queries;

	$wowdb->reset_values();

	// Update only the changed fields
	foreach( $_POST as $settingName => $settingValue )
	{
		// Strip those nasty slashes
		//$settingValue = stripslashes($settingValue);

		if( substr($settingName,0,7) == 'config_' )
		{
			$settingName = str_replace('config_','',$settingName);

			$get_val = "SELECT `conf_data` FROM `".ROSTER_ADDON_VENTSTATUS_CONFIG."` WHERE `conf_name` = '".$settingName."';";
			$result = $wowdb->query($get_val)
				or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$get_val);

			$config = $wowdb->fetch_assoc($result);

			if( $config['config_value'] != $settingValue && $settingName != 'process' )
			{
				$update_sql[] = "UPDATE `".ROSTER_ADDON_VENTSTATUS_CONFIG."` SET `conf_data` = '".$wowdb->escape( $settingValue )."' WHERE `conf_name` = '".$settingName."';";
			}
		}
	}

	// Update DataBase
	if( is_array($update_sql) )
	{
		foreach( $update_sql as $sql )
		{
			$queries[] = $sql;

			$result = $wowdb->query($sql);
			if( !$result )
			{
				return '<span style="color:#0099FF;font-size:11px;">Error saving settings</span><br />MySQL Said:<br /><pre>'.$wowdb->error().'</pre><br />';
			}
		}
		return '<span style="color:#0099FF;font-size:11px;">Settings have been changed</span>';
	}
	else
	{
		return '<span style="color:#0099FF;font-size:11px;">No changes have been made</span>';
	}
}
?>