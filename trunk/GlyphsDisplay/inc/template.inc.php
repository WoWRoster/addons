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

function order($tmpglyphes) {
	global $roster, $addon;
	$glyphes = array();
	$min = ucfirst(trim($roster->locale->act['GDminor']));
	$maj = ucfirst(trim($roster->locale->act['GDmajor']));
	foreach($tmpglyphes as $k => $v) {
		if (!in_array($v['recipe_type'], $roster->locale->act['GDclass'])) unset($tmpglyphes[$k]);
		elseif(!(strpos($v['recipe_tooltip'], $roster->locale->act['GDmajor'])===false)) 
			$glyphes[($addon['config']['gld_order']==0?($v['recipe_type'].' - '.$maj): ($maj.' - '.$v['recipe_type']))][] = $v;
		elseif(!(strpos($v['recipe_tooltip'], $roster->locale->act['GDminor'])===false)) 
			$glyphes[($addon['config']['gld_order']==0?($v['recipe_type'].' - '.$min): ($min.' - '.$v['recipe_type']))][] = $v;
		else $glyphes[$v['recipe_type']][] = $v;
	}
	ksort($glyphes);
	return $glyphes;
}

function Glyphs_display() {
	global $glyphes, $roster, $addon;
	print("<h1>".$roster->locale->act['glyph_title_addon']."</h1><br/>");
	//mini menu
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	foreach(array_keys($glyphes) as $type) { 
		$id = str_replace(' ', '', $type);
		$tmp[] = '<a href="'.$url.'#'.$id.'" title="'.$type.'" onclick="javascript:show(\'table'.$id.'\');">'.$type.'</a>'; 
	}
	echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;', $tmp);
	//affichage général
	foreach(array_keys($glyphes) as $type) {
		 $id = str_replace(' ', '', $type);
		 echo '<a name="'.$id.'"></a><table class="border_frame" cellspacing="1" cellpadding="0" style="width:75%">
			<tbody>
			<tr>
			<td class="border_color sgrayborder">
			<div class="header_text sgrayborder" style="cursor: pointer;" onclick="javascript:showHide(\'table'.$id.'\',\'img'.$id.'\', \'/templates/custom/images/minus.gif\', \'/templates/custom/images/plus.gif\');">' .$roster->locale->act['Glyph_title']." : $type".'
			<img id="img'.$id.'" style="padding-left:50px" alt="" src="/templates/custom/images/'.($addon['config']['gld_expand']==0?'plus':'minus') .'.gif"/> </div>
			<table width="100%" id="table'.$id.'" '.($addon['config']['gld_expand']==0?'style="display:none;"':'') .'class="bodyline" cellspacing="0">
				<tr>
					<th class="membersHeader">'.$roster->locale->act['Objet'].'</th>
					<th class="membersHeader">'.$roster->locale->act['Name'].'</th>
					<th class="membersHeader">'.$roster->locale->act['compo'].'</th>
					<th class="membersHeader">'.$roster->locale->act['crafter'].'</th>
				</tr>';
		foreach($glyphes[$type] as $item) {
			$tooltip = makeOverlib($item['recipe_tooltip'],'',$item['item_color'],0,$lang);
			$itemAff = '<div class="item" '.$tooltip.'>';
			$itemAff.="<img src=\"". $roster->config['interface_url'] . 'Interface/Icons/' . $item['recipe_texture'] . '.' . $roster->config['img_suffix'] . "\" class=\"icon\" alt=\"\" />";
			$itemAff.='</div>';
		
			$query = "SELECT M.member_id, M.name
					FROM `".$roster->db->table('recipes')."` R, `".$roster->db->table('members')."` M
					WHERE R.member_id=M.member_id
				AND R.`recipe_name` = '".addslashes($item['recipe_name'])."'
				";
			
			$result = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', basename(__FILE__),__LINE__,$query);
			
			$url = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?p=char-info-recipes&a=c:';
			$crafter = array();
			while($row = $roster->db->fetch($result)) {
				$crafter[] = '<a href="'.$url.$row['member_id'].'" title="'.$row['name'].'">'.$row['name'].'</a>';
			}
			$craftName = implode(', ',$crafter);
			?>
			<tr>
				<td class="membersRow1">
					<?php echo $itemAff?>
				</td>
				<td class="membersRow1"><?php echo $item['recipe_name']?></td>
				<td class="membersRow1"><?php echo $item['reagents']?></td>
				<td class="membersRowRight1"><?php echo $craftName?>&nbsp;</td>
			</tr>
		<?php }//end foreach($tmp as $item)
		?>
			</table>
		<?php
		print border('sgray','end',$roster->locale->act['Glyph_title']);
		echo '<br />';
	}//end foreach($Glyph_info[$roster_conf['roster_lang']] as $value)
	
	
	
	
	
	
}

?>
