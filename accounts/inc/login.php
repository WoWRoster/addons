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
 * @subpackage Login Class
*/

if( !defined('IN_ROSTER') )
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
define('ROSTERLOGIN_ADMIN', $addon['config']['acc_admin_level']);

class RosterLogin
{
	var $allow_login;
	var $message;
	var $script_filename;
	var $levels = array();
	var $active = false;
	var $isCookie;
	var $countVisit;
	var $saveLogin;
	var $isLoggedIn = false;

	/**
	 * Constructor for Roster Login class
	 * Accepts an action for the form
	 * And an array of additional fields
	 *
	 * @param string $script_filename
	 * @param array $fields
	 * @return RosterLogin
	 */
	function RosterLogin( $script_filename='' )
	{
		global $roster, $addon, $accounts;
		
		$this->script_filename = makelink($script_filename);

		if( isset( $_POST['logout'] ) )
		{
			$this->logOut();
		}
		else
		{
			if (isset($_COOKIE[$addon['config']['acc_cookie_name']]))
			{
				$this->loginReader();
			}
			else
			{
				if (isset($_SESSION['user']) || isset($_SESSION['userPass']))
				{
					$this->loginUser($_SESSION['user'], $_SESSION['userPass']);
					$this->allow_login = $_SESSION['groupID'];
					$this->message = '<span style="font-size:10px;color:red;">Logged in '.ucfirst($_SESSION['userFName']).':</span><form style="display:inline;" name="roster_logout" action="'.$this->script_filename.'" method="post"><span style="font-size:10px;color:#FFFFFF"><input type="hidden" name="logout" />[<a href="javascript:document.roster_logout.submit();">Logout</a>]</span></form><br />';
	    		}
				else
				{
					if (isset($_POST['user']) || isset($_POST['password']))
					{
		    			$this->saveLogin = (isset($_POST['remember'])) ? $_POST['remember'] : 'no'; // use a cookie to remember the login
		    			$this->countVisit = true; // if this is true then the last visitdate is saved in the database
						$this->loginUser($_POST['user'], md5($_POST['password']));
						$this->message = '<span style="font-size:10px;color:red;">Logged in '.ucfirst($accounts->user->info['fname']).':</span><form style="display:inline;" name="roster_logout" action="'.$this->script_filename.'" method="post"><span style="font-size:10px;color:#FFFFFF"><input type="hidden" name="logout" />[<a href="javascript:document.roster_logout.submit();">Logout</a>]</span></form><br />';
	    			}
					else
					{
						$_SESSION['isLoggedIn'] = false;
						$this->allow_login = 0;
						$this->message = '<span style="font-size:10px;color:red;">Not logged in</span><br />';
					}
				}
			}
		}
	}

	function loginUser($user, $password)
	{
		global $roster, $addon, $accounts;
		
		if ($user != '' && $password != '')
		{	
			if ($accounts->user->checkUser($user, $password, ''))
			{
				$accounts->user->getInfo($user, $password);
				
				$this->loginSaver();
				if ($this->countVisit)
				{
					$this->regVisit($user, $password);
				}	
				$this->setUser();
			}
			else
			{
				$this->message = $roster->locale->act['acc_user']['msg10'];
			}
		}
		else
		{
			$this->message = $roster->locale->act['acc_user']['msg11'];
		}
	}	

	function setUser()
	{
		global $roster, $addon, $accounts;
		
		$this->isLoggedIn = true;
		
		$_SESSION['uid'] = $accounts->user->info['uid'];
		$_SESSION['user'] = $accounts->user->info['uname'];
		$_SESSION['userPass'] = $accounts->user->info['pass'];
		$_SESSION['groupID'] = $accounts->user->info['group_id'];
		$_SESSION['userFName'] = $accounts->user->info['fname'];
		$_SESSION['isLoggedIn'] = $this->isLoggedIn;
	}

	function loginSaver()
	{
		global $roster, $addon, $accounts;
		
		if ($this->saveLogin == 'no')
		{
			if (isset($_COOKIE[$addon['config']['acc_cookie_name']]))
			{
				$expire = time()-3600;
			}
			else
			{
				return;
			}
		}
		else
		{
			$expire = time()+2592000;
		}		
		$cookie_str = $accounts->user->info['uname'] . chr(31) . base64_encode($accounts->user->info['pass']);
		setcookie($addon['config']['acc_cookie_name'], $cookie_str, $expire, ROSTER_BASE);
	}
	
	function loginReader()
	{
		global $roster, $addon, $accounts;
		
		if (isset($_COOKIE[$addon['config']['acc_cookie_name']]))
		{
			$cookie_parts = explode(chr(31), $_COOKIE[$addon['config']['acc_cookie_name']]);
			$user = $cookie_parts[0];
			$pass = base64_decode($cookie_parts[1]);
			$this->isCookie = true;
			$this->loginUser($user, md5($pass));
		}			 
	}
	
	function regVisit($login, $pass)
	{
		global $roster, $addon, $accounts;
		
		$visit_sql = sprintf("UPDATE %s SET `last_login` = '%s' WHERE `uname` = '%s' AND `pass` = '%s'", $accounts->db['usertable'], date('Y-m-d H:i:s'), $login, $pass);
		$roster->db->query($visit_sql);
	}
	
	function logOut() 
	{
		global $roster, $addon, $accounts;
		
		unset($_SESSION['uid']);
		unset($_SESSION['user']);
		unset($_SESSION['userPass']);
		unset($_SESSION['groupID']);
		unset($_SESSION['userFName']);
		unset($_SESSION['isLoggedIn']);
		
		setcookie( $addon['config']['acc_cookie_name'],'',time()-86400,'/' );
		$this->allow_login = 0;
		$this->message = '<span style="font-size:10px;color:red;">Logged out</span><br />';
		
	}

	function getAuthorized()
	{
		global $roster, $addon, $accounts;

		if(isset($accounts->user->info['group_id']))
		{
			$this->allow_login = $accounts->user->info['group_id'];
		}

		return $this->allow_login;
	}

	function getMessage()
	{
		global $roster, $addon, $accounts;

		return $this->message;
	}

	function getLoginForm()
	{
		global $roster, $addon, $accounts;

		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing
	
		$roster->tpl->assign_block_vars('accounts_login', array(
			'BORDER_START' => border('sred','start', $roster->locale->act['auth_req']),
			'LOGIN_TXT' => $roster->locale->act['acc_login_txt'],
			'FORM_LINK' => $this->script_filename,
			'UNAME_TXT' => $roster->locale->act['acc_uname'],
			'PASS_TXT' => $roster->locale->act['password'],
			'REM_TXT' => $roster->locale->act['remember_login'],
			'LOGIN_BTTN' => $roster->locale->act['login'],
			'BORDER_END' => border('sred','end'),
			'REGISTER_TXT' => $roster->locale->act['acc_no_register'],
			'REGISTER_LINK' => makelink('util-accounts-register'),
			'REGISTER_CLICK' => $roster->locale->act['click'],
			'LOST_LINK' => makelink('util-accounts-lost'),
			'LOST_TXT' => $roster->locale->act['acc_forgot'],
			)
		);

		$roster->tpl->set_filenames(array('accounts_login' => $addon['basename'] . '/login.html'));
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
