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
$lang['menupanel_acc_menu']		= 'Account';

// Menu Buttons
$lang['acc_menu_index'] = 'My Account|Displays your characters, guilds, and realms.';
$lang['acc_menu_register'] = 'Register|Displays the account registration page.';
$lang['acc_menu_chars'] = 'My Characters|Displays your characters.';
$lang['acc_menu_guilds'] = 'My Guilds|Displays your guilds.';
$lang['acc_menu_realms'] = 'My Realms|Displays your realms.';
$lang['acc_menu_mail'] = 'My Mail|Displays your mail from other users.';
$lang['acc_menu_settings'] = 'Settings|Displays the user settings.';

// Main Menu
$lang['acc_main_menu'] = array(
	'my_prof' => 'My Profile|View your profile.',
	'chars' => 'My Characters|View your characters.',
	'guilds' => 'My Guilds|View your guilds.',
	'realms' => 'My Realms|View your realms.',
	'mail' => 'My Mail|View your sent and recived messages.',
	'char' => 'Character Settings|Edit the display settings for your characters.',
	'prof' => 'Profile Settings|Edit the display settings for your profile.',
);

// Mail Menu
$lang['acc_mail_menu'] = array(
      'inbox' => 'Inbox|View your messages.',
      'outbox' => 'Outbox|View your sent messages.',
      'write' => 'Write|Compose a new message.',
);

// Application wordings
$lang['acc_app'] = array(
	'app_txt' => 'Please fill in the following fields (fields with * are required).',
	'user_hd' => '<strong>User Information</strong>',
	'inf_hd' => '<strong>Personal Information</strong> (strictly confidential)',
	'ext_inf' => '<strong>Extra Information</strong>',
	'age' => 'Age',
	'zone' => 'Time Zone',
	'homepage' => 'Home Page',
	'guilds' => 'Other Guilds (Comma seperated)',
	'why' => 'Why would you like to join our guild?',
	'about' => 'Tell us about yourself.',
	'notes' => 'Other notes',
);

// Form class wordings
$lang['acc_form']['zone'] = array(
	'ACT' => 'Australia Central Time',
	'AET' => 'Australia Eastern Time',
	'AGT' => 'Argentina Standard Time',
	'ART' => '(Arabic) Egypt Standard Time',
	'AST' => 'Alaska Standard Time',
	'BET' => 'Brazil Eastern Time',
	'BST' => 'Bangladesh Standard Time',
	'CAT' => 'Central African Time',
	'CNT' => 'Canada Newfoundland Time',
	'CST' => 'Central Standard Time',
	'CTT' => 'China Taiwan Time',
	'EAT' => 'Eastern African Time',
	'ECT' => 'European Central Time',
	'EET' => 'Eastern European Time',
	'EST' => 'Eastern Standard Time',
	'GMT' => 'Greenwich Mean Time',
	'HST' => 'Hawaii Standard Time',
	'IET' => 'Indiana Eastern Standard Time',
	'IST' => 'India Standard Time',
	'JST' => 'Japan Standard Time',
	'MET' => 'Middle East Time',
	'MIT' => 'Midway Islands Time',
	'MST' => 'Mountain Standard Time',
	'NET' => 'Near East Time',
	'NST' => 'New Zealand Standard Time',
	'PLT' => 'Pakistan Lahore Time',
	'PNT' => 'Phoenix Standard Time',
	'PRT' => 'Puerto Rico and US Virgin Islands Time',
	'PST' => 'Pacific Standard Time',
	'SST' => 'Solomon Standard Time',
	'VST' => 'Vietnam Standard Time',
);
$lang['acc_form']['month'] = array(
		'1' => 'January',
		'2' => 'February',
		'3' => 'March',
		'4' => 'April',
		'5' => 'May',
		'6' => 'June',
		'7' => 'July',
		'8' => 'August',
		'9' => 'September',
		'10' => 'October',
		'11' => 'November',
		'12' => 'December',
);

// Interface wordings
$lang['acc_int'] = array(
	'register' => 'Register',
	'no_register' => 'Not registered yet?',
	'main_txt' => 'Welcome %s, you are currently viewing the Accounts Main Page.<br />Please select from the options on the right.',
	'uname' => 'User Name',
	'fname' => 'First Name',
	'lname' => 'Last Name',
	'city' => 'City',
	'state' => 'State',
	'country' => 'Country',
	'email' => 'E-Mail',
	'ugroup' => 'User Group',
	'homepage' => 'Homepage',
	'date_joined' => 'Date Joined',
	'last_login' => 'Last Login',
	'is_online' => 'User is %s',
	'group' => 'Group Password',
	'login_txt' => 'Please enter your username and password.',
	'no_login' => 'You must be logged in to view this page.',
	'reg_txt' => 'Please fill in the following fields (fields with * are required).',
	'act_pass' => 'Enter your new password here, ',
	'no_access' => 'You are not allowed to view this page!',
	'forgot' => 'Forgot your username/password?',
	'forgot_txt' => 'Please enter the e-mail address that you used during registration.',
	'remember' => 'Remember login?',
	'login' => 'Login',
	'logged_out' => 'You have successfully been logged out!',
	'click' => 'Click here.',
	'conf_mail' => 'Confirmation E-Mail',
	'rec_txt' => 'Recruitment is',
);
$lang['acc_int']['messaging'] = array(
	'body' => 'Message',
	'read' => 'Read',
	'title' => 'Title',
	'sender' => 'Sender',
	'reciever' => 'Reciever',
	'date_rec' => 'Date Recieved',
	'date_sent' => 'Date Sent',
	'inbox' => 'Inbox',
	'outbox' => 'Outbox',
	'write' => 'New Message',
	'menu' => 'Mail Menu',
	'reply' => 'Reply',
	'main' => 'Welcome, to the Accounts Messaging(Mail) System!<br />This messaging system has all the basics that<br />you would find in any other website mail system.',
);

// Page names
$lang['acc_page'] = array(
	'main' => 'Accounts Main',
	'info' => 'User Info',
	'menu' => 'User Menu',
	'profile' => "%s's Profile",
	'user_admin' => 'User Admin',
	'no_access' => 'Access Denied!',
	'register' => 'Accounts Registration',
	'recruitment' => 'User Recruitment',
	'application' => 'User Application',
	'registration' => 'User Registration',
	'user_act' => 'User Activation',
	'pass_act' => 'Password Activation',
	'settings' => 'My Settings',
	'realms' => 'My Realms',
	'guilds' => 'My Guilds',
	'chars' => 'My Characters',
	'messaging' => 'My Mail',
	'login' => 'User Login',
);

// Config page names
$lang['admin']['acc_display']	= 'Configuration|Configure options specific to accounts.';
$lang['admin']['acc_perms']		= 'Page Permissions|Set which groups can view which pages.';
$lang['admin']['acc_user']		= 'User Config|Configure your account.';
$lang['admin']['acc_plugin']	= 'Manage Plugins|Install plugins to extend the user system.';
$lang['admin']['acc_recruit']	= 'Recruitment Config|Configure your recruitment settings.';
$lang['admin']['acc_register']	= 'Registration Config|Configure the settings for user registration.';
$lang['admin']['acc_session']	= 'Session Config|Configure the settings for accounts sessions.';

// Plugins Installer 
$lang['pagebar_plugininst']		= 'Manage Plugins';
$lang['installer_plugininfo']	= 'Description';

// Settings on config config
$lang['admin']['acc_char_conf'] 	= 'Character Config|Should users configure their character viewing options?';
$lang['admin']['acc_realm_conf']	= 'Realm Config|Should users configure their realm viewing options?';
$lang['admin']['acc_guild_conf']  	= 'Guild Config|Should users configure their guild viewing options?';
$lang['admin']['acc_save_login']  	= 'Save Login|Use a cookie to remember the client login?';
$lang['admin']['acc_cookie_name']	= 'Cookie Name|Name for your session cookies.';
$lang['admin']['acc_auto_act']  	= 'Auto Activation|Should users be activated automatically?';
$lang['admin']['acc_use_app']		= 'Use Application|Should new users use the application?';
$lang['admin']['acc_admin_copy']  	= 'Activation Copy|Should the admin recieve a copy of the activation email?';
$lang['admin']['acc_admin_mail']  	= 'Admin E-Mail|Please enter the administrator email.';
$lang['admin']['acc_admin_name']  	= 'Admin Name|Please enter the administrators name.';
$lang['admin']['acc_pass_length']	= 'Password Length|Please enter the minimum length for user passwords.';
$lang['admin']['acc_uname_length']	= 'Username Length|Please enter the minimum length for usernames.';

// Settings on perms config
$lang['admin']['acc_use_perms']		= 'Use Permissions|Should page permissions be used?';
$lang['admin']['acc_min_access']	= 'Access Level|Minimum level for page access.';
$lang['admin']['acc_admin_level']	= 'Admin Level|The level for administration access.';

// Settings on user config
$lang['admin']['acc_uname']			= 'Username|Edit your username.';
$lang['admin']['acc_fname']			= 'First Name|Edit your first name.';
$lang['admin']['acc_lname']			= 'Last Name|Edit your last name.';
$lang['admin']['acc_pass']			= 'Password|Edit your password.';
$lang['admin']['acc_email']			= 'E-Mail|Edit your email address.';
$lang['admin']['acc_city']			= 'City|Edit your city.';
$lang['admin']['acc_country']		= 'Country|Edit your country.';
$lang['admin']['acc_homepage']		= 'Homepage|Edit the url to your homepage.';
$lang['admin']['acc_notes']			= 'Notes|Edit your notes.';
$lang['admin']['acc_extra_info']	= 'Extra Info|Add any extra info.';

//Settings on plugin config
$lang['admin']['acc_use_plugins']	= 'Use Plugins|Should plugins be used?';

//Settings on recruitment config
$lang['admin']['acc_use_recruit']	= 'Use Recruitment|Should recruitment be used?';
$lang['admin']['acc_rec_status']	= 'Recruitment Status|Current status for recruitment.';
$lang['admin']['acc_rec_druid']		= 'Druid|Current recruitment level.';
$lang['admin']['acc_rec_hunter']	= 'Hunter|Current recruitment level.';
$lang['admin']['acc_rec_mage']		= 'Mage|Current recruitment level.';
$lang['admin']['acc_rec_paladin']	= 'Paladin|Current recruitment level.';
$lang['admin']['acc_rec_priest']	= 'Priest|Current recruitment level.';
$lang['admin']['acc_rec_rouge']		= 'Rouge|Current recruitment level.';
$lang['admin']['acc_rec_shaman']	= 'Shaman|Current recruitment level.';
$lang['admin']['acc_rec_warlock']	= 'Warlock|Current recruitment level.';
$lang['admin']['acc_rec_warrior']	= 'Warrior|Current recruitment level.';

// Settings on registration config
$lang['admin']['acc_reg_text']		= 'Registration Text|Edit the welcome text on registration.';

// Settings on session config
$lang['admin']['acc_sess_time']		= 'Session Time|Edit the length of time before a session is ended.';

// User class messages
$lang['acc_user'] = array(
	'msg10' => 'Username and/or password did not match to the database.',
	'msg11' => 'Username and/or password is empty!',
	'msg12' => 'Sorry, a user with this login and/or e-mail address already exist.',
	'msg13' => 'Please check your e-mail and follow the instructions.',
	'msg14' => 'Sorry, an error occurred please try again.',
	'msg15' => 'Sorry, an error occurred please try again later.',
	'msg16' => 'The e-mail address is not valid.',
	'msg17' => 'The field login (min. %d char.) is required.',
	'msg18' => 'Your request has been processed. Login to continue.',
	'msg19' => 'Sorry, cannot activate your account.',
	'msg20' => 'There is no account to activate.',
	'msg21' => 'Sorry, this activation key is not valid!',
	'msg22' => 'Sorry, there is no active account that matches with this e-mail address.',
	'msg23' => 'Please check your e-mail to get your new password.',
	'msg25' => 'Sorry, cannot activate your password.',
	'msg26' => 'New user request...',
	'msg27' => 'Please check your e-mail and activate your modification(s).',
	'msg28' => 'Your request must be processed...',
	'msg29' => 'Hello %s,\r\n\r\nto activate your request click the following link:\r\n%s&uid=%d&act_key=%s',
	'msg30' => 'Your account is modified.',
	'msg31' => 'This e-mail address already exists, please use another one.',
	'msg32' => 'The field password (min. %d char) is required.',
	'msg33' => 'Hello %s,\r\n\r\nthe new e-mail address must be validated, click the following link:\r\n%s&uid=%d&validate=%s',
	'msg34' => 'There is no e-mail address for validation.',
	'msg35' => 'Hello %s,\r\n\r\nEnter your new password next, please click the following link to enter the form:\r\n%s&uid=%d&act_key=%s',
	'msg36' => "Your request has been processed and is pending validation by the admin. \r\nYou will get an e-mail if it's done.",
	'msg37' => "Hello %s,\r\n\r\nThe account is active and it's possible to login now.\r\n\r\nClick on this link to access the login page:\r\n%s\r\n\r\nkind regards\r\n%s",
	'msg38' => 'The confirmation password does not match the password. Please try again.',
	'msg39' => 'New user registration on %s:\r\n\r\nClick here to enter the admin page:\r\n\r\n%s',
);

// Profile class messages
$lang['acc_profile'] = array(
	'msg1' => 'There is no profile data at the moment.',
	'msg2' => 'Your profile data is up to date.',
	'msg3' => 'There was an error during update, please try again.',
);

// Memberslist Wordings
$lang['acc_charlist'] = array(
	'online' => 'Online at Update',
	'second' => '%s second ago',
	'seconds' => '%s seconds ago',
	'minute' => '%s minute ago',
	'minutes' => '%s minutes ago',
	'hour' => '%s hour ago',
	'hours' => '%s hours ago',
	'day' => '%s day ago',
	'days' => '%s days ago',
	'week' => '%s week ago',
	'weeks' => '%s weeks ago',
	'month' => '%s month ago',
	'months' => '%s months ago',
	'year' => '%s year ago',
	'years' => '%s years ago',
	'accounts' => 'Accounts',
	'motd' => 'MOTD',
	'xp' => '%1$s XP until level %2$s',
);

// Realmlist Wordings
$lang['acc_rs'] = array(
	'up' => 'Up',
	'down' => 'Down',
	'maintenance' => 'Maintenance',
	'rppvp' => 'RP-PvP',
	'pve' => 'Normal',
	'pvp' => 'PvP',
	'rp' => 'RP',
	'low' => 'Low',
	'medium' => 'Medium',
	'high' => 'High',
	'max' => 'Max',
	'offline' => 'Offline',
	'error' => 'Unknown',
	'servertype' => 'Realm Type',
	'serverstatus' => 'Realm Status',
	'serverpop' => 'Realm Population',
);

// Character/Profile Settings
$lang['acc_settings'] = array(
	'set' => 'Settings|Edit the display settings for your characters.',
	'prof' => 'Profile|Edit the display settings for your profile.',
	'profile' => 'Profile Display',
	'tab1' => 'Character',
	'tab2' => 'Pet',
	'tab3' => 'Reputation',
	'tab4' => 'Skills',
	'tab5' => 'PvP',
	'mailbox' => 'Mailbox',
	'spellbook' => 'Spellbook',
	'talents' => 'Talents',
	'item_bonuses' => 'Item Bonuses',
	'fname' => 'First Name',
	'lname' => 'Last Name',
	'email' => 'Email',
	'city' => 'City',
	'country' => 'Country',
	'homepage' => 'Homepage',
	'notes' => 'Notes',
	'joined' => 'Date Joined',
	'lastlogin' => 'Last Login',
	'chars' => 'Characters',
	'guilds' => 'Guilds',
	'realms' => 'Realms',
	'main' => 'Main Character',
	'src_gen' => 'Avatar / Signature',
);
