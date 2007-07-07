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

$wordings['enUS']['RaidTracker'] = 'Raid Tracker';
$rt_wordings['enUS']['LootHistory'] = 'Loot History';
$rt_wordings['enUS']['BossProgress'] = 'Boss Progress';
$rt_wordings['enUS']['BossProgressBC'] = 'Boss Progress BC';
$rt_wordings['enUS']['Summary'] = 'Summary';
$rt_wordings['enUS']['Admin'] = 'Raid Admin';

$rt_wordings['enUS']['RandomRaid'] = 'Random Raid Event';
$rt_wordings['enUS']['LootType'] = 'Loot Type';
$rt_wordings['enUS']['AllZones'] = 'All Zones';
$rt_wordings['enUS']['AllTypes'] = 'All Types';


// RaidList localization
$rt_wordings['enUS']['Zone'] = 'Zone';
$rt_wordings['enUS']['Date'] = 'Date';
$rt_wordings['enUS']['LootCount'] = '# Loot';
$rt_wordings['enUS']['BossKills'] = '# bosses';
$rt_wordings['enUS']['Attendees'] = '# Attendees';
$rt_wordings['enUS']['Note'] = 'Note';

$rt_wordings['enUS']['RaidList'] = 'Select a raid:';
$rt_wordings['enUS']['LootWinners'] = 'Loot Winners';

// RaidView localization
$rt_wordings['enUS']['LootTypes'] = array(
	'ffff8000' => 'Legendary Loot',
	'ffa335ee' => 'Epic Loot',
	'ff0070dd' => 'Rare Loot',
	'ff1eff00' => 'Uncommon Loot',
);

$rt_wordings['enUS']['Raiders'] = 'Raid Attendees';
$rt_wordings['enUS']['Name'] = 'Name';
$rt_wordings['enUS']['Looted'] = 'Looted (or Won)';
$rt_wordings['enUS']['Joined'] = 'Joined Raid';
$rt_wordings['enUS']['Left'] = 'Left Raid';
$rt_wordings['enUS']['Note'] = 'Note';

$rt_wordings['enUS']['BossKill'] = 'Bosses Killed';
$rt_wordings['enUS']['Boss'] = 'Boss';
$rt_wordings['enUS']['KillCount'] = '# killed';
$rt_wordings['enUS']['KillTime'] = 'Time';
$rt_wordings['enUS']['TotalKills'] = 'Total Kills';

// Loothistory localization
$rt_wordings['enUS']['Count'] = 'x Looted';
$rt_wordings['enUS']['TotalDrop'] = 'Total Drops';
$rt_wordings['enUS']['TotalRaiders'] = 'Total Attendees';

// Boss Progress localization
$rt_wordings['enUS']['Status'] = 'Status';
$rt_wordings['enUS']['Progress'] = 'Progress';
$rt_wordings['enUS']['Killed'] = 'Killed';
$rt_wordings['enUS']['NotKilled'] = 'Not Killed Yet';
$rt_wordings['enUS']['Completed'] = 'Completed';

// WoW Zones
$rt_wordings['enUS']['Zones'] = array(
	"Zul'Gurub" => "Zul'Gurub",
	"Onyxia's Lair" => "Onyxia's Lair",
	"Molten Core" => "Molten Core",
	"Blackwing Lair" => "Blackwing Lair",
	"Ahn'Qiraj Ruins" => "Ahn'Qiraj Ruins",
	"Ahn'Qiraj Temple" => "Ahn'Qiraj Temple",
	"Naxxramas" => "Naxxramas",
	"RandomRaid" => "World Bosses",
);

// BC Zones
$rt_wordings['enUS']['ZonesBC'] = array(
	"Karazhan" => "Karazhan",
	"Gruul's Lair" =>"Gruul's Lair",
	"Magtheridon's Lair" => "Magtheridon's Lair",
	"Serpentshrine Cavern" => "Serpentshrine Cavern",
	"Tempest Keep: The Eye" => "TK: The Eye",
	"Battle of Mount Hyjal" => "Battle of Mount Hyjal",
	"Black Temple" => "Black Temple",
	"RandomRaidBC" => "World Bosses",
);


$rt_wordings['enUS']['Bosses'] = array(
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
		"Sulfuron Harbinger" => "Sulfuron Harbinger",
		"Golemagg the Incinerator" => "Golemagg the Incinerator",
		"Majordomo Executus" => "Majordomo Executus",
		"Ragnaros" => "Ragnaros",
	),
	"Zul'Gurub" => array(
		"High Priestess Jeklik" => "High Priestess Jeklik",
		"High Priest Venoxis" => "High Priest Venoxis",
		"High Priestess Mar'li" => "High Priestess Mar'li",
		"High Priest Thekal" => "High Priest Thekal",
		"High Priestess Arlokk" => "High Priestess Arlokk",
		"Hakkar" => "Hakkar",
		"Bloodlord Mandokir" => "Bloodlord Mandokir",
		"Jin'do the Hexxer" => "Jin'do the Hexxer",
		"Gahz'ranka" => "Gahz'ranka",
		"Hazza'rah" => "Hazza'rah, the Dreamweaver",
		"Gri'lek" => "Gri'lek, of the Iron Blood",
		"Renataki" => "Renataki, of the Thousand Blades",
		"Wushoolay" => "Wushoolay, the Storm Witch",
		
	),
	"Ahn'Qiraj Ruins" => array(
		"Kurinnaxx" => "Kurinnaxx",
		"General Rajaxx" => "General Rajaxx",
		"Ayamiss the Hunter" => "Ayamiss the Hunter",
		"Moam" => "Moam",
		"Buru The Gorger" => "Buru The Gorger",
		"Ossirian The Unscarred" => "Ossirian The Unscarred",
	),
	'Blackwing Lair' => array(
		"Razorgore the Untamed" => "Razorgore the Untamed",
		"Vaelastrasz the Corrupt" => "Vaelastrasz the Corrupt",
		"Broodlord Lashlayer" => "Broodlord Lashlayer",
		"Firemaw" => "Firemaw",
		"Ebonroc" => "Ebonroc",
		"Flamegor" => "Flamegor",
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
		"The Prophet Skeram" => "The Prophet Skeram",
		"Fankriss the Unyielding" => "Fankriss the Unyielding",
		"Battleguard Sartura" => "Battleguard Sartura",
		"Princess Huhuran" => "Princess Huhuran",
		"Twin Emperors" => "Twin Emperors",
		"C'Thun" => "C'Thun",
		"Vem" => "Vem &amp; Co",
		"Viscidus" => "Viscidus",
		"Ouro" => "Ouro",
	),
	"Naxxramas" => array(
		"Patchwerk" => "Patchwerk",
		"Grobbulus" => "Grobbulus",
		"Gluth" => "Gluth",
		"Thaddius" => "Thaddius",
		"Anub'Rekhan" => "Anub'Rekhan",
		"Grand Widow Faerlina" => "Grand Widow Faerlina",
		"Maexxna" => "Maexxna",
		"Instructor Razuvious" => "Instructor Razuvious",
		"Gothik the Harvester" => "Gothik the Harvester",
		"Highlord Mograine" => "The Four Horsemen",
		"Noth The Plaguebringer" => "Noth The Plaguebringer",
		"Heigan the Unclean" => "Heigan the Unclean",
		"Loatheb" => "Loatheb",
		"Sapphiron" => "Sapphiron",
		"Kel'Thuzad" => "Kel'Thuzad",
	),
	
	"Karazhan" => array(
		"Attumen the Huntsman" => "Attumen the Huntsman",
		"Moroes" => "Moroes",
		"Maiden of Virtue" => "Maiden of Virtue",
		"Hyakiss the Lurker" => "Hyakiss the Lurker",
		"Rokad the Ravager" => "Rokad the Ravager",
		"Shadikith the Glider" => "Shadikith the Glider",
		"The Crone" => "The Crone",
		"The Big Bad Wolf" => "The Big Bad Wolf",
		"Romulo and Julianne" => "Romulo & Julianne",
		"The Curator" => "The Curator",
		"Terestian Illhoof" => "Terestian Illhoof",
		"Shade of Aran" => "Shade of Aran",
		"Netherspite" => "Netherspite",
		"Chess Event" => "Chess Event",
		"Prince Malchezaar" => "Prince Malchezaar",
		"Nightbane" => "Nightbane",
	),
	"Gruul's Lair" => array(
		"High King Maulgar" => "High King Maulgar",
		"Gruul the Dragonkiller" => "Gruul the Dragonkiller",
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
		'Lord Kazzak' => "Lord Kazzak",
		'Doomwalker' => "Doomwalker",
	),
);


// Summary localisations
$rt_wordings['enUS']['LootType'] = 'Loot Type';
$rt_wordings['enUS']['RaidZone'] = 'Raid Zone';
$rt_wordings['enUS']['RaidHistory'] = 'Raid History';
$rt_wordings['enUS']['RaidCount'] = '# Raided';
$rt_wordings['enUS']['TotalRaids'] = 'Total Raids';

// Raid Attendance localization
$rt_wordings['enUS']['Attendance'] = 'Raid Attendance';
$rt_wordings['enUS']['Total'] = 'Total';

// Raid Admin localizations
$rt_wordings['enUS']['DeleteRaids'] = 'Delete Raids';
$rt_wordings['enUS']['Del'] = 'del';
$rt_wordings['enUS']['ConfDel'] = 'confirm deletion raid number';
$rt_wordings['enUS'][''] = '';
$rt_wordings['enUS'][''] = '';
$rt_wordings['enUS'][''] = '';
$rt_wordings['enUS'][''] = '';
$rt_wordings['enUS'][''] = '';
$rt_wordings['enUS'][''] = '';

?>