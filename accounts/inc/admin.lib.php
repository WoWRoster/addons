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
 * @subpackage User Admin Class 
 */
if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'] . 'user.lib.php');

class userAdmin extends accountUser
{	
	var $userFound = false;
	var $levels = array();
	var $uid;
	var $uname;
	var $oldUserEMail;
	var $userGroudID;
	var $activation;

	function getUserData($for_user, $type = 'uid')
	{
	    global $roster;
		
		if ($type == 'uname')
		{
			$sql = sprintf("SELECT `uid`, `uname`, `email`, `group_id`, `active` FROM %s WHERE `uname` = '%s'", $this->userTable, trim($for_user));
		}
		elseif ($type == 'email')
		{
			$sql = sprintf("SELECT `uid`, `uname`, `email`, `group_id`, `active` FROM %s WHERE `email` = '%s'", $this->userTable, $for_user);
		}
		elseif ($type == 'uid')
		{
			$sql = sprintf("SELECT `uid`, `uname`, `email`, `group_id`, `active` FROM %s WHERE `uid` = %d", $this->userTable, intval($for_user));
		}
		else
		{
			$this->message = 'There was an error getting the user data!';
		}
		$result = $roster->db->query($sql);
		if ($roster->db->num_rows($result) == 1)
		{
			$obj = mysql_fetch_object($result);
			$this->uid = $obj->uid;
			$this->uname = $obj->uname;
			$this->oldUserEMail = $obj->email;
			$this->userGroupID = $obj->group_id;
			$this->activation = $obj->active;
			$this->userFound = true;
			
			$roster->db->free_result($result);
		}
		else
		{
			$this->message = 'Sorry, no data for this username or e-mail!';
		}	
	}
	
	function updateUserByAdmin($user, $new_level, $user_id, $def_pass, $new_email, $active, $confirmation = 'no')
	{
		global $roster;
	
		$this->userFound = true;
		$this->userGroupID = $new_level;
		if ($def_pass != '' && strlen($def_pass) < 4)
		{
			$this->message = 'Password is to short use the min. of 5 chars.';
		}
		else
		{
			if ($this->checkEMail($new_email))
			{
				$sql = "UPDATE %s SET `group_id` = %d, `email` = '%s', `active` = '%s'";
				$sql .= ($def_pass != '') ? sprintf(", `pass` = '%s'", md5($def_pass)) : '';
				$sql .= " WHERE `uid` = %d";
				$sql_compl = sprintf($sql, $this->userTable, $new_level, $new_email, $active, $user_id);
				if ($roster->db->query($sql_compl))
				{
					$this->message = 'Data has been modified for <b>' . $user . '</b>';
					if ($confirmation == 'yes')
					{
						if ($this->sendConfirmation($user_id))
						{
							$this->message .= '<br />...a confirmation mail is sent to the user.';
						}
						else
						{
							$this->message .= '<br />...ERROR no confirmation mail is sent to the user.';
						}
					}
				}
				else
				{
					$this->message = 'Database error, please try again!';
				}
			}
			else
			{
				$this->message = 'The e-mail address is invalid!';
			}
		}
	}
	
	function accessLevelMenu($curr_level, $element_name = 'level')
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

		$input_field = '<select name="' . $element_name . '">' . "\n";
		$select_one = 1;
		foreach( $this->levels as $level => $name )
		{
			if( $level == $curr_level && $select_one )
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
		
		//$menu = '<select name="' . $element_name . "\">\n";
		//for ($i = minaccess; $i <= adminlevel; $i++)
		//{
			//$menu .= '  <option value="' . $i . '"';
			//$menu .= ($curr_level == $i) ? ' selected>' : '>';
			//$menu .= $i . "</option>\n";
		//}
		//$menu .= "</select>\n";
		//return $menu;
	}
	
	function activationSwitch($formelement = "activation")
	{
		global $roster;
	
		$radio_group = '<span style="float:left"><label for="' . $formelement . "\">Active User:</label></span>\n";
		$first = ($this->activation == '1') ? ' checked' : '';
		$second = ($first == ' checked') ? '' : ' checked'; 
		$radio_group .= '<span style="float:right"><input name="' . $formelement . '" type="radio" value="1"' . $first . "> Yes </span>\n";
		$radio_group .= '<span style="float:right"><input name="' . $formelement . '" type="radio" value="0"' . $second . "> No </span>\n";
		return $radio_group;        
	}
}
