<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * Image Static Function
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 * @subpackage Module
 * @filesource
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

/**
 * Image Static Function
 *
 * @param class $siggen
 * @param array $data
 * 		int x
 * 		int y
 * 		int width
 * 		int height
 * 		string file
 *
 * @return bool
 */
function image_static($siggen, $data) {
  // Parse the string for tags
  $file = $siggen->theme['dir'] . $siggen->tag->parse($data['file']);
  $default = $siggen->theme['default_dir'] . $siggen->tag->parse($data['file']);

  if (file_exists($file)) {
    $siggen->combine_image($file, $data['x'], $data['y'], 0, 0, $data['width'], $data['height']);
    return TRUE;
  } elseif (file_exists($default)) {
    $siggen->combine_image($default, $data['x'], $data['y'], 0, 0, $data['width'], $data['height']);
    return TRUE;
  } else {
    return FALSE;
  }
}
