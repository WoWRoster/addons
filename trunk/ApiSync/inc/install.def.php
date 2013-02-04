<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ApiSync install definition
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    ApiSync
*/

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * ApiSync Addon Installer
 * @package ApiSync
 * @subpackage Installer
 */
class ApiSyncInstall
{
	var $active = true;
	var $icon = 'spell_deathknight_bladedarmor';

	var $version = '1.0.1';
	var $wrnet_id  = '';

	var $fullname = 'Roster APIsync';
	var $description = 'Syncronizes WoWRoster with Blizzard\'s API';
	var $credits = array(
            array(	"name"=>	"Ulminia",
			"info"=>	"Author API Dev"),
			array(	"name"=>	"poetter@WoWRoster.net",
			"info"=>	"Author of ArmorySync"),

	);


	/**
	 * Install function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;
		
		if( !function_exists('curl_init') )
		{
			$installer->seterrors('Curl not detected ApiSync may not work!!!!!');
			return;
		}

		// Master and menu entries
		$installer->add_config("'1','startpage','ApiSync_conf','display','master'");
		$installer->add_config("'10','ApiSync_conf',NULL,'blockframe','menu'");
		$installer->add_config("'15','ApiSync_ranks',NULL,'blockframe','menu'");
		$installer->add_config("'20','ApiSync_scaning',NULL,'blockframe','menu'");
		$installer->add_config("'30','ApiSync_access',NULL,'blockframe','menu'");
		$installer->add_config("'90','ApiSync_debug',NULL,'blockframe','menu'");

		$installer->add_config("'301','ApiSync_MinLvl',NULL,'page{1','ApiSync_images'");
		$installer->add_config("'302','ApiSync_MaxLvl',NULL,'page{1','ApiSync_images'");
		$installer->add_config("'303','ApiSync_Rank','','select{None^|GuildMaster^0|Rank 1^1|Rank 2^2|Rank 3^3|Rank 4^4|Rank 5^5|Rank 6^6|Rank 7^7|Rank 8^8|Rank 9^9|Rank 10^10|Rank 11^11|Rank 12^12|', 'ApiSync_images'");
		$installer->add_config("'301','ApiSync_frm1',NULL,'page{1','ApiSync_images'");
		$installer->add_config("'301','ApiSync_frm1',NULL,'page{1','ApiSync_images'");
		$installer->add_config("'301','ApiSync_frm1',NULL,'page{1','ApiSync_images'");

		$installer->add_config("'1100', 'ApiSync_minlevel', '10', 'text{2|2', 'ApiSync_conf'");
		$installer->add_config("'1200', 'ApiSync_synchcutofftime', '1', 'text{4|4', 'ApiSync_conf'");
		$installer->add_config("'1250', 'ApiSync_use_ajax', '0', 'radio{off^0|Off^0', 'ApiSync_conf'");
		$installer->add_config("'1300', 'ApiSync_reloadwaittime', '24', 'text{4|4', 'ApiSync_conf'");
		$installer->add_config("'1350', 'ApiSync_fetch_timeout', '8', 'text{2|2', 'ApiSync_conf'");
		$installer->add_config("'1360', 'ApiSync_skip_start', '0', 'radio{On^1|Off^0', 'ApiSync_conf'");
		$installer->add_config("'1370', 'ApiSync_status_hide', '0', 'radio{On^1|Off^0', 'ApiSync_conf'");
		$installer->add_config("'1400', 'ApiSync_protectedtitle', 'Banker', 'text{64|20', 'ApiSync_conf'");

		$installer->add_config("'1540', 'ApiSync_rank_set_order', '3', 'select{Roster/ApiSync/Armory^3|ApiSync/Roster/Armory^2|Roster/Armory^1|Armory^0', 'ApiSync_ranks'");
		$installer->add_config("'1550', 'ApiSync_rank_0', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1551', 'ApiSync_rank_1', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1552', 'ApiSync_rank_2', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1553', 'ApiSync_rank_3', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1554', 'ApiSync_rank_4', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1555', 'ApiSync_rank_5', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1556', 'ApiSync_rank_6', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1557', 'ApiSync_rank_7', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1558', 'ApiSync_rank_8', '', 'text{64|20', 'ApiSync_ranks'");
		$installer->add_config("'1559', 'ApiSync_rank_9', '', 'text{64|20', 'ApiSync_ranks'");

		$installer->add_config("'1440', 'ApiSync_char_update_access', '1', 'access', 'ApiSync_access'");
		$installer->add_config("'1450', 'ApiSync_guild_update_access', '2', 'access', 'ApiSync_access'");
		$installer->add_config("'1460', 'ApiSync_guild_memberlist_update_access', '2', 'access', 'ApiSync_access'");
		$installer->add_config("'1470', 'ApiSync_realm_update_access', '3', 'access', 'ApiSync_access'");
		$installer->add_config("'1480', 'ApiSync_guild_add_access', '3', 'access', 'ApiSync_access'");

		$installer->add_config("'2200', 'ApiSync_pic_effects', '1', 'radio{On^1|Off^0', 'ApiSync_effects'");

		$installer->add_config("'9100', 'ApiSync_debuglevel', '1', 'select{All Methods Data Info^3|Armory & Job Data Info^2|Base Info^1|Quiet^0', 'ApiSync_debug'");
		$installer->add_config("'9110', 'ApiSync_debugdata', '0', 'radio{yes^1|no^0', 'ApiSync_debug'");
		$installer->add_config("'9120', 'ApiSync_javadebug', '0', 'radio{yes^1|no^0', 'ApiSync_debug'");
		$installer->add_config("'9130', 'ApiSync_xdebug_php', '0', 'radio{yes^1|no^0', 'ApiSync_debug'");
		$installer->add_config("'9140', 'ApiSync_xdebug_ajax', '0', 'radio{yes^1|no^0', 'ApiSync_debug'");
		$installer->add_config("'9150', 'ApiSync_xdebug_idekey', 'test', 'text{64|10', 'ApiSync_debug'");
		$installer->add_config("'9200', 'ApiSync_sqldebug', '0', 'radio{yes^1|no^0', 'ApiSync_debug'");
		$installer->add_config("'9300', 'ApiSync_updateroster', '1', 'radio{yes^1|no^0', 'ApiSync_debug'");

		$installer->add_menu_button('async_button1','char', '', 'as_char.jpg');
		$installer->add_menu_button('async_button2','guild', '', 'as_char.jpg');
		$installer->add_menu_button('async_button3','realm', '', 'as_char.jpg');
        // dont uncoment these they do not work!
		$installer->add_menu_button('async_button4','guild', 'memberlist', 'as_memberlist.jpg');
		$installer->add_menu_button('async_button5','util', 'add', 'as_guild_add.jpg');
		
		//ROSTER_CACHEDIR


		$installer->create_table(
				$installer->table('jobs'),
					"
						`job_id` int(11) unsigned NOT NULL auto_increment,
						`starttimeutc` datetime NOT NULL,
						PRIMARY KEY  (`job_id`)
					" );
		$installer->create_table(
				$installer->table('jobqueue'),
							"
							 `job_id` int(11) unsigned NOT NULL,
							 `member_id` int(11) unsigned NOT NULL,
							 `name` varchar(64) NOT NULL,
							 `guild_id` int(11) NOT NULL,
							 `guild_name` varchar(64) NOT NULL,
							 `server` varchar(32) NOT NULL,
							 `region` char(2) NOT NULL,
							 `guild_info` int(11) unsigned default NULL,
							 `character_info` tinyint(1) default NULL,
							 `skill_info` int(11) default NULL,
							 `reputation_info` int(11) default NULL,
							 `equipment_info` int(11) default NULL,
							 `talent_info` int(11) default NULL,
							 `starttimeutc` datetime default NULL,
							 `stoptimeutc` datetime default NULL,
							 `log` text,
							 PRIMARY KEY  (`job_id`,`member_id`)
							" );
		$installer->create_table(
				$installer->table('updates'),
							"
							`member_id` int(11) NOT NULL,
							`dateupdatedutc` datetime default NULL,
							PRIMARY KEY  (`member_id`)
							" );
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
		global $installer;
		
		/*
		if ( version_compare('2.7.2.515', $oldversion,'>') == true ) {
			$installer->remove_all_menu_button();
                        $installer->update_config('1250', 'config_value=0');
                        $installer->add_menu_button('async_button1','char', '', 'as_char.jpg');
			$installer->add_menu_button('async_button2','guild', '', 'as_char.jpg');
			$installer->add_menu_button('async_button3','realm', '', 'as_char.jpg');
                	$installer->add_menu_button('async_button6','guild', 'bob', 'memberlist_update.png');
                        
                        
                }
		*/
		if ( version_compare('1.0.1', $oldversion,'>') == true ) {
			$installer->add_menu_button('async_button5','util', 'add', 'as_guild_add.jpg');
	    }

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
		$installer->drop_table( $installer->table('jobs') );
		$installer->drop_table( $installer->table('jobqueue') );
		$installer->drop_table( $installer->table('updates') );
		return true;
	}
}
