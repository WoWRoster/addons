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


$query = "SELECT DISTINCT `recipe_name` , `reagents`, `recipe_tooltip`, `recipe_texture`, `item_color`
		FROM `".ROSTER_RECIPESTABLE."`
		WHERE (`recipe_type` = '".$Gem_info[$clientLocales[0]]['Gem']."'
		AND `skill_name` = '".$Gem_info[$clientLocales[0]]['sill']."') ";
for ($i = 1; $i<count($clientLocales); $i++)
{
   if ($clientLocales[$i] != '')
      $query .= " OR (`recipe_type` = '".$Gem_info[$clientLocales[$i]]['Gem']."'
		  AND `skill_name` = '".$Gem_info[$clientLocales[$i]]['sill']."') ";
}
$query .=       "ORDER BY `reagents` ASC";

$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error', basename(__FILE__),__LINE__,$query);

$type['bleu']=array();
$type['red']=array();
$type['yellow']=array();
$type['meta']=array();

$countR=$countB=$countY=$countM=0;

while($row = $wowdb->fetch_array($result))
{
	$matchBlue=$matchRed=$matchYellow=$matchMeta=false;
        for ($i = 0; $i<count($clientLocales); $i++)
	{
           if(ereg($Gem_info[$clientLocales[$i]]['type']['blue'], $row['recipe_tooltip']))
               $matchBlue=true;
	   if(ereg($Gem_info[$clientLocales[$i]]['type']['red'], $row['recipe_tooltip']))
               $matchRed=true;
	   if(ereg($Gem_info[$clientLocales[$i]]['type']['yellow'], $row['recipe_tooltip']))
               $matchYellow=true;
	   if(ereg($Gem_info[$clientLocales[$i]]['type']['meta'], $row['recipe_tooltip']))
               $matchMeta=true;
        }

        if ($matchBlue == true)
        {
		$type['blue'][$countB]=$row;
		$countB++;
        }
	if ($matchRed == true)
        {
		$type['red'][$countR]=$row;
		$countR++;
        }
	if ($matchYellow == true)
        {
		$type['yellow'][$countY]=$row;
		$countY++;
        }
	if ($matchMeta == true)
        {
		$type['meta'][$countM]=$row;
		$countM++;
        }
}

////////////DISPLAY
print("<h1>".$wordings[$roster_conf['roster_lang']]['gemme_title_addon']."</h1><br>");

foreach($Gem_info[$roster_conf['roster_lang']]['type'] as $keyColor=>$couleur)
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
			<?=$Gem_info[$roster_conf['roster_lang']]['Gem_title']?> : <span style="color: <?=$color[$keyColor]?>;"><?=ucfirst($couleur)?></span>
		</th>
		<td class="simplebordercenterright sgraybordercenterright"></td>
	</tr>
	<tr>
		<td class="simplebordercenterleft sgraybordercenterleft"></td>
		<td class="simplebordercenter">
			<table width="100%" class="bodyline" cellspacing="0" id="table_0">
				<tr>
					<th class="membersHeader"><?=$Gem_info[$roster_conf['roster_lang']]['Objet']?></th>
					<th class="membersHeader"><?=$Gem_info[$roster_conf['roster_lang']]['Name']?></th>
					<th class="membersHeader"><?=$Gem_info[$roster_conf['roster_lang']]['compo']?></th>
					<th class="membersHeader"><?=$Gem_info[$roster_conf['roster_lang']]['crafter']?></th>
				</tr>
<?php
	$tmp=$type[$keyColor];

	foreach($tmp as $item)
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
    
    while($row = $wowdb->fetch_array($result))
    {
        $craftName.=$row[name].", ";
    }
?>
				<tr>
					<td class="membersRow1">
						<?=$itemAff?>
					</td>
					<td class="membersRow1"><?=$item['recipe_name']?></td>
					<td class="membersRow1"><?=$item['reagents']?></td>
					<td class="membersRowRight1"><?=$craftName?>&nbsp;</td>
				</tr>
<?php
	}//end 
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
}//end foreach($Gem_info[$roster_conf['roster_lang']] as $value)
?>
