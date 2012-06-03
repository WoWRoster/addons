<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * enUS Locale
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

$lang['admin']['mainconf'] = 'Main Config|SigGen main configuration';
$lang['admin']['design'] = 'Design Config|Control main aspects of each design type';

$lang['admin']['etag'] = 'eTag Cache Mode|Allows a web browser to cache the generated images<br />(May not work with all browsers)';
$lang['admin']['quality_jpg'] = 'JPEG Quality|Controls the quality of generated jpeg images';
$lang['admin']['quality_gif'] = 'GIF Quality|Controls the dither mode of generated gif images';


$lang['admin']['design_signature'] = 'Signature|Controls aspects of Signatures';
$lang['admin']['design_avatar'] = 'Avatar|Controls aspects of Avatars';
$lang['admin']['design_banner'] = 'Banner|Controls aspects of Banners';

$lang['admin']['design_default_name'] = '&quot;Not Found&quot; Text|Text to display when name is not found in the list';
$lang['admin']['design_imageformat'] = 'Output Image format|Format of the generated image';

$lang['admin']['design_save'] = 'Generate Saved Image|Save generated images to the server<br />These images can then be directly accessed or saved';
$lang['admin']['design_saveformat'] = 'Save Image format|Format of the saved generated image';

$lang['admin']['design_update_char'] = 'Auto-Save Images [Character]|This will generate an image for every chracter that is in a character update and save it to the server disk';
$lang['admin']['design_update_members'] = 'Auto-Save Images [Members]|This will generate an image for every chracter that has uploaded their character data and save it to the server disk';
$lang['admin']['design_update_guild'] = 'Auto-Save Images [Guild]|This will generate an image and save it to the server disk for <u>EVERY</u> character in the guild when a "Guild Update" is ran<br /><br /><span style="color:red;">PLEASE READ THE WARNING IN THE DOCUMENTATION</span><br />If you do get time-out errors, then you should disable this';





/**
 * Error strings
 */
$lang['error_module_not_exist'] ='SigGen module %1$s does not exist';
