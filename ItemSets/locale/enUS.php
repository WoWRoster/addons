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
 * @author     Gorgar, PoloDude, Zeryl, Munazz, Rouven
 * @package    ItemSets
 * @subpackage LanguageFiles
 *
*/

$lang['DropsFrom'] = 'Drops from';
$lang['DropsIn'] = 'in';

//Menu localization
$lang['ItemSets'] = 'Item Sets';
$lang['ItemSets_Desc'] = 'Shows a list of all members above lvl 50 and which set items of their class-sets they have.';
$lang['All_Classes'] = 'All Classes';

// Admin localization
$lang['admin']['defaultset'] = 'Default Selected Set|Choose which set will first be shown when members choose the Item Sets addon.';
$lang['admin']['itemsets_conf'] = 'Item Sets|Display a list of all members above lvl50 and which set items of their class-sets they have.';
$lang['admin']['itemsets_lvl'] = 'Minimum Level|Displays Characters with at least this level';

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
$lang['AQ20'] = 'Ruins of Ahn\'Qiraj';
$lang['AQ40'] = 'Temple of Ahn\'Qiraj';
$lang['PVP_Rare'] = 'PvP Superior';
$lang['PVP_Epic'] = 'PvP Epic';
$lang['PVP_Level70'] = 'PvP Level 70';
$lang['Arena_1'] = 'Arena Season One';
$lang['Arena_2'] = 'Arena Season Two';
$lang['Arena_3'] = 'Arena Season Three';

// header localisations
$lang['Name'] = 'Name';
$lang['Waist'] = 'Waist';
$lang['Feet'] = 'Feet';
$lang['Wrists'] = 'Wrists';
$lang['Chest'] = 'Chest';
$lang['Hands'] = 'Hands';
$lang['Head'] = 'Head';
$lang['Legs'] = 'Legs';
$lang['Shoulder'] = 'Shoulder';
$lang['Finger'] = 'Finger';
$lang['Neck'] = 'Neck';
$lang['Trinket'] = 'Trinket';
$lang['Mainhand'] = 'Mainhand';
$lang['Back'] = 'Back';
$lang['Bag'] = 'Bag';
$lang['Separator'] = ' ';


// Dungeon Set Names
$lang['ItemSets_Set']['Dungeon_1']['Name'] = array(
		'Warrior' => 'Battlegear of Valor',
		'Priest' => 'Vestments of the Devout',
		'Druid' => 'Wildheart Raiment',
		'Rogue' => 'Shadowcraft Armor',
		'Mage' => 'Magister\'s Regalia',
		'Paladin' => 'Lightforge Armor',
		'Warlock' => 'Dreadmist Raiment',
		'Hunter' => 'Beaststalker Armor',
		'Shaman' => 'The Elements'
	);
$lang['ItemSets_Set']['Dungeon_2']['Name'] = array(
		'Warrior' => 'Battlegear of Heroism',
		'Priest' => 'Vestments of the Virtuous',
		'Druid' => 'Feralheart Raiment',
		'Rogue' => 'Darkmantle Armor',
		'Mage' => 'Sorcerer\'s Regalia',
		'Paladin' => 'Soulforge Armor',
		'Warlock' => 'Deathmist Raiment',
		'Hunter' => 'Beastmaster Armor',
		'Shaman' => 'The Five Thunders'
	);
$lang['ItemSets_Set']['Dungeon_3']['Name'] = array(
		'Warrior' => 'Bold Armor|Doomplate Battlegear',
		'Priest' => 'Hallowed Raiment|Mana-Etched Regalia',
		'Druid' => 'Moonglade Raiment|Wastewalker Armor',
		'Rogue' => 'Assassination Armor|Wastewalker Armor',
		'Mage' => 'Incanter\'s Regalia|Mana-Etched Regalia',
		'Paladin' => 'Righteous Armor|Doomplate Battlegear',
		'Warlock' => 'Oblivion Raiment|Mana-Etched Regalia',
		'Hunter' => 'Beast Lord Armor|Desolation Battlegear',
		'Shaman' => 'Tidefury Raiment|Desolation Battlegear'
	);	   

// Tier Raid Set Names
$lang['ItemSets_Set']['Tier_1']['Name'] = array(
		'Warrior' => 'Battlegear of Might',
		'Priest' => 'Vestments of Prophecy',
		'Druid' => 'Cenarion Raiment',
		'Rogue' => 'Nightslayer Armor',
		'Mage' => 'Arcanist Regalia',
		'Paladin' => 'Lawbringer Armor',
		'Warlock' => 'Felheart Raiment',
		'Hunter' => 'Giantstalker Armor',
		'Shaman' => 'The Earthfury'
	);
$lang['ItemSets_Set']['Tier_2']['Name'] = array(
		'Warrior' => 'Battlegear of Wrath',
		'Priest' => 'Vestments of Transcendence',
		'Druid' => 'Stormrage Raiment',
		'Rogue' => 'Bloodfang Armor',
		'Mage' => 'Netherwind Regalia',
		'Paladin' => 'Judgement Armor',
		'Warlock' => 'Nemesis Raiment',
		'Hunter' => 'Dragonstalker Armor',
		'Shaman' => 'The Ten Storms'
	);
$lang['ItemSets_Set']['Tier_3']['Name'] = array(
		'Warrior' => 'Dreadnaught\'s Battlegear',
		'Priest' => 'Vestments of Faith',
		'Druid' => 'Dreamwalker Raiment',
		'Rogue' => 'Bonescythe Armor',
		'Mage' => 'Frostfire Regalia',
		'Paladin' => 'Redemption Armor',
		'Warlock' => 'Plagueheart Raiment',
		'Hunter' => 'Cryptstalker Armor',
		'Shaman' => 'The Earthshatterer'
	);
$lang['ItemSets_Set']['Tier_4']['Name'] = array(
		'Warrior' => 'Warbringer Battlegear (Arms/Fury)|Warbringer Armor (Protection)',
		'Priest' => 'Incarnate Raiment (Holy/Discipline)|Incarnate Regalia (Shadow)',
		'Druid' => 'Malorne Regalia (Balance)|Malorne Harness (Feral)|Malorne Raiment (Restoration)',
		'Rogue' => 'Netherblade Armor',
		'Mage' => 'Aldor Regalia',
		'Paladin' => 'Justicar Raiment (Holy)|Justicar Armor (Protection)|Justicar Battlegear (Retribution)',
		'Warlock' => 'Voidheart Raiment',
		'Hunter' => 'Demon Stalker Armor',
		'Shaman' => 'Cyclone Regalia (Elemental) |Cyclone Harness (Enhancement)|Cyclone Raiment (Restoration)'
	);
$lang['ItemSets_Set']['Tier_5']['Name'] = array(
		'Warrior' => 'Destroyer Battlegear (Arms/Fury)|Destroyer Armor (Protection)',
		'Priest' => 'Avatar Raiment (Holy/Discipline)|Avatar Regalia (Shadow)',
		'Druid' => 'Nordrassil Regalia (Balance)|Nordrassil Harness (Feral)|Nordrassil Raiment (Restoration)',
		'Rogue' => 'Deathmantle Armor',
		'Mage' => 'Tirisfal Regalia',
		'Paladin' => 'Crystalforge Raiment (Holy)|Crystalforge Armor (Protection)|Crystalforge Battlegear (Retribution)',
		'Warlock' => 'Corruptor Raiment',
		'Hunter' => 'Rift Stalker Armor',
		'Shaman' => 'Cataclysm Regalia (Elemental)|Cataclysm Harness (Enhancement)|Cataclysm Raiment (Restoration)'
	);
$lang['ItemSets_Set']['Tier_6']['Name'] = array(
		'Warrior' => 'Onslaught Battlegear (Arms/Fury)|Onslaught Armor (Protection)',
		'Priest' => 'Vestments of Absolution (Holy/Discipline)|Absolution Regalia (Shadow)',
		'Druid' => 'Thunderheart Regalia (Balance)|Thunderheart Harness (Feral)|Thunderheart Raiment (Restoration)',
		'Rogue' => 'Slayer\'s Armor',
		'Mage' => 'Tempest Regalia',
		'Paladin' => 'Lightbringer Raiment (Holy)|Lightbringer Armor (Protection)|Lightbringer Battlegear (Retribution)',
		'Warlock' => 'Malefic Raiment',
		'Hunter' => 'Gronn Stalker Armor',
		'Shaman' => 'Skyshatter Regalia (Elemental)|Skyshatter Harness (Enhancement)|Skyshatter Raiment (Restoration)'
	);

// Ruins of Ahn'Qiraj Set Names
$lang['ItemSets_Set']['AQ20']['Name'] = array(
		'Warrior' => 'Battlegear of Unyielding Strength',
		'Priest' => 'Finery of Infinite Wisdom',
		'Druid' => 'Symbols of Unending Life',
		'Rogue' => 'Emblems of Veiled Shadows',
		'Mage' => 'Trappings of Vaulted Secrets',
		'Paladin' => 'Battlegear of Eternal Justice',
		'Warlock' => 'Implements of Unspoken Names',
		'Hunter' => 'Trappings of the Unseen Path',
		'Shaman' => 'Gift of the Gathering Storm'
	);

// Temple of Ahn'Qiraj Set Names
$lang['ItemSets_Set']['AQ40']['Name'] = array(
		'Warrior' => 'Conqueror\'s Battlegear',
		'Priest' => 'Garments of the Oracle',
		'Druid' => 'Genesis Raiment',
		'Rogue' => 'Deathdealer\'s Embrace',
		'Mage' => 'Enigma Vestments',
		'Paladin' => 'Avenger\'s Battlegear',
		'Warlock' => 'Doomcaller\'s Attire',
		'Hunter' => 'Striker\'s Garb',
		'Shaman' => 'Stormcaller\'s Garb'
	);

// Zul'Gurub Set Names
$lang['ItemSets_Set']['ZG']['Name'] = array(
		'Warrior' => 'Vindicator\'s Battlegear',
		'Priest' => 'Confessor\'s Raiment',
		'Druid' => 'Haruspex\'s Garb',
		'Rogue' => 'Madcap\'s Outfit',
		'Mage' => 'Illusionist\'s Attire',
		'Paladin' => 'Freethinker\'s Armor',
		'Warlock' => 'Demoniac\'s Threads',
		'Hunter' => 'Predator\'s Armor',
		'Shaman' => 'Augur\'s Regalia'
	);

// PvP Rare Set Names
$lang['ItemSets_Set']['PVP_Rare']['A']['Name'] = array(
		'Warrior' => 'Lieutenant Commander\'s Battlearmor',
		'Priest' => 'Lieutenant Commander\'s Investiture',
		'Druid' => 'Lieutenant Commander\'s Refuge',
		'Rogue' => 'Lieutenant Commander\'s Guard',
		'Mage' => 'Lieutenant Commander\'s Arcanum',
		'Paladin' => 'Lieutenant Commander\'s Redoubt',
		'Warlock' => 'Lieutenant Commander\'s Dreadgear',
		'Hunter' => 'Lieutenant Commander\'s Pursuance',
		'Shaman' => 'Lieutenant Commander\'s Earthshaker'
	);
$lang['ItemSets_Set']['PVP_Rare']['H']['Name'] = array(
		'Warrior' => 'Champion\'s Battlearmor',
		'Priest' => 'Champion\'s Investiture',
		'Druid' => 'Champion\'s Sanctuary',
		'Rogue' => 'Champion\'s Guard',
		'Mage' => 'Champion\'s Arcanum',
		'Paladin' => 'Champion\'s Redoubt',
		'Warlock' => 'Champion\'s Dreadgear',
		'Hunter' => 'Champion\'s Pursuance',
		'Shaman' => 'Champion\'s Stormcaller'
	);
	
// PvP Epic Set Names
$lang['ItemSets_Set']['PVP_Epic']['A']['Name'] = array(
		'Warrior' => 'Field Marshal\'s Battlegear',
		'Priest' => 'Field Marshal\'s Raiment',
		'Druid' => 'Field Marshal\'s Sanctuary',
		'Rogue' => 'Field Marshal\'s Vestments',
		'Mage' => 'Field Marshal\'s Regalia',
		'Paladin' => 'Field Marshal\'s Aegis',
		'Warlock' => 'Field Marshal\'s Threads',
		'Hunter' => 'Field Marshal\'s Pursuit',
		'Shaman' => 'Field Marshal\'s Earthshaker'
	);

$lang['ItemSets_Set']['PVP_Epic']['H']['Name'] = array(
		'Warrior' => 'Warlord\'s Battlegear',
		'Priest' => 'Warlord\'s Raiment',
		'Druid' => 'Warlord\'s Sanctuary',
		'Rogue' => 'Warlord\'s Vestments',
		'Mage' => 'Warlord\'s Regalia',
		'Paladin' => 'Warlord\'s Aegis',
		'Warlock' => 'Warlord\'s Threads',
		'Hunter' => 'Warlord\'s Pursuit',
		'Shaman' => 'Warlord\'s Earthshaker'
	);

// PvP Level 70 Set Names
$lang['ItemSets_Set']['PVP_Level70']['Name'] = array(
		'Warrior' => 'High Warlord\'s Battlegear',
		'Priest' => 'High Warlord\'s Investiture (Holy/Discipline)|High Warlord\'s Raiment (Shadow)',
		'Druid' => 'High Warlord\'s Sanctuary (Resto)|High Warlord\'s Refuge (Feral)|High Warlord\'s Wildhide (Balance)',
		'Rogue' => 'High Warlord\'s Vestments',
		'Mage' => 'High Warlord\'s Regalia',
		'Paladin' => 'High Warlord\'s Aegis (Protection)|High Warlord\'s Redemption (Holy)|High Warlord\'s Vindication (Retribution)',
		'Warlock' => 'High Warlord\'s Dreadgear',
		'Hunter' => 'High Warlord\'s Pursuit',
		'Shaman' => 'High Warlord\'s Earthshaker (Enhancement)|High Warlord\'s Thunderfist (Elemental)|High Warlord\'s Wartide (Restoration)'
	);

// Arena Season Set Names
$lang['ItemSets_Set']['Arena_1']['Name'] = array(
		'Warrior' => 'Gladiator\'s Battlegear',
		'Priest' => 'Gladiator\'s Raiment (Shadow)|Gladiator\'s Investiture (Holy/Discipline)',
		'Druid' => 'Gladiator\'s Sanctuary (Feral)|Gladiator\'s Refuge(Resto)|Gladiator\'s Wildhide (Balance)',
		'Rogue' => 'Gladiator\'s Vestments',
		'Mage' => 'Gladiator\'s Regalia',
		'Paladin' => 'Gladiator\'s Aegis (Protection)|Gladiator\'s Redemption (Holy) |Gladiator\'s Vindication (Retribution)',
		'Warlock' => 'Gladiator\'s Dreadgear|Gladiator\'s Felshroud',
		'Hunter' => 'Gladiator\'s Pursuit',
		'Shaman' => 'Gladiator\'s Earthshaker (Enhancement)|Gladiator\'s Wartide (Restoration)|Gladiator\'s Thunderfist (Elemental)'
	);	  

$lang['ItemSets_Set']['Arena_2']['Name'] = array(
		'Warrior' => 'Merciless Gladiator\'s Battlegear',
		'Priest' => 'Merciless Gladiator\'s Raiment (Shadow)|Merciless Gladiator\'s Investiture (Holy/Discipline)',
		'Druid' => 'Merciless Gladiator\'s Sanctuary (Feral)|Merciless Gladiator\'s Refuge (Resto)|Merciless Gladiator\'s Wildhide (Balance)',
		'Rogue' => 'Merciless Gladiator\'s Vestments',
		'Mage' => 'Merciless Gladiator\'s Regalia',
		'Paladin' => 'Merciless Gladiator\'s Aegis (Protection)|Merciless Gladiator\'s Redemption (Holy) |Merciless Gladiator\'s Vindication (Retribution)',
		'Warlock' => 'Merciless Gladiator\'s Dreadgear|Merciless Gladiator\'s Felshroud',
		'Hunter' => 'Merciless Gladiator\'s Pursuit',
		'Shaman' => 'Merciless Gladiator\'s Earthshaker (Enhancement)|Merciless Gladiator\'s Wartide (Restoration)|Merciless Gladiator\'s Thunderfist (Elemental)'
	);	

$lang['ItemSets_Set']['Arena_3']['Name'] = array(
		'Warrior' => 'Vengeful Gladiator\'s Battlegear',
		'Priest' => 'Vengeful Gladiator\'s Raiment (Shadow)|Vengeful Gladiator\'s Investiture (Holy/Discipline)',
		'Druid' => 'Vengeful Gladiator\'s Sanctuary (Feral)|Vengeful Gladiator\'s Refuge (Resto)|Vengeful Gladiator\'s Wildhide (Balance)',
		'Rogue' => 'Vengeful Gladiator\'s Vestments',
		'Mage' => 'Vengeful Gladiator\'s Regalia',
		'Paladin' => 'Vengeful Gladiator\'s Aegis (Protection)|Vengeful Gladiator\'s Redemption (Holy) |Vengeful Gladiator\'s Vindication (Retribution)',
		'Warlock' => 'Vengeful Gladiator\'s Dreadgear|Vengeful Gladiator\'s Felshroud',
		'Hunter' => 'Vengeful Gladiator\'s Pursuit',
		'Shaman' => 'Vengeful Gladiator\'s Earthshaker (Enhancement)|Vengeful Gladiator\'s Wartide (Restoration)|Vengeful Gladiator\'s Thunderfist (Elemental)'
	);	


// Dungeon 1 Set
$lang['ItemSets_Set']['Dungeon_1']['Warrior'] = array(
		'Waist' => 'Belt of Valor|Highlord Omokk|Lower Blackrock Spire',
		'Feet' => 'Boots of Valor|Kirtonos the Herald|Scholomance',
		'Wrist' => 'Bracers of Valor|Random-Drop|Blackrock Spire',
		'Chest' => 'Breastplate of Valor|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gauntlets of Valor|Ramstein the Gorger|Stratholme East',
		'Head' => 'Helm of Valor|Darkmaster Gandling|Scholomance',
		'Legs' => 'Legplates of Valor|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Spaulders of Valor|Warchief Rend Blackhand|Upper Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Priest'] = array(
		'Waist' => 'Devout Belt|Random-Drop|Blackrock Spire',
		'Feet' => 'Devout Sandals|Maleki the Pallid|Stratholme East',
		'Wrist' => 'Devout Bracers|Random-Drop|Stratholme',
		'Chest' => 'Devout Robe|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Devout Gloves|Archivist Galford|Stratholme West',
		'Head' => 'Devout Crown|Darkmaster Gandling|Scholomance',
		'Legs' => 'Devout Skirt|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Devout Mantle|Solakar Flamewreath|Upper Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Druid'] = array(
		'Waist' => 'Wildheart Belt|Random-Drop|Scholomance',
		'Feet' => 'Wildheart Boots|Mother Smolderweb|Lower Blackrock Spire',
		'Wrist' => 'Wildheart Bracers|Random-Drop|Stratholme',
		'Chest' => 'Wildheart Vest|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Wildheart Gloves|Random-Drop|Blackrock Spire',
		'Head' => 'Wildheart Cowl|Darkmaster Gandling|Scholomance',
		'Legs' => 'Wildheart Kilt|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Wildheart Spaulders|Gizrul the Slavener|Lower Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Rogue'] = array(
		'Waist' => 'Shadowcraft Belt|Random-Drop|Blackrock Spire',
		'Feet' => 'Shadowcraft Boots|Rattlegore|Scholomance',
		'Wrist' => 'Shadowcraft Bracers|Random-Drop|Scholomance',
		'Chest' => 'Shadowcraft Tunic|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Shadowcraft Gloves|Shadow Hunter Vosh\\\'gajin|Lower Blackrock Spire',
		'Head' => 'Shadowcraft Cap|Darkmaster Gandling|Scholomance',
		'Legs' => 'Shadowcraft Pants|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Shadowcraft Spaulders|Cannon Master Willey|Stratholme West'
	);
$lang['ItemSets_Set']['Dungeon_1']['Mage'] = array(
		'Waist' => 'Magister\\\'s Belt|Random-Drop|Stratholme',
		'Feet' => 'Magister\\\'s Boots|Postmaster Malown|Stratholme West',
		'Wrist' => 'Magister\\\'s Bindings|Random-Drop|Blackrock Spire',
		'Chest' => 'Magister\\\'s Robes|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Magister\\\'s Gloves|Random-Drop|Scholomance',
		'Head' => 'Magister\\\'s Crown|Darkmaster Gandling|Scholomance',
		'Legs' => 'Magister\\\'s Leggings|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Magister\\\'s Mantle|Ras Frostwhisper|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Paladin'] = array(
		'Waist' => 'Lightforge Belt|Random-Drop|Stratholme',
		'Feet' => 'Lightforge Boots|Balnazzar|Stratholme West',
		'Wrist' => 'Lightforge Bracers|Random-Drop|Scholomance',
		'Chest' => 'Lightforge Breastplate|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Lightforge Gauntlets|Emperor Dagran Thaurissan|Blackrock Depths',
		'Head' => 'Lightforge Helm|Darkmaster Gandling|Scholomance',
		'Legs' => 'Lightforge Legplates|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Lightforge Spaulders|The Beast|Upper Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Warlock'] = array(
		'Waist' => 'Dreadmist Belt|Random-Drop|Stratholme',
		'Feet' => 'Dreadmist Sandals|Baroness Anastari|Stratholme East',
		'Wrist' => 'Dreadmist Bracers|Random-Drop|Blackrock Spire',
		'Chest' => 'Dreadmist Robe|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Dreadmist Wraps|Random-Drop|Scholomance',
		'Head' => 'Dreadmist Mask|Darkmaster Gandling|Scholomance',
		'Legs' => 'Dreadmist Leggings|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Dreadmist Mantle|Jandice Barov|Scholomance'
	);
$lang['ItemSets_Set']['Dungeon_1']['Hunter'] = array(
		'Waist' => 'Beaststalker\\\'s Belt|Random-Drop|Blackrock Spire',
		'Feet' => 'Beaststalker\\\'s Boots|Nerub\\\'enkan|Stratholme Live',
		'Wrist' => 'Beaststalker\\\'s Bindings|Random-Drop|Stratholme',
		'Chest' => 'Beaststalker\\\'s Tunic|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Beaststalker\\\'s Gloves|War Master Voone|Lower Blackrock Spire',
		'Head' => 'Beaststalker\\\'s Cap|Darkmaster Gandling|Scholomance',
		'Legs' => 'Beaststalker\\\'s Pants|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Beaststalker\\\'s Mantle|Overlord Wyrmthalak|Lower Blackrock Spire'
	);
$lang['ItemSets_Set']['Dungeon_1']['Shaman'] = array(
		'Waist' => 'Cord of Elements|Random-Drop|Blackrock Spire',
		'Feet' => 'Boots of Elements|Urok Doomhowl|Lower Blackrock Spire',
		'Wrist' => 'Bindings of Elements|Random-Drop|Stratholme',
		'Chest' => 'Vest of Elements|General Drakkisath|Upper Blackrock Spire',
		'Hands' => 'Gauntlets of Elements|Pyroguard Emberseer|Upper Blackrock Spire',
		'Head' => 'Coif of Elements|Darkmaster Gandling|Scholomance',
		'Legs' => 'Kilt of Elements|Baron Rivendare|Stratholme East',
		'Shoulder' => 'Pauldrons of Elements|Gyth|Upper Blackrock Spire'
	);

// Dungeon 2 Set
$lang['ItemSets_Set']['Dungeon_2']['Druid'] = array(
		'Waist' => 'Feralheart Belt|Quest|Somewhere',
		'Feet'  => 'Feralheart Boots|Quest|Somewhere',
		'Wrist' => 'Feralheart Bracers|Quest|Somewhere',
		'Chest' => 'Feralheart Vest|Quest|Somewhere',
		'Hands' => 'Feralheart Gloves|Quest|Somewhere',
		'Head'  => 'Feralheart Cowl|Quest|Somewhere',
		'Legs'  => 'Feralheart Kilt|Quest|Somewhere',
		'Shoulder' => 'Feralheart Spaulders|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Hunter'] = array(
		'Waist' => 'Beastmaster\\\'s Belt|Quest|Somewhere',
		'Feet'  => 'Beastmaster\\\'s Boots|Quest|Somewhere',
		'Wrist' => 'Beastmaster\\\'s Bindings|Quest|Somewhere',
		'Chest' => 'Beastmaster\\\'s Tunic|Quest|Somewhere',
		'Hands' => 'Beastmaster\\\'s Gloves|Quest|Somewhere',
		'Head'  => 'Beastmaster\\\'s Cap|Quest|Somewhere',
		'Legs'  => 'Beastmaster\\\'s Pants|Quest|Somewhere',
		'Shoulder' => 'Beastmaster\\\'s Mantle|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Mage'] = array(
		'Waist' => 'Sorcerer\\\'s Belt|Quest|Somewhere',
		'Feet'  => 'Sorcerer\\\'s Boots|Quest|Somewhere',
		'Wrist' => 'Sorcerer\\\'s Bindings|Quest|Somewhere',
		'Chest' => 'Sorcerer\\\'s Robe|Quest|Somewhere',
		'Hands' => 'Sorcerer\\\'s Gloves|Quest|Somewhere',
		'Head'  => 'Sorcerer\\\'s Crown|Quest|Somewhere',
		'Legs'  => 'Sorcerer\\\'s Leggings|Quest|Somewhere',
		'Shoulder' => 'Sorcerer\\\'s Mantle|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Paladin'] = array(
		'Waist' => 'Soulforge Belt|Quest|Somewhere',
		'Feet'  => 'Soulforge Boots|Quest|Somewhere',
		'Wrist' => 'Soulforge Bracers|Quest|Somewhere',
		'Chest' => 'Soulforge Breastplate|Quest|Somewhere',
		'Hands' => 'Soulforge Gauntlets|Quest|Somewhere',
		'Head'  => 'Soulforge Helm|Quest|Somewhere',
		'Legs'  => 'Soulforge Legplates|Quest|Somewhere',
		'Shoulder' => 'Soulforge Spaulders|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Priest'] = array(
		'Waist' => 'Virtuous Belt|Quest|Somewhere',
		'Feet'  => 'Virtuous Sandals|Quest|Somewhere',
		'Wrist' => 'Virtuous Bracers|Quest|Somewhere',
		'Chest' => 'Virtuous Robe|Quest|Somewhere',
		'Hands' => 'Virtuous Gloves|Quest|Somewhere',
		'Head'  => 'Virtuous Crown|Quest|Somewhere',
		'Legs'  => 'Virtuous Skirt|Quest|Somewhere',
		'Shoulder' => 'Virtuous Mantle|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Rogue'] = array(
		'Waist' => 'Darkmantle Belt|Quest|Somewhere',
		'Feet'  => 'Darkmantle Boots|Quest|Somewhere',
		'Wrist' => 'Darkmantle Bracers|Quest|Somewhere',
		'Chest' => 'Darkmantle Tunic|Quest|Somewhere',
		'Hands' => 'Darkmantle Gloves|Quest|Somewhere',
		'Head'  => 'Darkmantle Cap|Quest|Somewhere',
		'Legs'  => 'Darkmantle Pants|Quest|Somewhere',
		'Shoulder' => 'Darkmantle Spaulders|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Shaman'] = array(
		'Waist' => 'Cord of The Five Thunders|Quest|Somewhere',
		'Feet'  => 'Boots of The Five Thunders|Quest|Somewhere',
		'Wrist' => 'Bindings of The Five Thunders|Quest|Somewhere',
		'Chest' => 'Vest of The Five Thunders|Quest|Somewhere',
		'Hands' => 'Gauntlets of The Five Thunders|Quest|Somewhere',
		'Head'  => 'Coif of The Five Thunders|Quest|Somewhere',
		'Legs'  => 'Kilt of The Five Thunders|Quest|Somewhere',
		'Shoulder' => 'Pauldrons of The Five Thunders|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Warlock'] = array(
		'Waist' => 'Deathmist Belt|Quest|Somewhere',
		'Feet'  => 'Deathmist Sandals|Quest|Somewhere',
		'Wrist' => 'Deathmist Bracers|Quest|Somewhere',
		'Chest' => 'Deathmist Robe|Quest|Somewhere',
		'Hands' => 'Deathmist Wraps|Quest|Somewhere',
		'Head'  => 'Deathmist Mask|Quest|Somewhere',
		'Legs'  => 'Deathmist Leggings|Quest|Somewhere',
		'Shoulder' => 'Deathmist Mantle|Quest|Somewhere'
);
$lang['ItemSets_Set']['Dungeon_2']['Warrior'] = array(
		'Waist' => 'Belt of Heroism|Quest|Somewhere',
		'Feet'  => 'Boots of Heroism|Quest|Somewhere',
		'Wrist' => 'Bracers of Heroism|Quest|Somewhere',
		'Chest' => 'Breastplate of Heroism|Quest|Somewhere',
		'Hands' => 'Gauntlets of Heroism|Quest|Somewhere',
		'Head'  => 'Helm of Heroism|Quest|Somewhere',
		'Legs'  => 'Legplates of Heroism|Quest|Somewhere',
		'Shoulder' => 'Spaulders of Heroism|Quest|Somewhere'
);

// Dungeon 3 Set
$lang['ItemSets_Set']['Dungeon_3']['Warrior'] = array(
		'Chest1' => 'Breastplate of the Bold|Harbinger Skyriss|The Arcatraz',
		'Hands1' => 'Gauntlets of the Bold|Warlord Kalithresh|The Steamvault',
		'Head1'  => 'Warhelm of the Bold|Warp Splinter|The Botanica',
		'Legs1'  => 'Legplates of the Bold|Aeonus|The Black Morass',
		'Shoulder1' => 'Shoulderguards of the Bold|Murmur|Shadow Labyrinth',
		'Separator1' => '-setname-',
		'Chest2' => 'Doomplate Chestguard|Harbinger Skyriss|The Arcatraz',
		'Hands2' => 'Doomplate Gauntlets|Keli\\\'dan the Breaker|Blood Furnace (Heroic)',
		'Head2'  => 'Doomplate Warhelm|Epoch Hunter|Durnholde (Heroic)',
		'Legs2'  => 'Doomplate Legguards|Exarch Maladaar|Auchenai Crypts (Heroic)',
		'Shoulder2' => 'Doomplate Shoulderguards|The Black Stalker|Underbog (Heroic)'
);

$lang['ItemSets_Set']['Dungeon_3']['Priest'] = array(
		'Chest1' => 'Hallowed Garments|Murmur|The Shadow Labyrinth',
		'Hands1' => 'Hallowed Handwraps|Kargath Bladefist|Shattered Halls',
		'Head1'  => 'Hallowed Crown|Harbinger Skyriss|Arcatraz',
		'Legs1'  => 'Hallowed Trousers|Talon King Ikiss|Sethekk Halls',
		'Shoulder1' => 'Hallowed Pauldrons|Grandmaster Vorpil|Shadow Labyrinth',
		'Separator1' => '-setname-',
		'Chest2' => 'Mana-Etched Vestments|Epoch Hunter|Old Hillsbrad Foothills (Heroic)',
		'Hands2' => 'Mana-Etched Gloves|Omor the Unscarred|Hellfire Ramparts (Heroic)',
		'Head2'  => 'Mana-Etched Crown|Aeonus|The Black Morass',
		'Legs2'  => 'Mana-Etched Pantaloons|The Black Stalker|The Underbog (Heroic)',
		'Shoulder2' => 'Mana-Etched Spaulders|Quagmirran|The Slave Pens (Heroic)'
);

$lang['ItemSets_Set']['Dungeon_3']['Druid'] = array(
		'Chest1' => 'Moonglade Robe|Pathaleon the Calculator|The Mechanar',
		'Hands1' => 'Moonglade Handwraps|Blackheart the Inciter|Shadow Labyrinth',
		'Head1'  => 'Moonglade Cowl|Warp Splinter|The Botanica',
		'Legs1'  => 'Moonglade Pants|Aeonus|Opening the Dark Portal',
		'Shoulder1' => 'Moonglade Shoulders|Warlord Kalithresh|The Steamvault',
		'Separator1' => '-setname-',
		'Chest2' => 'Wastewalker Tunic|Keli\\\'dan the Breaker|Blood Furnace (Heroic)',
		'Hands2' => 'Wastewalker Gloves|Kargath Bladefist|The Shattered Halls',
		'Head2'  => 'Wastewalker Helm|Epoch Hunter|Durnholde Keep(Heroic)',
		'Legs2'  => 'Wastewalker Leggings|Aeonus|Black Morass (Herioc)',
		'Shoulder2' => 'Wastewalker Shoulderpads|Warlord Kalithresh|The Steamvault (Herioc)'		
);

$lang['ItemSets_Set']['Dungeon_3']['Rogue'] = array(
		'Chest1' => 'Tunic of Assassination|Pathaleon the Calculator|The Mechanar',
		'Hands1' => 'Handgrips of Assassination|Aeonus|The Black Morass',
		'Head1'  => 'Helm of Assassination|Harbinger Skyriss|The Arcatraz',
		'Legs1'  => 'Leggings of Assassination|Murmur|Shadow Labyrinth',
		'Shoulder1' => 'Shoulderpads of Assassination|Talon King Ikiss|Sethekk Halls',
		'Separator1' => '-setname-',
		'Chest2' => 'Wastewalker Tunic|Keli\\\'dan the Breaker|Blood Furnace (Heroic)',
		'Hands2' => 'Wastewalker Gloves|Kargath Bladefist|The Shattered Halls',
		'Head2'  => 'Wastewalker Helm|Epoch Hunter|Durnholde Keep(Heroic)',
		'Legs2'  => 'Wastewalker Leggings|Aeonus|Black Morass (Herioc)',
		'Shoulder2' => 'Wastewalker Shoulderpads|Warlord Kalithresh|The Steamvault (Herioc)'		
);

$lang['ItemSets_Set']['Dungeon_3']['Mage'] = array(
		'Chest1' => 'Incanter\\\'s Robe|Warp Splinter|The Botanica',
		'Hands1' => 'Incanter\\\'s Gloves|Hydromancer Thespia|The Steamvault',
		'Head1'  => 'Incanter\\\'s Cowl|Pathaleon the Calculator|The Mechanar',
		'Legs1'  => 'Incanter\\\'s Trousers|Talon King Ikiss|Sethekk Halls',
		'Shoulder1' => 'Incanter\\\'s Pauldrons|Warlord Kalithresh|The Steamvault',
		'Separator1' => '-setname-',
		'Chest2' => 'Mana-Etched Vestments|Epoch Hunter|Old Hillsbrad Foothills (Heroic)',
		'Hands2' => 'Mana-Etched Gloves|Omor the Unscarred|Hellfire Ramparts (Heroic)',
		'Head2'  => 'Mana-Etched Crown|Aeonus|The Black Morass',
		'Legs2'  => 'Mana-Etched Pantaloons|The Black Stalker|The Underbog (Heroic)',
		'Shoulder2' => 'Mana-Etched Spaulders|Quagmirran|The Slave Pens (Heroic)'
);

$lang['ItemSets_Set']['Dungeon_3']['Paladin'] = array(
		'Chest1' => 'Breastplate of the Righteous|Warlord Kalithresh|The Steamvault',
		'Hands1' => 'Gauntlets of the Righteous|Warchief Kargath Bladefist|The Shattered Halls',
		'Head1'  => 'Helm of the Righteous|Pathaleon the Calculator|The Mechanar',
		'Legs1'  => 'Legplates of the Righteous|Aeonus|Opening the Dark Portal',
		'Shoulder1' => 'Spaulders of the Righteous|Laj|The Botanica',
		'Separator1' => '-setname-',
		'Chest2' => 'Doomplate Chestguard|Harbinger Skyriss|The Arcatraz',
		'Hands2' => 'Doomplate Gauntlets|Keli\\\'dan the Breaker|Blood Furnace (Heroic)',
		'Head2'  => 'Doomplate Warhelm|Epoch Hunter|Durnholde (Heroic)',
		'Legs2'  => 'Doomplate Legguards|Exarch Maladaar|Auchenai Crypts (Heroic)',
		'Shoulder2' => 'Doomplate Shoulderguards|The Black Stalker|Underbog (Heroic)'
);

$lang['ItemSets_Set']['Dungeon_3']['Warlock'] = array(
		'Chest1' => 'Robe of Oblivion|Murmur|Shadow Labyrinth',
		'Hands1' => 'Gloves of Oblivion|Kargath Bladefist|Shattered Halls',
		'Head1'  => 'Hood of Oblivion|Harbinger Skyriss|Arcatraz',
		'Legs1'  => 'Trousers of Oblivion|Talon King Ikiss|Sethekk Halls',
		'Shoulder1' => 'Spaulders of Oblivion|Murmur|Shadow Labyrinth',
		'Separator1' => '-setname-',
		'Chest2' => 'Mana-Etched Vestments|Epoch Hunter|Old Hillsbrad Foothills (Heroic)',
		'Hands2' => 'Mana-Etched Gloves|Omor the Unscarred|Hellfire Ramparts (Heroic)',
		'Head2'  => 'Mana-Etched Crown|Aeonus|The Black Morass',
		'Legs2'  => 'Mana-Etched Pantaloons|The Black Stalker|The Underbog (Heroic)',
		'Shoulder2' => 'Mana-Etched Spaulders|Quagmirran|The Slave Pens (Heroic)'		
);

$lang['ItemSets_Set']['Dungeon_3']['Hunter'] = array(
		'Chest1' => 'Beast Lord Curiass|Warp Splinter|Botanica',
		'Hands1' => 'Beast Lord Handguards|Warchief Kargath Bladefist|The Shattered Halls',
		'Head1'  => 'Beast Lord Helm|Pathaleon the Calculator|The Mechanar',
		'Legs1'  => 'Beast Lord Leggings|Warlord Kalithresh|The Steamvault',
		'Shoulder1' => 'Beast Lord Mantle|Warlord Kalithresh|The Steamvault',
		'Separator1' => '-setname-',
		'Chest2' => 'Hauberk of Desolation|Epoch Hunter|Durnholde Keep (Heroic)',
		'Hands2' => 'Gauntlets of Desolation|Warchief Kargath Bladefist|The Shattered Halls',
		'Head2'  => 'Helm of Desolation|Aeonus|The Black Morass',
		'Legs2'  => 'Greaves of Desolation|Talon King Ikiss|Sethekk Halls',
		'Shoulder2' => 'Pauldrons of Desolation|Quagmirran|Slave Pens (Heroic)'
);

$lang['ItemSets_Set']['Dungeon_3']['Shaman'] = array(
		'Chest1' => 'Tidefury Chestpiece|Harbinger Skyriss|The Arcatraz',
		'Hands1' => 'Tidefury Gauntlets|Warlord Kalithresh|The Steamvault',
		'Head1'  => 'Tidefury Helm|Warp Splinter|The Botanica',
		'Legs1'  => 'Tidefury Kilt|Murmur|Shadow Labyrinth',
		'Shoulder1' => 'Tidefury Shoulderguards|Warbringer O\\\'mrogg|The Shattered Halls',
		'Separator1' => '-setname-',
		'Chest2' => 'Hauberk of Desolation|Epoch Hunter|Durnholde Keep (Heroic)',
		'Hands2' => 'Gauntlets of Desolation|Warchief Kargath Bladefist|The Shattered Halls',
		'Head2'  => 'Helm of Desolation|Aeonus|The Black Morass',
		'Legs2'  => 'Greaves of Desolation|Talon King Ikiss|Sethekk Halls',
		'Shoulder2' => 'Pauldrons of Desolation|Quagmirran|Slave Pens (Heroic)'		
);


// Raid Tier 1 Set
$lang['ItemSets_Set']['Tier_1']['Warrior'] = array(
		'Waist' => 'Belt of Might|Random-Drop|Molten Core',
		'Feet' => 'Sabatons of Might|Gehennas|Molten Core',
		'Wrist' => 'Bracers of Might|Random-Drop|Molten Core',
		'Chest' => 'Breastplate of Might|Golemagg the Incinerator|Molten Core',
		'Hands' => 'Gauntlets of Might|Lucifron|Molten Core',
		'Head' => 'Helm of Might|Garr|Molten Core',
		'Legs' => 'Legplates of Might|Magmadar|Molten Core',
		'Shoulder' => 'Pauldrons of Might|Sulfuron Harbinger|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Priest'] = array(
		'Waist' => 'Girdle of Prophecy|Random-Drop|Molten Core',
		'Feet' => 'Boots of Prophecy|Shazzrah|Molten Core',
		'Wrist' => 'Vambraces of Prophecy|Random-Drop|Molten Core',
		'Chest' => 'Robes of Prophecy| 	Golemagg the Incinerator|Molten Core',
		'Hands' => 'Gloves of Prophecy|Gehennas|Molten Core',
		'Head' => 'Circlet of Prophecy|Garr|Molten Core',
		'Legs' => 'Pants of Prophecy|Magmadar|Molten Core',
		'Shoulder' => 'Mantle of Prophecy|Sulfuron Harbinger|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Druid'] = array(
		'Waist' => 'Cenarion Belt|Random-Drop|Molten Core',
		'Feet' => 'Cenarion Boots|Lucifron|Molten Core',
		'Wrist' => 'Cenarion Bracers|Random-Drop|Molten Core',
		'Chest' => 'Cenarion Vestments|Golemagg the Incinerator|Molten Core',
		'Hands' => 'Cenarion Gloves|Shazzrah|Molten Core',
		'Head' => 'Cenarion Helm|Garr|Molten Core',
		'Legs' => 'Cenarion Leggings|Magmadar|Molten Core',
		'Shoulder' => 'Cenarion Spaulders|Baron Geddon|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Rogue'] = array(
		'Waist' => 'Nightslayer Belt|Random-Drop|Molten Core',
		'Feet' => 'Nightslayer Boots|Shazzrah|Molten Core',
		'Wrist' => 'Nightslayer Bracelets|Random-Drop|Molten Core',
		'Chest' => 'Nightslayer Chestpiece|Golemagg the Incinerator|Molten Core',
		'Hands' => 'Nightslayer Gloves|Gehennas|Molten Core',
		'Head' => 'Nightslayer Cover|Garr|Molten Core',
		'Legs' => 'Nightslayer Pants|Magmadar|Molten Core',
		'Shoulder' => 'Nightslayer Shoulder Pads|Sulfuron Harbinger|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Mage'] = array(
		'Waist' => 'Arcanist Belt|Random-Drop|Molten Core',
		'Feet' => 'Arcanist Boots|Gehennas|Molten Core',
		'Wrist' => 'Arcanist Bindings|Random-Drop|Molten Core',
		'Chest' => 'Arcanist Robes|Golemagg the Incinerator|Molten Core',
		'Hands' => 'Arcanist Gloves|Shazzrah|Molten Core',
		'Head' => 'Arcanist Crown|Garr|Molten Core',
		'Legs' => 'Arcanist Leggings|Magmadar|Molten Core',
		'Shoulder' => 'Arcanist Mantle|Baron Geddon|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Paladin'] = array(
		'Waist' => 'Lawbringer Belt|Random-Drop|Molten Core',
		'Feet' => 'Lawbringer Boots|Lucifron|Molten Core',
		'Wrist' => 'Lawbringer Bracers|Random-Drop|Molten Core',
		'Chest' => 'Lawbringer Chestguard|Golemagg the Incinerator|Molten Core',
		'Hands' => 'Lawbringer Gauntlets|Gehennas|Molten Core',
		'Head' => 'Lawbringer Helm|Garr|Molten Core',
		'Legs' => 'Lawbringer Legplates|Magmadar|Molten Core',
		'Shoulder' => 'Lawbringer Spaulders|Baron Geddon|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Warlock'] = array(
		'Wais ' => 'Felheart Belt|Random-Drop|Molten Core',
		'Feet' => 'Felheart Slippers|Gehennas|Molten Core',
		'Wrist' => 'Felheart Bracers|Random-Drop|Molten Core',
		'Chest' => 'Felheart Robes|Golemagg der Verbrenner|Molten Core',
		'Hands' => 'Felheart Gloves|Lucifron|Molten Core',
		'Head' => 'Felheart Horns|Garr|Molten Core',
		'Legs' => 'Felheart Pants|Magmadar|Molten Core',
		'Shoulder' => 'Felheart Shoulder Pads|Baron Geddon|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Hunter'] = array(
		'Waist' => 'Giantstalker\\\'s Belt|Random-Drop|Molten Core',
		'Feet' => 'Giantstalker\\\'s Boots|Gehennas|Molten Core',
		'Wrist' => 'Giantstalker\\\'s Bracers|Random-Drop|Molten Core',
		'Chest' => 'Giantstalker\\\'s Breastplate|Golemagg the Incinerator|Molten Core',
		'Hands' => 'Giantstalker\\\'s Gloves|Shazzrah|Molten Core',
		'Head' => 'Giantstalker\\\'s Helmet|Garr|Molten Core',
		'Legs' => 'Giantstalker\\\'s Leggings|Magmadar|Molten Core',
		'Shoulder' => 'Giantstalker\\\'s Epaulets|Sulfuron Harbinger|Molten Core'
	);
$lang['ItemSets_Set']['Tier_1']['Shaman'] = array(
		'Waist' => 'Earthfury Belt|Random-Drop|Molten Core',
		'Feet' => 'Earthfury Boots|Lucifron|Molten Core',
		'Wrist' => 'Earthfury Bracers|Random-Drop|Molten Core',
		'Chest' => 'Earthfury Vestments|Golemagg the Incinerator|Molten Core',
		'Hands' => 'Earthfury Gauntlets|Gehennas|Molten Core',
		'Head' => 'Earthfury Helmet|Garr|Molten Core',
		'Legs' => 'Earthfury Legguards|Magmadar|Molten Core',
		'Shoulder' => 'Earthfury Epaulets|Baron Geddon|Molten Core'
	);
	
// Raid Tier 2 Set
$lang['ItemSets_Set']['Tier_2']['Warrior'] = array(
		'Waist' => 'Waistband of Wrath|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Sabatons of Wrath|Broodlord Lashlayer|Blackwing Lair',
		'Wrist' => 'Bracelets of Wrath|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Breastplate of Wrath|Nefarian|Blackwing Lair',
		'Hands' => 'Gauntlets of Wrath|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Helm of Wrath|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Legplates of Wrath|Ragnaros|Molten Core',
		'Shoulder' => 'Pauldrons of Wrath|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Priest'] = array(
		'Waist' => 'Belt of Transcendence|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Boots of Transcendence|Broodlord Lashlayer|Blackwing Lair',
		'Wrist' => 'Bindings of Transcendence|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Robes of Transcendence|Nefarian|Blackwing Lair',
		'Hands' => 'Handguards of Transcendence|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Halo of Transcendence|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Leggings of Transcendence|Ragnaros|Molten Core',
		'Shoulder' => 'Pauldrons of Transcendence|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Druid'] = array(
		'Waist' => 'Stormrage Belt|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Stormrage Boots|Broodlord Lashlayer|Blackwing Lair',
		'Wrist' => 'Stormrage Bracers|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Stormrage Chestguard|Nefarian|Blackwing Lair',
		'Hands' => 'Stormrage Handguards|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Stormrage Cover|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Stormrage Legguards|Ragnaros|Molten Core',
		'Shoulder' => 'Stormrage Pauldrons|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Rogue'] = array(
		'Waist' => 'Bloodfang Belt|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Bloodfang Boots|Broodlord Lashlayer|Blackwing Lair',
		'Wrist' => 'Bloodfang Bracers|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Bloodfang Chestpiece|Nefarian|Blackwing Lair',
		'Hands' => 'Bloodfang Gloves|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Bloodfang Hood|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Bloodfang Pants|Ragnaros|Molten Core',
		'Shoulder' => 'Bloodfang Spaulders|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Mage'] = array(
		'Waist' => 'Netherwind Belt|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Netherwind Boots|Broodlord Lashlayerr|Blackwing Lair',
		'Wrist' => 'Netherwind Bindings|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Netherwind Robes|Nefarian|Blackwing Lair',
		'Hands' => 'Netherwind Gloves|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Netherwind Crown|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Netherwind Pants|Ragnaros|Molten Core',
		'Shoulder' => 'Netherwind Mantle|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Paladin'] = array(
		'Waist' => 'Judgement Belt|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Judgement Sabatons|Broodlord Lashlayer|Blackwing Lair',
		'Wrist' => 'Judgement Bindings|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Judgement Breastplate|Nefarian|Blackwing Lair',
		'Hands' => 'Judgement Gauntlets|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Judgement Crown|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Judgement Legplates|Ragnaros|Molten Core',
		'Shoulder' => 'Judgement Spaulders|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Warlock'] = array(
		'Waist' => 'Nemesis Belt|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Nemesis Boots|Broodlord Lashlayer|Blackwing Lair',
		'Wrist' => 'Nemesis Bracers|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Nemesis Robes|Nefarian|Blackwing Lair',
		'Hands' => 'Nemesis Gloves|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Nemesis Skullcap|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Nemesis Leggings|Ragnaros|Molten Core',
		'Shoulder' => 'Nemesis Spaulders|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Hunter'] = array(
		'Waist' => 'Dragonstalker\\\'s Belt|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Dragonstalker\\\'s Greaves|Broodlord Lashlayerr|Blackwing Lair',
		'Wrist' => 'Dragonstalker\\\'s Bracers|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Dragonstalker\\\'s Breastplate|Nefarian|Blackwing Lair',
		'Hands' => 'Dragonstalker\\\'s Gauntlets|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Dragonstalker\\\'s Helm|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Dragonstalker\\\'s Legguards|Ragnaros|Molten Core',
		'Shoulder' => 'Dragonstalker\\\'s Spaulders|Chromaggus|Blackwing Lair'
	);
$lang['ItemSets_Set']['Tier_2']['Shaman'] = array(
		'Waist' => 'Belt of Ten Storms|Vaelastrasz the Corrupt|Blackwing Lair',
		'Feet' => 'Greaves of Ten Storms|Broodlord Lashlayerr|Blackwing Lair',
		'Wrist' => 'Bracers of Ten Storms|Razorgore the Untamed|Blackwing Lair',
		'Chest' => 'Breastplate of Ten Storms|Nefarian|Blackwing Lair',
		'Hands' => 'Gauntlets of Ten Storms|Firemaw+Ebonroc+Flamegor|Blackwing Lair',
		'Head' => 'Helmet of Ten Storms|Onyxia|Onyxia\\\'s Lair',
		'Legs' => 'Legplates of Ten Storms|Ragnaros|Molten Core',
		'Shoulder' => 'Epaulets of Ten Storms|Chromaggus|Blackwing Lair'
	);
	
// Raid Tier 3 Set
$lang['ItemSets_Set']['Tier_3']['Warrior'] = array(
	        'Head' => 'Dreadnaught Helmet|Quest|Naxxramas',
	        'Shoulder' => 'Dreadnaught Pauldrons|Quest|Naxxramas',
	        'Chest' => 'Dreadnaught Breastplate|Quest|Naxxramas',
	        'Wrist' => 'Dreadnaught Bracers|Quest|Naxxramas',
	        'Hands' => 'Dreadnaught Gauntlets|Quest|Naxxramas',
	        'Waist' => 'Dreadnaught Waistguard|Quest|Naxxramas',
	        'Feet' => 'Dreadnaught Legplates|Quest|Naxxramas',
	        'Legs' => 'Dreadnaught Sabatons|Quest|Naxxramas',
	        'Finger' => 'Ring of the Dreadnaught|Kel\\\'Thuzad|Naxxramas'
       );
$lang['ItemSets_Set']['Tier_3']['Priest'] = array(
	        'Head' => 'Circlet of Faith|Quest|Naxxramas',
	        'Shoulder' => 'Shoulderpads of Faith|Quest|Naxxramas',
	        'Chest' => 'Robe of Faith|Quest|Naxxramas',
	        'Wrist' => 'Bindings of Faith|Quest|Naxxramas',
	        'Hands' => 'Gloves of Faith|Quest|Naxxramas',
    		'Waist' => 'Belt of Faith|Quest|Naxxramas',
    		'Feet' => 'Leggings of Faith|Quest|Naxxramas',
    		'Legs' => 'Sandals of Faith|Quest|Naxxramas',
    		'Finger' => 'Ring of Faith|Kel\\\'Thuzad|Naxxramas'
   );	
$lang['ItemSets_Set']['Tier_3']['Druid'] = array(
		'Head' => 'Dreamwalker Headpiece|Quest|Naxxramas',
	        'Shoulder' => 'Dreamwalker Spaulders|Quest|Naxxramas',
    		'Chest' => 'Dreamwalker Tunic|Quest|Naxxramas',
    		'Wrist' => 'Dreamwalker Wristguards|Quest|Naxxramas',
    		'Hands' => 'Dreamwalker Handguards|Quest|Naxxramas',
    		'Waist' => 'Dreamwalker Girdle|Quest|Naxxramas',
    		'Feet' => 'Dreamwalker Legguards|Quest|Naxxramas',
    		'Legs' => 'Dreamwalker Boots|Quest|Naxxramas',
    		'Finger' => 'Ring of the Dreamwalker|Kel\\\'Thuzad|Naxxramas'
   );
$lang['ItemSets_Set']['Tier_3']['Rogue'] = array(
    		'Head' => 'Bonescythe Helmet|Quest|Naxxramas',
    		'Shoulder' => 'Bonescythe Pauldrons|Quest|Naxxramas',
    		'Chest' => 'Bonescythe Breastplate|Quest|Naxxramas',
    		'Wrist' => 'Bonescythe Bracers|Quest|Naxxramas',
    		'Hands' => 'Bonescythe Gauntlets|Quest|Naxxramas',
    		'Waist' => 'Bonescythe Waistguard|Quest|Naxxramas',
    		'Feet' => 'Bonescythe Legplates|Quest|Naxxramas',
    		'Legs' => 'Bonescythe Sabatons|Quest|Naxxramas',
    		'Finger' => 'Bonescythe Ring|Kel\\\'Thuzad|Naxxramas'
   );
$lang['ItemSets_Set']['Tier_3']['Mage'] = array(
    		'Head' => 'Frostfire Circlet|Quest|Naxxramas',
    		'Shoulder' => 'Frostfire Shoulderpads|Quest|Naxxramas',
    		'Chest' => 'Frostfire Robe|Quest|Naxxramas',
    		'Wrist' => 'Frostfire Bindings|Quest|Naxxramas',
    		'Hands' => 'Frostfire Gloves|Quest|Naxxramas',
    		'Waist' => 'Frostfire Belt|Quest|Naxxramas',
    		'Feet' => 'Frostfire Leggings|Quest|Naxxramas',
    		'Legs' => 'Frostfire Sandals|Quest|Naxxramas',
    		'Finger' => 'Frostfire Ring|Kel\\\'Thuzad|Naxxramas'
   );
$lang['ItemSets_Set']['Tier_3']['Paladin'] = array(
		'Head' => 'Redemption Headpiece|Quest|Naxxramas',
		'Shoulder' => 'Redemption Spaulders|Quest|Naxxramas',
    		'Chest' => 'Redemption Tunic|Quest|Naxxramas',
    		'Wrist' => 'Redemption Wristguards|Quest|Naxxramas',
    		'Hands' => 'Redemption Handguards|Quest|Naxxramas',
    		'Waist' => 'Redemption Girdle|Quest|Naxxramas',
    		'Feet' => 'Redemption Legguards|Quest|Naxxramas',
    		'Legs' => 'Redemption Boots|Quest|Naxxramas',
    		'Finger' => 'Ring of Redemption|Kel\\\'Thuzad|Naxxramas'
   );
$lang['ItemSets_Set']['Tier_3']['Warlock'] = array(
    		'Head' => 'Plagueheart Circlet|Quest|Naxxramas',
    		'Shoulder' => 'Plagueheart Shoulderpads|Quest|Naxxramas',
    		'Chest' => 'Plagueheart Robe|Quest|Naxxramas',
    		'Wrist' => 'Plagueheart Bindings|Quest|Naxxramas',
    		'Hands' => 'Plagueheart Gloves|Quest|Naxxramas',
    		'Waist' => 'Plagueheart Belt|Quest|Naxxramas',
    		'Feet' => 'Plagueheart Leggings|Quest|Naxxramas',
    		'Legs' => 'Plagueheart Sandals|Quest|Naxxramas',
    		'Finger' => 'Plagueheart Ring|Kel\\\'Thuzad|Naxxramas'
   );
$lang['ItemSets_Set']['Tier_3']['Hunter'] = array(
    		'Head' => 'Cryptstalker Headpiece|Quest|Naxxramas',
    		'Shoulder' => 'Cryptstalker Spaulders|Quest|Naxxramas',
    		'Chest' => 'Cryptstalker Tunic|Quest|Naxxramas',
    		'Wrist' => 'Cryptstalker Wristguards|Quest|Naxxramas',
    		'Hands' => 'Cryptstalker Handguards|Quest|Naxxramas',
    		'Waist' => 'Cryptstalker Girdle|Quest|Naxxramas',
    		'Feet' => 'Cryptstalker Legguards|Quest|Naxxramas',
    		'Legs' => 'Cryptstalker Boots|Quest|Naxxramas',
    		'Finger' => 'Ring of the Cryptstalker|Kel\\\'Thuzad|Naxxramas'
   );
$lang['ItemSets_Set']['Tier_3']['Shaman'] = array(
    		'Head' => 'Earthshatter Headpiece|Quest|Naxxramas',
    		'Shoulder' => 'Earthshatter Spaulders|Quest|Naxxramas',
    		'Chest' => 'Earthshatter Tunic|Quest|Naxxramas',
    		'Wrist' => 'Earthshatter Wristguards|Quest|Naxxramas',
    		'Hands' => 'Earthshatter Handguards|Quest|Naxxramas',
    		'Waist' => 'Earthshatter Girdle|Quest|Naxxramas',
    		'Feet' => 'Earthshatter Legguards|Quest|Naxxramas',
    		'Legs' => 'Earthshatter Boots|Quest|Naxxramas',
    		'Finger' => 'Ring of the Earthshatterer|Kel\\\'Thuzad|Naxxramas'
   );   

// Raid Tier 4 Set 
$lang['ItemSets_Set']['Tier_4']['Warrior'] = array(
		'Chest1' => 'Warbringer Breastplate|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Warbringer Gauntlets|The Curator|Karazhan',
		'Head1'  => 'Warbringer Battle-Helm|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Warbringer Greaves|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Warbringer Shoulderplates|High King Maulgar|Gruul\\\'s Lair',
		'Separator1' => '-setname-',
		'Chest2' => 'Warbringer Chestguard|Magtheridon|Magtheridon\\\'s Lair',
		'Hands2' => 'Warbringer Handguards|The Curator|Karazhan',
		'Head2'  => 'Warbringer Greathelm|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Warbringer Legguards|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder2' => 'Warbringer Shoulderguards|High King Maulgar|Gruul\\\'s Lair',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Priest'] = array(
		'Chest1' => 'Robes of the Incarnate|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Handwraps of the Incarnate|The Curator|Karazhan',
		'Head1'  => 'Light-Collar of the Incarnate|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Trousers of the Incarnate|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Light-Mantle of the Incarnate|High King Maulgar|Gruul\\\'s Lair',
		'Separator1' => '-setname-',
		'Chest2' => 'Shroud of the Incarnate|Magtheridon|Magtheridon\\\'s Lair',
		'Hands2' => 'Gloves of the Incarnate|The Curator|Karazhan',
		'Head2'  => 'Soul-Collar of the Incarnate|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Leggings of the Incarnate|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder2' => 'Soul-Mantle of the Incarnate|High King Maulgar|Gruul\\\'s Lair',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_4']['Druid'] = array(
		'Chest1' => 'Chestpiece of Malorne|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Gloves of Malorne|The Curator|Karazhan',
		'Head1'  => 'Antlers of Malorne|Prince Malchezaar|Karazhan',
		'Legs1'  => ' Britches of Malorne|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Pauldrons of Malorne|High King Maulgar|Gruul\\\'s Lair',
		'Separator1' => '-setname-',
		'Chest2' => 'Breastplate of Malorne|Magtheridon|Magtheridon\\\'s Lair',
		'Hands2' => 'Gauntlets of Malorne|The Curator|Karazhan',
		'Head2'  => 'Stag-Helm of Malorne|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Greaves of Malorne|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder2' => 'Mantle of Malorne|High King Maulgar|Gruul\\\'s Lair',
		'Separator2' => '-setname-',
		'Chest3' => 'Chestguard of Malorne|Magtheridon|Magtheridon\\\'s Lair',
		'Hands3' => 'Handguards of Malorne|The Curator|Karazhan',
		'Head3'  => 'Crown of Malorne|Prince Malchezaar|Karazhan',
		'Legs3'  => 'Legguards of Malorne|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder3' => 'Shoulderguards of Malorne|High King Maulgar|Gruul\\\'s Lair'
);

$lang['ItemSets_Set']['Tier_4']['Rogue'] = array(
		'Chest1' => 'Netherblade Chestpiece|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Netherblade Gloves|The Curator|Karazhan',
		'Head1'  => 'Netherblade Facemask|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Netherblade Breeches|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Netherblade Shoulderpads|High King Maulgar|Gruul\\\'s Lair',
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
		'Chest1' => 'Vestements of the Aldor|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Gloves of the Aldor|The Curator|Karazhan',
		'Head1'  => 'Collar of the Aldor|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Legwraps of the Aldor|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Pauldons of the Aldor|High King Maulgar|Gruul\\\'s Lair',
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
		'Chest1' => 'Justicar Chestpiece|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Justicar Gloves|The Curator|Karazhan',
		'Head1'  => 'Justicar Diadem|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Justicar Leggings|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Justicar Pauldrons|High King Maulgar|Gruul\\\'s Lair',
		'Separator1' => '-setname-',
		'Chest2' => 'Justicar Chestguard|Magtheridon|Magtheridon\\\'s Lair',
		'Hands2' => 'Justicar Handguards|The Curator|Karazhan',
		'Head2'  => 'Justicar Faceguard|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Justicar Legguards|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder2' => 'Justicar Shoulderguards|High King Maulgar|Gruul\\\'s Lair',
		'Separator2' => '-setname-',
		'Chest3' => 'Justicar Breastplate|Magtheridon|Magtheridon\\\'s Lair',
		'Hands3' => 'Justicar Gauntlets|The Curator|Karazhan',
		'Head3'  => 'Justicar Crown|Prince Malchezaar|Karazhan',
		'Legs3'  => 'Justicar Greaves|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder3' => 'Justicar Shoulderplates|High King Maulgar|Gruul\\\'s Lair'
);

$lang['ItemSets_Set']['Tier_4']['Warlock'] = array(
		'Chest1' => 'Voidheart Robe|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Voidheart Gloves|The Curator|Karazhan',
		'Head1'  => 'Voidheart Crown|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Voidheart Leggings|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Voidheart Mantle|High King Maulgar|Gruul\\\'s Lair',
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

$lang['ItemSets_Set']['Tier_4']['Hunter'] = array(
		'Chest1' => 'Demon Stalker Harness|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Demon Stalker Gauntlets|The Curator|Karazhan',
		'Head1'  => 'Demon Stalker Greathelm|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Demon Stalker Greaves|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Demon Stalker Shoulderguards|High King Maulgar|Gruul\\\'s Lair',
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

$lang['ItemSets_Set']['Tier_4']['Shaman'] = array(
		'Chest1' => 'Cyclone Chestguard|Magtheridon|Magtheridon\\\'s Lair',
		'Hands1' => 'Cyclone Handguards|The Curator|Karazhan',
		'Head1'  => 'Cyclone Faceguard|Prince Malchezaar|Karazhan',
		'Legs1'  => 'Cyclone Legguards|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder1' => 'Cyclone Shoulderguards|High King Maulgar|Gruul\\\'s Lair',
		'Separator1' => '-setname-',
		'Chest2' => 'Cyclone Breastplate|Magtheridon|Magtheridon\\\'s Lair',
		'Hands2' => 'Cyclone Gauntlets|The Curator|Karazhan',
		'Head2'  => 'Cyclone Helm|Prince Malchezaar|Karazhan',
		'Legs2'  => 'Cyclone War-Kilt|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder2' => 'Cyclone Shoulderplates',
		'Separator2' => '-setname-',
		'Chest3' => 'Cyclone Hauberk|Magtheridon|Magtheridon\\\'s Lair',
		'Hands3' => 'Cyclone Gloves|The Curator|Karazhan',
		'Head3'  => 'Cyclone Headdress|Prince Malchezaar|Karazhan',
		'Legs3'  => 'Cyclone Kilt|Gruul the Dragonkiller|Gruul\\\'s Lair',
		'Shoulder3' => 'Cyclone Shoulderpads|High King Maulgar|Gruul\\\'s Lair'
);


// Raid Tier 5 Set
$lang['ItemSets_Set']['Tier_5']['Warrior'] = array(
		'Chest1' => 'Destroyer Chestguard|Kael`Thas|The Eye',
		'Hands1' => 'Destroyer Handguards|Leotheras|Serpentshrine',
		'Head1'  => 'Destroyer Greathelm|Lady vashj|Serpentshrine',
		'Legs1'  => 'Destroyer Legguards|Karathress|Serpentshrine',
		'Shoulder1' => 'Destroyer Shoulderguards|Void Reaver|The Eye',
		'Separator1' => '-setname-',
		'Chest2' => 'Destroyer Breastplate|Kael`Thas|The Eye',
		'Hands2' => 'Destroyer Gauntlets|Leotheras|Serpentshrine',
		'Head2'  => 'Destroyer Battle-Helm|Lady vashj|Serpentshrine',
		'Legs2'  => 'Destroyer Greaves|Karathress|Serpentshrine',
		'Shoulder2' => 'Destroyer Shoulderblades|Void Reaver|The Eye',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Priest'] = array(
		'Chest1' => 'Vestments Of The Avatar|Kael`Thas|The Eye',
		'Hands1' => 'Gloves Of The Avatar|Leotheras|Serpentshrine',
		'Head1'  => 'Cowl of the Avatar|Lady vashj|Serpentshrine',
		'Legs1'  => 'Breeches Of The Avatar|Karathress|Serpentshrine',
		'Shoulder1' => 'Mantle Of The Avatar|Void Reaver|The Eye',
		'Separator1' => '-setname-',
		'Chest2' => 'Shroud Of The Avatar|Kael`Thas|The Eye',
		'Hands2' => 'Handguards Of The Avatar|Leotheras|Serpentshrine',
		'Head2'  => 'Hood Of The Avatar|Lady vashj|Serpentshrine',
		'Legs2'  => 'Leggings Of The Avatar|Karathress|Serpentshrine',
		'Shoulder2' => 'Wings Of The Avatar|Void Reaver|The Eye',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_5']['Druid'] = array(
		'Chest1' => 'Nordrassil Chestpiece|Kael`Thas|The Eye',
		'Hands1' => 'Nordrassil Gauntlets|Leotheras|Serpentshrine',
		'Head1'  => 'Nordrassil Headpiece|Lady vashj|Serpentshrine',
		'Legs1'  => 'Nordrassil Wrath-Kilt|Karathress|Serpentshrine',
		'Shoulder1' => 'Nordrassil Wrath-Mantle|Void Reaver|The Eye',
		'Separator1' => '-setname-',
		'Chest2' => 'Nordrassil Chestplate|Kael`Thas|The Eye',
		'Hands2' => 'Nordrassil Handgrips|Leotheras|Serpentshrine',
		'Head2'  => 'Nordrassil Headdress|Lady vashj|Serpentshrine',
		'Legs2'  => 'Nordrassil Feral-Kilt|Karathress|Serpentshrine',
		'Shoulder2' => 'Nordrassil Feral-Mantle|Void Reaver|The Eye',
		'Separator2' => '-setname-',
		'Chest3' => 'Nordrassil Chestguard|Kael`Thas|The Eye',
		'Hands3' => 'Nordrassil Gloves|Leotheras|Serpentshrine',
		'Head3'  => 'Nordrassil Headguard|Lady vashj|Serpentshrine',
		'Legs3'  => 'Nordrassil Life-Kilt|Karathress|Serpentshrine',
		'Shoulder3' => 'Nordrassil Life-Mantle|Void Reaver|The Eye'
);

$lang['ItemSets_Set']['Tier_5']['Rogue'] = array(
		'Chest1' => 'Deathmantle Chestguard|Kael`Thas|The Eye',
		'Hands1' => 'Deathmantle Handguards|Leotheras|Serpentshrine',
		'Head1'  => 'Deathmantle Helm|Lady vashj|Serpentshrine',
		'Legs1'  => 'Deathmantle Legguards|Karathress|Serpentshrine',
		'Shoulder1' => 'Deathmantle Shoulderpads|Void Reaver|The Eye',
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
		'Chest1' => 'Robes of Tirisfal|Kael`Thas|The Eye',
		'Hands1' => 'Gloves of Tirisfal|Leotheras|Serpentshrine',
		'Head1'  => 'Cowl of Tirisfal|Lady vashj|Serpentshrine',
		'Legs1'  => 'Leggings of Tirisfal|Karathress|Serpentshrine',
		'Shoulder1' => 'Mantle of Tirisfal|Void Reaver|The Eye',
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
		'Chest1' => 'Crystalforge Chestpiece|Kael`Thas|The Eye',
		'Hands1' => 'Crystalforge Gloves|Leotheras|Serpentshrine',
		'Head1'  => 'Crystalforge Greathelm|Lady vashj|Serpentshrine',
		'Legs1'  => 'Crystalforge Leggings|Karathress|Serpentshrine',
		'Shoulder1' => 'Crystalforge Pauldrons|Void Reaver|The Eye',
		'Separator1' => '-setname-',
		'Chest2' => 'Crystalforge Chestguard|Kael`Thas|The Eye',
		'Hands2' => 'Crystalforge Handguards|Leotheras|Serpentshrine',
		'Head2'  => 'Crystalforge Faceguard|Lady vashj|Serpentshrine',
		'Legs2'  => 'Crystalforge Legguards|Karathress|Serpentshrine',
		'Shoulder2' => 'Crystalforge Shoulderguards|Void Reaver|The Eye',
		'Separator2' => '-setname-',
		'Chest3' => 'Crystalforge Breastplate|Kael`Thas|The Eye',
		'Hands3' => 'Crystalforge Gauntlets|Leotheras|Serpentshrine',
		'Head3'  => 'Crystalforge War-Helm|Lady vashj|Serpentshrine',
		'Legs3'  => 'Crystalforge Greaves|Karathress|Serpentshrine',
		'Shoulder3' => 'Crystalforge Shoulderbraces|Void Reaver|The Eye'
);

$lang['ItemSets_Set']['Tier_5']['Warlock'] = array(
		'Chest1' => 'Robe Of The Corruptor|Kael`Thas|The Eye',
		'Hands1' => 'Gloves Of The Corruptor|Leotheras|Serpentshrine',
		'Head1'  => 'Hood Of The Corruptor|Lady vashj|Serpentshrine',
		'Legs1'  => 'Leggings Of The Corruptor|Karathress|Serpentshrine',
		'Shoulder1' => 'Mantle Of The Corruptor|Void Reaver|The Eye',
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

$lang['ItemSets_Set']['Tier_5']['Hunter'] = array(
		'Chest1' => 'Rift Stalker Hauberk|Kael`Thas|The Eye',
		'Hands1' => 'Rift Stalker Gauntlets|Leotheras|Serpentshrine',
		'Head1'  => 'Rift Stalker Helm|Lady vashj|Serpentshrine',
		'Legs1'  => 'Rift Stalker Legguards|Karathress|Serpentshrine',
		'Shoulder1' => 'Rift Stalker Mantle|Void Reaver|The Eye',
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

$lang['ItemSets_Set']['Tier_5']['Shaman'] = array(
		'Chest1' => 'Cataclysm Chestpiece|Kael`Thas|The Eye',
		'Hands1' => 'Cataclysm Handgrips|Leotheras|Serpentshrine',
		'Head1'  => 'Cataclysm Headpiece|Lady vashj|Serpentshrine',
		'Legs1'  => 'Cataclysm Legguards|Karathress|Serpentshrine',
		'Shoulder1' => 'Cataclysm Shoulderpads|Void Reaver|The Eye',
		'Separator1' => '-setname-',
		'Chest2' => 'Cataclysm Chestplate|Kael`Thas|The Eye',
		'Hands2' => 'Cataclysm Gauntlets|Leotheras|Serpentshrine',
		'Head2'  => 'Cataclysm Helm|Lady vashj|Serpentshrine',
		'Legs2'  => 'Cataclysm Legplates|Karathress|Serpentshrine',
		'Shoulder2' => 'Cataclysm Shoulderplates|Void Reaver|The Eye',
		'Separator2' => '-setname-',
		'Chest3' => 'Cataclysm Chestguard|Kael`Thas|The Eye',
		'Hands3' => 'Cataclysm Gloves|Leotheras|Serpentshrine',
		'Head3'  => 'Cataclysm Headguard|Lady vashj|Serpentshrine',
		'Legs3'  => 'Cataclysm Legguards|Karathress|Serpentshrine',
		'Shoulder3' => 'Cataclysm Shoulderguards|Void Reaver|The Eye'
);


// Raid Tier 6 Set
$lang['ItemSets_Set']['Tier_6']['Warrior'] = array(
		'Chest1' => 'Onslaught Chestguard|Illidan Stormrage|Black Temple',
		'Hands1' => 'Onslaught Handguards|Azgalor|Hyjal Summit',
		'Head1'  => 'Onslaught Greathelm|Archimonde|Hyjal Summit',
		'Legs1'  => 'Onslaught Legguards|Illidari Council|Black Temple',
		'Shoulder1' => 'Onslaught Shoulderguards|Mother Shahraz|Black Temple',
		'Separator1' => '-setname-',
		'Chest2' => 'Onslaught Breastplate|Illidan Stormrage|Black Temple',
		'Hands2' => 'Onslaught Gauntlets|Azgalor|Hyjal Summit',
		'Head2'  => 'Onslaught Battle-Helm|Archimonde|Hyjal Summit',
		'Legs2'  => 'Onslaught Greaves|Illidari Council|Black Temple',
		'Shoulder2' => 'Onslaught Shoulderblades|Mother Shahraz|Black Temple',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Priest'] = array(
		'Chest1' => 'Vestments of Absolution|Illidan Stormrage|Black Temple',
		'Hands1' => 'Gloves of Absolution|Azgalor|Hyjal Summit',
		'Head1'  => 'Cowl of Absolution|Archimonde|Hyjal Summit',
		'Legs1'  => 'Breeches of Absolution|Illidari Council|Black Temple',
		'Shoulder1' => 'Mantle of Absolution|Mother Shahraz|Black Temple',
		'Separator1' => '-setname-',
		'Chest2' => 'Shroud of Absolution|Illidan Stormrage|Black Temple',
		'Hands2' => 'Handguards of Absolution|Azgalor|Hyjal Summit',
		'Head2'  => 'Hood of Absolution|Archimonde|Hyjal Summit',
		'Legs2'  => 'Leggings of Absolution|Illidari Council|Black Temple',
		'Shoulder2' => 'Shoulderpads of Absolution|Mother Shahraz|Black Temple',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Tier_6']['Druid'] = array(
		'Chest1' => 'Thunderheart Vest|Illidan Stormrage|Black Temple',
		'Hands1' => 'Thunderheart Handguards|Azgalor|Hyjal Summit',
		'Head1'  => 'Thunderheart Headguard|Archimonde|Hyjal Summit',
		'Legs1'  => 'Thunderheart Pants|Illidari Council|Black Temple',
		'Shoulder1' => 'Thunderheart Shoulderpads|Mother Shahraz|Black Temple',
		'Separator1' => '-setname-',
		'Chest2' => 'Thunderheart Chestguard|Illidan Stormrage|Black Temple',
		'Hands2' => 'Thunderheart Gauntlets|Azgalor|Hyjal Summit',
		'Head2'  => 'Thunderheart Cover|Archimonde|Hyjal Summit',
		'Legs2'  => 'Thunderheart Leggings|Illidari Council|Black Temple',
		'Shoulder2' => 'Thunderheart Pauldrons|Mother Shahraz|Black Temple',
		'Separator2' => '-setname-',
		'Chest3' => 'Thunderheart Tunic|Illidan Stormrage|Black Temple',
		'Hands3' => 'Thunderheart Gloves|Azgalor|Hyjal Summit',
		'Head3'  => 'Thunderheart Helmet|Archimonde|Hyjal Summit',
		'Legs3'  => 'Thunderheart Legguards|Illidari Council|Black Temple',
		'Shoulder3' => 'Thunderheart Spaulders|Mother Shahraz|Black Temple'
);

$lang['ItemSets_Set']['Tier_6']['Rogue'] = array(
		'Chest1' => 'Slayer\\\'s Chestguard|Illidan Stormrage|Black Temple',
		'Hands1' => 'Slayer\\\'s Handguards|Azgalor|Hyjal Summit',
		'Head1'  => 'Slayer\\\'s Helm|Archimonde|Hyjal Summit',
		'Legs1'  => 'Slayer\\\'s Legguards|Illidari Council|Black Temple',
		'Shoulder1' => 'Slayer\\\'s Shoulderpads|Mother Shahraz|Black Temple',
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
		'Chest1' => 'Robes of the Tempest|Illidan Stormrage|Black Temple',
		'Hands1' => 'Gloves of the Tempest|Azgalor|Hyjal Summit',
		'Head1'  => 'Cowl of the Tempest|Archimonde|Hyjal Summit',
		'Legs1'  => 'Leggings of the Tempest|Illidari Council|Black Temple',
		'Shoulder1' => 'Mantle of the Tempest|Mother Shahraz|Black Temple',
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
		'Chest1' => 'Lightbringer Chestpiece|Illidan Stormrage|Black Temple',
		'Hands1' => 'Lightbringer Gloves|Azgalor|Hyjal Summit',
		'Head1'  => 'Lightbringer Greathelm|Archimonde|Hyjal Summit',
		'Legs1'  => 'Lightbringer Leggings|Illidari Council|Black Temple',
		'Shoulder1' => 'Lightbringer Pauldrons|Mother Shahraz|Black Temple',
		'Separator1' => '-setname-',
		'Chest2' => 'Lightbringer Chestguard|Illidan Stormrage|Black Temple',
		'Hands2' => 'Lightbringer Handguards|Azgalor|Hyjal Summit',
		'Head2'  => 'Lightbringer Faceguard|Archimonde|Hyjal Summit',
		'Legs2'  => 'Lightbringer Legguards|Illidari Council|Black Temple',
		'Shoulder2' => 'Lightbringer Shoulderguards|Mother Shahraz|Black Temple',
		'Separator2' => '-setname-',
		'Chest3' => 'Lightbringer Breastplate|Illidan Stormrage|Black Temple',
		'Hands3' => 'Lightbringer Gauntlets|Azgalor|Hyjal Summit',
		'Head3'  => 'Lightbringer War-Helm|Archimonde|Hyjal Summit',
		'Legs3'  => 'Lightbringer Greaves|Illidari Council|Black Temple',
		'Shoulder3' => 'Lightbringer Shoulderbraces|Mother Shahraz|Black Temple'
);

$lang['ItemSets_Set']['Tier_6']['Warlock'] = array(
		'Chest1' => 'Robe of the Malefic|Illidan Stormrage|Black Temple',
		'Hands1' => 'Gloves of the Malefic|Azgalor|Hyjal Summit',
		'Head1'  => 'Hood of the Malefic|Archimonde|Hyjal Summit',
		'Legs1'  => 'Leggings of the Malefic|Illidari Council|Black Temple',
		'Shoulder1' => 'Mantle of the Malefic|Mother Shahraz|Black Temple',
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

$lang['ItemSets_Set']['Tier_6']['Hunter'] = array(
		'Chest1' => 'Gronnstalker\\\'s Chestguard|Illidan Stormrage|Black Temple',
		'Hands1' => 'Gronnstalker\\\'s Gloves|Azgalor|Hyjal Summit',
		'Head1'  => 'Gronnstalker\\\'s Helmet|Archimonde|Hyjal Summit',
		'Legs1'  => 'Gronnstalker\\\'s Leggings|Illidari Council|Black Temple',
		'Shoulder1' => 'Gronnstalker\\\'s Spaulders|Mother Shahraz|Black Temple',
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

$lang['ItemSets_Set']['Tier_6']['Shaman'] = array(
		'Chest1' => 'Skyshatter Breastplate|Illidan Stormrage|Black Temple',
		'Hands1' => 'Skyshatter Gauntlets|Azgalor|Hyjal Summit',
		'Head1'  => 'Skyshatter Headguard|Archimonde|Hyjal Summit',
		'Legs1'  => 'Skyshatter Legguards|Illidari Council|Black Temple',
		'Shoulder1' => 'Skyshatter Mantle|Mother Shahraz|Black Temple',
		'Separator1' => '-setname-',
		'Chest2' => 'Skyshatter Tunic|Illidan Stormrage|Black Temple',
		'Hands2' => 'Skyshatter Grips|Azgalor|Hyjal Summit',
		'Head2'  => 'Skyshatter Cover|Archimonde|Hyjal Summit',
		'Legs2'  => 'Skyshatter Pants|Illidari Council|Black Temple',
		'Shoulder2' => 'Skyshatter Pauldrons|Mother Shahraz|Black Temple',
		'Separator2' => '-setname-',
		'Chest3' => 'Skyshatter Chestguard|Illidan Stormrage|Black Temple',
		'Hands3' => 'Skyshatter Gloves|Azgalor|Hyjal Summit',
		'Head3'  => 'Skyshatter Helmet|Archimonde|Hyjal Summit',
		'Legs3'  => 'Skyshatter Leggings|Illidari Council|Black Temple',
		'Shoulder3' => 'Skyshatter Shoulderpads|Mother Shahraz|Black Temple'
);


// Ruins of Ahn'Qiraj Set
$lang['ItemSets_Set']['AQ20']['Druid'] = array(
		'Back' => 'Cloak of Unending Life|Quest|AQ20',
		'Finger' => 'Band of Unending Life|Quest|AQ20',
		'Mainhand' => 'Mace of Unending Life|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Hunter'] = array(
		'Back' => 'Cloak of the Unseen Path|Quest|AQ20',
		'Finger' => 'Signet of the Unseen Path|Quest|AQ20',
		'Mainhand' => 'Scythe of the Unseen Path|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Mage'] = array(
		'Back' => 'Drape of Vaulted Secrets|Quest|AQ20',
		'Finger' => 'Band of Vaulted Secrets|Quest|AQ20',
		'Mainhand' => 'Blade of Vaulted Secrets|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Paladin'] = array(
		'Back' => 'Cape of Eternal Justice|Quest|AQ20',
		'Finger' => 'Ring of Eternal Justice|Quest|AQ20',
		'Mainhand' => 'Blade of Eternal Justice|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Priest'] = array(
		'Back' => 'Shroud of Infinite Wisdom|Quest|AQ20',
		'Finger' => 'Ring of Infinite Wisdom|Quest|AQ20',
		'Mainhand' => 'Gavel of Infinite Wisdom|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Rogue'] = array(
		'Back' => 'Cloak of Veiled Shadows|Quest|AQ20',
		'Finger' => 'Band of Veiled Shadows|Quest|AQ20',
		'Mainhand' => 'Dagger of Veiled Shadows|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Shaman'] = array(
		'Back' => 'Cloak of the Gathering Storm|Quest|AQ20',
		'Finger' => 'Ring of the Gathering Storm|Quest|AQ20',
		'Mainhand' => 'Hammer of the Gathering Storm|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Warlock'] = array(
		'Back' => 'Shroud of Unspoken Names|Quest|AQ20',
		'Finger' => 'Ring of Unspoken Names|Quest|AQ20',
		'Mainhand' => 'Kris of Unspoken Names|Quest|AQ20'
);
$lang['ItemSets_Set']['AQ20']['Warrior'] = array(
		'Back' => 'Drape of Unyielding Strength|Quest|AQ20',
		'Finger' => 'Signet of Unyielding Strength|Quest|AQ20',
		'Mainhand' => 'Sickle of Unyielding Strength|Quest|AQ20'
);

// Temple of Ahn'Qiraj Set
$lang['ItemSets_Set']['AQ40']['Druid'] = array(
		'Feet'  => 'Genesis Boots|Quest|AQ40',
		'Chest' => 'Genesis Vest|Quest|AQ40',
		'Head'  => 'Genesis Helm|Quest|AQ40',
		'Legs'  => 'Genesis Trousers|Quest|AQ40',
		'Shoulder' => 'Genesis Shoulderpads|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Hunter'] = array(
		'Feet'  => 'Striker\\\'s Footguards|Quest|AQ40',
		'Chest' => 'Striker\\\'s Hauberk|Quest|AQ40',
		'Head'  => 'Striker\\\'s Diadem|Quest|AQ40',
		'Legs'  => 'Striker\\\'s Leggings|Quest|AQ40',
		'Shoulder' => 'Striker\\\'s Pauldrons|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Mage'] = array(
		'Feet'  => 'Enigma Boots|Quest|AQ40',
		'Chest' => 'Enigma Robes|Quest|AQ40',
		'Head'  => 'Enigma Circlet|Quest|AQ40',
		'Legs'  => 'Enigma Leggings|Quest|AQ40',
		'Shoulder' => 'Enigma Shoulderpads|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Paladin'] = array(
		'Feet'  => 'Avenger\\\'s Greaves|Quest|AQ40',
		'Chest' => 'Avenger\\\'s Breastplate|Quest|AQ40',
		'Head'  => 'Avenger\\\'s Crown|Quest|AQ40',
		'Legs'  => 'Avenger\\\' Legguards|Quest|AQ40',
		'Shoulder' => 'Avenger\\\'s Pauldrons|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Priest'] = array(
		'Feet'  => 'Footwraps of the Oracle|Quest|AQ40',
		'Chest' => 'Vestments of the Oracle|Quest|AQ40',
		'Head'  => 'Tiara of the Oracle|Quest|AQ40',
		'Legs'  => 'Trousers of the Oracle|Quest|AQ40',
		'Shoulder' => 'Mantle of the Oracle|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Rogue'] = array(
		'Feet'  => 'Deathdealer\\\'s Boots|Quest|AQ40',
		'Chest' => 'Deathdealer\\\'s Vest|Quest|AQ40',
		'Head'  => 'Deathdealer\\\'s Helm|Quest|AQ40',
		'Legs'  => 'Deathdealer\\\'s Leggings|Quest|AQ40',
		'Shoulder' => 'Deathdealer\\\'s Spaulders|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Shaman'] = array(
		'Feet'  => 'Stormcaller\\\'s Footguards|Quest|AQ40',
		'Chest' => 'Stormcaller\\\'s Hauberk|Quest|AQ40',
		'Head'  => 'Stormcaller\\\'s Diadem|Quest|AQ40',
		'Legs'  => 'Stormcaller\\\'s Leggings|Quest|AQ40',
		'Shoulder' => 'Stormcaller\\\'s Pauldrons|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Warlock'] = array(
		'Feet'  => 'Doomcaller\\\'s Footwraps|Quest|AQ40',
		'Chest' => 'Doomcaller\\\'s Robes|Quest|AQ40',
		'Head'  => 'Doomcaller\\\'s Circlet|Quest|AQ40',
		'Legs'  => 'Doomcaller\\\'s Trousers|Quest|AQ40',
		'Shoulder' => 'Doomcaller\\\'s Mantle|Quest|AQ40'
);
$lang['ItemSets_Set']['AQ40']['Warrior'] = array(
		'Feet'  => 'Conqueror\\\'s Greaves|Quest|AQ40',
		'Chest' => 'Conqueror\\\'s Breastplate|Quest|AQ40',
		'Head'  => 'Conqueror\\\'s Crown|Quest|AQ40',
		'Legs'  => 'Conqueror\\\'s Legguards|Quest|AQ40',
		'Shoulder' => 'Conqueror\\\'s Spaulders|Quest|AQ40'
);

// Zul'Gurub set
$lang['ItemSets_Set']['ZG']['Druid'] = array(
        'Waist' => 'Zandalar Haruspex\\\'s Belt|Honored|ZG',
        'Wrist' => 'Zandalar Haruspex\\\'s Bracers|Friendly|ZG',
        'Chest' => 'Zandalar Haruspex\\\'s Tunic|Revered|ZG',
        'Shoulder' => '',
        'Neck' => 'Pristine Enchanted South Seas Kelp|Exalted|ZG',
        'Trinket' => 'Wushoolay\\\'s Charm of Nature|Punctured Voodoo Doll|ZG'
    );
$lang['ItemSets_Set']['ZG']['Hunter'] = array(
        'Waist' => 'Zandalar Predator\\\'s Belt|Honored|ZG',
        'Wrist' => 'Zandalar Predator\\\'s Bracers|Friendly|ZG',
        'Chest' => '',
        'Shoulder' => 'Zandalar Predator\\\'s Mantle|Revered|ZG',
        'Neck' => 'Maelstrom\\\'s Wrath|Exalted|ZG',
        'Trinket' => 'Renataki\\\'s Charm of Beasts|Punctured Voodoo Doll|ZG'
    );
$lang['ItemSets_Set']['ZG']['Mage'] = array(
        'Waist' => '',
        'Wrist' => 'Zandalar Illusionist\\\'s Wraps|Friendly|ZG',
        'Chest' => 'Zandalar Illusionist\\\'s Robe|Revered|ZG',
        'Shoulder' => 'Zandalar Illusionist\\\'s Mantle|Honored|ZG',
        'Neck' => 'Jewel of Kajaro|Exalted|ZG',
        'Trinket' => 'Hazza\\\'rah\\\'s Charm of Magic|Punctured Voodoo Doll|ZG'
    );
$lang['ItemSets_Set']['ZG']['Paladin'] = array(
        'Waist' => 'Zandalar Freethinker\\\'s Belt|Honored|ZG',
        'Wrist' => 'Zandalar Freethinker\\\'s Armguards|Friendly|ZG',
        'Chest' => 'Zandalar Freethinker\\\'s Breastplate|Revered|ZG',
        'Shoulder' => '',
        'Neck' => 'Hero\\\'s Brand|Exalted|ZG',
        'Trinket' => 'Gri\\\'lek\\\'s Charm of Valor|Punctured Voodoo Doll|ZG'
    );
$lang['ItemSets_Set']['ZG']['Priest'] = array(
        'Waist' => 'Zandalar Confessor\\\'s Bindings|Honored|ZG',
        'Wrist' => 'Zandalar Confessor\\\'s Wraps|Friendly|ZG',
        'Chest' => '',
        'Shoulder' => 'Zandalar Confessor\\\'s Mantle|Revered|ZG',
        'Neck' =>  'The All-Seeing Eye of Zuldazar|Exalted|ZG',
        'Trinket' => 'Hazza\\\'rah\\\'s Charm of Healing|Punctured Voodoo Doll|ZG'
    );
$lang['ItemSets_Set']['ZG']['Rogue'] = array(
        'Waist' => '',
        'Wrist' => 'Zandalar Madcap\\\'s Bracers|Friendly|ZG',
        'Chest' => 'Zandalar Madcap\\\'s Tunic|Revered|ZG',
        'Shoulder' => 'Zandalar Madcap\\\'s Mantle|Honored|ZG',
        'Neck' => 'Zandalarian Shadow Mastery Talisman|Exalted|ZG',
        'Trinket' => 'Renataki\\\'s Charm of Trickery|Punctured Voodoo Doll|ZG'
);
$lang['ItemSets_Set']['ZG']['Shaman'] = array(
        'Waist' => 'Zandalar Augur\\\'s Belt|Honored|ZG',
        'Wrist' => 'Zandalar Augur\\\'s Bracers|Friendly|ZG',
        'Chest' => 'Zandalar Augur\\\'s Hauberk|Revered|ZG',
        'Shoulder' => '',
        'Neck' => 'Unmarred Vision of Voodress|Exalted|ZG',
        'Trinket' => 'Wushoolay\\\'s Charm of Spirits|Punctured Voodoo Doll|ZG'
);
$lang['ItemSets_Set']['ZG']['Warlock'] = array(
        'Waist'  => 'Zandalar Demoniac\\\'s Wraps|Friendly|ZG',
        'Feet' => '',
        'Chest' => 'Zandalar Demoniac\\\'s Robe|Revered|ZG',
        'Shoulder' => 'Zandalar Demoniac\\\'s Mantle|Honored|ZG',
        'Neck' => 'Kezan\\\'s Unstoppable Taint|Exalted|ZG',
        'Trinket' => 'Hazza\\\'rah\\\'s Charm of Destruction|Punctured Voodoo Doll|ZG'
);
$lang['ItemSets_Set']['ZG']['Warrior'] = array(
        'Waist' => 'Zandalar Vindicator\\\'s Belt|Honored|ZG',
        'Wrist' => 'Zandalar Vindicator\\\'s Armguards|Friendly|ZG',
        'Chest' => 'Zandalar Vindicator\\\'s Breastplate|Revered|ZG',
        'Shoulder' => '',
        'Neck' => 'Rage of Mugamba|Exalted|ZG',
        'Trinket' => 'Gri\\\'lek\\\'s Charm of Might|Punctured Voodoo Doll|ZG'
);

//   PVP_Rare Alliance
$lang['ItemSets_Set']['PVP_Rare']['A']['Druid'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Dragonhide Treads|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Dragonhide Chestpiece|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Dragonhide Grips|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Dragonhide Headguard|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Dragonhide Leggings|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Dragonhide Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Hunter'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Chain Greaves|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Chain Hauberk|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Chain Vices|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Chain Helm|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Chain Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Chain Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Mage'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Silk Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Silk Tunic|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Silk Handwraps|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Silk Cowl|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Silk Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Silk Mantle|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Paladin'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Lamellar Sabatons|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Lamellar Breastplate|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Lamellar Gauntlets|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Lamellar Headguard|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Lamellar Leggings|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Lamellar Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Priest'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Satin Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Satin Tunic|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Satin Handwraps|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Satin Hood|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Satin Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Satin Mantle|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Rogue'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Leather Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Leather Chestpiece|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Leather Grips|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Leather Helm|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Leather Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Leather Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Warlock'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Dreadweave Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Dreadweave Tunic|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Dreadweave Handwraps|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Dreadweave Cowl|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Dreadweave Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Dreadweave Spaulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Warrior'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Plate Greaves|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Plate Hauberk|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Plate Gauntlets|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Plate Helm|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Plate Leggings|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Plate Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['A']['Shaman'] = array(
		'Feet'  => 'Knight-Lieutenant\\\'s Mail Greaves|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Knight-Captain\\\'s Mail Hauberk|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Knight-Lieutenant\\\'s Mail Vices|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Lieutenant Commander\\\'s Mail Headguard|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Knight-Captain\\\'s Mail Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Lieutenant Commander\\\'s Mail Pauldrons|2.805 Honor, 20x Arathi|PvP'
);

//   PVP_Rare Horde

$lang['ItemSets_Set']['PVP_Rare']['H']['Druid'] = array(
		'Feet'  => 'Blood Guard\\\'s Dragonhide Boots|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Dragonhide Breastplate|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Dragonhide Gauntlets|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Dragonhide Helm|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Dragonhide Trousers|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Dragonhide Spaulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Hunter'] = array(
		'Feet'  => 'Blood Guard\\\'s Chain Greaves|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Chain Hauberk|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Chain Vices|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Chain Helm|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Chain Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Chain Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Mage'] = array(
		'Feet'  => 'Blood Guard\\\'s Silk Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Silk Tunic|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Silk Handwraps|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Silk Cowl|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Silk Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Silk Mantle|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Priest'] = array(
		'Feet'  => 'Blood Guard\\\'s Satin Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Satin Tunic|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Satin Handwraps|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Satin Hood|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Satin Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Satin Mantle|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Rogue'] = array(
		'Feet'  => 'Blood Guard\\\'s Leather Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Leather Chestpiece|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Leather Grips|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Leather Helm|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Leather Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Leather Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Shaman'] = array(
		'Feet'  => 'Blood Guard\\\'s Mail Greaves|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Mail Hauberk|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Mail Vices|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Mail Headguard|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Mail Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Mail Pauldrons|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Warlock'] = array(
		'Feet'  => 'Blood Guard\\\'s Dreadweave Walkers|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Dreadweave Tunic|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Dreadweave Handwraps|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Dreadweave Cowl|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Dreadweave Legguards|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Dreadweave Spaulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Warrior'] = array(
		'Feet'  => 'Blood Guard\\\'s Plate Greaves|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Plate Hauberk|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Plate Gauntlets|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Plate Helm|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Plate Leggings|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Plate Shoulders|2.805 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Rare']['H']['Paladin'] = array(
		'Feet'  => 'Blood Guard\\\'s Lamellar Sabatons|2.805 Honor, 20x Arathi|PvP',
		'Chest' => 'Legionnaire\\\'s Lamellar Breastplate|4.590 Honor, 30x Arathi|PvP',
		'Hands' => 'Blood Guard\\\'s Lamellar Gauntlets|2.805 Honor, 20x Alterac|PvP',
		'Head'  => 'Champion\\\'s Lamellar Headguard|4.335 Honor, 30x Alterac|PvP',
		'Legs'  => 'Legionnaire\\\'s Lamellar Leggings|4.335 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Champion\\\'s Lamellar Shoulders|2.805 Honor, 20x Arathi|PvP'
);


//   PVP_Epic Alliance
$lang['ItemSets_Set']['PVP_Epic']['A']['Druid'] = array(
		'Feet'  => 'Marshal\\\'s Dragonhide Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Dragonhide Breastplate|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Dragonhide Gauntlets|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Dragonhide Helmet|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Dragonhide Legguards|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Dragonhide Spaulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Hunter'] = array(
		'Feet'  => 'Marshal\\\'s Chain Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Chain Breastplate|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Chain Grips|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Chain Helm|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Chain Legguards|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Chain Spaulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Mage'] = array(
		'Feet'  => 'Marshal\\\'s Silk Footwraps|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Silk Vestments|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Silk Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Silk Coronet|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Silk Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Silk Spaulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Paladin'] = array(
		'Feet'  => 'Marshal\\\'s Lamellar Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Lamellar Chestplate|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Lamellar Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Lamellar Faceguard|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Lamellar Legplates|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Lamellar Pauldrons|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Priest'] = array(
		'Feet'  => 'Marshal\\\'s Satin Sandals|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Satin Vestments|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Satin Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Satin Headdress|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Satin Pants|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Satin Mantle|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Rogue'] = array(
		'Feet'  => 'Marshal\\\'s Leather Footguards|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Leather Chestpiece|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Leather Handgrips|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Leather Mask|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Leather Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Leather Epaulets|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Warlock'] = array(
		'Feet'  => 'Marshal\\\'s Dreadweave Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Dreadweave Robe|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Dreadweave Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Dreadweave Coronal|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Dreadweave Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Dreadweave Shoulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Warrior'] = array(
		'Feet'  => 'Marshal\\\'s Plate Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Plate Armor|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Plate Gauntlets|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Plate Helm|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Plate Legguards|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Plate Shoulderguards|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['A']['Shaman'] = array(
		'Feet'  => 'Marshal\\\'s Mail Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Field Marshal\\\'s Mail Armor|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'Marshal\\\'s Mail Gauntlets|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Field Marshal\\\'s Mail Helm|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'Marshal\\\'s Mail Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Field Marshal\\\'s Mail Spaulders|8.415 Honor, 20x Arathi|PvP'
);

//   PVP_Epic Horde
$lang['ItemSets_Set']['PVP_Epic']['H']['Druid'] = array(
		'Feet'  => 'General\\\'s Dragonhide Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Dragonhide Hauberk|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Dragonhide Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Dragonhide Helmet|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Dragonhide Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Dragonhide Epaulets|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Hunter'] = array(
		'Feet'  => 'General\\\'s Chain Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Chain Chestpiece|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Chain Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Chain Helmet|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Chain Legguards|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Chain Shoulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Mage'] = array(
		'Feet'  => 'General\\\'s Silk Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Silk Raiment|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Silk Handguards|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Silk Cowl|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Silk Trousers|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Silk Amice|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Priest'] = array(
		'Feet'  => 'General\\\'s Satin Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Satin Robes|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Satin Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Satin Cowl|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Satin Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Satin Mantle|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Rogue'] = array(
		'Feet'  => 'General\\\'s Leather Treads|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Leather Breastplate|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Leather Mitts|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Leather Helm|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Leather Legguards|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Leather Spaulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Shaman'] = array(
		'Feet'  => 'General\\\'s Mail Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Mail Armor|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Mail Gauntlets|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Mail Helm|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Mail Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Mail Spaulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Warlock'] = array(
		'Feet'  => 'General\\\'s Dreadweave Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Dreadweave Robe|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Dreadweave Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Dreadweave Hood|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Dreadweave Pants|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Dreadweave Mantle|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Warrior'] = array(
		'Feet'  => 'General\\\'s Plate Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Plate Armor|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Plate Gauntlets|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Plate Headpiece|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Plate Leggings|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Plate Shoulders|8.415 Honor, 20x Arathi|PvP'
);
$lang['ItemSets_Set']['PVP_Epic']['H']['Paladin'] = array(
		'Feet'  => 'General\\\'s Lamellar Boots|8.415 Honor, 20x Arathi|PvP',
		'Chest' => 'Warlord\\\'s Lamellar Chestplate|13.770 Honor, 30x Arathi|PvP',
		'Hands' => 'General\\\'s Lamellar Gloves|8.415 Honor, 20x Alterac|PvP',
		'Head'  => 'Warlord\\\'s Lamellar Faceguard|13.005 Honor, 30x Alterac|PvP',
		'Legs'  => 'General\\\'s Lamellar Legplates|13.005 Honor, 30x Warsong|PvP',
		'Shoulder' => 'Warlord\\\'s Lamellar Pauldrons|8.415 Honor, 20x Arathi|PvP'
);


// PvP Level 70 Alliance
$lang['ItemSets_Set']['PVP_Level70']['A']['Warrior'] = array(
		'Chest1' => 'Grand Marshal\\\'s Plate Chestpiece|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Plate Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Plate Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Plate Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Plate Shoulders|8.078 Honor, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['A']['Priest'] = array(
		'Chest1' => 'Grand Marshal\\\'s Mooncloth Vestments|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Mooncloth Mitts|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Mooncloth Cowl|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Mooncloth Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Mooncloth Shoulderpads|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Grand Marshal\\\'s Satin Robe|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'Grand Marshal\\\'s Satin Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'Grand Marshal\\\'s Satin Hood|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'Grand Marshal\\\'s Satin Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'Grand Marshal\\\'s Satin Mantle|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Druid'] = array(
		'Chest1' => 'Grand Marshal\\\'s Dragonhide Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Dragonhide Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Dragonhide Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Dragonhide Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Dragonhide Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Grand Marshal\\\'s Kodohide Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'Grand Marshal\\\'s Kodohide Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'Grand Marshal\\\'s Kodohide Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'Grand Marshal\\\'s Kodohide Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'Grand Marshal\\\'s Kodohide Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Grand Marshal\\\'s Wyrmhide Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands3' => 'Grand Marshal\\\'s Wyrmhide Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head3'  => 'Grand Marshal\\\'s Wyrmhide Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs3'  => 'Grand Marshal\\\'s Wyrmhide Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder3' => 'Grand Marshal\\\'s Wyrmhide Spaulders|8.078 Honor, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Rogue'] = array(
		'Chest1' => 'Grand Marshal\\\'s Leather Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Leather Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Leather Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Leather Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Leather Spaulders|8.078 Honor, 20x Arathi|PvP',
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
		'Chest1' => 'Grand Marshal\\\'s Silk Raiment|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Silk Handguards|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Silk Cowl|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Silk Trousers|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Silk Amice|8.078 Honor, 20x Arathi|PvP',
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
		'Chest1' => 'Grand Marshal\\\'s Lamellar Chestpiece|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Lamellar Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Lamellar Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Lamellar Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Lamellar Shoulders|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Grand Marshal\\\'s Ornamented Chestplate|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'Grand Marshal\\\'s Ornamented Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'Grand Marshal\\\'s Ornamented Headguard|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'Grand Marshal\\\'s Ornamented Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'Grand Marshal\\\'s Ornamented Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Grand Marshal\\\'s Scaled Chestpiece|13.219 Honor, 30x Arathi|PvP',
		'Hands3' => 'Grand Marshal\\\'s Scaled Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head3'  => 'Grand Marshal\\\'s Scaled Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs3'  => 'Grand Marshal\\\'s Scaled Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder3' => 'Grand Marshal\\\'s Scaled Shoulders|8.078 Honor, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['A']['Warlock'] = array(
		'Chest1' => 'Grand Marshal\\\'s Dreadweave Robe|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Dreadweave Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Dreadweave Hood|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Dreadweave Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Dreadweave Mantle|8.078 Honor, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['A']['Hunter'] = array(
		'Chest1' => 'Grand Marshal\\\'s Chain Armor|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Chain Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Chain Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Chain Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Chain Spaulders|8.078 Honor, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['A']['Shaman'] = array(
		'Chest1' => 'Grand Marshal\\\'s Linked Armor|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'Grand Marshal\\\'s Linked Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'Grand Marshal\\\'s Linked Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'Grand Marshal\\\'s Linked Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'Grand Marshal\\\'s Linked Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'Grand Marshal\\\'s Mail Armor|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'Grand Marshal\\\'s Mail Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'Grand Marshal\\\'s Mail Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'Grand Marshal\\\'s Mail Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'Grand Marshal\\\'s Mail Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'Grand Marshal\\\'s Ringmail Chestguard|13.219 Honor, 30x Arathi|PvP',
		'Hands3' => 'Grand Marshal\\\'s Ringmail Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head3'  => 'Grand Marshal\\\'s Ringmail Headpiece|12.852 Honor, 30x Alterac|PvP',
		'Legs3'  => 'Grand Marshal\\\'s Ringmail Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder3' => 'Grand Marshal\\\'s Ringmail Shoulders|8.078 Honor, 20x Arathi|PvP'
);


// PvP Level 70 Horde
$lang['ItemSets_Set']['PVP_Level70']['H']['Warrior'] = array(
		'Chest1' => 'High Warlord\\\'s Plate Chestpiece|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Plate Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Plate Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Plate Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Plate Shoulders|8.078 Honor, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['H']['Priest'] = array(
		'Chest1' => 'High Warlord\\\'s Mooncloth Vestments|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Mooncloth Mitts|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Mooncloth Cowl|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Mooncloth Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Mooncloth Shoulderpads|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'High Warlord\\\'s Satin Robe|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'High Warlord\\\'s Satin Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'High Warlord\\\'s Satin Hood|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'High Warlord\\\'s Satin Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'High Warlord\\\'s Satin Mantle|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Druid'] = array(
		'Chest1' => 'High Warlord\\\'s Dragonhide Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Dragonhide Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Dragonhide Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Dragonhide Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Dragonhide Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'High Warlord\\\'s Kodohide Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'High Warlord\\\'s Kodohide Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'High Warlord\\\'s Kodohide Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'High Warlord\\\'s Kodohide Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'High Warlord\\\'s Kodohide Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'High Warlord\\\'s Wyrmhide Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands3' => 'High Warlord\\\'s Wyrmhide Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head3'  => 'High Warlord\\\'s Wyrmhide Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs3'  => 'High Warlord\\\'s Wyrmhide Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder3' => 'High Warlord\\\'s Wyrmhide Spaulders|8.078 Honor, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Rogue'] = array(
		'Chest1' => 'High Warlord\\\'s Leather Tunic|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Leather Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Leather Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Leather Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Leather Spaulders|8.078 Honor, 20x Arathi|PvP',
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
		'Chest1' => 'High Warlord\\\'s Silk Raiment|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Silk Handguards|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Silk Cowl|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Silk Trousers|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Silk Amice|8.078 Honor, 20x Arathi|PvP',
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
		'Chest1' => 'High Warlord\\\'s Lamellar Chestpiece|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Lamellar Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Lamellar Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Lamellar Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Lamellar Shoulders|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'High Warlord\\\'s Ornamented Chestplate|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'High Warlord\\\'s Ornamented Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'High Warlord\\\'s Ornamented Headguard|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'High Warlord\\\'s Ornamented Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'High Warlord\\\'s Ornamented Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'High Warlord\\\'s Scaled Chestpiece|13.219 Honor, 30x Arathi|PvP',
		'Hands3' => 'High Warlord\\\'s Scaled Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head3'  => 'High Warlord\\\'s Scaled Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs3'  => 'High Warlord\\\'s Scaled Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder3' => 'High Warlord\\\'s Scaled Shoulders|8.078 Honor, 20x Arathi|PvP'
);

$lang['ItemSets_Set']['PVP_Level70']['H']['Warlock'] = array(
		'Chest1' => 'High Warlord\\\'s Dreadweave Robe|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Dreadweave Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Dreadweave Hood|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Dreadweave Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Dreadweave Mantle|8.078 Honor, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['H']['Hunter'] = array(
		'Chest1' => 'High Warlord\\\'s Chain Armor|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Chain Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Chain Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Chain Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Chain Spaulders|8.078 Honor, 20x Arathi|PvP',
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

$lang['ItemSets_Set']['PVP_Level70']['H']['Shaman'] = array(
		'Chest1' => 'High Warlord\\\'s Linked Armor|13.219 Honor, 30x Arathi|PvP',
		'Hands1' => 'High Warlord\\\'s Linked Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head1'  => 'High Warlord\\\'s Linked Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs1'  => 'High Warlord\\\'s Linked Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder1' => 'High Warlord\\\'s Linked Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator1' => '-setname-',
		'Chest2' => 'High Warlord\\\'s Mail Armor|13.219 Honor, 30x Arathi|PvP',
		'Hands2' => 'High Warlord\\\'s Mail Gauntlets|8.078 Honor, 20x Alterac|PvP',
		'Head2'  => 'High Warlord\\\'s Mail Helm|12.852 Honor, 30x Alterac|PvP',
		'Legs2'  => 'High Warlord\\\'s Mail Leggings|12.852 Honor, 30x Warsong|PvP',
		'Shoulder2' => 'High Warlord\\\'s Mail Spaulders|8.078 Honor, 20x Arathi|PvP',
		'Separator2' => '-setname-',
		'Chest3' => 'High Warlord\\\'s Ringmail Chestguard|13.219 Honor, 30x Arathi|PvP',
		'Hands3' => 'High Warlord\\\'s Ringmail Gloves|8.078 Honor, 20x Alterac|PvP',
		'Head3'  => 'High Warlord\\\'s Ringmail Headpiece|12.852 Honor, 30x Alterac|PvP',
		'Legs3'  => 'High Warlord\\\'s Ringmail Legguards|12.852 Honor, 30x Warsong|PvP',
		'Shoulder3' => 'High Warlord\\\'s Ringmail Shoulders|8.078 Honor, 20x Arathi|PvP'
);


// Arena Season 1
$lang['ItemSets_Set']['Arena_1']['Warrior'] = array(
		'Chest1' => 'Gladiator\\\'s Plate Chestpiece|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Plate Gauntlets|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Plate Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Plate Legguards|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Plate Shoulders|11.250 Honor, 20x Arathi|Arena Season 1',
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

$lang['ItemSets_Set']['Arena_1']['Priest'] = array(
		'Chest1' => 'Gladiator\\\'s Satin Robe|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Satin Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Satin Hood|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Satin Leggings|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Satin Mantle|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Gladiator\\\'s Mooncloth Robe|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands2' => 'Gladiator\\\'s Mooncloth Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head2'  => 'Gladiator\\\'s Mooncloth Hood|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Gladiator\\\'s Mooncloth Leggings|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Gladiator\\\'s Mooncloth Mantle|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Druid'] = array(
		'Chest1' => 'Gladiator\\\'s Dragonhide Tunic|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Dragonhide Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Dragonhide Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Dragonhide Legguards|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Dragonhide Spaulders|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Gladiator\\\'s Kodohide Tunic|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands2' => 'Gladiator\\\'s Kodohide Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head2'  => 'Gladiator\\\'s Kodohide Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Gladiator\\\'s Kodohide Legguards|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Gladiator\\\'s Kodohide Spaulders|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Gladiator\\\'s Wrymhide Tunic|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands3' => 'Gladiator\\\'s Wrymhide Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head3'  => 'Gladiator\\\'s Wrymhide Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs3'  => 'Gladiator\\\'s Wrymhide Legguards|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder3' => 'Gladiator\\\'s Wrymhide Spaulders|11.250 Honor, 20x Arathi|Arena Season 1'
);

$lang['ItemSets_Set']['Arena_1']['Rogue'] = array(
		'Chest1' => 'Gladiator\\\'s Leather Tunic|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Leather Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Leather Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Leather Legguards|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Leather Spaulders|11.250 Honor, 20x Arathi|Arena Season 1',
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
		'Chest1' => 'Gladiator\\\'s Silk Raiment|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Silk Handguards|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Silk Cowl|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Silk Trousers|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Silk Amice|11.250 Honor, 20x Arathi|Arena Season 1',
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
		'Chest1' => 'Gladiator\\\'s Lamellar Chestpiece|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Lamellar Gauntlets|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Lamellar Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Lamellar Legguards|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Lamellar Shoulders|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Gladiator\\\'s Ornamented Chestguard|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands2' => 'Gladiator\\\'s Ornamented Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head2'  => 'Gladiator\\\'s Ornamented Headcover|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Gladiator\\\'s Ornamented Legplates|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Gladiator\\\'s Ornamented Spaulders|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Gladiator\\\'s Scaled Chestpiece|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands3' => 'Gladiator\\\'s Scaled Gauntlets|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head3'  => 'Gladiator\\\'s Scaled Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs3'  => 'Gladiator\\\'s Scaled Legguards|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder3' => 'Gladiator\\\'s Scaled Shoulders|11.250 Honor, 20x Arathi|Arena Season 1'
);

$lang['ItemSets_Set']['Arena_1']['Warlock'] = array(
		'Chest1' => 'Gladiator\\\'s Dreadweave Robe|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Dreadweave Gloves|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Dreadweave Hood|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Dreadweave Leggings|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Dreadweave Mantle|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Gladiator\\\'s Felweave Cowl|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands2' => 'Gladiator\\\'s Felweave Handguards|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head2'  => 'Gladiator\\\'s Felweave Crown|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Gladiator\\\'s Felweave Trousers|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Gladiator\\\'s Felweave Amice|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_1']['Hunter'] = array(
		'Chest1' => 'Gladiator\\\'s Chain Armor|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Chain Gauntlets|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Chain Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Chain Leggings|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Chain Spaulders|11.250 Honor, 20x Arathi|Arena Season 1',
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

$lang['ItemSets_Set']['Arena_1']['Shaman'] = array(
		'Chest1' => 'Gladiator\\\'s Linked Armor|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands1' => 'Gladiator\\\'s Linked Gauntlets|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head1'  => 'Gladiator\\\'s Linked Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs1'  => 'Gladiator\\\'s Linked Leggings|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder1' => 'Gladiator\\\'s Linked Spaulders|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator1' => '-setname-',
		'Chest2' => 'Gladiator\\\'s Ringmail Armor|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands2' => 'Gladiator\\\'s Ringmail Gauntlets|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head2'  => 'Gladiator\\\'s Ringmail Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs2'  => 'Gladiator\\\'s Ringmail Leggings|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder2' => 'Gladiator\\\'s Ringmail Spaulders|11.250 Honor, 20x Arathi|Arena Season 1',
		'Separator2' => '-setname-',
		'Chest3' => 'Gladiator\\\'s Mail Armor|14.500 Honor, 30x Arathi|Arena Season 1',
		'Hands3' => 'Gladiator\\\'s Mail Gauntlets|10.500 Honor, 20x Alterac|Arena Season 1',
		'Head3'  => 'Gladiator\\\'s Mail Helm|14.500 Honor, 30x Alterac|Arena Season 1',
		'Legs3'  => 'Gladiator\\\'s Mail Leggings|14.500 Honor, 30x Warsong|Arena Season 1',
		'Shoulder3' => 'Gladiator\\\'s Mail Spaulders|11.250 Honor, 20x Arathi|Arena Season 1'
);


// Arena Season 2
$lang['ItemSets_Set']['Arena_2']['Warrior'] = array(
		'Chest1' => 'Merciless Gladiator\\\'s Plate Chestpiece|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Plate Gauntlets|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Plate Helm|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Plate Legguards|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Plate Shoulders|1.304 Arenapoints|Arena Season 2',
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

$lang['ItemSets_Set']['Arena_2']['Priest'] = array(
		'Chest1' => 'Merciless Gladiator\\\'s Satin Robe|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Satin Gloves|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Satin Hood|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Satin Leggings|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Satin Mantle|1.304 Arenapoints|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Merciless Gladiator\\\'s Mooncloth Robe|1.630 Arenapoints|Arena Season 2',
		'Hands2' => 'Merciless Gladiator\\\'s Mooncloth Gloves|978 Arenapoints|Arena Season 2',
		'Head2'  => 'Merciless Gladiator\\\'s Mooncloth Hood|1.630 Arenapoints|Arena Season 2',
		'Legs2'  => 'Merciless Gladiator\\\'s Mooncloth Leggings|1.630 Arenapoints|Arena Season 2',
		'Shoulder2' => 'Merciless Gladiator\\\'s Mooncloth Mantle|1.304 Arenapoints|Arena Season 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Druid'] = array(
		'Chest1' => 'Merciless Gladiator\\\'s Dragonhide Tunic|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Dragonhide Gloves|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Dragonhide Helm|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Dragonhide Legguards|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Dragonhide Spaulders|1.304 Arenapoints|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Merciless Gladiator\\\'s Kodohide Tunic|1.630 Arenapoints|Arena Season 2',
		'Hands2' => 'Merciless Gladiator\\\'s Kodohide Gloves|978 Arenapoints|Arena Season 2',
		'Head2'  => 'Merciless Gladiator\\\'s Kodohide Helm|1.630 Arenapoints|Arena Season 2',
		'Legs2'  => 'Merciless Gladiator\\\'s Kodohide Legguards|1.630 Arenapoints|Arena Season 2',
		'Shoulder2' => 'Merciless Gladiator\\\'s Kodohide Spaulders|1.304 Arenapoints|Arena Season 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Merciless Gladiator\\\'s Wrymhide Tunic|1.630 Arenapoints|Arena Season 2',
		'Hands3' => 'Merciless Gladiator\\\'s Wrymhide Gloves|978 Arenapoints|Arena Season 2',
		'Head3'  => 'Merciless Gladiator\\\'s Wrymhide Helm|1.630 Arenapoints|Arena Season 2',
		'Legs3'  => 'Merciless Gladiator\\\'s Wrymhide Legguards|1.630 Arenapoints|Arena Season 2',
		'Shoulder3' => 'Merciless Gladiator\\\'s Wrymhide Spaulders|1.304 Arenapoints|Arena Season 2'
);

$lang['ItemSets_Set']['Arena_2']['Rogue'] = array(
		'Chest1' => 'Merciless Gladiator\\\'s Leather Tunic|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Leather Gloves|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Leather Helm|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Leather Legguards|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Leather Spaulders|1.304 Arenapoints|Arena Season 2',
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
		'Chest1' => 'Merciless Gladiator\\\'s Silk Raiment|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Silk Handguards|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Silk Cowl|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Silk Trousers|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Silk Amice|1.304 Arenapoints|Arena Season 2',
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
		'Chest1' => 'Merciless Gladiator\\\'s Lamellar Chestpiece|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Lamellar Gauntlets|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Lamellar Helm|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Lamellar Legguards|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Lamellar Shoulders|1.304 Arenapoints|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Merciless Gladiator\\\'s Ornamented Chestguard|1.630 Arenapoints|Arena Season 2',
		'Hands2' => 'Merciless Gladiator\\\'s Ornamented Gloves|978 Arenapoints|Arena Season 2',
		'Head2'  => 'Merciless Gladiator\\\'s Ornamented Headcover|1.630 Arenapoints|Arena Season 2',
		'Legs2'  => 'Merciless Gladiator\\\'s Ornamented Legplates|1.630 Arenapoints|Arena Season 2',
		'Shoulder2' => 'Merciless Gladiator\\\'s Ornamented Spaulders|1.304 Arenapoints|Arena Season 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Merciless Gladiator\\\'s Scaled Chestpiece|1.630 Arenapoints|Arena Season 2',
		'Hands3' => 'Merciless Gladiator\\\'s Scaled Gauntlets|978 Arenapoints|Arena Season 2',
		'Head3'  => 'Merciless Gladiator\\\'s Scaled Helm|1.630 Arenapoints|Arena Season 2',
		'Legs3'  => 'Merciless Gladiator\\\'s Scaled Legguards|1.630 Arenapoints|Arena Season 2',
		'Shoulder3' => 'Merciless Gladiator\\\'s Scaled Shoulders|1.304 Arenapoints|Arena Season 2'
);

$lang['ItemSets_Set']['Arena_2']['Warlock'] = array(
		'Chest1' => 'Merciless Gladiator\\\'s Dreadweave Robe|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Dreadweave Gloves|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Dreadweave Hood|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Dreadweave Leggings|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Dreadweave Mantle|1.304 Arenapoints|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Merciless Gladiator\\\'s Felweave Cowl|1.630 Arenapoints|Arena Season 2',
		'Hands2' => 'Merciless Gladiator\\\'s Felweave Handguards|978 Arenapoints|Arena Season 2',
		'Head2'  => 'Merciless Gladiator\\\'s Felweave Crown|1.630 Arenapoints|Arena Season 2',
		'Legs2'  => 'Merciless Gladiator\\\'s Felweave Trousers|1.630 Arenapoints|Arena Season 2',
		'Shoulder2' => 'Merciless Gladiator\\\'s Felweave Amice|1.304 Arenapoints|Arena Season 2',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_2']['Hunter'] = array(
		'Chest1' => 'Merciless Gladiator\\\'s Chain Armor|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Chain Gauntlets|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Chain Helm|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Chain Leggings|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Chain Spaulders|1.304 Arenapoints|Arena Season 2',
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

$lang['ItemSets_Set']['Arena_2']['Shaman'] = array(
		'Chest1' => 'Merciless Gladiator\\\'s Linked Armor|1.630 Arenapoints|Arena Season 2',
		'Hands1' => 'Merciless Gladiator\\\'s Linked Gauntlets|978 Arenapoints|Arena Season 2',
		'Head1'  => 'Merciless Gladiator\\\'s Linked Helm|1.630 Arenapoints|Arena Season 2',
		'Legs1'  => 'Merciless Gladiator\\\'s Linked Leggings|1.630 Arenapoints|Arena Season 2',
		'Shoulder1' => 'Merciless Gladiator\\\'s Linked Spaulders|1.304 Arenapoints|Arena Season 2',
		'Separator1' => '-setname-',
		'Chest2' => 'Merciless Gladiator\\\'s Ringmail Armor|1.630 Arenapoints|Arena Season 2',
		'Hands2' => 'Merciless Gladiator\\\'s Ringmail Gauntlets|978 Arenapoints|Arena Season 2',
		'Head2'  => 'Merciless Gladiator\\\'s Ringmail Helm|1.630 Arenapoints|Arena Season 2',
		'Legs2'  => 'Merciless Gladiator\\\'s Ringmail Leggings|1.630 Arenapoints|Arena Season 2',
		'Shoulder2' => 'Merciless Gladiator\\\'s Ringmail Spaulders|1.304 Arenapoints|Arena Season 2',
		'Separator2' => '-setname-',
		'Chest3' => 'Merciless Gladiator\\\'s Mail Armor|1.630 Arenapoints|Arena Season 2',
		'Hands3' => 'Merciless Gladiator\\\'s Mail Gauntlets|978 Arenapoints|Arena Season 2',
		'Head3'  => 'Merciless Gladiator\\\'s Mail Helm|1.630 Arenapoints|Arena Season 2',
		'Legs3'  => 'Merciless Gladiator\\\'s Mail Leggings|1.630 Arenapoints|Arena Season 2',
		'Shoulder3' => 'Merciless Gladiator\\\'s Mail Spaulders|1.304 Arenapoints|Arena Season 2'
);


/// Arena Season 3
$lang['ItemSets_Set']['Arena_3']['Warrior'] = array(
		'Chest1' => 'Vengeful Gladiator\\\'s Plate Chestpiece|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Plate Gauntlets|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Plate Helm|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Plate Legguards|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Plate Shoulders|1.500 Arenapoints|Arena Season 3',
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

$lang['ItemSets_Set']['Arena_3']['Priest'] = array(
		'Chest1' => 'Vengeful Gladiator\\\'s Satin Robe|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Satin Gloves|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Satin Hood|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Satin Leggings|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Satin Mantle|1.500 Arenapoints|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Vengeful Gladiator\\\'s Mooncloth Robe|1.875 Arenapoints|Arena Season 3',
		'Hands2' => 'Vengeful Gladiator\\\'s Mooncloth Gloves|1.125 Arenapoints|Arena Season 3',
		'Head2'  => 'Vengeful Gladiator\\\'s Mooncloth Hood|1.875 Arenapoints|Arena Season 3',
		'Legs2'  => 'Vengeful Gladiator\\\'s Mooncloth Leggings|1.875 Arenapoints|Arena Season 3',
		'Shoulder2' => 'Vengeful Gladiator\\\'s Mooncloth Mantle|1.500 Arenapoints|Arena Season 3',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Druid'] = array(
		'Chest1' => 'Vengeful Gladiator\\\'s Dragonhide Tunic|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Dragonhide Gloves|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Dragonhide Helm|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Dragonhide Legguards|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Dragonhide Spaulders|1.500 Arenapoints|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Vengeful Gladiator\\\'s Kodohide Tunic|1.875 Arenapoints|Arena Season 3',
		'Hands2' => 'Vengeful Gladiator\\\'s Kodohide Gloves|1.125 Arenapoints|Arena Season 3',
		'Head2'  => 'Vengeful Gladiator\\\'s Kodohide Helm|1.875 Arenapoints|Arena Season 3',
		'Legs2'  => 'Vengeful Gladiator\\\'s Kodohide Legguards|1.875 Arenapoints|Arena Season 3',
		'Shoulder2' => 'Vengeful Gladiator\\\'s Kodohide Spaulders|1.500 Arenapoints|Arena Season 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Vengeful Gladiator\\\'s Wrymhide Tunic|1.875 Arenapoints|Arena Season 3',
		'Hands3' => 'Vengeful Gladiator\\\'s Wrymhide Gloves|1.125 Arenapoints|Arena Season 3',
		'Head3'  => 'Vengeful Gladiator\\\'s Wrymhide Helm|1.875 Arenapoints|Arena Season 3',
		'Legs3'  => 'Vengeful Gladiator\\\'s Wrymhide Legguards|1.875 Arenapoints|Arena Season 3',
		'Shoulder3' => 'Vengeful Gladiator\\\'s Wrymhide Spaulders|1.500 Arenapoints|Arena Season 3'
);

$lang['ItemSets_Set']['Arena_3']['Rogue'] = array(
		'Chest1' => 'Vengeful Gladiator\\\'s Leather Tunic|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Leather Gloves|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Leather Helm|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Leather Legguards|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Leather Spaulders|1.500 Arenapoints|Arena Season 3',
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
		'Chest1' => 'Vengeful Gladiator\\\'s Silk Raiment|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Silk Handguards|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Silk Cowl|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Silk Trousers|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Silk Amice|1.500 Arenapoints|Arena Season 3',
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
		'Chest1' => 'Vengeful Gladiator\\\'s Lamellar Chestpiece|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Lamellar Gauntlets|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Lamellar Helm|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Lamellar Legguards|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Lamellar Shoulders|1.500 Arenapoints|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Vengeful Gladiator\\\'s Ornamented Chestguard|1.875 Arenapoints|Arena Season 3',
		'Hands2' => 'Vengeful Gladiator\\\'s Ornamented Gloves|1.125 Arenapoints|Arena Season 3',
		'Head2'  => 'Vengeful Gladiator\\\'s Ornamented Headcover|1.875 Arenapoints|Arena Season 3',
		'Legs2'  => 'Vengeful Gladiator\\\'s Ornamented Legplates|1.875 Arenapoints|Arena Season 3',
		'Shoulder2' => 'Vengeful Gladiator\\\'s Ornamented Spaulders|1.500 Arenapoints|Arena Season 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Vengeful Gladiator\\\'s Scaled Chestpiece|1.875 Arenapoints|Arena Season 3',
		'Hands3' => 'Vengeful Gladiator\\\'s Scaled Gauntlets|1.125 Arenapoints|Arena Season 3',
		'Head3'  => 'Vengeful Gladiator\\\'s Scaled Helm|1.875 Arenapoints|Arena Season 3',
		'Legs3'  => 'Vengeful Gladiator\\\'s Scaled Legguards|1.875 Arenapoints|Arena Season 3',
		'Shoulder3' => 'Vengeful Gladiator\\\'s Scaled Shoulders|1.500 Arenapoints|Arena Season 3'
);

$lang['ItemSets_Set']['Arena_3']['Warlock'] = array(
		'Chest1' => 'Vengeful Gladiator\\\'s Dreadweave Robe|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Dreadweave Gloves|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Dreadweave Hood|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Dreadweave Leggings|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Dreadweave Mantle|1.500 Arenapoints|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Vengeful Gladiator\\\'s Felweave Cowl|1.875 Arenapoints|Arena Season 3',
		'Hands2' => 'Vengeful Gladiator\\\'s Felweave Handguards|1.125 Arenapoints|Arena Season 3',
		'Head2'  => 'Vengeful Gladiator\\\'s Felweave Crown|1.875 Arenapoints|Arena Season 3',
		'Legs2'  => 'Vengeful Gladiator\\\'s Felweave Trousers|1.875 Arenapoints|Arena Season 3',
		'Shoulder2' => 'Vengeful Gladiator\\\'s Felweave Amice|1.500 Arenapoints|Arena Season 3',
		'Separator2' => '',
		'Chest3' => '',
		'Hands3' => '',
		'Head3'  => '',
		'Legs3'  => '',
		'Shoulder3' => ''
);

$lang['ItemSets_Set']['Arena_3']['Hunter'] = array(
		'Chest1' => 'Vengeful Gladiator\\\'s Chain Armor|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Chain Gauntlets|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Chain Helm|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Chain Leggings|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Chain Spaulders|1.500 Arenapoints|Arena Season 3',
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

$lang['ItemSets_Set']['Arena_3']['Shaman'] = array(
		'Chest1' => 'Vengeful Gladiator\\\'s Linked Armor|1.875 Arenapoints|Arena Season 3',
		'Hands1' => 'Vengeful Gladiator\\\'s Linked Gauntlets|1.125 Arenapoints|Arena Season 3',
		'Head1'  => 'Vengeful Gladiator\\\'s Linked Helm|1.875 Arenapoints|Arena Season 3',
		'Legs1'  => 'Vengeful Gladiator\\\'s Linked Leggings|1.875 Arenapoints|Arena Season 3',
		'Shoulder1' => 'Vengeful Gladiator\\\'s Linked Spaulders|1.500 Arenapoints|Arena Season 3',
		'Separator1' => '-setname-',
		'Chest2' => 'Vengeful Gladiator\\\'s Ringmail Armor|1.875 Arenapoints|Arena Season 3',
		'Hands2' => 'Vengeful Gladiator\\\'s Ringmail Gauntlets|1.125 Arenapoints|Arena Season 3',
		'Head2'  => 'Vengeful Gladiator\\\'s Ringmail Helm|1.875 Arenapoints|Arena Season 3',
		'Legs2'  => 'Vengeful Gladiator\\\'s Ringmail Leggings|1.875 Arenapoints|Arena Season 3',
		'Shoulder2' => 'Vengeful Gladiator\\\'s Ringmail Spaulders|1.500 Arenapoints|Arena Season 3',
		'Separator2' => '-setname-',
		'Chest3' => 'Vengeful Gladiator\\\'s Mail Armor|1.875 Arenapoints|Arena Season 3',
		'Hands3' => 'Vengeful Gladiator\\\'s Mail Gauntlets|1.125 Arenapoints|Arena Season 3',
		'Head3'  => 'Vengeful Gladiator\\\'s Mail Helm|1.875 Arenapoints|Arena Season 3',
		'Legs3'  => 'Vengeful Gladiator\\\'s Mail Leggings|1.875 Arenapoints|Arena Season 3',
		'Shoulder3' => 'Vengeful Gladiator\\\'s Mail Spaulders|1.500 Arenapoints|Arena Season 3'
);

?>
