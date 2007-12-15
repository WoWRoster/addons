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

	$chars_page = new accountUser;
	if ($chars_page->usePerms == 1)
	{
		$chars_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $chars_page->minAccess); // check page permissions
	}

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$roster->tpl->assign_block_vars('accounts_chars', array(
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_chars_page']),
		'BORDER_END' => border('sblue','end'),
		)
	);

	$roster->tpl->set_filenames(array('accounts_chars' => $addon['basename'] . '/chars.html'));
	$roster->tpl->display('accounts_chars');

}

function guildsPage()
{
	global $roster, $addon;

	$guilds_page = new accountUser;
	if ($guilds_page->usePerms == 1)
	{
		$guilds_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $guilds_page->minAccess); // check page permissions
	}

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$roster->tpl->assign_block_vars('accounts_guilds', array(
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_guilds_page']),
		'BORDER_END' => border('sblue','end'),
		)
	);

	$roster->tpl->set_filenames(array('accounts_guilds' => $addon['basename'] . '/guilds.html'));
	$roster->tpl->display('accounts_guilds');

}

function realmsPage()
{
	global $roster, $addon;

	$realms_page = new accountUser;
	if ($realms_page->usePerms == 1)
	{
		$realms_page->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $realms_page->minAccess); // check page permissions
	}

	$roster->output['show_menu']['account_menu'] = 1;  // Display the button listing

	$roster->tpl->assign_block_vars('accounts_realms', array(
		'BORDER_START' => border('sblue','start', $roster->locale->act['accounts_realms_page']),
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
