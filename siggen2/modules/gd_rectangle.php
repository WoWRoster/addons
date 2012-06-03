<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * GD Rectangle Function
 * Allows filled, unfilled, and rounded corner rectangles
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
 * GD Rectangle Function
 *
 * @param class $siggen
 * @param array $data
 * 		int x
 * 		int y
 * 		int x2
 * 		int y2
 * 		bool filled
 * 		int radius
 * 		string color
 * 		int alpha
 *
 * @return bool
 */
function gd_rectangle($siggen, $data) {
  // Get our color index
  $color = $this->set_color($data['color'], $data['alpha']);

  // Make sure radius is a positive number
  $data['radius'] = abs($data['radius']);

  // Only do this "massive" drawing if we have rounded corners
  if ($data['radius'] > 0) {
    if ($data['filled'] == 1) {
      imagefilledrectangle($siggen->im, $data['x'] + $data['radius'], $data['y'], $data['x2'] - $data['radius'], $data['y2'], $color);
      imagefilledrectangle($siggen->im, $data['x'], $data['y'] + $data['radius'], $data['x'] + $data['radius'] - 1, $data['y2'] - $data['radius'], $color);
      imagefilledrectangle($siggen->im, $data['x2'] - $data['radius'] + 1, $data['y'] + $data['radius'], $data['x2'], $data['y2'] - $data['radius'], $color);

      imagefilledarc($siggen->im, $data['x'] + $data['radius'], $data['y'] + $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 180, 270, $color, IMG_ARC_PIE);
      imagefilledarc($siggen->im, $data['x2'] - $data['radius'], $data['y'] + $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 270, 360, $color, IMG_ARC_PIE);
      imagefilledarc($siggen->im, $data['x'] + $data['radius'], $data['y2'] - $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 90, 180, $color, IMG_ARC_PIE);
      imagefilledarc($siggen->im, $data['x2'] - $data['radius'], $data['y2'] - $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 360, 90, $color, IMG_ARC_PIE);
    } else {
      imageline($siggen->im, $data['x'] + $data['radius'], $data['y'], $data['x2'] - $data['radius'], $data['y'], $color);
      imageline($siggen->im, $data['x'] + $data['radius'], $data['y2'], $data['x2'] - $data['radius'], $data['y2'], $color);
      imageline($siggen->im, $data['x'], $data['y'] + $data['radius'], $data['x'], $data['y2'] - $data['radius'], $color);
      imageline($siggen->im, $data['x2'], $data['y'] + $data['radius'], $data['x2'], $data['y2'] - $data['radius'], $color);

      imagearc($siggen->im, $data['x'] + $data['radius'], $data['y'] + $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 180, 270, $color);
      imagearc($siggen->im, $data['x2'] - $data['radius'], $data['y'] + $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 270, 360, $color);
      imagearc($siggen->im, $data['x'] + $data['radius'], $data['y2'] - $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 90, 180, $color);
      imagearc($siggen->im, $data['x2'] - $data['radius'], $data['y2'] - $data['radius'], $data['radius'] * 2, $data['radius'] * 2, 360, 90, $color);
    }
  } else {
    if ($data['filled'] == 1) {
      imagefilledrectangle($siggen->im, $data['x'], $data['y'], $data['x2'], $data['y2'], $color);
    } else {
      imagerectangle($siggen->im, $data['x'], $data['y'], $data['x2'], $data['y2'], $color);
    }
  }

  return TRUE;
}
