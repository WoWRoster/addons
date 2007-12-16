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
 * @subpackage Index 
 */ 

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'].'user.lib.php');

global $roster;

if (isset($roster->pages[2]))
{
	$fct = $roster->pages[2];
}
elseif( empty($roster->pages[2]) )
{
	// Send a 404. Then the browser knows what's going on as well.
	header('HTTP/1.0 404 Not Found');
	roster_die(sprintf($roster->locale->act['module_not_exist'],ROSTER_PAGE_NAME),$roster->locale->act['roster_error']);
}

switch ( $fct )
{	
	case "register":
		//Display user registration
		registerPage();
		break;
	
	case "activate":
	    //Activate a user password
		activatePass();
		break;

    case "deny":
        //Deny a user access
		if (isset($_SESSION['groupID']))
		{
			$groupID = $_SESSION['groupID'];
		}
		if (isset($_POST['level']))
		{
			$level = trim($_POST['level']);
		}
		elseif (isset($_GET['level']))
		{
			$level = trim($_GET['level']);
		}	
        denyAccess($groupID, $level);
	    break;
	
    case "lost":
        //Find a users lost password
        lostPass();
    	break;
	
	case "logout":
        //Logout a user 
	    $myAccount = new accountUser;
		if (isset($_SESSION['user']) && isset($_SESSION['isLoggedIn']))
		{
		$myAccount->logOut();
		$message = $myAccount->message;
		echo '<p><b>' . (isset($message)) ? $message : "&nbsp;" . '</b></p>';
		if ($roster->config['seo_url'] == 1)
		{
			header('Location: ' . $myAccount->mainRed);
		}
		else
		{
			header('Location: ' . $myAccount->mainPage);
		}
		}
    	break;
	
    case "login":
        //Login a user 
	    loginForm();
    	break;
	
    case "chars":
		// User Characters Page
		charPage();
		break;

	case "guilds":
	    // User Guilds Page
		guildsPage();
		break;

	case "realms":
	    // User Realms Page
		realmsPage();
		break;

	case "settings":
    	// User Profile Settings Page 
		settingsPage();
		break;

	case "index":
        //Display the user profile
		mainPage();
		break;
}

function registerPage()
{
	global $roster, $addon;

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$new_member = new accountUser;
	
	if (isset($_SESSION['user']) && isset($_SESSION['isLoggedIn']))
	{
		header('Location: ' . makelink('util-accounts-index'));
	}

	if (isset($_POST['Submit']))
	{
		$new_member->registerUser($_POST['user'], $_POST['userPass'], $_POST['confirmPass'], $_POST['fname'], $_POST['lname'], $_POST['info'], $_POST['email']); // the register method
	}
 
	$error = $new_member->message; // error message
	
	$roster->tpl->assign_block_vars('accounts_register', array(
		'BORDER_START' => border('sred','start', $roster->locale->act['accounts_reg_form']),
		'REGISTER_TXT' => $roster->locale->act['account_reg_txt'],
		'FORM_LINK' => makelink('util-accounts-register'),
		'UNAME_TXT' => $roster->locale->act['account_uname'],
		'PASS_TXT' => $roster->locale->act['new_pass'],
		'PASS_LEN' => $addon['config']['pass_length'],
		'PASS_CONF_TXT' => $roster->locale->act['new_pass_confirm'],
		'FNAME_TXT' => $roster->locale->act['account_fname'],
		'LNAME_TXT' => $roster->locale->act['account_lname'],
		'EMAIL_TXT' => $roster->locale->act['account_email'],
		'EXTRA_TXT' => $roster->locale->act['account_info'],
		'SUBMIT_BTTN' => $roster->locale->act['submit'],
		'BORDER_END' => border('sred','end'),
		'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
		)
	);

	$roster->tpl->set_filenames(array('accounts_register' => $addon['basename'] . '/register.html'));
	$roster->tpl->display('accounts_register');

}

function activatePass()
{
    global $roster, $addon;
	
    $roster->output['show_menu']['account_menu'] = 1 ;  // Display the button listing
	
	$act_password = new accountUser;

    if (isset($_GET['act_key']) && isset($_GET['uid']))
	{ // these two variables are required for activating/updating the password
	    if ($act_password->checkActivationPass($_GET['act_key'], $_GET['uid']))
		{ // the activation/validation method 
		    $_SESSION['act_key'] = $_GET['act_key']; // put the activation string into a session or into a hdden field
		    $_SESSION['uid'] = $_GET['uid']; // this id is the key where the record have to be updated with new pass
	    } 
    }
    if (isset($_POST['Submit']))
	{
	    if ($act_password->activateNewPass($_POST['userPass'], $_POST['confirmPass'], $_SESSION['act_key'], $_SESSION['uid']))
		{ // this will change the password
		    unset($_SESSION['act_key']);
		    unset($_SESSION['uid']); // inserts new password only ones!
	    }
	    $act_password->user = $_POST['user']; // to hold the user name in this screen (new in version > 1.77)
    } 
    $error = $act_password->message;

    if (isset($_SESSION['act_key']))
	{
		echo '<!-- Begin Password Activation -->';
        echo border('sred','start', $roster->locale->act['account_act_pass']);
        echo '<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
		echo     '<tr>';
        echo         '<th class="membersHeader">';	
        echo              $roster->locale->act['account_act_pass_txt'] . '<b>' . $act_password->user . '</b>.</p><br />';
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
        echo     '<input type="hidden" name="user" value="' . $act_password->user . '">';
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
        echo '<h2>' . $roster->locale->act['account'] . '</h2>';
    }
    echo '</table>';
    echo border('sred','end');
    echo '<p><b>' . (isset($error)) ? $error : "&nbsp;" . '</b></p>';
    echo '<p>&nbsp;</p>';
    echo '<!-- End Password Activation -->';
    echo '<center><p><a href="' . makelink('util-accounts-login') . '">' . $roster->locale->act['login'] . '</a></p></center>';

return;
}

function denyAccess($groupID, $level)
{
    global $roster, $addon;
	
	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing
	
	$access_denied = new accountUser;
	
	$roster->tpl->assign_block_vars('accounts_deny', array(
		'BORDER_START' => border('sred','start', $roster->locale->act['account_no_access']),
		'ACCESS_TXT' => $roster->locale->act['account_no_access_txt'],
		'INDEX_LINK' => makelink('util-accounts-index'),
		'INDEX_TXT' => $roster->locale->act['account_main_page'],
		'GROUP_ID' => $groupID,
		'REQ_LVL' => $level,
		'BORDER_END' => border('sred','end'),
		)
	);

	$roster->tpl->set_filenames(array('accounts_deny' => $addon['basename'] . '/deny.html'));
	$roster->tpl->display('accounts_deny');

}

function lostPass()
{
    global $roster, $addon;
	
	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing
	
	$renew_password = new accountUser;

    if (isset($_POST['Submit']))
	{
	    $renew_password->forgotPass($_POST['email']);
    } 
    $error = $renew_password->message;
	
	$roster->tpl->assign_block_vars('accounts_lost', array(
		'BORDER_START' => border('sred','start', $roster->locale->act['account_forgot']),
		'FORGOT_TXT' => $roster->locale->act['account_forgot_txt'],
		'FORM_LINK' => makelink('util-accounts-lost'),
		'EMAIL_TXT' => $roster->locale->act['account_email'],
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

function loginForm()
{
    global $roster, $addon;

    $roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$myAccount = new accountUser;
	
	if (isset($_SESSION['user']) && isset($_SESSION['isLoggedIn']))
	{
		header('Location: '.makelink('util-accounts-index'));
	}

    if (isset($_GET['act_key']) && isset($_GET['uid']))
	{ // these two variables are required for activating/updating the account/password
	    $myAccount->activateAccount($_GET['act_key'], $_GET['uid']); // the activation method 
    }

    if (isset($_GET['validate']) && isset($_GET['uid']))
	{ // these two variables are required for activating/updating the new e-mail address
	    $myAccount->validateEMail($_GET['validate'], $_GET['uid']); // the validation method 
    }

	$myAccount->loginReader();

    if (isset($_POST['Submit']))
	{
	    $myAccount->saveLogin = (isset($_POST['remember'])) ? $_POST['remember'] : 'no'; // use a cookie to remember the login
	    $myAccount->countVisit = true; // if this is true then the last visitdate is saved in the database
	    $myAccount->loginUser($_POST['user'], $_POST['userPass']); // call the login method
    } 
    $error = $myAccount->message;
	
	$roster->tpl->assign_block_vars('accounts_login', array(
		'BORDER_START' => border('sred','start', $roster->locale->act['auth_req']),
		'LOGIN_TXT' => $roster->locale->act['account_login_txt'],
		'FORM_LINK' => makelink('util-accounts-login'),
		'UNAME_TXT' => $roster->locale->act['account_uname'],
		'PASS_TXT' => $roster->locale->act['password'],
		'REM_TXT' => $roster->locale->act['remember_login'],
		'LOGIN_BTTN' => $roster->locale->act['login'],
		'BORDER_END' => border('sred','end'),
		'MESSAGE' => (isset($error)) ? $error : "&nbsp;",
		'REGISTER_TXT' => $roster->locale->act['account_no_register'],
		'REGISTER_LINK' => makelink('util-accounts-register'),
		'REGISTER_CLICK' => $roster->locale->act['click'],
		'LOST_LINK' => makelink('util-accounts-lost'),
		'LOST_TXT' => $roster->locale->act['account_forgot'],
		)
	);

	$roster->tpl->set_filenames(array('accounts_login' => $addon['basename'] . '/login.html'));
	$roster->tpl->display('accounts_login');
 
}

function charPage()
{
	global $roster, $addon;

	include_once (ROSTER_ADDONS . 'memberslist/inc/memberslist.php');

	$charlist = new memberslist(array('group_alts'=>-1));
	
	$uid = $_SESSION['uid'];

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

	'FROM `'.$roster->db->table('user_link',$addon['basename']).'` AS user_link '.
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
	'value' => array($charlist,'name_value'),
	'js_type' => 'ts_string',
	'display' => 3,
);

$FIELD['class'] = array (
	'lang_field' => 'class',
	'order'    => array( '`members`.`class` ASC' ),
	'order_d'    => array( '`members`.`class` DESC' ),
	'value' => array($charlist,'class_value'),
	'js_type' => 'ts_string',
	'display' => $addon['config']['member_class'],
);

$FIELD['level'] = array (
	'lang_field' => 'level',
	'order_d'    => array( '`members`.`level` ASC' ),
	'value' => array($charlist,'level_value'),
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
	'value' => array($charlist,'honor_value'),
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
	'value' => array($charlist,'last_online_value'),
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
	
	$chars_page = new accountUser;
	if ($chars_page->usePerms == 1)
	{
		$chars_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $chars_page->minAccess); // check page permissions
	}

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$roster->tpl->assign_block_vars('accounts_chars', array(
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_chars_page']),
		'CHARS_LIST' => $charlist->makeMembersList(),
		'BORDER_END' => border('sblue','end'),
		)
	);

	$addon = getaddon('accounts');
	
	$roster->tpl->set_filenames(array('accounts_chars' => $addon['basename'] . '/chars.html'));
	$roster->tpl->display('accounts_chars');

}

function guildsPage()
{
	global $roster, $addon;

	include_once (ROSTER_ADDONS . 'memberslist/inc/memberslist.php');

	$guildlist = new memberslist(array('group_alts'=>-1));
	
	$uid = $_SESSION['uid'];

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

		'FROM `'.$roster->db->table('user_link',$addon['basename']).'` AS user_link '.
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

	$guilds_page = new accountUser;
	if ($guilds_page->usePerms == 1)
	{
		$guilds_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $guilds_page->minAccess); // check page permissions
	}

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$roster->tpl->assign_block_vars('accounts_guilds', array(
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_guilds_page']),
		'GUILD_LIST' => $guildlist->makeMembersList(),
		'BORDER_END' => border('sblue','end'),
		)
	);

	$roster->tpl->set_filenames(array('accounts_guilds' => $addon['basename'] . '/guilds.html'));
	$roster->tpl->display('accounts_guilds');

}

function realmsPage()
{
	global $roster, $addon;

	include_once (ROSTER_ADDONS . 'memberslist/inc/memberslist.php');

	$realmlist = new memberslist(array('group_alts'=>-1));
	
	$uid = $_SESSION['uid'];

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

		'FROM `'.$roster->db->table('user_link', $addon['basename']).'` AS user_link '.
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

	$realms_page = new accountUser;
	if ($realms_page->usePerms == 1)
	{
		$realms_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $realms_page->minAccess); // check page permissions
	}

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$roster->tpl->assign_block_vars('accounts_realms', array(
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_realms_page']),
		'REALMS_LIST' => $realmlist->makeMembersList(),
		'BORDER_END' => border('sblue','end'),
		)
	);

	$roster->tpl->set_filenames(array('accounts_realms' => $addon['basename'] . '/realms.html'));
	$roster->tpl->display('accounts_realms');

}

function settingsPage()
{
	global $roster, $addon;

	$settings_page = new accountUser;
	if ($settings_page->usePerms == 1)
	{
		$settings_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $settings_page->minAccess); // check page permissions
	}

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing
	
	$roster->tpl->assign_block_vars('accounts_settings', array(
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_settings_page']),
		'BORDER_END' => border('sblue','end'),
		)
	);

	$roster->tpl->set_filenames(array('accounts_settings' => $addon['basename'] . '/settings.html'));
	$roster->tpl->display('accounts_settings');

}

function mainPage()
{
	global $roster, $addon;

	$main_page = new accountUser;
	if ($main_page->usePerms == 1)
	{
		$main_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $main_page->minAccess); // check page permissions
	}

	$userInfo = $main_page->getUserInfo($_SESSION['user'], $_SESSION['userPass']);

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing
	
	$roster->tpl->assign_block_vars('accounts_index', array(
		'USER_LINK' => makelink('util-accounts-profile-' . $_SESSION['user']),
		'LOGOUT' => makelink('util-accounts-logout'),
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_main_page']),
		'USER' => $_SESSION['user'],
		'FNAME' => $_SESSION['userFName'],
		'LNAME' => $userInfo->userLName,
		'GROUPID' => $_SESSION['groupID'],
		'EMAIL' => $userInfo->userEMail,
		'BORDER_END' => border('sblue','end'),
		)
	);
	
	$roster->tpl->set_filenames(array('accounts_index' => $addon['basename'] . '/index.html'));
	$roster->tpl->display('accounts_index');

}

/**
 * Controls Output of the Tradeskill Icons Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function tradeskill_icons ( $row )
{
	global $roster;

	$addon = getaddon('memberslist');

	$cell_value ='';

	// Don't proceed for characters without data
	if ($row['clientLocale'] == '')
	{
		return '<div>&nbsp;</div>';
	}

	$lang = $row['clientLocale'];

	$profs = explode(',',$row['professions']);
	foreach ( $profs as $prof )
	{
		$r_prof = explode('|',$prof);
		$toolTip = (isset($r_prof[1]) ? str_replace(':','/',$r_prof[1]) : '');
		$toolTiph = $r_prof[0];

		if( $r_prof[0] == $roster->locale->wordings[$lang]['riding'] )
		{
			if( $row['class']==$roster->locale->wordings[$lang]['Paladin'] || $row['class']==$roster->locale->wordings[$lang]['Warlock'] )
			{
				$icon = $roster->locale->wordings[$lang]['ts_ridingIcon'][$row['class']];
			}
			else
			{
				$icon = $roster->locale->wordings[$lang]['ts_ridingIcon'][$row['race']];
			}
		}
		else
		{
			$icon = isset($roster->locale->wordings[$lang]['ts_iconArray'][$r_prof[0]])?$roster->locale->wordings[$lang]['ts_iconArray'][$r_prof[0]]:'';
		}

		// Don't add professions we don't have an icon for. This keeps other skills out.
		if ($icon != '')
		{
			$icon = '<img class="membersRowimg" width="'.$addon['config']['icon_size'].'" height="'.$addon['config']['icon_size'].'" src="'.$roster->config['interface_url'].'Interface/Icons/'.$icon.'.'.$roster->config['img_suffix'].'" alt="" '.makeOverlib($toolTip,$toolTiph,'',2,'',',RIGHT,WRAP').' />';

			if( active_addon('info') )
			{
				$cell_value .= '<a href="' . makelink('char-info-recipes&amp;a=c:' . $row['member_id'] . '#' . strtolower(str_replace(' ','',$r_prof[0]))) . '">' . $icon . '</a>';
			}
			else
			{
				$cell_value .= $icon;
			}
		}
	}
	return $cell_value;
}

/**
 * Controls Output of a Note Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function note_value ( $row, $field )
{
	global $roster;

	$addon = getaddon('memberslist');

	if( !empty($row[$field]) )
	{
		$note = htmlspecialchars(nl2br($row[$field]));

		if( $addon['config']['compress_note'] )
		{
			$note = '<img src="'.$roster->config['img_url'].'note.gif" style="cursor:help;" '.makeOverlib($note,$roster->locale->act['note'],'',1,'',',WRAP').' alt="" />';
		}
		else
		{
			$value = $note;
		}
	}
	else
	{
		$note = '&nbsp;';
		if( $addon['config']['compress_note'] )
		{
			$note = '<img src="'.$roster->config['img_url'].'no_note.gif" alt="No Note" />';
		}
		else
		{
			$value = $note;
		}
	}

	return '<div style="display:none; ">'.htmlentities($row[$field]).'</div>'.$note;
}

/**
 * Controls Output of the Guild Name Column
 *
 * @param array $row
 * @return string - Formatted output
 */
function guild_value ( $row, $field )
{
	global $roster;

	if( $row['guild_id'] )
	{
		return '<div style="display:none; ">' . $row['guild_name'] . '</div><a href="' . makelink('guild-memberslist&amp;a=g:' . $row['guild_id']) . '">' . $row['guild_name'] . '</a></div>';
	}
	else
	{
		return '<div style="display:none; ">' . $row['guild_name'] . '</div>' . $row['guild_name'];
	}
}

/**
 * Controls Output of the Realm Name Column
 *
 * @param array $row
 * @return string - Formatted output
 */
function realm_value ( $row, $field )
{
	global $roster;

	return '<div style="display:none; ">' . $row['server_name'] . '</div>' . $row['server_name'];
}

/**
 * Controls Output of the Region Name Column
 *
 * @param array $row
 * @return string - Formatted output
 */
function region_value ( $row, $field )
{
	global $roster;

	return '<div style="display:none; ">' . $row['server_region'] . '</div>' . $row['server_region'];
}

/**
 * Controls Output of the Region Name Column
 *
 * @param array $row
 * @return string - Formatted output
 */
function servertype_value ( $row, $field )
{
	global $roster;

	return '<div style="display:none; ">' . $row['servertype'] . '</div>' . $row['servertype'];
}

/**
 * Controls Output of the Region Name Column
 *
 * @param array $row
 * @return string - Formatted output
 */
function serverstatus_value ( $row, $field )
{
	global $roster;

	return '<div style="display:none; ">' . $row['serverstatus'] . '</div>' . $row['serverstatus'];
}

/**
 * Controls Output of the Region Name Column
 *
 * @param array $row
 * @return string - Formatted output
 */
function serverpop_value ( $row, $field )
{
	global $roster;

	return '<div style="display:none; ">' . $row['serverpop'] . '</div>' . $row['serverpop'];
}


/**
 * Controls Output of the Faction Column
 *
 * @param array $row
 * @return string - Formatted output
 */
function faction_value ( $row, $field )
{
	global $roster;

	$addon = getaddon('memberslist');
	
	if ( $row['factionEn'] )
	{
		$faction = ( isset($row['factionEn']) ? $row['factionEn'] : '' );

		switch( substr($faction,0,1) )
		{
			case 'A':
				$icon = '<img src="' . $roster->config['img_url'] . 'icon_alliance.png" alt="" width="' . $addon['config']['icon_size'] . '" height="' . $addon['config']['icon_size'] . '"/> ';
				break;
			case 'H':
				$icon = '<img src="' . $roster->config['img_url'] . 'icon_horde.png" alt="" width="' . $addon['config']['icon_size'] . '" height="' . $addon['config']['icon_size'] . '"/> ';
				break;
			default:
				$icon = '<img src="' . $roster->config['img_url'] . 'icon_neutral.png" alt="" width="' . $addon['config']['icon_size'] . '" height="' . $addon['config']['icon_size'] . '"/> ';
				break;
		}
	}
	else
	{
		$icon = '';
	}

	$cell_value = $icon . $row['faction'];

	return '<div style="display:none; ">' . $row['faction'] . '</div>' . $cell_value;
}
