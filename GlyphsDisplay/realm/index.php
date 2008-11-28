<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @link       http://www.wowroster.net
 * @package    GlyphsDisplay
 * @subpackage Installer
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['dir'] . 'inc/template.inc.php');

function glyphlookup($locales)
{
	global $roster;
	
	$query = "SELECT DISTINCT `recipe_name`, `reagents`, `recipe_type`, `recipe_tooltip`, `recipe_texture`, `item_color`
			FROM `".$roster->db->table('recipes')."`
			WHERE (`skill_name` = '".$roster->locale->act['sill']."') ";
	for ($i = 1; $i<count($locales); $i++)
	{
	if ($locales[$i] != '')
		$query .= " OR (`skill_name` = '".$roster->locale->act['sill']."') ";
	}
	$query .=       "ORDER BY recipe_type, `reagents`,`recipe_name` ";
	
	$result = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', basename(__FILE__),__LINE__,$query);
	
	$count = 0;
	$temp = array();
	while($row = $roster->db->fetch($result))
	{
		$temp[$count]=$row;
		$count++;
	}
	
	return $temp;
}


$header_title = $roster->locale->act['glyph_title_addon'];

//check for available clientLocales
$clientLocales = array();
$clquery = "SELECT DISTINCT p.clientLocale FROM `".$roster->db->table('players')."` p;";
$clresult = $roster->db->query($clquery) or die_quietly($roster->db->error(),'Database Error', basename(__FILE__),__LINE__,$clquery);
$i = 0;
while($clrow = $roster->db->fetch($clresult))
{
  $clientLocales[$i] = $clrow['clientLocale'];
  $i++;
}
if ($i == 0) $clientLocales[$i] = $roster->locale->act['roster_lang'];

$tmpglyphes=glyphlookup($clientLocales);
$glyphes = order($tmpglyphes);
Glyphs_display();
?>
