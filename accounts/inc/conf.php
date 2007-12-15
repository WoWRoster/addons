<?php
/** 
 * Dev.PKComp.net WoWRoster Addon
 * 
 * LICENSE: Licensed under the Creative Commons 
 *          "Attribution-NonCommercial-ShareAlike 2.5" license 
 * 
 * @copyright  2005-2007 Pretty Kitty Development 
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5" 
 * @link       http://dev.pkcomp.net 
 * @package    Accounts 
 * @subpackage Config File 
 */
if( !defined('IN_ROSTER') )
{
	exit('Detected invalid access to this file!');
}

define('utable',$roster->db->table('user', $addon['basename']));
define('linktable',$roster->db->table('user_link', $addon['basename']));
define('savelogin',$addon['config']['save_login']);
define('cookiename',$addon['config']['cookie_name']);
define('autoact',$addon['config']['auto_act']);
define('admincopy',$addon['config']['admin_copy']);
define('adminmail',$addon['config']['admin_mail']);
define('adminname',$addon['config']['admin_name']);
define('adminlevel',$addon['config']['admin_level']);
define('minaccess',$addon['config']['min_access']);
define('useperms',$addon['config']['use_perms']);
define('roster_locale',$roster->config['locale']);
 