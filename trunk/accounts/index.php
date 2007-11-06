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
 * @subpackage Index
 */

if( !defined('IN_ROSTER') )
{
	exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'] . 'user.lib.php');

$index_page = new accountUser;

if ($index_page->usePerms == 1)
{
	$index_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $index_page->minAccess); // check page permissions
}

$roster->output['show_menu'][] = 'account_menu';  // Display the button listing

// Start output
echo "<br />\n" . border('sblue','start', $roster->locale->act['account_main_page']) . "\n";
echo "<br />";
echo "User:" . $_SESSION['user'] . "<br />";
echo "First Name:" . $_SESSION['userFName'] . "<br />";
echo "Last Name:" . $index_page->userLName . "<br />";
echo "User Group:" . $_SESSION['groupID'] . "<br />";
echo "User E-Mail:" . $index_page->userEMail . "<br />";
echo border('sblue','end');
