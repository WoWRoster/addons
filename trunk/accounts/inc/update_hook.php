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
 * @subpackage Update Hook 
 */ 

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Accounts Update Hook
 *
 * @package    MembersList
 * @subpackage UpdateHook
 */
class accountsUpdate
{
	// Update messages
	var $messages = '';

	// Addon data object, recieved in constructor
	var $data;

	// LUA upload files accepted. We don't use any.
	var $files = array();

	// Character data cache
	var $chars = array();

	/**
	 * Constructor
	 *
	 * @param array $data
	 *		Addon data object
	 */
	function accountsUpdate($data)
	{
		$this->data = $data;
	}

	/**
	 * Resets addon messages
	 */
	function reset_messages()
	{
		/**
		 * We display the addon name at the beginning of the output line. If
		 * the hook doesn't exist on this side, nothing is output. If we don't
		 * produce any output (update method off) we empty this before returning.
		 */

		$this->messages = 'Accounts';
	}
	
	/**
	 * Char trigger: add the member record to the local data array
	 *
	 * @param array $char
	 *		CP.lua character data
	 * @param int $member_id
	 *		Member ID
	 */ 
	function char( $data , $member_id )
	{
		global $roster;
		
		$this->messages .= "<span class=\"yellow\">Getting Character Information...</span><br />\n";
		
		return true;
	}
	
	/**
	 * Char_post trigger
	 * @param array $chars
	 * Gets CP.lua characters data
	 */
	function char_post( $data )
	{
		global $roster;
 
		$this->messages .= "<span class=\"red\">Storing your characters to database</span><br />\n";
 
		return true;
	}
}
