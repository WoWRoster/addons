<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /templates/sc_nametest.tpl
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

if( $name_test != '' ) {
  $preview_image = '<img src="'.makelink('util-'.$addon['basename'].'-'.$config_name.'&amp;member='.$name_test.'&amp;saveonly=0&amp;etag=0', false, false, $configData['image_type']).'" alt="'.$name_test.' '.$config_name.' image" />';
}
?>

<!-- Begin Image Preview Box -->
<div id="t0">
  <form action="<?php print makelink(); ?>" method="post" enctype="multipart/form-data" name="preview_select">
    <div class="tier-2-a">
      <div class="tier-2-b">
        <div class="tier-2-title">
          <div class="right">
            <?php print $functions->createMemberList($member_list,$name_test,'name_test',1); ?>
            <input type="submit" value="Go" />
          </div>
          Preview
        </div>

        <div style="text-align: center;">
          <?php print ( $name_test == '' ? '' : $preview_image ); ?>
        </div>

      </div>
    </div>
  </form>
</div>

<!-- End Image Preview Box -->
