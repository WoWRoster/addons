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
	VALUES 	('Templ', 'frFR', 'T. N.', 'Le Temple Noir', 'Le Médaillon de Karabor', 'Quests', 9);
");


$installer->add_query("
	INSERT INTO `".$roster->db->table('Quest','Key_BC')."` ( `id` , `lang` , `order` , `Faction`, `part` )
	VALUES 	('Templ', 'frFR', 1, 'H', 'Tablettes de Baa\'ri '),
		('Templ', 'frFR', 2, 'H', 'Oronu l\'Ancien '),
		('Templ', 'frFR', 3, 'H', 'Les corrupteurs cendrelangue'),
		('Templ', 'frFR', 4, 'H', 'La cage du gardien'),
		('Templ', 'frFR', 5, 'H', 'Preuve d\'allégeance'),
		('Templ', 'frFR', 6, 'H', 'Akama'),
		('Templ', 'frFR', 7, 'H', 'Le voyant Udalo'),
		('Templ', 'frFR', 8, 'H', 'La terrasse Ata\'mal'),
		('Templ', 'frFR', 9, 'H', 'promesse d\'Akama'),
		('Templ', 'frFR', 10, 'H', ' Un secret compromis'),
		('Templ', 'frFR', 11, 'H', 'Un artefact du passé'),
		('Templ', 'frFR', 12, 'H', 'L\'Âme de l\'Otage '),
		('Templ', 'frFR', 13, 'H', 'Entrée dans le Temple Noir'),
		('Templ', 'frFR', 14, 'H', 'Une diversion pour Akama'),
		('Templ', 'frFR', 15, 'H', 'À la recherche des Cendrelangue'),
		('Templ', 'frFR', 16, 'H', 'La rédemption des Cendrelangue');
");
$installer->add_query("
	INSERT INTO `".$roster->db->table('Quest','Key_BC')."` ( `id` , `lang` , `order` , `Faction`, `part` )
	VALUES 	('Templ', 'frFR', 1, 'A', 'Tablettes de Baa\'ri '),
		('Templ', 'frFR', 2, 'A', 'Oronu l\'Ancien '),
		('Templ', 'frFR', 3, 'A', 'Les corrupteurs cendrelangue'),
		('Templ', 'frFR', 4, 'A', 'La cage du gardien'),
		('Templ', 'frFR', 5, 'A', 'Preuve d\'allégeance'),
		('Templ', 'frFR', 6, 'A', 'Akama'),
		('Templ', 'frFR', 7, 'A', 'Le voyant Udalo'),
		('Templ', 'frFR', 8, 'A', 'La terrasse Ata\'mal'),
		('Templ', 'frFR', 9, 'A', 'promesse d\'Akama'),
		('Templ', 'frFR', 10, 'A', ' Un secret compromis'),
		('Templ', 'frFR', 11, 'A', 'Un artefact du passé'),
		('Templ', 'frFR', 12, 'A', 'L\'Âme de l\'Otage '),
		('Templ', 'frFR', 13, 'A', 'Entrée dans le Temple Noir'),
		('Templ', 'frFR', 14, 'A', 'Une diversion pour Akama'),
		('Templ', 'frFR', 15, 'A', 'À la recAercAe des Cendrelangue'),
		('Templ', 'frFR', 16, 'A', 'La rédemption des Cendrelangue');
");

?>