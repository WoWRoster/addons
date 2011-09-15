<?php
/**
 * WoWRoster.net WoWRoster
 *
 * Contants and defines file for ApiSync
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
*/

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

define('ApiSync_STARTTIME', isset($_POST['ApiSync_STARTTIME']) ? $_POST['ApiSync_STARTTIME']: format_microtime());
define('ApiSync_CACHE', ROSTER_CACHEDIR );
define('ApiSync_VERSION','1.0');

define('ApiSync_REQUIRED_ROSTER_VERSION','2.1.9.2340');
