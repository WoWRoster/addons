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
 * @subpackage Session Handler
 */

class accountsSession extends accounts
{
	// session idle
	var $max_idle;
	var $no_expire;
	
	// session values
	var $sessid;
	var $sesshost;
	
	var $variables;
	var $codelength = 20;
	
	// system messages
	var $messages = array();

	function accountsSession()
	{
		global $roster, $addon, $accounts;
		
		$this->sessid = session_id();
		
		// set max idle time
        $this->max_idle = (time()+(60*60*$addon['config']['acc_sess_time']));
         
        // set no expire (actually it expires after a really long time)
        $this->no_expire = (time()+(365*24*60*60)); // 1 year
         
        // set session host
        $this->sesshost = ROSTER_BASE;
         
        // preform some session id validation
        if (!$this->isSession($this->sessid))
        {	
         	// start new session
         	$this->sessid = $this->startSession();
        }

        // update current session last action
        $this->updSession($this->sessid);
         	
        // load all session values
        $this->listVals($this->sessid);

        // clear old sessions
        $this->clearSession();
         
	}
	
/**
 * @desc						:	start session
 * @return	$sessid	:	string	:	session id
 */
	
	function startSession()
	{		
		global $roster, $addon, $accounts;
		
		// session id
		if ($this->sessid == '')
		{
			$sessid = $this->genSessid();
		}
		
		// generate sql record of sessions
		$qry  = 'INSERT INTO `' . $accounts->db['session'] . '` ( SID, lastact, agent, IP ) '
				. 'VALUES ("' . $this->sessid . '", ' . time() . ', "' . $_SERVER['HTTP_USER_AGENT'] . '", "' . $_SERVER['REMOTE_ADDR'] . '");';
		
		$roster->db->query($qry);
		
		$cookie_str = $this->variables['user'] . chr(31) . base64_encode($this->variables['pass'] . chr(31) . $this->sessid . chr(31) . $this->no_expire);
		setcookie($addon['config']['acc_cookie_name'], $cookie_str, $this->max_idle, $this->sesshost);
		
		return $this->sessid;
	}
	
/**
 * @desc				:	end current session, destroing all it values
 * @return	:	boolean	:	status
 */
	function endSession()
	{
		global $roster, $accounts;
		// delete session sql record and it's values
		if (isset($this->sessid) && $this->isSession($this->sessid))
		{
			$this->setVal(array(
				'uid' => 0, 
				'user' => '', 
				'pass' => '', 
				'groupID' => 0,
				'isLoggedIn' => false
				));
		}
		
		// unset session values within the class
		$this->variables = null;
		
		return true;
	}
	
/**
 * @desc							:	update session last action
 * @param 	$sessid		:	string	:	session id
 * @param	$noexpire	:	int		:	is this not expire session
 * @return				:	boolean	:	status
 */
	function updSession($sessid=0, $noexpire=0)
	{
		global $roster, $accounts;
		$sessid = $sessid ? $sessid : $this->sessid;

		// get the referer page
		if (isset($_SERVER['HTTP_REFERER']))
		{
			$ref_dirt = explode('http://', $_SERVER['HTTP_REFERER']);
			$ref_page = array_pop($ref_dirt);
		}
		else
		{
			$ref_page = $_SERVER['SERVER_NAME'];
		}
		

		// get the current page
        $cur_page = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		// check if this is no expire session
		if ($noexpire)
		{
			$time = $this->no_expire;
		} 
		else 
		{
			$time = time();
		}
		
		$qry = 'UPDATE `' . $accounts->db['session'] . '` SET `_referer` = "' . $ref_page . '", `lastact` = "' . $time . '", `_current` = "' . $cur_page . '" WHERE `SID` = "' . $sessid . '";';
		
		// update last action
		return $roster->db->query($qry);
	}

/**
 * @desc						:	check if session exists
 * @param 	$sessid	:	string	:	session id
 * @return 			:	boolean	:	is session exists
 */
	function isSession($sessid)
	{
		global $roster, $accounts;
		$qry = 'SELECT `SID` FROM `' . $accounts->db['session'] . '` WHERE `SID` = "' . $sessid . '" LIMIT 1;';
		$result = $roster->db->query($qry);
		
		return ($roster->db->num_rows($result) > 0 ? true : false );
	}

/**
 * @desc					:	clear expired sessions
 * @return 		:	boolean	:	status
 */
	function clearSession()
	{
		global $roster, $addon, $accounts;
		$time = time()-(60*60*$addon['config']['acc_sess_time']);
		
		// select expired sessions
		$qry  = 'SELECT `SID` FROM `' . $accounts->db['session'] . '` WHERE '
				. '`lastact` < "' . $time . '" ;';
		
		$result = $roster->db->query($qry);
		
		if ($roster->db->num_rows($result) == 0)
		{
			return true;
		}
		
		while ($row = $roster->db->fetch($result)) 
		{			
			// delete sql record values
			$qry = 'DELETE FROM `' . $accounts->db['session'] . '` WHERE `SID` = "' . $row['SID'] . '";';
			$roster->db->query($qry);
		}
		
		// delete expired sql records
		$qry = 'DELETE FROM `' . $accounts->db['session'] . '` WHERE `lastact` < "' . $time . '";';
		$roster->db->query($qry);
		
		return true;
	}
		
/**
 * @desc						:	generate random unique session id
 * @return	$sessid	:	string	:	session id
 */
	function genSessid()
	{
		global $roster, $accounts;
		
		if (isset($this->sessid))
		{
			$sessid = $this->sessid;
		}
		else
		{
			$sessid = session_id();
		}
		
		return $sessid;
	}

/**
 * @desc								:	set value(s) to session
 * @param	$name	:	string/array	:	value name or array containig the values
 * @param 	$value	:	string			:	value
 * @return 			:	boolean			:	is setting succesful
 */
	function setVal($name, $value=0)
	{
		global $roster, $accounts;
		// if name is not array it is value name, so add a single value
		if (!is_array($name)) 
		{
			return $this->_setVal($name, $value);
		}
		
		// else add a list of values
		foreach ($name as $key => $val)
		{
			if (!$this->_setVal($key, $val))
			{
				return false;
			}
		}
		
		return true;
	}
	
/**
 * @desc						:	set value to session
 * @param	$name	:	string	:	value name
 * @param 	$value	:	string	:	value
 * @return 			:	boolean	:	is setting succesful
 */
	function _setVal($name, $value)
	{
		global $roster, $accounts;
		// escape value
		$value	= addslashes($value);

		// if value doesn't exist add it
		$qry  = 'UPDATE `' . $accounts->db['session'] . '` SET `' . $name . '` = '
				. '"' . $value . '" WHERE `SID` = "' . $this->sessid . '";';
		
		if (!$roster->db->query($qry))
		{
			return false;
		}
		
		// save the value 
		$this->variables[$name] = $value;
		
		return true;
	}
	
/**
 * @desc							:	save this->variables to database
 * @return				:	boolean	:	is array added to database succesfully
 */
	function toDB()
	{
		global $roster, $accounts;
		foreach ($this->variables as $key => $val)
		{
			$this->setVal($key, $val);
		}
		
		return true;
	}
	
/**
 * @desc						:	delete session value
 * @param 	$name	:	string 	:	value name
 * @return 			:	boolean	:	is deleting succesful
 */
	function delVal($name=0)
	{
		global $roster, $accounts;
		
		if (func_num_args() > 1)
		{
			// get all functions arguments
			$args = func_get_args();
			
			// delete list of values
			foreach ($args as $val)
			{
				$qry = 'DELETE `' . $val . '` FROM `' . $accounts->db['session'] . '` WHERE `SID` = "' . $this->sessid . '";';
				
				// delete value from session variables
				unset($this->variables[$val]);
			}

		}
		elseif ($name)
		{
			// delete one value
			$qry = 'DELETE `' . $name . '` FROM `' . $accounts->db['session'] . '` WHERE `SID` = "' . $this->sessid . '";';
			
			// delete value from session variables
			unset($this->variables[$name]);
		}
		else
		{
			// delete all values
			unset($this->variables);
		}
		
		return $roster->db->query($qry);
	}
	
/**
 * @desc					:	clear all values which are not protected(_*)
 * @return		:	boolean	:	is clearing succesfull
 */
	function clearVal()
	{
		global $roster, $accounts;
		$qry = 'DELETE `uid`, `user`, `pass`, `groupID`, FROM `' . $accounts->db['session'] . '` WHERE `SID` = "' . $this->sessid . '";';
		return $roster->db->query($qry);
	}

/**
 * @desc						:	check session value exists
 * @param 	$name	:	string 	:	value name
 * @return 			:	boolean	:	is session value exists
 */
	function isVal($name)
	{
		global $roster, $accounts;
		return $this->variables[$name];
	}
	
/**
 * @desc						:	get session value
 * @param 	$name	:	string	:	variable name
 * @return 			:	unknown	:	variable
 */
	function getVal($name)
	{
		global $roster, $accounts;
		return $this->variables[$name];
	}
	
/**
 * @desc						:	list session values
 * @param 	$sessid	:	string	:	session id
 * @return 			:	boolean	:	status
 */
	function listVals($sessid=0)
	{
		global $roster, $accounts;
		$sessid = $sessid ? $sessid : $this->sessid;

		$qry = 'SELECT * FROM `' . $accounts->db['session'] . '` WHERE `SID` = "' . $sessid . '";';
		$result = $roster->db->query($qry);

		$this->variables = array();
		while ($row = $roster->db->fetch($result, SQL_ASSOC))
		{
			foreach ($row as $variables)
			{
				foreach ($row as $key => $val)
				{
					$this->variables[$key] = $val;
				}
			}
		}
		
		return true;
	}
/**
 * @desc				:	check if this is no expire session
 * @return 	:	boolean	:	is this no expire session
 */
	function isNoExpire()
	{
		global $roster, $addon, $accounts;
		$cookie = $_COOKIE[$addon['config']['acc_cookie_name']];
		$cookie_parts = explode(chr(31), $_COOKIE[$addon['config']['acc_cookie_name']]);		
		$parts = explode('::', $this->variables['noexpire_str']);
		
		if ($_SERVER['REMOTE_ADDR'] == $parts[0] && $cookie == $cookie_parts[3])
		{
			return true;
		}
		
		return false;
	}
	
/**
 * @desc	:	makes current session no expire
 * @note 	:	this work only with cookies available
 */
	function setNoExpire()
	{
		global $roster, $accounts;
		// generate random id, using genSessid function
		$randid = $this->genSessid();
		
		// generate sring by current ip and the random id
		$string = $_SERVER['REMOTE_ADDR'] . '::' . $randid;
		
		// save no expire string
		$this->setVal('noexpire_str', $string);
	}
	
/**
 * @desc						:	count activ sessions
 * @param	$fld	:	string	:	count by field name
 * @param	$last	:	int		:	last action (in seconds)
 * @return			:	int		:	sessions count
 */
	function count($fld=0, $last=600)
	{
		global $roster, $accounts;
		if (!$fld)
		{
			$qry  = 'SELECT `SID` FROM `' . $accounts->db['session'] . '` WHERE `lastact` > "' . ( time() - $last )
					. '" GROUP BY `IP`;';
			
			$result = $roster->db->query($qry);
			
			return $roster->db->num_rows($result);
		}
		
		$qry  = 'SELECT `SID` FROM `' . $accounts->db['session'] . '` '
				. ' WHERE `lastact` > "' . ( time() - $last )
				. '" GROUP BY `IP`;';
		
		$result = $roster->db->query($qry);
		
		return $roster->db->num_rows($result);
	}
	
/**
 * @desc	:	return to page referer
 * 
 */
	function back()
	{
		global $roster, $accounts;
		if ($_SERVER['HTTP_REFERER'])
		{
			header('location: ' . $_SERVER['HTTP_REFERER']);
		}
		
		header('location: http://' . $this->getVal('_referer'));
	}

}
