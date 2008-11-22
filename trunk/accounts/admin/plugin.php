<?php
/** 
 * Dev.PKComp.net WoWRoster Addon
 * 
 * LICENSE: Licensed under the Creative Commons 
 *          "Attribution-NonCommercial-ShareAlike 2.5" license 
 * 
 * @copyright  2005-2007 Pretty Kitty Development 
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5" 
 * @link       http://dev.pkcomp.net 
 * @package    Accounts 
 * @subpackage Plugin Admin
 */
if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$roster->output['title'] .= $roster->locale->act['pagebar_plugininst'];

include($addon['inc_dir'] . 'install.lib.php');

/**
 * Make our menu from the config api
 */
// ----[ Set the tablename and create the config class ]----
include(ROSTER_LIB . 'config.lib.php');
$config = new roster_config( $roster->db->table('addon_config'), '`addon_id` = "' . $addon['addon_id'] . '"' );

// ----[ Get configuration data ]---------------------------
$config->getConfigData();

// ----[ Build the page items using lib functions ]---------
$menu .= $config->buildConfigMenu('rostercp-addon-' . $addon['basename']);

$op = ( isset($_POST['op']) ? $_POST['op'] : '' );

$id = ( isset($_POST['id']) ? $_POST['id'] : '' );


switch( $op )
{
	case 'deactivate':
		processActive($id,0);
		break;

	case 'activate':
		processActive($id,1);
		break;

	case 'process':
		$processed = processPlugin();
		break;

	default:
		break;
}

$plugins = getPluginList();

if( !empty($plugins) )
{
	// Generate plugins table
	$output =
	'<table class="bodyline" cellspacing="0">
		<tr>
			<th class="membersHeader">' . $roster->locale->act['installer_icon'] . '</th>
			<th class="membersHeader">' . $roster->locale->act['installer_plugininfo'] . '</th>
			<th class="membersHeader">' . $roster->locale->act['installer_status'] . '</th>
			<th class="membersHeaderRight">' . $roster->locale->act['installer_installation'] . '</th>
		</tr>
	';

	foreach( $plugins as $plugin )
	{
		if( !empty($plugin['icon']) )
		{
			if( strpos($plugin['icon'],'.') !== false )
			{
				$plugin['icon'] = $addon['dir'] . 'plugins/' . $plugin['basename'] . '/images/' . $plugin['icon'];
			}
			else
			{
				$plugin['icon'] = $roster->config['interface_url'] . 'Interface/Icons/' . $plugin['icon'] . '.' . $roster->config['img_suffix'];
			}
		}
		else
		{
			$plugin['icon'] = $roster->config['interface_url'].'Interface/Icons/inv_misc_questionmark.' . $roster->config['img_suffix'];
		}

		$output .= '	<tr>
			<td class="membersRow1"><img src="' . $plugin['icon'] . '" alt="[icon]" /></td>
			<td class="membersRow1"><table cellpadding="0" cellspacing="0">
				<tr>
					<td><span style="font-size:18px;" class="green">' . $plugin['fullname'] . '</span> v' . $plugin['version'] . '</td>
				</tr>
				<tr>
					<td>' . $plugin['description'] . '</td>
				</tr>
				<tr>
					<td><span class="blue">' . $roster->locale->act['installer_author'] . ': ' . $plugin['author'] . '</span></td>
				</tr>
			</table></td>
			<td class="membersRow1">' . ( $plugin['install'] == 3 ? '&nbsp;' : activeInactive($plugin['active'],$plugin['id']) ) . '</td>
			<td class="membersRowRight1">' . installUpgrade($plugin) . '</td>
		</tr>
	';
	}

	$output .= '</table>';
}
else
{
	$installer->setmessages('No plugins available!');
}

$errorstringout = $installer->geterrors();
$messagestringout = $installer->getmessages();
$sqlstringout = $installer->getsql();

$message = '';

// print the error messages
if( !empty($errorstringout) )
{
	$message .= messagebox($errorstringout,$roster->locale->act['installer_error'],'sred') . '<br />';
}

// Print the update messages
if( !empty($messagestringout) )
{
	$message .= messagebox($messagestringout,$roster->locale->act['installer_log'],'syellow');
}

$body .= ($message != '' ? $message . '<br />' : '') . ((isset($output) && !empty($output)) ? messagebox($output,$roster->locale->act['pagebar_plugininst'],'sblue') : '');

return;

/**
 * Gets the current action for active/inactive
 *
 * @param string $mode
 * @param int $id
 * @return string
 */
function activeInactive( $mode , $id )
{
	global $roster;

	if( $mode )
	{
		$type = '<form name="deactivate_' . $id . '" style="display:inline;" method="post" enctype="multipart/form-data" action="' . makelink() . '">
		<input type="hidden" name="op" value="deactivate" />
		<input type="hidden" name="id" value="' . $id . '" />
		<input ' . makeOverlib($roster->locale->act['installer_turn_off'],$roster->locale->act['installer_activated']) . 'type="image" src="' . $roster->config['img_url'] . 'admin/green.png" style="height:16px;width:16px;border:0;" alt="" />
	</form>';
	}
	else
	{
		$type = '<form name="activate_' . $id . '" style="display:inline;" method="post" enctype="multipart/form-data" action="' . makelink() . '">
		<input type="hidden" name="op" value="activate" />
		<input type="hidden" name="id" value="' . $id . '" />
		<input ' . makeOverlib($roster->locale->act['installer_turn_on'],$roster->locale->act['installer_deactivated']) . ' type="image" src="' . $roster->config['img_url'] . 'admin/red.png" style="height:16px;width:16px;border:0;" alt="" />
	</form>';
	}

	return $type;
}


/**
 * Gets the current action for install/uninstall/upgrade
 *
 * @param string $mode
 * @param string $name
 * @return string
 */
function installUpgrade( $plugin )
{
	global $roster;

	$mode = $plugin['install'];
	$name = $plugin['basename'];

	if( $mode == -1 )
	{
		$type = '<img ' . makeOverlib($roster->locale->act['installer_replace_files'],$roster->locale->act['installer_overwrite']) . ' src="' . $roster->config['img_url'] . 'admin/purple.png" style="height:16px;width:16px;border:0;cursor:help;" alt="" />';
	}
	elseif( $mode == 0 )
	{
		$type = '<form name="uninstall_' . $name . '" style="display:inline;" method="post" enctype="multipart/form-data" action="' . makelink() . '">
		<input type="hidden" name="op" value="process" />
		<input type="hidden" name="plugin" value="' . $name . '" />
		<input type="hidden" name="type" value="uninstall" />
		<input ' . makeOverlib($roster->locale->act['installer_click_uninstall'],$roster->locale->act['installer_installed']) . 'type="image" src="' . $roster->config['img_url'] . 'admin/green.png" style="height:16px;width:16px;border:0;" alt="" />
	</form>';
	}
	elseif( $mode == 1 )
	{
		$type = '<form name="upgrade_' . $name . '" style="display:inline;" method="post" enctype="multipart/form-data" action="' . makelink() . '">
		<input type="hidden" name="op" value="process" />
		<input type="hidden" name="plugin" value="' . $name . '" />
		<input type="hidden" name="type" value="upgrade" />
		<input ' . makeOverlib(sprintf($roster->locale->act['installer_click_upgrade'],$plugin['oldversion'],$plugin['version']),$roster->locale->act['installer_upgrade_avail']) . 'type="image" src="' . $roster->config['img_url'] . 'admin/blue.png" style="height:16px;width:16px;border:0;" alt="" />
	</form>';
	}
	elseif( $mode == 3 )
	{
		$type = '<form name="install_' . $name . '" style="display:inline;" method="post" enctype="multipart/form-data" action="' . makelink() . '">
		<input type="hidden" name="op" value="process" />
		<input type="hidden" name="plugin" value="' . $name . '" />
		<input type="hidden" name="type" value="install" />
		<input ' . makeOverlib($roster->locale->act['installer_click_install'],$roster->locale->act['installer_not_installed']) . 'type="image" src="' . $roster->config['img_url'] . 'admin/red.png" style="height:16px;width:16px;border:0;" alt="" />
	</form>';
	}

	return $type;
}


/**
 * Gets the list of currently installed roster plugins
 *
 * @return array
 */
function getPluginList()
{
	global $roster, $installer;

	// Initialize output
	$plugins = '';
	$output = '';

	$plugin_path = ROSTER_ADDONS . 'accounts' . DIR_SEP . 'inc' . DIR_SEP . 'plugin' . DIR_SEP;
	
	if( $handle = opendir($plugin_path) )
	{
		while( false !== ($file = readdir($handle)) )
		{
			if( $file != '.' && $file != '..' && $file != '.svn' )
			{
				$plugins[] = $file;
			}
		}
	}

	usort($plugins, 'strnatcasecmp');

	if( is_array($plugins) )
	{
		foreach( $plugins as $plugin )
		{
			$installfile = $plugin_path . $plugin . DIR_SEP . 'install.def.php';
			$install_class = $plugin . 'Install';

			if( file_exists($installfile) )
			{
				include_once($installfile);

				if( !class_exists($install_class) )
				{
					$installer->seterrors(sprintf($roster->locale->act['installer_no_class'],$plugin));
					continue;
				}

				$pluginstuff = new $install_class;

				$query = "SELECT * FROM `" . $roster->db->table('plugin', 'accounts') . "` WHERE `basename` = '$plugin';";
				$result = $roster->db->query($query);
				if (!$result)
				{
					$installer->seterrors('Database Error: ' . $roster->db->error() . '<br />SQL: ' . $query);
					return;
				}

				if( $roster->db->num_rows($result) > 0 )
				{
					$row = $roster->db->fetch($result);

					$output[$plugin]['id'] = $row['plugin_id'];
					$output[$plugin]['active'] = $row['active'];
					$output[$plugin]['oldversion'] = $row['version'];

					// -1 = overwrote newer version
					//  0 = same version
					//  1 = upgrade available
					$output[$plugin]['install'] = version_compare($pluginstuff->version,$row['version']);

				}
				else
				{
					$output[$plugin]['install'] = 3;
				}

				// Save current locale array
				// Since we add all locales for localization, we save the current locale array
				// This is in case one plugin has the same locale strings as another, and keeps them from overwritting one another
				$localetemp = $roster->locale->wordings;

				foreach( $roster->multilanguages as $lang )
				{
					$roster->locale->add_locale_file(ROSTER_ADDONS . $plugin . DIR_SEP . 'locale' . DIR_SEP . $lang . '.php',$lang);
				}

				$output[$plugin]['basename'] = $plugin;
				$output[$plugin]['fullname'] = ( isset($roster->locale->act[$pluginstuff->fullname]) ? $roster->locale->act[$pluginstuff->fullname] : $pluginstuff->fullname );
				$output[$plugin]['author'] = $pluginstuff->credits[0]['name'];
				$output[$plugin]['version'] = $pluginstuff->version;
				$output[$plugin]['icon'] = $pluginstuff->icon;
				$output[$plugin]['description'] = ( isset($roster->locale->act[$pluginstuff->description]) ? $roster->locale->act[$pluginstuff->description] : $pluginstuff->description );

				unset($pluginstuff);

				// Restore our locale array
				$roster->locale->wordings = $localetemp;
				unset($localetemp);
			}
		}
	}
	return $output;
}


/**
 * Sets plugin active/inactive
 *
 * @param int $id
 * @param int $mode
 */
function processActive( $id , $mode )
{
	global $roster, $installer;

	$query = "UPDATE `" . $roster->db->table('plugin') . "` SET `active` = '$mode' WHERE `plugin_id` = '$id' LIMIT 1;";
	$result = $roster->db->query($query);
	if( !$result )
	{
		$installer->seterrors('Database Error: ' . $roster->db->error() . '<br />SQL: ' . $query);
	}
	else
	{
		$mode = ( $mode ? $roster->locale->act['installer_activated'] : $roster->locale->act['installer_deactivated'] );
		$installer->setmessages('Plugin ' . $mode);
	}
}


/**
 * Plugin installer/upgrader/uninstaller
 *
 */
function processPlugin()
{
	global $roster, $installer;

	$plugin_name = $_POST['plugin'];

	if( preg_match('/[^a-zA-Z0-9_]/', $plugin_name) )
	{
		$installer->seterrors($roster->locale->act['invalid_char_module'],$roster->locale->act['installer_error']);
		return;
	}

	// Include plugin install definitions
	$pluginDir = ROSTER_ADDONS . $plugin_name . DIR_SEP;
	$plugin_install_file = $pluginDir . 'inc' . DIR_SEP . 'install.def.php';
	$install_class = $plugin_name . 'Install';

	if( !file_exists($plugin_install_file) )
	{
		$installer->seterrors(sprintf($roster->locale->act['installer_no_installdef'],$plugin_name),$roster->locale->act['installer_error']);
		return;
	}

	require($plugin_install_file);

	$plugin = new $install_class();
	$addata = escape_array((array)$plugin);
	$addata['basename'] = $plugin_name;

	if( $addata['basename'] == '' )
	{
		$installer->seterrors($roster->locale->act['installer_no_empty'],$roster->locale->act['installer_error']);
		return;
	}

	// Get existing plugin record if available
	$query = 'SELECT * FROM `' . $roster->db->table('plugin') . '` WHERE `basename` = "' . $addata['basename'] . '";';
	$result = $roster->db->query($query);
	if( !$result )
	{
		$installer->seterrors(sprintf($roster->locale->act['installer_fetch_failed'],$addata['basename']) . '.<br />MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error']);
		return;
	}
	$previous = $roster->db->fetch($result);
	$roster->db->free_result($result);

	// Give the installer the plugin data
	$installer->addata = $addata;

	$success = false;


	// Save current locale array
	// Since we add all locales for localization, we save the current locale array
	// This is in case one plugin has the same locale strings as another, and keeps them from overwritting one another
	$localetemp = $roster->locale->wordings;

	foreach( $roster->multilanguages as $lang )
	{
		$roster->locale->add_locale_file(ROSTER_ADDONS . $addata['basename'] . DIR_SEP . 'locale' . DIR_SEP . $lang . '.php',$lang);
	}

	// Collect data for this install type
	switch( $_POST['type'] )
	{
		case 'install':
			if( $previous )
			{
				$installer->seterrors(sprintf($roster->locale->act['installer_plugin_exist'],$installer->addata['basename'],$previous['fullname']));
				break;
			}
			$query = 'INSERT INTO `' . $roster->db->table('plugin') . '` VALUES (NULL,"' . $installer->addata['basename'] . '","' . $installer->addata['version'] . '",0,"' . $installer->addata['fullname'] . '","' . $installer->addata['description'] . '","' . $roster->db->escape(serialize($installer->addata['credits'])) . '","' . $installer->addata['icon'] . '","' . $installer->addata['wrnet_id'] . '",NULL);';
			$result = $roster->db->query($query);
			if( !$result )
			{
				$installer->seterrors('DB error while creating new plugin record. <br /> MySQL said:' . $roster->db->error(),$roster->locale->act['installer_error']);
				break;
			}
			$installer->addata['plugin_id'] = $roster->db->insert_id();

			// We backup the plugin config table to prevent damage
			$installer->add_backup($roster->db->table('plugin_config'));

			$success = $plugin->install();

			// Delete the plugin record if there is an error
			if( !$success )
			{
				$query = 'DELETE FROM `' . $roster->db->table('plugin') . "` WHERE `plugin_id` = '" . $installer->addata['plugin_id'] . "';";
				$result = $roster->db->query($query);
			}
			else
			{
				$installer->sql[] = 'UPDATE `' . $roster->db->table('plugin') . '` SET `active` = ' . (int)$installer->addata['active'] . " WHERE `plugin_id` = '" . $installer->addata['plugin_id'] . "';";
			}
			break;

		case 'upgrade':
			if( !$previous )
			{
				$installer->seterrors(sprintf($roster->locale->act['installer_no_upgrade'],$installer->addata['basename']));
				break;
			}
			/* Carry Over from AP branch
			if( !in_array($previous['basename'],$plugin->upgrades) )
			{
				$installer->seterrors(sprintf($roster->locale->act['installer_not_upgradable'],$plugin->fullname,$previous['fullname'],$previous['basename']));
				break;
			}
			*/

			$query = "UPDATE `" . $roster->db->table('plugin') . "` SET `basename`='" . $installer->addata['basename'] . "', `version`='" . $installer->addata['version'] . "', `active`=" . $installer->addata['active'] . ", `fullname`='" . $installer->addata['fullname'] . "', `description`='" . $installer->addata['description'] . "', `credits`='" . serialize($installer->addata['credits']) . "', `icon`='" . $installer->addata['icon'] . "', `wrnet_id`='" . $installer->addata['wrnet_id'] . "' WHERE `plugin_id`=" . $previous['plugin_id'] . ';';
			$result = $roster->db->query($query);
			if( !$result )
			{
				$installer->seterrors('DB error while updating the plugin record. <br /> MySQL said:' . $roster->db->error(),$roster->locale->act['installer_error']);
				break;
			}
			$installer->addata['plugin_id'] = $previous['plugin_id'];

			// We backup the plugin config table to prevent damage
			$installer->add_backup($roster->db->table('plugin_config'));

			$success = $plugin->upgrade($previous['version']);
			break;

		case 'uninstall':
			if( !$previous )
			{
				$installer->seterrors(sprintf($roster->locale->act['installer_no_uninstall'],$installer->addata['basename']));
				break;
			}
			if( $previous['basename'] != $installer->addata['basename'] )
			{
				$installer->seterrors(sprintf($roster->locale->act['installer_not_uninstallable'],$installer->addata['basename'],$previous['fullname']));
				break;
			}
			$query = 'DELETE FROM `' . $roster->db->table('plugin') . '` WHERE `plugin_id`=' . $previous['plugin_id'] . ';';
			$result = $roster->db->query($query);
			if( !$result )
			{
				$installer->seterrors('DB error while deleting the plugin record. <br /> MySQL said:' . $roster->db->error(),$roster->locale->act['installer_error']);
				break;
			}
			$installer->addata['plugin_id'] = $previous['plugin_id'];

			// We backup the plugin config table to prevent damage
			$installer->add_backup($roster->db->table('plugin_config'));

			$success = $plugin->uninstall();
			break;

		case 'purge':
			$success = purge($installer->addata['basename']);
			break;

		default:
			$installer->seterrors($roster->locale->act['installer_invalid_type']);
			$success = false;
			break;
	}

	if( !$success )
	{
		$installer->seterrors($roster->locale->act['installer_no_success_sql']);
		return false;
	}
	else
	{
		$success = $installer->install();
		$installer->setmessages(sprintf($roster->locale->act['installer_' . $_POST['type'] . '_' . $success],$installer->addata['basename']));
	}

	// Restore our locale array
	$roster->locale->wordings = $localetemp;
	unset($localetemp);

	return true;
}


function purge( $dbname )
{
	global $roster, $installer;

	// Delete plugin tables under dbname.
	$query = 'SHOW TABLES LIKE "' . $roster->db->prefix . 'plugins_' . $dbname . '%"';
	$tables = $roster->db->query($query);
	if( !$tables )
	{
		$installer->seterrors('Error while getting table names for ' . $dbname . '. MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error'],__FILE__,__LINE__,$query);
		return false;
	}
	if( $roster->db->num_rows($tables) )
	{
		while ($row = $roster->db->fetch($tables))
		{
			$query = 'DROP TABLE `' . $row[0] . '`;';
			$dropped = $roster->db->query($query);
			if( !$dropped )
			{
				$installer->seterrors('Error while dropping ' . $row[0] . '.<br />MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error'],__FILE__,__LINE__,$query);
				return false;
			}
			$roster->db->free_result($dropped);
		}
	}
	$roster->db->free_result($tables);

	// Get the plugin id for this basename
	$query = "SELECT `plugin_id` FROM `" . $roster->db->table('plugin') . "` WHERE `basename` = '" . $dbname . "';";
	$plugin_id = $roster->db->query_first($query);

	if( $plugin_id !== false )
	{
		// Delete menu entries
		$query = 'DELETE FROM `' . $roster->db->table('menu_button') . '` WHERE `plugin_id` = "' . $plugin_id . '";';
		$roster->db->query($query) or $installer->seterrors('Error while deleting menu entries for ' . $dbname . '.<br />MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error'],__FILE__,__LINE__,$query);
	}

	// Delete plugin table entry
	$query = 'DELETE FROM `' . $roster->db->table('plugin') . '` WHERE `basename` = "' . $dbname . '"';
	$roster->db->query($query) or $installer->seterrors('Error while deleting plugin table entry for ' . $dbname . '.<br />MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error'],__FILE__,__LINE__,$query);

	return true;
}