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
$lang['async_button2']			= 'ArmorySync Character|Synchronize your guild\'s characters with Blizzard\'s Armory';
$lang['async_button3']			= 'ArmorySync Character|Synchronize your realm\'s character with Blizzard\'s Armory';
$lang['async_button4']			= 'ArmorySync Memberlist|Synchronize your memberlist with Blizzard\'s Armory';
$lang['async_button5']			= 'ArmorySync Memberlist for a new guild|Add a new guild and synchronize<br />the memberlist with Blizzard\'s Armory';
$lang['async_button6']			= 'ArmorySync Guild Players|Synchronize your guild\'s Players <br />data with Blizzard\'s Armory';

// Config strings
$lang['admin']['armorysync_conf']			= 'General|Configure base settings for ArmorySync';
$lang['admin']['armorysync_ranks']			= 'Ranks|Configure guild ranks for ArmorySync';
$lang['admin']['armorysync_images']			= 'Images|Configure image displaying for ArmorySync';
$lang['admin']['armorysync_access']			= 'Access Rights|Configure access rights for ArmorySync';
$lang['admin']['armorysync_debug']			= 'Debugging|Configure debug settings for ArmorySync';

$lang['admin']['armorysync_host']			= 'Host|Host to Synchronize with';
$lang['admin']['armorysync_minlevel']		= 'Minimum Level|Minimum level of characters to synchronize<br />Currently this should be no lower than 10 since<br />the armory doesn\'t list characters lower than level 10';
$lang['admin']['armorysync_synchcutofftime']	= 'Sync cutoff time|Time in days<br />All characters not updated in last (x) days will be synchronized';
$lang['admin']['armorysync_use_ajax']	= 'Use AJAX|Whether to use AJAX for status update or not.';
$lang['admin']['armorysync_reloadwaittime']	= 'Reload wait time|Time in seconds<br />Time in seconds before next synchronization during a sync job 24+ recommended';
$lang['admin']['armorysync_fetch_timeout'] = 'Armory Fetch timeout|Time in seconds till a fetch of a single XML file is aborted.';
$lang['admin']['armorysync_skip_start'] = 'Skip start page|Skip start page on ArmorySync updates.';
$lang['admin']['armorysync_status_hide'] = 'Hide status windows initially|Hide the status windows of ArmorySync on the first load.';
$lang['admin']['armorysync_protectedtitle']	= 'Protected Guild Title|Characters with these guild titles are protected<br />from being deleted by a synchronization against the armory.<br />This problem often occours with bank characters.<br />Multiple values seperated by a comma (,) \"Banker,Stock\"';

$lang['admin']['armorysync_rank_set_order']	= "Guild Rank Set Order|Defines in which order the guild titles will be set.";
$lang['admin']['armorysync_rank_0']	= "Title Guild Leader|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_1']	= "Title Rank 1|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_2']	= "Title Rank 2|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_3']	= "Title Rank 3|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_4']	= "Title Rank 4|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_5']	= "Title Rank 5|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_6']	= "Title Rank 6|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_7']	= "Title Rank 7|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_8']	= "Title Rank 8|This title will be set if in WoWRoster for that guild none is defined.";
$lang['admin']['armorysync_rank_9']	= "Title Rank 9|This title will be set if in WoWRoster for that guild none is defined.";

$lang['admin']['armorysync_char_update_access'] = 'Char Update Access Level|Who is able to do character updates';
$lang['admin']['armorysync_guild_update_access'] = 'Guild Update Access Level|Who is able to do guild updates';
$lang['admin']['armorysync_guild_memberlist_update_access'] = 'Guild Memberlist Update Access Level|Who is able to do guild memberlist updates';
$lang['admin']['armorysync_realm_update_access'] = 'Realm Update Access Level|Who is able to do realm updates';
$lang['admin']['armorysync_guild_add_access'] = 'Guild Add Access Level|Who is able to add new guilds';

$lang['admin']['armorysync_logo'] = 'ArmorySync Logo|';
$lang['admin']['armorysync_pic1'] = 'ArmorySync Image 1|';
$lang['admin']['armorysync_pic2'] = 'ArmorySync Image 2|';
$lang['admin']['armorysync_pic3'] = 'ArmorySync Image 3|';
$lang['admin']['armorysync_effects'] = 'ArmorySync Image Effects|';
$lang['admin']['armorysync_logo_show'] = 'Show Logo|';
$lang['admin']['armorysync_pic1_show'] = $lang['admin']['armorysync_pic2_show'] = $lang['admin']['armorysync_pic3_show'] = 'Show Image|';
$lang['admin']['armorysync_pic_effects'] = 'Activated|Use JavaScript effects for images.';
$lang['admin']['armorysync_logo_pos_left'] = $lang['admin']['armorysync_pic1_pos_left'] = $lang['admin']['armorysync_pic2_pos_left'] = $lang['admin']['armorysync_pic3_pos_left'] = 'Image position horizontal|';
$lang['admin']['armorysync_logo_pos_top'] = $lang['admin']['armorysync_pic1_pos_top'] = $lang['admin']['armorysync_pic2_pos_top'] = $lang['admin']['armorysync_pic3_pos_top'] = 'Image position vertical|';
$lang['admin']['armorysync_logo_size'] = $lang['admin']['armorysync_pic1_size'] = $lang['admin']['armorysync_pic2_size'] = $lang['admin']['armorysync_pic3_size'] = 'Image size|';
$lang['admin']['armorysync_pic1_min_rows'] = $lang['admin']['armorysync_pic2_min_rows'] = $lang['admin']['armorysync_pic3_min_rows'] = 'Minimun Rows|Minimum number of rows in the status display<br />to display the image.';

$lang['admin']['armorysync_debuglevel']		= 'Debug Level|Adjust the debug level for ArmorySync.<br /><br />Quiete - No Messages<br />Base Info - Base messages<br />Armory & Job Method Info - All messages of Armory and Job methods<br />All Methods Info - Messages of all Methods  <b style="color:red;">(Be careful - very much data)</b>';
$lang['admin']['armorysync_debugdata']		= 'Debug Data|Raise debug output by methods arguments and returns<br /><b style="color:red;">(Be careful - much more info on high debug level)</b>';
$lang['admin']['armorysync_javadebug']		= 'Debug Java|Enable JavaScript debugging.<br />Not implemented yet.';
$lang['admin']['armorysync_xdebug_php']		= 'XDebug Session PHP|Enable sending XDEBUG variable with POST.';
$lang['admin']['armorysync_xdebug_ajax']	= 'XDebug Session AJAX|Enable sending XDEBUG variable with AJAX POST.';
$lang['admin']['armorysync_xdebug_idekey']	= 'XDebug Session IDEKEY|Define IDEKEY for Xdebug sessions.';
$lang['admin']['armorysync_sqldebug']		= 'SQL Debug|Enable SQL debugging for ArmorySync.<br />Not useful in combination with roster SQL debugging / duplicate data.';
$lang['admin']['armorysync_updateroster']	= "Update Roster|Enable roster updates.<br />Good for debugging<br />Not implemented yet.";


$lang['bindings']['bind_on_pickup'] = "Binds when picked up";
$lang['bindings']['bind_on_equip'] = "Binds when equipped";
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
$lang['Classes']['Death Knight'] = 'Death Knight';

$lang['Talenttrees']['Death Knight']['Blood'] = "Blood";
$lang['Talenttrees']['Death Knight']['Frost'] = "Frost";
$lang['Talenttrees']['Death Knight']['Unholy'] = "Unholy";
//$lang['Talenttrees']['DeathKnight']['Blood'] = "Blood";
//$lang['Talenttrees']['DeathKnight']['Frost'] = "Frost";
//$lang['Talenttrees']['DeathKnight']['Unholy'] = "Unholy";
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
$lang['error_missing_params'] = "Missing parameters. Please try again";
$lang['error_wrong_region'] = "Invalid region. Only EU and US are valid regions.";
$lang['armorysync_guildadd'] = "Adding Guild and synchronize<br />memberlist with the Armory.";
$lang['armorysync_charadd'] = "Adding Character and synchronize<br />with the Armory.";
$lang['armorysync_add_help'] = "Information";
$lang['armorysync_add_helpText'] = "Spell the character / guild and the server names exactly how they are listed on the Armory.<br />Region is EU for European and US for American/Oceanic.<br />First, ArmorySync will check if the guild exists in the Armory.<br />Next, a synchronization of the memberlist will be done.";

$lang['guildleader'] = "Guildleader";

$lang['rage'] = "Rage";
$lang['energy'] = "Energy";
$lang['focus'] = "Focus";

$lang['armorysync_credits'] = 'Thanks to <a target="_blank" href="http://www.papy-team.fr">tuigii</a>, <a target="_blank" href="http://xent.homeip.net">zanix</a>, <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=1126.html">ds</a> and <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=711.html">Subxero</a> for testing, translating and supporting.<br />Special thanks to <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=13101.html">kristoff22</a> for the original code of ArmorySync and <a target="_blank" href="http://www.iceguild.org.uk/forum">Pugro</a> for his changes to it.';

$lang['start'] = "Start";
$lang['start_message'] = "You're about to start ArmorySync for %s %s.<br /><br />By doing this, all data for %s will be overwritten<br />with details from Blizzard's Armory. This can only be undone<br />by uploading a current CharacterProfiler.lua.<br /><br />Do you want to start this process yet?";

$lang['start_message_the_char'] = "the character";
$lang['start_message_this_char'] = "this character";
$lang['start_message_the_guild'] = "the guild";
$lang['start_message_this_guild'] = "all characters of this guild";
$lang['start_message_the_realm'] = "the realm";
$lang['start_message_this_realm'] = "all characters of this realm";

$lang['id_to_faction'] = array(
    "0" => "Alliance",
    "1" => "Hord"
);

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
