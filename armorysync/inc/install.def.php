<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySync install definition
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    ArmorySync
*/

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * ArmorySync Addon Installer
 * @package ArmorySync
 * @subpackage Installer
 */
class armorysync
{
	var $active = true;
	var $icon = 'inv_misc_missilesmall_blue';

	var $version = '2.6.0.256';

	var $fullname = 'Armory Sync';
	var $description = 'Syncronizes chars with Blizzard\'s Armory';
	var $credits = array(
		array(	"name"=>	"poetter@WoWRoster.net",
			"info"=>	"Author of 2.6 rewrite"),
		array(	"name"=>	"kristoff22@WoWRoster.net",
			"info"=>	"Original author"),
		array(	"name"=>	"tuigii@wowroster.net",
			"info"=>	"testing, bugfixing and translating"),
		array(	"name"=>	"zanix@wowroster.net",
			"info"=>	"testing, bugfixing and translating"),
		array(	"name"=>	"ds@wowroster.net",
			"info"=>	"supporting"),
		array(	"name"=>	"Subxero@wowroster.net",
			"info"=>	"testing, bugfixing and code support"),

	);


	/**
	 * Install function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;

		// Master and menu entries
		$installer->add_config("'1','startpage','armorysync_conf','display','master'");
		$installer->add_config("'110','armorysync_conf',NULL,'blockframe','menu'");
		$installer->add_config("'1100', 'armorysync_minlevel', '10', 'text{2|2', 'armorysync_conf'");
		$installer->add_config("'1200', 'armorysync_synchcutofftime', '1', 'text{4|4', 'armorysync_conf'");
                $installer->add_config("'1250', 'armorysync_use_ajax', '1', 'radio{On^1|Off^0', 'armorysync_conf'");
                $installer->add_config("'1300', 'armorysync_reloadwaittime', '5', 'text{4|4', 'armorysync_conf'");
                $installer->add_config("'1350', 'armorysync_fetch_timeout', '8', 'text{2|2', 'armorysync_conf'");
                $installer->add_config("'1360', 'armorysync_skip_start', '0', 'radio{On^1|Off^0', 'armorysync_conf'");
                $installer->add_config("'1370', 'armorysync_status_hide', '0', 'radio{On^1|Off^0', 'armorysync_conf'");
                $installer->add_config("'1400', 'armorysync_protectedtitle', 'Banker', 'text{30|64', 'armorysync_conf'");
                $installer->add_config("'1440', 'armorysync_char_update_access', '1', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1450', 'armorysync_guild_update_access', '2', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1460', 'armorysync_guild_memberlist_update_access', '2', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1470', 'armorysync_realm_update_access', '3', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1480', 'armorysync_guild_add_access', '3', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
//		$installer->add_config("'1500', 'armorysync_debuglevel', '2', 'radio{more verbose^2|verbose^1|quiet^0', 'armorysync_conf'");
//		$installer->add_config("'1600', 'armorysync_updateroster', '1', 'radio{yes^1|no^0', 'armorysync_conf'");
//		$installer->add_config("'1700', 'armorysync_ismysqllower411', '0', 'radio{yes^1|no^0', 'armorysync_conf'");

		$installer->add_menu_button('async_button1','char', '', $addon['image_path'].'as_char.jpg');
		$installer->add_menu_button('async_button2','guild', '', $addon['image_path'].'as_char.jpg');
		$installer->add_menu_button('async_button3','realm', '', $addon['image_path'].'as_char.jpg');
		$installer->add_menu_button('async_button4','guild', 'memberlist', $addon['image_path'].'as_memberlist.jpg');
		$installer->add_menu_button('async_button5','util', 'guildadd', $addon['image_path'].'as_guild_add.jpg');


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
            if ( version_compare('2.6.0.232', $oldversion,'>') == true ) {
                $installer->add_config("'1440', 'armorysync_char_update_access', '1', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1450', 'armorysync_guild_update_access', '2', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1460', 'armorysync_guild_memberlist_update_access', '2', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1470', 'armorysync_realm_update_access', '3', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
                $installer->add_config("'1480', 'armorysync_guild_add_access', '3', 'radio{Admin^3|Officer^2|Guild^1|Everyone^0', 'armorysync_conf'");
            }

            if ( version_compare('2.6.0.235', $oldversion,'>') == true ) {
		$installer->update_menu_button('async_button','char', '', 'inv_misc_missilesmall_blue');
		$installer->update_menu_button('async_button','realm', '', 'inv_misc_missilesmall_blue');
		$installer->update_menu_button('async_button','guild', '', 'inv_misc_missilesmall_blue');
		$installer->update_menu_button('async_button2','guild', 'memberlist', 'inv_misc_missilesmall_green');
		$installer->update_menu_button('async_button3','util', 'guildadd', 'inv_misc_missilesmall_red');
                $installer->create_table(
                        $installer->table('updates'),
                                    "
                                    `member_id` int(11) NOT NULL,
                                    `dateupdatedutc` datetime default NULL,
                                    PRIMARY KEY  (`member_id`)
                                    " );
	    }

            if ( version_compare('2.6.0.236', $oldversion,'>') == true ) {
                $installer->add_config("'1370', 'armorysync_status_hide', '1', 'radio{On^1|Off^0', 'armorysync_conf'");
            }


            if ( version_compare('2.6.0.254', $oldversion,'>') == true ) {
                $installer->add_config("'1250', 'armorysync_use_ajax', '1', 'radio{On^1|Off^0', 'armorysync_conf'");

                $installer->remove_all_menu_button();
		$installer->add_menu_button('async_button1','char', '', $addon['image_path'].'as_char.jpg');
		$installer->add_menu_button('async_button2','guild', '', $addon['image_path'].'as_char.jpg');
		$installer->add_menu_button('async_button3','realm', '', $addon['image_path'].'as_char.jpg');
		$installer->add_menu_button('async_button4','guild', 'memberlist', $addon['image_path'].'as_memberlist.jpg');
		$installer->add_menu_button('async_button5','util', 'guildadd', $addon['image_path'].'as_guild_add.jpg');

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
