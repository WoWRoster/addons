<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    2.0.3.376
 * @svn        SVN: $Id$
 * @link       http://www.wowroster.net/Forums/viewforum/f=35.html
 * @author     Gorgar, PoloDude, Zeryl, Munazz
 * @package    ItemSets
 * @subpackage Installer
*/
 
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
 
/**
 * Installer ItemSets
 *
 * @package    ItemSets
 * @subpackage Installer
 */
class ItemSetsInstall
{
	var $active = true;
	var $icon = 'ability_mage_moltenarmor';
	var $wrnet_id = '23';
	var $version = '2.0.3';
 
	var $fullname = 'ItemSets';
	var $description = 'ItemSets_Desc';
	var $credits = array(
		array(	"name"=> "Gorgar, PoloDude, Zeryl",
			"info"=> "Original Author"),
		array(	"name"=> "Munazz",
			"info"=> "2.0 Beta adapter"),
		array(	"name"=> "Rouven",
			"info"=> "2.0.x releases")
	);
 
 
	/**
	 * Install Function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;
 
		// Create the Config Entry
		$installer->add_config("'1','startpage','itemsets_conf','display','master'");
		$installer->add_config("'110','itemsets_conf',NULL,'blockframe','menu'");
		$installer->add_config("'1010','defaultset','Tier_4','select{Dungeon Set 1^Dungeon_1|Dungeon Set 2^Dungeon_2|Dungeon Set 3^Dungeon_3|Tier 1 Raid^Tier_1|Tier 2 Raid^Tier_2|Tier 3 Raid^Tier_3|Tier 4 Raid^Tier_4|Tier 5 Raid^Tier_5|Tier 6 Raid^Tier_6|Arena Season 1^Arena_1|Arena Season 2^Arena_2|Arena Season 3^Arena_3|Zul\'Gurub^ZG|Ruins of Ahn\'Qiraj20^AQ20|Tempel of Ahn\'Qiraj40^AQ40|PvP Rare^PVP_Rare|PvP Epic^PVP_Epic|PVP Level 70^PVP_Level70','itemsets_conf'");
		$installer->add_config("'1200', 'itemsets_lvl', '50', 'text{2|2', 'itemsets_conf'");
		// Create the menu button 
		$installer->add_menu_button('ItemSets','guild','','ability_mage_moltenarmor');
		$installer->add_menu_button('ItemSets','realm','','ability_mage_moltenarmor');
 
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
    		    if( version_compare('2.0.2', $oldversion,'>') == true )
			{
			    $installer->add_config("'1200', 'itemsets_lvl', '50', 'text{2|2', 'itemsets_conf'");
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