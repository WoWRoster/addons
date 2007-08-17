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
	VALUES 	('SL', 'frFR', 'laby','Labyrinthe des ombres', 'Clé du labyrinthe des ombres', 'Key-Only', '1'),
		('SH', 'frFR', 'Salle B.','Les Salles Brisées', 'Clé des Salles Brisées', 'Quests', '2'),
		('Arca', 'frFR', 'Arca','Arcatraz', 'Clé de l\'Arcatraz', 'Quests', '3'),
		('Kara', 'frFR', 'Kara','Karazhan', 'La clé du maître', 'Quests', '4'),
		('HA', 'frFR', 'H Auchi.','Auchindoun : Héroïque', 'Clé Auchenaï', 'Reputation', '5'),
		('HHC', 'frFR', 'H Remp.','Citadelle des Flammes infernales : Héroïque', 'Clé en flammes forgées', 'Reputation', '6'),
		('HCR', 'frFR', 'H Réser.','Réservoir de Glissecroc : Héroïque', 'Clé du réservoir', 'Reputation', '6'),
		('HTK', 'frFR', 'H Temp.','Donjon de la Tempête : Héroïque', 'Clé dimensionnelle', 'Reputation', '7'),
		('HCoT', 'frFR', 'H GT',' Grottes du Temps : Héroïque', 'Clé du Temps', 'Reputation', '8');
");


$installer->add_query("
	INSERT INTO `".$roster->db->table('Quest','Key_BC')."` ( `id` , `lang` , `order` , `Faction`, `part` )
	VALUES 	('SH', 'frFR', '1', 'H', 'L\'entrée dans la citadelle'),
		('SH', 'frFR', '2', 'H', 'Le grand maître Rohok'),
		('SH', 'frFR', '3', 'H', 'La demande de Rohok'),
		('SH', 'frFR', '4', 'H', 'Plus chaud que l\'enfer'),
		('Arca', 'frFR', '1', 'H', 'L\'écumeur-dimensionnel Nesaad'),
		('Arca', 'frFR', '2', 'H', 'Demande d\'assistance'),
		('Arca', 'frFR', '3', 'H', 'Récupérer ce qui nous revient de droit'),
		('Arca', 'frFR', '4', 'H', 'Une audience avec le prince'),
		('Arca', 'frFR', '5', 'H', 'Point de triangulation numéro un'),
		('Arca', 'frFR', '6', 'H', 'Point de triangulation numéro deux'),
		('Arca', 'frFR', '7', 'H', 'Le triangle est triangulé'),
		('Arca', 'frFR', '8', 'H', 'Livraison spéciale à Shattrath'),
		('Arca', 'frFR', '9', 'H', 'Comment pénétrer dans l\'Arcatraz'),
		('kara', 'frFR', '1', 'H', 'Troubles arcaniques'),
		('kara', 'frFR', '2', 'H', 'L\'agitation des sans-repos'),
		('kara', 'frFR', '3', 'H', 'Un envoyé de Dalaran'),
		('kara', 'frFR', '4', 'H', 'Khadgar'),
		('kara', 'frFR', '5', 'H', 'L\'entrée de Karazhan'),
		('kara', 'frFR', '6', 'H', 'Le deuxième et le troisième fragments'),
		('kara', 'frFR', '7', 'H', 'Le toucher du maître'),
		('kara', 'frFR', '8', 'H', 'Retour vers Khadgar'),
		('HA', 'frFR', '1', 'H', 'Ville basse|Révéré'),
		('HHC', 'frFR', '1', 'H', 'Thrallmar|Révéré'),
		('HCR', 'frFR', '1', 'H', 'Expédition cénarienne|Révéré'),
		('HTK', 'frFR', '1', 'H', 'Les Sha\'tar|Révéré'),
		('HCoT', 'frFR', '1', 'H', 'Gardiens du temps|Révéré');
");
$installer->add_query("
	INSERT INTO `".$roster->db->table('Quest','Key_BC')."` ( `id` , `lang` , `order` , `Faction`, `part` )
	VALUES 	('SH', 'frFR', '1', 'A', 'L\'entrée dans la citadelle'),
		('SH', 'frFR', '2', 'A', 'Le grand maître Dumphry'),
		('SH', 'frFR', '3', 'A', 'La demande de Dumphry'),
		('SH', 'frFR', '4', 'A', 'Plus chaud que l\'enfer'),
		('Arca', 'frFR', '1', 'A', 'L\'écumeur-dimensionnel Nesaad'),
		('Arca', 'frFR', '2', 'A', 'Demande d\'assistance'),
		('Arca', 'frFR', '3', 'A', 'Récupérer ce qui nous revient de droit'),
		('Arca', 'frFR', '4', 'A', 'Une audience avec le prince'),
		('Arca', 'frFR', '5', 'A', 'Point de triangulation numéro un'),
		('Arca', 'frFR', '6', 'A', 'Point de triangulation numéro deux'),
		('Arca', 'frFR', '7', 'A', 'Le triangle est triangulé'),
		('Arca', 'frFR', '8', 'A', 'Livraison spéciale à Shattrath'),
		('Arca', 'frFR', '9', 'A', 'Comment pénétrer dans l\'Arcatraz'),
		('kara', 'frFR', '1', 'A', 'Troubles arcaniques'),
		('kara', 'frFR', '2', 'A', 'L\'agitation des sans-repos'),
		('kara', 'frFR', '3', 'A', 'Un envoyé de Dalaran'),
		('kara', 'frFR', '4', 'A', 'Khadgar'),
		('kara', 'frFR', '5', 'A', 'L\'entrée de Karazhan'),
		('kara', 'frFR', '6', 'A', 'Le deuxième et le troisième fragments'),
		('kara', 'frFR', '7', 'A', 'Le toucher du maître'),
		('kara', 'frFR', '8', 'A', 'Retour vers Khadgar'),
		('HA', 'frFR', '1', 'A', 'Ville basse|Révéré'),
		('HHC', 'frFR', '1', 'A', 'Bastion de l\'Honneur|Révéré'),
		('HCR', 'frFR', '1', 'A', 'Expédition cénarienne|Révéré'),
		('HTK', 'frFR', '1', 'A', 'Les Sha\'tar|Révéré'),
		('HCoT', 'frFR', '1', 'A', 'Gardiens du temps|Révéré');
");

?>