<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * GD Progress Bar Function
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
 * GD Progress Bar Function
 *
 * @param class $siggen
 * @param array $data
 *		string value
 *		string max
 *		int x
 *		int y
 *		int x2
 *		int y2
 *		string color
 *		int alpha
 *		bool filled
 *		bool radius
 * 		string direction
 * 		bool border
 *		string border_color
 *		int border_alpha
 * 		bool background
 *		string background_color
 *		int background_alpha
 *
 * @return bool
 *
 * @uses gd_rectangle
 */
function gd_progress($siggen, $data) {
  // This has a dependancy
  // Make sure we have it loaded
  $siggen->check_module('gd_rectangle');

  // Are we using a border?
  if ($data['border']) {
    $border = array(
			'color'  => $data['border_color'],
			'alpha'  => $data['border_alpha'],
			'x'      => $data['x'] - 1,
			'y'      => $data['y'] - 1,
			'x2'     => $data['x2'] + 1,
			'y2'     => $data['y2'] + 1,
			'radius' => $data['radius'],
			'filled' => 0
    );
    gd_rectangle($siggen, $border);
  }

  // Are we filling the background?
  if ($data['background']) {
    $background = array(
			'color'  => $data['background_color'],
			'alpha'  => $data['background_alpha'],
			'x'      => $data['x'],
			'y'      => $data['y'],
			'x2'     => $data['x2'],
			'y2'     => $data['y2'],
			'radius' => $data['radius'],
			'filled' => 1
    );
    gd_rectangle($siggen, $background);
  }

  // Draw the actual progress bar
  switch ($data['direction']) {
    case 'up':
      $length = $data['y2'] - $data['y'];
      $location = ($data['value'] > 0 ? round((($data['value'] / $data['max']) * $length) - $data['y2'], 0) : $data['y2']);
      $bar = array(
				'color'  => $data['color'],
				'alpha'  => $data['alpha'],
				'x'      => $data['x'],
				'y'      => $location,
				'x2'     => $data['x2'],
				'y2'     => $data['y2'],
				'radius' => $data['radius'],
				'filled' => $data['filled']
      );
      gd_rectangle($siggen, $bar);
      break;

    case 'down':
      $length = $data['y2'] - $data['y'];
      $location = ($data['value'] > 0 ? round((($data['value'] / $data['max']) * $length) + $data['y'], 0) : 0);
      $bar = array(
				'color'  => $data['color'],
				'alpha'  => $data['alpha'],
				'x'      => $data['x'],
				'y'      => $data['y'],
				'x2'     => $data['x2'],
				'y2'     => $location,
				'radius' => $data['radius'],
				'filled' => $data['filled']
      );
      gd_rectangle($siggen, $bar);
      break;

    case 'right':
      $length = $data['x2'] - $data['x'];
      $location = ($data['value'] > 0 ? round((($data['value'] / $data['max']) * $length) + $data['x'], 0) : 0);
      $bar = array(
				'color'  => $data['color'],
				'alpha'  => $data['alpha'],
				'x'      => $location,
				'y'      => $data['y'],
				'x2'     => $data['x2'],
				'y2'     => $data['y2'],
				'radius' => $data['radius'],
				'filled' => $data['filled']
      );
      gd_rectangle($siggen, $bar);
      break;

    case 'left':
    default:
      $length = $data['x2'] - $data['x'];
      $location = ($data['value'] > 0 ? round((($data['value'] / $data['max']) * $length) - $data['x2'], 0) : 0);
      $bar = array(
				'color'  => $data['color'],
				'alpha'  => $data['alpha'],
				'x'      => $data['x'],
				'y'      => $data['y'],
				'x2'     => $location,
				'y2'     => $data['y2'],
				'radius' => $data['radius'],
				'filled' => $data['filled']
      );
      gd_rectangle($siggen, $bar);
      break;
  }

  return TRUE;
}
