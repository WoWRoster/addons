<?php
/** 
 * Dev.PKComp.net WoWRoster Addon
 * 
 * LICENSE: Licensed under the Creative Commons 
 *          "Attribution-NonCommercial-ShareAlike 2.5" license 
 * 
 * @copyright  2005-2007 Pretty Kitty Development 
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5" 
 * @link       http://dev.pkcomp.net 
 * @package    Accounts 
 * @subpackage Profile Admin
 */

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

if( isset($_POST['process']) && $_POST['process'] != '' )
{
	$roster_config_message = processData();
}

global $roster, $accounts, $addon;

$start = (isset($_GET['start']) ? $_GET['start'] : 0);

$listing = $next = $prev = '';

if($accounts->session->getVal('uid') > 0)
{
	$uid = $accounts->session->getVal('uid');
}
else
{
	$uid = '';
}

/**
 * Actual list
 */
$query = "SELECT "
	. " COUNT( `uid` )"
	. " FROM `" . $roster->db->table('user', $addon['basename']) . "`"
	. " WHERE `uid` = " . $uid . ";";

$num_members = $roster->db->query_first($query);

if( $num_members > 0 )
{
	// Draw the header line
	if ($start > 0)
	{
		$prev = '<a href="' . makelink('&amp;start=0') . '">|&lt;&lt;</a>&nbsp;&nbsp;<a href="' . makelink('&amp;start=' . ($start - 15)) . '">&lt;</a> ';
	}
	else
	{
		$prev = '';
	}

	if (($start+15) < $num_members)
	{
		$listing = ' <small>[' . $start . ' - ' . ($start+15) . '] of ' . $num_members . '</small>';
		$next = ' <a href="' . makelink('&amp;start=' . ($start+15)) . '">&gt;</a>&nbsp;&nbsp;<a href="' . makelink('&amp;start=' . ( floor( $num_members / 15) * 15 )) . '">&gt;&gt;|</a>';
	}
	else
	{
		$listing = ' <small>[' . $start . ' - ' . ($num_members) . '] of ' . $num_members . '</small>';
		$next = '';
	}

	$formbody = "<br /><div id=\"char_disp\">\n" . border('sblue','start',$prev . $roster->locale->act['acc_settings']['profile'] . $listing . $next) . "\n<table cellspacing=\"0\" cellpadding=\"0\" class=\"bodyline\">\n";

	$formbody .= '
	<tr>
		<th class="membersHeader">' . $roster->locale->act['name'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['fname'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['lname'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['email'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['city'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['country'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['homepage'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['notes'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['joined'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['lastlogin'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['chars'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['guilds'] . '</th>
		<th class="membersHeader">' . $roster->locale->act['acc_settings']['realms'] . "</th>\n\t</tr>\n";

	$i=0;

	$query = 'SELECT '.
	'`user`.`uid`, '.
	'`user`.`uname`, '.
	'`user`.`group_id`, '.
	'`ugroup`.`name`, '.
	'`profile`.`uid`, '.
	'`profile`.`show_fname`, '.
	'`profile`.`show_lname`, '.
	'`profile`.`show_email`, '.
	'`profile`.`show_city`, '.
	'`profile`.`show_country`, '.
	'`profile`.`show_homepage`, '.
	'`profile`.`show_notes`, '.
	'`profile`.`show_joined`, '.
	'`profile`.`show_lastlogin`, '.
	'`profile`.`show_chars`, '.
	'`profile`.`show_guilds`, '.
	'`profile`.`show_realms` '.

	'FROM `'.$roster->db->table('user', 'accounts').'` AS user '.
	'LEFT JOIN `'.$roster->db->table('account').'` AS ugroup ON `user`.`group_id` = `ugroup`.`account_id` '.
	'LEFT JOIN `'.$roster->db->table('profile', 'accounts').'` AS profile ON `user`.`uid` = `profile`.`uid` '.
	'WHERE `user`.`uid` = "' . $uid . '" '.
	'ORDER BY `uname` ASC'.
	' LIMIT ' . ($start > 0 ? $start : 0) . ', 15;';

	$result = $roster->db->query($query);

	while( $data = $roster->db->fetch($result) )
	{
		$formbody .= '	<tr>
		<td class="membersRow' . (($i%2)+1) . '"><a href="' . makelink('util-accounts-profile-' . $data['uname']) . '" target="_blank">' . $data['uname'] . '</a><br />
			' . $data['name'] . "</td>\n";

		$k=0;
		foreach( $data as $val_name => $value )
		{
			if( substr( $val_name, 0, 5 ) != 'show_' )
			{
				continue;
			}

			$formbody .= '		<td class="membersRow' . (($i%2)+1) . '">' . "\n";
			$formbody .= '			<input type="radio" id="chard_f' . $k . '_' . $data['uid'] . '" name="disp_' . $data['uid'] . ':' . $val_name . '" value="0" ' . ( $value == '0' ? 'checked="checked"' : '' ) . ' /><label for="chard_f' . $k . '_' . $data['uid'] . '">Off</label><br />' . "\n";
			$formbody .= '			<input type="radio" id="chard_n' . $k . '_' . $data['uid'] . '" name="disp_' . $data['uid'] . ':' . $val_name . '" value="1" ' . ( $value == '1' ? 'checked="checked"' : '' ) . ' /><label for="chard_n' . $k . '_' . $data['uid'] . '">On</label>' . "\n";
			$formbody .= "\t\t</td>\n";

			$k++;
		}
		$formbody .= "\t</tr>\n";
		$i++;
	}
	$formbody .= '<tr><td class="membersRow2" colspan="13"><center><div>'  . $roster->locale->act['acc_settings']['main'] . ': ' . selectMain($uid) . '&nbsp;&nbsp;&nbsp;'  . $roster->locale->act['acc_settings']['src_gen'] . ': ' . selectGen($uid) . '</div></center></td></tr>';
	$formbody .= "</table>\n" . border('syellow','end') . "\n</div>\n";
	$formbody .= $prev . $listing . $next;
}
else
{
	$formbody = 'No Data';
}

$roster->output['body_onload'] .= 'initARC(\'config\',\'radioOn\',\'radioOff\',\'checkboxOn\',\'checkboxOff\');';

$body = "
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"config\" onsubmit=\"return confirm('" . $roster->locale->act['confirm_config_submit'] . "');submitonce(this);\">
	$formbody
<br /><br />\n<input type=\"submit\" value=\"" . $roster->locale->act['config_submit_button'] . "\" />\n<input type=\"reset\" name=\"Reset\" value=\"" . $roster->locale->act['config_reset_button'] . "\" onclick=\"return confirm('" . $roster->locale->act['confirm_config_reset'] . "')\"/>\n<input type=\"hidden\" name=\"process\" value=\"process\" />\n
</form>";

$tab1 = explode('|',$roster->locale->act['acc_settings']['set']);
$tab2 = explode('|',$roster->locale->act['acc_settings']['prof']);

$menu = messagebox('
<ul class="tab_menu">
	<li><a href="' . makelink('util-accounts-settings') . '" style="cursor:help;"' . makeOverlib($tab1[1],$tab1[0],'',1,'',',WRAP') . '>' . $tab1[0] . '</a></li>
	<li class="selected"><a href="' . makelink('util-accounts-settings-profile') . '" style="cursor:help;"' . makeOverlib($tab2[1],$tab2[0],'',1,'',',WRAP') . '>' . $tab2[0] . '</a></li>
</ul>
',$roster->locale->act['acc_page']['settings'],'sgray','145px');

/**
 * Make select box of characters for main selection
 */
function selectMain($uid)
{
	global $roster, $addon, $accounts;

	$query = "SELECT `link`.`member_id`, `player`.`name` FROM `".$accounts->db['userlink']."` AS link LEFT JOIN `".$roster->db->table('players')."` AS player ON `link`.`member_id` = `player`.`member_id` WHERE `link`.`uid` = ".$uid.";";
	$result = $roster->db->query($query);

	if( !$result )
	{
		die_quietly($roster->db->error, 'Accounts Profile', __FILE__,__LINE__,$query);
	}

      $chars = '';
	while( $row = $roster->db->fetch($result) )
	{
		$chars[$row['member_id']] = $row['name'];
	}

	$input_field = '<select name="select_' . $uid . ':is_main">' . "\n";
	$select_one = 1;
	if(is_array($chars) && count($chars) > 0)
	{
	     foreach( $chars as $member => $name )
	     {
	     	     if( $member == $accounts->profile->getMain($uid) && $select_one )
		    {
			   $input_field .= '  <option value="' . $member . '" selected="selected">-[ ' . $name . ' ]-</option>' . "\n";
			   $select_one = 0;
		    }
		    else
		    {
			   $input_field .= '  <option value="' . $member . '">' . $name . '</option>' . "\n";
		    }
	     }
	}
      else
      {
            $input_field .= '  <option value="none" selected="selected">-[ None ]-</option>' . "\n";
            $select_one = 0;
      }    
	$input_field .= '</select>';

	     return $input_field;
}

/**
 * Make select box of characters for main selection
 */
function selectGen($uid)
{
	global $roster, $addon, $accounts;

	$query = "SELECT `avsig_src` FROM `".$accounts->db['profile']."` WHERE `uid` = ".$uid.";";
	$result = $roster->db->query($query);

	if( !$result )
	{
		die_quietly($roster->db->error, 'Accounts Profile', __FILE__,__LINE__,$query);
	}

      $src = '';
	while( $row = $roster->db->fetch($result) )
	{
		$src = $row['avsig_src'];
	}

	$input_field = '<select name="select_' . $uid .':avsig_src">' . "\n";

	$sigGen = active_addon('siggen');

	if( $sigGen == 1 && $src == 'SigGen')
	{
		$input_field .= '  <option value="SigGen" selected="selected">-[ SigGen ]-</option>' . "\n";
		$input_field .= '  <option value="default">Default</option>' . "\n";
	}
	elseif( $sigGen == 1 && $src == 'default' || $src == '')
	{
		$input_field .= '  <option value="default" selected="selected">-[ Default ]-</option>' . "\n";
		$input_field .= '  <option value="SigGen">SigGen</option>' . "\n";
	}
	else
	{
		$input_field .= '  <option value="default" selected="selected">-[ Default ]-</option>' . "\n";
	}

	$input_field .= '</select>';

	return $input_field;
}

/**
 * Process Data for entry to the database
 *
 * @return string Settings changed or not changed
 */
function processData( )
{
	global $roster, $addon, $accounts;

	$update_sql = array();
	$mid = 0;
	$src = '';

	// Update only the changed fields
	foreach( $_POST as $settingName => $settingValue )
	{
		if( substr($settingName,0,7) == 'select_' )
		{
			$settingName = str_replace('select_','',$settingName);

			list($uid,$settingName) = explode(':',$settingName);

			if( $settingName == 'is_main' && $settingValue != 'none' )
			{
				$get_val = "SELECT `$settingName`"
						 . " FROM `" . $roster->db->table('user_link', 'accounts') . "`"
						 . " WHERE `uid` = '$uid' AND `member_id` = '" . $roster->db->escape( $settingValue ) . "';";

				$result = $roster->db->query($get_val) or die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$get_val);

				$config = $roster->db->fetch($result);

				$mid = $roster->db->escape( $settingValue );
			}
			
			if( $settingName == 'avsig_src' )
			{
				$get_val = "SELECT `$settingName`"
						 . " FROM `" . $roster->db->table('profile', 'accounts') . "`"
						 . " WHERE `uid` = '$uid';";

				$result = $roster->db->query($get_val) or die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$get_val);

				$config = $roster->db->fetch($result);

				$src = $roster->db->escape( $settingValue );
			}

			if($src != '' && $mid > 0)
			{
				$accounts->profile->setAvSig('av', $uid, $mid, $src);
				$accounts->profile->setAvSig('sig', $uid, $mid, $src);
				$src = '';
				$mid = 0;
			}

			if( $config[$settingName] != $settingValue && $settingName == 'is_main' )
			{
			      $accounts->profile->setMain($uid, $mid);
			}
			elseif( $config[$settingName] != $settingValue && $settingName == 'avsig_src' )
			{
				$update_sql[] = "UPDATE `" . $roster->db->table('profile', 'accounts') . "`"
							  . " SET `$settingName` = '" . $roster->db->escape( $settingValue ) . "'"
							  . " WHERE `uid` = '$uid';";
			}
		}
		elseif( substr($settingName,0,5) == 'disp_' )
		{
			$settingName = str_replace('disp_','',$settingName);

			list($uid,$settingName) = explode(':',$settingName);

			$get_val = "SELECT `$settingName`"
					 . " FROM `" . $roster->db->table('profile', 'accounts') . "`"
					 . " WHERE `uid` = '$uid';";

			$result = $roster->db->query($get_val) or die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$get_val);

			$config = $roster->db->fetch($result);

			if( $config[$settingName] != $settingValue && $settingName != 'process' )
			{
				$update_sql[] = "UPDATE `" . $roster->db->table('profile', 'accounts') . "`"
							  . " SET `$settingName` = '" . $roster->db->escape( $settingValue ) . "'"
							  . " WHERE `uid` = '$uid';";
			}
		}
	}

	// Update DataBase
	if( !empty($update_sql) )
	{
		foreach( $update_sql as $sql )
		{
			$result = $roster->db->query($sql);
			if( !$result )
			{
				return '<span style="color:#0099FF;font-size:11px;">Error saving settings</span><br />MySQL Said:<br /><pre>' . $roster->db->error() . '</pre><br />';
			}
		}
		return '<span style="color:#0099FF;font-size:11px;">Settings have been changed</span>';
	}
	else
	{
		return '<span style="color:#0099FF;font-size:11px;">No changes have been made</span>';
	}
}
