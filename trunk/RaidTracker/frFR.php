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

// French translation credits: Zarctus

$wordings['frFR']['RaidTracker'] = 'Raid Tracker';
$rt_wordings['frFR']['LootHistory'] = 'Historique des loots';
$rt_wordings['frFR']['BossProgress'] = 'Progression des bosses';
$rt_wordings['frFR']['BossProgressBC'] = 'Progression des bosses BC';
$rt_wordings['frFR']['Summary'] = 'Sommaire';
$rt_wordings['frFR']['Admin'] = 'administration des raids';

$rt_wordings['frFR']['RandomRaid'] = 'Raid Al&eacute;atoire';
$rt_wordings['frFR']['LootType'] = 'Type de loot';
$rt_wordings['frFR']['AllZones'] = 'Toutes zones';
$rt_wordings['frFR']['AllTypes'] = 'Tous types';


// RaidList localization
$rt_wordings['frFR']['Zone'] = 'Zone';
$rt_wordings['frFR']['Date'] = 'Date';
$rt_wordings['frFR']['LootCount'] = '# Loot';
$rt_wordings['frFR']['BossKills'] = '# bosses';
$rt_wordings['frFR']['Attendees'] = '# Participants';
$rt_wordings['frFR']['Note'] = 'Note';

$rt_wordings['frFR']['RaidList'] = 'S&eacute;l&eacute;ctionnez un raid:';
$rt_wordings['frFR']['LootWinners'] = 'Gagnant du loot';

//admin localisation
$rt_wordings['frFR']['Admindelete'] = 'Suppression d\'un raid:';
$rt_wordings['frFR']['Supp'] = 'Supr';
$rt_wordings['frFR']['ConfSupp'] = 'confirmer la supression du raid';



// RaidView localization
$rt_wordings['frFR']['LootTypes'] = array(
	'ffff8000' => 'Loot l&eacute;gendaire',
	'ffa335ee' => 'Loot &eacute;pique',
	'ff0070dd' => 'Loot rare',
	'ff1eff00' => 'Loot inhabituel',
);

$rt_wordings['frFR']['Raiders'] = 'Participants au raid';
$rt_wordings['frFR']['Name'] = 'Nom';
$rt_wordings['frFR']['Looted'] = 'Loot&eacute; (ou gagn&eacute;)';
$rt_wordings['frFR']['Joined'] = 'A rejoint le raid';
$rt_wordings['frFR']['Left'] = 'Est parti du raid';
$rt_wordings['frFR']['Note'] = 'Note';

$rt_wordings['frFR']['BossKill'] = 'Bosses tu&eacute;s';
$rt_wordings['frFR']['Boss'] = 'Bosse';
$rt_wordings['frFR']['KillCount'] = '# Tu&eacute;';
$rt_wordings['frFR']['KillTime'] = 'Temps pass&eacute;';
$rt_wordings['frFR']['TotalKills'] = 'Nombre de fois tu&eacute;';

// Loothistory localization
$rt_wordings['frFR']['Count'] = 'x loot&eacute;';
$rt_wordings['frFR']['TotalDrop'] = 'Dropes totaux';
$rt_wordings['frFR']['TotalRaiders'] = 'Total des participants';

// Boss Progress localization
$rt_wordings['frFR']['Status'] = 'Status';
$rt_wordings['frFR']['Progress'] = 'Progression';
$rt_wordings['frFR']['Killed'] = 'Tu&eacute;s';
$rt_wordings['frFR']['NotKilled'] = 'Pas encore tu&eacute;s';
$rt_wordings['frFR']['Completed'] = 'D&eacute;gag&eacute;';

$rt_wordings['frFR']['Zones'] = array(	
	"Zul'Gurub" => "Zul'Gurub",
	"Onyxia's Lair" => "Repaire d'Onyxia",
	"Molten Core" => "C&oelig;ur du Magma",
	"Blackwing Lair" => "Repaire de l'Aile noire",
	"Ahn'Qiraj Ruins" => "Ruines d'Ahn'Qiraj",
	"Ahn'Qiraj Temple" => "Temple d'Ahn'Qiraj",
	"Naxxramas" => "Naxxramas",
	"RandomRaid" => "World Bosses",
);
$rt_wordings['frFR']['ZonesBC'] = array(
	"Karazhan" => "Karazhan",
	"Gruul's Lair" =>"Le repaire de Gruul",
	"Magtheridon's Lair" => "Le repaire de Magtheridon",
	"Serpentshrine Cavern" =>"Serpentshrine Cavern",
	"Tempest Keep: The Eye" => "TK: The Eye",
	"Battle of Mount Hyjal" => "Battle of Mount Hyjal",
	"Black Temple" => "Black Temple",
	"RandomRaidBC" => "World Bosses",	
	
);

$rt_wordings['frFR']['Bosses'] = array(
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
		"Sulfuron Harbinger" => "Messager de Sulfuron",
		"Golemagg the Incinerator" => "Golemagg l'incin&eacute;rateur",
		"Majordomo Executus" => "Majordomo Executus",
		"Ragnaros" => "Ragnaros",
	),
	"Zul'Gurub" => array(
		"High Priestess Jeklik" => "Grande Pr&ecirc;tresse Jeklik",
		"High Priest Venoxis" => "Grand Pr&ecirc;tre Venoxis",
		"High Priestess Mar'li" => "Grande Pr&ecirc;tresse Mar'li",
		"High Priest Thekal" => "Grand Pr&ecirc;tre Thekal",
		"High Priestess Arlokk" => "Grande Pr&ecirc;tresse Arlokk",
		"Hakkar" => "Hakkar",
		"Bloodlord Mandokir" => "Seigneur Sanglant Mandokir",
		"Jin'do the Hexxer" => "Jin'do le Mal&eacute;ficieur",
		"Gahz'ranka" => "Gahz'ranka",
		"Hazza'rah" => "Hazza'rah Tisser&ecirc;ve",
		"Gri'lek" => "Gri'lek du Sang de fer",
		"Renataki" => "Renataki des Mille lames",
		"Wushoolay" => "Wushoolay la Sorci&egrave;re des temp&ecirc;tes",
	),
	"Ahn'Qiraj Ruins" => array(
		"Kurinnaxx" => "Kurinnaxx",
		"General Rajaxx" => "G&eacute;n&eacute;ral Rajaxx",
		"Ayamiss the Hunter" => "Ayamiss le Chasseur",
		"Moam" => "Moam",
		"Buru The Gorger" => "Buru Grandgosier",
		"Ossirian The Unscarred" => "Ossirian l'Intouch&eacute;",
	),
	'Blackwing Lair' => array(
		"Razorgore the Untamed" => "Tranchetripe l'Indompt&eacute;",
		"Vaelastrasz the Corrupt" => "Caelastrasz le Corrumpu",
		"Broodlord Lashlayer" => "Seigneur des couv&eacute;es Lashslayer",
		"Firemaw" => "Gueule-de-feu",
		"Ebonroc" => "Roch&eacute;b&egrave;ne",
		"Flamegor" => "Flamegor",
		"Chromaggus" => "Chromaggus",
		"Nefarian" => "Nefarian",
	),
	'RandomRaid' => array(
		'Azuregos' => "Azuregos",
		'Taerar' => "Taerar",
		'Emeriss' => "Emeriss",
		'Ysondre' => "Ysondre",
		'Lethon' => "L&eacute;thon",
	),
	"Ahn'Qiraj Temple" => array(
		"The Prophet Skeram" => "Le Proph&egrave;te Skeram",
		"Fankriss the Unyielding" => "Fankriss l'Inflexible",
		"Battleguard Sartura" => "Garde de guerre Sartura",
		"Princess Huhuran" => "Princesse Huhuran",
		"Twin Emperors" => "Les Empereurs Jumeaux",
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
		"Instructor Razuvious" => "Instructeur Razuvious",
		"Gothik the Harvester" => "Gothik the Harvester",
		"Highlord Mograine" => "Les Quatre Cavaliers",
		"Noth The Plaguebringer" => "Noth le Plaguebringer",
		"Heigan the Unclean" => "Heigan le Unclean",
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
$rt_wordings['frFR']['LootType'] = 'Type de loot';
$rt_wordings['frFR']['RaidZone'] = 'Zone du raid';
$rt_wordings['frFR']['RaidHistory'] = 'Historique du raid';
$rt_wordings['frFR']['RaidCount'] = '# raids';
$rt_wordings['frFR']['TotalRaids'] = 'Nombre total de raid';

// Raid Attendance localization
$rt_wordings['frFR']['Attendance'] = 'Raid Attendance';
$rt_wordings['frFR']['Total'] = 'Total';

?>