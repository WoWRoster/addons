<?php


if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$roster->output['html_head'] = '<script src="http://www.wowhead.com/widgets/power.js"></script>';
include( $addon['dir'] . 'inc/functions.php' );
//$roster->output['show_menu'] = false;
$prog = new prog;	
$bosscfg = $prog->getConfigDataboss($roster->db->table('boss',$addon['basename']));
      $instcfg = $prog->getConfigDatainst($roster->db->table('inst_table',$addon['basename']));
      echo '<pre>';
      print_r($instcfg);
      echo '</pre>';
      $lootcfg = $prog->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));
