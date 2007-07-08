<?php

/**
 * WoWRoster.net DKPStats
 *
 * DKPStats is a Roster addon that will show dkp from your EQDKP site
 * within the roster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.0
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link        http://www.wowroster.net/Forums/viewforum/f=112.html
 * @since      01/11/2006
 *
*/

$config['menu_name'] = 'DKPStats';
$config['menu_min_user_level'] = 0;
$config['menu_index_file'] = array();

$config['menu_index_file'][0][0] = '';
$config['menu_index_file'][0][1] = $wordings[$roster_conf['roster_lang']]['DKPStats'];

?>