<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/


/**
 * Default raid times.
 */
$GLOBALS['rtimport_startTime'] = '21:00'; // Default raid start time
$GLOBALS['rtimport_endTime']   = '00:00'; // Default raid end time

/**
 * Loot settings.
 * qualityThreshold : Minimum quality : 1 - Common, 2 - Uncommon, 3 - Rare, 4 - Epic, 5 - Legendary
 * forceItems       : Array of items to add regardless of quality.
 * ignoreItems      : Array of items to ignore regardless of quality.
 * ignoreLooter     : Array of members whose loot to ignore.
 * DBItemValues     : Whether or not to try and fetch loot values from the current database.
 */

$GLOBALS['rtimport_qualityThreshold'] = 2;
$GLOBALS['rtimport_forceItems'] = array("onyxia hide backpack");
$GLOBALS['rtimport_ignoreItems'] = array();
$GLOBALS['rtimport_ignoreLooter'] = array();
//$GLOBALS['rtimport_DBItemValues'] = true;

/**
 * Default rank id for newly added members.
 * May be the rank_id from the database or the name of the rank.
 */

$GLOBALS['rtimport_defaultRank'] = 'XGuild';

/**
 * Define the raids to be added. Comment out the lines of the raids not to be used.
 * When ['bosses']['default'] is defined all bosses will get their own raid for that amount.
 * When ['bosses']['<bossname>'] is defined a raid for this boss will be added for that amount (overriding the default)
 * When no default boss bonus is defined but a separate boss is, only that boss will get a separate raid entry. The others will not.
 * Note that you may set the value to 0.00 if you only wish to list them but not award any dkp for them.
 *
 * Boss names are in lowercase, don't change the capitals in onTime, endOfRaid, and raidThreshold
 *
 */

//$GLOBALS['rtimport_raids']['onTime']                                = 5.0;  // On Time bonus (all players who were present before raid start.
//$GLOBALS['rtimport_raids']['endOfRaid']                             = 5.0;  // End of raid bonus (all players who were present at end of raid.
//$GLOBALS['rtimport_raids']['hour']                                  = 2.0;  // Bonus per hour.

$GLOBALS['rtimport_raids']['raid']                                  = 2.0;  // Attendency bonus for players present longer than raidThreshold.
$GLOBALS['rtimport_raids']['raidThreshold']                         = 30;   // Percentage of time being in the raid to be elegible for the raid bonus.


/**
 * DKP values for bosses.
 * Uncommenting any of these will give that boss it's own raid. Add a line for each boss.
 */

/** Default boss raid. All bosses not configured below will get their own raid with this value. */
$GLOBALS['rtimport_raids']['bosses']['default']                     = 1.0;

/** UBRS **/

/** LBRS **/

/** Zul'Gurrub **/


/** Ruins of Ahn'Qiraj */


/** Onyxia */
$GLOBALS['rtimport_raids']['bosses']['onyxia']                      = 5.0;

/** Molten Core */
$GLOBALS['rtimport_raids']['bosses']['lucifron']                    = 5.0;
$GLOBALS['rtimport_raids']['bosses']['magmadar']                    = 5.0;
$GLOBALS['rtimport_raids']['bosses']['gehennas']                    = 5.0;
$GLOBALS['rtimport_raids']['bosses']['baron geddon']                = 5.0;
$GLOBALS['rtimport_raids']['bosses']['shazzrah']                    = 5.0;
$GLOBALS['rtimport_raids']['bosses']['sulfuron harbinger']          = 5.0;
$GLOBALS['rtimport_raids']['bosses']['golemagg the incinerator']    = 5.0;
$GLOBALS['rtimport_raids']['bosses']['majordomo executus']          = 5.0;
$GLOBALS['rtimport_raids']['bosses']['ragnaros']                    = 5.0;

/** Blackwing Lair */
$GLOBALS['rtimport_raids']['bosses']['razorgore the untamed']       = 5.0;
$GLOBALS['rtimport_raids']['bosses']['vaelastrasz the corrupt']     = 5.0;
$GLOBALS['rtimport_raids']['bosses']['broodlord lashlayer']         = 5.0;
$GLOBALS['rtimport_raids']['bosses']['firemaw']                     = 5.0;
$GLOBALS['rtimport_raids']['bosses']['ebonroc']                     = 5.0;
$GLOBALS['rtimport_raids']['bosses']['flamegor']                    = 5.0;
$GLOBALS['rtimport_raids']['bosses']['chromaggus']                  = 5.0;
$GLOBALS['rtimport_raids']['bosses']['nefarian']                    = 5.0;

/** Temple of Ahn'Qiraj */
$GLOBALS['rtimport_raids']['bosses']['the prophet skeram']          = 5.0;
$GLOBALS['rtimport_raids']['bosses']['vem']                         = 5.0;
$GLOBALS['rtimport_raids']['bosses']['yauj']                        = 5.0;
$GLOBALS['rtimport_raids']['bosses']['kri']                         = 5.0;
$GLOBALS['rtimport_raids']['bosses']['battleguard sartura']         = 5.0;
$GLOBALS['rtimport_raids']['bosses']['fankriss the unyielding']     = 5.0;
$GLOBALS['rtimport_raids']['bosses']['viscidus']                    = 5.0;
$GLOBALS['rtimport_raids']['bosses']['princess huhuran']            = 5.0;
$GLOBALS['rtimport_raids']['bosses']['emperor vek\'lor']            = 5.0;
$GLOBALS['rtimport_raids']['bosses']['emperor vek\'nilash']         = 5.0;
$GLOBALS['rtimport_raids']['bosses']['ouro the sandworm']           = 5.0;
$GLOBALS['rtimport_raids']['bosses']['c\'thun']                     = 5.0;


/**
 * For players wich are requested to bring in alts etc. you can use below array to map their alts to
 * their main characters for DKP allocation. All names in lowercase.
 */

 $GLOBALS['rtimport_playerAliasses'] = array (
    /* 'playerAlias' => 'playerName', */
 );


 /****************************************************************************************************
  * Do not change anything below here.
  ****************************************************************************************************/

define('EQDKP_INC', true);
define('IN_ADMIN', true);
define('PLUGIN', 'rtimport');
$eqdkp_root_path = './../../';
include_once($eqdkp_root_path . 'common.php');

?>
