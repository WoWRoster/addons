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

	var $version = '1.9.9.316';
	var $wrnet_id = '117';

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
		$installer->add_config("'140','smf_menu_groupcal',NULL,'blockframe','menu'");
		$installer->add_config("'150','smf_menu_permissions','rostercp-addon-smfsync-permissions','makelink','menu'");

		$installer->add_config("'1100','main_enable','0','radio{yes^1|no^0','smf_menu_main'");
		$installer->add_config("'1101','forum_prefix','smf_','text{200|30','smf_menu_main'");
		$installer->add_config("'1102','forum_path','forum/','text{200|30','smf_menu_main'");
		$installer->add_config("'1103','choose_guild','1','function{getGuildList','smf_menu_main'");

		$installer->add_config("'1200','player_update_location','1','radio{yes^1|no^0','smf_menu_player'");
		$installer->add_config("'1201','player_location','Zone','select{Hearth^Hearth|Zone^Zone','smf_menu_player'");
		$installer->add_config("'1202','player_enable_signature','0','radio{yes^1|no^0','smf_menu_player'");
		$installer->add_config("'1203','player_signature',NULL,'text{1000|30','smf_menu_player'");
		$installer->add_config("'1204','player_enable_avatar','0','radio{yes^1|no^0','smf_menu_player'");
		$installer->add_config("'1205','player_avatar',NULL,'text{1000|30','smf_menu_player'");

		$installer->add_config("'1301','guild_suspend','0','radio{yes^1|no^0|restrict^2','smf_menu_guild'");
		$installer->add_config("'1302','guild_suspended_group','0','function{getGroups','smf_menu_guild'");
		$installer->add_config("'1303','guild_groups','0','radio{yes^1|no^0','smf_menu_guild'");
		$installer->add_config("'1304','guild_groups_create','0','radio{yes^1|no^0','smf_menu_guild'");
		$installer->add_config("'1305','guild_enable_personaltext','0','radio{yes^1|no^0','smf_menu_guild'");
		$installer->add_config("'1306','guild_protected_group','0','function{getGroups','smf_menu_guild'");

		$installer->add_config("'1401','groupcal_enable','0','radio{yes^1|no^0','smf_menu_groupcal'");
		$installer->add_config("'1402','groupcal_update_permission','3','access{','smf_menu_groupcal'");


		//Install the tables for GroupCalendar
		//These do not use the roster_ prefix for compatability with the original mod
		//Which can be used for more detailed information.
		$installer->create_table('group_calendar_attend',
								 "eid varchar(255) NOT NULL default '',
								  name varchar(255) NOT NULL default '',
								  modDate date NOT NULL default '0000-00-00',
								  modTime time NOT NULL default '00:00:00',
								  `status` char(2) NOT NULL default '',
								  `level` int(2) NOT NULL default '0',
								  racecode char(1) NOT NULL default '',
								  classcode char(1) NOT NULL default '',
								  `comment` varchar(255) NOT NULL default '',
								  guild varchar(255) NOT NULL default '',
								  guildRank int(4) NOT NULL default '0',
								  createDate date NOT NULL default '0000-00-00',
								  createTime time NOT NULL default '00:00:00'");

		$installer->create_table('group_calendar_info',
								"id varchar(255) NOT NULL default '',
								  creator varchar(255) NOT NULL default '',
								  `start` timestamp NOT NULL,
								  `type` varchar(255) NOT NULL default '',
								  `description` varchar(255) NOT NULL default '',
								  duration float NOT NULL default '0',
								  guildonly varchar(255) NOT NULL default '',
								  minlevel int(2) default NULL,
								  maxlevel int(2) default NULL,
								  limits varchar(255) default NULL,
								  maxattend tinyint(4) default NULL,
								  title varchar(255) NOT NULL default '',
								  PRIMARY KEY  (id)");
		$installer->create_table('group_calendar_other',
								"id varchar(255) NOT NULL default '',
								  `value` varchar(255) NOT NULL default '',
								  PRIMARY KEY  (id)");


		//This is used only until I can get integration with Roster.
		$installer->add_query ("INSERT INTO `{$roster->db->prefix}config` (`id` ,`config_name` ,`config_value` ,`form_type` ,`config_type` )VALUES ('1180', 'use_external_auth', '0', 'radio{on^1|off^0', 'main_conf' )");

		//Counter for the author. This is only here so I have a general idea of how many
		//people are using SMFSync. If you do not want to do this, please delete the following line
		file_get_contents("http://www.kaydence.org/smfsync.php?a=".urlencode($_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'])."&b=Install");

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
		global $roster;

		//This is used only until I can get integration with Roster.
		$installer->add_query ("DELETE FROM `{$roster->db->prefix}config` WHERE `id` = '1180' LIMIT 1");

		$installer->remove_all_config();
		$installer->remove_all_menu_button();


		//Counter for the author. This is only here so I have a general idea of how many
		//people are using SMFSync. If you do not want to do this, please delete the following line
		file_get_contents("http://www.kaydence.org/smfsync.php?a=".urlencode($_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'])."&b=Remove");


		return true;
	}
}
