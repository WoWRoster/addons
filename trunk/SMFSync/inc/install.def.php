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

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * SMFSync Addon Installer
 * @package SMFSync
 * @subpackage Installer
 */
class smfsync
{
	var $active = true;
	var $icon = 'smf.gif';

	var $version = '1.9.9.233';

	var $fullname = 'smfsync';
	var $description = 'smfsync_desc';
	var $credits = array(
		array(	"name"=>	"Boyo",
				"info"=>	"Original author")
	);


	/**
	 * Install function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;
		global $roster;

		//Format is "'id','config_name','config_value','form_type','config_type'"
		// Master and menu entries
		$installer->add_config("'1','startpage','menu_main','display','master'");

		$installer->add_config("'110','smf_menu_main',NULL,'blockframe','menu'");
		$installer->add_config("'120','smf_menu_player',NULL,'blockframe','menu'");
		$installer->add_config("'130','smf_menu_guild',NULL,'blockframe','menu'");
		$installer->add_config("'140','smf_menu_permissions','rostercp-addon-smfsync-permissions','makelink','menu'");

		$installer->add_config("'1100','main_enable','0','radio{yes^1|no^0','smf_menu_main'");
		$installer->add_config("'1101','forum_prefix','smf_','text{200|30','smf_menu_main'");
		$installer->add_config("'1102','forum_path','forum/','text{200|30','smf_menu_main'");
		$installer->add_config("'1103','choose_guild','1','function{GetGuildList','smf_menu_main'");

		$installer->add_config("'1200','player_update_location','1','radio{yes^1|no^0','smf_menu_player'");
		$installer->add_config("'1201','player_location','Zone','select{Hearth^Hearth|Zone^Zone','smf_menu_player'");
		$installer->add_config("'1202','player_enable_signature','0','radio{yes^1|no^0','smf_menu_player'");
		$installer->add_config("'1203','player_signature',NULL,'text{200|30','smf_menu_player'");
		//$installer->add_config("'1203','player_signature','[url=http://sovereign.kaydence.org/roster/char.php?member=%name%&amp;server=Blackwater%20Raiders][img]http://sovereign.kaydence.org/roster/addons/siggen/sig.php?member=%name%[/img][/url]','text{200|30','smf_menu_player'");
		$installer->add_config("'1204','player_enable_avatar','0','radio{yes^1|no^0','smf_menu_player'");
		$installer->add_config("'1205','player_avatar',NULL,'text{200|30','smf_menu_player'");
		//$installer->add_config("'1205','player_avatar','http://sovereign.kaydence.org/roster/addons/siggen/siggen.php?member=%name%&amp;mode=avatar&amp;saveonly=0','text{200|30','smf_menu_player'");

		//$installer->add_config("'1300','guild_add','0','radio{yes^1|no^0','smf_menu_guild'");
		$installer->add_config("'1301','guild_suspend','0','radio{yes^1|no^0','smf_menu_guild'");
		$installer->add_config("'1302','guild_groups','0','radio{yes^1|no^0','smf_menu_guild'");
		$installer->add_config("'1303','guild_groups_create','0','radio{yes^1|no^0','smf_menu_guild'");
		$installer->add_config("'1304','guild_enable_personaltext','0','radio{yes^1|no^0','smf_menu_guild'");

		$installer->add_query ("INSERT INTO `{$roster->db->prefix}config` (`id` ,`config_name` ,`config_value` ,`form_type` ,`config_type` )VALUES ('1180', 'use_external_auth', '0', 'radio{on^1|off^0', 'main_conf'");

		return true;
	}

	/**
	 * Upgrade functoin
	 *
	 * @param string $oldversion
	 * @return bool
	 */
	function upgrade($oldversion)
	{
		// Nothing to upgrade from yet
		return true;
	}

	/**
	 * Un-Install function
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
