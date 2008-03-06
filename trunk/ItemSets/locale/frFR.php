<?php

/**
 * WoWRoster.net ItemSets
 *
 * Itemsets is a Roster addon that shows a list of all your guildmates above lvl 50
 * and which setitems of their class-sets they have.
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    2.0.3.376
 * @svn        SVN: $Id$
 * @link       http://www.wowroster.net/Forums/viewforum/f=35.html
 * @author     Gorgar, PoloDude, Zeryl, Foxbad, rouven
 * @package    ItemSets
 * @subpackage LanguageFiles
 *
*/

$lang['DropsFrom'] = 'Looter sur';
$lang['DropsIn'] = 'dans';

//Menu localization
$lang['ItemSets'] = 'Ensembles d\\\'armure';
$lang['ItemSets_Desc'] = 'Affiche une liste des membres de niveau 50 ou plus et une liste des pièces d\\\'ensembles d\\\'armure qu\\\'ils possèdent déjà.';
$lang['All_Classes'] = 'Toutes les Classes';

// Admin localization
$lang['admin']['defaultset'] = 'Ensemble d\\\'armure par défaut|Choisissez l\\\'ensemble d\\\'armure qui apparaîtra par défaut lors de l\\\'ouverture de la page des ensembles d\\\'armure.';
$lang['admin']['itemsets_conf'] = 'Ensembles d\\\'armure|Affiche une liste des membres de niveau 50 ou plus et une liste des pièces d\\\'ensembles d\\\'armure qu\\\'ils possèdent déjà.';
$lang['admin']['itemsets_lvl'] = 'Level Minimum|Affiche les caractères ayant au moins ce level';

//Tier localization
$lang['Dungeon_1'] = 'Donjon 1';
$lang['Dungeon_2'] = 'Donjon 2';
$lang['Dungeon_3'] = 'Donjon 3';
$lang['Tier_1'] = 'Raid Palier 1';
$lang['Tier_2'] = 'Raid Palier 2';
$lang['Tier_3'] = 'Raid Palier 3';
$lang['Tier_4'] = 'Raid Palier 4';
$lang['Tier_5'] = 'Raid Palier 5';
$lang['Tier_6'] = 'Raid Palier 6';
$lang['ZG'] = 'Zul\\\'Gurub';
$lang['AQ20'] = 'Ruines D\\\'Ahn\\\'Qiraj';
$lang['AQ40'] = 'Temple D\\\'Ahn\\\'Qiraj';
$lang['PVP_Rare'] = 'JcJ - Superieur';
$lang['PVP_Epic'] = 'JcJ - Epique';
$lang['PVP_Level70'] = 'JcJ - Level 70';
$lang['Arena_1'] = 'Arène Saison 1';
$lang['Arena_2'] = 'Arène Saison 2';
$lang['Arena_3'] = 'Arène Saison 3';

// header localisations
$lang['Name'] = 'Nom';
$lang['Waist'] = 'Taille';
$lang['Feet'] = 'Pieds';
$lang['Wrists'] = 'Poignets';
$lang['Chest'] = 'Torse';
$lang['Hands'] = 'Mains';
$lang['Head'] = 'Tête';
$lang['Legs'] = 'Jambes';
$lang['Shoulder'] = 'Epaules';
$lang['Finger'] = 'Doigt';
$lang['Neck'] = 'Cou';
$lang['Trinket'] = 'Bijoux';
$lang['Mainhand'] = 'Main Droite';
$lang['Back'] = 'Dos';
$lang['Bag'] = 'Sac';
$lang['Separator'] = ' ';


// Dungeon Set Names
$lang['ItemSets_Set']['Dungeon_1']['Name'] = array(
		'Guerrier' => 'Tenue de combat de vaillance',
		'Prêtre' => 'Habits du dévot',
		'Druide' => 'Grande tenue du Cœur-sauvage',
		'Voleur' => 'Armure Sombreruse',
		'Mage' => 'Tenue de parade de magistère',
		'Paladin' => 'Armure de Sancteforge',
		'Démoniste' => 'Grande tenue de Brume-funeste',
		'Chasseur' => 'Armure du bestiaire',
		'Chaman' => 'Les Eléments'
	);
$lang['ItemSets_Set']['Dungeon_2']['Name'] = array(
		'Guerrier' => 'Tenue de combat d\\\'héroïsme',
		'Prêtre' => 'Habits du Vertueux',
		'Druide' => 'Grande tenue Coeur-Farouche',
		'Voleur' => 'Armure Sombremante',
		'Mage' => '	Tenue de parade du sorcier',
		'Paladin' => 'Armure d\\\'Âmeforge',
		'Démoniste' => 'Grande tenue Mortebrume',
		'Chasseur' => 'Armure de belluaire',
		'Chaman' => 'Les Cinq tonnerres'
	);
$lang['ItemSets_Set']['Dungeon_3']['Name'] = array(
	 	'Guerrier' => 'Armure audacieux|Tenue de combat de plaques funestes',
	  	'Prêtre' => 'Grande tenue bénis|Tenue de parade gravée au mana',
	  	'Druide' => 'Grande tenue de Reflet-de-Lune|Armure de marchefriche',
	  	'Voleur' => 'Armure d\\\'assassinat|Armure de marchefriche',
	  	'Mage' => 'Tenue de parade d\\\'incantateur|Tenue de parade gravée au mana',
	  	'Paladin' => 'Armure du vertueux|Tenue de combat de plaques funestes',
	  	'Démoniste' => 'Grande tenue de l\\\'oubli|Tenue de parade gravée au mana',
	  	'Chasseur' => 'Armure de seigneur des bêtes|Tenue de combat de la désolation',
	  	'Chaman' => 'Grande tenue du mascaret|Tenue de combat de la désolation'
	);	

// Tier Raid Set Names
$lang['ItemSets_Set']['Tier_1']['Name'] = array(
		'Guerrier' => 'Tenue de combat de puissance',
		'Prêtre' => 'Habits de prophétie',
		'Druide' => 'Grande tenue cénarienne',
		'Voleur' => 'Armure du tueur de la nuit',
		'Mage' => 'Tenue de parade d\\\'arcaniste',
		'Paladin' => 'Armure judiciaire',
		'Démoniste' => 'Grande tenue de Gangrecoeur',
		'Chasseur' => 'Armure de traqueur de géant',
		'Chaman' => 'Rageterre'
	);
$lang['ItemSets_Set']['Tier_2']['Name'] = array(
		'Guerrier' => 'Tenue de combat de courroux',
		'Prêtre' => 'Habits de transcendance',
		'Druide' => 'Grande tenue de Stormrage',
		'Voleur' => 'Armure Rougecroc',
		'Mage' => 'Tenue de parade de Vent du néant',
		'Paladin' => 'Armure du jugement',
		'Démoniste' => 'Grande tenue de Némésis',
		'Chasseur' => 'Armure de traqueur de dragon',
		'Chaman' => 'Les Dix tempêtes'
	);
$lang['ItemSets_Set']['Tier_3']['Name'] = array(
		'Guerrier' => 'Tenue de combat de cuirassier',
		'Prêtre' => 'Habits de foi',
		'Druide' => 'Grande tenue de marcherêve',
		'Voleur' => 'Armure de la faucheuse d\\\'os',
		'Mage' => 'Tenue de parade d\\\'arcaniste',
		'Paladin' => 'Armure judiciaire',
		'Démoniste' => 'Grande tenue de pestecoeur',
		'Chasseur' => 'Armure de traqueur des cryptes',
		'Chaman' => 'Le briseur de terre'
	);
$lang['ItemSets_Set']['Tier_4']['Name'] = array(
	 	'Guerrier' => 'Tenue de combat  de porteguerre (Armes/Fureur)|Armure de porteguerre (Protection)',
	  	'Prêtre' => 'Grande tenue des incarnés (Sacré/Discipline)|Tenue des incarnés (Ombre)',
	  	'Druide' => 'Tenue de parade de Malorne (Equilibre)|Harnais de Malorne (Combat farouche)|Grande tenue de Malorne (Restauration)',
	  	'Voleur' => 'Lame-néant',
	  	'Mage' => 'Tenue de parade de l\\\'Aldor',
	  	'Paladin' => 'Grande tenue de justicier (Sacré)|Armure de justicier (Protection)|Tenue de combat de justicier (Vindicte)',
	  	'Démoniste' => 'Grande tenue du Coeur-du-vide',
	  	'Chasseur' => 'Armure de traqueur de démons',
	  	'Chaman' => 'Tenue de parade du cyclone (Elémentaire)|Harnais du cyclone (Amélioration)|Grande tenue du cyclone (Restauration)'
	);
$lang['ItemSets_Set']['Tier_5']['Name'] = array(
	  	'Guerrier' => 'Tenue de combat  de destructeur (Armes/Fureur)|Armure de destructeur (Protection)',
	  	'Prêtre' => 'Grande tenue l\\\'avatar (Sacré/Discipline)|Tenue l\\\'avatar (Ombre)',
	  	'Druide' => 'Tenue de parade de Nordrassil (Equilibre)|Harnais de Nordrassil (Combat farouche)|Grande tenue de Nordrassil (Restauration)',
	  	'Voleur' => 'Mantemort',
	  	'Mage' => 'Tenue de parade de Tirisfal',
	  	'Paladin' => 'Grande tenue de Cristalforge (Sacré)|Armure de Cristalforge (Protection)|Tenue de combat de Cristalforge (Vindicte)',
	  	'Démoniste' => 'Grande tenue de corrupteur',
	  	'Chasseur' => 'Armure de traqueur des failles',
	  	'Chaman' => 'Tenue de parade du cataclysme (Elémentaire)|Harnais du cataclysme (Amélioration)|Grande tenue du cataclysme (Restauration)'
	);
$lang['ItemSets_Set']['Tier_6']['Name'] = array(
	  	'Guerrier' => 'Tenue de combat d\\\'assaut ((Armes/Fureur)|Armure d\\\'assaut (Protection)',
	  	'Prêtre' => 'Habits d\\\'absolution (Sacré/Discipline)|Tenue de parade d\\\'absolution (Ombre)',
	  	'Druide' => 'Tenue de parade Coeur-de-tonnerre (Equilibre)|Harnais Coeur-de-tonnerre (Combat farouche)|Grande tenue Coeur-de-tonnerre (Restauration)',
	  	'Voleur' => 'Armure de tueur',
	  	'Mage' => 'Tenue de parade de la tempête',
	  	'Paladin' => 'Grande tenue de porteur de lumière (Sacré)|Tenue de combat de porteur de lumière (Protection)|Tenue de combat de porteur de lumière (Vindicte)',
	  	'Démoniste' => 'Grande tenue du maléfice',
	  	'Chasseur' => 'Armure de traqueur de gronn',
 	  	'Chaman' => 'Tenue de parade Brise-ciel (Elémentaire)|Harnais Brise-ciel (Amélioration)|Grande tenue Brise-ciel (Restauration)'
	);

// Ruins of Ahn'Qiraj Set Names
$lang['ItemSets_Set']['AQ20']['Name'] = array(
		'Guerrier' => 'Tenue de combat de force inflexible',
		'Prêtre' => 'Vêture de sagesse infinie',
		'Druide' => 'Symboles de vie interminable',
		'Voleur' => 'Emblèmes des ombres voilées',
		'Mage' => 'Ornements des secrets scellés',
		'Paladin' => 'Tenue de combat de justice éternelle',
		'Démoniste' => 'Ensemble des noms inexprimés',
		'Chasseur' => 'Ornements du sentier invisible',
		'Chaman' => 'Don de la tempête imminente'
	);

// Temple of Ahn'Qiraj Set Names
$lang['ItemSets_Set']['AQ40']['Name'] = array(
		'Guerrier' => 'Tenue de combat du conquérant',
		'Prêtre' => 'Vêtements de l\\\'oracle',
		'Druide' => 'Grande Tenue de la génèse',
		'Voleur' => 'Etreinte du dispensateur de mort',
		'Mage' => 'Habits de l\\\'énigme',
		'Paladin' => 'Tenue de combat du Vengeur',
		'Démoniste' => 'Etreinte d\\\'implorateur funeste',
		'Chasseur' => 'Atours du Frappeur',
		'Chaman' => 'Atours d\\\'implorateur de tempête'
	);

// Zul'Gurub Set Names
$lang['ItemSets_Set']['ZG']['Name'] = array(
        	'Guerrier' => 'Tenue de combat de redresseur de tort',
        	'Prêtre' => 'Grande tenue de confesseur',
        	'Druide' => 'Atours d\\\'haruspice',
        	'Voleur' => 'Tenue d\\\'insensé',
        	'Mage' => 'Costume d\\\'illusionniste',
        	'Paladin' => 'Armure de libre-penseur',
        	'Démoniste' => 'Effets de démoniaque',
        	'Chasseur' => 'Accomplissement de lieutenant-commandant',
        	'Chaman' => 'Tenue de parade d\\\'augure'
    	);

// PvP Rare Set Names
$lang['ItemSets_Set']['PVP_Rare']['A']['Name'] = array(
        	'Guerrier' => 'Armure de bataille de lieutenant-commandant',
        	'Prêtre' => 'Investiture de lieutenant-commandant',
        	'Druide' => 'Sanctuaire de lieutenant-commandant',
        	'Voleur' => 'Garde de lieutenant-commandant',
        	'Mage' => 'Arcanum de lieutenant-commandant',
        	'Paladin' => 'Redoute de lieutenant-commandant',
        	'Démoniste' => 'Tenue horrifique de lieutenant-commandant',
        	'Chasseur' => 'Parure de lieutenant-commandant',
        	'Chaman' => 'Trembleterre de lieutenant-commandant'
    	);
$lang['ItemSets_Set']['PVP_Rare']['H']['Name'] = array(
        	'Guerrier' => 'Tenue de combat de champion',
        	'Prêtre' => 'Grande tenue de champion',
        	'Druide' => 'Sanctuaire de champion',
        	'Voleur' => 'Habits de champion',
        	'Mage' => 'Tenue de parade de champion',
        	'Paladin' => 'Redoute de champion',
        	'Démoniste' => 'Effets de champion',
        	'Chasseur' => 'Parure de champion',
        	'Chaman' => 'Trembleterre de champion'
    	);

// PvP Epic Set Names
$lang['ItemSets_Set']['PVP_Epic']['A']['Name'] = array(
        	'Guerrier' => 'Tenue de combat de grand maréchal',
        	'Prêtre' => 'Grande tenue de grand maréchal',
        	'Druide' => 'Sanctuaire de grand maréchal',
        	'Voleur' => 'Habits de grand maréchal',
        	'Mage' => 'Tenue de parade de grand maréchal',
        	'Paladin' => 'Egide de grand maréchal',
        	'Démoniste' => 'Effets de grand maréchal',
        	'Chasseur' => 'Parure de maréchal de seigneur de guerre',
        	'Chaman' => 'Trembleterre de grand maréchal'
    	);

$lang['ItemSets_Set']['PVP_Epic']['H']['Name'] = array(
        	'Guerrier' => 'Tenue de combat de seigneur de guerre',
        	'Prêtre' => 'Grande tenue de seigneur de guerre',
        	'Druide' => 'Sanctuaire de seigneur de guerre',
        	'Voleur' => 'Habits de seigneur de guerre',
        	'Mage' => 'Tenue de parade de seigneur de guerre',
        	'Paladin' => 'Egide de seigneur de guerre',
        	'Démoniste' => 'Effets de seigneur de guerre',
        	'Chasseur' => 'Parure de maréchal de seigneur de guerre',
        	'Chaman' => 'Trembleterre de seigneur de guerre'
    	);

// PvP Level 70 Set Names  
$lang['ItemSets_Set']['PVP_Level70']['Name'] = array(
		'Guerrier' => 'Tenue de combat',
		'Prêtre' => 'Investiture (Sacré/Discipline)|Grande tenue (Ombre)',
		'Druide' => 'Sanctuaire (Restauration)|Refuge (Combat farouche)|Peau de fauve (Equilibre)',
		'Voleur' => 'Habits',
		'Mage' => 'Tenue de parade',
		'Paladin' => 'Egide (Protection)|Rédemption (Sacré)|Justification (Vindicte)',
		'Démoniste' => 'Tenue horrifique',
		'Chasseur' => 'Parure',
		'Chaman' => 'Tonnepoing (Elémentaire)|Trembleterre (Amélioration)|Vague guerrière (Restauration)'
	);

// Arena Season Set Names
$lang['ItemSets_Set']['Arena_1']['Name'] = array(
	  	'Guerrier' => 'Tenue de combat de gladiateur',
	  	'Prêtre' => 'Investiture de gladiateur (Sacré/Discipline)|Grande tenue de gladiateur (Ombre)',
	  	'Druide' => 'Peau de fauve de gladiateur (Equilibre)|Sanctuaire de gladiateur (Combat farouche)|Refuge de gladiateur (Restauration)',
	  	'Voleur' => 'Habits de gladiateur',
	  	'Mage' => 'Tenue de parade de gladiateur',
	  	'Paladin' => 'Rédemption de gladiateur (Sacré)|Egide de gladiateur (Protection)|Justification de gladiateur (Vindicte)',
	  	'Démoniste' => 'Tenue horrifique de champion de l\\\'arène|Suaire gangrené de gladiateur',
	  	'Chasseur' => 'Parure de gladiateur',
	  	'Chaman' => 'Tonnepoing de gladiateur (Elémentaire)|Trembleterre de gladiateur (Amélioration)|Vague guerrière de gladiateur (Restauration)'
	);

$lang['ItemSets_Set']['Arena_2']['Name'] = array(
	  	'Guerrier' => 'Tenue de combat de gladiateur impitoyable',
	  	'Prêtre' => 'Investiture de gladiateur impitoyable (Sacré/Discipline)|Grande tenue de gladiateur impitoyable (Ombre)',
	  	'Druide' => 'Peau de fauve de gladiateur impitoyable (Equilibre)|Sanctuaire de gladiateur impitoyable (Combat farouche)|Refuge de gladiateur impitoyable (Restauration)',
	  	'Voleur' => 'Habits de gladiateur impitoyable',
	  	'Mage' => 'Tenue de parade de gladiateur impitoyable',
	  	'Paladin' => 'Rédemption de gladiateur impitoyable (Sacré)|Egide de gladiateur impitoyable (Protection)|Justification de gladiateur impitoyable (Vindicte)',
	  	'Démoniste' => 'Tenue horrifique de gladiateur impitoyable|Suaire gangrené de gladiateur impitoyable',
	  	'Chasseur' => 'Parure de gladiateur impitoyable',
	  	'Chaman' => 'Tonnepoing de gladiateur impitoyable (Elémentaire)|Trembleterre de gladiateur impitoyable (Amélioration)|Vague guerrière de gladiateur impitoyable (Restauration)'
	);

$lang['ItemSets_Set']['Arena_3']['Name'] = array(
	  	'Guerrier' => 'Tenue de combat de gladiateur vengeur',
	  	'Prêtre' => 'Investiture de gladiateur vengeur (Sacré/Discipline)|Grande tenue de gladiateur vengeur (Ombre)',
	  	'Druide' => 'Peau de fauve de gladiateur vengeur (Equilibre)|Sanctuaire de gladiateur vengeur (Combat farouche)|Refuge de gladiateur vengeur (Restauration)',
	  	'Voleur' => 'Habits de gladiateur vengeur',
	  	'Mage' => 'Tenue de parade de gladiateur vengeur',
	  	'Paladin' => 'Rédemption de gladiateur vengeur (Sacré)|Egide de gladiateur vengeur (Protection)|Justification de gladiateur vengeur (Vindicte)',
	  	'Démoniste' => 'Tenue horrifique de gladiateur vengeur|Suaire gangrené de gladiateur vengeur',
	  	'Chasseur' => 'Parure de gladiateur vengeur',
	  	'Chaman' => 'Tonnepoing de gladiateur vengeur (Elémentaire)|Trembleterre de gladiateur vengeur (Amélioration)|Vague guerrière de gladiateur vengeur (Restauration)'
	);


// Dungeon 1 Set
$lang['ItemSets_Set']['Dungeon_1']['Guerrier'] = array(
		'Waist' => 'Ceinture de vaillance|Généralissime Omokk|Pic Rochenoire',
		'Feet' => 'Bottes de vaillance|Kirtonos le Héraut|Scholomance',
		'Wrist' => 'Brassards de vaillance|Loot Aléatoire|Pic Rochenoire',
		'Chest' => 'Cuirasse de vaillance|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Gantelets de vaillance|Ramstein Grandgosier|Stratholme',
		'Head' => 'Casque de vaillance|Sombre Maître Gandling|Scholomance',
		'Legs' => 'Jambières de vaillance|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Spallières de vaillance|Chef de guerre Rend Blackhand|Pic Rochenoire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Prêtre'] = array(
		'Waist' => 'Ceinture de dévot|Loot  Aléatoire|Pic Rochenoire',
		'Feet' => 'Sandales de dévot|Maleki le Blafard|Stratholme',
		'Wrist' => 'Brassards de dévot|Loot Aléatoire|Stratholme',
		'Chest' => 'Robe de dévot|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Gants de dévot|Archiviste Galford|Stratholme',
		'Head' => 'Collerette de dévot|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Robe de dévot|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Mantelet de dévot|Solakar Voluteflamme|Pic Rochenoire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Druide'] = array(
		'Waist' => 'Ceinture du Coeur-Sauvage|Loot Aléatoire|Scholomance',
		'Feet' => 'Bottes du Coeur-Sauvage|Matriarche Couveuse|Pic Rochenoire',
		'Wrist' => 'Brassards du Coeur-Sauvage|Loot Aléaoire|Stratholme',
		'Chest' => 'Gilet du Coeur-Sauvage|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Gants du Coeur-Sauvage|Loot Aléatoire|Pic Rochenoire',
		'Head' => 'Coiffe du Coeur-Sauvage|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Kilt du Coeur-Sauvage|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Spallières du Coeur-Sauvage|Gizrul l\\\'esclavagiste|Pic Rochenoire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Voleur'] = array(
		'Waist' => 'Ceinture Sombreruse|Loot Aléatoire|Pic Rochenoire',
		'Feet' => 'Bottes Sombreruse|Cliquettripes|Scholomance',
		'Wrist' => 'Brassards Sombreruse|Loot Aléatoire|Scholomance',
		'Chest' => 'Tunique Sombreruse|Général Drakkisath|Upper Pic Rochenoire',
		'Hands' => 'Gants Sombreruse|Chasseresse des ombres Vosh\'gajin|Pic Rochenoire',
		'Head' => 'Cagoule Sombreruse|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Pantalon Sombreruse|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Spallières Sombreruse|Ma.e canonnier Willey|Stratholme'
	);
$lang['ItemSets_Set']['Dungeon_1']['Mage'] = array(
		'Waist' => 'Ceinture de magistère|Loot Aléatoire|Stratholme',
		'Feet' => 'Bottes de magistère|Chanteloge Forrestin|Stratholme',
		'Wrist' => 'Manchettes de magistère|Loot Aléatoire|Pic Rochenoire',
		'Chest' => 'Robe de magistère|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Gants de magistère|Loot Aléatoire|Scholomance',
		'Head' => 'Collerette de magistère|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Jambières de magistère|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Mantelet de magistère|Ras Murmegivre|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Paladin'] = array(
		'Waist' => 'Ceinture de sancteforge|Loot Aléatoire|Stratholme',
		'Feet' => 'Bottes de sancteforge|Balnazzar|Stratholme',
		'Wrist' => 'Brassards de Sancteforge|Loot Aléatoire|Scholomance',
		'Chest' => 'Cuirasse de sancteforge|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Gantelets de sancteforge|Timmy le Cruel|Stratholme',
		'Head' => 'Casque de sancteforge|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Cuissards de sancteforge|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Spallières de sancteforge|La Bête|Pic Rochenoire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Démoniste'] = array(
		'Waist' => 'Ceinture de Brume-funeste|Loot Aléatoire|Stratholme',
		'Feet' => 'Sandales de Brume-funeste|Baronne Anastari|Stratholme',
		'Wrist' => 'Brassards de Brume-funeste|Loot Aléatoire|Pic Rochenoire',
		'Chest' => 'Robe de Brume-funeste|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Protège-mains de Brume-funeste|Loot Aléatoire|Scholomance',
		'Head' => 'Masque de Brume-funeste|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Jambières de Brume-funeste|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Mantelet de Brume-funeste|Jandice Barov|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Chasseur'] = array(
		'Waist' => 'Ceinture de bestiaire|Loot Aléatoire|Pic Rochenoire',
		'Feet' => 'Bottes de bestiaire|Nerub\\\'enkan|Stratholme Live',
		'Wrist' => 'Manchettes de bestiaire|Loot Aléatoire|Stratholme',
		'Chest' => 'Tunique de bestiaire|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Gants de bestiaire|Ma.e de guerre Voone|Pic Rochenoire',
		'Head' => 'Coiffe de bestiaire|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Pantalon de bestiaire|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Mantelet de bestiaire|Seigneur Wyrmthalak|Pic Rochenoire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Chaman'] = array(
		'Waist' => 'Corde des éléments|Loot Aléatoire|Pic Rochenoire',
		'Feet' => 'Bottes des éléments|Généralissime Omokk|Pic Rochenoire',
		'Wrist' => 'Manchettes des éléments|Loot Aléatoire|Stratholme',
		'Chest' => 'Haubergeon des éléments|Général Drakkisath|Pic Rochenoire',
		'Hands' => 'Gantelets des éléments|Pyrogarde Prophète ardent|Pic Rochenoire',
		'Head' => 'Coiffe des éléments|Sombre Ma.e Gandling|Scholomance',
		'Legs' => 'Kilt des éléments|Baron Vaillefendre|Stratholme',
		'Shoulder' => 'Espauliers des éléments|Gyth|Pic Rochenoire'
	);

// Dungeon 2 Set
$lang['ItemSets_Set']['Dungeon_2']['Druide'] = array(
		'Waist' => 'Ceinture Coeur-Farouche|Quête|Récompense',
		'Feet'  => 'Bottes Coeur-Farouche|Quête|Récompense',
		'Wrist' => 'Brassards Coeur-Farouche|Quête|Récompense',
		'Chest' => 'Gilet Coeur-Farouche|Quête|Récompense',
		'Hands' => 'Gants Coeur-Farouche|Quête|Récompense',
		'Head'  => 'Capuche Coeur-Farouche|Quête|Récompense',
		'Legs'  => 'Kilt Coeur-Farouche|Quête|Récompense',
		'Shoulder' => 'Spallières Coeur-Farouche|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Chasseur'] = array(
		'Waist' => 'Ceinture de belluaire|Quête|Récompense',
		'Feet'  => 'Bottes de belluaire|Quête|Récompense',
		'Wrist' => 'Manchettes de belluaire|Quête|Récompense',
		'Chest' => 'Tunique de belluaire|Quête|Récompense',
		'Hands' => 'Gants de belluaire|Quête|Récompense',
		'Head'  => 'Coiffe de belluaire|Quête|Récompense',
		'Legs'  => 'Pantalon de belluaire|Quête|Récompense',
		'Shoulder' => 'Mantelet de belluaire|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Mage'] = array(
		'Waist' => 'Ceinture du sorcier|Quête|Récompense',
		'Feet'  => 'Bottes du sorcier|Quête|Récompense',
		'Wrist' => 'Manchettes du sorcier|Quête|Récompense',
		'Chest' => 'Robe du sorcier|Quête|Récompense',
		'Hands' => 'Gants du sorcier|Quête|Récompense',
		'Head'  => 'Couronne du sorcier|Quête|Récompense',
		'Legs'  => 'Jambières du sorcier|Quête|Récompense',
		'Shoulder' => 'Mantelet du sorcier|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Paladin'] = array(
		'Waist' => 'Ceinture d\\\'Âmeforge|Quête|Récompense',
		'Feet'  => 'Bottes d\\\'Âmeforge|Quête|Récompense',
		'Wrist' => 'Brassards d\\\'Âmeforge|Quête|Récompense',
		'Chest' => 'Cuirasse d\\\'Âmeforge|Quête|Récompense',
		'Hands' => 'Gantelets d\\\'Âmeforge|Quête|Récompense',
		'Head'  => 'Casque d\\\'Âmeforge|Quête|Récompense',
		'Legs'  => 'Cuissards d\\\'Âmeforge|Quête|Récompense',
		'Shoulder' => 'Spallières d\\\'Âmeforge|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Prêtre'] = array(
		'Waist' => 'Ceinture vertueuse|Quête|Récompense',
		'Feet'  => 'Sandales vertueuses|Quête|Récompense',
		'Wrist' => 'Brassards vertueux|Quête|Récompense',
		'Chest' => 'Robe vertueuse|Quête|Récompense',
		'Hands' => 'Gants vertueux|Quête|Récompense',
		'Head'  => 'Couronne vertueuse|Quête|Récompense',
		'Legs'  => 'Jupe vertueuse|Quête|Récompense',
		'Shoulder' => 'Mantelet vertueux|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Voleur'] = array(
		'Waist' => 'Ceinture Sombremante|Quête|Récompense',
		'Feet'  => 'Bottes Sombremante|Quête|Récompense',
		'Wrist' => 'Brassards Sombremante|Quête|Récompense',
		'Chest' => 'Tunique Sombremante|Quête|Récompense',
		'Hands' => 'Gants Sombremante|Quête|Récompense',
		'Head'  => 'Coiffe Sombremante|Quête|Récompense',
		'Legs'  => 'Pantalon Sombremante|Quête|Récompense',
		'Shoulder' => 'Spallières Sombremante|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Chaman'] = array(
		'Waist' => 'Corde des Cinq tonnerres|Quête|Récompense',
		'Feet'  => 'Bottes des Cinq tonnerres|Quête|Récompense',
		'Wrist' => 'Manchettes des Cinq tonnerres|Quête|Récompense',
		'Chest' => 'Gilet des Cinq tonnerres|Quête|Récompense',
		'Hands' => 'Gantelets des Cinq tonnerres|Quête|Récompense',
		'Head'  => 'Coiffe des Cinq tonnerres|Quête|Récompense',
		'Legs'  => 'Kilt des Cinq tonnerres|Quête|Récompense',
		'Shoulder' => 'Espauliers des Cinq tonnerres|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Démoniste'] = array(
		'Waist' => 'Ceinture Mortebrume|Quête|Récompense',
		'Feet'  => 'Sandales Mortebrume|Quête|Récompense',
		'Wrist' => 'Brassards Mortebrume|Quête|Récompense',
		'Chest' => 'Robe Mortebrume|Quête|Récompense',
		'Hands' => 'Gants Mortebrume|Quête|Récompense',
		'Head'  => 'Masque Mortebrume|Quête|Récompense',
		'Legs'  => 'Jambières Mortebrume|Quête|Récompense',
		'Shoulder' => 'Mantelet Mortebrume|Quête|Récompense'
);
$lang['ItemSets_Set']['Dungeon_2']['Guerrier'] = array(
		'Waist' => 'Ceinture d\\\'héroïsme|Quête|Récompense',
		'Feet'  => 'Bottes d\\\'héroïsme|Quête|Récompense',
		'Wrist' => 'Brassards d\\\'héroïsme|Quête|Récompense',
		'Chest' => 'Cuirasse d\\\'héroïsme|Quête|Récompense',
		'Hands' => 'Gantelets d\\\'héroïsme|Quête|Récompense',
		'Head'  => 'Casque d\\\'héroïsme|Quête|Récompense',
		'Legs'  => 'Cuissards d\\\'héroïsme|Quête|Récompense',
		'Shoulder' => 'Spallières d\\\'héroïsme|Quête|Récompense'
);

// Dungeon 3 Set
$lang['ItemSets_Set']['Dungeon_3']['Guerrier'] = array(
		'Chest1' => 'Cuirasse de l\\\'audacieux|Messager Cieuriss|L\\\'Arcatraz',
		'Hands1' => 'Gantelets de l\\\'audacieux|Seigneur de guerre Kalithresh|Le Caveau de la vapeur',
		'Head1'  => 'Heaume de guerre de l\\\'audacieux|Brise-dimension|La Botanica',
		'Legs1'  => 'Cuissards de l\\\'audacieux|Aeonus|Le Noir Marécage',
		'Shoulder1' => 'Garde-épaules de l\\\'audacieux|Marmon|Labyrinthe des ombres',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet de plaques funestes|Messager Cieuriss|L\\\'Arcatraz',
		'Hands2' => 'Gantelets de plaques funestes|Keli\\\'dan le Briseur|La Fournaise du sang (Héroïque)',
		'Head2'  => 'Heaume de guerre de plaques funestes|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan (Héroïque)',
		'Legs2'  => 'Garde-jambes de plaques funestes|Exarque Maladaar|Cryptes Auchenaï (Héroïque)',
		'Shoulder2' => 'Garde-épaules de plaques funestes|La Traqueuse noire|La Basse-tourbière (Héroïque)'
);

$lang['ItemSets_Set']['Dungeon_3']['Prêtre'] = array(
		'Chest1' => 'Vêtements bénis|Marmon|Labyrinthe des ombres',
		'Hands1' => 'Protège-mains bénis|Chef de guerre Kargath|Les Salles brisées',
		'Head1'  => 'Couronne bénie|Messager Cieuriss|L\\\'Arcatraz',
		'Legs1'  => 'Chausses bénies|Roi-serre Ikiss|Les salles des Sethekk',
		'Shoulder1' => 'Espauliers bénis|Grand Maître Vorpil|Labyrinthe des ombres',
		'Separator1' => '-setname-',
		'Chest2' => 'Habit gravé au mana|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan (Héroïque)',
		'Hands2' => 'Gants gravés au mana|Omor l\\\'Intouché|Remparts des Flammes infernales (Héroïque)',
		'Head2'  => 'Couronne gravée au mana|Aeonus|Le Noir Marécage',
		'Legs2'  => 'Culotte gravée au mana|La Traqueuse noire|La Basse-tourbière (Héroïque)',
		'Shoulder2' => 'Spallières gravées au mana|Bourbierreux|Les enclos aux esclaves (Héroïque)'
);

$lang['ItemSets_Set']['Dungeon_3']['Druide'] = array(
		'Chest1' => 'Robe de Reflet-de-Lune|Pathaleon le Calculateur|Le Méchanar',
		'Hands1' => 'Protège-mains de Reflet-de-Lune|Coeur-noir le Séditieux|Labyrinthe des ombres',
		'Head1'  => 'Capuche de Reflet-de-Lune|Brise-dimension|La Botanica',
		'Legs1'  => 'Pantalon de Reflet-de-Lune|Aeonus|Le Noir Marécage',
		'Shoulder1' => 'Epaulières de Reflet-de-Lune|Seigneur de guerre Kalithresh|Le Caveau de la vapeur',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique de marchefriche|Keli\\\'dan le Briseur|La Fournaise du sang (Héroïque)',
		'Hands2' => 'Gants de marchefriche|Chef de guerre Kargath|Les Salles brisées',
		'Head2'  => 'Heaume de marchefriche|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan(Héroïque)',
		'Legs2'  => 'Jambières de marchefriche|Aeonus|Le Noir Marécage (Herioc)',
		'Shoulder2' => 'Protège-épaules de marchefriche|Seigneur de guerre Kalithresh|Le Caveau de la vapeur (Herioc)'		
);

$lang['ItemSets_Set']['Dungeon_3']['Voleur'] = array(
		'Chest1' => 'Tunique d\\\'assassinat|Pathaleon le Calculateur|Le Méchanar',
		'Hands1' => 'Manicles d\\\'assassinat|Aeonus|Le Noir Marécage',
		'Head1'  => 'Casque d\\\'assassinat|Messager Cieuriss|L\\\'Arcatraz',
		'Legs1'  => 'Jambières d\\\'assassinat|Marmon|Labyrinthe des ombres',
		'Shoulder1' => 'Protège-épaules d\\\'assassinat|Roi-serre Ikiss|Les salles des Sethekk',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique de marchefriche|Keli\\\'dan le Briseur|La Fournaise du sang (Héroïque)',
		'Hands2' => 'Gants de marchefriche|Chef de guerre Kargath|Les Salles brisées',
		'Head2'  => 'Heaume de marchefriche|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan (Héroïque)',
		'Legs2'  => 'Jambières de marchefriche|Aeonus|Le Noir Marécage (Herioc)',
		'Shoulder2' => 'Protège-épaules de marchefriche|Seigneur de guerre Kalithresh|Le Caveau de la vapeur (Herioc)'	
);

$lang['ItemSets_Set']['Dungeon_3']['Mage'] = array(
		'Chest1' => 'Robe d\\\'incantateur|Brise-dimension|La Botanica',
		'Hands1' => 'Gants d\\\'incantateur|Hydromancer Thespia|Le Caveau de la vapeur',
		'Head1'  => 'Capuche d\\\'incantateur|Pathaleon le Calculateur|Le Méchanar',
		'Legs1'  => 'Chausses d\\\'incantateur|Roi-serre Ikiss|Les salles des Sethekk',
		'Shoulder1' => 'Espauliers d\\\'incantateur|Seigneur de guerre Kalithresh|Le Caveau de la vapeur',
		'Separator1' => '-setname-',
		'Chest2' => 'Habit gravé au mana|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan(Héroïque)',
		'Hands2' => 'Gants gravés au mana|Omor l\\\'Intouché|Remparts des Flammes infernales (Héroïque)',
		'Head2'  => 'Couronne gravée au mana|Aeonus|Le Noir Marécage',
		'Legs2'  => 'Culotte gravée au mana|La Traqueuse noire|La Basse-tourbière (Héroïque)',
		'Shoulder2' => 'Spallières gravées au mana|Bourbierreux|Les enclos aux esclaves (Héroïque)'
);

$lang['ItemSets_Set']['Dungeon_3']['Paladin'] = array(
		'Chest1' => 'Cuirasse du vertueux|Seigneur de guerre Kalithresh|Le Caveau de la vapeur',
		'Hands1' => 'Gantelets du Vertueux|Chef de guerre Kargath|Les Salles brisées',
		'Head1'  => 'Heaume du vertueux|Pathaleon le Calculateur|Le Méchanar',
		'Legs1'  => 'Cuissards du vertueux|Aeonus|Le Noir Marécage',
		'Shoulder1' => 'Spallières du vertueux|Laj|La Botanica',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet de plaques funestes|Messager Cieuriss|L\\\'Arcatraz',
		'Hands2' => 'Gantelets de plaques funestes|Keli\\\'dan le Briseur|La Fournaise du sang (Héroïque)',
		'Head2'  => 'Heaume de guerre de plaques funestes|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan (Héroïque)',
		'Legs2'  => 'Garde-jambes de plaques funestes|Exarque Maladaar|Cryptes Auchenaï (Héroïque)',
		'Shoulder2' => 'Garde-épaules de plaques funestes|La Traqueuse noire|La Basse-tourbière (Héroïque)'
);

$lang['ItemSets_Set']['Dungeon_3']['Démoniste'] = array(
		'Chest1' => 'Robe de l\\\'oubli|Marmon|Labyrinthe des ombres',
		'Hands1' => 'Gants de l\\\'oubli|Chef de guerre Kargath|Les Salles brisées',
		'Head1'  => 'Chaperon de l\\\'oubli|Messager Cieuriss|L\\\'Arcatraz',
		'Legs1'  => 'Chausses de l\\\'oubli|Roi-serre Ikiss|Les salles des Sethekk',
		'Shoulder1' => 'Spallières de l\\\'oubli|Marmon|Labyrinthe des ombres',
		'Separator1' => '-setname-',
		'Chest2' => 'Habit gravé au mana|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan (Héroïque)',
		'Hands2' => 'Gants gravés au mana|Omor l\\\'Intouché|Remparts des Flammes infernales (Héroïque)',
		'Head2'  => 'Couronne gravée au mana|Aeonus|Le Noir Marécage',
		'Legs2'  => 'Culotte gravée au mana|La Traqueuse noire|The La Basse-tourbière (Héroïque)',
		'Shoulder2' => 'Spallières gravées au mana|Bourbierreux|Les enclos aux esclaves (Héroïque)'		
);

$lang['ItemSets_Set']['Dungeon_3']['Chasseur'] = array(
		'Chest1' => 'Cuirasse de seigneur des bêtes|Brise-dimension|Botanica',
		'Hands1' => 'Garde-mains de seigneur des bêtes|Chef de guerre Kargath|Les Salles brisées',
		'Head1'  => 'Casque de seigneur des bêtes|Pathaleon le Calculateur|Le Méchanar',
		'Legs1'  => 'Jambières de seigneur des bêtes|Seigneur de guerre Kalithresh|Le Caveau de la vapeur',
		'Shoulder1' => 'Mantelet de seigneur des bêtes|Seigneur de guerre Kalithresh|Le Caveau de la vapeur',
		'Separator1' => '-setname-',
		'Chest2' => 'Haubert de la désolation|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan (Héroïque)',
		'Hands2' => 'Gantelets de la désolation|Chef de guerre Kargath|Les Salles brisées',
		'Head2'  => 'Heaume de la désolation|Aeonus|Le Noir Marécage',
		'Legs2'  => 'Grèves de la désolation|Roi-serre Ikiss|Les salles des Sethekk',
		'Shoulder2' => 'Espauliers de la désolation|Bourbierreux|Les enclos aux esclaves (Héroïque)'
);

$lang['ItemSets_Set']['Dungeon_3']['Chaman'] = array(
		'Chest1' => 'Plastron du mascaret|Messager Cieuriss|L\\\'Arcatraz',
		'Hands1' => 'Gantelets du mascaret|Seigneur de guerre Kalithresh|Le Caveau de la vapeur',
		'Head1'  => 'Heaume du mascaret|Brise-dimension|La Botanica',
		'Legs1'  => 'Kilt du mascaret|Marmon|Labyrinthe des ombres',
		'Shoulder1' => 'Garde-épaules du mascaret|Porteguerre O\\\'mrogg|Les Salles brisées',
		'Separator1' => '-setname-',
		'Chest2' => 'Haubert de la désolation|Chasseur d\\\'époques|Contreforts de Hautebrande d\\\'antan (Héroïque)',
		'Hands2' => 'Gantelets de la désolation|Chef de guerre Kargath|Les Salles brisées',
		'Head2'  => 'Heaume de la désolation|Aeonus|Le Noir Marécage',
		'Legs2'  => 'Grèves de la désolation|Roi-serre Ikiss|Les salles des Sethekk',
		'Shoulder2' => 'Espauliers de la désolation|Bourbierreux|Les enclos aux esclaves (Héroïque)'	
);


// Raid Tier 1 Set
$lang['ItemSets_Set']['Tier_1']['Guerrier'] = array(
		'Waist' => 'Ceinture de puissance|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Solerets de puissance|Gehennas|Coeur du Magma',
		'Wrist' => 'Brassards de puissance|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Cuirasse de puissance|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gantelets de puissance|Lucifron|Coeur du Magma',
		'Head' => 'Casque de puissance|Garr|Coeur du Magma',
		'Legs' => 'Cuissards de puissance|Magmadar|Coeur du Magma',
		'Shoulder' => 'Espauliers de puissance|Messager de Sulfuron|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Prêtre'] = array(
		'Waist' => 'Ceinturon de prophétie|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Bottes de prophétie|Shazzrah|Coeur du Magma',
		'Wrist' => 'Protège-bras de prophétie|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Robe de prophétie|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gants de prophétie|Gehennas|Coeur du Magma',
		'Head' => 'Collerette de prophétie|Garr|Coeur du Magma',
		'Legs' => 'Pantalon de prophétie|Magmadar|Coeur du Magma',
		'Shoulder' => 'Mantelet de prophétie|Messager de Sulfuron|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Druide'] = array(
		'Waist' => 'Ceinture cénarienne|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Bottes cénariennes|Lucifron|Coeur du Magma',
		'Wrist' => 'Brassards cénariens|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Habit cénarien|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gants cénariens|Shazzrah|Coeur du Magma',
		'Head' => 'Casque cénarien|Garr|Coeur du Magma',
		'Legs' => 'Jambières cénariennes|Magmadar|Coeur du Magma',
		'Shoulder' => 'Spallières cénariennes|Baron Geddon|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Voleur'] = array(
		'Waist' => 'Ceinture du tueur de la nuit|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Bottes du tueur de la nuit|Shazzrah|Coeur du Magma',
		'Wrist' => 'Bracelets du tueur de la nuit|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Plastron du tueur de la nuit|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gants du tueur de la nuit|Gehennas|Coeur du Magma',
		'Head' => 'Couvre-chef du tueur de la nuit|Garr|Coeur du Magma',
		'Legs' => 'Pantalon du tueur de la nuit|Magmadar|Coeur du Magma',
		'Shoulder' => 'Protège-épaules du tueur de la nuit|Messager de Sulfuron|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Mage'] = array(
		'Waist' => 'Ceinture d\\\'arcaniste|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Bottes d\\\'arcaniste|Gehennas|Coeur du Magma',
		'Wrist' => 'Manchettes d\\\'arcaniste|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Robe d\\\'arcaniste|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gants d\\\'arcaniste|Shazzrah|Coeur du Magma',
		'Head' => 'Couronne d\\\'arcaniste|Garr|Coeur du Magma',
		'Legs' => 'Jambières d\\\'arcaniste|Magmadar|Coeur du Magma',
		'Shoulder' => 'Mantelet d\\\'arcaniste|Baron Geddon|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Paladin'] = array(
		'Waist' => 'Ceinture judiciaire|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Bottes judiciaires|Lucifron|Coeur du Magma',
		'Wrist' => 'Brassards judiciaires|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Corselet judiciaire|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gantelets judiciaires|Gehennas|Coeur du Magma',
		'Head' => 'Heaume judiciaire|Garr|Coeur du Magma',
		'Legs' => 'Cuissards judiciaires|Magmadar|Coeur du Magma',
		'Shoulder' => 'Spallières judiciaires|Baron Geddon|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Démoniste'] = array(
		'Waist' => 'Ceinture de Gangrecoeur|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Mules de Gangrecoeur|Gehennas|Coeur du Magma',
		'Wrist' => 'Brassards de Gangrecoeur|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Robe de Gangrecoeur|Golemagg der Verbrenner|Coeur du Magma',
		'Hands' => 'Gants de Gangrecoeur|Lucifron|Coeur du Magma',
		'Head' => 'Cornes de Gangrecoeur|Garr|Coeur du Magma',
		'Legs' => 'Pantalon de Gangrecoeur|Magmadar|Coeur du Magma',
		'Shoulder' => 'Protège-épaules de Gangrecoeur|Baron Geddon|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Chasseur'] = array(
		'Waist' => 'Ceinture de traqueur de géant|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Bottes de traqueur de géant|Gehennas|Coeur du Magma',
		'Wrist' => 'Brassards de traqueur de géant|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Cuirasse de traqueur de géant|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gants de traqueur de géant|Shazzrah|Coeur du Magma',
		'Head' => 'Casque de traqueur de géant|Garr|Coeur du Magma',
		'Legs' => 'Jambières de traqueur de géant|Magmadar|Coeur du Magma',
		'Shoulder' => 'Epaulettes de traqueur de géant|Messager de Sulfuron|Coeur du Magma'
	);
$lang['ItemSets_Set']['Tier_1']['Chaman'] = array(
		'Waist' => 'Ceinture Rageterre|Loot Aléatoire|Coeur du Magma',
		'Feet' => 'Bottes Rageterre|Lucifron|Coeur du Magma',
		'Wrist' => 'Brassards Rageterre|Loot Aléatoire|Coeur du Magma',
		'Chest' => 'Habit Rageterre|Golemagg l\\\'Incinérateur|Coeur du Magma',
		'Hands' => 'Gantelets Rageterre|Gehennas|Coeur du Magma',
		'Head' => 'Casque Rageterre|Garr|Coeur du Magma',
		'Legs' => 'Jambières Rageterre|Magmadar|Coeur du Magma',
		'Shoulder' => 'Epaulettes Rageterre|Baron Geddon|Coeur du Magma'
	);

// Raid Tier 2 Set
$lang['ItemSets_Set']['Tier_2']['Guerrier'] = array(
		'Waist' => 'Baudrier de courroux|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Solerets de courroux|Seigneur des couvées Lashslayer|Repaire de l\\\'Aile noire',
		'Wrist' => 'Bracelets de courroux|Razorgore l\\\'Indompté|Repaire de l\\\'Aile noire',
		'Chest' => 'Cuirasse de courroux|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Gantelets de courroux|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Heaume de courroux|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Cuissards de courroux|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Espauliers de courroux|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Prêtre'] = array(
		'Waist' => 'Ceinture de transcendance|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Bottes de transcendance|Seigneur des couvées Lashslayer|Repaire de l\\\'Aile noire',
		'Wrist' => 'Manchettes de transcendance|Razorgore l\\\'Indompté|Repaire de l\\\'Aile noire',
		'Chest' => 'Robe de transcendance|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Garde-mains de transcendance|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Auréole de transcendance|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Jambières de transcendance|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Espauliers de transcendance|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Druide'] = array(
		'Waist' => 'Ceinture de Hurlorage|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Bottes de Hurlorage|Seigneur des couvées Lashslayer|Repaire de l\\\'Aile noire',
		'Wrist' => 'Brassards de Hurlorage|Razorgore l\\\'Indompté|lackwing Lair',
		'Chest' => 'Robe de Hurlorage|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Garde-mains de Hurlorage|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Couvre-chef de Hurlorage|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Garde-jambes de Hurlorage|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Espauliers de Hurlorage|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Voleur'] = array(
		'Waist' => 'Ceinture Rougecroc|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Bottes Rougecroc|Seigneur des couvées Lashslayer|Repaire de l\\\'Aile noire',
		'Wrist' => 'Brassards Rougecroc|Razorgore l\\\'Indompt?lackwing Lair',
		'Chest' => 'Plastron Rougecroc|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Gants Rougecroc|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Cagoule Rougecroc|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Pantalon Rougecroc|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Spallières Rougecroc|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Mage'] = array(
		'Waist' => 'Ceinture de Vent du néant|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Bottes de Vent du néant|Seigneur des couvées Lashslayerr|Repaire de l\\\'Aile noire',
		'Wrist' => 'Manchettes de Vent du néant|Razorgore l\\\'Indompt?lackwing Lair',
		'Chest' => 'Robe de Vent du néant|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Gants de Vent du néant|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Couronne de Vent du néant|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Pantalon de Vent du néant|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Mantelet de Vent du néant|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Paladin'] = array(
		'Waist' => 'Ceinture du jugement|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Solerets du jugement|Seigneur des couvées Lashslayer|Repaire de l\\\'Aile noire',
		'Wrist' => 'Manchettes du jugement|Razorgore l\\\'Indompté|Repaire de l\\\'Aile noire',
		'Chest' => 'Cuirasse du jugement|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Gantelets du jugement|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Couronne du jugement|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Cuissards du jugement|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Spallières du jugement|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Démoniste'] = array(
		'Waist' => 'Ceinture de Némésis|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Bottes de Némésis|Seigneur des couvées Lashslayer|Repaire de l\\\'Aile noire',
		'Wrist' => 'Brassards de Némésis|Razorgore l\\\'Indompté|Repaire de l\\\'Aile noire',
		'Chest' => 'Robe de Némésis|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Gants de Némésis|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Crâne de Némésis|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Jambières de Némésis|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Spallières de Némésis|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Chasseur'] = array(
		'Waist' => 'Ceinture de traqueur de dragon|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Grèves de traqueur de dragon|Seigneur des couvées Lashslayerr|Repaire de l\\\'Aile noire',
		'Wrist' => 'Brassards de traqueur de dragon|Razorgore l\\\'Indompté|Repaire de l\\\'Aile noire',
		'Chest' => 'Cuirasse de traqueur de dragon|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Gantelets de traqueur de dragon|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Casque de traqueur de dragon|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Garde-jambes de traqueur de dragon|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Spallières de traqueur de dragon|Chromaggus|Repaire de l\\\'Aile noire'
	);
$lang['ItemSets_Set']['Tier_2']['Chaman'] = array(
		'Waist' => 'Ceinture des dix tempêtes|Vaelastrasz le Corrompu|Repaire de l\\\'Aile noire',
		'Feet' => 'Bottes des dix tempêtes|Seigneur des couvées Lashslayerr|Repaire de l\\\'Aile noire',
		'Wrist' => 'Brassards des dix tempêtes|Razorgore l\\\'Indompté|Repaire de l\\\'Aile noire',
		'Chest' => 'Cuirasse des dix tempêtes|Nefarian|Repaire de l\\\'Aile noire',
		'Hands' => 'Gantelets des dix tempêtes|Gueule-de-feu+Rochébène+Flamegor|Repaire de l\\\'Aile noire',
		'Head' => 'Casque des dix tempêtes|Onyxia|Repaire d\\\'Onyxia',
		'Legs' => 'Cuissards des dix tempêtes|Ragnaros|Coeur du Magma',
		'Shoulder' => 'Epaulettes des dix tempêtes|Chromaggus|Repaire de l\\\'Aile noire'
	);

// Raid Tier 3 Set
$lang['ItemSets_Set']['Tier_3']['Guerrier'] = array(
		'Waist' => 'Sangle de cuirassier|Quête|Naxxramas',
		'Feet' => 'Solerets de cuirassier|Quête|Naxxramas',
		'Wrist' => 'Brassards de cuirassier|Quête|Naxxramas',
		'Chest' => 'Cuirasse de cuirassier|Quête|Naxxramas',
		'Hands' => 'Gantlets de cuirassier|Quête|Naxxramas',
		'Head' => 'Casque de cuirassier|Quête|Naxxramas',
		'Legs' => 'Cuissards de cuirassier|Quête|Naxxramas',
		'Shoulder' => 'Espauliers de cuirassier|Quête|Naxxramas',
		'Finger' => 'Anneau du cuirassier|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Prêtre'] = array(
		'Waist' => 'Ceinture de foi|Quête|Naxxramas',
		'Feet' => 'Sandales de foi|Quête|Naxxramas',
		'Wrist' => 'Manchettes de foi|Quête|Naxxramas',
		'Chest' => 'Robe de foi|Quête|Naxxramas',
		'Hands' => 'Gants de foi|Quête|Naxxramas',
		'Head' => 'Diadème de foi|Quête|Naxxramas',
		'Legs' => 'Jambières de foi|Quête|Naxxramas',
		'Shoulder' => 'Protège-épaules de foi|Quête|Naxxramas',
		'Finger' => 'Anneau de foi|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Druide'] = array(
		'Waist' => 'Ceinturon de marcherêve|Quête|Naxxramas',
		'Feet' => 'Bottes de marcherêve|Quête|Naxxramas',
		'Wrist' => 'Protège-poignets de marcherêve|Quête|Naxxramas',
		'Chest' => 'Tunique de marcherêve|Quête|Naxxramas',
		'Hands' => 'Garde-mains de marcherêve|Quête|Naxxramas',
		'Head' => 'Couvre-chef de marcherêve|Quête|Naxxramas',
		'Legs' => 'Cuissards de marcherêve|Quête|Naxxramas',
		'Shoulder' => 'Spallières de marcherêve|Quête|Naxxramas',
		'Finger' => 'Anneau de marcherêve|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Voleur'] = array(
		'Waist' => 'Sangle de la faucheuse d\\\'os|Quête|Naxxramas',
		'Feet' => 'Solerets de la faucheuse d\\\'os|Quête|Naxxramas',
		'Wrist' => 'Brassards de la faucheuse d\\\'os|Quête|Naxxramas',
		'Chest' => 'Cuirasse de la faucheuse d\\\'os|Quête|Naxxramas',
		'Hands' => 'Gantelets de la faucheuse d\\\'os|Quête|Naxxramas',
		'Head' => 'Casque de la faucheuse d\\\'os|Quête|Naxxramas',
		'Legs' => 'Cuissards de la faucheuse d\\\'os|Quête|Naxxramas',
		'Shoulder' => 'Espauliers de la faucheuse d\\\'os|Quête|Naxxramas',
		'Finger' => 'Anneau de la faucheuse d\\\'os|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Mage'] = array(
		'Waist' => 'Ceinture de givrefeu|Quête|Naxxramas',
		'Feet' => 'Sandales de givrefeu|Quête|Naxxramas',
		'Wrist' => 'Manchettes de givrefeu|Quête|Naxxramas',
		'Chest' => 'Robe de givrefeu|Quête|Naxxramas',
		'Hands' => 'Gants de givrefeu|Quête|Naxxramas',
		'Head' => 'Diadème de givrefeu|Quête|Naxxramas',
		'Legs' => 'Jambières de givrefeu|Quête|Naxxramas',
		'Shoulder' => 'Protège-épaules de givrefeu|Quête|Naxxramas',
		'Finger' => 'Anneau de givrefeu|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Paladin'] = array(
		'Waist' => 'Ceinturon de rédemption|Quête|Naxxramas',
		'Feet' => 'Bottes de rédemption|Quête|Naxxramas',
		'Wrist' => 'Protège-poignets de rédemption|Quête|Naxxramas',
		'Chest' => 'Tunique de rédemption|Quête|Naxxramas',
		'Hands' => 'Garde-mains de rédemption|Quête|Naxxramas',
		'Head' => 'Couvre-chef de rédemption|Quête|Naxxramas',
		'Legs' => 'Cuissards de rédemption|Quête|Naxxramas',
		'Shoulder' => 'Spallières de rédemption|Quête|Naxxramas',
		'Finger' => 'Anneau de rédemption|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Démoniste'] = array(
		'Waist' => 'Ceinture de pestecoeur|Quête|Naxxramas',
		'Feet' => 'Sandales de pestecoeur|Quête|Naxxramas',
		'Wrist' => 'Manchettes de pestecoeur|Quête|Naxxramas',
		'Chest' => 'Robe de pestecoeur|Quête|Naxxramas',
		'Hands' => 'Gants de pestecoeur|Quête|Naxxramas',
		'Head' => 'Diadème de pestecoeur|Quête|Naxxramas',
		'Legs' => 'Jambières de pestecoeur|Quête|Naxxramas',
		'Shoulder' => 'Protège-épaules de pestecoeur|Quête|Naxxramas',
		'Finger' => 'Anneau de pestecoeur|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Chasseur'] = array(
		'Waist' => 'Ceinturon de traqueur des cryptes|Quête|Naxxramas',
		'Feet' => 'Bottes de traqueur des cryptes|Quête|Naxxramas',
		'Wrist' => 'Protège-poignets de traqueur des cryptes|Quête|Naxxramas',
		'Chest' => 'Tunique de traqueur des cryptes|Quête|Naxxramas',
		'Hands' => 'Garde-mains de traqueur des cryptes|Quête|Naxxramas',
		'Head' => 'Couvre-chef de traqueur des cryptes|Quête|Naxxramas',
		'Legs' => 'Cuissards de traqueur des cryptes|Quête|Naxxramas',
		'Shoulder' => 'Spallières de traqueur des cryptes|Quête|Naxxramas',
		'Finger' => 'Anneau de traqueur des cryptes|Kel\\\'Thuzad|Naxxramas'
	);
$lang['ItemSets_Set']['Tier_3']['Chaman'] = array(
		'Waist' => 'Ceinturon de Brise-terre|Quête|Naxxramas',
		'Feet' => 'Bottes de Brise-terre|Quête|Naxxramas',
		'Wrist' => 'Protège-poignets de Brise-terre|Quête|Naxxramas',
		'Chest' => 'Tunique de Brise-terre|Quête|Naxxramas',
		'Hands' => 'Garde-mains de Brise-terre|Quête|Naxxramas',
		'Head' => 'Couvre-chef de Brise-terre|Quête|Naxxramas',
		'Legs' => 'Cuissards de Brise-terre|Quête|Naxxramas',
		'Shoulder' => 'Spallières de Brise-terre|Quête|Naxxramas',
		'Finger' => 'Anneau de Brise-terre|Kel\\\'Thuzad|Naxxramas'
	);

// Raid Tier 4 Set
$lang['ItemSets_Set']['Tier_4']['Guerrier'] = array(
		'Chest1' => 'Cuirasse de porteguerre|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Gantelets de porteguerre|Le conservateur|Karazhan',
		'Head1'  => 'Heaume de bataille de porteguerre|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Grèves de porteguerre|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Plaques d\\\'épaules de porteguerre|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet de porteguerre|Magtheridon|Le Repaire de Maghteridon',
		'Hands2' => 'Garde-mains de porteguerre|Le conservateur|Karazhan',
		'Head2'  => 'Grand heaume de porteguerre|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Garde-jambes de porteguerre|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder2' => 'Garde-épaules de porteguerre|Haut Roi Maulgar|Repaire de Gruul',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Prêtre'] = array(
		'Chest1' => 'Robes des incarnés|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Protège-mains des incarnés|Le conservateur|Karazhan',
		'Head1'  => 'Cercle lumineux des incarnés|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Chausses des incarnés|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Mantelet lumineux des incarnés|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '-setname-',
		'Chest2' => 'Voile des incarnés|Magtheridon|Le Repaire de Maghteridon',
		'Hands2' => 'Gants des incarnés|Le conservateur|Karazhan',
		'Head2'  => 'Cercle de l\\\'âme des incarnés|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Jambières des incarnés|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder2' => 'Mantelet de l\\\'âme des incarnés|Haut Roi Maulgar|Repaire de Gruul',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Druide'] = array(
		'Chest1' => 'Plastron de Malorne|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Gants de Malorne|Le conservateur|Karazhan',
		'Head1'  => 'Bois de Malorne|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Braies de Malorne|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Espauliers de Malorne|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '-setname-',
		'Chest2' => 'Cuirasse de Malorne|Magtheridon|Le Repaire de Maghteridon',
		'Hands2' => 'Gantelets de Malorne|Le conservateur|Karazhan',
		'Head2'  => 'Forte-ramure de Malorne|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Grèves de Malorne|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder2' => 'Mantelet de Malorne|Haut Roi Maulgar|Repaire de Gruul',
		'Separator2' => '-setname-',
		'Chest3' => 'Corselet de Malorne|Magtheridon|Le Repaire de Maghteridon',
		'Hands3' => 'Garde-mains de Malorne|Le conservateur|Karazhan',
		'Head3'  => 'Couronne de Malorne|Prince Malchezaar|Karazhan',
		'Legs3'  => 'Garde-jambes de Malorne|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder3' => 'Garde-épaules de Malorne|Haut Roi Maulgar|Repaire de Gruul'
);

$lang['ItemSets_Set']['Tier_4']['Voleur'] = array(
		'Chest1' => 'Plastron de la Lame-néant|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Gants de la Lame-néant|Le conservateur|Karazhan',
		'Head1'  => 'Masque de la Lame-néant|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Braies de la Lame-néant|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Protège-épaules de la Lame-néant|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Mage'] = array(
		'Chest1' => 'Habit de l\\\'Aldor|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Gants de l\\\'Aldor|Le conservateur|Karazhan',
		'Head1'  => 'Collier de l\\\'Aldor|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Jambards de l\\\'Aldor|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Espauliers de l\\\'Aldor|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Paladin'] = array(
		'Chest1' => 'Plastron de justicier|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Gants de justicier|Le conservateur|Karazhan',
		'Head1'  => 'Diadème de justicier|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Jambières de justicier|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Espauliers de justicier|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet de justicier|Magtheridon|Le Repaire de Maghteridon',
		'Hands2' => 'Garde-mains de justicier|Le conservateur|Karazhan',
		'Head2'  => 'Casque de justicier|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Garde-jambes de justicier|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder2' => 'Garde-épaules de justicier|Haut Roi Maulgar|Repaire de Gruul',
		'Separator2' => '-setname-',
		'Chest3' => 'Cuirasse de justicier|Magtheridon|Le Repaire de Maghteridon',
		'Hands3' => 'Gantelets de justicier|Le conservateur|Karazhan',
		'Head3'  => 'Couronne de justicier|Prince Malchezaar|Karazhan',
		'Legs3'  => 'Grèves de justicier|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder3' => 'Plaques d\\\'épaules de justicier|Haut Roi Maulgar|Repaire de Gruul'
);

$lang['ItemSets_Set']['Tier_4']['Démoniste'] = array(
		'Chest1' => 'Robe Coeur-du-vide|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Gants Coeur-du-vide|Le conservateur|Karazhan',
		'Head1'  => 'Couronne Coeur-du-vide|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Jambières Coeur-du-vide|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Mantelet Coeur-du-vide|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Chasseur'] = array(
		'Chest1' => 'Harnais de traqueur de démons|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Gantelets de traqueur de démons|Le conservateur|Karazhan',
		'Head1'  => 'Grand casque de traqueur de démons|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Grèves de traqueur de démons|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Garde-épaules de traqueur de démons|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Chaman'] = array(
		'Chest1' => 'Corselet de cyclone|Magtheridon|Le Repaire de Maghteridon',
		'Hands1' => 'Garde-mains de cyclone|Le conservateur|Karazhan',
		'Head1'  => 'Casque de cyclone|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Garde-jambes de cyclone|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder1' => 'Garde-épaules de cyclone|Haut Roi Maulgar|Repaire de Gruul',
		'Separator1' => '-setname-',
		'Chest2' => 'Cuirasse de cyclone|Magtheridon|Le Repaire de Maghteridon',
		'Hands2' => 'Gantelets de cyclone|Le conservateur|Karazhan',
		'Head2'  => 'Heaume de cyclone|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Kilt de guerre de cyclone|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder2' => 'Plaques d\\\'épaules de cyclone|Haut Roi Maulgar|Repaire de Gruul',
		'Separator2' => '-setname-',
		'Chest3' => 'Haubert de cyclone|Magtheridon|Le Repaire de Maghteridon',
		'Hands3' => 'Gants de cyclone|Le conservateur|Karazhan',
		'Head3' => 'Coiffure de cyclone|Prince Malchezaar|Karazhan',
		'Legs3'  => 'Kilt de cyclone|Gruul le Tue-dragon|Repaire de Gruul',
		'Shoulder3' => 'Protège-épaules de cyclone|Haut Roi Maulgar|Repaire de Gruul'
);


// Raid Tier 5 Set
$lang['ItemSets_Set']['Tier_5']['Guerrier'] = array(
		'Chest1' => 'Cuirasse de destructeur|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Gantelets de destructeur|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Heaume de bataille de destructeur|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Grèves de destructeur|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Lames d\\\'épaules de destructeur|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet de destructeur|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands2' => 'Garde-mains de destructeur|Leotheras the Blind|Sanctuaire du Serpent',
		'Head2'  => 'Grand heaume de destructeur|Lady Vashj|Sanctuaire du Serpent',
		'Legs2'  => 'Garde-jambes de destructeur|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder2' => 'Garde-épaules de destructeur|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Prêtre'] = array(
		'Chest1' => 'Habits de l\\\'avatar|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Gants de l\\\'avatar|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Capuche de l\\\'avatar|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Braies de l\\\'avatar|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Mantelet de l\\\'avatar|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '-setname-',
		'Chest2' => 'Voile de l\\\'avatar|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands2' => 'Garde-mains de l\\\'avatar|Leotheras the Blind|Sanctuaire du Serpent',
		'Head2'  => 'Chaperon de l\\\'avatar|Lady Vashj|Sanctuaire du Serpent',
		'Legs2'  => 'Jambières de l\\\'avatar|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder2' => 'Ailes de l\\\'avatar|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Druide'] = array(
		'Chest1' => 'Plastron de Nordrassil|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Gantelets de Nordrassil|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Couvre-chef de Nordrassil|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Kilt de courroux de Nordrassil|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Mantelet de courroux de Nordrassil|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '-setname-',
		'Chest2' => 'Pansière de Nordrassil|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands2' => 'Manicles de Nordrassil|Leotheras the Blind|Sanctuaire du Serpent',
		'Head2'  => 'Coiffure de Nordrassil|Lady Vashj|Sanctuaire du Serpent',
		'Legs2'  => 'Kilt farouche de Nordrassil|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder2' => 'Mantelet farouche de Nordrassil|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator2' => '-setname-',
		'Chest3' => 'Corselet de Nordrassil|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands3' => 'Gants de Nordrassil|Leotheras the Blind|Sanctuaire du Serpent',
		'Head3'  => 'Protège-front de Nordrassil|Lady Vashj|Sanctuaire du Serpent',
		'Legs3'  => 'Kilt de vie de Nordrassil|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder3' => 'Mantelet de vie de Nordrassil|Void Reaver|L\\\'Oeil de la Tempête'
);

$lang['ItemSets_Set']['Tier_5']['Voleur'] = array(
		'Chest1' => 'Corselet de mantemort|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Garde-mains de mantemort|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Casque de mantemort|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Garde-jambes de mantemort|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Protège-épaules de mantemort|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Mage'] = array(
		'Chest1' => 'Robe de Tirisfal|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Gants de Tirisfal|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Capuche de Tirisfal|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Jambières de Tirisfal|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Mantelet de Tirisfal|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Paladin'] = array(
		'Chest1' => 'Plastron de Cristalforge|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Gants de Cristalforge|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Grand heaume de Cristalforge|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Jambières de Cristalforge|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Espauliers de Cristalforge|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet de Cristalforge|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands2' => 'Garde-mains de Cristalforge|Leotheras the Blind|Sanctuaire du Serpent',
		'Head2'  => 'Casque de Cristalforge|Lady Vashj|Sanctuaire du Serpent',
		'Legs2'  => 'Garde-jambes de Cristalforge|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder2' => 'Garde-épaules de Cristalforge|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator2' => '-setname-',
		'Chest3' => 'Cuirasse de Cristalforge|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands3' => 'Gantelets de Cristalforge|Leotheras the Blind|Sanctuaire du Serpent',
		'Head3'  => 'Heaume de guerre de Cristalforge|Lady Vashj|Sanctuaire du Serpent',
		'Legs3'  => 'Grèves de Cristalforge|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder3' => 'Spallières de Cristalforge|Void Reaver|L\\\'Oeil de la Tempête'
);

$lang['ItemSets_Set']['Tier_5']['Démoniste'] = array(
		'Chest1' => 'Robe du corrupteur|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Gants du corrupteur|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Chaperon du corrupteur|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Jambières du corrupteur|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Mantelet du corrupteur|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Chasseur'] = array(
		'Chest1' => 'Haubert de traqueur des failles|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Gantelets de traqueur des failles|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Heaume de traqueur des failles|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Jambières de traqueur des failles|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Mantelet de traqueur des failles|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Chaman'] = array(
		'Chest1' => 'Plastron du cataclysme|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands1' => 'Manicles du cataclysme|Leotheras the Blind|Sanctuaire du Serpent',
		'Head1'  => 'Couvre-chef du cataclysme|Lady Vashj|Sanctuaire du Serpent',
		'Legs1'  => 'Jambières du cataclysme|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder1' => 'Protège-épaules du cataclysme|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator1' => '-setname-',
		'Chest2' => 'Pansière du cataclysme|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands2' => 'Gantelets du cataclysme|Leotheras the Blind|Sanctuaire du Serpent',
		'Head2'  => 'Heaume du cataclysme|Lady Vashj|Sanctuaire du Serpent',
		'Legs2'  => 'Cuissards du cataclysme|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder2' => 'Plaques d\\\'épaules du cataclysme|Void Reaver|L\\\'Oeil de la Tempête',
		'Separator2' => '-setname-',
		'Chest3' => 'Corselet du cataclysme|Kael\\\'Thas|L\\\'Oeil de la Tempête',
		'Hands3' => 'Gants du cataclysme|Leotheras the Blind|Sanctuaire du Serpent',
		'Head3' => 'Garde-jambes du cataclysme|Lady Vashj|Sanctuaire du Serpent',
		'Legs3'  => 'Kilt de guerre de cyclone|Fathom-Lord Karathress|Sanctuaire du Serpent',
		'Shoulder3' => 'Garde-épaules du cataclysme|Void Reaver|L\\\'Oeil de la Tempête'
);


// Raid Tier 6 Set
$lang['ItemSets_Set']['Tier_6']['Guerrier'] = array(
		'Chest1' => 'Cuirasse d\\\'assaut|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Gantelets d\\\'assaut|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Heaume de bataille d\\\'assaut|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Grèves d\\\'assaut|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Lames d\\\'épaules d\\\'assaut|Mère Shahraz|Temple noir',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet d\\\'assaut|Illidan Hurlorage|Temple noir',
		'Hands2' => 'Garde-mains d\\\'assaut|Azgalor|Sommet d\\\'Hyjal',
		'Head2'  => 'Grand heaume d\\\'assaut|Archimonde|Sommet d\\\'Hyjal',
		'Legs2'  => 'Garde-jambes d\\\'assaut|Veras Ombrenoir|Temple noir',
		'Shoulder2' => 'Garde-épaules d\\\'assaut|Mère Shahraz|Temple noir',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Prêtre'] = array(
		'Chest1' => 'Habits d\\\'absolution|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Gants d\\\'absolution|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Capuche d\\\'absolution|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Braies d\\\'absolution|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Mantelet d\\\'absolution|Mère Shahraz|Temple noir',
		'Separator1' => '-setname-',
		'Chest2' => 'Voile d\\\'absolution|Illidan Hurlorage|Temple noir',
		'Hands2' => 'Garde-mains d\\\'absolution|Azgalor|Sommet d\\\'Hyjal',
		'Head2'  => 'Chaperon d\\\'absolution|Archimonde|Sommet d\\\'Hyjal',
		'Legs2'  => 'Jambières d\\\'absolution|Veras Ombrenoir|Temple noir',
		'Shoulder2' => 'Protège-épaules d\\\'absolution|Mère Shahraz|Temple noir',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Druide'] = array(
		'Chest1' => 'Gilet Coeur-de-tonnerre|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Garde-mains Coeur-de-tonnerre|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Protège-front Coeur-de-tonnerre|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Pantalon Coeur-de-tonnerre|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Protège-épaules Coeur-de-tonnerre|Mère Shahraz|Temple noir',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet Coeur-de-tonnerre|Illidan Hurlorage|Temple noir',
		'Hands2' => 'Gantelets Coeur-de-tonnerre|Azgalor|Sommet d\\\'Hyjal',
		'Head2'  => 'Couvre-chef Coeur-de-tonnerre|Archimonde|Sommet d\\\'Hyjal',
		'Legs2'  => 'Jambières Coeur-de-tonnerre|Veras Ombrenoir|Temple noir',
		'Shoulder2' => 'Espauliers Coeur-de-tonnerre|Mère Shahraz|Temple noir',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique Coeur-de-tonnerre|Illidan Hurlorage|Temple noir',
		'Hands3' => 'Gants Coeur-de-tonnerre|Azgalor|Sommet d\\\'Hyjal',
		'Head3'  => 'Casque Coeur-de-tonnerre|Archimonde|Sommet d\\\'Hyjal',
		'Legs3'  => 'Garde-jambes Coeur-de-tonnerre|Veras Ombrenoir|Temple noir',
		'Shoulder3' => 'Spallières Coeur-de-tonnerre|Mère Shahraz|Temple noir'
);

$lang['ItemSets_Set']['Tier_6']['Voleur'] = array(
		'Chest1' => 'Corselet de tueur|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Garde-mains de tueur|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Heaume de tueur|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Garde-jambes de tueur|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Protège-épaules de tueur|Mère Shahraz|Temple noir',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Mage'] = array(
		'Chest1' => 'Robe de la tempête|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Gants de la tempête|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Capuche de la tempête|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Jambières de la tempête|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Mantelet de la tempête|Mère Shahraz|Temple noir',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Paladin'] = array(
		'Chest1' => 'Plastron du porteur de Lumière|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Gants du porteur de Lumière|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Grand heaume du porteur de Lumière|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Jambières du porteur de Lumière|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Espauliers du porteur de Lumière|Mère Shahraz|Temple noir',
		'Separator1' => '-setname-',
		'Chest2' => 'Corselet du porteur de Lumière|Illidan Hurlorage|Temple noir',
		'Hands2' => 'Garde-mains du porteur de Lumière|Azgalor|Sommet d\\\'Hyjal',
		'Head2'  => 'Casque du porteur de Lumière|Archimonde|Sommet d\\\'Hyjal',
		'Legs2'  => 'Garde-jambes du porteur de Lumière|Veras Ombrenoir|Temple noir',
		'Shoulder2' => 'Garde-épaules du porteur de Lumière|Mère Shahraz|Temple noir',
		'Separator2' => '-setname-',
		'Chest3' => 'Cuirasse du porteur de Lumière|Illidan Hurlorage|Temple noir',
		'Hands3' => 'Gantelets du porteur de Lumière|Azgalor|Sommet d\\\'Hyjal',
		'Head3'  => 'Heaume de guerre du porteur de Lumière|Archimonde|Sommet d\\\'Hyjal',
		'Legs3'  => 'Grèves du porteur de Lumière|Veras Ombrenoir|Temple noir',
		'Shoulder3' => 'Epaulières du porteur de Lumière|Mère Shahraz|Temple noir'
);

$lang['ItemSets_Set']['Tier_6']['Démoniste'] = array(
		'Chest1' => 'Robe du maléfice|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Gants du maléfice|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Chaperon du maléfice|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Jambières du maléfice|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Mantelet du maléfice|Mère Shahraz|Temple noir',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Chasseur'] = array(
		'Chest1' => 'Corselet de traqueur de gronn|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Gants de traqueur de gronn|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Casque de traqueur de gronn|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Jambières de traqueur de gronn|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Spallières de traqueur de gronn|Mère Shahraz|Temple noir',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Chaman'] = array(
		'Chest1' => 'Cuirasse Brise-ciel|Illidan Hurlorage|Temple noir',
		'Hands1' => 'Gantelets Brise-ciel|Azgalor|Sommet d\\\'Hyjal',
		'Head1'  => 'Protège-front Brise-ciel|Archimonde|Sommet d\\\'Hyjal',
		'Legs1'  => 'Garde-jambes Brise-ciel|Veras Ombrenoir|Temple noir',
		'Shoulder1' => 'Mantelet Brise-ciel|Mère Shahraz|Temple noir',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique Brise-ciel|Illidan Hurlorage|Temple noir',
		'Hands2' => 'Poignes Brise-ciel|Azgalor|Sommet d\\\'Hyjal',
		'Head2'  => 'Couvre-chef Brise-ciel|Archimonde|Sommet d\\\'Hyjal',
		'Legs2'  => 'Pantalon Brise-ciel|Veras Ombrenoir|Temple noir',
		'Shoulder2' => 'Espauliers Brise-ciel|Mère Shahraz|Temple noir',
		'Separator2' => '-setname-',
		'Chest3' => 'Corselet Brise-ciel|Illidan Hurlorage|Temple noir',
		'Hands3' => 'Gants Brise-ciel|Azgalor|Sommet d\\\'Hyjal',
		'Head3'  => 'Casque Brise-ciel|Archimonde|Sommet d\\\'Hyjal',
		'Legs3'  => 'Jambières Brise-ciel|Veras Ombrenoir|Temple noir',
		'Shoulder3' => 'Protège-épaules Brise-ciel|Mère Shahraz|Temple noir'
);


// Ruins of Ahn'Qiraj Set
$lang['ItemSets_Set']['AQ20']['Druide'] = array(
		'Back' => 'Cape de vie interminable|Quête|AQ20',
		'Finger' => 'Bague de vie interminable|Quête|AQ20',
		'Mainhand' => 'Masse de vie interminable|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Chasseur'] = array(
		'Back' => 'Cape du Sentier Invisible|Quête|AQ20',
		'Finger' => 'Chevaliere du Sentier Invisible|Quête|AQ20',
		'Mainhand' => 'Faux du Sentier Invisible|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Mage'] = array(
		'Back' => 'Drapé des secrets scellés|Quête|AQ20',
		'Finger' => 'Anneau des secrets scellés|Quête|AQ20',
		'Mainhand' => ' Lame des secrets scellés|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Paladin'] = array(
		'Back' => 'Cape de justice éternelle|Quête|AQ20',
		'Finger' => 'Anneau de Justice Eternelle|Quête|AQ20',
		'Mainhand' => 'Lame de Justice Eternelle|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Prêtre'] = array(
		'Back' => 'Voile de sagesse infinie|Quête|AQ20',
		'Finger' => 'Anneau de sagesse infinie|Quête|AQ20',
		'Mainhand' => 'Marteau de sagesse infinie|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Voleur'] = array(
		'Back' => 'Cape des Ombres Voilées|Quête|AQ20',
		'Finger' => 'Bague des Ombres Voilées|Quête|AQ20',
		'Mainhand' => 'Dague des Ombres Voilées|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Chaman'] = array(
		'Back' => 'Cape de la tempête imminente|Quête|AQ20',
		'Finger' => 'Anneau de la tempête imminente|Quête|AQ20',
		'Mainhand' => 'Marteau de la tempête imminente|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Démoniste'] = array(
		'Back' => 'Voile des noms inexprimés|Quête|AQ20',
		'Finger' => 'Anneau des noms inexprimés|Quête|AQ20',
		'Mainhand' => 'Kriss des noms inexprimés|Quête|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Guerrier'] = array(
		'Back' => 'Drappé de force inflexible|Quête|AQ20',
		'Finger' => 'Chevaliere de force inflexible|Quête|AQ20',
		'Mainhand' => 'Faucille de force inflexible|Quête|AQ20'
);

// Temple of Ahn'Qiraj Set
$lang['ItemSets_Set']['AQ40']['Druide'] = array(
		'Feet' => 'Bottes de la genèse|Quête|AQ40',
		'Chest' => 'Gilet de la genèse|Quête|AQ40',
		'Head' => 'Casque de la genèse|Quête|AQ40',
		'Legs' => 'Pantalon de la genèse|Quête|AQ40',
		'Shoulder' => 'Protège-épaules de la genèse|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Chasseur'] = array(
		'Feet' => 'Bottes du Frappeur|Quête|AQ40',
		'Chest' => 'Haubert du Frappeur|Quête|AQ40',
		'Head' => 'Diadème du Frappeur|Quête|AQ40',
		'Legs' => 'Jambières du Frappeur|Quête|AQ40',
		'Shoulder' => 'Espauliers du Frappeur|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Mage'] = array(
		'Feet' => 'Bottes de l\\\'énigme|Quête|AQ40',
		'Chest' => 'Robe de l\\\'énigme|Quête|AQ40',
		'Head' => 'Diadème de l\\\'énigme|Quête|AQ40',
		'Legs' => 'Jambières de l\\\'énigme|Quête|AQ40',
		'Shoulder' => 'Protège-épaules de l\\\'énigme|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Paladin'] = array(
		'Feet' => 'Grèves du Vengeur|Quête|AQ40',
		'Chest' => 'Cuirasse du Vengeur|Quête|AQ40',
		'Head' => 'Couronne du Vengeur|Quête|AQ40',
		'Legs' => 'Cuissards du Vengeur|Quête|AQ40',
		'Shoulder' => 'Espauliers du Vengeur|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Prêtre'] = array(
		'Feet' => 'Espauliers du Vengeur|Quête|AQ40',
		'Chest' => 'Habit de l\\\'oracle|Quête|AQ40',
		'Head' => 'Tiare de l\\\'oracle|Quête|AQ40',
		'Legs' => 'Pantalon de l\\\'oracle|Quête|AQ40',
		'Shoulder' => 'Mantelet de l\\\'oracle|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Voleur'] = array(
		'Feet' => 'Bottes de dispensateur de mort|Quête|AQ40',
		'Chest' => 'Veste de dispensateur de mort|Quête|AQ40',
		'Head' => 'Casque de dispensateur de mort|Quête|AQ40',
		'Legs' => 'Jambières de dispensateur de mort|Quête|AQ40',
		'Shoulder' => 'Spallières de dispensateur de mort|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Chaman'] = array(
		'Feet' => 'Bottes d\\\'implorateur de tempête|Quête|AQ40',
		'Chest' => 'Haubert d\\\'implorateur de tempête|Quête|AQ40',
		'Head' => 'Diadème d\\\'implorateur de tempête|Quête|AQ40',
		'Legs' => 'Jambières d\\\'implorateur de tempête|Quête|AQ40',
		'Shoulder' => 'Espauliers d\\\'implorateur de tempête|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Démoniste'] = array(
		'Feet' => 'Bottines d\\\'implorateur funeste|Quête|AQ40',
		'Chest' => 'Robe d\\\'implorateur funeste|Quête|AQ40',
		'Head' => 'Diadème d\\\'implorateur funeste|Quête|AQ40',
		'Legs' => 'Pantalon d\\\'implorateur funeste|Quête|AQ40',
		'Shoulder' => 'Mantelet d\\\'implorateur funeste|Quête|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Guerrier'] = array(
		'Feet' => 'Grèves du Conquérant|Quête|AQ40',
		'Chest' => 'Cuirasse du Conquérant|Quête|AQ40',
		'Head' => 'Couronne du Conquérant|Quête|AQ40',
		'Legs' => 'Cuissards du Conquérant|Quête|AQ40',
		'Shoulder' => 'Spallières du Conquérant|Quête|AQ40'
);

// Zul'Gurub set
$lang['ItemSets_Set']['ZG']['Druide'] = array(
        'Waist' => 'Ceinture d\\\'haruspice zandalar|Honoré|ZG',
        'Wrist' => 'Brassards d\\\'haruspice zandalar|Amical|ZG',
        'Chest' => 'Tunique d\\\'haruspice zandalar|Révéré|ZG',
        'Shoulder' => '',
        'Neck' => 'Varech enchanté des Mers du sud parfait|Exalté|ZG',
        'Trinket' => 'Charme de nature de Wushoolay|Poupée vaudou percée|ZG'
    );
$lang['ItemSets_Set']['ZG']['Chasseur'] = array(
        'Waist' => 'Ceinture de prédateur zandalar|Honoré|ZG',
        'Wrist' => 'Brassards de prédateur zandalar|Amical|ZG',
        'Chest' => '',
        'Shoulder' => 'Mantelet de prédateur zandalar|Révéré|ZG',
        'Neck' => 'Courroux du maelström|Exalté|ZG',
        'Trinket' => 'Charme des bêtes de Renataki|Poupée vaudou percée|ZG'
    );
$lang['ItemSets_Set']['ZG']['Mage'] = array(
        'Waist' => '',
        'Wrist' => 'Couvre-bras d\\\'illusionniste zandalar|Amical|ZG',
        'Chest' => ' Robe d\\\'illusionniste zandalar|Révéré|ZG',
        'Shoulder' => 'Mantelet d\\\'illusionniste zandalar|Honoré|ZG',
        'Neck' => 'Joyau de Kajaro|Exalté|ZG',
        'Trinket' => ' Charme de magie d\\\'Hazza\\\'rah|Poupée vaudou percée|ZG'
    );
$lang['ItemSets_Set']['ZG']['Paladin'] = array(
        'Waist' => 'Ceinture de libre-penseur zandalar|Honoré|ZG',
        'Wrist' => 'Garde-bras de libre-penseur zandalar|Amical|ZG',
        'Chest' => 'Cuirasse de libre-penseur zandalar|Révéré|ZG',
        'Shoulder' => '',
        'Neck' => 'Charme de courage de Gri\\\'lek|Exalté|ZG',
        'Trinket' => 'Marque de héros|Poupée vaudou percée|ZG'
    );
$lang['ItemSets_Set']['ZG']['Prêtre'] = array(
        'Waist' => 'Cordon de confesseur zandalar|Honoré|ZG',
        'Wrist' => 'Couvre-bras de confesseur zandalar|Amical|ZG',
        'Chest' => '',
        'Shoulder' => 'Mantelet de confesseur zandalar|Révéré|ZG',
        'Neck' =>  'L\\\'Oeil omnivoyant de Zuldazar|Exalté|ZG',
        'Trinket' => 'Charme de soin d\\\'Hazza\\\'rah|Poupée vaudou percée|ZG'
    );
$lang['ItemSets_Set']['ZG']['Voleur'] = array(
        'Waist' => '',
        'Wrist' => 'Brassards d\\\'insensé zandalar|Amical|ZG',
        'Chest' => 'Tunique d\\\'insensé zandalar|Révéré|ZG',
        'Shoulder' => 'Mantelet d\\\'insensé zandalar|Honoré|ZG',
        'Neck' => ' Talisman de maîtrise de l\\\'ombre zandalarien|Exalté|ZG',
        'Trinket' => 'Charme de supercherie de Renataki|Poupée vaudou percée|ZG'
);
$lang['ItemSets_Set']['ZG']['Chaman'] = array(
        'Waist' => 'Ceinture d\\\'augure zandalar|Honoré|ZG',
        'Wrist' => 'Brassards d\\\'augure zandalar|Amical|ZG',
        'Chest' => 'Haubert d\\\'augure zandalar|Révéré|ZG',
        'Shoulder' => '',
        'Neck' => 'Vision limpide de Voodress|Exalté|ZG',
        'Trinket' => 'Charme-esprits de Wushoolay|Poupée vaudou percée|ZG'
);
$lang['ItemSets_Set']['ZG']['Démoniste'] = array(
        'Waist'  => '',
        'Wrist' => 'Couvre-bras de démoniaque zandalar|Amical|ZG',
        'Chest' => 'Robe de démoniaque zandalar|Révéré|ZG',
        'Shoulder' => 'Mantelet de démoniaque zandalar|Honoré|ZG',
        'Neck' => 'Souillure irrésistible de Kezan|Exalté|ZG',
        'Trinket' => 'Charme de destruction d\\\'Hazza\\\'rah|Poupée vaudou percée|ZG'
);
$lang['ItemSets_Set']['ZG']['Guerrier'] = array(
        'Waist' => 'Ceinture de redresseur de torts zandalar|Honoré|ZG',
        'Wrist' => 'Garde-bras de redresseur de torts zandalar|Amical|ZG',
        'Chest' => 'Cuirasse de redresseur de torts zandalar|Révéré|ZG',
        'Shoulder' => '',
        'Neck' => 'Rage de Mugamba|Exalté|ZG',
        'Trinket' => 'Charme de puissance de Gri\\\'lek|Poupée vaudou percée|ZG'
);

//   PVP_Rare Alliance
$lang['ItemSets_Set']['PVP_Rare']['A']['Druide']  = array(
		'Feet'  => 'Bottines de chevalier-lieutenant en peau de dragon|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Plastron de chevalier-capitaine en peau de dragon|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Poignes de chevalier-lieutenant en peau de dragon|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Protège-front de lieutenant-commandant en peau de dragon|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de chevalier-capitaine en peau de dragon|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de lieutenant-commandant en peau de dragon|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Chasseur'] = array(
		'Feet'  => 'Grèves de chevalier-lieutenant en anneaux|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Haubert de chevalier-capitaine en anneaux|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Cestes de chevalier-lieutenant en anneaux|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Casque de lieutenant-commandant en anneaux|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Cuissards de chevalier-capitaine en anneaux|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de lieutenant-commandant en anneaux|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Mage'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en soie|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Tunique de chevalier-capitaine en soie|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Protège-mains de chevalier-lieutenant en soie|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Capuche de lieutenant-commandant en soie|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Cuissards de chevalier-capitaine en soie|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Mantelet de lieutenant-commandant en soie|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Paladin'] = array(
		'Feet'  => 'Solerets lamellaires de chevalier-capitaine|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Cuirasse lamellaire de chevalier-capitaine|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets lamellaires de chevalier-capitaine|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Protège-front lamellaire de lieutenant-commandant|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières lamellaires de chevalier-capitaine|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières lamellaires de lieutenant-commandant|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Prêtre'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en satin|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Tunique de chevalier-capitaine en satin|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Protège-mains de chevalier-lieutenant en satin|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Chaperon de lieutenant-commandant en satin|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Cuissards de chevalier-capitaine en satin|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Mantelet de lieutenant-commandant en satin|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Voleur'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en cuir|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Plastron de chevalier-capitaine en cuir|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Poignes de chevalier-lieutenant en cuir|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Casque de lieutenant-commandant en cuir|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Cuissards de chevalier-capitaine en cuir|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de lieutenant-commandant en cuir|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Démoniste'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en tisse-effroi|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Tunique de chevalier-capitaine en tisse-effroi|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Protège-mains de chevalier-lieutenant en tisse-effroi|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Capuche de lieutenant-commandant en tisse-effroi|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Cuissards de chevalier-capitaine en tisse-effroi|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Spallières de lieutenant-commandant en tisse-effroi|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Guerrier'] = array(
		'Feet'  => 'Grèves de chevalier-lieutenant en plaques|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Haubert de chevalier-capitaine en plaques|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets de chevalier-lieutenant en plaques|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Heaume de lieutenant-commandant en plaques|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de chevalier-capitaine en plaques|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de lieutenant-commandant en plaques|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Chaman'] = array(
		'Feet'  => 'Grèves de chevalier-lieutenant en mailles|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Haubert de chevalier-capitaine en mailles|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Cestes de chevalier-lieutenant en mailles|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Protège-front de lieutenant-commandant en mailles|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Garde-jambes de chevalier-capitaine en mailles|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epauliers de lieutenant-commandant en mailles|2.805 Honneur, 20x Arathi|JcJ'
);

//   PVP_Rare Horde

$lang['ItemSets_Set']['PVP_Rare']['H']['Druide'] = array(
		'Feet'  => 'Bottines de garde de sang en peau de dragon|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Plastron de légionnaire en peau de dragon|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Poignes de garde de sang en peau de dragon|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Protège-front de champion en peau de dragon|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de légionnaire en peau de dragon|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de champion en peau de dragon|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Chasseur'] = array(
		'Feet'  => 'Bottes de garde de sang en anneaux|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Cuirasse de légionnaire en anneaux|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets de garde de sang en anneaux|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Heaume de champion en anneaux|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de légionnaire en anneaux|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Espauliers de champion en anneaux|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Mage'] = array(
		'Feet'  => 'Brodequins de garde de sang en soie|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Tunique de légionnaire en soie|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Protège-mains de garde de sang en soie|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Capuche de champion en soie|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Garde-jambes de légionnaire en soie|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Mantelet de champion en soie|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Prêtre'] = array(
		'Feet'  => 'Brodequins de garde de sang en satin|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Tunique de légionnaire en satin|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Protège-mains de garde de sang en satin|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Chaperon de champion en satin|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Garde-jambes de légionnaire en satin|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Mantelet de champion en satin|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Voleur'] = array(
		'Feet'  => 'Brodequins de garde de sang en cuir|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Plastron de légionnaire en cuir|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Poignes de garde de sang en cuir|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Casque de champion en cuir|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Garde-jambes de légionnaire en cuir|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de champion en cuir|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Chaman'] = array(
		'Feet'  => 'Grèves de garde de sang en mailles|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Haubert de légionnaire en mailles|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Cestes de garde de sang en mailles|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Protège-front de champion en mailles|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Garde-jambes de légionnaire en mailles|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Espauliers de champion en mailles|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Démoniste'] = array(
		'Feet'  => 'Brodequins de garde de sang en tisse-effroi|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Tunique de légionnaire en tisse-effroi|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Protège-mains de garde de sang en tisse-effroi|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Capuche de champion en tisse-effroi|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Garde-jambes de légionnaire en tisse-effroi|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Spallières de champion en tisse-effroi|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Guerrier'] = array(
		'Feet'  => 'Bottes de garde de sang en plaques|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Armure de plaques de légionnaire|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de garde de sang en plaques|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Heaume de champion en plaques|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de légionnaire en plaques|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Espauliers de champion en plaques|2.805 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Paladin'] = array(
		'Feet'  => 'Solerets lamellaires de garde de sang|2.805 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Cuirasse lamellaire de légionnaire|4.590 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets lamellaires de garde de sang|2.805 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Casque lamellaire de champion|4.335 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières lamellaires de légionnaire|4.335 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières lamellaires de champion|2.805 Honneur, 20x Arathi|JcJ'
);


//   PVP_Epic Alliance
$lang['ItemSets_Set']['PVP_Epic']['A']['Druide'] = array(
		'Feet'  => 'Bottes de maréchal en tisse-effroi|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Robe de grand maréchal en tisse-effroi|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de maréchal en tisse-effroi|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Couronne de grand maréchal|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de maréchal en tisse-effroi|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de grand maréchal en tisse-effroi|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Chasseur'] = array(
		'Feet'  => 'Maréchal\\\'s Chain Boots|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Grand maréchal\\\'s Chain Breastplate|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Maréchal\\\'s Chain Grips|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Grand maréchal\\\'s Chain Helm|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Maréchal\\\'s Chain Legguards|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Grand maréchal\\\'s Chain Spaulders|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Mage'] = array(
		'Feet'  => 'Bottillons de maréchal en soie|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Habit de grand maréchal en soie|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de maréchal en soie|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Cerclet de grand maréchal|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de maréchal en soie|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Spallières de grand maréchal en soie|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Paladin'] = array(
		'Feet'  => 'Bottes lamellaires de maréchal|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Pansière lamellaire de grand maréchal|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants lamellaires de maréchal|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Casque lamellaire de grand maréchal|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => ' Jambières lamellaires de maréchal|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Espauliers lamellaires de grand maréchal|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Prêtre'] = array(
		'Feet'  => 'Sandales de maréchal en satin|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Habit de grand maréchal en satin|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de maréchal en satin|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Coiffure de grand maréchal|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Pantalon de maréchal en satin|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Mantelet de grand maréchal en satin|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Voleur'] = array(
		'Feet'  => 'Bottes de maréchal en cuir|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Plastron de grand maréchal en cuir|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de maréchal en cuir|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Masque de grand maréchal en cuir|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de maréchal en cuir|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulettes de grand maréchal en cuir|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Démoniste'] = array(
		'Feet'  => 'Bottes de maréchal en tisse-effroi|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Robe de grand maréchal en tisse-effroi|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de maréchal en tisse-effroi|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Couronne de grand maréchal|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de maréchal en tisse-effroi|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de grand maréchal en tisse-effroi|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Guerrier'] = array(
		'Feet'  => 'Bottes de maréchal en plaques|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Armure de grand maréchal en plaques|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets de maréchal en plaques|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Casque de grand maréchal en plaques|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Jambières de maréchal en plaques|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Garde-épaules de grand maréchal en plaques|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Chaman'] = array(
		'Feet' => 'Bottes de maréchal en mailles|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Cotte de mailles de grand maréchal|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets de maréchal en mailles|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Heaume de grand maréchal en mailles|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Jambières de maréchal en mailles|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Spallières de grand maréchal en mailles|8.415 Honneur, 20x Arathi|JcJ'
);

//   PVP_Epic Horde
$lang['ItemSets_Set']['PVP_Epic']['H']['Druide'] = array(
		'Feet' => 'Bottes de général en peau de dragon|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Haubert de seigneur de guerre en peau de dragon|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de général en peau de dragon|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Casque de seigneur de guerre en peau de dragon|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Jambières de général en peau de dragon|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulettes de seigneur de guerre en peau de dragon|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Chasseur'] = array(
		'Feet' => 'Bottes de général en anneaux|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Plastron de seigneur de guerre en anneaux|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de général en anneaux|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Heaume de seigneur de guerre en anneaux|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Garde-jambes de général en anneaux|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de seigneur de guerre en anneaux|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Mage'] = array(
		'Feet' => 'Bottes de général en soie|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Grande tenue de seigneur de guerre en soie|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Garde-mains de général en soie|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Capuche de seigneur de guerre en soie|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Chausses de général en soie|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Amict de seigneur de guerre en soie|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Prêtre'] = array(
		'Feet' => 'Bottes de général en satin|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Robe de seigneur de guerre en satin|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de général en satin|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Capuche de seigneur de guerre en satin|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Jambières de général en satin|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Mantelet de seigneur de guerre en satin|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Voleur'] = array(
		'Feet' => 'Bottines de général en cuir|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Cuirasse de seigneur de guerre en cuir|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Mitaines de général en cuir|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Casque de seigneur de guerre en cuir|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Garde-jambes de général en cuir|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Spallières de seigneur de guerre en cuir|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Chaman'] = array(
		'Feet' => 'Bottes de général en mailles|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Armure de seigneur de guerre en mailles|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets de général en mailles|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Heaume de seigneur de guerre en mailles|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Jambières de général en mailles|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Spallières de seigneur de guerre en mailles|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Démoniste']  = array(
		'Feet' => 'Bottes de général en tisse-effroi|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Robe de seigneur de guerre en tisse-effroi|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants de général en tisse-effroi|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Chaperon de seigneur de guerre en tisse-effroi|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Pantalon de général en tisse-effroi|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Mantelet de seigneur de guerre en tisse-effroi|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Guerrier'] = array(
		'Feet' => 'Bottes de général en plaques|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Armure de plaques de seigneur de guerre|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gantelets de général en plaques|8.415 Honneur, 20x Alterac|JcJ',
		'Head' => 'Heaume de seigneur de guerre en plaques|13.005 Honneur, 30x Alterac|JcJ',
		'Legs' => 'Jambières de général en plaques|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Epaulières de seigneur de guerre en plaques|8.415 Honneur, 20x Arathi|JcJ'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Paladin'] = array(
		'Feet'  => 'Bottes lamellaire de général|8.415 Honneur, 20x Arathi|JcJ',
		'Chest' => 'Pansière lamellaire de seigneur de guerre|13.770 Honneur, 30x Arathi|JcJ',
		'Hands' => 'Gants lamellaires de général|8.415 Honneur, 20x Alterac|JcJ',
		'Head'  => 'Casque lamellaire de seigneur de guerre|13.005 Honneur, 30x Alterac|JcJ',
		'Legs'  => 'Cuissards lamellaires de général|13.005 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder' => 'Espauliers lamellaires de seigneur de guerre|8.415 Honneur, 20x Arathi|JcJ'
);


// PvP Level 70 Alliance
$lang['ItemSets_Set']['PVP_Level70']['A']['Guerrier'] = array(
		'Chest1' => 'Plastron de connétable en plaques|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets de connétable en plaques|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Heaume de connétable en plaques|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de connétable en plaques|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Epaulières de connétable en plaques|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Prêtre'] = array(
		'Chest1' => 'Habit de connétable en étoffe lunaire|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Mitaines de connétable en étoffe lunaire|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Capuche de connétable en étoffe lunaire|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de connétable en étoffe lunaire|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Protège-épaules de connétable en étoffe lunaire|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Robe de connétable en satin|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gants de connétable en satin|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Chaperon de connétable en satin|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Jambières de connétable en satin|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Mantelet de connétable en satin|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Druide'] = array(
		'Chest1' => 'Tunique de connétable en peau de dragon|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gants de connétable en peau de dragon|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Heaume de connétable en peau de dragon|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de connétable en peau de dragon|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de connétable en peau de dragon|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique de connétable en cuir de kodo|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gants de connétable en cuir de kodo|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Casque de connétable en cuir de kodo|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Garde-jambes de connétable en cuir de kodo|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Spallières de connétable en cuir de kodo|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique de connétable en peau de wyrm|13.219 Honneur, 30x Arathi|JcJ',
		'Hands3' => 'Gants de connétable en peau de wyrm|8.078 Honneur, 20x Alterac|JcJ',
		'Head3'  => 'Casque de connétable en peau de wyrm|12.852 Honneur, 30x Alterac|JcJ',
		'Legs3'  => 'Garde-jambes de connétable en peau de wyrm|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder3' => 'Spallières de connétable en peau de wyrm|8.078 Honneur, 20x Arathi|JcJ'
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Voleur'] = array(
		'Chest1' => 'Tunique de connétable en cuir|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gants de connétable en cuir|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Casque de connétable en cuir|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de connétable en cuir|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de connétable en cuir|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Mage'] = array(
		'Chest1' => 'Grande tenue de connétable en soie|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Garde-mains de connétable en soie|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Capuche de connétable en soie|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Chausses de connétable en soie|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Amict de connétable en soie|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Paladin'] = array(
		'Chest1' => 'Plastron lamellaire de connétable|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets lamellaires de connétable|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Heaume lamellaire de connétable|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes lamellaire de connétable|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Epaulières lamellaires de connétable|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Pansière de connétable ornementée|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gants de connétable ornementés|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Protège-front de connétable ornementé|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Jambières de connétable ornementées|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Spallières de connétable ornementées|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '-setname-',
		'Chest3' => 'Plastron de connétable en écailles|13.219 Honneur, 30x Arathi|JcJ',
		'Hands3' => 'Gantelets de connétable en écailles|8.078 Honneur, 20x Alterac|JcJ',
		'Head3'  => 'Casque de connétable en écailles|12.852 Honneur, 30x Alterac|JcJ',
		'Legs3'  => 'Garde-jambes de connétable en écailles|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder3' => 'Epaulières de connétable en écailles|8.078 Honneur, 20x Arathi|JcJ'
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Démoniste'] = array(
		'Chest1' => 'Robe de connétable en tisse-effroi|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gants de connétable en tisse-effroi|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Chaperon de connétable en tisse-effroi|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Jambières de connétable en tisse-effroi|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Mantelet de connétable en tisse-effroi|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Chasseur'] = array(
		'Chest1' => 'Cotte d\\\'anneaux de connétable|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets de connétable en anneaux|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Heaume de connétable en anneaux|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Jambières de connétable en anneaux|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de connétable en anneaux|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Chaman'] = array(
		'Chest1' => 'Cotte de mailles de connétable|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets de connétable en mailles|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Casque de connétable en mailles|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Jambières de connétable en mailles|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de connétable en mailles|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Armure de connétable rivetée|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gantelets de connétable rivetés|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Casque de connétable riveté|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Jambières de connétable rivetées|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Spallières de connétable rivetées|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '-setname-',
		'Chest3' => 'Corselet de connétable en mailles annelées|13.219 Honneur, 30x Arathi|JcJ',
		'Hands3' => 'Gants de connétable en mailles annelées|8.078 Honneur, 20x Alterac|JcJ',
		'Head3'  => 'Couvre-chef de connétable en mailles annelées|12.852 Honneur, 30x Alterac|JcJ',
		'Legs3'  => 'Garde-jambes de connétable en mailles annelées|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder3' => 'Epaulières de connétable en mailles annelées|8.078 Honneur, 20x Arathi|JcJ'
);


// PvP Level 70 Horde
$lang['ItemSets_Set']['PVP_Level70']['H']['Guerrier'] = array(
		'Chest1' => 'Plastron de grand seigneur de guerre en plaques|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets de grand seigneur de guerre en plaques|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Heaume de grand seigneur de guerre en plaques|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de grand seigneur de guerre en plaques|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Epaulières de grand seigneur de guerre en plaques|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Prêtre'] = array(
		'Chest1' => 'Habit de grand seigneur de guerre en étoffe lunaire|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Mitaines de grand seigneur de guerre en étoffe lunaire|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Capuche de grand seigneur de guerre en étoffe lunaire|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de grand seigneur de guerre en étoffe lunaire|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Protège-épaules de grand seigneur de guerre en étoffe lunaire|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Robe de grand seigneur de guerre en satin|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gants de grand seigneur de guerre en satin|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Chaperon de grand seigneur de guerre en satin|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Jambières de grand seigneur de guerre en satin|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Mantelet de grand seigneur de guerre en satin|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Druide'] = array(
		'Chest1' => 'Tunique de grand seigneur de guerre en peau de dragon|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gants de grand seigneur de guerre en peau de dragon|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Casque de grand seigneur de guerre en peau de dragon|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de grand seigneur de guerre en peau de dragon|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de grand seigneur de guerre en peau de dragon|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique de grand seigneur de guerre en cuir de kodo|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gants de grand seigneur de guerre en cuir de kodo|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Casque de grand seigneur de guerre en cuir de kodo|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Garde-jambes de grand seigneur de guerre en cuir de kodo|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Spallières de grand seigneur de guerre en cuir de kodo|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique de grand seigneur de guerre en peau de wyrm|13.219 Honneur, 30x Arathi|JcJ',
		'Hands3' => 'Gants de grand seigneur de guerre en peau de wyrm|8.078 Honneur, 20x Alterac|JcJ',
		'Head3'  => 'Casque de grand seigneur de guerre en peau de wyrm|12.852 Honneur, 30x Alterac|JcJ',
		'Legs3'  => 'Garde-jambes de grand seigneur de guerre en peau de wyrm|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder3' => 'Spallières de grand seigneur de guerre en peau de wyrm|8.078 Honneur, 20x Arathi|JcJ'
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Voleur'] = array(
		'Chest1' => 'Tunique de grand seigneur de guerre en cuir|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gants de grand seigneur de guerre en cuir|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Casque de grand seigneur de guerre en cuir|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes de grand seigneur de guerre|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de grand seigneur de guerre|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Mage'] = array(
		'Chest1' => 'Grande tenue de grand seigneur de guerre en soie|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Garde-mains de grand seigneur de guerre en soie|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Capuche de grand seigneur de guerre en soie|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Chausses de grand seigneur de guerre en soie|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Amict de grand seigneur de guerre en soie|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Paladin'] = array(
		'Chest1' => 'Plastron lamellaire de grand seigneur de guerre|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets lamellaires de grand seigneur de guerre|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Casque lamellaire de grand seigneur de guerre|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Garde-jambes lamellaires de grand seigneur de guerre|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Epaulières lamellaires de grand seigneur de guerre|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Pansière de grand seigneur de guerre ornementée|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gants de grand seigneur de guerre ornementés|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Protège-front de grand seigneur de guerre ornementé|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Jambières de grand seigneur de guerre ornementées|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Spallières de grand seigneur de guerre ornementée|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '-setname-',
		'Chest3' => 'Plastron de grand seigneur de guerre en écailles|13.219 Honneur, 30x Arathi|JcJ',
		'Hands3' => 'Gantelets de grand seigneur de guerre en écailles|8.078 Honneur, 20x Alterac|JcJ',
		'Head3'  => 'Casque de grand seigneur de guerre en écailles|12.852 Honneur, 30x Alterac|JcJ',
		'Legs3'  => 'Garde-jambes de grand seigneur de guerre en écailles|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder3' => 'Epaulières de grand seigneur de guerre en écailles|8.078 Honneur, 20x Arathi|JcJ'
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Démoniste'] = array(
		'Chest1' => 'Robe de grand seigneur de guerre en tisse-effroi|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gants de grand seigneur de guerre en tisse-effroi|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Chaperon de grand seigneur de guerre en tisse-effroi|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Jambières de grand seigneur de guerre en tisse-effroi|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Mantelet de grand seigneur de guerre en tisse-effroi|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Chasseur'] = array(
		'Chest1' => 'Cotte d\\\'anneaux de grand seigneur de guerre|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets de grand seigneur de guerre en anneaux|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Heaume de grand seigneur de guerre en anneaux|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Jambières de grand seigneur de guerre en anneaux|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de grand seigneur de guerre en anneaux|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Chaman'] = array(
		'Chest1' => 'Cotte de mailles de grand seigneur de guerre|13.219 Honneur, 30x Arathi|JcJ',
		'Hands1' => 'Gantelets de grand seigneur de guerre en mailles|8.078 Honneur, 20x Alterac|JcJ',
		'Head1'  => 'Casque de grand seigneur de guerre en mailles|12.852 Honneur, 30x Alterac|JcJ',
		'Legs1'  => 'Jambières de grand seigneur de guerre en mailles|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder1' => 'Spallières de grand seigneur de guerre en mailles|8.078 Honneur, 20x Arathi|JcJ',
		'Separator1' => '-setname-',
		'Chest2' => 'Armure rivetée de grand seigneur de guerre|13.219 Honneur, 30x Arathi|JcJ',
		'Hands2' => 'Gantelets rivetés de grand seigneur de guerre|8.078 Honneur, 20x Alterac|JcJ',
		'Head2'  => 'Heaume riveté de grand seigneur de guerre|12.852 Honneur, 30x Alterac|JcJ',
		'Legs2'  => 'Jambières rivetées de grand seigneur de guerre|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder2' => 'Spallières rivetées de grand seigneur de guerre|8.078 Honneur, 20x Arathi|JcJ',
		'Separator2' => '-setname-',
		'Chest3' => 'Corselet de grand seigneur de guerre en mailles annelées|13.219 Honneur, 30x Arathi|JcJ',
		'Hands3' => 'Gants de grand seigneur de guerre en mailles annelées|8.078 Honneur, 20x Alterac|JcJ',
		'Head3'  => 'Couvre-chef de grand seigneur de guerre en mailles annelées|12.852 Honneur, 30x Alterac|JcJ',
		'Legs3'  => 'Garde-jambes de grand seigneur de guerre en mailles annelées|12.852 Honneur, 30x Chanteguerres|JcJ',
		'Shoulder3' => 'Protège-épaules de grand seigneur de guerre en mailles annelées|8.078 Honneur, 20x Arathi|JcJ'
);


// Arena Season 1
$lang['ItemSets_Set']['Arena_1']['Guerrier'] = array(
		'Chest1' => 'Plastron de gladiateur en plaques|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gantelets de gladiateur en plaques|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Heaume de gladiateur en plaques|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Garde-jambes de gladiateur en plaques|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Epaulières de gladiateur en plaques|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Prêtre'] = array(
		'Chest1' => 'Robe de gladiateur en étoffe lunaire|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gants de gladiateur en étoffe lunaire|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Chaperon de gladiateur en étoffe lunaire|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Jambières de gladiateur en étoffe lunaire|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Mantelet de gladiateur en étoffe lunaire|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Robe de gladiateur en satin|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands2' => 'Gants de gladiateur en satin|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head2'  => 'Chaperon de gladiateur en satin|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs2'  => 'Jambières de gladiateur en satin|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder2' => 'Mantelet de gladiateur en satin|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Druide'] = array(
		'Chest1' => 'Tunique de gladiateur en peau de wyrm|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gants de gladiateur en peau de wyrm|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Heaume de gladiateur en peau de wyrm|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Garde-jambes de gladiateur en peau de wyrm|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en peau de wyrm|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique de gladiateur en peau de dragon|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands2' => 'Gants de gladiateur en peau de dragon|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head2'  => 'Casque de gladiateur en peau de dragon|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs2'  => 'Garde-jambes de gladiateur en peau de dragon|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder2' => 'Spallières de gladiateur en peau de dragon|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique de gladiateur en cuir de kodo|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands3' => 'Gants de gladiateur en cuir de kodo|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head3'  => 'Heaume de gladiateur en cuir de kodo|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs3'  => 'Garde-jambes de gladiateur en cuir de kodo|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder3' => 'Spallières de gladiateur en cuir de kodo|11.250 Honneur, 20x Arathi|Arène Saison 1'
);

$lang['ItemSets_Set']['Arena_1']['Voleur'] = array(
		'Chest1' => 'Tunique de gladiateur en cuir|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gants de gladiateur en cuir|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Casque de gladiateur en cuir|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Garde-jambes de gladiateur en cuir|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en cuir|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Mage'] = array(
		'Chest1' => 'Grande tenue de gladiateur en soie|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Garde-mains de gladiateur en soie|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Capuche de gladiateur en soie|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Chausses de gladiateur en soie|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Amict de gladiateur en soie|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Paladin'] = array(
		'Chest1' => 'Corselet ornementé de gladiateur|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gants ornementés de gladiateur|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Couvre-chef ornementé de gladiateur|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Cuissards ornementés de gladiateur|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Spallières ornementées de gladiateur|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Plastron lamellaire de gladiateur|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands2' => 'Gantelets lamellaires de gladiateur|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head2'  => 'Casque lamellaire de gladiateur|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs2'  => 'Garde-jambes lamellaires de gladiateur|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder2' => 'Epaulières lamellaires de gladiateur|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Plastron de gladiateur en écailles|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands3' => 'Gantelets de gladiateur en écailles|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head3'  => 'Heaume de gladiateur en écailles|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs3'  => 'Garde-jambes de gladiateur en écailles|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder3' => 'Epaulières de gladiateur en écailles|11.250 Honneur, 20x Arathi|Arène Saison 1'
);

$lang['ItemSets_Set']['Arena_1']['Démoniste'] = array(
		'Chest1' => 'Robe de gladiateur en tisse-effroi|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gants de gladiateur en tisse-effroi|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Chaperon de gladiateur en tisse-effroi|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Jambières de gladiateur en tisse-effroi|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Mantelet de gladiateur en tisse-effroi|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Grande tenue de gladiateur en tisse-gangrène|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands2' => 'Garde-mains de gladiateur en tisse-gangrène|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head2'  => 'Capuche de gladiateur en tisse-gangrène|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs2'  => 'Chausses de gladiateur en tisse-gangrène|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder2' => 'Amict de gladiateur en tisse-gangrène|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Chasseur'] = array(
		'Chest1' => 'Cotte d\\\'anneaux de gladiateur|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gantelets de gladiateur en anneaux|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Casque de gladiateur en anneaux|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Jambières de gladiateur en anneaux|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en anneaux|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Chaman'] = array(
		'Chest1' => 'Cotte de mailles de gladiateur|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands1' => 'Gantelets de gladiateur en mailles|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head1'  => 'Casque de gladiateur en mailles|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs1'  => 'Jambières de gladiateur en mailles|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en mailles|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Armure de gladiateur rivetée|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands2' => 'Gantelets de gladiateur rivetés|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head2'  => 'Casque de gladiateur riveté|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs2'  => 'Jambières de gladiateur rivetées|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder2' => 'Spallières de gladiateur rivetés|11.250 Honneur, 20x Arathi|Arène Saison 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Armure de gladiateur en mailles annelées|14.500 Honneur, 30x Arathi|Arène Saison 1',
		'Hands3' => 'Gantelets de gladiateur en mailles annelées|10.500 Honneur, 20x Alterac|Arène Saison 1',
		'Head3' => 'Heaume de gladiateur en mailles annelées|14.500 Honneur, 30x Alterac|Arène Saison 1',
		'Legs3'  => 'Jambières de gladiateur en mailles annelées|14.500 Honneur, 30x Goulet des Chanteguerres|Arène Saison 1',
		'Shoulder3' => 'Spallières de gladiateur en mailles annelées|11.250 Honneur, 20x Arathi|Arène Saison 1'
);


// Arena Season 2
$lang['ItemSets_Set']['Arena_2']['Guerrier'] = array(
		'Chest1' => 'Plastron du gladiateur impitoyable en plaques|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gantelets du gladiateur impitoyable en plaques|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en plaques|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Garde-jambes du gladiateur impitoyable en plaques|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Epaulières du gladiateur impitoyable en plaques|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Prêtre'] = array(
		'Chest1' => 'Robe du gladiateur impitoyable en étoffe lunaire|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en étoffe lunaire|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Chaperon du gladiateur impitoyable en étoffe lunaire|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable en étoffe lunaire|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Mantelet du gladiateur impitoyable en étoffe lunaire|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Robe du gladiateur impitoyable en satin|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands2' => 'Gants du gladiateur impitoyable en satin|978 Points d\\\'Arène|Arène Saison 2',
		'Head2'  => 'Chaperon du gladiateur impitoyable en satin|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs2'  => 'Jambières du gladiateur impitoyable en satin|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder2' => 'Mantelet du gladiateur impitoyable en satin|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Druide'] = array(
		'Chest1' => 'Tunique du gladiateur impitoyable en peau de wyrm|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en peau de wyrm|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en peau de wyrm|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Garde-jambes du gladiateur impitoyable en peau de wyrm|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable en peau de wyrm|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique du gladiateur impitoyable en peau de dragon|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands2' => 'Gants du gladiateur impitoyable en peau de dragon|978 Points d\\\'Arène|Arène Saison 2',
		'Head2'  => 'Heaume du gladiateur impitoyable en peau de dragon|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs2'  => 'Garde-jambes du gladiateur impitoyable en peau de dragon|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder2' => 'Spallières du gladiateur impitoyable en peau de dragon|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique du gladiateur impitoyable en cuir de kodo|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands3' => 'Gants du gladiateur impitoyable en cuir de kodo|978 Points d\\\'Arène|Arène Saison 2',
		'Head3'  => 'Heaume du gladiateur impitoyable en cuir de kodo|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs3'  => 'Garde-jambes du gladiateur impitoyable en cuir de kodo|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder3' => 'Spallières du gladiateur impitoyable en cuir de kodo|1.304 Points d\\\'Arène|Arène Saison 2'
);

$lang['ItemSets_Set']['Arena_2']['Voleur'] = array(
		'Chest1' => 'Tunique du gladiateur impitoyable en cuir|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en cuir|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en cuir|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Garde-jambes du gladiateur impitoyable en cuir|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable en cuir|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Mage'] = array(
		'Chest1' => 'Grande tenue du gladiateur impitoyable en soie|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Garde-mains du gladiateur impitoyable en soie|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Capuche du gladiateur impitoyable en soie|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Chausses du gladiateur impitoyable en soie|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Amict du gladiateur impitoyable en soie|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Paladin'] = array(
		'Chest1' => 'Corselet ornementé du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gants ornementés du gladiateur impitoyable|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Couvre-chef ornementé du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Cuissards ornementé du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Spallières ornementé du gladiateur impitoyable|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Plastron lamellaire du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands2' => 'Gantelets lamellaires du gladiateur impitoyable|978 Points d\\\'Arène|Arène Saison 2',
		'Head2'  => 'Heaume lamellaire du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs2'  => 'Garde-jambes lamellaire du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder2' => 'Epaulières lamellaire du gladiateur impitoyable|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Plastron du gladiateur impitoyable en écailles|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands3' => 'Gantelets du gladiateur impitoyable en écailles|978 Points d\\\'Arène|Arène Saison 2',
		'Head3'  => 'Heaume du gladiateur impitoyable en écailles|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs3'  => 'Garde-jambes du gladiateur impitoyable en écailles|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder3' => 'Epaulières du gladiateur impitoyable en écailles|1.304 Points d\\\'Arène|Arène Saison 2'
);

$lang['ItemSets_Set']['Arena_2']['Démoniste'] = array(
		'Chest1' => 'Robe du gladiateur impitoyable en tisse-effroi|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en tisse-effroi|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Chaperon du gladiateur impitoyable en tisse-effroi|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable en tisse-effroi|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Mantelet du gladiateur impitoyable en tisse-effroi|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Grande tenue du gladiateur impitoyable en tisse-gangrène|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands2' => 'Garde-mains du gladiateur impitoyable en tisse-gangrène|978 Points d\\\'Arène|Arène Saison 2',
		'Head2'  => 'Capuche du gladiateur impitoyable en tisse-gangrène|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs2'  => 'Chausses du gladiateur impitoyable en tisse-gangrène|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder2' => 'Amict du gladiateur impitoyable en tisse-gangrène|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Chasseur'] = array(
		'Chest1' => 'Cotte d\\\'anneaux du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gantelets du gladiateur impitoyable|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Chaman'] = array(
		'Chest1' => 'Cotte de mailles du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands1' => 'Gantelets du gladiateur impitoyable en mailles|978 Points d\\\'Arène|Arène Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en mailles|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable en mailles|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable en mailles|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Armure rivetée du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands2' => 'Gantelets rivetés du gladiateur impitoyable|978 Points d\\\'Arène|Arène Saison 2',
		'Head2'  => 'Heaume riveté du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs2'  => 'Jambières rivetées du gladiateur impitoyable|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder2' => 'Spallières rivetées du gladiateur impitoyable|1.304 Points d\\\'Arène|Arène Saison 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Armure du gladiateur impitoyable en mailles annelées|1.630 Points d\\\'Arène|Arène Saison 2',
		'Hands3' => 'Gantelets du gladiateur impitoyable en mailles annelées|978 Points d\\\'Arène|Arène Saison 2',
		'Head3' => 'Heaume du gladiateur impitoyable en mailles annelées|1.630 Points d\\\'Arène|Arène Saison 2',
		'Legs3'  => 'Jambières du gladiateur impitoyable en mailles annelées|1.630 Points d\\\'Arène|Arène Saison 2',
		'Shoulder3' => 'Spallières du gladiateur impitoyable en mailles annelées|1.304 Points d\\\'Arène|Arène Saison 2'
);


/// Arène Saison 3
$lang['ItemSets_Set']['Arena_3']['Guerrier'] = array(
		'Chest1' => 'Plastron du gladiateur vengeur en plaques|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gantelets du gladiateur vengeur en plaques|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Heaume du gladiateur vengeur en plaques|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Garde-jambes du gladiateur vengeur en plaques|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Epaulières du gladiateur vengeur en plaques|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Prêtre'] = array(
		'Chest1' => 'Robe du gladiateur vengeur en étoffe lunaire|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gants du gladiateur vengeur en étoffe lunaire|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Chaperon du gladiateur vengeur en étoffe lunaire|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Jambières du gladiateur vengeur en étoffe lunaire|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Mantelet du gladiateur vengeur en étoffe lunaire|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Robe du gladiateur vengeur en satin|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands2' => 'Gants du gladiateur vengeur en satin|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head2'  => 'Chaperon du gladiateur vengeur en satin|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs2'  => 'Jambières du gladiateur vengeur en satin|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder2' => 'Mantelet du gladiateur vengeur en satin|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Druide'] = array(
		'Chest1' => 'Tunique du gladiateur vengeur en peau de wyrm|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gants du gladiateur vengeur en peau de wyrm|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Heaume du gladiateur vengeur en peau de wyrm|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Garde-jambes du gladiateur vengeur en peau de wyrm|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Spallières du gladiateur vengeur en peau de wyrm|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique du gladiateur vengeur en peau de dragon|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands2' => 'Gants du gladiateur vengeur en peau de dragon|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head2'  => 'Heaume du gladiateur vengeur en peau de dragon|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs2'  => 'Garde-jambes du gladiateur vengeur en peau de dragon|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder2' => 'Spallières du gladiateur vengeur en peau de dragon|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique du gladiateur vengeur en cuir de kodo|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands3' => 'Gants du gladiateur vengeur en cuir de kodo|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head3'  => 'Casque du gladiateur vengeur en cuir de kodo|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs3'  => 'Garde-jambes du gladiateur vengeur en cuir de kodo|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder3' => 'Spallières du gladiateur vengeur en cuir de kodo|1.500 Points d\\\'Arène|Arène Saison 3'
);

$lang['ItemSets_Set']['Arena_3']['Voleur'] = array(
		'Chest1' => 'Tunique du gladiateur vengeur en cuir|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gants du gladiateur vengeur en cuir|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Heaume du gladiateur vengeur en cuir|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Garde-jambes du gladiateur vengeur en cuir|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Spallières du gladiateur vengeur en cuir|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Mage'] = array(
		'Chest1' => 'Grande tenue du gladiateur vengeur en soie|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Garde-mains du gladiateur vengeur en soie|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Capuche du gladiateur vengeur en soie|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Chausses du gladiateur vengeur en soie|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Amict du gladiateur vengeur en soie|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Paladin'] = array(
		'Chest1' => 'Corselet ornementé du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gants ornementés du gladiateur vengeur|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Couvre-chef ornementé du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Cuissards ornementés du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Spallières ornementées du gladiateur vengeur|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Plastron lamellaire du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands2' => 'Gantelets lamellaires du gladiateur vengeur|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head2'  => 'Heaume lamellaire du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs2'  => 'Garde-jambes lamellaires du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder2' => 'Epaulières lamellaires du gladiateur vengeur|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Plastron du gladiateur vengeur en écailles|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands3' => 'Gantelets du gladiateur vengeur en écailles|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head3'  => 'Heaume du gladiateur vengeur en écailles|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs3'  => 'Garde-jambes du gladiateur vengeur en écailles|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder3' => 'Epaulières du gladiateur vengeur en écailles|1.500 Points d\\\'Arène|Arène Saison 3'
);

$lang['ItemSets_Set']['Arena_3']['Démoniste'] = array(
		'Chest1' => 'Robe du gladiateur vengeur en tisse-effroi|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gants du gladiateur vengeur en tisse-effroi|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Chaperon du gladiateur vengeur en tisse-effroi|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Jambières du gladiateur vengeur en tisse-effroi|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Mantelet du gladiateur vengeur en tisse-effroi|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Grande tenue du gladiateur vengeur en tisse-gangrène|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands2' => 'Garde-mains du gladiateur vengeur en tisse-gangrène|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head2'  => 'Capuche du gladiateur vengeur en tisse-gangrène|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs2'  => 'Chausses du gladiateur vengeur en tisse-gangrène|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder2' => 'Amict du gladiateur vengeur en tisse-gangrène|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Chasseur'] = array(
		'Chest1' => 'Cotte d\\\'anneaux du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gantelets du gladiateur vengeur|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Heaume du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Jambières du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Spallières du gladiateur vengeur|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '',
		'Chest2' => '',
		'Hands2' => '',
		'Head2'  => '',
		'Legs2'  => '',
		'Shoulder2' => '',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Chaman'] = array(
		'Chest1' => 'Cotte de mailles du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands1' => 'Gantelets du gladiateur vengeur en mailles|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head1'  => 'Casque du gladiateur vengeur en mailles|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs1'  => 'Jambières du gladiateur vengeur en mailles|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder1' => 'Spallières du gladiateur vengeur en mailles|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Armure rivetée du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands2' => 'Gantelets rivetés du gladiateur vengeur|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head2'  => 'Heaume riveté du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs2'  => 'Jambières rivetées du gladiateur vengeur|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder2' => 'Spallières rivetées du gladiateur vengeur|1.500 Points d\\\'Arène|Arène Saison 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Armure du gladiateur vengeur en mailles annelées|1.875 Points d\\\'Arène|Arène Saison 3',
		'Hands3' => 'Gantelets du gladiateur vengeur en mailles annelées|1.125 Points d\\\'Arène|Arène Saison 3',
		'Head3'  => 'Heaume du gladiateur vengeur en mailles annelées|1.875 Points d\\\'Arène|Arène Saison 3',
		'Legs3'  => 'Jambières du gladiateur vengeur en mailles annelées|1.875 Points d\\\'Arène|Arène Saison 3',
		'Shoulder3' => 'Spallières du gladiateur vengeur en mailles annelées|1.500 Points d\\\'Arène|Arène Saison 3'
);

?>
