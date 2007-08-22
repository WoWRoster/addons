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

$installer->add_query("
	INSERT INTO `".$roster->db->table('Key','Key_BC')."` ( `id` , `lang` ,`id_display`, `instance_name` , `key_name` , `Type` , `order` )
	VALUES 	('SL', 'enUS', 'S. Laby','Shadow Labyrinth', 'Shadow Labyrinth Key', 'Key-Only', '1'),
		('SH', 'enUS', 'Shatt.','Shattered Halls', 'Shattered Halls Key', 'Quests', '2'),
		('Arca', 'enUS', 'Arca','Arcatraz', 'Key to the Arcatraz', 'Quests', '3'),
		('Kara', 'enUS', 'Kara','Karazhan', 'The Master\'s Key', 'Quests', '4'),
		('HA', 'enUS', 'H Auchi.','Auchindoun : Heroic', 'Auchenai Key', 'Reputation', '5'),
		('HHC', 'enUS', 'H Halls','Halls : Heroic', 'Flamewrought Key', 'Reputation', '6'),
		('HCR', 'enUS', 'H Reser.','Glissecroc : Heroic', 'Reservoir Key', 'Reputation', '6'),
		('HTK', 'enUS', 'H Temp.','Tempest : Heroic', 'Warpforged Key', 'Reputation', '7'),
		('HCoT', 'enUS', 'H CoT',' COt : Heroic', 'Key of Time', 'Reputation', '8');
");


$installer->add_query("
	INSERT INTO `".$roster->db->table('Quest','Key_BC')."` ( `id` , `lang` , `order` , `Faction`, `part` )
	VALUES 	('SH', 'enUS', '1', 'H', 'Entry into the Citadel'),
		('SH', 'enUS', '2', 'H', 'Grand Master Rohok'),
		('SH', 'enUS', '3', 'H', 'Rohok\'s Request'),
		('SH', 'enUS', '4', 'H', 'Hotter then Hell'),
		('Arca', 'enUS', '1', 'H', 'Warp-Raider Nesaad'),
		('Arca', 'enUS', '2', 'H', 'Request for Assistance'),
		('Arca', 'enUS', '3', 'H', 'Rightful Repossession'),
		('Arca', 'enUS', '4', 'H', 'An Audience with the Prince'),
		('Arca', 'enUS', '5', 'H', 'Triangulation Point One'),
		('Arca', 'enUS', '6', 'H', 'Triangulation Point Two'),
		('Arca', 'enUS', '7', 'H', 'Full Triangle'),
		('Arca', 'enUS', '8', 'H', 'Special Delivery to Shattrath City'),
		('Arca', 'enUS', '9', 'H', 'How to Break Into the Arcatraz'),
		('kara', 'enUS', '1', 'H', 'Arcane Disturbances'),
		('kara', 'enUS', '2', 'H', 'Restless Activity'),
		('kara', 'enUS', '3', 'H', 'Contact from Dalaran'),
		('kara', 'enUS', '4', 'H', 'Khadgar'),
		('kara', 'enUS', '5', 'H', 'Entry Into Karazhan'),
		('kara', 'enUS', '6', 'H', 'The Second and Third Fragments'),
		('kara', 'enUS', '7', 'H', 'The Master\'s Touch'),
		('kara', 'enUS', '8', 'H', 'Return to Khadgar'),
		('HA', 'enUS', '1', 'H', 'Lower City|Revered'),
		('HHC', 'enUS', '1', 'H', 'Thrallmar|Revered'),
		('HCR', 'enUS', '1', 'H', 'Cenarion Expedition|Revered'),
		('HTK', 'enUS', '1', 'H', 'The Sha\'tar|Revered'),
		('HCoT', 'enUS', '1', 'H', 'Keepers of Time|Revered');
");
$installer->add_query("
	INSERT INTO `".$roster->db->table('Quest','Key_BC')."` ( `id` , `lang` , `order` , `Faction`, `part` )
	VALUES 	('SH', 'enUS', '1', 'A', 'Entry into the Citadel'),
		('SH', 'enUS', '2', 'A', 'Grand Master Dumphry'),
		('SH', 'enUS', '3', 'A', 'Dumphry\'s Request'),
		('SH', 'enUS', '4', 'A', 'Hotter then Hell'),
		('Arca', 'enUS', '1', 'A', 'Warp-Raider Nesaad'),
		('Arca', 'enUS', '2', 'A', 'Request for Assistance'),
		('Arca', 'enUS', '3', 'A', 'Rightful Repossession'),
		('Arca', 'enUS', '4', 'A', 'An Audience with the Prince'),
		('Arca', 'enUS', '5', 'A', 'Triangulation Point One'),
		('Arca', 'enUS', '6', 'A', 'Triangulation Point Two'),
		('Arca', 'enUS', '7', 'A', 'Full Triangle'),
		('Arca', 'enUS', '8', 'A', 'Special Delivery to Shattrath City'),
		('Arca', 'enUS', '9', 'A', 'How to Break Into the Arcatraz'),
		('kara', 'enUS', '1', 'A', 'Arcane Disturbances'),
		('kara', 'enUS', '2', 'A', 'Restless Activity'),
		('kara', 'enUS', '3', 'A', 'Contact from Dalaran'),
		('kara', 'enUS', '4', 'A', 'Khadgar'),
		('kara', 'enUS', '5', 'A', 'Entry Into Karazhan'),
		('kara', 'enUS', '6', 'A', 'The Second and Third Fragments'),
		('kara', 'enUS', '7', 'A', 'The Master\'s Touch'),
		('kara', 'enUS', '8', 'A', 'Return to Khadgar'),
		('HA', 'enUS', '1', 'A', 'Lower City|Revered'),
		('HHC', 'enUS', '1', 'A', 'Thrallmar|Revered'),
		('HCR', 'enUS', '1', 'A', 'Cenarion Expedition|Revered'),
		('HTK', 'enUS', '1', 'A', 'The Sha\'tar|Revered'),
		('HCoT', 'enUS', '1', 'A', 'Keepers of Time|Revered');
");

?>