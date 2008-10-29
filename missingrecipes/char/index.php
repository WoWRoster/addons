<?php
/*
 * Missing Recipes
 * Originally by: Zeryl
 * Ported to 2.0 and maintained by: Teta
 */
if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

require_once (ROSTER_LIB . 'skill.php');
require_once (ROSTER_LIB . 'recipes.php');

$roster->output['html_head'] = '<link rel="stylesheet" type="text/css" href="/pb/roster/addons/missingrecipes/templates/style.css" />';

if ($addon['config']['mr_show_wowheadtooltips']) {
	// This part courtesy of Ulminia
	// Enable wowhead tooltips

	$roster->output['html_head'] = '<script src="http://www.wowhead.com/widgets/power.js"></script>';

	function get_icon_link($string){
		$id = null;
		$matches = array('/db/spell.html?wspell=','/db/item.html?witem=','&source=live','&amp;source=live');
		$id = str_replace( $matches, '', $string );
		return $id;
	}

	function get_icon_linka($string){
		global $roster;
		$id = null;
		$matchesa = array('<a href="http://wow.allakhazam.com/db/item.html?witem=','"><img alt="" src="' . ROSTER_URL . $roster->config['interface_url'] . 'img/Interface/Icons"', '" alt="" height="32" width="32" border="0" /></a>','"><img alt="" src="');
		$imagex = str_replace( $matchesa, ':', $string );
		if (stristr($imagex,":")) {
			list($a,$b,$c,$d) = explode(":", $imagex);
			return $b;
		} else {
			return null;
		}
	}
	// End tooltips part
}
//aprint($addon);
// Assign initial tpl vars
$roster->tpl->assign_vars(array(
	'L_ITEM'	=> $roster->locale->act['item'],
	'L_NAME'	=> $roster->locale->act['name'],
	'L_SLVL'	=> $roster->locale->act['skill_level'],
	'L_DISPLAY'	=> (($addon['config']['display_mr_list'])?'inline-table':'none'),
	'L_SHOWBAR' => $addon['config']['mr_show_progressbar'],

	'A_THEME_IMG_PATH' => $addon['url_path'] . 'templates/images/',
	'R_THEME_PATH' => ROSTER_PATH . 'templates/' . $roster->tpl->tpl // Since Roster likes to set the THEME_PATH to the current template directory
	)
);

$charid = $roster->data['member_id'];
$skills = skill_get_many($charid);
$skill_list = array();
$i=0;
$skill_name = '';
$skill_name_divider = '';
$known_count = array();
foreach ($skills as $skillgroup)
{
	foreach ($skillgroup as $skill)
	{
		$st = $skill->data['skill_type'];
		if ($skill->data['skill_type']==$roster->locale->wordings[$roster->data['clientLocale']]['professions'] || $skill->data['skill_type']==$roster->locale->wordings[$roster->data['clientLocale']]['secondary'])
		{
			if ($skill->data['skill_name']!=$roster->locale->wordings[$roster->data['clientLocale']]['riding'] && $skill->data['skill_name']!=$roster->locale->wordings[$roster->data['clientLocale']]['Fishing'] && $skill->data['skill_name']!=$roster->locale->wordings[$roster->data['clientLocale']]['Skinning'] && $skill->data['skill_name']!=$roster->locale->wordings[$roster->data['clientLocale']]['Mining'] && $skill->data['skill_name']!=$roster->locale->wordings[$roster->data['clientLocale']]['Herbalism'])
			{
				$skill_list[$i] = $skill->data['skill_name'];
				$skill_level[$i] = $skill->data['skill_level'];
				$skill_name_header = $skill->data['skill_name'];
				$query = "SELECT count(`recipe_id`) as cnt FROM `" . $roster->db->table('recipes') . "` WHERE `member_id` = '$charid' AND `skill_name` = '$skill_name_header'";
				$result = $roster->db->query($query);
				$kc = $roster->db->fetch($result);
				$known_count[$i] = $kc['cnt'];
				$i++;

				$roster->tpl->assign_block_vars('mr', array(
					'LINK' => makelink('#' . strtolower(str_replace(' ','',$skill_name_header))),
					'NAME' => $skill_name_header,
					'DIVIDER' => $skill_name_divider,
					)
				);

				$skill_name_divider = '-&nbsp;';
			}
		}
	}
}

$allrecipes=array();
$i=0;
foreach($skill_list as $skill)
{
	switch($skill)
	{
		case $roster->locale->act['Alchemy']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=171&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=171&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=171&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=171&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=171&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Blacksmithing']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=164&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=164&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=164&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=164&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=164&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Cooking']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=185&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=185&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=185&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=185&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=185&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Enchanting']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=333&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=333&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=333&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=333&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=333&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Engineering']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=202&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=202&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=202&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=202&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=202&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['First Aid']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=129&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=129&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=129&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=129&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=129&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Leatherworking']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=165&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=165&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=165&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=165&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=165&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Tailoring']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=197&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=197&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=197&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=197&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=197&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Jewelcrafting']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=755&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=755&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=755&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=755&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=755&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		case $roster->locale->act['Inscription']:
			$allrecipes[$i] = urlgrabber('http://wow.allakhazam.com/db/skill.html?line=773&source=live&tier=apprentice&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=773&source=live&tier=journeyman&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=773&source=live&tier=expert&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=773&source=live&tier=artisan&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$allrecipes[$i] .= urlgrabber('http://wow.allakhazam.com/db/skill.html?line=773&source=live&tier=master&locale='.$roster->data['clientLocale'],$addon['config']['mr_urlgrabber_timeout']);
			$i++;
			break;
		default:
			$allrecipes[$i] ='';
			$i++;
			break;
	}
}

foreach($allrecipes as $index => $allrecipesperskill)
{
	preg_match_all('/(?<=\<tr class=\"[dl]r\"\>)((.(?!\<\/tr))*)/si',$allrecipesperskill,$matches);
	foreach ($matches[0] as $nr => $recipe)
	{
		preg_match_all('/(\<td[\w \\\'\"=]*\>)(.*)(?=\<\/td)/mi',$recipe,$lines)."\n";
//		aprint($lines);
		$parsedrecipes[$index][$nr]['icon'] = strtolower($lines[2][0]);
//		preg_match('/(\<a[^\>]* href=\"([^\"]*)\"\>)([^<]*)/i',$parsedrecipes[$index][$nr]['icon'],$match);
//		$fulliconlink = "<a href=\"http://wow.allakhazam.com".$match[2]."&locale=".$roster->data['clientLocale'];
		$parsedrecipes[$index][$nr]['icon'] = str_replace("src=\"/images/icons", "src=\"".$roster->config['interface_url']."Interface/Icons", $parsedrecipes[$index][$nr]['icon']);
		$parsedrecipes[$index][$nr]['icon'] = str_replace(".png", ".".$roster->config['img_suffix']."\" alt=\"" , $parsedrecipes[$index][$nr]['icon']);
		$parsedrecipes[$index][$nr]['icon'] = str_replace("href=\"", "href=\"http://wow.allakhazam.com" , $parsedrecipes[$index][$nr]['icon']);
		$parsedrecipes[$index][$nr]['icon'] = str_replace("\"><img", "&locale=".$roster->data['clientLocale']."\"><img" , $parsedrecipes[$index][$nr]['icon']);
		preg_match_all('/(\<a[^\>]* href=\"([^\"]*)\"\>)([^<]*)/i',$lines[2][1],$name);
//		aprint($name);
		$parsedrecipes[$index][$nr]['name'] = $name[3][0];
		//preg_match('/href=\"([^\"]*)\"/i',$lines[2][5],$link);
		//$recipes[$index][$nr]['components'] = $lines[2][4];
		if(array_key_exists('0',$name[2]))
		{
			$parsedrecipes[$index][$nr]['i_link'] = $name[2][0];
		}
		//$recipes[$index][$nr]['category'] = $lines[2][2];
		$parsedrecipes[$index][$nr]['skill'] = $lines[2][3];
//		preg_match('/(\<a[^\>]* href=\"([^\"]*)\"\>)([^<]*)(.*(\<a[^\>]* href=\"([^\"]*)\"\>\<span[^\>]*\>)([^<]*))?/i',$lines[2][1],$name);
		$parsedrecipes[$index][$nr]['r_link'] = $name[2][0];
		if (isset($name[3][1]))
		{
			$parsedrecipes[$index][$nr]['pat_link'] = $name[2][1];
			$parsedrecipes[$index][$nr]['pat_name'] = $name[3][1];
		}
	}
}

//aprint($parsedrecipes);

$known = recipe_get_many( $charid,'', 'level' );

// aprint($known);
$all_count = array();
foreach($known as $kindex => $krecipe)
{
	$knownrecipenames[]=$krecipe->data['recipe_name'];
}

foreach($skill_list as $sindex => $skill)
{
	foreach($parsedrecipes[$sindex] as $nr => $recipe)
	{
		$allrecipenames[$sindex][]=str_replace("&nbsp;"," ",$recipe['name']);
	}
//	$diffrecipenames[$sindex] = array_diff($allrecipenames[$sindex],$knownrecipenames);
	foreach($allrecipenames[$sindex] as $recipekey => $recipename) {
		if (!in_array($recipename,$knownrecipenames)) {
			$diffrecipenames[$sindex][$recipekey]=$recipename;
		}
	}
	$all_count[$sindex] = count($allrecipenames[$sindex]);
//	aprint($allrecipenames[$sindex]);
//	aprint($knownrecipenames);
//	aprint($diffrecipenames[$sindex]);
}

//aprint($allrecipenames);
//aprint($knownrecipenames);

//aprint($skill_level);
//aprint($diffrecipenames);

//aprint($known_count);
//aprint($all_count);

foreach($skill_list as $sindex => $skill_name)
{
	list($charskill_level, $maxskill_level) = explode(':', $skill_level[$sindex], 2);
	// make skill header
	// Set an link to the top behind the profession image
	$skill_image = 'Interface/Icons/' . $roster->locale->wordings[$roster->data['clientLocale']]['ts_iconArray'][$skill_name];


	$percentage = round(($known_count[$sindex]/$all_count[$sindex])*100);

	$tooltip = makeOverlib($known_count[$sindex] .'/'. $all_count[$sindex] . ' - ' . $percentage,'','',2,'',',WRAP');

/*			$cell_value = '<div ' . $tooltip . ' style="cursor:default;"><div class="levelbarParent" style="width:70px;"><div class="levelbarChild">' . $know_count[$sindex] .'/'. $all_count[$sindex] . ' - ' . $percentage . '</div></div>';
			$cell_value .= '<table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="70">';
			$cell_value .= '<tr>';
			$cell_value .= '<td style="background-image: url(\'' . $roster->config['img_url'] . 'expbar-var2.gif\');" width="' . $percentage . '%"><img src="' . $roster->config['img_url'] . 'pixel.gif" height="14" width="1" alt="" /></td>';
			$cell_value .= '<td width="' . (100 - $percentage) . '%"></td>';
			$cell_value .= "</tr>\n</table>\n</div>\n";
		return '<div style="display:none;">' . str_pad($row['level'],2,'0',STR_PAD_LEFT) . '</div>' . $cell_value;
*/

	$roster->tpl->assign_block_vars('mr_skill', array(
		'INDEX' => $sindex,
		'ICON' => $skill_image,
		'ANCHOR' => strtolower(str_replace(' ','',$skill_name)),
		'NAME'   => $skill_name,
		'LEVEL' => $charskill_level,
		'MAXLEVEL' => $maxskill_level,
		'TOOLTIP' => $tooltip,
		'PERCENTAGE' => $percentage,
		'LPERCENTAGE' => 100-$percentage,
		'KCOUNT' => $known_count[$sindex],
		'ACOUNT' => $all_count[$sindex],
		)
	);

	foreach($diffrecipenames[$sindex] as $dindex => $diffrecipename)
	{
		// make recipe row
		// skill level color (thanks to Ulminia)

		// Improved skill color by Zanix

		// Strip out &nbsp; for a clean match
		$skill_check = str_replace('&nbsp;','',$parsedrecipes[$sindex][$dindex]['skill']);
		preg_match_all('/<span class="(.+?)">(.+?)<\/span>/i',$skill_check,$skillmatches);

		// Check for difficulty level, set to red if it doesn't meet orange level
		// Also keep the previous color if it doesn't exceed the next level
		$skill_color = ( $charskill_level >= $skillmatches[2][0] ? 'orange' : 'red');
		$skill_color = ( $charskill_level >= $skillmatches[2][1] ? 'yellow' : $skill_color);
		$skill_color = ( $charskill_level >= $skillmatches[2][2] ? 'green' : $skill_color);
		$skill_color = ( $charskill_level >= $skillmatches[2][3] ? 'grey' : $skill_color);

		// Implode the color level arry into a string we can use
		$skill_levels = implode(' ',$skillmatches[2]);

		// Check if the recipe exists in the database and use the tooltip data
		$sqlquery = 'SELECT recipe_name, item_color, recipe_tooltip FROM '.$roster->db->table('recipes').' WHERE recipe_name = \''.addslashes($parsedrecipes[$sindex][$dindex]['name']).'\'';
		$sqlresult = $roster->db->query($sqlquery);
		$sqlrow = $roster->db->fetch($sqlresult);
		$inserttt = '';
		if ($sqlrow)
		{
			$inserttt = makeOverlib($sqlrow['recipe_tooltip']."\n",$sqlrow['recipe_name'],'',0,'','');
		}

		$link = '';
		if(array_key_exists('i_link', $parsedrecipes[$sindex][$dindex]))
		{
			if ($addon['config']['mr_show_wowheadtooltips']) {
				$link = "http://".$roster->locale->act['wowhead_hostname'].".wowhead.com/?item=".get_icon_linka($parsedrecipes[$sindex][$dindex]['icon']);
			} else {
				$link = 'http://wow.allakhazam.com'.$parsedrecipes[$sindex][$dindex]['i_link'];
			}
		}

		$plink = $pname = '';
		if(array_key_exists('pat_link', $parsedrecipes[$sindex][$dindex]))
		{
			if ($addon['config']['mr_show_wowheadtooltips']) {
				$plink = "http://".$roster->locale->act['wowhead_hostname'].".wowhead.com/?item=".get_icon_link($parsedrecipes[$sindex][$dindex]['pat_link']);
			} else {
				$plink = "http://wow.allakhazam.com".$parsedrecipes[$sindex][$dindex]['pat_link'];
			}
			$pname = $parsedrecipes[$sindex][$dindex]['pat_name'];
		}

		$roster->tpl->assign_block_vars('mr_skill.mr_recipe', array(
			'ROW_CLASS' => $roster->switch_row_class(),
			'TOOLTIP' => $inserttt,
			'ICON' => $parsedrecipes[$sindex][$dindex]['icon'],
			'NAME' => $parsedrecipes[$sindex][$dindex]['name'],
			'SKILL' => $skill_levels,
			'LINK' => $link,
			'PNAME' => $pname,
			'PLINK' => $plink,
			'SKILLCOLOR' => $skill_color,
			)
		);
	}
}

$roster->tpl->set_handle('mr',$addon['basename'] . '/mr.html');
$roster->tpl->display('mr');
