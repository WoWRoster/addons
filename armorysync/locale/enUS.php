<?php
/**
 * WoWRoster.net WoWRoster
 *
 * english localisaton thx to zanix@wowroster.net
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    ArmorySync
*/

// -[ enUS Localization ]-

// Button names
$lang['async_button1']			= 'ArmorySync Character|Synchronize your character with Blizzard\'s Armory';
$lang['async_button2']			= 'ArmorySync Character|Synchronize your guilds characters with Blizzard\'s Armory';
$lang['async_button3']			= 'ArmorySync Character|Synchronize your realms character with Blizzard\'s Armory';
$lang['async_button4']			= 'ArmorySync Memberlist|Synchronize your memberlist with Blizzard\'s Armory';
$lang['async_button5']			= 'ArmorySync Memberlist for a new guild|Add a new guild and aynchronize<br />the memberlist with Blizzard\'s Armory';

// Config strings
$lang['admin']['armorysync_conf']			= 'ArmorySync Configuration|Configure base settings for armorysync';
$lang['admin']['armorysync_host']			= 'Host|Host to Synchronize with';
$lang['admin']['armorysync_minlevel']		= 'Minimum Level|Minimum level of characters to synchronize<br />Currently this should be no lower than 10 since<br />the armory doesn\'t list characters lower than level 10';
$lang['admin']['armorysync_synchcutofftime']	= 'Sync cutoff time|Time in days<br />All characters not updated in last (x) days will be synchronized';
$lang['admin']['armorysync_use_ajax']	= 'Use AJAX|Wether to use AJAX for status update or not.';
$lang['admin']['armorysync_reloadwaittime']	= 'Reload wait time|Time in seconds<br />Time in seconds before next synchronization during a sync job';
$lang['admin']['armorysync_fetch_timeout'] = 'Armory Fetch timeout|Time in seconds till a fetch of a single XML file is aborted.';
$lang['admin']['armorysync_skip_start'] = 'Skip start page|Skip start page on ArmorySync updates.';
$lang['admin']['armorysync_status_hide'] = 'Hide status windows initialy|Hide the status windows of ArmorySync on the first load.';
$lang['admin']['armorysync_char_update_access'] = 'Char Update Access Level|Who ia able to do character updates';
$lang['admin']['armorysync_guild_update_access'] = 'Guild Update Access Level|Who ia able to do guild updates';
$lang['admin']['armorysync_guild_memberlist_update_access'] = 'Guild Memberlist Update Access Level|Who ia able to do guild memberlist updates';
$lang['admin']['armorysync_realm_update_access'] = 'Realm Update Access Level|Who ia able to do realm updates';
$lang['admin']['armorysync_guild_add_access'] = 'Guild Add Access Level|Who ia able to add new guilds';
//$lang['admin']['armorysync_usecurl']		= 'Use Curl|Auf false setzen wenn du die original FileSocket function benutzen möchtest.';
//$lang['admin']['armorysync_debuglevel']		= 'Debug level';
//$lang['admin']['armorysync_updateroster']	= "Update Roster|Das Roster aktualisieren oder nicht.<br />Sinnvoll fürs Debuggen.";
//$lang['admin']['armorysync_ismysqllower411']	= "MySQL < 4.1.1|Auf True setzen wenn deine MySQL Version kleiner als 4.1.1 ist.";
$lang['admin']['armorysync_protectedtitle']	= 'Protected Guild Title|Characters with these guild titles are protected<br />from being deleted by a synchronization against the armory.<br />This problem often occours with bank characters.<br />Multiple values seperated by a comma (,) \"Banker,Stock\"';


$lang['bindings']['bind_on_pickup'] = "Binds when picked up";
$lang['bindings']['bind_on_equip'] = "Binds when equiped";
$lang['bindings']['bind'] = "Soulbound";

// Addon strings
$lang['RepStanding']['Exalted'] = 'Exalted';
$lang['RepStanding']['Revered'] = 'Revered';
$lang['RepStanding']['Honored'] = 'Honored';
$lang['RepStanding']['Friendly'] = 'Friendly';
$lang['RepStanding']['Neutral'] = 'Neutral';
$lang['RepStanding']['Unfriendly'] = 'Unfriendly';
$lang['RepStanding']['Hostile'] = 'Hostile';
$lang['RepStanding']['Hated'] = 'Hated';

$lang['Skills']['Class Skills'] = "Class Skills";
$lang['Skills']['Professions'] = "Professions";
$lang['Skills']['Secondary Skills'] = "Secondary Skills";
$lang['Skills']['Weapon Skills'] = "Weapon Skills";
$lang['Skills']['Armor Proficiencies'] = "Armor Proficiencies";
$lang['Skills']['Languages'] = "Languages";


$lang['Classes']['Druid'] = 'Druid';
$lang['Classes']['Hunter'] = 'Hunter';
$lang['Classes']['Mage'] = 'Mage';
$lang['Classes']['Paladin'] = 'Paladin';
$lang['Classes']['Priest'] = 'Priest';
$lang['Classes']['Rogue'] = 'Rogue';
$lang['Classes']['Shaman'] = 'Shaman';
$lang['Classes']['Warlock'] = 'Warlock';
$lang['Classes']['Warrior'] = 'Warrior';

$lang['Talenttrees']['Druid']['Balance'] = "Balance";
$lang['Talenttrees']['Druid']['Feral Combat'] = "Feral Combat";
$lang['Talenttrees']['Druid']['Restoration'] = "Restoration";
$lang['Talenttrees']['Hunter']['Beast Mastery'] = "Beast Mastery";
$lang['Talenttrees']['Hunter']['Marksmanship'] = "Marksmanship";
$lang['Talenttrees']['Hunter']['Survival'] = "Survival";
$lang['Talenttrees']['Mage']['Arcane'] = "Arcane";
$lang['Talenttrees']['Mage']['Fire'] = "Fire";
$lang['Talenttrees']['Mage']['Frost'] = "Frost";
$lang['Talenttrees']['Paladin']['Holy'] = "Holy";
$lang['Talenttrees']['Paladin']['Protection'] = "Protection";
$lang['Talenttrees']['Paladin']['Retribution'] = "Retribution";
$lang['Talenttrees']['Priest']['Discipline'] = "Discipline";
$lang['Talenttrees']['Priest']['Holy'] = "Holy";
$lang['Talenttrees']['Priest']['Shadow'] = "Shadow";
$lang['Talenttrees']['Rogue']['Assassination'] = "Assassination";
$lang['Talenttrees']['Rogue']['Combat'] = "Combat";
$lang['Talenttrees']['Rogue']['Subtlety'] = "Subtlety";
$lang['Talenttrees']['Shaman']['Elemental'] = "Elemental";
$lang['Talenttrees']['Shaman']['Enhancement'] = "Enhancement";
$lang['Talenttrees']['Shaman']['Restoration'] = "Restoration";
$lang['Talenttrees']['Warlock']['Affliction'] = "Affliction";
$lang['Talenttrees']['Warlock']['Demonology'] = "Demonology";
$lang['Talenttrees']['Warlock']['Destruction'] = "Destruction";
$lang['Talenttrees']['Warrior']['Arms'] = "Arms";
$lang['Talenttrees']['Warrior']['Fury'] = "Fury";
$lang['Talenttrees']['Warrior']['Protection'] = "Protection";

$lang['misc']['Rank'] = "Rank";

$lang['guild_short'] = "Guild";
$lang['character_short'] = "Char";
$lang['skill_short'] = "Skill";
$lang['reputation_short'] = "Rep";
$lang['equipment_short'] = "Equip";
$lang['talents_short'] = "Talent";

$lang['started'] = "Started";
$lang['finished'] = "Finished";

$lang['armorySyncTitle_Char'] = "ArmorySync for Characters";
$lang['armorySyncTitle_Guild'] = "ArmorySync for Guilds";
$lang['armorySyncTitle_Guildmembers'] = "ArmorySync for Guild Member Lists";
$lang['armorySyncTitle_Realm'] = "ArmorySync for Realms";

$lang['next_to_update'] = "Next Update: ";
$lang['nothing_to_do'] = "Nothing to do at the moment";

$lang['error'] = "Error";
$lang['error_no_character'] = "No Character referred.";
$lang['error_no_guild'] = "No Guild referred.";
$lang['error_no_realm'] = "No Realm referred.";
$lang['error_use_menu'] = "Use menu to Synchronize.";

$lang['error_guild_insert'] = "Error creating guild.";
$lang['error_uploadrule_insert'] = "Error creating upload rule.";
$lang['error_guild_notexist'] = "The guild given does not exist in the Armory.";
$lang['error_missing_params'] = "Missing parameters. Plaese try again";
$lang['error_wrong_region'] = "Invalid region. Only EU and US are valid regions.";
$lang['armorysync_guildadd'] = "Adding Guild and Synchronize<br />memberlist with the Armory.";
$lang['armorysync_guildadd_help'] = "Information";
$lang['armorysync_guildadd_helpText'] = "Spell the guild and the server names exactly how they are listed on the Armory.<br />Region is EU for European and US for American/Oceanic.<br />First, armorysync will check if the guild exists in the Armory.<br />Next, a synchronization of the meberlist will be done.";

$lang['guildleader'] = "Guildleader";

$lang['rage'] = "Rage";
$lang['energy'] = "Energy";
$lang['focus'] = "Focus";

$lang['armorysync_credits'] = 'Thanks to <a target="_blank" href="http://www.papy-team.fr">tuigii</a>, <a target="_blank" href="http://xent.homeip.net">zanix</a>, <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=1126.html">ds</a> and <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=711.html">Subxero</a> for testing, translating and supporting.<br />Spezial thanks to <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=13101.html">kristoff22</a> for the original code of ArmorySync and <a target="_blank" href="http://www.iceguild.org.uk/forum">Pugro</a> for his changes to it.';

$lang['start'] = "Start";
$lang['start_message'] = "Your about to start ArmorySync for %s %s.<br /><br />By this all data for %s will be overwritten<br />with details from Blizzards Armory. This can only be undone<br />by uploading a current CharacterProfiler.lua.<br /><br />Do you want to start this process yet";

$lang['start_message_the_char'] = "the character";
$lang['start_message_this_char'] = "this character";
$lang['start_message_the_guild'] = "the guild";
$lang['start_message_this_guild'] = "all characters of this guild";
$lang['start_message_the_realm'] = "the realm";
$lang['start_message_this_realm'] = "all characters of this realm";

$lang['month_to_en'] = array(
    "January" => "January",
    "February" => "February",
    "March" => "March",
    "April" => "April",
    "May" => "May",
    "June" => "June",
    "July" => "July",
    "August" => "August",
    "September" => "September",
    "October" => "October",
    "November" => "November",
    "December" => "December"
);

$lang['roster_deprecated'] = "WoWRoster deprecated";
$lang['roster_deprecated_message'] = "<br />You are using <b>WoWRoster</b><br /><br />Version: <strong style=\"color:red;\" >%s</strong><br /><br />To use <b>ArmorySync</b> Version <strong style=\"color:yellow;\" >%s</strong><br />you will at least need <b>WoWRoster</b><br /><br />Version <strong style=\"color:green;\" >%s</strong><br /><br />Please update your <b>WoWRoster</b><br />&nbsp;";

$lang['armorysync_not_upgraded'] = "ArmorySync not upgraded";
$lang['armorysync_not_upgraded_message'] = "<br />You have installed <b>ArmorySync</b><br /><br />Version: <strong style=\"color:green;\" >%s</strong><br /><br />Right now there is <b>ArmorySync</b><br /><br />Version <strong style=\"color:red;\" >%s</strong><br /><br />registered with <b>WoWRoster</b>.<br /><br />Please go to <b>WoWRoster</b> configuration<br />and upgrade your <b>ArmorySync</b><br />&nbsp;";
