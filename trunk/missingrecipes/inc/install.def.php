<?php
/*
 * Missing Recipes
 * Originally by: Zeryl
 * Ported to 2.0 and maintained by: Teta
 */
 
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
 
/**
 * Installer Forum
 *
 * @package    Missing Recipe
 * @subpackage Installer
 */
class MissingRecipesInstall
{
	var $active = true;
	var $icon = 'inv_scroll_06';
 
	var $version = '2.0.1.4';
	var $wrnet_id = '135';
 
	var $fullname = 'missing_recipe';
	var $description = 'missing_recipe_desc';
	var $credits = array(
	array(	"name"=>	"Teta",
			"info"=>	"Roster 2 Porter"),
	array(	"name"=>	"Zanix",
			"info"=>	"Templates Master"),
	array(	"name"=>	"Holgiranemsi",
			"info"=>	"German localization"),
	array(	"name"=>	"Theophilius",
			"info"=>	"R2 Port FRfr version"),
	array(	"name"=>	"Subxero",
			"info"=>	"R2 Port Localized version"),
	array(	"name"=>	"Zeryl",
			"info"=>	"Original addon developer"),
	array(	"name"=>	"Pleegwat",
			"info"=>	"Regex Master"),
	);
 
 
	/**
	 * Install Function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;
 
		// Master and menu entries
		$installer->add_config("'1','startpage','mr_conf','display','master'");
		$installer->add_config("'100','mr_main_conf',NULL,'blockframe','menu'");
		$installer->add_config("'110','mr_display_conf',NULL,'blockframe','menu'");

		//Main settings
		$installer->add_config("'1000', 'mr_urlgrabber_timeout', '30', 'text{4|10', 'mr_main_conf'");

		//Display settings
		$installer->add_config("'2000', 'display_mr_list', '0', 'radio{Show^1|Hide^0', 'mr_display_conf'");
		$installer->add_config("'2010', 'mr_show_wowheadtooltips', '1', 'radio{Show^1|Hide^0', 'mr_display_conf'");
		$installer->add_config("'2020', 'mr_show_progressbar', '1', 'radio{Show^1|Hide^0', 'mr_display_conf'");

		$installer->add_menu_button('missing_recipe_button','char');
 
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
		global $installer;
		if( version_compare('2.0.1.0', $oldversion,'>') == true )
		{
			// Upgrade versions lower than 2.0.1.0
			// add RosterCP configuration menus
	 
			// Master and menu entries
			$installer->add_config("'1','startpage','mr_conf','display','master'");
			$installer->add_config("'100','mr_main_conf',NULL,'blockframe','menu'");
			$installer->add_config("'110','mr_display_conf',NULL,'blockframe','menu'");

			//Main settings
			$installer->add_config("'1000', 'mr_urlgrabber_timeout', '30', 'text{4|10', 'mr_main_conf'");

			//Display settings
			$installer->add_config("'2000', 'display_mr_list', '0', 'radio{Show^1|Hide^0', 'mr_display_conf'");
		}
		if( version_compare('2.0.1.1', $oldversion,'>') == true )
		{
			$installer->add_config("'2010', 'mr_show_wowheadtooltips', '1', 'radio{Show^1|Hide^0', 'mr_display_conf'");
		}
		return true;
		if( version_compare('2.0.1.2', $oldversion,'>') == true )
		{
			$installer->add_config("'2020', 'mr_show_progressbar', '1', 'radio{Show^1|Hide^0', 'mr_display_conf'");
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
 
		$installer->remove_all_config();
		$installer->remove_all_menu_button();
		return true;
	}
}