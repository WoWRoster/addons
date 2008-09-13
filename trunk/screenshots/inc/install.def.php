<?php
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
class screenshotsInstall
{
	var $active = true;
	var $icon = 'inv_misc_herb_flamecap';

	var $version = '0.1.0';
	var $wrnet_id = '-1';

	var $fullname = 'Screenshots';
	var $description = "Screenshot Storage and Viewer for UniUploader";
	var $credits = array(
		array(	"name"=>	"MattM",
				"info"=>	"Screenshot Storage and Viewer for UniUploader"),
	);
	function install()
	{
		global $roster, $installer, $addon;

		// ----[ Check for GD Functions ]---------------------------
		if( !function_exists('imageTTFBBox') || !function_exists('imageTTFText') || !function_exists('imagecreatetruecolor') || !function_exists('imagecreate') )
		{
			$installer->seterrors($roster->locale->act['no_gd_error']);
			return;
		}
		
		$installer->add_menu_button('screenshots_menubutton_title', 'util', '', $this->icon);
		
		
		return true;
	}
	function uninstall()
	{
		global $installer;
		$installer->remove_all_menu_button();
		return true;
	}
}
