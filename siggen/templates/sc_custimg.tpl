<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /templates/sc_custimg.tpl
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

<!-- Begin Custom Member Image Section -->
<div id="t8">

<?php if( $allow_upload ) { ?>

<form id="images_upload" method="post" action="<?php print makelink(); ?>" enctype="multipart/form-data" name="images_upload">
  <input type="hidden" name="sc_op" value="upload_image" />
  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">
        <div class="right">
          <input type="submit" value="Upload" name="fileupload" />
        </div>
        <?php print $functions->createTip('Images are currently located in:<br />\n&quot;'.str_replace('\\','/',SIGGEN_DIR.$configData['image_dir'].$configData['user_dir']).'&quot;', 'Upload User Images'); ?>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Character Name
            </div>
            <div class="config-input">
              <?php print $functions->createMemberList($member_list,$name_test,'up_image_name',1); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Image Upload Type
            </div>
            <div class="config-input">
              <div class="radioset">
                <input type="radio" id="image_type_ch" name="image_type" value="" checked="checked" /><label for="image_type_ch">Character Image</label>
                <input type="radio" id="image_type_bk" name="image_type" value="bk-" /><label for="image_type_bk">Background</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Image Upload
            </div>
            <div class="config-input">
              <input name="userfile" type="file" />
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</form>
<?php
}
else
{
  print messagebox('Uploads are disabled, see error message above.', 'Uploads DISABLED', 'sred');
}

// Get regular image files
$userFilesArr = $functions->listFiles( SIGGEN_DIR.$configData['image_dir'].$configData['user_dir'],array('png','gif','jpeg','jpg') );

if( $allow_upload )
{
?>
<!-- Begin Image Delete Box -->
<form method="post" action="<?php print makelink(); ?>" enctype="multipart/form-data" name="image_delete">
  <input type="hidden" name="sc_op" value="delete_image" />
  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">
        <div class="right">
          <input type="submit" value="Delete" name="delete_image" />
        </div>
        <?php print $functions->createTip('Images are currently located in:<br />\n&quot;'.str_replace('\\','/',SIGGEN_DIR.$configData['image_dir'].$configData['user_dir']).'&quot;', 'Delete User Images'); ?>
      </div>

      <div class="tier-3-a">
        <div class="tier-3-b">
          <div class="config">
            <div class="config-name">
              Choose Image
            </div>
            <div class="config-input">
              <?php print $functions->createOptionList($userFilesArr,$name_test,'del_image_name',2); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</form>

<?php
}
else
{
  print messagebox('Delete is disabled, see error message above.', 'Delete DISABLED', 'sred');
}
?>
</div>
<!-- End Image Upload Box -->
