<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /templates/sc_export.tpl
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

<!-- Begin Settings Import/Export Box -->
<div id="t10">

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Import/Export Settings</div>

      <form method="post" action="<?php print makelink(); ?>" enctype="multipart/form-data" name="import_settings">
        <input type="hidden" name="sc_op" value="import" />
        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php echo $functions->createTip('This WILL OVERWRITE ALL your settings in this config', 'Import Settings'); ?>
              </div>
              <div class="config-input">
                <input name="userfile" type="file" />
                <input type="submit" value="Import" name="import" />
              </div>
            </div>
          </div>
        </div>
      </form>

      <form method="post" action="<?php print makelink(); ?>" enctype="multipart/form-data" name="export_settings">
        <input type="hidden" name="sc_op" value="export" />
        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <?php print $functions->createTip('This SAVES ALL of your settings to a file', 'Export Settings'); ?>
              </div>
              <div class="config-input">
                <input type="submit" value="Export" name="export" />
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
  <!-- End Settings Import/Export Box -->

  <br />

  <!-- Begin Settings Reset Box -->
  <form id="reset_settings" method="post" action="<?php print makelink(); ?>" enctype="multipart/form-data" name="reset_settings">
    <input type="hidden" name="sc_op" value="reset_defaults" />
    <div class="tier-2-a">
      <div class="tier-2-b">
        <div class="tier-2-title" style="cursor:pointer;" onclick="showHide('reset_siggen', 'img_reset', '<?php echo $roster->config['theme_path']; ?>/images/button_open.png','<?php echo $roster->config['theme_path']; ?>/images/button_close.png');">
          <div class="right">
            <img id="img_reset" src="/roster/trunk/templates/default/images/button_close.png" alt="">
          </div>
          Reset to Defaults
        </div>

        <div class="tier-3-a" id="reset_siggen" style="display: none;">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                <input type="checkbox" id="confirm_reset" name="confirm_reset" value="1" />
                <label for="confirm_reset">Check to confirm reset</label>
              </div>
              <div class="config-input">
                <input type="submit" value="Default Settings" name="resetDefault" />
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </form>

</div>
<!-- End Settings Reset Box -->
