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
 * @package    ArmorySync
*/

// -[ frFR Localization ]-
// Button names
$lang['async_button']= 'Armory Sync|Synchronise  vos personnages avec Blizzards Armory';
$lang['async_button2']= 'Armory Memberlist Sync|Synchronise  vos liste des membres avec Blizzards Armory';
$lang['async_button3']= 'Armory Memberlist Sync pour une nouvelle Guilde|Ajoute un nouvelle Guilde et synchronise<br>le avec la liste de ces membres chez Blizzards Armory';

// Config strings
$lang['admin']['armorysync_conf']= 'ArmorySync Configuration';
$lang['admin']['armorysync_host']= 'Host|Host to syncronise with.';
$lang['admin']['armorysync_minlevel']= 'Minimum Level|Minimum level pour la shynco des personnages.';
$lang['admin']['armorysync_synchcutofftime']= "Sync. temps de coupure|Le temps en jours.<br>Toutes personnages n étant pas mis à jour durant (x) jours seront synchronisé.";
$lang['admin']['armorysync_reloadwaittime']= "Temps de rechargement |Le temps en secondes.<br>Le temps avant une prochaine synchronisation sera effectuée.";
$lang['admin']['armorysync_fetch_timeout'] = "Armory chargement arrêt|Temps en secondes jusqu à ce un fichier XML sera avorté.";
$lang['admin']['armorysync_skip_start'] = "Saute page de démarrage|Saute la page de démarrage des ArmorySync chargements.";
$lang['admin']['armorysync_char_update_access'] = "Pers. niveau d'accès|Qui pourrait effectuer des chargements niveau personnage";
$lang['admin']['armorysync_guild_update_access'] = "Guild niveau d'accès|Qui pourrait effectuer des chargements niveau Guilde";
$lang['admin']['armorysync_guild_memberlist_update_access'] = "Guild Memberlist niveau d'accès|Qui pourrait effectuer des chargements niveau memberlist";
$lang['admin']['armorysync_realm_update_access'] ="Realm niveau d'accès|Qui pourrait effectuer des chargements niveau realm";
$lang['admin']['armorysync_guild_add_access'] = "Guild ajouter - niveau d'accès|Qui pourrait ajouter d'autres Guilds";
//$lang['admin']['armorysync_usecurl']		= 'Utilisation de Curl|A désactiver si la fonction FileSocket devrait être utilisée.';
//$lang['admin']['armorysync_debuglevel']		= 'Debug level';
//$lang['admin']['armorysync_updateroster']	= "A la mise à jour du Roster|Actualisation du Roster.<br>Utile pour le débogage.";
//$lang['admin']['armorysync_ismysqllower411']	= "MySQL < 4.1.1|A activer si votre version MySQL est plus bas que 4.1.1.";
$lang['admin']['armorysync_protectedtitle']	= "Guild titres protégé|Les personnages avec ce titre seront protégé<br>contre l'effacement de la Guilde pendant un synchronisation de la liste des membres auprès Armory de Blizzard.<br>Ce problème peut arriver avec des personnages 'banquiers'.<br>Plusieurs valeurs ont possible, avec la séparation \",\". i.e. Banquier,Stock";

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
$lang['Talenttrees']['Warlock']['Demonology'] = " Démonologie";
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

$lang['armorySyncTitle_Char'] = "ArmorySync pour Characters";
$lang['armorySyncTitle_Guild'] = "ArmorySync pour Guilds";
$lang['armorySyncTitle_Guildmembers'] = "ArmorySync pour Guildmemberlists";
$lang['armorySyncTitle_Realm'] = "ArmorySync pour Realms";

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
$lang['armorysync_guildadd'] = "Ajoute la Guild and synchronise<br>la liste des membres avec Armory.";
$lang['armorysync_guildadd_help'] = "Information";
$lang['armorysync_guildadd_helpText'] = "<br>Orthographier <b>la guilde</b> et <b>le serveur</b> <b>exactement</b> <br>comme ils sont connues chez Blizzards Armory. <br>Region est <b>EU</b> pour l'Europe et <b>US</b> pour des guildes Américaines.<br><br> En premier lieu la guilde sera examinée<br> pour assurer l'existence.<br><br> Après une synchronisation de la liste des membres commencera.<br><br>";

$lang['guildleader'] = "Maître de Guild";

$lang['rage'] = "Rage";
$lang['energy'] = "Énergie";
$lang['focus'] = "Focus";

$lang['armorysync_credits'] = 'Thanks to <a target="_blank" href="http://www.papy-team.fr">tuigii</a>, <a target="_blank" href="http://xent.homeip.net">zanix</a>, <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=1126.html">ds</a> and <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=711.html">Subxero</a> for testing, translating and supporting.<br>Spezial thanks to <a target="_blank" href="http://www.wowroster.net/Your_Account/profile=13101.html">kristoff22</a> for the original code of ArmorySync and <a target="_blank" href="http://www.iceguild.org.uk/forum">Pugro</a> for his changes to it.';

$lang['start'] = "Démarrage";
$lang['start_message'] = "Vous êtes prêt pour démarrer <b>ArmorySync</b> pour la Guilde %s %s.<br><br>Avec cette démarche, toutes les données de %s <br>seront remplacé(s) avec les détails de Blizzards Armory.<br>  Ceci pourrait être annulé après par le téléchargement d'un CharacterProfiler.lua <b>récent</b> de chaque membre.  <br>Voulez-vous démarrer la synchronisation ";

$lang['start_message_the_char'] = "le personnage";
$lang['start_message_this_char'] = "ce personnage";
$lang['start_message_the_guild'] = "la guilde";
$lang['start_message_this_guild'] = "toutes les personnages de cette guilde";
$lang['start_message_the_realm'] = "le realm";
$lang['start_message_this_realm'] = "toutes les personnages de ce realm";