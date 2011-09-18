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

define('APISYNC_STARTTIME', isset($_POST['APISYNC_STARTTIME']) ? $_POST['APISYNC_STARTTIME']: format_microtime());
define('APISYNC_CACHE', ROSTER_CACHEDIR );
define('APISYNC_VERSION','1.0');

define('APISYNC_REQUIRED_ROSTER_VERSION','2.1.9.2340');
