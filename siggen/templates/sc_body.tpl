<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /templates/sc_body.tpl
 *
 * @link http://www.wowroster.net
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @author Joshua Clark
 * @version $Id$
 * @copyright 2005-2011 Joshua Clark
 * @package SigGen
 * @filesource
 */

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

?>

<!-- Begin Main Body -->
<form action="<?php print makelink(); ?>" method="post" enctype="multipart/form-data" id="config" name="config">

<div class="config-submit">
  <input type="hidden" name="sc_op" value="process" />
  <input type="submit" value="Save Settings" />
  <input type="reset" name="Reset" value="Reset" />
</div>

<!-- ===[ Begin Menu 1 : Main Settings ]=============================================== -->
<div id="t1">

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Main Settings</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Size of the final generated image','Master Image Size' ); ?>
            </div>
            <div class="config-input">
              w: <input name="main_image_size_w" type="text" value="<?php print $configData['main_image_size_w']; ?>" size="5" maxlength="5" />
              h: <input name="main_image_size_h" type="text" value="<?php print $configData['main_image_size_h']; ?>" size="5" maxlength="5" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Must be a directory in &quot;'.str_replace('\\','/',SIGGEN_DIR).'&quot;','Images directory' ); ?>
            </div>
            <div class="config-input">
              <input name="image_dir" type="text" value="<?php print $configData['image_dir']; ?>" size="20" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Set the links that are displayed on the character page<br /><br />- &quot;Default&quot; Shows the default link, based on Roster SEO settings<br />- &quot;Force SEO&quot; Force the display of the SEO link<br />- &quot;Save Directory&quot; Show the link to the saved generated image<br />- &quot;Short&quot; Show the short, mod_rewrite url<br />&nbsp;&nbsp; (link requires edits to Roster\\\'s .htaccess file)','Show Link' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($linklist,$configData['link_type'],'link_type' ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'These <u><strong>MUST</strong></u> be separated with a ( : )<br />Choices { frames | char | border | pvp | lvl | class | spec }','Image layer order' ); ?>
            </div>
            <div class="config-input">
              <input name="image_order" type="text" value="<?php print $configData['image_order']; ?>" size="50" maxlength="128" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Text to output when name is not found in the member list','&quot;Name Not Found&quot; Text' ); ?>
            </div>
            <div class="config-input">
              <input name="default_message" type="text" value="<?php print $configData['default_message']; ?>" size="20" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Allows a web-browser to cache the image<br />May not work for all browsers or web servers','eTag Caching' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'etag_cache', $configData['etag_cache']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Image format of the generated image','Output Image format' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($imgTypeArr,$configData['image_type'],'image_type','','',false ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controls quality for saved or output jpeg images.<br /><br />Accepted values are 0-100<br />0 = Lowest Quality | 100 = Highest Quality','Jpeg image quality' ); ?>
            </div>
            <div class="config-input">
              <input name="image_quality" type="text" value="<?php print $configData['image_quality']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controls dithering mode for saved or output gif images.<br />Dithered images tend to look better.','Gif image dithering' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'gif_dither', $configData['gif_dither']); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Image Packs</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select an image pack<br /><span style=&quot;color:red;&quot;>You MUST re-select the default character image again when changing this!</span>','Character image pack' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($charImgDirList,$configData['char_dir'],'char_dir',0,'onchange="document.config.submit();"',false ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select an image pack','Class image pack' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($classImgDirList,$configData['class_dir'],'class_dir',0,'onchange="document.config.submit();"',false ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select an image pack','Talent Spec image pack' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($specImgDirList,$configData['spec_dir'],'spec_dir',0,'onchange="document.config.submit();"',false ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select an image pack<br /><span style=&quot;color:red;&quot;>You MUST re-select the default background image and all of the images<br />in the background image config again when changing this!</span>','Background image pack' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($backImgDirList,$configData['backg_dir'],'backg_dir',0,'onchange="document.config.submit();"',false ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select an image pack','PvP logo image pack' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($pvpImgDirList,$configData['pvplogo_dir'],'pvplogo_dir',0,'onchange="document.config.submit();"',false ); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Directories</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Sub directory of main image directory','Custom Member images directory' ); ?>
            </div>
            <div class="config-input">
              <input name="user_dir" type="text" value="<?php print $configData['user_dir']; ?>" size="20" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Sub directory of main image directory','Color Frames directory' ); ?>
            </div>
            <div class="config-input">
              <input name="frame_dir" type="text" value="<?php print $configData['frame_dir']; ?>" size="20" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Sub directory of main image directory','Level Bubble Image directory' ); ?>
            </div>
            <div class="config-input">
              <input name="level_dir" type="text" value="<?php print $configData['level_dir']; ?>" size="20" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Sub directory of main image directory','Bordering Images directory' ); ?>
            </div>
            <div class="config-input">
              <input name="border_dir" type="text" value="<?php print $configData['border_dir']; ?>" size="20" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Realative to the &quot;/roster/&quot; directory','Fonts directory' ); ?>
            </div>
            <div class="config-input">
              <input name="font_dir" type="text" value="<?php print $configData['font_dir']; ?>" size="20" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Save Images</div>

<?php if( $allow_save ) { ?>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Save generated images to a directory<br />Directory is specified below','Save images to server' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'save_images', $configData['save_images']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Supresses image output when script is viewed<br />Only works when &quot;Save Images&quot; is on','Suppress Image Output' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'save_only_mode', $configData['save_only_mode']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'This will convert accented characters in a player\\\'s name to non accented characters when saving images<br /><span class=&quot;red&quot;>WARNING:</span> All players with names that map to the same name can and will be overwritten<br />For a list of converted characters, view the SigGen Documentation','Convert Accents' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'save_char_convert', $configData['save_char_convert']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Specify a directory to save generated images to<br />This is a full path to the save location<br />Options:<ul><li>%s - Use this to specify the SigGen Directory</li><li>%r - Use this to specify the Roster Directory</li></ul>Current save path is &quot;'.str_replace('\\','/',str_replace($siggen_saved_find,$siggen_saved_rep,$configData['save_images_dir'])).'&quot;','Saved images directory' ); ?>
            </div>
            <div class="config-input">
              <input name="save_images_dir" type="text" value="<?php print $configData['save_images_dir']; ?>" size="20" maxlength="255" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Image format of saved images','Saved images format' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($imgTypeArr,$configData['save_images_format'],'save_images_format','','',false ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Text to place before the saved image file','Saved Images Prefix' ); ?>
            </div>
            <div class="config-input">
              <input name="save_prefix" type="text" value="<?php print $configData['save_prefix']; ?>" size="20" maxlength="32" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Text to place after the saved image file','Saved Images Suffix' ); ?>
            </div>
            <div class="config-input">
              <input name="save_suffix" type="text" value="<?php print $configData['save_suffix']; ?>" size="20" maxlength="32" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'This will generate an image and save it to the server disk for<br />each character when update.php is ran','Auto-save image on character update' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'trigger', $configData['trigger']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'This will generate an image and save it to the server disk for<br />EVERY character in the guild when update.php is ran in &quot;Guild Update&quot; mode<br /><br />PLEASE READ THE WARNING IN THE DOCUMENTATION<br />If you do get time-out errors, then you should disable this','Auto-save images on guild update' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'guild_trigger', $configData['guild_trigger']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'This will clear the saved directory when &quot;Auto-save images on guild update&quot; is active<br />Useful to clear out old saved images','Clear Saved Directory' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'cleardir', $configData['cleardir']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Enable UniUploader save images workaround<br /><span class=&quot;red&quot;>Requires &quot;allow_url_fopen&quot; to be enabled on your server!</span>','UniUploader Fix' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'uniup_compat', $configData['uniup_compat']); ?>
            </div>
          </div>
        </div>
      </div>

<?php } else { ?>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Save generated images to a directory<br />Directory is specified below','Save images to server' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'save_images', $configData['save_images']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Specify a directory to save generated images to<br />This is a full path to the save location<br />Options:<ul><li>%s - Use this to specify the SigGen Directory</li><li>%r - Use this to specify the Roster Directory</li></ul>Current save path is &quot;'.str_replace('\\','/',str_replace($siggen_saved_find,$siggen_saved_rep,$configData['save_images_dir'])).'&quot;','Saved images directory' ); ?>
            </div>
            <div class="config-input">
              <input name="save_images_dir" type="text" value="<?php print $configData['save_images_dir']; ?>" size="20" maxlength="255" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div style="text-align: center;">
              <?php print $functions->createTip( 'Either the directory doesn&acute;t exist or &quot;Save Images&quot; is turned off','Save Image Functions Disabled' ); ?>
              <input name="save_only_mode" type="hidden" value="0" />
              <input name="save_char_convert" type="hidden" value="<?php print $configData['save_char_convert']; ?>" />
              <input name="save_prefix" type="hidden" value="<?php print $configData['save_prefix']; ?>" />
              <input name="save_suffix" type="hidden" value="<?php print $configData['save_suffix']; ?>" />
              <input name="trigger" type="hidden" value="0" />
              <input name="guild_trigger" type="hidden" value="0" />
              <input name="cleardir" type="hidden" value="<?php print $configData['cleardir']; ?>" />
              <input name="uniup_compat" type="hidden" value="<?php print $configData['uniup_compat']; ?>" />
            </div>
          </div>
        </div>
      </div>

<?php } ?>

    </div>
  </div>

</div>

<!-- ===[ Begin Menu 2 : Backgrounds ]================================================= -->
<div id="t2">

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Backgrounds</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Display an image for the background<br />Settings on how to configure what image is displayed are below','Display background image' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'backg_disp', $configData['backg_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Turn on to &quot;color fill&quot; the background<br />when &quot;Display background image&quot; is turned off<br />Use &quot;Background fill color&quot; setting to choose the color','Color fill background' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'backg_fill', $configData['backg_fill']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select a color to fill the background with<br />Setting is for &quot;Color fill background&quot;','Background fill color' ); ?>
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['backg_fill_color']; ?>;" value="<?php print $configData['backg_fill_color']; ?>" name="backg_fill_color" id="backg_fill_color" /><img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('backg_fill_color'))" alt="" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Image to use for the outside border<br />Set to &quot;--None--&quot; to disable','Outside border image name' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($borderFilesArr,$configData['outside_border_image'],'outside_border_image',2 ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Image to use for the colored frames<br />Set to &quot;--None--&quot; to disable','Colored frames image name' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($frameFilesArr,$configData['frames_image'],'frames_image',2 ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Image to use when the &quot;Background Selection Configuration&quot;<br />cannot select an image','Default Background Image' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($backgFilesArr,$configData['backg_default_image'],'backg_default_image',2 ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Makes everyone&acute;s background the default<br /><br />Settings this to &quot;Yes&quot; will disable the &quot;Background Selection Configuration&quot; window','Default Background Override' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'backg_force_default', $configData['backg_force_default']); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php if( !$configData['backg_force_default'] ) { ?>

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Background Selection Configuration</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div style="text-align: center;">
              <?php print $functions->createTip( 'The top box is what to search for<br />The bottom box is what image to set when that search is found<br /><br />The top box must be exactly like in the database<br />The bottom box is automatically filled from the backgrounds directory','Background Selection Help' ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select which table to use when selecting backgrounds','Search Table' ); ?>
            </div>
            <div class="config-input">
              <select name="backg_data_table" onchange="document.config.submit();">
                <option value="members" <?php print ( $configData['backg_data_table'] == 'members' ? 'selected="selected"' : '' ); ?>>Members Table</option>
                <option value="players" <?php print ( $configData['backg_data_table'] == 'players' ? 'selected="selected"' : '' ); ?>>Players Table</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select which field to use when selecting backgrounds','Search Field' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($backgColumsArr,$configData['backg_data'],'backg_data',3,'',false ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'This uses the files in &quot;'.str_replace('\\','/',SIGGEN_DIR).'locale/&quot; to translate<br /> the localized name to the english name<br /><br />Only race and class names are in the locale file by default','Translate &quot;Search Name&quot;' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'backg_translate', $configData['backg_translate']); ?>
            </div>
          </div>
        </div>
      </div>
<?php

  for($c=1; $c<=12; $c++) {
    print '
      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Background '.$c.' Search
            </div>
            <div class="config-input">
              <input name="backg_search_'.$c.'" type="text" value="'.$configData['backg_search_'.$c].'" size="25" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name" style="margin-left: 20px;">
              Image
            </div>
            <div class="config-input">
              '.$functions->createOptionList($backgFilesArr,$configData['backg_file_'.$c],'backg_file_'.$c,2 ).'
            </div>
          </div>
        </div>
      </div>';
  }
?>
    </div>
  </div>

<?php } else { ?>

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Background Selection Configuration DISABLED</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              This is disabled because &quot;Default Background Override&quot; is ON
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

</div>

<!-- ===[ Begin Menu 4 : eXp Bar Config ]============================================== -->
<div id="t4">

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">EXP Bar Config</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Select whether to display an eXp bar','Display eXp bar' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'expbar_disp', $configData['expbar_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Draw a border around the eXp bar<br />Color settings are below','Display border' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'expbar_disp_bdr', $configData['expbar_disp_bdr']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Fill the entire eXp bar with a color<br />Color settings are below','Display inside color fill' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'expbar_disp_inside', $configData['expbar_disp_inside']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Changes the eXp bar into a filled bar with custom text for &quot;Max Level&quot; characters','Display Max Level Bar' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'expbar_max_disp', $configData['expbar_max_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controls what level to use the &quot;Max Level Bar&quot;<br />This is usually the maximum level attainable in WoW','Max Level' ); ?>
            </div>
            <div class="config-input">
              <input name="expbar_max_level" type="text" value="<?php print $configData['expbar_max_level']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Hide the eXp bar when a character is at the &quot;Max Level&quot;','Hide Max eXp bar' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'expbar_max_hidden', $configData['expbar_max_hidden']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'How big to draw the eXp bar on the main image','eXp bar size' ); ?>
            </div>
            <div class="config-input">
              w: <input name="expbar_length" type="text" value="<?php print $configData['expbar_length']; ?>" size="3" maxlength="3" />
              h: <input name="expbar_height" type="text" value="<?php print $configData['expbar_height']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to draw the eXp bar on the main image','eXp bar placement' ); ?>
            </div>
            <div class="config-input">
              x: <input name="expbar_loc_x" type="text" value="<?php print $configData['expbar_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="expbar_loc_y" type="text" value="<?php print $configData['expbar_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Display the current eXp level on the exp bar','Display eXp level text' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'expbar_disp_text', $configData['expbar_disp_text']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Choose what to write before the eXp Level text','Text before eXp level display' ); ?>
            </div>
            <div class="config-input">
              <input name="expbar_string_before" type="text" value="<?php print $configData['expbar_string_before']; ?>" size="30" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Choose what to write after the eXp Level text','Text after eXp level display' ); ?>
            </div>
            <div class="config-input">
              <input name="expbar_string_after" type="text" value="<?php print $configData['expbar_string_after']; ?>" size="30" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Choose what to write on the eXp bar when &quot;Display Max Level Bar&quot; is turned on','Text on the Max eXp bar' ); ?>
            </div>
            <div class="config-input">
              <input name="expbar_max_string" type="text" value="<?php print $configData['expbar_max_string']; ?>" size="30" maxlength="64" />
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">EXP Bar Colors</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Border Color
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['expbar_color_border']; ?>;" value="<?php print $configData['expbar_color_border']; ?>" name="expbar_color_border" id="expbar_color_border" />
              <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('expbar_color_border'))" alt="" />
              <?php print $functions->createTipIcon( 'Make the border transparent/translucent<br /><br />Accepted values are 0-127<br />0 = Opaque | 127 = Transparent','Alpha' ); ?>a:
              <input name="expbar_trans_border" type="text" value="<?php print $configData['expbar_trans_border']; ?>" size="2" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Inside fill color
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['expbar_color_inside']; ?>;" value="<?php print $configData['expbar_color_inside']; ?>" name="expbar_color_inside" id="expbar_color_inside" />
              <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('expbar_color_inside'))" alt="" />
              <?php print $functions->createTipIcon( 'Make the inside fill transparent/translucent<br /><br />Accepted values are 0-127<br />0 = Opaque | 127 = Transparent','Alpha' ); ?>a:
              <input name="expbar_trans_inside" type="text" value="<?php print $configData['expbar_trans_inside']; ?>" size="2" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Progress bar color
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['expbar_color_bar']; ?>;" value="<?php print $configData['expbar_color_bar']; ?>" name="expbar_color_bar" id="expbar_color_bar" />
              <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('expbar_color_bar'))" alt="" />
              <?php print $functions->createTipIcon( 'Make the progress bar transparent/translucent<br /><br />Accepted values are 0-127<br />0 = Opaque | 127 = Transparent','Alpha' ); ?>a:
              <input name="expbar_trans_bar" type="text" value="<?php print $configData['expbar_trans_bar']; ?>" size="2" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Max eXp bar color
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['expbar_color_maxbar']; ?>;" value="<?php print $configData['expbar_color_maxbar']; ?>" name="expbar_color_maxbar" id="expbar_color_maxbar" />
              <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('expbar_color_maxbar'))" alt="" />
              <?php print $functions->createTipIcon( 'Make the &quot;Max Level&quot; bar transparent/translucent<br /><br />Accepted values are 0-127<br />0 = Opaque | 127 = Transparent','Alpha' ); ?>a:
              <input name="expbar_trans_maxbar" type="text" value="<?php print $configData['expbar_trans_maxbar']; ?>" size="2" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">EXP Bar Font Settings</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Font / Color / Size
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($fontFilesArr,$configData['expbar_font_name'],'expbar_font_name',1,'',false); ?>
              c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['expbar_font_color']; ?>;" value="<?php print $configData['expbar_font_color']; ?>" name="expbar_font_color" id="expbar_font_color" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('expbar_font_color'))" alt="" />
              s: <input name="expbar_font_size" type="text" value="<?php print $configData['expbar_font_size']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['expbar_text_shadow']; ?>;" value="<?php print $configData['expbar_text_shadow']; ?>" name="expbar_text_shadow" id="expbar_text_shadow" />
              <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('expbar_text_shadow'))" alt="" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Text alignment
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($alignArr,$configData['expbar_align'],'expbar_align','','',false); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Max eXp bar text alignment
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($alignArr,$configData['expbar_align_max'],'expbar_align_max','','',false); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<!-- ===[ Begin Menu 5 : Level Bubble ]================================================ -->
<div id="t5" >

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Level Bubble Settings</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Display the character&acute;s current level','Level Bubble display' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'lvl_disp', $configData['lvl_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Image to use for the Level Bubble<br />You can select &quot;--None--&quot; to just display text','Level Bubble image name' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($levelFilesArr,$configData['lvl_image'],'lvl_image',2 ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the Level Bubble','Level Bubble image placement' ); ?>
            </div>
            <div class="config-input">
              x: <input name="lvl_loc_x" type="text" value="<?php print $configData['lvl_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="lvl_loc_y" type="text" value="<?php print $configData['lvl_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the level text<br />The starting point is based on the Level Bubble image placement','Level Bubble text placement' ); ?>
            </div>
            <div class="config-input">
              x: <input name="lvl_text_loc_x" type="text" value="<?php print $configData['lvl_text_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="lvl_text_loc_y" type="text" value="<?php print $configData['lvl_text_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>
      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Font / Color / Size
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($fontFilesArr,$configData['lvl_font_name'],'lvl_font_name',1,'',false); ?>
              c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['lvl_font_color']; ?>;" value="<?php print $configData['lvl_font_color']; ?>" name="lvl_font_color" id="lvl_font_color" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('lvl_font_color'))" alt="" />
              s: <input name="lvl_font_size" type="text" value="<?php print $configData['lvl_font_size']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['lvl_text_shadow']; ?>;" value="<?php print $configData['lvl_text_shadow']; ?>" name="lvl_text_shadow" id="lvl_text_shadow" />
              <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('lvl_text_shadow'))" alt="" />
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<!-- ===[ Begin Menu 6 : Skills Display ]============================================== -->
<div id="t6" >

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Skills Display</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controlls display of main professions<br />Ex. Leatherworking, Mining, Engineering, etc...','Display Professions' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'skills_disp_primary', $configData['skills_disp_primary']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controlls display of secondary skills<br />Ex. Cooking, Fishing, etc...','Display Secondary Skills' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'skills_disp_secondary', $configData['skills_disp_secondary']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controlls display of riding skill','Display Riding Skill' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'skills_disp_mount', $configData['skills_disp_mount']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controlls display of skill description','Display Skill Description' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'skills_disp_desc', $configData['skills_disp_desc']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controlls display of skill level','Display Skill Level' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'skills_disp_level', $configData['skills_disp_level']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controlls display of maximum attainable skill level','Display Max Skill Level' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'skills_disp_levelmax', $configData['skills_disp_levelmax']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the skill description info','Skills Placment [Description]' ); ?>
            </div>
            <div class="config-input">
              x: <input name="skills_desc_loc_x" type="text" value="<?php print $configData['skills_desc_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="skills_desc_loc_y" type="text" value="<?php print $configData['skills_desc_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the skill level info','Skills Placment [Skill Level]' ); ?>
            </div>
            <div class="config-input">
              x: <input name="skills_level_loc_x" type="text" value="<?php print $configData['skills_level_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="skills_level_loc_y" type="text" value="<?php print $configData['skills_level_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Gap between each line for the description','Line spacing [Description]' ); ?>
            </div>
            <div class="config-input">
              <input name="skills_desc_linespace" type="text" value="<?php print $configData['skills_desc_linespace']; ?>" size="3" maxlength="3" /><br />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Gap between each line for the skill level','Line spacing [Skill Level]' ); ?>
            </div>
            <div class="config-input">
              <input name="skills_level_linespace" type="text" value="<?php print $configData['skills_level_linespace']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Maximum text length for the skill description','Description Text Length' ); ?>
            </div>
            <div class="config-input">
              <input name="skills_desc_length" type="text" value="<?php print $configData['skills_desc_length']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Maximum text length for riding skill text<br />This can be longer because there is no skill level for riding','Riding Skill Text Length' ); ?>
            </div>
            <div class="config-input">
              <input name="skills_desc_length_mount" type="text" value="<?php print $configData['skills_desc_length_mount']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Text Alignment [Description]
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($alignArr,$configData['skills_align_desc'],'skills_align_desc','','',false); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Text Alignment [Skill Level]
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($alignArr,$configData['skills_align_level'],'skills_align_level','','',false); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Controls how big of a space to put between skill groups','Skill Gap' ); ?>
            </div>
            <div class="config-input">
              <input name="skills_gap" type="text" value="<?php print $configData['skills_gap']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Font / Color / Size
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($fontFilesArr,$configData['skills_font_name'],'skills_font_name',1,'',false); ?>
              c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['skills_font_color']; ?>;" value="<?php print $configData['skills_font_color']; ?>" name="skills_font_color" id="skills_font_color" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('skills_font_color'))" alt="" />
              s: <input name="skills_font_size" type="text" value="<?php print $configData['skills_font_size']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
            </div>
            <div class="config-input">
              <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['skills_shadow']; ?>;" value="<?php print $configData['skills_shadow']; ?>" name="skills_shadow" id="skills_shadow" />
              <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('skills_shadow'))" alt="" />
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<!-- ===[ Begin Menu 7 : Character/PvP Logo ]========================================== -->
<div id="t7" >

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Char/Class/PvP Logo</div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Display the character portrait/image','Character Image display' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'charlogo_disp', $configData['charlogo_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Choose an image to use as the default character image','Default character image' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($charDirList,$configData['charlogo_default_image'],'charlogo_default_image',2 ); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the character image','Character image placement' ); ?>
            </div>
            <div class="config-input">
              x: <input name="charlogo_loc_x" type="text" value="<?php print $configData['charlogo_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="charlogo_loc_y" type="text" value="<?php print $configData['charlogo_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Display a class logo','Class Logo Display' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'class_img_disp', $configData['class_img_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the class logo','Class Logo Placement' ); ?>
            </div>
            <div class="config-input">
              x: <input name="class_img_loc_x" type="text" value="<?php print $configData['class_img_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="class_img_loc_y" type="text" value="<?php print $configData['class_img_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Display a talent spec icon','Talent Spec Icon Display' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'spec_img_disp', $configData['spec_img_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the talent spec icon','Talent Spec Icon Placement' ); ?>
            </div>
            <div class="config-input">
              x: <input name="spec_img_loc_x" type="text" value="<?php print $configData['spec_img_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="spec_img_loc_y" type="text" value="<?php print $configData['spec_img_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Display a PvP rank logo','PvP logo display' ); ?>
            </div>
            <div class="config-input">
              <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'pvplogo_disp', $configData['pvplogo_disp']); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              <?php print $functions->createTip( 'Where to place the PvP rank logo','PvP logo image placement' ); ?>
            </div>
            <div class="config-input">
              x: <input name="pvplogo_loc_x" type="text" value="<?php print $configData['pvplogo_loc_x']; ?>" size="3" maxlength="3" />
              y: <input name="pvplogo_loc_y" type="text" value="<?php print $configData['pvplogo_loc_y']; ?>" size="3" maxlength="3" />
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<!-- ===[ Begin Menu 8 : Text Config ]================================================= -->
<div id="t8">

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Text Configuration</div>

      <div class="tab-navigation" style="height: 30px;">
        <ul id="siggen_text_menu">
          <li><a rel="textT1" class="text">Name</a></li>
          <li><a rel="textT2" class="text">Class</a></li>
          <li><a rel="textT3" class="text">PvP Rank</a></li>
          <li><a rel="textT4" class="text">Guild Name</a></li>
          <li><a rel="textT5" class="text">Guild Title/Rank</a></li>
          <li><a rel="textT6" class="text">Realm Name</a></li>
          <li><a rel="textT7" class="text">Website Name</a></li>
          <li><a rel="textT8" class="text">Custom Text</a></li>
          <li><a rel="textT9" class="text">Talent Spec</a></li>
          <li><a rel="textT10" class="text">Talent Points</a></li>
        </ul>
      </div>

      <!-- ===[ Begin Text Config 1 ]=== -->
      <div id="textT1">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Name
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_name_disp', $configData['text_name_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Name placement
              </div>
              <div class="config-input">
                x: <input name="text_name_loc_x" type="text" value="<?php print $configData['text_name_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_name_loc_y" type="text" value="<?php print $configData['text_name_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Name alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_name_align'],'text_name_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_name_font_name'],'text_name_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_name_font_color']; ?>;" value="<?php print $configData['text_name_font_color']; ?>" name="text_name_font_color" id="text_name_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_name_font_color'))" alt="" />
                s: <input name="text_name_font_size" type="text" value="<?php print $configData['text_name_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_name_shadow']; ?>;" value="<?php print $configData['text_name_shadow']; ?>" name="text_name_shadow" id="text_name_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_name_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 2 ]=== -->
      <div id="textT2">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Class
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_class_disp', $configData['text_class_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Class placement
              </div>
              <div class="config-input">
                x: <input name="text_class_loc_x" type="text" value="<?php print $configData['text_class_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_class_loc_y" type="text" value="<?php print $configData['text_class_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Class alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_class_align'],'text_class_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_class_font_name'],'text_class_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_class_font_color']; ?>;" value="<?php print $configData['text_class_font_color']; ?>" name="text_class_font_color" id="text_class_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_class_font_color'))" alt="" />
                s: <input name="text_class_font_size" type="text" value="<?php print $configData['text_class_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_class_shadow']; ?>;" value="<?php print $configData['text_class_shadow']; ?>" name="text_class_shadow" id="text_class_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_class_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 3 ]=== -->
      <div id="textT3">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display PvP Rank
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_honor_disp', $configData['text_honor_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                PvP Rank placement
              </div>
              <div class="config-input">
                x: <input name="text_honor_loc_x" type="text" value="<?php print $configData['text_honor_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_honor_loc_y" type="text" value="<?php print $configData['text_honor_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                PvP Rank alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_honor_align'],'text_honor_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_honor_font_name'],'text_honor_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_honor_font_color']; ?>;" value="<?php print $configData['text_honor_font_color']; ?>" name="text_honor_font_color" id="text_honor_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_honor_font_color'))" alt="" />
                s: <input name="text_honor_font_size" type="text" value="<?php print $configData['text_honor_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_honor_shadow']; ?>;" value="<?php print $configData['text_honor_shadow']; ?>" name="text_honor_shadow" id="text_honor_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_honor_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 4 ]=== -->
      <div id="textT4">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Guild Name
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_guildname_disp', $configData['text_guildname_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Guild Name placement
              </div>
              <div class="config-input">
                x: <input name="text_guildname_loc_x" type="text" value="<?php print $configData['text_guildname_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_guildname_loc_y" type="text" value="<?php print $configData['text_guildname_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Guild Name alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_guildname_align'],'text_guildname_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_guildname_font_name'],'text_guildname_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_guildname_font_color']; ?>;" value="<?php print $configData['text_guildname_font_color']; ?>" name="text_guildname_font_color" id="text_guildname_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_guildname_font_color'))" alt="" />
                s: <input name="text_guildname_font_size" type="text" value="<?php print $configData['text_guildname_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_guildname_shadow']; ?>;" value="<?php print $configData['text_guildname_shadow']; ?>" name="text_guildname_shadow" id="text_guildname_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_guildname_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 5 ]=== -->
      <div id="textT5">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Guild Title/Rank
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_guildtitle_disp', $configData['text_guildtitle_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Guild Title/Rank placement
              </div>
              <div class="config-input">
                x: <input name="text_guildtitle_loc_x" type="text" value="<?php print $configData['text_guildtitle_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_guildtitle_loc_y" type="text" value="<?php print $configData['text_guildtitle_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Guild Title/Rank alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_guildtitle_align'],'text_guildtitle_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_guildtitle_font_name'],'text_guildtitle_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_guildtitle_font_color']; ?>;" value="<?php print $configData['text_guildtitle_font_color']; ?>" name="text_guildtitle_font_color" id="text_guildtitle_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_guildtitle_font_color'))" alt="" />
                s: <input name="text_guildtitle_font_size" type="text" value="<?php print $configData['text_guildtitle_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_guildtitle_shadow']; ?>;" value="<?php print $configData['text_guildtitle_shadow']; ?>" name="text_guildtitle_shadow" id="text_guildtitle_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_guildtitle_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 6 ]=== -->
      <div id="textT6">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Realm Name
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_servername_disp', $configData['text_servername_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Realm Name placement
              </div>
              <div class="config-input">
                x: <input name="text_servername_loc_x" type="text" value="<?php print $configData['text_servername_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_servername_loc_y" type="text" value="<?php print $configData['text_servername_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Realm Name alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_servername_align'],'text_servername_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_servername_font_name'],'text_servername_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_servername_font_color']; ?>;" value="<?php print $configData['text_servername_font_color']; ?>" name="text_servername_font_color" id="text_servername_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_servername_font_color'))" alt="" />
                s: <input name="text_servername_font_size" type="text" value="<?php print $configData['text_servername_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_servername_shadow']; ?>;" value="<?php print $configData['text_servername_shadow']; ?>" name="text_servername_shadow" id="text_servername_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_servername_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 7 ]=== -->
      <div id="textT7">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Website Name
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_sitename_disp', $configData['text_sitename_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Website Name placement
              </div>
              <div class="config-input">
                x: <input name="text_sitename_loc_x" type="text" value="<?php print $configData['text_sitename_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_sitename_loc_y" type="text" value="<?php print $configData['text_sitename_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Website Name alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_sitename_align'],'text_sitename_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Remove "http://" from website name?
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_sitename_remove', $configData['text_sitename_remove']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_sitename_font_name'],'text_sitename_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_sitename_font_color']; ?>;" value="<?php print $configData['text_sitename_font_color']; ?>" name="text_sitename_font_color" id="text_sitename_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_sitename_font_color'))" alt="" />
                s: <input name="text_sitename_font_size" type="text" value="<?php print $configData['text_sitename_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_sitename_shadow']; ?>;" value="<?php print $configData['text_sitename_shadow']; ?>" name="text_sitename_shadow" id="text_sitename_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_sitename_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 8 ]=== -->
      <div id="textT8">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Custom Text
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_custom_disp', $configData['text_custom_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Custom Text placement
              </div>
              <div class="config-input">
                x: <input name="text_custom_loc_x" type="text" value="<?php print $configData['text_custom_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_custom_loc_y" type="text" value="<?php print $configData['text_custom_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Custom Text
              </div>
              <div class="config-input">
                <input name="text_custom_text" type="text" value="<?php print $configData['text_custom_text']; ?>" size="35" maxlength="128" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Custom Text alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_custom_align'],'text_custom_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_custom_font_name'],'text_custom_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_custom_font_color']; ?>;" value="<?php print $configData['text_custom_font_color']; ?>" name="text_custom_font_color" id="text_custom_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_custom_font_color'))" alt="" />
                s: <input name="text_custom_font_size" type="text" value="<?php print $configData['text_custom_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_custom_shadow']; ?>;" value="<?php print $configData['text_custom_shadow']; ?>" name="text_custom_shadow" id="text_custom_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_custom_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 9 ]=== -->
      <div id="textT9">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Talent Spec
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_spec_disp', $configData['text_spec_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Talent Spec placement
              </div>
              <div class="config-input">
                x: <input name="text_spec_loc_x" type="text" value="<?php print $configData['text_spec_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_spec_loc_y" type="text" value="<?php print $configData['text_spec_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Talent Spec alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_spec_align'],'text_spec_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_spec_font_name'],'text_spec_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_spec_font_color']; ?>;" value="<?php print $configData['text_spec_font_color']; ?>" name="text_spec_font_color" id="text_spec_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_spec_font_color'))" alt="" />
                s: <input name="text_spec_font_size" type="text" value="<?php print $configData['text_spec_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_spec_shadow']; ?>;" value="<?php print $configData['text_spec_shadow']; ?>" name="text_spec_shadow" id="text_spec_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_spec_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- ===[ Begin Text Config 10 ]=== -->
      <div id="textT10">

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Display Talent Points
              </div>
              <div class="config-input">
                <?php print $functions->createRadioSet(array('Yes' => 1, 'No' => 0), 'text_talpoints_disp', $configData['text_talpoints_disp']); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Talent Points placement
              </div>
              <div class="config-input">
                x: <input name="text_talpoints_loc_x" type="text" value="<?php print $configData['text_talpoints_loc_x']; ?>" size="3" maxlength="3" />
                y: <input name="text_talpoints_loc_y" type="text" value="<?php print $configData['text_talpoints_loc_y']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Talent Points alignment
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($alignArr,$configData['text_talpoints_align'],'text_talpoints_align','','',false); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Font / Color / Size
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($fontFilesArr,$configData['text_talpoints_font_name'],'text_talpoints_font_name',1,'',false); ?>
                c: <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_talpoints_font_color']; ?>;" value="<?php print $configData['text_talpoints_font_color']; ?>" name="text_talpoints_font_color" id="text_talpoints_font_color" />
                  <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_talpoints_font_color'))" alt="" />
                s: <input name="text_talpoints_font_size" type="text" value="<?php print $configData['text_talpoints_font_size']; ?>" size="3" maxlength="3" />
              </div>
            </div>
          </div>
        </div>

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip( 'Create a pseudo-shadow behind the text<br />Clearing this box turns off the shadow','Shadow Text' ); ?>
              </div>
              <div class="config-input">
                <input type="text" maxlength="7" size="10" style="background-color:<?php print $configData['text_talpoints_shadow']; ?>;" value="<?php print $configData['text_talpoints_shadow']; ?>" name="text_talpoints_shadow" id="text_talpoints_shadow" />
                <img src="<?php print $roster->config['theme_path']; ?>/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById('text_talpoints_shadow'))" alt="" />
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

</div>

</form>
<!-- End Main Body -->
