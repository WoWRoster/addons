<?php

/**
 * WoWRoster.net EventCalendar
 *
 * Event Calendar is a Roster addon that will show upcoming events from ingame
 * WoW addons GuildEventManager (GEM) or GroupCalendar
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.3
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=59.html
 *
*/

$config['menu_name'] = 'Event Calendar';
$config['menu_min_user_level'] = 0;
$config['menu_index_file'] = array();

$config['menu_index_file'][0][0] = '';
$config['menu_index_file'][0][1] = $wordings[$roster_conf['roster_lang']]['EventCalendar'];

?>