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
class ventstatusInstall
{
	var $active = true;
	var $icon = 'ability_warrior_battleshout'; 

	var $version = '0.0.4';
	var $wrnet_id = '0';

	var $fullname = 'VentStatus';
	var $description = 'A Ventrilo Status addon with admin config';
	var $credits = array(
		array(	"name"=>	"Ulminia - Ulminia@gmail.com",
			"info"=>	"Roster 2.0 port"),
		array(	"name"=>	"Rabbitbunny",
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
		$installer->add_config("'1','startpage','ventstatus_config','display','master'");
		$installer->add_menu_button('vs_button','guild');

            $installer->add_query("CREATE TABLE `" . $installer->table('config') . "` (
            `conf_id` int(11) unsigned NOT NULL auto_increment,
		  `conf_name` varchar(64) NOT NULL,
		  `conf_data` varchar(64) NOT NULL,
		  `conf_desc` text NOT NULL,
		  PRIMARY KEY  (`conf_id`)
		) TYPE=MyISAM AUTO_INCREMENT=1 ;");

            $installer->add_query("INSERT INTO `".$installer->table('config')."` 
            (`conf_name`, `conf_data`) VALUES
             ('admin', 'password'),
            ('version', '0.0.4'),
            ('cmdprog', 'ventrilo_status'),
            ('cmdcode', '2'),
            ('cmdhost', '127.0.0.1'),
            ('cmdport', '3784'),
            ('cmdpass', ''),
            ('info1', '1'),
            ('display1', '1'),
            ('display2', '1'),
            ('display3', '1'),
            ('lobby', '1');");
            
            return true;
	}
	
	function uninstall()
	{
		global $installer, $addon, $roster;

            
		$installer->remove_all_config();
		$installer->remove_all_menu_button();
		$installer->drop_table( $installer->table('config') );
		
            return true;
		
	}


}
