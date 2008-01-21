<?php 
/** 
 * Dev.PKComp.net Accounts Addon
 * 
 * LICENSE: Licensed under the Creative Commons 
 *          "Attribution-NonCommercial-ShareAlike 2.5" license 
 * 
 * @copyright  2005-2007 Pretty Kitty Development 
 * @author	   mdeshane
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5" 
 * @link       http://dev.pkcomp.net 
 * @package    Accounts 
 * @subpackage Index 
 */ 

if ( !defined('ROSTER_INSTALLED') ) 
{ 
    exit('Detected invalid access to this file!'); 
}

if( !isset($addon) || $addon != 'accounts')
{
	$addon = getaddon('accounts');
}
if( !isset($accounts) )
{
include_once ($addon['inc_dir'] . 'conf.php');
}


global $roster, $addon, $accounts;

// --[ Get path info based on scope ]--
if( !isset($roster->pages[2]) )
{
	$roster->pages[2] = 'main';
}

if($roster->pages[2] == '')
{
	// Send a 404. Then the browser knows what's going on as well.
	header('HTTP/1.0 404 Not Found');
	roster_die(sprintf($roster->locale->act['page_not_exist'],ROSTER_PAGE_NAME),$roster->locale->act['roster_error']);
}

$page = $roster->pages[2];

$accounts->page->getPage($page);
