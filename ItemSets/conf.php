<?php

/**
 * WoWRoster.net ItemSets
 *
 * Itemsets is a Roster addon that shows a list of all your guildmates above lvl 50
 * and which setitems of their class-sets they have.
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2004-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.8.1
 * @svn        SVN: $Id$
 * @author     Gorgar, PoloDude, Zeryl
 * @link       http://www.wowroster.net/Forums/viewforum/f=35.html
 *
*/

if( eregi(basename(__FILE__),$_SERVER['PHP_SELF']) )
{
    die("You can't access this file directly!");
}

// Multilanguage support
	$addon_conf['ItemSets']['multilanguage'] = 0;
	
// Default tier (on of these: 'Tier_0','Tier_0.5','Tier_3.5','Tier_1','Tier_2','Tier_3','Tier_4','Tier_5','Arena_1','Arena_2','ZG','AQ20','AQ40','PVP_Rare','PVP_Epic')
	$addon_conf['ItemSets']['DefaultSet'] = 'Tier_4';

/****** DON'T CHANGE ANYTHING BELOW! ******/

//Version Check
	$addon_conf['ItemSets']['Version'] = '1.8.1';

?>