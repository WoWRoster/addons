<?php

/**
 * WoWRoster.net RaidTracker
 *
 * RaidTracker is a Roster addon that allows you to track raids, bosskills, loot
 * with the data from CT_RaidTracker MLdkp WoW Addon
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.2.1
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=55.html
 *
*/

// German translation credits: Geschan, YamYam

$wordings['deDE']['RaidTracker'] = 'Raid Tracker';
$rt_wordings['deDE']['LootHistory'] = 'Loot History';
$rt_wordings['deDE']['BossProgress'] = 'Boss Fortschritt';
$rt_wordings['deDE']['BossProgressBC'] = 'Boss Fortschritt';
$rt_wordings['deDE']['Summary'] = 'Inhalts&uuml;bersicht';
$rt_wordings['deDE']['Admin'] = 'Raid admin';

$rt_wordings['deDE']['RandomRaid'] = 'Zuf&auml;lliger Schlachtzug';
$rt_wordings['deDE']['LootType'] = 'Loot Arten';
$rt_wordings['deDE']['AllZones'] = 'Alle Zonen';
$rt_wordings['deDE']['AllTypes'] = 'Alle Arten';


// RaidList localization
$rt_wordings['deDE']['Zone'] = 'Zone';
$rt_wordings['deDE']['Date'] = 'Datum';
$rt_wordings['deDE']['LootCount'] = '# Gegenst&auml;nde';
$rt_wordings['deDE']['BossKills'] = '# Bosse';
$rt_wordings['deDE']['Attendees'] = '# Teilnehmer';
$rt_wordings['deDE']['Note'] = 'Notiz';

$rt_wordings['deDE']['RaidList'] = 'W&auml;hle einen Schlachtzug:';
$rt_wordings['deDE']['LootWinners'] = 'Loot Gewinner';

//admin localisation
$rt_wordings['deDE']['Admindelete'] = 'raid deletion';
$rt_wordings['deDE']['Supp'] = 'del';
$rt_wordings['deDE']['ConfSupp'] = 'confirm deletion raid number';

// RaidView localization
$rt_wordings['deDE']['LootTypes'] = array(
	'ffff8000' => 'Legend&auml;rer Loot',
	'ffa335ee' => 'Epischer Loot',
	'ff0070dd' => 'Seltener Loot',
	'ff1eff00' => 'Au&szlig;ergew&ouml;hnlicher Loot',
);

$rt_wordings['deDE']['Raiders'] = 'Schlachtzug Teilnehmer';
$rt_wordings['deDE']['Name'] = 'Name';
$rt_wordings['deDE']['Looted'] = 'Gelooted (oder Gewonnen)';
$rt_wordings['deDE']['Joined'] = 'Beigetreten';
$rt_wordings['deDE']['Left'] = 'Verlassen';
$rt_wordings['deDE']['Note'] = 'Notiz';

$rt_wordings['deDE']['BossKill'] = 'Bosse get&ouml;tet';
$rt_wordings['deDE']['Boss'] = 'Boss';
$rt_wordings['deDE']['KillCount'] = '# get&ouml;tet';
$rt_wordings['deDE']['KillTime'] = 'Zeit';
$rt_wordings['deDE']['TotalKills'] = 'Alle Siege';

// Loothistory localization
$rt_wordings['deDE']['Count'] = 'x gelooted';
$rt_wordings['deDE']['TotalDrop'] = 'Alle Gegenst&auml;nde';
$rt_wordings['deDE']['TotalRaiders'] = 'Alle Teilnehmer';

// Boss Progress localization
$rt_wordings['deDE']['Status'] = 'Status';
$rt_wordings['deDE']['Progress'] = 'Fortschritt';
$rt_wordings['deDE']['Killed'] = 'Get&ouml;tet';
$rt_wordings['deDE']['NotKilled'] = 'Noch nicht get&ouml;tet';
$rt_wordings['deDE']['Completed'] = 'Vollst&auml;ndig';

$rt_wordings['deDE']['Zones'] = array(
	"Zul'Gurub" => "Zul'Gurub",
	"Onyxia's Lair" => "Onyxias Hort",
	"Molten Core" => "Geschmolzener Kern",
	"Blackwing Lair" => "Pechschwingenhort",
	"Ahn'Qiraj Ruins" => "Ruinen von Ahn'Qiraj",
	"Ahn'Qiraj Temple" => "Tempel von Ahn'Qiraj",
	"Naxxramas" => "Naxxramas",
	"RandomRaid" => "World Bosse",
);

$rt_wordings['deDE']['ZonesBC'] = array(
	"Karazhan" => "Karazhan",
	"Gruul's Lair" =>"Gruul's Lair",
	"Magtheridon's Lair" => "Magtheridon's Lair",
	"Serpentshrine Cavern" =>"Serpentshrine Cavern",
	"Tempest Keep: The Eye" => "TK: The Eye",
	"Battle of Mount Hyjal" => "Battle of Mount Hyjal",
	"Black Temple" => "Black Temple",
	"RandomRaidBC" => "World Bosses",
);

$rt_wordings['deDE']['Bosses'] = array(
	"Onyxia's Lair" => array(
		"Onyxia" => "Onyxia",
	),
	'Molten Core' => array(
		"Lucifron" => "Lucifron",
		"Magmadar" => "Magmadar",
		"Gehennas" => "Gehennas",
		"Garr" => "Garr",
		"Baron Geddon" => "Baron Geddon",
		"Shazzrah" => "Shazzrah",
		"Sulfuron Harbinger" => "Sulfuron-Herold",
		"Golemagg the Incinerator" => "Golemagg der Verbrenner",
		"Majordomo Executus" => "Majordomo Executus",
		"Ragnaros" => "Ragnaros",
	),
	"Zul'Gurub" => array(
		"High Priestess Jeklik" => "Hohepriesterin Jeklik",
		"High Priest Venoxis" => "Hohepriester Venoxis",
		"High Priestess Mar'li" => "Hohepriesterin Mar'li",
		"High Priest Thekal" => "Hohepriester Thekal",
		"High Priestess Arlokk" => "Hohepriesterin Arlokk",
		"Hakkar" => "Hakkar",
		"Bloodlord Mandokir" => "Blutlord Mandokir",
		"Jin'do the Hexxer" => "Jin'do der Verhexer",
		"Gahz'ranka" => "Gahz'ranka",
		"Hazza'rah" => "Hazza'rah",
		"Gri'lek" => "Gri'lek",
		"Renataki" => "Renataki",
		"Wushoolay" => "Wushoolay",
	),
	"Ahn'Qiraj Ruins" => array(
		"Kurinnaxx" => "Kurinnaxx",
		"General Rajaxx" => "General Rajaxx",
		"Ayamiss the Hunter" => "Ayamiss der J&auml;ger",
		"Moam" => "Moam",
		"Buru The Gorger" => "Buru der Verschlinger",
		"Ossirian The Unscarred" => "Ossirian der Narbenlose",
	),
	'Blackwing Lair' => array(
		"Razorgore the Untamed" => "Razorgore der Ungez&auml;hmte",
		"Vaelastrasz the Corrupt" => "Vaelastrasz der Verdorbene",
		"Broodlord Lashlayer" => "Brutw&auml;chter Dreschbringer",
		"Firemaw" => "Feuerschwinge",
		"Ebonroc" => "Schattenschwinge",
		"Flamegor" => "Flammenmaul",
		"Chromaggus" => "Chromaggus",
		"Nefarian" => "Nefarian",
	),
	'RandomRaid' => array(
		'Azuregos' => "Azuregos",
		'Lord Kazzak' => "Lord Kazzak",
		'Taerar' => "Taerar",
		'Emeriss' => "Emeriss",
		'Ysondre' => "Ysondre",
		'Lethon' => "Lethon",
	),
	"Ahn'Qiraj Temple" => array(
		"The Prophet Skeram" => "Der Prophet Skeram",
		"Fankriss the Unyielding" => "Fankriss der Unnachgiebige",
		"Battleguard Sartura" => "Schlachtwache Sartura",
		"Princess Huhuran" => "Prinzessin Huhuran",
		"Twin Emperors" => "Die Zwillingsimperatoren",
		"C'Thun" => "C'Thun",
		"Vem" => "Vem &amp; Co",
		"Viscidus" => "Viscidus",
		"Ouro" => "Ouro",
	),
	"Naxxramas" => array(
		"Patchwerk" => "Flickwerk",
		"Grobbulus" => "Grobbulus",
		"Gluth" => "Gluth",
		"Thaddius" => "Thaddius",
		"Anub'Rekhan" => "Anub'Rekhan",
		"Grand Widow Faerlina" => "Gro&szlig;witwe Faerlina",
		"Maexxna" => "Maexxna",
		"Instructor Razuvious" => "Instrukteur Razuvious",
		"Gothik the Harvester" => "Gothik der Seelenj&auml;ger",
		"Highlord Mograine" => "Die vier Ritter",
		"Noth The Plaguebringer" => "Noth der Seuchenf&uuml;rst",
		"Heigan the Unclean" => "Heigan der Unreine",
		"Loatheb" => "Loatheb",
		"Sapphiron" => "Sapphiron",
		"Kel'Thuzad" => "Kel'Thuzad",
	),
	"Karazhan" => array(
		"Attumen the Huntsman" => "Attumen le Veneur",
		"Moroes" => "Moroes",
		"Maiden of Virtue" => "Damoiselle de Vertu",
		"Hyakiss the Lurker" => "Hyakiss la R&ocirc;deuse",
		"Rokad the Ravager" => "Rodak le Ravageur",
		"Shadikith the Glider" => "Shadikith le Glisseur",
		"The Crone" => "Magicien d'Oz",
		"The Big Bad Wolf" => "Grand M&eacute;chant Loup",
		"Romulo and Julianne" => "Romulo et Julianne",
		"The Curator" => "Le conservateur",
		"Terestian Illhoof" => "Terestian Malsabot",
		"Shade of Aran" => "l'Ombre d'Aran",
		"Netherspite" => "D&eacute;dain-du-N&eacute;ant",
		"Chess Event" => "Chess Event",
		"Prince Malchezaar" => "Prince Malchezaar",
		"Nightbane" => "Nightbane",
	),
	"Gruul's Lair" => array(
		"High King Maulgar" => "Grand roi Maulgar",
		"Gruul the Dragonkiller" => "Gruul le tueur de dragons",
	),
	"Magtheridon's Lair" => array(
		"Magtheridon" => "Magtheridon",
	),
	"Serpentshrine Cavern" => array(
		"Hydross the Unstable" => "Hydross the Unstable",
		"The Lurker Below" => "The Lurker Below",
		"Leotheras the Blind" => "Leotheras the Blind",
		"Fathom-Lord Karathress" => "Fathom-Lord Karathress",
		"Morogrim Tidewalker" => "Morogrim Tidewalker",
		"Lady Vashj" => "Lady Vashj",
	),
	"Tempest Keep: The Eye" => array(
		"Al'ar" => "Al'ar",
		"High Astromancer Solarian" => "High Astromancer Solarian",
		"Void Reaver" => "Void Reaver",
		"Kael'thas Sunstrider" => "Kael'thas Sunstrider",
	),
	"Battle of Mount Hyjal" => array(
		"Rage Winterchill" => "Rage Winterchill",
		"Anetheron" => "Anetheron",
		"Kaz'rogal" => "Kaz'rogal",
		"Azgalor" => "Azgalor",
		"Archimonde" => "Archimonde",
	),
	"Black Temple" => array(
		"High Warlord Naj'entus" => "High Warlord Naj'entus",
		"Supremus" => "Supremus",
		"Gurtogg Bloodboil" => "Gurtogg Bloodboil",
		"Teron Gorefiend" => "Teron Gorefiend",
		"Shade of Akama" => "Shade of Akama",
		"Essence of Souls" => "Essence of Souls",
		"Mother Shahraz" => "Mother Shahraz",
		"Illidari Council" => "Illidari Council",
		"Illidan Stormrage" => "Illidan Stormrage",
	),
	'RandomRaidBC' => array(
		'Lord Kazzak' => "Seigneur Kazzak",
	),
);

// Summary localisations
$rt_wordings['deDE']['LootType'] = 'Loot Art';
$rt_wordings['deDE']['RaidZone'] = 'Raid Zone';
$rt_wordings['deDE']['RaidHistory'] = 'Schlachtzug History';
$rt_wordings['deDE']['RaidCount'] = '# Schlachtz&uuml;ge';
$rt_wordings['deDE']['TotalRaids'] = 'Alle Schlachtz&uuml;ge';

// Raid Attendance localization
$rt_wordings['deDE']['Attendance'] = 'Schlachtzug Teilnehmer';
$rt_wordings['deDE']['Total'] = 'Gesamt';

?>