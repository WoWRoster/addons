<?php
/**
* WoWRoster.net WoWRoster
*
* Login and authorization
*
* LICENSE: Licensed under the Creative Commons
*          "Attribution-NonCommercial-ShareAlike 2.5" license
*
* @copyright  2002-2007 WoWRoster.net
* @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
* @version    SVN: $Id$
* @link       http://www.wowroster.net
* @since      File available since Release 1.7.1
* @package    SMFSync
* @subpackage User
*/
define('ROSTERLOGIN_ADMIN', 3);
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
	/**
	 * Required functions for compatability with the rest of roster
	 * RosterLogin ( $script_filename='' ) - $script_filename is not used in this
	 *                                     - customization, but left in for compatability
	 * getAuthorized() - Used when checking for permissions
	 * getMessage() - Retrieve messages from authentication
	 * getLoginForm ( $level = 3 ) - Required to show a login form, if you want one.
	 *                             - Function is still necessary even if blank
	 * rosterAccess ( $values ) - Required for compatability with roster_cp.
	 *                          - Routine has not been changed
	 * getCookieName() - Needed for use of grabbing the table name for SMF.
	 *                 - If modifiying, can be removed.
	 */
	function RosterLogin( $script_filename='' )
	{
		global $roster;

		if( isset( $_POST['logout'] ) && $_POST['logout'] == '1' )
		{
			setcookie( $this->getCookieName(),'',time()-86400,'/' );
			setcookie( 'PHPSESSID','',time()-86400,'/');
			$this->allow_login = 0;
			$this->message = '<span style="font-size:10px;color:red;">Logged out</span><br />';
			header ("Location: .");
		}
		elseif( isset($_POST['username']) && isset($_POST['password']) && eregi('uniuploader',$_SERVER['HTTP_USER_AGENT'])){
			//Login with UniUploader

			$query = "SELECT * FROM `{$roster->db->prefix}addon_config` WHERE `addon_id` = '{$roster->addon_data['smfsync']['addon_id']}' AND `config_name` = 'forum_prefix' LIMIT 1";
			$result = $roster->db->query ( $query );
			$row = $roster->db->fetch ( $result );
			$forum_prefix = $row['config_value'];

			//Do not use realName here so they can use the same login name they use for the forum.
			$query = "SELECT * FROM `{$forum_prefix}members` WHERE `memberName` = '{$_POST['username']}' LIMIT 1";
			$result = $roster->db->query ( $query );
			$num_of_rows = $roster->db->num_rows();
			$row = $roster->db->fetch ( $result );

			if ($num_of_rows == 1){//User was found in the database, check the password.
				if ( sha1(strtolower($row['memberName']) . $_POST['password']) == $row['passwd'] ){
					//Check to see what the highest group permission they are a member of.
					$groups = array();
					$rosterGroup = array();

					$groups = explode(',',$row['additionalGroups']);
					$groups[] = $row['ID_GROUP'];

					foreach ($groups as $ID_GROUP){
						$query = "SELECT * FROM `{$forum_prefix}membergroups` WHERE `ID_GROUP` = '{$ID_GROUP}' LIMIT 1";
						$result = $roster->db->query ( $query );
						$row = $roster->db->fetch ( $result );
						$rosterGroup[] = $row['rosterGroup'];
					}
					rsort($rosterGroup);

					//Return the highest group.
					$this->allow_login = $rosterGroup[0];
					$this->message = "Authentication successful at " . $this->translateLevel($this->allow_login) ." user level. \n";

				}else{
					$this->message = "Invalid password. Please check your credentials.";
					$this->allow_login = 0;
				}
			}
			else{//User not found, die out.
				$this->message = "Invalid user name. Please check your credentials.";
				$this->allow_login = 0;

			}
			echo $this->message;
			if ($this->allow_login == 0){die();}
		}
		elseif(eregi('uniuploader',$_SERVER['HTTP_USER_AGENT'])){
			//Using uniuploader but username and/or password were not specified.
			$message = 'You must use your forum credentials to be able to use UniUploader.
Please visit '.$roster->config['website_address'].' to register on the forum.';
			die($message);
		}
		elseif( isset($_COOKIE[$this->getCookieName()]) ){
			$this->checkCookie();
		}
		else
		{
			$this->allow_login = 0;
			$this->message = '<span style="font-size:10px;color:red;">Not logged in</span><br />';
		}
	}

	function checkPass( $user, $pass){
		//
	}
	function checkCookie(){
		global $roster;

		$cookiename = $this->getCookieName();
		if (isset($_COOKIE[$cookiename])){
			$serialized = $_COOKIE[$cookiename];
		}else{
			$serialized = '';
		}
		list ($c_userid, $c_passwd) = unserialize(stripslashes($serialized));

		//sql queries here to read the members table for userid $userid
		$query = "SELECT * FROM `{$roster->db->prefix}addon_config` WHERE `addon_id` = '{$roster->addon_data['smfsync']['addon_id']}' AND `config_name` = 'forum_prefix' LIMIT 1";
		$result = $roster->db->query ( $query );
		$row = $roster->db->fetch ( $result );
		$forum_prefix = $row['config_value'];

		$query = "SELECT * FROM `{$forum_prefix}members` WHERE `ID_MEMBER` = '{$c_userid}' LIMIT 1";
		$result = $roster->db->query ( $query );
		$row = $roster->db->fetch ( $result );



		if ( ( sha1($row['passwd'].$row['passwordSalt']) ) == $c_passwd) {
				$groups = array();
				$rosterGroup = array();

				$groups = explode(',',$row['additionalGroups']);
				$groups[] = $row['ID_GROUP'];

				foreach ($groups as $ID_GROUP){
					$query = "SELECT * FROM `{$forum_prefix}membergroups` WHERE `ID_GROUP` = '{$ID_GROUP}' LIMIT 1";
					$result = $roster->db->query ( $query );
					$row = $roster->db->fetch ( $result );
					$rosterGroup[] = $row['rosterGroup'];
				}
				rsort($rosterGroup);
				$this->allow_login = $rosterGroup[0];
				$this->message = '<span style="color:green;">Logged in as '.$this->translateLevel($rosterGroup[0]).' <form style="display:inline;" name="roster_logout" action="'.$this->script_filename.'" method="post"><span style="font-size:10px;color:#FFFFFF"><input type="hidden" name="logout" value="1" />[<a href="javascript:document.roster_logout.submit();">Logout</a>]</span></form><br />';

		}else{
			$this->allow_login = 0;
			$this->message = '<span style="color:red;">Not logged in</span><br />';
		}
	}
	function getAuthorized( $access )
	{
		return $this->allow_login >= $access;
	}

	function getMessage()
	{
		return $this->message;
	}


	function getMenuLoginForm()
	{
		return $this->getMessage();
		/*
		global $roster, $addon, $accounts;
		if( $this->allow_login < 1 )
		{
			return '
			<form action="' . $this->action . '" method="post" enctype="multipart/form-data" onsubmit="submitonce(this);" style="margin:0;">
				' . $roster->locale->get_string('acc_uname', 'accounts') . ': <input name="user" class="wowinput128" type="text" size="30" maxlength="30" />&nbsp;&nbsp;
				' . $roster->locale->act['password'] . ': <input name="password" class="wowinput128" type="password" size="30" maxlength="30" />&nbsp;&nbsp;
				<input type="submit" value="Go" />
			</form>' . $this->getMessage();
		}
		else
		{
			return $this->getMessage();
		}*/
	}

	function getLoginForm ($level = 3){
		global $roster;

		$level = $this->translateLevel ($level);
		$return = "";
		$return = "<a href=addons/smfsync/inc/loginForm.php target=frame>Reload</a>";
		$return .= border('sred','start',$level. ' login required');
		$return .= '<iframe name=frame frameborder=0 width=200 height=90 scrolling=no align=top src="'.$roster->tpl->_tpldata['.']['0']['ROSTER_URL'].'addons/smfsync/inc/loginForm.php" ></iframe>';
		$return .= border('sred','end');

		return $return;

	}

	function getLoginForm_Old2 ($level = 3){

		echo border('sred','start',$this->translateLevel($level).' login required.');
		echo ssi_login('http://localhost/roster20/');
		echo border('sred','end');


	}

	function getLoginForm_Old1 ( $level = 3){
		global $roster;

		$level = $this->translateLevel ($level);

		$forumPath = $roster->db->fetch($roster->db->query("SELECT * FROM `{$roster->db->prefix}addon_config` WHERE `addon_id` = '{$roster->addon_data['smfsync']['addon_id']}' AND `config_name` = 'forum_path' LIMIT 1"));
		return '
			<!--Begin Login Box -->
			<form action="'.$roster->config['website_address'].DIR_SEP.$forumPath['config_value'].'index.php?action=login2" method="post" accept-charset="UTF-8">
			'.border('sred','start',$level.' login required').'
			 <table class=bodyline" cellspacing="0" cellpadding"0" width="100%">
			  <tr>
			   <td class="membersRowRight1">'.$roster->locale->act['username'].':
			    <input name="user" class="wowinput192" type="text" size="30" maxlength="30" /></td>
			  </tr>
			  <tr>
			   <td class="membersRowRight1">'.$roster->locale->act['password'].':
			    <input name="passwrd" class="wowinput192" type="password" size="30" maxlength="30" /></td>
			  </tr>
			  <tr>
			   <td class="membersRowRight2" valign="bottom">
			   <input type="hidden" name="cookielength" value="-1" />
			   <div align="right"><input type="submit" value="Go" /></div></td>
			  </tr>
			 </table>
			'.border('sred','end').'
			</form>
			<!--End Login Box -->

		';

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

	function getCookieName(){
		global $roster;

		$query = "SELECT * FROM `{$roster->db->prefix}addon_config` WHERE `addon_id` = '{$roster->addon_data['smfsync']['addon_id']}' AND `config_name` = 'forum_path' LIMIT 1";
		$result = $roster->db->query ( $query );
		$row = $roster->db->fetch ( $result );
		$forum_path = $row['config_value'];

		include (ROSTER_BASE.'../'.$forum_path.'Settings.php');
		return $cookiename;
	}

	function translateLevel($level = 3){
		switch ($level) {
			case 3:
				$level = "Admin";
				break;
			case 2:
				$level = "Officer";
				break;
			case 1:
				$level = "Guild";
				break;
			case 0:
				$level = "Public";
				break;
		}
		return $level;
	}
}