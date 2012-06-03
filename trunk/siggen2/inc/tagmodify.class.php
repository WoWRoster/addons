<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * Tag Modify Class
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 * @subpackage TagModify
 * @filesource
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

/**
 * SigGen Tag Modify Class
 *
 * @package    SigGen
 * @subpackage TagModify
 */
class TagModify {
  /**
   * Truncate a string
   * This should be the first modify function, or else bad things might happen...
   *
   * @param string $text
   * @param int $size
   * @param bool $ellipse
   * @return string
   */
  function _trunc($text, $size, $ellipse = 0) {
    if (strlen($text) > $size) {
      return substr($text, 0, $size) . ($ellipse ? '...' : '');
    } else {
      return $text;
    }
  }

  /**
   * Change the font size of the string
   *
   * @param string $text
   * @param int $size
   * @return string
   */
  function _size($text, $size) {
    return '|s' . $size . '|' . $text . '|s';
  }

  /**
   * Format and insert color script for write_text
   *
   * @param string $text
   * @param string $color
   * @return string
   */
  function _color($text, $color) {
    return '|c' . $color . $text . '|c';
  }

  /**
   * Get and format EXP
   *
   * @param string $expval | exp data
   * @param bool $rest | Show rested exp in string
   * @param bool $percent | Show percentage of exp in string
   * @return string
   */
  function _format_exp($expval, $rest = 0, $percent = 0) {
    list($current, $max, $rested) = explode(':', $expval);
    if ($current > 0) {
      $for_curr = number_format($current);
      $for_max = number_format($max);
      $for_rest = number_format($rested);
      return $for_curr . ' / ' . $for_max . ($rest ? ' : ' . $for_rest : '') . ($percent ? ' ' . $this->_get_perc($expval) . '%' : '');
    } else {
      return '';
    }
  }

  /**
   * Get percentage from a CP string "##:##"
   *
   * @param string $val | Percentage of val:max
   * @return string
   */
  function _get_perc($val) {
    list($current, $max, $rest) = explode(':', $val);
    return round($current > 0 ? $current / $max : 0);
  }

}
