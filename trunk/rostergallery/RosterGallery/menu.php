<?php
/******************************
 * $Id: menu.php,v 1.7.0 2006/06/14 07:16:03 Ulminia Exp $
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$config['menu_name'] = 'RosterGallery';    //<- This is just a general name and can be called anything, as it is used in the array, I generally use the name of the addon.

$config['menu_min_user_level'] = 0;     //<- Do not change, its for a future use :)

$config['menu_index_file'] = array();   //<- Do not change, EVER

//$config['menu_index_file'][0][0] = '&amp;display_text=1';                   //<- additional request query variables delimited by &amp; if needed
$config['menu_index_file'][0][1] = $wordings[$roster_conf['roster_lang']]['ss']['name'];   //<- menu link text, using the additional language settings in the addons localization.php file


//$config['menu_index_file'][1][0] = '&amp;display_text=1&amp;display_image=1';    //<- or leave blank if you dont need to call additional data
//$config['menu_index_file'][1][1] = $wordings[$roster_conf['roster_lang']]['dummyLink2'];

?>
