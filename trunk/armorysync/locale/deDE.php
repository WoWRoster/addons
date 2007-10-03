<?php
/**
 * WoWRoster.net WoWRoster
 *
 * german localisaton
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

// -[ deDE Localization ]-

// Button names
$lang['async_button1']			= 'ArmorySync Charakter|Synchronisiere deinen Charactere mit Blizzards Armory';
$lang['async_button2']			= 'ArmorySync Charakters|Synchronisiere die Charactere deiner Gilde mit Blizzards Armory';
$lang['async_button3']			= 'ArmorySync Charakters|Synchronisiere die Charactere deines Realms mit Blizzards Armory';
$lang['async_button4']			= 'ArmorySync Memberlist|Synchronisiere deine Mitgliederliste mit Blizzards Armory';
$lang['async_button5']			= 'ArmorySync Memberlist für eine neue Gilde|Füge eine neue Gilde ein und syncronisiere<br />die Mitgliederliste mit Blizzards Armory';
// Config strings
$lang['admin']['armorysync_conf']			= 'ArmorySync Konfiguration';
$lang['admin']['armorysync_host']			= 'Host|Host mit dem syncronisiert werden soll.';
$lang['admin']['armorysync_minlevel']		= 'Minimum Level|Minimum level der Charactere die syncronisiert werden.';
$lang['admin']['armorysync_synchcutofftime']	= 'Sync cutoff time|Zeit in tagen.<br />Alle Charactere die nicht in den letzten (x) Tagen aktualisiert wurden werden syncronisiert.';
$lang['admin']['armorysync_use_ajax']	= 'Benutze AJAX|Benutze AJAX für Status Updates oder nicht.';
$lang['admin']['armorysync_reloadwaittime']	= 'Reload wait time|Zeit in Sekunden.<br />Zeit in Sekunden bevor die nächste Synchronisierung angestossen wird.';
$lang['admin']['armorysync_fetch_timeout'] = 'Armory Fetch timeout|Zeit in Sekunden bis das Herunterladen<br />einer einzelnen XML Datei abgebrochen wird.';
$lang['admin']['armorysync_skip_start'] = 'Skip start page|Skip start page on ArmorySync updates.';
$lang['admin']['armorysync_status_hide'] = 'Hide status windows initialy|Versteckt das Status Fenster von ArmorySync beim ersten Laden.';
$lang['admin']['armorysync_char_update_access'] = 'Char Update Access Level|Wer ist in der Lage Charakter zu aktualisieren';
$lang['admin']['armorysync_guild_update_access'] = 'Guild Update Access Level|Wer ist in der Lage Gilden zu aktualisieren';
$lang['admin']['armorysync_guild_memberlist_update_access'] = 'Guild Memberlist Update Access Level|Wer ist in der Lage Gilden Mitgliederlisten zu aktualisieren';
$lang['admin']['armorysync_realm_update_access'] = 'Realm Update Access Level|Wer ist in der Lage Realms zu aktualisieren';
$lang['admin']['armorysync_guild_add_access'] = 'Guild Add Access Level|Wer ist in der Lage neue Gilden einzufügen';

//$lang['admin']['armorysync_usecurl']		= 'Use Curl|Auf false setzen wenn du die original FileSocket function benutzen möchtest.';
//$lang['admin']['armorysync_debuglevel']		= 'Debug level';
//$lang['admin']['armorysync_updateroster']	= "Update Roster|Das Roster aktualisieren oder nicht.<br />Sinnvoll fürs Debuggen.";
//$lang['admin']['armorysync_ismysqllower411']	= "MySQL < 4.1.1|Auf True setzen wenn deine MySQL Version kleiner als 4.1.1 ist.";
$lang['admin']['armorysync_protectedtitle']	= "Geschützer Gildentitel|Charaktere mit diesen Gildentiteln sind davor geschützt,<br />durch einen Abgleich der Mitgliederliste gegen die Armory gelöscht zu werden.<br />Dieses Problem besteht häufig mit Bank Charakteren.<br />Mehrfachnennung durch trennen mit \",\" möglich. Z.B. Banker,Lager";


$lang['bindings']['bind_on_pickup'] = "Wird beim Aufheben gebunden";
$lang['bindings']['bind_on_equip'] = "Wird beim Anlegen gebunden";
$lang['bindings']['bind'] = "Seelengebunden";

// Addon strings
$lang['RepStanding']['Exalted'] = 'Ehrfürchtig';
$lang['RepStanding']['Revered'] = 'Respektvoll';
$lang['RepStanding']['Honored'] = 'Wohlwollend';
$lang['RepStanding']['Friendly'] = 'Freundlich';
$lang['RepStanding']['Neutral'] = 'Neutral';
$lang['RepStanding']['Unfriendly'] = 'Unfreundlich';
$lang['RepStanding']['Hostile'] = 'Verfeindet';
$lang['RepStanding']['Hated'] = 'Hasserfüllt';

$lang['Skills']['Class Skills'] = "Klassenfertigkeiten";
$lang['Skills']['Professions'] = "Berufe";
$lang['Skills']['Secondary Skills'] = "Sekundäre Fertigkeiten";
$lang['Skills']['Weapon Skills'] = "Waffenfertigkeiten";
$lang['Skills']['Armor Proficiencies'] = "Rüstungssachverstand";
$lang['Skills']['Languages'] = "Sprachen";


$lang['Classes']['Druid'] = 'Druide';
$lang['Classes']['Hunter'] = 'Jäger';
$lang['Classes']['Mage'] = 'Magier';
$lang['Classes']['Paladin'] = 'Paladin';
$lang['Classes']['Priest'] = 'Priester';
$lang['Classes']['Rogue'] = 'Schurke';
$lang['Classes']['Shaman'] = 'Schamane';
$lang['Classes']['Warlock'] = 'Hexenmeister';
$lang['Classes']['Warrior'] = 'Krieger';

$lang['Talenttrees']['Druid']['Balance'] = "Gleichgewicht";
$lang['Talenttrees']['Druid']['Feral Combat'] = "Wilder Kampf";
$lang['Talenttrees']['Druid']['Restoration'] = "Wiederherstellung";
$lang['Talenttrees']['Hunter']['Beast Mastery'] = "Tierherrschaft";
$lang['Talenttrees']['Hunter']['Marksmanship'] = "Treffsicherheit";
$lang['Talenttrees']['Hunter']['Survival'] = "Überleben";
$lang['Talenttrees']['Mage']['Arcane'] = "Arkan";
$lang['Talenttrees']['Mage']['Fire'] = "Feuer";
$lang['Talenttrees']['Mage']['Frost'] = "Frost";
$lang['Talenttrees']['Paladin']['Holy'] = "Heilig";
$lang['Talenttrees']['Paladin']['Protection'] = "Schutz";
$lang['Talenttrees']['Paladin']['Retribution'] = "Vergeltung";
$lang['Talenttrees']['Priest']['Discipline'] = "Disziplin";
$lang['Talenttrees']['Priest']['Holy'] = "Heilig";
$lang['Talenttrees']['Priest']['Shadow'] = "Schatten";
$lang['Talenttrees']['Rogue']['Assassination'] = "Meucheln";
$lang['Talenttrees']['Rogue']['Combat'] = "Kampf";
$lang['Talenttrees']['Rogue']['Subtlety'] = "Täuschung";
$lang['Talenttrees']['Shaman']['Elemental'] = "Elementar";
$lang['Talenttrees']['Shaman']['Enhancement'] = "Verstärkung";
$lang['Talenttrees']['Shaman']['Restoration'] = "Wiederherstellung";
$lang['Talenttrees']['Warlock']['Affliction'] = "Gebrechen";
$lang['Talenttrees']['Warlock']['Demonology'] = "Dämonologie";
$lang['Talenttrees']['Warlock']['Destruction'] = "Zerstörung";
$lang['Talenttrees']['Warrior']['Arms'] = "Waffen";
$lang['Talenttrees']['Warrior']['Fury'] = "Furor";
$lang['Talenttrees']['Warrior']['Protection'] = "Schutz";

$lang['misc']['Rank'] = "Rang";

$lang['guild_short'] = "Gilde";
$lang['character_short'] = "Char.";
$lang['skill_short'] = "Fertigk.";
$lang['reputation_short'] = "Ruf";
$lang['equipment_short'] = "Ausrü.";
$lang['talents_short'] = "Talente";

$lang['started'] = "begonnen";
$lang['finished'] = "beendet";

$lang['armorySyncTitle_Char'] = "ArmorySync für Charaktere";
$lang['armorySyncTitle_Guild'] = "ArmorySync für Gilden";
$lang['armorySyncTitle_Guildmembers'] = "ArmorySync für Mitgliederlisten";
$lang['armorySyncTitle_Realm'] = "ArmorySync für Realms";

$lang['next_to_update'] = "Nächstes Update: ";
$lang['nothing_to_do'] = "Im Moment ist nichts zu tun";

$lang['error'] = "Fehler";
$lang['error_no_character'] = "Es wurde kein Charakter übergeben.";
$lang['error_no_guild'] = "Es wurde keine Gilde übergeben.";
$lang['error_no_realm'] = "Es wurde kein Realm übergeben.";
$lang['error_use_menu'] = "Benutze das Menü zum syncronisieren.";

$lang['error_guild_insert'] = "Fehler beim anlegen der Gilde.";
$lang['error_uploadrule_insert'] = "Fehler beim anlegen der Upload Rule.";
$lang['error_guild_notexist'] = "Die angegebene Gilde existiert nicht in der Armory.";
$lang['error_missing_params'] = "Fehlende Angaben. Bitte versuch es erneut.";
$lang['error_wrong_region'] = "Ungültige Region. Nur EU und US sind gültige Regionen.";
$lang['armorysync_guildadd'] = "Gilde hinzufügen und Mitgliederliste<br />mit der Armory synchronisieren.";
$lang['armorysync_guildadd_help'] = "Hinweis";
$lang['armorysync_guildadd_helpText'] = "Schreibe die Gilde und den Server exakt so wie sie, bzw. er, bei Blizzard geführt werden.<br />Die Region ist EU für europäische Gilden und US für amerikanische. Es wird zuerst<br />überprüft ob die Gilde existiert. Anschließend wird eine Synchronisierung der<br />Mitgliederliste angestoßen.";

$lang['guildleader'] = "Gildenmeister";

$lang['rage'] = "Wut";
$lang['energy'] = "Energie";
$lang['focus'] = "Focus";

$lang['armorysync_credits'] = 'Danke an <a target="_blank" href="http://www.papy-team.fr">tuigii</a>, <a target="_blank" href="http://xent.homeip.net">zanix</a>, <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=1126.html">ds</a> und <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=711.html">Subxero</a> fürs Testen, Übersetzen und Unterstützen.<br />Besonderen Dank an <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=13101.html">kristoff22</a> für den originalen Code von ArmorySync und <a target="_blank" href="http://www.iceguild.org.uk/forum">Pugro</a> für seine Änderungen daran.';

$lang['start'] = "Start";
$lang['start_message'] = "Du bist dabei ArmorySync für %s %s auszuführen.<br /><br />Hierdurch werden die Daten für %s mit den Angaben<br />aus Blizzards Armory überschrieben. Dieser Vorgang kann nur rückgängig<br />gemacht werden, in dem eine aktuelle CharacterProfiler.lua<br />hochgeladen wird.<br /><br />Willst du diesen Vorgang jetzt starten";

$lang['start_message_the_char'] = "den Charakter";
$lang['start_message_this_char'] = "diesen Charakter";
$lang['start_message_the_guild'] = "die Gilde";
$lang['start_message_this_guild'] = "alle Charaktere dieser Gilde";
$lang['start_message_the_realm'] = "den Realm";
$lang['start_message_this_realm'] = "alle Charaktere dieses Realms";

$lang['month_to_en'] = array(
    "Januar" => "January",
    "Februar" => "February",
    "März" => "March",
    "April" => "April",
    "Mai" => "May",
    "Juni" => "June",
    "Juli" => "July",
    "August" => "August",
    "September" => "September",
    "Oktober" => "October",
    "November" => "November",
    "Dezember" => "December"
);

$lang['roster_deprecated'] = "WoWRoster veraltet";
$lang['roster_deprecated_message'] = "<br />Du benutzt <b>WoWRoster</b><br /><br />Version: <strong style=\"color:red;\" >%s</strong><br /><br />Um <b>ArmorySync</b> Version <strong style=\"color:yellow;\" >%s</strong><br />benutzen zu können brauchst du mindestens <b>WoWRoster</b><br /><br />Version <strong style=\"color:green;\" >%s</strong><br /><br />Bitte aktualisiere dein <b>WoWRoster</b><br />&nbsp;";

$lang['armorysync_not_upgraded'] = "ArmorySync nicht aktualisiert";
$lang['armorysync_not_upgraded_message'] = "<br />Du hast <b>ArmorySync</b><br /><br />Version: <strong style=\"color:green;\" >%s</strong><br /><br />installiert. Zur Zeit ist noch <b>ArmorySync</b><br /><br />Version <strong style=\"color:red;\" >%s</strong><br /><br />im <b>WoWRoster</b> registriert.<br /><br />Bitte gehe in die <b>WoWRoster</b> Konfiguration<br />und aktualisiere dein <b>ArmorySync</b><br />&nbsp;";
