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
				$this->message = border('sgold','start');
				$this->message .= '<span style="font-size:10px;color:green;">Logged in at level '.$rosterGroup[0].'</span><br />';
				$this->message .= border('sgold','end');

		}else{
			$this->allow_login = 0;
			$this->message = '<span style="font-size:10px;color:red;">Not logged in</span><br />';
		}
	}

	function getAuthorized()
	{
		return $this->allow_login;
	}

	function getMessage()
	{
		return $this->message;
	}

	function getLoginForm( $level = 3 )
	{
		/*global $roster;
		//$a =  sha1(strtolower($name) . $pass);
		$query = "SELECT * FROM `".$roster->db->table('account')."` WHERE `account_id` = '".$level."';";
		$result = $roster->db->query($query);

		if( !$result )
		{
			die_quietly($roster->db->error, 'Roster Auth', __FILE__,__LINE__,$query);
		}

		if( $roster->db->num_rows($result) != 1 )
		{
			die_quietly('Invalid required login level specified', 'Roster Auth');
		}

		$row = $roster->db->fetch($result);
		$roster->db->free_result($result);

		$log_word = $row['name'];

		return '
			<!-- Begin Password Input Box -->
			<form action="'.$this->script_filename.'" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">
			'.border('sred','start',$log_word .' '. $roster->locale->act['auth_req']).'
			  <table class="bodyline" cellspacing="0" cellpadding="0" width="100%">
			    <tr>
			      <td class="membersRowRight1">'.$roster->locale->act['password'].':<br />
			        <input name="password" class="wowinput192" type="password" size="30" maxlength="30" /></td>
			    </tr>
			    <tr>
			      <td class="membersRowRight2" valign="bottom">
			        <div align="right"><input type="submit" value="Go" /></div></td>
			    </tr>
			  </table>
			'.border('sred','end').'
			</form>
			<!-- End Password Input Box -->';*/
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
		include (ROSTER_BASE.'../forum/Settings.php');
		return $cookiename;
	}
}