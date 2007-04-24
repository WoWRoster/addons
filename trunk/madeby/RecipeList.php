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

// if BASEDIR is defined then we're in DF

if ( !defined('ROSTER_INSTALLED') )
{
	exit('Detected invalid access to this file!');
}

include_once($addonDir.'lib/recipe.lib.php');

$server_name_escape = $wowdb->escape($roster_conf['server_name']);

// for multilanguage support -- allow these languages only
$user_lang = array();

if ($addon_conf['MadeBy']['allow_enUS'])
array_push($user_lang, 'enUS');
if ($addon_conf['MadeBy']['allow_deDE'])
array_push($user_lang, 'deDE');
if ($addon_conf['MadeBy']['allow_frFR'])
array_push($user_lang, 'frFR');
if ($addon_conf['MadeBy']['allow_esES'])
array_push($user_lang, 'esES');
if (count($user_lang) == 0)
echo 'MadeBy Configuration Error:  Please select at least one language to use!';

if ($addon_conf['MadeBy']['display_language_bar'])
{
	$language_bar = '';
	foreach($user_lang as $_lang)
	{
		//$language_bar .= '[&nbsp;<a href="addon.php?roster_addon_name=madeby&lang='.$_lang.'">'.$_lang.'</a>&nbsp;]&nbsp;';
		$language_bar .= '[&nbsp;'.make_link('', $_lang, array('lang' => $_lang)).'&nbsp;]&nbsp;';
	}
	$content .= $language_bar;

	// set language
	if (isset($_GET['lang']) && (in_array($_GET['lang'], $user_lang)))
	{
		$lang = $_GET['lang'];
		$_SESSION['madeby_language'] = $lang;
	}
	elseif(in_array($_SESSION['madeby_language'], $user_lang))
	{
		$lang = $_SESSION['madeby_language'];
	}
	else
	{
		$lang = $roster_conf['roster_lang'];
	}
}
else
{
	$lang = $roster_conf['roster_lang'];
}

$qry_prof = "SELECT config_name FROM ".MADEBY_CONFIG_TABLE."
				WHERE config_type = 'recipe' 
				AND config_value = '1' 
				ORDER BY config_name";

$result_prof = $wowdb->query($qry_prof) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$qry_prof);
if ($roster_conf['sqldebug'])
{
	$content .= ("<!--$query -->\n");
}

$valid_skills = array();
while ($row = $wowdb->fetch_array($result_prof))
{
	$valid_skills[] = $row['config_name'];
}

//build an array of all known skills for all languages if allowed to show
$show_skills = array();
foreach ( $user_lang as $_lang )
{
	foreach($valid_skills as $skill)
	{
		$show_skills[$_lang][$skill] = $wordings[$_lang][$skill];
	}
}

$profBar = '';
//$choiceForm = '<form action="'.getlink($module_name.'&amp;file=addon&amp;roster_addon_name=madeby').'" method="POST" name="myform">
//$choiceForm = '<form action="addon.php" method="GET" name="myform">
//	<input type="hidden" name="roster_addon_name" value="madeby">
//$choiceForm = '<form action="addon.php?roster_addon_name=madeby" method="POST" name="myform">';

$choiceForm = make_form('addon.php?roster_addon_name=madeby', 'myform', 'POST');
$choiceForm .='	<table border="0">
		<tr>
		<th class="copy">'.$wordings[$lang]['professionfilter'].'</th>
		<td class="copy"><select name="proffilter">';

//while($row_prof = $wowdb->fetch_array($result_prof))
foreach($show_skills as $key => $val)
{
	//	$profBar .= '<a href="addon.php?roster_addon_name=madeby&proffilter='.$row_prof['config_name'].'">'.$row_prof['config_name'].'</a> | '."\n";
	//	if ($_REQUEST["proffilter"]==$row_prof["config_name"])
	//	$choiceForm .= '<option VALUE="'.$row_prof["config_name"].'" selected>'.$row_prof["config_name"];
	//	else
	//	$choiceForm .= '<option VALUE="'.$row_prof["config_name"].'">'.$row_prof["config_name"];
	$profBar .= $key.'<br /> |&nbsp;';
	$choiceForm .= '<option> -- '.$key.' --';
	foreach($show_skills[$key] as $skill)
	{
		//		$profBar .= '<a href="addon.php?roster_addon_name=madeby&proffilter='.$skill.'">'.$skill.'</a> | '."\n";
		$profBar .= make_link('', $skill, array('proffilter' => $skill)).' | ';
		if ($_REQUEST["proffilter"]==$skill)
		$choiceForm .= '<option VALUE="'.$skill.'" selected>'.$skill;
		else
		$choiceForm .= '<option VALUE="'.$skill.'">'.$skill;
	}
	$profBar .= '<br />';
}
//$wowdb->free_result($result_prof);

$choiceForm .= '</select></td>
<th>'.$wordings[$lang]['search'].'</th><td><input type="text" name="filterbox"';
if (isset($_REQUEST['filterbox']))
{
	$choiceForm .= ' value="'.$_REQUEST['filterbox'].'"';
}

$choiceForm .= '></td>
		<td><input type="submit" value="'.$wordings[$lang]['applybutton'].'" /></td>
	</tr>
</table>
</form><br />';

$content .= $choiceForm;
if ($addon_conf['MadeBy']['display_prof_bar']) $content .= $profBar.'<hr width="80%">';

global $sortby_d;

$sort_d = '0';

if (isset($_REQUEST["proffilter"]))
{
	if ( isset($_GET['SortDescending']) AND $_GET['SortDescending'] == '1')
	{
		$sort_d = '0';
		$sortby_d=1;
	}
	else
	{
		$sort_d = '1';
		$sortby_d = 0;
	}

	$recipes = recipe_get_all(
	$_REQUEST["proffilter"],
	($_REQUEST["filterbox"] ? $_REQUEST["filterbox"] : ''),
	($_REQUEST["sort"] ? $_REQUEST["sort"] : $addon_conf['MadeBy']['default_sort_by'])
	);


	$types = array();
	foreach($recipes as $recipe)
	{
		$types[] = $recipe->data['recipe_type'];
	}

	$recipe_types = array_unique($types);

	if( isset( $recipes[0] ) )
	{
		$rc = 0;

		$recipe_type = '';
		$first_table = true;
		// add wrapping of table and center?
		$content .=  '<table align="center" border="0"><tr><td align="center" valign="middle"><a id="top_menu"></a> - ';
		//		$qry_recipe_type = 'select distinct r.recipe_type from '.ROSTER_RECIPESTABLE.' r where r.skill_name = "'. $_REQUEST["proffilter"].'" order by r.recipe_type asc';
		//		$content .= ("<!--$qry_recipe_type -->\n");
		//		$result_recipe_type = $wowdb->query($qry_recipe_type) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$qry_recipe_type);
		//		if ($roster_conf['sqldebug'])
		//		{
		//			$content .= ("<!--$qry_recipe_type -->\n");
		//		}
		//		while($row_recipe_type = $wowdb->fetch_array($result_recipe_type))
		foreach($recipe_types as $type)
		{
			$content .=  make_link("#$type", $type, array('proffilter' => $_REQUEST["proffilter"]) ).' - ';
		}
		$content .=  "</td></tr></table>\n<br /><br />\n";

		foreach ($recipes as $recipe)
		{
			if ($recipe_type != $recipe->data['recipe_type'])
			{
				$recipe_type = $recipe->data['recipe_type'];

				if(!$first_table)
				{
					$content .=  '</table>'.border('syellow','end').'<br />';
				}
				$first_table = false;
				$content .= border('syellow','start', make_link('#top_menu', $recipe_type, array('proffilter'=>$_REQUEST['proffilter']), $recipe_type));
				$content .= '<table class="bodyline" cellspacing="0">';

				//$content .= '<tr>'."\n";
				//$content .= '<td colspan="14" class="membersHeaderRight"><div align="center"></div></td>'."\n";
				//$content .= '</tr>';
				$content .= '<tr>'."\n";

				if ($addon_conf['MadeBy']['display_recipe_icon'])
				{
					$content .=  '<th class="membersHeader">&nbsp;'.$wordings[$lang]['item'].'&nbsp;</th>'."\n";
				}
				if ($addon_conf['MadeBy']['display_recipe_name'])
				{
					//$content .=  '<th class="membersHeader"><a href="?roster_addon_name='.$_GET['roster_addon_name'].'&amp;proffilter='.$_REQUEST["proffilter"].'&amp;sort=type">'.$wordings[$lang]['name'].'</a></th>'."\n";
					$content .=  '<th class="membersHeader">'.make_link('', $wordings[$lang]['name'], array('proffilter' => $_REQUEST["proffilter"], 'sort' => 'type')).'</th>'."\n";
				}
				if ($addon_conf['MadeBy']['display_recipe_level']  && $recipe->data['skill_name'] != $wordings[$lang]['Enchanting'] && $recipe->data['skill_name'] != $wordings[$lang]['Mining'])
				{
					//$content .=  '<th class="membersHeader"><a href="?roster_addon_name='.$_GET['roster_addon_name'].'&amp;proffilter='.$_REQUEST["proffilter"].'&amp;sort=level'.$sort_d.'">&nbsp;'.$wordings[$lang]['level'].'&nbsp;</a></th>'."\n";
					$content .=  '<th class="membersHeader">'.make_link('', "&nbsp;{$wordings[$lang]['level']}&nbsp;", array('proffilter'=>$_REQUEST["proffilter"],'sort'=>'level','SortDescending'=>$sort_d)).'</th>';
					//<a href="?roster_addon_name='.$_GET['roster_addon_name'].'&amp;proffilter='.$_REQUEST["proffilter"].'&amp;sort=level'.$sort_d.'">&nbsp;'.$wordings[$lang]['level'].'&nbsp;</a></th>'."\n";
				}
				if ($addon_conf['MadeBy']['display_recipe_tooltip'])
				{
					$content .=  '<th width="220" class="membersHeader">&nbsp;'.$wordings[$lang]['itemdescription'].'&nbsp;</th>'."\n";
				}
				if ($addon_conf['MadeBy']['display_recipe_type'])
				{
					$content .=  '<th class="membersHeader">&nbsp;'.$wordings[$lang]['type'].'&nbsp;</th>'."\n";
				}
				if ($addon_conf['MadeBy']['display_recipe_reagents'])
				{
					$content .=  '<th class="membersHeader">&nbsp;'.$wordings[$lang]['reagents'].'&nbsp;</th>'."\n";
				}
				if ($addon_conf['MadeBy']['display_recipe_makers'])
				{
					$content .=  '<th class="membersHeader">&nbsp;'.$wordings[$lang]['whocanmakeit'].'&nbsp;</th>'."\n";
				}
				$content .=  '</tr>';
			}
			// while($row_main = $wowdb->fetch_array($result_main)){
			$qry_users = "
			SELECT m.name, r.difficulty, s.skill_level
			FROM ".ROSTER_MEMBERSTABLE." m, ".ROSTER_RECIPESTABLE." r, ".ROSTER_SKILLSTABLE." s 
			WHERE r.member_id = m.member_id 
			AND r.member_id = s.member_id 
			AND r.skill_name = s.skill_name 
			AND recipe_name = '".addslashes($recipe->data['recipe_name'])."' 
			ORDER by m.name";

			$result_users = $wowdb->query($qry_users) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$qry_users);

			$users = '';
			$break_counter = 0;
			while($row_users = $wowdb->fetch_array($result_users))
			{
				if ($break_counter == $addon_conf['MadeBy']['display_recipe_makers_count'])
				{
					$users .= '<br />';
					$break_counter = 0;
				}
				elseif( $users != '' )
				{
					$users .= ', ';
				}

				if (substr($row_users['skill_level'],0,strpos($row_users['skill_level'],':')) < ROSTER_MAXSKILLLEVEL)
				{
					//$users .= '<a '.makeOverlib($row_users['skill_level'],'','',2,'',',WRAP').' class="difficulty_'.$row_users['difficulty'].'" href="./char.php?name='.$row_users['name'].'&amp;server='.$server_name_escape.'&amp;action=recipes">'.$row_users['name'].'</a>'."\n";
					$users .= make_link('char.php',$row_users['name'],array('name' => $row_users['name'], 'server' => $server_name_escape, 'action' => 'recipes'),makeOverlib($row_users['skill_level'],'','',2,'',',WRAP').' class="difficulty_'.$row_users['difficulty'].'"');
					//$users .= '<span class="difficulty_'.$row_users['difficulty'].'">'.make_link('char.php',$row_users['name'],array('name' => $row_users['name'], 'server' => $server_name_escape, 'action' => 'recipes'),makeOverlib($row_users['skill_level'],'','',2,'',',WRAP')).'</div>';
				}
				else
				{
					//$users .= '<a '.makeOverlib($row_users['skill_level'],'','',2,'',',WRAP').' class="difficulty_1" href="./char.php?name='.$row_users['name'].'&amp;server='.$server_name_escape.'&amp;action=recipes">'.$row_users['name'].'</a>'."\n";
					$users .= make_link('char.php', $row_users['name'], array('name' => $row_users['name'], 'server' => $server_name_escape, 'action' => 'recipes'),makeOverlib($row_users['skill_level'],'','',2,'',',WRAP').' class="difficulty_1" ');
					//$users .= '<span style="color:#CCccCC">'.make_link('char.php', $row_users['name'], array('name' => $row_users['name'], 'server' => $server_name_escape, 'action' => 'recipes'),makeOverlib($row_users['skill_level'],'','',2,'',',WRAP')).'</span>';
				}
				$break_counter++;
			}
			//$wowdb->free_result($result_users);

			$users = rtrim($users,', ');

			// Increment counter so rows are colored alternately
			++$rc;

			$table_cell_start = '<td class="membersRow'.(($rc%2)+1).'" align="center" valign="middle">';


			$thottURL='<a href="http://www.thottbot.com/index.cgi?i='.
			str_replace(' ', '+',$recipe->data['recipe_name']).'" target="_thottbot">'.
			$recipe->data['recipe_name'].'</a>';

			if ($addon_conf['MadeBy']['display_recipe_tooltip'])
			{
				$tooltip = '';
				$first_line = true;
				$recipe->data['item_tooltip'] = stripslashes($recipe->data['recipe_tooltip']);
				foreach (explode("\n", $recipe->data['recipe_tooltip']) as $line )
				{
					$color = '';

					if( !empty($line) )
					{
						$line = preg_replace('|\\>|','&#8250;', $line );
						$line = preg_replace('|\\<|','&#8249;', $line );
						$line = preg_replace('|\|c[a-f0-9]{2}([a-f0-9]{6})(.+?)\|r|','<span style="color:#$1;">$2</span>',$line);

						// Do this on the first line
						// This is performed when $caption_color is set
						if( $first_line )
						{
							if( $recipe->data['item_color'] == '' )
							$recipe->data['item_color'] = '9d9d9d';

							if( strlen($recipe->data['item_color']) > 6 )
							$color = substr( $recipe->data['item_color'], 2, 6 );
							else
							$color = $recipe->data['item_color'];

							$color .= ';font-size:12px;font-weight:bold';
							$first_line = false;
						}
						else
						{
							if ( ereg('^'.$wordings[$lang]['tooltip_use'],$line) )
							$color = '00ff00';
							elseif ( ereg('^'.$wordings[$lang]['tooltip_requires'],$line) )
							$color = 'ff0000';
							elseif ( ereg('^'.$wordings[$lang]['tooltip_reinforced'],$line) )
							$color = '00ff00';
							elseif ( ereg('^'.$wordings[$lang]['tooltip_equip'],$line) )
							$color = '00ff00';
							elseif ( ereg('^'.$wordings[$lang]['tooltip_chance'],$line) )
							$color = '00ff00';
							elseif ( ereg('^'.$wordings[$lang]['tooltip_enchant'],$line) )
							$color = '00ff00';
							elseif ( ereg('^'.$wordings[$lang]['tooltip_soulbound'],$line) )
							$color = '00bbff';
							elseif ( ereg('^'.$wordings[$lang]['tooltip_set'],$line) )
							$color = '00ff00';
							elseif ( preg_match('|\([a-f0-9]\).'.$wordings[$lang]['tooltip_set'].'|',$line) )
							$color = '666666';
							elseif ( ereg('^\\"',$line) )
							$color = 'ffd517';
						}

						// Convert tabs to a formated table
						if( strpos($line,"\t") )
						{
							$line = str_replace("\t",'</td><td align="right" class="overlib_maintext">', $line);
							$line = '<table width="100%" cellspacing="0" cellpadding="0"><tr><td class="overlib_maintext">'.$line.'</td></tr></table>';
							$tooltip .= $line;
						}
						elseif( !empty($color) )
						{
							$tooltip .= '<span style="color:#'.$color.';">'.$line.'</span><br />';
						}
						else
						{
							$tooltip .= "$line<br />";
						}
					}
					else
					{
						//$tooltip .= '<br />';
					}
				}
				//$users = rtrim($users,'<br>');
			}

			$content .=  '<tr>'."\n";
			if ($addon_conf['MadeBy']['display_recipe_icon'])
			{
				$content .=  $table_cell_start.'<div class="equip">';
				$content .=  $recipe->out();
				$content .=  '</div></td>';
			}
			if ($addon_conf['MadeBy']['display_recipe_name'])
			{
				$content .=  $table_cell_start.'&nbsp;<span style="color:#'.substr( $recipe->data['item_color'], 2, 6 ).';">'.$recipe->data['recipe_name'].'</span>&nbsp;</td>';
			}
			if ($addon_conf['MadeBy']['display_recipe_level'] && $recipe->data['skill_name'] != $wordings[$lang]['Enchanting'] && $recipe->data['skill_name'] != $wordings[$lang]['Mining'])
			{
				$content .=  $table_cell_start.'&nbsp;'.$recipe->data['level'].'&nbsp;</td>';
			}
			if ($addon_conf['MadeBy']['display_recipe_tooltip'])
			{
				$content .=  $table_cell_start.'<table style="width:240;white-space:normal;"><tr><td>'.stripslashes($tooltip).'</td></tr></table></td>';
			}
			if ($addon_conf['MadeBy']['display_recipe_type'])
			{
				$content .=  $table_cell_start.'&nbsp;'.$recipe->data['recipe_type'].'&nbsp;</td>';
			}
			if ($addon_conf['MadeBy']['display_recipe_reagents'])
			{
				$content .=  $table_cell_start.'&nbsp;'.str_replace('<br>','&nbsp;<br />&nbsp;',$recipe->data['reagents']).'</td>';
			}
			if ($addon_conf['MadeBy']['display_recipe_makers'])
			{
				$content .=  $table_cell_start.'&nbsp;'.$users.'&nbsp;</td>';
			}
			$content .=  '</tr>';
		}
		$content .=  '</table>'.border('syellow','end');

	}
	else
	{
		$content .=  $wordings[$lang]['dnotpopulatelist'];
	}
}
// config button (only show if authorized as admin)
if (!is_object($roster_login))
{
	$roster_login = new RosterLogin($script_filename.((isset($_GET['action']))?"&amp;action=".$_GET['action']:''));
}
if($roster_login->getAuthorized())
{
	$content .= '<br /><br /><br />'.border('sblue','start').make_link('',"&nbsp;&nbsp;{$wordings[$lang]['MadeBy_Configure_txt']}&nbsp;&nbsp;", array('action'=>'config'))
	.border('sblue','end');
}
$content .= '<br /><br /><br />'.MADEBY_VERSION;
