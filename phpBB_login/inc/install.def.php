<?php
/**
 * WoWRoster.net WoWRoster
 *
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    phpBB_login
 * @subpackage Installer
**/

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Installer for phpBB_login addon
 * @package    phpBB_login
 * @subpackage Installer
**/
class phpBB_loginInstall
{
	var $active = false;
	var $version = '1.0';
	var $icon = 'ability_ambush';
	var $fullname = 'phpBB Login';
	var $description = "Authenticate's members from their phpBB username and password";
	var $wrnet_id = '';
	var $credits = array(
		array( "name" => "Munazz", "info" => "Original Author")
	);
	
	function install() {
		global $installer;

		# Master data for the config file
		$installer->add_config("'1','startpage','display','display','master'");
		$installer->add_config("'110','phpbb_conf',NULL,'blockframe','menu'");

		$installer->add_config("'1000', 'phpbb_admin_groups', '', 'text{255|30', 'phpbb_conf'");
		$installer->add_config("'1010', 'phpbb_officer_groups', '', 'text{255|30', 'phpbb_conf'"); 
		$installer->add_config("'1020', 'phpbb_guild_groups', '', 'text{255|30', 'phpbb_conf'"); 

		return true;
	}
	
	function upgrade($oldversion) {
		global $installer;
		return true;
	}
	
	function uninstall() {
		global $installer;
		
		$installer->remove_all_config();
		
		return true;
	}
}