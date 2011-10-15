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
 * @package    ApiSync
*/

// -[ deDE Localization ]-

// Button names
$lang['async_button1']			= 'ApiSync Charakter|Synchronisiere deinen Charaktere mit Blizzards Armory';
$lang['async_button2']			= 'ApiSync Charakters|Synchronisiere die Charaktere deiner Gilde mit Blizzards Armory';
$lang['async_button3']			= 'ApiSync Charakters|Synchronisiere die Charaktere deines Realms mit Blizzards Armory';
$lang['async_button4']			= 'ApiSync Memberlist|Synchronisiere deine Mitgliederliste mit Blizzards Armory';
$lang['async_button5']			= 'ApiSync Memberlist für eine neue Gilde|Füge eine neue Gilde ein und synchronisiere<br />die Mitgliederliste mit Blizzards Armory';
// Config strings
$lang['admin']['ApiSync_conf']			= 'Allgemein|Konfiguriere die Grundeinstellungen für ApiSync';
$lang['admin']['ApiSync_ranks']			= 'Ränge|Konfiguriere die Gildenränge für ApiSync';
$lang['admin']['ApiSync_images']			= 'Bilder|Konfiguriere die Anzeige von Bildern für ApiSync';
$lang['admin']['ApiSync_access']			= 'Zugriffsrechte|Konfiguriere die Zugriffsrechte für ApiSync';
$lang['admin']['ApiSync_debug']			= 'Debugging|Konfiguriere das Debugging für ApiSync';

$lang['admin']['ApiSync_host']			= 'Host|Host mit dem synchronisiert werden soll.';
$lang['admin']['ApiSync_minlevel']		= 'Minimum Level|Minimum Level der Charaktere die synchronisiert werden.';
$lang['admin']['ApiSync_synchcutofftime']	= 'Sync cutoff time|Zeit in Tagen.<br />Alle Charaktere die nicht in den letzten (x) Tagen aktualisiert wurden werden synchronisiert.';
$lang['admin']['ApiSync_use_ajax']	= 'Benutze AJAX|Benutze AJAX für Status Updates oder nicht.';
$lang['admin']['ApiSync_reloadwaittime']	= 'Reload wait time|Zeit in Sekunden.<br />Zeit in Sekunden bevor die nächste Synchronisierung angestossen wird.';
$lang['admin']['ApiSync_fetch_timeout'] = 'Armory Fetch timeout|Zeit in Sekunden bis das Herunterladen<br />einer einzelnen XML Datei abgebrochen wird.';
$lang['admin']['ApiSync_skip_start'] = 'Überspringe die Startseite|Überspringe die Startseite bei <b>ApiSync</b> updates.';
$lang['admin']['ApiSync_status_hide'] = 'Verstecke das Statusfenster initial|Versteckt das Status Fenster von <b>ApiSync</b> beim ersten Laden.';
$lang['admin']['ApiSync_protectedtitle']	= "Geschützer Gildentitel|Charaktere mit diesen Gildentiteln sind davor geschützt,<br />durch einen Abgleich der Mitgliederliste gegen die Armory gelöscht zu werden.<br />Dieses Problem besteht häufig mit Bank Charakteren.<br />Mehrfachnennung durch trennen mit \",\" möglich. Z.B. Banker,Lager";

$lang['admin']['ApiSync_rank_set_order']	= "Reihenfolge zum setzen der Gildenränge|Bestimmt in welcher Reihenfolge die Gildentitel gesetzt werden.";
$lang['admin']['ApiSync_rank_0']	= "Titel des Gilden Meisters|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_1']	= "Titel Rang 1|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_2']	= "Titel Rang 2|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_3']	= "Titel Rang 3|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_4']	= "Titel Rang 4|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_5']	= "Titel Rang 5|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_6']	= "Titel Rang 6|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_7']	= "Titel Rang 7|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_8']	= "Titel Rang 8|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";
$lang['admin']['ApiSync_rank_9']	= "Titel Rang 9|Dieser Titel wird gesetzt wenn im Roster für die Gilde kein Titel existiert.";

$lang['admin']['ApiSync_char_update_access'] = 'Char Update Access Level|Wer ist in der Lage Charakter zu aktualisieren';
$lang['admin']['ApiSync_guild_update_access'] = 'Guild Update Access Level|Wer ist in der Lage Gilden zu aktualisieren';
$lang['admin']['ApiSync_guild_memberlist_update_access'] = 'Guild Memberlist Update Access Level|Wer ist in der Lage Gilden Mitgliederlisten zu aktualisieren';
$lang['admin']['ApiSync_realm_update_access'] = 'Realm Update Access Level|Wer ist in der Lage Realms zu aktualisieren';
$lang['admin']['ApiSync_guild_add_access'] = 'Guild Add Access Level|Wer ist in der Lage neue Gilden einzufügen';

$lang['admin']['ApiSync_logo'] = 'ApiSync Logo|';
$lang['admin']['ApiSync_pic1'] = 'ApiSync Bild 1|';
$lang['admin']['ApiSync_pic2'] = 'ApiSync Bild 2|';
$lang['admin']['ApiSync_pic3'] = 'ApiSync Bild 3|';
$lang['admin']['ApiSync_effects'] = 'ApiSync Bild Effekte|';
$lang['admin']['ApiSync_logo_show'] = 'Logo anzeigen|';
$lang['admin']['ApiSync_pic1_show'] = $lang['admin']['ApiSync_pic2_show'] = $lang['admin']['ApiSync_pic3_show'] = 'Bild anzeigen|';
$lang['admin']['ApiSync_pic_effects'] = 'Aktiviert|Benutze JavaScript Effekte für Bilder.';
$lang['admin']['ApiSync_logo_pos_left'] = $lang['admin']['ApiSync_pic1_pos_left'] = $lang['admin']['ApiSync_pic2_pos_left'] = $lang['admin']['ApiSync_pic3_pos_left'] = 'Bild Position horizontal|';
$lang['admin']['ApiSync_logo_pos_top'] = $lang['admin']['ApiSync_pic1_pos_top'] = $lang['admin']['ApiSync_pic2_pos_top'] = $lang['admin']['ApiSync_pic3_pos_top'] = 'Bild Position vertikal|';
$lang['admin']['ApiSync_logo_size'] = $lang['admin']['ApiSync_pic1_size'] = $lang['admin']['ApiSync_pic2_size'] = $lang['admin']['ApiSync_pic3_size'] = 'Bild Größe|';
$lang['admin']['ApiSync_pic1_min_rows'] = $lang['admin']['ApiSync_pic2_min_rows'] = $lang['admin']['ApiSync_pic3_min_rows'] = 'Minimun Zeilen|Minimum Anzahl an Zeilen in der Statusanzeige<br />bei der das Bild angezeigt wird.';

$lang['admin']['ApiSync_debuglevel']		= 'Debug Level|Hiermit stellst du den Debuglevel für ApiSync ein.<br /><br />Quiete - Keine Meldungen<br />Base Infos - Grundlegende Meldungen<br />Armory & Job Method Infos - Alle Meldungen der Methoden der Armory und des Jobs<br />All Methods Info - Meldungen aller Methoden <b style="color:red;">(Vorsicht - sehr viele Infos)</b>';
$lang['admin']['ApiSync_debugdata']		= 'Debug Data|Hiermit erhöhst die gewählte Debug Ausgabe um die Argumente und Rückgabewerte der Methoden<br /><b style="color:red;">(Vorsicht - sehr viele Infos bei hohem Debuglevel)</b>';
$lang['admin']['ApiSync_javadebug']		= 'Debug Java|Hiermit stellst du ein dass JavaScript Debugmeldungen ausgibt.<br />Bis jetzt nicht implementiert.';
$lang['admin']['ApiSync_xdebug_php']		= 'XDebug Session PHP|Hiermit wird bei Reloads im POST die XDEBUG Variable gesetzt.';
$lang['admin']['ApiSync_xdebug_ajax']	= 'XDebug Session AJAX|Hiermit wird bei Reloads per AJAX im POST die XDEBUG Variable gesetzt.';
$lang['admin']['ApiSync_xdebug_idekey']	= 'XDebug Session IDEKEY|Hiermit wird der IDEKEY für Xdebug Session festgelegt.';
$lang['admin']['ApiSync_sqldebug']		= 'SQL Debug|Hiermit schaltest du das SQL Debugging für ApiSync ein.';
$lang['admin']['ApiSync_updateroster']	= "Update Roster|Das Roster aktualisieren oder nicht.<br />Sinnvoll fürs Debuggen.<br />Bis jetzt nicht implementiert.";


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

$lang['ApiSyncTitle_Char'] = "ApiSync für Charaktere";
$lang['ApiSyncTitle_Guild'] = "ApiSync für Gilden";
$lang['ApiSyncTitle_Guildmembers'] = "ApiSync für Mitgliederlisten";
$lang['ApiSyncTitle_Realm'] = "ApiSync für Realms";

$lang['next_to_update'] = "Nächstes Update: ";
$lang['nothing_to_do'] = "Im Moment ist nichts zu tun";

$lang['error'] = "Fehler";
$lang['error_no_character'] = "Es wurde kein Charakter übergeben.";
$lang['error_no_guild'] = "Es wurde keine Gilde übergeben.";
$lang['error_no_realm'] = "Es wurde kein Realm übergeben.";
$lang['error_use_menu'] = "Benutze das Menü zum synchronisieren.";

$lang['error_guild_insert'] = "Fehler beim Anlegen der Gilde.";
$lang['error_uploadrule_insert'] = "Fehler beim Anlegen der Upload Rule.";
$lang['error_guild_notexist'] = "Die angegebene Gilde existiert nicht in der Armory.";
$lang['error_missing_params'] = "Fehlende Angaben. Bitte versuch es erneut.";
$lang['error_wrong_region'] = "Ungültige Region. Nur EU und US sind gültige Regionen.";
$lang['ApiSync_guildadd'] = "Gilde hinzufügen und Mitgliederliste<br />mit der Armory synchronisieren.";
$lang['ApiSync_charadd'] = "Charakter hinzufügen und<br />mit der Armory synchronisieren.";
$lang['ApiSync_add_help'] = "Hinweis";
$lang['ApiSync_add_helpText'] = "Schreibe die Gilde / den Charakter und den Server exakt so wie sie, bzw. er,<br /> bei Blizzard geführt werden. Die Region ist EU für europäische Gilden<br />und US für amerikanische. Es wird zuerst überprüft ob der Charakter oder die Gilde<br />existiert. Anschließend wird eine Synchronisierung angestoßen.";

$lang['guildleader'] = "Gildenmeister";

$lang['rage'] = "Wut";
$lang['energy'] = "Energie";
$lang['focus'] = "Focus";

$lang['ApiSync_credits'] = 'ApiSync Based off of armorysync built on blizzards API.';

$lang['start'] = "Start";
$lang['start_message'] = "Du bist dabei <b>ApiSync</b> für %s <b style=\"color:yellow\"; >%s</b> auszuführen.<br /><br />Hierdurch werden die Daten für %s mit den Angaben<br />aus Blizzards Armory überschrieben. Dieser Vorgang kann nur rückgängig<br />gemacht werden, in dem eine <b style=\"color:red\"; >aktuelle</b> CharacterProfiler.lua<br />hochgeladen wird.<br /><br />Willst du diesen Vorgang jetzt starten";

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
$lang['roster_deprecated_message'] = "<br />Du benutzt <b>WoWRoster</b><br /><br />Version: <strong style=\"color:red;\" >%s</strong><br /><br />Um <b>ApiSync</b> Version <strong style=\"color:yellow;\" >%s</strong><br />benutzen zu können brauchst du mindestens <b>WoWRoster</b><br /><br />Version <strong style=\"color:green;\" >%s</strong><br /><br />Bitte aktualisiere dein <b>WoWRoster</b><br />&nbsp;";

$lang['ApiSync_not_upgraded'] = "<b>ApiSync</b> nicht aktualisiert";
$lang['ApiSync_not_upgraded_message'] = "<br />Du hast <b>ApiSync</b><br /><br />Version: <strong style=\"color:green;\" >%s</strong><br /><br />installiert. Zur Zeit ist noch <b>ApiSync</b><br /><br />Version <strong style=\"color:red;\" >%s</strong><br /><br />im <b>WoWRoster</b> registriert.<br /><br />Bitte gehe in die <b>WoWRoster</b> Konfiguration<br />und aktualisiere dein <b>ApiSync</b><br />&nbsp;";
