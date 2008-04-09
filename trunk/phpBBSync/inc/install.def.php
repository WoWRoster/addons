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
 * @package    phpBBSync
 * @subpackage Installer
*/
 
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
 
/**
 * Installer phpBBSync
 *
 * @package    phpBBSync
 * @subpackage Installer
 */
class phpbbsyncInstall
{
	var $active = true;
	var $icon = 'phpbb.png';
 
	var $version = '1.1.0.1';
	var $wrnet_id = 128;
 
	var $fullname = 'phpbbsync';
	var $description = 'phpbbsync_desc';
	var $credits = array(
	array(	"name"=>	"jaffa",
			"info"=>	"Original Author")
			/* Need to put in info about smfsync here*/
	);
 
 
	/**
	 * Install Function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;
 
		// Master and menu entries
		$installer->add_config("'1','startpage','menu_main','display','master'");

		$installer->add_config("'110','phpbb_menu_main',NULL,'blockframe','menu'");
		$installer->add_config("'120','phpbb_menu_player',NULL,'blockframe','menu'");
		$installer->add_config("'130','phpbb_menu_guild',NULL,'blockframe','menu'");

		$installer->add_config("'1100','main_enable','0','radio{yes^1|no^0','phpbb_menu_main'");
		$installer->add_config("'1101','forum_prefix','','text{200|30','phpbb_menu_main'");
		/*$installer->add_config("'1102','forum_path','forum/','text{200|30','phpbb_menu_main'");*/
		$installer->add_config("'1103','choose_guild','1','function{getGuildList','phpbb_menu_main'");
		$installer->add_config("'1104','forum_type','1','radio{DF^1|phpBB3^0','phpbb_menu_main'");

		$installer->add_config("'1200','player_update_location','1','radio{yes^1|no^0','phpbb_menu_player'");
		$installer->add_config("'1201','player_location','Zone','select{Hearth^Hearth|Zone^Zone','phpbb_menu_player'");
		$installer->add_config("'1202','player_enable_signature','0','radio{yes^1|no^0','phpbb_menu_player'");
		$installer->add_config("'1203','player_signature',NULL,'text{1000|30','phpbb_menu_player'");
		$installer->add_config("'1204','player_enable_avatar','0','radio{yes^1|no^0','phpbb_menu_player'");
		$installer->add_config("'1205','player_avatar',NULL,'text{1000|30','phpbb_menu_player'");

		$installer->add_config("'1301','guild_suspend','0','radio{yes^1|no^0|group^2','phpbb_menu_guild'");
		$installer->add_config("'1302','guild_suspended_group','0','function{getGroups','phpbb_menu_guild'");
		$installer->add_config("'1303','guild_groups','0','radio{yes^1|no^0','phpbb_menu_guild'");
		//$installer->add_config("'1304','guild_groups_create','0','radio{yes^1|no^0','phpbb_menu_guild'");
		//$installer->add_config("'1305','guild_enable_personaltext','0','radio{yes^1|no^0','phpbb_menu_guild'");
		$installer->add_config("'1306','guild_protected_group','0','function{getGroups','phpbb_menu_guild'");
		$installer->add_config("'1307','guild_ranks','0','radio{yes^1|no^0','phpbb_menu_guild'");
 
		return true;
	}
 
	/**
	 * Upgrade Function
	 *
	 * @param string $oldversion
	 * @return bool
	 */
	function upgrade($oldversion)
	{
		global $installer;
 
		if( version_compare('1.0.0.1', $oldversion,'>') == true )
		{
			$installer->add_config("'1202','player_enable_signature','0','radio{yes^1|no^0','phpbb_menu_player'");
			$installer->add_config("'1203','player_signature',NULL,'text{1000|30','phpbb_menu_player'");
			$installer->add_config("'1204','player_enable_avatar','0','radio{yes^1|no^0','phpbb_menu_player'");
			$installer->add_config("'1205','player_avatar',NULL,'text{1000|30','phpbb_menu_player'");
			$installer->add_config("'1307','guild_ranks','0','radio{yes^1|no^0','phpbb_menu_guild'");
			//update suspend group here
			$installer->update_config('1302', 'form_type=radio{yes^1|no^0|group^2');
			//remove forum path
			$installer->remove_config('1102');
		}
		if( version_compare('1.1.0.1', $oldversion,'>') == true )
		{
			$installer->add_config("'1104','forum_type','0','radio{DF^0|phpBB3^1','phpbb_menu_main'");
		}
		return true;
	}
 
	/**
	 * Un-Install Function
	 *
	 * @return bool
	 */
	function uninstall()
	{
		global $installer;
 
		$installer->remove_all_config();
		$installer->remove_all_menu_button();
		return true;
	}
}