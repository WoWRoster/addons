<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v0.5 Titan99 and Tyradil $
 * @link       http://www.wowroster.net
 * @package    GemsDisplay
 * @subpackage Installer
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['dir'] . 'inc/conf.php');

function gemlookup($locales, $color)
{
	global $roster;
	
	$query = "SELECT DISTINCT `recipe_name`, `reagents`, `recipe_type`, `recipe_tooltip`, `recipe_texture`, `item_color`
			FROM `".$roster->db->table('recipes')."`
			WHERE (`recipe_type` = '".$roster->locale->act['GemType'][$color]."'
			AND `skill_name` = '".$roster->locale->act['sill']."') ";
	for ($i = 1; $i<count($locales); $i++)
	{
	if ($locales[$i] != '')
		$query .= " OR (`recipe_type` = '".$roster->locale->act['GemType'][$color]."'
			AND `skill_name` = '".$roster->locale->act['sill']."') ";
	}
	$query .=       "ORDER BY `reagents`,`recipe_name` ";
	
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


$header_title = $roster->locale->act['gemme_title_addon'];

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

$type['blue']=gemlookup($clientLocales, 'blue');
$type['red']=gemlookup($clientLocales, 'red');
$type['yellow']=gemlookup($clientLocales, 'yellow');
$type['purple']=gemlookup($clientLocales, 'purple');
$type['green']=gemlookup($clientLocales, 'green');
$type['orange']=gemlookup($clientLocales, 'orange');
$type['meta']=gemlookup($clientLocales, 'meta');
if (!empty($type['purple']))
{
    $type['blue']= array_merge($type['blue'],$type['purple']);
    $type['red']= array_merge($type['red'],$type['purple']);
}
if (!empty($type['green']))
{
    $type['blue']= array_merge($type['blue'],$type['green']);
    $type['yellow']= array_merge($type['yellow'],$type['green']);
}
if (!empty($type['orange']))
{
    $type['yellow']= array_merge($type['yellow'],$type['orange']);
    $type['red']= array_merge($type['red'],$type['orange']);
}

////////////DISPLAY
print("<h1>".$roster->locale->act['gemme_title_addon']."</h1><br/>");

?>

<script type='text/JavaScript' language='JavaScript'>
	function refreshURL(form) {
		var var1 = (form.quality.options[form.quality.selectedIndex].value);
		if(var1!=0)
		{
			urlt='index.php?p=realm-GemsDisplay&amp;quality=';
			urlt+=var1;
			self.location=urlt;
		}
	}
</script>
<form method="post" action="#">
<?php echo $roster->locale->act['Filter']; ?>
<select name="quality"  onchange="refreshURL(this.form)">
	<option value="none"><?php echo $roster->locale->act['NoFilter']; ?></option>
<?php
foreach($roster->locale->act['qualities'] as $keyColor=>$name)
{
	if(isset($_GET['quality'])&& $_GET['quality']==$keyColor)
		echo '<option value="'.$keyColor.'" selected>'.$name.'</option>';
	else
		echo '<option value="'.$keyColor.'">'.$name.'</option>';
}
?>
</select>
</form>
<br/>
<br/>
<?php

foreach($roster->locale->act['GemType'] as $keyColor=>$couleur)
{
  if (($keyColor == 'blue') || ($keyColor == 'red') || ($keyColor == 'yellow')  || ($keyColor == 'meta'))
  {
/**
 * Starts or ends fancy bodering containers
 *
 * @param string $style What bordering style to use
 * @param string $mode ( 'start' | 'end' )
 * @param string $header_text (optional) Place text in a styled header
 * @return string
 */
print border('sgray','start',$roster->locale->act['Gem_title']." : <span style=\"color: ".$color[$keyColor].";\">".ucfirst($couleur)."</span>")
?>
	<table width="100%" class="bodyline" cellspacing="0">
		<tr>
			<th class="membersHeader"><?php echo $roster->locale->act['Objet']?></th>
			<th class="membersHeader"><?php echo $roster->locale->act['Name']?></th>
			<th class="membersHeader"><?php echo $roster->locale->act['compo']?></th>
			<th class="membersHeader"><?php echo $roster->locale->act['crafter']?></th>
		</tr>
<?php
	$tmp=$type[$keyColor];

	foreach($tmp as $item)
	{
		if((isset($_GET['quality'])&& $_GET['quality']==$item['item_color'])||!isset($_GET['quality'])||(isset($_GET['quality'])&& $_GET['quality']=="none"))
		{
			$tooltip = makeOverlib($item['recipe_tooltip'],'',$item['item_color'],0,$lang);
			$itemAff = '<div class="item" '.$tooltip.'>';
			$itemAff.="<img src=\"". $roster->config['interface_url'] . 'Interface/Icons/' . $item['recipe_texture'] . '.' . $roster->config['img_suffix'] . "\" class=\"icon\" alt=\"\" />";
			$itemAff.='</div>';
		
			$query = "SELECT M.name
					FROM `".$roster->db->table('recipes')."` R, `".$roster->db->table('members')."` M
					WHERE R.member_id=M.member_id
				AND R.`recipe_name` = '".addslashes($item['recipe_name'])."'
				";
			
			$result = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', basename(__FILE__),__LINE__,$query);
			
			$craftName='';
			
			$craftSeperator = false;
			while($row = $roster->db->fetch($result))
			{
				if ($craftSeperator == true)
				$craftName.= ", ";
				$craftName.=$row['name'];
				$craftSeperator = true;
			}
?>
		<tr>
			<td class="membersRow1">
				<?php echo $itemAff?>
			</td>
			<td class="membersRow1"><?php echo $item['recipe_name']?></td>
			<td class="membersRow1"><?php echo $item['reagents']?></td>
			<td class="membersRowRight1"><?php echo $craftName?>&nbsp;</td>
		</tr>
<?php
		}//end if
	}//end foreach($tmp as $item)
?>
	</table>
<br/>
<?php
print border('sgray','end',$roster->locale->act['Gem_title']);
 }
}//end foreach($Gem_info[$roster_conf['roster_lang']] as $value)
?>
