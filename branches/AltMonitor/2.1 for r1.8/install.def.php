<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

class AltMonitor
{
	var $active = true;
	var $icon = 'inv_misc_groupneedmore';

	var $upgrades = array(); // There are no previous versions to upgrade from

	var $version = '2.1.0';

	var $fullname = 'AltMonitor';
	var $description = 'Detects which characters belong to the same player, and displays them under one main character.';
	var $credits = array(
	array(	"name"=>	"PleegWat",
			"info"=>	"Main/Alt detection and display"),
	);


	function install()
	{
		global $installer, $wowdb;

		// First we backup the config table to prevent damage
		$installer->add_backup(ROSTER_ADDONCONFTABLE);

		# Master data for the config file
		$installer->add_config("1,'config_list','build|display','display','master'");
		$installer->add_config("2,'startpage','build','display','master'");

		# Config menu entries
		$installer->add_config("110,'build',NULL,'blockframe','menu'");
		$installer->add_config("120,'display',NULL,'blockframe','menu'");
		$installer->add_config("130,'documentation','http://www.wowroster.net/wiki/index.php/Roster:Addon:AltMonitor','link','menu'");
		$installer->add_config("140,'updMainAlt','addon-AltMonitor-update','makenewlink','menu'");

		# Build settings
		$installer->add_config("1000,'getmain_regex','/ALT-([\\\\\\\\w]+)/i','text{50|30','build'");
		$installer->add_config("1010,'getmain_field','Note','select{Public Note^Note|Officer Note^OfficerNote','build'");
		$installer->add_config("1020,'getmain_match','1','text{2|30','build'");
		$installer->add_config("1030,'getmain_main','Main','text{20|30','build'");
		$installer->add_config("1040,'defmain','1','radio{Main^1|Mainless Alt^0','build'");
		$installer->add_config("1050,'invmain','0','radio{Main^1|Mainless Alt^0','build'");
		$installer->add_config("1060,'altofalt','alt','select{Try to resolve^resolve|Leave in table^leave|Set as main^main|Set as mainless alt^alt','build'");
		$installer->add_config("1070,'update_type','3','select{None^0|Guild^1|Character^2|Both^3','build'");

		# Display settings
		$installer->add_config("2000,'showmain','0','radio{Show^1|Hide^0','display'");
		$installer->add_config("2010,'altopen','1','radio{Open^1|Closed^0','display'");
		$installer->add_config("2020,'mainlessbottom','1','radio{Bottom^1|Top^0','display'");

		$installer->add_query("DROP TABLE IF EXISTS `".$installer->table('alts')."`;");
		$installer->add_query("
			CREATE TABLE `".$installer->table('alts')."` (
				`member_id` int(11)    unsigned NOT NULL default '0',
				`main_id`   int(11)    unsigned NOT NULL default '0',
				`alt_type`  tinyint(3) unsigned NOT NULL default '0',
				PRIMARY KEY (`member_id`)
			) TYPE=MyISAM;");

		# Roster menu entry
		$installer->add_menu_button('AltMonitor_Menu');
		return true;
	}

	function upgrade($oldbasename, $oldversion)
	{
		// Nothing to upgrade from yet
		return false;
	}

	function uninstall()
	{
		global $installer;

		$installer->remove_all_config();
		
		$installer->add_query("DROP TABLE IF EXISTS `".$installer->table('alts')."`;");

		$installer->remove_menu_button('AltMonitor_Menu');
		return true;
	}
}
