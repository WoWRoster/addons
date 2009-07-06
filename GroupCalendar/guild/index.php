<?php 

if ( !defined('IN_ROSTER') )
{
	exit('Detected invalid access to this file!');
}

global $roster, $addon;

if (isset($_GET['today'])){
      if ($_GET['today'] == 'web')
      {
    
            require 'today2.php'; 
      }
      else
      {
      
            require 'today.php';
      }
}
else
{
      require 'calendar.php'; 
}

