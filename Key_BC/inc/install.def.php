<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v2.0 Titan99  $
 * @link       http://www.wowroster.net
 * @package    Key_BC
 * @subpackage Installer
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Installer for GemsDisplay Addon
 *
 * @package    GemsDisplay
 * @subpackage Installer
 *
 */
class Key_BCInstall
{
	var $active = true;
	var $icon = 'inv_misc_key_01';

	var $upgrades = array(); // There are no previous versions to upgrade from

	var $version = '2.0.0-0';

	var $fullname = 'Key BC';
	var $description = 'Display Key BC.';
	var $credits = array(
		array(	"name"=>	"Titan99",
			"info"=>	"Display BC instance Key."),
	);


	/**
	 * Install Function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer, $roster;

		# Master data for the config file
		$installer->add_config("1,'startpage','display','display','master'");
		$installer->add_config("'110','instance_list',NULL,'blockframe','menu'");
		$installer->add_config("'120','quest_list',NULL,'blockframe','menu'");

		$installer->add_menu_button('KeyBC_menu','realm','','inv_misc_key_01');
		$installer->add_menu_button('KeyBC_menu','guild', '', 'inv_misc_key_01');

		$installer->add_query("
			DROP TABLE IF EXISTS `" . $installer->table('Key') . "`;
		");

		$installer->add_query("
			CREATE TABLE `" . $installer->table('Key') . "` (
				`id` VARCHAR( 5 ) NOT NULL ,
				`lang` VARCHAR( 4 ) NOT NULL ,
				`id_display` VARCHAR( 10 ) NOT NULL ,
				`instance_name` VARCHAR( 50 ) NOT NULL ,
				`key_name` VARCHAR( 50 ) NOT NULL ,
				`Type` VARCHAR( 15 ) NOT NULL ,
				`order` INT NOT NULL,
				PRIMARY KEY ( `id` , `lang` )
			) TYPE=MyISAM;
                ");

		$installer->add_query("
			DROP TABLE IF EXISTS `" . $installer->table('Quest') . "`;
		");

		$installer->add_query("
			CREATE TABLE `" . $installer->table('Quest') . "` (
				`id` VARCHAR( 5 ) NOT NULL ,
				`lang` VARCHAR( 4 ) NOT NULL ,
				`order` INT NOT NULL,
				`Faction` VARCHAR( 1 ) NOT NULL ,
				`part` VARCHAR( 50 ) NOT NULL ,
				PRIMARY KEY ( `id` , `lang`, `order`,`Faction` )
			) TYPE=MyISAM;
		");

		foreach( $roster->multilanguages as $lang )
		{
		  if(file_exists(realpath(dirname(__FILE__))."/../locale/install_".$lang.".php"))
			 include_once(realpath(dirname(__FILE__))."/../locale/install_".$lang.".php");
		}

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
		global $installer, $roster;

		if($oldversion!='1.9.0-0')
			return false;

		foreach( $roster->multilanguages as $lang )
		{
		  if(file_exists(realpath(dirname(__FILE__))."/../locale/upgrade_".$oldversion."_".$lang.".php"))
			 include_once(realpath(dirname(__FILE__))."/../locale/upgrade_".$oldversion."_".$lang.".php");
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

		$installer->add_query("
			DROP TABLE IF EXISTS `" . $installer->table('Quest') . "`;
		");

		$installer->add_query("
			DROP TABLE IF EXISTS `" . $installer->table('Key') . "`;
		");

		$installer->remove_all_config();

		$installer->remove_all_menu_button();

		return true;
	}
}
