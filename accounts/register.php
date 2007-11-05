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
 * @subpackage Register 
 */ 

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['inc_dir'].'user.lib.php');

global $roster;

$roster->output['show_menu'] = array('main','util','guild','realm','account_menu');  // Display the button listing

$new_member = new accountUser;
	
	if (isset($_SESSION['user']) && isset($_SESSION['isLoggedIn'])) {
		header("Location: " . $new_member->mainPage);
	}

if (isset($_POST['Submit'])) {
	$new_member->registerUser($_POST['user'], $_POST['userPass'], $_POST['confirmPass'], $_POST['fname'], $_POST['lname'], $_POST['info'], $_POST['email']); // the register method
}
 
$error = $new_member->message; // error message

echo '<!-- Begin User Registration -->';
echo     border('sred','start', $roster->locale->act['account_reg_form']);
echo	'<table class="bodyline" cellspacing="0" cellpadding="0" width="100%">';
echo	     '<tr>';
echo		    '<th class="membersHeader">';
echo                $roster->locale->act['account_reg_txt'].'<br />';
echo			'</th>';
echo         '</tr>';
echo         '<tr>';
echo            '<form name="regForm" method="post" action="index.php?p=util-accounts-register">';
echo            '<td class="membersRow1">';
echo	            '<SPAN style="float:left">'.$roster->locale->act['account_uname'].':</SPAN>';
echo                '<SPAN style="float:right"><input type="text" name="user" class="wowinput128">* (min. '.$addon['config']['pass_length'].' chars.) </SPAN>';
echo			'</td>';
echo         '</tr>';
echo         '<tr>';
echo			'<td class="membersRow2">';
echo                '<SPAN style="float:left">'.$roster->locale->act['new_pass'].':</SPAN>';
echo                '<SPAN style="float:right"><input type="password" name="userPass" class="wowinput128">* (min. '.$addon['config']['pass_length'].' chars.) </SPAN>';
echo			'</td>';
echo         '</tr>';
echo         '<tr>';
echo			'<td class="membersRow1">';
echo                '<SPAN style="float:left">'.$roster->locale->act['new_pass_confirm'].':</SPAN>';
echo                '<SPAN style="float:right"><input type="password" name="confirmPass" class="wowinput128">*</SPAN>';
echo			'</td>';
echo         '</tr>';
echo         '<tr>';
echo			'<td class="membersRow2">';
echo                '<SPAN style="float:left">'.$roster->locale->act['account_fname'].':</SPAN>';
echo                '<SPAN style="float:right"><input type="text" name="fname" class="wowinput128"></SPAN>';
echo	        '</td>';
echo         '</tr>';
echo         '<tr>';
echo			'<td class="membersRow1">';
echo	            '<SPAN style="float:left">'.$roster->locale->act['account_lname'].':</SPAN>';
echo                '<SPAN style="float:right"><input type="text" name="lname" class="wowinput128"></SPAN>';
echo			'</td>';
echo         '</tr>';
echo         '<tr>';
echo			'<td class="membersRow2">';
echo                '<SPAN style="float:left">'.$roster->locale->act['account_email'].':</SPAN>';
echo                '<SPAN style="float:right"><input type="text" name="email" class="wowinput192">*</SPAN>';
echo			'</td>';
echo         '</tr>';
echo         '<tr>';
echo			'<td class="membersRow1">';
echo                '<SPAN style="float:left">'.$roster->locale->act['account_info'].':</SPAN>';
echo                '<SPAN style="float:right"><input type="text" name="info" class="wowinput192"></SPAN>';
echo			'</td>';
echo         '</tr>';
echo         '<tr>';
echo			'<td class="membersHeader">';
echo                '<div align="right"><input type="submit" name="Submit" value="'.$roster->locale->act['submit'].'"></div>';
echo			'</td>';
echo            '</form>';
echo		'</tr>';
echo	'</table>';
echo	border('sred','end');
echo    '<p><b>'.(isset($error)) ? $error : "&nbsp;".'</b></p>';
echo    '<p>&nbsp;</p>';
echo	'<!-- End User Registration -->';

?>