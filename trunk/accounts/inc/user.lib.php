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
 * @subpackage User Class
 */
if( !defined('IN_ROSTER') )
{
	exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'] . 'conf.php');

class accountUser
{
	var $userTable = utable;
	var $userLinkTable = linktable;

	var $user;
	var $userPass;
	var $groupID;
	var $userFName;
	var $userLName;
	var $userInfo;
	var $userEMail;
	var $saveLogin = savelogin;
	var $cookieName = cookiename;
	var $cookiePath = ROSTER_BASE;
	var $isCookie;
	var $isLoggedIn;
	var $getUserInfo;

	var $adminGroup = adminlevel;
	var $minAccess = minaccess;
	var $usePerms = useperms;
	var $countVisit;
	var $rosterLocale = roster_locale;

	var $uid;
	var $message;
	var $activationPage;
	var $activationPageExt;
	var $loginPage;
	var $loginPageExt;
	var $mainPage;
	var $denyAccessPage;
	var $adminPage;
	var $adminPageExt;
	var $autoActivation = autoact;
	var $sendCopy = admincopy; // send a mail copy to the administrator (register only)

	var $webmasterMail = adminmail;
	var $webmasterName = adminname;
	var $adminMail = adminmail;
	var $adminName = adminname;

	/**
	 * Constructor for Account User class
	 * Accepts an action for the form
	 * And an array of additional fields
	 *
	 * @return accountUser
	 */
	function accountUser()
	{
		global $roster, $addon;

		$this->activationPage = makelink('util-accounts-user&fct=activate');
		$this->activationPageExt = makelink('util-accounts-user&fct=activate', true);
		$this->loginPage = makelink('util-accounts-user&fct=login');
		$this->loginPageExt = makelink('util-accounts-user&fct=login', true);
		$this->logOutPage = makelink('util-accounts-user&fct=logout');
		$this->mainPage = makelink('util-accounts-index');
		$this->denyAccessPage = makelink('util-accounts-user&fct=deny');
		$this->adminPage = makelink('rostercp-addons-accounts');
		$this->adminPageExt = makelink('rostercp-addons-accounts', true);
	}

	function checkUser($pass = '')
	{
		global $roster, $addon;

		switch ($pass)
		{
			case 'new':
				$sql = sprintf("SELECT COUNT(*) AS `check` FROM %s WHERE `email` = '%s' OR `uname` = '%s'", $this->userTable, $this->userEMail, $this->user);
				break;
			case 'lost':
				$sql = sprintf("SELECT COUNT(*) AS `check` FROM %s WHERE `email` = '%s' AND `active` = '1'", $this->userTable, $this->userEMail);
				break;
			case 'new_pass':
				$sql = sprintf("SELECT COUNT(*) AS `check` FROM %s WHERE `pass` = '%s' AND `uid` = %d", $this->userTable, $this->userPass, $this->uid);
				break;
			case 'active':
				$sql = sprintf("SELECT COUNT(*) AS `check` FROM %s WHERE `uid` = %d AND `active` = '0'", $this->userTable, $this->uid);
				break;
			case 'validate':
				$sql = sprintf("SELECT COUNT(*) AS `check` FROM %s WHERE `uid` = %d AND `tmp_mail` <> ''", $this->userTable, $this->uid);
				break;
			default:
				$password = (strlen($this->userPass) < 32) ? md5($this->userPass) : $this->userPass;
				$sql = sprintf("SELECT COUNT(*) AS `check` FROM %s WHERE `uname` = '%s' AND `pass` = '%s' AND `active` = '1'", $this->userTable, $this->user, $password);
		}
		$result = $roster->db->query($sql) or die($roster->db->errno() . $roster->db->error());
		if ($roster->db->result($result, 0, 'check') == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// New methods to handle the access level
	function getGroupID()
	{
		global $roster, $addon;

		$sql = sprintf("SELECT `group_id` FROM %s WHERE `uname` = '%s' AND `active` = '1'", $this->userTable, $this->user);
		if (!$result = $roster->db->query($sql))
		{
			$this->message = $roster->locale->act['account_user']['msg14'];
		}
		else
		{
			$this->groupID = $roster->db->result($result, 0, 'group_id');
		}
	}

	function setUser()
	{
		global $roster, $addon;

		$this->isLoggedIn = true;

		$_SESSION['user'] = $this->user;
		$_SESSION['userPass'] = $this->userPass;
		$_SESSION['groupID'] = $this->groupID;
		$_SESSION['userFName'] = $this->userFName;
		$_SESSION['isLoggedIn'] = $this->isLoggedIn;
		if (isset($_SESSION['referer']) && $_SESSION['referer'] != '')
		{
			$next_page = $_SESSION['referer'];
			unset($_SESSION['referer']);
		}
		else
		{
			$next_page = $this->mainPage;
		}
		header('Location: ' . $next_page);
	}

	function setRosterAccess()
	{
		global $roster, $addon;

		$sql = sprintf("SELECT * FROM %s WHERE `account_id` = %d", $roster->db->table('account'), $this->groupID);
		$result = $roster->db->query($sql);

		if( !$result )
		{
			setcookie( 'roster_pass','',time()-86400,'/' );
			$this->allow_login = 0;
			$this->message = '<span style="font-size:10px;color:red;">Failed to fetch password info</span><br />';
			return;
		}

		while( $row = $roster->db->fetch($result) )
		{
			setcookie( 'roster_pass',$row['hash'],0,'/' );
			$this->allow_login = $row['account_id'];
			$this->message = '<span style="font-size:10px;color:red;">Logged in ' . $this->user . ':</span><form style="display:inline;" name="roster_logout" action="' . $this->logOutPage . '" method="post"><span style="font-size:10px;color:#FFFFFF"><input type="hidden" name="logout" value="1" />[<a href="javascript:document.roster_logout.submit();">Logout</a>]</span></form><br />';

			$roster->db->free_result($result);
			return;
		}
		$roster->db->free_result($result);

		setcookie( 'roster_pass','',time()-86400,'/' );
		$this->allow_login = 0;
		$this->message = '<span style="font-size:10px;color:red;">Invalid password</span><br />';
		return;
	}

	function loginUser($user, $password)
	{
		global $roster, $addon;

		if ($user != '' && $password != '')
		{
			$this->user = $user;
			$this->userPass = $password;
			if ($this->checkUser())
			{
				$this->loginSaver();
				if ($this->countVisit)
				{
					$this->regVisit($user, $password);
				}
				$this->getGroupID();
				$this->getUserInfo($user, $password);
				$this->setUser();
				$this->setRosterAccess();
			}
			else
			{
				$this->message = $roster->locale->act['account_user']['msg10'];
			}
		}
		else
		{
			$this->message = $roster->locale->act['account_user']['msg11'];
		}
	}

	function loginSaver()
	{
		global $roster, $addon;

		if ($this->saveLogin == 'no')
		{
			if (isset($_COOKIE[$this->cookieName]))
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
		$cookie_str = $this->user . chr(31) . base64_encode($this->userPass);
		setcookie($this->cookieName, $cookie_str, $expire, $this->cookiePath);
	}

	function loginReader()
	{
		global $roster, $addon;

		if (isset($_COOKIE[$this->cookieName]))
		{
			$cookie_parts = explode(chr(31), $_COOKIE[$this->cookieName]);
			$this->user = $cookie_parts[0];
			$this->userPass = base64_decode($cookie_parts[1]);
			$this->isCookie = true;
		}
	}

	function regVisit($login, $pass)
	{
		global $roster, $addon;

		$visit_sql = sprintf("UPDATE %s SET `extra_info` = '%s' WHERE `uname` = '%s' AND `pass` = '%s'", $this->userTable, date('Y-m-d H:i:s'), $login, md5($pass));
		$roster->db->query($visit_sql);
	}

	function logOut()
	{
		global $roster, $addon;

		unset($_SESSION['uid']);
		unset($_SESSION['user']);
		unset($_SESSION['userPass']);
		unset($_SESSION['groupID']);
		unset($_SESSION['userFName']);
		unset($_SESSION['isLoggedIn']);


		setcookie( 'roster_pass','',time()-86400,'/' );
		$this->allow_login = 0;
		$this->message = '<span style="font-size:10px;color:red;">Logged out</span><br />';


		header('Location: ' . $this->mainPage);
	}

	function accessPage($refer = '', $qs = '', $level)
	{
		global $roster, $addon;

		$refer_qs = $refer;
		$refer_qs .= ($qs != '') ? '?' . $qs : '';
		if (isset($_SESSION['user']) && isset($_SESSION['userPass']))
		{
			$this->user = $_SESSION['user'];
			$this->userPass = $_SESSION['userPass'];
			if (!isset($_SESSION['groupID']))
			{
				if (!$this->groupID)
				{
					$this->getGroupID();
				}
				$_SESSION['groupID'] = $this->groupID;
			}

			if (!$this->checkUser())
			{
				$_SESSION['referer'] = $refer_qs;
				header('Location: ' . $this->loginPage);
			}
			if ($_SESSION['groupID'] < $level)
			{
				header('Location: ' . $this->denyAccessPage . '&level=' . $level);
			}
		}
		else
		{
			$_SESSION['referer'] = $refer_qs;
			header('Location: ' . $this->loginPage);
		}
	}

	function getUserInfo($user, $pass)
	{
		global $roster, $addon;

		$sql_info = sprintf("SELECT `fname`, `extra_info`, `email`, `uid` FROM %s WHERE `uname` = '%s' AND `pass` = '%s'", $this->userTable, $user, md5($userPass));
		$res_info = $roster->db->query($sql_info);
		if (!$res_info)
		{
			die_quietly($roster->db->error, 'Accounts Auth', __FILE__,__LINE__,$query);
		}
		$row = $roster->db->fetch($res_info);

		$this->uid = $row['uid'];
		$this->userFName = $row['fname'];
		$this->userInfo = $row['extra_info'];
		$this->userEMail = $row['email'];

		$roster->db->free_result($res_info);
	}

	function updateUser($newPass, $newConfirm, $newFName, $newLName, $newInfo, $newMail)
	{
		global $roster, $addon;

		if ($newPass != '')
		{
			if ($this->checkNewPass($newPass, $newConfirm))
			{
				$ins_password = $newPass;
				$updatePass = true;
			}
			else
			{
				return;
			}
		}
		else
		{
			$ins_password = $this->userPass;
			$updatePass = false;
		}
		if (trim($newMail) <> $this->userEMail)
		{
			if ($this->checkEMail($newMail))
			{
				$this->userEMail = $newMail;
				if (!$this->checkUser('lost'))
				{
					$updateEMail = true;
				}
				else
				{
					$this->message = $roster->locale->act['account_user']['msg31'];
					return;
				}
			}
			else
			{
				$this->message = $roster->locale->act['account_user']['msg16'];
				return;
			}
		}
		else
		{
			$updateEMail = false;
			$newMail = '';
		}
		$upd_sql = sprintf("UPDATE %s SET `pass` = %s, `fname` = %s, `lname` = %s, `extra_info` = %s, `tmp_mail` = %s WHERE `uid` = %d",
		$this->userTable,
		$this->ins_string(md5($ins_password)),
		$this->ins_string($newFName),
		$this->ins_string($newLName),
		$this->ins_string($newInfo),
		$this->ins_string($newMail),
		$this->uid);
		$upd_res = $roster->db->query($upd_sql);
		if ($upd_res)
		{
			if ($updatePass)
			{
				$_SESSION['userPass'] = $this->userPass = $ins_password;
				if (isset($_COOKIE[$this->cookieName]))
				{
					$this->saveLogin = 1;
					$this->loginSaver();
				}
			}
			$this->message = $roster->locale->act['account_user']['msg30'];
			if ($updateEMail)
			{
				if ($this->sendMail($newMail, sprintf($roster->locale->act['account_user']['msg33'], $this->user, $this->loginPageExt, $this->uid, md5($this->userPass))))
				{
					$this->message = $roster->locale->act['account_user']['msg27'];
				}
				else
				{
					$roster->db->query(sprintf("UPDATE %s SET `tmp_mail` = ''", $this->userTable));
					$this->message = $roster->locale->act['account_user']['msg14'];
				}
			}
		}
		else
		{
			$this->message = $roster->locale->act['account_user']['msg15'];
		}
	}

	function checkNewPass($pass, $passConfirm)
	{
		global $roster, $addon;

		if ($pass == $passConfirm)
		{
			if (strlen($pass) >= $addon['config']['pass_length'])
			{
				return true;
			}
			else
			{
				$this->message = sprintf($roster->locale->act['account_user']['msg32'], $addon['config']['pass_length']);
				return false;
			}
		}
		else
		{
			$this->message = $roster->locale->act['account_user']['msg38'];
			return false;
		}
	}

	function checkEMail($mail_address)
	{
		global $roster, $addon;

		if (preg_match("/^[0-9a-z]+(([\.\-_])[0-9a-z]+)*@[0-9a-z]+(([\.\-])[0-9a-z-]+)*\.[a-z]{2,4}$/i", $mail_address))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function ins_string($value, $type = '')
	{
		global $roster, $addon;

		$value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;
		switch ($type)
		{
			case 'int':
				$value = ($value != '') ? intval($value) : NULL;
				break;
			default:
				$value = ($value != '') ? "'" . $value . "'" : "''";
		}
		return $value;
	}

	function registerUser($first_uname, $first_pass, $confirmPass, $first_fname, $first_lname, $first_info, $first_email)
	{
		global $roster, $addon;

		if ($this->checkNewPass($first_pass, $confirmPass))
		{
			if (strlen($first_uname) >= $addon['config']['uname_length'])
			{
				if ($this->checkEMail($first_email))
				{
					$this->userEMail = $first_email;
					$this->user = $first_uname;
					if ($this->checkUser('new'))
					{
						$this->message = $roster->locale->act['account_user']['msg12'];
					}
					else
					{
						$sql = sprintf("INSERT INTO %s (`uid`, `uname`, `pass`, `fname`, `lname`, `extra_info`, `email`, `group_id`, `active`) VALUES (NULL, %s, %s, %s, %s, %s, %s, %d, '0')",
						$this->userTable,
						$this->ins_string($first_uname),
						$this->ins_string(md5($first_pass)),
						$this->ins_string($first_fname),
						$this->ins_string($first_lname),
						$this->ins_string($first_info),
						$this->ins_string($this->userEMail),
						$addon['config']['min_access']);
						$ins_res = $roster->db->query($sql);
						if ($ins_res)
						{
							$this->uid = $roster->db->insert_id();
							$this->userPass = $first_pass;
							if ($this->sendMail($this->userEMail))
							{
								$this->message = $roster->locale->act['account_user']['msg13'];
							}
							else
							{
								$roster->db->query(sprintf("DELETE FROM %s WHERE `uid` = %d", $this->userTable, $this->uid));
								$this->message = $roster->locale->act['account_user']['msg14'];
							}
						}
						else
						{
							$this->message = $roster->locale->act['account_user']['msg15'];
						}
					}
				}
				else
				{
					$this->message = $roster->locale->act['account_user']['msg16'];
				}
			}
			else
			{
				$this->message = sprintf($roster->locale->act['account_user']['msg17'], $addon['config']['uname_length']);
			}
		}
	}

	function validateEMail($validation_key, $key_id)
	{
		global $roster, $addon;

		if ($validation_key != '' && strlen($validation_key) == 32 && $key_id > 0)
		{
			$this->uid = $key_id;
			if ($this->checkUser('validate'))
			{
				$upd_sql = sprintf("UPDATE %s SET `email` = `tmp_mail`, `tmp_mail` = '' WHERE `uid` = %d AND `pass` = '%s'", $this->userTable, $key_id, $validation_key);
				if ($roster->db->query($upd_sql))
				{
					$this->message = $roster->locale->act['account_user']['msg18'];
				}
				else
				{
					$this->message = $roster->locale->act['account_user']['msg19'];
				}
			}
			else
			{
				$this->message = $roster->locale->act['account_user']['msg34'];
			}
		}
		else
		{
			$this->message = $roster->locale->act['account_user']['msg21'];
		}
	}

	function activateAccount($activate_key, $key_id)
	{
		global $roster, $addon;

		if ($activate_key != '' && strlen($activate_key) == 32 && $key_id > 0)
		{
			$this->uid = $key_id;
			if ($this->checkUser('active'))
			{
				if ($this->autoActivation == 1)
				{
					$upd_sql = sprintf("UPDATE %s SET `active` = '1' WHERE `uid` = %d AND `pass` = '%s'", $this->userTable, $key_id, $activate_key);
					if ($roster->db->query($upd_sql))
					{
						if ($this->sendConfirmation($key_id))
						{
							$this->message = $roster->locale->act['account_user']['msg18'];
						}
						else
						{
							$this->message = $roster->locale->act['account_user']['msg14'];
						}
					}
					else
					{
						$this->message = $roster->locale->act['account_user']['msg19'];
					}
				}
				else
				{
					if ($this->sendMail($this->adminMail, 0, true))
					{
						$this->message = $roster->locale->act['account_user']['msg36'];
					}
					else
					{
						$this->message = $roster->locale->act['account_user']['msg14'];
					}
				}
			}
			else
			{
				$this->message = $roster->locale->act['account_user']['msg20'];
			}
		}
		else
		{
			$this->message = $roster->locale->act['account_user']['msg21'];
		}
	}

	function sendConfirmation($uid)
	{
		global $roster, $addon;

		$sql = sprintf("SELECT `email` FROM %s WHERE `uid` = %d", $this->userTable, $uid);
		$userEMail = $roster->db->result($roster->db->query($sql), 0, 'email');

		$message = sprintf($roster->locale->act['account_user']['msg37'], $this->user, $this->loginPageExt, $this->adminName);

		if ($this->sendMail($userEMail, $message))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function sendMail($mail_address, $message)
	{
		global $roster, $addon;

		if (!$message)
		{
			$message = sprintf($roster->locale->act['account_user']['msg29'], $this->user, $this->loginPageExt, $this->uid, md5($this->userPass));
		}

		$header = "From: \"" . $this->webmasterName . "\" <" . $this->webmasterMail . ">\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Mailer: Olaf's mail script version 1.11\r\n";
		$header .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n";
		if (!$this->autoActivation)
		{
			$subject = $roster->locale->act['account_user']['msg26'];
			$body = sprintf($roster->locale->act['account_user']['msg39'], date('Y-m-d'), $this->adminPageExt);
		}
		else
		{
			$subject = $roster->locale->act['account_user']['msg28'];
			$body = $message;
		}
		if (mail($mail_address, $subject, $body, $header))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function forgotPass($forgot_email)
	{
		global $roster, $addon;

		if ($this->checkEMail($forgot_email))
		{
			$this->userEMail = $forgot_email;
			if (!$this->checkUser('lost'))
			{
				$this->message = $roster->locale->act['account_user']['msg22'];
			}
			else
			{
				$forgot_sql = sprintf("SELECT `uname`, `uid`, `pass` FROM %s WHERE `email` = '%s'", $this->userTable, $this->userEMail);
				if ($forgot_result = $roster->db->query($forgot_sql))
				{
					$this->user = $roster->db->result($forgot_result, 0, 'uname');
					$this->uid = $roster->db->result($forgot_result, 0, 'uid');
					$this->userPass = $roster->db->result($forgot_result, 0, 'pass');

					$roster->db->free_result($forgot_result);

					$message = sprintf($roster->locale->act['account_user']['msg35'], $this->user, $this->activationPageExt, $this->uid, md5($this->userPass));
					if ($this->sendMail($this->userEMail, $message))
					{
						$this->message = $roster->locale->act['account_user']['msg23'];
					}
					else
					{
						$this->message = $roster->locale->act['account_user']['msg14'];
					}
				}
				else
				{
					$this->message = $roster->locale->act['account_user']['msg15'];
				}
			}
		}
		else
		{
			$this->message = $roster->locale->act['account_user']['msg16'];
		}
	}

	function checkActivationPass($controle_str, $uid)
	{
		global $roster, $addon;

		if ($controle_str != '' && strlen($controle_str) == 32 && $uid > 0)
		{
			$this->userPass = $controle_str;
			$this->uid = $uid;
			if ($this->checkUser('new_pass'))
			{
				$sql_get_user = sprintf("SELECT `uname` FROM %s WHERE `pass` = '%s' AND `uid` = %d", $this->userTable, $this->userPass, $uid);
				$get_user = $roster->db->query($sql_get_user);
				$this->user = $roster->db->result($get_user, 0, 'uname'); // end fix
				return true;
			}
			else
			{
				$this->message = $roster->locale->act['account_user']['msg21'];
				return false;
			}
		}
		else
			{
			$this->message = $roster->locale->act['account_user']['msg21'];
			return false;
		}
	}

	function activateNewPass($new_pass, $new_confirm, $old_pass, $user_id)
	{
		global $roster, $addon;

		if ($this->checkNewPassword($new_pass, $new_confirm))
		{
			$sql_new_pass = sprintf("UPDATE %s SET `pass` = '%s' WHERE `pass` = '%s' AND `uid` = %d", $this->userTable, md5($new_pass), md5($old_pass), $user_id);
			if ($roster->db->query($sql_new_pass))
			{
				$this->message = $roster->locale->act['account_user']['msg30'];
				return true;
			}
			else
			{
				$this->message = $roster->locale->act['account_user']['msg14'];
				return false;
			}
		}
		else
		{
			return false;
		}
	}

}
