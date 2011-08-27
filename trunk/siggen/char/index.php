<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /char/index.php
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

// Read SigGen Config data from Database
$config_str = "SELECT `config_id`,`main_image_size_w`,`main_image_size_h`,`image_type`,`link_type`,`save_images_dir` FROM `" . $roster->db->table('config', $addon['basename']) . "`;";

$roster->output['title'] = $roster->data['name'] . ': SigGen';

print '
<div class="main-panel" align="left">
  <div class="container profile">
    <div class="tier-1-a">
      <div class="tier-1-b">
        <div class="tier-1-c">
          <div class="tier-1-title">SigGen</div>
';

$config_sql = $roster->db->query($config_str);
if( $config_sql && $roster->db->num_rows($config_sql) > 0 )
{
  $member_name = $roster->data['name'];
  $member_realm = str_replace(' ', '%20', $roster->data['server']);
  $member_str = $member_name . '@' . $roster->data['region'] . '-' . $member_realm;

  while( $row = $roster->db->fetch($config_sql, SQL_ASSOC) )
  {
    $siggen_saved_find = array('/', '%r', '%s');
    $siggen_saved_rep  = array(DIR_SEP, ROSTER_URL, $addon['url_full']);
    $save_loc = str_replace('\\', '/', str_replace($siggen_saved_find, $siggen_saved_rep, $row['save_images_dir']));
    $image_link = '<img src="' . makelink('util-' . $addon['basename'] . '-' . $row['config_id'] . '&amp;member=' . $member_str . '&amp;saveonly=0', false, false, $row['image_type']) . '" alt="" width="' . $row['main_image_size_w'] . '" height="' . $row['main_image_size_h'] . '" />';

    $curr_seo = $roster->config['seo_url'];

    $roster->config['seo_url'] = ( $row['link_type'] == 'forceseo' ? 1 : $curr_seo );

    if( $row['link_type'] == 'short' )
    {
      print messagebox($image_link . '<br />' . ROSTER_URL . $row['config_id'] . '/' . $member_str . '.' . $row['image_type']) . '<br />';
    }
    elseif( $row['link_type'] == 'saved' )
    {
      print messagebox($image_link . '<br />' . $save_loc . $member_str . '.' . $row['image_type'], ucfirst($row['config_id']), '', '100%') . '<br />';
    }
    else
    {
      print messagebox($image_link . '<br />' . makelink('util-' . $addon['basename'] . '-' . $row['config_id'] . '&amp;member=' . $member_str, true, false, $row['image_type']), ucfirst($row['config_id']), '', '100%') . '<br />';
    }

    $roster->config['seo_url'] = $curr_seo;
  }

print '
        </div>
      </div>
    </div>
  </div>
</div>';
}
