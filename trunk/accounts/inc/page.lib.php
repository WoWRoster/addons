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
 * @subpackage Page Handler 
 */ 

if ( !defined('ROSTER_INSTALLED') ) 
{ 
    exit('Detected invalid access to this file!'); 
}

class accountsPage extends accounts
{
	var $active = false;
	
	function accountsPage()
	{
		$this->active = true;
	}

	function getPage($page)
	{
		$func = array('accountsPage', $page . 'Page');
		call_user_func($func);
	}

	function registerPage()
	{
		global $roster, $addon, $accounts;

		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

		if (isset($_POST['submit']))
		{
			$accounts->user->register('basic', $_POST['newUser'], $_POST['userPass'], $_POST['confirmPass'], $_POST['fname'], $_POST['lname'], $_POST['groupPass'], $_POST['email']); // the register method
		}
 
		$error = $accounts->user->message; // error message

		//Build the Form
		$form = 'regForm';
		$accounts->form->newForm('post', makelink('util-accounts-register'), $form, 'formClass');
		$accounts->form->addFormText('regText', $roster->locale->act['acc_int']['reg_txt'], 'membersHeader', 'center', $form);
		$accounts->form->addTextBox('text', 'newUser', '', $roster->locale->act['acc_int']['uname'], 'wowinput128', 1, $form);
		$accounts->form->addTextBox('password', 'userPass', '', $roster->locale->act['new_pass'], 'wowinput128', 1, $form);
		$accounts->form->addTextBox('password', 'passConfirm', '', $roster->locale->act['new_pass_confirm'], 'wowinput128', 1, $form);
		$accounts->form->addTextBox('text', 'fname', '', $roster->locale->act['acc_int']['fname'], 'wowinput128', 1, $form);
		$accounts->form->addTextBox('text', 'lname', '', $roster->locale->act['acc_int']['lname'], 'wowinput128', '', $form);
		$accounts->form->addTextBox('text', 'email', '', $roster->locale->act['acc_int']['email'], 'wowinput128', 1, $form);
		$accounts->form->addTextBox('text', 'group', '', $roster->locale->act['acc_int']['group'], 'wowinput128', 1, $form);
		$trayID = $accounts->form->addTray('buttonTray',$form);
			$accounts->form->addResetButton($trayID,'clear',$roster->locale->act['config_reset_button'],$form);
			$accounts->form->addSubmitButton($trayID,'submit',$roster->locale->act['submit'],$form);

		$roster->tpl->assign_block_vars('accounts_register', array(
			'BORDER_START' => border('syellow','start', $roster->locale->act['acc_page']['register']),
			'FORM' => $accounts->form->getTableOfElements_1(1, $form),
			'PASS_LEN' => $addon['config']['acc_pass_length'],
			'BORDER_END' => border('syellow','end'),
			'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
			)
		);

		$roster->tpl->set_filenames(array('accounts_register' => $addon['basename'] . '/register.html'));
		$roster->tpl->display('accounts_register');

		return;
	}

	function activatePage()
	{
    	global $roster, $addon, $accounts;
	
    	$roster->output['show_menu']['acc_menu'] = 1 ;  // Display the button listing

		if (isset($_GET['uid']))
		{
			$uid = $_GET['uid'];
		}
		else
		{
			$uid = $_POST['uid'];
		}
		
		if (isset($_GET['act_key']) && isset($_GET['uid']))
		{ // these two variables are required for activating/updating the account/password
		    $accounts->user->activateAccount($_GET['act_key'], $_GET['uid']); // the activation method 
		}
		elseif (isset($_POST['act_key']) && isset($_POST['uid']))
		{ // these two variables are required for activating/updating the account/password
		    $accounts->user->activateAccount($_GET['act_key'], $_GET['uid']); // the activation method 
		}

		if (isset($_GET['validate']) && isset($_GET['uid']))
		{ // these two variables are required for activating/updating the new e-mail address
		    $accounts->user->validateEMail($_GET['validate'], $_GET['uid']); // the validation method 
	    }

    	//if (isset($_GET['act_key']) && isset($_GET['uid']))
		//{ // these two variables are required for activating/updating the password
	    	//if ($accounts->user->checkActivationPass($_GET['act_key'], $_GET['uid']))
			//{ // the activation/validation method 
		    	//$_SESSION['act_key'] = $_GET['act_key']; // put the activation string into a session or into a hdden field
		    	//$uid = $_GET['uid']; // this id is the key where the record have to be updated with new pass
	    	//}
    	//}
    	if (isset($_POST['Submit']))
		{
	    	if ($accounts->user->activateNewPass($_POST['userPass'], $_POST['confirmPass'], $_SESSION['act_key'], $uid))
			{ // this will change the password
		    	unset($_SESSION['act_key']);
		    	unset($uid); // inserts new password only ones!
	    	}
	    	$accounts->user->info['uname'] = $_POST['user']; // to hold the user name in this screen (new in version > 1.77)
    	}
    	$error = $accounts->user->message;

    	$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

		$roster->tpl->assign_block_vars('accounts_activate', array(
			'ACT_KEY' => isset($_SESSION['act_key']),
			'BORDER_START' => border('sred','start', $roster->locale->act['acc_page']['act_pass']),
			'ACT_PASS' => $roster->locale->act['acc_int']['act_pass'],
			'UNAME' => $accounts->user->info['uname'],
			'FORM_LINK' => makelink('util-accounts-activate'),
			'NEW_PASS' => $roster->locale->act['new_pass'],
			'NEW_PASS_CONF' => $roster->locale->act['new_pass_confirm'],
			'SUBMIT' => $roster->locale->act['submit'],
			'ACCOUNTS' => $roster->locale->act['accounts'],
			'BORDER_END' => border('sred','end'),
			'ERROR_SET' => isset($error),
			'ERROR' => $error,
			'LOGIN_LINK' => makelink('util-accounts-login'),
			'LOGIN' => $roster->locale->act['acc_int']['login'],
			)
		);

		$roster->tpl->set_filenames(array('accounts_activate' => $addon['basename'] . '/activate.html'));
		$roster->tpl->display('accounts_activate');

	return;
	}

	function denyPage($groupID, $level)
	{
    	global $roster, $addon, $accounts;
	
		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing
	
		$roster->tpl->assign_block_vars('accounts_deny', array(
			'BORDER_START' => border('sred','start', $roster->locale->act['acc_page']['no_access']),
			'ACCESS_TXT' => $roster->locale->act['acc_int']['no_access'],
			'INDEX_LINK' => makelink('util-accounts'),
			'INDEX_TXT' => $roster->locale->act['acc_page']['main'],
			'GROUP_ID' => $accounts->user->info['group_id'],
			'REQ_LVL' => $accounts->user->info['level'],
			'BORDER_END' => border('sred','end'),
			)
		);

		$roster->tpl->set_filenames(array('accounts_deny' => $addon['basename'] . '/deny.html'));
		$roster->tpl->display('accounts_deny');

	}

	function lostPage()
	{
    	global $roster, $addon, $accounts;
	
		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing
	
		$renew_password = $accounts->user;

    	if (isset($_POST['Submit']))
		{
	    	$renew_password->forgotPass($_POST['email']);
    	}
    	$error = $renew_password->message;
	
		$roster->tpl->assign_block_vars('accounts_lost', array(
			'BORDER_START' => border('sred','start', $roster->locale->act['acc_int']['forgot']),
			'FORGOT_TXT' => $roster->locale->act['acc_int']['forgot_txt'],
			'FORM_LINK' => makelink('util-accounts-lost'),
			'EMAIL_TXT' => $roster->locale->act['acc_int']['email'],
			'SUBMIT' => $roster->locale->act['submit'],
			'BORDER_END' => border('sred','end'),
			'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
			'LOGIN_LINK' => makelink('util-accounts-login'),
			'LOGIN_TXT' => $roster->locale->act['acc_int']['login'],
			)
		);

		$roster->tpl->set_filenames(array('accounts_lost' => $addon['basename'] . '/lost.html'));
		$roster->tpl->display('accounts_lost');

	}

	function logoutPage()
	{
		global $roster, $addon, $accounts;

		$roster_login = new RosterLogin();
		$roster_login->logOut();
	}

	function loginPage()
	{
    	global $roster, $addon, $accounts;

    	//Get a redirect page if available
    	if(isset($roster->pages[3]))
    	{   	
    		$redirect = $roster->pages[0] . '-' . $roster->pages[1] . '-' . $roster->pages[3];
    		$locale = $roster->locale->act['acc_page'][$roster->pages[3]];
    	}
    	else
    	{
    		$redirect = 'util-accounts-main';
    		$locale = $roster->locale->act['acc_page']['main'];
    	}
 
		// Disallow viewing of the page
		if( !$roster->auth->getAuthorized($addon['config']['acc_min_access'], $redirect) )
		{
			print
			'<span class="title_text">' . $locale . '</span><br />'.
			$roster->auth->getMessage().
			$roster->auth->getLoginForm();
		}
	}

	function charsPage()
	{
		global $roster, $addon, $accounts;
 
		// Disallow viewing of the page
		if( !$roster->auth->getAuthorized($addon['config']['acc_min_access']) )
		{
			print
			'<span class="title_text">' . $roster->locale->act['acc_page']['chars'] . '</span><br />'.
			$roster->auth->getMessage().
			$roster->auth->getLoginForm();
		}
		else
		{
			include_once ('memberslist.php');

		$charlist = new memberslist(array('group_alts'=>-1));
	
			$uid = $accounts->session->getVal('uid');

			$mainQuery =
				'SELECT '.
				'`user_link`.`uid`, '.
				'`user_link`.`member_id`, '.
				'`members`.`member_id`, '.
				'`members`.`name`, '.
				'`members`.`class`, '.
				'`members`.`level`, '.
				'`members`.`zone`, '.
				'`members`.`online`, '.
				'`members`.`last_online`, '.
				"UNIX_TIMESTAMP(`members`.`last_online`) AS 'last_online_stamp', ".
				"DATE_FORMAT(  DATE_ADD(`members`.`last_online`, INTERVAL ".$roster->config['localtimeoffset']." HOUR ), '".$roster->locale->act['timeformat']."' ) AS 'last_online_format', ".
				'`members`.`note`, '.
				'`members`.`guild_title`, '.

				'`guild`.`update_time`, '.

				"IF( `members`.`note` IS NULL OR `members`.`note` = '', 1, 0 ) AS 'nisnull', ".
				'`members`.`officer_note`, '.
				"IF( `members`.`officer_note` IS NULL OR `members`.`officer_note` = '', 1, 0 ) AS 'onisnull', ".
				'`members`.`guild_rank`, '.

				'`players`.`server`, '.
				'`players`.`race`, '.
				'`players`.`sex`, '.
				'`players`.`exp`, '.
				'`players`.`clientLocale`, '.

				'`players`.`lifetimeRankName`, '.
				'`players`.`lifetimeHighestRank`, '.
				"IF( `players`.`lifetimeHighestRank` IS NULL OR `players`.`lifetimeHighestRank` = '0', 1, 0 ) AS 'risnull', ".
				'`players`.`hearth`, '.
				"IF( `players`.`hearth` IS NULL OR `players`.`hearth` = '', 1, 0 ) AS 'hisnull', ".
				"UNIX_TIMESTAMP( `players`.`dateupdatedutc`) AS 'last_update_stamp', ".
				"DATE_FORMAT(  DATE_ADD(`players`.`dateupdatedutc`, INTERVAL ".$roster->config['localtimeoffset']." HOUR ), '".$roster->locale->act['timeformat']."' ) AS 'last_update_format', ".
				"IF( `players`.`dateupdatedutc` IS NULL OR `players`.`dateupdatedutc` = '', 1, 0 ) AS 'luisnull', ".

				'`proftable`.`professions`, '.
				'`talenttable`.`talents` '.

				'FROM `'.$roster->db->table('user_link','accounts').'` AS user_link '.
				'LEFT JOIN `'.$roster->db->table('members').'` AS members ON `user_link`.`member_id` = `members`.`member_id` '.
				'LEFT JOIN `'.$roster->db->table('players').'` AS players ON `members`.`member_id` = `players`.`member_id` '.
				"LEFT JOIN (SELECT `member_id` , GROUP_CONCAT( CONCAT( `skill_name` , '|', `skill_level` ) ORDER BY `skill_order`) AS 'professions' ".
				'FROM `'.$roster->db->table('skills').'` '.
				'GROUP BY `member_id`) AS proftable ON `members`.`member_id` = `proftable`.`member_id` '.

				"LEFT JOIN (SELECT `member_id` , GROUP_CONCAT( CONCAT( `tree` , '|', `pointsspent` , '|', `background` ) ORDER BY `order`) AS 'talents' ".
				'FROM `'.$roster->db->table('talenttree').'` '.
				'GROUP BY `member_id`) AS talenttable ON `members`.`member_id` = `talenttable`.`member_id` '.

				'LEFT JOIN `'.$roster->db->table('guild').'` AS guild ON `members`.`guild_id` = `guild`.`guild_id` '.
				'WHERE `user_link`.`uid` = "'.$uid.'"'.
				'ORDER BY IF(`members`.`member_id` = `user_link`.`member_id`,1,0), ';

			$always_sort = ' `members`.`level` DESC, `members`.`name` ASC';

			$addon = getaddon('memberslist');

			$FIELD['name'] = array (
				'lang_field' => 'name',
				'order'    => array( '`members`.`name` ASC' ),
				'order_d'    => array( '`members`.`name` DESC' ),
				'value' => 'name_value',
				'js_type' => 'ts_string',
				'display' => 3,
			);

			$FIELD['class'] = array (
				'lang_field' => 'class',
				'order'    => array( '`members`.`class` ASC' ),
				'order_d'    => array( '`members`.`class` DESC' ),
				'value' => 'class_value',
				'js_type' => 'ts_string',
				'display' => $addon['config']['member_class'],
			);

			$FIELD['level'] = array (
				'lang_field' => 'level',
				'order_d'    => array( '`members`.`level` ASC' ),
				'value' => 'level_value',
				'js_type' => 'ts_number',
				'display' => $addon['config']['member_level'],
			);

			$FIELD['guild_title'] = array (
				'lang_field' => 'title',
				'order' => array( '`members`.`guild_rank` ASC' ),
				'order_d' => array( '`members`.`guild_rank` DESC' ),
				'js_type' => 'ts_number',
				'jsort' => 'guild_rank',
				'display' => $addon['config']['member_gtitle'],
			);

			$FIELD['lifetimeRankName'] = array (
				'lang_field' => 'currenthonor',
				'order' => array( 'risnull', '`players`.`lifetimeHighestRank` DESC' ),
				'order_d' => array( 'risnull', '`players`.`lifetimeHighestRank` ASC' ),
				'value' => 'honor_value',
				'js_type' => 'ts_number',
				'display' => $addon['config']['member_hrank'],
			);

			$FIELD['professions'] = array (
				'lang_field' => 'professions',
				'value' => 'tradeskill_icons',
				'js_type' => '',
				'display' => $addon['config']['member_prof'],
			);

			$FIELD['hearth'] = array (
				'lang_field' => 'hearthed',
				'order' => array( 'hisnull', 'hearth ASC' ),
				'order_d' => array( 'hisnull', 'hearth DESC' ),
				'js_type' => 'ts_string',
				'display' => $addon['config']['member_hearth'],
			);

			$FIELD['zone'] = array (
				'lang_field' => 'lastzone',
				'order' => array( '`members`.`zone` ASC' ),
				'order_d' => array( '`members`.`zone` DESC' ),
				'js_type' => 'ts_string',
				'display' => $addon['config']['member_zone'],
			);

			$FIELD['last_online'] = array (
				'lang_field' => 'lastonline',
				'order' => array( '`members`.`last_online` DESC' ),
				'order_d' => array( '`members`.`last_online` ASC' ),
				'value' => 'last_online_value',
				'js_type' => 'ts_date',
				'display' => $addon['config']['member_online'],
			);

			$FIELD['last_update_format'] = array (
				'lang_field' => 'lastupdate',
				'order' => array( 'luisnull','`players`.`dateupdatedutc` DESC' ),
				'order_d' => array( 'luisnull','`players`.`dateupdatedutc` ASC' ),
				'jsort' => 'last_update_stamp',
				'js_type' => 'ts_date',
				'display' => $addon['config']['member_update'],
			);

			$FIELD['note'] = array (
				'lang_field' => 'note',
				'order' => array( 'nisnull','`members`.`note` ASC' ),
				'order_d' => array( 'nisnull','`members`.`note` DESC' ),
				'value' => 'note_value',
				'js_type' => 'ts_string',
				'display' => $addon['config']['member_note'],
			);

			$FIELD['officer_note'] = array (
				'lang_field' => 'onote',
				'order' => array( 'onisnull','`members`.`note` ASC' ),
				'order_d' => array( 'onisnull','`members`.`note` DESC' ),
				'value' => 'note_value',
				'js_type' => 'ts_string',
				'display' => $addon['config']['member_onote'],
			);

			$charlist->prepareData($mainQuery, $always_sort, $FIELD, 'charlist');

			$addon = getaddon('accounts');
			
			$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

			$roster->tpl->assign_block_vars('accounts_chars', array(
				'MESSAGE' => $accounts->message,
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_page']['chars']),
				'CHARS_LIST' => $charlist->makeMembersList(),
				'BORDER_END' => border('sblue','end'),
				)
			);
	
			$roster->tpl->set_filenames(array('accounts_chars' => $addon['basename'] . '/chars.html'));
			$roster->tpl->display('accounts_chars');
		}
	}

	function guildsPage()
	{
		global $roster, $addon, $accounts;
 
		// Disallow viewing of the page
		if( !$roster->auth->getAuthorized($addon['config']['acc_min_access']) )
		{
			print
			'<span class="title_text">' . $roster->locale->act['acc_page']['guilds'] . '</span><br />'.
			$roster->auth->getMessage().
			$roster->auth->getLoginForm();
		}
		else
		{
			include_once ('memberslist.php');

			$guildlist = new memberslist(array('group_alts'=>-1));

			$uid = $accounts->session->getVal('uid');

			$mainQuery =
				'SELECT '.
				'`user_link`.`uid`, '.
				'`user_link`.`guild_id`, '.
				'`user_link`.`member_id`, '.
				'`members`.`member_id`, '.
				'`members`.`guild_id`, '.
				'`guild`.`guild_name`, '.
				'`guild`.`guild_id`, '.
				'`guild`.`faction`, '.
				'`guild`.`factionEn`, '.
				'`guild`.`guild_num_members`, '.
				'`guild`.`guild_num_accounts`, '.
				'`guild`.`guild_motd` '.

				'FROM `'.$roster->db->table('user_link','accounts').'` AS user_link '.
				'LEFT JOIN `'.$roster->db->table('members').'` AS members ON `user_link`.`member_id` = `members`.`member_id`'.
				'LEFT JOIN `'.$roster->db->table('guild').'` AS guild ON `members`.`guild_id` = `guild`.`guild_id`'.
				'WHERE `user_link`.`uid` = "' . $uid . '" '.
				'ORDER BY IF(`guild`.`guild_id` = `user_link`.`guild_id`,1,0),';

			$always_sort = ' `guild`.`guild_name` ASC';

			$FIELD['guild_name'] = array (
				'lang_field' => 'guild',
				'order' => array( '`guild`.`guild_name` ASC' ),
				'order_d' => array( '`guild`.`guild_name` DESC' ),
				'value' => 'guild_value',
				'js_type' => 'ts_string',
				'display' => 3,
			);

			$FIELD['faction'] = array (
				'lang_field' => 'faction',
				'order' => array( '`guild`.`faction` ASC' ),
				'order_d' => array( '`guild`.`faction` DESC' ),
				'value' => 'faction_value',
				'js_type' => 'ts_string',
				'display' => 2,
			);

			$FIELD['guild_num_members'] = array (
				'lang_field' => 'members',
				'order' => array( '`guild`.`guild_num_members` ASC' ),
				'order_d' => array( '`guild`.`guild_num_members` DESC' ),
				'js_type' => 'ts_number',
				'display' => 2,
			);

			$FIELD['guild_num_accounts'] = array (
				'lang_field' => 'accounts',
				'order' => array( '`guild`.`guild_num_accounts` ASC' ),
				'order_d' => array( '`guild`.`guild_num_accounts` DESC' ),
				'js_type' => 'ts_number',
				'display' => 2,
			);

			$FIELD['guild_motd'] = array (
				'lang_field' => 'motd',
				'order' => array( '`guild`.`guild_motd` ASC' ),
				'order_d' => array( '`guild`.`guild_motd` DESC' ),
				'value' => 'note_value',
				'js_type' => 'ts_string',
				'display' => 2,
			);

			$guildlist->prepareData($mainQuery, $always_sort, $FIELD, 'guildlist');

			$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

			$roster->tpl->assign_block_vars('accounts_guilds', array(
				'MESSAGE' => $accounts->message,
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_page']['guilds']),
				'GUILD_LIST' => $guildlist->makeMembersList(),
				'BORDER_END' => border('sblue','end'),
				)
			);

			$roster->tpl->set_filenames(array('accounts_guilds' => $addon['basename'] . '/guilds.html'));
			$roster->tpl->display('accounts_guilds');
		}
	}

	function realmsPage()
	{
		global $roster, $addon, $accounts;
 
		// Disallow viewing of the page
		if( !$roster->auth->getAuthorized($addon['config']['acc_min_access']))
		{
			print
			'<span class="title_text">' . $roster->locale->act['acc_page']['realms'] . '</span><br />'.
			$roster->auth->getMessage().
			$roster->auth->getLoginForm();
		}
		else
		{
			include_once ('memberslist.php');

			$realmlist = new memberslist(array('group_alts'=>-1));

			$uid = $accounts->session->getVal('uid');

			$mainQuery =
				'SELECT '.
				'`user_link`.`uid`, '.
				'`user_link`.`member_id`, '.
				'`user_link`.`realm`, '.
				'`members`.`member_id`, '.
				'`members`.`server`, '.
				'`realm`.`server_name`, '.
				'`realm`.`server_region`, '.
				'`realm`.`servertype`, '.
				'`realm`.`serverstatus`, '.
				'`realm`.`serverpop` '.

				'FROM `'.$roster->db->table('user_link', 'accounts').'` AS user_link '.
				'LEFT JOIN `'.$roster->db->table('members').'` AS members ON `user_link`.`member_id` = `members`.`member_id` '.
				'LEFT JOIN `'.$roster->db->table('realmstatus').'` AS realm ON `members`.`server` = `realm`.`server_name` '.
				'WHERE `user_link`.`uid` = "' . $uid . '" '.
				'ORDER BY IF(`realm`.`server_name` = `user_link`.`realm`,1,0),';

			$always_sort = ' `realm`.`server_name` ASC';

			$FIELD['realm_name'] = array (
				'lang_field' => 'realm',
				'order' => array( '`realm`.`server_name` ASC' ),
				'order_d' => array( '`realm`.`server_name` DESC' ),
				'value' => 'realm_value',
				'js_type' => 'ts_string',
				'display' => 3,
			);

			$FIELD['realm_region'] = array (
				'lang_field' => 'region',
				'order' => array( '`realm`.`server_region` ASC' ),
				'order_d' => array( '`realm`.`server_region` DESC' ),
				'value' => 'region_value',
				'js_type' => 'ts_string',
				'display' => 2,
			);

			$FIELD['servertype'] = array (
				'lang_field' => 'servertype',
				'order' => array( '`realm`.`servertype` ASC' ),
				'order_d' => array( '`realm`.`servertype` DESC' ),
				'value' => 'servertype_value',
				'js_type' => 'ts_string',
				'display' => 2,
			);

			$FIELD['serverstatus'] = array (
				'lang_field' => 'serverstatus',
				'order' => array( '`realm`.`serverstatus` ASC' ),
				'order_d' => array( '`realm`.`serverstatus` DESC' ),
				'value' => 'serverstatus_value',
				'js_type' => 'ts_string',
				'display' => 2,
			);

			$FIELD['serverpop'] = array (
				'lang_field' => 'serverpop',
				'order' => array( '`realm`.`serverpop` ASC' ),
				'order_d' => array( '`realm`.`serverpop` DESC' ),
				'value' => 'serverpop_value',
				'js_type' => 'ts_string',
				'display' => 2,
			);

			$realmlist->prepareData($mainQuery, $always_sort, $FIELD, 'realmlist');

			$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

			$roster->tpl->assign_block_vars('accounts_realms', array(
				'MESSAGE' => $accounts->message,
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_page']['realms']),
				'REALMS_LIST' => $realmlist->makeMembersList(),
				'BORDER_END' => border('sblue','end'),
				)
			);

			$roster->tpl->set_filenames(array('accounts_realms' => $addon['basename'] . '/realms.html'));
			$roster->tpl->display('accounts_realms');
		}
	}

	function settingsPage()
	{
		global $roster, $addon, $accounts;
 
		// Disallow viewing of the page
		if( !$roster->auth->getAuthorized($addon['config']['acc_min_access']) )
		{
			print
			'<span class="title_text">' . $roster->locale->act['acc_page']['settings'] . '</span><br />'.
			$roster->auth->getMessage().
			$roster->auth->getLoginForm();
		}
		else
		{
			$config_page = '';
			
			if(in_array('profile', $roster->pages))
			{
				$config_page = $roster->pages[3];
			}
			if($config_page == '')
			{
				include_once($addon['admin_dir'] . 'settings.php');
			}
			else
			{
				include_once($addon['admin_dir'] . 'profile.php');
			}

			$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing
	
			$roster->tpl->assign_block_vars('accounts_settings', array(
				'MESSAGE' => $accounts->message,
				'MENU' => $menu,
				'BODY' => $body,
				)
			);

			$roster->tpl->set_filenames(array('accounts_settings' => $addon['basename'] . '/settings.html'));
			$roster->tpl->display('accounts_settings');
		}
	}

	function mainPage()
	{
		global $roster, $addon, $accounts;

		if($accounts->session->getVal('isLoggedIn') == true) // This replaces login
		{
			$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

			$tab1 = explode('|',$roster->locale->act['acc_main_menu']['my_prof']);
      		$tab2 = explode('|',$roster->locale->act['acc_main_menu']['chars']);
      		$tab3 = explode('|',$roster->locale->act['acc_main_menu']['guilds']);
      		$tab4 = explode('|',$roster->locale->act['acc_main_menu']['realms']);
      		$tab5 = explode('|',$roster->locale->act['acc_main_menu']['mail']);
      		$tab6 = explode('|',$roster->locale->act['acc_main_menu']['char']);
      		$tab7 = explode('|',$roster->locale->act['acc_main_menu']['prof']);

      		$menu = messagebox('
      		<ul class="tab_menu">
      			<li><a href="' . makelink('util-accounts-profile-' . $accounts->user->info['uname']) . '" style="cursor:help;"' . makeOverlib($tab1[1],$tab1[0],'',1,'',',WRAP') . '>' . $tab1[0] . '</a></li>
      			<li><a href="' . makelink('util-accounts-chars') . '" style="cursor:help;"' . makeOverlib($tab2[1],$tab2[0],'',1,'',',WRAP') . '>' . $tab2[0] . '</a></li>
      			<li><a href="' . makelink('util-accounts-guilds') . '" style="cursor:help;"' . makeOverlib($tab3[1],$tab3[0],'',1,'',',WRAP') . '>' . $tab3[0] . '</a></li>
      			<li><a href="' . makelink('util-accounts-realms') . '" style="cursor:help;"' . makeOverlib($tab4[1],$tab4[0],'',1,'',',WRAP') . '>' . $tab4[0] . '</a></li>
      			<li><a href="' . makelink('util-accounts-mail') . '" style="cursor:help;"' . makeOverlib($tab5[1],$tab5[0],'',1,'',',WRAP') . '>' . $tab5[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-settings') . '" style="cursor:help;"' . makeOverlib($tab6[1],$tab6[0],'',1,'',',WRAP') . '>' . $tab6[0] . '</a></li>
      			<li><a href="' . makelink('util-accounts-settings-profile') . '" style="cursor:help;"' . makeOverlib($tab7[1],$tab7[0],'',1,'',',WRAP') . '>' . $tab7[0] . '</a></li>
		      </ul>
      		',$roster->locale->act['acc_page']['menu'],'syellow','145px');

			$roster->tpl->assign_block_vars('accounts_main', array(
				'MESSAGE' => $accounts->message,
				'MAIN_BORDER_START' => border('sblue','start', $roster->locale->act['acc_page']['main']),
				'MAIN_TXT' => sprintf($roster->locale->act['acc_int']['main_txt'], $accounts->user->info['uname']),
				'MAIN_BORDER_END' => border('sblue','end'),
				'USER_LINK' => makelink('util-accounts-profile-' . $accounts->user->info['uname']),
				'INFO_BORDER_START' => border('sgray','start', $roster->locale->act['acc_page']['info']),
				'UNAME_TXT' => $roster->locale->act['acc_int']['uname'],
				'FNAME_TXT' => $roster->locale->act['acc_int']['fname'],
				'LNAME_TXT' => $roster->locale->act['acc_int']['lname'],
				'GROUP_TXT' => $roster->locale->act['acc_int']['ugroup'],
				'EMAIL_TXT' => $roster->locale->act['acc_int']['email'],
				'USER' => $accounts->user->info['uname'],
				'FNAME' => $accounts->user->info['fname'],
				'LNAME' => $accounts->user->info['lname'],
				'GROUP' => $accounts->profile->getGroup($accounts->user->info['uname']),
				'EMAIL' => $accounts->user->info['email'],
				'INFO_BORDER_END' => border('sgray','end'),
				'MENU' => $menu,
				)
			);

			$roster->tpl->set_filenames(array('accounts_main' => $addon['basename'] . '/main.html'));
			$roster->tpl->display('accounts_main');
		}
		else
		{
			$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

			

			$roster->tpl->assign_block_vars('accounts_index', array(
				'MESSAGE' => $accounts->message,
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_page']['main']),
				'WELCOME_TXT' => $addon['config']['acc_reg_text'],
				'REGISTER_LINK' => makelink('util-accounts-register'),
				'REG_CLICK' => $roster->locale->act['acc_page']['registration'],
				'IF_APP' => $addon['config']['acc_use_app'],
				'APP_LINK' => makelink('util-accounts-application'),
				'APP_CLICK' => $roster->locale->act['acc_page']['application'],
				'LOGIN_LINK' => makelink('util-accounts-login-main'),
				'LOGIN_CLICK' => $roster->locale->act['acc_int']['login'],
				'BORDER_END' => border('sblue','end'),
				'RECRUIT_BOX' => $accounts->profile->recruitment(),
				)
			);

			$roster->tpl->set_filenames(array('accounts_index' => $addon['basename'] . '/index.html'));
			$roster->tpl->display('accounts_index');
		}
	}
	
	function applicationPage()
	{
		global $roster, $addon, $accounts;
		
		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

		if (isset($_POST['submit']))
		{
			$age = mktime(0, 0, 0, $_POST['age_Month'], $_POST['age_Day'], $_POST['age_Year']);
                  $accounts->user->register('full', $_POST['uName'], $_POST['userPass'], $_POST['passConfirm'], $_POST['fName'], $_POST['lName'], $_POST['groupPass'], $_POST['eMail'], $age, $_POST['City'], $_POST['State'], $_POST['Country'], $_POST['Zone'], $_POST['otherGuilds'], $_POST['why'], $_POST['homePage'], $_POST['about'], $_POST['notes']);
		}

		$form = 'userApp';
		$accounts->form->newForm('post', makelink('util-accounts-application'), $form, 'formClass', 4);
		$accounts->form->addFormText('appText', $roster->locale->act['acc_app']['app_txt'], 'membersHeader', 'center',$form);
		$accounts->form->addFormText('userText', $roster->locale->act['acc_app']['user_hd'], 'membersHeader', 'center',$form);
		$accounts->form->addTextBox('text','uName','',$roster->locale->act['acc_int']['uname'],'wowinput128',1,$form);
		$accounts->form->addTextBox('text','eMail','',$roster->locale->act['acc_int']['email'],'wowinput128',1,$form);
		$accounts->form->addTextBox('password','userPass','',$roster->locale->act['new_pass'],'wowinput128',1,$form);
		$accounts->form->addTextBox('password','passConfirm','',$roster->locale->act['new_pass_confirm'],'wowinput128',1,$form);
		$accounts->form->addTextBox('password','groupPass','',$roster->locale->act['acc_int']['group'],'wowinput128',1,$form);
		$accounts->form->addColumn('empty_1',2,'','',$form);
		$accounts->form->addFormText('infoText', $roster->locale->act['acc_app']['inf_hd'], 'membersHeader', 'center',$form);
		$accounts->form->addTextBox('text','fName','',$roster->locale->act['acc_int']['fname'],'wowinput128',1,$form);
		$accounts->form->addTextBox('text','lName','',$roster->locale->act['acc_int']['lname'],'wowinput128','',$form);
		$accounts->form->addDateSelect('age','Birthdate',1,$form);
		$accounts->form->addColumn('empty_2',2,'','',$form);
		$accounts->form->addTextBox('text','City','',$roster->locale->act['acc_int']['city'],'wowinput128','',$form);
		$accounts->form->addTextBox('text','State','',$roster->locale->act['acc_int']['state'],'wowinput128','',$form);
		$accounts->form->addTextBox('text','Country','',$roster->locale->act['acc_int']['country'],'wowinput128',1,$form);
		$accounts->form->addTimezone('Zone',$roster->locale->act['acc_app']['zone'],'',$form);
		$accounts->form->addFormText('extraText',$roster->locale->act['acc_app']['ext_inf'],'membersHeader','center',$form);
		$accounts->form->addTextBox('text','otherGuilds','',$roster->locale->act['acc_app']['guilds'],'wowinput128','',$form);
		$accounts->form->addTextArea('why','',$roster->locale->act['acc_app']['why'],1,$form);
		$accounts->form->addTextBox('text','homePage','',$roster->locale->act['acc_app']['homepage'],'wowinput128','',$form);
		$accounts->form->addTextArea('about','',$roster->locale->act['acc_app']['about'],'',$form);
		$accounts->form->addTextArea('notes','',$roster->locale->act['acc_app']['notes'],'',$form);
		$accounts->form->addColumn('empty_3',2,'','',$form);
		$trayID = $accounts->form->addTray('buttonTray',$form);
			$accounts->form->addResetButton($trayID,'clear',$roster->locale->act['config_reset_button'],$form);
			$accounts->form->addSubmitButton($trayID,'submit',$roster->locale->act['submit'],$form);

		$error = $accounts->user->message; // error message
	
		$roster->tpl->assign_block_vars('accounts_application', array(
			'BORDER_START' => border('syellow','start', $roster->locale->act['acc_page']['application']),
			'FORM' => $accounts->form->getTableOfElements_1(1,$form),
			'BORDER_END' => border('syellow','end'),
			'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
			)
		);

		$roster->tpl->set_filenames(array('accounts_application' => $addon['basename'] . '/application.html'));
		$roster->tpl->display('accounts_application');

		return;
	}

	function profilePage()
	{
		global $roster, $addon, $accounts;
		
		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

		$user = $roster->pages[3];

		$uid = $accounts->user->getUser($user);

		$accounts->user->getInfo($user);

		$accounts->profile->getConfigData($uid);

		$online = '<font color="#00FF00">' . $roster->locale->act['online'] . '</font>';
		$offline = '<font color="#FF0000">' . $roster->locale->act['acc_rs']['offline'] . '</font>';

		if (isset($_POST['Submit']))
		{
			$accounts->profile->update($_POST['uid'], $_POST['char'], $_POST['user'], $_POST['email']); // the register method
		}

		$error = $accounts->user->message; // error message

		$roster->tpl->assign_block_vars('accounts_profile', array(
			'USER_LINK' => makelink('util-accounts-profile-' . $user),
			'MESSAGE' => $accounts->message,
			'BORDER_START' => border('sblue','start', sprintf($roster->locale->act['acc_page']['profile'], $accounts->user->info['uname'])),
			'USER' => '<b>' . $roster->locale->act['acc_int']['uname'] . ':</b> <a href="' . makelink('util-accounts-profile-' . $user) . '">' . $accounts->user->info['uname'] . '</a>',
			'AVATAR' => $accounts->profile->getAvSig('av', $uid),
			'S_CITY' => $accounts->profile->configData['show_city'],
			'CITY' => '<b>' . $roster->locale->act['acc_int']['city'] . ':</b> ' . $accounts->user->info['city'],
			'S_COUNTRY' => $accounts->profile->configData['show_country'],
			'COUNTRY' => '<b>' . $roster->locale->act['acc_int']['country'] . ':</b> ' . $accounts->user->info['country'],
			'S_FNAME' => $accounts->profile->configData['show_fname'],
			'FNAME' => '<b>' . $roster->locale->act['acc_int']['fname'] . ':</b> ' . $accounts->user->info['fname'],
			'S_LNAME' => $accounts->profile->configData['show_lname'],
			'LNAME' => '<b>' . $roster->locale->act['acc_int']['lname'] . ':</b> ' . $accounts->user->info['lname'],
			'GROUPID' => '<b>' . $roster->locale->act['acc_int']['ugroup'] . ':</b> ' . $accounts->profile->getGroup($user),
			'S_EMAIL' => $accounts->profile->configData['show_email'],
			'EMAIL' => '<b>' . $roster->locale->act['acc_int']['email'] . ':</b> ' . $accounts->user->info['email'],
			'S_HOMEPAGE' => $accounts->profile->configData['show_homepage'],
			'HOMEPAGE' => '<b>' . $roster->locale->act['acc_int']['homepage'] . ':</b><a href="' . $accounts->user->info['homepage'] . '"> ' . $accounts->user->info['homepage'] . '</a>',
			'S_JOINED' => $accounts->profile->configData['show_joined'],
			'JOINED' => '<b>' . $roster->locale->act['acc_int']['date_joined'] . ':</b> ' . $accounts->user->info['date_joined'],
			'S_LOGIN' => $accounts->profile->configData['show_lastlogin'],
			'LOGIN' => '<b>' . $roster->locale->act['acc_int']['last_login'] . ':</b> ' . $accounts->user->info['last_login'],
			'ONLINE' => $accounts->user->info['online'],
			'IS_ONLINE' => sprintf($roster->locale->act['acc_int']['is_online'], $online),
			'IS_OFFLINE' => sprintf($roster->locale->act['acc_int']['is_online'], $offline),
			'BORDER_END' => border('sblue','end'),
			)
		);

		$roster->tpl->set_filenames(array('accounts_profile' => $addon['basename'] . '/profile.html'));
		$roster->tpl->display('accounts_profile');

		return;
	}

	function mailPage()
	{
		global $roster, $addon, $accounts;
		
		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

		$form = '';
		$menu = '';
		$mail_menu = '';
		// Disallow viewing of the page
		if( !$roster->auth->getAuthorized($addon['config']['acc_min_access']) )
		{
			print
			'<span class="title_text">' . $roster->locale->act['acc_page']['messaging'] . '</span><br />'.
			$roster->auth->getMessage().
			$roster->auth->getLoginForm();
		}
		else
		{
                  $tab1 = explode('|',$roster->locale->act['acc_main_menu']['my_prof']);
                  $tab2 = explode('|',$roster->locale->act['acc_main_menu']['chars']);
                  $tab3 = explode('|',$roster->locale->act['acc_main_menu']['guilds']);
                  $tab4 = explode('|',$roster->locale->act['acc_main_menu']['realms']);
                  $tab5 = explode('|',$roster->locale->act['acc_main_menu']['mail']);
                  $tab6 = explode('|',$roster->locale->act['acc_main_menu']['char']);
                  $tab7 = explode('|',$roster->locale->act['acc_main_menu']['prof']);

                  $menu = messagebox('
                  <ul class="tab_menu">
                        <li><a href="' . makelink('util-accounts-profile-' . $accounts->user->info['uname']) . '" style="cursor:help;"' . makeOverlib($tab1[1],$tab1[0],'',1,'',',WRAP') . '>' . $tab1[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-chars') . '" style="cursor:help;"' . makeOverlib($tab2[1],$tab2[0],'',1,'',',WRAP') . '>' . $tab2[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-guilds') . '" style="cursor:help;"' . makeOverlib($tab3[1],$tab3[0],'',1,'',',WRAP') . '>' . $tab3[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-realms') . '" style="cursor:help;"' . makeOverlib($tab4[1],$tab4[0],'',1,'',',WRAP') . '>' . $tab4[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-mail') . '" style="cursor:help;"' . makeOverlib($tab5[1],$tab5[0],'',1,'',',WRAP') . '>' . $tab5[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-settings') . '" style="cursor:help;"' . makeOverlib($tab6[1],$tab6[0],'',1,'',',WRAP') . '>' . $tab6[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-settings-profile') . '" style="cursor:help;"' . makeOverlib($tab7[1],$tab7[0],'',1,'',',WRAP') . '>' . $tab7[0] . '</a></li>
                  </ul>
                  ',$roster->locale->act['acc_page']['menu'],'syellow','145px');

                  $mail_tab1 = explode('|',$roster->locale->act['acc_mail_menu']['inbox']);
                  $mail_tab2 = explode('|',$roster->locale->act['acc_mail_menu']['outbox']);
                  $mail_tab3 = explode('|',$roster->locale->act['acc_mail_menu']['write']);
            
                  $mail_menu = messagebox('
                  <ul class="tab_menu">
                        <li><a href="' . makelink('util-accounts-mail-inbox') . '" style="cursor:help;"' . makeOverlib($mail_tab1[1],$mail_tab1[0],'',1,'',',WRAP') . '>' . $mail_tab1[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-mail-outbox') . '" style="cursor:help;"' . makeOverlib($mail_tab2[1],$mail_tab2[0],'',1,'',',WRAP') . '>' . $mail_tab2[0] . '</a></li>
                        <li><a href="' . makelink('util-accounts-mail-write') . '" style="cursor:help;"' . makeOverlib($mail_tab3[1],$mail_tab3[0],'',1,'',',WRAP') . '>' . $mail_tab3[0] . '</a></li>
                  </ul>
                  ',$roster->locale->act['acc_int']['messaging']['menu'],'syellow','145px');
                  
                  if( isset($roster->pages[3]) && $roster->pages[3] == 'inbox' )
                  {
                        $uid = $accounts->session->getVal('uid');

                        $messages = $accounts->messaging->getAllMessages('',$uid);
                        if(is_array($messages))
                        {
                              $form = 'messsageForm';
                              $accounts->form->newForm('post', makelink('util-accounts-mail'), $form, 'formClass', 4);

                              $accounts->form->addColumn('read',1,$roster->locale->act['acc_int']['messaging']['read'],'membersHeader',$form);
                              $accounts->form->addColumn('title',1,$roster->locale->act['acc_int']['messaging']['title'],'membersHeader',$form);
                              $accounts->form->addColumn('sender',1,$roster->locale->act['acc_int']['messaging']['sender'],'membersHeader',$form);
                              $accounts->form->addColumn('date_rec',1,$roster->locale->act['acc_int']['messaging']['date_rec'],'membersHeader',$form);

                              $num = count($messages);
                              $message = '';
                              for($i = 0 ; $i < $num ; $i++ )
                              {
                                    if($i&1)
                                    {
                                          $rowColor = 'membersRow1';
                                    }
                                    else
                                    {
                                          $rowColor = 'membersRow2';
                                    }
                                    $read_val = 'checkboxOff';
                                    if($messages[$i]['read'] == '1')
                                    {
                                          $read_val = 'checkboxOn';
                                    }

                                    $accounts->form->addColumn('read_' . $i,1,"<span class='" . $read_val . "' />&nbsp;",$rowColor,$form);
                                    $accounts->form->addColumn('title_' . $i,1,'<a href="' . makelink('util-accounts-mail-read&amp;msgid=' . $messages[$i]['id']) . '">' . $messages[$i]['title'] . '</a>',$rowColor,$form);
                                    $accounts->form->addColumn('sender_' . $i,1,$accounts->user->getUser($messages[$i]['sender']),$rowColor,$form);
                                    $accounts->form->addColumn('date_' . $i,1,$messages[$i]['date'],$rowColor,$form);
                              }
                        }
                  }
                  elseif( isset($roster->pages[3]) && $roster->pages[3] == 'outbox' )
                  {
                        $uid = $accounts->session->getVal('uid');

                        $messages = $accounts->messaging->getAllMessages('','',$uid);
                        if(is_array($messages))
                        {
                              $form = 'messageForm';
                              $accounts->form->newForm('post', makelink('util-accounts-mail'), $form, 'formClass', 4);
                              $accounts->form->addColumn('read',1,$roster->locale->act['acc_int']['messaging']['read'],'membersHeader',$form);
                              $accounts->form->addColumn('title',1,$roster->locale->act['acc_int']['messaging']['title'],'membersHeader',$form);
                              $accounts->form->addColumn('reciever',1,$roster->locale->act['acc_int']['messaging']['reciever'],'membersHeader',$form);
                              $accounts->form->addColumn('date_sent',1,$roster->locale->act['acc_int']['messaging']['date_sent'],'membersHeader',$form);

                              $num = count($messages);
                              $message = '';
                              for($i = 0 ; $i < $num ; $i++ )
                              {
                                    if($i&1)
                                    {
                                          $rowColor = 'membersRow1';
                                    }
                                    else
                                    {
                                          $rowColor = 'membersRow2';
                                    }
                                    $read_val = 'checkboxOff';
                                    if($messages[$i]['read'] == '1')
                                    {
                                          $read_val = 'checkboxOn';
                                    }

                                    $accounts->form->addColumn('read_' . $i,1,'<span class="' . $read_val . '" />&nbsp;',$rowColor,$form);
                                    $accounts->form->addColumn('title_' . $i,1,'<a href="' . makelink('util-accounts-mail-read&amp;msgid=' . $messages[$i]['id']) . '">' . $messages[$i]['title'] . '</a>',$rowColor,$form);
                                    $accounts->form->addColumn('reciever_' . $i,1,$accounts->user->getUser($messages[$i]['reciever']),$rowColor,$form);
                                    $accounts->form->addColumn('date_sent_' . $i,1,$messages[$i]['date'],$rowColor,$form);
                              }
                        }
                  }
                  elseif( isset($roster->pages[3]) && $roster->pages[3] == 'read' )
                  {
                        $id = $_GET['msgid'];
                        $message = $accounts->messaging->getMessage($id);
                        $form = 'readMessageForm';

                        $accounts->form->newForm('post', makelink('util-accounts-mail-write'), $form, 'formClass', 2);
                        $accounts->form->addColumn('sender',1,$roster->locale->act['acc_int']['messaging']['sender'] . ' :','membersRow1',$form);
                        $accounts->form->addColumn('sender_val',1,$accounts->user->getUser($message['sender']),'membersRow1',$form);
                        $accounts->form->addColumn('title',1,$roster->locale->act['acc_int']['messaging']['title'] . ' :','membersRow2',$form);
                        $accounts->form->addColumn('title_val',1,$message['title'],'membersRow2',$form);
                        $accounts->form->addColumn('body',1,$roster->locale->act['acc_int']['messaging']['body'] . ' :','membersRow1',$form);
                        $accounts->form->addColumn('body_val',1,$message['body'],'membersRow1',$form);
                        $trayID = $accounts->form->addTray('buttonTray',$form);
                        $accounts->form->addHiddenField($trayID,'title',$message['title'],$form);
                        $accounts->form->addHiddenField($trayID,'body',$message['body'],$form);
                        $accounts->form->addHiddenField($trayID,'reciever',$message['sender'],$form);
                        $accounts->form->addSubmitButton($trayID,'reply',$roster->locale->act['acc_int']['messaging']['reply'],$form);

                        if($message['read'] == 0 && $message['sender'] != $accounts->session->getVal('uid'))
                        {
                              $accounts->messaging->markAsRead($id);
                        }
                  }
                  elseif( isset($roster->pages[3]) && $roster->pages[3] == 'write' )
                  {
                        if(isset($_POST['reply']))
                        {
                              $title_val = 'RE: ' . $_POST['title'];
                              $body_val = $_POST['body'];
                              $rec_val = $_POST['reciever'];
                        }
                        else
                        {
                              $title_val = '';
                              $body_val = '';
                              $rec_val = '';
                        }

                        if(isset($_POST['submit']))
                        {
                              $accounts->messaging->sendMessage($_POST['title'] ,$_POST['body'] ,$_POST['sender'] ,$_POST['reciever'] ,$_POST['senderLevel']);
                        }

                        $form = 'newMessageForm';
                        $accounts->form->newForm('post', makelink('util-accounts-mail-write'), $form, 'formClass', 2);
                        $accounts->form->addUserSelect('reciever',$roster->locale->act['acc_int']['messaging']['reciever'] . ' :',1,$form,$rec_val);
                        $accounts->form->addTextBox('text','title',$title_val,$roster->locale->act['acc_int']['messaging']['title'] . ' :','wowinput128',1,$form);
                        $accounts->form->addTextArea('body',$body_val,$roster->locale->act['acc_int']['messaging']['body'] . ' :',1,$form);
                        $trayID = $accounts->form->addTray('buttonTray',$form);
                        $accounts->form->addHiddenField($trayID,'sender',$accounts->session->getVal('uid'),$form);
                        $accounts->form->addHiddenField($trayID,'senderLevel',$accounts->session->getVal('groupID'),$form);
                        $accounts->form->addResetButton($trayID,'clear',$roster->locale->act['config_reset_button'],$form);
                        $accounts->form->addSubmitButton($trayID,'submit',$roster->locale->act['submit'],$form);
                  }
                  else
                  {
                        $form = 'mainForm';
                        $accounts->form->newForm('post', makelink('util-accounts-mail'), $form, 'formClass', 1);
                        $accounts->form->addColumn('mail_txt',1,$roster->locale->act['acc_int']['messaging']['main'],'membersRow1',$form);
                  }
                  
                  $roster->tpl->assign_block_vars('accounts_messaging', array(
                        'BORDER_START' => border('syellow','start', $roster->locale->act['acc_page']['messaging'] . $mail_page),
                        'MENU' => $mail_menu,
                        'FORM' => $accounts->form->getTableOfElements_1(1,$form),
                        'BORDER_END' => border('syellow','end'),
                        'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
                        'ACC_MENU' => $menu,
                        )
                  );

                  $roster->tpl->set_filenames(array('accounts_messaging' => $addon['basename'] . '/messaging.html'));
                  $roster->tpl->display('accounts_messaging');
            }

            $error = $accounts->messaging->err_msg; // error message
            $mail_page = '';
            if(isset($roster->pages[3]))
            {
                  $mail_page = ' - ' . ucfirst($roster->pages[3]);
		}

		return;
	}
}
