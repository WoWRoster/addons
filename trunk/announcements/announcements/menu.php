<?php
/******************************
 * $Id: menu.php,v 1.7.1 2006/08/23 17:00:00 zanix Exp $
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$config['menu_name'] = 'Announcements';

$config['menu_min_user_level'] = 0;

$config['menu_index_file'] = array();

$config['menu_index_file'][0][0] = '';
$config['menu_index_file'][0][1] = $wordings[$roster_conf['roster_lang']]['title'];

?>