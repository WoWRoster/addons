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
 * @subpackage Installer 
 */ 

if ( !defined('ROSTER_INSTALLED') ) 
{ 
    exit('Detected invalid access to this file!'); 
} 

/** 
 * Installer for Accounts Addon 
 * @package    Accounts 
 * @subpackage Installer 
 */ 
class accountsInstall 
{ 
    var $active = true; 
    var $icon = 'inv_misc_groupneedmore'; 

    var $version = '1.9.9.46'; 
	var $wrnet_id = '0';

    var $fullname = 'Accounts'; 
    var $description = 'Adds individual user account options to WoW Roster.'; 
    var $credits = array( 
    	array(  'name'=>    'mdeshane', 
            	'info'=>    'Original Author'),
		array(	'name'=>	'WoWRoster Dev Team',
				'info'=>	'Some Original Coding')
    ); 


    /** 
    * Install Function 
    * 
    * @return bool 
    */ 
    function install() 
    { 
        global $installer; 

        // Master and menu entries 
        $installer->add_config("1,'startpage','display','display','master'");
		
		// Config menu entries 
        $installer->add_config("110,'display',NULL,'blockframe','menu'");
		$installer->add_config("120,'perms',NULL,'blockframe','menu'"); 
        $installer->add_config("130,'user','rostercp-addon-accounts-admin','makelink','menu'");
		$installer->add_config("140,'character',NULL,'blockframe','menu'");
		$installer->add_config("150,'realm',NULL,'blockframe','menu'"); 
		$installer->add_config("160,'guild',NULL,'blockframe','menu'");
		
		// Accounts config settings
		$installer->add_config("1000, 'char_conf', '1', 'radio{on^1|off^0', 'display'");	
		$installer->add_config("1010, 'realm_conf', '1', 'radio{on^1|off^0', 'display'");
		$installer->add_config("1020, 'guild_conf', '1', 'radio{on^1|off^0', 'display'");
		$installer->add_config("1030, 'save_login', '1', 'radio{on^1|off^0', 'display'");
		$installer->add_config("1040, 'cookie_name', 'wr_user', 'text{30|30', 'display'");
		$installer->add_config("1050, 'auto_act', '1', 'radio{on^1|off^0', 'display'");
		$installer->add_config("1060, 'admin_copy', '1', 'radio{on^1|off^0', 'display'");
		$installer->add_config("1070, 'admin_mail', 'admin@yoursite.com', 'text{30|30', 'display'");
		$installer->add_config("1080, 'admin_name', 'adminName', 'text{30|30', 'display'");
		$installer->add_config("1090, 'pass_length', '5', 'text{30|30', 'display'");
		$installer->add_config("1100, 'uname_length', '5', 'text{30|30', 'display'");
		
		// Page Permissions settings
		$installer->add_config("2000, 'use_perms', '1', 'radio{on^1|off^0', 'perms'");
		$installer->add_config("2010, 'admin_level', '3', 'text{30|4', 'perms'");
		$installer->add_config("2020, 'min_access', '1', 'text{30|4', 'perms'");
		
		// User administration settings
        $installer->add_config("3000, 'uname', '', 'text{30|24', 'user'");
		$installer->add_config("3010, 'fname', '', 'text{30|24', 'user'"); 
        $installer->add_config("3020, 'lname', '', 'text{30|24', 'user'");
		$installer->add_config("3030, 'pass', '', 'text{30|24', 'user'");
		$installer->add_config("3040, 'email', '', 'text{30|24', 'user'");
		$installer->add_config("3050, 'city', '', 'text{30|24', 'user'");
		$installer->add_config("3060, 'country', '', 'text{30|24', 'user'");
		$installer->add_config("3070, 'homepage', '', 'text{64|24', 'user'");
		$installer->add_config("3080, 'notes', '', 'text{64|24', 'user'");
		$installer->add_config("3090, 'extra_info', '', 'text{256|128', 'user'");
		
		// Character config settings
		$installer->add_config("4000,'char_update_inst','0','radio{Off^0|On^1','character'");
		
		// Realm config settings
		$installer->add_config("5000, 'realmview_conf', '1', 'radio{on^1|off^0', 'realm'");
		
		// Guild config settings
		$installer->add_config("6000, 'guildview_conf', '1', 'radio{on^1|off^0', 'guild'");
		
		// Build db tables
		$installer->create_table($installer->table('user'),"
			`uid` INT(11) NOT NULL auto_increment,
			`uname` varchar(30) NOT NULL default '',
			`fname` varchar(30) NOT NULL default '',
			`lname` varchar(30) NOT NULL default '',
			`pass` varchar(32) NOT NULL default '',
			`email` varchar(32) NOT NULL default '',
			`city` varchar(32) NOT NULL default '',
			`country` varchar(32) NOT NULL default '',
			`homepage` varchar(64) NOT NULL default '',
			`notes` varchar(64) NOT NULL default '',
			`extra_info` varchar(256) NOT NULL default '',
			`tmp_mail` varchar(32) NOT NULL default '',
			`group_id` smallint(6) NOT NULL default '1',
			`active` INT(11) NOT NULL default '0',
			PRIMARY KEY (`uid`),
			UNIQUE KEY `user` (`uname`),
			UNIQUE KEY `mail` (`email`)");

		$installer->create_table($installer->table('user_link'),"
			`uid` INT(11) unsigned NOT NULL default '0',
			`member_id` INT(11) unsigned NOT NULL default '0',
			`guild_id` INT(11) unsigned NOT NULL default '0',
			`group_id` smallint(6) NOT NULL default '1',
			`is_main` smallint(6) NOT NULL default '0',
			UNIQUE KEY `member_id`(`member_id`),
			INDEX KEY `uid` (`uid`)");

		$installer->create_table( $installer->table('page_perms'),"
			`pid` INT(11) NOT NULL auto_increment,
			`scope` varchar(32) NOT NULL default '',
			`page` varchar(32) NOT NULL default '',
			`addon` varchar(32) NOT NULL default '',
			`allowed_groups` INT(11) unsigned NOT NULL default '0',
			PRIMARY KEY (`pid`),
			UNIQUE KEY `group` (`allowed_groups`)");
		  

		//Account menu
		$installer->add_menu_pane('account_menu');
		
		// Roster menu links
        $installer->add_menu_button('account_index','util','index');
		$installer->add_menu_button('account_register_bttn','account_menu','util-accounts-register','inv_misc_note_02');
		$installer->add_menu_button('account_login_bttn','account_menu','util-accounts-login','inv_misc_punchcards_prismatic');
		$installer->add_menu_button('account_logout_bttn','account_menu','util-accounts-logout','inv_misc_punchcards_red');
        $installer->add_menu_button('account_characters','account_menu','util-accounts-chars','spell_holy_divinespirit');
        $installer->add_menu_button('account_guilds','account_menu','util-accounts-guilds','inv_misc_tabardpvp_02'); 
        $installer->add_menu_button('account_realms','account_menu','util-accounts-realms','spell_holy_lightsgrace');
		$installer->add_menu_button('account_settings','account_menu','util-accounts-settings','inv_misc_wrench_02'); 

        return true; 
    } 

    /** 
    * Upgrade Function 
    * 
    * @param string $oldversion 
    * @return bool 
    */ 
    function upgrade($oldversion) 
    {         
		// Nothing to upgrade from yet 
        global $installer;

		return false; 
    } 

    /** 
    * Un-Install Function 
    * 
    * @return bool 
    */ 
    function uninstall() 
    { 
        global $installer, $roster; 

        $installer->remove_all_config(); 
        $installer->remove_all_menu_button();
		$installer->remove_menu_pane('account_menu');  

        $installer->drop_table($installer->table('user'));
		$installer->drop_table($installer->table('user_link'));
		$installer->drop_table($installer->table('page_perms'));

        return true; 
    } 
} 
