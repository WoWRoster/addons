<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @link       http://www.wowroster.net
 * @package    GlyphsDisplay
 * @subpackage Installer
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Installer for GlyphsDisplay Addon
 *
 * @package    GlyphsDisplay
 * @subpackage Installer
 *
 */
class GlyphsDisplayInstall
{
	var $active = true;
	var $icon = 'inv_scroll_11';
	var $wrnet_id = 0;

	var $upgrades = array(); // There are no previous versions to upgrade from

	var $version = '2.0.0.0';

	var $fullname = 'Glyphs Display';
	var $description = 'Display Glyphs by class, minor/major.';
	var $credits = array(
		array(	"name"=>	"emilise",
				"info"=>	"Author."),
		array(	"name"=>	"Calystos",
				"info"=>	"testing, bugfixing."),
		array(	"name"=>	"Wyren",
				"info"=>	"translating."),
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
		$installer->add_config("1,'startpage','glyphsdisplay','display','master'");
		$installer->add_config("'100','gld_main_conf',NULL,'blockframe','menu'");

		//Main settings
		$installer->add_config("'1000', 'gld_expand', '1', 'radio{Collapse^0|Show^1', 'gld_main_conf'");
		$installer->add_config("'1010', 'gld_order', '0', 'select{Class - Type^0|Type - Class^1', 'gld_main_conf'");

		$installer->add_menu_button('GlyphDisplay_menu','realm','','inv_scroll_11');
		$installer->add_menu_button('GlyphDisplay_menu','guild','','inv_scroll_11');
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
