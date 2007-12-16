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
 * @subpackage Login Handler
 */
 if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$addon = getaddon('accounts');
include_once ('user.lib.php');
$accounts = new accountUser;

class RosterLogin
{
	var $allow_login;
	var $message;
	var $script_filename;
	var $levels = array();

	/**
	 * Constructor for Roster Login class
	 * Accepts an action for the form
	 * And an array of additional fields
	 *
	 * @param string $script_filename
	 * @param array $fields
	 * @return RosterLogin
	 */
	function RosterLogin($script_filename = '')
	{
		global $roster, $addon, $accounts;
		
		$this->script_filename = makelink($script_filename);
		
		if( isset( $_POST['logout'] ) && $_POST['logout'] == '1' )
		{
			
			$accounts->logOut();
		}
		elseif( isset($_SESSION['user']) && isset($_SESSION['isLoggedIn']))
		{
			$this->getAuthorized();
		}
    	elseif( isset($_GET['act_key']) && isset($_GET['uid']))
		{ // these two variables are required for activating/updating the account/password
	    	$accounts->activateAccount($_GET['act_key'], $_GET['uid']); // the activation method 
    	}
    	elseif( isset($_GET['validate']) && isset($_GET['uid']))
		{ // these two variables are required for activating/updating the new e-mail address
	    	$accounts->validateEMail($_GET['validate'], $_GET['uid']); // the validation method 
    	}

		$accounts->loginReader();

    	if (isset($_POST['Submit']))
		{
	    	$accounts->saveLogin = (isset($_POST['remember'])) ? $_POST['remember'] : 'no'; // use a cookie to remember the login
	    	$accounts->countVisit = true; // if this is true then the last visitdate is saved in the database
	    	$accounts->loginUser($_POST['user'], $_POST['userPass']); // call the login method
    	}

	}

	function getAuthorized()
	{
		if( isset($_SESSION['groupID']) && isset($_SESSION['isLoggedIn']))
		{
			$this->allow_login = $_SESSION['groupID'];
		}
		else
		{
			$this->allow_login = 0;
		}
		
		return $this->allow_login;
	}

	function getMessage()
	{
		global $roster, $addon, $accounts;
		
		return $accounts->message;
	}

	function getLoginForm()
	{
		global $roster, $addon, $accounts;

		//$addon = getaddon('accounts');
		//include_once ('user.lib.php');
		//$accounts = new accountUser;
		
		$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing
	 
    	$error = $this->message;
	
		$roster->tpl->assign_block_vars('accounts_login', array(
			'BORDER_START' => border('sred','start', $roster->locale->act['auth_req']),
			'LOGIN_TXT' => $roster->locale->act['account_login_txt'],
			'FORM_LINK' => $this->script_filename,
			'UNAME_TXT' => $roster->locale->act['account_uname'],
			'PASS_TXT' => $roster->locale->act['password'],
			'REM_TXT' => $roster->locale->act['remember_login'],
			'LOGIN_BTTN' => $roster->locale->act['login'],
			'BORDER_END' => border('sred','end'),
			'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
			'REGISTER_TXT' => $roster->locale->act['account_no_register'],
			'REGISTER_LINK' => makelink('util-accounts-register'),
			'REGISTER_CLICK' => $roster->locale->act['click'],
			'LOST_LINK' => makelink('util-accounts-lost'),
			'LOST_TXT' => $roster->locale->act['account_forgot'],
			)
		);

		$roster->tpl->set_filenames(array('accounts_login' => 'accounts/login.html'));
		$roster->tpl->display('accounts_login');
	
	}

	function rosterAccess( $values )
	{
		global $roster;

		if( count($this->levels) == 0 )
		{
			$query = "SELECT `account_id`, `name` FROM `".$roster->db->table('account')."`;";
			$result = $roster->db->query($query);

			if( !$result )
			{
				die_quietly($roster->db->error, 'Roster Auth', __FILE__,__LINE__,$query);
			}

			$this->levels[0] = 'Public';
			while( $row = $roster->db->fetch($result) )
			{
				$this->levels[$row['account_id']] = $row['name'];
			}
		}

		$input_field = '<select name="config_' . $values['name'] . '">' . "\n";
		$select_one = 1;
		foreach( $this->levels as $level => $name )
		{
			if( $level == $values['value'] && $select_one )
			{
				$input_field .= '  <option value="' . $level . '" selected="selected">-[ ' . $name . ' ]-</option>' . "\n";
				$select_one = 0;
			}
			else
			{
				$input_field .= '  <option value="' . $level . '">' . $name . '</option>' . "\n";
			}
		}
		$input_field .= '</select>';

		return $input_field;
	}

}