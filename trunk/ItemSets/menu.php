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

$config['menu_name'] = 'Item Sets';    //<- This is just a general name and can be called anything, as it is used in the array, I generally use the name of the addon.

$config['menu_min_user_level'] = 0;     //<- Do not change, its for a future use :)

$config['menu_index_file'] = array();   //<- Do not change, EVER

$config['menu_index_file'][0][0] = '';  // request query variables delimited by &amp;
$config['menu_index_file'][0][1] = $wordings[$roster_conf['roster_lang']]['ItemSets'];         // menu link text
?>