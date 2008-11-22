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

      var $version = '1.9.9.940'; 
	var $wrnet_id = '0';

      var $fullname = 'Accounts'; 
      var $description = 'Adds individual user account and registration options to WoW Roster.'; 
      var $credits = array( 
            array('name' => 'mdeshane',
                  'info' => 'Original Author'),
            array('name' => 'WoWRoster Dev Team',
		    'info' => 'Some Original Coding')
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
		$installer->add_config("160,'acc_register','NULL','blockframe','menu'");
		$installer->add_config("170,'acc_session','NULL','blockframe','menu'");

		// Accounts config settings
		$installer->add_config("1000, 'acc_char_conf', '1', 'radio{on^1|off^0', 'acc_display'");	
		$installer->add_config("1010, 'acc_realm_conf', '1', 'radio{on^1|off^0', 'acc_display'");
		$installer->add_config("1020, 'acc_guild_conf', '1', 'radio{on^1|off^0', 'acc_display'");
		$installer->add_config("1030, 'acc_admin_mail', 'admin@yourroster.com', 'text{30|30', 'acc_display'");
		$installer->add_config("1040, 'acc_admin_name', 'Roster Admin', 'text{30|30', 'acc_display'");
		
		
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
		$installer->add_config("6000, 'acc_reg_text', 'Welcome to our site! Please register.', 'text{256|128', 'acc_register'");
		$installer->add_config("6010, 'acc_use_app', '1', 'radio{on^1|off^0', 'acc_register'");
		$installer->add_config("6020, 'acc_uname_length', '5', 'text{30|30', 'acc_register'");
		$installer->add_config("6030, 'acc_pass_length', '5', 'text{30|30', 'acc_register'");
		$installer->add_config("6040, 'acc_auto_act', '1', 'radio{on^1|off^0', 'acc_register'");
		$installer->add_config("6050, 'acc_admin_copy', '1', 'radio{on^1|off^0', 'acc_register'");

		// Session settings
		$installer->add_config("7000, 'acc_sess_time', '15', 'text{30|4', 'acc_session'");
		$installer->add_config("7010, 'acc_save_login', '1', 'radio{on^1|off^0', 'acc_session'");
		$installer->add_config("7020, 'acc_cookie_name', 'wr_user', 'text{30|30', 'acc_session'");

		// Build db tables
		$installer->create_table($installer->table('user'),"
		    `uid` INT(11) NOT NULL auto_increment,
		    `uname` varchar(30) NOT NULL default '',
		    `pass` varchar(32) NOT NULL default '',
		    `fname` varchar(30) NOT NULL default '',
		    `lname` varchar(30) NOT NULL default '',
		    `age` varchar(32) NOT NULL default '',
		    `email` varchar(32) NOT NULL default '',
		    `city` varchar(32) NOT NULL default '',
		    `state` varchar(32) NOT NULL default '',
		    `country` varchar(32) NOT NULL default '',
		    `zone` varchar(32) NOT NULL default '',
		    `homepage` varchar(64) NOT NULL default '',
		    `other_guilds` varchar(64) NOT NULL,
		    `why` varchar(64) NOT NULL,
		    `about` varchar(64) NOT NULL,
		    `notes` varchar(64) NOT NULL default '',
		    `last_login` varchar(64) NOT NULL default '',
		    `date_joined` varchar(64) NOT NULL default '',
		    `tmp_mail` varchar(32) NOT NULL default '',
		    `group_id` smallint(6) NOT NULL default '1',
		    `is_member` INT(11) NOT NULL default '0',
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
			`region` varchar(32) NOT NULL default '',
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

		$installer->create_table($installer->table('session'),"
			`SID` varchar(32) NOT NULL default '',
			`lastact` INT(11) NOT NULL default '0',
			`IP` varchar(32) NOT NULL default '',
			`agent` varchar(255) NOT NULL default '',
			`uid` INT(11) NOT NULL default '0',
			`user` varchar(32) NOT NULL default '',
			`pass` varchar(32) NOT NULL default '',
			`groupID` smallint(6) NOT NULL default '0',
			`isLoggedIn` varchar(10) NOT NULL default '0',
			`_referer` varchar(255) NOT NULL default 'wowroster.net',
			`_current` varchar(255) NOT NULL default 'wowroster.net',
			PRIMARY KEY  (`SID`)"
		);

		$installer->create_table($installer->table('profile'),"
			`uid` INT(11) NOT NULL,
			`signature` varchar(255) NOT NULL,
			`avatar` varchar(255) NOT NULL,
			`avsig_src` varchar(32) NOT NULL,
			`show_fname` INT(11) NOT NULL default '0',
			`show_lname` INT(11) NOT NULL default '0',
			`show_email` INT(11) NOT NULL default '0',
			`show_city` INT(11) NOT NULL default '0',
			`show_country` INT(11) NOT NULL default '0',
			`show_homepage` INT(11) NOT NULL default '0',
			`show_notes` INT(11) NOT NULL default '0',
			`show_joined` INT(11) NOT NULL default '0',
			`show_lastlogin` INT(11) NOT NULL default '0',
			`show_chars` INT(11) NOT NULL default '0',
			`show_guilds` INT(11) NOT NULL default '0',
			`show_realms` INT(11) NOT NULL default '0',
			PRIMARY KEY (`uid`)"
			);

		$installer->create_table($installer->table('messaging'),"
			`msgid` int(11) NOT NULL auto_increment,
			`uid` smallint(6) NOT NULL,
			`title` varchar(255) NOT NULL default '',
			`body` text NOT NULL,
			`sender` int(11) NOT NULL,
			`senderLevel` int(11) NOT NULL,
			`read` int(11) NOT NULL default 0,
			`date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
			PRIMARY KEY  (`msgid`),
			INDEX KEY (`uid`)"
			);

		//Account menu
		$installer->add_menu_pane('acc_menu');
		
		// Roster menu links
            $installer->add_menu_button('acc_menu_index','util','main');
            $installer->add_menu_button('acc_menu_chars','acc_menu','util-accounts-chars','spell_holy_divinespirit');
            $installer->add_menu_button('acc_menu_guilds','acc_menu','util-accounts-guilds','inv_misc_tabardpvp_02'); 
            $installer->add_menu_button('acc_menu_realms','acc_menu','util-accounts-realms','spell_holy_lightsgrace');
		$installer->add_menu_button('acc_menu_mail','acc_menu','util-accounts-mail','inv_letter_11');
		$installer->add_menu_button('acc_menu_settings','acc_menu','util-accounts-settings','inv_misc_wrench_02'); 

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
        global $installer;

		//Add new table and columns for profile/application
		if( version_compare('1.9.9.940', $oldversion, '>') == true )
		{
			//Add Profile Table
			$installer->create_table($installer->table('profile'),"
			`uid` INT(11) NOT NULL,
			`signature` varchar(255) NOT NULL,
			`avatar` varchar(255) NOT NULL,
			`show_fname` INT(11) NOT NULL default '0',
			`show_lname` INT(11) NOT NULL default '0',
			`show_email` INT(11) NOT NULL default '0',
			`show_city` INT(11) NOT NULL default '0',
			`show_country` INT(11) NOT NULL default '0',
			`show_homepage` INT(11) NOT NULL default '0',
			`show_notes` INT(11) NOT NULL default '0',
			`show_joined` INT(11) NOT NULL default '0',
			`show_lastlogin` INT(11) NOT NULL default '0',
			`show_chars` INT(11) NOT NULL default '0',
			`show_guilds` INT(11) NOT NULL default '0',
			`show_realms` INT(11) NOT NULL default '0',
			PRIMARY KEY (`uid`)"
			);

			//Update user_link table
			$installer->add_backup($installer->table('user_link')); //Backup User link Table

			$installer->add_query('ALTER TABLE `' . $installer->table('user_link') . '` ADD COLUMN `region` VARCHAR(32) NOT NULL default ""');

			//Update user_link table
			$installer->add_backup($installer->table('profile')); //Backup Profile Table

			$installer->add_query('ALTER TABLE `' . $installer->table('profile') . '` ADD COLUMN `avsig_src` VARCHAR(32) NOT NULL default ""');

			//Add Messaging table
			$installer->create_table($installer->table('messaging'),"
			`msgid` int(11) NOT NULL auto_increment,
			`uid` smallint(6) NOT NULL,
			`title` varchar(255) NOT NULL default '',
			`body` text NOT NULL,
			`sender` int(11) NOT NULL,
			`senderLevel` int(11) NOT NULL,
			`read` int(11) NOT NULL default 0,
			`date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
			PRIMARY KEY  (`msgid`),
			INDEX KEY (`uid`)"
			);

			// Remove old menu links
			$installer->remove_all_menu_button();

			// Update Roster menu links
                  $installer->add_menu_button('acc_menu_index','util','main');
                  $installer->add_menu_button('acc_menu_chars','acc_menu','util-accounts-chars','spell_holy_divinespirit');
                  $installer->add_menu_button('acc_menu_guilds','acc_menu','util-accounts-guilds','inv_misc_tabardpvp_02'); 
                  $installer->add_menu_button('acc_menu_realms','acc_menu','util-accounts-realms','spell_holy_lightsgrace');
			$installer->add_menu_button('acc_menu_mail','acc_menu','util-accounts-mail','inv_letter_11');
			$installer->add_menu_button('acc_menu_settings','acc_menu','util-accounts-settings','inv_misc_wrench_02');

			//Remove Registration settings
			$installer->remove_config('6010');
			$installer->remove_config('6020');
			$installer->remove_config('6030');
			$installer->remove_config('6040');

			//Add new Registration settings
			$installer->add_config("6010, 'acc_use_app', '1', 'radio{on^1|off^0', 'acc_register'");
			$installer->add_config("6020, 'acc_uname_length', '5', 'text{30|30', 'acc_register'");
			$installer->add_config("6030, 'acc_pass_length', '5', 'text{30|30', 'acc_register'");
			$installer->add_config("6040, 'acc_auto_act', '1', 'radio{on^1|off^0', 'acc_register'");
			$installer->add_config("6050, 'acc_admin_copy', '1', 'radio{on^1|off^0', 'acc_register'");

			//Add application/profile columns to user table
			$installer->add_backup($installer->table('user')); //Backup User Table

			$installer->add_query('ALTER TABLE `' . $installer->table('user') . '` ADD COLUMN `age` VARCHAR(32) NOT NULL default "" AFTER `lname`');
			$installer->add_query('ALTER TABLE `' . $installer->table('user') . '` ADD COLUMN `state` VARCHAR(32) NOT NULL default "" AFTER `city`');
			$installer->add_query('ALTER TABLE `' . $installer->table('user') . '` ADD COLUMN `zone` VARCHAR(32) NOT NULL default "" AFTER `country`');
			$installer->add_query('ALTER TABLE `' . $installer->table('user') . '` ADD COLUMN `other_guilds` VARCHAR(64) NOT NULL default "" AFTER `homepage`');
			$installer->add_query('ALTER TABLE `' . $installer->table('user') . '` ADD COLUMN `why` VARCHAR(64) NOT NULL default "" AFTER `other_guilds`');
			$installer->add_query('ALTER TABLE `' . $installer->table('user') . '` ADD COLUMN `about` VARCHAR(64) NOT NULL default "" AFTER `why`');
			$installer->add_query('ALTER TABLE `' . $installer->table('user') . '` ADD COLUMN `is_member` INT(11) NOT NULL default "0" AFTER `about`');
		}
		return true; 
    } 

    /** 
    * Un-Install Function 
    * 
    * @return bool 
    */ 
    function uninstall() 
    { 
        global $installer, $roster; 

        $sql = 'SELECT * FROM `' . $roster->db->table('config') . '` WHERE ( ( `' . $roster->db->table('config') . '` . `id` = 1055 ) ) LIMIT 0, 30 ';
		$result = $roster->db->query($sql);
		
        if ($roster->db->result($result, 0, 'config_value') == 'accounts')
        {
        	$sql = 'UPDATE `' . $roster->db->table('config') . '` SET `config_value` = "roster" WHERE `id` = "1055" LIMIT 1 ';
        	$roster->db->query($sql);
        }

        $installer->remove_all_config(); 
        $installer->remove_all_menu_button();
		$installer->remove_menu_pane('acc_menu');  

        $installer->drop_table($installer->table('user'));
		$installer->drop_table($installer->table('user_link'));
		$installer->drop_table($installer->table('plugin'));
		$installer->drop_table($installer->table('plugin_config'));
		$installer->drop_table($installer->table('recruitment'));
		$installer->drop_table($installer->table('applicants'));
		$installer->drop_table($installer->table('session'));
		$installer->drop_table($installer->table('profile'));

        return true; 
    } 
} 
