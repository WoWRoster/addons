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

$config['menu_name'] = 'SortMember';
$config['menu_min_user_level'] = 0;
$config['menu_index_file'] = array();

$config['menu_index_file'][0][0] = '&amp;action=memberslist';
$config['menu_index_file'][0][1] = $wordings[$roster_conf['roster_lang']]['SortMember_Members'];

$config['menu_index_file'][1][0] = '&amp;action=statslist';
$config['menu_index_file'][1][1] = $wordings[$roster_conf['roster_lang']]['SortMember_Stats'];

?>
