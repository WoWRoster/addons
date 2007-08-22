<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v2.0 Titan99  $
 * @link       http://www.wowroster.net
 * @package    Key_BC
 * @subpackage Installer
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

include_once ($addon['dir'] . 'inc/conf.php');
include_once ($addon['dir'] . 'inc/lib_progressbar.php');


$header_title = $roster->locale->act['KeyBC_title_addon'];


print border('sgray','start',$roster->locale->act['KeyBC_title_addon']);
?>
<table width="100%" class="bodyline" cellspacing="0" id="table_0">
	<tr>
		<th class="membersHeader"><?php echo $roster->locale->act['Name']?></th>
<?php
$query="SELECT *
	FROM `" . $roster->db->table('Key','Key_BC') . "`
	WHERE `lang`= '".$roster->config['locale']."'
	ORDER BY `order` ASC";

$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
$nb_Key=0;
$inst_key='';

while($row = $roster->db->fetch($result_key))
{

	$inst_key[$nb_Key++]=$row;
	$tt=makeOverlib( $row['instance_name'] , $row['id_display'] , '' , 0 , '' , '' );
?>
		<th class="membersHeader"><a href="#" <?php echo $tt;?> > <?php echo $row['id_display']; ?> </a> </th>	
<?php
}//end while
?>
	</tr>
<?php
$query="SELECT p.member_id, p.name, g.guild_name, p.clientLocale, p.level, p.class, g.factionEn, g.guild_id
	FROM `".$roster->db->table('players')."` p, `".$roster->db->table('guild')."` g
	WHERE p.guild_id=g.guild_id
	ORDER BY `name` ASC";

$result_player = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

while($row = $roster->db->fetch($result_player))
{
	if($row['factionEn']=='Horde')
		$Faction='H';
	else
		$Faction='A';
	
	$affiche=0;
	$tab_key='';
	$i=0;
	foreach( $inst_key As $tmpKey)
	{
		//recherche de la clef
		$tab_key[$i]=0;

		$query="SELECT i.*
			FROM `".$roster->db->table('items')."` i
			WHERE i.`item_name` = '".addslashes($tmpKey['key_name'])."'
			AND  i.`member_id` = ".$row['member_id']."
			ORDER BY i.`member_id` ASC";
		$result_key_search = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

		if($row2 = $roster->db->fetch($result_key_search))
		{
			$tooltip = makeOverlib($row2['item_tooltip'],'',$row2['item_color'],0,$lang);
			$itemAff = '<div class="item" '.$tooltip.'>';
			$itemAff.="<img src=\"". $roster->config['interface_url'] . 'Interface/Icons/' . $row2['item_texture'] . '.' . $roster->config['img_suffix'] . "\" class=\"icon\" alt=\"\" />";
			$itemAff.='</div>';
		
			$tab_key[$i]=$itemAff;
			$affiche=1;
		}
		else // pas la clef donc avancement
		{
			if($tmpKey['Type']=='Quests')
			{
				require($addon['dir'] . 'inc/lib_quests.php');
			}
			elseif($tmpKey['Type']=='Reputation')
			{
				require($addon['dir'] . 'inc/lib_reput.php');
			}
		}
		$i++;
	}//end for

	if($affiche==1)
	{
//guild-memberslist&guild=1

?>
	<tr>
		<td class="membersRow1"><?php echo '<a href="' .makelink("char-info&amp;member=".$row['name']).'">'.$row['name']."</a><br/>".$row['class']." ".$row['level']."<br/>".'<a href="' .makelink("guild-memberslist&amp;guild=".$row['guild_id']).'">'.$row['guild_name']."</a>"; ?></td>
<?php
		foreach( $tab_key As $tmp)
		{
		  if($tmp=='0')
		    $tmp='';
?>
		<td class="membersRow1"><?php echo $tmp?></td>
<?php
		}//end foreach
?>
	</tr>
<?php
	}//end if
}//end while
?>
</table>
<?php

print border('sgray','end',$roster->locale->act['KeyBC_title_addon']);

?>
