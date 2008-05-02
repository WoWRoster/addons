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

		if (isset($_POST['Submit']))
		{
			$accounts->user->register($_POST['newUser'], $_POST['userPass'], $_POST['confirmPass'], $_POST['fname'], $_POST['lname'], $_POST['groupPass'], $_POST['email']); // the register method
		}
 
		$error = $accounts->user->message; // error message
	
		$roster->tpl->assign_block_vars('accounts_register', array(
			'BORDER_START' => border('syellow','start', $roster->locale->act['acc_reg_page']),
			'REGISTER_TXT' => $roster->locale->act['acc_reg_txt'],
			'FORM_LINK' => makelink('util-accounts-register'),
			'UNAME_TXT' => $roster->locale->act['acc_uname'],
			'PASS_TXT' => $roster->locale->act['new_pass'],
			'PASS_LEN' => $addon['config']['acc_pass_length'],
			'PASS_CONF_TXT' => $roster->locale->act['new_pass_confirm'],
			'FNAME_TXT' => $roster->locale->act['acc_fname'],
			'LNAME_TXT' => $roster->locale->act['acc_lname'],
			'EMAIL_TXT' => $roster->locale->act['acc_email'],
			'GROUP_TXT' => $roster->locale->act['acc_group'],
			'SUBMIT_BTTN' => $roster->locale->act['submit'],
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

		$uid = $_GET['uid'];

		if (isset($_GET['act_key']) && isset($_GET['uid']))
		{ // these two variables are required for activating/updating the account/password
		    $accounts->user->activateAccount($_GET['act_key'], $_GET['uid']); // the activation method 
		}

		if (isset($_GET['validate']) && isset($_GET['uid']))
		{ // these two variables are required for activating/updating the new e-mail address
		    $accounts->user->validateEMail($_GET['validate'], $_GET['uid']); // the validation method 
	    }

    	if (isset($_GET['act_key']) && isset($_GET['uid']))
		{ // these two variables are required for activating/updating the password
	    	if ($accounts->user->checkActivationPass($_GET['act_key'], $_GET['uid']))
			{ // the activation/validation method 
		    	$_SESSION['act_key'] = $_GET['act_key']; // put the activation string into a session or into a hdden field
		    	$uid = $_GET['uid']; // this id is the key where the record have to be updated with new pass
	    	}
    	}
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

    	if (isset($_SESSION['act_key']))
		{
			echo '<!-- Begin Password Activation -->';
        	echo border('sred','start', $roster->locale->act['acc_act_pass']);
        	echo '<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
			echo     '<tr>';
        	echo         '<th class="membersHeader">';	
        	echo              $roster->locale->act['acc_act_pass_txt'] . '<b>' . $accounts->user->info['uname'] . '</b>.</p><br />';
			echo         '</th>';
			echo     '</tr>';
			echo     '<tr>';
        	echo     '<form name="passAct" method="post" action="' . makelink('util-accounts-activate') . '">';
			echo         '<td class="membersRow1">';
        	echo             '<span style="float:left">' . $roster->locale->act['new_pass'] . ':</span>';
        	echo             '<span style="float:right"><input type="password" name="userPass" class="wowinput128"></span>';
			echo         '</td>';
			echo         '<td class="membersRow2">';
        	echo             '<span style="float:left">' . $roster->locale->act['new_pass_confirm'] . ':</span>';
        	echo             '<span style="float:right"><input type="password" name="confirmPass" class="wowinput128"></span>';
			echo         '</td>';
        	echo     '<input type="hidden" name="user" value="' . $accounts->user->info['uname'] . '">';
        	echo     '</tr>';
			echo     '<tr>';
        	echo         '<td class="membersHeader">';
        	echo             '<div align="right"><input type="submit" name="Submit" value="' . $roster->locale->act['submit'] . '"></div>';
        	echo         '</td>';
        	echo     '</form>';
        	echo     '</tr>';
    	}
		else
		{
        	echo '<h2>' . $roster->locale->act['accounts'] . '</h2>';
    	}
    	echo '</table>';
    	echo border('sred','end');
    	echo '<p><b>' . (isset($error)) ? $error : "&nbsp;" . '</b></p>';
    	echo '<p>&nbsp;</p>';
    	echo '<!-- End Password Activation -->';
    	echo '<center><p><a href="' . makelink('util-accounts-login') . '">' . $roster->locale->act['login'] . '</a></p></center>';

	return;
	}

	function denyPage($groupID, $level)
	{
    	global $roster, $addon, $accounts;
	
		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing
	
		$roster->tpl->assign_block_vars('accounts_deny', array(
			'BORDER_START' => border('sred','start', $roster->locale->act['acc_no_access']),
			'ACCESS_TXT' => $roster->locale->act['acc_no_access_txt'],
			'INDEX_LINK' => makelink('util-accounts'),
			'INDEX_TXT' => $roster->locale->act['acc_main_page'],
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
			'BORDER_START' => border('sred','start', $roster->locale->act['acc_forgot']),
			'FORGOT_TXT' => $roster->locale->act['acc_forgot_txt'],
			'FORM_LINK' => makelink('util-accounts-lost'),
			'EMAIL_TXT' => $roster->locale->act['acc_email'],
			'SUBMIT' => $roster->locale->act['submit'],
			'BORDER_END' => border('sred','end'),
			'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
			'LOGIN_LINK' => makelink('util-accounts-login'),
			'LOGIN_TXT' => $roster->locale->act['login'],
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
    		$locale = 'acc_' . $roster->pages[3] . '_page';
    	}
    	else
    	{
    		$redirect = 'util-accounts-main';
    		$locale = 'acc_main_page';
    	}
 
		// Disallow viewing of the page
		if( !$roster->auth->getAuthorized($addon['config']['acc_min_access'], $redirect) )
		{
			print
			'<span class="title_text">' . $roster->locale->act[$locale] . '</span><br />'.
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
			'<span class="title_text">' . $roster->locale->act['acc_chars_page'] . '</span><br />'.
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
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_chars_page']),
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
			'<span class="title_text">' . $roster->locale->act['acc_guilds_page'] . '</span><br />'.
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
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_guilds_page']),
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
			'<span class="title_text">' . $roster->locale->act['acc_realms_page'] . '</span><br />'.
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
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_realms_page']),
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
			'<span class="title_text">' . $roster->locale->act['acc_settings_page'] . '</span><br />'.
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

			$roster->tpl->assign_block_vars('accounts_main', array(
				'USER_LINK' => makelink('util-accounts-profile-' . $accounts->user->info['uname']),
				'MESSAGE' => $accounts->message,
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_main_page']),
				'USER' => $accounts->user->info['uname'],
				'FNAME' => $accounts->user->info['fname'],
				'LNAME' => $accounts->user->info['lname'],
				'GROUPID' => $accounts->user->info['group_id'],
				'EMAIL' => $accounts->user->info['email'],
				'BORDER_END' => border('sblue','end'),
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
				'BORDER_START' => border('sblue','start', $roster->locale->act['acc_main_page']),
				'WELCOME_TXT' => $addon['config']['acc_reg_text'],
				'REGISTER_LINK' => makelink('util-accounts-register'),
				'REG_CLICK' => $roster->locale->act['acc_reg_user'],
				'APP_LINK' => makelink('util-accounts-application'),
				'APP_CLICK' => $roster->locale->act['acc_reg_app'],
				'LOGIN_LINK' => makelink('util-accounts-login-main'),
				'LOGIN_CLICK' => $roster->locale->act['login'],
				'BORDER_END' => border('sblue','end'),
				)
			);

			$roster->tpl->set_filenames(array('accounts_index' => $addon['basename'] . '/index.html'));
			$roster->tpl->display('accounts_index');
			
			if ($addon['config']['acc_use_recruit'] == 1)
			{
				$accounts->profile->recruitment();
			}
		}
	}
	
	function applicationPage()
	{
		global $roster, $addon, $accounts;
		
		$roster->output['show_menu']['acc_menu'] = 1;  // Display the button listing

		//Set guild name
		$guildname = "Guild";

		//Output guild information links? (0 to suppress rules, rank structure and raiding information links)
		$showguildinfo = 0;
		//Set path to guild rules - Empty string to supress 
		$guildrules = "";
		//Set path to rank structure - Empty string to supress
		$rankstructure = "";
		//Set path to raiding information - Empty string to supress
		$raidinginfo = "";

		//Set your "about" message for the recruitment page - Empty string to supress
		$about = "";
		//Set a message to appear at the top of the application form - Empty string to supress
		$appmessage = "";

		//Set up the mail - Set the recipient email addresses
		$recipient = "Application@mysite.com";
		//Set the test name to trigger alternate email (Enter this string in 'Your Name' field of form)
		$testname = "Test";
		//Set the alternate email address to send to when testname is entered
		$testrecipient = "Webmaster@mysite.com";

		if (isset($_POST['Submit']))
		{
			$accounts->profile->userApplication($_POST['Name1'], $_POST['Email'], $_POST['Age'], $_POST['Zone'], $_POST['Name2'], $_POST['Class'], $_POST['Level'], $_POST['FirstAid'], $_POST['Profession1'], $_POST['Prof1Level'], $_POST['Profession2'], $_POST['Prof2Level'], $_POST['Spec'], $_POST['Spec1'], $_POST['Spec2'], $_POST['Spec3'], $_POST['Fireresist'], $_POST['Shadowresist'], $_POST['Natureresist'], $_POST['Arcaneresist'], $_POST['Frostresist'], $_POST['Key1'], $_POST['Key2'], $_POST['Key3'], $_POST['Key4'], $_POST['Key5'], $_POST['Key6'], $_POST['Key7'], $_POST['Key8'], $_POST['Key9'], $_POST['Key10'], $_POST['Key11'], $_POST['Key12'], $_POST['Key13'], $_POST['Key14'], $_POST['Gear'], $_POST['Alt1Name'], $_POST['Alt1Class'], $_POST['Alt1Level'], $_POST['Alt2Name'], $_POST['Alt2Class'], $_POST['Alt2Level'], $_POST['Alt3Name'], $_POST['Alt3Class'], $_POST['Alt3Level'], $_POST['Style'], $_POST['Guilds'], $_POST['Instances'], $_POST['Message']);
		}
 
		$error = $accounts->user->message; // error message
	
		$roster->tpl->assign_block_vars('accounts_application', array(
			'BORDER_START' => border('syellow','start', $roster->locale->act['acc_app_form']),
			'REGISTER_TXT' => $roster->locale->act['acc_app_txt'],
			'FORM_LINK' => makelink('util-accounts-application'),
			'SUBMIT_BTTN' => $roster->locale->act['submit'],
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

		$accounts->profile($user);

		if (isset($_POST['Submit']))
		{
			$accounts->profile->update($_POST['uid'], $_POST['char'], $_POST['user'], $_POST['email']); // the register method
		}
 
		$error = $accounts->user->message; // error message
	
		$roster->tpl->assign_block_vars('accounts_profile', array(
			'BORDER_START' => border('sred','start', $roster->locale->act['acc_profile']),
			'REGISTER_TXT' => $roster->locale->act['acc_reg_txt'],
			'FORM_LINK' => makelink('util-accounts-profile-'),
			'UNAME_TXT' => $roster->locale->act['acc_uname'],
			'PASS_TXT' => $roster->locale->act['new_pass'],
			'PASS_LEN' => $addon['config']['acc_pass_length'],
			'PASS_CONF_TXT' => $roster->locale->act['new_pass_confirm'],
			'FNAME_TXT' => $roster->locale->act['acc_fname'],
			'LNAME_TXT' => $roster->locale->act['acc_lname'],
			'EMAIL_TXT' => $roster->locale->act['acc_email'],
			'GROUP_TXT' => $roster->locale->act['acc_group'],
			'SUBMIT_BTTN' => $roster->locale->act['submit'],
			'BORDER_END' => border('sred','end'),
			'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
			)
		);

		$roster->tpl->set_filenames(array('accounts_profile' => $addon['basename'] . '/profile.html'));
		$roster->tpl->display('accounts_profile');

		return;
	}
}