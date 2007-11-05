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

include ('user.lib.php'); 

class userProfile extends accountUser {
	
	var $profileTable = utable; 
	
	var $uid;
	var $city;
	var $country;
	var $homepage;
	var $notes;
	
	function createFormField($formelement, $label, $length = 25, $required = false) {
		$form_field = "<label for=\"".$formelement."\">".$label."</label>\n";
		$form_field .= "  <input name=\"".$formelement."\" type=\"text\" size=\"".$length."\" value=\"";
		if (isset($_REQUEST[$formelement])) {
			$form_field .= $_REQUEST[$formelement];
		} elseif (isset($this->$formelement) && !isset($_REQUEST[$formelement])) {
			$form_field .= $this->$formelement;
		} else {
			$form_field .= "";
		}
		$form_field .= ($required) ? "\">*<br>\n" : "\"><br>\n";
		return $form_field;		
	}
	
	function createTextArea($text_field, $label) {
		$textarea = "<label for=\"".$text_field."\">".$label."</label>\n";
		$textarea .= "  <textarea name=\"".$text_field."\">";
		if (isset($_REQUEST[$text_field])) {
			$textarea .= $_REQUEST[$text_field];
		} elseif (isset($this->$text_field)) {
			$textarea .= $this->$text_field;
		} else {
			$textarea .= "";
		}
		$textarea .= "</textarea><br>\n";
		return $textarea;		
	}
	
	function saveProfileDate($ident = "", $lname = "", $city = "", $country = "", $hp = "", $notes = "") {
		if ($_SESSION['is_rec']) {
			$sql = sprintf("UPDATE %s SET `lname` = %s `city` = %s, `country` = %s, `homepage` = %s, `notes` = %s, `last_change` = NOW() WHERE `uid` = %d AND `uname` = %s", $this->profileTable, $this->ins_string($lname), $this->ins_string($city), $this->ins_string($country), $this->ins_string($hp), $this->ins_string($notes), $this->ins_string($ident, "int"), $_SESSION['user']);
		} else {
			$sql = sprintf("INSERT INTO %s (`uid`, `uname`, `lname`, `city`, `country`, `homepage`, `notes`, `last_change`) VALUES (NULL, %s, %s, %s, %s, %s, NOW())", $this->profileTable, $this->ins_string($ident, "int"), $_SESSION['user'], $this->ins_string($lname), $this->ins_string($city), $this->ins_string($country), $this->ins_string($hp), $this->ins_string($notes));
		}	
		if ($roster->db->query($sql) or die ($roster->db->errno() ':' $roster->db->error())) {
			$this->uid = (!$_SESSION['is_rec']) ? $roster->db->insert_id() : $ident;
			$this->message = $roster->locale->act['account_profile']['msg2'];
		} else {
			$this->message = $roster->locale->act['account_profile']['msg3'];
		}
	}
	
	function getProfileData() {
		$this->getUserInfo();
		$_SESSION['uid'] = $this->uid;
		$sql = sprintf("SELECT `uid`, `lname`, `city`, `country`, `homepage`, `notes` FROM %s WHERE `uname` = %s", $this->profileTable, $this->user);
		$result = $roster->db->query($sql) or die ($roster->db->errno() ':' $roster->db->error());
		if ($roster->db->num_rows($result) == 0) {
			$_SESSION['is_rec'] = false;			
			$this->message = $roster->locale->act['account_profile']['msg1'];
		} else {
			$_SESSION['is_rec'] = true; // this session acts like an extra control
			while ($obj = $roster->db->fetch($result)) {
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
?>
