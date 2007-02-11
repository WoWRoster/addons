<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/
 
 // Get item details from the cache. If not cached, or dramaticly altered, update the cache appropiately.
function getitemcache($itemid, $itemname, $itemdkpval = '', $itemquality = 0, $itemcolor = 0, $itemtexture = 0, $update_outdated = 0)
{
	global $roster_conf, $addon_conf, $wowdb, $wordings;
	
	$updatecache = FALSE;
	$insertcache = FALSE;

	$date_now = date("Y-m-d H:i");
	$udate_now = date("U");	
	
	// Test if our itemcache table exists
	$query = "SHOW TABLES LIKE '".ROSTER_ADDON_DKP_WIZARD_CACHE."'";
	$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
	if ( $row = $wowdb->fetch_assoc($result) )
	{
		$wowdb->free_result($result);

		// Get config values and insert them into the array
		$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_CACHE."` WHERE `item_id` = '".$itemid."' LIMIT 1";
		$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'dkp_wizard',__FILE__,__LINE__, $query );
		if ($row = $wowdb->fetch_assoc($result) )
		{
			$cache_item = $row;
			$udate_item = strtotime($cache_item['storedate']);
			$oldtooltip = $row['item_tooltip'];
			
			if ((($udate_now - $udate_item) > 604800 || $udate_item > $udate_now) && $update_outdated)
			{
				// The Store Date of the item in the cache is too old (7 days) or in the future!!!
				// Lets re-get the details and update the cache
				$updatecache = TRUE;
			}
			if ($cache_item['item_quality'] != $itemquality && $itemquality)
			{
				// The Item Quality does not match with the cache, lets update the cache
				$updatecache = TRUE;
			}
			if ($cache_item['item_color'] != $itemcolor && $itemcolor)
			{
				// The Item Color does not match with the cache, lets update the cache
				$updatecache = TRUE;
			}
			if ($cache_item['item_texture'] != $itemtexture && $itemtexture)
			{
				// The Item Texture does not match with the cache, lets update the cache
				$updatecache = TRUE;
			}
			if (isset($itemdkpval) && $itemdkpval != '' && $cache_item['dkp_value'] != $itemdkpval)
			{
				// The Item Texture does not match with the cache, lets update the cache
				$updatecache = TRUE;
			}
		}
		else
		{
			// Item does not exist in cache yet, lets flag the item for caching.
			$insertcache = TRUE;
		}
		$wowdb->free_result($result);
		
		if ($updatecache || $insertcache)
		{
			$itemid_split = explode(":", $itemid);

			$url = $addon_conf['allakhazam'].$itemid_split[0].'&amp;locale='.$roster_conf['roster_lang'];
			print($url.'<br>');
			$itemtooltiptmp = rosterdkp_gettooltip($url);
			
			if (is_array($itemtooltiptmp['set']))
			{
				$itemset['id'] = $itemtooltiptmp['set']['id'];
				$itemset['name'] = $itemtooltiptmp['set']['name'];
			}
			else
			{
				$itemset['id'] = 0;
				$itemset['name'] = '';
			}
			
			$itemtooltiptmp = $itemtooltiptmp['tooltip'];
			
			$item['item_id'] = $itemid;

			// Add the ItemStats based on the SuffixID (if there is any)
			$tooltipaddon = '';
			
			if ($itemid_split[2] > 0)
			{
				// Get the Statistics for this Suffix
				$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_CACHE_STATS."` WHERE `suffix_id` = '".$itemid_split[2]."' LIMIT 1";
				$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $query );
				if ($row = $wowdb->fetch_assoc($result) )
				{
					foreach ($row as $wording => $value)
					{
						if ($value && $wording != 'suffix_id' && $wording != 'text_id')
						{
							if ($wording == 'block' || $wording == 'dodge')
							{
								$tooltipaddon .= "\n +".$value.'% '.$wordings[$roster_conf['roster_lang']][$wording];
							}
							elseif ($wording == 'critical_hit')
							{
								$tooltipaddon .= "\n ".$wordings[$roster_conf['roster_lang']][$wording].' +'.$value.'%';
							}
							elseif ($wording == 'on_get_hit_shadow_bolt')
							{
								$tooltipaddon .= "\n ".$wordings[$roster_conf['roster_lang']][$wording].' ('.$value.' '.$wordings[$roster_conf['roster_lang']]['damage'].')';
							}
							else
							{
								$tooltipaddon .= "\n +".$value.' '.$wordings[$roster_conf['roster_lang']][$wording];
							}
						}
						elseif ($wording == 'text_id')
						{
							$tooltipaddon_desc = $wordings[$roster_conf['roster_lang']]['statlocal'][$row['text_id']];
						}
					}
				}
			}
			
			if ($itemtooltiptmp && isset($oldtooltip))
			{
				$itemtooltiptmp = $oldtooltip;
			}
			
			$itemtooltiptmp = explode("\n", $itemtooltiptmp);
			if ($tooltipaddon_desc != '')
			{
				$itemtooltiptmp[0] = str_replace("...", $tooltipaddon_desc, $itemtooltiptmp[0]);
			}
			$tooltip = implode("\n", $itemtooltiptmp).$tooltipaddon;
			
			$item['item_tooltip'] = $tooltip;
			$item['item_tooltip_escape'] = $wowdb->escape($item['item_tooltip']);
			
			if (!$item['item_tooltip'] || eregi("tem not f", $item['item_tooltip']))
			{
				$item['item_tooltip'] = $itemname.$tooltipaddon;
				$item['item_tooltip_escape'] = $wowdb->escape($item['item_tooltip']);
			}
			if ($itemname && $itemname != '')
			{
				$item['item_name'] = $wowdb->escape($itemname);
			}
			else
			{
				$item['item_name'] = $cache_item['item_name'];
			}
			if ($itemquality)
			{
				$item['item_quality'] = $itemquality;
			}
			else
			{
				$item['item_quality'] = $cache_item['item_quality'];
			}
			if ($itemcolor)
			{
				$item['item_color'] = $wowdb->escape($itemcolor);
			}
			else
			{
				$item['item_color'] = $cache_item['item_color'];
			}
			if ($itemtexture)
			{
				$item['item_texture'] = $wowdb->escape($itemtexture);
			}
			else
			{
				$item['item_texture'] = $cache_item['item_texture'];
			}
			if (isset($itemdkpval) && $itemdkpval != '')
			{
				$item['dkp_value'] = $itemdkpval;
			}
			elseif ($cache_item['dkp_value'])
			{
				$item['dkp_value'] = $cache_item['dkp_value'];
			}
			else
			{
				$item['dkp_value'] = 0.00;
			}
			if ($itemset['id'])
			{
				$item['item_setid'] = $itemset['id'];
				$item['item_setname'] = $wowdb->escape($itemset['name']);
			}
			elseif ($cache_item['item_setid'])
			{
				$item['item_setid'] = $cache_item['item_setid'];
				$item['item_setname'] = $cache_item['item_setname'];
			}
			else
			{
				$item['item_setid'] = 0;
				$item['item_setname'] = '';
			}				
		}
		else
		{
			$item = $cache_item;
		}
		
		if ($insertcache)
		{
			$insertsql = "INSERT INTO `".ROSTER_ADDON_DKP_WIZARD_CACHE."` ( `cache_id` , `storedate` , `item_name` , `item_id` , `item_quality` , `item_tooltip` , `item_color` , `item_texture` , `item_setid` , `item_setname` , `dkp_value` ) VALUES ('', '".$date_now."', '".$item['item_name']."', '".$item['item_id']."', '".$item['item_quality']."', '".$item['item_tooltip_escape']."', '".$item['item_color']."', '".$item['item_texture']."', '".$item['item_setid']."', '".$item['item_setname']."', '".$item['dkp_value']."')";
			$result = $wowdb->query( $insertsql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $insertsql );
			
			// Re-Get the item from the cache now
			$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_CACHE."` WHERE `item_id` = '".$itemid."' LIMIT 1";
			$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $query );
			if ($row = $wowdb->fetch_assoc($result) )
			{
				$item = $row;
			}
		}
		elseif($updatecache)
		{
			$updatesql = "UPDATE `".ROSTER_ADDON_DKP_WIZARD_CACHE."` SET `storedate` = '".$date_now."', `item_name` = '".$item['item_name']."', `item_id` = '".$item['item_id']."', `item_quality` = '".$item['item_quality']."', `item_tooltip` = '".$item['item_tooltip_escape']."', `item_color` = '".$item['item_color']."', `item_texture` = '".$item['item_texture']."', `item_setid` = '".$item['item_setid']."', `item_setname` = '".$item['item_setname']."', `dkp_value` = '".$item['dkp_value']."' WHERE `cache_id` = ".$cache_item['cache_id']." LIMIT 1";
			$result = $wowdb->query( $updatesql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $updatesql );
			
			// Re-Get the item from the cache now
			$query = "SELECT * FROM `".ROSTER_ADDON_DKP_WIZARD_CACHE."` WHERE `item_id` = '".$itemid."' LIMIT 1";
			$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $query );
			if ($row = $wowdb->fetch_assoc($result) )
			{
				$item = $row;
			}
		}
		
		return $item;
	}
}

// Function to grab the tooltip data (plain text) from allakhazam.
function rosterdkp_gettooltip($url)
{
	$returnvalue = 0;
	// Try cURL first. If that isn't available, check if we're allowed to
	// use fopen on URLs.  If that doesn't work, return 0
	
	if (function_exists('curl_init'))
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$returnvalue = curl_exec($ch);
		curl_close($ch);
	}
	else if (ini_get('allow_url_fopen') == 1)
	{
		$returnvalue = file_get_contents($url);
	}
	else
	{
		
		print("nothing works :( \n");
		$returnvalue = 0;
	}
        
	if ($returnvalue)
	{
		$returnvalue = striptooltip($returnvalue);
	}
	else
	{
		$returnvalue = 0;
	}
	
		
	return $returnvalue;
}

// Function to strip the HTML data from Allakhazam's Item Details
function striptooltip($tooltip)
{
	global $roster_conf, $wordings;
	
	$search = array(
		"/\r/",                                  // Non-legal carriage return
		"/[\n\t]+/",                             // Newlines and tabs 
		'/<span class="goldtext"[^>]*>"(.+?)"<\/span>/', // Non-Set stuff
		'/<span class="goldtext"[^>]*>(.+?)<\/span>/', // Set stuff
		'/<span class="wowrttxt"[^>]*>(.+?)<\/span>/', // Spot between Socket and Type (Replaced by Tab)
		'/<script[^>]*>.*?<\/script>/i',         // <script>s -- which strip_tags supposedly has problems with
		'/<h[123][^>]*>(.+?)<\/h[123]>/ie',      // H1 - H3
		'/<h[456][^>]*>(.+?)<\/h[456]>/ie',      // H4 - H6
		'/<p[^>]*>/i',                           // <P>
		'/<br[^>]*>/i',                          // <br>
		'/<b[^>]*>(.+?)<\/b>/ie',                // <b>
		'/<i[^>]*>(.+?)<\/i>/i',                 // <i>
		'/(<ul[^>]*>|<\/ul>)/i',                 // <ul> and </ul>
		'/(<ol[^>]*>|<\/ol>)/i',                 // <ol> and </ol>
		'/<li[^>]*>/i',                          // <li>
		//'/<a href="([^"]+)"[^>]*>(.+?)<\/a>/ie', // <a href="">
		'/<hr[^>]*>/i',                          // <hr>
		'/(<table[^>]*>|<\/table>)/i',           // <table> and </table>
		'/(<tr[^>]*>|<\/tr>)/i',                 // <tr> and </tr>
		'/<td[^>]*>(.+?)<\/td>/i',               // <td> and </td>
		'/<th[^>]*>(.+?)<\/th>/i',               // <th> and </th>
		'/&nbsp;/i',
		'/&quot;/i',
		'/&gt;/i',
		'/&lt;/i',
		'/&amp;/i',
		'/&copy;/i',
		'/&trade;/i',
		'/&#8220;/',
		'/&#8221;/',
		'/&#8211;/',
		'/&#8217;/',
		'/&#38;/',
		'/&#169;/',
		'/&#8482;/',
		'/&#151;/',
		'/&#147;/',
		'/&#148;/',
		'/&#149;/',
		'/&reg;/i',
		'/&bull;/i',
		'/&[&;]+;/i',
		"/Source.*?wow.allakhazam.com/",
		"/\n /"
	);

	$replace = array(
		'',                                     // Non-legal carriage return
		' ',                                    // Newlines and tabs
		"\"\\1\"",
		$wordings[$roster_conf['roster_lang']]['tooltip_set'].": \\1",	
		"\t\\1",				// Spot between Socket and Type (Replaced by Tab)
		'',                                     // <script>s -- which strip_tags supposedly has problems with
		"strtoupper(\"\n\n\\1\n\n\")",          // H1 - H3
		"ucwords(\"\n\n\\1\n\n\")",             // H4 - H6
		"\n\n\t",                               // <P>
		"\n",                                   // <br>
		'strtoupper("\\1")',                    // <b>
		'_\\1_',                                // <i>
		"\n\n",                                 // <ul> and </ul>
		"\n\n",                                 // <ol> and </ol>
		"\t*",                                  // <li>
		//'', 					// <a href="">
		"\n-------------------------\n",        // <hr>
		"\n\n",                                 // <table> and </table>
		"\n",                                   // <tr> and </tr>
		"\t\t\\1\n",                            // <td> and </td>
		"strtoupper(\"\t\t\\1\n\")",            // <th> and </th>
		' ',
		'"',
		'>',
		'<',
		'&',
		'(c)',
		'(tm)',
		'"',
		'"',
		'-',
		"'",
		'&',
		'(c)',
		'(tm)',
		'--',
		'"',
		'"',
		'*',
		'(R)',
		'*',
		'',
		'',
		"\n"
	);
	
	// Get the body of the html
	preg_match("/<body[^>]*>(.+)<\/body>/si",$tooltip, $text);
 	$text = trim(stripslashes($text[1]));

	// Run our defined search-and-replace
	$text = preg_replace($search, $replace, $text);

	// Strip any other HTML tags
	$text = strip_tags($text);

	// Bring down number of empty lines to 2 max
	$text = preg_replace("/\n\s+\n/", "\n", $text);
	$text = preg_replace("/[\n]{3,}/", "\n\n", $text);
	$text = substr($text, 0, -1);
	if ($text{0} = ' ')
	{
		$text = substr($text, 1);
	}
		// Check if there is Set information
	if (preg_match("~setid=(.+)\"><span\sclass=\"goldtext\">(.+)</span>~",$tooltip, $set))
	{
		$return['set']['id'] = $set[1];
		$return['set']['name'] = $set[2];
	}
	else
	{
		$return['set']['id'] = 0;
		$return['set']['name'] = '';
	}
 		
	$return['tooltip'] = mb_convert_encoding($text, "UTF-8", "auto");

	return $return;
}

// Function to serialize array data to use in a variable.
// The output is not fully urlencoded yet!!
function implode_assoc_r2($array = null, $inner_glue = INNER_GLUE, $outer_glue = OUTER_GLUE, $recusion_level = 0)
{
	$output = array();

	foreach ($array as $key => $item)
	{
		if (is_array ($item))
		{
			// This is value is an array, go and do it again!
			$level = $recusion_level + 1;
			$output[] = $key.$inner_glue.$recusion_level.$inner_glue.implode_assoc_r2($item, $inner_glue, $outer_glue, $level);
		}
		else
		{
			$output[] = $key . $inner_glue . $recusion_level . $inner_glue . $item;
		}
	}
	
	return implode($outer_glue . $recusion_level . $outer_glue, $output);
}

// Function to un-serialize an array serialized with implode_assoc_r2.
// The input should be exactly the same as the output was from implode_assoc_r2!!
function explode_assoc_r2($string = null, $inner_glue = INNER_GLUE, $outer_glue = OUTER_GLUE, $recusion_level = 0)
{
	$output = array();
	$array = explode($outer_glue.$recusion_level.$outer_glue, $string);
	
	foreach ($array as $value)
	{
		$row=explode($inner_glue.$recusion_level.$inner_glue,$value);
		$output[$row[0]]=$row[1];
		$level = $recusion_level + 1;
		if (strpos($output[$row[0]],$inner_glue.$level.$inner_glue))
		{
			$output[$row[0]] = explode_assoc_r2($output[$row[0]], $inner_glue, $outer_glue, $level);
		}
	}
	
	return $output;
}

// Function to return the Sort Link for a header of a table.
// This allows easy processing of 4 remembered sorting levels.
function sort_link($sort_array, $current_field_name)
{
	if ($sort_array[1]['field'] == $current_field_name)
	{
		if ($sort_array[1]['mode'] == SORT_ASC)
		{
			$returnvalue = 'sort[field][1]='.$sort_array[1]['field'].'&amp;sort[mode][1]='.SORT_DESC.'&amp;sort[field][2]='.$sort_array[2]['field'].'&amp;sort[mode][2]='.$sort_array[2]['mode'].'&amp;sort[field][3]='.$sort_array[3]['field'].'&amp;sort[mode][3]='.$sort_array[3]['mode'].'&amp;sort[field][4]='.$sort_array[4]['field'].'&amp;sort[mode][4]='.$sort_array[4]['mode'];
		}
		else
		{
			$returnvalue = 'sort[field][1]='.$sort_array[1]['field'].'&amp;sort[mode][1]='.SORT_ASC.'&amp;sort[field][2]='.$sort_array[2]['field'].'&amp;sort[mode][2]='.$sort_array[2]['mode'].'&amp;sort[field][3]='.$sort_array[3]['field'].'&amp;sort[mode][3]='.$sort_array[3]['mode'].'&amp;sort[field][4]='.$sort_array[4]['field'].'&amp;sort[mode][4]='.$sort_array[4]['mode'];
		}
	}
	else
	{
		$returnvalue = 'sort[field][1]='.$current_field_name.'&amp;sort[mode][1]='.SORT_ASC.'&amp;sort[field][2]='.$sort_array[1]['field'].'&amp;sort[mode][2]='.$sort_array[1]['mode'].'&amp;sort[field][3]='.$sort_array[2]['field'].'&amp;sort[mode][3]='.$sort_array[2]['mode'].'&amp;sort[field][4]='.$sort_array[3]['field'].'&amp;sort[mode][4]='.$sort_array[3]['mode'];
	}
	
	// Return the Addons to the link for sorting
	return $returnvalue;
}

// Function to get the zone_icon
function get_zoneicon($zone_name)
{
	global $roster_conf, $wordings;
	
	$zone_key = 0;
	
	foreach ($roster_conf['multilanguages'] as $lang)
	{
		$zone_key = array_search($zone_name, $wordings[$lang]);
	}
	
	if ($zone_key)
	{
		return $zone_key.'.gif';
	}
	else
	{
		return 'zone_random.gif';
	}
}
	


?>
