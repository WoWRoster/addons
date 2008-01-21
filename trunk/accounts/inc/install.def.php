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

    var $version = '1.9.9.92'; 
	var $wrnet_id = '0';

    var $fullname = 'Accounts'; 
    var $description = 'Adds individual user account and registration options to WoW Roster.'; 
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
        $installer->add_config("110,'acc_display',NULL,'blockframe','menu'");
		$installer->add_config("120,'acc_perms',NULL,'blockframe','menu'");
        $installer->add_config("130,'acc_user','rostercp-addon-accounts-admin','makelink','menu'");
		$installer->add_config("140,'acc_plugin','rostercp-addon-accounts-plugin','blockframe','menu'");
		$installer->add_config("150,'acc_recruit','NULL','blockframe','menu'");
		$installer->add_config("160,'acc_reg_conf','NULL','blockframe','menu'");

		// Accounts config settings
		$installer->add_config("1000, 'acc_char_conf', '1', 'radio{on^1|off^0', 'acc_display'");	
		$installer->add_config("1010, 'acc_realm_conf', '1', 'radio{on^1|off^0', 'acc_display'");
		$installer->add_config("1020, 'acc_guild_conf', '1', 'radio{on^1|off^0', 'acc_display'");
		$installer->add_config("1030, 'acc_save_login', '1', 'radio{on^1|off^0', 'acc_display'");
		$installer->add_config("1040, 'acc_cookie_name', 'wr_user', 'text{30|30', 'acc_display'");
		$installer->add_config("1050, 'acc_auto_act', '1', 'radio{on^1|off^0', 'acc_display'");
		$installer->add_config("1060, 'acc_admin_copy', '1', 'radio{on^1|off^0', 'acc_display'");
		$installer->add_config("1070, 'acc_admin_mail', 'admin@yourroster.com', 'text{30|30', 'acc_display'");
		$installer->add_config("1080, 'acc_admin_name', 'Roster Admin', 'text{30|30', 'acc_display'");
		$installer->add_config("1090, 'acc_pass_length', '5', 'text{30|30', 'acc_display'");
		$installer->add_config("1100, 'acc_uname_length', '5', 'text{30|30', 'acc_display'");
		
		// Page Permissions settings
		$installer->add_config("2000, 'acc_use_perms', '1', 'radio{on^1|off^0', 'acc_perms'");
		$installer->add_config("2010, 'acc_admin_level', '3', 'text{30|4', 'acc_perms'");
		$installer->add_config("2020, 'acc_min_access', '1', 'text{30|4', 'acc_perms'");
		
		// User administration settings
        $installer->add_config("3000, 'acc_uname', '', 'text{30|24', 'acc_user'");
		$installer->add_config("3010, 'acc_fname', '', 'text{30|24', 'acc_user'"); 
        $installer->add_config("3020, 'acc_lname', '', 'text{30|24', 'acc_user'");
		$installer->add_config("3030, 'acc_pass', '', 'text{30|24', 'acc_user'");
		$installer->add_config("3040, 'acc_email', '', 'text{30|24', 'acc_user'");
		$installer->add_config("3050, 'acc_city', '', 'text{30|24', 'acc_user'");
		$installer->add_config("3060, 'acc_country', '', 'text{30|24', 'acc_user'");
		$installer->add_config("3070, 'acc_homepage', '', 'text{64|24', 'acc_user'");
		$installer->add_config("3080, 'acc_notes', '', 'text{64|24', 'acc_user'");
		$installer->add_config("3090, 'acc_extra_info', '', 'text{256|128', 'acc_user'");

		// Plugin settings
		$installer->add_config("4000, 'acc_use_plugins', '1', 'radio{on^1|off^0', 'acc_plugin'");
		
		// Recruitment settings
		$installer->add_config("5000, 'acc_use_recruit', '1', 'radio{on^1|off^0', 'acc_recruit'");
		$installer->add_config("5010, 'acc_rec_status', 'closed', 'select{Open^open|Closed^closed', 'acc_recruit'");
		$installer->add_config("5020, 'acc_rec_druid', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5030, 'acc_rec_hunter', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5040, 'acc_rec_mage', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5050, 'acc_rec_paladin', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5060, 'acc_rec_priest', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5070, 'acc_rec_rouge', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5080, 'acc_rec_shaman', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5090, 'acc_rec_warlock', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");
		$installer->add_config("5100, 'acc_rec_warrior', 'closed', 'select{High^high|Medium^medium|Low^low|Closed^closed', 'acc_recruit'");

		// Registration settings
		$installer->add_config("6000, 'acc_reg_text', 'Welcome to our site! Please register.', 'text{256|128', 'acc_reg_conf'");

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
			`last_login` varchar(64) NOT NULL default '',
			`date_joined` varchar(64) NOT NULL default '',
			`tmp_mail` varchar(32) NOT NULL default '',
			`group_id` smallint(6) NOT NULL default '1',
			`active` INT(11) NOT NULL default '0',
			`online` INT(11) NOT NULL default '0',
			PRIMARY KEY (`uid`),
			UNIQUE KEY `user` (`uname`),
			UNIQUE KEY `mail` (`email`)"
			);

		$installer->create_table($installer->table('user_link'),"
			`uid` INT(11) unsigned NOT NULL default '0',
			`member_id` INT(11) unsigned NOT NULL default '0',
			`guild_id` INT(11) unsigned NOT NULL default '0',
			`group_id` smallint(6) NOT NULL default '1',
			`is_main` smallint(6) NOT NULL default '0',
			`realm` varchar(32) NOT NULL default '',
			PRIMARY KEY (`member_id`),
			KEY `uid` (`uid`)"
			);

		$installer->create_table($installer->table('plugin'),"
			`plugin_id` INT(11) NOT NULL auto_increment,
			`basename` varchar(16) NOT NULL default '',
			`version` varchar(16) NOT NULL default '0',
			`active` INT(1) NOT NULL default '1',
			`fullname` tinytext NOT NULL,
			`description` mediumtext NOT NULL,
			`credits` mediumtext NOT NULL,
			`icon` varchar(64) NOT NULL default '',
			`versioncache` tinytext,
			PRIMARY KEY (`plugin_id`)"
			);

		$installer->create_table($installer->table('plugin_config'),"
			`plugin_id` INT(11) NOT NULL default '0',
			`id` INT(11) unsigned NOT NULL,
			`config_name` varchar(255) default NULL,
			`config_value` tinytext,
			`form_type` mediumtext,
			`config_type` varchar(255) default NULL,
			PRIMARY KEY (`id`,`plugin_id`)"
			);

		$installer->create_table($installer->table('recruitment'),"
			`status` varchar(32) NOT NULL,
			`druid` varchar(32) NOT NULL,
			`hunter` varchar(32) NOT NULL,
			`mage` varchar(32) NOT NULL,
			`paladin` varchar(32) NOT NULL,
			`priest` varchar(32) NOT NULL,
			`rouge` varchar(32) NOT NULL,
			`shaman` varchar(32) NOT NULL,
			`warlock` varchar(32) NOT NULL,
			`warrior` varchar(32) NOT NULL"
			);

		$installer->create_table($installer->table('applicants'),"
			`id` INT(11) NOT NULL auto_increment,
			`name` varchar(32) NOT NULL,
			`age` varchar(32) NOT NULL,
			`class` varchar(32) NOT NULL,
			`level` varchar(32) NOT NULL,
			`profile` varchar(32) NOT NULL,
			`location` varchar(32) NOT NULL,
			`email` varchar(32) NOT NULL,
			`other_guilds` varchar(32) NOT NULL,
			`why` varchar(32) NOT NULL,
			`about` varchar(32) NOT NULL,
			PRIMARY KEY (`id`)"
			);

		//Account menu
		$installer->add_menu_pane('acc_menu');
		
		// Roster menu links
        $installer->add_menu_button('acc_index','util','main');
		$installer->add_menu_button('acc_register_bttn','acc_menu','util-accounts-register','inv_misc_note_02');
        $installer->add_menu_button('acc_characters','acc_menu','util-accounts-chars','spell_holy_divinespirit');
        $installer->add_menu_button('acc_guilds','acc_menu','util-accounts-guilds','inv_misc_tabardpvp_02'); 
        $installer->add_menu_button('acc_realms','acc_menu','util-accounts-realms','spell_holy_lightsgrace');
		$installer->add_menu_button('acc_settings','acc_menu','util-accounts-settings','inv_misc_wrench_02'); 

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
		$installer->remove_menu_pane('acc_menu');  

        $installer->drop_table($installer->table('user'));
		$installer->drop_table($installer->table('user_link'));
		$installer->drop_table($installer->table('plugin'));
		$installer->drop_table($installer->table('plugin_config'));
		$installer->drop_table($installer->table('recruitment'));
		$installer->drop_table($installer->table('applicants'));

        return true; 
    } 
} 
