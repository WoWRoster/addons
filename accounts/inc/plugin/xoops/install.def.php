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
 * @subpackage Xoops Plugin 
 */

if ( !defined('ROSTER_INSTALLED') ) 
{ 
    exit('Detected invalid access to this file!'); 
} 

/** 
 * Installer for Accounts Addon 
 * @package    Accounts 
 * @subpackage Installer 
 */ 
class xoopsInstall 
{ 
    var $active = true; 
    var $icon = 'inv_misc_groupneedmore'; 

    var $version = '1.9.9.90'; 
	var $wrnet_id = '0';

    var $fullname = 'Xoops Plugin'; 
    var $description = 'Adds user database structure to Accounts.'; 
    var $credits = array( 
		array('name'=>    'mdeshane', 
        	'info'=>    'Original Author')
    ); 


    /** 
    * Install Function 
    * 
    * @return bool 
    */ 
    function install() 
    { 
        global $installer; 

        return true; 
    } 

    /** 
    * Upgrade Function 
    * 
    * @param string $oldversion 
    * @return bool 
    */ 
    function upgrade($oldversion) 
    {         
		// Nothing to upgrade from yet 
        global $installer;

		return false; 
    } 

    /** 
    * Un-Install Function 
    * 
    * @return bool 
    */ 
    function uninstall() 
    { 
        global $installer, $roster; 

        return true; 
    } 
} 