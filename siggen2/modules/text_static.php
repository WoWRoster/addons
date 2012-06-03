<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * Text Static Function
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
 * Text Static Function
 *
 * @param class $siggen
 * @param array $data
 * 		int x
 * 		int y
 * 		string text
 * 		string color
 * 		int alpha
 * 		int size
 * 		string font
 * 		int angle
 * 		array outline
 * 		array shadow
 *
 * @return bool
 */
function text_static($siggen, $data) {
  // Parse the string for tags
  $data['text'] = $siggen->tag->parse($data['text']);

  // Parse the string for breaks, where our modifiers are placed
  $data['text'] = explode('|b|', $data['text']);

  $x = $data['x'];
  $y = $data['y'];

  $breaks = count($data['text']);

  for ($t = 0; $t < $breaks; $t++) {
    $text = $data['text'][$t];

    // If this break is empty, there is no need to process further
    if ($text == '') {
      continue;
    }
    $color = $data['color'];
    $size = $data['size'];

    // Find color changes embeded inside the string
    if (preg_match('/\|c([a-f0-9]{6})(.+?)\|c/i', $text, $info)) {
      $color = $info[1];
      $text = preg_replace('/\|c[a-f0-9]{6}(.+?)\|c/i', '$1', $text);
    }

    // Find font size changes embeded inside the string
    if (preg_match('/\|s(.+?)\|(.+?)\|s/i', $text, $info)) {
      $size = $info[1];
      $text = preg_replace('/\|s(.+?)\|(.+?)\|s/i', '$2', $text);
    }

    $coords = $siggen->write_text($size, $data['angle'], $x, $y, $color, $data['alpha'], $data['font'], $text, $data['align'], $data['outline'], $data['shadow']);

    // Adjust the coords a bit
    $x = $coords[2] - 1;
    $y = $coords[8] - 1;
  }

  return TRUE;
}
