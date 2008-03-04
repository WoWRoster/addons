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
 * @copyright  2004-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.8.1
 * @svn        SVN: $Id$
 * @author     Gorgar, PoloDude, Zeryl, Foxbad
 * @link       http://www.wowroster.net/Forums/viewforum/f=35.html
 *
*/

$lang['DropsFrom'] = 'Drops from';
$lang['DropsIn'] = 'in';

//Menu localization
$lang['ItemSets'] = 'Ensembles d\'armure';
$lang['ItemSets_Desc'] = 'Affiche une liste des membres de niveau 50 ou plus et une liste des pièces d\'ensembles d\'armure qu\'ils possèdent déjà.';
$lang['All_Classes'] = 'All Classes';

// Admin localization
$lang['admin']['itemsets_conf'] = 'Ensembles d\'armure|Affiche une liste des membres de niveau 50 ou plus et une liste des pièces d\'ensembles d\'armure qu\'ils possèdent déjà.';
$lang['admin']['defaultset'] = 'Ensemble d\'armure par défaut|Choisissez l\'ensemble d\'armure qui apparaîtra par défaut lors de l\'ouverture de la page des ensembles d\'armure.';
$lang['admin']['itemsets_lvl'] = 'Minimum Level|Displays Characters with at least this level';


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
$lang['ZG'] = 'Zul\'Gurub';
$lang['AQ20'] = 'Ruines D\'Ahn\'Qiraj';
$lang['AQ40'] = 'Temple D\'Ahn\'Qiraj';
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
$lang['Should.'] = 'Epaules';
$lang['Shoulder'] = 'Epaules';
$lang['Neck'] = 'Cou';
$lang['Trinket'] = 'Bijoux';
$lang['Mainhand'] = 'Main Droite';
$lang['Finger'] = 'Doigt';
$lang['Back'] = 'Dos';
$lang['Bag'] = 'Sac';

// multiple sets

$lang['Name1'] = 'Nom';
$lang['Waist1'] = 'Taille';
$lang['Feet1'] = 'Pieds';
$lang['Wrists1'] = 'Poignets';
$lang['Chest1'] = 'Torse';
$lang['Hands1'] = 'Mains';
$lang['Head1'] = 'Tête';
$lang['Legs1'] = 'Jambes';
$lang['Should.1'] = 'Epaules';
$lang['Finger1'] = 'Doigt';
$lang['Neck1'] = 'Cou';
$lang['Trinket1'] = 'Bijoux';
$lang['Mainhand1'] = 'Main Droite';

$lang['Separator1'] = ' ';

$lang['Name2'] = 'Nom';
$lang['Waist2'] = 'Taille';
$lang['Feet2'] = 'Pieds';
$lang['Wrists2'] = 'Poignets';
$lang['Chest2'] = 'Torse';
$lang['Hands2'] = 'Mains';
$lang['Head2'] = 'Tête';
$lang['Legs2'] = 'Jambes';
$lang['Should.2'] = 'Epaules';
$lang['Finger2'] = 'Doigt';
$lang['Neck2'] = 'Cou';
$lang['Trinket2'] = 'Bijoux';
$lang['Mainhand2'] = 'Main Droite';

$lang['Separator2'] = ' ';

$lang['Name3'] = 'Nom';
$lang['Waist3'] = 'Taille';
$lang['Feet3'] = 'Pieds';
$lang['Wrists3'] = 'Poignets';
$lang['Chest3'] = 'Torse';
$lang['Hands3'] = 'Mains';
$lang['Head3'] = 'Tête';
$lang['Legs3'] = 'Jambes';
$lang['Should.3'] = 'Epaules';
$lang['Finger3'] = 'Doigt';
$lang['Neck3'] = 'Cou';
$lang['Trinket3'] = 'Bijoux';
$lang['Mainhand3'] = 'Main Droite';


//N   N  AA  M   M EEEE
//NN  N A  A MM MM E
//N N N AAAA M M M EE
//N  NN A  A M   M E
//N   N A  A M   M EEEE

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

$lang['ItemSets_Set']['Arena_1']['Name'] = array(
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

$lang['ItemSets_Set']['Arena_2']['Name'] = array(
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

//Alternate names by Ansgar
$SetAlternateName= array(
		'Brassards de Gangrecoeur' => 'Bracelets de Gangrecoeur',
		'Ceinture d\\\'assassin' => 'Ceinture du tueur de la nuit',
		'Plastron d\\\'assassin' =>	'Plastron du tueur de la nuit',
		'Gants d\\\'assassin' => 'Gants du tueur de la nuit',
		'Bottes d\\\'assassin' => 'Bottes du tueur de la nuit',
		'Bracelets d\\\'assassin' => 'Bracelets du tueur de la nuit',
		'Couvre-chef d\\\'assassin' => 'Couvre-chef du tueur de la nuit',
		'Pantalon d\\\'assassin' => 'Pantalon du tueur de la nuit',
		'ProtÃ¨ge-Ã©paules d\\\'assassin' => 'ProtÃ¨ge-Ã©paules du tueur de la nuit',
		'Manteau de magistÃ¨re' => 'Mantelet de magistÃ¨re'

);


// TTTTT I EEEEE RRRR   000
//   T   I E     R   R 0   0
//   T   I EE    RRRR  0   0
//   T   I E     R R   0   0
//   T   I EEEEE R  R   000

$lang['ItemSets_Set']['Dungeon_1']['Guerrier'] = array(
		'Waist' => 'Ceinture de vaillance|Généralissime Omokk|Hall de Blackhand',
		'Feet' => 'Bottes de vaillance| Kirtonos le Héraut|Scholomance',
		'Wrist' => 'Brassards de vaillance|Drop Aléatoire|Blackrock Spire',
		'Chest' => 'Cuirasse de vaillance|Général Drakkisath|Hall de Blackhand',
		'Hands' => 'Gantelets de vaillance|Ramstein Grandgosier|Stratholme',
		'Head' => 'Casque de vaillance|Sombre Maître Gandling|Scholomance',
		'Legs' => 'Jambières de vaillance|Baron Rivendare|Stratholme',
		'Shoulder' => 'Spallières de vaillance|Chef de guerre Rend Blackhand|Hall de Blackhand'
	);
$lang['ItemSets_Set']['Dungeon_1']['Prêtre'] = array(
		'Waist' => 'Ceinture de dévot|Drop Aléatoire|Blackrock Spire',
		'Feet' => 'Sandales de dévot|Maleki the Pallid|Stratholme East',
		'Wrist' => 'Brassards de dévot|Drop Aléatoire|Stratholme',
		'Chest' => 'Robe de dévot|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gants de dévot|Archivist Galford|Stratholme West',
		'Head' => 'Collerette de dévot|Darkmaster Gandling|Scholomance',
		'Legs' => 'Robe de dévot|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Mantelet de dévot|Solakar Flamewreath|Upper Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Druide'] = array(
		'Waist' => 'Ceinture du Coeur-Sauvage|Drop Aléatoire|Scholomance',
		'Feet' => 'Bottes du Coeur-Sauvage|Mother Smolderweb|Lower Blackrock Spire',
		'Wrist' => 'Brassards du Coeur-Sauvage|Drop Aléaoire|Stratholme',
		'Chest' => 'Gilet du Coeur-Sauvage|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gants du Coeur-Sauvage|Drop Aléatoire|Blackrock Spire',
		'Head' => 'Coiffe du Coeur-Sauvage|Darkmaster Gandling|Scholomance',
		'Legs' => 'Kilt du Coeur-Sauvage|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Spallières du Coeur-Sauvage|Gizrul the Slavener|Lower Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Voleur'] = array(
		'Waist' => 'Ceinture Sombreruse|Drop Aléatoire|Blackrock Spire',
		'Feet' => 'Bottes Sombreruse|Rattlegore|Scholomance',
		'Wrist' => 'Brassards Sombreruse|Drop Aléatoire|Scholomance',
		'Chest' => 'Tunique Sombreruse|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gants Sombreruse|Shadow Chasseur Vosh\\\'gajin|Lower Blackrock Spire',
		'Head' => 'Cagoule Sombreruse|Darkmaster Gandling|Scholomance',
		'Legs' => 'Pantalon Sombreruse|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Spallières Sombreruse|Cannon Master Willey|Stratholme West'
	);
$lang['ItemSets_Set']['Dungeon_1']['Mage'] = array(
		'Waist' => 'Ceinture de magistère|Drop Aléatoire|Stratholme',
		'Feet' => 'Bottes de magistère|Postmaster Malown|Stratholme West',
		'Wrist' => 'Manchettes de magistère|Drop Aléatoire|Blackrock Spire',
		'Chest' => 'Robe de magistère|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gants de magistère|Drop Aléatoire|Scholomance',
		'Head' => 'Collerette de magistère|Darkmaster Gandling|Scholomance',
		'Legs' => 'Jambières de magistère|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Mantelet de magistère|Ras Frostwhisper|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Paladin'] = array(
		'Waist' => 'Ceinture de sancteforge|Drop Aléatoire|Stratholme',
		'Feet' => 'Bottes de sancteforge|Balnazzar|Stratholme West',
		'Wrist' => 'Brassards de Sancteforge|Drop Aléatoire|Scholomance',
		'Chest' => 'Cuirasse de sancteforge|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gantelets de sancteforge|Emperor Dagran Thaurissan|Blackrock Depths',
		'Head' => 'Casque de sancteforge|Darkmaster Gandling|Scholomance',
		'Legs' => 'Cuissards de sancteforge|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Spallières de sancteforge|The Beast|Upper Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Démoniste'] = array(
		'Waist' => 'Ceinture de Brume-funeste|Drop Aléatoire|Stratholme',
		'Feet' => 'Sandales de Brume-funeste|Baroness Anastari|Stratholme East',
		'Wrist' => 'Brassards de Brume-funeste|Drop Aléatoire|Blackrock Spire',
		'Chest' => 'Robe de Brume-funeste|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Protège-mains de Brume-funeste|Drop Aléatoire|Scholomance',
		'Head' => 'Masque de Brume-funeste|Darkmaster Gandling|Scholomance',
		'Legs' => 'Jambières de Brume-funeste|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Mantelet de Brume-funeste|Jandice Barov|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Chasseur'] = array(
		'Waist' => 'Ceinture de bestiaire|Drop Aléatoire|Blackrock Spire',
		'Feet' => 'Bottes de bestiaire|Nerub\\\'enkan|Stratholme Live',
		'Wrist' => 'Manchettes de bestiaire|Drop Aléatoire|Stratholme',
		'Chest' => 'Tunique de bestiaire|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gants de bestiaire|War Master Voone|Lower Blackrock Spire',
		'Head' => 'Coiffe de bestiaire|Darkmaster Gandling|Scholomance',
		'Legs' => 'Pantalon de bestiaire|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Mantelet de bestiaire|Overlord Wyrmthalak|Lower Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Chaman'] = array(
		'Waist' => 'Corde des éléments|Drop Aléatoire|Blackrock Spire',
		'Feet' => 'Bottes des éléments|Urok Doomhowl|Lower Blackrock Spire',
		'Wrist' => 'Manchettes des éléments|Drop Aléatoire|Stratholme',
		'Chest' => 'Haubergeon des éléments|Général Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gantelets des éléments|Pyroguard Emberseer|Upper Blackrock Spire',
		'Head' => 'Coiffe des éléments|Darkmaster Gandling|Scholomance',
		'Legs' => 'Kilt des éléments|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Espauliers des éléments|Gyth|Upper Blackrock Spire'
	);

// TTTTT I EEEEE RRRR    000      55555
//   T   I E     R   R  0   0     5
//   T   I EE    RRRR   0   0      5555
//   T   I E     R R    0   0          5
//   T   I EEEEE R  R    000   0   5555

$lang['ItemSets_Set']['Dungeon_2']['Druide'] = array(
		'Waist' => 'Ceinture Coeur-Farouche|Quête|Somewhere',
		'Feet'  => 'Bottes Coeur-Farouche|Quête|Somewhere',
		'Wrist' => 'Brassards Coeur-Farouche|Quête|Somewhere',
		'Chest' => 'Gilet Coeur-Farouche|Quête|Somewhere',
		'Hands' => 'Gants Coeur-Farouche|Quête|Somewhere',
		'Head'  => 'Capuche Coeur-Farouche|Quête|Somewhere',
		'Legs'  => 'Kilt Coeur-Farouche|Quête|Somewhere',
		'Shoulder' => 'Spallières Coeur-Farouche|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Chasseur'] = array(
		'Waist' => 'Ceinture de belluaire|Quête|Somewhere',
		'Feet'  => 'Bottes de belluaire|Quête|Somewhere',
		'Wrist' => 'Manchettes de belluaire|Quête|Somewhere',
		'Chest' => 'Tunique de belluaire|Quête|Somewhere',
		'Hands' => 'Gants de belluaire|Quête|Somewhere',
		'Head'  => 'Coiffe de belluaire|Quête|Somewhere',
		'Legs'  => 'Pantalon de belluaire|Quête|Somewhere',
		'Shoulder' => 'Mantelet de belluaire|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Mage'] = array(
		'Waist' => 'Ceinture du sorcier|Quête|Somewhere',
		'Feet'  => 'Bottes du sorcier|Quête|Somewhere',
		'Wrist' => 'Manchettes du sorcier|Quête|Somewhere',
		'Chest' => 'Robe du sorcier|Quête|Somewhere',
		'Hands' => 'Gants du sorcier|Quête|Somewhere',
		'Head'  => 'Couronne du sorcier|Quête|Somewhere',
		'Legs'  => 'Jambières du sorcier|Quête|Somewhere',
		'Shoulder' => 'Mantelet du sorcier|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Paladin'] = array(
		'Waist' => 'Ceinture d\\\'Âmeforge|Quête|Somewhere',
		'Feet'  => 'Bottes d\\\'Âmeforge|Quête|Somewhere',
		'Wrist' => 'Brassards d\\\'Âmeforge|Quête|Somewhere',
		'Chest' => 'Cuirasse d\\\'Âmeforge|Quête|Somewhere',
		'Hands' => 'Gantelets d\\\'Âmeforge|Quête|Somewhere',
		'Head'  => 'Casque d\\\'Âmeforge|Quête|Somewhere',
		'Legs'  => 'Cuissards d\\\'Âmeforge|Quête|Somewhere',
		'Shoulder' => 'Spallières d\\\'Âmeforge|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Prêtre'] = array(
		'Waist' => 'Ceinture vertueuse|Quête|Somewhere',
		'Feet'  => 'Sandales vertueuses|Quête|Somewhere',
		'Wrist' => 'Brassards vertueux|Quête|Somewhere',
		'Chest' => 'Robe vertueuse|Quête|Somewhere',
		'Hands' => 'Gants vertueux|Quête|Somewhere',
		'Head'  => 'Couronne vertueuse|Quête|Somewhere',
		'Legs'  => 'Jupe vertueuse|Quête|Somewhere',
		'Shoulder' => 'Mantelet vertueux|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Voleur'] = array(
		'Waist' => 'Ceinture Sombremante|Quête|Somewhere',
		'Feet'  => 'Bottes Sombremante|Quête|Somewhere',
		'Wrist' => 'Brassards Sombremante|Quête|Somewhere',
		'Chest' => 'Tunique Sombremante|Quête|Somewhere',
		'Hands' => 'Gants Sombremante|Quête|Somewhere',
		'Head'  => 'Coiffe Sombremante|Quête|Somewhere',
		'Legs'  => 'Pantalon Sombremante|Quête|Somewhere',
		'Shoulder' => 'Spallières Sombremante|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Chaman'] = array(
		'Waist' => 'Corde des Cinq tonnerres|Quête|Somewhere',
		'Feet'  => 'Bottes des Cinq tonnerres|Quête|Somewhere',
		'Wrist' => 'Manchettes des Cinq tonnerres|Quête|Somewhere',
		'Chest' => 'Gilet des Cinq tonnerres|Quête|Somewhere',
		'Hands' => 'Gantelets des Cinq tonnerres|Quête|Somewhere',
		'Head'  => 'Coiffe des Cinq tonnerres|Quête|Somewhere',
		'Legs'  => 'Kilt des Cinq tonnerres|Quête|Somewhere',
		'Shoulder' => 'Espauliers des Cinq tonnerres|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Démoniste'] = array(
		'Waist' => 'Ceinture Mortebrume|Quête|Somewhere',
		'Feet'  => 'Sandales Mortebrume|Quête|Somewhere',
		'Wrist' => 'Brassards Mortebrume|Quête|Somewhere',
		'Chest' => 'Robe Mortebrume|Quête|Somewhere',
		'Hands' => 'Gants Mortebrume|Quête|Somewhere',
		'Head'  => 'Masque Mortebrume|Quête|Somewhere',
		'Legs'  => 'Jambières Mortebrume|Quête|Somewhere',
		'Shoulder' => 'Mantelet Mortebrume|Quête|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Guerrier'] = array(
		'Waist' => 'Ceinture d\\\'héroïsme|Quête|Somewhere',
		'Feet'  => 'Bottes d\\\'héroïsme|Quête|Somewhere',
		'Wrist' => 'Brassards d\\\'héroïsme|Quête|Somewhere',
		'Chest' => 'Cuirasse d\\\'héroïsme|Quête|Somewhere',
		'Hands' => 'Gantelets d\\\'héroïsme|Quête|Somewhere',
		'Head'  => 'Casque d\\\'héroïsme|Quête|Somewhere',
		'Legs'  => 'Cuissards d\\\'héroïsme|Quête|Somewhere',
		'Shoulder' => 'Spallières d\\\'héroïsme|Quête|Somewhere'
);


// TTTTT I EEEEE RRRR    11
//   T   I E     R   R  1 1
//   T   I EE    RRRR  1  1
//   T   I E     R R      1
//   T   I EEEEE R  R     1

$lang['ItemSets_Set']['Tier_1']['Guerrier'] = array(
		'Waist' => 'Ceinture de puissance|Drop Aléatoire|Molten Core',
		'Feet' => 'Solerets de puissance|Gehennas|Molten Core',
		'Wrist' => 'Brassards de puissance|Drop Aléatoire|Molten Core',
		'Chest' => 'Cuirasse de puissance|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gantelets de puissance|Lucifron|Molten Core',
		'Head' => 'Casque de puissance|Garr|Molten Core',
		'Legs' => 'Cuissards de puissance|Magmadar|Molten Core',
		'Shoulder' => 'Espauliers de puissance|Messager de Sulfuron|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Prêtre'] = array(
		'Waist' => 'Ceinturon de prophétie|Drop Aléatoire|Molten Core',
		'Feet' => 'Bottes de prophétie|Shazzrah|Molten Core',
		'Wrist' => 'Protège-bras de prophétie|Drop Aléatoire|Molten Core',
		'Chest' => 'Robe de prophétie|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gants de prophétie|Gehennas|Molten Core',
		'Head' => 'Collerette de prophétie|Garr|Molten Core',
		'Legs' => 'Pantalon de prophétie|Magmadar|Molten Core',
		'Shoulder' => 'Mantelet de prophétie|Messager de Sulfuron|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Druide'] = array(
		'Waist' => 'Ceinture cénarienne|Drop Aléatoire|Molten Core',
		'Feet' => 'Bottes cénariennes|Lucifron|Molten Core',
		'Wrist' => 'Brassards cénariens|Drop Aléatoire|Molten Core',
		'Chest' => 'Habit cénarien|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gants cénariens|Shazzrah|Molten Core',
		'Head' => 'Casque cénarien|Garr|Molten Core',
		'Legs' => 'Jambières cénariennes|Magmadar|Molten Core',
		'Shoulder' => 'Spallières cénariennes|Baron Geddon|Molten Core'
	);

$lang['ItemSets_Set']['Tier_1']['Voleur'] = array(
		'Waist' => 'Ceinture du tueur de la nuit|Drop Aléatoire|Molten Core',
		'Feet' => 'Bottes du tueur de la nuit|Shazzrah|Molten Core',
		'Wrist' => 'Bracelets du tueur de la nuit|Drop Aléatoire|Molten Core',
		'Chest' => 'Plastron du tueur de la nuit|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gants du tueur de la nuit|Gehennas|Molten Core',
		'Head' => 'Couvre-chef du tueur de la nuit|Garr|Molten Core',
		'Legs' => 'Pantalon du tueur de la nuit|Magmadar|Molten Core',
		'Shoulder' => 'Protège-épaules du tueur de la nuit|Messager de Sulfuron|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Mage'] = array(
		'Waist' => 'Ceinture d\\\'arcaniste|Drop Aléatoire|Molten Core',
		'Feet' => 'Bottes d\\\'arcaniste|Gehennas|Molten Core',
		'Wrist' => 'Manchettes d\\\'arcaniste|Drop Aléatoire|Molten Core',
		'Chest' => 'Robe d\\\'arcaniste|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gants d\\\'arcaniste|Shazzrah|Molten Core',
		'Head' => 'Couronne d\\\'arcaniste|Garr|Molten Core',
		'Legs' => 'Jambières d\\\'arcaniste|Magmadar|Molten Core',
		'Shoulder' => 'Mantelet d\\\'arcaniste|Baron Geddon|Molten Core'
	);

$lang['ItemSets_Set']['Tier_1']['Paladin'] = array(
		'Waist' => 'Ceinture judiciaire|Drop Aléatoire|Molten Core',
		'Feet' => 'Bottes judiciaires|Lucifron|Molten Core',
		'Wrist' => 'Brassards judiciaires|Drop Aléatoire|Molten Core',
		'Chest' => 'Corselet judiciaire|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gantelets judiciaires|Gehennas|Molten Core',
		'Head' => 'Heaume judiciaire|Garr|Molten Core',
		'Legs' => 'Cuissards judiciaires|Magmadar|Molten Core',
		'Shoulder' => 'Spallières judiciaires|Baron Geddon|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Démoniste'] = array(
		'Waist' => 'Ceinture de Gangrecoeur|Drop Aléatoire|Molten Core',
		'Feet' => 'Mules de Gangrecoeur|Gehennas|Molten Core',
		'Wrist' => 'Brassards de Gangrecoeur|Drop Aléatoire|Molten Core',
		'Chest' => 'Robe de Gangrecoeur|Golemagg der Verbrenner|Molten Core',
		'Hands' => 'Gants de Gangrecoeur|Lucifron|Molten Core',
		'Head' => 'Cornes de Gangrecoeur|Garr|Molten Core',
		'Legs' => 'Pantalon de Gangrecoeur|Magmadar|Molten Core',
		'Shoulder' => 'Protège-épaules de Gangrecoeur|Baron Geddon|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Chasseur'] = array(
		'Waist' => 'Ceinture de traqueur de géant|Drop Aléatoire|Molten Core',
		'Feet' => 'Bottes de traqueur de géant|Gehennas|Molten Core',
		'Wrist' => 'Brassards de traqueur de géant|Drop Aléatoire|Molten Core',
		'Chest' => 'Cuirasse de traqueur de géant|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gants de traqueur de géant|Shazzrah|Molten Core',
		'Head' => 'Casque de traqueur de géant|Garr|Molten Core',
		'Legs' => 'Jambières de traqueur de géant|Magmadar|Molten Core',
		'Shoulder' => 'Epaulettes de traqueur de géant|Messager de Sulfuron|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Chaman'] = array(
		'Waist' => 'Ceinture Rageterre|Drop Aléatoire|Molten Core',
		'Feet' => 'Bottes Rageterre|Lucifron|Molten Core',
		'Wrist' => 'Brassards Rageterre|Drop Aléatoire|Molten Core',
		'Chest' => 'Habit Rageterre|Golemagg l\\\'Incinérateur|Molten Core',
		'Hands' => 'Gantelets Rageterre|Gehennas|Molten Core',
		'Head' => 'Casque Rageterre|Garr|Molten Core',
		'Legs' => 'Jambières Rageterre|Magmadar|Molten Core',
		'Shoulder' => 'Epaulettes Rageterre|Baron Geddon|Molten Core'
	);

// TTTTT I EEEEE RRRR   222
//   T   I E     R   R     2
//   T   I EE    RRRR   222
//   T   I E     R R   2
//   T   I EEEEE R  R  22222

$lang['ItemSets_Set']['Tier_2']['Guerrier'] = array(
		'Waist' => 'Baudrier de courroux|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Solerets de courroux|Seigneur des couvées Lashslayer|Blackwing Lair',
		'Wrist' => 'Bracelets de courroux|Razorgore l\\\'Indompté|Blackwing Lair',
		'Chest' => 'Cuirasse de courroux|Nefarian|Blackwing Lair',
		'Hands' => 'Gantelets de courroux|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Heaume de courroux|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Cuissards de courroux|Ragnaros|Molten Core',
		'Shoulder' => 'Espauliers de courroux|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Prêtre'] = array(
		'Waist' => 'Ceinture de transcendance|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Bottes de transcendance|Seigneur des couvées Lashslayer|Blackwing Lair',
		'Wrist' => 'Manchettes de transcendance|Razorgore l\\\'Indompté|Blackwing Lair',
		'Chest' => 'Robe de transcendance|Nefarian|Blackwing Lair',
		'Hands' => 'Garde-mains de transcendance|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Auréole de transcendance|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Jambières de transcendance|Ragnaros|Molten Core',
		'Shoulder' => 'Espauliers de transcendance|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Druide'] = array(
		'Waist' => 'Ceinture de Hurlorage|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Bottes de Hurlorage|Seigneur des couvées Lashslayer|Blackwing Lair',
		'Wrist' => 'Brassards de Hurlorage|Razorgore l\\\'Indompté|lackwing Lair',
		'Chest' => 'Robe de Hurlorage|Nefarian|Blackwing Lair',
		'Hands' => 'Garde-mains de Hurlorage|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Couvre-chef de Hurlorage|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Garde-jambes de Hurlorage|Ragnaros|Molten Core',
		'Shoulder' => 'Espauliers de Hurlorage|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Voleur'] = array(
		'Waist' => 'Ceinture Rougecroc|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Bottes Rougecroc|Seigneur des couvées Lashslayer|Blackwing Lair',
		'Wrist' => 'Brassards Rougecroc|Razorgore l\\\'Indompt?lackwing Lair',
		'Chest' => 'Plastron Rougecroc|Nefarian|Blackwing Lair',
		'Hands' => 'Gants Rougecroc|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Cagoule Rougecroc|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Pantalon Rougecroc|Ragnaros|Molten Core',
		'Shoulder' => 'Spallières Rougecroc|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Mage'] = array(
		'Waist' => 'Ceinture de Vent du néant|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Bottes de Vent du néant|Seigneur des couvées Lashslayerr|Blackwing Lair',
		'Wrist' => 'Manchettes de Vent du néant|Razorgore l\\\'Indompt?lackwing Lair',
		'Chest' => 'Robe de Vent du néant|Nefarian|Blackwing Lair',
		'Hands' => 'Gants de Vent du néant|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Couronne de Vent du néant|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Pantalon de Vent du néant|Ragnaros|Molten Core',
		'Shoulder' => 'Mantelet de Vent du néant|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Paladin'] = array(
		'Waist' => 'Ceinture du jugement|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Solerets du jugement|Seigneur des couvées Lashslayer|Blackwing Lair',
		'Wrist' => 'Manchettes du jugement|Razorgore l\\\'Indompté|Blackwing Lair',
		'Chest' => 'Cuirasse du jugement|Nefarian|Blackwing Lair',
		'Hands' => 'Gantelets du jugement|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Couronne du jugement|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Cuissards du jugement|Ragnaros|Molten Core',
		'Shoulder' => 'Spallières du jugement|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Démoniste'] = array(
		'Waist' => 'Ceinture de Némésis|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Bottes de Némésis|Seigneur des couvées Lashslayer|Blackwing Lair',
		'Wrist' => 'Brassards de Némésis|Razorgore l\\\'Indompté|Blackwing Lair',
		'Chest' => 'Robe de Némésis|Nefarian|Blackwing Lair',
		'Hands' => 'Gants de Némésis|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Crâne de Némésis|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Jambières de Némésis|Ragnaros|Molten Core',
		'Shoulder' => 'Spallières de Némésis|Chromaggus|Blackwing Lair'
	);

$lang['ItemSets_Set']['Tier_2']['Chasseur'] = array(
		'Waist' => 'Ceinture de traqueur de dragon|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Grèves de traqueur de dragon|Seigneur des couvées Lashslayerr|Blackwing Lair',
		'Wrist' => 'Brassards de traqueur de dragon|Razorgore l\\\'Indompté|Blackwing Lair',
		'Chest' => 'Cuirasse de traqueur de dragon|Nefarian|Blackwing Lair',
		'Hands' => 'Gantelets de traqueur de dragon|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Casque de traqueur de dragon|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Garde-jambes de traqueur de dragon|Ragnaros|Molten Core',
		'Shoulder' => 'Spallières de traqueur de dragon|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Chaman'] = array(
		'Waist' => 'Ceinture des dix tempêtes|Vaelastrasz le Corrompu|Blackwing Lair',
		'Feet' => 'Bottes des dix tempêtes|Seigneur des couvées Lashslayerr|Blackwing Lair',
		'Wrist' => 'Brassards des dix tempêtes|Razorgore l\\\'Indompté|Blackwing Lair',
		'Chest' => 'Cuirasse des dix tempêtes|Nefarian|Blackwing Lair',
		'Hands' => 'Gantelets des dix tempêtes|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Casque des dix tempêtes|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Cuissards des dix tempêtes|Ragnaros|Molten Core',
		'Shoulder' => 'Epaulettes des dix tempêtes|Chromaggus|Blackwing Lair'
	);

// TTTTT I EEEEE RRRR   3333
//   T   I E     R   R      3
//   T   I EE    RRRR    333
//   T   I E     R R        3
//   T   I EEEEE R  R   3333

$lang['ItemSets_Set']['Tier_3']['Guerrier'] = array(
		'Waist' => 'Sangle de cuirassier|MOB|LOCATION',
		'Feet' => 'Solerets de cuirassier|MOB|LOCATION',
		'Wrist' => 'Brassards de cuirassier|MOB|LOCATION',
		'Chest' => 'Cuirasse de cuirassier|MOB|LOCATION',
		'Hands' => 'Gantlets de cuirassier|MOB|LOCATION',
		'Head' => 'Casque de cuirassier|MOB|LOCATION',
		'Legs' => 'Cuissards de cuirassier|MOB|LOCATION',
		'Shoulder' => 'Espauliers de cuirassier|MOB|LOCATION',
		'Finger' => 'Anneau du cuirassier|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Prêtre'] = array(
		'Waist' => 'Ceinture de foi|MOB|LOCATION',
		'Feet' => 'Sandales de foi|MOB|LOCATION',
		'Wrist' => 'Manchettes de foi|MOB|LOCATION',
		'Chest' => 'Robe de foi|MOB|LOCATION',
		'Hands' => 'Gants de foi|MOB|LOCATION',
		'Head' => 'Diadème de foi|MOB|LOCATION',
		'Legs' => 'Jambières de foi|MOB|LOCATION',
		'Shoulder' => 'Protège-épaules de foi|MOB|LOCATION',
		'Finger' => 'Anneau de foi|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Druide'] = array(
		'Waist' => 'Ceinturon de marcherêve|MOB|LOCATION',
		'Feet' => 'Bottes de marcherêve|MOB|LOCATION',
		'Wrist' => 'Protège-poignets de marcherêve|MOB|LOCATION',
		'Chest' => 'Tunique de marcherêve|MOB|LOCATION',
		'Hands' => 'Garde-mains de marcherêve|MOB|LOCATION',
		'Head' => 'Couvre-chef de marcherêve|MOB|LOCATION',
		'Legs' => 'Cuissards de marcherêve|MOB|LOCATION',
		'Shoulder' => 'Spallières de marcherêve|MOB|LOCATION',
		'Finger' => 'Anneau de marcherêve|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Voleur'] = array(
		'Waist' => 'Sangle de la faucheuse d\\\'os|MOB|LOCATION',
		'Feet' => 'Solerets de la faucheuse d\\\'os|MOB|LOCATION',
		'Wrist' => 'Brassards de la faucheuse d\\\'os|MOB|LOCATION',
		'Chest' => 'Cuirasse de la faucheuse d\\\'os|MOB|LOCATION',
		'Hands' => 'Gantelets de la faucheuse d\\\'os|MOB|LOCATION',
		'Head' => 'Casque de la faucheuse d\\\'os|MOB|LOCATION',
		'Legs' => 'Cuissards de la faucheuse d\\\'os|MOB|LOCATION',
		'Shoulder' => 'Espauliers de la faucheuse d\\\'os|MOB|LOCATION',
		'Finger' => 'Anneau de la faucheuse d\\\'os|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Mage'] = array(
		'Waist' => 'Ceinture de givrefeu|MOB|LOCATION',
		'Feet' => 'Sandales de givrefeu|MOB|LOCATION',
		'Wrist' => 'Manchettes de givrefeu|MOB|LOCATION',
		'Chest' => 'Robe de givrefeu|MOB|LOCATION',
		'Hands' => 'Gants de givrefeu|MOB|LOCATION',
		'Head' => 'Diadème de givrefeu|MOB|LOCATION',
		'Legs' => 'Jambières de givrefeu|MOB|LOCATION',
		'Shoulder' => 'Protège-épaules de givrefeu|MOB|LOCATION',
		'Finger' => 'Anneau de givrefeu|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Paladin'] = array(
		'Waist' => 'Ceinturon de rédemption|MOB|LOCATION',
		'Feet' => 'Bottes de rédemption|MOB|LOCATION',
		'Wrist' => 'Protège-poignets de rédemption|MOB|LOCATION',
		'Chest' => 'Tunique de rédemption|MOB|LOCATION',
		'Hands' => 'Garde-mains de rédemption|MOB|LOCATION',
		'Head' => 'Couvre-chef de rédemption|MOB|LOCATION',
		'Legs' => 'Cuissards de rédemption|MOB|LOCATION',
		'Shoulder' => 'Spallières de rédemption|MOB|LOCATION',
		'Finger' => 'Anneau de rédemption|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Démoniste'] = array(
		'Waist' => 'Ceinture de pestecoeur|MOB|LOCATION',
		'Feet' => 'Sandales de pestecoeur|MOB|LOCATION',
		'Wrist' => 'Manchettes de pestecoeur|MOB|LOCATION',
		'Chest' => 'Robe de pestecoeur|MOB|LOCATION',
		'Hands' => 'Gants de pestecoeur|MOB|LOCATION',
		'Head' => 'Diadème de pestecoeur|MOB|LOCATION',
		'Legs' => 'Jambières de pestecoeur|MOB|LOCATION',
		'Shoulder' => 'Protège-épaules de pestecoeur|MOB|LOCATION',
		'Finger' => 'Anneau de pestecoeur|MOB|LOCATION'
	);

$lang['ItemSets_Set']['Tier_3']['Chasseur'] = array(
		'Waist' => 'Ceinturon de traqueur des cryptes|MOB|LOCATION',
		'Feet' => 'Bottes de traqueur des cryptes|MOB|LOCATION',
		'Wrist' => 'Protège-poignets de traqueur des cryptes|MOB|LOCATION',
		'Chest' => 'Tunique de traqueur des cryptes|MOB|LOCATION',
		'Hands' => 'Garde-mains de traqueur des cryptes|MOB|LOCATION',
		'Head' => 'Couvre-chef de traqueur des cryptes|MOB|LOCATION',
		'Legs' => 'Cuissards de traqueur des cryptes|MOB|LOCATION',
		'Shoulder' => 'Spallières de traqueur des cryptes|MOB|LOCATION',
		'Finger' => 'Anneau de traqueur des cryptes|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Chaman'] = array(
		'Waist' => 'Ceinturon de Brise-terre|MOB|LOCATION',
		'Feet' => 'Bottes de Brise-terre|MOB|LOCATION',
		'Wrist' => 'Protège-poignets de Brise-terre|MOB|LOCATION',
		'Chest' => 'Tunique de Brise-terre|MOB|LOCATION',
		'Hands' => 'Garde-mains de Brise-terre|MOB|LOCATION',
		'Head' => 'Couvre-chef de Brise-terre|MOB|LOCATION',
		'Legs' => 'Cuissards de Brise-terre|MOB|LOCATION',
		'Shoulder' => 'Spallières de Brise-terre|MOB|LOCATION',
		'Finger' => 'Anneau de Brise-terre|MOB|LOCATION'
	);

//   AAAA     QQQ     222    000
//  A    A   Q   Q   2   2  0   0
//  A    A   Q   Q      2   0   0
//  AAAAAA   Q   Q     2    0   0
//  A    A    QQQ Q  22222   000

$lang['ItemSets_Set']['AQ20']['Druide'] = array(
		'Back' => 'Cape de vie interminable|Quete|Cape de vie interminable',
		'Finger' => 'Bague de vie interminable|Quête|Anneau de vie interminable',
		'Mainhand' => 'Masse de vie interminable|Quête|Masse de vie interminable'
);
$lang['ItemSets_Set']['AQ20']['Chasseur'] = array(
		'Back' => 'Cape du Sentier Invisible|Quête|Cape du Sentier Invisible',
		'Finger' => 'Chevaliere du Sentier Invisible|Quête|Chevaliere du Sentier Invisible',
		'Mainhand' => 'Faux du Sentier Invisible|Quête|Faux du Sentier Invisible'
);
$lang['ItemSets_Set']['AQ20']['Mage'] = array(
		'Back' => 'Drapé des secrets scellés|Quête|Drapé des secrets scellés',
		'Finger' => 'Anneau des secrets scellés|Quête|Anneau des secrets scellés',
		'Mainhand' => ' Lame des secrets scellés|Quête| Lame des secrets scellés'
);
$lang['ItemSets_Set']['AQ20']['Paladin'] = array(
		'Back' => 'Cape de justice éternelle|Quête| Cape de justice éternelle',
		'Finger' => 'Anneau de Justice Eternelle|Quête|Anneau de Justice Eternelle',
		'Mainhand' => 'Lame de Justice Eternelle|Quête|Lame de Justice Eternelle'
);
$lang['ItemSets_Set']['AQ20']['Prêtre'] = array(
		'Back' => 'Voile de sagesse infinie|Quête|Voile de sagesse infinie',
		'Finger' => 'Anneau de sagesse infinie|Quête|Anneau de sagesse infinie',
		'Mainhand' => 'Marteau de sagesse infinie|Quête|Marteau de sagesse infinie'
);
$lang['ItemSets_Set']['AQ20']['Voleur'] = array(
		'Back' => 'Cape des Ombres Voilées|Quête|Cape des Ombres Voilées',
		'Finger' => 'Bague des Ombres Voilées|Quête|Anneau des Ombres Voilées',
		'Mainhand' => 'Dague des Ombres Voilées|Quête|Daguee des Ombres Voilées'
);
$lang['ItemSets_Set']['AQ20']['Chaman'] = array(
		'Back' => 'Cape de la tempête imminente|Quête|Cape de la tempête imminente',
		'Finger' => 'Anneau de la tempête imminente|Quête|Anneau de la tempête imminente',
		'Mainhand' => 'Marteau de la tempête imminente|Quête|Marteau de la tempête imminente'
);
$lang['ItemSets_Set']['AQ20']['Démoniste'] = array(
		'Back' => 'Voile des noms inexprimés|Quête|Voile des noms inexprimés',
		'Finger' => 'Anneau des noms inexprimés|Quête|Anneau des noms inexprimés',
		'Mainhand' => 'Kriss des noms inexprimés|Quête|Kriss des noms inexprimés'
);
$lang['ItemSets_Set']['AQ20']['Guerrier'] = array(
		'Back' => 'Drappé de force inflexible|Quête|Drappé de force inflexible',
		'Finger' => 'Chevaliere de force inflexible|Quête|Chevaliere de force inflexible',
		'Mainhand' => 'Faucille de force inflexible|Quête|Faucille de force inflexible'
);

//   AAAA     QQQ       4 4    000
//  A    A   Q   Q     4  4   0   0
//  A    A   Q   Q    4   4   0   0
//  AAAAAA   Q   Q    44444   0   0
//  A    A    QQQ Q       4    000

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

// ZZZZZ  GGGG
//    Z  G
//   Z   G  GG
//  Z    G   G
// ZZZZ   GGG

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

//
//   PVP_Rare Alliance
//

$lang['ItemSets_Set']['PVP_Rare']['A']['Druide']  = array(
		'Feet'  => 'Bottines de chevalier-lieutenant en peau de dragon|Chevalier-lieutenant|Honneur',
		'Chest' => 'Plastron de chevalier-capitaine en peau de dragon|Chevalier-capitaine|Honneur',
		'Hands' => 'Poignes de chevalier-lieutenant en peau de dragon|Chevalier-lieutenant|Honneur',
		'Head'  => 'Protège-front de lieutenant-commandant en peau de dragon|Lieutenant-commandant|Honneur',
		'Legs'  => 'Jambières de chevalier-capitaine en peau de dragon|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Epaulières de lieutenant-commandant en peau de dragon|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Chasseur'] = array(
		'Feet'  => 'Grèves de chevalier-lieutenant en anneaux|Chevalier-lieutenant|Honneur',
		'Chest' => 'Haubert de chevalier-capitaine en anneaux|Chevalier-capitaine|Honneur',
		'Hands' => 'Cestes de chevalier-lieutenant en anneaux|Chevalier-lieutenant|Honneur',
		'Head'  => 'Casque de lieutenant-commandant en anneaux|Lieutenant-commandant|Honneur',
		'Legs'  => 'Cuissards de chevalier-capitaine en anneaux|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Epaulières de lieutenant-commandant en anneaux|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Mage'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en soie|Chevalier-lieutenant|Honneur',
		'Chest' => 'Tunique de chevalier-capitaine en soie|Chevalier-capitaine|Honneur',
		'Hands' => 'Protège-mains de chevalier-lieutenant en soie|Chevalier-lieutenant|Honneur',
		'Head'  => 'Capuche de lieutenant-commandant en soie|Lieutenant-commandant|Honneur',
		'Legs'  => 'Cuissards de chevalier-capitaine en soie|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Mantelet de lieutenant-commandant en soie|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Paladin'] = array(
		'Feet'  => 'Solerets lamellaires de chevalier-capitaine|chevalier-capitaine|Honneur',
		'Chest' => 'Cuirasse lamellaire de chevalier-capitaine|Chevalier-capitaine|Honneur',
		'Hands' => 'Gantelets lamellaires de chevalier-capitaine|chevalier-capitaine|Honneur',
		'Head'  => 'Protège-front lamellaire de lieutenant-commandant|Lieutenant-commandant|Honneur',
		'Legs'  => 'Jambières lamellaires de chevalier-capitaine|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Epaulières lamellaires de lieutenant-commandant|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Prêtre'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en satin|Chevalier-lieutenant|Honneur',
		'Chest' => 'Tunique de chevalier-capitaine en satin|Chevalier-capitaine|Honneur',
		'Hands' => 'Protège-mains de chevalier-lieutenant en satin|Chevalier-lieutenant|Honneur',
		'Head'  => 'Chaperon de lieutenant-commandant en satin|Lieutenant-commandant|Honneur',
		'Legs'  => 'Cuissards de chevalier-capitaine en satin|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Mantelet de lieutenant-commandant en satin|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Voleur'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en cuir|Chevalier-lieutenant|Honneur',
		'Chest' => 'Plastron de chevalier-capitaine en cuir|Chevalier-capitaine|Honneur',
		'Hands' => 'Poignes de chevalier-lieutenant en cuir|Chevalier-lieutenant|Honneur',
		'Head'  => 'Casque de lieutenant-commandant en cuir|Lieutenant-commandant|Honneur',
		'Legs'  => 'Cuissards de chevalier-capitaine en cuir|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Epaulières de lieutenant-commandant en cuir|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Démoniste'] = array(
		'Feet'  => 'Brodequins de chevalier-lieutenant en tisse-effroi|Chevalier-lieutenant|Honneur',
		'Chest' => 'Tunique de chevalier-capitaine en tisse-effroi|Chevalier-capitaine|Honneur',
		'Hands' => 'Protège-mains de chevalier-lieutenant en tisse-effroi|Chevalier-lieutenant|Honneur',
		'Head'  => 'Capuche de lieutenant-commandant en tisse-effroi|Lieutenant-commandant|Honneur',
		'Legs'  => 'Cuissards de chevalier-capitaine en tisse-effroi|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Spallières de lieutenant-commandant en tisse-effroi|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Guerrier'] = array(
		'Feet'  => 'Grèves de chevalier-lieutenant en plaques|Chevalier-lieutenant|Honneur',
		'Chest' => 'Haubert de chevalier-capitaine en plaques|Chevalier-capitaine|Honneur',
		'Hands' => 'Gantelets de chevalier-lieutenant en plaques|Chevalier-lieutenant|Honneur',
		'Head'  => 'Heaume de lieutenant-commandant en plaques|Lieutenant-commandant|Honneur',
		'Legs'  => 'Jambières de chevalier-capitaine en plaques|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Epaulières de lieutenant-commandant en plaques|Lieutenant-commandant|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Chaman'] = array(
		'Feet'  => 'Grèves de chevalier-lieutenant en mailles|Chevalier-lieutenant|Honneur',
		'Chest' => 'Haubert de chevalier-capitaine en mailles|Chevalier-capitaine|Honneur',
		'Hands' => 'Cestes de chevalier-lieutenant en mailles|Chevalier-lieutenant|Honneur',
		'Head'  => 'Protège-front de lieutenant-commandant en mailles|Lieutenant-commandant|Honneur',
		'Legs'  => 'Garde-jambes de chevalier-capitaine en mailles|Chevalier-capitaine|Honneur',
		'Shoulder' => 'Epauliers de lieutenant-commandant en mailles|Lieutenant-commandant|Honneur'
);

//
//   PVP_Rare Horde
//

$lang['ItemSets_Set']['PVP_Rare']['H']['Druide'] = array(
		'Feet'  => 'Bottines de garde de sang en peau de dragon|Garde de sang|Honneur',
		'Chest' => 'Plastron de légionnaire en peau de dragon|Légionnaire|Honneur',
		'Hands' => 'Poignes de garde de sang en peau de dragon|Garde de sang|Honneur',
		'Head'  => 'Protège-front de champion en peau de dragon|Champion|Honneur',
		'Legs'  => 'Jambières de légionnaire en peau de dragon|Légionnaire|Honneur',
		'Shoulder' => 'Epaulières de champion en peau de dragon|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Chasseur'] = array(
		'Feet'  => 'Bottes de garde de sang en anneaux|Garde de sang|Honneur',
		'Chest' => 'Cuirasse de légionnaire en anneaux|Légionnaire|Honneur',
		'Hands' => 'Gantelets de garde de sang en anneaux|Garde de sang|Honneur',
		'Head'  => 'Heaume de champion en anneaux|Champion|Honneur',
		'Legs'  => 'Jambières de légionnaire en anneaux|Légionnaire|Honneur',
		'Shoulder' => 'Espauliers de champion en anneaux|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Mage'] = array(
		'Feet'  => 'Brodequins de garde de sang en soie|Garde de sang|Honneur',
		'Chest' => 'Tunique de légionnaire en soie|Légionnaire|Honneur',
		'Hands' => 'Protège-mains de garde de sang en soie|Garde de sang|Honneur',
		'Head'  => 'Capuche de champion en soie|Champion|Honneur',
		'Legs'  => 'Garde-jambes de légionnaire en soie|Légionnaire|Honneur',
		'Shoulder' => 'Mantelet de champion en soie|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Prêtre'] = array(
		'Feet'  => 'Brodequins de garde de sang en satin|Garde de sang|Honneur',
		'Chest' => 'Tunique de légionnaire en satin|Légionnaire|Honneur',
		'Hands' => 'Protège-mains de garde de sang en satin|Garde de sang|Honneur',
		'Head'  => 'Chaperon de champion en satin|Champion|Honneur',
		'Legs'  => 'Garde-jambes de légionnaire en satin|Légionnaire|Honneur',
		'Shoulder' => 'Mantelet de champion en satin|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Voleur'] = array(
		'Feet'  => 'Brodequins de garde de sang en cuir|Garde de sang|Honneur',
		'Chest' => 'Plastron de légionnaire en cuir|Légionnaire|Honneur',
		'Hands' => 'Poignes de garde de sang en cuir|Garde de sang|Honneur',
		'Head'  => 'Casque de champion en cuir|Champion|Honneur',
		'Legs'  => 'Garde-jambes de légionnaire en cuir|Légionnaire|Honneur',
		'Shoulder' => 'Epaulières de champion en cuir|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Chaman'] = array(
		'Feet'  => 'Grèves de garde de sang en mailles|Garde de sang|Honneur',
		'Chest' => 'Haubert de légionnaire en mailles|Légionnaire|Honneur',
		'Hands' => 'Cestes de garde de sang en mailles|Garde de sang|Honneur',
		'Head'  => 'Protège-front de champion en mailles|Champion|Honneur',
		'Legs'  => 'Garde-jambes de légionnaire en mailles|Légionnaire|Honneur',
		'Shoulder' => 'Espauliers de champion en mailles|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Démoniste'] = array(
		'Feet'  => 'Brodequins de garde de sang en tisse-effroi|Garde de sang|Honneur',
		'Chest' => 'Tunique de légionnaire en tisse-effroi|Légionnaire|Honneur',
		'Hands' => 'Protège-mains de garde de sang en tisse-effroi|Garde de sang|Honneur',
		'Head'  => 'Capuche de champion en tisse-effroi|Champion|Honneur',
		'Legs'  => 'Garde-jambes de légionnaire en tisse-effroi|Légionnaire|Honneur',
		'Shoulder' => 'Spallières de champion en tisse-effroi|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Guerrier'] = array(
		'Feet'  => 'Bottes de garde de sang en plaques|Garde de sang|Honneur',
		'Chest' => 'Armure de plaques de légionnaire|Légionnaire|Honneur',
		'Hands' => 'Gants de garde de sang en plaques|Garde de sang|Honneur',
		'Head'  => 'Heaume de champion en plaques|Champion|Honneur',
		'Legs'  => 'Jambières de légionnaire en plaques|Légionnaire|Honneur',
		'Shoulder' => 'Espauliers de champion en plaques|Champion|Honneur'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Paladin'] = array(
		'Feet'  => 'Solerets lamellaires de garde de sang|Garde de sang|Honneur',
		'Chest' => 'Cuirasse lamellaire de légionnaire|Légionnaire|Honneur',
		'Hands' => 'Gantelets lamellaires de garde de sang|Garde de sang|Honneur',
		'Head'  => 'Casque lamellaire de champion|Champion|Honneur',
		'Legs'  => 'Jambières lamellaires de légionnaire|Légionnaire|Honneur',
		'Shoulder' => 'Epaulières lamellaires de champion|Champion|Honneur'
);

//
//   PVP_Epic Alliance
//

$lang['ItemSets_Set']['PVP_Epic']['A']['Druide'] = array(
		'Feet'  => 'Bottes de maréchal en tisse-effroi|Maréchal|Honneur',
		'Chest' => 'Robe de grand maréchal en tisse-effroi|Grand maréchal|Honneur',
		'Hands' => 'Gants de maréchal en tisse-effroi|Maréchal|Honneur',
		'Head'  => 'Couronne de grand maréchal|Grand maréchal|Honneur',
		'Legs'  => 'Jambières de maréchal en tisse-effroi|Maréchal|Honneur',
		'Shoulder' => 'Epaulières de grand maréchal en tisse-effroi|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Chasseur'] = array(
		'Feet'  => 'Maréchal\\\'s Chain Boots|Maréchal|Honneur',
		'Chest' => 'Grand maréchal\\\'s Chain Breastplate|Grand maréchal|Honneur',
		'Hands' => 'Maréchal\\\'s Chain Grips|Maréchal|Honneur',
		'Head'  => 'Grand maréchal\\\'s Chain Helm|Grand maréchal|Honneur',
		'Legs'  => 'Maréchal\\\'s Chain Legguards|Maréchal|Honneur',
		'Shoulder' => 'Grand maréchal\\\'s Chain Spaulders|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Mage'] = array(
		'Feet'  => 'Bottillons de maréchal en soie|Maréchal|Honneur',
		'Chest' => 'Habit de grand maréchal en soie|Grand maréchal|Honneur',
		'Hands' => 'Gants de maréchal en soie|Maréchal|Honneur',
		'Head'  => 'Cerclet de grand maréchal|Grand maréchal|Honneur',
		'Legs'  => 'Jambières de maréchal en soie|Maréchal|Honneur',
		'Shoulder' => 'Spallières de grand maréchal en soie|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Paladin'] = array(
		'Feet'  => 'Bottes lamellaires de maréchal|Maréchal|Honneur',
		'Chest' => 'Pansière lamellaire de grand maréchal|Grand maréchal|Honneur',
		'Hands' => 'Gants lamellaires de maréchal|Maréchal|Honneur',
		'Head'  => 'Casque lamellaire de grand maréchal|Grand maréchal|Honneur',
		'Legs'  => ' Jambières lamellaires de maréchal|Maréchal|Honneur',
		'Shoulder' => 'Espauliers lamellaires de grand maréchal|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Prêtre'] = array(
		'Feet'  => 'Sandales de maréchal en satin|Maréchal|Honneur',
		'Chest' => 'Habit de grand maréchal en satin|Grand maréchal|Honneur',
		'Hands' => 'Gants de maréchal en satin|Maréchal|Honneur',
		'Head'  => 'Coiffure de grand maréchal|Grand maréchal|Honneur',
		'Legs'  => 'Pantalon de maréchal en satin|Maréchal|Honneur',
		'Shoulder' => 'Mantelet de grand maréchal en satin|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Voleur'] = array(
		'Feet'  => 'Bottes de maréchal en cuir|Maréchal|Honneur',
		'Chest' => 'Plastron de grand maréchal en cuir|Grand maréchal|Honneur',
		'Hands' => 'Gants de maréchal en cuir|Maréchal|Honneur',
		'Head'  => 'Masque de grand maréchal en cuir|Grand maréchal|Honneur',
		'Legs'  => 'Jambières de maréchal en cuir|Maréchal|Honneur',
		'Shoulder' => 'Epaulettes de grand maréchal en cuir|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Démoniste'] = array(
		'Feet'  => 'Bottes de maréchal en tisse-effroi|Maréchal|Honneur',
		'Chest' => 'Robe de grand maréchal en tisse-effroi|Grand maréchal|Honneur',
		'Hands' => 'Gants de maréchal en tisse-effroi|Maréchal|Honneur',
		'Head'  => 'Couronne de grand maréchal|Grand maréchal|Honneur',
		'Legs'  => 'Jambières de maréchal en tisse-effroi|Maréchal|Honneur',
		'Shoulder' => 'Epaulières de grand maréchal en tisse-effroi|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Guerrier'] = array(
		'Feet'  => 'Bottes de maréchal en plaques|Maréchal|Honneur',
		'Chest' => 'Armure de grand maréchal en plaques|Grand maréchal|Honneur',
		'Hands' => 'Gantelets de maréchal en plaques|Maréchal|Honneur',
		'Head'  => 'Casque de grand maréchal en plaques|Grand maréchal|Honneur',
		'Legs'  => 'Jambières de maréchal en plaques|Maréchal|Honneur',
		'Shoulder' => 'Garde-épaules de grand maréchal en plaques|Grand maréchal|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Chaman'] = array(
		'Feet' => 'Bottes de maréchal en mailles|Maréchal|Honneur',
		'Chest' => 'Cotte de mailles de grand maréchal|Grand maréchal|Honneur',
		'Hands' => 'Gantelets de maréchal en mailles|Maréchal|Honneur',
		'Head' => 'Heaume de grand maréchal en mailles|Grand maréchal|Honneur',
		'Legs' => 'Jambières de maréchal en mailles|Maréchal|Honneur',
		'Shoulder' => 'Spallières de grand maréchal en mailles|Grand maréchal|Honneur'
);

//
//   PVP_Epic Horde
//

$lang['ItemSets_Set']['PVP_Epic']['H']['Druide'] = array(
	'Feet' => 'Bottes de général en peau de dragon|Général|Honneur',
	'Chest' => 'Haubert de seigneur de guerre en peau de dragon|Seigneur de guerre|Honneur',
	'Hands' => 'Gants de général en peau de dragon|Général|Honneur',
	'Head' => 'Casque de seigneur de guerre en peau de dragon|Seigneur de guerre|Honneur',
	'Legs' => 'Jambières de général en peau de dragon|Général|Honneur',
	'Shoulder' => 'Epaulettes de seigneur de guerre en peau de dragon|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Chasseur'] = array(
	'Feet' => 'Bottes de général en anneaux|Général|Honneur',
	'Chest' => 'Plastron de seigneur de guerre en anneaux|Seigneur de guerre|Honneur',
	'Hands' => 'Gants de général en anneaux|Général|Honneur',
	'Head' => 'Heaume de seigneur de guerre en anneaux|Seigneur de guerre|Honneur',
	'Legs' => 'Garde-jambes de général en anneaux|Général|Honneur',
	'Shoulder' => 'Epaulières de seigneur de guerre en anneaux|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Mage'] = array(
	'Feet' => 'Bottes de général en soie|Général|Honneur',
	'Chest' => 'Grande tenue de seigneur de guerre en soie|Seigneur de guerre|Honneur',
	'Hands' => 'Garde-mains de général en soie|Général|Honneur',
	'Head' => 'Capuche de seigneur de guerre en soie|Seigneur de guerre|Honneur',
	'Legs' => 'Chausses de général en soie|Général|Honneur',
	'Shoulder' => 'Amict de seigneur de guerre en soie|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Prêtre'] = array(
	'Feet' => 'Bottes de général en satin|Général|Honneur',
	'Chest' => 'Robe de seigneur de guerre en satin|Seigneur de guerre|Honneur',
	'Hands' => 'Gants de général en satin|Général|Honneur',
	'Head' => 'Capuche de seigneur de guerre en satin|Seigneur de guerre|Honneur',
	'Legs' => 'Jambières de général en satin|Général|Honneur',
	'Shoulder' => 'Mantelet de seigneur de guerre en satin|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Voleur'] = array(
	'Feet' => 'Bottines de général en cuir|Général|Honneur',
	'Chest' => 'Cuirasse de seigneur de guerre en cuir|Seigneur de guerre|Honneur',
	'Hands' => 'Mitaines de général en cuir|Général|Honneur',
	'Head' => 'Casque de seigneur de guerre en cuir|Seigneur de guerre|Honneur',
	'Legs' => 'Garde-jambes de général en cuir|Général|Honneur',
	'Shoulder' => 'Spallières de seigneur de guerre en cuir|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Chaman'] = array(
	'Feet' => 'Bottes de général en mailles|Général|Honneur',
	'Chest' => 'Armure de seigneur de guerre en mailles|Seigneur de guerre|Honneur',
	'Hands' => 'Gantelets de général en mailles|Général|Honneur',
	'Head' => 'Heaume de seigneur de guerre en mailles|Seigneur de guerre|Honneur',
	'Legs' => 'Jambières de général en mailles|Général|Honneur',
	'Shoulder' => 'Spallières de seigneur de guerre en mailles|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Démoniste']  = array(
	'Feet' => 'Bottes de général en tisse-effroi|Général|Honneur',
	'Chest' => 'Robe de seigneur de guerre en tisse-effroi|Seigneur de guerre|Honneur',
	'Hands' => 'Gants de général en tisse-effroi|Général|Honneur',
	'Head' => 'Chaperon de seigneur de guerre en tisse-effroi|Seigneur de guerre|Honneur',
	'Legs' => 'Pantalon de général en tisse-effroi|Général|Honneur',
	'Shoulder' => 'Mantelet de seigneur de guerre en tisse-effroi|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Guerrier'] = array(
	'Feet' => 'Bottes de général en plaques|Général|Honneur',
	'Chest' => 'Armure de plaques de seigneur de guerre|Seigneur de guerre|Honneur',
	'Hands' => 'Gantelets de général en plaques|Général|Honneur',
	'Head' => 'Heaume de seigneur de guerre en plaques|Seigneur de guerre|Honneur',
	'Legs' => 'Jambières de général en plaques|Général|Honneur',
	'Shoulder' => 'Epaulières de seigneur de guerre en plaques|Seigneur de guerre|Honneur'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Paladin'] = array(
	'Feet'  => 'Bottes lamellaire de général|Général|Honneur',
	'Chest' => 'Pansière lamellaire de seigneur de guerre|Seigneur de guerre|Honneur',
	'Hands' => 'Gants lamellaires de général|Général|Honneur',
	'Head'  => 'Casque lamellaire de seigneur de guerre|Seigneur de guerre|Honneur',
	'Legs'  => 'Cuissards lamellaires de général|Général|Honneur',
	'Shoulder' => 'Espauliers lamellaires de seigneur de guerre|Seigneur de guerre|Honneur'
);

// TTTTT I EEEEE RRRR   3333      55555
//   T   I E     R   R      3     5 
//   T   I EE    RRRR     333      5555
//   T   I E     R R        3          5
//   T   I EEEEE R  R   3333   0   5555

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

// TTTTT I EEEEE RRRR     44    
//   T   I E     R   R   4 4   
//   T   I EE    RRRR   44444   
//   T   I E     R R       4   
//   T   I EEEEE R  R     444  

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

// TTTTT I EEEEE RRRR   55555    
//   T   I E     R   R  5   
//   T   I EE    RRRR    5555   
//   T   I E     R R         5 
//   T   I EEEEE R  R    5555  

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

//      A     RRRR  EEEEE N   N EEEEE    1
//     A A    R   R E     NN  N E      1 1
//    A   A   RRRR  EE    N N N EE       1
//   AAAAAAA  R R   E     N  NN E        1
//  A       A R  R  EEEEE N   N EEEEE  11111

$lang['ItemSets_Set']['Arena_1']['Guerrier'] = array(
		'Chest1' => 'Plastron de gladiateur en plaques|Arène|Saison 1 ',
		'Hands1' => 'Gantelets de gladiateur en plaques|Arène|Saison 1',
		'Head1'  => 'Heaume de gladiateur en plaques|Arène|Saison 1',
		'Legs1'  => 'Garde-jambes de gladiateur en plaques|Arène|Saison 1',
		'Shoulder1' => 'Epaulières de gladiateur en plaques|Arène|Saison 1',
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
		'Chest1' => 'Robe de gladiateur en étoffe lunaire|Arène|Saison 1',
		'Hands1' => 'Gants de gladiateur en étoffe lunaire|Arène|Saison 1',
		'Head1'  => 'Chaperon de gladiateur en étoffe lunaire|Arène|Saison 1',
		'Legs1'  => 'Jambières de gladiateur en étoffe lunaire|Arène|Saison 1',
		'Shoulder1' => 'Mantelet de gladiateur en étoffe lunaire|Arène|Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Robe de gladiateur en satin|Arène|Saison 1',
		'Hands2' => 'Gants de gladiateur en satin|Arène|Saison 1',
		'Head2'  => 'Chaperon de gladiateur en satin|Arène|Saison 1',
		'Legs2'  => 'Jambières de gladiateur en satin|Arène|Saison 1',
		'Shoulder2' => 'Mantelet de gladiateur en satin|Arène|Saison 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Druide'] = array(
		'Chest1' => 'Tunique de gladiateur en peau de wyrm|Arène|Saison 1',
		'Hands1' => 'Gants de gladiateur en peau de wyrm|Arène|Saison 1',
		'Head1'  => 'Heaume de gladiateur en peau de wyrm|Arène|Saison 1',
		'Legs1'  => 'Garde-jambes de gladiateur en peau de wyrm|Arène|Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en peau de wyrm|Arène|Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique de gladiateur en peau de dragon|Arène|Saison 1',
		'Hands2' => 'Gants de gladiateur en peau de dragon|Arène|Saison 1',
		'Head2'  => 'Casque de gladiateur en peau de dragon|Arène|Saison 1',
		'Legs2'  => 'Garde-jambes de gladiateur en peau de dragon|Arène|Saison 1',
		'Shoulder2' => 'Spallières de gladiateur en peau de dragon|Arène|Saison 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique de gladiateur en cuir de kodo|Arène|Saison 1',
		'Hands3' => 'Gants de gladiateur en cuir de kodo|Arène|Saison 1',
		'Head3'  => 'Heaume de gladiateur en cuir de kodo|Arène|Saison 1',
		'Legs3'  => 'Garde-jambes de gladiateur en cuir de kodo|Arène|Saison 1',
		'Shoulder3' => 'Spallières de gladiateur en cuir de kodo|Arène|Saison 1'
);

$lang['ItemSets_Set']['Arena_1']['Voleur'] = array(
		'Chest1' => 'Tunique de gladiateur en cuir|Arène|Saison 1',
		'Hands1' => 'Gants de gladiateur en cuir|Arène|Saison 1',
		'Head1'  => 'Casque de gladiateur en cuir|Arène|Saison 1',
		'Legs1'  => 'Garde-jambes de gladiateur en cuir|Arène|Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en cuir|Arène|Saison 1',
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
		'Chest1' => 'Grande tenue de gladiateur en soie|Arène|Saison 1',
		'Hands1' => 'Garde-mains de gladiateur en soie|Arène|Saison 1',
		'Head1'  => 'Capuche de gladiateur en soie|Arène|Saison 1',
		'Legs1'  => 'Chausses de gladiateur en soie|Arène|Saison 1',
		'Shoulder1' => 'Amict de gladiateur en soie|Arène|Saison 1',
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
		'Chest1' => 'Corselet ornementé de gladiateur|Arène|Saison 1',
		'Hands1' => 'Gants ornementés de gladiateur|Arène|Saison 1',
		'Head1'  => 'Couvre-chef ornementé de gladiateur|Arène|Saison 1',
		'Legs1'  => 'Cuissards ornementés de gladiateur|Arène|Saison 1',
		'Shoulder1' => 'Spallières ornementées de gladiateur|Arène|Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Plastron lamellaire de gladiateur|Arène|Saison 1',
		'Hands2' => 'Gantelets lamellaires de gladiateur|Arène|Saison 1',
		'Head2'  => 'Casque lamellaire de gladiateur|Arène|Saison 1',
		'Legs2'  => 'Garde-jambes lamellaires de gladiateur|Arène|Saison 1',
		'Shoulder2' => 'Epaulières lamellaires de gladiateur|Arène|Saison 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Plastron de gladiateur en écailles|Arène|Saison 1',
		'Hands3' => 'Gantelets de gladiateur en écailles|Arène|Saison 1',
		'Head3'  => 'Heaume de gladiateur en écailles|Arène|Saison 1',
		'Legs3'  => 'Garde-jambes de gladiateur en écailles|Arène|Saison 1',
		'Shoulder3' => 'Epaulières de gladiateur en écailles|Arène|Saison 1'
);

$lang['ItemSets_Set']['Arena_1']['Démoniste'] = array(
		'Chest1' => 'Robe de gladiateur en tisse-effroi|Arène|Saison 1',
		'Hands1' => 'Gants de gladiateur en tisse-effroi|Arène|Saison 1',
		'Head1'  => 'Chaperon de gladiateur en tisse-effroi|Arène|Saison 1',
		'Legs1'  => 'Jambières de gladiateur en tisse-effroi|Arène|Saison 1',
		'Shoulder1' => 'Mantelet de gladiateur en tisse-effroi|Arène|Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Grande tenue de gladiateur en tisse-gangrène|Arène|Saison 1',
		'Hands2' => 'Garde-mains de gladiateur en tisse-gangrène|Arène|Saison 1',
		'Head2'  => 'Capuche de gladiateur en tisse-gangrène|Arène|Saison 1',
		'Legs2'  => 'Chausses de gladiateur en tisse-gangrène|Arène|Saison 1',
		'Shoulder2' => 'Amict de gladiateur en tisse-gangrène|Arène|Saison 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Chasseur'] = array(
		'Chest1' => 'Cotte d\\\'anneaux de gladiateur|Arène|Saison 1',
		'Hands1' => 'Gantelets de gladiateur en anneaux|Arène|Saison 1',
		'Head1'  => 'Casque de gladiateur en anneaux|Arène|Saison 1',
		'Legs1'  => 'Jambières de gladiateur en anneaux|Arène|Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en anneaux|Arène|Saison 1',
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
		'Chest1' => 'Cotte de mailles de gladiateur|Arène|Saison 1',
		'Hands1' => 'Gantelets de gladiateur en mailles|Arène|Saison 1',
		'Head1'  => 'Casque de gladiateur en mailles|Arène|Saison 1',
		'Legs1'  => 'Jambières de gladiateur en mailles|Arène|Saison 1',
		'Shoulder1' => 'Spallières de gladiateur en mailles|Arène|Saison 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Armure de gladiateur rivetée|Arène|Saison 1',
		'Hands2' => 'Gantelets de gladiateur rivetés|Arène|Saison 1',
		'Head2'  => 'Casque de gladiateur riveté|Arène|Saison 1',
		'Legs2'  => 'Jambières de gladiateur rivetées|Arène|Saison 1',
		'Shoulder2' => 'Spallières de gladiateur rivetés|Arène|Saison 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Armure de gladiateur en mailles annelées|Arène|Saison 1',
		'Hands3' => 'Gantelets de gladiateur en mailles annelées|Arène|Saison 1',
		'Head3' => 'Heaume de gladiateur en mailles annelées|Arène|Saison 1',
		'Legs3'  => 'Jambières de gladiateur en mailles annelées|Arène|Saison 1',
		'Shoulder3' => 'Spallières de gladiateur en mailles annelées|Arène|Saison 1'
);

//      A     RRRR  EEEEE N   N EEEEE  22222
//     A A    R   R E     NN  N E          2
//    A   A   RRRR  EE    N N N EE     22222
//   AAAAAAA  R R   E     N  NN E      2  
//  A       A R  R  EEEEE N   N EEEEE  22222

$lang['ItemSets_Set']['Arena_2']['Guerrier'] = array(
		'Chest1' => 'Plastron du gladiateur impitoyable en plaques|Arène|Saison 2',
		'Hands1' => 'Gantelets du gladiateur impitoyable en plaques|Arène|Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en plaques|Arène|Saison 2',
		'Legs1'  => 'Garde-jambes du gladiateur impitoyable en plaques|Arène|Saison 2',
		'Shoulder1' => 'Epaulières du gladiateur impitoyable en plaques|Arène|Saison 2',
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
		'Chest1' => 'Robe du gladiateur impitoyable en étoffe lunaire|Arène|Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en étoffe lunaire|Arène|Saison 2',
		'Head1'  => 'Chaperon du gladiateur impitoyable en étoffe lunaire|Arène|Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable en étoffe lunaire|Arène|Saison 2',
		'Shoulder1' => 'Mantelet du gladiateur impitoyable en étoffe lunaire|Arène|Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Robe du gladiateur impitoyable en satin|Arène|Saison 2',
		'Hands2' => 'Gants du gladiateur impitoyable en satin|Arène|Saison 2',
		'Head2'  => 'Chaperon du gladiateur impitoyable en satin|Arène|Saison 2',
		'Legs2'  => 'Jambières du gladiateur impitoyable en satin|Arène|Saison 2',
		'Shoulder2' => 'Mantelet du gladiateur impitoyable en satin|Arène|Saison 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Druide'] = array(
		'Chest1' => 'Tunique du gladiateur impitoyable en peau de wyrm|Arène|Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en peau de wyrm|Arène|Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en peau de wyrm|Arène|Saison 2',
		'Legs1'  => 'Garde-jambes du gladiateur impitoyable en peau de wyrm|Arène|Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable en peau de wyrm|Arène|Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunique du gladiateur impitoyable en peau de dragon|Arène|Saison 2',
		'Hands2' => 'Gants du gladiateur impitoyable en peau de dragon|Arène|Saison 2',
		'Head2'  => 'Heaume du gladiateur impitoyable en peau de dragon|Arène|Saison 2',
		'Legs2'  => 'Garde-jambes du gladiateur impitoyable en peau de dragon|Arène|Saison 2',
		'Shoulder2' => 'Spallières du gladiateur impitoyable en peau de dragon|Arène|Saison 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunique du gladiateur impitoyable en cuir de kodo|Arène|Saison 2',
		'Hands3' => 'Gants du gladiateur impitoyable en cuir de kodo|Arène|Saison 2',
		'Head3'  => 'Heaume du gladiateur impitoyable en cuir de kodo|Arène|Saison 2',
		'Legs3'  => 'Garde-jambes du gladiateur impitoyable en cuir de kodo|Arène|Saison 2',
		'Shoulder3' => 'Spallières du gladiateur impitoyable en cuir de kodo|Arène|Saison 2'
);

$lang['ItemSets_Set']['Arena_2']['Voleur'] = array(
		'Chest1' => 'Tunique du gladiateur impitoyable en cuir|Arène|Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en cuir|Arène|Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en cuir|Arène|Saison 2',
		'Legs1'  => 'Garde-jambes du gladiateur impitoyable en cuir|Arène|Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable en cuir|Arène|Saison 2',
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
		'Chest1' => 'Grande tenue du gladiateur impitoyable en soie|Arène|Saison 2',
		'Hands1' => 'Garde-mains du gladiateur impitoyable en soie|Arène|Saison 2',
		'Head1'  => 'Capuche du gladiateur impitoyable en soie|Arène|Saison 2',
		'Legs1'  => 'Chausses du gladiateur impitoyable en soie|Arène|Saison 2',
		'Shoulder1' => 'Amict du gladiateur impitoyable en soie|Arène|Saison 2',
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
		'Chest1' => 'Corselet ornementé du gladiateur impitoyable|Arène|Saison 2',
		'Hands1' => 'Gants ornementés du gladiateur impitoyable|Arène|Saison 2',
		'Head1'  => 'Couvre-chef ornementé du gladiateur impitoyable|Arène|Saison 2',
		'Legs1'  => 'Cuissards ornementé du gladiateur impitoyable|Arène|Saison 2',
		'Shoulder1' => 'Spallières ornementé du gladiateur impitoyable|Arène|Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Plastron lamellaire du gladiateur impitoyable|Arène|Saison 2',
		'Hands2' => 'Gantelets lamellaires du gladiateur impitoyable|Arène|Saison 2',
		'Head2'  => 'Heaume lamellaire du gladiateur impitoyable|Arène|Saison 2',
		'Legs2'  => 'Garde-jambes lamellaire du gladiateur impitoyable|Arène|Saison 2',
		'Shoulder2' => 'Epaulières lamellaire du gladiateur impitoyable|Arène|Saison 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Plastron du gladiateur impitoyable en écailles|Arène|Saison 2',
		'Hands3' => 'Gantelets du gladiateur impitoyable en écailles|Arène|Saison 2',
		'Head3'  => 'Heaume du gladiateur impitoyable en écailles|Arène|Saison 2',
		'Legs3'  => 'Garde-jambes du gladiateur impitoyable en écailles|Arène|Saison 2',
		'Shoulder3' => 'Epaulières du gladiateur impitoyable en écailles|Arène|Saison 2'
);

$lang['ItemSets_Set']['Arena_2']['Démoniste'] = array(
		'Chest1' => 'Robe du gladiateur impitoyable en tisse-effroi|Arène|Saison 2',
		'Hands1' => 'Gants du gladiateur impitoyable en tisse-effroi|Arène|Saison 2',
		'Head1'  => 'Chaperon du gladiateur impitoyable en tisse-effroi|Arène|Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable en tisse-effroi|Arène|Saison 2',
		'Shoulder1' => 'Mantelet du gladiateur impitoyable en tisse-effroi|Arène|Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Grande tenue du gladiateur impitoyable en tisse-gangrène|Arène|Saison 2',
		'Hands2' => 'Garde-mains du gladiateur impitoyable en tisse-gangrène|Arène|Saison 2',
		'Head2'  => 'Capuche du gladiateur impitoyable en tisse-gangrène|Arène|Saison 2',
		'Legs2'  => 'Chausses du gladiateur impitoyable en tisse-gangrène|Arène|Saison 2',
		'Shoulder2' => 'Amict du gladiateur impitoyable en tisse-gangrène|Arène|Saison 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Chasseur'] = array(
		'Chest1' => 'Cotte d\\\'anneaux du gladiateur impitoyable|Arène|Saison 2',
		'Hands1' => 'Gantelets du gladiateur impitoyable|Arène|Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable|Arène|Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable|Arène|Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable|Arène|Saison 2',
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
		'Chest1' => 'Cotte de mailles du gladiateur impitoyable|Arène|Saison 2',
		'Hands1' => 'Gantelets du gladiateur impitoyable en mailles|Arène|Saison 2',
		'Head1'  => 'Heaume du gladiateur impitoyable en mailles|Arène|Saison 2',
		'Legs1'  => 'Jambières du gladiateur impitoyable en mailles|Arène|Saison 2',
		'Shoulder1' => 'Spallières du gladiateur impitoyable en mailles|Arène|Saison 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Armure rivetée du gladiateur impitoyable|Arène|Saison 2',
		'Hands2' => 'Gantelets rivetés du gladiateur impitoyable|Arène|Saison 2',
		'Head2'  => 'Heaume riveté du gladiateur impitoyable|Arène|Saison 2',
		'Legs2'  => 'Jambières rivetées du gladiateur impitoyable|Arène|Saison 2',
		'Shoulder2' => 'Spallières rivetées du gladiateur impitoyable|Arène|Saison 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Armure du gladiateur impitoyable en mailles annelées|Arène|Saison 2',
		'Hands3' => 'Gantelets du gladiateur impitoyable en mailles annelées|Arène|Saison 2',
		'Head3' => 'Heaume du gladiateur impitoyable en mailles annelées|Arène|Saison 2',
		'Legs3'  => 'Jambières du gladiateur impitoyable en mailles annelées|Arène|Saison 2',
		'Shoulder3' => 'Spallières du gladiateur impitoyable en mailles annelées|Arène|Saison 2'
);

?>
