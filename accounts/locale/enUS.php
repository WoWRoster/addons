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
 * @subpackage Locale enUS
 */

// -[ enUS Localization ]-

// Menu Panel
$lang['menupanel_account_menu'] = 'Account';

// Button names
$lang['account_index']        	= 'My Account|Displays your characters, guilds, and realms.';
$lang['account_register_bttn']  = 'Register|Displays the account registration page.';
$lang['account_user_bttn']      = 'Login/LogOut|Displays the login|logout|lost password page.';
$lang['account_characters']  	= 'My Characters|Displays your characters.';
$lang['account_guilds']      	= 'My Guilds|Displays your guilds.';
$lang['account_realms']      	= 'My Realms|Displays your realms.';

// Interface wordings
$lang['account_register']       = 'Register';
$lang['account_no_register']    = 'Not registered yet?';
$lang['account_uname']			= 'User Name';
$lang['account_fname']          = 'First Name';
$lang['account_lname']          = 'Last Name';
$lang['account_email']          = 'E-Mail';
$lang['account_info']           = 'More Info';
$lang['account_login_txt']      = 'Please enter your username and password.';
$lang['account_no_login']		= 'You must be logged in to view this page.';
$lang['account_reg_txt']        = 'Please fill in the following fields (fields with a * are required).';
$lang['account_act_pass_txt']   = 'Enter your new password here, ';
$lang['account_no_access_txt']  = 'You are not allowed to view this page!';
$lang['account_main_page']      = 'Accounts Main Page';
$lang['account_forgot']         = 'Forgot your username/password?';
$lang['account_forgot_txt']     = 'Please enter the e-mail address what you used during registration.';
$lang['remember_login']         = 'Remember login?';
$lang['login']                  = 'Login';
$lang['logged_out']             = 'You have successfully been logged out!';
$lang['click']                  = 'Click here.';
$lang['user_group']             = 'User Group';
$lang['conf_mail']				= 'Confirmation E-Mail';

// Page names
$lang['account_profile_page']   = 'Accounts Profile Page';
$lang['account_main_page']      = 'Accounts Main Page';
$lang['account_user_admin']     = 'User Admin Page';
$lang['account_no_access']      = 'Access Denied!';
$lang['account_reg_form']       = 'User Registration';
$lang['account_act_pass']       = 'Password Activation';
$lang['admin']['display']    	= 'Configuration|Configure options specific to accounts.';
$lang['admin']['perms']         = 'Page Permissions|Set which groups can view which pages.';
$lang['admin']['user']       	= 'User Config|Configure your account.';
$lang['admin']['character']  	= 'Character Config|Configure your characters.';
$lang['admin']['realm']      	= 'Realm Config|Configure your realms.';
$lang['admin']['guild']     	= 'Guild Config|Configure your guilds.';

// Settings on config page
$lang['admin']['char_conf'] 	= 'Character Config|Should users configure their character viewing options?';
$lang['admin']['realm_conf']	= 'Realm Config|Should users configure their realm viewing options?';
$lang['admin']['guild_conf']  	= 'Guild Config|Should users configure their guild viewing options?';
$lang['admin']['save_login']  	= 'Save Login|Use a cookie to remember the client login?';
$lang['admin']['cookie_name']  	= 'Cookie Name|Name for your session cookies.';
$lang['admin']['auto_act']  	= 'Auto Activation|Should users be activated automatically?';
$lang['admin']['admin_copy']  	= 'Activation Copy|Should the admin recieve a copy of the activation email?';
$lang['admin']['admin_mail']  	= 'Admin E-Mail|Please enter the administrator email.';
$lang['admin']['admin_name']  	= 'Admin Name|Please enter the administrators name.';
$lang['admin']['pass_length']  	= 'Password Length|Please enter the minimum length for user passwords.';
$lang['admin']['uname_length']  = 'Username Length|Please enter the minimum length for usernames.';

// Settings on perms page
$lang['admin']['use_perms']     = 'Use Permissions|Should page permissions be used?';
$lang['admin']['min_access']    = 'Access Level|Minimum level for page access.';
$lang['admin']['admin_level']   = 'Admin Level|The level for administration access.';

// Settings on user page
$lang['admin']['uname']      	= 'Username|Edit your username.';
$lang['admin']['fname']      	= 'First Name|Edit your first name.';
$lang['admin']['lname']      	= 'Last Name|Edit your last name.';
$lang['admin']['pass']       	= 'Password|Edit your password.';
$lang['admin']['email']         = 'E-Mail|Edit your email address.';
$lang['admin']['city']          = 'City|Edit your city.';
$lang['admin']['country']       = 'Country|Edit your country.';
$lang['admin']['homepage']      = 'Homepage|Edit the url to your homepage.';
$lang['admin']['notes']         = 'Notes|Edit your notes.';
$lang['admin']['extra_info']    = 'Extra Info|Add any extra info.';

// Settings on character page
$lang['admin']['char_update_inst'] = 'Ummm|HA HA HA';

// Settings on realm page
$lang['admin']['realmview_conf'] = 'Ummm|HA HA HA';

// Settings on guild page
$lang['admin']['guildview_conf'] = 'Ummm|HA HA HA';

// User class messages
$lang['account_user']['msg10'] = "Username and/or password did not match to the database.";
$lang['account_user']['msg11'] = "Username and/or password is empty!";
$lang['account_user']['msg12'] = "Sorry, a user with this login and/or e-mail address already exist.";
$lang['account_user']['msg13'] = "Please check your e-mail and follow the instructions.";
$lang['account_user']['msg14'] = "Sorry, an error occurred please try again.";
$lang['account_user']['msg15'] = "Sorry, an error occurred please try again later.";
$lang['account_user']['msg16'] = "The e-mail address is not valid.";
$lang['account_user']['msg17'] = "The field login (min. %d char.) is required.";
$lang['account_user']['msg18'] = "Your request has been processed. Login to continue.";
$lang['account_user']['msg19'] = "Sorry, cannot activate your account.";
$lang['account_user']['msg20'] = "There is no account to activate.";
$lang['account_user']['msg21'] = "Sorry, this activation key is not valid!";
$lang['account_user']['msg22'] = "Sorry, there is no active account that matches with this e-mail address.";
$lang['account_user']['msg23'] = "Please check your e-mail to get your new password.";
$lang['account_user']['msg25'] = "Sorry, cannot activate your password.";
$lang['account_user']['msg26'] = "New user request...";
$lang['account_user']['msg27'] = "Please check your e-mail and activate your modification(s).";
$lang['account_user']['msg28'] = "Your request must be processed...";
$lang['account_user']['msg29'] = "Hello %s,\r\n\r\nto activate your request click the following link:\r\n%s&uid=%d&act_key=%s";
$lang['account_user']['msg30'] = "Your account is modified.";
$lang['account_user']['msg31'] = "This e-mail address already exists, please use another one.";
$lang['account_user']['msg32'] = "The field password (min. %d char) is required.";
$lang['account_user']['msg33'] = "Hello %s,\r\n\r\nthe new e-mail address must be validated, click the following link:\r\n%s&uid=%d&validate=%s";
$lang['account_user']['msg34'] = "There is no e-mail address for validation.";
$lang['account_user']['msg35'] = "Hello %s,\r\n\r\nEnter your new password next, please click the following link to enter the form:\r\n%s&uid=%d&act_key=%s";
$lang['account_user']['msg36'] = "Your request has been processed and is pending validation by the admin. \r\nYou will get an e-mail if it's done.";
$lang['account_user']['msg37'] = "Hello %s,\r\n\r\nThe account is active and it's possible to login now.\r\n\r\nClick on this link to access the login page:\r\n%s\r\n\r\nkind regards\r\n%s";
$lang['account_user']['msg38'] = "The confirmation password does not match the password. Please try again.";
$lang['account_user']['msg39'] = "New user registration on %s:\r\n\r\nClick here to enter the admin page:\r\n\r\n%s";

// Profile class messages
$lang['account_profile']['msg1'] = "There is no profile data at the moment.";
$lang['account_profile']['msg2'] = "Your profile data is up to date.";
$lang['account_profile']['msg3'] = "There was an error during update, please try again.";
