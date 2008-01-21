<?php 
/** 
 * Dev.PKComp.net Accounts Addon
 * 
 * LICENSE: Licensed under the Creative Commons 
 *          "Attribution-NonCommercial-ShareAlike 2.5" license 
 * 
 * @copyright  2005-2007 Pretty Kitty Development 
 * @author	   mdeshane
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5" 
 * @link       http://dev.pkcomp.net 
 * @package    Accounts 
 * @subpackage Plugin Class 
 */ 

if ( !defined('ROSTER_INSTALLED') ) 
{ 
    exit('Detected invalid access to this file!'); 
}

class accountsPlugin extends accounts
{
	var $plugin;
	var $userTable;
	var $uidCol;
	var $unameCol;
	var $passCol;
	var $emailCol;
	var $nameCol;
	var $active = false;
	
	function accountsPlugin()
	{
		
	}

	/**
	 * Sets up plugin data for use in the plugin framework
	 *
	 * @param string $pluginname | The name of the plugin
	 * @return array $plugin  | The plugin's database record
	 *
	 * @global array $plugin_conf | The plugin's config data is added to this global array.
	 */
	function getplugin( $pluginname )
	{
		global $roster, $accounts;

		if ( !isset($accounts->plugin_data[$pluginname]) )
		{
			roster_die(sprintf($roster->locale->act['plugin_not_installed'],$pluginname),$roster->locale->act['plugin_error']);
		}

		$plugin = $accounts->plugin_data[$pluginname];

		// Get the plugin's location
		$plugin['dir'] = $addon['inc_dir'] . DIR_SEP . 'plugin' . DIR_SEP . $plugin['basename'];

		// Get the plugin's url
		$plugin['url'] = $addon['inc_dir'] . DIR_SEP . 'plugin' . DIR_SEP . $plugin['basename'] . '/';
		$plugin['url_full'] = ROSTER_URL . $plugin['url'];
		$plugin['url_path'] = ROSTER_PATH . $plugin['url'];

		// Get plugin's url to images directory
		$plugin['image_url'] = ROSTER_URL . $plugin['url'] . 'images/';
		$plugin['image_path'] = ROSTER_PATH . $plugin['url'] . 'images/';

		// Get the plugin's css style
		$plugin['css_file'] = $plugin['dir'] . 'style.css';

		if( file_exists($plugin['css_file']) )
		{
			$plugin['css_url'] = $plugin['url_path'] . 'style.css';
		}
		else
		{
			$plugin['css_url'] = '';
		}

		// Get the plugin's inc dir
		$plugin['inc_dir'] = $plugin['dir'] . 'inc' . DIR_SEP;

		// Get the plugin's conf file
		$plugin['conf_file'] = $plugin['inc_dir'] . DIR_SEP . 'conf.php';

		// Get the plugin's search file
		$plugin['search_file'] = $plugin['inc_dir'] . DIR_SEP . 'search.inc.php';

		// Get the plugin's locale dir
		$plugin['locale_dir'] = $plugin['dir'] . 'locale' . DIR_SEP;

		// Get the plugin's admin dir
		$plugin['admin_dir'] = $plugin['dir'] . 'admin' . DIR_SEP;

		// Get the plugin's trigger file
		$plugin['trigger_file'] = $plugin['inc_dir'] . 'update_hook.php';

		// Get the plugin's ajax functions file
		$plugin['ajax_file'] = $plugin['inc_dir'] . 'ajax.php';

		// Get config values for the default profile and insert them into the array
		$plugin['config'] = '';

		$query = "SELECT `config_name`, `config_value` FROM `" . $roster->db->table('plugin_config', $addon['basename']) . "` WHERE `plugin_id` = '" . $plugin['plugin_id'] . "' ORDER BY `id` ASC;";

		$result = $roster->db->query($query);

		if ( !$result )
		{
			die_quietly($roster->db->error(),$roster->locale->act['plugin_error'],__FILE__,__LINE__, $query );
		}

		if( $roster->db->num_rows($result) > 0 )
		{
			while( $row = $roster->db->fetch($result,SQL_ASSOC) )
			{
				$plugin['config'][$row['config_name']] = $row['config_value'];
			}
			$roster->db->free_result($result);
		}

		return $plugin;
	}

	/**
	 * Check to see if a plugin is active or not
	 *
	 * @param string $name | Plugin basename
	 * @return bool
	 */
	function active_plugin( $name )
	{
		global $roster, $accounts;

		if( !isset($accounts->plugin_data[$name]) )
		{
			return false;
		}
		else
		{
			return (bool)$accounts->plugin_data[$name]['active'];
		}
	}

}