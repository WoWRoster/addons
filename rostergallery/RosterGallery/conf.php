<?php
/******************************
 * $Id: conf.php,v 1.7.0 2006/06/14 07:16:03 Ulminia Exp $
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

/*
	Whatever configuration for your addon you need
	Try to follow this format to reduce the chance
	that overwritting could occur
		$addon_conf['addon_name']['variable_name'] = 1;
*/
$script_filename = 'addon.php?roster_addon_name=RosterGallery';
$addon_conf['ss']['name'] = "Roster Gallery";
//    $addon_cfgn = 'addon_rg';
    

// The following is an "example conf.php" file
//------[ Show Debug? ]------------
$addon_conf['ss']['debug'] = 1;

	// Database table prefixes
define('ROSTER_SCREENTABLE',$db_prefix.'addon_screenshots');
define('RG_DIR', dirname(__FILE__).DIR_SEP);

    $passbox = '
<!-- Begin Password Input Box -->
<form action="'.$script_filename.'&alogin=" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">
'.border('sred','start','Authorization Required').'
  <table class="bodyline" cellspacing="0" cellpadding="0">
    <tr>
      <td class="membersRowRight1">Password:<br />
        <input name="pass_word" type="password" size="30" maxlength="30" /></td>
    </tr>
    <tr>
      <td class="membersRowRight2" valign="bottom">
        <div align="right"><input type="submit" value="Go" /></div></td>
    </tr>
  </table>
'.border('sred','end').'
</form>
<!-- End Password Input Box -->';

$form_start = "<form action=\"$script_filename\" method=\"post\" enctype=\"multipart/form-data\" id=\"config\" onsubmit=\"submitonce(this)\">\n";

$submit_button = "<input type=\"submit\" value=\"Save Settings\" />\n<input type=\"reset\" name=\"Reset\" value=\"Reset\" />\n<input type=\"hidden\" name=\"process\" value=\"process\" />\n<br /><br />\n";

$form_end = "</form>\n";

$addon_conf['ss']['version'] = '2.6';
$ssbordercolor = array(
'Ranking' => 'ranking',
'Blue' => 'sblue',
'Gray' => 'sgray',
'Green' => 'sgreen',
'Orange' => 'sorange',
'Purple' => 'spurple',
'Red' => 'sred',
'Yellow' => 'syellow'
);
$ssfolder = array(
'screenshots/',
'screenshots/thumbs/',
'screenshots/cat1/',
'screenshots/cat2/',
'screenshots/cat3/',
'screenshots/cat4/',
'screenshots/cat5/',
'screenshots/cat6/',
'screenshots/cat7/',
'screenshots/cat8/',
'screenshots/cat9/',
'screenshots/cat10/');

$db_table = array(
'id',
'file',
'caption',
'disc',
'ext',
'catagory',
'approve',
'votes',
'rateing'
);

$defaults = array(
'rg_width' => '275',
'rg_height' => '200',
'rg_ipp' => '12',
'rg_ipl' => '4',
'rg_version' => '2.6',
'rg_lpp' => '3',
'rg_sst' => '0',
'rg_dct' => '1',
'rg_dspc' => '1',
'rg_dscp' => '1',
'rg_ssfolder' => 'screenshots/',
'rg_catcount' => '10',
'rg_cat1' => 'Cat 1',
'rg_cat2' => 'Cat 2',
'rg_cat3' => 'Cat 3',
'rg_cat4' => 'Cat 4',
'rg_cat5' => 'Cat 5',
'rg_cat6' => 'Cat 6',
'rg_cat7' => 'Cat 7',
'rg_cat8' => 'Cat 8',
'rg_cat9' => 'Cat 9',
'rg_cat10' => 'Cat 10',
'rg_cat1en' => '1',
'rg_cat2en' => '1',
'rg_cat3en' => '1',
'rg_cat4en' => '1',
'rg_cat5en' => '1',
'rg_cat6en' => '1',
'rg_cat7en' => '1',
'rg_cat8en' => '1',
'rg_cat9en' => '1',
'rg_cat10en' => '1',
'rg_cat1id' => 'cat1',
'rg_cat2id' => 'cat2',
'rg_cat3id' => 'cat3',
'rg_cat4id' => 'cat4',
'rg_cat5id' => 'cat5',
'rg_cat6id' => 'cat6',
'rg_cat7id' => 'cat7',
'rg_cat8id' => 'cat8',
'rg_cat9id' => 'cat9',
'rg_cat10id' => 'cat10',
'rg_u_ovlb' => '1',
'rg_rating_align' => '0',
'rg_caption_align' => '1',
'rg_drt' => '1',
'rg_wm_use' => '1',
'rg_wm_loc' => '4',
'rg_wm_file' => 'druid.png',
'rg_wm_dir' => 'wm',
'rg_mp_bc' => 'sgreen',
'rg_tn_bc' => 'syellow'
);

$is_db = null;
?>
