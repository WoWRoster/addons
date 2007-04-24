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
*
*
*
*
******************************/

@session_start();

/**
 * Creates an HTML link, Will wrap href with getlink() if DF is detected.
 * 
 * @param string $href - Leave blank for current page, else enter value of page
 * @param string $href_text - The text for href.
 * @param array $arg_array - Optional arg for URL args.
 * 	ex.  array('URL_Option' => 'Value', 'URL_Option2' => 'Value2')
 * 	Will return HTML link formated for Standard or WowRosterDF versions  
 *  Standard :<a href="$href?URL_Option=Value&URL_Option2=Value2">$href_text</a>
 *  WoWRosterDF: <a href=getlink($module_name$href?URL_Option=Value&URL_Option2=Value2)>$href_text</a>
 * @param string - $extra_params Any other params you wish to pass to the link (class info, events anchor id's etc)
 * @return string
 * 
 */

function make_link ($href='', $href_text, $arg_array=array(), $extra_params='')
{
	$in_DF = (defined('BASEDIR')) ? true : false;
	$href_out = '';
	$out = '';
	
	if(count($arg_array))
	{
		foreach($arg_array as $param => $val)
		{
			if($in_DF)
			{
				// name == cname
				if($param == 'name')
				{
					$param = 'cname';
				}
			}
			$href_out .= '&amp;';
			$href_out .= "$param=$val";
		}
	}
	// this will make the link depending taking in account for DF special needs, or other CMS's in the future.
	if($in_DF)
	{
		// We are in DF
		global $module_name;
		
		if (empty($href))
		{
			$href = '&amp;file=addon&amp;roster_addon_name=madeby';
		}
		elseif ($href{0} == '#')
		{
			$href = str_replace(' ', '_', $href);
			$href_text = str_replace(' ','&nbsp;', $href_text);
			$extra_params = str_replace(' ', '_', $extra_params);
			$out = '<a id="'.$extra_params.'" href="'.getlink($module_name.'&amp;file=addon&amp;roster_addon_name=madeby'.$href_out.$href).'">'.$href_text.'</a>';
			return $out;
		}
		else
		{
			$href = preg_replace('/(\w+)\.php/i', '&amp;file=$1', $href);
		}
		$out = '<a '.$extra_params.' href="'.getlink($module_name.$href.$href_out).'">'.$href_text.'</a>';
	}
	else
	{
		if (empty($href))
		{
			$href = 'addon.php?roster_addon_name=madeby';
		}
		elseif($href{0} == '#')
		{
			$href = str_replace(' ', '_', $href);
			$href_text = str_replace(' ','&nbsp;', $href_text);
			$extra_params = str_replace(' ', '_', $extra_params);
			$out = '<a id="'.$extra_params.'" href="'.$href.'">'.$href_text.'</a>';
			return $out;
		}
		elseif($href_out{0} == '&')
		{
			$href_out = ereg_replace('^&amp;', '?', $href_out);
		}
		$out = '<a id="'.$extra_params.'" href="'.$href.$href_out.'">'.$href_text.'</a>';
	}
	return $out;
}

/**
 * Sets up a form; handles DF and Regular WoW Roster
 * Very basic implementation currently -- can expand it further if needed.
 * 
 * @param string $action - action to do (script name)
 *   detects WoWRosterDF and wraps with getlink()
 * @param string $name - name of the form
 * @param string $method - method of the form POST/GET
 * @return string - returns completed form tag
 * 
 */
function make_form ($action='', $name='formName', $method='POST')
{
	if(defined('BASEDIR'))
	{
		//in DF
		$action = preg_replace('/(\w+)\.php\?/i', 'file=$1&amp;', $action); 
		$out = '<form action="'.getlink($module_name.'&amp;'.$action).'" method="'.$method.'" name="'.$name.'">';
	}
	else
	{
		$out = '<form action="'.$action.'" method="'.$method.'" name="'.$name.'">';
	}
	return $out;
}
