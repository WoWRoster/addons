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
	FROM `".$roster->db->table('Quest','Key_BC')."` P
	WHERE P.`id` = '".$tmpKey['id']."'
	AND P.`lang` = '".$row['clientLocale']."'
	AND P.`Faction` = '".$Faction."'
	
	";
$result_tt = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

if($row3 = $roster->db->fetch($result_tt))
{
	$tmp2=explode('|',$row3['part']);

	$Aff=$roster->locale->act['Objective'].' : '.$tmp2[0].' => '.$tmp2[1].'<br/>';

	$query="SELECT *
		FROM `".$roster->db->table('reputation')."` r
		WHERE r.`member_id` = '".$row['member_id']."'
		AND r.`name` = '".addslashes($tmp2[0])."'
		";

	$result_rep = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

	if($row4 = $roster->db->fetch($result_rep))
	{
		$Aff.=$roster->locale->act['Current'].' : ';
		$Aff.= '<span style="color:#'.$colorcur.'">';
		$Aff.=$row4['Standing'].' '.$row4['curr_rep'].'/'.$row4['max_rep'];
		$Aff.= '</span>';

		$tt=makeOverlib( $Aff , $tmpKey['key_name'] , '' , 0 , '' , '' );
	}
	else
		$tt='';
}
else
	$tt='';

$tab_key[$i]='<a href="#" '.$tt.'>'.$roster->locale->act['Reputation'].'</a>';
?>
