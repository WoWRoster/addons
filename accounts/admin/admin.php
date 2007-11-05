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
 * @subpackage User Admin
 */
if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'].'admin.lib.php');

$admin_update = new userAdmin;
if ($admin_update->usePerms == 1) {
$admin_update->accessPage($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], $admin_update->adminGroup); // check page permissions
}

if (isset($_POST['Submit'])) {
	if ($_POST['Submit'] == $roster->locale->act['config_submit_button']) {
		$conf_str = (isset($_POST['confMail'])) ? $_POST['confMail'] : ""; // the checkbox value to send a confirmation mail 
		$admin_update->updateUserByAdmin($_POST['group_id'], $_POST['uid'], $_POST['userPass'], $_POST['userEMail'], $_POST['activation'], $conf_str);
		$admin_update->getUserData($_POST['uname'], "by_uname"); // this is needed to get the modified data after update
	} elseif ($_POST['Submit'] == $roster->locale->act['search']) {
		if (isset($_POST['uname'])) {
			$admin_update->getUserData($_POST['uname'], "by_uname");
		} elseif (isset($_POST['userEMail'])) {
		$admin_update->getUserData($_POST['userEMail'], "by_email");
		}
	}
} elseif (isset($_GET['uid']) && intval($_GET['uid']) > 0) {
		$admin_update->getUserData($_GET['uid'], "uid");
} 

$error = $admin_update->message; // error message

    echo '<!-- Begin Admin Form -->';
    echo border('sgold','start', $roster->locale->act['account_user_admin']);
    echo '<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
	echo     '<tr>';
    echo     '<form name="userAdmin" method="post" action="index.php?p=rostercp-addon-accounts-admin">';
if ($admin_update->userFound == true) {     
	echo         '<td class="membersRow1">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['account_uname'].':</SPAN>';
    echo             '<SPAN style="float:right"><input type="text" name="user" class="wowinput128" value="'.$admin_update->uname.'"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersRow2">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['new_pass'].':</SPAN>';
    echo             '<SPAN style="float:right"><input type="password" name="userPass" class="wowinput128"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersRow1">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['account_email'].'</SPAN>';
    echo             '<SPAN style="float:right"><input type="text" name="userEMail" class="wowinput128" value="'.$admin_update->oldUserEMail.'"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersRow2">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['user_group'].'</SPAN>';
    echo             '<SPAN style="float:right"><input type="text" name="userGroup" class="wowinput128" value="'.$admin_update->accessLevelMenu($admin_update->userGroupID).'"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo	 $admin_update->activationSwitch();
	echo     '<tr>';
	echo         '<td class="membersRow1">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['conf_mail'].':</SPAN>';
    echo             '<SPAN style="float:right"><input type="radio" name="confMail" class="checkBox" value="yes"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersHeader">';
	echo			 '<input type="hidden" name="uid" value="'.$admin_update->uid.'">';
    echo			 '<input type="hidden" name="uname" value="'.$admin_update->uname.'">';
    echo             '<SPAN style="float:right"><input type="submit" name="Submit" value="'.$roster->locale->act['config_submit_button'].'"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
} else {
	echo         '<td class="membersRow1">';
	echo			 '<SPAN style="float:left">'.$roster->locale->act['account_uname'].':</SPAN>';
    echo             '<SPAN style="float:right"><input type="text" name="uname" class="wowinput128"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersRow2">';
    echo             '<SPAN style="float:left">'.$roster->locale->act['account_email'].'</SPAN>';
    echo             '<SPAN style="float:right"><input type="text" name="userEMail" class="wowinput192"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
	echo     '<tr>';
	echo         '<td class="membersHeader">';
    echo             '<SPAN style="float:right"><input type="submit" name="Submit" value="'.$roster->locale->act['search'].'"></SPAN>';
	echo         '</td>';
	echo     '</tr>';
}
    echo     '</form>';
	echo '</table>';
	echo border('sgold','end');
    echo '<p><b>'.(isset($error)) ? $error : "&nbsp;".'</b></p>';
    echo '<p>&nbsp;</p>';
    echo '<p><a href="'.$admin_update->mainPage.'">'.$roster->locale->act['account_main_page'].'</a></p><br />';
	echo '<!-- End Admin Form -->';

?>
