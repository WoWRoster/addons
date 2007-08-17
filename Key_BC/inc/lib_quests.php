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

$query="SELECT *
	FROM `".$roster->db->table('Quest','Key_BC')."` P, `".$roster->db->table('quests')."` Q
	WHERE P.`id` = '".$tmpKey['id']."'
	AND P.`lang` = '".$row['clientLocale']."'
	AND P.`Faction` = '".$Faction."'
	AND Q.quest_name = P.part
	AND Q.member_id= ".$row['member_id']."
	";
$result_parts_search = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

if($row2 = $roster->db->fetch($result_parts_search))
{
	$query="SELECT *
	FROM `".$roster->db->table('Quest','Key_BC')."` P
	WHERE P.`id` = '".$tmpKey['id']."'
	AND P.`lang` = '".$row['clientLocale']."'
	AND P.`Faction` = '".$Faction."'
	
	";
	$result_tt = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

	$Aff='';

	while($row3 = $roster->db->fetch($result_tt))
	{

		if($row3['order']<$row2['order'])
			$color = $colorcmp;
		elseif($row3['order']==$row2['order'])
			$color = $colorcur;
		else
			$color= $colorno;

		$Aff .= '<span style="color:#'.$color.'">'.$row3['order'].'. '.$row3['part'].'</span><br/>';
	}

	$tt=makeOverlib( $Aff , $tmpKey['key_name'] , '' , 0 , '' , '' );

	$tab_key[$i]='<a href="#" '.$tt.'>'.$roster->locale->act['Quests'].'</a>';
	$affiche=1;
}

?>
