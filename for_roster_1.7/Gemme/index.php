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
 * $Id: index.php 19 2006-12-27 06:25:26Z zanix $
 *
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

function gemlookup($locales, $color)
{
   global $wowdb,$Gem_info;

   $query = "SELECT DISTINCT `recipe_name`, `reagents`, `recipe_type`, `recipe_tooltip`, `recipe_texture`, `item_color`
		FROM `".ROSTER_RECIPESTABLE."`
		WHERE (`recipe_type` = '".$Gem_info[$locales[0]]['type'][$color]."'
		AND `skill_name` = '".$Gem_info[$locales[0]]['sill']."') ";
   for ($i = 1; $i<count($locales); $i++)
   {
     if ($locales[$i] != '')
          $query .= " OR (`recipe_type` = '".$Gem_info[$locales[$i]]['type'][$color]."'
		AND `skill_name` = '".$Gem_info[$locales[$i]]['sill']."') ";
   }
   $query .=       "ORDER BY `reagents`,`recipe_name` ";

   $result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error', basename(__FILE__),__LINE__,$query);

   $count = 0;
   $temp = array();
   while($row = $wowdb->fetch_array($result))
   {
        $temp[$count]=$row;
	$count++;
   }

   return $temp;
}


$header_title = $wordings[$roster_conf['roster_lang']]['gemme_title_addon'];

//check for available clientLocales
$clientLocales = array();
$clquery = "SELECT DISTINCT p.clientLocale FROM `".ROSTER_PLAYERSTABLE."` p;";
$clresult = $wowdb->query($clquery) or die_quietly($wowdb->error(),'Database Error', basename(__FILE__),__LINE__,$clquery);
$i = 0;
while($clrow = $wowdb->fetch_array($clresult))
{
  $clientLocales[$i] = $clrow['clientLocale'];
  $i++;
}
if ($i == 0) $clientLocales[$i] = $roster_conf['roster_lang'];

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
print("<h1>".$wordings[$roster_conf['roster_lang']]['gemme_title_addon']."</h1><br>");

?>
<script type='text/JavaScript' language='JavaScript'>
	function refreshURL(form) {
		var var1 = (form.quality.options[form.quality.selectedIndex].value);
		if(var1!=0)
		{
			urlt='addon.php?roster_addon_name=Gemme&quality=';
			urlt+=var1;
			self.location=urlt;
		}
	}
</script>
<form method="post" action="#">
<?php echo $Gem_info[$roster_conf['roster_lang']]['Filter']; ?>
<select name="quality"  onChange="refreshURL(this.form)">
	<option value="none"><?php echo $Gem_info[$roster_conf['roster_lang']]['NoFilter']; ?></option>
<?php
foreach($Gem_info[$roster_conf['roster_lang']]['qualities'] as $keyColor=>$name)
{
	if(isset($_GET['quality'])&& $_GET['quality']==$keyColor)
		echo '<option value="'.$keyColor.'" selected>'.$name.'</option>\n';
	else
		echo '<option value="'.$keyColor.'">'.$name.'</option>\n';
}
?>
</select>
</form>
<br>
<br>
<?php

foreach($Gem_info[$roster_conf['roster_lang']]['type'] as $keyColor=>$couleur)
{
  if (($keyColor == 'blue') || ($keyColor == 'red') || ($keyColor == 'yellow')  || ($keyColor == 'meta'))
  {
?>
<table cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td class="simplebordertopleft sgraybordertopleft"></td>
		<td class="simplebordertop sgraybordertop"></td>
		<td class="simplebordertopright sgraybordertopright"></td>
	</tr>
	<tr>
		<td class="simplebordercenterleft sgraybordercenterleft"></td>
		<th class="simpleborderheader sgrayborderheader" align="center" valign="top">
			<?php echo $Gem_info[$roster_conf['roster_lang']]['Gem_title']?> : <span style="color: <?php echo $color[$keyColor]?>;"><?php echo ucfirst($couleur)?></span>
		</th>
		<td class="simplebordercenterright sgraybordercenterright"></td>
	</tr>
	<tr>
		<td class="simplebordercenterleft sgraybordercenterleft"></td>
		<td class="simplebordercenter">
			<table width="100%" class="bodyline" cellspacing="0" id="table_0">
				<tr>
					<th class="membersHeader"><?php echo $Gem_info[$roster_conf['roster_lang']]['Objet']?></th>
					<th class="membersHeader"><?php echo $Gem_info[$roster_conf['roster_lang']]['Name']?></th>
					<th class="membersHeader"><?php echo $Gem_info[$roster_conf['roster_lang']]['compo']?></th>
					<th class="membersHeader"><?php echo $Gem_info[$roster_conf['roster_lang']]['crafter']?></th>
				</tr>
<?php
	$tmp=$type[$keyColor];

	foreach($tmp as $item)
	{
		if((isset($_GET['quality'])&& $_GET['quality']==$item['item_color'])||!isset($_GET['quality'])||(isset($_GET['quality'])&& $_GET['quality']=="none"))
		{
			$tooltip = makeOverlib($item['recipe_tooltip'],'',$item['item_color'],0,$lang);
			$itemAff = '<div class="item" '.$tooltip.'>';
			$itemAff.="<img src=\"".$roster_conf['interface_url'].$item['recipe_texture'].".jpg\" class=\"icon\" alt=\"\" />";
			$itemAff.='</div>';
		
			$query = "SELECT M.name
					FROM `".ROSTER_RECIPESTABLE."` R, `".ROSTER_MEMBERSTABLE."` M
					WHERE R.member_id=M.member_id
				AND R.`recipe_name` = '".addslashes($item['recipe_name'])."'
				";
			
			$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error', basename(__FILE__),__LINE__,$query);
			
			$craftName='';
			
			$craftSeperator = false;
			while($row = $wowdb->fetch_array($result))
			{
				if ($craftSeperator == true)
				$craftName.= ", ";
				$craftName.=$row[name];
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
		</td>
		<td class="simplebordercenterright sgraybordercenterright"></td>
	</tr>
	<tr>
		<td class="simpleborderbotleft sgrayborderbotleft"></td>
		<td class="simpleborderbot sgrayborderbot"></td>
		<td class="simpleborderbotright sgrayborderbotright"></td>
	</tr>
</table>
<br>
<?php
 }
}//end foreach($Gem_info[$roster_conf['roster_lang']] as $value)
?>
