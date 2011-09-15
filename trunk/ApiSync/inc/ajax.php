<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ApiSync ajax functions list
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @since      File available since Release 2.6.0
 * @package    ApiSync
 * @subpackage Ajax
*/

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$ajaxfuncs['status_update'] = array(
	'file'=>$addon['dir'] . 'ajax/ApiSync.php',
);
