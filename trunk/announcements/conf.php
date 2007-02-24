<?php
/******************************
 * $Id: conf.php,v 1.7.1 2006/10/23 17:00:00 Snykx $
 ******************************/

if ( !defined('ROSTER_INSTALLED') ) {
    exit('Detected invalid access to this file!');
}

//------[ Database table prefix ]------------
define('ANNOUNCE_TABLE',$db_prefix.'addon_announce');

$announce->filename = basename($_SERVER['PHP_SELF']).'?roster_addon_name=announcements';
$announce->incdir = ROSTER_BASE.'addons/announcements/';

# Create the title for the announcement page
$header_title = 'Announcements';

?>