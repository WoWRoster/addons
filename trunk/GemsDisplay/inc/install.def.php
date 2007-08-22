<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v0.5 Titan99 and Tyradil $
 * @link       http://www.wowroster.net
 * @package    GemsDisplay
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
class GemsDisplay
{
	var $active = true;
	var $icon = 'inv_jewelcrafting_nightseye_03';

	var $upgrades = array(); // There are no previous versions to upgrade from

	var $version = '2.0.0-0';

	var $fullname = 'Gems Display';
	var $description = 'Display Gemmes by slot.';
	var $credits = array(
		array(	"name"=>	"Titan99 and Tyradil",
			"info"=>	"Display Gemmes by slot."),
	);


	/**
	 * Install Function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;

		# Master data for the config file
		$installer->add_config("1,'startpage','display','display','master'");

		$installer->add_menu_button('GemsDisplay_menu','realm','','inv_jewelcrafting_nightseye_03');
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
		// Nothing to upgrade from yet
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
