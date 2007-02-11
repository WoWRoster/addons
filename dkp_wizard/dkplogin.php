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

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// ----[ Build the password box ]---------------------------
if (isset($action))
{
	$hidden['action'] = $action;
}
if (isset($display))
{
	$hidden['display'] = $display;
}
if (isset($admindisplay))
{
	$hidden['admindisplay'] = $admindisplay;
}

// ----[ Check log-in ]-------------------------------------
if( (isset( $_GET['logout'] ) && $_GET['logout'] == 'logout') || (isset( $_POST['logout'] ) && $_POST['logout'] == 'logout'))
{
	if( isset($_COOKIE['roster_dkp_pass']) )
		setcookie( 'roster_dkp_pass','',time()-86400 );
	$password_message = '<span style="font-size:11px;color:red;">Logged Out</span><br />';
	$allow_dkp_login = 0;
}
else
{
	if( !isset($_COOKIE['roster_dkp_pass']) )
	{
		if( isset($_POST['pass_word']) )
		{
			if( md5($_POST['pass_word']) == $addon_conf['roster_dkp']['roster_dkp_password'] )
			{
				setcookie( 'roster_dkp_pass', $addon_conf['roster_dkp']['roster_dkp_password']);
				$password_message = '<span style="font-size:10px;color:red;">Logged in:</span><span style="font-size:10px;color:#FFFFFF"> [<a href="'.$script_filename.'&amp;logout=logout">Logout</a>]</span><br />';
				$allow_dkp_login = 1;
			}
			else
			{
				$password_message = '<span style="font-size:11px;color:red;">Wrong password</span><br />';
			}
		}
	}
	else
	{
		$BigCookie = $_COOKIE['roster_dkp_pass'];

		if( $BigCookie == $addon_conf['roster_dkp']['roster_dkp_password'] )
		{
			$password_message = '<span style="font-size:10px;color:red;">Logged in:</span><span style="font-size:10px;color:#FFFFFF"> [<a href="'.$script_filename.'&amp;logout=logout">Logout</a>]</span><br />';
			$allow_dkp_login = 1;
		}
		else
		{
			setcookie( 'roster_dkp_pass','',time()-86400 );
		}
	}
}

// Disallow viewing of the page
if( !isset($allow_dkp_login) || !$allow_dkp_login )
{

}

if (isset($allow_dkp_login) && $allow_dkp_login)
{
	// Show the logout box and continue
	$passbox = '<!-- Begin Logout Box -->'."\n";
	$passbox .= '<form action="'.$script_filename.'" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">'."\n";
	$passbox .= '<span class="red">Logged in:</span>'."\n";
	$passbox .= '<span style="font-size:10px;color:#FFFFFF">'."\n".'<input type="submit" value="LOGOUT" />'."\n".'</span>'."\n";
	$passbox .= '<input name="logout" type="hidden" value="logout" />'."\n";
	if (is_array($hidden))
	{
		foreach($hidden as $key => $value)
		{
			$passbox .= '<input name="'.$key.'" type="hidden" value="'.$value.'" />'."\n";
		}
	}
	$passbox .= '</form><br>'."\n";
	$passbox .= '<!-- End Logout Box -->'."\n";
	
	print($passbox);
}
else
{
	$passbox = '<!-- Begin Password Input Box -->'."\n";
	$passbox .= '<form action="'.$script_filename.'" method="post" enctype="multipart/form-data" onsubmit="submitonce(this)">'."\n";
	$passbox .= border('sred','start','Authorization Required')."\n";
	$passbox .= '<table class="bodyline" cellspacing="0" cellpadding="0">'."\n";
	$passbox .= "<tr>\n<td class=\"membersRowRight1\">Password:<br />\n<input name=\"pass_word\" type=\"password\" size=\"30\" maxlength=\"30\" />\n</td>\n</tr>\n";
	$passbox .= "<tr>\n<td class=\"membersRowRight2\" valign=\"bottom\">\n<div align=\"right\">\n<input type=\"submit\" value=\"Go\" />\n</div>\n</td>\n</tr>\n";
  	$passbox .= "</table>\n";
	$passbox .= border('sred','end');
	if (is_array($hidden))
	{
		foreach($hidden as $key => $value)
		{
			$passbox .= '<input name="'.$key.'" type="hidden" value="'.$value.'" />'."\n";
		}
	}
	$passbox .= '</form>'."\n";
	$passbox .= '<!-- End Password Input Box -->'."\n";
	
	// Show the login box and exit
	include_once (ROSTER_BASE.'roster_header.tpl');
	include_once (ROSTER_BASE.'lib'.DIR_SEP.'menu.php');
	print('<span class="title_text">'.$wordings[$roster_conf['roster_lang']]['rosterdkp_login_page'].'</span><br />'.$password_message.$passbox);
	include_once (ROSTER_BASE.'roster_footer.tpl');
	exit();
}

// ----[ End Check log-in ]---------------------------------
?>
