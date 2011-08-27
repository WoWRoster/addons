<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /templates/sc_configselect.tpl
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

<!-- Begin Config Select Box -->
<div id="tc">

  <div class="tier-2-a">
    <div class="tier-2-b">
      <div class="tier-2-title">Config Select</div>

      <form action="<?php print makelink(); ?>" method="post" enctype="multipart/form-data" name="config_select">
        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Select a configuration
              </div>
              <div class="config-input">
                <?php print $functions->createOptionList($config_list,$config_name,'config_name',3,'',false); ?>
                <input type="submit" value="Set" />
              </div>
            </div>
          </div>
        </div>
      </form>

      <form action="<?php print makelink(); ?>" method="post" enctype="multipart/form-data" name="config_delete">
        <input type="hidden" name="config_mode" value="delete" />
        <input type="hidden" name="config_name" value="<?php print $config_name; ?>" />
        
        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Delete the current configuration [<?php print $config_name; ?>]
              </div>
              <div class="config-input">
                <input type="submit" value="Delete" />
              </div>
            </div>
          </div>
        </div>
      </form>

      <form action="<?php print makelink(); ?>" method="post" enctype="multipart/form-data" name="config_new">
        <input type="hidden" name="config_mode" value="new" />

        <div class="tier-3-a">
          <div class="tier-3-b">
            <div class="config">
              <div class="config-name">
                Create New
              </div>
              <div class="config-input">
                <input type="text" maxlength="20" size="15" value="*new config*" name="config_name" onclick="clickclear(this, '*new config*')" onblur="clickrecall(this,'*new config*')" />
                <input type="submit" value="New" />
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>

</div>
<!-- End Config Select Box -->
