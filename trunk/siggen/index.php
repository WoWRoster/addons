<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /index.php
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

// Require sig.php (must be in the same directory)
require (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'siggen.php');
