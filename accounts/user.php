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
 * @subpackage User 
 */ 

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'].'user.lib.php');

global $roster;

$fct = '';
if (isset($_GET['fct'])) {
	$fct = trim($_GET['fct']);
}
if (isset($_POST['fct'])) {
	$fct = trim($_POST['fct']);
}

if (!$fct) {
    $fct = 'default';
}else{
    switch ( $fct )
    {	
		case "activate":
		    //Activate a user password
			activatePass();
	
	    case "deny":
	        //Deny a user access
			if (isset($_SESSION['groupID'])) {
				$groupID = $_SESSION['groupID'];
			}
			if (isset($_POST['level'])) {
				$level = trim($_POST['level']);
			} elseif (isset($_GET['level'])) {
				$level = trim($_GET['level']);
			}	
	        denyAccess($groupID, $level);
	    break;
	
	    case "lost":
	        //Find a users lost password
	        lostPass();
	    break;
	
	    case "login":
	        //Login a user 
		    loginForm();
	    break;
		
		case "logout":
		    //Logout a user 
			$logout = new accountUser;
			$logout->logOut();
		break;
	
	    case "default":
		default:
	        //Display the user profile
		    userProfile();
	    break;
    }
}

function activatePass()
{
    global $roster;
	
    $roster->output['show_menu'] = array('main','util','guild','realm','account_menu');  // Display the button listing
	
	$act_password = new accountUser;

    if (isset($_GET['act_key']) && isset($_GET['uid'])) { // these two variables are required for activating/updating the password
	    if ($act_password->checkActivationPass($_GET['act_key'], $_GET['uid'])) { // the activation/validation method 
		    $_SESSION['act_key'] = $_GET['act_key']; // put the activation string into a session or into a hdden field
		    $_SESSION['uid'] = $_GET['uid']; // this id is the key where the record have to be updated with new pass
	    } 
    }
    if (isset($_POST['Submit'])) {
	    if ($act_password->activateNewPass($_POST['userPass'], $_POST['confirmPass'], $_SESSION['act_key'], $_SESSION['uid'])) { // this will change the password
		    unset($_SESSION['act_key']);
		    unset($_SESSION['uid']); // inserts new password only ones!
	    }
	    $act_password->user = $_POST['user']; // to hold the user name in this screen (new in version > 1.77)
    } 
    $error = $act_password->message;

    if (isset($_SESSION['act_key'])) {
	    echo '<!-- Begin Password Activation -->';
        echo border('sred','start', $roster->locale->act['account_act_pass']);
        echo '<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
		echo     '<tr>';
        echo         '<th class="membersHeader">';	
        echo              $roster->locale->act['account_act_pass_txt'].'<b>'.$act_password->user.'</b>.</p><br />';
		echo         '</th>';
		echo     '</tr>';
		echo     '<tr>';
        echo     '<form name="passAct" method="post" action="index.php?p=util-accounts-user&fct=actpass">';
		echo         '<td class="membersRow1">';
        echo             '<SPAN style="float:left">'.$roster->locale->act['new_pass'].':</SPAN>';
        echo             '<SPAN style="float:right"><input type="password" name="userPass" class="wowinput128"></SPAN>';
		echo         '</td>';
		echo         '<td class="membersRow2">';
        echo             '<SPAN style="float:left">'.$roster->locale->act['new_pass_confirm'].':</SPAN>';
        echo             '<SPAN style="float:right"><input type="password" name="confirmPass" class="wowinput128"></SPAN>';
		echo         '</td>';
        echo     '<input type="hidden" name="user" value="'.$act_password->user.'">';
        echo     '</tr>';
		echo     '<tr>';
        echo         '<td class="membersHeader">';
        echo             '<div align="right"><input type="submit" name="Submit" value="'.$roster->locale->act['submit'].'"></div>';
        echo         '</td>';
        echo     '</form>';
        echo     '</tr>';
    } else {
        echo '<h2>'.$roster->locale->act['account'].'</h2>';
    }
    echo '</table>';
    echo border('sred','end');
    echo '<p><b>'.(isset($error)) ? $error : "&nbsp;".'</b></p>';
    echo '<p>&nbsp;</p>';
    echo '<!-- End Password Activation -->';
    echo '<center><p><a href="'.$act_password->loginPage.'">'.$roster->locale->act['login'].'</a></p></center>';

return;
}

function denyAccess($groupID, $level)
{
    global $roster;
	
	$roster->output['show_menu'] = array('main','util','guild','realm','account_menu');  // Display the button listing
	
	$access_denied = new accountUser;
	echo '<!-- Begin Deny Message -->';
    echo border('sred','start', $roster->locale->act['account_no_access']);
    echo '<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
    echo     '<tr>';
    echo         '<td>';	
    echo              '<br />&nbsp;'.$roster->locale->act['account_no_access_txt'].'&nbsp;';
	echo              '<p>&nbsp;</p>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<th class="membersHeader">';
    echo              '<center><a href="'.$access_denied->mainPage.'">'.$roster->locale->act['account_main_page'].'</a></center>';
	echo         '</th>';
	echo	 '</tr>';
	echo	 '<tr>';
	echo		 '<td class = "membersHeader">';
	echo		      'Your access level: '.$groupID.'<br />Required access level: '.$level;
	echo		 '</td>';
	echo     '</tr>';
	echo '</table>';
	echo border('sred','end');
	echo '<!-- End Deny Message -->';

return;	
}

function lostPass()
{
    global $roster;
	
	$roster->output['show_menu'] = array('main','util','guild','realm','account_menu');  // Display the button listing
	
	$renew_password = new accountUser;

    if (isset($_POST['Submit'])) {
	    $renew_password->forgotPass($_POST['email']);
    } 
    $error = $renew_password->message;
	
	echo '<!-- Begin Lost Password Form -->';
    echo border('sred','start', $roster->locale->act['account_forgot']);
    echo '<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
    echo     '<tr>';
    echo         '<th class="membersHeader">';
    echo              $roster->locale->act['account_forgot_txt'];
	echo         '</th>';
	echo     '</tr>';
	echo     '<tr>';
    echo     '<form name="lostPass" method="post" action="index.php?p=util-accounts-user&fct=lost">';
	echo         '<td class="membersRow1">';
    echo              '<SPAN style="float:left">'.$roster->locale->act['account_email'].':</SPAN>';
    echo              '<SPAN style="float:right"><input type="text" name="email" class="wowinput192"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersHeader">';
    echo             '<center><input type="submit" name="Submit" value="'.$roster->locale->act['submit'].'"></center>';
	echo         '</td>';
	echo     '</tr>';
    echo     '</form>';
	echo '</table>';
	echo border('sred','end');
    echo '<p><b>'.(isset($error)) ? $error : "&nbsp;".'</b></p>';
    echo '<p>&nbsp;</p>';
    echo '<p><a href="'.$renew_password->loginPage.'">'.$roster->locale->act['login'].'</a></p>';
	echo '<!-- End Lost Password Form -->';

return;
}

function loginForm()
{
    global $roster;

    $roster->output['show_menu'] = array('main','util','guild','realm','account_menu');  // Display the button listing
	
	$myAccount = new accountUser;
	
	if (isset($_SESSION['user']) && isset($_SESSION['isLoggedIn'])) {
		header("Location: " . $myAccount->logOutPage);
	}
	
    $myAccount->loginReader();

    if (isset($_GET['act_key']) && isset($_GET['uid'])) { // these two variables are required for activating/updating the account/password
	    $myAccount->activateAccount($_GET['act_key'], $_GET['uid']); // the activation method 
    }

    if (isset($_GET['validate']) && isset($_GET['uid'])) { // these two variables are required for activating/updating the new e-mail address
	    $myAccount->validateEMail($_GET['validate'], $_GET['uid']); // the validation method 
    }

    if (isset($_POST['Submit'])) {
	    $myAccount->saveLogin = (isset($_POST['remember'])) ? $_POST['remember'] : "no"; // use a cookie to remember the login
	    $myAccount->countVisit = true; // if this is true then the last visitdate is saved in the database
	    $myAccount->loginUser($_POST['user'], $_POST['userPass']); // call the login method
    } 
    $error = $myAccount->message;

    echo '<!-- Begin Login Form -->';
    echo border('sred','start', $roster->locale->act['auth_req']);
    echo '<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
    echo     '<tr>';
    echo         '<th class="membersHeader">';
    echo              $roster->locale->act['account_login_txt'];
	echo         '</th>';
	echo     '</tr>';
	echo     '<tr>';
    echo     '<form name="accountLogin" method="post" action="index.php?p=util-accounts-user&fct=login">';
	echo         '<td class="membersRow1">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['account_uname'].':</SPAN>';
    echo             '<SPAN style="float:right"><input type="text" name="user" class="wowinput128"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersRow2">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['password'].':</SPAN>';
    echo             '<SPAN style="float:right"><input type="password" name="userPass" class="wowinput128"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersRow1">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['remember_login'].'</SPAN>';
    echo             '<SPAN style="float:right"><input type="checkbox" name="remember" value="checked">';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersHeader">';
    echo             '<SPAN style="float:right"><input type="submit" name="Submit" value="'.$roster->locale->act['login'].'"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
    echo     '</form>';
	echo '</table>';
	echo border('sred','end');
    echo '<p><b>'.(isset($error)) ? $error : "&nbsp;".'</b></p>';
    echo '<p>&nbsp;</p>';
    echo '<p>'.$roster->locale->act['account_no_register'].' <a href="'.makelink('util-accounts-register').'">'.$roster->locale->act['click'].'</a></p><br />';
    echo '<p><a href="'.makelink('util-accounts-user&fct=lost').'">'.$roster->locale->act['account_forgot'].'</a></p>';
	echo '<!-- End Login Form -->';

return;	  
}

function userProfile()
{
    global $roster;
	
	$roster->output['show_menu'] = array('main','util','guild','realm','account_menu');  // Display the button listing
	
	$profile = new accountUser;
	
	// Start output
	echo "<br />\n".border('sblue','start', $roster->locale->act['account_profile_page'])."\n";
	echo "<br />";
	echo "User:".$profile->user."<br />";
	echo "First Name:".$profile->userFName."<br />";
	echo "Last Name:".$profile->userLName."<br />";
	echo "User Group:".$profile->groupID."<br />";
	echo "User E-Mail:".$profile->userEMail."<br />";
	echo border('sblue','end');

}

?>