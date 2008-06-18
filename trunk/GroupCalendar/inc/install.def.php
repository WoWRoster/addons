<?php
/**
 * WoWRoster.net WoWRoster
 *
 * EventCalendar Install Definition File
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @link       http://www.wowroster.net
 * @package    EventCalendar
*/

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * GroupCalendar Addon Installer
 * @package EventCalendar
 * @subpackage Installer
 */
class GroupCalendarInstall
{
	var $active = true;
	var $icon = 'spell_shadow_unstableafllictions'; 

	var $version = '1.0.1999';
	var $wrnet_id = '0';

	var $fullname = 'Guild Group Calendar';
	var $description = 'Installs the calender';
	var $credits = array(
		array(	"name"=>	"Ulminia - Ulminia@gmail.com",
			"info"=>	"GroupCalendar for roster 2.0 / 1.9.9.xxx Beta"),
		array(	"name"=>	"Ulminia@gmail.com",
			"info"=>	"Original author"),
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
		
		# Master data for the config file
		$installer->add_config("'1','startpage','GroupCalendar_config','display','master'");

		# Config menu entries
		$installer->add_config("'6000','GroupCalendar_config',NULL,'blockframe','menu'");
            $installer->add_config("'6002', 'CURR_TIME_OFFSET', '-4', 'select{-12^-12|-11^-11|-10^-10|-9^-9|-8^-8|-7^-7|-6^-6|-5^-5|-4^-4|-3^-3|-2^-2|-1^-1|0^0|+1^+1|+2^+2|+3^+3|+4^+4|+5^+5|+6^+6|+7^+7|+8^+8|+9^+9|+10^+10|+11^+11|+12^+12|+13^+13', 'GroupCalendar_config'");
		$installer->add_config("'6003', 'WOW_TIME_OFFSET', '+4', 'select{-12^-12|-11^-11|-10^-10|-9^-9|-8^-8|-7^-7|-6^-6|-5^-5|-4^-4|-3^-3|-2^-2|-1^-1|0^0|+1^+1|+2^+2|+3^+3|+4^+4|+5^+5|+6^+6|+7^+7|+8^+8|+9^+9|+10^+10|+11^+11|+12^+12|+13^+13', 'GroupCalendar_config'");
		$installer->add_config("'6004', 'TIME_DISPLAY_FORMAT', '12hr', 'select{12 Hour^12hr|24 Hour^24hr', 'GroupCalendar_config'");
		$installer->add_config("'6005', 'DISPLAY_INSTANCE_RESETS', '1', 'radio{On^1|Off^0', 'GroupCalendar_config'");
		$installer->add_config("'6006', 'COLOR_CODE_PLAYERS', '1', 'radio{On^1|Off^0', 'GroupCalendar_config'");
		$installer->add_config("'6007', 'MAX_TITLES_DISPLAYED', '2', 'text{2|2', 'GroupCalendar_config'");
		$installer->add_config("'6008', 'TITLE_CHAR_LIMIT', '32', 'text{10|5', 'GroupCalendar_config'");
		$installer->add_config("'6009', 'WEEK_START', '0', 'select{Sunday^0|Monday^1|Tuesday^2|Wednesday^3|Thursday^4|Friday^5|Saturday^6', 'GroupCalendar_config'");
		$installer->add_config("'6010', 'INSTANCE_RESET_TYPE', 'BOTH', 'select{Original^Orig|Burning Crusade^TBC|Both^ALL', 'GroupCalendar_config'");
		$installer->add_config("'6011', 'INSTANCE_RESET_ICON_SIZE', '15', 'text{2|2', 'GroupCalendar_config'");
		$installer->add_config("'6012', 'EVENT_ICON_SIZE', '24', 'text{2|2', 'GroupCalendar_config'");


		# Roster menu entry
		$installer->add_menu_button('gc_button','guild');

		//$installer->create_table($installer->table('events'),
			$installer->create_table($installer->table('attend'),
  "eid varchar(255) NOT NULL default '',
  name varchar(255) NOT NULL default '',
  modDate date NOT NULL default '0000-00-00',
  modTime time NOT NULL default '00:00:00',
  `status` char(2) NOT NULL default '',
  `level` int(2) NOT NULL default '0',
  racecode char(1) NOT NULL default '',
  classcode char(1) NOT NULL default '',
  `comment` varchar(255) NOT NULL default '',
  `role` varchar(255) NOT NULL default '',
  guild varchar(255) NOT NULL default '',
  guildRank int(4) NOT NULL default '0',
  createDate date NOT NULL default '0000-00-00',
  createTime time NOT NULL default '00:00:00'"
);

$installer->create_table($installer->table('info'),
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
  PRIMARY KEY  (id)
");


$installer->create_table($installer->table('other'),
  "id varchar(255) NOT NULL default '',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (id)
");


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

            if( version_compare($this->$version, $oldversion,'>') == true )
		{
			$installer->add_query("ALTER TABLE `" . $installer->table('attend') . "`"
				. " ADD `role` varchar(255) NOT NULL default '0' AFTER `comment`;");
				
		}
		
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

		$installer->drop_table( $installer->table('attend') );
		$installer->drop_table( $installer->table('info') );
		$installer->drop_table( $installer->table('other') );
		
		return true;
	}
}
