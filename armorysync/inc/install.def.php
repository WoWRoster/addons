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
 * GuildBank Addon Installer
 * @package GuildBank
 * @subpackage Installer
 */
class armorysync
{
	var $active = true;
	var $icon = 'inv_misc_enggizmos_02';
        
	var $version = '2.5.9.716';

	var $fullname = 'Armory Sync';
	var $description = 'Syncronises chars with Blizzards Armory';
	var $credits = array(
		array(	"name"=>	"daniel@siegers.biz",
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

		// Master and menu entries
		$installer->add_config("'1','startpage','armorysync_conf','display','master'");
		$installer->add_config("'110','armorysync_conf',NULL,'blockframe','menu'");
		$installer->add_config("'1100', 'armorysync_minlevel', '10', 'text{2|2', 'armorysync_conf'");
		$installer->add_config("'1200', 'armorysync_synchcutofftime', '10', 'text{4|4', 'armorysync_conf'");
                $installer->add_config("'1300', 'armorysync_reloadwaittime', '5', 'text{4|4', 'armorysync_conf'");
                $installer->add_config("'1400', 'armorysync_protectedtitle', 'Banker', 'text{30|64', 'armorysync_conf'");
//		$installer->add_config("'1500', 'armorysync_debuglevel', '2', 'radio{more verbose^2|verbose^1|quiet^0', 'armorysync_conf'");
//		$installer->add_config("'1600', 'armorysync_updateroster', '1', 'radio{yes^1|no^0', 'armorysync_conf'");
//		$installer->add_config("'1700', 'armorysync_ismysqllower411', '0', 'radio{yes^1|no^0', 'armorysync_conf'");
		
		$installer->add_menu_button('async_button','realm');
		$installer->add_menu_button('async_button','guild');
		$installer->add_menu_button('async_button2','guild', 'memberlist', 'inv_misc_enggizmos_01');
		$installer->add_menu_button('async_button','char');
                
                $installer->add_query("
                        CREATE TABLE `". $installer->table('jobs') ."`
                            (                                       
                                `job_id` int(11) unsigned NOT NULL auto_increment,                                 
                                `starttimeutc` datetime NOT NULL,                                                  
                                PRIMARY KEY  (`job_id`)                                                            
                            ) ENGINE=MyISAM;");
                $installer->add_query("
                        CREATE TABLE `". $installer->table('jobqueue') ."`
                                    (
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
                                   ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;");
                
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
            $installer->add_query("DROP TABLE IF EXISTS `" . $installer->table('jobs') . "`;");
            $installer->add_query("DROP TABLE IF EXISTS `" . $installer->table('jobqueue') . "`;");
            return true;
	}
}
