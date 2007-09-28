<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /templates/sc_configselect.tpl
 *
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Legal Information:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 *
 * Full License:
 *  license.txt (Included within this library)
 *
 * You should have recieved a FULL copy of this license in license.txt
 * along with this library, if you did not and you are unable to find
 * and agree to the license you may not use this library.
 *
 * For questions, comments, information and documentation please visit
 * the official website at cpframework.org
 *
 * @link http://www.wowroster.net
 * @license http://creativecommons.org/licenses/by-nc-sa/2.5/
 * @author Joshua Clark
 * @version $Id$
 * @copyright 2005-2007 Joshua Clark
 * @package SigGen
 * @filesource
 *
 */

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
?>

<!-- Begin Config Select Box -->
  <form action="<?php print makelink(); ?>" method="post" enctype="multipart/form-data" name="config_select" onsubmit="submitonce(this)">
<?php print border('sgreen','start','Select Config Mode'); ?>
    <table width="145" class="sc_table" cellspacing="0" cellpadding="2">
      <tr>
        <td class="sc_row_right2" colspan="2">Current Mode: <span class="titletext"><?php print $config_name; ?></span></td>
      </tr>
      <tr>
        <td class="sc_row1"><?php print $functions->createOptionList($config_list,$config_name,'config_name',3,'',false); ?></td>
        <td class="sc_row_right1" align="right"><input type="submit" value="Go" /></td>
      </tr>
    </table>
<?php print border('sgreen','end'); ?>
  </form>
<!-- End Config Select Box -->
