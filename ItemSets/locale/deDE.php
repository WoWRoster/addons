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
 * @version    2.0.3.380
 * @svn        SVN: $Id$
 * @link       http://www.wowroster.net/Forums/viewforum/f=35.html
 * @author     Gorgar, PoloDude, Zeryl, Munazz, Rouven
 * @package    ItemSets
 * @subpackage LanguageFiles
 *
*/

$lang['DropsFrom'] = 'Droppt von ';
$lang['DropsIn'] = 'in ';

//Menu localization
$lang['ItemSets'] = 'Rüstungssets';
$lang['ItemSets_Desc'] = 'Zeigt eine Liste alle Member ab einem definierten Level mit Klassenset Gegenständen';
$lang['All_Classes'] = 'Alle Klassen';

// Admin localization
$lang['admin']['defaultset'] = 'Standard Seite|Gib das Standard Set an';
$lang['admin']['itemsets_lvl'] = 'Mindestlevel|Zeigt Charaktere mit diesem Mindestlevel';
$lang['admin']['itemsets_conf'] = 'Rüstungsset';

// Class definition (female->male)
$lang['classes']['Name'] = array(
	'Kriegerin' => 'Krieger',
	'Priesterin' => 'Priester',
	'Druidin' => 'Druide',
	'Schurkin' => 'Schurke',
	'Magierin' => 'Magier',
	'Paladin' => 'Paladin',
	'Hexenmeisterin' => 'Hexenmeister',
	'Jägerin' => 'Jäger',
	'Schamanin' => 'Schamane'
);

//Tier localization
$lang['Dungeon_1'] = 'Dungeon Set 1';
$lang['Dungeon_2'] = 'Dungeon Set 2';
$lang['Dungeon_3'] = 'Dungeon Set 3';
$lang['Tier_1'] = 'Tier 1 Raid';
$lang['Tier_2'] = 'Tier 2 Raid';
$lang['Tier_3'] = 'Tier 3 Raid';
$lang['Tier_4'] = 'Tier 4 Raid';
$lang['Tier_5'] = 'Tier 5 Raid';
$lang['Tier_6'] = 'Tier 6 Raid';
$lang['ZG'] = 'Zul\'Gurub';
$lang['AQ20'] = 'Ruinen von Ahn\'Qiraj';
$lang['AQ40'] = 'Tempel von Ahn\'Qiraj';
$lang['PVP_Rare'] = 'PvP - Selten';
$lang['PVP_Epic'] = 'PvP - Episch';
$lang['PVP_Level70'] = 'PvP - Level 70';
$lang['Arena_1'] = 'Arena Gladiator Season 1';
$lang['Arena_2'] = 'Arena Gladiator Season 2';
$lang['Arena_3'] = 'Arena Gladiator Season 3';

// header localisations
$lang['Name'] = 'Name';
$lang['Waist'] = 'Taille';
$lang['Feet'] = 'Füße';
$lang['Wrists'] = 'Armsch.';
$lang['Chest'] = 'Brust';
$lang['Hands'] = 'Hände';
$lang['Head'] = 'Kopf';
$lang['Legs'] = 'Beine';
$lang['Shoulder'] = 'Schult.';
$lang['Finger'] = 'Finger';
$lang['Neck'] = 'Hals';
$lang['Trinket'] = 'Schmuck';
$lang['Mainhand'] = 'Waffenh.';
$lang['Back'] = 'Rücken';
$lang['Separator'] = ' ';

//// Names
// Dungeon Sets 
$lang['ItemSets_Set']['Dungeon_1']['Name'] = array(
	'Krieger' => 'Schlachtrüstung der Ehre',
	'Priester' => 'Gewänder des Gläubigen',
	'Druide' => 'Herz der Wildnis',
	'Schurke' => 'Rüstung der Schattenkunst',
	'Magier' => 'Ornat des Magisters',
	'Paladin' => 'Esse des Lichts',
	'Hexenmeister' => 'Nebel der Furcht',
	'Jäger' => 'Rüstung des Bestienjägers',
	'Schamane' => 'Die Elemente'
    );
$lang['ItemSets_Set']['Dungeon_2']['Name'] = array(
	'Krieger' => 'Schlachtrüstung des Heldentums',
	'Priester' => 'Gewänder des Tugendhaften',
	'Druide' => 'Ungezähmtes Herz',
	'Schurke' => 'Rüstung der Finsternis',
	'Magier' => 'Ornat der Zauberkünste',
	'Paladin' => 'Rüstung der Seelenschmiede',
	'Hexenmeister' => 'Roben des Todesnebels',
	'Jäger' => 'Rüstung der Tierherrschaft',
	'Schamane' => 'Die fünf Donner'
    );
$lang['ItemSets_Set']['Dungeon_3']['Name'] = array(
	'Krieger' => 'Rüstung des Wagemutigen|Verdammnisplattenrüstung',
	'Priester' => 'Geheiligte Roben|Managetränktes Ornat',
	'Druide' => 'Gewandung der Mondlichtung|Ödniswandlerrüstung',
	'Schurke' => 'Rüstung des Meuchelmords|Ödniswandlerrüstung',
	'Magier' => 'Ornat des Beschwörens|Managetränktes Ornat',
	'Paladin' => 'Rüstung des Rechtschaffenen|Verdammnisplattenrüstung',
	'Hexenmeister' => 'Gewandung des Vergessens|Managetränktes Ornat',
	'Jäger' => 'Rüstung des Wildtierfürsten|Schlachtrüstung der Verwüstung',
	'Schamane' => 'Gewandung des Gezeitensturms|Schlachtrüstung der Verwüstung'
    );	   

// Raid Sets
$lang['ItemSets_Set']['Tier_1']['Name'] = array(
	'Krieger' => 'Schlachtrüstung der Macht',
	'Priester' => 'Gewänder der Prophezeiung',
	'Druide' => 'Gewänder des Cenarius',
	'Schurke' => 'Der Nachtmeuchler',
	'Magier' => 'Ornat des Arkanisten',
	'Paladin' => 'Rüstung  der Gerechtigkeit',
	'Hexenmeister' => 'Teufelsherzroben',
	'Jäger' => 'Rüstung des Riesenjägers',
	'Schamane' => 'Die Wut der Erde'
    );
$lang['ItemSets_Set']['Tier_2']['Name'] = array(
	'Krieger' => 'Schlachtrüstung des Zorns',
	'Priester' => 'Gewänder der Erhabenheit',
	'Druide' => 'Gewänder des Sturmgrimm',
	'Schurke' => 'Blutfangrüstung',
	'Magier' => 'Ornat des Netherwinds',
	'Paladin' => 'Rüstung des Richturteils',
	'Hexenmeister' => 'Roben der Nemesis',
	'Jäger' => 'Rüstung des Drachenjägers',
	'Schamane' => 'Die Zehn Stürme'
    );
$lang['ItemSets_Set']['Tier_3']['Name'] = array(
	'Krieger' => 'Schlachtrüstung des Schreckenspanzers',
	'Priester' => 'Gewänder der Glaubens',
	'Druide' => 'Gewandung des Traumwandlers',
	'Schurke' => 'Rüstung der Knochensense',
	'Magier' => 'Frostfeuerornat',
	'Paladin' => 'Rüstung der Erlösung',
	'Hexenmeister' => 'Roben des verseuchten Herzens',
	'Jäger' => 'Rüstung des Gruftpirschers',
	'Schamane' => 'Der Erdspalter'
    );
$lang['ItemSets_Set']['Tier_4']['Name'] = array(
	'Krieger' => 'Schlachtrüstung des Kriegshetzers (Waffen/Furor)|Rüstung des Kriegshetzers (Schutz)',
	'Priester' => 'Gewandung des Leibhaftigen (Heilung)|Ornat des Leibhaftigen (Schatten)',
	'Druide' => 'Malornes Ornat (Moonkin)|Malornes Harnisch (Kampf)|Malornes Gewandung (Heilung)',
	'Schurke' => 'Netherklinge',
	'Magier' => 'Ornat der Aldor',
	'Paladin' => 'Gewandung des Rechtsprechers (Heilung)|Rüstung des Rechtsprechers (Schutz)|Schlachtrüstung des Rechtsprechers (Vergeltung)',
	'Hexenmeister' => 'Gewandung des Herzens',
	'Jäger' => 'Rüstung des Dämonenwandlers',
	'Schamane' => 'Ornat des Orkans (Elementar) |Harnisch des Orkans (Verstärkung)|Gewandung des Orkans (Heilung)'
    );	   	
$lang['ItemSets_Set']['Tier_5']['Name'] = array(
	'Krieger' => 'Schlachtrüstung des Zerstörers (Waffen/Furor)|Rüstung des Zerstörers (Schutz)',
	'Priester' => 'Gewandung des Avatars (Heilung)|Ornat des Avatars (Schatten)',
	'Druide' => 'Ornat von Nordrassil (Moonkin)|Harnisch von Nordrassil (Kampf)|Gewandung von Nordrassil (Heilung)',
	'Schurke' => 'Todeshauch',
	'Magier' => 'Ornat von Tirisfal',
	'Paladin' => 'Kristallgeschmiedete Gewandung (Heilung)|Kristallgeschmiedete Rüstung (Schutz)|Kristallgeschmiedete Schlachtrüstung (Vergeltung)',
	'Hexenmeister' => 'Gewandung des Verderbers',
	'Jäger' => 'Rüstung des Dimensionswandlers',
	'Schamane' => 'Ornat der Verheerung (Elementar) |Harnisch der Verheerung (Verstärkung)|Gewandung der Verheerung (Heilung)'
    );	   	
$lang['ItemSets_Set']['Tier_6']['Name'] = array(
	'Krieger' => 'Schlachtrüstung des Ansturms (Waffen/Furor)|Rüstung des Ansturms (Schutz)',
	'Priester' => 'Gewänder der Absolution (Heilung)|Ornat der Absolution (Schatten)',
	'Druide' => 'Ornat des Donnerherzens (Moonkin)|Harnisch des Donnerherzens (Kampf)|Gewandung des Donnerherzens (Heilung)',
	'Schurke' => 'Rüstung des Schlächters',
	'Magier' => 'Ornat des Gewittersturms',
	'Paladin' => 'Gewandung des Lichtbringers (Heilung)|Rüstung des Lichtbringers (Schutz)|Schlachtrüstung des Lichtbringers (Vergeltung)',
	'Hexenmeister' => 'Gewandung der Boshaftigkeit',
	'Jäger' => 'Rüstung des Gronnpirschers',
	'Schamane' => 'Ornat des Himmelsdonners (Elementar) |Harnisch des Himmelsdonners (Verstärkung)|Gewandung des Himmelsdonners (Heilung)'
    );	   	

// PvP Sets
$lang['ItemSets_Set']['PVP_Rare']['Name'] = array(
        'Krieger' => 'Sturmrüstung',
        'Priester' => 'Würdengewand',
        'Druide' => 'Haingewand',
        'Schurke' => 'Gewänder',
        'Magier' => 'Arkanum',
        'Paladin' => 'Zeremonienrüstung',
        'Hexenmeister' => 'Schreckensrüstung',
        'Jäger' => 'Jagdrüstung',
        'Schamane' => 'Sturmornat'
    );
$lang['ItemSets_Set']['PVP_Epic']['Name'] = array(
        'Krieger' => 'Schlachtrüstung',
        'Priester' => 'Roben',
        'Druide' => 'Zierat',
        'Schurke' => 'Gewänder',
        'Magier' => 'Ornat',
        'Paladin' => 'Aegis',
        'Hexenmeister' => 'Roben',
        'Jäger' => 'Lohn',
        'Schamane' => 'Erderschütterer'
    );
$lang['ItemSets_Set']['PVP_Level70']['Name'] = array(
        'Krieger' => 'Schlachtrüstung',
        'Priester' => 'Vereidigung (Heilung)|Gewandung (Schatten)',
        'Druide' => 'Zuflucht (Heilung)|Schutzgewandung (Kampf)|Wildfell (Moonkin)',
        'Schurke' => 'Gewänder',
        'Magier' => 'Ornat',
        'Paladin' => 'Aegis (Schutz)|Erlösung (Heilung)|Rechtschaffenheit (Vergeltung)',
        'Hexenmeister' => 'Schreckensrüstung',
        'Jäger' => 'Jagdtracht',
        'Schamane' => 'Erderschütterer (Verstärkung)|Donnerfaust (Elementar)|Kriegsrausch (Heilung)'
    );

// Arena Sets
$lang['ItemSets_Set']['Arena_1']['Name'] = array(
        'Krieger' => 'Schlachtrüstung des Gladiators',
        'Priester' => 'Vereidigung des Gladiators (Heilung)|Gewandung des Gladiators (Schatten)',
        'Druide' => 'Zuflucht des Gladiators (Heilung)|Schutzgewandung des Gladiators (Kampf)|Wildfell des Gladiators (Moonkin)',
        'Schurke' => 'Gewänder des Gladiators',
        'Magier' => 'Ornat des Gladiators',
        'Paladin' => 'Aegis des Gladiators (Schutz)|Erlösung des Gladiators (Heilung)|Rechtschaffenheit des Gladiators (Vergeltung)',
        'Hexenmeister' => 'Schreckensrüstung des Gladiators|Teufelsschleier des Gladiators',
        'Jäger' => 'Jagdtracht des Gladiators',
        'Schamane' => 'Erderschütterer des Gladiators (Verstärkung)|Donnerfaust des Gladiators (Elementar)|Kriegsrausch des Gladiators (Heilung)'
    );
$lang['ItemSets_Set']['Arena_2']['Name'] = array(
        'Krieger' => 'Schlachtrüstung des erbarmungslosen Gladiators',
        'Priester' => 'Vereidigung des erbarmungslosen Gladiators (Heilung)|Gewandung des erbarmungslosen Gladiators (Schatten)',
        'Druide' => 'Zuflucht des erbarmungslosen Gladiators (Heilung)|Schutzgewandung des erbarmungslosen Gladiators (Kampf)|Wildfell des erbarmungslosen Gladiators (Moonkin)',
        'Schurke' => 'Gewänder des erbarmungslosen Gladiators',
        'Magier' => 'Ornat des erbarmungslosen Gladiators',
        'Paladin' => 'Aegis des erbarmungslosen Gladiators (Schutz)|Erlösung des erbarmungslosen Gladiators (Heilung)|Rechtschaffenheit des erbarmungslosen Gladiators (Vergeltung)',
        'Hexenmeister' => 'Schreckensrüstung des erbarmungslosen Gladiators|Teufelsschleier des erbarmungslosen Gladiators',
        'Jäger' => 'Jagdtracht des erbarmungslosen Gladiators',
        'Schamane' => 'Erderschütterer des erbarmungslosen Gladiators (Verstärkung)|Donnerfaust des erbarmungslosen Gladiators (Elementar)|Kriegsrausch des erbarmungslosen Gladiators (Heilung)'
    );
$lang['ItemSets_Set']['Arena_3']['Name'] = array(
        'Krieger' => 'Schlachtrüstung des rachsüchtigen Gladiators',
        'Priester' => 'Vereidigung des rachsüchtigen Gladiators (Heilung)|Gewandung des rachsüchtigen Gladiators (Schatten)',
        'Druide' => 'Zuflucht des rachsüchtigen Gladiators (Heilung)|Schutzgewandung des rachsüchtigen Gladiators (Kampf)|Wildfell des rachsüchtigen Gladiators (Moonkin)',
        'Schurke' => 'Gewänder des rachsüchtigen Gladiators',
        'Magier' => 'Ornat des rachsüchtigen Gladiators',
        'Paladin' => 'Aegis des rachsüchtigen Gladiators (Schutz)|Erlösung des rachsüchtigen Gladiators (Heilung)|Rechtschaffenheit des rachsüchtigen Gladiators (Vergeltung)',
        'Hexenmeister' => 'Schreckensrüstung des rachsüchtigen Gladiators|Teufelsschleier des rachsüchtigen Gladiators',
        'Jäger' => 'Jagdtracht des rachsüchtigen Gladiators',
        'Schamane' => 'Erderschütterer des rachsüchtigen Gladiators (Verstärkung)|Donnerfaust des rachsüchtigen Gladiators (Elementar)|Kriegsrausch des rachsüchtigen Gladiators (Heilung)'
    );

// Special Sets
$lang['ItemSets_Set']['AQ20']['Name'] = array(
		'Krieger' => 'Schlachtrüstung der unnachgiebigen Stärke',
		'Priester' => 'Pracht der unendlichen Weisheit',
		'Druide' => 'Symbole des endlosen Lebens',
		'Schurke' => 'Embleme der Schattenschleier',
		'Magier' => 'Zierat der behüteten Geheimnisse',
		'Paladin' => 'Schlachtrüstung der ewigen Gerechtigkeit',
		'Hexenmeister' => 'Ritualroben der ungesagten Namen',
		'Jäger' => 'Zierat des unsichtbaren Pfads',
		'Schamane' => 'Gabe der aufziehenden Stürme'
    );
$lang['ItemSets_Set']['AQ40']['Name'] = array(
		'Krieger' => 'Schlachtrüstung des Eroberers',
		'Priester' => 'Gewänder des Orakels',
		'Druide' => 'Gewandung der Genesis',
		'Schurke' => 'Umarmung des Todesboten',
		'Magier' => 'Gewänder des Mysteriums',
		'Paladin' => 'Schlachtrüstung des Rächers',
		'Hexenmeister' => 'Roben des Verdammnisrufers',
		'Jäger' => 'Gewand des Hetzers',
		'Schamane' => 'Gewand des Sturmrufers'
    );
$lang['ItemSets_Set']['ZG']['Name'] = array(
	        'Krieger' => 'Schlachtrüstung des Vollstreckers',
	        'Priester' => 'Gewandung des Glaubenshüters',
    		'Druide' => 'Gewand des Haruspex',
	        'Schurke' => 'Rüstzeug des Wildfangs',
	        'Magier' => 'Roben des Illusionisten',
    		'Paladin' => 'Rüstung des Freidenkers',
	        'Hexenmeister' => 'Roben des Besessenen',
	        'Jäger' => 'Rüstung des Raubtiers',
    		'Schamane' => 'Ornat des Weissagers'
    );

	
// Dungeon Set 1	
$lang['ItemSets_Set']['Dungeon_1']['Krieger'] = array(
		'Waist' => 'Gürtel der Ehre|Hochlord Omokk|Untere Blackrockspitze',
		'Feet' => 'Stiefel der Ehre|Kirtonos der Herold|Scholomance',
		'Wrist' => 'Armschienen der Ehre|Random-Drop|Blackrockspitze',
		'Chest' => 'Brustplatte der Ehre|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Stulpen der Ehre|Ramstein der Verschlinger|Stratholme Ost',
		'Head' => 'Helm der Ehre|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Beinplatten der Ehre|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Schiftung der Ehre|Kriegshäuptling Rend Blackhand|Obere Blackrockspitze'
	);
$lang['ItemSets_Set']['Dungeon_1']['Priester'] = array(
		'Waist' => 'Gürtel des Gläubigen|Random-Drop|Blackrockspitze',
		'Feet' => 'Sandalen des Gläubigen|Maleki der Leichenblasse|Stratholme Ost',
		'Wrist' => 'Armschienen des Gläubigen|Random-Drop|Stratholme',
		'Chest' => 'Robe des Gläubigen|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Handschuhe des Gläubigen|Archivar Galford|Stratholme West',
		'Head' => 'Krone des Gläubigen|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Rock des Gläubigen|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Mantel des Gläubigen|Solakar Feuerkrone|Obere Blackrockspitze'
	);
$lang['ItemSets_Set']['Dungeon_1']['Druide'] = array(
		'Waist' => 'Gürtel des Wildherzens|Random-Drop|Scholomance',
		'Feet' => 'Stiefel des Wildherzens|Mutter Glimmernetz|Untere Blackrockspitze',
		'Wrist' => 'Armschienen des Wildherzens|Random-Drop|Stratholme',
		'Chest' => 'Weste des Wildherzens|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Handschuhe des Wildherzens|Random-Drop|Blackrockspitze',
		'Head' => 'Kutte des Wildherzens|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Kilt des Wildherzens|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Schiftung des Wildherzens|Gizrul der Sklavenhalter|Untere Blackrockspitze'
	);
$lang['ItemSets_Set']['Dungeon_1']['Schurke'] = array(
		'Waist' => 'Gürtel der Schattenkunst|Random-Drop|Blackrockspitze',
		'Feet' => 'Stiefel der Schattenkunst|Rattlegore|Scholomance',
		'Wrist' => 'Armschienen der Schattenkunst|Random-Drop|Scholomance',
		'Chest' => 'Tunika der Schattenkunst|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Handschuhe der Schattenkunst|Schattenjägerin Vosh\\\'gajin|Untere Blackrockspitze',
		'Head' => 'Kappe der Schattenkunst|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Hose der Schattenkunst|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Schiftung der Schattenkunst|Kanonenmeister Willey|Stratholme West'
	);
$lang['ItemSets_Set']['Dungeon_1']['Magier'] = array(
		'Waist' => 'Gürtel des Magisters|Random-Drop|Stratholme + Blackrockspitze',
		'Feet' => 'Stiefel des Magisters|Postmeister Malown|Stratholme West',
		'Wrist' => 'Bindungen des Magisters|Random-Drop|Blackrockspitze',
		'Chest' => 'Roben des Magisters|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Handschuhe des Magisters|Random-Drop|Scholomance',
		'Head' => 'Krone des Magisters|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Gamaschen des Magisters|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Mantel des Magisters|Ras Frostwhisper|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Paladin'] = array(
		'Waist' => 'Gürtel des Lichts|Random-Drop|Stratholme',
		'Feet' => 'Stiefel des Lichts|Balnazzar|Stratholme West',
		'Wrist' => 'Armschienen des Lichts|Random-Drop|Scholomance',
		'Chest' => 'Brustplatte des Lichts|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Stulpen des Lichts|Imperator Dagran Thaurissan|Blackrocktiefen',
		'Head' => 'Helm des Lichts|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Beinplatten des Lichts|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Schiftung des Lichts|Die Bestie|Obere Blackrockspitze'
	);
$lang['ItemSets_Set']['Dungeon_1']['Hexenmeister'] = array(
		'Waist' => 'Gürtel der Furcht|Random-Drop|Stratholme',
		'Feet' => 'Sandalen der Furcht|Baroness Anastari|Stratholme Ost',
		'Wrist' => 'Armschienen der Furcht|Random-Drop|Blackrockspitze',
		'Chest' => 'Robe der Furcht|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Wickeltücher der Furcht|Random-Drop|Scholomance',
		'Head' => 'Maske der Furcht|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Gamaschen der Furcht|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Mantel der Furcht|Jandice Barov|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Jäger'] = array(
		'Waist' => 'Bestienjägergürtel|Random-Drop|Blackrockspitze',
		'Feet' => 'Bestienjägerstiefel|Nerub\\\'enkan|Stratholme',
		'Wrist' => 'Bestienjägerbindungen|Random-Drop|Stratholme',
		'Chest' => 'Bestienjägertunika|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Bestienjägerhandschuhe|Kriegsmeister Voone|Untere Blackrockspitze',
		'Head' => 'Bestienjägerkappe|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Bestienjägerhose|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Bestienjägermantel|Oberanführer Wyrmthalak|Untere Blackrockspitze'
	);
$lang['ItemSets_Set']['Dungeon_1']['Schamane'] = array(
		'Waist' => 'Kordel der Elemente|Random-Drop|Blackrockspitze',
		'Feet' => 'Stiefel der Elemente|Urok Doomhowl|Untere Blackrockspitze',
		'Wrist' => 'Bindungen der Elemente|Random-Drop|Stratholme',
		'Chest' => 'Weste der Elemente|General Drakkisath|Obere Blackrockspitze',
		'Hands' => 'Stulpen der Elemente|Feuerwache Glutseher|Obere Blackrockspitze',
		'Head' => 'Helmkappe der Elemente|Dunkelmeister Gandling|Scholomance',
		'Legs' => 'Kilt der Elemente|Baron Rivendare|Stratholme Ost',
		'Shoulder' => 'Schulterstücke der Elemente|Gyth|Obere Blackrockspitze'
	);

// Dungeon Set 2
$lang['ItemSets_Set']['Dungeon_2']['Druide'] = array(
		'Waist' => 'Gürtel des ungezähmten Herzens|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Stiefel des ungezähmten Herzens|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Armschienen des ungezähmten Herzens|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Weste des ungezähmten Herzens|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Handschuhe des ungezähmten Herzens|Quest|Die angemessene Entlohnung',
		'Head'  => 'Kutte des ungezähmten Herzens|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Kilt des ungezähmten Herzens|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Schiftung des ungezähmten Herzens|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Jäger'] = array(
		'Waist' => 'Gürtel der Tierherrschaft|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Stiefel der Tierherrschaft|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Bindungen der Tierherrschaft|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Tunika der Tierherrschaft|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Handschuhe der Tierherrschaft|Quest|Die angemessene Entlohnung',
		'Head'  => 'Kappe der Tierherrschaft|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Hose der Tierherrschaft|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Mantel der Tierherrschaft|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Magier'] = array(
		'Waist' => 'Gürtel der Zauberkünste|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Stiefel der Zauberkünste|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Bindungen der Zauberkünste|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Roben der Zauberkünste|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Handschuhe der Zauberkünste|Quest|Die angemessene Entlohnung',
		'Head'  => 'Krone der Zauberkünste|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Gamaschen der Zauberkünste|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Mantel der Zauberkünste|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Paladin'] = array(
		'Waist' => 'Gürtel der Seelenschmiede|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Stiefel der Seelenschmiede|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Armschienen der Seelenschmiede|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Brustplatte der Seelenschmiede|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Stulpen der Seelenschmiede|Quest|Die angemessene Entlohnung',
		'Head'  => 'Helm der Seelenschmiede|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Beinplatten der Seelenschmiede|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Schiftung der Seelenschmiede|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Priester'] = array(
		'Waist' => 'Gürtel des Tugendhaften|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Sandalen des Tugendhaften|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Armschienen des Tugendhaften|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Robe des Tugendhaften|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Handschuhe des Tugendhaften|Quest|Die angemessene Entlohnung',
		'Head'  => 'Krone des Tugendhaften|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Rock des Tugendhaften|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Mantel des Tugendhaften|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Schurke'] = array(
		'Waist' => 'Gürtel der Finsternis|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Stiefel der Finsternis|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Armschienen der Finsternis|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Tunika der Finsternis|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Handschuhe der Finsternis|Quest|Die angemessene Entlohnung',
		'Head'  => 'Kappe der Finsternis|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Hose der Finsternis|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Schiftung der Finsternis|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Schamane'] = array(
		'Waist' => 'Kordel der fünf Donner|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Stiefel der fünf Donner|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Bindungen der fünf Donner|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Weste der fünf Donner|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Stulpen der fünf Donner|Quest|Die angemessene Entlohnung',
		'Head'  => 'Helmkappe der fünf Donner|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Kilt der fünf Donner|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Schulterstücke der fünf Donner|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Hexenmeister'] = array(
		'Waist' => 'Gürtel des Todesnebels|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Sandalen des Todesnebels|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Armschienen des Todesnebels|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Robe des Todesnebels|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Wickeltücher des Todesnebels|Quest|Die angemessene Entlohnung',
		'Head'  => 'Maske des Todesnebels|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Gamaschen des Todesnebels|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Mantel des Todesnebels|Quest|Anthions Abschiedsworte'
);
$lang['ItemSets_Set']['Dungeon_2']['Krieger'] = array(
		'Waist' => 'Gürtel des Heldentums|Quest|Die angemessene Entlohnung',
		'Feet'  => 'Stiefel des Heldentums|Quest|Anthions Abschiedsworte',
		'Wrist' => 'Armschienen des Heldentums|Quest|Ein aufrichtiges Angebot',
		'Chest' => 'Brustplatte des Heldentums|Quest|Das Beste gibt\\\'s zum Schluss',
		'Hands' => 'Stulpen des Heldentums|Quest|Die angemessene Entlohnung',
		'Head'  => 'Helm des Heldentums|Quest|Das Beste gibt\\\'s zum Schluss',
		'Legs'  => 'Beinplatten des Heldentums|Quest|Anthions Abschiedsworte',
		'Shoulder' => 'Schiftung des Heldentums|Quest|Anthions Abschiedsworte'
);

	
// Dungeon Set 3	
$lang['ItemSets_Set']['Dungeon_3']['Krieger'] = array(
		'Chest1' => 'Brustplatte des Wagemutigen|Herold Horizontiss|Arkatraz',
		'Hands1' => 'Stulpen des Wagemutigen|Kriegsherr Kalithresh|Die Dampfkammer',
		'Head1'  => 'Kriegshelm des Wagemutigen|Warpzweig|Botanikum',
		'Legs1'  => 'Beinplatten des Wagemutigen|Aeonus|Der schwarze Morast',
		'Shoulder1' => 'Schulterschutz des Wagemutigen|Murmur|Schattenlabyrinth',
		'Separator1' => '-setname-',
		'Chest2' => 'Verdammnisplattenbrustschutz|Herold Horizontiss|Arkatraz',
		'Hands2' => 'Verdammnisplattenstulpen|Keli\\\'dan der Zerstörer|Der Blutkessel (Heroisch)',
		'Head2'  => 'Verdammnisplattenkriegshelm|Epochenjäger|Vorgebirge des Alten Hügellands (Heroisch)',
		'Legs2'  => 'Verdammnisplattenbeinschützer|Exarch Maladaar|Auchenaikrypta (Heroisch)',
		'Shoulder2' => 'Verdammnisplattenschulterschutz|Die Schattenmutter|Der Tiefensumpf (Heroisch)'
);

$lang['ItemSets_Set']['Dungeon_3']['Priester'] = array(
		'Chest1' => 'Geheiligte Gewänder|Murmur|Schattenlabyrinth',
		'Hands1' => 'Geheiligte Handlappen|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head1'  => 'Geheiligte Krone|Herold Horizontiss|Arkatraz',
		'Legs1'  => 'Geheiligte Beinkleider|Klauenkönig Ikiss|Sethekkhallen',
		'Shoulder1' => 'Geheiligte Schulterstücke|Großmeister Vorpil|Schattenlabyrinth',
		'Separator1' => '-setname-',
		'Chest2' => 'Managetränktes Gewand|Epochenjäger|Vorgebirge des Alten Hügellands (Heroisch)',
		'Hands2' => 'Managetränkte Handschuhe|Omor der Narbenlose|Höllenfeuerbollwerk (Heroisch)',
		'Head2'  => 'Managetränkte Krone|Aeonus|Der Schwarze Morast',
		'Legs2'  => 'Managetränkte Pantalons|Die Schattenmutter|Der Tiefensumpf (Heroisch)',
		'Shoulder2' => 'Managetränkte Schiftung|Quagmirran|Die Sklavenunterkünfte (Heroisch)'
);

$lang['ItemSets_Set']['Dungeon_3']['Druide'] = array(
		'Chest1' => 'Robe der Mondlichtung|Pathaleon der Kalkulator|Mechanar',
		'Hands1' => 'Handlappen der Mondlichtung|Schwarzherz der Hetzer|Schattenlabyrith',
		'Head1'  => 'Kutte der Mondlichtung|Warpzweig|Botanikum',
		'Legs1'  => 'Hose der Mondlichtung|Aeonus|Der Schwarze Morast',
		'Shoulder1' => 'Schultern der Mondlichtung|Kriegsherr Kalithresh|Die Dampfkammer',
		'Separator1' => '-setname-',
		'Chest2' => 'Ödniswandlertunika|Keli\\\'dan der Zerstörer|Der Blutkessel (Heroisch)',
		'Hands2' => 'Ödniswandlerhandschuhe|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head2'  => 'Ödniswandlerhelm|Epochenjäger|Vorgebirge des Alten Hügellands(Heroisch)',
		'Legs2'  => 'Ödniswandlergamaschen|Aeonus|Der Schwarze Morast (Heroisch)',
		'Shoulder2' => 'Ödniswandlerschulterpolster|Kriegsherr Kalithresh|Die Dampfkammer (Heroisch)'		
);

$lang['ItemSets_Set']['Dungeon_3']['Schurke'] = array(
		'Chest1' => 'Tunika des Meuchelmords|Pathaleon der Kalkulator|Mechanar',
		'Hands1' => 'Handschutz des Meuchelmords|Aeonus|Der Schwarze Morast',
		'Head1'  => 'Helm des Meuchelmords|Herold Horizontiss|Arcatraz',
		'Legs1'  => 'Gamaschen des Meuchelmords|Murmur|Schattenlabyrith',
		'Shoulder1' => 'Schulterpolster des Meuchelmords|Klauenkönig Ikiss|Sethekkhallen',
		'Separator1' => '-setname-',
		'Chest2' => 'Ödniswandlertunika|Keli\\\'dan der Zerstörer|Der Blutkessel (Heroisch)',
		'Hands2' => 'Ödniswandlerhandschuhe|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head2'  => 'Ödniswandlerhelm|Epochenjäger|Vorgebirge des Alten Hügellands(Heroisch)',
		'Legs2'  => 'Ödniswandlergamaschen|Aeonus|Der Schwarze Morast (Heroisch)',
		'Shoulder2' => 'Ödniswandlerschulterpolster|Kriegsherr Kalithresh|Die Dampfkammer (Heroisch)'		
);

$lang['ItemSets_Set']['Dungeon_3']['Magier'] = array(
		'Chest1' => 'Robe des Beschwörens|Warpzweig|Botanikum',
		'Hands1' => 'Handschuhe des Beschwörens|Wasserbeschwörerin Thespia|Die Dampfkammer',
		'Head1'  => 'Kutte des Beschwörens|Pathaleon der Kalkulator|Mechanar',
		'Legs1'  => 'Beinkleider des Beschwörens|Klauenkönig Ikiss|Sethekkhallen',
		'Shoulder1' => 'Schulterstücke des Beschwörens|Kriegsherr Kalithresh|Die Dampfkammer',
		'Separator1' => '-setname-',
		'Chest2' => 'Managetränktes Gewand|Epochenjäger|Vorgebirge des Alten Hügellands (Heroisch)',
		'Hands2' => 'Managetränkte Handschuhe|Omor der Narbenlose|Höllenfeuerbollwerk (Heroisch)',
		'Head2'  => 'Managetränkte Krone|Aeonus|Der Schwarze Morast',
		'Legs2'  => 'Managetränkte Pantalons|Die Schattenmutter|Der Tiefensumpf (Heroisch)',
		'Shoulder2' => 'Managetränkte Schiftung|Quagmirran|Die Sklavenunterkünfte (Heroisch)'
);

$lang['ItemSets_Set']['Dungeon_3']['Paladin'] = array(
		'Chest1' => 'Brustplatte des Rechtschaffenen|Kriegsherr Kalithresh|Die Dampfkammer',
		'Hands1' => 'Stulpen des Rechtschaffenen|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head1'  => 'Helm des Rechtschaffenen|Pathaleon der Kalkulator|Mechanar',
		'Legs1'  => 'Beinplatten des Rechtschaffenen|Aeonus|Der schwarze Morast',
		'Shoulder1' => 'Schiftung des Rechtschaffenen|Laj|Botanikum',
		'Separator1' => '-setname-',
		'Chest2' => 'Verdammnisplattenbrustschutz|Herold Horizontiss|Arkatraz',
		'Hands2' => 'Verdammnisplattenstulpen|Keli\\\'dan der Zerstörer|Der Blutkessel (Heroisch)',
		'Head2'  => 'Verdammnisplattenkriegshelm|Epochenjäger|Vorgebirge des Alten Hügellands (Heroisch)',
		'Legs2'  => 'Verdammnisplattenbeinschützer|Exarch Maladaar|Auchenaikrypta (Heroisch)',
		'Shoulder2' => 'Verdammnisplattenschulterschutz|Die Schattenmutter|Der Tiefensumpf (Heroisch)'
);

$lang['ItemSets_Set']['Dungeon_3']['Hexenmeister'] = array(
		'Chest1' => 'Robe des Vergessens|Murmur|Schattenlabyrith',
		'Hands1' => 'Handschuhe des Vergessens|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head1'  => 'Kapuze des Vergessens|Herold Horizontiss|Arcatraz',
		'Legs1'  => 'Beinkleider des Vergessens|Klauenkönig Ikiss|Sethekkhallen',
		'Shoulder1' => 'Schiftung des Vergessens|Murmur|Schattenlabyrith',
		'Separator1' => '-setname-',
		'Chest2' => 'Managetränktes Gewand|Epochenjäger|Vorgebirge des Alten Hügellands (Heroisch)',
		'Hands2' => 'Managetränkte Handschuhe|Omor der Narbenlose|Höllenfeuerbollwerk (Heroisch)',
		'Head2'  => 'Managetränkte Krone|Aeonus|Der Schwarze Morast',
		'Legs2'  => 'Managetränkte Pantalons|Die Schattenmutter|Der Tiefensumpf (Heroisch)',
		'Shoulder2' => 'Managetränkte Schiftung|Quagmirran|Die Sklavenunterkünfte (Heroisch)'	
);


$lang['ItemSets_Set']['Dungeon_3']['Jäger'] = array(
		'Chest1' => 'Kürass des Wildtierfürsten|Warpzweig|Botanica',
		'Hands1' => 'Handschützer des Wildtierfürsten|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head1'  => 'Helm des Wildtierfürsten|Pathaleon der Kalkulator|Mechanar',
		'Legs1'  => 'Gamaschen des Wildtierfürsten|Kriegsherr Kalithresh|Die Dampfkammer',
		'Shoulder1' => 'Mantelung des Wildtierfürsten|Kriegsherr Kalithresh|Die Dampfkammer',
		'Separator1' => '-setname-',
		'Chest2' => 'Halsberge der Verwüstung|Epochenjäger|Vorgebirge des Alten Hügellands (Heroisch)',
		'Hands2' => 'Stulpen der Verwüstung|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head2'  => 'Helm der Verwüstung|Aeonus|Der Schwarze Morast',
		'Legs2'  => 'Schienbeinschützer der Verwüstung|Klauenkönig Ikiss|Sethekkhallen',
		'Shoulder2' => 'Schulterstücke der Verwüstung|Quagmirran|Sklavenunterkünfte (Heroisch)'
);

$lang['ItemSets_Set']['Dungeon_3']['Schamane'] = array(
		'Chest1' => 'Brustharnisch des Gezeitensturms|Herold Horizontiss|Arcatraz',
		'Hands1' => 'Stulpen des Gezeitensturms|Kriegsherr Kalithresh|Die Dampfkammer',
		'Head1'  => 'Helm des Gezeitensturms|Warpzweig|Botanikum',
		'Legs1'  => 'Kilt des Gezeitensturms|Murmur|Schattenlabyrith',
		'Shoulder1' => 'Schulterschutz des Gezeitensturms|Kriegshetzer O\\\'mrogg|Die zerschmetterten Hallen',
		'Separator1' => '-setname-',
		'Chest2' => 'Halsberge der Verwüstung|Epochenjäger|Vorgebirge des Alten Hügellands (Heroisch)',
		'Hands2' => 'Stulpen der Verwüstung|Kriegshäuptling Kargath Messerfaust|Die zerschmetterten Hallen',
		'Head2'  => 'Helm der Verwüstung|Aeonus|Der Schwarze Morast',
		'Legs2'  => 'Schienbeinschützer der Verwüstung|Klauenkönig Ikiss|Sethekkhallen',
		'Shoulder2' => 'Schulterstücke der Verwüstung|Quagmirran|Sklavenunterkünfte (Heroisch)'	
);


// Raid Tier 1 Set
$lang['ItemSets_Set']['Tier_1']['Krieger'] = array(
		'Waist' => 'Gürtel der Macht|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Sabatons der Macht|Gehennas|Geschmolzener Kern',
		'Wrist' => 'Armschienen der Macht|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Brustplatte der Macht|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Stulpen der Macht|Lucifron|Geschmolzener Kern',
		'Head' => 'Helm der Macht|Garr|Geschmolzener Kern',
		'Legs' => 'Beinplatten der Macht|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Schulterstücke der Macht|Sulfuron-Herold|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Priester'] = array(
		'Waist' => 'Gurt der Prophezeiung|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Stiefel der Prophezeiung|Shazzrah|Geschmolzener Kern',
		'Wrist' => 'Unterarmschienen der Prophezeiung|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Roben der Prophezeiung|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Handschuhe der Prophezeiung|Gehennas|Geschmolzener Kern',
		'Head' => 'Reif der Prophezeiung|Garr|Geschmolzener Kern',
		'Legs' => 'Hose der Prophezeiung|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Mantel der Prophezeiung|Sulfuron-Herold|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Druide'] = array(
		'Waist' => 'Gürtel des Cenarius|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Stiefel des Cenarius|Lucifron|Geschmolzener Kern',
		'Wrist' => 'Armschienen des Cenarius|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Gewand des Cenarius|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Handschuhe des Cenarius|Shazzrah|Geschmolzener Kern',
		'Head' => 'Helm des Cenarius|Garr|Geschmolzener Kern',
		'Legs' => 'Gamaschen des Cenarius|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Schiftung des Cenarius|Baron Geddon|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Schurke'] = array(
		'Waist' => 'Gürtel des Nachtmeuchlers|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Stiefel des Nachtmeuchlers|Shazzrah|Geschmolzener Kern',
		'Wrist' => 'Armreifen des Nachtmeuchlers|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Brustharnisch des Nachtmeuchlers|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Handschuhe des Nachtmeuchlers|Gehennas|Geschmolzener Kern',
		'Head' => 'Kopfschutz des Nachtmeuchlers|Garr|Geschmolzener Kern',
		'Legs' => 'Hose des Nachtmeuchlers|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Schulterklappen des Nachtmeuchlers|Sulfuron-Herold|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Magier'] = array(
		'Waist' => 'Gürtel des Arkanisten|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Stiefel des Arkanisten|Gehennas|Geschmolzener Kern',
		'Wrist' => 'Bindungen des Arkanisten|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Roben des Arkanisten|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Handschuhe des Arkanisten|Shazzrah|Geschmolzener Kern',
		'Head' => 'Krone des Arkanisten|Garr|Geschmolzener Kern',
		'Legs' => 'Gamaschen des Arkanisten|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Mantel des Arkanisten|Baron Geddon|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Paladin'] = array(
		'Waist' => 'Gürtel der Gerechtigkeit|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Stiefel der Gerechtigkeit|Lucifron|Geschmolzener Kern',
		'Wrist' => 'Armschienen der Gerechtigkeit|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Brustschutz der Gerechtigkeit|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Stulpen der Gerechtigkeit|Gehennas|Geschmolzener Kern',
		'Head' => 'Helm der Gerechtigkeit|Garr|Geschmolzener Kern',
		'Legs' => 'Beinplatten der Gerechtigkeit|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Schiftung der Gerechtigkeit|Baron Geddon|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Hexenmeister'] = array(
		'Waist' => 'Teufelsherzgürtel|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Teufelsherzschuhe|Gehennas|Geschmolzener Kern',
		'Wrist' => 'Teufelsherzarmschienen|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Teufelsherzroben|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Teufelsherzhandschuhe|Shazzrah|Geschmolzener Kern',
		'Head' => 'Teufelsherzhörner|Garr|Geschmolzener Kern',
		'Legs' => 'Teufelsherzhose|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Teufelsherzschulterpolster|Baron Geddon|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Jäger'] = array(
		'Waist' => 'Gürtel des Riesenjägers|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Stiefel des Riesenjägers|Gehennas|Geschmolzener Kern',
		'Wrist' => 'Armschienen des Riesenjägers|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Brustplatte des Riesenjägers|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Handschuhe des Riesenjägers|Shazzrah|Geschmolzener Kern',
		'Head' => 'Helm des Riesenjägers|Garr|Geschmolzener Kern',
		'Legs' => 'Gamaschen des Riesenjägers|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Schulterklappen des Riesenjägers|Sulfuron-Herold|Geschmolzener Kern'
	);
$lang['ItemSets_Set']['Tier_1']['Schamane'] = array(
		'Waist' => 'Gürtel der Erdenwut|Random-Drop|Geschmolzener Kern',
		'Feet' => 'Stiefel der Erdenwut|Lucifron|Geschmolzener Kern',
		'Wrist' => 'Armschienen der Erdenwut|Random-Drop|Geschmolzener Kern',
		'Chest' => 'Gewand der Erdenwut|Golemagg der Verbrenner|Geschmolzener Kern',
		'Hands' => 'Stulpen der Erdenwut|Gehennas|Geschmolzener Kern',
		'Head' => 'Helm der Erdenwut|Garr|Geschmolzener Kern',
		'Legs' => 'Beinschützer der Erdenwut|Magmadar|Geschmolzener Kern',
		'Shoulder' => 'Schulterklappen der Erdenwut|Baron Geddon|Geschmolzener Kern'
	);
	
// Raid Tier 2 Set
$lang['ItemSets_Set']['Tier_2']['Krieger'] = array(
		'Waist' => 'Gürtelbund des Zorns|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Sabatons des Zorns|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Armreifen des Zorns|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Brustplatte des Zorns|Nefarian|Pechschwingenhort',
		'Hands' => 'Stulpen des Zorns|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Helm des Zorns|Onyxia|Onyxias Hort',
		'Legs' => 'Beinplatten des Zorns|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Schulterstücke des Zorns|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Priester'] = array(
		'Waist' => 'Gürtel der Erhabenheit|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Stiefel der Erhabenheit|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Bindungen der Erhabenheit|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Roben der Erhabenheit|Nefarian|Pechschwingenhort',
		'Hands' => 'Handschützer der Erhabenheit|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Heiligenschein der Erhabenheit|Onyxia|Onyxias Hort',
		'Legs' => 'Gamaschen der Erhabenheit|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Schulterstücke der Erhabenheit|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Druide'] = array(
		'Waist' => 'Gürtel des Stormrage|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Stiefel des Stormrage|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Armschienen des Stormrage|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Brustschutz des Stormrage|Nefarian|Pechschwingenhort',
		'Hands' => 'Handschützer des Stormrage|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Bedeckung des Stormrage|Onyxia|Onyxias Hort',
		'Legs' => 'Beinschützer des Stormrage|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Schulterstücke des Stormrage|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Schurke'] = array(
		'Waist' => 'Blutfanggürtel|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Blutfangstiefel|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Blutfangarmschienen|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Blutfangbrustharnisch|Nefarian|Pechschwingenhort',
		'Hands' => 'Blutfanghandschuhe|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Blutfangkapuze|Onyxia|Onyxias Hort',
		'Legs' => 'Blutfanghose|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Blutfangschiftung|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Magier'] = array(
		'Waist' => 'Gürtel des Netherwinds|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Stiefel des Netherwinds|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Bindungen des Netherwinds|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Roben des Netherwinds|Nefarian|Pechschwingenhort',
		'Hands' => 'Handschuhe des Netherwinds|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Krone des Netherwinds|Onyxia|Onyxias Hort',
		'Legs' => 'Hose des Netherwinds|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Mantel des Netherwinds|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Paladin'] = array(
		'Waist' => 'Gürtel des Richturteils|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Sabatons des Richturteils|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Bindungen des Richturteils|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Brustplatte des Richturteils|Nefarian|Pechschwingenhort',
		'Hands' => 'Stulpen des Richturteils|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Krone des Richturteils|Onyxia|Onyxias Hort',
		'Legs' => 'Beinplatten des Richturteils|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Schiftung des Richturteils|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Hexenmeister'] = array(
		'Waist' => 'Gürtel der Nemesis|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Stiefel der Nemesis|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Armschienen der Nemesis|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Roben der Nemesis|Nefarian|Pechschwingenhort',
		'Hands' => 'Handschuhe der Nemesis|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Schädelkappe der Nemesis|Onyxia|Onyxias Hort',
		'Legs' => 'Gamaschen der Nemesis|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Schiftung der Nemesis|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Jäger'] = array(
		'Waist' => 'Gürtel des Drachenjägers|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Schienbeinschützer des Drachenjägers|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Armschienen des Drachenjägers|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Brustplatte des Drachenjägers|Nefarian|Pechschwingenhort',
		'Hands' => 'Stulpen des Drachenjägers|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Helm des Drachenjägers|Onyxia|Onyxias Hort',
		'Legs' => 'Beinschützer des Drachenjägers|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Schiftung des Drachenjägers|Chromaggus|Pechschwingenhort'
	);
$lang['ItemSets_Set']['Tier_2']['Schamane'] = array(
		'Waist' => 'Gürtel der zehn Stürme|Vaelastrasz der Verdorbene|Pechschwingenhort',
		'Feet' => 'Schienbeinschützer der zehn Stürme|Brutlord Lashlayer|Pechschwingenhort',
		'Wrist' => 'Armschienen der zehn Stürme|Razorgore der Ungezähmte|Pechschwingenhort',
		'Chest' => 'Brustplatte der zehn Stürme|Nefarian|Pechschwingenhort',
		'Hands' => 'Stulpen der zehn Stürme|Feuerschwinge+Schattenschwinge+Flammenmaul|Pechschwingenhort',
		'Head' => 'Helm der zehn Stürme|Onyxia|Onyxias Hort',
		'Legs' => 'Beinplatten der zehn Stürme|Ragnaros|Geschmolzener Kern',
		'Shoulder' => 'Schulterklappen der zehn Stürme|Chromaggus|Pechschwingenhort'
	);
	
// Raid Tier 3 Set
$lang['ItemSets_Set']['Tier_3']['Krieger'] = array(
		'Waist' => 'Taillenschutz des Schreckenspanzers|MOB|LOCATION',
		'Feet' => 'Sabatons des Schreckenspanzers|MOB|LOCATION',
		'Wrist' => 'Armschienen des Schreckenspanzers|MOB|LOCATION',
		'Chest' => 'Brustplatte des Schreckenspanzers|MOB|LOCATION',
		'Hands' => 'Stulpen des Schreckenspanzers|MOB|LOCATION',
		'Head' => 'Helm des Schreckenspanzers|MOB|LOCATION',
		'Legs' => 'Beinplatten des Schreckenspanzers|MOB|LOCATION',
		'Shoulder' => 'Schulterntucke des Schreckenspanzers|MOB|LOCATION',
		'Finger' => 'Ring des Schreckenspanzers|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Priester'] = array(
		'Waist' => 'Gürtel des Glaubens|MOB|LOCATION',
		'Feet' => 'Sandalen des Glaubens|MOB|LOCATION',
		'Wrist' => 'Bindungen des Glaubens|MOB|LOCATION',
		'Chest' => 'Robe des Glaubens|MOB|LOCATION',
		'Hands' => 'Handschuhe des Glaubens|MOB|LOCATION',
		'Head' => 'Reif des Glaubens|MOB|LOCATION',
		'Legs' => 'Gamaschen des Glaubens|MOB|LOCATION',
		'Shoulder' => 'Schulterpolster des Glaubens|MOB|LOCATION',
		'Finger' => 'Ring des Glaubens|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Druide'] = array(
		'Waist' => 'Gurt des Traumwandlers|MOB|LOCATION',
		'Feet' => 'Stiefel des Traumwandlers|MOB|LOCATION',
		'Wrist' => 'Armschienensschutz des Traumwandlers|MOB|LOCATION',
		'Chest' => 'Tunika des Traumwandlers|MOB|LOCATION',
		'Hands' => 'Handschützer des Traumwandlers|MOB|LOCATION',
		'Head' => 'Kopfstück des Traumwandlers|MOB|LOCATION',
		'Legs' => 'Beinschützer des Traumwandlers|MOB|LOCATION',
		'Shoulder' => 'Schiftung des Traumwandlers|MOB|LOCATION',
		'Finger' => 'Ring des Traumwandlers|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Schurke'] = array(
		'Waist' => 'Taillenschutz der Knochensense|MOB|LOCATION',
		'Feet' => 'Sabatons der Knochensense|MOB|LOCATION',
		'Wrist' => 'Armschienen der Knochensense|MOB|LOCATION',
		'Chest' => 'Brustplatte der Knochensense|MOB|LOCATION',
		'Hands' => 'Stulpen der Knochensense|MOB|LOCATION',
		'Head' => 'Helm der Knochensense|MOB|LOCATION',
		'Legs' => 'Beinplatten der Knochensense|MOB|LOCATION',
		'Shoulder' => 'Schulterntücke der Knochensense|MOB|LOCATION',
		'Finger' => 'Ring der Knochensense|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Magier'] = array(
		'Waist' => 'Frostfeuergürtel|MOB|LOCATION',
		'Feet' => 'Frostfeuersandalen|MOB|LOCATION',
		'Wrist' => 'Frostfeuerbindungen|MOB|LOCATION',
		'Chest' => 'Frostfeuerrobe|MOB|LOCATION',
		'Hands' => 'Frostfeuerhandschuhe|MOB|LOCATION',
		'Head' => 'Frostfeuerreif|MOB|LOCATION',
		'Legs' => 'Frostfeuergamaschen|MOB|LOCATION',
		'Shoulder' => 'Frostfeuerschulterpolster|MOB|LOCATION',
		'Finger' => 'Frostfeuerring|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Paladin'] = array(
		'Waist' => 'Gurt der Erlösung|MOB|LOCATION',
		'Feet' => 'Stiefel der Erlösung|MOB|LOCATION',
		'Wrist' => 'Armschienensschutz der Erlösung|MOB|LOCATION',
		'Chest' => 'Tunika Armschienensschutz der Erlösung|MOB|LOCATION',
		'Hands' => 'Handschützer der Erlösung|MOB|LOCATION',
		'Head' => 'Kopfstück der Erlösung|MOB|LOCATION',
		'Legs' => 'Beinschützer der Erlösung|MOB|LOCATION',
		'Shoulder' => 'Schiftung der Erlösung|MOB|LOCATION',
		'Finger' => 'Ring der Erlösung|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Hexenmeister'] = array(
		'Waist' => 'Gürtel des verseuchten Herzens|MOB|LOCATION',
		'Feet' => 'Sandalen des verseuchten Herzens|MOB|LOCATION',
		'Wrist' => 'Bindungen des verseuchten Herzens|MOB|LOCATION',
		'Chest' => 'Robe des verseuchten Herzens|MOB|LOCATION',
		'Hands' => 'Handschuhe des verseuchten Herzens|MOB|LOCATION',
		'Head' => 'Reif des verseuchten Herzens|MOB|LOCATION',
		'Legs' => 'Gamaschen des verseuchten Herzens|MOB|LOCATION',
		'Shoulder' => 'Schulterpolster des verseuchten Herzens|MOB|LOCATION',
		'Finger' => 'Ring des verseuchten Herzens|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Jäger'] = array(
		'Waist' => 'Gurt des Gruftpirschers|MOB|LOCATION',
		'Feet' => 'Stiefel des Gruftpirschers|MOB|LOCATION',
		'Wrist' => 'Armschienensschutz des Gruftpirschers|MOB|LOCATION',
		'Chest' => 'Tunika des Gruftpirschers|MOB|LOCATION',
		'Hands' => 'Handschützer des Gruftpirschers|MOB|LOCATION',
		'Head' => 'Kopfstück des Gruftpirschers|MOB|LOCATION',
		'Legs' => 'Beinschützer des Gruftpirschers|MOB|LOCATION',
		'Shoulder' => 'Schiftung des Gruftpirschers|MOB|LOCATION',
		'Finger' => 'Ring des Gruftpirschers|MOB|LOCATION'
	);
$lang['ItemSets_Set']['Tier_3']['Schamane'] = array(
		'Waist' => 'Gurt des Erdspalters|MOB|LOCATION',
		'Feet' => 'Stiefel des Erdspalters|MOB|LOCATION',
		'Wrist' => 'Armschienensschutz des Erdspalters|MOB|LOCATION',
		'Chest' => 'Tunika des Erdspalters|MOB|LOCATION',
		'Hands' => 'Handschützer des Erdspalters|MOB|LOCATION',
		'Head' => 'Kopfstück des Erdspalters|MOB|LOCATION',
		'Legs' => 'Beinschützer des Erdspalters|MOB|LOCATION',
		'Shoulder' => 'Schieftung des Erdspalters|MOB|LOCATION',
		'Finger' => 'Ring der Erdspalterser|MOB|LOCATION'
	);

// Raid Tier 4 Set
$lang['ItemSets_Set']['Tier_4']['Krieger'] = array(
		'Chest1' => 'Brustplatte des Kriegshetzers|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Stulpen des Kriegshetzers|Der Kurator|Karazhan',
		'Head1'  => 'Kampfhelm des Kriegsbringers|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Schienbeinschützer des Kriegshetzers|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Schulterplatten des Kriegshetzers|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustschutz des Kriegshetzers|Magtheridon|Magtheridons Kammer',
		'Hands2' => 'Handschützer des Kriegshetzers|Der Kurator|Karazhan',
		'Head2'  => 'Großhelm des Kriegshetzers|Prinz Malchezaar|Karazhan',
		'Legs2'  => 'Beinschützer des Kriegshetzers|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder2' => 'Schulterschutz des Kriegshetzers|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Priester'] = array(
		'Chest1' => 'Roben des Leibhaftigen|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Handlappen des Leibhaftigen|Der Kurator|Karazhan',
		'Head1'  => 'Lichthalsband des Leibhaftigen|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Beinkleider des Leibhaftigen|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Lichtmantelung des Leibhaftigen|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator1' => '-setname-',
		'Chest2' => 'Tuch des Leibhaftigen|Magtheridon|Magtheridons Kammer',
		'Hands2' => 'Handschuhe des Leibhaftigen|Der Kurator|Karazhan',
		'Head2'  => 'Seelenhalsband des Leibhaftigen|Prinz Malchezaar|Karazhan',
		'Legs2'  => 'Gamaschen des Leibhaftigen|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder2' => 'Seelenmantelung des Leibhaftigen|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Druide'] = array(
		'Chest1' => 'Malornes Brustharnisch|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Malornes Handschuhe|Der Kurator|Karazhan',
		'Head1'  => 'Malornes Geweih|Prinz Malchezaar|Karazhan',
		'Legs1'  => ' Marlornes Kniehosen|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Malornes Schulterstücke|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator1' => '-setname-',
		'Chest2' => 'Malornes Brustplatte|Magtheridon|Magtheridons Kammer',
		'Hands2' => 'Malornes Stulpen|Der Kurator|Karazhan',
		'Head2'  => 'Malornes Hischhelm|Prinz Malchezaar|Karazhan',
		'Legs2'  => 'Malornes Schienbeinschützer|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder2' => 'Malornes Mantelung|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator2' => '-setname-',
		'Chest3' => 'Malornes Brustschutz|Magtheridon|Magtheridons Kammer',
		'Hands3' => 'Malornes Handschützer|Der Kurator|Karazhan',
		'Head3'  => 'Malornes Krone|Prinz Malchezaar|Karazhan',
		'Legs3'  => 'Malornes Beinschützer|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder3' => 'Malornes Schulterschutz|Hochkönig Maulgar|Gruul\\\'s Unterschlupf'
);

$lang['ItemSets_Set']['Tier_4']['Schurke'] = array(
		'Chest1' => 'Brustharnisch der Netherklinge|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Handschuhe der Netherklinge|Der Kurator|Karazhan',
		'Head1'  => 'Gesichtsmaske der Netherklinge|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Bandhose der Netherklinge|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Schulterpolster der Netherklinge|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
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

$lang['ItemSets_Set']['Tier_4']['Magier'] = array(
		'Chest1' => 'Gewänder der Aldor|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Handschuhe der Aldor|Der Kurator|Karazhan',
		'Head1'  => 'Halsband der Aldor|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Beinwickel der Aldor|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Schulterstücke der Aldor|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
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
		'Chest1' => 'Brustharnisch des Rechtsprechers|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Handschuhe des Rechtsprechers|Der Kurator|Karazhan',
		'Head1'  => 'Diadem des Rechtsprechers|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Gamaschen des Rechtsprechers|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Schulterstücke des Rechtsprechers|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustschutz des Rechtsprechers|Magtheridon|Magtheridons Kammer',
		'Hands2' => 'Handschützer des Rechtsprechers|Der Kurator|Karazhan',
		'Head2'  => 'Gesichtsschutz des Rechtsprechers|Prinz Malchezaar|Karazhan',
		'Legs2'  => 'Beinschützer des Rechtsprechers|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder2' => 'Schulterschutz des Rechtsprechers|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator2' => '-setname-',
		'Chest3' => 'Brustplatte des Rechtsprechers|Magtheridon|Magtheridons Kammer',
		'Hands3' => 'Stulpen des Rechtsprechers|Der Kurator|Karazhan',
		'Head3'  => 'Krone des Rechtsprechers|Prinz Malchezaar|Karazhan',
		'Legs3'  => 'Schienbeinschützer des Rechtsprechers|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder3' => 'Schulterplatten des Rechtsprechers|Hochkönig Maulgar|Gruul\\\'s Unterschlupf'
);

$lang['ItemSets_Set']['Tier_4']['Hexenmeister'] = array(
		'Chest1' => 'Robe des Herzens der Leere|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Handschuhe des Herzens der Leere|Der Kurator|Karazhan',
		'Head1'  => 'Krone des Herzens der Leere|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Gamaschen des Herzens der Leere|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Mantelung des Herzens der Leere|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
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

$lang['ItemSets_Set']['Tier_4']['Jäger'] = array(
		'Chest1' => 'Harnisch des Dämonenwandlers|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Stulpen des Dämonenwandlers|Der Kurator|Karazhan',
		'Head1'  => 'Großhelm des Dämonenwandlers|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Schienbeinschützer des Dämonenwandlers|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Schulterschutz des Dämonenwandlers|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
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

$lang['ItemSets_Set']['Tier_4']['Schamane'] = array(
		'Chest1' => 'Brustschutz des Orkans|Magtheridon|Magtheridons Kammer',
		'Hands1' => 'Handschützer des Orkans|Der Kurator|Karazhan',
		'Head1'  => 'Gesichtsschutz des Orkans|Prinz Malchezaar|Karazhan',
		'Legs1'  => 'Beinschützer des Orkans|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder1' => 'Schulterschutz des Orkans|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustplatte des Orkans|Magtheridon|Magtheridons Kammer',
		'Hands2' => 'Stulpen des Orkans|Der Kurator|Karazhan',
		'Head2'  => 'Helm des Orkans|Prinz Malchezaar|Karazhan',
		'Legs2'  => 'Kriegskilt des Orkans|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder2' => 'Schulterplatten des Orkans|Hochkönig Maulgar|Gruul\\\'s Unterschlupf',
		'Separator2' => '-setname-',
		'Chest3' => 'Halsberge des Orkans|Magtheridon|Magtheridons Kammer',
		'Hands3' => 'Handschuhe des Orkans|Der Kurator|Karazhan',
		'Head3'  => 'Kopfputz des Orkans|Prinz Malchezaar|Karazhan',
		'Legs3'  => 'Kilt des Orkans|Gruul der Drachentöter|Gruul\\\'s Unterschlupf',
		'Shoulder3' => 'Schulterpolster des Orkans|Hochkönig Maulgar|Gruul\\\'s Unterschlupf'
);

// Raid Tier 5 Set
$lang['ItemSets_Set']['Tier_5']['Krieger'] = array(
		'Chest1' => 'Brustplatte des Zerstörers|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Stulpen des Zerstörers|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Kampfhelm des Zerstörers|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Schienbeinschützer des Zerstörers|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Klingenschultern des Zerstörers|Leerhäscher|Festung der Stürme',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustschutz des Zerstörers|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands2' => 'Handschützer des Zerstörers|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head2'  => 'Großhelm des Zerstörers|Lady Vashj|Höhle des Schlangenschreins',
		'Legs2'  => 'Beinschützer des Zerstörers|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder2' => 'Schulterschutz des Zerstörers|Leerhäscher|Festung der Stürme',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Priester'] = array(
		'Chest1' => 'Gewänder des Avatars|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Handschuhe des Avatars|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Gugel des Avatars|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Bundhose des Avatars|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Mantelung des Avatars|Leerhäscher|Festung der Stürme',
		'Separator1' => '-setname-',
		'Chest2' => 'Tuch des Avatars|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands2' => 'Handschützer des Avatars|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head2'  => 'Kapuze des Avatars|Lady Vashj|Höhle des Schlangenschreins',
		'Legs2'  => 'Gamaschen des Avatars|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder2' => 'Schwingen des Avatars|Leerhäscher|Festung der Stürme',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Druide'] = array(
		'Chest1' => 'Brustharnisch von Nordrassil|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Stulpen von Nordrassil|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Kopfstück von Nordrassil|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Zorneskilt von Nordrassil|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Zornesmantelung von Nordrassil|Leerhäscher|Festung der Stürme',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustplatte von Nordrassil|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands2' => 'Handschutz von Nordrassil|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head2'  => 'Kopfputz von Nordrassil|Lady Vashj|Höhle des Schlangenschreins',
		'Legs2'  => 'Wildkilt von Nordrassil|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder2' => 'Wildmantelung von Nordrassil|Leerhäscher|Festung der Stürme',
		'Separator2' => '-setname-',
		'Chest3' => 'Brustschutz von Nordrassil|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands3' => 'Handschuhe von Nordrassil|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head3'  => 'Kopfschutz von Nordrassil|Lady Vashj|Höhle des Schlangenschreins',
		'Legs3'  => 'Lebenskilt von Nordrassil|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder3' => 'Lebensmantelung von Nordrassil|Leerhäscher|Festung der Stürme'
);

$lang['ItemSets_Set']['Tier_5']['Schurke'] = array(
		'Chest1' => 'Brustschutz des Todeshauchs|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Handschützer des Todeshauchs|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Helm des Todeshauchs|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Beinschützer des Todeshauchs|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Schulterpolster des Todeshauchs|Leerhäscher|Festung der Stürme',
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

$lang['ItemSets_Set']['Tier_5']['Magier'] = array(
		'Chest1' => 'Roben von Tirisfal|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Handschuhe von Tirisfal|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Gugel von Tirisfal|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Gamaschen von Tirisfal|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Mantelung von Tirisfal|Leerhäscher|Festung der Stürme',
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
		'Chest1' => 'Kristallgeschmiedeter Brustharnisch|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Kristallgeschmiedete Handschuhe|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Kristallgeschmiedeter Großhelm|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Kristallgeschmiedete Gamaschen|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Kristallgeschmiedete Schulterstücke|Leerhäscher|Festung der Stürme',
		'Separator1' => '-setname-',
		'Chest2' => 'Kristallgeschmiedeter Brustschutz|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands2' => 'Kristallgeschmiedete Handschützer|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head2'  => 'Kristallgeschmiedeter Gesichtsschutz|Lady Vashj|Höhle des Schlangenschreins',
		'Legs2'  => 'Kristallgeschmiedete Beinschützer|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder2' => 'Kristallgeschmiedeter Schulterschutz|Leerhäscher|Festung der Stürme',
		'Separator2' => '-setname-',
		'Chest3' => 'Kristallgeschmiedete Brustplatte|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands3' => 'Kristallgeschmiedete Stulpen|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head3'  => 'Kristallgeschmiedeter Kriegshelm|Lady Vashj|Höhle des Schlangenschreins',
		'Legs3'  => 'Kristallgeschmiedete Schienbeinschützer|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder3' => 'Kristallgeschmiedete Schulterspangen|Leerhäscher|Festung der Stürme'
);

$lang['ItemSets_Set']['Tier_5']['Hexenmeister'] = array(
		'Chest1' => 'Robe des Verderbers|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Handschuhe des Verderbers|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Kapuze des Verderbers|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Gamaschen des Verderbers|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Mantelung des Verderbers|Leerhäscher|Festung der Stürme',
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

$lang['ItemSets_Set']['Tier_5']['Jäger'] = array(
		'Chest1' => 'Halsberge des Dimensionswandlers|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Stulpen des Dimensionswandlers|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Helm des Dimensionswandlers|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Gamaschen des Dimensionswandlers|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Mantelung des Dimensionswandlers|Leerhäscher|Festung der Stürme',
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

$lang['ItemSets_Set']['Tier_5']['Schamane'] = array(
		'Chest1' => 'Brustharnisch der Verheerung|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands1' => 'Handschutz der Verheerung|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head1'  => 'Kopfstück der Verheerung|Lady Vashj|Höhle des Schlangenschreins',
		'Legs1'  => 'Gamaschen der Verheerung|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder1' => 'Schulterpolster der Verheerung|Leerhäscher|Festung der Stürme',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustplatte der Verheerung|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands2' => 'Stulpen der Verheerung|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head2'  => 'Helm der Verheerung|Lady Vashj|Höhle des Schlangenschreins',
		'Legs2'  => 'Beinplatten der Verheerung|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder2' => 'Schulterplatten der Verheerung|Leerhäscher|Festung der Stürme',
		'Separator2' => '-setname-',
		'Chest3' => 'Brustschutz der Verheerung|Kael\\\'thas Sonnenwanderer|Festung der Stürme',
		'Hands3' => 'Handschuhe der Verheerung|Leotheras der Blinde|Höhle des Schlangenschreins',
		'Head3'  => 'Kopfschutz der Verheerung|Lady Vashj|Höhle des Schlangenschreins',
		'Legs3'  => 'Beinschützer der Verheerung|Tiefenlord Karathress|Höhle des Schlangenschreins',
		'Shoulder3' => 'Schulterschutz der Verheerung|Leerhäscher|Festung der Stürme'
);

// Raid Tier 6 Set
$lang['ItemSets_Set']['Tier_6']['Krieger'] = array(
		'Chest1' => 'Brustplatte des Ansturms|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Stulpen des Ansturms|Azgalor|Hyjalgipfel',
		'Head1'  => 'Kampfhelm des Ansturms|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Schienbeinschützer des Ansturms|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Klingenschultern des Ansturms|Mutter Shahraz|Der Schwarze Tempel',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustschutz des Ansturms|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands2' => 'Handschützer des Ansturms|Azgalor|Hyjalgipfel',
		'Head2'  => 'Großhelm des Ansturms|Archimonde|Hyjalgipfel',
		'Legs2'  => 'Beinschützer des Ansturms|Illidari Council|Der Schwarze Tempel',
		'Shoulder2' => 'Schulterschutz des Ansturms|Mutter Shahraz|Der Schwarze Tempel',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Priester'] = array(
		'Chest1' => 'Gewand der Absolution|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Handschuhe der Absolution|Azgalor|Hyjalgipfel',
		'Head1'  => 'Gugel der Absolution|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Bundhose der Absolution|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Mantelung der Absolution|Mutter Shahraz|Der Schwarze Tempel',
		'Separator1' => '-setname-',
		'Chest2' => 'Tuch der Absolution|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands2' => 'Handschützer der Absolution|Azgalor|Hyjalgipfel',
		'Head2'  => 'Kapuze der Absolution|Archimonde|Hyjalgipfel',
		'Legs2'  => 'Gamaschen der Absolution|Illidari Council|Der Schwarze Tempel',
		'Shoulder2' => 'Schulterpolster der Absolution|Mutter Shahraz|Der Schwarze Tempel',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Druide'] = array(
		'Chest1' => 'Weste des Donnerherzens|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Handschützer des Donnerherzens|Azgalor|Hyjalgipfel',
		'Head1'  => 'Kopfschutz des Donnerherzens|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Hose des Donnerherzens|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Schulterpolster des Donnerherzens|Mutter Shahraz|Der Schwarze Tempel',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustschutz des Donnerherzens|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands2' => 'Stulpen des Donnerherzens|Azgalor|Hyjalgipfel',
		'Head2'  => 'Bedeckung des Donnerherzens|Archimonde|Hyjalgipfel',
		'Legs2'  => 'Gamaschen des Donnerherzens|Illidari Council|Der Schwarze Tempel',
		'Shoulder2' => 'Schulterstücke des Donnerherzens|Mutter Shahraz|Der Schwarze Tempel',
		'Separator2' => '-setname-',
		'Chest3' => 'Tunika des Donnerherzens|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands3' => 'Handschuhe des Donnerherzens|Azgalor|Hyjalgipfel',
		'Head3'  => 'Helm des Donnerherzens|Archimonde|Hyjalgipfel',
		'Legs3'  => 'Beinschützer des Donnerherzens|Illidari Council|Der Schwarze Tempel',
		'Shoulder3' => 'Schiftung des Donnerherzens|Mutter Shahraz|Der Schwarze Tempel'
);

$lang['ItemSets_Set']['Tier_6']['Schurke'] = array(
		'Chest1' => 'Brustschutz des Schlächters|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Handschützer des Schlächters|Azgalor|Hyjalgipfel',
		'Head1'  => 'Helm des Schlächters|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Beinschützer des Schlächters|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Schulterpolster des Schlächters|Mutter Shahraz|Der Schwarze Tempel',
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

$lang['ItemSets_Set']['Tier_6']['Magier'] = array(
		'Chest1' => 'Roben des Gewittersturms|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Handschuhe des Gewittersturms|Azgalor|Hyjalgipfel',
		'Head1'  => 'Gugel des Gewittersturms|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Gamaschen des Gewittersturms|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Mantelung des Gewittersturms|Mutter Shahraz|Der Schwarze Tempel',
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
		'Chest1' => 'Brustharnisch des Lichtbringers|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Handschuhe des Lichtbringers|Azgalor|Hyjalgipfel',
		'Head1'  => 'Großhelm des Lichtbringers|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Gamaschen des Lichtbringers|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Schulterstücke des Lichtbringers|Mutter Shahraz|Der Schwarze Tempel',
		'Separator1' => '-setname-',
		'Chest2' => 'Brustschutz des Lichtbringers|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands2' => 'Handschützer des Lichtbringers|Azgalor|Hyjalgipfel',
		'Head2'  => 'Gesichtsschutz des Lichtbringers|Archimonde|Hyjalgipfel',
		'Legs2'  => 'Beinschützer des Lichtbringers|Illidari Council|Der Schwarze Tempel',
		'Shoulder2' => 'Schulterschutz des Lichtbringers|Mutter Shahraz|Der Schwarze Tempel',
		'Separator2' => '-setname-',
		'Chest3' => 'Brustplatte des Lichtbringers|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands3' => 'Stulpen des Lichtbringers|Azgalor|Hyjalgipfel',
		'Head3'  => 'Kriegshelm des Lichtbringers|Archimonde|Hyjalgipfel',
		'Legs3'  => 'Schienbeinschützer des Lichtbringers|Illidari Council|Der Schwarze Tempel',
		'Shoulder3' => 'Schulterspangen des Lichtbringers|Mutter Shahraz|Der Schwarze Tempel'
);

$lang['ItemSets_Set']['Tier_6']['Hexenmeister'] = array(
		'Chest1' => 'Robe der Boshaftigkeit|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Handschuhe der Boshaftigkeit|Azgalor|Hyjalgipfel',
		'Head1'  => 'Kapuze der Boshaftigkeit|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Gamaschen der Boshaftigkeit|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Mantelung der Boshaftigkeit|Mutter Shahraz|Der Schwarze Tempel',
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

$lang['ItemSets_Set']['Tier_6']['Jäger'] = array(
		'Chest1' => 'Brustschutz des Gronnjägers|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Handschuhe des Gronnjägers|Azgalor|Hyjalgipfel',
		'Head1'  => 'Helm des Gronnjägers|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Gamaschen des Gronnjägers|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Schiftung des Gronnjägers|Mutter Shahraz|Der Schwarze Tempel',
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

$lang['ItemSets_Set']['Tier_6']['Schamane'] = array(
		'Chest1' => 'Brustplatte des Himmelsdonners|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands1' => 'Stulpen des Himmelsdonners|Azgalor|Hyjalgipfel',
		'Head1'  => 'Kopfschutz des Himmelsdonners|Archimonde|Hyjalgipfel',
		'Legs1'  => 'Beinschützer des Himmelsdonners|Illidari Council|Der Schwarze Tempel',
		'Shoulder1' => 'Mantel des Himmelsdonners|Mutter Shahraz|Der Schwarze Tempel',
		'Separator1' => '-setname-',
		'Chest2' => 'Tunika des Himmelsdonners|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands2' => 'Handschutz des Himmelsdonners|Azgalor|Hyjalgipfel',
		'Head2'  => 'Bedeckung des Himmelsdonners|Archimonde|Hyjalgipfel',
		'Legs2'  => 'Hose des Himmelsdonners|Illidari Council|Der Schwarze Tempel',
		'Shoulder2' => 'Schulterstücke des Himmelsdonners|Mutter Shahraz|Der Schwarze Tempel',
		'Separator2' => '-setname-',
		'Chest3' => 'Brustschutz des Himmelsdonners|Illidan Sturmgrimm|Der Schwarze Tempel',
		'Hands3' => 'Handschuhe des Himmelsdonners|Azgalor|Hyjalgipfel',
		'Head3'  => 'Helm des Himmelsdonners|Archimonde|Hyjalgipfel',
		'Legs3'  => 'Gamaschen des Himmelsdonners|Illidari Council|Der Schwarze Tempel',
		'Shoulder3' => 'Schulterpolster des Himmelsdonners|Mutter Shahraz|Der Schwarze Tempel'
);

	
// AQ20
$lang['ItemSets_Set']['AQ20']['Druide'] = array(
		'Back' => 'Umhang des endlosen Lebens|Quest|Umhang des endlosen Lebens',
		'Finger' => 'Band des endlosen Lebens|Quest|Band des endlosen Lebens',
		'Mainhand' => 'Streitkolben des endlosen Lebens|Quest|Streitkolben des endlosen Lebens'
);
$lang['ItemSets_Set']['AQ20']['Jäger'] = array(
		'Back' => 'Umhang des unsichtbaren Pfads|Quest|Umhang des unsichtbaren Pfads',
		'Finger' => 'Siegel des unsichtbaren Pfads|Quest|Siegel des unsichtbaren Pfads',
		'Mainhand' => 'Sense des unsichtbaren Pfads|Quest|Sense des unsichtbaren Pfads'
);
$lang['ItemSets_Set']['AQ20']['Magier'] = array(
		'Back' => 'Tuch der behüteten Geheimnisse|Quest|Tuch der behüteten Geheimnisse',
		'Finger' => 'Band der behüteten Geheimnisse|Quest|Band der behüteten Geheimnisse',
		'Mainhand' => 'Klinge der behüteten Geheimnisse|Quest|Klinge der behüteten Geheimnisse'
);
$lang['ItemSets_Set']['AQ20']['Paladin'] = array(
		'Back' => 'Cape der ewigen Gerechtigkeit|Quest|Cape der ewigen Gerechtigkeit',
		'Finger' => 'Ring der ewigen Gerechtigkeit|Quest|Ring der ewigen Gerechtigkeit',
		'Mainhand' => 'Klinge der ewigen Gerechtigkeit|Quest|Klinge der ewigen Gerechtigkeit'
);
$lang['ItemSets_Set']['AQ20']['Priester'] = array(
		'Back' => 'Schleier der unendlichen Weisheit|Quest|Schleier der unendlichen Weisheit',
		'Finger' => 'Ring der unendlichen Weisheit|Quest|Ring der unendlichen Weisheit',
		'Mainhand' => 'Hammer der unendlichen Weisheit|Quest|Hammer der unendlichen Weisheit'
);
$lang['ItemSets_Set']['AQ20']['Schurke'] = array(
		'Back' => 'Umhang der Schattenschleier|Quest|Umhang der Schattenschleier',
		'Finger' => 'Band der Schattenschleier|Quest|Band der Schattenschleier',
		'Mainhand' => 'Dolch der Schattenschleier|Quest|Dolch der Schattenschleier'
);
$lang['ItemSets_Set']['AQ20']['Schamane'] = array(
		'Back' => 'Umhang der aufziehenden Stürme|Quest|Umhang der aufziehenden Stürme',
		'Finger' => 'Ring der aufziehenden Stürme|Quest|Ring der aufziehenden Stürme',
		'Mainhand' => 'Hammer der aufziehenden Stürme|Quest|Hammer der aufziehenden Stürme'
);
$lang['ItemSets_Set']['AQ20']['Hexenmeister'] = array(
		'Back' => 'Schleier der ungesagten Namen|Quest|Schleier der ungesagten Namen',
		'Finger' => 'Ring der ungesagten Namen|Quest|Ring der ungesagten Namen',
		'Mainhand' => 'Kris der ungesagten Namen|Quest|Kris der ungesagten Namen'
);
$lang['ItemSets_Set']['AQ20']['Krieger'] = array(
		'Back' => 'Tuch der unnachgiebigen Stärke|Quest|Tuch der unnachgiebigen Stärke',
		'Finger' => 'Siegel der unnachgiebigen Stärke|Quest|Siegel der unnachgiebigen Stärke',
		'Mainhand' => 'Sichel der unnachgiebigen Stärke|Quest|Sichel der unnachgiebigen Stärke'
);


// AQ40
$lang['ItemSets_Set']['AQ40']['Druide'] = array(
		'Feet' => 'Stiefel der Genesis|Quest|Stiefel der Genesis',
		'Chest' => 'Weste der Genesis|Quest|Weste der Genesis',
		'Head' => 'Helm der Genesis|Quest|Helm der Genesis',
		'Legs' => 'Beinkleider der Genesis|Quest|Beinkleider der Genesis',
		'Shoulder' => 'Schulterpolster der Genesis|Quest|Schulterpolster der Genesis'
);
$lang['ItemSets_Set']['AQ40']['Jäger'] = array(
		'Feet'  => 'Fußschützer des Hetzers|Quest|Fußschützer des Hetzers',
		'Chest' => 'Halsberge des Hetzers|Quest|Halsberge des Hetzers',
		'Head'  => 'Diadem des Hetzers|Quest|Diadem des Hetzers',
		'Legs'  => 'Gamaschen des Hetzers|Quest|Gamaschen des Hetzers',
		'Shoulder' => 'Schulterstücke des Hetzers|Quest|Schulterstücke des Hetzers'
);
$lang['ItemSets_Set']['AQ40']['Magier'] = array(
		'Feet'  => 'Stiefel des Mysteriums|Quest|Stiefel des Mysteriums',
		'Chest' => 'Roben des Mysteriums|Quest|Roben des Mysteriums',
		'Head'  => 'Reif des Mysteriums|Quest|Reif des Mysteriums',
		'Legs'  => 'Gamaschen des Mysteriums|Quest|Gamaschen des Mysteriums',
		'Shoulder' => 'Schulterpolster des Mysteriums|Quest|Schulterpolster des Mysteriums'
);
$lang['ItemSets_Set']['AQ40']['Paladin'] = array(
		'Feet'  => 'Schienbeinschützer des Rächers|Quest|Schienbeinschützer des Rächers',
		'Chest' => 'Brustplatte des Rächers|Quest|Brustplatte des Rächers',
		'Head'  => 'Krone des Rächers|Quest|Krone des Rächers',
		'Legs'  => 'Beinschützer des Rächers|Quest|Beinschützer des Rächers',
		'Shoulder' => 'Schulterstücke des Rächers|Quest|Schulterstücke des Rächers'
);
$lang['ItemSets_Set']['AQ40']['Priester'] = array(
		'Feet'  => 'Fußlappen des Orakels|Quest|Fußlappen des Orakels',
		'Chest' => 'Tunika des Orakels|Quest|Tunika des Orakels',
		'Head'  => 'Tiara des Orakels|Quest|Tiara des Orakels',
		'Legs'  => 'Beinkleider des Orakels|Quest|Beinkleider des Orakels',
		'Shoulder' => 'Mantel des Orakels|Quest|Mantel des Orakels'
);
$lang['ItemSets_Set']['AQ40']['Schurke'] = array(
		'Feet'  => 'Stiefel des Todesboten|Quest|Stiefel des Todesboten',
		'Chest' => 'Weste des Todesboten|Quest|Weste des Todesboten',
		'Head'  => 'Helm des Todesboten|Quest|Helm des Todesboten',
		'Legs'  => 'Gamaschen des Todesboten|Quest|Gamaschen des Todesboten',
		'Shoulder' => 'Schiftung des Todesboten|Quest|Schiftung des Todesboten'
);
$lang['ItemSets_Set']['AQ40']['Schamane'] = array(
		'Feet'  => 'Fußschützer des Sturmrufers|Quest|Fußschützer des Sturmrufers',
		'Chest' => 'Halsberge des Sturmrufers|Quest|Halsberge des Sturmrufers',
		'Head'  => 'Diadem des Sturmrufers|Quest|Diadem des Sturmrufers',
		'Legs'  => 'Gamaschen des Sturmrufers|Quest|Gamaschen des Sturmrufers',
		'Shoulder' => 'Schulterstücke des Sturmrufers|Quest|Schulterstücke des Sturmrufers'
);
$lang['ItemSets_Set']['AQ40']['Hexenmeister'] = array(
		'Feet'  => 'Fußlappen des Verdammnisrufers|Quest|Fußlappen des Verdammnisrufers',
		'Chest' => 'Roben des Verdammnisrufers|Quest|Roben des Verdammnisrufers',
		'Head'  => 'Reif des Verdammnisrufers|Quest|Reif des Verdammnisrufers',
		'Legs'  => 'Beinkleider des Verdammnisrufers|Quest|Beinkleider des Verdammnisrufers',
		'Shoulder' => 'Mantel des Verdammnisrufers|Quest|Mantel des Verdammnisrufers'
);
$lang['ItemSets_Set']['AQ40']['Krieger'] = array(
		'Feet'  => 'Schienbeinschützer des Eroberers|Quest|Schienbeinschützer des Eroberers',
		'Chest' => 'Brustplatte des Eroberers|Quest|Brustplatte des Eroberers',
		'Head'  => 'Krone des Eroberers|Quest|Krone des Eroberers',
		'Legs'  => 'Beinschützer des Eroberers|Quest|Beinschützer des Eroberers',
		'Shoulder' => 'Schiftung des Eroberers|Quest|Schiftung des Eroberers'
);

// ZG
$lang['ItemSets_Set']['ZG']['Druide'] = array(
        'Waist' => 'Zandalarianischer Haruspexgürtel|Quest|Symbole der Macht: Der Haruspexgürtel',
        'Wrist' => 'Zandalarianische Haruspexarmschienen|Quest|Symbole der Macht: Die Haruspexarmschienen',
        'Chest' => 'Zandalarianische Haruspextunika|Quest|Symbole der Macht: Die Haruspextunika',
        'Shoulder' => '',
	'Neck' => 'Reiner verzauberter Südmeertang|Quest|Reiner verzauberter Südmeertang',
        'Trinket' => 'Wushoolays Amulett der Natur|Quest|k.A.'
    );
$lang['ItemSets_Set']['ZG']['Jäger'] = array(
        'Waist' => 'Zandalarianischer Gürtel des Raubtiers|Quest|Symbole der Macht: Der Gürtel des Raubtiers',
        'Wrist' => 'Zandalarianische Armschienen des Raubtiers|Quest|Symbole der Macht: Die Armschienen des Raubtiers',
	'Chest' => '',
        'Shoulder' => 'Zandalarianischer Mantel des Raubtiers|Quest|Symbole der Macht: Der Mantel des Raubtiers',
        'Neck' => 'Maelstroms Zorn|Quest|Maelstroms Zorn',
        'Trinket' => 'Renatakis Amulett der Bestien|Quest|k.A.'
    );
$lang['ItemSets_Set']['ZG']['Magier'] = array(
	'Waist' => '',
        'Wrist' => 'Zandalarianische Handlappen des Illusionisten|Quest|Symbole der Macht: Die Handlappen des Illusionisten',
        'Chest' => 'Zandalarianische Robe des Illusionisten|Quest|Symbole der Macht: Die Roben des Illusionisten',
        'Shoulder' => 'Zandalarianischer Mantel des Illusionisten|Quest|Symbole der Macht: Der Mantel des Illusionisten',
        'Neck' => 'Juwel von Kajaro|Quest|Das Juwel von Kajaro',
        'Trinket' => 'Hazza\\\'rahs Amulett der Magie|Quest|k.A.'
    );
$lang['ItemSets_Set']['ZG']['Paladin'] = array(
        'Waist' => 'Zandalarianischer Gürtel des Freidenkers|Quest|Symbole der Macht: Der Gürtel des Freidenkers',
        'Wrist' => 'Zandalarianische Armschützer des Freidenkers|Quest|Symbole der Macht: Die Armschützer des Freidenkers',
        'Chest' => 'Zandalarianische Brustplatte des Freidenkers|Quest|Symbole der Macht: Die Brustplatte des Freidenkers',
	'Shoulder' => '',
        'Neck' => 'Emblem des Helden|Quest|Das Emblem des Helden',
        'Trinket' => 'Gri\\\'leks Amulett der Ehre|Quest|k.A.'
    );
$lang['ItemSets_Set']['ZG']['Priester'] = array(
        'Waist' => 'Zandalarianische Bindungen des Glaubenshüters|Quest|Symbole der Macht: Die Bindungen des Glaubenshüters',
        'Wrist' => 'Zandalarianische Handlappen des Glaubenshüters|Quest|Symbole der Macht: Die Handlappen des Glaubenshüters',
	'Chest' => '',
        'Shoulder' => 'Zandalarianischer Mantel des Glaubenshüters|Quest|Symbole der Macht: Der Mantel des Glaubenshüters',
        'Neck' => 'Das allsehende Auge von Zuldazar|Quest|Das allsehende Auge von Zuldazar',
        'Trinket' => 'Hazza\\\'rahs Amulett der Heilung|Quest|k.A.'
    );
$lang['ItemSets_Set']['ZG']['Schurke'] = array(
	'Waist' => '',
        'Wrist' => 'Zandalarianische Armschienen des Wildfangs|Quest|Symbole der Macht: Die Armschienen des Wildfangs',
        'Chest' => 'Zandalarianische Tunika des Wildfangs|Quest|Symbole der Macht: Die Tunika des Wildfangs',
        'Shoulder' => 'Zandalarianischer Mantel des Wildfangs|Quest|Symbole der Macht: Der Mantel des Wildfangs',
        'Neck' => 'Zandalarianischer Schattentalisman der Beherrschung|Quest|Zandalarianischer Schattentalisman der Beherrschung',
        'Trinket' => 'Renatakis Amulett der Gaunerei|Quest|k.A.'
);
$lang['ItemSets_Set']['ZG']['Schamane'] = array(
        'Waist' => 'Zandalarianischer Gürtel des Weissagers|Quest|Symbole der Macht: Der Gürtel des Weissagers',
        'Wrist' => 'Zandalarianischer Armschienen des Weissagers|Quest|Symbole der Macht: Die Armschienen des Weissagers',
        'Chest' => 'Zandalarianische Halsberge des Weissagers|Quest|Symbole der Macht: Die Halsberge des Weissagers',
	'Shoulder' => '',
        'Neck' => 'Unversehrte Vision von Voodress|Quest|Die Unversehrte Vision von Voodress',
        'Trinket' => 'Wushoolays Amulett der Geister|Quest|k.A.'
);
$lang['ItemSets_Set']['ZG']['Hexenmeister'] = array(
	'Waist' => '',
        'Wrist' => 'Zandalarianische Handlappen des Besessenen|Quest|Symbole der Macht: Die Handlappen des Besessenen',
        'Chest' => 'Zandalarianische Robe des Besessenen|Quest|Symbole der Macht: Die Roben des Besessenen',
        'Shoulder' => 'Zandalarianischer Mantel des Besessenen|Quest|Symbole der Macht: Der Mantel des Besessenen',
        'Neck' => 'Kezans unaufhaltsame Schmach|Quest|Kezans unaufhaltsame Schmach',
        'Trinket' => 'Hazza\\\'rahs Amulett der Zerstörung|Quest|k.A.'
);
$lang['ItemSets_Set']['ZG']['Krieger'] = array(
	'Waist' => 'Zandalarianischer Gürtel des Vollstreckers|Symbole der Macht: Der Gürtel des Vollstreckers|k.A.',
	'Wrist' => 'Zandalarianische Armschützer des Vollstreckers|Symbole der Macht: Die Armschützer des Vollstreckers|k.A.',
	'Chest' => 'Zandalarianische Brustplatte des Vollstreckers|Symbole der Macht: Die Brustplatte des Vollstreckers|k.A.',
	'Shoulder' => '',
        'Neck' => 'Wut Mugambas|Quest|Die Wut Mugambas',
        'Trinket' => 'Gri\\\'leks Amulett der Macht|Quest|k.A.'
);

//   PVP_Rare Alliance
$lang['ItemSets_Set']['PVP_Rare']['A']['Druide'] = array(
		'Feet'  => 'Drachenlederfußlappen des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Drachenledertunika des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Drachenlederhandschuhe des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Drachenledertuch des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Drachenledergamaschen des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Drachenlederschulterklappen des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Jäger'] = array(
		'Feet'  => 'Kettenstiefel des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Kettentorso des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Kettenstulpen des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Kettenhelm des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Kettenbeinlinge des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Kettenschulterstücke des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Magier'] = array(
		'Feet'  => 'Seidene Stiefel des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Seidene Gewandung des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Seidene Handschuhe des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Krone des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Seidene Beinlinge des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Seidene Schiftung des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Paladin'] = array(
		'Feet'  => 'Lamellensabatons des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Lamellenbrustplatte des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Lamellenstulpen des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Lamellenkopfschutz des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Lamellengamaschen des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Lamellenschultern des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Priester'] = array(
		'Feet'  => 'Satinstiefel des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Satinroben des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Satinhandschuhe des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Diadem des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Satingamaschen des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Satinamicia des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Schurke'] = array(
		'Feet'  => 'Lederstiefel des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Lederrüstung des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Lederstulpen des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Lederschleier des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Lederbeinschützer des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Lederschiftung des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Hexenmeister'] = array(
		'Feet'  => 'Schreckenszwirnstiefel des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Schreckenszwirnrobe des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Schreckenszwirnhandschuhe des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Kopfschutz des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Schreckenszwirnbeinlinge des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Schreckenszwirnmantel des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Krieger'] = array(
		'Feet'  => 'Plattenstiefel des Hauptmanns|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Plattenbrustschutz des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Plattenstulpen des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Plattenhelm des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Plattengamaschen des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Plattenschulterstücke des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Schamane'] = array(
		'Feet'  => 'Panzerbeinschützer des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Panzerhalsberge des Kürassiers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Panzerklemmen des Hauptmanns|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Panzerkopfschutz des Feldkommandanten|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Panzerbeinschützer des Kürassiers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Panzerschulterstücke des Feldkommandanten|2.805 EP, 20x Arathi|PVP'
);


//   PVP_Rare Horde

$lang['ItemSets_Set']['PVP_Rare']['H']['Druide'] = array(
		'Feet'  => 'Drachenledertreter des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Drachenlederbrustharnisch des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Drachenlederhandschutz des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Drachenlederkopfschutz des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Drachenledergamaschen des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Drachenlederschultern des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Jäger'] = array(
		'Feet'  => 'Kettenschienbeinschützer des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Kettenhalsberge des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Kettenklemmen des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Kettenhelm des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Kettenbeinschützer des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Kettenschultern des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Magier'] = array(
		'Feet'  => 'Seidenlaufschuhe des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Seidentunika des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Seidenhandlappen des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Seidenkutte des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Seidenbeinschützer des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Seidenmantel des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Priester'] = array(
		'Feet'  => 'Seidenlaufschuhe des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Seidentunika des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Seidenhandlappen des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Seidenkutte des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Seidenbeinschützer des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Seidenmantel des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Schurke'] = array(
		'Feet'  => 'Lederlaufschuhe des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Lederbrustharnisch des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Lederhandschutz des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Lederhelm des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Lederbeinschützer des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Lederschultern des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Schamane'] = array(
		'Feet'  => 'Panzerschienbeinschützer des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Panzerhalsberge des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Panzerklemmen des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Panzerkopfschutz des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Panzerbeinschützer des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Panzerschulterstücke des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Hexenmeister'] = array(
		'Feet'  => 'Schreckenszwirnlaufschuhe des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Schreckenszwirntunika des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Schreckenszwirnhandlappen des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Schreckenszwirnkutte des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Schreckenszwirnbeinschützer des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Schreckenszwirnschiftung des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Krieger'] = array(
		'Feet'  => 'Panzerschienbeinschützer des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Panzerhalsberge des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Panzerklemmen des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Panzerkopfschutz des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Panzerbeinschützer des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Panzerschulterstücke des Feldherren|2.805 EP, 20x Arathi|PVP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Paladin'] = array(
		'Feet'  => 'Lamellensabatons des Blutgardisten|4.335 EP, 30x Warsong|PVP',
		'Chest' => 'Lamellenbrustplatte des Zornbringers|4.590 EP, 30x Arathi|PVP',
		'Hands' => 'Lamellenstulpen des Blutgardisten|2.805 EP, 20x Alterac|PVP',
		'Head'  => 'Lamellenkopfschutz des Feldherren|4.335 EP, 30x Alterac|PVP',
		'Legs'  => 'Lamellengamaschen des Zornbringers|4.335 EP, 30x Warsong|PVP',
		'Shoulder' => 'Lamellenschultern des Feldherren|2.805 EP, 20x Arathi|PVP'
);


//   PVP_Epic Alliance
$lang['ItemSets_Set']['PVP_Epic']['A']['Druide'] = array(
		'Feet'  => 'Drachenlederstiefel des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Drachenlederbrustplatte des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Drachenlederstulpen des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Drachenlederhelm des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Drachenlederbeinschützer des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Drachenlederschiftung des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Jäger'] = array(
		'Feet'  => 'Kettenstiefel des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Kettenbrustplatte des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Kettenhandschutz des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Kettenhelm des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Kettenbeinschützer des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Kettenschiftung des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Magier'] = array(
		'Feet'  => 'Seidene Fußlappen des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Seidene Tracht des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Seidene Handschuhe des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Kronenreif des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Seidene Gamaschen des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Seidene Schiftung des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Paladin'] = array(
		'Feet'  => 'Lamellenstiefel des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Lamellenbrustharnisch des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Lamellenhandschuhe des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Lamellengesichtsschutz des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Lamellenbeinplatten des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Lamellenschulterstücke des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Priester'] = array(
		'Feet'  => 'Satinsandalen des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Satintracht des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Satinhandschuhe des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Kopfputz des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Satinhose des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Satinmantel des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Schurke'] = array(
		'Feet'  => 'Lederne Fußschützer des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Lederner Brustharnisch des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Lederner Handschutz des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Lederne Maske des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Lederne Gamaschen des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Lederne Schulterklappen des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Hexenmeister'] = array(
		'Feet'  => 'Schreckenszwirnstiefel des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Schreckenszwirnrobe des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Schreckenszwirnhandschuhe des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Koronale des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Schreckenszwirngamaschen des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Schreckenszwirnschultern des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Krieger'] = array(
		'Feet'  => 'Plattenstiefel des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Plattenrüstung des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Plattenstulpen des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Plattenhelm des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Plattenbeinschützer des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Plattenschulterschutz des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Schamane'] = array(
		'Feet'  => 'Panzerstiefel des Marschalls|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Panzerrüstung des Feldmarschalls|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Panzerstulpen des Marschalls|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Panzerhelm des Feldmarschalls|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Panzergamaschen des Marschalls|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Panzerschiftung des Feldmarschalls|8.415 EP, 20x Arathi|PvP'
);

//   PVP_Epic Horde

$lang['ItemSets_Set']['PVP_Epic']['H']['Druide'] = array(
		'Feet'  => 'Drachenlederstiefel des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Drachenlederbrustplatte des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Drachenlederstulpen des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Drachenlederhelm des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Drachenlederbeinschützer des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Drachenlederschiftung des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Jäger'] = array(
		'Feet'  => 'Kettenstiefel des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Kettenbrustplatte des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Kettenhandschutz des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Kettenhelm des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Kettenbeinschützer des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Kettenschiftung des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Magier'] = array(
		'Feet'  => 'Seidene Fußlappen des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Seidene Tracht des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Seidene Handschuhe des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Kronenreif des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Seidene Gamaschen des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Seidene Schiftung des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Priester'] = array(
		'Feet'  => 'Satinsandalen des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Satintracht des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Satinhandschuhe des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Kopfputz des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Satinhose des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Satinmantel des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Schurke'] = array(
		'Feet'  => 'Lederne Fußschützer des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Lederner Brustharnisch des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Lederner Handschutz des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Lederne Maske des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Lederne Gamaschen des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Lederne Schulterklappen des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Schamane'] = array(
		'Feet'  => 'Panzerstiefel des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Panzerrüstung des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Panzerstulpen des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Panzerhelm des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Panzergamaschen des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Panzerschiftung des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Hexenmeister'] = array(
		'Feet'  => 'Schreckenszwirnstiefel des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Schreckenszwirnrobe des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Schreckenszwirnhandschuhe des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Koronale des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Schreckenszwirngamaschen des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Schreckenszwirnschultern des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Krieger'] = array(
		'Feet'  => 'Plattenstiefel des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Plattenrüstung des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Plattenstulpen des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Plattenkopfstück des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Plattengamaschen des Kriegsfürsten|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Plattenschultern des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Paladin'] = array(
		'Feet'  => 'Lamellenstiefel des Kriegsherren|8.415 EP, 20x Arathi|PvP',
		'Chest' => 'Lamellenbrustharnisch des Kriegsfürsten|13.770 EP, 30x Arathi|PvP',
		'Hands' => 'Lamellenhandschuhe des Kriegsherren|8.415 EP, 20x Alterac|PvP',
		'Head'  => 'Lamellengesichtsschutz des Kriegsfürsten|13.005 EP, 30x Alterac|PvP',
		'Legs'  => 'Lamellenbeinplatten des Kriegsherren|13.005 EP, 30x Warsong|PvP',
		'Shoulder' => 'Lamellenschulterstücke des Kriegsfürsten|8.415 EP, 20x Arathi|PvP'
);

//   PVP_Level70 Alliance
$lang['ItemSets_Set']['PVP_Level70']['A']['Krieger'] = array(
		'Chest1' => 'Plattenbrustharnisch des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Plattenstulpen des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Plattenhelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Plattenbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Plattenschultern des Großmarschalls|8.078 EP, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['A']['Druide'] = array(
		'Chest1' => 'Kodobalgtunika des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Kodobalghandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Kodobalghelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Kodobalgbeinschützer Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Kodobalgschiftung Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Drachenledertunika des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Drachenlederhandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Drachenlederhelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Drachenlederbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Drachenlederschiftung des Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Wyrmbalgtunika des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands3' => 'Wyrmbalghandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head3'  => 'Wyrmbalghelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs3'  => 'Wyrmbalgbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder3' => 'Wyrmbalgschiftung des Großmarschalls|8.078 EP, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Hexenmeister'] = array(
		'Chest1' => 'Schreckenszwirnrobe des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Schreckenszwirnhandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Schreckenszwirnkapuze des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Schreckenszwirngamaschen des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Schreckenszwirnmantel des Großmarschalls|8.078 EP, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['A']['Jäger'] = array(
		'Chest1' => 'Kettenrüstung des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Kettenstulpen des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Kettenhelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Kettenbeinlinge des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Kettenschiftung des Großmarschalls|8.078 EP, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['A']['Magier'] = array(
		'Chest1' => 'Seidene Gewandung des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Seidene Handschützer des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Seidene Gugel des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Seidene Beinkleider des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Seidene Amicia des Großmarschalls|8.078 EP, 20x Arathi|PvP',
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
		'Chest1' => 'Lamellenbrustharnisch des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Lamellenstulpen des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Lamellenhelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Lamellenbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Lamellenschultern des Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Zieratbrustplatte des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Zierathandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Zieratkopfschutz des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Zieratgamaschen des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Zieratschiftung des Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Schuppenharnisch des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands3' => 'Schuppenstulpen des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head3'  => 'Schuppenhelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs3'  => 'Schuppenbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder3' => 'Schuppenschultern des Großmarschalls|8.078 EP, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Priester'] = array(
		'Chest1' => 'Mondstoffgewand des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Mondstofffäustlinge des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Mondstoffgugel des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Mondstoffbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Mondstoffschulterpolster des Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Satinroben des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Satinhandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Satinkapuze des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Satingamaschen des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Satinmantel des Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Schamane'] = array(
		'Chest1' => 'Gekettelte Rüstung des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Gekettelte Stulpen des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Gekettelter Helm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Gekettelte Gamaschen des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Gekettelte Schiftung des Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Panzerrüstung des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Panzerstulpen des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Panzerhelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Panzergamaschen des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Panzerschiftung des Großmarschalls|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Ringpanzerbrustschutz des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands3' => 'Ringpanzerhandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head3'  => 'Ringpanzerkopfstück des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs3'  => 'Ringpanzerbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder3' => 'Ringpanzerschultern des Großmarschalls|8.078 EP, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Schurke'] = array(
		'Chest1' => 'Ledertunika des Großmarschalls|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Lederhandschuhe des Großmarschalls|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Lederhelm des Großmarschalls|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Lederbeinschützer des Großmarschalls|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Lederschiftung des Großmarschalls|8.078 EP, 20x Arathi|PvP',
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

//   PVP_Level70 Horde
$lang['ItemSets_Set']['PVP_Level70']['H']['Krieger'] = array(
		'Chest1' => 'Plattenbrustharnisch des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Plattenstulpen des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Plattenhelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Plattenbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Plattenschultern des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['H']['Druide'] = array(
		'Chest1' => 'Kodobalgtunika des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Kodobalghandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Kodobalghelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Kodobalgbeinschützer Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Kodobalgschiftung Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Drachenledertunika des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Drachenlederhandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Drachenlederhelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Drachenlederbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Drachenlederschiftung des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Wyrmbalgtunika des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands3' => 'Wyrmbalghandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head3'  => 'Wyrmbalghelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs3'  => 'Wyrmbalgbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder3' => 'Wyrmbalgschiftung des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Hexenmeister'] = array(
		'Chest1' => 'Schreckenszwirnrobe des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Schreckenszwirnhandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Schreckenszwirnkapuze des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Schreckenszwirngamaschen des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Schreckenszwirnmantel des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['H']['Jäger'] = array(
		'Chest1' => 'Kettenrüstung des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Kettenstulpen des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Kettenhelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Kettenbeinlinge des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Kettenschiftung des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['H']['Magier'] = array(
		'Chest1' => 'Seidene Gewandung des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Seidene Handschützer des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Seidene Gugel des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Seidene Beinkleider des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Seidene Amicia des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
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
		'Chest1' => 'Lamellenbrustharnisch des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Lamellenstulpen des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Lamellenhelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Lamellenbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Lamellenschultern des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Zieratbrustplatte des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Zierathandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Zieratkopfschutz des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Zieratgamaschen des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Zieratschiftung des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Schuppenharnisch des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands3' => 'Schuppenstulpen des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head3'  => 'Schuppenhelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs3'  => 'Schuppenbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder3' => 'Schuppenschultern des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Priester'] = array(
		'Chest1' => 'Mondstoffgewand des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Mondstofffäustlinge des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Mondstoffgugel des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Mondstoffbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Mondstoffschulterpolster des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Satinroben des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Satinhandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Satinkapuze des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Satingamaschen des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Satinmantel des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Schamane'] = array(
		'Chest1' => 'Gekettelte Rüstung des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Gekettelte Stulpen des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Gekettelter Helm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Gekettelte Gamaschen des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Gekettelte Schiftung des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Panzerrüstung des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands2' => 'Panzerstulpen des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head2'  => 'Panzerhelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs2'  => 'Panzergamaschen des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder2' => 'Panzerschiftung des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Ringpanzerbrustschutz des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands3' => 'Ringpanzerhandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head3'  => 'Ringpanzerkopfstück des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs3'  => 'Ringpanzerbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder3' => 'Ringpanzerschultern des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Schurke'] = array(
		'Chest1' => 'Ledertunika des Obersten Kriegsfürsten|13.219 EP, 30x Arathi|PvP',
		'Hands1' => 'Lederhandschuhe des Obersten Kriegsfürsten|8.078 EP, 20x Alterac|PvP',
		'Head1'  => 'Lederhelm des Obersten Kriegsfürsten|12.852 EP, 30x Alterac|PvP',
		'Legs1'  => 'Lederbeinschützer des Obersten Kriegsfürsten|12.852 EP, 30x Warsong|PvP',
		'Shoulder1' => 'Lederschiftung des Obersten Kriegsfürsten|8.078 EP, 20x Arathi|PvP',
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

// Arena Sets
$lang['ItemSets_Set']['Arena_1']['Krieger'] = array(
		'Chest1' => 'Plattenbrustharnisch des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Plattenstulpen des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Plattenhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Plattenbeinschützer des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Plattenschultern des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
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

$lang['ItemSets_Set']['Arena_2']['Krieger'] = array(
		'Chest1' => 'Plattenbrustharnisch des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Plattenstulpen des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Plattenhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Plattenbeinschützer des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Plattenschultern des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
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

$lang['ItemSets_Set']['Arena_3']['Krieger'] = array(
		'Chest1' => 'Plattenbrustharnisch des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Plattenstulpen des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Plattenhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Plattenbeinschützer des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Plattenschultern des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
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

$lang['ItemSets_Set']['Arena_1']['Magier'] = array(
		'Chest1' => 'Seidene Gewandung des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Seidene Handschützer des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Seidene Gugel des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Seidene Beinkleider des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Seidene Amicia des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
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

$lang['ItemSets_Set']['Arena_2']['Magier'] = array(
		'Chest1' => 'Seidene Gewandung des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Seidene Handschützer des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Seidene Gugel des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Seidene Beinkleider des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Seidene Amicia des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
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

$lang['ItemSets_Set']['Arena_3']['Magier'] = array(
		'Chest1' => 'Seidene Gewandung des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Seidene Handschützer des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Seidene Gugel des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Seidene Beinkleider des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Seidene Amicia des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
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

$lang['ItemSets_Set']['Arena_1']['Jäger'] = array(
		'Chest1' => 'Kettenrüstung des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Kettenstulpen des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Kettenhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Kettenbeinlinge des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Kettenschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
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

$lang['ItemSets_Set']['Arena_2']['Jäger'] = array(
		'Chest1' => 'Kettenrüstung des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Kettenstulpen des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Kettenhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Kettenbeinlinge des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Kettenschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
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

$lang['ItemSets_Set']['Arena_3']['Jäger'] = array(
		'Chest1' => 'Kettenrüstung des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Kettenstulpen des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Kettenhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Kettenbeinlinge des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Kettenschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
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

$lang['ItemSets_Set']['Arena_1']['Schurke'] = array(
		'Chest1' => 'Ledertunika des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Lederhandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Lederhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Lederbeinschützer des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Lederschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
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

$lang['ItemSets_Set']['Arena_2']['Schurke'] = array(
		'Chest1' => 'Ledertunika des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Lederhandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Lederhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Lederbeinschützer des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Lederschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
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

$lang['ItemSets_Set']['Arena_3']['Schurke'] = array(
		'Chest1' => 'Ledertunika des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Lederhandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Lederhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Lederbeinschützer des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Lederschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
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

$lang['ItemSets_Set']['Arena_1']['Druide'] = array(
		'Chest1' => 'Kodobalgtunika des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Kodobalghandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Kodobalghelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Kodobalgbeinschützer des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Kodobalgschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Drachenledertunika des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands2' => 'Drachenlederhandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head2'  => 'Drachenlederhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Drachenlederbeinschützer des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Drachenlederschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Wyrmbalgtunika des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands3' => 'Wyrmbalghandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head3'  => 'Wyrmbalghelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs3'  => 'Wyrmbalgbeinschützer des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder3' => 'Wyrmbalgschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1'
);

$lang['ItemSets_Set']['Arena_2']['Druide'] = array(
		'Chest1' => 'Kodobalgtunika des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Kodobalghandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Kodobalghelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Kodobalgbeinschützer des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Kodobalgschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Drachenledertunika des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands2' => 'Drachenlederhandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head2'  => 'Drachenlederhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs2'  => 'Drachenlederbeinschützer des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder2' => 'Drachenlederschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Wyrmbalgtunika des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands3' => 'Wyrmbalghandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head3'  => 'Wyrmbalghelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs3'  => 'Wyrmbalgbeinschützer des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder3' => 'Wyrmbalgschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
);

$lang['ItemSets_Set']['Arena_3']['Druide'] = array(
		'Chest1' => 'Kodobalgtunika des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Kodobalghandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Kodobalghelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Kodobalgbeinschützer des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Kodobalgschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Drachenledertunika des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands2' => 'Drachenlederhandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head2'  => 'Drachenlederhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs2'  => 'Drachenlederbeinschützer des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder2' => 'Drachenlederschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Wyrmbalgtunika des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands3' => 'Wyrmbalghandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head3'  => 'Wyrmbalghelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs3'  => 'Wyrmbalgbeinschützer des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder3' => 'Wyrmbalgschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3'
);

$lang['ItemSets_Set']['Arena_1']['Schamane'] = array(
		'Chest1' => 'Gekettelte Rüstung des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gekettelte Stulpen des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gekettelter Helm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gekettelte Gamaschen des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gekettelte Schiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Panzerrüstung des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands2' => 'Panzerstulpen des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head2'  => 'Panzerhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Panzergamaschen des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Panzerschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Ringpanzerrüstung des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands3' => 'Ringpanzerstulpen des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head3'  => 'Ringpanzerhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs3'  => 'Ringpanzergamaschen des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder3' => 'Ringpanzerschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1'
);

$lang['ItemSets_Set']['Arena_2']['Schamane'] = array(
		'Chest1' => 'Gekettelte Rüstung des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Gekettelte Stulpen des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Gekettelter Helm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Gekettelte Gamaschen des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Gekettelte Schiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Panzerrüstung des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands2' => 'Panzerstulpen des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head2'  => 'Panzerhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs2'  => 'Panzergamaschen des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder2' => 'Panzerschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Ringpanzerrüstung des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands3' => 'Ringpanzerstulpen des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head3'  => 'Ringpanzerhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs3'  => 'Ringpanzergamaschen des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder3' => 'Ringpanzerschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
);

$lang['ItemSets_Set']['Arena_3']['Schamane'] = array(
		'Chest1' => 'Gekettelte Rüstung des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Gekettelte Stulpen des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Gekettelter Helm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Gekettelte Gamaschen des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Gekettelte Schiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Panzerrüstung des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands2' => 'Panzerstulpen des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head2'  => 'Panzerhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs2'  => 'Panzergamaschen des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder2' => 'Panzerschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Ringpanzerrüstung des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands3' => 'Ringpanzerstulpen des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head3'  => 'Ringpanzerhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs3'  => 'Ringpanzergamaschen des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder3' => 'Ringpanzerschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3'
);

$lang['ItemSets_Set']['Arena_1']['Priester'] = array(
		'Chest1' => 'Mondstoffrobe des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Mondstoffhandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Mondstoffkapuze des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Mondstoffgamaschen des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Mondstoffmantelung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Satinroben des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands2' => 'Satinhandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head2'  => 'Satinkapuze des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Satingamaschen des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Satinmantelung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Priester'] = array(
		'Chest1' => 'Mondstoffrobe des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Mondstoffhandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Mondstoffkapuze des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Mondstoffgamaschen des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Mondstoffmantelung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Satinroben des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands2' => 'Satinhandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head2'  => 'Satinkapuze des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs2'  => 'Satingamaschen des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder2' => 'Satinmantelung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Priester'] = array(
		'Chest1' => 'Mondstoffrobe des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Mondstoffhandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Mondstoffkapuze des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Mondstoffgamaschen des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Mondstoffmantelung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Satinroben des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands2' => 'Satinhandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head2'  => 'Satinkapuze des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs2'  => 'Satingamaschen des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder2' => 'Satinmantelung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Paladin'] = array(
		'Chest1' => 'Lamellenbrustharnisch des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Lamellenstulpen des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Lamellenhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Lamellenbeinschützer des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Lamellenschultern des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Zieratbrustschutz des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands2' => 'Zierathandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head2'  => 'Zieratkopfbedeckung des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Zieratbeinplatten des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Zieratschiftung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Schuppenharnisch des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands3' => 'Schuppenstulpen des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head3'  => 'Schuppenhelm des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs3'  => 'Schuppenbeinschützer des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder3' => 'Schuppenschultern des Gladiators|11.250 EP, 20x Arathi|Arena Season 1'
);

$lang['ItemSets_Set']['Arena_2']['Paladin'] = array(
		'Chest1' => 'Lamellenbrustharnisc des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Lamellenstulpen des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Lamellenhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Lamellenbeinschützer des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Lamellenschultern des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Zieratbrustschutz des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands2' => 'Zierathandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head2'  => 'Zieratkopfbedeckung des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs2'  => 'Zieratbeinplatten des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder2' => 'Zieratschiftung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Schuppenharnisch des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands3' => 'Schuppenstulpen des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head3'  => 'Schuppenhelm des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs3'  => 'Schuppenbeinschützer des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder3' => 'Schuppenschultern des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
);

$lang['ItemSets_Set']['Arena_3']['Paladin'] = array(
		'Chest1' => 'Lamellenbrustharnisch des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Lamellenstulpen des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Lamellenhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Lamellenbeinschützer des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Lamellenschultern des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Zieratbrustschutz des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands2' => 'Zierathandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head2'  => 'Zieratkopfbedeckung des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs2'  => 'Zieratbeinplatten des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder2' => 'Zieratschiftung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Schuppenharnisch des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands3' => 'Schuppenstulpen des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head3'  => 'Schuppenhelm des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs3'  => 'Schuppenbeinschützer des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder3' => 'Schuppenschultern des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3'
);

$lang['ItemSets_Set']['Arena_1']['Hexenmeister'] = array(
		'Chest1' => 'Schreckenszwirnrobe des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands1' => 'Schreckenszwirnhandschuhe des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head1'  => 'Schreckenszwirnkapuze des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Schreckenszwirngamaschen des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Schreckenszwirnmantelung des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Teufelsgewebte Gewandung des Gladiators|14.500 EP, 30x Arathi|Arena Season 1',
		'Hands2' => 'Teufelsgewebte Handschützer des Gladiators|10.500 EP, 20x Alterac|Arena Season 1',
		'Head2'  => 'Teufelsgewebte Gugel des Gladiators|14.500 EP, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Teufelsgewebte Beinkleider des Gladiators|14.500 EP, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Teufelsgewebte Amicia des Gladiators|11.250 EP, 20x Arathi|Arena Season 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Hexenmeister'] = array(
		'Chest1' => 'Schreckenszwirnrobe des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands1' => 'Schreckenszwirnhandschuhe des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head1'  => 'Schreckenszwirnkapuze des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs1'  => 'Schreckenszwirngamaschen des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder1' => 'Schreckenszwirnmantelung des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Teufelsgewebte Gewandung des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Hands2' => 'Teufelsgewebte Handschützer des erbarmungslosen Gladiators|978 Arenapunkte|Arena Season 2',
		'Head2'  => 'Teufelsgewebte Gugel des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Legs2'  => 'Teufelsgewebte Beinkleider des erbarmungslosen Gladiators|1.630 Arenapunkte|Arena Season 2',
		'Shoulder2' => 'Teufelsgewebte Amicia des erbarmungslosen Gladiators|1.304 Arenapunkte|Arena Season 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Hexenmeister'] = array(
		'Chest1' => 'Schreckenszwirnrobe des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands1' => 'Schreckenszwirnhandschuhe des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head1'  => 'Schreckenszwirnkapuze des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs1'  => 'Schreckenszwirngamaschen des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder1' => 'Schreckenszwirnmantelung des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Teufelsgewebte Gewandung des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Hands2' => 'Teufelsgewebte Handschützer des rachsüchtigen Gladiators|1.125 Arenapunkte|Arena Season 3',
		'Head2'  => 'Teufelsgewebte Gugel des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Legs2'  => 'Teufelsgewebte Beinkleider des rachsüchtigen Gladiators|1.875 Arenapunkte|Arena Season 3',
		'Shoulder2' => 'Teufelsgewebte Amicia des rachsüchtigen Gladiators|1.500 Arenapunkte|Arena Season 3',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

?>
