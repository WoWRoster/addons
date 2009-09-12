<?php
/**
 * WoWRoster GuildSpeak - TeamSpeak 2 and Ventrilo for WoWRoster
 * 
 * Addon based on Gryphon, LLC's gllcts2 version 4.2.5
 * and the PHP Ventrilo Status Script
 *
 * @author Mike DeShane (mdeshane@pkcomp.net)
 * @copyright 2006-2008 Mike DeShane, US
 * @package WoWRoster GuildSpeak
 * @subpackage Installer
 * 
 */

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * GuildSpeak Addon Installer
 * @package GuildSpeak
 * @subpackage Installer
 */
class guildspeakInstall
{
	var $active = true;
	var $icon = 'inv_misc_ear_human_01';

	var $version = '1.9.9.7';
	var $wrnet_id = '0';

	var $fullname = 'GuildSpeak';
	var $description = 'guildspeak_desc';
	var $credits = array(
		array(	"name"=>	"mdeshane",
				"info"=>	"WoWRoster Integration author"),
            array(	"name"=>	"Gryphon, LLC",
				"info"=>	"GllcTS2 Original author"),
		array(      "name"=>    "Flagship Industries, Inc.",
		            "info"=>    "Ventrilo Status Script Original author")
	);


	/**
	 * Install function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer;

		// Master and menu entries
		$installer->add_config("'1','startpage','guildspeak_conf','display','master'");
		$installer->add_config("'110','guildspeak_server','NULL','blockframe','menu'");
		$installer->add_config("'120','guildspeak_ts_set','NULL','blockframe','menu'");
		$installer->add_config("'130','guildspeak_vent_set','NULL','blockframe','menu'");

            // Server Config Entries
            $installer->add_config("'1000', 'guildspeak_server_mode', '1', 'select{TeamSpeak^1|Ventrilo^0', 'guildspeak_server'");
            $installer->add_config("'1010', 'guildspeak_server_link', '0', 'radio{On^1|Off^0', 'guildspeak_server'");

            // TeamSpeak Config Entries
            $installer->add_config("'2000','guildspeak_ts_bodybgcolor','#D1D7DB','color','guildspeak_ts_set'");
            $installer->add_config("'2010','guildspeak_ts_bodytxtcolor','#000000','color','guildspeak_ts_set'");
            $installer->add_config("'2020','guildspeak_ts_bodylnkcolor','#005C8C','color','guildspeak_ts_set'");
            $installer->add_config("'2030','guildspeak_ts_bodyvlnkcolor','#ffffff','color','guildspeak_ts_set'");
            $installer->add_config("'2040','guildspeak_ts_bodyalnkcolor','#ffffff','color','guildspeak_ts_set'");
            $installer->add_config("'2050','guildspeak_ts_lsttxtcolor','#000000','color','guildspeak_ts_set'");
            $installer->add_config("'2060','guildspeak_ts_lstlnkcolor','#000000','color','guildspeak_ts_set'");
            $installer->add_config("'2070','guildspeak_ts_lstvlnkcolor','#000000','color','guildspeak_ts_set'");
            $installer->add_config("'2080','guildspeak_ts_lstalnkcolor','#000000','color','guildspeak_ts_set'");
            $installer->add_config("'2090','guildspeak_ts_lsthvrcolor','#005C8C','color','guildspeak_ts_set'");
            $installer->add_config("'2100','guildspeak_ts_catrowcolor1','#1C7DC6','color','guildspeak_ts_set'");
            $installer->add_config("'2110','guildspeak_ts_cattxtcolor','#ffffff','color','guildspeak_ts_set'");
            $installer->add_config("'2120','guildspeak_ts_catlnkcolor','#ffffff','color','guildspeak_ts_set'");
            $installer->add_config("'2130','guildspeak_ts_cathvrcolor','#ffffff','color','guildspeak_ts_set'");
            $installer->add_config("'2140','guildspeak_ts_pagetitle','TeamSpeak','text{15|30','guildspeak_ts_set'");
            $installer->add_config("'2150','guildspeak_ts_listadmin','admin@yoursite.com','text{15|30','guildspeak_ts_set'");
            $installer->add_config("'2160','guildspeak_ts_tablewidth','700','text{4|15','guildspeak_ts_set'");
            $installer->add_config("'2170','guildspeak_ts_refresh','0','radio{On^1|Off^0','guildspeak_ts_set'");
            $installer->add_config("'2180','guildspeak_ts_refreshtime','60','text{4|15','guildspeak_ts_set'");
            $installer->add_config("'2190','guildspeak_ts_perpage','15','text{4|15','guildspeak_ts_set'");
            $installer->add_config("'2200','guildspeak_ts_ispperpage','10','text{4|15','guildspeak_ts_set'");
            $installer->add_config("'2210','guildspeak_ts_popupwidth','220','text{4|15','guildspeak_ts_set'");
            $installer->add_config("'2220','guildspeak_ts_popupheight','380','text{4|15','guildspeak_ts_set'");
            $installer->add_config("'2230','guildspeak_ts_bordercolor','#000000','color','guildspeak_ts_set'");
            $installer->add_config("'2240','guildspeak_ts_rowcolor1','#DCE8EE','color','guildspeak_ts_set'");
            $installer->add_config("'2250','guildspeak_ts_rowcolor2','#C9DCE5','color','guildspeak_ts_set'");
            $installer->add_config("'2260','guildspeak_ts_imgbg','light','select{Light^light|Dark^dark','guildspeak_ts_set'");
            $installer->add_config("'2270','guildspeak_ts_message','','text{15|30','guildspeak_ts_set'");
            $installer->add_config("'2280','guildspeak_ts_showgroups','0','radio{Yes^1|No^0','guildspeak_ts_set'");
            $installer->add_config("'2290','guildspeak_ts_homepage','index.php','text{15|30','guildspeak_ts_set'");
            $installer->add_config("'2300','guildspeak_ts_listamount','50','text{4|15','guildspeak_ts_set'");
            $installer->add_config("'2310','guildspeak_ts_listips','0','radio{Yes^1|No^0','guildspeak_ts_set'");
            $installer->add_config("'2320','guildspeak_ts_showtimeonline','1','radio{Yes^1|No^0','guildspeak_ts_set'");
            $installer->add_config("'2330','guildspeak_ts_logo','ts_logo.gif','text{15|30','guildspeak_ts_set'");

            // Ventrilo Config Entries
            $installer->add_config("'3000','guildspeak_vent_prog','c:/var/www/html/ventrilo_status','text{30|60','guildspeak_vent_set'");
            $installer->add_config("'3010','guildspeak_vent_code','2','text{4|15','guildspeak_vent_set'");
            $installer->add_config("'3020','guildspeak_vent_host','127.0.0.1','text{15|30','guildspeak_vent_set'");
            $installer->add_config("'3030','guildspeak_vent_port','3784','text{4|15','guildspeak_vent_set'");
            $installer->add_config("'3040','guildspeak_vent_pass','','text{15|30','guildspeak_vent_set'");
            $installer->add_config("'3050','guildspeak_vent_disp','1','select{Basic^1|Classic^2|Roster^3','guildspeak_vent_set'");
            $installer->add_config("'3060','guildspeak_vent_mode','1','select{Executable^1|Pure PHP^0','guildspeak_vent_set'");

            // Database Tables
		$installer->create_table($installer->table('channel'),"
			`channel_id` int(11) NOT NULL auto_increment,
                  `server_ip` varchar(255) NOT NULL default '',
                  `server_port` varchar(255) NOT NULL default '',
                  `cl_number` int(255) NOT NULL default '0',
                  `cl_codec` varchar(255) NOT NULL default '',
                  `cl_parent` varchar(255) NOT NULL default '',
                  `cl_order` int(255) NOT NULL default '0',
                  `cl_maxuser` varchar(255) NOT NULL default '',
                  `cl_name` varchar(255) NOT NULL default '',
                  `cl_flags` varchar(255) NOT NULL default '',
                  `cl_private` varchar(255) NOT NULL default '',
                  `cl_topic` varchar(255) NOT NULL default '',
                  `server_timestamp` varchar(255) NOT NULL default '',
                  KEY `id` (`channel_id`)");

		$installer->create_table($installer->table('group'),"
                  `group_id` int(11) NOT NULL auto_increment,
                  `group_ispname` varchar(255) NOT NULL default '',
                  `group_ispurl` varchar(255) NOT NULL default '',
                  `group_servers` int(255) NOT NULL default '0',
                  `group_users` int(255) NOT NULL default '0',
                  `server_timestamp` int(255) NOT NULL default '0',
                  KEY `id` (`group_id`)");
		
		$installer->create_table($installer->table('user'),"
                  `user_id` int(11) NOT NULL auto_increment,
                  `server_ip` varchar(255) NOT NULL default '',
                  `server_port` varchar(255) NOT NULL default '',
                  `pl_id` varchar(255) NOT NULL default '',
                  `pl_channelid` varchar(255) NOT NULL default '',
                  `pl_pktssend` varchar(255) NOT NULL default '',
                  `pl_bytessend` varchar(255) NOT NULL default '',
                  `pl_pktsrecv` varchar(255) NOT NULL default '',
                  `pl_bytesrecv` varchar(255) NOT NULL default '',
                  `pl_pktloss` varchar(255) NOT NULL default '',
                  `pl_ping` varchar(255) NOT NULL default '',
                  `pl_logintime` varchar(255) NOT NULL default '',
                  `pl_idletime` varchar(255) NOT NULL default '',
                  `pl_channelprivileges` varchar(255) NOT NULL default '',
                  `pl_playerprivileges` int(255) NOT NULL default '0',
                  `pl_playerflags` varchar(255) NOT NULL default '',
                  `pl_ipaddress` varchar(255) NOT NULL default '',
                  `pl_nickname` varchar(255) NOT NULL default '',
                  `pl_loginname` varchar(255) NOT NULL default '',
                  `server_timestamp` varchar(255) NOT NULL default '',
                  KEY `id` (`user_id`)");
            
            $installer->create_table($installer->table('weblist'),"
                  `server_id` int(11) NOT NULL auto_increment,
                  `server_adminemail` varchar(255) NOT NULL default '',
                  `server_isplinkurl` varchar(255) NOT NULL default '',
                  `server_ispname` varchar(255) NOT NULL default '',
                  `server_ispcountry` varchar(255) NOT NULL default '',
                  `server_platform` varchar(255) NOT NULL default '',
                  `server_version_major` int(255) NOT NULL default '0',
                  `server_version_minor` int(255) NOT NULL default '0',
                  `server_version_release` int(255) NOT NULL default '0',
                  `server_version_build` int(255) NOT NULL default '0',
                  `server_ip` varchar(255) NOT NULL default '',
                  `server_port` varchar(255) NOT NULL default '',
                  `server_name` varchar(255) NOT NULL default '',
                  `server_uptime` int(255) NOT NULL default '0',
                  `server_password` varchar(255) NOT NULL default '',
                  `server_type1` varchar(255) NOT NULL default '',
                  `server_type2` varchar(255) NOT NULL default '',
                  `clients_current` int(255) NOT NULL default '0',
                  `clients_maximum` int(255) NOT NULL default '0',
                  `channels_current` varchar(255) NOT NULL default '',
                  `server_linkurl` varchar(255) NOT NULL default '',
                  `server_queryport` varchar(255) NOT NULL default '',
                  `server_timestamp` varchar(255) NOT NULL default '',
                  KEY `id` (`server_id`)");

            $installer->add_menu_button('guildspeak_button','util');
		return true;
	}

	/**
	 * Upgrade function
	 *
	 * @param string $oldversion
	 * @return bool
	 */
	function upgrade($oldversion)
	{
		global $installer;

            if( version_compare('1.9.9.7', $oldversion, '>') == true )
		{
                
                // Update TS Display Setting
                $installer->remove_config('2310');
                $installer->add_config("'2310','guildspeak_ts_listips','0','radio{Yes^1|No^0','guildspeak_ts_set'");
                
                // Add Vent Mode Setting
                $installer->add_config("'3060','guildspeak_vent_mode','1','select{Executable^1|Pure PHP^0','guildspeak_vent_set'");
		}
		return true;
	}

	/**
	 * Un-Install function
	 *
	 * @return bool
	 */
	function uninstall()
	{
		global $installer;

		$installer->drop_table($installer->table('admin'));
		$installer->drop_table($installer->table('channel'));
		$installer->drop_table($installer->table('group'));
		$installer->drop_table($installer->table('user'));
		$installer->drop_table($installer->table('weblist'));

		$installer->remove_all_config();
		$installer->remove_all_menu_button();

		return true;
	}
}
