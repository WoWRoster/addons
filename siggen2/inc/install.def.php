<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * AddOn install file
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 * @filesource
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

class SigGen2Install {
  var $active = true;
  var $icon = 'inv_misc_dmc_02';

  var $version = '0.9.0.0';
  var $wrnet_id = '0';

  var $fullname = 'SigGen2';
  var $description = 'Signature, Avatar, and Guild Banner Generator';
  var $credits = array(array(
		'name' => 'Zanix',
		'info' => 'Signature, Avatar, and Guild Banner Generator'
	));


  function install() {
    global $installer, $roster;

    // ----[ Check for GD Functions ]---------------------------
    if (!function_exists('imageTTFBBox') || !function_exists('imageTTFText') || !function_exists('imagecreatetruecolor') || !function_exists('imagecreate')) {
      $installer->seterrors($roster->locale->act['no_gd_error']);
      return FALSE;
    }
    /*
    # Master data for the config file
    $installer->add_config("1,'config_list','mainconf|design','display','master'");
    $installer->add_config("2,'startpage','mainconf','display','master'");

    # Config menu entries
    $installer->add_config("110,'mainconf',NULL,'blockframe','menu'");
    $installer->add_config("120,'design',NULL,'page{1','menu'");
    $installer->add_config("130,'documentation','http://www.wowroster.net/MediaWiki/SigGen','newlink','menu'");

    # Main settings
    $installer->add_config("1010,'etag','1','radio{On^1|Off^0','mainconf'");
    $installer->add_config("1020,'imageformat','png','select{PNG^png|JPG^jpg|GIF^gif','mainconf'");
    $installer->add_config("1030,'saveformat','png','select{PNG^png|JPG^jpg|GIF^gif','mainconf'");
    $installer->add_config("1040,'quality_jpg','85','text{3|5','mainconf'");
    $installer->add_config("1050,'quality_gif','1','radio{Dither^1|No-Dither^0','mainconf'");

    # Design Settings
    $installer->add_config("2000, 'design_conf_wide', NULL, 'page{3', 'design'");
    $installer->add_config("2001, 'design_sig', NULL, 'blockframe', 'design_conf_wide'");
    $installer->add_config("2002, 'design_ava', NULL, 'blockframe', 'design_conf_wide'");
    $installer->add_config("2003, 'design_bnr', NULL, 'blockframe', 'design_conf_wide'");

    # Signature Settings
    $installer->add_config("12000, 'design_sig_type', 'level', 'select{Hide^|Levels^level|Class^class|Realmstatus^realm', 'design_sig'");
    $installer->add_config("12010, 'design_sig_level', '30', 'text{2|10', 'design_sig'");
    $installer->add_config("12020, 'design_sig_style', 'list', 'select{List^list|Bar graph^bar|Logarithmic bargraph^barlog', 'design_sig'");
    $installer->add_config("12030, 'design_sig_barcolor', '#3e0000', 'color', 'design_sig'");
    $installer->add_config("12040, 'design_sig_bar2color', '#003e00', 'color', 'design_sig'");
    $installer->add_config("12050, 'design_sig_textcolor', '#ffffff', 'color', 'design_sig'");

    # Avatar Settings
    $installer->add_config("12100, 'design_ava_type', 'level', 'select{Hide^|Levels^level|Class^class|Realmstatus^realm', 'design_ava'");
    $installer->add_config("12110, 'design_ava_level', '30', 'text{2|10', 'design_ava'");
    $installer->add_config("12120, 'design_ava_style', 'list', 'select{List^list|Bar graph^bar|Logarithmic bargraph^barlog', 'design_ava'");
    $installer->add_config("12130, 'design_ava_barcolor', '#3e0000', 'color', 'design_ava'");
    $installer->add_config("12140, 'design_ava_bar2color', '#003e00', 'color', 'design_ava'");
    $installer->add_config("12150, 'design_ava_textcolor', '#ffffff', 'color', 'design_ava'");

    # Avatar Settings
    $installer->add_config("12200, 'design_bnr_type', 'level', 'select{Hide^|Levels^level|Class^class|Realmstatus^realm', 'design_bnr'");
    $installer->add_config("12210, 'design_bnr_level', '30', 'text{2|10', 'design_bnr'");
    $installer->add_config("12220, 'design_bnr_style', 'list', 'select{List^list|Bar graph^bar|Logarithmic bargraph^barlog', 'design_bnr'");
    $installer->add_config("12230, 'design_bnr_barcolor', '#3e0000', 'color', 'design_bnr'");
    $installer->add_config("12240, 'design_bnr_bar2color', '#003e00', 'color', 'design_bnr'");
    $installer->add_config("12250, 'design_bnr_textcolor', '#ffffff', 'color', 'design_bnr'");
    */
    $installer->create_table($installer->table('designs'), "
			`design_id` int(11) NOT NULL auto_increment,
			`design_name` varchar(16) NOT NULL,
			`quality_gif` tinyint(1) NOT NULL default '0',
			`quality_jpg` int(3) NOT NULL default '100',
			`save_dir` varchar(96) NOT NULL,
			PRIMARY KEY  (`design_id`),
			UNIQUE KEY `name` (`design_name`)");

    $installer->add_query("INSERT INTO `" . $installer->table('designs') . "` (`design_id`, `design_name`, `quality_gif`, `quality_jpg`, `save_dir`) VALUES
			(1, 'sig', 0, 100, ''), (2, 'ava', 0, 100, ''), (3, 'bnr', 0, 100, '');");

    $installer->create_table($installer->table('themes'), "
			`design_id` int(11) NOT NULL default '0',
			`theme_id` int(11) NOT NULL auto_increment,
			`theme_name` varchar(64) NOT NULL,
			`author` varchar(64) NOT NULL,
			`version` varchar(16) NOT NULL,
			`timestamp` varchar(11) NOT NULL,
			`imageformat` varchar(3) NOT NULL,
			`saveformat` varchar(3) NOT NULL,
			`width` int(4) NOT NULL default '0',
			`height` int(4) NOT NULL default '0',
			PRIMARY KEY  (`theme_id`),
			KEY `design_id` (`design_id`)");

    $installer->add_query("INSERT INTO `" . $installer->table('themes') . "` (`design_id`, `theme_id`, `theme_name`, `author`, `version`, `timestamp`, `imageformat`, `saveformat`, `width`, `height`) VALUES
			(1, 1, 'default', 'Zanix', '0.1', '" . time() . "', 'png', 'png', 400, 100);");

    $installer->create_table($installer->table('layers'), "
			`layer_id` int(11) NOT NULL auto_increment,
			`layer_order` int(4) NOT NULL default '0',
			`theme_id` int(11) NOT NULL default '0',
			`type` varchar(16) NOT NULL default '',
			`subtype` varchar(16) NOT NULL default '',
			`data` text,
			PRIMARY KEY  (`layer_id`),
			KEY `theme_id` (`theme_id`)");

    $installer->add_query("INSERT INTO `" . $installer->table('layers') . "` (`layer_id`, `layer_order`, `theme_id`, `type`, `subtype`, `data`) VALUES
			(1, 1, 1, 'image', 'static', 'a:5:{s:4:\"file\";s:8:\"back.png\";s:1:\"x\";s:1:\"0\";s:1:\"y\";s:1:\"0\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";}'),
			(2, 2, 1, 'image', 'class', 'a:5:{s:4:\"file\";s:8:\"icon.png\";s:1:\"x\";s:3:\"200\";s:1:\"y\";s:2:\"50\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";}'),
			(3, 3, 1, 'text', 'static', 'a:11:{s:4:\"size\";s:2:\"40\";s:5:\"angle\";s:1:\"0\";s:1:\"x\";s:2:\"80\";s:1:\"y\";s:2:\"60\";s:5:\"color\";s:7:\"#ffffff\";s:5:\"alpha\";s:1:\"0\";s:4:\"font\";s:0:\"\";s:4:\"text\";s:5:\"Zanix\";s:5:\"align\";s:1:\"0\";s:7:\"outline\";a:2:{s:5:\"color\";s:7:\"#000000\";s:5:\"width\";s:1:\"2\";}s:6:\"shadow\";a:4:{s:5:\"color\";s:7:\"#ff0000\";s:8:\"distance\";s:1:\"2\";s:9:\"direction\";s:2:\"45\";s:6:\"spread\";s:1:\"2\";}}');");

    // Roster menu entry
    $installer->add_menu_button('menu_siggen_char', 'char');

    return TRUE;
  }

  function upgrade($oldversion) {
    global $installer;

    /**
     * Update uninstalls old version and sets new install
     *
    if (version_compare('0.9.0.0', $oldversion, '>') == TRUE) {
      $installer->drop_table($installer->table('config'));
      $installer->remove_all_config();
      $installer->remove_all_menu_button();
      $this->install();
    }

    return TRUE;
    */
  }

  function uninstall() {
    global $installer;

    $installer->remove_all_config();
    $installer->remove_all_menu_button();

    $installer->drop_table($installer->table('designs'));
    $installer->drop_table($installer->table('themes'));
    $installer->drop_table($installer->table('layers'));

    return TRUE;
  }
}
