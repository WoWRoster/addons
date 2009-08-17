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

$content .= border('syellow', 'start');
$content .= "\n<form action='' method='post' enctype='multipart/form-data' id='config' onsubmit='submitonce(this)'>\n";
$content .= "<input type='hidden' name='process' value='process'>\n";
$content .= "<table class='bodyline' cellpadding='0' cellspacing='0'><tr>\n";
$content .= "<th class='membersHeader'></th></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_adminpass'] . "</td><td><input name='config_admin' type='text' value='";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'admin'");

$r = $roster->db->fetch($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_path'] . "</td><td><input name='config_cmdprog' type='text' value='";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdprog'");

$r = $roster->db->fetch($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_detail'] . "</td><td>\n";
$content .= "<input class='checkBox' type='radio' name='config_cmdcode' value='2'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdcode'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="2") $content .= "checked='checked'"; 
$content .= ">Advanced\n";
$content .= "<input class='checkBox' type='radio' name='config_cmdcode' value='1'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdcode'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">Basic\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_host'] . "</td><td><input name='config_cmdhost' type='text' value='";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdhost'");

$r = $roster->db->fetch($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_stat_password'] . "</td><td><input name='config_cmdpass' type='text' value='";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdpass'");

$r = $roster->db->fetch($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_port'] . "</td><td><input name='config_cmdport' type='text' value='";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdport'");

$r = $roster->db->fetch($result);
$content .= $r['conf_data'];
$content .= "' size='30'/></td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_info1'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_info1' value='1'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'info1'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_info1' value='0'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'info1'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_display3'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_display3' value='1'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display3'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_display3' value='0'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display3'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_display2'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_display2' value='1'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display2'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_display2' value='0'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display2'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_display1'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_display1' value='1'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display1'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_display1' value='0'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display1'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'>" . $roster->locale->act['vs_name'] . "</td><td>";
$content .= "<input class='checkBox' type='radio' name='config_lobby' value='1'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'lobby'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="1") $content .= "checked='checked'"; 
$content .= ">On\n";
$content .= "<input class='checkBox' type='radio' name='config_lobby' value='0'";
$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'lobby'");

$r = $roster->db->fetch($result);
 if ($r['conf_data']=="0") $content .= "checked='checked'"; 
$content .= ">Off\n";
$content .= "</td></tr>\n";
$content .= "<tr><td align='right'><input type='reset' name='Reset' value='" . $roster->locale->act['vs_reset'] . "' /></td><td align='left'><input type='submit' value='" . $roster->locale->act['vs_save'] . "'/></td></tr>\n";
$content .= "</table>\n";
$content .= "</form>\n";
$content .= border('syellow', 'end');
$content .= "<br />\n";
//$roster->db->free_result($result);
echo $content;
/**
 * Process Data for entry to the database
 *
 * @return string Settings changed or not changed
 */
function processData( )
{
	global $roster, $queries,$addon;

	//$roster->db->reset_values();

	// Update only the changed fields
	foreach( $_POST as $settingName => $settingValue )
	{
		// Strip those nasty slashes
		//$settingValue = stripslashes($settingValue);

		if( substr($settingName,0,7) == 'config_' )
		{
			$settingName = str_replace('config_','',$settingName);

			$get_val = "SELECT `conf_data` FROM `".$roster->db->table('config',$addon['basename'])."` WHERE `conf_name` = '".$settingName."';";
			$result = $roster->db->query($get_val)
				or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$get_val);

			$config = $roster->db->fetch($result);

			if( $config['config_value'] != $settingValue && $settingName != 'process' )
			{
				$update_sql[] = "UPDATE `".$roster->db->table('config',$addon['basename'])."` SET `conf_data` = '".$roster->db->escape( $settingValue )."' WHERE `conf_name` = '".$settingName."';";
			}
		}
	}

	// Update DataBase
	if( is_array($update_sql) )
	{
		foreach( $update_sql as $sql )
		{
			$queries[] = $sql;

			$result = $roster->db->query($sql);
			if( !$result )
			{
				return '<span style="color:#0099FF;font-size:11px;">Error saving settings</span><br />MySQL Said:<br /><pre>'.$roster->db->error().'</pre><br />';
			}
		}
		return '<span style="color:#0099FF;font-size:11px;">Settings have been changed</span>';
	}
	else
	{
		return '<span style="color:#0099FF;font-size:11px;">No changes have been made</span>';
	}
}

