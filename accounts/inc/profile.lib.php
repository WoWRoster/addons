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
 * @subpackage Profile 
 */
if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'] . 'user.lib.php');

class accountsProfile extends accounts
{
	
	var $uid;
	var $city;
	var $country;
	var $homepage;
	var $notes;

	function accountsProfile($user = '', $method = 'profile')
	{
		global $roster, $addon, $accounts;

		if ($user == '')
		{
			$this->uid = 0;
		}
		
		if (is_int($user))
		{
			$this->uid = $user;
		}
		elseif (is_nan(floatval($user)))
		{
			$this->uid = $accounts->user->getUser($user);
		}
	}

	function userProfile($uid = '', $char = '', $uname = '', $email = '')
	{
		global $roster, $addon, $accounts;
		
		if (is_null($uid))
		{
			if (is_null($char))
			{
				if (is_null($uname))
				{
					if (is_null($email))
					{
						$accounts->message = 'No search criteria entered!';
					}
					else
					{
						$this->uid = $accounts->session->getVal('uid');
					}
				}
				else
				{
					$this->uid = $accounts->session->getVal('uid');
				}
			}
			else
			{
				$msql = 'SELECT `member_id` FROM ' . $roster->db->table['members'] . ' WHERE `name` = ' . $char . ';';
				$mquery = $roster->db->query($msql);
				while ($row = $roster->db->fetch($mquery))
				{
					$mid = $row['member_id'];
				}
				
				$usql = 'SELECT `uid` FROM ' . $accounts->db['userlink'] . ' WHERE `member_id` = ' . $mid . ';';
				$uquery = $roster->db->query($usql);
				while ($row = $roster->db->fetch($uquery))
				{
					$this->uid = $row['uid'];
				}
			}
		}
		else 
		{
			$this->uid = $uid;
		}
	}

	function userApplication($Name1="", $Email="", $Age="", $Zone="", $Name2="", $Class="", $Level="", $Spec="", $Spec1="", $Spec2="", $Spec3="", $Profession1="", $Prof1Level="", $Profession2="", 
         $Prof2Level="", $FirstAid="", $Fireresist="", $Shadowresist="", $Natureresist="", $Arcaneresist="", $Frostresist="", $Key1="", $Key2="", $Key3="", $Key4="", $Key5="", $Key6="",
		 $Key7="", $Key8="", $Key9="", $Key10="", $Key11="", $Key12="", $Key13="", $Key14="", $Gear="", $Alt1Name="", $Alt1Class="", $Alt1Level="", $Alt2Name="", $Alt2Class="", $Alt2Level="",
		 $Alt3Name="", $Alt3Class="", $Alt3Level="", $Style="", $Guilds="", $Instances="", $Message="", $Rank="", $Referral="", $Processed="")
	{
		global $roster, $addon, $accounts;

		
	}

	function recruitment()
	{
		global $roster, $addon, $accounts;

		$roster->tpl->assign_block_vars('accounts_recruitment', array(
			'BORDER_START' => border('sred','start', $roster->locale->act['acc_rec_form']),
			'RECRUIT_TXT' => $roster->locale->act['acc_rec_txt'],
			'STATUS' => ucfirst($addon['config']['acc_rec_status']),
			'DRUID' => ucfirst($addon['config']['acc_rec_druid']),
			'DRUID_TXT' => $roster->locale->act['Druid'],
			'HUNTER' => ucfirst($addon['config']['acc_rec_hunter']),
			'HUNTER_TXT' => $roster->locale->act['Hunter'],
			'MAGE' => ucfirst($addon['config']['acc_rec_mage']),
			'MAGE_TXT' => $roster->locale->act['Mage'],
			'PALADIN' => ucfirst($addon['config']['acc_rec_paladin']),
			'PALADIN_TXT' => $roster->locale->act['Paladin'],
			'PRIEST' => ucfirst($addon['config']['acc_rec_priest']),
			'PRIEST_TXT' => $roster->locale->act['Priest'],
			'ROGUE' => ucfirst($addon['config']['acc_rec_rouge']),
			'ROGUE_TXT' => $roster->locale->act['Rogue'],
			'SHAMAN' => ucfirst($addon['config']['acc_rec_shaman']),
			'SHAMAN_TXT' => $roster->locale->act['Shaman'],
			'WARLOCK' => ucfirst($addon['config']['acc_rec_warlock']),
			'WARLOCK_TXT' => $roster->locale->act['Warlock'],
			'WARRIOR' => ucfirst($addon['config']['acc_rec_warrior']),
			'WARRIOR_TXT' => $roster->locale->act['Warrior'],
			'BORDER_END' => border('sred','end'),
			'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
			)
		);

		$roster->tpl->set_filenames(array('accounts_recruitment' => $addon['basename'] . '/recruitment.html'));
		$roster->tpl->display('accounts_recruitment');

		return;

	}

	function createFormField($formelement, $label, $length = 25, $required = false)
	{
		$form_field = '<label for="' . $formelement . '">' . $label . "</label>\n";
		$form_field .= '  <input name="' . $formelement . '" type="text" size="' . $length . '" value="';
		if (isset($_REQUEST[$formelement]))
		{
			$form_field .= $_REQUEST[$formelement];
		}
		elseif (isset($this->$formelement) && !isset($_REQUEST[$formelement]))
		{
			$form_field .= $this->$formelement;
		}
		else
		{
			$form_field .= '';
		}
		$form_field .= ($required) ? "\">*<br />\n" : "\"><br />\n";
		return $form_field;		
	}
	
	function createTextArea($text_field, $label)
	{
		$textarea = '<label for="' . $text_field . '">' . $label . "</label>\n";
		$textarea .= '  <textarea name="' . $text_field . '">';
		if (isset($_REQUEST[$text_field]))
		{
			$textarea .= $_REQUEST[$text_field];
		}
		elseif (isset($this->$text_field))
		{
			$textarea .= $this->$text_field;
		}
		else
		{
			$textarea .= "";
		}
		$textarea .= "</textarea><br />\n";
		return $textarea;		
	}
	
	function saveProfileData($ident = '', $lname = '', $city = '', $country = '', $hp = '', $notes = '')
	{
		if ($_SESSION['is_rec'])
		{
			$sql = sprintf("UPDATE %s SET `lname` = %s `city` = %s, `country` = %s, `homepage` = %s, `notes` = %s, `last_change` = NOW() WHERE `uid` = %d AND `uname` = %s", $accounts->db['usertable'], $this->ins_string($lname), $this->ins_string($city), $this->ins_string($country), $this->ins_string($hp), $this->ins_string($notes), $this->ins_string($ident, 'int'), $_SESSION['user']);
		}
		else
		{
			$sql = sprintf("INSERT INTO %s (`uid`, `uname`, `lname`, `city`, `country`, `homepage`, `notes`, `last_change`) VALUES (NULL, %s, %s, %s, %s, %s, NOW())", $accounts->db['usertable'], $this->ins_string($ident, 'int'), $_SESSION['user'], $this->ins_string($lname), $this->ins_string($city), $this->ins_string($country), $this->ins_string($hp), $this->ins_string($notes));
		}
		if ($roster->db->query($sql) or die ($roster->db->errno() . ':' . $roster->db->error()))
		{
			$this->uid = (!$_SESSION['is_rec']) ? $roster->db->insert_id() : $ident;
			$this->message = $roster->locale->act['account_profile']['msg2'];
		}
		else
		{
			$this->message = $roster->locale->act['account_profile']['msg3'];
		}
	}
	
	function getProfileData()
	{
		$this->getUserInfo();
		$_SESSION['uid'] = $this->uid;
		$sql = sprintf("SELECT `uid`, `lname`, `city`, `country`, `homepage`, `notes` FROM %s WHERE `uname` = %s", $accounts->db['profileTable'], $this->user);
		$result = $roster->db->query($sql) or die ($roster->db->errno() . ':' . $roster->db->error());
		if ($roster->db->num_rows($result) == 0)
		{
			$_SESSION['is_rec'] = false;			
			$this->message = $roster->locale->act['account_profile']['msg1'];
		}
		else
		{
			$_SESSION['is_rec'] = true; // this session acts like an extra control
			while ($obj = $roster->db->fetch($result))
			{
				$this->uid = $obj->uid;
				$this->userLName = $obj->lname;
				$this->city = $obj->city;
				$this->country = $obj->country;
				$this->homepage = $obj->homepage;
				$this->notes = $obj->notes;
			}
		}
	}
}
