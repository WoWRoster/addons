<?php
/******************************
 * WoWRoster.net  phpBB Login
 * @package    phpBB_login
 * @subpackage login.php

/***************************************************************************
 *   copyright            : David Weand
 *   email                : dweand@vt.edu
 *   derived  from        : login.php (C) 2002-2006 The phpBB Group
 *
 *	This code should perform the login and authentication of the user using
 *	the phpBB username and password information, supporting phpBB session
 *	management and cookie features.
 *
 *	Some links that contain information about this procedure:
 *		http://www.phpbb.com/kb/article.php?article_id=143
 *
 ***************************************************************************/


if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

define('ROSTERLOGIN_ADMIN',3);

//	This variable needs to point to the absolute path of the phpBB installation
$phpbb_root_path = "/usr/www/geekgirlie/mediocrityinmotion.com/www/forum/";

class RosterLogin
{
	var $allow_login;
	var $message;
	var $action;
	var $levels = array();

	var $database;
	var $SID;
	var $board_config;
	var $login_levels = array();
	
	var $roster_phpbb_admin_groups;
	var $roster_phpbb_officer_groups;
	var $roster_phpbb_guild_groups;

	/**
	 * Constructor for Roster Login class
	 * Accepts an action for the form
	 * And an array of additional fields
	 *
	 * @param string $script_filename
	 * @param array $fields
	 * @return RosterLogin
	 */
	function RosterLogin($script_filename='' )
	{
		global $roster;

		$this->setAction($script_filename);
		$this->allow_login = 0;
		$this->message = '<span style="font-size:10px;color:red;">Not logged in</span><br />';

		$query = "SELECT `account_id`, `name` FROM `".$roster->db->table('account')."`;";
		$result = $roster->db->query($query);

		if( !$result )
		{
			die_quietly($roster->db->error, 'Roster Auth', __FILE__,__LINE__,$query);
		}

		$this->levels[0] = 'Public';
		$this->login_levels['Public'] = 0;
		while( $row = $roster->db->fetch($result) )
		{
			$this->levels[$row['account_id']] = $row['name'];
			$this->login_levels[$row['name']] = $row['account_id'];
		}

		$addon_data = getaddon('phpBB_login');
		$this->roster_phpbb_admin_groups = $addon_data['config']['phpbb_admin_groups'];
		$this->roster_phpbb_officer_groups = $addon_data['config']['phpbb_officer_groups'];
		$this->roster_phpbb_guild_groups = $addon_data['config']['phpbb_guild_groups'];

		$this->checkLogin();
		$this->checkLogout();
	}

	function checkLogin()
	{
		global $roster, $phpbb_root_path;
		
		// Make phpBB think that we are valid
		if (! defined('IN_PHPBB') ) {
			define('IN_PHPBB', true);
		}
		// Allow login even if the phpBB board is shut down
		if (! defined('IN_LOGIN') ) {
			define('IN_LOGIN', true);
		}
		
		include($phpbb_root_path . 'extension.inc');
		$board_config = array();
		$userdata = array();
		$dss_seeded = false;
		
		//Get the database config information
		include($phpbb_root_path . 'config.'.$phpEx);
		include($phpbb_root_path . 'includes/db.'.$phpEx);

		// Make the database connection.
		unset($this->database);
		if (! $this->database = new sql_db($dbhost, $dbuser, $dbpasswd, $dbname, false) )
			die_quietly("Could not connect to the database", 'Roster Auth', __FILE__,__LINE__);
		unset($this->database->password);
		unset($dbpasswd);
		unset($dbuser);
		unset($dbhost);
		
		//Get the phpBB Constants
		include($phpbb_root_path . 'includes/constants.'.$phpEx);
		
		//Set the phpBB board configuration information
		$sql = "SELECT * FROM " . CONFIG_TABLE;
		if( !($result = $this->database->sql_query($sql) ))
			die_quietly("Could not query PHPBB Config information", 'Roster Auth', __FILE__,__LINE__,$sql);
		while ( $row = $this->database->sql_fetchrow($result) )
			$board_config[$row['config_name']] = $row['config_value'];
		$this->board_config = $board_config;
		
		// Start the session management
		$client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR') );
		$user_ip = $this->encode_ip($client_ip);
		
		$userdata = $this->session_pagestart($user_ip,PAGE_INDEX);
		// End session management
		
		if ($userdata['session_logged_in']) {	//they are logged in successfully
			$sql = "SELECT ug.group_id, group_name FROM ". USER_GROUP_TABLE ." as ug, ". GROUPS_TABLE ." as g, ". USERS_TABLE ." as u WHERE ug.group_id = g.group_id AND ug.user_id = u.user_id AND u.user_id = " . $userdata['user_id'];
			if ( !($result = $this->database->sql_query($sql) ) )
				die_quietly("Could not obtain user group information from PHPBB", 'Roster Auth', __FILE__,__LINE__,$sql);
			while ($res = $this->database->sql_fetchrow($result))
				$userdata['user_groups_of'][] = $res;
		
			$admin_groups = explode(",",strtolower($this->roster_phpbb_admin_groups));
			$officer_groups = explode(",",strtolower($this->roster_phpbb_officer_groups));
			$guild_groups = explode(",",strtolower($this->roster_phpbb_guild_groups));
			for ($i=0;$i<count($guild_groups);$i++)
				for ($j=0;$j<count($userdata['user_groups_of']);$j++)
					if (trim($guild_groups[$i]) == trim(strtolower($userdata['user_groups_of'][$j]['group_name'])))
					{
						$this->allow_login = $this->login_levels['Guild'];
						$this->message = '<span style="font-size:10px;color:red;">Logged in as Guild User.</span><br />' . "\n";
					}
			for ($i=0;$i<count($officer_groups);$i++)
				for ($j=0;$j<count($userdata['user_groups_of']);$j++)
					if (trim($officer_groups[$i]) == trim(strtolower($userdata['user_groups_of'][$j]['group_name'])))
					{
						$this->allow_login = $this->login_levels['Officer'];
						$this->message = '<span style="font-size:10px;color:red;">Logged in as Guild Officer.</span><br />' . "\n";
					}
			for ($i=0;$i<count($admin_groups);$i++)
				for ($j=0;$j<count($userdata['user_groups_of']);$j++)
					if (trim($admin_groups[$i]) == trim(strtolower($userdata['user_groups_of'][$j]['group_name'])))
					{
						$this->allow_login = $this->login_levels['Admin'];
						$this->message = '<span style="font-size:10px;color:red;">Logged in as Administrator.</span><br />' . "\n";
					}
		}
		else {
			$username = isset($_POST['username']) ? $this->phpbb_clean_username($_POST['username']) : '';
			$password = isset($_POST['password']) ? $_POST['password'] : '';
			$sql = "SELECT *
				FROM " . USERS_TABLE . "
				WHERE username = '" . str_replace("\\'", "''", $username) . "'";
			if ( !($result = $this->database->sql_query($sql)) )
				die_quietly("Could not obtain user data information from PHPBB", 'Roster Auth', __FILE__,__LINE__,$sql);
			if( $row = $this->database->sql_fetchrow($result) ) {
				if( md5($password) == $row['user_password'] && $row['user_active'] )
				{
					$autologin = ( isset($_POST['autologin']) ) ? TRUE : 0;
					$userdata = $this->session_begin($row['user_id'], $user_ip, PAGE_INDEX, FALSE, $autologin);
					
					$sql = "SELECT ug.group_id, group_name FROM ". USER_GROUP_TABLE ." as ug, ". GROUPS_TABLE ." as g, ". USERS_TABLE ." as u WHERE ug.group_id = g.group_id AND ug.user_id = u.user_id AND u.user_id = " . $userdata['user_id'];
					if ( !($result = $this->database->sql_query($sql)) )
						die_quietly("Could not obtain user group information from PHPBB", 'Roster Auth', __FILE__,__LINE__,$sql);
					while ($res = $this->database->sql_fetchrow($result) )
						$userdata['user_groups_of'][] = $res;
				
					$admin_groups = explode(",",strtolower($this->roster_phpbb_admin_groups));
					$officer_groups = explode(",",strtolower($this->roster_phpbb_officer_groups));
					$guild_groups = explode(",",strtolower($this->roster_phpbb_guild_groups));
					for ($i=0;$i<count($guild_groups);$i++)
						for ($j=0;$j<count($userdata['user_groups_of']);$j++)
							if (trim($guild_groups[$i]) == trim(strtolower($userdata['user_groups_of'][$j]['group_name'])))
							{
								$this->allow_login = $this->login_levels['Guild'];
								$this->message = '<span style="font-size:10px;color:red;">Logged in as Guild User.</span><br />' . "\n";
							}
					for ($i=0;$i<count($officer_groups);$i++)
						for ($j=0;$j<count($userdata['user_groups_of']);$j++)
							if (trim($officer_groups[$i]) == trim(strtolower($userdata['user_groups_of'][$j]['group_name'])))
							{
								$this->allow_login = $this->login_levels['Officer'];
								$this->message = '<span style="font-size:10px;color:red;">Logged in as Guild Officer.</span><br />' . "\n";
							}
					for ($i=0;$i<count($admin_groups);$i++)
						for ($j=0;$j<count($userdata['user_groups_of']);$j++)
							if (trim($admin_groups[$i]) == trim(strtolower($userdata['user_groups_of'][$j]['group_name'])))
							{
								$this->allow_login = $this->login_levels['Admin'];
								$this->message = '<span style="font-size:10px;color:red;">Logged in as Administrator.</span><br />' . "\n";
							}
				}
			}
		}
	}

	function checkLogout() {
	}

	function getAuthorized( $access )
	{
		return $this->allow_login >= $access;
	}
	
	function getMessage()
	{
		return $this->message;
	}

	function getLoginForm( $level = 3, $formTags = 1, $submitButton = 1 )
	{
		global $roster;

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
		$border_color = "swhite";
		if ($level == 3) $border_color = "sred";
		if ($level == 2) $border_color = "syellow";
		if ($level == 1) $border_color = "sgreen";

		$retstr= '
			<!-- Begin Password Input Box -->';
		if ($formTags) {
			$retstr .= '
			<form action="'.$this->action.'" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">';
		}

		$retstr .= border($border_color,'start',$log_word .' '. $roster->locale->act['auth_req']).'
			  <table class="bodyline" cellspacing="0" cellpadding="0" width="100%">
			    <tr>
			      <td class="membersRowRight1">'. $roster->locale->get_string('username','phpBB_login') .':<br />
			        <input name="username" class="wowinput192" type="text" size="30" maxlength="30" /></td>
			    </tr>
			    <tr>
			      <td class="membersRowRight1">'.$roster->locale->act['password'].':<br />
			        <input name="password" class="wowinput192" type="password" size="30" maxlength="30" /></td>
			    </tr>';

		if ($submitButton) {
			$retstr .= '
			    <tr>
			      <td class="membersRowRight2" valign="bottom">
			        <div align="right"><input type="submit" value="Go" /></div></td>
			    </tr>';
		}

		$retstr .= '
			  </table>
			'.border($border_color,'end');
		if ($formTags) {
			$retstr .='
			</form>';
		}

		$retstr .= '
			<!-- End Password Input Box -->';

		return $retstr;
	}

	function getMenuLoginForm()
	{
		global $roster;
		
		if( !$this->allow_login )
		{
			return '
			<form action="' . $this->action . '" method="post" enctype="multipart/form-data" onsubmit="submitonce(this);" style="margin:0;">
			<table border="0" cellspacing="1" cellpadding="0" style="display: inline;">
			  <tr><td>'. $roster->locale->get_string('username','phpBB_login') .': <input name="username" class="wowinput128" type="text" size="30" maxlength="30" /></td>
			      <td rowspan="2"><input type="submit" value="Go" /> ' . $this->getMessage() . '</td></tr>
			  <tr><td>'. $roster->locale->act['password'] .': <input name="password" class="wowinput128" type="password" size="30" maxlength="30" /></td></tr>
			</table></form>';
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
			$query = "SELECT `account_id`, `name` FROM `" . $roster->db->table('account') . "`;";
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

	////////////////////////////////////////////////////////////////////////////
	// Below are files copied from the phpBB code
	// but modified slightly for my purposes.
	// Specifically, did not want to use all their db calls and also
	// I wanted to prevent the users from updating the "last visit" field
	// since they didn't actually visit the forum
	////////////////////////////////////////////////////////////////////////////
	
	
	//
	// Checks for a given user session, tidies session table and updates user
	// sessions at each page refresh
	//
	function session_pagestart($user_ip, $thispage_id)
	{
		$board_config = $this->board_config;
		
		$cookiename = $board_config['cookie_name'];
		$cookiepath = $board_config['cookie_path'];
		$cookiedomain = $board_config['cookie_domain'];
		$cookiesecure = $board_config['cookie_secure'];
		$current_time = time();
		
		if ( isset($_COOKIE[$cookiename . '_sid']) || isset($_COOKIE[$cookiename . '_data']) )
		{
			$sessiondata = isset( $_COOKIE[$cookiename . '_data'] ) ? unserialize(stripslashes($_COOKIE[$cookiename . '_data'])) : array();
			$session_id = isset( $_COOKIE[$cookiename . '_sid'] ) ? $_COOKIE[$cookiename . '_sid'] : '';
			$sessionmethod = SESSION_METHOD_COOKIE;
		}
		else
		{
			$sessiondata = array();
			$session_id = ( isset($_GET['sid']) ) ? $_GET['sid'] : '';
			$sessionmethod = SESSION_METHOD_GET;
		}
		if (!preg_match('/^[A-Za-z0-9]*$/', $session_id))
			$session_id = '';
		// Does a session exist?
		//
		if ( !empty($session_id) )
		{
			//
			// session_id exists so go ahead and attempt to grab all
			// data in preparation
			//
			$sql = "SELECT u.*, s.*
				FROM " . SESSIONS_TABLE . " s, " . USERS_TABLE . " u
				WHERE s.session_id = '$session_id'
					AND u.user_id = s.session_user_id";
			if ( !($result = $this->database->sql_query($sql)) )
				die("Error doing DB query userdata row fetch at line ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
		
			$userdata = $this->database->sql_fetchrow($result);
		
			//
			// Did the session exist in the DB?
			//
			if ( isset($userdata['user_id']) )
			{
				//
				// Do not check IP assuming equivalence, if IPv4 we'll check only first 24
				// bits ... I've been told (by vHiker) this should alleviate problems with 
				// load balanced et al proxies while retaining some reliance on IP security.
				//
				$ip_check_s = substr($userdata['session_ip'], 0, 6);
				$ip_check_u = substr($user_ip, 0, 6);
		
				if ($ip_check_s == $ip_check_u)
				{
					$this->SID = ($sessionmethod == SESSION_METHOD_GET || defined('IN_ADMIN')) ? 'sid=' . $session_id : '';
		
					//
					// Only update session DB a minute or so after last update
					//
					if ( $current_time - $userdata['session_time'] > 60 )
					{
						// A little trick to reset session_admin on session re-usage
						$update_admin = (!defined('IN_ADMIN') && $current_time - $userdata['session_time'] > ($board_config['session_length']+60)) ? ', session_admin = 0' : '';
		
						$sql = "UPDATE " . SESSIONS_TABLE . " 
							SET session_time = $current_time, session_page = $thispage_id$update_admin
							WHERE session_id = '" . $userdata['session_id'] . "'";
						if ( !$this->database->sql_query($sql) )
							die("Error updating sessions table at line ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
		
						$this->session_clean($userdata['session_id']);
		
						setcookie($cookiename . '_data', serialize($sessiondata), $current_time + 31536000, $cookiepath, $cookiedomain, $cookiesecure);
						setcookie($cookiename . '_sid', $session_id, 0, $cookiepath, $cookiedomain, $cookiesecure);
					}
					return $userdata;
				}
			}
		}
		
		//
		// If we reach here then no (valid) session exists. So we'll create a new one,
		// using the cookie user_id if available to pull basic user prefs.
		//
		$user_id = ( isset($sessiondata['userid']) ) ? intval($sessiondata['userid']) : ANONYMOUS;	
		if ( !($userdata = $this->session_begin($user_id, $user_ip, $thispage_id, TRUE)) )
			die("Error creating user session at line ". __LINE__ ." in file ". __FILE__);
		
		return $userdata;
	}
	//
	// Adds/updates a new session to the database for the given userid.
	// Returns the new session ID on success.
	//
	function session_begin($user_id, $user_ip, $page_id, $auto_create = 0, $enable_autologin = 0, $admin = 0)
	{
		$board_config = $this->board_config;
	
		$cookiename = $board_config['cookie_name'];
		$cookiepath = $board_config['cookie_path'];
		$cookiedomain = $board_config['cookie_domain'];
		$cookiesecure = $board_config['cookie_secure'];
	
		if ( isset($_COOKIE[$cookiename . '_sid']) || isset($_COOKIE[$cookiename . '_data']) )
		{
			$session_id = isset($_COOKIE[$cookiename . '_sid']) ? $_COOKIE[$cookiename . '_sid'] : '';
			$sessiondata = isset($_COOKIE[$cookiename . '_data']) ? unserialize(stripslashes($_COOKIE[$cookiename . '_data'])) : array();
			$sessionmethod = SESSION_METHOD_COOKIE;
		}
		else
		{
			$sessiondata = array();
			$session_id = ( isset($_GET['sid']) ) ? $_GET['sid'] : '';
			$sessionmethod = SESSION_METHOD_GET;
		}
	
		//
		if (!preg_match('/^[A-Za-z0-9]*$/', $session_id)) 
			$session_id = '';
	
		$page_id = (int) $page_id;
	
		$last_visit = 0;
		$current_time = time();
	
		//
		// Are auto-logins allowed?
		// If allow_autologin is not set or is true then they are
		// (same behaviour as old 2.0.x session code)
		//
		if (isset($board_config['allow_autologin']) && !$board_config['allow_autologin'])
		{
			$enable_autologin = $sessiondata['autologinid'] = false;
		}
	
		// 
		// First off attempt to join with the autologin value if we have one
		// If not, just use the user_id value
		//
		$userdata = array();
	
		if ($user_id != ANONYMOUS)
		{
			if (isset($sessiondata['autologinid']) && (string) $sessiondata['autologinid'] != '' && $user_id)
			{
				$sql = 'SELECT u.* 
					FROM ' . USERS_TABLE . ' u, ' . SESSIONS_KEYS_TABLE . ' k
					WHERE u.user_id = ' . (int) $user_id . "
						AND u.user_active = 1
						AND k.user_id = u.user_id
						AND k.key_id = '" . md5($sessiondata['autologinid']) . "'";
				if ( !($result = $this->database->sql_query($sql) ) )
					die("Error doing DB query userdata row fetch at line ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
	
				$userdata = $this->database->sql_fetchrow($result);
			
				$enable_autologin = $login = 1;
			}
			else if (!$auto_create)
			{
				$sessiondata['autologinid'] = '';
				$sessiondata['userid'] = $user_id;
	
				$sql = 'SELECT *
					FROM ' . USERS_TABLE . '
					WHERE user_id = ' . (int) $user_id . '
						AND user_active = 1';
				if ( !($result = $this->database->sql_query($sql) ) )
					die("Error doing DB query userdata row fetch at line ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
	
				$userdata = $this->database->sql_fetchrow($result);
	
				$login = 1;
			}
		}
	
		//
		// At this point either $userdata should be populated or
		// one of the below is true
		// * Key didn't match one in the DB
		// * User does not exist
		// * User is inactive
		//
		if (!sizeof($userdata) || !is_array($userdata) || !$userdata)
		{
			$sessiondata['autologinid'] = '';
			$sessiondata['userid'] = $user_id = ANONYMOUS;
			$enable_autologin = $login = 0;
	
			$sql = 'SELECT *
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . (int) $user_id;
			if ( !($result = $this->database->sql_query($sql) ) )
				die("Error doing DB query userdata row fetch at line ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
	
			$userdata = $this->database->sql_fetchrow($result);
		}
	
	
		//
		// Initial ban check against user id, IP and email address
		//
		preg_match('/(..)(..)(..)(..)/', $user_ip, $user_ip_parts);
	
		$sql = "SELECT ban_ip, ban_userid, ban_email 
			FROM " . BANLIST_TABLE . " 
			WHERE ban_ip IN ('" . $user_ip_parts[1] . $user_ip_parts[2] . $user_ip_parts[3] . $user_ip_parts[4] . "', '" . $user_ip_parts[1] . $user_ip_parts[2] . $user_ip_parts[3] . "ff', '" . $user_ip_parts[1] . $user_ip_parts[2] . "ffff', '" . $user_ip_parts[1] . "ffffff')
				OR ban_userid = $user_id";
		if ( $user_id != ANONYMOUS )
		{
			$sql .= " OR ban_email LIKE '" . str_replace("\'", "''", $userdata['user_email']) . "' 
				OR ban_email LIKE '" . substr(str_replace("\'", "''", $userdata['user_email']), strpos(str_replace("\'", "''", $userdata['user_email']), "@")) . "'";
		}
		if ( !($result = $this->database->sql_query($sql) ) )
			die("Could not obtain ban information at line ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
	
		if ( $ban_info = $this->database->sql_fetchrow($result) )
		{
			if ( $ban_info['ban_ip'] || $ban_info['ban_userid'] || $ban_info['ban_email'] )
				die("You have been banned.  You are not allowed to log in.");
		}
	
		//
		// Create or update the session
		//
		$sql = "UPDATE " . SESSIONS_TABLE . "
			SET session_user_id = $user_id, session_start = $current_time, session_time = $current_time, session_page = $page_id, session_logged_in = $login, session_admin = $admin
			WHERE session_id = '" . $session_id . "' 
				AND session_ip = '$user_ip'";
		if ( !$this->database->sql_query($sql) || !$this->database->sql_affectedrows() )
		{
			$session_id = md5($this->dss_rand());
	
			$sql = "INSERT INTO " . SESSIONS_TABLE . "
				(session_id, session_user_id, session_start, session_time, session_ip, session_page, session_logged_in, session_admin)
				VALUES ('$session_id', $user_id, $current_time, $current_time, '$user_ip', $page_id, $login, $admin)";
			if ( !$this->database->sql_query($sql) )
				die("Error creating new session ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
		}
	
		if ( $user_id != ANONYMOUS )
		{
			//This should be the last time they would have visited the forums,
			//since we DO NOT update the usertable.user_session_time variable
			$last_visit = $userdata['user_session_time']; 
	
			if (!$admin && $last_visit > 0)
			{
				$sql = "UPDATE " . USERS_TABLE . " 
					SET user_lastvisit = $last_visit
					WHERE user_id = $user_id";
				if ( !$this->database->sql_query($sql) )
					die("Error updating last visit time ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
			}
	
			//
			// Regenerate the auto-login key
			//
			if ($enable_autologin)
			{
				$auto_login_key = $this->dss_rand() . $this->dss_rand();
				
				if (isset($sessiondata['autologinid']) && (string) $sessiondata['autologinid'] != '')
				{
					$sql = 'UPDATE ' . SESSIONS_KEYS_TABLE . "
						SET last_ip = '$user_ip', key_id = '" . md5($auto_login_key) . "', last_login = $current_time
						WHERE key_id = '" . md5($sessiondata['autologinid']) . "'";
				}
				else
				{
					$sql = 'INSERT INTO ' . SESSIONS_KEYS_TABLE . "(key_id, user_id, last_ip, last_login)
						VALUES ('" . md5($auto_login_key) . "', $user_id, '$user_ip', $current_time)";
				}
	
				if ( !$this->database->sql_query($sql) )
					die("Error updating session key ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
				
				$sessiondata['autologinid'] = $auto_login_key;
				unset($auto_login_key);
			}
			else
			{
				$sessiondata['autologinid'] = '';
			}
	
	//		$sessiondata['autologinid'] = (!$admin) ? (( $enable_autologin && $sessionmethod == SESSION_METHOD_COOKIE ) ? $auto_login_key : '') : $sessiondata['autologinid'];
			$sessiondata['userid'] = $user_id;
		}
	
		$userdata['session_id'] = $session_id;
		$userdata['session_ip'] = $user_ip;
		$userdata['session_user_id'] = $user_id;
		$userdata['session_logged_in'] = $login;
		$userdata['session_page'] = $page_id;
		$userdata['session_start'] = $current_time;
		$userdata['session_time'] = $current_time;
		$userdata['session_admin'] = $admin;
		$userdata['session_key'] = $sessiondata['autologinid'];
	
		setcookie($cookiename . '_data', serialize($sessiondata), $current_time + 31536000, $cookiepath, $cookiedomain, $cookiesecure);
		setcookie($cookiename . '_sid', $session_id, 0, $cookiepath, $cookiedomain, $cookiesecure);
	
		$this->SID = 'sid=' . $session_id;
	
		return $userdata;
	}
	/**
	* Removes expired sessions and auto-login keys from the database
	*/
	function session_clean($session_id)
	{
		$board_config = $this->board_config;
	
		//
		// Delete expired sessions
		//
		$sql = 'DELETE FROM ' . SESSIONS_TABLE . ' 
			WHERE session_time < ' . (time() - (int) $board_config['session_length']) . " 
				AND session_id <> '$session_id'";
		if ( !$this->database->sql_query($sql) )
			die("Error clearing sessions table at line ". __LINE__ ." in file ". __FILE__ ." using SQL $sql");
	
		//
		// Delete expired auto-login keys
		// If max_autologin_time is not set then keys will never be deleted
		// (same behaviour as old 2.0.x session code)
		//
		if (!empty($board_config['max_autologin_time']) && $board_config['max_autologin_time'] > 0)
		{
			$sql = 'DELETE FROM ' . SESSIONS_KEYS_TABLE . '
				WHERE last_login < ' . (time() - (86400 * (int) $board_config['max_autologin_time']));
			$this->database->sql_query($sql);
		}
	
		return true;
	}

	function encode_ip($dotquad_ip)
	{
		$ip_sep = explode('.', $dotquad_ip);
		return sprintf('%02x%02x%02x%02x', $ip_sep[0], $ip_sep[1], $ip_sep[2], $ip_sep[3]);
	}
	
	function decode_ip($int_ip)
	{
		$hexipbang = explode('.', chunk_split($int_ip, 2, '.'));
		return hexdec($hexipbang[0]). '.' . hexdec($hexipbang[1]) . '.' . hexdec($hexipbang[2]) . '.' . hexdec($hexipbang[3]);
	}

	function dss_rand()
	{
		$val = $this->board_config['rand_seed'] . microtime();
		$val = md5($val);
		$this->board_config['rand_seed'] = md5($this->board_config['rand_seed'] . $val . 'a');
	   
		return substr($val, 16);
	}

	function phpbb_clean_username($username)
	{
		$username = substr(htmlspecialchars(str_replace("\'", "'", trim($username))), 0, 25);
		$username = $this->phpbb_rtrim($username, "\\");
		$username = str_replace("'", "\'", $username);
	
		return $username;
	}

	// added at phpBB 2.0.12 to fix a bug in PHP 4.3.10 (only supporting charlist in php >= 4.1.0)
	function phpbb_rtrim($str, $charlist = false)
	{
		if ($charlist === false)
		{
			return rtrim($str);
		}
		
		$php_version = explode('.', PHP_VERSION);
	
		// php version < 4.1.0
		if ((int) $php_version[0] < 4 || ((int) $php_version[0] == 4 && (int) $php_version[1] < 1))
		{
			while ($str{strlen($str)-1} == $charlist)
			{
				$str = substr($str, 0, strlen($str)-1);
			}
		}
		else
		{
			$str = rtrim($str, $charlist);
		}
	
		return $str;
	}
}

?>