<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * Image Class Function
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
 * Image Class Function
 *
 * @param class $siggen
 * @param array $data
 *    int x
 *    int y
 *    int width
 *    int height
 *
 * @return bool
 *
 * @uses image_static
 */
function image_class($siggen, $data) {
  // This has a dependancy
  // Make sure we have it loaded
  $siggen->check_module('image_static');

  $data['file'] = 'class' . DIR_SEP . strtolower($siggen->tag->tags['classEn']['data']) . '.png';

  return image_static($siggen, $data);
}
