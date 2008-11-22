<?php
/** 
 * Dev.PKComp.net WoWRoster Addon
 * 
 * LICENSE: Licensed under the Creative Commons 
 *          "Attribution-NonCommercial-ShareAlike 2.5" license 
 * 
 * @copyright  2005-2007 Pretty Kitty Development 
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5" 
 * @link       http://dev.pkcomp.net 
 * @package    Accounts 
 * @subpackage Locale deDE
 */ 

// -[ deDE Localization ]- 

// Menu Panel
$lang['menupanel_acc_menu']		= 'Konto';

// Menu Buttons
$lang['acc_menu_index'] = 'Mein Konto|Zeigt Ihre Buchstaben, Z5ünfte und Reiche an.';
$lang['acc_menu_register'] = 'Register|Zeigt die Kontoausrichtungsseite an.';
$lang['acc_menu_chars'] = 'Meine Buchstaben|Zeigt Ihre Buchstaben an.';
$lang['acc_menu_guilds'] = 'Meine Z5ünfte|Zeigt Ihre Z5ünfte an.';
$lang['acc_menu_realms'] = 'Meine Reiche|Zeigt Ihre Reiche an.';
$lang['acc_menu_settings'] = 'Einstellungen|Zeigt die Benutzereinstellungen an.';

// Interface wordings
$lang['acc_int'] = array(
	'register' => 'Register',
	'no_register' => 'Nicht noch geregistriert?',
	'main_txt' => 'Willkommenes %s, sehen Sie z.Z. die Konten HauptPage.<br/>Please auserwählt von den Wahlen auf dem Recht an.',
	'uname' => 'Benutzername',
	'fname' => 'Vorname',
	'lname' => 'Nachname',
	'city' => 'Stadt',
	'country' => 'Land',
	'email' => 'E-Mail',
	'ugroup' => 'Benutzergruppe',
	'homepage' => 'Homepage',
	'date_joined' => 'Datum verbunden',
	'last_login' => 'Letzter LOGON',
	'is_online' => 'Benutzer ist %s',
	'group' => 'Gruppen-Kennwort',
	'my_prof' => 'Mein Profil',
	'prof_set' => 'Profil-Einstellungen',
	'char_set' => 'Buchstaben-Einstellungen',
	'login_txt' => 'Tragen Sie bitte Ihr username und Kennwort ein.',
	'no_login' => 'Sie müssen angemeldet werden, um diese Seite anzusehen.',
	'reg_txt' => 'Füllen Sie bitte die folgenden Felder aus (Felder mit * werden angefordert).',
	'act_pass' => 'Tragen Sie Ihr neues Kennwort hier ein,',
	'no_access' => 'Ihnen werden nicht erlaubt, diese Seite anzusehen!',
	'forgot' => 'Vergaß Ihr username/Kennwort?',
	'forgot_txt' => 'Tragen Sie bitte das email address ein, das Sie während der Ausrichtung verwendeten.',
	'remember' => 'Erinnern Sie sich an LOGON?',
	'login' => 'LOGON',
	'logged_out' => 'Sie sind erfolgreich heraus geloggt worden!',
	'click' => 'Klicken Sie hier.',
	'conf_mail' => 'Bestätigungs-eMail',
	'app_txt' => 'Füllen Sie bitte die folgenden Felder aus (Felder mit * werden angefordert).',
	'rec_txt' => 'Verstärkung ist',
);

// Page names
$lang['acc_page'] = array(
	'main' => 'Konten hauptsächlich',
	'info' => 'Benutzer-Info',
	'menu' => 'Benutzermenü',
	'profile' => "%s's Profil",
	'user_admin' => 'Benutzer Admin',
	'no_access' => 'Zugang verweigert!',
	'register' => 'Konto-Ausrichtung',
	'recruitment' => 'Benutzer-Verstärkung',
	'application' => 'Benutzer-Anwendung',
	'registration' => 'Benutzer-Ausrichtung',
	'user_act' => 'Benutzer-Aktivierung',
	'pass_act' => 'Kennwort-Aktivierung',
	'settings' => 'Meine Einstellungen',
	'realms' => 'Meine Reiche',
	'guilds' => 'Meine Z5ünfte',
	'chars' => 'Meine Buchstaben',
	'login' => 'Benutzer-LOGON',
);

// Config page names
$lang['admin']['acc_display']	= 'Konfiguration|Bauen Sie die Wahlen zusammen, die zu den Konten spezifisch sind.';
$lang['admin']['acc_perms']		= 'Seiten-Erlaubnis|Stellen Sie ein, das Gruppen ansehen können, das paginiert.';
$lang['admin']['acc_user']		= 'BenutzerConfig|Bauen Sie Ihr Konto zusammen.';
$lang['admin']['acc_plugin']	= 'Handhaben Sie Steckverbindungen|Bringen Sie Steckverbindungen an, um das Benutzersystem zu verlängern.';
$lang['admin']['acc_recruit']	= 'VerstärkungConfig|Bauen Sie Ihre Verstärkungeinstellungen zusammen.';
$lang['admin']['acc_register']	= 'AusrichtungConfig|Bauen Sie die Einstellungen für Benutzerausrichtung zusammen.';
$lang['admin']['acc_session']	= 'LernabschnittConfig|Bauen Sie die Einstellungen für Kontolernabschnitte zusammen.';

// Plugins Installer 
$lang['pagebar_plugininst']		= 'Handhaben Sie Steckverbindungen';
$lang['installer_plugininfo']	= 'Beschreibung';

// Settings on config config
$lang['admin']['acc_char_conf'] 	= 'BuchstabeConfig|Sollten Benutzer ihre Buchstabenbetrachtungswahlen zusammenbauen?';
$lang['admin']['acc_realm_conf']	= 'ReichConfig|Sollten Benutzer ihre Reichbetrachtungswahlen zusammenbauen?';
$lang['admin']['acc_guild_conf']  	= 'ZünftConfig|Sollten Benutzer ihre Zünftbetrachtungswahlen zusammenbauen?';
$lang['admin']['acc_save_login']  	= 'Außer LOGON|Benutzen Sie ein Plätzchen, um sich an den Klienten-LOGON zu erinnern?';
$lang['admin']['acc_cookie_name']	= 'Plätzchen-Name|Name für Ihre Lernabschnittplätzchen.';
$lang['admin']['acc_auto_act']  	= 'Selbstaktivierung|Sollten Benutzer automatisch aktiviert werden?';
$lang['admin']['acc_admin_copy']  	= 'Aktivierungs-Kopie|Sollte der admin eine Kopie der Aktivierungs-eMail empfangen?';
$lang['admin']['acc_admin_mail']  	= 'Admin-eMail|Betreten Sie bitte die Verwalter-eMail.';
$lang['admin']['acc_admin_name']  	= 'Admin-Name|Tragen Sie bitte den Verwalternamen ein.';
$lang['admin']['acc_pass_length']	= 'Kennwort-Länge|Tragen Sie bitte die minimale Länge für Benutzerkennwörter ein.';
$lang['admin']['acc_uname_length']	= 'Username-Länge|Tragen Sie bitte die minimale Länge für Benutzernamen ein.';

// Settings on perms config
$lang['admin']['acc_use_perms']		= 'Verwenden Sie Erlaubnis|Sollte Seitenerlaubnis verwendet werden?';
$lang['admin']['acc_min_access']	= 'Zugriffsebene|Minimales Niveau für Seitenzugang.';
$lang['admin']['acc_admin_level']	= 'Admin-Niveau|Das Niveau für Verwaltungszugang.';

// Settings on user config
$lang['admin']['acc_uname']			= 'Username|Redigieren Sie Ihr username.';
$lang['admin']['acc_fname']			= 'Vorname|Redigieren Sie Ihren Vornamen.';
$lang['admin']['acc_lname']			= 'Nachname|Redigieren Sie Ihre Nachname.';
$lang['admin']['acc_pass']			= 'Kennwort|Redigieren Sie Ihr Kennwort.';
$lang['admin']['acc_email']			= 'EMail|Redigieren Sie Ihr email address.';
$lang['admin']['acc_city']			= 'Stadt|Redigieren Sie Ihre Stadt.';
$lang['admin']['acc_country']		= 'Land|Redigieren Sie Ihr Land.';
$lang['admin']['acc_homepage']		= 'Homepage|Redigieren Sie das URL zu Ihrem homepage.';
$lang['admin']['acc_notes']			= 'Anmerkungen|Redigieren Sie Ihre Anmerkungen.';
$lang['admin']['acc_extra_info']	= 'Extrainfo|Addieren Sie jedes Extrainfo.';

//Settings on plugin config
$lang['admin']['acc_use_plugins']	= 'Benutzen Sie Steckverbindungen|Sollten Steckverbindungen benutzt werden?
';

//Settings on recruitment config
$lang['admin']['acc_use_recruit']	= 'Verwenden Sie Verstärkung|Sollte Verstärkung verwendet werden?';
$lang['admin']['acc_rec_status']	= 'Verstärkung-Status|Gegenwärtiger Status für Verstärkung.';
$lang['admin']['acc_rec_druid']		= 'Druide|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_hunter']	= 'Jäger|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_mage']		= 'Mage|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_paladin']	= 'Paladin|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_priest']	= 'Priester|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_rouge']		= 'Rouge|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_shaman']	= 'Shaman|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_warlock']	= 'Zauberer|Gegenwärtiges Verstärkungniveau.';
$lang['admin']['acc_rec_warrior']	= 'Krieger|Gegenwärtiges Verstärkungniveau.';

// Settings on registration config
$lang['admin']['acc_reg_text']		= 'Ausrichtungs-Text|Redigieren Sie den willkommenen Text auf Ausrichtung.';

// Settings on session config
$lang['admin']['acc_sess_time']		= 'Lernabschnitt-Zeit|Redigieren Sie die Zeitspanne, bevor ein Lernabschnitt beendet wird.';
?>