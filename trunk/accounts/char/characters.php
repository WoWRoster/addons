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
 * @subpackage Characters Page
 */

if( !defined('IN_ROSTER') )
{
	exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'] . 'user.lib.php');

$roster->output['show_menu'][] = 'account_menu';  // Display the button listing
