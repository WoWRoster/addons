<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    MembersList
 * @subpackage Installer
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Installer for MembersList Addon
 *
 * @package    MembersList
 * @subpackage Installer
 *
 */
class rostergallery
{
	var $active = true;
	var $icon = 'inv_misc_spyglass_03';

	var $upgrades = array(); // There are no previous versions to upgrade from

	var $version = '3.0.0.2000';
	var $oldversion = '3.0.0.1900';

	var $fullname = 'Roster Gallery';
	var $description = 'Guild Screenshot database.';
	var $credits = array(
		array(	"name"=>	"Ulminia warcraftalliance@gmail.com",
				"info"=>	"Guild Screenshot database (Alpha Release)"),
	);



	/**
	 * Install Function
	 *
	 * @return bool
	 */
	function install()
	{
		global $installer, $addon;

		# Master data for the config file
		$installer->add_config("1,'startpage','display','display','master'");

            $ssdefaults = array(
            'rg_width' => '275',
            'rg_height' => '200',
            'rg_ipp' => '12',
            'rg_ipl' => '4',
            'rg_version' => '3.0.2000',
            'rg_lpp' => '3','rg_sst' => '0','rg_dct' => '1',
            'rg_dspc' => '1','rg_dscp' => '1',
            'rg_ssfolder' => 'screenshots/',
            'rg_ssfolderpath' => 'addons/RosterGallery/',
            'rg_catcount' => '10',
            'rg_cat1' => 'Cat 1','rg_cat2' => 'Cat 2',
            'rg_cat3' => 'Cat 3','rg_cat4' => 'Cat 4',
            'rg_cat5' => 'Cat 5','rg_cat6' => 'Cat 6',
            'rg_cat7' => 'Cat 7','rg_cat8' => 'Cat 8',
            'rg_cat9' => 'Cat 9','rg_cat10' => 'Cat 10',
            'rg_cat1en' => '1','rg_cat2en' => '1','rg_cat3en' => '1',
            'rg_cat4en' => '1','rg_cat5en' => '1','rg_cat6en' => '1',
            'rg_cat7en' => '1','rg_cat8en' => '1','rg_cat9en' => '1',
            'rg_cat10en' => '1','rg_cat1id' => 'cat1','rg_cat2id' => 'cat2',
            'rg_cat3id' => 'cat3','rg_cat4id' => 'cat4','rg_cat5id' => 'cat5',
            'rg_cat6id' => 'cat6','rg_cat7id' => 'cat7','rg_cat8id' => 'cat8',
            'rg_cat9id' => 'cat9','rg_cat10id' => 'cat10',
            'rg_u_ovlb' => '1',
            'rg_u_lb' => '0',
            'rg_use_popup' => '1',
            'rg_rating_align' => '0',
            'rg_caption_align' => '1',
            'rg_drt' => '1',
            'rg_wm_use' => '1',
            'rg_wm_loc' => '4',
            'rg_wm_file' => 'Icon-allakhazam-22x22.png',
            'rg_wm_dir' => 'inc/wm',
            'rg_mp_bc' => 'sgreen',
            'rg_tn_bc' => 'syellow',
            'rg_dul' => '0',
            'rg_upload_size' => '650',
            'rg_use_votepopup' => '1',
            'rg_upload_win' => 'true');
            $num = 10000;
            foreach( $ssdefaults as $sdefault => $sval)
			{
                        $installer->add_config("'$num','$sdefault','$sval','','addon_rg'");
                        $num++;
                  }
		$installer->add_query("DROP TABLE IF EXISTS `" . $installer->table('ss') . "`;");
		
		$installer->add_query("
		CREATE TABLE `" . $installer->table('ss') . "` (
            `id` int(11) NOT NULL auto_increment,
            `file` varchar(255) NOT NULL default '',
            `caption` varchar(255) NOT NULL default '',
            `disc` text NOT NULL,
            `ext` varchar(255) NOT NULL default '',
            `catagory` varchar(255) NOT NULL default '',
            `approve` varchar(3) NOT NULL default '',
            `votes` varchar(10) NOT NULL default '',
            `rateing` varchar(10) NOT NULL default '',
            PRIMARY KEY  (`id`)
            ) ;");

		# Roster menu entry
		$installer->add_menu_button('rg_button','util','','inv_misc_spyglass_03');
      	$ssfolder = array('screenshots','screenshots/thumbs/','screenshots/cat1/','screenshots/cat2/','screenshots/cat3/','screenshots/cat4/','screenshots/cat5/','screenshots/cat6/','screenshots/cat7/','screenshots/cat8/','screenshots/cat9/','screenshots/cat10/'); 
      	$addondir = 'addons/RosterGallery/';
		$struct = $addondir;
		
		chmod( $addondir ,0777 );
		chmod( $addondir.'inc/wm/' ,0777 );
		foreach($ssfolder as $dir){
		chmod( $struct.$dir,0777 );
		}
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
	     global $installer, $addon;
		// Nothing to upgrade from yet
		//$installer->add_config("'10088','rg_upload_win','false','','addon_rg'");

	}

	/**
	 * Un-Install Function
	 *
	 * @return bool
	 */
	function uninstall()
	{
		global $installer, $addon;

		$installer->remove_all_config();
            
            # remove the screenshot dir
            $dir = 'addons/RosterGallery/screenshots/';
            $this->deleteDir($dir);

   
            $installer->remove_menu_button('rg_button');
		$installer->add_query("DROP TABLE IF EXISTS `" . $installer->table('ss') . "`;");
		return true;
	}
	
	function deleteDir($dir)
      {
            global $installer, $addon;

            if (substr($dir,-1) != "/") $dir .= "/";
                  if (!is_dir($dir)) return false;

                        if (($dh = opendir($dir)) !== false) {
                              while (($entry = readdir($dh)) !== false) {
                                    if ($entry != "." && $entry != ".." && $entry != "index.html") {
                                          if (is_file($dir . $entry) || is_link($dir . $entry)) unlink($dir . $entry);
                                    else if (is_dir($dir . $entry)) $this->deleteDir($dir . $entry);
                                    }
                              }
                        closedir($dh);
                        //rmdir($dir);

                        return true;
                        $installer->setmessages('<br>All images removed');
                  }
            return false;
            $installer->setmessages('<br>Images Could not br removed<br>delete manualy');
      }
}
