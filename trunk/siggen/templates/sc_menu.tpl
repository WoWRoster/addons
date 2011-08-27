<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /templates/sc_menu.tpl
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
?>

<!-- Begin SigConfig Menu -->
<div class="config-menu">
  <ul id="siggen_menu" class="tab_menu">
    <li><a href="#" rel="tc">Config Select</a></li>
    <li><a href="#" rel="t0">Preview</a></li>
    <li><hr></li>
    <li class="selected"><a href="#" rel="t1">Main Settings</a></li>
    <li><a href="#" rel="t2">Backgrounds</a></li>
    <li><a href="#" rel="t4">eXp Bar</a></li>
    <li><a href="#" rel="t5">Level Bubble</a></li>
    <li><a href="#" rel="t6">Skills Display</a></li>
    <li><a href="#" rel="t7">Char/Class/PvP Logo</a></li>
    <li><a href="#" rel="t8">Text Config</a></li>
    <li><a href="#" rel="t9">Custom Images</a></li>
    <li><a href="#" rel="t10">Import/Export/Reset</a></li>
    <li><hr></li>
    <li><span class="ui-icon ui-icon-extlink" style="float:right;"></span><a href="http://www.wowroster.net/MediaWiki/SigGen" target="_blank">Documentation</a></li>
  </ul>
</div>
<!-- End SigConfig Menu -->