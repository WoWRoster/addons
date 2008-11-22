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
	var $action;
	var $levels = array();
	var $active = false;
	var $isCookie;
	var $countVisit;
	var $saveLogin = false;
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
		
		$this->setAction($script_filename);

		if( isset( $_POST['logout'] ) )
		{
			$this->logOut($accounts->session->getVal('uid'));
		}
		elseif (isset($_POST['user']) || isset($_POST['password']))
		{		    			
			if (isset($_POST['remember']))
			{
				$this->saveLogin = true; // use a cookie to remember the login
			}
			$this->loginSaver();
			$this->countVisit = true; // if this is true then the last visitdate is saved in the database
			$this->loginUser($_POST['user'], md5($_POST['password']));
			if ($this->allow_login > 0)
			{
				$this->message = '<span style="font-size:10px;color:red;">Logged in '.ucfirst($accounts->user->info['fname']).':</span><form style="display:inline;" name="roster_logout" action="' . $this->action . '" method="post"><input type="hidden" name="logout" value="1" /><input type="submit" value="Logout" /></form><br />';
			}
	    }
		elseif (isset($_COOKIE[$addon['config']['acc_cookie_name']]))
		{
			$this->loginReader();
		}
		elseif ($accounts->session->getVal('user') || $accounts->session->getVal('pass'))
		{
			$this->loginUser($accounts->session->getVal('user'), $accounts->session->getVal('pass'));
			$this->allow_login = $accounts->session->getVal('groupID');
			if ($this->allow_login > 0)
			{
				$this->message = '<span style="font-size:10px;color:red;">Logged in '.ucfirst($accounts->user->info['fname']).':</span><form style="display:inline;" name="roster_logout" action="' . $this->action . '" method="post"><input type="hidden" name="logout" value="1" /><input type="submit" value="Logout" /></form><br />';
			}
	    }
		else
		{
			$accounts->session->setVal('isLoggedIn', $this->isLoggedIn);
			$this->allow_login = 0;
			$this->message = '<span style="font-size:10px;color:red;">Not logged in</span><br />';
		}
	}

	function loginUser($user, $password)
	{
		global $roster, $addon, $accounts;
		
		if ($user != '' && $password != '')
		{	
			if ($accounts->user->checkUser($user, $password, ''))
			{
				$accounts->user->getInfo($user);

				if ($this->countVisit)
				{
					$this->regVisit($user, $password);
				}	
				$this->setUser();
				$this->loginSaver();
			}
			else
			{
				$this->message = $roster->locale->get_string(array('acc_user' => 'msg10'), 'accounts');
			}
		}
		else
		{
			$this->message = $roster->locale->get_string(array('acc_user' => 'msg11'), 'accounts');
		}
	}	

	function setUser()
	{
		global $roster, $addon, $accounts;
		
		if ($accounts->session->getVal('isLoggedIn'))
		{
			return;
		}
		else
		{
			$this->isLoggedIn = true;

			$accounts->session->setVal(array(
				'uid' => $accounts->user->info['uid'],
				'user' => $accounts->user->info['uname'],
				'pass' => $accounts->user->info['pass'],
				'groupID' => $accounts->user->info['group_id'],
				'isLoggedIn' => $this->isLoggedIn
				));

			$sql = 'UPDATE `' . $accounts->db['usertable'] . '` SET `online` = 1 WHERE `uid` = ' . $accounts->user->info['uid'];
			$roster->db->query($sql);

			$this->allow_login = $accounts->user->info['group_id'];
		}
	}

	function loginSaver()
	{
		global $roster, $addon, $accounts;
		
		if ($this->saveLogin == false)
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
		$cookie_str = $accounts->session->getVal('user') . chr(31) . base64_encode($accounts->session->getVal('pass') . chr(31) . $accounts->session->sessid . chr(31) . $accounts->session->no_expire);
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
	
	function logOut($uid) 
	{
		global $roster, $addon, $accounts;
		
		setcookie( $addon['config']['acc_cookie_name'],'',time()-86400,'/' );
		$this->allow_login = 0;
		$this->message = '<span style="font-size:10px;color:red;">Logged out</span><br />';

		$sql = 'UPDATE `' . $accounts->db['usertable'] . '` SET `online` = 0 WHERE `uid` = ' . $uid;
		$roster->db->query($sql);

		$accounts->session->endSession();
		
	}

	function getAuthorized($access = '', $redirect = '')
	{
		global $roster, $addon, $accounts;

		if(!is_null($access))
		{
			if(!is_null($redirect))
			{
				$this->setAction($redirect);
				return $this->allow_login >= $access;
			}
			else
			{
				return $this->allow_login >= $access;
			}
		}
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
			'LOGIN_TXT' => $roster->locale->get_string(array('acc_int' => 'login_txt'), 'accounts'),
			'FORM_LINK' => $this->action,
			'UNAME_TXT' => $roster->locale->get_string(array('acc_int' => 'uname'), 'accounts'),
			'PASS_TXT' => $roster->locale->act['password'],
			'REM_TXT' => $roster->locale->get_string(array('acc_int' => 'remember'), 'accounts'),
			'LOGIN_BTTN' => $roster->locale->get_string(array('acc_int' => 'login'), 'accounts'),
			'BORDER_END' => border('sred','end'),
			'REGISTER_TXT' => $roster->locale->get_string(array('acc_int' => 'no_register'), 'accounts'),
			'REGISTER_LINK' => makelink('util-accounts-register'),
			'REGISTER_CLICK' => $roster->locale->get_string(array('acc_int' => 'click'), 'accounts'),
			'LOST_LINK' => makelink('util-accounts-lost'),
			'LOST_TXT' => $roster->locale->get_string(array('acc_int' => 'forgot'), 'accounts'),
			)
		);

		$roster->tpl->set_filenames(array('accounts_login' => $addon['basename'] . '/login.html'));
		$roster->tpl->display('accounts_login');
	}

	function getMenuLoginForm()
	{
		global $roster, $addon, $accounts;
		if( $this->allow_login < 1 )
		{
			return '
			<form action="' . $this->action . '" method="post" enctype="multipart/form-data" onsubmit="submitonce(this);" style="margin:0;">
				' . $roster->locale->get_string(array('acc_int' => 'uname'), 'accounts') . ': <input name="user" class="wowinput128" type="text" size="30" maxlength="30" />&nbsp;&nbsp;
				' . $roster->locale->act['password'] . ': <input name="password" class="wowinput128" type="password" size="30" maxlength="30" />&nbsp;&nbsp;
				<input type="submit" value="Go" />
			</form>' . $this->getMessage();
		}
		else
		{
			return $this->getMessage();
		}
	}

	function setAction( $action )
	{
		$this->action = makelink($action);
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
