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
 * $Id: menu.php 18 2006-12-27 06:24:38Z zanix $
 *
 ******************************/

$config['menu_name'] = 'MadeBy';
$config['menu_min_user_level'] = 0;
$config['menu_index_file'] = array();

$config['menu_index_file'][0][0] = '&amp;action=view';
$config['menu_index_file'][0][1] = $wordings[$roster_conf['roster_lang']]['MadeBy'];
