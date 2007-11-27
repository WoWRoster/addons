<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    Assessment
 * @subpackage Installer
*/

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Installer for Assessment Addon
 *
 * @package    Assessment
 * @subpackage Installer
 */
class assessmentInstall
{
	var $active = true;
	var $icon = 'ability_ambush';

	var $version = '0.0.1.0';

	var $fullname = 'Assessment';
	var $description = 'Display statistics of uploaded Assessment data';
	var $credits = array(
		array(	"name"=>	"poetter@WoWRoster.net",
				"info"=>	"Author of 2.6 rewrite"),
	);


	/**
	 * Install Function
	 *
	 * @return bool
	 */
	function install()
	{
		global $roster, $installer;

		# Master data for the config file
		$installer->add_config("1,'startpage','assessmentconfig','display','master'");

		# Config menu entries
		$installer->add_config("100,'assessmentconfig',NULL,'blockframe','menu'");

		# Generic display settings
		$installer->add_config("'1000','minAssessmentver','2.0.0','text{10|10','assessmentconfig'");

		$installer->create_table(
			$installer->table('event'),"
			`id` int(11) unsigned NOT NULL auto_increment,
			`eventName` varchar(128) NOT NULL,
			PRIMARY KEY  (`id`,`eventName`)");

		$installer->create_table(
			$installer->table('gain'),"
			`eventId` int(11) unsigned NOT NULL,
			`memberName` varchar(64) NOT NULL,
			`name` varchar(128) default NULL,
			`type` varchar(64) default NULL,
			`count` int(11) default NULL,
			`ammount` int(11) default NULL,
			PRIMARY KEY  (`eventId`,`memberName`,`name`)");

		$installer->create_table(
			$installer->table('deaths'),"
			`id` int(11) unsigned NOT NULL auto_increment,
			`eventId` int(11) NOT NULL,
			`name` varchar(128) NOT NULL,
			`type` varchar(3) NOT NULL,
			`count` int(11) default NULL,
			`time` int(11) default NULL,
			`referenceTime` double default NULL,
			PRIMARY KEY  (`id`,`eventId`,`name`,`type`),
			UNIQUE KEY `id` (`id`)");

		$installer->create_table(
			$installer->table('deathseventlist'),"
			`eventId` int(11) NOT NULL,
			`deathsId` int(11) NOT NULL,
			`eventNumber` int(11) NOT NULL,
			`type` varchar(128) default NULL,
			`healthChange` int(11) default NULL,
			`typeLocal` varchar(128) default NULL,
			`message` varchar(256) default NULL,
			`maximumHealth` int(11) default NULL,
			`time` double default NULL,
			`abilityName` varchar(128) default NULL,
			`health` int(11) default NULL,
			`reportedHealth` int(11) default NULL,
			`timeOffset` double default NULL,
			PRIMARY KEY  (`eventId`,`deathsId`,`eventNumber`)");

		$installer->create_table(
			$installer->table('activity'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`total` double default NULL,
			`healing` double default NULL,
			`lastDamage` double default NULL,
			`last` double default NULL,
			`lastHealing` double default NULL,
			`damage` double default NULL,
			PRIMARY KEY  (`eventId`,`name`)");

		$installer->create_table(
			$installer->table('healingdone'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`abilityName` varchar(128) NOT NULL,
			`type` varchar(16) NOT NULL,
			`count` int(11) default NULL,
			`overhealAmount` int(11) default NULL,
			`amount` int(11) default NULL,
			PRIMARY KEY  (`eventId`,`name`,`abilityName`,`type`)");

		$installer->create_table(
			$installer->table('damagetaken'),"
			`id` int(11) unsigned NOT NULL auto_increment,
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`maximumAmount` int(11) default NULL,
			`count` int(11) default NULL,
			`amount` int(11) default NULL,
			`maximumAmountAttack` varchar(128) default NULL,
			PRIMARY KEY  (`id`,`eventId`,`name`),
			UNIQUE KEY `id` (`id`)");

		$installer->create_table(
			$installer->table('damagetakenattackdetails'),"
			`damageTakenId` int(11) NOT NULL,
			`abilityName` varchar(128) NOT NULL,
			`type` varchar(64) NOT NULL,
			`maximumAmountAttack` varchar(128) default NULL,
			`damageType` varchar(64) default NULL,
			`amount` int(11) default NULL,
			`count` int(11) default NULL,
			`maximumAmount` int(11) default NULL,
			PRIMARY KEY  (`damageTakenId`,`abilityName`,`type`)");

		$installer->create_table(
			$installer->table('damagetakendamagetypedetails'),"
			`damageTakenId` int(11) NOT NULL,
			`damageType` varchar(64) NOT NULL,
			`count` int(11) default NULL,
			`amount` int(11) default NULL,
			PRIMARY KEY  (`damageTakenId`,`damageType`)");

		$installer->create_table(
			$installer->table('dispel'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(11) NOT NULL,
			`count` int(11) default NULL,
			PRIMARY KEY  (`eventId`,`name`)");

		$installer->create_table(
			$installer->table('healingTaken'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`abilityName` varchar(128) NOT NULL,
			`type` varchar(16) NOT NULL,
			`count` int(11) default NULL,
			`overhealAmount` int(11) default NULL,
			`amount` int(11) default NULL,
			PRIMARY KEY  (`eventId`,`name`,`abilityName`,`type`)");

		$installer->create_table(
			$installer->table('aura'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`abilityName` varchar(128) default NULL,
			`count` int(11) default NULL,
			`isBuff` tinyint(1) default NULL,
			PRIMARY KEY  (`eventId`,`name`,`abilityName`)");

		$installer->create_table(
			$installer->table('combatTime'),"
			`eventId` int(11) NOT NULL,
			`currentDurationOffset` double default NULL,
			`totalDurationOffset` double default NULL,
			`totalDuration` double default NULL,
			`duration` double default NULL,
			`durationOffset` double default NULL,
			`currentDuration` double default NULL,
			PRIMARY KEY  (`eventId`)");

		$installer->create_table(
			$installer->table('damageDealt'),"
			`id` int(11) unsigned NOT NULL auto_increment,
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`maximumAmount` int(11) default NULL,
			`count` int(11) default NULL,
			`amount` int(11) default NULL,
			`maximumAmountAttack` varchar(128) default NULL,
			`friendlyCount` int(11) default NULL,
			`friendlyAmount` int(11) default NULL,
			PRIMARY KEY  (`id`,`eventId`,`name`),
			UNIQUE KEY `id` (`id`)");

		$installer->create_table(
			$installer->table('damageDealtAttackDetails'),"
			`damageDealtId` int(11) NOT NULL,
			`abilityName` varchar(128) NOT NULL,
			`type` varchar(64) NOT NULL,
			`maximumAmountAttack` varchar(128) default NULL,
			`damageType` varchar(64) default NULL,
			`amount` int(11) default NULL,
			`count` int(11) default NULL,
			`maximumAmount` int(11) default NULL,
			PRIMARY KEY  (`damageDealtId`,`abilityName`,`type`)");

		$installer->create_table(
			$installer->table('damageDealtDamageTypeDetails'),"
			`damageDealtId` int(11) NOT NULL,
			`damageType` varchar(64) NOT NULL,
			`count` int(11) default NULL,
			`amount` int(11) default NULL,
			`friendlyCount` int(11) default NULL,
			`friendlyAmount` int(11) default NULL,
			PRIMARY KEY  (`damageDealtId`,`damageType`)");

		$installer->create_table(
			$installer->table('dataUpdateTimes'),"
			`eventId` int(11) NOT NULL,
			 `gain` double default NULL,
			 `deaths` double default NULL,
			 `activity` double default NULL,
			 `healing` double default NULL,
			 `dispel` double default NULL,
			 `aura` double default NULL,
			 `target` double default NULL,
			 `groupMembers` double default NULL,
			 `combatTime` double default NULL,
			 `damage` double default NULL,
			 PRIMARY KEY  (`eventId`)");

		$installer->create_table(
			$installer->table('groupMembers'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`memberClass` varchar(64) default NULL,
			`memberId` int(11) default NULL,
			PRIMARY KEY  (`eventId`,`name`)");

		$installer->create_table(
			$installer->table('interrupt'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`interruptOrder` varchar(64) NOT NULL,
			`count` int(11) default NULL,
			`targetName` varchar(64) default NULL,
			`time` int(11) default NULL,
			`abilityName` varchar(128) default NULL,
			PRIMARY KEY  (`eventId`,`name`,`interruptOrder`)");

		$installer->create_table(
			$installer->table('crowdControlBreak'),"
			`eventId` int(11) NOT NULL,
			`name` varchar(64) NOT NULL,
			`breakOrder` varchar(64) NOT NULL,
			`count` int(11) default NULL,
			`crowdControlAbility` varchar(128) default NULL,
			`targetName` varchar(64) default NULL,
			`time` int(11) default NULL,
			`breakAbilityName` varchar(128) default NULL,
			PRIMARY KEY  (`eventId`,`name`,`breakOrder`)");

		$installer->create_table(
			$installer->table('offline'),"
			`eventId` int(11) NOT NULL,
			`memberName` varchar(64) NOT NULL,
			`duration` double default NULL,
			`durationOffset` double default NULL,
			`count` int(11) default NULL,
			PRIMARY KEY  (`eventId`,`memberName`)");

		# Roster menu entry
		$installer->add_menu_button('button_assessment','guild');

		return true;
	}

	/**
	 * Upgrade Function
	 *
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
		global $installer, $roster;

		$installer->remove_all_config();
		$installer->remove_all_menu_button();

		$installer->drop_table(
			$installer->table('event'));

		$installer->drop_table(
			$installer->table('gain'));

		$installer->drop_table(
			$installer->table('deaths'));

		$installer->drop_table(
			$installer->table('deathseventlist'));

		$installer->drop_table(
			$installer->table('activity'));

		$installer->drop_table(
			$installer->table('healingdone'));

		$installer->drop_table(
			$installer->table('damagetaken'));

		$installer->drop_table(
			$installer->table('damagetakenattackdetails'));

		$installer->drop_table(
			$installer->table('damagetakendamagetypedetails'));

		$installer->drop_table(
			$installer->table('dispel'));

		$installer->drop_table(
			$installer->table('healingTaken'));

		$installer->drop_table(
			$installer->table('aura'));

		$installer->drop_table(
			$installer->table('combatTime'));

		$installer->drop_table(
			$installer->table('damageDealt'));

		$installer->drop_table(
			$installer->table('damageDealtAttackDetails'));

		$installer->drop_table(
			$installer->table('damageDealtDamageTypeDetails'));

		$installer->drop_table(
			$installer->table('dataUpdateTimes'));

		$installer->drop_table(
			$installer->table('groupMembers'));

		$installer->drop_table(
			$installer->table('interrupt'));

		$installer->drop_table(
			$installer->table('crowdControlBreak'));

		$installer->drop_table(
			$installer->table('offline'));

		return true;
	}
}
