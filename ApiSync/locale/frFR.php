<?php
/**
 * WoWRoster.net WoWRoster
 *
 * french localisaton
 * thx to tuigii@wowroster.net. visit his page at http://www.papy-team.fr
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

// -[ frFR Localization ]-
// Button names
$lang['async_button1']= 'ApiSync Character|Synchronise vos personnages avec Blizzards Armory';
$lang['async_button2']= 'ApiSync Characters|Synchronise vos personnages avec Blizzards Armory';
$lang['async_button3']= 'ApiSync Characters|Synchronise vos personnages avec Blizzards Armory';
$lang['async_button4']= 'ApiSync Memberlist|Synchronise vos liste des membres avec Blizzards Armory';
$lang['async_button5']= 'ApiSync Memberlist Guilde|Ajoute un nouvelle Guilde et synchronise le avec la liste de ces membres chez Blizzards Armory';

// Config strings
$lang['admin']['ApiSync_conf']			= 'General|Configure base settings for ApiSync';
$lang['admin']['ApiSync_ranks']			= 'Ranks|Configure guild ranks for ApiSync';
$lang['admin']['ApiSync_images']			= 'Images|Configure image displaying for ApiSync';
$lang['admin']['ApiSync_access']			= 'Access Rights|Configure access rights for ApiSync';
$lang['admin']['ApiSync_debug']			= 'Debugging|Configure debug settings for ApiSync';

$lang['admin']['ApiSync_host']= 'Host|Host to syncronise with.';
$lang['admin']['ApiSync_minlevel']= 'Minimum Level|Minimum level pour la shynco des personnages.';
$lang['admin']['ApiSync_synchcutofftime']= "Sync. temps de coupure|Le temps en jours.<br />Toutes personnages n étant pas mis à jour durant (x) jours seront synchronisé.";
$lang['admin']['ApiSync_use_ajax']	= 'Use AJAX|Wether to use AJAX for status update or not.';
$lang['admin']['ApiSync_reloadwaittime']= "Temps de rechargement |Le temps en secondes.<br />Le temps avant une prochaine synchronisation sera effectuée.";
$lang['admin']['ApiSync_fetch_timeout'] = "Armory chargement arrêt|Temps en secondes jusqu à ce un fichier XML sera avorté.";
$lang['admin']['ApiSync_skip_start'] = "Saute page de démarrage|Saute la page de démarrage des ApiSync chargements.";
$lang['admin']['ApiSync_status_hide'] = 'Hide status windows initialy|Hide the status windows of ApiSync on the first load.';
$lang['admin']['ApiSync_protectedtitle']	= "Guild titres protégé|Les personnages avec ce titre seront protégé<br />contre l'effacement de la Guilde pendant un synchronisation de la liste des membres auprès Armory de Blizzard.<br />Ce problème peut arriver avec des personnages 'banquiers'.<br />Plusieurs valeurs ont possible, avec la séparation \",\". i.e. Banquier,Stock";

$lang['admin']['ApiSync_rank_set_order']	= "Guild Rank Set Order|Defines in which order the guild titles will be set.";
$lang['admin']['ApiSync_rank_0']	= "Title Guild Leader|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_1']	= "Title Rank 1|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_2']	= "Title Rank 2|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_3']	= "Title Rank 3|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_4']	= "Title Rank 4|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_5']	= "Title Rank 5|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_6']	= "Title Rank 6|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_7']	= "Title Rank 7|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_8']	= "Title Rank 8|This title will be set if in WoWRoster for that guild non is defined.";
$lang['admin']['ApiSync_rank_9']	= "Title Rank 9|This title will be set if in WoWRoster for that guild non is defined.";

$lang['admin']['ApiSync_char_update_access'] = "Pers. niveau d'accès|Qui pourrait effectuer des chargements niveau personnage";
$lang['admin']['ApiSync_guild_update_access'] = "Guild niveau d'accès|Qui pourrait effectuer des chargements niveau Guilde";
$lang['admin']['ApiSync_guild_memberlist_update_access'] = "Guild Memberlist niveau d'accès|Qui pourrait effectuer des chargements niveau memberlist";
$lang['admin']['ApiSync_realm_update_access'] ="Realm niveau d'accès|Qui pourrait effectuer des chargements niveau realm";
$lang['admin']['ApiSync_guild_add_access'] = "Guild ajouter - niveau d'accès|Qui pourrait ajouter d'autres Guilds";

$lang['admin']['ApiSync_logo'] = 'ApiSync Logo|';
$lang['admin']['ApiSync_pic1'] = 'ApiSync Image 1|';
$lang['admin']['ApiSync_pic2'] = 'ApiSync Image 2|';
$lang['admin']['ApiSync_pic3'] = 'ApiSync Image 3|';
$lang['admin']['ApiSync_effects'] = 'ApiSync Image Effects|';
$lang['admin']['ApiSync_logo_show'] = 'Show Logo|';
$lang['admin']['ApiSync_pic1_show'] = $lang['admin']['ApiSync_pic2_show'] = $lang['admin']['ApiSync_pic3_show'] = 'Show Image|';
$lang['admin']['ApiSync_pic_effects'] = 'Activated|Use JavaScript effects for images.';
$lang['admin']['ApiSync_logo_pos_left'] = $lang['admin']['ApiSync_pic1_pos_left'] = $lang['admin']['ApiSync_pic2_pos_left'] = $lang['admin']['ApiSync_pic3_pos_left'] = 'Image position horizontal|';
$lang['admin']['ApiSync_logo_pos_top'] = $lang['admin']['ApiSync_pic1_pos_top'] = $lang['admin']['ApiSync_pic2_pos_top'] = $lang['admin']['ApiSync_pic3_pos_top'] = 'Image position vertikal|';
$lang['admin']['ApiSync_logo_size'] = $lang['admin']['ApiSync_pic1_size'] = $lang['admin']['ApiSync_pic2_size'] = $lang['admin']['ApiSync_pic3_size'] = 'Image size|';
$lang['admin']['ApiSync_pic1_min_rows'] = $lang['admin']['ApiSync_pic2_min_rows'] = $lang['admin']['ApiSync_pic3_min_rows'] = 'Minimun Rows|Minimum number of rows in the status display<br />to display the image.';

$lang['admin']['ApiSync_debuglevel']		= 'Debug Level|Adjust the debug level for ApiSync.<br /><br />Quiete - No Messages<br />Base Infos - Base messages<br />Armory & Job Method Infos - All messages of Armory and Job methods<br />All Methods Info - Messages of all Methods  <b style="color:red;">(Be careful - very much data)</b>';
$lang['admin']['ApiSync_debugdata']		= 'Debug Data|Raise debug output by methods arguments and returns<br /><b style="color:red;">(Be careful - much more infos on high debug level)</b>';
$lang['admin']['ApiSync_javadebug']		= 'Debug Java|Enable JavaScript debugging.<br />Not implemented yet.';
$lang['admin']['ApiSync_xdebug_php']		= 'XDebug Session PHP|Enable sending XDEBUG variable with POST.';
$lang['admin']['ApiSync_xdebug_ajax']	= 'XDebug Session AJAX|Enable sending XDEBUG variable  with Ajax POST.';
$lang['admin']['ApiSync_xdebug_idekey']	= 'XDebug Session IDEKEY|Define IDEKEY for Xdebug sessions.';
$lang['admin']['ApiSync_sqldebug']		= 'SQL Debug|Enable SQL debugging for ApiSync.<br />Not useful in combination with roster SQL debugging / duplicate data.';
$lang['admin']['ApiSync_updateroster']	= "Update Roster|Enable roster updates.<br />Good for debugging<br />Not implemented yet.";

$lang['bindings']['bind_on_pickup'] = "Lié quand ramassé"; //"Binds when picked up";
$lang['bindings']['bind_on_equip'] = "Lié quand équipé"; //"Binds when equiped";
$lang['bindings']['bind'] = "Lié"; // "Soulbound";

// Addon strings [done]
$lang['RepStanding']['Exalted'] = 'Exalté';
$lang['RepStanding']['Revered'] = 'Révéré';
$lang['RepStanding']['Honored'] = 'Honoré';
$lang['RepStanding']['Friendly'] = 'Amical';
$lang['RepStanding']['Neutral'] = 'Neutre';
$lang['RepStanding']['Unfriendly'] = 'Inamical';
$lang['RepStanding']['Hostile'] = 'Hostile';
$lang['RepStanding']['Hated'] = 'Détesté';

$lang['Skills']['Class Skills'] = "Compétences de classe";
$lang['Skills']['Professions'] = "Métiers";
$lang['Skills']['Secondary Skills'] = "Compétences secondaires";
$lang['Skills']['Weapon Skills'] = "Compétences d'armes";
$lang['Skills']['Armor Proficiencies'] = "Armures utilisables";
$lang['Skills']['Languages'] = "Langues";

$lang['Classes']['Druid'] = 'Druide';
$lang['Classes']['Hunter'] = 'Chasseur';
$lang['Classes']['Mage'] = 'Mage';
$lang['Classes']['Paladin'] = 'Paladin';
$lang['Classes']['Priest'] = 'Prêtre';
$lang['Classes']['Rogue'] = 'Voleur';
$lang['Classes']['Shaman'] = 'Chaman';
$lang['Classes']['Warlock'] = 'Démoniste';
$lang['Classes']['Warrior'] = 'Guerrier';

$lang['Talenttrees']['Druid']['Balance'] = "Equilibre";
$lang['Talenttrees']['Druid']['Feral Combat'] = "Combat farouche";
$lang['Talenttrees']['Druid']['Restoration'] = "Restauration";
$lang['Talenttrees']['Hunter']['Beast Mastery'] = "Maîtrise des bêtes";
$lang['Talenttrees']['Hunter']['Marksmanship'] = "Précision";
$lang['Talenttrees']['Hunter']['Survival'] = "Survie";
$lang['Talenttrees']['Mage']['Arcane'] = "Arcanes";
$lang['Talenttrees']['Mage']['Fire'] = "Feu";
$lang['Talenttrees']['Mage']['Frost'] = "Givre";
$lang['Talenttrees']['Paladin']['Holy'] = "Sacré";
$lang['Talenttrees']['Paladin']['Protection'] = "Protection";
$lang['Talenttrees']['Paladin']['Retribution'] = "Vindicte";
$lang['Talenttrees']['Priest']['Discipline'] = "Discipline";
$lang['Talenttrees']['Priest']['Holy'] = "Sacré";
$lang['Talenttrees']['Priest']['Shadow'] = "Ombre";
$lang['Talenttrees']['Rogue']['Assassination'] = "Assassinat";
$lang['Talenttrees']['Rogue']['Combat'] = "Combat";
$lang['Talenttrees']['Rogue']['Subtlety'] = "Finesse";
$lang['Talenttrees']['Shaman']['Elemental'] = "Élémentaire";
$lang['Talenttrees']['Shaman']['Enhancement'] = "Amélioration";
$lang['Talenttrees']['Shaman']['Restoration'] = "Restauration";
$lang['Talenttrees']['Warlock']['Affliction'] = "Affliction";
$lang['Talenttrees']['Warlock']['Demonology'] = "Démonologie";
$lang['Talenttrees']['Warlock']['Destruction'] = "Destruction";
$lang['Talenttrees']['Warrior']['Arms'] = "Armes";
$lang['Talenttrees']['Warrior']['Fury'] = "Fureur";
$lang['Talenttrees']['Warrior']['Protection'] = "Protection";

$lang['misc']['Rank'] = "Rang";

$lang['guild_short'] = "Guild";
$lang['character_short'] = "Char.";
$lang['skill_short'] = "Prof";
$lang['reputation_short'] = "Repu.";
$lang['equipment_short'] = "Equip";
$lang['talents_short'] = "Talent";

$lang['started'] = "Démarré";
$lang['finished'] = "Fini";

$lang['ApiSyncTitle_Char'] = "ApiSync pour Characters";
$lang['ApiSyncTitle_Guild'] = "ApiSync pour Guilds";
$lang['ApiSyncTitle_Guildmembers'] = "ApiSync pour Guildmemberlists";
$lang['ApiSyncTitle_Realm'] = "ApiSync pour Realms";

$lang['next_to_update'] = "Prochaine mise à jour : ";
$lang['nothing_to_do'] = "Rien à faire en ce moment";

$lang['error'] = "Erreur";
$lang['error_no_character'] = "Aucun personnage référé.";
$lang['error_no_guild'] = "Aucune Guild référé.";
$lang['error_no_realm'] = "Aucun Realm référé.";
$lang['error_use_menu'] = "Utilise Menu pour la synchronisation.";

$lang['error_guild_insert'] = "Erreur creation de la guilde.";
$lang['error_uploadrule_insert'] = "Error creating upload rule.";
$lang['error_guild_notexist'] = "La guilde donnée n'existe pas dans Armory.";
$lang['error_missing_params'] = "Paramètre(s) absent(s). Essaie encore une fois.";
$lang['error_wrong_region'] = "Region invalide. Seulement EU ou US sont des regions valable.";
$lang['ApiSync_guildadd'] = "Ajoute la Guild and synchronise<br />la liste des membres avec Armory.";
$lang['ApiSync_charadd'] = "Adding Charakter and synchronize<br />with the Armory.";
$lang['ApiSync_add_help'] = "Information";
$lang['ApiSync_add_helpText'] = "<br />Orthographier <b>la guilde</b> et <b>le serveur</b> <b>exactement</b> <br />comme ils sont connues chez Blizzards Armory. <br />Region est <b>EU</b> pour l'Europe et <b>US</b> pour des guildes Américaines.<br /><br /> En premier lieu la guilde sera examinée<br /> pour assurer l'existence.<br /><br /> Après une synchronisation de la liste des membres commencera.<br /><br />";

$lang['guildleader'] = "Maître de Guild";

$lang['rage'] = "Rage";
$lang['energy'] = "Énergie";
$lang['focus'] = "Focus";

$lang['ApiSync_credits'] = 'ApiSync Based off of armorysync built on blizzards API.';

$lang['start'] = "Démarrage";
$lang['start_message'] = "Vous êtes prêt pour démarrer <b>ApiSync</b> pour la Guilde %s %s.<br /><br />Avec cette démarche, toutes les données de %s <br />seront remplacé(s) avec les détails de Blizzards Armory.<br />  Ceci pourrait être annulé après par le téléchargement d'un CharacterProfiler.lua <b>récent</b> de chaque membre.  <br />Voulez-vous démarrer la synchronisation ";

$lang['start_message_the_char'] = "le personnage";
$lang['start_message_this_char'] = "ce personnage";
$lang['start_message_the_guild'] = "la guilde";
$lang['start_message_this_guild'] = "toutes les personnages de cette guilde";
$lang['start_message_the_realm'] = "le realm";
$lang['start_message_this_realm'] = "toutes les personnages de ce realm";

$lang['month_to_en'] = array(
    "janvier" => "January",
    "février" => "February",
    "mars" => "March",
    "avril" => "April",
    "mai" => "May",
    "juin" => "June",
    "juillet" => "July",
    "août" => "August",
    "septembre" => "September",
    "octobre" => "October",
    "novembre" => "November",
    "décembre" => "December"
);

$lang['roster_deprecated'] = "WoWRoster obsolète";
$lang['roster_deprecated_message'] = "<br />Vous utilisez <b>WoWRoster</b><br /><br />Version: <strong style=\"color:red;\" >%s</strong><br /><br />Pour utiliser <b>ApiSync</b> Version <strong style=\"color:yellow;\" >%s</strong><br />vous avez besoin au moins <b>WoWRoster</b><br /><br />Version <strong style=\"color:green;\" >%s</strong><br /><br />Veuillez mettre à jour <b>WoWRoster</b><br /> ";

$lang['ApiSync_not_upgraded'] = "ApiSync n'est pas été mise à jour";
$lang['ApiSync_not_upgraded_message'] = "<br />Vous avez actuèllement <b>ApiSync</b><br /><br />Version: <strong style=\"color:green;\" >%s</strong><br /><br />Maintenant on est à <b>ApiSync</b><br /><br />Version <strong style=\"color:red;\" >%s</strong><br /><br />enregistré avec <b>WoWRoster</b>.<br /><br />Veuillez aller à la <b>WoWRoster</b> configuration<br />et mettez à jour votre <b>ApiSync</b><br /> ";
